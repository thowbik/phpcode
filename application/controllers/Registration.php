<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


class Registration extends CI_Controller {

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
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->database(); 
    $this->load->library('session'); 
    $this->load->model('Homemodel');
    $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel');
    $this->load->model('Blockmodel');
    $this->load->model('Registermodel');
    $this->load->model('AllApproveModel');

  
  }
// form validations
   function alpha_dash_space($fullname){
if (! preg_match('/^[a-zA-Z0-9\s]+$/', $fullname)) {
$this->form_validation->set_message('alpha_dash_space', 
  'The %s field may only contain alpha characters, numbers & White spaces');
return FALSE;
} else
{
return TRUE;
}
}

function alpha_dash_space_dot($fullname){
if (! preg_match('/^[a-zA-Z0-9\s.]+$/', $fullname)) {
$this->form_validation->set_message('alpha_dash_space_dot', 
  'The %s field may only contain alpha characters, numbers & White spaces');
return FALSE;
} else
{
return TRUE;
}
}

function alpha_dash_space_comma($fullname){
if (! preg_match('/^[a-zA-Z0-9\s,]+$/', $fullname)) {
$this->form_validation->set_message('alpha_dash_space_comma', 
  'The %s field may only contain alpha characters, numbers & White spaces');
return FALSE;
} else
{
return TRUE;
}
}

function alpha_dash_space_comma_dot($fullname){
if (! preg_match('/^[a-zA-Z0-9\s,.]+$/', $fullname)) {
$this->form_validation->set_message('alpha_dash_space_comma_dot', 
  'The %s field may only contain alpha characters, numbers & White spaces');
return FALSE;
} else
{
return TRUE;
}
}


public function emis_student_reg(){
  
 $this->load->library('session');
 $emis_loggedin = $this->session->userdata('emis_loggedin');
 if($emis_loggedin) {
$this->load->library('session'); 
$this->load->database(); 
$this->load->model('Homemodel');
$this->load->model('Datamodel');
$school_id=$this->session->userdata('emis_school_id');
//print_r($school_id);
 $data['incomes'] = $this->Datamodel->getallincomes();
 $data['religions'] = $this->Datamodel->getallreligions();
 $data['launguages'] = $this->Datamodel->getalllaunguages();
 $data['disadvantages'] = $this->Datamodel->getalldisadvantages();
 $data['disabilities'] = $this->Datamodel->getalldisabilities();
 $data['schooldist'] = $this->Datamodel->getallachooldist();
 
  /*not required*/
 $classlist1=$this->Datamodel->getclasslist($school_id);
// print_r($classlist1);
 /*notrequire below*/
 if(!empty($classlist1)){

 $data['classstudying']=$this->Datamodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class,0); 
 $data['classstudying1']=$this->Datamodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class,1); 
 //print_r($data['classstudying']); 
//print_r($school_id);
 $data['mediumofinstruction'] = $this->Datamodel->getallmediumofinst($school_id);
 $data['rtetype'] = $this->Datamodel->getrte_type();
 
 $manage_cate=$this->Datamodel->getmanagecatename($school_id);

 $data['groupcate']   = $this->Datamodel->getallgroupcodes($manage_cate);
 $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
 
 /*schoolnew_schooldepartment*/
 $data['groupcateid'] = $manage_cate;
 
 //print_r($school_id);
 $data['managecateid'] = $this->Datamodel->getmanagecateid($school_id);
 //print_r( $data['managecateid']);die();
 /*required*/
 
 
 
 
 $data['validation_error']="";
 $data['lowestclass'] = $classlist1[0]->low_class;
 $data['highclass'] = $classlist1[0]->high_class;
}
else{?>
  <script type="text/javascript">
    alert("check Your school Profile");
</script>
<?php }

 //echo json_encode($data['lowestclass']);
 $this->load->view('emis_school_studentreg',$data); 

     } else { redirect('/', 'refresh'); }

}

public function getcommunitybyreligion(){

     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {

  $emis_religion =$this->input->post('religion');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getcommunities  = $this->Datamodel->getallcommunity($emis_religion);
    $getcomms='';  
        foreach($getcommunities as $coms)
        {
            $getcomms =$getcomms."<option value='".$coms->id."'>".$coms->community_name."</option>";  
        }
         $comms    =  "<select  class='form-control' tabindex='1' id='emis_reg_community' name='emis_reg_community'>
                                 <option value='' style='color:#bfbfbf;'>சமூக வகை *</option>
                                ".$getcomms."                           
                            </select> ";
                           
        echo $comms; 
          } else { redirect('/', 'refresh'); }
}

public function getsubcastebycomm(){

     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {

  $emis_subcaste =$this->input->post('subcaste');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getsubcastes  = $this->Datamodel->getallsubcaste($emis_subcaste);
    $getcastes='';  
        foreach($getsubcastes as $subs)
        {
            $getcastes =$getcastes."<option value='".$subs->id."'>".$subs->caste_name."</option>";  
        }
         $castes    =  "<select  class='form-control' tabindex='1' id='emis_reg_subcaste' name='emis_reg_subcaste'>
                                 <option value='' style='color:#bfbfbf;'>சாதி *</option>
                                ".$getcastes."                           
                            </select> ";
                           
        echo $castes; 

          } else { redirect('/', 'refresh'); }
}


