<?php

class Apimodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

    function getstuprofile($studentid){
    $this->db->select('name,dob,father_name,unique_id_no,class_studying_id'); 
    $this->db->from('students_child_detail');
    $this->db->where('unique_id_no',$studentid);
    $query =  $this->db->get();
    return $query->result();  
    }



} ?>