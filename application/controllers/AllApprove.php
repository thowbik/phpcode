<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require 'aws/aws-autoloader.php';
//use Aws\S3\S3Client;
//use Aws\S3\Exception\S3Exception;
require APPPATH . '/third_party/mpdf/mpdf.php';
class AllApprove extends CI_Controller {
      function __construct()
      {
            parent::__construct();
            $this->load->helper(array('form','url','html'));
            $this->load->library(array('session', 'form_validation'));
            $this->load->database(); 
            $this->load->model('AllApproveModel');
            $this->load->model('Authmodel');
            $this->load->library('AWS_S3');
            $this->load->library('AWSBucket');
            $this->load->helper('common_helper'); 
            $this->load->model('Homemodel'); 
            $this->load->model('Datamodel');
            $this->load->model('Statemodel');
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
      function CheckForSubmission(){
        if($this->uri->segment(3,0)!=''){
            $check=$this->uri->segment(3,0);
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
        if($check > -1){
            if($this->session->userdata('emis_state_id')!=''){
                $where=" schoolnew_district.id IS NOT NULL"; 
            }elseif($this->session->userdata('emis_district_id')!=''){
                $where=" schoolnew_district.id=".$this->session->userdata('emis_district_id');
            }elseif($this->session->userdata('emis_deo_id')!=''){
                $where='schoolnew_edn_dist_mas.id='.$this->session->userdata('emis_deo_id');
            }elseif($this->session->userdata('emis_block_id')!=''){
                if($check!=4){
                    $where=" schoolnew_basicinfo.beo_map=".$this->session->userdata('emis_usertype1')." 
                    AND schoolnew_basicinfo.block_id=schoolnew_block.id 
                    AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
                }elseif($check==4){
                    $where=" schoolnew_edn_dist_block.block_id=schoolnew_block.id AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
                }
            }
            $update_where=" AND schoolnew_edn_dist_block.edn_dist_id=schoolnew_basicinfo.edu_dist_id 
                    AND schoolnew_edn_dist_block.block_id=schoolnew_block.id 
                    AND schoolnew_basicinfo.block_id=schoolnew_block.id ";
            $sublist='';
            //Check For Approved/Reject/Waiting
            if($this->uri->segment(4,0)<96){
                $sublist=" AND (schoolnew_renewal.vaild_from IS NULL)";
            }
            $data['list']=$this->AllApproveModel->AllApproveExcute($where,'',$check,$sublist);
            $data['usercat']=$this->AllApproveModel->getAllUserCategory();
        }
        
        $this->load->view('Upgradation/upgradelist',$data);
    }
    
    function allApproveStatus(){
       if($this->uri->segment(3,0)!=''){
            $check=$this->uri->segment(3,0);
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
            default:{
                $data['title']='No Authendication Found';
                $data['subtitle']='Kindly Logout'; 
                $data['check']=-1;
            }
        }
        if($check > -1){
            /*if($this->session->userdata('emis_state_id')!=''){
                $where=" schoolnew_district.id IS NOT NULL"; 
            }elseif($this->session->userdata('emis_district_id')!=''){
                $where=" schoolnew_district.id=".$this->session->userdata('emis_district_id');
            }elseif($this->session->userdata('emis_deo_id')!=''){
                $where='schoolnew_edn_dist_mas.id='.$this->session->userdata('emis_deo_id');
            }elseif($this->session->userdata('emis_block_id')!=''){
                if($check!=4){
                    $where=" schoolnew_basicinfo.beo_map=".$this->session->userdata('emis_usertype1')." AND schoolnew_edn_dist_block.block_id=schoolnew_block.id AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
                }elseif($check==4){
                    $where=" schoolnew_edn_dist_block.block_id=schoolnew_block.id AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
                }
            }*/
            if($this->session->userdata('emis_state_id')!=''){
                $where=" AND district_id IS NOT NULL"; 
            }elseif($this->session->userdata('emis_district_id')!=''){
                $where=" AND district_id=".$this->session->userdata('emis_district_id');
            }elseif($this->session->userdata('emis_deo_id')!=''){
                $where=" AND edu_dist_id=".$this->session->userdata('emis_deo_id');
            }elseif($this->session->userdata('emis_block_id')!=''){
                if($check!=4){
                    $where=" AND beo_map=".$this->session->userdata('emis_usertype1')." AND block_id=".$this->session->userdata('emis_block_id');
                }elseif($check==4){
                    $where=" AND block_id=".$this->session->userdata('emis_block_id');
                }
            }
            $sublist='';
            //Check For Approved/Reject/Waiting
            if($this->uri->segment(4,0)<96){
                $sublist=" AND (schoolnew_renewal.id IS NOT NULL)";
            }
            //$data['status_rt']=$this->AllApproveModel->AllApproveExcute($where,'',$check,$sublist);
            //for($i=0;$i<3;$i++){
                //$data['status_rt'][$i]=$this->AllApproveModel->allApproveStatus($this->uri->segment(3,0),$where,$i);
            //}
            $data['usercat']=$this->AllApproveModel->getAllUserCategory();
       }
       $this->load->view('Upgradation/renewalStatus',$data);
    }
    
    function getRejectList(){
        $module=$this->input->post('module');
        $schooltype=$this->input->post('schooltype');
        $usertype=$this->input->post('usertype');
        $reject=$this->AllApproveModel->getRejectionList($module,$schooltype,$usertype);
        echo(json_encode($reject));
    }
    
    
    
    function queueToreset(){
        $renewal_id=$this->uri->segment(3,0);
        if(isset($_POST['reset_submit_'.$renewal_id])){
            $reset=array(
                'renewal_id' => $renewal_id,
                'reason_reset' => $_POST['reason_reset_'.$renewal_id],
                'sent_emis_sno' => $this->session->userdata('emis_user_sno')
            );
            $checkallreadyexists=" schoolnew_renewalreset.renewal_id=".$renewal_id." AND ";
            $resetquese=$this->AllApproveModel->getResetQueue($checkallreadyexists);
            //print_r($resetquese);die();
            if($resetquese[0]['totcnt']<=0){
                $data['schoolnew_renewalreset']['single']=array(
                                    'id'                            =>  NULL,
                                    'renewal_id'                    =>  $renewal_id,
                                    'reason_reset'                  =>  $_POST['reason_reset_'.$renewal_id],
                                    'sent_emis_sno'                 =>  $this->session->userdata('emis_user_sno')
                                );
                    $data['schoolnew_renewalreset']['settings']=array(
                        'process'       => "insert",
                        'reference'     => "",
                        'position'      => "single"
                    );
               
               if(!$this->AllApproveModel->ApproveInsertAndUpdate($data)){
                        die('Error : Renewal Expiry Found');
               } 
           }
        }
        
        redirect($_POST['redirect'],'refresh'); 
    }
    
    
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    
    
    function generateProfilePDF(){
        $schoolid=$this->uri->segment(3,0);
        //$start_memory = memory_get_usage();
        $data['profile']=json_decode(json_encode($this->AllApproveModel->getSchoolProfileData($schoolid)),true);
        $data['print']=0;
        //echo memory_get_usage() - $start_memory;
        $user=$this->Authmodel->getusertype($this->session->userdata('emis_user_type_id'));
        if($this->uri->segment(4,0)==1){
            $data['daywork_club_trade']=json_decode(json_encode($this->AllApproveModel->getDayWorksTradeClubs($schoolid)),true);
            $data['const_lib_insp']=json_decode(json_encode($this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid)),true);
            $data['equip_lab_inet']=json_decode(json_encode($this->AllApproveModel->getEquipLabInternet($schoolid)),true);
            $data['fees_udiseplus_fund']=json_decode(json_encode($this->AllApproveModel->getFeesUdisePlusFund($schoolid)),true);
            $content=$this->load->view('renewal/schoolProfilePDFNew',$data,true);    
        }
        else{
            $user=$user==""?'NEW SCHOOL':$user;            
            $content=$this->load->view('newSchool/schoolProfilePDFNew',$data,true);
        }        
        //echo($content);die();
        $pdfFilePath = $data['profile'][0]['udise_code']."-".$data['profile'][0]['school_name'].".pdf";
        //load mPDF library
        $this->load->library('m_pdf');
        //generate the PDF from the given html
        $this->m_pdf = new mpdf('"UTF-8","A4","","",10,10,10,10,6,3');
        $this->m_pdf->showImageErrors = true;
        $this->m_pdf->SetWatermarkText( strtoupper($user)." DRAFT : ".date("d-M-Y H:i:s",strtotime("now")));
        $this->m_pdf->showWatermarkText = true;
        $this->m_pdf->WriteHTML($content);

        //download it.
        $this->m_pdf->Output($pdfFilePath, "I");
    }
    
    function schoolProfileView(){
        $schoolid=$this->uri->segment(3,0);
        //$start_memory = memory_get_usage();
        $data['profile']=json_decode(json_encode($this->AllApproveModel->getSchoolProfileData($schoolid)),true);
        //echo memory_get_usage() - $start_memory;
        $data['print']=1;
        $user=$this->Authmodel->getusertype($this->session->userdata('emis_user_type_id'));        
        if($this->uri->segment(4,0)==1){
            $data['daywork_club_trade']=json_decode(json_encode($this->AllApproveModel->getDayWorksTradeClubs($schoolid)),true);
            $data['const_lib_insp']=json_decode(json_encode($this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid)),true);
            $data['equip_lab_inet']=json_decode(json_encode($this->AllApproveModel->getEquipLabInternet($schoolid)),true);
            $data['fees_udiseplus_fund']=json_decode(json_encode($this->AllApproveModel->getFeesUdisePlusFund($schoolid)),true);
            $this->load->view('renewal/schoolProfilePDFNew',$data);    
        }
        else{
            $this->load->view('newSchool/schoolProfilePDFNew',$data);
        }
    }
    
