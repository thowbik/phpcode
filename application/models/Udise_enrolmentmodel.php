<?php

class Udise_enrolmentmodel  extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

    // ***** Enrolment page1 Form1 view *****
    function get_enrlmentfrm1($school_id){
          $this->db->select('age_blw5_b,age_blw5_g,age_5_b,age_5_g,age_6_b,age_6_g,age_7_b,age_7_g,age_abv7_b,age_abv7_g,tot_chldns_adgrd1_b,tot_chldns_adgrd1_g,tot_grd1_smeschl_b,tot_grd1_smeschl_g,tot_grd1_anthrschl_b,tot_grd1_anthrschl_g,tot_grd1_ecce_b,tot_grd1_ecce_g');
          $this->db->where('school_key_id',$school_id);
          $query = $this->db->get('udise_e_nwadmsn');
          return $query->result();
    }
    // ***** Enrolment page1 Form1 view Ending*****

    // ***** Enrolment page1 Form1 insert Ending*****
    function enrol1frm1insert($data){
        $this->db->insert('udise_e_nwadmsn',$data);
    }
    // ***** Enrolment page1 Form1 insert Ending*****

    // ***** Enrolment page1 form1 Update *****
    function enrlmentfrm1update($data,$school_id){
      $this->db->where('school_key_id',$school_id);
      return $this->db->update('udise_e_nwadmsn',$data);
    }
    // ***** Enroment pag1   form1 update Ending *****

    // ***** Enrolment page1 form2 insert *****
    function enrol1frm2insert($result){
      $this->db->insert('udise_e_curnt_acad_age',$result);
    }
    // ***** Enrolment page1 form2 insert Ending *****

    
    // ***** Enrolment page6 form getdata *****
    function getenrol6($school_id){
      $this->db->select('category,prepri_b,prepri_g,i_b,i_g,ii_b,ii_g,iii_b,iii_g,iv_b,iv_g,v_b,v_g,vi_b,vi_g,vii_b,vii_g,viii_b,viii_g,ix_b,ix_g,x_b,x_g,xi_b,xi_g,xii_b,xii_g');
      $this->db->where('school_key_id',$school_id);
      $query = $this->db->get('udise_e_crnt_acad_ses_soc_cat');
      return $query->result();
    }
    // ***** Enrolment page6 form getdata Ending*****

    // ***** Enrolment page6 form Update *****
    function enrol6update($result,$school_id,$category){
       $this->db->where('category',$category);
       $this->db->where('school_key_id',$school_id);
       return $this->db->update('udise_e_crnt_acad_ses_soc_cat',$result);
    }
    // ***** Enrolment page6 form Update Ending*****

    // ***** Enrolment page6 form Insert *****
    function enrol6insert($result){
      $this->db->insert('udise_e_crnt_acad_ses_soc_cat',$result);
    }
    // ***** Enrolment page6 form Insert Ending*****

    // ***** Enrolment page6 form update *****
    function enrlmentfrm2update($data,$school_id){
     $this->db->where('school_key_id', $school_id);      
      return $this->db->update('udise_e_crnt_acad_ses_soc_cat', $data);
    }
    // ***** Enrolment page6 form update *****

    // ***** Enrolment page1 Form3 data view *****
    function enrlmntfrm3_data($school_id){
      $this->db->select('age,i_b,i_g,ii_b,ii_g,iii_b,iii_g,iv_b,iv_g,v_b,v_g,vi_b,vi_g,vii_b,vii_g,viii_b,viii_g,ix_b,ix_g,x_b,x_g,xi_b,xi_g,xii_b,xii_g');
      $query  = $this->db->get('udise_e_curnt_acad_age');

      return $query->result();
    }
    // ***** Enrolment page1 Form3 data view Ending *****

    // ***** Enrolment page1 Form3 data view Ending *****

    function enrlmentfrm3update($data,$school_id,$age){
      $this->db->where('age',$age);
      $this->db->where('school_key_id',$school_id);
      return $this->db->update('udise_e_curnt_acad_age',$data);
    }

    // ***** Enrolment page2 Form1 view data *****
      function get_med_dtls($school_id){
        $this->db->select('tamil_med,eng_med,tel_med,mal_med,kan_med,urdu_med,oth_med');
        $this->db->where('school_key_id',$school_id);
        $query  = $this->db->get('schoolnew_academicinfo');
        return $query->result();
      }

      // ***** Enrolment page2 Form1 View data ending *****

      // ***** Enrolment page2 Form1 getting mediums *****
      function get_all_mediums(){
        $this->db->select('col_name,education_medium');
        $query = $this->db->get('schoolnew_mediummapping');
        return $query->result();
      }

      // ***** Enrolment page2 Form1 getting mediums *****

      // ***** Enrolment page2 Form1 getting datas *****
      function gettbl1dts($school_id,$medium){
        $this->db->select('uniq_id,med_instrct,med_i_b,med_i_g,med_ii_b,med_ii_g,med_iii_b,med_iii_g,med_iv_b,med_iv_g,med_v_b,med_v_g,med_vi_b,med_vi_g,med_vii_b,med_vii_g,med_viii_b,med_viii_g,med_ix_b,med_ix_g,med_x_b,med_x_g,med_xi_b,med_xi_g,med_xii_b,med_xii_g');
        $this->db->where('med_instrct',$medium);
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_med_instruct');
        return $query->result();
      }
      // ***** Enrolment page2 Form1 getting datas Ending *****

      // ***** Enrolment page2 Form1 getting datas *****
      function gettbl1dtsdata($school_id){
        $this->db->select('uniq_id,med_instrct,med_i_b,med_i_g,med_ii_b,med_ii_g,med_iii_b,med_iii_g,med_iv_b,med_iv_g,med_v_b,med_v_g,med_vi_b,med_vi_g,med_vii_b,med_vii_g,med_viii_b,med_viii_g,med_ix_b,med_ix_g,med_x_b,med_x_g,med_xi_b,med_xi_g,med_xii_b,med_xii_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_med_instruct');
        return $query->result();
      }
      // ***** Enrolment page2 Form1 getting datas Ending *****

      // ***** Enrolment page2 Form1 update *****
      function enrl2frm1update($data,$medium,$school_id){
        $this->db->where('school_key_id',$school_id);
        $this->db->where('med_instrct',$medium);
        return $this->db->update('udise_e_med_instruct',$data);
      }
      // ***** Enrolment page2 Form1 update Ending*****

      // ***** Enrolment page2 Form1 Insert the data *****
      function enrl2frm1insrt($data){
        $this->db->insert('udise_e_med_instruct',$data);
      }
      // ***** Enrolment page2 Form1 Insert the data Ending *****

      // ***** Deleting particular row form enrolment table *****
      function enrl2frm1del($id){
       $this->db->where('uniq_id', $id);
       $this->db->delete('udise_e_med_instruct');
      }
   
      // ***** Deleting particular row form enrolment table *****

      // ***** Enrolment page2 Form2 Update *****
      function enrolmnt2frm2_get($school_id){
        $this->db->select('category,i_b,i_g,ii_b,ii_g,iii_b,iii_g,iv_b,iv_g,v_b,v_g,vi_b,vi_g,vii_b,vii_g,viii_b,viii_g,ix_b,ix_g,x_b,x_g,xi_b,xi_g,xii_b,xii_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_soc_category');
        return $query->result();
      }
      // ***** Enrolment page2 Form2 Update Ending*****

      // ***** Enrolment page2 Form2 insert *****
      function enrol2frm2insert($result){
        $this->db->insert('udise_e_soc_category',$result);
      }

      // ***** Enrolment page2 Form2 Update *****
      function enrolmnt2frm2updte($data,$school_id,$category){
        $this->db->where('category',$category);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_e_soc_category',$data);
      }
      // ***** Enrolment page2 Form2 Update Ending*****


      // Enrolment3 Form1 insert *****
      function enrol3frm1insert($result){
        $this->db->insert('udise_e_avail_acad_strm',$result);
      }
      // Enrolment3 Form1 insert Ending*****

      // Enrolment3 Form1 View *****
      function enrol3frm1get($school_id){
        $this->db->select('arts,science,commerce,vocational,oth_stream');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_avail_acad_strm');
        return $query->result();
      }
      // Enrolment3 Form1 View Ending*****

      // ***** Enrolment3 form1 *****
      function updatedata($data,$school_id){
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_e_avail_acad_strm',$data);
      }
      // ***** Enrolment3 Form1 Ending *****

      // ***** Enrolment3 Form2 view *****
      function enrol3frm2get($school_id){
        $this->db->select('enrol_xi_b,enrol_xi_g,enrol_xii_b,enrol_xii_g,reptrs_xi_b,reptrs_xi_g,reptrs_xii_b,reptrs_xii_g,stream,category');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_reptrs_acad_strm');
        return $query->result();
      }
      // ***** Enrolment3 Form2 view Ending *****

      // ***** Enrolment3 Form2 Insert *****
      function enrol3frm3insert_school($data){
        $this->db->insert('udise_e_reptrs_acad_strm',$data);
      }
      // ***** Enrolment3 Form2 Insert Ending*****

      // ***** Enrolment3 Form2 Update *****
      function enrol3frm2update($result,$school_id,$stream,$category){
        $this->db->where('category',$category);
        $this->db->where('stream',$stream);
        $this->db->where('school_key_id',$school_id);
        $this->db->update('udise_e_reptrs_acad_strm',$result);
      }
      // ***** Enrolment3 Form2 Update Ending*****

      // ***** Enrolment3 Form1 Arts view *****
      function enrol3frm2_getdata($school_id){
        $this->db->select('enrol_xi_b,enrol_xi_g,enrol_xii_b,enrol_xii_g,reptrs_xi_b,reptrs_xi_g,reptrs_xii_b,reptrs_xii_g,stream,category');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_reptrs_acad_strm');

        return $query->result();
      }
      // ***** Enrolment3 Form1 Arts view Ending*****

      // ***** Enrolment4 form *****
      function enrol4frmget($school_id){
        $this->db->select('enrol_xi_b,enrol_xi_g,enrol_xii_b,enrol_xii_g,reptrs_xi_b,reptrs_xi_g,reptrs_xii_b,reptrs_xii_g,stream,category');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_reptrs_acad_strm_minrty');

        return $query->result();
      }
      // ***** Enrolment4 form Ending *****

      // ***** Enrolment4 Form Insert *****
      function enrol4frminsert_school($data){
        $this->db->insert('udise_e_reptrs_acad_strm_minrty',$data);
      }
      // ***** Enrolment4 Form Insert Ending*****

      // ***** Enrolment4 Form Update
      function enrol4frmupdate($result,$school_id,$stream,$category){
        $this->db->where('category',$category);
        $this->db->where('stream',$stream);
        $this->db->where('school_key_id',$school_id);
        $this->db->update('udise_e_reptrs_acad_strm_minrty',$result);
      }
      // ***** Enroment4 Form Update Ending


       // ***** Enrolment5 get *****
      function enrol5frmget($school_id,$imprmnt_type){
        $this->db->where('imprmnt_type',$imprmnt_type);
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_e_specl_needs');

        return $query->result();
      }
      // ***** Enroment5 Form get Ending *****

      // ***** Enrolment5 Form insert *****
      function enrol5insert($result){
        $this->db->insert('udise_e_specl_needs',$result);
      }
      // ***** Enrolment5 Form insert Ending*****
      
      // ***** Enrolment5 Form update *****

      function enrol5update($result,$school_id,$imprmnt_type){
        $this->db->where('imprmnt_type',$imprmnt_type);
        $this->db->where('school_key_id',$school_id);
        $this->db->update('udise_e_specl_needs',$result);
      }

      // ***** Enrolment5 Form update Ending*****

      // ***** Enrolment 5 Get joining records *****
      function getjoinrecordsenrol5($school_id){

        $this->db->select('udise_e_specl_needs.*,udise_e_specl_neds_mstr.*')
              ->from('udise_e_specl_needs')
              ->join('udise_e_specl_neds_mstr','udise_e_specl_needs.imprmnt_type=udise_e_specl_neds_mstr.imprmnt_code')
              ->where('udise_e_specl_needs.school_key_id',$school_id);               
              $query = $this->db->get();      
       return $query->result();

      }
      // ***** Enrolment 5 Get joining records Ending*****
   } 
?>