<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

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
    $this->load->library('session'); 
    $this->load->model('Homemodel');
	$this->load->model('Ceo_District_model');
    $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel'); 	
    $this->load->model('Schoolgroupmodel');
    $this->load->model('Blockmodel');
    $this->load->helper('common_helper');
  }
   
	function isValidLongitude($longitude){
		if(preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/",$longitude)) {
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

 //    public function emis_state_home(){
	// 	$this->load->library('session');
	// 	$emis_loggedin = $this->session->userdata('emis_loggedin');
	// 	if($emis_loggedin) {
	// 		$data['getmanagecate'] = $this->Statemodel->getmanagecate();
	// 		$manage =$this->session->userdata('emis_statereport_schmanage');
	// 		// $data['schooldist'] = $this->Datamodel->getallachooldist();
	// 		if($manage!=""){ 
	// 			$data['classcount']=$this->Statemodel->getallcurrentcountsbyclass1($manage);
	// 		}else{
	// 			$data['classcount']=$this->Statemodel->getallcurrentcountsbyclass(); 
	// 		}
	// 		$this->load->view('state/emis_state_dash1',$data);
	// 		// // echo json_encode($data['classcount']);
	// 	} else { redirect('/', 'refresh'); }

	// }
	public function emis_state_home(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			
			$data['getsctype'] = $this->Statemodel->get_school_type();
      
			
			$manage = $this->session->userdata('emis_statereport_schmanage');

		    $manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');

	//	$mng_cat=$this->input->get('magt_type');
		   
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


			
		   

			if($manage!="" && $school_cate){ 

				$data['classcount']  = $this->Statemodel->getallstateclass($manage,$school_cate);
			
			}else{
				$data['classcount']=$this->Statemodel->getallstateclass('',''); 
			}
			//print_r($data);

			$this->load->view('state/emis_state_dash1',$data);
			
		} else { redirect('/', 'refresh'); }

	}

		public function emis_state_DEE(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			
			$data['getsctype'] = $this->Statemodel->get_school_type();
      
			
			$manage = $this->session->userdata('emis_statereport_schmanage');

		    $manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');

	//	$mng_cat=$this->input->get('magt_type');
		    if(!empty($manage)){
                        $result = Common::session_search_filter($manage,$school_cate,1);
                  }else
                  {
                        $result = Common::session_search_filter('','',1);
                        $manage = $result['manage'];
                        $school_cate = $result['school_cate'];
                  }
      
                  // print_r($result);
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


			if($manage!="" && $school_cate){ 

				$data['classcount']  = $this->Statemodel->getallstate_dee($manage,$school_cate);
			
			}else{
				$data['classcount']=$this->Statemodel->getallstate_dee('',''); 
			}
			//print_r($data);

			$this->load->view('state/emis_state_dee',$data);
			
		} else { redirect('/', 'refresh'); }

	}
//pearlin
  public function get_OSC_List()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->get_OSC_List($dist_id)),true);
 
       $result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('state/get_OSC_List',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function get_OSC_List_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $district_id=$this->input->get('district_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->get_OSC_List_block($district_id)),true);
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
    $this->load->view('state/get_OSC_List_block',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_OSC_List_school()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $block_id=$this->input->get('block_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->get_OSC_List_school($block_id)),true);
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
    $this->load->view('state/get_OSC_List_school',$data);
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
  $data['student_osc'] = $this->Statemodel->students_osc_reg($school_id);
   
    $this->load->view('state/students_osc_reg',$data);
  } else { redirect('/', 'refresh'); }

} 
public function students_Dropped_out()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin'); 
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $school_id=$this->input->get('school_id');
  $data['student_osc'] = $this->Statemodel->students_Dropped_out();
   
    $this->load->view('state/students_Dropped_out',$data);
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
  $dist_id=$this->input->get('dist_id');
  $data['student_osc'] = $this->Statemodel->students_Dropped_out_block($dist_id);
   
    $this->load->view('state/students_Dropped_out_block',$data);
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
  $data['student_osc'] = $this->Statemodel->students_Dropped_out_school($block_id);
   
    $this->load->view('state/students_Dropped_out_school',$data);
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
  $data['student_osc'] = $this->Statemodel->students_Dropped_out_student_list($school_id);
   
    $this->load->view('state/students_Dropped_out_student_list',$data);
  } else { redirect('/', 'refresh'); }

} 

public function stud_community_report()
  {
    
   $emis_loggedin = $this->session->userdata('emis_loggedin');
     //$school_id =$this->session->userdata('emis_school_id');
       if($emis_loggedin)
       {  
          $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
 
        $data['school_community'] = $this->Statemodel->stud_community_report($manage,$school_cate);
      
      }else{

       $data['school_community'] = $this->Statemodel->stud_community_report($manage,$school_cate); 
      }
        // $data['school_community'] = $this->Statemodel->stud_community_report();
          $this->load->view('state/emis_stud_community_report',$data);
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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
      $data['details'] = $this->Statemodel->stud_community_report_dist($community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->stud_community_report_dist( $community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $this->load->view('state/emis_stud_community_report_dist',$data);

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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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
      $data['details'] = $this->Statemodel->stud_community_report_blk($dist_id,$community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->stud_community_report_blk($dist_id,$community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $this->load->view('state/emis_stud_community_report_blk',$data);

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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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
      $data['details'] = $this->Statemodel->stud_community_report_schl($blk,$community_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->stud_community_report_schl($blk,$community_name,$manage,$school_cate);

    }

     $data['community_name'] =$community_name;
      $data['blk'] = $blk;
      $this->load->view('state/emis_stud_community_report_schl',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  


 
  //

	public function emis_state_DSE(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			
			$data['getsctype'] = $this->Statemodel->get_school_type();
      
			
			$manage = $this->session->userdata('emis_statereport_schmanage');

		    $manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');


	//	$mng_cat=$this->input->get('magt_type');
		   
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

			if($manage!="" && $school_cate){ 

				$data['classcount']  = $this->Statemodel->getallstate_dse($manage,$school_cate);
			
			}else{
				$data['classcount']=$this->Statemodel->getallstate_dse('',''); 
			}
			//print_r($data);

			$this->load->view('state/emis_state_dse',$data);
			
		} else { redirect('/', 'refresh'); }

	}
	public function emis_state_DMS(){
	$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			
			
			$data['getsctype'] = $this->Statemodel->get_school_type();
          
			$school_cate = $this->input->post('school_cate');
			
			
if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                     
                       $school_cate = $result['school_cate'];
                 }
     
                // print_r($result);
                 $data['cate'] = $school_cate;

			if($school_cate!=""){ 
              
				$data['classcount']  = $this->Statemodel->getallstate_dms($school_cate);
			
			}else{
				$data['classcount']=$this->Statemodel->getallstate_dms(''); 
			}
			//print_r($data);

			$this->load->view('state/emis_state_dms',$data);
			
		} else { redirect('/', 'refresh'); }


	}
/*	public function get_classwise_district()
  {
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {



			// $this->load->library('session'); 
			// $stateid = $this->session->userdata('emis_state_id');
			// $dist_id =$this->session->userdata('emis_statedist_id');
			// $this->load->database();
			$dist_id =  $this->input->get('dist');
			$data['dist_id'] = $dist_id;
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();

			// $manage =$this->session->userdata('emis_statereport_schmanage');
			// // $data['schooldist'] = $this->Datamodel->getallachooldist();
			// if($manage!=""){ 
			// $data['details'] = $this->Statemodel->get_emis_blockwise_district($dist_id,$manage);

			// }else{
				$data['details'] = $this->Statemodel->get_emis_blockwise_district($dist_id);
			// }
				// print_r($data);die;
			// $data['distname'] = $this->Statemodel->getsingledistname($dist_id);
			$this->load->view('state/emis_state_dash_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }*/

  public function get_dash_blockwise_school()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     	$data['dist'] = $this->input->get('dist');

  		$block_name = $this->input->get('block');

  		$data['block_name'] = $block_name;

  		//$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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

      $data['details'] = $this->Statemodel->get_blockwise_school($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_blockwise_school($block_name,$manage,$school_cate);

    }

  
  		// print_r($data);
  		$this->load->view('state/emis_state_dash_schoolwise',$data);
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

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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

      $data['details'] = $this->Statemodel->get_blockwise_dee($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_blockwise_dee($block_name,$manage,$school_cate);

    }

  
  		// print_r($data);
  		$this->load->view('state/emis_state_dee_schoolwise',$data);
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

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

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

      $data['details'] = $this->Statemodel->get_blockwise_dse($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_blockwise_dse($block_name,$manage,$school_cate);

    }

  		// print_r($data);
  		$this->load->view('state/emis_state_dse_schoolwise',$data);
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

      //$data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

     // $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
       // other
                 if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                 }
                 // print_r($result);
                // $data['manage'] = $manage;
                 $data['cate'] = $school_cate;

        if($school_cate!="")
        {
      $data['details'] = $this->Statemodel->get_blockwise_dms($block_name,$school_cate);
     }
     else
     {
     	   $data['details'] = $this->Statemodel->get_blockwise_dms($block_name,$school_cate);
     }
  
  		$this->load->view('state/emis_state_dms_schoolwise',$data);
  		} else { redirect('/', 'refresh'); }
  }

    public function emis_student_classwise(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id'); 
			$this->load->database();
			$this->load->model('Statemodel');

			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$manage =$this->session->userdata('emis_statereport_schmanage');
	
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclass1($manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclass();
			}
    
			$this->load->view('state/emis_state_analytics_class',$data);
			// // echo json_encode($data);
		} else { redirect('/', 'refresh'); }
	}
	
	public function emis_student_classwise_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$stateid = $this->session->userdata('emis_state_id');
			$dist_id =$this->session->userdata('emis_statedist_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblock1($dist_id,$manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblock($dist_id);
			}
			$data['distname'] = $this->Statemodel->getsingledistname($dist_id);
			$this->load->view('state/emis_state_blockwise',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

    public function savedistrictidsession(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$dist_ids = $this->input->post('dist_id');
			if($dist_ids!="" ){
				$this->session->set_userdata('emis_statedist_id',$dist_ids);
			}
			$dist_id =$this->session->userdata('emis_statedist_id');
			if($dist_id!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function saveblockidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$block_ids = $this->input->post('block_id');
			if($block_ids!="" ){
				$this->session->set_userdata('emis_stateblock_id',$block_ids);
			}
			$block_id =$this->session->userdata('emis_stateblock_id');
			if($block_id!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function emis_student_classwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$stateid = $this->session->userdata('emis_state_id');
			$block_id =$this->session->userdata('emis_stateblock_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			if($manage!=""){
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschool1($block_id,$manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschool($block_id); 
			}
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$this->load->view('state/emis_state_schoolwise',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}


    public function saveschoolidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$school_ids = $this->input->post('school_id');
			if($school_ids!="" ){
				$this->session->set_userdata('emis_stateschool_id',$school_ids);
			}
			$school_id =$this->session->userdata('emis_stateschool_id');
			if($school_id!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function emis_student_classwise_school(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$school_id =$this->session->userdata('emis_stateschool_id');
			$this->load->database();
			$this->load->model('Statemodel');

			$schoolprofile = $this->Statemodel->getschoolprofiledetails($school_id);
			$data['schoolname']  = $schoolprofile[0]->school_name;
			$data['udise_code']  = $schoolprofile[0]->udise_code;
			$data['blockname']  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
			$data['schoolcate']  = $this->Homemodel->getcatename($schoolprofile[0]->manage_cate_id);
			$data['schmanage']  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
			$data['schdirector']  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

			$data['details'] = $this->Statemodel->getallbrachesbyschool($school_id);
			$this->load->view('state/emis_state_schoolsingle',$data);
			// // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
	}

    public function saveclassidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$class_ids = $this->input->post('class_id');
			if($class_ids!="" ){
				$this->session->set_userdata('emis_stateclass_id',$class_ids);
			}
			$class_id =$this->session->userdata('emis_stateclass_id');
			if($class_id!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function emis_student_classwise_students(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$school_id =$this->session->userdata('emis_stateschool_id');
			$class_id =$this->session->userdata('emis_stateclass_id');
			$this->load->database();
			$this->load->model('Statemodel');

			$data['details'] = $this->Statemodel->getallstudentsbyschid($school_id,$class_id);
			$data['school_name'] = $this->Statemodel->getsingleschoolname($school_id);
			$data['class_name'] = $this->Statemodel->getsingleclassname($class_id);
			$this->load->view('state/emis_state_studentsall',$data);
			// // echo json_encode($data[' details']);
		} else { redirect('/', 'refresh'); }
	}




	public function emis_state_analytics(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->database();
			$this->load->model('Statemodel');
			$data['details'] = $this->Statemodel->getalldistrictcounts();
			$this->load->view('state/emis_state_analytics',$data);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_state_gender_analytics(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['result1'] = $this->Statemodel->getallgenderbydistrict2($manage);
			}else{
				$data['result1'] = $this->Statemodel->getallgenderbydistrict();
			}
			$this->load->view('state/emis_state_gender_analytics',$data);
 
			// // echo json_encode( $data['result1']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_state_community_analytics(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->database();
			$this->load->library('session');
			$this->load->model('Statemodel');
			$community ="";
			if($this->session->userdata('emis_community')!=""){
				$community =  $this->session->userdata('emis_community');
			}else{
				$this->session->set_userdata('emis_community','C1');
				$community ="C1";
			}
			$data['communityname'] = $this->Statemodel->getcommunityname($community);
			$data['communityid'] = $community;
			$data['communities'] = $this->Statemodel->getallgenderbydistrict1($community);
			$this->load->view('state/emis_state_community_analytics',$data);
			// // echo json_encode( $data['communities']);
		} else { redirect('/', 'refresh'); }
	}

    public function saveblockoverallsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$district_ids = $this->input->post('district');
			if($district_ids!="" ){
				$this->session->set_userdata('emis_districtstate_id',$district_ids);
			}
			$district_id =$this->session->userdata('emis_districtstate_id');
			if($district_id!=""){
				// echo true;
			}else{
				// echo false;
			}
		} else { redirect('/', 'refresh'); }
	}

    public function emis_state_analytics_blocks(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$district_id =$this->session->userdata('emis_districtstate_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['distname'] = $this->Statemodel->getsingledistname($district_id);
			$data['details'] = $this->Statemodel->getallblockscountbydistrict($district_id);
			$this->load->view('state/emis_state_analytics_block',$data);
			// // echo json_encode($data[' details']);
		} else { redirect('/', 'refresh'); }
	}

	public function saveoverallblocksession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$blockt_ids = $this->input->post('blockid');
			if($blockt_ids!="" ){
				$this->session->set_userdata('emis_blockstate_id',$blockt_ids);
			}
			$block_id =$this->session->userdata('emis_blockstate_id');
			if($block_id!=""){
				// echo true;
			}else{
				// echo false;
			}

		} else { redirect('/', 'refresh'); }

	}

    public function emis_state_analytics_schools(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$block_id =$this->session->userdata('emis_blockstate_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$data['details'] = $this->Statemodel->getallblockcountsbyschool($block_id);
			$this->load->view('state/emis_state_analytics_school',$data);

		} else { redirect('/', 'refresh'); }
			// // echo json_encode($data[' details']);
	}
	
	public function savedistrictcommunity(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$blockt_ids = $this->input->post('dist_id');
			if($blockt_ids!="" ){
				$this->session->set_userdata('emis_distcommunity_id',$blockt_ids);
			}
			$block_id =$this->session->userdata('emis_distcommunity_id');
			if($block_id!=""){
				// echo true;
			}else{
				// echo false;
			}

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
				// echo true;
			}else{
				// echo false;
			}
		} else { redirect('/', 'refresh'); }
	}

    public function emis_state_community_blocks(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$community =  $this->session->userdata('emis_community');
			if($community==""){
				$this->session->set_userdata('emis_community','C1');
			}
			$district_id =$this->session->userdata('emis_distcommunity_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['communityid'] = $community;
			$data['distname'] = $this->Statemodel->getsingledistname($district_id);
			$data['details'] = $this->Statemodel->getallblockscommuniywise($district_id,$community);
			$this->load->view('state/emis_state_community_block',$data);
			// // echo json_encode($data[' details']);

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
				// echo true;
			}else{
				// echo false;
			}

		} else { redirect('/', 'refresh'); }
	}

    public function emis_state_community_schools(){
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
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$data['details'] = $this->Statemodel->getallblockkkcountsbyclassschool($block_id,$community);
			$this->load->view('state/emis_state_community_schools',$data);
			// // echo json_encode($data[' details']);

		} else { redirect('/', 'refresh'); }
	}

    public function emis_state_resetpassword(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$user_type_id=$this->session->userdata('emis_user_type_id');
			if($user_type_id==5){ 


				$this->load->view('state/emis_state_resetpassword');

			}else{
				// echo "Authentication Error! <br/>Not Authorized";
			}

		} else { redirect('/', 'refresh'); }
	}

	public function emis_state_passwordreset(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$this->load->database(); 
			$this->load->model('Statemodel');
			$username=$this->session->userdata('emis_username');
			$newpass = $this->input->post('newpassword');

			$data=array('emis_password'=>md5($newpass),'temp_log'=>1,'ref'=>$newpass);

			$reset  = $this->Statemodel->emis_state_resetpassword($stateid,$username,$data);

		} else { redirect('/', 'refresh'); }
	}

    public function emis_state_oldpasswordck(){
    
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$this->load->database(); 
			$this->load->model('Statemodel');
  
			$username=$this->session->userdata('emis_username');
			$oldpass = $this->Statemodel->getoldpassstate($stateid,$username);
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

    ////Report - wise
    public function emis_student_reportclass(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$stateid = $this->session->userdata('emis_state_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassreport1($manage); 
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassreport(); 
			}
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$this->load->view('state/emis_state_reportclass',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_student_report_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$stateid = $this->session->userdata('emis_state_id');
			$dist_id =$this->session->userdata('emis_statedist_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockreport1($dist_id,$manage); 
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockreport($dist_id); 
			}
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['distname'] = $this->Statemodel->getsingledistname($dist_id);
			$this->load->view('state/emis_state_report_district',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

    public function emis_student_report_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$stateid = $this->session->userdata('emis_state_id');
			$block_id =$this->session->userdata('emis_stateblock_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport1($block_id,$manage); 
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolreport($block_id);
			}
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$this->load->view('state/emis_state_report_block',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

    public function emis_student_report_school(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$school_id =$this->session->userdata('emis_stateschool_id');
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
			$this->load->view('state/emis_state_report_school',$data);
			// // echo json_encode($data[' details']);
		} else { redirect('/', 'refresh'); }
	}

    public function emis_student_classwise_report(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$school_id =$this->session->userdata('emis_stateschool_id');
			$class_id =$this->session->userdata('emis_stateclass_id');
			$this->load->database();
			$this->load->model('Statemodel');

			$data['details'] = $this->Statemodel->getallstudentsbyschidreport($school_id,$class_id);
			$data['school_name'] = $this->Statemodel->getsingleschoolname($school_id);
			$data['class_name'] = $this->Statemodel->getsingleclassname($class_id);
			$this->load->view('state/emis_state_report_class',$data);
			// // echo json_encode($data[' details']);
		} else { redirect('/', 'refresh'); }
	}




    ////Aadhaar card report
	public function emis_student_aadhaarclass(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$stateid = $this->session->userdata('emis_state_id');
			$this->load->database();
			$this->load->model('Statemodel');
	
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassaadhaar1($manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassaadhaar();
			}
  
			$this->load->view('state/emis_stu_aadhaar_report_class',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_student_aadhaar_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$stateid = $this->session->userdata('emis_state_id');
			$dist_id =$this->session->userdata('emis_statedist_id');
			$this->load->database();
			$this->load->model('Statemodel');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockaadhaar1($dist_id,$manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblockaadhaar($dist_id);
			}
    
			$data['distname'] = $this->Statemodel->getsingledistname($dist_id);
			$this->load->view('state/emis_stu_aadhaar_report_dist',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_student_aadhaar_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$stateid = $this->session->userdata('emis_state_id');
			$block_id =$this->session->userdata('emis_stateblock_id');
			$this->load->database();
			$this->load->model('Statemodel');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar1($block_id,$manage);
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschoolaadhaar($block_id);
			}
    
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$this->load->view('state/emis_stu_aadhaar_report_block',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}


	public function emis_state_reports(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->view('state/emis_state_home');

		} else { redirect('/', 'refresh'); }

	}
	
	public function emis_state_dash2(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$data['total1'] = $this->Statemodel->get_countdash1();
			//$data['government'] = $this->Statemodel->get_countdash2();
			//// echo json_encode($data['total1']);
			
			$this->load->view('state/emis_state_dash2',$data);

		} else { redirect('/', 'refresh'); }

	}
	

	public function emis_state_school_srch(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$data['dist'] = $this->Datamodel->getallachooldist();

			$data['details'] = $this->Statemodel->getalldistrictcountsbyclass();

			$distid=$this->input->post('emis_state_distid');
			$sch_name=$this->input->post('emis_state_school_name');

			$this->load->database();
			$this->load->model('Statemodel');
			
			// // echo json_encode($data);
			$this->load->view('state/emis_state_school_srch',$data);

		} else { redirect('/', 'refresh'); }

	}

  public function emis_districtwise_school()
  {
        $dist_id = $this->input->post('id');
        $sch_name = $this->input->post('query');
        //print_r($this->input->post());die;
        //print_r($dist_id);die();
        $res = $this->Statemodel->get_districtwise_school_name($dist_id,$sch_name);
        //print_r($res);
        echo(json_encode($res));
     
  }

  public function emis_blockwise_school()
  {
        $block_id = $this->input->post('id');
        $sch_name = $this->input->post('query');
        //print_r($this->input->post());die;
        //print_r($dist_id);die();
        $res = $this->Statemodel->get_blockwise_school_name($block_id,$sch_name);
        // print_r($res);die();
        // $pwd = explode(' - ',$res,2);
        // echo $pwd;die();
        echo(json_encode($res));
     
  }

  public function emis_state_school_details()
  {

      $distid  = $this->input->post('dist_id');
      $sch_name = $this->input->post('sch_name');
      $search = $this->input->post('search');
      if($search ==1){
      $sch_name = explode(" - ",$sch_name)[1];
      // echo $sch_name;
      }else
      {
          $sch_name = $sch_name;
      }
    // if($sch_name!=""){
        $schdetails = $this->Statemodel->getallschoolsby_idname($distid,$sch_name);
      // }
        echo json_encode($schdetails);

  }

  public function schl_pswd_resend()
  {

      $blockid  = $this->input->post('dist_id');
      $sch_name = $this->input->post('sch_name');
      if(!empty($this->input->post('email_id'))){
        $email = $this->input->post('email_id');
      }else{
        $email = $this->input->post('email_id_udise');
      }
      $search = $this->input->post('search');
      if($search ==1){
      $sch_name = explode(" - ",$sch_name)[1];
      }else
      {
          $sch_name = $sch_name;
      }
     if($sch_name!=""){
        $pswd = $this->Statemodel->getpswd($sch_name);

      //  $schdetails = "test";
        $subject = "Requested for resend your password from TN EMIS Cell";
        $txt = "Your password is :".$pswd;        
        $from = "donotreply.emis@gmail.com";
        $headers = "From:" .$from;
        $mail = mail($email,$subject,$pswd,$txt,$headers);
        if($mail == true){
          echo true;
        }else{
          echo false;
        }
        //return true;
        //$schdetails = $this->Statemodel->getallschoolsby_idname($blockid,$udise_code);
       }
      //  echo json_encode($schdetails);

  }

    public function emis_state_schoolmainid(){
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
					redirect('Home/emis_school_dash','refresh');
					// // echo $schoolid .' '.$school_udise;
				} 

		} else { redirect('Authentication/emis_login', 'refresh'); }

	}

	public function emis_statechange_school(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->session->unset_userdata('emis_school_id');
			$this->session->unset_userdata('emis_school_udise');

			redirect('State/emis_state_school_srch','refresh');

		} else { redirect('Authentication/emis_login', 'refresh'); }
	}

    public function emis_state_block_count(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$stateid = $this->session->userdata('emis_state_id');
			$dist_id =$this->session->userdata('emis_statedist_id');
			$this->load->database();
			$this->load->model('Statemodel');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['details'] = $this->Statemodel->getalldistrictcountsbyclassblock($dist_id);
			$data['distname'] = $this->Statemodel->getsingledistname($dist_id);
			$this->load->view('state/emis_state_block_count',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_state_school_count(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$stateid = $this->session->userdata('emis_state_id');
			$block_id =$this->session->userdata('emis_stateblock_id');
			$this->load->database();
			$this->load->model('Statemodel');
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['details'] = $this->Statemodel->getalldistrictcountsbyclassschool($block_id);
			$data['blockname'] = $this->Statemodel->getsingleblockname($block_id);
			$this->load->view('state/emis_state_school_count',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
	}

    public function emis_chart_reports(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$data['details'] = $this->Statemodel->getalldistrictcountsbyclass();
			$data['schoolcount']=$this->Statemodel->getallsch_bydist();
			$data['gendercount']=$this->Statemodel->getalldistrictcountsbygender();

			$data['adhaarcount']=$this->Statemodel->getalladhaarenrollcount();
			$data['smartcardcount']=$this->Statemodel->getallsmartcardenrollcount();
			$this->load->view('state/emis_state_dash',$data);
			// // echo json_encode($data['gendercount']);
		} else { redirect('/', 'refresh'); }

	}


	public function savedash_classidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
		$class_id = $this->input->post('class_id');
		if($class_id!="" ){
			$this->session->set_userdata('emis_statedashclass_id',$class_id);
		}
			$class_ids =$this->session->userdata('emis_statedashclass_id');
			if($class_ids!=""){
				// echo true;
			}else{
				// echo false;
			}
		} else { redirect('/', 'refresh'); }
	}

	public function emis_dash_district_count(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$class_id =$this->session->userdata('emis_statedashclass_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
   
			$data['alldist']=$this->Datamodel->getallachooldist();
			$this->load->view('state/emis_dash_class_district',$data);
			// // echo json_encode($data['district_count']);
		} else { redirect('/', 'refresh'); }
	}

	public function savedashdistrictidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$dist_id = $this->input->post('dist_id');
			if($dist_id!="" ){
				$this->session->set_userdata('emis_statedashdist_id',$dist_id);
			}
			$dist_ids =$this->session->userdata('emis_statedashdist_id');
			if($dist_ids!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function emis_dash_block_stucount(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$class_id =$this->session->userdata('emis_statedashclass_id');
			$dist_ids =$this->session->userdata('emis_statedashdist_id');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$data['allblock']=$this->Datamodel->get_allblocks($dist_ids);
			$this->load->view('state/emis_dash_class_block',$data);
			// // echo json_encode($data['allblock']);
		} else { redirect('/', 'refresh'); }
	}

	public function savedashblockidsession(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$block_id = $this->input->post('block_id');
			if($block_id!="" ){
				$this->session->set_userdata('emis_statedashblock_id',$block_id);
			}
			$block_ids =$this->session->userdata('emis_statedashblock_id');
			if($block_ids!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

    public function emis_dash_school_stucount(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$stateid = $this->session->userdata('emis_state_id');
			$class_id =$this->session->userdata('emis_statedashclass_id');
			$dist_ids =$this->session->userdata('emis_statedashdist_id');
			$block_ids =$this->session->userdata('emis_statedashblock_id');
			$this->load->database();
			$this->load->model('Statemodel');

			$data['getmanagecate'] = $this->Statemodel->getmanagecate();

			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){ 
				$data['allschool']=$this->Statemodel->getallstuschoolcoutnbyclass1("c".$class_id,$block_ids,$manage);
			}else{
				$data['allschool']=$this->Statemodel->getallstuschoolcoutnbyclass("c".$class_id,$block_ids);
			}
			$this->load->view('state/emis_dash_class_school',$data);
			// // echo json_encode($data['allschool']);
        } else { redirect('/', 'refresh'); }
	}

	public function get_school_management_data(){
		$getschooltype = $this->input->post('emis_state_report_schcate');
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
			//// echo json_encode($cate);
			if($cate!="" ||  $manage!="" ){
				$this->session->set_userdata('emis_statereport_schmanage',$manage);
				
			}
			$manage =$this->session->userdata('emis_statereport_schmanage');
			if($manage!=""){
				// echo true;
			}else{
				// echo false;
			}
        } else { redirect('/', 'refresh'); }
	}

	public function deletereport_schoolcatemanage(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->session->unset_userdata('emis_statereport_schmanage');
			// echo true;
        } else { redirect('/', 'refresh'); }
	}

	public function emis_state_special_reports(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
    
			$this->load->database();
			$this->load->model('Statemodel');
			//$data['special_schools']=$this->Statemodel->getallspcialreports();
			$this->load->view('state/emis_state_special_reports');
			//// echo json_encode($data['special_schools']);
		} else { redirect('/', 'refresh'); }
	}

	public function emis_state_teacher_transhistory(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		$filter1=" ";  
		$filter2=" ";
		if($emis_loggedin) {
			
			$block=$this->input->get('block_name');
			// $data['dist_id'] =$dist;
			// $total="";
			// $config=array();
			
			$fdates=$this->input->get('fdate');
		$fdate =date('Y-m-d',strtotime($fdates));
		$tdates=$this->input->get('tdate');
		$tdate =date('Y-m-d',strtotime($tdates));
		
		$data['fdate']=$fdates;
		$data['tdate']=$tdates;
			
			$this->load->library('pagination');
			$this->load->database();
			$this->load->model('Statemodel');
			
		
			
            $data['history']=$this->Statemodel->getallteachertranshistory($block,$fdate,$tdate);
			
			
			
			//$total = count($this->Statemodel->getallteachertranshistory($filter1_val,$filter2_val,$filter3)); 
			$config['base_url'] = base_url().'State/emis_state_teacher_transhistory';
			$config['total_rows'] = $total;
			$config['per_page'] =10; 
			$config['num_links']=8;
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
			
			//print_r($data['history']);
			// $data['totalcount']=$total;
			// $data['offset']=$offset;
			$this->load->view('state/emis_state_transferhistory',$data);
			// // echo json_encode($data['tranferers']);
    
		} else { redirect('/', 'refresh'); }
	}

    public function removefilter_inteachertransfer(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->session->unset_userdata('state_trans_filter1');
			$this->session->unset_userdata('state_trans_filter2');
			redirect('State/emis_state_teacher_transhistory','refresh');
        } else { redirect('/', 'refresh'); }
	}

  // Function for the Staff transfer module//
	public function emis_tech_transfer(){

		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Statemodel');
			//$data['schooldist'] = $this->Datamodel->getallachooldist();
			$data['transceotypes'] = $this->Statemodel->trans_off_transfer();
			
			$data['get_teach_type'] = $this->Statemodel->get_teacher_type();
			$data['get_dist_dtls'] = $this->Statemodel->get_dist_details();
			$this->load->view('state/emis_tech_trans',$data);
			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
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
public function tech_cat_only($schl_id){

$get_typ_techr = $this->Districtmodel->get_type_tchr($schl_id);

  if ($get_typ_techr) {
      $tchr_dtls = '';
      $tchr_dtls = $tchr_dtls.'<option value="">Select the Type of Teacher</option>';
      foreach ($get_typ_techr as $schl_type_tchers) {
    if ($schl_type_tchers->teacher_type!="" && $schl_type_tchers->teacher_type!="0") {
        //$get_my_cat = $this->Districtmodel->get_cat_cond($schl_type_tchers->teacher_type);

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
public function get_tchr($schl_id){
	
  $schl_id = explode("-", $schl_id);

  $tech_code = $schl_id[0];
  $udise_code = $schl_id[1];
  $get_techr = $this->Statemodel->get_tchr($udise_code,$tech_code);

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
		  
		  // print_r($savetransfer);
		  // die();
		  
		  $savetransfer['user_type_id'] = 1;
		  $updateschool_key_id['udise_code']=$this->input->post('new_school');
		  $updateschool_key_id['school_key_id']=$this->input->post('newschool_key');
		  $teacheruid=$this->input->post('teacheruid');
		  $result1=$this->Statemodel->update_school_key_id($teacheruid,$updateschool_key_id);
		  $result = $this->Statemodel->teacher_transfer($savetransfer);
		  
		  
		echo $result;
	  }	
}
public function transfer_teacher_debutation()
{
	$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $teacherid=$this->input->post('teacheruid');
	      $teachercode = $this->Statemodel->get_teacher_code($teacherid);
          $savetransfer_debuted['depute_key'] = $this->input->post('newschool_key');
		  $savetransfer_debuted['teacher_code'] = $teachercode[0]->teacher_code;
		  $savetransfer_debuted['depute_frmdate'] = $this->input->post('transferdate');
		  $savetransfer_debuted['deputed_place'] = 1;
		  $debuted['deputed']=1;
		  
		  $result2 = $this->Statemodel->update_flag($teacherid,$debuted);
		  $result = $this->Statemodel->transfer_teacher_debutation($savetransfer_debuted);
		  /////////////
		  ////////////
		  $savetransfer['from_schl'] = $this->input->post('old_school');
		  $savetransfer['to_schl'] = $this->input->post('new_school');
		  $savetransfer['from_schl_keyid']= $this->input->post('oldschool_key');
		  $savetransfer['to_schl_keyid'] = $this->input->post('newschool_key');
		  $savetransfer['staff_id'] = $this->input->post('teacheruid');
		  // $savetransfer['trans_date'] = $this->input->post('transferdate');
		   $transferdate= $this->input->post('transferdate');
		  $savetransfer['trans_date']  = date('Y-m-d',strtotime($transferdate)) ;
		  
		  $savetransfer['user_type_id'] = 1;
		  
		 
		   $savetransfer['from_scl_dist'] = $this->input->post('old_dist');
		  $savetransfer['to_scl_dist'] = $this->input->post('new_dist');
		  $savetransfer['from_block'] = $this->input->post('old_block');
		  $savetransfer['to_block'] = $this->input->post('new_block');
		  $savetransfer['trans_type'] = $this->input->post('category');
		  $savetransfer['transferer'] = $this->input->post('transfer_by');
      $savetransfer['from_teachertype'] = $this->input->post('teachertypefrom');
     $savetransfer['to_teachertype'] = $this->input->post('teachertypeto');
		   
		  $result3 = $this->Statemodel->teacher_transfer($savetransfer);
		  echo $result;
	  }
}
	//emis_team
	public function emis_teacher_details() {
	 $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
      $data['getsctype'] = $this->Statemodel->get_school_type();
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
				$data['teacherdistrictdetails'] = $this->Statemodel->get_dist_teacherdistrictdetails($school_cate);
      }
      else
      {
        $data['teacherdistrictdetails'] = $this->Statemodel->get_dist_teacherdistrictdetails('');
          //  print_r($data['teacherdistrictdetails']);die();
      }
			$this->load->view('state/emis_teacher_list',$data);
		} else { redirect('/', 'refresh'); }
		
	}
	//emis_team
	public function emis_teacher_surplus_details() {
	 $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
     if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
      
        $data['teacherdistrictdetails'] = $this->Statemodel->get_dist_teacher_surplus_districtdetails();
			$this->load->view('state/emis_teacher_surplus_list',$data);
		} else { redirect('/', 'refresh'); }
		
	}
	public function emis_teacher_classwise_surplus_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$dist_id =$this->input->get('dist_id');
		    $data['dist_id'] = $dist_id;
      $data['details'] = $this->Statemodel->getalldistrictcountsbyteacherblock_surplus($dist_id);
   	$this->load->view('state/emis_state_teacher_surplus_blockwise',$data);
		} else { redirect('/', 'refresh'); }
	}
	public function emis_teacher_surplus_classwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			
			$block_id =$this->input->get('block_id');
			  $data['block_id'] = $block_id;

    
        $data['details'] = $this->Statemodel->getalldistrictcountsbyclassteach_surplus($block_id);
      	
			$this->load->view('state/emis_state_teacher_surplus_schoolwise',$data);
			
		} else { redirect('/', 'refresh'); }
	}
	public function emis_teacher_detail() {
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Statemodel');

				$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
				$data['teacherdistrictdetails'] = $this->Statemodel->get_dist_teacherdistrictdetails();
      			$this->load->view('state/emis_teacher_details',$data);
		} else { redirect('/', 'refresh'); }

	}
	
	
