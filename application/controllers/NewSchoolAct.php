<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NewschoolAct extends CI_Controller {

   function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database(); 
        $this->load->model('AllApproveModel');
        $this->load->model('Datamodel');
        $this->load->model('NewSchoolActModel');
        $this->load->model('Homemodel');
        $this->load->model('Datamodel');
        $this->load->library('AWSBucket');
        date_default_timezone_set('Asia/Kolkata');  

  }
  
  function NewActSchool(){
        $data['district']=$this->Datamodel->get_alldistricts();
        $data['cls']=$this->Datamodel->getallclassstudying();
        $data['management']=$this->NewSchoolActModel->getSchoolManagement('22,29');
        $where = ' where upgradation = 0 or upgradation = -1'; 
        $data['certificate']=json_decode(json_encode($this->Homemodel->getCertificateMaster($where)),true);
        $this->load->view('NewSchoolAct/NewSchoolCreation',$data);
  }
  function getAllDetails(){
        $fun_name='getAllNeed';
        $cnd=1;
        $sp=explode("_",$this->input->post("cond"));
        if(is_numeric($sp[1])){
            $_POST['cond']=$sp[0];
        }
        switch($this->input->post("cond")){
            case 'district_id':$cond="WHERE schoolnew_district.id=".$this->input->post("condval")." GROUP BY schoolnew_edn_dist_mas.id";$cnd=0;break;
            case 'edudist_id':$cond="WHERE schoolnew_edn_dist_mas.id=".$this->input->post("condval")." GROUP BY schoolnew_block.id";$cnd=0;break;
            case 'block_id':$cond="WHERE schoolnew_block.id=".$this->input->post("condval")." GROUP BY schoolnew_block.block_type";break;
            case 'urbanrural':$cond="WHERE schoolnew_block.block_type='".$this->input->post("condval")." GROUP BY schoolnew_zone_type.id";break;
            case 'zone_type_id':$cond="WHERE schoolnew_zone_type.id=".$this->input->post("condval")." GROUP BY schoolnew_localbody_all.id";break;
            case 'village_panchayat_id':$cond="WHERE schoolnew_localbody_all.id=".$this->input->post("condval")." GROUP BY schoolnew_habitation_all.id";break;
            case 'vill_habitation_id':$cond="WHERE schoolnew_habitation_all.id=".$this->input->post("condval")." GROUP BY schoolnew_parliament.id";break;
            case 'parliament_id':$cond="WHERE schoolnew_parliament.id=".$this->input->post("condval")." GROUP BY schoolnew_assembly.id";break;
            case 'assembly_id':$cond="WHERE schoolnew_assembly.id=".$this->input->post("condval");break;
            case 'sch_management_id':$fun_name='getSchoolDepart';$cond="AND schoolnew_management.id=".$this->input->post("condval");break;
            case 'schname':$fun_name='searchSchoolNames';$cond="'%".$this->input->post("condval");break;
        }
        echo(json_encode($this->NewSchoolActModel->$fun_name($cond,$cnd)));
  }
  function NewSchoolSubmit(){
        if($this->newschool_create()){
            $this->postCorrection();            
            $findtable=['newschool_details','newschool_detailsland','schoolnew_fund','schoolnew_renewal','schoolnew_renewcategory'
                ,'schoolnew_renewalfiles','newschool_trustentry','newschool_registercomplete',
                'newschool_antisipatedstrength','newschool_distanceofschools'];
            //$table=$this->Homemodel->findtablename(implode("','",$columnname),implode("','",$findtable));
            //print_r($table);die();
            foreach($findtable as $tablename){
                $chbit=0;$sett=0;
                $colname=json_decode(json_encode($this->Datamodel->getTableDescribtion($tablename)),true);
                foreach($colname as $col){
                    foreach($_POST as $postIndex => $value){
                        if($col['Field']==$postIndex){
                            if(($postIndex=="renewal_id" || $postIndex=="school_id" || $postIndex=="school_key_id" || $postIndex=="temp_id") && $sett==0){
                                $cnt=$this->NewSchoolActModel->selectfromtable($tablename," WHERE ".$postIndex."=".$value);
                                if(count($cnt)>0){
                                    $process="update";
                                    $reference="$postIndex=$value";
                                    $position="single";
                                }else{
                                    $process="insert";
                                    $reference="";
                                    $position="single"; 
                                }
                                $sett=1;
                            }
                            $dtarray[$postIndex]=$value;
                        }
                        if($tablename==$postIndex && $chbit==0){
                            $dtidx="multi";$chbit=1;
                            $dtarray=$_POST[$tablename];
                            $process="insert_batch";
                            $reference="";
                            $position="multi"; 
                            break;
                        }else{
                            $dtidx="single"; 
                        }
                    }
                    if($chbit==1){
                        break;
                    }
                }
                $data[$tablename][$dtidx]=$dtarray;
                $data[$tablename]['settings']=array(
                    'process'       => $process,
                    'reference'     => $reference,
                    'position'      => $position
                );
                unset($dtarray);
            }
        }else{
            $flashMsg['status']='ERROR';
            $flashMsg['cls']='alert alert-danger glyphicon glyphicon-remove';
            $flashMsg['msg']='Process Update Failed. Kindly Try Again!!!';
        }
        foreach($data as $key=>$dt){
            $cnt=count($dt[array_keys($dt)[0]]);
            if($cnt<=1){
                unset($data[$key]);
            }
        }
        /*foreach($data as $key=>$dt){
            $cnt=count($dt[array_keys($dt)[0]]);
            echo("----------------------------------------".$key." DATA :".$cnt."<br>");
            print_r($dt);echo("<br>----------------------------------------------------------------------------------------------------------<br><br>");
            //echo(array_keys($dt)[0]."<br>");
        }*/
        if(!$this->AllApproveModel->ApproveInsertAndUpdate($data)){
            //die('Error : Renewal Expiry Found');
            $flashMsg['status']='ERROR';
            $flashMsg['cls']='alert alert-danger glyphicon glyphicon-remove';
            $flashMsg['msg']='Process Update Failed. Kindly Try Again!!!';
        }else{
            $flashMsg['status']='SUCCESS';
            $flashMsg['cls']='alert alert-success glyphicon glyphicon-ok';
            $flashMsg['msg']='SUCCESS : YOUR LOGIN USER NAME AND PASSWORD HAS BEEN MAILED TO GIVEN EMAIL AT THE TIME OF REGISTRATION';
        }
        $this->session->set_flashdata('flashMsg',$flashMsg);
        redirect('NewSchoolAct/NewActSchool','referesh');
  }
  
  function postCorrection(){
        //print_r($_FILES);die('Post Correction');
        $AWS=new AWSBucket('renewalapplicationemis','AKIAI3EE36AJMUO6YBVQ','JFi4uedD0lBBGiE+Ngaer0nJpnkQHt1EAR4CReiU','NEWSCHOOL_TEST',$_FILES,'STANDARD_IA');
        $uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files);
        $created_date = date('Y-m-d h:i:s',strtotime("now"));
        
        
        $_POST['challan_filename']=$uploadarr['fee_challan'][0]['fname'];
        $_POST['challan_filepath']=$uploadarr['fee_challan'][0]['fpath'];
        
        $renewal_id=$this->session->userdata('renewal_id');
        
        foreach($_POST as $postIndex => $value){
            switch($postIndex){
                case 'hiddencertificates':{
                    foreach($uploadarr as $fidx => $updt){
                        //print_r($fidx);die();
                        $exp=explode("_",$fidx);
                        if($exp[0]=="certificate"){
                        $renewalfiles[]=array(
                                                'renewal_id'            => $_POST['renewal_id'],
                                                'certificate_id'        => $exp[1],
                                                'certificate_filename'  => $updt[0]['fname'],
                                                'certificate_filepath'  => $updt[0]['fpath']);
                        }
                    }
                    $_POST['schoolnew_renewalfiles']=$renewalfiles;
                    break;
                }
                case 'addressline_1':{
                    $_POST['address']=$_POST['addressline_1']."\n".$_POST['addressline_2'];
                    break;
                }
                case 'trustentry':{
                    $i=0;$trustentry=array();
                    while(isset($_POST['trustname_'.$i]) && isset($_POST['trustplace_'.$i]) && isset($uploadarr['trustfile_'.$i])){
                        if($_POST['trustname_'.$i]!=""){
                            $trustentry[]=array(
                                'temp_id'           =>  $_POST['temp_id'],
                                'trustname'         =>  $_POST['trustname_'.$i],
                                'trustplace'        =>  $_POST['trustplace_'.$i],
                                'trustdocapth'      =>  $uploadarr['trustfile_'.$i][0]['fpath'],
                                'trustdocname'      =>  $uploadarr['trustfile_'.$i][0]['fname']
                            );
                        }
                        $i++;
                    }
                    if($i>0){
                    $_POST['newschool_trustentry']=$trustentry;}
                    break;
                }
                case 'antistrength':{
                    $trustentry=array();
                    $i=0;while(isset($_POST['std_'.$i]) && isset($_POST['str_'.$i])){
                        if($_POST['std_'.$i]){
                            $trustentry[]=array(
                                'school_key_id'   =>  $_POST['school_key_id'],
                                'anti_standard'   =>  $_POST['std_'.$i],
                                'anti_strength'   =>  $_POST['str_'.$i]
                            );
                        }
                        $i++;
                    }
                    $_POST['newschool_antisipatedstrength']=$trustentry;
                    break;
                }
                case 'school_distance':{
                    $trustentry=array();
                    $i=0;while(isset($_POST['schoolid_'.$i]) && isset($_POST['distance_'.$i])){
                        if($_POST['schoolid_'.$i]!=""){
                            $trustentry[]=array(
                                'school_key_id'         =>  $_POST['school_key_id'],
                                'school_key_id_add'     =>  $_POST['schoolid_'.$i],
                                'distance_in_meter'     =>  $_POST['distance_'.$i]
                            );
                        }
                        $i++;
                    }
                    $_POST['newschool_distanceofschools']=$trustentry;
                    break;
                }
                case 'medium_id':{
                    foreach($value as $v){
                        $med[]=array(
                            'school_key_id' =>  $_POST['school_key_id'],
                            'medium_instrut' => $v
                        );
                    }
                    $_POST['schoolnew_mediumentry']=$med;
                    break;
                }
            }
            
        }
  }
  function newschool_create(){
      $schoolname = $this->input->post('school_name');
      $schoolmobile = $this->input->post('mobile');
      $manage_cat_id = $this->input->post('manage_cate_id');
      $sclmanaid = $this->input->post('sch_management_id');
      $scldirectid = $this->input->post('sch_directorate_id');
      $email=$_POST['email'];
      $created_date = date('Y-m-d',strtotime('now+5hours30minutes'));
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
      $string = '';
      //echo 'Conflict check';
      $max = strlen($characters);
      for ($i = 0; $i < 8; $i++) {
          $string .= $characters[rand(0,61)];
      }  
      $userid=$this->Homemodel->tempidcreation();
      $temp_id=$userid[0]['temp_id'];
      $password = md5($string); 
      $data = array(
      'school_name'         => $schoolname,
      'mobile'              => $schoolmobile,
      'temp_id'             => $temp_id,
      'emis_password'       => $password,
      'ref'                 => $string,  
      'email'               => $email,
      'manage_cate_id'      => $manage_cat_id,
      'sch_management_id'   => $sclmanaid,
      'sch_directorate_id'  => $scldirectid,
      'created_date'        => $created_date
      );
      
      $mail = array(
        'subject' => 'EMIS | Temporary Login for New School Registration',
        'usercat' => 'Temporary Login Id',
        'userpass'=> 'Temporary Login Password'
      );
      
      
      if($this->Homemodel->insertorupdatedata1($data)){
        if($this->send_mail($email,$temp_id,$string,$mail)){
            $_POST['temp_id']=$temp_id;
            $_POST['school_id']=$temp_id;
            $_POST['school_key_id']=$temp_id;
            $data=array(
                'school_key_id' => $temp_id,
            );
            $_POST['renewal_id']=$this->Homemodel->insertorupdatedata1($data,"schoolnew_renewal");
            return true;
        }else{
            return false;
        }
      }else{
         return false;
      }
  }
  
  function send_mail($email,$temp_id,$string,$subject) {
    //echo 'Conflict check';
         $from_email = "donotreply.emis@gmail.com";
         $config = Array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'donotreply.emis@gmail.com',
		    'smtp_pass' => 'tnemisssa',
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8',
            'wordwrap'  => TRUE
		);
         $this->load->library('email',$config);
         $this->email->set_newline("\r\n");	
 		 $this->email->from($from_email, 'info emis');
         $this->email->to($email);
		 
         $data['user'] = $temp_id;
         $data['pass'] = $string; 
         $data['mail'] = $subject;
         
         $content = $this->load->view('newSchool/emailTemplate',$data,true);
         
         $content = str_replace(base_url(),'http://emis.tnschools.gov.in/',$content);
         $this->email->subject($subject['subject']);
         $this->email->message($content);
         //Send mail
         if($this->email->send()){
            return true;
         }else{
            return false;
         }
       
    }
    
}
?>