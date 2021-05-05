 <?php

class Udise_financemodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    


    // finance module

    // table1 Insert
    function financetb1insrt($record){
      $this->db->insert('udise_finance_schoolfunds',$record);
    }
    // table1 Insert Ending


    // Finance Fund module update value
    function updatefinfund($data,$school_id){
     $this->db->where('school_key_id', $school_id);
      return $this->db->update('udise_finance_schoolfunds',$data);
    }


    // Finance Fund module view data
    function financefund($school_id){
      $this->db->select('schl_dev_grnt_recpt,schl_dev_grnt_expdtr,schl_maintnc_grnt_recpt,schl_maintnc_grnt_expdtr,schl_tlm_grnt_recpt,schl_tlm_grnt_expdtr');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('udise_finance_schoolfunds');
      return $query->result();
    }


     // table2 Insert
    function financetb2insrt($record){
      $this->db->insert('udise_finance_grantsbyschool',$record);
    }
    // table2 Insert Ending

     // Finance Expenditure module Update data
     function updatefinexpenditre($data,$school_id){
      $this->db->where('school_key_id',$school_id);
       return $this->db->update('udise_finance_grantsbyschool',$data);
     }


     // Finance Expenditure module view data
     function financeexpnditre($school_id){
      $this->db->select('cvlwrk_grntsrecv,cvlwrk_grntsspnt,cvlwrk_grntsspil,anlsch_grntsrecv,anlsch_grntsspnt,anlsch_grntsspil,minrpr_grntsrecv,minrpr_grntsspnt,minrpr_grntsspil,repndreplac_grntsrecv,repndreplac_grntsspnt,repndreplac_grntsspil,purc_grntsrecv,purc_grntsspnt,purc_grntsspil,mtng_grntsrecv,mtng_grntsspnt,mtng_grntsspil,othr_grntsrecv,othr_grntsspnt,othr_grntsspil,tot_grntsrecv,tot_grntsspnt,tot_grntsspil');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('udise_finance_grantsbyschool');
      return $query->result();
      }


      
}
?>