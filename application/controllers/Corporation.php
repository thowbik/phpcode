<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corporation extends CI_Controller {

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
    $this->load->model('Corporationmodel');
     $this->load->model('Corporationmodel');
    $this->load->model('Corporationmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
        $this->load->model('Blockmodel');
        $this->load->helper('common_helper');

  
  }


  public function emis_district_dash()
  {
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $dist_id = $this->session->userdata('emis_corporation_id'); 
      $district_details = $this->Corporationmodel->get_districtName($dist_id);

      $data['total_count_details'] = $this->Corporationmodel->get_district_school_student_teacher_total($district_details->district_name);
      // print_r($data);die;
      // echo Common::get_url();
       $data['Govt_detail']=$this->Corporationmodel->govt_enrollment($dist_id);
      $school_details = $this->Corporationmodel->get_district_scool_type_based_schoolinfo($district_details->district_name);
      $data['school_type'] = $school_details['result'];
      $data['renewal_details'] = $this->Corporationmodel->get_state_renewal_details($dist_id);
      $user_type = $this->session->userdata('user_type');
      $data['reports_csv'] = $this->Corporationmodel->get_districtwise_report($user_type);
      $data['school_based_count_details'] = $school_details['school_info'];
   
      $this->load->view('corporation/emis_district_home',$data);
    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_home()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_district_dash();die;
      $dist_id = $this->session->userdata('emis_corporation_id');
      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      // print_r($district_details); 
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

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
      $data['details'] = $this->Corporationmodel->get_emis_blockwise_district($district_details->district_name,$manage,$school_cate);
     //print_r($data['details']);
    }else
    {
      $data['details'] = $this->Corporationmodel->get_emis_blockwise_district($district_details->district_name,'','');
    }

      $data['distname'] = $district_details->district_name;
    $this->load->view('corporation/emis_district_student_home',$data);
    } else { redirect('/', 'refresh'); }
  }

  


  /**
  *get_attendance_students
  *VIT - sriram
  */

  public function get_classwise_district()
  {
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {



			// $this->load->library('session'); 
			// $stateid = $this->session->userdata('emis_state_id');
			// $dist_id =$this->session->userdata('emis_statedist_id');
			// $this->load->database();
			$dist_id =  $this->input->get('dist');
			$data['dist_id'] = $dist_id;
			$this->load->model('Corporationmodel');
			$data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

			// $manage =$this->session->userdata('emis_statereport_schmanage');
			// // $data['schooldist'] = $this->Datamodel->getallachooldist();
			// if($manage!=""){ 
			// $data['details'] = $this->Corporationmodel->get_emis_blockwise_district($dist_id,$manage);

			// }else{
				$data['details'] = $this->Corporationmodel->get_emis_blockwise_district($dist_id);
			// }
				// print_r($data);die;
			// $data['distname'] = $this->Corporationmodel->getsingledistname($dist_id);
			$this->load->view('corporation/emis_district_dash_blockwise',$data);

			// echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }

   
  public function get_dash_schoolwise_class()
  {
  	$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$school_id = $this->input->get('school');
			
			echo $school_id;
			$data['details'] = $this->Corporationmodel->get_schoolwise_class($school_id);
			// print_r($data);die;
			$this->load->view('corporation/emis_district_dash_schoolsingle',$data);
			// echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }
 /***************************End Filter Students*************** */
  

  
  

  /**
    * Special Report For CEO
    * 07/02/2019
    * VIT-sriram
    **/

    public function schoolcatemanagefil(){  
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $dist_id = $this->session->userdata('emis_corporation_id');
      $manage = $this->input->post('emis_state_report_schcate');
      $cate = $this->input->post('emis_state_report_schmgtype');
      $id1 = $this->input->post('emis_state_special_search');
      $id2 = $this->input->post('emis_state_special_search1');
   
        $data['manage'] = $this->input->post('emis_state_report_schcate');
        $data['cate'] = $this->input->post('emis_state_report_schmgtype');
        $data['id1'] = $this->input->post('emis_state_special_search');
        $data['id2'] = $this->input->post('emis_state_special_search1');
   
      if($this->session->userdata('emis_state_report_schcate')!=""){
      $manage =$this->session->userdata('emis_state_report_schcate');
      }
      if($this->session->userdata('emis_state_report_schmgtype')!=""){
      $cate =$this->session->userdata('emis_state_report_schmgtype');
      }
      if($this->session->userdata('emis_state_special_search')!=""){
         $id1 =$this->session->userdata('emis_state_special_search');
      }
     if($this->session->userdata('emis_state_special_search1')!=""){
          $id2 =$this->session->userdata('emis_state_special_search1');
      }


        $data['special_schools'] = $this->Corporationmodel->schoolcatemanagefilter($manage,$cate,$id1,$id2,$dist_id);
    
        $this->session->unset_userdata('emis_state_report_schcate');
        
        $this->session->unset_userdata('emis_state_report_schmgtype');
        $this->session->unset_userdata('emis_state_special_search');
        $this->session->unset_userdata('emis_state_special_search1');
     
      $this->load->view('corporation/emis_district_special_reports',$data);

    } else { redirect('/', 'refresh'); }
    }



  /**
  * District Based School Data
  * 29/01/2019
  * VIT-sriram
  **/

  public function get_districtwise_school()
  {
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // print_r($this->session->userdata());
        $dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      // print_r($this->input->post());
      if($this->input->post())
      {
        $school_type = $this->input->post('school_manage');
        $data['manage'] = $school_type;
      }else
      {
        $school_type = Array ('Government','Fully Aided','Partially Aided') ;
        $data['manage'] = '';
      }
      $data['school_info'] = $this->Corporationmodel->get_ceo_school_info($district_details->district_name,$school_type);
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

      $data['distname'] = $district_details->district_name;
      $this->load->view('corporation/emis_district_teacher_list',$data);
    }else { redirect('/', 'refresh'); }
  }


    /**
    * School Wise Teacher List
    * 29/01/2019
    * VIT-Sriram
    **/
  public function get_schoolwise_teacherlist()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $school_id = $this->input->get('school');
      $data['teacher_list'] = $this->Corporationmodel->get_schoolwise_teacher_list($school_id);
      $data['school_details'] = $this->Corporationmodel->get_school_name($school_id);
      $data['date']  = "22-01-2019,23-01-2019,24-01-2019,25-01-2019,28-01-2019,29-01-2019,30-01-2019";
      $this->load->view('corporation/emis_district_school_teacher_list',$data);
      }else { redirect('/', 'refresh'); }
  }


  /**
  * Teacher Report 
  * 29/01/2018
  * VIT-Sriram
  */

  public function save_teacher_reports()
  {
    $records = $this->input->post('records');
    // print_r($records);die;
    $save_id = $this->Corporationmodel->save_teacher_reports($records);
    echo json_encode($save_id);
  }


/**
  * Get Teacher Strick Report
  * VIT-Sriram
  * 01/02/2019
  **/
  public function get_edu_district_strick_report()
  {

  
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      $dist_name = $district_details->district_name;
      $data['dist_name'] = $dist_name;
if($this->input->post())
      {
        $school_type = $this->input->post('school_manage');
        $data['manage'] = $school_type;
        $dist_name = $this->input->post('dist_name');
        $data['dist_name'] = $dist_name;
      }else
      {
        $school_type = Array ('Government','Fully Aided','Partially Aided') ;
        $data['manage'] = '';
      }
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

      $data['teacher_strick'] = $this->Corporationmodel->get_teacherstrick_district_reports($dist_name,$school_type);

      $this->load->view('corporation/emis_district_teacherstrick_district_reports',$data);
    }else { redirect('/', 'refresh'); }

  } 

  /**
  * Get Teacher Strick Report
  * VIT-Sriram
  * 01/02/2019
  **/
  public function get_block_strick_report()
  {


      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $edu_dist = $this->input->get('edu_dist');
      $data['edu_dist'] = $edu_dist;
if($this->input->post())
      {
        $school_type = $this->input->post('school_manage');
        $data['manage'] = $school_type;
        $edu_dist = $this->input->post('edu_dist');
        $data['edu_dist'] = $edu_dist;
      }else
      {
        $school_type = Array ('Government','Fully Aided','Partially Aided') ;
        $data['manage'] = '';
      }
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

      $data['teacher_strick'] = $this->Corporationmodel->get_teacherstrick_block_reports($edu_dist,$school_type);

      $this->load->view('corporation/emis_district_teacherstrick_block_reports',$data);
    }else { redirect('/', 'refresh'); }

  }

  /**
  * Get Teacher Strick Report
  * VIT-Sriram
  * 01/02/2019
  **/
  public function get_school_strick_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $block = $this->input->get('block');
      $data['block'] = $block;