    function DashBoard(){
        $data['totaldash']=$this->AllApproveModel->DashBoardCounts($this->allWhereCondtion());
        $data['renewdash']=$this->AllApproveModel->renewalDashBoardCount($this->allWhereCondtion());
        $rpt=$this->allGroupAndNext();
        $data['report_for']=$rpt['reportid'];
        $data['ctrl']=$rpt['ctrl'];
        $data['reports_csv']=$this->AllApproveModel->get_districtwise_report($this->session->userdata('emis_user_type_id'));
        
        $from_date = date('Y-m-d',strtotime("-3 days"));
        $to_date = date('Y-m-d');
        $where=$this->allWhereCondtion();
        $data['old_flash_message']=$this->AllApproveModel->get_flash_news($where==''?" AND created_date BETWEEN '".$from_date."' AND '".$to_date."'":$where);
        $this->load->view('Upgradation/DashBoard',$data);
    }
    
    function studentCount(){
        $data['management'] = json_decode(json_encode($this->Statemodel->getmanagecate()),true);
        $data['schooltype'] = json_decode(json_encode($this->Statemodel->get_school_type()),true);
        if(isset($_POST['catsubmit'])){
            $management=implode("','",$_POST['school_manage']);
            $schoolcate=implode("','",$_POST['school_cate']);
            $where="AND school_type IN ('".$management."') AND cate_type IN ('".$schoolcate."')";
        }
        else{
            $management=$this->uri->segment(3,0)==4?"Un-aided":"Government";
            $where="AND school_type IN ('".$management."')";
        }
        
        switch($this->uri->segment(3,0)){
            case 2:$schid=[2,3,16,18,27,29,32,34,42];break;
            case 3:$schid=[1,5,15,17,19,20,21,22,23,24,26,31,33];break;
            case 4:$schid=[28];break;
        }
        if($this->uri->segment(3,0)>1){
            $where.=' AND sch_directorate_id IN ('.implode(',',$schid).')';
        }
        $data['group']=$this->allGroupAndNext();
        $where.=$this->uri->segment(4,0)==0?$this->allWhereCondtion():$data['group']['where'];
        $data['totaldash']=json_decode(json_encode($this->AllApproveModel->StudentsCount($where,$data['group']['group'])),true);
        $this->load->view('Upgradation/StudentCount',$data);
    }
    function RenewalResetQueue(){
        if($this->session->userdata('emis_user_type_id')==5){
            if(!isset($_POST['renewal_id'])){
                $data['queuelist']=$this->AllApproveModel->setResetQueue();
                $this->load->view('Upgradation/RenewalResetQueue',$data);
            }else{
                    $renewalID=$_POST['renewal_id'];
                    $data['schoolnew_renewal']['single']=array(
                                    'id'                            =>  $_POST['renewal_id'],
                                    'vaild_from'                    =>  NULL,
                                    'vaild_upto'                    =>  NULL,
                                    'fromclass'                     =>  NULL,
                                    'toclass'                       =>  NULL
                                );
                    $data['schoolnew_renewal']['settings']=array(
                        'process'       => "update",
                        'reference'     => "id=$renewalID",
                        'position'      => "single"
                    );
                    
                    $data['schoolnew_renewapprove']['single']=array('renewal_id' => $_POST['renewal_id'],'auth' =>$_POST['auth']);
                    $data['schoolnew_renewapprove']['settings']=array(
                            'process'       => "delete",
                            'reference'     => "",
                            'position'      => "single"
                    );
                    
                    $data['schoolnew_renewalreset']['single']=array(
                                    'renewal_id'                    =>  $_POST['renewal_id'],
                                    'approved_emis_sno'             =>  $this->session->userdata('emis_user_sno')                                    
                                );
                    $data['schoolnew_renewalreset']['settings']=array(
                        'process'       => "update",
                        'reference'     => "renewal_id=$renewalID",
                        'position'      => "single"
                    );
                    //print_r($data);die();
                    if(!$this->AllApproveModel->ApproveInsertAndUpdate($data)){
                            die('Error : Deleting Error');
                    } 
                    echo($_SERVER['REQUEST_URI']);
            }
        }else{
            redirect("/",'refresh');
        }    
    }
    
