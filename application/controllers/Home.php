<?php
require APPPATH . '/third_party/mpdf/mpdf.php';
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
    $this->load->model('Homemodel');
    $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
  	$this->load->model('TimetableModel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel');
    $this->load->model('Blockmodel');
    $this->load->library('AWS_S3');
    $this->load->helper(array('form','url','html','common_helper'));
    $this->load->library(array('form_validation','session'));
    $this->load->helper('security');

  }
  // public function emis_school_student_class_get()
  // {
	 // $class_id=10;
     // $section_id='A';	
    // $allstudss=array ('name'=>'tamil');
		 
     // $allstuds= $this->Homemodel->get_classwise_student_api($class_id,$section_id);
	 // print_r($allstuds);
	 // //$allstuds['status'] = REST_Controller::HTTP_OK;

	// $this->response($allstuds, REST_Controller::HTTP_OK);
  // }
    public function emis_school_home()
   {
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){ 

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if( $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
       $school_id=$this->session->userdata('emis_school_id');
      $data['img_path']=$this->Homemodel->getpic($school_id);
     // print_r($data['img_path']);
      
        $this->load->view('emis_school_home',$data);
     }

    }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){
          $this->load->view('emis_school_home');
    }else if($user_type_id==14)
    {
      redirect('Udise_staff/emis_Udise_staff_dash');
    }

     } else { redirect('/', 'refresh'); }
   }

    public function emis_school_profile()
    {
        /*$this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $profile=$this->session->userdata('school_profile');//$this->Datamodel->getProfileComplete($this->session->userdata('emis_school_udise'));
        if($emis_loggedin) {
            $school_udise=$this->session->userdata('emis_school_id');
            $data['profile']=$this->Homemodel->ModelForAllParts($school_udise);
            $data['flag']=$profile[0];
            //$this->load->view('emis_school_profile',$data);
                        
        } else { redirect('/', 'refresh'); }*/
        $this->load->view('emis_school_home');
   }

   

   /* public function update()
   {

 
   	$value = $this->input->post('value');
    $name = $this->input->post('name');
    
    //Check the name should always be the sublist of editable columns--too be added
    //log_message('debug', $name);
    
        Get the school id from session and update here and remove the hard coded value Homemodel.php

    
   // $this->load->database(); 
  	//$this->load->model('Homemodel');
  	$data = array( $name => $value );

   	if( $this->Homemodel->updatedata($data) )
    {
       echo true;
    }
    else
    {
      echo false;
    }

   	

   } */
   
   
    public function emis_school_studentlist(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']         = $standardlist[0]->low_class;
     $data['highclass']        = $standardlist[0]->high_class;
     $data['allclass']         = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1($school_id));
     // $enrolment                = $this->Homemodel->getenrollment($school_id);
     // $data['enrolltotal']      = $enrolment[0]->total;
    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_school_stulist',$data);
    // echo json_encode($data['allclass']);
    }

      }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_stulist',$data);
    }



      } else { redirect('/', 'refresh'); }

  }
   
   
  /*public function emis_school_studentlist(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

	$class_id=$this->uri->segment(3,0);
    $data['classid'] = $class_id;
	$section_id=$this->uri->segment(4,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']         = $standardlist[0]->low_class;
     $data['highclass']        = $standardlist[0]->high_class;
     $data['allclass']         = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1($school_id));
	  
	$data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
	 $data['allstuds']  = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);
	
	 //echo json_encode($data['allclass']);
	 //echo json_encode($data['allsections']);
     // $enrolment                = $this->Homemodel->getenrollment($school_id);
     // $data['enrolltotal']      = $enrolment[0]->total;

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_school_stulist',$data);
    // echo json_encode($data['allclass']);
    }

      }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_stulist',$data);
    }



      } else { redirect('/', 'refresh'); }

  }*/

    public function emis_school_stulist_neet_jee(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']         = $standardlist[0]->low_class;
     $data['highclass']        = $standardlist[0]->high_class;
     $data['allclass']         = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1($school_id));
     // $enrolment                = $this->Homemodel->getenrollment($school_id);
     // $data['enrolltotal']      = $enrolment[0]->total;
	
    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_schools_stulist_neet_jee',$data);
    // echo json_encode($data['allclass']);
    }

      }
      else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_stulist',$data);
    }



      } else { redirect('/', 'refresh'); }

  }

    public function emis_school_studentsectionwise(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $data['classid'] = $class_id;
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

       $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_stulist1',$data);
  }

     }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_stulist1',$data);
    }

      } else { redirect('/', 'refresh'); }

  }

      public function emis_school_neet_jee_seclist(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $data['classid'] = $class_id;
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

       $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_neet_jee_seclist',$data);
  }

     }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_stulist1',$data);
    }

      } else { redirect('/', 'refresh'); }

  }

   public function gallery()
   {
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin'); 
       $this->load->view('gallery'); 
   }
  public function emis_school_studentsectionwisedata(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $class_id=$this->uri->segment(3,0);
        $data['classid'] = $class_id;
    $section_id=$this->uri->segment(4,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $data['allstuds']  = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
		//echo json_encode($data['allstuds']);
		//echo json_encode($data['class']);
    $this->load->view('emis_school_stulist2',$data);
    }

    }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){
	
    $this->load->view('emis_school_stulist2',$data);
    }

      } else { redirect('/', 'refresh'); }
  }

    public function emis_neet_jee_studentlist(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $class_id=$this->uri->segment(3,0);
    $section_id=$this->uri->segment(4,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $data['allstuds']  = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_schools_neet_jee_studata',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_schools_neet_jee_studata',$data);
    }

      } else { redirect('/', 'refresh'); }
  }

      public function emis_examdatasave($section,$class){
       $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {

        if ($_POST['unique_id']) {
           foreach ($_POST['unique_id'] as $key => $value) {
            $update_examdta = $this->Homemodel->update_examdta($key,$value);
           }
           
        }
      
      redirect('Home/emis_neet_jee_studentlist/'.$section.'/'.$class);
   

      } else { redirect('/', 'refresh'); }
  }


  


   public function emis_student_profile1()
   {
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->database();
    $this->load->model('Homemodel');
    $this->load->model('Statemodel');
    $this->load->model('Datamodel');

    // $studentid = $this->session->userdata('emis_stud_id');
    $studentid =  $this->uri->segment(3,0);
    $this->session->set_userdata('emis_stud_id', $studentid);
    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

    $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{

    $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
    $data['name'] = $stuprofile1[0]->name;
    $data['tname'] = $stuprofile1[0]->name_tamil;
    $data['name_id_card'] = $stuprofile1[0]->name_id_card;
    $data['name_tamil_id_card'] = $stuprofile1[0]->name_tamil_id_card;
    $data['aadhaar_uid_number'] = $stuprofile1[0]->aadhaar_uid_number;
    $data['enrollmentnumber'] = $stuprofile1[0]->enrollmentnumber;
    $data['uniquenumber'] = $stuprofile1[0]->unique_id_no;
    $data['dob'] = $stuprofile1[0]->dob;
    $data['gender'] = $stuprofile1[0]->gender;


    $data['religionlist'] = $this->Homemodel->Religionlist();
    $data['communitylist'] = $this->Homemodel->communitylist();
    $data['subcaselist'] = $this->Homemodel->subcaselist();
    $data['mothertlist'] = $this->Homemodel->mothertlist();
    $data['disadvantageslist'] = $this->Homemodel->disadvantageslist();
    $data['disabilitieslist'] = $this->Homemodel->disabilitieslist();
    $data['religions'] = $this->Datamodel->getallreligions();
    $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
     //echo "<pre>";var_dump($stuprofile1[0]->community_id);exit();

    $data['religion'] = $this->Homemodel->getreligion($stuprofile1[0]->religion_id);
    $data['community'] = $this->Homemodel->getcommunity1($stuprofile1[0]->community_id);
    //echo "<pre>";var_dump($data['community']);exit();
    $data['subcaste'] = $this->Homemodel->getsubcase($stuprofile1[0]->subcaste_id);
    $data['mother11'] = $this->Homemodel->getmother($stuprofile1[0]->mothertounge_id); 

   $bloodgroupname = $this->Homemodel->getbloodgroupname($stuprofile1[0]->bloodgroup);

  if(!empty($bloodgroupname)){
  $data['Bloodgpid'] = $bloodgroupname[0]->id; 
  $data['Bloodgpname'] = $bloodgroupname[0]->group; 
  }else{
  $data['Bloodgpid'] ="" ;
  $data['Bloodgpname'] = "" ; 
  }

    $DisadvantagegroupName = $this->Homemodel->getDisadvantagegroupName($stuprofile1[0]->disadvantaged_group);

    if(!empty($DisadvantagegroupName)){
  $data['DisadvantagegroupNameid'] = $DisadvantagegroupName[0]->id; 
  $data['DisadvantagegroupName'] = $DisadvantagegroupName[0]->dis_group_name; 
  }else{
 $data['DisadvantagegroupNameid'] ="" ;
  $data['DisadvantagegroupName'] = "" ; 
  }

  $DisabilityGroupName = $this->Homemodel->getDisabilityGroupName($stuprofile1[0]->differently_abled);

    if(!empty($DisabilityGroupName)){
  $data['DisabilityGroupNameid'] = $DisabilityGroupName[0]->id; 
  $data['DisabilityGroupName'] = $DisabilityGroupName[0]->da_name; 
  }else{
 $data['DisabilityGroupNameid'] ="" ;
  $data['DisabilityGroupName'] = "" ; 
  }

    $this->load->view('emis_student_profile1',$data);
     }
     }else{
      echo "Authentication Error! <br/>Not Authorized";
    }
      } else { redirect('/', 'refresh'); }


   }  

   public function emis_student_data_update(){
       $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {

        // error_reporting(E_ALL); ini_set('display_errors', '1');
        $this->load->library('session');    
        // $studentid = $this->session->userdata('emis_stud_id');
        $studentid =  $this->uri->segment(3,0);
        $this->session->set_userdata('emis_stud_id', $studentid);
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));    
        date_default_timezone_set('Asia/Calcutta');        
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $datetime = $date." ".$time;
         $data = array( 
                      'religion_id'      =>$this->input->post('emis_reg_religion'),
                      'community_id'    =>$this->input->post('emis_reg_community'),
                      'subcaste_id'      =>$this->input->post('emis_reg_subcaste'),                                 
                    );

          $this->load->database();
           $this->load->model('Homemodel');
            $this->load->model('Registermodel');
          $this->Homemodel->prof1dataupdate($studentid,$data);


      $school_id=$this->session->userdata('emis_school_id');
      $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
     
      redirect('Home/emis_student_profile1/'.$studentid,'refresh');

      } else { redirect('/', 'refresh'); }

}  

   public function emis_student_data_update1(){
       $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {

        // error_reporting(E_ALL); ini_set('display_errors', '1');
        $this->load->library('session');    
        // $studentid = $this->session->userdata('emis_stud_id');
        $studentid =  $this->uri->segment(3,0);
        $this->session->set_userdata('emis_stud_id', $studentid);
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));   
        $aadhaarnumber = "";
        $enrollmentno = "";
        $aadhaarstatus = "";
        $aadhaar  = $this->input->post('emis_reg_stu_aadhaar');
        $enroll   = $this->input->post('emis_stu_idcard_enroll');
        if($aadhaar != "")  { $aadhaarnumber = $aadhaar;  } else { $aadhaarnumber == 0; }
        if($enroll  != "")  { $enrollmentno  = $enroll;  } else { $enrollmentno == 0; }
        if($aadhaar == "" || $enroll == "") { $aadhaarstatus = "Applied"; } else { $aadhaarstatus = "Notapplied";  }
 
         $data = array( 
                      'aadhaar_uid_number'      =>$aadhaarnumber,
                      'enrollmentnumber'        =>$enrollmentno,
                      'adhaarappliedstatus'     =>$aadhaarstatus                                
                    );

          $this->load->database();
           $this->load->model('Homemodel');
            $this->load->model('Registermodel');
          $this->Homemodel->prof1dataupdate($studentid,$data);


      $school_id=$this->session->userdata('emis_school_id');
      $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
     
      redirect('Home/emis_student_profile1/'.$studentid,'refresh');

      } else { redirect('/', 'refresh'); }

}     

   public function emis_student_profile2()
   {
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
     // $studentid = $this->session->userdata('emis_stud_id');
    $studentid =  $this->uri->segment(3,0);
    $this->session->set_userdata('emis_stud_id', $studentid);
    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->database(); 
    $this->load->model('Homemodel');
    $this->load->model('Statemodel');
    $this->load->model('Datamodel');
    $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
    $data['mother_name'] = $stuprofile1[0]->mother_name;
    $data['father_name'] = $stuprofile1[0]->father_name;
    $data['guardian_name'] = $stuprofile1[0]->guardian_name;
    $data['father_occupation'] = $this->Homemodel->getoccupation($stuprofile1[0]->father_occupation);  
    $data['mother_occupation'] = $this->Homemodel->getoccupation($stuprofile1[0]->mother_occupation); 
    $data['mother_occupation1'] = $stuprofile1[0]->mother_occupation;
    $data['father_occupation1'] = $stuprofile1[0]->father_occupation;  
    $data['parent_income'] = $this->Homemodel->getparentincome($stuprofile1[0]->parent_income);
    $data['parent_income1'] =$stuprofile1[0]->parent_income; 

     $data['dateparentincome'] = $this->Homemodel->getparentincomeall();
     $data['parentoccupation'] = $this->Homemodel->getallparentoccupation();
    $this->load->view('emis_student_profile2',$data);
    }
    }else{
      echo "Authentication Error! <br/>Not Authorized";
    }

      } else { redirect('/', 'refresh'); }

   }       

 public function emis_student_profile3()
   {
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
  
    $this->load->library('session'); 
     // $studentid = $this->session->userdata('emis_stud_id');
    $studentid =  $this->uri->segment(3,0);
    $this->session->set_userdata('emis_stud_id', $studentid);
    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){


     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->database(); 
    $this->load->model('Homemodel');
    $this->load->model('Statemodel');
    $this->load->model('Datamodel');
    $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
    $data['phone_number'] = $stuprofile1[0]->phone_number;
    $data['email'] = $stuprofile1[0]->email;
    $data['house_address'] = $stuprofile1[0]->house_address;
    $data['street_name'] = $stuprofile1[0]->street_name;
    $data['pin_code'] = $stuprofile1[0]->pin_code;
    $data['area_village'] = $stuprofile1[0]->area_village; 
    $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['district'] = $this->Homemodel->getdistrict_id($stuprofile1[0]->district_id);
    $this->load->view('emis_student_profile3',$data);
    }
    }else{
      echo "Authentication Error! <br/>Not Authorized";
    }

  

      } else { redirect('/', 'refresh'); }

   }       
 public function emis_student_profile4()
  {
             $this->load->library('session');
          $emis_loggedin = $this->session->userdata('emis_loggedin');
          if($emis_loggedin) {

          $this->load->library('session'); 
           // $studentid = $this->session->userdata('emis_stud_id');
          $studentid =  $this->uri->segment(3,0);
          $this->session->set_userdata('emis_stud_id', $studentid);
          $school_id=$this->session->userdata('emis_school_id');
          $user_type_id=$this->session->userdata('emis_user_type_id');
          if($user_type_id==1){

           $emis_templog =$this->session->userdata('emis_school_templog');
           $emis_templog1 =$this->session->userdata('emis_school_templog1');
           if($emis_templog==0 || $emis_templog1==0){
              redirect('home/emis_school_gotoredirect','refresh');
           }else{

          $this->load->database();
          $this->load->model('Homemodel');
          $this->load->model('Statemodel');
          $this->load->model('Datamodel');
          
          $classlist1=$this->Datamodel->getclasslist($school_id); 
          $data['lowestclass'] = $classlist1[0]->low_class;

         $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
         $class_studying_id =$this->Homemodel->getclass_studying_id($stuprofile1[0]->class_studying_id);
         $data['classname'] = $stuprofile1[0]->class_studying_id;
         $data['class_studying_id'] = $class_studying_id;
         $data['student_id'] = $studentid;
         $data['class_section'] = $stuprofile1[0]->class_section;
         $data['prev_class_id'] = $stuprofile1[0]->prv_class_std;
         $data['created_at'] = $stuprofile1[0]->created_at;
         $data['prev_class'] = $this->Homemodel->getprvclassname($stuprofile1[0]->prv_class_std);
         $data['school_name'] = $this->Homemodel->getschoolname($stuprofile1[0]->school_id);
         $data['school_udisecode'] = $this->Homemodel->getschooludsccode($stuprofile1[0]->school_id);
         $data['school_admission_no'] = $stuprofile1[0]->school_admission_no;
         $data['doj'] = $stuprofile1[0]->doj;
         $data['pass_fail'] = $stuprofile1[0]->pass_fail;
         $data['education_medium_id'] = $stuprofile1[0]->education_medium_id;
         $data['education_medium_name'] = $this->Homemodel->getschoolmediumname($stuprofile1[0]->education_medium_id);
         $data['group_code_id'] = $stuprofile1[0]->group_code_id;
         $data['rte'] = $stuprofile1[0]->child_admitted_under_reservation;
         $data['aidunaid'] = $stuprofile1[0]->student_admitted_section;
         
         $data['group_code_name'] = $this->Homemodel->getgroup_code_id($stuprofile1[0]->group_code_id);

         $data['cbse_subject1_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject1_id);
         $data['cbse_subject2_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject2_id);
         $data['cbse_subject3_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject3_id);
         $data['cbse_subject4_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject4_id);
         $data['cbse_opt_subject_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_opt_subject_id);
         $data['education_medium_name'] = $this->Homemodel->getmediuminstruct($stuprofile1[0]->education_medium_id);
         //print_r($data['education_medium_name']);
         $manage_cate=$this->Datamodel->getmanagecatename($stuprofile1[0]->school_id);
         // $data['classstudying'] = $this->Datamodel->getallclassstudying();
         $claslimit = $this->Homemodel->getallstandardsbyschool($stuprofile1[0]->school_id);
         $data['classstudying'] = $this->Homemodel->getallclassstudying($claslimit[0]->low_class,$claslimit[0]->high_class);
        
         $data['mediumofinstruction'] = $this->Datamodel->getallmediumofinst($stuprofile1[0]->school_id);
         $data['groupcate'] = $this->Datamodel->getallgroupcodes($manage_cate);
         $data['groupcateid'] = $manage_cate;
         $data['sections'] = $this->Datamodel->getallsection($stuprofile1[0]->school_id,$stuprofile1[0]->class_studying_id);
         $data['managecateid'] = $this->Datamodel->getmanagecateid($stuprofile1[0]->school_id);
         $classlist1=$this->Datamodel->getclasslist($stuprofile1[0]->school_id); 
        
         $data['classlist']=$this->Datamodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class);
        // print_r($data['classlist']);
         $data['prvclasslist']=$this->Homemodel->getsepratesectionlist($stuprofile1[0]->class_studying_id);
         
         $this->load->view('emis_student_profile4',$data);
         }

         }else{
            echo "Authentication Error! <br/>Not Authorized";
          }



           } else { redirect('/', 'refresh'); }

  } 


    public function updatestuprofile()
   {
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $studentid = $this->session->userdata('emis_stud_id');
    $value = $this->input->post('value');
    $name = $this->input->post('name');
    
    //Check the name should always be the sublist of editable columns--too be added
    //log_message('debug', $name);
    /***
        Get the school id from session and update here and remove the hard coded value Homemodel.php

    **/
   // $this->load->database(); 
    //$this->load->model('Homemodel');
    $data = array( $name => $value );

    if( $this->Homemodel->updatestudata($studentid,$data) )
    {
       echo true;
    }
    else
    {
      echo false;
    }


      } else { redirect('/', 'refresh'); }

    

   }

      public function updatestuprofilegender()
   {

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $studentid = $this->session->userdata('emis_stud_id');
    $value = $this->input->post('value');
    $name = $this->input->post('name');
    
    //Check the name should always be the sublist of editable columns--too be added
    //log_message('debug', $name);
    /***
        Get the school id from session and update here and remove the hard coded value Homemodel.php

    **/
     $this->load->database(); 
     $this->load->model('Homemodel');
     $this->load->model('Registermodel');

     $school_id=$this->session->userdata('emis_school_id');
     $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);

      /* first reduce that count */
      $alreadyselectgender =  $stuprofile1[0]->gender;

      $set3=""; 
      $setgender = $alreadyselectgender;
      if($setgender==1){  $set3="b"; }else if($setgender==2){ $set3="g"; }else if($setgender==3){ $set3="t"; }
      $setclass = $stuprofile1[0]->class_studying_id;

      $set1 = 'c';

      $setcolmnnname = $set1.$setclass."_".$set3;
      $settotalcnname = "total_".$set3;
      $settval=$this->Registermodel->getsinglecolmnname($setcolmnnname,$school_id);
      $settotalval=$this->Registermodel->gettotalcolmnname($settotalcnname,$school_id);

      echo 'class '.$setcolmnnname.'<br/>';
   
      $setval1=$settval-1;
      $setotalval1=$settotalval-1;
      $data00=array($setcolmnnname=>$setval1);
      $data11=array($settotalcnname=>$setotalval1);
      $this->Registermodel->maxallchildcount($school_id,$data00);
      $this->Registermodel->maxallchildcount($school_id,$data11);

      /*  fininsh reudce gneder count */

      $key3="";
      $gender = $value;
      if($gender==1){  $key3="b"; }else if($gender==2){ $key3="g"; }else if($gender==3){ $key3="t"; }
      $class = $stuprofile1[0]->class_studying_id;

      $key1 = 'c';

      $colmnnname = $key1.$class."_".$key3;
      $totalcnname = "total_".$key3;
      $getval=$this->Registermodel->getsinglecolmnname($colmnnname,$school_id);
      $getotalval=$this->Registermodel->gettotalcolmnname($totalcnname,$school_id);
   

      $setval=$getval+1;
      $setotalval=$getotalval+1;
      $data33=array($colmnnname=>$setval);
      $data44=array($totalcnname=>$setotalval);
      $res=$this->Registermodel->maxallchildcount($school_id,$data33);
      $res1=$this->Registermodel->maxallchildcount($school_id,$data44);


    $data = array( $name => $value );

    if( $this->Homemodel->updatestudata($studentid,$data) )
    {
       echo true;
    }
    else
    {
      echo false;
    }

      } else { redirect('/', 'refresh'); }

    

   }

  public function savestudentidsession(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session'); 
     $studids = $this->input->post('studid');
     if($studids!="" ){
          $this->session->set_userdata('emis_stud_id',$studids);
      }
      $studid =$this->session->userdata('emis_stud_id');
      if($studid!=""){
        echo true;
      }else{
        echo false;
      }

        } else { redirect('/', 'refresh'); }
  }   

  public function emis_school_studentsearch(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{

      
     $this->load->database(); 
     $this->load->model('Datamodel');
     $district=$this->input->post('emis_stu_search_dist'); if($district==""){  $district=""; }
     $block=$this->input->post('emis_stu_search_block'); if($block==""){  $block=""; }
     $school=$this->input->post('emis_stu_search_school'); if($school==""){  $school=""; }
     $class=$this->input->post('emis_stu_search_class'); if($class==""){  $class=""; }
     $section=$this->input->post('emis_stu_search_section'); if($section==""){  $section=""; }
    if($district!="" || $block!="" || $school!="" || $class!="" || $section!="" ){
     $data['allstuds']  = $this->Homemodel->getallstudsbysearch($district,$block,$school,$class,$section);
     $data['districts']  = $this->Datamodel->getallachooldist();
     // $data['allstuds']  = $this->Homemodel->getallstudsbysearch(null,null,'16102','7',null);
      }else{
     $data['districts']  = $this->Datamodel->getallachooldist();
     }
     $this->load->view('emis_student_search',$data);
     // echo json_encode($data['allstuds']);

   }

       } else { redirect('/', 'refresh'); }

  } 

    public function emis_school_studentsearch_seperate(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
     $this->load->database(); 
     $this->load->model('Datamodel');
     $unique=$this->input->post('emis_stu_search_unique'); if($unique==""){  $unique=""; }
     $aadhaar=$this->input->post('emis_stu_search_adhaar'); if($aadhaar==""){  $aadhaar=""; }
     $mobile=$this->input->post('emis_stu_search_mobile'); if($mobile==""){  $mobile=""; }
    if($unique!="" || $aadhaar!="" || $mobile!=""  ){
     $data['allstuds']  = $this->Homemodel->getallstudsbysearchsep($unique,$aadhaar,$mobile);
     $data['districts']  = $this->Datamodel->getallachooldist();
     // $data['allstuds']  = $this->Homemodel->getallstudsbysearchsep("",'450953092839',"");
      }else{
     $data['districts']  = $this->Datamodel->getallachooldist();
     }
     $this->load->view('emis_student_search',$data);
     // echo json_encode($data['allstuds']);

       } else { redirect('/', 'refresh'); }

  } 

      public function emis_school_studentsearch_seperate1(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
    
     $this->load->database(); 
     $this->load->model('Datamodel');
    
     $dt=$this->input->post('emis_reg_stu_date'); 
     $mnth=$this->input->post('emis_reg_stu_month'); 
     $yr=$this->input->post('emis_reg_stu_year');

      $pin_code1=$this->input->post('emis_stu_search_pincode1');
      
     $dobdate = $yr.'-'.$mnth.'-'.$dt;
     if($dobdate==""){ $dobdate=""; } 

     if($pin_code1==""){  $pin_code1=""; }
  
    if($dobdate!=""  || $pin_code1!="" ){
       // echo json_encode($pin_code1);
     $data['allstuds']  = $this->Homemodel->getallstudsbysearchsep1($dobdate,$pin_code1);
     $data['districts']  = $this->Datamodel->getallachooldist();
      }else{
     $data['districts']  = $this->Datamodel->getallachooldist();
     }
     $this->load->view('emis_student_search',$data);
     // echo json_encode($data);

       } else { redirect('/', 'refresh'); }

  } 

   public function emis_school_studentsearch_seperate2(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
    
     $this->load->database(); 
     $this->load->model('Datamodel');

     // $schoolid="";
     $udisecode=$this->input->post('emis_stu_search_udise');
     $classid=$this->input->post('emis_stu_search_class');
     $section=$this->input->post('emis_stu_search_section2');

     if($udisecode!=""){ 
       $schoolid=$this->Homemodel->getschoolidbyudisecode($udisecode);
     }else{
      $schoolid="";
     }

     if($classid=="" ){  $classid=""; }

     if($section=="" || $section==null){  $section=""; }
  
     if( $schoolid!="" && $classid!="" ){
     $data['allstuds']  = $this->Homemodel->getallstudsbysearchsep2($schoolid,$classid,$section);
     }else{
     $data['districts']  = $this->Datamodel->getallachooldist();
     }
     $this->load->view('emis_student_search',$data);
     // echo json_encode($data);

       } else { redirect('/', 'refresh'); }

  }

  public function getblocksbydistid(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $emis_dist =$this->input->post('distid');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getditss  = $this->Homemodel->getallblocksbydist($emis_dist);
    $getdist='';  
        foreach($getditss as $dis)
        {
            $getdist =$getdist."<option value='".$dis->id."'>".$dis->block_name."</option>";  
        }
         $dists    =  "<select  class='form-control' tabindex='1' id='emis_stu_search_block' name='emis_stu_search_block'>
                                 <option value='' style='color:#bfbfbf;'>Select Block</option>
                                ".$getdist."                           
                            </select> ";
                           
        echo $dists; 

          } else { redirect('/', 'refresh'); }
  }

    public function getschoolbyblockid(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $emis_block =$this->input->post('blockid');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getblocks  = $this->Homemodel->getallschoolsbyblock($emis_block);
    $getblock='';  
        foreach($getblocks as $gb)
        {
            $getblock =$getblock."<option value='".$gb->school_id."'>".$gb->school_name."</option>";  
        }
         $block    =  "<select  class='form-control' tabindex='1' id='emis_stu_search_school' name='emis_stu_search_school'>
                                 <option value='' style='color:#bfbfbf;'>Select School</option>
                                ".$getblock."                           
                            </select> ";
                           
        echo $block; 

          } else { redirect('/', 'refresh'); }
  }

      public function getclassbyschoolid(){

           $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $emis_school =$this->input->post('schoolid');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getschools  = $this->Homemodel->getallclassbyschool($emis_school);
    $getschool='';  
        foreach($getschools as $gs)
        {
            $getschool =$getschool."<option value='".$gs->class_id."'>".$gs->class_studying."</option>";  
        }
         $school    =  "<select  class='form-control' tabindex='1' id='emis_stu_search_class' name='emis_stu_search_class'>
                                 <option value='' style='color:#bfbfbf;'>Select Class</option>
                                ".$getschool."                           
                            </select> ";
                           
        echo $school; 

          } else { redirect('/', 'refresh'); }
  }

        public function getsectionbyclassid(){

             $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $emis_class =$this->input->post('classid');
    print_r($emis_class);
    $emis_school =$this->input->post('schoolid');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getclasses  = $this->Homemodel->getallsectbyclass($emis_school,$emis_class); 
    $a=explode(',',$getclasses);
    $getclass="";
        foreach($a as $v)
        {
            $getclass =$getclass."<option value='".$v."'>".$v."</option>";  
        }
         $class    =  "<select  class='form-control' tabindex='1' id='emis_stu_search_section' name='emis_stu_search_section'> <option value='' style='color:#bfbfbf;'>Select Section</option>
                                ".$getclass."                           
                            </select> ";
                           
        echo $class; 

          } else { redirect('/', 'refresh'); }
  }

 public function Academic_edit(){ 

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $studentid = $this->uri->segment(3,0);
    $this->session->set_userdata('emis_stud_id', $studentid);
    $this->load->database();
    $this->load->model('Homemodel');
    $Ddt=$this->input->post('emis_reg_doj_date_edit');
    $Dmth=$this->input->post('emis_reg_doj_month_edit');
    $Dyr=$this->input->post('emis_reg_doj_year_edit');

    $doj=$Dyr.'-'.$Dmth.'-'.$Ddt;

     $classstud=$this->input->post('emis_class_studying_edit');
     $prevclasStud=$this->input->post('emis_prev_class_edit');
     $passfail='';

     if($prevclasStud==$classstud){ $passfail = 'FAIL'; }else{  $passfail = 'PASS'; }

      $data=array('class_studying_id'       =>$this->input->post('emis_class_studying_edit'),
                     'class_section'     =>$this->input->post('emis_reg_stu_section_edit'),
                     'prv_class_std'     =>$this->input->post('emis_prev_class_edit'),
                     'pass_fail'       =>$passfail,   
                     'education_medium_id'     =>$this->input->post('emis_reg_mediofinst_edit'),
                     'group_code_id'       =>$this->input->post('emis_reg_grup_code_edit'),
                     'cbse_subject1_id'       =>$this->input->post('emis_reg_cbsc_sub1_edit'),
                     'cbse_subject2_id'       =>$this->input->post('emis_reg_cbsc_sub2_edit'),
                     'cbse_subject3_id'       =>$this->input->post('emis_reg_cbsc_sub3_edit'),
                     'cbse_subject4_id'       =>$this->input->post('emis_reg_cbsc_sub4_edit'),
                     'cbse_opt_subject_id'       =>$this->input->post('emis_reg_cbsc_sub5_edit'),
                     'child_admitted_under_reservation'       =>$this->input->post('emis_reg_stu_rte_edit'),
                     'student_admitted_section'       =>$this->input->post('emis_reg_stu_aidunaid_edit')
                     );

     
      $updatedata=$this->Homemodel->updatestudata($studentid,$data);
      redirect('Home/emis_student_profile4/'.$studentid,'refresh');

        } else { redirect('/', 'refresh'); }

     }


  function emis_student_transfer(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $date = date('Y-m-d');
    $time = date('h:i:s');
    $datetime = $date." ".$time;
    $acadeye=date('M Y');

      $academic_year="";
      $month=date('m');
      $year = date('Y');
      if($month<=4){
        $academic_year=$year-1;
      }else{
        $academic_year=$year;
      }
      $this->load->library('session'); 
      // $studentid = $this->session->userdata('emis_stud_id');
      $studentid = $this->input->post('stud_id');
      $school_id=$this->session->userdata('emis_school_id');
      $this->load->database();
      $this->load->model('Homemodel');
      $this->load->model('Registermodel');

      $studentdetails=$this->Homemodel->getstudetailsfortransfer($studentid);
      $data=array('unique_id_no'=>$studentid,
                  'school_id'=>$studentdetails[0]->school_id,
                  'class_studying_id'=>$studentdetails[0]->class_studying_id,
                  'process_type'=>'transfer',
                  'admission_no'=>$studentdetails[0]->school_admission_no,
                  'medium_of_ins'=>$studentdetails[0]->education_medium_id,
                  'academic_year'=>$academic_year,
                  'transfer_date'=>$date,
                  'Status'=>'Active');
      $this->Homemodel->emisaddstutransferhistory($data);
      $this->Homemodel->emischangestudentflag($studentid,$date);
      // echo json_encode($studentdetails);
        echo true;
      } else { redirect('/', 'refresh'); }

     }

  function emis_student_reject(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $date = date('Y-m-d');


      $this->load->library('session'); 
      // $studentid = $this->session->userdata('emis_stud_id');
      $studentid = $this->input->post('stud_id');
      $emis_username=$this->session->userdata('emis_username'); 
      $this->load->database();
      $this->load->model('Homemodel');

      $data=array('request_flag'=>'0',
                  'request_date'=>$date,
                  'request_id'=>$emis_username);
      $status = $this->Homemodel->emisraisearequestflag($studentid,$data);
      // echo json_encode($studentdetails);
        if($status)
          {
            echo true;
          }
        else
        {
          echo false;
        }
      } else { redirect('/', 'refresh'); }

     }

