<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/third_party/mpdf/mpdf.php';
class Ceo_District extends CI_Controller {

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
    $this->load->model('Ceo_District_model');
    $this->load->model('Ceo_District_model');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
    $this->load->model('Blockmodel');
    $this->load->model('Statemodel');
    $this->load->library('AWS_S3');
    $this->load->helper('common_helper');
        

  
  }
//school staff list
   public function staff_list()
   {
	    $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');  
		if($emis_loggedin) {
			
			
		  $dist = $this->session->userdata('emis_district_id');
		  $blk = $_POST['block'];
		  //$school = $_POST['school'];
		  $udise = $_POST['udise'];
		  $schoolname = $_POST['schoolname'];
		  $design = $_POST['design'];
		  $teachname = $_POST['teachname'];
		  
		  
		//$data['dist'] = $this->Statemodel->dists();
		$data['block'] = $this->Ceo_District_model->block($dist);
		$data['design']= $this->Ceo_District_model->desgination();
		//echo 'btn submit'.$_POST['btn_submit'];
		if($_POST['btn_submit']){
			//echo "if condition";
		$data['staff_list'] = $this->Ceo_District_model->staff_list($dist,$blk,$udise,$schoolname,$design,$teachname);
		}else{
			//echo "in else condition";
		$data['staff_list'] = [];	
		}
		
		$this->load->view('Ceo_District/emis_staff_list',$data);
        }else { redirect('/', 'refresh'); }		
   }

  public function emis_Ceo_District_dash()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      $data['total_count_details'] = $this->Ceo_District_model->get_district_school_student_teacher_total($district_details->district_name);
      // print_r($data);die;
      $school_details = $this->Ceo_District_model->get_district_scool_type_based_schoolinfo($district_details->district_name);
      $data['old_flash_message'] = $this->Ceo_District_model->get_flash_news($district_details->district_name);
       $data['Govt_detail']=$this->Ceo_District_model->govt_enrollment($dist_id);
      // print_r($data['old_flash_message'])

      // print_r(get_url());

      $data['school_type'] = $school_details['result'];
      $data['renewal_details'] = $this->Ceo_District_model->get_state_renewal_details($dist_id);
      $data['school_based_count_details'] = $school_details['school_info'];

      //Vivek Rao...
      $where="  AND students_school_child_count.district_id=".$dist_id;


      $user_type = $this->session->userdata('user_type');

      $data['reports_csv'] = $this->Ceo_District_model->get_districtwise_report($user_type);
      
      // echo $data['school_list'];
      //$data['freeschemes']=$this->Statemodel->getFreeSchemeGeneral($where);
      $this->load->view('Ceo_District/emis_district_home_dash',$data);
    } else { redirect('/', 'refresh'); }
  }
 
  public function emis_Ceo_District_home()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      // print_r($district_details); 
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
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
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district($district_details->district_name,$manage,$school_cate);
     //print_r($data['details']);
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district($district_details->district_name,'','');
    }

      $data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/emis_district_home',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function action_item_description()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');
    //print_r($dist_id);
      $data['details'] = $this->Ceo_District_model->action_item_description($dist_id);
      $data['detail'] = $this->Ceo_District_model->primary_school($dist_id);
      $data['middle'] = $this->Ceo_District_model->middle_school($dist_id);
      $data['zerostaff'] = $this->Ceo_District_model->School_with_zerostaff($dist_id);
        $data['zeroenroll'] = $this->Ceo_District_model->School_with_zero_enroll($dist_id);
      //$data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/action_item_description',$data);
    } else { redirect('/', 'refresh'); }
  }
    public function boys_schl_with_girls_enrol()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');
    //print_r($dist_id);
      $data['details'] =json_decode(json_encode ($this->Ceo_District_model->boys_schl_with_girls_enrol($dist_id),true));
    
      //$data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/boys_schl_with_girls_enrol',$data);
    } else { redirect('/', 'refresh'); }
  }
     public function girls_schl_with_boys_enrol()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');
    //print_r($dist_id);
      $data['details'] =json_decode(json_encode ($this->Ceo_District_model->girls_schl_with_boys_enrol($dist_id),true));
    
      //$data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/girls_schl_with_boys_enrol',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function primary_school_list()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');
    //print_r($dist_id);
      $data['details'] =json_decode(json_encode ($this->Ceo_District_model->primary_school_list($dist_id),true));
    
      //$data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/primary_school_list',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function middle_school_list()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');
    //print_r($dist_id);
      $data['details'] =json_decode(json_encode ($this->Ceo_District_model->middle_school_list($dist_id),true));
    
      //$data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/middle_school_list',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function emis_staff_BRTE_list()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      $dist_id=$this->session->userdata('emis_district_id');
      if($emis_loggedin) 
      {
        $data['staff_district_details'] = $this->Ceo_District_model->emis_staff_BRTE_list($dist_id);
         $this->load->view('Ceo_District/emis_staff_BRTE_list',$data);
      }else { redirect('/', 'refresh'); }
  }

  public function emis_Ceo_District_school()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
     
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
	  $department = $this->Ceo_District_model->get_school_mana_id();
	     
	   foreach($department as $dep)
	   {
		  $data['getone'] = $this->Ceo_District_model->get_school_type(); 
	   }
	  
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

      $manage = $this->input->post('school_manage');
	 
      $school_cate = $this->input->post('school_cate');
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
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district($district_details->district_name,$manage,$school_cate);
     //print_r($data['details']);
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district($district_details->district_name,'','');
    }

      $data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/emis_district_school',$data);
    } else { redirect('/', 'refresh'); }
  }

  


  /**
  *get_attendance_students
  *VIT - sriram
  */
