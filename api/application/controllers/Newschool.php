<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';


class Newschool extends REST_Controller{

   function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database(); 
        $this->load->model('Homemodel');
        $this->load->model('Authmodel');
        $this->load->model('Datamodel');
        $this->load->model('Statemodel');
        //$this->load->model('Districtmodel');
        //$this->load->model('Sectionmodel');
        //$this->load->model('Adminmodel');
        $this->load->model('AllApproveModel');
        //$this->load->model('Schoolgroupmodel');
        //$this->load->model('Blockmodel');
        $this->load->model('Schools_homemodel');
        $this->load->helper('Common');
        $this->load->library('AWSBucket');
       

        // ***** Load Model for Udise_adminmodel *****
        //$this->load->model('Udise_adminmodel');  
        date_default_timezone_set('Asia/Kolkata');  

  }
  
  function new_school() {
    if($this->session->userdata('temp_id')!=""){
        $data['schooldist'] = $this->Datamodel->get_alldistricts();
        $data['management_cate']=$this->Datamodel->get_allmajorcategory();
        $data['schoolcategory']=$this->Datamodel->getallschoolcategory();
        $data['schoolclassstudying']=$this->Datamodel->getallclassstudying();
        $data['schooldetails']=json_decode(json_encode($this->Homemodel->loginverfication($this->session->userdata('temp_id'),$this->session->userdata('emis_password'))),true);
        
        $data['profile']=$this->Homemodel->getProfileComplete($this->session->userdata('temp_id'));
        $where = ' where upgradation = 0 or upgradation = -1'; 
        $data['certificate']=json_decode(json_encode($this->Homemodel->getCertificateMaster($where)),true);
        $data['bank']=$this->Datamodel->getbankList();
        $data['renew']=$this->AllApproveModel->getRenewCategory($this->session->userdata('temp_id'));
    }
    switch($this->uri->segment(3,0)){
            case 0: $this->load->view('newSchool/tempregistration',$data); break;
            case 1: $this->load->view('newSchool/tempregistration1',$data); break;
            case 2: $this->load->view('newSchool/tempregistration2',$data); break;
            case 3: $this->load->view('newSchool/schoolregistration',$data); break;
            case 4: $this->load->view('newSchool/schoolregistration1',$data); break;
            case 5: $this->load->view('newSchool/schoolregistration2',$data); break;
            case 6: $this->load->view('newSchool/schoolregistration3',$data);break;
            case 7: redirect('Registration/newschoolstatus/0/-1','refresh');
            break; 
    }
  }
  
  function newSchoolCreate_post(){
    $records = $this->post('records');
    if($records){
        //$school_id = $records['emis_school_id'];
      //print_r($records['school_name']);die();
      $part = $this->uri->segment(3,0);
      
      $schoolname = $records['school_name'];
      $schoolmobile = $records['mobile'];
      
      $manage_cat_id = $records['manage_cate_id'];
      $sclmanaid = $records['sch_management_id'];
      $scldirectid = $records['sch_directorate_id'];
      
      $email=$_POST['email'];
      $email=$records['email'];
      $created_date = date('Y-m-d',strtotime('now+5hours30minutes'));
      
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
      $string = '';
      //echo 'Conflict check';
      $max = strlen($characters);
      for ($i = 0; $i < 8; $i++) {
          $string .= $characters[rand(0,61)];
      }  

      $app_id = $this->Schools_homemodel->app_id_check(1);
      if(!empty($app_id)){
        if($app_id<'30000000'){  //echo "Renewal";die();
            $app_id = ++$app_id; 
        }
      }else{
            $app_id = '20000000';  
      }
      //$userid=$this->Homemodel->tempidcreation();
      //$temp_id=$userid[0]['temp_id'];
      $password = md5($string); 
      $data = array(
      'app_type'            => '1',    
      'school_name'         => $schoolname,
      'mobile'              => $schoolmobile,
      'app_id'             => $app_id,
      'emis_password'       => $password,
      'ref'                 => $string,  
      'email'               => $email,
      'sch_cate_id'      => $manage_cat_id,
      'sch_mgmt_id'   => $sclmanaid,
      'sch_directorate_id'  => $scldirectid,
      'created_at'        => $created_date
      );
      
      $mail = array(
        'subject' => 'EMIS | Temporary Login for New School Registration',
        'usercat' => 'Temporary Login Id',
        'userpass'=> 'Temporary Login Password'
      );
      
      $this->send_mail($email,$app_id,$string,$mail);
      if($this->Homemodel->insertorupdatedata1($data)){
        $this->response(['dataStatus' => true,
        'status'  => REST_Controller::HTTP_OK,
        'message' => 'Successfully Registered.Kindly check your registered email_id',],REST_Controller::HTTP_OK);   
        // $flsh = '<div class="alert alert-success text-center">Account has been created successfully. Find Login Details in email.</div>';
      }else{
         //$flsh = '<div class="alert alert-danger text-center">Account has been failed. Try again.</div>';
         $this->response(['dataStatus' => false,
         'status'  => REST_Controller::HTTP_BAD_REQUEST,
         'message' => 'Some problems occurred, please try again.',
         ],REST_Controller::HTTP_BAD_REQUEST);
      }
      //$this->session->set_flashdata('Account',$flsh);
      //redirect('Newschool/new_school/0'); 
    }else{
        $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Please Provide the information.',
                                    ],REST_Controller::HTTP_NOT_FOUND);
    }    
  }
  
 public function send_mail($email,$temp_id,$string,$subject) {
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
            //echo 'email sent';
         }else{
            //echo "Email not sent ";
         }
       
    }
    
    function newSchoolLogin_post(){
        $records = $this->post('records');
        $part = $this->uri->segment(3,0);
        $temp_id = $records['emis_username'];
        $emis_password = md5($records['emis_password']);
        $schooldetails=$this->Homemodel->loginverfication($temp_id,$emis_password);
        //print_r($schooldetails);die();
        
        if($schooldetails != null && $schooldetails[0]['emis_username'] == $temp_id && $schooldetails[0]['emis_password'] == $emis_password) {
             //$this->session->set_userdata('temp_id',$schooldetails[0]['temp_id']);
             //$this->session->set_userdata('emis_password',$schooldetails[0]['emis_password']);
             $data['profile']=$this->Homemodel->getProfileComplete($schooldetails[0]['emis_username']);
             //$data['schlDetails']=$schooldetails;
             $data['temp_id']=$schooldetails[0]['emis_username'];
             //($data['profile']); die();
             if($data['profile'][0]['part_1']==1 && $data['profile'][0]['part_2']==1 && $data['profile'][0]['part_3']==1){
                if($data['profile'][0]['final_flag']==1){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Successfully Logged IN'],REST_Controller::HTTP_OK);
                    //'part' => 7
                    //$part=7;
                }
                else{
                    $data['part']=3;
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Successfully Logged IN',
                    'result' => $data],REST_Controller::HTTP_OK);
                    //$part=5;
                }
            }else{
                $data['part']=1;
                $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Successfully Logged IN',
                    'result' => $data],REST_Controller::HTTP_OK);
                //$part=3;
            }
        }else{
            $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NOT_FOUND,
            'message' => 'Login Failed.',
            ],REST_Controller::HTTP_NOT_FOUND);
        }
       // redirect('Newschool/new_school/'.$part,'refresh');
        
    }
  
    function formsubmit_post(){
        $records = $this->post('records');
        //$part = $this->uri->segment(3,0);
        //print_r($records);die();
        $part = $records['part'];
        //$columnname = array();
        $this->postCorrection();
        $tables=['schoolnew_natureofconst_entry','schoolnew_classroomlevel_entry','schoolnew_library_entry','schoolnew_renewalfiles',
        'newschool_documententry','newschool_trustentry'];
        foreach($records as $post => $value){
            $columnname[]=$post;
        }
        $findtable=['newschool_details','newschool_detailsland','schoolnew_natureofconst_entry' 
                ,'schoolnew_classroomlevel_entry','schoolnew_library_entry','schoolnew_fund','schoolnew_renewal','schoolnew_renewcategory'
                ,'schoolnew_renewalfiles','newschool_documententry','newschool_trustentry','newschool_registercomplete'];
        $table=$this->Homemodel->findtablename(implode("','",$columnname),implode("','",$findtable));
        foreach($records as $post => $value){
            if(in_array($post,$tables)){
                $table[]=array('TABLE_NAME' => $post);
            }
        }
       // print_r($table);die();
        foreach($table as $tb){
            if(!in_array($tb['TABLE_NAME'],$tables)){
                $tablelist = $this->Datamodel->getTableDescribtion($tb['TABLE_NAME']);

                foreach($records as $post => $value){
                    foreach($tablelist as $colname){
                        if($colname['Field']=='temp_id' || $colname['Field']=='school_key_id'){
                            $data[$colname['Field']]=$records['temp_id'];
                            $referid = $colname['Field'];
                            $refervalue = $records['temp_id'];
                        }else if($colname['Field']=='renewal_id' && $tb['TABLE_NAME']!='schoolnew_renewal'){
                            $data[$colname['Field']]= $records['renewal_id'];
                            $referid = $colname['Field'];
                            $refervalue = $records['renewal_id'];
                        }
                        if($post==$colname['Field']){
                            $data[$post]=$value;
                        }
                    }
                }
               
                //print_r($data);die();
               
                //if($tb['TABLE_NAME']=='schoolnew_renewcategory'){
                //    echo('schoolnew_renewcategory');
                //    print_r($data);die();
                //}
                 
                $arr = array('tablename' => $tb['TABLE_NAME'],
                             'tabledata' => $data,
                             'multi'     => 0,
                             'referid'   => $referid,
                             'refervalue'=> $refervalue
                             );            
            }else{
                if($tb['TABLE_NAME']=='schoolnew_renewalfiles'){
                   // $refervalue=$records['renewal_id'];
                    $refervalue=$records['temp_id'];
                }else{
                    $refervalue=$records['temp_id'];
                }
                
                if($tb['TABLE_NAME']=='schoolnew_renewalfiles'){
                    $tot=count($records[$tb['TABLE_NAME']]);
                    if($tot<=0){
                        //$records[$tb['TABLE_NAME']][0]['renewal_id']=$records['renewal_id'];
                        $records[$tb['TABLE_NAME']][0]['renewal_id']=$records['temp_id'];
                    }
                    for($i=0;$i<$tot;$i++){
                        //$records[$tb['TABLE_NAME']][$i]['renewal_id']=$records['renewal_id'];
                        $records[$tb['TABLE_NAME']][$i]['renewal_id']=$records['temp_id'];
                    }
                }
                //print_r($_POST[$tb['TABLE_NAME']][0]);echo("----------------".$tb['TABLE_NAME']."<br>");
                $data=$_POST[$tb['TABLE_NAME']];
                //print_r(array_search($refervalue,$records['schoolnew_natureofconst_entry'][0]));die();
                if($tb['TABLE_NAME'] == 'schoolnew_natureofconst_entry' || $tb['TABLE_NAME'] == 'schoolnew_classroomlevel_entry' || $tb['TABLE_NAME'] == 'schoolnew_library_entry'){
                    $arr = array('tablename' => $tb['TABLE_NAME'],
                            // 'tabledata' => $data,
                             'tabledata' => '*',
                             'multi'     => 1,
                            // 'referid'   => array_search($refervalue,$records[$tb['TABLE_NAME']][0]),
                             'referid'   => array_search($refervalue,$records['schoolnew_natureofconst_entry'][0]),
                             'refervalue'=> $refervalue
                    );
                }else{
                    $arr = array('tablename' => $tb['TABLE_NAME'],
                            // 'tabledata' => $data,
                             'tabledata' => '*',
                             'multi'     => 1,
                            // 'referid'   => array_search($refervalue,$records[$tb['TABLE_NAME']][0]),
                             'referid'   => array_search($refervalue,$records),
                             'refervalue'=> $refervalue
                    );
                }                
                //print_r($arr);die();
                
            }
            
            $lastdata = $this->Homemodel->insertorupdatedata($arr);
            if($tb['TABLE_NAME'] == 'schoolnew_renewal'){
                $_SESSION['renewal_id']=$lastdata;
            }
            //print_r($_SESSION['renewal_id']);die();
            unset($data);
        }
        //echo "test";die();
        //die('Error:');
        $arr = array('tablename' => 'newschool_registercomplete',
                             'tabledata' => array('temp_id' => $records['temp_id'],'part_'.($part) => 1),
                             'multi'     => 0,
                             'referid'   => 'temp_id',
                            // 'refervalue'=> $this->session->userdata('temp_id')
                             'refervalue'=> $records['temp_id']
                );

        //print_r($arr);die();
        $result = $this->Homemodel->insertorupdatedata($arr);
        if(!empty($result)){
            $this->response(['dataStatus' => true,
            'status'  => REST_Controller::HTTP_OK,
            'message' => 'Data Successfully Inserted',],REST_Controller::HTTP_OK);   
            // $flsh = '<div class="alert alert-success text-center">Account has been created successfully. Find Login Details in email.</div>';
          }else{
             //$flsh = '<div class="alert alert-danger text-center">Account has been failed. Try again.</div>';
             $this->response(['dataStatus' => false,
             'status'  => REST_Controller::HTTP_BAD_REQUEST,
             'message' => 'Some problems occurred, please try again.',
             ],REST_Controller::HTTP_BAD_REQUEST);
          }
        //redirect('Newschool/new_school/'.($part+1));
        
        
    }
    
    function postCorrection(){
        //print_r($_FILES);die();
        $AWS=new AWSBucket('renewalapplicationemis','AKIAI3EE36AJMUO6YBVQ','JFi4uedD0lBBGiE+Ngaer0nJpnkQHt1EAR4CReiU','NEWSCHOOL_TEST',$_FILES,'STANDARD_IA');
        $uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files);
        $created_date = date('Y-m-d h:i:s',strtotime("now"));
        //print_r($uploadarr);die();
        
        foreach($_POST as $post => $value) {
            
            switch($post) {
                
             case 'addressline_1': {
                    $_POST['address']=$_POST['addressline_1'].'\n'.$_POST['addressline_2'];
                    break;
             }
             
             
             case 'hiddennoc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['noc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'             =>      $this->session->userdata('temp_id'),
                                        'construct_type'            =>      $_POST['noc_'.$i],
                                        'total_flrs'                =>      $_POST['totfloor_'.$i],
                                        'tot_classrm_use'           =>      $_POST['totclassinuse_'.$i],
                                        'tot_classrm_nouse'         =>      $_POST['totclassnotuse_'.$i],
                                        'off_room'                  =>      $_POST['offroom_'.$i],
                                        'lab_room'                  =>      $_POST['labroom_'.$i],
                                        'library_room'              =>      $_POST['libroom_'.$i],
                                        'comp_room'                 =>      $_POST['comroom_'.$i],
                                        'art_room'                  =>      $_POST['artroom_'.$i],
                                        'staff_room'                =>      $_POST['staffroom_'.$i],
                                        'hm_room'                   =>      $_POST['hmroom_'.$i],
                                        'girl_room'                 =>      $_POST['sepgirlroom_'.$i],
                                        'total_room'                =>      $_POST['totroom_'.$i],
                                        'created_date'              =>      $created_date
                                     );
                        $i++;
                    }
                    $tbname=$_POST['hiddennoc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
             
             
             case 'hiddenoac_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['oac_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('temp_id'),
                                        'school_type'       =>      $_POST['oac_'.$i],
                                        'num_rooms'         =>      $_POST['oacroom_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenoac_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
             }   
             
             case 'hiddenlbrc_0':{$i=0;$dtmulti=array();
                 while(isset($_POST['librarybook_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('temp_id'),
                                        'library_type'          =>      $_POST['librarybook_'.$i],
                                        'num_books'             =>      $_POST['nobooks_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenlbrc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                    
                }
             
             case 'hiddendoc_0':{$i=0;$dtmulti=array();
                        while(isset($_POST['docno_'.$i])){
                         $dtmulti[$i]=array(
                                        'temp_id'          =>      $this->session->userdata('temp_id'),
                                        'docno'            =>      $_POST['docno_'.$i],
                                        'surveyno'         =>      $_POST['surveyno_'.$i],
                                        'placereg'         =>      $_POST['placereg_'.$i],
                                        'datereg'          =>      $_POST['datereg_'.$i]
                                     );
                        $i++;
                        }
                        $tbname=$_POST['hiddendoc_0'];
                        $_POST[$tbname]=$dtmulti;
                        break;
                    }
                    //print_r($_POST);
                    
                    case 'hiddentrustmgt_0':{$i=0;$dtmulti=array();
                        while(isset($_POST['trustname_'.$i])){
                         $dtmulti[$i]=array(
                                        'temp_id'          =>      $this->session->userdata('temp_id'),
                                        'trustname'        =>      $_POST['trustname_'.$i],
                                        'trustplace'       =>      $_POST['trustplace_'.$i]
                                     );
                        $i++;
                        }
                        $tbname=$_POST['hiddentrustmgt_0'];
                        $_POST[$tbname]=$dtmulti;
                       
                        break;
                    }
                    case 'hiddenrenewalfiles_0':{$dtmulti=array();$z=0;
                        $where = ' where upgradation = 0 or upgradation = -1'; 
                        $certificate=$this->Homemodel->getCertificateMaster($where);
                        
                        foreach($certificate as $cer){
                            if(isset($uploadarr['certificate_'.$cer->id])){
                                foreach($uploadarr['certificate_'.$cer->id] as $files){                                   
                                    $dtmulti[$z++]=array(                            
                                                    'certificate_id'        =>  $cer->id,
                                                    'certificate_filename'  =>  $files['fname'],
                                                    'certificate_filepath'  =>  $files['fpath'],
                                                    'auth'                  =>  0
                                    );    
                                }
                            }
                        }
                        $tbname=$_POST['hiddenrenewalfiles_0'];
                        $_POST[$tbname]=$dtmulti;
                        break;
                    }
             }
             
             if($post=='applied_category'){
                //$_POST['renewal_id']=0;
                $_POST['challan_filename']=$uploadarr['challan_filepath'][0]['fname'];
                $_POST['challan_filepath']=$uploadarr['challan_filepath'][0]['fpath'];
                //print_r($_FILES);
             }
         } //forloop end
    }
    
    public function finalsubmit_post(){
        $records = $this->post('records');
        $arr = array('tablename' => 'newschool_registercomplete',
                             'tabledata' => array('final_flag' => 1),
                             'multi'     => 0,
                             'referid'   => 'temp_id',
                             'refervalue'=> $records['temp_id']
                );
        //$this->Homemodel->insertorupdatedata($arr);
        //redirect('Newschool/new_school/7');
        $insert = $this->Homemodel->insertorupdatedata($arr);
        if(!empty($insert)){
                $app_id = $records['temp_id'];
                $table = 'mgmt_app_status';
                $mgmt_app_update = $this->Homemodel->mgmtappstatusupdate($table,$records['temp_id']);
                
                if(!empty($mgmt_app_update)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Data Successfully Inserted',],REST_Controller::HTTP_OK);   
                }else{
                    $this->response(['dataStatus' => false,
                    'status'  => REST_Controller::HTTP_BAD_REQUEST,
                    'message' => 'Some problems occurred in Management App Status Update, please try again.',
                    ],REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(['dataStatus' => false,
                'status'  => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Some problems occurred in Final flag update, please try again.',
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
    }
    
    function Ordercopy(){
        if($this->uri->segment(3,0)!=''){
            $check=$this->uri->segment(3,0);
        }
        else{
            $check=-1;
        }
        switch($check){
            case 1:{
                $data['title']='Renewal Order Copy';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - RENEWAL';
                $data['check']=1;
                break;
            }
            case 2:{
                $data['title']='Order Copy for Tamil Medium Classes';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - TAMIL MEDIUM CLASSES';
                $data['check']=2;
                break;
            }
            case 3:{
                $data['title']='Order Copy for Additional Classes/Upgradation/Additional Groups';
                $data['subtitle']='LIST OF APPLIED SCHOOLS - UPGRADATION';
                $data['check']=3;
                break;
            }
            case 4:{
                $data['title']='Order Copy for New School Registration';
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
        
       $data['list']=$this->Homemodel->ordercopylist($data['check']); 
       $this->load->view('newSchool/Ordercopy',$data);
    }
    function saveUdise(){
        //print_r($_POST);die();
        foreach($_POST as $post => $value){
            if (strpos($post, 'udise_') !== false && $value!="") {
                $data[] = array(
                    'temp_id'       => explode('_',$post)[1],
                    'udise_code'    => $value==""?NULL:$value
                );
            }
        }
        if(!empty($data)){
            if($this->Homemodel->saveUdise($data)){
                $tableNames = ['emis_userlogin','schoolnew_basicinfo','schoolnew_academic_detail','schoolnew_infra_detail'];

               
                foreach($data as $d){
                    $i=0;
                    $allcolumn = $this->Homemodel->callprofileview($d['temp_id']);

                    foreach($allcolumn as $columns){
                        foreach($columns as $idx => $value){
                            $findtable[]=$idx;
                        }   
                    }
                    
                    $foundtables = $this->Homemodel->findtablename(implode("','",$findtable),implode("','",$tableNames)," ORDER BY FIELD(TABLE_NAME,'".implode("','",$tableNames)."')");
                    foreach($foundtables as $tables){
                        $tablelist = $this->Datamodel->getTableDescribtion($tables['TABLE_NAME']);
                        if($tables['TABLE_NAME'] == 'schoolnew_basicinfo'){
                            $update['id'] = $d['temp_id'];
                        }
                        foreach($tablelist as $colname){
                            foreach($allcolumn as $columns){
                                foreach($columns as $idx1 => $value1){
                                    if($colname['Field']==$idx1){
                                        $update[$colname['Field']]=$value1;
                                        //echo($tables['TABLE_NAME']."----------------".$colname['Field']."<br/>");
                                        
                                    }
                                    
                                }
                            }    
                        }
                        $arr = array('tablename' => $tables['TABLE_NAME'],
                             'tabledata' => $update,
                             'multi'     => 0,
                             'referid'   => array_search($d['temp_id'],$update),
                             'refervalue'=> $d['temp_id']
                        );
                        //echo array_search($d['temp_id'],$update);die();
                        //echo 'Conflict check';
                        if(!$this->Homemodel->insertorupdatedata($arr)){
                            die("Error");
                        }
                        unset($update);
                    }
                    $mail = array(
                            'subject' => 'EMIS | New School Udise Login',
                            'usercat' => 'Udise Code',
                            'userpass'=> 'Udise Password'
                            );
                    $this->send_mail($allcolumn[$i]['sch_email'],$allcolumn[$i]['udise_code'],$allcolumn[$i]['ref'],$mail);
                    $i++;
                }
                $this->session->set_flashdata('udise_code', '<div class="alert alert-success"><strong>Success!</strong> Udise Code is Updated for Given Schools.</div>');
            }else{
               $this->session->set_flashdata('udise_code', '<div class="alert alert-danger"><strong>Error!</strong> Kindly Try After Sometime.</div>');
            }
        }
        
        redirect('Newschool/Ordercopy/4');
    }
    
    function emailTemplate(){
        $this->load->view('newSchool/emailTemplate');
    }
    
    function pdfordercopy(){
        $this->load->view('newSchool/pdfreport');
    }
    
    function newschoolreport(){
        
        $check = $this->uri->segment(3,0);
        $data['group']=$this->allGroupAndNext();
        
        switch($check){
            case 1:{$schid=[2,3,16,18,27,29,32,34,42,28];break;}
            case 2:{$schid=[2,3,16,18,27,29,32,34,42];break;}
            case 4:{$schid=[28];break;}
        }
        if($check !=0){
            $where = ' sch_directorate_id in ('.implode(',',$schid).') ';
        }
        //print_r($where);die();

        switch($check){
            case 2:{
                $data['title']='New School Registration Report';
                $data['subtitle']='LIST OF NEW SCHOOLS - STATUS REPORT';
                //$check = 1;
                break;
            }
            case 4:{
                $data['title']='New School Registration Report';
                $data['subtitle']='LIST OF NEW SCHOOLS - STATUS REPORT';
                //$check = 1;
                break;
            }
        }
        //print_r($data['group']); die();
        if($check !=0){
            $where.= $this->uri->segment(5,0)==0?' and school_key_id is not null'.$this->allWhereCondtion():$data['group']['where'];
        }
        $data['list'] = json_decode(json_encode($this->Homemodel->newschoolreportlist($where,$data['group']['group'])),true);
        
        $this->load->view('newSchool/newschoolreport',$data);
    }
    
    
    
    function allWhereCondtion(){
        //echo $this->session->userdata('emis_user_type_id');die();
        $where='';
        switch($this->session->userdata('emis_user_type_id')){
            case 1:{
                $where=' AND school_key_id='.$this->session->userdata('emis_school_id');
                break;
            }
            case 2:
            case 6:{
                $where=' AND block_id='.$this->session->userdata('emis_block_id');
                break;
            }
            case 3:
            case 9:{
                $where=' AND district_id='.$this->session->userdata('emis_district_id');
                break;
            }
            case 4:
            case 10:{
                $where=' AND edu_dist_id='.$this->session->userdata('emis_deo_id');
                break;
            }
            case 5:{
                $where='';
                break;
            }
        }
        return $where;
    }
    
    
    function allGroupAndNext(){
        $groupandnext=array();
        switch($this->session->userdata('emis_user_type_id')){
            case 5:{
                switch($this->uri->segment(5,0)){
                    case '0':{
                        $groupandnext['group']='district_id';
                        $groupandnext['groupname']='district_name';
                        $groupandnext['next']='EDU';
                        $groupandnext['reportid']='emis_district_id';
                        $groupandnext['ctrl']='State';
                        break;
                    }
                    case 'EDU':{
                        $groupandnext['group']='edu_dist_id';
                        $groupandnext['groupname']='edu_dist_name';
                        $groupandnext['next']='BLK';
                        $groupandnext['where']=' AND district_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'BLK':{
                        $groupandnext['group']='block_id';
                        $groupandnext['groupname']='block_name';
                        $groupandnext['next']='SCH';
                        $groupandnext['where']=' AND edu_dist_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'SCH':{
                        $groupandnext['group']='school_key_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND block_id='.$this->uri->segment(4,0);
                        break;
                    }
                }
                break;
            }
            case 2:
            case 6:{
                switch($this->uri->segment(5,0)){
                    case '0':{
                        $groupandnext['group']='school_key_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['reportid']='emis_block_id';
                        $groupandnext['where']=' AND block_id='.$this->uri->segment(4,0);
                        break;
                    }
                }
                break;
            }
            case 3:
            case 9:{
                switch($this->uri->segment(5,0)){
                    case '0':{
                        $groupandnext['group']='edu_dist_id';
                        $groupandnext['groupname']='edu_dist_name';
                        $groupandnext['next']='BLK';
                        $groupandnext['reportid']='emis_district_id';
                        $groupandnext['ctrl']='Ceo_District';
                        
                        break;
                    }
                    case 'BLK':{
                        $groupandnext['group']='block_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND edu_dist_id='.$this->uri->segment(4,0);
                        break;
                    }
                    case 'SCH':{
                        $groupandnext['group']='school_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND block_id='.$this->uri->segment(4,0);
                        break;
                    }
                }
                break;
            }
            case 4:
            case 10:{
                switch($this->uri->segment(5,0)){
                    case '0':{
                        $groupandnext['group']='block_id';
                        $groupandnext['groupname']='block_name';
                        $groupandnext['next']='SCH';
                        $groupandnext['reportid']='emis_deo_id';
                        $groupandnext['ctrl']='Deo_District';
                        break;
                    }
                    case 'SCH':{
                        $groupandnext['group']='school_id';
                        $groupandnext['groupname']='school_name';
                        $groupandnext['next']='';
                        $groupandnext['where']=' AND block_id='.$this->uri->segment(4,0);
                        break;
                    }
                    
                }
                break;
            }
        }
        return $groupandnext;
    }
    
    public function ordercopydms(){
        $this->load->view('newSchool/pdfreportdms');
    }

    public function newschlapplist_post(){
        $token = Common::userToken();
        $emis_loggedin = $token['status'];

        $records = $this->post('records'); //For Director login
        
        if($token['emis_usertype']=='5'){
            $token['dist_id'] = $records['dist_id'];
        }        
        $result = $this->Homemodel->newschlapplist_get($token);
        
        if(!empty($result)){
            $this->response(['dataStatus' => true,
            'status'  => REST_Controller::HTTP_OK,
            'message' => 'Success',
            'schl_list' => $result],REST_Controller::HTTP_OK);   
        }else{
            $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_BAD_REQUEST,
            'message' => 'No Data Available',
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function formforward_post(){
        $token = Common::userToken();
        $emis_loggedin = $token['status'];
        //$records['emis_usertype'] = $token['emis_usertype'];        
        //$block_id = $token['block_id'];
        //echo "hi";die();
        $records = $this->post('records'); 
        print_r($records);die();   
        $result = $this->Homemodel->formforward($block_id);
        
        if(!empty($result)){
            $this->response(['dataStatus' => true,
            'status'  => REST_Controller::HTTP_OK,
            'message' => 'Success',
            'schl_list' => $result],REST_Controller::HTTP_OK);   
        }else{
            $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_BAD_REQUEST,
            'message' => 'No Data Available',
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    /**New Schl Reg form 3 api by wesley starts here**/
    public function schlregthree_post(){
        $records = $this->post('records');
        $result = $this->Homemodel->insertorupdateschlreg3($records);
        if(!empty($result)){
            $this->response(['dataStatus' => true,
            'status'  => REST_Controller::HTTP_OK,
            'message' => 'Success',],REST_Controller::HTTP_OK);   
        }else{
            $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_BAD_REQUEST,
            'message' => 'Some problems occurred, please try again.',
            ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    /**New Schl Reg form 3 api by wesley ends here**/

    /**New Schl Reg data in doc upload api by wesley starts here**/
    // public function docuplddata_post(){
    //     $records = $this->post('records');
    //     $result = $this->Homemodel->docuplddata($records);
    //     if(!empty($result)){
    //         $this->response(['dataStatus' => true,
    //         'status'  => REST_Controller::HTTP_OK,
    //         'message' => 'Success',],REST_Controller::HTTP_OK);   
    //     }else{
    //         $this->response(['dataStatus' => false,
    //         'status'  => REST_Controller::HTTP_BAD_REQUEST,
    //         'message' => 'Some problems occurred, please try again.',
    //         ],REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }
    /**New Schl Reg data in doc upload api by wesley ends here**/

    public function schlReg2_post(){
        $token = Common::token();
        $emis_loggedin = $token['status'];
        if($emis_loggedin) {
            $parent_records = $this->post('records');
            $parent_table = 'newschool_detailsland';
            $first_child_table = 'newschool_classroomlevel_entry';
            $second_child_table = 'newschool_library_entry';    
            $additionalInformation = '';
            if(!empty($parent_records)){
              $app_id = $parent_records['app_id']; 
              $part = $parent_records['part'];    
              unset($parent_records['part']);      
              if(!empty($app_id)){
                        // echo "app_id".$app_id;die();
                        $where = array('app_id'=>$app_id);
                        $a=array();$b=array();$c=array();$d=array();
                        $param = array('id');
                        $first_id_arr  = Common::get_multi_withdyncol_list($param,'newschool_classroomlevel_entry',$where);
                        for($i=0;$i<count($first_id_arr);$i++){ array_push($b,$first_id_arr[$i]->id); }
                        $second_param = array('id');
                        $second_id_arr  = Common::get_multi_withdyncol_list($second_param,'newschool_library_entry',$where);
                        for($i=0;$i<count($second_id_arr);$i++){ array_push($d,$second_id_arr[$i]->id); }

                    if(!empty($parent_records[$first_child_table])){
                      
                     $first_child_records = $parent_records[$first_child_table];
                     for($i=0;$i<count($first_child_records);$i++){
                        if($first_child_records[$i]['classroomlevel_entry_inx_id'] !== ''){
                            $fc_where = array('app_id'=>$app_id,'id'=>$first_child_records[$i]['classroomlevel_entry_inx_id']);
                            array_push($a,$first_child_records[$i]['classroomlevel_entry_inx_id']);
                            unset($first_child_records[$i]['classroomlevel_entry_inx_id']);
                            $first_child_records[$i]['modified_date'] = date('Y-m-d h:i:s',strtotime("now"));
                            $fc_data = $this->Homemodel->details_update('newschool_classroomlevel_entry',$first_child_records[$i],$fc_where);
                            // echo 'check 1 update';die();
                            $check[$i] =  ($fc_data['affected_rows'] > 0) ? 1 :0;
                        }else if($first_child_records[$i]['classroomlevel_entry_inx_id'] === ''){ 
                            unset($first_child_records[$i]['classroomlevel_entry_inx_id']);
                            $first_child_records[$i]['app_id'] = $app_id;
                            $first_child_records[$i]['created_date'] = date('Y-m-d h:i:s',strtotime("now"));
                            $fc_data = $this->Homemodel->details_insert('newschool_classroomlevel_entry',$first_child_records[$i]);
                            $check[$i] =  $fc_data ? 1 :0;
                            // echo 'check 1 insert';die();
                        }
                     }//for-outer closed
                    }// $parent_records[$first_child_table] if not empty ;
                    else{ $check[0] =0; }// $parent_records[$first_child_table] else empty ;
                    
                    if(!empty($b)){
                        $first_result_compare = array_values(array_diff($b, $a));
                    }else $first_result_compare = array();
                    if(!empty($first_result_compare)){ $first_result_delete = $this->Homemodel->details_delete('newschool_classroomlevel_entry',$first_result_compare,$app_id); }else{ $first_result_delete = 0; }
                    
                    $additionalInformation =  (array_sum($check) > 0) ? $additionalInformation."Classroom level Entry Table Updated and " : ($first_result_delete > 0) ? $additionalInformation."Classroom level Entry Table Updated and " : $additionalInformation;


                    if(!empty($parent_records[$second_child_table])){
                        $second_child_records = $parent_records[$second_child_table];
                        for($i=0;$i<count($second_child_records);$i++){
                            if($second_child_records[$i]['library_entry_inx_id'] !== ''){
                            $sc_where = array('app_id'=>$app_id,'id'=>$second_child_records[$i]['library_entry_inx_id']);
                            array_push($c,$second_child_records[$i]['library_entry_inx_id']);
                            unset($second_child_records[$i]['library_entry_inx_id']);
                            $second_child_records[$i]['modified_date'] = date('Y-m-d h:i:s',strtotime("now"));
                            $sc_data = $this->Homemodel->details_update('newschool_library_entry',$second_child_records[$i],$sc_where);
                            $sc_check[$i] =  ($sc_data['affected_rows'] > 0) ? 1 :0;
                            }else if($second_child_records[$i]['library_entry_inx_id'] === ''){ 
                            unset($second_child_records[$i]['library_entry_inx_id']);
                            $second_child_records[$i]['app_id'] = $app_id;
                            $second_child_records[$i]['created_date'] = date('Y-m-d h:i:s',strtotime("now"));
                            $sc_data = $this->Homemodel->details_insert('newschool_library_entry',$second_child_records[$i]);
                            $sc_check[$i] =  $sc_data ? 1 :0;
                            // echo 'insert';
                            }
                        }//for-outer closed    
                    }else{ $sc_check[0] =0; }
                    if(!empty($d)){
                        $second_result_compare = array_values(array_diff($d, $c));
                    }else $second_result_compare = array();
                    if(!empty($second_result_compare)){ $second_result_delete = $this->Homemodel->details_delete('newschool_library_entry',$second_result_compare,$app_id); }else{ $second_result_delete = 0; }
                    $additionalInformation =  (array_sum($sc_check) > 0) ? $additionalInformation."Library Entry Table Updated and " : ($second_result_delete>0) ? $additionalInformation."Library Entry Table Updated" : $additionalInformation;
                    // echo 'second_result_delete[affected_rows]'.$second_result_delete;
                
                    if(isset($parent_records[$second_child_table])){ unset($parent_records[$second_child_table]);}
                    if(isset($parent_records[$first_child_table])){unset($parent_records[$first_child_table]);}

                if(!empty($parent_records['detailsland_inx_id'])){
                    $land_id = $parent_records['detailsland_inx_id'];
                    unset($parent_records['detailsland_inx_id']);
                    $parent_records['temp_id']  = $parent_records['app_id'];
                    $p_where = array('temp_id'=>$app_id,'id'=>$land_id);
                    unset($parent_records['app_id']);
                    $parent_data = $this->Homemodel->details_update('newschool_detailsland',$parent_records,$p_where);
                    $additionalInformation =  ($parent_data['affected_rows'] > 0) ? $additionalInformation."Details Land Table Updated" :$additionalInformation;
                    // echo 'update';
                }else{ 
                    $parent_records['temp_id']  = $parent_records['app_id'];
                    unset($parent_records['detailsland_inx_id']);
                    unset($parent_records['app_id']);
                    $parent_data = $this->Homemodel->details_insert('newschool_detailsland',$parent_records);
                    $additionalInformation =  $parent_data ? $additionalInformation."Details Land Table Saved and " :$additionalInformation;
                    // echo 'insert';
                }// if-else parent-index check closed
                if($parent_data){                 
                    $r_data = array('part_2'=>$part);
                    $r_where = array('temp_id'=>$app_id);                     
                    $register_comp = $this->Homemodel->details_update('newschool_registercomplete',$r_data,$r_where);
                    $additionalInformation =  ($register_comp['affected_rows'] > 0) ? $additionalInformation." New school Register Completed " :" There is no changes in New school Register ";
                    $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'additionalMessage'=>$additionalInformation,'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK);
                }

                if($additionalInformation){
                    $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'additionalMessage'=>$additionalInformation,'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK);
                }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Details Not Updated Please Try Again!'],REST_Controller::HTTP_OK);                 
              }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK);//if-else appid closed
            }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'There is No Content For Update. Please Try-again !'],REST_Controller::HTTP_OK); //if-else parent closed
        }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
    }

    public function newschldtls_get(){
        
        // $result = $this->Homemodel->newschlapplist_get($block_id);
        
           $token = Common::token();
           $emis_loggedin = $token['status'];
           if($emis_loggedin) {
                $app_id = $this->get('app_id');
                if(isset($app_id)){     
                        if($app_id != ''){
                                
                                $newschoolreg_screen1 = $this->Homemodel->get_newschool_details($app_id);
                                $detailsland= $this->Homemodel->get_newschool_detailsland($app_id);
                                $newschoolreg_screen3 = $this->Homemodel->get_newschool_trustentry($app_id);
                                $newschoolreg_screen4 = $this->Homemodel->get_newschool_registercomplete($app_id);
                                $application_status = $this->Homemodel->get_app_status($app_id);
                                if(!empty($detailsland)){
                                    $newschoolreg_screen2['detailsland'] = $detailsland;
                                    $newschoolreg_screen2['classroomlevel_entry'] = $this->Homemodel->get_newschool_classroomlevel_entry($app_id);
                                    // id as classroomlevel_entry_inx_id, school_key_id, app_id, school_type, num_rooms
                                    $newschoolreg_screen2['library_entry'] = $this->Homemodel->get_newschool_library_entry($app_id);
                                    // id as library_entry_inx_id, school_key_id, app_id, library_type, num_books, ncert_books
                                }
                                else{
                                    $newschoolreg_screen2 = array();
                                }
                                
                                if(!empty($newschoolreg_screen1) || !empty($newschoolreg_screen2) || !empty($newschoolreg_screen3) || !empty($newschoolreg_screen4)){
                                    $this->response(['dataStatus'=>true,
                                                     'status'=>REST_Controller::HTTP_OK,
                                                     'message'=>"New School Register ( ".$token['user_type']." )",
                                                     'screen_1'=>(!empty($newschoolreg_screen1)) ? $newschoolreg_screen1 : array(),
                                                     'screen_2'=>(!empty($newschoolreg_screen2)) ? $newschoolreg_screen2 : array(),
                                                     'screen_3'=>(!empty($newschoolreg_screen3)) ? $newschoolreg_screen3 : array(),
                                                     'screen_4'=>(!empty($newschoolreg_screen4)) ? $newschoolreg_screen4 : array(),
                                                     'app_status'=>(!empty($application_status)) ? $application_status : array()],REST_Controller::HTTP_OK);  
                                }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message' => 'No Records Found!, please try again.'],REST_Controller::HTTP_OK);
                        
                        } else if ($app_id == '') $this->response(['dataStatus'=>false,
                                                                   'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                                   'message'=>'Application ID Not Found Pleas try again!'],REST_Controller::HTTP_OK); 
                } else $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                                        'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);                
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
   }
   
    public function newschldocdtls_get(){

        $token = Common::token();
        $emis_loggedin = $token['status'];
        $emis_usertype = (int)$token['emis_usertype'];
        if($emis_loggedin) {
                    $app_id = $this->get('app_id');
                    if(isset($app_id)){     
                            if($app_id != ''){
                                    
                                    $fileuploads["schl_appli_fee_detls"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,13);
                                    $fileuploads["schl_certifi_detls"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,4);
                                    $fileuploads["building_doc"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,5);
                                    $fileuploads["building_stab_certi"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,6);
                                    $fileuploads["building_license"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,7);
                                    $fileuploads["sanitary_certi"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,8);
                                    $fileuploads["fire_safety"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($app_id,9);
                                    $fileuploads["application_status"] = $this->Homemodel->get_app_status($app_id);

                                    if(!empty($fileuploads)){
                                        $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>"New School`s Documents ( ".$token['user_type']." )",'docs'=>$fileuploads],REST_Controller::HTTP_OK);  
                                    }else $this->response(['dataStatus' => false,
                                                           'status'  => REST_Controller::HTTP_NO_CONTENT,
                                                           'message' => 'No Records Found!, please try again.',
                                   ],REST_Controller::HTTP_OK);
                                        
                                // if(emis_user_id == '' ){ $this->response(['dataStatus'=>false,
                                //     'status'=>REST_Controller::HTTP_NOT_FOUND,
                                //     'message'=>'There is No App-ID!'],REST_Controller::HTTP_OK); 
                            
                            } else if ($app_id == '') $this->response(['dataStatus'=>false,
                                                                     'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                                     'message'=>'Application ID Not Found, please Try Again!'],REST_Controller::HTTP_OK); 
                    } else $this->response(['dataStatus' => false,
                                            'status'  => REST_Controller::HTTP_NOT_FOUND,
                                            'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);                
        } else $this->response(['dataStatus'=>false,
                                'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
       }
    }
    

    

  ?>