//******************************Start  Raise transfer request ****************************
  function emis_student_raiserequest(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $date = date('Y-m-d');


      $this->load->library('session'); 
      // $studentid = $this->session->userdata('emis_stud_id');
      $studentid = $this->input->post('stud_id');
      $emis_username=$this->session->userdata('emis_username'); 
      $this->load->database();
      $this->load->model('Homemodel');

      $data=array('request_flag'=>'1',
                  'request_date'=>$date,
                  'request_id'=>$emis_username);
      $status = $this->Homemodel->emisraisearequestflag($studentid,$data);
      // echo json_encode($studentdetails);
        if($status)
          {
            echo true;
          }
        else
        {
          echo false;
        }
      } else { redirect('/', 'refresh'); }

     }

  public function emis_school_transferrequest()
   {
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $data['allstuds']  = $this->Homemodel->getrequestedstudents($school_id);

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_transferrequest',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){

    $this->load->view('emis_school_transferrequest',$data);
    }

      } else { redirect('/', 'refresh'); }
   }

//******************************END Raise transfer request ****************************
  public function emis_school_admission(){

   $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {

   $this->load->library('session'); 
   $studentid = $this->session->userdata('emis_stud_id');
   $school_id=$this->session->userdata('emis_school_id');
   $this->load->model('Homemodel');
    $this->load->model('Datamodel');
   $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
   $class_studying_id =$this->Homemodel->getclass_studying_id($stuprofile1[0]->class_studying_id);
   $data['class_studying_id'] = $class_studying_id;
   $data['class_section'] = $stuprofile1[0]->class_section;
   $data['prev_class_id'] = $stuprofile1[0]->prv_class_std;
   $data['prev_class'] = $this->Homemodel->getprvclassname($stuprofile1[0]->prv_class_std);
   $data['school_admission_no'] = $stuprofile1[0]->school_admission_no;
   $data['doj'] = $stuprofile1[0]->doj;
   $data['pass_fail'] = $stuprofile1[0]->pass_fail;
   $data['education_medium_id'] = $stuprofile1[0]->education_medium_id;
   $data['group_code_id'] = $stuprofile1[0]->group_code_id;
   $data['rte'] = $stuprofile1[0]->child_admitted_under_reservation;
   $data['aidunaid'] = $stuprofile1[0]->student_admitted_section;
   $data['group_code_name'] = $this->Homemodel->getgroup_code_id($stuprofile1[0]->group_code_id);
   $data['cbse_subject1_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject1_id);
   $data['cbse_subject2_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject2_id);
   $data['cbse_subject3_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject3_id);
   $data['cbse_subject4_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject4_id);
   $data['cbse_opt_subject_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_opt_subject_id);
   $data['education_medium_name'] = $this->Homemodel->geteducation_medium_id($stuprofile1[0]->education_medium_id);
   $manage_cate=$this->Datamodel->getmanagecatename($school_id);
   $claslimit = $this->Homemodel->getallstandardsbyschool($school_id);
   $data['classstudying'] = $this->Homemodel->getallclassstudying($claslimit[0]->low_class,$claslimit[0]->high_class);
   $data['mediumofinstruction'] = $this->Datamodel->getallmediumofinst($school_id);
   $data['groupcate'] = $this->Datamodel->getallgroupcodes($manage_cate);
   $data['groupcateid'] =  $manage_cate;
   $data['sections'] = $this->Datamodel->getallsection($school_id,$class_studying_id);
   $data['managecateid'] = $this->Datamodel->getmanagecateid($school_id);
   $classlist1=$this->Datamodel->getclasslist($school_id); 
   $data['classlist']=$this->Datamodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class);  
   //print_r( $data['classlist']);
   $this->load->view('emis_school_admission',$data);

     } else { redirect('/', 'refresh'); }
     }


public function Academic_stu_admission_update(){ 

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $date = date('Y-m-d');
      $time = date('h:i:s');
      $datetime = $date." ".$time;

      $admiss_date = $this->input->post('emis_admiss_date');
      $admiss_month = $this->input->post('emis_admiss_month');
      $admiss_year = $this->input->post('emis_admiss_year');


      $academic_year="";
        if($admiss_month<=4){
          $academic_year=$admiss_year-1;
        }else{
          $academic_year=$admiss_year;
        }

      $admiss_doj = $admiss_year.'-'.$admiss_month.'-'.$admiss_date;
 
      $this->load->library('session'); 
      $studentid = $this->session->userdata('emis_stud_id');
       $school_id=$this->session->userdata('emis_school_id');
      $this->load->database();
      $this->load->model('Homemodel');

      $data=array('class_studying_id'       =>$this->input->post('emis_class_studying_admiss'),
                 'class_section'     =>$this->input->post('emis_reg_stu_section_admiss'),
                 // 'prv_class_std'     =>$this->input->post('emis_prev_class_edit'),
                 // 'pass_fail'       =>$this->input->post('emis_reg_stu_passfail_admiss'),
                 'school_id'=>$school_id,
                 'school_admission_no'     =>$this->input->post('emis_reg_stu_admission_admiss'),
                 'doj'       => $admiss_doj,
                 'education_medium_id'     =>$this->input->post('emis_reg_mediofinst_admiss'),
                 'transfer_flag'          =>0,
                 'group_code_id'       =>$this->input->post('emis_reg_grup_code_admiss'),
                 'cbse_subject1_id'       =>$this->input->post('emis_reg_cbsc_sub1_admiss'),
                 'cbse_subject2_id'       =>$this->input->post('emis_reg_cbsc_sub2_admiss'),
                 'cbse_subject3_id'       =>$this->input->post('emis_reg_cbsc_sub3_admiss'),
                 'cbse_subject4_id'       =>$this->input->post('emis_reg_cbsc_sub4_admiss'),
                 'cbse_opt_subject_id'       =>$this->input->post('emis_reg_cbsc_sub5_admiss'),
                 'child_admitted_under_reservation'       =>$this->input->post('emis_reg_stu_rte_admiss'),
                 'student_admitted_section'       =>$this->input->post('emis_reg_stu_aidunaid_admiss')
                 );


      $data1=array('unique_id_no'=>$studentid,
                  'school_id'=>$school_id,
                  'class_studying_id'=>$this->input->post('emis_class_studying_admiss'),
                  'process_type'=>'admission',
                  'admission_no'=>$this->input->post('emis_reg_stu_admission_admiss'),
                  'medium_of_ins'=>$this->input->post('emis_reg_mediofinst_admiss'),
                  'academic_year'=>$academic_year,
                  'transfer_date'=>$date,
                  'Status'=>'Active');
      $this->Homemodel->emisaddstutransferhistory($data1);
   
      $updatedataadmission=$this->Homemodel->updatestudata_admission($studentid,$data);

     $this->load->model('Registermodel');
     $school_id=$this->session->userdata('emis_school_id');
      $studentid = $this->session->userdata('emis_stud_id');
     $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
        
      redirect('Home/emis_school_studentsearch','refresh');

        } else { redirect('/', 'refresh'); }

     }

     public function getallsectionsbyclass(){

        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {


    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');

    $classid = $this->input->post('classid');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $class_studying_id =$this->Datamodel->getclass_studying_id($classid);
    $getalldept  = $this->Datamodel->getallsection($school_id,$class_studying_id);
    $getdept='';
    $a  =explode(',', $getalldept);
        foreach($a as $v)
        {
            $getdept =$getdept."<option value='".$v."'>".$v."</option>";  
        }
         $dept    =  "<select  class='form-control' tabindex='1' id='emis_reg_stu_section_edit' name='emis_reg_stu_section_edit'>
                                 <option value='' style='color:#bfbfbf;'>Select Section..</option>
                                ".$getdept."                           
                            </select> ";
                           
        echo $dept; 

          } else { redirect('/', 'refresh'); }
  }

      public function getallsectionsbyclass1(){

         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {


    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $classid = $this->input->post('classid');
    $this->load->database(); 
    $this->load->model('Datamodel');
    // $class_studying_id =$this->Datamodel->getclass_studying_id($classid);
    $getalldept  = $this->Datamodel->getallsection($school_id,$classid);
    
     $getdept='';

           foreach($getalldept as $dept) {
                            $getdept =$getdept."<option value='".$dept->section."'>".$dept->section."</option>";  
                        }
                        $section   =  "<select  class='form-control' id='emis_reg_stu_section_admiss' name='emis_reg_stu_section_admiss'>
                                 <option value='' style='color:#bfbfbf;'>Section *</option>
                                ".$getdept."                           
                            </select> ";
                           
                        echo $section;
                        
    }else { redirect('/', 'refresh'); }
    
    
    

  }

  public function emis_school_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){ 

      $this->load->view('emis_school_resetpassword');

    }else{
      echo "Authentication Error! <br/>Not Authorized";
    }

    } else { redirect('/', 'refresh'); }
  }

    public function emis_school_resetpassword1(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==1){ 


      $this->load->view('emis_school_resetpassword1');

      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }

  public function emis_school_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $school_id=$this->session->userdata('emis_school_id');
     $this->load->database(); 
     $this->load->model('Homemodel');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Homemodel->emis_school_resetpassword($school_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_school_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
        $school_id=$this->session->userdata('emis_school_id');
       $this->load->database(); 
       $this->load->model('Homemodel');
  
       $username=$this->session->userdata('emis_username');
        $oldpass = $this->Homemodel->getoldpassschool($school_id,$username);
          $curpass = $this->input->post('oldpassword');
          

            if( $oldpass== md5($curpass))
            {
              echo 1;
            }
            {
              echo 0;
            }

     } else { redirect('/', 'refresh'); }

  }

  public function emis_student_profile()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

          $user_type_id=$this->session->userdata('emis_user_type_id');
           if($user_type_id==1 || $user_type_id==3  || $user_type_id==2  || $user_type_id==5 )
           { 

           $emis_templog =$this->session->userdata('emis_school_templog');
           $emis_templog1 =$this->session->userdata('emis_school_templog1');
               if($emis_templog==0 || $emis_templog1==0){
                  redirect('home/emis_school_gotoredirect','refresh');
               } else
               {
                    $studentid =  $this->uri->segment(3,0);
                    $this->load->library('session'); 
                    $this->load->database();
                    $this->load->model('Homemodel');
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    $this->session->set_userdata('emis_stud_id', $studentid);
                  
                    $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
                    
                    $school_id=$this->session->userdata('emis_school_id');
                    $getschoolid=$stuprofile1[0]->school_id;

                    $data['photo']="";
                    $data['name'] = $stuprofile1[0]->name;
                    $data['tname'] = $stuprofile1[0]->name_tamil;
                    $data['aadhaar_uid_number'] = $stuprofile1[0]->aadhaar_uid_number;
                    $data['enrollmentnumber'] = $stuprofile1[0]->enrollmentnumber;
                    $data['uniquenumber'] = $stuprofile1[0]->unique_id_no;
                    $data['dob'] = $stuprofile1[0]->dob;
                    $data['gender'] = $stuprofile1[0]->gender;
                    $data['photo'] = $stuprofile1[0]->photo;
                    $data['requestflag'] = $stuprofile1[0]->request_flag;
                    $data['requestdate'] = $stuprofile1[0]->request_date;
                     //echo "<pre>";var_dump($stuprofile1[0]->community_id);exit();

                    $data['religion'] = $this->Homemodel->getreligion($stuprofile1[0]->religion_id);
                    $data['community'] = $this->Homemodel->getcommunity1($stuprofile1[0]->community_id);
                    //echo "<pre>";var_dump($data['community']);exit();
                    $data['subcaste'] = $this->Homemodel->getsubcase($stuprofile1[0]->subcaste_id);
                    $data['mother11'] = $this->Homemodel->getmother($stuprofile1[0]->mothertounge_id); 
                    $data['DisadvantagegroupName'] = $this->Homemodel->getDisadvantagegroupName($stuprofile1[0]->disadvantaged_group); 
                    $data['DisabilityGroupName'] = $this->Homemodel->getDisabilityGroupName($stuprofile1[0]->differently_abled); 

                    $data['mother_name'] = $stuprofile1[0]->mother_name;
                    $data['father_name'] = $stuprofile1[0]->father_name;
                    $data['guardian_name'] = $stuprofile1[0]->guardian_name;
                    $data['father_occupation'] = $this->Homemodel->getoccupation($stuprofile1[0]->father_occupation);
                    
                    $data['mother_occupation'] = $this->Homemodel->getoccupation($stuprofile1[0]->mother_occupation); 
                    $data['parent_income'] = $this->Homemodel->getparentincome($stuprofile1[0]->parent_income); 


                    $data['phone_number'] = $stuprofile1[0]->phone_number;
                    $data['email'] = $stuprofile1[0]->email;
                    $data['house_address'] = $stuprofile1[0]->house_address;
                    $data['street_name'] = $stuprofile1[0]->street_name;
                    $data['pin_code'] = $stuprofile1[0]->pin_code;
                    $data['area_village'] = $stuprofile1[0]->area_village; 
                    $data['schooldist'] = $this->Datamodel->getallachooldist();
                    $data['district'] = $this->Homemodel->getdistrict_id($stuprofile1[0]->district_id);

                    $data['classname'] = $stuprofile1[0]->class_studying_id;
                    $class_studying_id =$this->Homemodel->getclass_studying_id($stuprofile1[0]->class_studying_id);
                    $data['class_studying_id'] = $class_studying_id;
                    $data['class_section'] = $stuprofile1[0]->class_section;
                    //print_r($data['class_section']);
                    $data['prev_class_id'] = $stuprofile1[0]->prv_class_std;
                    $data['prev_class'] = $this->Homemodel->getprvclassname($stuprofile1[0]->prv_class_std);
                    $data['school_name'] = $this->Homemodel->getschoolname($stuprofile1[0]->school_id);
                    $data['school_udisecode'] = $this->Homemodel->getschooludsccode($stuprofile1[0]->school_id);
                    $data['school_admission_no'] = $stuprofile1[0]->school_admission_no;
                    $data['doj'] = $stuprofile1[0]->doj;
                    $data['pass_fail'] = $stuprofile1[0]->pass_fail;
                    $data['education_medium_id'] = $stuprofile1[0]->education_medium_id;
                    $data['rte'] = $stuprofile1[0]->child_admitted_under_reservation;
                    $data['aidunaid'] = $stuprofile1[0]->student_admitted_section;
                    $data['group_code_name'] = $this->Homemodel->getgroup_code_id($stuprofile1[0]->group_code_id);
                    $data['cbse_subject1_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject1_id);
                    $data['cbse_subject2_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject2_id);
                    $data['cbse_subject3_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject3_id);
                    $data['cbse_subject4_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_subject4_id);
                    $data['cbse_opt_subject_id'] = $this->Homemodel->getcbse_subject_id($stuprofile1[0]->cbse_opt_subject_id);
                    $data['education_medium_name'] = $this->Homemodel->geteducation_medium_id($stuprofile1[0]->education_medium_id);

                   $this->load->view('emis_student_profilespl',$data);

                }

            } else
            {
            echo "Authentication Error! <br/>Not Authorized";
          }

  

      } else { redirect('Authentication/emis_login', 'refresh'); }


   }

   function emis_school_emailmobile(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->session->userdata('emis_school_id');
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $abstract      = $this->Homemodel->getschoollenrollabstract($school_id);
    $data['email']  = $schoolprofile[0]->sch_email;
    $data['mobile']   = $schoolprofile[0]->mobile;

    if($abstract)
    {
    $data['class1']   = $abstract[0]->class1;
    $data['class2']   = $abstract[0]->class2;
    $data['class3']   = $abstract[0]->class3;
    $data['class4']   = $abstract[0]->class4;
    $data['class5']   = $abstract[0]->class5;
    $data['class6']   = $abstract[0]->class6;
    $data['class7']   = $abstract[0]->class7;
    $data['class8']   = $abstract[0]->class8;
    $data['class9']   = $abstract[0]->class9;
    $data['class10']   = $abstract[0]->class10;
    $data['class11']   = $abstract[0]->class11;
    $data['class12']   = $abstract[0]->class12;
    }
    {
    $data['class1']   = 0;
    $data['class2']   = 0;
    $data['class3']   = 0;
    $data['class4']   = 0;
    $data['class5']   = 0;
    $data['class6']   = 0;
    $data['class7']   = 0;
    $data['class8']   = 0;
    $data['class9']   = 0;
    $data['class10']   = 0;
    $data['class11']   = 0;
    $data['class12']   = 0;
    }

     $this->load->view('emis_school_emailmobile',$data);

    } else { redirect('/', 'refresh'); }
   }


 function emis_school_gotoredirect(){
    //print_r($this->session);die();
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    //echo($emis_loggedin);die();
    if($emis_loggedin) {
        $this->load->library('session'); 
        $this->load->database(); 
        $this->load->model('Homemodel'); 
        $this->load->model('Authmodel');  
        $school_id=$this->session->userdata('emis_school_id');
        $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id); 
        $gettemplog= $this->Authmodel->gettemplogschool($school_id);
        $gettemplog1= $this->Authmodel->gettemplog1school($school_id);
        $this->session->set_userdata('emis_school_templog',$gettemplog);
        $this->session->set_userdata('emis_school_templog1',$gettemplog1);
        
        //echo('temp_log = '.$gettemplog."<br> temp_log1=".$gettemplog1);die();
        
    if($gettemplog1==0){
      redirect('Basic/emis_school_details_entry/1/0', 'refresh');
      /*redirect('home/emis_school_emailmobile', 'refresh');*/
     }elseif($gettemplog==0){
      redirect('Home/emis_school_resetpassword', 'refresh');
     }else{
     /*redirect('Basic/emis_school_details_entry/1/0', 'refresh'); */
     redirect('Home/emis_school_dash', 'refresh');
    }


    } else { redirect('/', 'refresh'); }
   }






    public function updateschoolfirst()
   {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $school_id=$this->session->userdata('emis_school_id');
    $school_udise=$this->session->userdata('emis_school_udise');
    $value = $this->input->post('value');
    $name = $this->input->post('name');
    
    $this->load->database(); 
    $this->load->model('Homemodel');

    $data = array( $name => $value );
    
    if( $this->Homemodel->updateschfirstdata($school_id,$data) )
    {
       echo true;
    }
    else
    {
      echo false;
    }


      } else { redirect('/', 'refresh'); }

    

   }

   public function checkfirstuseemail(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel'); 
    $this->load->model('Authmodel');  
    $school_id=$this->session->userdata('emis_school_id');

    $getemail = $this->input->post('sch_email');
    $getmobile = $this->input->post('sch_mobile');

    $class1  = $this->input->post('sch_class1');
    $class2  = $this->input->post('sch_class2');
    $class3  = $this->input->post('sch_class3');
    $class4  = $this->input->post('sch_class4');
    $class5  = $this->input->post('sch_class5');
    $class6  = $this->input->post('sch_class6');
    $class7  = $this->input->post('sch_class7');
    $class8  = $this->input->post('sch_class8');
    $class9  = $this->input->post('sch_class9');
    $class10 = $this->input->post('sch_class10');
    $class11 = $this->input->post('sch_class11');
    $class12 = $this->input->post('sch_class12');

    $total = $class1 + $class2 + $class3 + $class4 + $class5 + $class6 + $class7 + $class8 + $class9 + $class10 + $class11 + $class12; 



    $checkalreadyemail      = $this->Homemodel->checkalreadycheckemail($getemail,$school_id);
    $checkalreadymobile     = $this->Homemodel->checkalreadycheckmobile($getmobile,$school_id);

    $checkenrllabs_tblavail = $this->Homemodel->checkenrllabstblavail($school_id);

    if($checkalreadyemail || $checkalreadymobile){
      $data['error']     = "Email or mobile number already use. please use another!";
      $schoolprofile     = $this->Homemodel->getschoolprofiledetails($school_id);
      $data['email']     = $schoolprofile[0]->sch_email;
      $data['mobile']    = $schoolprofile[0]->mobile;
      $abstract      = $this->Homemodel->getschoollenrollabstract($school_id);
      if($abstract)
        {
        $data['class1']   = $abstract[0]->class1;
        $data['class2']   = $abstract[0]->class2;
        $data['class3']   = $abstract[0]->class3;
        $data['class4']   = $abstract[0]->class4;
        $data['class5']   = $abstract[0]->class5;
        $data['class6']   = $abstract[0]->class6;
        $data['class7']   = $abstract[0]->class7;
        $data['class8']   = $abstract[0]->class8;
        $data['class9']   = $abstract[0]->class9;
        $data['class10']   = $abstract[0]->class10;
        $data['class11']   = $abstract[0]->class11;
        $data['class12']   = $abstract[0]->class12;
        }
        {
        $data['class1']   = 0;
        $data['class2']   = 0;
        $data['class3']   = 0;
        $data['class4']   = 0;
        $data['class5']   = 0;
        $data['class6']   = 0;
        $data['class7']   = 0;
        $data['class8']   = 0;
        $data['class9']   = 0;
        $data['class10']   = 0;
        $data['class11']   = 0;
        $data['class12']   = 0;
        }


        $this->load->view('emis_school_emailmobile',$data);
    }else{

      $data = array('sch_email' => $getemail,
                  'mobile'      => $getmobile);
      $data1 = array('temp_log1' => 2 );

      $data2 = array('class1' => $class1,
                    'class2' => $class2,
                    'class3' => $class3,
                    'class4' => $class4,                     
                    'class5' => $class5,                     
                    'class6' => $class6,                    
                    'class7' => $class7,                     
                    'class8' => $class8,                     
                    'class9' => $class9,                     
                    'class10' => $class10,                     
                    'class11' => $class11,                     
                    'class12' => $class12,
                    'total'   => $total                   
                      );
            $data3 = array('school_id' => $school_id,
                    'class1' => $class1,
                    'class2' => $class2,
                    'class3' => $class3,
                    'class4' => $class4,                     
                    'class5' => $class5,                     
                    'class6' => $class6,                    
                    'class7' => $class7,                     
                    'class8' => $class8,                     
                    'class9' => $class9,                     
                    'class10' => $class10,                     
                    'class11' => $class11,                     
                    'class12' => $class12,
                    'total'   => $total                   
                      );

    $this->Homemodel->updateschfirstdata($school_id,$data);

    if($checkenrllabs_tblavail)
    {
      $this->Homemodel->updateenrollmentabstract($school_id,$data2);
    }
    else
    {
      $this->Homemodel->insertenrollmentabstract($school_id,$data3);
    }


    $this->Homemodel->updateschuserfirstdata($school_id,$data1);

    redirect('home/emis_school_gotoredirect', 'refresh');
    }
   } else { redirect('/', 'refresh'); }

   }


   public function testcreatedate(){

      $studentid =  $this->uri->segment(3,0);

      $school_id=$this->session->userdata('emis_school_id');
      $ctedate = $this->Homemodel->checkcreatedatestudent($studentid,$school_id);

      date_default_timezone_set('Asia/Calcutta');

      $date = date('Y-m-d');

      $createdate1=explode(" ", $ctedate);

      $createdate=$createdate1[0];

      $calcdate = date ("Y-m-d", strtotime ($createdate1[0] ."+90 days"));

      echo $createdate;
      echo "<br/>";
      echo $date;
      echo "<br/>";
      echo $calcdate;


      if($createdate!="" || $createdate!=null){

      if($date >= $calcdate){

          echo "create date is 90 mela";
   
      }else{
       
         echo "<br/>";
         echo $date."<br/>90days inamum agala.";
      }

    }else{
      echo "ceated date null";
    }

   }