//pearlin
	public function emis_teaching_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$this->load->database();
			$this->load->model('Statemodel');
			$dist_id =$this->session->userdata('emis_statedist_id');

			$data['details'] = $this->Statemodel->getalldistrictcountsbyteacherblock($dist_id);
			$this->load->view('state/emis_state_teaching_blockwise',$data);
		} else { redirect('/', 'refresh'); }
	}
	
	//emis_team
	public function emis_teacher_classwise_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$dist_id =$this->input->get('dist_id');
		    $data['dist_id'] = $dist_id;

      $data['getsctype'] = $this->Statemodel->get_school_type();
    
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
			$data['details'] = $this->Statemodel->getalldistrictcountsbyteacherblock($dist_id,$school_cate);
    }
    else
    {
      $data['details'] = $this->Statemodel->getalldistrictcountsbyteacherblock($dist_id,'');
    }
           
			$this->load->view('state/emis_state_teacherblockwise',$data);
		} else { redirect('/', 'refresh'); }
	}

	
	
	public function emis_teacher_classwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			
			$block_id =$this->input->get('block_id');
			  $data['block_id'] = $block_id;

      $data['getsctype'] = $this->Statemodel->get_school_type();
    
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
			$data['details'] = $this->Statemodel->getalldistrictcountsbyclassteach($block_id,$school_cate);
      }
      else {
        $data['details'] = $this->Statemodel->getalldistrictcountsbyclassteach($block_id,'');
       } 
			
			$this->load->view('state/emis_state_teacherschoolwise',$data);
			
		} else { redirect('/', 'refresh'); }
	}
	
	//emis_team
	public function emis_student_countdg() {
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Statemodel');
			$data['countdge'] = $this->Statemodel->get_dist_countdge();
		
			$this->load->view('state/emis_state_count_dg',$data);
		} else { redirect('/', 'refresh'); }
		
	}
	
	//emis team filter$schoolid
	/*public function schoolcatemanagefil(){	
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$manage = $this->input->post('manage');
			$cate = $this->input->post('cate');
			$id1 = $this->input->post('id1');
            
           
			// echo json_encode($manage);
			// echo json_encode($cate);
            // echo json_encode($id1);
            
            die();
			
			if($manage!=""){$this->session->set_userdata('emis_state_report_schcate',$manage);}
			if($cate!=""){$this->session->set_userdata('emis_state_report_schmgtype',$cate);}
			if($id1!=""){$this->session->set_userdata('emis_state_special_search',$id1);}
			
			if($this->session->userdata('emis_state_report_schcate')!=""){
			$manage =$this->session->userdata('emis_state_report_schcate');
			}
			if($this->session->userdata('emis_state_report_schmgtype')!=""){
			$cate =$this->session->userdata('emis_state_report_schmgtype');
			}
			if($this->session->userdata('emis_state_special_search')!=""){
			$id1 =$this->session->userdata('emis_state_special_search');
			}
			
		
			
			
			
				$data['special_schools'] = $this->Statemodel->schoolcatemanagefilter($manage,$cate,$id1);
				//// echo json_encode($data['special_schools']);
				//emis_state_teacher_transhistory;
				
				
				/*if($manage!="" || $cate!="" || $id1!=""){
				 // echo true;
				}else{
				 // echo false;
				}
				
			
			$this->load->view('state/emis_state_special_reports',$data);
			
		} else { redirect('/', 'refresh'); }
		
	}*/
    
   //  	public function schoolcatemanagefil(){
   //  	    $manage = $this->input->post('manage');
			// $cate = $this->input->post('cate');
			// $id1 = $this->input->post('id1');
   //          // echo json_encode($manage);
			// // echo json_encode($cate);
   //          // echo json_encode($id1);
   //          die();
   //  	   $this->load->view('state/emis_state_special_reports',$data);
   //  	   }
	public function schoolcatemanagefil(){	
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$manage = $this->input->post('emis_state_report_schcate');
			$cate = $this->input->post('emis_state_report_schmgtype');
			$id1 = $this->input->post('emis_state_special_search');
      $id2 = $this->input->post('emis_state_special_search1');
			// print_r($this->input->post()
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
      else if($this->session->userdata('emis_state_special_search1')!=""){
          $id2 =$this->session->userdata('emis_state_special_search1');
      }

				$data['special_schools'] = $this->Statemodel->schoolcatemanagefilter($manage,$cate,$id1,$id2);
	
				$this->session->unset_userdata('emis_state_report_schcate');
				
				$this->session->unset_userdata('emis_state_report_schmgtype');
				$this->session->unset_userdata('emis_state_special_search');
        $this->session->unset_userdata('emis_state_special_search1');
				// // echo "<pre>";print_r($data['special_schools']);// echo"</pre>";die;
				//// echo json_encode($data['special_schools']);
				//emis_state_teacher_transhistory;

				/*if($manage!="" || $cate!="" || $id1!=""){
				 // echo true;
				}else{
				 // echo false;
				}*/

			$this->load->view('state/emis_state_special_reports',$data);

		} else { redirect('/', 'refresh'); }

	}
	
 /* Student Management
 * by VIT
 */
	public function emis_nonteacher_details() {
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Statemodel');
			
				$data['get_teacherdetails'] = $this->Statemodel->get_dist_non_teacherdistrictdetails();
				$data['teacherdistrictdetails'] = $this->Statemodel->get_dist_nonteacherdistrictdetails();

			$this->load->view('state/emis_nonteacher_list',$data);
		} else { redirect('/', 'refresh'); }
		
	}
	
	//emis_team
	public function emis_nonteacher_classwise_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$this->load->library('session'); 
			$this->load->database();
			$this->load->model('Statemodel');
			$dist_id =$this->session->userdata('emis_statedist_id');
			
			$data['details'] = $this->Statemodel->getalldistrictcountsbyteacherblock($dist_id);
			$this->load->view('state/emis_state_teacherblockwise',$data);
		} else { redirect('/', 'refresh'); }
	}
	
	
	public function emis_nonteacher_classwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			$this->load->library('session');
			$this->load->database();
			$this->load->model('Statemodel');
			$block_id =$this->session->userdata('emis_stateblock_id');
			
			$data['details'] = $this->Statemodel->getalldistrictcountsbyclassteach($block_id); 
			//// echo json_encode($data['details']);
			$this->load->view('state/emis_state_teacherschoolwise',$data);
			
		} else { redirect('/', 'refresh'); }
	}
   
/*******Done by Pearlin ************/


public function baseDash(){


      $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) {
			$this->load->library('session');
			$stateid = $this->session->userdata('emis_state_id'); 
			$this->load->database();
			$this->load->model('Statemodel');
     
   	  $data['total_count_details'] = $this->Statemodel->get_state_school_student_teacher_total();
      //print_r($data);die;
      $data['Govt_detail']=$this->Statemodel->govt_enrollment();
      $school_details = $this->Statemodel->get_state_scool_type_based_schoolinfo();
      $data['renewal_details'] = $this->Statemodel->get_state_renewal_details();
      $data['newschool_details'] = $this->Homemodel->newschooldashboardlist();
      
      $data['school_type'] = $school_details['result'];
      $data['school_based_count_details'] = $school_details['school_info'];
      $data['old_flash_message'] = $this->Statemodel->get_flash_news();
      //Vivek Rao 
     $where='';
     // $data['freeschemes']=$this->Statemodel->getFreeSchemeGeneral($where);
      //print_r($data['school_based_count_details']) ;
      $user_type = $this->session->userdata('user_type');
      if($this->session->userdata('user_type')==5 &&$this->session->userdata('emis_usertype1')==1){
      $data['reports_csv'] = $this->Statemodel->get_districtwise_report($user_type);
			}else
      {
        $data['reports_csv'] ='';
      }
      		$manage ='';
       
			if($manage!=""){ 
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclass1($manage);
				
			}else{
				$data['details'] = $this->Statemodel->getalldistrictcountsbyclass();
				
			}

$this->load->view('state/emis_state_home_dash',$data);
		//	$this->load->view('dashboard\templates\app\index',$data);
			// // echo json_encode($data);
		} else { redirect('/', 'refresh'); }

   // $this->load->view('dashboard\templates\app\index');
   
}



