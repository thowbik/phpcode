<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Student extends REST_Controller
{
        function __construct()
        {
                parent::__construct();

                $this->load->helper(array('form','url','html'));
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper('security');
                $this->load->database(); 
                $this->load->model('Studentmodel');
                $this->load->model('Schools_homemodel');
                $this->load->helper('common_helper');
                $this->load->library('AWS_S3');
            
        }

        /** Screen Name   : Students-Common Pool Report
         *  Purpose       : Student Who's are all have the transfer flag as 1  
         *  Refer         : In emis-code done (ctrl : Home -> fns :)
         *  Sample Params : apiurl
         */
        public function school_migration_get(){
            $token = Common::token();
            $emis_loggedin = $token['status'];
            $emis_usertype = (int)$token['emis_usertype'];
            if($emis_loggedin) {
                if($emis_usertype == 1 || $emis_usertype == 2 || $emis_usertype == 3 || $emis_usertype == 6 || $emis_usertype == 9 || $emis_usertype == 10)
                {
                    switch($emis_usertype){
                        case 1 : $block_id = $token['block_id']; //school 
                                 break;
                        case 2 : $block_id = $token['emis_user_id']; //block 
                                 break;
                        case 3 : $dist_id = $token['emis_user_id']; //dist
                                 $block_id=$this->Studentmodel->get_block_id('district_id',$dist_id);
                                 break;
                        case 6 : $block_id = $token['emis_user_id']; //beo 
                                 break;
                        case 9 : $dist_id = $token['district_id']; //ceo
                                 $block_id=$this->Studentmodel->get_block_id('district_id',$dist_id);
                                 break;
                        case 10 : $dist_id = $token['district_id']; //deo 
                                  $block_id=$this->Studentmodel->get_block_id('district_id',$dist_id);
                                  break;       
                    }
                  $student_migration_details = $this->Studentmodel->get_school_student_migration($block_id);
                  if(count($student_migration_details) > 0)
                  {
                    $this->response(['dataStatus'=>true,
                                     'status'=>REST_Controller::HTTP_OK,
                                     'msg'=>"Students Common Pool Report ( ".$token['user_type']." )",
                                     'student_migration_details'=>$student_migration_details],REST_Controller::HTTP_OK); 
                  } 
                  else $this->response(['dataStatus'=>false,
                                        'status'=>REST_Controller::HTTP_NOT_FOUND,
                                        'msg'=>'Data Not Found!',
                                        'student_migration_details'=>array()],REST_Controller::HTTP_OK); 
                }else $this->response(['dataStatus'=>false,
                                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                       'msg'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);       
            }else $this->response(['dataStatus'=>false,
                                   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                   'msg'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }
          

        /** Screen Name   : Students-Common Pool Report
         *  Purpose       : Save the Common Pool Students
         *  Refer         : In emis-code (ctrl : Home -> fns :save_common_student_list)
         *  Sample Params : 
         */
        public function save_common_student_list_post()
        {

            $token = Common::userToken();
	        $emis_loggedin=$token['status'];
            $emis_usertype = (int)$token['emis_usertype'];
	
                if($emis_loggedin){
                    $school_id = (int)$token['emis_user_id'];
                    if($emis_usertype == 1 || $emis_usertype == 2 || $emis_usertype == 3 || $emis_usertype == 6 || $emis_usertype == 9 || $emis_usertype == 10){
                        $records = $this->post();
                        // {'id':id,'remarks':remarks,'transfer_reason':Reason,'unique_id_no':unique_id_no};
                        if($records){
                            foreach($records as $key => $value) {
                                if ($value == '') {
                                    $records[$key] = NULL ;
                                }
                            }
                            $result = $this->Studentmodel->save_common_student_list($records);
                            
                            if($result != 0){
                                $this->response(['dataStatus'=>true,
                                                'status'=>REST_Controller::HTTP_OK,
                                                'msg'=>'Successfully Updated. !'],REST_Controller::HTTP_OK);
                            }else $this->response(['dataStatus'=>false,
                                                'status'=>REST_Controller::HTTP_OK,
                                                'msg'=>'Details Not Updated Please Try Again !'],REST_Controller::HTTP_OK);
                        }else $this->response(['dataStatus'=>false,
                                            'status'=>REST_Controller::HTTP_NOT_FOUND,
                                            'msg'=>'There is No Details to Update. Retry Again !!'],REST_Controller::HTTP_OK);
                    }else $this->response(['dataStatus'=>false,
                                            'status'=>REST_Controller::HTTP_FORBIDDEN,
                                            'msg'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);
                }else $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                    'msg'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        }

        /** Screen Name : Transfer and promotion -> Tranfer student
         *  Purpose     : Tranfer student List
         *  Refer       : In emis-code done by MR Sriram/venba (ctrl : Home -> fns :emis_school_get_students_transfer 
         */
        public function emis_school_get_students_transfer_post()
        {
       
            $records = $this->post('records');     
        
        
            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $section_id = $records['section'];

            $arr['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id); 
            $arr['class_id'] = $class_id;
            if($section_id!=0)
            {
            $arr['section_id'] = $section_id;    
            }
            
            $arr['school_classwise'] = $this->Schools_homemodel->get_schoolwise_classes($school_id);
 
            $this->response(['dataStatus' => true,
                               'status'  => REST_Controller::HTTP_OK,
                               'result'  => $arr ],REST_Controller::HTTP_OK);
    
 
        }


        /** Screen Name : Transfer and promotion -> Tranfer student
         *  Purpose     : Tranfer student List
         *  Refer       : In emis-code done by MR Sriram/venba 26/03/2019 (ctrl : Registration -> fns : update_students_transfer 
         */
        public function update_students_transfer_post()
        {
        
            $records = $this->post('records');
            
            if(!empty($records)){          
                
            date_default_timezone_set('Asia/Calcutta');
            $name = $records['name'];
            $unique_no = $records['unique_id_no'];
            $table = 'students_child_detail';
            $where = 'unique_id_no'.'='.$unique_no;
            if(isset($records['Rte_status'])){
                if($records['Rte_status'] == 'YES'){
                    $update = array('transfer_flag'=>1,'request_flag'=>'0',"child_admitted_under_reservation"=>'No');
                    $records['Rte_status'] = 'No';
                    $additional_message = "<br> RTE Tagging Removed";
                }else{
                    $update = array('transfer_flag'=>1,'request_flag'=>'0');
                    // $records['Rte_status'] = null;
                    $additional_message = "";
                }
            }else{ 
                   $update = array('transfer_flag'=>1,'request_flag'=>'0');
                //    $records['Rte_status'] = null;
                   $additional_message = "";
            }
            $update_data = $this->Studentmodel->update_students_info($update,$table,$where);
            
              $records['academic_year'] = date('Y');
              $records['transfer_date'] = date('Y-m-d');
              $records['created_at'] = date('Y-m-d h:i:s');
              unset($records['name']);
              unset($records['label']);
              $table = 'students_transfer_history';
              
              $trans_history = $this->Studentmodel->save_students_info($records,$table);
              
              if($trans_history){
              $this->response(['dataStatus' => true,
                               'status'  => REST_Controller::HTTP_OK,
                               'message' => $name.' - '.$unique_no.' Students Transfered To Common Pool'.$additional_message,
                               'last inserted id'  => $trans_history ],REST_Controller::HTTP_OK);
              }
              else{
                $this->response(['dataStatus' => false,
                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details'
                ],REST_Controller::HTTP_OK);
              }
            }
            else{
                $this->response(['dataStatus' => false,
                                 'status' => REST_Controller::HTTP_NOT_FOUND,
                                 'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);

            }

        }

        /** Screen Name : Transfer and promotion -> All Student Transfer list
         *  Purpose     : Tranfer student List
         *  Refer       : In emis-code done by MR Sriram/venba 11/04/2019 (ctrl : Registration -> fns : get_students_transfer_list 
         */
        public function get_students_transfer_list_post()
        {

                    $records = $this->post('records');  

                    $class_id = $records['class_id'];        
                    $school_id = $records['school_id'];
                    $section_id = $records['section'];

                    $data['class_id'] = $class_id;
                    $data['section_id'] = $section_id;
                    $data['district'] = $this->Schools_homemodel->get_common_table_details('schoolnew_district');
                    $data['bloodgroup'] = $this->Schools_homemodel->get_common_table_details('baseapp_bloodgroup');
                    $data['occpation'] = $this->Schools_homemodel->get_common_table_details('baseapp_occupation');
                    $data['parentIncome'] = $this->Schools_homemodel->get_common_table_details('baseapp_parentincome');
                    $data['medium_sec'] =  $this->Schools_homemodel->getallmediumofinst($school_id);
                    $data['mother_tang'] = $this->Schools_homemodel->get_common_table_details('schoolnew_mediumofinstruction');

                    $data['disabilities'] = $this->Schools_homemodel->get_common_table_details('baseapp_differently_abled');
                    $data['religions'] = $this->Schools_homemodel->get_common_table_details('baseapp_religion');
                    $data['school_classwise'] = $this->Schools_homemodel->get_schoolwise_classes($school_id);
                    
                    if(!empty($class_id)){
                    $data['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,'');
                    }
                    
                    
                    $this->response(['dataStatus' => true,
                                    'status'  => REST_Controller::HTTP_OK,
                                    'result'  => $data ],REST_Controller::HTTP_OK);
                
        }

        //<a href="http://localhost/emis-code/Home/save_transfer_certificate_details?stu_id=546766&class_id=6"

        /** Screen Name : Transfer and promotion -> All Student Transfer list
         *  Purpose     : pdf
         *  Refer       : In emis-code done by MR Sriram/venba  (ctrl : Home -> fns : generate_student_tc 
         */
        public function student_tc_for_pdf_get(){
          
            $students_id = $this->get('student_id');
                
            $stu_data ='';// $this->Studentmodel->generate_tc_details($students_id);
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'result'  => $stu_data ],REST_Controller::HTTP_OK);
        }

        /** Screen Name : Transfer And Promotions -> Students Request Raised 
         *  Purpose     : Students Request Raised Report
         *  Refer       : In emis-code done by MR Magesh/ramco (ctrl : Home -> fns : student_request_raised ) 
         */
        public function student_request_raised_get() {
    
            $school_id=$this->get('school_id');
            $data = $this->Studentmodel->getstudentraised($school_id);
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'result'  => $data ],REST_Controller::HTTP_OK);
        }

        //******************************Start  Raise transfer request ****************************
        /** Screen Name : Transfer And Promotions -> Pending Student transfer
         *  Purpose     : Pending Student transfer
         *  Refer       : In emis-code done by MR Magesh/ramco (ctrl : Home -> fns : emis_student_raiserequest ) 
         */
//         public function emis_student_raiserequest(){

    
    
//     if($emis_loggedin) {

//                 $date = date('Y-m-d');
//                 $studentid = $this->input->post('stud_id');
//                 $emis_username=$this->session->userdata('emis_username'); 
      
//                 $data=array('request_flag'=>'1',
//                             'request_date'=>$date,
//                             'request_id'=>$emis_username);
//                 $status = $this->Schools_homemodel->emisraisearequestflag($studentid,$data);
//       // echo json_encode($studentdetails);
//         if($status)
//           {
//             echo true;
//           }
//         else
//         {
//           echo false;
//         }
//       } else { redirect('/', 'refresh'); }

//      }

  /** Screen Name : Transfer And Promotions -> Pending Student Transfer
   *  Purpose     : Pending Student Transfer
   *  Refer       : In emis-code done by MR Magesh/ramco (ctrl : Home -> fns : emis_school_transferrequest ) 
   */
   public function school_transferrequest_get()
   {

        $school_id=$this->get('school_id');
        $data = $this->Studentmodel->getrequestedstudents($school_id);

        //     $user_type_id=$this->session->userdata('emis_user_type_id');
        //     if($user_type_id==1){
        //          $emis_templog =$this->session->userdata('emis_school_templog');
        //          $emis_templog1 =$this->session->userdata('emis_school_templog1');
        //          if($emis_templog==0 || $emis_templog1==0){
        //              redirect('home/emis_school_gotoredirect','refresh');
        //          }else{
        //              $this->load->view('emis_school_transferrequest',$data); 
        //          }
        //     }else if($user_type_id==3 || $user_type_id==2 || $user_type_id==5){
        //              $this->load->view('emis_school_transferrequest',$data);
        //     }
        $this->response(['dataStatus' => true,
                         'status'  => REST_Controller::HTTP_OK,
                         'result'  => $data ],REST_Controller::HTTP_OK);
   }

//******************************END Raise transfer request ****************************

        /** Screen Name : Student List
         *  Purpose     : listing all student with master Datas
         *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_student_classwise 
         */
        public function emis_school_student_classwise_with_master_data_post(){
      
            $records = $this->post('records');             
            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $section_id = $records['section'];

            $data['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id);
                    
            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            $data['district'] = $this->Schools_homemodel->get_common_table_details('schoolnew_district');
            $data['bloodgroup'] = $this->Schools_homemodel->get_common_table_details('baseapp_bloodgroup');
            $data['occpation'] = $this->Schools_homemodel->get_common_table_details('baseapp_occupation');
            $data['parentIncome'] = $this->Schools_homemodel->get_common_table_details('baseapp_parentincome');
            $data['medium_sec'] =  $this->Schools_homemodel->getallmediumofinst($school_id);
            $data['mother_tang'] = $this->Schools_homemodel->get_common_table_details('schoolnew_mediumofinstruction');

            $data['disabilities'] = $this->Schools_homemodel->get_common_table_details('baseapp_differently_abled');
            $data['religions'] = $this->Schools_homemodel->get_common_table_details('baseapp_religion');
            $data['school_classwise'] = $this->Schools_homemodel->get_schoolwise_classes($school_id);
            $data['rtetype'] = $this->Schools_homemodel->getrte_type();
            
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);

        }
		
			/** Screen Name : StudentTagging
			 *  Purpose     : Student listing ,Dropdowns for studenttagging
			 * functin created by      : Tamilmaran-venba
			 */
		 public function classwise_students_list_tagging_post(){

            $records = $this->post('records');
            $class_id = $records['class_id'];
            $section_id = $records['section'];
            $school_id = $records['school_id'];
            $data['studentlist'] = $this->Studentmodel->get_classwise_student_details($class_id,$section_id,$school_id); 
            $data['rte_type']=$this->Studentmodel->baseapp_rte_type();
	        $data['cwse']=$this->Studentmodel->baseapp_differently_abled();
	        $data['benefit']=$this->Studentmodel->student_ied_benefits();
            $data['present_status']=$this->Studentmodel->student_present_status();
			$data['sector_list'] = $this->Studentmodel->dropdown_dtls(array('id','sector'),'student_nsqf_sector');
            $data['job_role_list'] = $this->Studentmodel->dropdown_dtls(array('id','job_role'),'student_nsqf_job_roles');
			$data['trstse_all']=$this->Studentmodel->getscheme_trstse_all($school_id);
            $data['sportslist']=$this->Studentmodel->getsports_list();
	        $data['classDetails'] = $this->Studentmodel->getClassDetail1($school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);

        }
		
		   /* End of the function */
		   
		   
		   	/** Screen Name : StudentTagging
			 *  Purpose     : Student listing ,Dropdowns for studenttagging
			 * functin created by      : Tamilmaran-venba
			 */
		 public function students_taggingdata_post(){

            $records = $this->post('records');
	
			//die();
            // $class_id = $records['class_id'];
            // $section_id = $records['section'];
            // $school_id = $records['school_id'];
			// $student_id = $records['student_id'];
			 
			 
           //$data['student_tag']=$this->Homemodel->getscheme_search_stud($school_id,$classnumber,$sectionname);
          $data['student_tag1']=$this->Studentmodel->getscheme_search_stud1($records);
              //$school_id,$student_id,$classnumber,$sectionname); 
            
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);

        }
		
		
		
		   /* End of the function */
		   
		
		
		  /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging RTE Data
           *  Fuctionality createdby : Tamilmaran-venba
           */
			public function save_students_tagging_rte_post(){

            $records = $this->post('records');

            if(!empty($records)){       
                    $saves['child_admitted_under_reservation'] = $records['rte'];
                    $saves['rte_type'] = $records['rte_type'];
                    $saves['school_id'] = $records['school_id'];
                    $saves['unique_id_no'] = $records['unique_id_no'];
                    $saves['user_id'] = $records['UsrID'];
                    $saves['old_field_value'] = $records['OldFldVal'];
                    $saves['approval_status'] = $records['ApprvlSts'];
                    $saves['approval_flag'] = $records['ApprvlFlg'];
                    $saves['approving_authority_type'] = $records['ApprvngAuthTyp'];
                    $saves['field_id'] = $records['FldId'];



                    $result = $this->Studentmodel->studchild_stud_tagging_rte($saves);
                    $result['status'] = REST_Controller::HTTP_OK;
                    $this->response($result,REST_Controller::HTTP_OK);
            }
            else{
                    $result['dataStatus'] = false;
                    $result['status'] = REST_Controller::HTTP_NOT_FOUND;
                    $result['message'] = 'Data Not Found ! ';
                    $this->response($result,REST_Controller::HTTP_OK);
            }   
        }
		/* End of the function */
		
		  /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging CWSN Data
           * functin created by      : Tamilmaran-venba
           */
			public function save_students_tagging_cwsn_post(){
            $records = $this->post('records');
            if(!empty($records)){        
			    
                $saveied['school_id'] =$records['school_id'];
                $saveied['student_id'] =$records['unique_id_no'];
                $saveied['national_id'] =$records['nation_id'];
                $saveied['differently_type'] =$records['cwsn'];
                $saveied['benefit'] =$records['benefit'];
                $saveied['provided_by'] =$records['provided_by'];
                $saveied['acad_year'] =$records['academic_year'];
                $saveied['isactive'] =1;
                $saveied['created_at']=date("Y-m-d H:i:s");
			
                $result = $this->Studentmodel->studsch_stud_taggingied($saveied);
                $result['status'] = REST_Controller::HTTP_OK;
                $this->response($result,REST_Controller::HTTP_OK);

            }
            else{
                $result['dataStatus'] = false;
                $result['status'] = REST_Controller::HTTP_NOT_FOUND;
                $result['message'] = 'Data Not Found ! ';
                $this->response($result,REST_Controller::HTTP_OK);
            }
        }
		
		/* End of the function */
		
		 /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging AWARDS Data
           * functin created by      : Tamilmaran-venba
           */
			public function save_students_tagging_awards_post(){
			$records = $this->post('records'); 
			$savescholor['school_id'] = $records['school_id'];
            $savescholor['student_id'] = $records['unique_id_no'];
            $nmmsdate = $records['nmms_exam_passed'];
            $nmms=explode("GMT",$nmmsdate);
            $nmms_date= strtotime($nmms[0]);
            
            $savescholor['nmmsexam_passed'] = date("Y-m-d",$nmms_date);
            
            $trstsedate = $records['trstse_exam_passed'];
            $trstse=explode("GMT",$trstsedate);
            $trstse_date= strtotime($trstse[0]);
            $savescholor['trstse'] = date("Y-m-d",$trstse_date);
            
            $inspiredate = $records['inspire_award_date'];
            $inspire=explode("GMT",$inspiredate);
            $inspire_date= strtotime($inspire[0]);
			$savescholor['inspire'] = date("Y-m-d",$inspire_date);
			$savescholor['remarks'] = $records['inspire_award_topic'];
			$savescholor['class'] = $records['class_id'];
			$savescholor['section'] = $records['class_id'];
			$savescholor['status'] = 1;
			$savescholor['created_date']=date("Y-m-d H:i:s");
			
			// print_r($savescholor);
			// die();
		  $result = $this->Studentmodel->studsch_stud_tagging($savescholor);
           // $arr = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id); 
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
		
		/* End of the function */
		
		 /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging SPORTS Data
           * functin created by      : Tamilmaran-venba
           */
			public function save_students_tagging_sports_post(){
            $records = $this->post('records'); 
            $savestudent_participate['school_id'] = $records['school_id'];
			$savestudent_participate['student_id'] = $records['unique_id_no'];
            $savestudent_participate['game_participating'] = $records['participating_game_name'];
            $savestudent_participate['last_participating_date'] = $records['participating_date'];
            $savestudent_participate['last_participating_level'] = $records['participating_level'];
            $savestudent_participate['winner_level_details'] = $records['winner_level'];
            $savestudent_participate['status'] = 1;
            $savestudent_participate['created_date']=date("Y-m-d H:i:s");
            $result = $this->Studentmodel->insert_student_participate($savestudent_participate);
           
          
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
		
		/* End of the function */
		 /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging OSC Data
           * functin created by      : Tamilmaran-venba
           */
			public function save_students_tagging_osc_post(){
			$records = $this->post('records'); 
			//print_r($records);
           // die();
            
            $save_OSC['school_id']= $records['school_id'];
	        $save_OSC['name']=$records['student_name'];
         	$save_OSC['unique_id_no']=$records['unique_id_no'];
            $save_OSC['osc']=1;
            $save_OSC['present_status']=$records['present_status'];
            $save_OSC['ac_year']=$records['ac_year'];
            $save_OSC['training_type']=$records['training_type'];
            $result = $this->Studentmodel->insert_student_osc($save_OSC);
           
            
           // $arr = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id); 
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
		
		/* End of the function */
		
		 /** Screen Name : StudentTagging
           *  Purpose     : Save student Tagging VOCATION Data
           * functin created by      : Tamilmaran-venba
           */
			public function save_students_tagging_vocation_post(){
			$records = $this->post('records'); 
			
            $save_vocation_dtl['school_key_id'] =$records['school_id'];
            $save_vocation_dtl['unique_id_no'] = $records['unique_id_no'];
            $save_vocation_dtl['class_studying_id'] = $records['class_id'];
            $save_vocation_dtl['community_id'] = $records['community_id'];
            $save_vocation_dtl['gender'] = $records['gender'];
            $save_vocation_dtl['class_section'] = $records['section'];
            $save_vocation_dtl['nsqf_sector'] = $records['sector'];
            $save_vocation_dtl['nsq_job_role'] = $records['jobrole'];
            $save_vocation_dtl['isactive'] = 1;
            $save_vocation_dtl['createdat']=date("Y-m-d H:i:s");
            $result = $this->Studentmodel->stud_vocation_dtl($save_vocation_dtl);
           // $arr = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id); 
           if(count($result))
           {
                  $data['dataStatus'] = true;
                  $data['status'] = REST_Controller::HTTP_OK;
                  $data['message'] = 'Updated Successfully';
                  $this->response($data,REST_Controller::HTTP_OK);
           } 
           else
          {
                  $data['dataStatus'] = false;
                  $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                  $data['message'] = 'Data Not Found!';
                  $this->response($data,REST_Controller::HTTP_OK);
          }

        }
		
		/* End of the function */
		
		
		
public function get_students_wise_report_post()
{
  
      $records = $this->post('records');
//print_r($records);
//die();
            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $section_id = $records['section'];
            $date       =    $records['date'];
					if(!empty($date)){
					$date = '01-'.$date;
					}else
					{
					  $date = date('01-m-Y',strtotime("-1 month"));
					}
    if(!empty($class_id) && !empty($section_id) && !empty($date)){
            $table = 'students_attend_yearly';
             
      
   
    $data['students_section_details'] = $this->Studentmodel->get_attendance_sectionwise_details($school_id,$class_id,$section_id,$table,$date);
	
	
    }
	 $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);
   
  
 
}
      

        /** Screen Name : Student List ( alternative fns)
         *  Purpose     : listing all student with master Datas
         *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_student_classwise 
         */
        public function emis_school_student_classwise_post()
        {
         
            $records = $this->post('records');  

            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $section_id = $records['section'];
            $update_status = $records['update_status'];
            $update_data = $records['update_data'];

            if(!empty($class_id)){
            $section_id = '';
            $data['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,'');
            }else if($update_status=='success'){
                $class_id = $update_data['class_studying_id'];
                $section_id = '';
                $data['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,'');
            }else{
                $data['allstuds'] = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,'');
            }

            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            $data['district'] = $this->Schools_homemodel->get_common_table_details('schoolnew_district');
            $data['bloodgroup'] = $this->Schools_homemodel->get_common_table_details('baseapp_bloodgroup');
            $data['occpation'] = $this->Schools_homemodel->get_common_table_details('baseapp_occupation');
            $data['parentIncome'] = $this->Schools_homemodel->get_common_table_details('baseapp_parentincome');
            $data['medium_sec'] =  $this->Schools_homemodel->getallmediumofinst($school_id);
            $data['mother_tang'] = $this->Schools_homemodel->get_common_table_details('schoolnew_mediumofinstruction');

            $data['disabilities'] = $this->Schools_homemodel->get_common_table_details('baseapp_differently_abled');
            $data['religions'] = $this->Schools_homemodel->get_common_table_details('baseapp_religion');
            $data['school_classwise'] = $this->Schools_homemodel->get_schoolwise_classes($school_id);
	        $data['rtetype'] = $this->Schools_homemodel->getrte_type();

            $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message' => (!empty($update_status)) && $update_status =='success' ? $update_data['name'].' Profile Update successfully' : '',
                        'result'  => $data ],REST_Controller::HTTP_OK);
        }


      

        /** Screen Name : Students List ( Update Students Profile )
         *  Purpose     : To Update Students Profile
         *  Refer       : In emis-code done by MR Sriram/venba 19/03/2019 (ctrl : Home -> fns : update_student_profile ) 
         *  Note        : fully changed as per the flow.for references use the mentioned controller and functions.
         */
        public function to_update_student_details_post(){
            date_default_timezone_set('Asia/Kolkata');
            $token = Common::userToken();
            $usertype_id = (int)$token['emis_usertype'];            
		    if($usertype_id === 1){ $school_id = (int)$token['school_id']; }else{ $school_id = 0;}
            

            $records = $this->post('records');  
            $constant = constant($this->post('constant'));
            $promote_history = $this->post('promote_history');
            if(!empty($records)){

                    $pkid = $records['id'];
                    $unique_id = $records['unique_id_no'];
                    $image_data = $records['image_data'];
                    $flag = 0;
                    // $records['aadhaar_uid_number'] === '0' || $records['aadhaar_uid_number'] === '' ? isset(null) : $records['aadhaar_uid_number'];
                    
                    $image_name = !empty($records['image_name'])?$records['image_name']:$unique_id.'.jpg';
                    

                    if(!empty($image_data)){
                        $this->base_get($image_data,$image_name,$unique_id);
                        $records['photo'] = $image_name;
                        $flag = 1;
                    }
                    if(!empty($promote_history)){
                        // print_r($promote_history);
                        $r = $this->Studentmodel->insert_promote_history($promote_history);
                        // echo $r;
                    }
                    unset($records['image_name']);
                    unset($records['image_data']);
                    $records['updated_at'] = date('Y-m-d h:i:s');
                    $affRowCount = $this->Studentmodel->update_student_profile($records,$constant);
                    if($school_id != 0){$studExtn=$this->Studentmodel->updateStudExtID($pkid,$school_id,$unique_id);}else{$studExtn='';}

                    if($affRowCount > 0){

                        $this->response(['dataStatus' => true,
                                        'status'  => REST_Controller::HTTP_CREATED,
                                        'message' => 'Successfully Updated',
                                        'additionalMessage'=>$studExtn,
                                        'affRowCount'  => $affRowCount ],REST_Controller::HTTP_OK);
                    }
                    else if($flag){
                        $this->response(['dataStatus' => true,
                                        'status'  => REST_Controller::HTTP_OK,
                                        'message' => 'Successfully Uploaded',
                                        'additionalMessage'=>$studExtn,
                                        'affRowCount'  => 0 ],REST_Controller::HTTP_OK);
                    }
                    else {

                        $this->response(['dataStatus' => false,
                                         'status'  => REST_Controller::HTTP_NO_CONTENT,
                                         'additionalMessage'=>$studExtn,
                                         'message' => 'No Changes Made ! ',
                                        ],REST_Controller::HTTP_OK);

                    }
            }
            else{
                $this->response(['dataStatus' => false,
                                 'status'  => REST_Controller::HTTP_NOT_FOUND,
                                 'message' => 'Data Not Found ! ',
                                ],REST_Controller::HTTP_OK);

            }

        }
    

        public function student_summary_classwise_get() { 
          $school_id = $this->get('school_id');
          $student_summary = $this->Studentmodel->student_summary($school_id);
          $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $student_summary ],REST_Controller::HTTP_OK);
        }

        public function student_summary_classwise_11_12_get()
        {
            $school_id = $this->get('school_id');
            $student_summary = $this->Studentmodel->student_summary_11_12($school_id);
            $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'result'  => $student_summary ],REST_Controller::HTTP_OK);
            
        }

        /** Screen Name : Previous XII details
         *  Purpose     : Student listing for Last 2 academic yr (18-19 and 19-20)
         *  Done By     : venba/ps 
         */
        public function emis_previous_XII_dtls_post()
        {
            $records = $this->post('records');  
            $school_udise_code = $records['emis_school_udise'];
            $school_management_type = $records['school_manage'];
            $data['acyr_1718_dtls'] = $this->Studentmodel->get_previous_XII_dtls($school_udise_code,'dge_class12_2018');
            $data['acyr_1819_dtls'] = $this->Studentmodel->get_previous_XII_dtls($school_udise_code,'dge_class12_2019');
            $data['school_manage'] = $school_management_type;

                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'result'  => $data ],REST_Controller::HTTP_OK);
            
            
            }
  
        /** Screen Name : Previous XII details
         *  Purpose     : add the Student listing  
         *  Done By     : venba/ps 
         */
        public function add_previous_XII_dtls_post()
        {
           $records = $this->post('records');  
           date_default_timezone_set('Asia/Kolkata');
           $school_udise_code = $records['school_udise_code'];
           $records['created_at'] = date('Y-m-d h:i:s');
           $check = $this->Studentmodel->check_with_exist_regno($records['regno']);
          //  echo '$check = '.$check;
           if($check == 0){
              $save_data = $this->Studentmodel->insert_previous_XII_dtls($records);
              // echo "save_data = ".$save_data;
              $resp = $save_data ? "Student Successfully" : "Something Went Wrong..." ; 
           }
           else if($check > 0){
              $resp = "Sorry., Data Already Exist.." ;
           }
           else{
              $resp = "Something Went Wrong...";
           }
  
           $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message' => $resp],REST_Controller::HTTP_OK);
    
        }

        /** Screen Name : Previous XII details
         *  Purpose     : add the Student listing  
         *  Done By     : venba/ps 
         */
        public function edit_previous_XII_dtls_post()
        {
           $id = $this->post('id');
           $records = $this->post('records');
           $edited_data = $this->Studentmodel->update_previous_XII_dtls($id,$records);
           $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message' => $edited_data == true ? "Student Updated Successfully" : "Something Went Wrong...",
                         ],REST_Controller::HTTP_OK);
        }
        /** Previous XII details Ends Here  */

	/*****************************************************************
				Student Update Api Done By Ramco Magesh
	******************************************************************/
	/*public function UpdateStudentProfile_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		if($emis_loggedin){
			date_default_timezone_set('Asia/Calcutta');	
            $json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$image_data = $data['emis_image_data'];
			$image_name = $data['emis_image_name'];
			$unique_id  = $data['emis_reg_stu_uni_id'];
			$data = array(
				'id'									=>$data['emis_student_id'],
                'user_id'                  				=>$data['emis_reg_stu_id'],
                'name'                					=>$data['emis_reg_stu_name'],
                'name_tamil'          					=>$data['emis_reg_stu_idname'],
                'religion_id'         					=>$data['emis_reg_religion'],
                'community_id'        					=>$data['emis_reg_community'],
                'subcaste_id'         					=>$data['emis_reg_subcaste'],
                'pass_fail'           					=>$data['students_status'],
                'aadhaar_uid_number'  					=>$data['emis_reg_stu_aadhaar'],
                'dob'                 					=>date('Y-m-d',strtotime($data['emis_stu_dob'])),
                'doj'                 					=>date('Y-m-d',strtotime($data['emis_reg_stu_doj'])),
                'gender'              					=>$data['emis_reg_stu_gender'],
                'bloodgroup'          					=>$data['emis_reg_stu_bg'],
                'mothertounge_id'     					=>$data['emis_reg_stu_lang'],
                'disadvantaged_group' 					=>$data['emis_disad_group_name'],
                'differently_abled'   					=>$data['emis_disability_type_name'],
                'mother_name'         					=>$data['emis_reg_mothername'],
                'father_name'         					=>$data['emis_reg_fathername'],
                'guardian_name'       					=>$data['emis_reg_guardianname'],
                'father_occupation'   					=>$data['emis_reg_fatheroccu'],
                'mother_occupation'   					=>$data['emis_reg_motheroccu'],
                'parent_income'       					=>$data['emis_reg_parents_income'],
                'phone_number'        					=>$data['emis_reg_mobile'],
                'email'               					=>$data['emis_reg_email'],
                'house_address'       					=>$data['emis_reg_stu_door'],
                'street_name'         					=>$data['emis_reg_stu_street'],
                'area_village'        					=>$data['emis_reg_stu_city'],
                'district_id'         					=>$data['emis_reg_stu_district'],
                'pin_code'            					=>$data['emis_reg_stu_pincode'],
                'school_id'           					=>$this->session->userdata('emis_school_id'),
                'class_studying_id'   					=>($data['emis_class_studying']==null?$data['emis_class_studying']:$data['emis_class_studying']),
                'class_section'       					=>$data['emis_reg_stu_section'],
                'prv_class_std'       					=>$data['emis_prev_class'],
                'transfer_flag'       					=>0,
                'rte_type'			  					=>$data['rtetype'],
                'school_admission_no' 					=>$data['emis_reg_stu_admission'],
                'education_medium_id' 					=>$data['emis_reg_mediofinst'],
                'unique_id_no'        					=>$data['emis_reg_stu_uni_id'],
                'group_code_id'       					=>$data['emis_reg_grup_code'],
                'child_admitted_under_reservation'   	=>$data['emis_reg_stu_rte'],
                'student_admitted_section'           	=>$data['emis_reg_stu_aidunaid'],
                'status'                             	=>"Active",
				'photo'									=>(!empty($image_name)?$image_name:$data['emis_reg_stu_uni_id'].'.jpg'),		
                'updated_at' 							=>date('Y-m-d H:i:s')
            );
			
			if(!empty($image_data)){
				$this->base_get($image_data,$image_name,$unique_id);
			}
			
			if($result = $this->Studentmodel->UpdateStudentProfile($data)){
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}*/

    public function base_get($image_data,$image_name,$uniqueid){ 
        $dt = $image_data;
        $base64_img =  str_replace("[removed]","data:image/png;base64,", $dt);
        $output_file = APPPATH."docs/temp_base64_image.jpg";
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < 5; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
		$temp_file_name = $randomString.date('Y-m-d-H:m:s');
        $ifp = fopen( $output_file, 'wb' ); 
        $dt = explode( ',', $base64_img );
        fwrite( $ifp, base64_decode( $dt[ 1 ] ) );
        fclose( $ifp );
        $students_id = $image_name;
        $key = Students_EMIS.'/'.$students_id;
        $tmp = $output_file;    
        $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$key,$tmp);
	}
	/******************************************************************************************
						End
	******************************************************************************************/
	
	/*****************************************************************************************
			Student Get Invalid Aadhar & Phone done by Ramco Magesh
	*****************************************************************************************/
	public function students_invalidaadharnocount_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$result = $this->Studentmodel->student_invalidaadharnocount($school_id);
			//print_r($result); die();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
    /*****************************************************************************************
			Student Get Invalid Aadhar & Phone done by Ramco Magesh
	*****************************************************************************************/
	
    public function students_invalidaadharno_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$result = $this->Studentmodel->student_invalidaadharno_list($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function students_invalidphonenocount_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$result = $this->Studentmodel->student_invalidphnno_count($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function students_invalidphoneno_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$result = $this->Studentmodel->student_invalidphnno_list($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/***********************************
		Check Aadhar Number & Update
	***********************************/

	public function studentcheckaadharno_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$aadhar = $_GET['aa'];//$this->input->post('aadhar');
			$result = json_decode(json_encode($this->Studentmodel->get_aadhar($aadhar)),true);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Something Went Wrong','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function updateaadhar_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$aadhar = $data['aadhar'];
			$studentid = $data['studentid'];
			$data =array(
				'aadhaar_uid_number' =>$aadhar
			);
			if($result = json_decode(json_encode($this->Studentmodel->studentaadharupdate($data,$studentid)),true)){
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
			}else{
				$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	public function updatephone_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$phone = $data['phoneno'];
			$studentid = $data['studentid'];
			$data =array(
				'phone_number' =>$phone
			);
			
			if($result = json_decode(json_encode($this->Studentmodel->studentphoneupdate($data,$studentid)),true)){
				$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
			}else{
				$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
			}
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
    /**Student Absentees in exam api by wesley**/
    public function stu_exam_absent_check_post(){
        $records = $this->post('records');
        $reg_no = $records['reg_no'];
        $tname = 'students_exam_absentees';

        if(!empty($reg_no)){
            $data=$this->Studentmodel->stud_abs_chk($tname,$reg_no);
            if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Available',
                                'result' => $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }                
        }
        else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_NOT_FOUND);
        }   
    }

    public function stu_exam_response_post(){
        $records = $this->post('records');            
        $tname = 'students_exam_absentees';
        //print_r($records);die();
        if(!empty($records)){
            $data=$this->Studentmodel->stud_response_on_exam($tname,$records);
            if(!empty($data)){ 
                //if($data['status'] == '1'){
                    //unset($data['status']);
                    $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Updated',
                                // 'result' => $data
                            ],REST_Controller::HTTP_OK); 
                // }else{
                //     $this->response(['dataStatus' => true,
                //                 'status'  => REST_Controller::HTTP_OK,
                //                 'message' => 'Data Inserted successfully'
                //                 ],REST_Controller::HTTP_OK); 
                // }                   
                                                           
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Unable to Update.Please check your Register No',
                                ],REST_Controller::HTTP_OK);
            }                
        }
        else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_NOT_FOUND); 
        }   
    }

    public function stu_exam_absent_check_tenth_post(){
        $records = $this->post('records');
        $roll_no = $records['roll_no'];
        //$tname = 'dge_class10_2020';
        $tname = 'dge_class_10_11_2020';

        if(!empty($roll_no)){
            $data=$this->Studentmodel->stud_abs_chk_tenth($tname,$roll_no);
            if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Available',
                                'result' => $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }                
        }
        else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_NOT_FOUND);
        }   
    }

    public function EMIS_stu_id_validatn_post(){
        $records = $this->post('records');
        $stu_id = $records['stu_id'];
        $tname = 'students_child_detail';
        //echo $stu_id;die();
        if(!empty($stu_id)){
            $data=$this->Studentmodel->stud_id_validtn($tname,$stu_id);
           // print_r($data);die();
            if($data['status'] == 'true'){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Available',
                                'result' => $data['result']],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Invalid Student_ID.',
                                ],REST_Controller::HTTP_OK);
            }                
        }
        else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function stu_exam_response_tenth_post(){
        $records = $this->post('records');            
        //$tname = 'dge_class10_2020';
        $tname = 'dge_class_10_11_2020';
        //print_r($records);die();
        if(!empty($records)){
            $data=$this->Studentmodel->stud_response_on_exam_tenth($tname,$records);
            if(!empty($data)){ 
                //if($data['status'] == '1'){
                    //unset($data['status']);
                    $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Updated',
                                // 'result' => $data
                            ],REST_Controller::HTTP_OK); 
                // }else{
                //     $this->response(['dataStatus' => true,
                //                 'status'  => REST_Controller::HTTP_OK,
                //                 'message' => 'Data Inserted successfully'
                //                 ],REST_Controller::HTTP_OK); 
                // }                   
                                                           
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Unable to Update.Please check your Register No',
                                ],REST_Controller::HTTP_OK);
            }                
        }
        else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_NOT_FOUND); 
        }   
    }

    /**Student Absentees in exam api by wesley**/
	
	/*********************************************
			End
	*********************************************/


    /**** Start by Nirmal **/

