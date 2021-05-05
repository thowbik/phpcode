 <?php

class DCmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


public function get_districtName($district_id)
    	{
    		$result = $this->db->get_where('schoolnew_district',array('id'=>$district_id))->first_row();
    		// print_r($result);die;
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


public function get_districtid()
      {

      $this->db->select('district_name','id');
      $this->db->from('schoolnew_district');
      $query =  $this->db->get();
      return $query->result();
      }

    public function get_block_name($block_id)
  {
    $this->db->select('block_name')
              ->from('schoolnew_block')
              ->where('id',$block_id);
              $result = $this->db->get()->first_row();
              // print_r($this->db->last_query());
              return $result;
    
  }
  


    	

		public function get_emis_blockwise_district($district_name,$school_type,$cate_type)
		        {

		            $this->db->select('district_name,block_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
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
		              $this->db->group_by('block_name');
		              // return $result;
		              $result = $this->db->get()->result();
		              // print_r($this->db->last_query());die;
		                return $result;
		            // print_r(count($result));die;
		        }

	
		 public function get_blockwise_school($block_name,$school_type,$cate_type)
        {

            $this->db->select('district_name,school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
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
          $this->db->group_by('school_id'); 

           $result = $this->db->get()->result();
                     
          return $result; 

        }
        

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

  public function get_schoolwise_teacher_list($school_id)
  {
    $head_master_array = array(26,27,28,29);
    $this->db->select('*');
    $this->db->from('udise_staffreg');
    $this->db->where('school_key_id',$school_id);
    $this->db->where_not_in('teacher_type',$head_master_array);
    $this->db->where('archive',1);
    $result = $this->db->get()->result();
    // print_r($result);
    // echo $school_id;die;
    return $result;
  }

  

    public function save_teacher_reports($records)
    {
      $this->db->insert_batch('teacher_report',$records);
      return $this->db->insert_id();
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
         ->where('b.total>',0)
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
         ->where('b.total>',0)
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
         ->where('b.total>',0)
         ->group_by('school_type')
         ->order_by('b.school_type_id asc');
         
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
      * Get Flash News Content
      * VIT-sriram
      * 27/02/2019
      **/

    public function get_flash_news($dist_id)
    {
      $state_id = $this->session->userdata('emis_user_id');
      $state_type_id = $this->session->userdata('emis_user_type_id');
      // echo $state_id;
       $this->db->select('schoolnew_flashnews.*,user_category.user_type')
                     ->from('schoolnew_flashnews')
                     ->join('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                     ->where('district_name',$dist_id)
                     ->where('created_by',$state_id)
                     ->where('created_type_id',$state_type_id)
                     ->or_where('authority',$state_type_id)
                     
                     ->group_by('updated_date')

                     ->order_by('schoolnew_flashnews.id DESC')
                     ->limit(5);

              $flash_result = $this->db->get()->result();
              // print_r($this->db->last_query());
              // print_r($flash_result);die;
              return $flash_result;
    }


     public function get_flash_news_authority()
    {
       $type = array(6,8);
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
      // print_r($save_datas);die;
      $this->db->insert_batch('schoolnew_flashnews',$save_datas);
    return $this->db->insert_id();

      
    }

    public function get_districtwise_report($user_type)
    {          $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_where('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
    }

    /**
    * students raise Requested list
    * VIT-sriram
    * 11/04/2019
    **/

    public function get_stu_raise_request($dist_id)
    {
       $dist=$dist_id==$this->session->userdata('emis_district_id')?'b.district_id':'b.district_name';
        $this->db->select('students_child_detail.name,students_child_detail.unique_id_no,students_child_detail.dob,students_child_detail.class_studying_id,students_child_detail.class_section,students_child_detail.request_date,b.school_name as old_school ,students_child_detail.request_id,c.school_name,c.school_id,students_child_detail.education_medium_id,students_child_detail.school_admission_no') 
        ->from('students_child_detail')
        ->join('students_school_child_count b','b.school_id=students_child_detail.school_id')
        ->join('students_school_child_count c','c.udise_code = students_child_detail.request_id')
        ->where($dist,$dist_id)
        ->where('students_child_detail.request_flag','1')
        
        ->where('students_child_detail.request_date >','2019-03-01')
        ->order_by('students_child_detail.request_date','DESC');
        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;

    }

  /********* END *****/

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
   // $this->db->where('curr_stat',1);
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


function get_tchr($schl_id,$tech_cde){

    $this->db->select('u_id,teacher_name');
    $this->db->from('udise_staffreg');
    $this->db->where('udise_code',$schl_id);
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
function get_office($distval){
    $this->db->select('office_name,off_key_id');
    $this->db->from('udise_offreg');
    $this->db->where('district_id',$distval);
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

/*********************************Attendance Start Function********** */

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
         ->where('a.totstaff>',0)
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
     public function get_attendance_teacher_type_blockwise($dist,$date,$table)
     {
      $date = date('Y-m-d',strtotime($date));

         $school_type = array('Government','Fully Aided','Partially Aided');

         $this->db->select("count(a.school_id) as total_school,a.school_type",false)
         ->select('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->from('students_school_child_count a')
         ->join(' (select count(distinct school_code) as "marked_school" ,school_code from '.$table.' where date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
          ->where('a.district_name',$dist)
         ->where_in('school_type',$school_type)
         ->where('a.totstaff>',0)
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
         ->where('b.total>',0)
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
sum(distinct case when (attstatus="A" or attstatus="L") then 1 else 0 end) as absent from '.$table.' where date = "'.$date.'" group by teacher_code,school_code) as b','a.udise_code = b.school_code','left')
         ->where('a.block_name',$block_id)
         ->where_in('a.school_type',$school_type)
         ->where('a.totstaff>',0)
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
            // $this->db->select('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
            // ->from('students_school_child_count')
            // ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
            // ->where('school_id',$school_id)
            // ->group_by('class_id');

            // $result = $this->db->get()->result();
            // return $result;

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
          ->join('(SELECT  a.teacher_name, IF(a.attstatus="", "1", "0") as present, `a`.`attres`,a.teacher_code,a.school_id FROM '.$table.' as `a` WHERE `a`.`date` = "'.$date.'") as a','a.teacher_code =  b.teacher_code','left')
          
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

              $temparr['class'] = 13;
            $temparr['total_class'] = $school_details->lkg;
            $temparr['present'] = 0;
            $temparr['absent'] =0;
            


            array_push($classwise,$temparr);
            $temparr['class'] = 14;
            $temparr['total_class'] = $school_details->ukg;
            $temparr['present'] = 0;
            $temparr['absent'] =0;
            array_push($classwise,$temparr);
            $temparr['class'] = 15;
            $temparr['total_class'] = $school_details->Prkg;
            $temparr['present'] = 0;
            $temparr['absent'] =0;

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

          $temparr['class'] = 13;
            $temparr['total_class'] = $school_details->lkg;
            $temparr['present'] = 0;
            $temparr['absent'] =0;
            


            array_push($classwise,$temparr);
            $temparr['class'] = 14;
            $temparr['total_class'] = $school_details->ukg;
            $temparr['present'] = 0;
            $temparr['absent'] =0;
            array_push($classwise,$temparr);
          $j =
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
        $class = 'c'.$class_id;
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

      // echo $class;
      $date = date('Y-m-d',strtotime($date));
            


              // print_r($this->db->last_query());
              // print_r($result);

              

               $this->db->select('name,unique_id_no,class_section,gender');
              $this->db->from('students_child_detail');
              $this->db->where('school_id',$school_id);
              $this->db->where('transfer_flag',0);
              $this->db->where('class_studying_id',$class);
              $result = $this->db->get()->result();
              // print_r($result);
              if(!empty($result))
              {   $absent_name = [];

                // foreach ($class_name as $i => $name) {
                  # code...
                
                  

                // }
                    $absent_list = [];
                  // foreach($class_name as$index=> $name)
                  // {
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

                             if($class_det->unique_id_no == $abs)
                          {
                                $absent_list[$index]['name'] = $class_det->name;
                                $absent_list[$index]['section'] = $class_det->class_section; 
                                $absent_list[$index]['present'] = "0";
                                $absent_list[$index]['unique_id'] = $class_det->unique_id_no;
                                $absent_list[$index]['gender'] = $class_det->gender;
                                
                                $status = 0;
                                $old_unique_id = $abs;
                                // echo ($abs=='3302010011300241');
                          } 
                          }

                          }
                          
                          if($old_unique_id !=$class_det->unique_id_no)
                          { 
                            
                            // echo $index."if<br/>";

                                $absent_temp['name'] = $class_det->name; 
                                $absent_temp['section'] = $class_det->class_section; 

                                $absent_temp['present'] = "1";
                                $absent_temp['unique_id'] = $class_det->unique_id_no;
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

            public function get_attendance_search_details($date,$school_type,$block,$table)
            {
             // print_r($school_type);
             $date = date('Y-m-d',strtotime($date));
               $this->db->select("b.section_nos,b.udise_code,b.block_name,b.school_name,sum(total) as today_total_student,b.school_id",false)
         ->select('sum(IFNULL(section, 0)) as marked_section',false)
         ->select('IFNULL(a.persent, 0) as today_present',false)
         ->select('IFNULL(absent, 0) as today_absent ',false)
         ->select('IFNULL(today_present,0) as total_persent')
         ->from('students_school_child_count b')
         ->join(' (select sum(session1_all) as today_present,count(st_section) as section,sum(session1_allP) as persent ,sum(session1_allA) as absent,school_id from '.$table.' where date = "'.$date.'"  group by school_id) as a','a.school_id = b.school_id','left')
          ->where('b.total>',0);
       
                if(!empty($school_type))
         {
           $this->db->where('school_type',$school_type['name']);
           $this->db->where($school_type['atten_details']);
           $this->db->where('district_name',$school_type['district']);
           
         }
       
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
               //  print_r($this->db->last_query());die;
                // print_r($result)
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
                sum(distinct case when (attstatus="A" or attstatus="L") then 1 else 0 end) as absent from '.$table.' where date = "'.$date.'" group by teacher_code,school_code) as b','a.udise_code = b.school_code','left')
         ->where('a.totstaff>',0);
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

             public function get_block_school_student_teacher_total($block_name)
          {

            $this->db->select('sum(teach_mle+teach_fmle+nonteach_mle+nonteach_fmle) as teacher_total,sum(teach_tot),sum(nonteach_mle+nonteach_fmle) non_teach ,sum(total_t+total_g+total_b) student_total,count(*) as school_total')
          
            ->from('teacher_profile_count')
            ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('block_name',$block_name);

            $result = $this->db->get()->first_row();
            // print_r($this->db->last_query());
            // echo"<pre>";print_r($result);echo"</pre>";die;
            return $result;

          }




            public function get_block_school_type_based_schoolinfo($block_name)
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
                  $school_info[] = $this->get_block_school_type_count($res->school_type,$block_name);
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
           public function get_block_school_type_count($school_type,$block_name)
          {
            
              $this->db->select('IFNULL(sum(teach_mle+teach_fmle),0) as teacher_total,IFNULL(sum(nonteach_mle+nonteach_fmle),0) as non_teach,IFNULL(sum(total_t+total_g+total_b),0) student_total,IFNULL(count(*),0) as school_total')
           ->from('teacher_profile_count')
            ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('block_name',$block_name)
            ->where('school_type',$school_type);
            


             $result = $this->db->get()->first_row();
              // print_r($)
             $school_details[$school_type] = $result;

             return $school_details;
          }
        
   function getalldistrictcountsbyteacherblock($dist_id,$cate_type){
  
    $this->db->select('students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,district_name')
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
   function get_teaching_staff_block($dist_id,$cate_type){
 $this->db->select("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_id as dist_id,district_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
           $this->db->where('district_id=',$dist_id);

         $this->db->group_by('block_id');
     
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
               $result = $this->db->get()->result();
              //print_r($this->db->last_query());die();
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
        $this->db->where('district_id=',$dist_id);
      $this->db->group_by('block_id'); 

       if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
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
         $this->db->where('block_id=',$block_id);
         $this->db->group_by('school_id');
     
          if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              //print_r($this->db->last_query());die();
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
         $this->db->where('students_school_child_count.district_id=',$dist_id);
          $this->db->where('students_school_child_count.block_id=',$block_id);
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
where students_child_detail.transfer_flag=0 AND students_school_child_count.block_name='".$block_name."' group by school_name;"; 
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
       public function get_schoolwise_RTE_student($block_id)
      {

        $SQL=" select sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.block_name='".$block_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

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
WHERE schoolnew_basicinfo.district_id=".$dist_id." AND  (department like '%Directorate%of%School%Education%' OR  department 
 like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=2) AND schoolnew_renewal.vaild_upto IS NULL) AS CE0,
    (SELECT count(*) FROM schoolnew_renewal 
     JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    where schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from !='0000-00-00') AS APPROVED,
  (SELECT count(*) FROM schoolnew_renewal 
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
  where schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from ='0000-00-00') AS REJECTED,
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
       WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=0) AND schoolnew_renewal.vaild_upto IS NULL";
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
      WHERE schoolnew_basicinfo.district_id=".$dist_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL";
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
       WHERE schoolnew_basicinfo.district_id=".$dist_id." AND  (department like '%Directorate%of%School%Education%' OR  department 
 like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=2) AND schoolnew_renewal.vaild_upto IS NULL";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

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
   $SQL=   "SELECT  * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    where schoolnew_basicinfo.district_id=".$dist_id." AND vaild_from is not null and vaild_from ='0000-00-00'";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

    }

      public function get_blk_student_migration($dist_id)
{
   $dist=$dist_id==$this->session->userdata('emis_district_id')?'students_school_child_count.district_id':'students_school_child_count.district_name';
  $SQL="SELECT COUNT(DISTINCT(students_child_detail.unique_id_no)) as cnt,block_name,block_id,school_type FROM students_child_detail
JOIN students_transfer_history ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
 LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE  students_transfer_history.transfer_reason in (1,2,3,5) and  ".$dist."='".$dist_id."' AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 GROUP BY block_id,school_type";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_student_migration($block_name)
{
  $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,NAME,school_type,school_name,gender,students_transfer_history.class_studying_id,students_child_detail.unique_id_no,students_transfer_history.id,(CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE
          CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
          CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE
          CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE
          CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE
          CASE WHEN  transfer_reason=6 THEN 'Duplicate EMIS Entry' END
          END END END END END) AS Reason,remarks FROM students_child_detail
JOIN students_transfer_history  ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE  students_transfer_history.transfer_reason in (1,2,3,5) and  students_school_child_count.block_name='".$block_name."' AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12  group by students_child_detail.unique_id_no";
         $query = $this->db->query($SQL);
        // print_r($SQL);
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
      NULLIF(aadhaar_uid_number, ' ') IS NULL ";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
     //noonmeal district school count Report by Raju
       public function meal_school_distic_based_count_details($districtid)
   {
	  
   $sql="
select aa.district_id,aa.district_name,aa.school_name,aa.school_id,aa.block_name,aa.udise_code,aa.total, bb.meals from 
(SELECT district_id, district_name,school_id,school_name,block_name,udise_code,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) AS total FROM students_school_child_count where students_school_child_count.school_type_id in (1 ,2) and district_id= ".$districtid."  GROUP BY district_id,school_id) aa
 left join
(
select students_school_child_count.district_id,students_school_child_count.school_id,students_school_child_count.school_name,count(*) meals from schoolnew_schemeindent 
left join students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id 
left join students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id where students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and students_school_child_count.district_id  = ".$districtid." 
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
where schoolnew_schemeindent.scheme_id=15 and students_school_child_count.school_type_id in (1 ,2) and students_child_detail.school_id =".$school_id." ";
	 $query =  $this->db->query($sql);
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
	     $sql =" select students_school_child_count.district_id,district_name,school_id,school_name,block_name,students_school_child_count.udise_code, udise_staffreg.teacher_name,gender,staff_join,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, teacher_type.category  from  students_school_child_count 
join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
join teacher_type on teacher_type.id = udise_staffreg.teacher_type
join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
where school_id  = ".$school_id." ";

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
				select aa.district_id,aa.district_name,aa.stud,aa.student,aa.students,aa.block_name,aa.school_name,aa.udise_code,aa.category,aa.school_type,bb.SGT,bb.BT,bb.PG,(aa.stud/bb.SGT)as studsgt,(aa.student/bb.BT)as studBT,(aa.students/bb.PG) as studPG from 
(SELECT students_school_child_count.district_id,school_id,district_name,block_name,school_name,udise_code,category,school_type,sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as stud , sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as student,sum(c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)as students FROM students_school_child_count 
where students_school_child_count.district_id= ".$districtid."
and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
GROUP BY students_school_child_count.school_id) aa
left join 
(select students_school_child_count.district_id,school_id,udise_staffreg.udise_code,udise_staffreg.school_key_id,sum(if(teacher_type = 41,1,0))as SGT,sum(if(teacher_type = 11,1,0)) as BT,sum(if(teacher_type = 36,1,0)) as PG from  udise_staffreg  JOIN students_school_child_count on students_school_child_count.school_id= udise_staffreg.school_key_id  
where students_school_child_count.district_id= ".$districtid." and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
group by students_school_child_count.school_id  ) bb 
on  aa.school_id = bb.school_id  ";
				  $query = $this->db->query($sql);
                 return $query->result();
			}
			
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
         public function staff_fixa_report_block($district_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
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
where students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY block_id";
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
where students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) AND students_school_child_count.block_id=".$block_id." and students_school_child_count.school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_fixtation_sub_wise($dist_id)
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg
FROM teacher_panel2
join students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
where students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) AND students_school_child_count.district_id=".$dist_id."";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }
       public function staff_transfer_req_block($district_id)
      {

        $SQL="select students_school_child_count.block_name,students_school_child_count.block_id, sum(case when desgnation in (41) then 1 else 0 end) as SG, sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam, sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng, sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat, sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci, sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc from teacher_transfer_appli join students_school_child_count on students_school_child_count.school_id=teacher_transfer_appli.school_key_id where students_school_child_count.district_id=".$district_id." and students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by students_school_child_count.block_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_transfer_req_teacher($block_id)
      {
print_r($block_id);
        $SQL="select   max(teacher_regu_dates.dates) as DOR,teacher_transfer_appli.gender,teacher_transfer_appli.doj_pr,teacher_transfer_appli.doj_pr_schol,teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,dob,
(select subjects from teacher_subjects WHERE teacher_subjects.id=teacher_transfer_appli.subject LIMIT 1) AS otn,
(select type_teacher from teacher_type WHERE teacher_type.id=teacher_transfer_appli.desgnation LIMIT 1) AS otn1,
(select description from teacher_trans_priority where teacher_trans_priority.id=teacher_transfer_appli.priority_claimed) AS PC
 from teacher_transfer_appli  
 join teacher_regu_dates on teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.block_id=".$block_id."  and  students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
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
        $sql=" select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
        sum(surp_w_tot) as surp
        from students_school_child_count
        left join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3) 
                 and  students_school_child_count.district_id=".$dist_id."";
         $query = $this->db->query($sql);
                 return $query->result();
      }
      public function surplus_sub($dist_id)
      {
        $sql=" select  students_school_child_count.district_id,district_name, sum(surp_w_sg)as sg,sum(surp_w_sci)as sci,sum(surp_w_mat)as mat,sum(surp_w_eng)as eng,sum(surp_w_tam)as tam,sum(surp_w_soc)as soc,
sum(surp_w_mala)as mala ,sum(surp_w_telu) as telu ,sum(surp_w_kann) as kann,sum(surp_w_urdu) as urdu,sum(surp_w_mhm) as mhm,sum(surp_w_phm)phm,sum(surp_w_hhm)as hhm
                from students_school_child_count
        join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  students_school_child_count.district_id=".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
         
        
      }
        public function emis_sgstaff_surpwithpost($dist_id)
      {
        $sql="  select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sg
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  surp_w_sg !=0 and 
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
      public function emis_sciencestaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sci
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  surp_w_sci !=0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_mathstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mat
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  surp_w_mat !=0  and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_englishstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_eng
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  surp_w_eng !=0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_tamilstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_tam
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and  surp_w_tam !=0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
       public function  emis_socialsciencestaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_soc
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_soc !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
      
        public function emis_primaryhmstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_phm
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_phm !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
      
        public function emis_middlehmstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mhm
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_mhm !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_highhmstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_hhm
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_hhm !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
       public function  emis_telgustaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_telu
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_telu !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_kannadastaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_kann
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and    surp_w_kann !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
         public function emis_urdustaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_urdu
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and surp_w_urdu !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
          public function emis_malayalamstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mala
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and surp_w_mala !=0 and
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
     public function staff_fixa_report_PG_block($district_id)
      {

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
 
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.district_id = ".$district_id." AND students_school_child_count.sch_directorate_id IN (1,5,15,17,19,20,21,22,23,24,26,31,33) AND school_type_id=1
GROUP BY block_id;";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_fixa_report_PG_school($block_id)
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
  
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.block_id = ".$block_id." AND students_school_child_count.sch_directorate_id IN (1,5,15,17,19,20,21,22,23,24,26,31,33) AND school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       
      }
      public function staff_transfer_dse_req_block($district_id)
      {

        $SQL="select  students_school_child_count.block_name,students_school_child_count.block_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and appointed_subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and appointed_subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and appointed_subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and appointed_subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and appointed_subject=8 then 1 else 0 end) as BT_soc
 from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.district_id=".$district_id." and  students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33)
group by students_school_child_count.block_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_transfer_dse_req_teacher($block_id)
      {

        $SQL="select  teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,
(CASE appointed_subject WHEN 48 THEN 'Tamil' ELSE  
  CASE appointed_subject WHEN 46 THEN 'English' ELSE
    CASE appointed_subject WHEN 3 THEN 'Maths' ELSE
      CASE appointed_subject WHEN 7 THEN 'Science' ELSE 
        CASE appointed_subject WHEN 8 THEN 'Social'
            END
              END
                END
                  END
                    END) AS otn,
         (CASE priority_claimed WHEN 1 THEN 'Spouse expired by an accident or by illness' ELSE  
          CASE priority_claimed WHEN 2 THEN 'Teachers who have total blindness' ELSE
               CASE priority_claimed WHEN 3 THEN 'Teachers who have undergone Kidney Transplantation Surgery / In Dialysis Treatment' ELSE
          CASE priority_claimed WHEN 4 THEN 'Teachers who have been affected by Cancer' ELSE 
          CASE priority_claimed WHEN 5 THEN 'Differently abled Teachers with more than 50%' ELSE
          CASE priority_claimed WHEN 6 THEN 'Spouse of serving personnel with more than 5 years of service as on 1st June of the year' ELSE 
          CASE priority_claimed WHEN 7 THEN 'Widows and unmarried teachers who have crossed 40 years of age' ELSE 
          CASE priority_claimed WHEN 8 THEN 'Differently abled Teachers with less than 50%' ELSE 
          CASE priority_claimed WHEN 9 THEN 'Spouse of serving personnel with less than 5 years of service as on 1st June of the year' ELSE 
          CASE priority_claimed WHEN 10 THEN 'Teachers who have mental retarded child with 40% above defectiveness certificate' ELSE 
          CASE priority_claimed WHEN 11 THEN 'Teachers who are working and completed more than 5 years of service in the same school' ELSE 
          CASE priority_claimed WHEN 12 THEN 'Spouse Employed Category' ELSE 
          CASE priority_claimed WHEN 13 THEN 'General'  
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
                            END
                             END
                              END
                                ) AS PC
 from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
where students_school_child_count.block_id=".$block_id."  and  students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33)
group by teacher_transfer_appli.teacher_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_staff_fix_district_dse($district_id)
            {
              $this->db->select('a.block_id,a.block_name,a.district_name,a.district_id,count(a.school_id) as tot_school,count(mark_school) as mark_school')
                        ->from('students_school_child_count a')
                        ->join('(select count(school_key_id) as mark_school,school_key_id from teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School'))
                         ->where_in('a.cate_type',array('High School','Higher Secondary School'))
                            ->where('a.district_id',$district_id)
                        ->group_by('a.block_id')
                        ->order_by('a.block_name','ASC');
                $result = $this->db->get()->result();
                return $result;
            }

            public function get_staff_fix_schoolwise_dse($block_id)
            {
                $this->db->select('a.school_name,a.school_id,a.udise_code,a.block_name,teach_status')
                         ->from('students_school_child_count a')
                         ->join('(select count(school_key_id) as mark_school,school_key_id,teach_status from teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                       ->where_in('a.school_type_id',array('1'))
                         ->where_in('a.management',array('School Education Department School','Municipal School'))
                         ->where_in('a.cate_type',array('High School','Higher Secondary School'))
                         ->where('a.block_id',$block_id);
                $result = $this->db->get()->result();
                return $result;
            }

            public function  emis_dsestaff_surplus_tot_subject($dist_id)
      {
        $sql=" 
            select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
         surp_w_tot
        from students_school_child_count
        left join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
        left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) 
                 and students_school_child_count.district_id =".$dist_id."
                 group by students_school_child_count.school_id";
         $query = $this->db->query($sql);
                 return $query->result();

      }
      public function dsesurplus_tot($dist_id)
      {
        $sql=" select  district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category ,
        sum(surp_w_tot) as surp
        from students_school_child_count
        left join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) 
                 and  students_school_child_count.district_id=".$dist_id."";
         $query = $this->db->query($sql);
                 return $query->result();
      }
      public function dsesurplus_sub($dist_id)
      {
        $sql=" select  students_school_child_count.district_id,district_name, sum(surp_w_sg)as sg,sum(surp_w_sci)as sci,sum(surp_w_mat)as mat,sum(surp_w_eng)as eng,sum(surp_w_tam)as tam,sum(surp_w_soc)as soc
                from students_school_child_count
        join teacher_panel2 on teacher_panel2.school_key_id =students_school_child_count.school_id
                left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and  students_school_child_count.district_id=".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
         
        
      }
      public function emis_dsesgstaff_surpwithpost($dist_id)
      {
        $sql="  select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sg
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and surp_w_sg != 0 and 
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
      public function emis_dsesciencestaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_sci
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and surp_w_sci != 0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_dsemathstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mat
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and surp_w_mat != 0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_dseenglishstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_mat
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and  surp_w_mat !=0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
        public function emis_dsetamilstaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_tam
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and  surp_w_tam !=0  and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
       public function  emis_dsesocialsciencestaff_surpwithpost( $dist_id)
      {
        $sql=" select district_name,students_school_child_count.school_id,students_school_child_count.district_id,block_name,students_school_child_count.school_name,students_school_child_count.udise_code,category, surp_w_soc
         from students_school_child_count
         join teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         where sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  and  surp_w_soc !=0 and  
                 students_school_child_count.district_id =".$dist_id."";
          $query = $this->db->query($sql);
                 return $query->result();
      }
      
      public function emis_dsegovsurplus_sgstaff_school($school_id)
      {
                 
        $sql="
                 select students_school_child_count.district_id,district_name,students_school_child_count.school_id,students_school_child_count.school_name,block_name,students_school_child_count.block_id,students_school_child_count.udise_code, udise_staffreg.teacher_name,teacher_code,gender,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, staff_dob,staff_join,staff_pjoin,staff_psjoin,appointed_subject,appointedsubject.subjects as appsub,students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,e_prsnt_doorno,e_prsnt_place,e_prsnt_distrct,e_prsnt_pincode,school_type,appointedsubject.id,school_type_id,teacher_type.id as des_id from  students_school_child_count 
    join udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
    join teacher_type on teacher_type.id = udise_staffreg.teacher_type
    join teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
        left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
    where  
     students_school_child_count.district_id is not null and teacher_type =41 and students_school_child_count.school_id =".$school_id."";
       $query = $this->db->query($sql);
                 return $query->result();
      }
	  /*DEE total surplus count  by bala */
	  public function emis_total_surplus_teacher_dee($dist_id)
	  {
		  
	    $SQL="select count(teacher_transfer_appli.id) as total from teacher_transfer_appli  
 join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29) and teacher_transfer_appli.district=".$dist_id."";
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
 join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id where teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29) and teacher_transfer_appli.district=".$dist_id."";
				$query = $this->db->query($sql);
                 return $query->result();
	  
	  }
	   public function emis_total_surplus_teacher_sg_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_subjects.subjects,teacher_transfer_appli.seniority_district
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
		and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id." 
and teacher_transfer_appli.desgnation=41 group by teacher_transfer_appli.teacher_id";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  	  public function emis_total_surplus_teacher_phm_dee($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=11 group by teacher_transfer_appli.teacher_id";
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
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
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
from teacher_transfer_appli  
join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
 JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=11 group by teacher_transfer_appli.teacher_id ";
				$query = $this->db->query($sql);
                 return $query->result();
		  
	  }
	  public function emis_total_surplus_teacher_sg($dist_id)
	  {
		  $sql= "select  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,teacher_transfer_appli.teacher_id,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,teacher_subjects.subjects,teacher_transfer_appli.seniority_district,teacher_subjects.subjects
          from teacher_transfer_appli  
         join students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
         join udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
join teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         where schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
		 and teacher_transfer_appli.surplus=1 and teacher_transfer_appli.district=".$dist_id."
and teacher_transfer_appli.desgnation=41 group by teacher_transfer_appli.teacher_id";
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
   $sql ="select dge_class12_2018.UDISE_CODE,count(dge_class12_2018.PER_REGNO) as PER_REGNO,(select count(*) from student_past_12_status where ac_year='2017-2018' and   student_past_12_status.school_udise_code=students_school_child_count.udise_code) as assigned,(select count(PER_REGNO) from dge_class12_2018 where dge_class12_2018.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2018.udise_code from dge_class12_2018
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
   $sql ="select dge_class12_2019.UDISE_CODE,count(dge_class12_2019.PER_REGNO) as PER_REGNO,(select count(*) from student_past_12_status where ac_year='2018-2019' and  student_past_12_status.school_udise_code=students_school_child_count.udise_code  and student_past_12_status.ac_year='2018-2019') as assigned,(select count(PER_REGNO) from dge_class12_2019 where dge_class12_2019.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2019.udise_code from dge_class12_2019
 join student_past_12_status on student_past_12_status.school_udise_code=dge_class12_2019.UDISE_CODE
left join students_school_child_count on students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  and student_past_12_status.ac_year='2018-2019'
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function teacher_child_studyingstatus_district($district_id)
    {
   //  print_r($district_id);
        $sql="SELECT block_id,block_name,district_name, sum(teach_tot)as staff,0 as No,0 as Yes,0 as NA FROM students_school_child_count WHERE district_id is not null and district_id='".$district_id."' and school_type_id in (1,2,4)  group by block_name
UNION ALL
select students_school_child_count.block_id,students_school_child_count.block_name,students_school_child_count.district_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
WHERE students_school_child_count.district_id='".$district_id."' and school_type_id in (1,2,4)
group by students_school_child_count.block_name";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
public function teacher_child_studyingstatus_block($block_id)
    {
   // print_r($district_id); die();
        $sql="SELECT udise_code,school_name,block_name, sum(teach_tot)as staff,0 as No,0 as Yes,0 as NA FROM students_school_child_count WHERE block_id is not null and block_name='".$block_id."' and school_type_id in (1,2,4) group by school_id
UNION ALL
select students_school_child_count.udise_code,students_school_child_count.school_name,students_school_child_count.block_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
WHERE students_school_child_count.block_name='".$block_id."' and school_type_id in (1,2,4)
group by students_school_child_count.school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }

    public function slas_report_schl_blk($dist_id,$catty_id,$manage_id)
{
  if(!empty($catty_id))
  {
    $where="WHERE students_school_child_count.district_id=".$dist_id." and des1.catty_id=".$catty_id."";
     $cate_type="des1.cate_type,des1.catty_id,";
  }
else if(!empty($manage_id))
  {
   $where="WHERE students_school_child_count.district_id=".$dist_id." and des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else
  {
    $where="WHERE students_school_child_count.district_id=".$dist_id."";
     $cate_type="";
  }

  $SQL="SELECT ".$cate_type."des1.block_name,des1.block_id,des1.district_name,sum(tot_schl) as tot_schl,
  sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT manage_id,cate_type,catty_id,block_name,block_id,district_name,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 ".$where."
 GROUP BY students_school_child_count.block_id";
         $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl_wise($blk_id,$catty_id,$manage_id)
{
  if(!empty($catty_id))
  {
    $where="WHERE students_school_child_count.block_id=".$blk_id." and des1.catty_id=".$catty_id."";
     $cate_type="des1.cate_type,";
  }
else if(!empty($manage_id))
  {
   $where="WHERE students_school_child_count.block_id=".$blk_id." and des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else
  {
    $where="WHERE students_school_child_count.block_id=".$blk_id."";
     $cate_type="des1.catty_id,";
  }
 
  $SQL="SELECT ".$cate_type."des1.school_name,des1.school_id,des1.block_name,des1.block_id,sum(tot_schl) as tot_schl,
    sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT manage_id,cate_type,catty_id,school_name,students_slas_class7.school_id,block_name,block_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 ".$where."
 GROUP BY students_school_child_count.school_id";
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_cate_dist($dist_id)
{
 
  $SQL="SELECT des1.catty_id,des1.district_name,des1.district_id,des1.cate_type,sum(tot_schl) as tot_schl,
    sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT district_name,district_id,cate_type,catty_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.district_id=".$dist_id."
 GROUP BY students_school_child_count.catty_id";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_mana_dist($dist_id)
{
 
  $SQL="SELECT des1.management,des1.manage_id,des1.district_name,des1.district_id,sum(tot_schl) as tot_schl,
    sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT district_name,district_id,students_school_child_count.management,students_school_child_count.manage_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.district_id=".$dist_id."
 GROUP BY students_school_child_count.manage_id";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_blk($dist_id,$pst,$gender)
{
  if($gender=='' || $gender=='all')
  {
    $gen="(gender='Boys' OR gender='Girls')";
  }
  else if($gender=="Boys")
  {
    $gen = "gender='Boys'";
  }
  else if($gender=="Girls")
  {
    $gen = "gender='Girls'";
  }
  $SQL="SELECT *,ROUND(((p0*100)/total),2) as per0,ROUND(((p1*100)/total),2) as per1,ROUND(((p2*100)/total),2) as per2,ROUND(((p3*100)/total),2) as per3,ROUND(((p4*100)/total),2) as per4 FROM (SELECT COUNT(1) AS total,district_name,block_id,block_name,
  SUM(CASE WHEN ".$pst."=0 THEN 1 ELSE 0 END) AS 'p0',
SUM(CASE WHEN ".$pst.">=1 AND ".$pst."<=3 THEN 1 ELSE 0 END) AS 'p1',
SUM(CASE WHEN ".$pst.">=4 AND ".$pst."<=6 THEN 1 ELSE 0 END) AS 'p2',
SUM(CASE WHEN ".$pst.">=7 AND ".$pst."<=9 THEN 1 ELSE 0 END) AS 'p3',
SUM(CASE WHEN ".$pst.">=10 AND ".$pst."<=12 THEN 1 ELSE 0 END) AS 'p4'
FROM students_slas_class7
JOIN students_school_child_count ON students_school_child_count.school_id=students_slas_class7.school_id
WHERE ".$gen."  and students_school_child_count.district_id=".$dist_id." GROUP BY students_school_child_count.block_id) AS der1";
         $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl($blk_id,$pst,$gender)
{
 if($gender=='' || $gender=='all')
  {
    $gen="(gender='Boys' OR gender='Girls')";
  }
  else if($gender=="Boys")
  {
    $gen = "gender='Boys'";
  }
  else if($gender=="Girls")
  {
    $gen = "gender='Girls'";
  }
  $SQL="SELECT *,ROUND(((p0*100)/total),2) as per0,ROUND(((p1*100)/total),2) as per1,ROUND(((p2*100)/total),2) as per2,ROUND(((p3*100)/total),2) as per3,ROUND(((p4*100)/total),2) as per4 FROM (SELECT COUNT(1) AS total,district_name,block_id,block_name,students_school_child_count.school_name,students_school_child_count.school_id,
  SUM(CASE WHEN ".$pst."=0 THEN 1 ELSE 0 END) AS 'p0',
SUM(CASE WHEN ".$pst.">=1 AND ".$pst."<=3 THEN 1 ELSE 0 END) AS 'p1',
SUM(CASE WHEN ".$pst.">=4 AND ".$pst."<=6 THEN 1 ELSE 0 END) AS 'p2',
SUM(CASE WHEN ".$pst.">=7 AND ".$pst."<=9 THEN 1 ELSE 0 END) AS 'p3',
SUM(CASE WHEN ".$pst.">=10 AND ".$pst."<=12 THEN 1 ELSE 0 END) AS 'p4'
FROM students_slas_class7
JOIN students_school_child_count ON students_school_child_count.school_id=students_slas_class7.school_id
WHERE students_school_child_count.block_id IS NOT NULL and ".$gen." and students_school_child_count.block_id=".$blk_id." GROUP BY students_school_child_count.school_id) AS der1";
         $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
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
    public function students_osc_reg($school_id) {
    
      $sql='select class_section,class_studying_id,students_osc.school_id,students_osc.name,students_osc.unique_id_no,(select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as pre_stus ,students_school_child_count.school_name,training_type,ac_year  from students_osc
 left join students_child_detail on students_child_detail.unique_id_no=students_osc.unique_id_no
 join students_school_child_count on students_school_child_count.school_id=students_osc.school_id
 where students_school_child_count.school_id="'.$school_id.'" and present_status!=0;';
       $query = $this->db->query($sql);
       return $query->result();  
       
    }
			
}

   ?>