/**
*dee_deployment 
   **/
    public function dee_deployment()
    {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        $this->load->view('Ceo_District/dee_deployment');
        }else { redirect('/', 'refresh'); }
    }
    /**
    * dee_transfer
    **/
    public function dee_transfer()
    {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        $this->load->view('Ceo_District/dee_transfer');
        }else { redirect('/', 'refresh'); }
    }
  /**
*dee_deployment 
   **/
  public function dse_deployment()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->view('Ceo_District/dse_deployment');
      }else { redirect('/', 'refresh'); }
  }
  /**
  * dee_transfer
  **/
  public function dse_transfer()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->view('Ceo_District/dse_transfer');
      }else { redirect('/', 'refresh'); }
  }

  /**
  * Teacher Report 
  * 29/01/2018
  * VIT-Sriram
  */

  public function get_classwise_district()
  {
	 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id =  $this->input->get('dist');
    $data['dist_id'] = $dist_id;

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;

      if(!empty($manage)){
      $data['details'] = $this->Statemodel->get_emis_blockwise_district( $dist_id,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_emis_blockwise_district( $dist_id,'','');

    }

      $data['dist'] =$dist_id;
			$this->load->view('Ceo_District/emis_district_dash_blockwise',$data);

			// echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }

  public function get_dash_blockwise_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
      $data['dist'] = $this->session->userdata('emis_district_id');

      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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

      $data['details'] = $this->Ceo_District_model->get_blockwise_school($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_blockwise_school($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('Ceo_District/emis_state_dash_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }

  public function get_dash_schoolwise_class()
  {
  	$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$school_id = $this->input->get('school');
			
			$data['details'] = $this->Ceo_District_model->get_schoolwise_class($school_id);
			// print_r($data);die;
			$this->load->view('Ceo_District/emis_district_dash_schoolsingle',$data);
			// echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }
 /***************************End Filter Students*************** */
  

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

			$dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
			// print_r($dist_id);
      $dist_id = $district_details->district_name;
			// $date = $this->input->post('date');
      $date = $this->input->post('date');
      
			// print_r($dist_id);
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
			
			$data['school_details_blockwise'] = $this->Ceo_District_model->get_attendance_schoolreport_blockwise($dist_id,$date,$table);
			$data['school_type'] = $this->Ceo_District_model->get_attendance_school_type_blockwise($dist_id,$date,$table);
			//teachers 
			$data['teacher_blockwise'] = $this->Ceo_District_model->get_attendance_teacherreport_blockwise($dist_id,$date,$teach_table);
			$data['teacher_school_type_blockwise'] =$this->Ceo_District_model->get_attendance_teacher_tpye_blockwise($dist_id,$date,$teach_table);
			// print_r($data['teacher_blockwise']);
			// echo "<pre>";
        $data['date'] = $date;
        // echo $date;
					$data['dist'] = $dist_id;
			// print_r($data);
			// echo "</pre>";die;
			$this->load->view('Ceo_District/emis_district_attendance_blockwise',$data);
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

				
			$data['dist'] = "Block - ".$block_id;
			$data['student_details_schoolwise'] = $this->Ceo_District_model->get_attendance_report_schoolwise($block_id,$date,$table);
			$data['date'] = $date;
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";die;

			$this->load->view('Ceo_District/emis_district_attendance_schoolwise',$data);
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
				
			$data['teacher_details_schoolwise'] = $this->Ceo_District_model->get_attendance_teacher_report_schoolwise($date,$block_id,$teach_table);
			$data['dist'] = "Block - ".$block_id;
      $data['date'] = $date;
      // echo "funtion";
			$this->load->view('Ceo_District/emis_district_teacher_attendance_schoolwise',$data);


			}else { redirect('/', 'refresh'); }
	}

  /**
    * Special Report For CEO
    * 07/02/2019
    * VIT-sriram
    **/

    public function schoolcatemanagefil(){  
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $dist_id = $this->session->userdata('emis_district_id');
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


        $data['special_schools'] = $this->Ceo_District_model->schoolcatemanagefilter($manage,$cate,$id1,$id2,$dist_id);
    
        $this->session->unset_userdata('emis_state_report_schcate');
        
        $this->session->unset_userdata('emis_state_report_schmgtype');
        $this->session->unset_userdata('emis_state_special_search');
        $this->session->unset_userdata('emis_state_special_search1');
    
      $this->load->view('Ceo_District/emis_district_special_reports',$data);

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
        $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
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
      $data['school_info'] = $this->Ceo_District_model->get_ceo_school_info($district_details->district_name,$school_type);
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();

      $data['distname'] = $district_details->district_name;
      $this->load->view('Ceo_District/emis_district_teacher_list',$data);
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
      $data['teacher_list'] = $this->Ceo_District_model->get_schoolwise_teacher_list($school_id);
      $data['school_details'] = $this->Ceo_District_model->get_school_name($school_id);
      $dates = [];
      for($i=5;$i<=date('d');$i++)
      {   $i = ($i<=9?'0'.$i:$i);

          array_push($dates,date($i.'-m-Y'));
      }
      $data['date'] = implode(",",$dates);
      $this->load->view('Ceo_District/emis_district_school_teacher_list',$data);
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
    foreach($records as $res)
    {
      // print_r($res);
      $res['partici'] = ($res['partici']=='true'?1:0);
      $save_id[] = $this->Ceo_District_model->save_teacher_reports($res);
    }

    echo json_encode(sizeof($save_id));
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

      $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
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
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Ceo_District_model->get_teacherstrick_district_reports($dist_name,$school_type);

      $this->load->view('Ceo_District/emis_district_teacherstrick_district_reports',$data);
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
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Ceo_District_model->get_teacherstrick_block_reports($edu_dist,$school_type);

      $this->load->view('Ceo_District/emis_district_teacherstrick_block_reports',$data);
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
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Ceo_District_model->get_teacherstrick_school_reports($block,$school_type);

      $this->load->view('Ceo_District/emis_district_teacherstrick_school_reports',$data);
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
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();

      $data['teacher_strick'] = $this->Ceo_District_model->get_teacherstrick_teacher_reports($school,$school_type);
      $data['school_details'] = $this->Ceo_District_model->get_school_name($school);

      $this->load->view('Ceo_District/emis_district_teacherstrick_teacher_reports',$data);
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

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      $dist_id = $district_details->district_name;
         
         if(!empty($dist_id)){
         $data['dist_id'] = $dist_id;
      }else
      {
        $data['dist_id'] = '';
      }
        $data['school_renewal_status'] = $this->Ceo_District_model->get_renewal_district_block($school_type,$dist_id);
        $data['manage'] = '';
        $this->load->view('Ceo_District/emis_district_renewal_block',$data);

      

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
        $data['school_renewal_status'] = $this->Ceo_District_model->get_renewal_district_school($school_type,$block_id);
      
        $this->load->view('Ceo_District/emis_district_renewal_school',$data);

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
		  $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      $dist_id = $district_details->district_name;
				
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

      
      
		  // print_r($block);die;

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
		  // print_r($data['dist']);

		  $data['student_details_schoolwise'] = $this->Ceo_District_model->get_attendance_search_details($date,$school_cat,$blocks,$table);

		  // print_r($data);


			$this->load->view('Ceo_District/emis_district_attendance_schoolwise',$data);

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
        $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      $dist = $district_details->district_name;
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
      $data['teacher_details_schoolwise'] = $this->Ceo_District_model->get_teacher_attendance_search($date,$school_type,$district,$blocks,$teach_table);

      $this->load->view('Ceo_District/emis_district_teacher_attendance_schoolwise',$data);


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
				$data['classwise_details'] = $this->Ceo_District_model->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Ceo_District_model->get_school_name($school_id);
      $data['school'] = $school_id;
      	$this->load->view('Ceo_District/emis_district_attendance_classwise',$data);

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
				$data['date'] = $date;
				
			// echo $school.'--'.$class_id;

			$data['students_section_details'] = $this->Ceo_District_model->get_attendance_sectionwise_details($school_id,$class_id,$table,$date);
			$data['school_details'] = $this->Ceo_District_model->get_school_name($school_id);
      $data['school'] = $school_id;
      $data['class'] = $class_id;
			$this->load->view('Ceo_District/emis_district_attendance_sectionwise',$data);

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
			$data['teacher_absent_list'] = $this->Ceo_District_model->get_attendance_teacher_classwise($date,$school_id,$teach_table);
      $data['school_details'] = $this->Ceo_District_model->get_school_name($school_id);
      $data['date'] = $date;
      // print_r($data['teacher_absent_list']);
			$this->load->view('Ceo_District/emis_district_teacher_classwise',$data);

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

      $data['header'] = 'Ceo_District';
      $data['link'] = 'Ceo_District';

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
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      // print_r($dist_id);
      $dist_id = $district_details->district_name;
      $data['old_flash_message'] = $this->Ceo_District_model->get_flash_news($dist_id);
      $data['block'] = $this->Ceo_District_model->get_all_block_name($dist_id);
      $data['authority'] = $this->Ceo_District_model->get_flash_news_authority();
      
      $head_details = $this->get_common_control_link();
      $data['manage'] = [];
      $data['cate'] = [];
      $data['header'] = $head_details['header'];
      $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_district_flash_news',$data);
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
    $result_id = $this->Ceo_District_model->save_flash_news_data($save_array);

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
    $this->load->library('AWS_S3');
$district_id = $this->session->userdata('emis_district_id');
$district_details = $this->Ceo_District_model->get_districtName($district_id);
      
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

        // return $data;

        
        
          
      }else { redirect('/', 'refresh'); }
  }


  /************** End ***************************/

            /*****************************************
             * RTE School Information                *
             * VIT-Sriram                            *
             * 25/03/2019                            *
             *****************************************/

    public function get_RTE_districtwise_school_details()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id = $this->session->userdata('emis_district_id');
        $district_details = $this->Ceo_District_model->get_districtName($dist_id);    
        $dist_id = $district_details->district_name;
        $school_cats = array('Un-aided','Fully Aided','Partially Aided');
        $data['school_RTE_list'] = $this->Ceo_District_model->get_RTE_districtwise_school_list($dist_id,$school_cats);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_district_RTE_school_list',$data);
      }else { redirect('/', 'refresh'); }

    }


      /************************************************************************
       * Save RTE School List                                                 *
       * VIT-Sriram                                                           *
       * 25/03/2019                                                           *
       * table Name schoolnew_rte                                             *
       * parms school_id,entry_class,number_section,total_seats,allotted seat *
       /***********************************************************************/

    public function save_RTE_school_list()
    {
  date_default_timezone_set('Asia/Kolkata');

        $records = $this->input->post();
        //print_r($records);
        $records['acad_year'] = date('Y');
        $records['created_at'] = date('Y-m-d h:i:s');
        // print_r($records);

        $save_data = $this->Ceo_District_model->save_RTE_school_list($records);
        echo $save_data;die;
    }
     public function save_RTE_student_list()
    {
         $records = $this->input->post();
        $save_data = $this->Ceo_District_model->save_RTE_student_list($records);
        echo $save_data;
    }


    /************************** End *****************************************/

          /*********************** School Short Name***********************
           * School Short Name Update                                     *
           * VIT-sriram                                                   *
           * 03/04/2019                                                   *
           ****************************************************************/

    public function get_districtwise_school_short_name()
    {
        $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {

          $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      // print_r($district_details); 
      $data['getmanagecate'] = $this->Ceo_District_model->get_manage_cate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      // print_r($school_cate);die;
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;
      $data['details'] = $district_details;
      $head_details = $this->get_common_control_link();
      if(!empty($manage))
      {
          $data['school_details'] = $this->Ceo_District_model->get_districtwise_sch_short_name($district_details->district_name,$manage,$school_cate);
      }else
      {
        $data['school_details'] = $this->Ceo_District_model->get_districtwise_sch_short_name($district_details->district_name,'','');
      }
      $data['header'] = $head_details['header'];
      $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_district_sch_short_name',$data);

      }else { redirect('/', 'refresh'); }

    } 


    /**
    * Update School Details
    * VIT-sriram
    * 03/04/2019
    **/

    public function update_school_details()
    {
      $update = $this->input->post('records');
      // print_r($update);die;
      $update_result = $this->Ceo_District_model->update_sch_short_name($update);

      echo json_encode($update_result);die;
    }





  /******************************* End *******************************************/

  /********************** Staff Details Update ********************************/

    /****************************
      * staff_update_details    *
      * VIT-sriram              *
      * 06/05/2019              *
      ***************************/

  public function emis_district_schools_student_list()
  {
    $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        $district_id =$this->session->userdata('emis_district_id');
		$district_details = $this->Ceo_District_model->get_districtName($district_id);
		$data['dist_id'] = $district_details->district_name;
        $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      if(!empty($manage)){
        $data['school_student_count_details'] = $this->Ceo_District_model->get_school_student_count($district_id,$manage,$school_cate);
        }else
        {
          $data['school_student_count_details'] = $this->Ceo_District_model->get_school_student_count($district_id,'','');
        }

        $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

        $this->load->view('Ceo_District/emis_district_school_student_list',$data);
    }else { redirect('/', 'refresh');}
    
  }

  public function get_student_schoolwise_count()
  {

      $school_id = $this->input->post('sch_id');
      $data['result'] = $this->Ceo_District_model->get_students_educationwise_count($school_id);

      $table = 'teacher_panel1';
      $where = array('school_key_id'=>$school_id);
      $data['teacher_panel1'] = Common::get_multi_list($table,$where);

      echo json_encode($data);
  }


  public function save_staff_schoollist_count()
  {
      $records = $this->input->post('records');
      // print_r($this->input->post());die;
      parse_str($records,$searchArray);
      $count = $this->input->post('count');
      // print_r($searchArray);die;
      for($i=0;$i<$count;$i++){
        if(array_key_exists('id'.$i, $searchArray)) {
      $save1['id'] = $searchArray['id'.$i];
      }else
      {
        $save1['id'] = '';
      }
      $save1['elig_1_5'] = $searchArray['elig_1_5'.$i];
      $save1['elig_6_8'] = $searchArray['elig_6_8'.$i];
      $save1['elig_9_10'] = $searchArray['elig_9_10'.$i];
      $save1['elig_tot'] = $searchArray['elig_tot'.$i];
      $save1['stud_1_5'] = $this->input->post('stu_1')[$i];
      $save1['stud_6'] = $this->input->post('class_6')[$i];
      $save1['stud_7'] = $this->input->post('class_7')[$i];
      $save1['stud_8'] = $this->input->post('class_8')[$i];
      $save1['stud_9'] = $this->input->post('class_9')[$i];
      $save1['stud_10'] = $this->input->post('class_10')[$i];
      $save1['stud_tot_1_5'] = $save1['stud_1_5'];
      $save1['stud_tot_6_8'] = $save1['stud_6'] + $save1['stud_7'] + $save1['stud_8'];  
      $save1['stud_tot_9_10'] = $save1['stud_9'] + $save1['stud_10'];
      $save1['school_key_id'] = $this->input->post('sch_id');
      $save1['medium_code'] = $this->input->post('medium')[$i];
      $save1['hm'] = $searchArray['hm'.$i];
      // print_r($save1);die;
      $save_data[] = $this->Ceo_District_model->save_records($save1,'teacher_panel1');
      unset($searchArray['elig_1_5'.$i]);
      unset($searchArray['id'.$i]);
      unset($searchArray['elig_6_8'.$i]);
      unset($searchArray['elig_9_10'.$i]);
      unset($searchArray['elig_tot'.$i]);
      unset($searchArray['hm'.$i]);
      }
      // print_r($searchArray);die;
      if(sizeof($save_data) !=0){
        $searchArray['school_key_id'] = $this->input->post('sch_id');
        
        $searchArray['teach_status'] = $this->input->post('status');
        $searchArray['district_id'] = $this->session->userdata('emis_district_id');
        // print_r($searchArray);die;
        // unset($searchArray['elig_sub_tot']);

        //     $name = $this->get_field_name($searchArray['sg']);   
        //     $searchArray[$name.'sg'] = $searchArray['sg'];
        //     unset($searchArray['sg']); 
        //     //
        //     $name = $this->get_field_name($searchArray['sci']);   
        //     $searchArray[$name.'sci'] = $searchArray['sci'];
        //     unset($searchArray['sci']);
        //     //
        //      $name = $this->get_field_name($searchArray['mat']);   
        //     $searchArray[$name.'mat'] = $searchArray['mat'];
        //     unset($searchArray['mat']);  
        //     //
        //     $name = $this->get_field_name($searchArray['eng']);   
        //     $searchArray[$name.'eng'] = $searchArray['eng'];
        //     unset($searchArray['eng']); 
        //     //
        //     $name = $this->get_field_name($searchArray['tam']);   
        //     $searchArray[$name.'tam'] = $searchArray['tam'];
        //     unset($searchArray['tam']); 
        //     //
        //     $name = $this->get_field_name($searchArray['soc']);   
        //     $searchArray[$name.'soc'] = $searchArray['soc'];
        //     unset($searchArray['soc']);
        //     //
        //     $name = $this->get_field_name($searchArray['tot']);   
        //     $searchArray[$name.'tot'] = $searchArray['tot'];
        //     unset($searchArray['tot']); 

        $save2_data = $this->Ceo_District_model->save_records($searchArray,'teacher_panel2');
    }

    echo json_encode($save2_data);
      // print_r($searchArray);


  }



  public function get_field_name($need_val)
  {
      $name = '';
        if($need_val > 0)
        {
          $name = 'surp_';
        }
        else
        {
          $name = 'need_';
        }

        return $name;
  }

  /********************** End ***************************************/

  /**************************************
    * Staff Fixation higher Sec         *
    * VIT-sriram                        *
    * 20/05/2019                        *
    *************************************/
  public function get_districtwise_higher_students_list()
  {
    $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        $district_id =$this->session->userdata('emis_district_id');
        $district_details = $this->Ceo_District_model->get_districtName($district_id);
      
      $data['dist_id'] = $district_details->district_name;
        $data['school_details'] = $this->Ceo_District_model->get_districtwise_higher_students_avaliable_count($district_id);
        $this->load->view('Ceo_District/emis_districtwise_school_higher_students_list',$data);
    }else { redirect('/', 'refresh');}

  }

  /**
    * Staff Fixation mediumwise students count
    * VIT-sriram
    * 20/05/2019
    ******/
  public function get_mediumwise_school_students_count()
  {
      $sch_id = $this->input->post('sch_id');
      // echo $sch_id;
      $data['stu_count'] = $this->Ceo_District_model->get_schoolwise_students_count($sch_id);
      $data['sub_count'] = $this->Ceo_District_model->get_sub_count();
      $table = 'teacher_panel3';
      $where = array('school_key_id'=>$sch_id);
      $data['panel3'] = Common::get_multi_list($table,$where);
      $data['panel4'] = Common::get_single_list('teacher_panel4',$where);
      echo json_encode($data);
  }


  /****************************************
    * Staff Fixation higher Save          *
    * VIT-sriram                          *
    * 23/05/2019                          *
    ***************************************/

  public function save_staff_higher_details()
  {
    date_default_timezone_set('Asia/calculate');
      $records = $this->input->post('records');
      parse_str($records,$searchArray);
      $medium_details = $this->input->post('panel3');
      $sch_id = $this->input->post('school_id');
      // print_r($medium_details);
      $panel3_data = $this->input->post('panel3_with_data');
      foreach($medium_details as $med)
      {
        if(sizeof($panel3_data) ==0){
        $save_panel['id'] ='';
        $save_panel['school_key_id'] = $sch_id;
        $save_panel['medium_id'] =$med['education_medium_id'];
        $save_panel['stud_11'] = $med['Class11'];
        $save_panel['stud_12'] = $med['Class12'];
        $save_panel['stud_tot_11_12'] = $med['Class11'] + $med['Class12'];
        $save_panel['created_at'] = date('Y-m-d H:i:s');
        // print_r($save_panel);
        $panel3_result[] = $this->Ceo_District_model->save_records($save_panel,'teacher_panel3');
        }else
        {
          $panel3_result = array(1);
        }
      }
      if(sizeof($panel3_result) !=0)
      {
          $searchArray['school_key_id'] = $sch_id;
          $searchArray['district_id'] = $this->session->userdata('emis_district_id');
          $searchArray['status'] = $this->input->post('status');
          $searchArray['created_at'] = date('Y-m-d H:i:s');
      // print_r($searchArray);die;
          $save_panel4 = $this->Ceo_District_model->save_records($searchArray,'teacher_panel4');

      }
      echo json_encode($save_panel4);
  }



  /************************* End ***************************************************/

  /************************** RTE 2019 Verfication *********************************/

   /************************************************
    * RTE 2019 Verification                       *
    * VIT-sriram                                  *
    * 21/05/2019                                  *
    ***********************************************/
  public function emis_rte_verification_districtwise()
  {
    $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        $district_id =$this->session->userdata('emis_district_id');
        $district_details = $this->Ceo_District_model->get_districtName($district_id);
        $dist_id = $district_details->district_name;
        $data['dist_id'] = $dist_id;
        $data['rte_stu_list'] = $this->Ceo_District_model->get_rte_students_list($dist_id);
        // print_r($data);
        $this->load->view('Ceo_District/emis_rte_students_verification_2019',$data);
      }else { redirect('/', 'refresh');}

  }


  public function save_rte_verification()
  {
        $update = $this->input->post('records');
        // print_r($update);
        $rte_update = $this->Ceo_District_model->update_rte_verification($update);
        echo json_encode($rte_update);
  }




  /** *****************************************
    * BRTE Schools Save                       *
    * VIT-sriram                              *
    * 05/07/2019                              *
    * *****************************************/

  public function emis_brte_staff_form()
  {

     $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        
        $dist_id = $this->session->userdata('emis_district_id');
        $cate_type = array('Higher Secondary School');
        $dist_where = array('students_school_child_count.district_id'=>$dist_id);
        
        $where = array('district_id'=>$dist_id);
        
        $data['brte_school_map_list'] = $this->Ceo_District_model->emis_brte_school_details($dist_id);
        $data['brte_brc_map_list'] = $this->Ceo_District_model->emis_brte_brc_details($dist_id);

        $data['brte_list'] = $this->Ceo_District_model->emis_brte_staff_list($dist_id);

        $data['block_details'] = Common::get_multi_list('baseapp_block',$where);
        $this->load->view('Ceo_District/emis_brte_staff_form',$data);
      }else { redirect('/', 'refresh');}

  }


  // Get School List

  public function get_primary_school_list()
  {
      $dist_id = $this->session->userdata('emis_district_id');
      $sch_ctype_id = $this->input->post('sch_ctype_id');
      // if($sch_ctype_id==1)
      // {
          
      //     $hhs_cate_type = array('Primary School','Middle School','High School');
      // }else
      // {
          
          $hhs_cate_type = array('Primary School','Middle School','High School','Higher Secondary School');
      // }
      $block_id = $this->input->post('block_id');
      $hss_school_id = $this->input->post('hss_school_id');
      // $dist_where = array('schoolnew_basicinfo.brte'=>0);
     if($hss_school_id !=0)
     {
      // $dist_where = array();
        


        $data['hss_list']  = $this->Ceo_District_model->emis_hss_school_list($dist_id,$hhs_cate_type,'',$block_id);
        $selected_where = array('brte_school_map.hss_school_id'=>$hss_school_id,'brte_school_map.isactive'=>1);
     $data['pri_selected_list'] = Common::get_multi_list('brte_school_map',$selected_where,$block_id);


     }else
     {
      // $dist_where = array('schoolnew_basicinfo.brte'=>0);
      // print_r($hss_cate_type);die;
      $data['hss_list']  = $this->Ceo_District_model->emis_hss_school_list($dist_id,$hhs_cate_type,'',$block_id);
     
     }

      echo json_encode($data);
  }



  // Check Brte Staff School 

  public function check_brte_staff_school()
  {
      $school_id = $this->input->post('school_id');

      $result = $this->Ceo_District_model->check_brte_school_group('brte_school_groups',$school_id);

      echo json_encode($result);
  }


  // Save BRTE 

  public function emis_brte_save()
  {
      $records = $this->input->post('records');
      $save_school = $this->input->post('school_list');
      // print_r($records);
      // $save_school =[];
      if(!empty($records)){
      foreach($records as $res)
      {

          $school_list = $this->Ceo_District_model->get_school_list($res['school_id']);

          $res['district_id'] = $school_list->district_id;
          $res['block_id'] = $school_list->block_id;
          $res['block_name'] = $school_list->block_name;
          $res['udise_code'] = $school_list->udise_code;

          $res['edu_dist_id'] = $school_list->edu_dist_id;
          $res['district_name'] = $school_list->district_name;
          $res['edu_dist_name'] = $school_list->edu_dist_name;
          $res['school_name'] = $school_list->school_name;
          $res['school_type'] = $school_list->school_type;
          $res['school_type_id'] = $school_list->school_type_id;
          $res['sch_directorate_id'] = $school_list->sch_directorate_id;
          $res['management'] = $school_list->management;
          $res['category'] = $school_list->category;
          $res['cate_type'] = $school_list->cate_type;

          // print_r($res);
          $result[] = $this->Ceo_District_model->save_brte_list('brte_school_map',$res);
      }
    }
      // print_r($save_school);
      if(!empty($save_school)){
      foreach($save_school as $school)
      {
          $save['school_id'] = $school->school_id;
          $save['brte'] = 1;

          // print_r($school);

          $update_school[] = $this->Ceo_District_model->update_brte_school('schoolnew_basicinfo',$school);
      }
    }

      echo json_encode(sizeof($result));
  }


  public function get_brte_school_group()
  {

      $district_id = $this->session->userdata('emis_district_id');
      $school_id=  $this->input->post('school_id');
      if($school_id !=0)
      {
        $selected_where = array('is_active'=>1,'school_id'=>$school_id);
        $data['selected_school'] = $this->Ceo_District_model->get_brte_selected_schools($selected_where);
        $where = array('brte_school_map.district_id'=>$district_id,'brte_school_map.isactive'=>1);
      }else{
        $where = array('brte_school_map.district_id'=>$district_id,'brte_school_map.isactive'=>1,'brte_school_groups.brte_id'=>null);
      }
      $data['result'] = $this->Ceo_District_model->get_brte_school_group($where);

      echo json_encode($data);
  }


  public function save_brte_school_group()
  {
      $records = $this->input->post('records');

      foreach($records as $res)
      {

          $res['district_id'] = $this->session->userdata('emis_district_id');
          $res['created_at'] = date('Y-m-d h:i:s');
          $result[] = $this->Ceo_District_model->save_brte_staff_list('brte_school_groups',$res);
        // print_r($res);

      }

      echo json_encode(sizeof($result));
  }

  public function brte_nodal_school_remove()
  {
      $save_data['school_id'] = $this->input->post('school_id')[0];
      $save_data['is_active'] = 0;
      
      $result = $this->Ceo_District_model->update_brte_school('brte_school_groups',$save_data);
      echo json_encode($result);
  }


  /****************************************** End **********************************/

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
    $district_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Ceo_District_model');
     $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);
    $data['details'] = $this->Ceo_District_model->getallblockscountbydistrict($district_id);
    $this->load->view('Ceo_District/emis_district_analytics',$data);
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
    $this->load->model('Ceo_District_model');
    $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblock1($district_id,$manage);
    }else{
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblock($district_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);
    $this->load->view('Ceo_District/emis_district_classwise',$data);
    } else { redirect('/', 'refresh'); }
  }

      public function emis_district_student_gender()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_district_id');
     $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['result1'] = $this->Ceo_District_model->getallgenderbydistrict1($district_id,$manage);
    }else{
    $data['result1'] = $this->Ceo_District_model->getallgenderbydistrict($district_id);
    }
     $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id); 
    $this->load->view('Ceo_District/emis_district_genderwise',$data);
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
   $this->load->model('Ceo_District_model');
   $district_id=$this->session->userdata('emis_district_id');
   $community ="";
   if($this->session->userdata('emis_community')!=""){
     $community =  $this->session->userdata('emis_community');
   }else{
      $this->session->set_userdata('emis_community','C1');
       $community ="C1";
   }
     $data['communityname'] = $this->Ceo_District_model->getcommunityname($community);
    $data['communityid'] = $community;
    $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);
    $data['details'] = $this->Ceo_District_model->getallblockscommuniywise($district_id,$community);
    $this->load->view('Ceo_District/emis_district_communitywise',$data);
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
    $Ceo_Districtid = $this->session->userdata('emis_district_id');
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Ceo_District_model');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschool($block_id);
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
    $this->load->view('Ceo_District/emis_district_schoolwise',$data);
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
    $this->load->model('Ceo_District_model');
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
    $data['details'] = $this->Ceo_District_model->getallblockcountsbyschool($block_id);
    $this->load->view('Ceo_District/emis_district_analytics_school',$data);

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
    $this->load->model('Ceo_District_model');
     $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschool1($block_id,$manage);
    }else{
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschool($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
   $this->load->view('Ceo_District/emis_district_schoolwise_analytics',$data);
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
    $this->load->model('Ceo_District_model');

    $schoolprofile = $this->Ceo_District_model->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['details'] = $this->Ceo_District_model->getallbrachesbyschool($school_id);
    $this->load->view('Ceo_District/emis_district_schoolsingle',$data);
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
    $this->load->model('Ceo_District_model');

    $data['details'] = $this->Ceo_District_model->getallstudentsbyschid($school_id,$class_id);
    $data['school_name'] = $this->Ceo_District_model->getsingleschoolname($school_id);
    $data['class_name'] = $this->Ceo_District_model->getsingleclassname($class_id);
    $this->load->view('Ceo_District/emis_district_studentsall',$data);
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
    $this->load->model('Ceo_District_model');
    $data['communityid'] = $community;
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
    $data['details'] = $this->Ceo_District_model->getallblockkkcountsbyclassschool($block_id,$community);
    $this->load->view('Ceo_District/emis_district_community_schools',$data);
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
          $this->load->view('Ceo_District/emis_district_selectschool',$data);     
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
        $schoolprofile=$this->Ceo_District_model->get_school_by_id($school_id,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('Ceo_District/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error1'] = "No school data found / Allow only within a district Schools"; 
          $this->load->view('Ceo_District/emis_district_selectschool',$data);

        }
          


    }
    else
    {
          
          $this->load->view('Ceo_District/emis_district_selectschool');

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
        $schoolprofile=$this->Ceo_District_model->get_school_by_udise($schooludise,$district_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('Ceo_District/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error2'] = "No school data found<br/>Allow only within a district Schools";  
          $this->load->view('Ceo_District/emis_district_selectschool',$data);

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
        $schoolprofile=$this->Ceo_District_model->get_school_by_block($schoolid,$block_id);
        if(!is_null($schoolprofile) && !empty($schoolprofile) )
        {
            $data['schoolname']  = $schoolprofile[0]->school_name;
            $data['schoolid']  = $schoolprofile[0]->school_id;
            $data['udise_code']  = $schoolprofile[0]->udise_code;
            $data['blockname'] = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $data['schmanage'] = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $data['schdirector'] = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $this->load->view('Ceo_District/emis_district_selectschool',$data);
        
         }
         else
        {
          $data['error3'] = "No school data found<br/>Allow only within a district Schools"; 
          $this->load->view('Ceo_District/emis_district_selectschool',$data);

        }
    }else{
      $data['error3'] = "No school data found ";
       $this->load->view('Ceo_District/emis_district_selectschool',$data);
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
    $this->load->model('Ceo_District_model');
    $getblocks  = $this->Ceo_District_model->getallschoolsbyblock($emis_block);
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
 
   public function emis_ceo_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==9){ 


      $this->load->view('Ceo_District/emis_ceo_resetpassword');
      
      }else{
      echo "Authentication Error! <br/>Not Authorized";
      }

    } else { redirect('/', 'refresh'); }
  }
   public function emis_ceo_passwordreset(){
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $this->load->database(); 
     $this->load->model('Ceo_District_model');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');

     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Ceo_District_model->emis_ceo_resetpassword($district_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_resetpassword(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $user_type_id=$this->session->userdata('emis_user_type_id');
     if($user_type_id==3){ 


      $this->load->view('Ceo_District/emis_district_resetpassword');

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
     $this->load->model('Ceo_District_model');

     $username=$this->session->userdata('emis_username');
     $newpass = $this->input->post('newpassword');
//print_r($newpass);die();
     $data=array('emis_password'=>md5($newpass),
                  'temp_log'=>1,
                  'ref'=>$newpass);

     $reset  = $this->Ceo_District_model->emis_district_resetpassword($district_id,$username,$data);

    } else { redirect('/', 'refresh'); }
  }

    public function emis_district_oldpasswordck()
  {
    
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
       $district_id =$this->session->userdata('emis_district_id');
       $this->load->database(); 
       $this->load->model('Ceo_District_model');
  
       $username=$this->session->userdata('emis_username');
       $oldpass = $this->Ceo_District_model->getoldpassdistrict($district_id,$username);
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
    $this->load->model('Ceo_District_model');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblockreport($district_id);
    $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);
    $this->load->view('Ceo_District/emis_district_report',$data);
    } else { redirect('/', 'refresh'); }
  }

  public function emis_district_blocks_report()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
    $block_id =$this->session->userdata('emis_districtblock_id');
    $this->load->database();
    $this->load->model('Ceo_District_model');
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschoolreport($block_id);
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
   $this->load->view('Ceo_District/emis_district_schoolwise_reports',$data);
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
    $this->load->model('Ceo_District_model');

    $schoolprofile = $this->Ceo_District_model->getschoolprofiledetails($school_id);
    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Ceo_District_model->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Ceo_District_model->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('Ceo_District/emis_district_report_schoolsingle',$data);
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
    $this->load->model('Ceo_District_model');

    $data['details'] = $this->Ceo_District_model->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Ceo_District_model->getsingleschoolname($school_id);
    $data['class_name'] = $this->Ceo_District_model->getsingleclassname($class_id);
    $this->load->view('Ceo_District/emis_district_report_studentsall',$data);
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
    $this->load->model('Ceo_District_model');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Ceo_District_model->requesteddatacountschoolwise($district_id,$date_select);
    $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);

  
    // echo var_dump($data);

   $this->load->view('Ceo_District/emis_schools_transferrequest1',$data);
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
    $this->load->model('Ceo_District_model');

    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['details'] = $this->Ceo_District_model->requesteddatacountstudentlist($district_id,$date_select,$schooludise);
    $data['distname'] = $this->Ceo_District_model->getsingledistname($district_id);
    $data['schooludise'] = $schooludise;
    // echo var_dump($data);

   $this->load->view('Ceo_District/emis_schools_transferrequest2',$data);
    } else { redirect('/', 'refresh'); }

    }

     public function emis_student_aadhaar_dist()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $dist_id=$this->session->userdata('emis_district_id');
    $this->load->database();
    $this->load->model('Ceo_District_model');

    $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblockaadhaar1($dist_id,$manage);
    }else{
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblockaadhaar($dist_id);
    }
  
    $data['distname'] = $this->Ceo_District_model->getsingledistname($dist_id);
   $this->load->view('Ceo_District/emis_stu_aadhaar_report_dist',$data);
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
    $this->load->model('Ceo_District_model');
    $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschoolaadhaar1($block_id,$manage);
    }else{
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschoolaadhaar($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
   $this->load->view('Ceo_District/emis_stu_aadhaar_report_block',$data);
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
    $this->load->model('Ceo_District_model');
     $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblockreport1($dist_id,$manage);
    }else{
    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassblockreport($dist_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['distname'] = $this->Ceo_District_model->getsingledistname($dist_id);
   $this->load->view('Ceo_District/emis_district_report_dist',$data);
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
    $this->load->model('Ceo_District_model');
     $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
     $manage =$this->session->userdata('emis_districtreport_schmanage');  
    if($manage!=""){ 
     $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschoolreport1($block_id,$manage);
    }else{
   $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassschoolreport($block_id);
    }
    // $data['schooldist'] = $this->Datamodel->getallachooldist();
   
    $data['blockname'] = $this->Ceo_District_model->getsingleblockname($block_id);
   $this->load->view('Ceo_District/emis_district_report_block',$data);
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
    $this->load->model('Ceo_District_model');

    $standardlist  = $this->Homemodel->getallstandardsbyschool($school_id);
     // $data['standardlist']=$this->Datamodel->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class); 

    $schoolprofile = $this->Ceo_District_model->getschoolprofiledetails($school_id);
    $data['schoolname']  = $schoolprofile[0]->school_name;
    $data['udise_code']  = $schoolprofile[0]->udise_code;
    $data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
    $data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);


     $data['lowclass']=$standardlist[0]->low_class;
     $data['highclass']=$standardlist[0]->high_class;
     $data['allclass']  = $this->Ceo_District_model->getallbrachesbyschool($school_id);
     $data['overallstrength']  = count($this->Ceo_District_model->getallbrachesbyschoolinchildetail2_view($school_id));
    $this->load->view('Ceo_District/emis_district_report_school',$data);
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
    $this->load->model('Ceo_District_model');

    $data['details'] = $this->Ceo_District_model->getallstudentsbyschidreport($school_id,$class_id);
    $data['school_name'] = $this->Ceo_District_model->getsingleschoolname($school_id);
    $data['class_name'] = $this->Ceo_District_model->getsingleclassname($class_id);
    $this->load->view('Ceo_District/emis_district_report_class',$data);
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
    $this->load->model('Ceo_District_model');
	$data['transceotypes'] = $this->Ceo_District_model->trans_off_transfer($dist_id);
	$data['get_teach_type'] = $this->Statemodel->get_teacher_type();
    $data['get_dist_dtls'] = $this->Ceo_District_model->get_dist_details();
	$data['get_all_dist_dtls'] = $this->Statemodel->get_dist_details();
    $this->load->view('Ceo_District/emis_tech_trans',$data);
    // echo json_encode($data['details']);
       } else { redirect('/', 'refresh'); }

    
  }

  public function get_dist($distval){
    $get_block = $this->Ceo_District_model->get_block($distval);

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

  $get_school = $this->Ceo_District_model->get_school_rc($blck_id);
    
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
        //$get_my_cat = $this->Ceo_District_model->get_cat_cond($schl_type_tchers->teacher_type);

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

     $get_my_cat = $this->Ceo_District_model->get_cat_cond($desig_id);

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


  $get_techr = $this->Ceo_District_model->get_tchr($school_id,$tech_code);

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

  $get_distnme_only = $this->Ceo_District_model->get_dist($dist_id);

  if ($get_distnme_only) {
      $get_dist_name = '';
      foreach ($get_distnme_only as $dist_nme) {
          $get_dist_name = $dist_nme->district_name;
      }
      echo $get_dist_name;
    }


}




public function get_nme_only($tech_id){

  $get_technme_only = $this->Ceo_District_model->get_technme($tech_id);

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

  $get_school = $this->Ceo_District_model->get_school_rc($blck_id_only);

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

   $get_school_key = $this->Ceo_District_model->get_school_keyval($udise_cde);
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

  $ins_his = $this->Ceo_District_model->ins_staf_history($ins);


  $update_staff_dtls = $this->Ceo_District_model->update_staff_details($data,$upd_id);

  if ($update_staff_dtls) {
    echo true;
  }
  } else { redirect('/', 'refresh'); }

}


public function school_key($udise){

  $get_school_key = $this->Ceo_District_model->get_school_keyval($udise);
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
  $data['details']=$this->Ceo_District_model->get_techerdetails($teacher_id);
  
  $this->load->view('Ceo_District/emis_district_teacher_form',$data);
}

 public function get_school_management_data(){
    $getschooltype = $this->input->post('emis_district_report_schcate');
    $schoolmang = $this->Ceo_District_model->get_school_management_data($getschooltype);
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
  //pearlin
  public function emis_teacher_classwise_district(){
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $dist_id =$this->session->userdata('emis_district_id');
      $data['dist_id'] = $dist_id;
      //print_r($dist_id);die();

      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
    
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
      $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyteacherblock($dist_id,$school_cate);
           }
           else
           {
               $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyteacherblock($dist_id,'');
           }

      $this->load->view('Ceo_District/emis_state_teacherblockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
public function emis_teacher_classwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $block_id =$this->session->userdata('emis_districtblock_id');
      $data['block_id']=$block_id;
       $data['getsctype'] = $this->Ceo_District_model->get_school_type();
    
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
                    $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassteach($block_id,$school_cate); 
                 }
                 else
                 {
                  $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassteach($block_id,''); 
                 }
      
      //print_r($data['details']);
      //echo json_encode($data['details']);
      $this->load->view('Ceo_District/emis_state_teacherschoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
    public function emis_teacher_blockwise_district(){
        $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $this->load->library('session'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $dist_id =$this->session->userdata('emis_district_id');
       $data['dist_id']=$dist_id;
      $data['getsctype'] = $this->Statemodel->get_school_type();
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
      $data['details'] = $this->Ceo_District_model->get_teaching_staff_block($dist_id,$school_cate);
    }
    else
    {
           $data['details'] = $this->Ceo_District_model->get_teaching_staff_block($dist_id,$school_cate);
    }
      //print_r($data['details']);
      $this->load->view('Ceo_District/emis_state_teaching_blockwise',$data);
    } else { redirect('/', 'refresh'); }
  }
   public function emis_nonteaching_blockwise_district(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      
      $dist_id =$this->session->userdata('emis_district_id');
      $data['dist_id']=$dist_id;
      $data['getsctype'] = $this->Statemodel->get_school_type();
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
      $data['details'] = $this->Statemodel->get_nonteaching_staff_block($dist_id,$school_cate);
        }
       else
       {
        $data['details'] = $this->Statemodel->get_nonteaching_staff_block($dist_id,$school_cate);
       }

      $this->load->view('Ceo_District/emis_state_nonteaching_blockwise',$data);
  
    } else { redirect('/', 'refresh'); }
  }
