 <?php

class Udise_assetmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    // function for insert the asset data initially
    function assetinsrt($record){
      $this->db->insert('udise_asset',$record);
    }

    function get_asset1_form_details($school_id){
       $this->db->select('buil_status,buil_type,bndrywl_type,landavail_expnsin,seprom_headteach,elecon_avail,substo_newsppr,noofcomp_avail,noofcom_func,puc_gdcondt,puc_minrpr,puc_majrpr,par_puc_gdcondt,par_puc_minrpr,par_puc_majrpr,kuch_gdcondt,kuch_minrpr,kuch_majrpr,tnt_gdcondt,tnt_minrpr,tnt_majrpr'); 
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_asset');
      return $query->result();
    }

    function get_asset2_form_details($school_id){
      $this->db->select('clsrms_usdfrinspurp,clsrms_undrcons,clsrms_dilap,frnitravail_frstu,otofclsrms_pri,otofclsrms_sec,otofclsrms_uprpri,otofclsrms_hsc,totno_rmsavl_othrthclsrms,nooftoilts_avl_bys,nooftoilts_avl_gls,nooftoilts_func_bys,nooftoilts_func_gls,noofcwsnfrndly_func_toilts_bys,noofcwsnfrndly_func_toilts_gls,toiltsavl_rnigwtr_flshingndclning_bys,toiltsavl_rnigwtr_flshingndclning_gls,noofurnls_avl_bys,noofurnls_avl_gls,urnlshv_wtrfac_bys,urnlshv_wtrfac_gls,hndwshfacavl_toiltsurnlsblck,lib_avl,lib_totnoboks,bokbnk_avl,bokbnk_totnoboks,redngcorn_avl,redngcorn_totnoboks,schlhav_fultimlib'); 
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_asset');
      return $query->result();
    }

    function get_asset3_form_details($school_id){
      $this->db->select('drnkingwtravl_schprmis,mnsrc_drnkingwtr,wtrpur_avl,hvprov_rainwtrharvst,schlhv_plygrnd,schlhv_alt_arngmnts,schlhv_cal,schlhv_smtclsrms,schlhv_comptab,schlhv_netfac,medchckupcondct_lstacdmicyr,totnoofmedchckupcondct_lastacademicyear,dewormtablts_chldrns,irnflictblts_wcd,rmp_disbledchldrs,hndrlrmp_avl'); 
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_asset');
      return $query->result();
    }

    function get_asset4_form_details($school_id)
    {
      $this->db->select('seprm_asst_hmorvicpric,sepcomrom_gls,stfrom_tchrs,comp_lab,cocriclractvtyartsrom,staff_quarters,integrtdscinc_lab,lib_room,ado_visl_pub_addr_sys,fire_exting,scince_kit,math_kit,biomet_dev,phy_seprom_avl,phy_prsntcondit,che_seprom_avl,che_prsntcondit,bio_seprom_avl,bio_prsntcondit,comp_seprom_avl,comp_prsntcondit,math_seprom_avl,math_prsntcondit,lng_seprom_avl,lng_prsntcondit,geo_seprom_avl,geo_prsntcondit,hmescince_seprom_avl,hmescince_prsntcondit,psyc_seprom_avl,psyc_prsntcondit'); 
      $this->db->where('school_key_id', $school_id); 
      $query =  $this->db->get('udise_asset');
      return $query->result();
    }

    
    // update Asset module Details
    function updatedata($data,$school_id)
    {
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);         
    }

    function assetform1update($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }

    function asset2form1update($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }


    function asset2form2update($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }


     function asset2form3update($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }


    function asset3formupdate($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }

    function asset4formupdate($data,$school_id){
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_asset', $data);
    }
   
}
?>