//----------------- id card module ---------------------------

    public function emis_school_studentlist_idcard(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

    $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1_view($school_id));

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_school_stulist_idcard',$data);
    // echo json_encode($data['allclass']);
    }

      }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_stulist_idcard',$data);
    }

  }else{
    redirect('home/emis_school_home','refresh');
  }



      } else { redirect('/', 'refresh'); }

  }

      public function emis_school_studentlist_idcard1(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

    $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

    $data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

       $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_stulist_idcard1',$data);
  }

     }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_stulist_idcard1',$data);
    }


       
     }else{
        redirect('home/emis_school_home','refresh');
     }

      } else { redirect('/', 'refresh'); }

  }


  public function emis_school_studentlist_idcard2(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $class_id=$this->uri->segment(3,0);
    $section_id=$this->uri->segment(4,0);
    $limit = "";
    if($this->session->userdata('emis_idcard_stulist_limit')!=""){
      $limit = $this->session->userdata('emis_idcard_stulist_limit');
    }else{
      $limit = 10;
    }
    

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

    $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

    $data['allstuds']  = $this->Homemodel->getallstudsbyclsecnew($school_id,$class_id,$section_id,$limit);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

     $data['allstudscount']  = count($this->Homemodel->getallstudsbyclsecnew($school_id,$class_id,$section_id,""));
    

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_stulist_idcard2',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_stulist_idcard2',$data);
    }

  }else{
    redirect('home/emis_school_home','refresh');
  }

      } else { redirect('/', 'refresh'); }
  }


  public function emis_school_stulist_idcard_edit(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $studentid=$this->uri->segment(3,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
    $stuprofile2  = $this->Homemodel->getstuprofileimages($studentid);

    $data['bloodgroups'] = $this->Homemodel->getallbloodgroups($studentid);

    $classlist1=$this->Datamodel->getclasslist($school_id); 
    $data['classlist']=$this->Datamodel->getclasslistsplit($classlist1[0]->low_class,$classlist1[0]->high_class);

    $data['schooldist'] = $this->Datamodel->getallachooldist();
       // $studentid = $this->session->userdata('emis_stud_id'); 
    $data['name'] = $stuprofile1[0]->name;
    $data['tname'] = $stuprofile1[0]->name_tamil;
    $data['aadhaar_uid_number'] = $stuprofile1[0]->aadhaar_uid_number;
    $data['uniquenumber'] = $stuprofile1[0]->unique_id_no;
    $data['enrollmentnumber'] = $stuprofile1[0]->enrollmentnumber;
    $data['adhaarappliedstatus'] = $stuprofile1[0]->adhaarappliedstatus;
    $data['dob'] = $stuprofile1[0]->dob;
    $data['gender'] = $stuprofile1[0]->gender;
     //echo "<pre>";var_dump($stuprofile1[0]->community_id);exit();
    $data['mother_name'] = $stuprofile1[0]->mother_name;
    $data['father_name'] = $stuprofile1[0]->father_name;
    $data['guardian_name'] = $stuprofile1[0]->guardian_name;

    $data['house_address'] = $stuprofile1[0]->house_address;
    $data['street_name'] = $stuprofile1[0]->street_name;
    $data['pin_code'] = $stuprofile1[0]->pin_code;
    $data['area_village'] = $stuprofile1[0]->area_village; 
    $data['blood'] = $stuprofile1[0]->bloodgroup;
    $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['district'] = $stuprofile1[0]->district_id;
   $data['sections'] = $this->Datamodel->getallsection($stuprofile1[0]->school_id,$stuprofile1[0]->class_studying_id);

   $class_studying_id =$this->Homemodel->getclass_studying_id($stuprofile1[0]->class_studying_id);
   $data['class_studying_id'] = $class_studying_id;
   $data['class_section'] = $stuprofile1[0]->class_section;

   if($stuprofile2){

  if($stuprofile2[0]->photo!="" ){
    $data['photo'] = $stuprofile2[0]->photo;
  }else{
    $data['photo'] = "";
  }
   }else{
    $data['photo'] = "";
  }

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_stulist_idcard_edit',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_stulist_idcard_edit',$data);
    }

      } else { redirect('/', 'refresh'); }
  }


  public function emis_school_stulist_saveidcard_edit(){
    $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 

    $studentid=$this->uri->segment(3,0);

    $date = date('Y-m-d');
    $time = date('h:i:s');
    $datetime = $date." ".$time;
    $this->load->database(); 
    $this->load->model('Homemodel');

     $Sdt=$this->input->post('emis_stu_idcard_date');
     $SMnth=$this->input->post('emis_stu_idcard_month');
     $SYr=$this->input->post('emis_stu_idcard_year');

     $dob=$SYr.'-'.$SMnth.'-'.$Sdt;

     if($this->input->post('v1')!="Aadhaar Enrollment not done"){

       $data33 =array('name'=>$this->input->post('emis_stu_idcard_name'),
                  'gender'=>$this->input->post('emis_stu_idcard_gender'),
                  'father_name'=>$this->input->post('emis_stu_idcard_father'),
                  'mother_name'=>$this->input->post('emis_stu_idcard_mother'),
                  'guardian_name'=>$this->input->post('emis_stu_idcard_guardian'),
                  'aadhaar_uid_number'=>$this->input->post('emis_stu_idcard_adhaar'),
                  'enrollmentnumber'=>$this->input->post('emis_stu_idcard_enroll'),
                  'bloodgroup'=>$this->input->post('emis_stu_idcard_blood'),
                  'adhaarappliedstatus'=>'Applied',
                  'idcardstatus'=>'Not Aprooved',
                  'idapproove'=>'0',
                  'dob'=>$dob,
                  'class_studying_id'=>$this->input->post('emis_stu_idcard_class'),
                  'class_section'=>$this->input->post('emis_stu_idcard_section'),
                  'house_address' =>$this->input->post('emis_stu_idcard_door'),
                  'street_name'  =>$this->input->post('emis_stu_idcard_area'),
                  'area_village' =>$this->input->post('emis_stu_idcard_city'),
                  'district_id'  =>$this->input->post('emis_stu_idcard_district'),
                  'pin_code'  =>$this->input->post('emis_stu_idcard_pincode'));

   $this->Homemodel->saveidcardupdate($studentid,$data33);

    }else{

       $data44 =array('name'=>$this->input->post('emis_stu_idcard_name'),
                  'gender'=>$this->input->post('emis_stu_idcard_gender'),
                  'father_name'=>$this->input->post('emis_stu_idcard_father'),
                  'mother_name'=>$this->input->post('emis_stu_idcard_mother'),
                  'guardian_name'=>$this->input->post('emis_stu_idcard_guardian'),
                  'aadhaar_uid_number'=>$this->input->post('emis_stu_idcard_adhaar'),
                  'enrollmentnumber'=>$this->input->post('emis_stu_idcard_enroll'),
                  'bloodgroup'=>$this->input->post('emis_stu_idcard_blood'),
                  'adhaarappliedstatus'=>'Notapplied',
                  'idcardstatus'=>'Not Aprooved',
                  'idapproove'=>'0',
                  'dob'=>$dob,
                  'class_studying_id'=>$this->input->post('emis_stu_idcard_class'),
                  'class_section'=>$this->input->post('emis_stu_idcard_section'),
                  'house_address' =>$this->input->post('emis_stu_idcard_door'),
                  'street_name'  =>$this->input->post('emis_stu_idcard_area'),
                  'area_village' =>$this->input->post('emis_stu_idcard_city'),
                  'district_id'  =>$this->input->post('emis_stu_idcard_district'),
                  'pin_code'  =>$this->input->post('emis_stu_idcard_pincode'));

      $this->Homemodel->saveidcardupdate($studentid,$data44);

   
 }

  
  $getidcardtbstatus = $this->Homemodel->getidcardupdatestudent($studentid);
   if($getidcardtbstatus){

     
    if(is_uploaded_file($_FILES['idcardimage']['tmp_name'])){
     $get_image1 = file_get_contents($_FILES['idcardimage']['tmp_name']);

      $data2=array('photo'=>$get_image1,
                'status'=>'Active',
                'created_at'=>$datetime);
      $this->Homemodel->saveidcardtableupdate($studentid,$data2);
     
    }else {
     // $data2=array(
     //            'idcardstatus'=>'Not Aprooved',
     //            'idapproove'=>'0',
     //            'status'=>'Active',
     //            'created_at'=>$datetime);
     // $this->Homemodel->saveidcardtableupdate($studentid,$data2);
    }


   }else{
     $get_image2 = "";
    if(is_uploaded_file($_FILES['idcardimage']['tmp_name'])){
     $get_image2 = file_get_contents($_FILES['idcardimage']['tmp_name']);
    }

     $data3=array('unique_id_no'=>$studentid,
                'photo'=>$get_image2,
                'status'=>'Active',
                'created_at'=>$datetime);

   $this->Homemodel->saveidcardtable($data3);

   }

   $class22 =  $this->input->post('emis_stu_idcard_class');
   $section22 = $this->input->post('emis_stu_idcard_section');

   redirect('Home/emis_school_studentlist_idcard2/'.$class22.'/'.$section22);

     } else { redirect('/', 'refresh'); }

  }

  public function getidcarddataverfication(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin)
      { 

     $studentid =  $this->input->post('studentid');
     $this->load->database(); 
     $this->load->model('Homemodel');
     $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
     $stuprofile2  = $this->Homemodel->getstuprofileimages($studentid);

     $grp1=2;  $grp2=2;  $grp3=2;  $grp4=2; $temp=1;

     if(empty($stuprofile2)){
      echo 0;
     }else{ 

     $name = $stuprofile1[0]->name;

     $adhaar = $stuprofile1[0]->aadhaar_uid_number;
     $enroll = $stuprofile1[0]->enrollmentnumber;
     $notapplied = $stuprofile1[0]->adhaarappliedstatus;

     $dob = $stuprofile1[0]->dob;
     $gender = $stuprofile1[0]->gender;

     $mother= $stuprofile1[0]->mother_name;
     $father = $stuprofile1[0]->father_name;
     $guardian = $stuprofile1[0]->guardian_name;

     $class = $stuprofile1[0]->class_studying_id;
     $section = $stuprofile1[0]->class_section;

     $bloodgroup = $stuprofile1[0]->bloodgroup;
     $photo = base64_encode($stuprofile2[0]->photo);

     $door = $stuprofile1[0]->house_address;
     $street = $stuprofile1[0]->street_name;
     $city = $stuprofile1[0]->area_village;
     $district = $stuprofile1[0]->district_id;
     $pincode = $stuprofile1[0]->pin_code;

     if($adhaar!="" || $enroll!="" || $notapplied!="Not entered" ){
       $grp1=0;
     }

     if($mother!="" || $father!="" || $guardian!=""){
       $grp2=0;
     }

     if($name!="" && $gender!="" && $class!="" && $section!="" && $dob!="" && $class!="" && $section!="" && $door!="" && $street!="" && $city!="" && $district!="" && $pincode!="" ){
       $grp3=0;
     }

     if($bloodgroup!="" && $photo!="" ){
       $grp4=0;
     }


     if($grp1==0 && $grp2==0 && $grp3==0 && $grp4==0 ){
      $data0=array('idcardstatus'=>'Aprooved');
      $this->Homemodel->changeidcardapproovalstatus($studentid,$data0);
     echo 1;
     }else{
     echo 0;
     }

     }

      } else { redirect('/', 'refresh'); }

  }

  public function emis_saveviewlimitsession(){
    $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
      $stulistviewlimit =  $this->input->post('limit');
      $this->session->set_userdata('emis_idcard_stulist_limit',$stulistviewlimit);

      echo true;
      

     } else { redirect('/', 'refresh'); }
  }

   public function emis_school_generate_idcard(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

    $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail2($school_id));

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_school_generate_idcard',$data);
    // echo json_encode($data['allclass']);
    }   

      }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_generate_idcard',$data);
    }

  }else{ redirect('home/emis_school_home','refresh'); }



      } else { redirect('/', 'refresh'); }

  }

public function emis_school_generate_idcard1(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

    $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){


    $data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

       $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_generate_idcard1',$data);
  }

     }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_generate_idcard1',$data);
    }

     }else{ redirect('home/emis_school_home','refresh'); }

      } else { redirect('/', 'refresh'); }

  }

    public function emis_school_generate_idcard2(){


          $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $section_id=$this->uri->segment(4,0);
    $limit = $this->session->userdata('emis_idcard_stulist_limit');

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

     $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

    $data['idcarddetails']=$this->Homemodel->getidcardstudentlist($school_id,$class_id,$section_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);
         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_generate_idcard2',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_generate_idcard2',$data);
    }

     }else{ redirect('home/emis_school_home','refresh'); }

      } else { redirect('/', 'refresh'); }
  }

    public function emis_savegenerateidcardsession(){
    $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
      $studid =  $this->input->post('studid');
      $this->session->set_userdata('emis_idcard_generate_stuid',$studid);

      echo true;
      

     } else { redirect('/', 'refresh'); }
  }

  public function getidcardidaproove(){
      $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
      $stuidlist =  $this->input->post('studentid');
      $data=array('idapproove'=>'1');
      $this->Homemodel->updateidcardidapproove($stuidlist,$data);

      echo true;
      

     } else { redirect('/', 'refresh'); }
  }

  public function emis_school_approove_idcard(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

     $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail2_view($school_id));

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
   
    $this->load->view('emis_school_approove_idcard',$data);
    // echo json_encode($data['allclass']);
    }

      }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_approove_idcard',$data);
    }

    }else{ redirect('home/emis_school_home','refresh'); }



      } else { redirect('/', 'refresh'); }

  }


  public function emis_school_approove_idcard1(){
         $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $class_id=$this->uri->segment(3,0);
    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

     $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){

    $data['allsections']  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

       $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_approove_idcard1',$data);
  }

     }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_approove_idcard1',$data);
    }

    }else{ redirect('home/emis_school_home','refresh'); }

      } else { redirect('/', 'refresh'); }

  }

  public function emis_school_approove_idcard2(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $class_id=$this->uri->segment(3,0);
    $section_id=$this->uri->segment(4,0);
    $limit = $this->session->userdata('emis_idcard_stulist_limit');

    $this->load->library('session'); 
    $school_id=$this->session->userdata('emis_school_id');
    $this->load->database(); 
    $this->load->model('Homemodel');

     $schcategory = $this->Datamodel->getmanagecateid($school_id);
    if($schcategory[0]->manage_name!="Un-aided"){
      
    $data['allstuds']  = $this->Homemodel->getallstudsbyclsecnew1($school_id,$class_id,$section_id,$limit);
    $data['class']  = $this->Homemodel->getsingleclass($class_id);

     $data['allstudscount']  = count($this->Homemodel->getallstudsbyclsecnew1($school_id,$class_id,$section_id,""));
    

         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){

      $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
    $this->load->view('emis_school_approove_idcard2',$data); 
    }

    }else if($user_type_id==3 || $user_type_id==2){

    $this->load->view('emis_school_approove_idcard2',$data);
    }

    }else{ redirect('home/emis_school_home','refresh'); }

      } else { redirect('/', 'refresh'); }
  }




   public function emis_school_declaration_form()
  {
        $this->load->library('session');
        $school_id=$this->session->userdata('emis_school_id');

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->database();
    $this->load->library('session');
    $this->load->model('Registermodel');
    $this->load->model('Datamodel');
    $this->load->model('Homemodel');
    

    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;


    $data['date'] = date('d-m-Y');
    $classlist1=$this->Datamodel->getclasslist($school_id); 
    $data['lowestclass'] = $classlist1[0]->low_class;
    $data['highclass']   = $classlist1[0]->high_class;

          $boys  =$this->Registermodel->getstudentdatancaste($school_id,1);
          $girls =$this->Registermodel->getstudentdatancaste($school_id,2);
          $trans =$this->Registermodel->getstudentdatancaste($school_id,3);

          $data['community'] =$this->Datamodel->getallcommunityfull();


          // foreach ($boys as $key) {
          //   echo $key->community.'('.$key->ccode.')'.'->'.$key->class.'->'.$key->count; echo "<br/>";   
          // }
  //**************************  declaration start *******************************************//
           for($i=1;$i<=8;$i++) {
            for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
              ${"bcl".$j."com".$i} = 0;
              ${"gcl".$j."com".$i} = 0;
              ${"tgl".$j."com".$i} = 0;
            }
           }
            for($i=1;$i<=8;$i++) {
              ${"C".$i}           = "";
              ${"boystotalc".$i}  = "";
              ${"girlstotalc".$i} = "";
              ${"tgtotalc".$i}    = "";

            }
            for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
               ${"boystotalc1".$j}  = "";
              ${"girlstotalc1".$j} = "";
              ${"tgtotalc1".$j}    = "";
            }
  //**************************  declaration end *******************************************//

  //**************************  individual data collect start *******************************************//
           if($boys){
           foreach ($boys as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"bcl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
           }
           if($girls){
            foreach ($girls as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"gcl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
            }
            if($trans) {
            foreach ($trans as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"tgl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
            }
//**************************  individual data collect end *******************************************//

//**************************  gender wise total calculation start *******************************************//

           for($i=1;$i<=8;$i++) {
             for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
            ${"boystotalc".$i} += ${'bcl'.$j.'com'.$i} ;
            ${"girlstotalc".$i} += ${'gcl'.$j.'com'.$i} ;
            ${"tgtotalc".$i} += ${'tgl'.$j.'com'.$i} ;
            }
           }

            for($i=1;$i<=8;$i++) {  
             for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
            ${"boystotalc1".$j} += ${'bcl'.$j.'com'.$i} ;
            ${"girlstotalc1".$j} += ${'gcl'.$j.'com'.$i} ;
            ${"tgtotalc1".$j} += ${'tgl'.$j.'com'.$i} ;
            }
           }

//**************************  gender wise total calculation end *******************************************//


           $boysdata[]  = "";
           $girlsdata[] = "";
           $transdata[] = "";

           for($i=1;$i<=8;$i++) {
           for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
            $boysdata["bcl".$j."com".$i] =  ${"bcl".$j."com".$i};
            $girlsdata["gcl".$j."com".$i] =  ${"gcl".$j."com".$i};
            $transdata["tgl".$j."com".$i] =  ${"tgl".$j."com".$i};
           }
          }  


          for($i=1;$i<=8;$i++) {
             for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
              $boystotal["boystotalc".$i] = ${"boystotalc".$i};
              $girlstotalc["girlstotalc".$i] = ${"girlstotalc".$i};
              $tgtotalc["tgtotalc".$i] = ${"tgtotalc".$i};
            }
           }

            for($i=1;$i<=8;$i++) {   
          for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                   
            $boystotal1["boystotalc1".$j] = ${"boystotalc1".$j};
            $girlstotal1["girlstotalc1".$j] = ${"girlstotalc1".$j};
            $tgtotal1["tgtotalc1".$j] = ${"tgtotalc1".$j};
            }
           }

          // for($i=1;$i<=8;$i++) {
          //    for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
          //     ${'bcommtotoal'.$i}["boystotalc".$j] = ${"boystotalc".$i};
          //     ${'gcommtotal'.$i}["girlstotalc".$j] = ${"girlstotalc".$i};
          //     ${'tcommtotal'.$i}["tgtotalc".$j] = ${"tgtotalc".$i};
          //   }
          //  }

           $data['boysdata']  = $boysdata;
           $data['girlsdata']  = $girlsdata;
           $data['transdata']  = $transdata;
           $data['boystotal']  = $boystotal;
           $data['girlstotalc']  = $girlstotalc;
           $data['tgtotalc']  = $tgtotalc;

           $data['boystotal1']  = $boystotal1;
           $data['girlstotal1']  = $girlstotal1;
           $data['tgtotal1']  = $tgtotal1;

        $data['getdeclarationdata']=$this->Datamodel->getdeclarationdata($school_id); 

       
     
     // print_r($boysdata['bcl1com1']);

     // echo "<br/>";
     //  print_r($boystotal);

  
    $this->load->view('emis_school_declaration',$data);
     // 
       // echo json_encode( $data['communities']);
           } else { redirect('/', 'refresh'); }
      }


     public function declarationsubmit()
        {
          date_default_timezone_set('Asia/Kolkata');
          $this->load->library('session');
          $school_id=$this->session->userdata('emis_school_id');

          $emis_loggedin = $this->session->userdata('emis_loggedin');
          if($emis_loggedin) {
          $this->load->database();
          $this->load->library('session');
          $this->load->model('Homemodel');
          $this->load->model('Datamodel');
          $this->load->model('Registermodel');

          $date = date('Y-m-d');
          $time = date('H:i:s');
          $datetime = $date." ".$time;

          

          $getdeclarationdata=$this->Datamodel->getdeclarationdata($school_id); 


          if($getdeclarationdata) {
            redirect('home/emis_school_declaration_form', 'refresh');
          }
          else {

          $classlist1=$this->Datamodel->getclasslist($school_id); 
          $data['lowestclass'] = $classlist1[0]->low_class;
          $data['highclass']   = $classlist1[0]->high_class;

          $boys  =$this->Registermodel->getstudentdatancaste($school_id,1);
          $girls =$this->Registermodel->getstudentdatancaste($school_id,2);
          $trans =$this->Registermodel->getstudentdatancaste($school_id,3);

          $data['community'] =$this->Datamodel->getallcommunityfull();


  //**************************  declaration start *******************************************//
           for($i=1;$i<=8;$i++) {
            for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
              ${"bcl".$j."com".$i} = 0;
              ${"gcl".$j."com".$i} = 0;
              ${"tgl".$j."com".$i} = 0;
            }
           }
            for($i=1;$i<=8;$i++) {
              ${"C".$i}           = "";
              ${"boystotalc".$i}  = "";
              ${"girlstotalc".$i} = "";
              ${"tgtotalc".$i}    = "";
            }
  //**************************  declaration end *******************************************//

  //**************************  individual data collect start *******************************************//
           if($boys){
           foreach ($boys as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"bcl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
           }
           if($girls){
            foreach ($girls as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"gcl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
            }
            if($trans) {
            foreach ($trans as $key) {
             for($i=1;$i<=8;$i++) {

                 if($key->ccode == "C".$i)
                {
                 
                      for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
                        if($key->class == $j) {
                        ${"tgl".$j."com".$i} = $key->count;
                        }
                      }
                 }
             }
             }
            }
//**************************  individual data collect end *******************************************//

//**************************  gender wise total calculation start *******************************************//

           for($i=1;$i<=8;$i++) {
             for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
            ${"boystotalc".$i} += ${'bcl'.$j.'com'.$i} ;
            ${"girlstotalc".$i} += ${'gcl'.$j.'com'.$i} ;
            ${"tgtotalc".$i} += ${'tgl'.$j.'com'.$i} ;
            }
           }
//**************************  gender wise total calculation end *******************************************//
  
                 for($i=1;$i<=8;$i++) {

                  ${'boysdata'.$i}['school_id'] =  $school_id;  
                  ${'boysdata'.$i}['created_at'] =  $datetime;
                  ${'boysdata'.$i}['community'] = 'C'.$i;
                 for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {

                ${'boysdata'.$i}["c".$j."_b"] =  ${"bcl".$j."com".$i};
                ${'boysdata'.$i}["c".$j."_g"] =  ${"gcl".$j."com".$i};
                ${'boysdata'.$i}["c".$j."_t"] =  ${"tgl".$j."com".$i};
               }
              }

            for($i=1;$i<=8;$i++) {
             for($j=$data['lowestclass'];$j<=$data['highclass'];$j++) {
              ${'boysdata'.$i}["total_b"] = ${"boystotalc".$i};
              ${'boysdata'.$i}["total_g"] = ${"girlstotalc".$i};
              ${'boysdata'.$i}["total_t"] = ${"tgtotalc".$i};
            }
           }
              
              //  for($i=1;$i<=8;$i++) {
              //   print_r(${'boysdata'.$i});
              // }

               for($i=1;$i<=8;$i++) {

                $this->Homemodel->declaratinoupdate(${'boysdata'.$i});
              }

            redirect('home/emis_school_declaration_form', 'refresh');
          }
       

          } else { redirect('/', 'refresh'); }
        }

/* ---------------------------- Profile photo update ---------------------------------------*/
    public function updatephoto()
    {
  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $unique_id_no  = $this->input->post('unique_id_no');
     $path = $_FILES['student_profile']['name'];
     $ext = pathinfo($path, PATHINFO_EXTENSION);
     $logodocname = $unique_id_no.'.'.$ext;
     $output_dir1 = "https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/";
     $fileName1 = $logodocname;
     move_uploaded_file($_FILES["student_profile"]["tmp_name"],$output_dir1.$fileName1);

     $data=array('photo' =>$logodocname );
      $this->load->model('Homemodel');  
     $this->Homemodel->prof1dataupdate($unique_id_no,$data);

     // redirect('vle_candidate/vle_candidate_profile','refresh');

      }else { redirect('/', 'refresh'); }


    }
