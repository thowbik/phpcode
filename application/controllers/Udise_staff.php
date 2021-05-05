
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/third_party/mpdf/mpdf.php';

class Udise_staff extends CI_Controller

  {
    private $S3;
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

  // form validations

  function __construct()
    {
    parent::__construct();
    $this->load->helper(array(
      'form',
      'url',
      'html'
    ));
    $this->load->library(array(
      'session',
      'form_validation'
    ));
    $this->load->helper('security');
    $this->load->database();
    $this->load->model('Homemodel');
    $this->load->model('Authmodel');
    $this->load->model('Datamodel');
	 $this->load->model('Sectionmodel');
    $this->load->model('Udise_staffmodel');
    $this->load->library('AWS_S3');
    date_default_timezone_set('Asia/Kolkata');

   
    }

	public function teachers_children_details()
   {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        
       
              $school_id = $this->session->userdata('emis_school_id'); 
              
			  $data['teacherlist']= $this->Udise_staffmodel->get_teachingstaff_list($school_id);
			  //print_r($data['teacherlist']);
			  $data['classtype'] = $this->Sectionmodel->getclasstype($school_id);
			  //print_r($data['classtype']);
			  // $data['mediumdetails']= $this->Sectionmodel->getschool_medium();
			  // $data['groupdetails']= $this->Sectionmodel->getschool_groupname();
              // $data['schoolcate']=$this->Sectionmodel->getschool_cate($school_id);
              $this->load->view('emis_school_child_studyingstatus',$data);
                 
      
    }else { redirect('/', 'refresh'); }

   } 
   
   public function emis_teacher_childstudying_status(){
  
  
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) {
        $teacher_code= $this->input->post('records[teachercode]');
//print_r($teacher_code);		
        $checkteacher =$this->Udise_staffmodel->teacherchild_details($teacher_code); 
		$teacherdata= $checkteacher[0]->teacher_code;
		
		if($teacherdata=='')
		{
        $school_id = $this->session->userdata('emis_school_id'); 
		
          $data = array(
	      
		   'teacher_code'=> $this->input->post('records[teachercode]'),
		   'question1'=>$this->input->post('records[qus]'),
		   'emis_no1'=>$this->input->post('records[children1]'),
		   'emis_no2'=>$this->input->post('records[children2]'),
		   'emis_no3'=>$this->input->post('records[children3]'),
           'created_date' => date("Y-m-d H:i:s") 
            );
			$result = $this->Udise_staffmodel->teacher_childstudying_status($data);
			echo $result; 
		 }
		 else
		 {
			 $teacher_code= $this->input->post('records[teachercode]');
          $data = array(
	      
		   
		   'question1'=>$this->input->post('records[qus]'),
		   'emis_no1'=>$this->input->post('records[children1]'),
		   'emis_no2'=>$this->input->post('records[children2]'),
		   'emis_no3'=>$this->input->post('records[children3]'),
           'created_date' => date("Y-m-d H:i:s") 
            );
			$result = $this->Udise_staffmodel->teacher_childstudying_status_update($teacher_code,$data);
			echo $result; 
			 
		 }
		 }

	 else { redirect('/', 'refresh'); }
}
// public function emis_teacher_childstudying_status_update()
// {
	// $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    // if($emis_loggedin) { 

        // $school_id = $this->session->userdata('emis_school_id'); 
		// $teacher_code= $this->input->post('records[teachercode]');
          // $data = array(
	      
		   
		   // 'question1'=>strtoupper($this->input->post('records[qus1]')),
		   // 'question2'=>$this->input->post('records[qus2]'),
           // 'created_date' => date("Y-m-d H:i:s") 
            // );
			// $result = $this->Udise_staffmodel->teacher_childstudying_status_update($teacher_code,$data);
			// echo $result; 
		 // }

	 // else { redirect('/', 'refresh'); }
	
