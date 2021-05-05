<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Attendance extends CI_Controller {

	
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
	
	
	
	/******************************************Magesh****************************/
	public function attendanceallreport(){
		$this->load->view('Attendance/Allreportdashboard');
	}
	
	/******************************************************************
							Studentwise
	*******************************************************************/
	
	public function studentlist(){
		
		$school_id=$this->session->userdata('emis_school_id');
		if(isset($_POST['list'])){
			if($_POST['fromdate']==null){
				$_POST['fromdate']=date('Y-m-d',strtotime("now"));
			}
			if($_POST['todate']==null){
				$_POST['todate']=date('Y-m-d',strtotime("now"));
			}
			$where = "rdate between '".$_POST['fromdate']."' and '".$_POST['todate']."'";
		}else{
			$where = "rdate between '".date('Y-m-d',strtotime("now"))."' and '".date('Y-m-d',strtotime("now"))."'";
		}
		$_SESSION['frdate'] = (isset($_POST['fromdate'])?$_POST['fromdate']:date('Y-m-d',strtotime("now")));
		$_SESSION['todate'] = (isset($_POST['todate'])?$_POST['todate']:date('Y-m-d',strtotime("now")));
		$data['studentlist'] = $this->Attendancemodel->studentclasslist($school_id,$where);
		//print_r($data['studentlist']);
		$this->load->view('Attendance/StudentAttendance',$data);
	}
	
	public function classwiselist(){
		$school_id= $this->session->userdata('emis_school_id');
		if(isset($_POST['stulist'])){
			if($_POST['fromdate']==null){
				$_POST['fromdate']=date('Y-m-d',strtotime("now"));
			}
			if($_POST['todate']==null){
				$_POST['todate']=date('Y-m-d',strtotime("now"));
			}
			unset($_SESSION['frdate']);unset($_SESSION['todate']);		
		}
		$_SESSION['frdate'] = (isset($_SESSION['frdate'])?$_SESSION['frdate']:(isset($_POST['fromdate'])?$_POST['fromdate']:date('Y-m-d',strtotime("now"))));
		$_SESSION['todate'] = (isset($_SESSION['todate'])?$_SESSION['todate']:(isset($_POST['todate'])?$_POST['todate']:date('Y-m-d',strtotime("now"))));
		$where = "rdate between '".$_SESSION['frdate']."' and '".$_SESSION['todate']."'";
		$class	  =	$this->uri->segment(3,0);
		$section  =	$this->uri->segment(4,0);
		$data['classwisestud'] = $this->Attendancemodel->classwise($school_id,$class,$section,$where);
		$this->load->view('Attendance/StudentAttendanceclasswise',$data);
		
	}
	public function student(){
		$school_id= $this->session->userdata('emis_school_id');
		$class	  =	$this->uri->segment(3,0);
		$section  =	$this->uri->segment(4,0);
		$studentid  =	$this->uri->segment(5,0);
		$fmdate  =	$this->uri->segment(6,0);
		$todate  =	$this->uri->segment(7,0);
		$where = "rdate between '".$fmdate."' and '".$todate."' and students_child_detail.id='".$studentid."'";
		$data['stud'] = $this->Attendancemodel->classwise($school_id,$class,$section,$where,'rdate');
		//print_r($data['stud']); //die();
		$this->load->view('Attendance/studentdatewise',$data);
	}
	
	/*******************************************************************
					Staffwise
	*******************************************************************/
	public function staffwise(){
		$school_id= $this->session->userdata('emis_school_id');
		if(isset($_POST['stafflist'])){
			if($_POST['fromdate']==null){
				$_POST['fromdate']=date('Y-m-d',strtotime("now"));
			}
			if($_POST['todate']==null){
				$_POST['todate']=date('Y-m-d',strtotime("now"));
			}
			unset($_SESSION['fromdate']);unset($_SESSION['todate']);
		}
		$_SESSION['fromdate'] = (isset($_SESSION['fromdate'])?$_SESSION['fromdate']:(isset($_POST['fromdate'])?$_POST['fromdate']:date('Y-m-d',strtotime("now"))));
		$_SESSION['todate'] = (isset($_SESSION['todate'])?$_SESSION['todate']:(isset($_POST['todate'])?$_POST['todate']:date('Y-m-d',strtotime("now"))));
		$where = "date between '".$_SESSION['fromdate']."' and '".$_SESSION['todate']."'";
		$data['stafflist'] = $this->Attendancemodel->staffwiselist($school_id,$where,$where1="");
		$this->load->view('Attendance/Staffwiselist',$data);
	}
	public function staffdatewise(){
		$school_id=$this->session->userdata('emis_school_id');
		$teacher_code = $this->uri->segment(3,0);
		$fromdate = $this->uri->segment(4,0);
		$todate = $this->uri->segment(5,0);
		$where = "date between '".$fromdate."' and '".$todate."'";
		$where1 = "where u_id=".$teacher_code." group by rdate";
		$data['stud'] = $this->Attendancemodel->staffwiselist($school_id,$where,$where1,1);
		$this->load->view('Attendance/Staffdatewise',$data);
	}
	
	
	/**************************************************************************
						Facility List
	***************************************************************************/
	public function facilities(){
		$school_id = $this->session->userdata('emis_school_id');
		$data['facilities'] = $this->Attendancemodel->facilitiesschool($school_id);
		$this->load->view('Attendance/facilitieslist',$data);
	}
	
	
	/***************************************************************************
							Scheme List
	***************************************************************************/
	public function schemeswise(){
		$school_id = $this->session->userdata('emis_school_id');
		$this->load->view('Attendance/schemeclasswise');
	}
	
}
?>