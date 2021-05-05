<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
// form validations

   function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->database(); 
    $this->load->model('Homemodel');
     $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel');
    $this->load->model('Blockmodel');

    // ***** Load Model for Udise_adminmodel *****
    $this->load->model('Udise_adminmodel');  
    date_default_timezone_set('Asia/Kolkata');  


  
  }


   public function emis_school_admin1()
   {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

        $emis_templog =$this->session->userdata('emis_school_templog');
       $emis_templog1 =$this->session->userdata('emis_school_templog1');
       if($emis_templog==0 || $emis_templog1==0){
          redirect('home/emis_school_gotoredirect','refresh');
       }

      else{
          $user_type_id=$this->session->userdata('emis_user_type_id');
          if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {

                $school_id = $this->session->userdata('emis_school_id');   
                $details = $this->Adminmodel->get_admin_form1_details($school_id);

                $data['school_key_id'] = $details[0]->school_key_id;
                $data['low_class'] = $details[0]->low_class;
                $data['high_class'] = $details[0]->high_class;
                $data['board'] = $details[0]->board;
                $data['noof_med'] = $details[0]->noof_med;
                
                $data['type_school'] = $details[0]->schooltype;
                $data['smc'] = $details[0]->smc_smdc;
                $data['minority'] = $details[0]->minority;

                $data['mediums'] = $this->Adminmodel->get_all_mediums(); 

              
                 $result_arr = array();

                if ($details[0]->tamil_med)
                {
              
                  
                  array_push($result_arr,"tamil_med");
                }

                if ($details[0]->eng_med)
                {
                  
                  array_push($result_arr,"eng_med");
                }

                if ($details[0]->tel_med)
                {
                  
                 
                  array_push($result_arr,"tel_med");
                }

                if ($details[0]->mal_med)
                {
                  
                  array_push($result_arr,"mal_med");
                }

                if ($details[0]->kan_med)
                {
                  
                  array_push($result_arr,"kan_med");
                }

                if ($details[0]->urdu_med)
                {
                 
                  array_push($result_arr,"urdu_med");
                }
                
                if ($details[0]->oth_med)
                {
                  array_push($result_arr,"oth_med");
                }

                if ($details[0]->hin_med)
                {
                  array_push($result_arr,"hin_med");
                }


               //log_message('debug', json_encode($result_arr) );

                $data['selected_mediums'] = json_encode($result_arr);

                $this->load->view('emis_school_admin1',$data);

           }else{ redirect('/', 'refresh');}
       }
    }else { redirect('/', 'refresh'); }


   }
   /*public function emis_school_admin2()
   {
    $details = $this->Adminmodel->get_admin_form2_details();
    $data['start_order'] = $details[0]->start_order;
    $data['start_yr'] = $details[0]->start_yr;
    $data['hssstart_order'] = $details[0]->hssstart_order;
    $data['hssstart_yr'] = $details[0]->hssstart_yr;
    $data['upgr_det'] = $details[0]->upgr_det;


    $this->load->view('emis_school_admin2',$data);

   } */
   public function emis_school_admin2()
   {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
     $school_udise = $this->session->userdata('emis_school_udise');
    if($emis_loggedin) {

         $emis_templog =$this->session->userdata('emis_school_templog');
         $emis_templog1 =$this->session->userdata('emis_school_templog1');
         if($emis_templog==0 || $emis_templog1==0){
            redirect('home/emis_school_gotoredirect','refresh');
     }

      else{
              $user_type_id=$this->session->userdata('emis_user_type_id');
              if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {
         
                $school_id = $this->session->userdata('emis_school_id');   
                $details = $this->Adminmodel->get_admin_form3_details($school_id);
                $data['current_spl_school'] = $details[0]->spl_school;
                $data['current_boarding'] = $details[0]->boarding;
                $data['details'] = $this->Adminmodel->get_admin_form3_section_details($school_id);
                 

                // ********* Udise administrative Info datas *********
                $udise_admin                    = $this->Udise_adminmodel->get_udise_admin_info($school_id);

                if (!$udise_admin) {

                  $record = array(
                      'udise_code'    => $school_udise,
                      'school_key_id' => $school_id,
                      'createdat'     => date('Y-m-d H:i:s')
                      );
                    $this->Udise_adminmodel->admin2insert($record);
                  
                }

                $udise_admin                    = $this->Udise_adminmodel->get_udise_admin_info($school_id);

                $data['rsp_lndlne_std']         = $udise_admin[0]->rsp_lndlne_std;
                $data['rsp_lndlne_no']          = $udise_admin[0]->rsp_lndlne_no;
                $data['rsp_mbl_no']             = $udise_admin[0]->rsp_mbl_no; 
                $data['yr_estd_schl']           = $udise_admin[0]->yr_estd_schl;
                $data['acd_sess_mnth']          = $udise_admin[0]->acd_sess_mnth; 
                $data['yr_rec_schl_elem']       = $udise_admin[0]->yr_rec_schl_elem;
                $data['yr_rec_schl_sec']        = $udise_admin[0]->yr_rec_schl_sec;
                $data['yr_rec_schl_hsc']        = $udise_admin[0]->yr_rec_schl_hsc;
                $data['yr_upgrd_schl_pri_uppr'] = $udise_admin[0]->yr_upgrd_schl_pri_uppr;
                $data['yr_upgrd_schl_upr_sec']  = $udise_admin[0]->yr_upgrd_schl_upr_sec;
                $data['yr_upgrd_schl_sec_hsc']  = $udise_admin[0]->yr_upgrd_schl_sec_hsc;
                $data['shftd_schl']             = $udise_admin[0]->shftd_schl;
                $data['pri_stg_mothr_tngue']    = $udise_admin[0]->pri_stg_mothr_tngue;
                $data['schl_ofr_prevoc_cours']  = $udise_admin[0]->schl_ofr_prevoc_cours;
                $data['schl_prvd_edu_voc_gud']  = $udise_admin[0]->schl_prvd_edu_voc_gud;
                $data['pri_schl']               = $udise_admin[0]->pri_schl;
                $data['uppri_schl']             = $udise_admin[0]->uppri_schl;
                $data['sec_schl']               = $udise_admin[0]->sec_schl;
                $data['hsc_schl']               = $udise_admin[0]->hsc_schl;
                $data['schl_aprch_alwther']     = $udise_admin[0]->schl_aprch_alwther;
                // ********* Udise administrative Info datas Ending ********* 

                $this->load->view('emis_school_admin2',$data);
              }else{ redirect('/', 'refresh');}
            }
     }else { redirect('/', 'refresh'); }

   }
   public function emis_school_admin3()
   {
    $school_udise = $this->session->userdata('emis_school_udise');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }
      else{
              $user_type_id=$this->session->userdata('emis_user_type_id');
              if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {

                  $school_id = $this->session->userdata('emis_school_id');   
                  $details = $this->Adminmodel->get_admin_form4_details($school_id);

                  $data['current_extra_scout']              = $details[0]->extra_scout;
                  $data['current_extra_jrc']                = $details[0]->extra_jrc;
                  $data['current_extra_nss']                = $details[0]->extra_nss;
                  $data['current_extra_ncc']                = $details[0]->extra_ncc;
                  $data['current_extra_rrc']                = $details[0]->extra_rrc;
                  $data['current_extra_ec']                 = $details[0]->extra_ec;
                  $data['current_extra_cub']                = $details[0]->extra_cub;

                  // ***** Udise Administrative Info page 3 data *****
                  $udise_admin                              = $this->Udise_adminmodel->get_udise_admin_infopg3($school_id);

                  if (!$udise_admin) {

                  $record = array(
                      'udise_code'    => $school_udise,
                      'school_key_id' => $school_id,
                      'createdat'     => date('Y-m-d H:i:s')
                      );
                    $this->Udise_adminmodel->admin2insert($record);
                  
                }

                $udise_admin                              = $this->Udise_adminmodel->get_udise_admin_infopg3($school_id);

                  $data['instr_dys_pri']                    = $udise_admin[0]->instr_dys_pri;
                  $data['instr_dys_sec']                    = $udise_admin[0]->instr_dys_sec;
                  $data['instr_dys_uppri']                  = $udise_admin[0]->instr_dys_uppri;
                  $data['instr_dys_hsc']                    = $udise_admin[0]->instr_dys_hsc;
                  $data['hrs_chldrn_sty_schl_pri']          = $udise_admin[0]->hrs_chldrn_sty_schl_pri;
                  $data['mins_chldrn_sty_schl_pri']         = $udise_admin[0]->mins_chldrn_sty_schl_pri;
                  $data['hrs_chldrn_sty_schl_sec']          = $udise_admin[0]->hrs_chldrn_sty_schl_sec;
                  $data['mins_chldrn_sty_schl_sec']         = $udise_admin[0]->mins_chldrn_sty_schl_sec;
                  $data['hrs_chldrn_sty_schl_uppri']        = $udise_admin[0]->hrs_chldrn_sty_schl_uppri;
                  $data['mins_chldrn_sty_schl_uppri']       = $udise_admin[0]->mins_chldrn_sty_schl_uppri;
                  $data['hrs_chldrn_sty_schl_hsc']          = $udise_admin[0]->hrs_chldrn_sty_schl_hsc;
                  $data['mins_chldrn_sty_schl_hsc']         = $udise_admin[0]->mins_chldrn_sty_schl_hsc;
                  $data['hrs_tchrs_sty_schl_pri']           = $udise_admin[0]->hrs_tchrs_sty_schl_pri;
                  $data['mins_tchrs_sty_schl_pri']          = $udise_admin[0]->mins_tchrs_sty_schl_pri;
                  $data['hrs_tchrs_sty_schl_sec']           = $udise_admin[0]->hrs_tchrs_sty_schl_sec;
                  $data['mins_tchrs_sty_schl_sec']          = $udise_admin[0]->mins_tchrs_sty_schl_sec;
                  $data['hrs_tchrs_sty_schl_uppri']         = $udise_admin[0]->hrs_tchrs_sty_schl_uppri;
                  $data['mins_tchrs_sty_schl_uppri']        = $udise_admin[0]->mins_tchrs_sty_schl_uppri;
                  $data['hrs_tchrs_sty_schl_hsc']           = $udise_admin[0]->hrs_tchrs_sty_schl_hsc;
                  $data['mins_tchrs_sty_schl_hsc']          = $udise_admin[0]->mins_tchrs_sty_schl_hsc;
                  $data['chldrns_enrld_25prcnt_rte']        = $udise_admin[0]->chldrns_enrld_25prcnt_rte;
                  $data['stud_admsn_25prcnt_prv_yr']        = $udise_admin[0]->stud_admsn_25prcnt_prv_yr;
                  $data['mtngs_smc_prev_acdyr']             = $udise_admin[0]->mtngs_smc_prev_acdyr;
                  $data['smc_prep_sdp']                     = $udise_admin[0]->smc_prep_sdp;
                  $data['vists_acd_inspec']                 = $udise_admin[0]->vists_acd_inspec;
                  $data['vists_crc_cord']                   = $udise_admin[0]->vists_crc_cord;
                  $data['vists_blcklvl_brc']                = $udise_admin[0]->vists_blcklvl_brc;
                  $data['smdc_metng_lstacd_yr']             = $udise_admin[0]->smdc_metng_lstacd_yr;
                  $data['smdc_prpd_schl_imprv']             = $udise_admin[0]->smdc_prpd_schl_imprv;
                  $data['sbc_constitd']                     = $udise_admin[0]->sbc_constitd;
                  $data['schl_constitd_acd']                = $udise_admin[0]->schl_constitd_acd;
                  
                  // ***** Udise Administrative Info page 3 data Ending*****


               }else{ redirect('/', 'refresh');}

          }
    }else { redirect('/', 'refresh'); }

    $this->load->view('emis_school_admin3',$data);

   }
   public function emis_school_admin4()
   {
    $school_udise = $this->session->userdata('emis_school_udise');
    // only display in table
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $is_high_class=$this->session->userdata('emis_school_highclass');
    if($emis_loggedin) {

       $emis_templog =$this->session->userdata('emis_school_templog');
       $emis_templog1 =$this->session->userdata('emis_school_templog1');
       if($emis_templog==0 || $emis_templog1==0){
          redirect('home/emis_school_gotoredirect','refresh');
       }
       else{
              if($is_high_class)
              {
                $user_type_id=$this->session->userdata('emis_user_type_id');
                if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {    
                    $school_id = $this->session->userdata('emis_school_id');   
                    $details= $this->Adminmodel->get_admin_form5_details($school_id);
                    $data['details'] = $details;
                    $this->load->view('emis_school_admin4',$data);

                }else{ redirect('/', 'refresh');}
                
              }
              else
              {
                $this->session->set_flashdata('errors','Your school does not have class 11th or 12th.Please check the data');
                redirect('Admin/emis_school_admin1', 'refresh');
              }
        }
    }else { redirect('/', 'refresh'); }

   }
  /* public function emis_school_admin6()
   {
         // only display in table
   $data['details'] =  $this->Adminmodel->get_admin_form6_details();
    $this->load->view('emis_school_admin6',$data);

   }
    public function emis_school_admin7()
   {
        // only display in table
   //$this->Adminmodel->get_admin_form7_details();
    $this->load->view('emis_school_admin7');

   }  */
   
   public function emis_school_admin5(){ 
    $school_udise = $this->session->userdata('emis_school_udise');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
        if ($emis_loggedin) {
          $school_id = $this->session->userdata('emis_school_id');

          $admin5    = $this->Udise_adminmodel->adminpage5data($school_id);

           if (!$admin5) {

                  $record = array(
                      'udise_code'    => $school_udise,
                      'school_key_id' => $school_id,
                      'createdat'     => date('Y-m-d H:i:s')
                      );
                    $this->Udise_adminmodel->admin2insert($record);
                  
                }

          $admin5    = $this->Udise_adminmodel->adminpage5data($school_id);

          $data['resid_schl']                                 = $admin5[0]->resid_schl;
          $data['typ_resid_schl']                             = $admin5[0]->typ_resid_schl;
          $data['brdng_fac_avl_stg']                          = $admin5[0]->brdng_fac_avl_stg;
          $data['resid_pri_stud']                             = $admin5[0]->resid_pri_stud;
          $data['resid_pri_stud_g']                           = $admin5[0]->resid_pri_stud_g;
          $data['resid_pri_stud_b']                           = $admin5[0]->resid_pri_stud_b;
          $data['resid_uppri_stud']                           = $admin5[0]->resid_uppri_stud;
          $data['resid_uppri_stud_g']                         = $admin5[0]->resid_uppri_stud_g;
          $data['resid_uppri_stud_b']                         = $admin5[0]->resid_uppri_stud_b;
          $data['resid_sec_stud']                             = $admin5[0]->resid_sec_stud;
          $data['resid_sec_stud_g']                           = $admin5[0]->resid_sec_stud_g;
          $data['resid_sec_stud_b']                           = $admin5[0]->resid_sec_stud_b;
          $data['resid_hsc_stud']                             = $admin5[0]->resid_hsc_stud;
          $data['resid_hsc_stud_b']                           = $admin5[0]->resid_hsc_stud_b;
          $data['resid_hsc_stud_g']                           = $admin5[0]->resid_hsc_stud_g;
          $data['min_mangd_schl']                             = $admin5[0]->min_mangd_schl;
          $data['typ_minrty_cmnty']                           = $admin5[0]->typ_minrty_cmnty;
          $data['prepri_sction_atchd_schl']                   = $admin5[0]->prepri_sction_atchd_schl;
          $data['tot_stud_prepri_grd']                        = $admin5[0]->tot_stud_prepri_grd;
          $data['tot_tchr_prepri']                            = $admin5[0]->tot_tchr_prepri;
          $data['angwdi_cntr_schlcmps']                       = $admin5[0]->angwdi_cntr_schlcmps;
          $data['angwdi_cntr_tot_chldrs']                     = $admin5[0]->angwdi_cntr_tot_chldrs;
          $data['tot_tchrs_angwdi_wrks']                      = $admin5[0]->tot_tchrs_angwdi_wrks;
          $data['cce_imp_schl']                               = $admin5[0]->cce_imp_schl;
          $data['cce_imp_schl_elem']                          = $admin5[0]->cce_imp_schl_elem;
          $data['cce_imp_schl_sec']                           = $admin5[0]->cce_imp_schl_sec;
          $data['cce_imp_schl_hsc']                           = $admin5[0]->cce_imp_schl_hsc;
          $data['cumm_rcrd_ppl_mntnd']                        = $admin5[0]->cumm_rcrd_ppl_mntnd;
          $data['cumm_rcrd_ppl_shrwthprnts']                  = $admin5[0]->cumm_rcrd_ppl_shrwthprnts;
          $data['smc_constud']                                = $admin5[0]->smc_constud;
          $data['smc_tot_membr_mle']                          = $admin5[0]->smc_tot_membr_mle;
          $data['smc_tot_membr_fmle']                         = $admin5[0]->smc_tot_membr_fmle;
          $data['smc_membr_parnts_mle']                       = $admin5[0]->smc_membr_parnts_mle;
          $data['smc_membr_parnts_fmle']                      = $admin5[0]->smc_membr_parnts_fmle;
          $data['smc_reprsnt_loc_auth_mle']                   = $admin5[0]->smc_reprsnt_loc_auth_mle;
          $data['smc_reprsnt_loc_auth_fmle']                  = $admin5[0]->smc_reprsnt_loc_auth_fmle;
          $data['sep_bnk_smc_maintnd']                        = $admin5[0]->sep_bnk_smc_maintnd;
          $data['smc_brnch']                                  = $admin5[0]->smc_brnch;
          $data['smc_bnk_nme']                                = $admin5[0]->smc_bnk_nme;
          $data['smc_acc_no']                                 = $admin5[0]->smc_acc_no;
          $data['smc_ifsc']                                   = $admin5[0]->smc_ifsc;
          $data['smc_acc_nme']                                = $admin5[0]->smc_acc_nme;
          $data['chld_enrld_attndspectrng']                   = $admin5[0]->chld_enrld_attndspectrng;
          $data['no_chldrs_spectrng_utsep30_b']               = $admin5[0]->no_chldrs_spectrng_utsep30_b;
          $data['no_chldrs_spectrng_utsep30_g']               = $admin5[0]->no_chldrs_spectrng_utsep30_g;
          $data['no_chldrs_spectrng_enrld_acadyr_b']          = $admin5[0]->no_chldrs_spectrng_enrld_acadyr_b;
          $data['no_chldrs_spectrng_enrld_acadyr_g']          = $admin5[0]->no_chldrs_spectrng_enrld_acadyr_g;
          $data['no_chldrs_spectrng_cmpltd_prevacdyr_b']      = $admin5[0]->no_chldrs_spectrng_cmpltd_prevacdyr_b;
          $data['no_chldrs_spectrng_cmpltd_prevacdyr_g']      = $admin5[0]->no_chldrs_spectrng_cmpltd_prevacdyr_g;
          $data['who_condct_spec_trng']                       = $admin5[0]->who_condct_spec_trng;
          $data['spec_trng_cndt']                             = $admin5[0]->spec_trng_cndt;
          $data['typ_trng_condct']                            = $admin5[0]->typ_trng_condct;


         $this->load->view('emis_school_admin5',$data);
        }
        else{
          redirect('home/emis_school_home','refresh');
        }
         
   }

   public function emis_school_admin6(){
    $school_udise = $this->session->userdata('emis_school_udise');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if ($emis_loggedin) {
          $school_id = $this->session->userdata('emis_school_id');
          
          $admin6    = $this->Udise_adminmodel->adminpage6data($school_id);

           if (!$admin6) {

                  $record = array(
                      'udise_code'    => $school_udise,
                      'school_key_id' => $school_id,
                      'createdat'     => date('Y-m-d H:i:s')
                      );
                    $this->Udise_adminmodel->admin2insert($record);
                  
                }

          $admin6    = $this->Udise_adminmodel->adminpage6data($school_id);

          $data['fulset_txtbok_recvd']              = $admin6[0]->fulset_txtbok_recvd;
          $data['txtbok_recvd_crntacd_mnth']        = $admin6[0]->txtbok_recvd_crntacd_mnth;
          $data['txtbok_recvd_crntacd_yr']          = $admin6[0]->txtbok_recvd_crntacd_yr;
          $data['cmplt_txtbok_recvd_pri']           = $admin6[0]->cmplt_txtbok_recvd_pri;
          $data['cmplt_txtbok_recvd_uppri']         = $admin6[0]->cmplt_txtbok_recvd_uppri;
          $data['tle_avl_grd_pri']                  = $admin6[0]->tle_avl_grd_pri;
          $data['tle_avl_grd_uppri']                = $admin6[0]->tle_avl_grd_uppri;
          $data['ply_matrl_pri']                    = $admin6[0]->ply_matrl_pri;
          $data['ply_matrl_uppri']                  = $admin6[0]->ply_matrl_uppri;
          $data['ply_matrl_sec']                    = $admin6[0]->ply_matrl_sec;
          $data['smc_smdc_same_schl']               = $admin6[0]->smc_smdc_same_schl;
          $data['smdc_constud']                     = $admin6[0]->smdc_constud;
          $data['smdc_tot_membr_m']                 = $admin6[0]->smdc_tot_membr_m;
          $data['smdc_tot_membr_f']                 = $admin6[0]->smdc_tot_membr_f;
          $data['smdc_noof_repr_pta_m']             = $admin6[0]->smdc_noof_repr_pta_m;
          $data['smdc_noof_repr_pta_f']             = $admin6[0]->smdc_noof_repr_pta_f;
          $data['smdc_noof_repr_lcbdy_m']           = $admin6[0]->smdc_noof_repr_lcbdy_m;
          $data['smdc_noof_repr_lcbdy_f']           = $admin6[0]->smdc_noof_repr_lcbdy_f;
          $data['smdc_noof_mebrs_edubckmin_m']      = $admin6[0]->smdc_noof_mebrs_edubckmin_m;
          $data['smdc_noof_mebrs_edubckmin_f']      = $admin6[0]->smdc_noof_mebrs_edubckmin_f;
          $data['smdc_noof_mebrs_wms_f']            = $admin6[0]->smdc_noof_mebrs_wms_f;
          $data['smdc_noof_mebrs_scst_m']           = $admin6[0]->smdc_noof_mebrs_scst_m;
          $data['smdc_noof_mebrs_scst_f']           = $admin6[0]->smdc_noof_mebrs_scst_f;
          $data['smdc_noof_nmines_deo_m']           = $admin6[0]->smdc_noof_nmines_deo_m;
          $data['smdc_noof_nmines_deo_f']           = $admin6[0]->smdc_noof_nmines_deo_f;
          $data['smdc_noof_nmines_aad_m']           = $admin6[0]->smdc_noof_nmines_aad_m;
          $data['smdc_noof_nmines_aad_f']           = $admin6[0]->smdc_noof_nmines_aad_f;
          $data['smdc_noof_subjt_exp_m']            = $admin6[0]->smdc_noof_subjt_exp_m;
          $data['smdc_noof_subjt_exp_f']            = $admin6[0]->smdc_noof_subjt_exp_f;
          $data['smdc_noof_techrs_m']               = $admin6[0]->smdc_noof_techrs_m;
          $data['smdc_noof_techrs_f']               = $admin6[0]->smdc_noof_techrs_f;
          $data['smdc_prnclorhm_cp_m']              = $admin6[0]->smdc_prnclorhm_cp_m;
          $data['smdc_prnclorhm_cp_f']              = $admin6[0]->smdc_prnclorhm_cp_f;
          $data['smdc_chrprsn_m']                   = $admin6[0]->smdc_chrprsn_m;
          $data['smdc_chrprsn_f']                   = $admin6[0]->smdc_chrprsn_f;
          $data['sep_bnk_smdc_maintnd']             = $admin6[0]->sep_bnk_smdc_maintnd;
          $data['smdc_brnch']                       = $admin6[0]->smdc_brnch;
          $data['smdc_bnk_nme']                     = $admin6[0]->smdc_bnk_nme;
          $data['smdc_acc_no']                      = $admin6[0]->smdc_acc_no;
          $data['smdc_ifsc']                        = $admin6[0]->smdc_ifsc;
          $data['smdc_acc_nme']                     = $admin6[0]->smdc_acc_nme;
          $data['schl_pta']                         = $admin6[0]->schl_pta;
          $data['pta_metng_hld_yr']                 = $admin6[0]->pta_metng_hld_yr;

         $this->load->view('emis_school_admin6',$data);
        }
        else{
          redirect('home/emis_school_home','refresh');
        }
         
   }


   public function updateschoolid()
   {
   $value = $this->input->post('value');

     if(preg_match("/^\d+$/",$value))
     {

      $data = array( "school_key_id" => $value );
      $school_id = $this->session->userdata('emis_school_id');   
      if( $this->Adminmodel->updatedata($data,$school_id) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "school id " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);


  } 
  //updateschooltype

  public function updateschooltype()
  {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
        if($value == "Co-Ed" || $value == "Girls" || $value == "Boys" )
       {
            $data = array( "schooltype" => $value );
            $school_id = $this->session->userdata('emis_school_id');   
            if( $this->Adminmodel->updatedata($data,$school_id) )
            {
                $result_arr['response_code'] = 1;
            }
            else
            {
               $result_arr['response_code'] = 0;
               $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
            }
      }
      else
      {
          $result_arr['response_code'] = -1;
          $result_arr['error_msg'] = "school type " ." is not in the correct format.Re-check and submit again ";
      }
      echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

  //updatelowstd

  public function updatelowstd()
  {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if(preg_match("/^([1-9]|1[0-2])$/",$value))
       {

        $data = array( "low_class" => $value );
        $school_id = $this->session->userdata('emis_school_id');   

        if( $this->Adminmodel->updatedata($data,$school_id) )
        {
           $result_arr['response_code'] = 1;
        }
        else
        {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }
      }
      else
      {
          $result_arr['response_code'] = -1;
          $result_arr['error_msg'] = "Standard " ." is not in the correct format.Re-check and submit again ";
      }
        echo json_encode($result_arr);

    }else { redirect('/', 'refresh'); }


  }

  public function updatehighstd()
  {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if(preg_match("/^([1-9]|1[0-2])$/",$value))
       {

          $data = array( "high_class" => $value );
          $school_id = $this->session->userdata('emis_school_id');   

          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
             $result_arr['response_code'] = 1;
              if($value >=10){ 
                
                $this->session->set_userdata('emis_school_highclass',TRUE);  }
              else
              {
                $this->session->set_userdata('emis_school_highclass',FALSE);
              }
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
      }
      else
      {
          $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Standard " ." is not in the correct format.Re-check and submit again ";
      }
        echo json_encode($result_arr);

    }else { redirect('/', 'refresh'); }


  }

   public function updatesmc()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $value = $this->input->post('value');
        if($value == "Yes" || $value == "No")
       {
            $data = array( "smc_smdc" => $value );
            $school_id = $this->session->userdata('emis_school_id');   

            if( $this->Adminmodel->updatedata($data,$school_id) )
            {
              $result_arr['response_code'] = 1;
            }
            else
            {
              
              $result_arr['response_code'] = 0;
              $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
            }
        }
        else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "SMC/SDMC value " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);

    }else { redirect('/', 'refresh'); }


  }

    public function updateboard()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if(preg_match("/^[a-zA-Z ]*$/",$value))
      {

          $data = array( "board" => $value );
          $school_id = $this->session->userdata('emis_school_id');   

          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
             $this->session->set_userdata('emis_school_board',$value);
             $result_arr['response_code'] = 1;
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
           echo json_encode($result_arr);

      }
       else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Board details  " ." is not in the correct format.Re-check and submit again ";
       }
    }else { redirect('/', 'refresh'); }
   }

    public function updateminority()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "1" || $value == "0")
      {

          $data = array( "minority" => $value );
          $school_id = $this->session->userdata('emis_school_id');   

          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
              $result_arr['response_code'] = 1;
          }
          else
          {
             $result_arr['response_code'] = 0;
             $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
      }
      else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Minority details  " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

    public function updatenoofm($x)
   {    

    
        $data = array( "noof_med" => $x );
        $school_id = $this->session->userdata('emis_school_id');   
        $this->Adminmodel->updatedata($data,$school_id);
         


  }


    public function updatemedium()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $data = $this->input->post('value');
     

      if($data !="")
      {
          $school_id = $this->session->userdata('emis_school_id');   

          $this->Adminmodel->clearmediumdata($school_id);
          $x = 0;
          for($x = 0; $x < count($data); $x++) {
            
                  $this->Adminmodel->updatemediumdata($data[$x],$school_id);
                  
            }
            $this->updatenoofm($x);
            $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = -1;
        $result_arr['error_msg'] = "Medium " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);

      }else { redirect('/', 'refresh'); }



  }

   public function updategoanddate()
   {    

     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $school_id = $this->session->userdata('emis_school_id');   
        $value = $this->input->post('value');

          $data = array( "start_order" => $value );
          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
             $result_arr['response_code'] = 1;
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
       
        echo json_encode($result_arr);
      }else { redirect('/', 'refresh'); }


  }

   public function updateshoolstartyear()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');   

       if(preg_match("/^(19|20)\d{2}$/",$value))
       {

        $data = array( "start_yr" => $value );
        if( $this->Adminmodel->updatedata($data,$school_id) )
        {
           $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }


       }
       else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Year " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
      }else { redirect('/', 'refresh'); }


  }

    public function updategoanddate2()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');   
      $data = array( "hssstart_order" => $value );
      if( $this->Adminmodel->updatedata($data,$school_id) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }
   
      echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

    public function updatehighyear()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');

       if(preg_match("/^(19|20)\d{2}$/",$value))
       {

        $data = array( "hssstart_yr" => $value );
        if( $this->Adminmodel->updatedata($data,$school_id) )
        {
           $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }


       }
       else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Year " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

   public function updateupgradedetails()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $value = $this->input->post('value');
        $school_id = $this->session->userdata('emis_school_id');   

          $data = array( "upgr_det" => $value );
          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
             $result_arr['response_code'] = 1;
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
       
          echo json_encode($result_arr);
      }else { redirect('/', 'refresh'); }


  }

   public function updatespecialschool()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
    
      $value = $this->input->post('value');
      if($value == "0" || $value == "1")
      {
          $data = array( "spl_school" => $value );
          $school_id = $this->session->userdata('emis_school_id');   
          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
                  $result_arr['response_code'] = 1;
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
      }
      else
      {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Special school status " ." is not in the correct format.Re-check and submit again ";
      }
        echo json_encode($result_arr);

    }else { redirect('/', 'refresh'); }

  }

   public function updateboardingschool()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "0" || $value == "1"){

          $school_id = $this->session->userdata('emis_school_id');   

            $data = array( "boarding" => $value );
          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
              $result_arr['response_code'] = 1;
          }
          else
          {
            $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
     }
     else
     {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Boarding school Status " ." is not in the correct format.Re-check and submit again ";
     }
     echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }


   public function updatescoutstatus()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "Established and Functioning" || $value == "Not established")
      {
        

          $data = array( "extra_scout" => $value );
          $school_id = $this->session->userdata('emis_school_id');   
          if( $this->Adminmodel->updatedata($data,$school_id) )
        {
          $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }
      }
      else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Scout Status " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

   public function updatejrcstatus()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
       $value = $this->input->post('value');
      if($value == "Established" || $value == "Not established")
      {
       
        $school_id = $this->session->userdata('emis_school_id');   

          $data = array( "extra_jrc" => $value );
          if( $this->Adminmodel->updatedata($data,$school_id) )
        {
           $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }
     }
     else
     {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Junior Red cross status " ." is not in the correct format.Re-check and submit again ";
    }
    echo json_encode($result_arr);
    } else { redirect('/', 'refresh'); }

  }


    public function updatenssstatus()
   {    

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $value = $this->input->post('value');
      if($value == "Established" || $value == "Not established"){
          $school_id = $this->session->userdata('emis_school_id');   

            $data = array( "extra_nss" => $value );
            if( $this->Adminmodel->updatedata($data,$school_id) )
          {
             $result_arr['response_code'] = 1;
          }
          else
          {
             $result_arr['response_code'] = 0;
            $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
      }
      else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "National Service Scheme status " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
      }else { redirect('/', 'refresh'); }


  }

    public function updatenccstatus()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "Established" || $value == "Not established")
      {
        
        $school_id = $this->session->userdata('emis_school_id');   

          $data = array( "extra_ncc" => $value );
        if( $this->Adminmodel->updatedata($data,$school_id) )
        {
            $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }
      }
     else
     {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "National Cadet Corps " ." is not in the correct format.Re-check and submit again ";
     }
     echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

   public function updaterrcstatus()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "Established" || $value == "Not established")
      {
          $data = array( "extra_rrc" => $value );
          $school_id = $this->session->userdata('emis_school_id');   
         if( $this->Adminmodel->updatedata($data,$school_id) )
         {
           $result_arr['response_code'] = 1;
        
         }
         else
         {
           $result_arr['response_code'] = 0;
           $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
         }
      }
      else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Red Ribbon Club status " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
    }else { redirect('/', 'refresh'); }


  }

   public function updateecstatus()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $value = $this->input->post('value');
        if($value == "Established" || $value == "Not established")
        {
          $data = array( "extra_ec" => $value );
          $school_id = $this->session->userdata('emis_school_id');   
          if( $this->Adminmodel->updatedata($data,$school_id) )
          {
              $result_arr['response_code'] = 1;
          }
          else
          {
             $result_arr['response_code'] = 0;
             $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
          }
        }
       else
       {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "Eco club status " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);
      }else { redirect('/', 'refresh'); }


  }

   public function updatecubstatus()
   {    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $value = $this->input->post('value');
      if($value == "Established" || $value == "Not established")
      {
        $data = array( "extra_cub" => $value );
        $school_id = $this->session->userdata('emis_school_id');   
        if( $this->Adminmodel->updatedata($data,$school_id) )
        {
           $result_arr['response_code'] = 1;
        }
        else
        {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
        }
     }
     else
     {
         $result_arr['response_code'] = -1;
         $result_arr['error_msg'] = "CUB status " ." is not in the correct format.Re-check and submit again ";
       }
        echo json_encode($result_arr);

    }else { redirect('/', 'refresh'); }


  }



}