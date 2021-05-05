<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Block extends CI_Controller {

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
    $this->load->model('Datamodel');
    $this->load->model('Authmodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
    $this->load->model('Blockmodel');
    $this->load->library('AWS_S3');
    $this->load->helper('common_helper'); 
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

  

 public function emis_block_analytics_schools()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Blockmodel');
    $data['blockname'] = $this->Blockmodel->getsingleblockname($block_id);
    $data['details'] = $this->Blockmodel->getallblockcountsbyschool($block_id);
    $this->load->view('block/emis_block_analytics_school',$data);

     } else { redirect('/', 'refresh'); }
    // echo json_encode($data[' details']);
  }

public function emis_block_student_gender()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $block_id=$this->session->userdata('emis_block_id');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_blockreport_schmanage');  
    if($manage!=""){ 
     $data['result1'] = $this->Blockmodel->getallgenderbydistrict1($block_id,$manage);
    }else{
     $data['result1'] = $this->Blockmodel->getallgenderbydistrict($block_id);
    }
    $data['distname'] = $this->Blockmodel->getsingledistname($block_id);

    $this->load->view('block/emis_block_genderwise',$data);
    // echo json_encode($data);
    } else { redirect('/', 'refresh'); }
  }


 public function emis_block_community_schools()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $community =  $this->session->userdata('emis_community');
    if($community==""){
    $this->session->set_userdata('emis_community','C1');
    }
    $community =  $this->session->userdata('emis_community');
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Blockmodel');
    $data['communityid'] = $community;
    $data['blockname'] = $this->Blockmodel->getsingleblockname($block_id);
    $data['details'] = $this->Blockmodel->getallblockkkcountsbyclassschool($block_id,$community);
    $this->load->view('block/emis_block_community_schools',$data);
    // echo json_encode($data[' details']);

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


  public function emis_block_blocks_classwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Blockmodel');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_blockreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Blockmodel->getalldistrictcountsbyclassschool1($block_id,$manage);
    }else{
    $data['details'] = $this->Blockmodel->getalldistrictcountsbyclassschool($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['blockname'] = $this->Blockmodel->getsingleblockname($block_id);
   $this->load->view('block/emis_block_schoolwise_analytics',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

    public function saveschoolidsession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $school_ids = $this->input->post('school_id');
     if($school_ids!="" ){
          $this->session->set_userdata('emis_blockschool_id',$school_ids);
      }
      $school_id =$this->session->userdata('emis_blockschool_id');
      if($school_id!=""){
        echo true;
      }else{
        echo false;
      }
          } else { redirect('/', 'refresh'); }
  }


  public function emis_block_classwise_analytics()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_blockschool_id');
    $this->load->database();
    $this->load->model('Homemodel');
     $this->load->model('Homemodel');
    $schoolprofile = $this->Blockmodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['details'] = $this->Blockmodel->getallbrachesbyschool($school_id);


     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']         = $standardlist[0]->low_class;
     $data['highclass']        = $standardlist[0]->high_class;
     $data['allclass']         = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1($school_id));
 

    $this->load->view('block/emis_block_schoolsingle',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }


     public function emis_block_classwise_studentsall()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $school_id =$this->session->userdata('emis_blockschool_id');
    $class_id =$this->session->userdata('emis_blockclass_id');
    $this->load->database();
    $this->load->model('Blockmodel');

    $data['details'] = $this->Blockmodel->getallstudentsbyschid($school_id,$class_id);
    $data['school_name'] = $this->Blockmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Blockmodel->getsingleclassname($class_id);
    $this->load->view('block/emis_block_studentsall',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }



  public function saveclassidsession(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
     // $class_ids = $this->input->post('class_id');
      $class_ids = $this->uri->segment(3,0);
     if($class_ids!="" ){
          $this->session->set_userdata('emis_blockclass_id',$class_ids);
      }
      $class_id =$this->session->userdata('emis_blockclass_id');
    
    redirect('Block/emis_block_classwise_studentsall', 'refresh');
      // $this->load->view('block/emis_block_classwise_studentsall');

      // if($class_id!=""){
      //   echo true;
      // }else{
      //   echo false;
      // }
          } else { redirect('/', 'refresh'); }
  }



  public function emis_block_slelectschool(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $block_id = $this->session->userdata('emis_block_id');
      $data['schools']= $this->Datamodel->get_allschooolsbyblock($block_id);  
          $this->load->view('block/emis_block_selectschool',$data);     
     } else { redirect('/', 'refresh'); }
  }



   public function emis_block_findschoolbyudise(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $schooludise = $this->input->post('emis_school_udise');
      $block_id = $this->session->userdata('emis_block_id');
       $data['schools']= $this->Datamodel->get_allschooolsbyblock($block_id);  

       if($schooludise!=""){
        $schoolprofile=$this->Blockmodel->get_school_by_udise($schooludise,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('block/emis_block_selectschool',$data); 
        
         }
         else
        {
          $data['error2'] = "No school data found<br/>Allow only within a block Schools";  
           $this->load->view('block/emis_block_selectschool',$data); 

        }
          
    }}else { redirect('Authentication/emis_login', 'refresh'); }
        
 }


 public function emis_block_findschoolbyblock(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
 
      $schoolid = $this->input->post('emis_block_schoolsid');
     $block_id = $this->session->userdata('emis_block_id');
       $data['schools']= $this->Datamodel->get_allschooolsbyblock($block_id);  
      
       if($schoolid!=""){
        $schoolprofile=$this->Blockmodel->get_school_by_block($schoolid,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('block/emis_block_selectschool',$data); 
        
         }
         else
        {
          $data['error3'] = "No school data found<br/>Allow only within a district Schools"; 
          $this->load->view('block/emis_block_selectschool',$data); 

        }
    }else{
      $data['error3'] = "No school data found ";
       $this->load->view('block/emis_block_selectschool',$data); 
    }

    }else { redirect('Authentication/emis_login', 'refresh'); }
  
 }


   public function emis_block_schoolmainid(){
   $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
     $schooldis = $this->uri->segment(3,0);
     $schooludise = $this->uri->segment(4,0);
     $schooldetails = $this->Authmodel->getschooldetails($schooldis);
       $this->session->set_userdata('emis_school_id',$schooldis);
       $this->session->set_userdata('emis_school_udise',$schooludise);
       $this->session->set_userdata('emis_school_board',$schooldetails[0]->board);
       $this->session->set_userdata('emis_school_district',$schooldetails[0]->district_id); 
     if(($schooldetails[0]->high_class)>=10){ $this->session->set_userdata('emis_school_highclass',TRUE);  }
      $schoolid =$this->session->userdata('emis_school_id');
      $school_udise =$this->session->userdata('emis_school_udise');
      if($schoolid!="" && $school_udise!=""){
       redirect('Home/emis_school_home','refresh');
        // echo $schoolid .' '.$school_udise.' '.$schooldetails[0]->board.' '.$schooldetails[0]->district_id;
      } 

      } else { redirect('Authentication/emis_login', 'refresh'); }

 }


  public function emis_blockchange_school(){
     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
       $this->session->unset_userdata('emis_school_id');
       $this->session->unset_userdata('emis_school_udise');

       redirect('block/emis_block_slelectschool','refresh');

      } else { redirect('Authentication/emis_login', 'refresh'); }
 }


   public function emis_block_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==2){ 


      $this->load->view('block/emis_block_resetpassword');

      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }

  public function emis_block_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $block_id = $this->session->userdata('emis_block_id');
     $this->load->database(); 
      $this->load->model('Blockmodel');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Blockmodel->emis_block_resetpassword($block_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_block_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $block_id = $this->session->userdata('emis_block_id');
       $this->load->database(); 
       $this->load->model('Blockmodel');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Blockmodel->getoldpassblock($block_id,$username);
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

      public function emis_student_aadhaar_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Statemodel');
     $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_blockreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar1($block_id,$manage);
    }else{
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
   $this->load->view('block/emis_stu_aadhaar_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

         public function emis_student_report_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Statemodel');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $manage =$this->session->userdata('emis_blockreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport1($block_id,$manage);
    }else{
    $data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
   $this->load->view('block/emis_block_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

       public function emis_student_report_school()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $dist_id=$this->session->userdata('emis_block_id');
    $school_id =$this->session->userdata('emis_blockschool_id');
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
    $this->load->view('block/emis_block_report_school',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

        public function emis_student_classwise_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $dist_id=$this->session->userdata('emis_block_id');
    $school_id =$this->session->userdata('emis_blockschool_id');
    $class_id =$this->session->userdata('emis_blockclass_id');
    $this->load->database();
    $this->load->model('Statemodel');

    $data['details'] = $this->Statemodel->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Statemodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Statemodel->getsingleclassname($class_id);
    $this->load->view('block/emis_block_report_class',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

   public function get_school_management_data(){
    $getschooltype = $this->input->post('emis_block_report_schcate');
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
          $this->session->set_userdata('emis_blockreport_schmanage',$manage);
      }
      $manage =$this->session->userdata('emis_blockreport_schmanage');
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
     $this->session->unset_userdata('emis_blockreport_schmanage');
     echo true;
          } else { redirect('/', 'refresh'); }
  }
  
  /*************************
  Tamil
  *************************/
  public function emis_block_schools_verification()
  {
  	$this->load->library('session');
	    $block_id =$this->session->userdata('emis_block_id');
		$get_block_name = $this->Blockmodel->get_block_name($block_id);

		$block_name=$get_block_name->block_name; 		
		$emis_loggedin = $this->session->userdata('emis_loggedin');
       
		if($emis_loggedin) {
        
  		$data['schoollist'] = $this->Blockmodel->get_blockwise_school($block_name);
		
  		$this->load->view('block/emis_block_school_verified',$data);
  		} else { redirect('/', 'refresh'); }
  }
  public function emis_block_verification()
  {
	
	$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
		
		
	    $udise_code =$this->input->post('records[udise_code]'); 
       	$curr_timestamp = date('Y-m-d H:i:s');
		$status=1;
	    $data = array(
           
           'verification_date' => $curr_timestamp,
           'verification_status' => $status
                    );
	   $result = $this->Blockmodel->verification_status($udise_code,$data);
	   echo $result; 
		 }
		 else { redirect('/', 'refresh'); }	
  }

/**************************************************************************************************************************
                            Functions Included By Vivek Rao - Ramco Cements Limited
***************************************************************************************************************************/    
    public function emis_block_home()
    {
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $block_id = $this->session->userdata('emis_block_id');

     $get_block_name = $this->Blockmodel->get_block_name($block_id);

      $block_name=$get_block_name->block_name;
      
      $block_details = $this->Blockmodel->get_block_name($block_id);
      $data['total_count_details'] = $this->Blockmodel->get_block_school_student_teacher_total($block_details->block_name);
      $data['Govt_detail']=$this->Blockmodel->govt_enrollment($block_id);
     // print_r( $data['total_count_details']);die;
      $data['renewal_details'] = $this->Blockmodel->get_state_renewal_details($block_id);
     // print_r($data['renewal_details']);
      $school_details = $this->Blockmodel->get_block_school_type_based_schoolinfo($block_details->block_name);
      $data['school_type'] = $school_details['result'];
      $data['school_based_count_details'] = $school_details['school_info'];
      
      
      //Vivek Rao...
      $where = ' AND students_school_child_count.block_id='.$block_id;
      //$data['freeschemes']=$this->Statemodel->getFreeSchemeGeneral($where);
       $user_type = $this->session->userdata('emis_user_type_id');
       // print_r($this->session->userdata());
      $data['reports_csv'] = $this->Blockmodel->get_districtwise_report($user_type);
      $this->load->view('block/emis_block_home',$data);
    } else { redirect('/', 'refresh'); }
    }
    
    public function viewBlockLevelTrainer(){
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) {
            $block_id = $this->session->userdata('emis_block_id');
            $data['schools']= $this->Datamodel->get_allschooolsbyblock($block_id);  
            $this->load->view('block/emis_block_trainer',$data);     
        } else { redirect('/', 'refresh'); }
    }
    
    public function getClassesbySchoolHTML(){
        $school_id = $this->input->post('emis_block_schoolsid');
        $this->load->model('Homemodel');
        $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
        
        $low=$standardlist[0]->low_class;
        $high=$standardlist[0]->high_class;
        $td_first="<option value='' style='color:#bfbfbf;'>Select Class </option>";
        $td_data=""; $td_set="";
        for($i=$low; $i<=$high; $i++){
            $td_set=$td_set."<option value='".$i."'>".$i."</option>";
        }
        $td_data=$td_first.$td_set; 
		echo $td_data;
    }
    
    public function getAllSectionByClassHTML(){
        $school_id = $this->input->post('emis_block_schoolsid');
        $class_id = $this->input->post('emis_block_schoolsclassid');
        $this->load->model('Homemodel');
        $standardlist  = $this->Homemodel->getallsectionsbyclass($school_id,$class_id);
        $standardlist=explode(",",$standardlist);
        $td_first="<option value='' style='color:#bfbfbf;'>Select Class </option>";
        $td_data=""; $td_set="";
        foreach($standardlist as $section){
            $td_set=$td_set."<option value='".$section."'>".$section."</option>";
            //echo($key);
        }
        $td_data=$td_first.$td_set; 
		echo $td_data;
        
        //print_r($standardlist);
    }
    
    public function getAllStudentsByClassAndSection(){
        $school_id = $this->input->post('emis_block_schoolsid');
        $class_id = $this->input->post('emis_block_schoolsclassid');
        $section_id = $this->input->post('emis_block_schoolsclasssectionid');
        $this->load->model('Homemodel');
        $allStudents = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
        //print_r($allStudents);
        $html='';$i=1;
        foreach($allStudents as $stu){
            $html.='<tr id="'.$stu->unique_id_no.'">
                        <th>'.($i).'</th>
                        <th>'.$stu->unique_id_no.'</th>
                        <th>'.$stu->name.'</th>
                        <th>'.$stu->class_studying_id.'</th>
                        <th>'.$stu->class_section.'</th>
                        <th><input type="text" id="reading_tamil_'.$stu->unique_id_no.'" name="reading_tamil_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-D]{1}" /></th>                                                         
                        <th><input type="text" id="reading_english_'.$stu->unique_id_no.'" name="reading_english_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-D]{1}" /></th>
                        <th><input type="text" id="writing_tamil_'.$stu->unique_id_no.'" name="writing_tamil_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-D]{1}"/></th>
                        <th><input type="text" id="writing_english_'.$stu->unique_id_no.'" name="writing_english_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-D]{1}"/></th>
                        <th><input type="text" id="apptitude_'.$stu->unique_id_no.'" name="apptitude_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-C]{1}"/></th>
                        <th><input type="text" id="functional_'.$stu->unique_id_no.'" name="function_'.$stu->unique_id_no.'" required="required" style="width:90%;" pattern="[A-C]{1}"/></th>
                        <th><input type="submit" id="rowUpdate_'.$stu->unique_id_no.'" name="rowUpdate_'.$stu->unique_id_no.'"  value="Save" onclick="rowUpdate(this.id,'.($i++).')"/></th>
                    </tr>';
        }
        echo($html);
    }
    
    public function updateTrainingRecord(){
        $uniqId=$this->uri->segment(3,0);
        $html='';
        $reading_tamil = $this->input->post('reading_tamil');
        $reading_english = $this->input->post('reading_english');
        $writing_tamil = $this->input->post('writing_tamil');
        $writing_english = $this->input->post('writing_english');
        $apptitude = $this->input->post('apptitude');
        $functional = $this->input->post('functional');
        $sno =$this->input->post('sno');
        
        $arr['uniqueId']=$uniqId;
        $arr['reading_tamil']=$reading_tamil;
        $arr['reading_english']=$reading_english;
        $arr['writing_tamil']=$writing_tamil;
        $arr['writing_english']=$writing_english;
        $arr['apptitude']=$apptitude;
        $arr['functional']=$functional;
        
        //print_r($arr);
        $this->load->model('Homemodel');
        $stuprofile1  = $this->Homemodel->getstuprofile1($uniqId);
         $html.='<th>'.$sno.'</th>
                 <th>'.$stuprofile1[0]->unique_id_no.'</th>
                 <th>'.$stuprofile1[0]->name.'</th>
                 <th>'.$stuprofile1[0]->class_studying_id.'</th>
                 <th>'.$stuprofile1[0]->class_section.'</th>
                 <th>'.$reading_tamil.'</th>                                                         
                 <th>'.$reading_english.'</th>
                 <th>'.$writing_tamil.'</th>
                 <th>'.$writing_english.'</th>
                 <th>'.$apptitude.'</th>
                 <th>'.$functional.'</th>
                 <th><input type="button" id="rowEdit_'.$stuprofile1[0]->unique_id_no.'" name="rowEdit_'.$stuprofile1[0]->unique_id_no.'"  value="Edit" onclick="rowEdit(this.id)" /></th>';
         echo($html);
         //print_r($stuprofile1);
    }
    
    public function updateEditedRecord(){
        $uniqId=$this->uri->segment(3,0);
        $html='';
        $reading_tamil = $this->input->post('reading_tamil');
        $reading_english = $this->input->post('reading_english');
        $writing_tamil = $this->input->post('writing_tamil');
        $writing_english = $this->input->post('writing_english');
        $apptitude = $this->input->post('apptitude');
        $functional = $this->input->post('functional');
        $sno =$this->input->post('sno');
        
        $arr['uniqueId']=$uniqId;
        $arr['reading_tamil']=$reading_tamil;
        $arr['reading_english']=$reading_english;
        $arr['writing_tamil']=$writing_tamil;
        $arr['writing_english']=$writing_english;
        $arr['apptitude']=$apptitude;
        $arr['functional']=$functional;
        
        //print_r($arr);
        $this->load->model('Homemodel');
        $stuprofile1  = $this->Homemodel->getstuprofile1($uniqId);
         $html.='<th>'.$sno.'</th>
                 <th>'.$stuprofile1[0]->unique_id_no.'</th>
                 <th>'.$stuprofile1[0]->name.'</th>
                 <th>'.$stuprofile1[0]->class_studying_id.'</th>
                 <th>'.$stuprofile1[0]->class_section.'</th>
                 <th>'.$reading_tamil.'</th>                                                         
                 <th>'.$reading_english.'</th>
                 <th>'.$writing_tamil.'</th>
                 <th>'.$writing_english.'</th>
                 <th>'.$apptitude.'</th>
                 <th>'.$functional.'</th>
                 <th><input type="button" id="rowEdit_'.$stuprofile1[0]->unique_id_no.'" name="rowEdit_'.$stuprofile1[0]->unique_id_no.'"  value="Edit" onclick="rowEdit(this.id)" /></th>';
         echo($html);
         //print_r($stuprofile1);
    }
    
    function emis_block_view_segment(){
        $data['cat']=$this->uri->segment(3,0);
        $data['mag_cat']=$this->uri->segment(4,0);
        $block_id = $this->session->userdata('emis_block_id');
        $data['count']=$this->Blockmodel->getSchoolandCountStudentsByCategoryInBlock($data['mag_cat'],$block_id);
        $this->load->view('block/emis_block_view_segment',$data);
    }
    
    function BlockStudentDetail(){
        $school_id = $this->input->post('emis_block_schoolsid');
        $class_id = $this->input->post('emis_block_schoolsclassid');
        $section_id = $this->input->post('emis_block_schoolsclasssectionid');
        $this->load->model('Homemodel');
        $allStudents = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
        //print_r($allStudents);
        $html='<thead><tr><th>Unique ID</th><th>Admission #</th><th>Name</th>           
                <th>Gender</th><th>DOB</th><th> Class</th><th> Section </th>
				<th> Group Code </th><th> Social Category </th></tr></thead><tbody>';
        foreach($allStudents as $stu){
            if($stu->gender==1) { $gender= "Male"; } elseif($stu->gender==2) { $gender= "Female"; } elseif($stu->gender==3) { $gender= "Transgender"; }
            $this->db->select('*'); 
            $this->db->from('baseapp_group_code');
            $this->db->where('id', $stu->group_code_id);
            $query =  $this->db->get();
            $group=$query->row('group_code');
            $this->db->select('*'); 
            $this->db->from('baseapp_community');
            $this->db->where('id', $stu->community_id);
            $query =  $this->db->get();
            $commm=$query->row('community_name');
            $html.='<tr id="'.$stu->unique_id_no.'">
                        <th><a href="'.base_url().'Home/emis_student_profile/'.$stu->unique_id_no.'" target="_blank">'.$stu->unique_id_no.'</th>
                        <th>'.$stu->school_admission_no.'</th>
                        <th>'.$stu->name.'</th>
                        <th>'.$gender.'</th>
                        <th>'.$stu->dob.'</th>
                        <th>'.$stu->class_studying_id.'</th>
                        <th>'.$stu->class_section.'</th>
                        <th>'.$group.'</th>
                        <th>'.$commm.'</th>
                    </tr>';
        }
        echo($html."</tbody>");
    }
    
    public function SchemeStudentsByClassAndSection(){
        $school_id = $this->input->post('emis_block_schoolsid');
        $class_id = $this->input->post('emis_block_schoolsclassid');
        $section_id = $this->input->post('emis_block_schoolsclasssectionid');
        $this->load->model('Homemodel');
        $allStudents = $this->Homemodel->getallstudsbyclsec($school_id,$class_id,$section_id);
        //print_r($allStudents);
        $html='';$i=1;
        foreach($allStudents as $stu){
            $html.='<tr id="'.$stu->unique_id_no.'">
                        <th>'.($i).'</th>
                        <th>'.$stu->unique_id_no.'</th>
                        <th>'.$stu->name.'</th>
                        <th>'.$stu->class_studying_id.' - '.$stu->class_section.'</th>
                    </tr>';
        }
        echo($html);
    }
    
   function viewRenewalSchoolList() {
        if($this->session->userdata('emis_district_id')!=''){
            $dist=$this->session->userdata('emis_district_id');
            //AND schoolnew_renewal.vaild_upto IS NULL
            $where=" AND sch_directorate_id IN (15,17,19,20,21,22,23,24,26,28,31,33) AND schoolnew_district.id=".$dist;
            $data['alllist'] = $this->Blockmodel->getallrenewallist($where);
            $data['user']=$this->session->userdata('usertype1')==2?3:2;
            //print_r($data);
            //die;
            $this->load->view('ceo/renewallist',$data);
        }
        elseif($this->session->userdata('emis_deo_id')!=''){
            $dist=$this->session->userdata('emis_deo_id');
            $where=" AND schoolnew_edn_dist_mas.id=".$dist;
            $data['alllist'] = $this->Blockmodel->getallrenewallist($where);
            $data['user']=$this->session->userdata('usertype1')==2?3:2;
            //print_r($data);
            //die;
            $this->load->view('ceo/renewallist',$data);
        }
        elseif($this->session->userdata('emis_block_id')!=''){
            //echo "elseif";
             $where="   AND schoolnew_basicinfo.beo_map=".$this->session->userdata('emis_usertype1')." 
                        AND schoolnew_edn_dist_block.block_id=".$this->session->userdata('emis_block_id')." 
                        AND sch_directorate_id IN (16,18,27,29,32,34) AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
             $data['alllist'] = $this->Blockmodel->getallrenewallist($where);
             //print_r($data);
            //die;
             $data['user']=1;
             $this->load->view('block/renewalschoollist',$data);
        }
        elseif($this->session->userdata('emis_state_id')!=''){
            //echo "else if";
            $where=" AND schoolnew_renewal.vaild_upto IS NOT NULL";
            $data['alllist'] = $this->Blockmodel->getallrenewallist($where);
            $data['user']=0;
            $this->load->view('block/renewalschoollist',$data);
        }
    }
    
    function RenewalStatus(){
        $renewalID=$this->uri->segment(3,0);
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if(!$emis_loggedin){
            redirect('/', 'refresh');
        } 
        
        //Old Process
        if($_POST['hidden_'.$renewalID]!=-1){
            $where=" AND schoolnew_renewalfiles.renewal_id=".$renewalID;
            $certificate = $this->Blockmodel->getallrenewallist($where);
            $data['user']=$this->session->userdata('usertype1')==2?3:2;
            foreach($certificate as $cer){
                $remark='remarks_'.$cer['certificate_id'].'_'.$renewalID;
                $data=array(
                    'certificate_exp'           =>  date("Y-m-d",strtotime($_POST['file_exp_'.$cer['fileid']])),
                    'auth'                      =>  $_POST['hidden_'.$renewalID],
                    'beo_certificateremarks'    =>  $_POST[$remark]
                );
                if(!$this->Blockmodel->updateBEOStatus('id,'.$cer['fileid'],$renewalID,'renewal_id',$data,'schoolnew_renewalfiles')){
                    die('Renewal Files');
                }
                $data=array(
                    'auth'                      =>  $_POST['hidden_'.$renewalID],
                    'beo_certificateremarks'    =>  $_POST[$remark]
                );
                if(!$this->Blockmodel->updateBEOStatus('certificate_id,'.$cer['certificate_id'],$renewalID,'renewal_id',$data,'schoolnew_renewalfiles')){
                    die('Renewal Files');
                }
            }
            $keyvar='BEO_';
        }
        $keyvar=$this->session->userdata('usertype1')==2?'CEO_':'DEO_';
        //Files Uploaded By BEO
        $filesIndex=['files_','condition_'];
        
        foreach($filesIndex as $f => $files){
            if(isset($_FILES[$files.$renewalID]) && $_FILES[$files.$renewalID]['name']!=''){
                $bucketName = 'renewalapplicationemis';
                $IAM_KEY = 'AKIAI3EE36AJMUO6YBVQ';
                $IAM_SECRET = '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';
	           // Connect to AWS
	           try {
		          // You may need to change the region. It will say in the URL when the bucket is open
		          // and on creation.
		          $s3 = S3Client::factory(
			         array(
				            'credentials' => array(
                                                    'key' => $IAM_KEY,
                                                    'secret' => $IAM_SECRET
                                            ),
				            'version' => 'latest',
				            'region'  => 'ap-south-1'
			         )
		          );
	           } catch (Exception $e) {die("Error: " . $e->getMessage());}
               $ext=explode('.',$_FILES[$files.$renewalID]['name']);
               $fname = $renewalID.'_'.uniqid($keyvar).$ext[1];
               $tmpname=$_FILES[$files.$renewalID]['tmp_name'];
               $mime=$_FILES[$files.$renewalID]['mime'];
               $keyName = 'APPROVE_FILES_TESTING/' . $fname;
               $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
               try {    
	                   $s3->putObject(
                            array(
				                                'Bucket'        =>  $bucketName,
				                                'Key'           =>  $keyName,
				                                'SourceFile'    =>  $tmpname,
				                                'StorageClass'  =>  'STANDARD',
                                                'ContentType'   =>  $mime,
                                                'ACL'           => 'public-read'
                                                
                            )
                        );
                        $s3->waitUntil('ObjectExists', array(
                                            'Bucket' => $bucketName,
                                            'Key'    => $keyName
                            ));
                    $plainUrl[$files] = $s3->getObjectUrl($bucketName, $keyName);        
                } catch (S3Exception $e) {die('Error:' . $e->getMessage());} catch (Exception $e) {die('Error:' . $e->getMessage());}
            }
        }
        //Update Database
        unset($data);
        $data=array(
                    'renewal_id'                =>      $renewalID,
                    'fileno'                    =>      $_POST['fileno_'.$renewalID],
                    'auth'                      =>      $_POST['hidden_'.$renewalID],
                    'filename'                  =>      $_FILES['files_'.$renewalID]['name'],
                    'filepath'                  =>      $plainUrl['files_'],
                    'remarks'                   =>      $_POST['beo_remarks_'.$renewalID],
                    'emis_username'             =>      $this->session->userdata('emis_username'),
                    'emis_userid'               =>      $this->session->userdata('emis_user_sno'),
                    'emis_login'                =>      $this->getUserIpAddr()
        );        
        //print_r($_POST);
        //die();
        
        //if($this->Blockmodel->checkauthendication($_POST['hidden_'.$renewalID],$renewalID)==null){
        if(!$this->Blockmodel->updateBEOStatus('','','',$data,'schoolnew_renewapprove')){
            die('Approve-1');
        }    
        //}
        unset($data);
        
        if($_POST['hidden_'.$renewalID]==-3){
            $validfr=$validto='0000-00-00'; 
        }
        elseif($_POST['hidden_'.$renewalID]>0){
            $validfr = (isset($_POST['validfrom_'.$renewalID])?$_POST['validfrom_'.$renewalID]!=''?date("Y-m-d",strtotime($_POST['validfrom_'.$renewalID])):NULL:NULL);
            $validto = (isset($_POST['validupto_'.$renewalID])?$_POST['validupto_'.$renewalID]!=''?date("Y-m-d",strtotime($_POST['validupto_'.$renewalID])):NULL:NULL);
            $frclass = (isset($_POST['fromclass_'.$renewalID])?($_POST['fromclass_'.$renewalID]!=null?$_POST['fromclass_'.$renewalID]:NULL):NULL);
            $toclass = (isset($_POST['toclass_'.$renewalID])?($_POST['toclass_'.$renewalID]!=null?$_POST['toclass_'.$renewalID]:NULL):NULL);
        }
        else{
           $validfr=$validto=NULL;  
        }
        
        $data=array(
                    'contidion_file'          =>  $plainUrl['condition_'],
                    'vaild_from'              =>  $validfr,
                    'vaild_upto'              =>  $validto,
                    'file_exp'                =>  $_POST['file_exp_'.$renewalID],
                    'year_rec_remarks'        =>  $_POST['year_rec_remarks'],
                    'fromclass'               =>  $frclass,
                    'toclass'                 =>  $toclass,
                    'auth'                    =>  0
                );
        
        /*if($this->session->userdata('usertype1')==2){
                
                $data=array(
                    'contidion_file'          =>  $plainUrl['condition_'],
                    'vaild_from'              =>  $validfr,
                    'vaild_upto'              =>  $validto
                );
                //print_r($data);die();
        }
        elseif(isset($_POST['year_rec_remarks'])){
            $data=array(
                'file_exp'              =>  $_POST['file_exp_'.$renewalID],
                'year_rec_remarks'  =>  $_POST['year_rec_remarks']
            );
        }
        else{
            $data=array(
                'auth' => 0
            );
        }*/
        
        if(!$this->Blockmodel->updateBEOStatus('',$renewalID,'id',$data,'schoolnew_renewal')){
            die('Renewal Auth');
        }
        
        /*if($validfr!='0000-00-00' || $validfr!=null){
            $this->load->library('Mailer');
            $email = 'replyonthis@gmail.com';
            // Use user or any information to load in email template
            $templateData = ['name' => 'John Doe']; 
            $this->mailer->to($email)->subject("Renewal Application Status")->send("mailRenewal.php", compact('templateData'));
        }*/
        redirect('Block/viewRenewalSchoolList');           
    }
    
    function getRenewalDash(){
        switch(1){
            case $this->session->userdata('emis_state_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $groupby=' GROUP BY dist_id';
                        $group='dist_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_district_id')!=null:{
                 switch($this->uri->segment(3,0)){
                    case '0':{
                        $where .= ' AND district_id='.$this->session->userdata('emis_district_id');
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_deo_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $where .= ' AND edu_dist_id='.$this->session->userdata('emis_deo_id');
                        $groupby=' GROUP BY blk_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_block_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $$where .= ' AND block_id='.$this->session->userdata('emis_block_id');
                        $groupby=' GROUP BY school_id'; 
                        $group='school_id';
                        break;
                    }
                    case 'Block':{
                         $where .= ' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                         $group='school_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND school_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                         $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_school_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case 0:{
                        $where .= ' AND school_id='.$this->session->userdata('emis_school_id');
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND school_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                         $group='school_id';
                        break;
                    }
                }
                break;
            }
        }
        $cond=$this->uri->segment(5,0)==1?"!='0000-00-00'":"='0000-00-00'";
        $dashboard=$this->Blockmodel->getRenewalBoardCount($where,$groupby,$cond);
        $dashboard=json_decode(json_encode($dashboard), True);
        $result = array();$key=$group;
        foreach($dashboard as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        //print_r($result);die();
        $data['dashboard']=$result;
        $data['scheme_id']=$this->uri->segment(5,0);
        $this->load->view('renewal/dashboard',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
/************************************************************Vivek Rao Bhosale*******************************************************************************/    
      public function emis_block_management_verification()
  {
  //  print_r('sample');

    $this->load->library('session');
    $block_id =$this->session->userdata('emis_block_id');
    $get_block_name = $this->Blockmodel->get_block_name($block_id);
    $block_name=$get_block_name[0]->block_name;     
    $emis_loggedin = $this->session->userdata('emis_loggedin');
       
    if($emis_loggedin) {
        
      $data['schoollist1'] = $this->Blockmodel->getschoolrecognition_verification_details($block_id);

      $this->load->view('block/emis_block_renewal',$data);
      } else { redirect('/', 'refresh'); }
  }
  //15.2.19 pearlin
   public function get_dash_blockwise_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] =$this->session->userdata('emis_district_id');
 //print_r($data['dist']);
     $block_id =$this->session->userdata('emis_block_id');
    $get_block_name = $this->Blockmodel->get_block_name($block_id);

    $block_name=$get_block_name->block_name;    
  
      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      
      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
    
// dist
if(!empty($manage)){
                       $result = Common::session_search_filter($manage,$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                 // print_r($result);

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

        


      if(!empty($manage)){

      $data['details'] = $this->Blockmodel->get_blockwise_school($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Blockmodel->get_blockwise_school($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('block/emis_block_dash_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }
    public function get_dash_schoolwise_class()
  {
    $this->load->library('session');
     $school_id =$this->session->userdata('emis_blockschool_id');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $school_id = $this->input->get('school');
      
     
      $data['details'] = $this->Statemodel->get_schoolwise_class($school_id);
      // print_r($data);die;
      $this->load->view('block/emis_block_dash_schoolsingle',$data);
      // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }
 public function emis_teacher_classwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
      $data['block_id']=$block_id;
       $data['getsctype'] = $this->Blockmodel->get_school_type();
    
      $school_cate = $this->input->post('school_cate');

        if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                       $school_cate = $result['school_cate'];
                 }
     
                 $data['cate'] = $school_cate;
                 if($school_cate!="")
                 {
                    $data['details'] = $this->Blockmodel->getalldistrictcountsbyclassteach($block_id,$school_cate); 
                 }
                 else
                 {
                  $data['details'] = $this->Blockmodel->getalldistrictcountsbyclassteach($block_id,$school_cate); 
                 }
      
      //print_r($data['details']);die();
      //echo json_encode($data['details']);
      $this->load->view('block/emis_block_teacherschoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }

  public function emis_teaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
       $data['block_id']=$block_id;
     // print_r($block_id);
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      $school_cate = $this->input->post('school_cate');
        if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       //$manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
    
                 $data['cate'] = $school_cate;
       if($school_cate!=""){ 
      $data['details'] = $this->Blockmodel->get_teaching_block_school($block_id,$school_cate); 
        }else{
     $data['details'] = $this->Blockmodel->get_teaching_block_school($block_id,$school_cate);
      }
      $this->load->view('block/emis_block_teaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
  public function emis_nonteaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
       $block_id =$this->session->userdata('emis_block_id');
      $data['block_id']=$block_id;
       $data['getsctype'] = $this->Blockmodel->get_school_type();
    
      $school_cate = $this->input->post('school_cate');

        if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                       $school_cate = $result['school_cate'];
                 }
     
                 $data['cate'] = $school_cate;
      if($school_cate!="")
      {
       $data['details'] = $this->Blockmodel->get_nonteaching_block_school($block_id,$school_cate); 
      }
      else
      {
      $data['details'] = $this->Blockmodel->get_nonteaching_block_school($block_id,$school_cate); 
      }
   
    //  print_r($data['details']);
      //echo json_encode($data['details']);
      $this->load->view('block/emis_block_nonteaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }

    /************************************ Attendance Part ********************/

    /**
   * Schoolwise Attendance Details
   * VIT-sriram
   * 07/02/2019
   */

  public function get_attendance_schoolwise_details()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $block_id = $this->session->userdata('emis_block_id');
      $block_data = $this->Blockmodel->get_block_name($block_id);
      $block_id = $block_data->block_name;
      
          $date = $this->input->get('date');
      $today  = date('d-m-Y');
      // print_r($dist_id);
      if(!empty($date) && $today != $date)
          {
          // $table = 'students_attend_daily';
          $week_start = date('d-m-Y',strtotime("last sunday"));
          $month_start = date('d-m-Y',strtotime("-1 Month"));
          
            if(date('d-m-Y',strtotime($week_start)) <= date('d-m-Y',strtotime($date)))
            {
              $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              // // echo $week_start;die;
              // echo "if";
            }else if(date('m-Y',strtotime($month_start)) <= date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_monthly';
              $teach_table = 'teachers_attend_monthly';
              // echo "else if";
            }else
            {
              // echo "else";
              $table = 'students_attend_yearly';
              $teach_table = 'teachers_attend_yearly';  
            }

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            $teach_table ='teachers_attend_daily';  
          }

        
      $data['dist'] = "Block - ".$block_id;
      $data['student_details_schoolwise'] = $this->Districtmodel->get_attendance_report_schoolwise($block_id,$date,$table);
      $data['date'] = $date;
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";die;

      $this->load->view('block/emis_block_attendance_schoolwise',$data);
    }else { redirect('/', 'refresh'); }
  
  }

  /**
   * Schoolwise Teacher Attendance Details 
   * VIT-sriram
   * 07/02/2019
   **/
  public function get_attendance_teacher_schoolwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // echo "function in";
      $block_id = $this->session->userdata('emis_block_id');
      $block_data = $this->Blockmodel->get_block_name($block_id);
      $block_id = $block_data->block_name;
      
          $date = $this->input->get('date');
      $today  = date('d-m-Y');
      // print_r($dist_id);
      if(!empty($date) && $today != $date)
          {
          // $table = 'students_attend_daily';
          $week_start = date('d-m-Y',strtotime("last sunday"));
          $month_start = date('d-m-Y',strtotime("-1 Month"));
          
            if(date('d-m-Y',strtotime($week_start)) <= date('d-m-Y',strtotime($date)))
            {
              $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              // // echo $week_start;die;
              // echo "if";
            }else if(date('m-Y',strtotime($month_start)) <= date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_monthly';
              $teach_table = 'teachers_attend_monthly';
              // echo "else if";
            }else
            {
              // echo "else";
              $table = 'students_attend_yearly';
              $teach_table = 'teachers_attend_yearly';  
            }

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            $teach_table ='teachers_attend_daily';  
          }

        
      $data['teacher_details_schoolwise'] = $this->Districtmodel->get_attendance_teacher_report_schoolwise($date,$block_id,$teach_table);
      $data['dist'] = "Block - ".$block_id;
      $data['date'] = $date;
      // echo "funtion";
      $this->load->view('block/emis_block_teacher_attendance_schoolwise',$data);


      }else { redirect('/', 'refresh'); }
  }


  /**
  * Get classwise Details 
  * VIT-sriram
  * 19/02/2019
  **/

  public function get_attendance_classwise_details()
  {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) 
    {
        $school_id = $this->input->get('school');
        $date = $this->input->get('date');

        
      $today  = date('d-m-Y');
      // print_r($dist_id);
      if(!empty($date) && $today != $date)
          {
          // $table = 'students_attend_daily';
          $week_start = date('d-m-Y',strtotime("last sunday"));
          $month_start = date('d-m-Y',strtotime("-1 Month"));
          
            if(date('d-m-Y',strtotime($week_start)) <= date('d-m-Y',strtotime($date)))
            {
              $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              // // echo $week_start;die;
              // echo "if";
            }else if(date('m-Y',strtotime($month_start)) <= date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_monthly';
              $teach_table = 'teachers_attend_monthly';
              // echo "else if";
            }else
            {
              // echo "else";
              $table = 'students_attend_yearly';
              $teach_table = 'teachers_attend_yearly';  
            }

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            $teach_table ='teachers_attend_daily';  
          }
        $data['date'] = $date;
        $data['classwise_details'] = $this->Districtmodel->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Districtmodel->get_school_name($school_id);
      $data['school'] = $school_id;
        $this->load->view('block/emis_block_attendance_classwise',$data);

    }else { redirect('/', 'refresh'); }

  }

  /**
  * Get sectionwise Details 
  * VIT-sriram
  * 19/02/2019
  **/

  public function get_attendance_sectionwise_details()
  {
      
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) 
    {
      
      $school_id = $this->input->get('school');
      $class_id = $this->input->get('class');
      $date = $this->input->get('date');

        // echo $school_id;
      
      $today  = date('d-m-Y');
      // print_r($dist_id);
      if(!empty($date) && $today != $date)
          {
          // $table = 'students_attend_daily';
          $week_start = date('d-m-Y',strtotime("last sunday"));
          $month_start = date('d-m-Y',strtotime("-1 Month"));
          
            if(date('d-m-Y',strtotime($week_start)) <= date('d-m-Y',strtotime($date)))
            {
              $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              // // echo $week_start;die;
              // echo "if";
            }else if(date('m-Y',strtotime($month_start)) <= date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_monthly';
              $teach_table = 'teachers_attend_monthly';
              // echo "else if";
            }else
            {
              // echo "else";
              $table = 'students_attend_yearly';
              $teach_table = 'teachers_attend_yearly';  
            }

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            $teach_table ='teachers_attend_daily';  
          }
        $data['date'] = $date;
        
      // echo $school.'--'.$class_id;

      $data['students_section_details'] = $this->Districtmodel->get_attendance_sectionwise_details($school_id,$class_id,$table,$date);
      $data['school_details'] = $this->Districtmodel->get_school_name($school_id);
      $data['school'] = $school_id;
      $data['class'] = $class_id;
      $this->load->view('block/emis_block_attendance_sectionwise',$data);

    }else { redirect('/', 'refresh'); }


  }
  

  /**
  * Get Attendance school Teacher Details 
  * VIT-sriram
  * 18/02/2019
  **/

  public function get_attendance_teacher_classwise()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $school_id = $this->input->get('school');
    $date = $this->input->get('date');

        // echo $school_id;
      
      $today  = date('d-m-Y');
      // print_r($dist_id);
      if(!empty($date) && $today != $date)
          {
          // $table = 'students_attend_daily';
          $week_start = date('d-m-Y',strtotime("last sunday"));
          $month_start = date('d-m-Y',strtotime("-1 Month"));
          
            if(date('d-m-Y',strtotime($week_start)) <= date('d-m-Y',strtotime($date)))
            {
              $table = 'students_attend_weekly';
              $teach_table = 'teachers_attend_weekly';
              // // echo $week_start;die;
              // echo "if";
            }else if(date('m-Y',strtotime($month_start)) <= date('m-Y',strtotime($date)))
            {

              $table = 'students_attend_monthly';
              $teach_table = 'teachers_attend_monthly';
              // echo "else if";
            }else
            {
              // echo "else";
              $table = 'students_attend_yearly';
              $teach_table = 'teachers_attend_yearly';  
            }

          }else
          {
            $date = date('d-m-Y');
            $table = 'students_attend_daily';
            $teach_table ='teachers_attend_daily';  
          }
      $data['teacher_absent_list'] = $this->Districtmodel->get_attendance_teacher_classwise($date,$school_id,$teach_table);
      $data['school_details'] = $this->Districtmodel->get_school_name($school_id);
      $data['date'] = $date;
      // print_r($data['teacher_absent_list']);
      $this->load->view('block/emis_block_teacher_classwise',$data);

    }else { redirect('/', 'refresh'); }

  }



    /************************************End *********************************/


    /**************Start Flash News  Function *****************************************/
  /**
  * get The Old Flash News 
  * VIT-sriram
  * 27/02/2019
  */


  public function get_common_control_link()
  {

      $data['header'] = 'block';
      $data['link'] = 'block';

      return $data;

  }
  public function emis_student_disablity_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
    $block_id =$this->session->userdata('emis_block_id');
    $get_block_name = $this->Blockmodel->get_block_name($block_id);

    $block_name=$get_block_name->block_name;  
      $data['allstuds'] = $this->Blockmodel-> get_classwise_student_disability_school($block_name);
        //print_r($data['allstuds']);
       $this->load->view('block/emis_student_disability_schoolwise',$data);
      }else
      {
        redirect('/', 'refresh');

      }
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
public function get_RTE_district()
  {
  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    $data['allstuds'] = $this->Blockmodel->get_schoolwise_RTE_student($block_id);
    //print_r($data['allstuds']);
      $this->load->view('block/emis_state_RTE_schoolwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
 
 public function dash_renewal(){
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
      //print_r($block_id);die();
    $data['renewal']=$this->Blockmodel->get_state_renewal_details($block_id);
   
      $this->load->view('block/emis_dash_renewal',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   
  public function dash_renewal_beo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
     $data['renewal_pending_detail'] = $this->Blockmodel->get_state_renewal_pending_details($block_id);
     // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('block/emis_state_beo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_deo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
    $data['renewal_pending_detail_deo'] = $this->Blockmodel->get_state_deo_pending_details($block_id);
    //print_r( $data['renewal_pending_detail_deo']);
    $this->load->view('block/emis_state_deo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_ceo(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
    $data['renewal_pending_detail_ceo'] = $this->Blockmodel->get_state_ceo_pending_details($block_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('block/emis_dash_ceo_pending',$data);
  } else { redirect('/', 'refresh'); }
  }
    public function get_dash_blockwise_school_report_2018()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] =$this->session->userdata('emis_district_id');
 //print_r($data['dist']);
     $block_id =$this->session->userdata('emis_block_id');
    $get_block_name = $this->Blockmodel->get_block_name($block_id);

    $block_name=$get_block_name->block_name;    
  
      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      $data['getsctype'] = $this->Blockmodel->get_school_type();
    

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
        


      if(!empty($manage)){

      $data['details'] = $this->Blockmodel->get_blockwise_school_2018($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Blockmodel->get_blockwise_school_2018($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('block/emis_block_dash_schoolwise_2018',$data);
      } else { redirect('/', 'refresh'); }
  }

 
     public function get_renewal_rejected(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $block_id =$this->session->userdata('emis_block_id');
    $data['renewal_rejected'] = $this->Blockmodel->get_renewal_rejected($block_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('block/emis_block_renew_rejected',$data);
 } else { redirect('/', 'refresh'); }
}

public function get_district_migration_details()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $block_id =$this->session->userdata('emis_block_id');

      $data['student_migration_details'] = $this->Blockmodel->get_dist_student_migration_details($block_id);
     // print_r($data['student_migration_details']);
    $this->load->view('block/emis_student_migration_details',$data);
  } else { redirect('/', 'refresh'); }

} 

public function get_migration_detail_student()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $block_id =$this->session->userdata('emis_block_id');
              $school_type_from=$this->input->get('school_type_from');

             $school_type_to=$this->input->get('school_type_to');

      $data['student_migration_details'] = $this->Blockmodel->get_migration_detail_student($block_id,$school_type_from,$school_type_to);

    $this->load->view('block/emis_migration_detail_student',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_school_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id =$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Blockmodel->get_school_student_migration($block_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('block/emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function emis_school_unrecognized_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id =$this->session->userdata('emis_block_id');
    
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Blockmodel->get_school_unrecognized_school($block_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('block/emis_school_unrecognized_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

  //  $mng_cat=$this->input->get('magt_type');
       
             if(!empty($manage)){
                       $result = Common::session_search_filter($manage,$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                 // print_r($result);

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if($manage!="" && $school_cate){ 
   $data['school_profile_verification'] = $this->Blockmodel->get_school_profile_verification_district($block_id,$manage,$school_cate);
  }
  else
  {
      $data['school_profile_verification'] = $this->Blockmodel->get_school_profile_verification_district($block_id,$manage,$school_cate);
  }
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
    
      // print_r($data['school_profile_verification']);die();
    $this->load->view('block/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

  //  $mng_cat=$this->input->get('magt_type');
       
             if(!empty($manage)){
                       $result = Common::session_search_filter($manage,$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                 // print_r($result);

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Blockmodel->get_school_land_verification_district( $block_id,$manage,$school_cate);
    }
    else
    {
       $data['school_land_verification'] = $this->Blockmodel->get_school_land_verification_district( $block_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('block/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

  //  $mng_cat=$this->input->get('magt_type');
       
             if(!empty($manage)){
                       $result = Common::session_search_filter($manage,$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                 // print_r($result);

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Blockmodel->get_school_sanitation_verification_district($block_id,$manage,$school_cate);
    }
    else
    {
       $data['school_land_verification'] = $this->Blockmodel->get_school_sanitation_verification_district($block_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('block/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Blockmodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

  //  $mng_cat=$this->input->get('magt_type');
       
             if(!empty($manage)){
                       $result = Common::session_search_filter($manage,$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                 // print_r($result);

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Blockmodel->get_school_committee_verification_district($block_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Blockmodel->get_school_committee_verification_district($block_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('block/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 

public function getstudentsalltotal() {
    $this->load->library('session');
    $part = $this->uri->segment(3,0);
		
		$data['getmanagecate'] = $this->Statemodel->getmanagecate();
		$data['getsctype'] = $this->Statemodel->get_school_type();
		 //$data['getsctype'] = $school_cate;
		
		//print_r($data['getsctype']);
		//die();
		
		$manage = $this->input->post('school_manage') == ''?'\'Government\'':$this->input->post('school_manage');
		$school_cate = $this->input->post('school_cate') == ''?'\'Higher Secondary School\'':$this->input->post('school_cate');
		
	
		if( $this->session->userdata('emis_block_id')!=null) {
			if($part ==1 ){
				$block_id = $this->session->userdata('emis_block_id');
				$where = "where school_type = ".$manage." and cate_type=".$school_cate." and block_id=".$block_id."";
				$group = ' group by school_id';
			}elseif($part == 2) {
				$block_id = $this->session->userdata('emis_block_id');
				$where = "where school_type = ".$manage." and cate_type=".$school_cate." and block_id=".$block_id." and schoolnew_school_department.id in(3,6,18,27,29,32,34,42)";
				$group = ' group by school_id';
			}elseif($part == 3){
				$block_id = $this->session->userdata('emis_block_id');
				$where = "where school_type = ".$manage." and cate_type=".$school_cate." and block_id=".$block_id." and schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)";
				$group = ' group by school_id';
			}
			elseif($part == 4){
				$block_id = $this->session->userdata('emis_block_id');
				$where = "where cate_type=".$school_cate." and block_id=".$block_id." and schoolnew_school_department.id in(28)";
				$group = ' group by school_id';
			}
			
		}
		
		else if($this->session->userdata('emis_deo_id') != null){
			$deo_id = $this->session->userdata('emis_deo_id');
		}else if($this->session->userdata('emis_district_id')!=null) {
			$district_id = $this->session->userdata('emis_district_id');
		}else if($this->session->userdata('emis_state_id')!=null){
			$district_id = $this->session->userdata('emis_district_id');
		}
		
		
	
		$data['details'] = $this->Blockmodel->getschool($where,$group);
			
	$this->load->view('block/emis_block_dash_schoolwise',$data);

}

public function emis_state_school()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
      
      $data['total_count_details'] = $this->Blockmodel->get_state_school($block_id);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school',$data);
   
    } else { redirect('/', 'refresh'); }

    }

   
        public function get_state_school_wise()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_name =$this->session->userdata('emis_block_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_wise($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_wise',$data);
   
    } else { redirect('/', 'refresh'); }

    }
      public function emis_state_school_dee()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
     $block_id =$this->session->userdata('emis_block_id');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_dee($block_id);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_dee',$data);
   
    } else { redirect('/', 'refresh'); }

    }

   
        public function get_state_school_wise_dee()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_name=$this->session->userdata('emis_block_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_wise_dee($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_wise_dee',$data);
   
    } else { redirect('/', 'refresh'); }

    }
      public function emis_state_school_dse()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $dist_id  =$this->session->userdata('emis_district_id');
       $block_id=$this->session->userdata('emis_block_id');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_dse($block_id);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_dse',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function get_state_school_district_dse()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $mang=$this->input->get('mang');
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_district_dse($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_district_dse',$data);
   
    } else { redirect('/', 'refresh'); }

    }
        public function get_state_school_wise_dse()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_name=$this->session->userdata('emis_block_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_wise_dse($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_wise_dse',$data);
   
    } else { redirect('/', 'refresh'); }

    }
      public function emis_state_school_dms()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_id  =$this->session->userdata('emis_block_id');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_dms($block_id);
     // print_r($data['total_count_details']);
      $this->load->view('block/emis_state_school_dms',$data);
   
    } else { redirect('/', 'refresh'); }

    }

   
        public function get_state_school_wise_dms()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_name=$this->session->userdata('emis_block_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_wise_dms($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_wise_dms',$data);
   
    } else { redirect('/', 'refresh'); }

    }
    
       public function emis_state_school_others()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
       $block_id=$this->session->userdata('emis_block_id');
         $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_others($block_id);
     // print_r($data['total_count_details']);
      $this->load->view('block/emis_state_school_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }

     
        public function get_state_school_wise_others()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Blockmodel');
      $block_name=$this->session->userdata('emis_block_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Blockmodel->get_state_school_wise_others($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('block/emis_state_school_wise_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }
     public function schoolwise_class_timetable_report()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
       $block_id=$this->session->userdata('emis_block_id');
    
   $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
            $data['getsctype'] = $this->Blockmodel->get_school_type();
    
      $school_cate = $this->input->post('school_cate');
      
                 if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $school_cate = $result['school_cate'];
                 }
                 $data['cate'] = $school_cate;

      if(!empty($school_cate)){
        $data['school_timetable_details'] = $this->Blockmodel->get_dist_school_timetable_details($school_cate,$block_id,$this_week_fst,$this_week_ed);
     
    }
    else
    {
      $data['school_timetable_details'] = $this->Blockmodel->get_dist_school_timetable_details($school_cate,$block_id,$this_week_fst,$this_week_ed);
     
    }
    $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
      $this->load->view('block/emis_district_schoolwise_timetable',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function school_class_section_timetable()
  {
    $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
   $school_id=$_GET['schoolid'];
   $data['schoolid']=$_GET['schoolid'];
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
      $data['school_class_section_timetable'] = $this->Blockmodel->get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed);
      $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
      $this->load->view('block/emis_district_school_section_timetable',$data);
      $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
    }else { redirect('/', 'refresh');}
    
  }
  public function slas_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $pst=$this->input->post('emis_state_fix')==''?'tamil':$this->input->post('emis_state_fix');
    $gender=$this->input->post('gender')==''?"all":$this->input->post('gender');
   // print_r($gender);
     $blk_id=$this->session->userdata('emis_block_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Blockmodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Blockmodel->slas_report_schl($blk_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
    $this->load->view('block/slas_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
  public function slas_report_schl_wise()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  //  $pst=$this->input->post('emis_state_fix')==''?'tamil':$this->input->post('emis_state_fix');
    //$gender=$this->input->post('gender')==''?"all":$this->input->post('gender');
   // print_r($gender);
    $catty_id=$this->input->get('catty_id');
     $blk_id=$this->session->userdata('emis_block_id');
     $manage_id=$this->input->get('manage_id');
     //print_r($blk_id);
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Blockmodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Blockmodel->slas_report_schl_wise($blk_id, $catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
      $data['manage_id']=$manage_id;
    $this->load->view('block/slas_report_schl_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_cate_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Blockmodel');
    $blk_id=$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Blockmodel->slas_report_cate_dist($blk_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Block/slas_report_cate_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_mana_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Blockmodel');
 $blk_id=$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Blockmodel->slas_report_mana_dist($blk_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Block/slas_report_mana_dist',$data);
  } else { redirect('/', 'refresh'); }

} 

}
?>