/* ---------------------------- Profile photo update End---------------------------------------*/

     public function exportCSV(){ 

  // echo "statrt";
   // file name 
   $this->load->database();
   $this->load->library('session');
   $this->load->model('Homemodel');

   $school_id=$this->session->userdata('emis_school_id');
   $filename = 'TNSchools_studentdata_'.date('Ymd').'.xls'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   // We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="file.xls"');


   // // get data 
   $usersData = $this->Homemodel->getstudentdata($school_id);
   
   // file creation 
   $file = fopen('php://output', 'w');

 
   $header = array("SNO","UNIQUE NUMBER","NAME"); 
   fputcsv($file, $header);
   $sno = 1;
   foreach ($usersData as $key){

   $line = array($sno,"$key->unique_id_no","$key->name");  
     fputcsv($file,$line); 
     $sno++;
   
   }
   fclose($file); 
   // echo "success";

   // echo json_encode($usersData );
  }
  
  /*********ramco magesh **/
  
    public function student_request_raised() {
        $this->load->library('session');
        $school_id=$this->session->userdata('emis_school_id');
        
        $data['raised'] = $this->Homemodel->getstudentraised($school_id);
        $this->load->view('student_request_raised',$data);
    }
  
    public function renewalform() {
		$this->load->library('session');
        $school_id=$this->session->userdata('emis_school_id');

		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
            $ts=" WHERE schoolnew_renewal.school_key_id=".$school_id." GROUP BY school_key_id";
            $where="schoolnew_renewal.school_key_id=".$school_id." AND (schoolnew_renewal.vaild_upto='0000-00-00' OR schoolnew_renewal.vaild_upto IS NULL OR schoolnew_renewal.vaild_upto > DATE(NOW()))";
            $this->load->model('AllApproveModel');
            //$data['renew']=$this->Blockmodel->getallrenewallist($where,$ts);
            $data['renew']=$this->AllApproveModel->AllApproveExcute($where,'',1,'');
            $data['basic']=$this->Homemodel->getSchoolInfo($school_id);
            $data['certificate']=$this->Homemodel->getCertificateMaster();
            $data['user']=$this->AllApproveModel->getAllUserCategory();
            
            $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_basicinfo.school_id='.$school_id;
            $GRP=' GROUP BY udise_code';
            
            $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.udise_code=T2.udise_code",$GRP);
			$this->load->view('renewal/renewalformNew',$data);
            //$this->load->view('renewal/renewalform',$data);
		}else {
			redirect('/', 'refresh');
		}
		
   }
   public function renewalNform() {
		$this->load->library('session');
        $school_id=$this->session->userdata('emis_school_id');

		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
            $ts=" WHERE schoolnew_renewal.school_key_id=".$school_id." GROUP BY school_key_id";
            $where="schoolnew_renewal.school_key_id=".$school_id." AND (schoolnew_renewal.vaild_upto='0000-00-00' OR schoolnew_renewal.vaild_upto IS NULL OR schoolnew_renewal.vaild_upto > DATE(NOW()))";
            $this->load->model('AllApproveModel');
            //$data['renew']=$this->Blockmodel->getallrenewallist($where,$ts);
            $data['renew']=$this->AllApproveModel->AllApproveExcute($where,'',1);
            $data['basic']=$this->Homemodel->getSchoolInfo($school_id);
            $data['certificate']=$this->Homemodel->getCertificateMaster();
            $data['user']=$this->AllApproveModel->getAllUserCategory();
            
            $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_basicinfo.school_id='.$school_id;
            $GRP=' GROUP BY udise_code';
            
            $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.udise_code=T2.udise_code",$GRP);
			$this->load->view('renewal/renewalformNew',$data);
            //$this->load->view('renewal/renewalform',$data);
		}else {
			redirect('/', 'refresh');
		}
		
   }
   public function schemedetails()
    {
		$this->load->view('indent/schemes_detail',$data);
	}
	 public function schemedetails1()
    {
		$this->load->view('indent/school_total_indent',$data);
	}
	 public function schemedetails2()
    {
		$this->load->view('indent/class1',$data);
	}
	 public function schemedetails3()
    {
		$this->load->view('indent/class2',$data);
	}
	 public function schemedetails4()
    {
		$this->load->view('indent/class3',$data);
	}
	 public function schemedetails5()
    {
		$this->load->view('indent/class4',$data);
	}
	 public function schemedetails6()
    {
		$this->load->view('indent/class5',$data);
	}
	 public function schemedetails7()
    {
		$this->load->view('indent/class6',$data);
	} public function schemedetails8()
    {
		$this->load->view('indent/class7',$data);
	}
	 public function schemedetails9()
    {
		$this->load->view('indent/class8',$data);
	}
	public function schemedetails10()
    {
		$this->load->view('indent/class9',$data);
	}
	public function schemedetails11()
    {
		$this->load->view('indent/class10',$data);
	}
	public function schemedetails12()
    {
		$this->load->view('indent/class11',$data);
	}
	public function schemedetails13()
    {
		$this->load->view('indent/class12',$data);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*Functions Written By Vivek Rao Ramco Cements Ltd.*******************************************************************/
    function profileCount(){
        if($this->uri->segment(3,0)=='dist'){
            $SQL=' WHERE schoolnew_basicinfo.curr_stat=1';
            $GRP=' GROUP BY district_name';
            $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.did=T2.did",$GRP);
            $data['npc']=$this->Statemodel->profilenotcompletecount($SQL,"T1.did=T2.did",$GRP);
            $data['next']='blk';
        }
        elseif($this->uri->segment(3,0)=='blk'){
            $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_block.district_id='.$this->uri->segment(4,0);
            $GRP=' GROUP BY block_name';
            $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.bid=T2.bid",$GRP);
            $data['npc']=$this->Statemodel->profilenotcompletecount($SQL,"T1.did=T2.did",$GRP);
            $data['next']='sch';
        }
        elseif($this->uri->segment(3,0)=='sch'){
            $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_block.id='.$this->uri->segment(4,0);
            $GRP=' GROUP BY udise_code';
            $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.udise_code=T2.udise_code",$GRP);
            $data['npc']=$this->Statemodel->profilenotcompletecount($SQL,"T1.did=T2.did",$GRP);
            $data['next']='dist';
        }
        $this->load->view('schoolInfo/dashboarddistrict',$data);
    }
    
    
    
    /**
    *DashBoard HM
    *VIT
    */

    public function emis_school_dash() 
    {

      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
        $data['today']=date("d-m-Y");
        $school_id = $this->session->userdata('emis_school_id');
        $school_udise  = $this->session->userdata('emis_school_udise');
        // print_r($this->session->userdata());
        $student_classwise_count = $this->Homemodel->student_classwise($school_id);
        $data['students_classwise_count'] = $student_classwise_count['school_details'];
        // $data['total_class'] = $student_classwise_count['select_len'];
        $data['class_level'] = $student_classwise_count['result'];
        $data['attendance_details'] = $this->Homemodel->get_school_student_attendance();
        $data['staff_details'] = $this->Homemodel->emis_school_staff_details($school_id);
        $data['student_castwise'] = $this->Homemodel->get_dash_schoolwise_community();
        // $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
        $data['aadhaar_status'] = $this->Homemodel->get_schoolwise_aadhaardetails();
		$data['student_invalid_aadhar_no'] = $this->Homemodel->student_invalid_aadhar_no($school_id);
        $data['student_invalid_phn_no'] = $this->Homemodel->student_invalid_phn_no($school_id);
        $data['bloodgroup_status'] = $this->Homemodel->get_schoolwise_bloodgroupdetails();
        $data['student_attendance'] = $this->Homemodel->get_school_student_attendance();
        $data['flash_data'] = $this->Homemodel->get_flash_news_data();
        $data['flash_field'] = $this->Homemodel->get_flash_field_data();
        // $data['teacher_attendance'] = $this->Statemodel->get_attendance_teacher_classwise(date('Y-m-d'),$school_id,'teachers_attend_daily');
        // echo"<pre>";print_r($data['teacher_attendance']);echo"</pre>";die;
        $table = 'students_child_detail';
        $where = array('school_id'=>$this->session->userdata('emis_school_id'),'transfer_flag'=>0,'request_flag'=>'1');
        $count = 'unique_id_no';
        $data['request_count'] = Common::get_list_count($table,$count,$where);
        // print_r($data['request_count']);die;
        $data['RTE_count'] = $this->Homemodel->get_RTI_Students_list('','');
        $data['RTE_count1'] = $this->Homemodel->get_RTI_Students_list1('','');
        $data['password_reset_count'] = $this->Homemodel->get_teacher_password_reset();
		    $data['teacherDetails'] = $this->TimetableModel->getTeacherlist($school_id);
		
    //////////////////////////
		/*teacher time table    */
		//////////////////////////
		
		$defaultteacher=$this->input->post('teacherid');
		if(empty($defaultteacher))
		{
		$teacher= $this->TimetableModel->getTeacherlist($school_id);
							if(empty($teacher))
							{
							$teacherid=1;	
							}
							else
								{
							$teacherid=$teacher[0]->teacher_code;
							  }
		}					  
		else
		{
		$teacherid=$this->input->post('teacherid');	
		}
		if(!empty($teacherid))
		{
		$school_id=$this->session->userdata('emis_school_id');
    //print_r($school_id);
        $this->load->model('TimetableModel');
		$teacherid=$teacherid;
		$data['teacherid']=$teacherid;
		$teachername=$this->TimetableModel->getteachername($teacherid);
		$data['teacher']=$teachername[0]->teacher_name;
		
		//print_r($dto);
		$week= $this->input->post('week');
		$month= $this->input->post('month');
		 $monthno=(explode("-",$month));
		 $year_no=$monthno[0];
		 $month_no=$monthno[1];
		 $weekno=(explode("-W",$week));
		 $year=$weekno[0];
		 $week_no=$weekno[1];
		
		 $data['year']=$year;
		 $data['week']=$week_no;
		 function getStartAndEndDate($week_no,$year) {
			 
				  $dto = new DateTime();
				  if($year!='')
				  {
				  $dto->setISODate($year,$week_no);
				  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
				  }
				  else
				  {
				
				  $dto = new DateTime();
				  $year_number  = date("Y", strtotime('now'));
				  $week_number  = date("W", strtotime('now'));				  
				  $dto->setISODate($year_number,$week_number);
                  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;				  
				  }
				  
                   }

	  $week_array = getStartAndEndDate($week_no,$year);
		
   
      
		$this_week_fst=$week_array['week_start'];
		$data['this_week_fst']=$week_array['week_start'];
		$data['this_week_ed']=$week_array['week_end'];
		$this_week_ed=$week_array['week_end'];
		$this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		//print_r('sample');
		
		$data['Mondayclasses'] = json_decode(json_encode($this->TimetableModel->MondayClassDetail($school_id,$teacherid,$this_week_fst)),true);
		//print_r($data['Mondayclasses']);
		$data['Tuesdayclasses'] = json_decode(json_encode($this->TimetableModel->TuesdayClassDetail($school_id,$teacherid,$this_week_second)),true);
		$data['Wednesdayclasses'] = json_decode(json_encode($this->TimetableModel->WednesdayClassDetail($school_id,$teacherid,$this_week_third)),true);
		$data['Thursdayclasses'] = json_decode(json_encode($this->TimetableModel->ThursdayClassDetail($school_id,$teacherid,$this_week_fourth)),true);
		$data['Fridayclasses'] = json_decode(json_encode($this->TimetableModel->FridayClassDetail($school_id,$teacherid,$this_week_fifth)),true);
		$data['Saturdayclasses'] = json_decode(json_encode($this->TimetableModel->SaturdayClassDetail($school_id,$teacherid,$this_week_sixth)),true);
		$data['Sundayclasses'] = json_decode(json_encode($this->TimetableModel->SundayClassDetail($school_id,$teacherid,$this_week_ed)),true);
		$data['Assignclassescount'] = $this->TimetableModel->AssignClasscount($school_id,$teacherid,$this_week_fst,
		$this_week_ed);
		$data['periodscount'] = $this->TimetableModel->getcountperiods($teacherid,$this_week_fst,$this_week_ed);
		//////////////////////////
		/* end teacher time table */
		//////////////////////////
		
		//////////////////////////
		/* class time table     */
		//////////////////////////
		
		$classid=$this->input->post('classid');
		$section=$this->input->post('section');
		if(!empty($classid))
		{
	    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        $this_week_fst = date("Y-m-d",$monday);
		 $date = $this_week_fst;
		$this_week_second=date('Y-m-d', strtotime($date. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($date. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($date. ' + 3 days')); 
		$this_week_fifth=date('Y-m-d', strtotime($date. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($date. ' + 5 days'));
        $this_week_ed = date("Y-m-d",$sunday);
		// print_r($this_week_fst);
		//print_r($this_week_second);
		// print_r($this_week_third);
		// print_r($this_week_fourth);
		// print_r($this_week_fifth);
		// print_r($this_week_sixth);
		// print_r($this_week_ed);
		
		$data['timetabledetails_monday'] = $this->TimetableModel->getweektimetable_data_monday_pdf($school_id,$classid,$section,$this_week_fst);
		//print_r($data['timetabledetails_monday']);
       $data['timetabledetails_tuesday'] = $this->TimetableModel->getweektimetable_data_tuesday_pdf($school_id,$classid,$section,$this_week_second);
	   //print_r($data['timetabledetails_tuesday']);
       $data['timetabledetails_wednesday'] = $this->TimetableModel->getweektimetable_data_wednesday_pdf($school_id,$classid,$section,$this_week_third);
		$data['timetabledetails_thursday'] = $this->TimetableModel->getweektimetable_data_thursday_pdf($school_id,$classid,$section,$this_week_fourth);
		$data['timetabledetails_friday'] = $this->TimetableModel->getweektimetable_data_friday_pdf($school_id,$classid,$section,$this_week_fifth);
		$data['timetabledetails_saturday'] = $this->TimetableModel->getweektimetable_data_saturday_pdf($school_id,$classid,$section,$this_week_sixth);
		$data['timetabledetails_sunday'] = $this->TimetableModel->getweektimetable_data_sunday_pdf($school_id,$classid,$section, $this_week_ed);
		$data['timetablecount'] = $this->TimetableModel->getweektimetable_count($school_id,$classid,$section,$this_week_fst,$this_week_ed);
		}
		//////////////////////////
		/* End class time table */
		//////////////////////////
			
		}
		else
		{
		$data['Mondayclasses']='';	
		$data['Tuesdayclasses']='';
		$data['Wednesdayclasses']='';
		$data['Thursdayclasses']='';
		$data['Fridayclasses']='';
		$data['Saturdayclasses'] ='';
		$data['Sundayclasses']='';
		$data['periodscount'] ='';
		}
        $data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
        $data['teacherDetails'] = $this->TimetableModel->getTeacherlist($school_id);
		$data['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
  $data['school_total_requirements'] = $this->Statemodel->school_wise_retreive_req_contribution($school_id);
        $this->load->view('emis_school_dash',$data);

      }else
      {
        redirect('/', 'refresh');
      }
    }

    
	    // public function loadTeacherTimeTable() {
		// $school_id=$this->session->userdata('emis_school_id');
        // $this->load->model('TimetableModel');
		// $teacherid=$this->input->post('teacherid');
		// $data['teacherid']=$teacherid;
		// $teachername=$this->TimetableModel->getteachername($teacherid);
		// $data['teacher']=$teachername[0]->teacher_name;
		// $week= $this->input->post('week');
		// $month= $this->input->post('month');
		 // $monthno=(explode("-",$month));
		 // $year_no=$monthno[0];
		 // $month_no=$monthno[1];
		 // $weekno=(explode("-W",$week));
		 // $year=$weekno[0];
		 // $week_no=$weekno[1];
		
		 // $data['year']=$year;
		 // $data['week']=$week_no;
		 // function getStartAndEndDate($week_no,$year) {
				  // $dto = new DateTime();
				  // if($year!='')
				  // {
				  // $dto->setISODate($year,$week_no);
				  // }
				  // else
				  // {
				  // $year_number  = date("Y", strtotime('now'));
				  // $week_number  = date("W", strtotime('now'));					
				  // $dto->setISODate($year_number,$week_number);  
				  // }
				  // $ret['week_start'] = $dto->format('Y-m-d');
				  // $dto->modify('+6 days');
				  // $ret['week_end'] = $dto->format('Y-m-d');
				  // return $ret;
                   // }

	  // $week_array = getStartAndEndDate($week_no,$year);
		
   
       
		// $this_week_fst=$week_array['week_start'];
		// $data['this_week_fst']=$week_array['week_start'];
		// $data['this_week_ed']=$week_array['week_end'];
		// $this_week_ed=$week_array['week_end'];
		// $this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		// $this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		// $this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		// $this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		// $this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		// if(!empty($teacherid))
		// {
		// $data['Mondayclasses'] = json_decode(json_encode($this->TimetableModel->MondayClassDetail($school_id,$teacherid,$this_week_fst)),true);
		// $data['Tuesdayclasses'] = json_decode(json_encode($this->TimetableModel->TuesdayClassDetail($school_id,$teacherid,$this_week_second)),true);
		// $data['Wednesdayclasses'] = json_decode(json_encode($this->TimetableModel->WednesdayClassDetail($school_id,$teacherid,$this_week_third)),true);
		// $data['Thursdayclasses'] = json_decode(json_encode($this->TimetableModel->ThursdayClassDetail($school_id,$teacherid,$this_week_fourth)),true);
		// $data['Fridayclasses'] = json_decode(json_encode($this->TimetableModel->FridayClassDetail($school_id,$teacherid,$this_week_fifth)),true);
		// $data['Saturdayclasses'] = json_decode(json_encode($this->TimetableModel->SaturdayClassDetail($school_id,$teacherid,$this_week_sixth)),true);
		// $data['Sundayclasses'] = json_decode(json_encode($this->TimetableModel->SundayClassDetail($school_id,$teacherid,$this_week_ed)),true);
		// $data['Assignclassescount'] = $this->TimetableModel->AssignClasscount($school_id,$teacherid,$this_week_fst,
		// $this_week_ed);
		// $data['periodscount'] = $this->TimetableModel->getcountperiods($teacherid,$this_week_fst,$this_week_ed);
		// }
		// else
		// {
		// $data['Mondayclasses']='';	
		// $data['Tuesdayclasses']='';
		// $data['Wednesdayclasses']='';
		// $data['Thursdayclasses']='';
		// $data['Fridayclasses']='';
		// $data['Saturdayclasses'] ='';
		// $data['Sundayclasses']='';
		// $data['periodscount'] ='';
		// }
        // $data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
        // $data['teacherDetails'] = $this->TimetableModel->getTeacherlist($school_id);
		
        // $this->load->view('emis_school_dash',$data);
    // }
    public function get_school_id_requirement()
    {
       $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
       $school_id = $this->uri->segment(3, 0);
       $data['school_need'] = $this->Statemodel->get_school_id_by_requirements($school_id);
       

    }
  }

    public function emis_school_student_classwise($update_status ='',$update_data='')
    {
         
         // echo $update_status;die;
         /*$school_id = $this->session->userdata('emis_school_id');
         $classlist1=$this->Datamodel->getclasslist($school_id);
        
        $data['classstudying']=$this->Datamodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class);
            
            if(isset($_POST['stusearch'])){
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id); 
            }
        
         $this->load->view('emis_school_student_classwise',$data);*/
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
          // print_r($this->session->userdata());
        $class_id  = $this->uri->segment(3);
        // print_r($update_data['class_studying_id']);
        if(!empty($class_id)){
        $school_id = $this->session->userdata('emis_school_id');
        // echo $school_id;
        $section_id = '';
          $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id);
       
         }else if($update_status=='success')
         {
            $class_id = $update_data['class_studying_id'];
          $section_id = '';
          $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id);
         }else{
         
          // print_r($this->input->post());
          $class_id = $this->input->post('class_id');
          $section_id = $this->input->post('section_id');
         
          $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id);
         }
       // print_r($data['allstuds']);
         $school_id = $this->session->userdata('emis_school_id');
        $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $data['district'] = $this->Homemodel->get_common_table_details('schoolnew_district');
        $data['bloodgroup'] = $this->Homemodel->get_common_table_details('baseapp_bloodgroup');
        $data['occpation'] = $this->Homemodel->get_common_table_details('baseapp_occupation');
        $data['parentIncome'] = $this->Homemodel->get_common_table_details('baseapp_parentincome');
        $data['medium_sec'] =  $this->Homemodel->getallmediumofinst($school_id);
        $data['mother_tang'] = $this->Homemodel->get_common_table_details('schoolnew_mediumofinstruction');
        // print_r($data['mother_tang']);die;
        $data['disabilities'] = $this->Homemodel->get_common_table_details('baseapp_differently_abled');
        $data['religions'] = $this->Homemodel->get_common_table_details('baseapp_religion');
        $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
		$data['rtetype'] = $this->Homemodel->getrte_type();
        // print_r($data);
        if(!empty($update_status)){ 

          if($update_status =='success')
        {
          $data['success'] = $update_data['name'].' Profile Update successfully';
        }else
        {
          // $data['error'] = 'Something Went Wrong';

        }
      }
        // print_r($data['success']);die;
       $this->load->view('emis_school_student_classwise',$data);
      }else
      {
        redirect('/', 'refresh');

      }
    }

    /**************************************************************
    * Update Students Profile                                     *
    * VIT-sriram                                                  *
    * 19/03/2019                                                  *
    * Post Method Parms Students Profile All Datas                *
    ***************************************************************/

    public function update_student_profile()
    {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin)
        {
        date_default_timezone_set('Asia/Calcutta');

          // print_r($this->input->post());die;
        $this->form_validation->set_rules('emis_reg_stu_name', 'Student name', 'trim|required');
    
  $this->form_validation->set_rules('emis_stu_dob', 'Date of Birth', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_gender', 'Gender', 'trim|required');
    $this->form_validation->set_rules('emis_reg_religion', 'Religion', 'trim|required');
    $this->form_validation->set_rules('emis_reg_community', 'Community', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_lang', 'Student launguage', 'trim|required');
    $this->form_validation->set_rules('emis_reg_email', 'Email', 'trim|valid_email');
    $this->form_validation->set_rules('emis_reg_mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('emis_reg_stu_door', 'door no', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_street', 'Street name', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_city', 'City name', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_district', 'District', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_pincode', 'Pincode', 'trim|required');
    //$this->form_validation->set_rules('emis_class_studying', 'Class studying', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_section', 'Section', 'trim|required');
    /*$this->form_validation->set_rules('emis_prev_class', 'Previous class', 'trim|required');
    $this->form_validation->set_rules('emis_reg_doj_date', 'Joining Date', 'trim|required');
    $this->form_validation->set_rules('emis_reg_doj_month', 'Joining Month', 'trim|required');
    $this->form_validation->set_rules('emis_reg_doj_year', 'Joining Year', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_admission', 'Admission number', 'trim|required');
  $this->form_validation->set_rules('emis_reg_stu_date', 'Birth Date', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_month', 'Birth Month', 'trim|required');
    $this->form_validation->set_rules('emis_reg_stu_year', 'Birth Year', 'trim|required');*/
  $this->form_validation->set_rules('emis_reg_stu_doj', 'Date of Joining', 'trim|required');
    $this->form_validation->set_rules('emis_reg_mediofinst', 'Medium of Instruction', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $data = array('class_studying_id'=>$this->input->post('current_class'));
              $this->emis_school_student_classwise(0,$data);

        }else{
          // print_r($this->input->post());die;
          $image_data = $this->input->post('emis_image_data');
          // echo $image_data;die;

            $data = array(
                      'id'                  =>$this->input->post('emis_reg_stu_id'),
                      'name'                =>$this->input->post('emis_reg_stu_name'),
                      
                      'name_tamil'          =>$this->input->post('emis_reg_stu_idname'),                      
                                       
                      'religion_id'         =>$this->input->post('emis_reg_religion'),
                      'community_id'        =>$this->input->post('emis_reg_community'),
                      'subcaste_id'         =>$this->input->post('emis_reg_subcaste'),
                      'pass_fail'           =>$this->input->post('students_status'),
                      'aadhaar_uid_number' =>$this->input->post('emis_reg_stu_aadhaar'),
                      'dob'                 =>date('Y-m-d',strtotime($this->input->post('emis_stu_dob'))),
                      'doj'                 =>date('Y-m-d',strtotime($this->input->post('emis_reg_stu_doj'))),
                      'gender'              =>$this->input->post('emis_reg_stu_gender'),
                      'bloodgroup'          =>$this->input->post('emis_reg_stu_bg'),
                      
                      'mothertounge_id'     =>$this->input->post('emis_reg_stu_lang'),
                      'disadvantaged_group' =>$this->input->post('emis_disad_group_name'),
                      'differently_abled'   =>$this->input->post('emis_disability_type_name'),
                      'mother_name'         =>$this->input->post('emis_reg_mothername'),
                      'father_name'         =>$this->input->post('emis_reg_fathername'),
                      'guardian_name'       =>$this->input->post('emis_reg_guardianname'),
                      'father_occupation'   =>$this->input->post('emis_reg_fatheroccu'),
                      'mother_occupation'   =>$this->input->post('emis_reg_motheroccu'),
                      'parent_income'       =>$this->input->post('emis_reg_parents_income'),
                      'phone_number'        =>$this->input->post('emis_reg_mobile'),
                      'email'               =>$this->input->post('emis_reg_email'),
                      'house_address'       =>$this->input->post('emis_reg_stu_door'),
                      'street_name'         =>$this->input->post('emis_reg_stu_street'),
                      'area_village'        =>$this->input->post('emis_reg_stu_city'),
                      'district_id'         =>$this->input->post('emis_reg_stu_district'),
                      'pin_code'            =>$this->input->post('emis_reg_stu_pincode'),
                      'school_id'           =>$this->session->userdata('emis_school_id'),
                      'class_studying_id'   =>($this->input->post('emis_class_studying')==null?$this->input->post('current_class'):$this->input->post('emis_class_studying')),
                      'class_section'       =>$this->input->post('emis_reg_stu_section'),
                      'prv_class_std'       =>$this->input->post('emis_prev_class'),
                      'transfer_flag'       =>0,
                      'rte_type' =>$this->input->post('rtetype'),
                      'school_admission_no' =>$this->input->post('emis_reg_stu_admission'),
                      'doj'                 => date('Y-m-d',strtotime($this->input->post('emis_reg_stu_doj'))),
                      'education_medium_id' =>$this->input->post('emis_reg_mediofinst'),
                      'unique_id_no'        =>$this->input->post('emis_reg_stu_uni_id'),
                      'group_code_id'       =>$this->input->post('emis_reg_grup_code'),
                      
                      'child_admitted_under_reservation'   =>$this->input->post('emis_reg_stu_rte'),
                      'student_admitted_section'           =>$this->input->post('emis_reg_stu_aidunaid'),
                      'status'                             => "Active",
                      'updated_at' =>date('Y-m-d H:i:s')
                    );
            if(!empty($image_data)){
            $this->base_get();
            
            $image_name = $this->input->post('emis_image_name');
            $photo = (!empty($image_name)?$image_name:$this->input->post('emis_reg_stu_uni_id').'.jpg');
            $data['photo']= $photo;
            }
          // echo"<pre>";print_r($data);echo"</pre>";die;

          $result = $this->Homemodel->update_student_profile($data);
          $data['class_studying_id'] = $this->input->post('current_class');
          
          if($result){
              $this->emis_school_student_classwise('success',$data);
        }
          }

      }else
        {
          redirect('/', 'refresh');

        }

    }

    public function base_get()
  {

    // $reco = ;
    // print_r($this->input->post());die;
          // $base64_img = "data:image/png;base64";
          // $base64_img .= implode("[removed]",);
          $data = $this->input->post('emis_image_data');
          $base64_img =  str_replace("[removed]","data:image/png;base64,", $data);
          $output_file = APPPATH."docs/temp_base64_image.jpg";
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
              for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
              }
            $temp_file_name = $randomString.date('Y-m-d-H:m:s');
            
          
          $ifp = fopen( $output_file, 'wb' ); 

          // split the string on commas
          // $data[ 0 ] == "data:image/png;base64"
          // $data[ 1 ] == <actual base64 string>
          $data = explode( ',', $base64_img );
          // print_r($data);
          // we could add validation here with ensuring count( $data ) > 1
          fwrite( $ifp, base64_decode( $data[ 1 ] ) );

          // clean up the file resource
          fclose( $ifp ); 
          // $students_id = '';
          $students_id = $this->input->post('emis_image_name');
          if(!empty($students_id))
          {
            $students_id = $students_id;
          }else
          {
            $students_id = $this->input->post('emis_reg_stu_uni_id').'.jpg';
          }

          $tempdoc = $output_file;
          // $tempdocname = $students_id;
          $key = Students_EMIS.'/'.$students_id;
          $tmp = $tempdoc;
          // echo $key;
        $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$key,$tmp);
        // echo $s3Result;
           
  }

    public function get_common_tables()
    {
      $class = $this->input->post('class_id');
      $table = $this->input->post('table');
      $where_col = $this->input->post('where_col');

       $class_where = array($where_col,$class);
       // print_r($class_where);die;
      $data = $this->Homemodel->get_common_table_details($table,$class_where);
      // print_r($data);
      echo json_encode($data);
    }

    /**************************************************************
    * Get Aws Images Students Profile                             *
    * VIT-sriram                                                  *
    * 20/03/2019                                                  *
    * Post Method Parms Students Profile Image Data               *
    ***************************************************************/

    public function get_aws_s3_image()
    {

            $records = $this->input->post('records');
            $keyname = $records;
            // echo TEACHER_BUCKET_NAME;die;
            $students_profile = Common::get_url(TEACHER_BUCKET_NAME,$keyname,'+5 minutes');
          // print_r( $students_profile);
            echo json_encode($students_profile);
    } 

    /** This function also used in emis_school_mark_student view page in mentioned menu 
     * (school login Menu : Academic Records ->SubjectWise CCE Records) : (venba/ps) */
    public function get_school_section_details()
  {
    
          $class_id = $this->input->post('class_id');
          $class_section = $this->Homemodel->get_schoolwise_class_section($class_id);
          echo json_encode($class_section);
        
  }
   public function emis_school_co_scholostic()
  {
	$school_id = $this->session->userdata('emis_school_id'); 
	$classid = $this->input->post('schoolcate');
	if($classid=='')
	{
	$data['gradetable_sc']='';
    $data['communitycount']='';	
	$data['classdetails']= $this->Homemodel->class_details($school_id);
	}
	else
	{
	$data['classname']=$classid ;	
    $data['gradetable_sc']= $this->Homemodel->co_scholostic_details($school_id,$classid);
	$data['classdetails']= $this->Homemodel->class_details($school_id);
	$data['communitycount']= $this->Homemodel->get_classwise_community($classid);
	}
	$this->load->view('emis_school_marktable_co_scholostic',$data);  
  }
  public function emis_school_co_scholostic_add()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 // print_r();
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=1;	
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'type'=> $res['Type'],
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'enrolled'=>$res['NO.ENROLLED'],
		   'assessed'=>$res['NO.ASSESSED'],
		   'class_id' => $classid,
		   'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->insert_co_scholostic_data($data,$classid);
			   echo $result; 
		}
	}
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}
public function emis_school_co_scholostic_update()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=2;
		   $id=$res['ID'];
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'type'=> $res['Type'],
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'enrolled'=>$res['NO.ENROLLED'],
		   'assessed'=>$res['NO.ASSESSED'],
		    'class_id' => $classid,
		   'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_co_scholostic_data($data,$id);
			   echo $result; 
		}
	}
	   
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}
public function emis_school_co_scholostic_update_final()
{	
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	foreach($records as $index => $res)
	{
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=3;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	      'school_id' => $this->session->userdata('emis_school_id'),
		   'type'=> $res['Type'],
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'enrolled'=>$res['NO.ENROLLED'],
		   'assessed'=>$res['NO.ASSESSED'],
		    'class_id' => $classid,
		   'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_co_scholostic_data_final($data,$id);
			   echo $result; 
		}
	}
	     
		 }

	 else { redirect('/', 'refresh'); }

}
public function emis_school_student_co_scholastic()
{
	$classid = $this->input->post('schoolcate');
	$termid = $this->input->post('termid');
	
	$school_id = $this->session->userdata('emis_school_id'); 
	if($classid=='')
	{
   
	$data['studentcolist']='';	
	$data['classdetails']= $this->Homemodel->class_details($school_id);
	$data['communitycount']='';
	}
	else
	{
	$data['classname']=$classid ;
	$data['subjectid']=$subid;
	$data['termid']=$termid;
	$data['studentcolist']=$this->Homemodel->student_cs_list($school_id,$classid,$termid);
	//print_r($data['studentlist']);
	$data['classdetails']= $this->Homemodel->class_details($school_id);
   
	}
   $this->load->view('emis_school_mark_student_cs',$data);
}    

  

public function emis_school_co_studentmark_add()
{	
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
	
	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $termid = $this->input->post('termid');
		   $status=1;
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'term_id' => $termid,
		   'class_id' => $classid,
		   'student_id'=>$res['student_id'],
		   'student_name'=>$res['student_name'],
		   'student_attendance'=>1,
		   'PE'=>strtoupper($res['A']),
		   'LK'=>strtoupper($res['B']),
           'AV' =>strtoupper($res['C']),
		   'HY' =>strtoupper($res['D']),
		   'CC' =>strtoupper($res['E']),
		   
		   
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->insert_co_student_mark_data($data);
			   echo $result; 
		}
	}
	$studentabs=$this->input->post('absentlist');
	if(!empty($studentabs))
	   {
	$studentabs1 = array_filter($studentabs);
	foreach($studentabs1 as $stuabs)
			 { 
				 $data = array(
				'PE'=>'ABS',
		        'LK'=>'Abs',
                'AV' =>'Abs',
		        'HY' =>'Abs',
		        'CC' =>'Abs',
				);
				$resulta = $this->Homemodel->update_co_student_absent_data($stuabs,$data);
				echo $resulta;
			 }
	   }
	 $studentabsent=$this->input->post('absentlist');
	   if(!empty($studentabsent))
	   {
	 $attendancevalue=2; //for absent value //
     $result1 = $this->Homemodel->insert_co_student_attendance($studentabsent,$attendancevalue);
	 echo $result1; 	
	   }
		 }

	 else { redirect('/', 'refresh'); }
	
}
public function emis_school_co_studentmark_update()
{	
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $termid = $this->input->post('termid');
		   $status=2;
		   $id=$res['UpdateID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'term_id' => $termid,
		   'class_id' => $classid,
		   'student_id'=>$res['student_id'],
		   'student_name'=>$res['student_name'],
		   'PE'=>strtoupper($res['A']),
		   'LK'=>strtoupper($res['B']),
           'AV' =>strtoupper($res['C']),
		   'HY' =>strtoupper($res['D']),
		   'CC' =>strtoupper($res['E']),
		   
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_co_student_mark_data($data,$id);
			    echo $result; 
		}
	}
	
	$studentabs=$this->input->post('Absentlist');
	if(!empty($studentabs))
	   {
	$studentabs1 = array_filter($studentabs);
	foreach($studentabs1 as $stuabs)
			 {
				 
				$attendancevalue=2; //for absent value //
				 $data = array(
				'PE'=>'Abs',
		        'LK'=>'Abs',
                'AV' =>'Abs',
		        'HY' =>'Abs',
		        'CC' =>'Abs',
				);
				$resulta = $this->Homemodel->update_co_student_absent_data($stuabs,$data);
                $resultb = $this->Homemodel->update_co_student_absent($stuabs,$attendancevalue);
				echo $resultb;
			 }
	   }
	$studentpre=$this->input->post('Presentlist');
	if(!empty($studentpre))
	   {
	$studentpre1 = array_filter($studentpre);
	foreach($studentpre1 as $stupre)
			 { 
				$attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_co_student_present($stupre,$attendancevalue);
				echo $result2;
			 }
	   }			 
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}
public function emis_school_co_student_mark_update_final()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
			 $termid = $this->input->post('termid');
		   $status=3;
		   $id=$res['UpdateID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'term_id' => $termid,
		   'class_id' => $classid,
		   'student_id'=>$res['student_id'],
		   'student_name'=>$res['student_name'],
		   
		   'PE'=>strtoupper($res['A']),
		   'LK'=>strtoupper($res['B']),
           'AV' =>strtoupper($res['C']),
		   'HY' =>strtoupper($res['D']),
		   'CC' =>strtoupper($res['E']),
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_co_student_mark_final($data,$id);
			   echo $result; 
		}
	}
	     
	  $studentabs=$this->input->post('Absentlist');
	$studentabs1 = array_filter($studentabs);
	foreach($studentabs1 as $stuabs)
			 {
				$attendancevalue=2; //for absent value //
				 $data = array(
				'PE'=>'Abs',
		        'LK'=>'Abs',
                'AV' =>'Abs',
		        'HY' =>'Abs',
		        'CC' =>'Abs',
				);
				$resulta = $this->Homemodel->update_co_student_absent_data($stuabs,$data);
                $resultb = $this->Homemodel->update_co_student_absent($stuabs,$attendancevalue);
				echo $resultb;
			 }
	   $studentpre=$this->input->post('Presentlist');
	$studentpre1 = array_filter($studentpre);
	foreach($studentpre1 as $stupre)
			 {
				
				$attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_co_student_present($stupre,$attendancevalue);
				echo $result2;
			 }		 
       
       
		 }

	 else { redirect('/', 'refresh'); }

}





public function emis_school_markcardtable()
{
	
	$classid = $this->input->post('schoolcate');
	$school_id = $this->session->userdata('emis_school_id'); 
	if($classid=='')
	{
   
	$data['gradetable']='';	
	$data['classdetails']= $this->Homemodel->class_details($school_id);
	$data['communitycount']='';
	}
	else
	{
	$data['classname']=$classid ;
	//print_r($data['classid']);die();
	$data['classdetails']= $this->Homemodel->class_details($school_id);
    $data['gradetable']= $this->Homemodel->grade_details($school_id,$classid);
	$data['communitycount']= $this->Homemodel->get_classwise_community($classid);
	
	}
$this->load->view('emis_school_marktable',$data);	
}

public function emis_school_grade_table_add()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 // print_r();
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=1;	
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'assessed'=>$res['NO.Assesed'],
		   'class_id' => $classid,
		   'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   'FD'=>$res['D'],
		   'SA' => $res['E'],
		   'SB' => $res['F'],
		   'SC' => $res['G'],
		   'SD' => $res['H'],
		   'FSA' => $res['I'],
		   'FSB' => $res['J'],
		   'FSC' => $res['K'],
		   'FSD' => $res['L'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->insert_grade_table_data($data,$classid);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}
public function emis_school_grade_table_update()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=2;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'assessed'=>$res['NO.Assesed'],
		   'class_id' => $classid,
		   'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   'FD'=>$res['D'],
		   'SA' => $res['E'],
		   'SB' => $res['F'],
		   'SC' => $res['G'],
		   'SD' => $res['H'],
		   'FSA' => $res['I'],
		   'FSB' => $res['J'],
		   'FSC' => $res['K'],
		   'FSD' => $res['L'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_grade_table_data($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}

public function emis_school_grade_table_update_final()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   $classid = $this->input->post('classid');
		   $status=3;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'subject'=> $res['SUBJECT'],
		   'community'=>$res['COMMUNITY'],
		   'assessed'=>$res['NO.Assesed'],
		   'class_id' => $classid,
		  'FA'=>$res['A'],
		   'FB'=>$res['B'],
           'FC' => $res['C'],
		   'FD'=>$res['D'],
		   'SA' => $res['E'],
		   'SB' => $res['F'],
		   'SC' => $res['G'],
		   'SD' => $res['H'],
		   'FSA' => $res['I'],
		   'FSB' => $res['J'],
		   'FSC' => $res['K'],
		   'FSD' => $res['L'],
		  
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_grade_table_data_final($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }

}
 public function emis_school_monitoring_detail()
  {
	$school_id = $this->session->userdata('emis_school_id'); 
     $data['gradetable_monitoring']= $this->Homemodel->school_monitoring_details($school_id);
	  $data['gradetable_studentreg']= $this->Homemodel->school_studentreg_details($school_id);
	  $data['answer_details']= $this->Homemodel->school_question_answer_details($school_id);
	  //print_r( $data['answer_details']);
	  // print_r( $data['answer_details']);
	   // die();
	$this->load->view('emis_school_monitoring_form',$data);  
  }
