<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;
class Schools_home extends REST_Controller{

        function __construct()
        {
                 parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Schools_homemodel');
				 $this->load->model('AllApproveModel');
                 $this->load->model('Authmodel');
                 $this->load->model('Udise_staffmodel');
                 $this->load->model('Statemodel');
                 $this->load->library('AWS_S3');
                 $this->load->library('AWSBucket');
                 $this->load->model('Homemodel');
                 $this->load->helper('Common');
        }

    /** Screen Name : DashBoard HM
     *  Purpose     : Student listing only
     *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_dash
     */
    public function schools_dashboard_post(){
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		
        $records = $this->post('records');

        $school_id = $records['school_id'];
        $school_udise  = $records['school_udise_code'];
        $user_id = $records['user_id'];
        $user_type_id = $records['user_type_id'];
		
		
        // [emis_school_udise] => 33010105902 
        // [emis_user_id] => 181 
        // [emis_school_id] => 181
        // [emis_user_type_id] => 1

        $data['today']=date("d-m-Y");
                
        // $school_id = $this->session->userdata('emis_');
        
        // = $this->session->userdata('emis_user_type_id');
        
        $student_classwise_count = $this->Schools_homemodel->student_classwise($school_id);
        $data['students_classwise_count'] = $student_classwise_count['school_details'];
        $data['categorized_classwise_count'] = $student_classwise_count['categorized_class_details'];
        $data['class_level'] = $student_classwise_count['result'];
        $data['attendance_details'] = $this->Schools_homemodel->get_school_student_attendance($user_id);
        $arr = $this->Schools_homemodel->emis_school_staff_details($school_id);
        $data['staff_details']  = $arr['staff_details'];
        $data['categorized_staff_details']  = $arr['categorized_staff_details'];
        $data['student_castwise'] = $this->Schools_homemodel->get_dash_schoolwise_community($user_id);
        
        $data['aadhaar_status'] = $this->Schools_homemodel->get_schoolwise_aadhaardetails($user_id);
        $data['bloodgroup_status'] = $this->Schools_homemodel->get_schoolwise_bloodgroupdetails($user_id);
        $data['flash_data'] = $this->Schools_homemodel->get_flash_news_data($school_id,$user_type_id,$token['district_name'],$token['block_id'],$token['school_type'],$token['cate_type']);
        $data['flash_field'] = $this->Schools_homemodel->get_flash_field_data($user_id);

        $table = 'students_child_detail';
        $where = array('school_id'=>$school_id,'transfer_flag'=>0,'request_flag'=>'1');
        $count = 'unique_id_no';
        $data['request_count'] = $this->Schools_homemodel->get_list_count($table,$count,$where);
        // $data['RTE_count'] = $this->Schools_homemodel->get_RTI_Students_list($school_id);
        // $data['RTE_count1'] = $this->Schools_homemodel->get_RTI_Students_list1('','',$school_id);
        // $data['password_reset_count'] = $this->Schools_homemodel->get_teacher_password_reset($user_id);
        $data['student_invalid_aadhar_no'] = $this->Schools_homemodel->student_invalid_aadhar_no($school_id);
        $data['student_invalid_phn_no'] = $this->Schools_homemodel->student_invalid_phn_no($school_id);
        // $data['schools_student_count'] = $this->Schools_homemodel->get_single_list('students_school_child_count',array('school_id'=>$school_id));
        $data['overall_schools_students'] = $this->Schools_homemodel->school_students_count($school_id);
        $data['overall_schools_teachers'] = $this->Schools_homemodel->school_teachers_count($school_id);
        $data['pending_student_transfer'] = $this->Schools_homemodel->pending_student_transfer_count($school_id);
        $dates = range(date('Y')-1, date('Y')+1);
        $acad_year = [] ;
        foreach($dates as $key=>$value){
          if (date('m', strtotime($value)) <= 6) {
              $acad_year[$key] = $value . '-' . $value+1;
          } else {
              $acad_year[$key] = $value-1 . '-' . $value;
          }
        } 
        $data['last_3_acad_year'] = $acad_year;

        $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);
		    
    }


        /** Screen Name : Student List ( alternative fns)
         *  Purpose     : Student listing only
         *  Refer       : In emis-code (ctrl : Home -> fns : emis_school_student_classwise 
         */
        public function schoolwise_student_list_get(){
            $school_id = $this->get('school_id');
            $constant = constant($this->get('constant'));
            echo $constant;die();

            if($school_id != '' && $constant != '' ){
        
                $data = $this->Schools_homemodel->get_classwise_student_details('','',$school_id,$constant);
                
                if(!empty($data)) $this->response(['dataStatus' => true,
                                                   'status'  => REST_Controller::HTTP_OK,
                                                   'result'  => $data ],REST_Controller::HTTP_OK);
                else $this->response(['dataStatus' => false,
                                      'status'  => REST_Controller::HTTP_NO_CONTENT,
                                      'message' => 'No Records Found!, please try again.',
                                     ],REST_Controller::HTTP_OK);
                
            } else $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Please Provide the information.',
                                   ],REST_Controller::HTTP_OK);
            
        }

        function to_get_AWS_S3_image_get(){
            $path = $this->get('path');
            if($path){
                $image_url = $this->aws_s3->get_AWS_S3_Images(TEACHER_BUCKET_NAME,$path,'+5 minutes','','');
                if($image_url){
                    $this->response(['dataStatus' => true,
                                     'status'  => REST_Controller::HTTP_OK,
                                     'result'  => $image_url ],REST_Controller::HTTP_OK);
                }else{
                    $this->response(['dataStatus' => false,
                                     'status'  => REST_Controller::HTTP_NO_CONTENT,
                                     'message'  => 'SomeThing Went Wrong !..' ],REST_Controller::HTTP_OK);
                 }
            }else{
                    $this->response(['dataStatus' => false,
                            'status'  => REST_Controller::HTTP_NOT_FOUND,
                            'message'  => 'Data Not Found!' ],REST_Controller::HTTP_OK);
            }
            
            
        }
     

        // Master : Classes Wise Student List 
        // Sample Params : {"records":{"class_id":6,"section":"A","school_id":2112}}
        public function classwise_students_list_post(){

            $records = $this->post('records');
            $class_id = $records['class_id'];
            $section_id = $records['section'];
            $school_id = $records['school_id'];
            $constant = REGULAR_STUDENT;
            $arr = $this->Schools_homemodel->get_classwise_student_details($class_id,$section_id,$school_id,$constant); 
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);

        }

        // Master : Classes Wise Section List 
        // Sample Params : {"records":{"class_id":6,"school_id":2112}}
        public function classwise_section_post(){
            $records = $this->post('records');
            $school_id = $records['school_id'];
            $class_id = $records['class_id'];
            $arr = $this->Schools_homemodel->get_classwise_section($class_id,$school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);
            
        }

        public function allsectionsbyclass_get(){
            $school_id=$this->get('school_id');
            $class_id = $this->get('class_id');
  
            $getalldept  = $this->Schools_homemodel->getallsection($school_id,$class_id);
  
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'result'  => $getalldept ],REST_Controller::HTTP_OK);      
  
        }

        // Master : School Wise Class and Section List 
        // Sample Params : {"records":{"school_id":2112}}
        function schoolwise_class_section_get(){
            $school_id = $this->get('school_id');
            $arr = $this->Schools_homemodel->get_schoolwise_class_section($school_id);
            $medium = $this->Schools_homemodel->get_schoolwise_medium($school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr,'medium'=>$medium ],REST_Controller::HTTP_OK);
            
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
                                 'message' => 'Successfully Updated',
                                ],REST_Controller::HTTP_OK);

            }
            else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_NO_CONTENT,
                                 'message' => 'SomeThing Went Wrong',
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

  
  /*********************************************
	BRTE Details done by Ramco Magesh
  ********************************************/
	public function brtedetails_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);	
		$emislogin=$token['status'];
		$brtelogin=$_GET['brte_id'];
		if($emislogin){
			$data=$this->AllApproveModel->brtedetails($brtelogin);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','brtedetails'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
  
/*****************************************************************************************************************************************************************
				School Profile By Ramco Vivek Rao
******************************************************************************************************************************************************************/
    function teachingandnonteaching31_get(){
        $key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);	
        $emislogin=$token['status'];
        $this->load->library('LibPrimeDetails');
        $prime=new LibPrimeDetails();
        $udise=$prime->setPrimeDetails('udise');
        $acyear=$prime->setPrimeDetails('acyear');
        if($token['emis_usertype'] == '9'){
            $dist_id = $token['district_id'];
        }else if($token['emis_usertype'] == '10'){
            $edu_dist_id = $token['edu_district_id'];
        }
        $data=$this->AllApproveModel->teacherPosition($udise,$acyear,$dist_id,$edu_dist_id);
        $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,
        'message'=>'Successfully','teacherpost'=>$data],REST_Controller::HTTP_OK);
    }
	function schoolProfilemaster_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);	
		$emislogin=$token['status'];
		if($emislogin){
		$data['basic']=$this->AllApproveModel->getSchoolInfo($token['school_id']);
		//print_r($data['basic']);
        $data['districts'] = $this->AllApproveModel->get_alldistricts();
        $data['stdcode']=$this->AllApproveModel->getSTDCodeByDistrict($data['basic'][0]->district_id);
        $data['resitype']=$this->AllApproveModel->getResidentialType();
        $data['schooltype']=$this->AllApproveModel->getallschoolcategory();
        $data['schoolcategory']=$this->AllApproveModel->getallschoolcategory();
        $data['schoolmanagement']=$this->AllApproveModel->get_allmajorcategory();
        $data['mediumInstruct']=$this->AllApproveModel->getMediumInstruct();
        $data['minority']=$this->AllApproveModel->getminority();
        $data['languagesubject']=$this->AllApproveModel->getLanguageasSubject();
        $data['bankdistrict']=$this->AllApproveModel->get_allbankdistricts();
        $data['trade']=$this->AllApproveModel->getTrades();
        $data['ictlist']=$this->AllApproveModel->getICTList(1);
        $data['ictlistofthings']=$this->AllApproveModel->getICTList(3);
        $data['ictlistofkits']=$this->AllApproveModel->getICTList(2);
        $data['bank']=$this->AllApproveModel->getbankList();
        $data['lablist']=$this->AllApproveModel->getLablist();
        $data['constructlist']=$this->AllApproveModel->getConstructlist();
        $data['clublist']=$this->AllApproveModel->getclub();
        //print_r($data['clublist']);
        $data['ictsuplier']=$this->AllApproveModel->getICTSupplier();
        $data['profile']=$this->AllApproveModel->getProfileCompletes($data['basic'][0]->udise_code);
			
		$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','schoolmaster'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}	
	}
	
	function schoolProfileView_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		
		//$data = JWT::decode(base64_decode($token), $key, array('HS256'));
        if(isset($_GET['sch_id'])){
            $schoolid=$_GET['sch_id'];
        }else{
           $schoolid=$token['school_id'];
        }
        
        if(!isset($_GET['os'])){
            $_GET['os']=0;
        }
        
		//echo $schoolid; die();
        //$start_memory = memory_get_usage();
        
        //echo memory_get_usage() - $start_memory;
        $data['print']=1;
        //$user=$this->Authmodel->getusertype($this->session->userdata('emis_user_type_id'));   
        
        switch($_GET['os']){
            case 0:{    //All Query Execution
                $profile=json_decode(json_encode($this->AllApproveModel->getSchoolProfileData($schoolid)),true);
                $daywork_club_trade=json_decode(json_encode($this->AllApproveModel->getDayWorksTradeClubs($schoolid)),true);
                $const_lib_insp=json_decode(json_encode($this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid)),true);
                $equip_lab_inet=json_decode(json_encode($this->AllApproveModel->getEquipLabInternet($schoolid)),true);
                $fees_udiseplus_fund=json_decode(json_encode($this->AllApproveModel->getFeesUdisePlusFund($schoolid)),true);
                break;
            }
            case 1:{ //Only Profile Details
                $profile=json_decode(json_encode($this->AllApproveModel->getSchoolProfileData($schoolid)),true);
                break;
            }
            case 2:{ //Only Daywork Club Trade Details
                $daywork_club_trade=json_decode(json_encode($this->AllApproveModel->getDayWorksTradeClubs($schoolid)),true);
                break;
            }
            case 3:{ //Only Construction Library and Inspection
                $const_lib_insp=json_decode(json_encode($this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid)),true);
                break;
            }
            case 4:{ //Only Equipment Lab and Internet
                $equip_lab_inet=json_decode(json_encode($this->AllApproveModel->getEquipLabInternet($schoolid)),true);
                break;
            }
            case 5:{ //Only UdisePlus and Fund
                $fees_udiseplus_fund=json_decode(json_encode($this->AllApproveModel->getFeesUdisePlusFund($schoolid)),true);
                break;
            }
        }
        
             
        //if(isset($_GET['os']) && $_GET['os']==1){
            /*$daywork_club_trade=json_decode(json_encode($this->AllApproveModel->getDayWorksTradeClubs($schoolid)),true);
            $const_lib_insp=json_decode(json_encode($this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid)),true);
            $equip_lab_inet=json_decode(json_encode($this->AllApproveModel->getEquipLabInternet($schoolid)),true);
            $fees_udiseplus_fund=json_decode(json_encode($this->AllApproveModel->getFeesUdisePlusFund($schoolid)),true);*/
            foreach($profile[0] as $key => $prof){
                if($key!='mediumetr' && $key!="langetr")
					$data['schoolinfo'][$key]=$prof;
            }
			foreach($fees_udiseplus_fund[0] as $key => $udiseplus){
                if($key!="class_id" &&$key!="inst_fee" &&$key!="tution_fee" &&$key!="regular_fee" &&$key!="transport_fee" &&$key!="annual_fee" &&$key!="book_fee" &&$key!="lab_fee" &&$key!="other_fee" &&$key!="total_fee"){
                    $data['schoolinfo']['udiseplus'][$key]=$fees_udiseplus_fund[0][$key];
                }
             }
            $result = array();$key='mediumetr';
            foreach($profile as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                //$data['schoolinfo']['medium'][]=$r[0]['mediumetr'];
				$data['schoolinfo']['medium'][]=array(
					'medium'			=> $r[0]['mediumetr'],
					'medium_instrut'     =>  $r[0]['medium_instrut'],
                    'other_medium'      =>  $r[0]['other_medium']
				);
				
            }
			
			
			
			
			
            $result = array();$key='langetr';
            foreach($profile as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                //$data['schoolinfo']['langetr'][]=$r[0]['langetr'];
				$data['schoolinfo']['langetr'][]=array(
					'lang'=>$r[0]['langetr'],
					'langtaught' => $r[0]['lang_taught']
				);
				
				
            }
            
            $result = array();$key='trade';
            foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                //$data['schoolinfo']['trade'][]=$r[0]['trade'];
				$data['schoolinfo']['trade'][]=array(
					'trade' =>$r[0]['trade'],
					'voc_trade' => $r[0]['voc_trade']
				);
            }
            $result = array();$key='daywork_school_type';
            foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                $data['schoolinfo']['daywork_school_type'][]=array(
					'school_type'			=>$r[0]['school_type'],
                    'instr_dys'     =>  $r[0]['instr_dys'],
                    'stud_hrsonly'      =>  $r[0]['hrs_chldrn_sty_schl'],
					'stud_minonly'      =>  $r[0]['mns_chldrn_sty_schl'],
					'teach_hrsonly'      =>  $r[0]['hrs_tchrs_sty_schl'],
					'teach_minonly'      =>  $r[0]['mns_tchrs_sty_schl'],
					'stud_hrs'      =>  $r[0]['stud_hrs'],
                    'teach_hrs'     =>  $r[0]['teach_hrs'],
                    'cce_impl'      =>  $r[0]['cce_impl'],
                    'cce_cum'       =>  $r[0]['cce_cum'], 
                    'cce_shared'    =>  $r[0]['cce_shared']
                );
            }
             $result = array();$key='clubs';
             foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                //$data['schoolinfo']['clubs'][]=$r[0]['clubs'];
				$data['schoolinfo']['clubs'][]=array(
					'clubs' => $r[0]['clubs'],
					'others_cc' => $r[0]['other_cc'],
					'extra_cc' => $r[0]['extra_cc']
				);
             }
             $result = array();$key='inspectid';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['inspection'][]=array(
					'officer_types'	=> $r[0]['officer_types'],
                    'officer_type'  =>  $r[0]['officer_type'],
                    'purpose'       =>  $r[0]['purpose'],
					'purposes'       =>  $r[0]['purposes'],
                    'date_inspect'  =>  $r[0]['date_inspect']
                );
             }
             
             $result = array();$key='constr_id';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             //print_r($result);die();
             $blockno=1;
             foreach($result as $k => $r){
                $data['schoolinfo']['natureofconst'][]=array(
                    'blockno'               =>  $blockno++,  
                    'construct_type'        =>   $r[0]['construct_type'],
					'construct_types'        =>   $r[0]['construct_types'],
                    'total_flrs'            =>   $r[0]['total_flrs'],
                    'tot_classrm_use'       =>   $r[0]['tot_classrm_use'],
                    'tot_classrm_nouse'     =>   $r[0]['tot_classrm_nouse'],
                    'off_room'              =>   $r[0]['off_room'],
                    'lab_room'              =>   $r[0]['lab_room'],
                    'library_room'          =>   $r[0]['library_room'], 
                    'comp_room'             =>   $r[0]['comp_room'],
                    'art_room'              =>   $r[0]['art_room'],
                    'staff_room'            =>   $r[0]['staff_room'],
                    'hm_room'               =>   $r[0]['hm_room'],
                    'girl_room'             =>   $r[0]['girl_room'],
                    'good_condition'        =>   $r[0]['good_condition'],
                    'need_minorrep'         =>   $r[0]['need_minorrep'],
                    'need_majorrep'         =>   $r[0]['need_majorrep'],
                    'total_room'            =>   $r[0]['total_room']
                );
             }
             $result = array();$key='category_name';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['classrooms'][]=array(
					'schooltype' => $r[0]['school_type'],
                    'category_name' =>  $r[0]['category_name'],
                    'num_rooms'     =>  $r[0]['num_rooms']
                );
             }
             $result = array();$key='library_type';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['library'][]=array(
					'library_types' =>  $r[0]['library_types'],
                    'library_type' =>  $r[0]['library_type'],
                    'num_books'     =>  $r[0]['num_books'],
					'ncert_books'     =>  $r[0]['ncert_books']
                );
             }
             $result = array();$key='ictetrid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['ictentry'][]=array(
					'ict_type'          =>  $r[0]['ict'],
                    'ict_types'          =>  $r[0]['ict_type'],
                    'supplied_by'       =>  $r[0]['supplied_by'],
					'supplied_bys'       =>  $r[0]['supplied_bys'],
                    'purpose'           =>  $r[0]['purpose'],
					'purposes'           =>  $r[0]['purposes'],
                    'avail_nos'         =>  $r[0]['avail_nos'],
                    'working_nos'       =>  $r[0]['working_nos']
                );
             }
             $result = array();$key='internet';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['internetpro'][]=array(
                    'subscriber'    =>  $r[0]['subscriber'],
                    'data_speed'    =>  $r[0]['data_speed'],
					'data_speeds'   =>  $r[0]['data_speeds'],
					'range'   =>  $r[0]['range_unit'],
					'provided_bys'   =>  $r[0]['provided_bys'],
                    'provided_by'   =>  $r[0]['provided_by']
                );
                    
             }
             $result = array();$key='labetrid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['labentry'][]=array(
                    'Lab'    =>  $r[0]['Lab'],
					'seperate_rooms'    =>  $r[0]['seperate_rooms'],
                    'condition_nows'   =>  $r[0]['condition_nows'],
					'lab_id'    =>  $r[0]['lab_id'],
                    'seperate_room'    =>  $r[0]['seperate_room'],
                    'condition_now'   =>  $r[0]['condition_now']
                );        
             }
             
             $result = array();$key='eqipid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['equipentry'][]=array(
                    'ictkit'    =>  $r[0]['ictkit'],
					'supplied_by'    =>  $r[0]['supplied_by'],
                    'kitsupplier'    =>  $r[0]['kitsupplier'],
					'equip_id'    =>  $r[0]['equip_id'],
					'totfunc'    =>  $r[0]['tot_func'],
                    'quantity'   =>  $r[0]['quantity']
                );   
             }
             $result = array();$key='invenid';
             foreach($equip_lab_inet as $val) {
                 if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                 }else{
                    $result[""][] = $val;
                 }
             } 
             foreach($result as $r){
                $data['schoolinfo']['invententry'][]=array(
					'inven_id'  => $r[0]['inventry_id'],
                    'inven_item'    =>  $r[0]['inven_item'],
                    'invensupp'    =>  $r[0]['invensupp'],
                    'inven_avail'   =>  $r[0]['inven_avail'],
                    'inven_working'   =>  $r[0]['inven_working']
                ); 
             }
             $result = array();$key='feesid';
             foreach($fees_udiseplus_fund as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['feesStruct'][]=array(
                    'class_id'=>$r[0]['class_id'],
                    'inst_fee'=>$r[0]['inst_fee'],
                    'tution_fee'=>$r[0]['tution_fee'],
                    'regular_fee'=>$r[0]['regular_fee'],
                    'transport_fee'=>$r[0]['transport_fee'],
                    'annual_fee'=>$r[0]['annual_fee'],
                    'book_fee'=>$r[0]['book_fee'],
                    'lab_fee'=>$r[0]['lab_fee'],
                    'other_fee'=>$r[0]['other_fee'],
                    'total_fee'=>$r[0]['total_fee']
                );
             }
             
             
        
        //}//End of If Condition
		$this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Successfully',
                             'result'  => $data],REST_Controller::HTTP_OK);
    }
    
    function schoolProfile_post(){
        $ts=explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status']; 
        if(isset($_GET['sch_id'])){
            $school_id=$_GET['sch_id'];
        }else{
            $ts =explode(".",getallheaders()['Token']);
    		$token=json_decode(base64_decode($ts[1]),true);
    		$emis_loggedin =$token['status']; 
            $school_id = $token['school_id'];
        }
        
        $data = json_decode(file_get_contents("php://input"),true);   
        date_default_timezone_set('Asia/Kolkata');
        //print_r($data);die();
        foreach($data as $tablename => $tabledata){
			$tabledesc = $this->Udise_staffmodel->Tabledescribe($tablename);
            if(!is_array(array_shift(array_values($tabledata)))){
                foreach($tabledesc as $descindex => $descvalue){
                    foreach($tabledata as $tableindex => $tablevalue){
                        if($descvalue['Field']==$tableindex){
                            if($descvalue['Type']=='date'){
                                $insertArray[$tablename][$tableindex]=date("Y-m-d",strtotime(str_replace('/', '-', $tablevalue))); 
                            }else{
                                $insertArray[$tablename][$tableindex]=$tablevalue;    
                            }
                        }
                    }
                }
            }else{ 
			   foreach($tabledata as $tindex => $tdata){
				   foreach($tdata as $idx => $val){
					   foreach($tabledesc as $descindex => $descvalue){
						   if($descvalue['Field']==$idx){
							   if($descvalue['Type']=='date'){
								   $tabledata[$tindex][$idx]=date("Y-m-d",strtotime(str_replace('/', '-', $val)));
                                   //echo($val."==".date("Y-m-d",strtotime(str_replace('/', '-', $val)))."\n");
							   }
						   }
					   }
				   }
			   }
               $insertArray[$tablename]=$tabledata;
			   //print_r($insertArray);die();
            }
        }
        //print_r($insertArray);die();
		if($this->AllApproveModel->AllDataOnce($insertArray,$school_id)){
			 $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => true],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'failed',
                             'result'  => false],REST_Controller::HTTP_OK);
		}
    }
    
    function SchoolRenewal_post(){
    	
      
    	

        $awsdetails=array('bucket' => 'renewalapplicationemis',
          'key'           =>  'AKIAI3EE36AJMUO6YBVQ',
            'secret'        =>  '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',
           'foldername'    =>  '',
            'files'         =>  $_FILES,
        'storageClass'  =>  'STANDARD'
         );
       
       
   $AWS=new AWSBucket('renewalapplicationemis','AKIAI3EE36AJMUO6YBVQ','JFi4uedD0lBBGiE+Ngaer0nJpnkQHt1EAR4CReiU','',$_FILES,'STANDARD_IA');
     $uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files);
    

     
       
       
		//print_r($uploadarr);

        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        $data = json_decode($this->input->post('records'),true);
        
		
        $data['schoolnew_renewal']['renewal_id']=($_POST['renewal_id']==''||$_POST['renewal_id']==0)?time():$_POST['renewal_id'];
		//echo  "ID----->".$data['schoolnew_renewal']['renewal_id'];
        $data['schoolnew_renewal']['school_key_id']=$token['school_id'];
        $renewal_id=$this->AllApproveModel->getRenewalID();
        $renew_id=$renewal_id[0]['id']+1;
        foreach($data as $tablename => $tabledata){
            $tabledesc = $this->Udise_staffmodel->Tabledescribe($tablename);
            if(!is_array(array_shift(array_values($tabledata)))){

                foreach($tabledesc as $descindex => $descvalue){

                    foreach($tabledata as $tableindex => $tablevalue){

                        if($descvalue['Field']==$tableindex){
                            if($descvalue['Type']=='date'){
                                $tablevalue=date("Y-m-d",strtotime($tablevalue));
                            }elseif($descvalue['Type']=='datetime'){
                                $tablevalue=date("Y-m-d h:i:s",strtotime($tablevalue));
                            }
                            switch($tableindex){
                                case 'id':{
                                    if($tablename="schoolnew_renewal"){
                                        $tablevalue=$renew_id;

                                    }
                                    break;
                                }
                                case 'renewal_id':{
                                    if($tablevalue==""){
                                        $tablevalue=$renew_id;

                                    }
                                    break;
                                }
                                case 'lastrenewal_filename':{
                                    $tablevalue=$uploadarr['lastrenewal'][0]['fname'];


                                    break;
                                }
                                case 'lastrenewal_filepath':{
                                    $tablevalue=$uploadarr['lastrenewal'][0]['fpath'];
                                    break;
                                }
                                case 'challan_filename':{
                                    $tablevalue=$uploadarr['challan'][0]['fname'];
                                    break;
                                }
                                case 'challan_filepath':{
                                    $tablevalue=$uploadarr['challan'][0]['fpath'];
                                    break;
                                }
                            }
                            $insertArray[$tablename][$tableindex]=$tablevalue;
                        }
                    }
                }
            }else{
               foreach($tabledata as $tindex => $multiinsert){
                    foreach($uploadarr['certificate_'.$multiinsert['certificate_id']] as $filevalue){
                        $multiinsert['certificate_filename']=$filevalue['fname'];
                        $multiinsert['certificate_filepath']=$filevalue['fpath'];
                        $multiinsert['renewal_id']=$renew_id;
                    }
                    $insertArray[$tablename][]=$multiinsert;
               }
            }
        }
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => $this->AllApproveModel->renewalDataAtOnce($insertArray)],REST_Controller::HTTP_OK);
    }

    function enrollmentDetails_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        
        if(isset($_GET['rep'])){
            $rep=$_GET['rep'];
        }else{
            $rep=1;
        }
        if(isset($_GET['item'])){
            $itemgroup=$_GET['item'];
        }else{
            $itemgroup=1;
        }

        //print_r($token);
        if($token['emis_usertype'] == '9'){
            $dist_id = $token['district_id'];
        }else if($token['emis_usertype'] == '10'){
            $edu_dist_id = $token['edu_district_id'];
        }
        $udise_sch_code=$this->setPrimeDetails('udise');
        $acyear=$this->setPrimeDetails('acyear');
        //echo("rep :".$rep."\n"."udise:".$udise_sch_code."\n"."ac_year:".$acyear."\n"."item_group:".$itemgroup);die();
        $result=false;
        
        
        
        
        if($emis_loggedin){
            switch($rep){
                case 1:{
                    switch($itemgroup){
                        case 1:$result=$this->AllApproveModel->enrollmentDetails42a($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);break;
                        case 2:$result=$this->AllApproveModel->enrollmentDetails42b($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);break;
                        case 3:$result=$this->AllApproveModel->enrollmentDetails42c($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);break;
                        //case 4:$result=$this->AllApproveModel->enrollmentDetails42d($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);break;
                    }
                    break;
                }
                case 2:{
                    switch($itemgroup){
                        case 1:$result=$this->AllApproveModel->enrollmentDetails45a($acyear,$udise_sch_code,$rep,$itemgroup);break;
                        case 2:$result=$this->AllApproveModel->enrollmentDetails45b($acyear,$udise_sch_code,$rep,$itemgroup);break;
                    }
                    break;
                }
                case 50:{
                    switch($itemgroup){
                        case 5:$result=$this->AllApproveModel->enrollmentDetails42d($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);break;                        
                    }
                    break;
                }
                default:$result=$this->AllApproveModel->enrollmentDetails($acyear,$udise_sch_code,$rep,$itemgroup,$dist_id,$edu_dist_id);
            }
            
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'enrolment'  => $result],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => $result],REST_Controller::HTTP_OK);
        }
    }

    function incenFacChildren_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status'];
        $school_id = $token['school_id'];
        //print_r($token['school_id']);die();        
       
        if($emis_loggedin){
            $pri_id = 1;
            $uprpri_id = 2;
            if(!empty($school_id)){
                $result['pri']=$this->AllApproveModel->incenFacDetails($school_id,$pri_id);
                $result['upr_pri']=$this->AllApproveModel->incenFacDetails($school_id,$uprpri_id);
                $result['cwsn']=$this->AllApproveModel->incenFacCWSN($school_id);
                //print_r($result);die();
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'Success',
                                'incenfac'  => $result],REST_Controller::HTTP_OK);
            }else{
                $this->response(['dataStatus' => false,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Token Mismatch.Use Proper Token'],REST_Controller::HTTP_OK);
            }            
        }else{
            $this->response(['dataStatus' => false,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Login to check the detail'],REST_Controller::HTTP_OK);
        }
    }
    
    function getRejectList_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
        //print_r($token);die();
        $module=$_GET['appcat'];
        $schooltype=$_GET['stype'];
        $usertype=$_GET['utype'];
        $result=$this->AllApproveModel->getRejectionList($module,$schooltype,$usertype);
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => $result],REST_Controller::HTTP_OK);
    }
    
    function annualResult_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        $udise_sch_code=$this->setPrimeDetails('udise');
        $acyear=$this->setPrimeDetails('acyear');

        /**Udise + rep for CEO,DEO login**/
        if($token['emis_usertype'] == '9'){
            $dist_id = $token['district_id'];
        }else if($token['emis_usertype'] == '10'){
            $edu_dist_id = $token['edu_district_id'];
        }
        /**Udise + rep for CEO,DEO login**/

        if(!isset($_GET['cls'])){
            $tablename='mhrd_sch_exmres_c5';
        }else{
            if(!isset($_GET['q'])){
                $tablename='mhrd_sch_exmres_c'.$_GET['cls'];
            }else{
                $tablename='mhrd_sch_exmmarks_c'.$_GET['cls'];
            }
        }
        if(!isset($_GET['item'])){
            $item=0;
        }else{
            $item=$_GET['item'];
        }
        if(!isset($_GET['q'])){
        $result=$this->AllApproveModel->annualExamResult($tablename,$udise_sch_code,$acyear,$item,$dist_id,$edu_dist_id);
        }elseif(isset($_GET['q'])){
        $result=$this->AllApproveModel->annualExamMarks($tablename,$udise_sch_code,$acyear,$item,$dist_id,$edu_dist_id);    
        }
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => $result],REST_Controller::HTTP_OK);
        
    }
    function grandsDetails_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        
        $udise_sch_code=$this->setPrimeDetails('udise');
        $acyear=$this->setPrimeDetails('acyear');
        
        $result=$this->AllApproveModel->getGrants($udise_sch_code,$acyear);
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'safety'  => $result],REST_Controller::HTTP_OK);
        
    }
	function safetyDetails_get(){
	    $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        
        $udise_sch_code=$this->setPrimeDetails('udise');
        $acyear=$this->setPrimeDetails('acyear');
        
        $result=$this->AllApproveModel->getSafetyDetails($udise_sch_code,$acyear);
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'grants'  => $result],REST_Controller::HTTP_OK);
	}
	public function vocational_get(){
		$ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status'];

        if($token['emis_usertype'] == '9'){
            $dist_id = $token['district_id'];
        }else if($token['emis_usertype'] == '10'){
            $edu_dist_id = $token['edu_district_id'];
        }
        //echo $dist_id;die(); 
		if($emis_loggedin){
			$udise=$this->setPrimeDetails('udise');
			$acyear=$this->setPrimeDetails('acyear');
			$section = $_GET['section'];
			
			switch($section){
				case 1:
				case 4:
				case 5:
				case 6:
				case 7:
					$vocation=$this->AllApproveModel->vocationalnsqf($udise,$acyear,$section,$dist_id,$edu_dist_id);
					$result = array();$key='sector_id';
					foreach($vocation as $val) {
						if(array_key_exists($key, $val)){
							$result[$val[$key]][] = $val;
						}else{
							$result[""][] = $val;
						}
					}
					break;
					case 2:
						$result=$this->AllApproveModel->vocationalnsqf($udise,$acyear,$section,$dist_id,$edu_dist_id);
						break;
				default:
					$result=$this->AllApproveModel->vocationalnsqf($udise,$acyear,$section,$dist_id,$edu_dist_id);
					break;
			}
			
			$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Success','vocation'=>$result],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'failed','result'  => false],REST_Controller::HTTP_OK);
		}
	}
    
    function setPrimeDetails($primedetail){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
		$emis_loggedin =$token['status'];
        $rtvalue="";
        if($emis_loggedin){
            switch($primedetail){
                case 'udise':{
                    if(isset($_GET['udise'])){
                        $rtvalue=$_GET['udise'];
                    }else{
                        $rtvalue=$token['udise_code'];
                    }
                    break;
                }
                case 'acyear':{
                    if(isset($_GET['acyear'])){
                        $rtvalue=$_GET['acyear'];
                    }else{
                        $rtvalue=date("m",strtotime("now"))>5?(date("Y").'-'.date("y")+1):((date("Y")-1).'-'.date("y"));
                    }
                    break;
                }
            }
            return $rtvalue;
        }
    }
    
    function renewalApply_get(){
        if(isset($_GET['sch_id'])){
            $school_id=$_GET['sch_id'];
        }else{
            $ts =explode(".",getallheaders()['Token']);
    		$token=json_decode(base64_decode($ts[1]),true);
    		$emis_loggedin =$token['status']; 
            $school_id = $token['school_id'];
        }
        $ts=" WHERE schoolnew_renewal.school_key_id=".$school_id." GROUP BY school_key_id";
        $where="schoolnew_renewal.school_key_id=".$school_id." AND (schoolnew_renewal.vaild_upto='0000-00-00' 
        OR schoolnew_renewal.vaild_upto IS NULL OR schoolnew_renewal.vaild_upto > DATE(NOW()))";
        $data['renew']=$this->AllApproveModel->AllApproveExcute($where,'',1,'');
        $data['basic']=$this->Homemodel->getSchoolInfo($school_id);
        $data['certificate']=$this->Homemodel->getCertificateMaster();
        $data['user']=$this->AllApproveModel->getAllUserCategory();
        $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_basicinfo.school_id='.$school_id;
        $GRP=' GROUP BY udise_code';    
        $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.udise_code=T2.udise_code",$GRP);
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'renewal'  => $data],REST_Controller::HTTP_OK);
    }
	function renewalExists_get()
	{
	      $ts =explode(".",getallheaders()['Token']);
    		$token=json_decode(base64_decode($ts[1]),true);
    		$emis_loggedin =$token['status']; 
            $school_id = $token['school_id'];
			     $sql="SELECT * FROM schoolnew_renewal WHERE NOW() >= vaild_upto -INTERVAL 3 MONTH and school_key_id=$school_id";
                 $query=$this->db->query($sql);
                 $res = $query->result_array();
			  //    $this->db->select('school_key_id,createddate');
			  //    $this->db->from('schoolnew_renewal');
				 // $this->db->where('school_key_id',$school_id );
     //             $query = $this->db->get()->result_array();
                

					
					$this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'renewal'  => $res],REST_Controller::HTTP_OK);

		
			
	}
    function schlProPDF_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status'];
        if(!empty($token['school_id'])){
            $schoolid = $token['school_id'];
        }else{
            $schoolid = $this->get('school_id');
        }      
       // print_r($schoolid);die();  
        if($emis_loggedin){ 
        $profile=$this->AllApproveModel->getSchoolProfileData($schoolid);
         $print=1;
         $daywork_club_trade=$this->AllApproveModel->getDayWorksTradeClubs($schoolid);
         $const_lib_insp=$this->AllApproveModel->getBlocksClassRoomLibraryInspection($schoolid);
         $equip_lab_inet=$this->AllApproveModel->getEquipLabInternet($schoolid);
         $fees_udiseplus_fund=$this->AllApproveModel->getFeesUdisePlusFund($schoolid);
            
        
        foreach($profile[0] as $key => $prof){
            if($key!='mediumetr' && $key!="langetr")
                $data['schoolinfo'][$key]=$prof;
        }
        foreach($fees_udiseplus_fund[0] as $key => $udiseplus){
            if($key!="class_id" &&$key!="inst_fee" &&$key!="tution_fee" &&$key!="regular_fee" &&$key!="transport_fee" &&$key!="annual_fee" &&$key!="book_fee" &&$key!="lab_fee" &&$key!="other_fee" &&$key!="total_fee"){
                $data['schoolinfo']['udiseplus'][$key]=$fees_udiseplus_fund[0][$key];
            }
         }
        $result = array();$key='mediumetr';
        foreach($profile as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        foreach($result as $r){
            //$data['schoolinfo']['medium'][]=$r[0]['mediumetr'];
            $data['schoolinfo']['medium'][]=array(
                'medium'			=> $r[0]['mediumetr'],
                'medium_instrut'     =>  $r[0]['medium_instrut'],
                'other_medium'      =>  $r[0]['other_medium']
            );
            
        }
        $result = array();$key='langetr';
            foreach($profile as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                //$data['schoolinfo']['langetr'][]=$r[0]['langetr'];
				$data['schoolinfo']['langetr'][]=array(
					'lang'=>$r[0]['langetr'],
					'langtaught' => $r[0]['lang_taught']
				);
				
				
            }
            
            $result = array();$key='trade';
            foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                //$data['schoolinfo']['trade'][]=$r[0]['trade'];
				$data['schoolinfo']['trade'][]=array(
					'trade' =>$r[0]['trade'],
					'voc_trade' => $r[0]['voc_trade']
				);
            }
            $result = array();$key='daywork_school_type';
            foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
            }
            foreach($result as $r){
                $data['schoolinfo']['daywork_school_type'][]=array(
					'school_type'			=>$r[0]['school_type'],
                    'instr_dys'     =>  $r[0]['instr_dys'],
                    'stud_hrsonly'      =>  $r[0]['hrs_chldrn_sty_schl'],
					'stud_minonly'      =>  $r[0]['mns_chldrn_sty_schl'],
					'teach_hrsonly'      =>  $r[0]['hrs_tchrs_sty_schl'],
					'teach_minonly'      =>  $r[0]['mns_tchrs_sty_schl'],
					'stud_hrs'      =>  $r[0]['stud_hrs'],
                    'teach_hrs'     =>  $r[0]['teach_hrs'],
                    'cce_impl'      =>  $r[0]['cce_impl'],
                    'cce_cum'       =>  $r[0]['cce_cum'], 
                    'cce_shared'    =>  $r[0]['cce_shared']
                );
            }
             $result = array();$key='clubs';
             foreach($daywork_club_trade as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                //$data['schoolinfo']['clubs'][]=$r[0]['clubs'];
				$data['schoolinfo']['clubs'][]=array(
					'clubs' => $r[0]['clubs'],
					'others_cc' => $r[0]['other_cc'],
					'extra_cc' => $r[0]['extra_cc']
				);
             }
             $result = array();$key='inspectid';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['inspection'][]=array(
					'officer_types'	=> $r[0]['officer_types'],
                    'officer_type'  =>  $r[0]['officer_type'],
                    'purpose'       =>  $r[0]['purpose'],
					'purposes'       =>  $r[0]['purposes'],
                    'date_inspect'  =>  $r[0]['date_inspect']
                );
             }
             
             $result = array();$key='constr_id';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             //print_r($result);die();
             $blockno=1;
             foreach($result as $k => $r){
                $data['schoolinfo']['natureofconst'][]=array(
                    'blockno'               =>  $blockno++,  
                    'construct_type'        =>   $r[0]['construct_type'],
					'construct_types'        =>   $r[0]['construct_types'],
                    'total_flrs'            =>   $r[0]['total_flrs'],
                    'tot_classrm_use'       =>   $r[0]['tot_classrm_use'],
                    'tot_classrm_nouse'     =>   $r[0]['tot_classrm_nouse'],
                    'off_room'              =>   $r[0]['off_room'],
                    'lab_room'              =>   $r[0]['lab_room'],
                    'library_room'          =>   $r[0]['library_room'], 
                    'comp_room'             =>   $r[0]['comp_room'],
                    'art_room'              =>   $r[0]['art_room'],
                    'staff_room'            =>   $r[0]['staff_room'],
                    'hm_room'               =>   $r[0]['hm_room'],
                    'girl_room'             =>   $r[0]['girl_room'],
                    'good_condition'        =>   $r[0]['good_condition'],
                    'need_minorrep'         =>   $r[0]['need_minorrep'],
                    'need_majorrep'         =>   $r[0]['need_majorrep'],
                    'total_room'            =>   $r[0]['total_room']
                );
             }
             $result = array();$key='category_name';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['classrooms'][]=array(
					'schooltype' => $r[0]['school_type'],
                    'category_name' =>  $r[0]['category_name'],
                    'num_rooms'     =>  $r[0]['num_rooms']
                );
             }
             $result = array();$key='library_type';
             foreach($const_lib_insp as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['library'][]=array(
					'library_types' =>  $r[0]['library_types'],
                    'library_type' =>  $r[0]['library_type'],
                    'num_books'     =>  $r[0]['num_books'],
					'ncert_books'     =>  $r[0]['ncert_books']
                );
             }
             $result = array();$key='ictetrid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['ictentry'][]=array(
					'ict_type'          =>  $r[0]['ict'],
                    'ict_types'          =>  $r[0]['ict_type'],
                    'supplied_by'       =>  $r[0]['supplied_by'],
					'supplied_bys'       =>  $r[0]['supplied_bys'],
                    'purpose'           =>  $r[0]['purpose'],
					'purposes'           =>  $r[0]['purposes'],
                    'avail_nos'         =>  $r[0]['avail_nos'],
                    'working_nos'       =>  $r[0]['working_nos']
                );
             }
             $result = array();$key='internet';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['internetpro'][]=array(
                    'subscriber'    =>  $r[0]['subscriber'],
                    'data_speed'    =>  $r[0]['data_speed'],
					'data_speeds'   =>  $r[0]['data_speeds'],
					'range'   =>  $r[0]['range_unit'],
					'provided_bys'   =>  $r[0]['provided_bys'],
                    'provided_by'   =>  $r[0]['provided_by']
                );
                    
             }
             $result = array();$key='labetrid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['labentry'][]=array(
                    'Lab'    =>  $r[0]['Lab'],
					'seperate_rooms'    =>  $r[0]['seperate_rooms'],
                    'condition_nows'   =>  $r[0]['condition_nows'],
					'lab_id'    =>  $r[0]['lab_id'],
                    'seperate_room'    =>  $r[0]['seperate_room'],
                    'condition_now'   =>  $r[0]['condition_now']
                );        
             }
             
             $result = array();$key='eqipid';
             foreach($equip_lab_inet as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['equipentry'][]=array(
                    'ictkit'    =>  $r[0]['ictkit'],
					'supplied_by'    =>  $r[0]['supplied_by'],
                    'kitsupplier'    =>  $r[0]['kitsupplier'],
					'equip_id'    =>  $r[0]['equip_id'],
					'totfunc'    =>  $r[0]['tot_func'],
                    'quantity'   =>  $r[0]['quantity']
                );   
             }
             $result = array();$key='invenid';
             foreach($equip_lab_inet as $val) {
                 if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                 }else{
                    $result[""][] = $val;
                 }
             } 
             foreach($result as $r){
                $data['schoolinfo']['invententry'][]=array(
					'inven_id'  => $r[0]['inventry_id'],
                    'inven_item'    =>  $r[0]['inven_item'],
                    'invensupp'    =>  $r[0]['invensupp'],
                    'inven_avail'   =>  $r[0]['inven_avail'],
                    'inven_working'   =>  $r[0]['inven_working']
                ); 
             }
             $result = array();$key='feesid';
             foreach($fees_udiseplus_fund as $val) {
                if(array_key_exists($key, $val)){
                    $result[$val[$key]][] = $val;
                }else{
                    $result[""][] = $val;
                }
             } 
             foreach($result as $r){
                $data['schoolinfo']['feesStruct'][]=array(
                    'class_id'=>$r[0]['class_id'],
                    'inst_fee'=>$r[0]['inst_fee'],
                    'tution_fee'=>$r[0]['tution_fee'],
                    'regular_fee'=>$r[0]['regular_fee'],
                    'transport_fee'=>$r[0]['transport_fee'],
                    'annual_fee'=>$r[0]['annual_fee'],
                    'book_fee'=>$r[0]['book_fee'],
                    'lab_fee'=>$r[0]['lab_fee'],
                    'other_fee'=>$r[0]['other_fee'],
                    'total_fee'=>$r[0]['total_fee']
                );
             }        
        
        $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Success',
                             'result'  => $data],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus' => false,
                             'status'  => REST_Controller::HTTP_OK,
                             'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
        }
    }
    
    /**School summary api starts here by wesley*/
    function school_summary_get(){
        $ts =explode(".",getallheaders()['Token']);
		$token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status']; 
        if($emis_loggedin){
            if($token['emis_usertype'] == '5'){   //State
                $user_type = $token['emis_usertype'];  
            }else if($token['emis_usertype'] == '9'){    //CEO
                $user_type = $token['emis_usertype'];
                $where = $token['district_id'];
            }else if($token['emis_usertype'] == '10'){   //DEO
                $user_type = $token['emis_usertype'];
                $where = $token['edu_district_id'];
            }else if($token['emis_usertype'] == '2'){    //Block
                $user_type = $token['emis_usertype'];
                $where = $token['emis_user_id']; 
            }
           
            $data=$this->Schools_homemodel->school_summary($user_type,$where);
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Success',
                    'schoolsummary'  => $data],REST_Controller::HTTP_OK);
            }else{
                    $this->response(['dataStatus' => false,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
            }
    }

  /**School summary api ends here by wesley*/

  /**Resend school login password from DC starts here**/
  public function blocklist_get(){
    $ts =explode(".",getallheaders()['Token']);
    $token=json_decode(base64_decode($ts[1]),true);
    $district_id = $token['emis_user_id'];
    $emis_loggedin = $token['status']; 

    if($emis_loggedin == 'Active'){
        //echo $district_id;die();
        $data = $this->Homemodel->getallschoolblock($district_id);
        if(!empty($data)){
            $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Success',
                    'blockList'  => $data],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Data not Found']);
        }
        
    }else{
        $this->response(['dataStatus' => false,
        'status'  => REST_Controller::HTTP_OK,
        'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
    } 
  }

  public function emis_blockwise_school_post()
  {
      $ts =explode(".",getallheaders()['Token']);
      $token=json_decode(base64_decode($ts[1]),true);
      $district_id = $token['emis_user_id'];
      $emis_loggedin = $token['status'];       

      $records = $this->post('records');
      $block_id = $records['block_id'];
      $sch_name = $records['sch_name'];
    //   echo $block_id;
    //   echo $sch_name;die();  
      if($emis_loggedin == 'Active'){
          $data = $this->Homemodel->get_blockwise_school_name($block_id,$sch_name);
          $this->response(['dataStatus' => true,
                      'status'  => REST_Controller::HTTP_OK,
                      'message' => 'Success',
                      'school_name'  => $data],REST_Controller::HTTP_OK);
      }else{
          $this->response(['dataStatus' => false,
          'status'  => REST_Controller::HTTP_OK,
          'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
      } 
  }  
  
  public function schl_pswd_resend_post()
   {
        $ts =explode(".",getallheaders()['Token']);
        $token=json_decode(base64_decode($ts[1]),true);

        $emis_loggedin = $token['status'];        
        $records = $this->post('records');

        $blockid = $records['block_id'];
        $sch_name  = $records['sch_name'];
        if(!empty($records['email_id'])){
            $email = $records['email_id'];
        }else{
            $email = $records['email_id_udise'];
        }
            $search = $records['search'];
        
        if($emis_loggedin == 'Active' && $token['emis_usertype'] == '3'){
            
            if($search ==1){
                $sch_name = explode(" - ",$sch_name)[1];
            }else
            {
                $sch_name = $sch_name;
            }
            
            if($sch_name!=""){                             
                $pswd = $this->Homemodel->getPswd($sch_name);
                $subject = "Requested for resend your password from TN EMIS Cell";
                $txt = "Your password is :".$pswd;        
                $from = "donotreply.emis@gmail.com";
                $headers = "From:" .$from;
                $mail = mail($email,$subject,$pswd,$txt,$headers);
                if($mail == true){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Mail send successfully'],REST_Controller::HTTP_OK);
                }else{
                    $this->response(['dataStatus' => false,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Mail not send'],REST_Controller::HTTP_OK);
                }
            }
        }else{
            $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_OK,
            'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
        }
  }  
  /**Resend school login password from DC starts here**/

  /*************************************** Special Cash *********************************
     * Students Donate
     * VIT-sriram 
     * 04/04/2019
     ***************************************************************************************/
    public function students_special_cash_get()
    {
            $ts =explode(".",getallheaders()['Token']);
            $token=json_decode(base64_decode($ts[1]),true);
            $emis_loggedin =$token['status'];
            if($emis_loggedin) { 
            
            $schoolid = $token['school_id'];
            $data = $this->Homemodel->get_special_cash_details($schoolid);
            if(count($data)>0) 
                    $this->response(['dataStatus'=>true ,'status'=>REST_Controller::HTTP_OK,'message'=>'','result'=>$data],REST_Controller::HTTP_OK);
            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'Data Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
            } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
    }

   public function check_accountnumber_special_cash_get(){

        $ts =explode(".",getallheaders()['Token']);
        $token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status'];
        if($emis_loggedin) {     
                $checkaccountnumber    = $this->get('acc');
                if($checkaccountnumber != ''){
                $accountcount = $this->Homemodel->count_accountnumber($checkaccountnumber,'');
                $ttdata= $accountcount;
                if($ttdata > 0) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Account Number Already Exist!','result'=>array()],REST_Controller::HTTP_OK);
                else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_NO_CONTENT,'message'=>'Success','result'=>array()],REST_Controller::HTTP_OK);
                }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Account Number Not Found','result'=>array()],REST_Controller::HTTP_OK);
        } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !'],REST_Controller::HTTP_OK);
    }

    public function save_special_cash_post()
    {
        $ts =explode(".",getallheaders()['Token']);
        $token=json_decode(base64_decode($ts[1]),true);
        $emis_loggedin =$token['status'];
        if($emis_loggedin) {
                $records = $this->post('records');
                $schoolid = $token['school_id'];
                
                if((int)$records['student_eligible'] !=0){
                    $records['bank_acc_open_date'] = date('Y-m-d',strtotime($records['bank_acc_open_date']));
                    $total = 0;
                    if($records['study_at_X']!='Un-aided' && $records['study_at_X_sec'] !='Self Finance')
                    {
                        $total += 1500;
                    }
                    if($records['study_at_XI']!='Un-aided' && $records['study_at_XI_sec'] !='Self Finance')
                    {
                
                        $total += 1500;
                    }
                    if($records['study_at_XII'] !='Un-aided' && $records['study_at_XII_sec'] !='Self Finance')
                    {
                        $total +=2000;
                    }
                    $records['total'] = $total;
                }
                
            $result = $this->Homemodel->save_special_cash_details($records,$schoolid);
            
            if(count($result)>0) 
                $this->response(['dataStatus'=>true ,'status'=>REST_Controller::HTTP_OK,'message'=>'Updated Successfully !','result'=>$result],REST_Controller::HTTP_OK);
            else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'  => 'Data Not Found !','result'=>array()],REST_Controller::HTTP_OK); 
            } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to invalid credentials !','result'=>array()],REST_Controller::HTTP_OK);
    }
   /************************************* End ********************************************/

   public function hm_udise_conf_post(){
        $token = Common::userToken();
        $emis_loggedin =$token['status'];
        if($emis_loggedin == 'Active'){
            $records = $this->post('records');
            $schl_id = $records['school_key_id'];
            $table = 'mhrd_dcf_form_entry';
            $result = $this->AllApproveModel->udise_validation_hm_crc($records,$table);
            //print_r($result);die();
            if($result == "updated"){
                $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message'  => "Validation Updated successfully" ],REST_Controller::HTTP_OK);
            }else if($result == "inserted"){
                $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message'  => "Validation Inserted successfully" ],REST_Controller::HTTP_OK);
            }else{
                $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message'  => "Insertion or updation failed" ],REST_Controller::HTTP_OK);
            }            
        }else{
            $this->response(['dataStatus' => false,
			'status'  => REST_Controller::HTTP_OK,
			'message' => 'Status Inactive'],REST_Controller::HTTP_OK);
        }        
   }

   public function crc_schl_list_get(){
    $token = Common::userToken();
    $emis_loggedin =$token['status'];
    if($emis_loggedin == 'Active'){
        $emis_usertype = $token['emis_usertype'];
        $schl_type_id = $this->get('school_type_id');
        $block_id = $this->get('block_id');
        //echo $block_id;die();
        //$schl_type_id = $records['school_type_id'];
        //echo $schl_type_id;die();
        //echo $token['emis_usertype'];
        if($token['emis_usertype'] == '9' || $token['emis_usertype'] == '3'){
            //echo "hi";die();
            $user_type = $token['emis_usertype'];
            $where = $token['district_id'];
        }else if($token['emis_usertype'] == '10'){
            $user_type = $token['emis_usertype'];
            $where = $token['edu_district_id'];
        }else if($token['emis_usertype'] == '6'){
            $user_type = $token['emis_usertype'];
            $where = $token['block_id']; 
        }else if(!empty($block_id)){
             $brte_block_id = $block_id;
        }
       
        $data = $this->Schools_homemodel->crc_schl_list($emis_usertype,$schl_type_id,$where,$brte_block_id);
        //$data=$this->Schools_homemodel->school_summary($user_type,$where);
        $this->response(['dataStatus' => true,
        'status'  => REST_Controller::HTTP_OK,
        'message' => 'Success',
        'schoollist'  => $data],REST_Controller::HTTP_OK);
        }else{
                $this->response(['dataStatus' => false,
                'status'  => REST_Controller::HTTP_OK,
                'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
        }

   }
   
   public function crc_block_list_get(){
    $token = Common::userToken();
    $emis_loggedin =$token['status'];
    if($emis_loggedin == 'Active'){
        $emis_username = $token['emis_username'];

        $data = $this->Schools_homemodel->crc_blck_list($emis_username);
        
        $this->response(['dataStatus' => true,
        'status'  => REST_Controller::HTTP_OK,
        'message' => 'Success',
        'blocklist'  => $data],REST_Controller::HTTP_OK);
        }else{
                $this->response(['dataStatus' => false,
                'status'  => REST_Controller::HTTP_OK,
                'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
        }
   
   }

public function udise_vali_det_post(){
    $token = Common::userToken();
    $emis_loggedin =$token['status'];
    if($emis_loggedin == 'Active'){
        $schl_id = $token['school_id'];
        $table = 'mhrd_dcf_form_entry';
        $result = $this->AllApproveModel->udise_validator_det($schl_id,$table);
        if(!empty($result)){
            $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message'  => "Data retreived successfully", 
                        'result' => $result],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'message'  => "Data not found" ],REST_Controller::HTTP_OK);
        }            
    }else{
        $this->response(['dataStatus' => false,
        'status'  => REST_Controller::HTTP_OK,
        'message' => 'Status Inactive'],REST_Controller::HTTP_OK);
    }        
}
   
   public function teacher_data_get(){
    $token = Common::userToken();
    $emis_loggedin =$token['status'];
    $teacher_id = $token['teacher_id'];
    //print_r($token['school_id']);die();        
   
    if($emis_loggedin){        
        if(!empty($teacher_id)){
            $result=$this->AllApproveModel->teacher_data($teacher_id);
            //print_r($result);die();
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Success',
                            'incenfac'  => $result],REST_Controller::HTTP_OK);
        }else{
            $this->response(['dataStatus' => false,
                         'status'  => REST_Controller::HTTP_OK,
                         'message' => 'Token Mismatch.Use Proper Token'],REST_Controller::HTTP_OK);
        }            
    }else{
        $this->response(['dataStatus' => false,
                         'status'  => REST_Controller::HTTP_OK,
                         'message' => 'Login to check the detail'],REST_Controller::HTTP_OK);
    }
   }

   public function summary_marks_get(){
    $token = Common::userToken();
    $emis_loggedin =$token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
        
        if($emis_usertype == 1){
                $school_id = (int)$token['emis_user_id'];
	   			$ex_summary = $this->Schools_homemodel->get_exams_marks_summary($school_id);
       			if(!empty($ex_summary))
       			{
           			$this->response(['dataStatus'=>true,
                           			 'status'=>REST_Controller::HTTP_OK,
                           			 'message'=>'Marks Summary',
                           			 'summary_marks'=>$ex_summary],REST_Controller::HTTP_OK);
       			}
       			else{ $this->response(['dataStatus'=>false,
                           			   'status'=>REST_Controller::HTTP_NOT_FOUND,
                             		   'message'=>'No Data Found!!',
                                       'summary_marks'=>array()],REST_Controller::HTTP_OK);
                }

        }
        else $this->response(['dataStatus'=>false,
                              'status'=>REST_Controller::HTTP_FORBIDDEN,
                              'message'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);
    }else $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
   }

   public function schlprof_langu_medi_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data['medium'] = $this->AllApproveModel->get_medium($school_id);
            $data['lang'] = $this->AllApproveModel->get_lang($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Marks Summary',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   /**Udise + student class wise strength and number of teaching and non teaching staff starts here**/

   public function stuTeachNonTeachStrngth_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->AllApproveModel->get_stuTeachNonTeachStrngth($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Marks Summary',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   /**Udise + student class wise strength and number of teaching and non teaching staff ends here**/

   /**API's using school_id starts here by wesley**/
    public function school_1_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl1($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_2_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl2($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_3_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl3($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_4_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl4($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_5_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl5($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_6_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl6($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function school_7_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl7($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }


   public function school_8_get(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $school_id = $_GET['sch_id'];

        if($emis_loggedin){
            $data = $this->Schools_homemodel->get_schl8($school_id);
            if(!empty($data))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$data],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }


   /**API's using school_id ends here by wesley**/

   public function NandPSchool_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->npschoolrep($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }
   
   public function MatricSchl_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->matricschlrep($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function CBSENOC_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->CBSE_NOC($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function CBSENOCDrilldownCEO_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->CBSE_NOC_Drilldown_CEO($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   /** NOC WITH CBSE Details (list for schools and non-schools)
    *  -> noc_details and noc_checklist */
   public function school_nocwithcbse_get(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    $doc_type_get = $this->get('doc_type');
    if($emis_loggedin) {
            $param = array('id', 'doc_description');
            $doctype = Common::get_multi_withdyncol_list($param,'mgmt_app_doc_master',array('isactive'=>'1'));     
            $dist_id = $this->get('dist_id');
            $sch_id = $this->get('school_id');
            if(!isset($dist_id)) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'There is No District params, Please Try again!'],REST_Controller::HTTP_OK); 
            if(!isset($sch_id)) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'There is No School params Please Try again!'],REST_Controller::HTTP_OK); 
            
            $param1 = array('id', 'district_code', 'district_name');
            $dist_info = Common::get_multi_withdyncol_list($param1,'schoolnew_district',array('id'=>$dist_id));     
            $get_where = array('school_id'=>$sch_id);
            $appid = $this->Schools_homemodel->get_application_id($get_where,'app_id');
            if($appid == '') $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Application ID Not Found for Given School!'],REST_Controller::HTTP_OK); 
            
            $school_info = $this->Schools_homemodel->get_school_info_for_noc($sch_id);
            $districtwiseschools = $this->Schools_homemodel->get_districtwiseschools($dist_id);
            $studentstrength = $this->Schools_homemodel->get_student_strength_for_noc($sch_id);

            $param2 = array('id as status_inx_id', 'district_id', 'school_id', 'sch_directorate_id', 'sch_mgmt_id', 'sch_cate_id', 'app_id', 'app_type', 'prev_cond_status', 'app_submit_date', 'status', 'status_user', 'status_stage', 'order_filepath', 'order_filename', 'order_filename_coded', 'order_conditions_filepath', 'order_conditions_filename', 'order_conditions_filename_coded', 'order_rc_num', 'order_date', 'order_valid_from_date', 'order_valid_upto_date', 'order_from_class', 'order_to_class', 'order_recog_number');
            $status_info = Common::get_multi_withdyncol_list($param2,'mgmt_app_status',array('app_id'=>$appid));     

            $param3 = array('id', 'app_id', 'app_type', 'user_type_id_from', 'user_action', 'user_type_id_to', 'recommend', 'remarks', 'action_time');
            $track_info = Common::get_multi_withdyncol_list($param3,'mgmt_app_tracking',array('app_id'=>$appid));     

                $master['appId'] = $appid;
                $master['appType'] = 3;
                $master['district'] =  $dist_info;
                $master['districtwiseSchools'] =  $districtwiseschools;
                $master['docType'] = $doctype;
                $master['schoolInfo'] =  $school_info;
                $master['studentStrength'] =  $studentstrength;
                $fileuploads["minority_status"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,1);
                $fileuploads["upload_permi_certi"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,2);
                $fileuploads["land_details"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,4);
                $fileuploads["building_doc"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,5);
                $fileuploads["building_stab_certi"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,6);
                $fileuploads["building_license"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,7);
                $fileuploads["sanitary_certi"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,8);
                $fileuploads["fire_safety"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,9);
                $fileuploads["upload_sch_photo"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,10);
                $fileuploads["intermediate"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,12);
                $fileuploads["closure_order"] = $this->Schools_homemodel->get_mgmt_app_doc_uploads($appid,17);

                $remarks = $this->Schools_homemodel->app_doc_uploads_remarks($appid);
                $nocdetails = $this->Schools_homemodel->get_mgmt_app_noc_with_cbse($appid,$sch_id);
                $surveydetails['Tab1'] = $this->Schools_homemodel->get_mgmt_app_survey_details($appid,$sch_id,1);
                $surveydetails['Tab2'] = $this->Schools_homemodel->get_mgmt_app_survey_details($appid,$sch_id,2);

                $this->response(['dataStatus'=>true,
                                 'status'=>REST_Controller::HTTP_OK,
                                 'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                 'MasterDetails'=>$master,
                                 'NOCwithCBSE_details'=>(!empty($nocdetails)) ? $nocdetails : array(),
                                 'NOCwithCBSE_surveydetails'=>(!empty($surveydetails)) ? $surveydetails : array(),
                                 'NOCwithCBSE_docs'=>(!empty($fileuploads)) ? $fileuploads : array(),
                                 'Remarks'=>(!empty($remarks)) ? $remarks : array(),
                                 'NOCwithCBSE_statusdetails'=>(!empty($status_info)) ? $status_info : array(),
                                 'NOCwithCBSE_trackingdetails'=>(!empty($track_info)) ? $track_info : array()  ],REST_Controller::HTTP_OK);  
            }else $this->response(['dataStatus'=>false,
                                   'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                   'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
   }

public function save_school_nocwithcbse_post(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin) {
    //echo $district_id;die();
    $data = $this->Homemodel->getallschoolblock($district_id);
    if(!empty($data)){
        $this->response(['dataStatus' => true,
                'status'  => REST_Controller::HTTP_OK,
                'message' => 'Success',
                'blockList'  => $data],REST_Controller::HTTP_OK);
    }else{
        $this->response(['dataStatus' => true,
                'status'  => REST_Controller::HTTP_OK,
                'message' => 'Data not Found']);
    }
    
}else{
    $this->response(['dataStatus' => false,
    'status'  => REST_Controller::HTTP_OK,
    'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
} 

}

public function ceo_nocwithcbse_get(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin) {
            $param = array('id', 'doc_description');
            $doctype  = Common::get_multi_withdyncol_list($param,'mgmt_app_doc_master',array('isactive'=>'1'));
     if($emis_usertype == 9){
            $dist = (int)$token['district_id'];
            $details = $this->Schools_homemodel->ceo_nocwithcbse($dist);
            if(count($details) > 0)
            {
              $this->response(['dataStatus'=>true,
                               'status'=>REST_Controller::HTTP_OK,
                               'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                               'doc_type'=>$doctype,
                               'ceo_noc_with_cbse'=>$details],REST_Controller::HTTP_OK); 
            } 
            else $this->response(['dataStatus'=>false,
                                  'status'=>REST_Controller::HTTP_NOT_FOUND,
                                  'message'=>'Data Not Found!',
                                  'doc_type'=>$doctype,
                                  'ceo_noc_with_cbse'=>array()],REST_Controller::HTTP_OK); 
     }else $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Permission Denied (OR) Invaild User!'],REST_Controller::HTTP_OK);       
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
}

public function rpt_nocwithcbse_get(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    if($emis_loggedin) {
        $stage = $this->get('stage');
        if(isset($stage)){    
            $param = array('id', 'doc_description');
            $doctype  = Common::get_multi_withdyncol_list($param,'mgmt_app_doc_master',array('isactive'=>'1'));
             if($stage == 1){
                            $forstate = $this->Schools_homemodel->nocwithcbse();
                            if(!empty($forstate)){
                            $this->response(['dataStatus'=>true,
                                             'status'=>REST_Controller::HTTP_OK,
                                             'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                             'description'=>"Stage 1 -> state-wise district details (application id and school id only)",
                                             'details'=>(!empty($forstate)) ? $forstate : array()],REST_Controller::HTTP_OK);  
                            } else $this->response(['dataStatus' => false,
                                                        'status' => REST_Controller::HTTP_NO_CONTENT,
                                                       'message' => 'There is No Content. Please Try-again !'],REST_Controller::HTTP_OK);
                            
             }else if($stage == 2){
                $dist_id = $this->get('dist_id');
                if(isset($dist_id)){     
                    if($dist_id != ''){
                            $fordist = $this->Schools_homemodel->ceo_nocwithcbse($dist_id);
                            if(!empty($fordist)){
                                $this->response(['dataStatus'=>true,
                                'status'=>REST_Controller::HTTP_OK,
                                'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                'description'=>"Stage 2 -> district-wise details",
                                'details'=>(!empty($fordist)) ? $fordist : array()],REST_Controller::HTTP_OK);  
                            }else $this->response(['dataStatus' => false,
                                                   'status' => REST_Controller::HTTP_NO_CONTENT,
                                                   'message' => 'There is No Content. Please Try-again !'],REST_Controller::HTTP_OK);
                            
                    } else if ($dist_id == '') $this->response(['dataStatus'=>false,
                                                             'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                             'message'=>'District ID Not Found!'],REST_Controller::HTTP_OK); 
                } else $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'There is No District Parameter, please Try Again !'],REST_Controller::HTTP_OK);                

             }else if($stage == 3){
                $school_id = $this->get('school_id');
                if(isset($school_id)){     
                    if($school_id != ''){
                        $get_where = array('school_id'=>$school_id);
                        $appid = $this->Schools_homemodel->get_application_id($get_where,'app_id');
                        $school_info = $this->Schools_homemodel->get_school_info_for_noc($school_id);
                        $studentstrength = $this->Schools_homemodel->get_student_strength_for_noc($school_id);
                        if($appid != ''){
                            $fileuploads = $this->Schools_homemodel->get_mgmt_app_doc_uploads2($appid);
                            $nocdetails = $this->Schools_homemodel->get_mgmt_app_noc_with_cbse2($appid);
                            $surveydetails = $this->Schools_homemodel->get_mgmt_app_survey_details2($appid);
                            $master['appId'] = $appid;
                            $master['appType'] = 3;
                            $master['docType'] = $doctype;
                            $master['schoolInfo'] =  $school_info;
                            $master['studentStrength'] =  $studentstrength;

                            $this->response(['dataStatus'=>true,
                                             'status'=>REST_Controller::HTTP_OK,
                                             'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                             'description'=>"Stage 3 -> school-wise details",
                                             'master_details'=>$master,
                                             'NOCwithCBSE_details'=>(!empty($nocdetails)) ? $nocdetails : array(),
                                             'NOCwithCBSE_surveydetails'=>(!empty($surveydetails)) ? $surveydetails : array(),
                                             'NOCwithCBSE_docs'=>(!empty($fileuploads)) ? $fileuploads : array()],REST_Controller::HTTP_OK);  

                        }else if($appid == '') $this->response(['dataStatus'=>false,
                                                                'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                                'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK); 
                    } else if ($school_id == '') $this->response(['dataStatus'=>false,
                                                             'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                             'message'=>'School ID Not Found!'],REST_Controller::HTTP_OK); 
                } else $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'There is No School Parameter, please Try Again !'],REST_Controller::HTTP_OK);                
             }else if($stage == 4){
                $emis_user_id = $this->get('app_id');
                if(isset($emis_user_id)){     
                    if($emis_user_id != ''){
                        $get_where = array('app_id'=>$emis_user_id);
                        $school_id = $this->Schools_homemodel->get_application_id($get_where,'school_id');
                        $school_info = $this->Schools_homemodel->get_school_info_for_noc($school_id);
                        $studentstrength = $this->Schools_homemodel->get_student_strength_for_noc($school_id);
                        $fileuploads = $this->Schools_homemodel->get_mgmt_app_doc_uploads2($emis_user_id);
                        $nocdetails = $this->Schools_homemodel->get_mgmt_app_noc_with_cbse2($emis_user_id);
                        $surveydetails = $this->Schools_homemodel->get_mgmt_app_survey_details2($emis_user_id);
                            $master['appId'] = $emis_user_id;
                            $master['appType'] = 3;
                            $master['docType'] = $doctype;
                            $master['schoolInfo'] =  $school_info;
                            $master['studentStrength'] =  $studentstrength;

                                $this->response(['dataStatus'=>true,
                                                 'status'=>REST_Controller::HTTP_OK,
                                                 'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                                 'description'=>"Stage 4 -> applicationID-wise details",
                                                 'master_details'=>$master,
                                                 'NOCwithCBSE_details'=>(!empty($nocdetails)) ? $nocdetails : array(),
                                                 'NOCwithCBSE_surveydetails'=>(!empty($surveydetails)) ? $surveydetails : array(),
                                                 'NOCwithCBSE_docs'=>(!empty($fileuploads)) ? $fileuploads : array()],REST_Controller::HTTP_OK);  
                        // if(emis_user_id == '' ){ $this->response(['dataStatus'=>false,
                        //     'status'=>REST_Controller::HTTP_NOT_FOUND,
                        //     'message'=>'There is No App-ID!'],REST_Controller::HTTP_OK); 
                    
                    } else if ($emis_user_id == '') $this->response(['dataStatus'=>false,
                                                             'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                             'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK); 
                } else $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);                

             }else $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Invaild Stage Value, please Try Again !'],REST_Controller::HTTP_OK);                

        }
        else $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NOT_FOUND,
                              'message' => 'There is Stage Parameter, please Try Again !'],REST_Controller::HTTP_OK);                
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
   }


public function dtls_nocwithcbse_get(){
    $token = Common::token();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin) {
                $emis_user_id = $this->get('app_id');
                if(isset($emis_user_id)){     
                        if($emis_user_id != ''){
                                
                                $fileuploads = $this->Schools_homemodel->get_mgmt_app_doc_uploads2($emis_user_id);
                                $nocdetails = $this->Schools_homemodel->get_mgmt_app_noc_with_cbse2($emis_user_id);
                                $surveydetails = $this->Schools_homemodel->get_mgmt_app_survey_details2($emis_user_id);

                                
                                    $this->response(['dataStatus'=>true,
                                                     'status'=>REST_Controller::HTTP_OK,
                                                     'message'=>"NOC with CBSE ( ".$token['user_type']." )",
                                                     'NOCwithCBSE_details'=>(!empty($nocdetails)) ? $nocdetails : array(),
                                                     'NOCwithCBSE_surveydetails'=>(!empty($surveydetails)) ? $surveydetails : array(),
                                                     'NOCwithCBSE_docs'=>(!empty($fileuploads)) ? $fileuploads : array()],REST_Controller::HTTP_OK);  
                            // if(emis_user_id == '' ){ $this->response(['dataStatus'=>false,
                            //     'status'=>REST_Controller::HTTP_NOT_FOUND,
                            //     'message'=>'There is No App-ID!'],REST_Controller::HTTP_OK); 
                        
                        } else if ($emis_user_id == '') $this->response(['dataStatus'=>false,
                                                                 'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                                 'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK); 
                } else $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                                        'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);                
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
   }


   public function CBSENOCDrilldownDir_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->CBSE_NOC_Drilldown_Dir($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function CBSENOCDrilldownDirState_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];

        if($token['emis_usertype']=='9' || $token['emis_usertype']=='3'){
            $data['district_id'] = $token['district_id'];
            $data['emis_usertype'] = $token['emis_usertype'];
        }else{
            $data['emis_usertype'] = $token['emis_usertype'];
        }

        if($emis_loggedin){
            $result = $this->Schools_homemodel->CBSE_NOC_Drilldown_Dir_state($data);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function MngmentAppli_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $records = $this->post('records'); 

    //$records['school_id'] = $token['school_id']; 
    //$records['sch_mgmt_id'] = $token['manage_id'];    
    //$records['sch_cate_id'] = $token['cate_id'];  
    $app_type = $records['app_type'];

    $app_id = $this->Schools_homemodel->app_id_check($app_type);

        if(!empty($app_id)){        
            if($app_type == '1'){
                if($app_id<'20000000'){  //echo "Renewal";die();
                    $records['app_id'] = ++$app_id; 
                }
            }else if($app_type == '3'){  //echo "NOC";die();
                if($app_id<'40000000'){
                $records['app_id'] = ++$app_id; 
                }          
            }else if($app_type == '4'){  //echo "Upgrade";die();
                if($app_id<'50000000'){
                    $records['app_id'] = ++$app_id; 
                }
            }/*else if($app_type == '2'){  //echo "New School";die();
                if($app_id<'30000000'){
                    $records['app_id'] = ++$app_id; 
                }
            }*/
        }else{
            if($app_type == '1'){  //echo "Renewal";die();
                $records['app_id'] = '10000000';           
            }else if($app_type == '3'){  //echo "NOC";die();
                $records['app_id'] = '30000000';
            }else if($app_type == '4'){  //echo "Upgrade";die();
                $records['app_id'] = '40000000';
            }/*else if($app_type == '2'){  //echo "New School";die();
                $records['app_id'] = '20000000';
            }*/
        }
        if($emis_loggedin){
            $records['sch_directorate_id'] = $this->Schools_homemodel->directorate_id($data['school_id']);
            $result['app_id'] = $this->Schools_homemodel->mngmnt_appli($records);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'result'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'Data Not Inserted!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }

   public function MngmentAppliNoc_post(){

    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $records = $this->post('records');

        if($emis_loggedin){
            $result = $this->Schools_homemodel->mngment_appli_Noc($records);
            if(!empty($result))
            {
                $this->response(['dataStatus'=>true,
                                    'status'=>REST_Controller::HTTP_OK,
                                    'message'=>'Success',
                                    'data'=>$result],REST_Controller::HTTP_OK);
            }
            else{ $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'Unable to Insert Data!!'],REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['dataStatus'=>false,
                           'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                           'message'=>'Access is denied due to Invalid Credentials!'],REST_Controller::HTTP_OK); 
        }    
   }
   
   /** NOC WITH CBSE Details (save details for schools)
    *  -> noc_details and noc_checklist */
   public function save_schoolwise_nocwithcbse_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
            $data = $this->post('records');
            $surveypart = $data['survey'];
            // echo 'step 1 - checking params';
            // print_r($data);
            // die();
            $additionalInformation = '';
            if(!empty($data)){       	
                    foreach ($data as $key => $value){if ($value == ''){ $data[$key] = NULL;}}
                            $dtls['app_id'] = $data['app_id'];
                            $dtls['school_id'] = $data['school_id'];
                            $dtls['mgmt_name'] = $data['mgmt_name'];
                            $dtls['mgmt_address'] = $data['mgmt_address'];
                            $dtls['mgmt_pincode'] = $data['mgmt_pincode'];
                            $dtls['mgmt_register_yn'] = $data['mgmt_register_yn'];
                            $dtls['mgmt_register_date'] = $data['mgmt_register_date'];
                            $dtls['mgmt_register_place'] = $data['mgmt_register_place'];
                            $dtls['other_inst_name1'] = isset($data['other_inst_name1']) ? $data['other_inst_name1']: NULL;
                            $dtls['other_inst_name2'] = isset($data['other_inst_name2']) ? $data['other_inst_name2']: NULL;
                            $dtls['other_inst_name3'] = isset($data['other_inst_name3']) ? $data['other_inst_name3']: NULL;
                            $dtls['other_inst_name4'] = isset($data['other_inst_name4']) ? $data['other_inst_name4']: NULL;
                            $dtls['other_inst_name5'] = isset($data['other_inst_name5']) ? $data['other_inst_name5']: NULL;
                            $dtls['other_inst_place1'] = isset($data['other_inst_place1']) ? $data['other_inst_place1']: NULL;
                            $dtls['other_inst_place2'] = isset($data['other_inst_place2']) ? $data['other_inst_place2']: NULL;
                            $dtls['other_inst_place3'] = isset($data['other_inst_place3']) ? $data['other_inst_place3']: NULL;
                            $dtls['other_inst_place4'] = isset($data['other_inst_place4']) ? $data['other_inst_place4']: NULL;
                            $dtls['other_inst_place5'] = isset($data['other_inst_place5']) ? $data['other_inst_place5']: NULL;
                            $dtls['minority_yn'] = $data['minority_yn'];
                            $dtls['ownership_type'] = $data['ownership_type'];
                            $dtls['lease_yrs'] = $data['lease_yrs'];
                            $dtls['docs_engg_class'] = $data['docs_engg_class'];
                            $dtls['students_accomodate_strength1'] = $data['students_accomodate_strength1'];
                            $dtls['students_accomodate_strength2'] = $data['students_accomodate_strength2'];
                            $dtls['closure_order_yn'] = $data['closure_order_yn'];
                            $dtls['bldg_value'] = $data['bldg_value'];
                            $dtls['land_registered'] = $data['land_registered'];
                            
                            $nocDtlsTn ='mgmt_app_noc_details';
                            $nocDtlsWhere = array('app_id'=>$data['app_id'],'school_id'=>$data['school_id']);
                            $nocDtlsPKID = $this->Schools_homemodel->get_PKID($nocDtlsTn,$nocDtlsWhere);

                            // echo "Step 2 NOC Details PK ID ".$nocDtlsPKID;         
                            
                            if($nocDtlsPKID != 0){
                                $nocDtlsWhere['id'] = $nocDtlsPKID;
                                $nocDtls = $this->Statemodel->school_update($dtls,$nocDtlsTn,$nocDtlsWhere);
                                // echo $nocDtls['affected_rows'];
                                // die();
                                $additionalInformation =  ($nocDtls['affected_rows'] > 0) ? $additionalInformation."NOC Details Updated and " :$additionalInformation;
                            }
                            else{$nocDtls = $this->Statemodel->school_insert($nocDtlsTn,$dtls);
                                $additionalInformation =  $nocDtls ? $additionalInformation."NOC Details Saved and " :$additionalInformation;
                            }
                            
                            // if(!empty($data['flag'])){
                            //     $usertypeto = $this->Schools_homemodel->get_usertypeto_in_mgmtstage($data['school_id'],$emis_usertype);
                            //     if($usertypeto != ''){
    
                            //             $track['app_type'] = 3;
                            //             $track['user_action'] = 0;
                            //             $track['app_id'] = $data['app_id'];
                            //             $track['user_type_id_from'] = $emis_usertype;
                            //             $track['user_type_id_to'] = $usertypeto;
                            //             $trackTn = 'mgmt_app_tracking';
                            //             $trackWhere = array('app_id'=>$data['app_id'],'app_type'=>3);
                            //             $trackerInfo = $this->Schools_homemodel->get_trackerInfo($trackTn,$trackWhere);
                            //             if(!empty($trackerInfo)){
                            //                 if($trackerInfo->user_type_id_from == $emis_usertype && $trackerInfo->user_action == 0 && $trackerInfo->user_type_id_to == $usertypeto){
                            //                     $additionalInformation =  "NOC Information are Not Tracked and ";
                            //                 }else{
                            //                     $trackDtls = $this->Statemodel->school_insert($trackTn,$track);
                            //                     $additionalInformation =  $trackDtls ? $additionalInformation."NOC Information are Tracked and " :$additionalInformation;
                            //                 }
                            //             }
                            //             else{$trackDtls = $this->Statemodel->school_insert($trackTn,$track);
                            //                  $additionalInformation =  $trackDtls ? $additionalInformation."NOC Information are Tracked and " :$additionalInformation;
                            //             }
    
                            //             $status['status'] = 0;
                            //             $status['status_user'] = $emis_usertype;
                            //             $status['status_stage'] = $usertypeto;
                            //             $statusTn = 'mgmt_app_status';
                            //             $statusWhere = array('app_id'=>$data['app_id'],'app_type'=>3,'school_id'=>$data['school_id']);
                            //             $statusPKID = $this->Schools_homemodel->get_PKID($statusTn,$statusWhere);
                            //             if($statusPKID != 0){
                            //                 $statusWhere['id'] = $statusPKID;
                            //                 $statusDtls = $this->Statemodel->school_update($status,$statusTn,$statusWhere);
                            //                 $additionalInformation =  ($statusDtls['affected_rows'] > 0) ? $additionalInformation."Status also Updated and " :$additionalInformation;
                            //             }else $additionalInformation =  $additionalInformation."Status not Updated and ";
                            //     } else $additionalInformation =  "NOC Information are Not Tracked and Status not Updated Because of there is No Management Stage Details for Given School ID (in params) and ";
                            // }else $additionalInformation =  "NOC Details are in Partially Submission and ";


                            $checkList['app_id'] = $data['app_id'];
                            $checkList['hilly_yn'] = $data['hilly_yn'];
                            if(!empty($checkList['hilly_yn'])){
                                    $checklistTn ='mgmt_app_noc_checklist';
                                    $checklistWhere = array('app_id'=>$data['app_id']);
                                    $checklistPKID = $this->Schools_homemodel->get_PKID($checklistTn,$checklistWhere);
                                    if($checklistPKID != 0){
                                        $checklistWhere['id'] = $checklistPKID;
                                        $checklistDtls = $this->Statemodel->school_update($checkList,$checklistTn,$checklistWhere);
                                        $additionalInformation =  ($checklistDtls['affected_rows'] > 0) ? $additionalInformation."NOC Checklist Updated and " :$additionalInformation;
                                    }
                                    else{
                                        $checklistDtls = $this->Statemodel->school_insert($checklistTn,$checkList);
                                        $additionalInformation =  $checklistDtls ? $additionalInformation."NOC Checklist Saved and " :$additionalInformation;
                                    }
                                    
                            }
                            $surveypart = $data['survey'];
                            
                            if(!empty($surveypart)){
                                $index0 = 0;
                                $incre0 = 0;
                                $a=array();$b=array();
                                $survey_table = 'mgmt_app_survey_details';
			                    $where = array('app_id'=>$data['app_id'],'school_id'=>$data['school_id'],'isactive'=>1,'app_type'=>3);
			                    $param = array('id');
                                $id_arr  = Common::get_multi_withdyncol_list($param,$survey_table,$where);
                                for($i= 0;$i<count($id_arr);$i++){ array_push($b,$id_arr[$i]->id); }
                                foreach($surveypart as $dt){ //need to check id in html
                                    if($dt['survey_inx_id'] == ''){
                                        $dtlsforadd[] = array(
                                            'school_id'=>$data['school_id'],
                                            'app_id'=>$data['app_id'],
                                            'app_type'=>3,
                                            'details_type'=>$dt['details_type'],
                                            'survey_number'=>$dt['survey_number'],
                                            'area'=>$dt['area'],
                                            'isactive'=> 1,
                                            'created_at'=> date('Y-m-d',strtotime('now'))
                                        );
                                    }
                                    if($dt['survey_inx_id'] != ''){
                                        $dtlsforedit[] = array(
                                            'school_id'=>$data['school_id'],
                                            'app_id'=>$data['app_id'],
                                            'app_type'=>3,
                                            'id'=> (int)$dt['survey_inx_id'],
                                            'details_type'=>$dt['details_type'],
                                            'survey_number'=>$dt['survey_number'],
                                            'area'=>$dt['area']
                                        );
                                        array_push($a,$dt['survey_inx_id']);
                                    }
                                }
                                if(!empty($b)){
                                    $result_compare = array_values(array_diff($b, $a));
                                }else $result_compare = array();
                                // $z = (int)(count($b)+1);
                                // $b[$z] = 3;
                                if(!empty($result_compare)){ $result_inactive = $this->Schools_homemodel->noc_survey_details_inactive($result_compare,$data['app_id'],1); }
                                if(!empty($dtlsforadd)){$result_add = $this->Schools_homemodel->noc_survey_details_save($survey_table,$dtlsforadd);}else{$result_add = false;}
                                if(!empty($dtlsforedit)){$result_edit = $this->Schools_homemodel->noc_survey_details_update($survey_table,$dtlsforedit);}else{$result_edit = false;}
                                
			                    if($result_add || $result_edit){
                                    $additionalInformation =  $additionalInformation."Survey Details Updated";
			                    }else $additionalInformation =  $additionalInformation."There is No Changes in Survey Details";
                            }else{ 
                                $additionalInformation =  $additionalInformation."There is No Changes in Survey Details";
                            }
                            
                            // if(!empty($docspart)){
                            //     $index = 0;
                            //     $incre = 0;
                            //     foreach ($docspart as $key => $value){ 
                                    
                            //         if($docspart[$index]['doc_id'] == $filespart[$index]['doc_id'] && $docspart[$index]['doc_type'] == $filespart[$index]['doc_type']){
                            //             $docspart[$index]['doc_name'] = $filespart[$index]['doc_name'];
                            //             $docspart[$index]['doc_name_coded'] = $filespart[$index]['doc_name_coded'];
                            //         }
                            //         // echo $index;
                            //         // if(empty($data[$index]['id'])){ echo 'insert'; }
                            //         // else{ echo 'update'; } 
                            //         $doc_table = 'mgmt_app_doc_uploads';
                            //         // $doc_inx = $isset($docspart[$index]['doc_inx_id']);
                            //         // $docspart[$index]['doc_inx_id'] = $doc_inx ? $docspart[$index]['doc_inx_id'] : '';
                            //         $doc_where = array('app_id'=>$data['app_id'],'doc_type'=>$docspart[$index]['doc_type'],'doc_id'=>$docspart[$index]['doc_id']);
                            //         $doc_PKID = $this->Schools_homemodel->get_PKID($doc_table,$doc_where);
                            
                            //         // $object = (object) $docspart[$index];
                            //         // echo $doc_tblcount;
                            //         // print_r($docspart[$index]);
                            //         $docspart[$index]['doc_filepath'] = NULL;
                            //         if($doc_PKID != 0){$doc_data = $this->Statemodel->school_update($docspart[$index],$doc_table,$doc_where);}
                            //         else{$doc_data = $this->Statemodel->school_insert($doc_table,$docspart[$index]);}
                            //         $incre = $doc_data ? $incre++ : $incre;
                            //         $index++;
                            //     }
                            //     $docmessage = $incre > 0 ? 'Docs Table Updated' : 'Docs Table Not Uploaded';
                            //     $additionalInformation =  $incre > 0 ? $additionalInformation."NOC Docs uploaded " :$additionalInformation;
                            // }else{ $docmessage = 'Docs Table Not Uploaded';
                            //     $additionalInformation =  $additionalInformation."NOC Docs are Not Uploaded ";}
                            // echo "DOcs Section ";
                            // print_r($docspart);
                            
                            
                            if($nocDtls)
                            {
                                  $this->response(['dataStatus'=>true,
                                                    'status'=>REST_Controller::HTTP_OK,
                                                    'message'=>'Details Updated Successfully',
                                                    'additionalMessage'=>$additionalInformation],REST_Controller::HTTP_OK); 
                            }else $this->response(['dataStatus'=>false,
                                                   'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                   'message'=>'Data Not Found!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }

   public function save_checklist_nocwithcbse_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
        $dtls = $this->post('records');
        if(!empty($dtls)){       	
            $surveypart = $dtls['survey'];
            foreach ($dtls as $key => $value){if ($value == ''){ $dtls[$key] = NULL;}}
            // if(!isset($data['app_id'])) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'In Given params app_id is missing , Please Try again!'],REST_Controller::HTTP_OK); 
            // if(!isset($data['school_id'])) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'In Given params school_id is missing , Please Try again!'],REST_Controller::HTTP_OK); 
            
            $appid = $dtls['app_id'];
            $additionalInformation = '';
            if(!empty($appid)){
                $checkList['app_id'] = $dtls['app_id'];
                $checkList['library_yn'] = isset($dtls['library_yn']) ? $dtls['library_yn']: NULL;
                $checkList['books_yn'] = isset($dtls['books_yn']) ? $dtls['books_yn']: NULL;
                $checkList['labs_yn'] = isset($dtls['labs_yn']) ? $dtls['labs_yn']: NULL;
                $checkList['classrooms'] = isset($dtls['classrooms']) ? $dtls['classrooms']: NULL;
                $checkList['sch_same_campus_yn'] = isset($dtls['sch_same_campus_yn']) ? $dtls['sch_same_campus_yn']: NULL;
                $checkList['em_sch_yn'] = isset($dtls['em_sch_yn']) ? $dtls['em_sch_yn']: NULL;
                $checkList['sch1_school_id'] = isset($dtls['sch1_school_id']) ? $dtls['sch1_school_id'] : NULL;
                $checkList['sch2_school_id'] = isset($dtls['sch2_school_id']) ? $dtls['sch2_school_id'] : NULL;
                $checkList['sch3_school_id'] = isset($dtls['sch3_school_id']) ? $dtls['sch3_school_id'] : NULL;
                $checkList['sch4_school_id'] = isset($dtls['sch4_school_id']) ? $dtls['sch4_school_id'] : NULL;
                $checkList['sch5_school_id'] = isset($dtls['sch5_school_id']) ? $dtls['sch5_school_id'] : NULL;
                $checkList['sch1_noc_yn'] = isset($dtls['sch1_noc_yn']) ? $dtls['sch1_noc_yn'] : NULL;
                // $checkList['hilly_yn'] = isset($dtls['hilly_yn']) ? $dtls['hilly_yn']: NULL;
                $checkList['other_sch_affect_yn'] = isset($dtls['other_sch_affect_yn']) ? $dtls['other_sch_affect_yn']: NULL;
                $checkList['pictures_yn'] = isset($dtls['pictures_yn']) ? $dtls['pictures_yn']: NULL;
                $checkList['security_yn'] = isset($dtls['security_yn']) ? $dtls['security_yn']: NULL;
                $checkList['docs_attested_yn'] = isset($dtls['docs_attested_yn']) ? $dtls['docs_attested_yn']: NULL;
                $checkList['forms_yn'] = isset($dtls['forms_yn']) ? $dtls['forms_yn']: NULL;
                $checklist_table ='mgmt_app_noc_checklist';
                $checklist_where = array('app_id'=>$appid);
                $checklistPKID = $this->Schools_homemodel->get_PKID($checklist_table,$checklist_where);
                // die();
                if($checklistPKID != 0){
                    $checklist_where['id'] = $checklistPKID;
                    $checklistDtls = $this->Statemodel->school_update($checkList,$checklist_table,$checklist_where);
                    // $additionalInformation =  ($checklistDtls['affected_rows'] > 0) ? $additionalInformation."NOC Checklist Updated and " :$additionalInformation;
                    if($checklistDtls['affected_rows'] > 0){
                        $additionalInformation =  $additionalInformation."NOC Checklist Updated and ";    
                    }
                    // print_r($checklistDtls);
                    // echo $additionalInformation;
                    // die();
                }
                else{$checklistDtls = $this->Statemodel->school_insert($checklist_table,$checkList);
                    $additionalInformation =  $checklistDtls ? $additionalInformation."NOC Checklist Saved and " :$additionalInformation;
                }
                if($dtls['flag'] === "0"){
                    $usertypeto = $this->Schools_homemodel->get_usertypeto_in_mgmtstage($dtls['school_id'],$emis_usertype);
                    if($usertypeto != ''){

                            $track['app_type'] = 3;
                            $track['user_action'] = 0;
                            $track['app_id'] = $dtls['app_id'];
                            $track['user_type_id_from'] = $emis_usertype;
                            $track['user_type_id_to'] = $usertypeto;
                            $trackTn = 'mgmt_app_tracking';
                            $trackWhere = array('app_id'=>$dtls['app_id'],'app_type'=>3);
                            $trackerInfo = $this->Schools_homemodel->get_trackerInfo($trackTn,$trackWhere);
                            if(!empty($trackerInfo)){
                                if($trackerInfo->user_type_id_from == $emis_usertype && $trackerInfo->user_action == 0 && $trackerInfo->user_type_id_to == $usertypeto){
                                    $additionalInformation =  "NOC Information are Not Tracked and ";
                                }else{
                                    $trackDtls = $this->Statemodel->school_insert($trackTn,$track);
                                    $additionalInformation =  $trackDtls ? $additionalInformation."NOC Information are Tracked and " :$additionalInformation;
                                }
                            }
                            else{$trackDtls = $this->Statemodel->school_insert($trackTn,$track);
                                 $additionalInformation =  $trackDtls ? $additionalInformation."NOC Information are Tracked and " :$additionalInformation;
                            }

                            $status['status'] = 0;
                            $status['status_user'] = $emis_usertype;
                            $status['status_stage'] = $usertypeto;
                            $statusTn = 'mgmt_app_status';
                            $statusWhere = array('app_id'=>$dtls['app_id'],'app_type'=>3,'school_id'=>$dtls['school_id']);
                            $statusPKID = $this->Schools_homemodel->get_PKID($statusTn,$statusWhere);
                            if($statusPKID != 0){
                                $statusWhere['id'] = $statusPKID;
                                $statusDtls = $this->Statemodel->school_update($status,$statusTn,$statusWhere);
                                $additionalInformation =  ($statusDtls['affected_rows'] > 0) ? $additionalInformation."Status also Updated and " :$additionalInformation;
                            }else $additionalInformation =  $additionalInformation."Status not Updated and ";
                    } else $additionalInformation =  "NOC Information are Not Tracked and Status not Updated Because of there is No Management Stage Details for Given School ID (in params) and ";
                }else $additionalInformation =  "NOC Details are in Partially Submission and ";

                if(!empty($surveypart)){
                    $index0 = 0;
                    $incre0 = 0;
                    $a=array();$b=array();
                    $survey_table = 'mgmt_app_survey_details';
                    $where = array('app_id'=>$dtls['app_id'],'school_id'=>$dtls['school_id'],'isactive'=>1,'app_type'=>3);
                    $param = array('id');
                    $id_arr  = Common::get_multi_withdyncol_list($param,$survey_table,$where);
                    for($i= 0;$i<count($id_arr);$i++){ array_push($b,$id_arr[$i]->id); }
                    foreach($surveypart as $dt){ //need to check id in html
                        if($dt['survey_inx_id'] == ''){
                            $dtlsforadd[] = array(
                                'school_id'=>$dtls['school_id'],
                                'app_id'=>$dtls['app_id'],
                                'app_type'=>3,
                                'details_type'=>$dt['details_type'],
                                'survey_number'=>$dt['survey_number'],
                                'area'=>$dt['area'],
                                'isactive'=> 1,
                                'created_at'=> date('Y-m-d',strtotime('now'))
                            );
                        }
                        if($dt['survey_inx_id'] != ''){
                            $dtlsforedit[] = array(
                                'school_id'=>$dtls['school_id'],
                                'app_id'=>$dtls['app_id'],
                                'app_type'=>3,
                                'id'=> (int)$dt['survey_inx_id'],
                                'details_type'=>$dt['details_type'],
                                'survey_number'=>$dt['survey_number'],
                                'area'=>$dt['area']
                            );
                            array_push($a,$dt['survey_inx_id']);
                        }
                    }
                    if(!empty($b)){
                        $result_compare = array_values(array_diff($b, $a));
                    }else $result_compare = array();
                    // $z = (int)(count($b)+1);
                    // $b[$z] = 3;
                    if(!empty($result_compare)){ $result_inactive = $this->Schools_homemodel->noc_survey_details_inactive($result_compare,$dtls['app_id'],2); }                    
                    if(!empty($dtlsforadd)){$result_add = $this->Schools_homemodel->noc_survey_details_save($survey_table,$dtlsforadd);}else{$result_add = false;}
                    if(!empty($dtlsforedit)){$result_edit = $this->Schools_homemodel->noc_survey_details_update($survey_table,$dtlsforedit);}else{$result_edit = false;}
                    if($result_add || $result_edit){$additionalInformation =  $additionalInformation."Survey Details Updated";
                    }else $additionalInformation =  $additionalInformation."There is No Changes in Survey Details";
                }else{ $additionalInformation =  $additionalInformation."There is No Changes in Survey Details";}    
                if($checklistDtls){ $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'additionalMessage'=>$additionalInformation,'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK); }
                else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Details Not Updated Please Try Again!'],REST_Controller::HTTP_OK);                 
            }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Application ID Not Founded!'],REST_Controller::HTTP_OK);
        } else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK); 
        /*not empty closed and below its else*/
    } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
    /* emis_logged_in closed and below its else*/
   } /*fns closed*/

   public function docdtls_nocwithcbse_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
            $data = $this->post('records');
            $emis_usertype = (int)$token['emis_usertype'];
            if(!empty($data['app_id'])){
                $get_arr = array();
                $file_arr = $data['files'];
                if(!empty($data)){
                    $key_arr = array('minority_status','building_doc','building_stab_certi','building_license','sanitary_certi','fire_safety','upload_permi_certi','upload_sch_photo','closure_order','land_details');
                    // if(!isset($data['constant'])) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'In Given params constant key is missing , Please Try again!'],REST_Controller::HTTP_OK); 
                    // if(empty($data['constant'])) $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'In Given params constant key is available but there is no value , Please Try again!'],REST_Controller::HTTP_OK); 
                    // $const = constant($data['constant']);
                    // $key_arr = unserialize($const);
                    
                    $get_arr = $this->docdtls_fnty($data,$key_arr);  
                    
                    if(!empty($get_arr)){
                        $check = 0;
                        $doc_table = 'mgmt_app_doc_uploads';
                        for($i=0;$i<count($get_arr);$i++){
                            for($j=0;$j<count($file_arr);$j++){
                                if($file_arr[$j]['doc_id'] == $get_arr[$i]['doc_id'] &&  $file_arr[$j]['doc_type'] == $get_arr[$i]['doc_type']){
                                    $get_arr[$i]['doc_name'] = $file_arr[$j]['doc_name'];
                                    $get_arr[$i]['doc_name_coded'] = $file_arr[$j]['doc_name_coded'];
                                }
                            }//for-inner closed
                            $get_arr[$i]['app_id'] = $data['app_id'];
                            $get_arr[$i]['isactive'] = 1;
                            $get_arr[$i]['user_type'] = $emis_usertype;
                            
                            $doc_where = array('app_id'=>$data['app_id'],'doc_id'=>$get_arr[$i]['doc_id'],'doc_type'=>$get_arr[$i]['doc_type'],'user_type'=>$emis_usertype);
                            $doc_PKID = $this->Schools_homemodel->get_PKID($doc_table,$doc_where);
                            
                            if($doc_PKID != 0){
                                $doc_where['id'] = $doc_PKID;
                                $doc_data = $this->Schools_homemodel->noc_doc_details_update($doc_table,$get_arr[$i],$doc_where);
                            }
                            else{
                                $get_arr[$i]['created_at'] =  date('Y-m-d',strtotime('now'));
                                $doc_data = $this->Schools_homemodel->noc_doc_details_save($doc_table,$get_arr[$i]);
                            }
                            // $doc_data = false;
                            // print_r($get_arr[$i]);
                            // die();
                            if($doc_data)$check++;
                        }//for-outer closed    
                        
                        if($check>0){$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Docs details Update Successfully'],REST_Controller::HTTP_OK);
                        }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'There Is No Changes Doc. so doc details can`t Able to Update'],REST_Controller::HTTP_OK);				
                    }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'Convertion Issues. Please Try-again !'],REST_Controller::HTTP_OK);// if-else getarr closed
                }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'There is No Content For Update. Please Try-again !'],REST_Controller::HTTP_OK); //if-else data closed
            }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK);//if-else appid closed
    }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); // if else loggedin closed
   }

public function SaveAppDocRemaks_Det_post()
{
  $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){

            $a = array();
            $data = $this->post('records');       
             if(!empty($data)){  
               
                  if(is_array($data))
                  {
                   
                    
                     for($i=0;$i<count($data);$i++)
                        {
                         
                          array_push($a,$data[$i]); 
                       
                        $status = $this->Schools_homemodel->saveremarksdeails($data[$i]);
                          
                         }        
                  }
                
             
                if($status!=0 || $status!="")
                {   
                     $this->response(['dataStatus'=>true,
                                        'status'=>REST_Controller::HTTP_OK,
                                        'message'=>'Details Saved Successfully'],REST_Controller::HTTP_OK); 
                }else $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'Data Not Saved!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
   public function docdtls_fnty($data,$key_arr){
       $ret_arr = array();
       for($i=0;$i<count($key_arr);$i++){
        $key = $key_arr[$i];
            if(!empty($data[$key])){
                if(is_array($data[$key])){
                    for($j=0;$j<count($data[$key]);$j++){
                        if(isset($data[$key][$j]['plan'])){ unset($data[$key][$j]['plan']);}
                        if(isset($data[$key][$j]['certificate'])){unset($data[$key][$j]['certificate']);}
                        array_push($ret_arr,$data[$key][$j]);
                    }
                }else array_push($ret_arr,$data[$key]);
            }
       }
       return $ret_arr;
   }


   public function docuplddata_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
   
    if($emis_loggedin){
        
            $data = $this->post('records');
            $a = array();
            $b = $data['files'];
            
            if(!empty($data)){       	
                 
                if(!empty($data['app_id'])){
                    if(!empty($data['order_condition_doc'])){
                        $doc_table = 'mgmt_app_status';
                        $doc_where = array('app_id'=>$data['app_id']);
                        $data['order_condi_doc'] = $data['order_condition_doc']['0'];
                        $order_condi_data = $this->Schools_homemodel->noc_doc_details_update($doc_table,$data['order_condi_doc'],$doc_where);
                        //unset($data['order_condition_doc']);
                    }
                    if(!empty($data['schl_certifi_detls'])){
                        if(is_array($data['schl_certifi_detls'])){
                           for($i=0;$i<count($data['schl_certifi_detls']);$i++){
                            array_push($a,$data['schl_certifi_detls'][$i]);
                        }}else array_push($a,$data['schl_certifi_detls']);
                    }
                    if(!empty($data['schl_appli_fee_detls'])){
                        if(is_array($data['schl_appli_fee_detls'])){
                           for($i=0;$i<count($data['schl_appli_fee_detls']);$i++){
                            array_push($a,$data['schl_appli_fee_detls'][$i]);
                        }}else array_push($a,$data['schl_appli_fee_detls']);
                    }
                    if(!empty($data['other_supporting_doc'])){
                            //array_push($a,$data['other_supporting_doc']);
                            if(is_array($data['other_supporting_doc'])){
                                for($i=0;$i<count($data['other_supporting_doc']);$i++){
                                // unset($data['other_supporting_doc'][$i]['area']); 
                                 array_push($a,$data['other_supporting_doc'][$i]);
                             }}else array_push($a,$data['other_supporting_doc']);
                    }
                    if(!empty($data['building_doc'])){
                        if(is_array($data['building_doc'])){
                            for($i=0;$i<count($data['building_doc']);$i++){
                             unset($data['building_doc'][$i]['plan']); 
                             array_push($a,$data['building_doc'][$i]);
                         }}else array_push($a,$data['building_doc']);
                    }
                    if(!empty($data['building_stab_certi'])){
                        
                        if(is_array($data['building_stab_certi'])){
                            for($i=0;$i<count($data['building_stab_certi']);$i++){
                            unset($data['building_stab_certi'][$i]['certificate']); 
                             array_push($a,$data['building_stab_certi'][$i]);
                         }}else array_push($a,$data['building_stab_certi']);
                    }
                    if(!empty($data['doa_building_stab_certi'])){
                        //array_push($a,$data['doa_building_stab_certi']);
                        if(is_array($data['doa_building_stab_certi'])){
                            for($i=0;$i<count($data['doa_building_stab_certi']);$i++){
                           // unset($data['doa_building_stab_certi'][$i]['certificate']); 
                             array_push($a,$data['doa_building_stab_certi'][$i]);
                         }}else array_push($a,$data['doa_building_stab_certi']);
                    }
                    if(!empty($data['building_license'])){
                        if(is_array($data['building_license'])){
                            for($i=0;$i<count($data['building_license']);$i++){
                             array_push($a,$data['building_license'][$i]);
                         }}else array_push($a,$data['building_license']);
                    }
                    if(!empty($data['sanitary_certi'])){
                        if(is_array($data['sanitary_certi'])){
                            for($i=0;$i<count($data['sanitary_certi']);$i++){
                             array_push($a,$data['sanitary_certi'][$i]);
                         }}else array_push($a,$data['sanitary_certi']);
                    }
                    if(!empty($data['fire_safety'])){
                        if(is_array($data['fire_safety'])){
                            for($i=0;$i<count($data['fire_safety']);$i++){
                             array_push($a,$data['fire_safety'][$i]);
                         }}else array_push($a,$data['fire_safety']);
                    }
                    if(!empty($data['inter_doc_detls'])){
                        if(is_array($data['inter_doc_detls'])){
                            for($i=0;$i<count($data['inter_doc_detls']);$i++){
                             array_push($a,$data['inter_doc_detls'][$i]);
                         }}else array_push($a,$data['inter_doc_detls']);
                    }
                       $l = 0;
                       $doc_table = 'mgmt_app_doc_uploads';
                       for($j=0;$j<count($a);$j++){
                            // $temp_arr = array('doc_id'=>$a[$i]['doc_id'],'doc_type'=>$a[$i]['doc_type']);
                            for($k=0;$k<count($b);$k++){
                                if($b[$k]['doc_id'] == $a[$j]['doc_id'] &&  $b[$k]['doc_type'] == $a[$j]['doc_type']){
                                    $a[$j]['doc_name'] = $b[$k]['doc_name'];
                                    $a[$j]['doc_name_coded'] = $b[$k]['doc_name_coded'];
                                }
                            }
                            $a[$j]['user_type'] = $data['user_type'];
                            $a[$j]['app_id'] = $data['app_id'];
                            $a[$j]['isactive'] = 1;
                            
                            $doc_where = array('app_id'=>$data['app_id'],'doc_id'=>$a[$j]['doc_id'],'doc_type'=>$a[$j]['doc_type'],'user_type'=>$a[$j]['user_type']);
                            $doc_PKID = $this->Schools_homemodel->get_PKID($doc_table,$doc_where);

                            //if($isset(a[$j]['doc_inx_id'])){unset($a[$j]['doc_inx_id']);} //commented by wesley
                            
                            if($doc_PKID != 0){
                                $doc_where['id'] = $doc_PKID;
                                $doc_data = $this->Schools_homemodel->noc_doc_details_update($doc_table,$a[$j],$doc_where);}
                            else{
                                $a[$j]['created_at'] =  date('Y-m-d',strtotime('now'));
                                $doc_data = $this->Schools_homemodel->noc_doc_details_save($doc_table,$a[$j]);
                            }
                            if($doc_data)$l++;
                        }            

                        if(($l>0) || !empty($order_condi_data)){$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Docs details Update Successfully'],REST_Controller::HTTP_OK);
                        }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Doc details can`t Able to Update'],REST_Controller::HTTP_OK);				
                }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Application ID Not Found for This School!'],REST_Controller::HTTP_OK);         
            } else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NO_CONTENT,'message' => 'There is No Content For Update. Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }


   public function save_students_eclass_download_status_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
            $data = $this->post('records');
            if(!empty($data)){       	
                    foreach ($data as $key => $value){if ($value == ''){ $data[$key] = NULL;}}
                    $data['isactive'] = 1;
                    $eclass_table ='students_eclass_download_status';
                    $eclass_where = array('student_id'=>$data['student_id'],'isactive'=>1);
                    $eclass_tblcount = $this->Statemodel->school_count($eclass_table,$eclass_where);
                    
                    if($eclass_tblcount > 0){
                         $id = $this->Statemodel->eclass_id($eclass_table,$eclass_where);
                         if($id != 0){
                            $eclass_where['id']=$id;
                            $list_data = $this->Statemodel->school_update($data,$eclass_table,$eclass_where);}
                         else{
                            $this->response(['dataStatus'=>false,
                                             'status'=>REST_Controller::HTTP_OK,
                                             'message'=>'Details can`t Update For Given Student ID!'],REST_Controller::HTTP_OK);                 
                         }
                    }
                    else{$list_data = $this->Statemodel->school_insert($eclass_table,$data);}

                    if($list_data)
                    {
                        $this->response(['dataStatus'=>true,
                                         'status'=>REST_Controller::HTTP_OK,
                                         'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK); 
                    }else $this->response(['dataStatus'=>false,
                                           'status'=>REST_Controller::HTTP_NOT_FOUND,
                                           'message'=>'Data Not Found!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }

   public function batch_master_for_eclass_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
        $param = array('id', 'batch_name', 'batch_date', 'class', 'file_count', 'description');
        $data = Common::get_multi_withdyncol_list($param,'students_eclass_batch_master',array('isactive'=>'1'));     
        
        if(!empty($data)) $this->response(['dataStatus' => true,
                                           'status'  => REST_Controller::HTTP_OK,
                                           'message' => 'Batch Master List',
                                           'batchMaster'  => $data ],REST_Controller::HTTP_OK);
        else $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'batchMaster'=>array(),
                             ],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        
}

public function section_group_for_eclass_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
        $emis_user_id = $this->get('sch_id');
        if(isset($emis_user_id)){ 
            if($emis_user_id){

                $param = array('id', 'class_id', 'section', 'no_of_periods', 'group_id', 'school_type', 'school_medium_id', 'students', 'class_teacher_id');
                $details = Common::get_multi_withdyncol_list($param,'schoolnew_section_group',array('school_key_id'=>$emis_user_id));     
        
                if(!empty($details)) $this->response(['dataStatus' => true,
                                           'status'  => REST_Controller::HTTP_OK,
                                           'message' => 'Section Group List',
                                           'group'  => $details ],REST_Controller::HTTP_OK);
                else $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'group'=>array(),
                             ],REST_Controller::HTTP_OK);
            } else $this->response(['dataStatus' => false,
                            'status'  => REST_Controller::HTTP_NO_CONTENT,
                            'message' => 'School ID Not Found ! '],REST_Controller::HTTP_OK);
        } else $this->response(['dataStatus' => false,
                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                    'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        
}
public function students_status_for_eclass_post(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
        $data = $this->post('records');
            if(!empty($data)){       	
                if($data['sch_id'] != "" && $data['class'] != '' && $data['section'] != ''){
                    $result = $this->Schools_homemodel->students_status_for_eclass($data);
                    if(!empty($result))$this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Student List For Eclass Status',
                    'StudentList' => $result ],REST_Controller::HTTP_OK);
                    else $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'StudentList'=>array(),
                             ],REST_Controller::HTTP_OK);
                }
                else $this->response(['dataStatus' => false,
                'status'  => REST_Controller::HTTP_NO_CONTENT,
                'message' => 'Check school ID, class ID and Section!.',
                'StudentList'=>array(),
               ],REST_Controller::HTTP_OK);
            }
            else $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Argument are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function Approval_Docs_BySchool_get()
{
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin)
    {
        $app_id = $this->get('app_id');
        if($app_id!="")
        {
            $gt_doc_details = $this->Schools_homemodel->gt_school_doc_details($app_id);
            if(!empty($gt_doc_details))
            {
                $this->response(['dataStatus' => true,
                                'status'  => REST_Controller::HTTP_OK,
                                'message' => 'School Approval Document List',
                                'schoolDocList' => $gt_doc_details ],REST_Controller::HTTP_OK); 
            }
            else
            {
            $this->response(['dataStatus' => false,
                                'status'  => REST_Controller::HTTP_NO_CONTENT,
                                'message' => 'No Records Found!, please try again.',
                                'StudentList'=>array(),
                                ],REST_Controller::HTTP_OK);
            }
        }
        else
        {
            $this->response(['dataStatus' => false,
                             'status'  => REST_Controller::HTTP_NO_CONTENT,
                             'message' => 'Argument are Empty!, please try again.',
                             'StudentList'=>array(),
                             ],REST_Controller::HTTP_OK);
        }
      
}
else
{
   $this->response(['dataStatus'=>false,
         'status'=>REST_Controller::HTTP_UNAUTHORIZED,
          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

}
public function Approval_School_Status_get()
{
   $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin)
    {
      $school_id = $this->get('school_id');
      $app_type = $this->get('app_type');

      if($app_type!="" && $school_id !="")
      {
        $gt_doc_details = $this->Schools_homemodel->gt_school_appr_status($school_id,$app_type);
          if(!empty($gt_doc_details))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'School_Status_List',
                    'schoolDocList' => $gt_doc_details ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'StudentList'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

      }
      else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Argument are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
      
}
else
{
   $this->response(['dataStatus'=>false,
         'status'=>REST_Controller::HTTP_UNAUTHORIZED,
          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

}
public function School_DownloadOrder_get()
{
  $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin)
    {
      $app_id = $this->get('app_id');
    
      
      if($app_id!="")
      {
        $gt_doc_details = $this->Schools_homemodel->school_downloadOrder($app_id);
          if(!empty($gt_doc_details))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Download_Order_file',
                    'schoolDocList' => $gt_doc_details ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'StudentList'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

      }
      else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Argument are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
      
}
else
{
   $this->response(['dataStatus'=>false,
         'status'=>REST_Controller::HTTP_UNAUTHORIZED,
          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
}
public function School_DownloadOrder_Condition_get()
{
  $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin)
    {
      $app_id = $this->get('app_id');
    
      
      if($app_id!="")
      {
        $gt_doc_details = $this->Schools_homemodel->school_downloadOrderCondition($app_id);
          if(!empty($gt_doc_details))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Download_Order_Conditon_file',
                    'schoolDocList' => $gt_doc_details ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NO_CONTENT,
                              'message' => 'No Records Found!, please try again.',
                              'StudentList'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

      }
      else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Argument are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
      
}
else
{
   $this->response(['dataStatus'=>false,
         'status'=>REST_Controller::HTTP_UNAUTHORIZED,
          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
}
public function SchlAppli_Stage3_get()
{
   $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin)
    {
      $school_id = $this->get('school_id');
    
      
      if($school_id!="")
      {
        $statuss = $this->Schools_homemodel->stage_3_status($school_id);
          if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Applicaiton Stage 3',
                    'Status_stage' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

      }
      else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Argument are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
      
}
else
{
   $this->response(['dataStatus'=>false,
         'status'=>REST_Controller::HTTP_UNAUTHORIZED,
          'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
}

public function Ceo_SchoolAppli_List_get()
{
  $emis_user_id = $this->get('emis_user_id');
  if($emis_user_id == 9 || $emis_user_id == 5)
  {
    $district_id = $this->get('district_id');
    if($district_id!="")
    {
       $statuss = $this->Schools_homemodel->Ceo_list_school_page($district_id);
    }
    else
    {
     $statuss = $this->Schools_homemodel->State_list_school_page(); 
    }
   
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'CEO LIST',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


  }
  else if($emis_user_id == 5)
  {
     $statuss = $this->Schools_homemodel->State_list_school_page();
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'CEO LIST',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }
  }
   else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
  }


 /**CBSE NOC Approval by CEO starts here(wesley)**/
 public function noccbse_frwd_rej_post(){
    $token = Common::userToken();
    //print_r($token);die();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
            $data = $this->post('records');
            //print_r($data);die();                
            if(!empty($data)){  
                $status = $this->Schools_homemodel->noccbse_frwd_reject($data);

                if($status)
                {   
                     $this->response(['dataStatus'=>true,
                                        'status'=>REST_Controller::HTTP_OK,
                                        //'docspart'=>$incre,
                                        'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK); 
                }else $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'Data Not Updated!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
/**CBSE NOC Approval by CEO starts here(wesley)**/   
/**CBSE NOC Forward/Reject by CEO starts here(wesley)**/
// public function noccbse_frwd_rej_post(){
//     $token = Common::userToken();
//     //print_r($token);die();
//     $emis_loggedin = $token['status'];
//     $emis_usertype = (int)$token['emis_usertype'];
//     if($emis_loggedin){
//             $data = $this->post('records');
//             //print_r($data);die();                
//             if(!empty($data)){  
//                 $status = $this->Schools_homemodel->noccbse_frwd_reject($data);
//                 if($status)
//                 {   
//                      $this->response(['dataStatus'=>true,
//                                         'status'=>REST_Controller::HTTP_OK,
//                                         'docspart'=>$incre,
//                                         'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK); 
//                 }else $this->response(['dataStatus'=>false,
//                                     'status'=>REST_Controller::HTTP_NOT_FOUND,
//                                     'message'=>'Data Not Updated!'],REST_Controller::HTTP_OK);                 
//             } else $this->response(['dataStatus' => false,
//                                     'status' => REST_Controller::HTTP_NO_CONTENT,
//                                     'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
//     } else $this->response(['dataStatus'=>false,
//                             'status'=>REST_Controller::HTTP_UNAUTHORIZED,
//                             'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
//  } 
/**CBSE NOC Forward/Reject by CEO ends here(wesley)**/

/**CBSE NOC Approval by Director(state) starts here(wesley)**/
public function noccbse_apprvl_post(){
    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    $emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
            $data = $this->post('records');
            //print_r($data);die();                
            if(!empty($data)){  
                $status = $this->Schools_homemodel->noccbse_apprvl($data);
                if($status)
                {   
                     $this->response(['dataStatus'=>true,
                                        'status'=>REST_Controller::HTTP_OK,
                                        //'docspart'=>$incre,
                                        'message'=>'Details Updated Successfully'],REST_Controller::HTTP_OK); 
                }else $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'Data Not Updated!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
 }
/**CBSE NOC Approval by Director(state) ends here(wesley)**/   
//By Api done by Nirmal

public function GetAppDocRemaks_Det_get()
{
$emis_user_id = $this->get('emis_user_id');
  if($emis_user_id == 9 || $emis_user_id ==6)
  {
     $app_id = $this->get('app_id');
     $doc_type = $this->get('doc_type');
    $statuss = $this->Schools_homemodel->app_doc_uploads_remarks($app_id,$doc_type);
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Remarks_List',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


  }
   else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
}


public function orderCopyData_post()
{
    $token = Common::userToken();
    $emis_loggedin = $token['status'];
    //$emis_usertype = (int)$token['emis_usertype'];
    if($emis_loggedin){
            $data = $this->post('records');
            $app_id = $data['app_id'];
            //print_r($app_id);die();                
            if(!empty($data)){  
                $result = $this->Schools_homemodel->ordercopydata($app_id);
                if(!empty($result))
                {   
                     $this->response(['dataStatus'=>true,
                                        'status'=>REST_Controller::HTTP_OK,
                                        'message'=>'Success',
                                        'result'=>$result],REST_Controller::HTTP_OK); 
                }else $this->response(['dataStatus'=>false,
                                    'status'=>REST_Controller::HTTP_NOT_FOUND,
                                    'message'=>'No Data Found!'],REST_Controller::HTTP_OK);                 
            } else $this->response(['dataStatus' => false,
                                    'status' => REST_Controller::HTTP_NO_CONTENT,
                                    'message' => 'Input Data Should not be empty,Please Try-again !'],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,
                            'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                            'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}
//END






/***************************************************************************************
School Renewal Details by Ramco Magesh ---- Please don't change anything in code
****************************************************************************************/


	public function renewalgetlist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$docs = $_GET['docs'];
		$doclist = $docs!=''?$docs:'';
		if($emis_loggedin){
			
			$data['basic']=$this->Homemodel->getSchoolInfo($school_id,$doclist);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
    }
	
	public function gt_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		$b="school_id=".$school_id."";
		$list = $this->Homemodel->getschoollist($b);
		$a=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage=1");
		print_r($a);die();
		
	}
	
	public function renewalapply_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$school_id = $token['emis_user_id'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$single_data=array();
			$b="school_id=".$school_id." and app_type=1";
			$list = $this->Homemodel->getschoollist($b);
			$listapp=$list[0]['app_id']!=''?"app_id=".$list[0]['app_id']." and":'';
			$app_id=$this->Homemodel->getappid(1,$listapp);
			foreach($data as $tablename =>$tablevalue){
				if(in_array($tablename,array("mgmt_app_status"))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($tablename);
					foreach($tabledesc as $didx => $dvalue){
						foreach($tablevalue[0] as $tidx =>$tvalue){						
							if($dvalue['Field']==$tidx){
								if($dvalue['Type']=="timestamp"){
									$tvalue=date("Y-m-d h:i:s",strtotime("now"));
								}
								if($dvalue['Type']=="datetime"){
									$tvalue=date("Y-m-d h:i:s",strtotime("now"));
								}
								$a=$this->Homemodel->getstageslist($single_entry['sch_directorate_id'],$single_entry['app_type'],"stage=1");
								
								if($tidx=='school_id'){
									$tvalue=$school_id;
								}
								
								
								if($tidx=='app_id'){
									if($app_id[0]['app_id']<10000000){
										$tvalue=10000000;
									}else if($app_id[0]['app_id']>=10000000 && $list[0]['school_id']==''){
										$tvalue=$app_id[0]['app_id']+1;
									}else if($app_id[0]['app_id']== $list[0]['app_id']){
										$tvalue=$app_id[0]['app_id'];
									}
								}
								if($tidx=='app_submit_date'){
									$tvalue=date("Y-m-d h:i:s",strtotime("now"));
								}
								
								if($tidx=='status_user'){
									$tvalue=$a[0]['user_type_id'];
								}
								if($tidx=='status_stage'){
									$tvalue=$a[0]['stage'];
								}

								$single_entry[$tidx]=$tvalue;
								$a=array("app_id"=> $single_entry['app_id']);
							}
						}
					}
					$data = $this->Homemodel->renewalsave($single_entry,$tablename,$a);
				}elseif(in_array($tablename,array("mgmt_app_tracking"))){
					$len=count($tablevalue);
					for($i=0;$i<$len;$i++){
						$b="school_id=".$school_id." and app_type=1";
						$list = $this->Homemodel->getschoollist($b);
						$a=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage=1");
						
						$tablevalue[$i]['user_action']=0;
						$tablevalue[$i]['user_type_id_to']=$a[0]['user_type_id'];
						$tablevalue[$i]['user_type_id_from']=$token['emis_usertype'];
						$tablevalue[$i]['action_time']=date("Y-m-d h:i:s",strtotime("now"));
					}
					$reference=array("app_id"=>$tablevalue[0]['app_id']);
					$this->Homemodel->renewalsave($tablevalue,$tablename,$reference);
				}else{
					$len=count($tablevalue);
					if(isset($tablevalue[0])){
						for($i=0;$i<$len;$i++){
							//$tablevalue[$i]['user_type']=1;
							$tablevalue[$i]['created_at']=date("Y-m-d h:i:s",strtotime("now"));
							$tablevalue[$i]['updated_at']=date("Y-m-d h:i:s",strtotime("now"));
						}
					}elseif(!is_array($tablevalue[0])){
						//$tablevalue['user_type']=$token['emis_usertype'];
						$tablevalue['created_at']=date("Y-m-d h:i:s",strtotime("now"));
						$tablevalue['updated_at']=date("Y-m-d h:i:s",strtotime("now"));
					}
					$a=array("app_id"=> $tablevalue[0]['app_id']);
					$result=$this->Homemodel->renewalsave($tablevalue,$tablename,$a);
					
				}
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}

	
	public function renewalsubmissionlist_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$user_id = $token['emis_user_id'];
		
		$school_id=$_GET['school_id'];
		if($emis_loggedin){
			/*if($token['emis_usertype']==5){             //State
                $where=" schoolnew_district.id IS NOT NULL and mgmt_app_status.app_type=1 and mgmt_app_status.school_id=".$school_id.""; 
            }elseif($token['emis_usertype']==9){        //CEO
                $where=" schoolnew_district.id=".$token['emis_user_id']." and status_user=".$token['emis_usertype']." and (order_valid_upto_date<NOW() or order_valid_upto_date is null) and mgmt_app_status.app_type=1 and mgmt_app_status.school_id=".$school_id."";
				$data=$this->Homemodel->getrenewalinfo($where);
				$sch_directorate_id=$data[0]['sch_directorate_id'];
				$app_id=$data[0]['app_id'];
				$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
				$docslist=$this->Homemodel->docslist($app_id);
				$docsremarks=$this->Homemodel->docsremarks($app_id);
            }elseif($token['emis_usertype']==10){       //DEO
                $where='schoolnew_basicinfo.edu_dist_id='.$token['emis_user_id']." and status_user=".$token['emis_usertype']." and (order_valid_upto_date<NOW() or order_valid_upto_date is null) and mgmt_app_status.app_type=1 and mgmt_app_status.school_id=".$school_id."";
				$data=$this->Homemodel->getrenewalinfo($where);
				$sch_directorate_id=$data[0]['sch_directorate_id'];
				$app_id=$data[0]['app_id'];
				$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
				$docslist=$this->Homemodel->docslist($app_id);
				$docsremarks=$this->Homemodel->docsremarks($app_id);
            }elseif($token['emis_usertype']==6){        //BEO
				$where=" schoolnew_block.id=".$token['emis_user_id']." and status_user=".$token['emis_usertype']." and (order_valid_upto_date<NOW() or order_valid_upto_date is null) and mgmt_app_status.app_type=1 and mgmt_app_status.school_id=".$school_id."";
				$data=$this->Homemodel->getrenewalinfo($where);
				$sch_directorate_id=$data[0]['sch_directorate_id'];
				$app_id=$data[0]['app_id'];
				$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
				$docslist=$this->Homemodel->docslist($app_id);
				$docsremarks=$this->Homemodel->docsremarks($app_id);
			}else if($token['emis_usertype']==1){
				$where=" schoolnew_basicinfo.school_id=".$token['emis_user_id']."";
				$data=$this->Homemodel->getrenewalinfo($where);
				$sch_directorate_id=$data[0]['sch_directorate_id'];
				$app_id=$data[0]['app_id']==''?0:$data[0]['app_id'];
				$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
				$docslist=$this->Homemodel->docslist($app_id);
				$docsremarks=$this->Homemodel->docsremarks($app_id);
			}*/
			
				$where=" schoolnew_basicinfo.school_id=".$school_id." and mgmt_app_status.app_type=1";
				$data=$this->Homemodel->getrenewalinfo($where);
				$sch_directorate_id=$data[0]['sch_directorate_id'];
				$app_id=$data[0]['app_id']==''?0:$data[0]['app_id'];
				$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
				$docslist=$this->Homemodel->docslist($app_id);
				$docsremarks=$this->Homemodel->docsremarks($app_id);
			
			
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data,'result1'=>$docslist,'result2'=>$docsremarks,'result3'=>$stagesall],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	public function renewalstatus_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$user_id = $token['emis_user_id'];
		
		$school_id=$_GET['school_id'];
		
		if($emis_loggedin){
			$data = $this->Homemodel->renewalstatuslist($school_id);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function renewalapprove_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$userid = $token['emis_user_id'];
		
		$json = file_get_contents('php://input');
		$data = json_decode($json,true);
		if($emis_loggedin){
			
			foreach($data as $tablename =>$tablevalue){
				if(in_array($tablename,array("mgmt_app_tracking"))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($tablename);
					foreach($tabledesc as $didx => $dvalue){
						foreach($tablevalue[0] as $tidx =>$tvalue){						
							if($dvalue['Field']==$tidx){
								if($dvalue['Type']=="timestamp"){
									$tvalue=date("Y-m-d h:i:s",strtotime("now"));
								}
								if($tidx=="user_type_id_from"){
									$tvalue=$token["emis_usertype"];
								}
								
								/*if($tidx=='user_type_id_to'){
									$app_id=$single_entry['app_id'];
									$appid="app_id='".$app_id."'";
									$list = $this->Homemodel->getschoollist($appid);
									$a=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage!=1");
									$tvalue=$a[0]['user_type_id'];
								}*/
								
								$app_id=$single_entry['app_id'];
								$appid="app_id='".$app_id."'";
								$list = $this->Homemodel->getschoollist($appid);
								$a=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage!=1");
								
								if($single_entry['user_action']==1){
									$single_entry['user_type_id_to']=$a[0]['user_type_id'];
								}elseif($single_entry['user_action']==2){
									$single_entry['user_type_id_to']=1;
								}elseif($single_entry['user_action']==3){
									$single_entry['user_type_id_to']=$a[0]['user_type_id'];
								}elseif($single_entry['user_action']==-3 && $token['emis_usertype']==6){
									$single_entry['user_type_id_to']=1;
									$single_entry['user_action']=2;
								}elseif($single_entry['user_action']==-3){
									$b=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage=1");
									$single_entry['user_type_id_to']=$b[0]['user_type_id'];
								}elseif($single_entry['user_action']==0){
									$b=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage=1");
									$single_entry['user_type_id_to']=$b[0]['user_type_id'];
								}
								
								$single_entry[$tidx]=$tvalue;
							}
						}
					}
					//print_r($single_entry);die();
					$reference=array("app_id"=>$single_entry['app_id']);
					$this->Homemodel->renewalapprove($single_entry,$tablename,$reference);
				}else if(in_array($tablename,array("mgmt_app_status"))){
					
					$len=count($tablevalue);
					for($i=0;$i<$len;$i++){
						$app_id=$single_entry['app_id'];
						$appid="app_id='".$app_id."'";
						$list = $this->Homemodel->getschoollist($appid);
						$a=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage!=1");
						if($tablevalue[$i]['status']==1){
							$tablevalue[$i]['status_user']=$a[0]['user_type_id'];
							$tablevalue[$i]['status_stage']=$a[0]['stage'];
						}elseif($tablevalue[$i]['status']==2){
							$tablevalue[$i]['status_user']=1;
							$tablevalue[$i]['status_stage']=0;
						}elseif($tablevalue[$i]['status']==3){
							$tablevalue[$i]['status_user']=$a[0]['user_type_id'];
							$tablevalue[$i]['status_stage']=$a[0]['stage'];
						}elseif($tablevalue[$i]['status']==-3 && $token['emis_usertype']==6){
							$tablevalue[$i]['status']=2;
							$tablevalue[$i]['status_user']=1;
							$tablevalue[$i]['status_stage']=0;
						}elseif($tablevalue[$i]['status']==-3){
							$b=$this->Homemodel->getstageslist($list[0]['sch_directorate_id'],$list[0]['app_type'],"stage=1");
							$tablevalue[$i]['status']=3;
							$tablevalue[$i]['status_user']=$b[0]['user_type_id'];
							$tablevalue[$i]['status_stage']=$b[0]['stage'];
						}
						
						$tablevalue[$i]['updated_at']=date("Y-m-d h:i:s",strtotime("now"));
					}
					
					$reference=array("app_id"=>$single_entry['app_id']);
					$this->Homemodel->renewalapprove($tablevalue[0],$tablename,$reference);
				}else if(in_array($tablename,array("mgmt_app_doc_remarks"))){
					
					$len=count($tablevalue);
					for($i=0;$i<$len;$i++){
						$tablevalue[$i]['user_type_id']=$token['emis_usertype'];
						$tablevalue[$i]['created_at']=date("Y-m-d h:i:s",strtotime("now"));
						$tablevalue[$i]['updated_at']=date("Y-m-d h:i:s",strtotime("now"));
					}
					$reference=array("app_id"=>$tablevalue[0]['app_id']);
					$this->Homemodel->renewalapprove($tablevalue,$tablename,$reference);
				}
				
			}
			
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function renewalpdfview_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		$school_id=$_GET['school_id'];
		if($emis_loggedin){
			
			
			$where=" and mgmt_app_status.school_id=".$school_id." and status_stage=2 and order_valid_upto_date>NOW() and order_valid_upto_date is not null ";
		
			$pdf = $this->Homemodel->renewalpdfview($where);
			$sch_directorate_id=$pdf[0]['sch_directorate_id'];
			$app_id=$pdf[0]['app_id']==''?0:$pdf[0]['app_id'];
			$stagesall = $this->Homemodel->getstagelistall($sch_directorate_id,$app_id);
			$docslist=$this->Homemodel->docslist($app_id);
			$docsremarks=$this->Homemodel->docsremarks($app_id);	
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$pdf,'result1'=>$docslist,'result2'=>$docsremarks,'result3'=>$stagesall],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	public function dashboardrenewalcount_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		$userid = $token['emis_user_id'];
		if($emis_loggedin){
			
			if($token['emis_usertype']==5){             //State
                $where=" schoolnew_basicinfo.district_id IS NOT NULL"; 
            }elseif($token['emis_usertype']==9){        //CEO
                $where=" schoolnew_basicinfo.district_id=".$token['emis_user_id']."";
            }elseif($token['emis_usertype']==10){       //DEO
                $where=" schoolnew_basicinfo.edu_dist_id=".$token['emis_user_id']."";
            }elseif($token['emis_usertype']==6){        //BEO
				$where=" schoolnew_basicinfo.block_id=".$token['emis_user_id']."";
			}else if($token['emis_usertype']==1){
				$where=" schoolnew_basicinfo.school_id=".$token['emis_user_id']."";
			}
			$data = $this->Homemodel->dasboardrenewalcount($where,$token['emis_usertype']);
			//print_r($data);
			//for($i=0;$i<count($data);$i++){
				if($token['emis_usertype']==6){
					$key = array_search(9, array_column($data, 'user'));
					unset($data[$key]);
					
				}else if($token['emis_usertype']==9){
					$key = array_search(6, array_column($data, 'user'));
					unset($data[$key]);
				}
			//}
			
			$list=array_values($data);
			//print_r($data);die();
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$list],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	
	public function dashboardrenewal_get(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		$section = $_GET['section'];
		if($emis_loggedin) {
			switch($section){
				case 1:
					/*Approved application*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$where=$where.' and status=1 and order_valid_upto_date>NOW() and order_valid_upto_date is not null';
					$data['renewal']=$this->Homemodel->renewallist($section,$where,$data['group']['group']);
					break;
				case 2:
					/*Rejected Application*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$where=$where." and status=2";
					$data['renewal']=$this->Homemodel->renewallist($section,$where,$data['group']['group']);
					break;
					
				case 6:
					/*beo*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$where=$where.' and status_user=6 and (status_stage=1) and status!=1';
					$data['renewal'] = $this->Homemodel->renewallist($section,$where,$data['group']['group']);
					break;
				case 10:
					/*deo*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$where=$where.' and  status_user=10 and (status_stage=1 or status_stage=2) and status!=1';
					$data['renewal'] = $this->Homemodel->renewallist($section,$where,$data['group']['group']);
					break;
				case 9:
					/*ceo*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$where=$where.' and status_user=9 and (status_stage=2) and status!=1';
					$data['renewal'] = $this->Homemodel->renewallist($section,$where,$data['group']['group']);
					break;
				default:
					/*Total application*/
					$data['group']=$this->allGroupAndNext("students_school_child_count.",$emis_user_type_id);
					$where=(!isset($_GET['grp']))?$this->allWhereCondtion("students_school_child_count.",$emis_userid,$emis_user_type_id):$data['group']['where'];
					$data['renewal']=$this->Homemodel->renewallist($section,$where,$data['group']['group']);
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','renewal'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/* ✦ Staff Image access : Ramco Magesh */
    public function base_get($image_data,$filesname,$school_id){
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
        $school_id = (!empty($filesname)) ? $filesname : $school_id;
        $tempdoc = $output_file;
        $key = 'Renewal_Application_TESTING'.'/'.$school_id.'.jpgx';
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
	
	
	
/************************************************************************************************************
Renewal Ends here
*************************************************************************************************************/



/*************************************************************************************************************
		DCF Form by Ramco Magesh
**************************************************************************************************************/

	public function schoolprofilelist_get(){
		
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
		
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		$id = $_GET['school_id'];
		$school_id = $id!=''?'and school_id='.$id:'';
		if($emis_loggedin){
			if($token['emis_usertype']==5){             //State
                $where=" schoolnew_basicinfo.district_id IS NOT NULL  ".$school_id.""; 
            }elseif($token['emis_usertype']==9){        //CEO
                $where=" schoolnew_basicinfo.district_id=".$token['emis_user_id']." ".$school_id."";
            }elseif($token['emis_usertype']==10 || $token['emis_usertype']==4){       //DEO
                $where=" schoolnew_basicinfo.edu_dist_id=".$token['emis_user_id']." ".$school_id."";
            }else if($token['emis_usertype']==3){ 		//District
				$where=" schoolnew_basicinfo.district_id=".$token['emis_user_id']." ".$school_id."";
			}elseif($token['emis_usertype']==6 || $token['emis_usertype']==2){        //BEO
				$where=" schoolnew_basicinfo.block_id=".$token['emis_user_id']." ".$school_id."";
			}else if($token['emis_usertype']==1){
				$where=" schoolnew_basicinfo.school_id=".$token['emis_user_id']." ".$school_id."";
			}
			
			$data=$this->Homemodel->schooldcflist($where);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	public function editschoolprofile_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			$json = file_get_contents('php://input');
			$data = json_decode($json,true);
			$single_entry=array();
			foreach($data as $dataindex =>$datavalue){
				if(in_array($dataindex,array("schoolnew_basicinfo"))){
					$tabledesc = $this->Udise_staffmodel->Tabledescribe($dataindex);
					foreach($tabledesc as $tidx => $tvalue){
						foreach($datavalue[0] as $dataidx =>$dvalue){
							if($tvalue['Field']==$dataidx){
								if($tvalue['Type']=="timestamp"){
									$dvalue=date("Y-m-d h:i:s",strtotime("now"));
								}
								$single_entry[$dataidx]=$dvalue;
							}
						}
					}
					$reference=array("school_id"=>$single_entry['school_id']);
					$this->Homemodel->dcfformsave($single_entry,$dataindex,$reference);
				}else if(in_array($dataindex,array("schoolnew_academic_detail"))){
					$datavalue[0]['modified_date']=date("Y-m-d h:i:s",strtotime("now"));
					$datavalue[0]['school_key_id']=$single_entry['school_id'];
					$reference=array("school_key_id"=>$single_entry['school_id']);
					$this->Homemodel->dcfformsave($datavalue[0],$dataindex,$reference);
				}else if(in_array($dataindex,array("schoolnew_training_detail"))){
					$datavalue[0]['modified_date']=date("Y-m-d h:i:s",strtotime("now"));
					$datavalue[0]['school_key_id']=$single_entry['school_id'];
					$reference=array("school_key_id"=>$single_entry['school_id']);
					$this->Homemodel->dcfformsave($datavalue[0],$dataindex,$reference);
				}else if(in_array($dataindex,array("schoolnew_basic_info_history"))){
					$datavalue[0]['school_id']=$single_entry['school_id'];
					$datavalue[0]['updated_date']=date("Y-m-d h:i:s",strtotime("now"));
					$reference=array("school_id"=>$single_entry['school_id']);
					$this->Homemodel->dcfformsave($datavalue[0],$dataindex,$reference);
				}
			}
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>$data],REST_Controller::HTTP_OK);
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
/****************************************************************************************************************
		DCF Form ENDS HERR - By Ramco Magesh
******************************************************************************************************************/


//By Nirmal
public function GetStudentWrong_Entry_get()
{
  $emis_user_id = $this->get('emis_user_id');
  if($emis_user_id == 1)
  {
     $school_id = $this->get('school_id');
  
    $statuss = $this->Schools_homemodel->student_wrong_entry_list($school_id);
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Remarks_List',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


  }
   else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
}

public function Save_Fit_India_post()
{
    $records=$this->post('records');
    $statuss = $this->Schools_homemodel->Save_Fit_India_Details($records);
   
    if(!empty($statuss) || $statuss!="")
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Data Updated SuccessFully!!!'],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_NOT_FOUND,
                              'message' => 'Unable to Save Data.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_NOT_FOUND);
        }


}
public function Fit_India_Report_get()
{
  
  $emis_user_id = $this->get('emis_user_id');
   $month = $this->get('month');
   $year = $this->get('year');
  if($emis_user_id == 5)
  {
    
    
    $report = $this->Schools_homemodel->Fit_India_State_Report($month,$year);
    if(!empty($report))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'FIT INDIA STATE List',
                    'List' => $report ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


  }
   else if($emis_user_id == 9)
  {
    $dist=$this->get('district_id');
    $report = $this->Schools_homemodel->Fit_India_District_Report($month,$year,$dist);
    if(!empty($report))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'FIT INDIA DISTRICT LIST',
                    'List' => $report ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

  }
  else if($emis_user_id ==6)
  {
    $block=$this->get('block_id');
    $report = $this->Schools_homemodel->Fit_India_Block_Report($month,$year,$block);
    if(!empty($report))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'FIT INDIA BLOCK LIST',
                    'List' => $report ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }

  }

   else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
}


public function Get_Fit_India_Det_get()
{
  $emis_user_id = $this->get('emis_user_id');
  if($emis_user_id == 1)
  {
     $school_id = $this->get('school_id');
     $month = $this->get('month');
     $year = $this->get('year');
  
    $statuss = $this->Schools_homemodel->Fit_India_Detials_get($school_id,$month,$year);
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'FIT INDIA GET SCHOOL,MONTH,Year Wise Deitals',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No Records Found!, please try again.',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


}
else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
}

public function GetApiByAPP_ID_get()
{
 $school_id = $this->get('school_id');
  if($school_id!="")
  {
    
    
    $statuss = $this->Schools_homemodel->Get_App_id($school_id);
    if(!empty($statuss))
        {
          $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'APP ID EXISTS!!!',
                    'List' => $statuss ],REST_Controller::HTTP_OK); 
        }
        else
        {
           $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'No APPID FOR THIS SCHOOL FOUND ON DB',
                              'Status_stage'=>array(),
                             ],REST_Controller::HTTP_OK);
        }


}
else
      {
        $this->response(['dataStatus' => false,
            'status'  => REST_Controller::HTTP_NO_CONTENT,
            'message' => 'Token id are Empty!, please try again.',
            'StudentList'=>array(),
           ],REST_Controller::HTTP_OK);
      }
}
//END By Nirmal







































 /******************************************************** Caution: Should Not Change Any of these Code ******************************************************/
    
    public function allWhereCondtion($tname="",$emis_user_id="",$emis_user_type_id=""){
        $where='';
        switch($emis_user_type_id){
            case 1:{
                $where=' AND '.$tname.'school_id='.$emis_user_id;
                break;
            }
            case 2:
            case 6:{
                $where=' AND '.$tname.'block_id='.$emis_user_id;
                break;
            }
            case 3:
            case 9:{
                $where=' AND '.$tname.'district_id='.$emis_user_id;
                break;
            }
            case 4:
            case 10:{
                $where=' AND '.$tname.'edu_dist_id='.$emis_user_id;
                break;
            }
            case 5:{
                $where='';
                break;
            }
        }        
        return $where;
        
    }

    
    function allGroupAndNext($tname="",$emis_user_type_id=""){
        $groupandnext=array();
        $grp=0;
        if(isset($_GET['grp'])){
            $grp=$_GET['grp'];
        }
        
        if(!isset($_GET['q'])){
            $_GET['q']=0;
        }
        
        if(isset($_GET['q'])){
            switch($emis_user_type_id){
				case 1:{
					
                    $groupandnext['group']=$tname.'school_id';
                    $groupandnext['groupname']='school_name';
                    $groupandnext['next']='';
                    $groupandnext['reportid']='';
                    break;
                    
				}
                case 5:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'district_id';
                            $groupandnext['groupname']='district_name';
                            $groupandnext['next']='BLK';
                            $groupandnext['reportid']='emis_district_id';
                            $groupandnext['ctrl']='State';
                            break;
                        }
                        case 'BLK':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['where']=' AND '.$tname.'district_id='.$_GET['q'];
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                    }
                    break;
                }
                case 2:
                case 6:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['reportid']='emis_block_id';
                            break;
                        }
                    }
                    break;
                }
                case 3:
                case 9:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['reportid']='emis_district_id';
                            $groupandnext['ctrl']='Ceo_District';
							$groupandnext['where']=' AND '.$tname.'district_id='.$_GET['q'];
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                    }
                    break;
                }
                case 4:
                case 10:{
                    switch($grp){
                        case '0':{
                            $groupandnext['group']=$tname.'block_id';
                            $groupandnext['groupname']='block_name';
                            $groupandnext['next']='SCH';
                            $groupandnext['reportid']='emis_deo_id';
                            $groupandnext['ctrl']='Deo_District';
                            break;
                        }
                        case 'SCH':{
                            $groupandnext['group']=$tname.'school_id';
                            $groupandnext['groupname']='school_name';
                            $groupandnext['next']='';
                            $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                            break;
                        }
                        
                    }
                    break;
                }
            }
        }
        //print_r($groupandnext);die();
        return $groupandnext;
    }
/******************************************************** Caution: Should Not Change Any of these Code ******************************************************/
public function test_post(){
    $rec=$this->post('records');
    if(!empty($rec)){
        $segment = $rec['Type'];
        if($segment == 'textbook'){
            $param = $rec['Class_ID'];
            if(isset($param)){ 
                if(!empty($param)){$this->elearn_fnty($param,$segment);}
                else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'class ID Not Found !'],REST_Controller::HTTP_OK); 
            }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);
        }else if($segment == 'storybook'){
            $param = $rec['Level_ID'];
            $this->elearn_fnty($param,$segment);  
        }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message'  => 'SomeThing Went Wrong !..' ],REST_Controller::HTTP_OK);
    }else{
        $this->response(['dataStatus'=>false,
                         'status'=>REST_Controller::HTTP_NOT_FOUND,
                         'message'=>'No Data Found!!'],REST_Controller::HTTP_OK);
    }
}

public function elearn_get(){
    // $token = Common::userToken();
    // $emis_loggedin = $token['status'];
    // if($emis_loggedin){

        $segment = $this->uri->segment(2);
        // echo($this->uri->segment(1));
        // echo($this->uri->segment(2));
        
        if($segment == 'textbook'){
            $param = $this->get('Class_ID');
            if(isset($param)){ 
                if(!empty($param)){$where = 'and class ='.$param;
                                   $this->elearn_fnty($where,$segment);}
                else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'class ID Not Found !'],REST_Controller::HTTP_OK); 
            }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !'],REST_Controller::HTTP_OK);
        }else if($segment == 'storybook'){
            $param = $this->get('Level_ID');
            $where = (!empty($param)) ? 'and classification = "storybook" and class ='.$param : 'and classification = "storybook"';
            $this->elearn_fnty($where,$segment);  
        }else if($segment == 'classification'){
            $param1 = $this->get('Classification');
            $param2 = $this->get('Class_ID');
            if(isset($param1) && isset($param1)){ 
                if(!empty($param1) && !empty($param2)){
                    $where = 'and classification = '.$param1.' and class ='.$param2;
                    $this->elearn_fnty($where,$segment);}
                else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'Data Not Found !'],REST_Controller::HTTP_OK); 
            }else $this->response(['dataStatus' => false,'status' => REST_Controller::HTTP_NOT_FOUND,'message' => 'Missing Parameter, please Try Again !'],REST_Controller::HTTP_OK);
        }else if($segment == 'StuContentTrans'){
            $result = $this->Homemodel->studentcontenttransf();
                if(!empty($result)){$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Available','result'=>$result],REST_Controller::HTTP_OK);}
                else $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'No Data Available'],REST_Controller::HTTP_OK);
        }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message'  => 'SomeThing Went Wrong !..' ],REST_Controller::HTTP_OK);
    // }else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
}

public function elearn_fnty($where,$segment){
    $elearn_content = $this->Schools_homemodel->elearn($where);
    if(!empty($elearn_content)){  
        $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,
                         'description'=>"E-learn details for ".$segment,
                         'message' => $segment.' listing',
                         'elearn_details'  => $elearn_content ],REST_Controller::HTTP_OK);
    }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,
                          'description'=>"E-learn details for ".$segment,
                          'message' => 'No Records Found!, please try again.'],REST_Controller::HTTP_OK);
}

public function district_schools_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    if($emis_loggedin){
        $district_id = $this->get('district_id');
        if(isset($district_id)){ 
            if($district_id){
                $param = array('school_id','udise_code','school_name');
                $where = array('manage_cate_id'=>1,'district_id'=>$district_id);
                $details = Common::get_multi_withdyncol_list($param,'schoolnew_basicinfo',$where);     
                if(!empty($details)) $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'School List','schools'  => $details ],REST_Controller::HTTP_OK);
                else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message' => 'No Records Found!, please try again.','schools'=>array()],REST_Controller::HTTP_OK);
            } else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message' => 'District ID Not Found ! ','schools'=>array()],REST_Controller::HTTP_OK);
        } else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !','schools'=>array()],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!','schools'=>array()],REST_Controller::HTTP_OK); 
} 

