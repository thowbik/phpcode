<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deo_District extends CI_Controller {

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
    $this->load->model('Deo_District_model');
    $this->load->model('Deo_District_model');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
        $this->load->model('Blockmodel');
        $this->load->helper('common_helper');

  $this->load->model('Statemodel');
  }


  public function emis_Deo_District_dash()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $deo_id = $this->session->userdata('emis_deo_id');

      // $district_details = $this->Deo_District_model->get_districtName($dist_id);
      $data['total_count_details'] = $this->Deo_District_model->get_district_school_student_teacher_total($deo_id);
      // print_r($data);die;
      $school_details = $this->Deo_District_model->get_district_scool_type_based_schoolinfo($deo_id);
      $data['school_type'] = $school_details['result'];
      $data['school_based_count_details'] = $school_details['school_info'];
      $district_details = $this->Deo_District_model->get_edu_dist_name($deo_id);
      $dist_id = $district_details->edn_dist_name;
      $data['old_flash_message'] = $this->Deo_District_model->get_flash_news($dist_id);
      $data['renewal_details'] = $this->Deo_District_model->get_state_renewal_details($deo_id);
      $data['Govt_detail']=$this->Deo_District_model->govt_enrollment($deo_id);
     // print_r($data['renewal_details']);
      //Vivek Rao...
      $where="  AND students_school_child_count.edu_dist_id=".$deo_id;

       $user_type = $this->session->userdata('user_type');
      
      $data['reports_csv'] = $this->Deo_District_model->get_districtwise_report($user_type);
      //$data['freeschemes']=$this->Statemodel->getFreeSchemeGeneral($where);
      $this->load->view('Deo_District/emis_district_home_dash',$data);
    } else { redirect('/', 'refresh'); }
  }

  public function emis_Deo_District_home()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     
      $dist_id = $this->session->userdata('emis_deo_id');
   
      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
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
      $data['details'] = $this->Deo_District_model->get_emis_blockwise_district($district_details->edn_dist_name,$manage,$school_cate);
    }else
    {
      $data['details'] = $this->Deo_District_model->get_emis_blockwise_district($district_details->edn_dist_name,'','');

    }

      $data['distname'] = $district_details->edn_dist_name;
    $this->load->view('Deo_District/emis_district_home',$data);
    } else { redirect('/', 'refresh'); }
  }