public function dash_renewal(){
	$data['renewal']=$this->Statemodel->get_state_renewal_details();
	
 //print_r( $data['renewal']);die;
	$this->load->view('state/emis_dash_renewal',$data);
}

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
      $data['details'] = $this->Statemodel->get_emis_blockwise_district($dist_id,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_emis_blockwise_district( $dist_id,'','');

    }

      $data['dist'] =$dist_id;
			$this->load->view('state/emis_state_dash_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
  public function get_dee_district()
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
      $data['details'] = $this->Statemodel->get_emis_blockwise_dee($dist_id,$manage,$school_cate);
 
    }else
    {
      $data['details'] = $this->Statemodel->get_emis_blockwise_dee( $dist_id,'','');
 
    }
   
      $data['dist'] =$dist_id;
			$this->load->view('state/emis_state_dee_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
   public function get_dse_district()
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
      $data['details'] = $this->Statemodel->get_emis_blockwise_dse($dist_id,$manage,$school_cate);
 
    }else
    {
      $data['details'] = $this->Statemodel->get_emis_blockwise_dse( $dist_id,'','');
 
    }
   
      $data['dist'] =$dist_id;
			$this->load->view('state/emis_state_dse_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
    public function get_dms_district()
  {
	 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id =  $this->input->get('dist');
	  $data['dist_id'] = $dist_id;
      // $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
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
   
      $data['details'] = $this->Statemodel->get_emis_blockwise_dms($dist_id,$school_cate);
 }
 else
 {

 	 $data['details'] = $this->Statemodel->get_emis_blockwise_dms($dist_id,'');
 }
      $data['dist'] =$dist_id;
			$this->load->view('state/emis_state_dms_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }

	public function dash_renewal_deo(){
    
		$data['renewal_pending_detail_deo'] = $this->Statemodel->get_state_deo_pending_details();
		//print_r( $data['renewal_pending_detail_deo']);
		$this->load->view('state/emis_state_deo_pending',$data);
	}
 public function dash_renewal_ceo(){
    
		$data['renewal_pending_detail_ceo'] = $this->Statemodel->get_state_ceo_pending_details();
	 // print_r( $data['renewal_pending_detail']);die;
		$this->load->view('state/emis_dash_ceo_pending',$data);
 }
 public function dash_renewal_rejected(){
    
		$data['renewal_rejected'] = $this->Statemodel->get_renewal_rejected();
	 // print_r( $data['renewal_pending_detail']);die;
		$this->load->view('state/emis_state_renew_rejected',$data);
 }
 public function state_student(){
    	
	$this->load->view('dashboard/templates/app/student_state');
}

  public function get_dash_schoolwise_class()
  {
  	$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$school_id = $this->input->get('school');
			
			//// echo $school_id;
			$data['details'] = $this->Statemodel->get_schoolwise_class($school_id);
			// print_r($data);die;
			$this->load->view('state/emis_state_dash_schoolsingle',$data);
			// // echo json_encode($data[' details']);
        } else { redirect('/', 'refresh'); }
  }

  /**
  * Attendance Report 
  * VIT-Sriram
  * 07/02/2019
  */
  public function get_attendance_details()
  {
  	$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
				// $date = $this->input->post('date');

				// // echo $date;
				
						$date = $this->input->post('date');
					
					// // echo $table;
					$today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
            // echo $month_start;

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

				$data['date'] = $date;
				// print_r($data['date']);
			 
			 $data['school_details_districtwise'] = $this->Statemodel->get_attendance_schoolreport_districtwise($date,$table);
			$data['school_type'] = $this->Statemodel->get_attendance_school_type($date,$table);
			

			// // Teacher District wise
			// // // echo $teach_table;
			$data['teacher_school_type'] = $this->Statemodel->get_attendance_teacher_type($date,$teach_table);
			$data['teacher_districtwise'] = $this->Statemodel->get_attendance_teacherreport_districtwise($date,$teach_table);


			$this->load->view('state/emis_state_attendance',$data);
		}else { redirect('/', 'refresh'); }
  }

  /***
   * Block wise Attendance
   * VIT-sriram
   * 07/02/2019
   */

  public function get_attendance_blockwise_details()
  {
  		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {

			$dist_id = $this->input->get('dist');
			// print_r($dist_id);
			$date = $this->input->get('date');
			if(!empty($dist_id)){
			$data['dist_id'] = $dist_id;
			}
			
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
				
					// // echo $table;die;

				

					
						

				// print_r($data);
			// students
			$data['school_details_blockwise'] = $this->Statemodel->get_attendance_schoolreport_blockwise($dist_id,$date,$table);
			$data['school_type'] = $this->Statemodel->get_attendance_school_type_blockwise($dist_id,$date,$table);
			//teachers 
			$data['teacher_blockwise'] = $this->Statemodel->get_attendance_teacherreport_blockwise($dist_id,$date,$teach_table);
			$data['teacher_school_type_blockwise'] =$this->Statemodel->get_attendance_teacher_tpye_blockwise($dist_id,$date,$teach_table);
			// print_r($data['teacher_blockwise']);
			// // echo "<pre>";
				$data['date'] = $date;
					$data['dist'] = $dist_id;
			// print_r($data);
			// // echo "</pre>";die;
			$this->load->view('state/emis_state_attendance_blockwise',$data);
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
			$data['student_details_schoolwise'] = $this->Statemodel->get_attendance_report_schoolwise($block_id,$date,$table);
			$data['date'] = $date;
			// // echo "<pre>";
			// print_r($data);
			// // echo "</pre>";die;

			$this->load->view('state/emis_state_attendance_schoolwise',$data);
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

			$block_id = $this->input->get('block');
			$date  =  $this->input->get('date');
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
					

				
			$data['teacher_details_schoolwise'] = $this->Statemodel->get_attendance_teacher_report_schoolwise($date,$block_id,$teach_table);
			$data['dist'] = "Block - ".$block_id;
			$data['date'] = $date;
			$this->load->view('state/emis_state_teacher_attendance_schoolwise',$data);


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

			$data['teacher_absent_list'] = $this->Statemodel->get_attendance_teacher_classwise($date,$school_id,$teach_table);
      $data['school_details'] = $this->Statemodel->get_school_name($school_id);
      $data['date'] = $date;
      // print_r($data['teacher_absent_list']);
			$this->load->view('state/emis_state_teacher_classwise',$data);

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
		  // // echo $date_status;
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
		  if(!empty($dist) && !empty($dist_col))
		  {
		  	switch ($dist_col) {
		  		case 1:
		  			$district['atten_details'] = "b.section_nos = a.section";
		  			break;
		  		case 2:
		  			$district['atten_details'] = "b.section_nos != a.section";
		  			break;
		  		case 3:
		  			$district['atten_details'] = "a.school_id is null";
		  			break;
		  		default:
		  			# code...
		  			break;
		  	}

		  	$district['name'] = $dist;
		  	$district['school_type'] = $school_cats;

			  $data['date'] = $date;
			  
		  	$data['dist'] = "District - ".$dist;
		  }

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


		  }

		  // print_r($block);die;

		  if(!empty($school_type) && !empty($school_col))
		  {

		  	switch ($dist_col) {
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
		  			# code...
		  			break;
		  	}

		  	$school_cat['name'] = $school_type;
		  	$school_cat['district'] = $dist;
		  	$data['date'] = $dates;

		  	$data['dist'] = "Category - ".$school_type;


		  }
		  // print_r($data['dist']);

		  $data['student_details_schoolwise'] = $this->Statemodel->get_attendance_search_details($date,$school_cat,$district,$blocks,$table);

		  // print_r($data);


			$this->load->view('state/emis_state_attendance_schoolwise',$data);

		}else { redirect('/', 'refresh'); }



	}


					/**********************************
					* Teacher Search 				  *
					* VIT-Sriram 	 				  *
					* 16/02/2019	 				  *
					* parms 	column 				  *
					* parms2 	date 				  *
					* parms3	district or block     *
					***********************************/

	public function get_attendance_teacher_search()
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

		  	$today = date('d-m-Y');
		  	$district = [];
		  	$blocks = [];
		  	$school_cat = [];
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
		  if(!empty($dist) && !empty($dist_col))
		  {
		  	switch ($dist_col) {
		  		case 1:
		  			$district['atten_details'] = "b.school_code !=''";
		  			break;
		  		case 2:
		  			$district['atten_details'] = "b.school_code is null";
		  			
		  			
		  			break;
		  		
		  	}

		  	$district['name'] = $dist;
		  	$district['school_type'] = $school_cats;

			  $data['date'] = $date;
			  
		  	$data['dist'] = "District - ".$dist;
		  }

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
		  $data['teacher_details_schoolwise'] = $this->Statemodel->get_teacher_attendance_search($date,$school_type,$district,$blocks,$teach_table);

			$this->load->view('state/emis_state_teacher_attendance_schoolwise',$data);


		}else { redirect('/', 'refresh'); }

	}


	/******************** End Search **********************************/

	/**
	* Get classwise Details 
	* VIT-sriram
	* 13/02/2019
	**/

	public function get_attendance_classwise_details()
	{

			$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) 
		{
				$school_id = $this->input->get('school');
				$date = $this->input->get('date');

				// // echo $school_id;
						$today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if(date('m-Y',strtotime($date)))
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
				$data['classwise_details'] = $this->Statemodel->get_attendance_classwise_details($school_id,$date,$table);

      $data['school_details'] = $this->Statemodel->get_school_name($school_id);
      $data['school'] = $school_id;
      	$this->load->view('state/emis_state_attendance_classwise',$data);

		}else { redirect('/', 'refresh'); }

	}

	/**
	* Get sectionwise Details 
	* VIT-sriram
	* 13/02/2019
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

				// // echo $school_id;
						$today = date('d-m-Y');
          if(!empty($date) && $today != $date)
          {
            $week_start = date('d-m-Y',strtotime("last sunday"));
            $month_start = date('m-Y',strtotime("-1 Month"));
          

            if(date('m-Y',strtotime($date)))
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
				
			// // echo $school.'--'.$class_id;

			$data['students_section_details'] = $this->Statemodel->get_attendance_sectionwise_details($school_id,$class_id,$table,$date);
			$data['school_details'] = $this->Statemodel->get_school_name($school_id);
      $data['school'] = $school_id;
      $data['class'] = $class_id;
			$this->load->view('state/emis_state_attendance_sectionwise',$data);

		}else { redirect('/', 'refresh'); }


	}	

	/*****************End Of the Daily Attendance Report************************/

	/**
	* Start the monthly Attendance Report
	* VIT-sriram
	* 16/02/2019 
	**/


	public function get_monthly_attendance_details()
	{

		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) 
		{
			$data['date'] = date('d-m-Y');
			$head_details = $this->get_common_control_link();
			
			$data['header'] = $head_details['header'];
			$data['link'] = $head_details['link'];

				$this->load->view('state/emis_state_month_attendance',$data);

		}else { redirect('/', 'refresh'); }
	}


	/*************** End of the Weekly Attendance *****************/
  
/****************************************************
	This was done by Pearlin

****************************************************/


 public function get_state_blockwise_school()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district = $this->input->get('dist');

			$data['details'] = $this->Statemodel->get_blockwise_school($district);


      $this->load->view('state/emis_state_blockwise',$data);
      } else { redirect('/', 'refresh'); }
  }
  public function get_state_schoolwise()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $blk = $this->input->get('blk');

      $data['details'] = $this->Statemodel->get_state_schoolwise($blk);


      $this->load->view('state/emis_state_schoolwise',$data);
      } else { redirect('/', 'refresh'); }
	}
	  //09-02-2019 pearlin
  public function emis_teaching_staffs() {
		$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');
			$data['getsctype'] = $this->Statemodel->get_school_type();
			$school_cate = $this->input->post('school_cate');
			if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                     
                       $school_cate = $result['school_cate'];
                 }
     
                // print_r($result);
                 $data['cate'] = $school_cate;

		    if($school_cate!=""){ 
			$data['teaching_details'] = $this->Statemodel->get_dist_teaching_details($school_cate);
		     }else{
		    $data['teaching_details'] = $this->Statemodel->get_dist_teaching_details(''); 
			}
					 //print_r($data['teaching_details']);die();
		$this->load->view('state/emis_teaching_list',$data);
	} else { redirect('/', 'refresh'); }
}
public function emis_non_teaching_staffs() {
		$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');
$data['getsctype'] = $this->Statemodel->get_school_type();
			$school_cate = $this->input->post('school_cate');
			if(!empty($school_cate)){
                       $result = Common::session_search_filter('',$school_cate,1);
                 }else
                 {
                       $result = Common::session_search_filter('','',1);
                     
                       $school_cate = $result['school_cate'];
                 }
     
                // print_r($result);
                 $data['cate'] = $school_cate;

		    if($school_cate!=""){ 
			$data['teaching_details'] = $this->Statemodel->get_dist_non_teaching_details($school_cate);
			 }else{
		    $data['teaching_details'] = $this->Statemodel->get_dist_non_teaching_details(''); 
			}
					 //print_r($data['teaching_details']);die();
		$this->load->view('state/emis_nonteaching_list',$data);
	} else { redirect('/', 'refresh'); }

}

  
 /**
	* Get Teacher Strick Report
	* VIT-Sriram
	* 01/02/2019
	**/
	public function get_district_strick_report()
	{
		$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      // print_r($this->session->userdata());
        //$dist_id = $this->session->userdata('emis_district_id');

      //$district_details = $this->Ceo_District_model->get_districtName($dist_id);
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['teacher_strick'] = $this->Statemodel->get_teacherstrick_reports($school_type);
      $this->load->view('state/emis_state_teacherstrick_reports',$data);


	}else { redirect('/', 'refresh'); }
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

    	$dist_name = $this->input->get('dist');
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();

      $data['teacher_strick'] = $this->Statemodel->get_teacherstrick_district_reports($dist_name,$school_type);

      $this->load->view('state/emis_state_teacherstrick_district_reports',$data);
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();

      $data['teacher_strick'] = $this->Statemodel->get_teacherstrick_block_reports($edu_dist,$school_type);

      $this->load->view('state/emis_state_teacherstrick_block_reports',$data);
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();

      $data['teacher_strick'] = $this->Statemodel->get_teacherstrick_school_reports($block,$school_type);

      $this->load->view('state/emis_state_teacherstrick_school_reports',$data);
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
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();

      $data['teacher_strick'] = $this->Statemodel->get_teacherstrick_teacher_reports($school,$school_type);
      $data['school_details'] = $this->Statemodel->get_school_name($school);

      $this->load->view('state/emis_state_teacherstrick_teacher_reports',$data);
    }else { redirect('/', 'refresh'); }

	}

	//**Done by Pearlin **/
	
	
    public function dash_renewal_beo(){
    
     $data['renewal_pending_detail'] = $this->Statemodel->get_state_renewal_pending_details();
    // print_r( $data['renewal_pending_detail']);die;
     $this->load->view('state/emis_state_beo_pending',$data);
  }
 
  	/**
  	* Renewal Reports For District Level
  	* VIT-sriram
  	* 11/02/2019
  	***/

  	public function get_renewal_state_district()
  	{

  		$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

         $school_type = array('Fully Aided', 'Un-aided','Partially Aided');
         

    		$data['school_renewal_status'] = $this->Statemodel->get_renewal_state_district($school_type);
    		$this->load->view('state/emis_state_renewal_district',$data);
    	}else { redirect('/', 'refresh'); }

  	}

  	/**
  	* Renewal Reports For Block Level
  	* VIT-sriram
  	* 11/02/2019
  	***/

  	public function get_renewal_state_block()
  	{

  		$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

         $school_type = array('Fully Aided', 'Un-aided','Partially Aided');
        
         $dist_id = $this->input->get('dist');
         
         if(!empty($dist_id)){
         $data['dist_id'] = $dist_id;
     	}else
     	{
     		$data['dist_id'] = '';
     	}
    		$data['school_renewal_status'] = $this->Statemodel->get_renewal_state_block($school_type,$dist_id);
    		$this->load->view('state/emis_state_renewal_block',$data);

     	

    	}else { redirect('/', 'refresh'); }

  	}


  	/**
  	* Renewal Reports For school Level
  	* VIT-sriram
  	* 11/02/2019
  	***/

  	public function get_renewal_state_school()
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
    		$data['school_renewal_status'] = $this->Statemodel->get_renewal_state_school($school_type,$block_id);
     	
    		$this->load->view('state/emis_state_renewal_school',$data);

    	}else { redirect('/', 'refresh'); }

  	}
//19.02.19 pearlin
  		public function emis_teacher_blockwise_district(){
       $this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
	
		
		   $dist_id =$this->input->get('dist_id');
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
		$data['details'] = $this->Statemodel->get_teaching_staff_block($dist_id,$school_cate);
		     }else{
		 $data['details'] = $this->Statemodel->get_teaching_staff_block($dist_id,'');
			}
			//print_r($data['details']);
			$this->load->view('state/emis_state_teaching_blockwise',$data);
		} else { redirect('/', 'refresh'); }
	}
	public function emis_nonteaching_blockwise_district(){
        $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$dist_id =$this->input->get('dist_id');
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
        $data['details'] = $this->Statemodel->get_nonteaching_staff_block($dist_id,'');
       }
  		$this->load->view('state/emis_state_nonteaching_blockwise',$data);
		} else { redirect('/', 'refresh'); }
	}
public function emis_teaching_schoolwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			
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
			$data['details'] = $this->Statemodel->get_teaching_block_school($block_id,$school_cate); 
			  }else{
		 $data['details'] = $this->Statemodel->get_teaching_block_school($block_id,'');
			}
			$this->load->view('state/emis_state_teaching_schoolwise',$data);
			
		} else { redirect('/', 'refresh'); }
	}
	public function emis_nonteaching_schoolwise_block(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
			
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
			
			$data['details'] = $this->Statemodel->get_nonteaching_block_school($block_id,$school_cate); 
        }else{
     $data['details'] = $this->Statemodel->get_nonteaching_block_school($block_id,'');
      }
		//	print_r($data['details']);
			//// echo json_encode($data['details']);
			$this->load->view('state/emis_state_nonteaching_schoolwise',$data);
			
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

			$data['header'] = 'state';
			$data['link'] = 'State';

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
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$data['getsctype'] = $this->Statemodel->get_school_type();
			$data['districts'] = $this->Statemodel->get_all_district();
			$head_details = $this->get_common_control_link();

			$data['header'] = $head_details['header'];
			$data['link'] = $head_details['link'];
			$data['manage'] = [];
			$data['cate'] = [];
			$data['authority'] = $this->Statemodel->get_flash_news_authority();
			// print_r($data['authority']);
			$this->load->view('state/emis_state_flash_news',$data);
		}else { redirect('/', 'refresh'); }
	}


  public function get_flash_SMS()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 

      $this->load->library('session');
      $this->load->database();
      $state_id = $this->session->userdata('emis_user_id');
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
      $data['districts'] = $this->Statemodel->get_all_district();
      $head_details = $this->get_common_control_link();

      $data['header'] = $head_details['header'];
      $data['link'] = $head_details['link'];
      $data['manage'] = [];
      $data['cate'] = [];
      $data['authority'] = $this->Statemodel->get_flash_sms_authority();
      // print_r($data['authority']);
      $this->load->view('state/emis_state_flash_SMS',$data);
    }else { redirect('/', 'refresh'); }
  }



	public function get_all_block_name()
	{

		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$dist_id = $this->input->post('dist');
			// print_r($dist_id);
		$data = $this->Statemodel->get_all_block_name($dist_id);
		echo json_encode($data);die;
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

		// print_r($save_array);
		$result_id = $this->Statemodel->save_flash_news_data($save_array);

		echo $result_id;die;
	}




	/**************** ENd Of The Function **********************************************/



// 	public function teacher_login()
// 	{
// 		// echo "function in ";die;
		
// 		$data['username'] = 'kannan';
// 		$data['password'] = 'MoodleTest@2019';
// 		$data = $this->do_post('https://venbainfotech.com/lms/login/index.php',$data);
// 		print_r($data);
// 	}


// 	function do_post($url, $data)
// {
//   $ch = curl_init($url);

//   curl_setopt($ch, CURLOPT_POST, 1);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
// curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
// // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// //     'Content-Type: application/json',
// //     )
// // );
//   $response = curl_exec($ch);
//   // print_r($response);die;
//   curl_close($ch);
//   return $response;
// }
public function emis_student_disablity_list()
{
  
      $this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$data['getsctype'] = $this->Statemodel->get_school_type();
            $dist_id =$this->session->userdata('emis_district_id');

			
			$manage = $this->session->userdata('emis_statereport_schmanage');

			$manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');

		//	$catee=$this->input->get('cate_type');
		   

			//print_r($data['cateee']);
			//die();
			//print_r($data['cate']);
			//die();
			
			$data['manage'] = $manage;
			$data['cate'] = $school_cate;
			

			if($manage!="" && $school_cate){ 
				$data['allstuds']  = $this->Statemodel->get_classwise_student_disability($manage,$school_cate);
				
			}else{
				$data['allstuds']=$this->Statemodel->get_classwise_student_disability('',''); 
			}
			//print_r($data);

			$this->load->view('state/emis_school_student_disability',$data);
			
		} else { redirect('/', 'refresh'); }
}    
public function emis_student_disability_blockwise()
{
	$emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     $dist_id =  $this->input->get('dist');
      $data['allstuds'] = $this->Statemodel->get_classwise_student_disability_block($dist_id);
     //  print_r($data['allstuds']);
       $this->load->view('state/emis_block_student_disability',$data);
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
      $data['allstuds'] = $this->Statemodel->get_classwise_student_disability_school($block_name);
     // print_r($data['allstuds']);
       $this->load->view('state/emis_student_disability_schoolwise',$data);
      }else
      {
        redirect('/', 'refresh');

      }

}
public function emis_student_RTE_list()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     // $dist_id =$this->session->userdata('emis_district_id');

      $data['allstuds'] = $this->Statemodel->get_classwise_RTE_student();
        //print_r($data['allstuds']);
       $this->load->view('state/emis_school_RTE_student',$data);
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
   
      $dist_id =  $this->input->get('dist');
	  $data['allstuds'] = $this->Statemodel->get_blockwise_RTE_student($dist_id);
	  //print_r($data['allstuds']);
			$this->load->view('state/emis_state_RTE_blockwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school()
  {
	 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $dist_id =  $this->input->get('dist');
	  $data['allstuds'] = $this->Statemodel->get_schoolwise_RTE_student($dist_id);
	  //print_r($data['allstuds']);
			$this->load->view('state/emis_state_RTE_schoolwise',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
  public function emis_student_RTE_list_2019()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     // $dist_id =$this->session->userdata('emis_district_id');

      $data['allstuds'] = $this->Statemodel->get_classwise_RTE_student_2019();
        //print_r($data['allstuds']);
       $this->load->view('state/emis_school_RTE_student_2019',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}    
public function get_RTE_district_2019()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $dist_id =  $this->input->get('dist');
    $data['allstuds'] = $this->Statemodel->get_blockwise_RTE_student_2019($dist_id);
    //print_r($data['allstuds']);
      $this->load->view('state/emis_state_RTE_blockwise_2019',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function get_RTE_school_2019()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
   
      $dist_id =  $this->input->get('dist');
    $data['allstuds'] = $this->Statemodel->get_schoolwise_RTE_student_2019($dist_id);
    //print_r($data['allstuds']);
      $this->load->view('state/emis_state_RTE_schoolwise_2019',$data);

      // // echo json_encode($data['details']);
    } else { redirect('/', 'refresh'); }
  }
  public function emis_enrollment_2018(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$data['getsctype'] = $this->Statemodel->get_school_type();
			// print_r($this->input->post());die;
			$manage = $this->session->userdata('emis_statereport_schmanage');
			
			$manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');
			$data['manage'] = $manage;
			$data['cate'] = $school_cate;

			
			// print_r($this->session->userdata());
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			if($manage!="" && $school_cate){ 
				$data['classcount']  = $this->Statemodel->getallstateclass2018($manage,$school_cate);
				// $data['classcount']=$this->Statemodel->getallcurrentcountsbyclass1($manage);
			}else{
				$data['classcount']=$this->Statemodel->getallstateclass2018('',''); 
			}
			$this->load->view('state/emis_state_enrollment_2018',$data);
			// // echo json_encode($data['classcount']);
		} else { redirect('/', 'refresh'); }

	}
	public function get_classwise_district_2018()
  {
	 $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      //$dist_id = $this->session->userdata('emis_district_id');
      //$district_details = $this->Statemodel->get_districtName($dist_id);
      $dist_id =  $this->input->get('dist');
    //  print_r($dist_id);
	  $data['dist_id'] = $dist_id;

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      $data['manage'] = $manage;
      $data['cate'] = $school_cate;

      if(!empty($manage)){
      $data['details'] = $this->Statemodel->get_emis_blockwise_district_2018( $dist_id,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_emis_blockwise_district_2018( $dist_id,'','');

    }
    // print_r($data['details']);
      $data['dist'] =$dist_id;
			$this->load->view('state/emis_state_dash_blockwise_2018',$data);

			// // echo json_encode($data['details']);
		} else { redirect('/', 'refresh'); }
  }
  public function get_dash_blockwise_school_2018()
  {
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
     	$data['dist'] = $this->input->get('dist');

  		$block_name = $this->input->get('block');

  		$data['block_name'] = $block_name;

  		//$data['details'] = $this->Statemodel->get_blockwise_school($block_name);

      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      $data['getsctype'] = $this->Statemodel->get_school_type();
     

      $manage = $this->input->post('school_manage');
      $school_cate = $this->input->post('school_cate');
      


      if(!empty($manage)){

      $data['details'] = $this->Statemodel->get_blockwise_school_2018($block_name,$manage,$school_cate);
     
    }else
    {
      $data['details'] = $this->Statemodel->get_blockwise_school_2018($block_name,$manage,$school_cate);

    }

  
  		// print_r($data);
  		$this->load->view('state/emis_state_dash_schoolwise_2018',$data);
  		} else { redirect('/', 'refresh'); }
  }
  public function emis_student_RTE_allocation()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     // $dist_id =$this->session->userdata('emis_district_id');

      $data['allstuds'] = $this->Statemodel->get_classwise_RTE_allocation();
        //print_r($data['allstuds']);
       $this->load->view('state/emis_school_RTE_allocation',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}    
