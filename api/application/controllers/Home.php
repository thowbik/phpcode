<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/AWS_S3.php';

class Home extends REST_Controller{

    function __construct(){
        parent::__construct();
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->helper('security');
        $this->load->database(); 
        $this->load->model('Homemodel');
        $this->load->model('Datamodel');
        $this->load->model('Udise_staffmodel');
        $this->load->library('AWS_S3');
        $this->load->helpers('common_helper');
    }


    /** Screen Name : DashBoard HM
     *  Purpose     : Student listing only
     *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_dash
     */
    public function schools_dashboard_post(){
      
        $records = $this->post('records');

        $school_id = $records['school_id'];
        $school_udise  = $records['school_udise_code'];
        $user_id = $records['user_id'];
        $user_type_id = $records['user_type_id'];
       
        $data['today']=date("d-m-Y");
        
        $student_classwise_count = $this->Homemodel->student_classwise($school_id);


        print_r($student_classwise_count);die;


        $data['students_classwise_count'] = $student_classwise_count['school_details'];
        $data['class_level'] = $student_classwise_count['result'];
        $data['attendance_details'] = $this->Homemodel->get_school_student_attendance($user_id);
        $data['staff_details'] = $this->Homemodel->emis_school_staff_details($school_id);
        $data['student_castwise'] = $this->Homemodel->get_dash_schoolwise_community($user_id);
        
        $data['aadhaar_status'] = $this->Homemodel->get_schoolwise_aadhaardetails($user_id);
        $data['bloodgroup_status'] = $this->Homemodel->get_schoolwise_bloodgroupdetails($user_id);
        $data['flash_data'] = $this->Homemodel->get_flash_news_data($school_id,$user_type_id);
        $data['flash_field'] = $this->Homemodel->get_flash_field_data($user_id);

        $table = 'students_child_detail';
        $where = array('school_id'=>$school_id,'transfer_flag'=>0,'request_flag'=>'1');
        $count = 'unique_id_no';
        $data['request_count'] = $this->Homemodel->get_list_count($table,$count,$where);
        // $data['RTE_count'] = $this->Homemodel->get_RTI_Students_list($school_id);
        // $data['RTE_count1'] = $this->Homemodel->get_RTI_Students_list1('','',$school_id);
        // $data['password_reset_count'] = $this->Homemodel->get_teacher_password_reset($user_id);
        $data['student_invalid_aadhar_no'] = $this->Homemodel->student_invalid_aadhar_no($school_id);
        $data['student_invalid_phn_no'] = $this->Homemodel->student_invalid_phn_no($school_id);
        // $data['schools_student_count'] = $this->Homemodel->get_single_list('students_school_child_count',array('school_id'=>$school_id));
        $data['overall_schools_students'] = $this->Homemodel->school_students_count($school_id);
        $data['overall_schools_teachers'] = $this->Homemodel->school_teachers_count($school_id);
        $data['pending_student_transfer'] = $this->Homemodel->pending_student_transfer_count($school_id);
        $dates = range(date('Y')-1, date('Y')+1);
        $acad_year = [] ;
        foreach($dates as $key=>$value){
          if (date('m', strtotime($value)) <= 6) {
              $acad_year[$key] = ($value).'-'.($value+1);
          } else {
              $acad_year[$key] = ($value-1).'-'.($value);
          }
        } 
        $data['last_3_acad_year'] = $acad_year;

        $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => '',
                            'result'  => $data ],REST_Controller::HTTP_OK);
        
    }


        /** Screen Name : Student List ( alternative fns)
         *  Purpose     : Student listing only
         *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_student_classwise 
         */
        public function schoolwise_student_list_get(){
            $school_id = $this->get('school_id');
        
            $data['allstuds'] = $this->Homemodel->get_classwise_student_details('','',$school_id);
                    
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => '',
                            'result'  => $data ],REST_Controller::HTTP_OK);
        }

        // Master : Classes Wise Student List 
        // Sample Params : {"records":{"class_id":6,"section":"A","school_id":2112}}
        public function classwise_students_list_post(){

            $records = $this->post('records');
            $class_id = $records['class_id'];
            $section_id = $records['section'];
            $school_id = $records['school_id'];
            $arr = $this->Homemodel->get_classwise_student_details($class_id,$section_id,$school_id); 
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Successfully',
                            'result'  => $arr ],REST_Controller::HTTP_OK);

        }

        // Master : Classes Wise Section List 
        // Sample Params : {"records":{"class_id":6,"school_id":2112}}
        public function classwise_section_post(){
            $records = $this->post('records');
            $school_id = $records['school_id'];
            $class_id = $records['class_id'];
            $arr = $this->Homemodel->get_classwise_section($class_id,$school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Successfully',
                            'result'  => $arr ],REST_Controller::HTTP_OK);
            
        }

        public function allsectionsbyclass_get(){
            $school_id=$this->get('school_id');
            $class_id = $this->get('class_id');
  
            $getalldept  = $this->Homemodel->getallsection($school_id,$class_id);
  
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Successfully',
                             'result'  => $getalldept ],REST_Controller::HTTP_OK);      
  
        }

        // Master : School Wise Class and Section List 
        // Sample Params : {"records":{"school_id":2112}}
        function schoolwise_class_section_get(){
            $school_id = $this->get('school_id');
            $arr = $this->Homemodel->get_schoolwise_class_section($school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Successfully',
                            'result'  => $arr ],REST_Controller::HTTP_OK);
            
        }

                
        //To list Class and section details
       function teacher_list_get()
       {
        $key = 'EMIS_web@2019_api';
    $ts=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($ts[1]),true);
    $emis_loggedin=$token['status'];
    $school_id=$token['school_id'];

         $teacherlist['teacher'] = $this->Homemodel->getallteacherlist($school_id);
          if(!empty($teacherlist))
            {    
                 $this->response(['dataStatus' => true,
                     'status'  => REST_Controller::HTTP_OK,
                     'data'=> $teacherlist],REST_Controller::HTTP_OK); 
             }    
            else
             {
                $this->response(['dataStatus' => true,
                                     'status'  => REST_Controller::HTTP_OK,
                                     'data' => '',],REST_Controller::HTTP_OK);
             }
       }
 


        function schoolwise_classlist_get()
        {
          //echo "hi";die();
                $ts =explode(".",getallheaders()['Token']);
                $token=json_decode(base64_decode($ts[1]),true);
                
                  if($token['emis_usertype'] == '9'){
                        $dist_id = $token['district_id'];
                    }else if($token['emis_usertype'] == '10'){
                        $edu_dist_id = $token['edu_district_id'];
                    }
                    //echo $dist_id;echo $edu_dist_id;die();                    
   // $records = $this->post('records'); 
                  $school_id =$this->get('school_id'); 
                  if(!empty($school_id)){   
                        $classlist = $this->Homemodel->getallclasssections($school_id,$dist_id,$edu_dist_id);
                        $classtype = $this->Homemodel->getclasstype($school_id,$dist_id,$edu_dist_id);
                        $mediumdetails= $this->Homemodel->getschool_medium($school_id,$dist_id,$edu_dist_id);
                        $groupdetails= $this->Homemodel->getschool_groupname();
                        $schoolcate=$this->Homemodel->getschool_cate($school_id,$dist_id,$edu_dist_id);

                        $data['dataStatus'] = true;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['classlist'] = (count($classlist) > 0) ? $classlist : array();
                        $data['classtype'] = (count($classtype) > 0) ? $classtype : array();
                        $data['mediumdetails'] = (count($mediumdetails)> 0)  ? $mediumdetails : array();
                        $data['groupdetails'] = (count($groupdetails)> 0) ? $groupdetails :array();
                        $data['schoolcate'] = (count($schoolcate)> 0)?$schoolcate:array();
                        
                        $this->response($data,REST_Controller::HTTP_OK);

                }
                else{
                        $data['dataStatus'] = false;
                        $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                        $data['message'] = 'Please Provide the information!';
                        $this->response($data,REST_Controller::HTTP_OK);
                }
        }
        
        function add_class_post()
        {
           $records = $this->post('records');   
           if(!empty($records)){   
    
    $result = $this->Homemodel->add_class_data($records);
    if($result)
      $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_CREATED,
                        'message' => 'Successfully Saved',
                       ],REST_Controller::HTTP_OK);
    
    else
    {
                   $this->response(['dataStatus' => true,
                                    'status'  => REST_Controller::HTTP_OK,
                                    'message' => 'There No Details To save'],REST_Controller::HTTP_OK);
    } 
  
             }
             else $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                'message' => 'Something Went Wrong..! Unable To Save the Details',
                                ],REST_Controller::HTTP_OK);
        }

        function delete_class_post()
        {
           $records = $this->post('records');   
           if(!empty($records)){   
    
    $school_id =$records['school_id'];
                $section = $records['section']; 
                $class = $records['class'];     
                $deleted_id = $records['deletedid']; 
    
                $stucount = $this->Homemodel->check_student($school_id,$class,$section);
                // totalstudentscount
    // $result=$resultcount[0]->classcount;
    if($stucount<1)
    {
                            $this->Homemodel->check_timetable($school_id,$class,$section,000);
                            $result = $this->Homemodel->delete_class_data($deleted_id);
                            $result['status'] =  REST_Controller::HTTP_OK;
                            $this->response($result,REST_Controller::HTTP_OK);
                            
    }
    else
    {
                            $this->response(['dataStatus' => true,
                                             'status'  => REST_Controller::HTTP_OK,
                                             'message' => 'Student Mapped ! <br> There are '.$stucount.' Students in this '.$class.' Std - '.$section.' Sec. <br> So you can`t delete this class.'],REST_Controller::HTTP_OK);
    } 
  
             }
             else{
                            $this->response(['dataStatus' => false,
                                             'status'  => REST_Controller::HTTP_NOT_FOUND,
                                             'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
             }
        }

        function edit_class_post(){
                $records = $this->post('records');  
                $update_id = $this->post('id');   


           if(!empty($records) && $update_id != '' ){     
                foreach($records as $key => $value) { if ($value == '') { $records[$key] = NULL ; }}
                $wherechilddetails = array('school_id'=>$records['school_key_id'],'class_studying_id'=>$records['class_id'],'class_section'=>$records['section'],'transfer_flag'=>0);
                $updatechilddetails['education_medium_id'] =$records['school_medium_id'];
                $updatechilddetails['group_code_id'] = $records['class_id'] == 11 || $records['class_id'] == 12  ? $records['group_id'] : NULL;
                $resultchilddetails = $this->Homemodel->edit_students_child_detail($updatechilddetails,$wherechilddetails);
                $result = $this->Homemodel->edit_class_data($records,$update_id);
                $result['status'] =  REST_Controller::HTTP_OK;
                $this->response($result,REST_Controller::HTTP_OK);
      }
            else $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                'message' => 'There No Details To update',
                                ],REST_Controller::HTTP_OK);
        }

        /************************************
         *  My Tries Sample Methods (venba/ps)
         */
        
        public function sample_data1_post(){
            $p = $this->post();
            print_r($p);
          }
  
          public function sample_data2_get(){
            $g = $this->get();
            print_r($g);
          }
  
          public function sample_data3_delete(){
            $d = $this->delete();
            // https://www.edureka.co/blog/what-is-rest-api/
            $uri = $this->uri->segment(2,0);
            print_r($d);
            // echo $uri;
          }
  
          public function sample_data4_put($id){
            $t = $this->put();
            $uri = $this->uri->segment(2,0);
            echo "id".$uri;
            print_r($t);
          }

          public function to_handle_common_dell_post(){
            $records = $this->post('records');
            $arrdata = $records['data'];
            $id = $records['id'];
            $tname = $records['tname'];
            
            $response = $this->Schemesmodel->common_update_for_schemes($id,$tname,$arrdata);

            if($response > 0 )
            { 
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_OK,
                                 'message' => 'Successfully Modified',
                                ],REST_Controller::HTTP_OK);

            }
            else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                 'message' => 'Some thing went wrong',
                                ],REST_Controller::HTTP_OK);
            }

        }
        

        public function delete_1(){
            $d = $this->delete();
            // https://www.edureka.co/blog/what-is-rest-api/
            $uri = $this->uri->segment(2,0);
            print_r($d);
            // echo $uri;
        }

  
          /**************************************/

    //////////************************Co-Scholastic***************************////////////
          public function emis_school_student_co_scholastic_post()
{
  //$classid = $this->input->post('schoolcate');
  //$termid = $this->input->post('termid');
   //$school_id = $this->session->userdata('emis_school_id'); 
  $records = $this->post('records');
  $classid=$records['classid'];
  $termid=$records['termid'];
  $school_id=$records['school_id'];
  
 //print_r($records);die();
  //if($classid=='')
 // {
   
 // $studentcolist='';  
 // $classdetails= $this->Homemodel->class_details($school_id);
 // $communitycount='';
 // }
 // else
 // {
  $classname=$classid ;
  $subjectid=$subid;
  $termid=$termid;
  $studentcolist=$this->Homemodel->student_cs_list($school_id,$classid,$termid);
  //print_r($data['studentlist']);
  $classdetails= $this->Homemodel->class_details($school_id);
   
 // }
  if(count($studentcolist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['classid']=$classid;
                $data['termid']=$termid;
                $data['school_id'] = $school_id;
                $data['classdetails'] = $classdetails;
                $data['studentcolist']=$studentcolist;
              
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

   /*  public function emis_school_student_mark_post()
{
  $records=$this->post('records');
  //print_r($records);
  $subid =$records['subid'];
  $termid = $records['termid'];
  $classid = $records['classid'];
  $sectionid = $records['sectionid'];
  $school_id =$records['school_id'];

if($classid=='')
{
$studentlist='';
$classdetails= $this->Homemodel->class_details($school_id);

$communitycount='';
}
else
{
  $classname=$classid ;
  $subjectid=$subid;
  $termid=$termid;
  $sectionid=$sectionid;
  $subject = $this->Homemodel->get_classwise_textbook($classid,$termid,$subid);
  $subjectname = $subject['0']['book_name'];
  switch($termid){
    case '1' : $tname = 'schoolnew_qstudent_markdetails'; break;
    case '2' : $tname = 'schoolnew_qstudent_markterm2' ; break;
    case '3' : $tname = 'schoolnew_qstudent_markterm3' ; break;
}

$studentlist=$this->Homemodel->student_list($school_id,$classid,$subid,$termid,$sectionid,$tname);
$classdetails= $this->Homemodel->class_details($school_id);
}

print_r(1);
 if(count($studentlist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['subid']=$subid;
                $data['classid']=$classid;
                $data['sectionid']=$sectionid;
                $data['termid']=$termid;
                $data['school_id'] = $school_id;
                $data['classdetails'] = $classdetails;
                $data['studentlist']=$studentlist;
                $data['subject']=$subject;
                $data['subjectname']=$subjectname;
              
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
     
 }*/



public function emis_school_student_mark_post()
{
  $records=$this->post('records');
  //print_r($records);
  $subid =$records['subid'];
  $termid = $records['termid'];
  $classid = $records['classid'];
  $sectionid = $records['sectionid'];
  $school_id =$records['school_id'];
  $subject = $this->Homemodel->get_classwise_textbook($classid,$termid,$subid);
  $studentlist=$this->Homemodel->student_list($school_id,$classid,$subid,$termid,$sectionid);

   if(count($studentlist))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['subid']=$subid;
                $data['classid']=$classid;
                $data['sectionid']=$sectionid;
                $data['termid']=$termid;
                $data['school_id'] = $school_id;
                $data['studentlist']=$studentlist;
              
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
     
public function emis_school_student_mark1_post()
{  
        $records=$this->post('records');
        $subid =$records['subid'];
        $termid = $records['termid'];
        $classid = $records['classid'];
        $sectionid = $records['sectionid'];
        $school_id =$records['school_id'];
        //$tname = 'schoolnew_qstudents_highsclterm'; //schoolnew_qstudents_highsclyrly
        if($termid == '1' || $termid == '3' || $termid == '5'){
                $tname = 'schoolnew_qstudents_highsclterm';
        }elseif($termid == '2' || $termid == '4' || $termid == '6'){
                $tname = 'schoolnew_qstudents_highsclyrly';
        }
        $cls=$this->Datamodel->getclasslist($school_id);
        $classdetails=$this->Datamodel->getallclassstudying1($cls[0]->low_class,$cls[0]->high_class);
        $studentlist=$this->Homemodel->student_list_9_10($school_id,$classid,$termid,$sectionid,$tname);
        if(count($studentlist)){

                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['subid']=$subid;
                $data['classid']=$classid;
                $data['sectionid']=$sectionid;
                $data['termid']=$termid;
                $data['school_id'] = $school_id;
                $data['classdetails'] = $classdetails;
                $data['studentlist']=$studentlist;
                // $data['subject']=$subject;
                // $data['subjectname']=$subjectname;              
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

  public function emis_Udise_staff_dash_post()
      {
        
            $records=$this->post('records');
          $teacher_id =$records['teacher_id'];//u_id //teacher_code=22050419812000001;

          $teacher_list = $this->Udise_staffmodel->getteacherstaffdetails($teacher_id);
          $keyname = 'Teachers/photo_all/'.$teacher_list[0]->e_picid.'.jpgx';
         
         if($teacher_list[0]->e_picid !=''){
   
         $img_data= $this->aws_s3->get_AWS_S3_Images(TEACHER_BUCKET_NAME,$keyname,'+5 minutes','','');
        
          }else
          {
          $img_data= '';
          }
       
         if(count($teacher_list))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacher_list']=$teacher_list;
                $data['teacher_id']=$teacher_id;
                $data['img_data']=$img_data;
              
              
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

    public function get_common_tables_post()
    {
            $records =  $this->post('records');
            
            if(!empty($records)){   
                $class = $records['class_id'];
                $table = $records['table'];
                $where_col = $records['where_col'];
    
                $class_where = array($where_col,$class);
           
                $data = $this->Homemodel->get_common_table_details($table,$class_where);

                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                                         'status'  => REST_Controller::HTTP_OK,
                                         'result' => $data ],REST_Controller::HTTP_OK);
                }
                else{
                        $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                                        'message' => 'Data Not Found !',
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

    /**Scholastic API Starts here**/
    /**1 to 8th Starts here**/
//     public function emis_school_insert_1_to_8_post(){
            
//         $records = $this->post('records');
//         $arrdata = $records['data'];
        
//         $classid = $records['classid'];
//         $subjectid = $records['subjectid'];
//         $termid = $records['termid'];

//         //$reason = json_decode($this->input->post('reason'),true);
//         $reason = $records['reason'];
//         $schoolid = $records['schoolid'];
//         unset($records[0]);
//         unset($records[1]);
    
//         $response_count = 0 ;    
        
//         if($termid == 1){
//                 $tname = 'schoolnew_qstudent_markterm1';  
//         }elseif($termid == 2){
//                 $tname = 'schoolnew_qstudent_markterm2'; 
//         }elseif($termid == 3){
//                 $tname = 'schoolnew_qstudent_markterm3'; 
//         }
//         if(!empty($termid)){
//         foreach ($arrdata as $key => $value){
//                 $status=1;
//                 $data = array(
//                                 'school'.$s_id."_id" => $schoolid,
//                                 'term_id' => $termid,
//                                 'subject_id'=>$subjectid,
//                                 'class_id' => $classid,
//                                 'student_id'=>$value['student_id'],
//                                 'student_name'=>$value['student_name'],
//                                 'student_attendance'=>1,
//                                 'section'=>$value['section'],
//                                 'FAA'=>$value['A'] != '' ? $value['A'] : '0',
//                                 'FAB'=>$value['B'] != '' ? $value['B'] : '0',
//                                 'FAC'=>$value['C'] != '' ? $value['C'] : '0',
//                                 'FAD'=>$value['D'] != '' ? $value['D'] : '0',
//                                 'FBA'=> $value['E'] != '' ? $value['E'] : '0',
//                                 'FBB'=> $value['F'] != '' ? $value['F'] : '0',
//                                 'FBC'=> $value['G'] != '' ? $value['G'] : '0',
//                                 'FBD'=> $value['H'] != '' ? $value['H'] : '0',
//                                 'FAM'=> $value['I'] != '' ? $value['I'] : '0',
//                                 'SAM'=> $value['J'] != '' ? $value['J'] : '0',
//                                 'status'=>$status,
//                                 'created_date' => date("Y-m-d H:i:s"),);  
//                 $response = $this->Homemodel->common_save_for_scholastic($tname,$data);
//                 $response_count += 1;   
//         }

//         //$studentabs=$this->input->post('absentlist');
//         $studentabs = $records['absentlist']['0'];
//         if(!empty($studentabs)){
//                 $studentabs1 = array_filter($studentabs);
//                 foreach($studentabs1 as $stuabs){
//                         $data = array(
//                                 'FAA'=>'0',
//                                 'FAB'=>'0',
//                                 'FAC' =>'0',
//                                 'FAD'=>'0',
//                                 'FBA' =>'0',
//                                 'FBB' =>'0',
//                                 'FBC' =>'0',
//                                 'FBD' =>'0',
//                                 'FAM' =>'0',
//                                 'SAM' =>'0',
//                         );
//                         $resulta= $this->Homemodel->common_update_student_absent_data($stuabs,$data,$tname);
//                         $resultb = $this->Homemodel->common_update_student_absent($stuabs,$attendancevalue,$tname);
//                 }
//         }

//         //$studentabsent=$this->input->post('absentlist');
//         $studentabsent = $records['absentlist']['0'];
//         if(!empty($studentabsent)){
//                 $attendancevalue=2; //for absent value //
//                 $result1 = $this->Homemodel->common_insert_student_attendance($studentabsent,$attendancevalue,$tname);
//         }

//         if($response_count == count($arrdata))
//         {  
//             $this->response(['dataStatus' => true,
//                              'status'  => REST_Controller::HTTP_CREATED,
//                              'message' => 'Successfully Inserted',
//                             ],REST_Controller::HTTP_OK);
//         }
//         }
//         else
//         {
//             $this->response(['dataStatus' => false,
//                              'status'  => REST_Controller::HTTP_NO_CONTENT,
//                              'message' => 'Something Went Wrong..! Unable To Update the Details',
//                             ],REST_Controller::HTTP_OK);
//         }
//       }

public function emis_school_insert_1_to_8_post(){
            
        $records = $this->post('records');
        $arrdata = $records['data'];
        
        
        $classid = $records['classid'];
        $subjectid = $records['subjectid'];
        $termid = $records['termid'];

        //$reason = json_decode($this->input->post('reason'),true);
        // $reason = $records['reason'];
        $schoolid = $records['schoolid'];
         
        

        $response_count = 0 ;    
        
        if($termid == 1){
                $tname = 'schoolnew_qstudent_markterm1';  
        }elseif($termid == 2){
                $tname = 'schoolnew_qstudent_markterm2'; 
        }elseif($termid == 3){
                $tname = 'schoolnew_qstudent_markterm3'; 
        }

        $subj_id = $this->Homemodel->getsubjectflag($subjectid);
        
        if(!empty($termid)){
          // echo 'term not empty'.$termid;
            for ($index = 0; $index < count($arrdata); $index++) {
              // print_r($arrdata[$index]);
              // echo $arrdata[$index]['updid'].$arrdata[$index]['stuid'];
              if($arrdata[$index]['updid'] == NULL){
                // echo '/ in if'.$arrdata[$index]['updid'];
                $insert_arr = array('school_id' => $schoolid,
                                              'term_id' => $termid,
                                              'class_id' => $classid,
                                              'section'=>$arrdata[$index]['class_section'],
                                              'student_id'=>$arrdata[$index]['stuid'],
                                              'student_name'=>$arrdata[$index]['name'],
                                              'book'.$subj_id.'_id'=>$subjectid,
                                              'attend'.$subj_id => $arrdata[$index]['attendance'],
                                              'gender' => $arrdata[$index]['gender'],
                                              'section'=>$arrdata[$index]['class_section'],
                                              'attreason'.$subj_id => ($arrdata[$index]['attendance'] == '0') != '' ? $arrdata[$index]['attreason'] : NULL,
                                              'FAA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAA']) != '' ? $arrdata[$index]['FAA'] : '0',
                                              'FAB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAB']) != '' ? $arrdata[$index]['FAB'] : '0',
                                              'FAC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAC']) != '' ? $arrdata[$index]['FAC'] : '0',
                                              'FAD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAD']) != '' ? $arrdata[$index]['FAD'] : '0',
                                              'FBA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBA']) != '' ? $arrdata[$index]['FBA'] : '0',
                                              'FBB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBB']) != '' ? $arrdata[$index]['FBB'] : '0',
                                              'FBC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBC']) != '' ? $arrdata[$index]['FBC'] : '0',
                                              'FBD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBD']) != '' ? $arrdata[$index]['FBD'] : '0',
                                              'FAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAM']) != '' ? $arrdata[$index]['FAM'] : '0',
                                              'SAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['SAM']) != '' ? $arrdata[$index]['SAM'] : '0',
                                              'status'=>1,
                                              'created_date' => date("Y-m-d H:i:s"));
                            $response = $this->Homemodel->common_save_for_scholastic($tname,$insert_arr);
                            if($response) $response_count++;
              }else{
                     $update_arr = array(
                                                          'attend'.$subj_id => $arrdata[$index]['attendance'],
                                                          'book'.$subj_id.'_id'=>$subjectid,
                                                          'student_id'=>$arrdata[$index]['stuid'],
                                                          'book'.$subj_id.'_id'=>$subjectid,
                                                          'attreason'.$subj_id => ($arrdata[$index]['attendance'] == '0') != '' ? $arrdata[$index]['attreason'] : NULL,
                                                          'FAA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAA']) != '' ? $arrdata[$index]['FAA'] : '0',
                                                          'FAB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAB']) != '' ? $arrdata[$index]['FAB'] : '0',
                                                          'FAC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAC']) != '' ? $arrdata[$index]['FAC'] : '0',
                                                          'FAD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAD']) != '' ? $arrdata[$index]['FAD'] : '0',
                                                          'FBA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBA']) != '' ? $arrdata[$index]['FBA'] : '0',
                                                          'FBB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBB']) != '' ? $arrdata[$index]['FBB'] : '0',
                                                          'FBC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBC']) != '' ? $arrdata[$index]['FBC'] : '0',
                                                          'FBD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBD']) != '' ? $arrdata[$index]['FBD'] : '0',
                                                          'FAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAM']) != '' ? $arrdata[$index]['FAM'] : '0',
                                                          'SAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['SAM']) != '' ? $arrdata[$index]['SAM'] : '0',
                                                          'status'=>2,
                                                          'updated_date' => date("Y-m-d H:i:s"));  
                                                          $response = $this->Homemodel->common_update_for_scholastic($arrdata[$index]['updid'],$tname,$update_arr);
                                                          if($response) $response_count += 1;   
              }

            }
            if($response_count == count($arrdata)) $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_CREATED,
                                'message' => 'Successfully Updated',
                                ],REST_Controller::HTTP_OK);
            else $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Some of Data Not Updated,Please Recheck it Again',
                                ],REST_Controller::HTTP_OK); 
        }
        else $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_NOT_FOUND,
                                'message' => 'Term Not Found',
                                ],REST_Controller::HTTP_OK);
        
        
          // print_r($arrdata);
          // die();
}
        // for ($index = 0; $index <= 10; $index++) {
                // 

                // if($arrdata[$index]['updid'] == NULL || $arrdata[$index]['updid'] == '')

                // $insert_arr = array('school_id' => $schoolid,
                //                               'term_id' => $termid,
                //                               'class_id' => $classid,
                //                               'section'=>$arrdata[$index]['class_section'],
                //                               'student_id'=>$arrdata[$index]['stuid'],
                //                               'student_name'=>$arrdata[$index]['name'],
                //                               'book'.$subj_id.'_id'=>$subjectid,
                //                               'attend'.$subj_id => $arrdata[$index]['attendance'],
                //                               'gender' => $arrdata[$index]['gender'],
                //                               'section'=>$arrdata[$index]['class_section'],
                //                               'attreason'.$subj_id => ($arrdata[$index]['attendance'] == '0') != '' ? $arrdata[$index]['attreason'] : NULL,
                //                               'FAA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAA']) != '' ? $arrdata[$index]['FAA'] : '0',
                //                               'FAB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAB']) != '' ? $arrdata[$index]['FAB'] : '0',
                //                               'FAC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAC']) != '' ? $arrdata[$index]['FAC'] : '0',
                //                               'FAD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAD']) != '' ? $arrdata[$index]['FAD'] : '0',
                //                               'FBA'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBA']) != '' ? $arrdata[$index]['FBA'] : '0',
                //                               'FBB'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBB']) != '' ? $arrdata[$index]['FBB'] : '0',
                //                               'FBC'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBC']) != '' ? $arrdata[$index]['FBC'] : '0',
                //                               'FBD'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FBD']) != '' ? $arrdata[$index]['FBD'] : '0',
                //                               'FAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['FAM']) != '' ? $arrdata[$index]['FAM'] : '0',
                //                               'SAM'.$subj_id=>($arrdata[$index]['attendance'] == '1' && $arrdata[$index]['SAM']) != '' ? $arrdata[$index]['SAM'] : '0',
                //                               'status'=>1,
                //                               'created_date' => date("Y-m-d H:i:s"));
                //                                $response = $this->Homemodel->common_save_for_scholastic($tname,$insert_arr);
                //                                $response_count += 1
                // }else{

 //             
 //                                                $response_count += 1;   

                // }
        // }
                    // echo $response_count.'$response_count';
                // if($response_count == count($arrdata))
                // {  
                //   $this->response(['dataStatus' => true,
                //                 'status'  => REST_Controller::HTTP_CREATED,
                //                 'message' => 'Successfully Updated',
                //                 ],REST_Controller::HTTP_OK);
                // }
                // else{
                //  $this->response(['dataStatus' => false,
                //                 'status'  => REST_Controller::HTTP_OK,
                //                 'message' => 'Some of Data Not Updated,Please Recheck it Again',
                //                 ],REST_Controller::HTTP_OK); 
                // }

        // }
        // else{
        //   $this->response(['dataStatus' => true,
        //                         'status'  => REST_Controller::HTTP_NOT_FOUND,
        //                         'message' => 'Term Not Found',
        //                         ],REST_Controller::HTTP_OK);
        // }


    /**1 to 8th Ends here**/
    /**Scholastic API Starts here**/

    //created by Nirmal
    public function get_slas_class7_report_get()
    {
                  $ts =explode(".",getallheaders()['Token']);
            $token=json_decode(base64_decode($ts[1]),true);
            $emis_loggedin =$token['status']; 
          $school_id = $token['school_id'];
  
              
                if($school_id != '')
        {
      
                        $student_classwise_count = $this->Homemodel->get_slas_class7_report($school_id);
                        if(!empty($student_classwise_count))
                        {
                                $this->response(['dataStatus' => true,
                                                'status'  => REST_Controller::HTTP_OK,
                                                'result'  => $student_classwise_count ],REST_Controller::HTTP_OK);     
                        }else{
                                $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NO_CONTENT,
                                'message' => 'Something Went Wrong..!',
                                ],REST_Controller::HTTP_OK);
                        }

                }else {
                        $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NO_CONTENT,
                                        'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_OK);
      }   
    }
    public function task_dtls_get() {
        
                        $token = Common::userToken();
      $emis_loggedin=$token['status'];
      $usertype_id = (int)$token['emis_usertype'];
   
                           if($emis_loggedin && ($usertype_id === 21)){

                                $date_where = array('isactive'=>'1');
                                $resource_param = array('resource_id', 'resource_name', 'designation', 'isactive');
                                $resource_list  = Common::get_multi_withdyncol_list($resource_param,'emis_mst_resource',$date_where);
                                $tasktype_param = array('task_id', 'task_description', 'isactive');
                                $tasktype_list  = Common::get_multi_withdyncol_list($tasktype_param,'emis_mst_tasktype',$date_where);
                                $allotment_param = array('id', 'module_id', 'resource_id', 'role_id', 'time_commit', 'isactive');
                                $allotment_list  = Common::get_multi_withdyncol_list($allotment_param,'emis_resource_allotment',$date_where);
                                $task_details = $this->Homemodel->get_task_dtls();
                                if(!empty($task_details))
                                {       $this->response(['dataStatus' => true,
                                                         'status'  => REST_Controller::HTTP_OK,
                                                         'API Description' => 'Resourcer List,TaskType List,Resourcer-Wise Allotment List and its Task Details List',
                                                         'message'=>'Success',
                                                         'resource_list' => !empty($resource_list) ? $resource_list :array(),
                                                         'tasktype_list' => !empty($tasktype_list) ? $tasktype_list:array(),
                                                         'allotment_list' => !empty($allotment_list) ? $allotment_list:array(),
                                                         'task_details'  => $task_details ],REST_Controller::HTTP_OK);     
                                } else  $this->response(['dataStatus'=>false,
                                                         'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                         'API Description' => 'Resourcer List,TaskType List And Resourcer-Wise Allotment List',
                                                         'message'=>'No Data Found!!',
                                                         'resource_list' => !empty($resource_list) ? $resource_list :array(),
                                                         'tasktype_list' => !empty($tasktype_list) ? $tasktype_list:array(),
                                                         'allotment_list' => !empty($allotment_list) ? $allotment_list:array(),
                                                         'task_details'=>array()],REST_Controller::HTTP_OK);                
                        }else $this->response(['dataStatus'=>false,
                                               'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                               'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 

    }


    public function update_task_dtls_post()
    {
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $usertype_id = (int)$token['emis_usertype'];
   
      if($emis_loggedin && ($usertype_id === 21)){

                $records = $this->post('records');
                
    if(!empty($records)){         
                        date_default_timezone_set('Asia/Calcutta');
                        // print_r($records);
                        $where = array('emis_timesheet.timesheet_date'=>$records['timesheet_date'],'emis_timesheet.module_id'=>$records['module_id'],'emis_timesheet.resource_id'=>$records['resource_id'],'emis_timesheet.isactive'=>1);
                        $task_entryid = $this->Homemodel->dtls_insrt($records,'emis_timesheet',$where);
                        if($task_entryid){      
                                $this->response(['dataStatus' => true,
                                                'status'  => REST_Controller::HTTP_OK,
                                                'message' => 'Details Updated Successfully',
                                                'updatedId'  => $task_entryid ],REST_Controller::HTTP_OK);

                        } else $this->response(['dataStatus' => false,
                                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                                 'message' => 'Unable To Updated the Details'],REST_Controller::HTTP_OK);

          }else $this->response(['dataStatus' => false,
               'status' => REST_Controller::HTTP_NOT_FOUND,
                                       'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
                                    
      }else $this->response(['dataStatus'=>false,
                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        
     }

     public function delete_task_dtls_get(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $usertype_id = (int)$token['emis_usertype'];
   
        if($emis_loggedin && ($usertype_id === 21)){

                                $id = $this->get('id');
                                   
                                if($id !== ''){
          
                                $update = array('isactive'=>0);
                                $where = array('id'=>$id);
          $update_data = $this->Homemodel->task_dtls_upt($update,'emis_timesheet',$where);
        
                                if($update_data){
                                       $this->response(['dataStatus'=>true,
                                                        'status'=>REST_Controller::HTTP_OK,
                                                        'message'=>'Details Deleted Successfully'],REST_Controller::HTTP_OK);
                                }else $this->response(['dataStatus'=>true,
                                                       'status'=>REST_Controller::HTTP_OK,
                                                       'message'=>'Unable To Deleted the Details'],REST_Controller::HTTP_OK);
                               }else $this->response(['dataStatus' => false,
                                                      'status'  => REST_Controller::HTTP_NOT_FOUND,
                                                      'message' => 'ID Not Found ! ',],REST_Controller::HTTP_OK);
                     }else $this->response(['dataStatus'=>false,
                                             'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                             'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
public function proj_dtls_get() {
        
                $token = Common::userToken();
                $emis_loggedin=$token['status'];
                $usertype_id = (int)$token['emis_usertype'];

                   if($emis_loggedin && ($usertype_id === 20)){

                        $date_where = array('isactive'=>'1');
                        $app_param = array('id', 'appli_id', 'app_name', 'app_category', 'isactive');
                        $app_list  = Common::get_multi_withdyncol_list($app_param,'emis_mst_applications',$date_where);
                        $role_param = array('role_id', 'role_description', 'isactive');
                        $role_list  = Common::get_multi_withdyncol_list($role_param,'emis_mst_roles',$date_where);
                        $resource_param = array('resource_id', 'resource_name', 'designation', 'isactive');
                        $resource_list  = Common::get_multi_withdyncol_list($resource_param,'emis_mst_resource',$date_where);
                        $module_param = array('id', 'module_reference', 'module_name', 'module_type', 'application', 'start_date', 'planned_end_date', 'module_scope_filepath', 'actual_end_date', 'module_status', 'isactive');
                        $module_list  = Common::get_multi_withdyncol_list($module_param,'emis_mst_module',$date_where);
                        $allotment_param = array('id', 'module_id', 'resource_id', 'role_id', 'time_commit', 'isactive');
                        $allotment_list  = Common::get_multi_withdyncol_list($allotment_param,'emis_resource_allotment',$date_where);

                        if(!empty($module_list))
                        {       $this->response(['dataStatus' => true,
                                                 'status'  => REST_Controller::HTTP_OK,
                                                 'API Description' => 'Master Details for Drowpdown (Application List,Role List,Resourcer List), Parent Details(Project Creation List) and Child Details (Resource Allotment List)',
                                                 'message'=>'Success',
                                                 'application_list'=> !empty($app_list) ? $app_list:array(),
                                                 'role_list'=> !empty($role_list) ? $role_list:array(),
                                                 'resourcer_list' => !empty($resource_list) ? $resource_list :array(),
                                                 'module_list' => !empty($module_list) ? $module_list:array(),
                                                 'allotment_list' => !empty($allotment_list) ? $allotment_list :array() ],REST_Controller::HTTP_OK);     
                                                 
                        } else  $this->response(['dataStatus'=>false,
                                                 'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                 'API Description' => 'Master Details for Drowpdown (Application List,Role List,Resourcer List), Parent Details(Project Creation List) and Child Details (Resource Allotment List)',
                                                 'message'=>'No Data Found!!',
                                                 'application_list'=> !empty($app_list) ? $app_list:array(),
                                                 'resourcer_list' => !empty($resource_list) ? $resource_list :array(),
                                                 'role_list'=> !empty($role_list) ? $role_list:array(),
                                                 'module_list' => !empty($module_list) ? $module_list:array(),
                                                 'allotment_list' => !empty($allotment_list) ? $allotment_list :array() ],REST_Controller::HTTP_OK);     
                }else $this->response(['dataStatus'=>false,
                                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        }
public function delete_proj_dtls_get(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $usertype_id = (int)$token['emis_usertype'];

        if($emis_loggedin && ($usertype_id === 20)){

             $id = $this->get('id');
                
             if($id !== ''){
                
                 $update = array('isactive'=>0);
                 $where = array('id'=>$id);
                 $where2 = array('module_id'=>$id);
                 $update_emis_mst_module = $this->Homemodel->task_dtls_upt($update,'emis_mst_module',$where);
                 $update_emis_resource_allotment = $this->Homemodel->task_dtls_upt($update,'emis_resource_allotment',$where2);
             
             if($update_emis_mst_module){
                   $this->response(['dataStatus'=>true,
                                     'status'=>REST_Controller::HTTP_OK,
                                     'message'=>'Details Deleted Successfully'],REST_Controller::HTTP_OK);
             }else $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Unable To Deleted the Details'],REST_Controller::HTTP_OK);
            }else $this->response(['dataStatus' => false,
                                   'status'  => REST_Controller::HTTP_NOT_FOUND,
                                   'message' => 'ID Not Found ! ',],REST_Controller::HTTP_OK);
  }else $this->response(['dataStatus'=>false,
                          'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function update_proj_dtls_post()
{
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $usertype_id = (int)$token['emis_usertype'];
   
      if($emis_loggedin && ($usertype_id === 20)){

                $records = $this->post('records');
                
    if(!empty($records)){         
                        date_default_timezone_set('Asia/Calcutta');
                        
                        $project_creation = $records[0]['project_creation'];
                        $project_creation['created_on'] = date("Y-m-d");
                        
                        $where = array('emis_mst_module.module_reference'=>$project_creation['module_reference'],'emis_mst_module.module_name'=>$project_creation['module_name'],'emis_mst_module.isactive'=>1);
                        $module_id = $this->Homemodel->dtls_insrt($project_creation,'emis_mst_module',$where);
                        $module_id = !empty($module_id) ? $module_id : $this->Homemodel->get_module_id('emis_mst_module',$where);

                        if($module_id > 0){
                                
                                $ctallid =$this->Homemodel->resources_vaildate('emis_resource_allotment',array('emis_resource_allotment.module_id'=>$module_id,'emis_resource_allotment.isactive'=>1),'');
                                $resource_allotment = $records[1]['resource_allotment'];
                                if(!empty($resource_allotment)){
                                        foreach($resource_allotment as $inx => $value) {
                                                $arr[$inx] = $resource_allotment[$inx]['resource_id'];
                                        }
                                        $ctid =$this->Homemodel->resources_vaildate('emis_resource_allotment',array('emis_resource_allotment.module_id'=>$module_id,'emis_resource_allotment.isactive'=>1),$arr);
                                        $reCreateArray = array_values(array_diff($ctallid,$ctid));
    
                                        if(!empty($reCreateArray)){
                                                $update = array('isactive'=>0);
                                                $update_emis_resource_allotment = $this->Homemodel->resource_dtls_upt($update,'emis_resource_allotment',$reCreateArray);
                                        }
                                
                $this->Homemodel->resources_dtls($resource_allotment,$module_id);
                                }
                        }
                        if($module_id){     
                                $this->response(['dataStatus' => true,
                                                'status'  => REST_Controller::HTTP_OK,
                                                'message' => 'Details Updated Successfully',
                                                'updatedId'  => $module_id ],REST_Controller::HTTP_OK);

                        } else $this->response(['dataStatus' => false,
                                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                                 'message' => 'Unable To Updated the Details'],REST_Controller::HTTP_OK);

          }else $this->response(['dataStatus' => false,
               'status' => REST_Controller::HTTP_NOT_FOUND,
                                       'message' => 'Data Not Found !'],REST_Controller::HTTP_OK);
                                    
      }else $this->response(['dataStatus'=>false,
                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        
     }

     public function diksha_login_post()
     {   
        //$records = $this->post('records');
    
        $loginDetails = $this->Homemodel->diksha_login();// Check if the users data store 

        if ($loginDetails['Status'])
            {
                $result         = $loginDetails['result'];
                $tokenData      = new ArrayObject();
                $type_name      = $this->Homemodel->get_category($result->emis_usertype);
                $tokenData      = $result;
                $tokenData->newschl      = $loginDetails['data'];
                $tokenData->iat = strtotime("now");
                $tokenData->exp = strtotime("+30 days");
               // $output['token'] = AUTHORIZATION::generateToken($tokenData);
               //echo $result->emis_usertype;die();
                if($result->emis_usertype == '14' || $result->emis_usertype == '8'){
                    $output['rsatoken'] = AUTHORIZATION::rsaToken($tokenData);
                }                
                        $data['dataStatus'] = true;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['records'] = $output;
                        $this->response($data,REST_Controller::HTTP_OK);
            }
        //     else
        //     {                
        //         if(!empty($loginDetails['emis_username'])){ 
        //             $data['dataStatus'] = true;
        //             //$data['status'] = REST_Controller::HTTP_NO_CONTENT;
        //             $data['status'] = REST_Controller::HTTP_OK;
        //             $data['message'] = $loginDetails['message'];
        //             $data['emis_username'] = $loginDetails['emis_username'];
        //             $data['emis_password'] = $loginDetails['emis_password'];
        //             $data['records'] = $loginDetails['result'];
        //             $this->response($data,REST_Controller::HTTP_OK);
        //         }else{
        //             $data['dataStatus'] = false;
        //             $data['status'] = REST_Controller::HTTP_NO_CONTENT;
        //             $data['message'] = $loginDetails['message'];
        //             $this->response($data,REST_Controller::HTTP_OK);
        //         }                        
        //     }
    }

    public function Stu_Content_Trans_get(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        if($emis_loggedin){
                $result = $this->Homemodel->studentcontenttransf();
                if(!empty($result)){$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Available','result'=>$result],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'No Data Available'],REST_Controller::HTTP_OK);
        }else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Invalid Credentials!','result'=>array()],REST_Controller::HTTP_OK); 
   }

   public function userDetails_post()
   {   
           //emis_username,user_type(teacher - 0,others - 1) 
           $emis_username = $this->post('emis_username');
           $user_type = (int)$this->post('user_type');

           if($user_type == 1){
                $arr = $this->Homemodel->schoolnew_basicinfo($emis_username);
           }else if($user_type == 0){
                $arr = $this->Homemodel->emisuser_teacher($emis_username);
           }else $arr = array();

           if(!empty($arr)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','details'=>$arr,'user_type'=>$user_type],REST_Controller::HTTP_OK);}
           else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','details'=>array()],REST_Controller::HTTP_OK);
        }
   public function mailDetails_post()
   {
             //dc_email,user_email,emis_username(mail link with emis_username) 
               
                $emis_username =$this->post('emis_username');
               // $emis_username_e = $this->post('emis_username_e');
                $dc_email = $this->post('dc_email');
                $user_email = $this->post('user_email');
                //$user_type = (int)$this->post('user_type');
                $user_type = $this->post('user_type');
               // $user_type_e = $this->post('user_type_e');
                //echo $user_type;echo $user_email;
                //print_r($_SERVER['HTTP_HOST']);
                //echo $emis_username;die();
              
              
                if($dc_email || $user_email){
                        
                  if($user_type == 0){

                        //   $arr = $this->Homemodel->schoolnew_basicinfo2($emis_username);
                       // $encpt =  md5($emis_username.'/'.$user_type);
                          
                          $txt1['url'] = $_SERVER['HTTP_HOST'] ;
                          $txt1['user'] = rand(100,1000).$emis_username.rand(100,1000).'/'.rand(100,1000).$user_type.rand(100,1000);
                          $txt2['name'] = 'Your';
                          $txt2['user'] = rand(100,1000).$emis_username.rand(100,1000).'/'.rand(100,1000).$user_type.rand(100,1000);
                          $txt2['url'] = $_SERVER['HTTP_HOST'] ;
                          
                  }else if($user_type == 1){
                       
                      //  $encpt =  md5($emis_username.'/'.$user_type);
                          $arr = $this->Homemodel->emisuser_teacher2($emis_username);
                          $txt1['title'] = 'sir';
                          $txt1['name'] =  $arr[0]['teacher_name'].' ('.$emis_username.')';
                          $txt1['user'] = rand(100,1000).$emis_username.rand(100,1000).'/'.rand(100,1000).$user_type.rand(100,1000);
                         
                          $txt1['url'] = $_SERVER['HTTP_HOST'] ;
                          $txt2['title'] = $arr[0]['teacher_name'].' ('.$emis_username.')';
                          $txt2['name'] = 'Your';  
                          $txt2['user'] = rand(100,1000).$emis_username.rand(100,1000).'/'.rand(100,1000).$user_type.rand(100,1000);
                          $txt2['url'] = $_SERVER['HTTP_HOST'] ;
                  }
                 
                  $mail = array(
                    'subject' => 'EMIS | Reset password',
                  );
                  
                 
                  if($dc_email != ''){
                        $mail_send = $this->send_mail($dc_email,$txt2,$mail);
                  }else if($user_email != ''){
                        $mail_send = $this->send_mail($user_email,$txt1,$mail);
                  }
                  
                  
                  
                //   if($c)
                  if($mail_send)
                  {$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success'],REST_Controller::HTTP_OK);}
                  else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
                }   
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
              }

        public function send_mail($email,$data,$subject) {
                
                     $from_email = "donotreply.emis@gmail.com";
                     $config = Array('protocol'  => 'smtp','smtp_host' => 'ssl://smtp.gmail.com',
                                'smtp_port' => 465,'smtp_user' => 'donotreply.emis@gmail.com','smtp_pass' => 'tnemisssa',
                                'mailtype'  => 'html', 'charset'   => 'utf-8','wordwrap'  => TRUE);
                     $this->load->library('email',$config);
                     $this->email->set_newline("\r\n"); 
                     $this->email->from($from_email, 'info emis');
                     $this->email->to($email);
                              
                     
                     $data['mail'] = $subject;
                     
                     $content = $this->load->view('newSchool/resetPasswordTemplate',$data,true);

                        if($_SERVER['HTTP_HOST'] == 'localhost'){
                                $url = "http://emis1.s3-website.ap-south-1.amazonaws.com/";
                        }else if($_SERVER['HTTP_HOST'] == '13.232.216.80'){
                                $url = "http://emis1.s3-website.ap-south-1.amazonaws.com/";
                        }else if($_SERVER['HTTP_HOST'] == 'emis1.tnschools.gov.in'){
                                $url = "https://emis.tnschools.gov.in/";
                        }
                        
                     //$content = str_replace(base_url(),'http://emis.tnschools.gov.in/',$content);
                     $content = str_replace(base_url(),$url,$content);
                     $this->email->subject($subject['subject']);
                     $this->email->message($content);
                
                     if($this->email->send()){
                        return true;
                     }else{
                        return false;
                     }
                   
                }

   public function updatePassword_post()
   {  
           //emis_username,password 
           $emis_username = $this->post('emis_username');
           $string = $this->post('password');
           $user_type = (int)$this->post('user_type');
           $password = md5($string); 
                  $data = array(
                  'emis_username'       => $emis_username,
                  'emis_password'       => $password,
                  'ref'                 => $string,  
                  );
                  if($user_type == 0){
                          $table = 'emisuser_teacher';
                  }else if($user_type == 1){
                          $table = 'emis_userlogin';
                  }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
                $c = $this->Homemodel->updatelogin($data,$table);
                if($c){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success'],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
        }

    /**Fields for user's api(common) by wesley starts here **/
    public function getFields_get(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $usertype_id = (int)$token['emis_usertype'];
        if($usertype_id == '14'){
                $usertype = 'T';
        }
        $data = $this->Homemodel->getData($usertype);
        if(!empty($data)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Data Available','field_set'=>$data],REST_Controller::HTTP_OK);}
           else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Available'],REST_Controller::HTTP_OK);
    }    
    /**Fields for user's api(common) by wesley ends here **/
    public function getMobileNo_get(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $usertype_id = (int)$token['emis_usertype'];
    
        if($usertype_id === 1){
                $data = $this->Homemodel->getmobileno1($token['school_id']);
                if(!empty($data)){ $data[0]->usertype = 2 ;} 
        }else if($usertype_id === 8){
                $data = $this->Homemodel->getmobileno2($token['emis_user_id']);
                if(!empty($data)){ $data[0]->usertype = 1;}
        }else{
                $data = array();
        }
              if(!empty($data)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);}
              else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','data'=>array()],REST_Controller::HTTP_OK);
        }

        public function updateMobileNo_post(){
                $token = Common::userToken();
                $emis_loggedin=$token['status'];
                $usertype_id = (int)$token['emis_usertype'];
            $rec = $this->post('records');
        //     print_r($rec);die();
                if(!empty($rec)){
                        if((int)$rec['UserType'] == 1){
                                $data = $this->Homemodel->updatemobileno1($rec['MobNo'],$rec['TeachID']);
                                if($data > 0){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success'],REST_Controller::HTTP_OK);}
                                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
                         
                        }else  if((int)$rec['UserType'] == 2){
                                $data = $this->Homemodel->updatemobileno2($rec['MobNo'],$rec['SchlID']);
                                if($data > 0){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success'],REST_Controller::HTTP_OK);}
                                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
                                 
                        }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);  
                     }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
        }
        public function questionSet_post(){
                $records = $this->post('records');   
                // print_r($records);
                if($records['SrvyID'] != ''){
                       $data = $this->Homemodel->getQuestset($records['SrvyID']);          
                }else{
                       $data = array();
                }
                if(!empty($data)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','data'=>array()],REST_Controller::HTTP_OK);
        }
        public function questionResponse_post(){
                $records = $this->post('records');
                if(!empty($records['survey_resp']) && $records['survey_resp_status'] != ''){
                       $srsp = $records['survey_resp']; 
                       $srsp_st = $records['survey_resp_status']; 
                       if(!empty($srsp)){
                        foreach($srsp as $dt){ //need to check id in html
                                $resp[] = array(
                                        'response_date'  => $dt['ResDat'],
                                        'school_id'    => $dt['SchlID'],
                                        'survey_id'  => $dt['SrvyID'],
                                        'question_id'    => $dt['QuestID'],
                                        'response_int'   => isset($dt['RespInt']) ? $dt['RespInt'] : null,
                                        'response_char'  => isset($dt['RespChar']) ? $dt['RespChar'] : null,
                                        'isactive'   => $dt['RespStatus']);
                        }
                        
                }else $resp = array();
                       $result=(!empty($resp)) ? $this->Homemodel->surveyresponse($resp) : false;
                //        echo $result;die();
                       if($result>0){
                        if(!empty($srsp_st)){
                                
                                        $resp_st = array(
                                                'response_date'  => $srsp_st['ResDat'],
                                                'school_id'    => $srsp_st['SchlID'],
                                                'survey_id'  => $srsp_st['SrvyID'],
                                                'status'         => $srsp_st['NOCount'],
                                                'updated_mobile' => $srsp_st['UpdtdMob'],
                                                'updated_name'   => $srsp_st['UpdtdNam'],
                                                'isactive'   => $srsp_st['Status']);
                                        
                                // print_r($resp_st);
                                // die();
                                $result1 = (!empty($resp_st)) ? $this->Homemodel->surveyresponsestatus($resp_st) : false; 
                        }else{ $result1 = false; }
                       }else{ $result1 = false; }
                      }else{ $result1 = false; }

                if($result1){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success'],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails'],REST_Controller::HTTP_OK);
        
        }
        public function SchoolsUnderBRTE_post(){
                $records = $this->post('records');
                if($records['BRTEID'] != ''){
                        $data = $this->Homemodel->SchoolsUnderBRTE($records['BRTEID']);
                }else{
                        $data = array();
                }
                if(!empty($data)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','data'=>array()],REST_Controller::HTTP_OK);
        
        }
        public function surveyList_post(){
                $records = $this->post('records');   
                // print_r($records);
                if($records['SchlID'] != ''){
                        $data = $this->Homemodel->getSurvey($records['SchlID']);         
                }else{
                        $data = array();
                }
                if(!empty($data)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','data'=>array()],REST_Controller::HTTP_OK);
                       
        }     
        
        public function social_category_get(){
                $token = Common::userToken();
                $emis_loggedin=$token['status'];
                if($emis_loggedin){
                        $data = $this->Homemodel->getSocialCategory(); 
                        if(!empty($data)){
                                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);   
                        }
                        else{
                                $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Found','data'=>array()],REST_Controller::HTTP_OK);     
                        }
                }
        }

        public function diff_abled_get(){
                $token = Common::userToken();
                $emis_loggedin=$token['status'];
                if($emis_loggedin){
                        $data = $this->Homemodel->getDiffAbled(); 
                        if(!empty($data)){
                                $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','data'=>$data],REST_Controller::HTTP_OK);   
                        }
                        else{
                                $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'No Data Found','data'=>array()],REST_Controller::HTTP_OK);     
                        }
                }
        }
}
?>
