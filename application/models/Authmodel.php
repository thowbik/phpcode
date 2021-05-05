
<?php

class Authmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

      function loginverfication($data)
    {
        $identity    = $data['identity'];
        $password    = $data['password'];

         if($identity != "" && $password != "")
            {
                $this->db->select('*')
                ->from('emis_userlogin')
                ->where('emis_userlogin.emis_username',$identity)
                ->where('emis_userlogin.emis_password',$password)
                ->where('status','Active');
                
                
                  $query = $this->db->get();
                   if($query -> num_rows() == 1)
                       {
                         return $query->result();
                       }
                       else
                       {
                        // echo "else";die;
                         $this->db->select('*')
                ->from('emisuser_teacher')
                ->where('emisuser_teacher.emis_username',$identity)
                ->where('emisuser_teacher.emis_password',$password)
                ->where('status','Active');
                $query = $this->db->get();
                   if($query -> num_rows() == 1)
                       {
                         return $query->result();
                       }else
                       {
                        return false;
                       }

                       }
            } 
    }

        function usernameverfication($data)
    {
        $identity    = $data['identity'];
        $password = $data['password'];
         if($identity != "")
            {
                $this->db->select('*')
                ->from('emis_userlogin')
                ->where('emis_userlogin.emis_username',$identity);
                  $query = $this->db->get();
                   if($query -> num_rows() == 1)
                       {
                         return $query->result();
                       }
                       else
                       {
                         $this->db->select('*')
                ->from('emisuser_teacher')
                ->where('emisuser_teacher.emis_username',$identity)
                ->where('emisuser_teacher.emis_password',$password)
                ->where('status','Active');
                $query = $this->db->get();
                   if($query -> num_rows() == 1)
                       {
                         return $query->result();
                       }else
                       {
                        return false;
                       }
                       }
            } 
    }


    function update_log_status($caid,$data){

       $this->db->where('emis_user_id',$caid);
       return $this->db->update('emis_userlogin', $data);
    }

    function getuserlogindata($candidateid){

     $this->db->select('*')
              ->from('emis_userlogin')
              ->where('emis_user_id',$candidateid);               
              $query = $this->db->get();      
       return $query->result();

    }
    function getusertype($id){

     $this->db->select('*')
              ->from('user_category')
              ->where('id',$id);               
              $query = $this->db->get();      
       return $query->row('user_type');
    }

    function getschooldetails($schoolid){
           $this->db->select('schoolnew_basicinfo.*,schoolnew_academic_detail.*')
              ->from('schoolnew_basicinfo')
              ->join('schoolnew_academic_detail','schoolnew_basicinfo.school_id=schoolnew_academic_detail.school_key_id','left')
              ->where('schoolnew_basicinfo.school_id',$schoolid);               
              $query = $this->db->get();      
       return $query->result();
    }

      function gettemplogschool($school_id){
         $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('emis_user_id',$school_id); 
       $this->db->where('emis_usertype',1);
       $query =  $this->db->get();
       return $query->row('temp_log');
    }

      function gettempemail($school_udise){
             $this->db->select('sch_email'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('udise_code',$school_udise); 
       $query =  $this->db->get();
       return $query->row('sch_email');
    }

      function gettempmob($school_udise){
             $this->db->select('mobile'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('udise_code',$school_udise); 
       $query =  $this->db->get();
       return $query->row('mobile');
    }


    
     function checkemailuser($udisecode){
      $this->db->select('schoolnew_basicinfo.*,schoolnew_district.email')
      ->from('schoolnew_basicinfo')
	  ->join('schoolnew_district','schoolnew_basicinfo.district_id=schoolnew_district.id')
      ->where('schoolnew_basicinfo.udise_code',$udisecode);
       
        $query = $this->db->get();
         if($query -> num_rows() == 1)
             {
               return $query->result();
             }
             else
             {
               return false;
             }
     }



    
    

    function gettemplog1school($school_id){
        $this->db->select('*'); 
        $this->db->from('emis_userlogin');
        $this->db->where('emis_user_id',$school_id); 
        $this->db->where('emis_usertype',1); 
        $query =  $this->db->get();
        return $query->row('temp_log1');
    }


    /**
    * Get Barcode decode Students Data
    * VIT-sriram
    * 25/02/2019
    **/

    public function get_barcode_students_details($student_id)
    {
      $this->db->select('a.name,a.father_name,a.dob,a.bloodgroup,b.school_name,a.unique_id_no,a.bloodgroup,c.group')
      ->from('students_child_detail a')
      ->join('students_school_child_count b','b.school_id = a.school_id')
      ->join('baseapp_bloodgroup c','c.id = a.bloodgroup')
      ->where('a.unique_id_no',$student_id);

      $result = $this->db->get()->first_row();

      return $result;
    }


    /**
    * Teaching Teacher Login 
    * VIT-sriram
    * 06/03/2019
    **/

    public function get_teaching_teacher_login($teacher_id)
    {

      $this->db->select('teacher_type.category,udise_staffreg.school_key_id')
               ->from('udise_staffreg')
               ->join('teacher_type','teacher_type.id = udise_staffreg.teacher_type')
               ->where('u_id',$teacher_id);
      $result = $this->db->get()->first_row();

      return $result;

    }


    /**
    * Forget password EMIS
    * VIT-sriram
    * 08/03/2019
    **/

    public function get_EMIS_user_details($udise_code,$teacher_code)
    {
      // echo $udise_code.'-'.$teacher_code;die;
      $this->db->select('school_id,district_id,block_id,edu_dist_id');
      $school_result = $this->db->get_where('students_school_child_count',array('udise_code'=>$udise_code))->first_row();
      // print_r($this->db->last_query());
      // print_r($school_result);die;
      $result_arr = [];
      if(!empty($school_result))
      {

          $this->db->where('udise_code',$udise_code);
          $this->db->where('mbl_nmbr',$teacher_code);
          $teacher_result = $this->db->count_all_results('udise_staffreg');

          if(!empty($teacher_result))
          {
            $result_arr['status'] = 1;
            $result_arr['data']  = $school_result;

          }else
          {
            $result_arr['status'] = 0;
            $result_arr['message'] = 'No Teacher Code Found!.. Please enter valid Teacher Code';
          }

      }else
      {
        $result_arr['status'] = 0;
        $result_arr['message'] = 'No Udise Code Found!.. Please enter valid Udise Code!';
      }

      return $result_arr;

    }


    /**
    * Save Request Forget Password
    * VIT-sriram
    * 08/03/2019
    **/

    public function save_forget_user_details($save)
    {

        $this->db->trans_start();
      $this->db->insert('emis_userlog', $save); 
      //$this->db->update('T_PONO_Reset_Table')
            
      $insert_id = $this->db->affected_rows();         
      $this->db->trans_complete();

      return $insert_id;
    }
    
    /************************** Vivek Rao Bhosale Ramco Limited ***************/
    function getAllUserCategory(){
        $this->db->select('*'); 
        $this->db->from('user_category'); 
        $query =  $this->db->get();
        return $query->result();
    }
    
} ?>