// }
    // staff module data update section

   // // Udise *staff module *page1 view

    // update schoolaccountant details
  public

  function updateschlstaffaccountant()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_udise = $this->session->userdata('emis_school_udise');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "accntnt" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Accountant Detail" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

    // update Staff library Assistant
  public

  function updateschlstafflibraryassist()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "lib_asst" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Library Assistant" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // school details ending

  // update Staff Lab Assistant
  public

  function updateschlstafflabassist()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "lab_asst" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Laboratory Assistant" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff Lab Assistant ending




  // update Staff UDC or Head Clerk update
  public function updateschlstaffudcorheadclerk()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "udc_hedclrk" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Staff UDC or Head Clerk" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff UDC or Head Clerk ending


  // update Staff LDC update
  public

  function updateschlstaffldc()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "ldc" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update LDC" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff LDC ending

  // update Staff Peon update
  public

  function updateschlstaffpeonormts()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "peon_mts" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Peon" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff Peon ending


    // update Night Shift watchman
  public

  function updateschlstaffnightwatchman()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "night_wtchmn" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Night Shift Watchman Assistant" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff Night Shift Watchman ending


    // Update Teaching Staff (Regular Teacher)
  public

  function updateschlstaffteachingregularteacher()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "tchingstff_reg" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Teaching Staff(Regular Teacher)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // Staff Teaching Staff (Regular Teacher) ending

   // Update Teaching Staff (Contract Teacher)
  public

  function updateschlstaffteachingcontractorteacher()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "tchingstff_cntrct" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Teaching Staff(Contract Teacher)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
   // Staff Teaching Staff (Contract Teacher) ending


    // Update Part-time instructors for Arts
  public

  function updateschlstaffparttimeinstructorsforartshealthandpysicaleducation()
    {
       $school_udise = $this->session->userdata('emis_school_udise');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "prtme_instctr" => $value
        );
        if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Teaching Staff(Contract Teacher)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
   // Staff Part-time instructors for Arts ending
   //non-teaching staff update
    public function staffinfogetting1() {
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$school_udise = $this->session->userdata('emis_school_udise');
		
		$school_id = $this->session->userdata('emis_school_id');
		date_default_timezone_set('Asia/Kolkata');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emis_reg_staff_name', 'Name of the Teacher', 'required');
		$this->form_validation->set_rules('emis_reg_staff_aadhaar', 'Aadhar Number', 'required|max_length[12]|min_length[12]|numeric');
		$this->form_validation->set_rules('emis_reg_staff_gender', 'Gender', 'required');
		
		$this->form_validation->set_rules('emis_reg_staff_dob', 'Date of birth', 'required');
		$this->form_validation->set_rules('emis_reg_staff_join', 'Date of Join', 'required');
		$this->form_validation->set_rules('emis_reg_staff_pjoin', 'Date of Join Present Post', 'required');
		$this->form_validation->set_rules('emis_reg_staff_psjoin', 'Date of Join Present School', 'required');
		$this->form_validation->set_rules('emis_reg_staff_socialcategory', 'Social Category', 'required');
		$this->form_validation->set_rules('emis_reg_staff_teachertype', 'Type of teacher', 'required');
		$this->form_validation->set_rules('emis_reg_staff_appntmntnature', 'Nature of appointment', 'required');
		$this->form_validation->set_rules('emis_reg_staff_fname', 'Fathers Name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_mname', 'Mothers Name', 'required');
		$this->form_validation->set_rules('accountnumber', 'Account Number', 'required');
		$this->form_validation->set_rules('pannumber', 'PAN Number', 'required');
		$this->form_validation->set_rules('emis_reg_staff_typeofdisability', 'Type of Disability', 'required');
		$this->form_validation->set_rules('emis_reg_staff_typeofdisability', 'Type of Disability', 'required');
		//$this->form_validation->set_rules('emis_reg_staff_mode', 'Mode of Recruitment', 'required');
		
		
		//$this->form_validation->set_rules('emis_reg_staff_cps', 'CPS-GPS Number', 'required');
		$this->form_validation->set_rules('emis_reg_staff_contact', 'Enter your Mobile number', 'required|max_length[10]|min_length[10]|numeric');
		$this->form_validation->set_rules('emis_reg_staff_email', 'E-Mail Id', 'required');
		$this->form_validation->set_rules('emis_reg_staff_door', 'Door no', 'required');
		$this->form_validation->set_rules('emis_reg_staff_city', 'City name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_street', 'Street Name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_district', 'District', 'required');
		$this->form_validation->set_rules('emis_reg_staff_pincode', 'Pincode', 'required');	
		$this->form_validation->set_rules('emis_reg_staff_qualificationacademic', 'Highest Qualification(Academic)', 'required');
		$this->form_validation->set_rules('emis_reg_staff_qualificationprofessional', 'Highest Qualification(Professional)', 'required');
		//$this->form_validation->set_rules('emis_reg_staff_appntedforsubject', 'Highest Qualification(Appointed for Subject)', 'required|numeric|max_length[6]');
		
       

		
		
		if ($emis_loggedin) {
			 $checkaccountnumber    = $_POST['accountnumber'];
		 $accountcount = $this->Udise_staffmodel->count_accountnumber($checkaccountnumber,'');
		  $ttdata= $accountcount[0]->countdata;
		  //print_r($ttdata);
		  //die();
		  if($ttdata > 0) 
		{
			 echo '<script>alert("Account Number Already Exist!");</script>';
			 redirect('Udise_staff/emis_school_staff4', 'refresh'); 
		}
		else
			{
			if ($this->form_validation->run() == FALSE){
				//echo validation_errors();
				$this->session->set_flashdata('staff', validation_errors());
				$data['validation_error']=validation_errors();
				// return false;
				redirect('Udise_staff/emis_school_staff4', 'refresh');
            }else{
				
				$school_id = $this->session->userdata('emis_school_id');
				
				$teacher_name           =   $_POST['emis_reg_staff_name'];
        $teacher_name_tamil           =   $_POST['emis_reg_staff_tname'];
        $office_id              =   $_POST['office_id'];
        $off_key_id             =   $_POST['off_key_id'];
        $status                 =   $_POST['status'];
				//$teacher_initial           = $_POST['emis_reg_staff_initial'];
				$aadhar_no              = $_POST['emis_reg_staff_aadhaar'];
				$gender                 = $_POST['emis_reg_staff_gender'];
				$blood_grp              = $_POST['emis_reg_staff_bg'];
				$staff_dob              = $_POST['emis_reg_staff_dob'];
				$staff_join   			= $_POST['emis_reg_staff_join'];
				$staff_pjoin  			= $_POST['emis_reg_staff_pjoin'];
				$staff_psjoin 			= $_POST['emis_reg_staff_psjoin'];
				$social_category        = $_POST['emis_reg_staff_socialcategory'];
				$teacher_type           = $_POST['emis_reg_staff_teachertype'];
				$appointment_nature     = $_POST['emis_reg_staff_appntmntnature'];
				$teacherfathername      = $_POST['emis_reg_staff_fname'];
				$teachermothername      = $_POST['emis_reg_staff_mname'];
				$teacherspousename	    = $_POST['emis_reg_staff_spname'];
				$disability_type        = $_POST['emis_reg_staff_typeofdisability'];
				$types_disability       = $_POST['emis_reg_staff_distype'];
				
				$staff_mode_recruitment = $_POST['emis_reg_staff_mode'];
				$staff_rank      	 	= $_POST['emis_reg_staff_rank'];
				$staff_yearselection    = $_POST['emis_reg_staff_yearselection'];
				
				$cpsdetails           	= $_POST['emis_reg_cpsgps_details'];
				$suffix             	= $_POST['emis_reg_staff_suffix'];
				$cpsgps             	= $_POST['emis_reg_staff_cps'];
				$mbl_nmbr               = $_POST['emis_reg_staff_contact'];
				$email_id               = $_POST['emis_reg_staff_email'];
				$e_prsnt_doorno         = $_POST['emis_reg_staff_door'];
				$e_prsnt_city           = $_POST['emis_reg_staff_city'];
				$e_prsnt_street         = $_POST['emis_reg_staff_street'];
				$e_prsnt_distrct        = $_POST['emis_reg_staff_district'];
				$e_prsnt_pincode        = $_POST['emis_reg_staff_pincode'];
				$academic               = $_POST['emis_reg_staff_qualificationacademic'];
				$ug         	  	    = $_POST['emis_reg_staff_ug'];
				$pg          	 	    = $_POST['emis_reg_staff_pg'];
				$professional           = $_POST['emis_reg_staff_qualificationprofessional'];
				$appointed_subject      = $_POST['emis_reg_staff_appntedforsubject'];
				
                $deputed                = $_POST['deputedteacher'];
                $dep_place              = $_POST['deputedofficeteacher'];
                $dep_off                = $_POST['officeselect'];
                $dep_scl                = $_POST['schoolstaff'];
                $date                   = (($_POST['deputedofficeteacher']==1)?$_POST['officedate']:$_POST['schooldate']);
                $ifsccode              = $_POST['ifsc_code'];
                $branch_id             = $_POST['bankid'];
                $accountnumber         = $_POST['accountnumber'];
				$pannumber             = $_POST['pannumber'];
                
                //$dep_date               = $_POST[''];
				/*$teacher_name = $teacher_name1.' '.$teacher_initial;
				$staff_dob              = $staff_year_dob.'-'.$staff_month_dob.'-'.$staff_date_dob;
				$staff_join             = $staff_joinyear.'-'.$staff_joinmonth.'-'.$staff_joindate;
				$staff_pjoin            = $staff_pjoinyear.'-'.$staff_pjoinmonth.'-'.$staff_pjoindate;
				$staff_psjoin           = $staff_psjoinyear.'-'.$staff_psjoinmonth.'-'.$staff_psjoindate;*/
				
				$manacat = $this->Udise_staffmodel->getmanacate($school_id);
				$schcat = $this->Udise_staffmodel->getmanacate1($school_id);
                $manacat=$manacat[0]->manage_cate_id;
                $schcat=$schcat[0]->sch_cate_id;
				
				if($manacat == 1 || $manacat==2 || $manacat==4 ){
					
					if($schcat ==3 || $schcat==5 || $schcat==6 || $schcat==7 || $schcat==8 || $schcat==9 || $schcat==10) {
						
						$dept =11;
					} else if($schcat ==1 || $schcat==2 || $schcat==4){
						$dept =22;
					}else{
						$dept =33;
					}
				}else {
					$dept =33;
				}
				
				$getteachercount= $this->Udise_staffmodel->getregteachercount();
				
				$getteachercount1=$getteachercount[0]->maxid;
				
				
				$getteachercode= $this->Udise_staffmodel->getregteachercode($getteachercount1);
								
				$lastdigit=substr($getteachercode[0]->teacher_code,-6);
								
				$last1 = $lastdigit + 1;
				$formatted_value = sprintf("%06d", $last1);
				
				$teachercode = $dept.(date('dmY', strtotime($staff_dob))).$gender.$formatted_value;
				//$teachercode = $dept.$staff_date_dob.$staff_month_dob.$staff_year_dob.$gender.$formatted_value;
			
				$data = array(
				'teacher_name'           => $teacher_name,
        'teacher_name_tamil' => $teacher_name_tamil,
        'off_id'=>$office_id,
        'school_key_id'=>$off_key_id,
        'scl_flag'=>$status,
				'teacher_code'			 => $teachercode,
				'aadhar_no'              => $aadhar_no,
				'gender'                 => $gender,
				'e_blood_grp'			 => $blood_grp,
				'staff_dob'              => $staff_dob,
				'social_category'        => $social_category,
				'teacher_type'           => $teacher_type,
				'appointment_nature'     => $appointment_nature,
				'e_prnts_nme'   		 => $teacherfathername,
				'teacher_mother_name'    => $teachermothername,
				'teacher_spouse_name'    => $teacherspousename,
				'disability_type'        => $disability_type,
				'types_disability'       => $types_disability,
				
				'recruit_type'      	 => $staff_mode_recruitment,
				'recruit_rank'      	 => $staff_rank,
				'recruit_year'    		 => $staff_yearselection,
				'staff_join'             => $staff_join,
				'staff_pjoin'            => $staff_pjoin,
				'staff_psjoin'           => $staff_psjoin,
				'cps_gps_details'     	 => $cpsdetails,
				'suffix'          		 => $suffix,
				'cps_gps'          		 => $cpsgps,
				'mbl_nmbr'               => $mbl_nmbr,
				'email_id'               => $email_id,
				'e_prsnt_doorno'   		 => $e_prsnt_doorno,
				'e_prsnt_place' 		 => $e_prsnt_city,   
				'e_prsnt_street' 		 => $e_prsnt_street, 
				'e_prsnt_distrct' 		 => $e_prsnt_distrct,
				'e_prsnt_pincode'		 => $e_prsnt_pincode,	
				'academic'               => $academic,
				'e_ug'               	 => $ug,
				'e_pg'           	     => $pg,
				'professional'           => $professional,
				'appointed_subject'      => $appointed_subject,
				'udise_code'             => $school_udise,
				//'school_key_id'          => $school_id,
                'deputed'                => $deputed,
				'dep_place'              => $dep_place,
				'dep_off'                => $dep_off,
				'dep_scl'                => $dep_scl,
                'dep_date'               =>date('Y-m-d',strtotime($date)),
                'archive'                =>  '1',
				'createdat'              => date('Y-m-d H:i:s')
                
				);
				$bankdetails=array(
				'school_key_id' =>$off_key_id,
				'teacher_id' => $teachercode,
				'ifsc_code' => $ifsccode,
				'branch_id' => $branch_id,
				'bank_acc' => $accountnumber,
				'pan_no' =>$pannumber 
				);
				
				$bd=$this->Udise_staffmodel->staffregbankdata($bankdetails);
               
				$this->Udise_staffmodel->staffreg($data);  
				
			}$this->load->view('Udise/emis_schoolstaff_regmsg1',$data);
		}
	}else{
			//die(false);
			redirect('home/emis_school_home','refresh');
		}
    }
   
   
   //staff module *page1 update completd


     public function staffinfogetting() {
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$school_udise = $this->session->userdata('emis_school_udise');
		
		$school_id = $this->session->userdata('emis_school_id');
		date_default_timezone_set('Asia/Kolkata');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emis_reg_staff_name', 'Name of the Teacher', 'required');
   // $this->form_validation->set_rules('emis_reg_staff_tname', 'Name of the Tamil Teacher', 'required');
        $this->form_validation->set_rules('office_id');
        $this->form_validation->set_rules('off_key_id');
        $this->form_validation->set_rules('status');
		$this->form_validation->set_rules('emis_reg_staff_aadhaar', 'Aadhar Number', 'required|max_length[12]|min_length[12]|numeric');
		$this->form_validation->set_rules('emis_reg_staff_gender', 'Gender', 'required');
		$this->form_validation->set_rules('emis_reg_staff_dob', 'Date of birth', 'required');
		$this->form_validation->set_rules('emis_reg_staff_join', 'Date of Join', 'required');
		$this->form_validation->set_rules('emis_reg_staff_pjoin', 'Date of Join Present Post', 'required');
		$this->form_validation->set_rules('emis_reg_staff_psjoin', 'Date of Join Present School', 'required');
		
		$this->form_validation->set_rules('emis_reg_staff_socialcategory', 'Social Category', 'required');
		$this->form_validation->set_rules('emis_reg_staff_teachertype', 'Type of teacher', 'required');
		$this->form_validation->set_rules('emis_reg_staff_appntmntnature', 'Nature of appointment', 'required');
		$this->form_validation->set_rules('emis_reg_staff_fname', 'Fathers Name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_mname', 'Mothers Name', 'required');
		$this->form_validation->set_rules('ifsc_code', 'IFS Code', 'required');
		$this->form_validation->set_rules('accountnumber', 'Account Number', 'required');
		$this->form_validation->set_rules('pannumber', 'PAN Number', 'required');
		$this->form_validation->set_rules('emis_reg_staff_typeofdisability', 'Type of Disability', 'required');
		//$this->form_validation->set_rules('emis_reg_staff_mode', 'Mode of Recruitment', 'required');
		
		
		//$this->form_validation->set_rules('emis_reg_staff_cps', 'CPS-GPS Number', 'required');
		$this->form_validation->set_rules('emis_reg_staff_contact', 'Enter your Mobile number', 'required|max_length[10]|min_length[10]|numeric');
		$this->form_validation->set_rules('emis_reg_staff_email', 'E-Mail Id', 'required');
		$this->form_validation->set_rules('emis_reg_staff_door', 'Door no', 'required');
		$this->form_validation->set_rules('emis_reg_staff_city', 'City name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_street', 'Street Name', 'required');
		$this->form_validation->set_rules('emis_reg_staff_district', 'District', 'required');
		$this->form_validation->set_rules('emis_reg_staff_pincode', 'Pincode', 'required');	
		$this->form_validation->set_rules('emis_reg_staff_qualificationacademic', 'Highest Qualification(Academic)', 'required');
		$this->form_validation->set_rules('emis_reg_staff_qualificationprofessional', 'Highest Qualification(Professional)', 'required');
		$this->form_validation->set_rules('emis_reg_staff_appntedforsubject', 'Highest Qualification(Appointed for Subject)', 'required|numeric|max_length[6]');
		$this->form_validation->set_rules('emis_reg_staff_mainsubjcttaughtsubj1', 'Subject 1', 'required');
		//$this->form_validation->set_rules('emis_reg_staff_mainsubjcttaughtsubj2', 'Subject 2', 'required');
		//$this->form_validation->set_rules('emis_reg_staff_mainsubjcttaughtsubj3', 'Subject 3', 'required');
       //$this->form_validation->set_rules('emis_reg_staff_mainsubjcttaughtsubj3', 'Subject 3', 'required');

		
		
		if ($emis_loggedin) {
			 $checkaccountnumber    = $_POST['accountnumber'];
		 $accountcount = $this->Udise_staffmodel->count_accountnumber($checkaccountnumber,'');
		  $ttdata= $accountcount[0]->countdata;
		  //print_r($ttdata);
		  //die();
		  if($ttdata > 0) 
		{
			 echo '<script>alert("Account Number Already Exist!");</script>';
             redirect('Udise_staff/emis_school_staff2', 'refresh');
       
		}
		else
			{
			if ($this->form_validation->run() == FALSE){
				//echo validation_errors();
				$this->session->set_flashdata('staff', validation_errors());
				// return false;
				redirect('Udise_staff/emis_school_staff2', 'refresh');
            }else{
				$school_id = $this->session->userdata('emis_school_id');
				//$school_udise = $this->session->userdata('emis_school_udise');
				
				
				$teacher_name           = $_POST['emis_reg_staff_name'];
				$teacher_name_tamil     = $_POST['emis_reg_staff_tname'];
				$office_id         		= $_POST['office_id'];
				$off_key_id           	= $_POST['off_key_id'];
				$status        			= $_POST['status'];
				//$teacher_initial        = $_POST['emis_reg_staff_initial'];
				$aadhar_no              = $_POST['emis_reg_staff_aadhaar'];
				$gender                 = $_POST['emis_reg_staff_gender'];
				$blood_grp              = $_POST['emis_reg_staff_bg'];
				$staff_dob              = $_POST['emis_reg_staff_dob'];
				$staff_join   			= $_POST['emis_reg_staff_join'];
				$staff_pjoin  			= $_POST['emis_reg_staff_pjoin'];
				$staff_psjoin 			= $_POST['emis_reg_staff_psjoin'];
				$social_category        = $_POST['emis_reg_staff_socialcategory'];
				$teacher_type           = $_POST['emis_reg_staff_teachertype'];
				$appointment_nature     = $_POST['emis_reg_staff_appntmntnature'];
				$teacherfathername      = $_POST['emis_reg_staff_fname'];
				$teachermothername      = $_POST['emis_reg_staff_mname'];
				$teacherspousename	    = $_POST['emis_reg_staff_spname'];
				$disability_type        = $_POST['emis_reg_staff_typeofdisability'];
				$types_disability       = $_POST['emis_reg_staff_distype'];
				
				$staff_mode_recruitment = $_POST['emis_reg_staff_mode'];
				$staff_rank      	 	= $_POST['emis_reg_staff_rank'];
				$staff_yearselection    = $_POST['emis_reg_staff_yearselection'];
				
				
				$cpsdetails           	= $_POST['emis_reg_cpsgps_details'];
				$suffix             	= $_POST['emis_reg_staff_suffix'];
				$cpsgps             	= $_POST['emis_reg_staff_cps'];
				$mbl_nmbr               = $_POST['emis_reg_staff_contact'];
				$email_id               = $_POST['emis_reg_staff_email'];
				$e_prsnt_doorno         = $_POST['emis_reg_staff_door'];
				$e_prsnt_city           = $_POST['emis_reg_staff_city'];
				$e_prsnt_street         = $_POST['emis_reg_staff_street'];
				$e_prsnt_distrct        = $_POST['emis_reg_staff_district'];
				$e_prsnt_pincode        = $_POST['emis_reg_staff_pincode'];
				$academic               = $_POST['emis_reg_staff_qualificationacademic'];
				$professional           = $_POST['emis_reg_staff_qualificationprofessional'];
				$appointed_subject      = $_POST['emis_reg_staff_appntedforsubject'];
				$subject1               = $_POST['emis_reg_staff_mainsubjcttaughtsubj1'];
				$subject2               = $_POST['emis_reg_staff_mainsubjcttaughtsubj2'];
				$subject3               = $_POST['emis_reg_staff_mainsubjcttaughtsubj3'];
				$subject4               = $_POST['emis_reg_staff_mainsubjcttaughtsubj4'];
				$subject5               = $_POST['emis_reg_staff_mainsubjcttaughtsubj5'];
				$subject6               = $_POST['emis_reg_staff_mainsubjcttaughtsubj6'];
				$ug         	  	    = $_POST['emis_reg_staff_ug'];
				$pg          	 	    = $_POST['emis_reg_staff_pg'];
				
   	            //$staffmedium         	= $_POST['staffmedium_0'];
                $deputed                = $_POST['deputedteacher'];
                $dep_place              = $_POST['deputedofficeteacher'];
                $dep_off                = $_POST['officeselect'];
                $dep_scl                = $_POST['schoolstaff'];
                $date                   = (($_POST['deputedofficeteacher']==1)?$_POST['officedate']:$_POST['schooldate']);
				
				$ifsccode              = $_POST['ifsc_code'];
                $branch_id             = $_POST['bankid'];
                $accountnumber         = $_POST['accountnumber'];
				$pannumber             = $_POST['pannumber'];
                
                $i=0;
                $j=0;
                
				/*$teacher_name = $teacher_name1.' '.$teacher_initial;
				$staff_dob              = $staff_year_dob.'-'.$staff_month_dob.'-'.$staff_date_dob;
				$staff_join             = $staff_joinyear.'-'.$staff_joinmonth.'-'.$staff_joindate;
				$staff_pjoin            = $staff_pjoinyear.'-'.$staff_pjoinmonth.'-'.$staff_pjoindate;
				$staff_psjoin           = $staff_psjoinyear.'-'.$staff_psjoinmonth.'-'.$staff_psjoindate;*/
				
				$manacat = $this->Udise_staffmodel->getmanacate($school_id);
				$schcat = $this->Udise_staffmodel->getmanacate1($school_id);
                $manacat=$manacat[0]->manage_cate_id;
                $schcat=$schcat[0]->sch_cate_id;
                //echo $manacat;
                //echo $schcat;
                
				if($manacat == 1 || $manacat==2 || $manacat==4 ){
				
					if($schcat ==3 || $schcat==5 || $schcat==6 || $schcat==7 || $schcat==8 || $schcat==9 || $schcat==10) {
						//echo json_encode($schcat);
						$dept =11;
					} else if($schcat ==1 || $schcat==2 || $schcat==4){
						$dept =22;
                        //echo json_encode($schcat);
					}else{
						$dept =33;
                        //echo json_encode($schcat);
					}
				}else {
					$dept =33;
                    //echo json_encode($schcat);
                    //die();
				}
				
				$getteachercount= $this->Udise_staffmodel->getregteachercount();
				
				$getteachercount1=$getteachercount[0]->maxid;
				
				
				$getteachercode= $this->Udise_staffmodel->getregteachercode($getteachercount1);
								
				$lastdigit=substr($getteachercode[0]->teacher_code,-6);
								
				$last1 = $lastdigit + 1;
				$formatted_value = sprintf("%06d", $last1);
				$teachercode = $dept.(date('dmY', strtotime($staff_dob))).$gender.$formatted_value;
				//$teachercode = $dept.$staff_date_dob.$staff_month_dob.$staff_year_dob.$gender.$formatted_value;
				
				$data = array(
				'teacher_name'           => $teacher_name,
				'teacher_name_tamil'	 => $teacher_name_tamil,
				'teacher_code'			 => $teachercode,
				'aadhar_no'              => $aadhar_no,
				'off_id' 				 => $office_id,
				'scl_flag'				 => $status,
				'school_key_id'			 => $off_key_id,
				'gender'                 => $gender,
				'e_blood_grp'			 => $blood_grp,
				'staff_dob'              => $staff_dob,
				'social_category'        => $social_category,
				'teacher_type'           => $teacher_type,
				'appointment_nature'     => $appointment_nature,
				'e_prnts_nme'   		 => $teacherfathername,
				'teacher_mother_name'    => $teachermothername,
				'teacher_spouse_name'    => $teacherspousename,
				'disability_type'        => $disability_type,
				'types_disability'       => $types_disability,
				'recruit_type'      	 => $staff_mode_recruitment,
				'recruit_rank'      	 => $staff_rank,
				'recruit_year'    		 => $staff_yearselection,
				'staff_join'             => $staff_join,
				'staff_pjoin'            => $staff_pjoin,
				'staff_psjoin'           => $staff_psjoin,
				'cps_gps_details'        => $cpsdetails,
				'suffix'          		 => $suffix,
				'cps_gps'          		 => $cpsgps,
				'mbl_nmbr'               => $mbl_nmbr,
				'email_id'               => $email_id,
				'e_prsnt_doorno'   		 => $e_prsnt_doorno,
				'e_prsnt_place' 		 => $e_prsnt_city,   
				'e_prsnt_street' 		 => $e_prsnt_street, 
				'e_prsnt_distrct' 		 => $e_prsnt_distrct,
				'e_prsnt_pincode'		 => $e_prsnt_pincode,	
				'academic'               => $academic,
				'e_ug'               	 => $ug,
				'e_pg'           	     => $pg,
				'professional'           => $professional,
				'appointed_subject'      => $appointed_subject,
				'subject1'               => $subject1,
				'subject2'               => $subject2,
				'subject3'               => $subject3,
				'subject4'               => $subject4,
				'subject5'               => $subject5,
				'subject6'               => $subject6, 
				'udise_code'             => $school_udise,
				//'school_key_id'          => $school_id,
                'deputed'                => $deputed,
				'dep_place'              => $dep_place,
				'dep_off'                => $dep_off,
				'dep_scl'                => $dep_scl,
                'dep_date'               => date('Y-m-d',strtotime($date)),
                'archive'                => '1',
				'createdat'              => date('Y-m-d H:i:s')
				); 
                
                $bankdetails=array(
				'school_key_id' =>$off_key_id,
				'teacher_id' => $teachercode,
				'ifsc_code' => $ifsccode,
				'branch_id' => $branch_id,
				'bank_acc' => $accountnumber,
				'pan_no' =>$pannumber 
				);
				$cid=$this->Udise_staffmodel->staffreg($data); 
				$bd=$this->Udise_staffmodel->staffregbankdata($bankdetails);
               // $z=0;
                //print_r($cid);echo('<br><br><br><br><br><br><br>');
                /*for($i=1;isset($_POST['lang-'.$i.'_0']);$i++){
                    for($j=0;isset($_POST['lang-'.$i.'_'.$j]);$j++,$z++){
                        $d['u_id']=$cid;
                        $d['medium_instruct']=$_POST['lang-'.$i.'_'.$j];
                        $d['medium_category']=$i;
                        $d['created_date']=date("Y-m-d h:i:s");
                        $dmul[$z]=$d;
                    }
                }
                //print_r($dmul);
                //die();
				$cid=$this->Udise_staffmodel->staffreg($dmul,1); */
			}$this->load->view('Udise/emis_schoolstaff_regmsg',$data);
		}
	 }else{
			
			redirect('home/emis_school_home','refresh');
		}
    }

	
	//*page4 non teaching staff
	
	public function emis_school_staff4(){
		
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$is_high_class=$this->session->userdata('emis_school_highclass');
        
		if($emis_loggedin) {

		  $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
                    //$data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
					$data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
                    $data['staff_cat'] = $this->Udise_staffmodel->get_nonteacher_type();
					$data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
					$data['schooldist'] = $this->Datamodel->getallachooldist();
					$data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
					$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
                    $a='';
                    $data['academic'] = $this->Udise_staffmodel->get_academic($a);
                    $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
                    $data['professional'] = $this->Udise_staffmodel->get_professional();
                     $data['office_id'] = $this->Udise_staffmodel->get_office_id();
					//echo json_encode($data['staff_cat']);
					$data['validation_error']="";
						
						
                     $this->load->view('Udise/emis_school_staff4',$data);
              
                
               
			}
		}else { redirect('/', 'refresh'); }
		
		
		
		//$this->load->view('Udise/emis_school_staff4', $data);	
    }
	
  

  // staff *page2 load
   public function emis_school_staff2() {
      
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$is_high_class=$this->session->userdata('emis_school_highclass');

		if($emis_loggedin) {
     
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
					//$school_udise = $this->session->userdata('emis_school_udise');
             $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
					   $data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
             $data['staff_cat'] = $this->Udise_staffmodel->get_teacher_type();
					   $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
					   $data['schooldist'] = $this->Datamodel->getallachooldist();
					   $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
					   $data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
                       $data['office_id'] = $this->Udise_staffmodel->get_office_id();
         
          //  print_r($data['office_id']);
                       //$school_key_id = $this->session->userdata('emis_school_id');
                       
                       $data['mediumInstruct']=$this->Udise_staffmodel->getMediumInstruct();
                       $a=' where visibility=0';
                       $data['academic'] = $this->Udise_staffmodel->get_academic($a);
                       $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
                       $data['professional'] = $this->Udise_staffmodel->get_professional();
                       
					   //echo json_encode($data['teachersocial']);
                       
                        
                        
                        $this->load->view('Udise/emis_school_staff2',$data);
                    //}else{ //redirect('/', 'refresh');
                    //}

                
              
         }
        else { redirect('/', 'refresh'); }
     }
     }
	 public function get_bank_details()
	 {
     
     $ifsc = $this->input->post('ifsc');
	
     $bankdetails = $this->Udise_staffmodel->get_bank_details($ifsc);
	
     echo json_encode($bankdetails);
	 }
	 public function emis_school_vocational_staff() {
      
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$is_high_class=$this->session->userdata('emis_school_highclass');

		if($emis_loggedin) {
     
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
					//$school_udise = $this->session->userdata('emis_school_udise');
                       $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
					   $data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
                       $data['staff_cat'] = $this->Udise_staffmodel->get_teacher_type();
					   $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
					   $data['schooldist'] = $this->Datamodel->getallachooldist();
					   $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
					   $data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
                       $data['office_id'] = $this->Udise_staffmodel->get_office_id();
         
          //  print_r($data['office_id']);
                       //$school_key_id = $this->session->userdata('emis_school_id');
                       
                       $data['mediumInstruct']=$this->Udise_staffmodel->getMediumInstruct();
                       $a=' where visibility=0';
                       $data['academic'] = $this->Udise_staffmodel->get_academic($a);
                       $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
                       $data['professional'] = $this->Udise_staffmodel->get_professional();
                       
					   //echo json_encode($data['teachersocial']);
                       
                        
                        
                        $this->load->view('Udise/emis_school_vocational_staff',$data);
                    //}else{ //redirect('/', 'refresh');
                    //}

                
              
         }
        else { redirect('/', 'refresh'); }
     }
     }
     
     public function emis_school_volunteers_staff() {
      
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$is_high_class=$this->session->userdata('emis_school_highclass');

		if($emis_loggedin) {
     
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
					//$school_udise = $this->session->userdata('emis_school_udise');
                       $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
					   $data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
                       $data['staff_cat'] = $this->Udise_staffmodel->get_teacher_type();
					   $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
					   $data['schooldist'] = $this->Datamodel->getallachooldist();
					   $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
					   $data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
                       $data['office_id'] = $this->Udise_staffmodel->get_office_id();
                       $data['mediumInstruct']=$this->Udise_staffmodel->getMediumInstruct();
                       $a=' where visibility=0';
                       $data['academic'] = $this->Udise_staffmodel->get_academic($a);
					   //print_r($data['academic']);
                       $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
                       $data['professional'] = $this->Udise_staffmodel->get_professional();
                      
                        $this->load->view('Udise/emis_school_volunteers_staff',$data);
                   
         }
        else { redirect('/', 'refresh'); }
     }
     }
	  public function emis_school_volunteers_staff_data() {
		  // print_r('bala');
		  // die();
		 
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$school_udise = $this->session->userdata('emis_school_udise');
		$a=' where visibility=0';
		 $data['academic'] = $this->Udise_staffmodel->get_academic($a);
		  $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
		$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
		 $data['professional'] = $this->Udise_staffmodel->get_professional();
		$school_id = $this->session->userdata('emis_school_id');
		
		if ($emis_loggedin) {
			
				$data = array(
				'teacher_name'           => $this->input->post('teachername'),
				'aadhar_no'              => $this->input->post('aadhar'),
                'school_key_id'          => $school_id,
				'gender'                 => $this->input->post('gender'),
				'staff_dob'              => $this->input->post('dob'),
				'staff_join'             => $this->input->post('doj'),
				'organization_type'      => $this->input->post('orgtype'),
				'organization_name'      => $this->input->post('orgname'),
				'mbl_nmbr'               => $this->input->post('contact'),
				'email'                  => $this->input->post('email'),
				'academic'               => $this->input->post('qulafication_academic'),
				'professional'           => $this->input->post('qualification_professional'),
				'e_ug'               	 => $this->input->post('ug'),
				'e_pg'           	     => $this->input->post('pg'),
                'Active'                =>  $this->session->userdata('user_type'),
				'created_date'              => date('Y-m-d H:i:s')
				); 
// print_r($data);
// die();				
				$cid=$this->Udise_staffmodel->volunteersstaffreg($data);
				echo $cid;
              
			//$this->load->view('Udise/emis_school_staff3',$data);
		}else{
			
			redirect('home/emis_school_home','refresh');
		}
     }
      public function emis_school_volunteers_staff_get() {
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		
		if($emis_loggedin) {
                   $a=' where visibility=0';
		           $data['academic'] = $this->Udise_staffmodel->get_academic($a);
				   $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
		           $data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
				    $data['professional'] = $this->Udise_staffmodel->get_professional();
                    $aadharno=$this->input->post('submit_aadhaar');
					if(!empty($aadharno))
					{
				    $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
                    $data['volunteers_teacher'] = $this->Udise_staffmodel->get_volunteers($aadharno);
					$data['tabactive']=1;
					}
					else
					{
						
				  $data = array(
                'school_key_id'          =>$this->session->userdata('emis_school_id'), 
				'teacher_id'             =>$this->input->post('teacherid'),
				'teacher_name'           =>$this->input->post('teachername'),
				'from_date'              =>$this->input->post('fromdate'),
				'to_date'                =>$this->input->post('todate'),
				'sub1'                   =>$this->input->post('subj1'),
				'sub2'                   =>$this->input->post('subj2'),
				'sub3'                   =>$this->input->post('subj3'),
				'sub4'                   =>$this->input->post('subj4'),
				'sub5'                   =>$this->input->post('subj5'),
				'sub6'                   =>$this->input->post('subj6'),
				'created_date'           => date('Y-m-d H:i:s')
				);
				$vid=$this->Udise_staffmodel->volunteersstaffreg_subjects($data);
				echo $vid;
					}
					
                    $this->load->view('Udise/emis_school_volunteers_staff',$data);
         }
        else { redirect('/', 'refresh'); }
     }
     
     
     public function teacherdeputation() {
         $school_udise  = $this->session->userdata('emis_school_udise');
         $data['staffdetails']= $this->Udise_staffmodel->get_depute_details($school_udise);
         $this->load->view('Udise/teacherdeputation',$data);
         
     }
     
     public function teacherdeputationview() {
        $teacher_code = $this->input->post('teacher_code');
        $d= json_encode(json_decode(json_encode($this->Udise_staffmodel->deputationentry($teacher_code)), true));
        echo $d;
     }
     
     public function deputealllist(){
        $selectaddress = $this->uri->segment(3,0);
            foreach($_POST as $index => $value){
                $ind = explode('_',$index);
                if($ind[0]=='districtstaff'){
                    $dist = $value;
                }elseif($ind[0]=='blockid'){
                    $blk = $value;
                }             
            }
            
        if($selectaddress == 1){
            $where = 'students_school_child_count.district_id='.$dist;
            $group = ' group by block_id';
        }elseif($selectaddress == 2){
            $where = 'students_school_child_count.block_id='.$blk;
            $group = ' group by school_id';
        }elseif($selectaddress == 3){
            $where = 'students_school_child_count.district_id='.$dist;
            $group = ' group by off_key_id';
        }                
        $dlist = json_encode(json_decode(json_encode($this->Homemodel->deputeall($where,$group)),true));        
        echo $dlist;
     }
     
     public function deputesubmit() {
        $createdate = date('Y-m-d',strtotime('now+5hours30minutes'));
        $teacher_code  = $_POST['teacher_code'];
        
        $data = array(
            'deputed'      => $_POST['deputed']
        );
        
        
        for($i=0;$i<$_POST['deputecount'];$i++){
            if($_POST['deputedplace_'.$i]==1){
                $teacher_code  = $_POST['teacher_code'];
                $volntr[$i] = array(
                    'school_key_id'      => $_POST['schoolid_'.$i],
                    'teacher_code'       => $_POST['teacher_code'],
                    'teacher_name'       => $_POST['teacher_name'],
                    'from_date'          => $_POST['deputedfmdate_'.$i],
                    'to_date'            => $_POST['deputedtodate_'.$i],
                    'sub1'               => $_POST['sub_1'],
                    'sub2'               => $_POST['sub_2'],
                    'sub3'               => $_POST['sub_3'],
                    'sub4'               => $_POST['sub_4'],
                    'sub5'               => $_POST['sub_5'],
                    'sub6'               => $_POST['sub_6'],
                    'created_date'       => $createdate,
                    'updated_date'       => $createdate
                 );
             }
        }
        $vl = array_reverse($volntr);
        //print_r($vl[0]); die();
        for($i=0;$i<$_POST['deputecount'];$i++){
            $teacher_code  = $_POST['teacher_code'];
            $dmulti[$i] = array(
                'deputed_place'    => $_POST['deputedplace_'.$i],
                'depute_key'       => $_POST['schoolid_'.$i],
                'teacher_code'     => $_POST['teacher_code'],
                'depute_frmdate'   => $_POST['deputedfmdate_'.$i],
                'depute_todate'    => $_POST['deputedtodate_'.$i],
                'u_id'             => $_POST['u_id'],
                'created_date'     => $createdate
            );
       }
       //print_r($dmulti);   
       //die();   
       $cid=$this->Udise_staffmodel->deputesave($data,$dmulti,$vl[0],$teacher_code);
       redirect('Udise_staff/emis_school_staff3','refresh');
    }
    
    public function deputelistall(){
        $u_id = $this->input->post('u_id');
        $listall = json_decode(json_encode($this->Udise_staffmodel->deputalllist($u_id)),true);
        echo json_encode($listall);
        //print_r($listall);die();
    }
    

  // staff *page3
     public function emis_school_staff3()
    {
        // only display in table
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $is_high_class=$this->session->userdata('emis_school_highclass');
        
        if($emis_loggedin) {
            $emis_templog =$this->session->userdata('emis_school_templog');
            $emis_templog1 =$this->session->userdata('emis_school_templog1');
           
                    // print_r($this->session->userdata());
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3) {    
                        $school_id = $this->session->userdata('emis_school_id'); 
                        $school_udise  = $school_id;
                     } 
                     elseif($user_type_id==6 || $user_type_id==9 || $user_type_id==10) {
                         $office=$this->Udise_staffmodel->get_office_id();
                       //  print_r($office);
                         $this->session->set_userdata('emis_office_id',$office[0]->office_id);
                         $school_id= $school_udise=$office[0]->office_id;
                        // print_r($school_udise);die();
                    }  
                         $user_type_id1=$this->session->userdata('user_type');
        if($user_type_id1==9)
        {
          $tmp=1;
        }
        else if($user_type_id1==10)
        {
            $tmp=2;
        }
        else if($user_type_id1==6)
        {
          $tmp=3;
        }
                      $data['staffdetails']= $this->Udise_staffmodel->get_staff_details($school_udise,$tmp);
                      $data['deputedetails']= $this->Udise_staffmodel->getdepute($school_id);
                      $data['volunteerdetails']= $this->Udise_staffmodel->getvolunteer($school_id);
                      //print_r($data['deputedetails']);
                      //die();
                      $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
                      $data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
                      $data['staff_cat'] = $this->Homemodel->get_common_table_details('teacher_type');
                      $data['head_account'] = $this->Homemodel->get_common_table_details('schoolnew_head_account');
                      $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
                      $data['schooldist'] = $this->Datamodel->getallachooldist();
                      $data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
                      $data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();         
                       //$school_key_id = $this->session->userdata('emis_school_id');
                       
                       $data['mediumInstruct']=$this->Udise_staffmodel->getMediumInstruct();
                       $a=' where visibility=0';
                       $data['academic'] = $this->Udise_staffmodel->get_academic($a);
                       $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
                       $data['professional'] = $this->Udise_staffmodel->get_professional();
					       //print_r($data['staffdetails']);
                       
                        $this->load->view('Udise/emis_school_staff3',$data);
                  
                
            
        }else { redirect('/', 'refresh'); }
        // $this->load->view('Udise/emis_school_staff3');
    }
    // staff-trainee details - venba/ps
    public function school_staff_training_details(){
      // Select u_id,teacher_code,teacher_name from udise_staffreg;
      $school_id = $this->session->userdata('emis_school_id');
      $data['staff_list'] = $this->Udise_staffmodel->get_staff_name($school_id);
      $data['training_staff_list'] = $this->Udise_staffmodel->get_training_staff_dtl('',$school_id);
      // $data['teacher_training_master_list'] = $this->Homemodel->dropdown_dtls(array('id','training_name'),'teacher_training_master');
      $data['teacher_training_master_list'] = $this->Udise_staffmodel->get_list_of_teacher_training_dtls(array('id','training'),'teacher_training');
      $this->load->view('Udise/emis_school_staff_training_details',$data);
    }

    function get_trainee_details(){
      $id=$this->input->post('id');        
      $staff=$this->Udise_staffmodel->get_trainee_dtl($id);
      echo json_encode(json_decode(json_encode($staff),true));
    }

    public function save_school_staff_training_details() {
      $createdate = date('Y-m-d h:i:s');
      $teacher_code  = $_POST['teachername'];
      $training_type  = $_POST['trainingtype'];
      $other_training_type  = $_POST['othertrainingtype'] == '' ?null:$_POST['othertrainingtype'];
      $trained_at  = $_POST['trainedat'];
      $trained_date  = $_POST['traineddate'];
      $no_of_training_days  = $_POST['noofdays'];
      $id = $_POST['hdid'];
            
      $month_no = date("m", strtotime($trained_date));
      $year = date("Y", strtotime($trained_date));

      if($month_no >= 06){ $Starting = $year;$Ending = $year+1;}
      else{$Starting = $year-1;$Ending = $year;}

      $acyear = $Starting."-".$Ending;
      // 'training_days', 'int(2)', 'YES', '', NULL, ''
      $arr = array('teacher_code'=>$teacher_code,'training_type'=>$training_type,'training_other'=>$other_training_type,'trained_at'=>$trained_at,'training_date'=>$trained_date,'acyear'=>$acyear,'isactive'=>1,'createdat'=>$createdate,'training_days'=>$no_of_training_days);
      if($id == 0){
        $response = $this->Udise_staffmodel->add_training_staff_dtl($arr);
      }
      else{
        $response = $this->Udise_staffmodel->update_training_staff_dtl($arr,$id);
      }
      

      if($response == 0){
          echo('<scrpit type="text/javascript">');
          echo('alert("Try again")');
          echo('</script>');
      }
  
      redirect('Udise_staff/school_staff_training_details','refresh');
  }

  public function staff_training_dtls() { 
    
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin)
        {     
          $school_id =$this->session->userdata('emis_school_id');
          $academic_year = $this->input->post('academic_year');
          
          if(empty($academic_year))
          {
            $academic_year = '';
          }
          
          $data['training_staff_list'] = $this->Udise_staffmodel->get_training_staff_dtl($academic_year,$school_id);
          $data['aca_year_list'] = $this->Udise_staffmodel->get_ac_year_from_teacher_training_details();
          $data['aca_year'] = $academic_year;
          $this->load->view('Udise/emis_school_staff_training_report',$data);

    }else{redirect('/', 'refresh');}

  }



