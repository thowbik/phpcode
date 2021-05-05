 <?php
 /**
 * CEO Model 
 * 21/01/2018
 * VIT-Sriram
 **/
class Collector_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

/**
    * Ceo Profile
    * 21/01/2019
    * VIT-Sriram
    **/
public function get_districtName($district_id)
    	{
    		$result = $this->db->get_where('schoolnew_district',array('id'=>$district_id))->first_row();
    		return $result;
    	}
   function get_school_by_id($school_id,$district_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$school_id);
      $this->db->where('curr_stat',1);
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();


   }
    function emis_ceo_resetpassword($district_id,$username,$data){
      $this->db->where('emis_user_id', $district_id);
       $this->db->where('emis_username', $username);
      return $this->db->update('emis_userlogin', $data);         
    }
    /**
    * Ceo All Blockwise SChool View
    * 21/01/2019
    * VIT-Sriram
    **/


    	

		public function get_emis_blockwise_district($district_name,$school_type,$cate_type)
		        {

		            $this->db->select('block_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total,district_name')
		              ->from('students_school_child_count')
  		              ->where('district_name',$district_name);
 
		              if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->where_in('cate_type',$cate_type);
          }
		              $this->db->group_by('block_name ');
		              // return $result;
		              $result = $this->db->get()->result();
		              // print_r($this->db->last_query());die;
		                return $result;
		            // print_r(count($result));die;
		        }
