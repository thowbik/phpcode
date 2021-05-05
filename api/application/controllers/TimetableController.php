<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require APPPATH . '/third_party/mpdf/mpdf.php';
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class TimetableController extends REST_Controller {
	function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->helper('security');
    $this->load->database();
   // $this->load->model('Homemodel');
   // $this->load->model('Authmodel');
    $this->load->model('Datamodel');
	$this->load->model('TimetableModel');
  }

   

    function getClassSection_get()
	{
		
		//$records = $this->get('school_id'); 
        $school_id =  $this->get('school_id');        
		$classDetails = $this->TimetableModel->getClassDetail($school_id);
		 if(count($classDetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
	}
	public function loadMasterTimeTable_post() {
		
			//print_r(this->post('clasec');
			//die();
			//print_r('test');
		$records = $this->post('records'); 
		//print_r($records);
		//die();
        $school_id = $records['school_id']; 
        $classid='';
		$sectionid='';
        $timetabledetails_monday = $this->TimetableModel->gettimetable_data_monday($school_id,$classid,$sectionid);
        $timetabledetails_tuesday = $this->TimetableModel->gettimetable_data_tuesday($school_id,$classid,$sectionid);
        $timetabledetails_wednesday = $this->TimetableModel->gettimetable_data_wednesday($school_id,$classid,$sectionid);
		$timetabledetails_thursday = $this->TimetableModel->gettimetable_data_thursday($school_id,$classid,$sectionid);
		$timetabledetails_friday= $this->TimetableModel->gettimetable_data_friday($school_id,$classid,$sectionid);
		$timetabledetails_saturday = $this->TimetableModel->gettimetable_data_saturday($school_id,$classid,$sectionid);
		$timetabledetails_sunday= $this->TimetableModel->gettimetable_data_sunday($school_id,$classid,$sectionid);
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
    }
	public function getmasterdata_post() {
		
		$records = $this->post('records'); 
		
		$school_id = $records['school_id']; 
        $classid = $records['forminputs']['class']; 
		$sectionid = $records['forminputs']['section']; 
        $getmaster_classid = $this->TimetableModel->getclass_autoid($school_id,$classid,$sectionid);
		$teacherslist = $this->TimetableModel->getteachers($school_id);
		$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);
		$deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);	
		$timetabledetails_monday= $this->TimetableModel->gettimetable_data_monday($school_id,$classid,$sectionid);
		$timetabledetails_tuesday=$this->TimetableModel->gettimetable_data_tuesday($school_id,$classid,$sectionid);
		$timetabledetails_wednesday=$this->TimetableModel->gettimetable_data_wednesday($school_id,$classid,$sectionid);
		$timetabledetails_thursday=$this->TimetableModel->gettimetable_data_thursday($school_id,$classid,$sectionid);
		$timetabledetails_friday=$this->TimetableModel->gettimetable_data_friday($school_id,$classid,$sectionid);
		$timetabledetails_saturday=$this->TimetableModel->gettimetable_data_saturday($school_id,$classid,$sectionid);
		$timetabledetails_sunday=$this->TimetableModel->gettimetable_data_sunday($school_id,$classid,$sectionid);
		//print_r($timetabledetails_monday);
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['volunteerteachers'] = $volunteerteachers;
				$data['deputationteachers'] = $deputationteachers;
				$data['classdetails'] = $classid;
				$data['schoolid']=$school_id;
				$data['classid']=$classid;
				$data['masterclassid']= $getmaster_classid;
				$data['sectionid']=$sectionid;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
    }
	public function savemastertimetable_post()
	{
		
		$masterrecord=$this->post('records');
		//print_r($masterrecord);
		//print_r('bala');
		//die();
		$school_id=$masterrecord['school_id'];
		
		$classid=$masterrecord['timetabledata']['hideclass'];
		$sectionid=$masterrecord['timetabledata']['hidesection'];
		$masterid=$masterrecord['timetabledata']['hidemaster'];
		$timetablecount = $this->TimetableModel->timetable_count_data($school_id,$classid,$sectionid);
		$ttdata= $timetablecount[0]->countdata;
		 
		   if($ttdata > 0) 
		{
			$data['timetabledetails_delete'] = $this->TimetableModel->timetable_data_delete($school_id,$classid,$sectionid);
		}
		for ($x = 1; $x <= 8; $x++) 
		{
			
		$mondaydata=$masterrecord['timetabledata']['timeTableDays'][0];
		$mm1=(explode("-",$mondaydata['p'.$x]));
		//print_r($mm1);
		//print_r('bala');
		//die();
		    $savemonday['school_id'] =$school_id;
			$savemonday['class_id'] = $classid;
			$savemonday['section'] = $sectionid;
			$savemonday['master_classid'] = $masterid;
			$savemonday['days'] = 1;
			$savemonday['PS'] = $mm1[0];
			$savemonday['PT'] = $mm1[1];
			$savemonday['status'] = $x;
            $savemonday['created_date']= date("Y-m-d H:i:s");
		
		$result = $this->TimetableModel->teacher_assign_class_timetable_monday($savemonday);
		
		$tuesdaydata=$masterrecord['timetabledata']['timeTableDays'][1];
		$tt1=(explode("-",$tuesdaydata['p'.$x]));
		    $savetuesday['school_id'] = $school_id;
			$savetuesday['class_id'] = $classid;
			$savetuesday['section'] = $sectionid;
			$savetuesday['master_classid'] = $masterid;
			$savetuesday['days'] = 2;
			
			$savetuesday['PS'] = $tt1[0];
			$savetuesday['PT'] = $tt1[1];
			$savetuesday['status'] = $x;
            $savetuesday['created_date']= date("Y-m-d H:i:s");
		
		$result1 = $this->TimetableModel->teacher_assign_class_timetable_tuesday($savetuesday);
		
		$wednesdaydata=$masterrecord['timetabledata']['timeTableDays'][2];
		$ww1=(explode("-",$wednesdaydata['p'.$x]));
		    $savewednesday['school_id'] =$school_id;
			$savewednesday['class_id'] = $classid;
			$savewednesday['section'] = $sectionid;
			$savewednesday['master_classid'] = $masterid;
			$savewednesday['days'] = 3;
			
			$savewednesday['PS'] = $ww1[0];
			$savewednesday['PT'] = $ww1[1];
			$savewednesday['status'] = $x;
            $savewednesday['created_date']= date("Y-m-d H:i:s");
		
		$result2 = $this->TimetableModel->teacher_assign_class_timetable_wednesday($savewednesday);
		
		$thursdaydata=$masterrecord['timetabledata']['timeTableDays'][3];
		$th1=(explode("-",$thursdaydata['p'.$x]));
		    $savethursday['school_id'] = $school_id;
			$savethursday['class_id'] = $classid;
			$savethursday['section'] = $sectionid;
			$savethursday['master_classid'] = $masterid;
			$savethursday['days'] = 4;
			
			$savethursday['PS'] = $th1[0];
			$savethursday['PT'] = $th1[1];
			$savethursday['status'] = $x;
            $savethursday['created_date']= date("Y-m-d H:i:s");
		
		$result3 = $this->TimetableModel->teacher_assign_class_timetable_thursday($savethursday);
		
		$fridaydata=$masterrecord['timetabledata']['timeTableDays'][4];
		$ff1=(explode("-",$fridaydata['p'.$x]));
		    $savefriday['school_id'] = $school_id;
			$savefriday['class_id'] = $classid;
			$savefriday['section'] = $sectionid;
			$savefriday['master_classid'] = $masterid;
			$savefriday['days'] = 5;
			$savefriday['PS'] = $ff1[0];
			$savefriday['PT'] = $ff1[1];
			$savefriday['status'] = $x;
            $savefriday['created_date']= date("Y-m-d H:i:s");
		
		$result4 = $this->TimetableModel->teacher_assign_class_timetable_friday($savefriday);
		
		$saturdaydata=$masterrecord['timetabledata']['timeTableDays'][5];
		$sa1=(explode("-",$saturdaydata['p'.$x]));
		    $savesaturday['school_id'] = $school_id;
			$savesaturday['class_id'] = $classid;
			$savesaturday['section'] = $sectionid;
			$savesaturday['master_classid'] = $masterid;
			$savesaturday['days'] = 6;
			
			$savesaturday['PS'] = $sa1[0];
			$savesaturday['PT'] = $sa1[1];
			$savesaturday['status'] = $x;
            $savesaturday['created_date']= date("Y-m-d H:i:s");
		
	$result5 = $this->TimetableModel->teacher_assign_class_timetable_saturday($savesaturday);
	
	$sundaydata=$masterrecord['timetabledata']['timeTableDays'][6];
		$su1=(explode("-",$sundaydata['p'.$x]));
		    $savesunday['school_id'] =$school_id;
			$savesunday['class_id'] = $classid;
			$savesunday['section'] = $sectionid;
			$savesunday['master_classid'] = $masterid;
			$savesunday['days'] = 7;
			
			$savesunday['PS'] = $su1[0];
			$savesunday['PT'] = $su1[1];
			$savesunday['status'] = $x;
            $savesunday['created_date']= date("Y-m-d H:i:s");
			
	$result6 = $this->TimetableModel->teacher_assign_class_timetable_sunday($savesunday);
		}
	    $teacherslist = $this->TimetableModel->getteachers($school_id);
		$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);
		$deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);	
       
		$timetabledetails_monday= $this->TimetableModel->gettimetable_data_monday($school_id,$classid,$sectionid);
		$timetabledetails_tuesday=$this->TimetableModel->gettimetable_data_tuesday($school_id,$classid,$sectionid);
		$timetabledetails_wednesday=$this->TimetableModel->gettimetable_data_wednesday($school_id,$classid,$sectionid);
		$timetabledetails_thursday=$this->TimetableModel->gettimetable_data_thursday($school_id,$classid,$sectionid);
		$timetabledetails_friday=$this->TimetableModel->gettimetable_data_friday($school_id,$classid,$sectionid);
		$timetabledetails_saturday=$this->TimetableModel->gettimetable_data_saturday($school_id,$classid,$sectionid);
		$timetabledetails_sunday=$this->TimetableModel->gettimetable_data_sunday($school_id,$classid,$sectionid);
	     if(count($teacherslist))
             {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['volunteerteachers'] = $volunteerteachers;
				$data['deputationteachers'] = $deputationteachers;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['classid']=$classid;
				$data['sectionid']=$sectionid;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		
		
	}
     	public function loadDefaultTimeTable() {
		
		$school_id=3509;
		$school_category = $this->TimetableModel->get_school_category($school_id);
		$sch_cate=$school_category[0]->cate_type;
		if($sch_cate=='Higher Secondary School')
		{
			$tablename='schoolnew_timetable_weekle_highersec_school';
		}
		else if($sch_cate=='High School')
		{
			$tablename='schoolnew_timetable_weekle_highschool';
		}
		else
		{
			$tablename='schoolnew_timetable_weekle_middleschool';
		}
        $classid='';
		$sectionid='';
        $this_week_fst='2019-11-04';
        $this_week_second='2019-11-05';	
		$this_week_third='2019-11-06';
		$this_week_fourth='2019-11-07';
        $this_week_fifth='2019-11-08';	
        $this_week_sixth='2019-11-09';
		 $this_week_seventh='2019-11-10';
		 
		 
		 $teacherslist = $this->TimetableModel->getteachers($school_id);
		
		$timetabledetails_monday= $this->TimetableModel->getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst,$tablename);
		$timetabledetails_tuesday=$this->TimetableModel->getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second,$tablename);
		$timetabledetails_wednesday=$this->TimetableModel->getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third,$tablename);
		$timetabledetails_thursday=$this->TimetableModel->getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth,$tablename);
		$timetabledetails_friday=$this->TimetableModel->getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth,$tablename);
		$timetabledetails_saturday=$this->TimetableModel->getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth,$tablename);
		$timetabledetails_sunday=$this->TimetableModel->getweektimetable_data_sunday($school_id,$classid,$sectionid,$this_week_seventh,$tablename);
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
               // $data['teacherslist'] = $teacherslist;
				//$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		 
    }
	 	public function getweeklydata_post() {
			$records = $this->post('records'); 
		
		$school_id = $records['school_id']; 
        $classid = $records['forminputs']['class']; 
		$sectionid = $records['forminputs']['section']; 
		
		 $school_category = $this->TimetableModel->get_school_category($school_id);
		 $sch_cate=$school_category[0]->cate_type;
		if($sch_cate=='Higher Secondary School')
		{
			$tablename='schoolnew_timetable_weekle_highersec_school';
	    }
		else if($sch_cate=='High School')
		{
			$tablename='schoolnew_timetable_weekle_highschool';
		}
		else
		{
			$tablename='schoolnew_timetable_weekle_middleschool';
		}
		//print_r($tablename);
		//print_r('test');
		//die();
		 $monday = strtotime("last monday");
         $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
         $this_week_fst = date("Y-m-d",$monday);
         $this_week_seventh = date("Y-m-d",$sunday);
		 $date = $this_week_fst;
		 $this_week_second=date('Y-m-d', strtotime($date. ' + 1 days'));
		 $this_week_third=date('Y-m-d', strtotime($date. ' + 2 days'));
		 $this_week_fourth=date('Y-m-d', strtotime($date. ' + 3 days'));
		 $this_week_fifth=date('Y-m-d', strtotime($date. ' + 4 days'));
		 $this_week_sixth=date('Y-m-d', strtotime($date. ' + 5 days'));
     
    
      
		$teacherslist = $this->TimetableModel->getteachers($school_id);
		$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);
		$deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);	
        
		$timetabledetails_monday= $this->TimetableModel->getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst,$tablename);
		$timetabledetails_tuesday=$this->TimetableModel->getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second,$tablename);
		$timetabledetails_wednesday=$this->TimetableModel->getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third,$tablename);
		$timetabledetails_thursday=$this->TimetableModel->getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth,$tablename);
		$timetabledetails_friday=$this->TimetableModel->getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth,$tablename);
		$timetabledetails_saturday=$this->TimetableModel->getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth,$tablename);
		$timetabledetails_sunday=$this->TimetableModel->getweektimetable_data_sunday($school_id,$classid,$sectionid,$this_week_seventh,$tablename);
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['volunteerteachers'] = $volunteerteachers;
				$data['deputationteachers'] = $deputationteachers;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['classid']=$classid;
				$data['sectionid']=$sectionid;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
    }
	public function saveweeklytimetable_post()
	{
		
		/* for get weekdays */
		 $monday = strtotime("last monday");
         $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		 $date = $this_week_fst;
		 $this_week_second=date('Y-m-d', strtotime($date. ' + 1 days'));
		 $this_week_third=date('Y-m-d', strtotime($date. ' + 2 days'));
		 $this_week_fourth=date('Y-m-d', strtotime($date. ' + 3 days'));
		 $this_week_fifth=date('Y-m-d', strtotime($date. ' + 4 days'));
		 $this_week_sixth=date('Y-m-d', strtotime($date. ' + 5 days'));
		 $today=date("Y-m-d");
		// print_r($today);
		// print_r($this_week_fourth);
		// die();
		
		/*end of weekdays */
		
		$weeklyrecord=$this->post('records');
		$school_id=$weeklyrecord['school_id'];
		
		$classid=$weeklyrecord['timetabledata']['hideclass'];
		$sectionid=$weeklyrecord['timetabledata']['hidesection'];
		
		
		 $school_category = $this->TimetableModel->get_school_category($school_id);
		 $sch_cate=$school_category[0]->cate_type;
		
		if($sch_cate=='Higher Secondary School')
		{
			$tablename='schoolnew_timetable_weekle_highersec_school';
		}
		else if($sch_cate=='High School')
		{
			$tablename='schoolnew_timetable_weekle_highschool';
		}
		else
		{
			$tablename='schoolnew_timetable_weekle_middleschool';
		}
		//print_r($tablename);
		//die();
		//$class=12;
		//$section='D';
		$timetablecount = $this->TimetableModel->weektimetable_count_data($school_id,$this_week_fst,$classid,$sectionid,$tablename);
		$timetablecountdaily = $this->TimetableModel->dailyimetable_count_data($school_id,$today,$classid,$sectionid);
		$ttdata= $timetablecount[0]->countdata;
		$ttdatadaily= $timetablecountdaily[0]->countdata; 
		   if($ttdata > 0) 
		{
			$data['timetabledetails_delete'] = $this->TimetableModel->weektimetable_data_delete($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed,$tablename);
		}
		 if($ttdatadaily > 0) 
		{
			$data['timetabledetails_delete_daily'] = $this->TimetableModel->dailytimetable_data_delete($school_id,$classid,$sectionid,$today);
		}
		for ($x = 1; $x <= 8; $x++) 
		{
			
		$mondaydata=$weeklyrecord['timetabledata']['timeTableDays'][0];
		$mm1=(explode("-",$mondaydata['p'.$x]));
		    $savemonday['school_id'] = $school_id;
			$savemonday['class_id'] = $classid;
			$savemonday['section'] = $sectionid;
			$savemonday['days'] = 1;
			$savemonday['timetable_date'] =$this_week_fst;
			$savemonday['PS'] = $mm1[0];
			$savemonday['PT'] = $mm1[1];
			$savemonday['status'] = $x;
            $savemonday['created_date']= date("Y-m-d H:i:s");
		
		$result = $this->TimetableModel->teacher_assign_class_weeklytable_monday($savemonday,$tablename);
		if($today==$this_week_fst)
		{
			$result_m = $this->TimetableModel->teacher_assign_class_dailytable_monday($savemonday);
		}
		
		$tuesdaydata=$weeklyrecord['timetabledata']['timeTableDays'][1];
		$tt1=(explode("-",$tuesdaydata['p'.$x]));
		    $savetuesday['school_id'] = $school_id;
			$savetuesday['class_id'] = $classid;
			$savetuesday['section'] = $sectionid;
			$savetuesday['days'] = 2;
			$savetuesday['timetable_date'] =$this_week_second;
			$savetuesday['PS'] = $tt1[0];
			$savetuesday['PT'] = $tt1[1];
			$savetuesday['status'] = $x;
            $savetuesday['created_date']= date("Y-m-d H:i:s");
		
		$result1 = $this->TimetableModel->teacher_assign_class_weeklytable_tuesday($savetuesday,$tablename);
		if($today==$this_week_second)
		{
			$result_t = $this->TimetableModel->teacher_assign_class_dailytable_tuesday($savetuesday);
		}
		$wednesdaydata=$weeklyrecord['timetabledata']['timeTableDays'][2];
		$ww1=(explode("-",$wednesdaydata['p'.$x]));
		    $savewednesday['school_id'] = $school_id;
			$savewednesday['class_id'] = $classid;
			$savewednesday['section'] = $sectionid;
			$savewednesday['days'] = 3;
			$savewednesday['timetable_date'] =$this_week_third;
			$savewednesday['PS'] = $ww1[0];
			$savewednesday['PT'] = $ww1[1];
			$savewednesday['status'] = $x;
            $savewednesday['created_date']= date("Y-m-d H:i:s");
		
		$result2 = $this->TimetableModel->teacher_assign_class_weeklytable_wednesday($savewednesday,$tablename);
		if($today==$this_week_third)
		{
			$result_w = $this->TimetableModel->teacher_assign_class_dailytable_wednesday($savewednesday);
		}
		$thursdaydata=$weeklyrecord['timetabledata']['timeTableDays'][3];
		$th1=(explode("-",$thursdaydata['p'.$x]));
		    $savethursday['school_id'] =$school_id;
			$savethursday['class_id'] = $classid;
			$savethursday['section'] = $sectionid;
			$savethursday['days'] = 4;
			$savethursday['timetable_date'] =$this_week_fourth;
			$savethursday['PS'] = $th1[0];
			$savethursday['PT'] = $th1[1];
			$savethursday['status'] = $x;
            $savethursday['created_date']= date("Y-m-d H:i:s");
		
		$result3 = $this->TimetableModel->teacher_assign_class_weeklytable_thursday($savethursday,$tablename);
		
		if($today==$this_week_fourth)
		{
			$result_th= $this->TimetableModel->teacher_assign_class_dailytable_thursday($savethursday);
		}
		
		$fridaydata=$weeklyrecord['timetabledata']['timeTableDays'][4];
		$ff1=(explode("-",$fridaydata['p'.$x]));
		    $savefriday['school_id'] = $school_id;
			$savefriday['class_id'] = $classid;
			$savefriday['section'] = $sectionid;
			$savefriday['days'] = 5;
			$savefriday['timetable_date'] =$this_week_fifth;
			$savefriday['PS'] = $ff1[0];
			$savefriday['PT'] = $ff1[1];
			$savefriday['status'] = $x;
            $savefriday['created_date']= date("Y-m-d H:i:s");
		
		$result4 = $this->TimetableModel->teacher_assign_class_weeklytable_friday($savefriday,$tablename);
		if($today==$this_week_fifth)
		{
			$result_f= $this->TimetableModel->teacher_assign_class_dailytable_friday($savefriday);
		}
		$saturdaydata=$weeklyrecord['timetabledata']['timeTableDays'][5];
		$sa1=(explode("-",$saturdaydata['p'.$x]));
		    $savesaturday['school_id'] =$school_id;
			$savesaturday['class_id'] = $classid;
			$savesaturday['section'] = $sectionid;
			$savesaturday['days'] = 6;
			$savesaturday['timetable_date'] =$this_week_sixth;
			$savesaturday['PS'] = $sa1[0];
			$savesaturday['PT'] = $sa1[1];
			$savesaturday['status'] = $x;
            $savesaturday['created_date']= date("Y-m-d H:i:s");
		
	$result5 = $this->TimetableModel->teacher_assign_class_weeklytable_saturday($savesaturday,$tablename);
	if($today==$this_week_sixth)
		{
			$result_sa= $this->TimetableModel->teacher_assign_class_dailytable_saturday($savesaturday);
		}
	$sundaydata=$weeklyrecord['timetabledata']['timeTableDays'][6];
		$su1=(explode("-",$sundaydata['p'.$x]));
		    $savesunday['school_id'] =$school_id;
			$savesunday['class_id'] = $classid;
			$savesunday['section'] = $sectionid;
			$savesunday['days'] = 7;
			$savesunday['timetable_date'] =$this_week_ed;
			$savesunday['PS'] = $su1[0];
			$savesunday['PT'] = $su1[1];
			$savesunday['status'] = $x;
            $savesunday['created_date']= date("Y-m-d H:i:s");
			
	$result6 = $this->TimetableModel->teacher_assign_class_weeklytable_sunday($savesunday,$tablename);
	if($today==$this_week_ed)
		{
			$result_sa= $this->TimetableModel->teacher_assign_class_dailytable_sunday($savesunday);
		}
	}
	   // $tname='schoolnew_timetable_weekle_middleschool';
		//print_r($tablename);
		//print_r('checking');
		 
		//die();
	    $teacherslist = $this->TimetableModel->getteachers($school_id);
		$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);
		$deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);	
       
		$timetabledetails_monday= $this->TimetableModel->getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst,$tablename);
		$timetabledetails_tuesday=$this->TimetableModel->getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second,$tablename);
		$timetabledetails_wednesday=$this->TimetableModel->getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third,$tablename);
		$timetabledetails_thursday=$this->TimetableModel->getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth,$tablename);
		$timetabledetails_friday=$this->TimetableModel->getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth,$tablename);
		$timetabledetails_saturday=$this->TimetableModel->getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth,$tablename);
		$timetabledetails_sunday=$this->TimetableModel->getweektimetable_data_sunday($school_id,$classid,$sectionid,$this_week_ed,$tablename);
	 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['volunteerteachers'] = $volunteerteachers;
				$data['deputationteachers'] = $deputationteachers;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['classid']=$classid;
				$data['sectionid']=$sectionid;
				$data['timetabledetails_monday']=$timetabledetails_monday;
				$data['timetabledetails_tuesday']=$timetabledetails_tuesday;
				$data['timetabledetails_wednesday']=$timetabledetails_wednesday;
				$data['timetabledetails_thursday']=$timetabledetails_thursday;
				$data['timetabledetails_friday']=$timetabledetails_friday;
				$data['timetabledetails_saturday']=$timetabledetails_saturday;
				$data['timetabledetails_sunday']=$timetabledetails_sunday;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		
		
	}
	
	 public function get_school_section_details()
  {
    
          $class_id = $this->input->post('class_id');
          $class_section = $this->Homemodel->get_schoolwise_class_section($class_id);
          echo json_encode($class_section);
        
  }
    
	public function loadWeeklyTimeTable() {
		
		 $school_id = $school_id=$this->session->userdata('emis_school_id');
		 $this->load->model('TimetableModel');
		 $termid = $this->input->post('termid');
		 $classid = $this->input->post('classid');
		 $data['class']=$classid;
		 $sectionid = $this->input->post('section');
		 $data['section']=$sectionid;
		 $classautoid= $this->TimetableModel->getClassid($school_id,$classid,$sectionid);
		 $data['classauto']= $classautoid[0]->id;
		 //$periodscount = $this->TimetableModel->getperoids($school_id,$classid);
		
		 $data['noofperiods']= 8;
         $data['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
		 
		 $data['classsectionDetails'] = $this->TimetableModel->getClasssectionDetail($school_id);
         $data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
		 $data['Teacherslist'] = $this->TimetableModel->getteachers($school_id);
		 //print_r($data['Teacherslist']);
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		 $data['this_week_fst']= $this_week_fst;
		$data['this_week_ed']= $this_week_ed;
         $date = $this_week_fst;
		 $previous_week_fst=date('Y-m-d', strtotime($date. ' - 7 days'));
		 $previous_week_second=date('Y-m-d', strtotime($date. ' - 6 days'));
		 $previous_week_third=date('Y-m-d', strtotime($date. ' - 5 days'));
		 $previous_week_fourth=date('Y-m-d', strtotime($date. ' - 4 days'));
		 $previous_week_fifth=date('Y-m-d', strtotime($date. ' - 3 days'));
		 $previous_week_sixth=date('Y-m-d', strtotime($date. ' - 2 days'));
		 $previous_week_ed=date('Y-m-d', strtotime($date. ' - 1 days'));
		 
         $this_week_second=date('Y-m-d', strtotime($date. ' + 1 days'));
		 $this_week_third=date('Y-m-d', strtotime($date. ' + 2 days'));
		 $this_week_fourth=date('Y-m-d', strtotime($date. ' + 3 days'));
		 $this_week_fifth=date('Y-m-d', strtotime($date. ' + 4 days'));
		 $this_week_sixth=date('Y-m-d', strtotime($date. ' + 5 days'));
		 $monday=$this->input->post('monday');
		 if(!empty($monday))
		 {
		  $term=$this->input->post('term');
		  $class=$this->input->post('class');
		  $section=$this->input->post('section');
		  $timetablecount = $this->TimetableModel->weektimetable_count_data($school_id,$this_week_fst,$class,$section);
		  $ttdata= $timetablecount[0]->countdata;
		 
		   if($ttdata > 0) 
		{
			$data['timetabledetails_delete'] = $this->TimetableModel->weektimetable_data_delete($school_id,$class,$section,$this_week_fst,$this_week_ed);
		}
		}
		
		$noofperiods=$this->input->post('periodscount');
		if(!empty($noofperiods)){
			$classautoid=$this->input->post('classautoid');
			$class=$this->input->post('class');
			$section=$this->input->post('section');
		
		for ($x = 1; $x <= $noofperiods; $x++) 
		{
		$monday1=$this->input->post('monday');
		$mm1=(explode("-",$monday1[$x]));
		    $savemonday['school_id'] = $school_id;
			$savemonday['master_id'] = $classautoid;
			$savemonday['class_id'] = $class;
			$savemonday['section'] = $section;
			$savemonday['days'] = 1;
			$savemonday['timetable_date'] =$this_week_fst;
			$savemonday['school_id'] = $school_id;
			$savemonday['PS'] = $mm1[1];
			$savemonday['PT'] = $mm1[0];
			$savemonday['status'] = $x;
            $savemonday['created_date']= date("Y-m-d H:i:s");
	    		
		$result = $this->TimetableModel->teacher_assign_class_weeklytable_monday($savemonday);
		
		$tuesday=$this->input->post('tuesday');
		$tt1=(explode("-",$tuesday[$x]));
		    $savetuesday['school_id'] = $school_id;
			$savetuesday['master_id'] = $classautoid;
			$savetuesday['class_id']  = $class;
			$savetuesday['section']   = $section;
			$savetuesday['days'] = 2;
			$savetuesday['timetable_date'] =$this_week_second;
			$savetuesday['PS'] = $tt1[1];
			$savetuesday['PT'] = $tt1[0];
			$savetuesday['status'] =  $x;
			$savetuesday['created_date']=date("Y-m-d H:i:s");
		$result1 = $this->TimetableModel->teacher_assign_class_weeklytable_tuesday($savetuesday);
		
		
		$wednesday=$this->input->post('wednesday');
		    $ww1=(explode("-",$wednesday[$x]));
		    $savewednesday['school_id'] = $school_id;
			$savewednesday['master_id'] = $classautoid;
			$savewednesday['class_id'] = $class;
			$savewednesday['section'] = $section;
			$savewednesday['days'] = 3;
			$savewednesday['timetable_date'] =$this_week_third;
			$savewednesday['PS'] = $ww1[1];
			$savewednesday['PT'] = $ww1[0];
			$savewednesday['status'] =  $x;
			$savewednesday['created_date']=date("Y-m-d H:i:s");
		$result2 = $this->TimetableModel->teacher_assign_class_weeklytable_wednesday($savewednesday);
		
		
		$thursday=$this->input->post('thursday');
		    $th1=(explode("-",$thursday[$x]));
		    $temp_arr3 = array($th1[0],$th1[1]);
		    $savethursday['school_id'] = $school_id;
			$savethursday['master_id'] = $classautoid;
			$savethursday['class_id'] = $class;
			$savethursday['section'] = $section;
			$savethursday['days'] = 4;
			$savethursday['timetable_date'] =$this_week_fourth;
			$savethursday['PS'] = $th1[1];
			$savethursday['PT'] = $th1[0];
			$savethursday['status'] =  $x;
			$savethursday['created_date']=date("Y-m-d H:i:s");
		$result3 = $this->TimetableModel->teacher_assign_class_weeklytable_thursday($savethursday);
		
		$friday=$this->input->post('friday');
		$ff1=(explode("-",$friday[$x]));
		    $savefriday['school_id'] = $school_id;
			$savefriday['master_id'] = $classautoid;
			$savefriday['class_id'] = $class;
			$savefriday['section'] = $section;
			$savefriday['days'] = 5;
			$savefriday['timetable_date'] =$this_week_fifth;
			$savefriday['PS'] = $ff1[1];
			$savefriday['PT'] = $ff1[0];
			$savefriday['status'] = $x;
			$savefriday['created_date']=date("Y-m-d H:i:s");
		$result4 = $this->TimetableModel->teacher_assign_class_weeklytable_friday($savefriday);
		
		$saturday=$this->input->post('saturday');
		$sa1=(explode("-",$saturday[$x]));
		    $savesaturday['school_id'] = $school_id;
			$savesaturday['master_id'] = $classautoid;
			$savesaturday['class_id'] = $class;
			$savesaturday['section'] = $section;
			$savesaturday['days'] = 6;
			$savesaturday['timetable_date'] =$this_week_sixth;
			$savesaturday['PS'] = $sa1[1];
			$savesaturday['PT'] = $sa1[0];
			$savesaturday['status'] =  $x;
			$savesaturday['created_date']=date("Y-m-d H:i:s");
		$result5 = $this->TimetableModel->teacher_assign_class_weeklytable_saturday($savesaturday);
		
		$sunday=$this->input->post('sunday');
		$su1=(explode("-",$sunday[$x]));
		    $savesunday['school_id'] = $school_id;
			$savesunday['master_id'] = $classautoid;
			$savesunday['class_id'] = $class;
			$savesunday['section'] = $section;
			$savesunday['days'] = 7;
			$savesunday['timetable_date'] =$this_week_ed;
			$savesunday['PS'] = $su1[1];
			$savesunday['PT'] = $su1[0];
			$savesunday['status'] =  $x;
			$savesunday['created_date']=date("Y-m-d H:i:s");
		   $result6 = $this->TimetableModel->teacher_assign_class_weeklytable_sunday($savesunday);
		
		 }
		}
		/* weekly time table */  
		$data['timetable_marked']  = $this->TimetableModel->getmarked_timetable($school_id,$classid,$sectionid,$this_week_fst);
		
	    $data['timetabledetails_monday']  = $this->TimetableModel->getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst);
		
        $data['timetabledetails_tuesday'] = $this->TimetableModel->getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second);
		
		$data['timetabledetails_wednesday'] =$this->TimetableModel->getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third);
		
		$data['timetabledetails_thursday'] = $this->TimetableModel->getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth);
		$data['timetabledetails_friday'] = $this->TimetableModel->getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth);
		$data['timetabledetails_saturday'] = $this->TimetableModel->getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth);
		$data['timetabledetails_sunday'] = $this->TimetableModel->getweektimetable_data_sunday($school_id,$classid,$sectionid, $this_week_ed);
		$data['timetablecount'] = $this->TimetableModel->getweektimetable_count($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed);
		$today= date("Y-m-d H:i:s");
		
		$data['timetablecountteacher'] = $this->TimetableModel->getweektimetable_count_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid);
		
		$data['countvolunteacherteacher'] = $this->TimetableModel->getweektimetable_count_volunteers_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid);
		/* End of weekly time table */ 
 		
		/**************/
		/*Load term*/
		/*************/
		$termid=1;
		$data['termtimetable_marked']  = $this->TimetableModel->getmarked_term_timetable($school_id,$classid,$sectionid,$termid);
		
		 $data['termtimetabledetails_monday'] = $this->TimetableModel->gettimetable_data_monday($school_id,$termid,$classid,$sectionid);
		
       $data['termtimetabledetails_tuesday'] = $this->TimetableModel->gettimetable_data_tuesday($school_id,$termid,$classid,$sectionid);
       $data['termtimetabledetails_wednesday'] = $this->TimetableModel->gettimetable_data_wednesday($school_id,$termid,$classid,$sectionid);
		$data['termtimetabledetails_thursday'] = $this->TimetableModel->gettimetable_data_thursday($school_id,$termid,$classid,$sectionid);
		$data['termtimetabledetails_friday'] = $this->TimetableModel->gettimetable_data_friday($school_id,$termid,$classid,$sectionid);
		$data['termtimetabledetails_saturday'] = $this->TimetableModel->gettimetable_data_saturday($school_id,$termid,$classid,$sectionid);
		$data['termtimetabledetails_sunday'] = $this->TimetableModel->gettimetable_data_sunday($school_id,$termid,$classid,$sectionid);
		/* End of term time table */ 
	
		/**************/
		/*Load Previous week  Timetable /*
		/*************/
		$data['copypreviousweek_monday'] = $this->TimetableModel->getpreviousweek_data_monday($school_id,$classid,$sectionid,$previous_week_fst);
        $data['copyprevoiusweek_tuesday'] = $this->TimetableModel->getpreviousweek_data_tuesday($school_id,$classid,$sectionid,$previous_week_second);
        $data['copypreviousweek_wednesday'] = $this->TimetableModel->getpreviousweek_data_wednesday($school_id,$classid,$sectionid,$previous_week_third);
		$data['copypreviousweek_thursday'] = $this->TimetableModel->getpreviousweek_data_thursday($school_id,$classid,$sectionid,$previous_week_fourth);
		$data['copypreviousweek_friday'] = $this->TimetableModel->getpreviousweek_data_friday($school_id,$classid,$sectionid,$previous_week_fifth);
		$data['copypreviousweek_saturday'] = $this->TimetableModel->getpreviousweek_data_saturday($school_id,$classid,$sectionid,$previous_week_sixth);
		$data['copypreviousweek_sunday'] = $this->TimetableModel->getpreviousweek_data_sunday($school_id,$classid,$sectionid,$previous_week_ed);
		$data['copytimetablecount'] = $this->TimetableModel->gettimetable_count($school_id,$termid,$classid,$sectionid,$previous_week_fst,$previous_week_ed);
		$data['copytimetablecountteacher'] = $this->TimetableModel->gettimetable_count_teacher($school_id,$termid,$classid,$sectionid,$previous_week_fst,$previous_week_ed);
		/**************/
		/*End Of the Function/*
		/*************/

        $this->load->view('Timetable/weeklyTimeTable',$data);
    }
	public function getlastweektimetable_post()
	{
		$records = $this->post('records'); 
		
		$school_id = $records['school_id']; 
        $classid = $records['forminputs']['class']; 
		$sectionid = $records['forminputs']['section']; 
		
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		 $data['this_week_fst']= $this_week_fst;
		 $data['this_week_ed']= $this_week_ed;
         $date = $this_week_fst;
		 $previous_week_fst=date('Y-m-d', strtotime($date. ' - 7 days'));
		 $previous_week_second=date('Y-m-d', strtotime($date. ' - 6 days'));
		 $previous_week_third=date('Y-m-d', strtotime($date. ' - 5 days'));
		 $previous_week_fourth=date('Y-m-d', strtotime($date. ' - 4 days'));
		 $previous_week_fifth=date('Y-m-d', strtotime($date. ' - 3 days'));
		 $previous_week_sixth=date('Y-m-d', strtotime($date. ' - 2 days'));
		 $previous_week_ed=date('Y-m-d', strtotime($date. ' - 1 days'));
		 
		 // $previous_week_fst='2019-11-04';
         // $previous_week_second='2019-11-05';	
		 // $previous_week_third='2019-11-06';
		 // $previous_week_fourth='2019-11-07';
         // $previous_week_fifth='2019-11-08';	
        //  $previous_week_sixth='2019-11-09';
		//  $previous_week_ed='2019-11-10';
		 $teacherslist = $this->TimetableModel->getteachers($school_id);
		$copypreviousweek_monday= $this->TimetableModel->getpreviousweek_data_monday($school_id,$classid,$sectionid,$previous_week_fst);
        $copyprevoiusweek_tuesday = $this->TimetableModel->getpreviousweek_data_tuesday($school_id,$classid,$sectionid,$previous_week_second);
        $copypreviousweek_wednesday = $this->TimetableModel->getpreviousweek_data_wednesday($school_id,$classid,$sectionid,$previous_week_third);
		$copypreviousweek_thursday= $this->TimetableModel->getpreviousweek_data_thursday($school_id,$classid,$sectionid,$previous_week_fourth);
		$copypreviousweek_friday = $this->TimetableModel->getpreviousweek_data_friday($school_id,$classid,$sectionid,$previous_week_fifth);
		$copypreviousweek_saturday= $this->TimetableModel->getpreviousweek_data_saturday($school_id,$classid,$sectionid,$previous_week_sixth);
		$copypreviousweek_sunday = $this->TimetableModel->getpreviousweek_data_sunday($school_id,$classid,$sectionid,$previous_week_ed);
		$copytimetablecount= $this->TimetableModel->gettimetable_count($school_id,$classid,$sectionid,$previous_week_fst,$previous_week_ed);
		//$copytimetablecountteacher= $this->TimetableModel->gettimetable_count_teacher($school_id,$termid,$classid,$sectionid,$previous_week_fst,$previous_week_ed);
	
	if(count($copytimetablecount))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherslist'] = $teacherslist;
				$data['classdetails'] = $classDetails;
				$data['schoolid']=$school_id;
				$data['classid']=$classid;
				$data['sectionid']=$sectionid;
				
				$data['timetabledetails_monday']=$copypreviousweek_monday;
				$data['timetabledetails_tuesday']=$copyprevoiusweek_tuesday;
				$data['timetabledetails_wednesday']=$copypreviousweek_wednesday;
				$data['timetabledetails_thursday']=$copypreviousweek_thursday;
				$data['timetabledetails_friday']=$copypreviousweek_friday;
				$data['timetabledetails_saturday']=$copypreviousweek_saturday;
				$data['timetabledetails_sunday']=$copypreviousweek_sunday;
				$data['count_lastweek']=$copytimetablecount;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
	
	}
	public function todaytimetable_get()
	{
		
		//$records = $this->post('records'); 
        $school_id = $this->get('school_id'); 
		$today=date("Y-m-d");
		$data['currentdate']=$today;
		
		 //$school_category = $this->TimetableModel->get_school_category($school_id);
		// $sch_cate=$school_category[0]->cate_type;
		
		//if($sch_cate=='Higher Secondary School')
		//{
		//	$tablename='schoolnew_timetable_weekle_highersec_school';
		//}
		//else if($sch_cate=='High School')
		//{
			//$tablename='schoolnew_timetable_weekle_highschool';
		//}
		//else
		//{
		//	$tablename='schoolnew_timetable_weekle_middleschool';
		//}
		$timetabledetails_today = json_decode(json_encode($this->TimetableModel->gettimetable_data_today($today,$school_id)),true);
	    $leave_status = json_decode(json_encode($this->TimetableModel->gettimetable_leave_status($today,$school_id)),true);
		//print_r();
		 $result = [];$key='clas';
		 $result1 = [];$key='clas';
		 $per_class = '';
		 $i = 0;
                              foreach( $timetabledetails_today as $index=>$time_today) {
								  
								  $class_name = $time_today['clas'];
								  $status = $time_today['status'];
								  
								  
									 if($per_class !=$class_name){ 
                                  //$result['clas'][$i][$key] = $class_name;
								  $i++;
									 }
								  	 
								// $result['teach'][$class_name]['status']=$status;
								  $result[$class_name]['attstatus'.$status]=$time_today['attstatus'];
                                  $result[$class_name]['p'.$status]=$time_today['id'].'-'.$time_today['teacher_code'];
								  //$result['teach'][$class_name]['teacher_code'.$status]=$time_today['teacher_code'];
								//  $result['teach'][$class_name]['subjects'.$status]=$time_today['subjects'];
								//  $result['teach'][$class_name]['teacher_name'.$status]=$time_today['teacher_name'];
								  //$result['teach'][$class_name]['status']=$status;
								  
								  $per_class = $class_name;
                               } 
							   
								
							  // print_r($result);
		$teacherslist= $this->TimetableModel->gettodayteachers($school_id);	
        $deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);			
		$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);					   
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['leavestatus']=$leave_status;
                $data['timetabledetails_today'] = $result;
				 $data['timetabledetails_today_attstatus'] = $result1;
			    $data['teacherslist'] = $teacherslist;
				 $data['volunteerteachers'] = $volunteerteachers;
				 $data['deputationteachers'] = $deputationteachers;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
			
                                  		
										//print_r($data['timetabledetails_today']);
         									
		// $data['teacher_data'] =json_decode(json_encode( $this->TimetableModel->getteacher_data_today($school_id,$today)),true);
		 
		     // $result = array();$key='teacher_name';
			  
                              // foreach( $data['teacher_data'] as $teach) {
                                  // if(array_key_exists($key, $teach)){
                                       // $result[$teach[$key]][] = $teach;
                                  // }else{
                                      // $result[""][] = $teach;
                                  // }
                               // } 
                                                                   
       // $data['teacher_data']=$result;
		
		 
		//$data['Teacherslist'] = $this->TimetableModel->gettodayteachers($school_id);
		//print_r($data['Teacherslist']);
		//$this->load->view('Timetable/viewtodaytimetable',$data);
	}
	
	public function getteacher_todayclasses_get()
	{
		//$records = $this->post('records'); 
        $school_id = $this->get('school_id'); 
		
		// $school_category = $this->TimetableModel->get_school_category($school_id);
		// $sch_cate=$school_category[0]->cate_type;
		
		//if($sch_cate=='Higher Secondary School')
		//{
		//	$tablename='schoolnew_timetable_weekle_highersec_school';
		//}
		//else if($sch_cate=='High School')
		//{
		//	$tablename='schoolnew_timetable_weekle_highschool';
		//}
		//else
		//{
		//	$tablename='schoolnew_timetable_weekle_middleschool';
		//}
		$today=date("Y-m-d");
		$data['currentdate']=$today;
		/* for grtting teacher absent list  */
                               $data['teacher_data'] =json_decode(json_encode( $this->TimetableModel->getteacher_data_today($school_id,$today)),true);
		                      
		                       $result = array();$key='teacher_name';
			                     $result1 = array();$key='teacher_name';
                                foreach( $data['teacher_data'] as $teach) {
                                    if(array_key_exists($key, $teach)){
                                         $result1[$teach[$key]][] = $teach;
                                    }else{
                                        $result1[""][] = $teach;
                                    }
                                }  
                                                                   
                          $teacher_data=$result1;
						  $teacherslist= $result;					   
							   
		 if(count($teacher_data))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['teacherdata'] = $teacherslist;
				$data['teacher_data'] = $teacher_data;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }		
		
		
	}
    public function saveholidays()
	{
		
		$holidaysrecord=$this->post('records');
		$leavedate=$holidaysrecord['date'];
		$reason=$holidaysrecord['reason'];
		$leavestatus='yes';
		$result1 = $this->TimetableModel->assign_leave_timetable_allschool($leavedate,$leavestatus);
		//$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $leavedate;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");
        //$saveholidays['master_id']=0;		
		//$saveholidays['class_id']=0;
		//$saveholidays['section']=0;
        //$saveholidays['periods']=$y;
        $saveholidays['leavestatus']='FS';	
		$result2 = $this->TimetableModel->assign_holidays($saveholidays);
		
	}	
