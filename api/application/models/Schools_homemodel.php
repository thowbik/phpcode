<?php

class Schools_homemodel extends CI_Model
{
    function __construct() 
	  {
      parent::__construct();
      $this->load->library('AWS_S3');
    }

    /** Also Refer Helper file */
    public function get_list_count($table,$count_var,$where)
	  { 
        return $this->db
                    ->select('count('.$count_var.') as count')
                    ->from($table)
                    ->where($where)
                    ->get()->first_row();
	  }

  /** Screen Name : School's Dashboard
   *  Purpose     : Students Schools classwise Details
   *  Done by     : MR Sriram/Venba.(28/01/2019)
   *  Controller  : Home/emis_school_dash
   */
    public function student_classwise($school_id)
    {
    
      $this->db->select('low_class,high_class');
      $result =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();     
      $select_arr = [];
      $select_len = [];
      $categorized= [];
      $inx = 0;
      if(!empty($result)){
       if($result->low_class == 15)
       {
          if($result->high_class!=13 && $result->high_class!=14 && $result->high_class!=15)
          {
            for($i=1;$i<=$result->high_class;$i++)
            {
                array_push($select_len, $i);
                array_push($select_arr, 'Prkg_b','Prkg_g','Prkg_t','lkg_b','lkg_g','lkg_t','ukg_b','ukg_g','ukg_t','c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
            }
          }else 
          {
            array_push($select_arr, '*');

          }
        }else if($result->low_class == 13)
        {   
          if($result->high_class!=14 && $result->high_class!=15 && $result->high_class!=13)
          {
            for($i=1;$i<=$result->high_class;$i++)
            {
              array_push($select_len, $i);
              array_push($select_arr,'lkg_b','lkg_g','lkg_t','ukg_b','ukg_g','ukg_t','c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
            }
          }else
          {
            array_push($select_arr,'*');
          }
        }else if($result->low_class !=0 && $result->high_class !=0)
        {
          for($i=$result->low_class;$i<=$result->high_class;$i++)
          {
            // array_push($select_len, $i);
            array_push($select_arr, 'c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
          }
        }else
        {
          // echo "else";
          array_push($select_arr,'*');
        }
      }
      
      $select_query = implode(",", $select_arr);
      
      $this->db->select($select_query);
      
      $school_details =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
      // print_r($school_details);
      // die();
      $tempArr_len = [];
      if($result->low_class ==15)
      {
         $tempArr_len['low_class'] = 1;
         $tempArr_len['high_class'] = $result->low_class; 
      }else if($result->low_class ==13)
      {
         $tempArr_len['low_class'] = 1;
         $tempArr_len['high_class'] = $result->low_class;
      }else
      {
         $tempArr_len['low_class'] = $result->low_class;
         $tempArr_len['high_class'] = $result->high_class;
      }
      //  echo $result->low_class;
      //  echo $result->high_class;
      //  die();
      for($i=$tempArr_len['low_class'];$i<=$tempArr_len['high_class'];$i++)
      {
       switch($i){
        case 13 : //lkg : 
         $boys = 'lkg_b';
         $girls = 'lkg_g';
         $transgender = 'lkg_t';
         break;
        case 14:  //ukg : 
         $boys = 'ukg_b';
         $girls = 'ukg_g'; 
         $transgender = 'ukg_t'; 
         break;
        case 15:  //pre-kg : 
         $boys = 'Prkg_b';
         $girls = 'Prkg_g'; 
         $transgender = 'Prkg_t'; 
         break;
        default:
         $boys = 'c'.$i.'_b';
         $girls = 'c'.$i.'_g'; 
         $transgender = 'c'.$i.'_t'; 
        break;
       }
       $classes_in_roman = ['0','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII','LKG','UKG','PRE KG'];
       $categorized[$inx]['body_type'] = $classes_in_roman[$i];
       $categorized[$inx]['class'] = $i;
       $categorized[$inx]['boys'] = $school_details->$boys;
       $categorized[$inx]['girls'] =  $school_details->$girls;
       $categorized[$inx]['transgenders'] =  $school_details->$transgender;
       $categorized[$inx]['total'] =  $school_details->$boys+$school_details->$girls+$school_details->$transgender;
       //  echo $inx;
        $inx++;
      }
     $school_over_all_details['school_details'] = $school_details;
     // $school_over_all_details['select_len'] = $select_len; 
     $school_over_all_details['result'] = $tempArr_len;
     $school_over_all_details['categorized_class_details'] = $categorized;
     // print_r($school_over_all_details);die;
     return $school_over_all_details;
    }

    public function school_students_count($school_id){
      return $this->db
        ->select('total_b as total_boys,total_g as total_girls,total_t as total_transgenders,total')
        ->get_where('students_school_child_count',array('school_id'=>$school_id))
        ->first_row();
    } 

    public function school_teachers_count($school_id){
      return $this->db
      ->select('count(case when gender = 1 then 1 else null end) as total_gents,
                count(case when gender = 2 then 1 else null end) as total_ladies,
                count(case when gender = 3 then 1 else null end) as total_transgenders,
                count(teacher_code) as total')
      ->get_where('udise_staffreg',array('school_key_id'=>$school_id,'archive'=>1))
      ->first_row();

    }

    public  function pending_student_transfer_count($schoolid){   
        $this->db->select('count(a.unique_id_no) as pending_student_transfer_count');
        $this->db->from('students_child_detail a');
        $this->db->join('students_school_child_count b','b.udise_code = a.request_id');
        $this->db->where('a.school_id',$schoolid);
        $this->db->where('a.transfer_flag',0);
        $this->db->where('a.request_flag','1');
        $result = $this->db->get()->first_row();
        return $result;

    }

    public function get_school_student_attendance($school_id){

      $date = date('Y-m-d');
      // $school_id = $this->session->userdata('emis_user_id');
      $this->db->select('sum(session1_femaleA) fe_present,sum(session1_maleA) ma_present,school_id')
               ->from('students_attend_daily')
               ->where('date',$date)
               ->where('school_id',$school_id);
      $result = $this->db->get()->first_row();
      return $result;
    }

    public function emis_school_staff_details($school_id)
    {
      $this->db->select('teach_mle as Teaching_male, teach_fmle as Teaching_female, nonteach_mle as nonteach_male, nonteach_fmle as nonteach_female, teach_hm_mle as HM_male, teach_hm_fmle as HM_female, 
                         teach_bt_mle as BT_male, teach_bt_fmle as BT_female, teach_pg_mle as PG_male, 
                         teach_pg_fmle as PG_female, teach_sg_mle as SG_male, teach_sg_fmle as SG_female,
                         teach_spt_ml as SPT_male, teach_spt_fml as SPT_female, teach_pet_ml as PET_male, teach_pet_fml as pet_female, teach_pd_ml as PD_male,
                         teach_pd_fml as PD_female, teach_voc_ml as VOC_male, teach_voc_fml as VOC_female, 
                         teach_comp_ml as COMP_male, teach_comp_fml as COMP_female, 
                         teach_othr_mle as Others_male, teach_othr_fmle as Others_female')
               ->from('teacher_profile_count')
               ->where('school_key_id',$school_id);
      $arr = $this->db->get()->first_row();
      $result['staff_details'] = $arr;
    // print_r($result);
      $inx = 0;
      foreach($arr as $key => $value){
        $str_arr = explode("_",$key); 
        $categorized[$inx]['body_type'] = $str_arr[0] == 'nonteach' ? 'Non Teaching' : $str_arr[0];
        if($str_arr[1] == "male"){ 
          $categorized[$inx][$str_arr[1]] = $value; 
          $categorized[$inx]['total'] = $value;
        }
        else if($str_arr[1] == "female"){ 
          $categorized[$inx][$str_arr[1]] = $value;   
          $categorized[$inx]['total'] += $value;
          $inx = $inx+1;
        }

      }
      $result['categorized_staff_details'] = $categorized;
       return $result ;
     
    }

  /** Screen Name : School's Dashboard
   *  Purpose     : Schoolwise Community
   *  Done by     : MR Sriram/Venba.(23/01/2019)
   *  Controller  : Home/emis_school_dash
   */
    public function get_dash_schoolwise_community($school_id)
    {
      return $this->db
                ->select('bc,mbc,st,sc,oc,dnc')
                ->from('students_school_child_count')
                ->where('school_id',$school_id)
                ->get()
                ->first_row();

    }

    public function get_schoolwise_aadhaardetails($school_id)
    {
      $this->db->select('count(*) as aadhaar_not_update');
      $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'aadhaar_uid_number'=>'','transfer_flag'=>'0'))->first_row();
      return $result;
    }

    public function get_schoolwise_bloodgroupdetails($school_id)
    {
      $this->db->select('count(*) as blood_not_update');
      $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'bloodgroup'=>'','transfer_flag'=>'0'))->first_row();
      return $result;
    }

   
	  
	public function get_flash_news_data($school_id,$user_type_id,$district_name,$block_id,$school_type,$cate_type){
		$sql = "select schoolnew_flashnews.district_name,schoolnew_flashnews.block_name,authority,schoolnew_flashnews.school_type,schoolnew_flashnews.cate_type,title,content,created_by,created_type_id,created_date,schoolnew_flashnews.updated_date,user_type from schoolnew_flashnews
 join user_category on user_category.id=schoolnew_flashnews.created_type_id
 join students_school_child_count on students_school_child_count.district_name=schoolnew_flashnews.district_name
 where authority=".$user_type_id." and students_school_child_count.district_name='".$district_name."' and students_school_child_count.block_id='".$block_id."' and FIND_IN_SET('".$school_type."',schoolnew_flashnews.school_type) !=0
 and FIND_IN_SET('".$cate_type."',schoolnew_flashnews.cate_type) !=0 and students_school_child_count.school_id=".$school_id." group by schoolnew_flashnews.updated_date order by schoolnew_flashnews.id desc limit 5;";
		//echo $sql; die();
		$query = $this->db->query($sql);
		return $query->result_array(); 
	}
  
  
  
      public function get_flash_field_data($school_id)
      {
  
        $this->db->select('sum(db_count) as count,content,db_field')
                 ->from('schoolnew_flashfield')
                 ->where('school_key_id',$school_id)
                 ->group_by('content,db_field');
  
          $result = $this->db->get()->result();
          return $result;
  
      }
  
    

      /**
      * Get Teacher Password Details
      * VIT-sriram
      * 08/03/2019
      **/

      public function get_teacher_password_reset($school_id)
      { 

          $this->db->select('a.*,b.teacher_name,b.gender,b.mbl_nmbr,b.email_id,b.u_id')
                   ->from('emis_userlog a')
                   ->join('udise_staffreg b','b.school_key_id = a.school_id and b.teacher_code = a.emis_user')
                   ->where('a.school_id',$school_id)
                   ->where('a.reset_flag',1);
          $result = $this->db->get()->result();
          return $result;


      }


      public function update_teacher_password_reset($update)
      {

        $this->db->where('id',$update['id']);
        $this->db->update('emis_userlog',$update);
        // print_r($this->db->last_query());
        return $this->db->affected_rows();

      }


      public function update_login_details($update_det,$table)
      {
          $this->db->where('emis_user_id',$update_det['emis_user_id']);
          $this->db->update($table,$update_det);

          $update_data =  $this->db->affected_rows(); 
          // echo $update_data;
          
            $get_old_pass = $this->get_user_old_password($update_det['emis_user_id'],$table);

            return $get_old_pass;
          
      }


      public function get_user_old_password($u_id,$table){
      $this->db->select('ref');
    $result = $this->db->get_where($table,array('emis_user_id'=>$u_id))->first_row();
    // print_r($this->db->last_query());
    return $result;
  }

    public function get_school_details()
    {
        $school_id = $this->session->userdata('emis_user_id');
        $this->db->select('sch_email');
       $school_details =  $this->db->get_where('schoolnew_basicinfo',array('school_id'=>$school_id))->first_row();
       return $school_details;
    }


    /**
    * Get RTI Studnets Schoolwise
    * VIT-sriram
    * 11/03/2019
    **/

    public function get_RTI_Students_list($school_id)
    {
		
			$sql ="SELECT name, gender, dob, community_id, class_studying_id, unique_id_no, class_section, child_admitted_under_reservation ,rte_type,community_name,category,sub_category from students_child_detail 
             LEFT JOIN baseapp_community ON students_child_detail.community_id = baseapp_community.id
             LEFT JOIN baseapp_rte_type ON baseapp_rte_type.id   =students_child_detail.rte_type
             WHERE child_admitted_under_reservation = 'Yes' AND school_id = ".$school_id." AND  unique_id_no is not null AND transfer_flag=0";
      $query = $this->db->query($sql);
			return $query->result(); 

    }
     public function get_RTI_Students_list1($class_id,$section_id,$school_id)
    {

        if(!empty($class_id))
        {
          $this->db->where('class_studying_id',$class_id);
        }

        if(!empty($section_id))
        {
            $this->db->where('class_section',$section_id);
        }

        $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'child_admitted_under_reservation'=>'Yes'))->result();