/** KGBV & CWSN class & sec list starts here by wesley**/
function kgbv_cwsn_Class_Section_get(){
    //echo "hi";die();
    $school_id = $this->get('school_id');
    $arr = $this->Schools_homemodel->get_kgbv_cwsn_schoolwise_class_section($school_id);
    //$medium = $this->Schools_homemodel->get_schoolwise_medium($school_id);
    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    //'result'  => $arr,'medium'=>$medium,
                    'result'  => $arr ],REST_Controller::HTTP_OK);
    
}

function kgbv_cwsn_Stud_Map_Schl_get(){
    //echo "hi";die();
    //$school_id = $this->get('school_id');
    $arr = $this->Schools_homemodel->get_kgbv_cwsn_stud_map_schl($school_id);
    //$medium = $this->Schools_homemodel->get_schoolwise_medium($school_id);
    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    //'result'  => $arr,'medium'=>$medium,
                    'result'  => $arr ],REST_Controller::HTTP_OK);
    
}

function kgbv_cwsn_maped_Stud_Detls_get(){
    //echo "hi";die();
    //$school_id = $this->get('school_id');
    $arr = $this->Schools_homemodel->kgbv_cwsn_maped_Stud_Detls($school_id);
    //$medium = $this->Schools_homemodel->get_schoolwise_medium($school_id);
    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    //'result'  => $arr,'medium'=>$medium,
                    'result'  => $arr ],REST_Controller::HTTP_OK);
    
}

