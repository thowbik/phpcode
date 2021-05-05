<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Udise_staff extends REST_Controller{
    private $S3;

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper('security');
		$this->load->helper('common_helper');
		$this->load->database();
		//$this->load->model('Homemodel');
		//$this->load->model('Authmodel');
		$this->load->model('Datamodel');
		$this->load->model('Udise_staffmodel');
		$this->load->library('AWS_S3');

    }

    /***************************************************************
			Done by Magesh Ramco
	***************************************************************/
	public function updateschlstaffparttimeinstructorsforartshealthandpysicaleducation(){
       $school_udise = $this->session->userdata('emis_school_udise');
		$this->load->library('session');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if ($emis_loggedin){
			$value = $this->input->post('value');
			$school_id = $this->session->userdata('emis_school_id');
			if (true){
				$data = array(
				  "prtme_instctr" => $value
				);
				if ($this->Udise_staffmodel->updatedatastaff($data, $school_udise)){
					$result_arr['response_code'] = 1;
				}else{
				  $result_arr['response_code'] = 0;
				  $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
				}
			}else{
				$result_arr['response_code'] = - 1;
				$result_arr['error_msg'] = "Update Teaching Staff(Contract Teacher)" . " is not in the correct format.Re-check and submit again ";
			}
			echo json_encode($result_arr);
		}else{
			redirect('/', 'refresh');
		}
    }
	
	/* ✦ School staff Details master datas for Dropdown : Venba TamilMaran */
	public function schstfmasters_get() {
		 $token = Common::token();
	     $emis_loggedin = $token['status'];
	     $school_type =$token['school_type_id'];
	     $cate_id=$token['cate_id'];
	    

	    

		
					$data['dataStatus'] = true;
				 	$data['status'] = REST_Controller::HTTP_OK;
					$data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
					$data['suffix'] = $this->Udise_staffmodel->get_teacher_suffix();
					$data['teachingtype']=$this->Udise_staffmodel->get_teacher_type($school_type,$cate_id);
					$data['nonteachingtype']=$this->Udise_staffmodel->get_nonteacher_type();
					$data['bloodgroup']=$this->Datamodel->getallbloodgroup();
					$data['schooldist']=$this->Datamodel->getallachooldist();
					$data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
					$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
					//$data['office_id']=$office_id;
					$data['classtaught']=$this->Udise_staffmodel->get_teacher_classtaught($cate_id);
					$a=' where visibility=0';
					$data['academic']=$this->Udise_staffmodel->get_academic($a);
					$data['head_account']=$this->Udise_staffmodel->get_common_table_details('schoolnew_head_account');
					$data['teachersocial']=$this->Udise_staffmodel->get_techsocialcat();
					$data['professional']=$this->Udise_staffmodel->get_professional();
					$this->response($data,REST_Controller::HTTP_OK);
		
	}
			
	/* ✦ School Staff Dupute master datas for Dropdown : Venba TamilMaran */
	public function schstfdeputematers_get() {
				
				$district = $this->Udise_staffmodel->getallachooldist();
				$block  = $this->Udise_staffmodel->getallschoolblk();
				$school = $this->Udise_staffmodel->get_allschooolsbyblock($block_id);
				$office = $this->Udise_staffmodel->get_office();
				//$a=' where visibility=0';
				//$academic= $this->Udise_staffmodel->get_academic($a);
				//$teachersocial= $this->Udise_staffmodel->get_techsocialcat();
				//$professional= $this->Udise_staffmodel->get_professional();
						
			if(count($district))
			{
					$data['dataStatus'] = true;
					$data['status'] = REST_Controller::HTTP_OK;
					$data['district'] = $district;
					$data['block'] = $block;
					$data['school'] = $school;
					$data['office'] = $office;
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
		
	/* ✦ School Staff List (Teaching and Non Teaching) : Venba TamilMaran */
	public function schstflist_get()
	{	
			$school_id = $this->get('school_id');      
			$key = 'EMIS_web@2019_api';
			
			$token = Common::userToken();
			$emis_loggedin=$token['status'];
			
			if($emis_loggedin){
				$user_type_id=$token['emis_usertype'];
				// access for school/block/district/state/BEO/CEO/DEO
				if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5 || $user_type_id==6 ||$user_type_id==9 ||$user_type_id==10) {	
						$staffdetails= $this->Udise_staffmodel->get_teaching_staff_details($school_id);			    
						$staffdetailspart2 = $this->Udise_staffmodel->get_staff_part2_details($school_id);
						$regulationdata = $this->Udise_staffmodel->get_staff_part3_details($school_id);
						$deputedetails= $this->Udise_staffmodel->getdepute($school_id);
						$volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
						$subjects = $this->Udise_staffmodel->get_teacher_subjects();
									
						if(count($staffdetails))
						{
								$data['dataStatus'] = true;
								$data['status'] = REST_Controller::HTTP_OK;
								$data['teacherslist'] = $staffdetails;
								$data['staffdetailspart2']=$staffdetailspart2;
								$data['regulationdata']= $regulationdata;
								$data['subjects'] =$subjects;
								$data['deputeteachers'] = $deputedetails;
								$data['volunteersteachers']=$volunteerdetails;
								$this->response($data,REST_Controller::HTTP_OK);
						} 
						else
						{
								$data['dataStatus'] = false;
								$data['status'] = REST_Controller::HTTP_NOT_FOUND;
								$data['message'] = 'Data Not Found!';
								$this->response($data,REST_Controller::HTTP_OK);
						}    //print_r($data['staffdetails']); 
					}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'No Access for this User Type !','result'=>array()],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied. Due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
	}
			
	/* ✦ School Staff List (Deputation staffs) : Venba TamilMaran */
	public function schdeputestflist_get()
	{
			$records = $this->get('school_id'); 
			$school_id = $this->get('school_id'); 
			$deputedetails= $this->Udise_staffmodel->getdepute($school_id);
						
			if(count($deputedetails))
			{
					$data['dataStatus'] = true;
					$data['status'] = REST_Controller::HTTP_OK;
					$data['deputeteachers'] = $deputedetails;		
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

	/* ✦ School Staff List (Volunteer staffs) : Venba TamilMaran */
	public function schvolunteerstflist_get()
	{
		//$records = $this->get('school_id'); 
        $school_id = $this->get('school_id'); 
                       
        $volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
	    // print_r($volunteerdetails);
	    if(count($volunteerdetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['volunteersteachers']=$volunteerdetails;
				
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }    //print_r($data['staffdetails']);  
    }
	
    
  /*************************** Staff Training Details Report API by wesley Starts Here *********************/

  /*public function staff_training_dtls() { 
    
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if($emis_loggedin)
        {     
          $school_id =$this->session->userdata('emis_school_id');
          $academic_year = $this->input->post('academic_year');
          
          if(empty($academic_year))
          {
            $academic_year = '';
          }
          
          $data['training_staff_list'] = $this->Udise_staffmodel->get_training_staff_dtl($academic_year,$school_id);
          $data['aca_year_list'] = $this->Udise_staffmodel->get_ac_year_from_teacher_training_details();
          $data['aca_year'] = $academic_year;
          $this->load->view('Udise/emis_school_staff_training_report',$data);

    }else{redirect('/', 'refresh');}

  }*/

 	public function staff_training_dtls_post() { 
		$records = $this->post('records');
		if($records)
		$school_id = $records['emis_school_id'];
		$academic_year=$records['academic_year'];
    
		//$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($school_id)
			{
				if(empty($academic_year))
				{
				$academic_year = '';
				}				
				$data['training_staff_list'] = $this->Udise_staffmodel->get_training_staff_dtl($academic_year,$school_id);
				$data['aca_year_list'] = $this->Udise_staffmodel->get_ac_year_from_teacher_training_details();
				$data['aca_year'] = $academic_year;
				if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
                }else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'Some problems occurred, please try again.',
                                    ],REST_Controller::HTTP_OK);
                }

			}else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NOT_FOUND,
								'message' => 'Please Provide the information.',
								],REST_Controller::HTTP_OK);
			} 

	}

  /*************************** Staff Training Details Report API by wesley Ends Here *********************/