public function emis_school_monitoring_add()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 // print_r();
		
		 if($index!= 0)
		{
		  
		   $status=1;	
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   
		   
		   'Allowed_teacher'=>$res['A'],
           'based_on_year' => $res['B'],
		   'based_on_rte'=>$res['C'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->insert_monitoring_data($data);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
} 
public function emis_school_monitoring_update()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   
		   $status=2;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	        'school_id' => $this->session->userdata('emis_school_id'),
		   'Allowed_teacher'=>$res['A'],
           'based_on_year' => $res['B'],
		   'based_on_rte'=>$res['C'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_monitoring_data($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
} 
public function emis_school_monitoring_update_final()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   
		   $status=3;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	        'school_id' => $this->session->userdata('emis_school_id'),
		   'Allowed_teacher'=>$res['A'],
           'based_on_year' => $res['B'],
		   'based_on_rte'=>$res['C'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_monitoring_data_final($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }

}
public function emis_school_studentreg_add()
{
	
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
	$records = $this->input->post('records');
	$records = json_decode($records,true);
	foreach($records as $index => $res)
	{
		
		 if($index!= 0)
		{
		  
		   $status=1;	
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'class'=>$res['Class'],
		   'RB'=>$res['A'],
           'RG' => $res['B'],
		   'RT'=>$res['C'],
		   'YEB'=>$res['D'],
           'YEG' => $res['E'],
		   'YET'=>$res['F'],
		   'YEPB'=>$res['G'],
           'YEPG' => $res['H'],
		   'YEPT'=>$res['I'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->insert_studentreg_data($data);
			   echo $result; 
		}
	}
	     
		
       
		
}
	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}  
public function emis_school_studentreg_update()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   
		   $status=2;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'RB'=>$res['A'],
           'RG' => $res['B'],
		   'RT'=>$res['C'],
		   'YEB'=>$res['D'],
           'YEG' => $res['E'],
		   'YET'=>$res['F'],
		   'YEPB'=>$res['G'],
           'YEPG' => $res['H'],
		   'YEPT'=>$res['I'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_studentreg_data($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}     
public function emis_school_studentreg_final()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 

	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	
	foreach($records as $index => $res)
	{
		 
		
		 if($index!= 0)
		{
		   
		   $status=3;
		   $id=$res['ID'];
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'RB'=>$res['A'],
           'RG' => $res['B'],
		   'RT'=>$res['C'],
		   'YEB'=>$res['D'],
           'YEG' => $res['E'],
		   'YET'=>$res['F'],
		   'YEPB'=>$res['G'],
           'YEPG' => $res['H'],
		   'YEPT'=>$res['I'],
		   'status'=>$status,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_studentreg_data_final($data,$id);
			   echo $result; 
		}
	}
	     
		
       
		 }

	 else { redirect('/', 'refresh'); }

} 

////////////////////////////////////////////////////////
/*  scholastic TamilBala menu name: Question Answer */
///////////////////////////////////////////////////////      
	  
public function emis_school_question_answer()
{
	
	
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
	       $answerfourtext=$this->input->post('answerfourtext');
		   $school_id = $this->session->userdata('emis_school_id'); 
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'q1'=>1,
           'a1' =>implode(",",$this->input->post('ansone')),
		   'q2'=>2,
		   'a2'=>implode(",",$this->input->post('anstwo')),
           'q3' =>3,
		   'a3'=>implode(",",$this->input->post('ansthree')),
		   'q4'=>4,
           'a4' =>implode(",",$this->input->post('ansfour')),
		   'a4text' =>$answerfourtext,
		   'q5'=>5,
		   'a5'=>$this->input->post('ansfivea'),
		   'q6'=>6,
           'a6' =>$this->input->post('ansfiveb'),
		   'status'=>1,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->save_question_answer($data);
			   echo $result;
		 }

	 else { redirect('/', 'refresh'); }

} 
public function emis_school_question_answer_update()
{
$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
	       $id=$this->input->post('id');
		   $school_id = $this->session->userdata('emis_school_id'); 
		  $answerfourtext=$this->input->post('answerfourtext');
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'q1'=>1,
           'a1' =>implode(",",$this->input->post('ansone')),
		   'q2'=>2,
		   'a2'=>implode(",",$this->input->post('anstwo')),
           'q3' =>3,
		   'a3'=>implode(",",$this->input->post('ansthree')),
		   'q4'=>4,
           'a4' =>implode(",",$this->input->post('ansfour')),
		   'a4text' =>$answerfourtext,
		   'q5'=>5,
		   'a5'=>$this->input->post('ansfivea'),
		   'q6'=>6,
           'a6' =>$this->input->post('ansfiveb'),
		   'status'=>2,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->update_question_answer($data,$id);
			   echo $result;
		 }

	 else { redirect('/', 'refresh'); }

} 
public function emis_school_question_answer_final()
{
$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
	       $id=$this->input->post('id');
		   $school_id = $this->session->userdata('emis_school_id'); 
		   $answerfourtext=$this->input->post('answerfourtext');
           $data = array(
	       'school_id' => $this->session->userdata('emis_school_id'),
		   'q1'=>1,
           'a1' =>implode(",",$this->input->post('ansone')),
		   'q2'=>2,
		   'a2'=>implode(",",$this->input->post('anstwo')),
           'q3' =>3,
		   'a3'=>implode(",",$this->input->post('ansthree')),
		   'q4'=>4,
           'a4' =>implode(",",$this->input->post('ansfour')),
		    'a4text' =>$answerfourtext,
		   'q5'=>5,
		   'a5'=>$this->input->post('ansfivea'),
		   'q6'=>6,
           'a6' =>$this->input->post('ansfiveb'),
		   'status'=>3,
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Homemodel->final_question_answer($data,$id);
			   echo $result;
		 }

	 else { redirect('/', 'refresh'); }

} 

//////////////////////
/* End of the Menu */
////////////////////


////////////////////////////////////////////////////////
/*  scholastic TamilBala menu name: student Mark card */
/////////////////////////////////////////////////////// 


public function emis_school_student_mark()
{

$subid = $this->input->post('subjectid');
  $termid = $this->input->post('termid');
  $classid = $this->input->post('schoolwiseclassid');
  $sectionid = $this->input->post('sectionid');
  $school_id = $this->session->userdata('emis_school_id');

if($classid=='')
{
$data['studentlist']='';
$data['classdetails']= $this->Homemodel->class_details($school_id);
$data['communitycount']='';
}
else
{
$data['classname']=$classid ;
  $data['subjectid']=$subid;
  $data['termid']=$termid;
  $data['sectionid']=$sectionid;
  $subject = $this->Homemodel->get_classwise_textbook($classid,$termid,$subid);
  $data['subjectname'] = $subject['0']['book_name'];
  switch($termid){
    case '1' : $tname = 'schoolnew_qstudent_markdetails'; break;
    case '2' : $tname = 'schoolnew_qstudent_markterm2' ; break;
    case '3' : $tname = 'schoolnew_qstudent_markterm3' ; break;
}

$data['studentlist']=$this->Homemodel->student_list($school_id,$classid,$subid,$termid,$sectionid,$tname);
$data['classdetails']= $this->Homemodel->class_details($school_id);
  // print_r($data);
}
   $this->load->view('emis_school_mark_student',$data);
}

public function emis_school_studentmark_add()
{
 $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {
     
                    $records = $this->input->post('records');
                    $tname = $this->input->post('tname');
                    $records = json_decode($records,true);
                    unset($records[0]);
                    unset($records[1]);
                 foreach($records as $index => $res){
                              $classid = $this->input->post('classid');
                              $subjectid = $this->input->post('subjectid');
                              $termid = $this->input->post('termid');
                              $status=1;
                          // echo $subjectid;
                              $data = array(
                                          'school_id' => $this->session->userdata('emis_school_id'),
                                          'term_id' => $termid,
                                          'subject_id'=>$subjectid,
                                          'class_id' => $classid,
                                          'student_id'=>$res['student_id'],
                                          'student_name'=>$res['student_name'],
                                          'student_attendance'=>1,
                                          'section'=>$res['section'],
                                          'FAA'=>$res['A'] != '' ? $res['A'] : '0',
                                          'FAB'=>$res['B'] != '' ? $res['B'] : '0',
                                          'FAC'=>$res['C'] != '' ? $res['C'] : '0',
                                          'FAD'=>$res['D'] != '' ? $res['D'] : '0',
                                          'FBA'=> $res['E'] != '' ? $res['E'] : '0',
                                          'FBB'=> $res['F'] != '' ? $res['F'] : '0',
                                          'FBC'=> $res['G'] != '' ? $res['G'] : '0',
                                          'FBD'=> $res['H'] != '' ? $res['H'] : '0',
                                          'FAM'=> $res['I'] != '' ? $res['I'] : '0',
                                          'SAM'=> $res['J'] != '' ? $res['J'] : '0',
                                          'status'=>$status,
                                          'created_date' => date("Y-m-d H:i:s"));
                                         
         $result = $this->Homemodel->insert_student_mark_data($data,$tname);
         echo $result;

}
$studentabs=$this->input->post('absentlist');
if(!empty($studentabs))
  {
$studentabs1 = array_filter($studentabs);
foreach($studentabs1 as $stuabs)
{
$data = array(
  'FAA'=>'0',
  'FAB'=>'0',
       'FAC' =>'0',
  'FAD'=>'0',
  'FBA' =>'0',
  'FBB' =>'0',
  'FBC' =>'0',
       'FBD' =>'0',
       'FAM' =>'0',
  'SAM' =>'0',
);
$resulta= $this->Homemodel->update_student_absent_data($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent($stuabs,$attendancevalue,$tname);
echo $resultb;
}
  }
$studentabsent=$this->input->post('absentlist');
if(!empty($studentabsent))
  {
$attendancevalue=2; //for absent value //
     $result1 = $this->Homemodel->insert_student_attendance($studentabsent,$attendancevalue,$tname);
echo $result1;

       }
}

else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)
}

public function emis_school_studentmark_update()
{


$emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {

  $records = $this->input->post('records');
  $records = json_decode($records,true);
  $tname = $this->input->post('tname');
  unset($records[0]);
  unset($records[1]);

foreach($records as $index => $res)
{
  $classid = $this->input->post('classid');
  $subjectid = $this->input->post('subjectid');
  $termid = $this->input->post('termid');
  $status=2;
  $id=$res['UpdateID'];
  $school_id = $this->session->userdata('emis_school_id');
       $data = array(
    'school_id' => $this->session->userdata('emis_school_id'),
  'term_id' => $termid,
  'subject_id'=>$subjectid,
  'class_id' => $classid,
  'student_id'=>$res['student_id'],
       'student_name'=>$res['student_name'],
       'section'=>$res['section'],
 // 'student_attendance'=>1,
  'FAA' => $res['A'] != '' ? $res['A'] : '0',
  'FAB' => $res['B'] != '' ? $res['B'] : '0',
       'FAC' => $res['C'] != '' ? $res['C'] : '0',
  'FAD' => $res['D'] != '' ? $res['D'] : '0',
  'FBA' => $res['E'] != '' ? $res['E'] : '0',
  'FBB' => $res['F'] != '' ? $res['F'] : '0',
  'FBC' => $res['G'] != '' ? $res['G'] : '0',
  'FBD' => $res['H'] != '' ? $res['H'] : '0',
       'FAM' => $res['I'] != '' ? $res['I'] : '0',
       'SAM' => $res['J'] != '' ? $res['J'] : '0',
  'status'=>$status,
           'created_date' => date("Y-m-d H:i:s")
            );
            // print_r($data);
 $result= $this->Homemodel->update_student_mark_data($data,$id,$tname);
   echo $result;

}
$studentabs=$this->input->post('Absentlist');
if(!empty($studentabs))
  {
$studentabs1 = array_filter($studentabs);
foreach($studentabs1 as $stuabs)
{
$attendancevalue=2; //for absent value //
$data = array(
 'FAA'=>'0',
  'FAB'=>'0',
           'FAC' =>'0',
  'FAD'=>'0',
  'FBA' =>'0',
  'FBB' =>'0',
  'FBC' =>'0',
       'FBD' =>'0',
       'FAM' =>'0',
  'SAM' =>'0',
);
$resulta= $this->Homemodel->update_student_absent_data($stuabs,$data,$tname);
                $resultb = $this->Homemodel->update_student_absent($stuabs,$attendancevalue,$tname);
echo $resultb;
}
  }
$studentpre=$this->input->post('Presentlist');
if(!empty($studentpre))
  {
$studentpre1 = array_filter($studentpre);
foreach($studentpre1 as $stupre)
{

$attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_student_present($stupre,$attendancevalue,$tname);
echo $result2;
}
       }
}

else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)
}

public function get_textbook_details(){
 
  $class_id = $this->input->post('class_id');
  $term_id = $this->input->post('term_id');
  $textbook_list = $this->Homemodel->get_classwise_textbook($class_id,$term_id,'');
  echo json_encode($textbook_list);
}

public function emis_school_student_mark_update_final()
{


$emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {
      $tname = $this->input->post('tname');
  $records = $this->input->post('records');
  $records = json_decode($records,true);
  unset($records[0]);
  unset($records[1]);                
 foreach($records as $index => $res){      
     
              $classid = $this->input->post('classid');
              $subjectid = $this->input->post('subjectid');
              $termid = $this->input->post('termid');
              $status=3;
  $id=$res['UpdateID'];
       $school_id = $this->session->userdata('emis_school_id');
       
           $data = array(
                          'school_id' => $this->session->userdata('emis_school_id'),
                          'term_id' => $termid,
                          'subject_id'=>$subjectid,
                          'class_id' => $classid,
                          'student_id'=>$res['student_id'],
                          'student_name'=>$res['student_name'],
                          'section'=>$res['section'],
                          //'student_attendance'=>1,
                          'FAA'=>$res['A'] != '' ? $res['A'] : '0',
                          'FAB'=>$res['B'] != '' ? $res['B'] : '0',
                          'FAC'=>$res['C'] != '' ? $res['C'] : '0',
                          'FAD'=>$res['D'] != '' ? $res['D'] : '0',
                          'FBA'=>$res['E'] != '' ? $res['E'] : '0',
                          'FBB'=>$res['F'] != '' ? $res['F'] : '0',
                          'FBC'=>$res['G'] != '' ? $res['G'] : '0',
                          'FBD'=>$res['H'] != '' ? $res['H'] : '0',
                          'FAM'=>$res['I'] != '' ? $res['I'] : '0',
                          'SAM'=>$res['J'] != '' ? $res['J'] : '0',
                     'status'=>$status,
                          'created_date' => date("Y-m-d H:i:s")
           );

    $result = $this->Homemodel->update_student_mark_final($data,$id,$tname);
    echo $result;

}
   
 $studentabs=$this->input->post('Absentlist');
 if(!empty($studentabs))
  {
$studentabs1 = array_filter($studentabs);
    foreach($studentabs1 as $stuabs)
{
$attendancevalue=2; //for absent value //
$data = array(
   'FAA'=>'0',
   'FAB'=>'0',
        'FAC'=>'0',
   'FAD'=>'0',
   'FBA'=>'0',
   'FBB'=>'0',
   'FBC'=>'0',
   'FBD'=>'0',
        'FAM'=>'0',
        'SAM'=>'0',
);
        $resulta= $this->Homemodel->update_student_absent_data($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent($stuabs,$attendancevalue,$tname);

echo $resultb;
}
  }
$studentpre=$this->input->post('Presentlist');
if(!empty($studentpre))
  {
$studentpre1 = array_filter($studentpre);
foreach($studentpre1 as $stupre)
{

$attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_student_present($stupre,$attendancevalue,$tname);
echo $result2;
}
       }
       
}

else { redirect('/', 'refresh'); }

}

///////////////
/*end of the function */
///////////////


public function emis_student_disablity_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
       
        $school_id = $this->session->userdata('emis_school_id');
        // echo $school_id;
      
          $data['allstuds'] = $this->Homemodel->get_classwise_student_disability( $school_id);
		  $data ['stud_detail'] =$this->Homemodel->dis_class_student_disability($school_id);
        // print_r( $data ['stud_detail']); die();

   
       $this->load->view('emis_school_student_disability',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}

/******************************* Attendnace Students Wise ******************/

public function get_students_wise_report()
{
  $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) 
  {
      $school_id = $this->session->userdata('emis_school_id');


      // print_r($this->input->post());die;
    $class_id = $this->input->post('class_id');
    $section_id = $this->input->post('section_id');
    $date = $this->input->post('date');
    if(!empty($date)){
    $date = '01-'.$date;
    }else
    {
      $date = date('01-m-Y',strtotime("-1 month"));
    }
    if(!empty($class_id) && !empty($section_id) && !empty($date)){
    
        

          

            $table = 'students_attend_yearly';
             
      
    // echo $school.'--'.$class_id;
      // print_r($this->session->userdata());die;
    $data['students_section_details'] = $this->Homemodel->get_attendance_sectionwise_details($school_id,$class_id,$section_id,$table,$date);
    }
    $data['school_details'] = $this->Statemodel->get_school_name($school_id);
    // echo $date;
      $data['date'] = $date;
    $data['school'] = $school_id;
    $data['class_id'] = $class_id;
    $data['section_id'] = $section_id;
    $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
    $data['title'] = $class_id.'-'.$section_id;
    $this->load->view('emis_school_attendance_sectionwise',$data);
  }else { redirect('/', 'refresh'); }
}
/****************************************** End ***************************/  




/******************************* Teacher Password Reset Function ************************/


    /**
    * get Teacher Password Reset Request
    * VIT-sriram
    * 08/03/2019
    **/

    public function get_password_reset_request()
    {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
  
          if($emis_loggedin) { 
            // print_r($this->session->userdata());
                $data['reset_password_list'] = $this->Homemodel->get_teacher_password_reset();

                $this->load->view('emis_school_password_reset',$data);
            }else{redirect('/', 'refresh');}
    }


    public function send_reset_password_request()
    {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
  
          if($emis_loggedin) { 

            $records = $this->input->post('records');
            $update_data = [];
            if(!empty($records))
            {
              $update_data = $records;
              unset($update_data['teacher_name']);
              unset($update_data['gender']);
              unset($update_data['email_id']);
              unset($update_data['mbl_nmbr']);
              unset($update_data['u_id']);

              $update_data['updated_by'] = $this->session->userdata('emis_user_id');
              $update_date['ip_access'] = $_SERVER['REMOTE_ADDR'];
              // print_r($update_data);

               $this->Homemodel->update_teacher_password_reset($update_data); 

               $update['emis_user_id'] = $records['u_id'];
               $update['temp_log'] = 0;
               $update['temp_log1'] = 0;
               $table = 'emisuser_teacher';
               $old_password = $this->Homemodel->update_login_details($update,$table);
               $school_udise_code = $this->session->userdata('school_udise_code');
               

               $school_email = $this->Homemodel->get_school_details();



               // echo $old_password->ref;die;
               $reset = $this->send_mail($records['email_id'],$school_email->sch_email,$records['emis_user'],$school_udise_code,$old_password->ref);
              // echo $update_log_data;

               echo json_encode($reset);

            }



          }else{redirect('/', 'refresh');}

    }



    public function send_mail($to_email,$cc_email,$teacher_code,$udise_code,$pass) {
        
         $from_email = "donotreply.emis@gmail.com";
     // $encr1=$to_email;
         // $encr2=$this->emis_crypt($encr1,'e');

         //Load email library
         $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'donotreply.emis@gmail.com',
        'smtp_pass' => 'tnemisssa',
        'mailtype'  => 'txt', 
        'charset'   => 'utf-8'
    );
         $this->load->library('email',$config);
         $this->email->set_newline("\r\n"); 
     $this->email->from($from_email, 'EMIS');
         $this->email->to($to_email);
         $this->email->cc($cc_email); 
         $this->email->set_mailtype("html");
     
         $this->email->subject('EMIS | Password');
         $this->email->message('You have requested to reset your EMIS Password. Your Password is <b>'.$pass.'</b><br/><br/>Regards,<br/><b>State EMIS Cell, TamilNadu</b>');
       //   Send mail
         if($this->email->send()){
          $data['status'] ="1";
          $data['message'] = "Reset Password Link successfully sent to your Email ID";
           // $this->load->view('Auth/emis_forgotpass',$data); Reset Password Link successfully sent to your School's Email ID 
         }else{
         // echo "Email not sent ";
          $data['status'] ="0";
          $data['message'] = "something went wrong! Please try again!";
           // $this->load->view('Auth/emis_forgotpass',$data); 
       }

       return $data;
    }






/*************************************** END ********************************************/


/**************************** RTI Module *************************************************/
  

  /**
  * RTI School wise Get Students
  * VIT-sriram
  * 11/03/2019
  **/

  public function get_RTI_students_list()
  {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
	  $school_id = $this->session->userdata('emis_school_id');
  
          if($emis_loggedin) { 
              // print_r($this->input->post());die;
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
              $data['RTI_List'] = $this->Homemodel->get_RTI_students_list( $school_id );
            //  print_r($data['RTI_List']);die();
               $data['class_id'] = $class_id;
               $data['section_id'] = $section_id;
        $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();

              $this->load->view('emis_school_RTI_students_classwise',$data);
          }else{redirect('/', 'refresh');}
  } 

/*************************************** END *********************************************/
/*************************************************pearlin***********************************/

 public function save_RTE_students_list()
    {
     
         $records = $this->input->post();
        $save_data = $this->Homemodel->save_RTE_students_list($records);
        echo $save_data;
    }
/**********************************************************************************************/
    
    //Vivek Rao
    
    function schoolUpgradesubmit(){
        $this->load->library('AWSBucket');
        $AWS=new AWSBucket('renewalapplicationemis','AKIAI3EE36AJMUO6YBVQ','JFi4uedD0lBBGiE+Ngaer0nJpnkQHt1EAR4CReiU','UPGRADE_TEST',$_FILES,'STANDARD_IA');
        $uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files);
        $error=0;
        $renewID=time();
        $schoolnew_renewal=array(
                                'id'                            =>  NULL,
                                'school_key_id'                 =>  $_POST['school_key_id'], 
                                'renewal_id'                    =>  $renewID, 
                                'lastrenewal_filename'          =>  $uploadarr['lastrenewalfile'][0]['fname'], 
                                'lastrenewal_filepath'          =>  $uploadarr['lastrenewalfile'][0]['fpath'], 
                                'condsatisfied'                 =>  NULL, 
                                'createddate'                   =>  date("Y-m-d H:i:s",strtotime("now")), 
                                'auth'                          =>  0, 
                                'vaild_from'                    =>  NULL, 
                                'vaild_upto'                    =>  NULL, 
                                'fromclass'                     =>  NULL, 
                                'toclass'                       =>  NULL, 
                                'year_rec_remarks'              =>  NULL, 
                                'file_exp'                      =>  NULL, 
                                'contidion_file'                =>  NULL
                            );
        if(!($renewal_id=$this->Homemodel->RenewalInsert($schoolnew_renewal,'schoolnew_renewal',2))){
            goto Error;
        }
        
        
        /********************************************/
        $clstam=NULL;
        if($_POST['renew_category']==2){
             $clstam='';
            $clsgrp=$_POST['levels'];
            $num=count($clsgrp);$i=0;
            foreach($clsgrp as $pst){
                $clstam.=$pst;
                if($i<($num-1)){$clstam.=',';}$i++;
            }
        }
        
        
        
        /*******************************************/
        
        
        $schoolnew_renewcategory=array(
                                    'id'                    =>  NULL,
                                    'renewal_id'            =>  $renewal_id,
                                    'applied_category'      =>  $_POST['renew_category'],
                                    'amount'                =>  (isset($_POST['cervalue_12'])?($_POST['cervalue_12']!=null?$_POST['cervalue_12']:NULL):NULL),
                                    'challan_no'            =>  (isset($_POST['cernumber_12'])?($_POST['cernumber_12']!=null?$_POST['cernumber_12']:NULL):NULL),
                                    'challan_date'          =>  (isset($_POST['cerdate_12'])?($_POST['cerdate_12']!=null?$_POST['cerdate_12']:NULL):NULL),
                                    'ifsc_code'             =>  (isset($_POST['cerifsc_12'])?($_POST['cerifsc_12']!=null?$_POST['cerifsc_12']:NULL):NULL),
                                    'class_group'           =>  $clstam,
                                    'challan_filename'      =>  isset($uploadarr['cerfile_12'][0]['fname'])?$uploadarr['cerfile_12'][0]['fname']:NULL,
                                    'challan_filepath'      =>  isset($uploadarr['cerfile_12'][0]['fpath'])?$uploadarr['cerfile_12'][0]['fpath']:NULL
        );
        if(!($renew_category=$this->Homemodel->RenewalInsert($schoolnew_renewcategory,'schoolnew_renewcategory',2))){
            goto Error;
        }
        $certificate=json_decode(json_encode($this->Homemodel->getCertificateMaster(' WHERE upgradation=1')),true);
        foreach($certificate as $cer){
            if(isset($uploadarr['cerfile_'.$cer['id']]) && $cer['id']!=12){
                foreach($uploadarr['cerfile_'.$cer['id']] as $fval){
                    $schoolnew_renewalfiles[]=array(
                                                'id'                        =>  NULL,
                                                'renewal_id'                =>  $renewal_id,
                                                'certificate_id'            =>  $cer['id'],
                                                'certificate_filename'      =>  $fval['fname'],
                                                'certificate_filepath'      =>  $fval['fpath'],
                                                'certificate_exp'           =>  NULL,
                                                'auth'                      =>  NULL,
                                                'value_paid'                =>  $_POST['cervalue_'.$cer['id']],
                                                'certificate_number'        =>  $_POST['cernumber_'.$cer['id']],
                                                'certificate_date'          =>  $_POST['cerdate_'.$cer['id']],
                                                'cerficate_ifsc'            =>  $_POST['cerifsc_'.$cer['id']],
                                                'beo_certificateremarks'    =>  NULL
                                            ); 
                }
           }
        }
        if(!($lstid=$this->Homemodel->RenewalInsert($schoolnew_renewalfiles,'schoolnew_renewalfiles',3))){
            goto Error;
        }
        /*$classandupgrade=array();$clsgrp='';
        $createddate=date("Y-m-d H:i:s",strtotime("now"));
        if($_POST['renew_category']==2){
            $clsgrp=$_POST['levels'];
        }
        elseif($_POST['renew_category']==4){
           $clsgrp=$_POST['groups_selected']; 
        }
        
        if($clsgrp!=''){
            foreach($clsgrp as $pst){
                $classandupgrade[]=array(
                                        'id'                    => null,
                                        'renew_category'        =>  $renew_category,  
                                        'classgroup'            =>  $pst,
                                        'created_date'          =>  $createddate
                                        
                                    );
            }
        }
        if(!$this->Homemodel->RenewalInsert($classandupgrade,'schoolnew_classgroup',3)){
            goto Error;
        }*/
        
        echo('<scrpit type="text/javascript">');
        echo('alert("Kindly Note Down This Verfication Number:'.$renewID.'");');
        echo('</script>');
        
        //redirect('Basic/schoolUpgrade/success','refresh');
        
        Error:echo('Error Insert : Kindly Go Back And Refresh Once Again');
    }
    
    
    
    
    /* created by bala @venba  for scheme entry */
  public function emis_school_register()
  {
	$this->load->view('emis_school_register');   
  }
  
    public function get_student_scheme_list()
   {
	  $schemeid=$this->input->post('schemeid');
   // print_r($schemeid);
	$formid= $_GET['formid'];
	if($formid!='')
	{
	$data['schemeid']=$formid;	
	}
	$schemeid=$this->input->post('schemeidform');
	if($schemeid!='')
	{
	$data['schemeid']=$schemeid;		
	}
	$school_id=$this->session->userdata('emis_school_id');	
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
	
	$data['nmms_search']=$this->Homemodel->getscheme_search_nmms($school_id,$classnumber,$sectionname);
	$data['nmms']=$this->Homemodel->getscheme_nmms($school_id,$classnumber,$sectionname);
	
	$data['trstse_search']=$this->Homemodel->getscheme_search_trstse($school_id,$classnumber,$sectionname);
	$data['trstse']=$this->Homemodel->getscheme_trstse($school_id,$classnumber,$sectionname);
	
	$data['inspire_search']=$this->Homemodel->getscheme_search_inspire($school_id,$classnumber,$sectionname);
	$data['inspire']=$this->Homemodel->getscheme_inspire($school_id,$classnumber,$sectionname);
	
	$data['sports_search']=$this->Homemodel->getscheme_search_sports($school_id,$classnumber,$sectionname);
	$data['sports']=$this->Homemodel->getscheme_sports($school_id,$classnumber,$sectionname);
	
	$data['sportslist']=$this->Homemodel->getsports_list();
	$data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	//print_r($data['classDetails']);
	$this->load->view('emis_school_student_scheme',$data);   
   }
    
    
    /*****************Homecontroller*********************/

public function get_student_scheme_list_nmms()
   {
	 
	$school_id = $this->session->userdata('emis_school_id');
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
	 // $data['nmms_search']=$this->Homemodel->getscheme_search_nmms($school_id,$classnumber,$sectionname);
	$data['nmms']=$this->Homemodel->getscheme_nmms($school_id);//,$classnumber,$sectionname);
	// $data['nmms_all']=$this->Homemodel->getscheme_nmms_all($school_id);
	// $data['sportslist']=$this->Homemodel->getsports_list();
	// $data['participating_level']=$this->Homemodel->game_participating_level();
	//$data['sportslist']=$this->Homemodel->getsports_list();
	//$data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	$this->load->view('emis_school_student_scheme_nmms',$data);   
   }
   public function get_student_scheme_list_trstse()
   {
	
	$school_id = $this->session->userdata('emis_school_id');
	
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
	// $data['trstse_search']=$this->Homemodel->getscheme_search_trstse($school_id,$classnumber,$sectionname);
	$data['trstse']=$this->Homemodel->getscheme_trstse($school_id);//,$classnumber,$sectionname);
	// $data['trstse_all']=$this->Homemodel->getscheme_trstse_all($school_id);
	// $data['sportslist']=$this->Homemodel->getsports_list();
	// $data['participating_level']=$this->Homemodel->game_participating_level();

	//$data['sportslist']=$this->Homemodel->getsports_list();
	//$data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	
	$this->load->view('emis_school_student_scheme_trstse',$data);   
   }
   public function get_student_scheme_list_inspire()
   {
	
	$school_id = $this->session->userdata('emis_school_id');
	
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
	// $data['inspire_search']=$this->Homemodel->getscheme_search_inspire($school_id,$classnumber,$sectionname);
	$data['inspire']=$this->Homemodel->getscheme_inspire($school_id);//,$classnumber,$sectionname);
	// $data['inspire_all']=$this->Homemodel->getscheme_inspire_all($school_id);
	
	// $data['sportslist']=$this->Homemodel->getsports_list();
	// $data['participating_level']=$this->Homemodel->game_participating_level();
	//$data['sportslist']=$this->Homemodel->getsports_list();
	//$data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	
	$this->load->view('emis_school_student_scheme_inspire',$data);   
   }
   
    public function get_student_scheme_list_sports()
	{
	$school_id = $this->session->userdata('emis_school_id');
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
  $data['sports_search']=$this->Homemodel->getscheme_search_sports($school_id,$classnumber,$sectionname);
	// $data['sports']=$this->Homemodel->getscheme_sports($school_id,$classnumber,$sectionname);
	// $data['sports_all']=$this->Homemodel->getscheme_sports_all($school_id);
	$data['sportslist']=$this->Homemodel->getsports_list();
    $data['student_tag1']=$this->Homemodel->getscheme_search_stud1($school_id,$classnumber,$sectionname);
	// $data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	$this->load->view('emis_school_student_scheme_sports',$data); 
		
	}
	
	

	
	
	
	
