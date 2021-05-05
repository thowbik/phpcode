<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'aws/aws-autoloader.php';
// use Aws\S3\S3Client;
// use Aws\S3\Exception\S3Exception;

class Beo_block extends CI_Controller {
    
  function __construct() {
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
    $this->load->model('Beo_blockmodel');
    $this->load->helper('Common_helper');
    $this->load->library('AWS_S3');
    
  }
  
  /**************************************************************************************************************************
                            Functions Included By Magesh Elumalai - Ramco Cements Limited
***************************************************************************************************************************/    
  
// <<<<<<< HEAD
//   public function emis_block_home(){
    
//     $this->load->library('session');
//         $emis_loggedin = $this->session->userdata('emis_loggedin');
//         $emis_blockid=$this->session->userdata('emis_block_id');
//         if($emis_loggedin) {
//             $data['schools']=$this->Beo_blockmodel->getSchoolCountByBlock($emis_blockid);
//             $data['students']=$this->Beo_blockmodel->getStudentTotalCountByBlock($emis_blockid);
//             $data['communitys']=$this->Beo_blockmodel->getallcategorycountbyblock($emis_blockid);
//             $data['teachers']=$this->Beo_blockmodel->getTeacherCountByBlock($emis_blockid);
//             $data['genders']=$this->Beo_blockmodel->getStudentsCountByGenderInBlock($emis_blockid);
//             $this->load->view('beo_Block/emis_block_home',$data);
//         } else { redirect('/', 'refresh'); }
    
    
        
// =======
   public function emis_block_home()
    {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $block_id = $this->session->userdata('emis_block_id');
      $beo_id = $this->session->userdata('emis_usertype1');
       //print_r($beo_id);
      $block_details = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);
     //print_r($block_details);die();

      $data['total_count_details'] = $this->Beo_blockmodel->get_block_school_student_teacher_total($block_id,$beo_id);
     // print_r( $data['total_count_details']);die;
      $school_details = $this->Beo_blockmodel->get_block_school_type_based_schoolinfo($block_details->block_name,$block_details->beo_map);
      $data['school_type'] = $school_details['result'];
      $data['school_based_count_details'] = $school_details['school_info'];
      $data['renewal_details'] = $this->Beo_blockmodel->get_state_renewal_details($block_id,$beo_id);
      //Vivek Rao...
       $data['Govt_detail']=$this->Beo_blockmodel->govt_enrollment($block_id,$beo_id);
       $where="  AND students_school_child_count.block_id=".$block_id;

      //$data['freeschemes']=$this->Statemodel->getFreeSchemeGeneral($where);

       $user_type = $this->session->userdata('emis_user_type_id');

      $data['reports_csv'] = $this->Beo_blockmodel->get_districtwise_report($user_type);
      $this->load->view('beo_Block/emis_beo_block_home',$data);
    } else { redirect('/', 'refresh'); }