// udise staff X-editable datas

    // Update teacher name
    public function updateteachername() {
     
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $user_id = $this->session->userdata('emis_staff_uniqid');
      $school_id = $this->session->userdata('emis_school_id');
       // $user_id = 1;
      if (true)
        {
        $data = array(
          "teacher_name" => $value
        );
        if ($this->Udise_staffmodel->updatestaffregdata($data,$user_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Update Teacher Name" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }




function UpdateStaffData(){
    $fieldname=$this->uri->segment(4,0);
    $u_id=$this->uri->segment(3,0);
    $value = $this->input->post('value');
    //print_r($value);
    //die();
    $data = array(
          $fieldname => $value
    );
    
    if($this->Udise_staffmodel->updatestaffregdata($data, $u_id))
    {
        $result_arr['response_code'] = 1;
        $result_arr['district'] = $value;
    }
    else
    {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
    }

    echo json_encode($result_arr);
}
	
	// created by vit for update archive in udise_staffreg.archive//

 public function transfer_staff()
{
		      $staff_uid=$this->post('records');
			 // print_r($staff_uid);
			 // die();
			  $result =$this->Udise_staffmodel->update_transfer_id($staff_uid);
			  if(count($result))
                     {
							$data['dataStatus'] = true;
							$data['status'] = REST_Controller::HTTP_OK;
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


      public function emis_teacher_reset_password()
      {

          $update['emis_user_id']  = $this->session->userdata('emis_user_id');
          $update['temp_log'] = 1;
          $update['emis_password'] = md5($this->input->post('emis_rest_user_cnfpass'));
          $update['ref'] = $this->input->post('emis_rest_user_cnfpass');

          // print_r($update);
          $reset_data = $this->Udise_staffmodel->update_reset_password($update);
            // $reset_data = 1;
          if($reset_data){
            echo "if";
              $this->session->unset_userdata('emis_temp_log');
              $this->session->set_userdata('emis_temp_log',1);
              // print_r($this->session->userdata());
          redirect($this->emis_Udise_staff_dash());
          }else
          {
            echo "else";
            $data['error'] = "Something Went Wrong Please Try Again";
            $this->load->view('Udise_staff/emis_Udise_staff_reset',$data);

          }
      }

    /********************************* End *********************************/

   	  
	  
	  

      /**************************************
        * Udise Staff PDF                   *
        * VIT-sriram                        *
        * 15/05/2019                        *
        *************************************/

      public function generate_staff_pdf()
      {
          $emis_loggedin = $this->session->userdata('emis_loggedin');
          if($emis_loggedin)
            {
              $staff_id = $this->uri->segment(3,0);
              $staff_details = $this->Udise_staffmodel->get_staff_form_details($staff_id)[0];
              $data['staff_details'] = $staff_details;
              $date_where = array('teacher_id'=>$staff_details->teacher_code);
              $data['teacher_dates']  = Common::get_single_list('teacher_dates',$date_where);
              $data['teacher_regu_dates'] = Common::get_multi_list('teacher_regu_dates',$date_where);              
              // $temp_data = $data['teacher_dates'] ;
              
                  $head_account = $this->Udise_staffmodel->get_head_account_details($data['teacher_dates']->head_account);
                  if(!empty($head_account)){
                    $head_of_account_name = $head_account[0]->head_of_account_name;
                    $data['teacher_dates']->head_of_account_name = $head_account[0][head_of_account_name];
                  }
                  else{
                    $data['teacher_dates']->head_of_account_name = '--';
                  }

                  
              $html = $this->load->view('Udise_staff/emis_Udise_staff_pdf',$data,TRUE);
              $this->m_pdf = new mpdf('ta',[216, 356]);
              $this->m_pdf->setTitle($staff_details->teacher_code.' Staff Details');
              $this->m_pdf->setFooter("Page {PAGENO} of {nb}");
              $this->m_pdf->WriteHTML($html,2);
              $this->m_pdf->Output($pdfFilePath, "I");
          }
        else
          {
            redirect('/', 'refresh');
          }
      } 


      /********************************** End *************************/


      public function change_date($date)
      { 
        // echo $date;
          $new_date = ''; 
          // if($data !=''){

          $new_date =($date!=''?date('Y-m-d',strtotime($date)):'');
          // }
          return $new_date;
      }

  /*************************** Staff Attendance Report API by wesley Starts Here *********************/

	/*public function emis_staff_attendance_monthly_schoolwise(){
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin){     
          $school_id =$this->session->userdata('emis_school_id');
          $date = $this->input->post('date');
          // print_r($date);
          // echo $school_id;
          if(!empty($date))
          {
            $date = '01-'.$date;
          }else
          {
            $date = date('01-m-Y',strtotime("-1 month"));
          }
          if($date !='')
          {
            $data['teacher_absent_list'] = $this->Udise_staffmodel->emis_staff_attendance_school_monthwise('teachers_attend_yearly',$school_id,$date);
          }
          $data['date'] = $date;

          $data['title'] = 'Staff Attendance Schoolwise';
          $this->load->view('Udise_staff/emis_staff_attendance_schoolwise',$data);

		}else{
			redirect('/', 'refresh');
		}
	}*/

	public function emis_staff_attendance_monthly_schoolwise_post(){
		$records = $this->post('records');		
		$school_id =$records['emis_school_id'];
		$date = $records['date'];
		if($school_id){ 	
          	if(!empty($date)){
            	$date = '01-'.$date;
          	}else{
            	$date = date('01-m-Y',strtotime("-1 month"));
          	}
          	if($date !=''){
            	$data['teacher_absent_list'] = $this->Udise_staffmodel->emis_staff_attendance_school_monthwise('teachers_attend_yearly',$school_id,$date);
		  	}		  
          	$data['date'] = $date;
		  	$data['title'] = 'Staff Attendance Schoolwise';
		  	if(!empty($data)){
				$this->response(['dataStatus' => true,
								 'status'  => REST_Controller::HTTP_OK,
								 'result'  => $data ],REST_Controller::HTTP_OK);     
			}else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NO_CONTENT,
								'message' => 'Some problems occurred, please try again.',
								],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus' => false,
							'status'  => REST_Controller::HTTP_NOT_FOUND,
							'message' => 'Please Provide the information.',
							],REST_Controller::HTTP_NOT_FOUND);
		} 
	}

	/*************************** Staff Attendance Report API by wesley Ends Here *********************/
	
	/*********************************************************
			Teacher Image api done by Ramco Magesh
	********************************************************/
	/* ✦ Staff Image access : Ramco Magesh */
    public function base_get($image_data,$image_name,$u_id){
        $dt = $image_data;
        $base64_img =  str_replace("[removed]","data:image/png;base64,", $dt);
        $output_file = APPPATH."docs/temp_base64_image.jpg";
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
		for ($i = 0; $i < 5; $i++){
          $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $temp_file_name = $randomString.date('Y-m-d-H:m:s');
        $ifp = fopen($output_file, 'wb');
        $dt = explode( ',', $base64_img );
        fwrite($ifp,base64_decode($dt[1]));
        fclose($ifp);
        $teacher_id = (!empty($image_name)) ? $image_name : $u_id;
        $tempdoc = $output_file;
        $key = 'Teachers/photo_all'.'/'.$teacher_id.'.jpgx';
        $tmp = $tempdoc;
		$credentials=array(
			'key' 			=> 'AKIAJW6QTZLSOS4X4IRA',
			'secret' 		=> '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'
		);
		$s3Result = $this->aws_s3->update_S3_images('tnschoolsawsphoto',$key,$tmp,$credentials);
		return $s3Result;
		//echo $s3Result;die;
	}
	/* ✦ Staff Image Update : Ramco Magesh */
	public function teacherphoto_update_post(){
		$key = 'EMIS_web@2019_api';
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		
		if($emis_loggedin){
			$user_type_id=$token['emis_usertype'];
			if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10) {
				// $json = file_get_contents('php://input');
				// $data = json_decode($json,true);
				$image_data = $this->post('image_data');
				$image_name = $this->post('image_name');
				$u_id = $this->post('u_id');
				if($u_id != ''){
					if(!empty($image_data)){
						$this->base_get($image_data,$image_name,$u_id);
					}
					$data = array(
						'e_picid' => (!empty($image_name)?$image_name:$u_id),
						'u_id' => $u_id
					);

					if($result=$this->Udise_staffmodel->update_staff_det($data)){
						$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Uploaded Successfully','result'=>$result],REST_Controller::HTTP_OK);
					}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Not Uploaded','result'=>array()],REST_Controller::HTTP_OK);
				} else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'ID Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
			}
		}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
	}

	/**********************************************************************
			Teaching and Non-teaching Staff done by Ramco Magesh
	***********************************************************************/
	/* ✦ Staff details (Update part1,part2 and regulation details) : Ramco Magesh */
	public function teacherupdateall_post(){
		
		$key = 'EMIS_web@2019_api';
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		
		if($emis_loggedin){
			$user_type_id=$token['emis_usertype'];
			// access for school/block/district/state/BEO/CEO/DEO
			if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10 ||$user_type_id==5) {
				$frtpart = $this->post('firstpart');
				$scdpart = $this->post('secondpart');
				$regpart = $this->post('regulationpart');
				$teacher_code = $this->post('teacher_code');

				foreach ($frtpart as $key => $value) {
					if ($value == '') {
						$frtpart[$key] = NULL ;
					}
				}
				$result1=$this->Udise_staffmodel->update_staff_det($frtpart);
				$uid = $frtpart['u_id'];
				
				if($uid > 0 && !empty($teacher_code)){
					$new_stfID=$this->Udise_staffmodel->updateStfID($uid,$teacher_code);
					$new_stfQRCODE=$this->Udise_staffmodel->updateStfQRCODE($uid);
				}

				foreach ($scdpart as $key => $value) {
					if ($value == '') {
						$scdpart[$key] = NULL ;
					}
				}
				$result2=$this->Udise_staffmodel->update_staff_bank($scdpart);

				if(!empty($regpart)){
				foreach($regpart as $dt){ //need to check id in html
					$regulation[] = array(
						'teacher_id' 	 => $dt['teacher_id'],
						'teacher_uid' 	 => $dt['teacher_uid'],
						'school_key_id'	 => $dt['school_key_id'],
						'appoint_nature' => $dt['appoint_nature'] != '' ? $dt['appoint_nature'] : NULL,
						'type_date' 	 => $dt['type_date'] != '' ? $dt['type_date'] : NULL ,
						'dates'			 => $dt['dates'] != '' ? $dt['dates'] : NULL,
						'created_at'	 => date('Y-m-d',strtotime('now')),
						'updated_date'	 => date('Y-m-d',strtotime('now'))
					);
				}}else $regulation = array();
				
				$result3=$this->Udise_staffmodel->updateregulation($regulation,$teacher_code);
					// {""UsrID"":""11140619651291530"",""FldID"":"""",""OldFldVal"":""Test"",""NewFldVal"":""test"",""AppSts"":""0"",""AppFlg"":""0"",""AppAuthType"":""8"",""UpdatdDat"":""2019-01-01""} 
					// id, user_id, field_id, , new_field_value, , approval_flag, , created_date, 
					$exlogpart = $this->post('logpart');
					if(!empty($exlogpart)){
						foreach($exlogpart as $dt){ //need to check id in html
							$logpart[] = array(
								'user_id' 	 => $dt['UsrID'],
								'field_id' 	 => $dt['FldID'],
								'old_field_value'	 => $dt['OldFldVal'],
								'new_field_value' 	 => $dt['NewFldVal'],
								'approval_status' 	 => $dt['AppSts'],
								'approval_flag'	 => $dt['AppFlg'],
								'field_id' 	 => $dt['FldID'],
								'approving_authority_type'	 => $dt['AppAuthType'],
								'updated_date'	 => $dt['UpdatdDat']
							);
						}
					}else $logpart = array();
						
					$result4=(!empty($logpart)) ? $this->Udise_staffmodel->stafflogpart($logpart) : null;
				if($result1 || $result2 || $result3){
					   $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully Updated. !','result'=>array()],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Details Not Updated Please Try Again !','result'=>array()],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'No Access for this User Type !','result'=>array()],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied. Due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
	}
	
	/* ✦ Staff bank details (Relevant IFSC) : Ramco Magesh */
	public function checkbankdetails_get()
	 {
     
			$ifsc = $this->get('ifsc');
			if($ifsc!= ''){
			
				$bankdetails = $this->Udise_staffmodel->get_bank_details($ifsc);
				if(count($bankdetails)) $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Success','result'=>$bankdetails],REST_Controller::HTTP_OK);
				else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'There is no bank details for Given IFSC Code','result'=>array()],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'IFSC Code Not Found','result'=>array()],REST_Controller::HTTP_OK);
	
	}

	/* ✦ Staff bank details (already existing or not account no) : Ramco Magesh */
	public function checkaccountnumber_get(){
		 $checkaccountnumber    = $this->get('accno');
		 if($checkaccountnumber != ''){
			$accountcount = $this->Udise_staffmodel->count_accountnumber($checkaccountnumber,'');
			$ttdata= $accountcount[0]->countdata;
			if($ttdata > 0) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Account Number Already Exist!','result'=>array()],REST_Controller::HTTP_OK);
			else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'Success','result'=>array()],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Account Number Not Found','result'=>array()],REST_Controller::HTTP_OK);

	}

	/* ✦ Staff bank details (already existing or not aadhar no) : Ramco Magesh */
	public function checkaadharno_get(){	
        $aadhar = $_GET['aa'];//$this->input->post('aadhar');
		$result = json_decode(json_encode($this->Udise_staffmodel->get_aadhar($aadhar)),true);
		$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
	}
	

	/* ✦ School staff Details (Save part1,part2 and regulation details) : Venba TamilMaran */
	public function teachersaveall_post() {
	  
		
		$token = Common::userToken();
	
		$emis_loggedin=$token['status'];
		
		if($emis_loggedin){
			$user_type_id = $token['emis_usertype'];
			$school_id = $token['emis_user_id'];
			$school_code = $token['emis_username'];
			// access for school/block/district/state/BEO/CEO/DEO
			if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==9 || $user_type_id==6 ||$user_type_id==10 ||$user_type_id==5) {
				$exfrtpart = $this->post('firstpart');
				foreach ($exfrtpart as $key => $value) {
					if ($value == '') {
						$exfrtpart[$key] = NULL ;
					}
				}
				$exscdpart = $this->post('secondpart');
				foreach ($exscdpart as $key => $value) {
					if ($value == '') {
						$exscdpart[$key] = NULL ;
					}
				}

				$exregpart = $this->post('regulationpart');

				$staff_dob = $exfrtpart['staff_dob'];
				$gender = $exfrtpart['gender'];
				$teacher_code = $this->generateTeachercode($staff_dob,$gender,$school_id);

				$addtarray = array(
					'teacher_code'			 => $teacher_code,
					'scl_flag'				 =>	0,
					'udise_code'             => $school_code,
					'createdat'              => date('Y-m-d H:i:s')
				);				
				
				
				$frtpart = array_merge($exfrtpart, $addtarray);
				$result_a =$this->Udise_staffmodel->staffreg($frtpart); 
				$uid = $result_a;
				// $uid = 750379 ;
				if($uid > 0 && !empty($teacher_code)){
					$new_stfID=$this->Udise_staffmodel->updateStfID($uid,$teacher_code);
					if($new_stfID){ $new_stfQRCODE=$this->Udise_staffmodel->updateStfQRCODE($uid);}
				}

			    if($uid > 0){
					$addtarray2 = array( 'teacher_uid' => $uid, 'teacher_id' => $teacher_code);
					$scdpart = array_merge($exscdpart, $addtarray2);
					$result_b = $this->Udise_staffmodel->staffregsecondpart($scdpart);
				
					$regpart= array();
					if(count($exregpart) > 0 ){
						foreach($exregpart as $res){ 
							foreach ($res as $key => $value) {
								if ($value == '') {
									$res[$key] = NULL ;
								}
							}
							$regpart[] = array_merge($res, $addtarray2);
						}
						$result_c = $this->Udise_staffmodel->staffregregulationpart($regpart);
					}
				}

				$exlogpart = $this->post('logpart');
				if(!empty($exlogpart)){
					foreach($exlogpart as $dt){ //need to check id in html
						$logpart[] = array(
							'user_id' 	 => $teacher_code,
							'field_id' 	 => $dt['FldID'],
							'old_field_value'	 => $dt['OldFldVal'],
							'new_field_value' 	 => $dt['NewFldVal'],
							'approval_status' 	 => $dt['AppSts'],
							'approval_flag'	 => $dt['AppFlg'],
							'field_id' 	 => $dt['FldID'],
							'approving_authority_type'	 => $dt['AppAuthType'],
							'updated_date'	 => $dt['UpdatdDat']
						);
					}}else $logpart = array();
					
					$result_d=(!empty($logpart)) ? $this->Udise_staffmodel->stafflogpart($logpart) : null;
					
				
				
				if(count($result_a) > 0){ 
					$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully Updated. !','result'=>array()],REST_Controller::HTTP_OK);
				}
				else if(count($result_a) > 0 && count($result_b) > 0){
					$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully Updated.. !','result'=>array()],REST_Controller::HTTP_OK);
				}
				else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Something went wrong','result'=>array()],REST_Controller::HTTP_OK);
			}
			else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'No Access for this User Type !','result'=>array()],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
	}

	/******************************************************
			Teacher Deputation By Magesh
	*******************************************************/
	public function teacherdeputation_get() {
		
		$key = 'EMIS_web@2019_api';
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_udise =$token['udise_code'];
		if($emis_loggedin){
			$data['staffdetails']= $this->Udise_staffmodel->get_depute_details($school_udise);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			//print_r($data['staffdetails']);die();
			//$this->load->view('Udise/teacherdeputation',$data);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
        
    }
    
    public function teacherdeputationviewall_get() {
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$teacher_code = $_GET['teacher_code'];
		if($emis_loggedin){
			$data=$this->Udise_staffmodel->deputationentry($teacher_code);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
			//$d= json_encode(json_decode(json_encode($this->Udise_staffmodel->deputationentry($teacher_code)), true));
			//echo $d;
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
    public function alldistrict_get(){
		$data['schooldist']= $this->Udise_staffmodel->getallachooldist();
		$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
	}
	
    public function deputealllist_get(){
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		$selectaddress = $_GET['value'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
        
			foreach($data as $index => $value){
				$ind = explode('_',$index);
				if($ind[0]=='districtstaff'){
					$dist = $value;
				}elseif($ind[0]=='blockid'){
					$blk = $value;
				}             
			}
        
			if($selectaddress == 1){
				$where = 'students_school_child_count.district_id='.$dist;
				$group = ' group by block_id';
			}elseif($selectaddress == 2){
				$where = 'students_school_child_count.block_id='.$blk;
				$group = ' group by school_id';
			}elseif($selectaddress == 3){
				$where = 'students_school_child_count.district_id='.$dist;
				$group = ' group by off_key_id';
			}  
			$dlist = $this->Udise_staffmodel->deputeall($where,$group);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$dlist],REST_Controller::HTTP_OK);
			//$dlist = json_encode(json_decode(json_encode(),true));        
			//echo $dlist;
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
    
    public function deputesubmit_post() {
		$createdate = date('Y-m-d',strtotime('now+5hours30minutes'));
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$single_data=array();
            //echo(count($data));die();
			foreach($data as $tablename => $tabvalue){
				if(in_array($tablename,unserialize(HEADERTOKEN))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($tablename);
					foreach($tabledesc as $idx => $value){
						foreach($tabvalue[0] as $tindx => $tval){
							if($value['Field']==$tindx){
								//print_r($tindx);die();
								$single_data[$tindx]=$tval;
							}
						}
					}
					$this->Udise_staffmodel->deputesave($single_data,$tablename,array("teacher_code" => $single_data['teacher_code']));
				}else if(in_array($tablename,unserialize(TOKENHEADER))){
					$tabvalue=$this->multiCorrection($tablename,$tabvalue);	
					$result=$this->Udise_staffmodel->deputesave($tabvalue,$tablename,array("teacher_code" => $single_data['teacher_code']));
					$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
				}else{
					
					echo("Not Found\n");
				}
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
	function multiCorrection($tablename,$tabvalue){
		if($tablename=='teacher_volunteers_subjects'){
		    $multirev[]=array_reverse($tabvalue)[0];
            $tabvalue=$multirev; 
		}
		return $tabvalue;	
	}
	
	
	/**************************************************
		Teaching staff Registration By Ramco Magesh
	***************************************************/
	public function generateTeachercode($staff_dob,$gender,$school_id){
		
		$manacat = $this->Udise_staffmodel->getmanacate($school_id);
		$schcat = $this->Udise_staffmodel->getmanacate1($school_id);
        $manacat=$manacat[0]->manage_cate_id;
        $schcat=$schcat[0]->sch_cate_id;
		if($manacat == 1 || $manacat==2 || $manacat==4 ){
			if($schcat ==3 || $schcat==5 || $schcat==6 || $schcat==7 || $schcat==8 || $schcat==9 || $schcat==10) {
				$dept =11;
			} else if($schcat ==1 || $schcat==2 || $schcat==4){
				$dept =22;
			}else{
				$dept =33;
			}
		}else {
			$dept =33;
		}
		$getteachercount= $this->Udise_staffmodel->getregteachercount();
		$getteachercount1=$getteachercount[0]->maxid;		
		$getteachercode= $this->Udise_staffmodel->getregteachercode($getteachercount1);
		$lastdigit=substr($getteachercode[0]->teacher_code,-6);
		$last1 = $lastdigit + 1;
		$formatted_value = sprintf("%06d", $last1);
		$teachercode = $dept.(date('dmY', strtotime($staff_dob))).$gender.$formatted_value;
		return $teachercode;
	}
	
	public function teaching_post(){
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
		$teacher_code="";
		if($emis_loggedin){
			$json = file_get_contents("php://input");
			$data = json_decode($json,true);
			$singlentry['school_key_id']=$token['school_id'];
			$teacher_code=$teacher_code==""?$this->generateTeachercode($singlentry['staff_dob'],$singlentry['gender'],$token['school_id']):$teacher_code;
			
			$data['udise_staffreg'][0]['teacher_code']=$data['teacher_dates'][0]['teacher_id']=$teacher_code;
			$data['teacher_dates'][0]['teacher_uid']="";
			$data['teacher_dates'][0]['school_key_id']=$token['school_id'];
			foreach($data as $index => $value){
				if(in_array($index,unserialize(HEADERTOKEN))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($index);
					foreach($tabledesc as $tabindex =>$tabvalue){
						foreach($value[0] as $valindex =>$datvalue){
							if($tabvalue['Field']==$valindex){
								if($tabvalue['Type']=="date"){
									$datvalue=date("Y-m-d",strtotime($datvalue));
								}
								if($valindex=='teacher_uid'){
									$datvalue=$data['teacher_dates'][0]['teacher_uid'];
								}
								$singlentry[$valindex]=$datvalue;
							}
						}
					}
				}
				$result=$this->Udise_staffmodel->staffsave($singlentry,$index,array("teacher_code" => $singlentry['teacher_code']));
				$data['teacher_dates'][0]['teacher_uid']=$result;
				unset($singlentry);
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
			
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/******************************************************
		Teacher Login Details By Ramco Magesh
	******************************************************/
	public function teacherlogindetails_get(){
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
		if($emis_loggedin){
			$school_id =$token['school_id'];
			$result = $this->Udise_staffmodel->teacher_login_details($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','logindetails'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/******************************************************
		Teacher Training Details By Ramco Magesh
	*******************************************************/
	/* ✦ Staff Trainee Details (School wise) : Ramco Magesh */
	public function stafftraininglist_get(){
		
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id = $token['school_id'];
		if($emis_loggedin){
			$result['teachertrainlist'] = $this->Udise_staffmodel->get_training_staff_dtl('',$school_id);
			$result['trainingtypelist'] = $this->Udise_staffmodel->listtrainingdtls(); // for drodown - training-type
			$result['stafflist'] = $this->Udise_staffmodel->staffname($school_id); // for dropdown - staffname
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
	/* ✦ Staff Trainee Details (all) : Ramco Magesh */
	public function traineedetails_get(){
		
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		if($emis_loggedin){
			$id=$_GET['id'];
			$result=$this->Udise_staffmodel->traineelist($id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','staff'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
    
	/* ✦ Staff Trainee Details (save and update) : Ramco Magesh */
    public function savetrainingdetails_post() {
	  
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		if($emis_loggedin){
			
			$singledata = $this->post('records');
			$singledata['isactive']=1;
			$id = !empty($singledata['id']) ? $singledata['id'] : NULL;
			// $id = !empty($singledata['id']) ? $singledata['id'] != null  ? $singledata['id'] : NULL  : NULL;
			$singledata['training_other'] = $singledata['training_type'] == "0" ? $singledata['training_other'] : NULL; 
			if($singledata['id']){
				$singledata['updatedat']=date('Y-m-d h:i:s',strtotime('now'));}
			else{
				$singledata['createdat']=date('Y-m-d h:i:s');
			}
			if($singledata['training_date'] !== ''){
				$month=date("m",strtotime($singledata['training_date']));
				$year=date("Y",strtotime($singledata['training_date']));
				if($month>=06){$startyear=$year;$endyear=$year+1;
				}else{$startyear=$year-1;$endyear=$year;}
				// $singledata['acyear']=$startyear.'-'.$endyear;
				$singledata['acyear']=$startyear.'-'.substr($endyear, -2);
			}
			else{
				$singledata['training_date'] = NULL;
				$singledata['acyear'] = NULL;
			}
		
			$result = $this->Udise_staffmodel->trainstaffsave($singledata,'teacher_training_details',$id);
			$result['status'] =  REST_Controller::HTTP_OK;
			$this->response($result,REST_Controller::HTTP_OK);			
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/* ✦ Staff Trainee Details (delete which means inactive) : Ramco Magesh */
	public function deletetrainee_get()
        {
		   $id = $this->get('id'); 	
           if(isset($id)){
			if(!empty($id)){   
								$result = $this->Udise_staffmodel->delete_trainee_data($id);
								$result['status'] =  REST_Controller::HTTP_OK;
								$this->response($result,REST_Controller::HTTP_OK);
								
				}else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'ID Not Found !'],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);
		}
		
	public function trainingdetailsreport_get(){
		// training_details_report
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		if($emis_loggedin){
			$id = $this->get('id'); 	
			$ay = $this->get('ay'); 	
			if(!empty($id)&&!empty($ay)){
				$result = $this->Udise_staffmodel->training_details_report($ay,$id);
				if(!empty($result)){
					  $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Staff Training Details','result'=>$result],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NOT_FOUND,'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'There is No Content For Search Please Try-again !'],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
	}
	/*************************************************************************
		Teacher Volunteers Read & Write Done By Ramco Magesh
	**************************************************************************/	
	public function volunteersstaff_get() {
		
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		$high_class=$token['high_class'];
		if($emis_loggedin) {
            if($token['emis_usertype']==1 || $token['emis_usertype']==2 || $token['emis_usertype']==3 || $token['emis_usertype']==9 || $token['emis_usertype']==6 ||$token['emis_usertype']==10) {			
				$data['subjects'] = $this->Udise_staffmodel->get_teacher_subjects();
				$data['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
				$data['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
				$data['academic'] = $this->Udise_staffmodel->get_academic();
				$data['professional'] = $this->Udise_staffmodel->get_professional();
				
			}else { 
				$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','staff'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
	public function volunteersstaffsave_post() {
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		if($emis_loggedin){
			$js=file_get_contents('php://input');
			$data=json_decode($js,true);
			
			$data['teacher_volunteers'][0]['Active']=1;
			foreach($data as $index => $value){
				if(in_array($index,unserialize(HEADERTOKEN))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($index);
					foreach($tabledesc as $tabindex => $tabvalue){
						foreach($value[0] as $valueindex => $datavalue){
							if($tabvalue['Field']==$valueindex){
								$singledata[$valueindex]=$datavalue;
							}
						}
					}
				}
				$singledata['school_key_id']=$school_id;
				$singledata['created_date']=date('Y-m-d h:i:s');
				$singledata['updated_date']=date('Y-m-d h:i:s',strtotime('now'));
				$result=$this->Udise_staffmodel->volunteersstaffreg($singledata,$index);
				unset($singledata);
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','volunteer'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
	public function volunteersstaffaadhar_post() {
		
	    $token = Common::userToken();
		$emis_loggedin=$token['status'];
		$school_id =$token['emis_user_id'];
		if($emis_loggedin){
			$js=file_get_contents('php://input');
			$data=json_decode($js,true);
			$aadhar = $data['aadhar_no'];
			$result = $this->Udise_staffmodel->get_volunteers($aadhar);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','volunteer'=>$result],REST_Controller::HTTP_OK);
			//print_r($volunteer);die();
        }else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	/***************************************************
		End
	****************************************************/
	
	
	
	/**PINDICS HM Evaluation Starts here by wesley**/

	public function pindics_hm_eval_get()
	{   
		$school_id = $this->get('school_id');
		//print_r($school_id);
		if(!empty($school_id)){
		$data['teacherinfo'] = $this->Udise_staffmodel->get_teacher_details($school_id);
		//$data['hm_info'] = $this->Udise_staffmodel->get_hm_details($school_id);
		//$data['hm_id'] = $data['hm_info']['0']['u_id'];
		$hm_info = $this->Udise_staffmodel->get_hm_details($school_id);
		$data['hm_id'] = $hm_info['0']['HM_id'];
			if(!empty($data)){
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
				'result'  => $data ],REST_Controller::HTTP_OK);     
			}else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NO_CONTENT,
								'message' => 'Some problems occurred, please try again.',
								],REST_Controller::HTTP_OK);
			}                
		}
		else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NOT_FOUND,
								'message' => 'Please Provide the information.',
								],REST_Controller::HTTP_OK);
		}   
	}
		
	public function pindics_single_teachr_data_get()
	{   
		$teacher_id = $this->get('teacher_id');
		if(!empty($teacher_id)){
			$data['teacher_data']=$this->Udise_staffmodel->pindics_single_teacher_detail($teacher_id);			
			//$data['teacher_data'] = json_encode($teachr_data);
			if(!empty($data)){
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
				'result'  => $data ],REST_Controller::HTTP_OK);     
			}else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NO_CONTENT,
								'message' => 'Some problems occurred, please try again.',
								],REST_Controller::HTTP_OK);
			}                
		}
		else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NOT_FOUND,
								'message' => 'Please Provide the information.',
								],REST_Controller::HTTP_OK);
		}   
	}
	
	public function pindics_hm_eval_insert_post()
	{   
		$records = $this->post('records');
		$teacher_id = $records['teacher_id'];
		if(!empty($teacher_id)){
			$data = $this->Udise_staffmodel->pindics_hm_eval_insert($records);
			if(!empty($data)){
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
				'result'  => $data ],REST_Controller::HTTP_OK);     
			}else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NO_CONTENT,
								'message' => 'Some problems occurred, please try again.',
								],REST_Controller::HTTP_OK);
			}                
		}
		else{
				$this->response(['dataStatus' => false,
								'status'  => REST_Controller::HTTP_NOT_FOUND,
								'message' => 'Please Provide the information.',
								],REST_Controller::HTTP_OK);
		}   
	}
	
	/* Testing Purpose   by venba Tamil
	
	 public function school_teacherlist_testing_get()
    {
		$records = $this->get('school_id'); 
		//print_r($records);
		//die();
        $school_id = $this->get('school_id');      
      
		
                       $staffdetails= $this->Udise_staffmodel->get_teaching_staff_details($school_id);
					    //$data['teacherslist'] = $staffdetails;
                       //$staffdetailspart2 = $this->Udise_staffmodel->get_staff_part2_details($school_id);
					   $regulationdata = $this->Udise_staffmodel->get_staff_part3_details($school_id);
                       //$deputedetails= $this->Udise_staffmodel->getdepute($school_id);
                      // $volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
                      // $subjects = $this->Udise_staffmodel->get_teacher_subjects();
                     
	 if(count($staffdetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
               
				$data['allteachers']['teacherlist']= $staffdetails;
				//$data['allteachers']['deputedetails']= $deputedetails;
				// $data['teacherslist']= $staffdetailspart2;
				//$data['deputeteachers'] = $deputedetails;
				//$data['staffdetailspart2']=$staffdetailspart2;
				$data['regulationdata']= $regulationdata;
				//$data['subjects'] =$subjects;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }    //print_r($data['staffdetails']);
                       
          
    }
	
	 public function school_nonteacherlist_testing_get()
    {
		$records = $this->get('school_id'); 
		//print_r($records);
		//die();
        $school_id = $this->get('school_id');      
      
		
                       $nonteachstaffdetails= $this->Udise_staffmodel->get_nonteaching_staff_details($school_id);
                       //$staffdetailspart2 = $this->Udise_staffmodel->get_staff_part2_details($school_id);
					   //$regulationdata = $this->Udise_staffmodel->get_staff_part3_details($school_id);
                      // $deputedetails= $this->Udise_staffmodel->getdepute($school_id);
                      // $volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
                      // $subjects = $this->Udise_staffmodel->get_teacher_subjects();
                     
	 if(count($nonteachstaffdetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['nonteacherslist'] = $nonteachstaffdetails;
				//$data['deputeteachers'] = $deputedetails;
				//$data['staffdetailspart2']=$staffdetailspart2;
				//$data['regulationdata']= $regulationdata;
				//$data['subjects'] =$subjects;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }    //print_r($data['staffdetails']);
                       
          
    }
	/* get deputation Teachers by VENBA Tamil 
	  public function depute_teacherlist_testing_get()
    {
		$records = $this->get('school_id'); 
        $school_id = $this->get('school_id'); 
                       $deputedetails= $this->Udise_staffmodel->getdepute($school_id);
                       //$volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
	 if(count($deputedetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['deputeteachers'] = $deputedetails;
				
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }    //print_r($data['staffdetails']);
                       
          
    }
	/* get deputation Teachers by VENBA Tamil */
	
	/* get  Volunteers Teachers by VENBA Tamil 
	  public function volunteer_teacherlist_testing_get()
    {
		$records = $this->get('school_id'); 
        $school_id = $this->get('school_id'); 
                       
       $volunteerdetails= $this->Udise_staffmodel->getvolunteer($school_id);
	 if(count($volunteerdetails))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
				$data['volunteersteachers']=$volunteerdetails;
				
                $this->response($data,REST_Controller::HTTP_OK);
        } 
		 else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }    //print_r($data['staffdetails']);
                       
          
    }
	/* Testing Purpose  by VENBA Tamil */
		
 /**PINDICS HM Evaluation Starts here by wesley**/	

  	/**Teacher Volunteer by karthick**/	
	  public function teacher_volunteer_post(){
		$json = file_get_contents('php://input');
		$data = json_decode($json,true);
		$data= $this->post();
		$result=$this->Udise_staffmodel->teacher_volunteersave($data);
		if(!empty($result))
        {
            $this->response(['dataStatus' => true, 'status'  => REST_Controller::HTTP_OK, 'message'=>'Successfully'],REST_Controller::HTTP_OK);     
        }
        else
        {
			$this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
        }
	}
	public function teacher_volunteer_post(){
		$json = file_get_contents('php://input');
		$data = json_decode($json,true);
		foreach($data as $key => $dt){
			$singledata['created_date']=date('Y-m-d h:i:s');
			$result=$this->Udise_staffmodel->teacher_volunteersave($key,$dt);
		}
		if(!empty($result))
        {
            $this->response(['dataStatus' => true,
							 'status'  => REST_Controller::HTTP_OK,
							 'message'=>'Successfully'
							//  'result'  => $result
							 ],REST_Controller::HTTP_OK);     
        }
        else
        {
         $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_NO_CONTENT,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_OK);
        }
		// $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'result'  => $result ],REST_Controller::HTTP_OK);  
	}

	public function teacher_volunteers_list_get(){
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		if($emis_loggedin){
			$result['teacher_volunteers'] = $this->Udise_staffmodel->get_teacher_volunteer();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}

 /**Scale Register starts Here done by : venba/nirmal */

    public function GetAllScaleRegister_post()
    {
        $school_id = $this->post('school_id');
        $udise_staff = $this->Udise_staffmodel->get_fixation_staff_details($school_id);
 
        if(!empty($udise_staff))
        {
      
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'result'  => $udise_staff ],REST_Controller::HTTP_OK);     
        }
        else
        {
         $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_NO_CONTENT,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_OK);
        }   
	}
	
    public function SaveScaleRegister_post()
    {
    	 $records = $this->post();
    	 $udise_staff = $this->Udise_staffmodel->save_scale_register_details($records);

    	if(!empty($udise_staff))
         {
      
             $this->response(['Data Saved successfully.'],REST_Controller::HTTP_OK);     
       }
    
        else
       {
         $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
        }   
    }
    public function PutScaleRegister_put()
    {
    	 $records = $this->put();
    	// print_r($records);
    	 $udise_staff = $this->Udise_staffmodel->put_scale_register_details($records['id'],$records);
    	 if(!empty($udise_staff))
         {
      
             $this->response(['Data Saved successfully.'],REST_Controller::HTTP_OK);     
        }
    
         else
        {
         $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
         }   
    }

    public function DeleteScaleRegister_put()
    {
    	
    	$records = $this->put('id');
    	//  print_r($records);
    	 $udise_staff = $this->Udise_staffmodel->delete_scale_register_details($records['id']);
    	   if(!empty($udise_staff))
         {
      
             $this->response(['Data Deleted successfully.'],REST_Controller::HTTP_OK);     
         }
    
          else
         {
          $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
          }   
    }
    
/**Scale Register ends here done by : venba/nirmal */

/* ✦ NSQF Staff Details (vocational) : venba/nirmal */
public function vocationalnsqfstafflist_get(){
	
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	$school_id = $token['school_id'];
	if($emis_loggedin){
		$result['nsqfvocationalstafflist'] = $this->Udise_staffmodel->get_nsqf_training_staff_dtl($school_id);
		$result['socialcategory'] = $this->Udise_staffmodel->get_techsocialcat();
		$result['classtaught'] = $this->Udise_staffmodel->get_teacher_classtaught();	    
		$result['sector'] = $this->Udise_staffmodel->get_nsqf_sector();
		// $result['ug'] = $this->Udise_staffmodel->get_teacher_typeug();
		// $result['pg'] = $this->Udise_staffmodel->get_teacher_typepg();
		$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
	}else{
		$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
	}
}

/* ✦ NSQF Staff Details (save) : venba/nirmal */
public function vocationalnsqfstaffsave_post(){
	
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	$school_id =$token['emis_user_id'];
	if($emis_loggedin){
		
		    $singledata = $this->post('records');
			$singledata['school_key_id']=$school_id;			
			$singledata['archive']="1";			
			$result=$this->Udise_staffmodel->save_nsqf_trainee_staff_dtl($singledata);
			// unset($singledata);
		
		$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','volunteer'=>$result],REST_Controller::HTTP_OK);
	}else{
		$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
	}
}

/* ✦ NSQF Staff Details (aadhar already exist or not) : venba/nirmal */
public function vocationalnsqfstaffaadhar_get(){
		$aadhar = $_GET['aa'];//$this->input->post('aadhar');
		if(!empty($aadhar)){   
			$result = $this->Udise_staffmodel->check_nsqf_staff_aadhar_dtl($aadhar);
			$this->response(['dataStatus' => true,
							 'status'  => REST_Controller::HTTP_OK,
							 'result' => $result],REST_Controller::HTTP_OK);
			
        }
        else{
			$this->response(['dataStatus' => false,
							 'status'  => REST_Controller::HTTP_NOT_FOUND,
							 'message' => 'Aadhar Number Not Found !'],REST_Controller::HTTP_OK);
        }
}

/* ✦ NSQF Staff Details (delete) : venba/nirmal */
public function  vocationalnsqfstaffdelete_get(){
	
	$id = $this->get('id'); 	
	if(!empty($id)){   
					 $result = $this->Udise_staffmodel->delete_nsqf_trainee_staff_dtl($id);
					 $this->response(['dataStatus' => $result,
									  'status'  => REST_Controller::HTTP_OK,
									  'message' => $result ? 'Deleted Successfully' : 'Unable to Deleted' ],REST_Controller::HTTP_OK);
					 
	 }
	 else{
					 $this->response(['dataStatus' => false,
									  'status'  => REST_Controller::HTTP_NOT_FOUND,
									  'message' => 'ID Not Found !'],REST_Controller::HTTP_OK);
	 }
}


public function scllistforstffixation_get(){
        
	    $token = Common::userToken();
	    $emis_loggedin=$token['status'];
	
	    if($emis_loggedin){
	    	$dist_id = $this->get('dist_id'); 
            $result = $this->Udise_staffmodel->getschoollistforstafffixation($dist_id);
            if(count($result)>0) 
                 $this->response(['dataStatus'=>true ,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Founded Successfully !','result'=>$result],REST_Controller::HTTP_OK);
            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'Data Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
        } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);            
    
   }

   public function getstafffixationdetails_get(){
   	    
	    $token = Common::userToken();
	    $emis_loggedin=$token['status'];

	    if($emis_loggedin){
	    	$school_id = $this->get('school_id'); 
	    	if(!empty($school_id)){
	            $result = $this->Udise_staffmodel->getstafffixationdetails($school_id);
	            if(count($result)>0) 
	                 $this->response(['dataStatus'=>true ,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Founded Successfully !','result'=>$result],REST_Controller::HTTP_OK);
	            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'  => 'Data Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
	        }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'School ID Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
        } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);            
    
   }

   public function savestafffixationdetails_post(){
	
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin){
		    $data = $this->post('records');
			// $data['updated_date']=date('Y-m-d',strtotime('now'));			
			foreach ($data as $key => $value) {
				if ($value == '') {
						$data[$key] = NULL ;
				}
			}
			$result=$this->Udise_staffmodel->savestafffixationdetails($data);
			if($result){
            	$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully Updated'],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Something went wrong please try again'],REST_Controller::HTTP_OK);
	}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !'],REST_Controller::HTTP_OK);            
   }

//    public function pt_teacher_list_get() {
// 	$token = Common::userToken();
// 	$emis_loggedin=$token['status'];
// 	$usertype_id = (int)$token['emis_usertype'];

// 	if($emis_loggedin && $usertype_id === 1){
// 		$school_id = (int)$token['emis_user_id'];
// 		$school_type_id = (int)$token['school_type_id'];

// 		if(($school_type_id === 1) || ($school_type_id === 2) ||  ($school_type_id === 4)){
// 			$pt_teacher_list = $this->Udise_staffmodel->get_pt_teachers_list($school_id);
// 			$pt_teacher_paided_list = $this->Udise_staffmodel->get_pt_teacher_paided_list($school_id);

// 			if((count($pt_teacher_list) >0) || (count($pt_teacher_paided_list) > 0)){
// 			   $this->response(['dataStatus'=>true,
// 								'status'=>REST_Controller::HTTP_OK,
// 								'message'=>'Parttime Staff List and Paided Wises Parttime Staff list',
// 								'ptStaffList'=>(count($pt_teacher_list) > 0 ) ? $pt_teacher_list : array(),
// 								'ptStaffPaidedWiseList'=>(count($pt_teacher_paided_list) > 0 ) ? $pt_teacher_paided_list : array(),
// 							],REST_Controller::HTTP_OK);
// 			}else $this->response(['dataStatus'=>false,
// 								   'status'=>REST_Controller::HTTP_NOT_FOUND,
// 								   'message'=>'There is No Parttime Staff in this School '.'( '.$token['emis_username'].' - '.$token['school_name'].' )',
// 								   'ptStaffPaidedWiseList'=> array(),
// 								   'ptStaffList'=>array()],REST_Controller::HTTP_OK);
// 		}
// 		else{
// 			$this->response(['dataStatus'=>false,
// 							 'status'=>REST_Controller::HTTP_FORBIDDEN,
// 							 'message'=>'Don`t Have permission for this School Type ( '.$token['school_type'].' ) ',
// 							 'ptStaffPaidedWiseList'=> array(),
// 							 'ptTeacherList'=>array()],REST_Controller::HTTP_OK);
// 		}
	 
// 	}else $this->response(['dataStatus'=>false,
// 						  'status'=>REST_Controller::HTTP_UNAUTHORIZED,
// 						  'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
//    }

public function pt_teacher_list_get() {
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	$usertype_id = (int)$token['emis_usertype'];

	if($emis_loggedin && $usertype_id === 1){
		$school_id = (int)$token['emis_user_id'];
		$school_type_id = (int)$token['school_type_id'];

		if(($school_type_id === 1) || ($school_type_id === 2) ||  ($school_type_id === 4)){
			$month = $this->get('month'); 
			if($month != 0){
				$pt_teacher_list = $this->Udise_staffmodel->get_pt_teachers_list($school_id);
				$pt_teacher_paided_list = $this->Udise_staffmodel->get_pt_teacher_list($school_id,$month);
			
					if(count($pt_teacher_paided_list) > 0){
					   $this->response(['dataStatus'=>true,
										'status'=>REST_Controller::HTTP_OK,
										'message'=>'Parttime Staff List',
										'ptStaffListForDropdown'=>(count($pt_teacher_list) > 0 ) ? $pt_teacher_list : array(),
										'ptStaffList'=>(count($pt_teacher_paided_list) > 0 ) ? $pt_teacher_paided_list : array(),
									],REST_Controller::HTTP_OK);
					}else $this->response(['dataStatus'=>false,
										   'status'=>REST_Controller::HTTP_NOT_FOUND,
										   'message'=>'There is No Parttime Staff in this School '.'( '.$token['emis_username'].' - '.$token['school_name'].' )',
										   'ptStaffList'=> array(),
										   'ptStaffListForDropdown'=> array()],REST_Controller::HTTP_OK);
		   }
		   else $this->response(['dataStatus'=>false,
							 'status'=>REST_Controller::HTTP_NOT_FOUND,
							 'message'=>'Invaild Month ( val = '.$month.' )',
							 'ptStaffList'=> array(),
							 'ptStaffListForDropdown'=> array()],REST_Controller::HTTP_OK);
	    }
		else{
			$this->response(['dataStatus'=>false,
							 'status'=>REST_Controller::HTTP_FORBIDDEN,
							 'message'=>'Don`t Have permission for this School Type ( '.$token['school_type'].' ) ',
							 'ptStaffListForDropdown'=> array(),
							 'ptStaffList'=> array()],REST_Controller::HTTP_OK);
		}
	 
	}else $this->response(['dataStatus'=>false,
						  'status'=>REST_Controller::HTTP_UNAUTHORIZED,
						  'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }




   public function pt_teacher_dtls_save_post() {
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	$usertype_id = (int)$token['emis_usertype'];
	
	if($emis_loggedin && $usertype_id === 1){
		$school_id = (int)$token['emis_user_id'];
		$school_type_id = (int)$token['school_type_id'];
		$records = $this->post('records');
		if($records){
			// print_r($records);
	        // die();
			if(($school_type_id === 1) || ($school_type_id === 2) ||  ($school_type_id === 4)){
				foreach($records as $key => $value) {
					if ($value == '') {
						$records[$key] = NULL ;
					}
			    }
				$result = $this->Udise_staffmodel->update_pt_teacher_paid_details($records);
				
				if($result != 0){
					$this->response(['dataStatus'=>true,
									 'status'=>REST_Controller::HTTP_OK,
									 'message'=>'Successfully Updated. !',
									 'id'=>$result],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus'=>false,
									   'status'=>REST_Controller::HTTP_OK,
									   'message'=>'Details Not Updated Please Try Again !',
									   'id'=>0],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,
								 'status'=>REST_Controller::HTTP_FORBIDDEN,
								 'message'=>'Don`t Have permission for this School Type ( '.$token['school_type'].' ) ',
								 'id'=>0],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,
							 'status'=>REST_Controller::HTTP_NOT_FOUND,
							 'message'=>'There is No Details to Update. Retry Again !!','id'=>0],REST_Controller::HTTP_OK);
	}else $this->response(['dataStatus'=>false,
						  'status'=>REST_Controller::HTTP_UNAUTHORIZED,
						  'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }

   public function pt_teacher_report_get() {
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin){
		$usertype_id = (int)$token['emis_usertype'];            
		if(($usertype_id === 1)||($usertype_id === 3)||($usertype_id === 9) || ($usertype_id===2)){
			$month = $this->get('month');
			if(!empty($month)){
			switch($usertype_id){
					case 1 : //school 
							 $district = $this->get('district')==''?$token['district_id']:(int)$this->get('district');
							 $text = 'District List (Master List) And Parttime Staff List (Report For School)';
							 break;
					case 3 : //dist
							 $district = $this->get('district')==''?$token['emis_user_id']:(int)$this->get('district');
							 $text = 'District List (Master List) And Parttime Staff List (Report For District)';
							 break;
					case 9 : //ceo
							 $district = $this->get('district')==''?$token['district_id']:(int)$this->get('district');
							 $text = 'District List (Master List) And Parttime Staff List (Report For CEO)';
							 break;
				    case 2 : //block
							 $district = $this->get('block')==''?$token['emis_user_id']:(int)$this->get('block');
							 $text = 'Block List (Master List) And Parttime Staff List (Report For Block)';
							 break;		 
			 }
			 if($usertype_id == 2)
			 {
			$where = "and sc.block_id=".$district;
			$groupby = "sc.school_id";
			$select = "sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type";
			 }
			 if($usertype_id !=2)
			 {
			$dist_list = $this->Udise_staffmodel->get_districtid();
			$where = "and sc.district_id=".$district;
			$groupby = "sc.school_id";
			$select = "sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type";
			 }
			
			$pt_teacher_rpt = $this->Udise_staffmodel->get_pt_teacher_report($month,$select,$where,$groupby);
			if(count($pt_teacher_rpt) >0){
			   $this->response(['dataStatus'=>true,
								'status'=>REST_Controller::HTTP_OK,
								'API Description' => $text,
								'message'=>'Parttime Staff List (Report)',
								'district_list'=>$dist_list,
								'ptStaffPaidedWiseReportList'=>$pt_teacher_rpt],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,
								   'status'=>REST_Controller::HTTP_NOT_FOUND,
								   'API Description' => $text,
								   'district_list'=>$dist_list,  
								   'message'=>'There No Part time staff Details',
								   'ptStaffPaidedWiseReportList'=> array()],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,
							   'status'=>REST_Controller::HTTP_NO_CONTENT,
							   'message'=>'Month Not Found!'],REST_Controller::HTTP_OK);       
		}else if($usertype_id === 5){
			$month = $this->get('month');
			if(!empty($month)){
				$dist_list = $this->Udise_staffmodel->get_districtid();
				$district = $this->get('district');
				$block = $this->get('block');
				// $school = $this->get('school');
				// sc.school_id,sc.district_id,sc.block_id
				if(!empty($district)){
					$where = "and sc.district_id=".$district;
					$groupby = "sc.block_id";
					$select = "sc.district_name, sc.block_name,sc.block_id";
					$text = 'STATE => District List (Master List) And Parttime Staff List (Report For Block-Wise)';
				}else if(!empty($block)){
					$where = "and sc.block_id=".$block;
					$groupby = "sc.school_id";
					$select = "sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type,sc.school_id";
					$text = 'STATE => District List (Master List) And Parttime Staff List (Report For School-Wise)';
				}else{
					$where = "";
					$groupby = "sc.district_id";
					$select = "sc.district_name,sc.district_id";
					$text = 'STATE => District List (Master List) And Parttime Staff List (Report For District-Wise)';
				}
			
				$pt_teacher_rpt = $this->Udise_staffmodel->get_pt_teacher_report($month,$select,$where,$groupby);
				if(count($pt_teacher_rpt) >0){
					$this->response(['dataStatus'=>true,
									'status'=>REST_Controller::HTTP_OK,
									'API Description' => $text,
									'message'=>'Parttime Staff List (Report)',
									'district_list'=>$dist_list,
									'ptStaffPaidedWiseReportList'=>$pt_teacher_rpt],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus'=>false,
										'status'=>REST_Controller::HTTP_NOT_FOUND,
										'API Description' => $text,
										'district_list'=>$dist_list,
										'message'=>'There No Part time staff Details',
										'ptStaffPaidedWiseReportList'=> array()],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,
								   'status'=>REST_Controller::HTTP_NO_CONTENT,
			  					   'message'=>'Month Not Found!'],REST_Controller::HTTP_OK);       
		}else $this->response(['dataStatus'=>false,
							   'status'=>REST_Controller::HTTP_FORBIDDEN,
							   'message'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);       
	}else $this->response(['dataStatus'=>false,
						  'status'=>REST_Controller::HTTP_UNAUTHORIZED,
						  'message'=>'Access is denied due to Invalid Credentials'],REST_Controller::HTTP_OK); 
   }

    public function update_staff_transfer_post()
    {
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$user_type_id = $token['emis_usertype'];
		// echo $user_type_id;
	    if($emis_loggedin && $user_type_id==1){
			$records = $this->post('records');

			if(!empty($records)){         
				date_default_timezone_set('Asia/Calcutta');

				$school_type_id = (int)$token['school_type_id'];
				$name = $records['name'];
				$u_id = $records['teacher_uid'];
		        if(($school_type_id === 3) || ($school_type_id === 5)){
            		$update = array('archive'=>0);
            		$where = 'u_id'.'='.$u_id;
					$update_data = $this->Udise_staffmodel->updatedatastaff($update,'udise_staffreg',$where);
					$records['approve_date'] = date('Y-m-d');
              	    $records['approve_status'] = 1;
				}
				
					$records['transfer_date'] = date('Y-m-d');
					$records['created_date'] = date('Y-m-d h:i:s');
              		unset($records['name']);
					$where2 = 'teacher_uid'.'='.$u_id;
					$trans_history = $this->Udise_staffmodel->staffinsrt($records,'teachers_cpool_history',$where2);	
              
              	if($trans_history){
					  $text = (($school_type_id === 3) || ($school_type_id === 5)) ? $name.' Transfered To Common Pool' : $name.' Transfer Request Raised';
              	    $this->response(['dataStatus' => true,
                               	 'status'  => REST_Controller::HTTP_OK,
                                 'message' => $text,
                                 'last inserted id'  => $trans_history ],REST_Controller::HTTP_OK);
                }
                else{
                   $this->response(['dataStatus' => false,
                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details'],REST_Controller::HTTP_OK);
              }
		}
		else  $this->response(['dataStatus' => false,
							   'status' => REST_Controller::HTTP_NOT_FOUND,
			                   'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>false,
		                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
		                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        
		}
		
		/** Screen : Pending Transfer request of Staff listing(in district login)*/
		public function stf_approval_request_get()
		{
			$token = Common::userToken();
			$emis_loggedin=$token['status'];
			$usertype_id = (int)$token['emis_usertype'];
   
   			if($emis_loggedin && ($usertype_id === 3||$usertype_id === 20)){
     
       			$dist_id=$this->get('district')==''?$token['emis_user_id']:(int)$this->get('district');
       			$dist_list = $this->Udise_staffmodel->get_districtid();
	   			$stf_list = $this->Udise_staffmodel->get_approval_request($dist_id);
       			if(!empty($stf_list))
       			{
           			$this->response(['dataStatus'=>true,
                           			 'status'=>REST_Controller::HTTP_OK,
                           			 'message'=>'Staff List for Transfer request Approval and District List for Dropdown',
                           			 'dist_list'=>$dist_list,
                           			 'stf_list'=>$stf_list],REST_Controller::HTTP_OK);
       			}
       			else{ $this->response(['dataStatus'=>false,
                           			   'status'=>REST_Controller::HTTP_NOT_FOUND,
                             		   'message'=>'No Data Found!!',
                            		   'dist_list'=>$dist_list,
                           			   'stf_list'=>array()],REST_Controller::HTTP_OK);
                }
   			}else{ $this->response(['dataStatus'=>false,
                           			'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           			'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); }
		}

		
		public function stf_approval_rejection_get()
		{
   			$token = Common::userToken();
   			$emis_loggedin=$token['status'];
   			$usertype_id = (int)$token['emis_usertype'];
   
   			if($emis_loggedin && ($usertype_id === 3 || $usertype_id === 20)){

   				$id = $this->get('id');
   				if($id !== ''){
       
       				$records['approve_date'] = date('Y-m-d');
	   				$records['approve_status'] = 2;
	   				unset($records['name']);
	   				$where = 'teacher_uid'.'='.$id;
	   				$trans_history = $this->Udise_staffmodel->staffinsrt($records,'teachers_cpool_history',$where);	


	   				$update = array('archive'=>1);
       				$where2 = array('u_id'=>$id);
	   				$update_data = $this->Udise_staffmodel->updatedatastaff($update,'udise_staffreg',$where2);

					$arr  = Common::get_single_list('udise_staffreg',$where2);
					   
       				if($update_data)
       				{
               			$this->response(['dataStatus'=>true,
                               			 'status'=>REST_Controller::HTTP_OK,
                               			 'message'=>$arr->teacher_name.' Staff Rejected'],REST_Controller::HTTP_OK);
         			}
       				else{ $this->response(['dataStatus'=>true,
                             			   'status'=>REST_Controller::HTTP_OK,
                             			   'message'=>'Can`t Able to Reject the Staff :( Please Try Again'],REST_Controller::HTTP_OK);
       				}
   				}else{
     					$this->response(['dataStatus' => false,
                         				 'status'  => REST_Controller::HTTP_NOT_FOUND,
                         				 'message' => 'Staff-ID Not Found ! ',
                         				],REST_Controller::HTTP_OK);
   				}
 			}else{ $this->response(['dataStatus'=>false,
                         			'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                         			'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        }
}

/** Screen : Pending Transfer request of Staff To Save( in district login)*/
public function stf_approvals_post()
{
$token = Common::userToken();
$emis_loggedin=$token['status'];
$usertype_id = (int)$token['emis_usertype'];

if($emis_loggedin && ($usertype_id === 3 || $usertype_id === 20)){

 $transfer_data = $this->post('records');

 if(!empty($transfer_data))
 {
   foreach($transfer_data as $data)
   {
	

       $update = array('archive'=>0);
       $where = array('u_id'=>$data['teacher_uid']);

	   $update_data = $this->Udise_staffmodel->updatedatastaff($update,'udise_staffreg',$where);
       
	     $data['approve_date'] = date('Y-m-d');
		 $data['approve_status'] = 1;
		 $where2 = array('id'=>$data['id']);
         $trans_history[] = $this->Udise_staffmodel->staffinsrt($data,'teachers_cpool_history',$where2);	     
   }
   $text = sizeof($trans_history)+' Staffs Transfered To Common Pool';
   $this->response(['dataStatus'=>true,
                    'status'=>REST_Controller::HTTP_OK,
                    'message'=>$text],REST_Controller::HTTP_OK);
 }
 else{
   $this->response(['dataStatus' => false,
                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                        'message' => 'Data Not Found ! ',
                       ],REST_Controller::HTTP_OK);
 }
} else{ $this->response(['dataStatus'=>false,
                        'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                        'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
     }
}

public function teacher_type_get(){
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin){            
		$category = $this->get('category');
		if($category !== ''){
			if($category == 1){
				$data=$this->Udise_staffmodel->get_teacher_type();
			}
			else{
				$data=$this->Udise_staffmodel->get_nonteacher_type();
			}
			if(!empty($data)){
				$this->response(['dataStatus'=>true,
								 'status'=>REST_Controller::HTTP_OK,
								 'message'=>$category == 1 ? 'Teachers Designation List' : 'Non-Teachers Designation List',
								 'teacher_type'=>$data],REST_Controller::HTTP_OK);
		  }
			else $this->response(['dataStatus'=>true,
								 'status'=>REST_Controller::HTTP_NOT_FOUND,
								 'teacher_type'=>array(),
								 'message'=>'No Data Found!'],REST_Controller::HTTP_OK);
			
		}else $this->response(['dataStatus' => false,
							 'status'  => REST_Controller::HTTP_NO_CONTENT,
							 'message' => 'Staff Category Not Found ! '],REST_Controller::HTTP_OK);

	}else $this->response(['dataStatus'=>false,
						   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
	                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
public function staff_search_post(){ 

$token = Common::userToken();
$emis_loggedin=$token['status'];
$emis_usertype = (int)$token['emis_usertype'];
if($emis_loggedin){            
	if($emis_usertype == 1 || $emis_usertype == 5 || $emis_usertype == 2 || $emis_usertype == 3 || $emis_usertype == 6 || $emis_usertype == 9 || $emis_usertype == 10)
    {
	$records = $this->post('records');
	if(!empty($records)){       	
		$filter_val = $records['search_data'];
		$db_col = $records['db_col'];
		$archiveflag= $records['archive_flag'];
		$text = $archiveflag == 0?'Common Pool Staffs':'In School staffs';
        //temp hide
		// switch($emis_usertype){
		// 	case 1 : $where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag,'schoolnew_basicinfo.district_id'=>$token['district_id']); break;
		// 	case 2 : $where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag,'schoolnew_basicinfo.block_id'=>$token['emis_user_id']); break;
		// 	case 6 : $where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag,'schoolnew_basicinfo.edu_dist_id'=>$token['edu_dist_id']); break;
		// 	case 10 : $where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag,'schoolnew_basicinfo.district_id'=>$token['district_id']);  break;       
		// 	default : $where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag); break;
		// }
		$where = array('udise_staffreg.'.$db_col=>$filter_val,'udise_staffreg.archive'=>$archiveflag);
		if($db_col === 'teacher_name'){
			unset($where['udise_staffreg.'.$db_col]);
			$like = array('udise_staffreg.'.$db_col=>$filter_val);
		}
		else $like = array();
		$arr = $this->Udise_staffmodel->searchstaffs($where,$like);
		
        if(!empty($arr))
        {$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => $text,
						  'total_staff'=>count($arr),
						  'search_result'  => $arr],REST_Controller::HTTP_OK);						  
        }else $this->response(['dataStatus' => false,
							   'status'  => REST_Controller::HTTP_NOT_FOUND,
							   'message' => 'No Data Available',
							   'total_staff'=>count($arr),
		                       'search_result'  => array()],REST_Controller::HTTP_OK);
	}else $this->response(['dataStatus' => false,
						   'status' => REST_Controller::HTTP_NO_CONTENT,
						   'message' => 'There is No Content For Search Please Try-again !'],REST_Controller::HTTP_OK);
  }else $this->response(['dataStatus'=>false,
  						'status'=>REST_Controller::HTTP_FORBIDDEN,
  						'message'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);       
}else $this->response(['dataStatus'=>false,
					   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
					   'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
public function Teachers_Training_Det_get()
{
			$ts=explode(".",getallheaders()['Token']);
         	$token = json_decode(base64_decode($ts[1]),true);
           	$emis_loggedin=$token['status'];
           	$emis_user_type_id = $token['emis_usertype'];
            $school_type=$this->get('school_type'); 
            $training_mode=$this->get('training_type');         

          if($emis_loggedin == "Active")
          {
          	//CEO and BRT
           if($emis_user_type_id==9 || $emis_user_type_id==14)
           {
            $district_id = $token['district_id'];
           }
           //DC
           if($emis_user_type_id==3)
           {
           	$district_id = $token['emis_user_id'];
           }
          $get_query['Teacher_training_det'] = $this->Udise_staffmodel->Teacher_training_det($district_id,$school_type,$training_mode);
          if(!empty($get_query))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Available',
						  'result'=>$get_query,],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'No Data Found',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }

          }
          else $this->response(['dataStatus'=>false,
					   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
					   'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
public function Get_School_Section_Details_get()
      {
          
                $class_id = $this->input->get('class_id');
               $school_id = $this->input->get('school_id');
             
      
                $class_section = $this->Udise_staffmodel->get_schoolwise_class_section($class_id,$school_id);

               

              //  $result = array('section'=> $class_section);

            if(!empty($class_section))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Available',
						  'result'=>$class_section,],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'No Data Found',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }
                
              
            }

         public function Get_Section_Medium_Details_get()
      {
          
                $class_id = $this->input->get('class_id');
                 $section = $this->input->get('section');
               $school_id = $this->input->get('school_id');
             
                $class_section_medium = $this->Udise_staffmodel->get_schoolwise_class_section_medium($class_id,$section,$school_id);

               

               // $result = array('section'=> $class_section);

            if(!empty($class_section_medium))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Available',
						  'result'=>$class_section_medium,],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'No Data Found',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }
                
              
            }

  public function Save_Home_Work_post()
      {

          $records = $this->post('records');
          $records['date'] = date('Y-m-d');
          $records['created_at'] = date('Y-m-d h:i:s');
          $result = $this->Udise_staffmodel->save_home_work('teachers_homework',$records);

            if($result!=0)
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data  Stored Successfully!!!'],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'Unbale TO SAve Data!!May be Empty Fields Passed!!',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => 'Issue!Occurs',],REST_Controller::HTTP_OK);
          }
         
      }
      public function home_work_list_get()
      {
      	  $teacher_id=$this->get('teacher_id');
      	  $school_id=$this->get('school_id');
      	  
      	  $data['home_work_detail'] = $this->Udise_staffmodel->get_home_work_details($school_id,$teacher_id);

        // $data['school_classwise'] = $this->Udise_staffmodel->get_schoolwise_class($school_id);
         if(!empty($data))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Available',
						  'result'=>$data,],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'No Data Found',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }
      }

      public function home_work_delete_get()
      {
      	$teacher_id=$this->get('teacher_id');
      	  $school_id=$this->get('school_id');
      	  $id=$this->get('id');
      	  
      	  $data['home_work_detail'] = $this->Udise_staffmodel->delete_home_work_details($school_id,$teacher_id,$id);

        // $data['school_classwise'] = $this->Udise_staffmodel->get_schoolwise_class($school_id);
         if($data!="")
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Deleted SuccessFully!!'],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'Unbale TO Deleted!!',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }
      }
      


public function staff_training_conducted_get(){
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin == "Active")
	{
		$arr = $this->Udise_staffmodel->staff_training_conducted();
		if(!empty($arr))
        {
			$this->response(['dataStatus' => true,
					 	     'status'  => REST_Controller::HTTP_OK,
						     'message' => 'Staff Training Conducted List',
						     'result'  => $arr],REST_Controller::HTTP_OK);						  

        }else $this->response(['dataStatus' => false,
							   'status'  => REST_Controller::HTTP_NOT_FOUND,
							   'message' => 'No Data Available',
		                       'result'  => array()],REST_Controller::HTTP_OK);
	}
	else $this->response(['dataStatus'=>false,
					   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
					   'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function staff_training_attendedby_get(){
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin == "Active")
	{
		$id = $this->get('teacher_id');
        if(isset($id)){
			if($id !== ''){
				$arr = $this->Udise_staffmodel->staff_training_attendedby($id);
				if(!empty($arr))
				{
					$this->response(['dataStatus' => true,
									  'status'  => REST_Controller::HTTP_OK,
									 'message' => 'Staff Details For Training Attendedby',
									 'result'  => $arr],REST_Controller::HTTP_OK);						  
		
				}else $this->response(['dataStatus' => false,
									   'status'  => REST_Controller::HTTP_NOT_FOUND,
									   'message' => 'No Data Available For Given Staff ID',
									   'result'  => array()],REST_Controller::HTTP_OK);
			}
			else $this->response(['dataStatus' => false,
								 'status'  => REST_Controller::HTTP_NO_CONTENT,
								 'message' => 'Staff ID Not Found ! '],REST_Controller::HTTP_OK);
		}
		else $this->response(['dataStatus' => false,
								   'status'  => REST_Controller::HTTP_NOT_FOUND,
								   'message' => 'There is No Parameter, please Try Again !',
								   'result'  => array()],REST_Controller::HTTP_OK);
	}
	else $this->response(['dataStatus'=>false,
					   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
					   'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}



public function save_staff_training_conducted_post() {
	  
		
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin == "Active"){
		$dtls = $this->post('records');
		if(count($dtls['attended_by']) >0){
			if($dtls['training_date'] !== ''){
				$month=date("m",strtotime($dtls['training_date']));
				$year=date("Y",strtotime($dtls['training_date']));
				if($month>=06){$startyear=$year;$endyear=$year+1;
				}else{$startyear=$year-1;$endyear=$year;}
				$training_date = $dtls['training_date'];
				$acyear=$startyear.'-'.substr($endyear, -2);
			}
			else{
				$training_date = NULL;
				$acyear = NULL;
			}
			$max_id = $this->Udise_staffmodel->staff_training_maxid();
			$max_id = $max_id != '' ? $max_id != NULL ? ((int)$max_id+1) : 1 : 1;
			foreach($dtls['attended_by'] as $dt){ //need to check id in html
				$traindtls[] = array(
					'teacher_id' 	 => (int)$dt['teacher_id'],
					'training_id' 	 => $max_id,
					'training_days'  => $dt['training_days'],
					'isactive' 		 => 1,
					'createdat'	 	 => date('Y-m-d',strtotime('now')),
					'trained_at' 	 => $dtls['trained_at'],
					'training_mode'  => $dtls['training_mode'],
					'training_date'  => $training_date,
					'acyear'         => $acyear
				);
			}
			// print_r($traindtls);die();
			$result=$this->Udise_staffmodel->staff_training_conducted_save($traindtls);
			if($result){
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Update Successfully'],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Something Went Wrong Cannot able to update the details'],REST_Controller::HTTP_OK);				
		}else $this->response(['dataStatus'=>false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message'=>'There is No details in Attended By'],REST_Controller::HTTP_OK);		
	}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function staff_training_conducted_by_train_id_get() {
	$trid = $this->get('training_id'); 	
	if(isset($trid)){
	 	if(!empty($trid)){   					 
			// $arr = $this->Udise_staffmodel->staff_training_conducted_by_train_id($id);
			$where = array('training_id'=>$trid,'isactive'=>'1');
			$param = array('id', 'training_id', 'teacher_id', 'trained_at', 'training_mode', 'training_date', 'training_days', 'acyear');
			$arr  = Common::get_multi_withdyncol_list($param,'teacher_training_details',$where);
			$alternative['trained_at'] = $arr[0]->trained_at;
			$alternative['training_id'] = $arr[0]->training_id;
			$alternative['training_mode'] = $arr[0]->training_mode;
			$alternative['training_date'] = $arr[0]->training_date;
			foreach($arr as $dt){ //need to check id in html
				$traindtls[] = array(
					'id' 	 => (int)$dt->id,
					'teacher_id' 	 => (int)$dt->teacher_id,
					'training_days'  => (int)$dt->training_days,
				);
			}
			$alternative['attended_by'] = $traindtls;
			// 'result'  => $arr
			if(!empty($arr)){
				$this->response(['dataStatus' => true,
							 'status'  => REST_Controller::HTTP_OK,
							 'message' => 'Staff Trainee Details based on Training ID ',
							 'staffTrainingConductList' => $alternative],REST_Controller::HTTP_OK);						  
			}else $this->response(['dataStatus' => false,
							   'status'  => REST_Controller::HTTP_NOT_FOUND,
							   'message' => 'No Data Available For Given Training ID',
							   'staffTrainingConductList' => array(),
							   ],REST_Controller::HTTP_OK);
	  	}else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'Training ID Not Found !','staffTrainingConductList' => array()],REST_Controller::HTTP_OK);
	}else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !','staffTrainingConductList' => array()],REST_Controller::HTTP_OK);
 }

public function update_staff_training_conducted_post() {
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin == "Active"){
		$dtls = $this->post('records');
		if(count($dtls['attended_by']) >0){
			if($dtls['training_date'] !== ''){
				$month=date("m",strtotime($dtls['training_date']));
				$year=date("Y",strtotime($dtls['training_date']));
				if($month>=06){$startyear=$year;$endyear=$year+1;
				}else{$startyear=$year-1;$endyear=$year;}
				$training_date = $dtls['training_date'];
				$acyear=$startyear.'-'.substr($endyear, -2);
			}
			else{
				$training_date = NULL;
				$acyear = NULL;
			}
			$a=array();$b=array();
			$where = array('training_id'=>$dtls['training_id'],'isactive'=>'1');
			$param = array('id');
			$id_arr  = Common::get_multi_withdyncol_list($param,'teacher_training_details',$where);
			
			for($i= 0;$i<count($id_arr);$i++){ array_push($b,$id_arr[$i]->id); }
		
			foreach($dtls['attended_by'] as $dt){ //need to check id in html
				if($dt['id'] == ''){
					$traindtlsforadd[] = array(
						'teacher_id' 	 => (int)$dt['teacher_id'],
						'training_id' 	 => $dtls['training_id'],
						'training_days'  => $dt['training_days'],
						'isactive' 		 => 1,
						'createdat'	 	 => date('Y-m-d',strtotime('now')),
						'trained_at' 	 => $dtls['trained_at'],
						'training_mode'  => $dtls['training_mode'],
						'training_date'  => $training_date,
						'acyear'         => $acyear
					);
			    }else if($dt['id'] != ''){
					$traindtlsforedit[] = array(
						'id'=> (int)$dt['id'],
						'teacher_id' 	 => (int)$dt['teacher_id'],
						'training_id' 	 => $dtls['training_id'],
						'training_days'  => $dt['training_days'],
						'trained_at' 	 => $dtls['trained_at'],
						'training_mode'  => $dtls['training_mode'],
						'training_date'  => $training_date
					);
					array_push($a,$dt['id']);
				}
			}

			if(!empty($b)){
				$result = array_values(array_diff($b, $a));
			}else $result = array();

			if(!empty($result)){
			   $result_inactive = $this->Udise_staffmodel->teacher_training_details_inactive($result,$dtls['training_id']);
			}
			// print_r($result_inactive);
            // print_r($result);
			// print_r($traindtlsforadd);
			// print_r($traindtlsforedit);die();
			$result_add = $this->Udise_staffmodel->staff_training_conducted_save($traindtlsforadd);
			$result_edit = $this->Udise_staffmodel->staff_training_conducted_update($traindtlsforedit);
			if($result_add || $result_edit){
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Update Successfully','inactiveDetails'=>$result_inactive],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Something Went Wrong Cannot able to update the details','inactiveDetails'=>$result_inactive],REST_Controller::HTTP_OK);				
		}else $this->response(['dataStatus'=>false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message'=>'There is No details in Attended By'],REST_Controller::HTTP_OK);		
	}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function teacherdetials_get(){
	switch($this->uri->segment(1,0)){
		case 'teachbyaadhar':{
		$where=" WHERE aadhar_no=".$_GET['value'];
		break;
		}
		case 'teachbycode':{
		$where=" WHERE teacher_code='".$_GET['value']."'";
		break;
		}
		case 'teachbyname':{
			$where=" WHERE LOWER(teacher_name) LIKE CONCAT('%',LOWER('".$_GET['value']."'),'%')";
		break;
		}
	}
	$result=$this->Udise_staffmodel->seachteacherbygivencondition($where);
	$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'result'=>$result],REST_Controller::HTTP_OK);
}
function listteachersby_post(){
	$data=$this->post('records');
	//print_r($data);
	$checkkey=['district_id','edu_dist_id','block_id','sch_cate_id','teacher_type','appointed_subject','staff_dob','staff_join','school_type'];
	/*foreach($checkkey as $key){
		$data['records'][$key]="";
	}
	echo(json_encode($data));die();*/
	foreach($checkkey as $key){
		if(!in_array($key,['teacher_type','appointed_subject','staff_dob','staff_join','school_type'])){
			if(array_key_exists($key,$data)){
				$senddata[]='schoolnew_basicinfo.'.$key.' IN ('.$data[$key].') AND';
			}else{
				$senddata[]='schoolnew_basicinfo.'.$key.' IS NOT NULL AND';
			}
		}else{
			if(!in_array($key,['teacher_type','appointed_subject','staff_dob','staff_join'])){
				if(array_key_exists($key,$data)){
					$exp=explode(",",$data[$key]);
					$prdt="schoolnew_academic_detail.".$key." IN ('".implode("','",$exp)."')";
					$senddata[]=$prdt;
				}
				else{
					$senddata[]="schoolnew_academic_detail.".$key." IS NOT NULL";
				}
			}else if(in_array($key,['teacher_type','appointed_subject','staff_dob','staff_join'])){
				if(array_key_exists($key,$data)){
					if($key=="staff_dob" || $key=="staff_join"){
						$exp=explode(",",$data[$key]);
						//print_r($exp);die();
						foreach($exp as $e){
							$ch[]=date("Y-m-d",strtotime($e));
						}
						//print_r($ch);die();
						$prdt="udise_staffreg.".$key." IN ('".implode("','",$ch)."') AND ";
						$senddata[]=$prdt;
						unset($ch);
					}
					else{
						$senddata[]="udise_staffreg.".$key." IN (".$data[$key].") AND ";
					}
				}
				else{
					$senddata[]="udise_staffreg.".$key." IS NOT NULL AND ";
				}
			}
		}
	}
	$where = "WHERE ".implode(" ",$senddata);
	//echo($where);
	$result=$this->Udise_staffmodel->getlistteachers($where);
	$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'result'=>$result],REST_Controller::HTTP_OK);
}

public function staff_transfer_post()
{
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin == "Active"){
		    $records = $this->post('records');
			$name = $records['name'];
			if(!empty($records)){         }
			else  $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NOT_FOUND,'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
			
			if(empty($records['school_id'])){
				// $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter for School, please Try Again !'],REST_Controller::HTTP_OK);
				$this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No SchoolID, please Try Again !'],REST_Controller::HTTP_OK);
			}else if(empty($records['u_id'])){
				// $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter for Staff, please Try Again !'],REST_Controller::HTTP_OK);
				$this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No UID, please Try Again !'],REST_Controller::HTTP_OK);
			}else{
				// $update['school_key_id'] = $school_id;
				// $update['archive'] =  '1';
				// $where = array('teacher_id'=>$teacher_id);
				// $result = $this->Udise_staffmodel->stf_archive_update($update,$where);
				$uid = $records['u_id'];
			    $school_id = $records['school_id'];
				$update = array('archive'=>1,'school_key_id'=>$school_id);
            	$where = 'u_id'.'='.$uid;
				$update_data = $this->Udise_staffmodel->updatedatastaff($update,'udise_staffreg',$where);
				if($update_data)
       			{
					$dtls['admit_date'] = date('Y-m-d');
					$dtls['to_school_id'] = $school_id;
					$dtls['teacher_uid'] = $uid;
					$result = $this->Udise_staffmodel->updatestaffhistroy($dtls,'teachers_cpool_history',$name);
					// $result['status'] =  REST_Controller::HTTP_OK;
					// $this->response($result,REST_Controller::HTTP_OK);
					  $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>$name.' staff`s Details Successfully Updated. !','additional_message'=>$result],REST_Controller::HTTP_OK);
				}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Details Not Updated Please Try Again !'],REST_Controller::HTTP_OK);
				  
			}

	}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
	
}


       public function Get_List_Promote_Students_get()
      {
          
                $class_id = $this->input->get('class_studying_id');
                $section = $this->input->get('class_section');
               // $medium = $this->input->get('education_medium_id');
                $school_id = $this->input->get('school_id');
                
                              
      
                $result = $this->Udise_staffmodel->get_schoolwise_student_promote_list($class_id,$section,$school_id);

               

               // $result = array('section'=> $class_section);

            if(!empty($result))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Available',
						  'result'=>$result,],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => true,
          		          'message'=>'No Data Found',
					 	  'status'  => REST_Controller::HTTP_OK,
						  'result' => '',],REST_Controller::HTTP_OK);
          }
                
              
            }

        public function Update_Promote_Students_post()
        {
        	$records=$this->post('records');
        	 $result = $this->Udise_staffmodel->Update_promote_Student($records);
        	  if(!empty($result))
          {
          	$this->response(['dataStatus' => true,
					 	  'status'  => REST_Controller::HTTP_OK,
						  'message' => 'Data Saved SuccessFully!!'],REST_Controller::HTTP_OK);
          }
          else
          {
          	$this->response(['dataStatus' => false,
          		          'message'=>'Unable TO Save Data',
					 	  'status'  => REST_Controller::HTTP_BAD_REQUEST,
						  'result' => '',],REST_Controller::HTTP_BAD_REQUEST);
          }

        }    

	/*******************************************************************************************
		Information about Teacher List and School List function Done by - Ramco Magesh
	*********************************************************************************************/
	
	public function fetchpassword_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		$udisecode = $_GET['udise_code'];
		if($emis_loggedin){
			$data =$this->Udise_staffmodel->fetchpassword($udisecode);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function getschoollist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		$udisecode = $_GET['udise_code'];
		if($emis_loggedin){
			$data =$this->Udise_staffmodel->fetchlist($udisecode);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function schoolnamesave_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
				$reference=array("school_id"=>$data['records']['school_id']);
				$data=array("school_name"=>$data['records']['school_name']);
				$data = $this->Udise_staffmodel->schoolnamesave($data,$reference);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	public function fetchteacherlist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		$aadhar = $_GET['aadhar'];
		if($emis_loggedin){
			$data = $this->Udise_staffmodel->teachersmalllist($aadhar);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	public function teacherschoolsave_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
				$firstarray=array("school_key_id"=>$data['records']['school_id'],"archive"=>$data['records']['archive']);
				$reference=array("u_id"=>$data['records']['teacher_uid']);				
				$secondarray=array("to_school_id"=>$data['records']['school_id']);
				$reference1=array("teacher_uid"=>$data['records']['teacher_uid']);
				$data = $this->Udise_staffmodel->teacherschoolsave($firstarray,$reference,$secondarray,$reference1);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	public function studentsflaglist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		$student_unique_id = $_GET['student_unique_id'];
		if($emis_loggedin){
			$data = $this->Udise_staffmodel->studentsflaglist($student_unique_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function studentsflagsave_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$firstarray=array("hm_tc_flag"=>$data['records']['hm_tc_flag']);
			$reference=array("student_unique_id"=>$data['records']['student_unique_id']);
			$data = $this->Udise_staffmodel->studentsflagsave($firstarray,$reference);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}
	}
	
	/********************************************************************************************
		Ends here Teacher List and School List function Done by - Ramco Magesh
	********************************************************************************************/

	public function teacher_dropdown_get(){
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$emis_usertype=(int)$token['emis_usertype'];
		if($emis_loggedin && $emis_usertype==14){
			$arr = $this->Udise_staffmodel->teacherdropdown();
			if(!empty($arr)){$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$arr],REST_Controller::HTTP_OK);}
			else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'No Data','result'=>array()],REST_Controller::HTTP_OK);
		}else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!','result'=>array()],REST_Controller::HTTP_OK); 
	}

		public function stf_role_get(){
		    $token = Common::userToken();
			$emis_loggedin=$token['status'];
		    $emis_usertype=(int)$token['emis_usertype'];
			if($emis_loggedin && $emis_usertype==14){
				$teacher_id=(int)$token['teacher_id'];
					if($teacher_id !== ''){
						$where = array("teacher_id"=>$teacher_id,"isactive"=>'1');
						$param = array("teacher_id as TeachID", "role_id as RoleID","(case when role_id='1' then 'coordinator' when role_id='2' then 'call supporter' else 'NA' end) as Role","subject as AssignedSub", "class as AssignedCls","isactive as Status");
						$arr  = Common::get_multi_withdyncol_list($param,"teachers_roles",$where);
						
						if(!empty($arr))
						{
							
							// $where2  = array('isactive'=>'1','assigned_by'=>$teacher_id); 
							// $param2 = array("teachers_calltree_tracking.id as IndexID", "teachers_calltree_tracking.call_id as CallReference", "teachers_calltree_tracking.phone as PhoneNo", "teachers_calltree_tracking.subject as AssignedSub", "teachers_calltree_tracking.class as AssignedCls", "teachers_calltree_tracking.receive_date as RecDate", "teachers_calltree_tracking.assign_date as AssignDate", "teachers_calltree_tracking.assigned_teacher_id as AssignTeach","udise_staffreg.teacher_name as AssignTeachName", "teachers_calltree_tracking.assigned_by as AssignBy", "teachers_calltree_tracking.response_date as RespoDate","teachers_calltree_tracking.status as CallStatus","teachers_calltree_tracking.no_of_calls as NoOfCalls","(case when teachers_calltree_tracking.status='0' then 'Yet to respond' when teachers_calltree_tracking.status='1' then 'Doubt Clarified' when teachers_calltree_tracking.status='2' then 'Blank / Incorrect call' when teachers_calltree_tracking.status='3' then 'Incorrect Subject' when teachers_calltree_tracking.status='4' then 'Incorrect Class' when teachers_calltree_tracking.status='5' then 'Student Unavailable. To call Back' else 'NA' end) as CallStatusName", "teachers_calltree_tracking.remarks as CallRemarks","teachers_calltree_tracking.isactive as Status");

						 
							if((int)$arr[0]->RoleID  == 1)
							{ $where2  = array("assigned_by"=>$teacher_id,"isactive"=>'1');}
							else { $where2  = array('isactive'=>'1'); }
							$param2 = array("teachers_calltree_tracking.id as IndexID", "teachers_calltree_tracking.call_id as CallReference", "teachers_calltree_tracking.phone as PhoneNo", "teachers_calltree_tracking.subject as AssignedSub", "teachers_calltree_tracking.class as AssignedCls", "teachers_calltree_tracking.receive_date as RecDate", "teachers_calltree_tracking.assign_date as AssignDate", "teachers_calltree_tracking.assigned_teacher_id as AssignTeach","udise_staffreg.teacher_name as AssigndTeachrName", "teachers_calltree_tracking.assigned_by as AssignBy", "teachers_calltree_tracking.response_date as RespoDate","teachers_calltree_tracking.status as CallStatus","teachers_calltree_tracking.no_of_calls as NoOfCalls","(case when teachers_calltree_tracking.status='0' then 'Yet to respond' when teachers_calltree_tracking.status='1' then 'Doubt Clarified' when teachers_calltree_tracking.status='2' then 'Blank / Incorrect call' when teachers_calltree_tracking.status='3' then 'Incorrect Subject' when teachers_calltree_tracking.status='4' then 'Incorrect Class' when teachers_calltree_tracking.status='5' then 'Student Unavailable. To call Back' else 'NA' end) as CallStatusName", "teachers_calltree_tracking.remarks as CallRemarks","teachers_calltree_tracking.isactive as Status");
							// $arr2  = Common::get_multi_withdyncol_list($param2,'teachers_calltree_tracking',$where2);	
							$arr2 = $this->Udise_staffmodel->calltreetrack2($param2,$where2);
							$length = count($arr2);
							//echo $length;
							// for($i=0;$i<$length;$i++){                        
							// 	$data = $arr2[$i]->CallReference;  	
							// 			if($data !== ''){$arr2[$i]->Path = Common::get_url('14417-calltree',$data,'+10 minutes',CALL_TREE_KEY,CALL_TREE_SECRET);}
							// 			else{$arr2[$i]->Path = '';}
							// }
							$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Successfully','result' => $arr,'result2'=> $arr2],REST_Controller::HTTP_OK);						  
						} else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Available','result'=>array(),'result2'=>array()],REST_Controller::HTTP_OK);
					}else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Staff ID Not Found ! ','result'  => array(),'result2'=>array()],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!','result'  => array(),'result2'=>array()],REST_Controller::HTTP_OK); 
	    }

	public function call_tree_track_get(){
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$emis_usertype=(int)$token['emis_usertype'];
		if($emis_loggedin && $emis_usertype==14){
			$teacher_id=(int)$token['teacher_id'];
				if($teacher_id !== ''){
						$where = array("teacher_id"=>$teacher_id,"isactive"=>'1');
						$param = array("teacher_id as TeachID", "role_id as RoleID","(case when role_id='1' then 'coordinator' when role_id='2' then 'call supporter' else 'NA' end) as Role","subject as AssignedSub", "class as AssignedCls","isactive as Status");
						$arr  = Common::get_multi_withdyncol_list($param,"teachers_roles",$where);
						if(!empty($arr))
						{
							$arr2 = $this->Udise_staffmodel->calltreetrack($arr);
							$length = count($arr2);
							if(!empty($arr2))
						    {
								for($i=0;$i<$length;$i++){                        
									$data = $arr2[$i]['CallReference'];  	
									if($data !== ''){
										$arr2[$i]['Path'] = Common::get_url('14417-calltree',$data,'+10 minutes','','');
									}else{
										$arr2[$i]['Path'] = '';
									}                 
								}
								$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Successfully','result'=>$arr2],REST_Controller::HTTP_OK);						  
						    }else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Available','result'=>array()],REST_Controller::HTTP_OK);
						}else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Available','result'=>array()],REST_Controller::HTTP_OK);
					}else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Staff ID Not Found','result'=>array()],REST_Controller::HTTP_OK);
		}
		else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!','result'=>array()],REST_Controller::HTTP_OK); 
	}


public function co_ordinator_update_post(){
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$emis_usertype=(int)$token['emis_usertype'];
        if($emis_loggedin && $emis_usertype==14){
			$records=$this->post('records');
			$id = $records['IndexID'];
				if($id !== ''){
					$where = array("id"=>$id);
					$info=array(
						'assigned_teacher_id'=>   $records['AssignTeach'],
						'isactive'			 =>   1
					);
					$result = $this->Udise_staffmodel->update_teachers_calltree_tracking($where,$info);
					$result['status'] =  REST_Controller::HTTP_OK;
					$this->response($result,REST_Controller::HTTP_OK);			
				}else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Check IndexID! '],REST_Controller::HTTP_OK);
			}else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!'],REST_Controller::HTTP_OK); 
}

public function call_supporter_update_post(){
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	$emis_usertype=(int)$token['emis_usertype'];
	if($emis_loggedin && $emis_usertype==14){
		$records=$this->post('records');
		$id = $records['IndexID'];
			if($id !== ''){
				$where = array("id"=>$id);
				$info=array(
					'call_id'			 =>   $records['CallReference'],
					'response_date'		 =>   $records['RespoDate'],
					'status'			 =>   $records['CallStatus'],
					'remarks'			 =>   $records['CallRemarks'],
					'no_of_calls' 		 =>   $records['NoOfCalls'],
					'isactive'			 =>   1
				);
				$result = $this->Udise_staffmodel->update_teachers_calltree_tracking($where,$info);
				$result['status'] =  REST_Controller::HTTP_OK;
				$this->response($result,REST_Controller::HTTP_OK);			
			}else $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Check IndexID! '],REST_Controller::HTTP_OK);
	}else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!'],REST_Controller::HTTP_OK); 
 } 
}
?>