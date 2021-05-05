<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/third_party/mpdf/mpdf.php';

class Registration extends REST_Controller{

        function __construct(){
                parent::__construct();

                $this->load->helper(array('form','url','html'));
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper('security');
                $this->load->database(); 
                $this->load->model('Registrationmodel');
                $this->load->model('Homemodel');
                $this->load->model('Studentmodel');
                $this->load->model('Schools_homemodel');
                $this->load->model('Datamodel');
                $this->load->helper('common_helper');
            
        }

        /** Screen Name : Student admission ( new entry )
         *  Purpose     : to Load the masterdetails in screen
         *  Refer       : In emis-code done by MR Sriram/venba (ctrl : Registration -> fns : emis_student_reg ) 
         */
        public function emis_student_reg_get(){
            
            $school_id = $this->get('school_id');
            
            $arr['incomes'] = $this->Registrationmodel->getallincomes('baseapp_parentincome');
            $arr['religions'] = $this->Registrationmodel->getallreligions();
            $arr['launguages'] = $this->Registrationmodel->getalllaunguages();
            $arr['disadvantages'] = $this->Registrationmodel->getalldisadvantages();
            $arr['disabilities'] = $this->Registrationmodel->getalldisabilities();
            $arr['schooldist'] = $this->Registrationmodel->getallachooldist();
            
            /*not required*/
            $classlist1=$this->Registrationmodel->getclasslist($school_id);
            // print_r($classlist1);
            /*notrequire below*/
            if(!empty($classlist1)){

                        $arr['classstudying']=$this->Registrationmodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class); 
                        //print_r($data['classstudying']); 
                        //print_r($school_id);
                        $arr['mediumofinstruction'] = $this->Registrationmodel->getallmediumofinst($school_id);
                        $arr['rtetype'] = $this->Registrationmodel->getrte_type();
                        
                        $manage_cate=$this->Registrationmodel->getmanagecatename($school_id);

                        $arr['groupcate']   = $this->Registrationmodel->getallgroupcodes($manage_cate);
                        $arr['bloodgroup']  = $this->Registrationmodel->getallbloodgroup();
                        
                        /*schoolnew_schooldepartment*/
                        $arr['groupcateid'] = $manage_cate;
                        
                        //print_r($school_id);
                        $arr['managecateid'] = $this->Registrationmodel->getmanagecateid($school_id);
                        //print_r( $data['managecateid']);die();
                        /*required*/
                                        
                        // $where = array('visibility'=>0);
                        // $param = array('id', 'academic_teacher', 'visibility');
                        $arr['academic']  = $this->Registrationmodel->getallincomes('teacher_academic_qualify');
                                            // Common::get_multi_withdyncol_list($param,'teacher_academic_qualify',$where);
                        $arr['validation_error']="";
                        $arr['lowestclass'] = $classlist1[0]->low_class;
                        $arr['highclass'] = $classlist1[0]->high_class;

                        $this->response(['dataStatus' => true,
                                         'status'  => REST_Controller::HTTP_OK,
                                         'message' => 'Successfully',
                                         'result'  => $arr ],REST_Controller::HTTP_OK);
            }
            else{
              $this->response(['dataStatus' => true,
                               'status'  => REST_Controller::HTTP_OK,
                               'message' => 'check Your school Profile',
                               'result'  => '' ],REST_Controller::HTTP_OK);
            }

        }

        /** Screen Name : Student admission ( Students Filter )
         *  Purpose     : to get the Details of the Student's using aadhar No, DOB,Student Number
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 (ctrl : Registration -> fns : get_studetus_search ) 
         */
        public function studetus_search_post(){ 
                
          $token = Common::userToken();
          $emis_loggedin=$token['status'];
          $emis_usertype = (int)$token['emis_usertype'];
          if($emis_loggedin){
            if($emis_usertype == 1 || $emis_usertype == 2 || $emis_usertype == 3 || $emis_usertype == 5 || $emis_usertype == 6 || $emis_usertype == 9 || $emis_usertype == 10)
            {
                $records = $this->post('records');
                if(!empty($records)){       	
                
                    $filter_val = $records['search_data'];
                    $db_col = $records['db_col'];
                    $db_sub_col = $records['db_sub_col'];
                    $class_id = $records['class_id'];
                    switch($emis_usertype){
                      case 2 : $where = array($db_col=>$filter_val,'b.block_id'=>$token['emis_user_id']); break;
                      case 6 : $where = array($db_col=>$filter_val,'b.edu_dist_id'=>$token['edu_dist_id']); break;
                      case 10 : $where = array($db_col=>$filter_val,'b.district_id'=>$token['district_id']);  break;       
                      default : $where = array($db_col=>$filter_val); break;
                    }
  
                    if(!empty($db_sub_col) && $class_id !=-1){$where[$db_sub_col] = $class_id; }
  
                    if($db_col === 'name'){
                      unset($where[$db_col]);
                      $like = array($db_col=>$filter_val);
                    }
                    else $like = array();
                    $arr = $this->Registrationmodel->get_students_admit_details($where,$like);
                    $this->response(['dataStatus' => $arr['status'],
                                    'status'  => REST_Controller::HTTP_OK,
                                    'message' => $arr['message'],
                                    'total_student'=>$arr['total'],
                                    'result'  => $arr['data'] ],REST_Controller::HTTP_OK);
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

         /** Screen Name : Student admission ( Students Filter search archive )
         *  Purpose     : to get the Details of the Student's using aadhar No, DOB,Student Number
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 (ctrl : Registration -> fns : get_studetus_search ) 
         */
        public function studetus_search_arch_post(){
           
          $token = Common::userToken();
          $emis_loggedin=$token['status'];
          $emis_usertype = (int)$token['emis_usertype'];
          if($emis_loggedin){
            if($emis_usertype == 1 || $emis_usertype == 2 || $emis_usertype == 3 || $emis_usertype == 5 || $emis_usertype == 6 || $emis_usertype == 9 || $emis_usertype == 10)
            {
              $records = $this->post('records');
              if(!empty($records)){
                  $filter_val = $records['search_data'];
                  $db_col = $records['db_col'];
                  $db_sub_col = $records['db_sub_col'];
                  $class_id = $records['class_id'];
                  switch($emis_usertype){
                    case 2 : $where = array($db_col=>$filter_val,'block_id'=>$token['emis_user_id']); break;
                    case 6 : $where = array($db_col=>$filter_val,'edu_dist_id'=>$token['edu_dist_id']); break;
                    case 10 : $where = array($db_col=>$filter_val,'district_id'=>$token['district_id']);  break;       
                    default : $where = array($db_col=>$filter_val); break;
                  }

                  if(!empty($db_sub_col) && $class_id !=-1){$where[$db_sub_col] = $class_id; }

                  if($db_col === 'name'){
                    unset($where[$db_col]);
                    $like = array($db_col=>$filter_val);
                  }
                  else $like = array();
                  
                  $arr = $this->Registrationmodel->get_students_admit_details_arch($where,$like);

                  $this->response(['dataStatus' => $arr['status'],
                                  'status'  => REST_Controller::HTTP_OK,
                                  'message' => $arr['message'],
                                  'total_student'=>$arr['total'],
                                  'result'  => $arr['data'] ],REST_Controller::HTTP_OK);
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

        /** Screen Name : Student admission ( Students Filter search archive )
         *  Purpose     : to get the Details of the Student's using aadhar No, DOB,Student Number
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 (ctrl : Registration -> fns : get_stud_insert ) 
         */
        public function stud_insert_get()
      {
        // echo "hi";
          // $school_id=$this->get('school_id');
          $unique_id=$this->get('uid');
      
          $chk = $this->Registrationmodel->check_unique_id($unique_id);
          
          $check=$chk[0]['uni'];
          
          if($check==1)
          {
            $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Already exist!'],REST_Controller::HTTP_OK);
          }
          else {
            $stuarch_data = $this->Registrationmodel->get_arch_students_info($unique_id);
            
            $data = array(
                  'name'=>$stuarch_data[0]['name'],
                  'name_tamil'=>$stuarch_data[0]['name_tamil'],
                  'name_id_card'=>$stuarch_data[0]['name_id_card'],
                  'name_tamil_id_card'=>$stuarch_data[0]['name_tamil_id_card'],
                  'aadhaar_uid_number'=>$stuarch_data[0]['aadhaar_uid_number'],
                  'gender'=>$stuarch_data[0]['gender'],
                  'dob'=>$stuarch_data[0]['dob'],
                  'community_id'=>$stuarch_data[0]['community_id'],
                  'religion_id'=>$stuarch_data[0]['religion_id'],
                  'mothertounge_id'=>$stuarch_data[0]['mothertounge_id'],
                  'phone_number'=>$stuarch_data[0]['phone_number'],
                  'differently_abled'=>$stuarch_data[0]['differently_abled'],
                  'disadvantaged_group'=>$stuarch_data[0]['disadvantaged_group'],
                  'subcaste_id'=>$stuarch_data[0]['subcaste_id'],
                  'house_address'=>$stuarch_data[0]['house_address'],
                  'pin_code'=>$stuarch_data[0]['pin_code'],
                  'mother_name'=>$stuarch_data[0]['mother_name'],
                  'mother_occupation'=>$stuarch_data[0]['mother_occupation'],
                  'father_name'=>$stuarch_data[0]['father_name'],
                  'father_occupation'=>$stuarch_data[0]['father_occupation'],
                  'class_studying_id'=>$stuarch_data[0]['class_studying_id'],
                  'student_admitted_section'=>$stuarch_data[0]['student_admitted_section'],
                  'group_code_id'=>$stuarch_data[0]['group_code_id'],
                  'education_medium_id'=>$stuarch_data[0]['education_medium_id'],
                  'district_id'=>$stuarch_data[0]['district_id'],
                  'unique_id_no'=>$stuarch_data[0]['unique_id_no'],
                  'school_id'=>$stuarch_data[0]['school_id'],
                  'transfer_flag'=>$stuarch_data[0]['transfer_flag'],
                  'class_section'=>$stuarch_data[0]['class_section'],
                  'school_admission_no'=>$stuarch_data[0]['school_admission_no'],
                  'guardian_name'=>$stuarch_data[0]['guardian_name'],
                  'parent_income'=>$stuarch_data[0]['parent_income'],
                  'street_name'=>$stuarch_data[0]['street_name'],
                  'area_village'=>$stuarch_data[0]['area_village'],
                  'cbse_subject1_id'=>$stuarch_data[0]['cbse_subject1_id'],
                  'cbse_subject2_id'=>$stuarch_data[0]['cbse_subject2_id'],
                  'cbse_subject3_id'=>$stuarch_data[0]['cbse_subject3_id'],
                  'cbse_subject4_id'=>$stuarch_data[0]['cbse_subject4_id'],
                  'cbse_opt_subject_id'=>$stuarch_data[0]['cbse_opt_subject_id'],
                  'doj'=>$stuarch_data[0]['doj'],
                  'pass_fail'=>$stuarch_data[0]['pass_fail'],
                  'email'=>$stuarch_data[0]['email'],
                  'created_at'=>$stuarch_data[0]['created_at'],
                  'updated_at'=>$stuarch_data[0]['updated_at'],
                  'status'=>$stuarch_data[0]['status'],
                  'prv_class_std'=>$stuarch_data[0]['prv_class_std'],
                  'child_admitted_under_reservation'=>$stuarch_data[0]['child_admitted_under_reservation'],
                  'rte_type'=>$stuarch_data[0]['rte_type'],
                  'idcardstatus'=>$stuarch_data[0]['idcardstatus'],
                  'idapproove'=>$stuarch_data[0]['idapproove'],
                  'adhaarappliedstatus'=>$stuarch_data[0]['adhaarappliedstatus'],
                  'enrollmentnumber'=>$stuarch_data[0]['enrollmentnumber'],
                  'bloodgroup'=>$stuarch_data[0]['bloodgroup'],
                  'photo'=>$stuarch_data[0]['photo'],
                  'smart_id'=>$stuarch_data[0]['smart_id'],
                  'request_flag'=>$stuarch_data[0]['request_flag'],
                  'request_date'=>$stuarch_data[0]['request_date'],
                  'request_id'=>$stuarch_data[0]['request_id'],
                  'c_exam'=>$stuarch_data[0]['c_exam']
                );

                $std_data=$this->Registrationmodel->insert_stud_cmn_data($data);
                if($std_data['message'] == 'Student Moved To Common Pool !!!'){
                  $deleted = $this->Registrationmodel->delete_stud_cmn_data($stuarch_data[0]['unique_id_no']);
                }else{ $deleted = '';}
                
                $std_data['deleted'] = $deleted;
                $std_data['status'] =  REST_Controller::HTTP_OK;
                $this->response($std_data,REST_Controller::HTTP_OK);
            }
        }

        /** Screen Name :  (Get Transfer Certificate details )
         *  Purpose     : to get student-Transfer-details with master datas
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 
         */
        public function students_transfer_list_get(){
          $ts =explode(".",getallheaders()['Token']);
          $token=json_decode(base64_decode($ts[1]),true);
          $emis_loggedin =$token['status'];
          if($emis_loggedin) {
            $school_id = $token['school_id'];
            $data['allstuds'] = $this->Registrationmodel->getstudentfortcdetails($school_id);
            $classlist1=$this->Registrationmodel->getclasslist($school_id);
            $data['classstudying']=$this->Registrationmodel->getallclassstudying1($classlist1[0]->low_class,$classlist1[0]->high_class); 
            $data['mediumofinstruction'] = $this->Registrationmodel->getallmediumofinst($school_id);
            $data['launguages'] = $this->Registrationmodel->getalllaunguages();
        
            if(count($data['allstuds'])>0) 
                $this->response(['dataStatus'=>true ,'status'=>REST_Controller::HTTP_OK,'message'=>'','result'=>$data],REST_Controller::HTTP_OK);
            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'Data Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
          } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
        }  

        /** Screen Name :  ( Save Transfer Certificate )
         *  Purpose     : to save and update student-Transfer-details
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 
         */
        public function save_transfer_certificate_details_post(){
          $ts =explode(".",getallheaders()['Token']);
          $token=json_decode(base64_decode($ts[1]),true);
          $emis_loggedin =$token['status'];
          if($emis_loggedin) {
            $records = $this->post('records');
            $school_id = $token['school_id'];
            foreach ($records as $key => $value) {
              if ($value == '') {
                $records[$key] = NULL ;
              }
            }

            if(!empty($records)){
              $student_id = $records['student_id_in_child_dtl'];
              $table = 'students_child_detail';
              $where = array('id'=>$student_id);
              $student_data = $this->Schools_homemodel->get_single_list($table,$where);
              $save['student_unique_id'] = $student_data->unique_id_no;
              $save['student_school_id'] = $student_data->school_id;
              $save['student_name'] = $student_data->name;
              $save['student_father_name'] = $student_data->father_name;
              $save['student_mother_name'] = $student_data->mother_name;
              $save['student_dob'] = $student_data->dob;
              $save['student_dob_words'] = $records['student_dob_words'];
              $save['student_blood_group'] = $student_data->bloodgroup;
              $save['student_num'] = $student_data->phone_number;
              $save['student_gender'] = $student_data->gender;
              $save['student_photo'] = $student_data->photo;
              $save['student_nationality'] = $records['student_nationality'];
              $save['student_religion'] = $student_data->religion_id;
              $save['student_community'] = $student_data->community_id;
              $save['student_caste'] = $student_data->subcaste_id;
              $save['student_idenitiy1'] = $records['student_idenitiy1'];
              $save['student_idenitiy2'] = $records['student_idenitiy2'];
              $save['student_admission_no'] = $student_data->school_admission_no;
              $save['student_admission_date'] = $records['student_admission_date'] != NULL ? date('Y-m-d',strtotime($records['student_admission_date'])) : NULL;
              $save['student_class_id'] = $records['student_class_id'];
              $save['student_current_class_id'] = $records['student_current_class_id'];
              $save['student_group_code'] = $student_data->group_code_id;
              $save['student_sub_offered'] = NULL;
              $save['student_medium_inst'] = $records['student_medium_inst'];
              $save['student_promote_class'] = $records['student_promote_class'];
              $save['student_scholarship'] = $records['student_scholarship'];
              $save['student_medical_date'] = $records['student_medical_date'] != NULL ? date('Y-m-d',strtotime($records['student_medical_date'])) : NULL;
              $save['student_last_date'] = $records['student_last_date'] != NULL ? date('Y-m-d',strtotime($records['student_last_date'])) : NULL;
              $save['student_conduct'] = $records['student_conduct'];
              $save['student_apply_tc'] = $records['student_apply_tc'] != NULL ? date('Y-m-d',strtotime($records['student_apply_tc'])) : NULL;
              $save['student_tc_date'] = $records['student_tc_date'] != NULL ? date('Y-m-d',strtotime($records['student_tc_date'])) : NULL;
              $save['student_period_study_from'] = $records['student_admission_date'] != NULL ? date('Y-m-d',strtotime($records['student_admission_date'])) : NULL;
              $save['student_community_tc'] = $records['student_community_tc'];
              $save['student_period_study_to'] = date('Y-m-d');
              $save['school_recognition_no'] = $records['school_recognition_no'];
              $save['student_first_lang'] = $records['student_first_lang'];
              $save['student_smart_id'] = $student_data->smart_id;
              // print_r($student_data);
              // print_r($records);
              if($records['student_id_in_tc_dtl'] === NULL){
                $save['student_id'] = '';
                $save['hm_tc_flag'] = NULL;
                $save['created_by'] = $school_id;
                $save['created_date'] = date('Y-m-d');
              }
              else{
                  $table = 'students_transfer_certificate_details';
                  $where = array('student_id'=>$records['student_id_in_tc_dtl'],'student_school_id'=>$school_id);
                  $student_data = $this->Schools_homemodel->get_single_list($table,$where);
                  $save['student_id'] = $records['student_id_in_tc_dtl'];

                  if($student_data){
                    if($student_data->student_id === $student_id || $student_data->student_school_id === $school_id){
                      $save['hm_tc_flag'] = $student_data->hm_tc_flag == NULL ? 1 : $student_data->hm_tc_flag+1 ;
                    }else{
                      $save['hm_tc_flag'] = 1;
                    }
                  }else{
                      $save['hm_tc_flag'] = 1;
                  }
                  
                  $save['updated_by'] = $school_id;
              }
              $result = $this->Registrationmodel->save_transfer_certificate($save);
              if($result){
                 $result['status'] =  REST_Controller::HTTP_OK;
                 $this->response($result,REST_Controller::HTTP_OK);
              }
              else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'Somethings Went Wrong !'],REST_Controller::HTTP_OK);  
            }
            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'Data Not Found !'],REST_Controller::HTTP_OK); 
          }
          else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !'],REST_Controller::HTTP_OK);
        }

        /** Screen Name :  ( Generate Transfer Certificate )
         *  Purpose     : To generate The Student TC
         *  Refer       : In emis-code done by MR Sriram/venba - 26/03/2019 (ctrl : Registration -> fns : get_studetus_search ) 
         */
        public function generate_student_tc_post()
        {    
              $students_id = $this->post('stud');
              print_r($students_id);
              die;
              
            if($students_id != ''){
              header('Content-type: application/blob');
               //header('Content-Type: text/html; charset=utf-8');
              $stu_data = $this->Registrationmodel->generate_tc_details($students_id);
              // print_r($stu_data);
              // die();
              $data['students_data'] = $stu_data;
              $html = $this->load->view('student_transfer_certificate',$data,TRUE);
              $pdfFilePath = $stu_data->unique_id_no."TC.pdf";
              $this->m_pdf = new mpdf('ta');
              $this->m_pdf->curlAllowUnsafeSslRequests = true;
              $this->m_pdf->allow_charset_conversion  = true;
              $this->m_pdf->charset_in = 'UTF-8';
              //$mpdf->charset_in='utf-8';
               //$this->m_pdf->SetFont('newFont');
              $this->m_pdf->setTitle($stu_data->unique_id_no.' Transfer Certificate');
              $this->m_pdf->WriteHTML($html,2);
              base64_encode($this->m_pdf->Output($pdfFilePath, "I"));
              $this->response(['dataStatus'=>true,
                               'status'=>REST_Controller::HTTP_OK],REST_Controller::HTTP_OK); 
            }
            else $this->response(['dataStatus'=>false,
                                  'status'=>REST_Controller::HTTP_NOT_FOUND,
                                  'message'  => 'Data Not Found !'],REST_Controller::HTTP_OK); 
   }

        /** Screen Name : Students Admitted ( For Submit Button )
         *  Purpose     : To save the Student Admission Details
         *  Refer       : In emis-code done by MR Sriram/venba (ctrl : Registration -> fns : updated_emis_students_admitted ) 
         *  Note        : fully changed as per the flow.for references use the mentioned controller and functions.
         */
        public function to_save_student_registration_details_post(){
          date_default_timezone_set('Asia/Kolkata');          
          $data = $this->post('records');
          unset($data['student_type']);
          if(!empty($data)){   
              $school_id = $data['school_id'];
              unset($data['rte_appli_no']);
              $school_udise_code = $this->post('school_udise_code');
              $student_rte_appli = $this->post('student_rte_appli');
              $students_admit_log = $this->post('student_admit_log');
              $getstucount=$this->Registrationmodel->getregstudentcount($school_id);
              $stucount=$getstucount+1;
              $this->Registrationmodel->getregupdatecount($school_id,$stucount);
              $academic_year="";
              $month=date('m');
              $year = date('y');
                if($month<=4){
                  $academic_year=$year-1;
                }else{
                  $academic_year=$year;
                }

              $udisecode=$this->Registrationmodel->getudiscecode($school_id);
              $gender = $data['gender'];
              $formatted_value = sprintf("%04d", $stucount);
              $candidateid = $udisecode.$academic_year.$gender.$formatted_value; 
              $data['created_at'] = date('Y-m-d h:i:s');
              if($data['contractor_flag'] == '' || $data['contractor_flag'] == 'false'){
                $data['unique_id_no']=$candidateid;
                $const = REGULAR_STUDENT;
              }
              else if($data['contractor_flag'] == 'true'){
                $data['unique_id_no']='1'.$candidateid;  
                $const = MIGRANT_STUDENT;
              }
              unset($data['contractor_flag']);  
              //print_r($student_rte_appli);die();            
              if(isset($student_rte_appli)){
                if(!empty($student_rte_appli)){ $student_rte_appli['allot_school_id'] = $data['school_id'];
                }else{ $student_rte_appli = array(); }
              }else{$student_rte_appli = array();}

              if(isset($students_admit_log)){
                if(!empty($students_admit_log)){ 
                       $admit_log = $students_admit_log;
                }else{ $admit_log = array(); }
              }else{$admit_log = array();}

              $registerdata=$this->Registrationmodel->emissturegdata($data,$const,$admit_log,$student_rte_appli);

              $registerdata['status'] =  REST_Controller::HTTP_OK;
              $this->response($registerdata,REST_Controller::HTTP_OK);
        }
        else{
                       $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                                        'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
        }

        }

        /** Screen Name : Raise Request
         *  Purpose     : Raise Request For Students
         *  Refer       : In emis-code done by MR Sriram/venba 11/04/2019 (ctrl : Registration -> fns : update_students_raise_request ) 
         */
         public function update_students_raise_request_post()
         {
          date_default_timezone_set('Asia/Calcutta');

          $records = $this->post('records');
          $student_id = $records['student_id'];
          $unique_code = $records['school_unique_code'];
          $where = array('udise_code'=>$unique_code);
          $arr = Common::get_single_list('students_school_child_count',$where);
          $school_id = $arr->school_id;
          
          if(!$school_id){
            $this->response(['dataStatus' => false,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Unable to update'],REST_Controller::HTTP_OK);      
          }

            $table = 'students_child_detail';
            $where = array('id'=>$student_id);
            $update= array('request_flag' => '1',
                           'request_date' => date('Y-m-d'),
                           'request_id'=> $school_id );
                       //  'request_id'=>$this->session->userdata('emis_school_udise'));
                       
            $update_data = $this->Studentmodel->update_students_info($update,$table,$where);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Updated Successfully',
                            'result'  => $update_data ],REST_Controller::HTTP_OK);      

        

         }

         /** Screen : Pending Transfer request of Student listing(in district login)*/
         public function students_raise_request_get()
         {
            $token = Common::userToken();
            $emis_loggedin=$token['status'];
            $usertype_id = (int)$token['emis_usertype'];
            
            if($emis_loggedin && ($usertype_id === 3 || $usertype_id === 20)){
              
                $dist_id=$this->get('district')==''?$token['emis_user_id']:(int)$this->get('district');
                $dist_list = $this->Studentmodel->get_districtid();
                $stud_list = $this->Studentmodel->get_stu_raise_request($dist_id);
                if(!empty($stud_list))
                {
                    $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Student List for Pending Transfer request and District List for Dropdown',
                                    'dist_list'=>$dist_list,
                                    'stud_list'=>$stud_list],REST_Controller::HTTP_OK);
                }
                else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!',
                                    'dist_list'=>$dist_list,
                                    'stud_list'=>array()],REST_Controller::HTTP_OK);
                }
            }else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                    'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); }
        }

        /** Screen : Pending Transfer request of Student Rejection( in district login)*/
        public function update_students_reject_get()
        {
            $token = Common::userToken();
            $emis_loggedin=$token['status'];
            $usertype_id = (int)$token['emis_usertype'];
            
            if($emis_loggedin && ($usertype_id === 3 || $usertype_id === 20)){

            $id = $this->get('id');
            if($id !== ''){
                $table = 'students_child_detail';
                $where = array('unique_id_no'=>$id);
                $update= array('request_flag' => '0');
                $update_data = $this->Studentmodel->update_students_info($update,$table,$where);
                $arr  = Common::get_single_list($table,$where);
                if($update_data)
                {
                        $this->response(['dataStatus'=>true,
                                        'status'=>REST_Controller::HTTP_OK,
                                        'message'=>$arr->name." - ".$arr->unique_id_no.' Students Rejected'],REST_Controller::HTTP_OK);
                }
                else{ $this->response(['dataStatus'=>true,
                                      'status'=>REST_Controller::HTTP_OK,
                                      'message'=>'Can`t Able to Students Rejected :( Please Try Again'],REST_Controller::HTTP_OK);
                }
            }else{
              $this->response(['dataStatus' => false,
                                  'status'  => REST_Controller::HTTP_NOT_FOUND,
                                  'message' => 'Student-ID Not Found ! ',
                                  ],REST_Controller::HTTP_OK);
            }
          }else{ $this->response(['dataStatus'=>false,
                                  'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                  'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
          }
         }

         /** Screen : Pending Transfer request of Student To Save( in district login)*/
         public function update_students_transfer_request_post()
        {
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $usertype_id = (int)$token['emis_usertype'];
        
        if($emis_loggedin && ($usertype_id === 3 || $usertype_id === 20)){

          $transfer_data = $this->post('records');

          if(!empty($transfer_data))
          {
            // print_r($this->session->userdata());die;
            foreach($transfer_data as $data)
            {
                $update = array('transfer_flag'=>1,'request_flag'=>'0');
                $table = 'students_child_detail';
                $where = array('unique_id_no'=>$data['unique_id_no']);

                $update_data = $this->Studentmodel->update_students_info($update,$table,$where);
                
                  $data['academic_year'] = date('Y');
                  $data['transfer_date'] = date('Y-m-d');
                  $data['created_by'] = $this->session->userdata('emis_user_id');
                  $data['created_at'] = date('Y-m-d h:i:s');
                  $data['remarks'] = 'This School Transfer Students School id:-'.$data['school_id_transfer'].',Admission No:-'.$data['admission_no'].',Reason For '.$data['label'].',Transfer Date '.date('Y-m-d h:i:s');
                  unset($data['label']);
                  $table = 'students_transfer_history';
                  // print_r($data);die;
                  $trans_history[] = $this->Studentmodel->save_students_info($data,$table);
            }
            $text = sizeof($trans_history)+' Students Transfered To Common Pool';
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
        
        public function subcastebycomm_get(){
            $emis_subcaste =$this->get('subcaste');
            $getsubcastes  = $this->Registrationmodel->getallsubcaste($emis_subcaste);

            $this->response(['dataStatus' => true,
                                         'status'  => REST_Controller::HTTP_OK,
                                         'message' => 'Successfully',
                                         'result'  => $getsubcastes ],REST_Controller::HTTP_OK);      
        }

        /** Screen Name : Students Admitted
         *  Purpose     : 
         *  Refer       : In emis-code done by MR Sriram/venba 26/03/2019 (ctrl : Registration -> fns : updated_emis_students_admitted ) 
         */
         public function updated_emis_students_admitted_post()
         {

           $records = $this->post('records');  
           $school_id = $records['school_id'];
           $data = $records['update_data'];  

          $id = $data['id'];

          $doj = date('Y-m-d',strtotime($data['doj']));
          $class_studying_id = $data['emis_class_study'];
          $class_section = $data['emis_reg_stu_section'];
          $group_code_id = $data['emis_reg_grup_code'];
          $education_medium_id = $data['emis_reg_mediofinst'];
          $school_admission_no = $data['emis_reg_stu_admission_admiss'];
          $unique_id_no = $data['emis_unique_id_no'];
         
          $update = array('doj'=>$doj,'class_studying_id'=>$class_studying_id,'class_section'=>$class_section,'group_code_id'=>$group_code_id,'education_medium_id'=>$education_medium_id,'school_admission_no'=>$school_admission_no,'id'=>$id,'school_id'=>$school_id,'transfer_flag'=>0,'request_flag'=>'0');
          $table = 'students_child_detail ';
          $where = 'id'.'='.$id;
        
          $update_data = $this->Registrationmodel->update_students_info($update,$table,$where);
          
          $update_data = 1;
          if($update_data){
            $records['unique_id_no'] = $unique_id_no;
            $records['limit'] = 1;
            $records['get_result'] = 1; 

            $get_trans_history = $this->Registrationmodel->get_transfer_history($records);
          
          $get_trans_history->school_id_admit = $school_id;
          $get_trans_history->process_type = 2;
          $get_trans_history->admit_date = date('Y-m-d');
          $get_trans_history->updated_at = date('Y-m-d h:i:s');
          $get_trans_history->admitted_by = $school_id;
          
          $his_table = 'students_transfer_history';
          $his_where = 'id'.'='.$get_trans_history->id;
          
          $update_data = $this->Registrationmodel->update_students_info($get_trans_history,$his_table,$his_where);
          
        
              $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_CREATED,
                                 'message' => 'Successfully Admitted To School',
                                ],REST_Controller::HTTP_OK);
          
            }else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details',
                                ],REST_Controller::HTTP_OK);
            }
      
          }   
          
          public function getalldetails_post() {
            //$selectaddress = $this->get('id');
            $records = $this->post('records');
            $selectaddress = $records['id'];
            //print_r($selectaddress);die();
            //$selectaddress = $this->uri->segment(3,0);
            
            $table[0] = 'schoolnew_management';
            $table[1] = 'schoolnew_school_department';
            $table[2] = 'schoolnew_block';                 //Based On District_ID
            $table[3] = 'schoolnew_zone_type';  
            $table[4] = 'schoolnew_localbody_all';        //Based On District_ID and ZoneTypeID
            $table[5] = 'schoolnew_habitation_all';     //Based On LocalBodyID and Zonetype
            $table[6] = 'schoolnew_assembly';           //Based On District_id
            $table[7] = 'schoolnew_parliament';          //Based On Assembly_id
            $table[8] = 'schoolnew_edn_dist_mas';
            $table[9] = 'schoolnew_cluster_mas';         //Based On Block_ID
            
           
            $tablelist = $this->Datamodel->getTableDescribtion($table[$selectaddress]);

              if($selectaddress == '0'){
                $result = $this->Datamodel->get_allsubcategory($records['manage_cate_id']);
              }else if($selectaddress == '1'){
                $result = $this->Datamodel->get_alldeptcategory($records['sch_management_id']);
              }else if($selectaddress == '2'){
                $result = $this->Datamodel->get_allblocks($records['district_id']);
              }else if($selectaddress == '3'){
                $result = $this->Datamodel->getDistrictBasedLocalBody($records['district_id'],$records['urbanrural']); //break;
              }else if($selectaddress == '4'){
                $result = $this->Datamodel->getZonebyDistrict($records['district_id'],$table[$selectaddress],$records['local_body_type_id']);
              }else if($selectaddress == '5'){
                $result = $this->Datamodel->getAllHabitationBylocalbidyid($records['village_panchayat_id']);
              }else if($selectaddress == '6'){
                $result = $this->Datamodel->getAssemblyIDbyDistrict($records['district_id']);
              }else if($selectaddress == '7'){
                $result = $this->Datamodel->getParlimentIDbyDistrict($records['assembly_id']);
              }else if($selectaddress == '8'){
                //echo $records['district_id'];die();
                $result = $this->Datamodel->getEducationDistrictbyDistrict($records['district_id']);
              }
                /*case 9: $this->Homemodel->Selectoption();
                case 10: $this->Homemodel->Selectoption();*/
                if(!empty($result)){
                  $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                  'result' => $result],REST_Controller::HTTP_OK);   
                  // $flsh = '<div class="alert alert-success text-center">Account has been created successfully. Find Login Details in email.</div>';
                }else{
                   //$flsh = '<div class="alert alert-danger text-center">Account has been failed. Try again.</div>';
                   $this->response(['dataStatus' => false,
                   'status'  => REST_Controller::HTTP_BAD_REQUEST,
                   'message' => 'No Data Found.',
                   ],REST_Controller::HTTP_BAD_REQUEST);
                }               
            
        }
		
		
	/**********************************************************************************************************************
		Students QuickAdmit Creation - Don't change anything in code by Ramco Magesh
	**********************************************************************************************************************/
	
	public function QuickAdmit_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$getstucount=$this->Registrationmodel->getregstudentcount($emis_userid);
            $stucount=$getstucount+1;
            $this->Registrationmodel->getregupdatecount($emis_userid,$stucount);
            $academic_year="";
            $month=date('m');$year = date('y');
            if($month<=4){$academic_year=$year-1;}else{$academic_year=$year;}
            $udisecode=$this->Registrationmodel->getudiscecode($emis_userid);
            $gender = $data['gender'];
            $formatted_value = sprintf("%04d", $stucount);
            $candidateid = $udisecode.$academic_year.$gender.$formatted_value;
			$singlearray= array(
				'unique_id_no'			=>$candidateid,
				'school_id'				=>$emis_userid,
				'name'					=>$data['records']['Name'],
				'class_studying_id'		=>$data['records']['ClassID'],
				'class_section'			=>$data['records']['ClassSection'],
				'phone_number'			=>$data['records']['PhoneNumber'],
				'father_name'			=>$data['records']['FatherName'],
				'mother_name'			=>$data['records']['MotherName'],
				'guardian_name'			=>$data['records']['GuardianName'],
				'dob'					=>$data['records']['DOB'],
				'gender'				=>$data['records']['Gender'],
				'doj'					=>$data['records']['DOJ'],
				'education_medium_id'	=>$data['records']['MediumID']
			);
			$tablename = 'students_child_detail';
			$data = $this->Registrationmodel->QuickAdmit($tablename,$singlearray);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function Mschool_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$data = $this->Registrationmodel->Mschool($emis_userid);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	/**********************************************************************************************************************
		Students QuickAdmit Creation - Don't change anything in END HERE code by Ramco Magesh
	**********************************************************************************************************************/
	
	/**********************************************************************************************************************
		Students NSSTagging Creation - Don't change anything in code by Ramco Magesh
	**********************************************************************************************************************/
	public function nsstagging_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
   
			foreach($data['records'] as $dtindex => $dtvalue){
				if($dtvalue['ParticipationsubId']!=0){
					$dt[$dtindex] = array(
						'school_id'       =>$emis_userid,
						'student_id'      =>$dtvalue['StudentId'],
						'class_studying_id'   =>$dtvalue['ClassStudy'],
						'class_section'     =>$dtvalue['ClassSection'],
						'participate_type_id' =>$dtvalue['ParticipationTypeIds'],
						'participate_subtype_id'=>$dtvalue['ParticipationsubId'],
						'participate_level'   =>$dtvalue['ParticipationLevel'],
						'acyear'        =>$dtvalue['AcademicYear']
					);
				}
			}
			$tablename = 'students_club_participation';

			$a=array("student_id"=> $data['records'][0]['StudentId'],"acyear"=>$data['records'][0]['AcademicYear']);
			$data = $this->Registrationmodel->NssTagging($tablename,$dt,$a);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function nsstagginglist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		$student_id=$_GET['student_id'];
    $ac_year=$_GET['ac_year'];

		if($emis_loggedin){
      if($ac_year!="")
      {
       $student_id=$student_id==''?'':'where student_id='.$student_id.' and acyear ='. $ac_year ; 
      }
      else
      {
          $student_id=$student_id==''?'':'where student_id='.$student_id;
      }
    
			
			$data=$this->Registrationmodel->nsstagginglist($student_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	/**********************************************************************************************************************
		Students NSSTagging Creation - Don't change anything in END HERE code by Ramco Magesh
	**********************************************************************************************************************/
	
} 
?>