public function get_RTE_district_allocation()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     // $dist_id =$this->session->userdata('emis_district_id');
       $dist_id=$this->input->get('dist');
      $data['allstuds'] = $this->Statemodel->get_blockwise_RTE_allocation($dist_id);
        //print_r($data['allstuds']);
       $this->load->view('state/emis_block_RTE_allocation',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}    
public function get_RTE_school_allocation()
{
   $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 
   
     // $dist_id =$this->session->userdata('emis_district_id');
        $dist_id=$this->input->get('dist');
      $data['allstuds'] = $this->Statemodel->get_schoolwise_RTE_allocation($dist_id);
       // print_r($data['allstuds']);
       $this->load->view('state/emis_schoolwise_RTE_allocation',$data);
      }else
      {
        redirect('/', 'refresh');

      }
}   
public function get_district_migration()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');

			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_migration_details'] = $this->Statemodel->get_dist_student_migration();
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_student_migration_list',$data);
	} else { redirect('/', 'refresh'); }

} 
public function get_block_migration()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');
              $dist_id=$this->input->get('dist_id');
			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_migration_details'] = $this->Statemodel->get_blk_student_migration($dist_id);
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_student_migration_block',$data);
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
			$data['student_migration_details'] = $this->Statemodel->get_school_student_migration($block_name);
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_student_migration_school',$data);
	} else { redirect('/', 'refresh'); }

} 
public function get_district_migration_remarks()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->get_dist_student_migration_remarks();
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_list_remarks',$data);
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
              $dist_id=$this->input->get('dist_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->get_blk_student_migration_remarks($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_block_remarks',$data);
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
      $data['student_migration_details'] = $this->Statemodel->get_school_student_migration_remarks($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_school_remarks',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_district_migration_reason()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->get_dist_student_migration_reason();
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_list_reason',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_block_migration_reason()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
              $dist_id=$this->input->get('dist_id');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->get_blk_student_migration_reason($dist_id);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_block_reason',$data);
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
              $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->get_school_student_migration_reason($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/emis_student_migration_school_reason',$data);
  } else { redirect('/', 'refresh'); }

} 
public function get_district_migration_details()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');

			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_migration_details'] = $this->Statemodel->get_dist_student_migration_details();
			//print_r($data['student_migration_details']);
		$this->load->view('state/emis_student_migration_details',$data);
	} else { redirect('/', 'refresh'); }

} 
public function get_migration_detail_student()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Statemodel');
              $dist_id=$this->input->get('dist_id');
              $school_type_from=$this->input->get('school_type_from');

             $school_type_to=$this->input->get('school_type_to');
             
      $data['student_migration_details'] = $this->Statemodel->get_migration_detail_student($dist_id,$school_type_from,$school_type_to);

              

		$this->load->view('state/emis_migration_detail_student',$data);
	} else { redirect('/', 'refresh'); }

} 
  public function emis_enrollment_2019(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$dist_id =$this->session->userdata('emis_district_id');
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			$data['getsctype'] = $this->Statemodel->get_school_type();
			// print_r($this->input->post());die;
			$manage = $this->session->userdata('emis_statereport_schmanage');

			$manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');
			$data['manage'] = $manage;
			$data['cate'] = $school_cate;

			
			// print_r($this->session->userdata());
			// $data['schooldist'] = $this->Datamodel->getallachooldist();
			if($manage!="" && $school_cate){ 
				$data['classcount']  = $this->Statemodel->getallstateclass2019($dist_id,$manage,$school_cate);
				// $data['classcount']=$this->Statemodel->getallcurrentcountsbyclass1($manage);
			}else{
				$data['classcount']=$this->Statemodel->getallstateclass2019('',''); 
			}
			$this->load->view('state/emis_state_enrollment_2019',$data);
			// // echo json_encode($data['classcount']);
		} else { redirect('/', 'refresh'); }

	}
	public function emis_school_unrecognized_list()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
	
			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_unrecognized_details'] = $this->Statemodel->get_school_unrecognized_list();
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_school_unrecognized_list',$data);
	} else { redirect('/', 'refresh'); }

} 
	public function emis_school_unrecognized_block()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		 $district_name=$this->input->get('dist');
			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_unrecognized_details'] = $this->Statemodel->get_school_unrecognized_block($district_name);
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_school_unrecognized_block',$data);
	} else { redirect('/', 'refresh'); }

} 
public function emis_school_unrecognized_school()
{
$this->load->library('session');
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	if($emis_loggedin) {
		 $block_name=$this->input->get('block_name');
		
			//$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
			$data['student_unrecognized_details'] = $this->Statemodel->get_school_unrecognized_school($block_name);
					// print_r($data['student_migration_details']);die();
		$this->load->view('state/emis_school_unrecognized_school',$data);
	} else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_district_wise()
{
  
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
  
    if($emis_loggedin) {
      
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      $manage = $this->session->userdata('emis_statereport_schmanage');



        $manage = $this->input->post('school_manage');

      $school_cate = $this->input->post('school_cate');
      


  //  $mng_cat=$this->input->get('magt_type');
       
       if(!empty($manage))
       {
                      $result = Common::session_search_filter($manage,$school_cate,1);

                      
                  }
                  else
                  {
                        $result = Common::session_search_filter('','',1);
                        $manage = $result['manage'];
                        $school_cate = $result['school_cate'];
                  }
      
                  // print_r($result);

                  $data['manage'] = $manage;
                  $data['cate'] = $school_cate;



      if($manage!="" && $school_cate){ 
          
      $data['school_profile_verification'] = $this->Statemodel->get_school_profile_verification_district_wise($manage,$school_cate);
      
    }
    else{
        $data['school_profile_verification']=$this->Statemodel->get_school_profile_verification_district_wise('',''); 

      }
      // print_r($data['school_profile_verification']);die();
      // echo '<pre>';print_r($data);echo '<pre>';
    $this->load->view('state/school_profile_verification_district_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_profile_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
     
      $data['school_profile_verification'] = $this->Statemodel->get_school_profile_verification_district($district_id,$manage,$school_cate);
    }
     else{
        $data['school_profile_verification']=$this->Statemodel->get_school_profile_verification_district($district_id,$manage,$school_cate); 
      }
      $this->load->view('state/school_profile_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_land_verification_district_wise()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
      echo $district_id;
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
                 

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Statemodel->get_school_land_verification_district_wise($manage,$school_cate);
    }
      else{
         $data['school_land_verification'] = $this->Statemodel->get_school_land_verification_district_wise($manage,$school_cate);
      }
      //print_r($data['school_land_verification']);die();
    $this->load->view('state/school_land_verification_district_wise',$data);
  } else { redirect('/', 'refresh'); }

} 

public function school_land_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Statemodel->get_school_land_verification_district($district_id,$manage,$school_cate);
    }
    else{
         $data['school_land_verification'] = $this->Statemodel->get_school_land_verification_district($district_id,$manage,$school_cate);
      }
      //print_r($data['school_land_verification']);die();
    $this->load->view('state/school_land_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district_wise()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_wise($manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_wise($manage,$school_cate);
    }

      //print_r($data['school_land_verification']);die();
    $this->load->view('state/school_sanitation_verification_district_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('state/school_sanitation_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 


/** ***********************************
  * School Toilet Districtwise        *
  * VIT-sriram                        *
  * Modify Date 16/08/2109            *
  * ***********************************/
public function school_sanitation_verification_district_wise_1()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
      

        $manage        = $this->input->post('school_manage');
        $school_cate   = $this->input->post('school_cate');
        $school_toilet = $this->input->post('school_toilet');
        $school_comp   = $this->input->post('school_comp');
        $school_ratio  = $this->input->post('school_ratio');


        $session_manage = Common::session_create('manage','',2);
  //  $mng_cat=$this->input->get('magt_type');
       // print_r($session_manage);
             if(!empty($manage) || !empty($session_manage)){
                       $result = Common::session_search_tot_filter($manage,$school_cate,$school_toilet,$school_comp,$school_ratio,1);

                 }else
                 {
                       $result = Common::session_search_tot_filter('','','','','',0);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                       $school_toilet = $result['school_toilet'];
                       $school_comp = $result['school_comp'];
                       $school_ratio = $result['school_ratio'];
                 }
     
                 // print_r($this->session->userdata());

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;
                 $data['school_toilet'] = $school_toilet;
                 $data['school_comp'] = $school_comp;
                 $data['school_ratio'] = $school_ratio;

                 $school_comp = Common::spiecal_char_search($school_comp);

      if($manage!="")
      { 
        $where = [];
        if($school_toilet !='' && $school_comp !='' && $school_ratio !='')
        {
            if($school_toilet==5)
            {
              $where = array("round(total_b"."/"."toil_bys_inuse".",0)".' '.$school_comp=>$school_ratio);
            }else if($school_toilet==6)
            {
              $where = array("round(total_g"."/"."toil_inuse_grls".",0)".' '.$school_comp=>$school_ratio);
              

            }else
            {
              $where = array($school_toilet.' '.$school_comp=>$school_ratio);
            }
        }
        // print_r($where);
        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_wise_1($manage,$school_cate,$where);
      }
      else
      {
        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_wise_1($manage,$school_cate,'');
      }

      //print_r($data['school_land_verification']);die();
    $this->load->view('state/school_sanitation_verification_district_wise_1',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_block_wise_1()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
        $manage        = $this->input->post('school_manage');
        $school_cate   = $this->input->post('school_cate');
        $school_toilet = $this->input->post('school_toilet');
        $school_comp   = $this->input->post('school_comp');
        $school_ratio  = $this->input->post('school_ratio');


        $session_manage = Common::session_create('manage','',2);
  //  $mng_cat=$this->input->get('magt_type');
       // print_r($session_manage);die;
        // print_r($this->session->userdata());die;
             if(!empty($manage)){
              // echo "if";
                       $result = Common::session_search_tot_filter($manage,$school_cate,$school_toilet,$school_comp,$school_ratio,1);
                      
                       
                 }else if(!empty($session_manage))
                 {
                  // echo "else if";
                      $result = Common::session_search_tot_filter('','','','','',0);
                       // print_r($result);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                       $school_toilet = $result['school_toilet'];
                       $school_comp = $result['school_comp'];
                       $school_ratio = $result['school_ratio'];
                 }else
                 {
                  // echo "else";
                       $result = Common::session_search_tot_filter('','','','','',0);
                       // print_r($result);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                       $school_toilet = $result['school_toilet'];
                       $school_comp = $result['school_comp'];
                       $school_ratio = $result['school_ratio'];
                 }
     
                 // print_r($result);die;

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;
                 $data['school_toilet'] = $school_toilet;
                 $data['school_comp'] = $school_comp;
                 $data['school_ratio'] = $school_ratio;
                 // print_r($data);die;
                 $school_comp = Common::spiecal_char_search($school_comp);
                 $where = '';
         if($school_toilet !='' && $school_comp !='' && $school_ratio !='')
        {
            if($school_toilet==5)
            {
              $where = array("round(total_b"."/"."toil_bys_inuse".",0)".' '.$school_comp=>$school_ratio);
            }else if($school_toilet==6)
            {
              $where = array("round(total_g"."/"."toil_inuse_grls".",0)".' '.$school_comp=>$school_ratio);
              

            }else
            {
              $where = array($school_toilet.' '.$school_comp=>$school_ratio);
            }
        }
        // print_r($where);die;

      if($manage!="" && $school_cate)
      { 

        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_block_1($manage,$school_cate,$district_id,$where);
      }
      else
      {
        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_block_1($manage,$school_cate,$district_id,$where);
      }

      //print_r($data['school_land_verification']);die();
    $this->load->view('state/school_sanitation_verification_blocl_wise_1',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_sanitation_verification_district_1()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $block_id =$this->input->get('block_id');
     $data['block_id'] = $block_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
      $manage        = $this->input->post('school_manage');
        $school_cate   = $this->input->post('school_cate');
        $school_toilet = $this->input->post('school_toilet');
        $school_comp   = $this->input->post('school_comp');
        $school_ratio  = $this->input->post('school_ratio');


        $session_manage = Common::session_create('manage','',2);
  //  $mng_cat=$this->input->get('magt_type');
       // print_r($session_manage);die;
        // print_r($this->session->userdata());die;
             if(!empty($manage)){
              // echo "if";
                       $result = Common::session_search_tot_filter($manage,$school_cate,$school_toilet,$school_comp,$school_ratio,1);
                      
                       
                 }else if(!empty($session_manage))
                 {
                  // echo "else if";
                      $result = Common::session_search_tot_filter('','','','','',0);
                       // print_r($result);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                       $school_toilet = $result['school_toilet'];
                       $school_comp = $result['school_comp'];
                       $school_ratio = $result['school_ratio'];
                 }else
                 {
                  // echo "else";
                       $result = Common::session_search_tot_filter('','','','','',0);
                       // print_r($result);
                       $manage = $result['manage'];
                       $school_cate = $result['school_cate'];
                       $school_toilet = $result['school_toilet'];
                       $school_comp = $result['school_comp'];
                       $school_ratio = $result['school_ratio'];
                 }
     
                 // print_r($result);die;

                 $data['manage'] = $manage;
                 $data['cate'] = $school_cate;
                 $data['school_toilet'] = $school_toilet;
                 $data['school_comp'] = $school_comp;
                 $data['school_ratio'] = $school_ratio;
                 // print_r($data);die;
                 $school_comp = Common::spiecal_char_search($school_comp);
                 $where = '';
         if($school_toilet !='' && $school_comp !='' && $school_ratio !='')
        {
            if($school_toilet==5)
            {
              $where = array("round(total_b"."/"."toil_bys_inuse".",0)".' '.$school_comp=>$school_ratio);
            }else if($school_toilet==6)
            {
              $where = array("round(total_g"."/"."toil_inuse_grls".",0)".' '.$school_comp=>$school_ratio);
              

            }else
            {
              $where = array($school_toilet.' '.$school_comp=>$school_ratio);
            }
        }

      if($manage!="" && $school_cate)
      { 
        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_1($block_id,$manage,$school_cate,$where);
      }
      else
      {
        $data['school_land_verification'] = $this->Statemodel->get_school_sanitation_verification_district_1($block_id,$manage,$school_cate,$where);
        //print_r($data['school_land_verification']);die();
      }
    $this->load->view('state/school_sanitation_verification_district_1',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_district_wise()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

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

      if($manage!="" && $school_cate){ 
      $data['school_land_verification'] = $this->Statemodel->get_school_committee_verification_district_wise($district_id,$manage,$school_cate);
    }
    else
    {
      $data['school_land_verification'] = $this->Statemodel->get_school_committee_verification_district_wise($district_id,$manage,$school_cate);
      //print_r($data['school_land_verification']);die();
    }
    $this->load->view('state/school_committee_verification_district_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function school_committee_verification_district()
{
$this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $district_id =$this->input->get('dist_id');
     $data['district_id'] = $district_id;
      $data['getmanagecate'] = $this->Statemodel->getmanagecate();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
      $data['school_land_verification'] = $this->Statemodel->get_school_committee_verification_district($district_id,$manage,$school_cate);
      }else{
          $data['school_land_verification'] = $this->Statemodel->get_school_committee_verification_district($district_id,$manage,$school_cate);
      }
    $this->load->view('state/school_committee_verification_district',$data);
  } else { redirect('/', 'refresh'); }

} 

/******************state controller*************************/
public function district_schoolwise_class_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	
      $data['dist_school_details'] = $this->Statemodel->get_state_dist_school_details();
	  //print_r($data['school_details']);
      $this->load->view('state/emis_state_district_class_section',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function district_schoolwise_timetable_report()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data['dist_school_details'] = $this->Statemodel->get_state_dist_school_details();
	  if($a==1)
	  {
		$this->load->view('state/emis_state_district_class_section_timetable',$data);  
	  }
	  else
	  {
		$this->load->view('state/emis_state_district_class_section_timetable',$data);    
	  }
     // $this->load->view('state/emis_state_district_class_section_timetable',$data);
      }else { redirect('/', 'refresh'); }

  }
 
 public function schoolwise_class_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	   $districtid=$_GET['districtid'];
	   
      $data['school_details'] = $this->Statemodel->get_state_school_details($districtid);
	  //print_r($data['school_details']);
      $this->load->view('state/emis_state_schoolwise_class_section',$data);
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
      $data['school_class_details'] = $this->Statemodel->get_school_class_details($school_id);
      $this->load->view('state/emis_state_schoo_all_sections',$data);
    }else { redirect('/', 'refresh');}
	  
  }
  public function district_schoolwise_higher_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data['dist_school_details'] = $this->Statemodel->get_state_dist_higher_school_details();
      $this->load->view('state/emis_state_district_higher_section',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function timetable_lesson_plan()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data['week_lesson_plan'] = $this->Statemodel->get_subjects();
	  //$data['week_lesson_plan'] = $this->Statemodel->get_state_dist_higher_school_details();
      $this->load->view('state/emis_state_lesson_plan',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function timetable_term_plan()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$data['week_lesson_plan'] = $this->Statemodel->get_subjects();
	  $data['term_plan'] = $this->Statemodel->get_term_plan_details();
      $this->load->view('state/emis_school_term_plan',$data);
      }else { redirect('/', 'refresh'); }

  }
    public function term_plan_date_add()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
           $data = array(
		   'term'=> $this->input->post('term'),
		   'start_date'=>$this->input->post('start_date'),
		   'end_date'=>$this->input->post('end_date'),
           'created_date' => date("Y-m-d H:i:s")
            );
			// print_r($data);
			// die();
			  $result = $this->Statemodel->insert_term_plan_data($data);
			  echo $result; 
		
		 }

	
//foreach($getoffice as $off)	
}
public function  term_plan_date_update()
{
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
           $data = array(
		   'term'=> $this->input->post('term'),
		   'start_date'=>$this->input->post('start_date'),
		   'end_date'=>$this->input->post('end_date'),
           'created_date' => date("Y-m-d H:i:s")
            );
			// print_r($data);
			// die();
			  $result = $this->Statemodel->update_term_plan_data($data);
			  echo $result; 
		
		 }

	
}
  public function emis_school_lesson_plan_add()
{
	
		
	$emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) { 
    
	$records = $this->input->post('records');
	$records = json_decode($records,true);
	
	foreach($records as $index => $res)
	{
		 if($index!= 0)
		{
		  
           $data = array(
		   'subject_id'=> $res['SubjectId'],
		   'subject_name'=>$res['SubjectName'],
		   'c1'=>$res['1'],
		   'c2'=>$res['2'],
           'c3' => $res['3'],
		   'c4'=>$res['4'],
		   'c5' => $res['5'],
		   'c6' => $res['6'],
		   'c7' => $res['7'],
		   'c8' => $res['8'],
		   'c9' => $res['9'],
		   'c10' => $res['10'],
		   'c11' => $res['11'],
		   'c12' => $res['12'],
           'created_date' => date("Y-m-d H:i:s") 
            );
			  $result = $this->Statemodel->insert_lesson_plan_data($data);
			   echo $result; 
		}
	}
		 }

	 else { redirect('/', 'refresh'); }
//foreach($getoffice as $off)	
}
   public function district_schoolwise_timetable_created()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data['dist_school_details'] = $this->Statemodel->get_state_dist_school_timetable_data();
      $this->load->view('state/emis_state_district_class_section_timetable',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function schoolwise_class_section_timetable_created()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	   $districtid=$_GET['districtid'];
	     $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
      $data['school_details'] = $this->Statemodel->get_state_school_details_timetable_data($districtid,$this_week_fst,$this_week_ed);
	  //print_r($data['school_details']);
      $this->load->view('state/emis_state_schoolwise_class_section_timetable',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function schoolwise_class_timetable_report_dist()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     $district_id=$_GET['districtid'];
    
    //$monday = strtotime("last monday");
     //   $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

      //   $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

      //  $this_week_fst = date("Y-m-d",$monday);

      //  $this_week_ed = date("Y-m-d",$sunday);
        
          $data['getsctype'] = $this->Statemodel->get_school_type();
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
       $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($school_cate);
      }
      else
      {
        $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($school_cate);
          //  print_r($data['teacherdistrictdetails']);die();
      }
        $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
     // $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($this_week_fst,$this_week_ed);
   // print_r($data['school_timetable_details']);
      $this->load->view('state/emis_district_schoolwise_timetable_dist',$data);
      }else { redirect('/', 'refresh'); }

  }
   public function schoolwise_class_timetable_report_blk()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
     $district_id=$_GET['dist_id'];
    
    $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

        $this_week_fst = date("Y-m-d",$monday);

        $this_week_ed = date("Y-m-d",$sunday);
        
          $data['getsctype'] = $this->Statemodel->get_school_type();
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
       $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
      }
      else
      {
        $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_blk($district_id,$school_cate,$this_week_fst,$this_week_ed);
          //  print_r($data['teacherdistrictdetails']);die();
      }
        $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
     // $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details_dist($this_week_fst,$this_week_ed);
   // print_r($data['school_timetable_details']);
      $this->load->view('state/emis_district_schoolwise_timetable_blk',$data);
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
            $data['getsctype'] = $this->Statemodel->get_school_type();
    
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
        $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
    else
    {
      $data['school_timetable_details'] = $this->Statemodel->get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed);
     
    }
       $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
   // print_r($data['school_timetable_details']);
      $this->load->view('state/emis_district_schoolwise_timetable',$data);
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
      $data['school_class_section_timetable'] = $this->Statemodel->get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed);
     $data['this_week_fst']= $this_week_fst; 
         $data['this_week_ed']= $this_week_ed;
      $this->load->view('state/emis_district_school_section_timetable',$data);
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
      //$dist_id = $this->session->userdata('emis_deo_id');
      $data['school_section_timetable_count'] = $this->Statemodel->get_section_period_count($school_id,$class,$section);
    
      $this->load->view('state/emis_section_period_count_timetable',$data);
    }else { redirect('/', 'refresh');}
    
  }
