     <?php

class Blockmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

   function getblockprofiledetails($id){
        $this->db->select('*'); 
       $this->db->from('blocknew_basicinfo');
       $this->db->where('block_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }

 function getsingledistname($block_id){
            $this->db->select('*'); 
       $this->db->from('schoolnew_block');
       $this->db->where('id',$block_id); 
       $query =  $this->db->get();
       return $query->row('block_name');
     }

    function getallblockscountbyblock($block_id){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(total_b+total_g+total_t) as total') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$block_id)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
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
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }
    
    function getallgenderbydistrict($distid){
       $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(students_school_child_count.total_b) as boys, sum(students_school_child_count.total_g) as girls, sum(students_school_child_count.total_t) as transgender')
          ->from('students_school_child_count')
          ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$distid)
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
            ->where('schoolnew_block.id',$distid)
            ->where('schoolnew_basicinfo.sch_management_id',$manage)
            ->where('schoolnew_basicinfo.curr_stat',1)
          ->group_by('schoolnew_block.block_name');
      $query =  $this->db->get();
      return $query->result();
  }

       function getallblockscommuniywise($block_id,$comm){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_community_school_count')
           ->join('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$block_id)
             ->where('students_community_school_count.community_code',$comm)
             ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
       return $query->result();
       }else{
        return false;
       }
   } 

 function getallblockkkcountsbyclassschool($blckid,$comm){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_community_school_count')
           ->join('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
             ->where('students_community_school_count.community_code',$comm)
             ->where('schoolnew_basicinfo.curr_stat',1)
             ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }

function getalldistrictcountsbyclassblock($block_id){
        $this->db->select('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
            ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.district_id',$block_id)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_block.block_name');
       $query =  $this->db->get();
       return $query->result();
   } 
  function getalldistrictcountsbyclassschool($blckid){
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
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
        $this->db->select('schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
           ->from('students_school_child_count')
           ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
           ->join('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
            ->where('schoolnew_block.id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('schoolnew_basicinfo.sch_management_id',$manage)
             ->group_by('schoolnew_basicinfo.school_name')
            ->group_by('schoolnew_basicinfo.udise_code')
            ->group_by('schoolnew_basicinfo.school_id');
       $query =  $this->db->get();
       return $query->result();
   }

     function getschoolprofiledetails($id){
        $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('curr_stat',1);
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

        function get_school_by_udise($schooludise,$block_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('udise_code',$schooludise);
      $this->db->where('curr_stat',1);
      $this->db->where('block_id',$block_id);
      $query =  $this->db->get();
      return $query->result();
   }


       function get_school_by_block($udise,$block_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('udise_code',$udise);
      $this->db->where('curr_stat',1);
      $this->db->where('block_id',$block_id);
      $query =  $this->db->get();
      return $query->result();
   }

       function get_school_by_id($school_id,$block_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$school_id);
      $this->db->where('curr_stat',1);
      $this->db->where('block_id',$block_id);
      $query =  $this->db->get();
      return $query->result();

   }

       function getoldpassblock($block_id,$username){
             $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('emis_user_id',$block_id); 
       $this->db->where('emis_username',$username);
       $query =  $this->db->get();
       return $query->row('emis_password');
    }

     function emis_block_resetpassword($block_id,$username,$data){
       $this->db->where('emis_user_id', $block_id);
       $this->db->where('emis_username', $username);
      return $this->db->update('emis_userlogin', $data);         
    }
    
    /***************
    Tamil
    ***************/
    
    public function get_block_name($block_id)
  {
	  $this->db->select('block_name')
              ->from('schoolnew_block')
              ->where('id',$block_id);
              $result = $this->db->get()->first_row();
              // print_r($this->db->last_query());
              return $result;
	  
  }
  
  
  public function get_blockwise_school($block_name,$school_type,$cate_type)
        {


            $this->db->select('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total,block_name')
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
        public function get_schoolwise_class($school_id)
                {
                  $this->db->select('school_name,block_name,district_name,udise_code,school_type,management,cate_type,category,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class1,sum(c2_b+c2_g+c2_t) as class2,sum(c3_b+c3_g+c3_t) as class3,sum(c4_b+c4_g+c4_t) as class4,sum(c5_b+c5_g+c5_t) as class5,sum(c6_b+c6_g+c6_t) as class6,sum(c7_b+c7_g+c7_t) as class7,sum(c8_b+c8_g+c8_t) as class8,sum(c9_b+c9_g+c9_t) as class9,sum(c10_b+c10_g+c10_t) as class10,sum(c11_b+c11_g+c11_t) as class11,sum(c12_b+c12_g+c12_t) as class12') 
               ->from('students_school_child_count')
               
               ->where('school_id', $school_id);    
               $result =  $this->db->get()->first_row();
                return $result;
                }

		
		public function	verification_status($udise_code,$data)
	{
		
		$this->db->where('udise_code',$udise_code);    
        return $this->db->update('students_school_child_count',$data); 

	}
    
 /*************************************************************************************************************************************************************   
     //Functions Included By Vivek Rao - Ramco Cements Limited
 *************************************************************************************************************************************************************/    
     
    function getallclasscountbyblock($blckid){
        $this->db->select('COUNT(*) as total,class_studying_id') 
           ->from('students_child_detail')
           ->join('baseapp_community','baseapp_community.id=students_child_detail.community_id AND baseapp_community.religion_id=students_child_detail.religion_id')
           ->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id = students_child_detail.school_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->where('students_child_detail.class_studying_id>=1 AND students_child_detail.class_studying_id<=12')
            ->group_by('class_studying_id');
       $query =  $this->db->get();
       return $query->result();
    }  
    
   function getallcategorycountbyblock($blckid){
        /*$this->db->select('COUNT(*) as total,baseapp_community.community_code,baseapp_community.community_name') 
           ->from('students_child_detail')
           ->join('baseapp_community','baseapp_community.id=students_child_detail.community_id AND baseapp_community.religion_id=students_child_detail.religion_id')
           ->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id = students_child_detail.school_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('community_code')
            ->group_by('community_name');*/
        $SQL="select COUNT(*) as total,baseapp_community.community_code,baseapp_community.community_name
from students_child_detail
join baseapp_community ON baseapp_community.id=students_child_detail.community_id
join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_child_detail.school_id
where schoolnew_basicinfo.block_id=".$blckid." AND schoolnew_basicinfo.curr_stat=1 group by community_name order by community_code";
       $query = $this->db->query($SQL);
       return $query->result_array();
    }

    
   function getSchoolCountByBlock($blckid){
        /*$this->db->select('count(*) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name') 
           ->from('schoolnew_basicinfo ')
           ->join('schoolnew_management','schoolnew_management.management_code=schoolnew_basicinfo.management_id')
           ->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_management.mana_cate_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_manage_cate.id');
       $query =  $this->db->get();
       return $query->result();*/
       $SQL="SELECT 
             schoolnew_manage_cate.manage_name as management_name, 
             IFNULL(total,0) as total,
               schoolnew_manage_cate.id 
            FROM schoolnew_manage_cate 
            LEFT JOIN 
                (SELECT 
                 (count(*)+0) as total,
                    schoolnew_manage_cate.id,
                    schoolnew_manage_cate.manage_name as management_name 
                FROM schoolnew_basicinfo 
                JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
                JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
                WHERE schoolnew_basicinfo.block_id=".$blckid." AND curr_stat=1 group by schoolnew_manage_cate.id) AS t 
                ON t.id=schoolnew_manage_cate.id";
       $query = $this->db->query($SQL);
       return $query->result_array();
    }

    
   function getStudentTotalCountByBlock($blckid){
        /*$this->db->select('count(*) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name') 
           ->from('schoolnew_basicinfo ')
           ->join('schoolnew_management','schoolnew_management.management_code=schoolnew_basicinfo.management_id')
           ->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_management.mana_cate_id')
           ->join('students_child_detail','students_child_detail.school_id=schoolnew_basicinfo.school_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_manage_cate.id');
       $query =  $this->db->get();
       return $query->result();*/
       $SQL="SELECT schoolnew_manage_cate.manage_name as management_name, IFNULL(total,0) as total,schoolnew_manage_cate.id FROM schoolnew_manage_cate
             LEFT JOIN
            (SELECT (count(*)+0) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name FROM schoolnew_basicinfo 
            JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
            JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
            JOIN students_child_detail ON students_child_detail.school_id=schoolnew_basicinfo.school_id
            WHERE schoolnew_basicinfo.block_id=".$blckid." AND curr_stat=1 group by schoolnew_manage_cate.id) as t ON t.id=schoolnew_manage_cate.id";
       $query = $this->db->query($SQL);
       return $query->result_array();
    }
    
      function getTeacherCountByBlock($blckid){
        /*$this->db->select('count(*) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name') 
           ->from('schoolnew_basicinfo ')
           ->join('schoolnew_management','schoolnew_management.management_code=schoolnew_basicinfo.management_id')
           ->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_management.mana_cate_id')
           ->join('udise_staffreg','udise_staffreg.school_key_id=schoolnew_basicinfo.school_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('schoolnew_manage_cate.id');
       $query =  $this->db->get();
       return $query->result();*/
       $SQL="SELECT schoolnew_manage_cate.manage_name as management_name, IFNULL(total,0) as total,schoolnew_manage_cate.id FROM schoolnew_manage_cate
                LEFT JOIN
                (SELECT (count(*)+0) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name FROM schoolnew_basicinfo 
                JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
                JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
                JOIN udise_staffreg ON udise_staffreg.school_key_id=schoolnew_basicinfo.school_id
                WHERE schoolnew_basicinfo.block_id=".$blckid." AND curr_stat=1 group by schoolnew_manage_cate.id) as t ON t.id=schoolnew_manage_cate.id";

       $query = $this->db->query($SQL);
       return $query->result_array();
    } 
    
    function getStudentsCountByGenderInBlock($blckid){
        $this->db->select('count(*) as total,students_child_detail.gender') 
           ->from('schoolnew_basicinfo ')
           ->join('schoolnew_management','schoolnew_management.management_code=schoolnew_basicinfo.management_id')
           ->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_management.mana_cate_id')
           ->join('students_child_detail','students_child_detail.school_id=schoolnew_basicinfo.school_id')
            ->where('schoolnew_basicinfo.block_id',$blckid)
            ->where('schoolnew_basicinfo.curr_stat',1)
            ->group_by('students_child_detail.gender');
       $query =  $this->db->get();
       return $query->result();
    }
      function getschoolrecognition_verification($blckid){
      
       // $SQL="SELECT schoolnew_manage_cate.manage_name as management_name, IFNULL(total,0) as total,schoolnew_manage_cate.id FROM schoolnew_manage_cate
       //       LEFT JOIN
       //      (SELECT (count(*)+0) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name FROM schoolnew_basicinfo 
       //      JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
       //      JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
       //      JOIN students_child_detail ON students_child_detail.school_id=schoolnew_basicinfo.school_id
       //      join schoolnew_renewalverify ON schoolnew_renewalverify.school_key_id=schoolnew_basicinfo.school_id
       //      WHERE schoolnew_basicinfo.block_id=".$blckid." AND curr_stat=1 group by schoolnew_manage_cate.id) as t ON t.id=schoolnew_manage_cate.id
       //      where schoolnew_manage_cate.id=2 OR schoolnew_manage_cate.id = 3 OR schoolnew_manage_cate.id=4";
       // $query = $this->db->query($SQL);
       // return $query->result_array();
    }
    
    
    function getSchoolandCountStudentsByCategoryInBlock($catId,$blckId){
        
        if($this->uri->segment(5,0)!=''){
            $att='AND schoolnew_basicinfo.school_id='.$this->uri->segment(5,0);
        }
        else{
            $att='';
        }
        
        $SQL="SELECT 
	(SUM(CASE WHEN students_child_detail.class_studying_id=0 THEN 1 ELSE 0 END)) as DISCLOSED,
	(SUM(CASE WHEN students_child_detail.class_studying_id=1 THEN 1 ELSE 0 END)) as CLASS_1,
    (SUM(CASE WHEN students_child_detail.class_studying_id=2 THEN 1 ELSE 0 END)) as CLASS_2,
    (SUM(CASE WHEN students_child_detail.class_studying_id=3 THEN 1 ELSE 0 END)) as CLASS_3,
    (SUM(CASE WHEN students_child_detail.class_studying_id=4 THEN 1 ELSE 0 END)) as CLASS_4,
    (SUM(CASE WHEN students_child_detail.class_studying_id=5 THEN 1 ELSE 0 END)) as CLASS_5,
    (SUM(CASE WHEN students_child_detail.class_studying_id=6 THEN 1 ELSE 0 END)) as CLASS_6,
    (SUM(CASE WHEN students_child_detail.class_studying_id=7 THEN 1 ELSE 0 END)) as CLASS_7,
    (SUM(CASE WHEN students_child_detail.class_studying_id=8 THEN 1 ELSE 0 END)) as CLASS_8,
    (SUM(CASE WHEN students_child_detail.class_studying_id=9 THEN 1 ELSE 0 END)) as CLASS_9,
    (SUM(CASE WHEN students_child_detail.class_studying_id=10 THEN 1 ELSE 0 END)) as CLASS_10,
    (SUM(CASE WHEN students_child_detail.class_studying_id=11 THEN 1 ELSE 0 END)) as CLASS_11,
    (SUM(CASE WHEN students_child_detail.class_studying_id=12 THEN 1 ELSE 0 END)) as CLASS_12,
    (SUM(CASE WHEN students_child_detail.class_studying_id=13 THEN 1 ELSE 0 END)) as LKG,
    (SUM(CASE WHEN students_child_detail.class_studying_id=14 THEN 1 ELSE 0 END)) as UKG,
    (SUM(CASE WHEN students_child_detail.class_studying_id=15 THEN 1 ELSE 0 END)) as PREKG,
    schoolnew_basicinfo.school_id,schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code FROM schoolnew_basicinfo 
    JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
    JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
    JOIN students_child_detail ON students_child_detail.school_id=schoolnew_basicinfo.school_id
    WHERE schoolnew_basicinfo.block_id=".$blckId." AND curr_stat=1 AND schoolnew_manage_cate.id=".$catId." ".$att." group by udise_code,school_name,school_id";
        
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getallrenewallist($where,$ts=' GROUP BY school_key_id',$category=1){
        $ifcondition='';
        /*if($this->session->userdata('user_type')>5){
            $ifcondition="IF(sch_directorate_id=28,IF(".$this->session->userdata('user_type').">6 AND ".$this->session->userdata('user_type')."!=7,high_class IS NULL OR high_class IS NOT NULL,high_class IS NULL),IF(".$this->session->userdata('user_type').">6,high_class IS NOT NULL,high_class<8)) AND";
        }
        else{
            $ifcondition='';
        }*/
        
        $SQL = "SELECT 
    T1.*, 
    schoolnew_renewapprove.timestamp as ts, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.auth ELSE NULL END) as approvedby, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.filename ELSE NULL END) as approvefile, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.filepath ELSE NULL END) as approvefilepath, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.remarks ELSE NULL END) as approveremarks, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.id ELSE NULL END) as approveid, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.fileno ELSE NULL END) as filenumber, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN 
        CASE WHEN schoolnew_renewapprove.auth IS NULL THEN DATEDIFF(DATE(NOW()),T1.createddate) ELSE 
            CASE schoolnew_renewapprove.auth WHEN 1 THEN 
                DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=1 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE CASE schoolnew_renewapprove.auth WHEN 2 THEN DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=2 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE CASE schoolnew_renewapprove.auth WHEN 3 THEN DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=3 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE CASE schoolnew_renewapprove.auth WHEN -1 THEN DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=2 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE CASE schoolnew_renewapprove.auth WHEN -2 THEN DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=-1 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE CASE schoolnew_renewapprove.auth WHEN -3 THEN DATEDIFF(DATE(NOW()),IFNULL((SELECT timestamp FROM schoolnew_renewapprove WHERE renewal_id=T1.id AND auth=-2 ORDER BY timestamp DESC LIMIT 1),T1.createddate)) 
            ELSE NULL END END END END END END END 
        ELSE CASE WHEN (SELECT renewal_id FROM schoolnew_renewapprove WHERE renewal_id=T1.id LIMIT 1) IS NULL THEN DATEDIFF(DATE(NOW()),T1.createddate) ELSE NULL END END) as apptimestamp 
        
    FROM (SELECT 
                schoolnew_renewal.id, 
                schoolnew_renewal.auth, 
                schoolnew_renewal.createddate, 
                schoolnew_renewal.school_key_id, 
                schoolnew_renewal.year_rec_remarks, 
                schoolnew_renewal.vaild_from, 
                schoolnew_renewal.vaild_upto, 
                schoolnew_renewal.renewal_id, 
                schoolnew_renewal.contidion_file, 
                (CASE schoolnew_renewcategory.applied_category WHEN 1 THEN 'RENEWAL' ELSE 
				CASE schoolnew_renewcategory.applied_category WHEN 2 THEN 'TAMIL MEDIUM' ELSE 
					CASE schoolnew_renewcategory.applied_category WHEN 3 THEN 'ADDITIONAL CLASSES OR UPGRADATION' ELSE
						CASE schoolnew_renewcategory.applied_category WHEN 4 THEN 'ADDITIONAL GROUPS' ELSE NULL END
                    END END END) AS appliedfor,  
                schoolnew_renewcategory.amount, 
                schoolnew_renewcategory.challan_no, 
                schoolnew_renewcategory.challan_date, 
                schoolnew_renewcategory.ifsc_code, 
                schoolnew_renewcategory.challan_filename, 
                schoolnew_renewcategory.challan_filepath, 
                schoolnew_renewal.file_exp, schoolnew_renewalfiles.id as fileid, 
                schoolnew_renewal.lastrenewal_filename, 
                schoolnew_renewal.lastrenewal_filepath, 
                schoolnew_renewalfiles.certificate_filename, 
                schoolnew_renewalfiles.certificate_filepath, 
                schoolnew_renewalfiles.certificate_exp, 
                schoolnew_renewalfiles.beo_certificateremarks, 
                schoolnew_basicinfo.udise_code, 
                schoolnew_basicinfo.school_name, 
                schoolnew_basicinfo.address, 
                schoolnew_basicinfo.pincode, 
                schoolnew_block.block_name, 
				schoolnew_block.id as block_id, 
                schoolnew_district.district_name, 
                schoolnew_edn_dist_mas.edn_dist_name,
                MAX(schoolnew_renewalfiles.certificate_id) AS lst, 
                schoolnew_renewalcertificate_master.id as certificate_id, 
                schoolnew_renewalcertificate_master.certificatename, 
                (CASE schoolnew_renewal.condsatisfied WHEN 1 THEN 'FULLY SATISFIED' ELSE 
                    CASE schoolnew_renewal.condsatisfied WHEN 2 THEN 'PARTLY SATISFIED' ELSE 
                        CASE schoolnew_renewal.condsatisfied WHEN 3 THEN 'NONE SATISFIED' ELSE 
                            CASE schoolnew_renewal.condsatisfied WHEN 4 THEN 'NOT APPLICABLE' ELSE NULL END END END END) AS conditionstatisfied, 
                (CASE schoolnew_renewal.fromclass WHEN 15 THEN 'PRE-KG' ELSE 
                    CASE schoolnew_renewal.fromclass WHEN 14 THEN 'UKG' ELSE 
                        CASE schoolnew_renewal.fromclass WHEN 13 THEN 'LKG' ELSE 
                            CASE WHEN schoolnew_renewal.fromclass IS NULL THEN NULL ELSE
                                schoolnew_renewal.fromclass END END END END) AS low_class, 
                (CASE schoolnew_renewal.toclass WHEN 15 THEN 'PRE-KG' ELSE 
                    CASE schoolnew_renewal.toclass WHEN 14 THEN 'UKG' ELSE 
                        CASE schoolnew_renewal.toclass WHEN 13 THEN 'LKG' ELSE 
                            CASE WHEN schoolnew_renewal.toclass IS NULL THEN NULL ELSE
                                schoolnew_renewal.toclass END END END END) AS high_class,
                schoolnew_academic_detail.low_class as lc,schoolnew_academic_detail.high_class as hc, 
                DATEDIFF(NOW(),schoolnew_renewal.createddate) as pending,
                schoolnew_basicinfo.sch_directorate_id,
                schoolnew_renewcategory.class_group
                FROM schoolnew_renewal
                JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category=".$category." 
                JOIN schoolnew_renewalfiles ON schoolnew_renewalfiles.renewal_id=schoolnew_renewal.id 
                JOIN schoolnew_renewalcertificate_master ON schoolnew_renewalcertificate_master.id=schoolnew_renewalfiles.certificate_id 
                JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id 
                JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id 
                JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id AND schoolnew_edn_dist_mas.id=schoolnew_basicinfo.edu_dist_id
                JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id
                JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.block_id AND schoolnew_block.id=schoolnew_basicinfo.block_id
                JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_renewal.school_key_id 
                JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id
            WHERE ".$ifcondition." 
            schoolnew_renewal.timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal ".$ts.") 
            ".$where." GROUP BY schoolnew_renewalfiles.id) AS T1 
            LEFT JOIN schoolnew_renewapprove ON schoolnew_renewapprove.renewal_id IN 
            (SELECT id FROM schoolnew_renewal WHERE schoolnew_renewal.timestamp IN (SELECT MAX(timestamp) FROM 
            schoolnew_renewal ".$ts.") AND (id IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth is NOT NULL))) GROUP BY fileid,approveid ORDER BY ts DESC;";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        if($query==null){
            return null;
        }
        else{
            return $query->result_array();    
        }
    }
    
    function updateBEOStatus($where1,$where2value,$where2index,$data,$table){
        if($where1!=''){
            $ind=explode(',',$where1);
            $this->db->where($ind[0],$ind[1]);  
            $this->db->where($where2index, $where2value);
            return $this->db->update($table, $data);  
        }
        elseif($where2index!='' && $where2value!='' && $where1==''){
            $this->db->where($where2index, $where2value);
            return $this->db->update($table, $data);  
        }
        elseif($where1=='' && $where2index=='' && $where2value=='' ){
            $this->db->insert($table,$data);
            return true;
        }
                 
    }
    
    function getRenewalBoardCount($where,$group,$cond="!='0000-00-00'"){
        $SQL="SELECT 
        	district_id as dist_id,
        	district_name, 
        	edu_dist_id as edudistrict_id, 
        	edu_dist_name as edn_dist_name, 
        	block_id as blk_id, 
        	block_name, 
        	school_id, 
        	school_name, 
        	udise_code,
        	schoolnew_renewal.id as renewal_id,
        	count(*) as catcount
        FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id) AND vaild_from".$cond.$where.$group.";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    