public function emis_student_data_register(){
	//echo "test function";
     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
    // print_r($this->input->post());die;

    // error_reporting(E_ALL); ini_set('display_errors', '1');
    $this->load->library('session');
    
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->database(); 
          $this->load->model('Registermodel'); 
        date_default_timezone_set('Asia/Calcutta');

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
    $this->form_validation->set_rules('emis_class_studying', 'Class studying', 'trim|required');
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

    if ($this->form_validation->run() == FALSE)
    {
    $school_id=$this->session->userdata('emis_school_id');
 $manage_cate=$this->Datamodel->getmanagecatename($school_id);
 $data['incomes'] = $this->Datamodel->getallincomes();
 $data['religions'] = $this->Datamodel->getallreligions();
 $data['launguages'] = $this->Datamodel->getalllaunguages();
 $data['disadvantages'] = $this->Datamodel->getalldisadvantages();
 $data['disabilities'] = $this->Datamodel->getalldisabilities();
 $data['schooldist'] = $this->Datamodel->getallachooldist();
  $claslimit = $this->Homemodel->getallstandardsbyschool($school_id);
   $data['classstudying'] = $this->Homemodel->getallclassstudying($claslimit[0]->low_class,$claslimit[0]->high_class);
 $data['mediumofinstruction'] = $this->Datamodel->getallmediumofinst($school_id);
 $data['groupcate'] = $this->Datamodel->getallgroupcodes($manage_cate);
 $data['groupcateid'] = $manage_cate;
 $data['sections'] = $this->Datamodel->getallsection($school_id);
  $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
 $data['getalldept']  = $this->Datamodel->getallsection($school_id,$classid);
  $data['managecateid'] = $this->Datamodel->getmanagecateid($school_id);
 $classlist1=$this->Datamodel->getclasslist($school_id); 
 //$data['classlist']=$this->Datamodel->getclasslistsplit($classlist1[0]->low_class,$classlist1[0]->high_class); 
 $data['validation_error']=validation_errors();
 
 $this->load->view('emis_school_studentreg',$data); 
    }
    else
    {
        $school_id=$this->session->userdata('emis_school_id');
        $getstucount=$this->Registermodel->getregstudentcount($school_id);
        $stucount=$getstucount+1;
        $this->Registermodel->getregupdatecount($school_id,$stucount);
        $date = date('Y-m-d');
        $time = date('h:i:s');
        $datetime = $date." ".$time;
        
        $academic_year="";
        $month=date('m');
        $year = date('y');
        if($month<=4){
          $academic_year=$year-1;
        }else{
          $academic_year=$year;
        }

         $udisecode=$this->Registermodel->getudiscecode($school_id);

         $gender = $this->input->post('emis_reg_stu_gender');

         $formatted_value = sprintf("%04d", $stucount);
        
         $candidateid = $udisecode.$academic_year.$gender.$formatted_value; 
		 $dob=$this->input->post('emis_stu_dob');

         /*$Sdt=$this->input->post('emis_reg_stu_date');
         $SMnth=$this->input->post('emis_reg_stu_month');
         $SYr=$this->input->post('emis_reg_stu_year');

         $dob=$SYr.'-'.$SMnth.'-'.$Sdt;

         $Ddt=$this->input->post('emis_reg_doj_date');
         $Dmth=$this->input->post('emis_reg_doj_month');
         $Dyr=$this->input->post('emis_reg_doj_year');

         $doj=$Dyr.'-'.$Dmth.'-'.$Ddt;*/
		 $doj=$this->input->post('emis_reg_stu_doj');
         $classstud=$this->input->post('emis_class_studying');
         $prevclasStud=$this->input->post('emis_prev_class');
         $passfail='';

         if($this->input->post('v1')!="Aadhaar Enrollment not done"){
          $adhaarappliedstatus = 'Applied';
         }
         else
         {
                $adhaarappliedstatus = 'Notapplied';
         }

         if($prevclasStud==$classstud){ $passfail = 'FAIL'; }else{  $passfail = 'PASS'; }

         $data = array(
                      'name'                =>$this->input->post('emis_reg_stu_name'),
                      'name_id_card'        =>$this->input->post('emis_reg_stu_tamilname'),
                      'name_tamil'          =>$this->input->post('emis_reg_stu_idname'),                      
                      'name_tamil_id_card'  =>$this->input->post('emis_reg_stu_idnametamil'),                      
                      'aadhaar_uid_number'  =>$this->input->post('emis_reg_stu_aadhaar'),
                      'enrollmentnumber'    =>$this->input->post('emis_stu_idcard_enroll'),
                      'adhaarappliedstatus'=>$adhaarappliedstatus,
                      'dob'                 =>$dob,
                      'gender'              =>$this->input->post('emis_reg_stu_gender'),
                      'bloodgroup'          =>$this->input->post('emis_reg_stu_bg'),
                      'religion_id'         =>$this->input->post('emis_reg_religion'),
                      'community_id'        =>$this->input->post('emis_reg_community'),
                      'subcaste_id'         =>$this->input->post('emis_reg_subcaste'),
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
                      'school_id'           =>$school_id,
                      'class_studying_id'   =>$this->input->post('emis_class_studying'),
                      'class_section'       =>$this->input->post('emis_reg_stu_section'),
                      'prv_class_std'       =>$this->input->post('emis_prev_class'),
                      'transfer_flag'       =>0,
                      'pass_fail'           =>$passfail,
                      'school_admission_no' =>$this->input->post('emis_reg_stu_admission'),
                      'doj'                 => $doj,
                      'education_medium_id' =>$this->input->post('emis_reg_mediofinst'),
                      'unique_id_no'        =>$candidateid,
                      'group_code_id'       =>$this->input->post('emis_reg_grup_code'),
                      'cbse_subject1_id'    =>$this->input->post('emis_reg_cbsc_sub1'),
                      'cbse_subject2_id'    =>$this->input->post('emis_reg_cbsc_sub2'),
                      'cbse_subject3_id'    =>$this->input->post('emis_reg_cbsc_sub3'),
                      'cbse_subject4_id'    =>$this->input->post('emis_reg_cbsc_sub4'),
                      'cbse_opt_subject_id' =>$this->input->post('emis_reg_cbsc_sub5'),
					  'rte_type' =>$this->input->post('rtetype'),
                      'child_admitted_under_reservation'   =>$this->input->post('emis_reg_stu_rte'),
                      'student_admitted_section'           =>$this->input->post('emis_reg_stu_aidunaid'),
                      'status'                             => "Active",
                      'created_at'                         =>$datetime          
                    );

            
          $registerdata=$this->Registermodel->emissturegdata($data);

          // $key3="";
          // $gender = $this->input->post('emis_reg_stu_gender');
          // if($gender==1){  $key3="b"; }else if($gender==2){ $key3="g"; }else if($gender==3){ $key3="t"; }
          // $class = $this->input->post('emis_class_studying');

          // $key1 = 'c';

          // $comm=$this->Registermodel->getcommunitycode($this->input->post('emis_reg_community'));

          // $colmnnname = $key1.$class."_".$key3;
          // $totalcnname = "total_".$key3;
          // $getval=$this->Registermodel->getsinglecolmnname($colmnnname,$school_id);
          // $getotalval=$this->Registermodel->gettotalcolmnname($totalcnname,$school_id);

          // $getcommval=$this->Registermodel->getsinglecommname($colmnnname,$school_id,$comm);
          // $gecommtotalval=$this->Registermodel->gettotalcommname($totalcnname,$school_id,$comm);
          
          // echo $getval.'<br/>';

          // $setval=$getval+1;
          // $setotalval=$getotalval+1;
          // $data33=array($colmnnname=>$setval);
          // $data44=array($totalcnname=>$setotalval);
          // $res=$this->Registermodel->maxallchildcount($school_id,$data33);
          // $res1=$this->Registermodel->maxallchildcount($school_id,$data44);

          // $setcommval=$getcommval+1;
          // $setotalcommval=$gecommtotalval+1;
          // $data55=array($colmnnname=>$setcommval);
          // $data66=array($totalcnname=>$setotalcommval);
          // $res2=$this->Registermodel->maxallcommcount($school_id,$comm,$data55);
          // $res3=$this->Registermodel->maxallcommcount($school_id,$comm,$data66);

          // echo $res.'<br/>'. $colmnnname;

          $boys  =$this->Registermodel->getstudentdata($school_id,1);
          $girls =$this->Registermodel->getstudentdata($school_id,2);
          $trans =$this->Registermodel->getstudentdata($school_id,3);

          $bc1 = 0; $bc2 = 0;  $bc3 = 0; $bc4 = 0; $bc5 = 0; $bc6 = 0; $bc7 = 0; $bc8 = 0; $bc9 = 0; $bc10 = 0; $bc11 = 0; $bc12 = 0;
          $gc1 = 0; $gc2 = 0;  $gc3 = 0; $gc4 = 0; $gc5 = 0; $gc6 = 0; $gc7 = 0; $gc8 = 0; $gc9 = 0; $gc10 = 0; $gc11 = 0; $gc12 = 0;
          $tc1 = 0; $tc2 = 0;  $tc3 = 0; $tc4 = 0; $tc5 = 0; $tc6 = 0; $tc7 = 0; $tc8 = 0; $tc9 = 0; $tc10 = 0; $tc11 = 0; $tc12 = 0;

          if($boys){
          foreach ($boys as $key1) {
           if($key1->class == 1)  { $bc1 = $key1->count; }  
           if($key1->class == 2)  { $bc2 = $key1->count; }  
           if($key1->class == 3)  { $bc3 = $key1->count; } 
           if($key1->class == 4)  { $bc4 = $key1->count; }  
           if($key1->class == 5)  { $bc5 = $key1->count; }  
           if($key1->class == 6)  { $bc6 = $key1->count; }  
           if($key1->class == 7)  { $bc7 = $key1->count; }  
           if($key1->class == 8)  { $bc8 = $key1->count; }  
           if($key1->class == 9)  { $bc9 = $key1->count; }  
           if($key1->class == 10) { $bc10 = $key1->count; }
           if($key1->class == 11) { $bc11 = $key1->count; } 
           if($key1->class == 12) { $bc12 = $key1->count; } 
          }}
          if($girls){
          foreach ($girls as $key1) {
           if($key1->class == 1)  { $gc1 = $key1->count; }  
           if($key1->class == 2)  { $gc2 = $key1->count; }  
           if($key1->class == 3)  { $gc3 = $key1->count; } 
           if($key1->class == 4)  { $gc4 = $key1->count; }  
           if($key1->class == 5)  { $gc5 = $key1->count; }  
           if($key1->class == 6)  { $gc6 = $key1->count; }  
           if($key1->class == 7)  { $gc7 = $key1->count; }  
           if($key1->class == 8)  { $gc8 = $key1->count; }  
           if($key1->class == 9)  { $gc9 = $key1->count; }  
           if($key1->class == 10) { $gc10 = $key1->count; }
           if($key1->class == 11) { $gc11 = $key1->count; } 
           if($key1->class == 12) { $gc12 = $key1->count; } 
          }}
          if($trans){
          foreach ($trans as $key1) {
           if($key1->class == 1)  { $tc1 = $key1->count; }  
           if($key1->class == 2)  { $tc2 = $key1->count; }  
           if($key1->class == 3)  { $tc3 = $key1->count; } 
           if($key1->class == 4)  { $tc4 = $key1->count; }  
           if($key1->class == 5)  { $tc5 = $key1->count; }  
           if($key1->class == 6)  { $tc6 = $key1->count; }  
           if($key1->class == 7)  { $tc7 = $key1->count; }  
           if($key1->class == 8)  { $tc8 = $key1->count; }  
           if($key1->class == 9)  { $tc9 = $key1->count; }  
           if($key1->class == 10) { $tc10 = $key1->count; }
           if($key1->class == 11) { $tc11 = $key1->count; } 
           if($key1->class == 12) { $tc12 = $key1->count; } 
          }}

          $totalboys = $bc1 + $bc2 + $bc3 + $bc4 + $bc5 + $bc6 + $bc7 + $bc8 + $bc9 + $bc10 + $bc11 + $bc12; 

          $totalgirls = $gc1 + $gc2 + $gc3 + $gc4 + $gc5 + $gc6 + $gc7 + $gc8 + $gc9 + $gc10 + $gc11 + $gc12; 

          $totaltrans = $tc1 + $tc2 + $tc3 + $tc4 + $tc5 + $tc6 + $tc7 + $tc8 + $tc9 + $tc10 + $tc11 + $tc12;  

          $childcountupdate = array(
                      'c1_b' =>$bc1, 'c1_g' =>$gc1, 'c1_t' =>$tc1, 'c2_b' =>$bc2, 'c2_g' =>$gc2, 'c2_t' =>$tc2, 'c3_b' =>$bc3, 'c3_g' =>$gc3, 'c3_t' =>$tc3, 'c4_b' =>$bc4, 'c4_g' =>$gc4, 'c4_t' =>$tc4, 'c5_b' =>$bc5, 'c5_g' =>$gc5, 'c5_t' =>$tc5, 'c6_b' =>$bc6, 'c6_g' =>$gc6, 'c6_t' =>$tc6, 'c7_b' =>$bc7, 'c7_g' =>$gc7, 'c7_t' =>$tc7,  'c8_b' =>$bc8, 'c8_g' =>$gc8, 'c8_t' =>$tc8, 'c9_b' =>$bc9, 'c9_g' =>$gc9, 'c9_t' =>$tc9, 'c10_b' =>$bc10, 'c10_g' =>$gc10, 'c10_t' =>$tc10, 'c11_b' =>$bc11, 'c11_g' =>$gc11, 'c11_t' =>$tc11,  'c12_b' =>$bc12, 'c12_g' =>$gc12, 'c12_t' =>$tc12 , 'total_b' =>$totalboys, 'total_g' =>$totalgirls, 'total_t' =>$totaltrans                  
                    );
           $res=$this->Registermodel->maxallchildcount($school_id,$childcountupdate);


          if($registerdata){  
          $this->session->set_userdata('Student_id',$candidateid);
          $this->session->set_userdata('student_name',$this->input->post('emis_reg_stu_name'));
          }
          // echo true;
          redirect('Registration/emis_student_reg_msg','refresh');
			//die(json_encode($data));
        }

            } else {
				//die(false);
				redirect('/', 'refresh');
			}
}