public function holidays_list()
{
	$leavelist= $this->TimetableModel->getleave();
	 if(count($leavelist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
			    $data['holidaylist'] = $leavelist;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
}	
	public function todaytimetableteacherreport()
	{
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		 $data['timetablecountteacher'] = $this->TimetableModel->getweektimetable_count_teacher_all_class($school_id,$this_week_fst,$this_week_ed);
		 //print_r($data['timetablecountteacher']);
		 $data['timetablecountvolunteacherteacher'] = $this->TimetableModel->getweektimetable_count_volunteers_teacher_all_class($school_id,$this_week_fst,$this_week_ed);
		 //print_r($data['timetablecountvolunteacherteacher'] );
		 $this->load->view('Timetable/viewtodayteacherreport',$data);
		
	}
	public function viewWeeklyTimeTable()
	{
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		 $this->load->model('TimetableModel');
		 $classid = $this->input->post('classid');
		 $sectionid = $this->input->post('section');
		 
		 
		 $week= $this->input->post('week');
		 $weekno=(explode("-W",$week));
		 $year=$weekno[0];
		 $week_no=$weekno[1];
		 $data['year']=$year;
		 $data['week']=$week_no;
		
		 function getStartAndEndDate($week_no,$year) {
				  $dto = new DateTime();
				  if($year!='')
				  {
				  $dto->setISODate($year,$week_no);
				  }
				  else
				  {
				  $dto = new DateTime();
				  $year_number  = date("Y", strtotime('now'));
				  $week_number  = date("W", strtotime('now'));				  
				  $dto->setISODate($year_number,$week_number);
                  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
				  }
				  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
                   }
	  
	  $week_array = getStartAndEndDate($week_no,$year);
		
   
        //print_r($week_array);
		$this_week_fst=$week_array['week_start'];
		$this_week_ed=$week_array['week_end'];
		$data['this_week_fst']=$this_week_fst;
		$data['this_week_ed']=$this_week_ed;
		$this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		if(empty($classid))
		{
		$class= $this->TimetableModel->getclasslist($school_id,$this_week_fst,$this_week_ed);
		//print_r($class);
							if(empty($class))
							{
							$classlist= $this->TimetableModel->getclasslist_section_group($school_id);
                             $classid=$classlist[0]->class_id;
							$sectionid=$classlist[0]->section;							
							}
							else
								{
							$classid=$class[0]->class_id;
							$sectionid=$class[0]->section;
							  }
		}
		 $data['class']=$classid;
		 $data['section']=$sectionid;
		 $periodscount = $this->TimetableModel->getperoids($school_id,$classid );
		 $data['noofperiods']= $periodscount[0]->periods_count;
         $data['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
		 $data['classsectionDetails'] = $this->TimetableModel->getClasssectionDetail($school_id);
         $data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
		 $data['Teacherslist'] = $this->TimetableModel->getteachers($school_id);

		$noofperiods=$this->input->post('periodscount');
	    $data['timetabledetails_monday'] = $this->TimetableModel->getweektimetable_data_monday($school_id,$classid,$sectionid,$this_week_fst);
	   // print_r($data['timetabledetails_monday']);
       $data['timetabledetails_tuesday'] = $this->TimetableModel->getweektimetable_data_tuesday($school_id,$classid,$sectionid,$this_week_second);
       $data['timetabledetails_wednesday'] = $this->TimetableModel->getweektimetable_data_wednesday($school_id,$classid,$sectionid,$this_week_third);
	  
	   
		$data['timetabledetails_thursday'] = $this->TimetableModel->getweektimetable_data_thursday($school_id,$classid,$sectionid,$this_week_fourth);
		$data['timetabledetails_friday'] = $this->TimetableModel->getweektimetable_data_friday($school_id,$classid,$sectionid,$this_week_fifth);
		$data['timetabledetails_saturday'] = $this->TimetableModel->getweektimetable_data_saturday($school_id,$classid,$sectionid,$this_week_sixth);
		$data['timetabledetails_sunday'] = $this->TimetableModel->getweektimetable_data_sunday($school_id,$classid,$sectionid, $this_week_ed);
		$data['timetablecount'] = $this->TimetableModel->getweektimetable_count($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed);
		$data['timetablecountteacher'] = $this->TimetableModel->getweektimetable_count_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid);
        $data['countvolunteacherteacher'] = $this->TimetableModel->getweektimetable_count_volunteers_teacher($school_id,$this_week_fst,$this_week_ed,$classid,$sectionid);
        $this->load->view('Timetable/viewtimetable',$data);
		 
	}
	
	public function assign_holidays() {
		
        $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$data['details'] = $this->TimetableModel->getallclasssections($school_id);
        //$data['Teacherslist'] = $this->TimetableModel->getteachers($school_id);
		$data['leavelist'] = $this->TimetableModel->getleave($school_id);
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
		$data['leavelistweek'] = $this->TimetableModel->getleave_thisweek($school_id,$this_week_fst,$this_week_ed);
        $this->load->view('Timetable/assign_holidays',$data);
    }
	public function copy_term_timetable()
	{
	 $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		
        
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
		$data['details'] = $this->TimetableModel->assignedtermclasses($school_id,$this_week_fst,$this_week_ed);
        $this->load->view('Timetable/copy_all_term',$data);	
	}
	public function checktermtimetable()
	{
	    $this->load->model('TimetableModel');
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$classid=$this->input->post('classid');
		$section=$this->input->post('section');
		$termtimetable =$this->TimetableModel->termtimetable_details($school_id,$classid,$section);
		echo json_encode($termtimetable);	
	}
	public function checklastweektimetable()
	{
	    $this->load->model('TimetableModel');
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$classid=$this->input->post('classid');
		$section=$this->input->post('section');
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		 $data['this_week_fst']= $this_week_fst;
		 $data['this_week_ed']= $this_week_ed;
         $date = $this_week_fst;
		 $previous_week_fst=date('Y-m-d', strtotime($date. ' - 7 days'));
		 $previous_week_ed=date('Y-m-d', strtotime($date. ' - 1 days'));
		 
		 $lastweek =$this->TimetableModel->lastweektimetable_details($school_id,$classid,$section,$previous_week_fst,$previous_week_ed);
		echo json_encode($lastweek);	
	}
	public function copysave_term_timetable()
	{
	    $this->load->model('TimetableModel');
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$classid=$this->input->post('classid');
		$section=$this->input->post('section');
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
		$data['this_week_fst']=$this_week_fst;
		$data['this_week_ed']=$this_week_ed;
		$this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		$mondayterm =$this->TimetableModel->getterm_details_monday($school_id,$classid,$section);
		$tuesdayterm =$this->TimetableModel->getterm_details_tuesday($school_id,$classid,$section);
		//print_r($tuesdayterm);
		$wednesdayterm =$this->TimetableModel->getterm_details_wednesday($school_id,$classid,$section);
		$thursdayterm =$this->TimetableModel->getterm_details_thursday($school_id,$classid,$section);
		$fridayterm =$this->TimetableModel->getterm_details_friday($school_id,$classid,$section);
		$saturdayterm =$this->TimetableModel->getterm_details_saturday($school_id,$classid,$section);
		$sundayterm =$this->TimetableModel->getterm_details_sunday($school_id,$classid,$section);
		$noofperiods=8;
		$timetablecount = $this->TimetableModel->weektimetable_count_data($school_id,$this_week_fst,$classid,$section);
		  $ttdata= $timetablecount[0]->countdata;
		  if($ttdata > 0) 
		{
			$data['timetabledetails_delete'] = $this->TimetableModel->weektimetable_data_delete($school_id,$classid,$section,$this_week_fst,$this_week_ed);
		}
		for ($x = 1; $x <=$noofperiods; $x++) 
		{
		    
		    $savemonday['school_id'] = $school_id;
			$savemonday['class_id'] = $classid;
			$savemonday['section'] = $section;
			$savemonday['days'] = 1;
			$savemonday['timetable_date'] =$this_week_fst;
			$savemonday['PS'] = $mondayterm[$x-1]->PS;
			$savemonday['PT'] = $mondayterm[$x-1]->PT;
			$savemonday['status'] = $x;
            $savemonday['created_date']= date("Y-m-d H:i:s");
	    		
		$result = $this->TimetableModel->teacher_assign_class_weeklytable_monday($savemonday);
		    $savetuesday['school_id'] = $school_id;
			$savetuesday['class_id']  = $classid;
			$savetuesday['section']   = $section;
			$savetuesday['days'] = 2;
			$savetuesday['timetable_date'] =$this_week_second;
			$savetuesday['PS'] = $tuesdayterm[$x-1]->PS;
			$savetuesday['PT'] = $tuesdayterm[$x-1]->PT;
			$savetuesday['status'] =  $x;
			$savetuesday['created_date']=date("Y-m-d H:i:s");
		$result1 = $this->TimetableModel->teacher_assign_class_weeklytable_tuesday($savetuesday);
		
		 $savewednesday['school_id'] = $school_id;
			
			$savewednesday['class_id'] = $classid;
			$savewednesday['section'] = $section;
			$savewednesday['days'] = 3;
			$savewednesday['timetable_date'] =$this_week_third;
			$savewednesday['PS'] = $wednesdayterm[$x-1]->PS;
			$savewednesday['PT'] = $wednesdayterm[$x-1]->PT;
			$savewednesday['status'] =  $x;
			$savewednesday['created_date']=date("Y-m-d H:i:s");
		$result2 = $this->TimetableModel->teacher_assign_class_weeklytable_wednesday($savewednesday);
		
		    
		    $savethursday['school_id'] = $school_id;
			$savethursday['class_id'] = $classid;
			$savethursday['section'] = $section;
			$savethursday['days'] = 4;
			$savethursday['timetable_date'] =$this_week_fourth;
			$savethursday['PS'] = $thursdayterm[$x-1]->PS;
			$savethursday['PT'] = $thursdayterm[$x-1]->PT;
			$savethursday['status'] =  $x;
			$savethursday['created_date']=date("Y-m-d H:i:s");
		$result3 = $this->TimetableModel->teacher_assign_class_weeklytable_thursday($savethursday);
		
		    $savefriday['school_id'] = $school_id;
			$savefriday['class_id'] = $classid;
			$savefriday['section'] = $section;
			$savefriday['days'] = 5;
			$savefriday['timetable_date'] =$this_week_fifth;
			$savefriday['PS'] = $fridayterm[$x-1]->PS;
			$savefriday['PT'] = $fridayterm[$x-1]->PT;
			$savefriday['status'] = $x;
			$savefriday['created_date']=date("Y-m-d H:i:s");
		$result4 = $this->TimetableModel->teacher_assign_class_weeklytable_friday($savefriday);
		
		   $savesaturday['school_id'] = $school_id;
			$savesaturday['class_id'] = $classid;
			$savesaturday['section'] = $section;
			$savesaturday['days'] = 6;
			$savesaturday['timetable_date'] =$this_week_sixth;
			$savesaturday['PS'] = $saturdayterm[$x-1]->PS;
			$savesaturday['PT'] = $saturdayterm[$x-1]->PT;
			$savesaturday['status'] =  $x;
			$savesaturday['created_date']=date("Y-m-d H:i:s");
		$result5 = $this->TimetableModel->teacher_assign_class_weeklytable_saturday($savesaturday);
		
		    $savesunday['school_id'] = $school_id;
			
			$savesunday['class_id'] = $classid;
			$savesunday['section'] = $section;
			$savesunday['days'] = 7;
			$savesunday['timetable_date'] =$this_week_ed;
			$savesunday['PS'] = $sundayterm[$x-1]->PS;
			$savesunday['PT'] = $sundayterm[$x-1]->PT;
			$savesunday['status'] =  $x;
			$savesunday['created_date']=date("Y-m-d H:i:s");
		   $result6 = $this->TimetableModel->teacher_assign_class_weeklytable_sunday($savesunday);
		echo $result;	
		}
	}
		public function copysave_lastweek_timetable()
	{
	    $this->load->model('TimetableModel');
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$classid=$this->input->post('classid');
		$section=$this->input->post('section');
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        $this_week_fst = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
		$date = $this_week_fst;
		 $previous_week_fst=date('Y-m-d', strtotime($date. ' - 7 days'));
		 $previous_week_ed=date('Y-m-d', strtotime($date. ' - 1 days'));
		 $previous_week_second=date('Y-m-d', strtotime($date. ' - 6 days'));
		 $previous_week_third=date('Y-m-d', strtotime($date. ' - 5 days'));
		 $previous_week_fourth=date('Y-m-d', strtotime($date. ' - 4 days'));
		 $previous_week_fifth=date('Y-m-d', strtotime($date. ' - 3 days'));
		 $previous_week_sixth=date('Y-m-d', strtotime($date. ' - 2 days'));
		 
		 
		$this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		$lastweekmonday =$this->TimetableModel->getlastweek_details_monday($school_id,$classid,$section,$previous_week_fst);
		$lastweektuesday =$this->TimetableModel->getlastweek_details_tuesday($school_id,$classid,$section,$previous_week_second);
		$lastweekwednesday =$this->TimetableModel->getlastweek_details_wednesday($school_id,$classid,$section,$previous_week_third);
		$lastweekthursday =$this->TimetableModel->getlastweek_details_thursday($school_id,$classid,$section,$previous_week_fourth);
		$lastweekfriday=$this->TimetableModel->getlastweek_details_friday($school_id,$classid,$section,$previous_week_fifth);
		$lastweeksaturday=$this->TimetableModel->getlastweek_details_saturday($school_id,$classid,$section,$previous_week_sixth);
		$lastweeksunday=$this->TimetableModel->getlastweek_details_sunday($school_id,$classid,$section,$previous_week_ed);
		$noofperiods=8;
		
		$timetablecount = $this->TimetableModel->weektimetable_count_data($school_id,$this_week_fst,$classid,$section);
		  $ttdata= $timetablecount[0]->countdata;
		  if($ttdata > 0) 
		{
			$data['timetabledetails_delete'] = $this->TimetableModel->weektimetable_data_delete($school_id,$classid,$section,$this_week_fst,$this_week_ed);
		}
		for ($x = 1; $x <=$noofperiods; $x++) 
		{
		    
		    $savemonday['school_id'] = $school_id;
			$savemonday['class_id'] = $classid;
			$savemonday['section'] = $section;
			$savemonday['days'] = 1;
			$savemonday['timetable_date'] =$this_week_fst;
			$savemonday['PS'] = $lastweekmonday[$x-1]->PS;
			$savemonday['PT'] = $lastweekmonday[$x-1]->PT;
			$savemonday['status'] = $x;
            $savemonday['created_date']= date("Y-m-d H:i:s");
	    		
		$result = $this->TimetableModel->teacher_assign_class_weeklytable_monday($savemonday);
		    $savetuesday['school_id'] = $school_id;
			$savetuesday['class_id']  = $classid;
			$savetuesday['section']   = $section;
			$savetuesday['days'] = 2;
			$savetuesday['timetable_date'] =$this_week_second;
			$savetuesday['PS'] = $lastweektuesday[$x-1]->PS;
			$savetuesday['PT'] = $lastweektuesday[$x-1]->PT;
			$savetuesday['status'] =  $x;
			$savetuesday['created_date']=date("Y-m-d H:i:s");
		$result1 = $this->TimetableModel->teacher_assign_class_weeklytable_tuesday($savetuesday);
		
		    $savewednesday['school_id'] = $school_id;
			$savewednesday['class_id'] = $classid;
			$savewednesday['section'] = $section;
			$savewednesday['days'] = 3;
			$savewednesday['timetable_date'] =$this_week_third;
			$savewednesday['PS'] = $lastweekwednesday[$x-1]->PS;
			$savewednesday['PT'] = $lastweekwednesday[$x-1]->PT;
			$savewednesday['status'] =  $x;
			$savewednesday['created_date']=date("Y-m-d H:i:s");
		$result2 = $this->TimetableModel->teacher_assign_class_weeklytable_wednesday($savewednesday);
		
		    
		    $savethursday['school_id'] = $school_id;
			$savethursday['class_id'] = $classid;
			$savethursday['section'] = $section;
			$savethursday['days'] = 4;
			$savethursday['timetable_date'] =$this_week_fourth;
			$savethursday['PS'] = $lastweekthursday[$x-1]->PS;
			$savethursday['PT'] = $lastweekthursday[$x-1]->PT;
			$savethursday['status'] =  $x;
			$savethursday['created_date']=date("Y-m-d H:i:s");
		$result3 = $this->TimetableModel->teacher_assign_class_weeklytable_thursday($savethursday);
		
		    $savefriday['school_id'] = $school_id;
			$savefriday['class_id'] = $classid;
			$savefriday['section'] = $section;
			$savefriday['days'] = 5;
			$savefriday['timetable_date'] =$this_week_fifth;
			$savefriday['PS'] = $lastweekfriday[$x-1]->PS;
			$savefriday['PT'] = $lastweekfriday[$x-1]->PT;
			$savefriday['status'] = $x;
			$savefriday['created_date']=date("Y-m-d H:i:s");
		$result4 = $this->TimetableModel->teacher_assign_class_weeklytable_friday($savefriday);
		
		   $savesaturday['school_id'] = $school_id;
			$savesaturday['class_id'] = $classid;
			$savesaturday['section'] = $section;
			$savesaturday['days'] = 6;
			$savesaturday['timetable_date'] =$this_week_sixth;
			$savesaturday['PS'] = $lastweeksaturday[$x-1]->PS;
			$savesaturday['PT'] = $lastweeksaturday[$x-1]->PT;
			$savesaturday['status'] =  $x;
			$savesaturday['created_date']=date("Y-m-d H:i:s");
		$result5 = $this->TimetableModel->teacher_assign_class_weeklytable_saturday($savesaturday);
		
		    $savesunday['school_id'] = $school_id;
			$savesunday['class_id'] = $classid;
			$savesunday['section'] = $section;
			$savesunday['days'] = 7;
			$savesunday['timetable_date'] =$this_week_ed;
			$savesunday['PS'] = $lastweeksunday[$x-1]->PS;
			$savesunday['PT'] = $lastweeksunday[$x-1]->PT;
			$savesunday['status'] =  $x;
			$savesunday['created_date']=date("Y-m-d H:i:s");
		   $result6 = $this->TimetableModel->teacher_assign_class_weeklytable_sunday($savesunday);
		   
		echo $result;	
		}
	}
	public function Assignholidays_school()
   	{	
        $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$holidays_date=$this->input->post('holidays_date');
		$reason=$this->input->post('reason');
		$details = $this->TimetableModel->getallclasssections($school_id);
		$leavestatus='yes';
		$result1 = $this->TimetableModel->assign_leave_timetable_allschool($school_id,$holidays_date,$leavestatus);
		$length = count($details);
		// $noofperiods=8;
		
		// for ($x = 1; $x <= $length; $x++) 
		// {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");
        $saveholidays['master_id']=0;		
		$saveholidays['class_id']=0;
		$saveholidays['section']=0;
        //$saveholidays['periods']=$y;
        $saveholidays['leavestatus']='FS';	
		
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		echo $result;
		//}
		
    }
	public function Assignholidays_school_selectedclass()
	{
		$school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$holidays_date=$this->input->post('holidays_date');
		$reason=$this->input->post('reason');
		$classsection=$this->input->post('selected_class');
		$selected_class = array_filter($classsection);
		$leavestatus='yes';
		$noofperiods=8;
		// for ($y = 1; $y <= $noofperiods; $y++) 
		// {
		foreach ($selected_class as $sl) 
		{
		$str =$sl;
        $leaveclass=explode("-",$str);
        $class_id=$leaveclass[0];
        $section=$leaveclass[1];
        $masterid=$leaveclass[2];
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['section']=$section;
		$saveholidays['master_id']=$masterid;
       // $saveholidays['periods']=$y;
	    $saveholidays['leavestatus']='FD';
		$result1 = $this->TimetableModel->assign_leave_timetable_classwise($school_id,$holidays_date,$leavestatus,$class_id,$section);
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		
		echo $result;
		}
		//}
		
	}
	public function update_today_timetable_post()
	{
		$todayrecord=$this->post('records');
		//echo($todayrecord['school_id']);
		//print_r($todayrecord['timetabledata']['timeTableDays']);
		//print_r($todayrecord);
		//die();
		$school_id=$todayrecord['school_id'];
		
		 $school_category = $this->TimetableModel->get_school_category($school_id);
		 $sch_cate=$school_category[0]->cate_type;
		
		if($sch_cate=='Higher Secondary School')
		{
			$tablename='schoolnew_timetable_weekle_highersec_school';
		}
		else if($sch_cate=='High School')
		{
			$tablename='schoolnew_timetable_weekle_highschool';
		}
		else
		{
			$tablename='schoolnew_timetable_weekle_middleschool';
		}
		$todayrecord=$this->post('records');
		
		$Arraycount= count($todayrecord['timetabledata']['timeTableDays']);
		for($i=0; $i<=$Arraycount; $i++)
		{
			$record=$todayrecord['timetabledata']['timeTableDays'][$i];
			for($j=1; $j<=8; $j++)
		{
			$class=$record['class'];
			$classsec=explode("-",$class);
			$class=$classsec[0];
			$section=$classsec[1];
			$p1=$record['p'.$j];
			$updatedatafirst=explode("-",$p1);
			$updatetimetable['PS']=$updatedatafirst[0];
			$updatetimetable['PT']=$updatedatafirst[1];
			
			$period=$j;
			$result = $this->TimetableModel->update_timetable_day($school_id,$class,$section,$period,$updatetimetable,$tablename);
		    $result1 = $this->TimetableModel->update_timetable_daily($school_id,$class,$section,$period,$updatetimetable);
			
		}
		}
		 if(count($result1))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
			    $data['msg'] = 'bala!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		
		
		
	}
	public function Assignholidays_school_selectedperiod()
	{
		$school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$holidays_date=$this->input->post('holidays_date');
		$reason=$this->input->post('reason');
		$firstperiod=$this->input->post('first');
		$secondperiod=$this->input->post('second');
		$thirdperiod=$this->input->post('third');
		$fourperiod=$this->input->post('four');
		$fiveperiod=$this->input->post('five');
		$sixperiod=$this->input->post('six');
		$sevenperiod=$this->input->post('seven');
		$eightperiod=$this->input->post('eight');
		$first_class = array_filter($firstperiod);
		$leavestatus='yes';
		if(!empty($firstperiod))
		{
		foreach ($firstperiod as $sl) 
		{
		$str =$sl;
        $leaveclass=explode("-",$str);
        $class_id=$leaveclass[0];
        $section=$leaveclass[1];
        $masterid=$leaveclass[2];
		if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=1;
		$assignperiods=1;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($secondperiod))
		{
		$second_class = array_filter($secondperiod);
		foreach ($second_class as $sp) 
		{
		$str =$sp;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=2;
		$assignperiods=2;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($thirdperiod))
		{
		$third_class = array_filter($thirdperiod);
		foreach ($third_class as $tp) 
		{
		$str =$tp;
        $leaveclass=explode("-",$str);
        $class_id=$leaveclass[0];
        $section=$leaveclass[1];
        $masterid=$leaveclass[2];
		if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=3;
		$assignperiods=3;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($fourperiod))
		{
		$fourth_class = array_filter($fourperiod);
		foreach ($fourth_class as $fp) 
		{
		$str =$fp;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=4;
		$assignperiods=4;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($fiveperiod))
		{
		$fifth_class = array_filter($fiveperiod);
		foreach ($fifth_class as $fip) 
		{
		$str =$fip;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=5;
		$assignperiods=5;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($sixperiod))
		{
		$sixth_class = array_filter($sixperiod);
		foreach ($sixth_class as $sp) 
		{
		$str =$sp;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=6;
		$assignperiods=6;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		}
		}
		}
		if(!empty($sevenperiod))
		{
		$seventh_class = array_filter($sevenperiod);
		foreach ($seventh_class as $sep) 
		{
		$str =$sep;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		$saveholidays['school_id'] = $school_id;
		$saveholidays['leavedate'] = $holidays_date;
		$saveholidays['reason'] = $reason;
	    $saveholidays['created_date']=date("Y-m-d H:i:s");	
		$saveholidays['class_id']=$class_id;
		$saveholidays['master_id']=$masterid;
		$saveholidays['section']=$section;
        $saveholidays['periods']=7;
		$assignperiods=7;
		$result = $this->TimetableModel->assign_holidays($saveholidays);
		$result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		echo $result;
		 }
		}
		}
		if(!empty($eightperiod))
		{
		$eighth_class = array_filter($eightperiod);
		foreach ($eighth_class as $ep) 
		{
		 $str =$ep;
         $leaveclass=explode("-",$str);
         $class_id=$leaveclass[0];
         $section=$leaveclass[1];
         $masterid=$leaveclass[2];
		 if(!empty($masterid))
		 {
		 $saveholidays['school_id'] = $school_id;
		 $saveholidays['leavedate'] = $holidays_date;
		 $saveholidays['reason'] = $reason;
	     $saveholidays['created_date']=date("Y-m-d H:i:s");	
		 $saveholidays['class_id']=$class_id;
		 $saveholidays['master_id']=$masterid;
		 $saveholidays['section']=$section;
         $saveholidays['periods']=8;
		 $assignperiods=8;
		 $result = $this->TimetableModel->assign_holidays($saveholidays);
		 $result1 = $this->TimetableModel->assign_leave_timetable($school_id,$holidays_date,$leavestatus,$class_id,$section,$assignperiods);
		 echo $result;
		 }
		}
		}
	}
	public function deleteleave()
	{
		$this->load->model('TimetableModel');
		$deleteid=$this->input->post('deleteid');
		$result = $this->TimetableModel->delete_holidays($deleteid);
		echo $result;
	}
	public function get_leave_details()
	{
	    $this->load->model('TimetableModel');
		$school_id = $school_id=$this->session->userdata('emis_school_id');
		$holidaydate=$this->input->post('holidays_date');
		$leavedetails =$this->TimetableModel->holidays_details($school_id,$holidaydate);
		echo json_encode($leavedetails);	
	}
	public function TeacherAssignClassWise() {
		
        $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$data['details'] = $this->TimetableModel->getallclasssections($school_id);
        //$data['Teacherslist'] = $this->TimetableModel->getteachers($school_id);
		//print_r($data['Teacherslist']);
        $this->load->view('Timetable/emis_teacher_assign_class',$data);
    }
	
	public function TeacherAssignClass() {
		
        $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$data['details'] = $this->TimetableModel->getallclasssections($school_id);
        //$data['Teacherslist'] = $this->TimetableModel->getteachers($school_id);

		$data['classDetails'] = $this->TimetableModel->getClasssectionDetail($school_id);
         //print_r( $data['classDetails']);
		 
        $this->load->view('Timetable/teacherassignclass',$data);
    }
	 public function timetable_assign_classes() 
	 {
		$school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

         $sunday = strtotime(date("Y-m-d",$monday)." +6 days");

         $this_week_fst = date("Y-m-d",$monday);
         $this_week_ed = date("Y-m-d",$sunday);
        $data['classassignDetails'] = $this->TimetableModel->getassignClassDetail($school_id,$this_week_fst,$this_week_ed);
        $this->load->view('Timetable/timetable_assign_class',$data);
	 }
	public function timetable_assign_class_list() 
	   {
		$school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		$week= $this->input->post('week');
			
		 $weekno=(explode("-W",$week));
		 
		 $year=$weekno[0];
		 $week_no=$weekno[1];
		 $data['year']=$year;
		 $data['week']=$week_no;
		
		 function getStartAndEndDate($week_no,$year) {
				  $dto = new DateTime();
				  if($year!='')
				  {
				  $dto->setISODate($year,$week_no);
				  }
				  else
				  {
				  $year_number  = date("Y", strtotime('now'));
				  $week_number  = date("W", strtotime('now'));					
				  $dto->setISODate($year_number,$week_number);  
				  }
				  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
                   }
	
	  $week_array = getStartAndEndDate($week_no,$year);
		
		$this_week_fst=$week_array['week_start'];
		$this_week_ed=$week_array['week_end'];
        $data['classassignlist'] = $this->TimetableModel->getassignClasslist($school_id,$this_week_fst,$this_week_ed);
		//print_r($data['classassignlist']);
        $this->load->view('Timetable/timetable_assign_class_list',$data);
	   }
	public function teacher_assign_class(){
		
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) {
					$teacher_code = $this->input->post('records[teachercode]');
					$count=$this->TimetableModel->teacher_checking($teacher_code);
					$teachercount=$count[0]->number;
		if($teachercount==1)
		{
		$data = array(
	       'school_key_id' => $this->session->userdata('emis_school_id'),
		   'udise_code'=> $this->input->post('records[udisecode]'),
		   'teacher_code'=>$this->input->post('records[teachercode]'),
		   'teacher_id'=>$this->input->post('records[uid]'),
		   'teacher_name'=>$this->input->post('records[teachername]'),
		   'subject_id1'=>$this->input->post('records[subid1]'),
           'subject_name1' => $this->input->post('records[subject1]'),
		   'class_name1'=>implode(",",$this->input->post('records[classname1]')),
		   'subject_id2'=>$this->input->post('records[subid2]'),
           'subject_name2' =>$this->input->post('records[subject2]'),
		   'class_name2'=>implode(",",$this->input->post('records[classname2]')),
		   'subject_id3'=>$this->input->post('records[subid3]'),
           'subject_name3' => $this->input->post('records[subject3]'),
		   'class_name3'=>implode(",",$this->input->post('records[classname3]')),
		   'created_date' => date("Y-m-d H:i:s")
            );
			$result = $this->TimetableModel->assign_teacher_data_update($teacher_code,$data);
			echo $result;	
		}
		else
		{
     
     
        $data = array(
	        'school_key_id' => $this->session->userdata('emis_school_id'),
		   'udise_code'=> $this->input->post('records[udisecode]'),
		   'teacher_code'=>$this->input->post('records[teachercode]'),
		   'teacher_id'=>$this->input->post('records[uid]'),
		   'teacher_name'=>$this->input->post('records[teachername]'),
		   'subject_id1'=>$this->input->post('records[subid1]'),
           'subject_name1' => $this->input->post('records[subject1]'),
		   'class_name1'=>implode(",",$this->input->post('records[classname1]')),
		   'subject_id2'=>$this->input->post('records[subid2]'),
           'subject_name2' =>$this->input->post('records[subject2]'),
		   'class_name2'=>implode(",",$this->input->post('records[classname2]')),
		   'subject_id3'=>$this->input->post('records[subid3]'),
           'subject_name3' => $this->input->post('records[subject3]'),
		   'class_name3'=>implode(",",$this->input->post('records[classname3]')),
		   'created_date' => date("Y-m-d H:i:s")
            );
			
			$result = $this->TimetableModel->assign_teacher_data($data);
			echo $result;
	      }
		}
        else { redirect('/', 'refresh'); }	
		
	}

    
	public function getSectionDetails() {
        $school_id=$this->session->userdata('emis_school_id');
		$selClass = $this->input->get('selClass');
        $this->load->model('TimetableModel');
        $result = $this->TimetableModel->getSectionDetail($selClass, $school_id);
        $section = '[';
        $count = 0;
        foreach ($result as $value) {
            if ($count != 0) {
                $section .= ',';
            }$count++;
            $section .= '{id:\'' . $value->text . '\',text:\'' . $value->text . '\'}';
        }
        echo $section . ']';
    }
	
	public function get_teacherlist_all_get()
	{
		 $school_id =  $this->get('school_id');   
		$teacherslist= $this->TimetableModel->getTeacherlist($school_id);	
        //$deputationteachers= $this->TimetableModel->getdeputationteachers($school_id);			
		//$volunteerteachers=$this->TimetableModel->getvolunteerteachers($school_id);					   
		 if(count($teacherslist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
			    $data['teacherslist'] = $teacherslist;
				//$data['volunteerteachers'] = $volunteerteachers;
				//$data['deputationteachers'] = $deputationteachers;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		
	}

    public function get_week_teacherdata_post() {
		
		$records = $this->post('records'); 
		$school_id = $records['school_id']; 
		$school_category = $this->TimetableModel->get_school_category($school_id);
		$sch_cate=$school_category[0]->cate_type;
		if($sch_cate=='Higher Secondary School')
		{
			$tablename='schoolnew_timetable_weekle_highersec_school';
		}
		else if($sch_cate=='High School')
		{
			$tablename='schoolnew_timetable_weekle_highschool';
		}
		else
		{
			$tablename='schoolnew_timetable_weekle_middleschool';
		}
        $teacherid = $records['forminputs']['teacher']; 
		$week = $records['forminputs']['date']; 
		
		if(empty($teacherid))
		{
		$teacher= $this->TimetableModel->getTeacherlist($school_id);
							if(empty($teacher))
							{
							$teacherid=1;	
							}
							else
								{
							$teacherid=$teacher[0]->teacher_code;
							  }
		}	
		$data['teacherid']=$teacherid;
		
		 $weekno=(explode("-W",$week));
		 $year=$weekno[0];
		 $week_no=$weekno[1];
		
		 $data['year']=$year;
		 $data['week']=$week_no;
		 function getStartAndEndDate($week_no,$year) {
				  $dto = new DateTime();
				  if($year!='')
				  {
				  $dto->setISODate($year,$week_no);
				  }
				  else
				  {
				  $dto = new DateTime();
				  $year_number  = date("Y", strtotime('now'));
				  $week_number  = date("W", strtotime('now'));				  
				  $dto->setISODate($year_number,$week_number);
                  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
				  }
				  $ret['week_start'] = $dto->format('Y-m-d');
				  $dto->modify('+6 days');
				  $ret['week_end'] = $dto->format('Y-m-d');
				  return $ret;
                   }

	  $week_array = getStartAndEndDate($week_no,$year);
		
   
       
		$this_week_fst=$week_array['week_start'];
		$data['this_week_fst']=$week_array['week_start'];
		$data['this_week_ed']=$week_array['week_end'];
		$this_week_ed=$week_array['week_end'];
		$this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));
		
		
		if(!empty($teacherid))
		{
		$Mondayclasses= $this->TimetableModel->MondayClassDetail($school_id,$teacherid,$this_week_fst,$tablename);
		$Tuesdayclasses = $this->TimetableModel->TuesdayClassDetail($school_id,$teacherid,$this_week_second,$tablename);
		$Wednesdayclasses =$this->TimetableModel->WednesdayClassDetail($school_id,$teacherid,$this_week_third,$tablename);
		$Thursdayclasses = $this->TimetableModel->ThursdayClassDetail($school_id,$teacherid,$this_week_fourth,$tablename);
		$Fridayclasses = $this->TimetableModel->FridayClassDetail($school_id,$teacherid,$this_week_fifth,$tablename);
		$Saturdayclasses = $this->TimetableModel->SaturdayClassDetail($school_id,$teacherid,$this_week_sixth,$tablename);
		$Sundayclasses =$this->TimetableModel->SundayClassDetail($school_id,$teacherid,$this_week_ed,$tablename);
		
		 
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['result'] = [$Mondayclasses,$Tuesdayclasses,$Wednesdayclasses,$Thursdayclasses,$Fridayclasses,$Saturdayclasses,$Sundayclasses];
			    // $data['result']['1'] = $Mondayclasses;
				// $data['result']['2'] = $Tuesdayclasses;
				// $data['result']['3'] = $Wednesdayclasses;
				// $data['result']['4'] = $Thursdayclasses;
				// $data['result']['5'] = $Fridayclasses;
				// $data['result']['6'] = $Saturdayclasses;
				// $data['result']['7'] = $Sundayclasses;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
		//$data['Assignclassescount'] = $this->TimetableModel->AssignClasscount($school_id,$teacherid,$this_week_fst,
		//$this_week_ed);
		//$data['periodscount'] = $this->TimetableModel->getcountperiods($teacherid,$this_week_fst,$this_week_ed);
		//$data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
		
		
        
        //$data['teacherDetails'] = $this->TimetableModel->getTeacherlist($school_id);
		
        
    }
    public function loadConfiguration() {
		$school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
        $data['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
        $data['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
        $this->load->view('Timetable/configuration',$data);
		 }
	/*	for add periods  created by Tamilbala(vit)*/
	 public function emis_school_timetable_configuration()
	 {
	 $emis_loggedin = $this->session->userdata('emis_loggedin');
	
	
    if($emis_loggedin) {
		 $updateid=$this->input->post('u_id');
		 
			 $data = array(
		 	 
		 'no_of_periods'=>$this->input->post('periods') 
		 );
		  $result = $this->TimetableModel->timetable_configuration_update($data,$updateid);
			   echo $result;
			
		
	}
	 else { redirect('/', 'refresh'); }

} 
    
	 
   
    public function loadHolidayView() {
        $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
         $result['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
        $result['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
        $dateRange = $this->weekRange(date("Y-m-d"));
        $result['startDate'] = $dateRange[0];
        $result['endDate'] = $dateRange[1];
        $result['loginName'] = $loginname;
        $this->load->view('Timetable/loadHolidayView', $result); //loadDEOHolidayView
    }
	public function loadReport() {
		$school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
        $result['classDetails'] = $this->TimetableModel->getClassDetail($school_id);
        //$result['teacherDetails'] = $this->TimetableModel->getTeacherDetail($school_id);
        $result['schoolDetails'] = $this->TimetableModel->getSchoolDetail($school_id);
        $result['loginName'] = $loginname;
        $this->load->view('report', $result);
    }


   
    public function getSchoolIdUsingUdisecode() {
		
        
        $school_id=$this->session->userdata('emis_school_id');
		$this->load->model('TimetableModel');
        $selClass = $this->input->get('selClass');
        $section = $this->input->get('section');
        $this->load->model('TimetableModel');
        $result = $this->TimetableModel->getSchoolIdUsingUdisecode($school_id, $selClass,$section);
        echo json_encode($result);
    }

    public function getSchoolIdUsingUdisecodeAndClass() {
        $school_id=$this->session->userdata('emis_school_id');
        $selClass = $this->input->get('selClass');
        $this->load->model('TimetableModel');
        $result = $this->TimetableModel->getSchoolIdUsingUdisecodeAndClass($school_id, $selClass);
		echo json_encode($result);
    }

    
 

    

    public function getTimetableDetails() 
	{
        $loginName = $this->input->get('loginName');
		
        $classNumber = $this->input->get('selClass');
        $section = $this->input->get('section');
        $term = $this->input->get('term');
        $schoolId=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
        
		
        $result['periodTimeDetails'] = $this->TimetableModel->getPeriodTimeDetail($classNumber, $schoolId, $term);
        echo json_encode($result);
    }

    
    public function getPeriodAlllocSubjectDetails() {
		
		$loginName = $this->input->get('loginName');
        $classNumber = $this->input->get('classNumber');
        $term = $this->input->get('term');
        $this->load->model('TimetableModel');
        $result = $this->TimetableModel->getPeriodAlllocSubjectDetails($loginName,$classNumber,$term);
        echo json_encode($result);
    }

    public function getPeriodTimeAlllocDetails() 
	{
        $loginName = $this->input->get('loginName');
        $classNumber = $this->input->get('classNumber');
        $term = $this->input->get('term');
        $this->load->model('TimetableModel');
        $result = $this->TimetableModel->getPeriodTimeAlllocDetails($loginName, $classNumber, $term);
        echo json_encode($result);
    }

    

    private function weekRange($date) {
        $ts = strtotime($date);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last monday', $ts);
        return array(date('Y-m-d', $start), date('Y-m-d', strtotime('next sunday', $start)));
    } 
	
	public function generate_teachertimetable_pdf()
	{
	    $teacherid=$_GET['teacherid'];
		$teachername=$this->TimetableModel->getteachername($teacherid);
		$data['teacher']=$teachername[0]->teacher_name;
        $this_week_fst=$_GET['fdate'];
        $this_week_ed=$_GET['tdate'];
		$data['fromdate']=$this_week_fst;
		$data['todate']=$this_week_ed;
        $this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));	
		$school_id=$this->session->userdata('emis_school_id');
		$schoolname=$this->TimetableModel->getschoolname($school_id);
		$data['school']=$schoolname[0]->school_name;
	    $data['Mondayclasses'] = json_decode(json_encode($this->TimetableModel->MondayClassDetail($school_id,$teacherid,$this_week_fst)),true);
		
		// print_r($data['Mondayclasses']);
		// die();
		$data['Tuesdayclasses'] = json_decode(json_encode($this->TimetableModel->TuesdayClassDetail($school_id,$teacherid,$this_week_second)),true);
		$data['Wednesdayclasses'] = json_decode(json_encode($this->TimetableModel->WednesdayClassDetail($school_id,$teacherid,$this_week_third)),true);
		$data['Thursdayclasses'] = json_decode(json_encode($this->TimetableModel->ThursdayClassDetail($school_id,$teacherid,$this_week_fourth)),true);
		$data['Fridayclasses'] = json_decode(json_encode($this->TimetableModel->FridayClassDetail($school_id,$teacherid,$this_week_fifth)),true);
		$data['Saturdayclasses'] = json_decode(json_encode($this->TimetableModel->SaturdayClassDetail($school_id,$teacherid,$this_week_sixth)),true);
		$data['Sundayclasses'] = json_decode(json_encode($this->TimetableModel->SundayClassDetail($school_id,$teacherid,$this_week_ed)),true);
		$data['Assignclassescount'] = $this->TimetableModel->AssignClasscount($school_id,$teacherid,$this_week_fst,
		$this_week_ed);
		$data['periodscount'] = $this->TimetableModel->getcountperiods($teacherid,$this_week_fst,$this_week_ed);
		// print_r($data['periodscount']);
		// die();
		//die();
			$this->m_pdf = new mpdf('ta', 'A4', '', '', 10, 10, 16, 16, 9, 9, 'L');
			$this->m_pdf->AddPage('L', '', '', '', '', 10, 10, 12, 12, 9, 9);
			// $this->m_pdf->SetDisplayMode('fullpage');
		    // $this->m_pdf = new mpdf('ta','', '', '', 5, 5, 16, 16, 8, 8, 'L');
	        $html=$this->load->view('Timetable/print_teacher_report',$data,true);
	        //  $this->m_pdf = new mpdf();
            $this->m_pdf->setTitle($teacherid.' Teacher Report');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
	}
	public function generate_weeklytimetable_pdf()
	{
	    $classid=$_GET['class'];
		
		$sectionid=$_GET['section'];
        $this_week_fst=$_GET['fdate'];
        $this_week_ed=$_GET['tdate'];
		$data['class']=$classid;
		$data['section']=$sectionid;
		$data['fromdate']=$this_week_fst;
		$data['todate']=$this_week_ed;
        $this_week_second=date('Y-m-d', strtotime($this_week_fst. ' + 1 days'));
		$this_week_third=date('Y-m-d', strtotime($this_week_fst. ' + 2 days'));
		$this_week_fourth=date('Y-m-d', strtotime($this_week_fst. ' + 3 days'));
		$this_week_fifth=date('Y-m-d', strtotime($this_week_fst. ' + 4 days'));
		$this_week_sixth=date('Y-m-d', strtotime($this_week_fst. ' + 5 days'));	
	    $school_id=$this->session->userdata('emis_school_id');
		$schoolname=$this->TimetableModel->getschoolname($school_id);
		$data['school']=$schoolname[0]->school_name;
	    $data['timetabledetails_monday_pdf']  = $this->TimetableModel->getweektimetable_data_monday_pdf($school_id,$classid,$sectionid,$this_week_fst);
		//print_r($data['timetabledetails_monday_pdf']);
		//die();
         $data['timetabledetails_tuesday_pdf'] = $this->TimetableModel->getweektimetable_data_tuesday_pdf($school_id,$classid,$sectionid,$this_week_second);
		
		$data['timetabledetails_wednesday_pdf'] =$this->TimetableModel->getweektimetable_data_wednesday_pdf($school_id,$classid,$sectionid,$this_week_third);
		
		$data['timetabledetails_thursday_pdf'] = $this->TimetableModel->getweektimetable_data_thursday_pdf($school_id,$classid,$sectionid,$this_week_fourth);
		$data['timetabledetails_friday_pdf'] = $this->TimetableModel->getweektimetable_data_friday_pdf($school_id,$classid,$sectionid,$this_week_fifth);
		$data['timetabledetails_saturday_pdf'] = $this->TimetableModel->getweektimetable_data_saturday_pdf($school_id,$classid,$sectionid,$this_week_sixth);
		$data['timetabledetails_sunday_pdf'] = $this->TimetableModel->getweektimetable_data_sunday_pdf($school_id,$classid,$sectionid, $this_week_ed);
		$data['timetablecount'] = $this->TimetableModel->getweektimetable_count($school_id,$classid,$sectionid,$this_week_fst,$this_week_ed);
		$today= date("Y-m-d H:i:s");
		
		$this->m_pdf = new mpdf('ta', 'A4', '', '', 10, 10, 16, 16, 9, 9, 'L');
			$this->m_pdf->AddPage('L', '', '', '', '', 5, 5, 8, 8, 9, 9);
	        $html=$this->load->view('Timetable/print_class_timetable',$data,true);
	        //  $this->m_pdf = new mpdf();
            $this->m_pdf->setTitle($classid.' Timetable Report');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
	}
	public function weekwiseTeacherreport() {
		
        $school_id = $school_id=$this->session->userdata('emis_school_id');
        $this->load->model('TimetableModel');
		
		 $data['weekwiseteachercount'] =json_decode(json_encode( $this->TimetableModel->getweekwise_teacher_timetablereport($school_id)),true);
		 //print_r($data['weekwiseteachercount']);
		     $result = array();$key='teacher_name';
			  
                              foreach( $data['weekwiseteachercount'] as $teach) {
                                  if(array_key_exists($key, $teach)){
                                       $result[$teach[$key]][] = $teach;
                                  }else{
                                      $result[""][] = $teach;
                                  }
                               } 
                                                                   
       $data['weekwiseteachercount']=$result;
	   $data['weekdate'] =$this->TimetableModel->getweek($school_id);
	   $data['totalweek']=count($data['weekdate']);
        $this->load->view('Timetable/weekwiseteachertimetable',$data);
    }
	public function generate_currendate_teacherpdf()
	{
	    $today=$_GET['currentdate'];
		$data['currentdate']=$today;
		 $school_id = $school_id=$this->session->userdata('emis_school_id');
		 $data['teacher_data'] =json_decode(json_encode( $this->TimetableModel->getteacher_data_today($school_id,$today)),true);
		 
		     $result = array();$key='teacher_name';
			  
                              foreach( $data['teacher_data'] as $teach) {
                                  if(array_key_exists($key, $teach)){
                                       $result[$teach[$key]][] = $teach;
                                  }else{
                                      $result[""][] = $teach;
                                  }
                               } 
                                                                   
       $data['teacher_data']=$result;
	   //print_r($data['teacher_data']);
		$this->m_pdf = new mpdf('ta', 'A4', '', '', 10, 10, 16, 16, 9, 9, 'L');
			$this->m_pdf->AddPage('L', '', '', '', '', 5, 5, 8, 8, 9, 9);
	        $html=$this->load->view('Timetable/print_today_teacher_timetable',$data,true);
	        //  $this->m_pdf = new mpdf();
            $this->m_pdf->setTitle($classid.' Today Teacher Report');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
	}
	public function generate_currendate_classpdf()
	{
	    $today=$_GET['currentdate'];
		
		 $data['currentdate']=$today;
		 $school_id = $school_id=$this->session->userdata('emis_school_id');
		 $timetabledetails_today = json_decode(json_encode($this->TimetableModel->gettimetable_data_today($school_id)),true);
	   
		 $result = [];$key='clas';
		 $per_class = '';
		
		                          $i = 0;
                                  foreach( $timetabledetails_today as $index=>$time_today) {
								   //echo"<pre>";print_r($time_today);echo"</pre>";
								  $class_name = $time_today['clas'];
								  $status = $time_today['status'];
								  
								  
									 if($per_class !=$class_name){ 
                                  $result['clas'][$i][$key] = $class_name;
								  $i++;
									 }
								  	 
								  $result['teach'][$class_name]['status']=$status;
								  $result['teach'][$class_name]['attstatus'.$status]=$time_today['attstatus'];
                                  $result['teach'][$class_name]['id'.$status]=$time_today['id'];
								  $result['teach'][$class_name]['teacher_code'.$status]=$time_today['teacher_code'];
								  $result['teach'][$class_name]['subjects'.$status]=$time_today['subjects'];
								  $result['teach'][$class_name]['teacher_name'.$status]=$time_today['teacher_name'];
								  $result['teach'][$class_name]['status']=$status;
								  
								  $per_class = $class_name;
                               } 
			
                                  		$data['timetabledetails_today'] = $result;
	   
		$this->m_pdf = new mpdf('ta', 'A4', '', '', 10, 10, 16, 16, 9, 9, 'L');
			$this->m_pdf->AddPage('L', '', '', '', '', 5, 5, 8, 8, 9, 9);
	        $html=$this->load->view('Timetable/print_today_class_timetable',$data,true);
	        //  $this->m_pdf = new mpdf();
            $this->m_pdf->setTitle($classid.' Today class Timetable Report');
            $this->m_pdf->WriteHTML($html,2);
            $this->m_pdf->Output($pdfFilePath, "I");
	}
	
	}
	?>
	
	
	
 
