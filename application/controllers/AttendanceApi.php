<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class AttendanceApi extends REST_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url','html'));
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
		$this->load->model('Attendancemodel');
        $this->load->library('AWSBucket');
       

        // ***** Load Model for Udise_adminmodel *****
        $this->load->model('Udise_adminmodel');  
        date_default_timezone_set('Asia/Kolkata');  

	}
	
	
	public function daylist(){
		$value = $this->uri->segment(3,0);
		$school_id=$this->session->userdata('emis_school_id');
		if($value=="1"){//day
			
			$date=" BETWEEN DATE(NOW()) AND DATE(now()) ";
			$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
			$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value=="2"){//week
			
			$date=" BETWEEN DATE(NOW()- INTERVAL 7 DAY) AND DATE(now()) ";
			$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
			$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value=="3"){//month
			
			$date=" BETWEEN DATE(NOW()- INTERVAL 30 DAY) AND DATE(now()) ";
			$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
			$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value=="4"){//quartely
			
			$date=" BETWEEN DATE(NOW()- INTERVAL 90 DAY) AND DATE(now()) ";
			$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
			$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}
	}
	
	public function stafflist(){
		$value = $this->uri->segment(3,0);
		$school_id=$this->session->userdata('emis_school_id');
		if($value == 1){//day
		
			$data['staffoverall'] = $this->Attendancemodel->staffdayoverallist($school_id);
			$data['staff'] = $this->Attendancemodel->staffwisedayoveralllist($school_id);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value == 2){//week
		
			$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
			$data['staff'] = $this->Attendancemodel->staffsummary_weekly_list($school_id);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value == 3){//month
		
			$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
			$data['staff'] = $this->Attendancemodel->staffsummary_monthly_list($school_id,$date);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value == 4){//quartely
		
			$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
			$data['staff'] = $this->Attendancemodel->staffsummary_yearly_list($school_id);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}
	}
	
	public function schemelist(){
		$value = $this->uri->segment(3,0);
		$school_id=$this->session->userdata('emis_school_id');
		$tablename = "schoolnew_schemeindent";
		$data['schemelist']=$this->Attendancemodel->schemeindent($tablename,$school_id);
		$this->response(json_encode($data),REST_Controller::HTTP_OK);
	}
	
	public function facilities(){
		$value = $this->uri->segment(3,0);
		$school_id=$this->session->userdata('emis_school_id');
		if($value==1){
			$data['facilities'] = $this->Attendancemodel->facilitieslist($school_id);
			//print_r($data['facilities']);die();
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}elseif($value==2){
			$data['facilities'] = $this->Attendancemodel->facilitieslist($school_id);
			$this->response(json_encode($data),REST_Controller::HTTP_OK);
		}
	}
	
  
}
?>