/****************************************************************************/   
    
    
    
    
 
   
   /* insert scholor data */
    public function add_student_scholor_national()
   {
	$school_id=$this->session->userdata('emis_school_id');	
	$student_id=$this->input->post('student_id');
	$scheme_date=$this->input->post('scheme_date');
	$class_section=$this->input->post('class_section');
	$c_s=(explode("-",$class_section));
	
	        $savescholor_national['school_id'] = $school_id;
			$savescholor_national['student_id'] = $student_id;
			$savescholor_national['nmmsexam_passed'] = $scheme_date;
			$savescholor_national['class'] = $c_s[0];
			$savescholor_national['section'] = $c_s[1];
			$savescholor_national['status'] = 1;
			$savescholor_national['created_date']=date("Y-m-d H:i:s");
		$result = $this->Homemodel->insert_scholor_national($savescholor_national);
	    echo $result;
	// $data['studentdata']=$this->Homemodel->getscheme_studentdata($school_id,$student_id);
	// //print_r($data['studentdata']);
	//$this->load->view('emis_school_student_scheme',$data);   
   }
   
    /* end of the scholor data */
    public function add_student_scholor_state()
   {
	$school_id=$this->session->userdata('emis_school_id');	
	$student_id=$this->input->post('student_id');
	$scheme_date=$this->input->post('scheme_date');
	$class_section=$this->input->post('class_section');
	$c_s=(explode("-",$class_section));
	
	        $savescholor_state['school_id'] = $school_id;
			$savescholor_state['student_id'] = $student_id;
			$savescholor_state['trstseexam_passed'] = $scheme_date;
			$savescholor_state['class'] = $c_s[0];
			$savescholor_state['section'] = $c_s[1];
			$savescholor_state['status'] = 1;
			$savescholor_state['created_date']=date("Y-m-d H:i:s");
		$result = $this->Homemodel->insert_scholor_state($savescholor_state);
	    echo $result;
	// $data['studentdata']=$this->Homemodel->getscheme_studentdata($school_id,$student_id);
	// //print_r($data['studentdata']);
	//$this->load->view('emis_school_student_scheme',$data);   
   }
   public function add_student_inspire_awards()
	{
		$school_id=$this->session->userdata('emis_school_id');	
	    $student_id=$this->input->post('i_student_id');
	    $class_section=$this->input->post('i_class_section');
	    $c_s=(explode("-",$class_section));
		$inspire_title=$this->input->post('i_inspire_title');
		$inspire_award=$this->input->post('i_inspire_award');
		$award_date=$this->input->post('i_award_date');
	        $savestudent_inspire['school_id'] = $school_id;
			$savestudent_inspire['student_id'] = $student_id;
			$savestudent_inspire['class'] = $c_s[0];
			$savestudent_inspire['section'] = $c_s[1];
			$savestudent_inspire['title'] =$inspire_title;
			$savestudent_inspire['award_details'] = $inspire_award;
			$savestudent_inspire['award_issue_date'] = $award_date;
			$savestudent_inspire['status'] = 1;
			$savestudent_inspire['created_date']=date("Y-m-d H:i:s");
		$result = $this->Homemodel->insert_inspire_awards($savestudent_inspire);
	    echo $result;
		
	}
    public function add_student_sports_participate()
	{
		  $school_id=$this->session->userdata('emis_school_id');	
	    $student_id=$this->input->post('p_student_id');
	    $scheme_date=$this->input->post('p_scheme_date');
	    $class_section=$this->input->post('p_class_section');
	    $c_s=(explode("-",$class_section));
		  $participating_game=$this->input->post('p_participating_game');
		  $participating_level=$this->input->post('p_participating_level');
		  $winner_level=$this->input->post('p_winner_level');
	    $savestudent_participate['school_id'] = $school_id;
			$savestudent_participate['student_id'] = $student_id;
			$savestudent_participate['class'] = $c_s[0];
			$savestudent_participate['section'] = $c_s[1];
			$savestudent_participate['game_participating'] = $participating_game;
			$savestudent_participate['last_participating_date'] = $scheme_date;
			$savestudent_participate['last_participating_level'] = $participating_level;
			$savestudent_participate['winner_level_details'] = $winner_level;
			$savestudent_participate['status'] = 1;
			$savestudent_participate['created_date']=date("Y-m-d H:i:s");
		$result = $this->Homemodel->insert_student_participate($savestudent_participate);
	    echo $result;
		
	}
	public function update_student_scholor_national()
	{
		$updateid=$this->input->post('updateid');
		$scheme_date=$this->input->post('scheme_date');
		$update_nmms['nmmsexam_passed'] = $scheme_date;
		$result = $this->Homemodel->update_student_nmms($updateid,$update_nmms);
	    echo $result;
	}
	public function update_student_scholor_state()
	{
		$updateid=$this->input->post('updateid');
		$scheme_date=$this->input->post('scheme_date');
		$update_trstse['trstseexam_passed'] = $scheme_date;
		$result = $this->Homemodel->update_student_trstse($updateid,$update_trstse);
	    echo $result;
	}
	public function update_student_scholor_inspire()
	{
		$updateid=$this->input->post('updateid');
		$awarddate=$this->input->post('awarddate');
		$inspiretitle=$this->input->post('inspiretitle');
		$inspireaward=$this->input->post('inspireaward');
		$update_inspire['award_issue_date'] = $awarddate;
		$update_inspire['title'] = $inspiretitle;
		$update_inspire['award_details'] = $inspireaward;
		$result = $this->Homemodel->update_student_inspire($updateid,$update_inspire);
	    echo $result;
	}
	public function update_student_scholor_sports()
	{
		$updateid=$this->input->post('updateid');
		$sportsschemedate=$this->input->post('sportsschemedate');
		$participating_game=$this->input->post('participating_game');
		$participating_level=$this->input->post('participating_level');
		$winner_level=$this->input->post('winner_level');
		$update_sports['last_participating_date'] = $sportsschemedate;
		$update_sports['game_participating'] = $participating_game;
		$update_sports['last_participating_level'] = $participating_level;
		$update_sports['winner_level_details'] = $winner_level;
		$result = $this->Homemodel->update_student_sports($updateid,$update_sports);
	    echo $result;
		
	}
	public function delete_student_scholor_national()
	{
		$school_id=$this->session->userdata('emis_school_id');	
	    $deleteid=$this->input->post('deleteid');
		$result = $this->Homemodel->delete_student_nmms($deleteid);
	    echo $result;
	}
	public function delete_student_scholor_state()
	{
		$school_id=$this->session->userdata('emis_school_id');	
	    $deleteid=$this->input->post('deleteid');
		$result = $this->Homemodel->delete_student_trstse($deleteid);
	    echo $result;
	}
	public function delete_student_scholor_inspire()
	{
		$school_id=$this->session->userdata('emis_school_id');	
	    $deleteid=$this->input->post('deleteid');
		$result = $this->Homemodel->delete_student_inspire($deleteid);
	    echo $result;
	}
	public function delete_student_scholor_sports()
	{
		$school_id=$this->session->userdata('emis_school_id');	
	    $deleteid=$this->input->post('deleteid');
		$result = $this->Homemodel->delete_student_sports($deleteid);
	    echo $result;
	}

    



  /*************************************** Special Cash *********************************/
  /* Students Donate
   * VIT-sriram 
   * 04/04/2019
   **/
  public function get_Students_special_cash()
  {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
  
          if($emis_loggedin) { 
            // echo "function in";
            $school_id = $this->session->userdata('emis_school_id');
            $data['allstuds'] = $this->Homemodel->get_special_cash_details($school_id);
            $this->load->view('emis_school_special_cash',$data);

          }else{redirect('/', 'refresh');}


  }

  public function check_students_acc_no()
  {

      $ifsc_code = $this->input->post('ifsc_code');
      $bank_acc = $this->input->post('acc_no');
      $id = $this->input->post('id');
      $table = 'students_special_cash_incentive';
      $where = array('ifsc_code'=>$ifsc_code,'bank_acc'=>$bank_acc);

      $result = $this->Homemodel->check_acc_no($table,$where,$id);

      echo json_encode($result);

  }
  /**
  * Save Special Cash 
  * VIT-sriram
  * 04/04/2019 
  **/
  public function save_special_cash()
  {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    
          if($emis_loggedin) { 
            $records = $this->input->post('records');
            
            // print_r($records);

            

            // echo $records['study_at_X'];die;
            if($records['student_eligible'] !=0){
            $records['bank_acc_open_date'] = date('Y-m-d',strtotime($records['bank_acc_open_date']));
            $total = 0;
            if($records['study_at_X']!='Un-aided' && $records['study_at_X_sec'] !='Self Finance')
            {
              // echo 'if';
              $total += 1500;
            }

            if($records['study_at_XI']!='Un-aided' && $records['study_at_XI_sec'] !='Self Finance')
            {
              // echo 'else if';
              $total += 1500;
            }

            if($records['study_at_XII'] !='Un-aided' && $records['study_at_XII_sec'] !='Self Finance')
            {
              // echo 'else if';
              $total +=2000;
            }
            
            $records['total'] = $total;
          }
            // print_r($records);die;

           $result = $this->Homemodel->save_special_cash_details($records,$this->session->userdata('emis_school_id'));
           
            // echo $total;
           echo json_encode($result);die;

          }else{redirect('/', 'refresh');}

  }

   /************************************* End ********************************************/

   /*********************************** Students Promote/Transfer ************************/
    /**
    * Students Transfer/Promote
    * VIT-sriram
    * 05/04/2019
    **/

    public function get_student_pro_trans_details()
    {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    
          if($emis_loggedin) { 

            $class_id = $this->input->post('class_id');
          $section_id = $this->input->post('section_id');

          $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id);

            $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $school_id = $this->session->userdata('emis_school_id');

        $data['district'] = $this->Homemodel->get_common_table_details('schoolnew_district');
        $data['bloodgroup'] = $this->Homemodel->get_common_table_details('baseapp_bloodgroup');
        $data['occpation'] = $this->Homemodel->get_common_table_details('baseapp_occupation');
        $data['parentIncome'] = $this->Homemodel->get_common_table_details('baseapp_parentincome');
        $data['medium_sec'] =  $this->Homemodel->getallmediumofinst($school_id);
        $data['mother_tang'] = $this->Homemodel->get_common_table_details('schoolnew_mediumofinstruction');
        // print_r($data['mother_tang']);die;
        $data['disabilities'] = $this->Homemodel->get_common_table_details('baseapp_differently_abled');
        $data['religions'] = $this->Homemodel->get_common_table_details('baseapp_religion');
        $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
        $this->load->view('emis_school_trans_promote',$data);
          }else{redirect('/', 'refresh');}

    }

    public function update_students_promote_transfer_details()
    {
      $identity = $this->input->post('identity');
            $this->load->model('Registermodel');
        date_default_timezone_set('Asia/Calcutta');


      $identity = $identity['identity'];
      $data = $this->input->post('data');
      // print_r($data);
      $trans_history = [];
      if($identity=='transfer')
      {
          foreach($data as $all)
          {
             // $update['unique_id_no'] = $data['unique_id_no'];
             $update['transfer_flag'] = $all['transfer_flag'];
             $table = 'students_child_detail';
            $where = 'unique_id_no'.'='.$all['unique_id_no'];
            // print_r($update);
             $update_data = $this->Registermodel->update_students_info($update,$table,$where);

             // print_r($update_data);
             if(sizeof($update_data) !=0)
             {
                $save['unique_id_no'] = $all['unique_id_no'];
                $save['school_id_transfer'] = $this->session->userdata('emis_school_id');
                $save['class_studying_id'] = $all['class_id'];
                $save['process_type'] = 1;
                $save['admission_no'] = $all['admission_no'];
                $save['medium_of_ins'] = $all['medium_of_ins'];
                $save['academic_year'] = date('Y');
                $save['transfer_date'] = date('Y-m-d');
                $save['created_by'] = $this->session->userdata('emis_school_id');
                $save['transfer_reason'] = $all['transfer_reason'];
                $save['created_at'] = date('Y-m-d h:i:s');
                // $save['remarks'] = 'Transfer School ID:-'.$this->session->userdata('emis_school_id');
                // print_r($save);die;
                $his_table = 'students_transfer_history';
              $trans_history[] = $this->Registermodel->save_students_info($save,$his_table);

             }
          }
      }else
      {
              // echo "else";
        // print_r($data);die;
          foreach($data as $all)
          {
            $update = $all;
             $table = 'students_child_detail';
            $where = 'unique_id_no'.'='.$all['unique_id_no'];
            // print_r($update);
             $trans_history[] = $this->Registermodel->update_students_info($update,$table,$where);
          }
      }
      echo json_encode(sizeof($trans_history));die;
    }



   /************************************* End ********************************************/


   /*********************************** Transfer Certificate *****************************/

   /*******************************
   * Transfer Certificate         *
   * VIT-sriram                   *
   * 11/04/2019                   *
   ********************************/
   public function get_students_transfer_list()
   {


      $emis_loggedin = $this->session->userdata('emis_loggedin');
    
          if($emis_loggedin) 
          { 

                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
      $school_id = $this->session->userdata('emis_user_id');

                $data['class_id'] = $class_id;
        $data['section_id'] = $section_id;
        $data['district'] = $this->Homemodel->get_common_table_details('schoolnew_district');
        $data['bloodgroup'] = $this->Homemodel->get_common_table_details('baseapp_bloodgroup');
        $data['occpation'] = $this->Homemodel->get_common_table_details('baseapp_occupation');
        $data['parentIncome'] = $this->Homemodel->get_common_table_details('baseapp_parentincome');
        $data['medium_sec'] =  $this->Homemodel->getallmediumofinst($school_id);
        $data['mother_tang'] = $this->Homemodel->get_common_table_details('schoolnew_mediumofinstruction');
        // print_r($data['mother_tang']);die;
        $data['disabilities'] = $this->Homemodel->get_common_table_details('baseapp_differently_abled');
        $data['religions'] = $this->Homemodel->get_common_table_details('baseapp_religion');
        $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
        // echo $class_id;
        if(!empty($class_id)){
        $data['allstuds'] = $this->Homemodel->get_students_transfer_list($class_id,$section_id);
        }
          $this->load->view('emis_school_students_transfer_list',$data);
          }else{redirect('/', 'refresh');}

       
   }

   /***********************************
     * Save Transfer Certificate      *
     * VIT-sriram                     *
     * 15/04/2019                     *
     **********************************/
   public function save_transfer_certificate_details()
   {

      $emis_loggedin = $this->session->userdata('emis_loggedin');
    
          if($emis_loggedin) 
          { 

              // print_r($this->input->post());die;
              
              // print_r($student_data);
              $student_id = $this->input->get('stu_id');
              $class_id = $this->input->get('class_id');
              // print_r($student_id);die;
              if($student_id ==''){
                $id = $this->input->post('student_id');
                $student_id = $id;
              $table = 'students_child_detail';
              $where = array('id'=>$id);
              $student_data = Common::get_single_list($table,$where);
              $school_id = $this->session->userdata('emis_school_id');
              $save['student_id'] = '';
              $save['student_unique_id'] = $student_data->unique_id_no;
              $save['student_school_id'] = $student_data->school_id;
              $save['student_name'] = $student_data->name;
              $save['student_father_name'] = $student_data->father_name;
              $save['student_mother_name'] = $student_data->mother_name;
              $save['student_dob'] = $student_data->dob;
              $save['student_dob_words'] = $this->input->post('emis_stu_dob_words');
              $save['student_blood_group'] = $student_data->bloodgroup;
              $save['student_num'] = $student_data->phone_number;
              $save['student_gender'] = $student_data->gender;
              $save['student_photo'] = $student_data->photo;
              $save['student_nationality'] = $this->input->post('emis_stu_nationality');

              $save['student_religion'] = $student_data->religion_id;
              $save['student_community'] = $student_data->community_id;
              $save['student_caste'] = $student_data->subcaste_id;
              $save['student_idenitiy1'] = $this->input->post('emis_stu_identi1');
              $save['student_idenitiy2'] = $this->input->post('emis_stu_identi2');
              $save['student_admission_no'] = $student_data->school_admission_no;
              $save['student_admission_date'] = date('Y-m-d',strtotime($this->input->post('emis_stu_doj')));
              $save['student_class_id'] = $this->input->post('emis_stu_from_class');
              $save['student_current_class_id'] = $this->input->post('emis_class_study_to');
              $save['student_group_code'] = $student_data->group_code_id;
              $save['student_sub_offered'] = '';
              $save['student_medium_inst'] = $this->input->post('emis_reg_mediofinst');
              $save['student_promote_class'] = $this->input->post('emis_reg_stu_promote');
              $save['student_scholarship'] = $this->input->post('emis_stu_scholarship');
              $save['student_medical_date'] = ($this->input->post('emis_stu_medical_checkup')  !=''?date('Y-m-d',strtotime($this->input->post('emis_stu_medical_checkup'))):'');
              $save['student_last_date'] = date('Y-m-d',strtotime($this->input->post('emis_stu_study_to')));
              $save['student_conduct'] = $this->input->post('emis_stu_char');
              $save['student_apply_tc'] = date('Y-m-d');
              
              $save['student_tc_date'] = date('Y-m-d');
              $save['student_period_study_from'] = date('Y-m-d',strtotime($this->input->post('emis_stu_doj')));
              $save['student_community_tc'] = $this->input->post('emis_stu_community_tc');
              $save['student_period_study_to'] = date('Y-m-d');
              $save['school_recognition_no'] = $this->input->post('emis_sch_rec_no');
              $save['student_first_lang'] = $this->input->post('emis_reg_stu_lang');
              $save['student_smart_id'] = $student_data->smart_id;
              if($school_id !=''){
              $save['hm_tc_flag'] = 1;

              }
              // print_r($save);die;
              $trans_table = 'students_transfer_certificate_details';
              $trans_where = array('student_unique_id'=>$student_data->unique_id_no,'student_school_id'=>$school_id);
              $student_data = Common::get_single_list($trans_table,$trans_where);
              // print_r($student_data);die; 
              if(empty($student_data)){
                // echo "if";
               $result = $this->Homemodel->save_transfer_certificate($save);
              }else
              {
                // echo "else";
              $save['student_id'] = $student_data->student_id;
              $save['hm_tc_flag'] = $student_data->hm_tc_flag+1;
              $result = $this->Homemodel->save_transfer_certificate($save);
              }
              // print_r($student_id);die;
              if($result)
              {
                $table = 'students_child_detail';
              $where = array('id'=>$student_id);
              $student_data = Common::get_single_list($table,$where);
              $students_id = $student_data->unique_id_no;
            // echo $students_id;die;
              // print_r($student_data);die;

                $this->generate_student_tc($students_id);
                
              }
            }else
            {
              // echo "else";
              $school_id = $this->session->userdata('emis_school_id');

              $table = 'students_transfer_certificate_details';
              $where = array('student_id'=>$student_id,'student_school_id'=>$school_id);
              $student_data = Common::get_single_list($table,$where);
              $save['student_id'] = $student_id;
              $save['hm_tc_flag'] = $student_data->hm_tc_flag+1;
              $result = $this->Homemodel->save_transfer_certificate($save);

              $table = 'students_transfer_certificate_details';
              $where = array('student_id'=>$student_id);
              $student_data = Common::get_single_list($table,$where);
              $students_id = $student_data->student_id;
              if($student_data){
                $this->generate_student_tc($students_id);
              }

            }
              // $save['ceo_tc_flag'] = $student_data->unique_id_no;
              // echo"<pre>";print_r($save);echo"</pre>";die;
              // if($result)
              // {
              // }
              // redirect('Home/get_students_transfer_list','refresh');
          }else{redirect('/', 'refresh');}

   }

   public function generate_student_tc($students_id)
   {

        // print_r($students_id);die;

       $stu_data = $this->Homemodel->generate_tc_details($students_id);
       $data['students_data'] = $stu_data;
       // print_r($stu_data);die;
       $html = $this->load->view('school_pdf/emis_school_transfer_certificate',$data,TRUE);

        $pdfFilePath = $stu_data->unique_id_no."TC.pdf";
        
        //load mPDF library
        // $this->load->library('m_pdf');
       $this->m_pdf = new mpdf('ta',[216, 356]);
       // $this->m_pdf->showImageErrors = true;
       $this->m_pdf->curlAllowUnsafeSslRequests = true;
      // $page_count = $this->m_pdf->page();
      // echo $page_count;
//       $this->m_pdf->SetWatermarkText('ORIGINAL');
// $this->m_pdf->showWatermarkText = true;

// $this->m_pdf->watermarkTextAlpha = 0.2;
// $this->m_pdf->watermark_font = 'DejaVuSansCondensed';

        $this->m_pdf->setTitle($stu_data->unique_id_no.' Transfer Certificate');
        
        $this->m_pdf->WriteHTML($html,2);
        
        //download it.
        $this->m_pdf->Output($pdfFilePath, "I");
   }


   /************************************ End ************************************/
   /*********************** Students Transfer List ******************************/
   /*******************************
     * Students Transfer List     *
     * VIT-sriram                 *
     * 22/04/2019                 *
     ******************************/

   public function emis_school_get_students_transfer()
   {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
         
          $class_id = $this->input->post('class_id');
          $section_id = $this->input->post('section_id');
          $data['allstuds'] = $this->Homemodel->get_classwise_student_details($class_id,$section_id);
          $school_id = $this->session->userdata('emis_school_id');
          $data['class_id'] = $class_id;
          $data['section_id'] = $section_id;
          $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();

          $this->load->view('emis_school_student_generate_transfer_list',$data);
      }else{redirect('/', 'refresh');}
   

  }
  // Register all reports
  
  public function emis_school_textbooks_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   // echo $school_id;
	   $classnumber=$this->input->post('classno');
	    $term=$this->input->post('term1');
		// echo $term;die();
	   
       if($emis_loggedin)
       {  
          $data['classDetails'] = $this->Homemodel->getClassDetail1($school_id);
		  $data['group_name']=$this->Homemodel->group_names();
		   // print($data['group_name']);	
		  if(!empty($classnumber))
		  {
          $data['text_book_distribute_details'] = $this->Homemodel->emis_school_textbooks_Distribution_details($school_id,$classnumber,$term);
		  }
		  
		  $this->load->view('emis_school_textbooks_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
	  
  }
   public function emis_school_notebooks_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['note_book_distribute_details'] = $this->Homemodel->emis_school_notebooks_Distribution_details($school_id);
		  $this->load->view('emis_school_notebooks_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
	  
  }
  public function emis_school_bags_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['bags_distribute_details'] = $this->Homemodel->emis_school_bags_Distribution_details($school_id);
		  $this->load->view('emis_school_bags_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
   public function emis_school_uniforms_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   
	    $sets = $this->input->post('set');
		// echo $sets;
		
       if($emis_loggedin)
       {  
          
          $data['uniform_distribute_details'] = $this->Homemodel->emis_school_uniforms_Distribution_details($school_id,$sets);
		 
		  
		  $this->load->view('emis_school_uniforms_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_footwear_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['footwear_distribute_details'] = $this->Homemodel->emis_school_footwear_Distribution_details($school_id);
		  $this->load->view('emis_school_footwear_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_buspass_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['buspass_distribute_details'] = $this->Homemodel->emis_school_buspass_Distribution_details($school_id);
		  $this->load->view('emis_school_buspass_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_ColourPencil_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['colorpencil_distribute_details'] = $this->Homemodel->emis_school_ColourPencil_Distribution_details($school_id);
		  $this->load->view('emis_school_ColourPencil_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  
  public function emis_school_GeometryBox_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['geometrybox_distribute_details'] = $this->Homemodel->emis_school_GeometryBox_Distribution_details($school_id);
		  $this->load->view('emis_school_GeometryBox_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_Atlas_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['atlas_distribute_details'] = $this->Homemodel->emis_school_Atlas_Distribution_details($school_id);
		  $this->load->view('emis_school_Atlas_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
   public function emis_school_Sweater_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['sweater_distribute_details'] = $this->Homemodel->emis_school_Sweater_Distribution_details($school_id);
		  $this->load->view('emis_school_sweater_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_Raincoat_Distribution_details()
  {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['raincoat_distribute_details'] = $this->Homemodel->emis_school_Raincoat_Distribution_details($school_id);
		  $this->load->view('emis_school_Raincoat_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
  public function emis_school_boot_Distribution_details()
   {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['boot_distribute_details'] = $this->Homemodel->emis_school_boot_Distribution_details($school_id);
		  $this->load->view('emis_school_boot_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
   public function emis_school_Socks_Distribution_details()
   {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $data['socks_distribute_details'] = $this->Homemodel->emis_school_Socks_Distribution_details($school_id);
		  $this->load->view('emis_school_Socks_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
   public function emis_school_Laptops_Distribution11_details()
   {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          $where =11;
          $data['Laptops_distribute_details'] = $this->Homemodel->emis_school_Laptops_Distribution_details($school_id, $where);
		  $this->load->view('emis_school_Laptops_Distribution_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
   public function emis_school_Laptops_Distribution12_details()
   {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
           $where=12;
          $data['Laptops_distribute_details'] = $this->Homemodel->emis_school_Laptops_Distribution_details($school_id, $where);
		  $this->load->view('emis_school_Laptops_Distribution12_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }
    public function emis_school_Laptops_Previous_Year_Distribution12_details()
   {
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
	   $school_id =$this->session->userdata('emis_school_id');
	   if($emis_loggedin)
       {  
          
          $data['Laptops_distribute_pervious'] = $this->Homemodel->emis_school_Laptops_Pervious_Year_Distribution12_details($school_id);
		  $this->load->view('emis_school_Laptops_Pervious_Year_Distribution12_details',$data);
		   
	   }else{redirect('/', 'refresh');}
  }


  function print_qr($user_id)
    {
       Common::print_qr($user_id);

    }
     public function emis_student_profile_photo(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->view('emis_student_profile_photo');
    }
    else { redirect('/', 'refresh'); }
  }

  public function teacher_login_details()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $school_id =$this->session->userdata('emis_school_id');
       $data['teach_login'] = $this->Homemodel->teacher_login_details($school_id);
    //  print_r($data['teach_login']);
       // $head_details = $this->get_common_control_link();
        //$data['header'] = $head_details['header'];
        //$data['link'] = $head_details['link'];
        $this->load->view('teacher_login_details',$data); 
      }
  }
  public function upload()
 {
 $this->load->library('session');
       $this->load->model('Homemodel');
       $this->load->library('AWS_S3');

  if($_FILES["files"]["name"] != '')
  {
    
    $file_len = $this->input->post('file_length');
   for($count = 0; $count<$file_len; $count++)
   {
    $i = $count+1;
   
    $_FILES["file"]["file_name"] = $_FILES["files"]["tmp_name"][$count];
   
    // print_r($_FILES);
   
      $school_id=$this->session->userdata('emis_school_id');
      $sourcePath = $_FILES['file']['file_name']; 

// move_uploaded_file($sourcePath,$targetPath) ; 
  $keyname = 'School_Profile/'.$school_id.'_'.$i.'.jpg';
 // print_r($keyname);
  $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$sourcePath);

 $img_path= $keyname;
 //print_r($img_path);
$image['photo'.$i] = $img_path;
$school_key_id = $school_id;
     
    }
$IMG_FILE= $this->Homemodel->updatefile($school_key_id,$image);
//echo json_encode($IMG_FILE);
   }
 }
 public function ajax_php_file()
 {
     $this->load->library('session');
      $this->load->model('Homemodel');
      $this->load->library('AWS_S3');
 

   $this->load->model('Homemodel');
 $school_id=$this->session->userdata('emis_school_id');

 $data = $this->input->post('emis_image_data');
 $image_arr = [];
 if(!empty($data)){
 foreach($data as $index=> $image)
 {
   $index = $index+1;
 $base64_img =  str_replace("[removed]","data:image/png;base64,", $image);
 $output_file = APPPATH."docs/temp_base64_image.jpg";
 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
     for ($i = 0; $i < 5; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
     }
   $temp_file_name = $randomString.date('Y-m-d-H:m:s');
   
 
 $ifp = fopen( $output_file, 'wb' ); 

 // split the string on commas
 // $data[ 0 ] == "data:image/png;base64"
 // $data[ 1 ] == <actual base64 string>
 $data = explode( ',', $base64_img );
 // print_r($data);
 // we could add validation here with ensuring count( $data ) > 1
 fwrite( $ifp, base64_decode( $data[ 1 ] ) );

 // clean up the file resource
 fclose( $ifp ); 
 // $students_id = '';
 
 

 $tempdoc = $output_file;
 // $tempdocname = $students_id;
 
// Storing source path of the file in a variable
//$targetPath = "asset/uploads/".$_FILES['file']['name']; // Target path where file is to be stored

// echo $sourcePath;

// move_uploaded_file($sourcePath,$targetPath) ; 
 $keyname = 'School_Profile/'.$school_id.'_'.$index.'.jpg';
 $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$tempdoc);


// echo "<span id='success' style='color:green;font-size:large;'>Image Uploaded Successfully...!!</span><br/>";
/*echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/
     array_push($image_arr,$school_id.'_'.$index.'.jpg');
   
//  $img_path= $keyname;
$save['photo'.$index] = $school_id.'_'.$index.'.jpg';
$school_key_id = $school_id;
$IMG_FILE[]= $this->Homemodel->updatefile($school_key_id,$save);
   }
echo json_encode(sizeof($IMG_FILE));
 }
// print_r($image_arr);
}
	//raju 
	 public function get_stud_scheme_list()
   {
	
	$school_id = $this->session->userdata('emis_school_id');
	
	$classnumber=$this->input->post('classno');
	$sectionname=$this->input->post('sectionname');
  $data['schemeid']=$this->input->post('schemeid');
	if(!empty($classnumber))
	{
	$data['student_tag']=$this->Homemodel->getscheme_search_stud($school_id,$classnumber,$sectionname);
  $data['student_tag1']=$this->Homemodel->getscheme_search_stud1($school_id,$classnumber,$sectionname);
	}

	// print_r($data['trstse_search']);
    // $data['trstse']=$this->Homemodel->getscheme_trstse($school_id,$classnumber,$sectionname);
	$data['rte_type']=$this->Homemodel->baseapp_rte_type();
	$data['cwse']=$this->Homemodel->baseapp_differently_abled();
	$data['benefit']=$this->Homemodel->student_ied_benefits();
  $data['present_status']=$this->Homemodel->student_present_status();
	// print_r($data['cwse']); die();
	$data['sector_list'] = $this->Homemodel->dropdown_dtls(array('id','sector'),'student_nsqf_sector');
  $data['job_role_list'] = $this->Homemodel->dropdown_dtls(array('id','job_role'),'student_nsqf_job_roles');
  $data['present_status']=$this->Homemodel->student_present_status();
  // print_r($data['cwse']); die();
  $data['sector_list'] = $this->Homemodel->dropdown_dtls(array('id','sector'),'student_nsqf_sector');
  $data['job_role_list'] = $this->Homemodel->dropdown_dtls(array('id','job_role'),'student_nsqf_job_roles');
	if(!empty($classnumber))
	{
	 $data['rte'] =$this->Homemodel->rte($school_id,$classnumber,$sectionname);
	}
	// print_r($data['rte']); die();
	$data['trstse_all']=$this->Homemodel->getscheme_trstse_all($school_id);
     $data['sportslist']=$this->Homemodel->getsports_list();
	// $data['participating_level']=$this->Homemodel->game_participating_level();
	$data['classDetails'] = $this->Homemodel->getClassDetail1($school_id);
if(!empty($classnumber))
  {
  //$data['sports_search']=$this->Homemodel->getscheme_search_sports($school_id,$classnumber,$sectionname);
  $data['sportslist']=$this->Homemodel->getsports_list();
}
  // $data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
	//print_r($data);die();
	$this->load->view('emis_school_stud_scheme_list',$data);   
   }
   

		
   
      /* insert scholor data */
    public function add_student_scholor()
    {

	$school_id=$this->session->userdata('emis_school_id');	
	$student_id=$this->input->post('stu_adid');
	$student_name=$this->input->post('student_name');
	$gender=$this->input->post('gender');
	$cswn=$this->input->post('cswn');
	$rte=$this->input->post('rte');
	$rtetype=$this->input->post('rtetype');
	$nmmsdate=$this->input->post('nmmsdate');
	$trstsedate=$this->input->post('trstsedate');
	$inspiredate=$this->input->post('inspiredate');
	
	$remark=$this->input->post('remark');
  $game=$this->input->post('game');
  $sportsschemedate=$this->input->post('sportsschemedate');
  $particypy_level=$this->input->post('particypy_level');
  $winnerlevel=$this->input->post('winnerlevel');

   $class_section=$this->input->post('stusection');
	// $c_s=(explode("-",$class_section));
	 $classstud=$this->input->post('stuclass');
	// print_r ( $class_section);
	// print_r ( $classstud);die();
	
		$nation=$this->input->post('nation');
		$dates=$this->input->post('dates');
		
		$pro =$this->input->post('pro');
		$benifit =$this->input->post('benifit');
    $present_status=$this->input->post('present_status');
    $training_type=$this->input->post('training_type');
    $academic_year=$this->input->post('ac_year');
    $stu_community_id=$this->input->post('community_id');
	       // if($dates != ''){
            // $dated = date('Y-m-d',strtotime($dates));}
			// else{ $dated = '';}
			
			 
			$saveied['school_id'] =$school_id;
			$saveied['student_id'] =$student_id;
			$saveied['national_id'] =$nation;
			$saveied['differently_type'] =$cswn;
			$saveied['benefit'] =$benifit;
			$saveied['provided_by'] =$pro;
			$saveied['acad_year'] =$dates;
			$saveied['isactive'] =1;
			$saveied['created_at']=date("Y-m-d H:i:s");
			
		  $result = $this->Homemodel->studsch_stud_taggingied($saveied);
			
	    $savescholor['school_id'] = $school_id;
			$savescholor['student_id'] = $student_id;
			if($trstsedate != ''){
            $trstseda = date('Y-m-d',strtotime($trstsedate));}
			else{ $trstseda = '';}
			
			$savescholor['trstse'] = $trstseda;
			if($nmmsdate != ''){
            $nmmsda = date('Y-m-d',strtotime($nmmsdate));}
			else{ $nmmsda = '';}
			$savescholor['nmmsexam_passed'] = $nmmsda;
		
			if($inspiredate != ''){
            $inspireda = date('Y-m-d',strtotime($inspiredate));}
			else{ $inspireda = '';}
			$savescholor['inspire'] = $inspireda;
			
			$savescholor['remarks'] = $remark;
			
			$savescholor['class'] = $classstud;
			$savescholor['section'] = $class_section;
			$savescholor['status'] = 1;
			$savescholor['created_date']=date("Y-m-d H:i:s");
			
			// print_r($savescholor);
			// die();
		  $result = $this->Homemodel->studsch_stud_tagging($savescholor);
			
      $saves['school_id'] = $school_id;
			$saves['unique_id_no'] = $student_id;
			if($gender =='Male')
			{
				$gender =1;
			}
			else{
				$gender =2;
			}
			$saves['gender'] = $gender;
			$saves['differently_abled'] = $cswn;
		  $saves['child_admitted_under_reservation'] = $rte;
			$saves['rte_type'] = $rtetype;
      // print_r($saves);die();
      
		  $result = $this->Homemodel->studchild_stud_tagging($saves);

      $savestudent_participate['school_id'] = $school_id;
      $savestudent_participate['student_id'] = $student_id;
      $savestudent_participate['class'] = $classstud;
      $savestudent_participate['section'] = $class_section;
      $savestudent_participate['game_participating'] = $game;
      $savestudent_participate['last_participating_date'] = $sportsschemedate;
      $savestudent_participate['last_participating_level'] = $particypy_level;
      $savestudent_participate['winner_level_details'] = $winnerlevel;
      $savestudent_participate['status'] = 1;
      $savestudent_participate['created_date']=date("Y-m-d H:i:s");
      $result = $this->Homemodel->insert_student_participate($savestudent_participate);
		
  
    $save_OSC['school_id']=$school_id;
		$save_OSC['name']=$student_name;
		$save_OSC['unique_id_no']=$student_id;
    $save_OSC['osc']=1;
    $save_OSC['present_status']=$present_status;
    $save_OSC['ac_year']=$academic_year;
    $save_OSC['training_type']=$training_type;
    $result = $this->Homemodel->insert_student_osc($save_OSC);


    $save_vocation_dtl['school_key_id'] = $school_id;
    $save_vocation_dtl['unique_id_no'] = $student_id;
    $save_vocation_dtl['class_studying_id'] = $classstud;
    $save_vocation_dtl['community_id'] = $stu_community_id;
    $save_vocation_dtl['gender'] = $gender;
    $save_vocation_dtl['class_section'] = $class_section;
    $save_vocation_dtl['nsqf_sector'] = $this->input->post('sector');
    $save_vocation_dtl['nsq_job_role'] = $this->input->post('jobrole');;
    $save_vocation_dtl['isactive'] = 1;
    $save_vocation_dtl['createdat']=date("Y-m-d H:i:s");
    $result = $this->Homemodel->stud_vocation_dtl($save_vocation_dtl);


	    echo $result;
	 
   }

   // NationID Validation (field-Change-wise with Existing Data)
   function check_nation_id_with_exist(){
    $rec = $this->input->post('rec');
    $flag = isset($rec) ? $this->Homemodel->checkNationIDWithExist($rec) : 1; 
    echo $flag;
  }

   
   
 /*function uploadfile() 
{




  /****************************** End *******************************/

  /******************************* Book Schemes *********************/

          /******************************************************
            * Free Schemes ( Book Distribution )                *
            * VIT-sriram                                        *
            * 16/07/2019                                        *
            *****************************************************/


  public function emis_school_book_distribution()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {


          $data['school_classwise'] = $this->Homemodel->get_schoolwise_class();
          $data['school_medium'] = $this->Sectionmodel->getschool_medium();

          // post class_id

          $class_id = $this->input->post('class_id');   // class id
          $medium_id = $this->input->post('medium_id'); // medium id
          $term_id = $this->input->post('section_id'); // term or group id
          // echo $term_id.'test';
          $term_id = ($term_id !=''?$term_id:0);
          if($class_id !='')
          {
              $data['students_list'] = $this->Homemodel->get_student_list_scheme_details($class_id,$medium_id,$term_id);
              $book_where = array('class'=>$class_id,'isactive'=>1,'medium'=>$medium_id,'group_code'=>$term_id);
              // print_r($book_where);
              $data['books_details'] = Common::get_multi_list('schoolnew_textbooks_list',$book_where);
              // print_r($data['books_details']);

          }else
          {
              $data['students_list'] = '';
              $data['books_details'] = '';
          }
          $data['class_id'] = $class_id;
          $data['medium_id'] = $medium_id;
          $data['section_id'] = $term_id;
          // print_r($data);
            $this->load->view('freeSchemes/emis_book_distribution',$data);

      }else { redirect('/', 'refresh'); }


  }


  // Get Group

  public function emis_school_group_get()
  {
      $group_id = $this->input->post('group_id');
      $table = $this->input->post('table');
      $where = array('group_description'=>$group_id);
      $result = Common::get_multi_list($table,$where);

      echo json_encode($result);
  } 




  // Save Books

  public function emis_distribution_books_save()
  {
      $records = $this->input->post('records');

      foreach($records as $res)
      {
          if($res['distribution_date'] !=''){
          $res['distribution_date'] = date('Y-m-d',strtotime($res['distribution_date']));
          }
          $res['school_id'] = $this->session->userdata('emis_school_id');
          $res['created_by'] = $this->session->userdata('emis_school_id');
          
          $result[] = $this->Homemodel->save_distribution('schoolnew_books_dist',$res);
      }

      echo json_encode(sizeof($result));



  }

  // edit Book Details

  public function emis_distribution_book_edit()
  {

        $class_id = $this->input->post('class_id');
        $medium_id = $this->input->post('medium_id');
        $grp_id = $this->input->post('section_id');
        $stu_id = $this->input->post('stu_id');
              

            $book_dist_where = array('student_id'=>$stu_id,'class'=>$class_id,'medium'=>$medium_id,'group_code'=>$grp_id);
              $dist_student_details = Common::get_multi_list('schoolnew_books_dist',$book_dist_where);
              echo json_encode($dist_student_details);


  }
  public function student_summary_classwise()
   {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
     if($emis_loggedin)
       {  
              $school_id =$this->session->userdata('emis_school_id');
          $data['student_summary'] = $this->Homemodel->student_summary($school_id);
        // print_r($data['student_summary']);
      $this->load->view('student_summary_classwise',$data);
       
     }else{redirect('/', 'refresh');}
  }

   public function students_osc()
   {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
     if($emis_loggedin)
       {  
              $school_id =$this->session->userdata('emis_school_id');
          $data['student_osc'] = $this->Homemodel->students_osc_reg();
        // print_r($data['student_summary']);
      $this->load->view('students_osc_reg',$data);
       
     }else{redirect('/', 'refresh');}
  }
  public function student_summary_classwise_11_12()
   {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
     if($emis_loggedin)
       {  
              $school_id =$this->session->userdata('emis_school_id');
          $data['student_summary'] = $this->Homemodel->student_summary_11_12($school_id);
        //  print_r($data['student_summary']);
      $this->load->view('student_summary_classwise_11_12',$data);
       
     }else{redirect('/', 'refresh');}
  }



  /*********************************** End *********************************/

  /********************************* Additional Note Book ******************/

  /******************************************
    * Additional Note Books                 *
    * VIT-sriram                            *
    * 17/07/2019                            *
    *****************************************/

  public function emis_distribution_note_book()
  {
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {

          $data['school_classwise'] = $this->Homemodel->emis_note_book_class();
          $data['school_medium'] = $this->Sectionmodel->getschool_medium();

          // post class_id

          $class_id = $this->input->post('class_id'); // class id
          // $medium_id = $this->input->post('medium_id'); // medium id
          $section_id = $this->input->post('section_id');
          $term_id = $this->input->post('term_id'); // term or group id
          $note_book_id = $this->input->post('note_books');
          $term_id = ($term_id !=''?$term_id:0);
          
          if($class_id !='')
          {
              $data['students_list'] = $this->Homemodel->get_student_list_book_scheme_details($class_id,$section_id,$term_id,$note_book_id);
              $book_where = array('class'=>$class_id,'isactive'=>1,'medium'=>$medium_id,'group_code'=>$term_id);
              // print_r($book_where);
              
              // print_r($data['books_details']);

          }else
          {
              $data['students_list'] = '';
              $data['books_details'] = '';
          }

          $data['class_id'] = $class_id;
          // $data['medium_id'] = $medium_id;
          $data['term_id'] = $term_id;
          $data['section_id'] = $section_id;
          $data['note_book_id'] = $note_book_id;

          // print_r($data);
            $this->load->view('freeSchemes/emis_additional_notebook',$data);

      }else { redirect('/', 'refresh'); }
      
  }

  // get_books_details 

  public function get_note_books_details()
  {
    $class_id = $this->input->post('class_id'); // class id
          $medium_id = $this->input->post('medium_id'); // medium id
          $term_id = $this->input->post('section_id'); // term or group id
          $student_id = $this->input->post('stu_id'); //student id
          $term_id = ($term_id !=''?$term_id:0);
          

              $book_where = array('schoolnew_notebooks_list.class'=>$class_id,'schoolnew_notebooks_list.isactive'=>1,'schoolnew_notebooks_list.group_code'=>$term_id);
              $result = $this->Homemodel->get_emis_dist_notebook($book_where,'');
              echo json_encode($result);
  }

  // Get Note Book Available Count

  public function get_note_books_count()
  {
      $class_id = $this->input->post('class_id');
      $group_id = $this->input->post('group_id');
      $result = $this->Homemodel->get_note_book_count($class_id,$group_id);
      // print_r($result);die;
      echo json_encode($result);
  }

    // Save Note Books

  public function emis_distribution_notebooks_save()
  {
      $records = $this->input->post('records');
      // print_r($records);die;
      foreach($records as $res)
      {
          $res['school_id'] = $this->session->userdata('emis_school_id');
          $res['created_by'] = $this->session->userdata('emis_school_id');

          $result[] = $this->Homemodel->save_notebook_distribution('schoolnew_notebooks_dist',$res);
      }

      echo json_encode(sizeof($result));



  }

  // edit Book Details

  public function emis_distribution_notebook_edit()
  {

        $class_id = $this->input->post('class_id');
        $medium_id = $this->input->post('medium_id');
        $grp_id = $this->input->post('section_id');
        $stu_id = $this->input->post('stu_id');
              

            $book_dist_where = array('schoolnew_notebooks_list.class'=>$class_id,'schoolnew_notebooks_list.group_code'=>$grp_id,'schoolnew_notebooks_list.isactive'=>1);
              $dist_student_details = $this->Homemodel->get_emis_dist_notebook($book_dist_where,$stu_id);
              echo json_encode($dist_student_details);


  }
  /*********************** End ****************************/
  public function ptmgr_noon_meal_program()
  {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['ptmgr_noon_meal_program'] = $this->Homemodel->ptmgr_noon_meal_program($school_id);
         // print_r($data['ptmgr_noon_meal_program']);
      $this->load->view('ptmgr_noon_meal_program',$data);
       
     }else{redirect('/', 'refresh');}
    
  }
   public function ptmgr_noon_meal_program_not_opt()
  {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['ptmgr_noon_meal_program'] = $this->Homemodel->noon_meal_program_not_opt($school_id);
         // print_r($data['ptmgr_noon_meal_program']);
      $this->load->view('ptmgr_noon_meal_program_not_opt',$data);
       
     }else{redirect('/', 'refresh');}
    
  }
public function get_school_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
             $school_id =$this->session->userdata('emis_school_id');

  $block_id=$this->Homemodel->get_block_id($school_id);
   $block_id=$block_id->block_id; 

  $data['student_migration_details'] = $this->Homemodel->get_school_student_migration($block_id);
    $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
    $this->load->view('emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function save_common_student_list()
    {
         $records = $this->input->post();
         //print_r($records);
        $save_data = $this->Homemodel->save_common_student_list($records);
        echo $save_data;
    }

  /*********************************** End *******************************/
  /************************* Attendance School Classwise *****************/

  /**
  * Get classwise Details 
  * VIT-sriram
  * 29/07/2019
  **/


   public function school_wise_contributers()
    {
     
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $school_id  =$this->session->userdata('emis_school_id');
        $data['csr'] = $this->Statemodel->emis_school_contributer_details($school_id);
         $data['school_total_requirements'] = $this->Statemodel->school_wise_retreive_req_contribution($school_id);
        
        $this->load->view('emis_csr_contribution_schools',$data);
      }else { redirect('/', 'refresh'); }
     
    }



  public function get_school_contribution_details()
  {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) 
    {
        $school_id = $this->session->userdata('emis_school_id');

     $data['csr_material_master'] =$this->Homemodel->school_needs_csr_material_master();
      $data['cate'] =$this->Homemodel->cate();
      $data['sub_cate'] =$this->Homemodel->sub_cate();
        $data['school_details'] = $this->Statemodel->get_school_id_by_requirements($school_id);
        $data['school_total_requirements'] = $this->Statemodel->school_wise_retreive_req_contribution($school_id);
      $this->load->view('emis_school_wise_requirement_details',$data);

    }else { redirect('/', 'refresh'); }

  }
//By Raj
  public function emis_school_needs_csr()
    {
      $school_id =$this->session->userdata('emis_school_id');
      $data['csr_material_master'] =$this->Homemodel->school_needs_csr_material_master();
      $data['cate'] =$this->Homemodel->cate();
      $data['sub_cate'] =$this->Homemodel->sub_cate();
      $data['csr_material'] =$this->Homemodel->get_school_needs_csr($school_id);
      $this->load->view('emis_school_needs_csr',$data);
    }


  public function get_attendance_classwise_details()
  {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) 
    {
        $school_id = $this->session->userdata('emis_school_id');
        $date = $this->input->post('date');

        // // echo $school_id;
            $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_yearly';
                $teach_table = 'teachers_attend_yearly';
            }else
            {
              if(date('d-m',strtotime($week_start)) >= date('d-m',strtotime($date)))
              {   
                // echo "if else";
                  $table = 'students_attend_monthly';
                  $teach_table = 'teachers_attend_monthly';
              }else
              {
                
                $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              }
            }
          

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            // $teach_table ='teachers_attend_daily';  
          }
        $data['date'] = $date;
        $data['classwise_details'] = $this->Homemodel->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Statemodel->get_school_name($school_id);
      // $data['school'] = $school_id;
        $this->load->view('emis_school_attendance_classwise',$data);

    }else { redirect('/', 'refresh'); }

  }

  /**
    * Sectionwise Count
    * VIT-sriram
    * 09/08/2019
    *****/

  public function emis_attendance_sectionwise_details()
  {
        $class_id = $this->input->post('class_id');
        $school_id=  $this->session->userdata('emis_school_id');
        $result = $this->Homemodel->get_attendance_class_sectionwise_details($school_id,$class_id,'students_attend_daily');
        echo json_encode($result);
  }
  
  //user header by raju
  // public function user_header()
  // {
	 // $emis_loggedin = $this->session->userdata('emis_loggedin');
	 // $type =$this->session->userdata('emis_user_type_id');
	 // $usertype = $this->session->userdata('user_type');
	
	
		
       // if($emis_loggedin)
       // {  
          
			 
			 
			 // // echo"<pre>";print_r($header_menu);echo"<pre>";
       
	     // $this->load->view('emis_school_uniforms_Distribution_details');

       
     // }
	   // else{redirect('/', 'refresh');}
  // }
  //    }
	//    else{redirect('/', 'refresh');}
  // }


  public function check_details()
  {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
        // echo "function in";die;
      $data = $this->Homemodel->db_check();
        
    }

  }
  // public function header_link()
  // {
	  
	 // $emis_loggedin = $this->session->userdata('emis_loggedin');
     // $school_id =$this->session->userdata('emis_school_id');
       // if($emis_loggedin)
       // {  
         
        
      // $this->load->view('headerlink');
       
      // }else{redirect('/', 'refresh');}
  // }
  
  public function stud_community_report()
  {
	  
	 $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
         $data['school_community'] = $this->Homemodel->stud_community_report($school_id);
          $this->load->view('emis_stud_community_report',$data);
       }else{redirect('/', 'refresh');}
  }
   public function stud_religion_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
        
         $data['school_community'] = $this->Homemodel->stud_religion_report($school_id);
          $this->load->view('emis_stud_religion_report',$data);
       }else{redirect('/', 'refresh');}
  }
    public function stud_aadhar_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
         $data['school_community'] = $this->Homemodel->stud_aadhar_report($school_id);
          $this->load->view('emis_stud_aadhar_report',$data);
       }else{redirect('/', 'refresh');}
  }
   public function stud_BPL_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
         $data['school_community'] = $this->Homemodel->stud_BPL_report($school_id);
          $this->load->view('emis_stud_BPL_report',$data);
       }else{redirect('/', 'refresh');}
  }
  
    public function stud_voc_nsqf_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
         $data['school_community'] = $this->Homemodel->stud_voc_nsqf_report($school_id);
          $this->load->view('stud_voc_nsqf_report',$data);
       }else{redirect('/', 'refresh');}
  }
   public function stud_cwsn_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
         $data['school_community'] = $this->Homemodel->stud_cwsn_report($school_id);
          $this->load->view('stud_cwsn_report',$data);
       }else{redirect('/', 'refresh');}
  }
  


  /*************************************** End *****************************/


  /******************************** MHRD DCF ********************************/

  /**
    * MHRD DCF
    * VIT-sriram
    * 09/08/2019
    ****/

  public function emis_mhrd_dcf_form()
  {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
       if($emis_loggedin)
       {  
     $school_id =$this->session->userdata('emis_school_id');
     // echo"<pre>";print_r($this->session->userdata());echo"</pre>";
          $where = array('school_key_id'=>$school_id);
          // echo $this->uri->segment(3);
          if($this->uri->segment(3) ==1)
        {
          $data['success'] = $this->session->userdata('emis_school_udise').' Successfully Saved Declaration';
        }

        $data['decleartion_data'] = Common::get_single_list('mhrd_dcf_form_entry',$where);

        $this->load->view('emis_school_declaration_form',$data);
       }else{redirect('/', 'refresh');}


  }


  public function save_mhrd_dcf()
  {
     $date = date('Y-m-d',strtotime($this->input->post('sch_auth_date')));
     $school_profile = $this->session->userdata('school_profile');
     $save['id'] = $this->input->post('id');
     $save['dcf_certify_by_school_auth_name'] =  $this->input->post('sch_auth_name');
     $save['dcf_certify_by_school_auth_desig'] =  $this->input->post('sch_auth_desi');
     $save['dcf_certify_by_school_auth_date'] =  $date;
     $save['dcf_certify_by_school_auth_place'] = $school_profile[0]['block_id'];
     $save['school_key_id'] = $this->session->userdata('emis_school_id');
     $save['udise_sch_code'] = $this->session->userdata('emis_school_udise');
     $save['dcf_entry_level'] = 1;

     $curr_year = date('Y',strtotime($date));
     $len = strlen($curr_year);
     $ac_year = substr($curr_year,$len -2 ,$len);

     $save['ac_year'] = $curr_year.'-'.($ac_year +1); 

      // print_r($save);die;

     $result = $this->Homemodel->save_mhrd_dcf('mhrd_dcf_form_entry',$save);
     // echo "<script>alert('')"
     redirect('Home/emis_mhrd_dcf_form/1');
  }
  
  public function get_benefit_students_list()
  
	   {
	 
	 $school_id = $this->session->userdata('emis_school_id');
	// echo $school_id;
	// $data['cwsn_benefit']=$this->Homemodel->getscheme_nmms($school_id);//,$classnumber,$sectionname);
	
	$data['cwsn_benefit'] = $this->Homemodel->cwsn_benefit($school_id);
	
	$this->load->view('emis_cwsn_benefit_register',$data);   
   } 


   public function get_report_age()
    {
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
		{
             $data['dist_id'] = $this->session->userdata('emis_district_id');
             $dist_id=$data['dist_id'] ;
             $school_id =$this->session->userdata('emis_school_id');
             $data['student_age'] = $this->Homemodel->get_report_age($school_id);
             $this->load->view('emis_student_age_report',$data);
		} else { redirect('/', 'refresh'); }

    }   



   /** To Load Scheme-Indent Reports Functionality last mod -  10.09.2019(venba/rs) */
      /** Indent Report Dashboard Functionality */
      public function emis_indent_summary_register()
      {
          $this->load->view('emis_indent_summary_register');   
      }

      /** Uniform Indent Report Functionality */
      public function emis_uniform_indent()
      {
    
        $scheme = $this->input->get('schemeid');
        $set=$this->input->post('set');
        $dist = $this->input->get('district_id');
        $block =$this->input->get('block_id');
        $tname = 'schoolnew_schemeindent' ;
        $new_tname = 'schoolnew_uniform_scheme' ; 
        
    
        $data['sets']=$set;
    
        if(!empty($set)){
          $data['uniformboy'] = $this->Homemodel->uniform_indentboy($scheme,$dist,$set,$tname);
          $data['uniformgirl'] = $this->Homemodel->uniform_indentgirl($scheme,$dist,$set,$tname);		
      
        }	
    
        if($scheme == 1)
        {
          $data['uniformboy'] = $this->Homemodel->uniform_indentboy($scheme,$dist,$set,$tname);	  
          $data['uniformgirl'] = $this->Homemodel->uniform_indentgirl($scheme,$dist,$set,$tname);
        }	

        if(!empty($dist))
        {
          $set = substr($dist,0,1);
          $data['sets']=$set;
          $scheme = substr($dist,1,1);
        
          $dists = substr($dist,2,2);
          $data['uniformboy'] = $this->Homemodel->uniform_indentboy($scheme,$dists,$set,$tname);
          $data['uniformgirl'] = $this->Homemodel->uniform_indentgirl($scheme,$dists,$set,$tname);
        }  
        
        if(!empty($block)){
          $set = substr($block,0,1);
          
          $data['sets']=$set;
          $scheme = substr($block,1,1);
        
          $blk = substr($block,2,3);
        
          $data['uniformboy'] = $this->Homemodel->uniform_indentsboy($scheme,$blk,$set,$tname);
          $data['uniformgirl'] = $this->Homemodel->uniform_indentsgirl($scheme,$blk,$set,$tname);
        }
        $this->load->view('emis_uniform_indent',$data);
      }
  
      /** Footwear Indent Report Functionality */
      public function emis_footwear_indent()
	    {
		    $scheme = $this->input->get('schemeid');
        $dist = $this->input->get('district_id');
        $blk =$this->input->get('block_id');
	
		     if($scheme == 2)
	      {
          $data['footwearboy'] = $this->Homemodel->footwear_indentboy($scheme,$dist,$blk);	  
          $data['footweargirl'] = $this->Homemodel->footwear_indentsgirl($scheme,$dist,$blk);
        }	
	      if(!empty($dist))
	      {
          $scheme = substr($dist,0,1);
        
          $dists = substr($dist,1,2);
          $data['footwearboy'] = $this->Homemodel->footwear_indentboy($scheme,$dists,$blk);
          $data['footweargirl'] = $this->Homemodel->footwear_indentsgirl($scheme,$dists,$blk);
	      }  
        if(!empty($blk)){
          
          $scheme = substr($blk,0,1);
        
          $blks = substr($blk,1,3);
          $data['footwearboy'] = $this->Homemodel->footwear_indentboys($scheme,$dists,$blks);
          $data['footweargirl'] = $this->Homemodel->footwear_indentsgirls($scheme,$dists,$blks);
        }
		    $this->load->view('emis_footwear_indent',$data); 
      }
      
      /** Notebook Indent Report Functionality */
      public function emis_notebook_indent()
	    {
		    $scheme = $this->input->get('schemeid');	
        $dist = $this->input->get('district_id');
        $blk =$this->input->get('block_id');
        // echo $scheme;
        // echo $dist;
        // echo $block;
	
		    if($scheme == 3)
	      {
          // $data['notebook_boy'] = $this->Homemodel->notebook_indentboy($scheme,$dist,$blk);	  
          // $data['notebook_girl'] = $this->Homemodel->notebook_indentsgirl($scheme,$dist,$blk);
        }	

        if(!empty($dist))
        {
          
          $scheme = substr($dist,0,1);
        
          $dists = substr($dist,1,2);
          // $data['notebook_boy'] = $this->Homemodel->notebook_indentboy($scheme,$dists,$blk);
              // $data['notebook_girl'] = $this->Homemodel->notebook_indentsgirl($scheme,$dists,$blk);
        }  
        if(!empty($blk)){
          
          $scheme = substr($blk,0,1);
        
          $blks = substr($blk,1,3);
          // $data['notebook_boy'] = $this->Homemodel->notebook_indentboy($scheme,$dists,$blks);
          // $data['notebook_girl'] = $this->Homemodel->notebook_indentsgirl($scheme,$dists,$blks);
        }
		    $this->load->view('emis_notebook_indent',$data); 
	    }
    
      /** Bag Indent Report Functionality */
	    public function emis_bag_indent()
	    {
		   
            $dist = $this->input->get('district_id');
	          $blk =$this->input->get('block_id');
            $class = " class_studying_id >= 1 and  class_studying_id <= 8  and ( cate_type = 'Primary School' or cate_type = 'Middle School')";         
            if(!empty($dist))
                  {
                $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
                    }
                else if(!empty($blk))
              {
                  $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
                }
                else
                  {
                $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
                  }
            $this->load->view('emis_bags_indent',$data); 
      }
      
      /** Bag Indent Report Functionality */
      public function emis_dsebag_indent()
      {
		   
          $dist = $this->input->get('district_id');
	        $blk =$this->input->get('block_id');
			    $class = " class_studying_id >= 1 and  class_studying_id <= 12  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			    if(!empty($dist))
	        {
				    $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
          }
	        else if(!empty($blk))
			    {
		        $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
		      }
	        else
	        {
		       $data['bag_indent'] = $this->Homemodel->bag_indent($dist,$class,$blk);
	        }
		    $this->load->view('emis_dsebag_indent',$data); 
	    }
    
      /** Crayon Indent Report Functionality */
      public function emis_crayan_indent()
      {
		     $dist = $this->input->get('district_id');
	       $blk =$this->input->get('block_id');
		     $class = " class_studying_id >= 1 and  class_studying_id <= 2  and ( cate_type = 'Primary School' or cate_type = 'Middle School')";
          if(!empty($dist))
            {
            $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
              } 
            else if(!empty($blk))
          {
            $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
          }
          else 
          {
            $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
          }
            $this->load->view('emis_crayan_indent',$data); 
      }
      /** Crayon Indent Report Functionality */
	    public function emis_dsecrayan_indent()
      {
        $dist = $this->input->get('district_id');
          $blk =$this->input->get('block_id');
        $class = " class_studying_id >= 1 and  class_studying_id <= 2  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
        if(!empty($dist))
          {
          $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
            } 
          else if(!empty($blk))
        {
          $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
        }
        else 
        {
          $data['crayan_indent'] = $this->Homemodel->crayan_indent($dist,$blk,$class);
        }
          $this->load->view('emis_dsecrayan_indent',$data); 
      }
      /** Color pencil Indent Report Functionality */
	    public function emis_colorpencil_indent()
	    {
		      $dist = $this->input->get('district_id');
	        $blk =$this->input->get('block_id');
          $class = " and ( cate_type = 'Primary School' or cate_type = 'Middle School')";
          
				  if(!empty($dist))
				  {
				
				  $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
				 
				}  		
				else if(!empty($blk))
				{
				  $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
				}
				else{
				  $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
				}
		   $this->load->view('emis_colorpencil_indent',$data); 
	    }
	    /** Color pencil Indent Report Functionality */
	    public function emis_dsecolorpencil_indent()
      {
          $dist = $this->input->get('district_id');
            $blk =$this->input->get('block_id');
        $class = "  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
          if(!empty($dist))
          {
          
            $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
          
          }  		
          else if(!empty($blk))
          {
            $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
          }
          else{
            $data['colorpencil_indent'] = $this->Homemodel->colorpencil_indent($dist,$blk,$class);
          }
        $this->load->view('emis_dsecolorpencil_indent',$data); 
      }
	    /** Geometry box Indent Report Functionality */
      public function emis_geomentry_indent()
      {
          
              $dist = $this->input->get('district_id');
            $blk =$this->input->get('block_id');
        $class = " and ( cate_type = 'Primary School' or cate_type = 'Middle School')";
        if(!empty($dist))
          {
            $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
          }  		
        else if(!empty($blk))
            {
              $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
              }
        else{
          $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
          }
          $this->load->view('emis_geomentry_indent',$data); 
      }
	    /** Geometry box Indent Report Functionality */
      public function emis_dsegeomentry_indent()
      {
          
              $dist = $this->input->get('district_id');
            $blk =$this->input->get('block_id');
        $class = "  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
        if(!empty($dist))
          {
            $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
          }  		
        else if(!empty($blk))
            {
              $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
              }
        else{
          $data['geomentry_indent'] = $this->Homemodel->geomentry_indent($dist,$blk,$class);
          }
          $this->load->view('emis_dsegeomentry_indent',$data); 
      }
	    /** atlas Indent Report Functionality */
	    public function emis_atlas_indent()
	    {
            $dist = $this->input->get('district_id');
	          $blk =$this->input->get('block_id');
			      $class = " and ( cate_type = 'Primary School' or cate_type = 'Middle School')";
            if(!empty($dist))
                  {
                  $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
                    }  		
            else if(!empty($blk))
              {
                  $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
                }
            else
              {
              $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
              }
		        $this->load->view('emis_atlas_indent',$data); 
	    }
      /** atlas Indent Report Functionality */
      public function emis_dseatlas_indent()
      {
              $dist = $this->input->get('district_id');
            $blk =$this->input->get('block_id');
        $class = "  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
        if(!empty($dist))
              {
            $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
                }  		
        else if(!empty($blk))
          {
              $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
            }
        else{
          $data['atlas_indent'] = $this->Homemodel->atlas_indent($dist,$blk,$class);
          }
        $this->load->view('emis_dseatlas_indent',$data); 
      }
	    /** sweater Indent Report Functionality */
	    public function emis_Sweater_indent()
	    {
		    $scheme = $this->input->get('schemeid');
			  $dist = $this->input->get('district_id');
	      $blk =$this->input->get('block_id');
			  $class =" and ( cate_type = 'Primary School' or cate_type = 'Middle School')";
		
        if(!empty($dist))
          {
          $scheme = substr($dist,0,2);
          $dists = substr($dist,2,2);
          $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class);
            
          } 
        else if(!empty($blk))
        {
          $scheme = substr($blk,0,2);
          $blks = substr($blk,2,3);
          $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class);
        }
        else{
          $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class);
        }
          $this->load->view('emis_Sweater_indent',$data); 
      }
      /** sweater Indent Report Functionality */
	    public function emis_dseSweater_indent()
	    {
		    $scheme = $this->input->get('schemeid');
			  $dist = $this->input->get('district_id');
	      $blk =$this->input->get('block_id');
			  $class = "  and ( cate_type = 'High School' or cate_type = 'Higher Secondary School')";
		
	      if(!empty($dist))
	      {
            $scheme = substr($dist,0,2);
            $dists = substr($dist,2,2);
            $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class); 
	      } 
        else if(!empty($blk))
        {
          $scheme = substr($blk,0,2);
          $blks = substr($blk,2,3);
          $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class);
        }
        else{
        $data['sweater_indent'] = $this->Homemodel->sweater_indent($scheme,$dists,$blks,$class);
        }
		    $this->load->view('emis_dseSweater_indent',$data); 
	    }
      /** boot Indent Report Functionality */
      public function emis_deeankleboot_indent()
	    {
		    $scheme = $this->input->get('schemeid');
			  $dist = $this->input->get('district_id');
	      $blk =$this->input->get('block_id');
			  $class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
        if(!empty($dist))
          {
          $scheme = substr($dist,0,2);
          $dists = substr($dist,2,2);
          $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dists,$blks,$class);
            
          } 	
			
        else if(!empty($blk))
        {
          $scheme = substr($blk,0,2);
          $blks = substr($blk,2,3);
          $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dists,$blks,$class);
        }
          
        else
          {
        $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dist,$blks,$class);	  
          }	
        
	  
		     $this->load->view('emis_deeankleboot_indent',$data);
	    }
      /** boot Indent Report Functionality */
      public function emis_dseankleboot_indent()
	    {
		    $scheme = $this->input->get('schemeid');
			  $dist = $this->input->get('district_id');
	      $blk =$this->input->get('block_id');
			  $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			  //$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
        if(!empty($dist))
        {
          $scheme = substr($dist,0,2);
          $dists = substr($dist,2,2);
          $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dists,$blks,$class);
            
        } 		
        else if(!empty($blk))
        {
          $scheme = substr($blk,0,2);
          $blks = substr($blk,2,3);
          $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dist,$blks,$class);
        }
          
        else
        {
          $data['ankleboot_indent'] = $this->Homemodel->ankleboot($scheme,$dist,$blks,$class);	  
        }	
	  
	  
		    $this->load->view('emis_dseankleboot_indent',$data);
      }
      /** socks Indent Report Functionality */
      public function emis_deesocks_indent()
      {
          $scheme = $this->input->get('schemeid');
          $dist = $this->input->get('district_id');
          $blk =$this->input->get('block_id');
          $class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
          if(!empty($dist))
            {
            $scheme = substr($dist,0,2);
            $dists = substr($dist,2,2);
            $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dists,$blks,$class);
              
            } 	
          else if(!empty($blk))
          {
            $scheme = substr($blk,0,2);
            $blks = substr($blk,2,3);
            $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dist,$blks,$class);
          }
            
            else
            {
          $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dist,$blks,$class);	  
            }	
      
      
        $this->load->view('emis_deesocks_indent',$data);
      }
      /** socks Indent Report Functionality */
      public function emis_dsesocks_indent()
      {
          $scheme = $this->input->get('schemeid');
          $dist = $this->input->get('district_id');
            $blk =$this->input->get('block_id');
        $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
        //$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
          if(!empty($dist))
            {
            $scheme = substr($dist,0,2);
            $dists = substr($dist,2,2);
            $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dists,$blks,$class);
              
            } 		
          else if(!empty($blk))
          {
            $scheme = substr($blk,0,2);
            $blks = substr($blk,2,3);
            $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dist,$blks,$class);
          }
            
            else
            {
          $data['socks_indent'] = $this->Homemodel->socks_indent($scheme,$dist,$blks,$class);	  
            }	
      
      
          $this->load->view('emis_dsesocks_indent',$data);
      }
	  
	    /** raincoat Indent Report Functionality */
      public function emis_deeraincoat_indent()
      {
		    $scheme = $this->input->get('schemeid');
			  $dist = $this->input->get('district_id');
	      $blk =$this->input->get('block_id');
        $class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
        if(!empty($dist))
          {
          $scheme = substr($dist,0,2);
          $dists = substr($dist,2,2);
          $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dists,$blks,$class);
            
          } 			
        else if(!empty($blk))
        {
        $scheme = substr($blk,0,2);
        $blks = substr($blk,2,3);
        $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dist,$blks,$class);
        }
        
        else
        {
        $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dist,$blks,$class);	  
        }	
      
      
        $this->load->view('emis_deeraincoat_indent',$data);
      }
      /** raincoat Indent Report Functionality */
      public function emis_dseraincoat_indent()
      {
          $scheme = $this->input->get('schemeid');
          $dist = $this->input->get('district_id');
          $blk =$this->input->get('block_id');
          // $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
          $class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
          if(!empty($dist))
            {
            $scheme = substr($dist,0,2);
            $dists = substr($dist,2,2);
            $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dists,$blks,$class);
              
            } 			
          else if(!empty($blk))
          {
            $scheme = substr($blk,0,2);
            $blks = substr($blk,2,3);
            $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dist,$blks,$class);
          }
          else
          {
              $data['raincoat_indent'] = $this->Homemodel->raincoat_indent($scheme,$dist,$blks,$class);	  
          }	
          $this->load->view('emis_dseraincoat_indent',$data);
      }
	  
	  //School needs CSR by Raj
	  

	  public function save_school_needs()
	  {
		 
		 
		 $school_id =$this->session->userdata('emis_school_id');
		
		 $qty  = $_POST['Quantity'];
		 $mat_id = $_POST['itemname'];
		 $itemname1 = $_POST['itemname1'];
		 		 
		 if($mat_id ==500 )
		 {
			 $cat_id  = $_POST['cate'];
			 $sub_cat_id  = $_POST['sub_cate'];
		 }else 
		 {
			 $cat_id  = $_POST['cate3'];
			 $sub_cat_id  = $_POST['sub_cate3'];
		 }
		 $createdate = date('Y-m-d h:i:s');
		 
			  $arr = array('school_id'=>$school_id,'mat_id'=>$mat_id,'qty'=>$qty,'cat_id'=>$cat_id,'sub_cat_id'=>$sub_cat_id,
			  'isactive'=>1,'created_on'=>$createdate,'created_by'=>$itemname1);
			 $response = $this->Homemodel->save_school_needs($arr);
		
		   
		    redirect('Home/emis_school_needs_csr','refresh');
	  }
	   
	  function get_needscsr_details()
	  {
		 $school_id =$this->session->userdata('emis_school_id');
		
		
		 $id=$this->input->post('id');        
         $staff=$this->Homemodel->get_needscsr_details($id,$school_id);
         echo json_encode(json_decode(json_encode($staff),true));
    }
	function trash_needscsr_details()
	{
		$school_id =$this->session->userdata('emis_school_id');
		$id=$this->input->post('id');

		$arr = array('school_id'=>$school_id,'mat_id'=>$id,
			  'isactive'=>0);
			  $response = $this->Homemodel->save_school_needs($arr);
		
		   
		  redirect('Home/emis_school_needs_csr','refresh');
		 
  }

  /** Previous XII details : last mod - 28.09.2019(venba/ps) */
  public function emis_previous_XII_dtls(){
  $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $emis_school = $this->session->userdata('emis_school_udise');
     //  print_r($this->session->userdata());
     if($emis_loggedin) 
     {
      $data['acyr_1718_dtls'] = $this->Homemodel->get_previous_XII_dtls($emis_school,'dge_class12_2018');
      $data['acyr_1819_dtls'] = $this->Homemodel->get_previous_XII_dtls($emis_school,'dge_class12_2019');
      $data['school_manage'] = $this->session->userdata('school_manage');
      $this->load->view('previous_12_dtls',$data);
     }
     else { redirect('/', 'refresh'); }
  }

    public function add_previous_XII_dtls()
    {
         $records = $this->input->post();
         date_default_timezone_set('Asia/Kolkata');
         $emis_school = $this->session->userdata('emis_school_udise');
         $records['created_at'] = date('Y-m-d h:i:s');
         $check = $this->Homemodel->check_with_exist_regno($records['regno']);
        //  echo '$check = '.$check;
         if($check == 0){
            $save_data = $this->Homemodel->insert_previous_XII_dtls($records);
            // echo "save_data = ".$save_data;
            $resp[0] = $save_data ? "Done" : "Fail" ;
            $resp[1] = $save_data ? "Student Successfully" : "Something Went Wrong..." ; 
            $resp[2] = $save_data ? "success" : "error";
         }
         else if($check > 0){
            $resp[0] = "Fail";$resp[1] = "Sorry., Data Already Exist.." ; $resp[2] =  "error";
         }
         else{
            $resp[0] = "Fail";$resp[1] = "Something Went Wrong...";$resp[2] =  "error";
         }

         echo json_encode($resp);
    }

    public function edit_previous_XII_dtls()
    {
         $id = $this->input->post('id');
         $records = $this->input->post('records');
         $edited_data = $this->Homemodel->update_previous_XII_dtls($id,$records);
         echo $edited_data;
    }
    /** Previous XII details Ends Here  */
 public function get_slas_class7_report()
   {
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
     if($emis_loggedin)
       {  
          $data['details'] = $this->Homemodel->get_slas_class7_report($school_id);
      $this->load->view('get_slas_class7_report',$data);
       
     }else{redirect('/', 'refresh');}
  }