// >>>>>>> 33ef4b789e99f96873183db2e1ab2cfea8a8dbea
    }
    
    
    public function emis_block_analytics_schools()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $block_id =$this->session->userdata('emis_block_id');
    $this->load->database();
    $this->load->model('Beo_blockmodel');
    $data['blockname'] = $this->Beo_blockmodel->getsingleblockname($block_id);
    $data['details'] = $this->Beo_blockmodel->getallblockcountsbyschool($block_id);
    $this->load->view('beo_Block/emis_block_analytics_school',$data);

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
     $data['result1'] = $this->Beo_blockmodel->getallgenderbydistrict1($block_id,$manage);
    }else{
     $data['result1'] = $this->Beo_blockmodel->getallgenderbydistrict($block_id);
    }
    $data['distname'] = $this->Beo_blockmodel->getsingledistname($block_id);
    
    $this->load->view('beo_Block/emis_block_genderwise',$data);
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
    $this->load->model('Beo_blockmodel');
    $data['communityid'] = $community;
    $data['blockname'] = $this->Beo_blockmodel->getsingleblockname($block_id);
    $data['details'] = $this->Beo_blockmodel->getallblockkkcountsbyclassschool($block_id,$community);
    $this->load->view('beo_Block/emis_block_community_schools',$data);
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
    $this->load->model('Beo_blockmodel');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate();
     $manage =$this->session->userdata('emis_blockreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Beo_blockmodel->getalldistrictcountsbyclassschool1($block_id,$manage);
    }else{
    $data['details'] = $this->Beo_blockmodel->getalldistrictcountsbyclassschool($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['blockname'] = $this->Beo_blockmodel->getsingleblockname($block_id);
   $this->load->view('beo_Block/emis_block_schoolwise_analytics',$data);
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
    $schoolprofile = $this->Beo_blockmodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['details'] = $this->Beo_blockmodel->getallbrachesbyschool($school_id);


     $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 
     $data['lowclass']         = $standardlist[0]->low_class;
     $data['highclass']        = $standardlist[0]->high_class;
     $data['allclass']         = $this->Homemodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Homemodel->getallbrachesbyschoolinchildetail1($school_id));
 

    $this->load->view('beo_Block/emis_block_schoolsingle',$data);
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
    $this->load->model('Beo_blockmodel');

    $data['details'] = $this->Beo_blockmodel->getallstudentsbyschid($school_id,$class_id);
    $data['school_name'] = $this->Beo_blockmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Beo_blockmodel->getsingleclassname($class_id);
    $this->load->view('beo_Block/emis_block_studentsall',$data);
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
    
    redirect('beo_Block/emis_block_classwise_studentsall', 'refresh');
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
          $this->load->view('beo_Block/emis_block_selectschool',$data);     
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
        $schoolprofile=$this->Beo_blockmodel->get_school_by_udise($schooludise,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('beo_Block/emis_block_selectschool',$data); 
        
         }
         else
        {
          $data['error2'] = "No school data found<br/>Allow only within a block Schools";  
           $this->load->view('beo_Block/emis_block_selectschool',$data); 

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
        $schoolprofile=$this->Beo_blockmodel->get_school_by_block($schoolid,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('beo_Block/emis_block_selectschool',$data); 
        
         }
         else
        {
          $data['error3'] = "No school data found<br/>Allow only within a district Schools"; 
          $this->load->view('beo_Block/emis_block_selectschool',$data); 

        }
    }else{
      $data['error3'] = "No school data found ";
       $this->load->view('beo_Block/emis_block_selectschool',$data); 
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

       redirect('beo_Block/emis_block_slelectschool','refresh');

      } else { redirect('Authentication/emis_login', 'refresh'); }
 }


   public function emis_block_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==6){ 


      $this->load->view('beo_Block/emis_beo_resetpassword');

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
      $this->load->model('Beo_blockmodel');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Beo_blockmodel->emis_block_resetpassword($block_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_block_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $block_id = $this->session->userdata('emis_block_id');
       $this->load->database(); 
       $this->load->model('Beo_blockmodel');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Beo_blockmodel->getoldpassblock($block_id,$username);
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
   $this->load->view('beo_Block/emis_stu_aadhaar_report_block',$data);
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
    $this->load->view('beo_Block/emis_block_report_school',$data);
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
    $this->load->view('beo_Block/emis_block_report_class',$data);
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
		$get_block_name = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);
		$block_name=$get_block_name->block_name; 
        //print_r($block_name);
        		
		$emis_loggedin = $this->session->userdata('emis_loggedin');
       
		if($emis_loggedin) {
        
  		$data['schoollist'] = $this->Beo_blockmodel->get_blockwise_school($block_name);
		
  		$this->load->view('beo_Block/emis_block_school_verified',$data);
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
	   $result = $this->Beo_blockmodel->verification_status($udise_code,$data);
	   echo $result; 
		 }
		 else { redirect('/', 'refresh'); }	
  }