//pearlin 
   public function emis_teacher_timetable_detail_district()
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
  
      $data['teacher_details'] = $this->Statemodel->get_state_teacher_timetable_report_dist($schooltype,$teachertype,$periods,$firstday, $lastday);
    
      $this->load->view('state/emis_teacher_timetable_detail_district',$data);
   
    } else { redirect('/', 'refresh'); }

    }
   public function emis_teacher_timetable_details()
   {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	   //$districtid=$_GET['districtid'];
     $dist_id=$this->input->get('dist_id');

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
	
      $data['teacher_details'] = $this->Statemodel->get_state_teacher_timetable_report($dist_id,$schooltype,$teachertype,$periods,$firstday, $lastday);
      $data['$dist_id']=$dist_id;
	  //print_r($data['teacher_details']);
      $this->load->view('state/emis_teacher_taken_class_count',$data);
      }else { redirect('/', 'refresh'); }
	   
   }
   public function emis_teacher_schoolwise_timetable_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	   $districtid=$_GET['districtid'];
       $data['schoolwise_teacher_details']= $this->Statemodel->get_state_school_teacher_timetable($districtid);
      $this->load->view('state/emis_state_school_teacher_timetable',$data);
      }else { redirect('/', 'refresh'); }
  }
  public function emis_teacherlist_schoolwise_timetable()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	  $schoolid=$_GET['schoolid'];
      $data['schoolwise_teacher_list'] = $this->Statemodel->get_school_teacherlist_timetable($schoolid);
      $this->load->view('state/emis_state_school_teacher_list',$data);
      }else { redirect('/', 'refresh'); }
  }
   public function emis_teacherassign_classwise()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	  $teacherid=$_GET['teacherid'];
      $data['classwise_teacherassign'] = $this->Statemodel->get_class_teacherassign($teacherid);
      $this->load->view('state/emis_state_school_class_assign_teacher',$data);
      }else { redirect('/','refresh');}
  }
  public function school_class_higher_section()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      //$district_id =$this->session->userdata('emis_district_id');
	   $districtid=$_GET['districtid'];
	   
      $data['school_details'] = $this->Statemodel->get_state_school_higher_details($districtid);
	  //print_r($data['school_details']);
      $this->load->view('state/emis_state_schoolwise_higher_class_section',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function school_higher_class_section()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	 $school_id=$_GET['schoolid'];
     $data['schoolname']=$_GET['schoolname'];
      $dist_id = $this->session->userdata('emis_deo_id');
      $data['school_class_details'] = $this->Statemodel->get_school_class_details($school_id);
      $this->load->view('state/emis_state_schoo_all_higher_sections',$data);
    }else { redirect('/', 'refresh');}
	  
  }
   
 public function state_district_special_cash()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $district_id =$this->session->userdata('emis_district_id');
      $data['state_cash_details'] = $this->Statemodel->get_state_dist_special_cash();
      $this->load->view('state/emis_state_district_special_cash',$data);
      }else { redirect('/', 'refresh'); }

  }  
  public function schoolwise_special_cash()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $district_id=$_GET['districtid'];
	  //print_r($district_id);
      $data['school_cash_details'] = $this->Statemodel->get_dist_special_cash($district_id);
	  //print_r($data['school_cash_details']);
      $this->load->view('state/emis_state_schoolwise_special_cash',$data);
      }else { redirect('/', 'refresh'); }

  }  
  
  /***************************************************/

  /***************************************************
        Function done by Ramco Magesh 23-04-2019
  ****************************************************/
    public function school_construction_details() {
        $this->load->library('session');
            
            if($this->uri->segment(3,0)!=null){
                $where = " WHERE district_id=".$this->uri->segment(3,0)."";
                $group = " GROUP BY school_id";
                
            }else{
                $group = " GROUP BY district_id";
            }
            
            $data['construction'] = $this->Statemodel->school_construction_district($where,$group);
        $this->load->view('state/school_constructiondetails_district',$data);
    }
    
    
    public function school_lab_details() {
        $this->load->library('session');
        $data['lablist']=$this->Datamodel->getLablist();
       
            $lablist = $this->input->post('lablist')!=''?$this->input->post('lablist'):'\'\'';
            print_r($this->uri->segment(3,0));
            
            if($this->uri->segment(3,0)!=null){
                if($this->uri->segment(5,0)!=null){
                    if(!isset($_POST['lablistsearch'])){
                        $lablist = $this->uri->segment(4,0)!=''?$this->uri->segment(4,0):'\'\'';    
                    }
                    
                    
                    if($this->session->userdata('emis_state_id')!=''){
                      echo $this->session->userdata('emis_state_id');

                        $a = 'district_id';
                        $b = $this->uri->segment(5,0);
                    }elseif($this->session->userdata('emis_district_id')!=''){
                     
                        $a = 'district_id'; 
                        $b = $this->uri->segment(5,0);
                    }elseif($this->session->userdata('emis_deo_id')!=''){

                        $a = 'edu_dist_id';
                        $b = $this->session->userdata('emis_deo_id');
                        //print_r($b);
                        //die();
                    }elseif($this->session->userdata('emis_block_id')!=''){
                        $a = 'block_id';
                        $b = $this->session->userdata('emis_block_id');
                    }
                    
                    
                    
                    $where = " WHERE ".$a."=".$b." and cate_type in ('High School','Higher Secondary School') and lab_id=".$lablist."";
                    $group = " GROUP BY school_id";
                }else{
                    
                    $where = " WHERE udise_code IS NOT NULL and cate_type in ('High School','Higher Secondary School') and lab_id=".$lablist."";
                    $group = " GROUP BY district_id";
                }
            
            }
            
            $data['labentry'] = $this->Statemodel->school_labdetails_district($where,$group);
            $data['postvar'] = array($lablist);
            $this->load->view('state/school_labdetails_district',$data);
    }
    
    
     public function school_device_details() {
        
        $this->load->library('session');
            
                $category = $this->uri->segment(3,0);
                $data['ictlist'] = $this->Datamodel->getICTList($category);
                $data['ictsuppliers'] = $this->Datamodel->getICTSupplier();
               
                    $devicelist = $this->input->post('devicelist')!=''?$this->input->post('devicelist'):'\'\''; 
                    $suppliers =  $this->input->post('suppliers')!=''?$this->input->post('suppliers'):'\'\'';
                    
                    //print_r($suppliers);
                    //die();
                    
              
            if($this->uri->segment(3,0)!=null) {
                
                if($this->uri->segment(6,0)!=null){
                    if(!isset($_POST['devicelistsearch'])){
                        $devicelist = ($this->uri->segment(4,0)!='' && $this->uri->segment(4,0)!=0)?$this->uri->segment(4,0):'\'\''; 
                        $suppliers =  ($this->uri->segment(5,0)!='' && $this->uri->segment(5,0)!=0)?$this->uri->segment(5,0):'\'\'';
                    }
                    if($this->session->userdata('emis_state_id')!=''){
                        $a = 'district_id';
                        $b = $this->uri->segment(6,0);
                    }elseif($this->session->userdata('emis_district_id')!=''){
                        $a = 'district_id'; 
                        $b = $this->uri->segment(6,0);
                    }elseif($this->session->userdata('emis_deo_id')!=''){
                        $a = 'edu_dist_id';
                        $b = $this->session->userdata('emis_deo_id');
                    }elseif($this->session->userdata('emis_block_id')!=''){
                        $a = 'block_id';
                        $b = $this->session->userdata('emis_block_id');
                    }
                    
                    if($devicelist!='' && $suppliers!='' && $devicelist!='\'\'' && $suppliers!='\'\''){$connect='AND';}else{$connect='OR';}
                    $where = " WHERE udise_code IS NOT NULL AND ".$a."=".$b." and 
                    ( ictid=".$devicelist."  ".$connect." supp_id=".$suppliers.")";
                    $group = " GROUP BY school_id, ictetrid";
                }else{
                    if($devicelist!='' && $suppliers!='' && $devicelist!='\'\'' && $suppliers!='\'\''){$connect='AND';}else{$connect='OR';}
                    $where = " WHERE udise_code IS NOT NULL and 
                    (ictid=".$devicelist."  ".$connect." supp_id=".$suppliers.")";
                    $group = " GROUP BY district_id";
                }  
            }
            
            $data['devicelist'] = $this->Statemodel->school_devicedetails_district($where,$group);
            $data['postvar'] = array($devicelist,$suppliers);
            //print_r($data['postvar']);
            //die();
            $this->load->view('state/school_devicedetails_district',$data);
        
     }
    
  /***************************************************
  ***************************************************/
  
  
  /******************************************************************
            Function done by 15-05-2018 Ramco magesh
  *******************************************************************/
  
  public function schoolprofileverifcation() {
    $this->load->library('session');
    $part = $this->uri->segment(3,0);
    
    $where = "where udise_code is not null";
    switch(1) {
            case $this->session->userdata('emis_state_id')!=null:{
                switch($part) {
                    case '0':{
                        $group = " GROUP BY schoolnew_partdetails.id,district_id";
                        break;
                    }
                    case 'block':{
                        $where.=" and district_id=".$this->uri->segment(4,0);
                        $group = " GROUP BY schoolnew_partdetails.id,block_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(4,0);
                        $group = " GROUP BY school_id,schoolnew_partdetails.id";
                        break;
                    }
                }
                break;
            }
            
            
            case $this->session->userdata('emis_district_id') !=null: {
                switch($part) {
                    case '0': {
                        
                        $where.= " and district_id=".$this->session->userdata('emis_district_id');
                        $group = " group by schoolnew_partdetails.id,district_id";
                        
                        break;
                    }
                    case 'block': {
                        $where.= " and district_id=".$this->uri->segment(4,0);
                        $group = " group by schoolnew_partdetails.id,block_id";
                        break;
                    }
                    case 'school': {
                        $where.=" and block_id=".$this->uri->segment(4,0);
                        $group= " group by school_id,schoolnew_partdetails.id";
                        break;
                    }
                }
                break;
            }
            
            
            case $this->session->userdata('emis_deo_id') !=null: {
                switch($part) {
                    case '0': {
                        $where.= " and edu_dist_id=".$this->session->userdata('emis_deo_id');
                        $group= " group by schoolnew_partdetails.id,block_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and block_id=".$this->uri->segment(4,0);
                        $group = " group by schoolnew_partdetails.id,school_id";
                        break;
                    }
                    case 'school': {
                        $where.=" and block_id=".$this->uri->segment(4,0);
                        $group = " group by school_id,schoolnew_partdetails.id";
                        break;
                    }
                    
                }
                break;
            }
            
            case $this->session->userdata('emis_block_id') !=null: {
                switch($part) {
                    case '0': {
                        $where.=" and block_id=".$this->session->userdata('emis_block_id');
                        $group = " group by schoolnew_partdetails.id,school_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and block_id=".$this->uri->segment(4,0);
                        $group = " group by schoolnew_partdetails.id,school_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(4,0)."";
                        $group= " group by school_id,schoolnew_partdetails.id";
                        break;
                    }
                }
                break;
            }
            
    }
    
    $data['head']  = $this->Statemodel->school_partdetails(); 
    $data['complist'] =json_decode(json_encode($this->Statemodel->schoolprofilecompletionlist($where,$group)),true);
    //print_r($data['complist']);
    //die();
    $this->load->view('state/schoolprofileverification',$data);
  }
  
  function beoverify() {
    
    $js = $this->input->post('js');
    $data = json_decode($js,true);
    //$i=0;
    
    foreach($data as $list){
       $school_id=$list['school_key_id']; 
       $a[]=array(
       'school_key_id' => $list['school_key_id'],
       'module_id'     => $list['module_id']
       );
       if(!$i++){
        $b = array(
            'school_key_id'=> $list['school_key_id'],
            'verification' => $list['verification'],
            'emis_sno'     => $list['emis_sno']
        );
       }
    }
    
    //print_r($b);
    //die();
    
    echo $this->Statemodel->beoverify($a,$b,$school_id);
    
    
  }
  
  /*********************END*******************************/
  
  /***************************************************
        Function done by Ramco Magesh 02-05-2019
  *****************************************************/
  
    public function getstudentsalltotal() {
    $this->load->library('session');
    $set = $this->uri->segment(3,0);    
    $part = $this->uri->segment(4,0);
		
		$data['getmanagecate'] = $this->Statemodel->getmanagecate();
		$data['getsctype'] = $this->Statemodel->get_school_type();
        
        
        $school_cate = array('Pre-Primary School','Primary School','Middle School','High School','Higher Secondary School','Special School');
        $manage =  array('Government');
        /*,'Fully Aided','Un-aided','Partially Aided','Central Govt'*/
        if(!empty($_POST['school_manage'])){
            $manage = $_POST['school_manage'];
        }
        if(!empty($_POST['school_cate'])){
            $school_cate = $_POST['school_cate'];
        }
         
         
        
        
        
        
       
		if($set == 1 ){
		  $where.= " ";
		}elseif($set == 2) {
		  $where.= " schoolnew_school_department.id in (3,6,18,27,29,32,34,42) and ";
		}elseif($set == 3){
		  $where.= " schoolnew_school_department.id in (1,5,15,17,19,20,21,22,23,24,26,31,33) and ";
		}elseif($set == 4){
		  $where.= " schoolnew_school_department.id in (28) and ";
		}
        
        $where .= " school_type in ('".implode("','",$manage)."') and cate_type in ('".implode("','",$school_cate)."')";
        
        
        switch(1) {
            case $this->session->userdata('emis_state_id')!=null:{
                switch($part){
                    case '0':{
                        $group = " GROUP BY district_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and district_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY block_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                }
                break;
            }
            
            
            case $this->session->userdata('emis_district_id')!=null:{
                switch($part){
                    case '0':{
                        $where.= " and district_id=".$this->session->userdata('emis_district_id');
                        $group = " GROUP BY block_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                }
                break;
                }
                
                
                case $this->session->userdata('emis_deo_id')!=null:{
                switch($part){
                    case '0':{
                        $where.= " and edu_dist_id=".$this->session->userdata('emis_deo_id');
                        $group = " GROUP BY block_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                }
                break;
                }
                
                case $this->session->userdata('emis_block_id')!=null:{
                switch($part){
                    case '0':{
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                    case 'block': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                    case 'school': {
                        $where.= " and block_id=".$this->uri->segment(5,0);
                        $group = " GROUP BY school_id";
                        break;
                    }
                }
                break;
                }
                
        }
        //print_r($where.$group);
        //die();
        $data['details'] = $this->Statemodel->getschool($where,$group);
        //print_r($data['details']);
        //die();
    	$this->load->view('state/emis_district_home1',$data);
     
        }
        
        
        
        
        function schemeedureport(){
            $where='';$group='';
            
            switch($this->session->userdata('user_type')){
                case 5:{
                    $where='';
                    $group=',district_id';
                    if($this->uri->segment(4,0)!=null){
                        switch($this->uri->segment(4,0)){
                            case 'EDU':{
                                $where=' AND district_id='.$this->uri->segment(3,0);
                                $group=',edu_dist_id';
                                break;
                            }
                            case 'BLK':{
                                $where=' AND edu_dist_id='.$this->uri->segment(3,0);
                                $group=',block_id';
                                break;
                            }
                            case 'SCH':{
                                $where=' AND block_id='.$this->uri->segment(3,0);
                                $group=',school_id';
                                break;
                            }
                        }
                    }
                    break;
                }
                case 6:{
                    $where=' AND block_id='.$this->session->userdata('emis_block_id');
                    $group=',school_id';
                    break;
                }
                case 9:{
                    $where=' AND district_id='.$this->session->userdata('emis_district_id');
                    $group=',edu_dist_id';
                    if($this->uri->segment(4,0)!=null){
                        switch($this->uri->segment(4,0)){
                            case 'BLK':{
                                $where=' AND edu_dist_id='.$this->uri->segment(3,0);
                                $group=',block_id';
                                break;
                            }
                            case 'SCH':{
                                $where=' AND block_id='.$this->uri->segment(3,0);
                                $group=',school_id';
                                break;
                            }
                        }
                    }
                    break;
                }
                case 10:{
                    $where=' AND edu_dist_id='.$this->session->userdata('emis_deo_id');
                    $group=',block_id';
                    if($this->uri->segment(4,0)!=null){
                        switch($this->uri->segment(4,0)){
                            case 'SCH':{
                                $where=' AND block_id='.$this->uri->segment(3,0);
                                $group=',school_id';
                                break;
                            }
                        }
                    }
                    
                    break;
                }
                case 1:{
                    $where=' AND school_id='.$this->session->userdata('emis_school_id');
                    $group='';
                    break;
                }
            }
            
            //$data['schemeedureport']=json_decode(json_encode($this->Statemodel->schemeedureport($where,$group)),true);
            //die();
            $this->load->view('freeSchemes/schemereport',$data);
        }
  
  /***************************************************
  ***************************************************/
  
  
  
  
  /**************************** School Pucca and kutcha building *************************/

			  	/********************************************
			  	* School Pu and ku building Districtwise    *
			  	* VIT-Sriram 								*
			  	* 25/04/2019 								*
			  	*********************************************/

  	public function get_emis_state_school_building_district()
  	{

  	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      	$data['school_details'] = $this->Statemodel->get_districtwise_school_building_details();
      	// print_r($data);
      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
        $this->load->view('state/emis_state_bd_district',$data);

      	// $this->load->view('state/emis_state_bd_disrtict',$data);
      }else { redirect('/', 'refresh'); }

  	}

  				/********************************************
			  	* School Pu and ku building schoolwise 	    *
			  	* VIT-Sriram 								*
			  	* 25/04/2019 								*
			  	*********************************************/

 	public function get_emis_state_school_building_school()
 	{
 		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      		$dist_id = $this->input->get('dist');
          echo $dist_id;
      		$filter = $this->input->post('build_type');
           print_r($filter);
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
      		$data['school_details'] = $this->Statemodel->get_schoolwise_building_details($dist_id,$block_filter);

      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
      	$data['dist_id'] = $dist_id;
      	$data['block_filter_data'] = $filter;
      	$this->load->view('state/emis_state_bd_schoolwise',$data);

      }else { redirect('/', 'refresh'); }

 	}


 	/************************************
 	  * School Nature Const Details 	*
 	  * VIT-sriram 						*
 	  * 26/04/2019 						*
 	  ***********************************/

 	public function get_school_nature_details()
 	{
 		// echo "function in";die;
 		$table = $this->input->post('table');
 		$where = $this->input->post('where');

 		$building_details = Common::get_multi_list($table,$where);
 		echo json_encode($building_details);die;
 	}

 	/************************ End *****************************/

 	/*********************** Students Search ******************/

		 	/**************************************
			 * Students Search Based On TimeLine  *
			 * VIT-Sriram 						            *
			 * 26/04/2019 						            *
		 	 **************************************/
	public function get_student_search_details()
	{
		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {

      	$head_details = $this->get_common_control_link();
      	$data['header'] = $head_details['header'];
      	$data['link'] = $head_details['link'];
      	
      	
      	$this->load->view('state/emis_state_student_search',$data);

      }else { redirect('/', 'refresh'); }
      
	}

  // /***********************************************
  //      * Students Filter                             *
  //      * VIT-Sriram                                  *
  //      * 26/03/2019                                  *
  //      ***********************************************/

  //     public function get_studetus_search()
  //     {
  //        $this->load->library('session');
  //       $emis_loggedin = $this->session->userdata('emis_loggedin');
  //       if($emis_loggedin) 
  //       {
  //           $this->load->model('Registermodel');
  //           // print_r($this->input->post());
  //         $filter_val = $this->input->post('search_data');
  //         $db_col = $this->input->post('db_col');
  //         $db_sub_col = $this->input->post('db_sub_col');
  //         $class_id = $this->input->post('class_id');
  //         $records = $this->Registermodel->get_students_admit_details($filter_val,$db_col,$db_sub_col,$class_id);
  //         echo json_encode($records);
  //       } else { redirect('/', 'refresh'); }
        
  //     }

  //      public function get_studetus_search_arch()
  //     {
  //        $this->load->library('session');
  //       $emis_loggedin = $this->session->userdata('emis_loggedin');
  //       if($emis_loggedin) 
  //       {
  //           $this->load->model('Registermodel');
  //           // print_r($this->input->post());
  //         $filter_val = $this->input->post('search_data');
  //         $db_col = $this->input->post('db_col');
  //         $db_sub_col = $this->input->post('db_sub_col');
  //         $class_id = $this->input->post('class_id');
  //         $records = $this->Registermodel->get_students_admit_details_arch($filter_val,$db_col,$db_sub_col,$class_id);
  //         echo json_encode($records);
  //       } else { redirect('/', 'refresh'); }
        
  //     }

  /************************** End ***************************/

	public function emis_dash_govt(){
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
			$data['getmanagecate'] = $this->Statemodel->getmanagecate();
			
			$data['getsctype'] = $this->Statemodel->get_school_type();
      
			
			$manage = $this->session->userdata('emis_statereport_schmanage');

		    $manage = $this->input->post('school_manage');
			$school_cate = $this->input->post('school_cate');

	//	$mng_cat=$this->input->get('magt_type');
		   
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


			
		   

			if($manage!="" && $school_cate){ 

				$data['classcount']  = $this->Statemodel->getstategovt($manage,$school_cate);
			
			}else{
				$data['classcount']=$this->Statemodel->getstategovt('',''); 
			}
			//print_r($data);

			$this->load->view('state/emis_state_govt',$data);
			
		} else { redirect('/', 'refresh'); }

	}
	
	//overall district in  aadhar count

   public function emis_state_district_aadhar_count()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
           $data['dist_aadhar_details'] = $this->Statemodel->emis_state_district_aadhar_count();
           $this->load->view('state/emis_state_district_aadhar_count',$data);
      }else { redirect('/', 'refresh'); }

  }
   //Aadhar particular district base count details
  public function aadhar_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
		  $districtid=$_GET['districtid'];
		  $data['aadhar_school_details'] = $this->Statemodel->aadhar_school_distic_based_count_details($districtid);
		  $this->load->view('state/aadhar_school_based_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
  
  //Aadhar particular school base count details
  public function aadhar_school_base_count_details()
  {
   
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
          $school_id=$_GET['schoolid'];
	     // echo $school_id;
          // $data['schoolname']=$_GET['schoolname'];
          $data['aadhar_schoolbase_details'] = $this->Statemodel->aadhar_school_base_count_details($school_id);
          $this->load->view('state/emis_aadhar_school_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
  //not a aadhar count 
  public function aadhar_school_notin_count_details()
  {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
           $school_id=$_GET['schoolid'];
	      // echo $school_id;
		   // $data['schoolname']=$_GET['schoolname'];
		   $data['notinaadhar_schoolbase_details'] = $this->Statemodel->
		   notin_aadhar_school_base_count_details($school_id);
            $this->load->view('state/emis_notin_aadhar_school_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
  //noon meal Report
   public function emis_state_district_noonmeal_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
            $data['noonmeal_count_details'] = $this->Statemodel->emis_state_district_noonmeal_count_details();
           $this->load->view('state/emis_state_district_noonmeal_aadhar_count',$data);
      }else { redirect('/', 'refresh'); }

  }
  
   public function meal_school_distic_based_count_details()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
		  $districtid=$_GET['districtid'];
		   $data['meal_school_details'] = $this->Statemodel->meal_school_distic_based_count_details($districtid);
		  $this->load->view('state/meal_school_distic_based_count_details',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function meal_school_eligible_stud_count()
   {
	  $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
	  {
           $school_id=$_GET['schoolid'];
	       //echo $school_id;
		    //$data['schoolname']=$_GET['schoolname'];
		   $data['meal_school_eligible_stud_count'] = $this->Statemodel->
		   meal_school_eligible_stud_count_details($school_id);
            $this->load->view('state/emis_meal_school_eligible_stud_count_details',$data);
      }else { redirect('/', 'refresh'); }
	  
  }
  
  
  public function emis_prekg_student_joined()
	{
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			
		//$data['state_student']= $this->Statemodel->govt_enrollment();
		// $studtotal=$state_student[0]->total;
		// print_r($studtotal);
		$data['stud_admission_count']=$this->Statemodel->stud_admission_count();
				$this->load->view('state/emis_state_district_prekg_student_joined',$data);
			
		} else { redirect('/', 'refresh'); }
		
	}
	
	 public function emis_dist_school_prekg_student_joined()
	{
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
			$districtid=$_GET['id'];
		//print_r($districtid);
		$data['stud_school_admission_count']=$this->Statemodel->emis_dist_school_prekg_student_joined($districtid);
    //print_r($data['stud_school_admission_count']);
				$this->load->view('state/emis_dist_school_prekg_student_joined',$data);
		} else { 
      redirect('/', 'refresh'); }
	}

	//staff districtwise count 
	public function emis_staff_district_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {
				$data['staff_district_details'] = $this->Statemodel->emis_staff_district_count_details();
			   $this->load->view('state/emis_staff_district_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	//staff district schoolwise count
	public function emis_staff_district_school_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {      
	            $districtid=$_GET['districtid'];
				$data['staff_district_school_details'] = $this->Statemodel->emis_staff_district_school_count_details($districtid);
			    $this->load->view('state/emis_staff_district_school_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_staff_school_count_details()
	{
		  $this->load->library('session');
		  $emis_loggedin = $this->session->userdata('emis_loggedin');
		  if($emis_loggedin) 
		  {       
	             $school_id=$_GET['schoolid'];
				$data['staff_school_details'] = $this->Statemodel->emis_staff_school_count_details($school_id);
			    $this->load->view('state/emis_staff_school_count_details',$data);
		  }else { redirect('/', 'refresh'); }
	}
	public function emis_staff_BRTE()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $data['staff_district_details'] = $this->Statemodel->emis_staff_BRTE();
         $this->load->view('state/emis_staff_BRTE',$data);
      }else { redirect('/', 'refresh'); }
  }
  public function emis_staff_BRTE_list()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      $dist_id=$this->input->get('districtid');
      if($emis_loggedin) 
      {
        $data['staff_district_details'] = $this->Statemodel->emis_staff_BRTE_list($dist_id);
         $this->load->view('state/emis_staff_BRTE_list',$data);
      }else { redirect('/', 'refresh'); }
  }
	

  /*************************************** End ******************************/

  /**************************** Staff Fixation *****************************/

  /***********************************
    * Staff Fixation Districtwise    *
    * VIT-sriram                     *
    * 08/05/2019                     *
    **********************************/

  public function get_staff_fix_district()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
        $data['dist_details'] = $this->Statemodel->get_staff_fix_district();
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_state_staff_fix_districtwise',$data);
    }
  }

  public function get_staff_fix_schoolwise()
  {
      $dist_id = $this->input->get('dist');

      $data['school_details'] = $this->Statemodel->get_staff_fix_schoolwise($dist_id);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('state/emis_state_staff_fix_schoolwise',$data);   
  }
  public function get_staff_fix_district_dse()
  {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) 
    {
        $data['dist_details'] = $this->Statemodel->get_staff_fix_district_dse();
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_state_staff_fix_districtwise_dse',$data);
    }
  }

  public function get_staff_fix_schoolwise_dse()
  {
      $dist_id = $this->input->get('dist');

      $data['school_details'] = $this->Statemodel->get_staff_fix_schoolwise_dse($dist_id);
      $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
      $this->load->view('state/emis_state_staff_fix_schoolwise_dse',$data);   
  }
  
 	public function emis_district_staff_data()
	{
		$school_id=$this->input->post('school_id');
				 // echo $school_id;
				 
				$staff_school_details = $this->Statemodel->emis_staff_school_count_details($school_id);
				echo json_encode($staff_school_details);
	} 
	
	//Staff and students details
	public function emis_staff_stud_district_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$data['staff_stud_dist_details'] = $this->Statemodel->emis_staff_stud_district_details();
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_stud_district_details',$data); 
			}
	}
	public function emis_staff_stud_dist_school_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$districtid=$_GET['district_id'];
				$data['staff_stud_dist_school_details'] = $this->Statemodel->emis_staff_stud_dist_school_details($districtid);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_stud_dist_school_details',$data); 
			}
	}
	//staff fixa dee details count by raju
		public function emis_staff_fixa_tot_school_details()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_fixa'] = $this->Statemodel->emis_staff_fixa_tot_school_details();
				$data['staff_eli'] = $this->Statemodel->staff_eligible();
				$data['staff_sanct'] = $this->Statemodel->staff_sanct();
				$data['staff_avail'] = $this->Statemodel->staff_avail();
				$data['staff_need'] = $this->Statemodel->staff_need();
				$data['staff_surpwith'] = $this->Statemodel->staff_surpwith(); 
			  $data['staff_surpwithout'] = $this->Statemodel->staff_surpwithout(); 
			 // print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_fixa_tot_school_details',$data); 
			}
	}
	//staff fixa dse details count by raju
  public function emis_staff_fixa_tot_school_details_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['dsestaff_fixa'] = $this->Statemodel->emis_staff_fixa_tot_school_details_dse();
        $data['dsestaff_eli'] = $this->Statemodel->dsestaff_eligible();
        $data['dsestaff_sanct'] = $this->Statemodel->dsestaff_sanct();
        $data['dsestaff_avail'] = $this->Statemodel->dsestaff_avail();
        $data['dsestaff_need'] = $this->Statemodel->dsestaff_need();
        $data['dsestaff_surpwith'] = $this->Statemodel->dsestaff_surpwith(); 
        $data['dsestaff_surpwithout'] = $this->Statemodel->dsestaff_surpwithout(); 
       // print_r($data['staff_fixa']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_tot_school_details_dse',$data); 
      }
  }
 

    public function emis_staff_fixa_report()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report(); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_tot_school_report',$data); 
      }
  }
    public function emis_staff_fixa_report_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $district_id=$this->input->get('district_id');
       
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_block($district_id); 
       //print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_school_report_block',$data); 
      }
  }
   public function emis_staff_fixa_report_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       $block_id=$this->input->get('block_id');
       
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_school($block_id); 
       //print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_school_report_school',$data); 
      }
  }
	
	    public function emis_staff_fixa_report_PG()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG(); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG',$data); 
      }
  }
  public function emis_staff_fixa_report_PG_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $district_id=$this->input->get('district_id');

        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG_block($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG_block',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $block_id=$this->input->get('block_id');
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG_school($block_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG_school',$data); 
      }
  }

 public function emis_staff_fixa_report_PG1()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
      
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG1(); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG_1',$data); 
      }
  }
  public function emis_staff_fixa_report_PG_block1()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $district_id=$this->input->get('district_id');

        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG_block1($district_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG_block1',$data); 
      }
  }
   public function emis_staff_fixa_report_PG_school1()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        $block_id=$this->input->get('block_id');
        $data['staff_fixa_report'] = $this->Statemodel->staff_fixa_report_PG_school1($block_id); 
       // print_r($data['staff_fixa_report']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_fixa_report_PG_school1',$data); 
      }
  }


	public function emis_staff_eligiblepost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_eligiblepost'] = $this->Statemodel->emis_staff_eligiblepost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_eligiblepost',$data); 
			}
	}
	
	public function emis_staff_sanctionpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_sanctpost'] = $this->Statemodel->emis_staff_sanctionpost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_sanctionpost',$data); 
			}
	}
	public function emis_staff_availpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_availpost'] = $this->Statemodel->emis_staff_availpost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_availpost',$data); 
			}
	}
	public function emis_staff_needpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_needpost'] = $this->Statemodel->emis_staff_needpost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_needpost',$data); 
			}
	}
	public function emis_staff_surpwithpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_surpwithpost'] = $this->Statemodel->emis_staff_surpwithpost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_surpwithpost',$data); 
			}
	}
	public function emis_staff_surpwithoutpost()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['staff_surpwithoutpost'] = $this->Statemodel->emis_staff_surpwithoutpost();
				// print_r($data['staff_fixa']);
				$head_details = $this->get_common_control_link();
				$data['header'] = $head_details['header'];
				$data['link'] = $head_details['link'];
				$this->load->view('state/emis_staff_surpwithoutpost',$data); 
			}
	}
	
	public function teacher_profile_complition_stus()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['dee_teacher_profile'] = $this->Statemodel->emis_dee_teacher_profile();
       //print_r( $data['dee_teacher_profile']);
       // $data['emis_dee_HM_middle'] = $this->Statemodel->emis_dee_HM_middle();
       // print_r( $data['emis_dee_HM_middle'])
      //  print_r($data['dee_teacher_profile']);
        $this->load->view('state/emis_dee_teacher_profile_completion',$data); 
      }
  }
  public function staff_fixtation_sub_wise()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['staff_fixtation_sub_wise'] = $this->Statemodel->staff_fixtation_sub_wise();
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('state/emis_staff_fixtation_sub_wise',$data); 
      }
  }


   public function staff_fixtation_sub_wise_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['staff_fixtation_sub_wise'] = $this->Statemodel->staff_fixtation_sub_wise_dse();
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('state/emis_staff_fixtation_sub_wise_dse',$data); 
      }
  }
  /** public function staff_fixtation_sub_wise_pg()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['staff_fixtation_sub_wise'] = $this->Statemodel->staff_fixtation_sub_wise_pg();
       //print_r( $data['staff_fixtation_sub_wise']);
       
        $this->load->view('state/emis_staff_fixtation_sub_wise_pg',$data); 
      }
  }*/
  
  public function emis_staff_transfer_req()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
       
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_req(); 
     // print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_req_report',$data); 
      }
  }
   public function emis_staff_transfer_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->input->get('district_id');
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_req_block($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_req_report_block',$data); 
      }
  }
    public function emis_staff_transfer_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_req_teacher($block_id); 
       //print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_req_report_teacher',$data); 
      }
  }

  public function emis_staff_transfer_dse_req()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
     
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_dse_req(); 
      // print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_dse_req_report',$data); 
      }
  }
   public function emis_staff_transfer_dse_req_block()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $district_id=$this->input->get('district_id');
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_dse_req_block($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_dse_req_report_block',$data); 
      }
  }
    public function emis_staff_transfer_dse_req_teacher()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $district_id=$this->input->get('district_id');
        $block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Statemodel->staff_transfer_dse_req_teacher($district_id); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_staff_dse_req_report_teacher',$data); 
      }
  }
    public function teacher_profile_complition_stus_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
        
        $data['dse_teacher_profile'] = $this->Statemodel->emis_dse_teacher_profile();
       // print_r( $data['dse_teacher_profile']);
       // $data['emis_dee_HM_middle'] = $this->Statemodel->emis_dee_HM_middle();
       // print_r( $data['emis_dee_HM_middle'])
      //  print_r($data['dee_teacher_profile']);
        $this->load->view('state/emis_dse_teacher_profile_completion',$data); 
      }
  }
  /* DSE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['totalsurplus'] = $this->Statemodel->emis_total_surplus_teacher();
				 $data['teachertype_total'] = $this->Statemodel->emis_total_surplus_teacher_type();
				// $data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('state/emis_state_surplus_tot_count_dse',$data);
 				
			}
		 
	  }
	  public function emis_teacher_surplus_sg()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_sg_dse();
				
				$this->load->view('state/emis_staff_sg_teachers_dse',$data);
			}
		 
	  }
	    public function emis_csr_report()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['csr'] = $this->Statemodel->emis_csr_report();
				
				$this->load->view('state/emis_csr_report',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_highhm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_highhm();
				$this->load->view('state/emis_staff_highhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_hrshm()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_hrshm();
				$this->load->view('state/emis_staff_hrhm_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_pg();
				$this->load->view('state/emis_staff_pg_teachers_dse',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_bt();
				$data['subjects'] = $this->Statemodel->getsubjects();
				$this->load->view('state/emis_staff_bt_teachers_dse',$data);
			}
	  }
  
 /* End of the module */
 /* DEE school surplus staff count Created by Bala*/
	 public function emis_total_surplus_teacher_dee()
	  {
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['totalsurplus'] = $this->Statemodel->emis_total_surplus_teacher_dee();
				 $data['teachertype_total'] = $this->Statemodel->emis_total_surplus_teacher_type_dee();
				// $data['dsesurplus_sub'] = $this->Ceo_District_model ->DSEsurplus_sub($dist_id);
				$this->load->view('state/emis_state_surplus_tot_count_dee',$data);
 				
			}
		 
	  }
	  public function emis_teacher_surplus_sg_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_sg_dee();
				$this->load->view('state/emis_staff_sg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_phm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_phm_dee();
				$this->load->view('state/emis_staff_phm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_mhm_dee()
	  {
		 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_mhm_dee();
				$this->load->view('state/emis_staff_mhm_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_pg_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_pg_dee();
				$this->load->view('state/emis_staff_pg_teachers_dee',$data);
			}
		 
	  }
	  public function emis_teacher_surplus_bt_dee()
	  { 
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['sgteachers'] = $this->Statemodel->emis_total_surplus_teacher_bt_dee();
				$this->load->view('state/emis_staff_bt_teachers_dee',$data);
			}
	  }

    public function emis_PG_fixation()
    {
         $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
         $pst=$this->input->post('emis_state_fix')==''?'elig_':$this->input->post('emis_state_fix');
         //print_r($pst);
        // print_r($pst);
         $sql=array();
         for($i=1;$i<44;$i++){
            array_push($sql,"SUM($pst$i) as $pst$i");
         }
         $ssql=implode(',',$sql);

         $data['DT']=$this->Statemodel->emis_PG_fixation($ssql);
     // print_r($DT['pg_fix']);
        $this->load->view('state/emis_PG_fixation',$data);
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
      $this->load->model('Statemodel');
      
      $data['total_count_details'] = $this->Statemodel->get_state_school();
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school',$data);
   
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
      $this->load->model('Statemodel');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_district($mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_district',$data);
   
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
      $this->load->model('Statemodel');
      $dist=$this->input->get('dist');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_wise($dist,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_wise',$data);
   
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
      $this->load->model('Statemodel');
      
      $data['total_count_details'] = $this->Statemodel->get_state_school_dee();
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_dee',$data);
   
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
      $this->load->model('Statemodel');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_district_dee($mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_district_dee',$data);
   
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
      $this->load->model('Statemodel');
      $dist=$this->input->get('dist');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_wise_dee($dist,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_wise_dee',$data);
   
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
      $this->load->model('Statemodel');
      
      $data['total_count_details'] = $this->Statemodel->get_state_school_dse();
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_dse',$data);
   
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
      $this->load->model('Statemodel');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_district_dse($mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_district_dse',$data);
   
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
      $this->load->model('Statemodel');
      $dist=$this->input->get('dist');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_wise_dse($dist,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_wise_dse',$data);
   
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
      $this->load->model('Statemodel');
      
      $data['total_count_details'] = $this->Statemodel->get_state_school_dms();
     // print_r($data['total_count_details']);
      $this->load->view('state/emis_state_school_dms',$data);
   
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
      $this->load->model('Statemodel');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_district_dms($mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_district_dms',$data);
   
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
      $this->load->model('Statemodel');
      $dist=$this->input->get('dist');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_wise_dms($dist,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_wise_dms',$data);
   
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
      $this->load->model('Statemodel');
      
      $data['total_count_details'] = $this->Statemodel->get_state_school_others();
     // print_r($data['total_count_details']);
      $this->load->view('state/emis_state_school_others',$data);
   
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
      $this->load->model('Statemodel');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_district_others($mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_district_others',$data);
   
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
      $this->load->model('Statemodel');
      $dist=$this->input->get('dist');
      $mang=$this->input->get('mang');
      $data['total_count_details'] = $this->Statemodel->get_state_school_wise_others($dist,$mang);
      //print_r( $data['total_count_details']);
      $this->load->view('state/emis_state_school_wise_others',$data);
   
    } else { redirect('/', 'refresh'); }

    }

      public function emis_teacher_gt_5years()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Statemodel');
    
     $tmp= $this->input->post('teach_year')==''?'5':$this->input->post('teach_year');
    
      $data['teacher_tot'] = json_decode(json_encode($this->Statemodel->get_teacher_gt_5years($tmp)),true);

       $result = array();$key='District';
                    foreach( $data['teacher_tot'] as $val) {
                         if(array_key_exists($key, $val)){
                             $result[$val[$key]][] = $val;
                         }else{
                             $result[""][] = $val;
                         }
                    } 
                                                                      //  print_r($result) ;die();            
      //print_r( $data['teacher_tot'][1]);
       $data['teacher_tot']=$result;
      $this->load->view('state/emis_teacher_gt_5years',$data);
   
    } else { redirect('/', 'refresh'); }

    }
     public function emis_teacher_gt_5years_school()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
      $this->load->model('Statemodel');
      $dist_id=$this->input->get('dist_id');
       $tmp=$this->input->get('tmp');
        
      // print_r($tmp);
      $data['teacher_tot'] =  $this->Statemodel->get_teacher_gt_5years_school($dist_id,$tmp);
                                                                     //  print_r($result) ;           
     // print_r($data['teacher_tot']);
       //$data['teacher_tot']=$result;
      $this->load->view('state/emis_teacher_gt_5years_school',$data);
   
    } else { redirect('/', 'refresh'); }

    }
	//promotion report by raju
	public function promotion_deereport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 // $dist_id  =$this->session->userdata('emis_district_id');
		 $id = $this->input->post('desig');
		
         if(!empty($id))	
		 {
      			$id = $this->input->post('desig');	
			
				// $sub = substr($id, 0, 2);
		        $pan = substr($id,2,30);
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
		    $data['deepromotion'] = $this->Statemodel->promotion_deereport($sub,$pan);
			
		 
		 }	
		  $this->load->view('state/emis_promotion_deereport',$data);
	}
	
		public function promotion_dsereport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 // $dist_id  =$this->session->userdata('emis_district_id');
        $id = $this->input->post('desig');
		
         if(!empty($id))	
		 {
      			$id = $this->input->post('desig');
							
				// $sub = substr($id, 0, 2);
		        $pan = substr($id,2,30);
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
				
			$data['dsepromotion'] = $this->Statemodel->promotion_dsereport($sub,$pan);
  			// echo json_encode($data);
		// die;
		 }	
		 // else{
			  $this->load->view('state/emis_promotion_dsereport',$data); 
		 // }
	}
	// Live Vacancy dse_pg report by Bala
public function live_vacancy_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['live_vacancy_dsereport'] = $this->Statemodel->live_vacancy_dsereport();
				$this->load->view('state/emis_state_live_vacancy_dse_pg',$data); 
			}
	}
	public function live_vacancy_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['live_vacancy_dsereportsgbt'] = $this->Statemodel->live_vacancy_dse_sg_btreport();
				$this->load->view('state/emis_state_live_vacancy_dse_sgbt',$data); 
			}
	}
	public function live_vacancy_district_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['live_vacancy_dsereport'] = $this->Statemodel->live_vacancy_district_dsereport($dist_id);
				$this->load->view('state/emis_live_vacancy_dse_pg',$data); 
			}
	}
	public function live_vacancy_district_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				
				$data['live_vacancy_dsereportsgbt'] = $this->Statemodel->live_vacancy_district_dse_sg_btreport($dist_id);
				
				$this->load->view('state/emis_live_vacancy_dse_sgbt',$data); 
			}
	}
	public function live_vacancy_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['live_vacancy_deereportsgbt'] = $this->Statemodel->live_vacancy_dee_sg_btreport();
				$this->load->view('state/emis_state_live_vacancy_dee_sgbt',$data); 
			}
	}