public function emis_school_student_mark1()
{
  
 $subid = $this->input->post('subjectid');
  $termid = $this->input->post('termid');
  $classid = $this->input->post('schoolwiseclassid');
  $sectionid = $this->input->post('sectionid');
  $school_id = $this->session->userdata('emis_school_id'); 

$cls=$this->Datamodel->getclasslist($school_id);
$data['classdetails']=$this->Datamodel->getallclassstudying1($cls[0]->low_class,$cls[0]->high_class);

  if($classid=='')
  {
  $data['studentlist']=''; 
  $data['communitycount']='';

  }
  else
  {
      $data['classname']=$classid ;
      $data['subjectid']=$subid;
      $data['termid']=$termid;
      $data['sectionid']=$sectionid;
     // $subject = $this->Homemodel->get_classwise_textbook($classid,$termid,$subid);
     //    $data['subjectname'] = $subject['0']['book_name'];
     // $subjectname = $subject['0']['book_name'];
           switch($termid){
                                case '1' : 
                                case '3' :
                                case '5' :
                                $tname = 'schoolnew_qstudents_highsclterm' ; break; 
                                case '2' :
                                case '4' : 
                                case '6' :
                                $tname = 'schoolnew_qstudents_highsclyrly' ; break;
                           }
      $data['studentlist']=$this->Homemodel->student_list_9_10($school_id,$classid,$termid,$sectionid,$tname);
  }
   $this->load->view('emis_school_mark_student_9_10',$data);
}

