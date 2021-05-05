<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {

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
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->database(); 
    $this->load->model('Homemodel');
     $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
    $this->load->model('Blockmodel');

  
  }
   
    function isValidLongitude($longitude){
    if(preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/",
      $longitude)) {
       return true;
    } else {
       return false;
    }
  }

    function isValidLatitude($latitude){
    if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $latitude)) {  
          return TRUE;
    } else {
         return FALSE;
    }
  }

  public function emis_district_home()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->view('district/emis_district_home');
    } else { redirect('/', 'refresh'); }
  }

    public function emis_district_student_analytics()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');
     $data['distname'] = $this->Districtmodel->getsingledistname($district_id);
    $data['details'] = $this->Districtmodel->getallblockscountbydistrict($district_id);
    $this->load->view('district/emis_district_analytics',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

      public function emis_district_student_classwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassblock1($district_id,$manage);
    }else{
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassblock($district_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Districtmodel->getsingledistname($district_id);
    $this->load->view('district/emis_district_classwise',$data);
    } else { redirect('/', 'refresh'); }
  }

      public function emis_district_student_gender()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_district_id');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['result1'] = $this->Districtmodel->getallgenderbydistrict1($district_id,$manage);
    }else{
    $data['result1'] = $this->Districtmodel->getallgenderbydistrict($district_id);
    }
     $data['distname'] = $this->Districtmodel->getsingledistname($district_id); 
    $this->load->view('district/emis_district_genderwise',$data);
    // echo json_encode($data);
    } else { redirect('/', 'refresh'); }
  }

      public function emis_district_communitywise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   $this->load->database();
   $this->load->library('session');
   $this->load->model('Statemodel');
   $district_id=$this->session->userdata('emis_district_id');
   $community ="";
   if($this->session->userdata('emis_community')!=""){
     $community =  $this->session->userdata('emis_community');
   }else{
      $this->session->set_userdata('emis_community','C1');
       $community ="C1";
   }
     $data['communityname'] = $this->Statemodel->getcommunityname($community);
    $data['communityid'] = $community;
    $data['distname'] = $this->Districtmodel->getsingledistname($district_id);
    $data['details'] = $this->Districtmodel->getallblockscommuniywise($district_id,$community);
    $this->load->view('district/emis_district_communitywise',$data);
    } else { redirect('/', 'refresh'); }
  }

      public function savecommunityonly(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $blockt_ids = $this->input->post('comm');
     if($blockt_ids!="" ){
          $this->session->set_userdata('emis_community',$blockt_ids);
      }
      $block_id =$this->session->userdata('emis_community');
      if($block_id!=""){
        echo true;
      }else{
        echo false;
      }

       } else { redirect('/', 'refresh'); }
  }


      public function emis_district_classwise_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $stateid = $this->session->userdata('emis_district_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Statemodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassschool($block_id);
    $data['blockname'] = $this->Districtmodel->getsingleblockname($block_id);
    $this->load->view('district/emis_district_schoolwise',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

   public function saveoverallblocksession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $blockt_ids = $this->input->post('blockid');
     if($blockt_ids!="" ){
          $this->session->set_userdata('emis_blockdistrict_id',$blockt_ids);
      }
      $block_id =$this->session->userdata('emis_blockdistrict_id');
      if($block_id!=""){
        echo true;
      }else{
        echo false;
      }

       } else { redirect('/', 'refresh'); }

  }

  public function emis_district_analytics_schools()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $block_id =$this->session->userdata('emis_blockdistrict_id');
    $this->load->database();
    $this->load->model('Statemodel');
    $data['blockname'] = $this->Districtmodel->getsingleblockname($block_id);
    $data['details'] = $this->Districtmodel->getallblockcountsbyschool($block_id);
    $this->load->view('district/emis_district_analytics_school',$data);

     } else { redirect('/', 'refresh'); }
    // echo json_encode($data[' details']);
  }

  public function emis_district_blocks_classwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Statemodel');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassschool1($block_id,$manage);
    }else{
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassschool($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Districtmodel->getsingleblockname($block_id);
   $this->load->view('district/emis_district_schoolwise_analytics',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }


    public function saveschoolidsession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $school_ids = $this->input->post('school_id');
     if($school_ids!="" ){
          $this->session->set_userdata('emis_districtschool_id',$school_ids);
      }
      $school_id =$this->session->userdata('emis_districtschool_id');
      if($school_id!=""){
        echo true;
      }else{
        echo false;
      }
          } else { redirect('/', 'refresh'); }
  }

   public function saveblockidsession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

     $block_ids = $this->input->post('block_id');
     if($block_ids!="" ){
          $this->session->set_userdata('emis_districtblock_id',$block_ids);
      }
      $block_id =$this->session->userdata('emis_districtblock_id');
      if($block_id!=""){
        echo true;
      }else{
        echo false;
      }
          } else { redirect('/', 'refresh'); }
  }

  public function emis_district_classwise_analytics()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_districtschool_id');
    $this->load->database();
    $this->load->model('Districtmodel');

    $schoolprofile = $this->Districtmodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['details'] = $this->Districtmodel->getallbrachesbyschool($school_id);
    $this->load->view('district/emis_district_schoolsingle',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }


  public function saveclassidsession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
     $class_ids = $this->input->post('class_id');
     if($class_ids!="" ){
          $this->session->set_userdata('emis_districtclass_id',$class_ids);
      }
      $class_id =$this->session->userdata('emis_districtclass_id');
      if($class_id!=""){
        echo true;
      }else{
        echo false;
      }
          } else { redirect('/', 'refresh'); }
  }

     public function emis_district_classwise_studentsall()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_districtschool_id');
    $class_id =$this->session->userdata('emis_districtclass_id');
    $this->load->database();
    $this->load->model('Districtmodel');

    $data['details'] = $this->Districtmodel->getallstudentsbyschid($school_id,$class_id);
    $data['school_name'] = $this->Districtmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Districtmodel->getsingleclassname($class_id);
    $this->load->view('district/emis_district_studentsall',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }


     public function saveblockcommunity(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $blockt_ids = $this->input->post('block_id');
     if($blockt_ids!="" ){
          $this->session->set_userdata('emis_blockcommunity_id',$blockt_ids);
      }
      $block_id =$this->session->userdata('emis_blockcommunity_id');
      if($block_id!=""){
        echo true;
      }else{
        echo false;
      }

       } else { redirect('/', 'refresh'); }
  }

  public function emis_district_community_schools()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $community =  $this->session->userdata('emis_community');
    if($community==""){
    $this->session->set_userdata('emis_community','C1');
    }
    $block_id =$this->session->userdata('emis_blockcommunity_id');
    $this->load->database();
    $this->load->model('Statemodel');
    $data['communityid'] = $community;
    $data['blockname'] = $this->Districtmodel->getsingleblockname($block_id);
    $data['details'] = $this->Districtmodel->getallblockkkcountsbyclassschool($block_id,$community);
    $this->load->view('district/emis_district_community_schools',$data);
    // echo json_encode($data[' details']);

     } else { redirect('/', 'refresh'); }
  }

  public function emis_district_createstudent(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $schoolselect =  $this->session->userdata('emis_school_id');
       $district_id = $this->session->userdata('emis_district_id');
      
      if($schoolselect!=""){
        redirect('Registration/emis_student_reg','refresh');
       }else{
          redirect('District/emis_district_slelectschool','refresh');     
       }

     } else { redirect('/', 'refresh'); }

  }

  public function emis_district_slelectschool(){
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $district_id = $this->session->userdata('emis_district_id');
      $data['blocks']= $this->Datamodel->get_allblocks($district_id);  
          $this->load->view('district/emis_district_selectschool',$data);     
     } else { redirect('/', 'refresh'); }
  }

  public function emis_district_saveschoolid(){
      $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
     $schooldis = $this->input->post('emis_school_udise');
      $schooludise = $this->session->set_userdata('emis_school_udise',$schooldis);
      $schooludise1 =$this->session->userdata('emis_school_udise');
      if($schooludise1!=""){
        echo TRUE;
      }else{
        echo FALSE;
      }
 
      } else { redirect('Authentication/emis_login', 'refresh'); }

 }

  public function emis_district_schoolmainid(){
   $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
     $schooldis = $this->uri->segment(3,0);
     $schooludise = $this->uri->segment(4,0);
     $schooldetails = $this->Authmodel->getschooldetails($schooldis);
       $this->session->set_userdata('emis_school_id',$schooldis);
       $this->session->set_userdata('emis_school_udise',$schooludise);
       $this->session->set_userdata('emis_school_board',$schooldetails[0]->board);
     if(($schooldetails[0]->high_class)>=10){ $this->session->set_userdata('emis_school_highclass',TRUE);  }
      $schoolid =$this->session->userdata('emis_school_id');
      $school_udise =$this->session->userdata('emis_school_udise');
      if($schoolid!="" && $school_udise!=""){
       redirect('Home/emis_school_home','refresh');
        // echo $schoolid .' '.$school_udise;
      } 

      } else { redirect('Authentication/emis_login', 'refresh'); }

 }

 public function emis_districtchange_school(){
     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
       $this->session->unset_userdata('emis_school_id');
       $this->session->unset_userdata('emis_school_udise');

       redirect('District/emis_district_slelectschool','refresh');

      } else { redirect('Authentication/emis_login', 'refresh'); }
 }

 public function emis_district_findschoolbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $school_id = $this->input->post('emis_school_id');
      $district_id = $this->session->userdata('emis_district_id');
       $data['blocks']= $this->Datamodel->get_allblocks($district_id);  

       if($school_id!=""){
        $schoolprofile=$this->Districtmodel->get_school_by_id($school_id,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('district/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error1'] = "No school data found / Allow only within a district Schools"; 
          $this->load->view('district/emis_district_selectschool',$data);

        }
          


    }
    else
    {
          
          $this->load->view('district/emis_district_selectschool');

    }



  }else { redirect('Authentication/emis_login', 'refresh'); }
      

 }

 public function emis_district_findschoolbyudise(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $schooludise = $this->input->post('emis_school_udise');
      $district_id =$this->session->userdata('emis_district_id');
       $data['blocks']= $this->Datamodel->get_allblocks($district_id);  

       if($schooludise!=""){
        $schoolprofile=$this->Districtmodel->get_school_by_udise($schooludise,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('district/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error2'] = "No school data found<br/>Allow only within a district Schools";  
          $this->load->view('district/emis_district_selectschool',$data);

        }
          


    }}else { redirect('Authentication/emis_login', 'refresh'); }
        
    
  
 }

 public function emis_district_findschoolbyblock(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
 
      $schoolid = $this->input->post('emis_district_schoolsid');
      $district_id =$this->session->userdata('emis_district_id');
      $block_id =$this->input->post('emis_district_blockid');
      $data['blocks']= $this->Datamodel->get_allblocks($district_id);  
      
        $data['blocks']= $this->Datamodel->get_allblocks($district_id);
       if($schoolid!=""){
        $schoolprofile=$this->Districtmodel->get_school_by_block($schoolid,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('district/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error3'] = "No school data found<br/>Allow only within a district Schools"; 
          $this->load->view('district/emis_district_selectschool',$data);

        }
    }else{
      $data['error3'] = "No school data found ";
       $this->load->view('district/emis_district_selectschool',$data);
    }

    }else { redirect('Authentication/emis_login', 'refresh'); }
  
 }

   public function emis_district_saveschool_id(){
      $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $school_id = $this->input->post('emis_school_id');
      $school_id_set = $this->session->set_userdata('emis_school_id',$school_id);
      $school_id_1 =$this->session->userdata('emis_school_id');
      if($school_id_1!=""){
        echo TRUE;
      }else{
        echo FALSE;
      }
 
      } else { redirect('Authentication/emis_login', 'refresh'); }

 }


  public function getallschoolsformblock(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $emis_block =$this->input->post('blockid');
    $this->load->database(); 
    $this->load->model('Districtmodel');
    $getblocks  = $this->Districtmodel->getallschoolsbyblock($emis_block);
    $getblock='';  
        foreach($getblocks as $gb)
        {
            $getblock =$getblock."<option value='".$gb->school_id."'>".$gb->udise_code.' - '.$gb->school_name."</option>";  
        }
         $block    =  "<select  class='form-control' tabindex='1' id='emis_district_schoolsid' name='emis_district_schoolsid'>
                                 <option value='' style='color:#bfbfbf;'>Select School *</option>
                                ".$getblock."                           
                            </select> ";
                           
        echo $block; 

          } else { redirect('/', 'refresh'); }
  }

  public function emis_district_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==3){ 


      $this->load->view('district/emis_district_resetpassword');

      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $this->load->database(); 
     $this->load->model('Districtmodel');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Districtmodel->emis_district_resetpassword($district_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_district_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $district_id =$this->session->userdata('emis_district_id');
       $this->load->database(); 
       $this->load->model('Districtmodel');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Districtmodel->getoldpassdistrict($district_id,$username);
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



  //Report

    public function emis_district_student_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassblockreport($district_id);
    $data['distname'] = $this->Districtmodel->getsingledistname($district_id);
    $this->load->view('district/emis_district_report',$data);
    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_blocks_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Statemodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Districtmodel->getalldistrictcountsbyclassschoolreport($block_id);
    $data['blockname'] = $this->Districtmodel->getsingleblockname($block_id);
   $this->load->view('district/emis_district_schoolwise_reports',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

  public function emis_district_classwise_reports()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_districtschool_id');
    $this->load->database();
    $this->load->model('Districtmodel');

    $schoolprofile = $this->Districtmodel->getschoolprofiledetails($school_id);
    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Statemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Statemodel->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('district/emis_district_report_schoolsingle',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

   public function emis_district_report_studentsall()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_districtschool_id');
    $class_id =$this->session->userdata('emis_districtclass_id');
    $this->load->database();
    $this->load->model('Districtmodel');

    $data['details'] = $this->Districtmodel->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Districtmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Districtmodel->getsingleclassname($class_id);
    $this->load->view('district/emis_district_report_studentsall',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

  

    public function emis_district_request_schoollist()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $date_select = date("Y-m-d", strtotime('-3 days') );  
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Districtmodel->requesteddatacountschoolwise($district_id,$date_select);
    $data['distname'] = $this->Districtmodel->getsingledistname($district_id);

  
    // echo var_dump($data);

   $this->load->view('district/emis_schools_transferrequest1',$data);
    } else { redirect('/', 'refresh'); }

    }


    public function emis_district_request_studentlist()
    {

      $schooludise = $this->uri->segment(3,0);
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $date_select = date("Y-m-d", strtotime('-3 days') );  
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Districtmodel->requesteddatacountstudentlist($district_id,$date_select,$schooludise);
    $data['distname'] = $this->Districtmodel->getsingledistname($district_id);
    $data['schooludise'] = $schooludise;
    // echo var_dump($data);

   $this->load->view('district/emis_schools_transferrequest2',$data);
    } else { redirect('/', 'refresh'); }

    }

     public function emis_student_aadhaar_dist()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $dist_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');

    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockaadhaar1($dist_id,$manage);
    }else{
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockaadhaar($dist_id);
    }
  
    $data['distname'] = $this->Statemodel->getsingledistname($dist_id);
   $this->load->view('district/emis_stu_aadhaar_report_dist',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

       public function emis_student_aadhaar_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
     $dist_id=$this->session->userdata('emis_district_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Statemodel');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar1($block_id,$manage);
    }else{
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
   $this->load->view('district/emis_stu_aadhaar_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

     public function emis_student_report_district()
  {
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session');
    $dist_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockreport1($dist_id,$manage);
    }else{
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockreport($dist_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Statemodel->getsingledistname($dist_id);
   $this->load->view('district/emis_district_report_dist',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

       public function emis_student_report_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $dist_id=$this->session->userdata('emis_district_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Statemodel');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport1($block_id,$manage);
    }else{
   $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
   $this->load->view('district/emis_district_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

     public function emis_student_report_school()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $dist_id=$this->session->userdata('emis_district_id');
    $school_id =$this->session->userdata('emis_districtschool_id');
    $this->load->database();
    $this->load->model('Statemodel');

    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 

    $schoolprofile = $this->Statemodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);


     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Statemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Statemodel->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('district/emis_district_report_school',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

      public function emis_student_classwise_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $dist_id=$this->session->userdata('emis_district_id');
    $school_id =$this->session->userdata('emis_districtschool_id');
    $class_id =$this->session->userdata('emis_districtclass_id');
    $this->load->database();
    $this->load->model('Statemodel');

    $data['details'] = $this->Statemodel->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Statemodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Statemodel->getsingleclassname($class_id);
    $this->load->view('district/emis_district_report_class',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }




  // Function for the Staff transfer module
  public function emis_tech_transfer(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session');
    $dist_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Statemodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['get_dist_dtls'] = $this->Districtmodel->get_dist_details();
    $this->load->view('district/emis_tech_trans',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }

    
  }

  public function get_dist($distval){
    $get_block = $this->Districtmodel->get_block($distval);

    if ($get_block) {
      $mydata = '';
      $mydata = $mydata.'<option value="">Select the Block</option>';
      foreach ($get_block as $blck) {
          $mydata = $mydata.'
          <option value="'.$blck->id.'">'.$blck->block_name.'</option>
          ';
      }
      echo $mydata;
    }

  }


public function get_schol($blck_id){
  // echo $blck_id;

  $get_school = $this->Districtmodel->get_school_rc($blck_id);
    
    if (isset($get_school)) {
      $school_dta = '';
      $school_dta = $school_dta.'<option value="">Select the school</option>';
      foreach ($get_school as $schl_md) {
          $school_dta = $school_dta.'
            
            <option value="'.$schl_md->udise_code.'">'.$schl_md->school_name.'-'.$schl_md->udise_code.'</option>
          ';
      }
      echo $school_dta;
    }

}


public function tech_cat_only($schl_id){

$get_typ_techr = $this->Districtmodel->get_type_tchr($schl_id);

  if ($get_typ_techr) {
      $tchr_dtls = '';
      $tchr_dtls = $tchr_dtls.'<option value="">Select the Type of Teacher</option>';
      foreach ($get_typ_techr as $schl_type_tchers) {
    if ($schl_type_tchers->teacher_type!="" && $schl_type_tchers->teacher_type!="0") {
        $get_my_cat = $this->Districtmodel->get_cat_cond($schl_type_tchers->teacher_type);

     if ($get_my_cat) {
       foreach ($get_my_cat as $catg) {
         $catgory =  $catg->post;
       }
     }else
        {
          $catgory = "";
        }
         
          $tchr_dtls = $tchr_dtls.'
            <option value="'.$schl_type_tchers->teacher_type.'-'.$schl_id.'">'.$catgory.'</option>
          ';
        }
          
      }
      echo $tchr_dtls;
    }  

}

public function get_desig($desig_id){
     $schl_id = explode("-", $desig_id);

     $desig_id = $schl_id[0];

     $get_my_cat = $this->Districtmodel->get_cat_cond($desig_id);

     if ($get_my_cat) {
       foreach ($get_my_cat as $catg) {
         echo $catg->post;
       }
     }


     // if ($desig_id=="1")
     //    {
     //      echo "Head Teacher";
     //    }elseif ($desig_id=="2")
     //    {
     //      echo "Acting Head Teacher";
     //    }elseif ($desig_id=="3")
     //    {
     //      echo "Teacher";
     //    }elseif ($desig_id=="5")
     //    {
     //      echo "Instructor Positioned as per RTE";
     //    }elseif ($desig_id=="7")
     //    {
     //      echo "Principal";
     //    }elseif ($desig_id=="8")
     //    {
     //      echo "Lecturer";
     //    }else
     //    {
     //      echo "";
     //    }

}


public function get_tchr($schl_id){

  $schl_id = explode("-", $schl_id);

  $tech_code = $schl_id[0];
  $school_id = $schl_id[1];


  $get_techr = $this->Districtmodel->get_tchr($school_id,$tech_code);

  if ($get_techr) {
      $tchr_dtls = '';
      $tchr_dtls = $tchr_dtls.'<option value="">Select the Teacher</option>';
      foreach ($get_techr as $schl_tchers) {
          $tchr_dtls = $tchr_dtls.'
            <option value="'.$schl_tchers->u_id.'">'.$schl_tchers->teacher_name.'</option>
          ';
      }
      echo $tchr_dtls;
    }  

}



public function get_dist_nme($dist_id){

  $get_distnme_only = $this->Districtmodel->get_dist($dist_id);

  if ($get_distnme_only) {
      $get_dist_name = '';
      foreach ($get_distnme_only as $dist_nme) {
          $get_dist_name = $dist_nme->district_name;
      }
      echo $get_dist_name;
    }


}




public function get_nme_only($tech_id){

  $get_technme_only = $this->Districtmodel->get_technme($tech_id);

  if ($get_technme_only) {
      $get_tech_name = '';
      foreach ($get_technme_only as $tech_nme) {
          $get_tech_name = $get_tech_name.'
            '.$tech_nme->teacher_name.'
          ';
      }
      echo $get_tech_name;
    }

}


public function get_block_dtls($blck_id_only){

  $get_school = $this->Districtmodel->get_school_rc($blck_id_only);

    if ($get_school) {
      $school_dta = ''; 
      $school_dta = $school_dta.'<option value="">Select the school</option>';
      foreach ($get_school as $schl_md) {
          $school_dta = $school_dta.'
          <option value="'.$schl_md->udise_code.'">'.$schl_md->school_name.'-'.$schl_md->udise_code.'</option>
          ';
      }
      echo $school_dta;
    }

}



// staff transfer data

function emis_staff_trans(){

    $this->load->library('session');
    // echo "Staff transfered";
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    // $date = date('Y-m-d');
    // $time = date('h:i:s');
    // $datetime = $date." ".$time;
    // $acadeye=date('M Y');

    //   $academic_year="";
    //   $month=date('m');
    //   $year = date('Y');
    //   if($month<=4){
    //     $academic_year=$year-1;
    //   }else{
    //     $academic_year=$year;
    //   }
    //   $this->load->library('session'); 
    //   // $studentid = $this->session->userdata('emis_stud_id');
    //   $studentid = $this->input->post('stud_id');
    //   $school_id=$this->session->userdata('emis_school_id');
    //   $this->load->database();
    //   $this->load->model('Homemodel');
    //   $this->load->model('Registermodel');

      // $studentdetails=1;
    //   $data=array('unique_id_no'=>$studentid,
    //               'school_id'=>$studentdetails[0]->school_id,
    //               'class_studying_id'=>$studentdetails[0]->class_studying_id,
    //               'process_type'=>'transfer',
    //               'admission_no'=>$studentdetails[0]->school_admission_no,
    //               'medium_of_ins'=>$studentdetails[0]->education_medium_id,
    //               'academic_year'=>$academic_year,
    //               'transfer_date'=>$date,
    //               'Status'=>'Active');
    //   $this->Homemodel->emisaddstutransferhistory($data);
    //   $this->Homemodel->emischangestudentflag($studentid,$date);
      // echo json_encode($studentdetails);
        echo true;
        redirect('District/emis_tech_transfer', 'refresh');
      } else { redirect('/', 'refresh'); }

     }




public function get_schl_keyval($udise_cde){

   $get_school_key = $this->Districtmodel->get_school_keyval($udise_cde);
   //echo '<pre>';  print_r($get_school_key); echo '</pre>';
    if ($get_school_key)
    {
      foreach($get_school_key as $schooldata){
        echo $schooldata['school_id'];
      }
      // foreach ($get_school_key as $schl_id_only)
      // {
      //     $schl_keydta = str_replace(" ","",$schl_id_only->school_id);
      // }
      // echo $schl_keydta;
    }

}



public function proced(){

   $this->load->library('session');
    // echo "Staff transfered";
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

  date_default_timezone_set('Asia/Kolkata');

  $old_udise  = $this->input->post('t_school');
  $new_udise  = $this->input->post('next_school');
  $old_key_id = $this->input->post('old_key_id');
  $school_key = $this->input->post('school_key');
  $category   = $this->input->post('t_cat');
  $remarks    = $this->input->post('t_remark');
  $upd_id     = $this->input->post('t_name');
  $trans_date = $this->input->post('trans_date');
  $trans_month = $this->input->post('trans_month');
  $trans_year = $this->input->post('trans_year');
  $techtype = $this->input->post('techtype');
  $techtype1 = $this->input->post('techtype1');
  // echo $school_key.'=>'.$old_key_id;

  // exit;


  $school_key  = trim($school_key);
  $old_key_id  = trim($old_key_id);
  // // $udise_code = str_replace(' ','',$udise_code);
  // // $school_key = str_replace(' ','',$school_key);
  // print_r($school_key);


  // print_r($_POST);

  $trans_date = $trans_year.'-'.$trans_month.'-'.$trans_date;

  $data = array(
    'udise_code'     => $new_udise,
    'school_key_id'  => $school_key,
    'trans_category' => $category,
    'trans_remarks'  => $remarks,
    'trans_date'     => $trans_date,
    );

  $ins = array(
    'from_schl'        => $old_udise,
    'from_schl_keyid'  => $old_key_id,
    'to_schl'          => $new_udise,
    'to_schl_keyid'    => $school_key,
    'staff_id'         => $upd_id,
    'transferer_id'    => $this->session->userdata('emis_user_sno'),
    'trans_date'       => $trans_date,
    'user_type_id'     => $this->session->userdata('emis_user_type_id'),
    'createdat'        => date('Y-m-d h:m:i'),
	'from_teachertype' => $techtype,
	'to_teachertype'  => $techtype1
    );

  $ins_his = $this->Districtmodel->ins_staf_history($ins);


  $update_staff_dtls = $this->Districtmodel->update_staff_details($data,$upd_id);

  if ($update_staff_dtls) {
    echo true;
  }
  } else { redirect('/', 'refresh'); }

}


public function school_key($udise){

  $get_school_key = $this->Districtmodel->get_school_keyval($udise);
   //echo '<pre>';  print_r($get_school_key); echo '</pre>';
    if ($get_school_key)
    {
      foreach($get_school_key as $schooldata){
        echo $schooldata['school_id'];
      }

}
}

public function emis_teacher_transfer_form(){
  $teacher_id = $this->uri->segment(3,0);
  $data['details']=$this->Districtmodel->get_techerdetails($teacher_id);
  
  $this->load->view('district/emis_district_teacher_form',$data);
}

 public function get_school_management_data(){
    $getschooltype = $this->input->post('emis_district_report_schcate');
    $schoolmang = $this->Statemodel->get_school_management_data($getschooltype);
    $td_first="<option value='' style='color:#bfbfbf;'>Select Category </option>";
    $td_data=""; $td_set="";
    foreach($schoolmang as $schoolmang){
      $td_set=$td_set."<option value='".$schoolmang->id."'>".$schoolmang->management."</option>";
    }
    $td_data=$td_first.$td_set; 
    echo $td_data;
  }

  public function savereport_schoolcatemanage(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $cate = $this->input->post('cate');
       $manage = $this->input->post('manage');
     if($cate!="" ||  $manage!="" ){
          $this->session->set_userdata('emis_districtreport_schmanage',$manage);
      }
      $manage =$this->session->userdata('emis_districtreport_schmanage');
      if($manage!=""){
        echo true;
      }else{
        echo false;
      }
          } else { redirect('/', 'refresh'); }
  }

  public function deletereport_schoolcatemanage(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $this->session->unset_userdata('emis_districtreport_schmanage');
     echo true;
          } else { redirect('/', 'refresh'); }
  }
  
  
  
  
  /* created by venba Tamilmaran for listing the school*/
	public function emis_district_schools_list()
  {
	$schoolcategory=$this->input->post('schoolcat');
    $district_id =$this->session->userdata('emis_district_id');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) {
		if($schoolcategory!='')
		{
			 $data['schoollist'] = $this->Districtmodel->get_school_list_district_cate($district_id,$schoolcategory);
		}
	  
       else
	    {
	    $data['schoollist'] = $this->Districtmodel->get_school_list_district($district_id);
	    }
	   $data['schoolcate']= $this->Datamodel->get_allmajorcategory(); 
       $this->load->view('district/emis_district_schoollist',$data);
    
   }
   else { redirect('/', 'refresh'); }
  }  
/* End of the function */

/* created by venba Tamilmaran for Update the school*/
    public function emis_district_schools_update()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $school_id =$this->input->post('records[schoolid]');
	 $now = date('Y-m-d H:i:s');
	 $data = array(			
	       'school_name' => $this->input->post('records[schoolname]'),
		   'mobile'=> $this->input->post('records[schoolcontact]'),
		   'sch_email'=> $this->input->post('records[schoolmail]'),
		   //'address'=>$this->input->post('records[schooladdress]'),
		   'manage_cate_id'=>$this->input->post('records[schooleditcate]'),
           'modified_date'=>$this->input->post('$now')
            
            );
			 $result = $this->Districtmodel->update_school_district_data($school_id,$data);
			 echo $result; 
		 }
		 else { redirect('/', 'refresh'); }	
     
    
   }
    
/* End of the function */
  
  
  
}?>