    function teacherCount(){
        $data['management'] = json_decode(json_encode($this->Statemodel->getmanagecate()),true);
        $data['schooltype'] = json_decode(json_encode($this->Statemodel->get_school_type()),true);
        if(isset($_POST['catsubmit'])){
            $schoolcate=implode("','",$_POST['school_cate']);
            $where="AND cate_type IN ('".$schoolcate."')";
        }
        if($this->uri->segment(3,0)==3){
            $where.=" AND school_type='Government'";
        }
        $data['group']=$this->allGroupAndNext();
        $where.=$this->uri->segment(4,0)==0?$this->allWhereCondtion():$data['group']['where'];
        $data['totaldash']=json_decode(json_encode($this->AllApproveModel->TeachersCount($where,$data['group']['group'])),true);
        $this->load->view('Upgradation/TeacherCount',$data);
    }
    function RenewalPendingDashboard()
    {
         /*if(in_array($this->session->userdata('emis_user_type_id'),[2,3,4,6,9,10])){
            $where=;
         }*/
         $user_type=$this->uri->segment(3,0);
         $data['renewal_list']=$this->AllApproveModel->renewalPendingDashboard($user_type,$this->allWhereCondtion());
         //print_r($data['renewal_list']);
         $this->load->view('Upgradation/Renewalupgradation',$data);

    }
    
