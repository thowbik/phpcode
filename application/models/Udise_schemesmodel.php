 <?php

class Udise_schemesmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    

   

    // schemes1 update
    function updateschemes1($data,$school_id,$facility)
    {
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_scheme_pri', $data);
    }

    // schemes1 viedata
    function viewschemes1($school_id,$facility)
    {
      $this->db->select('facility,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g,musmin_b,musmin_g,othmin_b,othmin_g'); 
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_scheme_pri');
      return $query->result();
    }

    // schemes1 viewdata
    function viewschemes1dta($school_id){
      $this->db->select('udise_scheme_pri.*,udise_scheme_master.*')
              ->from('udise_scheme_pri')
              ->join('udise_scheme_master','udise_scheme_pri.facility=udise_scheme_master.facility_code')
              ->where('udise_scheme_pri.school_key_id',$school_id);               
              $query = $this->db->get();      
              return $query->result();
    }

    // schemes1 insert
    function insertschme1($record){
      $this->db->insert('udise_scheme_pri',$record);
    }


     function updateschemes2($data,$school_id,$facility)
    {
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_scheme_uppr', $data);
    }


    // schemes2 viedata
    function viewschemes2($school_id,$facility)
    {
      $this->db->select('facility,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g,musmin_b,musmin_g,othmin_b,othmin_g'); 
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_scheme_uppr');
      return $query->result();
    }

    // schemes2 viewdata
    function viewschemes2dta($school_id){
      $this->db->select('udise_scheme_uppr.*,udise_scheme_master.*')
              ->from('udise_scheme_uppr')
              ->join('udise_scheme_master','udise_scheme_uppr.facility=udise_scheme_master.facility_code')
              ->where('udise_scheme_uppr.school_key_id',$school_id);               
              $query = $this->db->get();      
              return $query->result();
    }

    // schemes2 insert
    function insertschme2($record){
      $this->db->insert('udise_scheme_uppr',$record);
    }


    // schemes3 insert
    function insertschme3($record){
      $this->db->insert('udise_scheme_sec',$record);
    }
    // schemes3 insert Ending

    // schemes3 update
    function updateschemes3($data,$school_id,$facility)
    {
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_scheme_sec', $data);
    }
    // schemes3 update Ending

    // schemes3 viedata based on school_id
     function viewschemes3($school_id,$facility)
     {
       $this->db->select('facility,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g,musmin_b,musmin_g,othmin_b,othmin_g');
       $this->db->where('facility',$facility) ;
       $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_scheme_sec');
      return $query->result();
    }
    // schemes3 viedata

    // schemes3 viewdata joins based on category
    function viewschemes3dta($school_id){
      $this->db->select('udise_scheme_sec.*,udise_scheme_master.*')
              ->from('udise_scheme_sec')
              ->join('udise_scheme_master','udise_scheme_sec.facility=udise_scheme_master.facility_code')
              ->where('udise_scheme_sec.school_key_id',$school_id);               
              $query = $this->db->get();      
              return $query->result();
    }
    // schemes3 viewdata joins based on category Ending

    // schemes4 insert
    function insertschme4frm1($record){
      $this->db->insert('udise_scheme_hr',$record);
    }
    // schems4 Insert Ending

    // schemes4 update
    function updateschemes4($data,$school_id,$facility)
    {
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_scheme_hr', $data);
    }

    // schemes4 viewdata
     function viewschemes4($school_id,$facility)
     {
       $this->db->select('facility,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g,musmin_b,musmin_g,othmin_b,othmin_g'); 
       $this->db->where('facility',$facility);
       $this->db->where('school_key_id', $school_id);
      $query =  $this->db->get('udise_scheme_hr');
      return $query->result();
    }
    // schemes4 viewdata Ending


    // schemes4 viewdata joins based on category
    function viewschemes4dta($school_id){
      $this->db->select('udise_scheme_hr.*,udise_scheme_master.*')
              ->from('udise_scheme_hr')
              ->join('udise_scheme_master','udise_scheme_hr.facility=udise_scheme_master.facility_code')
              ->where('udise_scheme_hr.school_key_id',$school_id);               
              $query = $this->db->get();      
              return $query->result();
    }
    // schemes4 viewdata joins based on category Ending

    // schemes4 form2 Insert
    function insertschme4frm2($record){
      $this->db->insert('udise_scheme_cwsn',$record);
    }
    // schemes4 form2 Insert Ending
    // schemes4 form2 update
    function updateschemes4frm2($data,$school_id,$facility)
    {
      $this->db->where('facility',$facility);
      $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_scheme_cwsn', $data);
    }

    // schemes4 viewdata
     function viewschemes4frm2($school_id,$facility)
     {
       $this->db->select('facility,ele_b,ele_g,sec_b,sec_g,hsc_b,hsc_g'); 
       $this->db->where('facility', $facility); 
       $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_scheme_cwsn');
      return $query->result();
    }
    // schemes4 viewdata Ending

    // schemes4 data view based on school_id only
    function viewschemes4frm2dta($school_id)
     {
       $this->db->select('facility,ele_b,ele_g,sec_b,sec_g,hsc_b,hsc_g'); 
       $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_scheme_cwsn');
      return $query->result();
    }
    // schemes4 data view based on school_id only Ending
      
}
?>