if($this->input->post())
      {
        $school_type = $this->input->post('school_manage');
        $data['manage'] = $school_type;
        $block = $this->input->post('block');
        $data['block'] = $block;
      }else
      {
        $school_type = Array ('Government','Fully Aided','Partially Aided') ;
        $data['manage'] = '';
      }
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

      $data['teacher_strick'] = $this->Corporationmodel->get_teacherstrick_school_reports($block,$school_type);

      $this->load->view('corporation/emis_district_teacherstrick_school_reports',$data);
    }else { redirect('/', 'refresh'); }


  }
 
    /**
  * Get Teacher Strick Report
  * VIT-Sriram
  * 01/02/2019
  **/
  public function get_teacher_strick_report()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $school = $this->input->get('school');
      $data['school'] = $school;
if($this->input->post())
      {
        $school_type = $this->input->post('school_manage');
        $data['manage'] = $school_type;
        $school = $this->input->post('school');
        $data['school'] = $school;
      }else
      {
        $school_type = Array ('Government','Fully Aided','Partially Aided') ;
        $data['manage'] = '';
      }
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();

      $data['teacher_strick'] = $this->Corporationmodel->get_teacherstrick_teacher_reports($school,$school_type);
      $data['school_details'] = $this->Corporationmodel->get_school_name($school);

      $this->load->view('corporation/emis_district_teacherstrick_teacher_reports',$data);
    }else { redirect('/', 'refresh'); }

  }




    /**
    * Renewal Reports For Block Level
    * VIT-sriram
    * 11/02/2019
    ***/

    public function get_renewal_district_block()
    {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

         $school_type = array('Fully Aided', 'Un-aided','Partially Aided');
         $dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      $dist_id = $district_details->district_name;
         
         if(!empty($dist_id)){
         $data['dist_id'] = $dist_id;
      }else
      {
        $data['dist_id'] = '';
      }
        $data['school_renewal_status'] = $this->Corporationmodel->get_renewal_district_block($school_type,$dist_id);
        $data['manage'] = '';
        $this->load->view('corporation/emis_district_renewal_block',$data);

      

      }else { redirect('/', 'refresh'); }

    }


    /**
    * Renewal Reports For school Level
    * VIT-sriram
    * 11/02/2019
    ***/

    public function get_renewal_district_school()
    {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

         $school_type = array('Fully Aided', 'Un-aided','Partially Aided');
         
         $block_id = $this->input->get('block');
         if(!empty($block_id)){
         $data['block_id'] = $block_id;
      }else
      {
        $data['dist_id'] = '';
      }
        $data['school_renewal_status'] = $this->Corporationmodel->get_renewal_district_school($school_type,$block_id);
      
        $this->load->view('corporation/emis_district_renewal_school',$data);

      }else { redirect('/', 'refresh'); }

    }

    /***
   * Block wise Attendance
   * VIT-sriram
   * 09/02/2019
   */
  

  public function get_attendance_blockwise_details()
  {
  		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);
			// print_r($dist_id);
      $dist_id = $district_details->district_name;
			// $date = $this->input->post('date');
			
      $date = $this->input->post('date');
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }
          // echo $table;
				// print_r($data);
			// students
			$data['school_details_blockwise'] = $this->Corporationmodel->get_attendance_schoolreport_blockwise($dist_id,$date,$table);
			$data['school_type'] = $this->Corporationmodel->get_attendance_school_type_blockwise($dist_id,$date,$table);
			//teachers 
			$data['teacher_blockwise'] = $this->Corporationmodel->get_attendance_teacherreport_blockwise($dist_id,$date,$teach_table);
			$data['teacher_school_type_blockwise'] =$this->Corporationmodel->get_attendance_teacher_type_blockwise($dist_id,$date,$teach_table);
			// print_r($data['teacher_blockwise']);
			// echo "<pre>";
        $data['date'] = $date;
        // echo $date;
					$data['dist'] = $dist_id;
			// print_r($data);
			// echo "</pre>";die;
			$this->load->view('corporation/emis_district_attendance_blockwise',$data);
		}else { redirect('/', 'refresh'); }
  }
  

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

			$block_id = $this->input->get('block');
			
					$date = $this->input->get('date');
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }

				
			$data['dist'] = "Block - ".$block_id;
			$data['student_details_schoolwise'] = $this->Corporationmodel->get_attendance_report_schoolwise($block_id,$date,$table);
			$data['date'] = $date;
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";die;

			$this->load->view('corporation/emis_district_attendance_schoolwise',$data);
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
			$block_id = $this->input->get('block');
			
					$date = $this->input->get('date');
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }

				
			$data['teacher_details_schoolwise'] = $this->Corporationmodel->get_attendance_teacher_report_schoolwise($date,$block_id,$teach_table);
			$data['dist'] = "Block - ".$block_id;
      $data['date'] = $date;
      // echo "funtion";
			$this->load->view('corporation/emis_district_teacher_attendance_schoolwise',$data);


			}else { redirect('/', 'refresh'); }
	}


  /**
	* Attendance Search 
	* VIT-sriram
	* 12/02/2019
	**/

	public function get_attendance_search()
	{
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) 
		{

		  $date = $this->input->post('date');
		  $dist = $this->input->get('dist');
		  $date = $this->input->get('date');
		  $date_po = $this->input->post('date');
		  $dist_col = $this->input->get('col_name');
		  $school_type = $this->input->get('cate');
		  $school_col = $this->input->get('col_name');
		  $school_dist = $this->input->get('school_dist');
		  $block = $this->input->get('block');
		  $block_col = $this->input->get('col_name');

		  $dates = '';
		  $school_cat = [];
		  $district = [];
		  $blocks = [];
		  $start_date = new DateTime($date);
		  $end_date = new DateTime(Date('Y-m-d'));
		  $date_status = $start_date->diff($end_date)->days;
		  // echo $date_status;
		  
					$dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);

      $dist_id = $district_details->district_name;

				
				// print_r($date);die;


		  $school_cats = array('Government','Fully Aided','Partially Aided');
		  
		  if(!empty($block) && !empty($block_col))
		  {

		  		switch ($block_col) {
		  		case 1:
		  			$blocks['atten_details'] = "b.section_nos = a.section";
		  			break;
		  		case 2:
		  			$blocks['atten_details'] = "b.section_nos != a.section";
		  			break;
		  		case 3:
		  			$blocks['atten_details'] = "a.school_id is null";
		  			break;
		  		default:
		  			
		  			break;
		  	}

		  	$blocks['name'] = $block;
		  	$blocks['school_type'] = $school_cats;

        $data['date'] = $date;
		  	
		  	$data['dist'] = "Block - ".$block;


		  }else if(!empty($block_col))
      {

        
        switch ($block_col) {
          case 1:
            $blocks['atten_details'] = "b.section_nos = a.section";
            break;
          case 2:
            $blocks['atten_details'] = "b.section_nos != a.section";
            break;
          case 3:
            $blocks['atten_details'] = "a.school_id is null";
            break;
          default:
            
            break;
        }

        $blocks['name'] = 'none';
        $blocks['district'] = $dist_id;
        $blocks['school_type'] = $school_cats;

        $data['date'] = $date;
        
        $data['dist'] = "ALL Blocks";
        
      }


      if(!empty($school_type) && !empty($school_col))
      {

        switch ($school_col) {
          case 1:
            $school_cat['atten_details'] = "b.section_nos = a.section";
            break;
          case 2:
            $school_cat['atten_details'] = "b.section_nos != a.section";
            break;
          case 3:
            $school_cat['atten_details'] = "a.school_id is null";
            break;
          default:
            
            break;
        }

        $school_cat['name'] = $school_type;
        $school_cat['district'] = $dist_id;
        $data['date'] = $dates;

        $data['dist'] = "Category - ".$school_type;


      }


      $date = $this->input->get('date');
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }

		  // print_r($block);die;

		  // if(!empty($school_type) && !empty($school_col))
		  // {

		  // 	switch ($dist_col) {
		  // 		case 1:
		  // 			$school_cat['atten_details'] = "b.section_nos = a.section";
		  // 			break;
		  // 		case 2:
		  // 			$school_cat['atten_details'] = "b.section_nos != a.section";
		  // 			break;
		  // 		case 3:
		  // 			$school_cat['atten_details'] = "a.school_id is null";
		  // 			break;
		  // 		default:
		  // 			# code...
		  // 			break;
		  // 	}

		  // 	$school_cat['name'] = $school_type;
		  // 	$school_cat['school_type'] = $school_type;
		  // 	$data['date'] = $dates;

		  // 	$data['dist'] = "Category - ".$school_type;


		  // }
		  // print_r($data['dist']);

		  $data['student_details_schoolwise'] = $this->Corporationmodel->get_attendance_search_details($date,$school_cat,$blocks,$table);

		  // print_r($data);


			$this->load->view('corporation/emis_district_attendance_schoolwise',$data);

		}else { redirect('/', 'refresh'); }



    
  }

                 /**********************************
                  * Teacher Search                 *
                  * VIT-Sriram                     *
                  * 16/02/2019                     *
                  * parms   column                 *
                  * parms2  date                   *
                  * parms3  district or block      *
                  **********************************/

  public function get_attendance_teacher_search()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) 
    {

      $date = $this->input->post('date');
      
      $date = $this->input->get('date');
      $date_po = $this->input->post('date');
      
      $school_type = $this->input->get('cate');
      $school_col = $this->input->get('col_name');
      $school_dist = $this->input->get('school_dist');
      $block = $this->input->get('block');
      $block_col = $this->input->get('col_name');

        $today = date('d-m-Y');
        $district = [];
        $blocks = [];
        $school_cat = [];
        $dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);

      $dist = $district_details->district_name;
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }


          $school_cats = array('Government','Fully Aided','Partially Aided');
      

      if(!empty($block) && !empty($block_col))
      {

          switch ($block_col) {
          case 1:
            $blocks['atten_details'] = "b.school_code !=''";
            break;
          case 2:
            $blocks['atten_details'] = "b.school_code is null";
            
            
            break;
        }

        $blocks['name'] = $block;
        $blocks['school_type'] = $school_cats;

        $data['date'] = $date;
        
        $data['dist'] = "Block - ".$block;


      }else if(!empty($block_col))
      {


        switch ($block_col) {
          case 1:
            $blocks['atten_details'] = "b.school_code !=''";
            break;
          case 2:
            $blocks['atten_details'] = "b.school_code is null";
            
            
            break;
        }

        $blocks['name'] = 'none';
        $blocks['district'] = $dist;
        $blocks['school_type'] = $school_cats;

        $data['date'] = $date;
        
        $data['dist'] = "ALL Blocks";
        
      }

      // print_r($district);die;

      if(!empty($school_type) && !empty($school_col))
      {

        switch ($dist_col) {
          case 1:
            $school_cat['atten_details'] = "b.school_code !=''";
            break;
          case 2:
            $school_cat['atten_details'] = "b.school_code is null";
            
            break;
        }

        $school_cat['name'] = $school_type;
        $school_cat['district'] = $dist;
        $data['date'] = $dates;

        $data['dist'] = "Category - ".$school_type;


      }

      // print_r($district);die;
      // echo $teach_table;
      $data['teacher_details_schoolwise'] = $this->Corporationmodel->get_teacher_attendance_search($date,$school_type,$district,$blocks,$teach_table);

      $this->load->view('corporation/emis_district_teacher_attendance_schoolwise',$data);


    }else { redirect('/', 'refresh'); }

  }


  /******************** End Search **********************************/
  
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

				
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }
				$data['date'] = $date;
				$data['classwise_details'] = $this->Corporationmodel->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Corporationmodel->get_school_name($school_id);
      $data['school'] = $school_id;
      	$this->load->view('corporation/emis_district_attendance_classwise',$data);

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
			
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start >=date('m-Y',strtotime($date)))
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
            $teach_table ='teachers_attend_daily';  
          }
				$data['date'] = $date;
				
			// echo $school.'--'.$class_id;

			$data['students_section_details'] = $this->Corporationmodel->get_attendance_sectionwise_details($school_id,$class_id,$table,$date);
			$data['school_details'] = $this->Corporationmodel->get_school_name($school_id);
      $data['school'] = $school_id;
      $data['class'] = $class_id;
			$this->load->view('corporation/emis_district_attendance_sectionwise',$data);

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
      
      $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
          
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('d-m-Y',strtotime("-1 Month"));
          

            if($month_start <=$date)
            {

              $table = 'students_attend_yearly';
                $teach_table = 'teachers_attend_yearly';
            }else
            {
              if($week_start > $date)
              {   
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
            $teach_table ='teachers_attend_daily';  
          }
			$data['teacher_absent_list'] = $this->Corporationmodel->get_attendance_teacher_classwise($date,$school_id,$teach_table);
      $data['school_details'] = $this->Corporationmodel->get_school_name($school_id);
      $data['date'] = $date;
      // print_r($data['teacher_absent_list']);
			$this->load->view('corporation/emis_district_teacher_classwise',$data);

		}else { redirect('/', 'refresh'); }

	}




  /**************Start Flash News  Function *****************************************/
  /**
  * get The Old Flash News 
  * VIT-sriram
  * 27/02/2019
  */


  public function get_common_control_link()
  {

      $data['header'] = 'district';
      $data['link'] = 'district';

      return $data;

  }

  public function get_flash_news()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 

      $this->load->library('session');
      $this->load->database();
      $state_id = $this->session->userdata('emis_user_id');
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      $dist_id = $this->session->userdata('emis_corporation_id');

      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      // print_r($dist_id);
      $dist_id = $district_details->district_name;
      // echo $dist_id;
      $data['old_flash_message'] = $this->Corporationmodel->get_flash_news($dist_id);
      $data['block'] = $this->Corporationmodel->get_all_block_name($dist_id);
      $data['authority'] = $this->Corporationmodel->get_flash_news_authority();
      
      $head_details = $this->get_common_control_link();
      $data['manage'] = [];
      $data['cate'] = [];
      $data['header'] = $head_details['header'];
      $data['link'] = $head_details['link'];
      $this->load->view('corporation/emis_district_flash_news',$data);
    }else { redirect('/', 'refresh'); }
  }



  

  public function save_flash_news()
  {
    
    
    $blocks = $this->input->post('block');
    $to_msg = $this->input->post('to_msg');
    $school_type = '';
     $cate_type = '';
    if($to_msg ==1){
    $school_type = implode(",", $this->input->post('school_manage'));
    $cate_type =  implode(",", $this->input->post('school_cate'));
    }else
    {
     $school_type = '';
     $cate_type = '';
    }
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    // // echo $content;die;
    // print_r($school_cate);
    $save_array = [];
      $state_id = $this->session->userdata('emis_user_id');
      $state_type_id = $this->session->userdata('emis_user_type_id');

    if(sizeof($blocks) !=0)
    {
      
        // print_r($blocks);
      foreach ($blocks as $bkey => $block) {
        
        $save['id'] = '';
        $save['district_name'] =  $block['district_name'];
        $save['block_name'] = $block['block_name'];
        $save['school_type'] = $school_type;
        $save['cate_type'] = $cate_type;
        $save['title'] = $title;
        $save['authority'] = $to_msg;
        $save['content'] = $content;
        $save['created_by'] = $state_id;
        $save['created_date'] = date('Y-m-d H:i:s');
        $save['created_type_id'] = $state_type_id;
        // print_r($save);
        array_push($save_array,$save);
      }
      // print_r($save_array);

    }


    // print_r($save_array);die;
    $result_id = $this->Corporationmodel->save_flash_news_data($save_array);

    echo $result_id;
  }




  /**************** ENd Of The Function **********************************************/
    

    /****************************** EMIS REPORT ******************************************/
    

    /**
    * EMIS REPORT
    * 12/03/2019
    * VIT-sriram
    **/

    public function get_emis_report_districtwise($data_id)
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    try{
    $this->load->library('AWS_S3');
$district_id = $this->session->userdata('emis_corporation_id');
$district_details = $this->Corporationmodel->get_districtName($district_id);
      // print_r($dist_id);
      $dist_id = $district_details->district_name;
        switch ($data_id) {
          case 1:
            $keyname = 'student-sum/'.$dist_id.'-ABST.csv';
        $students_details =  $this->aws_s3->get_AWS_S3_Images(EMIS_REPORT,$keyname,'+5 minutes');
          return $students_details;
            break;
             case 2:
            $keyname = 'school-sum/'.$dist_id.'-VALID1.csv';
        $school_details =  $this->aws_s3->get_AWS_S3_Images(EMIS_REPORT,$keyname,'+5 minutes');
          return $school_details;
          default:
            
            break;


      }

    }catch(Exception $e)
    {
      echo "catch";
      // print_r($e->message());
    }


        // return $data;

        
        
          
      }else { redirect('/', 'refresh'); }
  }


  /************************************** End *************************************/
  /*------------------------------------------------------------------------------*/
  /************************ Students Requested Move To Common Pool ****************/
          /******************************
           * Students Requested         *
           * VIT-sriram                 *
           * 11/04/2019                 *
           ******************************/
    public function get_students_raise_request()
    {

      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 


        // echo "function in";die;
        $district_id = $this->session->userdata('emis_corporation_id');
        $district_details = $this->Corporationmodel->get_districtName($district_id);
        // print_r($dist_id);
        $dist_id = $district_details->district_name;

         $data['dist_id1'] = $this->Corporationmodel-> get_districtid();
         $dist_id=$this->input->post('emis_state_fix')==''?$this->session->userdata('emis_corporation_id'):$this->input->post('emis_state_fix');
        $data['details'] = $this->Corporationmodel->get_stu_raise_request($dist_id);
        $data['dist_name'] = $dist_id;
        // print_r($data);die;
        $this->load->view('corporation/emis_schools_transferrequest2',$data);
      

      }else { redirect('/', 'refresh'); }

    }
    