//END
	//Vacancy dse_pg report by Bala
	public function vacancy_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['vacancy_dsereport'] = $this->Statemodel->vacancy_dsereport();
				$this->load->view('state/emis_state_vacancy_dse_pg',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function vacancy_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['vacancy_dsereportsgbt'] = $this->Statemodel->vacancy_dse_sg_btreport();
				$this->load->view('state/emis_state_vacancy_dse_sgbt',$data); 
			}
	}
	public function vacancy_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['vacancy_deereportsgbt'] = $this->Statemodel->vacancy_dee_sg_btreport();
				$this->load->view('state/emis_state_vacancy_dee_sgbt',$data); 
			}
	}
	////////////////
	//Vacancy report by Bala
	//Vacancy dse_pg report by Bala
	public function vacancy_district_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['vacancy_dsereport'] = $this->Statemodel->vacancy_district_dsereport($dist_id);
				$this->load->view('state/emis_vacancy_dse_pg',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function vacancy_district_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				
				$data['vacancy_dsereportsgbt'] = $this->Statemodel->vacancy_district_dse_sg_btreport($dist_id);
				$this->load->view('state/emis_vacancy_dse_sgbt',$data); 
			}
	}
	public function vacancy_district_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['vacancy_deereportsgbt'] = $this->Statemodel->vacancy_district_dee_sg_btreport($dist_id);
				$this->load->view('state/emis_vacancy_dee_sgbt',$data); 
			}
	}
	public function live_vacancy_district_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['live_vacancy_deereportsgbt'] = $this->Statemodel->live_vacancy_district_dee_sg_btreport($dist_id);
				$this->load->view('state/emis_live_vacancy_dee_sgbt',$data); 
			}
	}
	

	//Need dse_pg report by Bala
	public function need_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id  =$this->session->userdata('emis_district_id');
				$data['need_dsereport'] = $this->Statemodel->need_dsereport();
				$this->load->view('state/emis_state_need_dse_pg',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function need_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				
				$data['need_dsereportsgbt'] = $this->Statemodel->need_dse_sg_btreport();
				$this->load->view('state/emis_state_need_dse_sgbt',$data); 
			}
	}
	public function need_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$data['need_deereportsgbt'] = $this->Statemodel->need_dee_sg_btreport();
				
				$this->load->view('state/emis_state_need_dee_sgbt',$data); 
			}
	}
	public function need_district_dse_pgreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['need_dsereport'] = $this->Statemodel->need_district_dsereport($dist_id);
				$this->load->view('state/emis_need_dse_pg',$data); 
			}
	}
	//Vacancy dse_pg report by Bala
	public function need_district_dse_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				
				$data['need_dsereportsgbt'] = $this->Statemodel->need_district_dse_sg_btreport($dist_id);
				$this->load->view('state/emis_need_dse_sgbt',$data); 
			}
	}
	public function need_district_dee_sgbtreport()
	{
		 $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
			if($emis_loggedin) 
			{
				$dist_id=$this->input->get('districtid');
				$data['need_deereportsgbt'] = $this->Statemodel->need_district_dee_sg_btreport($dist_id);
				$this->load->view('state/emis_need_dee_sgbt',$data); 
			}
	}
	////////////////

//END


   public function beo_staff_list()
    {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $this->load->library('session');
      $stateid = $this->session->userdata('emis_state_id'); 
      $this->load->database();
     $this->load->model('Statemodel');
         $dist_id  =$this->session->userdata('emis_district_id');
     $data['beo_list'] = $this->Statemodel->get_beo_list();
   //  print_r($data['beo_list']);
      $this->load->view('state/emis_beo_list',$data);
   
    } else { redirect('/', 'refresh'); }

    }

     public function emis_teacher_panel_mainpage()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        //$block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Statemodel->teacher_panel_mainpage(); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/teacher_panel_mainpage',$data); 
      }
  }
  public function emis_teacher_panel_mainpage_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        //$block_id=$this->input->get('block_id');
        $data['staff_transfer_req'] = $this->Statemodel->teacher_panel_mainpage_dse(); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/teacher_panel_mainpage_dse',$data); 
      }
  }

  public function emis_teacher_panel_dee()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $data['staff_transfer_req'] = $this->Statemodel->emis_teacher_panel_dee($transfer_type,$teach_type,$loc); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_teacher_panel_dee',$data); 
      }
  }
  public function emis_teacher_panel_dse()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $data['staff_transfer_req'] = $this->Statemodel->emis_teacher_panel_dse($transfer_type,$teach_type,$loc); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
        $data['header'] = $head_details['header'];
        $data['link'] = $head_details['link'];
        $this->load->view('state/emis_teacher_panel_dse',$data); 
      }
  }
  public function save_live_vacancy_data()
	{
		$this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	
		  $schoolid=$this->input->post('schoolid');
		  $savesubjectpanel2['vac_sg'] = $this->input->post('sg');
		  $savesubjectpanel2['vac_sci'] = $this->input->post('sciense');
		  $savesubjectpanel2['vac_mat'] = $this->input->post('maths');
		  $savesubjectpanel2['vac_eng'] = $this->input->post('english');
		  $savesubjectpanel2['vac_tam'] = $this->input->post('tamil');
		  $savesubjectpanel2['vac_soc'] = $this->input->post('social');
		  $savesubjectpanel2['vac_phm'] = $this->input->post('phm');
		  $savesubjectpanel2['vac_mhm'] = $this->input->post('mhm');
		  $savesubjectpanel2['vac_telu'] = $this->input->post('telungu');
		  $savesubjectpanel2['vac_kann'] = $this->input->post('kannadam');
		  $savesubjectpanel2['vac_mala'] = $this->input->post('malayalam');
		  $savesubjectpanel2['vac_urdu'] = $this->input->post('urudu');
		 
		  $result = $this->Statemodel->save_panel2_cp($schoolid,$savesubjectpanel2);
		  //$result1 = $this->Ceo_District_model->save_panel2($schoolid,$savesubjectpanel2);
		echo $result;
	  }
		
	}