// udise staff X-editable datas

    // Update teacher name
    public function updateteachername() {
     
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $user_id = $this->session->userdata('emis_staff_uniqid');
      $school_id = $this->session->userdata('emis_school_id');
       // $user_id = 1;
      if (true)
        {
        $data = array(
          "teacher_name" => $value
        );
        if ($this->Udise_staffmodel->updatestaffregdata($data,$user_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Teacher Name" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }




function UpdateStaffData(){
    $fieldname=$this->uri->segment(4,0);
    $u_id=$this->uri->segment(3,0);
    $value = $this->input->post('value');
    //print_r($value);
    //die();
    $data = array(
          $fieldname => $value
    );
    
    if($this->Udise_staffmodel->updatestaffregdata($data, $u_id))
    {
        $result_arr['response_code'] = 1;
        $result_arr['district'] = $value;
    }
    else
    {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
    }

    echo json_encode($result_arr);
}

  // staffdetails *staffdata
  public  function emis_school_staffdata(){
$this->load->library('session');
    
		$unique_id_staff= $this->uri->segment(3);  
		//print_r($unique_id_staff);
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$data['staff']=$this->Udise_staffmodel->getteacherstaffdetails($unique_id_staff);
		//print_r($data['staff']);
		$this->load->view('Udise/emis_school_staffdetail', $data);
		
	

}

 // staffdetails *staffdata
  public  function emis_school_staffdatas(){
        $this->load->library('session');
        $unique_id_staff= $this->uri->segment(3);  
        $emis_loggedin = $this->session->userdata('emis_loggedin');
		$data['staff']=$this->Udise_staffmodel->getnonteacherstaffdetails($unique_id_staff);
		//print_r($data['staff']);
		//die();
		
		$this->load->view('Udise/emis_school_nonteachstaffdetail', $data);
        

}

// emis_school_staffdata *details show

    public function emis_school_staffdata1(){
      $school_udise = $this->session->userdata('emis_school_udise');
  $this->load->library('session');
    $unique_id_staff= $this->uri->segment(3);
    $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
	$data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
    $data['staff_cat'] = $this->Udise_staffmodel->get_teacher_type();
    $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
	$data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['schoolblk'] = $this->Datamodel->getallschoolblk();
	$data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
	$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
    $a='where visibility=0';
    $data['academic'] = $this->Udise_staffmodel->get_academic($a);
    $data['professional'] = $this->Udise_staffmodel->get_professional();
    $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
    $data['office'] =$this->Udise_staffmodel->get_teacher_office();
    $data['schools'] = $this->Udise_staffmodel->getallschools();
    $data['staff'] = $this->Udise_staffmodel->get_staff_form_details($unique_id_staff);
    
    //print_r($data['staff']);
     $this->load->view('Udise/emis_school_staffdata1', $data);
    
  
}

// emis_school_staffdata *details show

    public function emis_school_staffdata2(){
      
  $this->load->library('session');
    $unique_id_staff= $this->uri->segment(3);
    $data['uniqueid'] = $unique_id_staff;
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
	$data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
    $data['staff_cat'] = $this->Udise_staffmodel->get_nonteacher_type();
    $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
	$data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['schoolblk'] = $this->Datamodel->getallschoolblk();
	$data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
	$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
    $a='';
    $data['academic'] = $this->Udise_staffmodel->get_academic($a);
  
    $data['professional'] = $this->Udise_staffmodel->get_professional();
    $data['staff'] = $this->Udise_staffmodel->get_staff_form_details($unique_id_staff);
    $data['teachersocial'] = $this->Udise_staffmodel->get_techsocialcat();
    $data['office'] =$this->Udise_staffmodel->get_teacher_office();
    $data['schools'] = $this->Udise_staffmodel->getallschools();
    //print_r($data['schools']);
    $this->load->view('Udise/emis_school_staffdata2', $data);
    
  
}

function checkaadhar() {
    $aadhar = $this->input->post('aadhar');
    $aadhar = $this->Udise_staffmodel->get_aadhar($aadhar);
    echo json_encode($aadhar);
    //print_r($aadhar);
}
function checkaadharvolunteers() {
    $aadhar = $this->input->post('aadhar');
    $aadhar = $this->Udise_staffmodel->get_aadhar_volunteers($aadhar);
    echo json_encode($aadhar);
    //print_r($aadhar);
    //die();
}

		/** 
		  * Created By VIT,
		 ****/
public function emis_school_staffsearching()
{
	 $emis_loggedin = $this->session->userdata('emis_loggedin');
        $is_high_class=$this->session->userdata('emis_school_highclass');
        $school_udise  = $this->session->userdata('emis_school_udise');
		$emis_school_id = $this->session->userdata('emis_school_id');
		$emis_staff_search_adhaar = $this->input->post('emis_staff_search_adhaar');
		
        if($emis_loggedin) {
			
            $emis_templog =$this->session->userdata('emis_school_templog');
            $emis_templog1 =$this->session->userdata('emis_school_templog1');
            if($emis_templog==0 || $emis_templog1==0){
                redirect('home/emis_school_gotoredirect','refresh');
            }
            else{
                    
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9) {
                       if(!empty($emis_staff_search_adhaar))
					    {					
                     
                        $data['transferstaffdetails']= $this->Udise_staffmodel->get_transfer_staff_details($school_udise,$emis_staff_search_adhaar);
						$data['emis_staff_search_adhaar'] = $emis_staff_search_adhaar;
						}
						else
						{
						 $data['transferstaffdetails']='';	
						}
						
						//echo json_encode($data['staffdetails']);
                         $this->load->view('Udise/emis_school_staffsearching',$data);
                    }else{ redirect('/', 'refresh');}
               
			}
            
        }else { redirect('/', 'refresh'); }
       
    }
	
	public function emis_school_staffcurd()
{
	 $emis_loggedin = $this->session->userdata('emis_loggedin');
        $is_high_class=$this->session->userdata('emis_school_highclass');
        $school_udise  = $this->session->userdata('emis_school_udise');
		$emis_school_id = $this->session->userdata('emis_school_id');
		
		$emis_staff_search_adhaar = $this->input->post('emis_staff_search_adhaar');
		
        if($emis_loggedin) {
			if(!empty($emis_staff_search_adhaar)){
            $emis_templog =$this->session->userdata('emis_school_templog');
            $emis_templog1 =$this->session->userdata('emis_school_templog1');
            if($emis_templog==0 || $emis_templog1==0){
                redirect('home/emis_school_gotoredirect','refresh');
            }
            else{
                    // if($is_high_class)
                    // {
                    $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9) {    
                        $school_id = $this->session->userdata('emis_school_id');   
                        $data['transferstaffdetails']= $this->Udise_staffmodel->get_transfer_staff_curd($school_udise,$emis_staff_search_adhaar);
						$data['emis_staff_search_adhaar'] = $emis_staff_search_adhaar;
						//echo json_encode($data['staffdetails']);
                         $this->load->view('Udise/emis_school_staffcurd',$data);
                    }else{ redirect('/', 'refresh');}
                // }
              // else
              // {
              //   //$this->session->set_flashdata('errors','Your school does not have any staff Details');
              //   redirect('Udise_staff/emis_school_staff3', 'refresh');
              // }
			}
            }else
			{
					$this->load->view('Udise/emis_school_staffcurd');
			}
        }else { redirect('/', 'refresh'); }
        // $this->load->view('Udise/emis_school_staff3');
    }
	
// created by vit for update archive in udise_staffreg.archive//

/****************************/
	
	// created by vit for update archive in udise_staffreg.archive//

 public function transfer_staff()
{
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		 if($emis_loggedin)
			  {
				$staff_uid = $this->input->post('teacher_id[uid]');
				
				//$teacher_code = $this->input->post('teacher_id[teacher_code]');
				$staff_transfer_update = $this->Udise_staffmodel->update_transfer_id($staff_uid);
				echo json_encode($staff_transfer_update);
			  }
		  else
			  {
				redirect('/', 'refresh');
			  }
}

// created by vit for update admit transfer in udise_staffreg.archive,emis_school_id,emis_school_udise//

public function admit_staff_transfer()
{
	   $emis_loggedin = $this->session->userdata('emis_loggedin');
		 if($emis_loggedin)
				{
				// $update['udise_code']  = $this->session->userdata('emis_school_udise');
				$update['school_key_id'] = $this->session->userdata('emis_school_id');
				$staff_uid = $this->input->post('u_id[uid]');
      //  $school_id = $this->input->post('u_id[school_key_id]');
        $school_id = $this->session->userdata('emis_school_id');
        $teacher_code = $this->input->post('u_id[teacher_code]');
				$update['u_id'] = $staff_uid;
       // $update['school_key_id'] = $school_id;
      //  print_r($school_id);die();
        $update['teacher_id'] = $teacher_code;
				$update['archive'] =  '1';
				$staff_transfer_admit = $this->Udise_staffmodel->update_admit_transfer_id($staff_uid,$update,$school_id,$teacher_code);
			    echo json_encode($staff_transfer_admit);
				}
		       else
				{
					redirect('/', 'refresh');
				}
}

      /**
      *  Teacher Home Dashboard
      *  VIT-sriram
      *  05/03/2019
      **/

      public function emis_Udise_staff_dash()
      {
        $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin)
        {
            $temp_log = $this->session->userdata('emis_temp_log');
            // print_r($this->session->userdata());die;
            // echo $temp_log;die;
          $teacher_id = $this->session->userdata('emis_teacher_id');
            // if($temp_log==1){
              // echo "if";
         $teacher_list = $this->Udise_staffmodel->getteacherstaffdetails($teacher_id);
          $keyname = 'Teachers/photo_all/'.$teacher_list[0]->e_picid.'.jpgx';
          // print_r($teacher_list);die;
         $data['teacher_list'] = $teacher_list;
         $data['password'] = $this->Udise_staffmodel->get_sso_password($teacher_id);
         // print_r($teacher_id);
         if($teacher_list[0]->e_picid !=''){
         $data['img_data'] = $this->aws_s3->get_AWS_S3_Images(TEACHER_BUCKET_NAME,$keyname,'+5 minutes','','');
          }else
          {
            $data['img_data'] = '';
          }

          if($this->session->userdata('emis_usertype1')==90002)
          {
              $data['obs_data'] = $this->Udise_staffmodel->emis_brte_staff_observation_records($this->session->userdata('emis_username'));
          }else
          {
              $data['obs_data'] = '';
          }
         $school_id = $this->session->userdata('emis_teacher_school_id');
         $data['home_work_detail'] = $this->Udise_staffmodel->get_home_work_details($school_id,$teacher_id);
         $data['school_classwise'] = $this->Udise_staffmodel->get_schoolwise_class($school_id);
         // echo "<img src=".$img_data.">";
         $brte_id = $this->session->userdata('emis_user_id');
        if($brte_id!=''){
          $data['brte_block_list']=$this->Udise_staffmodel->brte_block_list();
         // $data['school_details']=$this->Udise_staffmodel->pindics_school_detial($data);
         } 
         $this->load->view('Udise_staff/emis_Udise_staff_dash',$data);
         // }else{
          // echo $temp_log;
          // echo "else";
         // $data['password'] = $this->Udise_staffmodel->get_sso_password($teacher_id);
            
         //    $this->load->view('Udise_staff/emis_Udise_staff_reset',$data);
         
        // }
       }else
        {
          redirect('/', 'refresh');
        }
      }


      // get section 

      public function get_school_section_details()
      {
          
                $class_id = $this->input->post('class_id');
               $school_id = $this->session->userdata('emis_teacher_school_id');
      
                $class_section = $this->Udise_staffmodel->get_schoolwise_class_section($class_id,$school_id);
                echo json_encode($class_section);
              
            }
      
      public function get_subjects_details()
      {
                $class_id = $this->input->post('class_id');
                $where = array('class'=>$class_id,'hw_subject'=>1);
          $subject_det = $this->Udise_staffmodel->get_subject_details($class_id);

          echo json_encode($subject_det);
      }


      // save  Home Work

      public function save_home_work()
      {
          $records = $this->input->post('records',FALSE);
          // print_r($records);die;

          $records['school_Key_id'] = $this->session->userdata('emis_teacher_school_id');
          $records['teacher_id'] = $this->session->userdata('emis_teacher_id');
          $records['date'] = date('Y-m-d');
          // $records['information'] = html_escape($records['information']);
          $records['created_at'] = date('Y-m-d h:i:s');
          // $records['']
          // print_r($records);die;
          $result = $this->Udise_staffmodel->save_home_work('teachers_homework',$records);
          echo json_encode($result);
      }


      public function emis_teacher_reset_password()
      {

          $update['emis_user_id']  = $this->session->userdata('emis_user_id');
          $update['temp_log'] = 1;
          $update['emis_password'] = md5($this->input->post('emis_rest_user_cnfpass'));
          $update['ref'] = $this->input->post('emis_rest_user_cnfpass');

          // print_r($update);
          $reset_data = $this->Udise_staffmodel->update_reset_password($update);
            // $reset_data = 1;
          if($reset_data){
            echo "if";
              $this->session->unset_userdata('emis_temp_log');
              $this->session->set_userdata('emis_temp_log',1);
              // print_r($this->session->userdata());
          redirect($this->emis_Udise_staff_dash());
          }else
          {
            echo "else";
            $data['error'] = "Something Went Wrong Please Try Again";
            $this->load->view('Udise_staff/emis_Udise_staff_reset',$data);

          }
      }

      /********************************* End *********************************/

      /******************************** Teacher Edit *************************/
      /*********************
      * Check Aadhar Number* 
      * VIT-sriram         *
      * 10/04/2019         *
      **********************/

      function check_aadhar_no()
      {
          $aadhar_no = $this->input->post('aadhar_no');
          $id = $this->input->post('id');
         $table = 'udise_staffreg';
          $where = array('aadhar_no'=>$aadhar_no);

          $result = $this->Udise_staffmodel->check_aadhar_no($table,$where,$id);
          echo json_encode($result);die;
      }


      function update_staff_details()
      {
        $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin)
        {
          $user_type_id=$this->session->userdata('emis_user_type_id');
                    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
          // print_r($this->input->post());die;
                     //    $image_name = $this->input->post('emis_image_name');
          // echo $image_data;die;
         $checkaccountnumber    = $this->input->post('accountnumber');
		 $checkteachercode  = $this->input->post('teachercode');
		 $accountcount = $this->Udise_staffmodel->count_accountnumber($checkaccountnumber,$checkteachercode);
		  $ttdata= $accountcount[0]->countdata;
		  //print_r($ttdata);
		  //die();
		  if($ttdata > 0) 
		{
			 echo '<script>alert("Account Number Already Exist!");</script>';
			   redirect('Udise_staff/emis_school_staff3','refresh');
		}
		else
			{

        $teacher_name           = $this->input->post('emis_reg_staff_name');
        $teacher_name_tamil           = $this->input->post('emis_reg_staff_tname');
        $office_id              = $this->input->post('office_id');
        //print_r( $office_id );die();
        $aadhar_no              = $this->input->post('emis_reg_staff_aadhaar');
        $gender                 = $this->input->post('emis_reg_staff_gender');
        $blood_grp              = $this->input->post('emis_reg_staff_bg');
        $staff_dob              = date('Y-m-d',strtotime($this->input->post('emis_reg_staff_dob')));
        $staff_join             = date('Y-m-d',strtotime($this->input->post('emis_reg_staff_join')));
        $staff_pjoin            = date('Y-m-d',strtotime($this->input->post('emis_reg_staff_pjoin')));
        $staff_psjoin           = date('Y-m-d',strtotime($this->input->post('emis_reg_staff_psjoin')));
        $social_category        = $this->input->post('emis_reg_staff_socialcategory');
        $teacher_type           = $this->input->post('emis_reg_staff_teachertype');
        $appointment_nature     = $this->input->post('emis_reg_staff_appntmntnature');
        $teacherfathername      = $this->input->post('emis_reg_staff_fname');
        $teachermothername      = $this->input->post('emis_reg_staff_mname');
        $teacherspousename      = $this->input->post('emis_reg_staff_spname');
        $disability_type        = $this->input->post('emis_reg_staff_typeofdisability');
        $types_disability       = $this->input->post('emis_reg_staff_distype');
        $staff_mode_recruitment  = $this->input->post('emis_reg_staff_mode');
        $staff_rank             = $this->input->post('emis_reg_staff_rank');
        $staff_yearselection    = $this->input->post('emis_reg_staff_yearselection');
        $cpsdetails             = $this->input->post('emis_reg_cpsgps_details');
        $suffix                 = $this->input->post('emis_reg_staff_suffix');
        $cpsgps                 = $this->input->post('emis_reg_staff_cps');
        $mbl_nmbr               = $this->input->post('emis_reg_staff_contact');
        $email_id               = $this->input->post('emis_reg_staff_email');
        $e_prsnt_doorno         = $this->input->post('emis_reg_staff_door');
        $e_prsnt_city           = $this->input->post('emis_reg_staff_city');
        $e_prsnt_street         = $this->input->post('emis_reg_staff_street');
        $e_prsnt_distrct        = $this->input->post('emis_reg_staff_district');
        $e_prsnt_pincode        = $this->input->post('emis_reg_staff_pincode');
        $academic               = $this->input->post('emis_reg_staff_qualificationacademic');
        $professional           = $this->input->post('emis_reg_staff_qualificationprofessional');
        $appointed_subject      = $this->input->post('emis_reg_staff_appntedforsubject');
        $subject1               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj1');
        $subject2               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj2');
        $subject3               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj3');
	    $subject4               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj4');
        $subject5               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj5');
        $subject6               = $this->input->post('emis_reg_staff_mainsubjcttaughtsubj6');
        $ug                     = $this->input->post('emis_reg_staff_ug');
        $pg                     = $this->input->post('emis_reg_staff_pg');
	    $ifsccode              = $this->input->post('ifsc_code');
        $branch_id             = $this->input->post('bankid');
        $accountnumber         = $this->input->post('accountnumber');
	   $pannumber             = $this->input->post('pannumber');
                
      //  $e_picid                =  (!empty($image_name)?$image_name:$this->input->post('u_id').'.jpg');

   $image_data = $this->input->post('emis_image_data');
        
         
          // print_r($this->input->post('teacher_id'));die();

            $image_name = $this->input->post('emis_image_name');
 //  echo $image_name;die;
          $data = array(
        'u_id'               =>$this->input->post('u1_id'),
        'teacher_name'           => $teacher_name,
        'teacher_name_tamil'=>$teacher_name_tamil,
        'off_id'              => $office_id,
        'aadhar_no'              => $aadhar_no,
        'gender'                 => $gender,
        'e_blood_grp'      => $blood_grp,
        'staff_dob'              => $staff_dob,
        'social_category'        => $social_category,
        'teacher_type'           => $teacher_type,
        'appointment_nature'     => $appointment_nature,
        'e_prnts_nme'        => $teacherfathername,
        'teacher_mother_name'    => $teachermothername,
        'teacher_spouse_name'    => $teacherspousename,
        'disability_type'        => $disability_type,
        'types_disability'       => $types_disability,
        
        'recruit_type'         => $staff_mode_recruitment,
        'recruit_rank'         => $staff_rank,
        'recruit_year'         => $staff_yearselection,
        'staff_join'             => $staff_join,
        'staff_pjoin'            => $staff_pjoin,
        'staff_psjoin'           => $staff_psjoin,
        'cps_gps_details'        => $cpsdetails,
        'suffix'               => $suffix,
        'cps_gps'              => $cpsgps,
        'mbl_nmbr'               => $mbl_nmbr,
        'email_id'               => $email_id,
        'e_prsnt_doorno'       => $e_prsnt_doorno,
        'e_prsnt_place'      => $e_prsnt_city,   
        'e_prsnt_street'     => $e_prsnt_street, 
        'e_prsnt_distrct'      => $e_prsnt_distrct,
        'e_prsnt_pincode'    => $e_prsnt_pincode, 
        'academic'               => $academic,
        'e_ug'                 => $ug,
        'e_pg'                 => $pg,
        
        'professional'           => $professional,
        'appointed_subject'      => $appointed_subject,
        'subject1'               => $subject1,
        'subject2'               => $subject2,
        'subject3'               => $subject3,
		 'subject4'           => $subject4,
        'subject5'               => $subject5,
        'subject6'               => $subject6,
        'archive'                => '1',
        
        );
		
		$bankdetails=array(
				
				
				'ifsc_code' => $ifsccode,
				'branch_id' => $branch_id,
				'bank_acc' => $accountnumber,
				'pan_no' =>$pannumber 
				);
           if($image_data!='')
           {
            // echo "if";
             $this->base_get();
              if($user_type_id==1 || $user_type_id==2 || $user_type_id==3) 
              {    

                          $school_id = $this->session->userdata('emis_school_id'); 
                          $e_picid  = ($image_name!=''?$image_name:$this->input->post('teacher_id'));
                         
              }elseif($user_type_id==6 || $user_type_id==9 || $user_type_id==10) 
              {
                  $off_id = $this->session->userdata('emis_office_id');
                  $e_picid  = ($image_name!=''?$image_name:$this->input->post('teacher_id'));
              }
              
             $data['e_picid'] = $e_picid;
            }

         // echo"<pre>";print_r($data);echo"</pre>";die;
          $result = $this->Udise_staffmodel->update_staff_det($data);
		  $teachercode  = $this->input->post('teachercode');
		  $teachercount = $this->Udise_staffmodel->count_teacher($teachercode);
		  $ttdata= $teachercount[0]->countdata;
		  if($ttdata > 0) 
		{
			$result1 = $this->Udise_staffmodel->update_staff_bank($bankdetails,$teachercode);
			
		}
		else
		{
			 $school_id=$this->session->userdata('emis_school_id');
		     $insertbankdetails=array(
				'school_key_id' =>$school_id,
				'teacher_id' => $teachercode,
				'ifsc_code' => $ifsccode,
				'branch_id' => $branch_id,
				'bank_acc' => $accountnumber,
				'pan_no' =>$pannumber 
				);
				
				$bd=$this->Udise_staffmodel->staffregbankdata($insertbankdetails);
		}
          $this->session->set_flashdata('teacher_update',$data['teacher_name'].' Successfully Updated');

          // if($result){

          redirect('Udise_staff/emis_school_staff3','refresh');
          // }
        }
		}
        }
          else
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
          // print_r($students_id);die;
          $image_name = $this->input->post('emis_image_name');
          $user_type_id=$this->session->userdata('emis_user_type_id');
          // echo $image_name;
          if($students_id!='')
          {
            $students_id = $students_id;
          }else
          {

              if($user_type_id==1 || $user_type_id==2 || $user_type_id==3) 
              {    
                
                          $school_id = $this->session->userdata('emis_school_id'); 

                          $students_id  = ($image_name!=''?$image_name:$this->input->post('teacher_id'));
                         
              }elseif($user_type_id==6 || $user_type_id==9 || $user_type_id==10) 
              {
                
                  $off_id = $this->session->userdata('emis_office_id');
                  $students_id  = ($image_name!=''?$image_name:$this->input->post('teacher_id'));

              }

          }
         // print_r($students_id);die;

          $tempdoc = $output_file;
          // $tempdocname = $students_id;
          $key = 'Teachers/photo_all'.'/'.$students_id.'.jpgx';
          $tmp = $tempdoc;
          // echo $key;
        $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$key,$tmp);
        // echo $s3Result;die;
           

  }


      /****************************** End ****************************/

      /**************************************
        * Udise Staff PDF                   *
        * VIT-sriram                        *
        * 15/05/2019                        *
        *************************************/

      public function generate_staff_pdf()
      {
          $emis_loggedin = $this->session->userdata('emis_loggedin');
          if($emis_loggedin)
            {
              $staff_id = $this->uri->segment(3,0);
              $staff_details = $this->Udise_staffmodel->get_staff_form_details($staff_id)[0];
              $data['staff_details'] = $staff_details;
              $date_where = array('teacher_id'=>$staff_details->teacher_code);
              $data['teacher_dates']  = Common::get_single_list('teacher_dates',$date_where);
              $data['teacher_regu_dates'] = Common::get_multi_list('teacher_regu_dates',$date_where); 
			  
              // $temp_data = $data['teacher_dates'] ;
              
                  $head_account = $this->Udise_staffmodel->get_head_account_details($data['teacher_dates']->head_account);
                  if(!empty($head_account)){
                    $head_of_account_name = $head_account[0]->head_of_account_name;
                    $data['teacher_dates']->head_of_account_name = $head_account[0][head_of_account_name];
                  }
                  else{
                    $data['teacher_dates']->head_of_account_name = '--';
                  }

                  
              $html = $this->load->view('Udise_staff/emis_Udise_staff_pdf',$data,TRUE);
              $this->m_pdf = new mpdf('ta',[216, 356]);
              $this->m_pdf->showImageErrors = true;
              $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
              $this->m_pdf->setFooter("Page {PAGENO} of {nb}");
              $this->m_pdf->WriteHTML($html,2);
              $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      } 


      /********************************** End *************************/

      /************************** Teacher Add And Edit Part2 *********/

      /****************************
        * Teacher Part2           *
        * VIT-sriram              *
        * 29/05/2019              *
        ***************************/

      public function update_udise_staff_part2()
      {
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
            $regularsation_count = $this->input->post('date_regularsation_count');
            $probation_count = $this->input->post('date_probation_count');
            // print_r($this->input->post());die;
            $save_d['id'] = $this->input->post('d_id');
            $teacher_name = $this->input->post('teach_name');
            $save_d['teacher_id'] = $this->input->post('teacher_id');
            $save_d['school_key_id'] = $this->session->userdata('emis_school_id');            
            
          $save_d['sslc_dop'] = $this->change_date($this->input->post('sslc_dop'));
          $save_d['higersec_dop'] = $this->change_date($this->input->post('higersec_dop'));        
          $save_d['doj_block'] = $this->change_date($this->input->post('doj_block'));        
          $save_d['doj_dept'] = $this->change_date($this->input->post('doj_dept'));        
          $save_d['promo_eligi_date'] = $this->change_date($this->input->post('promo_eligi_date'));
          $save_d['relinguish'] = $this->input->post('relinguish');
          $save_d['relinguish_date'] = $this->change_date($this->input->post('relinguish_date'));
          $save_d['prob_id'] = $this->input->post('prob_id');
          $save_d['prob_date'] = $this->change_date($this->input->post('prob_date'));
          $save_d['head_account'] = $this->input->post('head_acc');
          // print_r($save_d);die;
               



          $result_d = $this->Udise_staffmodel->save_staff_details('teacher_dates',$save_d);
          // print_r($result_d);die;
          $count = $this->input->post('count');
          for($i=0;$i<$count;$i++){
            if($this->input->post('regulation_drop'.$i) !=''){
            $save_e['id'] = $this->input->post('rd_id'.$i);
            $save_e['school_key_id'] = $save_d['school_key_id'];
            $save_e['teacher_id'] = $save_d['teacher_id'];
            $save_e['type_date'] = $this->input->post('regulation_drop'.$i);
            $save_e['dates']  = $this->change_date($this->input->post('regulation_date'.$i));
            $save_e['appoint_nature']  = $this->input->post('mode_drop'.$i);


              // echo"<pre>";print_r($save_e);echo"</pre>";
// die;

            $result_e[] = $this->Udise_staffmodel->save_staff_details('teacher_regu_dates',$save_e);
            }

          }

          if(sizeof($result_e))
          {
            $this->session->set_flashdata('teacher_update',$teacher_name.' Successfully Updated');
          }
            


          // echo $result;

            // print_r($save);
          redirect('udise_staff/emis_school_staff3');
          }
            else
          {
            redirect('/', 'refresh');
          }
      }


      public function change_date($date)
      { 
        // echo $date;
          $new_date = ''; 
          // if($data !=''){

          $new_date =($date!=''?date('Y-m-d',strtotime($date)):'');
          // }
          return $new_date;
      }

      /**
        * Get Part 2 Data Staff Details
        * VIT-sriram
        * 
        ******/

      public function get_staff_secondpart_details()
      {

          $flag = $this->input->post('flag');
          $teacher_code = $this->input->post('teacher_code');
          $school_key_id = $this->session->userdata('emis_school_id');
          $table = $this->input->post('table');
          $where = array('school_key_id'=>$school_key_id,'teacher_id'=>$teacher_code);

          switch ($flag) 
          {
           
            case 1:
              $select = 'id,school_key_id,teacher_id,sslc_dop,higersec_dop,doj_block,promo_eligi_date,relinguish,relinguish_date,prob_id,prob_date,doj_dept,head_account';
          $result = $this->Udise_staffmodel->get_staff_part2_details($select,$table,$where);

            break;
            case 2:
              $select = 'id,school_key_id,teacher_id,type_date,dates';
          $result = Common::get_multi_list($table,$where);

            break;
        
          }
          // echo  $where;

          echo json_encode($result);die;

      }

      /************************************
        * Reg Records Delete              *
        * VIT-sriram                      *
        * 19/06/2019                      *
        ***********************************/

      public function remove_reg_data()
      {

          $id = $this->input->post('id');
          $where = array('id'=>$id);
          $data = $this->Udise_staffmodel->reg_staff_remove($where);

          echo json_encode($data);
      }



      /** *********************************
        * Teacher Part 3                  *
        * VIT-sriram                      *
        * 29/08/2019                      *
        * *********************************/

      public function update_udise_staff_part3()
      {

          

          $update['u_id']             = $this->input->post('teach_id');
          $update['trng_needed']      = $this->input->post('emis_reg_train_need');
          $update['nontch_days']      = $this->input->post('emis_reg_staff_non_teaching_assig');
          $update['math_upto']        = $this->input->post('emis_reg_mat_upto');
          $update['science_upto']     = $this->input->post('emis_reg_sci_upto');
          $update['english_upto']     = $this->input->post('emis_reg_eng_upto');
          $update['lang_study_upto']  = $this->input->post('emis_reg_lang_upto');
          $update['soc_study_upto']   = $this->input->post('emis_reg_soc_upto');
          $update['trained_cwsn']     = $this->input->post('emis_reg_comp_staff');
          $update['trained_comp']     = $this->input->post('emis_reg_cwsn');
          $update['class_taught']     = $this->input->post('emis_reg_class_taught');

          $result = $this->Udise_staffmodel->update_staff_det($update);
          $teacher_name = $this->input->post('teach_name');
          if($result)
          {
            $this->session->set_flashdata('teacher_update',$teacher_name.' Successfully Updated');
          }

          redirect('udise_staff/emis_school_staff3');
      }


      /****************************** End *******************************/

      /******************************** Teacher Attendance *******************/


  public function emis_teacher_attendance_school()
  {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $school_id = $this->session->userdata('emis_user_id');
          $table = 'teachers_attend_daily';
          $data['teacher_list'] =  $this->Udise_staffmodel->emis_schoolwise_teacher_list($school_id,$table);
          // print_r($data);

          $this->load->view('Udise_staff/emis_staff_attendance_schoollist',$data);

       }else{redirect('/', 'refresh');}
       
  }

  public function emis_teacher_attendance_save()
  {
      $records = $this->input->post('records');
      
      foreach($records as $res)
      {
          $res['date'] = date('Y-m-d');
          $res['school_id'] = $this->session->userdata('emis_school_id');
          $res['school_code'] = $this->session->userdata('emis_school_udise');
          $res['atturl'] = 'EMIS';
          
          $result[] = $this->Udise_staffmodel->emis_teacher_save_attendance('statt_attendance_staff',$res);

      }

      echo json_encode(sizeof($result));
      
  }

  /*************************** End *****************************************/

  /*************************** Staff Attendance Report *********************/

  public function emis_staff_attendance_monthly_schoolwise()
  {
   $emis_loggedin = $this->session->userdata('emis_loggedin');
       if($emis_loggedin)
       {     
          $school_id =$this->session->userdata('emis_school_id');
          $date = $this->input->post('date');
          // print_r($date);
          // echo $school_id;
          if(!empty($date))
          {
            $date = '01-'.$date;
          }else
          {
            $date = date('01-m-Y',strtotime("-1 month"));
          }
          if($date !='')
          {
            $data['teacher_absent_list'] = $this->Udise_staffmodel->emis_staff_attendance_school_monthwise('teachers_attend_yearly',$school_id,$date);
          }
          $data['date'] = $date;

          $data['title'] = 'Staff Attendance Schoolwise';
          $this->load->view('Udise_staff/emis_staff_attendance_schoolwise',$data);

       }else{redirect('/', 'refresh');}

  }



  /************************* End ************************************/


  /************************* Schoolwise Staff Fixation **************/

  /**
    * Staff Fixation Schoolwise
    * VIT-sriram 
    * 26/09/2019
    */


  public function emis_schoolwise_staff_fixation()
  {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
       if($emis_loggedin)
       {  
            $data['staffdetails'] = $this->Udise_staffmodel->get_fixation_staff_details($this->session->userdata('emis_school_id'));
            $data['staff_name'] = $this->Udise_staffmodel->get_staff_name($this->session->userdata('emis_school_id'));
            $data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();

            $data['staff_cat'] = $this->Homemodel->get_common_table_details('teacher_type');
            $data['head_account'] = $this->Homemodel->get_common_table_details('schoolnew_head_account');
            $data['staff_summary'] = $this->Udise_staffmodel->get_schoolwise_scale_summary($this->session->userdata('emis_school_id'));
          $this->load->view('Udise/emis_staff_fixation_schoolwise',$data);
       }else{redirect('/', 'refresh');}

  }


  // save Schoolwise Staff-Fixation 

  public function save_schoolwise_staff_fixation()
  {
      

      $save['id']                = $this->input->post('fix_id');
      $save['school_key_id']     = $this->session->userdata('emis_school_id');
      $save['go_number']         = $this->input->post('emis_reg_staff_go_no');
      $save['go_dept']           = $this->input->post('emis_reg_staff_go_dept');
      $save['go_date']           = Common::dateFormat($this->input->post('emis_reg_staff_go_date'));
      $save['go_type']           = $this->input->post('emis_go_type');
      $save['designation']       = $this->input->post('emis_reg_staff_type');
      $save['appt_subject']      = $this->input->post('emis_reg_staff_subject');
      $save['teacher_id']        = $this->input->post('emis_reg_staff_id');
      $save['ac_head']           = $this->input->post('emis_reg_staff_acc_head');
      $save['temp_go_number']       = $this->input->post('emis_reg_staff_go_temp_no');
      $save['temp_go_dept']      = $this->input->post('emis_reg_staff_go_temp_dept');
      $save['temp_go_date']      = Common::dateFormat($this->input->post('emis_reg_staff_go_temp_date'));
      $save['temp_go_upto_date'] = Common::dateFormat($this->input->post('emis_reg_staff_go_temp_up_date'));

      $save['created_at']        = date('Y-m-d h:i:s');
      // echo"<pre>";print_r($save);echo"</pre>";die;
      $result = $this->Udise_staffmodel->save_staff_details('teacher_post',$save);

      if($result)
      {
        $this->session->set_flashdata('teacher_update',$save['go_number'].' Successfully Saved');
        redirect('Udise_staff/emis_schoolwise_staff_fixation');
      }
  }


  public function updateFixation()
  {
     $records = $this->input->post('records');
     $table = $this->input->post('table');


     $result = $this->Udise_staffmodel->save_staff_details($table,$records);

     echo json_encode($result);
  }

  /** Functionality Added by Wesley  */
  public function pindics_insert()
  {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      {
           
            if(($this->session->userdata('emis_teacher_id'))!=''){                  
             $wrk_days =  $this->input->post('availed_cl')+$this->input->post('availed_el')+
                          $this->input->post('availed_ml')+$this->input->post('availed_maternity_leave')+
                          $this->input->post('other_leave')+$this->input->post('training_attended')+
                          $this->input->post('training_given')+$this->input->post('election_duty')+
                          $this->input->post('on_duty')+$this->input->post('class_activity');
                        if(($this->input->post('tot_work_days')) != ''){
                            if(($this->input->post('tot_work_days')) != $wrk_days){
                              $this->session->set_flashdata('pindics_alert','Total working Days count mismatch ');
                              redirect('Udise_staff/emis_Udise_staff_dash');
                            }
                        }                 
                        $pindics['teacher_id']     = $this->session->userdata('emis_teacher_id');
                        $pindics['school_key_id']     = $this->session->userdata('emis_teacher_school_id');
                        $pindics['pi_id'] = $this->input->post('pi_id');                            
                        $class1_count =  count($this->input->post('class1'));
                        if($class1_count > '0'){
                          $class_1 = implode(',', $this->input->post('class1')); 
                          //print_r($class_1);
                        }      
                        $pindics['class_1']         = $class_1;
                        $class2_count =  count($this->input->post('class2'));
                        if($class2_count != '0'){
                          $class_2 = implode(',', $this->input->post('class2')); 
                          //print_r($class_2);
                        }     
                        $pindics['class_2']         = $class_2;
                        $class3_count =  count($this->input->post('class3'));
                        if($class3_count > '0'){
                          $class_3 = implode(',', $this->input->post('class3')); 
                          //print_r($class_3);
                        }      
                        $pindics['class_3']         = $class_3;
                        $class4_count =  count($this->input->post('class4'));
                        if($class4_count > '0'){
                          $class_4 = implode(',', $this->input->post('class4')); 
                          //print_r($class_4);
                        }      
                        $pindics['class_4']         = $class_4;
                        $class5_count =  count($this->input->post('class5'));
                        if($class5_count > '0'){
                          $class_5 = implode(',', $this->input->post('class5')); 
                          //print_r($class_5);
                        }      
                        $pindics['class_5']         = $class_5;
                        $class6_count =  count($this->input->post('class6'));
                        if($class6_count > '0'){
                          $class_6 = implode(',', $this->input->post('class6')); 
                          //print_r($class_6);
                        }      
                        $pindics['class_6']         = $class_6;
                        $class7_count =  count($this->input->post('class7'));
                        if($class7_count > '0'){
                          $class_7 = implode(',', $this->input->post('class7')); 
                          //print_r($class_7);
                        }     
                        $pindics['class_7']         = $class_7;
                        $class8_count =  count($this->input->post('class8'));
                        if($class8_count > '0'){
                          $class_8 = implode(',', $this->input->post('class8')); 
                          //print_r($class_8);
                        }
                        $pindics['class_8']         = $class_8;
                        $pindics['tot_wrk_days']   = $this->input->post('tot_work_days');
                        $pindics['cl']   = $this->input->post('availed_cl');
                        $pindics['el']   = $this->input->post('availed_el');
                        $pindics['ml']   = $this->input->post('availed_ml');
                        $pindics['maternity_leave']   = $this->input->post('availed_maternity_leave');
                        $pindics['other_leave']   = $this->input->post('other_leave');
                        $pindics['traing_atnd']   = $this->input->post('training_attended');
                        $pindics['traing_givn']   = $this->input->post('training_given');
                        $pindics['electn_dty_atnd']   = $this->input->post('election_duty');
                        $pindics['duty_days']   = $this->input->post('on_duty');
                        $pindics['clas_rm_actvty_dys']   = $this->input->post('class_activity');
                        $pindics['lesson_plan']   = $this->input->post('lesson_plan');
                        $pindics['teach_learn_matrl']   = $this->input->post('teach_learn_matrl');
                        $pindics['lesson_act']   = $this->input->post('lesson_act');
                        $pindics['life_skill_act']   = $this->input->post('life_skill_act');
                        $pindics['prj_based_act']   = $this->input->post('prj_based_act');
                        $pindics['public_speaking']   = $this->input->post('public_speaking');
                        $pindics['advertising']   = $this->input->post('advertising');
                        $pindics['graphics']   = $this->input->post('graphics');
                        $pindics['music']   = $this->input->post('music');
                        $pindics['art_craft']   = $this->input->post('art_craft');
                        $pindics['story_telling']   = $this->input->post('story_telling');
                        $pindics['draw_paint']   = $this->input->post('draw_paint');
                        $pindics['writing_poem']   = $this->input->post('writing_poem');
                        $pindics['yoga']   = $this->input->post('yoga');
                        $pindics['singing']   = $this->input->post('singing');
                        $pindics['sports_act']   = $this->input->post('sports_act');
                        $pindics['photography']   = $this->input->post('photography');
                        $pindics['essay_writing']   = $this->input->post('essay_writing');
                        $pindics['video_creation']   = $this->input->post('video_creation');
                        $pindics['comp_skills']   = $this->input->post('comp_skills');
                        $pindics['creativity']   = $this->input->post('creativity');
                        $pindics['innovation']   = $this->input->post('innovation');
                        $pindics['foreign_lang']   = $this->input->post('foreign_lang');
                        $pindics['sign_lang']   = $this->input->post('sign_lang');
                        $pindics['cultrl_act']   = $this->input->post('cultrl_act');
                        $pindics['spk_many_lang']   = $this->input->post('spk_many_lang');
                        $pindics['P1_1']   = $this->input->post('P1_1');
                        $pindics['P1_2']   = $this->input->post('P1_2');
                        $pindics['P1_3']   = $this->input->post('P1_3');
                        $pindics['P1_4']   = $this->input->post('P1_4');
                        $pindics['P1_5']   = $this->input->post('P1_5');
                        $pindics['P1_6']   = $this->input->post('P1_6');
                        $pindics['P1_7']   = $this->input->post('P1_7');
                        $pindics['P2_1']   = $this->input->post('P2_1');
                        $pindics['P2_2']   = $this->input->post('P2_2');
                        $pindics['P2_3']   = $this->input->post('P2_3');
                        $pindics['P2_4']   = $this->input->post('P2_4');
                        $pindics['P2_5']   = $this->input->post('P2_5');
                        $pindics['P3_A_1']   = $this->input->post('P3_A_1');
                        $pindics['P3_A_2']   = $this->input->post('P3_A_2');
                        $pindics['P3_A_3']   = $this->input->post('P3_A_3');
                        $pindics['P3_A_4']   = $this->input->post('P3_A_4');
                        $pindics['P3_A_5']   = $this->input->post('P3_A_5');
                        $pindics['P3_A_6']   = $this->input->post('P3_A_6');
                        $pindics['P3_A_7']   = $this->input->post('P3_A_7');
                        $pindics['P3_A_8']   = $this->input->post('P3_A_8');
                        $pindics['P3_B_1']   = $this->input->post('P3_B_1');
                        $pindics['P3_B_2']   = $this->input->post('P3_B_2');
                        $pindics['P3_B_3']   = $this->input->post('P3_B_3');
                        $pindics['P3_B_4']   = $this->input->post('P3_B_4');
                        $pindics['P3_B_5']   = $this->input->post('P3_B_5');
                        $pindics['P3_B_6']   = $this->input->post('P3_B_6');
                        $pindics['P3_B_7']   = $this->input->post('P3_B_7');
                        $pindics['P3_B_8']   = $this->input->post('P3_B_8');
                        $pindics['P3_C_1']   = $this->input->post('P3_C_1');
                        $pindics['P3_C_2']   = $this->input->post('P3_C_2');
                        $pindics['P3_C_3']   = $this->input->post('P3_C_3');
                        $pindics['P3_C_4']   = $this->input->post('P3_C_4');
                        $pindics['P3_C_5']   = $this->input->post('P3_C_5');
                        $pindics['P4_A_1']   = $this->input->post('P4_A_1');
                        $pindics['P4_A_2']   = $this->input->post('P4_A_2');
                        $pindics['P4_A_3']   = $this->input->post('P4_A_3');
                        $pindics['P4_A_4']   = $this->input->post('P4_A_4');
                        $pindics['P4_A_5']   = $this->input->post('P4_A_5');
                        $pindics['P4_B_1']   = $this->input->post('P4_B_1');
                        $pindics['P4_B_2']   = $this->input->post('P4_B_2');
                        $pindics['P4_C_1']   = $this->input->post('P4_C_1');
                        $pindics['P4_C_2']   = $this->input->post('P4_C_2');
                        $pindics['P5_A_1']   = $this->input->post('P5_A_1');
                        $pindics['P5_A_2']   = $this->input->post('P5_A_2');
                        $pindics['P5_A_3']   = $this->input->post('P5_A_3');
                        $pindics['P5_B_1']   = $this->input->post('P5_B_1');
                        $pindics['P5_B_2']   = $this->input->post('P5_B_2');
                        $pindics['P5_B_3']   = $this->input->post('P5_B_3');
                        $pindics['P6_1']   = $this->input->post('P6_1');
                        $pindics['P6_2']   = $this->input->post('P6_2');
                        $pindics['P6_3']   = $this->input->post('P6_3');
                        $pindics['P6_4']   = $this->input->post('P6_4');
                        $pindics['P6_5']   = $this->input->post('P6_5');
                        $pindics['P7_1']   = $this->input->post('P7_1');
                        $pindics['P7_2']   = $this->input->post('P7_2');
                        $pindics['P8_1']   = $this->input->post('P8_1');
                        $pindics['P8_2']   = $this->input->post('P8_2');
                        $pindics['P8_3']   = $this->input->post('P8_3');
                        if($this->input->post('sav') == 'save'){
                          $pindics['status']   = '0';
                        }else{
                          $pindics['status']   = '1';
                        }                            
                        $pindics['createdat']        = date('Y-m-d h:i:s');
                       
                        if(($pindics['teacher_id']!='')){                                                          
                          $result = $this->Udise_staffmodel->teacher_pindics_details('teacher_pindics',$pindics);
                          if($result)
                          {
                            //$pindics['teacher_id'];
                            $this->session->set_flashdata('pindics_update','Your Performance Indicator Successfully Updated');
                            redirect('Udise_staff/emis_Udise_staff_dash');
                          }
                        }else{
                          $result = $this->Udise_staffmodel->teacher_pindics_details('teacher_pindics',$pindics);                            
                          if($result)
                          {
                            //$pindics['teacher_id'];
                            $this->session->set_flashdata('pindics_update','Your Performance Indicator Successfully Saved');
                            redirect('Udise_staff/emis_Udise_staff_dash');
                          }
                        }
                        
              
             //}
             //else{
              // echo "total_mismatch";
             // $this->session->set_flashdata('pindics_alert','Total working Days count mismatch ');
             // redirect('Udise_staff/emis_Udise_staff_dash');

            //}
          }            
            
      }
      else
      {
        redirect('/', 'refresh');
      }
}