public function emis_school_studentmark_add1()
{
    $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) { 
      
                    $records = $this->input->post('records');
                    $tname = $this->input->post('tname');
                    $records = json_decode($records,true);
                    $reason = json_decode($this->input->post('reason'),true);
                   // print_r($records);die();
                    unset($records[0]);
                   unset($records[1]);
                    $termid = $this->input->post('termid');
                     switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
                    foreach($records as $index => $r){
                              $classid = $this->input->post('classid');
                              //$subjectid = $this->input->post('subjectid');
                              $termid = $this->input->post('termid');
                              $status=1;
                         // print_r($subjectid);die();
                              $data = array(
                                            //'school_id' => $this->session->userdata('emis_school_id'),
                                           // 'term_id' => $termid,
                                            'class_id' => $classid,
                                            'section'  => $r['section'],
                                            'student_id'=>$r['student_id'],
                                            'student_name'=>$r['student_name'],
                                            'access'.$s_id =>1,
                                            'acc_reason'.$s_id =>$reason[$r['student_id']]!=''?$reason[$r['student_id']]:$r['acc_reason'],
                                            'school'.$s_id."_id" => $this->session->userdata('emis_school_id'),
                                            'lang'.$s_id  =>$r['A'] != 0 ? $r['A']:NULL,
                                            'eng'.$s_id =>$r['B'] != 0 ? $r['B']:NULL,
                                            'maths'.$s_id =>$r['C']!= 0 ? $r['C']:NULL,
                                            'science'.$s_id =>$r['D']!= 0 ? $r['D']:NULL,
                                            'pract'.$s_id =>$r['E']!= 0 ? $r['E']:NULL,
                                            'social'.$s_id=>$r['F']!= 0 ? $r['F']:NULL,
                                            'total'.$s_id =>$r['G']!= 0 ? $r['G']:NULL,
                                           'status'.$s_id=> $status,
                                           'created_date' => date("Y-m-d H:i:s") 

                                          );
                                          
         $result = $this->Homemodel->insert_student_mark_data_9_10($data,$tname);
         echo $result; 
    
  }
  $studentabs=$this->input->post('absentlist');

  if(!empty($studentabs))
     {
  $studentabs1 = array_filter($studentabs);
  foreach($studentabs1 as $stuabs)
       {
      $data = array(
                                            'lang'.$s_id  =>null,
                                            'eng'.$s_id =>null,
                                            'maths'.$s_id =>null,
                                            'science'.$s_id =>null,
                                            'pract'.$s_id =>null,
                                            'social'.$s_id=>null,
                                            'total'.$s_id =>null
        );
        $resulta= $this->Homemodel->update_student_absent_data_9_10($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent_9_10($stuabs,$attendancevalue,$tname);
        echo $resultb;
       }
     }
   $studentabsent=$this->input->post('absentlist');
   if(!empty($studentabsent))
     {
   $attendancevalue=2; //for absent value //
     $result1 = $this->Homemodel->insert_student_attendance_9_10($studentabsent,$attendancevalue,$tname);
   echo $result1;   
    
       }
     }

   else { redirect('/', 'refresh'); }
//foreach($getoffice as $off) 
}

public function emis_school_studentmark_update1()
{
  
    
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) { 

  $records = $this->input->post('records');
  $records = json_decode($records,true);
//print_r($records);die();
  $tname = $this->input->post('tname');
  $termid = $this->input->post('termid');
  $reason = json_decode($this->input->post('reason'),true);
  //print_r($reason);die();
  // $reason = json_decode($this->input->post('reason'),true);
  unset($records[0]);
  unset($records[1]);
   switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
  foreach($records as $index => $r)
  {    
       $classid = $this->input->post('classid');
       $subjectid = $this->input->post('subjectid');
       $termid = $this->input->post('termid');
       $status=2;
       $id=$r['UpdateID'];
      //$acc_reason=$r['Reason'];
      // print_r($id);die();
       $school_id = $this->session->userdata('emis_school_id'); 
                          $data = array(
                                          //'school_id' => $this->session->userdata('emis_school_id'),
                                           // 'term_id' => $termid,
                                            'class_id' => $classid,
                                            'section'  => $r['section'],
                                            'student_id'=>$r['student_id'],
                                            'student_name'=>$r['student_name'],
                                            //'access'.$s_id =>0,
                                            'acc_reason'.$s_id => $reason[$r['student_id']]!=''?$reason[$r['student_id']]:$r['Reason'],
                                            'school'.$s_id."_id" => $this->session->userdata('emis_school_id'),
                                            'lang'.$s_id  =>$r['A'] != 0 ? $r['A']:NULL,
                                            'eng'.$s_id =>$r['B'] != 0 ? $r['B']:NULL,
                                            'maths'.$s_id =>$r['C']!= 0 ? $r['C']:NULL,
                                            'science'.$s_id =>$r['D']!= 0 ? $r['D']:NULL,
                                            'pract'.$s_id =>$r['E']!= 0 ? $r['E']:NULL,
                                            'social'.$s_id=>$r['F']!= 0 ? $r['F']:NULL,
                                            'total'.$s_id =>$r['G']!= 0 ? $r['G']:NULL,
                                            'status'.$s_id=> $status,
                                            'created_date' => date("Y-m-d H:i:s"),
            );
          // print_r($data);
        $result[]= $this->Homemodel->update_student_mark_data_9_10($data,$id,$tname);
          // echo json_encode($result);die;
    
  }
  $studentabs=$this->input->post('Absentlist');
  if(!empty($studentabs))
     {
  $studentabs1 = array_filter($studentabs);
  foreach($studentabs1 as $stuabs)
       {
        $attendancevalue=2; //for absent value //
         $data = array(
       
                                            'lang'.$s_id  =>null,
                                            'eng'.$s_id =>null,
                                            'maths'.$s_id =>null,
                                            'science'.$s_id =>null,
                                            'pract'.$s_id =>null,
                                            'social'.$s_id=>null,
                                            'total'.$s_id =>null,
        );
        $resulta= $this->Homemodel->update_student_absent_data_9_10($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent_9_10($stuabs,$attendancevalue,$tname);
        echo $resultb;
       }
     }
  $studentpre=$this->input->post('Presentlist');
  if(!empty($studentpre))
     {
  $studentpre1 = array_filter($studentpre);
  foreach($studentpre1 as $stupre)
       {
         
        $attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_student_present_9_10($stupre,$attendancevalue,$tname);
        echo $result2;
       }     
       }
       echo json_encode(sizeof($result));
     }



   else { redirect('/', 'refresh'); }
//foreach($getoffice as $off) 
}
public function emis_school_student_mark_update_final1()
{
  
    
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) { 
      $tname = $this->input->post('tname');
      $termid = $this->input->post('termid');
  $records = $this->input->post('records');
  $records = json_decode($records,true);
  unset($records[0]);
  unset($records[1]);                
    foreach($records as $index => $res){      
      
              $classid = $this->input->post('classid');
              $subjectid = $this->input->post('subjectid');
              $termid = $this->input->post('termid');
              $status=3;
       $id=$res['UpdateID'];
       $school_id = $this->session->userdata('emis_school_id'); 
       
           $data = array(
                          'school_id' => $this->session->userdata('emis_school_id'),
                          'term_id' => $termid,
                          'subject_id'=>$subjectid,
                          'class_id' => $classid,
                          'student_id'=>$res['student_id'],
                          'student_name'=>$res['student_name'],
                          'section'=>$res['section'],
                          //'student_attendance'=>1,
                          'FAA'=>$res['A'] != '' ? $res['A'] : '0',
                          'FAB'=>$res['B'] != '' ? $res['B'] : '0',
                          'FAC'=>$res['C'] != '' ? $res['C'] : '0',
                          'FAD'=>$res['D'] != '' ? $res['D'] : '0',
                          'FBA'=>$res['E'] != '' ? $res['E'] : '0',
                          'FBB'=>$res['F'] != '' ? $res['F'] : '0',
                          'FBC'=>$res['G'] != '' ? $res['G'] : '0',
                          'FBD'=>$res['H'] != '' ? $res['H'] : '0',
                          'FAM'=>$res['I'] != '' ? $res['I'] : '0',
                          'SAM'=>$res['J'] != '' ? $res['J'] : '0',
                          'status'=>$status,
                          'created_date' => date("Y-m-d H:i:s") 
           );

           $result = $this->Homemodel->update_student_mark_final($data,$id,$tname);
           echo $result; 
    
  }
       
    $studentabs=$this->input->post('Absentlist');
    if(!empty($studentabs))
     {
  $studentabs1 = array_filter($studentabs);
       foreach($studentabs1 as $stuabs)
       {
        $attendancevalue=2; //for absent value //
        $data = array(
                                            'lang'.$s_id  =>null,
                                            'eng'.$s_id =>null,
                                            'maths'.$s_id =>null,
                                            'science'.$s_id =>null,
                                            'pract'.$s_id =>null,
                                            'social'.$s_id=>null,
                                            'total'.$s_id =>null,
        );
        $resulta= $this->Homemodel->update_student_absent_data($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent($stuabs,$attendancevalue,$tname);

        echo $resultb;
       }
     }
  $studentpre=$this->input->post('Presentlist');
  if(!empty($studentpre))
     {
  $studentpre1 = array_filter($studentpre);
  foreach($studentpre1 as $stupre)
       {
        
        $attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_student_present($stupre,$attendancevalue,$tname);
        echo $result2;
       }     
       }
       
     }

   else { redirect('/', 'refresh'); }

}
public function emis_school_student_mark2()
{
    $subid = $this->input->post('subjectid');
    $termid = $this->input->post('termid');
    $classid = $this->input->post('schoolwiseclassid');
    $sectionid = $this->input->post('sectionid');
    $school_id = $this->session->userdata('emis_school_id'); 

    $cls=$this->Datamodel->getclasslist($school_id);
    $data['classdetails']=$this->Datamodel->getallclassstudying1($cls[0]->low_class,$cls[0]->high_class);

    $data['groupcode']=json_decode(json_encode($this->Homemodel->getgroupcode($school_id)),true);

    if(isset($_POST['emis_stu_searchsep_sub'])){
      $data['classname']=$classid ;
      $data['subjectid']=$subid;
      $data['termid']=$termid;
      $data['sectionid']=$sectionid;
      
      $data['grpsubjects']=json_decode(json_encode($this->Homemodel->getgroupcode($school_id," AND baseapp_group_code.id=".$subid)),true);

      $data['studentlist']=json_decode(json_encode($this->Homemodel->student_list_11_12($school_id,$classid,$termid,$sectionid,$tname,$subid)),true);
      //print_r($data['studentlist']);
    }
   $this->load->view('emis_school_mark_student_11_12',$data);
}

public function emis_school_studentmark_add2()
{
    $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) { 
      
                    $records = $this->input->post('records');
                    $tname = $this->input->post('tname');
                    $records = json_decode($records,true);
                    $reason = json_decode($this->input->post('reason'),true);
                   // print_r($records);die();
                    unset($records[0]);
                   // unset($records[1]);
                    $termid = $this->input->post('termid');
                     switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
                    foreach($records as $index => $r){
                              $classid = $this->input->post('classid');
                              //$subjectid = $this->input->post('subjectid');
                              $termid = $this->input->post('termid');
                              $status=1;
                         // print_r($subjectid);die();
                              $data = array(
                                            //'school_id' => $this->session->userdata('emis_school_id'),
                                           // 'term_id' => $termid,
                                            'class_id' => $classid,
                                            'section'  => $r['section'],
                                            'student_id'=>$r['student_id'],
                                            'student_name'=>$r['student_name'],
                                            'access'.$s_id =>1,
                                            'acc_reason'.$s_id =>$reason[$r['student_id']]!=''?$reason[$r['student_id']]:$r['acc_reason'],
                                            'school'.$s_id."_id" => $this->session->userdata('emis_school_id'),
                                            'lang'.$s_id  =>$r['A'] != 0 ? $r['A']:NULL,
                                            'eng'.$s_id =>$r['B'] != 0 ? $r['B']:NULL,
                                            'maths'.$s_id =>$r['C']!= 0 ? $r['C']:NULL,
                                            'science'.$s_id =>$r['D']!= 0 ? $r['D']:NULL,
                                            'pract'.$s_id =>$r['E']!= 0 ? $r['E']:NULL,
                                            'social'.$s_id=>$r['F']!= 0 ? $r['F']:NULL,
                                            'total'.$s_id =>$r['G']!= 0 ? $r['G']:NULL,
                                            'status'.$s_id=> $status,
                                            'created_date' => date("Y-m-d H:i:s") 

                                          );
                                          
         $result = $this->Homemodel->insert_student_mark_data_11_12($data,$tname);
         echo $result; 
    
  }
  $studentabs=$this->input->post('absentlist');

  if(!empty($studentabs))
     {
  $studentabs1 = array_filter($studentabs);
  foreach($studentabs1 as $stuabs)
       {
      $data = array(
                                            'lang'.$s_id  =>null,
                                            'eng'.$s_id =>null,
                                            'maths'.$s_id =>null,
                                            'science'.$s_id =>null,
                                            'pract'.$s_id =>null,
                                            'social'.$s_id=>null,
                                            'total'.$s_id =>null
        );
        $resulta= $this->Homemodel->update_student_absent_data_11_12($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent_11_12($stuabs,$attendancevalue,$tname);
        echo $resultb;
       }
     }
   $studentabsent=$this->input->post('absentlist');
   if(!empty($studentabsent))
     {
   $attendancevalue=2; //for absent value //
     $result1 = $this->Homemodel->insert_student_attendance_11_12($studentabsent,$attendancevalue,$tname);
   echo $result1;   
    
       }
     }

   else { redirect('/', 'refresh'); }
//foreach($getoffice as $off) 
}

public function emis_school_studentmark_update2()
{
  
    
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) { 

  $records = $this->input->post('records');
  $records = json_decode($records,true);
//print_r($records);die();
  $tname = $this->input->post('tname');
  $termid = $this->input->post('termid');
  $reason = json_decode($this->input->post('reason'),true);
  //print_r($reason);die();
  // $reason = json_decode($this->input->post('reason'),true);
  unset($records[0]);
 // unset($records[1]);
   switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
  foreach($records as $index => $r)
  {    
       $classid = $this->input->post('classid');
       $subjectid = $this->input->post('subjectid');
       $termid = $this->input->post('termid');
       $status=2;
       $id=$r['UpdateID'];
      //$acc_reason=$r['Reason'];
      // print_r($id);die();
       $school_id = $this->session->userdata('emis_school_id'); 
                          $data = array(
                                          //'school_id' => $this->session->userdata('emis_school_id'),
                                           // 'term_id' => $termid,
                                            'class_id' => $classid,
                                            'section'  => $r['section'],
                                            'student_id'=>$r['student_id'],
                                            'student_name'=>$r['student_name'],
                                            //'access'.$s_id =>0,
                                            'acc_reason'.$s_id => $reason[$r['student_id']]!=''?$reason[$r['student_id']]:$r['Reason'],
                                            'school'.$s_id."_id" => $this->session->userdata('emis_school_id'),
                                            'lang'.$s_id  =>$r['A'] != 0 ? $r['A']:NULL,
                                            'eng'.$s_id =>$r['B'] != 0 ? $r['B']:NULL,
                                            'maths'.$s_id =>$r['C']!= 0 ? $r['C']:NULL,
                                            'science'.$s_id =>$r['D']!= 0 ? $r['D']:NULL,
                                            'pract'.$s_id =>$r['E']!= 0 ? $r['E']:NULL,
                                            'social'.$s_id=>$r['F']!= 0 ? $r['F']:NULL,
                                            'total'.$s_id =>$r['G']!= 0 ? $r['G']:NULL,
                                            'status'.$s_id=> $status,
                                            'created_date' => date("Y-m-d H:i:s"),
            );
          // print_r($data);
        $result[]= $this->Homemodel->update_student_mark_data_11_12($data,$id,$tname);
          // echo json_encode($result);die;
    
  }
  $studentabs=$this->input->post('Absentlist');
  if(!empty($studentabs))
     {
  $studentabs1 = array_filter($studentabs);
  foreach($studentabs1 as $stuabs)
       {
        $attendancevalue=2; //for absent value //
         $data = array(
       
                                            'lang'.$s_id  =>null,
                                            'eng'.$s_id =>null,
                                            'maths'.$s_id =>null,
                                            'science'.$s_id =>null,
                                            'pract'.$s_id =>null,
                                            'social'.$s_id=>null,
                                            'total'.$s_id =>null,
        );
        $resulta= $this->Homemodel->update_student_absent_data_9_10($stuabs,$data,$tname);
        $resultb = $this->Homemodel->update_student_absent_9_10($stuabs,$attendancevalue,$tname);
        echo $resultb;
       }
     }
  $studentpre=$this->input->post('Presentlist');
  if(!empty($studentpre))
     {
  $studentpre1 = array_filter($studentpre);
  foreach($studentpre1 as $stupre)
       {
         
        $attendancevalue=1; //for absent value //
                $result2 = $this->Homemodel->update_student_present_11_12($stupre,$attendancevalue,$tname);
        echo $result2;
       }     
       }
       echo json_encode(sizeof($result));
     }



   else { redirect('/', 'refresh'); }
//foreach($getoffice as $off) 
}


/*******************************************************
		Aadhar Select List
********************************************************/

  public function student_invalid_aadhar_no(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$emis_school = $this->session->userdata('emis_school_udise');
		$school_id = $this->session->userdata('emis_school_id'); 
		 
		if($emis_loggedin){
		  $data['invalid_aadhar'] = $this->Homemodel->student_invalid_aadhar_no_list($school_id);
		  $this->load->view('student_invalid_aadhar_no',$data);
		}else{
			redirect('/', 'refresh'); 
		}
	}
	public function student_invalid_phn_no_list(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$emis_school = $this->session->userdata('emis_school_udise');
		$school_id = $this->session->userdata('emis_school_id'); 
		if($emis_loggedin){
			$data['invalid_aadhar'] = $this->Homemodel->student_invalid_phn_no_list($school_id);
			$this->load->view('student_invalid_phn_no',$data);
		}else{
			redirect('/', 'refresh'); 
		}
	}


	/*******************************************************
		Aadhar Update
	********************************************************/
	public function aadhaarupdate(){
		$this->load->library('session');
		$studentid = $this->uri->segment(3,0);
		$aadhar = $this->input->post('aadhar');
		$data = array( 'aadhaar_uid_number' => $aadhar);
		$data = $this->Homemodel->studentaadharupdate($data,$studentid);
		echo json_encode($data);
	}

	function checkaadhar() {
		$aadhar = $this->input->post('aadhar');
		$aadhar = $this->Homemodel->get_aadhar($aadhar);
		echo json_encode($aadhar);
		//print_r($aadhar);
	}

}

?>