/************************************************ OLD Function *********************/

  /**
  * District Old Function 
  * 21/01/2019
  *VIT-sriram
  **/

  public function emis_district_student_analytics()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
     $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);
    $data['details'] = $this->Corporationmodel->getallblockscountbydistrict($district_id);
    $this->load->view('corporation/emis_district_analytics',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

      public function emis_district_student_classwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblock1($district_id,$manage);
    }else{
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblock($district_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);
    $this->load->view('corporation/emis_district_classwise',$data);
    } else { redirect('/', 'refresh'); }
  }

      public function emis_district_student_gender()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_corporation_id');
     $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['result1'] = $this->Corporationmodel->getallgenderbydistrict1($district_id,$manage);
    }else{
    $data['result1'] = $this->Corporationmodel->getallgenderbydistrict($district_id);
    }
     $data['distname'] = $this->Corporationmodel->getsingledistname($district_id); 
    $this->load->view('corporation/emis_district_genderwise',$data);
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
   $this->load->model('Corporationmodel');
   $district_id=$this->session->userdata('emis_corporation_id');
   $community ="";
   if($this->session->userdata('emis_community')!=""){
     $community =  $this->session->userdata('emis_community');
   }else{
      $this->session->set_userdata('emis_community','C1');
       $community ="C1";
   }
     $data['communityname'] = $this->Corporationmodel->getcommunityname($community);
    $data['communityid'] = $community;
    $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);
    $data['details'] = $this->Corporationmodel->getallblockscommuniywise($district_id,$community);
    $this->load->view('corporation/emis_district_communitywise',$data);
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
    $districtid = $this->session->userdata('emis_corporation_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschool($block_id);
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
    $this->load->view('corporation/emis_district_schoolwise',$data);
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
    $this->load->model('Corporationmodel');
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
    $data['details'] = $this->Corporationmodel->getallblockcountsbyschool($block_id);
    $this->load->view('corporation/emis_district_analytics_school',$data);

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
    $this->load->model('Corporationmodel');
     $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschool1($block_id,$manage);
    }else{
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschool($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
   $this->load->view('corporation/emis_district_schoolwise_analytics',$data);
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
    $this->load->model('Corporationmodel');

    $schoolprofile = $this->Corporationmodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['details'] = $this->Corporationmodel->getallbrachesbyschool($school_id);
    $this->load->view('corporation/emis_district_schoolsingle',$data);
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
    $this->load->model('Corporationmodel');

    $data['details'] = $this->Corporationmodel->getallstudentsbyschid($school_id,$class_id);
    $data['school_name'] = $this->Corporationmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Corporationmodel->getsingleclassname($class_id);
    $this->load->view('corporation/emis_district_studentsall',$data);
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
    $this->load->model('Corporationmodel');
    $data['communityid'] = $community;
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
    $data['details'] = $this->Corporationmodel->getallblockkkcountsbyclassschool($block_id,$community);
    $this->load->view('corporation/emis_district_community_schools',$data);
    // echo json_encode($data[' details']);

     } else { redirect('/', 'refresh'); }
  }

  public function emis_district_createstudent(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $schoolselect =  $this->session->userdata('emis_school_id');
       $district_id = $this->session->userdata('emis_corporation_id');
      
      if($schoolselect!=""){
        redirect('Registration/emis_student_reg','refresh');
       }else{
          redirect('corporation/emis_district_slelectschool','refresh');     
       }

     } else { redirect('/', 'refresh'); }

  }

  public function emis_district_slelectschool(){
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $district_id = $this->session->userdata('emis_corporation_id');
      $data['blocks']= $this->Datamodel->get_allblocks($district_id);  
          $this->load->view('corporation/emis_district_selectschool',$data);     
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

       redirect('corporation/emis_district_slelectschool','refresh');

      } else { redirect('Authentication/emis_login', 'refresh'); }
 }

 public function emis_district_findschoolbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $school_id = $this->input->post('emis_school_id');
      $district_id = $this->session->userdata('emis_corporation_id');
       $data['blocks']= $this->Datamodel->get_allblocks($district_id);  

       if($school_id!=""){
        $schoolprofile=$this->Corporationmodel->get_school_by_id($school_id,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('corporation/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error1'] = "No school data found / Allow only within a district Schools"; 
          $this->load->view('corporation/emis_district_selectschool',$data);

        }
          


    }
    else
    {
          
          $this->load->view('corporation/emis_district_selectschool');

    }



  }else { redirect('Authentication/emis_login', 'refresh'); }
      

 }

 public function emis_district_findschoolbyudise(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $schooludise = $this->input->post('emis_school_udise');
      $district_id =$this->session->userdata('emis_corporation_id');
       $data['blocks']= $this->Datamodel->get_allblocks($district_id);  

       if($schooludise!=""){
        $schoolprofile=$this->Corporationmodel->get_school_by_udise($schooludise,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('corporation/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error2'] = "No school data found<br/>Allow only within a district Schools";  
          $this->load->view('corporation/emis_district_selectschool',$data);

        }
          


    }}else { redirect('Authentication/emis_login', 'refresh'); }
        
    
  
 }

 public function emis_district_findschoolbyblock(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
 
      $schoolid = $this->input->post('emis_district_schoolsid');
      $district_id =$this->session->userdata('emis_corporation_id');
      $block_id =$this->input->post('emis_district_blockid');
      $data['blocks']= $this->Datamodel->get_allblocks($district_id);  
      
        $data['blocks']= $this->Datamodel->get_allblocks($district_id);
       if($schoolid!=""){
        $schoolprofile=$this->Corporationmodel->get_school_by_block($schoolid,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('corporation/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error3'] = "No school data found<br/>Allow only within a district Schools"; 
          $this->load->view('corporation/emis_district_selectschool',$data);

        }
    }else{
      $data['error3'] = "No school data found ";
       $this->load->view('corporation/emis_district_selectschool',$data);
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
    $this->load->model('Corporationmodel');
    $getblocks  = $this->Corporationmodel->getallschoolsbyblock($emis_block);
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


      $this->load->view('corporation/emis_district_resetpassword');

      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_corporation_id');
     $this->load->database(); 
     $this->load->model('Corporationmodel');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Corporationmodel->emis_district_resetpassword($district_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_district_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $district_id =$this->session->userdata('emis_corporation_id');
       $this->load->database(); 
       $this->load->model('Corporationmodel');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Corporationmodel->getoldpassdistrict($district_id,$username);
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

    $district_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblockreport($district_id);
    $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);
    $this->load->view('corporation/emis_district_report',$data);
    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_blocks_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschoolreport($block_id);
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
   $this->load->view('corporation/emis_district_schoolwise_reports',$data);
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
    $this->load->model('Corporationmodel');

    $schoolprofile = $this->Corporationmodel->getschoolprofiledetails($school_id);
    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Corporationmodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Corporationmodel->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('corporation/emis_district_report_schoolsingle',$data);
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
    $this->load->model('Corporationmodel');

    $data['details'] = $this->Corporationmodel->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Corporationmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Corporationmodel->getsingleclassname($class_id);
    $this->load->view('corporation/emis_district_report_studentsall',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

  

    public function emis_district_request_schoollist()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $date_select = date("Y-m-d"); 
    // echo $date_select;die; 
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Corporationmodel->requesteddatacountschoolwise($district_id,$date_select);
    $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);

  
    // echo var_dump($data);

   $this->load->view('corporation/emis_schools_transferrequest1',$data);
    } else { redirect('/', 'refresh'); }

    }


    public function emis_district_request_studentlist()
    {

      $schooludise = $this->uri->segment(3,0);
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $date_select = date("Y-m-d", strtotime('-3 days') );  
    if($emis_loggedin) {

    $district_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Corporationmodel->requesteddatacountstudentlist($district_id,$date_select,$schooludise);
    $data['distname'] = $this->Corporationmodel->getsingledistname($district_id);
    $data['schooludise'] = $schooludise;
    // echo var_dump($data);

   $this->load->view('corporation/emis_schools_transferrequest2',$data);
    } else { redirect('/', 'refresh'); }

    }

     public function emis_student_aadhaar_dist()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $dist_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');

    $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblockaadhaar1($dist_id,$manage);
    }else{
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblockaadhaar($dist_id);
    }
  
    $data['distname'] = $this->Corporationmodel->getsingledistname($dist_id);
   $this->load->view('corporation/emis_stu_aadhaar_report_dist',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

       public function emis_student_aadhaar_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
     $dist_id=$this->session->userdata('emis_corporation_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschoolaadhaar1($block_id,$manage);
    }else{
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschoolaadhaar($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
   $this->load->view('corporation/emis_stu_aadhaar_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

     public function emis_student_report_district()
  {
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session');
    $dist_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
     $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblockreport1($dist_id,$manage);
    }else{
    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassblockreport($dist_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Corporationmodel->getsingledistname($dist_id);
   $this->load->view('corporation/emis_district_report_dist',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

       public function emis_student_report_block()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $dist_id=$this->session->userdata('emis_corporation_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
     $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschoolreport1($block_id,$manage);
    }else{
   $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassschoolreport($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Corporationmodel->getsingleblockname($block_id);
   $this->load->view('corporation/emis_district_report_block',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }
  }

     public function emis_student_report_school()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $dist_id=$this->session->userdata('emis_corporation_id');
    $school_id =$this->session->userdata('emis_districtschool_id');
    $this->load->database();
    $this->load->model('Corporationmodel');

    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 

    $schoolprofile = $this->Corporationmodel->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);


     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Corporationmodel->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Corporationmodel->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('corporation/emis_district_report_school',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

      public function emis_student_classwise_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $dist_id=$this->session->userdata('emis_corporation_id');
    $school_id =$this->session->userdata('emis_districtschool_id');
    $class_id =$this->session->userdata('emis_districtclass_id');
    $this->load->database();
    $this->load->model('Corporationmodel');

    $data['details'] = $this->Corporationmodel->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Corporationmodel->getsingleschoolname($school_id);
    $data['class_name'] = $this->Corporationmodel->getsingleclassname($class_id);
    $this->load->view('corporation/emis_district_report_class',$data);
    // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }




  // Function for the Staff transfer module
  public function emis_tech_transfer(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $this->load->library('session');
    $dist_id=$this->session->userdata('emis_corporation_id');
    $this->load->database();
    $this->load->model('Corporationmodel');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['get_dist_dtls'] = $this->Corporationmodel->get_dist_details();
    $this->load->view('corporation/emis_tech_trans',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }

    
  }

  public function get_dist($distval){
    $get_block = $this->Corporationmodel->get_block($distval);

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
  public function get_office($distval){
    $get_office = $this->Corporationmodel->get_office($distval);
    print_r($get_office);
    if ($get_office) {
      $mydata = '';
      $mydata = $mydata.'<option value="">Select the Office</option>';
      foreach ($get_office as $office) {
          $mydata = $mydata.'
          <option value="'.$office->off_key_id.'">'.$office->office_name.'</option>
          ';
      }
      echo $mydata;
    }

  }


public function get_schol($blck_id){
  // echo $blck_id;

  $get_school = $this->Corporationmodel->get_school_rc($blck_id);
    
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

$get_typ_techr = $this->Corporationmodel->get_type_tchr($schl_id);

  if ($get_typ_techr) {
      $tchr_dtls = '';
      $tchr_dtls = $tchr_dtls.'<option value="">Select the Type of Teacher</option>';
      foreach ($get_typ_techr as $schl_type_tchers) {
    if ($schl_type_tchers->teacher_type!="" && $schl_type_tchers->teacher_type!="0") {
        $get_my_cat = $this->Corporationmodel->get_cat_cond($schl_type_tchers->teacher_type);

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

     $get_my_cat = $this->Corporationmodel->get_cat_cond($desig_id);

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


  $get_techr = $this->Corporationmodel->get_tchr($school_id,$tech_code);

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

  $get_distnme_only = $this->Corporationmodel->get_dist($dist_id);

  if ($get_distnme_only) {
      $get_dist_name = '';
      foreach ($get_distnme_only as $dist_nme) {
          $get_dist_name = $dist_nme->district_name;
      }
      echo $get_dist_name;
    }


}




public function get_nme_only($tech_id){

  $get_technme_only = $this->Corporationmodel->get_technme($tech_id);

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

  $get_school = $this->Corporationmodel->get_school_rc($blck_id_only);

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
        redirect('corporation/emis_tech_transfer', 'refresh');
      } else { redirect('/', 'refresh'); }

     }




public function get_schl_keyval($udise_cde){

   $get_school_key = $this->Corporationmodel->get_school_keyval($udise_cde);
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

  $ins_his = $this->Corporationmodel->ins_staf_history($ins);


  $update_staff_dtls = $this->Corporationmodel->update_staff_details($data,$upd_id);

  if ($update_staff_dtls) {
    echo true;
  }
  } else { redirect('/', 'refresh'); }

}


public function school_key($udise){

  $get_school_key = $this->Corporationmodel->get_school_keyval($udise);
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
  $data['details']=$this->Corporationmodel->get_techerdetails($teacher_id);
  
  $this->load->view('corporation/emis_district_teacher_form',$data);
}

 public function get_school_management_data(){
    $getschooltype = $this->input->post('emis_district_report_schcate');
    $schoolmang = $this->Corporationmodel->get_school_management_data($getschooltype);
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
 public function get_dash_blockwise_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
      $data['dist'] = $this->session->userdata('emis_corporation_id');
      $dist=$data['dist'];
      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      
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

      if(!empty($manage)){

      $data['details'] = $this->Corporationmodel->get_blockwise_school($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Corporationmodel->get_blockwise_school($block_name,$manage,$school_cate);

    }


  
      // print_r($data);
      $this->load->view('corporation/emis_state_dash_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }
public function emis_teacher_classwise_district(){
             $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Corporationmodel');
      $dist_id =$this->session->userdata('emis_corporation_id');
      $data['dist_id'] = $dist_id;
      //print_r($dist_id);die();

      $data['getsctype'] = $this->Corporationmodel->get_school_type();
    
      $school_cate = $this->input->post('school_cate');

      if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                      // $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
                // $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if(!empty($school_cate)){
      $data['details'] = $this->Corporationmodel->getalldistrictcountsbyteacherblock($dist_id,$school_cate);
           }
           else
           {
               $data['details'] = $this->Corporationmodel->getalldistrictcountsbyteacherblock($dist_id,'');
           }

      $this->load->view('corporation/emis_state_teacherblockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
 public function emis_teacher_blockwise_district(){
      $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  
    
       $dist_id =$this->session->userdata('emis_corporation_id');
      $data['dist_id']=$dist_id;
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      $school_cate = $this->input->post('school_cate');
       if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       //$manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                //  print_r($result);

                 $data['cate'] = $school_cate;
        if($school_cate!=""){ 
    $data['details'] = $this->Corporationmodel->get_teaching_staff_block($dist_id,$school_cate);
         }else{
     $data['details'] = $this->Corporationmodel->get_teaching_staff_block($dist_id,'');
      }
      //print_r($data['details']);
      $this->load->view('corporation/emis_state_teaching_blockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function emis_nonteaching_blockwise_district(){
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      
      $dist_id =$this->session->userdata('emis_corporation_id');
      $data['dist_id']=$dist_id;
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      $school_cate = $this->input->post('school_cate');
       if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       //$manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                //  print_r($result);

                 $data['cate'] = $school_cate;
         if($school_cate!=""){ 
      $data['details'] = $this->Corporationmodel->get_nonteaching_staff_block($dist_id,$school_cate);
        }
       else
       {
        $data['details'] = $this->Corporationmodel->get_nonteaching_staff_block($dist_id,$school_cate);
       }

      $this->load->view('corporation/emis_state_nonteaching_blockwise',$data);
  
    } else { redirect('/', 'refresh'); }
  }
public function emis_teaching_schoolwise_block(){
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
       $dist_id =$this->session->userdata('emis_corporation_id');
      $data['dist_id']=$dist_id;
      $block_id =$this->input->get('block_id');
      $data['block_id']=$block_id;
     // print_r($block_id);
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
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
      $data['details'] = $this->Corporationmodel->get_teaching_block_school($block_id,$school_cate); 
        }else{
     $data['details'] = $this->Corporationmodel->get_teaching_block_school($block_id,'');
      }
      $this->load->view('corporation/emis_state_teaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
    public function emis_nonteaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
       $dist_id =$this->session->userdata('emis_corporation_id');
       $data['dist_id']=$dist_id;
       $block_id =$this->input->get('block_id');
       $data['block_id']=$block_id;
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      $school_cate = $this->input->post('school_cate');
        if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       //$manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
     
                //  print_r($result);

                 $data['cate'] = $school_cate;
       if($school_cate!=""){ 
      
      $data['details'] = $this->Corporationmodel->get_nonteaching_block_school($dist_id,$block_id,$school_cate); 
        }else{
     $data['details'] = $this->Corporationmodel->get_nonteaching_block_school($dist_id,$block_id,$school_cate);
      }
   
      $this->load->view('corporation/emis_state_nonteaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
public function emis_teacher_classwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Corporationmodel');
      $block_id =$this->input->get('block_id');
      $data['block_id']=$block_id;
       $data['getsctype'] = $this->Corporationmodel->get_school_type();
    
      $school_cate = $this->input->post('school_cate');

        if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $school_cate = $result['school_cate'];
                 }
     
                 $data['cate'] = $school_cate;
                 if($school_cate!="")
                 {
                    $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassteach($block_id,$school_cate); 
                 }
                 else
                 {
                  $data['details'] = $this->Corporationmodel->getalldistrictcountsbyclassteach($block_id,$school_cate); 
                 }
      
      //print_r($data['details']);
      //echo json_encode($data['details']);
      $this->load->view('corporation/emis_state_teacherschoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
  public function emis_student_disability_blockwise()
{
  $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
    $dist_id =$this->session->userdata('emis_corporation_id');
   
      $data['allstuds'] = $this->Corporationmodel->get_classwise_student_disability_block($dist_id);
     //  print_r($data['allstuds']);
       $this->load->view('corporation/emis_block_student_disability',$data);
      }else
      {
        redirect('/', 'refresh');

      }

}
public function emis_student_disability_schoolwise()
{
  $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     $block_name =  $this->input->get('block_name');
      $data['allstuds'] = $this->Corporationmodel->get_classwise_student_disability_school($block_name);
     //  print_r($data['allstuds']);
       $this->load->view('corporation/emis_student_disability_schoolwise',$data);
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
   
      $dist_id =$this->session->userdata('emis_corporation_id');
    $data['allstuds'] = $this->Corporationmodel->get_blockwise_RTE_student($dist_id);
    //print_r($data['allstuds']);
      $this->load->view('corporation/emis_state_RTE_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $block_id =  $this->input->get('block_name');
    $data['allstuds'] = $this->Corporationmodel->get_schoolwise_RTE_student($block_id);
    //print_r($data['allstuds']);
      $this->load->view('corporation/emis_state_RTE_schoolwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function dash_renewal(){
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id =$this->session->userdata('emis_corporation_id');
      //print_r($block_id);die();
    $data['renewal']=$this->Corporationmodel->get_state_renewal_details($dist_id);
   
      $this->load->view('corporation/emis_dash_renewal',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   

  public function dash_renewal_beo(){
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id =$this->session->userdata('emis_corporation_id');
    
     $data['renewal_pending_detail'] = $this->Corporationmodel->get_state_renewal_pending_details($dist_id);
     // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('corporation/emis_state_beo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_deo(){
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id =$this->session->userdata('emis_corporation_id');
    
    $data['renewal_pending_detail_deo'] = $this->Corporationmodel->get_state_deo_pending_details($dist_id);
    //print_r( $data['renewal_pending_detail_deo']);
    $this->load->view('corporation/emis_state_deo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_ceo(){
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id =$this->session->userdata('emis_corporation_id');
    
    $data['renewal_pending_detail_ceo'] = $this->Corporationmodel->get_state_ceo_pending_details($dist_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('corporation/emis_dash_ceo_pending',$data);
  } else { redirect('/', 'refresh'); }
  }
    public function emis_district_student_report_2018()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_district_dash();die;
      $dist_id = $this->session->userdata('emis_corporation_id');
      $district_details = $this->Corporationmodel->get_districtName($dist_id);
      // print_r($district_details); 
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;
      if(!empty($manage)){
      $data['details'] = $this->Corporationmodel->get_emis_blockwise_district_2018($district_details->district_name,$manage,$school_cate);
    
    }else
    {
      $data['details'] = $this->Corporationmodel->get_emis_blockwise_district_2018($district_details->district_name,'','');
    }

      $data['distname'] = $district_details->district_name;
    $this->load->view('corporation/emis_district_student_report_2018',$data);
    } else { redirect('/', 'refresh'); }
  }
 public function get_dash_blockwise_school_2018()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
      $data['dist'] = $this->session->userdata('emis_corporation_id');

      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      


      if(!empty($manage)){

      $data['details'] = $this->Corporationmodel->get_blockwise_school_2018($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Corporationmodel->get_blockwise_school_2018($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('corporation/emis_state_dash_schoolwise_2018',$data);
      } else { redirect('/', 'refresh'); }
  }
  public function get_renewal_rejected(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $dist_id = $this->session->userdata('emis_corporation_id');
    $data['renewal_rejected'] = $this->Corporationmodel->get_renewal_rejected($dist_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('corporation/emis_district_renew_rejected',$data);
 } else { redirect('/', 'refresh'); }
}
public function get_block_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dst = $this->session->userdata('emis_corporation_id');
  // print_r($dst);
     $data['dist_id1'] = $this->Corporationmodel-> get_districtid();
     $dist_id=$this->input->post('emis_state_fix')==''?$this->session->userdata('emis_corporation_id'):$this->input->post('emis_state_fix');
   //  print_r($dist_id);
      $data['student_migration_details'] = $this->Corporationmodel->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('corporation/emis_student_migration_block',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_school_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
              $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Corporationmodel->get_school_student_migration($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('corporation/emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_district_migration_details()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_corporation_id');
     $dist_id=$data['dist_id'];

      $data['student_migration_details'] = $this->Corporationmodel->get_dist_student_migration_details($dist_id);
     // print_r($data['student_migration_details']);
    $this->load->view('corporation/emis_student_migration_details',$data);
  } else { redirect('/', 'refresh'); }

} 

public function get_migration_detail_student()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $data['dist_id'] = $this->session->userdata('emis_corporation_id');
     $dist_id=$data['dist_id'];
              $school_type_from=$this->input->get('school_type_from');

             $school_type_to=$this->input->get('school_type_to');

      $data['student_migration_details'] = $this->Corporationmodel->get_migration_detail_student($dist_id,$school_type_from,$school_type_to);

              

    $this->load->view('corporation/emis_migration_detail_student',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function emis_school_unrecognized_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_corporation_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Corporationmodel->get_school_unrecognized_block($district_id);
      // print_r($data['student_migration_details']);die();
    $this->load->view('corporation/emis_school_unrecognized_block',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function emis_school_unrecognized_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $block_name=$this->input->get('block_name');
    
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Corporationmodel->get_school_unrecognized_school($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('corporation/emis_school_unrecognized_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_corporation_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      
      
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
      $data['school_profile_verification'] = $this->Corporationmodel->get_school_profile_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
       $data['school_profile_verification'] = $this->Corporationmodel->get_school_profile_verification_district($district_id,$manage,$school_cate);
      // print_r($data['school_profile_verification']);die();
    }
    $this->load->view('corporation/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_corporation_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Corporationmodel->get_school_land_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
        $data['school_land_verification'] = $this->Corporationmodel->get_school_land_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('corporation/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_corporation_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Corporationmodel->get_school_sanitation_verification_district($district_id,$manage,$school_cate);

    }
    else
    {
       $data['school_land_verification'] = $this->Corporationmodel->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('corporation/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_corporation_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Corporationmodel->getmanagecate();
      
      $data['getsctype'] = $this->Corporationmodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Corporationmodel->get_school_committee_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
       $data['school_land_verification'] = $this->Corporationmodel->get_school_committee_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('corporation/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
// Aadhaar distic wise school count details
  
  public function aadhar_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $districtid =$this->session->userdata('emis_corporation_id');
      $data['aadhar_school_details'] = $this->Corporationmodel->aadhar_school_distic_based_count_details($districtid);
      $this->load->view('corporation/emis_aadhar_school_based_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
  
  //Aadhar school base count details
  public function aadhar_school_base_count_details()
  {
   
   $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      
   $school_id=$_GET['schoolid'];
   // $data['schoolname']=$_GET['schoolname'];
   $data['aadhar_schoolbase_details'] = $this->Corporationmodel->aadhar_school_base_count_details($school_id);
  
      $this->load->view('corporation/emis_aadhar_school_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
    //without aadhar count details 
  public function aadhar_school_notin_count_details()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
           $school_id=$_GET['schoolid'];
	      // echo $school_id;
		   // $data['schoolname']=$_GET['schoolname'];
		   $data['notinaadhar_schoolbase_details'] = $this->Corporationmodel->
		   notin_aadhar_school_base_count_details($school_id);
            $this->load->view('corporation/emis_notin_aadhar_school_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
   //noonmeal district school count Report by Raju
   public function meal_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
		  $districtid =$this->session->userdata('emis_corporation_id');
			// echo $districtid ;
		   $data['meal_school_details'] = $this->Corporationmodel->meal_school_distic_based_count_details($districtid);
		  $this->load->view('corporation/meal_school_distic_based_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
  //eligible student count details
  public function meal_school_eligible_stud_count()
   {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
           $school_id=$_GET['schoolid'];
	       //echo $school_id;
		    //$data['schoolname']=$_GET['schoolname'];
		   $data['meal_school_eligible_stud_count'] = $this->Corporationmodel->
		   meal_school_eligible_stud_count_details($school_id);
            $this->load->view('corporation/emis_meal_school_eligible_stud_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
  
  // public function emis_prekg_student_joined()
	// {
		// $this->load->library('session');
		// $emis_loggedin = $this->session->userdata('emis_loggedin');
		// if($emis_loggedin) {
			
		// $data['state_student']= $this->Corporationmodel->govt_enrollment();
		// // $studtotal=$state_student[0]->total;
		// // print_r($studtotal);
		// $data['stud_admission_count']=$this->Corporationmodel->stud_admission_count();
				// $this->load->view('corporation/emis_state_district_prekg_student_joined',$data);
			
		// } else { redirect('/', 'refresh'); }
		
	// }
	
	//staff districtwise count 
	public function emis_staff_district_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {
				$data['staff_district_details'] = $this->Corporationmodel->emis_staff_district_count_details();
			   $this->load->view('corporation/emis_staff_district_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	//staff district schoolwise count
	public function emis_staff_district_school_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            $districtid =$this->session->userdata('emis_corporation_id');
				$data['staff_district_school_details'] = $this->Corporationmodel->emis_staff_district_school_count_details($districtid);
			    $this->load->view('corporation/emis_staff_district_school_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	// public function emis_staff_school_count_details()
	// {
		
		  // $this->load->library('session');
		  // $emis_loggedin = $this->session->userdata('emis_loggedin');
		  // if($emis_loggedin) 
		  // {       
	             // $school_id=$this->input->post('school_id');
				 // echo $school_id;
				 
				// $data['staff_school_details'] = $this->Corporationmodel->emis_staff_school_count_details($school_id);
			    // $this->load->view('corporation/emis_staff_school_count_details',$data);
		  // }else { redirect('/', 'refresh'); }
	// }
	
	
	
	/****Staff Inside Table */
	
	public function emis_district_staff_data()
	{
		$school_id=$this->input->post('school_id');
				 // echo $school_id;
				 
				$staff_school_details = $this->Corporationmodel->emis_staff_school_count_details($school_id);
				echo json_encode($staff_school_details);
	} 
	
     public function emis_dist_school_prekg_student_joined()
	{
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			// $districtid=$_GET['id'];
			 $districtid =$this->session->userdata('emis_corporation_id');
		
		$data['stud_school_admission_count']=$this->Corporationmodel->emis_dist_school_prekg_student_joined($districtid);
				$this->load->view('corporation/emis_dist_school_prekg_student_joined',$data);
			
		} else { redirect('/', 'refresh'); }
		
	}
	
		public function get_emis_state_school_building_district()
  	{

  	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      	$data['school_details'] = $this->Corporationmodel->get_districtwise_school_building_details();
      	// print_r($data);
      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_state_bd_district',$data);

      	// $this->load->view('state/emis_state_bd_disrtict',$data);
      }else { redirect('/', 'refresh'); }

  	}
	public function get_emis_state_school_building_school()
 	{
 		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      		 // $dist_id = $this->input->get('dist');
			  $dist_id  =$this->session->userdata('emis_corporation_id');
      		$filter = $this->input->post('build_type');
      		// print_r($this->input->post());die;
      		$block_filter = '';
      		if(!empty($filter))
      		{
      				$block_filter = $filter;
      				// $dist_id = $this->input->post('dist_id');
      		}else
      		{
      			$block_filter = [1,2,3];
      			// $dist_id = $dist_id;
      		}

// echo $dist_id;
      		$data['school_details'] = $this->Corporationmodel->get_schoolwise_building_details($dist_id,$block_filter);

      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
      	$data['dist_id'] = $dist_id;
      	$data['block_filter_data'] = $filter;
      	$this->load->view('corporation/emis_state_bd_schoolwise',$data);

      }else { redirect('/', 'refresh'); }

 	}
		public function get_school_nature_details()
 	{
 		// echo "function in";die;
 		$table = $this->input->post('table');
 		$where = $this->input->post('where');

 		$building_details = Common::get_multi_list($table,$where);
 		echo json_encode($building_details);die;
 	}
		public function emis_staff_stud_dist_school_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				// $districtid=$_GET['districtid'];
				$districtid  =$this->session->userdata('emis_corporation_id');
				$data['staff_stud_dist_school_details'] = $this->Corporationmodel->emis_staff_stud_dist_school_details($districtid);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_stud_dist_school_details',$data); 
			}
	}
	
	////staffs fixation summary by raju
		public function emis_staff_fixa_tot_school_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				  $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_fixa'] = $this->Corporationmodel->emis_staff_fixa_tot_school_details(  $dist_id);
				$data['staff_eli'] = $this->Corporationmodel->staff_eligible( $dist_id);
				$data['staff_sanct'] = $this->Corporationmodel->staff_sanct( $dist_id);
				$data['staff_avail'] = $this->Corporationmodel->staff_avail( $dist_id);
				$data['staff_need'] = $this->Corporationmodel->staff_need( $dist_id);
				$data['staff_surpwith'] = $this->Corporationmodel->staff_surpwith( $dist_id); 
			    $data['staff_surpwithout'] = $this->Corporationmodel->staff_surpwithout( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_fixa_tot_school_details',$data); 
			}
	}
	public function emis_staff_eligiblepost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_eligiblepost'] = $this->Corporationmodel->emis_staff_eligiblepost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_eligiblepost',$data); 
			}
	}
	
	public function emis_staff_sanctionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_sanctpost'] = $this->Corporationmodel->emis_staff_sanctionpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_sanctionpost',$data); 
			}
	}
	public function emis_staff_availpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_availpost'] = $this->Corporationmodel->emis_staff_availpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_availpost',$data); 
			}
	}
	public function emis_staff_needpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_needpost'] = $this->Corporationmodel->emis_staff_needpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_needpost',$data); 
			}
	}
	public function emis_staff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_surpwithpost'] = $this->Corporationmodel->emis_staff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_surpwithpost',$data); 
			}
	}
	public function emis_staff_surpwithoutpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_corporation_id');
				$data['staff_surpwithoutpost'] = $this->Corporationmodel->emis_staff_surpwithoutpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('corporation/emis_staff_surpwithoutpost',$data); 
			}
	}
    public function emis_staff_fixa_report_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $district_id  =$this->session->userdata('emis_corporation_id');
      // print_r($district_id);
        $data['staff_fixa_report'] = $this->Corporationmodel->staff_fixa_report_block($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_fixa_school_report_block',$data); 
      }
  }
   public function emis_staff_fixa_report_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $block_id=$this->input->get('block_id');
       
        $data['staff_fixa_report'] = $this->Corporationmodel->staff_fixa_report_school($block_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_fixa_school_report_school',$data); 
      }
  }
  public function staff_fixtation_sub_wise()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['staff_fixtation_sub_wise'] = $this->Corporationmodel->staff_fixtation_sub_wise($dist_id);
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('corporation/emis_staff_fixtation_sub_wise',$data); 
      }
  }
    public function emis_staff_transfer_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->session->userdata('emis_corporation_id');

        $data['staff_transfer_req'] = $this->Corporationmodel->staff_transfer_req_block($district_id); 
     // print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_req_report_block',$data); 
      }
  }
   public function emis_staff_transfer_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Corporationmodel->staff_transfer_req_teacher($block_id); 
       //print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_req_report_teacher',$data); 
      }
  }
    public function get_staff_fix_district()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
        $district_id=$this->session->userdata('emis_corporation_id');
        $data['dist_details'] = $this->Corporationmodel->get_staff_fix_district($district_id);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_state_staff_fix_districtwise',$data);
    }
  }
  public function get_staff_fix_schoolwise()
  {
      $block_id = $this->input->get('block_id');

      $data['school_details'] = $this->Corporationmodel->get_staff_fix_schoolwise($block_id);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('corporation/emis_state_staff_fix_schoolwise',$data);   
  }
   public function emis_staff_surplus_tot_subject()
    {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['schoolsurp'] = $this->Corporationmodel->emis_staff_surplus_tot_subject($dist_id);
        $data['surptot'] = $this->Corporationmodel->surplus_tot($dist_id);
        $data['surplus_sub'] = $this->Corporationmodel ->surplus_sub($dist_id);
        $this->load->view('corporation/emis_staff_surplus_tot_subject',$data);
        
      }
     
    }
      public function emis_sgstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['sgstaff_surpwithpost'] = $this->Corporationmodel->emis_sgstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_sgstaff_surpwithpost',$data); 
      }
  }
    public function emis_sciencestaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['sciencestaff_surpwithpost'] = $this->Corporationmodel->emis_sciencestaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_sciencestaff_surpwithpost',$data); 
      }
  }
  
   public function emis_mathstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['mathstaff_surpwithpost'] = $this->Corporationmodel->emis_mathstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_mathstaff_surpwithpost',$data); 
      }
  }
   public function emis_englishstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['englishstaff_surpwithpost'] = $this->Corporationmodel->emis_englishstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_englishstaff_surpwithpost',$data); 
      }
  }
   public function emis_tamilstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['tamilstaff_surpwithpost'] = $this->Corporationmodel->emis_tamilstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_tamilstaff_surpwithpost',$data); 
      }
  }
   public function emis_socialsciencestaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['socialsciencestaff_surpwithpost'] = $this->Corporationmodel->emis_socialsciencestaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_socialsciencestaff_surpwithpost',$data); 
      }
  }
   public function emis_primaryhmstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['primarystaff_surpwithpost'] = $this->Corporationmodel->emis_primaryhmstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_primaryhmstaff_surpwithpost',$data); 
      }
  }
   public function emis_middlehmstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['middlestaff_surpwithpost'] = $this->Corporationmodel->emis_middlehmstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_middlehmstaff_surpwithpost',$data); 
      }
  }
   public function emis_highhmstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['highstaff_surpwithpost'] = $this->Corporationmodel->emis_highhmstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_highhmstaff_surpwithpost',$data); 
      }
  }
  public function emis_telgustaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['telgustaff_surpwithpost'] = $this->Corporationmodel->emis_telgustaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_telgustaff_surpwithpost',$data); 
      }
  }
  public function emis_kannadastaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['kannadamstaff_surpwithpost'] = $this->Corporationmodel->emis_kannadastaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_kannadastaff_surpwithpost',$data); 
      }
  }
  public function emis_urdustaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['urdustaff_surpwithpost'] = $this->Corporationmodel->emis_urdustaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_urdustaff_surpwithpost',$data); 
      }
  }
  public function emis_malayalamstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['malastaff_surpwithpost'] = $this->Corporationmodel->emis_malayalamstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_malayalamstaff_surpwithpost',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
       $district_id  =$this->session->userdata('emis_corporation_id');
        $data['staff_fixa_report'] = $this->Corporationmodel->staff_fixa_report_PG_block($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_fixa_report_PG_block1',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $block_id=$this->input->get('block_id');
        $data['staff_fixa_report'] = $this->Corporationmodel->staff_fixa_report_PG_school($block_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_fixa_report_PG_school_dse',$data); 
      }
  }
   public function emis_staff_transfer_dse_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->session->userdata('emis_corporation_id');
        $data['staff_transfer_req'] = $this->Corporationmodel->staff_transfer_dse_req_block($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_dse_req_report_block',$data); 
      }
  }
    public function emis_staff_transfer_dse_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Corporationmodel->staff_transfer_dse_req_teacher($block_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_staff_dse_req_report_teacher',$data); 
      }
  }
    public function get_staff_fix_district_dse()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
      $district_id=$this->session->userdata('emis_corporation_id');
        $data['dist_details'] = $this->Corporationmodel->get_staff_fix_district_dse($district_id);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_state_staff_fix_districtwise_dse',$data);
    }
  }
   public function get_staff_fix_schoolwise_dse()
  {
      $block_id = $this->input->get('block_id');

      $data['school_details'] = $this->Corporationmodel->get_staff_fix_schoolwise_dse($block_id);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('corporation/emis_state_staff_fix_schoolwise_dse',$data);   
  }
   public function emis_dsestaff_surplus_tot_subject()
    {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dseschoolsurp'] = $this->Corporationmodel->emis_dsestaff_surplus_tot_subject($dist_id);
        $data['dsesurptot'] = $this->Corporationmodel->dsesurplus_tot($dist_id);
        $data['dsesurplus_sub'] = $this->Corporationmodel ->DSEsurplus_sub($dist_id);
        $this->load->view('corporation/emis_dsestaff_surplus_tot_subject',$data);
        
      }
     
    }
    
    public function emis_dsesgstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dsesgstaff_surpwithpost'] = $this->Corporationmodel->emis_dsesgstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dsesgstaff_surpwithpost',$data); 
      }
  }
    public function emis_dsesciencestaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dsesciencestaff_surpwithpost'] = $this->Corporationmodel->emis_dsesciencestaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dsesciencestaff_surpwithpost',$data); 
      }
  }
  
   public function emis_dsemathstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dsemathstaff_surpwithpost'] = $this->Corporationmodel->emis_dsemathstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dsemathstaff_surpwithpost',$data); 
      }
  }
   public function emis_dseenglishstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dseenglishstaff_surpwithpost'] = $this->Corporationmodel->emis_dseenglishstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dseenglishstaff_surpwithpost',$data); 
      }
  }
   public function emis_dsetamilstaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dsetamilstaff_surpwithpost'] = $this->Corporationmodel->emis_dsetamilstaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dsetamilstaff_surpwithpost',$data); 
      }
  }
   public function emis_dsesocialsciencestaff_surpwithpost()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
         $dist_id  =$this->session->userdata('emis_corporation_id');
        $data['dsesocialsciencestaff_surpwithpost'] = $this->Corporationmodel->emis_dsesocialsciencestaff_surpwithpost( $dist_id);
        // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('corporation/emis_dsesocialsciencestaff_surpwithpost',$data); 
      }
  }
  
  public function emis_dsegovsurplus_sgstaff_school()
  {
     $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {   
          $school_id=$this->input->get('schoolid');
        
      
            $data['dsegovsurplus_sgstaff'] = $this->Corporationmodel->emis_dsegovsurplus_sgstaff_school($school_id);
        // print_r($data['dsegovsurplus_sgstaff']);
        // die;
      
      
      
        
      $this->load->view('corporation/emis_dsegovsurplus_sgstaff_school',$data);
      }else { redirect('/', 'refresh'); }
  }
   /* DEE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher_dee()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['totalsurplus'] = $this->Corporationmodel->emis_total_surplus_teacher_dee($dist_id);
				$data['teachertype_total'] = $this->Corporationmodel->emis_total_surplus_teacher_type_dee($dist_id);
				$this->load->view('corporation/emis_district_surplus_tot_count_dee',$data);
			}
		 
	  }
	   public function emis_teacher_surplus_sg_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_sg_dee($dist_id);
				$this->load->view('corporation/emis_staff_sg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_phm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_phm_dee($dist_id);
				$this->load->view('corporation/emis_staff_phm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_mhm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_mhm_dee($dist_id);
				$this->load->view('corporation/emis_staff_mhm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_pg_dee($dist_id);
				$this->load->view('corporation/emis_staff_pg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_bt_dee($dist_id);
				$this->load->view('corporation/emis_staff_bt_teachers_dee',$data);
			}
	  }
	  /* DSE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['totalsurplus'] = $this->Corporationmodel->emis_total_surplus_teacher($dist_id);
				 $data['teachertype_total'] = $this->Corporationmodel->emis_total_surplus_teacher_type($dist_id);
				// $data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('corporation/emis_district_surplus_tot_count_dse',$data);
 				
			}
		 
	  }
	  public function emis_teacher_surplus_sg()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_sg($dist_id);
				$this->load->view('corporation/emis_staff_sg_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_highhm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_highhm($dist_id);
				$this->load->view('corporation/emis_staff_highhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_hrshm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_hrshm($dist_id);
				$this->load->view('corporation/emis_staff_hrhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['sgteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_pg($dist_id);
				$this->load->view('corporation/emis_staff_pg_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_corporation_id');
				$data['btteachers'] = $this->Corporationmodel->emis_total_surplus_teacher_bt($dist_id);
				$this->load->view('corporation/emis_staff_bt_teachers_dse',$data);
			}
	  }
    public function emis_PG_fixation()
    {
         $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
         $district_id=$this->session->userdata('emis_corporation_id');
         $pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
         //print_r($pst);
        // print_r($pst);
         $sql=array();
         for($i=1;$i<44;$i++){
            array_push($sql,"SUM($pst$i) as $pst$i");
         }
         $ssql=implode(',',$sql);

         $data['DT']=$this->Corporationmodel->emis_PG_fixation($ssql,$district_id);
     // print_r($DT['pg_fix']);
        $this->load->view('corporation/emis_PG_fixation',$data);
      }
    }

      public function emis_state_school()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      
      $data['total_count_details'] = $this->Corporationmodel->get_state_school($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function get_state_school_district()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $mang=$this->input->get('mang');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_district($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_district',$data);
   
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
      $this->load->model('Ceo_District_model');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_wise($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_wise',$data);
   
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
      $this->load->model('Ceo_District_model');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_dee($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_dee',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function get_state_school_district_dee()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
        $dist_id  =$this->session->userdata('emis_corporation_id');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_district_dee($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_district_dee',$data);
   
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
      $this->load->model('Ceo_District_model');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_wise_dee($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_wise_dee',$data);
   
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
      $this->load->model('Ceo_District_model');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_dse($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_dse',$data);
   
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
      $this->load->model('Ceo_District_model');
      $mang=$this->input->get('mang');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_district_dse($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_district_dse',$data);
   
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
      $this->load->model('Ceo_District_model');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_wise_dse($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_wise_dse',$data);
   
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
      $this->load->model('Ceo_District_model');
      $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_dms($dist_id);
     // print_r($data['total_count_details']);
      $this->load->view('corporation/emis_state_school_dms',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function get_state_school_district_dms()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
        $dist_id  =$this->session->userdata('emis_corporation_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_district_dms($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_district_dms',$data);
   
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
      $this->load->model('Ceo_District_model');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_wise_dms($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_wise_dms',$data);
   
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
      $this->load->model('Ceo_District_model');
         $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_others($dist_id);
     // print_r($data['total_count_details']);
      $this->load->view('corporation/emis_state_school_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function get_state_school_district_others()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $mang=$this->input->get('mang');
       $dist_id  =$this->session->userdata('emis_corporation_id');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_district_others($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_district_others',$data);
   
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
      $this->load->model('Ceo_District_model');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Corporationmodel->get_state_school_wise_others($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('corporation/emis_state_school_wise_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }
 }
 ?>