public function emis_teaching_schoolwise_block(){
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      
      $block_id =$this->input->get('block_id');
      $data['block_id']=$block_id;
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
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
      $data['details'] = $this->Ceo_District_model->get_teaching_block_school($block_id,$school_cate); 
        }else{
     $data['details'] = $this->Ceo_District_model->get_teaching_block_school($block_id,'');
      }
      $this->load->view('Ceo_District/emis_state_teaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }
  public function emis_nonteaching_schoolwise_block(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $dist_id =$this->session->userdata('emis_district_id');
      $data['dist_id']=$dist_id;
      $block_id =$this->input->get('block_id');
      $data['block_id']=$block_id;
      $data['getsctype'] = $this->Statemodel->get_school_type();
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
      
      $data['details'] = $this->Ceo_District_model->get_nonteaching_block_school($dist_id,$block_id,$school_cate); 
        }else{
     $data['details'] = $this->Ceo_District_model->get_nonteaching_block_school($dist_id,$block_id,$school_cate);
      }
    //  print_r($data['details']);''
      //// echo json_encode($data['details']);
      $this->load->view('Ceo_District/emis_state_nonteaching_schoolwise',$data);
      
    } else { redirect('/', 'refresh'); }
  }

  public function dash_renewal(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Ceo_District_model');
     $dist_id = $this->session->userdata('emis_district_id');
      //print_r($block_id);die();
    $data['renewal']=$this->Ceo_District_model->get_state_renewal_details($dist_id);
   
      $this->load->view('Ceo_District/emis_dash_renewal',$data);
      
    } else { redirect('/', 'refresh'); }
  }
   

  public function dash_renewal_beo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Ceo_District_model');
     $dist_id = $this->session->userdata('emis_district_id');
    
     $data['renewal_pending_detail'] = $this->Ceo_District_model->get_state_renewal_pending_details($dist_id);
     // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('Ceo_District/emis_state_beo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_deo(){
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Ceo_District_model');
     $dist_id = $this->session->userdata('emis_district_id');
    
    $data['renewal_pending_detail_deo'] = $this->Ceo_District_model->get_state_deo_pending_details($dist_id);
    //print_r( $data['renewal_pending_detail_deo']);
    $this->load->view('Ceo_District/emis_state_deo_pending',$data);
 } else { redirect('/', 'refresh'); }
  }
  public function dash_renewal_ceo(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
      $this->load->library('session');
      $this->load->database();
      $this->load->model('Ceo_District_model');
     $dist_id = $this->session->userdata('emis_district_id');
    
    $data['renewal_pending_detail_ceo'] = $this->Ceo_District_model->get_state_ceo_pending_details($dist_id);
   // print_r( $data['renewal_pending_detail']);die;
    $this->load->view('Ceo_District/emis_dash_ceo_pending',$data);
  } else { redirect('/', 'refresh'); }
  }
 public function emis_student_disablity_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
      $dist_id =$this->session->userdata('emis_district_id');
      $data['allstuds'] = $this->Ceo_District_model->get_classwise_student_disability_block($dist_id);
        //print_r($data['allstuds']);
       $this->load->view('Ceo_District/emis_block_student_disability',$data);
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

      $data['allstuds'] = $this->Ceo_District_model->get_classwise_student_disability_school($block_name);
     //  print_r($data['allstuds']);
       $this->load->view('Ceo_District/emis_student_disability_schoolwise',$data);
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
   
       $dist_id =$this->session->userdata('emis_district_id');
      $data['allstuds'] = $this->Ceo_District_model->get_blockwise_RTE_student($dist_id);
    //print_r($data['allstuds']);
      $this->load->view('Ceo_District/emis_state_RTE_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $block_id =  $this->input->get('block_name');
       $dist_id =$this->session->userdata('emis_district_id');
      $data['allstuds'] = $this->Ceo_District_model->get_schoolwise_RTE_student($dist_id);
      //print_r($data['allstuds']);
      $this->load->view('Ceo_District/emis_state_RTE_schoolwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function get_RTE_school_student()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $this->load->library('session');
      $this->load->database();
      $school_id =  $this->input->get('school_id');
       $rte = $this->input->post('rte');
   
      $data['allstuds'] = $this->Ceo_District_model->get_studentwise_RTE_student($school_id,$rte);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_state_RTE_student',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_district_2019()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
       $dist_id =$this->session->userdata('emis_district_id');
      $data['allstuds'] = $this->Ceo_District_model->get_blockwise_RTE_student_2019($dist_id);
    //print_r($data['allstuds']);
      $this->load->view('Ceo_District/emis_state_RTE_blockwise_2019',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school_2019()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $dist_id =$this->session->userdata('emis_district_id');
      $block_id =  $this->input->get('block_name');
      $data['allstuds'] = $this->Ceo_District_model->get_schoolwise_RTE_student_2019($dist_id);
      //print_r($data['allstuds']);
      $this->load->view('Ceo_District/emis_state_RTE_schoolwise_2019',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function get_RTE_school_student_2019()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $this->load->library('session');
      $this->load->database();
      $school_id =  $this->input->get('school_id');
       $rte = $this->input->post('rte');
   
      $data['allstuds'] = $this->Ceo_District_model->get_studentwise_RTE_student_2019($school_id,$rte);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_state_RTE_student_2019',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function emis_Ceo_District_2018()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // $this->emis_Ceo_District_dash();die;
      $dist_id = $this->session->userdata('emis_district_id');

      $district_details = $this->Ceo_District_model->get_districtName($dist_id);
      // print_r($district_details); 
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      // print_r($this->input->post());die;
      // $manage = $this->session->userdata('emis_districtreport_schmanage');

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;
      $data['details'] = $district_details;
      if(!empty($manage)){
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district_2018($district_details->district_name,$manage,$school_cate);
     //print_r($data['details']);
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_district_2018($district_details->district_name,'','');
    }

      $data['distname'] = $district_details->district_name;
    $this->load->view('Ceo_District/emis_district_student_report_2018',$data);
    } else { redirect('/', 'refresh'); }
  }
  public function get_dash_blockwise_school_2018()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
      $data['dist'] = $this->session->userdata('emis_district_id');

      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      


      if(!empty($manage)){

      $data['details'] = $this->Ceo_District_model->get_blockwise_school_2018($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_blockwise_school_2018($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('Ceo_District/emis_state_dash_schoolwise_2018',$data);
      } else { redirect('/', 'refresh'); }
  }
 public function dash_renewal_rejected(){
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'] ;

    $data['renewal_rejected'] = $this->Ceo_District_model->get_renewal_rejected($dist_id);
  // print_r( $data['renewal_rejected']);
    $this->load->view('Ceo_District/emis_state_renew_rejected',$data);
      } else { redirect('/', 'refresh'); }
 }
 public function get_block_migration()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'] ;

      $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->get_blk_student_migration($dist_id)),true);
   //print_r($data['student_migration_details']);
       $result = array();$key='block_name';
	   
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                                                                     //  print_r($result) ;die();            
      //print_r( $data['teacher_tot'][1]);
       $data['student_migration_details']=$result;

  // print_r($dist_id);
     // $data['student_migration_details'] = $this->Ceo_District_model->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_student_migration_block',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function get_OSC_List()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'] ;

      $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->get_OSC_List($dist_id)),true);
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
    $this->load->view('Ceo_District/get_OSC_List',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_OSC_List_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $block_id=$this->input->get('block_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->get_OSC_List_school($block_id)),true);
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
    $this->load->view('Ceo_District/get_OSC_List_school',$data);
  } else { redirect('/', 'refresh'); }

} 

public function students_osc()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $school_id=$this->input->get('school_id');
  $data['student_osc'] = $this->Ceo_District_model->students_osc_reg($school_id);
   
    $this->load->view('Ceo_District/students_osc_reg',$data);
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
  $block_id=$this->input->get('block_id');
  $data['student_migration_details'] = $this->Ceo_District_model->get_school_student_migration($block_id);
   
    $this->load->view('Ceo_District/emis_student_migration_school',$data);
  } else { redirect('/', 'refresh'); }

} 

public function get_block_migration_reason()
{

       $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'] ;

      $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->get_blk_student_migration_reason($dist_id)),true);
   //print_r($data['student_migration_details']);
       $result = array();$key='block_name';
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                                                                     //  print_r($result) ;die();            
      //print_r( $data['teacher_tot'][1]);
       $data['student_migration_details']=$result;
  // print_r($dist_id);
     // $data['student_migration_details'] = $this->Ceo_District_model->get_blk_student_migration($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_student_migration_block_reason',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_school_migration_reason()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
              $block_id=$this->input->get('block_id');

//print_r($block_id);die();
  $data['student_migration_details'] = $this->Ceo_District_model->get_school_student_migration_reason($block_id);
   
    $this->load->view('Ceo_District/emis_student_migration_school_reason',$data);
  } else { redirect('/', 'refresh'); }

} 


public function get_district_migration_details()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'];

      $data['student_migration_details'] = $this->Ceo_District_model->get_dist_student_migration_details($dist_id);
     // print_r($data['student_migration_details']);
    $this->load->view('Ceo_District/emis_student_migration_details',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_migration_detail_student()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $data['dist_id'] = $this->session->userdata('emis_district_id');
     $dist_id=$data['dist_id'];
              $school_type_from=$this->input->get('school_type_from');

             $school_type_to=$this->input->get('school_type_to');

      $data['student_migration_details'] = $this->Ceo_District_model->get_migration_detail_student($dist_id,$school_type_from,$school_type_to);

              

    $this->load->view('Ceo_District/emis_migration_detail_student',$data);
  } else { redirect('/', 'refresh'); }

} 
 
 /************************ End **************************************/
 
 /* created by venba Tamilmaran for listing the school*/
         /*************************************
           * 29/04/2020 *
           ***********************************/                                 
	public function emis_district_schools_list()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) {
      $sch_cate=$this->input->post('schoolcat');
      $district_id =$this->session->userdata('emis_district_id');
	 // print_r($district_id);
      $district_details = $this->Ceo_District_model->get_districtName($district_id);
      $dist_id = $district_details->district_name;
		
		
	  /* created by  tamilbala for location_details */
        $data['district'] = $district_details;
		$data['block'] = $this->Ceo_District_model->get_block($district_id);
		$data['local_bodyall'] =$this->Ceo_District_model->get_localBodyall($district_id);
		$data['local_body'] =$this->Ceo_District_model->get_localBody($district_id);
		$data['edu_dist'] =$this->Ceo_District_model->get_edudist($district_id);
		//$data['hapitation'] =$this->Ceo_District_model->get_hapitation();
		$data['muncipality'] =$this->Ceo_District_model->get_muncipality($district_id);
		$data['cluster'] =$this->Ceo_District_model->get_cluster();
		$data['parliament'] =$this->Ceo_District_model->get_parliament($district_id);
		$data['assembly'] =$this->Ceo_District_model->get_assembly($district_id);
		$data['city'] =$this->Ceo_District_model->get_city($district_id);
		
     /*	 End of location Details  */
	   $data['schoollist'] = $this->Ceo_District_model->get_school_list_district_cate($district_id,$sch_cate);
	   $data['schoolcate']= $this->Ceo_District_model->get_allmajorcategory(); 
	   $data['schoolmanagement']= $this->Ceo_District_model->get_subcategoryname(); 
	   $data['schooldepartment']= $this->Ceo_District_model->get_alldeptcategory();
       $data['minority_list'] = $this->Homemodel->get_common_table_details('schoolnew_minority');
       $data['category'] = $this->Homemodel->get_common_table_details('schoolnew_category');
       $data['resitype'] = $this->Homemodel->get_common_table_details('schoolnew_resitype');
       $where = array('district_id'=>$district_id);
       $select = array('edu_dist_id','edu_dist_name');
      $group = 'edu_dist_id';
     $data['edu_dist_details'] = $this->Ceo_District_model->get_common_select_tables($select,'students_school_child_count',$where,$group);

     // print_r($data['edu_dist_details']);die;
     
     $this->load->view('Ceo_District/emis_district_schoollist',$data);
    
   }
   else { redirect('/', 'refresh'); }
  }  
/* End of the function */
  /**
    * Get Dropdown 
    * VIT-Tamilbala
    * 06/05/2019
    **/

  public function get_drop_list()
  {
      $table = $this->input->post('table');
      $select = $this->input->post('select');
      $where = $this->input->post('where');
      $group = $this->input->post('group');
      $data = $this->Ceo_District_model->get_common_select_tables($select,$table,$where,$group);
      echo json_encode($data);
  }
   public function get_habitation_list()
  {
      $localbody_id = $this->input->post('id');
      $data = $this->Ceo_District_model->get_hapitation($localbody_id);
      echo json_encode($data);
  }