public function list_school()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $data['staff_transfer_req'] = $this->Statemodel->school_mainpage(); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
      
        $this->load->view('state/emis_school_login',$data); 
      }
  }
  public function emis_computerindent()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
       
       $data['lab_dis'] = $this->Statemodel->emis_computerindent(); 
    
        $this->load->view('state/emis_computerindent',$data); 
      }
  }
  public function get_state_laptop_district()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        $transfer_type=$this->input->get('transfer_type');
        $teach_type=$this->input->get('desig');
        $loc=$this->input->get('loc');
        $dist=$this->input->get('dist');
        $data['lab_dis'] = $this->Statemodel->emis_computerindent_laptop($dist); 
     //  print_r($data['staff_transfer_req']);
        $head_details = $this->get_common_control_link();
      
        $this->load->view('state/emis_computerindent_laptop',$data); 
      }
  }


  public function get_schoolwise_laptop_distlist()
  {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
       
        $school = $this->input->get('school');
        $data['stulist'] = json_decode(json_encode($this->Statemodel->emis_computerindent_schoolwise($school)),true);
        // $data['stulist'] = $this->Statemodel->emis_computerindent_schoolwise($school);

        $this->load->view('state/emis_computerindent_schoolwise',$data); 
      }
  }

  public function callteachercountreport(){
    $where = " where 1 " ;
    // echo '<br/>';
      switch(1){
              case $this->session->userdata('emis_state_id')!=null:{
                  
                switch(htmlspecialchars($this->uri->segment(3,0))){
                      case '0':{$groupby=' GROUP BY c.district_name';
                  // $user ='having b.District_Name';
                                $count_where = '';
                   $wheres = '';
                                $count_groupby = '';
                                 break;
                               }
                      case 'EDU':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                                $where .= ' AND b.District_Name="'.$word.'"';
                   $wheres .= 'where  c.District_Name="'.$word.'"';
                                $count_where = ' AND b.District_Name="'.$word.'"';
                                $groupby=' GROUP BY c.edu_dist_id';
                   $user ='having b.Edu_Dist_Name="'.$word.'"';
                                $count_groupby = '';
                                break;
                              }
                      case 'Block':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                                $where .= ' AND b.Edu_Dist_Name="'.$word.'"';
                  $wheres .= 'where  c.Edu_Dist_Name="'.$word.'"';
                                $count_where = ' AND b.Edu_Dist_Name="'.$word.'"';
                                $groupby=' GROUP BY c.block_id';
                   $user ='having b.Edu_Dist_Name="'.$word.'"';
                                $count_groupby=' GROUP BY b.Edu_Dist_Name';
                                break;
                              }
                      case 'School':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                                  $where .= ' AND b.Block_Name="'.$word.'"';
                  $wheres .= 'where  c.Block_Name="'.$word.'"';
                                  $count_where = ' AND b.Block_Name="'.$word.'"';
                                  $groupby=' GROUP BY c.school_id';
                  $user ='having b.Block_Name="'.$word.'"';
                                  $count_groupby=' GROUP BY b.Block_Name';
                                  break;
                              }
                  }
                  break;
              }
        echo $this->session->userdata();
        
        // $dist_id = $this->session->userdata('emis_district_id');   $district_details = $this->Homemodel->get_districtName($dist_id); echo $district_details->district_name; 
        
              case $this->session->userdata('emis_district_id')!=null:{
          $dist_id = $this->session->userdata('emis_district_id');
          $distnames = $this->Statemodel->dist($dist_id);
          $distname =$distnames[0]->district_name;
                   switch($this->uri->segment(3,0)){
                      case '0':{ 
                                 $where .= ' AND b.District_Name="'.$distname.'"';
                   $wheres .= 'where  c.District_Name="'.$distname.'"';
                                 $groupby=' GROUP BY c.edu_dist_id';
                                 $count_where = ' AND b.District_Name="'.$distname.'"';
                    $user ='having b.District_Name="'.$distname.'"';
                  
                                 $count_groupby = '';
                                break;
                      }
                        case 'EDU':{
                  $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                                $where .= ' AND b.District_Name="'.$word.'"';
                  $wheres .= 'where  c.District_Name="'.$word.'"';
                                $groupby=' GROUP BY c.edu_dist_id';
                                $count_where = ' AND b.District_Name="'.$word.'"';
                   $user ='having b.Edu_Dist_Name="'.$word.'"';
                                $count_groupby = '';
                                break;
                      break;
                    }
                        case 'Block':{
                
                 $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                 $where .= ' AND b.Edu_Dist_Name="'.$word.'"';
                  $wheres .= 'where  c.Edu_Dist_Name="'.$word.'"';
                                $groupby=' GROUP BY c.block_id';
                                $count_where = ' AND b.Edu_Dist_Name="'.$word.'"';
                                $count_groupby=' GROUP BY b.Edu_Dist_Name';
                   $user ='having b.Edu_Dist_Name="'.$word.'"';
                                break;
                    }
                        case 'School':{
                $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                                $where .= ' AND b.Block_Name="'.$word.'"';
                  $wheres .= 'where  c.Block_Name="'.$word.'"';
                                $groupby=' GROUP BY c.school_id';
                                $count_where = ' AND b.Block_Name="'.$word.'"';            
                                $count_groupby=' GROUP BY b.Block_Name';
                    $user ='having b.Block_Name="'.$word.'"';
                                  break;
                    }
                  }
                  break;
              }
              case $this->session->userdata('emis_deo_id')!=null:{
                switch(htmlspecialchars($this->uri->segment(3,0))){
                    case '0':{
                        $where .= ' AND c.id='.$this->session->userdata('emis_deo_id');
              $wheres .= ' where  c.edu_dist_id='.$this->session->userdata('emis_deo_id');
                        // $where .= ' AND b.Edu_Dist_Name="'.$this->session->userdata('emis_username').'"';
                        $groupby=' GROUP BY c.block_id';
                        $count_where = ' AND c.id='.$this->session->userdata('emis_deo_id');
                        $count_groupby = '';
                        break;
                    }
                    case 'EDU':{
                        
               $values =$this->uri->segment(4,0);
              $word =str_replace('%20',' ',$values);
                        $where .= ' AND b.District_Name="'.$word.'"';
              $wheres .= 'where  c.District_Name="'.$word.'"';
                        $groupby=' GROUP BY c.edu_dist_id';
                        $count_where = ' AND b.District_Name="'.$word.'"';
               $user ='having b.Edu_Dist_Name="'.$word.'"';
                        $count_groupby = '';
                        break;
                    }
                    case 'Block':{
              $values =$this->uri->segment(4,0);
              $word =str_replace('%20',' ',$values);
                        $where .= ' AND b.Edu_Dist_Name="'.$word.'"';
              $wheres .= 'where  c.Edu_Dist_Name="'.$word.'"';
                        $groupby=' GROUP BY c.block_id';
                        $count_where = ' AND b.Edu_Dist_Name="'.$word.'"';
                        $count_groupby=' GROUP BY b.Edu_Dist_Name';
               $user ='having b.Block_Name="'.$word.'"';
                        break;
                    }
                    case 'School':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                      $where .= ' AND b.Block_Name="'.$word.'"';
            $wheres .= 'where  c.Block_Name="'.$word.'"';
                      $groupby=' GROUP BY c.school_id';
                      $count_where = ' AND b.Block_Name="'.$word.'"';            
                      $count_groupby=' GROUP BY b.Block_Name';
                        break;
                    }
                }
                break;
              }
              case $this->session->userdata('emis_block_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                      
                      $where .= ' AND b.Block_Name="'.$this->session->userdata('emis_username').'"';
            $wheres .= 'where  c.Block_Name="'.$this->session->userdata('emis_username').'"';
                      $groupby=' GROUP BY c.school_id';
                      $count_where = ' AND b.Block_Name="'.$this->session->userdata('emis_username').'"';
                      $count_groupby='';
            // $user ='having b.Edu_Dist_Name="'.$this->session->userdata('emis_username').'"';
                        break;
                    }
                    case 'EDU':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                      $where .= ' AND b.District_Name="'.$word.'"';
             $wheres .= 'where c.District_Name="'.$word.'"';
                      $groupby=' GROUP BY c.edu_dist_id';
              // $user ='having b.Edu_Dist_Name="'.$word.'"';
                        break;
                    }
                    case 'Block':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                      $where .= ' AND b.Edu_Dist_Name="'.$word.'"';
            $wheres .= 'where  c.Edu_Dist_Name="'.$word.'"';
                      $groupby=' GROUP BY c.block_id';
              $user ='having b.Block_Name="'.$word.'"';
                        break;
                    }
                    case 'School':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                      $where .= ' AND b.Block_Name="'.$word.'"';
             $wheres .= 'where  c.Block_Name="'.$word.'"';
                      $groupby=' GROUP BY c.school_id';
              $user ='having b.Block_Name="'.$word.'"';
                        break;
                    }
                }
                break;
              }
              case $this->session->userdata('emis_school_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case 0:{
                        $where .= ' AND b.School_Name="'.$this->session->userdata('school_profile')[0][school_name].'"';
              $wheres .= 'where  c.School_Name="'.$this->session->userdata('school_profile')[0][school_name].'"';
                        $groupby=' GROUP BY c.school_id';
                        $count_where = ' AND b.School_Name="'.$this->session->userdata('school_profile')[0][school_name].'"';
                        $count_groupby=' GROUP BY b.Block_Name';
                      
                        break;
                    }
                    case 'EDU':{
               $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                        $where .= ' AND b.District_Name='.$word;
              $wheres .= 'where  c.District_Name='.$word;
                        $groupby=' GROUP BY c.edu_dist_id';
                        
                        break;
                    }
                    case 'Block':{
              $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                        $where .= ' AND b.Edu_Dist_Name='.$word;
              $wheres .= 'where  c.Edu_Dist_Name='.$word;
               // $user ='having b.Edu_Dist_Name='.$word;
                        $groupby=' GROUP BY c.block_id';
                        
                        break;
                    }
                    case 'School':{
              $values =$this->uri->segment(4,0);
                 $word =str_replace('%20',' ',$values);
                        $where .= ' AND b.Block_Name='.$word;
               $wheres .= 'where  c.Block_Name='.$word;
              // $user ='having b.Block_Name='.$word;
                        $groupby=' GROUP BY c.school_id';
                        break;
                    }
                }
                break;
              }
      }
      $data['new_user'] = $this->Statemodel->get_new_user_dtls($wheres,$groupby); 
      $data['new_staff_view'] =$this->Statemodel->get_new_staff_view_dtls($where);
      $data['users_active_lastmonth'] = $this->Statemodel->users_active_lastmonth($user);
          $data['today_user_count'] = $this->Statemodel->get_user_count($count_where,$count_groupby,1); 
        $data['today_user_count_last'] = $this->Statemodel->get_user_count_last($count_where,$count_groupby,1); 
       
          $data['thisweek_user_count'] = $this->Statemodel->get_user_count($count_where,$count_groupby,4);
        $data['thisweek_user_count_last'] = $this->Statemodel->get_user_count_last($count_where,$count_groupby,4);
       
      $data['thismonth_user_count'] = $this->Statemodel->get_user_count($count_where,$count_groupby,2); 
      $data['thismonth_user_count_last'] = $this->Statemodel->get_user_count_last($count_where,$count_groupby,2); 
          $data['thisyear_user_count'] = $this->Statemodel->get_user_count($count_where,$count_groupby,3);
          $data['thisyear_user_count_last'] = $this->Statemodel->get_user_count_last($count_where,$count_groupby,3);	
      $this->load->view('state/emis_teacher_counts_report',$data); 
    }
    
  public function getteacher_unlogged()
  {
	  
	  $school_id=$_GET['schoolid'];
	  $data['unlogged_teachers'] = $this->Statemodel->getteacher_unlogged($school_id);
	  
	  $school_name = $this->Statemodel->getschool_name($school_id);
	  
	  $data['sname']= $school_name[0]->school_name;
	  //print_r($sname);
	  $this->load->view('state/emis_teacher_unlogged_teacher',$data); 
  }
  
  //staff transfer list report
  public function emis_staff_from_to_trans_dist_count()
   {
	   
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
		 $fdate =' ';
      if($emis_loggedin) 
      {     
       
  // print_r($this->input->post());die;
        $fdates = $this->input->post('fdate');
		$fdate =date('Y-m-d',strtotime($fdates));
		
		$tdates = $this->input->post('tdate');
		$tdate =date('Y-m-d',strtotime($tdates));
		
		$data['fdate']=$fdates;
		$data['tdate']=$tdates;
		
		
        if($fdate !=' ')
        {
			
        $data['dist_staff_count'] = $this->Statemodel->emis_staff_from_to_trans_dist_count($fdate,$tdate); 
		}
      // print_r($data['dist_staff_count']);
	  // die();
      
      
        $this->load->view('state/emis_staff_from_to_trans_dist_count',$data); 
      }
  }
  public function emis_staff_from_to_trans_block_count()
  {
	   $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {      
        $dist=$this->input->get('district_id');
		$fdates=$this->input->get('fdate');
		$fdate =date('Y-m-d',strtotime($fdates));
		$tdates=$this->input->get('tdate');
		$tdate =date('Y-m-d',strtotime($tdates));
		
		$data['fdate']=$fdates;
		$data['tdate']=$tdates;
		
		
        
        $data['block_staff_count'] = $this->Statemodel->emis_staff_from_to_trans_block_count($dist,$fdate,$tdate); 
      // print_r($data['block_staff_count']);
	  // die();
      
      
        $this->load->view('state/emis_staff_from_to_trans_block_count',$data); 
      }
  }
  /******************************************* End *******************************/

  /** **************************************************
    * State Dashboard New                              *
    * 02/08/2019                                       *
    * VIT-sriram                                       *
    * **************************************************/
   public function emis_state_dash_home()
   {
       $this->load->library('session');
       $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) 
        {
            $head_details = $this->get_common_control_link();
            $data['header'] = $head_details['header'];
            $data['link'] = $head_details['link'];
            $this->load->view('state/emis_state_dash_home',$data);

        } else { redirect('/', 'refresh'); }

   }


//Pearlin
 public function BRTE_List()
  {

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {

          $data['getsctype'] = $this->Statemodel->get_school_type();
         // print_r($data);
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


       $data['school_timetable_details'] = $this->Statemodel->get_BRTE_List($school_cate);
      }
      else
      {

        
        $data['school_timetable_details'] = $this->Statemodel->get_BRTE_List($school_cate);
          
      }
    
      $this->load->view('state/get_BRTE_List',$data);
      }else { redirect('/', 'refresh'); }

  }
  public function BRTE_List_block()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
         $dist=$this->input->get('dist_id');
          $data['getsctype'] = $this->Statemodel->get_school_type();
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
       $data['school_timetable_details'] = $this->Statemodel->get_BRTE_List_block($dist,$school_cate);
      }
      else
      {
        $data['school_timetable_details'] = $this->Statemodel->get_BRTE_List_block($dist,$school_cate);
          
      }
    $data['dist']=$dist;
      $this->load->view('state/get_BRTE_List_block',$data);
      }else { redirect('/', 'refresh'); }

  }
   public function BRTE_List_teacher()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
         $blk=$this->input->get('blk');
          $dist=$this->input->get('dist_id');
       $data['school_timetable_details'] = $this->Statemodel->get_BRTE_List_teacher($dist,$school_cate);
     
    $data['blk']=$blk;
      $this->load->view('state/get_BRTE_List_teacher',$data);
      }else { redirect('/', 'refresh'); }

  }
   public function BRTE_assigned_school()
  {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
       
          $dist=$this->input->get('dist');
       $data['school_timetable_details'] = $this->Statemodel->BRTE_assigned_school($dist);
     
    $data['blk']=$blk;
      $this->load->view('state/get_BRTE_assigned_school',$data);
      }else { redirect('/', 'refresh'); }

  }
//pearlin//
   public function emis_bag_indent_dist()
    {
        $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
      $data['bag_indent'] = $this->Statemodel->bag_indent_dist();

     $this->load->view('state/emis_bags_indent_dist',$data); 
    }else { redirect('/', 'refresh'); }

   }

    public function emis_desbag_indent()
    {
       
          $dist=$blk =$this->input->get('district_id');
          $blk =$this->input->get('block_id');
      
  
    if(!empty($blk))
    {
     
      $data['bag_indent'] = $this->Statemodel->desbag_indent($dist,$blk);
      
    }
    else 
    {
       $data['bag_indent'] = $this->Statemodel->desbag_indent($dist,$blk);
    }
     $this->load->view('state/emis_desbag_indent',$data); 
    }
      public function emis_desbag_indent_schl()
    {
       $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
        //$blk =$this->input->get('district_id');
          $blk =$this->input->get('block_id');
    
       $data['bag_indent'] = $this->Statemodel->desbag_indent_schl($dist,$blk);
    
     $this->load->view('state/emis_desbag_indent_schl',$data); 
      }else { redirect('/', 'refresh'); }
    }
  //school staff list
   public function staff_list()
   {
	    $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');  
		if($emis_loggedin) {
			
			
		  $dist = $_POST['dist'];
		  $blk = $_POST['block'];
		  //$school = $_POST['school'];
		  $udise = $_POST['udise'];
		  $design = $_POST['design'];
		  $schoolname = $_POST['schoolname'];
		  $teach = $_POST['teach'];
		  $teachname = $_POST['teachname'];
		  
		  
		$data['dist'] = $this->Statemodel->dists();
		$data['block'] = $this->Statemodel->block();
		$data['design']= $this->Statemodel->desgination();
		//echo 'btn submit'.$_POST['btn_submit'];
		if($_POST['btn_submit']){
			//echo "if condition";
		$data['staff_list'] = $this->Statemodel->staff_list($dist,$blk,$udise,$schoolname,$teach,$teachname,$design);
		}else{
			//echo "in else condition";
		$data['staff_list'] = [];	
		}
		
		$this->load->view('state/emis_staff_list',$data);
        }else { redirect('/', 'refresh'); }		
   }
  
  
  //

   //school_needs CSR report by raj
	

  public function school_needs_csr()
  {
      
      
      $blk = $this->uri->segment(3,0);
      $cate1 = $this->uri->segment(4,0);  
      $sub_cate1 = $this->uri->segment(5,0); 
      $item1 = $this->uri->segment(6,0); 
      $dist = $this->uri->segment(7,0); 
    
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
    
      $data['csr_material_master'] =$this->Statemodel->school_needs_csr_material_master();
      $data['cate'] =$this->Statemodel->cate();
      $data['sub_cate'] =$this->Statemodel->sub_cate();
      
      if(!empty($cate) || !empty($item) || !empty($sub_cate))
      {

          $data['school_needs_csr'] = $this->Statemodel->school_needs_csr($dist,$blk,$item,$cate,$sub_cate);
      }
      else
      {
        $data['school_needs_csr'] = $this->Statemodel->school_needs_csr($dist,$blk,$item1,$cate1,$sub_cate1);
    
      }
      $this->load->view('state/emis_school_needs_csr_report',$data);
       
  }
 public function dge_2017_18_report()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->dge_2017_18_report()),true);
 
       $result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('state/dge_2017_18_report',$data);
  } else { redirect('/', 'refresh'); }

} 

public function dge_2017_18_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dist_id=$this->input->get('district_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->dge_2017_18_report_blk($dist_id)),true);
  
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

    $this->load->view('state/dge_2017_18_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function dge_2017_18_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id=$this->input->get('block_id');
      $data['student_migration_details'] =$this->Statemodel->dge_2017_18_report_schl($block_id);
  

    $this->load->view('state/dge_2017_18_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function dge_2018_19_report()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->dge_2018_19_report()),true);
 
       $result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('state/dge_2018_19_report',$data);
  } else { redirect('/', 'refresh'); }

} 

public function dge_2018_19_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dist_id=$this->input->get('district_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->dge_2018_19_report_blk($dist_id)),true);
  
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

    $this->load->view('state/dge_2018_19_report_blk',$data);
  } else { redirect('/', 'refresh'); }
}
 
public function dge_2018_19_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id=$this->input->get('block_id');
      $data['student_migration_details'] =$this->Statemodel->dge_2018_19_report_schl($block_id);
  

    $this->load->view('state/dge_2018_19_report_schl',$data);
  } else { redirect('/', 'refresh'); }

}
public function teacher_child_studyingreport()
{

$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
     $data['child_studying_status'] = json_decode(json_encode($this->Statemodel->teacher_child_studyingstatus()),true);
 
       $result = array();$key='district_name';
     
                              foreach( $data['child_studying_status'] as $child) {
                                  if(array_key_exists($key, $child)){
                                       $result[$child[$key]][] = $child;
                                  }else{
                                      $result[""][] = $child;
                                  }
                               }
                       //print_r($result) ;die();            
 
       $data['child_studying_status']=$result;
$this->load->view('state/emis_state_teacher_child_report',$data);
} 

	} 
  public function teacher_child_studyingstatus_district()
{

$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $district_id=$this->input->get('district_id');
    //print_r($district_id);die();
     $data['child_studying_status'] = json_decode(json_encode($this->Statemodel->teacher_child_studyingstatus_district($district_id)),true);
 
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
$this->load->view('state/emis_state_teacher_child_report_district',$data);
} 

  } 
    public function teacher_child_studyingstatus_block()
{

$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $block_id=$this->input->get('block_id');
    //print_r($block_id);die();
     $data['child_studying_status'] = json_decode(json_encode($this->Statemodel->teacher_child_studyingstatus_block($block_id)),true);
 
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
$this->load->view('state/emis_state_teacher_child_report_block',$data);
} 

  } 
   public function teacher_child_studyingstatus_std()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $school_name=$this->input->get('school_name');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->teacher_child_studyingstatus_std($school_name);

    $this->load->view('state/teacher_child_studyingstatus_std',$data);
  } else { redirect('/', 'refresh');
   }


}

   public function class_12_status_cate()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate();

    $this->load->view('state/class_12_status_cate',$data);
  } else { redirect('/', 'refresh'); }


}
 public function class_12_status_cate_blk()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
  $district_name=$this->input->get('district_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate_blk($district_name);

    $this->load->view('state/class_12_status_cate_blk',$data);
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
  $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate_schl($block_name);

    $this->load->view('state/class_12_status_cate_schl',$data);
  } else { redirect('/', 'refresh'); }


}


public function class_12_status_cate_17_18()
{

     $this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate_17_18();

    $this->load->view('state/class_12_status_cate_17_18',$data);
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
$district_name=$this->input->get('district_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate_17_18_blk($district_name);

    $this->load->view('state/class_12_status_cate_17_18_blk',$data);
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
$block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->class_12_status_cate_17_18_schl($block_name);

    $this->load->view('state/class_12_status_cate_17_18_schl',$data);
  } else { redirect('/', 'refresh'); }


}
 public function dge_2017_18_cate()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = $this->Statemodel->dge_2017_18_cate();

    $this->load->view('state/dge_2017_18_cate',$data);
  } else { redirect('/', 'refresh'); }

} 


