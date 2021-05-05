 <?php

class Sectionmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

    function get_mapping_class($data)
   {
        $this->db->select('class_studying'); 
        $this->db->where('id', $data); 
        $query =  $this->db->get('baseapp_class_studying');
        return $query->result();
   }
 
  // function get_class_section_data($class_id)
   // {
        // $this->db->select('count(class_id) as countclassid'); 
        // $this->db->where('class_id',$class_id); 
        // $query =  $this->db->get('school_class_section_details');
        // return $query->first_row();
   // }
    function getallclasssections($school_id ){
       

        $this->db->select('schoolnew_section_group.id,schoolnew_section_group.class_id,schoolnew_section_group.section,schoolnew_section_group.group_id,schoolnew_section_group.school_type,schoolnew_section_group.school_medium_id,schoolnew_mediumofinstruction.MEDINSTR_DESC,baseapp_group_code.group_name') 
        ->from('schoolnew_section_group')
        ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_section_group.school_medium_id','left')
        ->join('baseapp_group_code ','baseapp_group_code.id=schoolnew_section_group.group_id','left')
        ->where('schoolnew_section_group.school_key_id',$school_id)
		//->group_by('schoolnew_section_group.group_id')
        ->order_by('schoolnew_section_group.id', 'DESC');
		//->limit('5');

        $query =  $this->db->get();
		//print_r($this->db->last_query());die;
		return $query->result();
		
    }  
   

    function getallstandards($school_id){
       //get lowest and highest standard
 
      	$this->db->select('low_class,high_class'); 
        $this->db->where('school_key_id', $school_id);
        $query =  $this->db->get('schoolnew_academicinfo');
        $data = $query->result();
        if(empty($data))
        {   return $data ;}
        else
        {
            $this->db->select('class_id'); 
            $this->db->where('school_key_id', $school_id ); 
            $query =  $this->db->get('schoolnew_class_section');
            $exsisting_stanadards = $query->result();  

            $raw_id= array();
            foreach($exsisting_stanadards as $row){
               $raw_id[] = $row->class_id;
             }
            $process_ids = implode(",",$raw_id);
            $ids = explode(",", $process_ids);     

            $this->db->select('id,class_studying'); 
            $this->db->where('id >=', $data[0]->low_class);
            $this->db->where('id <=', $data[0]->high_class);
            $this->db->where_not_in('id',$ids);
            $query =  $this->db->get('baseapp_class_studying');
            return $query->result();
        }
      

    }
    function update($data,$class_id,$id,$school_id){

      $this->db->where('school_key_id', $school_id);  
      //$this->db->where('class_id', $class_id) ;
      $this->db->where('id', $id);  
          
      return $this->db->update('schoolnew_class_section', $data); 

    }

    function delete_classsection_details($id,$school_id){

      $this->db->where('school_key_id', $school_id);  
      $this->db->where('id', $id) ;    
      return $this->db->delete('schoolnew_class_section'); 
    }
    function getclasstype($school_id)
	{
	
	$this->db->select('low_class,high_class');
	$this->db->from('students_school_child_count');
	$this->db->where('school_id',$school_id);
    $query =  $this->db->get();
      return $query->result();
	}
    
    function getschool_medium()
	{
	$school_id = $this->session->userdata('emis_school_id');
	//print_r($school_id);
	$this->db->select('schoolnew_mediumofinstruction.*');
	$this->db->from('schoolnew_mediumentry');
	$this->db->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut','left');
	$this->db->where('school_key_id',$school_id);
    $query =  $this->db->get();
      return $query->result();
	}
    
    
	function getschool_groupname()
	{
	$this->db->select('*');
    $query = $this->db->get('baseapp_group_code');
    return $query->result();
	}
	function getschool_cate($school_id){
		$this->db->select('manage_cate_id'); 
        $this->db->where('school_id',$school_id);
        $query =  $this->db->get('schoolnew_basicinfo');
        return $query->result();
       
    }
    function insert_data($data){

      return $this->db->insert('schoolnew_class_section', $data); 

    }
	function insert_class_data($data){
     $this->db->insert('schoolnew_section_group',$data); 
     return $this->db->insert_id();
    }
    
	function check_section_data($school_id,$classname,$sectionname){
		$this->db->select('count(class_section) as classcount'); 
        $this->db->where('school_id',$school_id);
        $this->db->where('class_studying_id',$classname); 		
		$this->db->where('class_section', $sectionname);
        $this->db->where('transfer_flag',0); 		
        $query =  $this->db->get('students_child_detail');
        return $query->result();
       
    }
	
	
	function delete_class_data($deletedid){
		 $this->db->where('id', $deletedid);
         $this->db->delete('schoolnew_section_group'); 
		return $this->db->insert_id();
       
    }
	function update_class_data($data,$updateid){
		 // print_r($data);
		 // die();
		 //$this->db->where('school_key_id',$school_id ); 
		 $this->db->where('id',$updateid);
         $this->db->update('schoolnew_section_group',$data); 
		return $this->db->insert_id();
       
    }
	

    function get_number_of_sections($class_id,$id,$school_id){
      $this->db->select('sections'); 
        $this->db->where('school_key_id', $school_id ); 
        $this->db->where('id', $id ); 
        $this->db->where('class_id', $class_id ); 
        $query =  $this->db->get('schoolnew_class_section');
        return $query->result();

    }
    function get_number_of_sections_student($class_id,$school_id){

       $this->db->select('class_section'); 
        $this->db->where('school_id', $school_id ); 
        $this->db->where('class_studying_id', $class_id ); 
        $this->db->distinct();
        $query =  $this->db->get('students_child_detail');
        return count($query->result());




    }

 }
?>