/**************************************************************************************************************************
                            Functions Included By Vivek Rao - Ramco Cements Limited
***************************************************************************************************************************/    
   
    
    public function viewBlockLevelTrainer(){
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) {
            $block_id = $this->session->userdata('emis_block_id');
            $data['schools']= $this->Datamodel->get_allschooolsbyblock($block_id);  
            $this->load->view('beo_Block/emis_block_trainer',$data);     
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
        $data['count']=$this->Beo_blockmodel->getSchoolandCountStudentsByCategoryInBlock($data['mag_cat'],$block_id);
        $this->load->view('beo_Block/emis_block_view_segment',$data);
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
    
   public function viewRenewalSchoolList() {
        if($this->session->userdata('emis_district_id')!='' || $this->session->userdata('emis_deo_id')!=''){
            $dist=$this->session->userdata('emis_district_id')!=''?$this->session->userdata('emis_district_id'):$this->session->userdata('emis_deo_id');
            $where=" AND schoolnew_renewal.vaild_upto IS NULL AND schoolnew_basicinfo.district_id=".$dist;
            $data['alllist'] = $this->Beo_blockmodel->getallrenewallist($where);
            $data['user']=$this->session->userdata('usertype1')==2?3:2;
            //print_r($data);
            //die;
            $this->load->view('ceo/renewallist',$data);
        }
        elseif($this->session->userdata('emis_block_id')!=''){
             $where=" AND schoolnew_renewal.vaild_upto IS NULL AND schoolnew_academicinfo.high_class<10 AND schoolnew_block.id=".$this->session->userdata('emis_block_id');
             $data['alllist'] = $this->Beo_blockmodel->getallrenewallist($where);
             $data['user']=1;
             $this->load->view('block/renewalschoollist',$data);
        }
        elseif($this->session->userdata('emis_state_id')!=''){
            $where=" AND schoolnew_renewal.vaild_upto IS NULL";
            $data['alllist'] = $this->Beo_blockmodel->getallrenewallist($where);
            $data['user']=0;
            $this->load->view('block/renewalschoollist',$data);
        }
    }
    
    function RenewalStatus(){
        $renewalID=$this->uri->segment(3,0);
        
        //Old Process
        if($this->session->userdata('emis_block_id')!='' && $_POST['hidden_'.$renewalID]!=-1){
            $where=" AND schoolnew_renewalfiles.renewal_id=".$renewalID;
            $certificate = $this->Beo_blockmodel->getallrenewallist($where);
            $data['user']=$this->session->userdata('usertype1')==2?3:2;
            foreach($certificate as $cer){
                $remark='remarks_'.$cer['certificate_id'].'_'.$renewalID;
                $data=array(
                    'certificate_exp'           =>  date("Y-m-d",strtotime($_POST['file_exp_'.$cer['fileid']])),
                    'auth'                      =>  $_POST['hidden_'.$renewalID],
                    'beo_certificateremarks'    =>  $_POST[$remark]
                );
                if(!$this->Beo_blockmodel->updateBEOStatus('id,'.$cer['fileid'],$renewalID,'renewal_id',$data,'schoolnew_renewalfiles')){
                    die('Renewal Files');
                }
                $data=array(
                    'auth'                      =>  $_POST['hidden_'.$renewalID],
                    'beo_certificateremarks'    =>  $_POST[$remark]
                );
                if(!$this->Beo_blockmodel->updateBEOStatus('certificate_id,'.$cer['certificate_id'],$renewalID,'renewal_id',$data,'schoolnew_renewalfiles')){
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
                    'remarks'                   =>      $_POST['beo_remarks_'.$renewalID]
        );        
        //if($this->Beo_blockmodel->checkauthendication($_POST['hidden_'.$renewalID],$renewalID)==null){
            if(!$this->Beo_blockmodel->updateBEOStatus('','','',$data,'schoolnew_renewapprove')){
                die('Approve-1');
            }    
        //}
        unset($data);
        if($this->session->userdata('usertype1')==2){
                $validfr = ($_POST['validfrom']!=''?date("Y-m-d",strtotime($_POST['validfrom'])):NULL);
                $validto = ($_POST['validupto']!=''?date("Y-m-d",strtotime($_POST['validupto'])):NULL);
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
        }
        
        if(!$this->Beo_blockmodel->updateBEOStatus('',$renewalID,'id',$data,'schoolnew_renewal')){
            die('Renewal Auth');
        }
        redirect('Block/viewRenewalSchoolList');           
    }

   //15.2.19 pearlin
   public function get_dash_blockwise_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $data['dist'] =$this->session->userdata('emis_district_id');
    $beo_id = $this->session->userdata('emis_usertype1');
    $block_id =$this->session->userdata('emis_block_id');
    $get_block_name = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);

    $block_name=$get_block_name->block_name;    
    $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);
      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
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

      $data['details'] = $this->Beo_blockmodel->get_blockwise_school($block_name,$manage,$school_cate,$beo_id);
     
    }else
    {
      $data['details'] = $this->Beo_blockmodel->get_blockwise_school($block_name,$manage,$school_cate,$beo_id);
    }

      $this->load->view('beo_Block/emis_beo_block_dash_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }

    public function get_dash_schoolwise_class()
  {
    $this->load->library('session');
     $school_id =$this->session->userdata('emis_blockschool_id');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $school_id = $this->input->get('school');
      
     
      $data['details'] = $this->Beo_blockmodel->get_schoolwise_class($school_id);
      // print_r($data);die;
      $this->load->view('beo_Block/emis_beo_block_dash_schoolsingle',$data);
      // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }
        
     public function emis_teacher_classwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Beo_blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
       $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
       $data['block_id']=$block_id;
        $beo_id = $this->session->userdata('emis_usertype1');
       $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
    
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
                    $data['details'] = $this->Beo_blockmodel->getalldistrictcountsbyclassteach($block_id,$school_cate,$beo_id); 
                 }
                 else
                 {
                  $data['details'] = $this->Beo_blockmodel->getalldistrictcountsbyclassteach($block_id,$school_cate,$beo_id); 
                 }
      
      $this->load->view('beo_Block/emis_block_teacherschoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
     public function emis_teaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Beo_blockmodel');
      $block_id =$this->session->userdata('emis_block_id'); 
       $beo_id = $this->session->userdata('emis_usertype1');
      $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
       $data['block_id']=$block_id;
       $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
    
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
                $data['details'] = $this->Beo_blockmodel->get_teaching_block_school($block_id,$school_cate,$beo_id); 
                 }
                 else
                 {
                $data['details'] = $this->Beo_blockmodel->get_teaching_block_school($block_id,$school_cate,$beo_id); 
                 }

      $this->load->view('beo_Block/emis_block_teaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   public function emis_nonteaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Beo_blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
       $beo_id = $this->session->userdata('emis_usertype1');
       $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
        $data['block_id']=$block_id;
       $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
    
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
       $data['details'] = $this->Beo_blockmodel->get_nonteaching_block_school($block_id,$school_cate,$beo_id); 
      }
      else
      {
      $data['details'] = $this->Beo_blockmodel->get_nonteaching_block_school($block_id,$school_cate,$beo_id); 
      }
      $this->load->view('beo_Block/emis_block_nonteaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
  public function emis_teacher_blockwise(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Beo_blockmodel');
      $block_id =$this->session->userdata('emis_block_id');
       $beo_id = $this->session->userdata('emis_usertype1');
      $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
      $data['details'] = $this->Beo_blockmodel->getalldistrictcountsbyteacherblock($block_id,$beo_id);
   // print_r( $data['details']);
      $this->load->view('beo_Block/emis_state_teacherblockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function emis_student_disablity_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
    $block_id =$this->session->userdata('emis_block_id');
    $beo_id = $this->session->userdata('emis_usertype1');
    $get_block_name = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);

    $block_name=$get_block_name->block_name;  
      $data['allstuds'] = $this->Beo_blockmodel-> get_classwise_student_disability_school($block_name,$beo_id);
        //print_r($data['allstuds']);
       $this->load->view('beo_Block/emis_student_disability_schoolwise',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}   
  public function get_RTE_district()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    $data['allstuds'] = $this->Beo_blockmodel->get_blockwise_RTE_student($block_id);
    //print_r($data['allstuds']);
      $this->load->view('beo_Block/emis_state_RTE_schoolwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
public function dash_renewal(){
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    $beo_id = $this->session->userdata('emis_usertype1');
       //print_r($beo_id);
      $block_details = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);
    $data['renewal']=$this->Beo_blockmodel->get_state_renewal_details($block_id,$beo_id);
   
      $this->load->view('beo_Block/emis_dash_renewal',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   
  public function dash_renewal_beo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
     $data['renewal_pending_detail'] = $this->Beo_blockmodel->get_state_renewal_pending_details($block_id);
     // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('beo_Block/emis_state_beo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_deo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
    $data['renewal_pending_detail_deo'] = $this->Beo_blockmodel->get_state_deo_pending_details($block_id);
    //print_r( $data['renewal_pending_detail_deo']);
    $this->load->view('beo_Block/emis_state_deo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_ceo(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
     $block_id =$this->session->userdata('emis_block_id');
    
    $data['renewal_pending_detail_ceo'] = $this->Beo_blockmodel->get_state_ceo_pending_details($block_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('beo_Block/emis_dash_ceo_pending',$data);
  } else { redirect('/', 'refresh'); }
  }

   public function get_dash_blockwise_school_2018()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] =$this->session->userdata('emis_district_id');
 //print_r($data['dist']);
     $block_id =$this->session->userdata('emis_block_id');
       $beo_id = $this->session->userdata('emis_usertype1');
    $get_block_name = $this->Beo_blockmodel->get_block_name($block_id,$beo_id);

    $block_name=$get_block_name->block_name;    
   // print_r($block_name);
    $data['block_dist_name']=$this->Beo_blockmodel->get_block_district_name($block_id);
      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
    

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
        


      if(!empty($manage)){

      $data['details'] = $this->Beo_blockmodel->get_blockwise_school_2018($block_name,$manage,$school_cate,$beo_id);
     
    }else
    {
      $data['details'] = $this->Beo_blockmodel->get_blockwise_school_2018($block_name,$manage,$school_cate,$beo_id);
    }

      $this->load->view('beo_Block/emis_beo_block_dash_schoolwise_2018',$data);
      } else { redirect('/', 'refresh'); }
  }
  public function get_school_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id =$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Beo_blockmodel->get_school_student_migration($block_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('beo_Block/emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_district_migration_details()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $block_id =$this->session->userdata('emis_block_id');

      $data['student_migration_details'] = $this->Beo_blockmodel->get_dist_student_migration_details($block_id);
     // print_r($data['student_migration_details']);
    $this->load->view('beo_Block/emis_student_migration_details',$data);
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

      $data['student_migration_details'] = $this->Beo_blockmodel->get_migration_detail_student($block_id,$school_type_from,$school_type_to);

    $this->load->view('beo_Block/emis_migration_detail_student',$data);
  } else { redirect('/', 'refresh'); }

} 

public function emis_school_unrecognized_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id =$this->session->userdata('emis_block_id');
    
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Beo_blockmodel->get_school_unrecognized_school($block_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('beo_Block/emis_school_unrecognized_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
      
      
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
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['school_profile_verification'] = $this->Beo_blockmodel->get_school_profile_verification_district($block_id,$manage,$school_cate);
    }
    else
    {
       $data['school_profile_verification'] = $this->Beo_blockmodel->get_school_profile_verification_district($block_id,$manage,$school_cate);
      // print_r($data['school_profile_verification']);die();
    }
    $this->load->view('beo_Block/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Beo_blockmodel->get_school_land_verification_district( $block_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Beo_blockmodel->get_school_land_verification_district( $block_id,$manage,$school_cate); 
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('beo_Block/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Beo_blockmodel->get_school_sanitation_verification_district($block_id,$manage,$school_cate);
    }
    else
    {
       $data['school_land_verification'] = $this->Beo_blockmodel->get_school_sanitation_verification_district($block_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('beo_Block/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_block()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->session->userdata('emis_block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Beo_blockmodel->getmanagecate();
      
      $data['getsctype'] = $this->Beo_blockmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Beo_blockmodel->get_school_committee_verification_district($block_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    else
    {
      $data['school_land_verification'] = $this->Beo_blockmodel->get_school_committee_verification_district($block_id,$manage,$school_cate);
    }
    $this->load->view('beo_Block/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 

//indent Summary By Raj

      public function indents_summary()
	  {
		 $this->load->view('beo_Block/emis_beoindent_summary');
	  }
     public function emis_uniform_indent()
      {
			$block_id =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
			$set=$this->input->post('set');
			$schol =$this->input->post('schol');
			$class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
			
			
		if(!empty($set))
		  {
			$data['uniformboy'] = $this->Beo_blockmodel->uniform_indentboy($scheme,$set,$block_id,$schol,$class);
			$data['uniformgirl'] = $this->Beo_blockmodel->uniform_indentgirl($scheme,$set,$block_id,$schol,$class);	
		  }
		  else if($scheme == 1)
		  {
			$data['uniformboy'] = $this->Beo_blockmodel->uniform_indentboy($scheme,$set,$block_id,$schol,$class);	  
			$data['uniformgirl'] = $this->Beo_blockmodel->uniform_indentgirl($scheme,$set,$block_id,$schol,$class);
		  }	
	 
	    $data['sets']=$set;
	    $data['val']= $data['uniformboy'][0]->hill_frst;
		
	   // echo $val;
	  $this->load->view('beo_Block/emis_beouniform_deeindent',$data);
      }
	  
	    public function emis_desuniform_indent()
      {
			$block_id =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
			$set=$this->input->post('set');
			$schol =$this->input->post('schol');
			$class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			
			
		if(!empty($set))
		  {
			$data['uniformboy'] = $this->Beo_blockmodel->uniform_indentboy($scheme,$set,$block_id,$schol,$class);
			$data['uniformgirl'] = $this->Beo_blockmodel->uniform_indentgirl($scheme,$set,$block_id,$schol,$class);	
		  }
		  else if($scheme == 1)
		  {
			$data['uniformboy'] = $this->Beo_blockmodel->uniform_indentboy($scheme,$set,$block_id,$schol,$class);	  
			$data['uniformgirl'] = $this->Beo_blockmodel->uniform_indentgirl($scheme,$set,$block_id,$schol,$class);
		  }	
	 
	    $data['sets']=$set;
	    $data['val']= $data['uniformboy'][0]->hill_frst;
		
	   // echo $val;
	  $this->load->view('beo_Block/emis_beouniform_dseindent',$data);
  }
 
  
     public function emis_deefootwear_indent()
    {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
			$class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['footwearboy'] = $this->Beo_blockmodel->footwear_indentboy($scheme,$blk,$class);	  
			$data['footweargirl'] = $this->Beo_blockmodel->footwear_indentsgirl($scheme,$blk,$class);
			$this->load->view('beo_Block/emis_deefootwear_indent',$data); 
     }
     public function emis_dsefootwear_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['footwearboy'] = $this->Beo_blockmodel->footwear_indentboy($scheme,$blk,$class);	  
		    $data['footweargirl'] = $this->Beo_blockmodel->footwear_indentsgirl($scheme,$blk,$class);
			$this->load->view('beo_Block/emis_dsefootwear_indent',$data); 
     }
	    public function emis_deebag_indent()
    {
	        $blk =$this->session->userdata('emis_block_id');
		
			$class = "and  class_studying_id >= 1 and  class_studying_id <= 8 and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['bag_indent'] = $this->Beo_blockmodel->bag_indent($class,$blk);	  
			$this->load->view('beo_Block/emis_deebag_indent',$data); 
     }
     public function emis_dsebag_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and  class_studying_id >= 1 and  class_studying_id <= 12 and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['bag_indent'] = $this->Beo_blockmodel->bag_indent($class,$blk);	  
		    $this->load->view('beo_Block/emis_dsebag_indent',$data); 
     }
	 
	  public function emis_deecrayan_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['crayan_indent'] = $this->Beo_blockmodel->crayan_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_deecrayan_indent',$data); 
     }
	  public function emis_dsecrayan_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['crayan_indent'] = $this->Beo_blockmodel->crayan_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_dsecrayan_indent',$data); 
     }
	   public function emis_deecolorpencil_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['colorpencil_indent'] = $this->Beo_blockmodel->colorpencil_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_deecolorpencil_indent',$data); 
     }
	  public function emis_dsecolorpencil_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['colorpencil_indent'] = $this->Beo_blockmodel->colorpencil_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_dsecolorpencil_indent',$data); 
     }
	 
	    public function emis_deegeomentry_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
		
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['geomentry_indent'] = $this->Beo_blockmodel->geomentry_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_deegeomentry_indent',$data); 
     }
	  public function emis_dsegeomentry_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['geomentry_indent'] = $this->Beo_blockmodel->geomentry_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_dsegeomentry_indent',$data); 
     }
	    public function emis_deeatlas_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['atlas_indent'] = $this->Beo_blockmodel->atlas_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_deeatlas_indent',$data); 
     }
	  public function emis_dseatlas_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['atlas_indent'] = $this->Beo_blockmodel->atlas_indent($blk,$class);	  
		    $this->load->view('beo_Block/emis_dseatlas_indent',$data); 
     }
	 
	  public function emis_deesweater_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
			$size=$this->input->post('size');
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['sweater_indent'] = $this->Beo_blockmodel->sweater_indent($scheme,$blk,$class,$size);	  
		    $this->load->view('beo_Block/emis_deesweater_indent',$data); 
     }
	  public function emis_dsesweater_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $size=$this->input->post('size');
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['sweater_indent'] = $this->Beo_blockmodel->sweater_indent($scheme,$blk,$class,$size);	  
		    $this->load->view('beo_Block/emis_dsesweater_indent',$data); 
     }
	 
	  public function emis_deeankleboot_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['ankleboot_indent'] = $this->Beo_blockmodel->ankleboot_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_deeankleboot_indent',$data); 
     }
	  public function emis_dseankleboot_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['ankleboot_indent'] = $this->Beo_blockmodel->ankleboot_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_dseankleboot_indent',$data); 
     }
	 public function emis_deesocks_indent()
	 {
		    $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['socks_indent'] = $this->Beo_blockmodel->socks_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_deesocks_indent',$data); 
     }
	  public function emis_dsesocks_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['socks_indent'] = $this->Beo_blockmodel->socks_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_dsesocks_indent',$data); 
     }
	 
	  public function emis_deeraincoat_indent()
	 {
		    $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'Primary School' or cate_type = 'Middle School')";
	        $data['raincoat_indent'] = $this->Beo_blockmodel->raincoat_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_deeraincoat_indent',$data); 
     }
	  public function emis_dseraincoat_indent()
     {
	        $blk =$this->session->userdata('emis_block_id');
			$scheme = $this->input->get('schemeid');
		    $class = "and (cate_type = 'High School' or cate_type = 'Higher Secondary School')";
	        $data['raincoat_indent'] = $this->Beo_blockmodel->raincoat_indent($scheme,$blk,$class);	  
		    $this->load->view('beo_Block/emis_dseraincoat_indent',$data); 
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
    $this->load->model('Beo_blockmodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Beo_blockmodel->slas_report_schl($blk_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
    $this->load->view('beo_Block/slas_report_schl',$data);
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
    $this->load->model('Beo_blockmodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Beo_blockmodel->slas_report_schl_wise($blk_id, $catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
      $data['manage_id']=$manage_id;
    $this->load->view('beo_Block/slas_report_schl_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_cate_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Beo_blockmodel');
    $blk_id=$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Beo_blockmodel->slas_report_cate_dist($blk_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('beo_Block/slas_report_cate_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_mana_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Beo_blockmodel');
 $blk_id=$this->session->userdata('emis_block_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Beo_blockmodel->slas_report_mana_dist($blk_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('beo_Block/slas_report_mana_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function profile_status_schoolkwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $block_id=$this->session->userdata('emis_block_id');
		  $school_type= $this->input->post('school_type');
		   $data['school_type_c']=$school_type;
		    $data['school_type'] = $this->Statemodel->school_type();
	  $data['block_profile_completion_status'] = $this->Beo_blockmodel->block_profile_completion_status($block_id,$school_type);
	  
	   $this->load->view('beo_Block/emis_block_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}

}
?>