/* created by venba Tamilmaran for Update the school*/
    public function emis_district_schools_update()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	$emis_user_id = $this->session->userdata('emis_user_id');
    if($emis_loggedin) {
	  
	  
      $save['yr_estd_schl'] = $this->input->post('establishment');
      $save['yr_recgn_first'] = $this->input->post('recognization');
      $save['yr_rec_schl_elem'] = $this->input->post('primary');
      $save['yr_rec_schl_sec'] = $this->input->post('secondary');
      $save['yr_rec_schl_hsc'] = $this->input->post('highersecondary');
      $save['upgrad_prito_uprpri'] = $this->input->post('prim_to_upprim');
      $save['upgrad_uprprito_sec'] = $this->input->post('upprim_to_sec');
      $save['upgrad_secto_higsec'] = $this->input->post('sec_to_hs');
      $save['spl_edtor'] = $this->input->post('spe_educator');
	  $save['latitude'] = $this->input->post('emis_reg_sch_Latitude');
      $save['longitude'] = $this->input->post('emis_reg_sch_Longitude');
	  
      $save['curr_stat']	    = $this->input->post('s_status');
      $save['curstat_date']	= $this->input->post('date_id');	
	  $save['district_id']	= $this->input->post('district');
	  $save['urbanrural'] 	= $this->input->post('urban_rural');
	  $save['local_body_id']	= $this->input->post('local_body');
	  $save['lb_vill_town_muni']	= $this->input->post('ward_number');
	  $save['cluster_id']	=  $this->input->post('cluster');
	  $save['panchayat_id']	=  $this->input->post('panchayat_id');
	  $save['lb_habitation_id']	= $this->input->post('habitation');
	  $save['assembly_id']	=  $this->input->post('assembly');
	  $save['parliament_id']	=  $this->input->post('parliamentary');
	  $save['municipal_id']	= $this->input->post('local_bodyall');
	  $save['city_id']	=  $this->input->post('city');
	  $save['pincode']	=  $this->input->post('pincode');
	  $save['address']	=  $this->input->post('address');
      $save['school_id'] = $this->input->post('school_id');
	  $save['school_type'] = $this->input->post('emis_reg_sch_type');
      $save['school_name'] = $this->input->post('emis_reg_sch_name');
      $save['manage_cate_id'] = $this->input->post('emis_reg_sch_manage_cate');
      $save['sch_management_id'] = $this->input->post('emis_reg_sch_manage');
      $save['sch_mail'] = $this->input->post('emis_reg_sch_email');
      $save['sch_directorate_id'] = $this->input->post('emis_reg_sch_department');
      $save['rte'] = $this->input->post('emis_reg_sch_rte');
      $save['minority'] = $this->input->post('emis_reg_sch_minority');
      $save['updation_user_id'] = $emis_user_id;
     
      $save['high_class'] = $this->input->post('emis_reg_sch_high');
      $save['low_class'] = $this->input->post('emis_reg_sch_low');
      $save['renewal_valid'] = $this->input->post('emis_reg_sch_valid_upto');
      $save['last_renewal'] = $this->input->post('emis_reg_sch_renewal');
      $save['certi_no'] = $this->input->post('emis_reg_sch_renewal_no');
      $save['schl_situated'] = $this->input->post('hill_frst');
      $save['resid_scl'] = $this->input->post('emis_reg_sch_residential');
      $save['resid_type'] = $this->input->post('emis_reg_sch_residential_type');
      $save['angan'] = $this->input->post('emis_reg_sch_anganwadi');
      $save['angan_code'] = $this->input->post('emis_reg_sch_anganwadi');
      $save['anagan_wrks'] = $this->input->post('emis_reg_sch_workers');
      $save['anganwadi_stu_b'] = $this->input->post('boys');
	  $save['anganwadi_stu_g'] = $this->input->post('girls');
      $save['schl_shift'] = $this->input->post('emis_reg_sch_shift');
      $save['schl_cwsn'] = $this->input->post('emis_reg_sch_cwsn');
      $save['curr_stat'] = $this->input->post('s_status');
      $save['block_id'] =  $this->input->post('emis_reg_sch_block_id');
      $save['edu_dist_id'] = $this->input->post('emis_reg_sch_edu_id');
      $save['sch_cate_id'] = $this->input->post('emis_reg_sch_category');
      $save['sch_shortname'] = $this->input->post('emis_reg_sch_short_name');
      $save['minority_group'] = $this->input->post('emis_reg_sch_minority_group');
	  $save['ceo_comments'] = $this->input->post('ceo_comments');
	  $save['ceo_date']=date("Y-m-d");
	  $save['app_status'] =0;
	  //print_r($save);
	  //die();
      // if($ace_data)
      // {
        $his_data = $this->Ceo_District_model->insert_school_district_data($save);
		/* update status basic info */
		 //$updatebasic['app_status'] =0;
		 //$where = array('school_id'=>$save['school_id']);
		 //$basic_table='schoolnew_basicinfo';
         //$basic_data = $this->Ceo_District_model->update_appstatus_basicinfo($basic_table,$updatebasic,$where);
        /* end */

      $message = "Successfully Updated School ".$save['school_name'];

      $this->session->set_flashdata('success',$message );
        redirect('Ceo_District/emis_district_schools_list');

		 }
		 else { redirect('/', 'refresh'); }	
   }
 public function emis_school_unrecognized_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Ceo_District_model->get_school_unrecognized_block($district_id);
      // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_school_unrecognized_block',$data);
  } else { redirect('/', 'refresh'); }

} 
 
 public function emis_school_unrecognized_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_unrecognized_details'] = $this->Ceo_District_model->get_school_unrecognized_school($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_school_unrecognized_school',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
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
      $data['school_profile_verification'] = $this->Ceo_District_model->get_school_profile_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
            $data['school_profile_verification'] = $this->Ceo_District_model->get_school_profile_verification_district($district_id,$manage,$school_cate);
      // print_r($data['school_profile_verification']);die();
    }
    $this->load->view('Ceo_District/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
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
   
      $data['school_land_verification'] = $this->Ceo_District_model->get_school_land_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
       $data['school_land_verification'] = $this->Ceo_District_model->get_school_land_verification_district($district_id,$manage,$school_cate);
    }
    $this->load->view('Ceo_District/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Ceo_District_model->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Ceo_District_model->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('Ceo_District/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Ceo_District_model->get_school_committee_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Ceo_District_model->get_school_committee_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('Ceo_District/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schoolwise_class_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_district_id');
	
      $data['school_details'] = $this->Ceo_District_model->get_dist_school_details($district_id);
	  //print_r($data['school_details']);
      $this->load->view('Ceo_District/emis_district_schoolwise_class_section',$data);
      }else { redirect('/', 'refresh'); }

  
  }
   public function schoolwise_class_timetable_report_blk()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     $district_id =$this->session->userdata('emis_district_id');
    
    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);

        $this_week_ed = date("Y-m-d",$sunday);
        
          $data['getsctype'] = $this->Ceo_District_model->get_school_type();
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
       $data['school_timetable_details'] = $this->Ceo_District_model->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
      }
      else
      {
        $data['school_timetable_details'] = $this->Ceo_District_model->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
          //  print_r($data['teacherdistrictdetails']);die();
      }
        $data['this_week_fst']= $this_week_fst; 
        $data['this_week_ed']= $this_week_ed;
     // $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($this_week_fst,$this_week_ed);
   // print_r($data['school_timetable_details']);
      $this->load->view('Ceo_District/emis_district_schoolwise_timetable_blk',$data);
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
            $data['getsctype'] = $this->Ceo_District_model->get_school_type();
    
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
        $data['school_timetable_details'] = $this->Ceo_District_model->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
    else
    {
      $data['school_timetable_details'] = $this->Ceo_District_model->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
       $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
   // print_r($data['school_timetable_details']);
      $this->load->view('Ceo_District/emis_district_schoolwise_timetable',$data);
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
      $data['school_class_section_timetable'] = $this->Ceo_District_model->get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed);
	    $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
      $this->load->view('Ceo_District/emis_district_school_section_timetable',$data);
    }else { redirect('/', 'refresh');}
	  
  }
  public function school_period_count_timetable()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	  $class_section=$_GET['classsection'];
	  $classsection=(explode("-",$class_section));
	  $class=$classsection[0];
	  $section=$classsection[1];
	  $school_id=$_GET['schoolid'];
	 
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_section_timetable_count'] = $this->Ceo_District_model->get_section_period_count($school_id,$class,$section);
	  
      $this->load->view('Ceo_District/emis_section_period_count_timetable',$data);
    }else { redirect('/', 'refresh');}
	  
  }
  public function schoolwise_higher_class_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_district_id');
	
      $data['school_details'] = $this->Ceo_District_model->get_dist_high_school_details($district_id);
	  //print_r($data['school_details']);
      $this->load->view('Ceo_District/emis_district_schoolwise_higher_class_section',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function schoolwise_special_cash()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_district_id');
      $data['school_cash_details'] = $this->Ceo_District_model->get_dist_special_cash($district_id);
	  //print_r($data['school_cash_details']);
      $this->load->view('Ceo_District/emis_district_schoolwise_special_cash',$data);
      }else { redirect('/', 'refresh'); }

  }
  
  public function school_class_section()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	 $school_id=$_GET['schoolid'];
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_class_details'] = $this->Ceo_District_model->get_school_class_details($school_id);
      $this->load->view('Ceo_District/emis_district_schoo_all_sections',$data);
    }else { redirect('/', 'refresh');}
	  
  }
  public function school_higher_class_section()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	 $school_id=$_GET['schoolid'];
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_class_details'] = $this->Ceo_District_model->get_school_class_details($school_id);
      $this->load->view('Ceo_District/emis_district_schoo_all_higher_sections',$data);
    }else { redirect('/', 'refresh');}
	  
  }
  
  
  /***************************************************
        Function done by Ramco Magesh 23-04-2019
  ****************************************************/
  
  public function school_lab_details() {
        $this->load->library('session');
            
            if($this->session->userdata('emis_district_id')!=null){
                $where = " WHERE district_id=".$this->session->userdata('emis_district_id')."";
                $group = " GROUP BY school_id";
                
            }
            $data['lablist']=$this->Datamodel->getLablist();
            $data['labentry'] = $this->Ceo_District_model->school_labdetails_district($where,$group);
        $this->load->view('Ceo_District/school_labdetails_district',$data);
    }
    
  /***************************************************
  ***************************************************/
  public function get_dee_district()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id =$this->session->userdata('emis_district_id');
    $data['dist_id'] = $dist_id;

      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
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
                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;


      if(!empty($manage)){
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dee($dist_id,$manage,$school_cate);
 
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dee( $dist_id,'','');
 
    }
   
      $data['dist'] =$dist_id;
      $this->load->view('Ceo_District/emis_ceo_dee_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
     public function get_dash_blockwise_dee()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] = $this->input->get('dist');

      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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

      $data['details'] = $this->Ceo_District_model->get_blockwise_dee($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_blockwise_dee($block_name,$manage,$school_cate);

    }

  
      // print_r($data);
      $this->load->view('Ceo_District/emis_ceo_dee_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }
 public function get_dse_district()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id = $this->session->userdata('emis_district_id');
      $data['dist_id'] = $dist_id;
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dse($dist_id,$manage,$school_cate);
 
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dse( $dist_id,'','');
 
    }
   
      $data['dist'] =$dist_id;
      $this->load->view('Ceo_District/emis_ceo_dse_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function get_dash_blockwise_dse()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] = $this->input->get('dist');

      $block_name = $this->input->get('block');

      $data['block_name'] = $block_name;

      //$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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

      $data['details'] = $this->Ceo_District_model->get_blockwise_dse($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->get_blockwise_dse($block_name,$manage,$school_cate);

    }

      // print_r($data);
      $this->load->view('Ceo_District/emis_ceo_dse_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }
    public function get_dms_district()
  {
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id = $this->session->userdata('emis_district_id');
      $data['dist_id'] = $dist_id;
     // $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

     // $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

      if(!empty($school_cate)){
                        $result = Common::session_search_filter('',$school_cate,1);
                  }else
                  {
                        $result = Common::session_search_filter('','',0);
                       // $manage = $result['manage'];
                        $school_cate = $result['school_cate'];
                  }
                  // print_r($result);
               //  $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

      if(!empty($school_cate)){
                $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dms($dist_id,$school_cate);  
    
       }
      else
 {
     $data['details'] = $this->Ceo_District_model->get_emis_blockwise_dms($dist_id,$school_cate);
  
 }
   
      $this->load->view('Ceo_District/emis_ceo_dms_blockwise',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
   public function get_dash_blockwise_dms()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data['dist'] = $this->input->get('dist');

      $block_name = $this->input->get('block');
 $data['block_name'] = $block_name;
      // $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      //$manage = $this->input->post('school_manage');
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
      if(!empty($school_cate))
      {
      $data['details'] = $this->Ceo_District_model->get_blockwise_dms($block_name,$school_cate);
     }
     else
     {
       $data['details'] = $this->Ceo_District_model->get_blockwise_dms('','');
     }
  
      $this->load->view('Ceo_District/emis_ceo_dms_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
  }
  public function aadhar_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     
    $districtid = $this->session->userdata('emis_district_id');
        $data['aadhar_school_details'] = $this->Ceo_District_model->aadhar_school_distic_based_count_details($districtid);
  
      $this->load->view('Ceo_District/emis_aadhar_school_based_count_details',$data);
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
   
    $data['aadhar_schoolbase_details'] = $this->Ceo_District_model->aadhar_school_base_count_details($school_id);
	
      $this->load->view('Ceo_District/emis_aadhar_school_count_details',$data);
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
		   $data['notinaadhar_schoolbase_details'] = $this->Ceo_District_model->
		   notin_aadhar_school_base_count_details($school_id);
            $this->load->view('Ceo_District/emis_notin_aadhar_school_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
  public function emis_teacher_classwise_surplus_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$dist_id = $this->session->userdata('emis_district_id');
		    $data['dist_id'] = $dist_id;
      $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyteacherblock_surplus($dist_id);
   	$this->load->view('Ceo_District/emis_district_surplus_teacher',$data);
		} else { redirect('/', 'refresh'); }
	}
	public function emis_teacher_surplus_classwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			
			$block_id =$this->input->get('block_id');
			  $data['block_id'] = $block_id;

    
        $data['details'] = $this->Ceo_District_model->getalldistrictcountsbyclassteach_surplus($block_id);
      	
			$this->load->view('Ceo_District/emis_district_block_surplus_teacher',$data);
			
		} else { redirect('/', 'refresh'); }
	}
  
  //noonmeal district school count Report by Raju
   public function meal_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
		   $districtid =$this->session->userdata('emis_district_id');
		   $data['meal_school_details'] = $this->Ceo_District_model->meal_school_distic_based_count_details($districtid);
		  $this->load->view('Ceo_District/meal_school_distic_based_count_details',$data);
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
		   $data['meal_school_eligible_stud_count'] = $this->Ceo_District_model->
		   meal_school_eligible_stud_count_details($school_id);
            $this->load->view('Ceo_District/emis_meal_school_eligible_stud_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
  
    public function emis_dist_school_prekg_student_joined()
	{
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			// $districtid=$_GET['id'];
			 $districtid =$this->session->userdata('emis_district_id');
		
		$data['stud_school_admission_count']=$this->Ceo_District_model->emis_dist_school_prekg_student_joined($districtid);
				$this->load->view('Ceo_District/emis_dist_school_prekg_student_joined',$data);
			
		} else { redirect('/', 'refresh'); }
		
	}
	
	//staff districtwise count 
	public function emis_staff_district_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {
				$data['staff_district_details'] = $this->Ceo_District_model->emis_staff_district_count_details();
			   $this->load->view('Ceo_District/emis_staff_district_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	//staff district schoolwise count
	public function emis_staff_district_school_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            $districtid =$this->session->userdata('emis_district_id');
				$data['staff_district_school_details'] = $this->Ceo_District_model->emis_staff_district_school_count_details($districtid);
			    $this->load->view('Ceo_District/emis_staff_district_school_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	// public function emis_staff_school_count_details()
	// {
		  // $this->load->library('session');
		  // $emis_loggedin = $this->session->userdata('emis_loggedin');
		  // if($emis_loggedin) 
		  // {       
	             // $school_id=$_GET['schoolid'];
				// $data['staff_school_details'] = $this->Ceo_District_model->emis_staff_school_count_details($school_id);
			    // $this->load->view('Ceo_District/emis_staff_school_count_details',$data);
		  // }else { redirect('/', 'refresh'); }
	// }
	
	public function emis_district_staff_data()
	{
		$school_id=$this->input->post('school_id');
				 // echo $school_id;
				 
				$staff_school_details = $this->Ceo_District_model->emis_staff_school_count_details($school_id);
				echo json_encode($staff_school_details);
	} 
	public function get_emis_state_school_building_school()
 	{
 		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      		 // $dist_id = $this->input->get('dist');
			  $dist_id  =$this->session->userdata('emis_district_id');
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
      		$data['school_details'] = $this->Ceo_District_model->get_schoolwise_building_details($dist_id,$block_filter);

      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
      	$data['dist_id'] = $dist_id;
      	$data['block_filter_data'] = $filter;
      	$this->load->view('Ceo_District/emis_state_bd_schoolwise',$data);

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
				$districtid  =$this->session->userdata('emis_district_id');
				$data['staff_stud_dist_school_details'] = $this->Ceo_District_model->emis_staff_stud_dist_school_details($districtid);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_stud_dist_school_details',$data); 
			}
	}
	
	
    public function emis_staff_fixa_report_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $district_id  =$this->session->userdata('emis_district_id');
      // print_r($district_id);
        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_block($district_id); 
       //print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_school_report_block',$data); 
      }
  }
   public function emis_staff_fixa_report_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $block_id=$this->input->get('block_id');
        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_school($block_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_school_report_school',$data); 
      }
  }
    public function emis_staff_fixa_report_PG_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
     $district_id  =$this->session->userdata('emis_district_id');
        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_PG_block($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_report_PG_block',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $district_id= $this->session->userdata('emis_district_id');
        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_PG_school($district_id); 
       // print_r($data['staff_fixa_report']);die;
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_report_PG_school',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_block1()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $district_id=$this->session->userdata('emis_district_id');

        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_PG_block1($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_report_PG_block1',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_school1()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
       $dist_id=$this->session->userdata('emis_district_id');
        $data['staff_fixa_report'] = $this->Ceo_District_model->staff_fixa_report_PG_school1($dist_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_fixa_report_PG_school1',$data); 
      }
  }
  
  	////staffs fixation summary by raju
		public function emis_staff_fixa_tot_school_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				  $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_fixa'] = $this->Ceo_District_model->emis_staff_fixa_tot_school_details($dist_id);
				$data['staff_eli'] = $this->Ceo_District_model->staff_eligible($dist_id);
				$data['staff_sanct'] =  $this->Ceo_District_model->staff_sanct($dist_id);
				$data['staff_avail'] = $this->Ceo_District_model->staff_avail($dist_id);
				$data['staff_need'] = $this->Ceo_District_model->staff_need($dist_id);
				$data['staff_surpwith'] = $this->Ceo_District_model->staff_surpwith($dist_id); 
			    $data['staff_surpwithout'] = $this->Ceo_District_model->staff_surpwithout($dist_id);
				
				//print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_fixa_tot_school_details',$data);
 				
			}
	}
	public function emis_staff_eligiblepost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_eligiblepost'] = $this->Ceo_District_model->emis_staff_eligiblepost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_eligiblepost',$data); 
			}
	}
	
	public function emis_staff_sanctionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_sanctpost'] = $this->Ceo_District_model->emis_staff_sanctionpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_sanctionpost',$data); 
			}
	}
	public function emis_staff_availpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_availpost'] = $this->Ceo_District_model->emis_staff_availpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_availpost',$data); 
			}
	}
	public function emis_staff_needpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_needpost'] = $this->Ceo_District_model->emis_staff_needpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_needpost',$data); 
			}
	}
	public function emis_staff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_surpwithpost'] = $this->Ceo_District_model->emis_staff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_surpwithpost',$data); 
			}
	}
	public function emis_staff_surpwithoutpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['staff_surpwithoutpost'] = $this->Ceo_District_model->emis_staff_surpwithoutpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_surpwithoutpost',$data); 
			}
  	}
    // transfor district list dee school
	
	public function emis_staffcount_district_school_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            
	            $districtid =$this->session->userdata('emis_district_id');
				$data['emis_staffcount_district_school'] = $this->Ceo_District_model->emis_staffcount_district_school_details($districtid);
			    $this->load->view('Ceo_District/emis_staffcount_district_school_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
  public function emis_staffcount_district_school_details_brte()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
              
              $districtid =$this->session->userdata('emis_district_id');
        $data['emis_staffcount_district_school'] = $this->Ceo_District_model->emis_staffcount_district_school_details($districtid);
          $this->load->view('Ceo_District/emis_staffcount_district_school_details_brte',$data);
      }else { redirect('/', 'refresh'); }
  }
	// transfor district list dse school 
	public function emis_dsestaffcount_district_school_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            $districtid =$this->session->userdata('emis_district_id');
				$data['emis_desstaffcount_district_school'] = $this->Ceo_District_model->emis_dsestaffcount_district_school_details($districtid);
			    $this->load->view('Ceo_District/emis_dsestaffcount_district_school_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	
	 public function emis_govstaff_school_details()
	
	{
		
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	       $school_id=$this->input->get('schoolid');
				  // echo $school_id;
				  
			
	        
			// $data['staff_school']=$this->Ceo_District_model->emis_govstaff_school();
			
	   $data['govstaff_school_details'] = $this->Ceo_District_model->emis_govstaff_school_details($school_id);
			
			$data['dist_id']=$this->Ceo_District_model->dist_id();
			
			$data['panel_type']=$this->Ceo_District_model->teacher_panel_type();
			
			$data['teacher_join_reason']=$this->Ceo_District_model->teacher_join_reason();
			$data['teacher_trans_priority']=$this->Ceo_District_model->teacher_trans_priority();
				
		  $this->load->view('Ceo_District/emis_govstaff_school_details',$data);
		  }else { redirect('/', 'refresh'); }
	} 
  public function emis_govstaff_school_details_brte()
  
  {
    
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {   
         $school_id=$this->input->get('schoolid');
          // echo $school_id;
          
      
          
      // $data['staff_school']=$this->Ceo_District_model->emis_govstaff_school();
      
     $data['govstaff_school_details'] = $this->Ceo_District_model->emis_govstaff_school_details($school_id);
      
      $data['dist_id']=$this->Ceo_District_model->dist_id();
      
      $data['panel_type']=$this->Ceo_District_model->teacher_panel_type();
      
      $data['teacher_join_reason']=$this->Ceo_District_model->teacher_join_reason();
      $data['teacher_trans_priority']=$this->Ceo_District_model->teacher_trans_priority();
        
      $this->load->view('Ceo_District/emis_govstaff_school_details_brte',$data);
      }else { redirect('/', 'refresh'); }
  } 
	
	 public function dseemis_govstaff_school_details()
	
	{
		
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	       $school_id=$this->input->get('schoolid');
				  // echo $school_id;
				  
			
	        
			// $data['staff_school']=$this->Ceo_District_model->emis_govstaff_school();
			
	         $data['govstaff_school_details'] = $this->Ceo_District_model->emis_govstaff_school_details($school_id);
			$data['dist_id']=$this->Ceo_District_model->dist_id();
			 //print_r($data['dist_id']); die();
			$data['teacher_join_reason']=$this->Ceo_District_model->teacher_join_reason();
			$data['teacher_trans_priority']=$this->Ceo_District_model->teacher_trans_priority();
			
				
		  $this->load->view('Ceo_District/emis_dsegovstaff_school_details',$data);
		  }else { redirect('/', 'refresh'); }
	} 
	
	
	public function get_dynamic_school_details()
	{
		$sch_id = $this->input->post('school_id');
		$flag = $this->input->post('flag');
		// $select = 'school_name,school_id,udise_code';
		// $table = 'students_school_child_count';
		// echo $flag;
		if($sch_id !=''){
		$school = $this->Ceo_District_model->schoolchange($flag,$sch_id);
		// print_r($school); die();
		echo json_encode($school);
		}
		
	}
	// public function get_dsedynamic_school_details()
	// {
		// $sch_id = $this->input->post('school_id');
		// $flag = $this->input->post('flag');
		// // $select = 'school_name,school_id,udise_code';
		// // $table = 'students_school_child_count';
		
		// if($sch_id !=''){
		// $school = $this->Ceo_District_model->dseschoolchange($flag,$sch_id);
		// echo json_encode($school);
		// }
		
	// }
	
	public function staffs_transfers()
	{
	 $dists =$this->input->post('transfer_location');
	 $dist = implode(",",$dists);
	  //print_r($dist);
	 // die();
	 $dist_school =$this->input->post('sschool');
     // $dist_school = implode(",",$dist_schools);
    
	$appointed_subject = $this->input->post('appointed_subject');
 
	 
		 $teacher_id =$this->input->post('teacher_code');
		 $school_key_id = $this->input->post('school_id');
		 $school_type = $this->input->post('school_type');
		 $transfer_reason = $this->input->post('trans_stu');
		 $school_medium = $this->input->post('school_medium');
		 $name = $this->input->post('teachername');
		 $dob1 = $this->input->post('Staffdob');
		  $dob =($dob1 !=''?date('Y-m-d',strtotime( $dob1)):'');
		 $subject = $this->input->post('subject');
		 $desgnation = $this->input->post('designation');
		 $gender = $this->input->post('gender');
		
		
		 $mobile = $this->input->post('phoneno');
		 $edu_dist = $this->input->post('edist');
		 $doj_pr1 = $this->input->post('fdjoin');
		 $doj_pr =($doj_pr1 !=''?date('Y-m-d',strtotime( $doj_pr1)):'');
		 $doj_pr_schol1 = $this->input->post('soffice');
		 $doj_pr_schol =($doj_pr_schol1 !=''?date('Y-m-d',strtotime( $doj_pr_schol1)):'');
		 
		 $date_retirements = $this->input->post('datereq');
		 $date_retirement = ($date_retirements !=''?date('Y-m-d', strtotime($date_retirements)):''); 
		 
		 $redist = $this->input->post('redist');
		 $fdregulsr = $this->input->post('fdregulsr');
		 // $soffice = $this->input->post('soffice');
		 $address = $this->input->post('praddress');
		 $priority_claimed = $this->input->post('pic');
		 
		 $transfer_location =$this->input->post('chagedistname');
		 $transfer =$this->input->post('transfer');
		  $panel_type =$this->input->post('panel_type');
		 $block =$this->input->post('block');
		 $school_name =$this->input->post('school_name');
		 $transfer_school_edu_dist_id =$this->input->post('transedndistrict_id');
		 //$transfer_school_block_id =$this->input->post('');
		 $transfer_school_id =$this->input->post('transschool_id');
		 $join_reason =$this->input->post('jpschool');
		 $spouse_death_dates=$this->input->post('dod');
         $spouse_death_date =($spouse_death_dates ==''? '':date('Y-m-d',strtotime($spouse_death_dates))); 
	
         $kidney_treat_dates = $this->input->post('dot');
		  $kidney_treat_date =($kidney_treat_dates !=''?date('Y-m-d',strtotime( $kidney_treat_dates)):''); 
		   
		 $spouse_district =$this->input->post('distemp');
		 $spouse_distance =$this->input->post('distkg'); 
		 $transfer_school_dist_id =$this->input->post('transdistrict_id');
		 
		 // 'surplus'=>, 'approve, pdf_file, created_at, updated_date
		// $school_medium = $this->input->post('school_medium');
		 
		 
		 
		  $data = array(
		  'school_key_id' =>$school_key_id, 
		  'teacher_id' =>$teacher_id, 
		  'school_type' => $dist_school,
		  'transfer_location'=>$dist,
		  'medium'=>$school_medium,
		  // 'transfer_location'=> $transfer_location, 
		  'name'=> $name, 
		  'gender'=>$gender,
		  'dob'=> $dob, 
		  'date_retirement'=>$date_retirement,
		  'mobile'=>$mobile, 
		  'desgnation'=>$desgnation ,
		  'subject'=> $subject , 
		  'block'=>$block,
		  'edu_dist'=> $edu_dist,
		  'district'=>$redist,
		  'doj_pr'=>$doj_pr,
		  'doj_pr_schol'=> $doj_pr_schol,
		  'join_reason'=>$join_reason, 
		  'school_name'=> $school_name,
		  'address'=> $address, 
		  'transfer_reason'=>$transfer_reason, 
		  'priority_claimed'=> $priority_claimed ,
		  'spouse_death_date'=> $spouse_death_date, 
		  'kidney_treat_date'=>$kidney_treat_date,
		  'spouse_district'=> $spouse_district, 
		  'spouse_distance'=>$spouse_distance, 
		  'transfer_school_dist_id'=>$transfer_school_dist_id, 
		  'transfer_school_edu_dist_id'=>$transfer_school_edu_dist_id, 'transfer_school_block_id'=>$block, 
		  'transfer_school_id'=> $transfer_school_id,
		 
		  'transfer'=>$transfer,
		  'panel_type'=>$panel_type);
		 
	
		  // print_r($data);
		  // die();
		 
		 
		   $transfor_data = $this->Ceo_District_model->insert_transfordata($data);
		   
		  
	  
		echo json_encode($transfor_data);
		
		die;
	}
	// public function sur_plus()
	// {
		// $sur_plus =$this->input->post('surplus');
		// // print_r(sur_plus);
		
		// $name = $sur_plus['techcode']; 
		
		// // if($surplus['sur'] == "on")
		// // {
			// // $surplus =0;
			
		// // }
		// // else{
			// // $surplus =1;
		// // }
		
		
		// // $data = array(
		 // // 'teacher_id' =>$name,
		 // // 'surplus'=>$surplus
		// // );
		
		// print_r($sur_plus);
		// die();
		// $transfor_data = $this->Ceo_District_model->insert_surplus($data);
		// echo json_encode($transfor_data);
		
		// die;
		
	// }
	public function staffs_transfer()
	{
	 $dists =$this->input->post('transfer_location');
	 $dist = implode(",",$dists);
	 
	 $dist_schools =$this->input->post('sschool');
     $dist_school = implode(",",$dist_schools);
    
	$appointed_subject = $this->input->post('appointed_subject');
 
	 
		 $teacher_id =$this->input->post('teacher_code');
		 $school_key_id = $this->input->post('school_id');
		 $school_type = $this->input->post('school_type');
		 $transfer_reason = $this->input->post('trans_stu');
		 $name = $this->input->post('teachername');
		 $dob1 = $this->input->post('Staffdob');
		  $dob =($dob1 !=''?date('Y-m-d',strtotime( $dob1)):'');
		 $subject = $this->input->post('subject');
		 $desgnation = $this->input->post('designation');
		 $gender = $this->input->post('gender');
		
		
		 $mobile = $this->input->post('phoneno');
		 $edu_dist = $this->input->post('edist');
		 $doj_pr1 = $this->input->post('fdjoin');
		 $doj_pr =($doj_pr1 !=''?date('Y-m-d',strtotime( $doj_pr1)):'');
		 $doj_pr_schol1 = $this->input->post('soffice');
		 $doj_pr_schol =($doj_pr_schol1 !=''?date('Y-m-d',strtotime( $doj_pr_schol1)):'');
		 
		 $date_retirements = $this->input->post('datereq');
		 $date_retirement = ($date_retirements !=''?date('Y-m-d', strtotime($date_retirements)):''); 
		 
		 $redist = $this->input->post('redist');
		 $fdregulsr = $this->input->post('fdregulsr');
		 // $soffice = $this->input->post('soffice');
		 $address = $this->input->post('praddress');
		 $priority_claimed = $this->input->post('pic');
		 
		 $transfer_location =$this->input->post('chagedistname');
		 $transfer =$this->input->post('transfer');
		  $panel_type =$this->input->post('panel_type');
		 $block =$this->input->post('block');
		 $school_name =$this->input->post('school_name');
		 $transfer_school_edu_dist_id =$this->input->post('transedndistrict_id');
		 //$transfer_school_block_id =$this->input->post('');
		 $transfer_school_id =$this->input->post('transschool_id');
		 $join_reason =$this->input->post('jpschool');
		 $spouse_death_dates=$this->input->post('dod');
         $spouse_death_date =($spouse_death_dates ==''? '':date('Y-m-d',strtotime($spouse_death_dates))); 
	
         $kidney_treat_dates = $this->input->post('dot');
		  $kidney_treat_date =($kidney_treat_dates !=''?date('Y-m-d',strtotime( $kidney_treat_dates)):''); 
		   
		 $spouse_district =$this->input->post('distemp');
		 $spouse_distance =$this->input->post('distkg'); 
		 $transfer_school_dist_id =$this->input->post('transdistrict_id');
		 
		 // 'surplus'=>, 'approve, pdf_file, created_at, updated_date
		 
		 
		 
		 
		  $data = array(
		  'school_key_id' =>$school_key_id, 
		  'teacher_id' =>$teacher_id, 
		  'school_type' => $dist_school,
		  'transfer_location'=>$dist,
		  // 'transfer_location'=> $transfer_location, 
		  'name'=> $name, 
		  'gender'=>$gender,
		  'dob'=> $dob, 
		  'date_retirement'=>$date_retirement,
		  'mobile'=>$mobile, 
		  'desgnation'=>$desgnation ,
		  'subject'=> $subject , 
		  'block'=>$block,
		  'edu_dist'=> $edu_dist,
		  'district'=>$redist,
		  'doj_pr'=>$doj_pr,
		  'doj_pr_schol'=> $doj_pr_schol,
		  'join_reason'=>$join_reason, 
		  'school_name'=> $school_name,
		  'address'=> $address, 
		  'transfer_reason'=>$transfer_reason, 
		  'priority_claimed'=> $priority_claimed ,
		  'spouse_death_date'=> $spouse_death_date, 
		  'kidney_treat_date'=>$kidney_treat_date,
		  'spouse_district'=> $spouse_district, 
		  'spouse_distance'=>$spouse_distance, 
		  'transfer_school_dist_id'=>$transfer_school_dist_id, 
		  'transfer_school_edu_dist_id'=>$transfer_school_edu_dist_id, 'transfer_school_block_id'=>$block, 
		  'transfer_school_id'=> $transfer_school_id,
		 
		  'transfer'=>$transfer,
		  'panel_type'=>$panel_type);
		 
	
		  // print_r($data);
		  // die();
		 
		 
		   $transfor_data = $this->Ceo_District_model->insert_transfordata($data);
		   
		  
	  
		echo json_encode($transfor_data);
		
		die;
	}
      public function emis_school_staff2() {
      $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) {
           
             $data['subjects'] = $this->Ceo_District_model->get_teacher_subjects();
             $data['suffix'] = $this->Ceo_District_model->get_teacher_suffix();
             $data['staff_cat'] = $this->Ceo_District_model->get_teacher_type();
             $data['bloodgroup']  = $this->Datamodel->getallbloodgroup();
             $data['schooldist'] = $this->Datamodel->getallachooldist();
             $data['ug'] = $this->Ceo_District_model->get_teacher_typeug();
             $data['pg'] = $this->Ceo_District_model->get_teacher_typepg();
                       //$school_key_id = $this->session->userdata('emis_school_id');
                       
                       $data['mediumInstruct']=$this->Ceo_District_model->getMediumInstruct();
                       $a=' where visibility=0';
                       $data['academic'] = $this->Ceo_District_model->get_academic($a);
                       $data['teachersocial'] = $this->Ceo_District_model->get_techsocialcat();
                       $data['professional'] = $this->Ceo_District_model->get_professional();
                       
             //echo json_encode($data['teachersocial']);
                        $this->load->view('Ceo_District/emis_school_staff2',$data);
                   
     }else { redirect('/', 'refresh'); }
     }
	 
	 //staff transfer pdf by raju 
	 
	   public function generate_pdf()
      {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
            $staff_id = $this->uri->segment(3,0);
			  // echo $staff_id;
            $staff_details = $this->Ceo_District_model->transfer_staff_pdf($staff_id)[0];
			
            $data['staff_details'] = $staff_details;
            $html = $this->load->view('Ceo_District/emis_transfer_staff_pdf',$data,true);
            $this->m_pdf = new mpdf('ta',[216, 356]);
            $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      }
	  public function dsegenerate_pdf()
      {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
            $staff_id = $this->uri->segment(3,0);
			// echo $staff_id;
            $staff_details = $this->Ceo_District_model->transfer_dsestaff_pdf($staff_id)[0];
			// print_r($staff_details);
			// die;
            $data['staff_details'] = $staff_details;
			
			
            $html = $this->load->view('Ceo_District/emis_destransfer_staff_pdf',$data,true);
            $this->m_pdf = new mpdf('ta',[216, 356]);
            $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      }
	  public function generate_pdf_transfer()
      {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
            $staff_id = $this->uri->segment(3,0);
			
            $staff_old_details = $this->Ceo_District_model->transfer_list_old_pdf($staff_id);
			$staff_new_details = $this->Ceo_District_model->transfer_list_new_pdf($staff_id);
			$dist_id  =$this->session->userdata('emis_district_id');
			$data['ceo_details']=$this->Ceo_District_model->ceo_details($dist_id);
            $data['staff_old_details'] = $staff_old_details;
			$data['staff_new_details'] = $staff_new_details;
            $html = $this->load->view('Ceo_District/emis_district_transfer_listpdf',$data,true);
            $this->m_pdf = new mpdf('ta',[216, 356]);
            $this->m_pdf->setTitle($staff_old_details->teacher_code.' Staff Details');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      }
	  
	  // DEE staff surplus Marking  by raj
	  
	  public function emis_staff_surplus_tot_subject()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['schoolsurp'] = $this->Ceo_District_model->emis_staff_surplus_tot_subject($dist_id);
				$data['surptot'] = $this->Ceo_District_model->surplus_tot($dist_id);
				$data['surplus_sub'] = $this->Ceo_District_model ->surplus_sub($dist_id);
				$this->load->view('Ceo_District/emis_staff_surplus_tot_subject',$data);
 				
			}
		 
	  }
	  
	  public function emis_sgstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['sgstaff_surpwithpost'] = $this->Ceo_District_model->emis_sgstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_sgstaff_surpwithpost',$data); 
			}
	}
	  public function emis_sciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['sciencestaff_surpwithpost'] = $this->Ceo_District_model->emis_sciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_sciencestaff_surpwithpost',$data); 
			}
	}
	
	 public function emis_mathstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['mathstaff_surpwithpost'] = $this->Ceo_District_model->emis_mathstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_mathstaff_surpwithpost',$data); 
			}
	}
	 public function emis_englishstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['englishstaff_surpwithpost'] = $this->Ceo_District_model->emis_englishstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_englishstaff_surpwithpost',$data); 
			}
	}
	 public function emis_tamilstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['tamilstaff_surpwithpost'] = $this->Ceo_District_model->emis_tamilstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_tamilstaff_surpwithpost',$data); 
			}
	}
	 public function emis_socialsciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['socialsciencestaff_surpwithpost'] = $this->Ceo_District_model->emis_socialsciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_socialsciencestaff_surpwithpost',$data); 
			}
	}
	 public function emis_primaryhmstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['primarystaff_surpwithpost'] = $this->Ceo_District_model->emis_primaryhmstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_primaryhmstaff_surpwithpost',$data); 
			}
	}
	 public function emis_middlehmstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['middlestaff_surpwithpost'] = $this->Ceo_District_model->emis_middlehmstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_middlehmstaff_surpwithpost',$data); 
			}
	}
	 public function emis_highhmstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['highstaff_surpwithpost'] = $this->Ceo_District_model->emis_highhmstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_highhmstaff_surpwithpost',$data); 
			}
	}
	public function emis_telgustaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['telgustaff_surpwithpost'] = $this->Ceo_District_model->emis_telgustaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_telgustaff_surpwithpost',$data); 
			}
	}
	public function emis_kannadastaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['kannadamstaff_surpwithpost'] = $this->Ceo_District_model->emis_kannadastaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_kannadastaff_surpwithpost',$data); 
			}
	}
	public function emis_urdustaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['urdustaff_surpwithpost'] = $this->Ceo_District_model->emis_urdustaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_urdustaff_surpwithpost',$data); 
			}
	}
	
	public function emis_malayalamstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['malastaff_surpwithpost'] = $this->Ceo_District_model->emis_malayalamstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_malayalamstaff_surpwithpost',$data); 
			}
	}
	
	public function emis_deegovsurplus_sgstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $school_id=$this->input->get('schoolid');
		      $data['sur']=$this->input->get('sur');
			  
              $dist_id  =$this->session->userdata('emis_district_id');
			 
	          $data['deegovsurplus_sgstaff'] = $this->Ceo_District_model->emis_deegovsurplus_sgstaff_school($school_id);
			  
		  $this->load->view('Ceo_District/emis_deegovsurplus_sgstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	
	public function save_surplusdse()
	{
		
		$profile_eco =$this->input->post('school_verification');
		
		// print_r($profile_eco);
		// die();
	    $first_class = $profile_eco;
        foreach ($first_class as $sch)
        {
			if($sch !='')
			{
			$profile['teacher_id'] = $sch['teach_id'];
			$profile['surplus']=$sch['modeule_id1'];
			$profile['school_key_id']=$sch['school_id'];
			$profile['subject']=$sch['subject'];
			$profile['district']=$sch['dist_id'];
			$profile['edu_dist']=$sch['edudist_id'];
			$profile['block']=$sch['block'];
			$profile['desgnation']=$sch['type_teacher'];
			
			
				// print_r($profile);
		// die();
			$transfor_data =  $this->Ceo_District_model->insertsurplus_transfordata($profile);
			   
			}
		}
	  
		echo json_encode($transfor_data);
		
		die;

	}
		
		
	public function emis_deegovsurplus_sciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 7;	  
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_sciencestaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_sciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deegovsurplus_mathstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	          $where = 3;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_mathstaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_mathstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deegovsurplus_englishstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 46;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_englishstaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_englishtaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	public function emis_deegovsurplus_tamilstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 48;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_tamilstaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_tamilstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	public function emis_deegovsurplus_ssciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 8;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_ssciencestaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_ssciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
		public function emis_deegovsurplus_telugustaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 95;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_telugustaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_telugustaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_deegovsurplus_kannadastaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 96;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_kannadastaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_kannadastaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_deegovsurplus_urdustaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 45;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_urdustaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_urdustaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_deegovsurplus_malastaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 94;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_malastaff'] = $this->Ceo_District_model->emis_deegovsurplus_staff_school($where,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_malastaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_deegovsurplus_primaryhmstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 'Primary School';
			$type =29;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_primaryhmstaff'] = $this->Ceo_District_model->emis_deegovsurplus_hmstaff_school($where,$type,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_primaryhmstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_deegovsurplus_middlestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 'Middle School';
			$type =28;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_middlehmstaff'] = $this->Ceo_District_model->emis_deegovsurplus_hmstaff_school($where,$type,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_middlestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deegovsurplus_highstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 'High School';
			$type =27;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			$data['deegovsurplus_highhmstaff'] = $this->Ceo_District_model->emis_deegovsurplus_hmstaff_school($where,$type,$school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
		  $this->load->view('Ceo_District/emis_deegovsurplus_highstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	
	
	//DSE staff surplus school count  by raj
	
	 public function emis_dsestaff_surplus_tot_subject()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				// $data['dseschoolsurp'] = $this->Ceo_District_model->emis_dsestaff_surplus_tot_subject($dist_id);
				$data['dsesurptot'] = $this->Ceo_District_model->dsesurplus_tot($dist_id);
				$data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('Ceo_District/emis_dsestaff_surplus_tot_subject',$data);
 				
			}
		 
	  }
	  
	  public function emis_dsesgstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsesgstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsesgstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsesgstaff_surpwithpost',$data); 
			}
	}
	
	public function emis_dsephystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['dsephystaff_surpwithpost'] = $this->Ceo_District_model->emis_dsephystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsephystaff_surpwithpost',$data); 
			}
	}
	
	public function emis_dsechestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['dsechestaff_surpwithpost'] = $this->Ceo_District_model->emis_dsechestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsechestaff_surpwithpost',$data); 
			}
	}
	
	
	 public function emis_dseenglishstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dseenglishstaff_surpwithpost'] = $this->Ceo_District_model->emis_dseenglishstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dseenglishstaff_surpwithpost',$data); 
			}
	}
	
	 public function emis_dsetamilstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsetamilstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsetamilstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsetamilstaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsebiostaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebiostaff_surpwithpost'] = $this->Ceo_District_model->emis_dsebiostaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebiostaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsebotanystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebotanstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsebotanystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebotanystaff_surpwithpost',$data); 
			}
	}
		 public function emis_dsezoologystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsezoologstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsezoologystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsezoologystaff_surpwithpost',$data); 
			}
	}
	
		 public function emis_dsestatisticsstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsestatisstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsestatisticsstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsestatisticsstaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsegeographystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsegeographystaff_surpwithpost'] = $this->Ceo_District_model->emis_dsegeographystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsegeographystaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsemicrobiologystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsemicrobiostaff_surpwithpost'] = $this->Ceo_District_model->emis_dsemicrobiologystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsemicrobiologystaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsebiochemistrystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebiochestaff_surpwithpost'] = $this->Ceo_District_model->emis_dsebiochemistrystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebiochemistrystaff_surpwithpost',$data); 
			}
	}
	
     public function emis_dsemathmaticstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsemathstaff'] = $this->Ceo_District_model->emis_dsemathmaticstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsemathmaticstaff_surpwithpost',$data); 
			}
	}
 public function emis_dsehsciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsehsciencestaff'] = $this->Ceo_District_model->emis_dsehsciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsehsciencestaff_surpwithpost',$data); 
			}
	}	
	 public function emis_dsehistorystaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsehistorystaff'] = $this->Ceo_District_model->emis_dsehistorystaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsehistorystaff_surpwithpost',$data); 
			}
	}
	 public function emis_dseeconomicsstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dseeconomicsstaff'] = $this->Ceo_District_model->emis_dseeconomicsstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dseeconomicsstaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsepoliticalsciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsepoliticalsciencestaff'] = $this->Ceo_District_model->emis_dsepoliticalsciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsepoliticalsciencestaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsecommercestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsecommercestaff'] = $this->Ceo_District_model->emis_dsecommercestaff_surpwithpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsecommercestaff_surpwithpost',$data); 
			}
	}
	
		  public function emis_dsesciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsesciencestaff_surpwithpost'] = $this->Ceo_District_model->emis_dsesciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsesciencestaff_surpwithpost',$data); 
			}
	}
	 public function emis_dsesocialsciencestaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsesocialsciencestaff_surpwithpost'] = $this->Ceo_District_model->emis_dsesocialsciencestaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsesocialsciencestaff_surpwithpost',$data); 
			}
	}
	
	
	 public function emis_dsemathstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsemathstaff_surpwithpost'] = $this->Ceo_District_model->emis_dsemathstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsemathstaff_surpwithpost',$data); 
			}
	}
	
	 public function emis_dsebtengstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebtengtaff_surpwithpost'] = $this->Ceo_District_model->emis_dsebtengstaff_surpwithpost( $dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebtengstaff_surpwithpost',$data); 
			}
	}
	public function emis_dsebttamilstaff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebttamtaff_surpwithpost'] = $this->Ceo_District_model->emis_dsebttamilstaff_surpwithpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebttamilstaff_surpwithpost',$data); 
			}
	}
	
	//dse surplus marking
	public function emis_dsegovsurplus_phystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 22;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_phystaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_phystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
		public function emis_dsegovsurplus_chestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 13;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_chestaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_chestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
			public function emis_dsegovsurplus_engstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 46;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_engstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_engstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
		public function emis_dsegovsurplus_tamstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 48;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_tamstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_tamstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_biostaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 11;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_biostaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_biostaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_botanystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 26;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_botanystaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_botanystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_zoologystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 27;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_zoologystaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_zoologystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_statstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 58;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
			
	          $data['dsegovsurplus_statstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_statstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_geographystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 18;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
		
	          $data['dsegovsurplus_geographstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_geographystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_microbiologystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 56;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
						
	          $data['dsegovsurplus_microbiostaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_microbiologystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_biochemistrystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 50;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_biochestaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_biochemistrystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	public function emis_dsegovsurplus_mathematicsstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 3;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_mathematicstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_mathematicsstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_homesciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 20;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_homesciencestaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_homesciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_historystaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 19;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_historystaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_historystaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_economicsstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 15;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_economicsstaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_economicsstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_politicalsciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 23;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_politicalsciencestaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_politicalsciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_commercestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	         $where = 51;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_commercestaff'] = $this->Ceo_District_model->emis_deegovsurplus_pgstaff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_commercestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_sciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 7;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_sciencestaff'] = $this->Ceo_District_model->emis_dsegovsurplus_staff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_sciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_ssciencestaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 8;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_ssciencestaff'] = $this->Ceo_District_model->emis_dsegovsurplus_staff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_ssciencestaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_mathsstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 3;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_mathsstaff'] = $this->Ceo_District_model->emis_dsegovsurplus_staff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_mathsstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_bttamilstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 48;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_tamilstaff'] = $this->Ceo_District_model->emis_dsegovsurplus_staff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_bttamilstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsegovsurplus_btengstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $where = 46;
	        $school_id=$this->input->get('schoolid');
			$data['sur']=$this->input->get('sur');
	        $data['dsegovsurplus_engstaff'] = $this->Ceo_District_model->emis_dsegovsurplus_staff_school($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_dsegovsurplus_btengstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	
	
	
	

	
	
	
	
	
	public function emis_dsegovsurplus_sgstaff_school()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $school_id=$this->input->get('schoolid');
			
				
			$data['sur']=$this->input->get('sur');
	          $data['dsegovsurplus_sgstaff'] = $this->Ceo_District_model->emis_deegovsurplus_sgstaff_school($school_id);
			  // print_r($data['dsegovsurplus_sgstaff']);
			  // die;
			
			
			
				
		  $this->load->view('Ceo_District/emis_dsegovsurplus_sgstaff_school',$data);
		  }else { redirect('/', 'refresh'); }
	}
	 public function staff_fixtation_sub_wise()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_district_id');
        $data['staff_fixtation_sub_wise'] = $this->Ceo_District_model->staff_fixtation_sub_wise($dist_id);
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('Ceo_District/emis_staff_fixtation_sub_wise',$data); 
      }
  }
   public function staff_fixtation_sub_wise_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_district_id');
        $data['staff_fixtation_sub_wise'] = $this->Ceo_District_model->staff_fixtation_sub_wise_dse($dist_id);
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('Ceo_District/emis_staff_fixtation_sub_wise_dse',$data); 
      }
  }
    public function emis_staff_transfer_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->session->userdata('emis_district_id');
        $data['staff_transfer_req'] = $this->Ceo_District_model->staff_transfer_req_block($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_req_report_block',$data); 
      }
  }
   public function emis_staff_transfer_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $block_id=$this->input->get('block_id');
	
      
		 
		
		// print_r($block_id);
		$data['staff_transfer_req'] = $this->Ceo_District_model->staff_transfer_req_teacher($block_id);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_req_report_teacher',$data);
        		
      }
  }
   public function get_staff_fix_district()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
        $district_id=$this->session->userdata('emis_district_id');
        $data['dist_details'] = $this->Ceo_District_model->get_staff_fix_district($district_id);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_state_staff_fix_districtwise',$data);
    }
  }
   public function get_staff_fix_schoolwise()
  {
      $block_id = $this->input->get('block_id');

      $data['school_details'] = $this->Ceo_District_model->get_staff_fix_schoolwise($block_id);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_state_staff_fix_schoolwise',$data);   
  }
    public function emis_staff_transfer_dse_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->session->userdata('emis_district_id');
        $data['staff_transfer_req'] = $this->Ceo_District_model->staff_transfer_dse_req_block($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_dse_req_report_block',$data); 
      }
  }
    public function emis_staff_transfer_dse_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $district_id=$this->session->userdata('emis_district_id');
        $block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Ceo_District_model->staff_transfer_dse_req_teacher($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_staff_dse_req_report_teacher',$data); 
      }
  }
   public function get_staff_fix_district_dse()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
      $district_id=$this->session->userdata('emis_district_id');
        $data['dist_details'] = $this->Ceo_District_model->get_staff_fix_district_dse($district_id);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_state_staff_fix_districtwise_dse',$data);
    }
  }
   public function get_staff_fix_schoolwise_dse()
  {
      $block_id = $this->input->get('block_id');

      $data['school_details'] = $this->Ceo_District_model->get_staff_fix_schoolwise_dse($block_id);
     // print_r($data['school_details']);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('Ceo_District/emis_state_staff_fix_schoolwise_dse',$data);   
  }
  /* DEE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher_dee()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['totalsurplus'] = $this->Ceo_District_model->emis_total_surplus_teacher_dee($dist_id);
				$data['teachertype_total'] = $this->Ceo_District_model->emis_total_surplus_teacher_type_dee($dist_id);
				
				$this->load->view('Ceo_District/emis_district_surplus_tot_count_dee',$data);
 				
			}
		 
	  }
	  public function emis_teacher_surplus_sg_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =41;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_sg_dee($dist_id);
				$data['blk']= $this->Ceo_District_model->surplus_dee_blk_mun_gov_count($dist_id,$where);
			 // print_r($data['blk']);die();
				$this->load->view('Ceo_District/emis_staff_sg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_phm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_phm_dee($dist_id);
				$this->load->view('Ceo_District/emis_staff_phm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_mhm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_mhm_dee($dist_id);
				$this->load->view('Ceo_District/emis_staff_mhm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_pg_dee($dist_id);
				$this->load->view('Ceo_District/emis_staff_pg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['btteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_bt_dee($dist_id);
				$this->load->view('Ceo_District/emis_staff_bt_teachers_dee',$data);
			}
	  }
	  public function emis_teacher_surplus_add_dee()
	  { 
	 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				 $teacher_code = $this->input->post('teacher_code');
				 
				  $data = array(
               'seniority_district' => $this->input->post('number')
                 );
				 $result = $this->Ceo_District_model->emis_total_surplus_teacher_add_dee($teacher_code,$data);
				echo $result;
			}
	  }
	  
	  
	  /* DSE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher1()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['totalsurplus'] = $this->Ceo_District_model->emis_total_surplus_teacher($dist_id);
				 $data['teachertype_total'] = $this->Ceo_District_model->emis_total_surplus_teacher_type($dist_id);
				 $data['bt_sub_teacher_total'] = $this->Ceo_District_model->bt_teacher_sub_tot($dist_id);
				// $data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('Ceo_District/emis_district_surplus_tot_count_dse',$data);
 				
			}
		 
	  }
	   public function emis_total_surplus_teacher()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['totalsurplus'] = $this->Ceo_District_model->emis_total_surplus_teacher($dist_id);
				 $data['teachertype_total'] = $this->Ceo_District_model->emis_total_surplus_teacher_type($dist_id);
				 $data['bt_sub_teacher_total'] = $this->Ceo_District_model->bt_teacher_sub_tot($dist_id);
				// $data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('Ceo_District/emis_district_surplus_tot_count_dse',$data);
 				
			}
		 
	  }
	  public function emis_teacher_surplus_sg()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_sg($dist_id);
				$this->load->view('Ceo_District/emis_staff_sg_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_highhm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_highhm($dist_id);
				$this->load->view('Ceo_District/emis_staff_highhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_hrshm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_hrshm($dist_id);
				$this->load->view('Ceo_District/emis_staff_hrhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_pg($dist_id);
				$this->load->view('Ceo_District/emis_staff_pg_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['btteachers'] = $this->Ceo_District_model->emis_total_surplus_teacher_bt($dist_id);
				$this->load->view('Ceo_District/emis_staff_bt_teachers_dse',$data);
			}
	  }
	   public function emis_teacher_surplus_add_dse()
	  { 
	 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				 $teacher_code = $this->input->post('teacher_code');
				 
				  $data = array(
               'seniority_district' => $this->input->post('number')
                 );
				 $result = $this->Ceo_District_model->emis_total_surplus_teacher_add_dse($teacher_code,$data);
				echo $result;
			}
	  }
  
 /* End of the module */
 
 //Eligible Promotion DSE by Raju
 
 
	 public function emis_eligible_promotion_overall_total()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				
				$data['eligiblepromotiontot'] = $this->Ceo_District_model->emis_eligible_promotion_overall_tatal($dist_id);
				
				$this->load->view('Ceo_District/emis_eligible_promotion_overall_tatal',$data);
 				
			}
		 
	  }
	  
	  public function emis_dsesgstaff_promotionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsesgstaff_promotionpost'] = $this->Ceo_District_model->emis_dsesgstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsesgstaff_promotionpost',$data); 
			}
	}
	  public function emis_dsebtstaff_promotionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsebtstaff_promotionpost'] = $this->Ceo_District_model->emis_dsebtstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsebtstaff_promotionpost',$data); 
			}
	}
	  public function emis_dsepgstaff_promotionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsepgstaff_promotionpost'] = $this->Ceo_District_model->emis_dsepgstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsepgstaff_promotionpost',$data); 
			}
	} 
	 public function emis_dsehshmstaff_promotionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsehshmstaff_promotionpost'] = $this->Ceo_District_model->emis_dsehshmstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsehshmstaff_promotionpost',$data); 
			}
	}
	 public function emis_dsehsshmstaff_promotionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['dsehsshmstaff_promotionpost'] = $this->Ceo_District_model->emis_dsehsshmstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_dsehsshmstaff_promotionpost',$data); 
			}
	}
	
	
	public function emis_dsesgschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 41;	  
	        $school_id=$this->input->get('schoolid');
			$data['dsesgschoolstaffpromot'] = $this->Ceo_District_model->emis_dseschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_dsesgschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsebtschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 11;	  
	        $school_id=$this->input->get('schoolid');
			$data['dsebtschoolstaffpromot'] = $this->Ceo_District_model->emis_dseschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_dsebtschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsepgschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 36;	  
	        $school_id=$this->input->get('schoolid');
			$data['dsepgschoolstaffpromot'] = $this->Ceo_District_model->emis_dseschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_dsepgschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	} 
	public function emis_dsehsschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 26;	  
	        $school_id=$this->input->get('schoolid');
			$data['dsehsschoolstaffpromot'] = $this->Ceo_District_model->emis_dseschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_dsehsschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_dsehssschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 27;	  
	        $school_id=$this->input->get('schoolid');
			$data['dsehssschoolstaffpromot'] = $this->Ceo_District_model->emis_dseschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_dsehssschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	// public function  save_promotiondee()
	// {
		// $profile_eco =$this->input->post('school_promotion');
		
	    // $first_class = $profile_eco;
        // foreach ($first_class as $sch)
        // {
			// if($sch !='')
			// {
			// $profile['teacher_id'] = $sch['teach_id'];
			// $profile['promo_eligible']=$sch['modeule_id1'];
			// $profile['school_key_id']=$sch['school_id'];
		    // $profile['appointed_subject']=$sch['subject'];
			// $profile['district_id']=$sch['dist_id'];
		    // $profile['edu_dist_id'] =$sch['edu_dist_id'];
			// $profile['block_id']=$sch['block'];
			
			
			
			// // $profile['major1']=$sch['major1'];
			// // $profile['major2']=$sch['major2'];
		    // // $profile['major3']=$sch['major3'];
			// $profile['panel1_rank']=$sch['rank1'];
		    // $profile['panel2_rank'] =$sch['rank2'];
			// $profile['panel3_rank']=$sch['rank3'];
			
			// $des1 = substr($sch['panel1'], 0, 2);
			// $sub1 = substr($sch['panel1'], 2, 2);
			// $pansub1 = substr($sch['panel1'],4,30);
			// $profile['panel1_desig'] =$des1;
			// $profile['panel1_subject'] =$sub1;
			// $profile['panel1'] =$pansub1;
		     
			// $des2 = substr($sch['panel2'], 0, 2);
			// $sub2 = substr($sch['panel2'], 2, 2);
		    // $pansub2 = substr($sch['panel2'],4,30);
			// $profile['panel2_desig'] =$des2;
			// $profile['panel2_subject'] =$sub2;
			// $profile['panel2'] =$pansub2;
			
			// $des3 = substr($sch['panel3'], 0, 2);
			// $sub3 = substr($sch['panel3'], 2, 2);
		    // $pansub3 = substr($sch['panel3'],4,30);
			// $profile['panel3_desig'] =$des3;
			// $profile['panel3_subject'] =$sub3 ;
			// $profile['panel3'] =$pansub3;
    		// // $profile['doj_pr_post']=date('Y-m-d', strtotime($sch['dpp']));
			 // // $profile['doj_pr_school']= date('Y-m-d', strtotime($sch['dps']));
		    // // $profile['dob']=date('Y-m-d', strtotime($sch['dob']));
			// // $profile['doj_block'] =date('Y-m-d', strtotime($sch['dojb']));
		    // // $profile['appointment_date']=date('Y-m-d', strtotime($sch['adate']));
			
			// if($sch['dpp'] !='0000-00-00' && $sch['dpp'] != '--')
			// {
			// $profile['doj_pr_post']= date('Y-m-d', strtotime($sch['dpp']));
			// }else
			// { 
		    // $profile['doj_pr_post']= ' ';
		    // }	
			// if($sch['adate'] !='0000-00-00' && $sch['adate'] != '--')
			// {
			// $profile['appointment_date']= date('Y-m-d', strtotime($sch['adate']));
			// }else
			// { 
		    // $profile['appointment_date']= ' ';
		    // }	
			
		   
			// if($sch['dps'] !='0000-00-00' && $sch['dps'] != '--')
			// {
			// $profile['doj_pr_school']= date('Y-m-d', strtotime($sch['dps']));
			// }else
			// { 
		    // $profile['doj_pr_school']= ' ';
		    // }	
			// if($sch['dob'] !='0000-00-00' && $sch['dob'] != '--')
			// {
			// $profile['dob']= date('Y-m-d', strtotime($sch['dob']));
			// }else
			// { 
		    // $profile['dob']= ' ';
		    // }	
			
		    // $profile['designation']=$sch['des'];
			
			// if($sch['regdate'] !='0000-00-00' && $sch['regdate'] != '--')
			// {
			// $profile['regularisation_date']= date('Y-m-d', strtotime($sch['regdate']));
			// }else
			// { 
		    // $profile['regularisation_date']= ' ';
		    // }	
			// if($sch['dojb'] !='0000-00-00' && $sch['dojb'] != '--')
			// {
			// $profile['doj_block']= date('Y-m-d', strtotime($sch['dojb']));
			// }else
			// { 
		    // $profile['doj_block']= ' ';
		    // }		 
							   
			
		// // print_r($profile);
		// // die();
			// $transfor_data =  $this->Ceo_District_model->insertpromotion($profile);
			   
			// }
		// }
	  
		// echo json_encode($transfor_data);
		
		// die;

	// }
	public function  save_promotion()
	{
		$profile_eco =$this->input->post('school_promotion');
		
	    $first_class = $profile_eco;
        foreach ($first_class as $sch)
        {
			if($sch !='')
			{
			$profile['teacher_id'] = $sch['teach_id'];
			$profile['promo_eligible']=$sch['modeule_id1'];
			$profile['school_key_id']=$sch['school_id'];
		    $profile['appointed_subject']=$sch['subject'];
			$profile['district_id']=$sch['dist_id'];
		    $profile['edu_dist_id'] =$sch['edu_dist_id'];
			$profile['block_id']=$sch['block'];
			 $profile['name'] =$sch['teacher_name'];
			$profile['gender']=$sch['gender'];
			
			
			$profile['major1']=$sch['major1'];
			$profile['major2']=$sch['major2'];
		    $profile['major3']=$sch['major3'];
			$profile['panel1_rank']=$sch['rank1'];
		    $profile['panel2_rank'] =$sch['rank2'];
			$profile['panel3_rank']=$sch['rank3'];
			
			$des1 = substr($sch['panel1'], 0, 2);
			$sub1 = substr($sch['panel1'], 2, 2);
			$pansub1 = substr($sch['panel1'],4,30);
			$profile['panel1_desig'] =$des1;
			$profile['panel1_subject'] =$sub1;
			$profile['panel1'] =$pansub1;
		     
			$des2 = substr($sch['panel2'], 0, 2);
			$sub2 = substr($sch['panel2'], 2, 2);
		    $pansub2 = substr($sch['panel2'],4,30);
			$profile['panel2_desig'] =$des2;
			$profile['panel2_subject'] =$sub2;
			$profile['panel2'] =$pansub2;
			
			$des3 = substr($sch['panel3'], 0, 2);
			$sub3 = substr($sch['panel3'], 2, 2);
		    $pansub3 = substr($sch['panel3'],4,30);
			$profile['panel3_desig'] =$des3;
			$profile['panel3_subject'] =$sub3 ;
			$profile['panel3'] =$pansub3;
			
    		// $profile['doj_pr_post']=date('Y-m-d', strtotime($sch['dpp']));
			 // $profile['doj_pr_school']= date('Y-m-d', strtotime($sch['dps']));
		    // $profile['dob']=date('Y-m-d', strtotime($sch['dob']));
			// $profile['doj_block'] =date('Y-m-d', strtotime($sch['dojb']));
		    // $profile['appointment_date']=date('Y-m-d', strtotime($sch['adate']));
			
			if($sch['dpp'] !='0000-00-00' && $sch['dpp'] != '--')
			{
			$profile['doj_pr_post']= date('Y-m-d', strtotime($sch['dpp']));
			}else
			{ 
		    $profile['doj_pr_post']= ' ';
		    }	
			if($sch['adate'] !='0000-00-00' && $sch['adate'] != '--')
			{
			$profile['appointment_date']= date('Y-m-d', strtotime($sch['adate']));
			}else
			{ 
		    $profile['appointment_date']= ' ';
		    }	
			
		   
			if($sch['dps'] !='0000-00-00' && $sch['dps'] != '--')
			{
			$profile['doj_pr_school']= date('Y-m-d', strtotime($sch['dps']));
			}else
			{ 
		    $profile['doj_pr_school']= ' ';
		    }	
			if($sch['dob'] !='0000-00-00' && $sch['dob'] != '--')
			{
			$profile['dob']= date('Y-m-d', strtotime($sch['dob']));
			}else
			{ 
		    $profile['dob']= ' ';
		    }	
			
		    $profile['designation']=$sch['des'];
			
			if($sch['regdate'] !='0000-00-00' && $sch['regdate'] != '--')
			{
			$profile['regularisation_date']= date('Y-m-d', strtotime($sch['regdate']));
			}else
			{ 
		    $profile['regularisation_date']= ' ';
		    }	
			if($sch['dojb'] !='0000-00-00' && $sch['dojb'] != '--')
			{
			$profile['doj_block']= date('Y-m-d', strtotime($sch['dojb']));
			}else
			{ 
		    $profile['doj_block']= ' ';
		    }		 
							   
			
		// print_r($profile);
		// die();
			$transfor_data =  $this->Ceo_District_model->insertpromotion($profile);
			   
			}
		}
	  
		echo json_encode($transfor_data);
		
		die;

	}
	 //Eligible Promotion DEE by Raju
 
 
	 public function emis_dee_eligible_promotion_overall_total()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				
				$data['eligibledeepromotiontot'] = $this->Ceo_District_model->emis_dee_eligible_promotion_overall_total($dist_id);
				
				$this->load->view('Ceo_District/emis_dee_eligible_promotion_overall_total',$data);
 				
			}
		 
	  }
	  public function emis_deesgstaff_promotionpost()
	  {
		    $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['emis_deesgstaff_promotion'] = $this->Ceo_District_model->emis_deesgstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_deesgstaff_promotionpost',$data); 
			}
		  
	  }
	   public function emis_deebtstaff_promotionpost()
	  {
		    $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['emis_deebtstaff_promotion'] = $this->Ceo_District_model->emis_deebtstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_deebtstaff_promotionpost',$data); 
			}
	  }
	   public function emis_deepgstaff_promotionpost()
	  {
		    $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['emis_deepgstaff_promotion'] = $this->Ceo_District_model->emis_deepgstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_deepgstaff_promotionpost',$data); 
			}
	  }
	   public function emis_deeprihmstaff_promotionpost()
	  {
		   $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['emis_deeprihmstaff_promotion'] = $this->Ceo_District_model->emis_deeprihmstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_deeprihmstaff_promotionpost',$data); 
			}
	  }
	   public function emis_deemidhmstaff_promotionpost()
	  {
		  $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				 $dist_id  =$this->session->userdata('emis_district_id');
				$data['emis_deemidhmstaff_promotion'] = $this->Ceo_District_model->emis_deemidhmstaff_promotionpost($dist_id);
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_deemidhmstaff_promotionpost',$data); 
			}
	  }
	  	public function emis_deesgschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 41;	  
	        $school_id=$this->input->get('schoolid');
			$data['deesgschoolstaffpromot'] = $this->Ceo_District_model->emis_deeschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_deesgschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deebtschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 11;	  
	        $school_id=$this->input->get('schoolid');
			$data['deebtschoolstaffpromot'] = $this->Ceo_District_model->emis_deeschoolstaff_promotionpost($where,$school_id);
			
		  $this->load->view('Ceo_District/emis_deebtschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deepgschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 36;	  
	        $school_id=$this->input->get('schoolid');
			$data['deepgschoolstaffpromot'] = $this->Ceo_District_model->emis_deeschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_deepgschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	} 
	public function emis_deehsprischoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 29;	  
	        $school_id=$this->input->get('schoolid');
			$data['deehsprischoolstaffpromot'] = $this->Ceo_District_model->emis_deeschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_deehsprischoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_deehsmidschoolstaff_promotionpost()
	{
		 $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	  
            $where = 28;	  
	        $school_id=$this->input->get('schoolid');
			$data['deehsmidschoolstaffpromot'] = $this->Ceo_District_model->emis_deeschoolstaff_promotionpost($where,$school_id);
			  
			
		  $this->load->view('Ceo_District/emis_deehsmidschoolstaff_promotionpost',$data);
		  }else { redirect('/', 'refresh'); }
	}
	  public function emis_PG_fixation()
    {
         $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
         $district_id=$this->session->userdata('emis_district_id');
         $pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
         //print_r($pst);
        // print_r($pst);
         $sql=array();
         for($i=1;$i<44;$i++){
            array_push($sql,"SUM($pst$i) as $pst$i");
         }
         $ssql=implode(',',$sql);

         $data['DT']=$this->Ceo_District_model->emis_PG_fixation($ssql,$district_id);
     // print_r($DT['pg_fix']);
        $this->load->view('Ceo_District/emis_PG_fixation',$data);
      }
    }
	
	//promotion report by raju
	public function promotion_deereport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 $dist_id  =$this->session->userdata('emis_district_id');
		 $id = $this->input->post('desig');
		$pan ='';
         if(!empty($id))	
		 {
      			$id = $this->input->post('desig');	
			
				// $sub = substr($id, 0, 2);
		        $pan = substr($id,2,30);
				$data['pan'] =  $pan;
				if($pan == 'HM(MiddleSchool)')
				{
					$sub =0;
				}
				else if($pan == 'HM(PrimarySchool)')
				{
					$sub =0;
				}else{
					$sub = substr($id, 0, 2);
				}
		    $data['deepromotion'] = $this->Ceo_District_model->promotion_deereport($dist_id,$sub,$pan);
			
		 
		 }	
		  $this->load->view('Ceo_District/emis_promotion_deereport',$data);
	}
	
		public function promotion_dsereport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 $dist_id  =$this->session->userdata('emis_district_id');
        $id = $this->input->post('desig');
		$pan ='';
         if(!empty($id))	
		 {
      			$id = $this->input->post('desig');
							
				// $sub = substr($id, 0, 2);
		        $pan = substr($id,2,30);
				$data['pan'] =  $pan;
				if($pan == 'HM(HSS)')
				{
					$sub =0;
				}
				else if($pan == 'HM(HS)')
				{
					$sub =0;
				}else{
					$sub = substr($id, 0, 2);
				}
				
			$data['dsepromotion'] = $this->Ceo_District_model->promotion_dsereport($dist_id,$sub,$pan);
  			// echo json_encode($data);
		// die;
		 }	
		 // else{
			  $this->load->view('Ceo_District/emis_promotion_dsereport',$data); 
		 // }
	}
	