public function emis_deo_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==10){ 


      $this->load->view('Deo_District/emis_deo_resetpassword');
      
      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }
   public function emis_deo_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_deo_id');
     $this->load->database(); 
     $this->load->model('Deo_District_model');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Deo_District_model->emis_deo_resetpassword($district_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $district_id =$this->session->userdata('emis_deo_id');
       $this->load->database(); 
       $this->load->model('Deo_District_model');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Deo_District_model->getoldpassdistrict($district_id,$username);
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

   public function get_dash_blockwise_school()
  {
 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      
      $block_id =$this->session->userdata('emis_districtblock_id');
       $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;
       // $data['block_name'] =$this->session->get_block_id($block_id);
     // print_r($data['block_name']);
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
        // other
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
 
      $data['details'] = $this->Deo_District_model->get_blockwise_school($block_name,$manage,$school_cate);
    
        }else
    {
      $data['details'] = $this->Deo_District_model->get_blockwise_school($block_name,$manage,$school_cate);
// print_r($data['details']);
    }

  
      // print_r($data);
      $this->load->view('Deo_District/emis_state_dash_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }

  /**
  * District Based School Data
  * 01/02/2019
  * VIT-sriram
  **/

  public function get_districtwise_school()
  {
     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // print_r($this->session->userdata());
        $deo_id = $this->session->userdata('emis_deo_id');

      $district_details = $this->Deo_District_model->get_edu_dist_name($deo_id);
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
      $data['school_info'] = $this->Deo_District_model->get_deo_school_info($deo_id,$school_type);
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();

      $data['distname'] = $district_details->edn_dist_name;
      $this->load->view('Deo_District/emis_district_teacher_list',$data);
    }else { redirect('/', 'refresh'); }
  }


    /**
    * School Wise Teacher List
    * 01/02/2019
    * VIT-Sriram
    **/
  public function get_schoolwise_teacherlist()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $school_id = $this->input->get('school');
      $data['teacher_list'] = $this->Deo_District_model->get_schoolwise_teacher_list($school_id);
      $data['school_details'] = $this->Deo_District_model->get_school_name($school_id);
      $data['date']  = "22-01-2019,23-01-2019,24-01-2019,25-01-2019,28-01-2019,29-01-2019,30-01-2019";
      $this->load->view('Deo_District/emis_district_school_teacher_list',$data);
      }else { redirect('/', 'refresh'); }
  }


  /**
  * Teacher Report 
  * 01/02/2019
  * VIT-Sriram
  */

  public function save_teacher_reports()
  {
    $records = $this->input->post('records');
    // print_r($records);die;
    $save_id = $this->Deo_District_model->save_teacher_reports($records);
    echo json_encode($save_id);
  }


  /**
  * Teacher Strike Reports
  * VIT-sriram
  * 04/02/2019
  **/


  public function get_block_strick_report()
  {


      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // print_r($this->session->userdata());
      $dist_id = $this->session->userdata('emis_deo_id');

      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
      $edu_dist = $district_details->edn_dist_name;
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
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Deo_District_model->get_teacherstrick_block_reports($edu_dist,$school_type);
      // print_r($data);
      $this->load->view('Deo_District/emis_district_teacherstrick_block_reports',$data);
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
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Deo_District_model->get_teacherstrick_school_reports($block,$school_type);

      $this->load->view('Deo_District/emis_district_teacherstrick_school_reports',$data);
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
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Deo_District_model->get_teacherstrick_teacher_reports($school,$school_type);
      $data['school_details'] = $this->Deo_District_model->get_school_name($school);

      $this->load->view('Deo_District/emis_district_teacherstrick_teacher_reports',$data);
    }else { redirect('/', 'refresh'); }

  }
  
   /**
    * Special Report For DEO
    * 07/02/2019
    * VIT-sriram
    **/

    public function schoolcatemanagefil(){  
    $this->load->library('session');
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $dist_id = $this->session->userdata('emis_deo_id');
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


        $data['special_schools'] = $this->Deo_District_model->schoolcatemanagefilter($manage,$cate,$id1,$id2,$dist_id);
    
        $this->session->unset_userdata('emis_state_report_schcate');
        
        $this->session->unset_userdata('emis_state_report_schmgtype');
        $this->session->unset_userdata('emis_state_special_search');
        $this->session->unset_userdata('emis_state_special_search1');

      $this->load->view('Deo_District/emis_district_special_reports',$data);

    } else { redirect('/', 'refresh'); }
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

			$dist_id = $this->session->userdata('emis_deo_id');

      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
      $dist_id = $district_details->edn_dist_name;
			// $date = $this->input->post('date');
			// print_r($this->input->post());
			$date = $this->input->post('date');
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start > date('m-Y',strtotime($date)))
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
          // echo $teach_table;
				// print_r($data);
			// students
			$data['school_details_blockwise'] = $this->Deo_District_model->get_attendance_schoolreport_blockwise($dist_id,$date,$table);
			$data['school_type'] = $this->Deo_District_model->get_attendance_school_type_blockwise($dist_id,$date,$table);
			//teachers 
			$data['teacher_blockwise'] = $this->Deo_District_model->get_attendance_teacherreport_blockwise($dist_id,$date,$teach_table);
			$data['teacher_school_type_blockwise'] =$this->Deo_District_model->get_attendance_teacher_tpye_blockwise($dist_id,$date,$teach_table);
			// print_r($data['teacher_blockwise']);
			// echo "<pre>";
        $data['date'] = $date;
        // echo $date;
					$data['dist'] = $dist_id;
			
			// echo "<pre>";
			// print_r($data['teacher_blockwise']);
			// echo "</pre>";die;
			$this->load->view('Deo_District/emis_district_attendance_blockwise',$data);
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
          

            if($month_start > date('m-Y',strtotime($date)))
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
			
			$data['student_details_schoolwise'] = $this->Deo_District_model->get_attendance_report_schoolwise($block_id,$date,$table);
			$data['date'] = $date;
        $data['dist'] = "Block - ".$block_id;

			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";die;

			$this->load->view('Deo_District/emis_district_attendance_schoolwise',$data);
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
         $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Deo_District_model->get_districtName($dist_id);
      $dist_id = $district_details->district_name;
         
         if(!empty($dist_id)){
         $data['dist_id'] = $dist_id;
      }else
      {
        $data['dist_id'] = '';
      }
        $data['school_renewal_status'] = $this->Deo_District_model->get_renewal_district_block($school_type,$dist_id);
        $data['manage'] = '';
        $this->load->view('Deo_District/emis_district_renewal_block',$data);

      

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
        $data['school_renewal_status'] = $this->Deo_District_model->get_renewal_district_school($school_type,$block_id);
      
        $this->load->view('Deo_District/emis_district_renewal_school',$data);

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
      $dist_id = $this->session->userdata('emis_deo_id');

      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
					
      $dist_id = $district_details->edn_dist_name;
				
				// print_r($date);die;


		  $school_cats = array('Government','Fully Aided','Partially Aided');
		  

		  if(!empty($block) && !empty($block_col))
		  {
        // echo "if";
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
      
              $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start > date('m-Y',strtotime($date)))
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
      // print_r($date);

		  

		  $data['student_details_schoolwise'] = $this->Deo_District_model->get_attendance_search_details($date,$school_cat,$blocks,$table);

		  // print_r($data);die;


			$this->load->view('Deo_District/emis_district_attendance_schoolwise',$data);

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
        $dist_id = $this->session->userdata('emis_deo_id');

      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
          
      $dist = $district_details->edn_dist_name;
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start > date('m-Y',strtotime($date)))
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
      $data['teacher_details_schoolwise'] = $this->Deo_District_model->get_teacher_attendance_search($date,$school_type,$district,$blocks,$teach_table);

      $this->load->view('Deo_District/emis_district_teacher_attendance_schoolwise',$data);


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
          

            if($month_start > date('m-Y',strtotime($date)))
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
				$data['classwise_details'] = $this->Deo_District_model->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Deo_District_model->get_school_name($school_id);
      $data['school'] = $school_id;
      	$this->load->view('Deo_District/emis_district_attendance_classwise',$data);

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
            $teach_table ='teachers_attend_daily';  
          }
				$data['date'] = $date;
				
			// echo $school.'--'.$class_id;

			$data['students_section_details'] = $this->Deo_District_model->get_attendance_sectionwise_details($school_id,$class_id,$table,$date);
			$data['school_details'] = $this->Deo_District_model->get_school_name($school_id);
      $data['school'] = $school_id;
      $data['class'] = $class_id;
			$this->load->view('Deo_District/emis_district_attendance_sectionwise',$data);

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
      
      // print_r($dist_id);
             $today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if($month_start > date('m-Y',strtotime($date)))
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
			$data['teacher_absent_list'] = $this->Deo_District_model->get_attendance_teacher_classwise($date,$school_id,$teach_table);
      $data['school_details'] = $this->Deo_District_model->get_school_name($school_id);
      $data['date'] = $date;
      // print_r($data['teacher_absent_list']);
			$this->load->view('Deo_District/emis_district_teacher_classwise',$data);

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
          // echo $teach_table;
				
			$data['teacher_details_schoolwise'] = $this->Deo_District_model->get_attendance_teacher_report_schoolwise($date,$block_id,$teach_table);
			$data['dist'] = "Block - ".$block_id;
      $data['date'] = $date;
      // echo "funtion";
			$this->load->view('Deo_District/emis_district_teacher_attendance_schoolwise',$data);


			}else { redirect('/', 'refresh'); }
  }
  