//  public function sampletest(){
//       $school_id = 2659;
// $this->load->database(); 
//           $this->load->model('Registermodel'); 
//           $boys  =$this->Registermodel->getstudentdata($school_id,1);
//           $girls =$this->Registermodel->getstudentdata($school_id,2);
//           $trans =$this->Registermodel->getstudentdata($school_id,3);

//           $bc1 = 0; $bc2 = 0;  $bc3 = 0; $bc4 = 0; $bc5 = 0; $bc6 = 0; $bc7 = 0; $bc8 = 0; $bc9 = 0; $bc10 = 0; $bc11 = 0; $bc12 = 0;
//           $gc1 = 0; $gc2 = 0;  $gc3 = 0; $gc4 = 0; $gc5 = 0; $gc6 = 0; $gc7 = 0; $gc8 = 0; $gc9 = 0; $gc10 = 0; $gc11 = 0; $gc12 = 0;
//           $tc1 = 0; $tc2 = 0;  $tc3 = 0; $tc4 = 0; $tc5 = 0; $tc6 = 0; $tc7 = 0; $tc8 = 0; $tc9 = 0; $tc10 = 0; $tc11 = 0; $tc12 = 0;

//           if($boys){
//           foreach ($boys as $key1) {
//            if($key1->class == 1)  { $bc1 = $key1->count; }  
//            if($key1->class == 2)  { $bc2 = $key1->count; }  
//            if($key1->class == 3)  { $bc3 = $key1->count; } 
//            if($key1->class == 4)  { $bc4 = $key1->count; }  
//            if($key1->class == 5)  { $bc5 = $key1->count; }  
//            if($key1->class == 6)  { $bc6 = $key1->count; }  
//            if($key1->class == 7)  { $bc7 = $key1->count; }  
//            if($key1->class == 8)  { $bc8 = $key1->count; }  
//            if($key1->class == 9)  { $bc9 = $key1->count; }  
//            if($key1->class == 10) { $bc10 = $key1->count; }
//            if($key1->class == 11) { $bc11 = $key1->count; } 
//            if($key1->class == 12) { $bc12 = $key1->count; } 
//           }}
//           if($girls){
//           foreach ($girls as $key1) {
//            if($key1->class == 1)  { $gc1 = $key1->count; }  
//            if($key1->class == 2)  { $gc2 = $key1->count; }  
//            if($key1->class == 3)  { $gc3 = $key1->count; } 
//            if($key1->class == 4)  { $gc4 = $key1->count; }  
//            if($key1->class == 5)  { $gc5 = $key1->count; }  
//            if($key1->class == 6)  { $gc6 = $key1->count; }  
//            if($key1->class == 7)  { $gc7 = $key1->count; }  
//            if($key1->class == 8)  { $gc8 = $key1->count; }  
//            if($key1->class == 9)  { $gc9 = $key1->count; }  
//            if($key1->class == 10) { $gc10 = $key1->count; }
//            if($key1->class == 11) { $gc11 = $key1->count; } 
//            if($key1->class == 12) { $gc12 = $key1->count; } 
//           }}
//           if($trans){
//           foreach ($trans as $key1) {
//            if($key1->class == 1)  { $tc1 = $key1->count; }  
//            if($key1->class == 2)  { $tc2 = $key1->count; }  
//            if($key1->class == 3)  { $tc3 = $key1->count; } 
//            if($key1->class == 4)  { $tc4 = $key1->count; }  
//            if($key1->class == 5)  { $tc5 = $key1->count; }  
//            if($key1->class == 6)  { $tc6 = $key1->count; }  
//            if($key1->class == 7)  { $tc7 = $key1->count; }  
//            if($key1->class == 8)  { $tc8 = $key1->count; }  
//            if($key1->class == 9)  { $tc9 = $key1->count; }  
//            if($key1->class == 10) { $tc10 = $key1->count; }
//            if($key1->class == 11) { $tc11 = $key1->count; } 
//            if($key1->class == 12) { $tc12 = $key1->count; } 
//           }}

//           echo $bc1;
//           echo $bc2;
//           echo $bc3;
//           echo $bc4;
//           echo $bc5;
//           echo $bc6;
//           echo $bc7;
//           echo $bc8;
//           echo $bc9;
//           echo $bc10;
//           echo $bc11;
//           echo $bc12;
// echo "<br/>";
//            echo $gc1;
//           echo $gc2;
//           echo $gc3;
//           echo $gc4;
//           echo $gc5;
//           echo $gc6;
//           echo $gc7;
//           echo $gc8;
//           echo $gc9;
//           echo $gc10;
//           echo $gc11;
//           echo $gc12;

// echo "<br/>";
//            echo $tc1;
//           echo $tc2;
//           echo $tc3;
//           echo $tc4;
//           echo $tc5;
//           echo $tc6;
//           echo $tc7;
//           echo $tc8;
//           echo $tc9;
//           echo $tc10;
//           echo $tc11;
//           echo $tc12;
//  }

public function emis_student_reg_msg(){

     $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
 $this->load->library('session');  
 $this->load->library('form_validation');
 $this->load->helper(array('form', 'url'));    
 $this->load->view('emis_school_regmsg'); 

   } else { redirect('/', 'refresh'); }
}

public function getallsectionsbyclass(){

   $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {
    $school_id=$this->session->userdata('emis_school_id');
    $classid = $this->input->post('classid');
    $getalldept  = $this->Datamodel->getallsection($school_id,$classid);
    $getdept='';
   
          
          
           foreach($getalldept as $dept) {
                            $getdept =$getdept."<option value='".$dept->section."'>".$dept->section."</option>";  
                        }
                        $section   =  "<select  class='form-control' id='emis_reg_stu_section_edit' name='emis_reg_stu_section_edit'>
                                 <option value='' style='color:#bfbfbf;'>பிரிவு *</option>
                                ".$getdept."                           
                            </select> ";
                           
                        echo $section;
                        
    }else { redirect('/', 'refresh'); }
  }
  
 /* public function getallsectionsbyclass() {
    $school_id=$this->session->userdata('emis_school_id');
    $classid = $this->input->post('classid');
    print_r($school_id);
    print_r($classid);
  }*/


//**************** Aadhaar Existance Verification controller ********************************************//

  public function aadhaarverification(){

   $this->load->library('session');
   $emis_loggedin = $this->session->userdata('emis_loggedin');
   if($emis_loggedin) {


    $this->load->library('session'); 
    $aadhaar=$this->input->post('aadhaar');
    $this->load->database(); 
    $this->load->model('Registermodel');
    $aadhaarverifi  = $this->Registermodel->aadhaarverifi($aadhaar);
    if($aadhaarverifi) { echo 1; } else { echo 0; }

   } else { redirect('/', 'refresh'); }
  }




  // public function test(){

  //   $this->load->library('session'); 
  //   $school_id=$this->session->userdata('emis_school_id');
  //   $this->load->database(); 
  //    $this->load->model('Homemodel');
  //    $this->load->model('Registermodel');

  //    $studentid = $this->session->userdata('emis_stud_id');
  //    $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);


  //     // /* first reduce that count */
  //     // $alreadyselectgender =  $stuprofile1[0]->gender;

  //     // $set3=""; 
  //     // $setgender = $alreadyselectgender;
  //     // if($setgender==1){  $set3="b"; }else if($setgender==2){ $set3="g"; }else if($setgender==3){ $set3="t"; }
  //     // $setclass = $stuprofile1[0]->class_studying_id;

  //     // $set1 = 'c';

  //     // $setcolmnnname = $set1.$setclass."_".$set3;
  //     // $settotalcnname = "total_".$set3;
  //     // $settval=$this->Registermodel->getsinglecolmnname($setcolmnnname,$school_id);
  //     // $settotalval=$this->Registermodel->gettotalcolmnname($settotalcnname,$school_id);

  //     // echo 'class '.$setcolmnnname.'<br/>';
   
  //     // $setval1=$settval-1;
  //     // $setotalval1=$settotalval-1;
  //     // $data00=array($setcolmnnname=>$setval1);
  //     // $data11=array($settotalcnname=>$setotalval1);
  //     // $this->Registermodel->maxallchildcount($school_id,$data00);
  //     // $this->Registermodel->maxallchildcount($school_id,$data11);

  //     // /*  fininsh reudce gneder count */


  //     // $key3="";
  //     // $gender = 2;
  //     // if($gender==1){  $key3="b"; }else if($gender==2){ $key3="g"; }else if($gender==3){ $key3="t"; }
  //     // $class = $stuprofile1[0]->class_studying_id;

  //     // $key1 = 'c';

  //     // $colmnnname = $key1.$class."_".$key3;
  //     // $totalcnname = "total_".$key3;
  //     // $getval=$this->Registermodel->getsinglecolmnname($colmnnname,$school_id);
  //     // $getotalval=$this->Registermodel->gettotalcolmnname($totalcnname,$school_id);
   

  //     // $setval=$getval+1;
  //     // $setotalval=$getotalval+1;
  //     // $data33=array($colmnnname=>$setval);
  //     // $data44=array($totalcnname=>$setotalval);
  //     // $res=$this->Registermodel->maxallchildcount($school_id,$data33);
  //     // $res1=$this->Registermodel->maxallchildcount($school_id,$data44);

  //    $school_id=$this->session->userdata('emis_school_id');
  //       $getstucount=$this->Registermodel->getregstudentcount($school_id);
  //       $stucount=$getstucount+1;
  //       $this->Registermodel->getregupdatecount($school_id,$stucount);

  //       $formatted_value = sprintf("%04d", $stucount);

  //       echo $formatted_value;


  // }