        return $result;

    }

    public function student_invalid_aadhar_no($school_id)
    {
      //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
      $sql="select unique_id_no,aadhaar_uid_number,sum(((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12))) as cnt from students_child_detail where school_id=".$school_id." and  transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12))";
      $query = $this->db->query($sql);
      //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
    }

    public function student_invalid_aadhar_no_list($school_id)
    {
      //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
      $sql="select * from students_child_detail where school_id=".$school_id." and transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12)) GROUP BY unique_id_no";
      $query = $this->db->query($sql);
      //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
    }

    public function student_invalid_phn_no($school_id)
    {
      //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
      $sql="select sum((length(phone_number)<>10 or left(phone_number,1)<6)) as cnt from students_child_detail where  transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and school_id=".$school_id."";
      $query = $this->db->query($sql);
      //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
    }

    public function student_invalid_phn_no_list($school_id)
    {
      //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
      $sql="select * from students_child_detail where  transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and school_id=".$school_id."";
      $query = $this->db->query($sql);

      //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
    }

    /***************************************************** DASHBOARD Ends Here  **********************************************/
    public function get_single_list($table,$where)
    {
            $result = $this->db->get_where($table,$where)->first_row();
            return $result;
    }
       /**
        * Get All Table Details
        * VIT-sriram
        * 13/03/2019
        **/
        public function get_common_table_details($table,$where='')
        {           
          if(!empty($where))
          {
            // $where =implode(",",$where);die;
                $this->db->where($where[0],$where[1]);
          }
          return $this->db->get($table)->result();
          // print_r($this->db->last_query());
        }

        function getallmediumofinst($school_id){
       
        
            $this->db->select('b.*')
                     ->from('schoolnew_mediumentry a')
                     ->join('schoolnew_mediumofinstruction b','b.MEDINSTR_ID = a.medium_instrut')
                     ->where('school_key_id',$school_id);
            $result = $this->db->get()->result();
            // print_r($this->db->last_query());
            return $result;
            
        }

        function getrte_type(){
            $query ="select concat(category,'-',sub_category)as cate,id from 
                   baseapp_rte_type ";
                   $result = $this->db->query($query)->result();
                   return $result;
             }

    
    public function get_classwise_section($class_id,$school_id)
    {
        $result = $this->db->get_where('schoolnew_section_group',array('class_id'=>$class_id,'school_key_id'=>$school_id))->result_array();   
        return $result;
    }

    public function get_schoolwise_class_section($school_id)
    {
        $this->db->select("a.school_key_id,a.class_id,b.class_studying,group_concat(a.section order by a.section) as revalent_section")
                 ->from('schoolnew_section_group a')
                 ->join('baseapp_class_studying b','b.id = a.class_id','left')
                 ->where('a.school_key_id',$school_id)
                 ->group_by('a.class_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function get_schoolwise_classes($school_id)
    {
     
      $this->db->select('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
               ->from('students_school_child_count')
               ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
               ->where('school_id',$school_id)
               ->group_by('class_id');

            $result = $this->db->get()->result();
            return $result;
    }
    
    public function get_classwise_student_details($class_id,$section_id,$school_id,$basetbl)
    {
      // echo $school_id;
      // echo $basetbl;
      // die();
      $this->db->select('basetbl.id,
                basetbl.name,
                basetbl.name_tamil,
                basetbl.name_id_card,
                basetbl.name_tamil_id_card,
                basetbl.aadhaar_uid_number,
                basetbl.gender,
                basetbl.dob,
                basetbl.community_id,
                basetbl.religion_id,
                basetbl.mothertounge_id,
                basetbl.phone_number,
                basetbl.differently_abled,
                basetbl.disadvantaged_group,
                basetbl.subcaste_id,
                basetbl.house_address,
                basetbl.pin_code,
                basetbl.mother_name,
                basetbl.mother_occupation,
                basetbl.father_name,
                basetbl.father_occupation,
                basetbl.student_admitted_section,
                basetbl.group_code_id,
                basetbl.education_medium_id,
                basetbl.district_id,
                basetbl.unique_id_no,
                basetbl.school_id,
                basetbl.transfer_flag,
                basetbl.class_studying_id,
                baseapp_class_studying.class_studying,
                basetbl.class_section,
                basetbl.school_admission_no,
                basetbl.guardian_name,
                basetbl.mother_name_tamil,
                basetbl.father_name_tamil,
                basetbl.guardian_name_tamil,
                basetbl.parent_income,
                basetbl.street_name,
                basetbl.area_village,
                basetbl.doj,
                basetbl.email,
                basetbl.prv_class_std,
                basetbl.child_admitted_under_reservation,
                basetbl.bloodgroup,
                basetbl.photo,
                basetbl.request_flag,
                basetbl.request_date,
                basetbl.request_id,
                basetbl.rte_type,
                a.occu_name as father_occ,
                b.occu_name as mother_occ,
                schoolnew_mediumofinstruction.MEDINSTR_DESC,
                schoolnew_district.district_name,
                baseapp_bloodgroup.group,
                baseapp_parentincome.income_value,
                baseapp_religion.religion_name,basetbl.father_qualify, basetbl.mother_qualify, basetbl.guardian_qualify,
                baseapp_sub_castes.caste_name'); 
     $this->db->from($basetbl.' basetbl');
     $this->db->join('baseapp_bloodgroup','baseapp_bloodgroup.id = basetbl.bloodgroup','left')
              ->join('baseapp_occupation a','a.id = basetbl.father_occupation','left')
              ->join('baseapp_occupation b','b.id = basetbl.mother_occupation','left')
              ->join('baseapp_parentincome','baseapp_parentincome.id = basetbl.parent_income','left')
              ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = basetbl.education_medium_id','left')
              ->join('schoolnew_district','schoolnew_district.id = basetbl.district_id','left')
              ->join('baseapp_religion','baseapp_religion.id = basetbl.religion_id','left')
              ->join('baseapp_sub_castes','baseapp_sub_castes.id = basetbl.subcaste_id','left')
              ->join('baseapp_class_studying','baseapp_class_studying.id = basetbl.class_studying_id','left');
     if(!empty($class_id)){
        $this->db->where('class_studying_id', $class_id); 
     }
     if(!empty($section_id)){
        $this->db->where('class_section', $section_id); 
     }
     if(!empty($school_id)){
        $this->db->where('school_id',$school_id);
     }
     $this->db->where('transfer_flag',0);
     $this->db->order_by('class_studying_id', 'ASC');
     $this->db->order_by('class_section', 'ASC');
     $this->db->order_by('basetbl.name', 'ASC');

     $result =  $this->db->get()->result();
     // print_r($this->db->last_query());
     // die();
     return $result;
     

     /*$sql="select * from students_child_detail join schoolnew_section_group on schoolnew_section_group.id=students_child_detail.class_section where class_studying_id=".$class_id." and class_section=".$section_id." and school_id=".$school_id." and transfer_flag=0";
     $query = $this->db->query($sql);
     return $query->result_array(); */
    }
    function getallsection($schoolkeyid,$class){
        $this->db->select('*')
            ->from('schoolnew_section_group')
            ->where('school_key_id',$schoolkeyid) 
           ->where('class_id',$class);  
                    
       $query = $this->db->get(); 
       return $query->result();     
       // return $query->row('section');
  
    }

    function getallclasssections($school_id ){
       

      $this->db->select('schoolnew_section_group.id,schoolnew_section_group.class_id,schoolnew_section_group.section,schoolnew_section_group.group_id,schoolnew_section_group.school_type,schoolnew_section_group.school_medium_id,schoolnew_mediumofinstruction.MEDINSTR_DESC,baseapp_group_code.group_name') 
      ->from('schoolnew_section_group')
      ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_section_group.school_medium_id','left')
      ->join('baseapp_group_code ','baseapp_group_code.id=schoolnew_section_group.group_id','left')
      ->where('schoolnew_section_group.school_key_id',$school_id)
  //->group_by('schoolnew_section_group.group_id')
      ->order_by('schoolnew_section_group.class_id', 'ASC');
  //->limit('5');

      $query =  $this->db->get();
  //print_r($this->db->last_query());die;
  return $query->result();
  
  }
  
   
  public function student_ied_benefits()
  {    $sql ="SELECT id, benefit, isactive FROM student_ied_benefits;";
     $query = $this->db->query($sql);
      return $query->result();
  }
public function student_present_status()
  {    $sql ="select id,child_status from baseapp_osc";
     $query = $this->db->query($sql);
      return $query->result();
  }
   public function baseapp_rte_type()
        {
      $sql= "SELECT  id,category,sub_category FROM baseapp_rte_type";
          $query = $this->db->query($sql);
              return $query->result();
        }
    public function baseapp_differently_abled()
        {
        $sql= "select da_code,da_name from  baseapp_differently_abled";
        $query = $this->db->query($sql);
            return $query->result();
    }
	 public function dropdown_dtls($select,$tname)
  {    
            $this->db->select($select);
            $this->db->from($tname);
            $this->db->where('isactive',1);
            $query =  $this->db->get();
            return $query->result();
    }
	function getscheme_trstse_all($school_id)
  {
    $this->db->select('student_scholor_trstse.id,student_scholor_trstse.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        $this->db->from('student_scholor_trstse');
    $this->db->join('students_child_detail','student_scholor_trstse.student_id = students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_trstse.school_id');
    $this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
     
        $query = $this->db->get();
        $result = $query->result();
        return $result;
  }
   function getsports_list()
  {
    $this->db->select('*');
        $this->db->from('schoolnew_sport_list');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    
  }
  function game_participating_level()
  {
    $this->db->select('*');
        $this->db->from('schoolnew_game_participating_level');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
  }
   public function getClassDetail1($school_id) {
    
        $this->db->select('DISTINCT(schoolnew_section_group.class_id) AS value,schoolnew_section_group.no_of_periods as periods,schoolnew_section_group.section,schoolnew_section_group.id');
        $this->db->from('schoolnew_section_group');
     //$this->db->join('schoolnew_timetable_configuration','schoolnew_section_group.class_id = schoolnew_timetable_configuration.class_id and schoolnew_section_group.school_key_id=schoolnew_timetable_configuration.school_id','LEFT');
        $this->db->where('schoolnew_section_group.school_key_id', $school_id);
    $this->db->group_by('schoolnew_section_group.class_id');
    $this->db->order_by('schoolnew_section_group.class_id');
        $query = $this->db->get();
        $result = $query->result();
     // print_r($this->db->last_query());
        return $result;
       }
       /** contribution Details Created by : nirmal/venba **/
       public function kt_contribtion_details($school_id)
  {

     $this->db->select('*'); 
     $this->db->from('csr_kt_contributions');
     $this->db->where('fk_school_id',$school_id);
     $this->db->where('kt_id !=',null);

    //  foreach($org_id as $org)
    // {    // where $org is the instance of one object of active record
    //      $this->db->or_where('company.id',$org);
    // }
     $this->db->order_by("kt_id","desc");
     $query = $this->db->get();
 
     $kt_contribute = $query->result_array();
    
    
  foreach ($kt_contribute as $key => $value) 
  {
  //echo $value->kt_id;
    //print_r($value);
    if(($value['con_type']) == '1')
    {
      
       $this->db->select('*'); 
     $this->db->from('csr_kt_books');
      $this->db->where('kt_con_id',$value['kt_id']);
      $querys = $this->db->get();
      $kt_books = $querys->result_array();
   
    // array_push($result[$key],$results); 
     $kt_contribute[$key]['kt_books'] = $kt_books;
       
     
    }

    if(($value['con_type']) == '2')
    {
      
       $this->db->select('*'); 
     $this->db->from('csr_kt_devices');
      $this->db->where('kt_con_id',$value['kt_id']);
      $querys = $this->db->get();
      $kt_device = $querys->result_array();
   
     //array_push($result[$key],$results); 
      $kt_contribute[$key]['kt_volunteer_info'] = $kt_device;
     
       
     
    }

    if(($value['con_type']) == '3')
    {
      
       $this->db->select('*'); 
     $this->db->from('csr_volunteer_info');
      $this->db->where('fk_kt_id',$value['kt_id']);
      $querys = $this->db->get();
      $kt_volunteer_info = $querys->result_array();
     
     //array_push($result[$key],$results); 
      $kt_contribute[$key]['kt_volunteer_info'] = $kt_volunteer_info;
     
       
     
    }
    
    
   
  }
  
   return $kt_contribute;
   
  }

  
  public function Teacher_subject($subject_id)
  {

    foreach ($subject_id as $subject_key => $subject_value) {
   
    
     $this->db->select('*'); 
     $this->db->from('teacher_subjects');
      
     $this->db->where_in('id',$subject_value);
     $this->db->where('id !=',null);
     $query = $this->db->get();
      
     $kt_subject_list = $query->result_array();
  
  
     return $kt_subject_list;
   
  }
}
//school Conributions

public function contribution_details($school_id)
  {
   $this->db->select('csr_contributions.cont_type,csr_contributions.payment_mode,csr_material_master.material_name,csr_contributions.payment_mode,csr_contributions.mode_of_deposit,csr_contributions.amount,csr_contributions.status,csr_contribution_details.cont_id,csr_user.name,csr_user.mobile,csr_txn_details.merchant_txn_id');

     $this->db->from('csr_contributions');

     $this->db->join('csr_contribution_details','csr_contribution_details.cont_id = csr_contributions.id','left');
     $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_contribution_details.school_id','left');
     $this->db->join ('csr_school_requirements','csr_school_requirements.id = csr_contribution_details.req_id','left');
     $this->db->join ('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id','left');
     $this->db->join ('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');

     $this->db->join ('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
     $this->db->join('csr_user','csr_user.id = csr_contributions.user_id','left');
     $where = "(csr_contributions.status='FUNDS_RECEIVED' or csr_contributions.status = 'MAT_RECEIVED')";
   $this->db->join('csr_txn_details','csr_txn_details.con_id =  csr_contributions.id and csr_txn_details.user_id =csr_user.id','left');

     $this->db ->where($where);   
    $this->db ->where('csr_contribution_details.school_id',$school_id);
   
     $query = $this->db->get();

     return $query->result_array();
  }

public function contribution_wise_details($cont_id)
  {
   $this->db->select('csr_contribution_details.id,csr_contributions.cont_type,csr_contributions.payment_mode,csr_contributions.payment_ref,csr_contributions.payment_date,csr_contributions.gen_dev_fund_remarks,csr_contributions.payment_mode,csr_contributions.mat_delivery_point,csr_contributions.mat_delivery_date,csr_contributions.bank_branch,csr_contributions.mode_of_deposit,csr_contributions.cheque_drop_address,csr_contributions.amount,csr_contribution_details.qty,csr_contributions.status,csr_contribution_details.cont_id,csr_material_master.material_name,csr_category_master.cat_name,csr_subcategory_master.sub_cat_name,csr_user.name');

     $this->db->from('csr_contributions');

     $this->db->join('csr_contribution_details','csr_contribution_details.cont_id = csr_contributions.id','left');
     $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_contribution_details.school_id','left');
     $this->db->join ('csr_school_requirements','csr_school_requirements.id = csr_contribution_details.req_id','left');
     $this->db->join ('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id','left');
     $this->db->join ('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');

     $this->db->join ('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
     $this->db->join('csr_user','csr_user.id = csr_contributions.user_id','left');



    
       $this->db->where('csr_contribution_details.id',$cont_id);

     
   
     $query = $this->db->get();

     return $query->result_array();
  }


public function contribution_school_wise_details($cont_id)
{
  $this->db->select('csr_contribution_details.qty,csr_contributions.amount,students_school_child_count.school_name,students_school_child_count.district_name,csr_material_master.material_name as requirement,csr_contribution_details.qty,csr_contributions.status,csr_contribution_details.cont_id');

     $this->db->from('csr_contributions');

     $this->db->join('csr_contribution_details','csr_contribution_details.cont_id = csr_contributions.id','left');
     $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_contribution_details.school_id','left');
     $this->db->join ('csr_school_requirements','csr_school_requirements.id = csr_contribution_details.req_id','left');
     $this->db->join ('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id','left');
     $this->db->join ('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');

     $this->db->join ('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
     $this->db->join('csr_user','csr_user.id = csr_contributions.user_id','left');
    $this->db ->where('csr_contribution_details.id',$cont_id);
   
     $query = $this->db->get();

     return $query->result_array();
}




//*********************************************school requirements**************



public function school_req_details($school_id)
  {
       $this->db->select('csr_school_requirements.id as fk_req_id,csr_material_master.cost_per_unit as amount,csr_school_requirements.qty,csr_material_master.material_name,csr_category_master.cat_name,csr_subcategory_master.sub_cat_name,csr_school_requirements.school_id,students_school_child_count.school_name,students_school_child_count.edu_dist_name,students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.udise_code,students_school_child_count.category,students_school_child_count.school_type');

       $this->db->from('csr_school_requirements');
      
       $this->db->join ('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id','left');
       $this->db->join ('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');

       $this->db->join ('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
    
      $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_school_requirements.school_id','left');

     
    
    $this->db->order_by("csr_school_requirements.id", "desc");
    $this->db ->where('csr_school_requirements.school_id',$school_id);
   
     $query = $this->db->get();

     return $query->result_array();
  }

  //requirement id wise select query (by common function)
  
public function get_requirement_wise_or_school_wise_details($school_id,$req_id)
{

  $this->db->select('DATE_FORMAT(csr_school_req_updates.updated_on,"%d-%m-%Y") as updated_on,csr_school_requirements.id as fk_req_id,csr_material_master.cost_per_unit as amount,csr_school_requirements.qty,csr_material_master.material_name,csr_category_master.cat_name,csr_subcategory_master.sub_cat_name,csr_school_requirements.school_id,csr_school_req_updates.id,csr_school_req_updates.update_status,csr_school_req_updates.img_url_1,csr_school_req_updates.img_url_2,csr_school_req_updates.img_url_3');
    
   

     $this->db->from('csr_school_requirements');
      
       $this->db->join ('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id','left');
     $this->db->join ('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');

     $this->db->join ('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
    
      $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_school_requirements.school_id','left');
      $this->db->join ('csr_school_req_updates','csr_school_req_updates.fk_req_id = csr_school_requirements.id','left');

     
    
    $this->db ->order_by("csr_school_req_updates.id", "desc");
    $this->db ->where('csr_school_req_updates.created_by',$school_id);
	$this->db ->where('csr_school_req_updates.fk_req_id',$req_id);
	$this->db ->where('csr_school_req_updates.isactive',1);

   
     $query = $this->db->get();


     
    
     $get_all_details = $query->result_array();
    
 

   foreach ($get_all_details as $key => $value) 
    {
   


      $image_1 = 'https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/csr_photos/'.'req_'.$value['fk_req_id'].'/'.'update_'.$value['id'].'/'.$value['img_url_1'];
      $image_2 = 'https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/csr_photos/'.'req_'.$value['fk_req_id'].'/'.'update_'.$value['id'].'/'.$value['img_url_2'];
      $image_3 = 'https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/csr_photos/'.'req_'.$value['fk_req_id'].'/'.'update_'.$value['id'].'/'.$value['img_url_3'];
       
      $get_all_details[$key]['img_url_1'] = $image_1;
      $get_all_details[$key]['img_url_2'] = $image_2;
      $get_all_details[$key]['img_url_3'] = $image_3;

     }
       return $get_all_details;
}


  public function school_By_req_id_details($school_id,$req_id)

  {
   
    return $this->get_requirement_wise_or_school_wise_details($school_id,$req_id);
   
    
    
 }
 public function save_school_requirements($data)
 {
 
        
      $this->db->insert('csr_school_requirements',$data);
      
     
     
 } 
 public function update_school_requirements($school_req_details)
 {
 $id=$school_req_details['id'];

 $param = array('mat_id' =>$school_req_details['mat_id'],'cat_id'=>$school_req_details['cat_id'],'cat_id'=>$school_req_details['cat_id'],'qty' =>$school_req_details['qty'] );

    $this->db->where('mat_id',$id);
   $this->db->update('csr_school_requirements',$param);
  
   
   
 }

  public function need_school_req_details()
  {
     $this->db->select('csr_material_master.material_name,csr_material_master.id as mat_id,csr_category_master.cat_name as cat_name,csr_subcategory_master.sub_cat_name as sub_cat_name,csr_material_master.sub_cat_id,csr_material_master.cat_id');
     
     $this->db->from('csr_material_master');
	 $this->db->join('csr_category_master','csr_category_master.id = csr_material_master.cat_id','left');
	 $this->db->join('csr_subcategory_master','csr_subcategory_master.id = csr_material_master.sub_cat_id','left');
	
      
     $query = $this->db->get();
	

   //print_r($this->db->last_query());// die;
     
    
     $get_all_details = $query->result_array();

    $this->db->select('csr_category_master.cat_name,csr_category_master.id as cat_id');
     
    
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_category_master');
     $query = $this->db->get();

   
     $get_all_details_data = $query->result_array();


    $this->db->select('csr_subcategory_master.sub_cat_name,csr_subcategory_master.cat_id,csr_subcategory_master.id as sub_cat_id');
     
    

     $this->db->from('csr_subcategory_master');
     $query = $this->db->get();

   
     $get_all_details_data_last = $query->result_array();

$merge_all_details = array('material_master' =>  $get_all_details,'category_master' => $get_all_details_data,'sub_category' =>$get_all_details_data_last );

     return $merge_all_details;
  }


public function Total_school_requirements($school_id)
{

  $sql="SELECT  sum(b.qty*c.cost_per_unit) as req_amount,sum(a.qty*a.amount) as received_amt,convert_tz(d.`updated_date`,'+00:00','+05:30') as time,ccc.cont_type,a.`cont_id`,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type,a.`status`FROM csr_contribution_details a
LEFT JOIN csr_school_requirements b ON a.`req_id` = b.`id`
LEFT JOIN csr_material_master c ON b.`mat_id` = c.`id`
LEFT JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
LEFT JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
LEFT JOIN csr_contributions ccc ON a.cont_id = ccc.id
LEFT JOIN csr_user u ON ccc.user_id = u.id
LEFT JOIN csr_user_org org ON u.id = org.user_id 
WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and b.school_id = $school_id";

     $sql = $this->db->query($sql);
       return $sql->result();
}


 public function save_school_contribution($school_cont_details)
 {
     $this->db->insert(CSR_CONTRIBUTIONS,$school_cont_details);
 }

 public function update_school_contribution($school_cont_details)
 {
  $this->db->update(CSR_CONTRIBUTIONS, $school_cont_details,array('id'=>$school_cont_details['id']));
  
 }
 public function update_school_child_contribution($school_cont_details)
 {
   $this->db->update('csr_contribution_details',$school_cont_details,array('cont_id'=>$school_cont_details['cont_id']));
 }

 public function save_school_requirements_updates($save_img_details)
 {

 $this->db->insert('csr_school_req_updates',$save_img_details);
     // $keyname = 'tnschoolsawsphoto/csr_photos/'.'req_'.$updates_data['req_id'].'/'.'update_'.$updates_data['id'].'/'.$updates_data['img_url_1'];
 }

	   
  /** contribution Details Ends Created by : nirmal/venba **/

  /**School summary api starts here by wesley*/
  
  public function school_summary($user_type,$where){
    
    $sql="select district_name as District,block_name,edu_dist_name,school_name,
    sum(case when school_type_id = 1 and cate_type = 'Pre-Primary School'then 1 else 0 end) as Govt_Pre_Primary_School,
    sum(case when school_type_id = 1 and cate_type = 'Primary School'then 1 else 0 end) as Govt_Primary_School,
    sum(case when school_type_id = 1 and cate_type = 'Middle School' then 1 else 0 end) as Govt_Middle_School,
    sum(case when school_type_id = 1 and cate_type = 'High School' then 1 else 0 end) as Govt_High_School,
    sum(case when school_type_id = 1 and cate_type = 'Higher Secondary School' then 1 else 0 end) as Govt_Higher_Secondary,
    sum(case when school_type_id = 2 and cate_type = 'Pre-Primary School'then 1 else 0 end) as Aid_Pre_Primary_School,
    sum(case when school_type_id = 2 and cate_type = 'Primary School'then 1 else 0 end) as Aid_Primary_School,
    sum(case when school_type_id = 2 and cate_type = 'Middle School' then 1 else 0 end) as Aid_Middle_School,
    sum(case when school_type_id = 2 and cate_type = 'High School' then 1 else 0 end) as Aid_High_School,
    sum(case when school_type_id = 2 and cate_type = 'Higher Secondary School' then 1 else 0 end) as Aid_Higher_Secondary,
    sum(case when school_type_id = 3 and cate_type = 'Pre-Primary School'then 1 else 0 end) as Unaided_Pre_Primary_School,
    sum(case when school_type_id = 3 and cate_type = 'Primary School'then 1 else 0 end) as Unaided_Primary_School,
    sum(case when school_type_id = 3 and cate_type = 'Middle School' then 1 else 0 end) as Unaided_Middle_School,
    sum(case when school_type_id = 3 and cate_type = 'High School' then 1 else 0 end) as Unaided_High_School,
    sum(case when school_type_id = 3 and cate_type = 'Higher Secondary School' then 1 else 0 end) as Unaided_Higher_Secondary,
    sum(case when school_type_id = 4 and cate_type = 'Pre-Primary School'then 1 else 0 end) as Part_Aid_Pre_Primary_School,
    sum(case when school_type_id = 4 and cate_type = 'Primary School'then 1 else 0 end) as Part_Aid_Primary_School,
    sum(case when school_type_id = 4 and cate_type = 'Middle School' then 1 else 0 end) as Part_Aid_Middle_School,
    sum(case when school_type_id = 4 and cate_type = 'High School' then 1 else 0 end) as Part_Aid_High_School,
    sum(case when school_type_id = 4 and cate_type = 'Higher Secondary School' then 1 else 0 end) as Part_Aid_Higher_Secondary,
    sum(case when school_type_id = 5 and cate_type = 'Pre-Primary School'then 1 else 0 end) as Central_Pre_Primary_School,
    sum(case when school_type_id = 5 and cate_type = 'Primary School'then 1 else 0 end) as Central_Primary_School,
    sum(case when school_type_id = 5 and cate_type = 'Middle School' then 1 else 0 end) as Central_Middle_School,
    sum(case when school_type_id = 5 and cate_type = 'High School' then 1 else 0 end) as Central_High_School,
    sum(case when school_type_id = 5 and cate_type = 'Higher Secondary School' then 1 else 0 end) as Central_Higher_Secondary,
    sum(case when cate_type = 'Pre-Primary School'then 1 else 0 end) as Total_Pre_Primary_School,
    sum(case when cate_type = 'Primary School'then 1 else 0 end) as Total_Primary_School,
    sum(case when cate_type = 'Middle School' then 1 else 0 end) as Total_Middle_School,
    sum(case when cate_type = 'High School' then 1 else 0 end) as Total_High_School,
    sum(case when cate_type = 'Higher Secondary School' then 1 else 0 end) as Total_Higher_Secondary,
    sum(case when cate_type = 'Special School'then 1 else 0 end) as Special_School,
    sum(catty_id in (1,2,3,4,5,6)) as Total_School_Count";
    
    if($user_type == '5'){
      //echo "state";
      $sql .= " from students_school_child_count group by district_id order by district_name;";
    }else if($user_type == '9'){
      //echo "CEO";
      $sql .= " from students_school_child_count where district_id = ".$where." group by block_id order by block_name;";
    }else if($user_type == '10'){
      //echo "DEO";
      $sql .= " from students_school_child_count where edu_dist_id = ".$where." group by block_id order by block_name;";
    }else if($user_type == '2'){
      //echo "Block";
      $sql .= " from students_school_child_count where block_id = ".$where." group by udise_code order by udise_code;";
    }
    
    $query = $this->db->query($sql);
    $result = $query->result();
  
    return $result;
    
  }
  /**School summary api ends here by wesley*/

  /**School list for CRC (UDISE approval)**/
  public function crc_schl_list($user_type,$schl_type_id,$where,$brte_block_id){

    $sql="select 
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    students_school_child_count.udise_code,
    students_school_child_count.school_name,
    students_school_child_count.category,
    mhrd_dcf_form_entry.dcf_certify_by_school_auth_desig,
    mhrd_dcf_form_entry.dcf_certify_by_school_auth_date,
    mhrd_dcf_form_entry.dcf_certify_by_crc_auth_name,
    mhrd_dcf_form_entry.dcf_certify_by_crc_auth_date,
    mhrd_dcf_form_entry.dcf_certify_by_block_auth_name,
    mhrd_dcf_form_entry.dcf_certify_by_block_auth_date,
    mhrd_dcf_form_entry.dcf_certify_by_ceo_auth_name,
    mhrd_dcf_form_entry.dcf_certify_by_ceo_auth_date 
    from students_school_child_count left join mhrd_dcf_form_entry on students_school_child_count.school_id = mhrd_dcf_form_entry.school_key_id where students_school_child_count.school_type_id = ".$schl_type_id."";
    
    if($user_type == '9' || $user_type == '3'){
      //echo "ceo";die();
      $sql .= " and students_school_child_count.district_id = ".$where."";
    }else if($user_type == '10'){
      //echo "deo";die();
      $sql .= " and students_school_child_count.edu_dist_id = ".$where."";
    }else if($user_type == '6' ){
      //echo "beo";die();
      $sql .= " and students_school_child_count.block_id = ".$where.";";
    }else if(!empty($brte_block_id)){
      //echo "brte";die();
      $sql .= " and students_school_child_count.block_id = ".$brte_block_id.";";
    }

    $query = $this->db->query($sql);
    //print_r($this->db->last_query());die();
    $result = $query->result();
    return $result;
  }

  public function crc_blck_list($emis_username){
    $sql = "SELECT schoolnew_block.id,schoolnew_block.block_name,schoolnew_block.block_code,schoolnew_block.block_type FROM schoolnew_block 
    LEFT JOIN udise_offreg ON schoolnew_block.`district_id` = udise_offreg.`district_id`
    LEFT JOIN emisuser_teacher ON udise_offreg.`off_key_id` = emisuser_teacher.`emis_usertype1`
    WHERE emisuser_teacher.emis_username = $emis_username order by schoolnew_block.block_name";
    
         $sql = $this->db->query($sql);
         //print_r($this->db->last_query());die();
           return $sql->result();
  }

  public function get_exams_marks_summary($sch_id){
         $sql = "SELECT name, class_id, medium_id, Topic1,Topic2,Topic3,Topic4,Topic5,Topic6,Total from exams_marks_summary
            where school_id = ".$sch_id." order by class_id,name;";
    
         $result = $this->db->query($sql);
         //print_r($this->db->last_query());die();
           return $result->result_array();
  }

  /**API's using school_id starts here by wesley**/
  
  public function get_schl1($sch_id){
 
    //echo $sch_id;die();
    $sql = "select sum(me.medinstr_seq not in (1,2,3,4)) as 'medium medinstr_seq is out of range',
    sum(me.cpp_b is null or me.cpp_b < 0 or me.cpp_b > 5000) as 'medium cpp_b is null or cpp_b out of range',
    sum(me.c1_b is null or me.c1_b < 0 or me.c1_b > 5000) as 'medium class1_boys is null or class1_boys out of range',
    sum(me.c2_b is null or me.c2_b < 0 or me.c2_b > 5000) as 'medium class2_boys is null or class2_boys out of range',
    sum(me.c3_b is null or me.c3_b < 0 or me.c3_b > 5000) as 'medium class3_boys is null or class3_boys out of range',
    sum(me.c4_b is null or me.c4_b < 0 or me.c4_b > 5000) as 'medium class4_boys is null or class4_boys out of range',
    sum(me.c5_b is null or me.c5_b < 0 or me.c5_b > 5000) as 'medium class5_boys is null or class5_boys out of range',
    sum(me.c6_b is null or me.c6_b < 0 or me.c6_b > 5000) as 'medium class6_boys is null or class6_boys out of range',
    sum(me.c7_b is null or me.c7_b < 0 or me.c7_b > 5000) as 'medium class7_boys is null or class7_boys out of range',
    sum(me.c8_b is null or me.c8_b < 0 or me.c8_b > 5000) as 'medium class8_boys is null or class8_boys out of range', 
    sum(me.c9_b is null or me.c9_b < 0 or me.c9_b > 5000) as 'medium class9_boys is null or class9_boys out of range',
    sum(me.c10_b is null or me.c10_b < 0 or me.c10_b > 5000) as 'medium class10_boys is null or class10_boys out of range',
    sum(me.c11_b is null or me.c11_b < 0 or me.c11_b > 5000) as 'medium class11_boys is null or class10_boys out of range',
    sum(me.c12_b is null or me.c12_b < 0 or me.c12_b > 5000) as 'medium class12_boys is null or class10_boys out of range',
    sum(me.cpp_g is null or me.cpp_g < 0 or me.cpp_g > 5000) as 'medium cpp_g is null or cpp_g out of range',
    sum(me.c1_g is null or me.c1_g < 0 or me.c1_g > 5000) as 'medium class1_girls is null or class1_girls out of range', 
    sum(me.c2_g is null or me.c2_g < 0 or me.c2_g > 5000) as 'medium class2_girls is null or class2_girls out of range',
    sum(me.c3_g is null or me.c3_g < 0 or me.c3_g > 5000) as 'medium class3_girls is null or class3_girls out of range',
    sum(me.c4_g is null or me.c4_g < 0 or me.c4_g > 5000) as 'medium class4_girls is null or class4_girls out of range',
    sum(me.c5_g is null or me.c5_g < 0 or me.c5_g > 5000) as 'medium class5_girls is null or class5_girls out of range',
    sum(me.c6_g is null or me.c6_g < 0 or me.c6_g > 5000) as 'medium class6_girls is null or class6_girls out of range',
    sum(me.c7_g is null or me.c7_g < 0 or me.c7_g > 5000) as 'medium class7_girls is null or class7_girls out of range',
    sum(me.c8_g is null or me.c8_g < 0 or me.c8_g > 5000) as 'medium class8_girls is null or class8_girls out of range',
    sum(me.c9_g is null or me.c9_g < 0 or me.c9_g > 5000) as 'medium class9_girls is null or class9_girls out of range',
    sum(me.c10_g is null or me.c10_g < 0 or me.c10_g > 5000) as 'medium class10_girls is null or class10_girls out of range',
    sum(me.c11_g is null or me.c11_g < 0 or me.c11_g > 5000) as 'medium class11_girls is null or class10_girls out of range',
    sum(me.c12_g is null or me.c12_g < 0 or me.c12_g > 5000) as 'medium class12_girls is null or class10_girls out of range',
    sum(bb.sch_type=2 and me.cpp_b > 0) as 'medium school Type is Girls while cpp_b>0',
    sum(bb.sch_type=2 and me.c1_b > 0) as 'medium school Type is Girls while class1_boys>0', 
    sum(bb.sch_type=2 and me.c2_b > 0) as 'medium school Type is Girls while class2_boys>0',
    sum(bb.sch_type=2 and me.c3_b > 0) as 'medium school Type is Girls while class3_boys>0',
    sum(bb.sch_type=2 and me.c4_b > 0) as 'medium school Type is Girls while class4_boys>0',
    sum(bb.sch_type=2 and me.c5_b > 0) as 'medium school Type is Girls while class5_boys>0',
    sum(bb.sch_type=2 and me.c6_b > 0) as 'medium school Type is Girls while class6_boys>0',
    sum(bb.sch_type=2 and me.c7_b > 0) as 'medium school Type is Girls while class7_boys>0',
    sum(bb.sch_type=2 and me.c8_b > 0) as 'medium school Type is Girls while class8_boys>0',
    sum(bb.sch_type=2 and me.c9_b > 0) as 'medium school Type is Girls while class9_boys>0',
    sum(bb.sch_type=2 and me.c10_b > 0) as 'medium  school Type is Girls while class10_boys>0',
    sum(bb.sch_type=2 and me.c11_b > 0) as 'medium school Type is Girls while class11_boys>0',
    sum(bb.sch_type=2 and me.c12_b > 0) as 'medium school Type is Girls while class12_boys>0',
    sum(bb.sch_type=1 and me.cpp_g > 0) as 'medium school Type is Girls while cpp_b>0',
    sum(bb.sch_type=1 and me.c1_g > 0) as 'medium school Type is Girls while class1_girls>0',
    sum(bb.sch_type=1 and me.c2_g > 0) as 'medium school Type is BOys while class2_girls>0',
    sum(bb.sch_type=1 and me.c3_g > 0) as 'medium school Type is BOys while class3_girls>0',
    sum(bb.sch_type=1 and me.c4_g > 0) as 'medium school Type is BOys while class4_girls>0',
    sum(bb.sch_type=1 and me.c5_g > 0) as 'medium school Type is BOys while class5_girls>0',
    sum(bb.sch_type=1 and me.c6_g > 0 ) as 'medium school Type is BOys while class6_girls>0',
    sum(bb.sch_type=1 and me.c7_g > 0 ) as 'medium school Type is BOys while class7_girls>0',
    sum(bb.sch_type=1 and me.c8_g > 0 ) as 'medium school Type is BOys while class8_girls>0',
    sum(bb.sch_type=1 and me.c9_g > 0 ) as 'medium  school Type is BOys while class9_girls>0',
    sum(bb.sch_type=1 and me.c10_g > 0 ) as 'medium school Type is BOys while class10_girls>0',
    sum(bb.sch_type=1 and me.c11_g > 0 ) as 'medium school Type is BOys while class11_girls>0',
    sum(bb.sch_type=1 and me.c12_g > 0  ) as 'medium  school Type is BOys while class12_girls>0',
    case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end)!=sum(me.cpp_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment cpp_b',
    case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end)!=sum(me.c1_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class1_boys',
    case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end)!=sum(me.c2_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class2_boys',
    case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end)!=sum(me.c3_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class3_boys',
    case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end)!=sum(me.c4_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class4_boys',
    case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end)!=sum(me.c5_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class5_boys',
    case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end)!=sum(me.c6_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class6_boys',
    case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end)!=sum(me.c7_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class7_boys', 
    case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end)!=sum(me.c8_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class8_boys',
    case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end)!=sum(me.c9_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class9_boys',
    case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end)!=sum(me.c10_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class10_boys',
    case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end)!=sum(me.c11_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class11_boys',
    case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end)!=sum(me.c12_b) then 1 else 0 end as 'medium Enrollment not equal category enrollment class12_boys',
    case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end)!=sum(me.cpp_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment cpp_g',
    case when sum(case when fr.item_group=1 then (fr.c1_g) else 0 end)!=sum(me.c1_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class1_girls',
    case when sum(case when fr.item_group=1 then (fr.c2_g) else 0 end)!=sum(me.c2_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class2_girls',
    case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end)!=sum(me.c3_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class3_girls',
    case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end)!=sum(me.c4_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class4_girls',
    case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end)!=sum(me.c5_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class5_girls',
    case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end)!=sum(me.c6_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class6_girls',
    case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end)!=sum(me.c7_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class7_girls',
    case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end)!=sum(me.c8_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class8_girls',
    case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end)!=sum(me.c9_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class9_girls',
    case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end)!=sum(me.c10_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class10_girls',
    case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end)!=sum(me.c11_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class11_girls',
    case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end)!=sum(me.c12_g) then 1 else 0 end as 'medium Enrollment not equal category enrollment class12_girls',
    count(distinct st.udise_sch_code) as 'stream Total School in sch_enr_by_stream',
    sum(st.stream_id not in (111,112,113,114,115)) as 'stream stream_id is out of range',
    sum(st.caste_id not in (1,2,3,4,5,6,7,8,9,10,11)) as 'stream item_id is out of range',
    sum(bb.sch_category_id in (3,5,10,11) and (st.ec11_b is null or st.ec11_b < 0 or st.ec11_b > 5000)) as 'stream ec11_b is null or ec11_b out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.ec12_b is null or st.ec12_b < 0 or st.ec12_b > 5000)) as 'stream ec12_b is null or ec12_b out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.ec11_g is null or st.ec11_g < 0 or st.ec11_g > 5000)) as 'stream ec11_g is null or ec11_g out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.ec12_g is null or st.ec12_g < 0 or st.ec12_g > 5000)) as 'stream ec12_g is null or ec12_g out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.rc11_b is null or st.rc11_b < 0 or st.rc11_b > 5000)) as 'stream rc11_b is null or rc11_b out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.rc12_b is null or st.rc12_b < 0 or st.rc12_b > 5000)) as 'stream rc12_b is null or rc12_b out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.rc11_g is null or st.rc11_g < 0 or st.rc11_g > 5000)) as 'stream rc11_g is null or ec11_g out of range',
    sum(bb.sch_category_id in (3,5,10,11) and  (st.rc12_g is null or st.rc12_g < 0 or st.rc12_g > 5000)) as 'stream rc12_g is null or rc12_g out of range',
    sum(bb.sch_type=2 and st.ec11_b > 0) as 'stream school Type is Girls while ec11_b>0',
    sum(bb.sch_type=2 and st.ec12_b > 0) as 'stream school Type is Girls while ec12_b>0',
    sum(bb.sch_type=2 and st.rc11_b > 0) as 'stream school Type is Girls while rc11_b>0',
    sum(bb.sch_type=2 and st.rc11_b > 0) as 'stream school Type is Girls while rc11_b>0',
    sum(bb.sch_type=1 and st.ec11_g > 0) as 'stream school Type is BOys while ec11_g>0',
    sum(bb.sch_type=1 and st.ec12_g > 0) as 'stream school Type is BOys while ec12_g>0',
    sum(bb.sch_type=1 and st.rc11_g > 0) as 'stream school Type is BOys while rc11_g>0',
    sum(bb.sch_type=1 and st.rc11_g > 0) as 'stream school Type is BOys while rc11_g>0',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.ec11_b) else 0 end)!= sum(fr.c11_b) then 1 else 0 end as 'stream enrollment count is not equal to total enrollment count for class 11 boys',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.ec12_b) else 0 end)!= sum(fr.c12_b) then 1 else 0 end as 'stream enrollment count is not equal to total enrollment count for class 12 boys',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.ec11_g) else 0 end)!= sum(fr.c11_g) then 1 else 0 end as 'stream enrollment count is not equal to total enrollment count for class 11 girls',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.ec12_g) else 0 end)!= sum(fr.c12_g) then 1 else 0 end as 'stream enrollment count is not equal to total enrollment count for class 12 girls',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.ec11_b) else 0 end)!= sum(fr.c11_b) then 1 else 0 end as 'stream minority enrollment count is not equal to minority enrollment count for class 11 boys',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.ec12_b) else 0 end)!= sum(fr.c12_b) then 1 else 0 end as 'stream minority enrollment count is not equal to minority enrollment count for class 12 boys',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.ec11_g) else 0 end)!= sum(fr.c11_g) then 1 else 0 end as 'stream minority enrollment count is not equal to minority enrollment count for class 11 girls',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.ec12_g) else 0 end)!= sum(fr.c12_g) then 1 else 0 end as 'stream minority enrollment count is not equal to minority enrollment count for class 12 girls',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.rc11_b) else 0 end)!= sum(fr.c11_b) then 1 else 0 end as 'stream repeater count is not equal to total repeater count for class 11 boys',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.rc12_b) else 0 end)!= sum(fr.c12_b) then 1 else 0 end as 'stream  repeater count is not equal to total repeater count for class 12 boys',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.rc11_g) else 0 end)!= sum(fr.c11_g) then 1 else 0 end as 'stream  repeater count is not equal to total repeater count for class 11 girls',
    case when sum(case when fr.item_group=1 and st.caste_id in (1,2,3,4) then (st.rc12_g) else 0 end)!= sum(fr.c12_g) then 1 else 0 end as 'stream repeater count is not equal to total repeater count for class 12 girls',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.rc11_b) else 0 end)!= sum(fr.c11_b) then 1 else 0 end as 'stream minority repeater count is not equal to minority repeater count for class 11 boys',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.rc12_b) else 0 end)!= sum(fr.c12_b) then 1 else 0 end as 'stream minority repeater count is not equal to minority repeater count for class 12 boys',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.rc11_g) else 0 end)!= sum(fr.c11_g) then 1 else 0 end as 'stream minority repeater count is not equal to minority repeater count for class 11 girls',
    case when sum(case when fr.item_group=2 and st.caste_id in (5,6,7,8,9,10,11) then (st.rc12_g) else 0 end)!= sum(fr.c12_g) then 1 else 0 end as 'stream minority repeater count is not equal to minority repeater count for class 12 girls' 
    from mhrd_school_master bb join mhrd_sch_enr_fresh fr on cast(fr.udise_sch_code as unsigned) = bb.old_udise_sch_code join mhrd_sch_enr_medinstr me on me.udise_sch_code = fr.udise_sch_code left join mhrd_sch_enr_by_stream st on st.udise_sch_code = 
    fr.udise_sch_code join students_school_child_count sc on sc.school_id=bb.school_id where sc.school_id= ".$sch_id." group by bb.old_udise_sch_code;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }

  public function get_schl2($sch_id){
 
    //echo $sch_id;die();
    $sql = "select count(distinct re.udise_sch_code) as 'reptr Total School in sch_enr_reptr',
    sum(re.item_group not in (1,2,3)) as 'reptr item_group is out of range',
    sum(re.item_id not in (1,2,3,4,5,6,7,8,9,10,11,12,13,14)) as 'reptr item_id is out of range',
    sum(re.cpp_b is null or re.cpp_b < 0 or re.cpp_b > 5000) as 'reptr  cpp_b is null or cpp_b out of range(0-5000)', 
    sum(re.c1_b is null or re.c1_b < 0 or re.c1_b > 5000) as 'reptr class1_boys is null or class1_boys out of range',
    sum(re.c2_b is null or re.c2_b < 0 or re.c2_b > 5000) as 'reptr class2_boys is null or class2_boys out of range',
    sum(re.c3_b is null or re.c3_b < 0 or re.c3_b > 5000) as 'reptr class3_boys is null or class3_boys out of range',
    sum(re.c4_b is null or re.c4_b < 0 or re.c4_b > 5000) as 'reptr class4_boys is null or class4_boys out of range',
    sum(re.c5_b is null or re.c5_b < 0 or re.c5_b > 5000) as 'reptr class5_boys is null or class5_boys out of range',
    sum(re.c6_b is null or re.c6_b < 0 or re.c6_b > 5000) as 'reptr class6_boys is null or class6_boys out of range',
    sum(re.c7_b is null or re.c7_b < 0 or re.c7_b > 5000) as 'reptr class7_boys is null or class7_boys out of range',
    sum(re.c8_b is null or re.c8_b < 0 or re.c8_b > 5000) as 'reptr class8_boys is null or class8_boys out of range',
    sum(re.c9_b is null or re.c9_b < 0 or re.c9_b > 5000) as 'reptr class9_boys is null or class9_boys out of range',
    sum(re.c10_b is null or re.c10_b < 0 or re.c10_b > 5000) as 'reptr class10_boys is null or class10_boys out of range',
    sum(re.c11_b is null or re.c11_b < 0 or re.c11_b > 5000) as 'reptr class11_boys is null or class10_boys out of range',
    sum(re.c12_b is null or re.c12_b < 0 or re.c12_b > 5000) as 'reptr class12_boys is null or class10_boys out of range',
    sum(re.cpp_g is null or re.cpp_g < 0 or re.cpp_g > 5000) as 'reptr cpp_g is null or cpp_g out of range',
    sum(re.c1_g is null or re.c1_g < 0 or re.c1_g > 5000) as 'reptr class1_girls is null or class1_girls out of range',
    sum(re.c2_g is null or re.c2_g < 0 or re.c2_g > 5000) as 'reptr class2_girls is null or class2_girls out of range',
    sum(re.c3_g is null or re.c3_g < 0 or re.c3_g > 5000) as 'reptr class3_girls is null or class3_girls out of range',
    sum(re.c4_g is null or re.c4_g < 0 or re.c4_g > 5000) as 'reptr class4_girls is null or class4_girls out of range',
    sum(re.c5_g is null or re.c5_g < 0 or re.c5_g > 5000) as 'reptr class5_girls is null or class5_girls out of range',
    sum(re.c6_g is null or re.c6_g < 0 or re.c6_g > 5000) as 'reptr class6_girls is null or class6_girls out of range',
    sum(re.c7_g is null or re.c7_g < 0 or re.c7_g > 5000) as 'reptr class7_girls is null or class7_girls out of range',
    sum(re.c8_g is null or re.c8_g < 0 or re.c8_g > 5000) as 'reptr class8_girls is null or class8_girls out of range',
    sum(re.c9_g is null or re.c9_g < 0 or re.c9_g > 5000) as 'reptr class9_girls is null or class9_girls out of range',
    sum(re.c10_g is null or re.c10_g < 0 or re.c10_g > 5000) as 'reptr class10_girls is null or class10_girls out of range',
    sum(re.c11_g is null or re.c11_g < 0 or re.c11_g > 5000) as 'reptr class11_girls is null or class10_girls out of range',
    sum(re.c12_g is null or re.c12_g < 0 or re.c12_g > 5000) as 'reptr class12_girls is null or class10_girls out of range',	
    sum(bb.sch_type=2 and re.cpp_b > 0) as 'reptr  school Type is GIRLS while cpp_b>0',
    sum(bb.sch_type=2 and re.c1_b > 0) as 'reptr school Type is GIRLS while class1_boys>0',
    sum(bb.sch_type=2 and re.c2_b > 0) as 'reptr school Type is GIRLS while class2_boys>0',
    sum(bb.sch_type=2 and re.c3_b > 0 ) as 'reptr school Type is GIRLS while class3_boys>0',
    sum(bb.sch_type=2 and re.c4_b > 0) as 'reptr school Type is GIRLS while class4_boys>0',
    sum(bb.sch_type=2 and re.c5_b > 0) as 'reptr school Type is GIRLS while class5_boys>0',
    sum(bb.sch_type=2 and re.c6_b > 0) as 'reptr school Type is GIRLS while class6_boys>0',
    sum(bb.sch_type=2 and re.c7_b > 0) as 'reptr school Type is GIRLS while class7_boys>0',
    sum(bb.sch_type=2 and re.c8_b > 0 ) as 'reptr school Type is GIRLS while class8_boys>0',
    sum(bb.sch_type=2 and re.c9_b > 0) as 'reptr school Type is GIRLS while class9_boys>0',
    sum(bb.sch_type=2 and re.c10_b > 0) as 'reptr school Type is GIRLS while class10_boys>0',
    sum(bb.sch_type=2 and re.c11_b > 0) as 'reptr school Type is GIRLS while class11_boys>0',
    sum(bb.sch_type=2 and re.c12_b > 0) as 'reptr school Type is GIRLS while class12_boys>0',
    sum(bb.sch_type=1 and re.cpp_g > 0) as 'reptr school Type is GIRLS while cpp_b>0',
    sum(bb.sch_type=1 and re.c1_g > 0 ) as 'reptr school Type is GIRLS while class1_boys>0',
    sum(bb.sch_type=1 and re.c2_g > 0) as 'reptr  school Type is BOYS while class2_girls>0',
    sum(bb.sch_type=1 and re.c3_g > 0) as 'reptr  school Type is BOYS while class3_girls>0',
    sum(bb.sch_type=1 and re.c4_g > 0) as 'reptr school Type is BOYS while class4_girls>0',
    sum(bb.sch_type=1 and re.c5_g > 0) as 'reptr school Type is BOYS while class5_girls>0',
    sum(bb.sch_type=1 and re.c6_g > 0) as 'reptr school Type is BOYS while class6_girls>0',
    sum(bb.sch_type=1 and re.c7_g > 0) as 'reptr school Type is BOYS while class7_girls>0',
    sum(bb.sch_type=1 and re.c8_g > 0) as 'reptr school Type is BOYS while class8_girls>0',
    sum(bb.sch_type=1 and re.c9_g > 0) as 'reptr school Type is BOYS while class9_girls>0',
    sum(bb.sch_type=1 and re.c10_g > 0) as 'reptr school Type is BOYS while class10_girls>0',
    sum(bb.sch_type=1 and re.c11_g > 0) as 'reptr school Type is BOYS while class11_girls>0',
    sum(bb.sch_type=1 and re.c12_g > 0) as 'reptr school Type is BOYS while class12_girls>0',
    case when sum(case when re.item_group=1 then (re.cpp_b) else 0 end )>sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment',
    case when sum(case when re.item_group=1 then (re.c1_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c1_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class1_boys',
    case when sum(case when re.item_group=1 then (re.c2_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c2_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class2_boys',
    case when sum(case when re.item_group=1 then (re.c3_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c3_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class3_boys',
    case when sum(case when re.item_group=1 then (re.c4_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c4_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class4_boys',
    case when sum(case when re.item_group=1 then (re.c5_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c5_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class5_boys',
    case when sum(case when re.item_group=1 then (re.c6_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c6_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class6_boys',
    case when sum(case when re.item_group=1 then (re.c7_b ) else 0 end )>sum(case when fr.item_group=1 then (fr.c7_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class7_boys',
    case when sum(case when re.item_group=1 then (re.c8_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c8_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class8_boys',
    case when sum(case when re.item_group=1 then (re.c9_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c9_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class9_boys',
    case when sum(case when re.item_group=1 then (re.c10_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c10_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class10_boys',
    case when sum(case when re.item_group=1 then (re.c11_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c11_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class11_boys',
    case when sum(case when re.item_group=1 then (re.c12_b) else 0 end )>sum(case when fr.item_group=1 then (fr.c12_b) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment  for class12_boys',
    case when sum(case when re.item_group=1 then (re.cpp_g) else 0 end )>sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for cpp_g',
    case when sum(case when re.item_group=1 then (re.c1_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c1_g) else 0 end) then 1 else 0 end as 
    'reptr Minority enrollment is more than category enrollment for class1_girls',
    case when sum(case when re.item_group=1 then (re.c2_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c2_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class2_girls',
    case when sum(case when re.item_group=1 then (re.c3_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c3_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class3_girls',
    case when sum(case when re.item_group=1 then (re.c4_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c4_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class4_girls',
    case when sum(case when re.item_group=1 then (re.c5_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c5_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class5_girls',
    case when sum(case when re.item_group=1 then (re.c6_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c6_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class6_girls',
    case when sum(case when re.item_group=1 then (re.c7_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c7_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class7_girls',
    case when sum(case when re.item_group=1 then (re.c8_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c8_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class8_girls',
    case when sum(case when re.item_group=1 then (re.c9_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c9_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class9_girls',
    case when sum(case when re.item_group=1 then (re.c10_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c10_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class10_girls',
    case when sum(case when re.item_group=1 then (re.c11_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c11_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class11_girls',
    case when sum(case when re.item_group=1 then (re.c12_g) else 0 end )>sum(case when fr.item_group=1 then (fr.c12_g) else 0 end) then 1 else 0 end as 'reptr Minority enrollment is more than category enrollment for class12_girls',
    case when sum(case when re.item_group=2 then (re.cpp_b) else 0 end )>sum(case when fr.item_group=2 then (fr.cpp_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for cpp_b',
    case when sum(case when re.item_group=2 then (re.c1_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c1_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class1_boys',
    case when sum(case when re.item_group=2 then (re.c2_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c2_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class2_boys',
    case when sum(case when re.item_group=2 then (re.c3_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c3_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class3_boys',
    case when sum(case when re.item_group=2 then (re.c4_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c4_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class4_boys',
    case when sum(case when re.item_group=2 then (re.c5_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c5_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class5_boys',
    case when sum(case when re.item_group=2 then (re.c6_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c6_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class6_boys',
    case when sum(case when re.item_group=2 then (re.c7_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c7_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class7_boys',
    case when sum(case when re.item_group=2 then (re.c8_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c8_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class8_boys',
    case when sum(case when re.item_group=2 then (re.c9_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c9_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class9_boys',
    case when sum(case when re.item_group=2 then (re.c10_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c10_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class10_boys',
    case when sum(case when re.item_group=2 then (re.c11_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c11_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class11_boys',
    case when sum(case when re.item_group=2 then (re.c12_b) else 0 end )>sum(case when fr.item_group=2 then (fr.c12_b) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class12_boys',
    case when sum(case when re.item_group=2 then (re.cpp_g) else 0 end )>sum(case when fr.item_group=2 then (fr.cpp_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for cpp_g',
    case when sum(case when re.item_group=2 then (re.c1_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c1_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class1_girls',
    case when sum(case when re.item_group=2 then (re.c2_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c2_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class2_girls',
    case when sum(case when re.item_group=2 then (re.c3_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c3_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class3_girls',
    case when sum(case when re.item_group=2 then (re.c4_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c4_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class4_girls',
    case when sum(case when re.item_group=2 then (re.c5_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c5_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class5_girls',
    case when sum(case when re.item_group=2 then (re.c6_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c6_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class6_girls',
    case when sum(case when re.item_group=2 then (re.c7_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c7_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class7_girls',
    case when sum(case when re.item_group=2 then (re.c8_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c8_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class8_girls',
    case when sum(case when re.item_group=2 then (re.c9_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c9_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class9_girls',
    case when sum(case when re.item_group=2 then (re.c10_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c10_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class10_girls',
    case when sum(case when re.item_group=2 then (re.c11_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c11_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class11_girls',
    case when sum(case when re.item_group=2 then (re.c12_g) else 0 end )>sum(case when fr.item_group=2 then (fr.c12_g) else 0 end) then 1 else 0 end as 'reptr  Minority enrollment is more than minority enrollment for class12_girls',
    sum(length(er5.udise_sch_code)!=11) as 'examresults_class5 Total School With UDISE CODE length not equal 11',sum(er5.gen_app_b is null or er5.gen_app_b < 0 or er5.gen_app_b > 5000) as 'examresults_class5 gen_app_b is null or out of range',
    sum(er5.gen_app_g is null or er5.gen_app_g < 0 or er5.gen_app_g > 5000) as 'examresults_class5 gen_app_g is null or out of range',sum(er5.sc_app_b is null or er5.sc_app_b < 0 or er5.sc_app_b > 5000) as 'examresults_class5 sc_app_b is null or out of range',
    sum(er5.sc_app_g is null or er5.sc_app_g < 0 or er5.sc_app_g > 5000) as 'examresults_class5 sc_app_g is null or out of range',sum(er5.st_app_b is null or er5.st_app_b < 0 or er5.st_app_b > 5000) as 'examresults_class5 st_app_b is null or out of range',
    sum(er5.st_app_g is null or er5.st_app_g < 0 or er5.st_app_g > 5000) as 'examresults_class5 st_app_g is null or out of range',sum(er5.obc_app_b is null or er5.obc_app_b < 0 or er5.obc_app_b > 5000) as 'examresults_class5 obc_app_b is null or out of range',
    sum(er5.obc_app_g is null or er5.obc_app_g < 0 or er5.obc_app_g > 5000) as 'examresults_class5 obc_app_g is null or out of range',sum(er5.gen_pass_b is null or er5.gen_pass_b < 0 or er5.gen_pass_b > 5000) as 'examresults_class5 gen_pass_b is null or out of range ',
    sum(er5.gen_pass_g is null or er5.gen_pass_g < 0 or er5.gen_pass_g > 5000) as 'examresults_class5 gen_pass_g is null or out of range',sum(er5.sc_pass_b is null or er5.sc_pass_b < 0 or er5.sc_pass_b > 5000) as 'examresults_class5 sc_pass_b is null or out of range',
    sum(er5.sc_pass_g is null or er5.sc_pass_g < 0 or er5.sc_pass_g > 5000) as 'examresults_class5 sc_pass_g is null or out of range ',sum(er5.st_pass_b is null or er5.st_pass_b < 0 or er5.st_pass_b > 5000) as 'examresults_class5 st_pass_b is null or out of range',
    sum(er5.st_pass_g is null or er5.st_pass_g < 0 or er5.st_pass_g > 5000) as 'examresults_class5 st_pass_g is null or out of range ',sum(er5.obc_pass_b is null or er5.obc_pass_b < 0 or er5.obc_pass_b > 5000) as 'examresults_class5 obc_pass_b is null or out of range',
    sum(er5.obc_pass_g is null or er5.obc_pass_g < 0 or er5.obc_pass_g > 5000) as 'examresults_class5 obc_pass_g is null or out of range',sum(er5.gen_60p_b is null or er5.gen_60p_b < 0 or er5.gen_60p_b > 5000) as 'examresults_class5 gen_60p_b is null or out of range',
    sum(er5.gen_60p_g is null or er5.gen_60p_g < 0 or er5.gen_60p_g > 5000) as 'examresults_class5 gen_60p_g is null or out of range',sum(er5.sc_60p_b is null or er5.sc_60p_b < 0 or er5.sc_60p_b > 5000) as 'examresults_class5 sc_60p_b is null or out of range',
    sum(er5.sc_60p_g is null or er5.sc_60p_g < 0 or er5.sc_60p_g > 5000) as 'examresults_class5  sc_60p_g is null or out of range ',sum(er5.st_60p_b is null or er5.st_60p_b < 0 or er5.st_60p_b > 5000) as 'examresults_class5 st_60p_b is null or out of range',
    sum(er5.st_60p_g is null or er5.st_60p_g < 0 or er5.st_60p_g > 5000) as 'examresults_class5 st_60p_g is null or out of range',sum(er5.obc_60p_b is null or er5.obc_60p_b < 0 or er5.obc_60p_b > 5000) as 'examresults_class5  obc_60p_b is null or out of range',
    sum(er5.obc_60p_g is null or er5.obc_60p_g < 0 or er5.obc_60p_g > 5000) as 'examresults_class5 obc_60p_g is null or out of range',sum(bb.sch_type=2 and er5.gen_app_b > 0) as 'examresults_class5 school Type is Girls while gen_app_b > 0',
    sum(bb.sch_type=2 and er5.sc_app_b > 0) as 'examresults_class5 school Type is Girls while sc_app_b > 0',
    sum(bb.sch_type=2 and er5.st_app_b > 0) as 'examresults_class5 school Type is Girls while st_app_b > 0',
    sum(bb.sch_type=2 and er5.obc_app_b > 0) as 'examresults_class5 school Type is Girls while obc_app_b > 0 ',
    sum(bb.sch_type=2 and er5.gen_pass_b > 0) as 'examresults_class5 school Type is Girls while gen_pass_b > 0',
    sum(bb.sch_type=2 and er5.sc_pass_b > 0) as 'examresults_class5 school Type is Girls while sc_pass_b > 0',
    sum(bb.sch_type=2 and er5.st_pass_b > 0) as 'examresults_class5 school Type is Girls while st_pass_b > 0',
    sum(bb.sch_type=2 and er5.obc_pass_b > 0) as 'examresults_class5 school Type is Girls while obc_pass_b > 0',
    sum(bb.sch_type=1 and er5.gen_app_g > 0) as 'examresults_class5 school Type is Girls while gen_app_g > 0',
    sum(bb.sch_type=1 and er5.sc_app_g > 0) as 'examresults_class5 school Type is Girls while sc_app_g > 0 ',
    sum(bb.sch_type=1 and er5.st_app_g > 0) as 'examresults_class5 school Type is Girls while st_app_g > 0 ',
    sum(bb.sch_type=1 and er5.obc_app_g > 0) as 'examresults_class5 school Type is Girls while obc_app_g > 0 ',
    sum(bb.sch_type=1 and er5.gen_pass_g > 0) as 'examresults_class5 school Type is Girls while gen_pass_g > 0',
    sum(bb.sch_type=1 and er5.sc_pass_g > 0) as 'examresults_class5 school Type is Girls while sc_pass_g > 0',
    sum(bb.sch_type=1 and er5.st_pass_g > 0) as 'examresults_class5 school Type is Girls while st_pass_g > 0',
    sum(bb.sch_type=1 and er5.obc_pass_g > 0) as 'examresults_class5 school Type is Girls while obc_pass_g > 0',
    sum(er5.gen_app_b<er5.gen_pass_b) as 'examresults_class5 gen_pass_b is more than app',
    sum(er5.sc_app_b<er5.sc_pass_b) as 'examresults_class5 sc_pass_b is more than app',
    sum(er5.st_app_b<er5.st_pass_b) as 'examresults_class5  st_pass_b is more than app',
    sum(er5.obc_app_b<er5.obc_pass_b) as 'examresults_class5 obc_pass_b is more than app',
    sum(er5.gen_app_g<er5.gen_pass_g) as 'examresults_class5 gen_pass_g is more than app',
    sum(er5.sc_app_g<er5.sc_pass_g) as 'examresults_class5 sc_pass_g is more than app',
    sum(er5.st_app_g<er5.st_pass_g) as 'examresults_class5 st_pass_g is more than app',
    sum(er5.obc_app_g<er5.obc_pass_g) as 'examresults_class5 obc_pass_g is more than app',
    sum(length(er8.udise_sch_code)!=11) as 'examresults_class8 Total School With UDISE CODE length not equal 11 ',
    sum(er8.gen_app_b is null or er8.gen_app_b < 0 or er8.gen_app_b > 5000) as 'examresults_class8 gen_app_b is null or out of range',
    sum(er8.gen_app_g is null or er8.gen_app_g < 0 or er8.gen_app_g > 5000) as 'examresults_class8  gen_app_g is null or out of range',
    sum(er8.sc_app_b is null or er8.sc_app_b < 0 or er8.sc_app_b > 5000) as 'examresults_class8 sc_app_b is null or out of range',
    sum(er8.sc_app_g is null or er8.sc_app_g < 0 or er8.sc_app_g > 5000) as 'examresults_class8  sc_app_g is null or out of range',
    sum(er8.st_app_b is null or er8.st_app_b < 0 or er8.st_app_b > 5000) as 'examresults_class8 st_app_b is null or out of range',
    sum(er8.st_app_g is null or er8.st_app_g < 0 or er8.st_app_g > 5000) as 'examresults_class8 st_app_g is null or out of range ',
    sum(er8.obc_app_b is null or er8.obc_app_b < 0 or er8.obc_app_b > 5000) as 'examresults_class8 obc_app_b is null or out of range',
    sum(er8.obc_app_g is null or er8.obc_app_g < 0 or er8.obc_app_g > 5000) as 'examresults_class8 obc_app_g is null or out of range',
    sum(er8.gen_pass_b is null or er8.gen_pass_b < 0 or er8.gen_pass_b > 5000) as 'examresults_class8 gen_pass_b is null or out of range',
    sum(er8.gen_pass_g is null or er8.gen_pass_g < 0 or er8.gen_pass_g > 5000) as 'examresults_class8 gen_pass_g is null or out of range',
    sum(er8.sc_pass_b is null or er8.sc_pass_b < 0 or er8.sc_pass_b > 5000) as 'examresults_class8 sc_pass_b is null or out of range',
    sum(er8.sc_pass_g is null or er8.sc_pass_g < 0 or er8.sc_pass_g > 5000) as 'examresults_class8 sc_pass_g is null or out of range ',
    sum(er8.st_pass_b is null or er8.st_pass_b < 0 or er8.st_pass_b > 5000) as 'examresults_class8 st_pass_b is null or out of range',
    sum(er8.st_pass_g is null or er8.st_pass_g < 0 or er8.st_pass_g > 5000) as 'examresults_class8 st_pass_g is null or out of range',
    sum(er8.obc_pass_b is null or er8.obc_pass_b < 0 or er8.obc_pass_b > 5000) as 'examresults_class8 obc_pass_b is null or out of range',
    sum(er8.obc_pass_g is null or er8.obc_pass_g < 0 or er8.obc_pass_g > 5000) as 'examresults_class8 obc_pass_g is null or out of range',
    sum(er8.gen_60p_b is null or er8.gen_60p_b < 0 or er8.gen_60p_b > 5000) as 'examresults_class8 gen_60p_b is null or out of range',
    sum(er8.gen_60p_g is null or er8.gen_60p_g < 0 or er8.gen_60p_g > 5000) as 'examresults_class8  gen_60p_g is null or out of range',
    sum(er8.sc_60p_b is null or er8.sc_60p_b < 0 or er8.sc_60p_b > 5000) as 'examresults_class8 sc_60p_b is null or out of range ',
    sum(er8.sc_60p_g is null or er8.sc_60p_g < 0 or er8.sc_60p_g > 5000) as 'examresults_class8 sc_60p_g is null or out of range ',
    sum(er8.st_60p_b is null or er8.st_60p_b < 0 or er8.st_60p_b > 5000) as 'examresults_class8 st_60p_b is null or out of range',
    sum(er8.st_60p_g is null or er8.st_60p_g < 0 or er8.st_60p_g > 5000) as 'examresults_class8 st_60p_g is null or out of range ',
    sum(er8.obc_60p_b is null or er8.obc_60p_b < 0 or er8.obc_60p_b > 5000) as 'examresults_class8 obc_60p_b is null or out of range',
    sum(er8.obc_60p_g is null or er8.obc_60p_g < 0 or er8.obc_60p_g > 5000) as 'examresults_class8 obc_60p_g is null or out of range',
    sum(bb.sch_type=2 and er8.gen_app_b > 0) as 'examresults_class8 school Type is Girls while gen_app_b > 0',
    sum(bb.sch_type=2 and er8.sc_app_b > 0) as 'examresults_class8 school Type is Girls while sc_app_b > 0',
    sum(bb.sch_type=2 and er8.st_app_b > 0) as 'examresults_class8 school Type is Girls while st_app_b > 0',
    sum(bb.sch_type=2 and er8.obc_app_b > 0) as 'examresults_class8 school Type is Girls while obc_app_b > 0',
    sum(bb.sch_type=2 and er8.gen_pass_b > 0) as 'examresults_class8 school Type is Girls while gen_pass_b > 0',
    sum(bb.sch_type=2 and er8.sc_pass_b > 0) as 'examresults_class8 school Type is Girls while sc_pass_b > 0',
    sum(bb.sch_type=2 and er8.st_pass_b > 0) as 'examresults_class8 school Type is Girls while st_pass_b > 0',
    sum(bb.sch_type=2 and er8.obc_pass_b > 0) as 'examresults_class8 school Type is Girls while obc_pass_b > 0',
    sum(bb.sch_type=1 and er8.gen_app_g > 0) as 'examresults_class8 school Type is Girls while gen_app_g > 0',
    sum(bb.sch_type=1 and er8.sc_app_g > 0) as 'examresults_class8 school Type is Girls while sc_app_g > 0',
    sum(bb.sch_type=1 and er8.st_app_g > 0) as 'examresults_class8 school Type is Girls while st_app_g > 0 ',
    sum(bb.sch_type=1 and er8.obc_app_g > 0) as 'examresults_class8 school Type is Girls while obc_app_g > 0',
    sum(bb.sch_type=1 and er8.gen_pass_g > 0) as 'examresults_class8 school Type is Girls while gen_pass_g > 0',
    sum(bb.sch_type=1 and er8.sc_pass_g > 0) as 'examresults_class8 school Type is Girls while sc_pass_g > 0',
    sum(bb.sch_type=1 and er8.st_pass_g > 0) as 'examresults_class8 school Type is Girls while st_pass_g > 0',
    sum(bb.sch_type=1 and er8.obc_pass_g > 0) as 'examresults_class8 school Type is Girls while obc_pass_g > 0',
    sum(er8.gen_app_b<er8.gen_pass_b) as 'examresults_class8 gen_pass_b is more than app',
    sum(er8.sc_app_b<er8.sc_pass_b) as 'examresults_class8 sc_pass_b is more than app ',
    sum(er8.st_app_b<er8.st_pass_b) as 'examresults_class8 st_pass_b is more than app',
    sum(er8.obc_app_b<er8.obc_pass_b) as 'examresults_class8 obc_pass_b is more than app',
    sum(er8.gen_app_g<er8.gen_pass_g) as 'examresults_class8 gen_pass_g is more than app',
    sum(er8.sc_app_g<er8.sc_pass_g) as 'examresults_class8 sc_pass_g is more than app',
    sum(er8.st_app_g<er8.st_pass_g) as 'examresults_class8 st_pass_g is more than app',
    sum(er8.obc_app_g<er8.obc_pass_g) as 'examresults_class8 obc_pass_g is more than app' 
    from mhrd_school_master bb join mhrd_sch_enr_fresh fr on cast(fr.udise_sch_code as unsigned) = bb.old_udise_sch_code join mhrd_sch_enr_reptr re on re.udise_sch_code = fr.udise_sch_code join students_school_child_count sc on sc.school_id=bb.school_id left join mhrd_sch_exmres_c5 er5 on er5.udise_sch_code=fr.udise_sch_code left join mhrd_sch_exmres_c8 er8 on er8.udise_sch_code=fr.udise_sch_code where sc.school_id='.$sch_id.' group by bb.old_udise_sch_code;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }

  public function get_schl3($sch_id){
 
    //echo $sch_id;die();
    $sql = "select sum( length(mhrd_sch_facility.udise_sch_code)!=11 ) as 'Total School With UDISE CODE length not equal 11',
    sum( bld_status is null ) as 'Building Status is null',
    sum( bld_status not in (1,2,3,4,5,7,10) ) as 'Building Status is out of range as per dcf',
    sum( bld_blk_tot is null ) as 'Building Block Total is null',
    sum( bld_blk_tot  < 0 or bld_blk_tot >99 ) as 'Building Block Total is out of range i.e (0-20)',
    sum( bld_blk is null ) as 'Pucca Building is null',
    sum( bld_blk  < 0 or bld_blk > 20 ) as 'Pucca Building out of range i.e (0-20)',
    sum( bld_blk_ppu is null ) as 'Partially pucca (building with pucca walls and floor without concrete roof) is null',
    sum( bld_blk_ppu  < 0 or bld_blk_ppu > 20 ) as 'Partially pucca (building with pucca walls and floor without concrete roof) out of range i.e (0-20)',
    sum( bld_blk_kuc is null ) as 'Kuchcha building is null',
    sum( bld_blk_kuc  < 0 or bld_blk_kuc > 20 ) as 'Kuchcha building is out of range i.e (0-20)',
    sum( bld_blk_tnt is null ) as 'Tent is null',
    sum( bld_blk_tnt  < 0 or bld_blk_tnt > 20 ) as 'Tent is out of range i.e (0-20)',
    sum( bld_blk_dptd is null ) as 'Dilapidated Building is null',
    sum( bld_blk_dptd  < 0 or bld_blk_dptd > 20 ) as 'Dilapidated Building is out of range i.e (0-20)',
    sum( bld_blk_undcons is null ) as 'Building Under Construction is null',
    sum( bld_blk_undcons  < 0 or bld_blk_undcons > 20 ) as 'Building Under Construction is out of range i.e (0-20)',
    sum( bld_blk_tot != (bld_blk+bld_blk_ppu+bld_blk_kuc+bld_blk_tnt+bld_blk_dptd+bld_blk_undcons)) as 'Total Number of building blocks of the school is not equal to sum of (Pucca Building+Partially pucca (building with pucca walls and floor without concrete roof)+Kuchcha building+Tent+Dilapidated Building+Building Under Construction)',sum( bndrywall_type is null ) as 'Type of boundary wall is null',
    sum( bndrywall_type not in (1,2,3,4,5,6,7,8) ) as 'Type of boundary wall is out of range as per DCF',
    sum( clsrms_inst  < 0 or clsrms_inst > 100 ) as 'No. of Classrooms used for instructional purposes is null',
    sum( clsrms_und_cons is null ) as 'No. of classrooms under construction null',
    sum( clsrms_und_cons  < 0 or clsrms_und_cons > 100 ) as 'No. of classrooms under construction is out of range i.e (0 to 100)',
    sum( clsrms_dptd is null ) as 'Total Classrooms in dilapidated condition null',
    sum( clsrms_dptd  < 0 or clsrms_dptd > 100 ) as 'Total Classrooms in dilapidated condition is out of range i.e (0 to 100)',
    sum( clsrms_pre_pri is null and s.sch_category_id in (1,2,3,6) ) as 'Pre-Primary Class room is null',
    sum( clsrms_pre_pri  < 0 or clsrms_pre_pri > 100 ) as 'Pre-Primary is out of range i.e (0 to 100)',
    sum( clsrms_pri is null and s.sch_category_id in (1,2,3,6)) as 'Primary Class room is null',
    sum( clsrms_pri  < 0 or clsrms_pri > 100 ) as 'Primary is out of range i.e (0 to 100)',
    sum( clsrms_upr is null and s.sch_category_id in (2,3,4,5,6,7)) as 'UPPER Primary Class room is null',
    sum( clsrms_upr  < 0 or clsrms_upr > 100 ) as 'UPPER Primary is out of range i.e (0 to 100)',
    sum( clsrms_sec is null and s.sch_category_id in (3,5,6,7,8,10)) as 'Secondary Class room is null',
    sum( clsrms_sec  < 0 or clsrms_sec > 100 ) as 'Secondary is out of range i.e (0 to 100)',
    sum( clsrms_hsec is null and s.sch_category_id in (3,5,10,11)) as 'High Secondary Class room is null',
    sum( clsrms_hsec  < 0 or clsrms_hsec > 100 ) as 'High Secondary is out of range i.e (0 to 100)',
    sum( clsrms_inst != (clsrms_pre_pri+clsrms_pri+clsrms_upr+clsrms_sec+clsrms_hsec)) as 'No. of Classrooms used for instructional purposes not equal to the details by stage/level',sum( clsrms_gd is null ) as 'No. of Classroom Good condition pucca null',
    sum( clsrms_gd  < 0 or clsrms_gd > 100 ) as 'No. of Classroom Good condition pucca is out of range i.e (0 to 100)',
    sum( clsrms_gd_ppu is null ) as 'No. of Classroom Good condition Partially pucca is null',
    sum( clsrms_gd_ppu  < 0 or clsrms_gd_ppu > 100 ) as 'No. of Classroom Good condition Partially pucca is out of range i.e (0 to 100)',
    sum( clsrms_gd_kuc is null ) as 'No. of Classroom Good condition Kuchcha is null',
    sum( clsrms_gd_kuc  < 0 or clsrms_gd_kuc > 100 ) as 'No. of Classroom Good condition Kuchcha is out of range i.e (0 to 100)',
    sum( clsrms_gd_tnt is null ) as 'No. of Classroom Good condition Tent null',
    sum( clsrms_gd_tnt  < 0 or clsrms_gd_tnt > 100 ) as 'No. of Classroom Good condition Tent is out of range i.e (0 to 100)',
    sum( clsrms_min is null ) as 'No. of Classroom Minor Repair pucca is null',
    sum( clsrms_min  < 0 or clsrms_min > 100 ) as 'No. of Classroom Minor Repair pucca is out of range i.e (0 to 100)',
    sum( clsrms_min_ppu is null ) as 'No. of Classroom Minor Repair partial pucca is null',
    sum( clsrms_min_ppu  < 0 or clsrms_min_ppu > 100 ) as 'No. of Classroom Minor Repair partial pucca is out of range i.e (0 to 100)',
    sum( clsrms_min_kun is null ) as 'No. of Classroom Minor Repair Kucucha is null',
    sum( clsrms_min_kun  < 0 or clsrms_min_kun > 100 ) as 'No. of Classroom Minor Repair Kucucha is out of range i.e (0 to 100)',
    sum( clsrms_min_tnt is null ) as 'No. of Classroom Minor Repair Tent is null',
    sum( clsrms_min_tnt  < 0 or clsrms_min_tnt > 100 ) as 'No. of Classroom Minor Repair Tent is out of range i.e (0 to 100)',
    sum( clsrms_maj is null ) as 'No. of Classroom major Repair pucca is null',
    sum( clsrms_maj  < 0 or clsrms_maj > 100 ) as 'No. of Classroom major Repair pucca is out of range i.e (0 to 100)',
    sum( clsrms_maj_ppu is null ) as 'No. of Classroom major Repair partially pucca is null',
    sum( clsrms_maj_ppu  < 0 or clsrms_maj_ppu > 100 ) as 'No. of Classroom major Repair partially pucca is out of range i.e (0 to 100)',
    sum( clsrms_maj_kuc is null ) as 'No. of Classroom major Repair kuchucha null',
    sum( clsrms_maj_kuc  < 0 or clsrms_maj_kuc > 100 ) as 'No. of Classroom major Repair kuchucha is out of range i.e (0 to 100)',
    sum( clsrms_maj_tnt is null ) as 'No. of Classroom major Repair Tent is null',
    sum( clsrms_maj_tnt  < 0 or clsrms_maj_tnt > 100 ) as 'No. of Classroom major Repair Tent is out of range i.e (0 to 100)',
    sum( clsrms_inst != (clsrms_gd +clsrms_gd_ppu +clsrms_gd_kuc +clsrms_gd_tnt +clsrms_min +clsrms_min_ppu +clsrms_min_kun +clsrms_min_tnt +clsrms_maj +clsrms_maj_ppu +clsrms_maj_kuc +clsrms_maj_tnt)) as 'No. of Classrooms used for instructional purposes is not equal to No. of classrooms by condition',
    sum( land_avl_yn is null or land_avl_yn not in (1,2) ) as 'Whether land is available for expansion of school facilities is null or not in (1,2)',
    sum( hm_room_yn is null or land_avl_yn not in (1,2) ) as 'Whether separate room for Head Teacher / Principal available is null or not in (1,2)',
    sum( toilet_yn is null or toilet_yn not in (1,2) ) as 'Does the school have toilet is null or not in (1,2)',sum( s.sch_type  =2 and  toilet_yn =1 and toiletb >0 ) as 'Boys toilet is not zero in case of girls school',
    sum( s.sch_type  =1 and  toilet_yn =1 and toiletg >0) as 'Girls toilet is not zero in case of boys school',
    sum( s.sch_type  in (1,3) and toilet_yn =1 and toiletb_fun is null ) as 'Functional Boys toilet null',
    sum( s.sch_type  =2 and  toilet_yn =1 and toiletb_fun >0 ) as 'Functional Boys toilet is not zero in case girls school',
    sum( toilet_yn =1 and (toiletb_fun is not null and (toiletb_fun  < 0 or toiletb_fun > 30) )) as 
    'Functional Boys toilet is out of range i.e (0-30) if any school exist then inform us :',
    sum( toilet_yn =1 and  (toiletb_fun is not null and toiletb is not null ) and (toiletb  < toiletb_fun) ) as 
    'Functional Boys toilet more than Boys toilet',
    sum( s.sch_type in (2,3) and toilet_yn =1 and toiletg is null ) as 'Girls Toilet is null',
    sum( s.sch_type  =1 and  toilet_yn =1 and toiletg_fun >0 ) as 'Girls Toilet is not zero in case of boys school',
    sum( s.sch_type  in (2,3) and toilet_yn =1 and toiletg_fun is null ) as 'Functional Girls Toilet is null',
    sum( toilet_yn =1 and  (toiletg_fun is not null and (toiletg_fun  < 0 or toiletg_fun > 30))) as 
    'Functional Girls toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( (toiletg_fun is not null and toiletg_fun is not null ) and (toiletg  < toiletg_fun) ) as 'Functional Girls toilet more than total',
    sum( s.sch_type  in (1,3) and toilet_yn =1 and toiletb_cwsn is null ) as 'CWSN Boys Toilet is null',
    sum( s.sch_type  =2 and  toilet_yn =1 and toiletb_cwsn >0 ) as 'CWSN Boys Toilet is not zero in case of Girls school',
    sum( toilet_yn =1 and (toiletb_cwsn is not null and (toiletb_cwsn  < 0 or toiletb_cwsn > 30))) as 
    'CWSN Boys toilet is out of range i.e (0-30) if any school exist then inform us out of range',
    sum( s.sch_type  in (1,3) and  toilet_yn =1 and toiletb_cwsn_fun is null ) as 'Functional CWSN Boys Toilet is null',
    sum( s.sch_type  =2 and  toilet_yn =1 and toiletb_cwsn_fun >0 ) as 'Functional CWSN Boys is not zero in case of Girls school',
    sum( toilet_yn =1 and (toiletb_cwsn_fun is not null and (toiletb_cwsn_fun  < 0 or toiletb_cwsn_fun > 30)) ) as 
    'Functional CWSN Boys toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( (toiletb_cwsn_fun is not null and toiletb_cwsn is not null ) and (toiletb_cwsn  < toiletb_cwsn_fun) ) as 
    'Functional CWSN Boys toilet more than CWSN Boys toilet',
    sum( s.sch_type  in(2,3) and toilet_yn =1 and  toiletg_cwsn is null ) as 'CWSN Girls toilet null',
    sum( s.sch_type =1 and  toilet_yn =1 and toiletg_cwsn >0 ) as 'CWSN Girls is not zero in case of boys school',
    sum( toilet_yn =1 and (toiletg_cwsn is not null and (toiletg_cwsn  < 0 or toiletg_cwsn > 30)) ) as 
    'CWSN Grils toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( s.sch_type  in (2,3) and toilet_yn =1 and toiletg_cwsn_fun is null ) as 'Functional CWSN Girls toilet is null',
    sum( s.sch_type  =1 and  toilet_yn =1 and toiletg_cwsn_fun >0 ) as 'Functional CWSN Girls is not zero in case of boys school',
    sum( toilet_yn =1 and (toiletg_cwsn_fun is not null and (toiletg_cwsn_fun  < 0 or toiletg_cwsn_fun > 30) )) as 
    'Functional CWSN Grils toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( (toiletg_cwsn_fun is not null and toiletg_cwsn is not null ) and (toiletg_cwsn  < toiletg_cwsn_fun) ) as 
    'Functional CWSN Grils more than CWSN Grils',
    sum( s.sch_type in(1,3) and urinalsb is null ) as 'Boys Urinals is null',
    sum( urinalsb is not null and (urinalsb  < 0 or urinalsb > 30) ) as 'Boys Urinals is out of range i.e (0-30) if any school exist then inform us',
    sum( s.sch_type in(1,3) and urinalsb_fun is null ) as 'Functioanl Boys Urinals is null',
    sum( urinalsb_fun is not null and (urinalsb_fun  < 0 or urinalsb_fun > 30) ) as 
    'Functional boys Urinals is out of range i.e (0-30) if any school exist then inform us',
    sum( (urinalsb_fun is not null and urinalsb is not null ) and (urinalsb  < urinalsb_fun) ) as 'Functional boys Urinals more than boys Urinals',
    sum( s.sch_type in(2,3) and urinalsg is null ) as 'Girls Urinals null',
    sum( urinalsg is not null and (urinalsg  < 0 or urinalsg > 30) ) as 'Girls Urinals is out of range i.e (0-30) if any school exist then inform us',
    sum( s.sch_type in(2,3) and urinalsg_fun is null ) as 'Functional Girls Urinals null',
    sum( urinalsg_fun is not null and (urinalsg_fun  < 0 or urinalsg_fun > 30) ) as 
    'Functional Girls Urinals is out of range i.e (0-30) if any school exist then inform us out of range',
    sum( (urinalsg_fun is not null and urinalsg is not null ) and (urinalsg  < urinalsg_fun) ) as 
    'Functional Girls Urinals more than Girls Urinals',
    sum( s.sch_type in(1,3) and toiletb_fun_water is null ) as 'Functional Water in Boys Toilet is null',
    sum( s.sch_type  =2 and  toilet_yn =1 and toiletb_fun_water >0 ) as 'Functional Water in Boys Toilet is not zero in case of Girls school',
    sum( toiletb_fun_water is not null and (toiletb_fun_water  < 0 or toiletb_fun_water > 30) ) as 
    'Functional water in Boys toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( s.sch_type in(2,3) and toiletg_fun_water is null ) as 'Functional Water in Girls toilet null',
    sum( s.sch_type  =1 and  toilet_yn =1 and toiletg_fun_water >0 ) as 'Functional Water in Girls toilet is not zero in case of Boys school',
    sum( toiletg_fun_water is not null and (toiletg_fun_water  < 0 or toiletg_fun_water > 30) ) as 
    'Functional Water in Girls toilet is out of range i.e (0-30) if any school exist then inform us',
    sum( handwash_yn is null or handwash_yn not in (1,2)) as 'Is hand washing facility with soap available near toilets/urinals block? is null or not in (1,2)',
    sum( incinerator_yn is null or incinerator_yn not in (1,2,3)) as 
    'Whether incinerator is available in/ attached to girls toilet is null or not in (1,2,3)',
    sum( drink_water_yn is null or drink_water_yn not in (1,2)) as 'Whether drinking water is available in the school premises? is null or not in (1,2)',
    sum( drink_water_yn = 1 and (hand_pump_yn is null or (hand_pump_yn  < 0 or hand_pump_yn > 2)) ) as 
    'Hand pumps is null or out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (hand_pump_fun_yn is null or (hand_pump_fun_yn  < 0 or hand_pump_fun_yn > 2)) ) as 
    'Functioanl hand pumps out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (hand_pump_fun_yn is not null and hand_pump_fun_yn is not null ) and (hand_pump_yn  > hand_pump_fun_yn) ) as 
    'Functional Hand pumps more than total Hand pumps',
    sum( drink_water_yn = 1 and  (well_prot_yn is  null or (well_prot_yn  < 0 or well_prot_yn > 2)) ) as 
    'protected Well out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (well_prot_fun_yn is null OR (well_prot_fun_yn  < 0 or well_prot_fun_yn > 2) )) as 
    'Functional protected Well out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and (well_prot_fun_yn is not null and well_prot_yn is not null ) and (well_prot_yn  > well_prot_fun_yn) ) as 
    'Functional protected Well more than total protected Well',
    sum( drink_water_yn = 1 and (well_unprot_yn is null OR (well_unprot_yn  < 0 or well_unprot_yn > 2))) as 
    'Total Unprotected Well out of range i.e (0-50) if any school exist then --inform us :',
    sum( drink_water_yn = 1 and  (well_unprot_fun_yn is null OR (well_unprot_fun_yn  < 0 or well_unprot_fun_yn > 2)) ) as 
    'Functional Unprotected Well out of range i.e (0-50) if any school exist then --inform us :',
    sum( drink_water_yn = 1 and (well_unprot_fun_yn is not null and well_unprot_yn is not null ) and (well_unprot_yn  > well_unprot_fun_yn) ) as 
    'Functional Unprotected Well more than total Unprotected Wel',
    sum( drink_water_yn = 1 and (tap_yn is null OR (tap_yn  < 0 or tap_yn > 2) )) as 
    'Total Tap water out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (tap_fun_yn is  null OR (tap_fun_yn  < 0 or tap_fun_yn > 2) )) as 
    'Funcational Tap water out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and (tap_fun_yn is not null and tap_yn is not null ) and (tap_yn  > tap_fun_yn) ) as 
    'Funcational Tap water more than total Tap water',
    sum( drink_water_yn = 1 and (pack_water_yn is null OR (pack_water_yn  < 0 or pack_water_yn > 2)) ) as 
    'Total Packaged/Bottled Water out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (pack_water_fun_yn is null OR (pack_water_fun_yn  < 0 or pack_water_fun_yn > 2) )) as 
    'Functional Packaged/Bottled Water out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and (pack_water_yn is not null and pack_water_fun_yn is not null ) and (pack_water_yn > pack_water_fun_yn) ) as 
    'Functional Packaged/Bottled Water more than total Packaged/Bottled Water',
    sum( drink_water_yn = 1 and othsrc_yn is null OR (othsrc_yn  < 0 or othsrc_yn > 2) ) as 
    'Total Others is out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and  (othsrc_fun_yn is  null OR (othsrc_fun_yn  < 0 or othsrc_fun_yn > 2) )) as 
    'Others Functional is out of range i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 and (othsrc_yn is not null and othsrc_fun_yn is not null ) and (othsrc_yn  > othsrc_fun_yn) ) as 
    'Others Functional more than total Others i.e (0-50) if any school exist then inform us',
    sum( drink_water_yn = 1 AND (water_purifier_yn is null or water_purifier_yn not in (1,2,3))) as 
    'Whether water purifier/RO is available in the school is null or not in (1,2,3)',
    sum( rain_harvest_yn is null or rain_harvest_yn not in (1,2)) as 'Does the school have provision for rain water harvesting is null or not in (1,2)',
    sum( water_tested_yn is null or water_tested_yn not in (1,2)) as 'Whether water quality is tested from water testing lab is null or not in (1,2)',
    sum( handwash_meal_yn is null or handwash_meal_yn not in (1,2)) as 
    'Whether handwashing facility with soap available for washing hands before and after meal is null or not in (1,2)',
    sum( handwash_meal_yn = 1 and  handwash_meal_tot is null) as 'If Yes, number of wash points is null',
    sum( handwash_meal_yn =1 and  handwash_meal_tot is not null and (handwash_meal_tot < 0 or handwash_meal_tot > 50)) as 
    'number of wash points is out of range i.e (0-50) if any school exist then inform us',
    sum( electricity_yn is null or electricity_yn not in (1,2,3) ) as 
    'Whether electricity connection is available in the school is null or not in (1,2,3)',
    sum( solarpanel_yn is null or solarpanel_yn not in (1,2,3) ) as 
    'Whether solar panel is available in school is null or not in (1,2,3)',
    sum( library_yn is null or library_yn not in (1,2) ) as 'Library is null or not in (1,2)',
    sum( library_yn=1 and  lib_books is null ) as 'Total Books is null',
    sum( library_yn=1 and  lib_books is not null and (lib_books < 0 or lib_books > 99999) ) as 
    'Total Books is out of range i.e (0-99999) if any school exist then inform us',
    sum( library_yn=1 and  lib_books_ncert is null ) as 'NCERT BOOKS is null',
    sum( library_yn=1 and  lib_books_ncert is not null and (lib_books_ncert < 0 or lib_books_ncert > 99999) ) as 
    'NCERT BOOKs is out of range i.e (0-99999) if any school exist then inform us',
    sum( lib_books is not null and  lib_books_ncert is not null and (lib_books < lib_books_ncert) ) as 'NCERT Books is more than Total Books',
    sum( bookbank_yn is null or bookbank_yn not in (1,2) ) as 'Book Bank is null or not in (1,2)',
    sum( bookbank_yn=1 and  bkbnk_books is null ) as 'Books in Book Bank is null',
    sum( bookbank_yn=1 and  bkbnk_books is not null and (bkbnk_books < 0 or bkbnk_books > 99999) ) as 
    'Books in Book Bank is out of range i.e (0-99999) if any school exist then inform us',
    sum( bookbank_yn =1 and  bkbnk_books_ncert is null ) as 'NCERT Books in BOOKS BANK is null',
    sum( bookbank_yn =1 and  bkbnk_books_ncert is not null and (bkbnk_books_ncert < 0 or bkbnk_books_ncert > 99999)) as 
    'NCERT BOOKs in BOOKS BANK is out of range i.e (0-99999) if any school exist then inform us',
    sum( bkbnk_books is not null and  bkbnk_books_ncert is not null and (bkbnk_books < bkbnk_books_ncert)) as 
    'NCERT BOOKs in BOOKS BANK is more than Total Book',
    sum( readcorner_yn is null or readcorner_yn not in (1,2)) as 'Reading Corner is null or not in (1,2)',
    sum( readcorner_yn =1 and  readcorner_books is null) as 'Book in Reading Corner is null',
    sum( readcorner_yn =1 and  readcorner_books is not null and (readcorner_books < 0 or readcorner_books > 99999)) as 
    'Book in Reading Corner is out of range i.e (0-99999) if any school exist then inform us',
    sum( librarian_yn is null or librarian_yn not in (1,2)) as 'Does the school have a full-time librarian? null or not in (1,2)',
    sum( newspaper_yn is null or newspaper_yn not in (1,2)) as 'Does the school subscribe to newspapers/magazines null or not in (1,2)',
    sum( playground_yn is null or playground_yn not in (1,2)) as 'Whether Playground facility is available? is null or not in (1,2)',
    sum( playground_yn = 2 AND (playground_alt_yn is null or playground_alt_yn not in (1,2))) as 
    'If no, whether school has made adequate arrangements for children to play outdoor games and other physical activities in an adjoining playground/municipal park etc. is null or not in (1,2)',
    sum( medchk_yn is null or medchk_yn not in (1,2)) as 'Whether Medical check-up of students was conducted in last academic year is null or not in (1,2)',
    sum( medchk_yn =1 and  medchk_tot is null) as 'if yes for Medical check-up, Total number of Medical check-ups conducted in the school during last academic year : is null',
    sum( medchk_yn=1) as 'Total number of Medical check-ups conducted is out of range i.e (0-99)',
    sum( dewormtab_yn is null or dewormtab_yn not in (1,2,3)) as 'De-worming tablets given to children? is null or not in (1,2,3)',
    sum( irontab_yn is null or irontab_yn not in (1,2)) as 'Iron and Folic acid tablets given to children as per guidelines of WCD is null or not in (1,2)',
    sum( ramps_yn is null or ramps_yn not in (1,2)) as 'Whether ramp for disabled children to access school building exists ? null or not in (1,2)',
    sum( ramps_yn = 1 and (handrails_yn is null or handrails_yn not in (1,2))) as 'If yes, whether Hand-rails for ramp is available ? null or not in (1,2)',
    sum( spl_educator_yn is null or spl_educator_yn not in (1,2,3)) as 'Whether School has special educator is null or not in (1,2,3)',
    sum( kitchen_garden_yn is null or kitchen_garden_yn not in (1,2)) as 'Whether Kitchen Garden is available in school? is null or not in (1,2)',
    sum( dstbn_clsrms_yn is null or dstbn_clsrms_yn not in (1,2,3)) as 
    'Does the school have dustbins for collection of waste -Classroom is null or not in (1,2,3)',
    sum( dstbn_toilet_yn is null or dstbn_toilet_yn not in (1,2)) as 'Does the school have dustbins for collection of waste - Toilet null or not in (1,2)',
    sum( dstbn_kitchen_yn is null or dstbn_kitchen_yn not in (1,2)) as 'Does the school have dustbins for collection of waste -Kitchen null or not in 1,2)',
    sum( stus_hv_furnt is null ) as 'No. of students for whom furniture is available ? is null',
    sum( stus_hv_furnt is not null and (stus_hv_furnt < 0 or stus_hv_furnt > 6000)) as 
    'No. of students for whom furniture is available ? is out of range i.e (0-6000)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (comroom_g_yn is null or comroom_g_yn not in (1,2))) as 
    'Separate common room for girls null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (staff_room_yn is null or staff_room_yn not in (1,2))) as 
    'Staffroom for teachers d Co-curricular activity room/arts null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (craft_room_yn is null or craft_room_yn not in (1,2))) as 'crafts room null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (staff_qtr_yn is null or staff_qtr_yn not in (1,2))) as 'Staff quarters null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (integrated_lab_yn is null or integrated_lab_yn not in (1,2))) as 
    'Integrated science laboratory null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (library_room_yn is null or library_room_yn not in (1,2))) as 'Library room is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (comp_room_yn is null or comp_room_yn not in (1,2))) as 'Computer room null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (tinkering_lab_yn is null or tinkering_lab_yn not in (1,2))) as 'Tinkering Lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (phy_lab_yn is null or phy_lab_yn not in (1,2))) as 'Physics lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and phy_lab_yn = 1 and (phy_lab_cond is null or phy_lab_cond not in (0,1,2,3,4))) as 
    'Physics condition lab is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and chem_lab_yn is null or chem_lab_yn not in (1,2)) as 'Chemistry lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and chem_lab_yn = 1 and (chem_lab_cond is null or chem_lab_cond not in (0,1,2,3,4))) as 
    'Chemistry lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and boi_lab_yn is null or boi_lab_yn not in (1,2)) as 'Biology lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and boi_lab_yn = 1 and (bio_lab_cond is null or bio_lab_cond not in (0,1,2,3,4))) as 
    'Biology lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and math_lab_yn is null or math_lab_yn not in (1,2)) as 'Mathematics lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and math_lab_yn = 1 and (math_lab_cond is null or math_lab_cond not in (0,1,2,3,4))) as 
    'Mathematics lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and lang_lab_yn is null or lang_lab_yn not in (1,2)) as 'Language lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and lang_lab_yn = 1 and (lang_lab_cond is null or lang_lab_cond not in (0,1,2,3,4))) as 
    'Language lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and (geo_lab_yn is null or geo_lab_yn not in (1,2))) as 'Geography lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and geo_lab_yn = 1 and (geo_lab_cond is null or geo_lab_cond not in (0,1,2,3,4))) as 
    'Geography lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and (homesc_lab_yn is null or homesc_lab_yn not in (1,2))) as 'Home Science lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and homesc_lab_yn = 1 and (home_sc_lab_cond is null or home_sc_lab_cond not in (0,1,2,3,4))) as 
    'Home Science lab condition is null or not in (0,1,2,3,4)',
    sum( s.sch_category_id in (3,5,10,11) and (psycho_lab_yn is null or psycho_lab_yn not in (1,2))) as 'Psychology lab is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and psycho_lab_yn = 1 and (psycho_lab_cond is null or psycho_lab_cond not in (0,1,2,3,4))) as 
    'Psychology lab condition is null or not in (0,1,2,3,4)',
    sum( audio_system_yn is null or audio_system_yn not in (1,2,3)) as 'Audio/Visual/Public Address System is null or not in (1,2,3)',
    sum( s.sch_category_id != 1 and (sciencekit_yn is null or sciencekit_yn not in (1,2,3))) as 'Science KIt is null or not in (1,2,3)',
    sum( s.sch_category_id != 1 and mathkit_yn is null or mathkit_yn not in (1,2,3)) as 'Math Kit is null or not in (1,2,3)',
    sum( biometric_dev_yn is null or biometric_dev_yn not in (1,2,3)) as 'Biometric device is null or not in (1,2,3)',
    sum( s.sch_category_id != 1 and (ict_lab_yn is null or ict_lab_yn not in (1,2))) as 'Wheather ICT Lab available is null or out of range',
    sum( s.sch_category_id != 1 and (cal_lab_yn is null or cal_lab_yn not in (1,2))) as 'wheather CAL lab available or out of range',
    sum( ict_lab_yn in (1) and s.sch_category_id != 1 and (ict_impl_year is null or (ict_impl_year  < 1715 or ict_impl_year > 2019))) as 
    'Year of implementation is null or not in range',
    sum( ict_lab_yn in (1) and s.sch_category_id != 1 and (ictlab_fun_yn is null or ictlab_fun_yn not in(1,2))) as 
    'Whether the ICT Lab is functional or not is null or not in range(1,2)',
    sum( ict_lab_yn in (1) and s.sch_category_id != 1 and (ict_model_impl is null or ict_model_impl not in(1,2,3))) as 
    'Which model is implemented in the school ? is null or not in range (1,2,3)',
    sum( ict_lab_yn in (1) and s.sch_category_id != 1 and (ict_instr_type is null or ict_instr_type not in(1,2,3))) as 
    'Type of the ICT Instructor in the school is null or not in (1,2,3)',
    sum( laptop_yn is null or laptop_yn not in(1,2)) as 'Laptop/Notebook (Y/N) is null or not in (1,2)',
    sum( laptop_yn= 1 and (laptop_tot is null or laptop_tot>100)) as 'Total Laptop/Notebook is null or not in range',
    sum( laptop_yn= 1 and (laptop_fun is null or laptop_fun > 100)) as 'Functional Laptop/Notebook is null or not in range',
    sum( laptop_yn= 1 and laptop_fun > laptop_tot) as 'Functional Laptop/Notebook more than toal Laptop/Notebook',
    sum( tablets_yn= 1 and (tablets_tot  is null or tablets_tot >100)) as 'Tablets is null or not in range',
    sum( tablets_yn= 1 and (tablets_fun  is null or tablets_fun  > 100)) as 'Functioanl Tablets is null or not in range',
    sum( tablets_yn= 1 and tablets_fun  > tablets_tot) as 'Functional Tablets more than toal Tablets',
    sum( desktop_yn is null or desktop_yn not in(1,2)) as 'Desktop Computers (Y/N)is null or not in range',
    sum( desktop_yn= 1 and (desktop_tot  is null or desktop_tot >100)) as 'Desktop Computers is null or not in range',
    sum( desktop_yn= 1 and (desktop_fun  is null or desktop_fun  > 100)) as 'Functional Desktop Computers is null or not in range',
    sum( desktop_yn= 1 and desktop_fun  > desktop_tot) as 'Functional Desktop Computers more than Desktop Computers',
    sum( teachdev_yn is null or teachdev_yn not in(1,2)) as 'PCs with Integrated Teaching Learning Devices (Y/N) is null or not in range',
    sum( teachdev_yn= 1 and (teachdev_tot  is null or teachdev_tot >10)) as 'PCs with Integrated Teaching Learning Devices is null or not in range',
    sum( teachdev_yn= 1 and (teachdev_fun  is null or teachdev_fun  > 10)) as 
    'Functional PCs with Integrated Teaching Learning Devices is null or not in (1,2)',
    sum( teachdev_yn= 1 and teachdev_fun  > teachdev_tot) as 
    'PCs with Integrated Teaching Learning Devices more than PCs with Integrated Teaching Learning Devices',
    sum( digi_board_yn is null or digi_board_yn not in(1,2)) as 'Digital Boards (Y/N) is null or not in range',
    sum( digi_board_yn= 1 and (digi_board_tot  is null or digi_board_tot >10)) as 'Digital Boards is null or not in range',
    sum( digi_board_yn= 1 and (digi_board_fun  is null or digi_board_fun  > 10)) as 'Functional Digital Boards is null or not in range',
    sum( digi_board_yn= 1 and digi_board_fun  > digi_board_tot) as 'Functional Digital Boards more than Digital Boards',
    sum( server_yn is null or server_yn not in(1,2)) as 'Server(Y/N) is null or not in range',
    sum( server_yn= 1 and (server_tot  is null or server_tot >10)) as 'Server is null or not in range',
    sum( server_yn= 1 and (server_fun  is null or server_fun  > 10)) as 'Functional Server is null or not in range',
    sum( server_yn= 1 and server_fun  > server_tot) as 'Functional Server more than Server',
    sum( projector_yn is null or projector_yn not in(1,2)) as 'Projector is null or not in range',
    sum( projector_yn= 1 and (projector_tot  is null or projector_tot >10)) as 'Total Projector is null or not in range',
    sum( projector_yn= 1 and (projector_fun  is null or projector_fun  > 10)) as 'Fucntional Projector is null or not in range',
    sum( projector_yn= 1 and projector_fun  > projector_tot) as 'Fucntional Projector is more than Projector is',
    sum( led_yn is null or led_yn not in(1,2)) as 'LED(Y/N) is null or not in range',
    sum( led_yn= 1 and (led_tot  is null or led_tot >10)) as 'Total LED is null or not in range',
    sum( led_yn= 1 and (led_fun  is null or led_fun  > 10)) as 'Functional LED is null or not in range',
    sum( led_yn= 1 and led_fun  > led_tot) as 'Functional LED is more than LED',
    sum( printer_yn is null or printer_yn not in(1,2)) as 'Printer(Y/N) is null or not in range',
    sum( printer_yn= 1 and (printer_tot  is null or printer_tot >10)) as 'Total Printer is null or not in range',
    sum( printer_yn= 1 and (printer_fun  is null or printer_fun  > 10)) as 'Functiolnal Printer is null or not in range',
    sum( printer_yn= 1 and printer_fun  > printer_tot) as 'Functiolnal Printer more than Printer',
    sum( scanner_yn is null or scanner_yn not in(1,2)) as 'Scanner(Y/N) is null or not in range',
    sum( scanner_yn= 1 and (scanner_tot  is null or scanner_tot >10)) as 'Total Scanner is null or not in range',
    sum( scanner_yn= 1 and (scanner_fun  is null or scanner_fun  > 10)) as 'Functional Scanner is null or not in range',
    sum( scanner_yn= 1 and scanner_fun  > scanner_tot) as 'Functional Scanner is more than Functional Scanner',
    sum( webcam_yn is null or webcam_yn not in(1,2)) as 'Webcam(Y/N) is null or not in range',
    sum( webcam_yn= 1 and (webcam_tot  is null or webcam_tot >10)) as 'Total Webcam is null or not in range',
    sum( webcam_yn= 1 and (webcam_fun  is null or webcam_fun  > 10)) as 'Functional Webcam is null or not in range',
    sum( webcam_yn= 1 and webcam_fun  > webcam_tot) as 'Functional Webcam is more than Webcam',
    sum( generator_yn is null or generator_yn not in(1,2)) as 'Generator/Invertor/UPS(Y/N) is null or not in range',
    sum( generator_yn= 1 and (generator_tot  is null or generator_tot >5)) as 'Total Generator/Invertor/UPS is null or not in range',
    sum( generator_yn= 1 and (generator_fun  is null or generator_fun  > 5)) as 'Functional Generator/Invertor/UPS is null or not in range',
    sum( generator_yn= 1 and generator_fun  > generator_tot) as 'Functional is more than Generator/Invertor/UPS',
    sum( internet_yn is null or internet_yn not in(1,2)) as 'Internet facility is null or not in range',
    sum( dth_yn is null or dth_yn not in(1,2)) as 'DTH-TV Antenna is null or not in range',
    sum( digi_res_yn is null or digi_res_yn not in(1,2)) as 'E- Content and Digital Resources for I-XII is null or not in range',
    sum( tech_soln_yn is null or tech_soln_yn not in(1,2)) as 'Assistive tech-based solutions for CWSN is null or not in range',
    sum( ict_tools_yn is null or ict_tools_yn not in(1,2)) as 'Whether ICT based tools are used for teaching is null or not in range',
    sum( ict_tools_yn = 1 and ict_teach_hrs > 168) as 'If yes , number of hours spent per week is null or not in range means > 168' 
    from mhrd_sch_facility join mhrd_school_master s on s.old_udise_sch_code=mhrd_sch_facility.udise_sch_code left join students_school_child_count sc on sc.school_id=s.school_id where sc.school_id=".$sch_id." group by mhrd_sch_facility.udise_sch_code;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }

  public function get_schl4($sch_id){
 
    //echo $sch_id;die();
    $sql = "select sum( length(mhrd_sch_profile.udise_sch_code)!=11) as 'Total School With UDISE CODE length not equal 11',
    sum( address is null) as 'address null ',sum( stdcode is null) as 'stdcode null ',
    sum( stdcode is not null and (length(stdcode) < 3 OR length(stdcode) > 5)) as 'stdcode length not correct',
    sum( phone is not null and (length(phone)< 6 OR length(stdcode) > 8)) as 'phone no lenght',
    sum( mobile is null) as 'mobie null',sum( mobile is not null and length(mobile) !=10) as 'mobile  length  not correct',
    sum( mobile is not null and left(mobile,1)<5 ) as ' mobile  not start with 6,7,8 or 9',
    sum( stdcode_resp is null) as 'stdcode_resp null ',
    sum( stdcode_resp is not null and (length(stdcode_resp) < 3 OR length(stdcode_resp) > 5)) as 'stdcode_resp length not correct',
    sum( phone_resp is not null and (length(phone_resp)< 6 OR length(phone_resp) > 8)) as 'phone_resp no lenght',
    sum( mobile_resp is null) as 'mobile_resp null',sum( mobile_resp is not null and length(mobile_resp) !=10) as 'mobile_resp  length  not correct',
    sum( mobile_resp is not null and  left(mobile_resp,1)<5) as 'mobile_resp  not start with 6,7,8 or 9 ',
    sum( resp_name is null) as 'resp_name null',sum( resp_name is not null and length(resp_name) < 3) as 'resp_name  length  not correct',
    sum( s.sch_category_id in (1,2,3,6) and c0_sec is null) as 'c0_sec is null in sch category (1,2,3,6 )',
    sum( s.sch_category_id in (1,2,3,6) and c0_sec is not null and c0_sec > 99) as 'c0_sec has more than 99 sections',
    sum( s.sch_category_id in (1,2,3,6) and c1_sec is null) as 'c1_sec is null in sch category (1,2,3,6 )',
    sum( c1_sec is not null and c1_sec > 99) as ' c1_sec has more than 99 sections ',
    sum( s.sch_category_id in (1,2,3,6) and c2_sec is null) as 'c2_sec is null in sch category (1,2,3,6 )',
    sum( c2_sec is not null and c2_sec > 99) as 'c2_sec has more than 99 sections ',
    sum( c3_sec is null and s.sch_category_id in (1,2,3,6)) as 'c3_sec is null in sch category (1,2,3,6 ) ',
    sum( c3_sec is not null and c3_sec > 99) as 'c3_sec has more than 99 sections ',
    sum( c4_sec is null and s.sch_category_id in (1,2,3,6)) as 'c4_sec is null in sch category (1,2,3,6 )',
    sum( c4_sec is not null and c4_sec > 99) as ' c4_sec has more than 99 sections',
    sum( c5_sec is null and s.sch_category_id in (1,2,3,6)) as 'c5_sec is null in sch category (1,2,3,6 )',
    sum( c5_sec is not null and c5_sec > 99) as 'c5_sec has more than 99 sections',
    sum( c6_sec is null and s.sch_category_id in (2,3,4,5,6,7)) as ' c6_sec is null in sch category (2,3,4,5,6,7 ) ',
    sum( c6_sec is not null and c6_sec > 99) as 'c6_sec has more than 99 sections',
    sum( c7_sec is null and s.sch_category_id in (2,3,4,5,6,7)) as 'c7_sec is null in sch category (2,3,4,5,6,7 )',
    sum( c7_sec is not null and c7_sec > 99) as 'c7_sec has more than 99 sections',
    sum( c8_sec is null and s.sch_category_id in (2,3,4,5,6,7)) as 'c8_sec is null in sch category (2,3,4,5,6,7 ) ',
    sum( c8_sec is not null and c8_sec > 99) as 'c8_sec has more than 99 sections',
    sum( c9_sec is null and s.sch_category_id in (3,5,6,7,8,10)) as 'c9_sec is null in sch category (3,5,6,7,8,10) ',
    sum( c9_sec is not null and c9_sec > 99) as 'c9_sec has more than 99 sections',
    sum( c10_sec is null and s.sch_category_id in (3,5,6,7,8,10)) as 'c10_sec is null in sch category (3,5,6,7,8,10) ',
    sum( c10_sec is not null and c10_sec > 99) as 'c10_sec has more than 99 sections',
    sum( c11_sec is null and s.sch_category_id in (3,5,10,11)) as 'c11_sec is null in sch category (3,5,10,11)',
    sum( c11_sec is not null and c11_sec > 99) as 'c11_sec has more than 99 sections ',
    sum( c12_sec is null and s.sch_category_id in (3,5,10,11)) as 'c12_sec is null in sch category (3,5,10,11)',
    sum( c12_sec is not null and c12_sec > 99) as ' c12_sec has more than 99 sections ',
    sum( estd_year is null) as 'estd_year is  null',
    sum( estd_year is not null and (estd_year < 1715 or estd_year > 2019)) as 'estd_year is not in between 1715 - 2019',
    sum( recog_year_pri is null and s.sch_category_id in (1,2,3,6) and s.sch_mgmt_id in (4,5)) as 'recog_year_pri is null in sch category (1,2,3,6)',
    sum( recog_year_pri is not null and s.sch_category_id in (1,2,3,6) and (recog_year_pri<1715 or recog_year_pri>2019)) as 
    'recog_year_pri is not in between 1715 & 2019',
    sum( recog_year_upr is null and s.sch_category_id in (2,3,4,5,6,7) and s.sch_mgmt_id in (4,5)) as
    'recog_year_upr is null in sch category (1,2,3,6)',
    sum( recog_year_upr is not null and s.sch_category_id in (2,3,4,5,6,7) and (recog_year_upr<1715 or recog_year_pri>2019)) as 
    'recog_year_upr is not in between 1715 & 2019 ',
    sum( recog_year_sec is null and s.sch_category_id in (3,5,6,7,8,10) and s.sch_mgmt_id in (4,5)) as 
    'recog_year_sec is null in sch category (3,5,6,7,8,10)',
    sum( recog_year_sec is not null and s.sch_category_id in (3,5,6,7,8,10) and (recog_year_sec<1715 or recog_year_sec>2019)) as 
    'recog_year_sec is not in between 1715 & 2019 ',
    sum( recog_year_hsec is null and s.sch_category_id in (3,5,10,11) and s.sch_mgmt_id in (4,5)) as 'recog_year_hsec is null in sch category (3,5,10,11)',
    sum( recog_year_hsec is not null and s.sch_category_id in (3,5,10,11) and (recog_year_hsec<1715 or recog_year_hsec>2019)) as 
    'recog_year_hsec is not in between 1715 & 2019 ',
    sum( upgrd_year_ele is not null and (upgrd_year_ele<1715 or upgrd_year_ele>2019)) as 'upgrd_year_ele is not in between 1715 & 2019 ',
    sum( upgrd_year_sec is not null and (upgrd_year_sec<1715 or upgrd_year_sec>2019)) as 'upgrd_year_sec is not in between 1715 & 2019',
    sum( upgrd_year_hsec is not null and (upgrd_year_hsec<1715 or upgrd_year_hsec>2019)) as 'upgrd_year_hsec is not in between 1715 & 2019',
    sum( cwsn_sch_yn is null or cwsn_sch_yn not in (1,2)) as 'cwsn_sch_yn is null or not in (1,2)',
    sum( shift_sch_yn is null or shift_sch_yn not in (1,2)) as 'shift_sch_yn is null or not in (1,2)',
    sum( resi_sch_yn is null or resi_sch_yn not in (1,2)) as 'resi_sch_yn is null or not in (1,2)',
    sum( minority_yn is null or minority_yn not in (1,2)) as 'minority_yn is null or not in (1,2)',
    sum( resi_sch_yn=1 and (resi_sch_type is null or resi_sch_type not in (1,2,3,4,6,7,8))) as 'resi_sch_type is null or not in (1,2,3,4,6,7,8)',
    sum( minority_yn=1 and (minority_type is null or minority_type not in (1,2,3,4,5,6,7,8))) as 'minority_type is null or not in (1,2,3,4,5,6,7,8)',
    sum( s.sch_category_id in (1,2,3,6) and (boarding_pri_yn is null or boarding_pri_yn not in (1,2))) as 'boarding_pri_yn is null or not in (1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (boarding_upr_yn is null or boarding_upr_yn not in (1,2))) as 'boarding_upr_yn is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (boarding_sec_yn is null or boarding_sec_yn not in (1,2))) as 'boarding_sec_yn is null or not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (boarding_hsec_yn is null or boarding_hsec_yn not in (1,2))) as 'boarding_hsec_yn is null or not in (1,2)',
    sum( s.sch_category_id in (1,2,3,6) and (mtongue_pri is null or mtongue_pri not in (1,2))) as 'mtongue_pri is null or not in (1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (prevoc_yn is null or prevoc_yn not in (1,2))) as 'prevoc_yn is null',
    sum( eduvoc_yn is null) as 'eduvoc_yn is null',sum( s.sch_category_id in (3,5,6,7,8,10) and board_sec is null) as 'board_sec is null and in (3,5,6,7,8,10)',
    sum( s.sch_category_id in (3,5,10,11) and board_hsec is null) as ' board_hsec is null and in (3,5,10,11)',
    sum( distance_pri is null or distance_pri>50 ) as 'distance_pri is null',
    sum( distance_upr is null or distance_upr>50) as 'distance_upr is null ',
    sum( distance_sec is null or distance_sec> 50) as 'distance_sec is null',
    sum( distance_hsec is null or distance_sec>50) as 'distance_hsec is null',
    sum( approach_road_yn is null or approach_road_yn not in (1,2)) as 'approach_road_yn is null or not in (1,2)',
    sum(s.ppsec_yn=1 and (anganwadi_yn is null or anganwadi_yn not in (1,2))) as 'anganwadi_yn is null and anganwadi_yn is not Yes/No',
    sum(anganwadi_code is null and anganwadi_yn =1) as 'anganwadi_code is null and anganwadi_yn is Yes',
    sum(anganwadi_stu_b is null and anganwadi_stu_b >5000 and anganwadi_yn =1) as 'anganwadi_stu_b is null and anganwadi_yn is Yes',
    sum(anganwadi_yn=1 and (anganwadi_tch_trained is null or anganwadi_tch_trained not in (1,2))) as 'anganwadi_tch_trained is null or not in (1,2)',
    sum( s.sch_category_id in (1,2,3,6) and (workdays_pri is null or workdays_pri>365)) as 'workdays_pri is null && workdays_pri >365 ',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (workdays_upr is null or workdays_upr>365)) as 'workdays_pri is null && workdays_upr >365',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (workdays_sec is null or workdays_sec>365)) as 'workdays_sec is null && workdays_sec >365',
    sum( s.sch_category_id in (3,5,10,11) and (workdays_hsec is null or workdays_hsec>365)) as 'workdays_hsec is null && workdays_hsec >365',
    sum( s.sch_category_id in (1,2,3,6) and (sch_hrs_stu_pri is null or sch_hrs_stu_pri>10)) as 'sch_hrs_stu_pri is null && sch_hrs_stu_pri >10',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (sch_hrs_stu_upr is null or sch_hrs_stu_upr>10)) as 'sch_hrs_stu_upr is null && sch_hrs_stu_upr >10',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (sch_hrs_stu_sec is null or sch_hrs_stu_sec>10)) as 'sch_hrs_stu_sec is null && sch_hrs_stu_sec >10',
    sum( s.sch_category_id in (3,5,10,11) and (sch_hrs_stu_hsec is null or sch_hrs_stu_hsec>10)) as ' sch_hrs_stu_hsec is null && sch_hrs_stu_hsec >10 ',
    sum( s.sch_category_id in (1,2,3,6) and (sch_hrs_tch_pri is null or sch_hrs_tch_pri>10)) as 'sch_hrs_tch_pri is null or not in (1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (sch_hrs_tch_upr is null or sch_hrs_tch_upr>10)) as 'sch_hrs_tch_upr is null or sch_hrs_tch_upr >10 ',
    sum( s.sch_category_id in (3,5,6,7,8,10) and ( sch_hrs_tch_sec is null or sch_hrs_tch_sec>10)) as 'sch_hrs_tch_sec is null or sch_hrs_tch_sec >10 ',
    sum( s.sch_category_id in (3,5,10,11) and (sch_hrs_tch_hsec is null or sch_hrs_tch_hsec>10)) as 'sch_hrs_tch_hsec is null or> 10) ',
    sum( s.sch_category_id in (1,2,3,6) and (cce_yn_pri is null or cce_yn_pri not in (1,2))) as 
    's.sch_category_id in (1,2,3,6) and cce_yn_pri is null or cce_yn_pri not in (1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (cce_yn_upr is null or cce_yn_upr not in (1,2))) as 
    's.sch_category_id in (2,3,4,5,6,7) and cce_yn_upr  is null or cce_yn_upr  not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (cce_yn_sec is null or cce_yn_sec not in (1,2))) as 
    's.sch_category_id in (3,5,6,7,8,10) and cce_yn_sec  is null or cce_yn_sec  not in (1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (cce_yn_hsec is null or cce_yn_hsec not in (1,2))) as 
    's.sch_category_id in (3,5,10,11) and cce_yn_hsec  is null or cce_yn_hsec  not in (1,2)',
    sum((cce_yn_pri=1 or cce_yn_upr=1 or cce_yn_sec=1 OR cce_yn_hsec=1) and (pcr_maintained_yn is null or pcr_maintained_yn not in (1,2))) as 
    'pcr_maintained_yn  is null or cce_yn_hsec  not in (1,2)',
    sum((cce_yn_pri=1 or cce_yn_upr=1 or cce_yn_sec=1 OR cce_yn_hsec=1) and (pcr_shared_yn is null or pcr_shared_yn not in (1,2))) as 
    'pcr_shared_yn  is null or pcr_shared_yn  not in (1,2)',
    sum( spltrg_yn is null or spltrg_yn not in (1,2)) as 'spltrg_yn is null or spltrg_yn not in (1,2)',
    sum( spltrg_yn=1 and (spltrg_cy_prov_b is null or spltrg_cy_prov_b>5000)) as 'spltrg_yn =1 and (spltrg_cy_prov_b is null or spltrg_cy_prov_b > 5000)',
    sum( spltrg_yn=1 and (spltrg_cy_prov_g is null or spltrg_cy_prov_g>5000)) as 'spltrg_yn =1 and (spltrg_cy_prov_g is null or spltrg_cy_prov_g > 5000) ',
    sum( spltrg_yn=1 and (spltrg_py_enrol_b is null or spltrg_py_enrol_b>5000)) as 'spltrg_yn =1 and (spltrg_py_enrol_b is null or spltrg_py_enrol_b > 5000)',
    sum( spltrg_yn=1 and (spltrg_py_enrol_g is null or spltrg_py_enrol_g>5000)) as 'spltrg_yn =1 and (spltrg_py_enrol_g is null or spltrg_py_enrol_g > 5000)',
    sum( spltrg_yn=1 and (spltrg_py_prov_b is null or spltrg_py_prov_b>5000)) as 'spltrg_yn =1 and (spltrg_py_prov_b is null or spltrg_py_prov_b > 5000)',
    sum( spltrg_yn=1 and (spltrg_py_prov_g is null or spltrg_py_prov_g>5000)) as 'spltrg_yn =1 and (spltrg_py_prov_g is null or spltrg_py_prov_g > 5000)',
    sum( spltrg_yn=1 and (spltrg_by is null or spltrg_by not in (1,2,3,4,5))) as 'spltrg_yn =1 and  (spltrg_by is null or spltrg_by not in (1,2,3,4,5))',
    sum( spltrg_yn=1 and (spltrg_place is null or spltrg_place not in (1,2,3))) as 'spltrg_yn =1 and  (spltrg_place is null or spltrg_place not in 1,2,3))',
    sum( spltrg_yn=1 and (spltrg_type is null or spltrg_type not in (1,2,3))) as 'spltrg_yn =1 and  (spltrg_type is null or spltrg_type not in (1,2,3))',
    sum( remedial_tch_enrol is null or remedial_tch_enrol > 5000) as 'remedial_tch_enrol is null or remedial_tch_enrol > 5000',
    sum( session_start_mon is null or session_start_mon not in (1,2,3,4,5,6,7,8,9,10,11,12)) as 
    'session_start_mon is null or session_start_mon not in (1,2,3,4,5,6,7,8,9,10,11,12) ',
    sum( txtbk_recd_yn is null or txtbk_recd_yn not in (1,2)) as 'txtbk_recd_yn is null or txtbk_recd_yn not in (1,2)',
    sum( txtbk_recd_yn = 1 and (txtbk_recd_mon is null or txtbk_recd_mon not in (1,2,3,4,5,6,7,8,9,10,11,12))) as 
    'txtbk_recd_yn = 1 and (txtbk_recd_mon  is null or txtbk_recd_mon  not in (1,2,3,4,5,6,7,8,9,10,11,12))',
    sum( s.sch_category_id in (1,2,3,6) and (txtbk_pri_yn is null or txtbk_pri_yn not in (0,1,2))) as 'txtbk_pri_yn is null or txtbk_pri_yn  not in (0,1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (txtbk_upr_yn is null or txtbk_upr_yn not in (0,1,2))) as 'txtbk_upr_yn is null or txtbk_upr_yn not in (0,1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (txtbk_sec_yn is null or txtbk_sec_yn not in (0,1,2))) as 
    'txtbk_sec_yn is null or txtbk_sec_yn not in (0,1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (txtbk_hsec_yn is null or txtbk_hsec_yn not in (0,1,2))) as 
    'txtbk_hsec_yn is null or txtbk_hsec_yn not in (0,1,2)',
    sum( s.sch_category_id in (1,2,3,6) and (tle_pri_yn is null or tle_pri_yn not in (0,1,2))) as 'tle_pri_yn is null or tle_pri_yn not in (0,1,2)',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (tle_upr_yn is null or tle_upr_yn not in (0,1,2))) as 'tle_upr_yn is null or tle_upr_yn not in (0,1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (tle_sec_yn is null or tle_sec_yn not in (0,1,2))) as 'tle_sec_yn is null or tle_sec_yn not in (0,1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (tle_hsec_yn is null or tle_hsec_yn not in (0,1,2))) as 'tle_hsec_yn is null or tle_hsec_yn not in (0,1,2)',
    sum( s.sch_category_id in (1,2,3,6) and (playmat_pri_yn is null or playmat_pri_yn not in (0,1,2))) as 
    'playmat_pri_yn is null or playmat_pri_yn not in (0,1,2) ',
    sum( s.sch_category_id in (2,3,4,5,6,7) and (playmat_upr_yn is null or playmat_upr_yn not in (0,1,2))) as 
    'playmat_upr_yn is null or playmat_upr_yn not in (0,1,2) ',
    sum( s.sch_category_id in (3,5,6,7,8,10) and (playmat_sec_yn is null or playmat_sec_yn not in (0,1,2))) as 
    'playmat_sec_yn is null or playmat_sec_yn not in (0,1,2)',
    sum( s.sch_category_id in (3,5,10,11) and (playmat_hsec_yn is null or playmat_hsec_yn not in (0,1,2))) as 
    'playmat_hsec_yn  is null or playmat_hsec_yn not in (0,1,2)',
    sum( no_inspect is null or no_inspect >99) as 'no_inspect is null or no_inspect >99 ',
    sum( no_visit_crc is null or no_visit_crc >99) as 'no_visit_crc is null or no_visit_crc >99',
    sum( no_visit_brc is null or no_visit_brc >99) as 'no_visit_brc is null or no_visit_brc >99',
    sum( no_visit_dis is null or no_visit_dis >99) as 'no_visit_dis is null or no_visit_dis >99',
    sum( s.sch_category_id in (1,2,3,4,5,6,7) and (smc_yn is null or smc_yn not in (1,2))) as 'smc_yn is null or smc_yn not in (1,2)',
    sum( smc_yn =1 and (smc_mem_m is null or smc_mem_m > 100)) as 'smc_mem_m is null or > 100',
    sum( smc_yn =1 and (smc_mem_f is null or smc_mem_f > 100)) as 'smc_mem_f is null or > 100',
    sum( smc_yn =1 and (smc_par_m is null or smc_par_m > 100)) as 'smc_par_m is null or > 100',
    sum( smc_yn =1 and (smc_par_f is null or smc_par_f > 100)) as 'smc_par_f is null or > 100',
    sum( smc_yn =1 and (smc_par_min is null or smc_par_min > 100)) as 'smc_par_min is null or > 100 ',
    sum( smc_yn =1 and (smc_par_sc is null or smc_par_sc > 100)) as 'smc_par_sc is null or > 100',
    sum( smc_yn =1 and (smc_par_st is null or smc_par_st > 100)) as 'smc_par_st is null or > 100',
    sum( smc_yn =1 and (smc_par_ews is null or smc_par_ews > 100)) as 'smc_par_ews is null or > 100',
    sum( smc_yn =1 and (smc_lgb_m is null or smc_lgb_m > 100)) as 'smc_lgb_m is null or > 100',
    sum( smc_yn =1 and (smc_lgb_f is null or smc_lgb_f > 100)) as 'smc_lgb_f is null or > 100 ',
    sum( smc_yn =1 and (smc_tch_m is null or smc_tch_m > 100)) as 'smc_tch_m null or > 100 ',
    sum( smc_yn =1 and (smc_tch_f is null or smc_tch_f > 100)) as 'smc_tch_f is null or > 100',
    sum( smc_yn =1 and (smc_trained_m is null or smc_trained_m > 100)) as 'smc_trained_m is null or > 100',
    sum( smc_yn =1 and (smc_trained_f is null or smc_trained_f > 100)) as 'smc_trained_f is null or > 100',
    sum( smc_yn =1 and (smc_lgb_f is null or smc_lgb_f > 100)) as 'smc_lgb_f is null or > 100',
    sum( smc_yn =1 and (smc_tch_m is null or smc_tch_m > 100)) as ' smc_tch_m null or > 100 ',
    sum( smc_yn =1 and (smc_tch_f is null or smc_tch_f > 100)) as 'smc_tch_f is null or > 100',
    sum( smc_yn =1 and (smc_sdp_yn is null or smc_sdp_yn not in (1,2))) as 'smc_sdp_yn is null or > not in (1,2)',
    sum( smc_yn =1 and (smc_bnkac_yn is null or smc_bnkac_yn not in (1,2))) as 'smc_bnkac_yn is null or > not in (1,2)',
    sum( smc_yn =1 and smc_bnkac_yn =1 and (smc_bnk_name is null or length(smc_bnk_name)< 3 )) as 'smc_bnk_name is null or smc_bnk_name < 3',
    sum( smc_yn =1 and smc_bnkac_yn =1 and (smc_bnk_br is null or length(smc_bnk_br)< 3 )) as 'smc_bnk_br is null or  smc_bnk_br < 3',
    sum( smc_yn =1 and smc_bnkac_yn =1 and (smc_bnkac_no is null or length(smc_bnkac_no)>16 )) as 'smc_bnkac_no is null or smc_bnkac_no > 3',
    sum( smc_yn =1 and smc_bnkac_yn =1 and (smc_bnkac_ifsc is null or length(smc_bnkac_ifsc) != 11 )) as 'smc_bnkac_ifsc is null or  smc_bnkac_ifsc !=11',
    sum( smc_yn =1 and smc_bnkac_yn =1 and (smc_bnkac_name is null or length(smc_bnkac_name)< 3 )) as 'smc_bnkac_name is null or  smc_bnkac_name < 3',
    sum( s.sch_category_id in (1,2,3,4,5,6,7) and (smdc_smc_same_yn is null or smdc_smc_same_yn not in (1,2))) as 
    'smdc_smc_same_yn is null or smdc_smc_same_yn not in (1,2)',
    sum( s.sch_category_id in (3,5,6,7,8,10,11) and (smdc_yn is null or smdc_yn not in (1,2))) as 'smdc_yn is null or not in (1,2)',
    sum( smdc_yn =1 and (smdc_mem_m is null or smdc_mem_m > 100)) as 'smdc_mem_m is null or > 100',
    sum( smdc_yn =1 and (smdc_mem_f is null or smdc_mem_f > 100)) as ' smdc_mem_f is null or > 100',
    sum( smdc_yn =1 and (smdc_par_m is null or smdc_par_m > 100)) as 'smc_par_m is null or > 100 ',
    sum( smdc_yn =1 and (smdc_par_f is null or smdc_par_f > 100)) as 'smdc_par_m is null or > 100',
    sum( smdc_yn =1 and (smdc_par_ews_m is null or smdc_par_ews_m > 100)) as 'smdc_par_ews_m is null or > 100',
    sum( smdc_yn =1 and (smdc_par_ews_f is null or smdc_par_ews_f > 100)) as 'smdc_par_ews_f is null or > 100',
    sum( smdc_yn =1 and (smdc_lgb_m is null or smdc_lgb_m > 100)) as 'smdc_lgb_m is null or > 100',
    sum( smdc_yn =1 and (smdc_lgb_f is null or smdc_lgb_f > 100)) as 'smdc_lgb_f is null or > 100',
    sum( smdc_yn =1 and (smc_lgb_m is null or smc_lgb_m > 100)) as 'smc_lgb_m is null or > 100 ',
    sum( smdc_yn =1 and (smdc_ebmc_m is null or smdc_ebmc_m > 100)) as 'smdc_ebmc_m is null or > 100 ',
    sum( smdc_yn =1 and (smdc_ebmc_f is null or smdc_ebmc_f > 100)) as 'smdc_ebmc_f null or > 100 ',
    sum( smdc_yn =1 and (smdc_women_f is null or smdc_women_f > 100)) as 'smdc_women_f is null or > 100',
    sum( smdc_yn =1 and (smdc_scst_m is null or smdc_scst_m > 100)) as 'smdc_scst_m is null or > 100 ',
    sum( smdc_yn =1 and (smdc_scst_f is null or smdc_scst_f > 100)) as 'smdc_scst_f is null or > 100 ',
    sum( smdc_yn =1 and (smdc_deo_m is null or smdc_deo_m > 100)) as 'smdc_deo_m is null or > 100',
    sum( smdc_yn =1 and (smdc_deo_f is null or smdc_deo_f > 100)) as 'smdc_deo_f null or > 100',
    sum( smdc_yn =1 and (smdc_audit_f is null or smdc_audit_f > 100)) as 'smdc_audit_f is null or > 100',
    sum( smdc_yn =1 and (smdc_audit_m is null or smdc_audit_m > 100)) as 'smdc_audit_m is null or > 100',
    sum( smdc_yn =1 and (smdc_subexp_m is null or smdc_subexp_m > 100)) as 'smdc_subexp_m is null or > 100',
    sum( smdc_yn =1 and (smdc_subexp_f is null or smdc_subexp_f > 100)) as 'smdc_subexp_f null or > 100',
    sum( smdc_yn =1 and (smdc_tch_m is null or smdc_tch_m > 100)) as 'smdc_tch_m is null or > 100 ',
    sum( smdc_yn =1 and (smdc_tch_f is null or smdc_tch_f > 100)) as 'smdc_tch_f is null or > 100',
    sum( smdc_yn =1 and (smdc_vp_m is null or smdc_vp_m > 100)) as 'smdc_vp_m is null or > 100',
    sum( smdc_yn =1 and (smdc_vp_f is null or smdc_vp_f > 100)) as 'smdc_vp_f null or > 100',
    sum( smdc_yn =1 and (smdc_cp_m is null or smdc_cp_m > 100)) as 'smdc_cp_m is null or > 100',
    sum( smdc_yn =1 and (smdc_cp_f is null or smdc_cp_f > 100)) as 'smdc_cp_f is null or > 100',
    sum( smdc_yn =1 and (smdc_trained_m is null or smdc_trained_m > 100)) as 'smdc_trained_m is null or > 100',
    sum( smdc_yn =1 and (smdc_trained_f is null or smdc_trained_f > 100)) as ' smdc_trained_f is null or > 100',
    sum( smdc_yn =1 and (smdc_meetings is null or smdc_meetings > 100)) as 'smdc_meetings is null or > 100',
    sum( smdc_yn =1 and (smdc_sdp_yn is null or smdc_sdp_yn not in (1,2))) as 'smdc_sdp_yn is null or > not in (1,2)',
    sum( smdc_yn =1 and (smdc_bnkac_yn is null or smdc_bnkac_yn not in (1,2))) as 'smc_bnkac_yn is null or > not in (1,2)',
    sum( smdc_yn =1 and smdc_bnkac_yn =1 and (smdc_bnk_name is null or length(smdc_bnk_name)< 3 )) as 'smdc_bnk_name is null or  smdc_bnk_name < 3',
    sum( smdc_yn =1 and smdc_bnkac_yn =1 and (smdc_bnk_br is null or length(smdc_bnk_br)< 3 )) as 'smdc_bnk_br is null or  smdc_bnk_br < 3',
    sum( smdc_yn =1 and smdc_bnkac_yn =1 and (smdc_bnkac_no is null or length(smdc_bnkac_no)>16 )) as 'smc_bnkac_no is null or  smdc_bnkac_no > 3',
    sum( smdc_yn =1 and smdc_bnkac_yn =1 and (smdc_bnkac_ifsc is null or length(smdc_bnkac_ifsc) != 11 )) as 
    'smdc_bnkac_ifsc is null or  smdc_bnkac_ifsc !=11',
    sum( smdc_yn =1 and smdc_bnkac_yn =1 and (smdc_bnkac_name is null or length(smdc_bnkac_name)< 3 )) as 
    'smdc_bnkac_name is null or  sdmc_bnkac_name < 3 ',
    sum( smdc_yn =1 and (smdc_sbc_yn is null or smdc_sbc_yn not in (1,2))) as 'smdc_sbc_yn is null or > not in (1,2) ',
    sum( smdc_yn =1 and (smdc_acadcom_yn is null or smdc_acadcom_yn not in (1,2))) as 'smdc_acadcom_yn is null or > not in (1,2)',
    sum( smdc_yn =1 and (smdc_pta_yn is null or smdc_pta_yn not in (1,2))) as 'smdc_pta_yn is null or > not in (1,2)',
    sum( smdc_pta_yn =1 and (smdc_pta_meeting is null or smdc_pta_meeting < 0)) as 'smdc_pta_meeting is null or < 0' from 
    mhrd_sch_profile join mhrd_school_master s on s.old_udise_sch_code=mhrd_sch_profile.udise_sch_code left join students_school_child_count sc on sc.school_id=s.school_id where sc.school_id=".$sch_id." group by mhrd_sch_profile.udise_sch_code;";

      $result = $this->db->query($sql);
      print_r($this->db->last_query());die();
      return $result->result_array();
  }

  public function get_schl5($sch_id){
 
    //echo $sch_id;die();
    $sql = "select sum(length(st.udise_sch_code)!=11) as 'Total School With UDISE CODE length not equal 11 ',
    sum(st.nontch_accnt  is null and s.sch_category_id !=1) as 'nontch_accnt null',
    sum(st.nontch_accnt  is not null and (nontch_accnt  < 0 or nontch_accnt > 100 )) as 'nontch_accnt out of range',
    sum(st.nontch_lib_asst  is null and s.sch_category_id !=1) as 'nontch_lib_asst null ',
    sum(st.nontch_lib_asst  is not null and (nontch_lib_asst  < 0 or nontch_lib_asst > 100 )) as 'nontch_lib_asst out of range',
    sum(st.nontch_lab_asst  is null and s.sch_category_id !=1 ) as 'nontch_lab_asst null',
    sum(st.nontch_lab_asst  is not null and (nontch_lab_asst  < 0 or nontch_lab_asst > 100 )) as 'nontch_lab_asst out of range ',
    sum(st.nontch_udc  is null and s.sch_category_id !=1) as 'nontch_udc null',
    sum(st.nontch_udc  is not null and (nontch_udc  < 0 or nontch_udc > 100 )) as 'nontch_udc out of range',
    sum(st.nontch_ldc  is null and s.sch_category_id !=1) as 'nontch_ldc null',
    sum(st.nontch_ldc  is not null and (nontch_ldc  < 0 or nontch_ldc > 100 ))  as 'nontch_ldc out of range',
    sum(st.nontch_peon  is null and s.sch_category_id !=1) as 'nontch_peon null',
    sum(st.nontch_peon  is not null and (nontch_peon  < 0 or nontch_peon > 32000 )) as 'nontch_peon out of range',
    sum(st.nontch_watchman  is null and s.sch_category_id !=1 ) as 'nontch_watchman null',
    sum(st.nontch_watchman  is not null and (nontch_watchman  < 0 or nontch_watchman > 32000 )) as 'nontch_watchman out of range',
    sum(st.tch_regular  is null) as 'tch_regular null',
    sum(st.tch_regular  is not null and (tch_regular  < 0 or tch_regular > 32000 )) as 'tch_regular out of range',
    sum(st.tch_contract  is null) as 'tch_contract null',
    sum(st.tch_contract  is not null and (tch_contract  < 0 or tch_contract > 32000 )) as ' tch_contract out of range',
    sum(st.tch_part_time  is null ) as 'tch_part_time null ',
    sum(s.sch_category_id in (8,10,11) and st.tch_part_time  is not null and (st.tch_part_time  < 0 or st.tch_part_time > 32000 )) as 
    'tch_part_time out of range',
    sum(s.sch_category_id not in (8,10,11) and st.tch_part_time !=0) as 'tch_part_time is available for category other than (8,10,11)',
    sum(st.tch_hav_adhr  is null) as 'tch_hav_adhr null',
    sum(st.tch_hav_adhr  is not null and (tch_hav_adhr  < 0 or tch_hav_adhr > 32000 )) as 'tch_hav_adhr out of range',
    sum(st.tch_hav_adhr  is not null and tch_contract is not null and tch_part_time is not null and tch_regular is not null and (tch_hav_adhr > (tch_contract+tch_part_time+tch_regular) )) as 'tch_hav_adhr more than total teacher',
    sum(length(mtp.udise_sch_code)!=11) as 'Total School With UDISE CODE length not equal 11',
    sum(mtp.name is null or length(mtp.name) <3) as 'name is null or length < 3 ',
    sum(mtp.gender is null) as 'gender null',
    sum(mtp.gender is not null and gender not in (1,2,3)) as 'gender out of range',
    sum(mtp. dob is not null and ( year(dob)  < 1944 or year(dob)  > 2002)) as 'dob should out of teacher age window',
    sum(mtp.social_cat is null ) as 'social_cat null',
    sum(mtp.social_cat is not null and  social_cat not in (1,2,3,4,5,6)) as 'social_cat out of range',
    sum(mtp.tch_type is null) as 'tch_type null',sum(mtp.tch_type is not null and (tch_type not between 1 and 100)) as 'tch_type out of range',
    sum(mtp.nature_of_appt is null) as 'nature_of_appt null',
    sum(mtp.nature_of_appt is not null and  nature_of_appt not in (1,2,3)) as 'nature_of_appt out of range',
    sum(mtp.doj_service is null) as 'doj_service null',
    sum(mtp.doj_service is not null and  year(doj_service) < year(dob)+15)  as 'doj_service out of range',
    sum(mtp.qual_acad is null) as 'qual_acad null',
    sum(mtp.qual_acad is not null and  qual_acad not in (1,2,3,4,5,6,7,8)) as 'qual_acad out of range',
    sum(mtp.qual_prof is null) as 'qual_prof null',
    sum(mtp.qual_prof is not null and  qual_prof not in (1,2,3,4,5,6,7,8)) as 'qual_prof out of range',
    sum(mtp.class_taught is null) as 'class_taught null',
    sum(mtp.class_taught is not null and  class_taught not in (1,2,3,4,5,6,7,8,10,11)) as 'class_taught out of range',
    sum(s.sch_category_id=1 and mtp.class_taught not in (1,10,11)) as Other_Class_taught_in_Primary_1to5,
    sum(s.sch_category_id=2 and mtp.class_taught not in (1,2,3,10,11)) as Other_Class_taught_in_Middle_1to8,
    sum(s.sch_category_id=3 and mtp.class_taught not in (1,2,3,5,6,7,8,10,11)) as Other_Class_taught_in_HigherSec_1to12,
    sum(s.sch_category_id=4 and mtp.class_taught not in (2)) as Other_Class_taught_in_Middle_6to8,
    sum(s.sch_category_id=5 and mtp.class_taught not in (2,5,6,7,8)) as Other_Class_taught_in_High_6to12,
    sum(s.sch_category_id=6 and mtp.class_taught not in (1,2,3,5,7,10,11)) as Other_Class_taught_in_High_1to10,
    sum(s.sch_category_id=7 and mtp.class_taught not in (2,7,5)) as Other_Class_taught_in_High_6to10,
    sum(s.sch_category_id=8 and mtp.class_taught not in (5)) as Other_Class_taught_in_High_9to10,
    sum(s.sch_category_id=10 and mtp.class_taught not in (5,6,7,8)) as Other_Class_taught_in_HigherSec_9to12,
    sum(s.sch_category_id=11 and mtp.class_taught not in (6)) as Other_Class_taught_in_HigherSec_11to12,
    sum(mtp.appt_sub is null ) as 'appt_sub null ',
    sum(mtp.appt_sub is not null and  (appt_sub not between 1 and 93)) as 'appt_sub out of range',
    sum(mtp.sub_taught1 is null ) as ' sub_taught1 null ',
    sum(mtp.sub_taught1 is not null and  (sub_taught1 not between 1 and 98)) as 'sub_taught1 out of range',
    sum(mtp.sub_taught2 is null) as 'sub_taught2 null',
    sum(mtp.sub_taught2 is not null and  (sub_taught2 not between 1 and 98)) as 'sub_taught2 out of range',
    sum(mtp.sub_taught1 is not null and  sub_taught2 is not null and sub_taught1=sub_taught2) as 
    'sub_taught1 and sub_taught2 are not null and equal to each other',
    sum(s.sch_category_id not in (8,10,11) and trn_brc  is null) as 'trn_brc is null',
    sum(s.sch_category_id not in (8,10,11) and trn_brc  is not null and (trn_brc < 0 or trn_brc > 366)) as 'trn_brc out of range',
    sum(s.sch_category_id not in (8,10,11) and  trn_crc  is null) as 'trn_crc null',
    sum(s.sch_category_id not in (8,10,11) and trn_crc  is not null and (trn_crc  < 0 or trn_crc > 366)) as 'trn_crc out of range',
    sum(s.sch_category_id not in (8,10,11) and  trn_diet  is null) as 'trn_diet null',
    sum(s.sch_category_id not in (8,10,11) and  trn_diet  is not null and (trn_diet  < 0 or trn_diet > 366)) as 'trn_diet out of range',
    sum(mtp.trn_other  is null) as 'trn_other null',
    sum(mtp.trn_other  is not null and (trn_other < 0 or trn_other > 366)) as 'trn_other out of range',
    sum(mtp.trng_rcvd  is null) as 'trgRcvd null',
    sum(mtp.trng_rcvd  is not null and trng_rcvd not in (0,1,2,3,4,5,6,7))  as 'trgRcvd out of range',
    sum(mtp.trng_needed  is null) as 'trng_needed null',
    sum(mtp.trng_needed is not null and trng_needed not in (0,1,2,3,4,5,6,7)) as 'trng_needed out of range ',
    sum(mtp. nontch_days  is null) as 'nontch_days null',
    sum(mtp.nontch_days  is not null and (nontch_days  < 0 or nontch_days > 366 )) as ' nontch_days out of range',
    sum(mtp.math_upto  is null) as 'math_upto null',
    sum(mtp.math_upto  is not null and math_upto not in (1,2,3,4,5,6,7,8)) as 'math_upto out of range',
    sum(mtp.science_upto  is null) as 'science_upto null',
    sum(mtp.science_upto  is not null and science_upto not in (1,2,3,4,5,6,7,8)) as 'science_upto out of range',
    sum(mtp.english_upto  is null) as 'english_upto null',
    sum(mtp.english_upto  is not null and english_upto not in (1,2,3,4,5,6,7,8)) as 'english_upto out of range',
    sum(mtp.lang_study_upto  is null) as 'lang_study_upto null',
    sum(mtp.lang_study_upto  is not null and lang_study_upto not in (1,2,3,4,5,6,7,8)) as 'lang_study_upto out of range',
    sum(mtp.soc_study_upto  is null)  as ' soc_study_upto null',
    sum(mtp.soc_study_upto  is not null and soc_study_upto not in (1,2,3,4,5,6,7,8)) as 'soc_study_upto out of range',
    sum(mtp.yoj_pres_sch is null) as 'yoj_pres_sch null',
    sum(mtp.yoj_pres_sch is not null and yoj_pres_sch < year(doj_service)) as 'Yr of present school less than doj service',
    sum(mtp.disability_type is null) as 'disability_type null',
    sum(mtp.disability_type is not null and disability_type not in (1,2,3,4,5)) as 'disability_type out of range ',
    sum(mtp.trained_cwsn  is null)  as 'trained_cwsn null',
    sum(mtp.trained_cwsn  is not null and trained_cwsn not in (1,2)) as 'trained_cwsn out of range',
    sum(mtp.trained_comp  is null) as 'trained_comp null',
    sum(mtp.trained_comp  is not null and trained_comp not in (1,2)) as 'trained_comp out of range',
    sum(mtp.yoj_pres_sch is not null and ( mtp.yoj_pres_sch  < 1947 or mtp.yoj_pres_sch  > year(now()) )) as 'yoj_pres_sch out of range',
    sum(mtp.mobile is null) as ' mobile null ',sum(mtp.mobile is not null and length(mobile) !=10) as 'mobile  length  not correct',
    sum(mtp.mobile is not null and left(mobile,1)<5) as 'mobile  not start with 6,7,8 or 9 : %'
    from  mhrd_school_master s left Join  mhrd_tch_profile mtp on s.old_udise_sch_code = cast(mtp.udise_sch_code as unsigned) Join  mhrd_sch_staff_posn st on mtp.udise_sch_code = st.udise_sch_code join students_school_child_count sc on sc.school_id=s.school_id where sc.school_id=".$sch_id." group by s.school_id;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }

  public function get_schl6($sch_id){
 
    //echo $sch_id;die();
    $sql = "select sum(length(fr.udise_sch_code)!=11) as 'fresh enrollment Total School in udise_sch_code',
    sum(fr.item_group not in (1,2,3,4,5))  as 'fresh enrollment item_group is out of range',
    sum(fr.item_id not in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,50)) as 'fresh enrollment item_id is out of range',
    sum(fr.cpp_b is null or fr.cpp_b < 0 or fr.cpp_b > 5000) as 'fresh enrollment cpp_b is null or cpp_b out of range',
    sum(fr.c1_b is null or fr.c1_b < 0 or fr.c1_b > 5000) as 'fresh enrollment class1_boys is null or class1_boys out of range',
    sum(fr.c2_b is null or fr.c2_b < 0 or fr.c2_b > 5000)  as 'fresh enrollment class2_boys is null or class2_boys out of range',
    sum(fr.c3_b is null or fr.c3_b < 0 or fr.c3_b > 5000)  as 'fresh enrollment class3_boys is null or class3_boys out of range',
    sum(fr.c4_b is null or fr.c4_b< 0 or fr.c4_b> 5000) as ' fresh enrollment class4_boys is null or class4_boys out of range',
    sum(fr.c5_b is null or fr.c5_b< 0 or fr.c5_b > 5000)  as 'fresh enrollment class5_boys is null or class5_boys out of range',
    sum(fr.c6_b is null or fr.c6_b< 0 or fr.c6_b > 5000) as 'fresh enrollment class6_boys is null or class6_boys out of range',
    sum(fr.c7_b is null or fr.c7_b < 0 or fr.c7_b > 5000) as 'fresh enrollment class7_boys is null or class7_boys out of range',
    sum(fr.c8_b is null or fr.c8_b< 0 or fr.c8_b > 5000)  as 'fresh enrollment class8_boys is null or class8_boys out of range',
    sum(fr.c9_b is null or fr.c9_b < 0 or fr.c9_b > 5000) as 'fresh enrollment class9_boys is null or class9_boys out of range',
    sum(fr.c10_b is null or fr.c10_b < 0 or fr.c10_b > 5000)  as 'fresh enrollment class10_boys is null or class10_boys out of range',
    sum(fr.c11_b is null or fr.c11_b < 0 or fr.c11_b > 5000) as 'fresh enrollment class11_boys is null or class11_boys out of range',
    Sum(fr.c12_b is null or fr.c12_b < 0 or fr.c12_b > 5000) as 'fresh enrollment class12_boys is null or class11_boys out of range',
    Sum(fr.cpp_g is null or fr.cpp_g < 0 or fr.cpp_g > 5000) as 'fresh enrollment cpp_g is null or cpp_g out of range',
    Sum(fr.c1_g is null or fr.c1_g < 0 or fr.c1_g > 5000) as 'fresh enrollment class1_girls is null or class1_girls out of range',
    Sum(fr.c2_g is null or fr.c2_g < 0 or fr.c2_g > 5000)  as 'fresh enrollment class2_girls is null or class2_girls out of range',
    Sum(fr.c3_g is null or fr.c3_g < 0 or fr.c3_g > 5000) as 'fresh enrollment class3_girls is null or class3_girls out of range',
    Sum(fr.c4_g is null or fr.c4_g < 0 or fr.c4_g > 5000) as 'fresh enrollment class4_girls is null or class4_girls out of range',
    Sum(fr.c5_g is null or fr.c5_g < 0 or fr.c5_g > 5000) as 'fresh enrollment class5_girls is null or class5_girls out of range',
    Sum(fr.c6_g is null or fr.c6_g < 0 or fr.c6_g > 5000) as 'fresh enrollment class6_girls is null or class6_girls out of range',
    Sum(fr.c7_g is null or fr.c7_g < 0 or fr.c7_g > 5000) as 'fresh enrollment class7_girls is null or class7_girls out of range',
    Sum(fr.c8_g is null or fr.c8_g < 0 or fr.c8_g > 5000) as 'fresh enrollment class8_girls is null or class8_girls out of range',
    Sum(fr.c9_g is null or fr.c9_g < 0 or fr.c9_g > 5000) as 'fresh enrollment class9_girls is null or class9_girls out of range',
    Sum(fr.c10_g is null or fr.c10_g < 0 or fr.c10_g > 5000) as 'fresh enrollment class10_girls is null or class10_girls out of range',
    Sum(fr.c11_g is null or fr.c11_g < 0 or fr.c11_g > 5000)  as 'fresh enrollment class11_girls is null or class11_girls out of range',
    Sum(fr.c12_g is null or fr.c12_g < 0 or fr.c12_g > 5000) as 'fresh enrollment class12_girls is null or class12_girls out of range',
    Sum(bb.sch_type=2 and fr.cpp_b > 0)  as 'fresh enrollment school Type is Girls while cpp_b > 0',
    Sum(bb.sch_type=2 and fr.c1_b > 0)  as 'fresh enrollment school Type is Girls while class1_boys > 0',
    Sum(bb.sch_type=2 and fr.c2_b > 0) as 'fresh enrollment school Type is Girls while class2_boys > 0',
    Sum(bb.sch_type=2 and fr.c3_b > 0) as 'fresh enrollment school Type is Girls while class3_boys > 0',
    Sum(bb.sch_type=2 and fr.c4_b > 0)  as 'fresh enrollment school Type is Girls while class4_boys > 0',
    Sum(bb.sch_type=2 and fr.c5_b > 0) as 'fresh enrollment school Type is Girls while class5_boys > 0',
    Sum(bb.sch_type=2 and fr.c6_b > 0)  as 'fresh enrollment school Type is Girls while  class6_boys > 0 ',
    Sum(bb.sch_type=2 and fr.c7_b > 0)  as 'fresh enrollment school Type is Girls while class7_boys > 0',
    Sum(bb.sch_type=2 and fr.c8_b > 0) as 'fresh enrollment school Type is Girls while class8_boys > 0',
    Sum(bb.sch_type=2 and fr.c9_b > 0) as 'fresh enrollment  school Type is Girls while class9_boys > 0',
    Sum(bb.sch_type=2 and fr.c10_b > 0) as 'fresh enrollment school Type is Girls while class10_boys > 0',
    Sum(bb.sch_type=2 and fr.c11_b > 0) as 'fresh enrollment school Type is Girls while class11_boys > 0',
    Sum(bb.sch_type=2 and fr.c12_b > 0) as 'fresh enrollment school Type is Girls while class12_boys > 0',
    Sum(bb.sch_type=1 and fr.cpp_g > 0)  as 'fresh enrollment school Type is Girls while cpp_b > 0',
    Sum(bb.sch_type=1 and fr.c1_g > 0)  as 'fresh enrollment school Type is Girls while class1_boys > 0',
    Sum(bb.sch_type=1 and fr.c2_g > 0) as 'fresh enrollment school Type is BOys while class2_girls > 0',
    Sum(bb.sch_type=1 and fr.c3_g > 0) as 'fresh enrollment school Type is BOys while class3_girls > 0',
    Sum(bb.sch_type=1 and fr.c4_g > 0) as 'fresh enrollment school Type is BOys while class4_girls > 0',
    Sum(bb.sch_type=1 and fr.c5_g > 0) as 'fresh enrollment school Type is BOys while class5_girls > 0',
    Sum(bb.sch_type=1 and fr.c6_g > 0) as 'fresh enrollment school Type is BOys while class6_girls > 0 ',
    Sum(bb.sch_type=1 and fr.c7_g > 0) as 'fresh enrollment school Type is BOys while class7_girls > 0',
    Sum(bb.sch_type=1 and fr.c8_g > 0 ) as 'fresh enrollment school Type is BOys while class8_girls > 0',
    Sum(bb.sch_type=1 and fr.c9_g > 0) as 'fresh enrollment school Type is BOys while class9_girls > 0',
    Sum(bb.sch_type=1 and fr.c10_g > 0) as 'fresh enrollment school Type is BOys while class10_girls > 0',
    Sum(bb.sch_type=1 and fr.c11_g > 0) as 'fresh enrollment school Type is BOys while class11_girls > 0',
    Sum(bb.sch_type=1 and fr.c12_g > 0) as 'fresh enrollment school Type is BOys while class12_girls > 0',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end) < sum(case when fr.item_group=2 then (fr.cpp_b) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn cpp_b ',
    (case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end) < sum(case when fr.item_group=2 then (fr.c1_b) else 0 end)then 1 else 0 end) as 
    'fresh  MInor enrollment is more than category enrollemtn class1_boys',
    (case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c2_b) else 0 end)then 1 else 0 end) as 
    'fresh  MInor enrollment is more than category enrollemtn class2_boys',
    (case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c3_b) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class3_boys',
    (case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c4_b) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class4_boys',
    (case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c5_b) else 0 end)then 1 else 0 end) as 
    'fresh  MInor enrollment is more than category enrollemtn class5_boys',
    (case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c6_b) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class6_boys',
    (case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c7_b) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class7_boys',
    (case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c8_b) else 0 end)then 1 else 0 end) as 
    'fresh  MInor enrollment is more than category enrollemtn class8_boys',
    (case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c9_b) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class9_boys',
    (case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c10_b) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class10_boys',
    (case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c11_b) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class11_boys',
    (case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end) <  sum(case when fr.item_group=2 then (fr.c12_b) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class12_boys',
    (case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.cpp_g) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn cpp_g',
    (case when sum(case when fr.item_group=1 then (fr.c1_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c1_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class1_girls',
    (case when sum(case when fr.item_group=1 then (fr.c2_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c2_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class2_girls',
    (case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c3_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class3_girls',
    (case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c4_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class4_girls',
    (case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c5_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class5_girls',
    (case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c6_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class6_girls',
    (case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c7_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class7_girls',
    (case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c8_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class8_girls',
    (case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c9_g) else 0 end)then 1 else 0 end) as 
    'fresh MInor enrollment is more than category enrollemtn class9_girls',
    (case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c10_g) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class10_girls',
    (case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c11_g) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class11_girls',
    (case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end) <  sum(case when fr.item_group=2 then (fr.c12_g) else 0 end)then 1 else 0 end) as 'fresh MInor enrollment is more than category enrollemtn class12_girls',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12 then (fr.cpp_b) else 0 end) then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment cpp_b',
    (case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c1_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class1_boys',
    (case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c2_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class2_boys',
    (case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c3_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class3_boys',
    (case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c4_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class4_boys',
    (case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c5_b) else 0 end)then 1 else 0 end) as 'fresh  HAVING AADHAR enrollment is more than category enrollment class5_boys',
    (case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c6_b) else 0 end)then 1 else 0 end) as 'fresh  HAVING AADHAR enrollment is more than category enrollment class6_boys',
    (case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c7_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class7_boys',
    (case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c8_b) else 0 end)then 1 else 0 end) as  'fresh HAVING AADHAR enrollment is more than category enrollment class8_boys',
    (case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c9_b) else 0 end)then 1 else 0 end)  as  'fresh HAVING AADHAR enrollment is more than category enrollment class9_boys',
    (case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c10_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class10_boys',
    (case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c11_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class11_boys',
    (case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c12_b) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class12_boys',
    (case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.cpp_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment cpp_g',
    (case when sum(case when fr.item_group=1 then (fr.c1_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c1_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class1_girls',
    (case when sum(case when fr.item_group=1 then (fr.c2_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c2_g) else 0 end)then 1 else 0 end) as 'fresh  HAVING AADHAR enrollment is more than category enrollment class2_girls',
    (case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c3_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class3_girls',
    (case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c4_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class4_girls',
    (case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c5_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class5_girls',
    (case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c6_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class6_girls',
    (case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c7_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class7_girls',
    (case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c8_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class8_girls',
    (case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c9_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class9_girls',
    (case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c10_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class10_girls',
    (case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c11_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class11_girls',
    (case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =12  then (fr.c12_g) else 0 end)then 1 else 0 end) as 'fresh HAVING AADHAR enrollment is more than category enrollment class12_girls',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b+fr.c1_b+fr.c2_b+fr.c3_b+fr.c4_b+fr.c5_b+fr.c6_b+fr.c7_b+fr.c8_b+fr.c9_b+fr.C10_b+fr.c11_b+fr.c12_b+fr.cpp_g+fr.c1_g+fr.c2_g+fr.c3_g+fr.c4_g+fr.c5_g+fr.c6_g+fr.c7_g+fr.c8_g+fr.c9_g+fr.C10_g+fr.c11_g+fr.c12_g) else 0 end) < sum(case when fr.item_group=2 then (fr.cpp_b+fr.c1_b+fr.c2_b+fr.c3_b+fr.c4_b+fr.c5_b+fr.c6_b+fr.c7_b+fr.c8_b+fr.c9_b+fr.C10_b+fr.c11_b+fr.c12_b+fr.cpp_g+fr.c1_g+fr.c2_g+fr.c3_g+fr.c4_g+fr.c5_g+fr.c6_g+fr.c7_g+fr.c8_g+fr.c9_g+fr.C10_g+fr.c11_g+fr.c12_g) else 0 end)then 1 else 0 end) as 
    'fresh  MInor enrollment is more than category enrollment',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end) < sum(case when fr.item_group=3 and fr.item_id =13  then (fr.cpp_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment cpp_b',
    (case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c1_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class1_boys',
    (case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c2_b) else 0 end)then 1 else 0 end)as 'fresh BPL enrollment is more than category enrollment class2_boys',
    (case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c3_b) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment class3_boys',
    (case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c4_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class4_boys',
    (case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c5_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class5_boys',
    (case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c6_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class6_boys',
    (case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c7_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class7_boys',
    (case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c8_b) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment class8_boys',
    (case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c9_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class9_boys',
    (case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c10_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class10_boys',
    (case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c11_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class11_boys',
    (case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c12_b) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class12_boys',
    (case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.cpp_g) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment cpp_g',
    (case when sum(case when fr.item_group=1 then (fr.c1_g ) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c1_g ) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class1_girls',
    (case when sum(case when fr.item_group=1 then (fr.c2_g ) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c2_g ) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class2_girls',
    (case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c3_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class3_girls',
    (case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c4_g) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment class4_girls',
    (case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c5_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class5_girls',
    (case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c6_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class6_girls',
    (case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c7_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class7_girls',
    (case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c8_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class8_girls',
    (case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c9_g) else 0 end)then 1 else 0 end) as 'fresh BPL enrollment is more than category enrollment class9_girls',
    (case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c10_g) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment  class10_girls',
    (case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c11_g) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment class11_girls',
    (case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.c12_g) else 0 end)then 1 else 0 end) as 'fresh  BPL enrollment is more than category enrollment  class12_girls',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b+fr.c1_b+fr.c2_b+fr.c3_b+fr.c4_b+fr.c5_b+fr.c6_b+fr.c7_b+fr.c8_b+fr.c9_b+fr.c10_b+fr.c11_b+fr.c12_b+fr.cpp_g+fr.c1_g+fr.c2_g+fr.c3_g+fr.c4_g+fr.c5_g+fr.c6_g+fr.c7_g+fr.c8_g+fr.c9_g+fr.c10_g+fr.c11_g+fr.c12_g) else 0 end) <  sum(case when fr.item_group=3 and fr.item_id =13  then (fr.cpp_b+fr.c1_b+fr.c2_b+fr.c3_b+fr.c4_b+fr.c5_b+fr.c6_b+fr.c7_b+fr.c8_b+fr.c9_b+fr.c10_b+fr.c11_b+fr.c12_b+fr.cpp_g+fr.c1_g+fr.c2_g+fr.c3_g+fr.c4_g+fr.c5_g+fr.c6_g+fr.c7_g+fr.c8_g+fr.c9_g+fr.c10_g+fr.c11_g+fr.c12_g) else 0 end)then 1 else 0 end) as 
    'fresh BPL enrollment is more than category enrollment ',
    Sum(length(aa.udise_sch_code)!=11)  as 'Agewise enrollment Total School in mhrd_sch_enr_age',
    Sum(aa.age_id not in (4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23)) as 'Agewise enrollment item_id is out of range',
    Sum(aa.cpp_b is null or aa.cpp_b < 0 or aa.cpp_b > 5000) as 'Agewise enrollment cpp_b is null or cpp_b out of range ',
    Sum(aa.c1_b is null or aa.c1_b < 0 or aa.c1_b > 5000) as 'Agewise enrollment class1_boys is null or class1_boys out of range',
    Sum(aa.c2_b is null or aa.c2_b < 0 or aa.c2_b > 5000) as 'Agewise enrollment class2_boys is null or class2_boys out of range',
    Sum(aa.c3_b is null or aa.c3_b < 0 or aa.c3_b > 5000)  as 'Agewise enrollment class3_boys is null or class3_boys out of range',
    Sum(aa.c4_b is null or aa.c4_b < 0 or aa.c4_b > 5000) as 'Agewise enrollment class4_boys is null or class4_boys out of range',
    Sum(aa.c5_b is null or aa.c5_b < 0 or aa.c5_b > 5000)  as 'Agewise enrollment class5_boys is null or class5_boys out of range',
    Sum(aa.c6_b is null or aa.c6_b < 0 or aa.c6_b > 5000) as 'Agewise enrollment class6_boys is null or class6_boys out of range',
    Sum(aa.c7_b is null or aa.c7_b < 0 or aa.c7_b > 5000)  as 'Agewise enrollment class7_boys is null or class7_boys out of range',
    Sum(aa.c8_b is null or aa.c8_b < 0 or aa.c8_b > 5000)  as 'Agewise enrollment class8_boys is null or class8_boys out of range',
    Sum(aa.c9_b is null or aa.c9_b < 0 or aa.c9_b > 5000) as 'Agewise enrollment class9_boys is null or class9_boys out of range',
    Sum(aa.c10_b is null or aa.c10_b < 0 or aa.c10_b > 5000) as 'Agewise enrollment class10_boys is null or class10_boys out of range',
    Sum(aa.c11_b is null or aa.c11_b < 0 or aa.c11_b > 5000) as 'Agewise enrollment class11_boys is null or class10_boys out of range',
    Sum(aa.c12_b is null or aa.c12_b < 0 or aa.c12_b > 5000) as 'Agewise enrollment class12_boys is null or class10_boys out of range',
    Sum(aa.cpp_g is null or aa.cpp_g < 0 or aa.cpp_g > 5000) as 'Agewise enrollment cpp_g is null or cpp_g out of range',
    Sum(aa.c1_g is null or aa.c1_g < 0 or aa.c1_g > 5000) as 'Agewise enrollment class1_girls is null or class1_girls out of range',
    Sum(aa.c2_g is null or aa.c2_g < 0 or aa.c2_g > 5000) as 'Agewise enrollment class2_girls is null or class2_girls out of range',
    Sum(aa.c3_g is null or aa.c3_g < 0 or aa.c3_g > 5000) as 'Agewise enrollment class3_girls is null or class3_girls out of range',
    Sum(aa.c4_g is null or aa.c4_g < 0 or aa.c4_g > 5000) as 'Agewise enrollment class4_girls is null or class4_girlsout of range',
    Sum(aa.c5_g is null or aa.c5_g < 0 or aa.c5_g > 5000) as 'Agewise enrollment class5_girls is null or class5_girls out of range',
    Sum(aa.c6_g is null or aa.c6_g < 0 or aa.c6_g > 5000) as 'Agewise enrollment class6_girls is null or class6_girls out of range',
    Sum(aa.c7_g is null or aa.c7_g < 0 or aa.c7_g > 5000) as 'Agewise enrollment class7_girls is null or class7_girls out of range',
    Sum(aa.c8_g is null or aa.c8_g < 0 or aa.c8_g > 5000) as 'Agewise enrollment class8_girls is null or class8_girls out of range',
    Sum(aa.c9_g is null or aa.c9_g < 0 or aa.c9_g > 5000) as 'Agewise enrollment class9_girls is null or class9_girls out of range',
    Sum(aa.c10_g is null or aa.c10_g < 0 or aa.c10_g > 5000) as 'Agewise enrollment class10_girls is null or class10_girls out of range',
    Sum(aa.c11_g is null or aa.c11_g < 0 or aa.c11_g > 5000) as 'Agewise enrollment class11_girls is null or class10_girls out of range',
    Sum(aa.c12_g is null or aa.c12_g < 0 or aa.c12_g > 5000) as 'Agewise enrollment class12_girls is null or class10_girls out of range',
    Sum(bb.sch_type=2 and aa.cpp_b > 0) as 'Agewise enrollment  school Type is Girls while cpp_b > 0',
    Sum(bb.sch_type=2 and aa.c1_b > 0) as 'Agewise enrollment  school Type is Girls while class1_boys > 0',
    Sum(bb.sch_type=2 and aa.c2_b > 0) as 'Agewise enrollment school Type is Girls while class2_boys > 0',
    Sum(bb.sch_type=2 and aa.c3_b > 0) as 'Agewise enrollment school Type is Girls while class3_boys > 0',
    Sum(bb.sch_type=2 and aa.c4_b > 0) as 'Agewise enrollment school Type is Girls while class4_boys > 0',
    Sum(bb.sch_type=2 and aa.c5_b > 0) as 'Agewise enrollment school Type is Girls while class5_boys > 0',
    Sum(bb.sch_type=2 and aa.c6_b > 0 ) as 'Agewise enrollment school Type is Girls while class6_boys > 0',
    Sum(bb.sch_type=2 and aa.c7_b > 0 ) as 'Agewise enrollment school Type is Girls while class7_boys > 0',
    Sum(bb.sch_type=2 and aa.c8_b > 0  ) as 'Agewise enrollment  school Type is Girls while class8_boys > 0',
    Sum(bb.sch_type=2 and aa.c9_b > 0 ) as 'Agewise enrollment school Type is Girls while class9_boys > 0',
    Sum(bb.sch_type=2 and aa.c10_b > 0  ) as 'Agewise enrollment school Type is Girls while class10_boys > 0',
    Sum(bb.sch_type=2 and aa.c11_b > 0  ) as 'Agewise enrollment school Type is Girls while class11_boys > 0',
    Sum(bb.sch_type=2 and aa.c12_b > 0) as 'Agewise enrollment school Type is Girls while class12_boys > 0',
    Sum(bb.sch_type=1 and aa.cpp_g > 0) as 'Agewise enrollment school Type is Girls while cpp_b > 0',
    Sum(bb.sch_type=1 and aa.c1_g > 0) as 'Agewise enrollment  school Type is Girls while class1_boys > 0',
    Sum(bb.sch_type=1 and aa.c2_g > 0) as 'Agewise enrollment school Type is Boys while class2_girls > 0',
    Sum(bb.sch_type=1 and aa.c3_g > 0) as 'Agewise enrollment school Type is Boys while class3_girls > 0',
    Sum(bb.sch_type=1 and aa.c4_g > 0) as 'Agewise enrollment school Type is Boys while class4_girl > 0',
    Sum(bb.sch_type=1 and aa.c5_g > 0) as 'Agewise enrollment school Type is Boys while class5_girls > 0',
    Sum(bb.sch_type=1 and aa.c6_g > 0) as 'Agewise enrollment school Type is Boys while class6_girls > 0',
    Sum(bb.sch_type=1 and aa.c7_g > 0 ) as 'Agewise enrollment school Type is Boys while class7_girls> 0',
    Sum(bb.sch_type=1 and aa.c8_g > 0 ) as 'Agewise enrollment school Type is Boys while class8_girls > 0',
    Sum(bb.sch_type=1 and aa.c9_g > 0  ) as 'Agewise enrollment school Type is Boys while class9_girls > 0',
    Sum(bb.sch_type=1 and aa.c10_g > 0 ) as 'Agewise enrollment school Type is Boys while class10_girls > 0',
    Sum(bb.sch_type=1 and aa.c11_g > 0 ) as 'Agewise enrollment school Type is Boys while class11_girls > 0',
    Sum(bb.sch_type=1 and aa.c12_g > 0) as 'Agewise enrollment school Type is Boys while class12_girls > 0',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end)!= sum(aa.cpp_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment cpp_b',
    (case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end)!= sum(aa.c1_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class1_boys',
    (case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end)!= sum(aa.c2_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class2_boys',
    (case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end)!= sum(aa.c3_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class3_boys',
    (case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end)!= sum(aa.c4_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class4_boys',
    (case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end)!= sum(aa.c5_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class5_boys',
    (case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end)!= sum(aa.c6_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class6_boys',
    (case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end)!= sum(aa.c7_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class7_boys',
    (case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end)!= sum(aa.c8_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class8_boys',
    (case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end)!= sum(aa.c9_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class9_boys',
    (case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end)!= sum(aa.c10_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class10_boys',
    (case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end)!= sum(aa.c11_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class11_boys',
    (case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end)!= sum(aa.c12_b) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class12_boys',
    (case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end)!= sum(aa.cpp_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment cpp_g',
    (case when sum(case when fr.item_group=1 then (fr.c1_g) else 0 end)!= sum(aa.c1_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class1_girls',
    (case when sum(case when fr.item_group=1 then (fr.c2_g) else 0 end)!= sum(aa.c2_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class2_girls',
    (case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end)!= sum(aa.c3_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class3_girls',
    (case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end)!= sum(aa.c4_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class4_girl',
    (case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end)!= sum(aa.c5_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class5_girls',
    (case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end)!= sum(aa.c6_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class6_girls',
    (case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end)!= sum(aa.c7_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class7_girls',
    (case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end)!= sum(aa.c8_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class8_girls',
    (case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end)!= sum(aa.c9_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class9_girls',
    (case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end)!= sum(aa.c10_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class10_girls',
    (case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end)!= sum(aa.c11_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class11_girls',
    (case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end)!= sum(aa.c12_g) then 1 else 0 end) as 
    'Agewise enrollment not equal to category enrollment class12_girls' 
    from mhrd_school_master  bb join mhrd_sch_enr_fresh fr on  cast(fr.udise_sch_code as unsigned) = bb.old_udise_sch_code join mhrd_sch_enr_age aa  on  aa.udise_sch_code  = fr.udise_sch_code join students_school_child_count sc on sc.school_id=bb.school_id where sc.school_id=".$sch_id."  group by bb.old_udise_sch_code;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }


  public function get_schl7($sch_id){ 
    //echo $sch_id;die();
    $sql = "select sum(length(cw.udise_sch_code)!=11) as 'cwsn enrollment Total School in sch_enr_cwsn ',
    sum(cw.disability_type not in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21)) as 'cwsn enrollment disability_type is out of range',
    sum(cw.cpp_b is null or (cw.cpp_b < 0 or cw.cpp_b > 5000)) as 'cwsn enrollment cpp_b is null or cpp_b out of range',
    sum(cw.c1_b is null or (cw.c1_b < 0 or cw.c1_b > 5000)) as 'cwsn enrollment class1_boys is null or class1_boys out of range',
    sum(cw.c2_b is null or (cw.c2_b < 0 or cw.c2_b > 5000)) as 'cwsn enrollment class2_boys is null or class2_boys out of range',
    sum(cw.c3_b is null or (cw.c3_b < 0 or cw.c3_b > 5000)) as 'cwsn enrollment class3_boys is null or class3_boys out of range',
    sum(cw.c4_b is null or (cw.c4_b < 0 or cw.c4_b > 5000)) as 'cwsn enrollment class4_boys is null or class4_boys out of range',
    sum(cw.c5_b is null or (cw.c5_b < 0 or cw.c5_b > 5000)) as 'cwsn enrollment class5_boys is null or class5_boys out of range',
    sum(cw.c6_b is null or (cw.c6_b < 0 or cw.c6_b > 5000)) as 'cwsn enrollment  class6_boys is null or class6_boys out of range',
    sum(cw.c7_b is null or (cw.c7_b < 0 or cw.c7_b > 5000)) as 'cwsn enrollment class7_boys is null or class7_boys out of range',
    sum(cw.c8_b is null or (cw.c8_b < 0 or cw.c8_b > 5000)) as 'cwsn enrollment class8_boys is null or class8_boys out of range ',
    sum(cw.c9_b is null or (cw.c9_b < 0 or cw.c9_b > 5000)) as 'cwsn enrollment class9_boys is null or class9_boys out of range',
    sum(cw.c10_b is null or (cw.c10_b < 0 or cw.c10_b > 5000)) as 'cwsn enrollment class10_boys is null or class10_boys out of range',
    sum(cw.c11_b is null or (cw.c11_b < 0 or cw.c11_b > 5000)) as 'cwsn enrollment class11_boys is null or class10_boys out of range ',
    sum(cw.c12_b is null or (cw.c12_b < 0 or cw.c12_b > 5000)) as 'cwsn enrollment class12_boys is null or class10_boys out of range',
    sum(cw.cpp_g is null or (cw.cpp_g < 0 or cw.cpp_g > 5000)) as 'cwsn enrollment cpp_g is null or cpp_g out of range ',
    sum(cw.c1_g is null or (cw.c1_g < 0 or cw.c1_g > 5000)) as 'cwsn enrollment class1_girls is null or class1_girls out of range',
    sum(cw.c2_g is null or (cw.c2_g < 0 or cw.c2_g > 5000)) as 'cwsn enrollment class2_girls is null or class2_girls out of range',
    sum(cw.c3_g is null or (cw.c3_g < 0 or cw.c3_g > 5000)) as 'cwsn enrollment class3_girls is null or class3_girls out of range',
    sum(cw.c4_g is null or (cw.c4_g < 0 or cw.c4_g > 5000)) as 'cwsn enrollment class4_girls is null or class4_girls out of range',
    sum(cw.c5_g is null or (cw.c5_g < 0 or cw.c5_g > 5000)) as 'cwsn enrollment class5_girls is null or class5_girls out of range',
    sum(cw.c6_g is null or (cw.c6_g < 0 or cw.c6_g > 5000)) as 'cwsn enrollment class6_girls is null or class6_girls out of range',
    sum(cw.c7_g is null or (cw.c7_g < 0 or cw.c7_g > 5000)) as 'cwsn enrollment class7_girls is null or class7_girls out of range ',
    sum(cw.c8_g is null or (cw.c8_g < 0 or cw.c8_g > 5000)) as 'cwsn enrollment class8_girls is null or class8_girls out of range',
    sum(cw.c9_g is null or (cw.c9_g < 0 or cw.c9_g > 5000)) as 'cwsn enrollment  class9_girls is null or class9_girls out of range',
    sum(cw.c10_g is null or (cw.c10_g < 0 or cw.c10_g > 5000)) as 'cwsn enrollment  class10_girls is null or class10_girls out of range',
    sum(cw.c11_g is null or (cw.c11_g < 0 or cw.c11_g > 5000)) as 'cwsn enrollment  class11_girls is null or class10_girls out of range',
    sum(cw.c12_g is null or (cw.c12_g < 0 or cw.c12_g > 5000)) as 'cwsn enrollment class12_girls is null or class10_girls out of range',
    sum(bb.sch_type=2 and cw.c1_b > 0) as 'cwsn enrollment school Type is Girls while class1_boys > 0',
    sum(bb.sch_type=2 and cw.c2_b > 0) as 'cwsn enrollment  school Type is Girls while class2_boys > 0',
    sum(bb.sch_type=2 and cw.c3_b > 0) as 'cwsn enrollment school Type is Girls while class3_boys > 0',
    sum(bb.sch_type=2 and cw.c4_b > 0) as 'cwsn enrollment school Type is Girls while class4_boys > 0',
    sum(bb.sch_type=2 and cw.c5_b > 0) as 'cwsn enrollment school Type is Girls while class5_boys > 0',
    sum(bb.sch_type=2 and cw.c6_b > 0) as 'cwsn enrollment school Type is Girls while class6_boys > 0',
    sum(bb.sch_type=2 and cw.c7_b > 0) as 'cwsn enrollment school Type is Girls while class7_boys > 0',
    sum(bb.sch_type=2 and cw.c8_b > 0) as 'cwsn enrollment school Type is Girls while class8_boys > 0',
    sum(bb.sch_type=2 and cw.c9_b > 0) as 'cwsn enrollment school Type is Girls while class9_boys > 0',
    sum(bb.sch_type=2 and cw.c10_b > 0) as 'cwsn enrollment school Type is Girls while class10_boys > 0',
    sum(bb.sch_type=2 and cw.c11_b > 0) as 'cwsn enrollment school Type is Girls while class11_boys > 0',
    sum(bb.sch_type=2 and cw.c12_b > 0) as 'cwsn enrollment school Type is Girls while class12_boys > 0',
    sum(bb.sch_type=1 and cw.cpp_g > 0 ) as 'cwsn enrollment school Type is Girls while cpp_b > 0',
    sum(bb.sch_type=1 and cw.c1_g > 0 ) as 'cwsn enrollment school Type is Girls while class1_girls > 0',
    sum(bb.sch_type=1 and cw.c2_g > 0) as 'cwsn enrollment school Type is BOys while class2_girls > 0',
    sum(bb.sch_type=1 and cw.c3_g > 0 ) as 'cwsn enrollment school Type is BOys while class3_girls > 0',
    sum(bb.sch_type=1 and cw.c4_g > 0) as 'cwsn enrollment school Type is BOys while class4_girl > 0',
    sum(bb.sch_type=1 and cw.c5_g > 0) as 'cwsn enrollment school Type is BOys while class5_girls > 0',
    sum(bb.sch_type=1 and cw.c6_g > 0) as 'cwsn enrollment school Type is BOys while class6_girls > 0',
    sum(bb.sch_type=1 and cw.c7_g > 0) as 'cwsn enrollment  school Type is BOys while class7_girls > 0',
    sum(bb.sch_type=1 and cw.c8_g > 0) as 'cwsn enrollment school Type is BOys while class8_girls > 0',
    sum(bb.sch_type=1 and cw.c9_g > 0) as 'cwsn enrollment school Type is BOys while class9_girls > 0',
    sum(bb.sch_type=1 and cw.c10_g > 0) as 'cwsn enrollment  school Type is BOys while class10_girls > 0',
    sum(bb.sch_type=1 and cw.c11_g > 0) as 'cwsn enrollment school Type is BOys while class11_girls > 0',
    sum(bb.sch_type=1 and cw.c12_g > 0) as 'cwsn enrollment school Type is BOys while class12_girls > 0',
    (case when sum(case when fr.item_group=1 then (fr.cpp_b) else 0 end)< sum(case when fr.item_group=2 then (cw.cpp_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment cpp_b',
    (case when sum(case when fr.item_group=1 then (fr.c1_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c1_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class1_boys',
    (case when sum(case when fr.item_group=1 then (fr.c2_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c2_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class2_boys',
    (case when sum(case when fr.item_group=1 then (fr.c3_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c3_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class3_boys',
    (case when sum(case when fr.item_group=1 then (fr.c4_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c4_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class4_boys',
    (case when sum(case when fr.item_group=1 then (fr.c5_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c5_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment  is more than category enrollment class5_boys',
    (case when sum(case when fr.item_group=1 then (fr.c6_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c6_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class6_boys',
    (case when sum(case when fr.item_group=1 then (fr.c7_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c7_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class7_boys',
    (case when sum(case when fr.item_group=1 then (fr.c8_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c8_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class8_boys',
    (case when sum(case when fr.item_group=1 then (fr.c9_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c9_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class9_boys',
    (case when sum(case when fr.item_group=1 then (fr.c10_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c10_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class10_boys',
    (case when sum(case when fr.item_group=1 then (fr.c11_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c11_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class11_boys',
    (case when sum(case when fr.item_group=1 then (fr.c12_b) else 0 end)< sum(case when fr.item_group=2 then (cw.c12_b)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class12_boys',
    (case when sum(case when fr.item_group=1 then (fr.cpp_g) else 0 end)< sum(case when fr.item_group=2 then (cw.cpp_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment cpp_g ',
    (case when sum(case when fr.item_group=1 then (fr.c1_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c1_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class1_girls',
    (case when sum(case when fr.item_group=1 then (fr.c2_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c2_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class2_girls',
    (case when sum(case when fr.item_group=1 then (fr.c3_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c3_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class3_girls',
    (case when sum(case when fr.item_group=1 then (fr.c4_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c4_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class4_girls',
    (case when sum(case when fr.item_group=1 then (fr.c5_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c5_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment  is more than category enrollment class5_girls',
    (case when sum(case when fr.item_group=1 then (fr.c6_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c6_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class6_girls',
    (case when sum(case when fr.item_group=1 then (fr.c7_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c7_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class7_girls ',
    (case when sum(case when fr.item_group=1 then (fr.c8_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c8_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment  is more than category enrollment class8_girls',
    (case when sum(case when fr.item_group=1 then (fr.c9_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c9_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class9_girls',
    (case when sum(case when fr.item_group=1 then (fr.c10_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c10_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class10_girls',
    (case when sum(case when fr.item_group=1 then (fr.c11_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c11_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment  is more than category enrollment class11_girls',
    (case when sum(case when fr.item_group=1 then (fr.c12_g) else 0 end)< sum(case when fr.item_group=2 then (cw.c12_g)else 0 end)then 1 else 0 end) as 
    'cwsn enrollment is more than category enrollment class12_girls',
    sum(length(cin.udise_sch_code)!=11) as 'cwsn_incentive Total School With UDISE CODE length not equal 11',
    sum(cin.item_id is null or cin.item_id not in (1,2,3,4,5,6,6,7,8,9,10,11,12)) as 'cwsn_incentive item_id is null or out of range',
    sum(cin.tot_pre_pri_b is null or cin.tot_pre_pri_b<0 or cin.tot_pre_pri_b>5000) as 'cwsn_incentive tot_pre_pri_b is null or out of range',
    sum(cin.tot_pre_pri_g is null or cin.tot_pre_pri_g<0 or cin.tot_pre_pri_g>5000) as 'cwsn_incentive tot_pre_pri_g is null or out of range',
    sum(cin.tot_pry_b is null or cin.tot_pry_b<0 or cin.tot_pry_b>5000) as 'cwsn_incentive tot_pry_b is null or out of range',
    sum(cin.tot_pry_g is null or cin.tot_pry_g<0 or cin.tot_pry_g>5000) as 'cwsn_incentive tot_pry_g is null or out of range',
    sum(cin.tot_upr_b is null or cin.tot_upr_b<0 or cin.tot_upr_b>5000) as 'cwsn_incentive tot_upr_b is null or out of range',
    sum(cin.tot_upr_g is null or cin.tot_upr_g<0 or cin.tot_upr_g>5000) as 'cwsn_incentive tot_upr_g is null or out of range',
    sum(cin.tot_sec_b is null or cin.tot_sec_b<0 or cin.tot_sec_b>5000) as 'cwsn_incentive tot_sec_b is null or out of range',
    sum(cin.tot_sec_g is null or cin.tot_sec_g<0 or cin.tot_sec_g>5000) as 'cwsn_incentive tot_sec_g is null or out of range',
    sum(cin.tot_hsec_b is null or cin.tot_hsec_b<0 or cin.tot_hsec_b>5000) as 'cwsn_incentive tot_hsec_b is null or out of range',
    sum(cin.tot_hsec_g is null or cin.tot_hsec_g<0 or cin.tot_hsec_g>5000) as 'cwsn_incentive tot_hsec_g is null or out of range',
    sum(bb.sch_type=2 and cin.tot_pre_pri_b>0) as 'cwsn_incentive cwsn_incentive school Type is Girls while tot_pre_pri_b > 0',
    sum(bb.sch_type=2 and cin.tot_pry_b>0) as 'cwsn_incentive cwsn_incentive school Type is Girls while tot_pry_b > 0',
    sum(bb.sch_type=2 and cin.tot_upr_b>0) as 'cwsn_incentive cwsn_incentive school Type is Girls while tot_upr_b > 0',
    sum(bb.sch_type=2 and cin.tot_sec_b>0) as 'cwsn_incentive cwsn_incentive school Type is Girls while tot_sec_b > 0',
    sum(bb.sch_type=2 and cin.tot_hsec_b > 0) as 'cwsn_incentive cwsn_incentive school Type is Girls while tot_hsec_b > 0',
    sum(bb.sch_type=1 and cin.tot_pre_pri_g > 0) as 'cwsn_incentive cwsn_incentive school Type is Boys while tot_pre_pri_g > 0',
    sum(bb.sch_type=1 and cin.tot_pry_g>0) as 'cwsn_incentive cwsn_incentive school Type is Boys while tot_pry_g > 0',
    sum(bb.sch_type=1 and cin.tot_upr_g>0) as 'cwsn_incentive cwsn_incentive school Type is Boys while tot_upr_g > 0',
    sum(bb.sch_type=1 and cin.tot_sec_g>0) as 'cwsn_incentive cwsn_incentive school Type is Boys while tot_sec_g > 0',
    sum(bb.sch_type=1 and cin.tot_hsec_g>0) as 'cwsn_incentive cwsn_incentive school Type is Boys while tot_hsec_g > 0' 
    from mhrd_school_master  bb join mhrd_sch_enr_fresh fr on  cast(fr.udise_sch_code as unsigned) = bb.old_udise_sch_code join mhrd_sch_enr_cwsn cw  on cw.udise_sch_code  = fr.udise_sch_code left join mhrd_sch_incen_cwsn cin  on cin.udise_sch_code  = cw.udise_sch_code join students_school_child_count sc on sc.school_id=bb.school_id where sc.school_id=".$sch_id." group by bb.old_udise_sch_code;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }  

  public function get_schl8($sch_id){
 
    //echo $sch_id;die();
    $sql = "select case when item_group=1 and item_id=1 then 'Category Enrollment' 
    when item_group=2 then 'Agewise Enrollment' 
    when item_group=4 then 'Mediumwise Enrollment'
    when item_group=5 then 'Streamwise Enrollment' 
    when item_group=6 then 'Repeater Enrollment' 
    when item_group=3 then 'CWSN Enrollment' else 'NA' end as 'Enrollment_Type',
    sum(m.cpp_b) as cpp_b,sum(m.cpp_g) as cpp_g,
    sum(m.c1_b) as c1_b,sum(m.c1_g) as c1_g,
    sum(m.c2_b) as c2_b,sum(m.c2_g) as c2_g,
    sum(m.c3_b) as c3_b,sum(m.c3_g) as c3_g,
    sum(m.c4_b) as c4_b,sum(m.c4_g) as c4_g,
    sum(m.c5_b) as c5_b,sum(m.c5_g) as c5_g,
    sum(m.c6_b) as c6_b,sum(m.c6_g) as c6_g,
    sum(m.c7_b) as c7_b,sum(m.c7_g) as c7_g,
    sum(m.c8_b) as c8_b,sum(m.c8_g) as c8_g,
    sum(m.c9_b) as c9_b,sum(m.c9_g) as c9_g,
    sum(m.c10_b) as c10_b,sum(m.c10_g) as c10_g,
    sum(m.c11_b) as c11_b,sum(m.c11_g) as c11_g,
    sum(m.c12_b) as c12_b,sum(m.c12_g) as c12_g 
    from mhrd_enr_total m join students_school_child_count sc on sc.udise_code=cast(m.udise_sch_code as unsigned) where item_id=1 and sc.school_id=".$sch_id." group by m.udise_sch_code,m.item_group;";

      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
  }

  
  /**API's using school_id ends here by wesley**/

  function get_schoolwise_medium($school_id){
    $SQL   ="SELECT schoolnew_mediumentry.school_key_id,schoolnew_mediumofinstruction.ID,schoolnew_mediumofinstruction.MEDINSTR_ID,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_mediumofinstruction.VISIBLE_YN
               FROM schoolnew_mediumentry
          LEFT JOIN schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut
              WHERE schoolnew_mediumentry.school_key_id =".$school_id.";";
    $query = $this->db->query($SQL);
    return $query->result();
  }

  public function npschoolrep($data){

    if($data['emis_usertype']=='9' || $data['emis_usertype']=='3'){
      $where = "where a.sch_directorate_id = 29 and sc.district_id = ".$data['district_id']."";
    }else{
      $where = "where a.sch_directorate_id = 29 group by sc.district_id";
      // order by district_name asc
    }
    $sql = "select
    sum(case when a.sch_directorate_id = 29 and status=0 and app_type = 2 then 1 else 0 end) as New_Applications,
    sum(case when a.sch_directorate_id = 29 and status<>1 and status_user = 6 then 1 else 0 end) as BEO_pending,
    sum(case when a.sch_directorate_id = 29 and status<>1 and status_user = 10 then 1 else 0 end) as DEO_pending,
    sum(case when a.sch_directorate_id = 29 and status<>1 and status_user = 9 then 1 else 0 end) as CEO_pending,
    sum(case when a.sch_directorate_id = 29 and status<>1 and status_user = 12 then 1 else 0 end) as Dir_pending,
    sum(case when a.sch_directorate_id = 29 and app_type = 2 and status =1 then 1 else 0 end) as Approved,
    sum(case when a.sch_directorate_id = 29 and app_type = 2 and status =2 then 1 else 0 end) as Rejected
    from mgmt_app_status a
    join students_school_child_count sc on sc.district_id = a.district_id
    $where;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();

  }

  public function matricschlrep($data){

    if($data['emis_usertype']=='9' || $data['emis_usertype']=='3'){
      $where = "where a.sch_directorate_id = 29 and sc.district_id = ".$data['district_id']."";
    }else{
      $where = "where a.sch_directorate_id = 29 group by sc.district_id";
    }
    $sql = "select
    sum(case when a.sch_directorate_id = 28 and status=0 and app_type = 2 then 1 else 0 end) as New_Applications,
    sum(case when a.sch_directorate_id = 28 and status<>1 and status_user = 10 then 1 else 0 end) as DEO_pending,
    sum(case when a.sch_directorate_id = 28 and status<>1 and status_user = 9 then 1 else 0 end) as CEO_pending,
    sum(case when a.sch_directorate_id = 28 and status<>1 and status_user = 12 then 1 else 0 end) as Dir_pending,
    sum(case when a.sch_directorate_id = 28 and app_type = 2 and status =1 then 1 else 0 end) as Approved,
    sum(case when a.sch_directorate_id = 28 and app_type = 2 and status =2 then 1 else 0 end) as Rejected
    from mgmt_app_status a
    join students_school_child_count sc on sc.district_id = a.district_id
    $where;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
      
  }

  public function CBSE_NOC($data){

    if($data['emis_usertype']=='9' || $data['emis_usertype']=='3'){
      $where = "where sc.district_id = ".$data['district_id']."";
    }else{
      $where = "group by sc.district_id";
    }
    $sql = "select
    sum(case when status=0 and app_type = 3 then 1 else 0 end) as New_Applications,
    sum(case when status<>1 and status_user = 9 then 1 else 0 end) as CEO_pending,
    sum(case when status<>1 and status_user = 12 then 1 else 0 end) as Dir_pending,
    sum(case when app_type = 3 and status =1 then 1 else 0 end) as Approved,
    sum(case when app_type = 3 and status =2 then 1 else 0 end) as Rejected
    from mgmt_app_status a
    join students_school_child_count sc on sc.school_id = a.school_id
    $where;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
      
  }

  public function CBSE_NOC_Drilldown_CEO($data){

    if($data['emis_usertype']=='9' || $data['emis_usertype']=='3'){
      //$where = "where sc.district_id = ".$data['district_id']."";
      $sql = "select a.app_id,sc.block_name,sc.udise_code, sc.school_name from mgmt_app_status a
      join students_school_child_count sc on sc.school_id = a.school_id
      where a.app_type = 3 and status_user = 9 and sc.district_id = ".$data['district_id'].";";
    }else{
      //$where = "group by sc.district_id";
      $sql = "select sc.district_name, count(*) from mgmt_app_status a
      join students_school_child_count sc on sc.school_id = a.school_id
      where a.app_type = 3 and status_user = 9 group by sc.district_name;";
    }
    // $sql = "select
    // sum(case when status=0 and app_type = 3 then 1 else 0 end) as New_Applications,
    // sum(case when status<>1 and status_user = 9 then 1 else 0 end) as CEO_pending,
    // sum(case when status<>1 and status_user = 12 then 1 else 0 end) as Dir_pending,
    // sum(case when app_type = 3 and status =1 then 1 else 0 end) as Approved,
    // sum(case when app_type = 3 and status =2 then 1 else 0 end) as Rejected
    // from mgmt_app_status a
    // join students_school_child_count sc on sc.school_id = a.school_id
    // $where;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
      
  }

  public function CBSE_NOC_Drilldown_Dir($data){

    if($data['emis_usertype']=='9' || $data['emis_usertype']=='3'){
        $where = "where a.app_type = 3 and status_user = 12 and sc.district_id = ".$data['district_id']."";
      }else{
        $where = "where a.app_type = 3 and status_user = 12";
      }
      $sql = "select a.app_id,sc.block_name,sc.udise_code, sc.school_name from mgmt_app_status a
      join students_school_child_count sc on sc.school_id = a.school_id $where;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
      
  }

  public function CBSE_NOC_Drilldown_Dir_state($data){

      $sql = "select sc.district_name, count(*) from mgmt_app_status a
      join students_school_child_count sc on sc.school_id = a.school_id
      where a.app_type = 3 and status_user = 12 group by sc.district_name;";
      $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
      
  }

  public function app_id_check($app_type){ 
    $this->db->select('app_id') 
                 ->from('mgmt_app_status a')
                ->where('a.app_type',$app_type);
    $result =  $this->db->get()->last_row();
    return $result->app_id;    
  }

  public function directorate_id($data){
    $sql = "select sch_directorate_id from schoolnew_basicinfo where school_id = '$data';";
    $result = $this->db->query($sql);
    $data = $result->row();
    return $data->sch_directorate_id;    
  }

  public function mngmnt_appli($records){
    $insert_app_data=$this->db->insert('mgmt_app_status',$records);
    //print_r($insert_app_data);die();
    if(!empty($insert_app_data)){
      return $records['app_id'];
    }
  }

  public function mngment_appli_Noc($records){
    //print_r($records);die();
    $insert=$this->db->insert('mgmt_app_noc_details',$records);
    //print_r($insert_app_data);die();
    return $insert;    
  }
  
  function get_application_id($where,$field){
    $this->db->select($field);
    $this->db->from('mgmt_app_status');
    $this->db->where($where);
    $result = $this->db->get();
    $id = $result->num_rows() > 0 ? $result->row()->$field :'';
    return $id;
  }
  // function get_mgmt_app_noc_details($appid,$sch){
  //   $sql = "select id as noc_details_pk, school_id, app_id, mgmt_name, mgmt_address, mgmt_pincode, mgmt_register_yn, mgmt_register_date, mgmt_register_place, other_inst_name1, other_inst_name2, other_inst_name3, other_inst_name4, other_inst_name5, other_inst_place1, other_inst_place2, other_inst_place3, other_inst_place4, other_inst_place5, minority_yn, ownership_type, lease_yrs, bldg_type, bldg_value, students_accomodate_space, students_accomodate_strength, docs_engg_class, collector_district, collector_file_num, collector_file_date, closure_order_yn from mgmt_app_noc_details where app_id =".$appid." and school_id = ".$sch.";";
  //   $result = $this->db->query($sql);
  //       //print_r($this->db->last_query());die();
  //       return $result->result_array();
  // }
  function get_mgmt_app_noc_with_cbse($appid,$sch){
    // $sql = "select ".$sel."
    $sql = "select a.id as nocdetails_inx_id , a.school_id, a.app_id, a.mgmt_name, a.mgmt_address, a.mgmt_pincode, a.mgmt_register_yn, a.mgmt_register_date, a.mgmt_register_place, a.other_inst_name1, a.other_inst_name2, a.other_inst_name3, a.other_inst_name4, a.other_inst_name5, a.other_inst_place1, a.other_inst_place2, a.other_inst_place3, a.other_inst_place4, a.other_inst_place5, a.minority_yn, a.ownership_type, a.lease_yrs, a.bldg_type, a.bldg_value, a.students_accomodate_space, a.students_accomodate_strength1,a.students_accomodate_strength2, a.docs_engg_class, a.collector_district, a.collector_file_num, a.collector_file_date, a.closure_order_yn,a.land_registered,
                   b.id as checklist_inx_id , b.library_yn, b.books_yn, b.labs_yn, b.classrooms, b.sch_same_campus_yn, b.em_sch_yn, b.sch1_school_id, b.sch2_school_id, b.sch3_school_id, b.sch4_school_id, b.sch5_school_id, b.sch1_noc_yn, b.sch2_noc_yn, b.sch3_noc_yn, b.sch4_noc_yn, b.sch5_noc_yn, b.hilly_yn, b.other_sch_affect_yn, b.pictures_yn, b.security_yn, b.docs_attested_yn, b.forms_yn, b.inspection_date, b.ceo_remarks, b.ceo_file_num, b.ceo_file_date
              from mgmt_app_noc_details a 
         left join mgmt_app_noc_checklist b on a.app_id = b.app_id
             where a.app_id =".$appid." and a.school_id = ".$sch.";";
    $result = $this->db->query($sql);
        //print_r($this->db->last_query());die();
        return $result->result_array();
  }

  function get_mgmt_app_noc_with_cbse2($appid){
    // $sql = "select ".$sel."
    $sql = "select a.id as nocdetails_inx_id , a.school_id, a.app_id, a.mgmt_name, a.mgmt_address, a.mgmt_pincode, a.mgmt_register_yn, a.mgmt_register_date, a.mgmt_register_place, a.other_inst_name1, a.other_inst_name2, a.other_inst_name3, a.other_inst_name4, a.other_inst_name5, a.other_inst_place1, a.other_inst_place2, a.other_inst_place3, a.other_inst_place4, a.other_inst_place5, a.minority_yn, a.ownership_type, a.lease_yrs, a.bldg_type, a.bldg_value, a.students_accomodate_space, a.students_accomodate_strength1,a.students_accomodate_strength2, a.docs_engg_class, a.collector_district, a.collector_file_num, a.collector_file_date, a.closure_order_yn,a.land_registered,
                   b.id as checklist_inx_id , b.library_yn, b.books_yn, b.labs_yn, b.classrooms, b.sch_same_campus_yn, b.em_sch_yn, b.sch1_school_id, b.sch2_school_id, b.sch3_school_id, b.sch4_school_id, b.sch5_school_id, b.sch1_noc_yn, b.sch2_noc_yn, b.sch3_noc_yn, b.sch4_noc_yn, b.sch5_noc_yn, b.hilly_yn, b.other_sch_affect_yn, b.pictures_yn, b.security_yn, b.docs_attested_yn, b.forms_yn, b.inspection_date, b.ceo_remarks, b.ceo_file_num, b.ceo_file_date
              from mgmt_app_noc_details a 
         left join mgmt_app_noc_checklist b on a.app_id = b.app_id
             where a.app_id =".$appid.";";
    $result = $this->db->query($sql);
        //print_r($this->db->last_query());die();
        return $result->result_array();
  }

  function get_mgmt_app_survey_details($appid,$sch,$type){
    $sql = "select a.id as survey_inx_id , a.school_id, a.app_id, a.details_type,a.survey_number,a.area,a.isactive
              from mgmt_app_survey_details a 
             where a.isactive = 1 and a.app_id =".$appid." and a.school_id = ".$sch." and a.details_type = ".$type.";";
    $result = $this->db->query($sql);
        //print_r($this->db->last_query());die();
        return $result->result_array();
  }

  function get_mgmt_app_survey_details2($appid){
    $sql = "select a.id as survey_inx_id , a.school_id, a.app_id, a.details_type,a.survey_number,a.area,a.isactive
              from mgmt_app_survey_details a 
             where a.isactive = 1 and a.app_id =".$appid.";";
    $result = $this->db->query($sql);
        //print_r($this->db->last_query());die();
        return $result->result_array();
  }

  function get_usertypeto_in_mgmtstage($sch,$usertypefrom){
    $qy = "select sch_management_id from schoolnew_basicinfo where school_id = ".$sch.";";
    $result = $this->db->query($qy);
    $mgmt_id = $result->num_rows() > 0 ? $result->row()->sch_management_id :'';
    // echo '$mgmt_id'.$mgmt_id;
    if($mgmt_id){
        $qy2 = "SELECT user_type_id FROM mgmt_app_stages
        where sch_mgmt_id = ".$mgmt_id." and app_type = 3 and stage = ".$usertypefrom." and isactive = 1;";
        $result2 = $this->db->query($qy2);
        // print_r($this->db->last_query());die();
        $usertypeto = $result2->num_rows() > 0 ? $result2->row()->user_type_id :'';
        return $usertypeto;   
    }else{
        return '';
    }
  }

// function get_mgmt_app_noc_checklist($appid){
//   $sql = "select id as noc_checklist_pk, app_id, library_yn, books_yn, labs_yn, classrooms, sch_same_campus_yn, em_sch_yn, sch1_school_id, sch2_school_id, sch3_school_id, sch4_school_id, sch5_school_id, sch1_noc_yn, sch2_noc_yn, sch3_noc_yn, sch4_noc_yn, sch5_noc_yn, hilly_yn, other_sch_affect_yn, closure_order_yn, pictures_yn, security_yn, docs_attested_yn, forms_yn, inspection_date, ceo_remarks, ceo_file_num, ceo_file_date from mgmt_app_noc_checklist where app_id =".$appid.";";
//   $result = $this->db->query($sql);
//       //print_r($this->db->last_query());die();
//       return $result->result_array();
// }
function get_school_info_for_noc($school_id){
  $sql = "select school_id, udise_code, school_name, school_name_tamil, sch_shortname, district_id, block_id, urbanrural, edu_dist_id, manage_cate_id, sch_management_id, sch_cate_id, sch_directorate_id, local_body_id, lb_vill_town_muni, lb_habitation_id, cluster_id, panchayat_id, municipal_id, city_id, corr_name, address, pincode, office_std_code, office_landline, corr_landlline, office_mobile, corr_mobile, corr_std_code, sch_email, website, latitude, longitude, assembly_id, parliament_id, beo_map, student_id_count, brte, school_code from schoolnew_basicinfo where school_id =".$school_id.";";
  $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
}
function get_mgmt_app_doc_uploads($appid,$dtype){
  // $sql = "select id as doc_inx_id, app_id, doc_type, doc_id, doc_filepath, doc_name, doc_inspect_issue_authority, doc_inspect_date, doc_issue_date, doc_file_num, doc_file_date, doc_valid_from_date, doc_valid_upto_date, doc_issue_place, doc_survey_no, doc_details, isactive from mgmt_app_doc_uploads where isactive = 1 and app_id =".$appid." and doc_type = ".$dtype.";";
     $sql = "select id as doc_inx_id, app_id, doc_type, doc_id, doc_filepath, doc_name, doc_name_coded, doc_inspect_issue_authority, doc_inspect_date, doc_issue_date, doc_file_num, doc_file_date, doc_valid_from_date, doc_valid_upto_date, doc_issue_place, doc_survey_no, doc_details, ifs_code, challan_date, challan_no, fee_paid from mgmt_app_doc_uploads where isactive = 1 and app_id =".$appid." and doc_type = ".$dtype.";";
  $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
}
function get_mgmt_app_doc_uploads2($appid){
  // $sql = "select id as doc_inx_id, app_id, doc_type, doc_id, doc_filepath, doc_name, doc_inspect_issue_authority, doc_inspect_date, doc_issue_date, doc_file_num, doc_file_date, doc_valid_from_date, doc_valid_upto_date, doc_issue_place, doc_survey_no, doc_details, isactive from mgmt_app_doc_uploads where isactive = 1 and app_id =".$appid.";";
     $sql = "select id as doc_inx_id, app_id, doc_type, doc_id, doc_filepath, doc_name, doc_name_coded, doc_inspect_issue_authority, doc_inspect_date, doc_issue_date, doc_file_num, doc_file_date, doc_valid_from_date, doc_valid_upto_date, doc_issue_place, doc_survey_no, doc_details, ifs_code, challan_date, challan_no, fee_paid from mgmt_app_doc_uploads where isactive = 1 and app_id =".$appid.";";
  $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
}
// function get_mgmt_app_tracking($appid){
//   $sql = "select id as tracking_pk, app_id, app_type, user_type_id_from, user_action, user_type_id_to, action_time from mgmt_app_tracking where app_id =".$appid.";";
//   $result = $this->db->query($sql);
//       //print_r($this->db->last_query());die();
//       return $result->result_array();
// }
// function get_mgmt_app_status($school_id)
// {
  
//   $sql = "select id as status_pk,app_id,order_rc_num,order_date from mgmt_app_status where school_id =".$school_id.";";
//   $result = $this->db->query($sql);
//       //print_r($this->db->last_query());die();
//       return $result->result_array();
// }

public function get_PKID($table,$where){
  $this->db->select('id');
  $this->db->from($table);
  $this->db->where($where);
  $result = $this->db->get();
  $id = $result->num_rows() > 0 ? $result->row()->id : 0;
  return $id;
}
public function get_trackerInfo($trackTn,$trackWhere){
  // print_r($trackWhere);
  // print_r($trackTn);
  $this->db->select('id, app_id, app_type, user_type_id_from, user_action, user_type_id_to');
  $this->db->from($trackTn);
  $this->db->where($trackWhere);
  $result =  $this->db->get()->last_row();
  // print_r($this->db->last_query());die();
  // print_r($result);die();
  return $result;
}

function get_student_strength_for_noc($school_id){
  $sql = "select school_id, district_id, block_id, edu_dist_id, district_name, block_name, edu_dist_name, udise_code, school_name, school_type, school_type_id, sch_directorate_id, manage_id, cate_id, catty_id, management, category, cate_type, type, dpi, section_nos, low_class, high_class, Prkg_b, Prkg_g, Prkg_t, lkg_b, lkg_g, lkg_t, ukg_b, ukg_g, ukg_t, c1_b, c1_g, c1_t, c2_b, c2_g, c2_t, c3_b, c3_g, c3_t, c4_b, c4_g, c4_t, c5_b, c5_g, c5_t, c6_b, c6_g, c6_t, c7_b, c7_g, c7_t, c8_b, c8_g, c8_t, c9_b, c9_g, c9_t, c10_b, c10_g, c10_t, c11_b, c11_g, c11_t, c12_b, c12_g, c12_t, total_b, total_g, total_t, total from students_school_child_count where school_id =".$school_id.";";
  $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
}
function get_districtwiseschools($dist_id){
  $sql = "select school_id,udise_code,school_code,school_name from schoolnew_basicinfo where district_id =".$dist_id.";";
  $result = $this->db->query($sql);
  //print_r($this->db->last_query());die();
  return $result->result_array();
}

function students_status_for_eclass($data){
  $sql = "select students_child_detail.id,
  students_child_detail.name,
  students_child_detail.unique_id_no,
  students_child_detail.school_id,
  students_child_detail.class_studying_id,
  students_child_detail.class_section,
  students_eclass_download_status.id as students_eclass_pk,
  students_eclass_download_status.batch_id,
  students_eclass_batch_master.batch_name,
  students_eclass_download_status.download_status
  from students_child_detail left join students_eclass_download_status on students_eclass_download_status.student_id = students_child_detail.id
  left join students_eclass_batch_master on students_eclass_batch_master.id = students_eclass_download_status.batch_id
  where class_studying_id = ".$data['class']." and class_section = '".$data['section']."' and school_id = ".$data['sch_id'].";";
  $result = $this->db->query($sql);
      //print_r($this->db->last_query());die();
      return $result->result_array();
}

function gt_school_doc_details($app_id)
{
    $sql = "select up.app_id,up.doc_type,up.doc_id,up.doc_filepath,up.doc_name,up.doc_inspect_issue_authority,up.doc_inspect_date,up.doc_issue_date,up.doc_file_num,up.doc_file_date,up.doc_valid_from_date,up.doc_valid_upto_date,up.doc_issue_place,up.doc_survey_no,up.doc_details,up.updated_at,ms.id as document_master_id,ms.doc_description from mgmt_app_doc_uploads up left join mgmt_app_doc_master ms ON ms.id = up.doc_type where app_id=$app_id";
    $result = $this->db->query($sql);
    return $result->result_array();
}
function gt_school_appr_status($school_id,$app_type)
{
  $sql = "select a.app_id, case
when a.user_action = 0 then 'Submitted'
when a.user_action = 1 then 'Approved'
when a.user_action = 2 then 'Query raised'
when a.user_action = 3 then 'Forwarded' end as Action_Taken,
u1.user_type as `By`, u2.user_type as `To`, date(a.action_time) as `On`,a.remarks from mgmt_app_tracking a
left join user_category u1 on u1.id = a.user_type_id_from
left join user_category u2 on u2.id = a.user_type_id_to
left join mgmt_app_status s on s.app_id = a.app_id
where s.app_type = $app_type and s.school_id = $school_id and s.status is not null;";
  $result = $this->db->query($sql);
      return $result->result_array();
}
public function school_downloadOrder($app_id)
{

$sql = "select app_id,order_filename,order_filepath from mgmt_app_status where app_id=$app_id";
  $result = $this->db->query($sql);
      return $result->result_array();

}

public function school_downloadOrderCondition($app_id)
{

$sql = "select app_id,order_conditions_filename,order_conditions_filepath from mgmt_app_status where app_id=$app_id";
  $result = $this->db->query($sql);
      return $result->result_array();

}
public function stage_3_status($school_id)
{
$sql = "select app_id,status_stage,status from mgmt_app_status where school_id=$school_id and app_type=3";
  $result = $this->db->query($sql);
      return $result->result_array();
}
public function Ceo_list_school_page($dist)
{
    $sql="select stat.app_id,stat.school_id,case 
when stat.status in (1) then 'Completed'
else DATEDIFF(NOW(),stat.app_submit_date) end as pending_date,sc.school_name,case 
when stat.status =0 then 'Submitted by School'
when stat.status =1 then 'Approved'
when stat.status =2 then 'Clarification Requested'
when stat.status =3 then 'Application forwarded'
end as Status from mgmt_app_status stat left join students_school_child_count sc ON sc.school_id = stat.school_id where sc.district_id=$dist and (stat.status<>2 and stat.status is not null and stat.status!=1) and stat.app_type =3 ";
    $result = $this->db->query($sql);
    
    return $result->result_array();

}
public function State_list_school_page()
{
   $sql="select count(stat.school_id) as count,sc.district_name,sc.district_id from mgmt_app_status stat left join students_school_child_count sc ON sc.school_id = stat.school_id where (stat.status!=2 and stat.status is not null and stat.status!=1) and stat.app_type =3 group by district_name";
    $result = $this->db->query($sql);
    return $result->result_array();
}

public function noccbse_frwd_reject($data)
{
    
    $app_type = $data['app_type'];
    $app_id = $data['app_id'];
    $remarks = $data['remarks'];
    $recommend = $data['recommend'];
    $data1['status'] = $data['status'];
    $data2['user_type_id_from'] = $data['emis_usertype'];  

    unset($data['app_type']);
    unset($data['status']);
    unset($data['emis_usertype']);
    unset($data['remarks']);
    unset($data['recommend']);
    
    if($app_type == '3'){ // For NOC

      $this->db->where('app_id',$app_id);
      $this->db->update('mgmt_app_noc_checklist',$data);
      $updated_noc =  $this->db->affected_rows();

    }
    

    //if(!empty($updated_noc)){
        $app_id = $data['app_id'];   
        
        $sql = "select sch_directorate_id,sch_cate_id,status_stage,sch_mgmt_id from mgmt_app_status where app_id='$app_id'";
        $result = $this->db->query($sql);
        $data = $result->row();

        if($data1['status'] == '3'){
          $stage = ++$data->status_stage;
        }else if($data1['status'] == '2'){
          $stage = --$data->status_stage;
        }

        $sch_mgmt_id = $data->sch_mgmt_id;
        $sch_dir_id = $data->sch_directorate_id;
        $sch_cate_id = $data->sch_cate_id;
        
        $sql = "select * from mgmt_app_stages where stage='$stage' and sch_mgmt_id = '$sch_mgmt_id' and sch_directorate_id = '$sch_dir_id' and sch_cate_id = '$sch_cate_id' and app_type = '$app_type'";
        $result = $this->db->query($sql);
        $app_stages = $result->row();

        $data1['status_stage'] = $app_stages->stage;
        $data1['status_user'] = $app_stages->user_type_id;

        $this->db->where('app_id',$app_id);
        $this->db->update('mgmt_app_status',$data1);
        $updated_mgmt_app_status =  $this->db->affected_rows();

        if(!empty($updated_mgmt_app_status)){
            $data2['app_id'] = $app_id;
            $data2['app_type'] = $app_type;       
            $data2['user_action'] = $data1['status'];     
            $data2['user_type_id_to'] = $app_stages->user_type_id;
            $data2['remarks'] = $remarks;
            $data2['recommend'] = $recommend;

            $result = $this->db->insert('mgmt_app_tracking',$data2);
            return $result;
            

        }
    //}
}

/**CBSE NOC Approval by Director(state) starts here(wesley)**/
public function noccbse_apprvl($data)
{
     $app_type = $data['app_type'];
     $app_id = $data['app_id'];
     $remarks = $data['remarks'];
     $recommend = $data['recommend'];
     $data['status_user'] = $data['emis_usertype'];
     $emis_usertype_id_from = $data['emis_usertype'];

     unset($data['app_type']);
     unset($data['emis_usertype']);
     unset($data['remarks']);
     unset($data['recommend']);

    if(!empty($app_id)){
        
        if($data['status'] == '1'){                 //Approval
            $this->db->where('app_id',$app_id);
            $this->db->update('mgmt_app_status',$data);
            $updated_mgmt_app_status =  $this->db->affected_rows();

            if(!empty($updated_mgmt_app_status)){
                $data1['app_id'] = $app_id;
                $data1['app_type'] = $app_type;       
                $data1['user_action'] = $data['status']; 
                $data1['user_type_id_from'] = $emis_usertype_id_from;  
                $data1['remarks'] = $remarks;
                $data1['recommend'] = $recommend;
                
                $result = $this->db->insert('mgmt_app_tracking',$data1);
                return $result;
            } 
        }else if($data['status'] == '2'){           //Rejected 
          
            $sql = "select sch_directorate_id,sch_cate_id,status_stage,sch_mgmt_id from mgmt_app_status where app_id='$app_id'";
            $result = $this->db->query($sql);
            $mgmt_app_sts = $result->row();
            $sch_mgmt_id = $mgmt_app_sts->sch_mgmt_id;
            $sch_dir_id = $mgmt_app_sts->sch_directorate_id;
            $sch_cate_id = $mgmt_app_sts->sch_cate_id;

            // $stage = 0; //return to school
            $stage = --$mgmt_app_sts->status_stage; // return to previos level
            //echo $stage;die();
            $sql = "select * from mgmt_app_stages where stage='$stage' and sch_mgmt_id = '$sch_mgmt_id' and sch_directorate_id = '$sch_dir_id' and sch_cate_id = '$sch_cate_id' and app_type = '$app_type'";
            $result = $this->db->query($sql);
            $app_stages = $result->row();

            $data1['status'] =  $data['status'];
            $data1['status_user'] = $app_stages->user_type_id;
            $data1['status_stage'] = $app_stages->stage;
            $data1['order_rc_num'] =  $data['order_rc_num'];
            $data1['order_date'] =  $data['order_date'];

            $this->db->where('app_id',$app_id);
            $this->db->update('mgmt_app_status',$data1);
            $updated_mgmt_app_stats =  $this->db->affected_rows();

            if(!empty($updated_mgmt_app_stats)){
              $data2['app_id'] = $app_id;
              $data2['app_type'] = $app_type;       
              $data2['user_action'] = $data['status'];
              $data2['user_type_id_from'] = $emis_usertype_id_from;     
              $data2['user_type_id_to'] = $app_stages->user_type_id;
              $data2['remarks'] = $remarks;
              $data2['recommend'] = $recommend;
              
              $result = $this->db->insert('mgmt_app_tracking',$data2);
              return $result;
            } 
        }
    }
}

public function noc_survey_details_inactive($idarr,$app_id,$details_type){
		$SQL="UPDATE mgmt_app_survey_details
             SET isactive = 0
           WHERE id IN (".implode(',',$idarr).") and app_type = 3 and details_type = ".$details_type." and app_id = ".$app_id.";";
    $query = $this->db->query($SQL);
    $affectedRows=$this->db->affected_rows();
    return $affectedRows;
}

function noc_doc_details_save($tn,$details){
            $this->db->trans_start();
            $this->db->insert($tn,$details);
            $SID = $this->db->insert_id();
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();            
            // return $this->db->trans_status();
            return $affectedRows;
}

function noc_doc_details_update($tn,$details,$where){
      $this->db->trans_start();
      $this->db->where($where);
      $this->db->update($tn,$details);
      $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();            
      // return $this->db->trans_status();
      return $affectedRows;
}

function noc_survey_details_save($tn,$details) {
    if(!empty($details)){
       if($this->db->insert_batch($tn,$details)){
          return true;
       }else return false;
    }else return false;
} 

function noc_survey_details_update($tn,$details) {
  if(!empty($details)){
     if($this->db->update_batch($tn,$details,'id')){
        return true;
     }else return false;
  }else return false;
} 

/**CBSE NOC Approval by Director(state) ends here(wesley)**/

public function app_doc_uploads_remarks($app_id)
{
  if($app_id!=0)
  {  
   $sql="select app_id,doc_type,doc_id,case when user_type_id = 9 then 'CEO' else 'BEO' end as user_type,user_remarks,updated_at from mgmt_app_doc_remarks where app_id =$app_id";
    $result = $this->db->query($sql);
    
    return $result->result_array();
  }
  else
  {
    return 0;
  }
   
}
public function saveremarksdeails($records)
{
  
 
   $result = $this->db->insert('mgmt_app_doc_remarks',$records);
   return $result;
  
}

public function ordercopydata($app_id){
  $sql = "select students_school_child_count.udise_code,students_school_child_count.school_name,
  schoolnew_basicinfo.address,schoolnew_basicinfo.pincode,
  students_school_child_count.district_id,students_school_child_count.district_name,
  mgmt_app_status.app_id,mgmt_app_status.app_type,mgmt_app_status.app_submit_date,
  mgmt_app_status.order_rc_num,mgmt_app_status.order_date,mgmt_app_status.order_valid_from_date,
  mgmt_app_status.order_valid_upto_date,mgmt_app_status.order_from_class,mgmt_app_status.order_to_class,
  mgmt_app_status.order_recog_number from students_school_child_count 
  left join mgmt_app_status on mgmt_app_status.school_id = students_school_child_count.school_id
  left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
  where mgmt_app_status.app_id = '$app_id';";
  $query = $this->db->query($sql);
  //print_r($this->db->last_query());die();
  $result = $query->row();
  return $result;    
}
public function student_wrong_entry_list($school)
{

    $sql = "select 'Students with Medium blank' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,education_medium_id as Field from students_child_detail scd join students_school_child_count sc on sc.school_id = scd.school_id where (education_medium_id is null or education_medium_id =0 or education_medium_id not between 1 and 32) and transfer_flag =0 and sc.school_id=$school union all select 'Students with Medium not matching Medium of their Section' as info, sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.education_medium_id as Field from students_child_detail scd join students_school_child_count sc on sc.school_id = scd.school_id join schoolnew_section_group g on g.school_key_id = scd.school_id where (g.class_id = scd.class_studying_id) and (g.section = scd.class_section) and (g.school_medium_id <> scd.education_medium_id) and scd.transfer_flag =0 and sc.school_id=$school union all select 'Students with Community blank' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.community_id as Field from students_child_detail scd left join students_school_child_count sc on sc.school_id = scd.school_id where (community_id is null or community_id = 0 or community_id not between 1 and 42) and transfer_flag =0 and sc.school_id=$school union all select 'Students with Religion blank' as info, sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.religion_id as Field from students_child_detail scd join students_school_child_count sc on sc.school_id = scd.school_id where (religion_id is null or religion_id = 0 or religion_id not between 1 and 8) and transfer_flag =0 and sc.school_id=$school union all select 'Students with DOB blank' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.dob as Field from students_child_detail scd join students_school_child_count sc on sc.school_id = scd.school_id where (dob is null or dob='0000-00-00' or year(dob) not between year(now())-25 and year(now())-3) and transfer_flag =0 and sc.school_id=$school union all select 'Students with Income group incorrect' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.parent_income as Field from students_child_detail scd join students_school_child_count sc on sc.school_id = scd.school_id where (parent_income is null or parent_income = 0 or parent_income > 13) and transfer_flag =0 and sc.school_id=$school union all select 'Students with Mother Tongue blank' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,scd.mothertounge_id as Field from students_child_detail scd left join students_school_child_count sc on sc.school_id = scd.school_id where (mothertounge_id is null or mothertounge_id = 0) and transfer_flag =0 and sc.school_id=$school union all select 'Students with HrSec-Class11 Group Incorrect' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name,scd.class_studying_id, scd.class_section,gr.group_description as Field from students_child_detail scd left join students_school_child_count sc on sc.school_id = scd.school_id left join baseapp_group_code gr on gr.id=scd.group_code_id where (group_code_id is null or group_code_id = 0 or group_code_id not in (373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400,401,402,403,404,405,406,407,408,409,410,411,412,415,416,417,418,419)) and transfer_flag =0 and class_studying_id=11 and sc.school_id=$school union all select 'Students with HrSec-Class12 Group Incorrect' as info,sc.block_name, sc.udise_code, sc.school_name,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section,gr.group_description as Field from students_child_detail scd left join students_school_child_count sc on sc.school_id = scd.school_id left join baseapp_group_code gr on gr.id=scd.group_code_id where (group_code_id is null or group_code_id = 0 or group_code_id not in (1,2,3,4,16,17,19,129,130,135,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,420,421,422,423,424)) and transfer_flag =0 and class_studying_id=12 and sc.school_id=$school;";
    $result = $this->db->query($sql);
    
    return $result->result_array();
}

public function nocwithcbse(){
// GROUP_CONCAT(CONCAT(b.app_id, ',', b.id) SEPARATOR '|')
$SQL="select a.id as district_id, a.district_name,COUNT(b.id) as total_entry,GROUP_CONCAT(b.app_id) as appids_in_status_tbl_are ,
GROUP_CONCAT(b.school_id) as schoolids_in_status_tbl_are 
        from schoolnew_district a
   left join mgmt_app_status b on  a.id = b.district_id and b.app_type = 3
       where b.district_id != '' group by b.district_id;";
    $query = $this->db->query($SQL);
    return $query->result_array();
}

public function ceo_nocwithcbse($dist){
  $sql = "select a.id as status_inx_id, a.district_id, a.school_id, a.sch_directorate_id,f.department, a.sch_mgmt_id,c.management,a.sch_cate_id,d.category_name, a.app_id, a.app_type,b.school_id,b.udise_code,b.school_name,b.edu_dist_id,e.edn_dist_name
          from mgmt_app_status a
          left join schoolnew_basicinfo b on b.school_id = a.school_id 
          left join schoolnew_management c on c.id = a.sch_mgmt_id
          left join schoolnew_category d on d.id=a.sch_cate_id
          left join schoolnew_edn_dist_mas e on e.id = b.edu_dist_id
          left join schoolnew_school_department f on f.id = a.sch_directorate_id
          where a.app_type = 3 and b.district_id = ".$dist.";";
  $query = $this->db->query($sql);
  return $query->result();
}
public function Save_Fit_India_Details($records)
{
if($records['id']!="" || $records['id']!=0)
{
          $this->db->where('id',$records['id']);
         $this->db->where('school_id',$records['school_id']);
         $this->db->update('schoolnew_fitindia',$records);
        // print_r($this->db->last_query());die();
        return $this->db->affected_rows();
}
else
{
  $result = $this->db->insert('schoolnew_fitindia',$records);
   return $result;
}

}
public function Fit_India_State_Report($month,$year)
{
 $sql = "select sc.district_name,sc.district_id,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' then 1 else 0 end) as Pri_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' then 1 else 0 end) as Mid_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' then 1 else 0 end) as High_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' then 1 else 0 end) as HSS_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.certified_yn = 1 then 1 else 0 end) as Pri_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.certified_yn = 1 then 1 else 0 end) as Mid_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.certified_yn = 1 then 1 else 0 end) as High_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.certified_yn = 1 then 1 else 0 end) as HSS_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.rating = 1 then 1 else 0 end) as Pri_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.rating = 1 then 1 else 0 end) as Mid_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.rating = 1 then 1 else 0 end) as High_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.rating = 1 then 1 else 0 end) as HSS_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.rating = 2 then 1 else 0 end) as Pri_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.rating = 2 then 1 else 0 end) as Mid_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.rating = 2 then 1 else 0 end) as High_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.rating = 2 then 1 else 0 end) as HSS_5star
from students_school_child_count sc
left join schoolnew_fitindia f on f.school_id = sc.school_id and sc.school_type_id = 1 and f.month = $month and f.year = $year and f.isactive = 1
where  sc.school_type_id = 1 group by sc.district_name;";

  $query = $this->db->query($sql);

  return $query->result();

}
public function Fit_India_District_Report($month,$year,$district_id)
{
 $sql = "select sc.block_name,sc.block_id, 
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' then 1 else 0 end) as Pri_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' then 1 else 0 end) as Mid_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' then 1 else 0 end) as High_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' then 1 else 0 end) as HSS_Total,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.certified_yn = 1 then 1 else 0 end) as Pri_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.certified_yn = 1 then 1 else 0 end) as Mid_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.certified_yn = 1 then 1 else 0 end) as High_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.certified_yn = 1 then 1 else 0 end) as HSS_Certified,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.rating = 1 then 1 else 0 end) as Pri_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.rating = 1 then 1 else 0 end) as Mid_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.rating = 1 then 1 else 0 end) as High_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.rating = 1 then 1 else 0 end) as HSS_3star,
sum(case when sc.school_type_id = 1 and cate_type = 'Primary School' and f.rating = 2 then 1 else 0 end) as Pri_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'Middle School' and f.rating = 2 then 1 else 0 end) as Mid_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'High School' and f.rating = 2 then 1 else 0 end) as High_5star,
sum(case when sc.school_type_id = 1 and cate_type = 'Higher Secondary School' and f.rating = 2 then 1 else 0 end) as HSS_5star
from students_school_child_count sc
left join schoolnew_fitindia f on f.school_id = sc.school_id and sc.district_id = $district_id and sc.school_type_id = 1 and f.month = $month and f.year = $year and f.isactive = 1
where sc.district_id = $district_id and sc.school_type_id = 1 group by sc.block_name;";
  $query = $this->db->query($sql);
 
  return $query->result(); 
}

public function Fit_India_Block_Report($month,$year,$block)
{
 $sql = "select sc.block_name as Block, sc.udise_code as UDISE, sc.school_name as Sch_Name, sc.cate_type as Category,
case when f.certified_yn = 1 then 'Certified' else 'Not Certified' end as Certified,
case when f.participate_yn = 1 then 'Yes' else 'No' end as Participated,
f.students as 'Students_Participated',
f.flags as 'Flags_won',
case when f.rating = 0 then 'No Star' when f.rating = 1 then '3 Star' when f.rating = 2 then '5 Star' end as Rating,
f.photos_upload as 'Photos',
f.videos_upload as 'Videos'
from students_school_child_count sc
left join schoolnew_fitindia f on f.school_id = sc.school_id and sc.block_id = $block and sc.school_type_id = 1 and f.month = $month and f.year = $year and f.isactive = 1
where sc.block_id = $block and sc.school_type_id = 1 group by sc.school_name;";
  $query = $this->db->query($sql);
   
  return $query->result(); 
}
public function Fit_India_Detials_get($school,$month,$yr)
{
  if($school!="" && $month!="" && $yr!="")
  {
    $sql = "select * from schoolnew_fitindia where school_id=$school and month=$month and year = $yr and isactive=1";
  $query = $this->db->query($sql);
  return $query->result(); 
  }
  else
  {
    return 0;
  }
}
public function Get_App_id($school)
{
  $sql="select * from mgmt_app_status where school_id=$school and district_id!=''";
  $query = $this->db->query($sql);
  return $query->result(); 

}

public function elearn($where){
  $SQL="select content_name as 'ContentName', label as 'Label', chapter as 'Chapter', bk_unit as 'UnitNo', bk_unit_name as 'UnitName', 
  bk_chapter as 'BookChapter', bk_chapter_name as 'BookChapterName',bk_subchapter as 'BookSubChapter', bk_subchapter_name as 'BookSubchapterName',class as 'Class', subject as 'Subject', 
  medium as 'Medium',classification as 'Classification',category as 'Category',term as 'Term', file_type as 'FileType'from students_elearn_content where isactive = 1 ".$where." ;";
    $query = $this->db->query($SQL);
    return $query->result_array();
}

/** KGBV & CWSN class & sec list starts here by wesley**/
public function get_kgbv_cwsn_schoolwise_class_section($school_id)
{
    $ts=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($ts[1]),true);	
    $mgmt_id=$token['manage_id'];
    $schl_type_id=$token['school_type_id'];
    if($mgmt_id=='32' && $schl_type_id=='1' ){
        // $this->db->select("a.school_key_id,a.class_id,c.id as student_id,b.class_studying,c.name as student_name,c.class_section as section")
        // ->from('schoolnew_section_group a')
        // ->join('baseapp_class_studying b','b.id = a.class_id','left')
        // ->join('students_child_detail c','c.class_studying_id = a.class_id', 'left')
        // ->where('a.school_key_id',$school_id)
        // ->group_by('a.class_id');
        //$result = $this->db->get()->result();
        //print_r($this->db->last_query());die();
        $SQL = "select a.id as student_id,a.name as student_name,a.school_id as school_key_id,a.class_studying_id as class_id,a.class_section as section,
        b.class_studying as class_studying from students_child_detail a join baseapp_class_studying b on b.id = a.class_studying_id where school_id = '$school_id'  order by a.class_studying_id;";
        $query = $this->db->query($SQL);  
        //print_r($this->db->last_query());die();
        $result = $query->result_array();
    }else{
        // $SQL="select school_id as school_key_id,class_studying_id as class_id,class_studying from students_child_detail c
        // join baseapp_class_studying b on b.id = c.class_studying_id where school_id='$school_id' and transfer_flag=0 and (differently_abled<>0 or differently_abled is not null) group by
        //   class_studying_id;";

        $SQL="select c.id as student_id,c.name as student_name,c.class_section as section,c.school_id as school_key_id,c.class_studying_id as class_id,class_studying from students_child_detail c
        join baseapp_class_studying b on b.id = c.class_studying_id where school_id='$school_id' and transfer_flag=0 and
        (differently_abled<>0 and differently_abled is not null) order by
        class_id;";

        $query = $this->db->query($SQL);  
        //print_r($this->db->last_query());die();
        $result = $query->result_array();
    }   
    
    return $result;
}


public function get_kgbv_cwsn_stud_map_schl($school_id)
{
    $ts=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($ts[1]),true);	
    $schl_id=$token['school_id'];
    if(!empty($schl_id)){
        //$SQL="select b.student_id as StudentID,a.name as studentName,c.benefit_type as Benefit,c.term as term,c.distribute_date as DistributeOn from students_child_detail a join students_covid_school_map b on b.student_id = a.id join students_covid_benefit_tracking c on c.student_id = b.student_id where b.collection_school_id='$schl_id';";
        $SQL="select b.id as IndexID,b.student_id as StudentID,a.name as studentName,b.benefit_type as Benefit from students_child_detail a join students_covid_school_map b on b.student_id = a.id where b.collection_school_id='$schl_id';";
        $query = $this->db->query($SQL);  
        //print_r($this->db->last_query());die();
        $result = $query->result_array();
    }   
    
    return $result;
}

public function kgbv_cwsn_maped_Stud_Detls($school_id)
{
    $ts=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($ts[1]),true);	
    $schl_id=$token['school_id'];
    if(!empty($schl_id)){
        $SQL="select id as IndexID,student_id as StudentID,current_school_id as CurrentSchool,collection_school_id as CollectSchool,student_type as StudType,benefit_type as benefit from students_covid_school_map where current_school_id='$schl_id';";
        $query = $this->db->query($SQL);  
        $result = $query->result_array();
        return $result;
    }      
    
}
/** KGBV & CWSN class & sec list ends here by wesley**/
public function zonalSchool($block_id){
  $SQL="SELECT a.zonal_id,b.udise_code,a.school_id,b.school_name,b.district_id,b.district_name,b.block_id,b.block_name,c.brte_id,d.brte_name,c.map_type FROM schoolnew_zonal_schools a left join students_school_child_count b on a.school_id = b.school_id and a.isactive=1 left join schoolnew_brte_map c on c.zonal_id = a.zonal_id and c.isactive=1 left join brte_school_groups d on d.brte_id = c.brte_id where b.block_id =$block_id  and a.isactive = 1 group by a.school_id";
        $query = $this->db->query($SQL);  
        $result = $query->result_array();
        return $result;
}
public function zonalSubSchool($zid){
  $SQL="SELECT a.id,a.zonal_id,b.udise_code as subschool_udise_code,a.subschool_id,b.school_name as subschool_name
  from schoolnew_zonal_subschools a 
  left join students_school_child_count b on a.subschool_id = b.school_id 
  where a.zonal_id = ".$zid." and a.isactive = 1;";
        $query = $this->db->query($SQL);  
        $result = $query->result_array();
        return $result;
}
public function get_school_volunteer($block_id){
  $SQL="SELECT * FROM students_school_child_count where block_id = $block_id and school_type_id in (1,2,4);";
  $query = $this->db->query($SQL);
  return $query->result_array();
}
public function get_teach_stud_count($dist_id){
 // $SQL="select students_school_child_count.block_id as BlckID,students_school_child_count.school_name as SchlNam,students_school_child_count.school_id as SchlID,coalesce(SF.stud,0) as StudCount,coalesce(tv.teach,0) as TeachCount from students_school_child_count join (select school_key_id,count(*) as teach from teacher_volunteers group by school_key_id) as tv on tv.school_key_id = students_school_child_count.school_id join (select school_id,count(*) as stud from students_non_formal  group by school_id) as SF on SF.school_id = students_school_child_count.school_id where students_school_child_count.district_id = $dist_id group by students_school_child_count.school_id;";
  $SQL="select students_school_child_count.block_id as BlckID,students_school_child_count.school_name as
  SchlNam,students_school_child_count.school_id as SchlID,coalesce(SF.stud,0) as StudCount,coalesce(tv.teach,0) as
  TeachCount from students_school_child_count 
  left join (select id,school_key_id,count(*) as teach from teacher_volunteers where teacher_volunteers.Active=1 and type>0 group
  by school_key_id) as tv on tv.school_key_id = students_school_child_count.school_id 
  left join (select id,school_id,count(*) as stud from students_non_formal where students_non_formal.Active=1 group by school_id ) as SF on SF.school_id = students_school_child_count.school_id where (SF.id is not null or tv.id is not null) and
  students_school_child_count.district_id = $dist_id group by students_school_child_count.school_id;";
  $query = $this->db->query($SQL);
  return $query->result_array();
}
public function get_teach_data($id){
  $SQL="select id as IndxID,school_key_id as SchlID,teacher_name as TeachNam,teacher_code as TeachCod,aadhar_no as Aadhar,email as Email,gender as Gendr,staff_dob as StaffDOB,staff_join as StaffJoin,organization_type as OrgTyp,organization_name as OrgNam,mbl_nmbr as MblNo,social_category as SclCategory,type as VolunteerCategory,academic as Academic,e_ug as E_UG,e_pg as E_PG,professional as Profsnl,age as AGE,Active as Status from teacher_volunteers where id = $id;";
  $query = $this->db->query($SQL);
  return $query->result_array();
}
public function get_stud_data($id){
  $SQL="select id as IndxID,school_id as SchlID,student_name as StudNam,gender as Gendr,da_type as Disability,parent_type as ParentType,parent_name as ParentName,mother_tongue as MotherTongue,academic_qualify as AcademicQualify,aadhar_no as Aadhar,mobile as Mobile,social_category as SocialCategory,address as Address,pincode as Pincode,district_id as DistrictId,native_district_id as NativeDistrictId,dob as DOB,doj as DOJ, age as AGE from students_non_formal where id = $id;";
  $query = $this->db->query($SQL);
  return $query->result_array();
}
}
?>