    function renewalChecking(){
        if($this->uri->segment(3,0)=='' || $this->uri->segment(3,0)==0){
            $this->load->view('renewal/renewalChecking');    
        }elseif($this->uri->segment(3,0)==1){
            $udise=json_decode($_POST['udise']);
            $strimp=implode("','",$udise);
            $dt=$this->AllApproveModel->renewalChecking($strimp);
            echo(json_encode(json_decode(json_encode($dt),true)));
        }
        
    }
    function indicators(){
        if($this->uri->segment(3,0)!="" || $this->uri->segment(3,0)!=0){
            $groupandnext=$this->allGroupAndNext();
            $where=$this->uri->segment(4,0)==0?$this->allWhereCondtion():$groupandnext['where'];
            $term=(isset($_POST['term'])?($_POST['term']==NULL?1:$_POST['term']):1);
            $indicator=$this->uri->segment(3,0);
            $data['mklist']=$this->AllApproveModel->studentMarkTermSummary($where,$groupandnext['group'],$term,$indicator);
            $data['group']=$groupandnext;
            $data['term']=$term;
        }
    	$this->load->view('state/indicatorslevel',$data);
    }	
    
    function FiledNullCheck(){
        $dt=$this->Datamodel->getTableDescribtion('schoolnew_classroomlevel_entry');
        $jsonformat='"schoolnew_classroomlevel_entry":[';
        $stjson='{"';
        foreach($dt as $d){
            if(!in_array($d['Field'],['id','created_date','modified_date']))
                $imp[]=$d['Field'];
        }
        $stjson.=implode('":"","',$imp);
        $stjson.='":""}';
        $jsonformat.=$stjson.",".$stjson.']';
        echo($jsonformat);
        
        /*$simple_string = '{ "dbhost":"attendance-2.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com", "dbusername":"staging", "dbpassword":"staging@emis", "dbname":"tnschools_working" }'; 
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121'; 
        $encryption_key = "HackerVivek"; 
        $encryption = openssl_encrypt($simple_string, $ciphering,$encryption_key, $options, $encryption_iv); 
        
        echo base64_encode($encryption);
        
        $ciphering = "AES-128-CTR"; 
        $options = 0; 
        $encryption1=base64_decode("V1Z2NjgwV1ZsR0VNV2UxRjQ5WlRyMDBKZkZSbVZwOFd0WU1vbGIvNlZpenpCdk1mbCtKOGZpMFZ5dUlNN25MeUJRQmR0YzZjRFU4ZEdYREI1YWN5QllMbHM5Q1N4MDUvRWRtK3gySG1Dekc1cTA3QWp0cHFKSE1ZaHJIZTVNYjJMeFljMDJTdGppeEdWQTF1Ujg2eGg3MzhENm0wTzJ6Y1JhOFNXenQvT2lrU3d5QjRkWDd5UHNwZU9GK3R3WkhuSWhBenBlRW91aU1uTitUZUlnN0p3dz09");
        $decryption_iv = '1234567891011121'; 
        $decryption_key = "HackerVivek"; 
        $decryption=openssl_decrypt ($encryption1, $ciphering,$decryption_key, $options, $decryption_iv); 
        echo "<br><br>" . $decryption; 
        
        if($encryption==$encryption1){
            die("Equal");
        }else{
            die("Not Equal");
        }*/
    }
    
