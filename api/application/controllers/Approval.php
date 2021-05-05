<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require APPPATH . '/third_party/mpdf/mpdf.php';
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Approval extends REST_Controller 
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  function __construct()
  {
    parent::__construct();
    $this->load->database(); 
    $this->load->model('AllApproveModel');
    $this->load->library('AWS_S3');
    $this->load->library('AWSBucket');
    $this->load->helper('common_helper');
  }
  function submitApproval(){
            $renewalID=$this->uri->segment(3,0);
            $emis_loggedin = $this->session->userdata('emis_loggedin');
            
            if(!$emis_loggedin){
                redirect("/","refresh");
            }
            
            $renewAuth=0;
            if(isset($_POST['submit']) && !isset($_POST['reject'])){
                $auth=$this->session->userdata('emis_user_type_id');
            }
            elseif(isset($_POST['reject']) && $_POST['rejectDeclare']==1){
                $auth=-($_POST['rejectDeclare']);
            }
            else{
                $auth=-($this->session->userdata('emis_user_type_id'));
                $renewAuth=$_POST['rejectDeclare'];
            }
            //print_r($_POST);die();
            if($emis_loggedin){
                $AWS=new AWSBucket('renewalapplicationemis','AKIAI3EE36AJMUO6YBVQ','JFi4uedD0lBBGiE+Ngaer0nJpnkQHt1EAR4CReiU','UPGRADE_TEST',$_FILES,'STANDARD_IA');
                $uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files);
                //print_r($uploadarr);die();
                $where=" schoolnew_renewalfiles.renewal_id=".$renewalID;
                //echo($where);die();
                $files=$this->AllApproveModel->AllApproveExcute($where,'',$_POST['module'],'');
                //print_r($files);die();
                $certificate=$this->Homemodel->getCertificateMaster(" WHERE upgradation IS NOT NULL");
                foreach($certificate as $cer){
                   foreach($files as $file){
                        if($cer->id==$file['certificate_id']){
                            echo($cer->id."==".$file['fileid']."<br>");
                            $data['schoolnew_renewalfiles']['multi'][]=array(
                                'id'                        =>  $file['fileid'],
                                'certificate_exp'           =>  $_POST['file_'.$cer->id.'_'.$file['fileid']],
                                'beo_certificateremarks'    =>  $_POST['remarks_'.$cer->id],
                                'auth'                      =>  $auth
                            );
                        }                       
                   }
                }
                //die();
                $data['schoolnew_renewalfiles']['settings']=array(
                    'process'       => "update_batch",
                    'reference'     => "id",
                    'position'      => "multi"
                );
                //print_r($data);die();
                //echo 'Conflict check';
                if($auth==-1){
                    $_POST['validupto_'.$renewalID]='0000-00-00';
                    $_POST['validfrom_'.$renewalID]='0000-00-00';
                }
                
                
                //print_r($uploadarr);die();
                
                $data['schoolnew_renewal']['single']=array(
                                'id'                            =>  $_POST['renewal_id'],
                                'auth'                          =>  $renewAuth,
                                'vaild_from'                    =>  (isset($_POST['validfrom_'.$renewalID])?(($_POST['validfrom_'.$renewalID]!='')?$_POST['validfrom_'.$renewalID]:NULL):NULL),
                                'vaild_upto'                    =>  (isset($_POST['validupto_'.$renewalID])?(($_POST['validupto_'.$renewalID]!='')?$_POST['validupto_'.$renewalID]:NULL):NULL),
                                'fromclass'                     =>  (isset($_POST['fromclass_'.$renewalID])?(($_POST['fromclass_'.$renewalID]!='')?$_POST['fromclass_'.$renewalID]:NULL):NULL),
                                'toclass'                       =>  (isset($_POST['toclass_'.$renewalID])?(($_POST['toclass_'.$renewalID]!='')?$_POST['toclass_'.$renewalID]:NULL):NULL),
                                'year_rec_remarks'              =>  $_POST['lastrenewal_'.$renewalID],
                                'file_exp'                      =>  $_POST['lastrenewaldate_'.$renewalID],
                                'contidion_file'                =>  (isset($uploadarr['contidion_'.$renewalID])?(($uploadarr['contidion_'.$renewalID][0]['fpath']!='')?$uploadarr['contidion_'.$renewalID][0]['fpath']:NULL):NULL)
                            );
                $data['schoolnew_renewal']['settings']=array(
                    'process'       => "update",
                    'reference'     => "id=$renewalID",
                    'position'      => "single"
                );
                
                
                $data['schoolnew_renewapprove']['single']=array(
                                'id'                            =>  NULL,
                                'renewal_id'                    =>  $_POST['renewal_id'],
                                'fileno'                        =>  $_POST['filenumber_'.$renewalID],
                                'auth'                          =>  $auth,
                                'filename'                      =>  (isset($uploadarr['inspect_'.$renewalID])?(($uploadarr['inspect_'.$renewalID][0]['fname']!='')?$uploadarr['inspect_'.$renewalID][0]['fname']:NULL):NULL),
                                'filepath'                      =>  (isset($uploadarr['inspect_'.$renewalID])?(($uploadarr['inspect_'.$renewalID][0]['fpath']!='')?$uploadarr['inspect_'.$renewalID][0]['fpath']:NULL):NULL),
                                'remarks'                       =>  $_POST['finalremarks_'.$renewalID],
                                'emis_username'                 =>  $this->session->userdata('emis_username'),
                                'emis_userid'                   =>  $this->session->userdata('emis_user_sno'),
                                'emis_login'                    =>  $this->getUserIpAddr()
                            );
                $data['schoolnew_renewapprove']['settings']=array(
                    'process'       => "insert",
                    'reference'     => "",
                    'position'      => "single"
                );
                
                
                if(!$this->AllApproveModel->ApproveInsertAndUpdate($data)){
                    //die('Error : Renewal Expiry Found');
                    $flashMsg['status']='ERROR';
                    $flashMsg['cls']='alert alert-danger glyphicon glyphicon-remove';
                    $flashMsg['msg']='Process Update Failed. Kindly Try Again!!!';
                }else{
                    $flashMsg['status']='SUCCESS';
                    $flashMsg['cls']='alert alert-success glyphicon glyphicon-ok';
                    $flashMsg['msg']='Process Successfully Updated...!!!!';
                }
                
            } 
            $this->session->set_flashdata('flashMsg',$flashMsg);
            redirect($_POST['redirect'],'refresh'); 
      }
      function CheckForSubmission_get(){
        if(isset($_GET['module'])){
            $check=$_GET['module'];
        }
        else{
            $check=-1;
        }
        switch($check){
            case 1:{
                $data['title']='School Recognition Renewal Status';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - RENEWAL';
                $data['check']=1;
                break;
            }
            case 2:{
                $data['title']='Application for Tamil Medium Classes';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - TAMIL MEDIUM CLASSES';
                $data['check']=2;
                break;
            }
            case 3:{
                $data['title']='Additional Classes/Upgradation/Additional Groups Status';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - UPGRADATION';
                $data['check']=3;
                break;
            }
            case 4:{
                $data['title']='New School Registration And Recognition';
                $data['subtitle']='LIST OF NEW SCHOOLS - REGISTRATION AND RECOGNITION';
                $data['check']=4;
                break;
            }
            case 5:{
                $data['title']='Opening Permission For New Schools';
                $data['subtitle']='LIST OF NEW SCHOOLS - OPENING PERMISSION';
                $data['check']=5;
                break;
            }
            default:{
                $data['title']='No Authendication Found';
                $data['subtitle']='Kindly Logout'; 
                $data['check']=-1;
            }
        }
        
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
  
        if($check > -1){
            if($token['emis_usertype']==5){             //State
                $where=" schoolnew_district.id IS NOT NULL"; 
            }elseif($token['emis_usertype']==9){        //CEO
                $where=" schoolnew_district.id=".$token['emis_user_id'];
            }elseif($token['emis_usertype']==10){       //DEO
                $where='schoolnew_edn_dist_mas.id='.$token['emis_user_id'];
            }elseif($token['emis_usertype']==6){        //BEO
                if($check!=4){
                    $where=" schoolnew_basicinfo.beo_map=".$token['emis_usertype1']." 
                    AND schoolnew_basicinfo.block_id=schoolnew_block.id 
                    AND schoolnew_block.id=".$token['emis_user_id'];
                }elseif($check==4){
                    $where=" schoolnew_edn_dist_block.block_id=schoolnew_block.id AND schoolnew_block.id=".$token['emis_user_id'];
                }
            }
            $update_where=" AND schoolnew_edn_dist_block.edn_dist_id=schoolnew_basicinfo.edu_dist_id 
                    AND schoolnew_edn_dist_block.block_id=schoolnew_block.id 
                    AND schoolnew_basicinfo.block_id=schoolnew_block.id ";
            $sublist='';
            //Check For Approved/Reject/Waiting
            if(isset($_GET['app']) && $_GET['app']<96){
                $sublist=" AND (schoolnew_renewal.vaild_from IS NULL)";
            }
            $data['list']=$this->AllApproveModel->AllApproveExcute($where,'',$check,$sublist,$token['emis_usertype']);
            $data['usercat']=$this->AllApproveModel->getAllUserCategory();
        }
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'renewal'  => $data],REST_Controller::HTTP_OK);
        
    } 

    /******************************************************** Caution: Should Not Change Any of these Code ******************************************************/
    
    function allWhereCondtion($tname="",$emis_user_id="",$emis_user_type_id=""){
        $where='';
        switch($emis_user_type_id){
            case 1:{
                $where=' AND '.$tname.'school_id='.$emis_user_id;
                break;
            }
            case 2:
            case 6:{
                $where=' AND '.$tname.'block_id='.$emis_user_id;
                break;
            }
            case 3:
            case 9:{
                $where=' AND '.$tname.'district_id='.$emis_user_id;
                break;
            }
            case 4:
            case 10:{
                $where=' AND '.$tname.'edu_dist_id='.$emis_user_id;
                break;
            }
            case 5:{
                $where='';
                break;
            }
        }        
        return $where;
        
    }

    
    function allGroupAndNext($tname="",$emis_user_type_id=""){
        $groupandnext=array();
        $grp=0;
        if(isset($_GET['grp'])){
            $grp=$_GET['grp'];
        }
        
        if(!isset($_GET['q'])){
            $_GET['q']=0;
        }
        
        if(isset($_GET['q'])){
            switch($emis_user_type_id){
                case 5:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'district_id';
                            $groupandnext['groupname']='district_name';
                            $groupandnext['next']='EDU';
                            $groupandnext['reportid']='emis_district_id';
                            $groupandnext['ctrl']='State';
                            break;
                        }
                        case 'EDU':{
                            $groupandnext['group']=$tname.'edu_dist_id';
                            $groupandnext['groupname']='edu_dist_name';
                            $groupandnext['next']='BLK';
                            $groupandnext['where']=' AND '.$tname.'district_id='.$_GET['q'];
                            break;
                        }
                        case 'BLK':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$_GET['q'];
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                    }
                    break;
                }
                case 2:
                case 6:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['reportid']='emis_block_id';
                            break;
                        }
                    }
                    break;
                }
                case 3:
                case 9:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'edu_dist_id';
                            $groupandnext['groupname']='edu_dist_name';
                            $groupandnext['next']='BLK';
                            $groupandnext['reportid']='emis_district_id';
                            $groupandnext['ctrl']='Ceo_District';
                            
                            break;
                        }
                        case 'BLK':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$_GET['q'];
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                    }
                    break;
                }
                case 4:
                case 10:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['reportid']='emis_deo_id';
                            $groupandnext['ctrl']='Deo_District';
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                        
                    }
                    break;
                }
            }
        }
        //print_r($groupandnext);die();
        return $groupandnext;
    }
/******************************************************** Caution: Should Not Change Any of these Code ******************************************************/
}
?>