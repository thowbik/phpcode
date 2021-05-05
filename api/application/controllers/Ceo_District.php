<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/third_party/mpdf/mpdf.php';
class Ceo_District extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database(); 
		$this->load->model('Ceo_District_model');
		$this->load->model('Homemodel');
		$this->load->model('Statemodel');
                $this->load->helper('common');
                $this->load->helper('common_helper');
	}
	
	/****************************************************************
		Function done by Ramco Magesh
	*****************************************************************/
	public function districtschoolslist_post(){
		$key = 'EMIS_web@2019_api';
		$ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		//print_r($token);die();
		if($emis_loggedin) {
			$sch_cate=$this->input->post('schoolcat');
			$district_id =$emis_userid;
			$district_details = $this->Ceo_District_model->get_districtName($district_id);
			$dist_id = $district_details->district_name;
			$data['schoollist'] = $this->Ceo_District_model->get_school_list_district_cate($district_id,$sch_cate);
			$data['schoolcate']= $this->Ceo_District_model->get_allmajorcategory(); 
			$data['schoolmanagement']= $this->Ceo_District_model->get_subcategoryname(); 
			$data['schooldepartment']= $this->Ceo_District_model->get_alldeptcategory();
			$data['minority_list'] = $this->Ceo_District_model->get_common_table_details('schoolnew_minority');
			$data['category'] = $this->Ceo_District_model->get_common_table_details('schoolnew_category');
			$data['resitype'] = $this->Ceo_District_model->get_common_table_details('schoolnew_resitype');
			$where = array('district_id'=>$district_id);
			$select = array('edu_dist_id','edu_dist_name');
			$group = 'edu_dist_id';
			$data['edu_dist_details'] = $this->Ceo_District_model->get_common_select_tables($select,'students_school_child_count',$where,$group);
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','statecount'=>$data],REST_Controller::HTTP_OK);			
		}else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}
	}
	
	/* created by venba Tamilmaran for listing the school*/
           /*************************************
           * 03/03/2020 *
           /***********************************/                                 
	public function emis_district_schools_list_get()
        {

                $token = Common::userToken();
                $emis_loggedin=$token['status'];
                $emis_usertype = (int)$token['emis_usertype'];
                if($emis_loggedin){
                        
                        $parameter_check =$this->get('district_id');
                        if(!isset($parameter_check)){
                                $district_id = $token['emis_user_id'];
                                $text = '/Add School Profile';
                                
                        }else{
                                $sch_cate=$this->get('schoolcat');
                                $district_id =$this->get('district_id');
                                $block_id =$this->get('block');
                                $text = '/Edit School Profile';
                        }
                        if(!empty($district_id)){
                                        $district_details = $this->Ceo_District_model->get_districtName($district_id);
                                        $dist_id = $district_details->district_name;
                                        $block = $this->Ceo_District_model->get_block($district_id);
                                        $local_bodyall =$this->Ceo_District_model->get_localBodyall($district_id);
                                        $local_body =$this->Ceo_District_model->get_localBody($district_id);
                                        $edu_dist =$this->Ceo_District_model->get_edudist($district_id);
                                        //$data['hapitation'] =$this->Ceo_District_model->get_hapitation();
                                        $muncipality =$this->Ceo_District_model->get_muncipality($district_id);
                                        $cluster =$this->Ceo_District_model->get_cluster($district_id);
                                        $parliament =$this->Ceo_District_model->get_parliament();
                                        $assembly =$this->Ceo_District_model->get_assembly($district_id);
                                        $city =$this->Ceo_District_model->get_city($district_id);
                                        //print_r( $data['district']);
                                        /*End of location Details  */
                                        $schoollist = !isset($parameter_check) ? $this->Ceo_District_model->get_school_list_district_wise($district_id)
                                                                               : $this->Ceo_District_model->get_school_list_district_cate($district_id,$sch_cate,$block_id);
                                        $schoolcate= $this->Ceo_District_model->get_allmajorcategory(); 
                                        $schoolmanagement= $this->Ceo_District_model->get_subcategoryname(); 
                                        $schooldepartment= $this->Ceo_District_model->get_alldeptcategory();
                                        $minority_list= $this->Homemodel->get_common_table_details('schoolnew_minority');
                                        $category = $this->Homemodel->get_common_table_details('schoolnew_category');
                                        $resitype = $this->Homemodel->get_common_table_details('schoolnew_resitype');
                                        $where = array('district_id'=>$district_id);
                                        $select = array('edu_dist_id','edu_dist_name');
                                        $group = 'edu_dist_id';
                                        $edu_dist_details = $this->Ceo_District_model->get_common_select_tables($select,'students_school_child_count',$where,$group);
                                        if($district_details){
                                                $response['dataStatus'] = true;
                                                $response['status'] = REST_Controller::HTTP_OK;
                                                $response['message'] = 'School Profile Details for '.$token['user_type'];
                                                $response['API Description'] = $token['user_type'].$text;
                                                $response['district'] = $district_details;
                                                $response['block'] = $block;
                                                $response['city']=$city;
                                                $response['edu_dist'] =$edu_dist;
                                                $response['edu_dist_details'] = $edu_dist_details;
                                                $response['local_bodyall'] =$local_bodyall;
                                                $response['local_body'] =$local_body;
                                                $response['muncipality'] =$muncipality;
                                                $response['cluster'] =$cluster;
                                                $response['parliament'] =$parliament;
                                                $response['assembly'] =$assembly;
                                                $response['schoolcate']= $schoolcate; 
                                                $response['schoolmanagement']= $schoolmanagement;
                                                $response['schooldepartment']= $schooldepartment;
                                                $response['minority_list'] = $minority_list;
                                                $response['category'] = $category;
                                                $response['resitype'] = $resitype;
                                                $response['schoollist'] = $schoollist;
                                                $this->response($response,REST_Controller::HTTP_OK);
                                        } else $this->response(['dataStatus'=>false,
                                                                'status'=>REST_Controller::HTTP_NOT_FOUND,
                                                                'API Description' => $token['user_type'].$text,
                                                                'message'=>'Data Not Found!'],REST_Controller::HTTP_OK);       
                        }else $this->response(['dataStatus'=>false,
                                               'status'=>REST_Controller::HTTP_NO_CONTENT,
                                               'message'=>'District ID Not Found!'],REST_Controller::HTTP_OK);       
                }else $this->response(['dataStatus'=>false,
                                       'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                                       'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
        } 
	 
   public function habitation_list_get()
   {
      $localbody_id = $this->input->get('localbody_id');
	  
      $hapitation = $this->Ceo_District_model->get_hapitation($localbody_id);
      if($hapitation)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['hapitation'] = $hapitation;
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

   public function school_profile_saveup_post(){
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $emis_usertype = (int)$token['emis_usertype'];
        if($emis_loggedin &&  $emis_usertype == 3){
                $data = $this->post('records');
                if(!empty($data)){       	
                        foreach ($data as $key => $value){if ($value == ''){ $data[$key] = NULL;}}
                                $checkList['curr_stat'] = 9;
                                $checkList['district_id']	= $data['district_id'];
                                $checkList['urbanrural'] 	= $data['urbanrural'];
                                $checkList['local_body_id']	= $data['local_body_id'];
                                $checkList['lb_vill_town_muni']	= $data['lb_vill_town_muni'];
                                $checkList['cluster_id']	=  $data['cluster_id'];
                                $checkList['panchayat_id']	=  $data['panchayat_id'];
                                $checkList['lb_habitation_id']	= $data['lb_habitation_id'];
                                $checkList['assembly_id']	=  $data['assembly_id'];
                                $checkList['parliament_id']	=  $data['parliament_id'];
                                $checkList['municipal_id']	= $data['municipal_id'];
                                $checkList['city_id']	= $data['city_id'];
                                $checkList['pincode']	= $data['pincode'];
                                $checkList['address']	=  $data['address'];       
                                $checkList['school_name'] = $data['school_name'];
                                $checkList['sch_management_id'] = $data['sch_management_id'];
                                $checkList['latitude'] = $data['latitude'];
                                $checkList['longitude'] = $data['longitude'];
                                $checkList['school_id'] = $data['school_id'];
                                $checkList['block_id'] = $data['block_id'];
                                $checkList['edu_dist_id'] = $data['edu_dist_id'];
                                $checkList['sch_shortname'] = $data['sch_shortname'];     
                                $checkList['sch_cate_id']= $data['sch_cate_id'];
                                $checkListtable ='schoolnew_basicinfo';
                                // print_r($checkList);
                                $where = array('school_id'=>$data['school_id']);
                                $basic_tblcount = $this->Statemodel->school_count($basic_table,$where);
                                if($basic_tblcount > 0){$basic_data = $this->Statemodel->school_update($checkList,$basic_table,$where);}
                                else{$basic_data = $this->Statemodel->schoolbasicinfo_insert($checkList);
                                     $data['school_id'] = $basic_data != 0 ? $basic_data : NULL;
                                }

                       
                       $update_ace['scl_category'] = $data['sch_cate_id'];
                       $update_ace['school_type'] = $data['school_type'];
                       $update_ace['low_class'] = $data['low_class'];
                       $update_ace['high_class'] = $data['high_class'];
                       $update_ace['school_key_id'] = $data['school_id'];  
                       
                        //  print_r($update_ace);
                       $ace_table = 'schoolnew_academic_detail';
                       $ace_where = array('school_key_id'=>$data['school_id']);
                       $ace_tblcount = $this->Statemodel->school_count($ace_table,$ace_where);
                       if($ace_tblcount > 0){$ace_data = $this->Statemodel->school_update($update_ace,$ace_table,$ace_where);}
                       else{$update_ace['school_key_id']=$data['school_id'];$ace_data = $this->Statemodel->school_insert($ace_table,$update_ace);}
            
                       $update_train['mhrd_allot_date'] = $data['mhrd_allot_date'] != '' ? date('Y-m-d',strtotime($data['mhrd_allot_date'])) : NULL;
                       $update_train['mhrd_assign_date'] = $data['mhrd_assign_date'] != '' ? date('Y-m-d',strtotime($data['mhrd_assign_date'])) : NULL;

                       $train_table = 'schoolnew_training_detail';
                       $train_where = array('school_key_id'=>$data['school_id']);
                       $train_tblcount = $this->Statemodel->school_count($train_table,$train_where);
                      
                       if($train_tblcount > 0){$train_data = $this->Statemodel->school_update($update_train,$train_table,$train_where);}
                       else{$update_train['school_key_id'] = $data['school_id'];
                            $train_data = $this->Statemodel->school_insert($train_table,$update_train);}
    
                       if($basic_data)
                       {
                             $txt = $update['school_name'].' Updated Successfully';
                             $this->response(['dataStatus'=>true,
                                              'status'=>REST_Controller::HTTP_OK,
                                              'message'=>$txt],REST_Controller::HTTP_OK); 
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

   public function school_profile_update_post()
   {
        $token = Common::userToken();
        $emis_loggedin=$token['status'];
        $emis_usertype = (int)$token['emis_usertype'];
        if($emis_loggedin){
                $data = $this->post('records');
                if(!empty($data)){       	
                        $where = array('school_id'=>$data['school_id'],'app_status'=>0);
                        $table = "schoolnew_basic_info_history";
                        $alredy_exist = $this->Ceo_District_model->check_ID($table,$where);
                        if(!empty($alredy_exist)){
                                $this->response(['dataStatus' => true,
                                                 'status' => REST_Controller::HTTP_OK,
                                                 'message' => ' Details Already Updated. Waiting For Approval !!'],REST_Controller::HTTP_OK);
                        }else{
                                foreach ($data as $key => $value){if ($value == ''){ $data[$key] = NULL;}}
                                $save['yr_estd_schl']= $data['yr_estd_schl'];
                                $save['yr_recgn_first']= $data['yr_recgn_first'];
                                $save['yr_recogn_schl']= $data['yr_recogn_schl'];
                                $save['yr_rec_schl_elem']= $data['yr_rec_schl_elem'];
                                $save['yr_rec_schl_sec']= $data['yr_rec_schl_sec'];
                                $save['yr_rec_schl_hsc']= $data['yr_rec_schl_hsc'];
                                $save['upgrad_prito_uprpri']= $data['upgrad_prito_uprpri'];
                                $save['upgrad_uprprito_sec']= $data['upgrad_uprprito_sec'];
                                $save['upgrad_secto_higsec']= $data['upgrad_secto_higsec'];
                                $save['spl_edtor']= $data['spl_edtor'];
                                $save['latitude']= $data['latitude'];
                                $save['longitude']= $data['longitude'];
                                $save['curr_stat']= $data['curr_stat'];
                                $save['curstat_date']= $data['curr_stat'] != 1 ? $data['curstat_date'] != NULL ? date('Y-m-d',strtotime($data['curstat_date'])) : NULL : NULL;
                                $save['district_id']= $data['district_id'];
                                $save['urbanrural']= $data['urbanrural'];
                                $save['local_body_id']= $data['local_body_id'];
                                $save['lb_vill_town_muni']= $data['lb_vill_town_muni'];
                                $save['cluster_id']=  $data['cluster_id'];
                                $save['panchayat_id']=  $data['panchayat_id'];
                                $save['lb_habitation_id']=  $data['lb_habitation_id'];
                                $save['assembly_id']=  $data['assembly_id'];
                                $save['parliament_id']=  $data['parliament_id'];
                                $save['municipal_id']=  $data['lb_vill_town_muni'];
                                //   $save['city_id']=  $data['city_id'];
                                $save['pincode']=  $data['pincode'];
                                $save['address']=  $data['address'];
                                $save['school_id']=  $data['school_id'];
                                $save['school_type']=  $data['school_type'];
                                $save['school_name']=  $data['school_name'];
                                $save['manage_cate_id']=  $data['manage_cate_id'];
                                $save['sch_management_id']=  $data['sch_management_id'];
                                $save['sch_mail']=  $data['sch_email'];
                                $save['sch_directorate_id']=  $data['sch_directorate_id'];
                                $save['rte']=  $data['rte'];
                                $save['minority']=  $data['minority_sch'];
                                $save['updation_user_id'] = $token['emis_user_id'];
                                $save['high_class']= $data['high_class'];
                                $save['low_class']= $data['low_class'];
                                // $save['renewal_valid']= $data['minority_sch'] == '1'  ? $data['minority_yr'].'-01-01' : NULL;
                                $save['renewal_valid']= $data['minority_sch'] == '1'  ? $data['minority_yr'] != NULL ? $data['minority_yr'].'-01-01' :NULL : NULL;
                                $save['last_renewal']= $data['yr_last_renwl'] != NULL ? $data['yr_last_renwl'] : NULL;
                                $save['certi_no']= $data['certifi_no'];
                                $save['schl_situated']= $data['schl_situated'];
                                $save['resid_scl']= $data['resid_schl'];
                                $save['resid_type']= $data['resid_schl'] == '1' ? $data['typ_resid_schl'] : NULL ;
                                $save['angan']= $data['anganwadi'];
                                $save['angan_code']= $data['anganwadi'] == '1' ? $data['anganwadi_center'] : NULL;
                                $save['anagan_wrks']= $data['anganwadi'] == '1' ? $data['angan_wrks'] : NULL;
                                $save['anganwadi_schl']= $data['anganwadi_schl'];
                                $save['anganwadi_stu_b']= $data['anganwadi'] == '1' ? $data['anganwadi_stu_b'] : NULL;
                                $save['anganwadi_stu_g']= $data['anganwadi'] == '1' ? $data['anganwadi_stu_g'] :NULL;
                                $save['schl_shift']= $data['shftd_schl'];
                                $save['schl_cwsn']= $data['cwsn_scl'];     
                                $save['block_id']= $data['block_id'];
                                $save['edu_dist_id']= $data['edu_dist_id'];
                                $save['sch_cate_id']= $data['sch_cate_id'];
                                $save['sch_shortname']= $data['sch_shortname'];
                                $save['minority_group']= $data['minority_sch'] == '1'  ? $data['minority_grp'] : NULL;
                                $save['ceo_comments']= $data['ceo_comments'];
                                $save['ceo_date']=date("Y-m-d");
                                $save['app_status']=0;
                                $Updated_ID = $this->Ceo_District_model->insert_school_district_data($save);
                                if($Updated_ID)
                                {
                                        $this->response(['dataStatus' => true,
                                                         'status' => REST_Controller::HTTP_OK,
                                                         'updatedId'=>$Updated_ID,
                                                         'message' =>'Details Saved. Waiting For Approval !!'],REST_Controller::HTTP_OK);
                                } 
                                else    $this->response(['dataStatus' => false,  
                                                         'status' => REST_Controller::HTTP_NOT_FOUND,
                                                         'message' =>'Data Not Found!'],REST_Controller::HTTP_OK);
                        }
                } else $this->response(['dataStatus' => false,
                                        'status' => REST_Controller::HTTP_NO_CONTENT,
                                        'message' => 'There is No Content For Update Please Try-again !'],REST_Controller::HTTP_OK);
        }else $this->response(['dataStatus'=>false,
                               'status'=>REST_Controller::HTTP_UNAUTHORIZED,
                               'message'=>'Access is denied due to Invalid Credentials (OR) Invaild User!'],REST_Controller::HTTP_OK); 
   }

   public function profile_status_schoollist_distwise_get(){
  
      $district_id = $this->input->get('district_id');
	   $school_type = $this->input->get('school_type');
     
      $profile_completion_status = $this->Ceo_District_model->block_profile_completion_status($district_id,$school_type);
      $schooltype= $this->Statemodel->school_type();
	  if($profile_completion_status)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['profile_completion_status'] = $profile_completion_status;
				$data['school_type'] = $schooltype;
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
	/**RTE Provision for CEO by wesley starts here**/
	public function RTE_districtwise_school_details_get()
    {
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
        $dist_id=$token['emis_user_id'];
		$emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin){
			//$dist_id = $this->session->userdata('district_id');
			$district_details = $this->Ceo_District_model->get_districtName($dist_id);
			$dist_id = $district_details->district_name;
			$school_cats = array('Un-aided','Fully Aided','Partially Aided');
			$data = $this->Ceo_District_model->get_RTE_districtwise_school_list($dist_id,$school_cats);
			if(!empty($data)){
				$this->response(['dataStatus' => true,
                      'status'  => REST_Controller::HTTP_OK,
                      'message' => 'Success',
                      'school_RTE_list'  => $data],REST_Controller::HTTP_OK);
			}else{
				$this->response(['dataStatus' => false,
                      'status'  => REST_Controller::HTTP_NOT_FOUND,
                      'message' => 'Data not found'],REST_Controller::HTTP_OK);
			}
			
		}else{ 
			$this->response(['dataStatus' => false,
			'status'  => REST_Controller::HTTP_OK,
			'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
		}

	}

	public function save_RTE_school_list_post()
    {
		$token = Common::userToken();
		$emis_loggedin=$token['status'];
		$records = $this->post('records');
		if($emis_loggedin){ 
			$data = $this->Ceo_District_model->save_RTE_school_list($records);
			if(!empty($data)){
				$this->response(['dataStatus' => true,
                      'status'  => REST_Controller::HTTP_OK,
                      'message' => 'Data updated successfully',
                      'school_RTE_list_id'  => $data],REST_Controller::HTTP_OK);
			}else{
				$this->response(['dataStatus' => false,
                      'status'  => REST_Controller::HTTP_NOT_FOUND,
                      'message' => 'Data not found'],REST_Controller::HTTP_OK);
			}

		}else{
			$this->response(['dataStatus' => false,
			'status'  => REST_Controller::HTTP_OK,
			'message' => 'Login to check the details'],REST_Controller::HTTP_OK);
		}
    }
	/**RTE Provision for CEO by wesley starts here**/
	 public function blocklist_schoollist_get(){
  
      $district_id = $this->input->get('district_id');
	   //$school_type = $this->input->get('school_type');
     
      $blocklist = $this->Ceo_District_model->getallblocksbydist($district_id);
      $schoollist= $this->Ceo_District_model->getallschoolsbyblock($district_id);
	  if($blocklist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['blocklist'] = $blocklist;
				$data['schoollist'] = $schoollist;
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
    /**RTE Provision for CEO by wesley starts here**/
   
	 public function teacherlist_get(){
  
      $school_id = $this->input->get('schoolid');
	   //$school_type = $this->input->get('school_type');
     
      $teacherlist = $this->Ceo_District_model->getTeacherlist($school_id);
     
	  if($teacherlist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherlist'] = $teacherlist;
				
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
	 public function teacherpindics_get(){
  
      $teacherid = $this->input->get('uid');
	   //$school_type = $this->input->get('school_type');
     
      $teacherpindics = $this->Ceo_District_model->getTeacherpindics($teacherid);
     
	  if($teacherpindics)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['teacherpindics'] = $teacherpindics;
				
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


//BY nIRMAL
        public function blocklist_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $district_id = $token['emis_user_id'];
    $emis_usertype = $token['emis_usertype'];

   if($emis_usertype == 3)
   {
     $blocklist = $this->Ceo_District_model->getallblocksbydist($district_id);
    
    if($blocklist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['blocklist'] = $blocklist;
      
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
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'INvalid TOken !!',],REST_Controller::HTTP_BAD_REQUEST);

     }
     
    
  }

   public function schoollist_by_DistrictWise_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];


   if($emis_usertype == 3)
   {
     $block_id =$this->get('block_id');
     $schoollist = $this->Ceo_District_model->getallschoolbydist($block_id);
    
    if($schoollist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['school_list'] = $schoollist;
      
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
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);

     }
     
    
  }
  public function SaveZonal_Schools_post()
  {
      $records = $this->post('records');

    if(!empty($records))
    {
      $data_save = $this->Ceo_District_model->Save_zonalSchools($records);
    
  
    if(!empty($data_save))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Saved SuccessFUlly !!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Unable To Save Data!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }

}
public function SaveZonal_Sub_Schools_post()
  {
      $records = $this->post();

    if(!empty($records))
    {
      $data_save = $this->Ceo_District_model->Save_zonal_Sub_Schools($records);
    
  
    if(!empty($data_save))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Saved SuccessFUlly !!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Unable To Save Data!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }

}
public function SaveBRTE_ZonalSchools_post()
{
  $records = $this->post('records');


    if(!empty($records))
    {
      $data_save = $this->Ceo_District_model->Save_zonal_BRTE_TECHER($records);
    
  
    if(!empty($data_save))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Saved SuccessFUlly !!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Unable To Save Data!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }

}
public function ZonalBased_SchoolTypes_get()
{
$zonal_id = $this->get('zonal_id');


    if(!empty($zonal_id))
    {
      $data_get= $this->Ceo_District_model->get_zonal_school_types($zonal_id);
    
  
    if(!empty($data_get))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Available!!';
                 $data['data'] = $data_get;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Unable To get Data!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }
}
public function BlockWIseZonalSubzonal_Count_get()
{
  $block_id = $this->get('block_id');


    if(!empty($block_id))
    {

      $zonal_schools= $this->Ceo_District_model->get_zonal_schools($block_id);
      $all_schools= $this->Ceo_District_model->get_all_schools($block_id);
      $zonal_subzonal_schools= $this->Ceo_District_model->get_zonal_sub_schools($block_id);

      $all_datas = array($zonal_schools,$all_schools,$zonal_subzonal_schools);
    
    if(!empty($all_datas))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Available!!';
                 $data['all_data'] = $all_datas;
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Unable To get Data!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }
}

public function delete_ZonalSchools_get()
{
  $school_id=$this->get('school_id');
  if(!empty($school_id))
    {
      $data_delete = $this->Ceo_District_model->Delete_zonal_Schools($school_id);
    
  
    if(!empty($data_delete))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Deleted SuccessFUlly !!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = 'Unable To Delete Data!!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }
}
public function delete_ZonalSubSchools_get()
{
  $school_id=$this->get('school_id');
  if(!empty($school_id))
    {
      $data_delete = $this->Ceo_District_model->Delete_zonal_SubSchools($school_id);
    
  
    if(!empty($data_delete))
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                 $data['msg'] = 'Data Deleted SuccessFUlly !!';
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = 'Unable To Delete Data!!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
  }
  else
  {
      $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NOT_FOUND;
                $data['msg'] = 'Params PAssed EMpty!!';
                $this->response($data,REST_Controller::HTTP_NOT_FOUND);
  }
}

public function GetZonal_Schools_get()
{
  $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];
    $dist_id = $token['emis_user_id'];
    $blck_id = $this->get('block_id');

   if($emis_usertype == 3)
   {
    if($blck_id!=''){
        $schoollist = $this->Ceo_District_model->getallZonalschool($blck_id);
    
        if($schoollist){
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['school_list'] = $schoollist;
      
                $this->response($data,REST_Controller::HTTP_OK);
        }else{
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
    }else{
        $data['dataStatus'] = false;
        $data['status'] = REST_Controller::HTTP_OK;
        $data['msg'] = 'Block_Id should not be empty!';
        $this->response($data,REST_Controller::HTTP_OK);
    }
    
   }else{
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_BAD_REQUEST,
                                 'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);
        }
}
public function GetSubZonal_Schools_get()
{
  $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];
    $dist_id = $token['emis_user_id'];

   if($emis_usertype == 3)
   {
    
     $subschoollist = $this->Ceo_District_model->getallSubZonalschool($dist_id);
    
    if($subschoollist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['sub_school_list'] = $subschoollist;
      
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
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);

     }
}
  public function Subschool_DistrictWise_get(){
    $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];
    

   if($emis_usertype == 3)
   {
     $school_id=$this->get('school_id');
   
     $subschoollist = $this->Ceo_District_model->getallsubschoolbydist($school_id);
    
    if($subschoollist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['sub_school_list'] = $subschoollist;
      
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
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);

     }
     
    
  }
  public function ZonalSchool_ByBlock_get(){
     $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];
    

   if($emis_usertype == 3)
   {
     $block_id=$this->get('block_id');
     if(!empty($block_id))
     {
     $schoollist = $this->Ceo_District_model->getzonalschoolbyblock($block_id);
    
    if($schoollist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['schoollist'] = $schoollist;
      
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
     }
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Param Missing !!',],REST_Controller::HTTP_BAD_REQUEST);
     }

     
   }
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);

     }
  }
  
   public function ZonalAll_ByBlock_get(){
     $token = Common::userToken();
    $emis_loggedin=$token['status'];
    $emis_usertype = $token['emis_usertype'];
    

   if($emis_usertype == 3)
   {
     $block_id=$this->get('block_id');
     if(!empty($block_id))
     {
     $schoollist = $this->Ceo_District_model->getzonalallbyblock($block_id);
    
    if($schoollist)
        {
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['schoollist'] = $schoollist;
      
                $this->response($data,REST_Controller::HTTP_OK);
        } 
     else
        {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = 'Data Not Found!';
                $this->response($data,REST_Controller::HTTP_OK);
        }
     }
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Param Missing !!',],REST_Controller::HTTP_BAD_REQUEST);
     }

     
   }
     else {
       $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Invalid Token !! Allow Only DC TOKEN',],REST_Controller::HTTP_BAD_REQUEST);

     }
  }

  // END BY NIRMAL
        
}	
  ?>