    function studentduplicationlist(){
        
        $groupandnext=$this->allGroupAndNext();
        $where=$this->uri->segment(4,0)==0?$this->allWhereCondtion():$groupandnext['where'];
		
        $data['dupstud']=$this->AllApproveModel->duplicateStudents($where);
		$this->load->view('Students/Studentduplicationlist',$data);
	}
	
	function DuplicateUpdate(){
		$stud=json_decode($this->input->post('dupstud'),true);
		foreach($stud as $idx => $value)
		$get = $this->AllApproveModel->getstudlist($idx);
		$get[0]['remarks'] = $stud[$idx];
		$get[0]['login']= $this->session->userdata('emis_user_sno'); 
		$get[0]['ipaddress']= $this->getUserIpAddr();
		$insert = $this->AllApproveModel->insertDuplicatstud($get[0],1);
		//print_r($get);die();
	}
	
	/*********From the CEO level ***************/
	function studentduplilistremoval(){
		$data['studentremoval']= $this->AllApproveModel->studentremoval();		
		$this->load->view('Students/studentremoval',$data);
	}
	/******From the Removal StudentCEO***********/
	
	function RemovalStudent(){
		$created_date = date('Y-m-d',strtotime('now'));
		$stud=json_decode($this->input->post('dupstud'),true);
		$get = $this->AllApproveModel->getstudlist($stud['dupstud'],1)[0];
		$studid = $get['student_id'];
		$data['students_child_detail']['single'] = array(
			'id' => $get['student_id'],
			'transfer_flag' => 2
		);
		$data['students_child_detail']['settings']=array(
			'process' => 'update',
			'reference'=> "id=$studid",
			'position' => 'single'
		);
		//print_r($get);die();
		
		$data['students_transfer_history']['single'] = array(
			'unique_id_no' => $get['unique_id_no'],
			'school_id_transfer' => $get['school_id'],
			'class_studying_id' => $get['class_studying_id'],
			'process_type' => 1,
			'admission_no' => $get['school_admission_no'],
			'medium_of_ins' => $get['education_medium_id'],
			'academic_year' => $get['academic_yr'],
			'transfer_date' => date('Y-m-d',strtotime('now')),
			'created_by' => $this->session->userdata('emis_user_sno'),
			'transfer_reason' => 6,
			'remarks' => 'Duplicate Entry',
			'school_doj' => $get['doj'],
			'archive' => 9,
			'created_at' => date('Y-m-d h:i:s',strtotime('now')),
			'updated_at' => date('Y-m-d h:i:s',strtotime('now')),
			'updated_db' => date('Y-m-d h:i:s',strtotime('now'))
		);
		
		$data['students_transfer_history']['settings']=array(
			'process' => 'insert',
			'reference'=> '',
			'position' => 'single'
		);
		
		$data['students_dupli_history']['single'] =array(
			'approve' => $this->session->userdata('emis_user_sno'),
			'student_id' => $get['student_id']
		);
		
		$data['students_dupli_history']['settings']=array(
			'process' => 'update',
			'reference'=> "student_id=$studid",
			'position' => 'single'
		);
		//	AFROZE V-330301055131920033
		//330301054951810265
		//print_r($data); die();
		
		if(!$this->AllApproveModel->ApproveInsertAndUpdate($data)){
			die('error');
		}
		//print_r($data);
		
	}
	