/***********************************************************Vivek Rao Bhosale**********************************************************************************/
        function getschoolrecognition_verification_details($blckid){
      
       $SQL="SELECT (count(*)+0) as total,schoolnew_manage_cate.id,schoolnew_manage_cate.manage_name as management_name,udise_code,management,mgt_opn_year,school_name,ref,department FROM schoolnew_basicinfo 
            JOIN schoolnew_management ON schoolnew_management.management_code=schoolnew_basicinfo.management_id
            JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_management.mana_cate_id
            JOIN students_child_detail ON students_child_detail.school_id=schoolnew_basicinfo.school_id
          /*  join schoolnew_renewalverify ON schoolnew_renewalverify.school_key_id=schoolnew_basicinfo.school_id*/
        join schoolnew_school_department on schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id
           /* where schoolnew_manage_cate.id=2 OR schoolnew_manage_cate.id = 3 AND schoolnew_manage_cate.id=4;*/;";
       $query = $this->db->query($SQL);
       return $query->result_array();
    }
    
    function checkauthendication($auth,$renewalID){
        $SQL="SELECT * FROM schoolnew_renewapprove WHERE auth=".$auth." AND renewal_id=".$renewalID.";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        if($query->result_array()==null){
            return null;
        }
        else{
            return $query->result_array();    
        }
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

         /**
         * Ceo District Dashboard School Type
         * VIT- Sriram
         * 26/01/2019
         **/
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
   function get_nonteaching_block_school($block_id,$cate_type){
      
      $this->db->select("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,school_name,block_id,school_id,udise_code,block_name");
        $this->db->from('teacher_profile_count');
        $this->db->join('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
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


  /*************************** Attendance Model Start****************************/

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
          ->join('(SELECT  a.teacher_name, IF(a.attstatus="", "1", "0") as present, `a`.`attres`,a.teacher_code,a.school_id FROM '.$table.' as `a` WHERE `a`.`date` = "'.$date.'") as a','a.teacher_code =  b.u_id','left')
          
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





  /*************************************** End ***********************************/
 function getalldistrictcountsbyteacherblock($block_id,$cate_type){
    $this->db->select('students_school_child_count.district_name,students_school_child_count.block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,district_name,schoolnew_basicinfo.block_id,schoolnew_basicinfo.beo_map')
    ->from('teacher_profile_count')  
    ->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=teacher_profile_count.school_key_id')
    ->join('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
        ->where('students_school_child_count.school_type','Government')
      // ->where('schoolnew_basicinfo.authenticate_1','1')
         ->where('students_school_child_count.block_id=',$block_id)
           ->group_by('schoolnew_basicinfo.beo_map')
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


      public function get_districtwise_report($user_type)
    {
       $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_where('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
    } 
     public function get_schoolwise_RTE_student($block_id)
      {

        $SQL=" select sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
join students_school_child_count sc on sc.school_id=st.school_id where sc.block_id=".$block_id." and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
 public function get_state_renewal_details($block_id)
           {
            $SQL="SELECT 
  (SELECT 
    COUNT(*)
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.block_id=".$block_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=0) AND schoolnew_renewal.vaild_upto IS NULL
  ) AS BEO,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.block_id=".$block_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL
    
  ) AS DE0,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
WHERE schoolnew_basicinfo.block_id=".$block_id." AND  (department like '%Directorate%of%School%Education%' OR  department 
 like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=2) AND schoolnew_renewal.vaild_upto IS NULL) AS CE0,
    (SELECT count(*) FROM schoolnew_renewal 
     JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    where schoolnew_basicinfo.block_id=".$block_id." AND vaild_from is not null and vaild_from !='0000-00-00') AS APPROVED,
  (SELECT count(*) FROM schoolnew_renewal 
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
  where schoolnew_basicinfo.block_id=".$block_id." AND vaild_from is not null and vaild_from ='0000-00-00') AS REJECTED,
    (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_basicinfo.block_id=".$block_id." AND schoolnew_renewal.vaild_upto IS NULL
  ) AS TOTAL,  school_name,udise_code,district_name,block_name,createddate, schoolnew_basicinfo.district_id,schoolnew_basicinfo.block_id
    FROM
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
   
    WHERE schoolnew_basicinfo.block_id=".$block_id."";
     $query = $this->db->query($SQL);
     return $query->result_array();
           }
           public function get_state_renewal_pending_details($block_id)

    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
         JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
        JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
        join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE schoolnew_basicinfo.block_id=".$block_id." AND (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=0) AND schoolnew_renewal.vaild_upto IS NULL";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
      public function get_state_deo_pending_details($block_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
    JOIN  schoolnew_edn_dist_block ON schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id
        WHERE schoolnew_basicinfo.block_id=".$block_id." AND (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
     public function get_state_ceo_pending_details($block_id)
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
   JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    join schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
       WHERE schoolnew_basicinfo.block_id=".$block_id." AND  (department like '%Directorate%of%School%Education%' OR  department like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove where auth=2) AND schoolnew_renewal.vaild_upto IS NULL";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

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

        function getRenewalrejected($where,$group){
        $SQL="SELECT 
                schoolnew_district.id as dist_id,
                district_name, 
                schoolnew_edn_dist_mas.id as edudistrict_id, 
                schoolnew_edn_dist_mas.edn_dist_name, 
                schoolnew_block.id as blk_id, 
                block_name, 
                schoolnew_basicinfo.school_id as school_id, 
                school_name, 
                udise_code,
                schoolnew_renewal.id as renewal_id,
                count(*) as catcount
            FROM 
              schoolnew_renewal
            JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id 
            JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id 
            JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.id=schoolnew_basicinfo.edu_dist_id AND schoolnew_edn_dist_mas.district_id=schoolnew_district.id 
            JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id 
            JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.block_id AND schoolnew_block.id=schoolnew_basicinfo.block_id
          where vaild_from is not null and vaild_from ='0000-00-00'".$where.$group.";";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
     public function get_renewal_rejected($block_id)
    {
   $SQL=   "SELECT  * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    where schoolnew_basicinfo.block_id=".$block_id." AND vaild_from is not null and vaild_from ='0000-00-00'";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

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
JOIN students_transfer_history   ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
WHERE  students_transfer_history.transfer_reason in (1,2,3,5) and students_school_child_count.block_id=".$block_id." AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 group by students_child_detail.unique_id_no";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_dist_student_migration_details($block_id)
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
   sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.district_name,sch2.edu_dist_name,sch2.block_name,sch2.school_name
from students_transfer_history
join students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit) as T1
WHERE block_id=".$block_id."
GROUP BY school_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_migration_detail_student($block_id,$school_type_from,$school_type_to)
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
WHERE  sch2.block_id=".$block_id." AND sch1.school_type='".$school_type_from."' AND sch2.school_type='".$school_type_to."' ) as T1
GROUP BY unique_id_no";

         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_unrecognized_school($block_id)
{
  $SQL="select *,count(*) as tot
from schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
where curr_stat=1 AND  schoolnew_block.id='".$block_id."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
} 
public function get_school_profile_verification_district($block_id,$school_type,$cate_type)
{
  $this->db->SELECT('*,schoolnew_academic_detail.school_type as sch_typ');
 $this->db->FROM('schoolnew_academic_detail');
$this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_academic_detail.school_key_id');
$this->db->JOIN('schoolnew_training_detail','schoolnew_training_detail.school_key_id=schoolnew_academic_detail.school_key_id');
$this->db->WHERE('students_school_child_count.block_id',$block_id);

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
public function get_school_land_verification_district($block_id,$school_type,$cate_type)
{
   $this->db->SELECT(' * ');
    $this->db->FROM('schoolnew_infra_detail');
$this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
 $this->db->WHERE('students_school_child_count.block_id',$block_id);
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
 public function get_school_sanitation_verification_district($block_id,$school_type,$cate_type)
{
  $this->db->SELECT(' * ');
  $this->db->FROM('schoolnew_infra_detail');
 $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
  $this->db->WHERE('students_school_child_count.block_id',$block_id);
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
 public function govt_enrollment($block_id)
          {
        $SQL="SELECT count(*) as total FROM students_child_detail
JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id
 WHERE block_id=".$block_id." AND class_studying_id in (13,14,15,1)  AND  doj BETWEEN '2019-03-01' AND NOW() AND created_at BETWEEN '2019-03-01 00:00:00'AND NOW() AND schoolnew_basicinfo.manage_cate_id=1"; 
//print_r($SQL);
//die();
        $query = $this->db->query($SQL);
        return $query->result();
            
          }
           public function get_school_committee_verification_district($block_id)
{
  $SQL="SELECT * FROM schoolnew_committee_detail JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_committee_detail.school_key_id WHERE students_school_child_count.block_id=".$block_id." GROUP BY school_id";

         $query = $this->db->query($SQL);
       return $query->result(); 

}
	/****************************************************
			Magesh
	****************************************************/
	
	public function getschool($where,$group) {
		$sql = "select students_school_child_count.district_name,school_type,students_school_child_count.block_name, district_name, management, cate_type, students_school_child_count.school_id, students_school_child_count.udise_code, students_school_child_count.teach_tot,students_school_child_count.school_name,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total from students_school_child_count
		join schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id ".$where.$group."";
		
		//echo $sql;
		//die();
		$query = $this->db->query($sql);
		return $query->result();
	
	}
	   public function get_state_school($block_id)
    {
     // print_r($sql);
        $sql="select district_id,management,count(*) as s_cnt from students_school_child_count where block_id=".$block_id." group by management;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
   
     public function get_state_school_wise($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and students_school_child_count.block_id='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dee($block_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (2,3,16,18,27,29,32,34,42) AND block_id=".$block_id." group by management";
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
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and students_school_child_count.block_id='".$block_name."' and sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dse($block_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND block_id=".$block_id." group by management";
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
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) and students_school_child_count.block_id='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dms($block_id)
    {
     // print_r($sql);
        $sql="select block_name,management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (28) and block_id=".$block_id." group by management";
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
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (28) and students_school_child_count.block_id='".$block_name."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
      public function get_state_school_others($block_id)
    {
     // print_r($sql);
        $sql="select management,count(*) as s_cnt from students_school_child_count where sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) and block_id=".$block_id." group by management";
        $query = $this->db->query($sql);
       //  print_r($this->db->last_query());
        return $query->result();

    }
  
     public function get_state_school_wise_others($block_name,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count
left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id where management='".$mang."' and sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) and students_school_child_count.block_id='".$block_name."' group by school_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
	
	/***************************************************
	***************************************************/

   function get_dist_school_timetable_details($school_cate,$block_id,$this_week_fst,$this_week_ed){
       if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where=" where students_school_child_count.cate_type in ('".$cate_type."') and class_id not in (13,14,15)";
    }
    else
    {
     $where="AND class_id not in (13,14,15)";
    }
       $SQL="select count(a.class_id)as totalclasssection,OUTPUT,school_key_id,school_name,block_name,district_name,district_id,udise_code from  schoolnew_section_group a
   left join students_school_child_count on students_school_child_count.school_id=a.school_key_id
   left join (SELECT COUNT(1) AS OUTPUT, school_id FROM (select count(*) as marked,school_id from schoolnew_timetable_weekly_classwise
   where  timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class_id,section,school_id) AS marked GROUP BY school_id
   ) as b on a.school_key_id = b.school_id 
   where students_school_child_count.block_id=".$block_id." ".$where." group by school_key_id";
   
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
public function slas_report_cate_dist($blk_id)
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
(SELECT district_name,district_id,cate_type,catty_id,block_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.block_id=".$blk_id."
 GROUP BY students_school_child_count.catty_id";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_mana_dist($blk_id)
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
(SELECT block_id,district_name,district_id,students_school_child_count.management,students_school_child_count.manage_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 WHERE des1.block_id=".$blk_id."
 GROUP BY students_school_child_count.manage_id";
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
   
}
?>