     <?php

class Districtmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


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

    function get_school_by_id($school_id,$district_id){

      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$school_id);
      $this->db->where('curr_stat',1);
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();


   }

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


public function get_cat_cond($post_id)
    {
     $this->db->select('post');
     $this->db->where('post_id',$post_id);
     $this->db->from('master_staff_type');
     $query = $this->db->get();
     // print_r($this->db->last_query());
     return $query->result(); 
    }


    public function ins_staf_history($data){
      $this->db->insert('teacher_trans_history',$data);
    }

    public function get_techerdetails($tech_id){
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

    
    /* This function Created by Venba Tamilmaran for listing the school */
	function get_school_list_district($district_id){
       $this->db->select('schoolnew_basicinfo.*,schoolnew_manage_cate.manage_name'); 
       $this->db->from('schoolnew_basicinfo');
	    $this->db->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id');
       $this->db->where('district_id',$district_id); 
       $query =  $this->db->get();
       return $query->result();
	 }
	 /* This function Created by Venba Tamilmaran for listing the school after the filter */
	 function get_school_list_district_cate($district_id,$schoolcategory){
        $this->db->select('schoolnew_basicinfo.*,schoolnew_manage_cate.manage_name'); 
       $this->db->from('schoolnew_basicinfo');
	   $this->db->join('schoolnew_manage_cate','schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id');
       $this->db->where('district_id',$district_id); 
	   $this->db->where('manage_cate_id',$schoolcategory);
       $query =  $this->db->get();
       return $query->result();
	 }
	 /* This function Created by Venba Tamilmaran for Update the school data */
   function update_school_district_data($school_id,$data){
      $this->db->where('school_id',$school_id); 
      $this->db->update('schoolnew_basicinfo',$data); 
     return $this->db->insert_id();
	}


 }?>