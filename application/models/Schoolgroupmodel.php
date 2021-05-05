 <?php

class Schoolgroupmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }
    function getallgroupdata($school_id)
    {
       $this->db->select('id,group_name,sec_in_group'); 
        $this->db->where('school_key_id', $school_id); 
        $query =  $this->db->get('schoolnew_sch_groups');
        return $query->result();
    }

   function delete_group_details($id,$school_id){

      $this->db->where('school_key_id', $school_id);  
      $this->db->where('id', $id) ;    
      return $this->db->delete('schoolnew_sch_groups'); 
    }
    function update($data,$id,$group_name,$school_id){

     $this->db->where('school_key_id', $school_id);  
      $this->db->where('id', $id) ;    
      $this->db->where('group_name',$group_name);
      return $this->db->update('schoolnew_sch_groups',$data);

    }
    function add($data) {

      return $this->db->insert('schoolnew_sch_groups', $data); 


    }
    function getallschoolgroups($school_id)
    {
        $this->db->select('group_name'); 
        $this->db->where('group_name NOT IN(SELECT group_name FROM schoolnew_sch_groups WHERE school_key_id='.$school_id.')') ;
        $query =  $this->db->get('schoolnew_groups');
        return $query->result();

    }


}

?>