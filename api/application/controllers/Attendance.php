<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . 'libraries/REST_Controller.php';

class Attendance extends REST_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
		$this->load->model('Attendancemodel');
		$this->load->helper('common_helper');
		$this->load->library('AWS_S3');
		$this->load->library('AWSBucket');
        date_default_timezone_set('Asia/Kolkata');  

	}
	
	/******************************************************************
							Studentwise
	*******************************************************************/
	
	public function studlist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$value = $_GET['value'];
		
		if($emis_loggedin){
		
			if($value=="1"){//day
				
				$date=" BETWEEN DATE(NOW()) AND DATE(now()) ";
				$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
				$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','studentattendance'=>$data],REST_Controller::HTTP_OK);
			}elseif($value=="2"){//week
				$date=" BETWEEN DATE(NOW()- INTERVAL 7 DAY) AND DATE(now()) ";				
				$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
				$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','studentattendance'=>$data],REST_Controller::HTTP_OK);
			}elseif($value=="3"){//month
				$date=" BETWEEN DATE(NOW()- INTERVAL 30 DAY) AND DATE(now()) ";
				$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
				$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','studentattendance'=>$data],REST_Controller::HTTP_OK);
			}elseif($value=="4"){//quartely
				$date=" BETWEEN DATE(NOW()- INTERVAL 90 DAY) AND DATE(now()) ";
				$data['overall'] = $this->Attendancemodel->overallllist($school_id,$date);
				$data['overallclasswise'] = $this->Attendancemodel->overallclasswise($school_id,$date);
			    $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','studentattendance'=>$data],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','studentattendance'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	public function studentschoollist_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			
			if(isset($data['list'])){
				if($data['fromdate']==null){
					$data['fromdate']=date('Y-m-d',strtotime("now"));
				}
				if($data['todate']==null){
					$data['todate']=date('Y-m-d',strtotime("now"));
				}
				$where = "rdate between '".$data['fromdate']."' and '".$data['todate']."'";
			}else{
				$where = "rdate between '".date('Y-m-d',strtotime("now"))."' and '".date('Y-m-d',strtotime("now"))."'";
			}
			
			$_SESSION['frdate'] = (isset($data['fromdate'])?$data['fromdate']:date('Y-m-d',strtotime("now")));
			$_SESSION['todate'] = (isset($data['todate'])?$data['todate']:date('Y-m-d',strtotime("now")));
			$data['studentlist'] = $this->Attendancemodel->studentclasslist($school_id,$where);
			//print_r($data['studentlist']);
			//$this->load->view('Attendance/StudentAttendance',$data);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function studentclasswiselist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
		$token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			if(isset($data['stulist'])){
				if($data['fromdate']==null){
					$data['fromdate']=date('Y-m-d',strtotime("now"));
				}
				if($data['todate']==null){
					$data['todate']=date('Y-m-d',strtotime("now"));
				}
				unset($_SESSION['frdate']);unset($_SESSION['todate']);		
			}
			$_SESSION['frdate'] = (isset($_SESSION['frdate'])?$_SESSION['frdate']:(isset($data['fromdate'])?$data['fromdate']:date('Y-m-d',strtotime("now"))));
			$_SESSION['todate'] = (isset($_SESSION['todate'])?$_SESSION['todate']:(isset($data['todate'])?$data['todate']:date('Y-m-d',strtotime("now"))));
			$where = "rdate between '".$_SESSION['frdate']."' and '".$_SESSION['todate']."'";
			
			$class	  =	$_GET['class'];
			$section  =	$_GET['section'];
			$data['classwisestud'] = $this->Attendancemodel->classwise($school_id,$class,$section,$where);
			//print_r($data['classwisestud']);die();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			//$this->load->view('Attendance/StudentAttendanceclasswise',$data);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	public function studentlistall_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
		$token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$class	  =	$_GET['class'];
			$section  =	$_GET['section'];
			$studentid =$_GET['studentid'];
			$fmdate  =	$_SESSION['frdate'];
			$todate  =	$_SESSION['todate'];
			$where = "rdate between '".$fmdate."' and '".$todate."' and students_child_detail.id='".$studentid."'";
			$data['stud'] = $this->Attendancemodel->classwise($school_id,$class,$section,$where,'rdate');
			//print_r($data['stud']);die();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
		//$this->load->view('Attendance/studentdatewise',$data);
	}
	
	
	/*********************************************************************
			End
	*********************************************************************/
	
	
	/*******************************************************************
					Staffwise
	*******************************************************************/
	
	public function stafflist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$value = $_GET['value'];
		
		if($emis_loggedin){
			if($value == 1){//day
		
				$data['staffoverall'] = $this->Attendancemodel->staffdayoverallist($school_id);
				$data['staff'] = $this->Attendancemodel->staffwisedayoveralllist($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}elseif($value == 2){//week
		
				$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
				$data['staff'] = $this->Attendancemodel->staffsummary_weekly_list($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}elseif($value == 3){//month
		
				$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
				$data['staff'] = $this->Attendancemodel->staffsummary_monthly_list($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}elseif($value == 4){//quartely
		
				$data['staffoverall'] = $this->Attendancemodel->staffoveralllist($school_id);
				$data['staff'] = $this->Attendancemodel->staffsummary_yearly_list($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function staffwiseschool_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			if(isset($data['stafflist'])){
				if($data['fromdate']==null){
					$data['fromdate']=date('Y-m-d',strtotime("now"));
				}
				if($data['todate']==null){
					$data['todate']=date('Y-m-d',strtotime("now"));
				}
				unset($_SESSION['fromdate']);unset($_SESSION['todate']);
			}
			$_SESSION['fromdate'] = (isset($_SESSION['fromdate'])?$_SESSION['fromdate']:(isset($data['fromdate'])?$data['fromdate']:date('Y-m-d',strtotime("now"))));
			$_SESSION['todate'] = (isset($_SESSION['todate'])?$_SESSION['todate']:(isset($data['todate'])?$data['todate']:date('Y-m-d',strtotime("now"))));
			$where = "date between '".$_SESSION['fromdate']."' and '".$_SESSION['todate']."'";
			$data['stafflist'] = $this->Attendancemodel->staffwiselist($school_id,$where,$where1="");
			//print_r($data['stafflist']);die();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			//$this->load->view('Attendance/Staffwiselist',$data);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function staffdatewiseschool_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		
		if($emis_loggedin){
			$json=file_get_contents('php://input');
			$data=json_decode($json,true);
			$teacher_code = $_GET['teacher_code'];;
			$fromdate = $_SESSION['fromdate'];
			$todate = $_SESSION['todate'];
			$where = "date between '".$fromdate."' and '".$todate."'";
			$where1 = "where u_id=".$teacher_code." group by rdate";
			$data['stud'] = $this->Attendancemodel->staffwiselist($school_id,$where,$where1,1);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			//$this->load->view('Attendance/Staffdatewise',$data);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/**************************************************************************
						Scheme List
	***************************************************************************/
	
	public function schemelist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$value = $_GET['value'];
		if($emis_loggedin){
			$data['schemelist']=$this->Attendancemodel->schemeindent($tablename,$school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>json_encode($data)],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	/**************************************************************************
						Facility List
	***************************************************************************/
	
	public function facilitieslist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$value = $_GET['value'];
		if($emis_loggedin){
			if($value==1){
				$data['facilities'] = $this->Attendancemodel->facilitieslist($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}elseif($value==2){
				$data['facilities'] = $this->Attendancemodel->facilitieslist($school_id);
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	
	public function facilitiesall_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$data['facilities'] = $this->Attendancemodel->facilitiesschool($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function schoolphotos_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			for($i=1;$i<=5;$i++){
				$image[] = Common::get_url(TEACHER_BUCKET_NAME,'School_Profile/'.$school_id.'_'.$i.'.jpg','+5 minutes');
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','schoolphotos'=>$image],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function saveschoolphotos_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		//print_r($_FILES);die();
		if($emis_loggedin){
			$i=1;
			foreach($_FILES as $filesindex => $filevalue){
				$ext=explode('.',$filevalue['name']);
				$_FILES[$filesindex]['name']=$school_id.'_'.$i++.'.'.$ext[1];
				
			}
			$AWS=new AWSBucket(TEACHER_BUCKET_NAME,TEACHERS_IMAGE_KEY,TEACHERS_IMAGE_SECRET,'School_Profile',$_FILES,'STANDARD_IA');
			$uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files,$AWS->storageClass,0);
			$i=1;
            //print_r($uploadarr);
			foreach($uploadarr as $uploadvalue){
				$up['photo'.$i++]=$uploadvalue[0]['fname'];
			}
			//$up['photo']='School_Profile/'.$school_id.'.jpg';
			//print_r($up);die();
			$savephoto = $this->Attendancemodel->updatephoto($up,$school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','photos'=>$savephoto],REST_Controller::HTTP_OK);
			
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
  
}
?>