function kgbv_cwsn_students_school_covid_map_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_user_type_id=(int)$token['emis_usertype'];
    if($emis_loggedin && $emis_user_type_id==1 ){
            $student_id = $this->get('student_id');
            if(isset($student_id)){ 
                if($student_id){
                    $schl_id=$token['school_id'];
                    $parent_param = array('id as IndexID','student_id as StudentID','current_school_id as CurrentSchool','collection_school_id as CollectSchool','district_id','benefit_type','isactive as Status');
                    $parent_where = array('student_id'=>$student_id,'current_school_id'=>$schl_id);
                    $parent_details = Common::get_multi_withdyncol_list($parent_param,'students_covid_school_map',$parent_where);     
                    if(!empty($parent_details)){
                        $child_param = array('id as IndexID','student_id as StudentID','benefit_type as Benefit','term','distribute_date as DistributeOn','isactive as Status');
                        $child_where = array('student_id'=>$student_id);
                        $child_details = Common::get_multi_withdyncol_list($child_param,'students_covid_benefit_tracking',$child_where);     
                        // $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Student COVID School Mapping(parent) and its Benefit Tracking(child) List ( School Name : '.$token['school_name'].')','parent'=> $parent_details,'child'=>$child_details ],REST_Controller::HTTP_OK);
                        $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'Student COVID School Mapping(parent) and its Benefit Tracking(child) List' ,'parent'=> $parent_details,'child'=>$child_details ],REST_Controller::HTTP_OK);
                    }else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message' => 'No Records Found!, please try again.','parent'=>array(),'child'=>array()],REST_Controller::HTTP_OK);
                } else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NO_CONTENT,'message' => 'District ID Not Found ! ','parent'=>array(),'child'=>array()],REST_Controller::HTTP_OK);
            } else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_NOT_FOUND,'message' => 'There is No Parameter, please Try Again !','parent'=>array(),'child'=>array()],REST_Controller::HTTP_OK);
    } else $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_UNAUTHORIZED,'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!','parent'=>array(),'child'=>array()],REST_Controller::HTTP_OK); 
}
/** KGBV & CWSN class & sec list ends here by wesley**/
function zonalSchool_get(){
    $block_id = $this->get('block_id');
    if($block_id == ''){ $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','zonal_school'=>array()],REST_Controller::HTTP_OK); }
    $arr = $this->Schools_homemodel->zonalSchool($block_id);
    $len=count($arr);
    if($len > 0){
        for($i=0;$i<$len;$i++){
            // $param = array('id','zonal_id','subschool_id');
            // $where = array('isactive'=>1,'zonal_id'=>$arr[$i]['zonal_id']);
            // $details = Common::get_multi_withdyncol_list($param,'schoolnew_zonal_subschools',$where);     
            $details = $this->Schools_homemodel->zonalSubSchool($arr[$i]['zonal_id']);
            if(count($details)>0){
                $arr[$i]['zonal_sub_school'] = $details; 
            }else{
                $arr[$i]['zonal_sub_school'] = array();     
            }
        }
    }			
    if(!empty($arr)){ $this->response(['dataStatus' => true,'status'  => REST_Controller::HTTP_OK,'message' => 'success','zonal_school'=>$arr],REST_Controller::HTTP_OK);}
    else $this->response(['dataStatus' => false,'status'  => REST_Controller::HTTP_OK,'message' => 'fails','zonal_school'=>array()],REST_Controller::HTTP_OK);
 }
}


?>