/***********************************************************************
        Function created by Ramco Magesh Elumalai 20-02-2019
***********************************************************************/
    public function new_school() {
        $part = $this->uri->segment(3,0);
        
        if($part==1) {
            $table[1] = 'newschool_details';
            $characters = '0123456789';
            $string = '';
            $max = strlen($characters);
            for ($i = 0; $i < 8; $i++) {
                $string .= $characters[mt_rand(0, sprintf("%06d",$max))];
            }  
            $password = md5($string); 
            for($i=0;$i<7;$i++){
               $temp_id.= $characters[rand(0,25)].rand(0,9);
            }
            
            $created_date = date('Y-m-d',strtotime('now+5hours30minutes'));
            $_POST['created_date']=$created_date;
            $_POST['emis_password']=$password;
            $_POST['ref']=$string;
            $_POST['temp_id']=$temp_id;
            $referid='temp_id';
            $tablelist = $this->Datamodel->getTableDescribtion($table[$part]);
            foreach($_POST as $post=> $value){
              foreach($tablelist as $tb){
                    if($tb['Field']==$post){
                        $data[$post] = $value;
                    }
              }   
            }
            $email=$_POST['email'];
            $this->send_mail($email,$temp_id,$string);
           if(!$this->Homemodel->insertorupdatedata($data, $table[$part],$part,$referid,$temp_id)){
            die('error');
           }
       }elseif($part==3) { 
           if($this->session->userdata('temp_id')==''){ 
               $temp_id = $this->input->post('emis_username');
               $emis_password = md5($this->input->post('emis_password'));
               $schooldetails=$this->Homemodel->loginverfication($temp_id,$emis_password);
               //print_r($schooldetails);die();
               if($schooldetails != null && $schooldetails[0]['temp_id'] == $temp_id && $schooldetails[0]['emis_password'] == $emis_password) {
                    $this->session->set_userdata('temp_id',$schooldetails[0]->temp_id);
                    $this->session->set_userdata('emis_password',$schooldetails[0]->emis_password);
                    $data['profile']=$this->Homemodel->getProfileComplete($schooldetails[0]['temp_id']);
               }
               else{
                    if($this->uri->segment(4,0)!='' && $this->uri->segment(4,0)!=0){
                        $this->session->set_userdata('temp_id',$this->uri->segment(4,0));
                        redirect('Registration/new_school/3','refresh');
                    }else{
                        redirect('Registration/new_school/0','refresh');
                    }
               }
           }
           else{
               
               if($this->uri->segment(4,0)!='' && $this->uri->segment(4,0)!=0){
                        $this->session->set_userdata('temp_id',$this->uri->segment(4,0));
                        redirect('Registration/new_school/3','refresh');
               }
                
               $temp_id=$this->session->userdata('temp_id');
               $emis_password=$this->session->userdata('emis_password');
               $data['profile']=$this->Homemodel->getProfileComplete($temp_id);
               $schooldetails=$this->Homemodel->loginverfication($temp_id,$emis_password);
           }
           $data['school_details']=$schooldetails;
           $data['schooldist'] = $this->Datamodel->get_alldistricts();
           $data['management_cate']=$this->Datamodel->get_allmajorcategory();
           $data['schoolcategory']=$this->Datamodel->getallschoolcategory();
           $data['schoolclassstudying']=$this->Datamodel->getallclassstudying();
           
           $profile=$this->Homemodel->getProfileComplete($temp_id);
           //print_r($profile);die();
           if($profile[0]['part_1']==1 && $profile[0]['part_2']==1 && $profile[0]['part_3']==1){
                if($profile[0]['final_flag']==1){
                    $part=7;
                }
                else{
                    $part=6;
                }
            }else{
                $part=3;
            }
       }elseif($part ==4){
               $temp_id=$this->session->userdata('temp_id');
               $data['profile']=$this->Homemodel->getProfileComplete($temp_id);
               $emis_password=$this->session->userdata('emis_password');
               $schooldetails=$this->Homemodel->loginverfication($temp_id,$emis_password);
       }elseif($part == 5) {
            $data['bank']=$this->Datamodel->getbankList();
            $a=' WHERE upgradation=-1 or upgradation=0';
             $temp_id=$this->session->userdata('temp_id');
             $data['profile']=$this->Homemodel->getProfileComplete($temp_id);
            $data['certificate'] = json_decode(json_encode($this->Homemodel->getCertificateMaster($a)),true);
            //print_r($data['certificate']);
            //die();
       }elseif($part ==6){
            $schooldetails=$this->Homemodel->loginverfication($this->session->userdata('temp_id'),$this->session->userdata('emis_password'));
            $profile=$this->Homemodel->getProfileComplete($this->session->userdata('temp_id'));
            if($profile[0]->part_1==1 && $profile[0]->part_2==1 && $profile[0]->part_3==1){
                $part=6;
            }else{
                $part=5;
            }
       
       }elseif($part ==7) {
           
		   $table[7] = 'newschool_details';
           $table[8] = 'newschool_registercomplete';
           
		   $referid='temp_id';
		   $refervalue=$_SESSION['temp_id'];
          
           
           foreach($table as $tbli => $tableentry){
	           $tablelist = $this->Datamodel->getTableDescribtion($tableentry);
                if($tableentry == 'newschool_details') {
                  $_POST['address']=$_POST['addressline_1'].'\n'.$_POST['addressline_2'];
		          foreach($_POST as $post => $value){
			         
			         foreach($tablelist as $tb) {
				        if($tb['Field']== $post) {
					       $data[$post] = $value;
				        } 
			         }
		          }
                $data['temp_id']=$refervalue;
                //print_r($data);
                //die();
                $referid='temp_id';
             
              }else if($tableentry == 'newschool_registercomplete') {
                $data = array(
                    'part_1'     => 1
                );
                
              }
              $data['temp_id']=$refervalue;
              $referid='temp_id';
                
              if(!$this->Homemodel->insertorupdatedata($data, $tableentry,$part,$referid,$refervalue)){
				die('error');
			  }else {
			     $part=4;
              }  
             
             
           }
        }else if($part ==8) {
		   $table[8]  = 'newschool_detailsland';
           $table[9]  = 'schoolnew_natureofconst_entry';
           $table[10] = 'schoolnew_classroomlevel_entry';
           $table[11] = 'schoolnew_library_entry';
           $table[12] = 'newschool_registercomplete';
           
		   $referid='temp_id';
		   $refervalue=$_SESSION['temp_id'];
           $created_date = date('Y-m-d',strtotime('now+5hours30minutes'));
           
           
           
           //print_r($refervalue);
           //die();
           
           foreach($_POST as $post => $value) {
            //echo($post.'<br>');continue;
            switch($post) {
             
             case 'hiddennoc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['noc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'             =>      $refervalue,
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
                                        'school_key_id'     =>      $refervalue,
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
                                        'school_key_id'         =>      $refervalue,
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
             }
         }
        
            foreach($table as $tbli => $tableentry){
                if($tableentry == 'newschool_detailsland') {
                    $tablelist = $this->Datamodel->getTableDescribtion($tableentry);
                    foreach($_POST as $post => $value){
			             foreach($tablelist as $tb) {
				            if($tb['Field']== $post) {
					           $data[$post] = $value;
				            } 
			             }
		              }
                      $data['temp_id']=$refervalue;
                      $referid='temp_id';
                }else if($tableentry == 'newschool_registercomplete') {
                     $data = array(
                            'part_2'     => 1
                             );
                     $data['temp_id']=$refervalue;
                     $referid='temp_id';
                }else{
                    $data = $_POST[$tableentry];
                    $referid='school_key_id';
                } 
               
                if(!$this->Homemodel->insertorupdatedata($data,$tableentry,$part,$referid,$refervalue)){
				    die('error');
   	            }
            }
            
            $a=' WHERE upgradation=-1 or upgradation=0';
            $data['certificate'] = json_decode(json_encode($this->Homemodel->getCertificateMaster($a)),true);
            //die('Success');
            redirect('Registration/new_school/5');
	   }else if($part == 9) {
           $table[9] = 'schoolnew_fund';
           $table[10] = 'schoolnew_renewal';
           $table[11] = 'schoolnew_renewcategory';
           $table[12] = 'schoolnew_renewalfiles';
           $table[13] = 'schoolnew_documententry';
           $table[14] = 'schoolnew_trustentry';
           $table[15] = 'newschool_registercomplete';
           
           
          
           
            $bucket = 'renewalapplicationemis';
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
	       } catch (Exception $e) {
		  // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		  // return a json object.
	    	die("Error:unable to connect" . $e->getMessage());
	    }
             
            $referid='temp_id';
		    $refervalue=$_SESSION['temp_id'];
            
            $created_date = date('Y-m-d',strtotime('now+5hours30minutes'));
            
            $filename = ['certificate_','feechallanpath_'];
            $where = ' where upgradation = 0 or upgradation = -1'; 
            $certificate=$this->Homemodel->getCertificateMaster($where);
            $i=1;
            
            foreach($filename as $file) {
                
                $var = $file.$i;
                
                while(isset($_FILES[$var])){
                    $var = $file.$i;
                
                $total = count($_FILES[$var]['name']);
              
                    for($j=0;$j<$total; $j++){
                        
                        if(!is_array($_FILES[$var]['name'])){
                            if($_FILES[$var]['name'] !=null && $_FILES[$var]['name']!='') {
                            //echo $_FILES[$var]['name'];
                            $a = $_FILES[$var]['name'];
                            $mime=$_FILES[$var]['type'];
                            $tmpname=$_FILES[$var]['tmp_name'];
                            //echo $a.'<br/>';
                            }else{
                                continue;
                            }
                        }else 
                        
                            if(is_array($_FILES[$var]['name'])) {
                             if($_FILES[$var]['name'][$j] !=null && $_FILES[$var]['name'][$j]!='') {
                                $a = $_FILES[$var]['name'][$j];
                                $mime=$_FILES[$var]['type'][$j];
                                $tmpname=$_FILES[$var]['tmp_name'][$j];
                                //echo $a.'<br/>';
                                //die();
                            }else {
                                continue;
                            }
                            }
                        
                        $keyname = 'NEW_SCHOOL/'.$a;
                        $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucket . '/' . $keyname;
                        try {    
	                       $s3->putObject(
                                array(
				                                'Bucket'        =>  $bucket,
				                                'Key'           =>  $keyname,
				                                'SourceFile'    =>  $tmpname,
				                                'StorageClass'  =>  'STANDARD',
                                                'ContentType'   =>  $mime,
                                                'ACL'           => 'public-read'
                                                
                                )
                            );
                            $s3->waitUntil('ObjectExists', array(
                                            'Bucket' => $bucket,
                                            'Key'    => $keyname
                            ));
                            $plainUrl = $s3->getObjectUrl($bucket, $keyname); 
                                //echo $plainUrl.'<br/>';
                                $filesArray[$var][$j]=$plainUrl;  
                                //echo $filesArray[$var][$j].'<br/>';     
                                 //echo('<br>'.$var.'---'.$j.'  ');print_r($filesArray);
                            } catch (S3Exception $e) {
                                die('Error:'.$e->getMessage());
                            } catch (Exception $e) {
                                die('Error:'.$e->getMessage());
                            }
                        }
                         
                    
                        //print_r($_FILES);
                       // die();
                       $i++;
                }
                $i=1;
            }
           
           $renewalid ='';
           $data=array(
                    'auth'                 => 0,
                    'timestamp'            => $timestamp);
                   
            /*if(!($renewal=$this->Homemodel->RenewalInsert($data,'schoolnew_renewal',2))){
                die('Renewal Failed');
            }*/
           
           $_POST['school_key_id']=$refervalue;
           
           foreach($_POST as $post => $value) {
            
                switch($post) {
             
                    case 'hiddendoc_0':{$i=0;$dtmulti=array();
                        while(isset($_POST['docno_'.$i])){
                         $dtmulti[$i]=array(
                                        'temp_id'          =>      $refervalue,
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
                                        'temp_id'          =>      $refervalue,
                                        'trustname'        =>      $_POST['trustname_'.$i],
                                        'trustplace'       =>      $_POST['trustplace_'.$i]
                                     );
                        $i++;
                        }
                        $tbname=$_POST['hiddentrustmgt_0'];
                        $_POST[$tbname]=$dtmulti;
                       
                        break;
                    }
                    
                    case 'hiddenchallan_0':{
                                        
                                        $_POST['applied_category']  = 4;
                                        $_POST['amount']            = $_POST['feeamount_0'];
                                        $_POST['challan_no']        = $_POST['feechallanno_0'];
                                        $_POST['challan_date']      = $_POST['feechallandate_0'];
                                        $_POST['ifsc_code']         = $_POST['feeifsccode_0'];
                                        $_POST['challan_filename']  = $_FILES['feechallanpath_1']['name'];
                                        $_POST['challan_filepath']  = $filesArray['feechallanpath_1'][0]; 
                        break;
                    }
                    
                }
           }
           
           unset($data);
           foreach($table as $tbli => $tableentry) {
               
                    //print_r($table);die();
                    $tablelist = $this->Datamodel->getTableDescribtion($tableentry);
                    
                    if($tableentry=='schoolnew_fund' || $tableentry=='schoolnew_renewal'){
                        $referid='school_key_id';
                        
                    }
                    elseif($tableentry=='schoolnew_renewcategory' || $tableentry=='schoolnew_renewalfiles'){
                        $referid='renewal_id';
                    }
                    elseif($tableentry=='schoolnew_documententry' || $tableentry=='schoolnew_trustentry'){
                        $referid='temp_id';
                    }
                    
                    
                    if($tableentry=='schoolnew_renewcategory' || $tableentry=='schoolnew_fund' || $tableentry=='schoolnew_renewal'){
                            $insert=2;
                            foreach($_POST as $post => $value){
                                foreach($tablelist as $tb){
                                    if($tb['Field'] == $post) {
                                       $data[$post] = $value;
                                    }
                                }
                            }
                           //print_r($_POST);echo('<br><br>');
                           //die();
                    }
                    else{
                        $insert=3;
                        if($tableentry=='schoolnew_renewalfiles'){
                             $z=0;
                               foreach($certificate as $cer){
                                    $cerid=$cer->id; 
                                    $var='certificate_'.$cerid;
                                    $j=0;
                                    if(isset($filesArray[$var])){
                                        foreach($filesArray[$var] as $index => $filepath){
                                            $data[$z]=array(  
                                                'renewal_id'            =>  $_POST['renewal_id'],                          
                                                'certificate_id'        =>  $cerid,
                                                'certificate_filename'  =>  $_FILES[$var]['name'][$j++],
                                                'certificate_filepath'  =>  $filepath,
                                                'auth'                  =>  0
                                            );
                                           
                                            $z++;
                                        }
                                    
                                    }
                                  
                                }
                                $_POST['schoolnew_renewalfiles'] = $data;
                        }
                        unset($data);
                        $data=$_POST[$tableentry];
                    }
                    if($tableentry=='newschool_registercomplete'){
                        $data = array('part_3' => 1);
                        $referid='temp_id';
                        $insert=2;
                        $part = 6;
                        
                    }
                   
                    if($lstid=$this->Homemodel->insertorupdatedata($data,$tableentry,$part,$referid,$refervalue,$insert)){
				        if($tableentry=='schoolnew_renewal'){
				            $_POST['renewal_id']=$lstid;
                            $refervalue = $lstid;
                            //echo($lstid.'<br><br>');
                            //print_r($_POST);die();
				        }elseif($tableentry == 'schoolnew_renewalfiles'){
				            $refervalue = $_SESSION['temp_id'];
				        }
   	                }
                    else{
                        die('Error Insert');
                    }
                    unset($data);
           }
           //print_r($data);
           //die();
          
                       
           
	   }elseif($part==10){
	       $checkbox = $this->input->post('checkbox');
           if($checkbox!=null){
                $tableentry = 'newschool_registercomplete';
                $data = array('final_flag' => $checkbox);
                $referid = 'temp_id';
                $refervalue=$_SESSION['temp_id'];
                if(!$this->Homemodel->insertorupdatedata($data, $tableentry,$part,$referid,$refervalue)){
				    die('error');
			    }else {
			         $part = 7;
                }
            }
           
	   }
       elseif($part==0){
        $part = 0;
       }else{
                $data['class'] = 'alert alert-danger';
                $data['error']='Invalid Login Details. Please try again..!';
                $this->session->set_userdata('temp_id',$schooldetails[0]->temp_id);
                $this->session->set_userdata('emis_password',$schooldetails[0]->emis_password);
                $part=2;
       }
       /*else if($part == 10) {
	       
           $this->session->set_userdata('temp_id',$schooldetails[0]->temp_id);
           $this->session->set_userdata('emis_password',$schooldetails[0]->emis_password);
           $temp_id       = $_SESSION['temp_id'];
           $emis_password = $_SESSION['emis_password'];
	       $schooldetails=$this->Homemodel->loginverfication($temp_id,$emis_password);
           if($schooldetails != null && $schooldetails[0]->temp_id == $temp_id && $schooldetails[0]->emis_password == $emis_password) {
               $data['school_details']=$schooldetails;
	           $this->load->view('newSchool/schoolregistration',$data); 
           }
	   }*/
        /**/
        //print_r($part);
        switch($part) {
            case 0: $this->load->view('newSchool/tempregistration',$data); break;
            case 1: $this->load->view('newSchool/tempregistration1',$data); break;
            case 2: $this->load->view('newSchool/tempregistration2',$data); break;
            case 3: $this->load->view('newSchool/schoolregistration',$data); break;
            case 4: $this->load->view('newSchool/schoolregistration1',$data); break;
            case 5: $this->load->view('newSchool/schoolregistration2',$data); break;
            case 6: $this->load->view('newSchool/schoolregistration3',$data);break;
            case 7: redirect('Registration/newschoolstatus','refresh');
            //$this->load->view('newSchool/newschoolcompletion',$data);
            break;
        }
    }
    
    public function newschoolstatus() {
         $temp_id=$this->session->userdata('temp_id');
         $data['profile']=$this->Homemodel->getProfileComplete($temp_id);
             
         $where=" schoolnew_renewal.school_key_id=".$temp_id." AND schoolnew_renewal.vaild_upto IS NULL";
         $category=$this->AllApproveModel->getRenewCategory($temp_id);
         $data['renew']=$this->AllApproveModel->AllApproveExcute($where,'',$category[0]['applied_category'],'');
         $data['user']=$this->AllApproveModel->getAllUserCategory();  
         
         $groupby = " group by temp_id";            
         $data['rc']=$this->Homemodel->registercompletecount($groupby);
         $this->load->view('newSchool/newschoolcompletion',$data);
         
    } 
    
    public function send_mail($email,$temp_id,$string) {
         $from_email = "donotreply.emis@gmail.com";
	     //$encr1=base64_encode(base64_encode($to_email));
         //$encr2=$this->emis_crypt($encr1,'e');
         
         //Load email library
         $config = Array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'donotreply.emis@gmail.com',
		    'smtp_pass' => 'tnemisssa',
		    'mailtype'  => 'txt', 
		    'charset'   => 'utf-8'
		);
         $this->load->library('email',$config);
         $this->email->set_newline("\r\n");	
 		 $this->email->from($from_email, 'info emis');
         $this->email->to($email);
		 
         $this->email->subject('EMIS | Temporary Login for New School Registration');
         $this->email->message('Username:'.$temp_id.'  password:'.$string.'
         Follow this link: 
        	'.base_url().' click on link.');
         //Send mail
         if($this->email->send()){
            //echo 'email sent';
         }else{
            //echo "Email not sent ";
         }
       
    }
    
    function emis_crypt($string,$action) {
    // you may change these values to your own
    $secret_key = 'billa';
    $secret_iv = 'mangatha';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
    }
    
    
    
    
    /*public function insertsingleormulticorrection(){
        //$this->insertsingleormulticorrection();
        $created_date = date('Y-m-d',strtotime('5hours30minutes'));
        foreach($_POST as $post => $value) {
            switch($post) { 
                case 'school_name': $_POST['school_name']=$_POST['school_name'];break;
                case 'email'      : $_POST['sch_email'] = $_POST['sch_email']; break;
            }
            
        }
        print_r($post);
    }*/
    
    public function getalldetails() {
        $selectaddress = $this->uri->segment(3,0);
        //print_r($selectaddress);
        
        $table[0] = 'schoolnew_management';
        $table[1] = 'schoolnew_school_department';
        $table[2] = 'schoolnew_block';                 //Based On District_ID
        $table[3] = 'schoolnew_zone_type';  
        $table[4] = 'schoolnew_localbody_all';        //Based On District_ID and ZoneTypeID
        $table[5] = 'schoolnew_habitation_all';     //Based On LocalBodyID and Zonetype
        $table[6] = 'schoolnew_assembly';           //Based On District_id
        $table[7] = 'schoolnew_parliament';          //Based On Assembly_id
        $table[8] = 'schoolnew_edn_dist_mas';
        $table[9] = 'schoolnew_cluster_mas';         //Based On Block_ID
        
        
        $tablelist = $this->Datamodel->getTableDescribtion($table[$selectaddress]);
        switch($selectaddress) {
            case 0: $this->Homemodel->Selectoption($this->Datamodel->get_allsubcategory($this->input->post('manage_cate_id')),$tablelist,$selectaddress); break;
            case 1: $this->Homemodel->Selectoption($this->Datamodel->get_alldeptcategory($this->input->post('sch_management_id')),$tablelist,$selectaddress); break;
            case 2: $this->Homemodel->Selectoption($this->Datamodel->get_allblocks($this->input->post('district_id')),$tablelist,$selectaddress); break;
            case 3: $this->Homemodel->Selectoption($this->Datamodel->getDistrictBasedLocalBody($this->input->post('district_id'),$this->input->post('urbanrural')),$tablelist,$selectaddress); break;
            case 4: $this->Homemodel->Selectoption($this->Datamodel->getZonebyDistrict($this->input->post('district_id'),$table[$selectaddress],$this->input->post('local_body_type_id')),$tablelist,$selectaddress); break;
            case 5: $this->Homemodel->Selectoption($this->Datamodel->getAllHabitationBylocalbidyid($this->input->post('village_panchayat_id')),$tablelist,$selectaddress); break;
            case 6: $this->Homemodel->Selectoption($this->Datamodel->getAssemblyIDbyDistrict($this->input->post('district_id')),$tablelist,$selectaddress); break;
            case 7: $this->Homemodel->Selectoption($this->Datamodel->getParlimentIDbyDistrict($this->input->post('assembly_id')),$tablelist,$selectaddress); break;
            case 8: $this->Homemodel->Selectoption($this->Datamodel->getEducationDistrictbyDistrict($this->input->post('district_id')),$tablelist,$selectaddress); break;
            /*case 9: $this->Homemodel->Selectoption();
            case 10: $this->Homemodel->Selectoption();*/
            
        }
    }
    
    function getPartInformationByPost(){
        $tableNames[0]='newschool_details'; //temp_id
        $tableNames[1]='newschool_detailsland'; //temp_id
        $tableNames[2]='schoolnew_fund'; //school_key_id
        
        
        /*$tableNames[0]='schoolnew_basic_detail';
        $tableNames[1]='schoolnew_academic_detail';
        $tableNames[2]='schoolnew_infra_detail';
        $tableNames[3]='schoolnew_training_detail';
        $tableNames[4]='schoolnew_textbook_detail';
        $tableNames[5]='schoolnew_committee_detail';
        $tableNames[6]='schoolnew_fund';*/
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);die();
        
        /*foreach($data as $pidx => $pval){
            echo($pidx."<br>");
        }*/
        $school_udise=$this->session->userdata('temp_id')==''?$this->uri->segment(3,0):$this->session->userdata('temp_id');
        
        foreach($tableNames as $key => $table){
            if($table=='schoolnew_fund'){
                $referID='school_key_id';$referValue=$school_udise;
            }
            else{
                $referID='temp_id';$referValue=$school_udise;
            }
            $tdata=$this->Homemodel->ModelForAllParts($table,$referID,$referValue);
            /*if(!($tdata=$this->Homemodel->ModelForAllParts($table,$referID,$referValue)))
            {
                die('Error In DataBase');
            }*/
            $yearreccheckbit=0;$yearrec=array();
            if(isset($tdata[0])){
                foreach($tdata[0] as $tidx =>$tval){
                    //print_r($tidx);
                    foreach($data as $pidx => $pval){
                        if($tidx == $pidx){
                            $vdata[$tidx]=$tval;
                            $i++;
                        }
                        else{
                            switch($tidx){
                                case 'urbanrural':{$vdata['urbanrural']=$tval==0?2:$tval;
                                $vdata['urbanruraltext']=($vdata['urbanrural']=='2'?'Urban':'Rural');break;}
                                case 'address':$add=explode('\n',$tval);$vdata['addressline_1']=$add[0];$vdata['addressline_2']=$add[1];
                                case 'yr_rec_schl_elem':
                                case 'yr_rec_schl_sec':
                                case 'yr_rec_schl_hsc':{
                                     if(($tval!=0 || $tval!=null)){
                                        if($tidx=='yr_rec_schl_elem' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=1;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_elem';
                                        }
                                        elseif($tidx=='yr_rec_schl_sec' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=2;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_sec';
                                        }
                                        elseif($tidx=='yr_rec_schl_hsc' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=3;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_hsc';
                                        }
                                        
                                     }
                                    break;
                                }
                                case 'local_body_id':$vdata['localbody_id']=$tval;break;
                                case 'lb_vill_town_muni':$vdata['village_ward']=$tval;break;
                                case 'lb_habitation_id':$vdata['vill_habitation_id']=$tval;break;
                            }
                        }
                    }
                }
            }
        }
        
        
        foreach($data as $pidx => $pval){
            if (strpos($pidx, 'hidden') !==false) {
                
                if($pval == 'schoolnew_renewalfiles' || $pval == 'schoolnew_renewcategory'){
                    $tdata=$this->Homemodel->ModelForAllParts('schoolnew_renewal','school_key_id',$referValue);
                    $referValue = $tdata[0]->id;
                    //print_r($referValue);
                    //die();
                    $referID='renewal_id';
                }elseif($pval == 'newschool_documententry' || $pval == 'newschool_trustentry' ){
                    $referID='temp_id';$referValue=$school_udise;
                }
                else {
                     $referID='school_key_id';$referValue=$school_udise;
                }
               
                $tdata=$this->Homemodel->ModelForAllParts($pval,$referID,$referValue);
                switch($pidx){
                    case 'hiddenmedium_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            if($tval->other_medium!=''){
                                $vdata['ifothers_'.$i]=$tval->other_medium;
                            }
                            $vdata['instructedlang_'.$i]=$tval->medium_instrut;
                            $i++;
                            //print_r($tval);echo('<br>');
                        }
                        break;
                    }
                    case 'hiddenlanguage_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['languagetaught_'.$i]=$tval->lang_taught;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenhours_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sch_'.$i]=$tval->school_type;
                            $vdata['instructdays_'.$i]=$tval->instr_dys;
                            $vdata['childrenhours_'.$i]=date('H:i',strtotime($tval->hrs_chldrn_sty_schl.':'.$tval->mns_chldrn_sty_schl));
                            $vdata['teacherhours_'.$i]=date('H:i',strtotime($tval->hrs_tchrs_sty_schl.':'.$tval->mns_tchrs_sty_schl));
                            $vdata['ccesch_'.$i]=$tval->cce_impl==null?0:$tval->cce_impl;
                            $vdata['crm_'.$i]=$tval->cce_cum==null?0:$tval->cce_cum;
                            $vdata['crs_'.$i]=$tval->cce_shared==null?0:$tval->cce_shared;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenclub_0':{$i=1;
                        foreach($tdata as $tidx => $tval){
                            $vdata['club_'.$i]=$tval->extra_cc;
                            $vdata['ifothersd_'.$i]=$tval->other_cc;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenofficer000_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['officer000_'.$i]=$tval->officer_type;
                            $vdata['officer00_'.$i]=$tval->purpose;
                            $vdata['visitdate_'.$i]=date('Y-m-d',strtotime($tval->date_inspect));
                            $i++;
                        }
                        break;
                    }
                    case 'hiddensd_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sd_'.$i]=$tval->ict_type;
                            $vdata['avai_'.$i]=$tval->avail_nos;
                            $vdata['func_'.$i]=$tval->working_nos;
                            $vdata['supp_'.$i]=$tval->supplied_by;
                            $vdata['ifotherngo_'.$i]=$tval->donor_ict;
                            $vdata['prupu_'.$i]=$tval->purpose;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddencmpname_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['internet_yes']=$tval->internet;
                            $vdata['internetfacility_'.$i]=$tval->provided_by;
                            $vdata['ifother_'.$i]=$tval->other_ngo;
                            $vdata['cmpname_'.$i]=$tval->subscriber;
                            $vdata['speed_'.$i]=$tval->data_speed;
                            $vdata['range_'.$i]=$tval->range_unit;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlablist_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lablist_'.$i]=$tval->lab_id;
                            $vdata['spr_'.$i]=$tval->seperate_room;
                            $vdata['equip_'.$i]=$tval->condition_now;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenkit_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['kit_'.$i]=$tval->equip_id;
                            $vdata['supp1_'.$i]=$tval->supplied_by;
                            $vdata['supplyth_'.$i]=$tval->ngo_name;
                            $vdata['func1_'.$i]=$tval->quantity;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlot_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->inventry_id;
                            $vdata['supply_'.$i]=$tval->supplied_by;
                            $vdata['iflisup_'.$i]=$tval->donor_invent;
                            $vdata['avail_'.$i]=$tval->avail_nos;
                            $vdata['funct_'.$i]=$tval->working_nos;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddeninstifee_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->class_id;
                            $vdata['instifee_'.$i]=$tval->inst_fee;
                            $vdata['tutfee_'.$i]=$tval->tution_fee;
                            $vdata['regularfee_'.$i]=$tval->regular_fee;
                            $vdata['transfee_'.$i]=$tval->transport_fee;
                            $vdata['annualfee_'.$i]=$tval->annual_fee;
                            $vdata['bookfee_'.$i]=$tval->book_fee;
                            $vdata['labfee_'.$i]=$tval->lab_fee;
                            $vdata['otherfee_'.$i]=$tval->other_fee;
                            $vdata['totfee_'.$i]=$tval->total_fee;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddennoc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['noc_'.$i]=$tval->construct_type;
                            $vdata['totfloor_'.$i]=$tval->total_flrs;
                            $vdata['totclassinuse_'.$i]=$tval->tot_classrm_use;
                            $vdata['totclassnotuse_'.$i]=$tval->tot_classrm_nouse;
                            $vdata['offroom_'.$i]=$tval->off_room;
                            $vdata['labroom_'.$i]=$tval->lab_room;
                            $vdata['libroom_'.$i]=$tval->library_room;
                            $vdata['comroom_'.$i]=$tval->comp_room;
                            $vdata['artroom_'.$i]=$tval->art_room;
                            $vdata['staffroom_'.$i]=$tval->staff_room;
                            $vdata['hmroom_'.$i]=$tval->hm_room;
                            $vdata['sepgirlroom_'.$i]=$tval->girl_room;
                            $vdata['totroom_'.$i]=$tval->total_room;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlbrc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['librarybook_'.$i]=$tval->library_type;
                            $vdata['nobooks_'.$i]=$tval->num_books;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenoac_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['oac_'.$i]=$tval->school_type;
                            $vdata['oacroom_'.$i]=$tval->num_rooms;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenvoctrades_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['prevocationaltrades_'.$i]=$tval->voc_trade;
                            $i++;
                        }
                        break;
                    }
                    
                    case 'hiddendoc_0': {
                        $i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['docno_'.$i] = $tval->docno;
                            $vdata['surveyno_'.$i] = $tval->surveyno;
                            $vdata['placereg_'.$i] = $tval->placereg;
                            $vdata['datereg_'.$i] = $tval->datereg;
                            $i++;
                        }
                        //print_r($data);
                        break;
                    }
                    
                    case 'hiddentrustmgt_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['trustname_'.$i]=$tval->trustname;
                            $vdata['trustplace_'.$i]=$tval->trustplace;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenchallan_0': {
                        $i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['feeamount_'.$i] =  $tval->amount;    
                            $vdata['feechallanno_'.$i] =  $tval->challan_no;
                            $vdata['feechallandate_'.$i] =  $tval->challan_date;
                            $vdata['feeifsccode_'.$i] =  $tval->ifsc_code;
                            //$vdata['feechallanpath_'.($i+1)] =  $tval->challan_filename;    
                            $i++;                   
                        }
                        break;
                    }
                    
                }
               
            }
        }
        
        echo(json_encode($vdata));
    }