//END
	//Vacancy report by Bala
	public function vacancy_deereport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$teachertype=$this->input->post('teachertype');
				//print_r($teachertype);
				//$data['vacancy_deereport'] = $this->Ceo_District_model->vacancy_deereport($dist_id);
				 //print_r($data['vacancy_deereport']);
				// die();
				
				$this->load->view('Ceo_District/emis_vacancy_dee',$data); 
			}
	}
	//live Vacancy dse_pg report by Bala
	public function live_vacancy_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['live_vacancy_dsereport'] = $this->Ceo_District_model->live_vacancy_dsereport($dist_id);
				$this->load->view('Ceo_District/emis_live_vacancy_dse_pg',$data); 
			}
	}
	public function live_vacancy_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['live_vacancy_dsereportsgbt'] = $this->Ceo_District_model->live_vacancy_dse_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_live_vacancy_dse_sgbt',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function vacancy_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['vacancy_dsereport'] = $this->Ceo_District_model->vacancy_dsereport($dist_id);
				$this->load->view('Ceo_District/emis_vacancy_dse_pg',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function vacancy_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$teachertype=$this->input->post('teachertype');
				//print_r($teachertype);
				//$data['vacancy_dsereport'] = $this->Ceo_District_model->vacancy_dsereport($dist_id);
				$data['vacancy_dsereportsgbt'] = $this->Ceo_District_model->vacancy_dse_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_vacancy_dse_sgbt',$data); 
			}
	}
	public function vacancy_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['vacancy_deereportsgbt'] = $this->Ceo_District_model->vacancy_dee_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_vacancy_dee_sgbt',$data); 
			}
	}
	public function live_vacancy_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['live_vacancy_deereportsgbt'] = $this->Ceo_District_model->live_vacancy_dee_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_live_vacancy_dee_sgbt',$data); 
			}
	}
	//Eligible dse_pg report by Bala
	public function need_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['need_dsereport'] = $this->Ceo_District_model->need_dsereport($dist_id);
				$this->load->view('Ceo_District/emis_need_dse_pg',$data); 
			}
	}
	
	public function need_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$teachertype=$this->input->post('teachertype');
				//print_r($teachertype);
				//$data['vacancy_dsereport'] = $this->Ceo_District_model->vacancy_dsereport($dist_id);
				$data['need_dsereportsgbt'] = $this->Ceo_District_model->need_dse_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_need_dse_sgbt',$data); 
			}
	}
	public function need_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['need_deereportsgbt'] = $this->Ceo_District_model->need_dee_sg_btreport($dist_id);
				$this->load->view('Ceo_District/emis_need_dee_sgbt',$data); 
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
      $dist_id  =$this->session->userdata('emis_district_id');
      
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school',$data);
   
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
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_district($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_district',$data);
   
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
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_wise($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_wise',$data);
   
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
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_dee($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_dee',$data);
   
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
        $dist_id  =$this->session->userdata('emis_district_id');
      $block_name=$this->input->get('block_name');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_district_dee($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_district_dee',$data);
   
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
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_wise_dee($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_wise_dee',$data);
   
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
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_dse($dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_dse',$data);
   
    } else { redirect('/', 'refresh'); }

    }
	public function emis_school_dse()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Ceo_District_model');
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['dse_school'] = $this->Ceo_District_model->get_school_dse($dist_id);
      //print_r( $data['dse_school']);
	  //die();
      $this->load->view('Ceo_District/emis_ceo_dse_subject_marking',$data);
   
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
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_district_dse($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_district_dse',$data);
   
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
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_wise_dse($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_wise_dse',$data);
   
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
      $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_dms($dist_id);
     // print_r($data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_dms',$data);
   
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
        $dist_id  =$this->session->userdata('emis_district_id');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_district_dms($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_district_dms',$data);
   
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
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_wise_dms($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_wise_dms',$data);
   
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
         $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_others($dist_id);
     // print_r($data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_others',$data);
   
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
       $dist_id  =$this->session->userdata('emis_district_id');
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_district_others($mang,$dist_id);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_district_others',$data);
   
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
      $data['total_count_details'] = $this->Ceo_District_model->get_state_school_wise_others($block_name,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('Ceo_District/emis_state_school_wise_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }
	
	 public function beo_form()
   {
   //print_r($this->input->post()); die();
    $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
     date_default_timezone_set('Asia/Kolkata');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('education_district', 'Select Education District', 'required');
    $this->form_validation->set_rules('education_district_blk', 'Select Block', 'required');
    $this->form_validation->set_rules('teacher_name', 'Teacher Name', 'required');
    $this->form_validation->set_rules('DOB', 'Date Of Birth', 'required');
    $this->form_validation->set_rules('beo_doj', 'Date of joining as BEO', 'required');
    $this->form_validation->set_rules('doj_pr_beo', 'Date of joining  as BEO In Present Station', 'required');
   
      if($emis_loggedin) {
        
            $this->load->model('Ceo_District_model');
            $tmp= $this->input->post('recruit_mode');
          $tmp=  ($tmp=='1'?'By Direct Recruitment':'By Promotion Recruitment');
            if(isset($_POST['education_district']) && $_POST['education_district']!=''){
                   $data = array(
                                'location' => json_encode( $this->input->post('profile_count')),
                                'name' => $this->input->post('teacher_name'),
                                'block' => $this->input->post('education_district_blk'),
                                'edu_district' => $this->input->post('education_district'),
                                'district' => $this->session->userdata('emis_district_id'),
                                'dob' => $this->input->post('DOB'),
                                'doj_mhm' => $this->input->post('mhm_doj'),
                                'mhm_block' => $this->input->post('mhm_block'),
                                'mhm_district' => $this->input->post('mhm_district'),
                                'doj_beo' => $this->input->post('beo_doj'),
                                'doj_pr_beo' => $this->input->post('doj_pr_beo'),
                                'recruit_mode' => $tmp,
                                   );
                 // print_r($data); die();
              $this->Ceo_District_model->insert_user($data);
          }
            
            $dist_id = $this->session->userdata('emis_district_id');
        $data['edu_dist'] =  json_decode(json_encode($this->Ceo_District_model->get_edu_dist($dist_id)),true);
        $data['get_dist_name1'] =  json_decode(json_encode($this->Ceo_District_model->get_dist_name1($dist_id)),true);
        $data['edu_dist_blk'] =  json_decode(json_encode($this->Ceo_District_model->get_edu_dist_blk($dist_id)),true);
            $this->load->view('Ceo_District/beo_form',$data);
        
       
    }

   }

    public function beo_staff_list()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
     $this->load->model('Ceo_District_model');
         $dist_id  =$this->session->userdata('emis_district_id');
     $data['beo_list'] = $this->Ceo_District_model->get_beo_list($dist_id);
   //  print_r($data['beo_list']);
      $this->load->view('Ceo_District/emis_beo_list',$data);
   
    } else { redirect('/', 'refresh'); }

    }
    public function get_allblocks()
    {
      echo json_encode($this->Datamodel->get_allblocks($this->input->post('mhm_district')));
    }
    public function get_all_edu_dist()
    {
      echo json_encode($this->Ceo_District_model->get_edu_dist_blk($this->input->post('education_district')));
    }

	

	public function save_school_subjects()
	{
		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $schoolid=$this->input->post('schoolid');
		  $savesubjectpanel4['vac_44'] = $this->input->post('sub1');
		  $savesubjectpanel4['vac_23'] = $this->input->post('sub2');
		  $savesubjectpanel4['vac_14'] = $this->input->post('sub3');
		  $savesubjectpanel2['vac_agr'] = $this->input->post('sub4');
		  $savesubjectpanel2['vac_com'] = $this->input->post('sub5');
		  $savesubjectpanel2['vac_pet'] = $this->input->post('sub6');
		  $savesubjectpanel2['vac_sew'] = $this->input->post('sub7');
		  $savesubjectpanel2['vac_mus'] = $this->input->post('sub8');
		  $savesubjectpanel2['vac_dra'] = $this->input->post('sub9');
		  $savesubjectpanel2['vac_pd2'] = $this->input->post('sub10');
		 
		  $result = $this->Ceo_District_model->save_panel4($schoolid,$savesubjectpanel4);
		  $result1 = $this->Ceo_District_model->save_panel2($schoolid,$savesubjectpanel2);
		echo $result;
	  }
		
	}
	//panelwise_transfer by raj
	public function panelwise_transfer()
	{
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
	    $blks ='';
		$pan='';
		$sch ='';
	   if($emis_loggedin) 
	   {
		$dist_id  =$this->session->userdata('emis_district_id');	
		$data['blk']= $this->Ceo_District_model->transfer_dee_blk_mun_gov_count($dist_id); 
		$data['panel'] =$this->Ceo_District_model->panel_type();
		$blks = $this->input->post('blk');
       
		if(!empty($blks))
		{
		$dist_id  =$this->session->userdata('emis_district_id');	
	  
	    $pan = $this->input->post('pan');
	    $sch = $this->input->post('sch');
	    $data['sch_panel_blk'] =$this->Ceo_District_model-> panel_block_school($dist_id,$pan,$blks,$sch);
		 // $block=$this->Ceo_District_model-> panel_block_school($dist_id,$pan,$blks,$sch);
		$data['blockname']='';
	    $data['blockname']=$data['sch_panel_blk'][0]->block_name;
		// print_r($blockname);
		}
		$this->load->view('Ceo_District/emis_panelwise_transfer',$data);
       }
	 else { redirect('/', 'refresh'); }	
	}
	// public function panelwise_search()
	// {
	  // $this->load->library('session');
      // $emis_loggedin = $this->session->userdata('emis_loggedin');
	   
	     // if($emis_loggedin) 
		 // {
		// $dist_id  =$this->session->userdata('emis_district_id');	
	    // $blks = $this->input->post('blk');
        // $pan = $this->input->post('pan');
	    // $sch = $this->input->post('sch');
		
	    // $data['sch_panel_blk'] =$this->Ceo_District_model-> panel_block_school($dist_id,$pan,$blks,$sch);
		
		// $this->load->view('Ceo_District/emis_panelwise_transfer',$data);
       // }
	 // else { redirect('/', 'refresh'); }	
	// }
	 //end
	 
 public function generate_pdf_beo()
      {
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
             $staff_id = $this->uri->segment(3,0);
        // echo $staff_id;
            $dist_id  =$this->session->userdata('emis_district_id');
            $staff_details = $this->Ceo_District_model->get_beo_list_pdf($staff_id)[0];
            $data['staff_details'] = $staff_details;
            $html = $this->load->view('Ceo_District/emis_transfer_beo_pdf',$data,true);
            $this->m_pdf = new mpdf('ta',[216, 356]);
            $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      }
	  
	  //new changes modules dse promtion list by raj
	  
	  public function dse_promotion_sch_staff_list()
	  {
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	         $dist_id  =$this->session->userdata('emis_district_id');
	         $data['dse_promotion_sch_staff_list'] = $this->Ceo_District_model->dse_promotion_sch_staff_list($dist_id);
			 
			  $this->load->view('Ceo_District/emis_dse_promotion_sch_staff_list',$data);
		  }else { redirect('/', 'refresh'); }
		  
	  }
	   public function dee_promotion_sch_staff_list()
	  {
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {  
	         $dist_id  =$this->session->userdata('emis_district_id');
	         $data['dee_promotion_sch_staff_list'] = $this->Ceo_District_model->dee_promotion_sch_staff_list($dist_id);
			 
			  $this->load->view('Ceo_District/emis_dee_promotion_sch_staff_list',$data);
		  }else { redirect('/', 'refresh'); }
		  
	  }
	  public function dse_promotion_staff_details()
	  {
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $school_id=$this->input->get('schoolid');
			$data['dseschoolstaffpromot'] = $this->Ceo_District_model->dse_promotion_staff_details($school_id);
			  
			$this->load->view('Ceo_District/emis_dse_promotion_staff_details',$data);
		  }else { redirect('/', 'refresh'); }
	  }
	    public function dee_promotion_staff_details()
	  {
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {   
	        $school_id=$this->input->get('schoolid');
			$data['deeschoolstaffpromot'] = $this->Ceo_District_model->dee_promotion_staff_details($school_id);
			  
			$this->load->view('Ceo_District/emis_dee_promotion_staff_details',$data);
		  }else { redirect('/', 'refresh'); }
	  }
    //end

     public function emis_teacher_panel_mainpage()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $dist_id  =$this->session->userdata('emis_district_id');
        //$block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Ceo_District_model->teacher_panel_mainpage($dist_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/teacher_panel_mainpage',$data); 
      }
  }
  public function emis_teacher_panel_mainpage_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $dist_id  =$this->session->userdata('emis_district_id');
        //$block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Ceo_District_model->teacher_panel_mainpage_dse($dist_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/teacher_panel_mainpage_dse',$data); 
      }
  }

  public function emis_teacher_panel_dee()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $dist_id  =$this->session->userdata('emis_district_id');
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $data['staff_transfer_req'] = $this->Ceo_District_model->emis_teacher_panel_dee($dist_id,$transfer_type,$teach_type,$loc); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_teacher_panel_dee',$data); 
      }
  }
  public function emis_teacher_panel_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $dist_id  =$this->session->userdata('emis_district_id');
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $data['staff_transfer_req'] = $this->Ceo_District_model->emis_teacher_panel_dse($dist_id,$transfer_type,$teach_type,$loc); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('Ceo_District/emis_teacher_panel_dse',$data); 
      }
  }
 // transfer deleted by raj
   public function trans_delete()
   {
       $teach=$this->input->post('teach');
		$school=$this->input->post('school');
		// if(!empty($teach))
		// {    
	           
	        $profile['teacher_id'] = $teach;
			$profile['teacher_status']=1;
			$profile['transfer']=0;
			$profile['school_key_id']=$school;
			 // print_r($profile);
			// die();
		 $this->Ceo_District_model->trans_delete($profile);
		
		 echo json_encode($data);
		die;
}

 // transfer rank Save by raj
   public function trans_ranksave()
   {
        $teach=$this->input->post('teach');
		$school=$this->input->post('school');
		$rank=$this->input->post('rank');
		// if(!empty($teach))
		// {    
	           
	        $profile['teacher_id'] = $teach;
			$profile['teacher_status']=0;
			$profile['seniority_district']=$rank;
			$profile['school_key_id']=$school;
			 // print_r($profile);
			 // die();
		$data= $this->Ceo_District_model->trans_ranksave($profile);
		
		 echo json_encode($data);
		die;
}
   public function emis_teacher_timetable_details()
   {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	   //$districtid=$_GET['districtid'];
	   $schooltype=$this->input->post('schooltype');
	   //print_r($schooltype);
	   if($schooltype==1)
	   {
		   $data['type']='DEE';
	   }
	   else
	   {
		 $data['type']='DSE';  
	   }
	   $teachertype=$this->input->post('ttype');
	   if($teachertype==41)
	   {
		$data['teachertype']='SG';   
	   }
	   elseif($teachertype==11)
	   {
		 $data['teachertype']='BT';   
	   }
	   else
	   {
		 $data['teachertype']='PG';  
	   }
	   $periods=$this->input->post('periods');
	   $data['periods']=$periods;
	   
	    $month= $this->input->post('month');
		$data['month']=$month;
	   
		//print_r($month);
		$monthno=(explode("-",$month));
		$month_no=$monthno[1];
    $firstday = date('01-' . $month_no . '-Y');
    $lastday = date(date('t', strtotime($firstday)) .'-' . $month_no . '-Y');
	$dist_id  =$this->session->userdata('emis_district_id');
      $data['teacher_details'] = $this->Ceo_District_model->get_state_teacher_timetable_report($dist_id,$schooltype,$teachertype,$periods,$firstday, $lastday);
	  //print_r($data['teacher_details']);
      $this->load->view('Ceo_District/emis_teacher_taken_class_count',$data);
      }else { redirect('/', 'refresh'); }
	   
   }

  public function tamil_teacher_surplus_report()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =48;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['tamil_teachers'] = $this->Ceo_District_model->bt_teacher_sub_wise_report($dist_id,$where);
				$this->load->view('Ceo_District/emis_tamil_teacher_surplus_report',$data);
			}
	  }
	   public function english_teacher_surplus_report()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =46;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['english_teachers'] = $this->Ceo_District_model->bt_teacher_sub_wise_report($dist_id,$where);
				$this->load->view('Ceo_District/emis_english_teacher_surplus_report',$data);
			}
	  }
	   public function maths_teacher_surplus_report()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =3;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['maths_teachers'] = $this->Ceo_District_model->bt_teacher_sub_wise_report($dist_id,$where);
				$this->load->view('Ceo_District/emis_maths_teacher_surplus_report',$data);
			}
	  }
	     public function sc_teacher_surplus_report()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =7;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sc_teachers'] = $this->Ceo_District_model->bt_teacher_sub_wise_report($dist_id,$where);
				$this->load->view('Ceo_District/emis_sc_teacher_surplus_report',$data);
			}
	  }
	    public function ssc_teacher_surplus_report()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{   
		        $where =8;
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['ssc_teachers'] = $this->Ceo_District_model->bt_teacher_sub_wise_report($dist_id,$where);
				$this->load->view('Ceo_District/emis_ssc_teacher_surplus_report',$data);
			}
	  }
	  public function  save_surplus_rank()
	  {
		$teach=$this->input->post('teach');
		$school=$this->input->post('school');
		$rank=$this->input->post('rank');

	           
	        $profile['teacher_id'] = $teach;
			
			$profile['school_key_id']=$school;
			$profile['seniority_district']=$rank;
			// print_r($profile);
			 // die();
			
			 
		  $this->Ceo_District_model->save_surplus_rank($profile);
		
		 echo json_encode($data);
		die;
	  }
