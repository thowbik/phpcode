 <?php
 /**
 * CEO Model 
 * 21/01/2018
 * VIT-Sriram
 **/
class Deo_District_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

/**
    * Ceo Profile
    * 21/01/2019
    * VIT-Sriram
    **/
public function get_edu_dist_name($deo_id)
    	{
    		$result = $this->db->get_where('schoolnew_edn_dist_mas',array('id'=>$deo_id))->first_row();
    		// print_r($result);die;
    		return $result;
    	}


      public function get_edu_block_name($dist_id)
      {
        $this->db->select('district_name,block_id as block_code,block_name');
        $this->db->group_by('block_name');
        $result = $this->db->get_where('students_school_child_count',array('edu_dist_name'=>$dist_id))->result();

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

    /**
    * Deo All Blockwise SChool View
    * 21/01/2019
    * VIT-Sriram
    **/


    	

		public function get_emis_blockwise_district($edu_district_name,$school_type,$cate_type)
		        {

		            $this->db->select('district_name,block_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
		              ->from('students_school_child_count')
		              ->where('edu_dist_name',$edu_district_name);
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

	/**
    * Ceo All SChool Report
    * 21/01/2019
    * VIT-Sriram
    **/    

		public function get_blockwise_school($block_name,$school_type,$cate_type)
        {
            
            $this->db->select('school_id,block_name,district_name,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
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

        /**
          * Ceo District DashBoard
          * VIT-Sriram
          * 26/01/2019
          **/

          public function get_district_school_student_teacher_total($deo_id)
          {

            $this->db->select('sum(teach_mle+teach_fmle+nonteach_mle+nonteach_fmle) as teacher_total,sum(nonteach_mle+nonteach_fmle) as nonteaching_total,sum(total_b+total_g+total_t) as student_total,count(students_school_child_count.school_id) as school_total,')
            ->from('teacher_profile_count')
             -> join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('edu_dist_id',$deo_id);

            $result = $this->db->get()->first_row();
            // echo"<pre>";print_r($result);echo"</pre>";die;
            return $result;

          }

         /**
         * Ceo District Dashboard School Type
         * VIT- Sriram
         * 26/01/2019
         **/
          public function get_district_scool_type_based_schoolinfo($deo_id)
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
                  $school_info[] = $this->get_district_school_type_count($res->school_type,$deo_id);
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

          public function get_district_school_type_count($school_type,$deo_id)
          {
            
              $this->db->select('sum(nonteach_mle+nonteach_fmle) as non_teach,IFNULL(sum(teach_mle+teach_fmle),0) as teacher_total,IFNULL(sum(total_b+total_g+total_t),0) student_total,IFNULL(count(students_school_child_count.school_id),0) as school_total,district_id')
            ->from('teacher_profile_count')
            ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->where('edu_dist_id',$deo_id)
            ->where('school_type',$school_type);
            


             $result = $this->db->get()->first_row();
              // print_r($)
             $school_details[$school_type] = $result;

             return $school_details;
          }

          /**
          * Sticke Report
          * VIT-sriram
          * 02/01/2019
          */
           public function get_deo_school_info($deo_id,$school_type)
              {
                $this->db->distinct();
                $this->db->select('*');
                $this->db->from('students_school_child_count');
                $this->db->where('edu_dist_id',$deo_id);
                if(!empty($school_type))
                {
                $this->db->where_in('school_type',$school_type);

                }
                   $result =  $this->db->get()->result();
                return $result;
              }

          public function get_schoolwise_teacher_list($school_id)
            {
              $this->db->distinct();
              $this->db->select('*');
              $this->db->from('udise_staffreg');
              $this->db->where('school_key_id',$school_id);
              // $this->db->where_not_in('teacher_type',$head_master_array);
              $this->db->where('archive',1);
              $tempData = $this->db->get()->result();
              // print_r($result);die;
              $result = [];
              if(!empty($tempData))
              {
                foreach($tempData as $res)
                {
                  $teacher_data = $this->db->get_where('teacher_report',array('school_key_id'=>$res->school_key_id,'teacher_id'=>$res->teacher_code))->first_row();

                  if(empty($teacher_data))
                  {
                    array_push($result,$res);
                  }
                }
              }
              // print_r($result);die;
              // echo $school_id;die;
              return $result;
            }

  

        public function save_teacher_reports($records)
        {
          $total_records = [];
          // print_r($records);
          
         if(!empty($records))
         {
          foreach ($records as $key => $res) {
            $this->db->select('*');
            $this->db->from('teacher_report');
            $this->db->where('school_key_id',$res['school_key_id']);
            $this->db->where('teacher_id',$res['teacher_id']);
            $result = $this->db->get()->first_row();
            // print_r($result);
              // print_r(array_diff(serialize($records),serialize($result)));

            if(!empty($result))
            {

              
              array_push($total_records,$result->teacher_id);
            }else
            {
               $total_records = $this->db->insert('teacher_report',$res);

            }
           }
         }

         return $total_records;

        }
        function getoldpassdistrict($dist_id,$username){
             $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('emis_user_id',$dist_id); 
       $this->db->where('emis_username',$username);
       $query =  $this->db->get();
       return $query->row('emis_password');
    }

     function emis_deo_resetpassword($dist_id,$username,$data){
       $this->db->where('emis_user_id', $dist_id);
       $this->db->where('emis_username', $username);
      return $this->db->update('emis_userlogin', $data);         
    }

    public function get_school_name($school_id)
    {


    $this->db->select('school_name');
    $result = $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
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
      $this->db->join(" (select count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id from teacher_report where archive =1 group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
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

    public function get_school_type()
        {
            $result = $this->db->get('schoolnew_type')->result();
            return $result;
        }
        
        
        
        /**
    * Special Reports
    * VIT - sriram
    * 07/02/2019
    */

function schoolcatemanagefilter($school_type,$cate,$id1,$id2,$dist_id){
 
    $this->db->select('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`school_name`, (Prkg_b+Prkg_g+Prkg_t) as PREKG, (lkg_b+lkg_g+lkg_t) as LKG, (ukg_b+ukg_g+ukg_t) as UKG, (c1_b+c1_g+c1_t) as class_1, (c2_b+c2_g+c2_t) as class_2, (c3_b+c3_g+c3_t) as class_3, (c4_b+c4_g+c4_t) as class_4, (c5_b+c5_g+c5_t) as class_5, (c6_b+c6_g+c6_t) as class_6, (c7_b+c7_g+c7_t) as class_7, (c8_b+c8_g+c8_t) as class_8, (c9_b+c9_g+c9_t) as class_9, (c10_b+c10_g+c10_t) as class_10, (c11_b+c11_g+c11_t) as class_11, (c12_b+c12_g+c12_t) as class_12, `total`, count(distinct(students_school_child_count.school_id)) as schoolcount, sum(teach_tot) as teachercount,sum(nonteach_tot) as nonteachercount')
      ->from('students_school_child_count')
     
     ->where('edu_dist_id',$dist_id)
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
         ->where('edu_dist_name',$dist_id)
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
         ->where('edu_dist_name',$dist)
         ->where('b.total>',0)
         ->group_by('school_type')
         ->order_by('b.school_type_id asc');
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);die;
        return $result;
     }
     
     
    
     
     
     
     

    /**
        * Attendance Search
        * VIT-sriram
        * 12/02/2019
        **/

        public function get_attendance_search_details($date,$school_type,$block,$table)
     {
      // print_r($block);
        $date = date('Y-m-d',strtotime($date));
        $this->db->select("b.section_nos,b.udise_code,b.school_name,b.block_name,sum(total) as today_total_student,b.school_id",false)
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
           $this->db->where('edu_dist_name',$school_type['district']);
           
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
              $this->db->where('edu_dist_name',$block['district']);
            }
            $this->db->where($block['atten_details']);
            $this->db->where_in('school_type',$block['school_type']);
         }

         $this->db->group_by('b.school_id');


         $result = $this->db->get()->result();
        //  print_r($this->db->last_query());die;
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
         $this->db->select("sum(distinct a.totstaff) as total_teacher,a.school_id,udise_code,block_name,school_name",false)
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
           $this->db->where('edu_dist_name',$school_type['district']);
           
         }

        

         if(!empty($block))
         {

            if($block['name'] !='none'){
            $this->db->where('block_name',$block['name']);
            }else
            {
              $this->db->where('edu_dist_name',$block['district']);
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
         ->where('edu_dist_name',$dist)
         ->where_in('school_type',$school_type)
         ->where('a.totstaff>',0)
         ->group_by('a.block_name');
         
         $result = $this->db->get()->result();
        //  print_r($this->db->last_query());
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
          ->where('a.edu_dist_name',$dist)
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
         ->where('b.block_name',$block_id)
         ->where('b.total>',0)
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

        // print_r($result->low_class);

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
        // echo $result->high_class;
            for($i=$result->low_class;$i<=$result->high_class;$i++)
          {   

              // $class = 'c'.$i;
            
                  // echo $i;
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
                        // print_r($abse);
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


          /*****************************************************************************
                     Ramoc Cements Magesh Elumalai 13-02-2019
*****************************************************************************/
            public function get_beo_assignment($deodistrictid) {
              $sql = "SELECT students_school_child_count.school_id,
              students_school_child_count.udise_code,
              students_school_child_count.school_name,
              block_name,edu_dist_name,
              schoolnew_edn_dist_block.block_id,
              schoolnew_edn_dist_block.beo_count,
              beo_map
      FROM students_school_child_count
      join schoolnew_edn_dist_block on schoolnew_edn_dist_block.block_id=students_school_child_count.block_id
      join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
      where students_school_child_count.edu_dist_id=".$deodistrictid." group by school_id";
              $query = $this->db->query($sql);
              return $query->result_array();
           }
           
        
           
           public function updatebeotask($beo) {
           
              return $this->db->update_batch('schoolnew_basicinfo',$beo,'udise_code'); 
              
           }

        /******************************************************* */

         function getalldistrictcountsbyteacherblock($dist_id,$cate_type){

    $this->db->select('students_school_child_count.district_name,students_school_child_count.block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,students_school_child_count.edu_dist_name')
    ->from('teacher_profile_count')  
         ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
        ->where('students_school_child_count.school_type','Government')
          ->where('students_school_child_count.edu_dist_id=',$dist_id)
            ->group_by('students_school_child_count.block_id');
  
       if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
           
               $result = $this->db->get()->result();
          //  print_r($this->db->last_query());die();
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
        $this->db->where('students_school_child_count.edu_dist_id',$dist_id);
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
  function get_nonteaching_staff_block($dist_id,$cate_type){

 $this->db->select("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_name,district_id,students_school_child_count.edu_dist_name");
       $this->db->from('teacher_profile_count');
       $this->db->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right');
      $this->db->group_by('block_id'); 

       if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
           $this->db->where('edu_dist_id',$dist_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
   function get_teaching_block_school($dist_id,$block_id,$cate_type){
     
         $this->db->select("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,school_name,school_id,school_type,udise_code,block_id,district_id as dist_id,district_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
           $this->db->where('students_school_child_count.edu_dist_id',$dist_id);
         $this->db->where('students_school_child_count.block_id',$block_id);
       
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
          $this->db->where('students_school_child_count.edu_dist_id',$dist_id);
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
   function getalldistrictcountsbyclassteach($dist_id,$block_id,$cate_type){
        $this->db->select('students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.school_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,block_name') 
        ->from('teacher_profile_count')
         ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
        ->where('students_school_child_count.school_type','Government')
         ->where('students_school_child_count.edu_dist_id=',$dist_id)
        ->where('students_school_child_count.block_id=',$block_id)
        ->group_by('students_school_child_count.school_id')
        ->group_by('students_school_child_count.udise_code')  
         
        ->group_by('students_school_child_count.school_name');
      if(!empty($cate_type))
          {
               $this->db->where_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              //print_r($this->db->last_query());die();
               // print_r($result);die;
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
      // print_r($this->session->userdata());
      // echo $state_type_id;
       $this->db->select('schoolnew_flashnews.*,user_category.user_type')
                     ->from('schoolnew_flashnews')
                     ->join('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                     
                     ->where('created_by',$state_id)

                     ->where('created_type_id',$state_type_id)
                     ->or_where('authority',$state_type_id)
                     ->where_in('block_name','(select block_name from students_school_child_count where edu_dist_id ='.$state_id.')')
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
       $type = array(6,1);
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

        
  
  /**
  * Report Links
  * VIT-sriram
  * 13/03/2019
  **/
  public function get_districtwise_report($user_type)
    {
       $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_where('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
    }
     public function get_blockwise_RTE_student($dist_id)
      {

        $SQL=" select sc.block_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.edu_dist_id=".$dist_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
      
      }
       public function get_schoolwise_RTE_student($block_id)
      {

        $SQL=" select sc.school_name,sc.school_id,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.block_name='".$block_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function get_schoolwise_RTE_student_list($school_id)
      {

        $SQL="select st.name,st.unique_id_no,st.class_studying_id from students_child_detail st left join students_school_child_count sc on sc.school_id=st.school_id where sc.school_id=".$school_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by st.unique_id_no"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_state_renewal_details($deo_id)

           {
            
            $SQL="SELECT 
  (SELECT 
    COUNT(*)
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove) AND schoolnew_renewal.vaild_upto IS NULL
  ) AS BEO,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
      JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
      JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
      JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
      join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=-3 OR auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL
    
  ) AS DE0,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND (department not like '%Directorate%of%Elementary%Education%' OR department  LIKE '%Directorate%of%School%Education%' OR  department LIKE '%Directorate%of%Matriculation %Schools%') AND  schoolnew_renewal.id  IN (SELECT renewal_id FROM schoolnew_renewapprove where auth!=1 OR auth IS NULL) AND schoolnew_renewal.vaild_upto IS NULL
        
  ) AS CE0,
    (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth=1) AND schoolnew_renewal.vaild_upto IS NOT NULL
  ) AS APPROVED,
   (SELECT 
      count(*) FROM 
      schoolnew_renewal
       JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_basicinfo.district_id=".$deo_id." AND
        vaild_from is not null and vaild_from ='0000-00-00'
      ) AS REJECTED,
    (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND schoolnew_renewal.vaild_upto IS NULL
  ) AS TOTAL,  school_name,udise_code,district_name,block_name,createddate, schoolnew_basicinfo.district_id,schoolnew_basicinfo.block_id
    FROM
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
   
    WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND vaild_from IS NULL;";
     //echo $SQL;
     //die();   
     $query = $this->db->query($SQL);
     return $query->result_array();
   }

public function get_state_renewal_pending_details($deo_id)

    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
        JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND schoolnew_school_department.id in (select sch_directorate_id from schoolnew_basicinfo where department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove)";
            $query = $this->db->query($SQL);
         return $query->result_array();

    }
      public function get_state_deo_pending_details($deo_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
    JOIN  schoolnew_edn_dist_block ON schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND schoolnew_school_department.id in (select sch_directorate_id from schoolnew_basicinfo where department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth=3 OR auth=-3 OR auth IS NULL) )";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
     public function get_state_ceo_pending_details($deo_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
   JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.edu_dist_id=".$deo_id." AND (department like '%Directorate%of%School%Education%' OR  department  like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id  IN (SELECT renewal_id FROM schoolnew_renewapprove where auth!=1 OR auth IS NULL)";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
    public function get_emis_blockwise_district_2018($edu_district_name,$school_type,$cate_type)
            {
                            $this->db->select('`students_school_child_count`.`edu_dist_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(class1) as class_1,sum(class2) as class_2,sum(class3) as class_3,sum(class4) as class_4,sum(class5) as class_5,sum(class6) as class_6,sum(class7) as class_7,sum(class8) as class_8,sum(class9) as class_9,sum(class10) as class_10,sum(class11) as class_11,sum(class12) as class_12,sum(prekg) as Prkg,sum(lkg) as LKG,sum(ukg)as UKG,sum(students_enrolled_2018_19.total) as total')
                              ->from('students_enrolled_2018_19')
                              ->join('students_school_child_count','students_school_child_count.school_id=students_enrolled_2018_19.school_key_id')
                              ->where('students_school_child_count.edu_dist_name',$edu_district_name);
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
        
        
        function get_dist_school_details($dist_id){

            $this->db->select('sum(case when a.school_type=1 then 1 else  0 end) as aided,
	       sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
           sum(case when a.school_type is null then 1  else 0 end)as unmarked ,students_school_child_count.* from schoolnew_section_group a');
            // $this->db->from('students_school_child_count');
	       $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
            $this->db->where('students_school_child_count.edu_dist_id',$dist_id);
	       $this->db->where_in('students_school_child_count.school_type_id',array(2,4));
	       $this->db->group_by('a.school_key_id');
            $query =  $this->db->get();
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
WHERE edu_dist_id=".$dist_id."
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
WHERE  sch2.edu_dist_id=".$dist_id." AND sch1.school_type='".$school_type_from."' AND sch2.school_type='".$school_type_to."' ) as T1
GROUP BY unique_id_no";

         $query = $this->db->query($SQL);
       return $query->result(); 
}
 public function get_blk_student_migration($dist_id)
{
  $SQL="select 
       sum(school_type='Government') as government,
       sum(school_type='Fully Aided') as fullyaided,
       sum(school_type='Un-aided') as unaided,
       sum(school_type='Partially Aided') as PartiallyAided,
       sum(school_type='Central Govt') as CentralGovt,
       block_name,district_id as dist_id
       from students_school_child_count 
       join students_transfer_history on students_transfer_history.school_id_transfer= students_school_child_count.school_id
       where students_transfer_history.school_id_admit IS NULL AND students_school_child_count.edu_dist_id='".$dist_id."' AND students_transfer_history.class_studying_id!=12
       group by students_school_child_count.block_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_student_migration($block_name)
{
  $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,NAME,school_type,school_name,gender,students_transfer_history.class_studying_id,students_transfer_history.unique_id_no,students_transfer_history.id,(CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE
          CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
          CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE
          CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE
          CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE
          CASE WHEN  transfer_reason=6 THEN 'Duplicate EMIS Entry' END
          END END END END END) AS Reason,remarks FROM students_child_detail
JOIN students_transfer_history FORCE INDEX (idx_students_transfer_history_unique_id_no_school_id_transfer)  ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE students_school_child_count.block_name='".$block_name."' AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12;";
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
$this->db->WHERE('students_school_child_count.edu_dist_id',$district_id);

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
 $this->db->WHERE('students_school_child_count.edu_dist_id',$district_id);
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
  $this->db->WHERE('students_school_child_count.edu_dist_id',$district_id);
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
 public function govt_enrollment($deo_id)
          {
        $SQL="SELECT count(*) as total FROM students_child_detail
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id
 WHERE edu_dist_id=".$deo_id." AND  class_studying_id in (13,14,15,1)  AND  doj BETWEEN '2019-03-01' AND NOW() AND created_at BETWEEN '2019-03-01 00:00:00'AND NOW() AND schoolnew_basicinfo.manage_cate_id=1"; 
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
    $this->db->WHERE('students_school_child_count.edu_dist_id',$district_id);
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
   function get_dist_school_timetable_details_blk($dist_id,$school_cate,$this_week_fst,$this_week_ed){
     // print_r($school_cate);
    if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where=" where students_school_child_count.cate_type in ('".$cate_type."') and students_school_child_count.edu_dist_id=".$dist_id."";
    }
    else
    {
     $where="where students_school_child_count.edu_dist_id=".$dist_id."";
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
where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.edu_dist_id = ".$dist."  ".$schol." ".$class."  ".$where ."  ";
// where  schoolnew_schemeindent.scheme_id =".$scheme." and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.edu_dist_id = ".$dist."  ".$schol." and ( school_type_id =1 or school_type_id =2 ) ".$class."  ".$where ."  ";

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
where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.edu_dist_id = ".$dist."  ".$schol." ".$class." ".$where ." ";
// where  schoolnew_schemeindent.scheme_id =".$scheme." and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and  students_school_child_count.edu_dist_id = ".$dist."  ".$schol." and ( school_type_id =1 or school_type_id =2 ) ".$class." ".$where ." ";
 // echo $sql;
		$query = $this->db->query($sql);
			return $query->result();
	}
	public function footwear_indentboy($scheme,$dist,$blk,$class)
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
where  schoolnew_schemeindent.scheme_id=".$scheme."   and distribution_date is null and schoolnew_schemeindent.isactive =1  and  students_school_child_count.edu_dist_id = ".$dist."  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) ".$class."  ".$where." ";
  $query = $this->db->query($sql);
  // print_r($this->db->last_query());
			return $query->result();
	}
	
	public function footwear_indentsgirl($scheme,$dist,$blk,$class)
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
			where  schoolnew_schemeindent.scheme_id=".$scheme."   and distribution_date is null and schoolnew_schemeindent.isactive =1  and transfer_flag =0 and  students_school_child_count.edu_dist_id = ".$dist."   and ( school_type_id =1 or school_type_id =2 )  ".$class."  ".$where."";
			 
			  $query = $this->db->query($sql);
				//print_r($this->db->last_query());
			  return $query->result();
			
	}
	public function bag_indent($dist,$blk,$class)
	{
			
		if(!empty($blk))
		{
			// echo $size;
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
	   else
	   {
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
      
       where  students_school_child_count.edu_dist_id = ".$dist." and ( school_type_id =1 or school_type_id =2 ) ".$class." ".$where." ";
	   

           $query = $this->db->query($sql);
          // print_r($this->db->last_query());
            return $query->result();
	}
			
	  public function crayan_indent($blk,$dist,$class)
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
		 where class_studying_id >= 1 and class_studying_id <= 2  and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.edu_dist_id = ".$dist."  ".$class." ".$where." ";
		
		  $query = $this->db->query($sql);
		   // print_r($this->db->last_query());
          return $query->result();
	 }
	  public function colorpencil_indent($dist,$blk,$class)
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
		 where  class_studying_id >= 3 and class_studying_id <= 5  and ( school_type_id =1 or school_type_id =2 ) and  students_school_child_count.edu_dist_id = ".$dist."  ".$class."  ".$where." ";
		
		  $query = $this->db->query($sql);
		    // print_r($this->db->last_query());
            return $query->result();
			}
	    public function geomentry_indent($dist,$blk,$class)
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
		 where  class_studying_id >= 6 and class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 )  and  students_school_child_count.edu_dist_id = ".$dist."  ".$class." ".$where." ";
		  
		  $query = $this->db->query($sql);
          return $query->result();
		}
		
		public function atlas_indent($dist,$blk,$class)
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
		 where  class_studying_id >= 6 and class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 ) and students_school_child_count.edu_dist_id = ".$dist."  ".$class."  ".$where." ";
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
	  
	  // public function notebook($scheme)
	  // {
	    // $sql="select id,scheme_category from schoolnew_schemedetail where scheme_id =".$scheme."";
	    // $query = $this->db->query($sql);
        // return $query->result();	
      // }
	  // public function notes($dist,$blk,$cate,$term)
	  // {
		 
		  
		  // if(!empty($blk))
		// {
			// $d="ab.school_name,";
			// $blk ="and ab.block_id =".$blk."";
			// $where = "group by ab.scheme_category,ab.block_name order by ab.block_name";
		// }
		
		// else if(!empty($scheme))
		// {    
			// $d ="ab.block_id,ab.block_name,"; 
			// $where ="group by ab.block_id order by block_name asc";
		// }
		
		// else{
		
			// $d ="ab.block_id,ab.block_name,"; 
			// $where ="group by ab.block_id order by block_name asc"; 
		// }
		  
		  
		  
		  // $sql="select ab.scheme_category,ab.cname,".$d." ab.term,
			// if (ab.class_studying_id = 1,ab.tot,0) as C1,
			// if (ab.class_studying_id = 2,ab.tot,0) as C2,
			// if (ab.class_studying_id = 3,ab.tot,0) as C3,
			// if (ab.class_studying_id = 4,ab.tot,0) as C4,
			// if (ab.class_studying_id = 5,ab.tot,0) as C5,
			// if (ab.class_studying_id = 6,ab.tot,0) as C6,
			// if (ab.class_studying_id = 7,ab.tot,0) as C7,
			// if (ab.class_studying_id = 8,ab.tot,0) as C8  
			// from(select 
			// aa.class_studying_id, b.scheme_category,c.scheme_category as cname,b.term,aa.num, b.count, (aa.num*b.count) tot,d.district_name,d.block_name,d.school_name,d.block_id
			// from 
		    // (select class_studying_id, school_id,transfer_flag,count(class_studying_id) num from
			 // students_child_detail  group by class_studying_id) aa
			// join  schoolnew_notebooks_list b on aa.class_studying_id = b.class
			// join schoolnew_schemedetail c on c.id = b.scheme_category
			// join students_school_child_count d on  d.school_id = aa.school_id
			// where b.scheme_category=".$cate." and term =".$term." and aa.transfer_flag =0 and (cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 ) and d.district_id =".$dist." 
			 // group by aa.class_studying_id, b.scheme_category) ab  ".$where."";
			 // // echo $sql;
            // $query = $this->db->query($sql);
            // return $query->result();
	  // }
	  
	  
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

    public function get_OSC_List($dist_id)
{
  $SQL="select (select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as present_sts,students_school_child_count.block_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt from students_osc 
left join students_school_child_count on students_school_child_count.school_id=students_osc.school_id
where edu_dist_id=".$dist_id." and students_osc.present_status!=0 group by present_status,students_school_child_count.block_name;
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
       ->WHERE('edu_dist_id=',$dist_id)
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
    public function slas_report_schl_blk($dist_id,$catty_id,$manage_id)
{
  if(!empty($catty_id))
  {
    $where="WHERE students_school_child_count.edu_dist_id=".$dist_id." and des1.catty_id=".$catty_id."";
     $cate_type="des1.cate_type,des1.catty_id,";
  }
else if(!empty($manage_id))
  {
   $where="WHERE students_school_child_count.edu_dist_id=".$dist_id." and des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else
  {
    $where="WHERE students_school_child_count.edu_dist_id=".$dist_id."";
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
(SELECT edu_dist_id,district_name,district_id,cate_type,catty_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.edu_dist_id=".$dist_id."
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
(SELECT edu_dist_id,district_name,district_id,students_school_child_count.management,students_school_child_count.manage_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.edu_dist_id=".$dist_id."
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
WHERE ".$gen."  and students_school_child_count.edu_dist_id=".$dist_id." GROUP BY students_school_child_count.block_id) AS der1";
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
public function district_profile_completion_status($district_id,$school_type)
 {
	  if($school_type !='')
		{
			$WHERE = "and school_type_id='".$school_type."'";
		}
		else{
			$WHERE =' '; 
		}
	 $sql="select block_id,block_name,
count(school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
 from schoolnew_profilecomplete
 join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 where edu_dist_id=".$district_id." ".$WHERE." group by block_id;";
$query = $this->db->query($sql);
        return $query->result();
 } 
 public function block_profile_completion_status($block_id,$school_type)
 {
	 if($school_type !='')
		{
			$WHERE = "and school_type_id='".$school_type."'";
		}
		else{
			$WHERE =' '; 
		}
	 $sql="select school_key_id,a.school_name,udise_code,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
 from schoolnew_profilecomplete
 join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 where block_id=".$block_id."  ".$WHERE." group by school_key_id;";
$query = $this->db->query($sql);
        return $query->result();
 } 
}
?>