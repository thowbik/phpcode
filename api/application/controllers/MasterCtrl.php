<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class MasterCtrl extends REST_Controller{
	function __construct(){
		parent::__construct();
		//$this->load->helper(array('url','html'));
		$this->load->database(); 
		$this->load->model("MasterModel");
		date_default_timezone_set('Asia/Kolkata');  
	}
	function getAllMasters_get(){
		$tableselection=$this->uri->segment(1,0);
		$id=(isset($_GET['id'])?"=".$_GET['id']:" IS NOT NULL");
		$tableName=$this->swtichTables($tableselection);
		$where=" id".$id;
		
		$update=substr($tableselection,0,3);
		if($update=="get"){
			$res=$this->MasterModel->getMasterData($tableName,$where,$update);
			foreach($res as $r => $data){
				if(is_array($data)){
					foreach($data as $d=>$dt){
						$dis=ucwords(implode(" ",explode("_",$d)));
						$result[$r][implode("",explode(" ",$dis))]=$dt;
					}
				}
			}
			$this->response(['dataStatus' => true,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Success',
					'result'  => $result],REST_Controller::HTTP_OK);
		}elseif($update=="del"){
			if($where!=" id IS NOT NULL"){
				if($this->MasterModel->getMasterData($tableName,$where,$_GET['id'])){
					$this->response(['dataStatus' => true,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Success',
						'result'  => "Data Deleted Successfully"],REST_Controller::HTTP_OK);
				}else{
					$this->response(['dataStatus' => false,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Error',
						'result'  => "Some thing Went Worng"],REST_Controller::HTTP_OK);
				}
			}else{
				$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Error',
					'result'  => 'You Cannot Delete All At Once'],REST_Controller::HTTP_OK);
			}
		}
	}
	function getAllMastersDist_get()
	{
		  $ts =explode(".",getallheaders()['Token']);
          $token=json_decode(base64_decode($ts[1]),true);
           if($token['emis_usertype'] == '5' || $token['emis_usertype'] == '14' || $token['emis_usertype'] == '9' || $token['emis_usertype'] == '10' || $token['emis_usertype'] == '6'){
           	$res=$this->MasterModel->getMasterDistData();	
	 if(!empty($res))
	 {
	 		$this->response(['dataStatus' => true,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Data Retreived Successfully',
						'result'  => $res],REST_Controller::HTTP_OK);
	 }
	 else
	 {
	 	$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Error',
					'result'  => 'Unable To Load Result for District List'],REST_Controller::HTTP_OK);
	 }

           }
           else
           {
           	$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Error',
					'result'  => 'Token Mismatched'],REST_Controller::HTTP_OK);
           }
	 
	}
	function getAcademicDet_get()
	{
	$res=$this->MasterModel->getMasterAcadDet();	
	 if(!empty($res))
	 {
	 		$this->response(['dataStatus' => true,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Data Retreived Successfully',
						'result'  => $res],REST_Controller::HTTP_OK);
	 }
	 else
	 {
	 	$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Error',
					'result'  => 'Unable To Load Result for Teacher Academic Details List'],REST_Controller::HTTP_OK);
	 }	
	}

	function addDataToMasters_post(){
		$tableselection=$this->uri->segment(1,0);
		$tableName=$this->swtichTables($tableselection);
		$dt=$this->post("records");
		$update=substr($tableselection,0,3);
		if($update=="add"){
			if($this->MasterModel->addMasterData($tableName,$dt,$update)){
				$this->response(['dataStatus' => true,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Success',
					'result'  => "New Data Added Successfully"],REST_Controller::HTTP_OK);
			}else{
				$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Error',
					'result'  => "Something Went Wrong"],REST_Controller::HTTP_OK);
			}
		}elseif($update=="upd"){
			if(isset($_GET['id'])){
				$dt['id']=$_GET['id'];
				if($this->MasterModel->addMasterData($tableName,$dt,$update)){
					$this->response(['dataStatus' => true,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Success',
						'result'  => "New Data Added Successfully"],REST_Controller::HTTP_OK);
				}else{
					$this->response(['dataStatus' => false,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Error',
						'result'  => "Something Went Wrong"],REST_Controller::HTTP_OK);
				}
			}else{
				$this->response(['dataStatus' => false,
						'status'  => REST_Controller::HTTP_OK,
						'message' => 'Error',
						'result'  => "Unable to Update without Id"],REST_Controller::HTTP_OK);
			}	
		}
	}

	function createRecords_get(){
		$allTables=['schoolnew_district','schoolnew_block','schoolnew_edn_dist_mas','schoolnew_habitation_all','schoolnew_localbody_all','schoolnew_assembly','schoolnew_parliament','schoolnew_cluster_mas','schoolnew_management','schoolnew_school_department','teacher_type','teacher_subjects'];
		foreach($allTables as $i => $table){
			$res=$this->MasterModel->getDes($table);
			$i=0;
			foreach($res as $d){
				if($i!=0){
					$dis=ucwords(implode(" ",explode("_",$d['Field'])));
					$data['records'][implode("",explode(" ",$dis))]="";
				}$i++;
			}
			echo($table." : ".json_encode($data)."\n");
			unset($data);
		}
		die();
	}

	function swtichTables($tableselection){
		$subtablName=substr($tableselection,3,strlen($tableselection));
		//echo($subtablName);die();
		switch($subtablName){
			case "District":{
				$tableName="schoolnew_district";
			break;
			}
			case "Block":{
				$tableName="schoolnew_block";
			break;
			}
			case "EduDistrict":{
				$tableName="schoolnew_edn_dist_mas";
			break;
			}
			case "Habitation":{
				$tableName="schoolnew_habitation_all";
			break;
			}
			case "LocalBody":{
				$tableName="schoolnew_localbody_all";
			break;
			}
			case "Assembly":{
				$tableName="schoolnew_assembly";
			break;
			}
			case "Parliment":{
				$tableName="schoolnew_parliament";
			break;
			}
			case "Cluster":{
				$tableName="schoolnew_cluster_mas";
			break;
			}
			case "Management":{
				$tableName="schoolnew_management";
			break;
			}
			case "Deparment":{
				$tableName="schoolnew_school_department";
			break;
			}
			case "TeacherType":{
				$tableName="teacher_type";
			break;
			}
			case "TeacherSubjects":{
				$tableName="teacher_subjects";
			break;
			}
		}
		return $tableName;
	}
}
?>