public function get_state_laptop_district()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
       
        $dist=$this->session->userdata('emis_district_id');
        $data['lab_dis'] = $this->Ceo_District_model->emis_computerindent_laptop($dist); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
      
        $this->load->view('Ceo_District/emis_computerindent_laptop',$data); 
      }
  }
    

	  public function transfer_teacher()
{
$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	      $teacherid=$this->input->post('teacheruid');
		  
		  $savetransfer['from_schl'] = $this->input->post('old_school');
		  $savetransfer['to_schl'] = $this->input->post('new_school');
		  $savetransfer['from_schl_keyid']= $this->input->post('oldschool_key');
		  $savetransfer['to_schl_keyid'] = $this->input->post('newschool_key');
		 $savetransfer['staff_id'] = $this->input->post('teacheruid');
		  $transferdate= $this->input->post('transferdate');
		  $savetransfer['trans_date']  = date('Y-m-d',strtotime($transferdate)) ; 
		  $savetransfer['from_scl_dist'] = $this->input->post('old_dist');
		  $savetransfer['to_scl_dist'] = $this->input->post('new_dist');
		  $savetransfer['from_block'] = $this->input->post('old_block');
		  $savetransfer['to_block'] = $this->input->post('new_block');
		  $savetransfer['trans_type'] = $this->input->post('category');
		  $savetransfer['transferer'] = $this->input->post('transfer_by');
      $savetransfer['from_teachertype'] = $this->input->post('teachertypefrom');
       $savetransfer['to_teachertype'] = $this->input->post('teachertypeto');
		  
		  $savetransfer['user_type_id'] = $this->session->userdata('emis_district_id');;
		  $updateschool_key_id['udise_code']=$this->input->post('new_school');
		  $updateschool_key_id['school_key_id']=$this->input->post('newschool_key');
		  $teacheruid=$this->input->post('teacheruid');
		  $result1=$this->Ceo_District_model->update_school_key_id($teacheruid,$updateschool_key_id);
		  $result = $this->Ceo_District_model->teacher_transfer($savetransfer);
		  
		echo $result;
	  }	
}
	  public function transfer_teacher_debutation()
{
	$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  
		  $teacherid=$this->input->post('teacheruid');
		  $teacherid=$this->input->post('teacheruid');
	      $teachercode = $this->Ceo_District_model->get_teacher_code($teacherid);
		 
          $savetransfer_debuted['depute_key'] = $this->input->post('newschool_key');
		  $savetransfer_debuted['teacher_code'] = $teachercode[0]->teacher_code;
		  $savetransfer_debuted['u_id'] = $teachercode[0]->u_id;
		  $transferdate= $this->input->post('transferdate');
		  $savetransfer_debuted['depute_frmdate']  = date('Y-m-d',strtotime($transferdate)) ; 
		  $savetransfer_debuted['deputed_place'] = 1;
		  $debuted['deputed']=1;
		  $result = $this->Ceo_District_model->transfer_teacher_debutation($savetransfer_debuted);
		  /* Add volunteers */
		  $savevolunteers['school_key_id'] = $this->input->post('newschool_key');
		  $savevolunteers['teacher_code'] = $teachercode[0]->teacher_code;
		  $savevolunteers['teacher_name'] = $teachercode[0]->teacher_name;
		  $savevolunteers['aadhar_no'] = $teachercode[0]->aadhar_no;
		  $savevolunteers['email'] = $teachercode[0]->email_id;
		  $savevolunteers['gender'] = $teachercode[0]->gender;
		  $savevolunteers['staff_dob'] = $teachercode[0]->staff_dob;
		  $savevolunteers['staff_join'] = $teachercode[0]->staff_join;
		  $savevolunteers['mbl_nmbr'] = $teachercode[0]->mbl_nmbr;
		  $savevolunteers['academic'] = $teachercode[0]->academic;
		  $savevolunteers['e_ug'] = $teachercode[0]->e_ug;
		  $savevolunteers['e_pg'] = $teachercode[0]->e_pg;
		  $savevolunteers['professional'] = $teachercode[0]->professional;
		  $savevolunteers['Active'] = 1;
		  $savevolunteers['created_date']=date('Y-m-d H:i:s');
		  
		  $savevolunteers_sub['school_key_id'] = $this->input->post('newschool_key');
		  $savevolunteers_sub['teacher_code'] = $teachercode[0]->teacher_code;
		  $savevolunteers_sub['teacher_name'] = $teachercode[0]->teacher_name;
		  $savevolunteers_sub['sub1'] = $teachercode[0]->subject1;
		  $savevolunteers_sub['sub2'] = $teachercode[0]->subject2;
		  $savevolunteers_sub['sub3'] = $teachercode[0]->subject3;
		  $savevolunteers_sub['created_date']=date('Y-m-d H:i:s');
		  
		  $res1 = $this->Ceo_District_model->save_debut_in_volunteers($savevolunteers);
		  $res2 = $this->Ceo_District_model->save_debut_in_volunteers_sub($savevolunteers_sub);
		  /* end of volunteers */
		  $result2 = $this->Ceo_District_model->update_flag($teacherid,$debuted);
		  
		  
		  $savetransfer['from_schl'] = $this->input->post('old_school');
		  $savetransfer['to_schl'] = $this->input->post('new_school');
		  $savetransfer['from_schl_keyid']= $this->input->post('oldschool_key');
		  $savetransfer['to_schl_keyid'] = $this->input->post('newschool_key');
		  $savetransfer['staff_id'] = $this->input->post('teacheruid');
		 
		  $savetransfer['user_type_id'] = $this->session->userdata('emis_district_id');
		  $transferdate= $this->input->post('transferdate');
		  $savetransfer['trans_date']  = date('Y-m-d',strtotime($transferdate)) ;
		  $savetransfer['from_scl_dist'] = $this->input->post('old_dist');
		  $savetransfer['to_scl_dist'] = $this->input->post('new_dist');
		  $savetransfer['from_block'] = $this->input->post('old_block');
		  $savetransfer['to_block'] = $this->input->post('new_block');
		  $savetransfer['trans_type'] = $this->input->post('category');
		  $savetransfer['transferer'] = $this->input->post('transfer_by');
      $savetransfer['from_teachertype'] = $this->input->post('teachertypefrom');
      $savetransfer['to_teachertype'] = $this->input->post('teachertypeto');

		  $result3 = $this->Ceo_District_model->teacher_transfer($savetransfer);
		  echo $result;
	  }
}
	public function emis_district_teacher_transhistory(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$this->load->model('Ceo_District_model');
			
			$fdates = $this->input->get('fdate');
		$fdate =date('Y-m-d',strtotime($fdates));
		
		$tdates = $this->input->get('tdate');
		
		$tdate =date('Y-m-d',strtotime($tdates));
		
		$block= $this->input->get('Block');
		
		$data['fdate']=$fdates;
		$data['tdate']=$tdates;
			
		  
			
			$data['history']=$this->Ceo_District_model->getallteachertranshistory($block,$fdate,$tdate);
			//print_r($data['history']);
			$data['totalcount']=$total;
			$data['offset']=$offset;
			$this->load->view('Ceo_District/emis_district_transferhistory',$data);
			// // echo json_encode($data['tranferers']);
    
		} else { redirect('/', 'refresh'); }
	}
	
	 //staff transfer list report
  public function emis_staff_from_to_trans_block_count()
   {
	   
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 $fdate =' ';
      if($emis_loggedin) 
      {     
       $dist_id  =$this->session->userdata('emis_district_id');
		  
    // print_r($this->input->post());die;
   
        $fdates = $this->input->post('fdate');
		$fdate =date('Y-m-d',strtotime($fdates));
		
		$tdates = $this->input->post('tdate');
		$tdate =date('Y-m-d',strtotime($tdates));
		
		$data['fdate']=$fdates;
		$data['tdate']=$tdates;
		
		$dists = $this->Ceo_District_model-> dist($dist_id);
		$dist = $dists[0]->district_name;
		
		
	
		
        if($fdate !=' ')
        {
			
        $data['dist_staff_count'] = $this->Ceo_District_model->emis_staff_from_to_trans_block_count($dist,$fdate,$tdate); 
		}
       // print_r($data['dist_staff_count']);
	  // die();
      
      
        $this->load->view('Ceo_District/emis_staff_from_to_trans_block_count',$data); 
      }
  }
  //indents summary by raj
  public function indents_summary()
  {
	  $this->load->view('Ceo_District/emis_deoindent_summary');
  }
  
   public function emis_uniform_indent()
  {
	$dist  =$this->session->userdata('emis_district_id');
    $scheme = $this->input->get('schemeid');
	$set=$this->input->post('set');
	$schol =$this->input->post('schol');
    // $schol =$this->input->post('hd_sch');
	// echo $schol;
  $block =$this->input->get('block_id');
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
  $class ="and( cate_type = 'Primary School' or cate_type = 'Middle School') ";
  if(!empty($management_type)){
    $class .= "and ( school_type_id in (".$ids."))";
  }else{
    $class .= "and ( school_type_id =1 or school_type_id =2 )";
  }
	
	if(!empty($set))
	  {
		    $data['uniformboy'] = $this->Ceo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
        $data['uniformgirl'] = $this->Ceo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);		
		
      }	
	
      if($scheme == 1)
	  {
		$data['uniformboy'] = $this->Ceo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);	  
		$data['uniformgirl'] = $this->Ceo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
      }	
	 
	  if(!empty($block)){
		  $schol = substr($block,0,1);
		  $set = substr($block,1,1);
		  $scheme = substr($block,2,1);
		  $blk = substr($block,3,3);
		  // echo $schol; echo'<br>'; echo $set; echo'<br>';  echo  $scheme; echo'<br>';  echo $blk; 
		  $data['uniformboy'] = $this->Ceo_District_model->uniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
		  $data['uniformgirl'] = $this->Ceo_District_model->uniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
	  }
     $data['sets']=$set;
     $data['management_type']=$management_type;
	   $data['val']= $data['uniformboy'][0]->hill_frst;
	   // echo $val;
	  $this->load->view('Ceo_District/emis_uniform_indent',$data);
  }
  public function emis_footwear_indent()
  {
	     $scheme = $this->input->get('schemeid');
	     $dist  =$this->session->userdata('emis_district_id');
	     $blk =$this->input->get('block_id');
	
           if($scheme == 2)
			  {
				$data['footwearboy'] = $this->Ceo_District_model->footwear_indentboy($scheme,$dist,$blk);	  
				$data['footweargirl'] = $this->Ceo_District_model->footwear_indentsgirl($scheme,$dist,$blk);
			  }	
	
	       if(!empty($blk))
		      {
		        $scheme = substr($blk,0,1);
				$blks = substr($blk,1,3);
				$data['footwearboy'] = $this->Ceo_District_model->footwear_indentboy($scheme,$dist,$blks);
				$data['footweargirl'] = $this->Ceo_District_model->footwear_indentsgirl($scheme,$dist,$blks);
			  }
		  $this->load->view('Ceo_District/emis_footwear_indent',$data); 
  }
  	  public function emis_bag_indent()
	  {
		    
            $dist  =$this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
			
	  if(!empty($blk))
	  {
		 
		  $data['bag_indent'] = $this->Ceo_District_model->bag_indent($dist,$blk);
		  
	  }
	  else 
	  {
		  $data['bag_indent'] = $this->Ceo_District_model->bag_indent($dist,$blk);
	   }
	   $this->load->view('Ceo_District/emis_bags_indent',$data); 
	  }
	  
	   public function emis_crayan_indent()
	  {
	        $dist  = $this->session->userdata('emis_district_id');
	        $blk = $this->input->get('block_id');
			
			
	  	if(!empty($blk))
		{
		 
		  $data['crayan_indent'] = $this->Ceo_District_model->crayan_indent($blk,$dist);
		 }
			
	    else
	    {
		 $data['crayan_indent'] = $this->Ceo_District_model->crayan_indent($blk,$dist);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_crayan_indent',$data); 
	  }
	  
	    public function emis_colorpencil_indent()
	  {
		    
		    $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
			
			 if(!empty($blk)){
			 
			  $data['colorpencil_indent'] = $this->Ceo_District_model->colorpencil_indent($dist,$blk);	
			 }
			else{
			 $data['colorpencil_indent'] = $this->Ceo_District_model->colorpencil_indent($dist,$blk);	  
			}	
	  
	
		  $this->load->view('Ceo_District/emis_colorpencil_indent',$data); 
	  }
	   public function emis_geomentry_indent()
	  {
		    
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
	 if(!empty($blk))
	 {
		  
		  $data['geomentry_indent'] = $this->Ceo_District_model->geomentry_indent($dist, $blk);
		  
	  }	
	    else
	    {
		 $data['geomentry_indent'] = $this->Ceo_District_model->geomentry_indent($dist,$blk);	  
	    }	
		$this->load->view('Ceo_District/emis_geomentry_indent',$data); 
	  }
	   public function emis_atlas_indent()
	  {
		   
	        $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
		 if(!empty($blk))
		 {
		 
		  $data['atlas_indent'] = $this->Ceo_District_model->atlas_indent($dist,$blk);
		  }	
	    else
	     {
		 $data['atlas_indent'] = $this->Ceo_District_model->atlas_indent($dist,$blk);	  
	     }	
	     $this->load->view('Ceo_District/emis_atlas_indent',$data); 
	  }
	  
	  // public function deslap_indent()
       // {
		    // $scheme = $this->input->get('schemeid');
			// // echo $scheme;
	        // $dist  = $this->session->userdata('emis_district_id');
		    // $blk =$this->input->get('block_id');
			// $laps = $this->input->post('lap');
		    // $flag = substr($laps,0,1);
			// $class = substr($laps,1,2);
			 
		 // if(!empty($blk))
		 // {
		   // $flag = substr($blk,0,1);
			// $class = substr($blk,1,2);	 
		  // $scheme = substr($blk,2,1);
		  // $blks = substr($blk,3,3);
		  // $data['lap_indent'] = $this->Ceo_District_model->lap_indent($scheme,$dist,$blks,$flag,$class);
		  // }	
	     // if($scheme == 11)
	     // {
		 // $data['lap_indent'] = $this->Ceo_District_model->lap_indent($scheme,$dist,$blks,$flag,$class);	  
	     // }	else {
			 // $scheme == 11;
			  // $data['lap_indent'] = $this->Ceo_District_model->lap_indent($scheme,$dist,$blks,$flag,$class);
		 // }
		 // $data['tflag']= $data['lap_indent'][0]->transfer_flag;
		  // $data['cls']= $data['lap_indent'][0]->c11;
		  // $data['clss']= $data['lap_indent'][0]->c12;
		 
		 
	     // $this->load->view('Ceo_District/emis_dselap_indent',$data); 
	  // }
       public function emis_desuniform_indent()
  {
	$dist  =$this->session->userdata('emis_district_id');
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
  $class ="and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ";
  if(!empty($management_type)){
    $class .= "and ( school_type_id in (".$ids."))";
  }else{
    $class .= "and ( school_type_id =1 or school_type_id =2 )";
  }
	
	if(!empty($set))
	  {
		$data['uniformboy'] = $this->Ceo_District_model->desuniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
        $data['uniformgirl'] = $this->Ceo_District_model->desuniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);		
		
      }	
	
      if($scheme == 1)
	  {
		$data['uniformboy'] = $this->Ceo_District_model->desuniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);	  
		$data['uniformgirl'] = $this->Ceo_District_model->desuniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
      }	
	 
	  if(!empty($block)){
		  $schol = substr($block,0,1);
		  $set = substr($block,1,1);
		  $scheme = substr($block,2,1);
		  $blk = substr($block,3,3);
		  // echo $schol; echo'<br>'; echo $set; echo'<br>';  echo  $scheme; echo'<br>';  echo $blk; 
		  $data['uniformboy'] = $this->Ceo_District_model->desuniform_indentboy($scheme,$dist,$set,$blk,$schol,$class,$tname);
		  $data['uniformgirl'] = $this->Ceo_District_model->desuniform_indentgirl($scheme,$dist,$set,$blk,$schol,$class,$tname);
	  }
     $data['sets']=$set;
     $data['management_type']=$management_type;
	    $data['val']= $data['uniformboy'][0]->hill_frst;
	   // echo $val;
	  $this->load->view('Ceo_District/emis_desuniform_indent',$data);
  }
   public function emis_desfootwear_indent()
  {
	     $scheme = $this->input->get('schemeid');
	     $dist  =$this->session->userdata('emis_district_id');
	     $blk =$this->input->get('block_id');
	
           if($scheme == 2)
			  {
				$data['footwearboy'] = $this->Ceo_District_model->desfootwear_indentboy($scheme,$dist,$blk);	  
				$data['footweargirl'] = $this->Ceo_District_model->desfootwear_indentsgirl($scheme,$dist,$blk);
			  }	
	
	       if(!empty($blk))
		      {
		        $scheme = substr($blk,0,1);
				$blks = substr($blk,1,3);
				$data['footwearboy'] = $this->Ceo_District_model->desfootwear_indentboy($scheme,$dist,$blks);
				$data['footweargirl'] = $this->Ceo_District_model->desfootwear_indentsgirl($scheme,$dist,$blks);
			  }
		  $this->load->view('Ceo_District/emis_desfootwear_indent',$data); 
  }
  public function emis_desbag_indent()
	  {
		   
            $dist=$this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
	
	  if(!empty($blk))
	  {
		 
		  $data['bag_indent'] = $this->Ceo_District_model->desbag_indent($dist,$blk);
		  
	  }
	  else 
	  {
		   $data['bag_indent'] = $this->Ceo_District_model->desbag_indent($dist,$blk);
	  }
	   $this->load->view('Ceo_District/emis_desbag_indent',$data); 
	  }
    //pearlin
    public function stud_community_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     //$school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
        $dist=$this->session->userdata('emis_district_id');
          $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');

  //  $mng_cat=$this->input->get('magt_type');
       
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

       // print_r($manage);die();
      if($manage!="" && $school_cate){ 
 
        $data['school_community'] = $this->Ceo_District_model->stud_community_report($dist,$manage,$school_cate);
      
      }else{

       $data['school_community'] = $this->Ceo_District_model->stud_community_report($dist,$manage,$school_cate); 
      }
        // $data['school_community'] = $this->Statemodel->stud_community_report();
          $this->load->view('Ceo_District/emis_stud_community_report',$data);
       }else{redirect('/', 'refresh');}
  }
     public function stud_community_report_dist()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $community_name =  $this->input->get('community_name');
    $data['community_name'] = $community_name;
      // print_r($community_name)
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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
      $data['details'] = $this->Ceo_District_model->stud_community_report_dist($community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->stud_community_report_dist( $community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $this->load->view('Ceo_District/emis_stud_community_report_dist',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }

  public function stud_community_report_blk()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
       $community_name =  $this->input->get('community_name');
       $dist_id =  $this->input->get('dist_id');
      $data['community_name'] = $community_name;
      $data['dist_id'] = $dist_id;
      // print_r($community_name)
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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
      $data['details'] = $this->Ceo_District_model->stud_community_report_blk($dist_id,$community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->stud_community_report_blk($dist_id,$community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $this->load->view('Ceo_District/emis_stud_community_report_blk',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function stud_community_report_schl()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
       $community_name =  $this->input->get('community_name');
       $blk =  $this->input->get('blk');
      $data['community_name'] = $community_name;
      $data['blk'] = $blk;
      // print_r($community_name)
      $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate();
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
     

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
      $data['details'] = $this->Ceo_District_model->stud_community_report_schl($blk,$community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Ceo_District_model->stud_community_report_schl($blk,$community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $data['blk'] = $blk;
      $this->load->view('Ceo_District/emis_stud_community_report_schl',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
    //

	   public function emis_descrayan_indent()
	  {
		    // $scheme = $this->input->get('schemeid');
	        $dist  = $this->session->userdata('emis_district_id');
	        $blk = $this->input->get('block_id');
			
			
	  	if(!empty($blk))
		{
		  // $scheme = substr($blk,0,1);
		  // $blks = substr($blk,1,3);
		  $data['crayan_indent'] = $this->Ceo_District_model->descrayan_indent($blk,$dist);
		 }
			
	    else
	    {
		 $data['crayan_indent'] = $this->Ceo_District_model->descrayan_indent($blk,$dist);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_descrayan_indent',$data); 
	  }
	  
	    public function emis_descolorpencil_indent()
	  {
		    // $scheme = $this->input->get('schemeid');
		    $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
			
			 if(!empty($blk)){
			  // $scheme = substr($blk,0,1);
			  // $blks = substr($blk,1,3);
			  $data['colorpencil_indent'] = $this->Ceo_District_model->descolorpencil_indent($dist,$blk);	
			 }
			else 
			{
			 $data['colorpencil_indent'] = $this->Ceo_District_model->descolorpencil_indent($dist,$blk);	  
			}	
	  
	
		  $this->load->view('Ceo_District/emis_descolorpencil_indent',$data); 
	  }
	   public function emis_desgeomentry_indent()
	  {
		    // $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			
	 if(!empty($blk))
	 {
		
		  $data['geomentry_indent'] = $this->Ceo_District_model->desgeomentry_indent($dist,$blk);
		  
	  }	
	    else
	    {
		 $data['geomentry_indent'] = $this->Ceo_District_model->desgeomentry_indent($dist,$blk);	  
	    }	
		$this->load->view('Ceo_District/emis_desgeomentry_indent',$data); 
	  }
	   public function emis_desatlas_indent()
	  {
		    
	        $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
		 if(!empty($blk))
		 {
		  
		  $data['atlas_indent'] = $this->Ceo_District_model->desatlas_indent($dist,$blk);
		  }	
	     else
	     {
		 $data['atlas_indent'] = $this->Ceo_District_model->desatlas_indent($dist,$blk);	  
	     }	
	     $this->load->view('Ceo_District/emis_desatlas_indent',$data); 
	  }
	  
	   public function emis_Sweater_indent()
	  {
		    $scheme = $this->input->get('schemeid');
			$size=$this->input->post('size');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
	    if(!empty($size))
	    {
		$data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$size,$class );
        }	
		
		if(!empty($blk)){
		  
		  $sizes = substr($blk,0,2);
		  $scheme = substr($blk,2,2);
		  $blks = substr($blk,4,3);
		  $data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );
		  
	    }
	    if($scheme == 12)
	    {
		 $data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );	  
	    }	
	  
	
		  $this->load->view('Ceo_District/emis_sweater_indent',$data); 
	  }
	  public function emis_dessweater_indent()
	  {
		    $scheme = $this->input->get('schemeid');
			$size=$this->input->post('size');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			
	    if(!empty($size))
	    {
		$data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$size,$class );
        }	
		
		if(!empty($blk)){
		  
		  $sizes = substr($blk,0,2);
		  $scheme = substr($blk,2,2);
		  $blks = substr($blk,4,3);
		  $data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );
		  
	    }
	    if($scheme == 12)
	    {
		 $data['sweater_indent'] = $this->Ceo_District_model->sweater_indent($scheme,$dist,$blks,$sizes,$class );	  
	    }	
	  
	
		  $this->load->view('Ceo_District/emis_dessweater_indent',$data); 
	  }

       public function emis_notebook_indent()
	  {
		     $scheme = $this->input->get('schemeid');
			 $note =$this->input->post('note');
	         $term =$this->input->post('term');
			 $dist = $this->session->userdata('emis_district_id');
			 $blk =$this->input->get('block_id');
			
		  // $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
		  if(!empty($note))
		  {
		  $data['note'] =$this->Ceo_District_model->notes($dist,$blks,$note,$term);
		  }
		  else if(!empty($blk))
		  {
		   $terms = substr($blk,0,1);
		  $notes = substr($blk,1,2);
		  $blks = substr($blk,2,3);	  
			  
		  $data['note'] =$this->Ceo_District_model->notes($dist,$blks,$notes,$terms);
	      }
		  else
		  {
			   $not =1; $tem =1;
			  $data['note'] =$this->Ceo_District_model->notes($dist,$blks,$not,$tem);  
		  }
		  
		  
			$data['notes'] =$this->Ceo_District_model->notebook($scheme);
			
		
		  $this->load->view('Ceo_District/emis_notebook_indent',$data); 
	  }
	  
	  public function emis_deeankleboot_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['ankleboot_indent'] = $this->Ceo_District_model->ankleboot($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 16)
	    {
		 $data['ankleboot_indent'] = $this->Ceo_District_model->ankleboot($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_deeankleboot_indent',$data);
	  }
	   public function emis_dseankleboot_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			 $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['ankleboot_indent'] = $this->Ceo_District_model->ankleboot($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 16)
	    {
		 $data['ankleboot_indent'] = $this->Ceo_District_model->ankleboot($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_dseankleboot_indent',$data);
	  }
	  
	  
	  //socks
	   public function emis_deesocks_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['socks_indent'] = $this->Ceo_District_model->socks_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 17)
	    {
		 $data['socks_indent'] = $this->Ceo_District_model->socks_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_deesocks_indent',$data);
	  }
	   public function emis_dsesocks_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			 $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['socks_indent'] = $this->Ceo_District_model->socks_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 17)
	    {
		 $data['socks_indent'] = $this->Ceo_District_model->socks_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_dsesocks_indent',$data);
	  }
	  
	  //raincoat
	  
	   public function emis_deeraincoat_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['raincoat_indent'] = $this->Ceo_District_model->raincoat_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 18)
	    {
		 $data['raincoat_indent'] = $this->Ceo_District_model->raincoat_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_deeraincoat_indent',$data);
	  }
	   public function emis_dseraincoat_indent()
	  {
		    $scheme = $this->input->get('schemeid');
            $dist  = $this->session->userdata('emis_district_id');
	        $blk =$this->input->get('block_id');
			 $class = "and(cate_type = 'High School' or cate_type = 'Higher Secondary School')";
			//$class = "and(cate_type = 'Primary School' or cate_type = 'Middle School')";
			
		if(!empty($blk))
		{
		  $scheme = substr($blk,0,2);
		  $blks = substr($blk,2,3);
		  $data['raincoat_indent'] = $this->Ceo_District_model->raincoat_indent($scheme,$dist,$blks,$class);
		 }
			
	    if($scheme == 18)
	    {
		 $data['raincoat_indent'] = $this->Ceo_District_model->raincoat_indent($scheme,$dist,$blks,$class);	  
	    }	
	  
	  
		  $this->load->view('Ceo_District/emis_dseraincoat_indent',$data);
	  }
	  
	  //pearlin
public function students_Dropped_out_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $dist_id=$this->session->userdata('emis_district_id');
  $data['student_osc'] = $this->Ceo_District_model->students_Dropped_out_block($dist_id);
   
    $this->load->view('Ceo_District/students_Dropped_out_block',$data);
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
  $data['student_osc'] = $this->Ceo_District_model->students_Dropped_out_school($block_id);
   
    $this->load->view('Ceo_District/students_Dropped_out_school',$data);
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
  $data['student_osc'] = $this->Ceo_District_model->students_Dropped_out_student_list($school_id);
   
    $this->load->view('Ceo_District/students_Dropped_out_student_list',$data);
  } else { redirect('/', 'refresh'); }

} 

    //school_needs CSR report by raj
	
	public function school_needs_csr()
	{
		  $dist =$this->session->userdata('emis_district_id');
		  
		  $blk = $this->uri->segment(3,0);
		  $cate1 = $this->uri->segment(4,0);  
		  $sub_cate1 = $this->uri->segment(5,0); 
		  $item1 = $this->uri->segment(6,0); 
		  
		  $item = $_POST['itemname'];
		  $cate = $_POST['cate'];
		  $sub_cate = $_POST['sub_cate'];
		  
				  if(!empty($item))
				  {
				      $data['item'] = $item;
				  }else {
					  $data['item'] = 0;}
				  if(!empty($cate))
				  {
				      $data['cat'] = $cate;
				  }else {
					  $data['cat'] = 0;
				  }
				  if(!empty($sub_cate))
				  {
				     $data['sub_cat'] = $sub_cate;
				  }else {
					 $data['sub_cat'] = 0;  
				  }
		
		  $data['csr_material_master'] =$this->Ceo_District_model->school_needs_csr_material_master();
		  $data['cate'] =$this->Ceo_District_model->cate();
		  $data['sub_cate'] =$this->Ceo_District_model->sub_cate();
		  
		  if(!empty($cate) || !empty($item) || !empty($sub_cate))
		  {
		      $data['school_needs_csr'] = $this->Ceo_District_model->school_needs_csr($dist,$blk,$item,$cate,$sub_cate);
		  }
		  else
		  {
			  $data['school_needs_csr'] = $this->Ceo_District_model->school_needs_csr($dist,$blk,$item1,$cate1,$sub_cate1);
		  }
		  $this->load->view('Ceo_District/emis_school_needs_csr_report',$data);
       
	}
	  
public function schools_with_zero_staff_profile()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $dist_id=$this->session->userdata('emis_district_id');
  $data['student_osc'] = $this->Ceo_District_model->schools_with_zero_staff_profile($dist_id);
   
    $this->load->view('Ceo_District/schools_with_zero_staff_profile',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schools_with_zero_staff()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $block_id=$this->input->get('block_id');
  $data['student_osc'] = $this->Ceo_District_model->schools_with_zero_staff($block_id);
   
    $this->load->view('Ceo_District/schools_with_zero_staff',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schools_with_zero_enrollment()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $dist_id=$this->session->userdata('emis_district_id');
  $data['student_osc'] = $this->Ceo_District_model->schools_with_zero_enrollment($dist_id);
   
    $this->load->view('Ceo_District/schools_with_zero_enrollment',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schools_with_zero_enroll_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $block_id=$this->input->get('block_id');
  $data['student_osc'] = $this->Ceo_District_model->schools_with_zero_enroll_schl($block_id);
   
    $this->load->view('Ceo_District/schools_with_zero_enroll_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
public function dge_2017_18_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dist_id=$this->session->userdata('emis_district_id');

  $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->dge_2017_18_report_blk($dist_id)),true);
  
       $result = array();$key='block_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('Ceo_District/dge_2017_18_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function dge_2017_18_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  // $block_id=$this->input->get('block_id');
     $dist_id=$this->session->userdata('emis_district_id');
      $data['student_migration_details'] =$this->Ceo_District_model->dge_2017_18_report_schl($dist_id);
  

    $this->load->view('Ceo_District/dge_2017_18_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 

public function dge_2018_19_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dist_id=$this->session->userdata('emis_district_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->dge_2018_19_report_blk($dist_id)),true);
  
       $result = array();$key='block_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('Ceo_District/dge_2018_19_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function dge_2018_19_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  // $block_id=$this->input->get('block_id');
    $dist_id=$this->session->userdata('emis_district_id');
      $data['student_migration_details'] =$this->Ceo_District_model->dge_2018_19_report_schl($dist_id);
  

    $this->load->view('Ceo_District/dge_2018_19_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
  public function teacher_child_studyingstatus_district()
{

$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $district_id=$this->session->userdata('emis_district_id');
    //print_r($district_id);die();
     $data['child_studying_status'] = json_decode(json_encode($this->Ceo_District_model->teacher_child_studyingstatus_district($district_id)),true);
 
       $result = array();$key='block_name';
     
                              foreach( $data['child_studying_status'] as $child) {
                                  if(array_key_exists($key, $child)){
                                       $result[$child[$key]][] = $child;
                                  }else{
                                      $result[""][] = $child;
                                  }
                               }
                       //print_r($result) ;die();            
 
       $data['child_studying_status']=$result;
$this->load->view('Ceo_District/emis_state_teacher_child_report_district',$data);
} 

  } 
    public function teacher_child_studyingstatus_block()
{

$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $block_id=$this->input->get('block_id');
    //print_r($block_id);die();
     $data['child_studying_status'] = json_decode(json_encode($this->Ceo_District_model->teacher_child_studyingstatus_block($block_id)),true);
 
       $result = array();$key='school_name';
     
                              foreach( $data['child_studying_status'] as $child) {
                                  if(array_key_exists($key, $child)){
                                       $result[$child[$key]][] = $child;
                                  }else{
                                      $result[""][] = $child;
                                  }
                               }
                       //print_r($result) ;die();            
 
       $data['child_studying_status']=$result;
$this->load->view('Ceo_District/emis_state_teacher_child_report_block',$data);
} 

  } 
   public function class_12_status_cate_blk()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $district_id=$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->class_12_status_cate_blk($district_id);

    $this->load->view('Ceo_District/class_12_status_cate_blk',$data);
  } else { redirect('/', 'refresh'); }


}
public function class_12_status_cate_schl()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $district_id=$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->class_12_status_cate_schl($district_id);

    $this->load->view('Ceo_District/class_12_status_cate_schl',$data);
  } else { redirect('/', 'refresh'); }


}

