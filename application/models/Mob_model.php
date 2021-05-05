<?php

class Mob_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }



    function getschoolprofiledetails($udisecode){
        $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('udise_code',$udisecode); 
       $query =  $this->db->get();
       return $query->result();
   }

   function getclasslistsplit($low,$high){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id>=',$low); 
       $this->db->where('id<=',$high); 
       $query =  $this->db->get();
       return $query->result();
  }

  function getallstandardsbyschool($id){
       $this->db->select('low_class,high_class'); 
       $this->db->from('schoolnew_academicinfo');
       $this->db->where('school_key_id',$id); 
       $query =  $this->db->get();
       return $query->result();
    }

     function getallsectionsbyclass($schoolid,$classid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_class_section');
       $this->db->where('class_id', $classid);
       $this->db->where('school_key_id', $schoolid);   
       $query =  $this->db->get();
     return $query->row('section_ids'); 

    }


    // function getallbrachesbyschoolinchildetail_stu($schoolid,$class_id){
    //    $this->db->select('name'); 
    //    $this->db->from('students_child_detail');
    //    $this->db->where('school_id',$schoolid);
    //    $this->db->where('class_studying_id',$class_id);
    //    $this->db->where('transfer_flag',0); 
    //    $query =  $this->db->get();
    //    return $query->result();
    // }

    function getallbrachesbyschoolinchildetail_stu2($schoolid){
       $this->db->select('count(unique_id_no) as count,class_studying_id'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0); 
       $this->db->group_by('class_studying_id');

       $query =  $this->db->get();
       return $query->result();
    }


    function getallsectionstrengthsbyclass_stu($schoolid,$class_id){
      $this->db->select('count(unique_id_no) as count,class_section'); 
     $this->db->from('students_child_detail');
     $this->db->where('school_id',$schoolid);
     $this->db->where('class_studying_id', $class_id);    
     $this->db->where('transfer_flag',0);
     $this->db->group_by('class_section');
     $query =  $this->db->get();
     return $query->result(); 

   }

   function getallstudsbyclsecnew_stu($schoolid,$classid,$section){
       $this->db->select('name,unique_id_no'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);       
       $this->db->where('class_studying_id', $classid); 
       $this->db->where('class_section', $section);        
       $this->db->where('transfer_flag',0);
       $this->db->order_by('name','asc');

       $query =  $this->db->get();
       return $query->result();  
    }


    function getallbrachesbyschoolinchildetail_idcard($schoolid){
       $this->db->select('count(unique_id_no) as count,class_studying_id'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0); 
       $this->db->where('idcardstatus','Not Aprooved');
       $this->db->group_by('class_studying_id');
       $query =  $this->db->get();
       return $query->result();
    }


    function getallsectionstrengthsbyclass($schoolid,$class_id){

    $this->db->select('count(unique_id_no) as count,class_section'); 
     $this->db->from('students_child_detail');
     $this->db->where('school_id',$schoolid);
     $this->db->where('class_studying_id', $class_id);    
     $this->db->where('transfer_flag',0);
     $this->db->where('idcardstatus','Not Aprooved');
     $this->db->group_by('class_section');
     $query =  $this->db->get();
     return $query->result(); 
   }

   function getallstudsbyclsecnew($schoolid,$classid,$section){
       $this->db->select('name,unique_id_no'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id', $classid); 
       $this->db->where('class_section', $section); 
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Not Aprooved');
       $this->db->order_by('name','asc');

       $query =  $this->db->get();
       return $query->result();  
    }

function getallbrachesbyschoolinchildetail_idcard1($schoolid){

   $this->db->select('count(unique_id_no) as count,class_studying_id'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0); 
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0');
       $this->db->group_by('class_studying_id');
       $query =  $this->db->get();
       return $query->result();

    }

    function getallsectionstrengthsbyclass1($schoolid,$class_id){
     $this->db->select('count(unique_id_no) as count,class_section'); 
     $this->db->from('students_child_detail');
     $this->db->where('school_id',$schoolid);
     $this->db->where('class_studying_id', $class_id);    
     $this->db->where('transfer_flag',0);
     $this->db->where('idcardstatus','Aprooved');
     $this->db->where('idapproove','0'); 
     $this->db->group_by('class_section');
     $query =  $this->db->get();
     return $query->result();  

   }

   function getallstudsbyclsecnew1($schoolid,$classid,$section){
       $this->db->select('name,unique_id_no'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id', $classid);
       $this->db->where('class_section', $section); 
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0');
       $this->db->order_by('name','asc');

       $query =  $this->db->get();
       return $query->result();  
    }

     function getallgenders($stuid){
       $this->db->select('students_child_detail.*'); 
       $this->db->from('students_child_detail');
       $this->db->where('students_child_detail.unique_id_no',$stuid); 
       $query =  $this->db->get();
       return $query->result();  
    }

     function getallbloodgroups(){
       $this->db->select('*'); 
       $this->db->from('baseapp_bloodgroup'); 
       $query =  $this->db->get();
       return $query->result();  
    }

    function getstuprofile($studentid){
    $this->db->select('*'); 
    $this->db->from('students_child_detail');
    $this->db->where('unique_id_no',$studentid);
    $query =  $this->db->get();
    return $query->result();  
    }

     function getalldistrict(){
     $this->db->select('id,district_name')
          ->from('schoolnew_district');              
          $query = $this->db->get();      
     return $query->result();
    }
    

    function getclasses($schoolid)
    {
    $this->db->select('schoolnew_class_section.class_id'); 
    $this->db->from('schoolnew_class_section');
    $this->db->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=schoolnew_class_section.school_key_id');
    $this->db->where('schoolnew_basicinfo.udise_code',$schoolid);
    $this->db->order_by('schoolnew_class_section.class_id','asc');
    $query =  $this->db->get();
    return $query->result(); 
    }

    function getsections($schoolid,$classid)
    {
    $this->db->select('schoolnew_class_section.section_ids'); 
    $this->db->from('schoolnew_class_section');
    $this->db->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=schoolnew_class_section.school_key_id');
    $this->db->where('schoolnew_basicinfo.udise_code',$schoolid);
    $this->db->where('schoolnew_class_section.class_id',$classid);
    
    $query =  $this->db->get();
    return $query->result(); 
    }

    function savestudentimage($studentid,$data)
    {
        $this->db->where('unique_id_no', $studentid);
       return  $this->db->update('students_child_detail', $data);
    }

    function gettotalcount($schoolid)
    {
    $this->db->select('count(students_child_detail.unique_id_no) as count'); 
    $this->db->from('students_child_detail');
    $this->db->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=students_child_detail.school_id');
    $this->db->where('schoolnew_basicinfo.udise_code',$schoolid);
    $this->db->where('transfer_flag',0);

    $query =  $this->db->get();
    return $query->result(); 
    }

    function getdataapprovalcount($schoolid)
    {
    $this->db->select('count(students_child_detail.unique_id_no) as count'); 
    $this->db->from('students_child_detail');
    $this->db->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=students_child_detail.school_id');
    $this->db->where('schoolnew_basicinfo.udise_code',$schoolid);
    $this->db->where('idcardstatus','Aprooved');
    $this->db->where('transfer_flag',0);

    $query =  $this->db->get();
    return $query->result(); 
    }

    function getidapprovalcount($schoolid)
    {
    $this->db->select('count(students_child_detail.unique_id_no) as count'); 
    $this->db->from('students_child_detail');
    $this->db->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id=students_child_detail.school_id');
    $this->db->where('schoolnew_basicinfo.udise_code',$schoolid);
    $this->db->where('idapproove','1');
    $this->db->where('transfer_flag',0);

    $query =  $this->db->get();
    return $query->result(); 
    }

    function maintenancemode(){
    $this->db->select('status,description'); 
    $this->db->from('maintenance');
    $this->db->where('appname','emididcard');
    $query =  $this->db->get();
    return $query->result();  
    }

    function attendancedata($school_id)
    {
    $this->db->select('session_1,session_2,date'); 
    $this->db->from('statt_student_attendance_logs');
    $this->db->where('school_id','school_id');
    $query =  $this->db->get();
    return $query->result();  
    }


}
?>