/*****************************************************************************
            End by Ramco Magesh Elumalai
*****************************************************************************/
      
      /***********************************************
       * Students Transfer                           *
       * VIT-Sriram                                  *
       * 26/03/2019                                  *
       ***********************************************/

      public function update_students_transfer()
      {
        date_default_timezone_set('Asia/Calcutta');

        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {   
            $records = $this->input->post('records');

            $update = array('transfer_flag'=>1,'request_flag'=>'0');
            $table = 'students_child_detail';
            $where = 'unique_id_no'.'='.$records['unique_id_no'];
            $update_data = $this->Registermodel->update_students_info($update,$table,$where);
            
              $records['academic_year'] = date('Y');
              $records['transfer_date'] = date('Y-m-d');
              $records['created_by'] = $this->session->userdata('emis_school_id');
              $records['created_at'] = date('Y-m-d h:i:s');
              unset($records['label']);
              $table = 'students_transfer_history';
              // print_r($records);die;
              $trans_history = $this->Registermodel->save_students_info($records,$table);
              echo $trans_history;
            
        } else { redirect('/', 'refresh'); }

      }

      /***********************************************
       * Students Filter                             *
       * VIT-Sriram                                  *
       * 26/03/2019                                  *
       ***********************************************/

      public function get_studetus_search()
      {
         $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
            $this->load->model('Registermodel');
            // print_r($this->input->post());
          $filter_val = $this->input->post('search_data');
          $db_col = $this->input->post('db_col');
          $db_sub_col = $this->input->post('db_sub_col');
          $class_id = $this->input->post('class_id');
          $records = $this->Registermodel->get_students_admit_details($filter_val,$db_col,$db_sub_col,$class_id);
          echo json_encode($records);
        } else { redirect('/', 'refresh'); }
        
      }

       public function get_studetus_search_arch()
      {
         $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
            $this->load->model('Registermodel');
            // print_r($this->input->post());
          $filter_val = $this->input->post('search_data');
          $db_col = $this->input->post('db_col');
          $db_sub_col = $this->input->post('db_sub_col');
          $class_id = $this->input->post('class_id');
          $records = $this->Registermodel->get_students_admit_details_arch($filter_val,$db_col,$db_sub_col,$class_id);
          echo json_encode($records);
        } else { redirect('/', 'refresh'); }
        
      }

      /***********************************************
       * Students Aadhar No                          *
       * VIT-Sriram                                  *
       * 02/04/2019                                  *
       ***********************************************/

      public function check_aadhar_no()
      {
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        { 

          $aadhare_no = $this->input->post('aadhar_no');
          $uni_id = $this->input->post('unique_id');
          $data = $this->Registermodel->check_aadhar_details($aadhare_no,$uni_id);

          echo json_encode($data);die;

        }
      }

      /***********************************************
       * Students Admitted                           *
       * VIT-Sriram                                  *
       * 26/03/2019                                  *
       ***********************************************/

      public function updated_emis_students_admitted()
      {
        date_default_timezone_set('Asia/Calcutta');

        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        { 
          // print_r($this->input->post());
          $school_id = $this->session->userdata('emis_school_id');
            // echo $school_id;die;
          $doj = date('Y-m-d',strtotime($this->input->post('date')));
          $class_studying_id = $this->input->post('emis_class_study');
          $class_section = $this->input->post('emis_reg_stu_section');
          $group_code_id = $this->input->post('emis_reg_grup_code');
          $education_medium_id = $this->input->post('emis_reg_mediofinst');
          $school_admission_no = $this->input->post('emis_reg_stu_admission_admiss');
          $id = $this->input->post('id');
          $unique_id_no = $this->input->post('emis_unique_id_no');
        
          // echo $id;
          
         $school_id = $school_id;
          $update = array('doj'=>$doj,'class_studying_id'=>$class_studying_id,'class_section'=>$class_section,'group_code_id'=>$group_code_id,'education_medium_id'=>$education_medium_id,'school_admission_no'=>$school_admission_no,'id'=>$id,'school_id'=>$school_id,'transfer_flag'=>0,'request_flag'=>'0');
          $table = 'students_child_detail ';
          //print_r($update);die();
          $where = 'id'.'='.$update['id'];
          // echo $where;
          $update_data = $this->Registermodel->update_students_info($update,$table,$where);
          // echo $update_data;die;
          $update_data = 1;
          if($update_data){
            $records['unique_id_no'] = $unique_id_no;
            $records['limit'] = 1;
            $records['get_result'] = 1; 

          $get_trans_history = $this->Registermodel->get_transfer_history($records);
          // print_r($get_trans_history);die;
          // echo $get_trans_history->id;
          // if(!empty($get_trans_history)){
          $get_trans_history->school_id_admit = $school_id;
          $get_trans_history->process_type = 2;
          $get_trans_history->admit_date = date('Y-m-d');
          $get_trans_history->updated_at = date('Y-m-d h:i:s');
          $get_trans_history->admitted_by = $school_id;
          // print_r($get_trans_history);die;
          $his_table = 'students_transfer_history';
          $his_where = 'id'.'='.$get_trans_history->id;
          // print_r($get_trans_history);die;
          $update_data = $this->Registermodel->update_students_info($get_trans_history,$his_table,$his_where);
          // }
        $this->session->set_flashdata('students_update',' Successfully Admitted To School');
          
            }
          redirect('Registration/emis_student_reg','refresh');

        } else { redirect('/', 'refresh'); }

      }

 public function get_stud_insert()
      {
        date_default_timezone_set('Asia/Calcutta');

        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        { 
          // print_r($this->input->post());
          $school_id = $this->session->userdata('emis_school_id');
          $unique_id=$this->input->get('unique_id');
           $chk = $this->Registermodel->check_unique_id($unique_id);
          //  print_r($chk);die();
           $check=$chk[0]['uni'];
          // print_r($check);die();
           if($check==1)
           {
            echo "<script type='text/javascript'>alert('Already exist!');
             

                </script>";
                 redirect('Registration/emis_student_reg','refresh');
           }
else{
          $insert_data = $this->Registermodel->insert_students_info($unique_id);
          //print_r( $insert_data);
         
 $data = array(
          'name'=>$insert_data[0]['name'],
          'name_tamil'=>$insert_data[0]['name_tamil'],
          'name_id_card'=>$insert_data[0]['name_id_card'],
          'name_tamil_id_card'=>$insert_data[0]['name_tamil_id_card'],
          'aadhaar_uid_number'=>$insert_data[0]['aadhaar_uid_number'],
          'gender'=>$insert_data[0]['gender'],
          'dob'=>$insert_data[0]['dob'],
          'community_id'=>$insert_data[0]['community_id'],
          'religion_id'=>$insert_data[0]['religion_id'],
          'mothertounge_id'=>$insert_data[0]['mothertounge_id'],
          'phone_number'=>$insert_data[0]['phone_number'],
          'differently_abled'=>$insert_data[0]['differently_abled'],
          'disadvantaged_group'=>$insert_data[0]['disadvantaged_group'],
          'subcaste_id'=>$insert_data[0]['subcaste_id'],
          'house_address'=>$insert_data[0]['house_address'],
          'pin_code'=>$insert_data[0]['pin_code'],
          'mother_name'=>$insert_data[0]['mother_name'],
          'mother_occupation'=>$insert_data[0]['mother_occupation'],
          'father_name'=>$insert_data[0]['father_name'],
          'father_occupation'=>$insert_data[0]['father_occupation'],
          'class_studying_id'=>$insert_data[0]['class_studying_id'],
          'student_admitted_section'=>$insert_data[0]['student_admitted_section'],
          'group_code_id'=>$insert_data[0]['group_code_id'],
          'education_medium_id'=>$insert_data[0]['education_medium_id'],
          'district_id'=>$insert_data[0]['district_id'],
          'unique_id_no'=>$insert_data[0]['unique_id_no'],
          'school_id'=>$insert_data[0]['school_id'],
          'transfer_flag'=>$insert_data[0]['transfer_flag'],
          'class_section'=>$insert_data[0]['class_section'],
          'school_admission_no'=>$insert_data[0]['school_admission_no'],
          'guardian_name'=>$insert_data[0]['guardian_name'],
          'parent_income'=>$insert_data[0]['parent_income'],
          'street_name'=>$insert_data[0]['street_name'],
          'area_village'=>$insert_data[0]['area_village'],
          'cbse_subject1_id'=>$insert_data[0]['cbse_subject1_id'],
          'cbse_subject2_id'=>$insert_data[0]['cbse_subject2_id'],
          'cbse_subject3_id'=>$insert_data[0]['cbse_subject3_id'],
          'cbse_subject4_id'=>$insert_data[0]['cbse_subject4_id'],
          'cbse_opt_subject_id'=>$insert_data[0]['cbse_opt_subject_id'],
          'doj'=>$insert_data[0]['doj'],
          'pass_fail'=>$insert_data[0]['pass_fail'],
          'email'=>$insert_data[0]['email'],
          'created_at'=>$insert_data[0]['created_at'],
          'updated_at'=>$insert_data[0]['updated_at'],
          'status'=>$insert_data[0]['status'],
          'prv_class_std'=>$insert_data[0]['prv_class_std'],
          'child_admitted_under_reservation'=>$insert_data[0]['child_admitted_under_reservation'],
          'rte_type'=>$insert_data[0]['rte_type'],
          'idcardstatus'=>$insert_data[0]['idcardstatus'],
          'idapproove'=>$insert_data[0]['idapproove'],
          'adhaarappliedstatus'=>$insert_data[0]['adhaarappliedstatus'],
          'enrollmentnumber'=>$insert_data[0]['enrollmentnumber'],
          'bloodgroup'=>$insert_data[0]['bloodgroup'],
          'photo'=>$insert_data[0]['photo'],
          'smart_id'=>$insert_data[0]['smart_id'],
          'request_flag'=>$insert_data[0]['request_flag'],
          'request_date'=>$insert_data[0]['request_date'],
          'request_id'=>$insert_data[0]['request_id'],
          'c_exam'=>$insert_data[0]['c_exam']
        );
         // print_r($data);die();
         //die();
     $std_data=$this->Registermodel->insert_stud_cmn_data($data);
 echo "<script type='text/javascript'>alert('Student Moved To commonpool!!!');
             

                </script>";
          redirect('Registration/emis_student_reg','refresh');
        }
}
        else { redirect('/', 'refresh'); }

      }

      /****************************** End ******************************/

      /*************************** Raise Request **********************/

      /*************************************************
       * Raise Request For Students                    *
       * VIT-Sriram                                    *
       * 11/04/2019                                    *
       *************************************************/

      public function update_students_raise_request()
      {
          date_default_timezone_set('Asia/Calcutta');

        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        { 

            $id = $this->input->post('id');
            $table = 'students_child_detail';
            $where = array('id'=>$id);
            $update= array('request_flag' => '1','request_date' => date('Y-m-d'),'request_id'=>$this->session->userdata('emis_school_udise'));
          $update_data = $this->Registermodel->update_students_info($update,$table,$where);
          echo json_encode($update_data);

        } else { redirect('/', 'refresh'); }

      }

      /************************ District Level  *************************/

      /**********************************
        * Distirict Level Reject        *
        * VIT-sriram                    *
        * 12/04/2019                    *
        *********************************/

      public function update_students_reject()
      {
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
          $id = $this->input->post('id');
            $table = 'students_child_detail';
            $where = array('unique_id_no'=>$id);
            $update= array('request_flag' => '0');
          $update_data = $this->Registermodel->update_students_info($update,$table,$where);
          echo json_encode($update_data);
        } else { redirect('/', 'refresh'); }
        
      }

      /**************************************
        * District Level Transfer           *
        * VIT-sriram                        *
        * 19/06/2019                        *
        *************************************/

      public function update_students_transfer_bulk()
      {
           $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {

          $transfer_data = $this->input->post('records');

          if(!empty($transfer_data))
          {
            // print_r($this->session->userdata());die;
            foreach($transfer_data as $data)
            {
              $update = array('transfer_flag'=>1,'request_flag'=>'0');
                $table = 'students_child_detail';
                $where = array('unique_id_no'=>$data['unique_id_no']);

                $update_data = $this->Registermodel->update_students_info($update,$table,$where);
                
                  $data['academic_year'] = date('Y');
                  $data['transfer_date'] = date('Y-m-d');
                  $data['created_by'] = $this->session->userdata('emis_user_id');
                  $data['created_at'] = date('Y-m-d h:i:s');
                  $data['remarks'] = 'This School Transfer Students School id:-'.$data['school_id_transfer'].',Admission No:-'.$data['admission_no'].',Reason For '.$data['label'].',Transfer Date '.date('Y-m-d h:i:s');
                  unset($data['label']);
                  $table = 'students_transfer_history';
                  // print_r($data);die;
                  $trans_history[] = $this->Registermodel->save_students_info($data,$table);
              }
                  echo json_encode(sizeof($trans_history));
            }
        } else { redirect('/', 'refresh'); }

      }

      /************************************ End ******************************/
	 

} 

?>