/*****************************************************************************
                     Ramoc Cements Magesh Elumalai 13-02-2019
*****************************************************************************/

public function beo_assignment() {
  $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
if($emis_loggedin) {
  
  $deodistrict_id = $this->session->userdata('emis_deo_id');
      $data['deoschools'] = $this->Deo_District_model->get_beo_assignment($deodistrict_id);

      $this->load->view('Deo_District/beo_assignment_task',$data);
  }else { redirect('/', 'refresh'); }
  
}

public function deosubmit() {
  $beo= $this->input->post('js');
 // $save =     
  $decode = json_decode($beo,true);
  $i=0;
  foreach($decode as $key => $value){      
       $result[$i++] = array('udise_code' => $key, 'beo_map' => $value);       
  }       
  if(!$this->Deo_District_model->updatebeotask($result)) {        
  }
  echo 'success';        
  
}

/*******************************************************
******************************************************/

//****pearlin****//
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
 public function emis_teacher_classwise_district(){
            $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Deo_District_model');
      $dist_id =$this->session->userdata('emis_deo_id');
      $data['dist_id'] = $dist_id;
      //print_r($dist_id);die();

      $data['getsctype'] = $this->Deo_District_model->get_school_type();
    
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
      $data['details'] = $this->Deo_District_model->getalldistrictcountsbyteacherblock($dist_id,$school_cate);
           }
           else
           {
               $data['details'] = $this->Deo_District_model->getalldistrictcountsbyteacherblock($dist_id,$school_cate);
           }

      $this->load->view('Deo_District/emis_state_teacherblockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function emis_teacher_blockwise_district(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Deo_District_model');
      $dist_id = $this->session->userdata('emis_deo_id');
       $data['dist_id']=$dist_id;
       $data['getsctype'] = $this->Deo_District_model->get_school_type();
      $school_cate = $this->input->post('school_cate');
      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
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
      $data['details'] = $this->Deo_District_model->get_teaching_staff_block($dist_id,$cate_type);
    }
    else
    {
        $data['details'] = $this->Deo_District_model->get_teaching_staff_block($dist_id,$cate_type);
    }
      $this->load->view('Deo_District/emis_state_teaching_blockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function emis_nonteaching_blockwise_district(){
       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['dist_id']=$dist_id;
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
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
      $data['details'] = $this->Deo_District_model->get_nonteaching_staff_block($dist_id,$school_cate);
        }
       else
       {
        $data['details'] = $this->Deo_District_model->get_nonteaching_staff_block($dist_id,$school_cate);
       }
      $this->load->view('Deo_District/emis_state_nonteaching_blockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function emis_teaching_schoolwise_block(){
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
       $dist_id = $this->session->userdata('emis_deo_id');
      $data['dist_id']=$dist_id;
      $block_id =$this->input->get('block_id');

      $data['block_id']=$block_id;
    //print_r($data['block_id']);die();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
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
       
      $data['details'] = $this->Deo_District_model->get_teaching_block_school($dist_id,$block_id,$school_cate); 
        }else{
     $data['details'] = $this->Deo_District_model->get_teaching_block_school($dist_id,$block_id,$school_cate);
      }
      $this->load->view('Deo_District/emis_state_teaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
    public function emis_nonteaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
        $dist_id = $this->session->userdata('emis_deo_id');
      $data['dist_id']=$dist_id;
      $block_id =$this->input->get('block_id');
        $data['block_id']=$block_id;
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
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
      
      $data['details'] = $this->Deo_District_model->get_nonteaching_block_school($dist_id,$block_id,$school_cate); 
        }else{
     $data['details'] = $this->Deo_District_model->get_nonteaching_block_school($dist_id,$block_id,'');
      }
   
      $this->load->view('Deo_District/emis_state_nonteaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
  public function emis_teacher_classwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
       $dist_id = $this->session->userdata('emis_deo_id');
      $data['dist_id']=$dist_id; 
      $block_id =$this->input->get('block_id');
      $data['block_id']=$block_id;
       $data['getsctype'] = $this->Deo_District_model->get_school_type();
    
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
                    $data['details'] = $this->Deo_District_model->getalldistrictcountsbyclassteach($dist_id,$block_id,$school_cate); 
                 }
                 else
                 {
                  $data['details'] = $this->Deo_District_model->getalldistrictcountsbyclassteach($dist_id,$block_id,$school_cate); 
                 }
      
      //print_r($data['details']);
      //echo json_encode($data['details']);
      $this->load->view('Deo_District/emis_state_teacherschoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }


  /**************Start Flash News  Function *****************************************/
  /**
  * get The Old Flash News 
  * VIT-sriram
  * 27/02/2019
  */


  public function get_common_control_link()
  {

      $data['header'] = 'Deo_District';
      $data['link'] = 'Deo_District';

      return $data;

  }

  public function get_flash_news()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 

      $this->load->library('session');
      $this->load->database();
      $dist_id = $this->session->userdata('emis_deo_id');
      
      // echo $dist_id;
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      // $dist_id = $this->session->userdata('emis_Deo_District_home');

      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
      $dist_id = $district_details->edn_dist_name;
      // print_r($dist_id);
      $dist_id = strtoupper($dist_id);
      $data['old_flash_message'] = $this->Deo_District_model->get_flash_news($dist_id);
      $data['block'] = $this->Deo_District_model->get_edu_block_name($dist_id);
      // $data['old_flash_news'] = $this->Deo_District_model->get_flash_news($dist_id);
      $head_details = $this->get_common_control_link();
      $data['authority'] = $this->Deo_District_model->get_flash_news_authority();

      $data['manage'] = [];
      $data['cate'] = [];
      $data['header'] = $head_details['header'];
      $data['link'] = $head_details['link'];
      $this->load->view('Deo_District/emis_district_flash_news',$data);
    }else { redirect('/', 'refresh'); }
  }



  

  public function save_flash_news()
  {
    $district = $this->input->post('district');
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
    $result_id = $this->Deo_District_model->save_flash_news_data($save_array);

    echo $result_id;
  }

