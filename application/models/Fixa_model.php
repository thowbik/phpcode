 <?php

class Fixa_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

   
    function get_fixa_dtls($udise_id)
    {
    	$this->db->select('*'); 
    	$this->db->where('udise_code',$udise_id); 
    	$query =  $this->db->get('emis_staff_fixa');
    	return $query->result();
    }

}
?>