 <?php

class Udise_adminmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


    function admin2insert($record){
      $this->db->insert('schoolnew_academicinfo2',$record);
    }

    function updateadmindata($data,$school_id)
    {
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('schoolnew_academicinfo2', $data);         
    }
    
    // ***** Function for Udise Adminstrative info getting data *****
    function get_udise_admin_info($school_id)
    {
      $this->db->select('rsp_lndlne_std,rsp_lndlne_no,rsp_mbl_no,yr_estd_schl,acd_sess_mnth,yr_rec_schl_elem,yr_rec_schl_elem,yr_rec_schl_sec,yr_rec_schl_hsc,yr_upgrd_schl_pri_uppr,yr_upgrd_schl_upr_sec,yr_upgrd_schl_sec_hsc,shftd_schl,pri_stg_mothr_tngue,schl_ofr_prevoc_cours,schl_prvd_edu_voc_gud,pri_schl,uppri_schl,sec_schl,hsc_schl,schl_aprch_alwther');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('schoolnew_academicinfo2');
      return $query->result();
    }
    // ***** Function for Udise Adminstrative info getting data Ended*****


    // ***** Function for Udise Adminstrative info getting data page3 *****
    function get_udise_admin_infopg3($school_id)
    {
      $this->db->select('instr_dys_pri,instr_dys_sec,instr_dys_uppri,instr_dys_hsc,hrs_chldrn_sty_schl_pri,mins_chldrn_sty_schl_pri,hrs_chldrn_sty_schl_sec,mins_chldrn_sty_schl_sec,hrs_chldrn_sty_schl_uppri,mins_chldrn_sty_schl_uppri,hrs_chldrn_sty_schl_hsc,mins_chldrn_sty_schl_hsc,hrs_tchrs_sty_schl_pri,mins_tchrs_sty_schl_pri,hrs_tchrs_sty_schl_sec,mins_tchrs_sty_schl_sec,hrs_tchrs_sty_schl_uppri,mins_tchrs_sty_schl_uppri,hrs_tchrs_sty_schl_hsc,mins_tchrs_sty_schl_hsc,chldrns_enrld_25prcnt_rte,stud_admsn_25prcnt_prv_yr,mtngs_smc_prev_acdyr,smc_prep_sdp,vists_acd_inspec,vists_crc_cord,vists_blcklvl_brc,smdc_metng_lstacd_yr,smdc_prpd_schl_imprv,sbc_constitd,schl_constitd_acd');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('schoolnew_academicinfo2');
      return $query->result();
    }
    // ***** Function for Udise Adminstrative info getting data page3 Ended*****

    // ***** Function for Udise Adminstrative info getting data page5 *****
    function adminpage5data($school_id)
    {
      $this->db->select('resid_schl,typ_resid_schl,brdng_fac_avl_stg,resid_pri_stud,resid_pri_stud_g,resid_pri_stud_b,resid_uppri_stud,resid_uppri_stud_g,resid_uppri_stud_b,resid_sec_stud,resid_sec_stud_g,resid_sec_stud_b,resid_hsc_stud,resid_hsc_stud_b,resid_hsc_stud_g,min_mangd_schl,typ_minrty_cmnty,prepri_sction_atchd_schl,tot_stud_prepri_grd,tot_tchr_prepri,angwdi_cntr_schlcmps,angwdi_cntr_tot_chldrs,tot_tchrs_angwdi_wrks,cce_imp_schl,cce_imp_schl_elem,cce_imp_schl_sec,cce_imp_schl_hsc,cumm_rcrd_ppl_mntnd,cumm_rcrd_ppl_shrwthprnts,smc_constud,smc_tot_membr_mle,smc_tot_membr_fmle,smc_membr_parnts_mle,smc_membr_parnts_fmle,smc_reprsnt_loc_auth_mle,smc_reprsnt_loc_auth_fmle,sep_bnk_smc_maintnd,smc_brnch,smc_bnk_nme,smc_acc_no,smc_ifsc,smc_acc_nme,chld_enrld_attndspectrng,no_chldrs_spectrng_utsep30_b,no_chldrs_spectrng_utsep30_g,no_chldrs_spectrng_enrld_acadyr_b,no_chldrs_spectrng_enrld_acadyr_g,no_chldrs_spectrng_cmpltd_prevacdyr_b,no_chldrs_spectrng_cmpltd_prevacdyr_g,who_condct_spec_trng,spec_trng_cndt,typ_trng_condct');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('schoolnew_academicinfo2');
      return $query->result();
    }
    // ***** Function for Udise Adminstrative info getting data page5 Ended*****

    function adminpage6data($school_id)
    {
      $this->db->select('fulset_txtbok_recvd,txtbok_recvd_crntacd_mnth,txtbok_recvd_crntacd_yr,cmplt_txtbok_recvd_pri,cmplt_txtbok_recvd_uppri,tle_avl_grd_pri,tle_avl_grd_uppri,ply_matrl_pri,ply_matrl_uppri,ply_matrl_sec,smc_smdc_same_schl,smdc_constud,smdc_tot_membr_m,smdc_tot_membr_f,smdc_noof_repr_pta_m,smdc_noof_repr_pta_f,smdc_noof_repr_lcbdy_m,smdc_noof_repr_lcbdy_f,smdc_noof_mebrs_edubckmin_m,smdc_noof_mebrs_edubckmin_f,smdc_noof_mebrs_wms_f,smdc_noof_mebrs_scst_m,smdc_noof_mebrs_scst_f,smdc_noof_nmines_deo_m,smdc_noof_nmines_deo_f,smdc_noof_nmines_aad_m,smdc_noof_nmines_aad_f,smdc_noof_subjt_exp_m,smdc_noof_subjt_exp_f,smdc_noof_techrs_m,smdc_noof_techrs_f,smdc_prnclorhm_cp_m,smdc_prnclorhm_cp_f,smdc_chrprsn_m,smdc_chrprsn_f,sep_bnk_smdc_maintnd,smdc_brnch,smdc_bnk_nme,smdc_acc_no,smdc_ifsc,smdc_acc_nme,schl_pta,pta_metng_hld_yr');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('schoolnew_academicinfo2');
      return $query->result();
    }

    // Administrative page Info update
    function admininfoupdate($data,$school_id)
    {
      $this->db->where('school_key_id', $school_id);      
      return $this->db->update('schoolnew_academicinfo2', $data);         
    }
    

}
?>