public function emis_student_disablity_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['allstuds'] = $this->Deo_District_model->get_classwise_student_disability_block($dist_id);
        //print_r($data['allstuds']);
       $this->load->view('Deo_District/emis_block_student_disability',$data);
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
      $data['allstuds'] = $this->Deo_District_model->get_classwise_student_disability_school($block_name);
     //  print_r($data['allstuds']);
       $this->load->view('Deo_District/emis_student_disability_schoolwise',$data);
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
   
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['allstuds'] = $this->Deo_District_model->get_blockwise_RTE_student($dist_id);
      $this->load->view('Deo_District/emis_state_RTE_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $block_id =  $this->input->get('block_name');
    $data['allstuds'] = $this->Deo_District_model->get_schoolwise_RTE_student($block_id);
       $this->load->view('Deo_District/emis_state_RTE_schoolwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_student_list()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $school_id =  $this->input->get('school_id');
    $data['allstuds'] = $this->Deo_District_model->get_schoolwise_RTE_student_list($school_id);
       $this->load->view('Deo_District/emis_state_RTE_student_list',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }

  /**************** ENd Of The Function **********************************************/
    public function dash_renewal(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $deo_id = $this->session->userdata('emis_deo_id');

     $data['renewal']=$this->Deo_District_model->get_state_renewal_details($deo_id);
   
      $this->load->view('Deo_District/emis_dash_renewal',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   

  public function dash_renewal_beo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $deo_id = $this->session->userdata('emis_deo_id');
    
     $data['renewal_pending_detail'] = $this->Deo_District_model->get_state_renewal_pending_details($deo_id);
     // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('Deo_District/emis_state_beo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_deo(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $deo_id = $this->session->userdata('emis_deo_id');
    
    $data['renewal_pending_detail_deo'] = $this->Deo_District_model->get_state_deo_pending_details($deo_id);
    //print_r( $data['renewal_pending_detail_deo']);
    $this->load->view('Deo_District/emis_state_deo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_ceo(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $deo_id = $this->session->userdata('emis_deo_id');
    
    $data['renewal_pending_detail_ceo'] = $this->Deo_District_model->get_state_ceo_pending_details($deo_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('Deo_District/emis_dash_ceo_pending',$data);
  } else { redirect('/', 'refresh'); }
  }
   public function emis_Deo_District_student_report_2018()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     
      $dist_id = $this->session->userdata('emis_deo_id');
   
      $district_details = $this->Deo_District_model->get_edu_dist_name($dist_id);
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;
//print_r($district_details);
      if(!empty($manage)){
      $data['details'] = $this->Deo_District_model->get_emis_blockwise_district_2018($district_details->edn_dist_name,$manage,$school_cate);
    }else
    {
      $data['details'] = $this->Deo_District_model->get_emis_blockwise_district_2018($district_details->edn_dist_name,'','');

    }

      $data['distname'] = $district_details->edn_dist_name;
    $this->load->view('Deo_District/emis_district_student_report_2018',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function get_dash_blockwise_school_2018()
  {
 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      
      $block_id =$this->session->userdata('emis_districtblock_id');
       $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;
       // $data['block_name'] =$this->session->get_block_id($block_id);
     // print_r($data['block_name']);
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      
      if(!empty($manage)){
 
      $data['details'] = $this->Deo_District_model->get_blockwise_school_2018($block_name,$manage,$school_cate);
    
        }else
    {
      $data['details'] = $this->Deo_District_model->get_blockwise_school_2018($block_name,$manage,$school_cate);
// print_r($data['details']);
    }

  
      // print_r($data);
      $this->load->view('Deo_District/emis_state_dash_schoolwise_2018',$data);
      } else { redirect('/', 'refresh'); }
  }
  
  
  /* created by TamilBala (vit) for class_section report*/
  public function schoolwise_class_section()
  {


      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_details'] = $this->Deo_District_model->get_dist_school_details($dist_id);
      //print_r($data['school_details']);
	  //die();
      $this->load->view('Deo_District/emis_district_schoolwise_class_section',$data);
    }else { redirect('/', 'refresh'); }

  }
  
  public function get_district_migration_details()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $dist_id = $this->session->userdata('emis_deo_id');

      $data['student_migration_details'] = $this->Deo_District_model->get_dist_student_migration_details($dist_id);
     // print_r($data['student_migration_details']);
    $this->load->view('Deo_District/emis_student_migration_details',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_block_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_deo_id');
     $dist_id=$data['dist_id'] ;
  // print_r($dist_id);
      $data['student_migration_details'] = $this->Deo_District_model->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/emis_student_migration_block',$data);
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
      $data['student_migration_details'] = $this->Deo_District_model->get_school_student_migration($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_migration_detail_student()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $data['dist_id'] = $this->session->userdata('emis_deo_id');
     $dist_id=$data['dist_id'] ;
              $school_type_from=$this->input->get('school_type_from');

             $school_type_to=$this->input->get('school_type_to');

      $data['student_migration_details'] = $this->Deo_District_model->get_migration_detail_student($dist_id,$school_type_from,$school_type_to);

              

    $this->load->view('Deo_District/emis_migration_detail_student',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function emis_school_unrecognized_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_deo_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Deo_District_model->get_school_unrecognized_block($district_id);
      // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/emis_school_unrecognized_block',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function emis_school_unrecognized_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $block_name=$this->input->get('block_name');
    
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Deo_District_model->get_school_unrecognized_school($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/emis_school_unrecognized_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_deo_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      
      
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
      $data['school_profile_verification'] = $this->Deo_District_model->get_school_profile_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
          $data['school_profile_verification'] = $this->Deo_District_model->get_school_profile_verification_district($district_id,$manage,$school_cate);
      // print_r($data['school_profile_verification']);die();
    }
    $this->load->view('Deo_District/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_deo_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      
      
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
    
      $data['school_land_verification'] = $this->Deo_District_model->get_school_land_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
        $data['school_land_verification'] = $this->Deo_District_model->get_school_land_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('Deo_District/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_deo_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      
      
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
    
      $data['school_land_verification'] = $this->Deo_District_model->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
         $data['school_land_verification'] = $this->Deo_District_model->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('Deo_District/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 

    public function school_class_section()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	 $school_id=$_GET['schoolid'];
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_class_details'] = $this->Deo_District_model->get_school_class_details($school_id);
      $this->load->view('Deo_District/emis_district_schoo_all_sections',$data);
    }else { redirect('/', 'refresh');}
	  
  }
public function school_committee_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_deo_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Deo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Deo_District_model->get_school_type();
      
      
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
    
      $data['school_land_verification'] = $this->Deo_District_model->get_school_committee_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
        $data['school_land_verification'] = $this->Deo_District_model->get_school_committee_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('Deo_District/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

}

     /***************************************************
        Function done by Ramco Magesh 23-04-2019
  ****************************************************/
  public function school_lab_details() {
        $this->load->library('session');
            //print_r($this->session->userdata('emis_deo_id'));
            //die();
            
            if($this->session->userdata('emis_deo_id')!=null){
                $where = " WHERE edu_dist_id=".$this->session->userdata('emis_deo_id')."";
                $group = " GROUP BY school_id";
                
            }
            $data['lablist']=$this->Datamodel->getLablist();
            $data['labentry'] = $this->Deo_District_model->school_labdetails_district($where,$group);
        $this->load->view('Deo_District/school_labdetails_district',$data);
    }
    
  /***************************************************
  ***************************************************/
   public function schoolwise_class_timetable_report_blk()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_deo_id');
    
    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);

        $this_week_ed = date("Y-m-d",$sunday);
        
          $data['getsctype'] = $this->Deo_District_model->get_school_type();
      $school_cate = $this->input->post('school_cate');
      if(!empty($school_cate))
               {
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                       $school_cate = $result['school_cate'];
                 }
     
                // print_r($result);
                 $data['cate'] = $school_cate;

        if($school_cate!=""){ 
       $data['school_timetable_details'] = $this->Deo_District_model->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
      }
      else
      {
        $data['school_timetable_details'] = $this->Deo_District_model->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
          //  print_r($data['teacherdistrictdetails']);die();
      }
        $data['this_week_fst']= $this_week_fst; 
        $data['this_week_ed']= $this_week_ed;
     // $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($this_week_fst,$this_week_ed);
   // print_r($data['school_timetable_details']);
      $this->load->view('Deo_District/emis_district_schoolwise_timetable_blk',$data);
      }else { redirect('/', 'refresh'); }

  }
   public function schoolwise_class_timetable_report()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     $block_name=$_GET['block_name'];
    
    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
            $data['getsctype'] = $this->Deo_District_model->get_school_type();
    
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
        $data['school_timetable_details'] = $this->Deo_District_model->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
    else
    {
      $data['school_timetable_details'] = $this->Deo_District_model->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
       $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
   // print_r($data['school_timetable_details']);
      $this->load->view('Deo_District/emis_district_schoolwise_timetable',$data);
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
      $data['school_class_section_timetable'] = $this->Deo_District_model->get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed);
      $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
      $this->load->view('Deo_District/emis_district_school_section_timetable',$data);
    }else { redirect('/', 'refresh');}
    
  }
   public function indent_summary()
	  {
		 $this->load->view('Deo_District/indent_summary');
	  }
	  
   public function emis_uniform_indent()
  {
	$dist  =$this->session->userdata('emis_deo_id');
  $scheme = $this->input->get('schemeid');
	$set=$this->input->post('set');
  $schol =$this->input->post('schol');
  $tname = 'schoolnew_schemeindent' ;
  $new_tname = 'schoolnew_uniform_scheme' ; 
  $management_type = [];
  if(!empty($this->input->post('mgmt1'))){
    array_push($management_type,$this->input->post('mgmt1'));
  }
  if(!empty($this->input->post('mgmt2'))){
    array_push($management_type,$this->input->post('mgmt2'));
  }
  if(!empty($this->input->post('mgmt4'))){
    array_push($management_type,$this->input->post('mgmt4'));
  }
  $ids = join(",",$management_type);   

    // $schol =$this->input->post('hd_sch');
	// echo $schol;
	$block =$this->input->get('block_id');
  $class ="and( cate_type = 'Primary School' or cate_type = 'Middle School') ";
  if(!empty($management_type)){
    $class .= "and ( school_type_id in (".$ids."))";
  }else{
    $class .= "and ( school_type_id =1 or school_type_id =2 )";
  }
  
	if(!empty($set))
	  {
		$data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
        $data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);		
		
      }	
	
      if($scheme == 1)
	  {
		$data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);	  
		$data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
      }	
	 
	  if(!empty($block)){
		  $schol = substr($block,0,1);
		  $set = substr($block,1,1);
		  $scheme = substr($block,2,1);
		  $blk = substr($block,3,3);
		  // echo $schol; echo'<br>'; echo $set; echo'<br>';  echo  $scheme; echo'<br>';  echo $blk; 
		  $data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
		  $data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
	  }
      $data['sets']=$set;
      $data['management_type']=$management_type;
	    $data['val']= $data['uniformboy'][0]->hill_frst;
	   
	  $this->load->view('Deo_District/emis_deeuniform_indent',$data);
  }
    public function emis_dseuniform_indent()
  {
	$dist  =$this->session->userdata('emis_deo_id');
    $scheme = $this->input->get('schemeid');
	$set=$this->input->post('set');
  $schol =$this->input->post('schol');
  $tname = 'schoolnew_schemeindent' ;
  $new_tname = 'schoolnew_uniform_scheme' ; 
  $management_type = [];
  if(!empty($this->input->post('mgmt1'))){
    array_push($management_type,$this->input->post('mgmt1'));
  }
  if(!empty($this->input->post('mgmt2'))){
    array_push($management_type,$this->input->post('mgmt2'));
  }
  if(!empty($this->input->post('mgmt4'))){
    array_push($management_type,$this->input->post('mgmt4'));
  }
  $ids = join(",",$management_type);   

    // $schol =$this->input->post('hd_sch');
	// echo $schol;
	$block =$this->input->get('block_id');
  $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
  if(!empty($management_type)){
    $class .= "and ( school_type_id in (".$ids."))";
  }
  else{
    $class .= "and ( school_type_id =1 or school_type_id =2 )";
  }
	if(!empty($set))
	  {
		$data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
        $data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);		
		
      }	
	
      if($scheme == 1)
	  {
		$data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);	  
		$data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
      }	
	 
	  if(!empty($block)){
		  $schol = substr($block,0,1);
		  $set = substr($block,1,1);
		  $scheme = substr($block,2,1);
		  $blk = substr($block,3,3);
		  // echo $schol; echo'<br>'; echo $set; echo'<br>';  echo  $scheme; echo'<br>';  echo $blk; 
		  $data['uniformboy'] = $this->Deo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
		  $data['uniformgirl'] = $this->Deo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
	  }
      $data['sets']=$set;
      $data['management_type']=$management_type;
	    $data['val']= $data['uniformboy'][0]->hill_frst;
	   
	  $this->load->view('Deo_District/emis_dseuniform_indent',$data);
  }
  
  
  public function emis_deefootwear_indent()
  {
	     $scheme = $this->input->get('schemeid');
	     $dist  =$this->session->userdata('emis_deo_id');
	     $blk =$this->input->get('block_id');
		 $class = "and  class_studying_id >= 1 and  class_studying_id <= 8  and( cate_type = 'Primary School' or cate_type = 'Middle School') ";
	
           if($scheme == 2)
			  {
				$data['footwearboy'] = $this->Deo_District_model->footwear_indentboy($scheme,$dist,$blk,$class);	  
				$data['footweargirl'] = $this->Deo_District_model->footwear_indentsgirl($scheme,$dist,$blk,$class);
			  }	
	
	       if(!empty($blk))
		      {
		        $scheme = substr($blk,0,1);
				$blks = substr($blk,1,3);
				$data['footwearboy'] = $this->Deo_District_model->footwear_indentboy($scheme,$dist,$blks,$class);
				$data['footweargirl'] = $this->Deo_District_model->footwear_indentsgirl($scheme,$dist,$blks,$class);
			  }
		  $this->load->view('Deo_District/emis_deefootwear_indent',$data); 
  }
    public function emis_dsefootwear_indent()
  {
	     $scheme = $this->input->get('schemeid');
	     $dist  =$this->session->userdata('emis_deo_id');
	     $blk =$this->input->get('block_id');
		 $class = "and  class_studying_id >= 1 and  class_studying_id <= 8  and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
	
           if($scheme == 2)
			  {
				$data['footwearboy'] = $this->Deo_District_model->footwear_indentboy($scheme,$dist,$blk,$class);	  
				$data['footweargirl'] = $this->Deo_District_model->footwear_indentsgirl($scheme,$dist,$blk,$class);
			  }	
	
	       if(!empty($blk))
		      {
		        $scheme = substr($blk,0,1);
				$blks = substr($blk,1,3);
				$data['footwearboy'] = $this->Deo_District_model->footwear_indentboy($scheme,$dist,$blks,$class);
				$data['footweargirl'] = $this->Deo_District_model->footwear_indentsgirl($scheme,$dist,$blks,$class);
			  }
		  $this->load->view('Deo_District/emis_dsefootwear_indent',$data); 
  }
  
    public function emis_deebag_indent()
	  {
		 
            $dist  =$this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and  class_studying_id >= 1 and  class_studying_id <= 8 and(cate_type = 'Primary School' or cate_type = 'Middle School') ";
		
	 
	  if(!empty($blk))
	  {
		  $data['bag_indent'] = $this->Deo_District_model->bag_indent($dist,$blk,$class);
		  
	  }
	  else{
		  $data['bag_indent'] = $this->Deo_District_model->bag_indent($dist,$blk,$class);
		  
	  }
	   $this->load->view('Deo_District/emis_deebag_indent',$data); 
	  }
	  
	   public function emis_dsebag_indent()
	  {
		    
            $dist  =$this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			 $class = "and  class_studying_id >= 1 and  class_studying_id <= 12  and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
			
	
	 
	  if(!empty($blk))
	  {
		   
		  $data['bag_indent'] = $this->Deo_District_model->bag_indent($dist,$blk,$class);
		  
	  }
	  else {
		  $data['bag_indent'] = $this->Deo_District_model->bag_indent($dist,$blk,$class);
	  }
	   $this->load->view('Deo_District/emis_dsebag_indent',$data); 
	  }
	  
	   public function emis_deecrayan_indent()
	  {
		   
	        $dist  = $this->session->userdata('emis_deo_id');
	        $blk = $this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School') ";
			
	  	if(!empty($blk))
		{
		 
		  $data['crayan_indent'] = $this->Deo_District_model->crayan_indent($blk,$dist,$class);
		 }
			
	    else
	    {
		 $data['crayan_indent'] = $this->Deo_District_model->crayan_indent($blk,$dist,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_deecrayan_indent',$data); 
	  }
	   public function emis_dsecrayan_indent()
	  {
		    
	        $dist  = $this->session->userdata('emis_deo_id');
	        $blk = $this->input->get('block_id');
			$class = " and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
			
			
	  	if(!empty($blk))
		{
		
		  $data['crayan_indent'] = $this->Deo_District_model->crayan_indent($blk,$dist,$class);
		 }
			
	    else
	    {
		 $data['crayan_indent'] = $this->Deo_District_model->crayan_indent($blk,$dist,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_dsecrayan_indent',$data); 
	  }
	  
	   public function emis_deecolorpencil_indent()
	  {
		    
		    $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'Primary School' or cate_type = 'Middle School') ";
			
			
			 if(!empty($blk)){
			  
			  $data['colorpencil_indent'] = $this->Deo_District_model->colorpencil_indent($dist,$blk,$class);	
			 }
			else 
			{
			 $data['colorpencil_indent'] = $this->Deo_District_model->colorpencil_indent($dist,$blk,$class);	  
			}	
	  
	
		  $this->load->view('Deo_District/emis_deecolorpencil_indent',$data); 
	  }
	      public function emis_dsecolorpencil_indent()
	  {
		   
		    $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
			
			
			 if(!empty($blk)){
			 
			  $data['colorpencil_indent'] = $this->Deo_District_model->colorpencil_indent($dist,$blk,$class);	
			 }
			else 
			{
			 $data['colorpencil_indent'] = $this->Deo_District_model->colorpencil_indent($dist,$blk,$class);	  
			}	
	  
	
		  $this->load->view('Deo_District/emis_dsecolorpencil_indent',$data); 
	  }
	  
	    public function emis_deegeomentry_indent()
	  {
		    
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'Primary School' or cate_type = 'Middle School') ";
			
	 if(!empty($blk))
	 {
		
		  $data['geomentry_indent'] = $this->Deo_District_model->geomentry_indent($dist,$blk,$class);
		  
	  }	
	   else
	    {
		 $data['geomentry_indent'] = $this->Deo_District_model->geomentry_indent($dist,$blk,$class);	  
	    }	
		$this->load->view('Deo_District/emis_deegeomentry_indent',$data); 
	  }
	   public function emis_dsegeomentry_indent()
	  {
		    
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
			
	 if(!empty($blk))
	 {
		 
		  $data['geomentry_indent'] = $this->Deo_District_model->geomentry_indent($dist, $blk,$class);
		  
	  }	
	   else
	    {
		 $data['geomentry_indent'] = $this->Deo_District_model->geomentry_indent($dist,$blk,$class);	  
	    }	
		$this->load->view('Deo_District/emis_dsegeomentry_indent',$data); 
	  }
	  
	   public function emis_deeatlas_indent()
	  {
		    
	        $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'Primary School' or cate_type = 'Middle School') ";
		 if(!empty($blk))
		 {
		 
		  $data['atlas_indent'] = $this->Deo_District_model->atlas_indent($dist,$blk,$class);
		  }	
	   else
	     {
		 $data['atlas_indent'] = $this->Deo_District_model->atlas_indent($dist,$blk,$class);	  
	     }	
	     $this->load->view('Deo_District/emis_deeatlas_indent',$data); 
	  }
	   public function emis_dseatlas_indent()
	  {
		   
	        $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = " and(cate_type = 'High School' or cate_type = 'Higher Secondary School') ";
		 if(!empty($blk))
		 {
		
		  $data['atlas_indent'] = $this->Deo_District_model->atlas_indent($dist,$blk,$class);
		  }	
	     else
	     {
		 $data['atlas_indent'] = $this->Deo_District_model->atlas_indent($dist,$blk,$class);	  
	     }	
	     $this->load->view('Deo_District/emis_dseatlas_indent',$data); 
	  }
	    
	   public function emis_deesweater_indent()
	  {
		    $scheme = $this->input->get('schemeid');
			$size=$this->input->post('size');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
	    if(!empty($size))
	    {
		$data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$size,$class );
        }	
		
		if(!empty($blk)){
		  
		  $sizes = substr($blk,0,2);
		  $scheme = substr($blk,2,2);
		  $blks = substr($blk,4,3);
		  $data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );
		  
	    }
	    if($scheme == 12)
	    {
		 $data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );	  
	    }	
	  
	
		  $this->load->view('Deo_District/emis_deesweater_indent',$data); 
	  }
	  public function emis_dsesweater_indent()
	  {
		    $scheme = $this->input->get('schemeid');
			$size=$this->input->post('size');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			
	    if(!empty($size))
	    {
		$data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$size,$class );
        }	
		
		if(!empty($blk)){
		  
		  $sizes = substr($blk,0,2);
		  $scheme = substr($blk,2,2);
		  $blks = substr($blk,4,3);
		  $data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );
		  
	    }
	    if($scheme == 12)
	    {
		 $data['sweater_indent'] = $this->Deo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );	  
	    }	
	  
	
		  $this->load->view('Deo_District/emis_dsesweater_indent',$data); 
	  }

       // public function emis_notebook_indent()
	  // {
		     // $scheme = $this->input->get('schemeid');
			 // $note =$this->input->post('note');
	         // $term =$this->input->post('term');
			 // $dist = $this->session->userdata('emis_deo_id');
			 // $blk =$this->input->get('block_id');
			
		  // // $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
		  // if(!empty($note))
		  // {
		  // $data['note'] =$this->Deo_District_model->notes($dist,$blks,$note,$term);
		  // }
		  // else if(!empty($blk))
		  // {
		   // $terms = substr($blk,0,1);
		  // $notes = substr($blk,1,2);
		  // $blks = substr($blk,2,3);	  
			  
		  // $data['note'] =$this->eo_District_model->notes($dist,$blks,$notes,$terms);
	      // }
		  // else
		  // {
			   // $not =1; $tem =1;
			  // $data['note'] =$this->Ceo_District_model->notes($dist,$blks,$not,$tem);  
		  // }
		  
		  
			// $data['notes'] =$this->Ceo_District_model->notebook($scheme);
			
		
		  // $this->load->view('Ceo_District/emis_notebook_indent',$data); 
	  // }
	  
	  public function emis_deeankleboot_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['ankleboot_indent'] = $this->Deo_District_model->ankleboot($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 16)
	    {
		 $data['ankleboot_indent'] = $this->Deo_District_model->ankleboot($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_deeankleboot_indent',$data);
	  }
	   public function emis_dseankleboot_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			 $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['ankleboot_indent'] = $this->Deo_District_model->ankleboot($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 16)
	    {
		 $data['ankleboot_indent'] = $this->Deo_District_model->ankleboot($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_dseankleboot_indent',$data);
	  }
	  
	  
	  //socks
	   public function emis_deesocks_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['socks_indent'] = $this->Deo_District_model->socks_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 17)
	    {
		 $data['socks_indent'] = $this->Deo_District_model->socks_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_deesocks_indent',$data);
	  }
	   public function emis_dsesocks_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			 $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['socks_indent'] = $this->Deo_District_model->socks_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 17)
	    {
		 $data['socks_indent'] = $this->Deo_District_model->socks_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_dsesocks_indent',$data);
	  }
	  
	  //raincoat
	  
	   public function emis_deeraincoat_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['raincoat_indent'] = $this->Deo_District_model->raincoat_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 18)
	    {
		 $data['raincoat_indent'] = $this->Deo_District_model->raincoat_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_deeraincoat_indent',$data);
	  }
	   public function emis_dseraincoat_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_deo_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['raincoat_indent'] = $this->Deo_District_model->raincoat_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 18)
	    {
		 $data['raincoat_indent'] = $this->Deo_District_model->raincoat_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Deo_District/emis_dseraincoat_indent',$data);
	  }

    public function get_OSC_List()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_deo_id');
     $dist_id=$data['dist_id'] ;

      $data['student_migration_details'] = json_decode(json_encode($this->Deo_District_model->get_OSC_List($dist_id)),true);
   //print_r($data['student_migration_details']);
       $result = array();$key='block_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                                                                      //print_r($result) ;die();            
      //print_r( $data['teacher_tot'][1]);
       $data['student_migration_details']=$result;

  // print_r($dist_id);
     // $data['student_migration_details'] = $this->Ceo_District_model->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/get_OSC_List',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_OSC_List_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $block_id=$this->input->get('block_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Deo_District_model->get_OSC_List_school($block_id)),true);
   //print_r($data['student_migration_details']);
       $result = array();$key='school_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
            //print_r($result) ;die();            
      //print_r( $data['teacher_tot'][1]);
       $data['student_migration_details']=$result;

  // print_r($dist_id);
     // $data['student_migration_details'] = $this->Ceo_District_model->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/get_OSC_List_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function students_Dropped_out_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $dist_id=$this->session->userdata('emis_deo_id');
  $data['student_osc'] = $this->Deo_District_model->students_Dropped_out_block($dist_id);
   
    $this->load->view('Deo_District/students_Dropped_out_block',$data);
  } else { redirect('/', 'refresh'); }

} 
public function students_Dropped_out_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $block_id=$this->input->get('block_id');
  $data['student_osc'] = $this->Deo_District_model->students_Dropped_out_school($block_id);
   
    $this->load->view('Deo_District/students_Dropped_out_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function students_Dropped_out_student_list()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $school_id=$this->input->get('school_id');
  $data['student_osc'] = $this->Deo_District_model->students_Dropped_out_student_list($school_id);
   
    $this->load->view('Deo_District/students_Dropped_out_student_list',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_schl_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
      $catty_id=$this->input->get('catty_id');
      $manage_id=$this->input->get('manage_id');
 //print_r($catty_id);
     $dist_id=$this->session->userdata('emis_deo_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_schl_blk($dist_id,$catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
      $data['catty_id']=$catty_id;
      $data['manage_id']=$manage_id;

    $this->load->view('Deo_District/slas_report_schl_blk',$data);
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
     $blk_id=$this->input->get('blk_id');
     $manage_id=$this->input->get('manage_id');
     //print_r($blk_id);
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_schl_wise($blk_id, $catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
      $data['manage_id']=$manage_id;
    $this->load->view('Deo_District/slas_report_schl_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_cate_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');
    $dist_id=$this->session->userdata('emis_deo_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_cate_dist($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/slas_report_cate_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_mana_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');
    $dist_id=$this->session->userdata('emis_deo_id');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_mana_dist($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Deo_District/slas_report_mana_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $pst=$this->input->post('emis_state_fix')==''?'tamil':$this->input->post('emis_state_fix');
    $gender=$this->input->post('gender')==''?"all":$this->input->post('gender');
  // print_r($gender);
     $dist_id=$this->session->userdata('emis_deo_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_blk($dist_id,$pst,$gender);
          //print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
    $this->load->view('Deo_District/slas_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $pst=$this->input->post('emis_state_fix')==''?'tamil':$this->input->post('emis_state_fix');
    $gender=$this->input->post('gender')==''?"all":$this->input->post('gender');
   // print_r($gender);
     $blk_id=$this->input->get('blk_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Deo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Deo_District_model->slas_report_schl($blk_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
    $this->load->view('Deo_District/slas_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function emis_gis_video()
    {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_district_id');
        
        $this->load->view('Deo_District/emis_gis_video',$data);
        
      }
     
    }
	public function profile_status_blockwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		   $district_id=$this->session->userdata('emis_deo_id');
		   $school_type= $this->input->post('school_type');
		   $data['school_type_c']=$school_type;
		    $data['school_type'] = $this->Statemodel->school_type();
	  $data['district_profile_completion_status'] = $this->Deo_District_model->district_profile_completion_status($district_id,$school_type);
	  
	   $this->load->view('Deo_District/emis_district_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}
public function profile_status_schoolkwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $block_id=$this->input->get('block');
		  $school_type= $this->input->get('school_type');
	  $data['block_profile_completion_status'] = $this->Deo_District_model->block_profile_completion_status($block_id,$school_type);
	  
	   $this->load->view('Deo_District/emis_block_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}
}
?>