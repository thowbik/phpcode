<?php

class Registermodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


    function getuserlogindata($candidateid){

     // $this->db->select('*')
     //          ->from('emis_userlogin')
     //          ->where('emis_user_id',$candidateid);               
     //          $query = $this->db->get();      
     //   return $query->result();

    }

    function emissturegdata($data){
   return $this->db->insert('students_child_detail', $data); 
   //echo json_encode($data);
    }

    function getsinglecolmnname($colmnnname,$id){
       $this->db->select('*'); 
       $this->db->from('students_school_child_count');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
   function gettotalcolmnname($colmnnname,$id){
       $this->db->select('*'); 
       $this->db->from('students_school_child_count');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }

    function getudiscecode($scl_id){
              $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$scl_id); 
       $query =  $this->db->get();
       return $query->row('udise_code');  
    }

    function maxallchildcount($schoolid,$data){
             $this->db->where('school_id',$schoolid); 
      return $this->db->update('students_school_child_count', $data); 
    }

    function getcommunitycode($commid){
       $this->db->select('*'); 
       $this->db->from('baseapp_community');
       $this->db->where('id',$commid); 
       $query =  $this->db->get();
       return $query->row('community_code');
    }

    function getsinglecommname($colmnnname,$id,$comm){
       $this->db->select('*'); 
       $this->db->from('students_community_school_count');
       $this->db->where('school_id',$id); 
        $this->db->where('community_code',$comm); 
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
   function gettotalcommname($colmnnname,$id,$comm){
       $this->db->select('*'); 
       $this->db->from('students_community_school_count');
       $this->db->where('school_id',$id);
        $this->db->where('community_code',$comm);  
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
        function maxallcommcount($schoolid,$comm,$data){
             $this->db->where('school_id',$schoolid); 
              $this->db->where('community_code',$comm);
      return $this->db->update('students_community_school_count', $data); 
    }


        function getpoolchildcount($colmnnname,$id){
       $this->db->select('*'); 
       $this->db->from('students_pool_child_count');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
   function gettotalpoolchildcount($colmnnname,$id){
       $this->db->select('*'); 
       $this->db->from('students_pool_child_count');
       $this->db->where('school_id',$id);  
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
        
		function maxpoolchildcount($schoolid,$data){
        $this->db->where('school_id',$schoolid); 
      return $this->db->update('students_pool_child_count', $data); 
    }


        function getpoolcommcount($colmnnname,$id,$comm){
       $this->db->select('*'); 
       $this->db->from('students_community_pool_count');
       $this->db->where('school_id',$id); 
        $this->db->where('community_code',$comm); 
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }
   function gettotalpoolcommcount($colmnnname,$id,$comm){
       $this->db->select('*'); 
       $this->db->from('students_community_pool_count');
       $this->db->where('school_id',$id);
        $this->db->where('community_code',$comm);  
       $query =  $this->db->get();
       return $query->row($colmnnname);  
    }

        function maxallpoolcommcount($schoolid,$comm,$data){
             $this->db->where('school_id',$schoolid); 
              $this->db->where('community_code',$comm);
      return $this->db->update('students_community_pool_count', $data); 
    }

    function getregstudentcount($schoolid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$schoolid); 
       $query =  $this->db->get();
       return $query->row('student_id_count'); 
    }
    function getregupdatecount($schoolid,$updatcount){
      $data=array('student_id_count'=>$updatcount);
      $this->db->where('school_id',$schoolid); 
      return $this->db->update('schoolnew_basicinfo', $data); 
    }

//***************** Aadhaar Number Verification for registration *************************************8//

    function aadhaarverifi($aadhaar){
       $this->db->select('id'); 
       $this->db->from('students_child_detail');
       $this->db->where('aadhaar_uid_number',$aadhaar); 
       
       $query =  $this->db->get();
       return $query->row('id'); 
    }


//**************************** student child count abstract update ******************************//

  function getstudentdata($schoolid,$gender)
  {
     $this->db->select('class_studying_id as class,count(id) as count')
           ->from('students_child_detail')
            ->where('transfer_flag',0)
            ->where('gender',$gender)
            ->where('school_id',$schoolid)
            ->group_by('class_studying_id');

        $query =  $this->db->get();
       if($query->num_rows() > 0){
       return $query->result();
       }else{
        return false;
       }
  }

    function getstudentdatancaste($schoolid,$gender)
  {
     $this->db->select('students_child_detail.class_studying_id as class,count(students_child_detail.id) as count, baseapp_community.community_name as community,baseapp_community.community_code as ccode')
           ->from('students_child_detail')
           ->join('baseapp_community','students_child_detail.community_id = baseapp_community.id')
            ->where('students_child_detail.transfer_flag',0)
            ->where('students_child_detail.gender',$gender)
            ->where('students_child_detail.school_id',$schoolid)
            ->group_by('students_child_detail.class_studying_id')
            ->group_by('baseapp_community.community_code');

        $query =  $this->db->get();
       if($query->num_rows() > 0){
       return $query->result();
       }else{
        return false;
       }
  }


    


  /**
  * Students Search 
  * VIT-Sriram  
  * 26/03/2019
  **/

  public function get_students_admit_details($search,$db_col,$db_sub_col,$class_id)
  {
      $this->db->select('a.unique_id_no,a.name,a.id,a.gender,a.class_studying_id,a.class_section,a.education_medium_id,a.school_admission_no,a.request_flag,a.school_id,a.dob,a.transfer_flag,c.community_name,b.school_name,a.smart_id')
               ->from('students_child_detail a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->join('baseapp_community c','c.id = a.community_id','left')
               // ->where('a.transfer_flag',1)
               ->where($db_col,$search);
               if(!empty($db_sub_col) && $class_id !=-1)
               {
                  $this->db->where($db_sub_col,$class_id);
               }
      $result = $this->db->get()->result();
       //print_r($result);
      $records = [];
      if(!empty($result))
      {
          $records['data'] = $result;
          $records['status'] = true;
          $records['message'] = '';
      }else
      {
           $records['data'] = '';
          $records['status'] = false; 
          $records['message'] = 'No Data Available';
      }
      return $records;

  }
  public function get_students_admit_details_arch($search,$db_col,$db_sub_col,$class_id)
  {
      $this->db->select('*')
               ->from('students_cpool_archive201819 a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->join('baseapp_community c','c.id = a.community_id','left')
               // ->where('a.transfer_flag',1)
               ->where($db_col,$search);
               if(!empty($db_sub_col) && $class_id !=-1)
               {
                  $this->db->where($db_sub_col,$class_id);
               }
      $result = $this->db->get()->result_array();;
       //print_r($result);
      $records = [];
      if(!empty($result))
      {
          $records['data'] = $result;
          $records['status'] = true;
          $records['message'] = '';
      }else
      {
           $records['data'] = '';
          $records['status'] = false; 
          $records['message'] = 'No Data Available';
      }
      return $records;

  }

  /**
  * Studnets Aadhar Check Details
  * VIT-sriram
  * 02/04/2019
  **/

  public function check_aadhar_details($aadhar,$unique_id_no)
  {           
    if (filter_var($aadhar, FILTER_VALIDATE_INT)) 
    {
              $this->db->select('unique_id_no,aadhaar_uid_number,id')
                       ->from('students_child_detail')
                       ->where('aadhaar_uid_number',$aadhar);
          $result = $this->db->get()->first_row();
    // print_r($this->db->last_query());
      if(!empty($result))
      {
        if($unique_id_no != $result->unique_id_no){
        return true;}else
        {
          return false;
        }
      }else
      {
        return false;
      }
    }else
    {
      return 2;
    }
  }



  /**
  * Students Admitted
  * VIT-sriram
  * 27/03/2019
  **/

  public function update_students_info($update,$table,$where_condition)
  {
    // echo "update function";

      $this->db->where($where_condition);
      $this->db->update($table,$update);
      // print_r($this->db->last_query());die;
      return $update;
  }

  /**
  * Students Transfer
  * VIT-sriram
  * 27/03/2019
  **/

  public function save_students_info($save,$table)
  {
    // print_r($table);die;
        $this->db->insert($table,$save);
        return $this->db->insert_id();


  }

  /*
  * Transfer History 
  * VIT-sriram
  * 27/03/2019 
  **/

  public function get_transfer_history($data)
  {
        // print_r($data);

      $this->db->order_by('id','DESC');
      $this->db->limit($data['limit']);
       $result = [];
      if($data['get_result']==1){
       $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->first_row();
    }else
    {
      $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->result();
    }
      // print_r($this->db->last_query());die;
    // print_r($result);die;
      return $result;

  }


public function insert_students_info($unique_id)
  {
     $SQL=   "SELECT * FROM students_cpool_archive201819 where unique_id_no=".$unique_id."";
            $query = $this->db->query($SQL);
        return $query->result_array();


  }
  public function check_unique_id($unique_id)
  {
     $SQL=   "SELECT count(unique_id_no) as uni FROM students_child_detail where unique_id_no=".$unique_id."";
            $query = $this->db->query($SQL);
        return $query->result_array();


  }
  
   function insert_stud_cmn_data($data){
   return $this->db->insert('students_child_detail', $data); 
   //echo json_encode($data);
    }

}

?>