//pearlin

              public function  emis_staff_BRTE_list($dist_id)
   {
     $sql ="SELECT COUNT(1) AS cnt,district_name,off_sch.district_id,teacher_code,teacher_name,(select subjects from teacher_subjects where teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr FROM udise_staffreg
JOIN (
SELECT school_id,district_id,district_name FROM students_school_child_count
UNION ALL
SELECT off_key_id,district_id,district_name FROM udise_offreg
JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 and  off_sch.district_id=".$dist_id." group by teacher_code;";
     $query =  $this->db->query($sql);
      return $query->result();   
   }
            public function boys_schl_with_girls_enrol($dist_id)
            {

                $SQL= "select schoolnew_academic_detail.school_type,school_id,school_name,block_name,students_school_child_count.udise_code,district_name,teacher_name,mbl_nmbr  from students_school_child_count
 join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id=students_school_child_count.school_id
 join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
where schoolnew_academic_detail.school_type='Boys' and students_school_child_count.district_id=".$dist_id." and total_g>0 and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29)";
            $query = $this->db->query($SQL);
            //print_r($sql);
        return $query->result_array();

            }
             public function action_item_description($dist_id)
            {

                $SQL= "select 
sum(case when schoolnew_academic_detail.school_type='Boys' AND total_g>0 then 1 else 0 end) as bys_enr_grls_cnt,
sum(case when schoolnew_academic_detail.school_type='Girls' AND total_b>0 then 1 else 0 end) as grls_enr_bys_cnt,
schoolnew_academic_detail.school_type,count(school_id),school_id,school_name,block_name,students_school_child_count.udise_code,district_name,teacher_name,mbl_nmbr  from students_school_child_count
 left join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id=students_school_child_count.school_id
 left join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
where (schoolnew_academic_detail.school_type='Boys' or schoolnew_academic_detail.school_type='Girls') and students_school_child_count.district_id=".$dist_id." and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29) group by schoolnew_academic_detail.school_type;";
            $query = $this->db->query($SQL);
            //print_r($sql);
        return $query->result_array();

            }
               public function primary_school($dist_id)
            {

                $SQL= "select count(*) as cnt from students_school_child_count where cate_type='Primary School' and high_class>5 and district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
              public function primary_school_list($dist_id)
            {

                $SQL= "select distinct(students_school_child_count.school_id),(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29) limit 1) as name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29) limit 1) as phone,students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.school_name,students_school_child_count.udise_code from students_school_child_count
left join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
 where cate_type='Primary School' and students_school_child_count.high_class>5 and students_school_child_count.district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
             public function middle_school($dist_id)
            {

                $SQL= "select count(*) as cnt from students_school_child_count where cate_type='Middle School' and high_class>8 and district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
              public function middle_school_list($dist_id)
            {

                $SQL= "select distinct(students_school_child_count.school_id),(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29) limit 1) as name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29) limit 1) as phone,students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.school_name,students_school_child_count.udise_code from students_school_child_count
left join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
 where cate_type='Middle School' and students_school_child_count.high_class>8 and students_school_child_count.district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
             public function girls_schl_with_boys_enrol($dist_id)
            {

                $SQL= "select schoolnew_academic_detail.school_type,school_id,school_name,students_school_child_count.udise_code,district_name,block_name,teacher_name,mbl_nmbr  from students_school_child_count
 join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id=students_school_child_count.school_id
 join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
where schoolnew_academic_detail.school_type='Girls' and students_school_child_count.district_id=".$dist_id."  and total_b>0 and (teacher_type=26 OR teacher_type=27 OR teacher_type=28 OR teacher_type=29)";
            $query = $this->db->query($SQL);
            //print_r($sql);
        return $query->result_array();

            }
            public function get_renewal_state_school($school_type,$block_name)
     {
      // echo $dist_name;
          $this->db->SELECT('ssc.school_name,ssc.management,ssc.category,ssc.udise_code,ssc.school_id
,ssc.management as mange, ac.yr_last_renwl as last_year,yr_recgn_first,ac.certifi_no ,sd.department')
          ->FROM('students_school_child_count ssc')
          ->JOIN('schoolnew_academic_detail ac','ac.school_key_id = ssc.school_id','left')
          ->JOIN('schoolnew_basic_detail sb','sb.school_id = ssc.school_id','left')
          ->JOIN('schoolnew_school_department sd','sd.id = sb.sch_directorate_id','left')

          ->WHERE('block_name',$block_name)
          ->WHERE_in('ssc.school_type',$school_type)
          ->group_by('ssc.school_id');

          $result = $this->db->get()->result();
          // print_r($result);
          return $result;
        }

	/**
    * Ceo All SChool Report
    * 21/01/2019
    * VIT-Sriram
    **/    

		public function get_blockwise_school($block_name,$school_type,$cate_type)
        {
    
            $this->db->select('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total,district_name')
              ->from('students_school_child_count')
              ->where('block_name',$block_name);
              if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->where_in('cate_type',$cate_type);
          }
             $this->db->group_by('udise_code');
              $result = $this->db->get()->result();

              return $result;
        }
   
          /**
          * Ceo District DashBoard
          * VIT-Sriram
          * 26/01/2019
          **/

          public function get_district_school_student_teacher_total($district_name)
          {

            $this->db->select('sum(teach_mle+teach_fmle+nonteach_mle+nonteach_fmle) as teacher_total,sum(nonteach_mle+nonteach_fmle) as nonteaching_total,sum(total_b+total_g+total_t) as student_total,count(students_school_child_count.school_id) as school_total,')
            ->from('teacher_profile_count')
            -> join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('district_name',$district_name);
           
            $result = $this->db->get()->first_row();
            // echo"<pre>";print_r($result);echo"</pre>";die;
            return $result;

          }

         /**
         * Ceo District Dashboard School Type
         * VIT- Sriram
         * 26/01/2019
         **/
          public function get_district_scool_type_based_schoolinfo($district_name)
          {
              $this->db->select('school_type');
              $this->db->group_by('school_type');
              $result = $this->db->get_where('students_school_child_count',array('school_type !='=>''))->result();
              // print_r($result);die;

              if(!empty($result))
              {
              $over_school_info['result'] = $result;

                foreach($result as $res)
                {
                  $school_info[] = $this->get_district_school_type_count($res->school_type,$district_name);
                }
              $over_school_info['school_info'] = $school_info;

                
              }else
              {
                $over_school_info['school_info'] = '';
                $over_school_info['result'] = '';
              }
              // $over_school_info['school_type'] = $result;
            // echo"<pre>";print_r($over_school_info);echo"</pre>";die;

              return $over_school_info;
          }

          public function get_district_school_type_count($school_type,$district_name)
          {
            
             $this->db->select('sum(nonteach_mle+nonteach_fmle) as non_teach,IFNULL(sum(teach_mle+teach_fmle),0) as teacher_total,IFNULL(sum(total_b+total_g+total_t),0) student_total,IFNULL(count(students_school_child_count.school_id),0) as school_total,district_id')
            ->from('teacher_profile_count')
            ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('district_name',$district_name)
            ->where('school_type',$school_type);
            


             $result = $this->db->get()->first_row();
              // print_r($)
             $school_details[$school_type] = $result;

             return $school_details;
          }
  

  public function get_ceo_school_info($district_name,$school_type)
  {

    $this->db->select('*');
    $this->db->from('students_school_child_count');
    $this->db->where('district_name',$district_name);
    if(!empty($school_type))
    {
    $this->db->where_in('school_type',$school_type);

    }
       $result =  $this->db->get()->result();
    return $result;
  }

  public function get_edu_dist($dist_id)
  {

    $this->db->select('edu_dist_name,edu_dist_id,block_id,block_name');
    $this->db->from('students_school_child_count');
    $this->db->where('district_id',$dist_id);
    $this->db->group_by('edu_dist_name');
   
       $result =  $this->db->get()->result();
    return $result;
  }
  public function get_dist_name1()
  {

    $this->db->select('district_name,district_id');
    $this->db->from('students_school_child_count');
    $this->db->group_by('district_name');
   
       $result =  $this->db->get()->result();
    return $result;
  }


  public function get_edu_dist_blk($dist_id)
  {

    $this->db->select('edu_dist_name,edu_dist_id,block_id,block_name');
    $this->db->from('students_school_child_count');
    $this->db->where('edu_dist_id',$dist_id);
    $this->db->group_by('block_name');
   
       $result =  $this->db->get()->result();
    return $result;
  }
  public function get_schoolwise_teacher_list($school_id)
  {
    $head_master_array = array(26,27,28,29);
    $this->db->select('udise_staffreg.school_key_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.u_id,udise_staffreg.gender,udise_staffreg.staff_join,teacher_report.id,teacher_report.teacher_id,teacher_report.partici,teacher_report.school_key_id as sch_id,teacher_report.dates,udise_staffreg.archive');
    $this->db->from('udise_staffreg')
             ->join('teacher_report','teacher_report.teacher_id = udise_staffreg.teacher_code','left');
    $this->db->where('udise_staffreg.school_key_id',$school_id);
    
    $this->db->where('udise_staffreg.archive',1);
    $result = $this->db->get()->result();
    // print_r($result);
    // echo $school_id;die;
    return $result;
  }

  

    public function save_teacher_reports($records)
    {
      if($records['id'] !='')
      {
        // echo "if";
          $this->db->where('id',$records['id']);
          $this->db->update('teacher_report',$records);
          return $records['id'];
      }else
      {
        // echo "else";
      $this->db->insert('teacher_report',$records);
      return $this->db->insert_id();
      }
    }

    public function get_school_name($school_id)
    {


    $this->db->select('school_name');
    $result = $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
    return $result;
    }


    /**
    * Get Teacher District Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_district_reports($dist_name,$school_type)
    {
      $this->db->distinct();
     $this->db->select("sum(b.totstaff) as total_teacher,b.edu_dist_name,sum(a.part) as 'teacher_participate',sum(a.notpart) as 'teacher_not_participate'");
      $this->db->from('students_school_child_count b');
      $this->db->join(" (select count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id from teacher_report where archive = 1 group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
      $this->db->where('district_name',$dist_name);
      $this->db->where_in('b.school_type',$school_type);
      $this->db->group_by('b.edu_dist_name');
      $result = $this->db->get()->result();

      // print_r($this->db->last_query());
      return $result;  
    }
    /**
    * Get Teacher Block Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_block_reports($edu_name,$school_type)
    {
      $this->db->distinct();
       $this->db->select("sum(b.totstaff) as total_teacher,b.block_name,sum(a.part) as 'teacher_participate',sum(a.notpart) as 'teacher_not_participate'");
      $this->db->from('students_school_child_count b');
      $this->db->join(" (select count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id from teacher_report where archive = 1 group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
      $this->db->where('b.edu_dist_name',$edu_name);
      $this->db->where_in('b.school_type',$school_type);
      $this->db->group_by('b.block_name');
      $result = $this->db->get()->result();
      // print_r($result);
      return $result;
    }

    /**
    * Get Teacher School Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_school_reports($block_name,$school_type)
    {
      // echo $block_name;
      $this->db->distinct();
      $this->db->select("count(DISTINCT(a.teacher_id)),b.totstaff as total_teacher,sum(if(partici=1,1,0)) as 'teacher_participate', sum(if(partici =0,1,0)) as 'teacher_not_participate',school_name,udise_code,school_id");
      $this->db->from('students_school_child_count b');
      $this->db->join('teacher_report a','a.school_key_id = b.school_id','left');
      $this->db->where('b.block_name',$block_name);
      $this->db->where_in('b.school_type',$school_type);
      $this->db->group_by('b.school_id');
      $this->db->where('a.archive',1);
      $result = $this->db->get()->result();
      // print_r($result);
      return $result;

    }

    public function get_teacherstrick_teacher_reports($school_id,$school_type)
    {
      // echo $school_id;
      $this->db->distinct();
      $this->db->select('*');
      $this->db->from('teacher_report');
      $this->db->join('udise_staffreg','udise_staffreg.school_key_id = teacher_report.school_key_id and udise_staffreg.teacher_code = teacher_report.teacher_id ');
      $this->db->where('teacher_report.school_key_id',$school_id);
      $this->db->where('teacher_report.archive',1);
      $result = $this->db->get()->result();
      // print_r($result);die;
      return $result;
    }

    function getmanagecate(){
       $this->db->select('*'); 
       $this->db->from('schoolnew_manage_cate');
       $query =  $this->db->get();
       return $query->result();

    }
    
    
     /**
    * Special Reports
    * VIT - sriram
    * 07/02/2019
    */

      function schoolcatemanagefilter($school_type,$cate,$id1,$id2,$dist_id){
 
    $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`school_name`, (Prkg_b+Prkg_g+Prkg_t) as PREKG, (lkg_b+lkg_g+lkg_t) as LKG, (ukg_b+ukg_g+ukg_t) as UKG, (c1_b+c1_g+c1_t) as class_1, (c2_b+c2_g+c2_t) as class_2, (c3_b+c3_g+c3_t) as class_3, (c4_b+c4_g+c4_t) as class_4, (c5_b+c5_g+c5_t) as class_5, (c6_b+c6_g+c6_t) as class_6, (c7_b+c7_g+c7_t) as class_7, (c8_b+c8_g+c8_t) as class_8, (c9_b+c9_g+c9_t) as class_9, (c10_b+c10_g+c10_t) as class_10, (c11_b+c11_g+c11_t) as class_11, (c12_b+c12_g+c12_t) as class_12, `total`, count(distinct(students_school_child_count.school_id)) as schoolcount, sum(teach_tot) as teachercount,sum(nonteach_tot) as nonteachercount')
      ->from('students_school_child_count')
     
     ->where('district_id',$dist_id)
     ->where('school_type',$school_type)
     ->where('cate_type',$cate)
     ->group_by('school_type')
     ->group_by('district_name')
     ->group_by('block_name')
     ->group_by('management')
     ->group_by('cate_type')
     ->group_by('school_id')
     ->group_by('udise_code')
     ->group_by('school_name');
     // print_r($id1);
     if(!empty($id1) && !empty($id2))
     {
       $this->db->where('total<=',$id1);
       $this->db->where('total>=',$id2);
     }
     else if(!empty($id2) && empty($id1) )
     {
      $this->db->where('total>=',$id2);
     }
     else if(!empty($id1) && empty($id2) )
     {
      $this->db->where('total<=',$id1);
     }
     // ->where('schoolnew_basicinfo.curr_stat',1)
     // ->group_by('schoolnew_district.district_name')
     // ->group_by('schoolnew_block.block_name')
     // ->group_by('schoolnew_edn_dist_mas.edn_dist_name')
     // ->group_by('schoolnew_management.management')
     // ->group_by('baseapp_category.category_name')
     // ->group_by('schoolnew_basicinfo.school_id')
     // ->group_by('schoolnew_basicinfo.udise_code')
     // ->group_by('schoolnew_basicinfo.school_name');
     $query =  $this->db->get();
      // print_r($query->result());die;
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }  
  }
  public function get_school_type()
  {
      $result = $this->db->get('schoolnew_type')->result();
      return $result;
  }

  /**
        *Get Attendance School Report Districtwise
        *VIT-sriram
        *09/02/2019
        **/

        public function get_attendance_schoolreport_districtwise($date)
        {
          

            $date = date('Y-m-d');
         
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("b.district_name,count(distinct b.school_id) as total_school",false)
         ->select('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked_school"',false)
         ->select('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked_school"',false)
         ->from('students_school_child_count b')
         ->join(' (select count(st_section) as section,school_id from students_attend_daily where date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->where_in('school_type',$school_type)
         ->group_by('b.district_name');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          return $result;
         
        }

        /**
        *get attendance students Blockwise
        *VIT - sriram
        *09/02/2019
        **/

        public function get_attendance_report_blockwise($dist_id,$date)
        {
           /* $today_date = date('Y-m-d');
            // echo $dist_id;
          $this->db2 = $this->load->database('attendance', TRUE);

          // echo "<pre>";print_r($db2);echo "</pre>";die;

          // $today_date = '2019-01-07';

          $this->db2->select('sum(session1_allP) as today_present,sum(session1_allA) as today_absent,block_id,sb.block_name ');
          
          $this->db2->from('statt_attendance_livelogs as table1');
          $this->db2->join('schoolnew_block sb','sb.id= table1.block_id');
          $this->db2->join('statt_management','statt_management.id = table1.managment_id');
          $this->db2->join('schoolnew_district sd','sd.id = table1.district_id');

          $this->db2->where('sd.district_name',$dist_id);
           $this->db2->where_in('statt_management.mana_cat_id',1,2,3,4,5,6,7,8,9,10);
           

          
            $this->db2->where('date',date('Y-m-d',strtotime($date)));
          
          $this->db2->group_by('table1.block_id');
         $result['blockwise_absentlist'] =  $this->db2->get()->result();
         // print_r($this->db2->last_query());die;
         // print_r($result);die;
          if(!empty($result['blockwise_absentlist'])){
              foreach ($result['blockwise_absentlist'] as $key =>$value) {
                $this->db2->select('sum(total) as today_total_student');
         $result_district_total_count ['total'][$value->block_name]= $this->db2->get_where('students_school_child_count',array('block_name'=>$value->block_name))->first_row();
                
              }
              $result = array_merge_recursive($result,$result_district_total_count);
          }
          // echo "<pre>";
          // print_r($result);
          // echo "</pre>";die;
          return $result;*/
        }

        /**
        *get attendance school Blockwise
        *VIT - sriram
        *09/02/2019
        **/

        public function get_attendance_schoolreport_blockwise($dist_id,$date,$table)
        {
            $date = date('Y-m-d',strtotime($date));
         
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("b.block_name,count(distinct b.school_id) as total_school",false)
         ->select('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked_school"',false)
         ->select('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked_school"',false)
         ->from('students_school_child_count b')
         ->join(' (select count(st_section) as section,school_id from '.$table.' where date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->where_in('school_type',$school_type)
         ->where('district_name',$dist_id)
         ->group_by('b.block_name');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          return $result;
         
        }
        
      


       

    /**
     * get School Type Districts
     * VIT-sriram
     * 09/02/2019
     */

     public function get_attendance_school_type()
     {
      $date = date('Y-m-d');
         $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("b.school_type,count(distinct b.school_id) as total_school",false)
         ->select('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked"',false)
         ->select('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked"',false)
         ->from('students_school_child_count b')
         ->join(' (select count(st_section) as section,school_id from students_attend_daily where date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->where_in('school_type',$school_type)
         ->group_by('school_type');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);die;
        return $result;
     }

     /**
     * Get School Type Blockwise
     * VIT-sriram
     * 09/02/2019
     **/
     public function get_attendance_school_type_blockwise($dist,$date,$table)
     {
      $date = date('Y-m-d',strtotime($date));
         $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("b.school_type,count(distinct b.school_id) as total_school",false)
         ->select('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked"',false)
         ->select('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked"',false)
         ->from('students_school_child_count b')
         ->join(' (select count(st_section) as section,school_id from '.$table.' where date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->where_in('school_type',$school_type)
         ->where('district_name',$dist)
         ->group_by('school_type');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);die;
        return $result;
     }



      /**
     * Get Renewal block
     * VIT-sriram
     * 11/02/2019
     **/

     public function get_renewal_district_block($school_type,$dist_name)
     {
      // echo $dist_name;
          $this->db->select('ssc.block_name
,count(ssc.management) as mange,count(ac.yr_last_renwl) as last_year')
  ->from('students_school_child_count ssc')



  ->join('schoolnew_academic_detail as ac','ac.school_key_id = ssc.school_id','left')

  ->join('schoolnew_basic_detail as sb','sb.school_id = ssc.school_id','left')

  ->join('schoolnew_school_department sd','sd.id = sb.sch_directorate_id','left')

  ->where_in('ssc.school_type',$school_type) 
  ->where('ssc.district_name',$dist_name) 
  ->group_by('ssc.block_name');
  $result = $this->db->get()->result();
  // print_r($this->db->last_query());  
          return $result;
        }


           /**
     * Get Renewal School
     * VIT-sriram
     * 11/02/2019
     **/

     public function get_renewal_district_school($school_type,$block_name)
     {
      // echo $dist_name;
          $this->db->select('ssc.school_name,ssc.management,ssc.category,ssc.udise_code,ssc.school_id
,ssc.management as mange, ac.yr_last_renwl as last_year,yr_recgn_first,ac.certifi_no ,sd.department')
          ->from('students_school_child_count ssc')
          ->join('schoolnew_academic_detail ac','ac.school_key_id = ssc.school_id')
          ->join('schoolnew_basic_detail sb','sb.school_id = ssc.school_id')
          ->join('schoolnew_school_department sd','sd.id = sb.sch_directorate_id')
          
          ->where('block_name',$block_name)
          ->where_in('ssc.school_type',$school_type)
          ->group_by('ssc.school_id');

          $result = $this->db->get()->result();
          // print_r($result);
          return $result;
        }
        /**
        * Attendance Search
        * VIT-sriram
        * 12/02/2019
        **/

        public function get_attendance_search_details($date,$school_type,$block,$table)
     {
      // print_r($school_type);
      $date = date('Y-m-d',strtotime($date));
        $this->db->select("b.section_nos,b.udise_code,b.school_name,b.block_name,sum(total) as today_total_student,b.school_id",false)
         ->select('sum(IFNULL(section, 0)) as marked_section',false)
         ->select('IFNULL(a.persent, 0) as today_present',false)
         ->select('IFNULL(absent, 0) as today_absent ',false)
         ->select('IFNULL(today_present,0) as total_persent')
         ->from('students_school_child_count b')
         ->join(' (select sum(session1_all) as today_present,count(st_section) as section,sum(session1_allP) as persent ,sum(session1_allA) as absent,school_id from '.$table.' where date = "'.$date.'"  group by school_id) as a','a.school_id = b.school_id','left');

         // if(!empty($school_type))
         // {
         //   $this->db->where('school_type',$school_type['name']);
         //   $this->db->where($school_type['atten_details']);
         //   if(!empty($school_type['district_name']))
         //   {
         //      $this->db->where('district_name',$school_type['district_name']);
         //   }
         // }

         // if(!empty($district))
         // {

         //   $this->db->where('district_name',$district['name']);
         //   $this->db->where_in('school_type',$district['school_type']);
         //   $this->db->where($district['atten_details']);

         // }

         if(!empty($block))
         {
            if($block['name'] !='none'){
            $this->db->where('block_name',$block['name']);
            }else
            {
              $this->db->where('district_name',$block['district']);
            }
            $this->db->where($block['atten_details']);
            $this->db->where_in('school_type',$block['school_type']);
         }

         $this->db->group_by('b.school_id');


         $result = $this->db->get()->result();
         // print_r($this->db->last_query());die;
         return $result;

     }


     /**
     * Attendance Teacher Search
     * VIT-sriram
     * 16/03/2019
     **/
     public function get_teacher_attendance_search($date,$school_type,$district,$block,$table)
     {

          // $school_type = array('Government','Fully Aided','Partially Aided');
      $date = date('Y-m-d',strtotime($date));
         $this->db->select("sum(distinct a.totstaff) as total_teacher,a.block_name,a.school_id,udise_code,school_name",false)
         ->select('(case when (b.prensent is null and school_code is null) then 0 else (a.totstaff - IFNULL(b.absent, 0)) end) as present',false)
         ->select('sum(IFNULL(b.absent,0)) as absent,IFNULL(b.school_code,-1) school_code',false)
         ->from('students_school_child_count a')
         ->join(' (select school_code,
                sum(distinct case when attstatus="" then 1 else 0 end) as prensent,
                sum(distinct case when (attstatus="A" or attstatus="L") then 1 else 0 end) as absent from '.$table.' where date = "'.$date.'" group by teacher_code,school_code) as b','a.udise_code = b.school_code','left');
         if(!empty($school_type))
         {
           $this->db->where('school_type',$school_type['name']);
           $this->db->where($school_type['atten_details']);
           $this->db->where('district_name',$school_type['district']);
           
         }

        

         if(!empty($block))
         {

            if($block['name'] !='none'){
            $this->db->where('block_name',$block['name']);
            }else
            {
              $this->db->where('district_name',$block['district']);
            }
            $this->db->where($block['atten_details']);
            $this->db->where_in('school_type',$block['school_type']);
         }

         $this->db->group_by('a.school_id');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
     }


        /**
        * Get attendance Teacher Blockwise
        * VIT-sriram
        * 18/02/2019
        **/

        public function get_attendance_teacherreport_blockwise($dist,$date,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("count(a.school_id) as total_school,a.block_name",false)
         ->select('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->from('students_school_child_count a')
         ->join(' (select count(distinct school_code) as "marked_school" ,school_code from '.$table.' where date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
         ->where('district_name',$dist)
         ->where_in('school_type',$school_type)
         ->group_by('a.block_name');
         
         $result = $this->db->get()->result();
         return $result;
        }

        /**
      * Teacher Attendance Blockwise
      * VIT-sriram
      * 18/02/2019
      ***/
     public function get_attendance_teacher_tpye_blockwise($dist,$date,$table)
     {
      $date = date('Y-m-d',strtotime($date));

         $school_type = array('Government','Fully Aided','Partially Aided');

         $this->db->select("count(a.school_id) as total_school,a.school_type",false)
         ->select('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->from('students_school_child_count a')
         ->join(' (select count(distinct school_code) as "marked_school" ,school_code from '.$table.' where date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
          ->where('a.district_name',$dist)
         ->where_in('school_type',$school_type)

         ->group_by('a.school_type')
         ->order_by("a.school_type_id asc");
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
     }

        /**
        *get attendance school schoolWise
        *VIT - sriram
        *08/02/2019
        **/
        public function get_attendance_report_schoolwise($block_id,$date,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');

         
          $this->db->select("b.section_nos,b.udise_code,b.school_name,sum(total) as today_total_student,b.school_id",false)
         ->select('sum(IFNULL(section, 0)) as marked_section',false)
         ->select('IFNULL(a.persent, 0) as today_present',false)
         ->select('IFNULL(absent, 0) as today_absent ',false)
         ->select('IFNULL(today_present,0) as total_persent')
         ->from('students_school_child_count b')
         ->join(' (select sum(session1_all) as today_present,count(st_section) as section,sum(session1_allP) as persent ,sum(session1_allA) as absent,school_id from '.$table.' where date = "'.$date.'"  group by school_id) as a','a.school_id = b.school_id','left')
         ->where_in('school_type',$school_type)
         ->where('b.block_name',$block_id)
         ->group_by('b.school_id');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          //   echo "<pre>";
          // print_r($result);
          // echo "</pre>";die;
              return $result;
          }
        
        public function get_attendance_teacher_report_schoolwise($date,$block_id,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->select("sum(distinct a.totstaff) as total_teacher,a.school_id,udise_code,school_name",false)
         ->select('(case when (b.prensent is null and school_code is null) then 0 else (a.totstaff - IFNULL(b.absent, 0)) end) as present',false)
         ->select('sum(IFNULL(b.absent,0)) as absent,IFNULL(b.school_code,-1) school_code',false)
         ->from('students_school_child_count a')
         ->join(' (select school_code,
sum(distinct case when attstatus="" then 1 else 0 end) as prensent,
sum(distinct case when (attstatus!="") then 1 else 0 end) as absent from '.$table.' where date = "'.$date.'" group by teacher_code,school_code) as b','a.udise_code = b.school_code','left')
         ->where('a.block_name',$block_id)
         ->where_in('a.school_type',$school_type)
         ->group_by('a.school_id');
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);
         return $result;

        }

        /**
        * classwise Report
        * 19/02/2019
        * VIT-Sriram
        **/

        public function get_attendance_report_classwise($school_id)
        {
            $this->db->select('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
            ->from('students_school_child_count')
            ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
            ->where('school_id',$school_id)
            ->group_by('class_id');

            $result = $this->db->get()->result();
            return $result;

        }

        public function get_attendance_report_section($class_id,$school_id)
        {

            $result = $this->db->get_where('schoolnew_section_group',array('class_id'=>$class_id,'school_key_id'=>$school_id))->result_array();
            
            return $result;
        }


        /**
        * Get Teacher Attendace classwise
        * VIT-sriram
        * 19/02/2019
        **/

        public function get_attendance_teacher_classwise($date,$school_id,$table)
        {
            $date = date('Y-m-d',strtotime($date));
          $this->db->select('b.teacher_name, IFNULL(a.present,1) as present, a.attres, gender',false)
          ->from('udise_staffreg as b')
          ->join('(SELECT a.teacher_name, IF(a.attstatus="", "1", "0") as present, `a`.`attres`,a.teacher_code,a.school_id FROM '.$table.' as `a` WHERE `a`.`date` = "'.$date.'") as a','a.teacher_code =  b.u_id','left')
          
          ->where('b.school_key_id',$school_id)
          ->where('b.archive ',1);
          
          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;
        }
        
        /**
     * Get Attendance Classwise
     * VIT-sriram
     * 13/02/2019
     **/
     public function get_attendance_classwise_details($school_id,$date,$table)
     {
        $this->db->select('low_class,high_class');
        $result = $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
        // print_r($result->low_class);
        $select_arr = [];
     $select_len = [];
        if(!empty($result)){
       if($result->low_class == 15)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($select_len, $i);

          array_push($select_arr, ('(Prkg_b+Prkg_g+Prkg_t) as Prkg'),('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class == 13)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($select_len, $i);

          array_push($select_arr,('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class !=0 && $result->high_class !=0)
        {
          for($i=$result->low_class;$i<=$result->high_class;$i++)
      {
        // array_push($select_len, $i);

          array_push($select_arr, ('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else
        {
          array_push($select_arr,'*');
        }
        
      }

      // print_r($select_arr);

      $select_query = implode(",", $select_arr);
      $this->db->select($select_query);
      
     $school_details =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();

      

        $classwise = [];
          // print_r($result->low_class);
          // print_r($school_att_details);

if($result->low_class == 15)
        {

              $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,15,$school_details,$date,$table);

            array_push($classwise,$temparr);


         // echo $result->low_class;
        $k = sizeof($classwise);

          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k+1;
        // echo $i;
         
              $classwise[$k] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
        
      }
      
        }else if($result->low_class == 13)
        { 

          $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
        
        $k = sizeof($classwise);
        // echo $result->low_class;
          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k;
        // echo $k;
         
              $classwise[$k] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
              $k = $k+1;
        
      }
          
      }else
      {

        
            // $classwise = [];
            for($i=$result->low_class;$i<=$result->high_class;$i++)
          {   

              // $class = 'c'.$i;
            
                
              $classwise[$i] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);

           
      
          }

       
        
     }
        // echo "<pre>";print_r($classwise);echo"</pre>";
        return $classwise;

   }
     public function get_attendance_class_details($school_id,$class_id,$school_info,$date,$table)
     {
      // echo $class_id;
      $this->db->select('sum(session1_allP) as present,sum(session1_allA) as absent,st_class');
        $this->db->from($table);
        $this->db->where('date',date('Y-m-d',strtotime($date)));
        $this->db->where('school_id',$school_id);
        $this->db->where('st_class',$class_id);
        // $this->db->group_by('st_class');
        $result  = $this->db->get()->first_row();
        // print_r($this->db->last_query());
        // echo $class_id;
        if($class_id==13)
        {
          $class = 'lkg';
        }else if($class_id==14)
        {
          $class = 'ukg';
        }else if($class_id==15)
        {
          $class = 'Prkg';
        }else
        {

        $class = 'c'.$class_id;
        }
        // print_r($result);
        $classwise['total_class'] = $school_info->$class;
        if(!empty($result->st_class)){
        $classwise['class'] = $result->st_class;
        $classwise['present'] = $result->present;
        $classwise['absent'] = $result->absent;
        }else
        {
          // echo $class_id;
        $classwise['class'] = $class_id;
        $classwise['present'] = 0;
        $classwise['absent'] = 0;
        }
        return $classwise;
     }


     public function get_attendance_sectionwise_details($school_id,$class,$table,$date)
     {
      $date = date('Y-m-d',strtotime($date));

               $this->db->select('id,name,unique_id_no,class_section,gender');
              $this->db->from('students_child_detail');
              $this->db->where('school_id',$school_id);
              $this->db->where('transfer_flag',0);
              $this->db->where('class_studying_id',$class);
              $result = $this->db->get()->result();
              // print_r($result);
              if(!empty($result))
              {   $absent_name = [];

                    $absent_list = [];
                 
                      $status = 0;
                      // print_r($result);
                      $old_unique_id = ''; 
                      $old_section = ''; 

                      foreach($result as $index=>$class_det)
                      {   


                      $abse = $this->get_attendance_sectionwise_name($date,$table,$school_id,$class,$class_det->class_section);
                      
                      if(!empty($abse))
                      {
                        if($abse->session1_allA !=0){
                          // echo "if".$index;
                         $absent_name = explode(",",$abse->session1_students);
                         
                         foreach($absent_name as $absindex =>$abs)
                          {

                             if($class_det->id == $abs)
                          {
                                $absent_list[$index]['name'] = $class_det->name;
                                $absent_list[$index]['section'] = $class_det->class_section; 
                                $absent_list[$index]['present'] = "0";
                                $absent_list[$index]['unique_id'] = $class_det->id;
                                $absent_list[$index]['gender'] = $class_det->gender;
                                
                                $status = 0;
                                $old_unique_id = $abs;
                                // echo ($abs=='3302010011300241');
                          } 
                          }

                          }
                          
                          if($old_unique_id !=$class_det->id)
                          { 
                            
                            // echo $index."if<br/>";

                                $absent_temp['name'] = $class_det->name; 
                                $absent_temp['section'] = $class_det->class_section; 

                                $absent_temp['present'] = "1";
                                $absent_temp['unique_id'] = $class_det->id;
                                $absent_temp['gender'] = $class_det->gender;
                                
                                array_push($absent_list,$absent_temp);
                          }

                      }else
                      {
                        // echo "else";
                                $absent_list[$index]['name'] = $class_det->name;
                                $absent_list[$index]['section'] = $class_det->class_section; 
                                $absent_list[$index]['present'] = "-1";
                                $absent_list[$index]['gender'] = $class_det->gender;

                                 
                      }


                      }
                     // echo"<pre>";print_r($absent_list);echo"</pre>";die;

                     
                      
        return $absent_list;



              }

            }

          /**
          * Get Attendance Students Name
          * 20/02/2019
          * VIT-sriram
          **/
          public function get_attendance_sectionwise_name($date,$table,$school_id,$class,$section)
          {

            $this->db->select('session1_students,st_section,session1_allA');
            $this->db->from($table);
            $this->db->where('date',$date);
            $this->db->where('school_id',$school_id); 
              $this->db->where('st_class',$class);
              $this->db->where('st_section',$section);
              $this->db->group_by('st_section');

              return $this->db->get()->first_row();
              
          }



          /**
      * Get Flash News Content
      * VIT-sriram
      * 27/02/2019
      **/

    public function get_flash_news($dist_id)
    {
      $state_id = $this->session->userdata('emis_user_id');
      $state_type_id = $this->session->userdata('emis_user_type_id');

       $this->db->select('schoolnew_flashnews.*,user_category.user_type')
                     ->from('schoolnew_flashnews')
                     ->join('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                     ->where('district_name',$dist_id)
                     ->where('created_by',$state_id)
                     ->where('created_type_id',$state_type_id)
                     ->or_where('authority',$state_type_id)
                     ->group_by('updated_date')
                     


                     ->order_by('schoolnew_flashnews.id DESC')
                     ->limit(10);

              $flash_result = $this->db->get()->result();
              // print_r($this->db->last_query());
              // print_r($flash_result);die;
              return $flash_result;
    }


    public function get_flash_news_authority()
    {
       $type = array(6,1,10);
          $this->db->where_in('id',$type);
        $result = $this->db->get('user_category')->result();

        return $result;
    }


    public function get_all_district()
    {

        $result = $this->db->get('schoolnew_district')->result();

        return $result;

    }

    public function get_all_block_name($dist_id)
    {   
        $this->db->join('schoolnew_district a','a.id = b.district_id');
        $this->db->where_in('a.district_name',$dist_id);
        $result = $this->db->get('schoolnew_block b')->result();
        return $result;
    }

    public function save_flash_news_data($save_datas)
    {
      
      $this->db->insert_batch('schoolnew_flashnews',$save_datas);
    return $this->db->insert_id();

      
    }

    public function get_districtwise_report($user_type)
    {
         $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_where('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
    }
    /**
    * RTE Schools List
    * VIT-sriram
    * 25/03/2019
    **/
    public function get_RTE_districtwise_school_list($dist_id,$school_cat,$block_id ='')
    {
      $direct_id = array(27,29,28);
        $this->db->select('c.id,a.block_name,a.school_type,a.udise_code,a.school_name,a.school_id,IFNULL(c.acad_year,0) as asad_year,c.entry_class,c.rte_seats,c.section_nos,c.total_seats')
                 ->join('schoolnew_academic_detail b','b.school_key_id = a.school_id')
                 ->join('schoolnew_rte c','c.school_key_id = a.school_id','left')
                 ->where('a.district_name',$dist_id)
                 ->where('b.rte',1);
                 
            if(!empty($block_id))
            {
              $this->db->where('block_name',$block_id);
            }

        $result = $this->db->get('students_school_child_count a')->result();

        return $result;


    }


    /**
    * RTE Update Academic Year
    * VIT-Sriram
    * 25/03/2019
    **/

    public function save_RTE_school_list($save_data)
    {

        if($save_data['id'] !=''){
            $this->db->where('id',$save_data['id']);
            $this->db->update('schoolnew_rte',$save_data);
            return $save_data['id'];
        }else{
        $this->db->insert('schoolnew_rte',$save_data);
        return $this->db->insert_id();
        }

        
    }
    public function save_RTE_student_list($save_data)
    {

        if($save_data['id'] !=''){
          $up=$this->db->update('students_child_detail', $save_data, "id = ".$save_data['id']);
          return $up;
        }else{
        $this->db->insert('students_child_detail',$save_data);
        return $this->db->insert_id();
        } 

        
    }
    /**
    * Get_school_short_name
    * VIT-sriram
    * 03/04/2019
    * Parms1-district_name,parms2-school_type,parms3-manage_cate
    ***/

    /**
    * Get Manage Cate
    * VIT-sriram
    * 03/04/2019
    **/
    public function get_manage_cate()
    {
      $manage_cate = array('Government','Fully Aided','Partially Aided');
      $this->db->where_in('manage_name',$manage_cate);
      $result = $this->db->get('schoolnew_manage_cate')->result();
      return $result;
    }

    public function get_districtwise_sch_short_name($dist_id,$school_type,$manage_cate)
    {
        $this->db->select('a.school_name,a.udise_code,b.sch_shortname,a.block_name,a.cate_type,b.school_id')
                 ->from('students_school_child_count a')
                 ->join('schoolnew_basicinfo b','b.school_id = a.school_id')
                 ->where('a.district_name',$dist_id);
                 if(!empty($school_type))
                {
                  $this->db->where_in('school_type',$school_type);
                }else
                {
                  $this->db->where('school_type','Government');
                }
                if(!empty($manage_cate))  
                {
                   $this->db->where_in('cate_type',$manage_cate);
                }

      $result =$this->db->get()->result();
      // print_r($this->db->last_query());die;
      return $result;
    }

    /*********
    * Update Sch Short Name
    * VIT-sriram
    * 03/04/2019
    **********/
    public function update_sch_short_name($update)
    {
      $this->db->where('school_id',$update['school_id']);
      $this->db->update('schoolnew_basicinfo',$update);

      return $this->db->affected_rows();
    }


    /***********************
      * Select tables      *
      * Where condition    *
      * group by           *
      * VIT-sriram         *
      * 06/05/2019         *
      **********************/

    public function get_common_select_tables($select='',$table,$where='',$group_by='')
    {
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($where)){
        $this->db->where($where);
        }
        if(!empty($group_by))
        {
          $this->db->group_by($group_by);
        }
        // $this->db->order_by($order_by);

        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;
    }


    /************************** End *******************************/

    /************************************
      * Staff FIxiation Part-2          *
      * VIT-sriram                      *
      * 20/05/2019                      *
      ***********************************/
    public function get_districtwise_higher_students_avaliable_count($dist_id)
    {
        $this->db->select('(c11_b+c11_g+c11_t) as class11,(c11_b+c12_g+c12_t) as class12,school_name,udise_code,block_name,school_id')
                  ->from('students_school_child_count')
                  ->where('district_id',$dist_id)
                  ->where('school_type_id',1)
                  ->where('cate_type','Higher Secondary School');
        $result = $this->db->get()->result();

        return $result;
    }



    /******************************************
     * Staff Fixiation schoolwise Count       *
     * VIT-sriram                             *
     * 20/05/2019                             *
     ******************************************/
    public function get_schoolwise_students_count($sch_id)
    {
          $this->db->select('`med`.`MEDINSTR_DESC` as `Medium`, sum(stu.class_studying_id=11) as Class11, sum(stu.class_studying_id=12) as Class12, `stu`.`education_medium_id`')
                    ->from('students_school_child_count sc')
                    ->join('students_child_detail stu','stu.school_id = sc.school_id')
                    ->join('schoolnew_mediumofinstruction med','med.MEDINSTR_ID = stu.education_medium_id')
                    ->where('transfer_flag',0)
                    ->where('stu.school_id',$sch_id)
                    ->group_by('sc.school_id,sc.cate_type,med.MEDINSTR_DESC');
            $result = $this->db->get()->result();
            return $result;
    }


    public function get_sub_count()
    {
      
          $this->db->select('sub_code,subject,visible');
          $this->db->from('teacher_panel_subject');
                    
          $result = $this->db->get()->result();

          return $result;

    }


  /** *****************************************
    * BRTE Schools                            *
    * VIT-sriram                              *
    * 05/07/2019                              *
    * *****************************************/
    public function emis_brte_staff_list($dist_id)
    {

        $this->db->select('a.u_id,a.teacher_name,a.teacher_code,b.subjects,a.appointed_subject,c.type_teacher')
                 ->from('udise_staffreg a')
                 ->join('teacher_subjects b','b.id = a.appointed_subject','left')
                 ->join('teacher_type c','c.id = a.teacher_type','left')
                 ->join('udise_offreg','udise_offreg.id = a.off_id')
                 ->where('udise_offreg.district_id',$dist_id)
                 ->where('a.teacher_type',103)
                 ->where('a.archive',1);
        $result = $this->db->get()->result();
              // print_r($this->db->last_query());

        return $result;
    }

    public function emis_brte_school_details($dist_id)
    {
        $this->db->select(',group_concat(distinct brte_school_map.school_name,"-",brte_school_map.udise_code,"<br/>") as school_name,brte_school_map.hss_school_id,group_concat(distinct brte_school_map.block_name SEPARATOR "<br/>") as block_name,subject,brte_school_map.hss_school_name,brte_school_map.brte_id,udise_staffreg.teacher_name,udise_staffreg.mbl_nmbr,group_concat(distinct brte_school_map.block_id) as block_id,hss_udise_code,hss_cate_type,group_concat(distinct brte_school_groups.brte_name SEPARATOR "<br/>") as brte_name,udise_staffreg.teacher_type')
                 ->from('brte_school_map')
                 ->join('brte_school_groups','brte_school_groups.school_id = brte_school_map.hss_school_id and is_active=1','left')
                 ->join('udise_staffreg','udise_staffreg.school_key_id = brte_school_map.hss_school_id','left')
                 ->where('brte_school_map.district_id',$dist_id)
                 

                 ->where('isactive',1)
                 ->group_by('hss_school_id');
        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;
    }


    public function emis_brte_brc_details($dist_id)
    {
        $this->db->select('group_concat(distinct b.brte_name SEPARATOR "<br/>") as name,a.office_area,a.office_name,b.brc_block_id,group_concat(distinct b.brte_id) as brte_id')
                 ->from('udise_offreg a')
                 ->join('brte_school_groups b','b.brc_block_id = a.block_id and b.is_active = 1','left')
                 ->where('b.district_id',$dist_id)
                 ->group_by('b.brc_block_id');

        $result = $this->db->get()->result();
        return $result;
    }
    


    // Goverment HSS List

    public function emis_hss_school_list($dist_id,$cate_type,$where,$block_id)
    {   
      //,'Fully Aided'
        $sch_type = array('Government');
        $this->db->select('students_school_child_count.id,students_school_child_count.school_id,students_school_child_count.district_id,students_school_child_count.block_id,students_school_child_count.edu_dist_id,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.edu_dist_name,students_school_child_count.udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_type_id,students_school_child_count.sch_directorate_id,students_school_child_count.management,students_school_child_count.category,students_school_child_count.cate_type,schoolnew_basicinfo.brte')
                 ->from('students_school_child_count') 
                 ->join('brte_school_map','brte_school_map.school_id = students_school_child_count.school_id','left')  
                 ->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id = students_school_child_count.school_id');
                 if($where !='')
                 {   
                    $this->db->where($where);
                 }
                 
                 $this->db->where_in('students_school_child_count.block_id',$block_id)
                 ->where_in('students_school_child_count.school_type',$sch_type);
        $this->db->where_in('students_school_child_count.cate_type',$cate_type);
        $result = $this->db->get()->result();
                 // print_r($this->db->last_query());

        return $result;
    }


    // selected Master School Details
    public function get_brte_school_details($table,$where,$block_id)
    {   $this->db->from($table)
                 ->where($where)
                 ->where_in('block_id',$block_id);
        $result = $this->db->get()->result();

        return $result;
    }


    // school List

    public function get_school_list($school_id)
    {
        $this->db->select('id,school_id,district_id,block_id,edu_dist_id,district_name,block_name,edu_dist_name,udise_code,school_name,school_type,school_type_id,sch_directorate_id,management,category,cate_type')
                 ->from('students_school_child_count')
                 ->where('school_id',$school_id);
        $result = $this->db->get()->first_row();

        return $result;

    }


    public function check_brte_school_group($table,$school_id)
    {
        $this->db->select('count(school_id) as count')
                 ->from($table)
                 ->where('school_id',$school_id)
                 ->where('is_active',1);
        $result = $this->db->get()->first_row();
        // print_r($this->db->last_query());die;
        return $result;
    }


    public function save_brte_list($table,$save_data)
    {
        $this->db->select('id')
                 ->from($table)
                 ->where('school_id',$save_data['school_id']);
        $result = $this->db->get()->first_row();

        if($result !=''){
            $save_data['id'] = $result->id;
            $this->db->where('id',$save_data['id']);
            $this->db->update($table,$save_data);
            // print_r($this->db->last_query());
            return $save_data['school_id'];
            // print_r($result);
        }else
        {
             $this->db->insert($table,$save_data);
            // echo "else";
            return $this->db->insert_id();
        }
    }





    // update

    public function update_brte_school($table,$data)
    {
        $this->db->where('school_id',$data['school_id']);
        $this->db->update($table,$data);
        return $data['school_id'];
    }



    // BRTE School Group

    public function get_brte_school_group($where)
    {
        $this->db->select('hss_school_name,hss_school_id,hss_udise_code')
                 ->from('brte_school_map')
                 ->join('brte_school_groups','brte_school_groups.school_id = brte_school_map.hss_school_id and is_active=1','left')
                 ->where($where)
                 ->group_by('hss_school_id');
        $result = $this->db->get()->result();

        return $result;

    }

    public function get_brte_selected_schools($where)
    {
        $this->db->select('group_concat(distinct brte_id) as brte_id,school_id')
                 ->from('brte_school_groups')
                 ->where($where)
                 ->group_by('school_id');
        $result = $this->db->get()->first_row();
        return $result;
    } 

    public function save_brte_staff_list($table,$save_data)
    {
        $this->db->select('id')
                 ->from($table)
                 ->group_start()
                 ->where('school_id',$save_data['school_id'])
                 ->or_where('brc_block_id',$save_data['brc_block_id'])
                 ->group_end()
                 ->where('brte_id',$save_data['brte_id']);
        $result = $this->db->get()->first_row();
        // print_r($result);die;
        if($result !=''){
            $save_data['id'] = $result->id;
            $this->db->where('id',$save_data['id']);
            $this->db->update($table,$save_data);
            // print_r($this->db->last_query());
            return $save_data['school_id'];
            // print_r($result);
        }else
        {
             $this->db->insert($table,$save_data);
            // echo "else";
            return $this->db->insert_id();
        }
    }


    /************************************** End *******************************/

    

         /**
         * District Old Function 
         * 21/01/2019
         * VIT-sriram
         **/

   function getdistrictprofiledetails($id){
        $this->db->select('*');  
       $this->db->from('districtnew_basicinfo');
       $this->db->where('district_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }

      function getsingledistname($distid){
            $this->db->select('*'); 
       $this->db->from('schoolnew_district');
       $this->db->where('id',$distid); 
       $query =  $this->db->get();
       return $query->row('district_name');
     }


        function getallblockscountbydistrict($distid){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(total_b+total_g+total_t) as total') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   }

      function getalldistrictcountsbyclassblock($distid){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   } 

    function getalldistrictcountsbyclassblock1($distid,$manage){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('schoolnew_basicinfo.sch_management_id',$manage)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   } 

    function getallgenderbydistrict($distid){
       $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(students_school_child_count.total_b) as boys, sum(students_school_child_count.total_g) as girls, sum(students_school_child_count.total_t) as transgender')
          ->from('students_school_child_count')
          ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
          ->group_by('schoolnew_block.block_name');
      $query =  $this->db->get();
      return $query->result();
  }

   function getallgenderbydistrict1($distid,$manage){
       $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(students_school_child_count.total_b) as boys, sum(students_school_child_count.total_g) as girls, sum(students_school_child_count.total_t) as transgender')
          ->from('students_school_child_count')
          ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('schoolnew_basicinfo.sch_management_id',$manage)
          ->group_by('schoolnew_block.block_name');
      $query =  $this->db->get();
      return $query->result();
  }

     function getcommunityname($comm){
                 $this->db->select('*'); 
       $this->db->from('baseapp_community');
       $this->db->where('community_code',$comm); 
       $query =  $this->db->get();
       return $query->row('community_name');
   }


       function getallblockscommuniywise($distid,$comm){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_community_school_count')
           ->join('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
             ->where('students_community_school_count.community_code',$comm)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
       return $query->result();
       }else{
        return false;
       }
   } 

     function getalldistrictcountsbyclassschool($blckid){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.sch_management_id,schoolnew_basicinfo.sch_cate_id,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }  

        function getalldistrictcountsbyclassschool1($blckid,$manage){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.sch_management_id,schoolnew_basicinfo.sch_cate_id,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
             ->where('schoolnew_basicinfo.sch_management_id',$manage)
             ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   } 

     function getsingleblockname($bid){
            $this->db->select('*'); 
       $this->db->from('schoolnew_block');
       $this->db->where('id',$bid); 
       $query =  $this->db->get();
       return $query->row('block_name');
   }

  function getallblockcountsbyschool($blckid){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.sch_management_id,schoolnew_basicinfo.sch_cate_id,schoolnew_basicinfo.school_id,sum(total_b+total_g+total_t) as total') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.sch_management_id')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }

        function getschoolprofiledetails($id){
        $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }


    function getallbrachesbyschool($schoolid){
       $this->db->select('sum(c1_b+c1_g+c1_t) as class1,sum(c2_b+c2_g+c2_t) as class2,sum(c3_b+c3_g+c3_t) as class3,sum(c4_b+c4_g+c4_t) as class4,sum(c5_b+c5_g+c5_t) as class5,sum(c6_b+c6_g+c6_t) as class6,sum(c7_b+c7_g+c7_t) as class7,sum(c8_b+c8_g+c8_t) as class8,sum(c9_b+c9_g+c9_t) as class9,sum(c10_b+c10_g+c10_t) as class10,sum(c11_b+c11_g+c11_t) as class11,sum(c12_b+c12_g+c12_t) as class12') 
         ->from('students_school_child_count')
         ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
         ->where('schoolnew_basicinfo.curr_stat',1)
         ->where('schoolnew_basicinfo.school_id', $schoolid);    
       $query =  $this->db->get();
       return $query->result(); 
    }

      function getallstudentsbyschid($schoolid,$classid){
       $this->db->select('*') 
         ->from('students_child_detail')
         ->where('school_id', $schoolid)  
         ->where('transfer_flag',0)
         ->where('class_studying_id', $classid);    
       $query =  $this->db->get();
       return $query->result(); 
    }

     function getsingleschoolname($bid){
            $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('curr_stat',1);
       $this->db->where('school_id',$bid); 
       $query =  $this->db->get();
       return $query->row('school_name');
     }

     function getsingleclassname($bid){
            $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$bid); 
       $query =  $this->db->get();
       return $query->row('class_studying');
     }

      function emisschooludis($schooldis,$district_id){
      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('udise_code',$schooldis);
      $this->db->where('curr_stat',1);
       $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();
 }

   function getallblockkkcountsbyclassschool($blckid,$comm){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_community_school_count')
           ->join('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('students_community_school_count.community_code',$comm)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }

   function get_school_by_udise($schooludise,$district_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('udise_code',$schooludise);
      $this->db->where('curr_stat',1);
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();


   }

   //  function get_school_by_id($school_id,$district_id){

   //    $this->db->select('*');
   //    $this->db->from('schoolnew_basicinfo');
   //    $this->db->where('school_id',$school_id);
   //    $this->db->where('curr_stat',1);
   //    $this->db->where('district_id',$district_id);
   //    $query =  $this->db->get();
   //    return $query->result();


   // }

       function get_school_by_block($school_id,$block_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$school_id);
      $this->db->where('curr_stat',1);
      $this->db->where('block_id',$block_id);
      $query =  $this->db->get();
      return $query->result();


   }

     function getallschoolsbyblock($blockid){
       $this->db->select('school_id,udise_code,school_name'); 
       $this->db->from('schoolnew_basicinfo');
      $this->db->where('curr_stat',1);
       $this->db->where('block_id',$blockid); 
       $query =  $this->db->get();
       return $query->result();
  }

      function getoldpassdistrict($dist_id,$username){
             $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('emis_user_id',$dist_id); 
       $this->db->where('emis_username',$username);
       $query =  $this->db->get();
       return $query->row('emis_password');
    }

     function emis_district_resetpassword($dist_id,$username,$data){
       $this->db->where('emis_user_id', $dist_id);
       $this->db->where('emis_username', $username);
      return $this->db->update('emis_userlogin', $data);         
    }

     function getalldistrictcountsbyclassblockreport($distid){
     	// echo "function in";die;
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_idcard_child_count')
           ->join('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   } 

    function getalldistrictcountsbyclassblockreport1($distid,$manage){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_idcard_child_count')
           ->join('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$distid)
            ->where('schoolnew_basicinfo.curr_stat',1)
             ->where('schoolnew_basicinfo.sch_management_id',$manage)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   } 

   function getalldistrictcountsbyclassschoolreport($blckid){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_idcard_child_count')
           ->join('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }  
    function getalldistrictcountsbyclassschoolreport1($blckid,$manage){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_idcard_child_count')
           ->join('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
              ->where('schoolnew_basicinfo.sch_management_id',$manage)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }  

    function getclasschildcout($schoolid,$class_id){
        $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id',$class_id);
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0'); 
       $query =  $this->db->get();
       return $query->result();
    }

       function getstandaradnamesepe($classid){
             $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$classid); 
       $query =  $this->db->get();
       return $query->row('class_studying');
    }

      function getallstudentsbyschidreport($schoolid,$classid){
       $this->db->select('*') 
         ->from('students_child_detail')
         ->where('school_id', $schoolid)  
         ->where('class_studying_id', $classid) 
          ->where('transfer_flag',0)
         ->where('idcardstatus','Aprooved')
          ->where('idapproove','0');   
       $query =  $this->db->get();
       return $query->result(); 
    }



  function requesteddatacountschoolwise($distid,$date){
        $this->db->select('count(students_child_detail.id) as count,schoolnew_basicinfo.school_name,schoolnew_basicinfo.id,schoolnew_basicinfo.udise_code') 
           ->from('schoolnew_basicinfo')
           ->join('students_child_detail','students_child_detail.school_id=schoolnew_basicinfo.school_id')
            ->where('schoolnew_basicinfo.district_id',$distid)
            ->where('students_child_detail.request_flag','1')
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('students_child_detail.request_date <',$date)
            ->where('students_child_detail.transfer_flag',0)
            ->group_by('schoolnew_basicinfo.udise_code');

       $query =  $this->db->get();
       return $query->result();
   } 

  function requesteddatacountstudentlist($distid,$date,$udise){

        $this->db->select('students_child_detail.name,students_child_detail.unique_id_no,students_child_detail.dob,students_child_detail.class_studying_id,students_child_detail.class_section,students_child_detail.request_date,students_child_detail.request_id') 
           ->from('students_child_detail')
           ->join('schoolnew_basicinfo','students_child_detail.school_id=schoolnew_basicinfo.school_id')
            ->where('schoolnew_basicinfo.udise_code',$udise)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('schoolnew_basicinfo.district_id',$distid)
            ->where('students_child_detail.request_flag','1')
            ->where('students_child_detail.transfer_flag',0)
            ->where('students_child_detail.request_date <',$date);
       $query =  $this->db->get();
       return $query->result();
   } 





// get all district Details
   function get_dist_details(){
    $district_id=$this->session->userdata('emis_district_id');
    $this->db->select('district_id,district_name');
    $this->db->from('districtnew_basicinfo');
    $this->db->where('district_id',$district_id);
    $query = $this->db->get();
    return $query->result();
   }
 


 // get the block details based on district
   function get_block($dist_id){
    $this->db->select('id,block_name');
    $this->db->from('schoolnew_block');
    $this->db->where('district_id',$dist_id);
    $query = $this->db->get();
    return $query->result();
   }
   

// get the school details
   function get_school_rc($blck_id){

    $this->db->select('udise_code,school_name');
    $this->db->from('schoolnew_basicinfo');
    $this->db->where('block_id',$blck_id);
    $this->db->where('curr_stat',1);
    $this->db->where('manage_cate_id',1);
    $query = $this->db->get();
    return $query->result();

   }


function get_type_tchr($schl_id){


    $this->db->distinct('teacher_type,udise_code');
    $this->db->select('teacher_type');
    $this->db->from('udise_staffreg');
    $this->db->where('udise_code',$schl_id);
    $query = $this->db->get();
    return $query->result();

}


function get_tchr($school_id,$tech_cde){

    $this->db->select('u_id,teacher_name');
    $this->db->from('udise_staffreg');
    $this->db->where('udise_code',$school_id);
    $this->db->where('teacher_type',$tech_cde);
    $query = $this->db->get();
    return $query->result();

}




function get_dist($dst_id){
    $this->db->select('district_name');
    $this->db->from('districtnew_basicinfo');
    $this->db->where('district_id',$dst_id);
    $query = $this->db->get();
    return $query->result();  
}



function get_technme($tech_id){

  $this->db->select('teacher_name');
    $this->db->from('udise_staffreg');
    $this->db->where('u_id',$tech_id);
    $query = $this->db->get();
    return $query->result();
}


function get_school_keyval($getschl_key){

    //$this->db->distinct('school_id');
    $this->db->select('school_id');
    $this->db->from('schoolnew_basicinfo');
    $this->db->where('curr_stat',1);
    $this->db->where('udise_code',$getschl_key);
    $query = $this->db->get();
    //echo $this->db->last_query();
    return $query->result_array(); 

}


function update_staff_details($data,$up_id){
       $this->db->where('u_id', $up_id);
      return $this->db->update('udise_staffreg', $data);
}


function get_cat_cond($post_id)
    {
     $this->db->select('post');
     $this->db->where('post_id',$post_id);
     $this->db->from('master_staff_type');
     $query = $this->db->get();
     // print_r($this->db->last_query());
     return $query->result(); 
    }


    function ins_staf_history($data){
      $this->db->insert('teacher_trans_history',$data);
    }

     function get_techerdetails($tech_id){
     $this->db->select('*');
     $this->db->where('u_id',$tech_id);
     $this->db->from('udise_staffreg');
     $query = $this->db->get();
     return $query->result(); 
    }

function get_techerschoolname($schoolid){
            $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('curr_stat',1);
       $this->db->where('school_id',$schoolid); 
       $query =  $this->db->get();
       return $query->row('school_name');
     }


     function get_subject_id($subid){
            $this->db->select('*'); 
       $this->db->from('schoolnew_subjects');
       $this->db->where('subject_code',$subid); 
       $query =  $this->db->get();
       return $query->row('subject');
     }


      function get_teachertype($typeid){
            $this->db->select('*'); 
       $this->db->from('master_staff_type');
       $this->db->where('post_id',$typeid); 
       $query =  $this->db->get();
       return $query->row('post');
     }


function get_teacherid($udsicode){
            $this->db->select('*'); 
       $this->db->from('teacher_trans_history');
       $this->db->where('to_schl',$udsicode);
       $this->db->order_by("to_schl", "desc"); 
       $this->db->limit(1);
       $query =  $this->db->get();
       return $query->row('from_schl_keyid');
     }

 function get_transferschool($toid){
            $this->db->select('*'); 
       $this->db->from('teacher_trans_history');
       $this->db->where('to_schl',$toid); 
       $query =  $this->db->get();
       return $query->row('to_schl_keyid');
     }

    function getalldistrictcountsbyteacherblock($dist_id,$cate_type){

    $this->db->select('students_school_child_count.district_name,students_school_child_count.block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,district_name')
    ->from('teacher_profile_count')  
         ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
        ->where('students_school_child_count.school_type','Government')
          ->where('students_school_child_count.district_id=',$dist_id)
            ->group_by('students_school_child_count.block_name')
          ->group_by('students_school_child_count.district_name');
   if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
  function getalldistrictcountsbyclassteach($block_id,$cate_type){
        $this->db->select('students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.school_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,block_name') 
        ->from('teacher_profile_count')
         ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
        ->where('students_school_child_count.school_type','Government')
    ->where('students_school_child_count.block_id=',$block_id)
        ->group_by('students_school_child_count.school_id')
        ->group_by('students_school_child_count.udise_code')  
         
        ->group_by('students_school_child_count.school_name');
      if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }  
function get_teaching_staff_block($dist_id,$cate_type){
 $this->db->select("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_id as dist_id,district_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('block_id');
     
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
           $this->db->where('district_id',$dist_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
 function get_nonteaching_staff_block($dist_id,$cate_type){

 $this->db->select("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_name,district_id");
       $this->db->from('teacher_profile_count');
       $this->db->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right');
      $this->db->group_by('block_id'); 

       if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
           $this->db->where('district_id',$dist_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
   function get_teaching_block_school($block_id,$cate_type){
         $this->db->select("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,school_name,school_id,school_type,udise_code,block_id,district_id as dist_id,district_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('school_id');
     
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
           $this->db->where('block_id',$block_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }  
   function get_nonteaching_block_school($dist_id,$block_id,$cate_type){
      
      $this->db->select("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,school_name,block_id,school_id,udise_code,block_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
             $this->db->where('students_school_child_count.district_id',$dist_id);
         $this->db->where('students_school_child_count.block_id',$block_id);
     
         $this->db->group_by('school_id');
     
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;

  }  
     public function get_state_renewal_details($dist_id)
           {
            $SQL="SELECT 
  (SELECT 
    COUNT(*)
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=0) AND schoolnew_renewal.vaild_upto IS NULL
  ) AS BEO,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL
    
  ) AS DE0,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%School%Education%' OR  department 
 like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=2) AND schoolnew_renewal.vaild_upto IS NULL) AS CE0,
    (SELECT count(*) FROM schoolnew_renewal 
   JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    where schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from !='0000-00-00') AS APPROVED,
  (SELECT count(*) FROM schoolnew_renewal
 JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
 WHERE schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from ='0000-00-00') AS REJECTED,
    (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND schoolnew_renewal.vaild_upto IS NULL
  ) AS TOTAL,  school_name,udise_code,district_name,block_name,createddate, schoolnew_basicinfo.district_id,schoolnew_basicinfo.block_id
    FROM
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
   
    WHERE schoolnew_basicinfo.district_id=".$dist_id."";
//echo $SQL;
     $query = $this->db->query($SQL);
     return $query->result_array();
           }
public function get_state_renewal_pending_details($dist_id)

    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
         JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
        JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove) AND schoolnew_renewal.vaild_upto IS NULL ";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
      public function get_state_deo_pending_details($dist_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
    JOIN  schoolnew_edn_dist_block ON schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth=3 OR auth=-3 OR auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL ";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
     public function get_state_ceo_pending_details($dist_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
   JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%School%Education%' OR  department  like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id  IN (SELECT renewal_id FROM schoolnew_renewapprove where auth!=1 OR auth=2) AND schoolnew_renewal.vaild_upto IS NULL";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
     public function get_classwise_student_disability_block($dist_id)
      {

        $SQL="select 
    SUM(CASE WHEN differently_abled=1 THEN 1 ELSE 0 END) AS VIB,
    SUM(CASE WHEN differently_abled=2 THEN 1 ELSE 0 END) AS VILV,
    SUM(CASE WHEN differently_abled=3 THEN 1 ELSE 0 END) AS HI,
    SUM(CASE WHEN differently_abled=4 THEN 1 ELSE 0 END) AS SI,
    SUM(CASE WHEN differently_abled=5 THEN 1 ELSE 0 END) AS LI,
    SUM(CASE WHEN differently_abled=6 THEN 1 ELSE 0 END) AS MR,
    SUM(CASE WHEN differently_abled=7 THEN 1 ELSE 0 END) AS LD,
    SUM(CASE WHEN differently_abled=8 THEN 1 ELSE 0 END) AS CP,
    SUM(CASE WHEN differently_abled=9 THEN 1 ELSE 0 END) AS Aut,
    SUM(CASE WHEN differently_abled=10 THEN 1 ELSE 0 END) AS MD,
    SUM(CASE WHEN differently_abled=11 THEN 1 ELSE 0 END) AS Mus_dyp,
    SUM(CASE WHEN differently_abled=12 THEN 1 ELSE 0 END) AS DS,
    SUM(CASE WHEN differently_abled=13 THEN 1 ELSE 0 END) AS LC,
    SUM(CASE WHEN differently_abled=14 THEN 1 ELSE 0 END) AS Dwar,
    SUM(CASE WHEN differently_abled=15 THEN 1 ELSE 0 END) AS ID,
    SUM(CASE WHEN differently_abled=16 THEN 1 ELSE 0 END) AS CNC,
    SUM(CASE WHEN differently_abled=17 THEN 1 ELSE 0 END) AS MS,
    SUM(CASE WHEN differently_abled=18 THEN 1 ELSE 0 END) AS Tha,
    SUM(CASE WHEN differently_abled=19 THEN 1 ELSE 0 END) AS Hemo,
    SUM(CASE WHEN differently_abled=20 THEN 1 ELSE 0 END) AS SCD,
    SUM(CASE WHEN differently_abled=21 THEN 1 ELSE 0 END) AS AAV,
    SUM(CASE WHEN differently_abled=22 THEN 1 ELSE 0 END) AS PD,
    students_school_child_count.block_name
from students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
where students_child_detail.transfer_flag=0 AND students_school_child_count.district_id=".$dist_id." group by block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function get_classwise_student_disability_school($block_name)
      {
       
        $SQL="select 
    SUM(CASE WHEN differently_abled=1 THEN 1 ELSE 0 END) AS VIB,
    SUM(CASE WHEN differently_abled=2 THEN 1 ELSE 0 END) AS VILV,
    SUM(CASE WHEN differently_abled=3 THEN 1 ELSE 0 END) AS HI,
    SUM(CASE WHEN differently_abled=4 THEN 1 ELSE 0 END) AS SI,
    SUM(CASE WHEN differently_abled=5 THEN 1 ELSE 0 END) AS LI,
    SUM(CASE WHEN differently_abled=6 THEN 1 ELSE 0 END) AS MR,
    SUM(CASE WHEN differently_abled=7 THEN 1 ELSE 0 END) AS LD,
    SUM(CASE WHEN differently_abled=8 THEN 1 ELSE 0 END) AS CP,
    SUM(CASE WHEN differently_abled=9 THEN 1 ELSE 0 END) AS Aut,
    SUM(CASE WHEN differently_abled=10 THEN 1 ELSE 0 END) AS MD,
    SUM(CASE WHEN differently_abled=11 THEN 1 ELSE 0 END) AS Mus_dyp,
    SUM(CASE WHEN differently_abled=12 THEN 1 ELSE 0 END) AS DS,
    SUM(CASE WHEN differently_abled=13 THEN 1 ELSE 0 END) AS LC,
    SUM(CASE WHEN differently_abled=14 THEN 1 ELSE 0 END) AS Dwar,
    SUM(CASE WHEN differently_abled=15 THEN 1 ELSE 0 END) AS ID,
    SUM(CASE WHEN differently_abled=16 THEN 1 ELSE 0 END) AS CNC,
    SUM(CASE WHEN differently_abled=17 THEN 1 ELSE 0 END) AS MS,
    SUM(CASE WHEN differently_abled=18 THEN 1 ELSE 0 END) AS Tha,
    SUM(CASE WHEN differently_abled=19 THEN 1 ELSE 0 END) AS Hemo,
    SUM(CASE WHEN differently_abled=20 THEN 1 ELSE 0 END) AS SCD,
    SUM(CASE WHEN differently_abled=21 THEN 1 ELSE 0 END) AS AAV,
    SUM(CASE WHEN differently_abled=22 THEN 1 ELSE 0 END) AS PD,
    students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.school_type
from students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
where students_child_detail.transfer_flag=0 AND students_school_child_count.block_name='".$block_name."' group by school_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
      public function get_blockwise_RTE_student($dist_id)
      {

        $SQL=" select sc.block_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id=".$dist_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_schoolwise_RTE_student($dist_id)
      {

        $SQL=" select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,sc.udise_code,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_studentwise_RTE_student($school_id)
      {

        $SQL=" select  st.id,st.school_id,st.child_admitted_under_reservation,st.name,st.unique_id_no,st.class_studying_id,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12,
(CASE st.rte_type WHEN 1 THEN 'Weaker Section(WS)' ELSE  
 CASE st.rte_type WHEN 2 THEN 'Disadvantaged Group(BC)' ELSE
 CASE st.rte_type WHEN 3 THEN 'Disadvantaged Group(MBC)' ELSE
 CASE st.rte_type WHEN 4 THEN 'Disadvantaged Group(SC)' ELSE 
 CASE st.rte_type WHEN 5 THEN 'Disadvantaged Group(ST)' ELSE  
 CASE st.rte_type WHEN 6 THEN 'Disadvantaged Group(SCA)' ELSE
 CASE st.rte_type WHEN 7 THEN 'Disadvantaged Group(DNC)' ELSE
 CASE st.rte_type WHEN 8 THEN 'Disadvantaged Group - Special(Orphan)' ELSE 
 CASE st.rte_type WHEN 9 THEN 'Disadvantaged Group - Special(Differently Abeld)' ELSE  
 CASE st.rte_type WHEN 10 THEN 'Disadvantaged Group - Special(Child of Scavenger)' ELSE
 CASE st.rte_type WHEN 11 THEN 'Disadvantaged Group - Special(Transgender)' ELSE
 CASE st.rte_type WHEN 12 THEN 'Disadvantaged Group - Special(HIV Affected)' ELSE 
           '' END
              END  
              END
              END
              END  
              END
              END
              END
              END  
              END
              END
              END) AS rte_type

 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.school_id='".$school_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by st.name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);

       return $query->result();
       

      }

       public function get_blockwise_RTE_student_2019($dist_id)
      {

        $SQL=" select sc.block_name,sc.school_id,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id=".$dist_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_schoolwise_RTE_student_2019($dist_id)
      {

        $SQL="select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }

      public function get_studentwise_RTE_student_2019($school_id)
      {

        $SQL=" select  st.id,st.school_id,st.child_admitted_under_reservation,st.name,st.unique_id_no,st.class_studying_id,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12,
(CASE st.rte_type WHEN 1 THEN 'Weaker Section(WS)' ELSE  
 CASE st.rte_type WHEN 2 THEN 'Disadvantaged Group(BC)' ELSE
 CASE st.rte_type WHEN 3 THEN 'Disadvantaged Group(MBC)' ELSE
 CASE st.rte_type WHEN 4 THEN 'Disadvantaged Group(SC)' ELSE 
 CASE st.rte_type WHEN 5 THEN 'Disadvantaged Group(ST)' ELSE  
 CASE st.rte_type WHEN 6 THEN 'Disadvantaged Group(SCA)' ELSE
 CASE st.rte_type WHEN 7 THEN 'Disadvantaged Group(DNC)' ELSE
 CASE st.rte_type WHEN 8 THEN 'Disadvantaged Group - Special(Orphan)' ELSE 
 CASE st.rte_type WHEN 9 THEN 'Disadvantaged Group - Special(Differently Abeld)' ELSE  
 CASE st.rte_type WHEN 10 THEN 'Disadvantaged Group - Special(Child of Scavenger)' ELSE
 CASE st.rte_type WHEN 11 THEN 'Disadvantaged Group - Special(Transgender)' ELSE
 CASE st.rte_type WHEN 12 THEN 'Disadvantaged Group - Special(HIV Affected)' ELSE 
           '' END
              END  
              END
              END
              END  
              END
              END
              END
              END  
              END
              END
              END) AS rte_type

 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.school_id=".$school_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by st.name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);

       return $query->result();
       

      }
         public function get_studentwise_RTE_student_update($school_id,$rte)
      {

        $SQL=" select st.child_admitted_under_reservation,st.name,st.unique_id_no,st.class_studying_id,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
join students_school_child_count sc on sc.school_id=st.school_id where sc.school_name='".$school_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='".$rte."' and sc.school_type_id in (2,3,4) group by st.name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);

       return $query->result();
       

      }
      public function get_emis_blockwise_district_2018($district_name,$school_type,$cate_type)
            {
                            $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(class1) as class_1,sum(class2) as class_2,sum(class3) as class_3,sum(class4) as class_4,sum(class5) as class_5,sum(class6) as class_6,sum(class7) as class_7,sum(class8) as class_8,sum(class9) as class_9,sum(class10) as class_10,sum(class11) as class_11,sum(class12) as class_12,sum(prekg) as Prkg,sum(lkg) as LKG,sum(ukg)as UKG,sum(students_enrolled_2018_19.total) as total')
                              ->from('students_enrolled_2018_19')
                              ->join('students_school_child_count','students_school_child_count.school_id=students_enrolled_2018_19.school_key_id')
                              ->where('students_school_child_count.district_name',$district_name);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                //  print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;
            }

  public function govt_enrollment($dist_id)
          {
        $SQL="SELECT count(*) as total FROM students_child_detail
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    WHERE   class_studying_id in (13,14,15,1)  AND  
   students_child_detail.doj BETWEEN '2019-03-01' AND NOW() AND students_child_detail.created_at BETWEEN '2019-03-01 00:00:00'AND NOW() AND
	schoolnew_basicinfo.manage_cate_id= 1  and schoolnew_basicinfo.district_id= ".$dist_id.""; 
//print_r($SQL);
//die();
        $query = $this->db->query($SQL);
        return $query->result();
            
          }
  public function get_blockwise_school_2018($block_name,$school_type,$cate_type)
        {

          $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(class1) as class_1,sum(class2) as class_2,sum(class3) as class_3,sum(class4) as class_4,sum(class5) as class_5,sum(class6) as class_6,sum(class7) as class_7,sum(class8) as class_8,sum(class9) as class_9,sum(class10) as class_10,sum(class11) as class_11,sum(class12) as class_12,sum(prekg) as Prkg,sum(lkg) as LKG,sum(ukg)as UKG,sum(students_enrolled_2018_19.total) as total')
             ->from('students_enrolled_2018_19')
             ->join('students_school_child_count','students_school_child_count.school_id=students_enrolled_2018_19.school_key_id')
              ->where('students_school_child_count.block_name',$block_name);
          

                if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
           

            $this->db->where_in('school_type',$school_type);
          }else

          {

            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->where_in('cate_type',$cate_type);

          }
          $this->db->group_by('school_id'); 

           $result = $this->db->get()->result();
                     
          return $result; 

        }
  public function get_renewal_rejected($dist_id)
    {
         $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
     where schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from ='0000-00-00' group by schoolnew_basicinfo.school_id";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
    public function get_blk_student_migration($dist_id)
{
  $SQL="SELECT COUNT(DISTINCT(students_child_detail.unique_id_no)) as cnt,block_name,block_id,school_type FROM students_child_detail
JOIN students_transfer_history ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
 LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE students_school_child_count.district_id=".$dist_id." AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 GROUP BY block_id,school_type";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_OSC_List($dist_id)
{
  $SQL="select (select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as present_sts,students_school_child_count.block_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt from students_osc 
left join students_school_child_count on students_school_child_count.school_id=students_osc.school_id
where district_id=".$dist_id." and students_osc.present_status!=0 group by present_status,students_school_child_count.block_name;
";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_OSC_List_school($block_id)
{
  $SQL="select (select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as present_sts,students_school_child_count.school_name,students_school_child_count.school_id,students_school_child_count.district_name,students_school_child_count.block_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt from students_osc 
left join students_school_child_count on students_school_child_count.school_id=students_osc.school_id
where block_name='".$block_id."' and students_osc.present_status!=0 group by present_status,students_school_child_count.school_name;
";
         $query = $this->db->query($SQL);
        // print_r($SQL);
       return $query->result(); 
}
  public function students_osc_reg($school_id) {
    
      $sql='select class_section,class_studying_id,students_osc.school_id,students_osc.name,students_osc.unique_id_no,(select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as pre_stus ,students_school_child_count.school_name,training_type,ac_year  from students_osc
 left join students_child_detail on students_child_detail.unique_id_no=students_osc.unique_id_no
 join students_school_child_count on students_school_child_count.school_id=students_osc.school_id
 where students_school_child_count.school_id="'.$school_id.'" and present_status!=0;';
       $query = $this->db->query($sql);
       return $query->result();  
       
    }
public function get_school_student_migration($block_id)
{

  $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,NAME,school_type,school_name,gender,students_transfer_history.class_studying_id,students_child_detail.unique_id_no,students_transfer_history.id,(CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE
          CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
          CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE
          CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE
          CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE
          CASE WHEN  transfer_reason=6 THEN 'Duplicate EMIS Entry' END
          END END END END END) AS Reason,remarks FROM students_child_detail
JOIN students_transfer_history ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE students_school_child_count.block_name='".$block_id."' AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 group by students_child_detail.unique_id_no";
         $query = $this->db->query($SQL);
       //  print_r($SQL);
       return $query->result(); 
}
 public function get_blk_student_migration_reason($dist_id)
{
  $SQL="SELECT COUNT(DISTINCT(students_child_detail.unique_id_no)) as cnt,block_name,block_id,school_type,(CASE transfer_reason WHEN 1 THEN 'Long_Absent' ELSE 
 CASE transfer_reason WHEN 2 THEN 'Transfered_by_Parente' ELSE
 CASE transfer_reason WHEN 3 THEN 'Terminal_Class' ELSE
 CASE transfer_reason WHEN 4 THEN 'Dropped_Out' ELSE
 CASE transfer_reason WHEN 5 THEN 'Student_Expired' ELSE
 CASE transfer_reason WHEN 6 THEN 'Duplicate_Entry' ELSE
 CASE transfer_reason WHEN null THEN 'No_Reason' END
 END
 END
 END
 END
 END
 END) as transfer_reason FROM students_child_detail
JOIN students_transfer_history ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE students_school_child_count.district_id=".$dist_id." AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 GROUP BY block_id,transfer_reason";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_student_migration_reason($block_id)
{

  $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,name,school_type,school_name,gender,students_transfer_history.class_studying_id,students_child_detail.unique_id_no,students_transfer_history.id,(CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE
          CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
          CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE
          CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE
          CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE
          CASE WHEN  transfer_reason=6 THEN 'Duplicate EMIS Entry' END
          END END END END END) AS Reason,remarks FROM students_child_detail
JOIN students_transfer_history  ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE students_school_child_count.block_name='".$block_id."' AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 group by students_child_detail.unique_id_no";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_dist_student_migration_details($dist_id)
{
  $SQL="SELECT *, 
   SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=4 THEN 1 ELSE 0 END) AS gtopa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtocg,
   SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
   SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
   SUM(CASE WHEN T1.t1=4 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog,
   SUM(CASE WHEN T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS cgtog
FROM (
SELECT 
sch1.udise_code as udise1,sch1.school_name as schname1,
sch1.school_type_id as t1,sch1.school_type as sty1,
   sch2.udise_code as udise2,sch2.school_name as schname2,
   sch2.school_type_id as t2,sch2.school_type as sty2,
   sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.district_name,sch2.edu_dist_name,sch2.block_name
from students_transfer_history
join students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit) as T1
WHERE district_id=".$dist_id."
GROUP BY block_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_migration_detail_student($dist_id,$school_type_from,$school_type_to)
{

  $SQL="SELECT *, 
   SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=4 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtopa,
   SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
   SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
   SUM(CASE WHEN T1.t1=4 AND T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog
 
FROM (
SELECT 
sch1.udise_code as udise1,sch1.school_name as schname1,
sch1.school_type_id as t1,sch1.school_type as sty1,
sch2.udise_code as udise2,sch2.school_name as schname2,
sch2.school_type_id as t2,sch2.school_type as sty2,students_transfer_history.unique_id_no,sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.school_id,students_child_detail.name as s_name,students_child_detail.unique_id_no as EMIS_ID, sch2.district_name,sch2.block_name
from students_transfer_history
join students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
join students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no
JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit
WHERE  sch2.district_id=".$dist_id." AND sch1.school_type='".$school_type_from."' AND sch2.school_type='".$school_type_to."' ) as T1
GROUP BY unique_id_no";

         $query = $this->db->query($SQL);
       return $query->result(); 
}
    
    
    /* This function Created by Venba Tamilmaran for listing the school */
	  function get_allmajorcategory(){

         $this->db->select('*')
        ->from('schoolnew_manage_cate');           
        $query = $this->db->get(); 
        return $query->result();

        }
	  function get_alldeptcategory(){
          $this->db->select('*')
        ->from('schoolnew_school_department');          
        $query = $this->db->get(); 
         return $query->result();
                }
      
		function get_subcategoryname(){
         $this->db->select('*')
        ->from('schoolnew_management');          
        $query = $this->db->get(); 
        return $query->result();

 }
	function get_school_list_district($district_id){
       $this->db->select('schoolnew_basicinfo.*,schoolnew_manage_cate.manage_name,schoolnew_management.management,schoolnew_school_department.department,schoolnew_academic_detail.minority_sch,schoolnew_academic_detail.rte'); 
       $this->db->from('schoolnew_basicinfo');
	   $this->db->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id','left');
	   $this->db->join('schoolnew_management','schoolnew_management.id=schoolnew_basicinfo.sch_management_id','left');
	    $this->db->join('schoolnew_school_department','schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id','left');
		$this->db->join('schoolnew_academic_detail','schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id','left');
       $this->db->where('district_id',$district_id); 
	   $this->db->where('curr_stat',1); 
       $query =  $this->db->get();
       return $query->result();
	 }
	 /* This function Created by Venba Tamilmaran for listing the school after the filter */
	 function get_school_list_district_cate($district_id,$schoolcategory){
        $this->db->select('a.*,b.manage_name,c.management,d.department,e.category_name,f.*,g.angan_childs,g.angan_wrks,g.anganwadi,g.anganwadi_center') 
                 ->from('schoolnew_basicinfo a')
                 ->join('schoolnew_manage_cate b','b.id = a.manage_cate_id','left')
                 ->join('schoolnew_management c','c.id = a.sch_management_id','left')
                 ->join('schoolnew_school_department d','d.id = a.sch_directorate_id','left')
                 ->join('schoolnew_category e','e.id = a.sch_cate_id','left')
                 ->join('schoolnew_academic_detail f','f.school_key_id = a.school_id','left')
                 ->join('schoolnew_training_detail g','g.school_key_id = a.school_id','left')
                 ->where('a.district_id',$district_id);
                 if(!empty($schoolcategory))
                 {
                  $this->db->where('a.manage_cate_id',$schoolcategory);
                 }
                 // $this->db->limit(10);
       $result =  $this->db->get()->result();
       // print_r($this->db->last_query());
       return $result;
	 }
	 function school_update($update_data,$table,$where)
   {
      $this->db->where($where);
      $this->db->update($table,$update_data);
      // print_r($this->db->last_query());die;
      return $where;
   }
   function insert_school_district_data($basicinfo_updation)
   {
	  $this->db->insert('schoolnew_basic_info_history',$basicinfo_updation); 
      return $this->db->insert_id();
	
   }



   /*********** School Delete child count**********/

   public function delete_child_count($update_id,$table,$curr_stat)
   {
        if($curr_stat==1)
        {

            $this->db->insert($table,$update_id);
            return $this->db->insert_id();
        }else
        {
          $this->db->where($update_id);
          $this->db->delete($table);
          return $update_id;
        }
   }
    public function get_school_unrecognized_block($district_id)
{
  $SQL="select *,count(*) as tot
from schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
where curr_stat=1 AND   schoolnew_district.id='".$district_id."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
   public function get_school_unrecognized_school($block_name)
{
  $SQL="select *,count(*) as tot
from schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
where curr_stat=1 AND  schoolnew_block.block_name='".$block_name."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
} 
   public function get_school_profile_verification_district($district_id,$school_type,$cate_type)
{
 $this->db->SELECT('*,schoolnew_academic_detail.school_type as sch_typ');
 $this->db->FROM('schoolnew_academic_detail');
$this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_academic_detail.school_key_id');
$this->db->JOIN('schoolnew_training_detail','schoolnew_training_detail.school_key_id=schoolnew_academic_detail.school_key_id');
$this->db->WHERE('students_school_child_count.district_id',$district_id);

      if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->where('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->where('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.school_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }
  public function get_school_land_verification_district($district_id,$school_type,$cate_type)
{
   $this->db->SELECT(' * ');
    $this->db->FROM('schoolnew_infra_detail');
$this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
 $this->db->WHERE('students_school_child_count.district_id',$district_id);
   $this->db->GROUP_BY('school_id');
 if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->where('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->where('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.school_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }
 public function get_school_sanitation_verification_district($district_id,$school_type,$cate_type)
{
  $this->db->SELECT(' * ');
  $this->db->FROM('schoolnew_infra_detail');
 $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
  $this->db->WHERE('students_school_child_count.district_id',$district_id);
  $this->db->GROUP_BY('school_id');
if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->where('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->where('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.school_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }
 public function get_school_committee_verification_district($district_id,$school_type,$cate_type)
{
  $this->db->SELECT(' *');
   $this->db->FROM('schoolnew_committee_detail');
    $this->db->JOIN('students_school_child_count',' students_school_child_count.school_id=schoolnew_committee_detail.school_key_id');
    $this->db->WHERE('students_school_child_count.district_id',$district_id);
     $this->db->GROUP_BY('school_id');
if(!empty($school_type))
          {
    
            $this->db->where_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->where('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->where('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.school_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }
function get_dist_school_details($district_id){

      $this->db->select('sum(case when a.school_type=1 then 1 else  0 end) as aided,
	sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,sum(case when a.school_medium_id is null then 1  else 0 end)as unmediummarked, students_school_child_count.* from schoolnew_section_group a');
     // $this->db->from('students_school_child_count');
	  $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.district_id',$district_id);
	  $this->db->where_in('students_school_child_count.school_type_id',array(2,4));
	  $this->db->group_by('a.school_key_id');
      $query =  $this->db->get();
      return $query->result();
   }
    function get_dist_school_timetable_details_blk($dist_id,$school_cate,$this_week_fst,$this_week_ed){
     // print_r($school_cate);
    if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where=" where students_school_child_count.cate_type in ('".$cate_type."') and students_school_child_count.district_id=".$dist_id."";
    }
    else
    {
     $where="where students_school_child_count.district_id=".$dist_id."";
    }
       $SQL="SELECT SUM(totalclasssection) AS sumsection,SUM(OUTPUT) AS summarked,district_name,block_name,district_id FROM students_school_child_count
    
LEFT JOIN (select 
count(a.class_id) as totalclasssection,
   OUTPUT,school_key_id
from schoolnew_section_group a 
left join (SELECT COUNT(1) AS OUTPUT, school_id FROM (select count(1) as marked,school_id from schoolnew_timetable_weekly_classwise where timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class_id,section,school_id) AS marked GROUP BY school_id ) as b on a.school_key_id = b.school_id where class_id not in (13,14,15) group by school_key_id) AS markedoutput ON markedoutput.school_key_id=students_school_child_count.school_id ".$where."
GROUP BY block_name";
   
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());die;
       return $query->result();
   }

      function get_dist_school_timetable_details($school_cate,$block_name,$this_week_fst,$this_week_ed){
       if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where=" and students_school_child_count.cate_type in ('".$cate_type."')";
    }
    else
    {
     $where="";
    }
       $SQL="select count(a.class_id)as totalclasssection,OUTPUT,school_key_id,school_name,block_name,district_name,district_id,udise_code from  schoolnew_section_group a
   left join students_school_child_count on students_school_child_count.school_id=a.school_key_id
   left join (SELECT COUNT(1) AS OUTPUT, school_id FROM (select count(*) as marked,school_id from schoolnew_timetable_weekly_classwise
   where  timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class_id,section,school_id) AS marked GROUP BY school_id
   ) as b on a.school_key_id = b.school_id where class_id not in (13,14,15)
   and students_school_child_count.block_name='".$block_name."' ".$where." group by school_key_id";
   
         $query = $this->db->query($SQL);
            //print_r($this->db->last_query());die;
       return $query->result();
   }
   function get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed)
   {
	    $SQL="select
	concat(schoolnew_section_group.class_id,'-',schoolnew_section_group.section) as class,
	MAX((CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_weekly_classwise.class_id 
		AND schoolnew_section_group.section=schoolnew_timetable_weekly_classwise.section) THEN 1
        ELSE 0 END
	))as time_table
from schoolnew_timetable_weekly_classwise
JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=schoolnew_timetable_weekly_classwise.school_id
where school_id=".$school_id." and timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class;";

         $query = $this->db->query($SQL);
       return $query->result();
	   
   }
    function get_section_period_count($school_id,$class,$section)
   {
	  
	  $this->db->select('sum(case when PS is null or PT=0 then 1 else  0 end) as notmarked,
     sum(case when PS is not null or PT !=0 then 1 else  0 end) as marked  from schoolnew_timetable_weekly_classwise');
      $this->db->where('school_id',$school_id);
	  $this->db->where('class_id',$class);
	  $this->db->where('section',$section);
      $query =  $this->db->get();
      return $query->result();
   }
   
   function get_dist_high_school_details($district_id){

      $this->db->select('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=12 then 1 else  0 end) as nogrouptwelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=11 then 1 else  0 end) as nogroupelevelth,sum(case when a.school_type=1 then 1 else  0 end) as aided,
	sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,students_school_child_count.* from schoolnew_section_group a');
     // $this->db->from('students_school_child_count');
	  $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.district_id',$district_id);
	  $this->db->where('students_school_child_count.high_class',12);
	  $this->db->where_in('students_school_child_count.school_type_id',array(1,2,4));
	  $this->db->group_by('a.school_key_id');
      $query =  $this->db->get();
      return $query->result();
   }

   function get_dist_special_cash($district_id){
      $ids = array('1', '2','4');
      $this->db->select('count(students_child_detail.id) as student_count,count(students_special_cash_incentive.id) as student_marked,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.udise_code,students_school_child_count.school_name');
      $this->db->from('students_school_child_count');
	  $this->db->join('students_child_detail','students_child_detail.school_id =students_school_child_count.school_id' ,'left');
	  $this->db->join('students_special_cash_incentive','students_child_detail.unique_id_no =students_special_cash_incentive.unique_id_no and and student_eligible = 1','left');
	   $this->db->where('students_school_child_count.district_id',$district_id);
	   $this->db->where('students_child_detail.class_studying_id',12);
	   $this->db->where('students_school_child_count.high_class',12);
	   $this->db->where_in('students_school_child_count.school_type_id', $ids);
	  $this->db->group_by('students_child_detail.school_id');
      $query =  $this->db->get();
      return $query->result();
   }
    
   public function	get_school_class_details($school_id)
	{
	  $this->db->select('schoolnew_section_group.*,baseapp_group_code.group_name,schoolnew_mediumofinstruction.MEDINSTR_DESC,count(students_child_detail.id)  as student_count');
      $this->db->from('schoolnew_section_group');
	  $this->db->join('students_child_detail','students_child_detail.school_id =schoolnew_section_group.school_key_id
      and students_child_detail.class_studying_id=schoolnew_section_group.class_id and students_child_detail.class_section=schoolnew_section_group.section','left');
	  $this->db->join('baseapp_group_code ','baseapp_group_code.id=schoolnew_section_group.group_id','left');
	  $this->db->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_section_group.school_medium_id','left');
      $this->db->where('schoolnew_section_group.school_key_id',$school_id);
	  $this->db->group_by('schoolnew_section_group.id');
      $query =  $this->db->get();
      return $query->result();
	} 
	public function get_school_student_count($district_id,$school_type,$cate_type)
	{


		$this->db->select("district_name,udise_code,sum(c1_b+c1_g+c1_t) as 'first',sum(c2_b+c2_g+c2_t) as 'second',sum(c3_b+c3_g+c3_t) as 'third',sum(c4_b+c4_g+c4_t) as 'fourth',sum(c5_b+c5_g+c5_t) as 'fifth',sum(c6_b+c6_g+c6_t) as 'sixth',sum(c7_b+c7_g+c7_t) as 'seventh',sum(c8_b+c8_g+c8_t) as 'eighth',sum(c9_b+c9_g+c9_t) as 'ninth',sum(c10_b+c10_g+c10_t) as 'tenth',(c11_b+c11_g+c11_t) as class11,(c11_b+c12_g+c12_t) as class12,block_name,school_name,school_id,tp2.*,sc.cate_type") 
            ->from('students_school_child_count sc')
            ->join('teacher_panel2 tp2','tp2.school_key_id = sc.school_id','left')
            
         
         ->where('sc.district_id',$district_id)
         ->where_in('sc.management',array('School Education Department School','Municipal School'))
         
          ->where_in('sc.cate_type',array('Primary School','Middle School','High School','Higher Secondary School'));
       
         
          if(!empty($school_type))
          {
            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->where_in('cate_type',$cate_type);
          }



         
         $this->db->group_by('sc.school_id');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
	}
	

  /************************************
    * Students Schoolwise Details     *
    * VIT-sriram                      *
    * 07/05/2019                      *
    ***********************************/

  public function get_students_educationwise_count($school_id)
  {
        $this->db->select('med.MEDINSTR_DESC as Medium,sum(stu.class_studying_id=1) as Class1,sum(stu.class_studying_id=2) as Class2,sum(stu.class_studying_id=3) as Class3,sum(stu.class_studying_id=4) as Class4,sum(stu.class_studying_id=5) as Class5,sum(stu.class_studying_id=6) as Class6,sum(stu.class_studying_id=7) as Class7,sum(stu.class_studying_id=8) as Class8,sum(stu.class_studying_id=9) as Class9,sum(stu.class_studying_id=10) as Class10,stu.education_medium_id')
                  ->from('students_school_child_count sc')
                  ->join('students_child_detail stu','stu.school_id=sc.school_id')
                  ->join('schoolnew_mediumofinstruction med','med.MEDINSTR_ID=stu.education_medium_id')

                  ->where('stu.transfer_flag',0)
                  ->where('sc.school_id',$school_id)
                  ->group_by('sc.school_id,sc.cate_type,med.MEDINSTR_DESC');

        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;
  }


  public function save_records($save_data,$table)
  {
    // print_r($save_data);die;
      if($save_data['id'] ==''){
      $this->db->insert($table,$save_data);
      return $this->db->insert_id();

      }else
      {
          $this->db->where('id',$save_data['id']);
          $this->db->update($table,$save_data);
          return $save_data['id'];
      }
      // print_r($this->db->last_query());die;
  }
    
    /******************************************************
            Function done by Ramoc Magesh 23-04-2019
    *******************************************************/
    public function school_labdetails_district($where,$group) {
        $sql= "SELECT COUNT(DISTINCT school_key_id) as noofschool, udise_code,school_name,district_name,block_name,
        COUNT(schoolnew_labentry.id) as noofblock, district_id,block_id,edu_dist_id,
MAX(case when lab_id=1 THEN  
		case when condition_now=1 THEN 
			CASE WHEN seperate_room=1 THEN 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' END
		ELSE
			CASE WHEN condition_now=2 THEN
				CASE WHEN seperate_room=1 THEN 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			ELSE
				CASE WHEN condition_now=3 THEN
					CASE WHEN seperate_room=1 THEN 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END 
			END
		END
	END
ELSE 'NO' END) as Physics,
MAX(case when lab_id=2 THEN 
		CASE WHEN condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then 
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
				 case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END 
				end
			end
		end
ELSE 'NO' END) as Chemistry,
MAX(case when lab_id=3 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as Biology,
MAX(case when lab_id=4 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then 
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else 
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as Computer,

MAX(case when lab_id=5 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end

ELSE 'NO' END) as Mathematics,

MAX(case when lab_id=6 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
		
ELSE 'NO' END) as Language,
MAX(case when lab_id=7 THEN
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
		
ELSE 'NO' END) as Geography,
MAX(case when lab_id=8 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as HomeScience,
MAX(case when lab_id=9 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as Psychology,
MAX(case when lab_id=10 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as NotApplicable,
MAX(case when lab_id=11 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as None,
MAX(case when lab_id=12 THEN 
		case when condition_now=1 then
			case when seperate_room=1 then 'YES - FULLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - FULLY EQIUIPED - NO SEPRATE ROOM' end
		else
			case when condition_now=2 then
				case when seperate_room=1 then 'YES - PARTIALLY EQIUIPED - SEPRATE ROOM' ELSE 'YES - PARTIALLY EQIUIPED - NO SEPRATE ROOM' END
			else
				case when condition_now=3 then
					case when seperate_room=1 then 'YES - NOT APPLICABLE - SEPRATE ROOM' ELSE 'YES - NOT APPLICABLE - NO SEPRATE ROOM' END
				end
			end
		end
ELSE 'NO' END) as TinkeringLab

 FROM schoolnew_labentry JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_labentry.school_key_id
        ".$where.$group."";
        //echo $sql;
        //die();
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*******************************************************
    *******************************************************/
    
  public function get_emis_blockwise_dee($dist_id,$school_type,$cate_type)
            {
//print_r($dist_id);
               $this->db->select('`students_school_child_count`.`district_name`,`students_school_child_count`.`district_id`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array('2','3','16','18','27','29','32','34','42'));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('district_id',$dist_id);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }  
            public function get_blockwise_dee($block_name,$school_type,$cate_type)
            {

               $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array('2','3','16','18','27','29','32','34','42'));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
              public function get_emis_blockwise_dse($dist_id,$school_type,$cate_type)
            {

               $this->db->select('`students_school_child_count`.`district_name`, `students_school_child_count`.`district_id`,`school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array(1,5,15,17,19,20,21,22,23,24,26,31,33));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('district_id',$dist_id);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
                  public function get_blockwise_dse($block_name,$school_type,$cate_type)
            {

               $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array(1,5,15,17,19,20,21,22,23,24,26,31,33));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
       public function get_emis_blockwise_dms($dist_id,$cate_type)
            {
              //print_r($dist_id);
               $this->db->select('`students_school_child_count`.`district_name`,`students_school_child_count`.`district_id`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array(28));
         if(!empty($cate_type))  
          {

             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('district_id',$dist_id);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
              public function get_blockwise_dms($block_name,$cate_type)
            {

               $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->from('students_school_child_count')
          ->join('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->where_in('schoolnew_school_department.id', array(28));
   
          if(!empty($cate_type))  
          {

             $this->db->where_in('cate_type',$cate_type);
          }
          $this->db->where('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
			//aadhar school state distic base count details
     function aadhar_school_distic_based_count_details($districtid){
      $sql="SELECT students_aadhaar_child_count.school_id,students_school_child_count.district_id,district_name,sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,district_name,district_id,udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_id,students_school_child_count.block_name,students_school_child_count.edu_dist_name FROM students_aadhaar_child_count 
 join students_school_child_count on students_school_child_count.school_id 
 =students_aadhaar_child_count.school_id  where district_id  = ".$districtid."
 group by students_school_child_count.school_id  ";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
   //aadhar distic school base count
   function aadhar_school_base_count_details($school_id){
   $sql="SELECT students_aadhaar_child_count.school_id,students_school_child_count.district_id,district_name,sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,district_name,district_id,udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_id,students_school_child_count.block_name,students_school_child_count.edu_dist_name FROM students_aadhaar_child_count 
 join students_school_child_count on students_school_child_count.school_id 
 =students_aadhaar_child_count.school_id  where students_school_child_count.school_id  = ".$school_id." ";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
    public function  notin_aadhar_school_base_count_details($school_id)
   {
	  $sql ="SELECT unique_id_no,name,gender,dob,class_studying_id,class_section FROM students_child_detail  WHERE school_id =  ".$school_id." and
      NULLIF(aadhaar_uid_number, ' ') IS NULL and transfer_flag =0 ";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
   function getalldistrictcountsbyteacherblock_surplus($dist_id){
		$this->db->select('students_school_child_count.district_name,students_school_child_count.block_id as block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle) as Govteacher,district_name')
		->from('teacher_profile_count')  
         ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id')
        ->where('students_school_child_count.school_type','Government')
          ->where('students_school_child_count.district_id=',$dist_id)
            ->group_by('students_school_child_count.block_name')
          ->group_by('students_school_child_count.district_name');
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
	}
	function getalldistrictcountsbyclassteach_surplus($block_id){
        $this->db->select('students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.school_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle) as Govteacher,block_name') 
        ->from('teacher_profile_count')
        ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id')
        ->where('students_school_child_count.school_type','Government')
		    ->where('students_school_child_count.block_id=',$block_id)
        ->group_by('students_school_child_count.school_id')
        ->group_by('students_school_child_count.udise_code')
         
        ->group_by('students_school_child_count.school_name');
    
               $result = $this->db->get()->result();
             
              return $result;
	}
    //noonmeal district school count Report by Raju
        public function meal_school_distic_based_count_details($districtid)
   {
	  
			   $sql="
			select aa.district_id,aa.district_name,aa.school_name,aa.school_id,aa.block_name,aa.udise_code,aa.total, bb.meals from 
			(SELECT district_id, district_name,school_id,school_name,block_name,udise_code,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t+c9_b+c9_g+c9_t+c10_b+c10_g+c10_t) AS total FROM students_school_child_count where students_school_child_count.school_type_id in (1 ,2) and district_id= ".$districtid."  GROUP BY district_id,school_id) aa
			 left join
			(
			select students_school_child_count.district_id,students_school_child_count.school_id,students_school_child_count.school_name,count(*) meals from schoolnew_schemeindent 
			left join students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id 
			left join students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id where students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and students_school_child_count.district_id  = ".$districtid." and schoolnew_schemeindent.unique_supply =1 and schoolnew_schemeindent.isactive = 1 
			group by students_school_child_count.school_id) bb

			on  aa.school_id = bb.school_id ";
    $query =  $this->db->query($sql);
      return $query->result();
   }
    //eligible student count details
   public function  meal_school_eligible_stud_count_details($school_id)
   {
	   $sql="select students_school_child_count.school_id,students_school_child_count.school_name,students_school_child_count.district_id,dob,gender,unique_id_no,schoolnew_schemeindent.student_id,students_child_detail.name,students_child_detail.class_studying_id,students_child_detail.class_section
 FROM students_school_child_count 
join students_child_detail on  students_child_detail.school_id =  students_school_child_count.school_id 
join schoolnew_schemeindent ON schoolnew_schemeindent.student_id= students_child_detail.id
where schoolnew_schemeindent.scheme_id=15 and students_school_child_count.school_type_id in (1 ,2) and students_child_detail.school_id =".$school_id."  and schoolnew_schemeindent.unique_supply = 1 and schoolnew_schemeindent.isactive = 1";
	 $query =  $this->db->query($sql);
      return $query->result();  
   }
   //stud_admission_count
          public function stud_admission_count()
          {
            $sql ="select 
            count(*) as noofstudents,
              schoolnew_district.district_name,
              schoolnew_district.id,
              SUM(CASE WHEN class_studying_id=15 THEN 1 ELSE 0 END) AS prekg,
              SUM(CASE WHEN class_studying_id=14 THEN 1 ELSE 0 END) AS ukg,
              SUM(CASE WHEN class_studying_id=13 THEN 1 ELSE 0 END) AS lkg,
              SUM(CASE WHEN class_studying_id=1 THEN 1 ELSE 0 END) AS c1,
              SUM(CASE WHEN class_studying_id=2 THEN 1 ELSE 0 END) AS c2,
              SUM(CASE WHEN class_studying_id=3 THEN 1 ELSE 0 END) AS c3,
              SUM(CASE WHEN class_studying_id=4 THEN 1 ELSE 0 END) AS c4,
              SUM(CASE WHEN class_studying_id=5 THEN 1 ELSE 0 END) AS c5,
              SUM(CASE WHEN class_studying_id=6 THEN 1 ELSE 0 END) AS c6,
              SUM(CASE WHEN class_studying_id=7 THEN 1 ELSE 0 END) AS c7,
              SUM(CASE WHEN class_studying_id=8 THEN 1 ELSE 0 END) AS c8,
              SUM(CASE WHEN class_studying_id=9 THEN 1 ELSE 0 END) AS c9,
              SUM(CASE WHEN class_studying_id=10 THEN 1 ELSE 0 END) AS c10,
              SUM(CASE WHEN class_studying_id=11 THEN 1 ELSE 0 END) AS c11,
              SUM(CASE WHEN class_studying_id=12 THEN 1 ELSE 0 END) AS c12
              FROM students_child_detail
               JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id
            JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
              WHERE students_child_detail.doj BETWEEN '2019-04-01' AND NOW()
              AND schoolnew_basicinfo.manage_cate_id=1 group by schoolnew_basicinfo.district_id";
              $query = $this->db->query($sql);
              return $query->result();
            }
//staff districtwise count 
   public function  emis_staff_district_count_details()
   {
		   $sql ="select district_id,district_name, sum(teach_tot)as staff,sum(nonteach_tot)as nonstaff,sum(totstaff)as totstaff from students_school_child_count where district_id is not null group by district_id";
		   $query =  $this->db->query($sql);
		  return $query->result();   
   }
   //staff district schoolwise count
    public function  emis_staff_district_school_count_details($districtid)
   {
	   $sql ="select district_id,district_name,school_id,school_name,block_name,udise_code,teach_tot as staff, nonteach_tot as nonstaff,totstaff as totstaff from students_school_child_count where district_id = ".$districtid."  group by district_id,school_id";
	   $query =  $this->db->query($sql);
      return $query->result();   
   }
   public function emis_staff_school_count_details($school_id)
   {
	     $sql =" select students_school_child_count.district_id,district_name,school_id,school_name,block_name,students_school_child_count.udise_code, udise_staffreg.teacher_name,gender,staff_join,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, teacher_type.category,teacher_subjects.subjects,ug_degree,pg_degree  from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
    left join teacher_subjects on teacher_subjects.id = udise_staffreg.appointed_subject
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
       left join teacher_ug_degree on teacher_ug_degree.id =udise_staffreg.e_ug
       left join teacher_pg_degree on teacher_pg_degree.id =udise_staffreg.e_pg
		where school_id  = ".$school_id." and archive=1" ;

	    $query =  $this->db->query($sql);
      return $query->result(); 
   }
   	public function  emis_dist_school_prekg_student_joined($districtid){
				
				 $sql ="select 
              count(*) as noofstudents,
              schoolnew_district.district_name,
              schoolnew_district.id,school_name,
			  SUM(CASE WHEN class_studying_id=15 THEN 1 ELSE 0 END) AS prekg,
              SUM(CASE WHEN class_studying_id=14 THEN 1 ELSE 0 END) AS ukg,
              SUM(CASE WHEN class_studying_id=13 THEN 1 ELSE 0 END) AS lkg,
              SUM(CASE WHEN class_studying_id=1 THEN 1 ELSE 0 END) AS c1,
              SUM(CASE WHEN class_studying_id=2 THEN 1 ELSE 0 END) AS c2,
              SUM(CASE WHEN class_studying_id=3 THEN 1 ELSE 0 END) AS c3,
              SUM(CASE WHEN class_studying_id=4 THEN 1 ELSE 0 END) AS c4,
              SUM(CASE WHEN class_studying_id=5 THEN 1 ELSE 0 END) AS c5,
              SUM(CASE WHEN class_studying_id=6 THEN 1 ELSE 0 END) AS c6,
              SUM(CASE WHEN class_studying_id=7 THEN 1 ELSE 0 END) AS c7,
              SUM(CASE WHEN class_studying_id=8 THEN 1 ELSE 0 END) AS c8,
              SUM(CASE WHEN class_studying_id=9 THEN 1 ELSE 0 END) AS c9,
              SUM(CASE WHEN class_studying_id=10 THEN 1 ELSE 0 END) AS c10,
              SUM(CASE WHEN class_studying_id=11 THEN 1 ELSE 0 END) AS c11,
              SUM(CASE WHEN class_studying_id=12 THEN 1 ELSE 0 END) AS c12
              FROM students_child_detail
               JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id 
               JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
               WHERE 
               students_child_detail.doj BETWEEN '2019-03-01' AND NOW() AND
               students_child_detail.created_at BETWEEN '2019-03-01 00:00:00'AND NOW() AND
               schoolnew_basicinfo.manage_cate_id= 1 and schoolnew_basicinfo.district_id= ".$districtid." group by schoolnew_basicinfo.school_id ";
				
				 $query = $this->db->query($sql);
                 return $query->result();
			}
			  public function get_districtwise_school_building_details()
            {

                $this->db->select('count(school_id) as total_school,district_name')
				->where('district_name is not null')
                         ->group_by('district_name');
                $result = $this->db->get('students_school_child_count')->result();

                return $result;

            }
			
			   public function get_schoolwise_building_details($dist_id,$block_filter)
            {
				
				// echo $dist_id;echo $block_filter;
						$this->db->select('a.school_id,a.udise_code,a.block_name,a.school_name,b.build_block_no,sum(IFNULL(c.pucca,0)) as pucca,sum(IFNULL(c.partially_pucca,0)) as partially_pucca,sum(IFNULL(c.kutcha,0)) as kutcha')
                        ->from('students_school_child_count a')
                        ->join('schoolnew_infra_detail b','b.school_key_id = a.school_id','left')
                        ->join('(select sum(case when construct_type =1 then 1 else 0 end) as pucca,
						sum(case when construct_type =2 then 1 else 0 end) as partially_pucca,
						sum(case when construct_type =3 then 1 else 0 end) as kutcha,school_key_id,construct_type from schoolnew_natureofconst_entry group by school_key_id) as c',' c.school_key_id = a.school_id ','left')
                        ->where('a.district_id',$dist_id);
                      
						if(!empty($block_filter))
						{
							$this->db->where_in('c.construct_type',$block_filter);

						}
					$this->db->group_by('a.school_id');

                    $result = $this->db->get()->result();
                     // print_r($this->db->last_query());die;
                    return $result;
            }
			
		   public function  emis_staff_stud_dist_school_details($districtid)
			{
				$sql="
				select aa.district_id,aa.district_name,aa.stud,aa.student,aa.students,aa.block_name,aa.school_name,aa.udise_code,aa.category,aa.school_type,bb.SGT,bb.BT,bb.PG,(aa.stud/bb.SGT)as studsgt,(aa.student/bb.BT)as studBT,(aa.students/bb.PG) as studPG  from 
				(SELECT students_school_child_count.district_id,school_id,district_name,block_name,school_name,udise_code,category,school_type,sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as stud , sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as student,sum(c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)as students FROM students_school_child_count 
				where students_school_child_count.district_id= ".$districtid." and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
				GROUP BY students_school_child_count.school_id) aa
				left join 
				(select students_school_child_count.district_id,school_id,udise_staffreg.udise_code,udise_staffreg.school_key_id,sum(if(teacher_type = 41,1,0))as SGT,sum(if(teacher_type = 11,1,0)) as BT,sum(if(teacher_type = 36,1,0)) as PG from  udise_staffreg  JOIN students_school_child_count on students_school_child_count.school_id= udise_staffreg.school_key_id  
				where students_school_child_count.district_id= ".$districtid."  and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
				group by students_school_child_count.school_id  ) bb 
				on  aa.school_id = bb.school_id  ";
				  $query = $this->db->query($sql);
                 return $query->result();
			}
			
			// public function emis_staff_fixa_tot_school_details()
			// {
				// $sql= "SELECT sum(teacher_panel2.elig_tot) as elig_tot2,sum(sanc_tot)as sanc_tot,sum(avail_tot)as avail_tot,sum(surp_w_tot)as surp_w_tot,sum(surp_wo_tot)as surp_wo_tot,sum(need_tot)as need_tot,sum(teach_status)as teach_status FROM teacher_panel2 ";
				// $query = $this->db->query($sql);
                 // return $query->result();
			// }
			   public function staff_fixa_report_block($district_id)
      {
        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(elig_phm) AS elig_phm,
    SUM(sanc_phm) AS sanc_phm,
    SUM(avail_phm) AS avail_phm,
    SUM(surp_w_phm) AS surp_w_phm,
    SUM(surp_wo_phm) AS surp_wo_phm,
    SUM(need_hhm) AS need_phm,
    SUM(elig_mhm) AS elig_mhm,
    SUM(sanc_mhm) AS sanc_mhm,
    SUM(avail_mhm) AS avail_mhm,
    SUM(surp_w_mhm) AS surp_w_mhm,
    SUM(surp_wo_mhm) AS surp_wo_mhm,
    SUM(need_mhm) AS need_mhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM students_school_child_count
left join teacher_panel2 on teacher_panel2.school_key_id=students_school_child_count.school_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY block_id
";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_fixa_report_school($block_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
    SUM(elig_sg) AS eligible,
    SUM(sanc_sg) AS sanctioned,
    SUM(avail_sg) AS available,
    SUM(need_sg) AS need,
    SUM(surp_w_sg) SWS,
    SUM(surp_wo_sg) AS SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
      SUM(elig_phm) AS elig_phm,
    SUM(sanc_phm) AS sanc_phm,
    SUM(avail_phm) AS avail_phm,
    SUM(surp_w_phm) AS surp_w_phm,
    SUM(surp_wo_phm) AS surp_wo_phm,
    SUM(need_hhm) AS need_phm,
      SUM(elig_mhm) AS elig_mhm,
    SUM(sanc_mhm) AS sanc_mhm,
    SUM(avail_mhm) AS avail_mhm,
    SUM(surp_w_mhm) AS surp_w_mhm,
    SUM(surp_wo_mhm) AS surp_wo_mhm,
    SUM(need_mhm) AS need_mhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM students_school_child_count
left join teacher_panel2 on teacher_panel2.school_key_id=students_school_child_count.school_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND students_school_child_count.block_id=".$block_id." and students_school_child_count.school_type_id=1 AND students_school_child_count.block_id=".$block_id."
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }

    public function staff_fixa_report_PG_block($district_id)
      {
//print_r($district_id);
        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg,
    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY block_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }

       public function staff_fixa_report_PG_school($district_id)
      {

        $result = $this->db->get_where('teacher_panel_subject',array('visible'=>1))->result();
        // print_r($result);
        if(!empty($result))
        {
            $select = '';
            $len = sizeof($result);
            $len = $len -1;
            foreach($result as $index=> $res)
            {
              
              
              if($len !=$index){
                $select .= 'swp_'.$res->sub_code.'+';
              }else
              {
                $select .='swp_'.$res->sub_code;
              }
            }
           // echo $select;
        }

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
   SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS pg_SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg,
    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
   
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result();
       

      }

       public function staff_fixa_report_PG_school1($dist_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS pg_SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg
   
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.district_id=".$dist_id." and students_school_child_count.school_type_id=1
GROUP BY school_id;";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result();
       

      }
      /************************************
     * RTE Students Verification List  *
     * VIT-sriram                      *
     * 21/05/2019                      *
     ***********************************/
   public function get_rte_students_list($dist)
   {
       $this->db->select('students_rte_2019.id,
students_rte_2019.serial,
students_rte_2019.Student_Name,
students_rte_2019.register_no,
students_rte_2019.category,
students_rte_2019.sub_category,
students_rte_2019.religion,
students_rte_2019.District,
students_rte_2019.pincode,
students_rte_2019.address,
students_rte_2019.latitude,
students_rte_2019.longitude,
students_rte_2019.selected_schools,
students_rte_2019.photo,
students_rte_2019.proof_of_birth,
students_rte_2019.parent_id,
students_rte_2019.address_proof,
students_rte_2019.other_certifi,
students_rte_2019.verify_status,
students_rte_2019.reason,
students_rte_2019.remarks,
students_rte_2019.updated_date
');
       $this->db->from('students_rte_2019')
                ->where('District',$dist);
                // ->limit(100);
       $result = $this->db->get()->result();
       return $result;
   }

   public function update_rte_verification($update)
   {
     // print_r($update);die;
     // echo $update['id'];die;

       $this->db->where('id',$update['id']);
       $this->db->update('students_rte_2019',$update);
       // print_r($this->db->last_query());die;
       return $update['id'];
   }
   
   			
			//staff FIxiation summary
			public function emis_staff_fixa_tot_school_details($district_id)
			{
				$sql= "select  district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category ,
				sum(elig_tot) as elig_tot2,sum(sanc_tot)as sanc_tot,sum(avail_tot)as avail_tot,sum(surp_w_tot)as surp_w_tot,sum(surp_wo_tot)as surp_wo_tot,sum(need_tot)as need_tot
				from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				 where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
			}
			
				public function staff_eligible($district_id)
			{
				$sql="select students_school_child_count.district_id,district_name, sum(elig_sg)as sg,sum(elig_sci)as sci,sum(elig_mat)as mat,sum(elig_eng)as eng,sum(elig_tam)as tam,sum(elig_soc)as soc
				from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				 where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				 $query = $this->db->query($sql);
                 return $query->result();
			}
			public function staff_sanct($district_id)
			{
				$sql="select students_school_child_count.district_id,district_name, sum(sanc_sg)as sg,sum(sanc_sci)as sci,sum(sanc_mat)as mat,sum(sanc_eng)as eng,sum(sanc_tam)as tam,sum(sanc_soc)as soc
				from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
                $query = $this->db->query($sql);
                 return $query->result();
			}
			
			
			
			public function staff_avail($district_id)
			{
				$sql="select  students_school_child_count.district_id,district_name,
			 sum(avail_sg)as sg,sum(avail_sci)as sci,sum(avail_mat)as mat,sum(avail_eng)as eng,sum(avail_tam)as tam,sum(avail_soc)as soc
			 from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
                $query = $this->db->query($sql);
                 return $query->result();
			}
			
			public function staff_need($district_id)
			{
				$sql="select  students_school_child_count.district_id,district_name,
			 sum(need_sg)as sg,sum(need_sci)as sci,sum(need_mat)as mat,sum(need_eng)as eng,sum(need_tam)as tam,sum(need_soc)as soc
			from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
			}
			
			
			public function staff_surpwith($district_id) 
			{
				$sql="
			select  students_school_child_count.district_id,district_name, sum(surp_w_sg)as sg,sum(surp_w_sci)as sci,sum(surp_w_mat)as mat,sum(surp_w_eng)as eng,sum(surp_w_tam)as tam,sum(surp_w_soc)as soc
            from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
			}


            public function staff_surpwithout($district_id)
			{
				$sql="
		    select  students_school_child_count.district_id,district_name,sum(surp_wo_sg)as sg,sum(surp_wo_sci)as sci,sum(surp_wo_mat)as mat,sum(surp_wo_eng)as eng,sum(surp_wo_tam)as tam,sum(surp_wo_soc)as soc
			from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
			}
			
				public function emis_staff_eligiblepost($district_id)
			{
				$sql= "select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, elig_sg,elig_sci,elig_mat,elig_eng,elig_tam,elig_soc,elig_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
               where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
            $query = $this->db->query($sql);
                 return $query->result();
			
			}
			
			public function emis_staff_sanctionpost($district_id)
			{
				$sql= "select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category,sanc_sg, sanc_sci, sanc_mat, sanc_eng, sanc_tam, sanc_soc, sanc_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
			where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			public function emis_staff_availpost($district_id)
			{
				$sql= "select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, avail_sg, avail_sci, avail_mat, avail_eng, avail_tam, avail_soc, avail_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
			where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			public function emis_staff_needpost($district_id)
			{
				 
			$sql= "select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category,  need_sg, need_sci, need_mat, need_eng, need_tam, need_soc, need_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
			where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			public function emis_staff_surpwithpost($district_id)
			{
				 
			$sql= "
			select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, surp_w_sg, surp_w_sci, surp_w_mat, surp_w_eng, surp_w_tam, surp_w_soc, surp_w_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			public function emis_staff_surpwithoutpost($district_id)
			{
				 
			$sql= "select district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, surp_wo_sg, surp_wo_sci, surp_wo_eng, surp_wo_mat, surp_wo_tam, surp_wo_soc, surp_wo_tot
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 where students_school_child_count.district_id =".$district_id." AND 
         students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) ";
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			// transfor district list 
			public function emis_staffcount_district_school_details($district_id)
			{
				
			$sql= "select students_school_child_count.district_id,students_school_child_count.district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.udise_code,teach_tot as staff,school_type from students_school_child_count 
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id =students_school_child_count.school_id
			where students_school_child_count.district_id =".$district_id." and school_type_id = 1 and  sch_cate_id in (1,2,4,11,12)  and  sch_management_id in  (1,3) group by school_id ";
			$query = $this->db->query($sql);
                 return $query->result();
			}
			public function emis_dsestaffcount_district_school_details($district_id)
			{
				
			$sql= "select students_school_child_count.district_id,students_school_child_count.district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.udise_code,teach_tot as staff,school_type from students_school_child_count 
			 join schoolnew_basicinfo on schoolnew_basicinfo.school_id =students_school_child_count.school_id
			where students_school_child_count.district_id =".$district_id." and school_type_id = 1 and  sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) group by school_id "; 

                 $query = $this->db->query($sql);
                 return $query->result();
			}

			
			
			public function emis_govstaff_school_details($school_id)
			{
			$sql= "select students_school_child_count.district_id, district_name,school_id, school_name,block_name, students_school_child_count.block_id, students_school_child_count.udise_code, udise_staffreg.teacher_name, teacher_code,gender, teacher_type, teacher_professional_qualify.professional, students_school_child_count.category as categoryname , mbl_nmbr, email_id, type_teacher, staff_dob, staff_join, staff_pjoin, staff_psjoin, appointed_subject, appointedsubject.subjects as appsub, edu_dist_id,edu_dist_name, e_prsnt_doorno, e_prsnt_place, e_prsnt_distrct, e_prsnt_pincode, school_type, appointedsubject.id, school_type_id, teacher_type.id as des_id ,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates

from students_school_child_count join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id join teacher_type on teacher_type.id = udise_staffreg.teacher_type join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject where students_school_child_count.district_id is not null and school_id =".$school_id." group by teacher_code;";
				$query = $this->db->query($sql);
                 return $query->result();
			}
			
			 // public function emis_govstaff_school()
			 // {
				
			// $sql= "SELECT school_id,block_name,district_name,block_id,district_id,udise_code,school_name,school_type_id,school_type,edu_dist_id,edu_dist_name
             // from  students_school_child_count where school_type_id = 1 limit 10";
				// $query = $this->db->query($sql);
                 // return $query->result();
				 
				 
			 // }
			 
			 public function teacher_join_reason()
			 {
				
			$sql= "select * from teacher_join_reason";
			$query = $this->db->query($sql);
                 return $query->result();
				 
			 }
			  public function teacher_trans_priority()
			 {
				
			$sql="select * from teacher_trans_priority";
			$query = $this->db->query($sql);
                 return $query->result();
			 }
			 
			 public function dist_id()
			 {
				 $sql= "select id,district_code,district_name from schoolnew_district";
				 $query = $this->db->query($sql);
                 return $query->result();
			 }
			 
			 public function teacher_panel_type()
			 {
				 $sql= "select id, panel_type from teacher_panel_deetype";
				 $query = $this->db->query($sql);
                 return $query->result(); 
			 }
			 
			
			 
			 public function insert_transfordata($data)
			{

			$result = $this->db->get_where('teacher_transfer_appli',array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']))->first_row();

			if(!empty($result))
			{
			$this->db->where(array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']));
			$this->db->update('teacher_transfer_appli',$data);
			return $data['school_key_id'];

			}else
			{
			$this->db->insert('teacher_transfer_appli',$data);
			return $this->db->insert_id();
			}
				 
			}
			
			 public function insert_surplus($data)
			 {
				 $result = $this->db->get_where('teacher_transfer_appli',array('teacher_id'=>$data['teacher_id']))->first_row();
			
			if(!empty($result))
			{
				$this->db->where(array('teacher_id'=>$data['teacher_id']));
			$this->db->update('teacher_transfer_appli',$data);
			return $data['teacher_id'];
			 }
			 else
			{
			$this->db->insert('teacher_transfer_appli',$data);
			return $this->db->insert_id();
			}
			 }
			
			public function schoolchange($flag,$sch_id)
			{
				// print_r($where);
				
				if($flag ==1){
					$sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE block_name IN (SELECT block_name FROM students_school_child_count where school_id =".$sch_id." )and school_type_id =1";
				
											
				}else if($flag==2)
				{
					$sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE district_name IN (SELECT district_name FROM students_school_child_count where school_id =".$sch_id." )and school_type_id =1";
				}
				else if($flag==3)
				{
					$sql= "select id,district_code,district_name from schoolnew_district";
				}
				// else if($flag==4)
				// {
				// $sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE edu_dist_name IN (SELECT edu_dist_name FROM students_school_child_count where  school_type_id =1)";
				// }
				
				
				$query = $this->db->query($sql);
                 return $query->result();
					
			}
			// public function dseschoolchange($flag,$sch_id)
			// {
				// // print_r($where);
				
				// if($flag ==1){
					// $sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE block_name IN (SELECT block_name FROM students_school_child_count where school_id =".$sch_id." )and school_type_id =1";
				
											
				// }else if($flag==2)
				// {
					// $sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE district_name IN (SELECT district_name FROM students_school_child_count where school_id =".$sch_id." )and school_type_id =1";
				// }
				// else if($flag==3)
				// {
					// $sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE edu_dist_name IN (SELECT edu_dist_name FROM students_school_child_count where school_id =".$sch_id." )and school_type_id =1";
				// }
				// else if($flag==4)
				// {
				// $sql= "select school_id,school_name,district_name,district_id,block_id,edu_dist_name,edu_dist_id from students_school_child_count WHERE edu_dist_name IN (SELECT edu_dist_name FROM students_school_child_count where  school_type_id =1)";
				// }
				
				
				// $query = $this->db->query($sql);
                 // return $query->result();
					
			// }
			
			public function transfer_staff_pdf($staff_id)
			{
				$sql = "select joining_reason,description ,teacher_transfer_appli.school_key_id, teacher_transfer_appli.teacher_id, teacher_transfer_appli.school_type, transfer_location, name, teacher_transfer_appli.gender, dob, date_retirement, mobile, desgnation, subject, block, edu_dist, district, doj_pr, doj_pr_schol, join_reason, teacher_transfer_appli.school_name, address, transfer_reason, priority_claimed, spouse_death_date, kidney_treat_date, spouse_district, spouse_distance, transfer_school_dist_id, transfer_school_edu_dist_id, transfer_school_block_id, transfer_school_id,subjects,staff_join,teacher_type,type_teacher,udise_staffreg.udise_code,block_name,district_name,edu_dist_name,teacher_panel_deetype.panel_type,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as maxdates,students_school_child_count.school_name as school
				 from teacher_transfer_appli 
		join teacher_trans_priority on teacher_trans_priority.priority = teacher_transfer_appli.priority_claimed 
		join teacher_join_reason on teacher_join_reason.id = teacher_transfer_appli.join_reason 
		join teacher_subjects on teacher_subjects.id = teacher_transfer_appli.subject 
		join students_school_child_count on students_school_child_count.district_id = teacher_transfer_appli.district and students_school_child_count.edu_dist_id = teacher_transfer_appli.edu_dist and students_school_child_count.school_id =teacher_transfer_appli.school_key_id
		join udise_staffreg on udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_panel_deetype on teacher_panel_deetype.id = teacher_transfer_appli.panel_type
		where teacher_transfer_appli.teacher_id='".$staff_id."'";
				// echo $sql;die();				
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			public function transfer_list_old_pdf($staff_id)
			{
				$sql = "select teacher_name,subjects,school_name,block_name,district_name,type_teacher from teacher_trans_history 
left join udise_staffreg on udise_staffreg.u_id = teacher_trans_history.staff_id
left join teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
left join students_school_child_count on students_school_child_count.udise_code=teacher_trans_history.from_schl 
left join teacher_type on teacher_type.id=udise_staffreg.teacher_type
where teacher_trans_history.staff_id='".$staff_id."'";
				// echo $sql;die();				
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			public function ceo_details($dist_id)
			{
				$sql ="select tamil_name,officer_name,officer_qualifi from  udise_offreg where district_id=".$dist_id." and office_type_id=1";
				// echo $sql;die();				
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			public function transfer_list_new_pdf($staff_id)
			{
				$sql = "select teacher_name,subjects,school_name,block_name,district_name,udise_offreg.office_name from teacher_trans_history 
left join udise_staffreg on udise_staffreg.u_id = teacher_trans_history.staff_id
left join teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
left join students_school_child_count on students_school_child_count.udise_code=teacher_trans_history.to_schl 
left join udise_offreg on udise_offreg.off_key_id=teacher_trans_history.to_schl_keyid
where teacher_trans_history.staff_id='".$staff_id."'";
				// echo $sql;die();				
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
				public function transfer_dsestaff_pdf($staff_id)
			{
				$sql = "select joining_reason,description ,teacher_transfer_appli.school_key_id,teacher_transfer_appli.teacher_id, teacher_transfer_appli.school_type, transfer_location, name, teacher_transfer_appli.gender, dob, date_retirement, mobile, desgnation, subject, block, edu_dist, district, doj_pr, doj_pr_schol, join_reason, teacher_transfer_appli.school_name,students_school_child_count.school_name as school,address, transfer_reason, priority_claimed, spouse_death_date, kidney_treat_date, spouse_district, spouse_distance, transfer_school_dist_id, transfer_school_edu_dist_id, transfer_school_block_id, transfer_school_id,subjects,staff_join,teacher_type,type_teacher,udise_staffreg.udise_code
				,block_name,district_name,edu_dist_name,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as maxdates,medium
				 from teacher_transfer_appli 
			    join teacher_trans_priority on teacher_trans_priority.id = teacher_transfer_appli.priority_claimed 
				join teacher_join_reason on teacher_join_reason.id = teacher_transfer_appli.join_reason 
				join teacher_subjects on teacher_subjects.id = teacher_transfer_appli.subject 
				join students_school_child_count on students_school_child_count.district_id = teacher_transfer_appli.district
                  and students_school_child_count.edu_dist_id = teacher_transfer_appli.edu_dist and students_school_child_count.school_id =teacher_transfer_appli.school_key_id
				join udise_staffreg on udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
				join teacher_type on teacher_type.id = udise_staffreg.teacher_type
                where teacher_transfer_appli.teacher_id='".$staff_id."' ";
								
				$query = $this->db->query($sql);
                 return $query->result();
				
			}
			
			//  function DSE school surplus subject wise details by raju
		
			public function  emis_staff_surplus_tot_subject($dist_id)
			{   
			
				$sql=" 
				    select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
				 surp_w_tot
				from students_school_child_count
				left join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
				left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) 
                 and students_school_child_count.district_id =".$dist_id."
                 group by students_school_child_count.school_id";
				 $query = $this->db->query($sql);
                 return $query->result();

			}
			public function surplus_tot($dist_id)
			{   
			
			   if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			
				$sql=" select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
				sum(surp_w_tot) as surp
				from students_school_child_count
				left join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  
                   students_school_child_count.district_id=".$dist_id."";
				 $query = $this->db->query($sql);
                 return $query->result();
			}
			public function surplus_sub($dist_id)
			{  
			    if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
				$sql=" select  students_school_child_count.district_id,district_name, sum(surp_w_sg)as sg,sum(surp_w_sci)as sci,sum(surp_w_mat)as mat,sum(surp_w_eng)as eng,sum(surp_w_tam)as tam,sum(surp_w_soc)as soc,
sum(surp_w_mala)as mala ,sum(surp_w_telu) as telu ,sum(surp_w_kann) as kann,sum(surp_w_urdu) as urdu,sum(surp_w_mhm) as mhm,sum(surp_w_phm)phm,sum(surp_w_hhm)as hhm
                from students_school_child_count
				join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."   students_school_child_count.district_id=".$dist_id."";
				  $query = $this->db->query($sql);
                 return $query->result();
				 
				
			}
			public function emis_sgstaff_surpwithpost($dist_id)
			{
				
				if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
				$sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,surp_w_sg,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
                  left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and ".$where."  surp_w_sg !=0 and 
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
			}
		  public function	emis_sciencestaff_surpwithpost( $dist_id)
		  {   
		        if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sci,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  surp_w_sci !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_mathstaff_surpwithpost( $dist_id)
		  {
			  if($dist_id ==28)
				{
					$where = '';
				}else
				{
				    $where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mat,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."   surp_w_mat !=0  and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_englishstaff_surpwithpost( $dist_id)
		  {  
		      
			  if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_eng,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."   surp_w_eng !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_tamilstaff_surpwithpost( $dist_id)
		  {   
		  
		     if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_tam,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."   surp_w_tam !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		   public function	emis_socialsciencestaff_surpwithpost( $dist_id)
		  {
			  if($dist_id ==28)
				{
					$where = '';
				}else
				{
				    $where = 'sch_management_id in (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_soc,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."    surp_w_soc !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		    public function	emis_primaryhmstaff_surpwithpost( $dist_id)
		  {    
		      if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_phm,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."   surp_w_phm !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		    public function	emis_middlehmstaff_surpwithpost( $dist_id)
		  {   
		       if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mhm,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and ".$where."   surp_w_mhm !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_highhmstaff_surpwithpost( $dist_id)
		  {   
		      if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_hhm,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where." surp_w_hhm !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		   public function	emis_telgustaff_surpwithpost( $dist_id)
		  {   
		      if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_telu,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  surp_w_telu !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_kannadastaff_surpwithpost( $dist_id)
		  {    
		      if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_kann,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  surp_w_kann !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		     public function emis_urdustaff_surpwithpost( $dist_id)
		  {   
		      if($dist_id ==28)
				{
					$where = '';
				}else
				{
				    $where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_urdu,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  surp_w_urdu !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		      public function emis_malayalamstaff_surpwithpost( $dist_id)
		  {   
		       if($dist_id ==28)
				{
					$where = '';
				}else
				{
					$where = 'sch_management_id in  (1,3) and';
				}
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mala,sum(surplus) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
				 where sch_cate_id in (1,2,4,11,12) and  ".$where."  surp_w_mala !=0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  

		  
		  public function emis_deegovsurplus_sgstaff_school($school_id)
		  {
			   $sql="
			   select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,udise_staffreg.gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,udise_staffreg.appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,students_school_child_count.school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates,surplus,teacher_transfer_appli.id as trans_id,disability_type
        from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
        left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
        left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id and teacher_transfer_appli.teacher_id = udise_staffreg.teacher_code
		where  students_school_child_count.district_id is not null and teacher_type =41 and students_school_child_count.school_id=".$school_id." group by teacher_code ";
			   $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		  
		  
		   public function insertsurplus_transfordata($data)
			{

			$result = $this->db->get_where('teacher_transfer_appli',array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']))->first_row();
			// print_r($result);
			if(!empty($result))
			{
			$this->db->where(array('teacher_id'=>$data['teacher_id'],'school_key_id'=>$data['school_key_id']));
			$this->db->update('teacher_transfer_appli',$data);
			return $data['school_key_id'];

			}else
			{
			$this->db->insert('teacher_transfer_appli',$data);
			return $this->db->insert_id();
			}
				 
			}
			
			public function getsurplus($school_id)
			{
                $sql="select school_key_id,teacher_id,surplus from teacher_transfer_appli where school_key_id =".$school_id."";				

				$query = $this->db->query($sql);
          return $query->result();
			}
			
			
		  
		 public function emis_deegovsurplus_staff_school($where,$school_id)
			{
				
				$sql=" select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,udise_staffreg.gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,udise_staffreg.appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,students_school_child_count.school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates,surplus,teacher_transfer_appli.id as trans_id,disability_type
        from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
        left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
       
        left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id and teacher_transfer_appli.teacher_id = udise_staffreg.teacher_code
		
		where  students_school_child_count.district_id is not null and udise_staffreg.appointed_subject =".$where." and teacher_type != 28  and students_school_child_count.school_id =".$school_id." group by teacher_code";
	
		 $query = $this->db->query($sql);
          return $query->result();
	   }
	   
	   public function emis_deegovsurplus_hmstaff_school($where,$type,$school_id)
	   {
	   $sql="select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,udise_staffreg.gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,udise_staffreg.appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,students_school_child_count.school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates,surplus,teacher_transfer_appli.id as trans_id,disability_type
        from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
        join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
         join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id and teacher_transfer_appli.teacher_id = udise_staffreg.teacher_code
		where  students_school_child_count.district_id is not null  and cate_type = ".$where."  and teacher_type = ".$type." and students_school_child_count.school_id= ".$school_id."  group by teacher_code ";
		 $query = $this->db->query($sql);
                 return $query->result();

			}
			

		
		  //Same function DSE school surplus count 
		public function  emis_dsestaff_surplus_tot_subject($dist_id)
			{
				$sql=" 
				    select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
				 swp_high_tot  as surp_w_tot
				from students_school_child_count
				left join teacher_panel4 on teacher_panel4.school_key_id =students_school_child_count.school_id
				left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) 
                 and students_school_child_count.district_id =".$dist_id."
                 group by students_school_child_count.school_id";
				 $query = $this->db->query($sql);
                 return $query->result();

      }
      //left join teacher_panel4 on teacher_panel4.school_key_id =students_school_child_count.school_id
			public function dsesurplus_tot($dist_id)
			{
				$sql=" select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
				sum(surp_w_sg)as sg ,sum(surp_w_soc)as ss ,sum(surp_w_sci)as sc,sum(surp_w_hhm) as hhm, sum(surp_w_tam) as tam,sum(surp_w_eng) as eng,sum(surp_w_mat) as mat
				from students_school_child_count
				
				 left  join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) 
                 and  students_school_child_count.district_id=".$dist_id."";
				 $query = $this->db->query($sql);
                 return $query->result();
			}
			public function dsesurplus_sub($dist_id)
			{
				$sql=" select  students_school_child_count.district_id,district_name, 
				sum(swp_1) as tamil,sum(swp_2) as english ,sum(swp_3) as physics,sum(swp_4) as chemistry,sum(swp_5)as biology,
				sum(swp_6) as botany,sum(swp_7) as zoology ,sum(swp_8) as statistics ,
				sum(swp_10) as geography,sum(swp_11) as microbiology,sum(swp_12)as biochemistry,sum(swp_high_tot) as surp,
				sum(swp_16) as mathematics ,sum(swp_17) as homescience ,sum(swp_18) as history,sum(swp_19) as economics ,sum(swp_20) as politicalscience ,sum(swp_21)as commerce,sum(surp_w_sg)as sg ,sum(surp_w_soc)as ss ,sum(surp_w_sci)as sc,sum(surp_w_hhm) as hhm, sum(surp_w_tam) as tam,sum(surp_w_eng) as eng,sum(surp_w_mat) as mat
                from students_school_child_count
				left join teacher_panel4 on teacher_panel4.school_key_id =students_school_child_count.school_id
                left  join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
				 where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and  students_school_child_count.district_id=".$dist_id."";
				  $query = $this->db->query($sql);
                 return $query->result();
				 
				
			}
			public function emis_dsesgstaff_surpwithpost($dist_id)
			{
				$sql="  select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sg,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.desgnation=41) as surplus
from students_school_child_count
left join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and surp_w_sg != 0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
				 
			}
			public function emis_dsephystaff_surpwithpost( $dist_id)
			
			{
			$sql="select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, swp_3,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =22) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				left join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and swp_3 != 0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
			}
			public function emis_dsechestaff_surpwithpost( $dist_id)
			
			{
			$sql="select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, swp_4,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =13) as surplus 
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and swp_4 != 0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
			}
			
			public function	emis_dseenglishstaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, swp_2,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =46) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and swp_2 != 0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		     public function emis_dsetamilstaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, swp_1,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =48) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and swp_1 != 0 and
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsebiostaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_5,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =11) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and  swp_5 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		 public function  emis_dsebotanystaff_surpwithpost($dist_id)
		 {
			 $sql=" select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_6 ,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =26) as surplus 
			 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_6 !=0 
                 and  students_school_child_count.district_id =".$dist_id."  
                  group by students_school_child_count.school_id";
				  $query = $this->db->query($sql);
                 return $query->result(); 
		 }
		  public function emis_dsezoologystaff_surpwithpost( $dist_id)
		  {
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_7,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =27) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and  swp_7 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsestatisticsstaff_surpwithpost( $dist_id)
		  {
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_8,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =58) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_8 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsegeographystaff_surpwithpost( $dist_id)
		  {
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_10,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =18) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_10 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsemicrobiologystaff_surpwithpost( $dist_id)
		  {
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_11,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =56) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_11 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsebiochemistrystaff_surpwithpost( $dist_id)
		  {
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_12,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =50) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_12 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  public function emis_dsemathmaticstaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_16,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =3) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_16 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		 
		    public function emis_dsehsciencestaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_17,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =20) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_17 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function  emis_dsehistorystaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_18,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =19) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_18!=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dseeconomicsstaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_19,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =15) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_19 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsepoliticalsciencestaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_20,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =23) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_20 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function emis_dsecommercestaff_surpwithpost($dist_id){
			   $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,swp_21,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =51) as surplus
				 from students_school_child_count
				 join teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  swp_21 !=0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		  public function emis_dsegovsurplus_staff_school($where,$school_id)
			{
				
				$sql=" select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,udise_staffreg.gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,udise_staffreg.appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,students_school_child_count.school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates,surplus,teacher_transfer_appli.id as trans_id,disability_type
        from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
         join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
          left join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id and teacher_transfer_appli.teacher_id = udise_staffreg.teacher_code
		
		where  students_school_child_count.district_id is not null and udise_staffreg.appointed_subject =".$where." and teacher_type NOT IN (SELECT teacher_type
                        FROM udise_staffreg
                        WHERE teacher_type IN (28,27,26,36)
                       )  and students_school_child_count.school_id =".$school_id."  group by teacher_code ";
        
	
		 $query = $this->db->query($sql);
          return $query->result();
	   }
		  
		  
		  
			 public function emis_deegovsurplus_pgstaff_school($where,$school_id)
			{
				
        $sql=" select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,udise_staffreg.gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,udise_staffreg.appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,students_school_child_count.school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id,
        (select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as maxdates,surplus,teacher_transfer_appli.id as trans_id,disability_type
        from  students_school_child_count 
		join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
		join teacher_type on teacher_type.id = udise_staffreg.teacher_type
		join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
         join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
      
          left join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id and teacher_transfer_appli.teacher_id = udise_staffreg.teacher_code
		
		where  students_school_child_count.district_id is not null and udise_staffreg.appointed_subject =".$where." and teacher_type =36  and students_school_child_count.school_id =".$school_id." group by teacher_code";
	
		 $query = $this->db->query($sql);
     print_r($SQL);
          return $query->result();
	   }
			
		  public function	emis_dsesciencestaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sci,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =7) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and surp_w_sci != 0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    public function	emis_dsemathstaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mat,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =3) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and surp_w_mat != 0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		     public function emis_dsebtengstaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_eng,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =46) as surplus
				 from students_school_child_count
				 left join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and surp_w_eng != 0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		     public function emis_dsebttamilstaff_surpwithpost( $dist_id)
		  {
			  $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category,surp_w_tam ,sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =48) as surplus
				 from students_school_child_count
				 join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
				 left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1  and surp_w_tam != 0 and  
                 students_school_child_count.district_id =".$dist_id." group by school_id";
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		    
		 
		   public function	emis_dsesocialsciencestaff_surpwithpost( $dist_id)
		  {
			  $sql="  select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_soc , sum(teacher_transfer_appli.surplus=1 and teacher_transfer_appli.subject =8) as surplus
from students_school_child_count 
join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id 
left  join teacher_transfer_appli on teacher_transfer_appli.school_key_id = students_school_child_count.school_id
                where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.school_type_id=1 and  surp_w_soc !=0 and students_school_child_count.district_id =".$dist_id." group by school_id";
				 
				 //echo $sql;die();
				  $query = $this->db->query($sql);
                 return $query->result();
		  }
		  
		
		  
		  
		  ///end now
		  
		  
        public function staff_fixtation_sub_wise($dist_id)
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(vac_sg) as vac_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg,sum(vac_tam) as vac_tamil,sum(vac_eng) as vac_eng,sum(vac_sci) as vac_sci,sum(vac_mat) as vac_mat,sum(vac_soc) as vac_soc
FROM students_school_child_count
left join teacher_panel2 on teacher_panel2.school_key_id=students_school_child_count.school_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND students_school_child_count.district_id=".$dist_id." AND students_school_child_count.school_type_id=1";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }
        public function staff_fixtation_sub_wise_dse($dist_id)
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(vac_sg) as vac_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg,sum(vac_tam) as vac_tamil,sum(vac_eng) as vac_eng,sum(vac_sci) as vac_sci,sum(vac_mat) as vac_mat,sum(vac_soc) as vac_soc
FROM students_school_child_count
left join teacher_panel2 on teacher_panel2.school_key_id=students_school_child_count.school_id
where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.district_id=".$dist_id." AND students_school_child_count.school_type_id=1";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }
   
       public function staff_transfer_req_block($district_id)
      {

        $SQL="select  students_school_child_count.block_name,students_school_child_count.block_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc,
sum(case when desgnation in(28) then 1 else 0 end) as HM_mid,
  sum(case when desgnation in(29) then 1 else 0 end) as HM_pri, 
sum(case when desgnation not in(11,41,36) or desgnation is null then 1 else 0 end) as Oth
 from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.district_id=".$district_id." and  students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
group by students_school_child_count.block_id"; 
// print_r($SQL);
// die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_transfer_req_teacher($block_id)
      {
		  // print_r($block_id);

        $SQL="select  (select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as DOR,teacher_transfer_appli.gender,teacher_transfer_appli.doj_pr,teacher_transfer_appli.doj_pr_schol,teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,
(select subjects from teacher_subjects WHERE teacher_subjects.id=teacher_transfer_appli.subject LIMIT 1) AS otn,
(select type_teacher from teacher_type WHERE teacher_type.id=teacher_transfer_appli.desgnation LIMIT 1) AS otn1,
         (select description from teacher_trans_priority where teacher_trans_priority.id=teacher_transfer_appli.priority_claimed) AS PC,
         (select block2 from teacher_panel_schools WHERE teacher_panel_schools.school_id=students_school_child_count.school_id LIMIT 1) as block,teacher_transfer_appli.school_key_id
 from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.block_id=".$block_id."  and   students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
group by teacher_transfer_appli.teacher_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_staff_fix_district($district_id)
            {
              $this->db->select('a.district_id,a.block_name,a.block_id,count(a.school_id) as tot_school,count(mark_school) as mark_school')
                        ->from('students_school_child_count a')
                        ->join('(select count(school_key_id) as mark_school,school_key_id from teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School','Fully Aided School','Anglo Indian (Fully Aided) School','Oriental (Fully Aided) Sanskrit School','Oriental (Fully Aided) Arabic School'))
                         ->where_in('a.cate_type',array('Middle School','Primary School'))
                         ->where('a.district_id',$district_id)
                        ->group_by('a.block_id')
                        ->order_by('a.block_name','ASC');
                $result = $this->db->get()->result();
               // print_r($this->db->last_query());die;
                return $result;
            }
               public function get_staff_fix_schoolwise($block_id)
            {
                $this->db->select('a.school_name,a.school_id,a.udise_code,a.block_name,teach_status')
                         ->from('students_school_child_count a')
                         ->join('(select count(school_key_id) as mark_school,school_key_id,teach_status from teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School','Fully Aided School','Anglo Indian (Fully Aided) School','Oriental (Fully Aided) Sanskrit School','Oriental (Fully Aided) Arabic School'))
                         ->where_in('a.cate_type',array('Middle School','Primary School'))
                         ->where('a.block_id',$block_id);
                $result = $this->db->get()->result();
                return $result;
            }
             public function staff_transfer_dse_req_block($district_id)
      {

        $SQL="select students_school_child_count.block_name,students_school_child_count.block_id,
 sum(case when desgnation in (41) then 1 else 0 end) as SG,
 sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam, 
 sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
 sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat, 
 sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci, 
 sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc, 
 sum(case when desgnation in(36) and subject=11 then 1 else 0 end) as PG_bio, 
 sum(case when desgnation in(36) and subject=26 then 1 else 0 end) as PG_bot,
 sum(case when desgnation in(36) and subject=48 then 1 else 0 end) as PG_tam, 
 sum(case when desgnation in(36) and subject=46 then 1 else 0 end) as PG_eng, 
 sum(case when desgnation in(36) and subject=13 then 1 else 0 end) as PG_che, 
 sum(case when desgnation in(36) and subject=22 then 1 else 0 end) as PG_phy, 
 sum(case when desgnation in(36) and subject=27 then 1 else 0 end) as PG_zool,
 sum(case when desgnation in(36) and subject=58 then 1 else 0 end) as PG_static, 
 sum(case when desgnation in(36) and subject=18 then 1 else 0 end) as PG_geograp, 
 sum(case when desgnation in(36) and subject=56 then 1 else 0 end) as PG_micro, 
 sum(case when desgnation in(36) and subject=50 then 1 else 0 end) as PG_bioche, 
 sum(case when desgnation in(36) and subject=3 then 1 else 0 end) as PG_math,
 sum(case when desgnation in(36) and subject=51 then 1 else 0 end) as PG_com, 
 sum(case when desgnation in(36) and subject=23 then 1 else 0 end) as PG_politsc, 
 sum(case when desgnation in(36) and subject=15 then 1 else 0 end) as PG_ecomic,
 sum(case when desgnation in(36) and subject=20 then 1 else 0 end) as PG_hsc, 
 sum(case when desgnation in(36) and subject=19 then 1 else 0 end) as PG_his, 
 sum(case when desgnation in(36) and subject=7 then 1 else 0 end) as PG_sc,
 sum(case when desgnation in(36) and subject=8 then 1 else 0 end) as PG_ssc,
 sum(case when desgnation in(26) then 1 else 0 end) as HS, 
 sum(case when desgnation in(27) then 1 else 0 end) as HSS,
 sum(case when desgnation not in(11,41,36,26,27) or desgnation is null then 1 else 0 end) as Oth 
from teacher_transfer_appli 
join students_school_child_count on students_school_child_count.school_id=teacher_transfer_appli.school_key_id 
where students_school_child_count.district_id=".$district_id." and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') and teacher_transfer_appli.transfer=1 group by students_school_child_count.block_id"; 
//prin
// echo $SQL;
// die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_transfer_dse_req_teacher($district_id)
      {

        $SQL="select  (select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as DOR,teacher_transfer_appli.gender,teacher_transfer_appli.doj_pr,teacher_transfer_appli.doj_pr_schol,teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,
(select subjects from teacher_subjects WHERE teacher_subjects.id=teacher_transfer_appli.subject LIMIT 1) AS otn,
(select type_teacher from teacher_type WHERE teacher_type.id=teacher_transfer_appli.desgnation LIMIT 1) AS otn1,
(select block2 from teacher_panel_schools WHERE teacher_panel_schools.school_id=students_school_child_count.school_id LIMIT 1) as block,
         (select description from teacher_trans_priority where teacher_trans_priority.id=teacher_transfer_appli.priority_claimed
                                ) AS PC,teacher_transfer_appli.school_key_id
 from teacher_transfer_appli  
  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.district_id=".$district_id."  and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School')
and teacher_transfer_appli.transfer=1 group by teacher_transfer_appli.teacher_id;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function get_staff_fix_district_dse($district_id)
            {
              $this->db->select('a.block_id,a.block_name,a.district_name,a.district_id,count(a.school_id) as tot_school,
                (CASE mark_school WHEN 1 THEN 1 ELSE  
                CASE mark_school1 WHEN 1 THEN 1 ELSE 0 END END) as mm,
                count(mark_school) as mark_school,count(mark_school1) as mark_school1')
                         ->from('students_school_child_count a')
                         ->join('(select count(school_key_id) as mark_school,school_key_id from teacher_panel4 group by school_key_id) as b','b.school_key_id = a.school_id ','left') 
                         ->join('(select count(school_key_id) as mark_school1,school_key_id from teacher_panel2 group by school_key_id) as c','c.school_key_id = a.school_id ','left')                        
                         ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School'))
                         ->where_in('a.cate_type',array('High School','Higher Secondary School'))
                         ->where('a.district_id',$district_id)
                        ->group_by('a.block_id')
                        ->order_by('a.block_name','ASC');
                $result = $this->db->get()->result();
                //print_r($this->db->last_query());die;
                return $result;
            }

            public function get_staff_fix_schoolwise_dse($block_id)
            {
                $this->db->select('a.school_name,a.school_id,a.udise_code,a.block_name,status,teach_status,count(mark_school) as mark_school,
                (CASE mark_school WHEN 1 THEN 1 ELSE  
                CASE mark_school1 WHEN 1 THEN 1 ELSE 0 END END) as mm,count(mark_school1) as mark_school1')
                         ->from('students_school_child_count a')
                         ->join('(select count(school_key_id) as mark_school,school_key_id,status from teacher_panel4 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->join('(select count(school_key_id) as mark_school1,school_key_id,teach_status from teacher_panel2 group by school_key_id) as c','c.school_key_id = a.school_id ','left')
                         ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School'))
                         ->where_in('a.cate_type',array('High School','Higher Secondary School'))
                         ->where('a.block_id',$block_id)
                         ->group_by('a.school_id');

                $result = $this->db->get()->result();
               // print_r($this->db->last_query());die;
                return $result;
            }
			/*DEE total surplus count  by bala */
	  public function emis_total_surplus_teacher_dee($dist_id)
	  {
	   $SQL="select count(teacher_transfer_appli.id) as total from teacher_transfer_appli  
 join teacher_panel_schools on  teacher_panel_schools.school_id=teacher_transfer_appli.school_key_id
 join schoolnew_school_department on schoolnew_school_department.id=teacher_panel_schools.sch_directorate_id where teacher_transfer_appli.surplus=1 and teacher_status =0 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29) and teacher_transfer_appli.district=".$dist_id."";
       $query = $this->db->query($SQL);
       return $query->result();
	  }
	  public function emis_total_surplus_teacher_type_dee($dist_id)
	  {
	  		$sql= "select 
    sum(case when desgnation in (41)  then 1 else 0 end) as SG,
          sum(case when desgnation in(11) then 1 else 0 end) as BT,
        sum(case when desgnation in(36) then 1 else 0 end) as PG,
    sum(case when desgnation in(29) then 1 else 0 end) as Primary_HM,
sum(case when desgnation in(28) then 1 else 0 end) as Middle_HM,
school_id,count(teacher_transfer_appli.id) as total from teacher_transfer_appli  
 join teacher_panel_schools on  teacher_panel_schools.school_id=teacher_transfer_appli.school_key_id
 join schoolnew_school_department on schoolnew_school_department.id=teacher_panel_schools.sch_directorate_id where teacher_transfer_appli.surplus=1 and teacher_status =0 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29) and teacher_transfer_appli.district=".$dist_id."";
				$query = $this->db->query($sql);
                 return $query->result();
	  
	  }
	  public function emis_total_surplus_teacher_phm_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
	   and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
 and teacher_transfer_appli.desgnation in(29) group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	   public function emis_total_surplus_teacher_mhm_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
	   and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation in(28) group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_pg_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
		 
and teacher_transfer_appli.desgnation=36 group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_bt_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob,students_school_child_count.school_id 
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
join teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=11 group by teacher_transfer_appli.teacher_id";
// echo $sql;
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_sg_dee($dist_id)
	  {
		  $sql= "select teacher_panel_schools.district_name,teacher_panel_schools.block_name,teacher_panel_schools.school_name,teacher_panel_schools.district_id,teacher_panel_schools.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_panel_subject.subject,teacher_transfer_appli.seniority_district,staff_dob,teacher_panel_schools.school_id,doj_block
 from teacher_transfer_appli 
 left join teacher_panel_schools on teacher_panel_schools.school_id=teacher_transfer_appli.school_key_id and teacher_panel_schools.district_id = teacher_transfer_appli.district
 left  join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id 
 left join teacher_panel_subject on teacher_panel_subject.app_sub =teacher_transfer_appli.subject 
 JOIN teacher_type on  udise_staffreg.teacher_type=teacher_type.id 
 join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id 
 where sch_cate_id in (1,2,4,11,12) and sch_management_id in (1,3) and teacher_status = 0 and teacher_panel_schools.district_name is not null
 and surplus=1 and teacher_transfer_appli.district= ".$dist_id." and teacher_transfer_appli.desgnation= 41 group by teacher_transfer_appli.teacher_id";
 // echo $sql;
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	   /*DSE total surplus count  by bala */
	  public function emis_total_surplus_teacher($dist_id)
	  {
	   $SQL="select count(teacher_transfer_appli.id) as total from teacher_transfer_appli  
	   join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
	   join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id and schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33) and teacher_transfer_appli.desgnation in(41,11,36,26,27) and
	   teacher_transfer_appli.district=".$dist_id."";
       $query = $this->db->query($SQL);
       return $query->result();
	  }
	  
	  public function emis_total_surplus_teacher_type($dist_id)
	  {
	  		$sql= "select 
    sum(case when desgnation in (41)  then 1 else 0 end) as SG,
          sum(case when desgnation in(11) then 1 else 0 end) as BT,
        sum(case when desgnation in(36) then 1 else 0 end) as PG,
    sum(case when desgnation in(26) then 1 else 0 end) as high_hm,
sum(case when desgnation in(27) then 1 else 0 end) as hrs_hm,
school_id,count(teacher_transfer_appli.id) as total from teacher_transfer_appli  
 join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33) and teacher_transfer_appli.desgnation in(41,11,36,26,27) and teacher_transfer_appli.district=".$dist_id."";
				$query = $this->db->query($sql);
                 return $query->result();
	  
	  } 
	  public function emis_total_surplus_teacher_highhm($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
	   and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation in(26) group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_hrshm($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
	   and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation in(27) group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_pg($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
		 
and teacher_transfer_appli.desgnation=36 group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_bt($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=11 group by teacher_transfer_appli.teacher_id";
// echo $sql;
// die();
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_sg($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_subjects.subjects,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob
          from teacher_transfer_appli  
         join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
        join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=41 group by teacher_transfer_appli.teacher_id";
// echo $sql;
// die();
				$query = $this->db->query($sql);
                 return $query->result();
	  }
	  
	  public function emis_total_surplus_teacher_add_dee($teacher_code,$data)
	  {
		 $this->db->where('teacher_id',$teacher_code);
	    return $this->db->update('teacher_transfer_appli',$data); 	
	  }
	  public function emis_total_surplus_teacher_add_dse($teacher_code,$data)
	  {
		 $this->db->where('teacher_id',$teacher_code);
	    return $this->db->update('teacher_transfer_appli',$data); 	
	  }
	  
	   function get_school_mana_id(){
       $this->db->select('school_mana_id'); 
       $this->db->from('schoolnew_school_department');
	   $this->db->where('department_code',001); 
       $query =  $this->db->get();
       return $query->result();

    }
	  //Eligible Promotion DSE by Raju
	  
	  public function emis_eligible_promotion_overall_tatal($dist_id)
	  {
		  $sql="
		  select sum(teacher_type = 36) as pgteacher,sum(teacher_type = 41) as sgteacher,sum(teacher_type = 11) as btteacher,sum(teacher_type = 26) as hshm,sum(teacher_type = 27) as hsshm
		from udise_staffreg
		join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
		join teacher_type on teacher_type.id =udise_staffreg.teacher_type
		where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and schoolnew_basicinfo.district_id = ".$dist_id."";

			$query = $this->db->query($sql);
                 return $query->result();
	  }
	  public function  emis_dsesgstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 41) as sgteacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and teacher_type = 41 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	  
	    public function  emis_dsebtstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 11) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and teacher_type = 11 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_dsepgstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 36) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and teacher_type = 36 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_dsehshmstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 26) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and teacher_type = 26 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_dsehsshmstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 27) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and teacher_type = 27 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	  //--
	  public function  emis_dseschoolstaff_promotionpost($where,$school_id)
	  {
		  $sql="
			select schoolnew_basicinfo.district_id as district_id, schoolnew_basicinfo.block_id as block_id,schoolnew_basicinfo.edu_dist_id, udise_staffreg.udise_code, udise_staffreg.school_key_id as school_key_id, teacher_code as teacher_id, aadhar_no,teacher_name, e_med, gender, staff_dob as dob, staff_join as appointment_date, staff_pjoin as doj_pr_post, staff_psjoin as doj_pr_school , e_doj_prpost, social_category, teacher_type,type_teacher,  professional , udise_staffreg.appointed_subject,subject, mbl_nmbr,promo_eligible, email_id,  e_prsnt_distrct ,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as regularisation_date,teachers_promotion_eligible.doj_block,teachers_promotion_eligible.id as trans_id,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3
            from udise_staffreg
			left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			left join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			left join teacher_dates on teacher_dates.school_key_id = udise_staffreg.school_key_id
			left join teacher_panel_subject on teacher_panel_subject.app_sub =udise_staffreg.appointed_subject
            left join teachers_promotion_eligible on teachers_promotion_eligible.school_key_id = udise_staffreg.school_key_id and teachers_promotion_eligible.teacher_id = udise_staffreg.teacher_code
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and archive =1 and teacher_type = ".$where." and udise_staffreg.school_key_id = ".$school_id." group by teacher_code  ";
      // print_r($sql);
          $query = $this->db->query($sql);
          return $query->result(); 
	  }
	
	  public function insertpromotion($data)
			{

			$result = $this->db->get_where('teachers_promotion_eligible',array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']))->first_row();
			// print_r($result);
			if(!empty($result))
			{
			$this->db->where(array('teacher_id'=>$data['teacher_id'],'school_key_id'=>$data['school_key_id']));
			$this->db->update('teachers_promotion_eligible',$data);
			return $data['school_key_id'];

			}else
			{
			$this->db->insert('teachers_promotion_eligible',$data);
			return $this->db->insert_id();
			}
				 
			}
			
			//Eligible Promotion DEE by Raju
	  
	  public function emis_dee_eligible_promotion_overall_total($dist_id)
	  {
		  $sql="select sum(teacher_type = 36) as pgteacher,sum(teacher_type = 41) as sgteacher,sum(teacher_type = 11) as btteacher,sum(teacher_type = 29) as prihm,sum(teacher_type = 28) as midhm
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) and schoolnew_basicinfo.district_id = ".$dist_id."";

			$query = $this->db->query($sql);
                 return $query->result();
	  }
	  public function  emis_deesgstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 41) as sgteacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and teacher_type = 41 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	  
	    public function  emis_deebtstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 11) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and teacher_type = 11 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_deepgstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 36) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and teacher_type = 36 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  } 
	   public function  emis_deeprihmstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 29) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and teacher_type = 29 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_deemidhmstaff_promotionpost($dist_id)
	  {
		  $sql="
		  select udise_staffreg.district_id,block_name,district_name, udise_staffreg.block_id, udise_staffreg.udise_code, school_key_id,students_school_child_count.school_name, teacher_code, aadhar_no,teacher_name, e_med, gender, staff_dob, staff_join, staff_pjoin, staff_psjoin, e_doj_prpost, social_category, teacher_type,type_teacher,  professional,  appointed_subject, mbl_nmbr, email_id,  e_prsnt_distrct,sum(teacher_type = 28) as teacher 
			from udise_staffreg
			join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			join students_school_child_count on students_school_child_count.school_id =udise_staffreg.school_key_id
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and teacher_type = 28 and schoolnew_basicinfo.district_id = ".$dist_id." group by school_key_id ";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	   public function  emis_deeschoolstaff_promotionpost($where,$school_id)
	  {
		  $sql="
			select schoolnew_basicinfo.district_id as district_id, schoolnew_basicinfo.block_id as block_id,schoolnew_basicinfo.edu_dist_id, udise_staffreg.udise_code, udise_staffreg.school_key_id as school_key_id, teacher_code as teacher_id, aadhar_no,teacher_name, e_med, gender, staff_dob as dob, staff_join as appointment_date, staff_pjoin as doj_pr_post, staff_psjoin as doj_pr_school , e_doj_prpost, social_category, teacher_type,type_teacher,  professional , udise_staffreg.appointed_subject,subject, mbl_nmbr,promo_eligible, email_id,  e_prsnt_distrct ,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1)  as regularisation_date,teachers_promotion_eligible.doj_block,teachers_promotion_eligible.id as trans_id,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3
            from udise_staffreg
			left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			left join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			left join teacher_dates on teacher_dates.school_key_id = udise_staffreg.school_key_id
			left join teacher_panel_subject on teacher_panel_subject.app_sub =udise_staffreg.appointed_subject
            left join teachers_promotion_eligible on teachers_promotion_eligible.school_key_id = udise_staffreg.school_key_id and teachers_promotion_eligible.teacher_id = udise_staffreg.teacher_code
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) and archive =1  and teacher_type = ".$where." and udise_staffreg.school_key_id = ".$school_id." group by teacher_code ";
			// echo $sql;die(); 
          $query = $this->db->query($sql);
          return $query->result(); 
	  }
     public function emis_PG_fixation($sql,$district_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,".$sql." from teacher_panel4
       join students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id
       where students_school_child_count.district_id=".$district_id."
        group by school_id";
        $query = $this->db->query($sql);
       // print_r($this->db->last_query());
        return $query->result();

    }
	
	//promotion dee and dse report by raju
	public function promotion_deereport($district_id,$sub,$pan)
	{
		$sql="   select teachers_promotion_eligible.school_key_id,teachers_promotion_eligible.district_id,teacher_name,teacher_id, appointment_date, doj_pr_post, doj_pr_school, dob, designation,type_teacher, teachers_promotion_eligible.appointed_subject, promo_eligible, regularisation_date,district_name,block_name,students_school_child_count.school_name,subjects,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3,
case when panel1 ='".$pan."' and panel1_subject = ".$sub."  then panel1_rank else 0 end as rank1, 
case when panel2 ='".$pan."' and panel2_subject = ".$sub."  then  panel2_rank else 0 end as rank2,
case when panel3 ='".$pan."'and panel3_subject = ".$sub."  then panel2_rank else 0 end as rank3,udise_staffreg.udise_code
from teachers_promotion_eligible
		join students_school_child_count on students_school_child_count.school_id = teachers_promotion_eligible.school_key_id
		join udise_staffreg on udise_staffreg.teacher_code =teachers_promotion_eligible.teacher_id 
		join teacher_subjects on teacher_subjects.id =teachers_promotion_eligible.appointed_subject
		join teacher_type on teacher_type.id =teachers_promotion_eligible.designation 
		join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id  
		where  sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) and teachers_promotion_eligible.district_id =".$district_id." and promo_eligible = 1 and (panel1_subject = ".$sub." or panel2_subject = ".$sub." or panel3_subject =  ".$sub.") 
        and ( panel1 = '".$pan."'  or panel2 = '".$pan."'  or panel3 = '".$pan."' ) ";
		  $query = $this->db->query($sql);
        // print_r($this->db->last_query()); group by teacher_id
        return $query->result();
	}
	
	public function promotion_dsereport($district_id,$sub,$pan)
	{
		$sql="   select teachers_promotion_eligible.school_key_id,teachers_promotion_eligible.district_id,teacher_name,teacher_id, appointment_date, doj_pr_post, doj_pr_school, dob, designation,type_teacher, teachers_promotion_eligible.appointed_subject, promo_eligible, regularisation_date,district_name,block_name,students_school_child_count.school_name,subjects,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3,
case when panel1 ='".$pan."' and panel1_subject = ".$sub."  then panel1_rank else 0 end as rank1, 
case when panel2 ='".$pan."' and panel2_subject = ".$sub."  then  panel2_rank else 0 end as rank2,
case when panel3 ='".$pan."'and panel3_subject = ".$sub."  then panel2_rank else 0 end as rank3,udise_staffreg.udise_code
from teachers_promotion_eligible
		join students_school_child_count on students_school_child_count.school_id = teachers_promotion_eligible.school_key_id
		join udise_staffreg on udise_staffreg.teacher_code =teachers_promotion_eligible.teacher_id 
		join teacher_subjects on teacher_subjects.id =teachers_promotion_eligible.appointed_subject
		join teacher_type on teacher_type.id =teachers_promotion_eligible.designation 
		join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id  
		where  sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and teachers_promotion_eligible.district_id =".$district_id." and promo_eligible = 1 and (panel1_subject = ".$sub." or panel2_subject = ".$sub." or panel3_subject =  ".$sub.") 
        and ( panel1 = '".$pan."'  or panel2 = '".$pan."'  or panel3 = '".$pan."' ) ";
		  $query = $this->db->query($sql);
          // print_r($this->db->last_query()); die();group by teacher_id"
        return $query->result();
	}

       public function get_state_school($dist_id)
    {
     // print_r($sql);
        $sql="select district_id,management,count(*) as s_cnt from students_school_child_count where district_id=".$dist_id." group by management;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district($mang,$dist_id)
    {
     // print_r($sql);
        $sql="select management,block_name,count(*) as s_cnt,district_name from students_school_child_count where management='".$mang."' AND district_id=".$dist_id." group by block_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,teacher_name,mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and block_name='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dee($dist_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (2,3,16,18,27,29,32,34,42) AND district_id=".$dist_id." group by management";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dee($mang,$dist_id)
    {
     // print_r($sql);
        $sql="select district_name,block_name,count(*) as s_cnt,management from students_school_child_count where management='".$mang."' AND district_id=".$dist_id." and sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by block_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dee($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,teacher_name,mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and block_name='".$block_name."' and sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dse($dist_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND district_id=".$dist_id." group by management";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
	 public function get_school_dse($dist_id)
    {
     // print_r($sql);
        $sql="select udise_code,school_name,school_id,vac_44,vac_23,vac_14,vac_agr,vac_com,vac_pet,vac_sew,vac_mus,vac_dra,vac_pd2 from students_school_child_count 
		left join teacher_panel4 on teacher_panel4.school_key_id=students_school_child_count.school_id
		left join teacher_panel2 on teacher_panel2.school_key_id=students_school_child_count.school_id
		where students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND students_school_child_count.district_id=".$dist_id."";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dse($mang,$dist_id)
    {
     // print_r($sql);
        $sql="select block_name,district_name,count(*) as s_cnt,management from students_school_child_count where management='".$mang."' AND district_id=".$dist_id." and sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) group by block_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dse($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,teacher_name,mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) and block_name='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dms($dist_id)
    {
     // print_r($sql);
        $sql="select block_name,management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (28) and district_id=".$dist_id." group by management";
        $query = $this->db->query($sql);
       //  print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dms($mang,$dist_id)
    {
     // print_r($sql);
        $sql="select block_name,district_name,count(*) as s_cnt,management from students_school_child_count where management='".$mang."' and district_id=".$dist_id." and sch_directorate_id in (28) group by block_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dms($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,teacher_name,mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (28) and block_name='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
      public function get_state_school_others($dist_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) and district_id=".$dist_id." group by management";
        $query = $this->db->query($sql);
       //  print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_others($mang,$dist_id)
    {
     // print_r($sql);
        $sql="select block_name,district_name,count(*) as s_cnt,management from students_school_child_count where management='".$mang."' and district_id=".$dist_id." and sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) group by block_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_others($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,teacher_name,mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) and block_name='".$block_name."' group by school_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
	
	//surplus block wise and government,municipal_sch report 
	public function surplus_dee_blk_mun_gov_count($dist,$des)
	{
		$sql="SELECT  
		 district_id, block_id, block_name,sum(panchayat_sch)as panchayat_sch, sum(municipal_sch) as municipal_sch 
		 from teachers_dee_deploy_rules
		 left join teacher_transfer_appli on teacher_transfer_appli.district =  teachers_dee_deploy_rules.district_id and teacher_transfer_appli.block = teachers_dee_deploy_rules.block_id 
		 where district =".$dist." and desgnation =".$des."
		 group by block_id";
		  $query = $this->db->query($sql);
        // print_r($this->db->last_query());
         return $query->result();
	}
	public function save_panel4($schoolid,$savesubjectpanel4)
	{
		$this->db->where('school_key_id',$schoolid);
	return $this->db->update('teacher_panel4',$savesubjectpanel4); 
	}
	public function save_panel2($schoolid,$savesubjectpanel2)
	{
		$this->db->where('school_key_id',$schoolid);
	return $this->db->update('teacher_panel2',$savesubjectpanel2); 
	}

	
	//block wise transferlist and government,municipal_sch report by raj
	public function transfer_dee_blk_mun_gov_count($dist)
	{
		$sql="SELECT district_id, block_id, block_name,panchayat_sch,municipal_sch from teachers_dee_deploy_rules left join teacher_transfer_appli on teacher_transfer_appli.district = teachers_dee_deploy_rules.district_id and teacher_transfer_appli.block = teachers_dee_deploy_rules.block_id where district =".$dist." group by block_id";
		  $query = $this->db->query($sql);
        // print_r($this->db->last_query());
         return $query->result();
	}
	public function panel_type()
	{
		$sql="select id,panel_type from teacher_panel_deetype";
		$query = $this->db->query($sql);
        // print_r($this->db->last_query());
         return $query->result();
	}
		



   public function insert_user($data)
    {    
        // users is the name of the db table you are inserting in
        return $this->db->insert('teacher_panel_beotransfer', $data);
    }   

		 public function get_beo_list($dist_id)
    {
     // print_r($sql);
        $sql="SELECT recruit_mode,teacher_panel_beotransfer.doj_pr_beo,teacher_panel_beotransfer.doj_beo,teacher_panel_beotransfer.doj_mhm,teacher_panel_beotransfer.dob,teacher_panel_beotransfer.id,location,teacher_panel_beotransfer.name,schoolnew_district.district_name,schoolnew_block.block_name FROM teacher_panel_beotransfer
join schoolnew_district on schoolnew_district.id=teacher_panel_beotransfer.district
join schoolnew_block on schoolnew_block.id=teacher_panel_beotransfer.block
where district=".$dist_id."";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
    public function get_beo_list_pdf($staff_id)
    {
     // print_r($sql);
        $sql="SELECT sd.district_name,sb.block_name,mhm.district_name as mhm_district,mhmblk.block_name as mhm_block,recruit_mode,teacher_panel_beotransfer.doj_pr_beo,teacher_panel_beotransfer.doj_beo,teacher_panel_beotransfer.doj_mhm,teacher_panel_beotransfer.dob,teacher_panel_beotransfer.id,location,teacher_panel_beotransfer.name FROM teacher_panel_beotransfer
JOIN schoolnew_district as sd ON sd.id=teacher_panel_beotransfer.district
JOIN schoolnew_block as sb ON sb.id=teacher_panel_beotransfer.block
left JOIN schoolnew_district as mhm ON mhm.id=teacher_panel_beotransfer.mhm_district
left JOIN schoolnew_block as mhmblk ON mhmblk.id=teacher_panel_beotransfer.mhm_block
where teacher_panel_beotransfer.id=".$staff_id."";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	
	public function vacancy_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 from teacher_panel4 join students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id where students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function live_vacancy_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 from teacher_panel4_cp join students_school_child_count on students_school_child_count.school_id=teacher_panel4_cp.school_key_id where students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function vacancy_dse_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_hhm) as hhm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu from teacher_panel2 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DSE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function live_vacancy_dse_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_hhm) as hhm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu from teacher_panel2_cp 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DSE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function vacancy_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_phm) as phm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu from teacher_panel2 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function live_vacancy_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_phm) as phm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu from teacher_panel2_cp 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function need_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_1) as need_1,SUM(need_2) as need_2,SUM(need_3) as need_3,SUM(need_4) as need_4,SUM(need_5) as need_5,SUM(need_6) as need_6,SUM(need_7) as need_7,SUM(need_8) as need_8,SUM(need_9) as need_9,SUM(need_10) as need_10,SUM(need_11) as need_11,SUM(need_12) as need_12,SUM(need_13) as need_13,SUM(need_14) as need_14,SUM(need_15) as need_15,SUM(need_16) as need_16,SUM(need_17) as need_17,SUM(need_18) as need_18,SUM(need_19) as elig_19,SUM(need_20) as need_20,SUM(need_21) as need_21,SUM(need_22) as need_22,SUM(need_23) as need_23,SUM(need_24) as need_24,SUM(need_25) as need_25,SUM(need_26) as need_26,SUM(need_27) as need_27,SUM(need_28) as need_28,SUM(need_29) as need_29,SUM(need_30) as need_30,SUM(need_31) as need_31,SUM(need_32) as need_32,SUM(need_33) as need_33,SUM(need_34) as need_34,SUM(need_35) as need_35,SUM(need_36) as need_36,SUM(need_37) as need_37,SUM(need_38) as need_38,SUM(need_39) as need_39,SUM(need_40) as need_40,SUM(need_41) as need_41,SUM(need_42) as need_42,SUM(need_43) as elig_43 from teacher_panel4 join students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id where students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function need_dse_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_hhm) as hhm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu from teacher_panel2 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DSE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	public function need_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="select students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_mhm) as mhm,SUM(need_phm) as phm,SUM(need_phm) as phm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu from teacher_panel2 
		join students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
		join teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
		where students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	//new changes modules dse promtion list by raj
	public function dee_promotion_sch_staff_list($dist_id)
	{
		$sql ="select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.udise_code,teach_tot as staff from students_school_child_count 
join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id  
		where  sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) and  students_school_child_count.district_id = ".$dist_id."  group by district_id,school_id";
		   $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
	}
	public function dse_promotion_sch_staff_list($dist_id)
	{
		$sql ="select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.udise_code,teach_tot as staff from students_school_child_count 
join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id  
		where  sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and  students_school_child_count.district_id = ".$dist_id."  group by district_id,school_id";
		   $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
	}
	
	public function dse_promotion_staff_details($school_id)
	{
		$sql="select schoolnew_basicinfo.district_id as district_id, schoolnew_basicinfo.block_id as block_id,schoolnew_basicinfo.edu_dist_id, udise_staffreg.udise_code, udise_staffreg.school_key_id as school_key_id, teacher_code as teacher_id, aadhar_no,teacher_name, e_med, udise_staffreg.gender, staff_dob as dob, staff_join as appointment_date, staff_pjoin as doj_pr_post, staff_psjoin as doj_pr_school , e_doj_prpost, social_category, teacher_type,type_teacher,  professional , udise_staffreg.appointed_subject,subject, mbl_nmbr,promo_eligible, email_id,  e_prsnt_distrct ,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as regularisation_date,teachers_promotion_eligible.doj_block,teachers_promotion_eligible.id as trans_id,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3
            from udise_staffreg
			left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			left join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			left join teacher_dates on teacher_dates.school_key_id = udise_staffreg.school_key_id
			left join teacher_panel_subject on teacher_panel_subject.app_sub =udise_staffreg.appointed_subject
            left join teachers_promotion_eligible on teachers_promotion_eligible.school_key_id = udise_staffreg.school_key_id and teachers_promotion_eligible.teacher_id = udise_staffreg.teacher_code
			where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and archive =1  and 
            udise_staffreg.school_key_id = ".$school_id." and teacher_type.category =1 group by teacher_code";
			  $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
	}
	public function dee_promotion_staff_details($school_id)
	{
		$sql="select schoolnew_basicinfo.district_id as district_id, schoolnew_basicinfo.block_id as block_id,schoolnew_basicinfo.edu_dist_id, udise_staffreg.udise_code, udise_staffreg.school_key_id as school_key_id, teacher_code as teacher_id, aadhar_no,teacher_name, e_med, udise_staffreg.gender, staff_dob as dob, staff_join as appointment_date, staff_pjoin as doj_pr_post, staff_psjoin as doj_pr_school , e_doj_prpost, social_category, teacher_type,type_teacher,  professional , udise_staffreg.appointed_subject,subject, mbl_nmbr,promo_eligible, email_id,  e_prsnt_distrct ,(select max(dates) from teacher_regu_dates WHERE teacher_regu_dates.teacher_id=udise_staffreg.teacher_code LIMIT 1) as regularisation_date,teachers_promotion_eligible.doj_block,teachers_promotion_eligible.id as trans_id,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3
            from udise_staffreg
			left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id
			left join teacher_type on teacher_type.id =udise_staffreg.teacher_type
			left join teacher_dates on teacher_dates.school_key_id = udise_staffreg.school_key_id
			left join teacher_panel_subject on teacher_panel_subject.app_sub =udise_staffreg.appointed_subject
            left join teachers_promotion_eligible on teachers_promotion_eligible.school_key_id = udise_staffreg.school_key_id and teachers_promotion_eligible.teacher_id = udise_staffreg.teacher_code
			where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and archive =1  and 
            udise_staffreg.school_key_id = ".$school_id." and teacher_type.category =1 group by teacher_code";
			  $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
	}		
     public function panel_block_school($dist_id,$pan,$blk,$sch)
	 {
	$sql="select school_key_id, teacher_transfer_appli.udise_code, teacher_id, name, dob,desgnation,teacher_transfer_appli.subject,medium,teacher_transfer_appli.panel_type, block, teacher_transfer_appli.edu_dist, district, doj_pr, doj_pr_schol,  transfer,panchayat_sch,municipal_sch,students_school_child_count.school_name,teacher_transfer_appli.school_type,students_school_child_count.block_name,type_teacher,teacher_panel_subject.subject as sub
from teacher_transfer_appli 
join teachers_dee_deploy_rules on 
 teachers_dee_deploy_rules.block_id=teacher_transfer_appli.block
 join teacher_panel_schools on teacher_panel_schools.school_id =teacher_transfer_appli.school_key_id
  join students_school_child_count on students_school_child_count .school_id = teacher_transfer_appli.school_key_id
join teacher_type on teacher_type.id = teacher_transfer_appli.desgnation
 join teacher_panel_subject on teacher_panel_subject.app_sub =teacher_transfer_appli.subject
 where teacher_transfer_appli.district = ".$dist_id ." and teacher_transfer_appli.panel_type =".$pan."  and  block =".$blk." and teacher_transfer_appli.school_type = ".$sch."";
   $query = $this->db->query($sql);
         // print_r($this->db->last_query());
        return $query->result();
	 }


   public function teacher_panel_mainpage($dist_id)
    {
      $sql="SELECT *,sum(case when status=2 then 1 else 0 end) as completed,
sum(case when status=3 then 1 else 0 end) as Relinquished,
(select designation from teacher_panel_teachtype where teacher_panel_teachtype.id= teacher_panel_mainpage.teacher_type) as des
 FROM teacher_panel_mainpage where directorate=1 group by agenda";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
      public function teacher_panel_mainpage_dse($dist_id)
    {
      $sql="SELECT *,sum(case when status=2 then 1 else 0 end) as completed,
sum(case when status=3 then 1 else 0 end) as Relinquished,
(select designation from teacher_panel_teachtype where teacher_panel_teachtype.id= teacher_panel_mainpage.teacher_type) as des
 FROM teacher_panel_mainpage where directorate=2  group by agenda";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }

    public function emis_teacher_panel_dee($dist_id,$transfer_type,$teach_type,$loc)
    {
        $t_type=$this->input->get('transfer_type')=='3'?'teacher_panel_transfers.new_desig':'teacher_panel_transfers.designation';
      $sql="select (case when designation=102 then (select name from teacher_panel_beotransfer where teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id limit 1) else
case when designation in (11,41,26,27,28,29,36) then (select teacher_name from udise_staffreg where udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id limit 1) end
 end) as teacher_name,teacher_id,
 (select type_teacher from teacher_type WHERE teacher_type.id=teacher_panel_transfers.designation LIMIT 1) AS des,
 (select subjects from teacher_subjects WHERE teacher_subjects.id=teacher_panel_transfers.subject LIMIT 1) AS sub,
(select school_name from students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.school_key_id LIMIT 1) AS school,
(select type_teacher from teacher_type WHERE teacher_type.id=teacher_panel_transfers.new_desig LIMIT 1) AS new_des,
(select subject from teacher_panel_subject WHERE teacher_panel_subject.sub_code=teacher_panel_transfers.new_subject LIMIT 1) AS new_sub,
(select school_name from students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.new_school_key_id LIMIT 1) AS new_school,
(select block2 from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS old_block,
(select district_name from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS district,

(select block2 from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.new_block LIMIT 1) AS new_block
 from teacher_panel_transfers 
left join udise_staffreg on udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id
left join teacher_panel_beotransfer on teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id
join students_school_child_count on students_school_child_count.school_id=teacher_panel_transfers.school_key_id 
where students_school_child_count.district_id=".$dist_id." AND ".$t_type."=".$transfer_type." and teacher_panel_transfers.designation=".$teach_type." AND teacher_status".$loc."=2";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
   public function emis_teacher_panel_dse($dist_id,$transfer_type,$teach_type,$loc)
    {
       $t_type=$this->input->get('transfer_type')=='3'?'teacher_panel_transfers.new_desig':'teacher_panel_transfers.designation';

      $sql="select (case when designation=102 then (select name from teacher_panel_beotransfer where teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id limit 1) else
case when designation in (11,41,26,27,28,29,36) then (select teacher_name from udise_staffreg where udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id limit 1) end
 end) as teacher_name,teacher_id,
 (select type_teacher from teacher_type WHERE teacher_type.id=teacher_panel_transfers.designation LIMIT 1) AS des,
 (select subjects from teacher_subjects WHERE teacher_subjects.id=teacher_panel_transfers.subject LIMIT 1) AS sub,
(select school_name from students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.school_key_id LIMIT 1) AS school,
(select type_teacher from teacher_type WHERE teacher_type.id=teacher_panel_transfers.new_desig LIMIT 1) AS new_des,
(select subject from teacher_panel_subject WHERE teacher_panel_subject.sub_code=teacher_panel_transfers.new_subject LIMIT 1) AS new_sub,
(select school_name from students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.new_school_key_id LIMIT 1) AS new_school,
(select block2 from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS old_block,
(select district_name from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS district,

(select block2 from teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.new_block LIMIT 1) AS new_block
 from teacher_panel_transfers 
left join udise_staffreg on udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id
left join teacher_panel_beotransfer on teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id
join students_school_child_count on students_school_child_count.school_id=teacher_panel_transfers.school_key_id 
where students_school_child_count.district_id=".$dist_id." AND  teacher_panel_transfers.transfer_type=".$transfer_type." and ".$t_type."=".$teach_type." AND teacher_status".$loc."=2";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
	//teacher transfer Delete by raj
	  public function trans_delete($data)
			{
// print_r($data);
			$result = $this->db->get_where('teacher_transfer_appli',array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']))->first_row();
			//print_r($result);
			 
			if(!empty($result))
			{
				
		$this->db->where(array('teacher_id'=>$data['teacher_id'],'school_key_id'=>$data['school_key_id']));
			
		$this->db->update('teacher_transfer_appli',$data);

			return $data['school_key_id'];

			}else
			{
				
			$this->db->insert('teacher_transfer_appli',$data);
			return $this->db->insert_id();
			}
				 
			}
			function get_state_teacher_timetable_report($dist_id,$schooltype,$teachertype,$periods,$firstday,$lastday)
{
	if($schooltype==1)
          {
               $SQL="SELECT count(PT) as teacher_count , udise_staffreg.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
join students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id 
WHERE timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."' AND students_school_child_count.district_id=".$dist_id." AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School')
 GROUP BY teacher_name  having teacher_count <='".$periods."'
UNION ALL
SELECT count(PT) as teacher_count, teacher_volunteers_subjects.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
join students_school_child_count on students_school_child_count.school_id=teacher_volunteers_subjects.school_key_id
WHERE  timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."'  AND students_school_child_count.district_id=".$dist_id." AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School')
 GROUP BY teacher_name having teacher_count <='".$periods."';";
           }
		  else
		  {
			  
			  $SQL="SELECT count(PT) as teacher_count, udise_staffreg.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name ,subjects FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
JOIN teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
join students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id 
WHERE timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."' AND students_school_child_count.district_id=".$dist_id." AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') GROUP BY teacher_name having teacher_count <='".$periods."' 
UNION ALL
SELECT count(PT) as teacher_count, teacher_volunteers_subjects.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,subjects FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
JOIN teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
join students_school_child_count on students_school_child_count.school_id=teacher_volunteers_subjects.school_key_id
WHERE  timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."' AND students_school_child_count.district_id=".$dist_id." AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') GROUP BY teacher_name having teacher_count <='".$periods."';";
		   }

 $query = $this->db->query($SQL);
       return $query->result(); 	
}
			
			//surplus Report BT teacher subject wise Total by raj 
			
			public function bt_teacher_sub_tot($dist_id)
			{
			 $sql="select sum(case when desgnation =11 and subject =48 then 1 else 0 end) as tamil,
				  sum(case when  desgnation =11 and subject =46 then 1 else 0 end) as english,
				  sum(case when  desgnation =11 and  subject =3 then 1 else 0 end) as maths,
			      sum(case when  desgnation =11 and subject =7 then 1 else 0 end) as sc,
		           sum(case when  desgnation =11 and  subject =8 then 1 else 0 end) as ss,
		school_id from teacher_transfer_appli  
		 join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
		 join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)  and teacher_transfer_appli.district=".$dist_id."";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
        }
		public function  bt_teacher_sub_wise_report($dist_id,$where)
		{
		$sql ="
		select teacher_transfer_appli.school_key_id,teacher_transfer_appli.block, students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,doj_dept,teacher_transfer_appli.seniority_district,teacher_subjects.subjects,staff_dob,teacher_transfer_appli.subject as sub_id , 
if(udise_staffreg.staff_pjoin < teacher_transfer_appli.doj_dept,teacher_transfer_appli.doj_dept, udise_staffreg.staff_pjoin) as depdate from teacher_transfer_appli join students_school_child_count on students_school_child_count.school_id=teacher_transfer_appli.school_key_id join udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33) and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id." and teacher_transfer_appli.desgnation=11 and teacher_transfer_appli.subject= ".$where."  group by teacher_transfer_appli.teacher_id order BY depdate,staff_dob ASC";
		
		
		 $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
		}
		
		  public function save_surplus_rank($data)
			{
// print_r($data);
			$result = $this->db->get_where('teacher_transfer_appli',array('school_key_id'=>$data['school_key_id'],'teacher_id'=>$data['teacher_id']))->first_row();
			//print_r($result);
			 
			if(!empty($result))
			{
				
		$this->db->where(array('teacher_id'=>$data['teacher_id'],'school_key_id'=>$data['school_key_id']));
			
		$this->db->update('teacher_transfer_appli',$data);

			return $data['school_key_id'];

			}else
			{
				
			$this->db->insert('teacher_transfer_appli',$data);
			return $this->db->insert_id();
			}
				 
			}
			// function getallteachertranshistory($dist_id,$filter1,$filter2){
	  // $sql ="
		// select teacher_name,a.school_name as old,teacher_trans_history.trans_date, b.school_name as newschool,office_name,udise_staffreg.u_id as staff_id,udise_offreg.tamil_name from teacher_trans_history 
// left join udise_staffreg on udise_staffreg.u_id = teacher_trans_history.staff_id
// left join students_school_child_count a on a.udise_code=teacher_trans_history.from_schl 
// left join students_school_child_count b on b.udise_code=teacher_trans_history.to_schl 

// left join  udise_offreg on udise_offreg.off_key_id = teacher_trans_history.to_schl_keyid where a.district_id=".$dist_id." and teacher_trans_history.trans_date BETWEEN '".$filter1."' AND '".$filter2."'";
		
		
		 // $query = $this->db->query($sql);
         // return $query->result();
	// }

    function getallteachertranshistory1($dist_id,$filter1,$filter2){
		// print_r($dist_id);
		// print_r($filter1);
		// print_r($filter2);
		// die();
	 $sql ="
		select teacher_name,a.school_name as old,teacher_trans_history.trans_date, b.school_name as newschool,d.office_name,udise_staffreg.u_id as staff_id,c.tamil_name,d.office_user from teacher_trans_history 
left join udise_staffreg on udise_staffreg.u_id = teacher_trans_history.staff_id
left join students_school_child_count a on a.udise_code=teacher_trans_history.from_schl 
left join students_school_child_count b on b.udise_code=teacher_trans_history.to_schl
 
left join  udise_offreg c on c.off_key_id= teacher_trans_history.to_schl_keyid
left join  udise_offreg d on d.district_id= teacher_trans_history.user_type_id and d.office_type_id= teacher_trans_history.user_type_id 
   where  d.district_id=".$dist_id." and teacher_trans_history.trans_date BETWEEN '".$filter1."' AND '".$filter2."'
   group by udise_staffreg.u_id";
		 $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
	}
	function gtealltransferes($dist_id){
		
		$this->db->select('id,district_name'); 
		$this->db->from('schoolnew_district');
		$this->db->where('id',$dist_id);
		  
		$query = $this->db->get();
		return $query->result();
	}

public function emis_computerindent_laptop($dist)
  {
    $sql="select sc.district_name,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,school_type,(c11_b+c11_g+c11_t) as Class11_Enr,sum(st.class_studying_id=11 and ci.scheme_id=11) as Class11_dist,(c12_b+c12_g+c12_t) as Class12_Enr,sum(st.class_studying_id=12 and ci.scheme_id=11) as Class12_dist  from students_school_child_count sc left join students_child_detail st on st.school_id=sc.school_id left join schoolnew_computerindent ci on ci.student_id=st.id where st.class_studying_id in (11,12) and sc.school_type_id in (1,2) and ci.isactive=1 and sc.district_id=".$dist." group by sc.udise_code";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
  }
  public function get_teacher_code($teacherid)
	{
	$sql="SELECT teacher_code,u_id,teacher_name,school_key_id,aadhar_no,email_id,mbl_nmbr,academic,professional,e_ug,e_pg,gender,staff_dob,staff_join,subject1,subject2,subject3 from udise_staffreg where u_id=".$teacherid."";
    $query = $this->db->query($sql);
    return $query->result();	
	}
  public function teacher_transfer($savetransfer)
	{
		$this->db->insert('teacher_trans_history',$savetransfer); 
     return $this->db->insert_id();	
	}
	public function transfer_teacher_debutation($savetransfer_debuted)
	{
	 $this->db->insert('teacherdepute_entry',$savetransfer_debuted); 
     return $this->db->insert_id();	
	}
	public function save_debut_in_volunteers($savevolunteers)
	{
		
	 $this->db->insert('teacher_volunteers',$savevolunteers); 
     return $this->db->insert_id();	
	}
	public function save_debut_in_volunteers_sub($savevolunteers_sub)
	{
	 $this->db->insert('teacher_volunteers_subjects',$savevolunteers_sub); 
     return $this->db->insert_id();	
	}
	public function update_flag($teacherid,$debuted)
	{
	$this->db->where('u_id',$teacherid);
	return $this->db->update('udise_staffreg',$debuted); 	
	}
	public function update_school_key_id($teacheruid,$updateschool_key_id)
	{
	$this->db->where('u_id',$teacheruid);
	return $this->db->update('udise_staffreg',$updateschool_key_id);	
	}
	
	 public function trans_off_transfer($dist)
 {
	 $sql = "select district_id,office_type,office_name from udise_offreg where district_id=".$dist."" ;
	  $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
 }
 public function emis_staff_from_to_trans_block_count($dist,$fdate,$tdate)
 {
	 	 if($fdate !='1970-01-01' and $fdate !=' ')
		{
			$where = "and teacher_trans_history.trans_date between '".$fdate."' and  '".$tdate."'";
		}
		else{
			$where = ' '; 
		}
	  $sql = " select from_schl, from_schl_keyid, to_schl, to_schl_keyid, staff_id, transferer_id, user_type_id,teacher_trans_history.trans_date, from_scl_dist, to_scl_dist, transferer,  from_teachertype, to_teachertype, trans_type,a.cate_type,a.school_name as oldschool,b.school_name as newschool,from_block,to_block,
SUM(CASE WHEN from_schl  != to_schl and from_scl_dist = to_scl_dist and from_block = to_block  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School')  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as withinblock,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist = to_scl_dist and from_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as   blocktoblock,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist != to_scl_dist and from_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as disttodist,
 SUM(CASE WHEN  to_schl =0  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as school_off,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist != to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School') THEN 1 ELSE 0 END ELSE 0 END) as dsedisttodist,
 SUM(CASE WHEN from_schl  != to_schl and to_block != ' ' and from_scl_dist = to_scl_dist  THEN CASE WHEN staff_id and( a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dseblocktoblock
from teacher_trans_history 
left join udise_staffreg on teacher_trans_history.staff_id =udise_staffreg.u_id
left join students_school_child_count a on a.udise_code=teacher_trans_history.from_schl 
left join students_school_child_count b on b.udise_code=teacher_trans_history.to_schl 
where teacher_trans_history.trans_date >= '2019-07-15'  and from_scl_dist= '".$dist."'
  ".$where." group by from_block" ;
	  $query = $this->db->query($sql);
           // print_r($this->db->last_query());
        return $query->result();
	 
	 
	 
	 
	 
 }
 public function dist($dist){
	 $sql="SELECT  district_id, district_name FROM districtnew_basicinfo where district_id =".$dist."";
	 	  $query = $this->db->query($sql);
         // print_r($this->db->last_query());
        return $query->result();
 }
 	function getallteachertranshistory($block,$fdate,$tdate)
	{
	  
	  	 if($fdate !='1970-01-01' and $fdate !=' ')
		{
			$where = "and teacher_trans_history.trans_date between '".$fdate."' and  '".$tdate."'";
		}
		else{
			$where = ' '; 
		}
			$sql=" select from_schl, from_schl_keyid, to_schl, to_schl_keyid, staff_id, transferer_id, user_type_id,teacher_trans_history.trans_date, from_scl_dist, to_scl_dist, transferer,  from_teachertype, to_teachertype,teacher_name,from_block, trans_type,a.cate_type,a.school_name as oldschool,b.school_name as newschool,type_teacher,
SUM(CASE WHEN from_schl  != to_schl and from_scl_dist = to_scl_dist and from_block = to_block  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School')  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as withinblock,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist = to_scl_dist and from_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as   blocktoblock,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist != to_scl_dist and from_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School' )THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as disttodist,
 SUM(CASE WHEN  to_schl =0  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as school_off,
 SUM(CASE WHEN from_schl  != to_schl and from_scl_dist != to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dsedisttodist,
 SUM(CASE WHEN from_schl  != to_schl and to_block != ' ' and from_scl_dist = to_scl_dist  THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dseblocktoblock
from teacher_trans_history 
left join udise_staffreg on teacher_trans_history.staff_id =udise_staffreg.u_id
join teacher_type on teacher_type.id=udise_staffreg.teacher_type
left join students_school_child_count a on a.udise_code=teacher_trans_history.from_schl 
left join students_school_child_count b on b.udise_code=teacher_trans_history.to_schl 
where teacher_trans_history.trans_date >= '2019-07-15' and from_block= '".$block."'
  ".$where."  group by staff_id ";
		
		
		 $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
	}
	
	//indent summary raj
	public function uniform_indentboy($scheme,$dist,$set,$blk,$school,$class,$tname)
	{
			// echo $scheme;
			// echo '----';
			// echo $school;
	    if(!empty($blk))
		{
			$d="school_name,";
			if($set == 0)
			{   
		    $s = "  " ;
			$schol =" ";
			}
			else if($school !=1)
			{	
			$s = "and sets=".$set."";
			$schol ="  " ;
			
			}else{ 
			$schol ="and hill_frst  in (".$school.")" ;
			$s = "and sets=".$set."";
			
			}
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else if(!empty($scheme))
		{    
	        $s = "  " ;
			$schol =" ";
			$d =" students_school_child_count.block_id,block_name,"; 
			$where ="group by students_school_child_count.block_id order by block_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.block_id,block_name,"; 
			$s = "and sets=".$set."";
			if($school ==1){
			$schol ="and hill_frst  in (".$school.")" ;
			}else{ $schol ="  " ;}
		
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
    $sql="select ".$d.$tname.".scheme_id,sets,hill_frst,
    SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE IV' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE V' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='SIZE VI' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS bset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS bset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS bset10_count
  from  students_child_detail
JOIN   ".$tname." ON  ".$tname.".student_id = students_child_detail.id and ".$tname.".school_id =students_child_detail.school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
   join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id =students_child_detail.school_id
     JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
 where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." ".$class." ".$where ."  ";



		$query = $this->db->query($sql);
	    // print_r($this->db->last_query());
			return $query->result();
	}
		public function uniform_indentgirl($scheme,$dist,$set,$blk,$school,$class,$tname)
	{
		   if(!empty($blk))
		{
			$d="school_name,";
			if($set == 0)
			{   
		    $s = "  " ;
			$schol =" ";
			}
			else if($school !=1)
			{	
			$s = "and sets=".$set."";
			$schol ="  " ;
			
			}else{ 
			$schol ="and hill_frst  in (".$school.")" ;
			$s = "and sets=".$set."";
			
			}
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else if(!empty($scheme))
		{    
	        $s = "  " ;
			$schol =" ";
			$d =" students_school_child_count.block_id,block_name,"; 
			$where ="group by students_school_child_count.block_id order by block_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.block_id,block_name,"; 
			$s = "and sets=".$set."";
			if($school ==1){
			$schol ="and hill_frst  in (".$school.")" ;
			}else
			{ $schol =" " ;}
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		$sql="select ".$d.$tname.".scheme_id,sets,hill_frst,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END END ) AS girls_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS gset1_count, 
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS gset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS gset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE IV' THEN 1 ELSE 0 END END ) AS gset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE V' THEN 1 ELSE 0 END END ) AS gset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS gset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VI' THEN 1 ELSE 0 END END ) AS gset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS gset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS gset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS gset10_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=3 THEN 1 ELSE 0 END END ) AS trans_count
  from  students_child_detail
JOIN   ".$tname." ON  ".$tname.".student_id = students_child_detail.id and ".$tname.".school_id =students_child_detail.school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
   join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id =students_child_detail.school_id
     JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." ".$class." ".$where ." ";
// where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." and ( school_type_id = 1 or school_type_id =2 ) and( cate_type = 'Primary School' or cate_type = 'Middle School') ".$where ." ";
 // echo $sql;
		$query = $this->db->query($sql);
			return $query->result();
	}
	
	public function footwear_indentboy($scheme,$dist,$blk)
	{  
	   if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
	 	
		else{
			$scheme =2;
			$d =" students_school_child_count.block_id,block_name,"; 
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS bset15_count

 from  students_child_detail
JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id
   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
where  schoolnew_schemeindent.scheme_id=".$scheme."  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null and schoolnew_schemeindent.isactive =1  and  students_school_child_count.district_id = ".$dist."  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 )and( cate_type = 'Primary School' or cate_type = 'Middle School') 
  ".$where." ";
  $query = $this->db->query($sql);
  // print_r($this->db->last_query());
			return $query->result();
	}
	
	public function footwear_indentsgirl($scheme,$dist,$blk)
	{
		 if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
			$scheme =2;
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS gset1_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS gset2_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS gset3_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS gset4_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS gset5_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS gset6_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS gset7_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS gset8_count,

			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS gset9_count,

			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS gset10_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS gset11_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS gset12_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS gset13_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS gset14_count,
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS gset15_count
			from  students_child_detail
           JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and      schoolnew_schemeindent.school_id =students_child_detail.school_id
			JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
			JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
			where  schoolnew_schemeindent.scheme_id=".$scheme."  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null and schoolnew_schemeindent.isactive =1  and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."   and ( school_type_id =1 or school_type_id =2 ) 
			 and( cate_type = 'Primary School' or cate_type = 'Middle School') ".$where."";
			 
			  $query = $this->db->query($sql);
				//print_r($this->db->last_query());
			  return $query->result();
			
	}
	
	public function bag_indent($dist,$blk)
	{
			
		if(!empty($blk))
		{
			// echo $size;
			$d="school_name,";
			
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
	   
		else{
		
			$d =" students_school_child_count.block_id,block_name,"; 
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
	
	
		
	    $sql="select ".$d."

   
       sum(if(class_studying_id =1,1,0)) as c1,
       sum(if(class_studying_id =2,1,0)) as c2,
       sum(if(class_studying_id =3,1,0)) as c3,
       sum(if(class_studying_id =4,1,0)) as c4,
       sum(if(class_studying_id =5,1,0)) as c5,
       sum(if(class_studying_id =6,1,0)) as c6,
       sum(if(class_studying_id =7,1,0)) as c7,
       sum(if(class_studying_id =8,1,0)) as c8
     
       from students_child_detail  
     
       JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
     
       where   class_studying_id >= 1 and  class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."   and( cate_type = 'Primary School' or cate_type = 'Middle School')  ".$where." ";
	   

           $query = $this->db->query($sql);
           // print_r($this->db->last_query());
            return $query->result();
	}
			
	  public function crayan_indent($blk,$dist)
	  {
				
	    if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." 
		sum(if(class_studying_id =1,1,0)) as c1,
		 sum(if(class_studying_id =2,1,0)) as c2 
		 from students_child_detail 
		 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where  class_studying_id >= 1 and class_studying_id <= 2  and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."  and( cate_type = 'Primary School' or cate_type = 'Middle School') ".$where." ";
		
		  $query = $this->db->query($sql);
		   // print_r($this->db->last_query());
          return $query->result();
	 }
	 
	 public function colorpencil_indent($dist,$blk)
	 {
		if(!empty($blk))
		    {
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		   }
		
		else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		    }
		
		 $sql="select ".$d." 
		 sum(if(class_studying_id =3,1,0)) as c1,
		 sum(if(class_studying_id =4,1,0)) as c2,
		 sum(if(class_studying_id =5,1,0)) as c3
		 from students_child_detail 
		
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where  class_studying_id >= 3 and class_studying_id <= 5  and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist." and( cate_type = 'Primary School' or cate_type = 'Middle School')  ".$where." ";
		
		  $query = $this->db->query($sql);
		   // print_r($this->db->last_query());
            return $query->result();
			}
	    public function geomentry_indent($dist,$blk)
		{
		  if(!empty($blk))
		    {
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		    }
		
		    else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		    }
		
		 $sql="select ".$d." 
		 sum(if(class_studying_id =6,1,0)) as c1,
	     sum(if(class_studying_id =7,1,0)) as c2,
		 sum(if(class_studying_id =8,1,0)) as c3
		 from students_child_detail 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where class_studying_id >= 6 and class_studying_id <= 8 and( school_type_id =1 or school_type_id =2 )  and  students_school_child_count.district_id = ".$dist." and( cate_type = 'Primary School' or cate_type = 'Middle School') ".$where." ";
		  
		  $query = $this->db->query($sql);
          return $query->result();
		}
		
		public function atlas_indent($dist,$blk)
		{
			if(!empty($blk))
			{
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
			}
			else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
			}	
		
		 $sql="select ".$d." 
		 sum(if(class_studying_id =6,1,0)) as c1,
		 sum(if(class_studying_id =7,1,0)) as c2,
		 sum(if(class_studying_id =8,1,0)) as c3
		 from students_child_detail 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where class_studying_id >= 6 and class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist." and( cate_type = 'Primary School' or cate_type = 'Middle School') ".$where." ";
		 // echo $sql;
		 $query = $this->db->query($sql);
         return $query->result();
			}
			
	// public function lap_indent($scheme,$dist,$blks,$flag,$class)
	// {
		// // echo $flag;
		 // // die;	// echo $flag;
		 // // die;
		
		// if(!empty($blk))
			// {
			// $d="school_name,";
			// $where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
			// }
			// else{
			// $scheme =11;
			// $d ="students_school_child_count.block_id,block_name,";
			// $where  ="group by students_school_child_count.block_id order by block_name asc"; 
			// }
		 // if($class == " " )
		// {
			 // $fla = " ";
		   // $clas =  " ";
		// }	
        // else if($class == 12 || $class ==11 )
		// {
			// $fla = "and transfer_flag =".$flag."";
			// $clas = "and class_studying_id =".$class." ";
		// }
		// else
		// { 
	       // $fla = " ";
		   // $clas =  " ";
	    // }			
		// $sql="select ".$d."schoolnew_schemeindent.scheme_id, transfer_flag,
		// sum(if(class_studying_id =11,1,0)) as c11, sum(if(class_studying_id =12,1,0)) as c12
		// from students_child_detail 
		// JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id =students_child_detail.id 
		// JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id 
		// where distribution_date is null and schoolnew_schemeindent.scheme_id=".$scheme."  and ( school_type_id =1 or school_type_id =2 ) ".$fla."  ".$clas." and students_school_child_count.district_id =".$dist."  ".$where."";
		
		 // echo $sql;
	
		// $query = $this->db->query($sql);
		 // // print_r($this->db->last_query());
         // return $query->result();
	// }
    public function desuniform_indentboy($scheme,$dist,$set,$blk,$school,$class,$tname)
	{
	    if(!empty($blk))
		{
			$d="school_name,";
			if($set == 0)
			{   
		    $s = "  " ;
			$schol =" ";
			}
			else if($school !=1)
			{	
			$s = "and sets=".$set."";
			$schol =" " ;
			
			}else{ 
			$schol ="and hill_frst  in (".$school.")" ;
			$s = "and sets=".$set."";
			
			}
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else if(!empty($scheme))
		{    
	        $s = "  " ;
			$schol =" ";
			$d =" students_school_child_count.block_id,block_name,"; 
			$where ="group by students_school_child_count.block_id order by block_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.block_id,block_name,"; 
			$s = "and sets=".$set."";
			if($school ==1){
			$schol ="and hill_frst  in (".$school.")" ;
			}else{ $schol ="  " ;}
		
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		$sql="select ".$d.$tname.".scheme_id,sets,hill_frst,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS bset1_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS bset2_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS bset3_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE IV' THEN 1 ELSE 0 END END ) AS bset4_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE V' THEN 1 ELSE 0 END END ) AS bset5_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS bset6_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='SIZE VI' THEN 1 ELSE 0 END END ) AS bset7_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS bset8_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS bset9_count,
		SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS bset10_count
		from  students_child_detail
        JOIN   ".$tname." ON  ".$tname.".student_id = students_child_detail.id and ".$tname.".school_id =students_child_detail.school_id
		JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id =students_child_detail.school_id
		JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
    where  ".$tname.".scheme_id =".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and ".$tname.".isactive =1  and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." ".$class." ".$where ."  ";
    // where  ".$tname.".scheme_id =".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and ".$tname.".isactive =1  and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." and ( school_type_id =1 or school_type_id =2 )and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where ."  ";

		$query = $this->db->query($sql);
	   // print_r($this->db->last_query());
		return $query->result();
	}
		
		
	public function desuniform_indentgirl($scheme,$dist,$set,$blk,$school,$class,$tname)
	{
		if(!empty($blk))
		{
			$d="school_name,";
			if($set == 0)
			{   
		    $s = "  " ;
			$schol =" ";
			}
			else if($school !=1)
			{	
			$s = "and sets=".$set."";
			$schol =" " ;
			
			}else{ 
			$schol ="and hill_frst  in (".$school.")" ;
			$s = "and sets=".$set."";
			
			}
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else if(!empty($scheme))
		{    
	        $s = "  " ;
			$schol =" ";
			$d =" students_school_child_count.block_id,block_name,"; 
			$where ="group by students_school_child_count.block_id order by block_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.block_id,block_name,"; 
			$s = "and sets=".$set."";
			if($school ==1){
			$schol ="and hill_frst  in (".$school.")" ;
			}else{ $schol =" " ;}
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		    }
		    $sql="select ".$d.$tname.".scheme_id,sets,hill_frst,

			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END END ) AS girls_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS gset1_count, 
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS gset2_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS gset3_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE IV' THEN 1 ELSE 0 END END ) AS gset4_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE V' THEN 1 ELSE 0 END END ) AS gset5_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS gset6_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VI' THEN 1 ELSE 0 END END ) AS gset7_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS gset8_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS gset9_count,
			SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS gset10_count,
            SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=3 THEN 1 ELSE 0 END END ) AS trans_count
			from  students_child_detail
            JOIN   ".$tname." ON  ".$tname.".student_id = students_child_detail.id and ".$tname.".school_id =students_child_detail.school_id
			JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
			 join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id =students_child_detail.school_id
			JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
      where  ".$tname.".scheme_id =".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and ".$tname.".isactive =1  and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." ".$class." ".$where ." ";
      // where  ".$tname.".scheme_id =".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and ".$tname.".isactive =1  and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."  ".$schol." and ( school_type_id =1 or school_type_id =2 ) and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where ." ";

		    $query = $this->db->query($sql);
		    // print_r($this->db->last_query());
			return $query->result();
	}
	public function desfootwear_indentboy($scheme,$dist,$blk)
	{  
	   if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
	 	
		else{
			$scheme =2;
			$d =" students_school_child_count.block_id,block_name,"; 
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS bset15_count
        from  students_child_detail
        JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id
		JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		where  schoolnew_schemeindent.scheme_id=".$scheme."  and  class_studying_id >= 1 and  class_studying_id <= 10  and distribution_date is null and  students_school_child_count.district_id = ".$dist."  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and (cate_type = 'Higher Secondary School' or  cate_type = 'High School')   ".$where." ";
	    $query = $this->db->query($sql);
		  // print_r($this->db->last_query());
	    return $query->result();
	}
	
	public function desfootwear_indentsgirl($scheme,$dist,$blk)
	{
		 if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
			$scheme =2;
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS gset1_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS gset2_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS gset3_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS gset4_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS gset5_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS gset6_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS gset7_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS gset8_count,
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS gset9_count,
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS gset10_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS gset11_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS gset12_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS gset13_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS gset14_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS gset15_count
		from  students_child_detail
         JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		 where  schoolnew_schemeindent.scheme_id=".$scheme."  and  class_studying_id >= 1 and  class_studying_id <= 10  and distribution_date is null and transfer_flag =0 and  students_school_child_count.district_id = ".$dist."   and ( school_type_id =1 or school_type_id =2 ) 
		 and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where."";
			 
			  $query = $this->db->query($sql);
				//print_r($this->db->last_query());
			  return $query->result();
			
	}
	public function desbag_indent($dist,$blk)
	{
			
		if(!empty($blk))
		{
			// echo $size;
			$d="school_name,";
			
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
	   
		
		else{
			
			$d =" students_school_child_count.block_id,block_name,"; 
			
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
	
		
	    $sql="select ".$d." 
   
       sum(if(class_studying_id =1,1,0)) as c1,
       sum(if(class_studying_id =2,1,0)) as c2,
       sum(if(class_studying_id =3,1,0)) as c3,
       sum(if(class_studying_id =4,1,0)) as c4,
       sum(if(class_studying_id =5,1,0)) as c5,
       sum(if(class_studying_id =6,1,0)) as c6,
       sum(if(class_studying_id =7,1,0)) as c7,
       sum(if(class_studying_id =8,1,0)) as c8,
       sum(if(class_studying_id =9,1,0)) as c9,
       sum(if(class_studying_id =10,1,0)) as c10,
       sum(if(class_studying_id =11,1,0)) as c11,
       sum(if(class_studying_id =12,1,0)) as c12
       from students_child_detail  
      
       JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
       
       where   class_studying_id >= 1 and  class_studying_id <= 12 and ( school_type_id =1 or school_type_id =2 )   and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School')  ".$where." ";
	   

           $query = $this->db->query($sql);
           // print_r($this->db->last_query());
            return $query->result();
	}
	
	
	
   public function stud_community_report($dist,$school_type,$cate_type)
  {
    //print_r($school_cate);
  $this->db->SELECT('scc.school_id, scc.community_code,students_school_child_count.district_name,
    SUM(scc.Prkg_b+scc.Prkg_g) AS prekg_t ,
    SUM(scc.lkg_b+scc.lkg_g) AS lkg_t,
    SUM(scc.ukg_b + scc.ukg_g) AS ukg_t,
    SUM(scc.c1_b+scc.c1_g) AS c1,
    SUM(scc.c2_b+scc.c2_g) AS c2,
    SUM(scc.c3_b+scc.c3_g) AS c3,
    SUM(scc.c4_b+scc.c4_g) AS c4,
    SUM(scc.c5_b+scc.c5_g) AS c5,
    SUM(scc.c6_b+scc.c6_g) AS c6,
    SUM(scc.c7_b+scc.c7_g) AS c7,
    SUM(scc.c8_b+scc.c8_g) AS c8,
    SUM(scc.c9_b+scc.c9_g) AS c9,
    SUM(scc.c10_b+scc.c10_g) AS c10,
    SUM(scc.c11_b+scc.c11_g) AS c11,
    SUM(scc.c12_b+scc.c12_g) AS c12,
    SUM(scc.total_b+scc.total_g) AS total, community_name')
  ->FROM('students_community_school_count AS scc')
  ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
  ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
  ->where('district_id',$dist);
   if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->where('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->where('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->where_in('students_school_child_count.cate_type',$cate_type);
          }
   $this->db->GROUP_BY('community_name');
      $query =  $this->db->get();
     // print_r($this->db->last_query());
       return $query->result();
      }
  public function stud_community_report_dist($community_name,$school_type,$cate_type)
            {

                $this->db->select('students_school_child_count.district_name,scc.school_id, scc.community_code,community_name,
    SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total, community_name')
                  ->from('students_community_school_count AS scc')
                  ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                  ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                  ->where('community_name',$community_name);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
                  $this->db->group_by('district_name');
                  // return $result;
                  $result = $this->db->get()->result();
               //     print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
             public function stud_community_report_blk($dist_id,$community_name,$school_type,$cate_type)
            {

                $this->db->select('students_school_child_count.block_name,scc.school_id, scc.community_code,community_name,
    SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total, community_name')
                  ->from('students_community_school_count AS scc')
                  ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                  ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                  ->where('community_name',$community_name)
                  ->where('district_name',$dist_id);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
               //     print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
              public function stud_community_report_schl($blk,$community_name,$school_type,$cate_type)
            {

                $this->db->select('students_school_child_count.block_name,students_school_child_count.school_name,scc.school_id, scc.community_code,community_name,
    SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total, community_name')
                  ->from('students_community_school_count AS scc')
                  ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                  ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                  ->where('community_name',$community_name)
                  ->where('block_name',$blk);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->where_in('school_type',$school_type);
          }else
          {
            $this->db->where('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->where_in('cate_type',$cate_type);
          }
                  $this->db->group_by('school_name');
                  // return $result;
                  $result = $this->db->get()->result();
               //     print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
	 public function descrayan_indent($blk,$dist)
	  {
				
	    if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
			// $scheme =5;
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
		$sql="select ".$d." 
		sum(if(class_studying_id =1,1,0)) as c1,
		 sum(if(class_studying_id =2,1,0)) as c2 
		 from students_child_detail 
		
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where class_studying_id >= 1 and class_studying_id <= 2 and  ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where." ";
		
		  $query = $this->db->query($sql);
		   // print_r($this->db->last_query());
          return $query->result();
	 }
	 
	 public function descolorpencil_indent($dist,$blk)
	 {
		if(!empty($blk))
		    {
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		   }
		
		else{
		
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		    }
		
		 $sql="select ".$d." 
		 sum(if(class_studying_id =3,1,0)) as c1,
		 sum(if(class_studying_id =4,1,0)) as c2,
		 sum(if(class_studying_id =5,1,0)) as c3
		 from students_child_detail 
		 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where class_studying_id >= 3 and class_studying_id <= 5  and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School')  ".$where." ";
		
		  $query = $this->db->query($sql);
		    // print_r($this->db->last_query());
            return $query->result();
			}
	    public function desgeomentry_indent($dist,$blk)
		{
		  if(!empty($blk))
		    {
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		    }
		
		    else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		    }
		
		 $sql="select ".$d."
		 sum(if(class_studying_id =6,1,0)) as c1,
	     sum(if(class_studying_id =7,1,0)) as c2,
		 sum(if(class_studying_id =8,1,0)) as c3
		 from students_child_detail 
	
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where  class_studying_id >= 6 and class_studying_id <= 8 and  ( school_type_id =1 or school_type_id =2 )  and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where." ";
		  
		  $query = $this->db->query($sql);
          return $query->result();
		}
		
		public function desatlas_indent($dist,$blk)
		{
			if(!empty($blk))
			{
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
			}
			else{
			
			$d =" students_school_child_count.block_id,block_name,";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
			}	
		
		 $sql="select ".$d." 
		 sum(if(class_studying_id =6,1,0)) as c1,
		 sum(if(class_studying_id =7,1,0)) as c2,
		 sum(if(class_studying_id =8,1,0)) as c3
		 from students_child_detail
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where class_studying_id >= 6 and class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School') ".$where." ";
		 // echo $sql;
		 $query = $this->db->query($sql);
         return $query->result();
			}
			
	public function sweater_indent($scheme,$dist,$blk,$size,$class)
	 {
		
		if(!empty($blk))
		{
			$d="school_name,";
			$sizes = "and schoolnew_schemeindent.scheme_category =".$size." ";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else if(!empty($scheme))
		{    
	        $sizes= "  " ;
			$d =" students_school_child_count.block_id,block_name,"; 
			$where ="group by students_school_child_count.block_id order by block_name asc";
		}
		
		else{
			$scheme =12;
			$d =" students_school_child_count.block_id,block_name,"; 
			$sizes ="and schoolnew_schemeindent.scheme_category = ".$size." ";
			$where  ="group by students_school_child_count.block_id order by block_name asc"; 
		}
		
	
		
	   $sql="select ".$d." schoolnew_schemeindent.scheme_id,schoolnew_schemeindent.scheme_category,
   
       sum(if(class_studying_id =1,1,0)) as c1,
       sum(if(class_studying_id =2,1,0)) as c2,
       sum(if(class_studying_id =3,1,0)) as c3,
       sum(if(class_studying_id =4,1,0)) as c4,
       sum(if(class_studying_id =5,1,0)) as c5,
       sum(if(class_studying_id =6,1,0)) as c6,
       sum(if(class_studying_id =7,1,0)) as c7,
       sum(if(class_studying_id =8,1,0)) as c8
     
       from students_child_detail  
       JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id =students_child_detail.id
       JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
       join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
	   join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id =students_child_detail.school_id 
       where  distribution_date is null and schoolnew_schemeindent.scheme_id= ".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8 and hill_frst =1 and schoolnew_schemeindent.isactive =1  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.district_id = ".$dist."  ".$class ."  ".$sizes." 
	    ".$where." ";
	   
// echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
	  }
	  
	  public function notebook($scheme)
	  {
	    $sql="select id,scheme_category from schoolnew_schemedetail where scheme_id =".$scheme."";
	    $query = $this->db->query($sql);
        return $query->result();	
      }
	  public function notes($dist,$blk,$cate,$term)
	  {
		 
		  
		  if(!empty($blk))
		{
			$d="ab.school_name,";
			$blk ="and ab.block_id =".$blk."";
			$where = "group by ab.scheme_category,ab.block_name order by ab.block_name";
		}
		
		else if(!empty($scheme))
		{    
			$d ="ab.block_id,ab.block_name,"; 
			$where ="group by ab.block_id order by block_name asc";
		}
		
		else{
		
			$d ="ab.block_id,ab.block_name,"; 
			$where ="group by ab.block_id order by block_name asc"; 
		}
		  
		  
		  
		  $sql="select ab.scheme_category,ab.cname,".$d." ab.term,
			if (ab.class_studying_id = 1,ab.tot,0) as C1,
			if (ab.class_studying_id = 2,ab.tot,0) as C2,
			if (ab.class_studying_id = 3,ab.tot,0) as C3,
			if (ab.class_studying_id = 4,ab.tot,0) as C4,
			if (ab.class_studying_id = 5,ab.tot,0) as C5,
			if (ab.class_studying_id = 6,ab.tot,0) as C6,
			if (ab.class_studying_id = 7,ab.tot,0) as C7,
			if (ab.class_studying_id = 8,ab.tot,0) as C8  
			from(select 
			aa.class_studying_id, b.scheme_category,c.scheme_category as cname,b.term,aa.num, b.count, (aa.num*b.count) tot,d.district_name,d.block_name,d.school_name,d.block_id
			from 
		    (select class_studying_id, school_id,transfer_flag,count(class_studying_id) num from
			 students_child_detail  group by class_studying_id) aa
			join  schoolnew_notebooks_list b on aa.class_studying_id = b.class
			join schoolnew_schemedetail c on c.id = b.scheme_category
			join students_school_child_count d on  d.school_id = aa.school_id
			where b.scheme_category=".$cate." and term =".$term." and aa.transfer_flag =0 and (cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 ) and d.district_id =".$dist." 
			 group by aa.class_studying_id, b.scheme_category) ab  ".$where."";
			 // echo $sql;
            $query = $this->db->query($sql);
            return $query->result();
	  }
	  public function ankleboot($scheme,$dist,$blk,$class)
	  {
		  
		  
		if(!empty($blk))
		{
			$d="school_name,";
			$scheme =16;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
		
			$d ="block_id,block_name,"; 
			$where ="group by block_id order by block_name asc"; 
		}
		  
		  $sql ="
        select schoolnew_schemeindent.scheme_id,".$d."
			SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Small:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Small:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category ='Small:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Small:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category= 'Small:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Small:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category='Medium:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Medium:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category ='Medium:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category = 'Large:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Large:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Large:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Large:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category = 'Large:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count
		
       from  students_child_detail
       JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id
		JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		where  schoolnew_schemeindent.scheme_id= ".$scheme."  and students_school_child_count.district_id= ".$dist." and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
		 // echo $sql;
            $query = $this->db->query($sql);
            return $query->result();
	  }
	  public function socks_indent($scheme,$dist,$blk,$class)
	  {
		  if(!empty($blk))
		{
			$d="school_name,";
			$scheme =17;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
		
			$d ="block_id,block_name,"; 
			$where ="group by block_id order by block_name asc"; 
		}
		  
		  $sql ="
          select schoolnew_schemeindent.scheme_id,".$d." 
		  SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'M (8-9.5)' THEN 1 ELSE 0 END END ) AS bset1_count, 
		  SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'L(9-11)' THEN 1 ELSE 0 END END ) AS bset2_count
		  from  students_child_detail
          JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id 
		  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id 
		  JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category 
		  where  schoolnew_schemeindent.scheme_id= ".$scheme."  and students_school_child_count.district_id= ".$dist." and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
			 $query = $this->db->query($sql);
            return $query->result();
	  }
	  
	  public function raincoat_indent($scheme,$dist,$blk,$class)
	  {
		   if(!empty($blk))
		{
			$d="school_name,";
			$scheme =18;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		else{
		
			$d ="block_id,block_name,"; 
			$where ="group by block_id order by block_name asc"; 
		}
		  
		 $sql ="
         select schoolnew_schemeindent.scheme_id,".$d."
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 5' THEN 1 ELSE 0 END END ) AS bset1_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 6' THEN 1 ELSE 0 END END ) AS bset2_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category ='Size 7' THEN 1 ELSE 0 END END ) AS bset3_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Size 8' THEN 1 ELSE 0 END END ) AS bset4_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Size 10' THEN 1 ELSE 0 END END ) AS bset5_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 12' THEN 1 ELSE 0 END END ) AS bset6_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category='Size 14' THEN 1 ELSE 0 END END ) AS bset7_count
		 from  students_child_detail
         JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id 
		 JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category 
		 where  schoolnew_schemeindent.scheme_id= ".$scheme."  and students_school_child_count.district_id= ".$dist." and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
		 $query = $this->db->query($sql);
         return $query->result();		  
	  }
      public function students_Dropped_out_block($dist_id) {
    $this->db->SELECT('count(*) as cnt,district_name,district_id,block_name,block_id')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->WHERE('remarks=','Dropped out')
       ->WHERE('district_id=',$dist_id)
      ->group_by('block_name');
       $query = $this->db->get();
       return $query->result();  
       
    }
    public function students_Dropped_out_school($block_id) {
    $this->db->SELECT('count(*) as cnt,district_name,district_id,block_name,block_id,school_name,school_id')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->WHERE('remarks=','Dropped out')
       ->WHERE('block_id=',$block_id)
      ->group_by('school_name');
       $query = $this->db->get();
          //print_r($this->db->last_query());
       return $query->result();  
    
    }
      public function students_Dropped_out_student_list($school_id) {
    $this->db->SELECT('students_child_detail.phone_number,name,students_child_detail.unique_id_no,students_child_detail.class_studying_id,students_school_child_count.school_name')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->JOIN('students_child_detail','students_child_detail.unique_id_no=students_transfer_history.unique_id_no')
      ->WHERE('remarks=','Dropped out')
      ->WHERE('students_school_child_count.school_id=',$school_id)
      ->group_by('students_child_detail.unique_id_no');
       $query = $this->db->get();
          //print_r($this->db->last_query());
       return $query->result();  
    
    }
	public function school_needs_csr($dist,$blk,$item,$cat,$subcate)
	{
		if(!empty($blk))
		{ 
	         if(!empty($cat) && !empty($subcate) && !empty($item))
			{
				
				$d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,mat_id,";
				$values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate." and mat_id =".$item." ";
			}
	        else if(!empty($cat) && !empty($subcate))
			{
				$d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,";
				$values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate."";
			}
			else if(!empty($cat))
			{
				$d = "csr_school_requirements.cat_id,"; 
				$values = "and csr_school_requirements.cat_id = ".$cat."";
			}
			else if(!empty($subcate))
			{
				$d="csr_school_requirements.sub_cat_id,";
				$values = "and csr_school_requirements.sub_cat_id =".$subcate."";
			}
			else if(!empty($item))
			{
				$d="mat_id,";
				$values = "and mat_id =".$item." ";
			}
			
			else{
				
				$d = " ";
				$values = " ";
			}
			$sql="select ".$d." csr_school_requirements.school_id,school_name,sum(qty)as qty,material_name,sub_cat_name,cat_name 
			     from csr_school_requirements
				 join  csr_material_master on csr_material_master.id = csr_school_requirements.mat_id
                 join  students_school_child_count on students_school_child_count.school_id  = csr_school_requirements.school_id
				 left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id
				 left join  csr_subcategory_master on csr_subcategory_master.id =  csr_school_requirements.sub_cat_id
				 where district_id = ".$dist."  and csr_school_requirements.isactive = 1   and block_id = ".$blk." 
				 ".$values."
                 group by students_school_child_count.school_id,material_name";
		}
		else
		{   
           
	       
		   if(!empty($cat) && !empty($subcate) && !empty($item))
			{
				$d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,mat_id,";
				$values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate." and mat_id =".$item." ";
			}
	        else if(!empty($cat) && !empty($subcate))
			{
				$d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,";
				$values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate."";
			}
			else if(!empty($cat))
			{
				$d = "csr_school_requirements.cat_id,"; 
				$values = "and csr_school_requirements.cat_id = ".$cat."";
			}
			else if(!empty($subcate))
			{
				$d="csr_school_requirements.sub_cat_id,";
				$values = "and csr_school_requirements.sub_cat_id =".$subcate."";
			}
			else if(!empty($item))
			{
				$d="mat_id,";
				$values = "and mat_id =".$item." ";
			}
			
			else{
				$d = " ";
				$values = " ";
			}
			$sql = "select block_id,block_name,".$d." sum(qty)as qty,count(csr_school_requirements.school_id) as school_id
				from csr_school_requirements 
				join csr_material_master on csr_material_master.id = csr_school_requirements.mat_id 
				join students_school_child_count on students_school_child_count.school_id = csr_school_requirements.school_id 
				left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id 
				left join csr_subcategory_master on csr_subcategory_master.id = csr_school_requirements.sub_cat_id
				where district_id = ".$dist." and csr_school_requirements.isactive = 1  ".$values."
				group by block_id ";
			
		}
		     // echo $sql;
			 $query = $this->db->query($sql);
             return $query->result();	
	}
	  public function  school_needs_csr_material_master()
	  {
		  $sql ="select id, material_name, cat_id, sub_cat_id, isactive from csr_material_master ";
		  $query = $this->db->query($sql);
          return $query->result();	
	  }
	  public function cate()
	  {
		 $sql ="select id, cat_name, isactive  from  csr_category_master";
		  $query = $this->db->query($sql);
          return $query->result();	  
	  }
	   public function sub_cate()
	  {
		 $sql ="select id, sub_cat_name, cat_id, isactive from  csr_subcategory_master";
		   $query = $this->db->query($sql);
           return $query->result();	  
	  }
      public function schools_with_zero_staff_profile($dist_id)
    {
     $sql ="select count(*) as tot_school,district_id,(select block_name from schoolnew_block where schoolnew_block.id=schoolnew_basicinfo.block_id) as block_name,block_id,(select district_name from schoolnew_district where schoolnew_district.id=schoolnew_basicinfo.district_id) as district_name from schoolnew_basicinfo WHERE school_id not in (select school_key_id from udise_staffreg where school_key_id in (select school_id from schoolnew_basicinfo)) and curr_stat=1 and district_id=".$dist_id." group by block_id";
       $query = $this->db->query($sql);
           return $query->result();   
    }
      public function schools_with_zero_staff($block_id)
    {
     $sql ="select school_name,udise_code,(select block_name from schoolnew_block where schoolnew_block.id=schoolnew_basicinfo.block_id) as block_name,(select school_type from students_school_child_count where students_school_child_count.school_id=schoolnew_basicinfo.school_id) as school_type,(select cate_type from students_school_child_count where students_school_child_count.school_id=schoolnew_basicinfo.school_id) as cate_type ,corr_mobile from schoolnew_basicinfo WHERE school_id not in (select school_key_id from udise_staffreg where school_key_id in (select school_id from schoolnew_basicinfo)) and curr_stat=1 and block_id=".$block_id." group by school_id";
       $query = $this->db->query($sql);
           return $query->result();   
    }
	     public function School_with_zerostaff($dist_id)
            {

                $SQL= "select count(*) as cnt,district_id,(select district_name from schoolnew_district where schoolnew_district.id=schoolnew_basicinfo.district_id) as district_name from schoolnew_basicinfo WHERE school_id not in (select school_key_id from udise_staffreg where school_key_id in (select school_id from schoolnew_basicinfo)) and curr_stat=1 and district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
             public function School_with_zero_enroll($dist_id)
            {

                $SQL= "select count(*) as cnt,block_name,district_name from students_school_child_count where total_b=0 and total_g=0 and district_id=".$dist_id."";
            $query = $this->db->query($SQL);
         //   print_r($SQL);die();
        return $query->result_array();

            }
            public function schools_with_zero_enrollment($dist_id)
    {
     $sql ="select count(*) as cnt,block_name,district_name,block_id from students_school_child_count where total_b=0 and total_g=0 and district_id=1 group by block_id";
       $query = $this->db->query($sql);
           return $query->result();   
    }
      public function schools_with_zero_enroll_schl($block_id)
    {
     $sql ="select count(*),block_name,district_name,school_name,school_type,cate_type,udise_code,(select office_mobile from schoolnew_basicinfo where schoolnew_basicinfo.school_id=students_school_child_count.school_id) as contact_no from students_school_child_count where total_b=0 and total_g=0 and block_id=".$block_id." group by school_id";
       $query = $this->db->query($sql);
           return $query->result();   
    }
     public function dge_2017_18_report_blk($dist_id)
{

   $sql ="SELECT COUNT(1) AS std_cnt,block_name,block_id,1 AS dge FROM dge_class12_2018
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE
WHERE district_id=".$dist_id." and school_type_id in (1,2,4)
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_id=".$dist_id." and school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018'
GROUP BY students_school_child_count.block_id";
 
       $query = $this->db->query($sql);

           return $query->result();   
}
 public function dge_2017_18_report_schl($block_id)
{
   $sql ="select dge_class12_2018.UDISE_CODE,count(dge_class12_2018.PER_REGNO) as PER_REGNO,(select count(*) from student_past_12_status where student_past_12_status.school_udise_code=students_school_child_count.udise_code) as assigned,(select count(PER_REGNO) from dge_class12_2018 where dge_class12_2018.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2018.udise_code from dge_class12_2018
 join student_past_12_status on student_past_12_status.school_udise_code=dge_class12_2018.UDISE_CODE
left join students_school_child_count on students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018'
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}

  public function dge_2018_19_report_blk($dist_id)
{
   $sql ="SELECT COUNT(1) AS std_cnt,block_name,block_id,1 AS dge FROM dge_class12_2019
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE
WHERE district_id=".$dist_id." and school_type_id in (1,2,4) 
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_id=".$dist_id." and school_type_id in (1,2,4)  and student_past_12_status.ac_year='2018-2019'
GROUP BY students_school_child_count.block_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function dge_2018_19_report_schl($block_id)
{
   $sql ="select dge_class12_2019.UDISE_CODE,count(dge_class12_2019.PER_REGNO) as PER_REGNO,(select count(*) from student_past_12_status where student_past_12_status.school_udise_code=students_school_child_count.udise_code  and student_past_12_status.ac_year='2018-2019') as assigned,(select count(PER_REGNO) from dge_class12_2019 where dge_class12_2019.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2019.udise_code from dge_class12_2019
 join student_past_12_status on student_past_12_status.school_udise_code=dge_class12_2019.UDISE_CODE
left join students_school_child_count on students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  and student_past_12_status.ac_year='2018-2019'
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}
	
}

   ?>