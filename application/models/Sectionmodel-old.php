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

    function getallclasssections($school_id ){
        

        $this->db->select('id,class_id,sections,section_ids,no_stud,tam_stud,un_aided_section_ids'); 
        $this->db->where('school_key_id', $school_id ); 
        $this->db->order_by('id', 'ASC');
        $query =  $this->db->get('schoolnew_class_section');
        $result = $query->result();
        $CI =& get_instance();
        foreach ($result as $row) {
            
            $class = $this->get_mapping_class($row->class_id);
            $row->class_id = $class[0]->class_studying;
        }
        return $result ;


    }

   /*function getclasssection_details($data,$school_id){

    	$this->db->select('sections,section_ids,no_stud,tam_stud,un_aided_section_ids'); 
        $this->db->where('school_key_id', $school_id);
         $this->db->where('class_id', $data) ; 
        $query =  $this->db->get('schoolnew_class_section');
        return $query->result();
    } */

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

    function insert_data($data){

      return $this->db->insert('schoolnew_class_section', $data); 

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