function get_pindics_details()
{
      $teacher_id = $this->input->post('teacher_id');
      $pindics_det = $this->Udise_staffmodel->get_pindics_details($teacher_id);
      echo json_encode($pindics_det);
}

public function pindics_hm_eval(){
$this->load->library('session');
$emis_loggedin = $this->session->userdata('emis_loggedin');
if($emis_loggedin) {
$school_id=$this->session->userdata('emis_school_id');
$data['teacherinfo'] = $this->Udise_staffmodel->get_teacher_details($school_id);
$data['hm_info'] = $this->Udise_staffmodel->get_hm_details($school_id);
$data['hm_id'] = $data['hm_info']['0']['u_id'];
$this->load->view('schoolInfo/pindics_hm_eval',$data);
} else { 
redirect('/', 'refresh'); 
}
}

public function pindics_hm_eval_insert(){
$emis_loggedin = $this->session->userdata('emis_loggedin');
if($emis_loggedin) {
$data = array(
'teacher_id'             =>$this->input->post('teacher_id'),
'hm_id'                  =>$this->input->post('hm_id'),
'HM_EV_1'                =>$this->input->post('HM_EV_1'),
'HM_EV_2'                =>$this->input->post('HM_EV_2'),
'HM_EV_3'                =>$this->input->post('HM_EV_3'),
'HM_EV_4'                =>$this->input->post('HM_EV_4'),
'HM_EV_5'                =>$this->input->post('HM_EV_5'),
'HM_EV_6'                =>$this->input->post('HM_EV_6'),
'HM_EV_7'                =>$this->input->post('HM_EV_7'),
'HM_EV_8'                =>$this->input->post('HM_EV_8'),
'hm_ev_status'           =>'1',
'hm_ev_date'           => date('Y-m-d H:i:s')
);
$vid=$this->Udise_staffmodel->pindics_hm_eval_insert($data);
echo $vid;
}
}