public function IED_Students_Report_get(){
       
    $ts=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($ts[1]),true);
    $emis_loggedin=$token['status'];
    $emis_user_type_id = $token['emis_usertype'];
    $district_id= $this->get('district_id');
    $block_id= $this->get('block_id');
    $udise_code=$this->get('udise_code');
     $school_type=$this->get('school_type');     
    if($emis_loggedin == "Active")
    {
            //State
            if($emis_user_type_id == 5)
            {
                if($district_id!="" || $block_id!="" || $udise_code!="")
                {
                   $dist_id =$district_id;
                   $udse_code =$udise_code;
                    $blck_id =$block_id;
                }
                else
                {
                  $dist_id ="";     
                }
                  
            }
            //CEO
            if($emis_user_type_id == 9 || $emis_user_type_id == 14)
            {
             if($block_id!="" || $udise_code!="")
                {
                   
                  $blck_id =$block_id;
                  $udse_code =$udise_code;
                }
                else
                {
                  $dist_id =$token['district_id'];   
                }
               
            }
            //BEO
            if($emis_user_type_id == 6)
            {
                if($udise_code!="")
                {
                 $udse_code =$udise_code;
                }
                else
                {
                  $blck_id =$token['block_id'];   
                }
               
            }
            //School
            if($emis_user_type_id == 1)
            {
            $udse_code =$token['udise_code'];  
            }

             //DC
            if($emis_user_type_id == 3)
            {
                if($block_id!="" || $udise_code!="")
                {
                   
                  $blck_id =$block_id;
                  $udse_code =$udise_code;
                }
                else
                {
               $dist_id =$token['emis_user_id'];
               }     
            }
          
          //BLOCK
            if($emis_user_type_id == 2)
            {
                if($block_id!="" || $udise_code!="")
                {
                   
                  $blck_id =$block_id;
                  $udse_code =$udise_code;
                }
                else
                {
               $blck_id =$token['block_id'];   
               }     
            }


      
            $data=$this->Studentmodel->IED_std_report($dist_id,$blck_id,$udse_code,$school_type);
            if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Available',
                                'result' => $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'result' => '',
                                ],REST_Controller::HTTP_OK);
            }                
       
    }


}