public function class_12_status_cate_17_18_blk()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
$district_id=$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->class_12_status_cate_17_18_blk($district_id);

    $this->load->view('Ceo_District/class_12_status_cate_17_18_blk',$data);
  } else { redirect('/', 'refresh'); }


}
public function class_12_status_cate_17_18_schl()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
$district_id=$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->class_12_status_cate_17_18_schl($district_id);

    $this->load->view('Ceo_District/class_12_status_cate_17_18_schl',$data);
  } else { redirect('/', 'refresh'); }


}
public function get_block_migration_remarks()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
              $dist_id=$this->session->userdata('emis_district_id');
            //  print_r($dist_id);
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->get_blk_student_migration_remarks($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_student_migration_block_remarks',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_school_migration_remarks()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
              $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->get_school_student_migration_remarks($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/emis_student_migration_school_remarks',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schoolwise_class_question_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $dist_id=$this->session->userdata('emis_district_id');
    $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate_124();
      
    $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

     // print_r($this->input->post());
      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
    //  print_r($manage);die();

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
      $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->schoolwise_class_question_report_blk($dist_id,$manage,$school_cate)),true);
 
       $result = array();$key='block_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

     }
     else
     {
       $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->schoolwise_class_question_report_blk($dist_id,'','')),true);
 
       $result = array();$key='block_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;
         $data['dist_id']=$dist_id;
     }
     $data['dist_id']=$dist_id;

    $this->load->view('Ceo_District/schoolwise_class_question_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schoolwise_class_question_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $blk_id=$this->input->get('block_id');
   $data['getmanagecate'] = $this->Ceo_District_model->getmanagecate_124();
      
      $data['getsctype'] = $this->Ceo_District_model->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

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


      if($manage!="" && $school_cate){ 
      $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->schoolwise_class_question_report_schl($blk_id,$manage,$school_cate)),true);
 
       $result = array();$key='school_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;
     }
     else
     {
       $data['student_migration_details'] = json_decode(json_encode($this->Ceo_District_model->schoolwise_class_question_report_schl($blk_id,'','')),true);
 
       $result = array();$key='school_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;
     }

    $this->load->view('Ceo_District/schoolwise_class_question_report_schl',$data);
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
     $dist_id=$this->session->userdata('emis_district_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Ceo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_blk($dist_id,$pst,$gender);
          //print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
    $this->load->view('Ceo_District/slas_report_blk',$data);
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
    $this->load->model('Ceo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_schl($blk_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
    $this->load->view('Ceo_District/slas_report_schl',$data);
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
     $dist_id=$this->session->userdata('emis_district_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Ceo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_schl_blk($dist_id,$catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
      $data['catty_id']=$catty_id;
      $data['manage_id']=$manage_id;

    $this->load->view('Ceo_District/slas_report_schl_blk',$data);
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
    $this->load->model('Ceo_District_model');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_schl_wise($blk_id, $catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
      $data['manage_id']=$manage_id;
    $this->load->view('Ceo_District/slas_report_schl_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_cate_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Ceo_District_model');
    $dist_id=$this->session->userdata('emis_district_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_cate_dist($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/slas_report_cate_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_mana_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Ceo_District_model');
    $dist_id=$this->session->userdata('emis_district_id');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Ceo_District_model->slas_report_mana_dist($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('Ceo_District/slas_report_mana_dist',$data);
  } else { redirect('/', 'refresh'); }

} 

//office staff transfer by raju

public function offstaff_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            $districtid =$this->session->userdata('emis_district_id');
				$data['offstaff_details'] = $this->Ceo_District_model->offstaff_details($districtid);
			    $this->load->view('Ceo_District/emis_offstaff_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
public function offstaff_transfer()
{   
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	$school_id=$this->input->get('schoolid');
    if($emis_loggedin) 
	{
	  $dist=$this->session->userdata('emis_district_id');
	 
	  $data['govstaff_school_details'] = $this->Ceo_District_model->offstaff_transfer($dist,$school_id);
	  $data['dist_id']=$this->Ceo_District_model->dist_id();
	  $data['teacher_join_reason']=$this->Ceo_District_model->teacher_join_reason();
	  $data['teacher_trans_priority']=$this->Ceo_District_model->teacher_trans_priority();
	  $this->load->view('Ceo_District/emis_off_staff_transfer',$data);
	} 
	else { redirect('/', 'refresh'); }
}

public function offgenerate_pdf()
      {

        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin)
          {
            $staff_id = $this->uri->segment(3,0);
			// echo $staff_id;
            $staff_details = $this->Ceo_District_model->offtransfer_pdf($staff_id)[0];
			
            $data['staff_details'] = $staff_details;
			
			
            $html = $this->load->view('Ceo_District/emis_destransfer_staff_pdf',$data,true);
            $this->m_pdf = new mpdf('ta',[216, 356]);
            $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      }
public function student_marks_9_10_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $termid = $this->input->post('termid')==''? 2:$this->input->post('termid');
   $cls_id= $this->input->post('cls_id')==''?'9,10':$this->input->post('cls_id');
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
    $dist_id=$this->session->userdata('emis_district_id');
     $data['student_migration_details'] = $this->Ceo_District_model->student_marks_9_10_blk($dist_id,$termid,$tname,$cls_id);

    $this->load->view('Ceo_District/student_marks_9_10_blk',$data);
  } else { redirect('/', 'refresh'); }

}  
 public function student_marks_9_10_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
     $termid = $this->input->post('termid')==''? 2:$this->input->post('termid');
     $cls_id= $this->input->post('cls_id')==''?'9,10':$this->input->post('cls_id');
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
    $block_id=$this->input->get('block_id');
     $data['student_migration_details'] = $this->Ceo_District_model->student_marks_9_10_schl($block_id,$termid,$tname,$cls_id);
 
    
    $this->load->view('Ceo_District/student_marks_9_10_schl',$data);
  } else { redirect('/', 'refresh'); }

}  

 public function emis_gis_video()
    {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $dist_id  =$this->session->userdata('emis_district_id');
        $data['schoolsurp'] = $this->Ceo_District_model->emis_staff_surplus_tot_subject($dist_id);
        $data['surptot'] = $this->Ceo_District_model->surplus_tot($dist_id);
        $data['surplus_sub'] = $this->Ceo_District_model ->surplus_sub($dist_id);
        $this->load->view('Ceo_District/emis_gis_video',$data);
        
      }
     
    }
    
   /**Function Added by wesley**/  
   public function emis_staff_pindics()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				// $districtid=$_GET['districtid'];
				$districtid  =$this->session->userdata('emis_district_id');
				$data['pindics_report'] = $this->Ceo_District_model->emis_staff_pidics($districtid);
        //$head_details = $this->get_common_control_link();
				//$data['header'] = $head_details['header'];
				//$data['link'] = $head_details['link'];
				$this->load->view('Ceo_District/emis_staff_pindics',$data); 
			}
  }

    public function pindics_teacher_status_reset()
    {
       $this->load->library('session');
           $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
          $districtid  =$this->session->userdata('emis_district_id');        
          $data['staff_stud_dist_school_details'] = $this->Ceo_District_model->pindics_teachr_status_reset_rep($districtid);        
          $this->load->view('pindics_teacher_status_reset',$data); 
        }
    }
  
    public function teacher_status_reset(){
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data = array(
        'teacher_id'             =>$this->input->post('teacher_id'),
        'status'           =>'0',
        //'hm_ev_date'           => date('Y-m-d H:i:s')
      );
      $status_reset=$this->Ceo_District_model->teacher_status_reset($data);
      echo $status_reset;
      }
    }
    public function get_BRTE_username_pw()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
       
        $dist=$this->session->userdata('emis_district_id');
        $data['brte'] = $this->Ceo_District_model->get_BRTE_username_pw($dist); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
      
        $this->load->view('Ceo_District/get_BRTE_username_pw',$data); 
      }
  }
  
  public function profile_status_blockwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		   $district_id=$this->session->userdata('emis_district_id');
		  $school_type= $this->input->post('school_type');
		  $data['school_type_c']=$school_type;
	     $data['district_profile_completion_status'] = $this->Ceo_District_model->district_profile_completion_status($district_id,$school_type);
	   $data['school_type'] = $this->Statemodel->school_type();
	   $this->load->view('Ceo_District/emis_district_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}
public function profile_status_schoolkwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $block_id=$this->input->get('block');
		  $school_type= $this->input->post('school_type');
	  $data['block_profile_completion_status'] = $this->Ceo_District_model->block_profile_completion_status($block_id,$school_type);
	  
	   $this->load->view('Ceo_District/emis_block_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}

public function profile_status_schoollist_distwise(){
  $this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id=$this->session->userdata('emis_district_id');
      $school_type= $this->input->post('school_type');
      $data['block_profile_completion_status_alternative'] = $this->Ceo_District_model->block_profile_completion_status_alternative($district_id,$school_type);
      $data['school_type'] = $this->Statemodel->school_type();
	    $this->load->view('Ceo_District/emis_block_profile_completed_alternative',$data);
    }
    else { redirect('/', 'refresh'); }
}
public function update_finalsubmit_part1()
{
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
              $school_id = $this->input->post('school');
			  $partid = $this->input->post('part_id');
			  if($partid==1)
			  {
			   $updatepart['part_1'] =1;
			  }
			  else if($partid==2)
			  {
	           $updatepart['part_2'] =1;
	          }
			  else if($partid==3)
			  {
	           $updatepart['part_3'] =1;
	          }
			  else if($partid==4)
			  {
	           $updatepart['part_4'] =1;
	          }
			  else if($partid==5)
			  {
	           $updatepart['part_5'] =1;
	          }
			  else if($partid==6)
			  {
	           $updatepart['part_6'] =1;
	          }
			  else if($partid==7)
			  {
	           $updatepart['part_7'] =1;
	          }
			   else if($partid==8)
			  {
	           $updatepart['part_8'] =1;
	          }
		      $where = array('school_key_id'=>$school_id);
		      //$tablename='schoolnew_profilecomplete';
			  $result = $this->Ceo_District_model->update_profilecompletion_status($updatepart,$where);
		      echo $result;
		 }

	 else { redirect('/', 'refresh'); }

}
  
  /**ends**/  
}
?>

