 <?php

class Adminmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

    function updatedata($data,$school_id)
    {
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('schoolnew_academicinfo', $data);         
    }
    function get_admin_form1_details($school_id)
    {
    	$this->db->select('school_key_id, low_class, high_class, board, noof_med, schooltype, smc_smdc, minority, tamil_med,eng_med, tel_med, mal_med, kan_med, urdu_med, oth_med,hin_med'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_academicinfo');
    	return $query->result();
    }
	function get_admin_form2_details($school_id)
    {
    	$this->db->select('start_order, start_yr, hssstart_order,hssstart_yr, upgr_det'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_academicinfo');
    	return $query->result();
    }
    function get_admin_form3_details($school_id)
    {
    	$this->db->select('spl_school,boarding'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_academicinfo');
    	return $query->result();
    }

    function get_admin_form3_section_details($school_id)
    {
        $this->db->select('class_id,sections,section_ids,no_stud'); 
        $this->db->where('school_key_id', $school_id); 
        $query =  $this->db->get('schoolnew_class_section');
        return $query->result();

    }

    function get_admin_form4_details($school_id)
    {
    	$this->db->select('extra_scout,extra_jrc,extra_nss,extra_ncc,extra_rrc,extra_ec,extra_cub'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_academicinfo');
    	return $query->result();
    }
    function get_admin_form5_details($school_id)
    {
    	$this->db->select('group_name, sec_in_group'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_sch_groups');
    	return $query->result();
    }
    function get_admin_form6_details($school_id)
    {
        $this->db->select('post_name_id,post_sub_id,post_mode,post_sanc,post_GO,post_GO_dt,post_GO_pd,post_filled,post_vac'); 
        $this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_staff');
    	return $query->result();
    }
    function get_admin_form7_details($school_id)
    {
    	$this->db->select('post_name_id,post_sub_id,post_mode,post_sanc,post_GO,post_GO_dt,post_GO_pd,post_filled,post_vac'); 
    	$this->db->where('school_key_id', $school_id); 
    	$query =  $this->db->get('schoolnew_academicinfo');
    	return $query->result();
    }
    function get_all_mediums()
    {
        $this->db->select('col_name, education_medium'); 
        $query =  $this->db->get('schoolnew_mediummapping');
        $posts = array();

        // For the purposes of this example, we'll only return the title
        foreach ($query->result() as $row) {
            $posts[$row->col_name] = $row->education_medium;
        }
        return $posts ;

                    
         

    }
    function getmedium($data)
    {
      $this->db->select('*'); 
      $this->db->where('id', $data);      
      $query = $this->db->get('schoolnew_mediummapping'); 
      return $query->result();
    }
    function updatemediumdata($data,$school_id)
    {
      
     
      $datanew = array( $data => 1 );
     
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('schoolnew_academicinfo', $datanew); 
    }
    
    function clearmediumdata($school_id)
    {  
    //eng_med, tel_med, mal_med, kan_med, urdu_med, oth_med
       $datanew = array( 'tamil_med' => 0,
                         'eng_med'=> 0,
                         'tel_med'=> 0,
                         'mal_med'=> 0,
                         'kan_med'=> 0,
                          'urdu_med'=> 0,
                          'oth_med' => 0,
                          'hin_med' =>0  );
     
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('schoolnew_academicinfo', $datanew); 
    }

    function combinemediums($data)
    {
      $this->db->select('id'); 
      $this->db->where('col_name',$data);      
      $query = $this->db->get('schoolnew_mediummapping'); 
      return $query->result();

    }



}
?>