public function Diff_Abled_Det_get()
{
      $data=$this->Studentmodel->diff_able();
      if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Available',
                                'result' => $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }           

}

public function Edit_IED_Students_post()
{    $records = $this->post('records'); 
    $update_data=$this->Studentmodel->edit_IED_std($records);
   
    if(!empty($update_data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Updated Successfully!!'],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }        
   
}
public function Retrieve_Ifsc_Bank_det_get()
{
   
     $records = $this->get('ifsc_code'); 
    $data=$this->Studentmodel->bank_retreive_details($records);
    if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Updated Successfully!!',
                                'data'=> $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }        
}
public function Get_IEDStudents_get()
{
 $student_id = $this->get('student_id');
  $data=$this->Studentmodel->get_ied_student($student_id);
    if(!empty($data)){                    
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Data Updated Successfully!!',
                                'data'=> $data],REST_Controller::HTTP_OK);
                                        
            }else{
                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'No data found.',
                                ],REST_Controller::HTTP_OK);
            }        
}
/** ENd By Nirmal **/

public function students_club_participation_get(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    if($emis_loggedin) {
      $emis_usertype = (int)$token['emis_usertype'];
      if($emis_usertype == 1){
        $school_id = (int)$token['emis_user_id'];
        if($school_id !=''){
            $data=$this->Studentmodel->students_club_participation($school_id);
            if(!empty($data)){                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Student`s Club Participation Details!','result'=> $data],REST_Controller::HTTP_OK);                                  
            } else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'Details Not Found.','result'=> array()],REST_Controller::HTTP_OK);
        } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Data Not Found!','result'=> array()],REST_Controller::HTTP_OK); 
      } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_FORBIDDEN,'message'=>'Invaild User!','result'=> array()],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
public function students_covid_school_map_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
            $where = array("isactive"=>'1');
            $param = array("id as IndexID","student_id as StudentID","current_school_id as CurrentSchool","collection_school_id as CollectSchool","student_type as StudType","isactive as Status","benefit_type","district_id");
            $arr  = Common::get_multi_withdyncol_list($param,"students_covid_school_map",$where);
        if(!empty($arr)){$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'student COVID School Map Details','studCOVIDSchlMapDetails'  => $arr],REST_Controller::HTTP_OK);						  
        }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'Details Not Found . Please Try Again !','studCOVIDSchlMapDetails'=>array()],REST_Controller::HTTP_OK);   
    }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
}


public function UpdateTracking_Details_post()
{
     $records = $this->post('records');
     $id=$records['id'];
   
     if(!empty($records))
     {
            $data=$this->Studentmodel->Save_Tracking_details($records,$id);
            if(!empty($data))
            {                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Tracking Details Updated SuccessFully!!','result'=> $data],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'Unable To Save Data.'],REST_Controller::HTTP_OK);

     }
      else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Pararmters Issues Occurs !! '],REST_Controller::HTTP_OK);  

}
public function StudentDetails_Traked_get()
{
 
 $student_id = $this->get('student_id');
 

 if(!empty($student_id))
 {
      $data=$this->Studentmodel->Student_Tracking_details($student_id);
        if(!empty($data))
            {   
                for($i=0;$i<count($data);$i++){
                    if($data[$i]['distribute_date']=='0000-00-00'){
                        $data[$i]['distribute_date'] = '00-00-0000';                      
                    }
                    else if($data[$i]['distribute_date']==''){
                        $data[$i]['distribute_date'] = ''; 
                    }else{    
                        $original_date = $data[$i]['distribute_date'];
                        $timestamp = strtotime($original_date);
                        $data[$i]['distribute_date'] = date("d-m-Y", $timestamp);  
                    }                                      
                }
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Tracking Details !!','result'=> $data],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Data Not Exists!!.'],REST_Controller::HTTP_OK);
 }
 else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Pararmters Issues Occurs !! '],REST_Controller::HTTP_OK);  

}
public function BenefitBased_Dropdown_get()
{
 
   $id = $this->get('id');
   if(!empty($id))
   {

      $data=$this->Studentmodel->Benefit_List_details($id);
        if(!empty($data))
            {                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Tracking Details !!','result'=> $data],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Data Not Exists!!.'],REST_Controller::HTTP_OK);
 }
 else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Pararmters Issues Occurs !! '],REST_Controller::HTTP_OK);  
     
}
public function students_covid_school_map_updation_post(){
	$token = Common::userToken();
	$emis_loggedin=$token['status'];
	if($emis_loggedin){
		$records=$this->post('records');
				$id = $records['IndexID'];
				$info=array(
					'student_id'			 =>   $records['StudentID'],
					'current_school_id'		 =>   $records['CurrentSchool'],
					'collection_school_id'	 =>   $records['CollectSchool'],
					'student_type'			 =>   $records['StudType'],
                    'isactive'		 		 =>   $records['Status'],
                    'benefit_type'           =>   $records['benefit_type'],
                    'district_id'            =>   $records['district_id'],
                );
                if($records['benefit_type'] != ''){ $benefitType = explode(',',$records['benefit_type']); }else $benefitType = array(); 
                $result_delete = $this->Studentmodel->delete_students_covid_benefit_tracking($records['StudentID']);
                if(!empty($benefitType)){
                    for($i=0;$i<count($benefitType);$i++){
                        switch($benefitType[$i]){
                            case 1 : 
                                     for($j=1;$j<=4;$j++){ 
                                        $child[]=array(
                                            'student_id'			 =>   $records['StudentID'],
                                            'benefit_type'           =>   $benefitType[$i],
                                            'term'                   =>   $j,
                                            'distribute_date'        =>   NULL,
                                            'created_date'           =>   date('Y-m-d'),
                                            'isactive'		 		 =>   1,
                                        );
                                     }
                                     break;
                            case 2 : 
                            case 4 : 
                                     for($k=1;$k<=3;$k++){ 
                                        $child[]=array(
                                            'student_id'			 =>   $records['StudentID'],
                                            'benefit_type'           =>   $benefitType[$i],
                                            'term'                   =>   $k,
                                            'distribute_date'        =>   NULL,
                                            'created_date'           =>   date('Y-m-d'),
                                            'isactive'		 		 =>   1,
                                        );
                                     }
                                     break;
                            case 3 : 
                            case 5 : 
                                    $child[]=array(
                                        'student_id'			 =>   $records['StudentID'],
                                        'benefit_type'           =>   $benefitType[$i],
                                        'term'                   =>   1,
                                        'distribute_date'        =>   NULL,
                                        'created_date'           =>   date('Y-m-d'),
                                        'isactive'		 		 =>   1,
                                    );
                                     break;
                        }/** switch closed here */
                    }/** outer for close here */    
                    $result_child = $this->Studentmodel->insert_students_covid_benefit_tracking($child);
                }/** check bene arr closed here */ else{ $result_child =  'Benefit Type is empty in Parent-array';}
                $result = $this->Studentmodel->update_students_covid_school_map($id,$info);
                $result['status'] =  REST_Controller::HTTP_OK;
                $result['schoolMapping(parent)'] = $result['message'];
                $result['benefitDetails(child)'] = $result_child.' / '.$result_delete;                
				$this->response($result,REST_Controller::HTTP_OK);			
	}else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 

}
public function DCStudDtls_get(){
    $token = Common::token();
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_usertype == 3){ $dist = $token['emis_user_id']; }else{$dist = ''; }

    $result=$this->Studentmodel->dcstuddetails($dist);
    if(count($result) > 0){
        $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$result],REST_Controller::HTTP_OK);                                  
    }else{
        $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'no data'],REST_Controller::HTTP_OK);                                  
    }
}
public function DCReject_post(){
    $students_child_detail = $this->post('students_child_detail');
    $student_admit_log = $this->post('student_admit_log');
    if((!empty($students_child_detail)) && (!empty($student_admit_log))){   
        $result=$this->Studentmodel->dcapproval($students_child_detail,$student_admit_log);
        $this->response(['dataStatus' => $result,'status'  => REST_Controller::HTTP_OK,'message' => $result ? 'success' : 'fails'],REST_Controller::HTTP_OK);                                  
    }
    else{
        $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'no data'],REST_Controller::HTTP_OK);
    }
}
public function DCApproval_post(){
    $students_child_detail = $this->post('students_child_detail');
    $student_admit_log = $this->post('student_admit_log');
    if((!empty($students_child_detail)) && (!empty($student_admit_log))){   
        $result=$this->Studentmodel->dcapproval($students_child_detail,$student_admit_log);
        $this->response(['dataStatus' => $result,'status'  => REST_Controller::HTTP_OK,'message' => $result ? 'success' : 'fails'],REST_Controller::HTTP_OK);                                  
    }
    else{
        $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'no data'],REST_Controller::HTTP_OK);
    }
}
public function student_volunteer_post(){
    $data= $this->post('students_non_formal');
        foreach($data as $dt){ //need to check id in html
            $tevl = array(
                    'id' => $dt['IndxID'],
                    'school_id'      => $dt['SchlID'],
                    'student_name' 	 => $dt['StudNam'],
                    'gender'	     => $dt['Gendr'],
                    'da_type' 	     => $dt['Disability'],
                    'parent_type'    => $dt['ParentType'],
                    'parent_name'    => $dt['ParentName'],
                    'mother_tongue'    => $dt['MotherTongue'],
                    'academic_qualify'    => $dt['AcademicQualify'],
                    'aadhar_no' 	 => $dt['Aadhar'],
                    'mobile' 	     => $dt['Mobile'],
                    'social_category' => $dt['SocialCategory'],
                    'address' 	     => $dt['Address'],
                    'pincode' 	     => $dt['Pincode'],
                    'district_id' 	 => $dt['DistrictId'],
                    'native_district_id' 	 => $dt['NativeDistrictId'],
                    'dob'            => $dt['DOB'],
                    'doj'            => $dt['DOJ'],
                    'age'            => $dt['AGE'],
                    'Active' 	     => '1',
                    'created_date'   => date('Y-m-d H:i:s')
                );
            }
        $result=$this->Studentmodel->student_volunteersave($tevl);
        if(!empty($result))
        {
            $this->response(['dataStatus' => true, 'status'  => REST_Controller::HTTP_OK, 'message'=>'Successfully'],REST_Controller::HTTP_OK);     
        } else {
            $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
        }
}

public function student_volunteers_list_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $school_id=$_GET['school_id'];
    if($emis_loggedin){
        $result['students_non_formal'] = $this->Studentmodel->get_student_volunteer($school_id);
        $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
    }else{
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
    }
}
public function getStdFieldApproval_get()
{
      $result = $this->Studentmodel->get_student_field_list();
      if(!empty($result))
      {
       $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Retreived','result'=>$result],REST_Controller::HTTP_OK);
      }
      else
      {
 $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Not Found','result'=>array()],REST_Controller::HTTP_OK);
      }
}
public function VolntrTeachrInSchl_get()
{
    $school_id = $this->get('Schl_id');
    if(!empty($school_id))
    {
    $volunter_data = $this->Studentmodel->get_volunter_student_teacher_list($school_id);
     if(!empty($volunter_data))
            {                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Volunter Teacher In School','result'=> $volunter_data],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Data Not Exists!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    }
}
public function AssignTeacher_post()
{
    $records = $this->post('records');
    if(!empty($records))
    {


    $save_volunter_data = $this->Studentmodel->save_volunter_student_teacher_list($records);
     if(!empty($save_volunter_data))
            {                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Volunter Teacher In School Updated SuccessFully'],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Updated!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    }
}
public function AssigndStudTeachList_get(){
   $school_id = $this->get('Schl_id');
    if(!empty($school_id))
    {
    $std_data = $this->Studentmodel->get_assigned_std_list($school_id);
     if(!empty($std_data))
            {                    
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Student Assigned List','result'=> $std_data],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Data Not Exists!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    } 
}
public function InsrtUpdtInspctnReport_post()
{
    $records = $this->post('records');
   
    if(!empty($records))
    {
    $save_inscp_report = $this->Studentmodel->save_inspection_report($records);
     if(!empty($save_inscp_report))
            {        

                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Inspection Report $save_inscp_report SuccessFully"],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Updated!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    }
}
public function StudentDetail_get(){
    $User_id  = $this->get('UsrID');
    
    if(!empty($User_id))
    {
       
    $get_Std_Det = $this->Studentmodel->get_Student_details($User_id);
     if(!empty($get_Std_Det))
            {        

                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Student Details",'result'=>$get_Std_Det],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Load!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    }  
}


public function GetvolunteerAttentnance_get(){
  
       $emis_userid = $this->get('emis_user_id');
       $emis_usertype = $this->get('emis_usertype');
      
       if(!empty($emis_userid))
       {
        $get_volunteer_Attent = $this->Studentmodel->get_volunteer_Attent($emis_userid,$emis_usertype);
         $count = $this->Studentmodel->get_gender_count($emis_userid,$emis_usertype);
         $result =array('Volunteer_data' => $get_volunteer_Attent,'Attentance_data'=>$count);
        if(!empty($result))
               {        
   
                   $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Volunteer Attentance Details",'result'=>$result],REST_Controller::HTTP_OK);                                  
               }
               else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Load!!.'],REST_Controller::HTTP_OK); 
   
               
   
       }
       else
       {
           $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
       }  

       }

    public function GetAttentnancedtails_get(){
  
        $emis_username = $this->get('emis_username');
        $emis_usertype = $this->get('emis_usertype');
        $emis_user_id=$this->get('emis_user_id');
        if(!empty($emis_username))
        {
            $get_Attent1 = $this->Studentmodel->get_volunteer_Attent($emis_user_id,$emis_usertype);
            $get_Attent2 = $this->Studentmodel->get_AttentDet($emis_username,$emis_usertype); 
           $array =array('Volunteer_data'=>$get_Attent1,'Attentance_data'=>$get_Attent2);
            if(!empty($array))
            {    
              
                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Volunteer Attentance Details",'result'=>$array],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Load!!.'],REST_Controller::HTTP_OK); 

        }
        else
        {
            $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
        }  
     
     
     }
  
    

public function volunteerAttentnance_post()
{
    $records = $this->post('records');
   
    if(!empty($records))
    {
    $save_volunter_attentance = $this->Studentmodel->save_volunter_attentance($records);
   
     if(!empty($save_volunter_attentance))
            {
                if($save_volunter_attentance == 1)
                {
                    $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Volunteer Attenance Saved SuccessFully",'Status_data'=>$save_volunter_attentance],REST_Controller::HTTP_OK);                                  
                }  
                else if($save_volunter_attentance == 2)
                {
                    $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => "Volunteer Attenance Already Exist",'Status_data'=>$save_volunter_attentance],REST_Controller::HTTP_OK);                                  
                }
               
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Updated!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    }
}

public function req_raised_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $req_id=$_GET['req_id'];
    if($emis_loggedin){
        $result = $this->Studentmodel->get_req_raised($req_id);
        $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
    }else{
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
    }
}

public function req_update_post()
	{
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
        $records = $this->post('records');
		$result = $this->Studentmodel->req_stu_list($records);
		if(!empty($result))
        {
            $this->response(['dataStatus' => true, 'status'  => REST_Controller::HTTP_OK, 'message'=>'Successfully'],REST_Controller::HTTP_OK);     
        } else {
			$this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
        }
	}


    public function smart_card_details_get()
	{
		$token = Common::userToken();
        $emis_loggedin=$token['status'];
        $smart_id=$_GET['smart_id'];
        if($emis_loggedin){
            $result = $this->Studentmodel->get_smart_card_details($smart_id);
            $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
        }
        
    }
    
public function req_pending_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $scl_id=$token['school_id'];
    if($emis_loggedin){
        $result = $this->Studentmodel->get_req_pending($scl_id);
        $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);
    }else{
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
    }
}

/* REQUESET AND PENDING MOUDLE STARTED*/


public function getDataDC_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    
    if($emis_loggedin){
        $result = $this->Studentmodel->get_data_dc();
        if(!empty($result))
        {
            $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$result],REST_Controller::HTTP_OK);

        }
        else{
            $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Unable to Load','result'=>array()],REST_Controller::HTTP_OK);

        }
    }
           
}
public function dcApprvRejct_update_post(){
    $records = $this->post('records');
   
    if(!empty($records))
    {
    $update_Approval_Rejection = $this->Studentmodel->update_Approval_Rejection($records);
     if(!empty($update_Approval_Rejection))
            {        

                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => " Updated  SuccessFully"],REST_Controller::HTTP_OK);                                  
            }
            else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Unable to Updated!!.'],REST_Controller::HTTP_OK); 

    }
    else
    {
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'Pararmters Empty Value Occurs !! '],REST_Controller::HTTP_BAD_REQUEST);
    } 
}

public function StudentBankDetails_post()
 {
	 $records = $this->post('records');
	 if(!empty($records))
	 {
		$result = $this->Studentmodel->GetStdBnk_Det($records);

		if(!empty($result))
		{
		  $this->response(['dataStatus' => true,
					   'status'  => REST_Controller::HTTP_OK,
					  'message' => 'Stipend Student Bank details List',
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
	 else{
		$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Params Empty Passed!!','result'=>array()],REST_Controller::HTTP_OK);

	 }
 }

//  public function StudentBankDetailsID_post()
//  {
// 	 $records = $this->post('records');
// 	 if(!empty($records))
// 	 {
// 		$result = $this->Studentmodel->GetStdBnkID_Det($records);

// 		if(!empty($result))
// 		{
// 		  $this->response(['dataStatus' => true,
// 					   'status'  => REST_Controller::HTTP_OK,
// 					  'message' => 'Stipend Student Bank details List',
// 					  'result'=>$result,],REST_Controller::HTTP_OK);
// 		}
// 		else
// 		{
// 		  $this->response(['dataStatus' => true,
// 						'message'=>'No Data Found',
// 					   'status'  => REST_Controller::HTTP_OK,
// 					  'result' => '',],REST_Controller::HTTP_OK);
// 		}  

// 	 }
// 	 else{
// 		$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Params Empty Passed!!','result'=>array()],REST_Controller::HTTP_OK);

// 	 }
//  }
public function AccntDetailsInstUpdDlt_post() {
    $records = $this->post('records');
    if(!empty($records)) {
        $result = $this->Studentmodel->AccntDetails_InsrtUpdt($records);
        if(!empty($result)) {
			if($result == 1) {
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
			   'message' => 'Account Details Inserted SuccessFully !!',
			   'result'=>$result,],REST_Controller::HTTP_OK);
			}
			if($result == 2) {
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
			   'message' => 'Account Details  Updated SuccessFully !!',
			   'result'=>$result,],REST_Controller::HTTP_OK);
			}
			if($result == 3) {
				$this->response(['dataStatus' => true,
				'status'  => REST_Controller::HTTP_OK,
			   'message' => 'Account Details Deleted SuccessFully !!',
			   'result'=>$result,],REST_Controller::HTTP_OK);
			}
		
		} else {
		  $this->response(['dataStatus' => true,
						'message'=>'No changes in Update!Unable To Update',
					   'status'  => REST_Controller::HTTP_OK,
					  'result' => '',],REST_Controller::HTTP_OK);
		}  
    } else {
        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message' => 'Params Empty Passed!!',
                        'result'=>array()],REST_Controller::HTTP_OK);
	} 
}


    
}

?>