    function rankSheet(){
        $data['ranksheet']=$this->AllApproveModel->rankSheet();
        $this->load->view('state/districtRanksheet',$data);
    }
    
	/***********From the state level**************/
	
	function get_duplicationlist(){
		if($this->uri->segment(3,0)!=null){
			$groupandnext=$this->allGroupAndNext();
			$where=$this->uri->segment(4,0)==0?$this->allWhereCondtion():$groupandnext['where'];
			//$data['stulist']=$this->AllApproveModel->studuplicatelist($where,$groupandnext['group']);
			$data['stulist']=$this->AllApproveModel->studuplicatelist($where,$groupandnext['group']);
			$data['group']=$groupandnext;
			$this->load->view('Students/statestuduplist',$data);
		}
	}
    
	
	
    
    
    
    
/******************************************************** Caution: Should Not Change Any of these Code ******************************************************/
    
    function allWhereCondtion($tname=""){
        $where='';
        switch($this->session->userdata('emis_user_type_id')){
            case 1:{
                $where=' AND '.$tname.'school_id='.$this->session->userdata('emis_school_id');
                break;
            }
            case 2:
            case 6:{
                $where=' AND '.$tname.'block_id='.$this->session->userdata('emis_block_id');
                break;
            }
            case 3:
            case 9:{
                $where=' AND '.$tname.'district_id='.$this->session->userdata('emis_district_id');
                break;
            }
            case 4:
            case 10:{
                $where=' AND '.$tname.'edu_dist_id='.$this->session->userdata('emis_deo_id');
                break;
            }
            case 5:{
                $where='';
                break;
            }
        }
        return $where;
    }
    
    function allGroupAndNext($tname=""){
        $groupandnext=array();
        switch($this->session->userdata('emis_user_type_id')){
            case 5:{
                switch($this->uri->segment(5,0)){
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
                        $groupandnext['where']=' AND '.$tname.'district_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'BLK':{
                        $groupandnext['group']=$tname.'block_id';
                        $groupandnext['groupname']='block_name';
                        $groupandnext['next']='SCH';
                        $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'SCH':{
                        $groupandnext['group']=$tname.'school_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND '.$tname.'block_id='.$this->uri->segment(4,0);
                        break;
                    }
                }
                break;
            }
            case 2:
            case 6:{
                switch($this->uri->segment(5,0)){
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
                switch($this->uri->segment(5,0)){
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
                        $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'SCH':{
                        $groupandnext['group']=$tname.'school_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND '.$tname.'block_id='.$this->uri->segment(4,0);
                        break;
                    }
                }
                break;
            }
            case 4:
            case 10:{
                switch($this->uri->segment(5,0)){
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
                        $groupandnext['where']=' AND '.$tname.'block_id='.$this->uri->segment(4,0);
                        break;
                    }
                    
                }
                break;
            }
        }
        return $groupandnext;
    }
/******************************************************** Caution: Should Not Change Any of these Code ******************************************************/



}
?>