public function dge_2017_18_cate_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $district_id=$this->input->get('district_id');
      $data['student_migration_details'] =$this->Statemodel->dge_2017_18_cate_blk($district_id);
  

    $this->load->view('state/dge_2017_18_cate_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function dge_2017_18_cate_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_name=$this->input->get('block_name');
      $data['student_migration_details'] =$this->Statemodel->dge_2017_18_cate_schl($block_name);
  

    $this->load->view('state/dge_2017_18_cate_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
 public function dge_2018_19_cate()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = $this->Statemodel->dge_2018_19_cate();
 
      

    $this->load->view('state/dge_2018_19_cate',$data);
  } else { redirect('/', 'refresh'); }

} 

public function dge_2018_19_cate_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
      $district_id=$this->input->get('district_id');
  $data['student_migration_details'] = $this->Statemodel->dge_2018_19_cate_blk($district_id);
  

    $this->load->view('state/dge_2018_19_cate_blk',$data);
  } else { redirect('/', 'refresh'); }
}
  
 
public function dge_2018_19_cate_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
  $block_name=$this->input->get('block_name');
      $data['student_migration_details'] =$this->Statemodel->dge_2018_19_cate_schl($block_name);
  

    $this->load->view('state/dge_2018_19_cate_schl',$data);
  } else { redirect('/', 'refresh'); }

}
 public function schoolwise_class_question_report_dist()
{
  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      
     /* $data['getmanagecate'] = $this->Statemodel->getmanagecate_124();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
      $manage = $this->session->userdata('emis_statereport_schmanage');

        $manage = $this->input->post('school_manage');
        $school_cate = $this->input->post('school_cate');*/

  //  $mng_cat=$this->input->get('magt_type');
       
     /*  if(!empty($manage)){
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


      if($manage!="" && $school_cate){ */
   //   $data['student_migration_details'] = $this->Statemodel->schoolwise_class_question_report_dist($manage,$school_cate);
 
      /* $result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } */
                       //print_r($result) ;die();            
  
     /*  $data['student_migration_details']=$result;
     }
     else
     {
       $data['student_migration_details'] = $this->Statemodel->schoolwise_class_question_report_dist('','');
 
       /*$result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } */
                       //print_r($result) ;die();            
  
     /*  $data['student_migration_details']=$result;
     }*/
//print_r($data);
    //$this->load->view('state/schoolwise_class_question_report_dist',$data);
  //} else { redirect('/', 'refresh'); }

      $district_id=$this->input->get('district_id');
  $data['student_migration_details'] = $this->Statemodel->schoolwise_class_question_report_dist('','');
 // print_r($data);

    $this->load->view('state/schoolwise_class_question_report_dist',$data);
  } else { redirect('/', 'refresh'); }

} 

public function schoolwise_class_question_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $dist_id=$this->input->get('district_id');
    $data['getmanagecate'] = $this->Statemodel->getmanagecate_124();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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



      if($manage!="" && $school_cate){ 
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->schoolwise_class_question_report_blk($dist_id,$manage,$school_cate)),true);
 
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
       $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->schoolwise_class_question_report_blk($dist_id,'','')),true);
 
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

    $this->load->view('state/schoolwise_class_question_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function schoolwise_class_question_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $blk_id=$this->input->get('block_id');
   $data['getmanagecate'] = $this->Statemodel->getmanagecate_124();
      
      $data['getsctype'] = $this->Statemodel->get_school_type();
      
      
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
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->schoolwise_class_question_report_schl($blk_id,$manage,$school_cate)),true);
 
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
       $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->schoolwise_class_question_report_schl($blk_id,'','')),true);
 
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

    $this->load->view('state/schoolwise_class_question_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
public function laptop_distribution_monitoring()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->laptop_distribution_monitoring();
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/laptop_distribution_monitoring',$data);
  } else { redirect('/', 'refresh'); }

} 
public function laptop_distribution_monitoring_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $dist_name=$this->input->get('dist_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->laptop_distribution_monitoring_dist($dist_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/laptop_distribution_monitoring_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function laptop_distribution_monitoring_block()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');
 $block_name=$this->input->get('block_name');
      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->laptop_distribution_monitoring_block($block_name);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/laptop_distribution_monitoring_block',$data);
  } else { redirect('/', 'refresh'); }

}
/** Student Strength Report : last mod - 26/09/2019(venba/ps)  */
      /**  1st Page : District-Wise Details */ 
      public function districtwise_student_strength_rpt() 
      { 

        $this->load->library('session'); 
        $emis_loggedin = $this->session->userdata('emis_loggedin'); 
         if($emis_loggedin)  
         { 
          
            $data['getmanagecate'] = $this->Statemodel->getmanagecate(); 
            $filter = $this->input->post('school_manage'); 
            $minimum_stud = $this->input->post('minimum_student'); 
              
            $block_filter = ''; 
            
              if(!empty($filter)) 
              { 
                $block_filter = $filter; 
                $ids = join(",",$block_filter); 
                $data['districtwiselist'] = $this->Statemodel->get_student_strength_dtl('',$ids,$minimum_stud); 
                $data['filter'] = $filter; 
                $data['minimum_stud'] = $minimum_stud; 
            } 
            else{ 
              $data['districtwiselist'] = []; 
              $data['filter'] = []; 
              $data['minimum_stud'] = ''; 
            } 

          $this->load->view('state/emis_districtwise_student_strength',$data); 

         }else { redirect('/', 'refresh'); } 

      } 

      /** 2nd Page : School-Wise Details */ 
      public function schoolwise_student_strength_rpt() 
      { 
        $this->load->library('session'); 
        $emis_loggedin = $this->session->userdata('emis_loggedin'); 
        if($emis_loggedin)  
        { 
          $minimum_stud = $this->input->get('minimum_student'); 
          $filter = $this->input->get('management_type'); 

            $dist_id = $this->input->get('dist'); 
            $block_filter = ''; 
              if(!empty($filter)) 
              { 
                $block_filter = $filter; 
                $ids = join(",",$block_filter); 
                $data['school_details'] = $this->Statemodel->get_student_strength_dtl($dist_id,$ids,$minimum_stud); 
                $data['filter'] = $filter; 
                $data['minimum_stud'] = $minimum_stud; 
            } 
            else{ 
              $ids = (1); 
              $data['school_details'] = $this->Statemodel->get_student_strength_dtl($dist_id,$ids,0); 
            } 

            $this->load->view('state/emis_schoolwise_student_strength',$data); 

        }else { redirect('/', 'refresh'); } 

      } 

      /** 2nd Page : School-Wise Details ( Ajax Call ) */ 
      public function get_group_details() 
      { 
          $where1 = $this->input->post('school_id'); 
              //  $where2 = $this->input->post('class_studying_id'); 
          $details = $this->Statemodel->get_student_strength_groupwise_dtl($where1);       
          echo json_encode($details); 
      }
  /** End OF Student Strength Report Functionality */ 
   public function past_12_2017_18_report()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   
      $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->past_12_2017_18_report()),true);
 
       $result = array();$key='district_name';
     
                              foreach( $data['student_migration_details'] as $student_mig) {
                                  if(array_key_exists($key, $student_mig)){
                                       $result[$student_mig[$key]][] = $student_mig;
                                  }else{
                                      $result[""][] = $student_mig;
                                  }
                               } 
                       //print_r($result) ;die();            
  
       $data['student_migration_details']=$result;

    $this->load->view('state/past_12_2017_18_report',$data);
  } else { redirect('/', 'refresh'); }

} 

public function past_12_2017_18_report_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $dist_id=$this->input->get('district_id');
  $data['student_migration_details'] = json_decode(json_encode($this->Statemodel->past_12_2017_18_report_blk($dist_id)),true);
  
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

    $this->load->view('state/past_12_2017_18_report_blk',$data);
  } else { redirect('/', 'refresh'); }

} 
public function past_12_2017_18_report_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
   $block_id=$this->input->get('block_id');
      $data['student_migration_details'] =$this->Statemodel->past_12_2017_18_report_schl($block_id);
  

    $this->load->view('state/past_12_2017_18_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $pst=$this->input->post('emis_state_fix')==''?'tamil':$this->input->post('emis_state_fix');
    $gender=$this->input->post('gender')==''?"all":$this->input->post('gender');
    //print_r($gender);die();
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_dist($pst,$gender);
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/slas_report_dist',$data);
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
     $dist_id=$this->input->get('dist_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_blk($dist_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
    $this->load->view('state/slas_report_blk',$data);
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
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_schl($blk_id,$pst,$gender);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
    $this->load->view('state/slas_report_schl',$data);
  } else { redirect('/', 'refresh'); }

} 

public function slas_report_schl_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $catty_id=$this->input->get('catty_id');
   
     $manage_id=$this->input->get('manage_id');

    //print_r($catty_id);
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_schl_dist($catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
       $data['catty_id']=$catty_id;
       $data['manage_id']=$manage_id;
    $this->load->view('state/slas_report_schl_dist',$data);
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
     $dist_id=$this->input->get('dist_id');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_schl_blk($dist_id,$catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['dist_id']=$dist_id;
      $data['catty_id']=$catty_id;
      $data['manage_id']=$manage_id;

    $this->load->view('state/slas_report_schl_blk',$data);
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
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_schl_wise($blk_id, $catty_id,$manage_id);
          // print_r($data['student_migration_details']);die();
      $data['blk_id']=$blk_id;
      $data['manage_id']=$manage_id;
    $this->load->view('state/slas_report_schl_wise',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_cate_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_cate_dist();
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/slas_report_cate_dist',$data);
  } else { redirect('/', 'refresh'); }

} 
public function slas_report_mana_dist()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    
    $this->load->library('session');
    $this->load->database();
    $this->load->model('Statemodel');

      //$data['get_teacherdetails'] = $this->Statemodel->get_dist_teacherdetails();
      $data['student_migration_details'] = $this->Statemodel->slas_report_mana_dist();
          // print_r($data['student_migration_details']);die();
    $this->load->view('state/slas_report_mana_dist',$data);
  } else { redirect('/', 'refresh'); }

}
 public function student_marks_9_10()
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
    
     $data['student_migration_details'] = $this->Statemodel->student_marks_9_10($termid,$tname,$cls_id);

    $this->load->view('state/student_marks_9_10',$data);
  } else { redirect('/', 'refresh'); }

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
    $dist_id=$this->input->get('district_id');
     $data['student_migration_details'] = $this->Statemodel->student_marks_9_10_blk($dist_id,$termid,$tname,$cls_id);

    $this->load->view('state/student_marks_9_10_blk',$data);
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
     $data['student_migration_details'] = $this->Statemodel->student_marks_9_10_schl($block_id,$termid,$tname,$cls_id);
 
    
    $this->load->view('state/student_marks_9_10_schl',$data);
  } else { redirect('/', 'refresh'); }

}  
 public function emis_gis_video()
    {
     $this->load->library('session');
         $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {
       // $dist_id  =$this->session->userdata('emis_district_id');
        
        $this->load->view('state/emis_gis_video',$data);
        
      }
     
    }

    /** Added By Wesley **/
    public function emis_state_pindics_report()
    {
      $this->load->library('session');
          $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) 
      {		
        $data['pindics_report'] = $this->Statemodel->emis_state_pindics_report();	      
        $this->load->view('state/emis_state_pindics_report',$data); 
      }
    }
    /** Added By Wesley **/  
    public function student_co_scholastic_1_8()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $termid = $this->input->post('termid')==''? 2:$this->input->post('termid');
    $cls_id= $this->input->post('cls_id')==''?'9,10':$this->input->post('cls_id');
  
           
    
     $data['student_migration_details'] = $this->Statemodel->student_co_scholastic_1_8();

    $this->load->view('state/student_co_scholastic_1_8',$data);
  } else { redirect('/', 'refresh'); }

}  
   public function student_co_scholastic_1_8_blk()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $termid = $this->input->post('termid')==''? 2:$this->input->post('termid');
    $cls_id= $this->input->post('cls_id')==''?'9,10':$this->input->post('cls_id');
    if($this->session->userdata('emis_user_type_id') == 5){
   $dist_id=$this->input->get('district_id');
    }else if($this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 3){
      $dist_id=$this->session->userdata('emis_district_id');
    }else if($this->session->userdata('emis_user_type_id') == 10){
      $dist_id=$this->session->userdata('emis_deo_id');
    }
     $data['student_migration_details'] = $this->Statemodel->student_co_scholastic_1_8_blk($dist_id);

    $this->load->view('state/student_co_scholastic_1_8_blk',$data);
  } else { redirect('/', 'refresh'); }

}  
public function student_co_scholastic_1_8_schl()
{
$this->load->library('session');
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $termid = $this->input->post('termid')==''? 2:$this->input->post('termid');
    $cls_id= $this->input->post('cls_id')==''?'9,10':$this->input->post('cls_id');
    $block_id=$this->input->get('block_id');
      if($this->session->userdata('emis_user_type_id') == 5){
   $block_id=$this->input->get('block_id');
    }else if($this->session->userdata('emis_user_type_id') == 2 || $this->session->userdata('emis_user_type_id') == 6){
      $block_id=$this->session->userdata('emis_block_id');
    }
     $data['student_migration_details'] = $this->Statemodel->student_co_scholastic_1_8_schl($block_id);

    $this->load->view('state/student_co_scholastic_1_8_schl',$data);
  } else { redirect('/', 'refresh'); }

}
public function emis_school_profile_completed()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
	  $school_type= $this->input->post('school_type');
	   $data['school_type_c']=$school_type;
	   $data['state_profile_completion_status'] = $this->Statemodel->state_profile_completion_status($school_type);
	   $data['school_type'] = $this->Statemodel->school_type();
	   $this->load->view('state/emis_state_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}
public function profile_status_blockwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $district_id=$this->input->get('dist');
		  $school_type=$this->input->get('school_type');
		  $data['school_type_c']=$school_type;
	      $data['district_profile_completion_status'] = $this->Statemodel->district_profile_completion_status($district_id,$school_type);
	  
	   $this->load->view('state/emis_district_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}
public function profile_status_schoolkwise()
{
	$this->load->library('session');
	  $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin) {
		  $school_type=$this->input->get('school_type');
		  $block_id=$this->input->get('block');
		 
	  $data['block_profile_completion_status'] = $this->Statemodel->block_profile_completion_status($block_id,$school_type);
	  
	   $this->load->view('state/emis_block_profile_completed',$data);
  }
  else { redirect('/', 'refresh'); }
}

public function emis_state_schools_list()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) {
       $sch_cate=$this->input->post('schoolcat');
	   $data['submit_cate']=$sch_cate;
       $data['schoolcate']= $this->Statemodel->get_allmajorcategory(); 
	   $data['schoollist'] = $this->Statemodel->get_school_list_district($sch_cate);
	   
     $this->load->view('state/emis_district_schoollist',$data);
    
   }
   else { redirect('/', 'refresh'); }
  } 
	public function emis_district_schools_list()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	
    if($emis_loggedin) {
      $sch_cate=$this->input->get('schoolcat');
      $district_id =$this->input->get('districtid');
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
		$data['city'] =$this->Ceo_District_model->get_city($district_id);
		$data['parliament'] =$this->Ceo_District_model->get_parliament($district_id);
		$data['assembly'] =$this->Ceo_District_model->get_assembly($district_id);
		//print_r( $data['district']);
     /*	 End of location Details  */
	   $data['schoollist'] = $this->Statemodel->get_school_list_district_cate($district_id,$sch_cate);
	  // print_r($data['schoollist']);
	  // $data['schoolcate']= $this->Ceo_District_model->get_allmajorcategory(); 
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
     
     $this->load->view('state/emis_district_schoolwiselist',$data);
    
   }
   else { redirect('/', 'refresh'); }
  } 
  
  /* created by venba Tamilmaran for Update the school*/
    public function emis_state_schools_approve()
  {
	
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
	$emis_user_id = $this->session->userdata('emis_user_id');
    if($emis_loggedin) {
	  $school_id=$this->input->post('school_id');
	  $school_basic_details = $this->Statemodel->get_schoolbasicinfo($school_id);
	 // print_r($school_basic_details);
	 // die();
	  $update['curr_stat']	    = $school_basic_details->curr_stat;
      $update['curstat_date']	= $school_basic_details->curstat_date;
	  $update['district_id']	= $school_basic_details->district_id;
	  $update['urbanrural'] 	= $school_basic_details->urbanrural;
	  $update['local_body_id']	= $school_basic_details->local_body_id;
	  $update['lb_vill_town_muni']	= $school_basic_details->lb_vill_town_muni;
	  $update['cluster_id']	=  $school_basic_details->cluster_id;
	  $update['panchayat_id']	=  $school_basic_details->panchayat_id;
	  $update['lb_habitation_id']	= $school_basic_details->lb_habitation_id;
	  $update['assembly_id']	=  $school_basic_details->assembly_id;
	  $update['parliament_id']	=  $school_basic_details->parliament_id;
	  $update['municipal_id']	= $school_basic_details->municipal_id;
	  $update['city_id']	= $school_basic_details->city_id;
	  $update['pincode']	= $school_basic_details->pincode;
	  $update['address']	=  $school_basic_details->address;
	 
	  
      $update['school_name'] = $school_basic_details->school_name;
      $update['manage_cate_id'] = $school_basic_details->manage_cate_id;
      $update['sch_management_id'] = $school_basic_details->sch_management_id;
      $update['sch_cate_id'] = $school_basic_details->sch_cate_id;
      $update['latitude'] = $school_basic_details->latitude;
      $update['longitude'] = $school_basic_details->longitude;
      $update['sch_email'] = $school_basic_details->sch_mail;
      $update['sch_directorate_id'] = $school_basic_details->sch_directorate_id;
      $update['school_id'] = $school_basic_details->school_id;
      $update['block_id'] = $school_basic_details->block_id;
      $update['edu_dist_id'] = $school_basic_details->edu_dist_id;
      $update['sch_shortname'] = $school_basic_details->sch_shortname;
	 
      $basic_table ='schoolnew_basicinfo';
      $where = array('school_id'=>$update['school_id']);
      $basic_data = $this->Ceo_District_model->school_update($update,$basic_table,$where);

      
      $update_ace['school_type'] = $school_basic_details->school_type;
      $update_ace['minority_sch'] = $school_basic_details->minority;
      $update_ace['renewal_valid'] = $school_basic_details->renewal_valid;
      $update_ace['rte'] = $school_basic_details->rte;
      $update_ace['minority_grp'] = $school_basic_details->minority_group;
      $update_ace['low_class'] = $school_basic_details->low_class;
      $update_ace['high_class'] = $school_basic_details->high_class;
      $update_ace['yr_last_renwl'] = $school_basic_details->last_renewal;
      $update_ace['certifi_no'] = $school_basic_details->certi_no;
      $update_ace['resid_schl'] = $school_basic_details->resid_scl;
      $update_ace['typ_resid_schl'] = $school_basic_details->resid_type;
      $update_ace['shftd_schl'] = $school_basic_details->schl_shift;
      $update_ace['cwsn_scl'] = $school_basic_details->schl_cwsn;
      $update_ace['school_key_id'] = $school_basic_details->school_id;
      
	  $update_ace['yr_estd_schl'] = $school_basic_details->yr_estd_schl;
      $update_ace['yr_recgn_first'] = $school_basic_details->yr_recgn_first;
      //$update_ace['yr_last_renwl'] = $this->input->post('lastrenewal');
      //$update_ace['rte'] = $this->input->post('certifynumber');
      $update_ace['yr_rec_schl_elem'] = $school_basic_details->yr_rec_schl_elem;
      $update_ace['yr_rec_schl_sec'] = $school_basic_details->yr_rec_schl_sec;
      $update_ace['yr_rec_schl_hsc'] = $school_basic_details->yr_rec_schl_hsc;
      $update_ace['upgrad_prito_uprpri'] = $school_basic_details->upgrad_prito_uprpri;
      $update_ace['upgrad_uprprito_sec'] = $school_basic_details->upgrad_uprprito_sec;
      $update_ace['upgrad_secto_higsec'] = $school_basic_details->upgrad_secto_higsec;
     // $update_ace['resid_schl'] = $this->input->post('residentialschool');
      $update_ace['hill_frst'] = $school_basic_details->schl_situated;
      $update_ace['spl_edtor'] = $school_basic_details->spl_edtor;
     
      
        $ace_table = 'schoolnew_academic_detail';
        $ace_where = array('school_key_id'=>$update_ace['school_key_id']);
        $ace_data = $this->Ceo_District_model->school_update($update_ace,$ace_table,$ace_where);
     
      //$update_train['angan_childs'] =$school_basic_details->anagan_chldrns;
	  $update_train['anganwadi_stu_b'] =$school_basic_details->anganwadi_stu_b;
	  $update_train['anganwadi_stu_g'] = $school_basic_details->anganwadi_stu_g;
      $update_train['angan_wrks'] = $school_basic_details->anagan_wrks;
      $update_train['anganwadi'] =$school_basic_details->angan;
      $update_train['anganwadi_center'] = $school_basic_details->angan_code;
      $update_train['school_key_id'] = $school_basic_details->school_id;
     
         $train_table = 'schoolnew_training_detail';
         $train_where = array('school_key_id'=>$update['school_id']);
         $train_data = $this->Ceo_District_model->school_update($update_train,$train_table,$train_where);
      
          $curr_status = $this->input->post('emis_reg_sch_status'); 
          $old_status = $this->input->post('emis_reg_sch_old_status');
           
            //$basic_update['curr_stat'] = ($curr_status!=''?$curr_status:$old_status);
			 //$basic_update['curr_stat'] = ($curr_status!=''?$curr_status:$old_status);
           // $basic_data = $this->Ceo_District_model->school_update($basic_update,$basic_table,$where);
		    $school_status=$school_basic_details->curr_stat;
			if($school_status==0)
			{
				$login_update['status']='Inactive';
			}
			else
			{
				$login_update['status']='Active';
			}
            //$login_update['status'] = ($curr_status!=''?$curr_status:$old_status);
            $login_where = array('emis_user_id'=>$update['school_id']);
            $login_table = 'emis_userlogin';
            $login_data = $this->Ceo_District_model->school_update($login_update,$login_table,$login_where);
            //delete 
            //$child_data['school_id'] = $update['school_id'];
            //$child_table = 'students_school_child_count';
            //$child_where = array('school_id'=>$update['school_id']);
          
            $updatehistory['app_status'] =1;
	        $updatehistory['state_comments'] = $this->input->post('state_comments');
			 $updatehistory['state_date']=date("Y-m-d");
      // if($ace_data)
      // {
		 $where = array('school_id'=>$update['school_id']);
		 $history_table='schoolnew_basic_info_history';
         $his_data = $this->Statemodel->update_appstatus_history($history_table,$updatehistory,$where);
        // print_r($his_data);die;

      $message = "Successfully Updated School ".$update['school_name'];

      $this->session->set_flashdata('success',$message );
        //$this->load->view('State/emis_state_schools_list');
		 redirect('State/emis_state_schools_list');

		 }
		 else { redirect('/', 'refresh'); }	
     
    
   }
  public function reject_approval()
      {
	    $rejectid=$this->input->post('id');
	    $school_id=$this->input->post('schoolid');
	    $state_comments=$this->input->post('state_comments');
	    $where = array('id'=>$rejectid);
	    $updatehistory['app_status'] =2;
	   	$updatehistory['state_comments'] =$state_comments;
		$updatehistory['state_date']=date("Y-m-d");
	    $history_table='schoolnew_basic_info_history';
        $result = $this->Statemodel->update_appstatus_history($history_table,$updatehistory,$where);
		}
   

}
?>