public function pindics_single_teachr_data(){
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $data = array( 'teacher_id' =>$this->input->post('teacher_id'));
        $teachr_data=$this->Udise_staffmodel->pindics_single_teacher_detail($data);
        echo json_encode($teachr_data);
    }
}

public function school_list(){

  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
      $block_id = $this->input->post('block_id');
      $data = $this->Udise_staffmodel->pindics_school_detial($block_id);
      echo json_encode($data);
  }else { 
      redirect('/', 'refresh'); 
  }
}

public function teachers_list(){

  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
      $school_id = $this->input->post('school_id');
      $data = $this->Udise_staffmodel->get_teachers_details($school_id);

      echo json_encode($data);

  }else { 
      redirect('/', 'refresh'); 
  }
}




public function pindics_brte_eval_insert(){
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $data = array(
    'teacher_id'             =>$this->input->post('teacher_id'),
    'brte_id'                  =>$this->input->post('brte_id'),
    'BRTE_EV_1'                =>$this->input->post('BRTE_EV_1'),
    'BRTE_EV_2'                =>$this->input->post('BRTE_EV_2'),
    'BRTE_EV_3'                =>$this->input->post('BRTE_EV_3'),
    'BRTE_EV_4'                =>$this->input->post('BRTE_EV_4'),
    'BRTE_EV_5'                =>$this->input->post('BRTE_EV_5'),
    'BRTE_EV_6'                =>$this->input->post('BRTE_EV_6'),
    'BRTE_EV_7'                =>$this->input->post('BRTE_EV_7'),
    'BRTE_EV_8'                =>$this->input->post('BRTE_EV_8'),
    'brte_ev_status'           =>'1',
    'brte_ev_date'           => date('Y-m-d H:i:s')
  );
  $brte_insert=$this->Udise_staffmodel->pindics_hm_eval_insert($data);
  echo $brte_insert;
  }
}
/** Functionality Ends Here (Wesley) */
}

?>



