<?php

class Udise_sdvarmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    // state defined variable insert data
    function sdvarinsrt($record){
        $this->db->insert('udise_sdvar',$record);
    }

    function updatesdvariabledata($data,$school_id){
 	$this->db->where('school_key_id',$school_id);
 	return $this->db->update('udise_sdvar',$data);
 }
 
    function get_sdvardata1($school_id){
    	$this->db->select('tvfnctnl,mathkit_recvd,tchrsnd_mathkittrning,boksavail_rdcrnr,chldrnsactulyrdngcrnr_hm,schl_situtd,schl_email,brteinchrge_name,resn_toiltsnotfunc,land_availconstrc,drnkngwtrfacprovchldrn_allwrkngdys,wtrfac_avail,schlprvded_ovrhdtnk,compsupld_ssa,compsupld_dse,compsupld_dee,compsupld_rmsa,compsupld_othrs,compwrkngcond_ssa,compwrkngcond_dse,compwrkngcond_dee,compwrkngcond_rmsa,compwrkngcond_othrs,laptps_avail,laptpssplied_ssa,laptpssplied_dse,laptpssplied_dee,laptpssplied_rmsa,laptpssplied_othrs');
    	$this->db->where('school_key_id',$school_id);
    	$query = $this->db->get('udise_sdvar');
    	return $query->result();
    }


    function get_sdvardata2($school_id){
    	$this->db->select('laptpswrkngcond_ssa,laptpswrkngcond_dse,laptpswrkngcond_dee,laptpswrkngcond_rmsa,laptpswrkngcond_othrs,lcdprojtrs_avail,lcdprojtrswrkng_cond,lcdprojtrssplied_ssa,lcdprojtrssplied_dse,lcdprojtrssplied_dee,lcdprojtrssplied_rmsa,lcdprojtrssplied_othrs,apfcd_instld_deskndlaptps,rmpsprvdedundr_ssa,rmpsprvdedundr_pwd,rmpsprvdedundr_othrs,bnchsnddesks_avail,bnchsnddesks_reqrd,smc_contrb,firextinsr,watpurf,cmpondwalreq_lngth,schlrepcrdisplyd_ntcbrd,udisedtashrd_smc,smdc_contrb,vistsmd_ceodeo,vistsmd_adpcedc,toilts_dilpcondit');
    	$this->db->where('school_key_id',$school_id);
    	$query = $this->db->get('udise_sdvar');
    	return $query->result();
    }


    function get_sdvardata3($school_id){
    	$this->db->select('schlprvd_npknvenmchn,toiltsconstrc_psucsr,toiltsconstrc_rd,toiltsconstrc_nabard,toiltsconstrc_ssa,toiltsconstrc_rmsa,toiltsconstrc_othrs,schlprvd_airpurif,santrywrkrengedcl_tolts,land_min2t3cnts,sufficntwatfac_garmntence,tvdvd_avail,supld_ssa,schlhv_brdbndintrntfac,intrntfac_prvdby,incinrtravail_glstoilt,instltin_electormanl,rampsavail_usbuldngs,nooframps_req');
    	$this->db->where('school_key_id',$school_id);
    	$query = $this->db->get('udise_sdvar');
    	return $query->result();
    }

    

}
?>