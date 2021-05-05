<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Validation extends REST_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database(); 
		$this->load->model("ValidationModel");
		date_default_timezone_set('Asia/Kolkata');  
	}

	function listofgenderschools_get(){
		$selection=$this->uri->segment(1,0);
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$setproce=$this->setWhereConditionByUserType($token,"students_school_child_count");

		if($selection=="listboysingirlsschool"){
			$where='students_child_detail.gender=1 AND schoolnew_academic_detail.school_type="Girls" AND '.$setproce;
		}elseif($selection=="listgirlsinboysschool"){
			$where='students_child_detail.gender=2 AND schoolnew_academic_detail.school_type="Boys" AND '.$setproce;
		}else{
			$selection="";
		}
		if($selection!=""){
			$listofstuds=$this->ValidationModel->getListGenderSchools($where);
		}elseif($this->uri->segment(1,0)=="ageOutofRange"){
			$listofstuds=$this->ValidationModel->ageOutofRange(" AND ".$setproce);
		}elseif($this->uri->segment(1,0)=="mediumNotMatching"){
			$listofstuds=$this->ValidationModel->meduiumNotEqualToStudent(" AND ".$setproce);
		}elseif($this->uri->segment(1,0)=="classRoomsNotEqualStageLevel"){
			$selection=",tot_cls as total_class_rooms_instruction,level_cls as added_total_school_level_class_rooms";
			$where="tot_cls!=level_cls AND ".$setproce;
			$listofstuds=$this->ValidationModel->classroomsnotequalslevelsandcontions($selection,$where);
		}elseif($this->uri->segment(1,0)=="classRoomsNotEqualConditions"){
			$selection=",tot_cls as total_class_rooms_instruction,tot_cond_cls as total_class_rooms_in_conditions";
			$where="tot_cls!=tot_cond_cls AND ".$setproce;
			$listofstuds=$this->ValidationModel->classroomsnotequalslevelsandcontions($selection,$where);
		}
		
		foreach($listofstuds as $r => $data){
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
	}

	function studentswithemptys_get(){
		$selection=$this->uri->segment(1,0);
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$setproce=$this->setWhereConditionByUserType($token,"students_school_child_count");

		switch($selection){
			case "blankAadhar":$select="students_child_detail.id as stu_id,aadhaar_uid_number,";$where="(students_child_detail.aadhaar_uid_number=0 OR students_child_detail.aadhaar_uid_number IS NULL OR LENGTH(students_child_detail.aadhaar_uid_number)<12) AND";break;
			case "blankMedium":$select="students_child_detail.id as stu_id,education_medium_id,";$where="(students_child_detail.education_medium_id=0 OR students_child_detail.education_medium_id IS NULL) AND";break;
			case "blankGroup":$select="students_child_detail.id as stu_id,group_code_id,";$where="(students_child_detail.group_code_id=0 OR students_child_detail.group_code_id IS NULL) AND (students_child_detail.class_studying_id=11 OR students_child_detail.class_studying_id=12) AND";break;
			case "blankPhoto":$select="photo,";$where="(students_child_detail.photo=0 OR students_child_detail.photo IS NULL) AND";break;
			case "blankBloodGroup":$select="students_child_detail.id as stu_id,bloodgroup,";$where="(students_child_detail.bloodgroup=0 OR students_child_detail.bloodgroup IS NULL) AND";break;
		}

		$where.=" ".$setproce;
		$listofstuds=$this->ValidationModel->getStudentsEmptyFields($select,$where);
		foreach($listofstuds as $r => $data){
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
	}

	function staffvalidationscheck_get(){
		$selection=$this->uri->segment(1,0);
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$setproce=$this->setWhereConditionByUserType($token,"students_school_child_count");
		switch($selection){
			case "dojlessdob":$select="staff_dob,staff_join,";$where='((DATE(staff_dob)>DATE(staff_join)) OR staff_dob IS NULL OR staff_join IS NULL OR staff_dob="0000-00-00" OR staff_join="0000-00-00") AND';break;
			case "dojlessdopsj":$select="staff_join,staff_psjoin,";$where='((DATE(staff_psjoin)<DATE(staff_join)) OR staff_psjoin IS NULL OR staff_join IS NULL OR staff_psjoin="0000-00-00" OR staff_join="0000-00-00") AND';break;
			case "studiedupto":{
				$select='(SELECT professional FROM teacher_professional_qualify WHERE teacher_professional_qualify.id=lang_study_upto) AS lang_study_upto,
				(SELECT professional FROM teacher_professional_qualify WHERE teacher_professional_qualify.id=english_upto) AS english_upto,
				(SELECT professional FROM teacher_professional_qualify WHERE teacher_professional_qualify.id=math_upto) AS math_upto,
				(SELECT professional FROM teacher_professional_qualify WHERE teacher_professional_qualify.id=science_upto) AS science_upto,
				(SELECT professional FROM teacher_professional_qualify WHERE teacher_professional_qualify.id=soc_study_upto) AS soc_study_upto,';
				$where="(lang_study_upto IS NULL OR english_upto IS NULL OR math_upto IS NULL OR science_upto IS NULL OR soc_study_upto IS NULL OR soc_study_upto=0 OR science_upto=0 OR math_upto=0 OR english_upto=0 OR lang_study_upto=0) AND";
				break;}
			case "less18":$select="staff_dob,";$where="(YEAR(DATE(NOW()))-YEAR(staff_dob))<18 AND";break;
			case "great58":$select="staff_dob,";$where="(YEAR(DATE(NOW()))-YEAR(staff_dob))>58 AND";break;
			case "sub1eqsub2":{$select="(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=subject1) AS subject1,(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=subject2) AS subject2,";
				$where="subject1=subject2 AND subject2 IS NOT NULL AND subject1 IS NOT NULL AND";
				break;
			}
			case "misstraining":$select="";$where="teacher_code NOT IN (SELECT teacher_code FROM teacher_training_details) AND";break;
			case "classtaught":{$select="class_taught,(SELECT IF(id>12,class_studying,id) FROM baseapp_class_studying WHERE baseapp_class_studying.id=low_class) AS low_class,
				(SELECT IF(id>12,class_studying,id) FROM baseapp_class_studying WHERE baseapp_class_studying.id=high_class) AS high_class,";$where="((class_taught NOT BETWEEN IF(low_class=13,-1,IF(low_class=14,-2,IF(low_class=15,-3,low_class))) 
				AND IF(high_class=13,-1,IF(high_class=14,-2,IF(high_class=15,-3,high_class))) AND class_taught<>0) OR class_taught=0) AND";
				break;
			}
		}
		$where.=" ".$setproce;
		$listofstuds=$this->ValidationModel->getStaffValidations($select,$where);
		foreach($listofstuds as $r => $data){
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
	}

	function schoolDetailsValidation_get(){
		$selection=$this->uri->segment(1,0);
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$setproce=$this->setWhereConditionByUserType($token,"students_school_child_count");
		switch($selection){
			case "estdYearValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS sch_range,yr_estd_schl';$where='(yr_estd_schl IS NULL OR (yr_estd_schl NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "primaryNullValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,yr_recgn_first';$where='(yr_recgn_first IS NULL OR (yr_recgn_first NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "upperPrimaryNullValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,yr_rec_schl_elem';$where='(yr_rec_schl_elem IS NULL OR (yr_rec_schl_elem NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;			
			case "secondaryNullValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,yr_rec_schl_sec';$where='(yr_rec_schl_sec IS NULL OR (yr_rec_schl_sec NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "higherSecondaryNullValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,yr_rec_schl_hsc';$where='(yr_rec_schl_hsc IS NULL OR (yr_rec_schl_hsc NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "upgPriToUPriValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,upgrad_prito_uprpri';$where='(upgrad_prito_uprpri IS NULL OR (upgrad_prito_uprpri NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "upgUPriToSecValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,upgrad_uprprito_sec';$where='(upgrad_uprprito_sec IS NULL OR (upgrad_uprprito_sec NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "upgSecToHSecValidation":$selection=',CONCAT(YEAR("1715-01-01"),"-",YEAR(DATE(NOW()))) AS schrange,upgrad_secto_higsec';$where='(upgrad_secto_higsec IS NULL OR (upgrad_secto_higsec NOT BETWEEN YEAR("1715-01-01") AND YEAR(DATE(NOW())))) AND';break;
			case "distToPrimary":$selection=',1 AS ranges,distance_pri';$where='distance_pri IS NULL AND';break;
			case "distToUpPrimary":$selection=',1 AS ranges,distance_upr';$where='distance_upr IS NULL AND';break;
			case "distToSec":$selection=',1 AS ranges,distance_sec';$where='distance_sec IS NULL AND';break;
			case "distToHSec":$selection=',1 AS ranges,distance_hsec';$where='distance_hsec IS NULL AND';break;
			case "smcIFSCValid":$selection=',smc_ifsc';$where="((smc_ifsc REGEXP '^[A-Z]{4}0[A-Z0-9]{6}$')=0 OR (smc_ifsc REGEXP '^[A-Z]{4}0[A-Z0-9]{6}$') IS NULL) AND";break;
			case "smdcIFSCValid":$selection=',smdc_ifsc';$where="((smdc_ifsc REGEXP '^[A-Z]{4}0[A-Z0-9]{6}$')=0 OR (smdc_ifsc REGEXP '^[A-Z]{4}0[A-Z0-9]{6}$') IS NULL) AND";break;
			case "ppriInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=1 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "primInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=2 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "middInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=3 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "highInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=4 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "hsecInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=5 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "specInstrDaysVaild":$selection=",instr_dys";$where="schoolnew_dayswork_entry.school_type=5 AND (schoolnew_dayswork_entry.instr_dys IS NULL OR schoolnew_dayswork_entry.instr_dys>365 OR schoolnew_dayswork_entry.instr_dys=0) AND";break;
			case "ppriStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=1 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "primStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=2 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "middStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=3 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "highStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=4 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "hsecStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=5 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "specStdyHRSVaild":$selection=',CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) as stdyhrs';$where="schoolnew_dayswork_entry.school_type=5 AND (CAST(CONCAT(hrs_chldrn_sty_schl,".",mns_chldrn_sty_schl) AS DECIMAL)>8 OR hrs_chldrn_sty_sch IS NULL OR mns_chldrn_sty_schl IS NULL) AND ";break;
			case "ppriTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=1 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "primTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=2 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "middTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=3 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "highTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=4 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "hsecTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=5 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "specTeachHRSVaild":$selection=',CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) as techhrs';$where="schoolnew_dayswork_entry.school_type=5 AND (CAST(CONCAT(hrs_tchrs_sty_schl,".",mns_tchrs_sty_schl) AS DECIMAL)>8 OR hrs_tchrs_sty_schl IS NULL OR mns_tchrs_sty_schl IS NULL) AND ";break;
			case "boysToiledINGirlsSchools":$selection=",schoolnew_academic_detail.school_type,toil_bys_inuse,toil_nonfunc_bys,cwsntoil_inuse_bys,cwsntoil_notuse_bys,urinls_inuse_bys,urinls_notuse_bys";$where='(toil_bys_inuse!=0 OR toil_nonfunc_bys!=0 OR cwsntoil_inuse_bys!=0 OR cwsntoil_notuse_bys!=0 OR urinls_inuse_bys!=0 OR urinls_notuse_bys!=0) AND schoolnew_academic_detail.school_type="Girls" AND';break;
			case "girlsToiledINBoysSchools":$selection=",schoolnew_academic_detail.school_type,toil_inuse_grls,toil_notuse_grls,cwsntoil_inuse_grls,cwsntoil_notuse_grls,urinls_inuse_grls,urinls_notuse_grls";$where='(toil_inuse_grls!=0 OR toil_notuse_grls!=0 OR cwsntoil_inuse_grls!=0 OR cwsntoil_notuse_grls!=0 OR urinls_inuse_grls!=0 OR urinls_notuse_grls!=0) AND schoolnew_academic_detail.school_type="Boys" AND';break;
			case "libBooksHighNERTBooks":$selection=",library_books,ncert_books";$where='library_books>ncert_books AND ';break;
			case "bookBankHighNERTBooks":$selection=",book_bank,ncert_books";$where='book_bank>ncert_books AND ';break;
		}
		$where.=" ".$setproce;
		$listofstuds=$this->ValidationModel->getSchoolDetailsValidations($selection,$where);
		foreach($listofstuds as $r => $data){
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
	}


	function updateDesiredDataPosted_post(){
		$selection=$this->uri->segment(1,0);
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$postedData=$this->post("records");

		foreach($postedData as $idx => $data){
			switch($idx){
				case "StuId":$idx="id";break;
			}
			$expidx=strtolower(implode("_",preg_split('/(?=[A-Z])/', $idx, -1, PREG_SPLIT_NO_EMPTY)));
			$submitData[$expidx]=$data;
		}
		$checkbit=false;
		switch($selection){
			case "updateStudentBlankMedium":
			case "updateStudentBlankGroup":	
			case "updateStudentBlankBloodGroup":	
			case "updateStudentAadhar":{
				if($this->ValidationModel->updatePostedSingleData("students_child_detail",$submitData)){
					$checkbit=true;
				}
				break;
			}
		}

		if($checkbit){
			$this->response(['dataStatus' => true,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Success'],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus' => false,
					'status'  => REST_Controller::HTTP_OK,
					'message' => 'Something Went Wrong'],REST_Controller::HTTP_OK);
		}
		die();
	}












	function setWhereConditionByUserType($token,$tablename){
		switch($token['emis_usertype']){
			case 1:{
				$tab=$tablename.".school_id=";
				break;
			}
			case 5:{
				$tab=$tablename.".district_id=";
				break;
			}
			case 2:
			case 6:{
				$tab=$tablename.".block_id=";
				break;
			}
			case 4:
			case 10:{
				$tab=$tablename.".edu_dist_id=";
				break;
			}
			case 3:
			case 9:{
				$tab=$tablename.".district_id=";
				break;
			}
		}
		return $tab.$token['emis_user_id'];
	}
}
?>