
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_enrolment extends CI_Controller

  {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
    $this->load->helper(array(
      'form',
      'url',
      'html'
    ));
    $this->load->library(array(
      'session',
      'form_validation'
    ));
    $this->load->helper('security');
    $this->load->database();
    $this->load->model('Homemodel');
    $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Udise_enrolmentmodel');
  }

 

  public

  function emis_school_enrolment1()
    {
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
          date_default_timezone_set('Asia/Kolkata');
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');

          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {
          $school_udise = $this->session->userdata('emis_school_udise');
          $details = $this->Homemodel->get_school_form1_details($school_udise);
          $school_id = $this->session->userdata('emis_school_id');

          $enrolment1tblchck = $this->Udise_enrolmentmodel->get_enrlmentfrm1($school_id);

            if (!$enrolment1tblchck) {
                                      $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol1frm1insert($result);
            }

          //  ***** Table1 *****
          $enrolment1tbl1 = $this->Udise_enrolmentmodel->get_enrlmentfrm1($school_id);
          //  ***** Table1 Ending*****  

          $data['age_blw5_b']              = $enrolment1tbl1[0]->age_blw5_b;
          $data['age_blw5_g']              = $enrolment1tbl1[0]->age_blw5_g;
          $data['age_5_b']                 = $enrolment1tbl1[0]->age_5_b;
          $data['age_5_g']                 = $enrolment1tbl1[0]->age_5_g;
          $data['age_6_b']                 = $enrolment1tbl1[0]->age_6_b;
          $data['age_6_g']                 = $enrolment1tbl1[0]->age_6_g;
          $data['age_7_b']                 = $enrolment1tbl1[0]->age_7_b;
          $data['age_7_g']                 = $enrolment1tbl1[0]->age_7_g;
          $data['age_abv7_b']              = $enrolment1tbl1[0]->age_abv7_b;
          $data['age_abv7_g']              = $enrolment1tbl1[0]->age_abv7_g;
          $data['tot_chldns_adgrd1_b']     = $enrolment1tbl1[0]->tot_chldns_adgrd1_b;
          $data['tot_chldns_adgrd1_g']     = $enrolment1tbl1[0]->tot_chldns_adgrd1_g;
          $data['tot_grd1_smeschl_b']      = $enrolment1tbl1[0]->tot_grd1_smeschl_b;
          $data['tot_grd1_smeschl_g']      = $enrolment1tbl1[0]->tot_grd1_smeschl_g;
          $data['tot_grd1_anthrschl_b']    = $enrolment1tbl1[0]->tot_grd1_anthrschl_b;
          $data['tot_grd1_anthrschl_g']    = $enrolment1tbl1[0]->tot_grd1_anthrschl_g;
          $data['tot_grd1_ecce_b']         = $enrolment1tbl1[0]->tot_grd1_ecce_b;
          $data['tot_grd1_ecce_g']         = $enrolment1tbl1[0]->tot_grd1_ecce_g;


          $enrolment1tbl2 = $this->Udise_enrolmentmodel->enrlmntfrm3_data($school_id);
                              
                      if (!$enrolment1tbl2) {

                                  $age = array('blw5','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','gt22');
                                  foreach ($age as $age) {
                                    $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'age'          => $age,
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                                    $this->Udise_enrolmentmodel->enrol1frm2insert($result);
                                }
                       }

          // ***** Enrolment page1 Form3 *****
          $enrlmntfrm3data          = $this->Udise_enrolmentmodel->enrlmntfrm3_data($school_id);

              foreach ($enrlmntfrm3data as $frm2) {
               
                // set1
               if ($frm2->age=='blw5') {
                    $data[$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data[$frm2->age.'_'.'i_g'] =  $frm2->i_g;
               }
              // set1 Ending

                // set2
               if ($frm2->age=='5') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
               }
              // set2 Ending

               // set3
               if ($frm2->age=='6') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
               }
              // set3 Ending

               // set4
               if ($frm2->age=='7') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
               }
              // set4 Ending

               // set5
               if ($frm2->age=='8') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
               }
              // set5 Ending


               // set6
               if ($frm2->age=='9') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
               }
              // set6 Ending

               // set7
               if ($frm2->age=='10') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
               }
              // set7 Ending

               // set8
               if ($frm2->age=='11') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
               }
              // set8 Ending

               // set9
               if ($frm2->age=='12') {
                    $data['ag'.$frm2->age.'_'.'i_b'] =  $frm2->i_b;
                    $data['ag'.$frm2->age.'_'.'i_g'] =  $frm2->i_g;
                    $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
               }
              // set9 Ending

               // set10
               if ($frm2->age=='13') {
                     $data['ag'.$frm2->age.'_'.'ii_b'] =  $frm2->ii_b;
                    $data['ag'.$frm2->age.'_'.'ii_g'] =  $frm2->ii_g;
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
               }
              // set10 Ending

               // set11
               if ($frm2->age=='14') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
               }
              // set11 Ending

               // set12
               if ($frm2->age=='15') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set12 Ending

               // set13
               if ($frm2->age=='16') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set13 Ending

               // set14
               if ($frm2->age=='17') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set14 Ending

               // set15
               if ($frm2->age=='18') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set15 Ending

               // set16
               if ($frm2->age=='19') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set16 Ending

               // set17
               if ($frm2->age=='20') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set17 Ending

               // set18
               if ($frm2->age=='21') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set18 Ending

               // set19
               if ($frm2->age=='22') {
                    $data['ag'.$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data['ag'.$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data['ag'.$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data['ag'.$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data['ag'.$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data['ag'.$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data['ag'.$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data['ag'.$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data['ag'.$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data['ag'.$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data['ag'.$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data['ag'.$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data['ag'.$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data['ag'.$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data['ag'.$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data['ag'.$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data['ag'.$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data['ag'.$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data['ag'.$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data['ag'.$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set19 Ending


               // set20
               if ($frm2->age=='gt22') {
                    $data[$frm2->age.'_'.'iii_b'] =  $frm2->iii_b;
                    $data[$frm2->age.'_'.'iii_g'] =  $frm2->iii_g;
                    $data[$frm2->age.'_'.'iv_b'] =  $frm2->iv_b;
                    $data[$frm2->age.'_'.'iv_g'] =  $frm2->iv_g;
                    $data[$frm2->age.'_'.'v_b'] =  $frm2->v_b;
                    $data[$frm2->age.'_'.'v_g'] =  $frm2->v_g;
                    $data[$frm2->age.'_'.'vi_b'] =  $frm2->vi_b;
                    $data[$frm2->age.'_'.'vi_g'] =  $frm2->vi_g;
                    $data[$frm2->age.'_'.'vii_b'] =  $frm2->vii_b;
                    $data[$frm2->age.'_'.'vii_g'] =  $frm2->vii_g;
                    $data[$frm2->age.'_'.'viii_b'] =  $frm2->viii_b;
                    $data[$frm2->age.'_'.'viii_g'] =  $frm2->viii_g;
                    $data[$frm2->age.'_'.'ix_b'] =  $frm2->ix_b;
                    $data[$frm2->age.'_'.'ix_g'] =  $frm2->ix_g;
                    $data[$frm2->age.'_'.'x_b'] =  $frm2->x_b;
                    $data[$frm2->age.'_'.'x_g'] =  $frm2->x_g;
                    $data[$frm2->age.'_'.'xi_b'] =  $frm2->xi_b;
                    $data[$frm2->age.'_'.'xi_g'] =  $frm2->xi_g;
                    $data[$frm2->age.'_'.'xii_b'] =  $frm2->xii_b;
                    $data[$frm2->age.'_'.'xii_g'] =  $frm2->xii_g;
               }
              // set20 Ending

            }

         


          // ***** Enrolment page1 Form3 Ending*****

          $this->load->view('Udise/emis_school_enrolment1',$data);  
          }
          else
          {
          redirect('/', 'refresh');
          }
        }
      }
      else
      {
      redirect('/', 'refresh');
    }
  }

  public

  function emis_school_enrolment2()
    {
      date_default_timezone_set('Asia/Kolkata');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
                    
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');
          $school_id = $this->session->userdata('emis_school_id');
          $school_udise = $this->session->userdata('emis_school_udise');
          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {

          $school_id = $this->session->userdata('emis_school_id');

          $detail = $this->Udise_enrolmentmodel->get_med_dtls($school_id);

          $data['mediums'] = $this->Udise_enrolmentmodel->get_all_mediums(); 


          $medium = array();

          if($detail[0]->tamil_med){
            array_push($medium,"Tamil");
          }

          if($detail[0]->eng_med){
            array_push($medium,"English");
          }

          if ($detail[0]->tel_med) {
            array_push($medium,"Telugu");
          }

          if ($detail[0]->mal_med) {
            array_push($medium,"Malayalam");
          }

          if ($detail[0]->kan_med) {
            array_push($medium,"Kannada");
          }


          if ($detail[0]->urdu_med) {
            array_push($medium,"Urdu");
          }


          if ($detail[0]->oth_med) {
            array_push($medium,"Others");
          }

         

          $data['dropdwnmedium'] = $medium;


          $data['tbl1datas'] =  $this->Udise_enrolmentmodel->gettbl1dtsdata($school_id);


          

          //***** Enrolment module2 form2 *****
          // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

          $enrlmnt2frm2data  =  $this->Udise_enrolmentmodel->enrolmnt2frm2_get($school_id);

                        if ($enrlmnt2frm2data) {
                              if ($this->input->post('enrlmnt2frm2cat')!="") {
                                
                                    
                                    $category = $this->input->post('enrlmnt2frm2cat');
                                    $tb1 =  $this->input->post('tb1');
                                    $tb2 =  $this->input->post('tb2');
                                    $tb3 =  $this->input->post('tb3');
                                    $tb4 =  $this->input->post('tb4');
                                    $tb5 =  $this->input->post('tb5');
                                    $tb6 =  $this->input->post('tb6');
                                    $tb7 =  $this->input->post('tb7');
                                    $tb8 =  $this->input->post('tb8');
                                    $tb9 =  $this->input->post('tb9');
                                    $tb10 = $this->input->post('tb10');
                                    $tb11 = $this->input->post('tb11');
                                    $tb12 = $this->input->post('tb12');
                                    $tb13 = $this->input->post('tb13');
                                    $tb14 = $this->input->post('tb14');
                                    $tb15 = $this->input->post('tb15');
                                    $tb16 = $this->input->post('tb16');
                                    $tb17 = $this->input->post('tb17');
                                    $tb18 = $this->input->post('tb18');
                                    $tb19 = $this->input->post('tb19');
                                    $tb20 = $this->input->post('tb20');
                                    $tb21 = $this->input->post('tb21');
                                    $tb22 = $this->input->post('tb22');
                                    $tb23 = $this->input->post('tb23');
                                    $tb24 = $this->input->post('tb24');

                                    $this->form_validation->set_rules('tb1', 'I | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb2', 'I | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb3', 'II | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb4', 'II | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb5', 'III | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb6', 'III | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb7', 'IV | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb8', 'IV | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb9', 'V | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb10', 'V | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb11', 'VI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb12', 'VI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb13', 'VII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb14', 'VII | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb15', 'VIII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb16', 'VIII | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb17', 'IX | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb18', 'IX | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb19', 'X | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb20', 'X | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb21', 'XI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb22', 'XI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb23', 'XII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb24', 'XII | Girls', 'required|max_length[6]|numeric');


                                    if ($this->form_validation->run()==FALSE) {
                                      $this->session->set_flashdata('enrolment2frm2', validation_errors());
                                    }else{  

                                    $result = array(
                                        'i_b'      => $tb1,
                                        'i_g'      => $tb2,
                                        'ii_b'     => $tb3,
                                        'ii_g'     => $tb4,
                                        'iii_b'    => $tb5,
                                        'iii_g'    => $tb6,
                                        'iv_b'     => $tb7,
                                        'iv_g'     => $tb8,
                                        'v_b'      => $tb9,
                                        'v_g'      => $tb10,
                                        'vi_b'     => $tb11,
                                        'vi_g'     => $tb12,
                                        'vii_b'    => $tb13,
                                        'vii_g'    => $tb14,
                                        'viii_b'   => $tb15,
                                        'viii_g'   => $tb16,
                                        'ix_b'     => $tb17,
                                        'ix_g'     => $tb18,
                                        'x_b'      => $tb19,
                                        'x_g'      => $tb20,
                                        'xi_b'     => $tb21,
                                        'xi_g'     => $tb22,
                                        'xii_b'    => $tb23,
                                        'xii_g'    => $tb24
                                    );
                                    $this->Udise_enrolmentmodel->enrolmnt2frm2updte($result,$school_id,$category);
                            }
                           }
                          }else{ 

                                   $category[0] = 'gen';
                                   $category[1] = 'sc';
                                   $category[2] = 'st';
                                   $category[3] = 'obc';
                                   $category[4] = 'muslm';
                                   $category[5] = 'chrst';
                                   $category[6] = 'sikh';
                                   $category[7] = 'budhst';
                                   $category[8] = 'parsi';
                                   $category[9] = 'jain';
                                   $category[10] = 'othrs';



                       for($a=0;$a<count($category);$a++){
                          $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'category'     => $category[$a],                      
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol2frm2insert($result);
                       }
               }

               $enrolmnt2frm2_get = $this->Udise_enrolmentmodel->enrolmnt2frm2_get($school_id);

               foreach ($enrolmnt2frm2_get as $enrol2) {
              // set1
               if ($enrol2->category=='gen') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set1 Ending

               // set2
               if ($enrol2->category=='sc') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set2 Ending

               // set3
               if ($enrol2->category=='st') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set3 Ending

               // set4
               if ($enrol2->category=='obc') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set4 Ending

               // set5
               if ($enrol2->category=='muslm') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set5 Ending

               // set6
               if ($enrol2->category=='chrst') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set6 Ending

               // set7
               if ($enrol2->category=='sikh') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set7 Ending


               // set8
               if ($enrol2->category=='budhst') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set8 Ending

               // set9
               if ($enrol2->category=='parsi') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set9 Ending

               // set10
               if ($enrol2->category=='jain') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set10 Ending

               // set11
               if ($enrol2->category=='othrs') {
                    $data[$enrol2->category.'_'.'i_b'] =  $enrol2->i_b;
                    $data[$enrol2->category.'_'.'i_g'] =  $enrol2->i_g;
                    $data[$enrol2->category.'_'.'ii_b'] =  $enrol2->ii_b;
                    $data[$enrol2->category.'_'.'ii_g'] =  $enrol2->ii_g;
                    $data[$enrol2->category.'_'.'iii_b'] =  $enrol2->iii_b;
                    $data[$enrol2->category.'_'.'iii_g'] =  $enrol2->iii_g;
                    $data[$enrol2->category.'_'.'iv_b'] =  $enrol2->iv_b;
                    $data[$enrol2->category.'_'.'iv_g'] =  $enrol2->iv_g;
                    $data[$enrol2->category.'_'.'v_b'] =  $enrol2->v_b;
                    $data[$enrol2->category.'_'.'v_g'] =  $enrol2->v_g;
                    $data[$enrol2->category.'_'.'vi_b'] =  $enrol2->vi_b;
                    $data[$enrol2->category.'_'.'vi_g'] =  $enrol2->vi_g;
                    $data[$enrol2->category.'_'.'vii_b'] =  $enrol2->vii_b;
                    $data[$enrol2->category.'_'.'vii_g'] =  $enrol2->vii_g;
                    $data[$enrol2->category.'_'.'viii_b'] =  $enrol2->viii_b;
                    $data[$enrol2->category.'_'.'viii_g'] =  $enrol2->viii_g;
                    $data[$enrol2->category.'_'.'ix_b'] =  $enrol2->ix_b;
                    $data[$enrol2->category.'_'.'ix_g'] =  $enrol2->ix_g;
                    $data[$enrol2->category.'_'.'x_b'] =  $enrol2->x_b;
                    $data[$enrol2->category.'_'.'x_g'] =  $enrol2->x_g;
                    $data[$enrol2->category.'_'.'xi_b'] =  $enrol2->xi_b;
                    $data[$enrol2->category.'_'.'xi_g'] =  $enrol2->xi_g;
                    $data[$enrol2->category.'_'.'xii_b'] =  $enrol2->xii_b;
                    $data[$enrol2->category.'_'.'xii_g'] =  $enrol2->xii_g;
               }
              // set11 Ending
              }
            
          // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
          //***** Enrolment module2 form2 Ending*****
          
          $this->load->view('Udise/emis_school_enrolment2',$data);
        }
    }
  }
  else{
          redirect('/','refresh');
        }

    }

  public

  function emis_school_enrolment3()
    {
      date_default_timezone_set('Asia/Kolkata');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
          
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');

          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        $school_udise = $this->session->userdata('emis_school_udise');
     
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {
          $school_id = $this->session->userdata('emis_school_id');
          $form0 = $this->Udise_enrolmentmodel->enrol3frm1get($school_id);
          
          if (!$form0) {
                              $result1= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol3frm1insert($result1);
          }
          
                                    

           $form2 = $this->Udise_enrolmentmodel->enrol3frm2get($school_id);

          if($form2)
          {
            if($this->input->post('stream') != "" && $this->input->post('category'))
          { 


                                    $this->form_validation->set_rules('tb1', 'Enrolment | ClassXI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb2', 'Enrolment | ClassXI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb3', 'Enrolment | ClassXII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb4', 'Enrolment | ClassXII | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb5', 'Repeaters | ClassXI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb6', 'Repeaters | ClassXI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb7', 'Repeaters | ClassXII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb8', 'Repeaters | ClassXII | Girls', 'required|max_length[6]|numeric');

                                    if ($this->form_validation->run()==FALSE) {
                                      $this->session->set_flashdata('enrolment3frm1', validation_errors());
                                    }else{

                                    $stream   = $this->input->post('stream');
                                    $category = $this->input->post('category');
                                    $tb1 = $this->input->post('tb1');
                                    $tb2 = $this->input->post('tb2');
                                    $tb3 = $this->input->post('tb3');
                                    $tb4 = $this->input->post('tb4');
                                    $tb5 = $this->input->post('tb5');
                                    $tb6 = $this->input->post('tb6');
                                    $tb7 = $this->input->post('tb7');
                                    $tb8 = $this->input->post('tb8');
                               
              

              $result= array(                            
                              'enrol_xi_b'   => $tb1,
                              'enrol_xi_g'   => $tb2,
                              'enrol_xii_b'  => $tb3,
                              'enrol_xii_g'  => $tb4,
                              'reptrs_xi_b'  => $tb5,
                              'reptrs_xi_g'  => $tb6,
                              'reptrs_xii_b' => $tb7,
                              'reptrs_xii_g' => $tb8,
                            );
              $this->Udise_enrolmentmodel->enrol3frm2update($result,$school_id,$stream,$category);
            }
          }
        }
          else
          {
                       $streams[0] = 'arts';
                       $streams[1] = 'science';
                       $streams[2] = 'commerce';
                       $streams[3] = 'vocational';
                       $streams[4] = 'oth_stream';

                       $category[0] = 'gen';
                       $category[1] = 'sc';
                       $category[2] = 'st';
                       $category[3] = 'obc';


                       for($i=0;$i<5;$i++){
                        for ($j=0; $j < 4; $j++) { 
                          $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'stream'       => $streams[$i],
                                        'category'     => $category[$j],                      
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol3frm3insert_school($result);
                        }
                        
                       }

        }
          
          
          $form1 = $this->Udise_enrolmentmodel->enrol3frm1get($school_id);
          $data['arts'] = $form1[0]->arts;
          $data['science'] = $form1[0]->science;
          $data['commerce'] = $form1[0]->commerce;
          $data['vocational'] = $form1[0]->vocational;
          $data['oth_stream'] = $form1[0]->oth_stream;
                  $enrol3frm2details = $this->Udise_enrolmentmodel->enrol3frm2_getdata($school_id);
                      
                      foreach ($enrol3frm2details as $details) {

                        // set1
                        if ($details->stream == 'arts' && $details->category == 'gen') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'sc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'st') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'obc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }
                        // set1 Ending

                        // set2
                        if ($details->stream == 'science' && $details->category == 'gen') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'sc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'st') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'obc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }
                        // set2 Ending

                        // set3
                        if ($details->stream == 'commerce' && $details->category == 'gen') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'sc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'st') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'obc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }
                        // set3 Ending


                        // set4
                        if ($details->stream == 'vocational' && $details->category == 'gen') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'sc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'st') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'obc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }
                        // set4 Ending


                        // set5
                        if ($details->stream == 'oth_stream' && $details->category == 'gen') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'sc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'st') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'obc') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }
                        // set5 Ending

                  }

         $this->load->view('Udise/emis_school_enrolment3',$data);

        }
      }
    }else{
          redirect('/','refresh');
        }
    
    }

  public

  function emis_school_enrolment4()
    {
      date_default_timezone_set('Asia/Kolkata');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
          
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');

          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        $school_udise = $this->session->userdata('emis_school_udise');
        $school_id    = $this->session->userdata('emis_school_id');
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {
          
          $details = $this->Homemodel->get_school_form1_details($school_udise);


          $enrol4frm = $this->Udise_enrolmentmodel->enrol4frmget($school_id);

          if($enrol4frm)
          {
            if($this->input->post('stream') != "" && $this->input->post('category'))
          {

                            $this->form_validation->set_rules('tb1', 'Enrolment | ClassXI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb2', 'Enrolment | ClassXI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb3', 'Enrolment | ClassXII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb4', 'Enrolment | ClassXII | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb5', 'Repeaters | ClassXI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb6', 'Repeaters | ClassXI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb7', 'Repeaters | ClassXII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb8', 'Repeaters | ClassXII | Girls', 'required|max_length[6]|numeric');

                              if ($this->form_validation->run()==FALSE) {
                                 $this->session->set_flashdata('enrolment4frm1', validation_errors());
                            }else{

                                  $stream   = $this->input->post('stream');
                                  $category = $this->input->post('category');
                                  $tb1 = $this->input->post('tb1');
                                  $tb2 = $this->input->post('tb2');
                                  $tb3 = $this->input->post('tb3');
                                  $tb4 = $this->input->post('tb4');
                                  $tb5 = $this->input->post('tb5');
                                  $tb6 = $this->input->post('tb6');
                                  $tb7 = $this->input->post('tb7');
                                  $tb8 = $this->input->post('tb8');

              $result= array(                            
                              'enrol_xi_b'   => $tb1,
                              'enrol_xi_g'   => $tb2,
                              'enrol_xii_b'  => $tb3,
                              'enrol_xii_g'  => $tb4,
                              'reptrs_xi_b'  => $tb5,
                              'reptrs_xi_g'  => $tb6,
                              'reptrs_xii_b' => $tb7,
                              'reptrs_xii_g' => $tb8,
                            );
              $this->Udise_enrolmentmodel->enrol4frmupdate($result,$school_id,$stream,$category);
            }
          }
        }
          else
          {

                     
                       $streams1[0] = 'arts';
                       $streams1[1] = 'science';
                       $streams1[2] = 'commerce';
                       $streams1[3] = 'vocational';
                       $streams1[4] = 'oth_stream';

                       $category1[0] = 'muslm';
                       $category1[1] = 'christ';
                       $category1[2] = 'sikh';
                       $category1[3] = 'budhst';
                       $category1[4] = 'parsi';
                       $category1[5] = 'jain';


                       for($a=0;$a<count($streams1);$a++){
                        for ($b=0; $b<count($category1); $b++) { 
                          $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'stream'       => $streams1[$a],
                                        'category'     => $category1[$b],                      
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol4frminsert_school($result);
                        }
                       }
        }
                       
          
            $enolment4frmget = $this->Udise_enrolmentmodel->enrol4frmget($school_id);
            foreach ($enolment4frmget as $details) {
                       
                       // set1
                        if ($details->stream == 'arts' && $details->category == 'muslm') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'christ') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'sikh') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'budhst') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'parsi') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'arts' && $details->category == 'jain') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        // set1 Ending

                        // set2
                        if ($details->stream == 'science' && $details->category == 'muslm') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'christ') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'sikh') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'budhst') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'parsi') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'science' && $details->category == 'jain') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        // set2 Ending

                        // set3
                        if ($details->stream == 'commerce' && $details->category == 'muslm') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'christ') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'sikh') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'budhst') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'parsi') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'commerce' && $details->category == 'jain') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        // set3 Ending

                        // set4
                        if ($details->stream == 'vocational' && $details->category == 'muslm') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'christ') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'sikh') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'budhst') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'parsi') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'vocational' && $details->category == 'jain') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        // set4 Ending

                        // set5
                        if ($details->stream == 'oth_stream' && $details->category == 'muslm') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'christ') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'sikh') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'budhst') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'parsi') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        if ($details->stream == 'oth_stream' && $details->category == 'jain') {
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_b'] =  $details->enrol_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xi_g'] =  $details->enrol_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_b'] =  $details->enrol_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'enrol_xii_g'] =  $details->enrol_xii_g;

                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_b'] =  $details->reptrs_xi_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xi_g'] =  $details->reptrs_xi_g;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_b'] =  $details->reptrs_xii_b;
                           $data[$details->stream.'_'.$details->category.'_'.'reptrs_xii_g'] =  $details->reptrs_xii_g;
                        }

                        // set5 Ending

            }
          $this->load->view('Udise/emis_school_enrolment4',$data);
        }
      }
    }else{
          redirect('/','refresh');
        }
    
    }

// ***** Enrolment5 *****
    public

  function emis_school_enrolment5()
    {
      date_default_timezone_set('Asia/Kolkata');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
          
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');

          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        $school_udise = $this->session->userdata('emis_school_udise');
        $school_id    = $this->session->userdata('emis_school_id');
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {
                if ($this->input->post('enrlmnt2frm3cat')!="" && $this->input->post('enrlmnt2frm3cat')) {
                       $imprmnt_type = $this->input->post('enrlmnt2frm3cat');
                       $enrol5getdata = $this->Udise_enrolmentmodel->enrol5frmget($school_id,$imprmnt_type);

                            $this->form_validation->set_rules('tb1', ' I | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb2', ' I | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb3', ' II | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb4', ' II | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb5', ' III | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb6', ' III | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb7', ' IV | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb8', ' IV | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb9', ' V | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb10', ' V | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb11', ' VI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb12', ' VI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb13', ' VII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb14', ' VII | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb15', ' VIII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb16', ' VIII | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb17', ' XI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb18', ' XI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb19', ' X | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb20', ' X | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb21', ' XI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb22', ' XI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb23', ' XII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb24', ' XII | Girls', 'required|max_length[6]|numeric');

                              if ($this->form_validation->run()==FALSE) {
                                 $this->session->set_flashdata('enrolment5frm1', validation_errors());
                            }else{

                                    $tb1 =  $this->input->post('tb1');
                                    $tb2 =  $this->input->post('tb2');
                                    $tb3 =  $this->input->post('tb3');
                                    $tb4 =  $this->input->post('tb4');
                                    $tb5 =  $this->input->post('tb5');
                                    $tb6 =  $this->input->post('tb6');
                                    $tb7 =  $this->input->post('tb7');
                                    $tb8 =  $this->input->post('tb8');
                                    $tb9 =  $this->input->post('tb9');
                                    $tb10 = $this->input->post('tb10');
                                    $tb11 = $this->input->post('tb11');
                                    $tb12 = $this->input->post('tb12');
                                    $tb13 = $this->input->post('tb13');
                                    $tb14 = $this->input->post('tb14');
                                    $tb15 = $this->input->post('tb15');
                                    $tb16 = $this->input->post('tb16');
                                    $tb17 = $this->input->post('tb17');
                                    $tb18 = $this->input->post('tb18');
                                    $tb19 = $this->input->post('tb19');
                                    $tb20 = $this->input->post('tb20');
                                    $tb21 = $this->input->post('tb21');
                                    $tb22 = $this->input->post('tb22');
                                    $tb23 = $this->input->post('tb23');
                                    $tb24 = $this->input->post('tb24');


                        if ($enrol5getdata) {

                                    $result = array(
                                        'i_b'   => $tb1,
                                        'i_g'   => $tb2,
                                        'ii_b'  => $tb3,
                                        'ii_g'  => $tb4,
                                        'iii_b' => $tb5,
                                        'iii_g' => $tb6,
                                        'iv_b'  => $tb7,
                                        'iv_g'  => $tb8,
                                        'v_b'   => $tb9,
                                        'v_g'   => $tb10,
                                        'vi_b'  => $tb11,
                                        'vi_g'  => $tb12,
                                        'vii_b' => $tb13,
                                        'vii_g' => $tb14,
                                        'viii_b'=> $tb15,
                                        'viii_g'=> $tb16,
                                        'ix_b'  => $tb17,
                                        'ix_g'  => $tb18,
                                        'x_b'   => $tb19,
                                        'x_g'   => $tb20,
                                        'xi_b'  => $tb21,
                                        'xi_g'  => $tb22,
                                        'xii_b' => $tb23,
                                        'xii_g' => $tb24
                                    );
                                    $this->Udise_enrolmentmodel->enrol5update($result,$school_id,$imprmnt_type);
                    
                          }else{ 
                                    
                                   
                                    $result = array(
                                        'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'imprmnt_type' => $imprmnt_type,
                                        'i_b'   => $tb1,
                                        'i_g'   => $tb2,
                                        'ii_b'  => $tb3,
                                        'ii_g'  => $tb4,
                                        'iii_b' => $tb5,
                                        'iii_g' => $tb6,
                                        'iv_b'  => $tb7,
                                        'iv_g'  => $tb8,
                                        'v_b'   => $tb9,
                                        'v_g'   => $tb10,
                                        'vi_b'  => $tb11,
                                        'vi_g'  => $tb12,
                                        'vii_b' => $tb13,
                                        'vii_g' => $tb14,
                                        'viii_b'=> $tb15,
                                        'viii_g'=> $tb16,
                                        'ix_b'  => $tb17,
                                        'ix_g'  => $tb18,
                                        'x_b'   => $tb19,
                                        'x_g'   => $tb20,
                                        'xi_b'  => $tb21,
                                        'xi_g'  => $tb22,
                                        'xii_b' => $tb23,
                                        'xii_g' => $tb24,
                                        'createdat'    => date('Y-m-d H:i:s')
                                    );
                                    $this->Udise_enrolmentmodel->enrol5insert($result);
                          }
              }
          }
            }

            $data['records']=$this->Udise_enrolmentmodel->getjoinrecordsenrol5($school_id);

           

            $this->load->view('Udise/emis_school_enrolment5',$data);
        }
    }else{
          redirect('/','refresh');
        }
    
    }
// ***** Enrolment5 Ending *****



    // ***** Enrolment6 *****
    public

  function emis_school_enrolment6()
    {
      date_default_timezone_set('Asia/Kolkata');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
      if ($emis_loggedin) {
          
          $emis_templog = $this->session->userdata('emis_school_templog');
          $emis_templog1 = $this->session->userdata('emis_school_templog1');

          if ($emis_templog == 0 || $emis_templog1 == 0)
        {
        redirect('home/emis_school_gotoredirect', 'refresh');
        }
        else
        {
        $user_type_id = $this->session->userdata('emis_user_type_id');
        $school_udise = $this->session->userdata('emis_school_udise');
        $school_id    = $this->session->userdata('emis_school_id');
        if ($user_type_id == 1 || $user_type_id == 2 || $user_type_id == 3)
          {
                
                       $enrol6getdata = $this->Udise_enrolmentmodel->getenrol6($school_id);

                        if ($enrol6getdata) {
                              if ($this->input->post('enrol6slctcat')!="" && $this->input->post('enrol6slctcat')) {
                                $category = $this->input->post('enrol6slctcat');

                            $this->form_validation->set_rules('tb1', ' Pre-Primary | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb2', ' Pre-Primary | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb3', ' I | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb4', ' I | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb5', ' II | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb6', ' II | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb7', ' III | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb8', ' III | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb9', ' IV | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb10', ' IV | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb11', ' V | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb12', ' V | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb13', ' VI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb14', ' VI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb15', ' VII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb16', ' VII | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb17', ' VIII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb18', ' VIII | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb19', ' XI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb20', ' XI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb21', ' X | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb22', ' X | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb23', ' XI | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb24', ' XI | Girls', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb25', ' XII | Boys', 'required|max_length[6]|numeric');
                            $this->form_validation->set_rules('tb26', ' XII | Girls', 'required|max_length[6]|numeric');

                              if ($this->form_validation->run()==FALSE) {
                                 $this->session->set_flashdata('enrolment6frm1', validation_errors());
                            }else{


                                    $tb1 =  $this->input->post('tb1');
                                    $tb2 =  $this->input->post('tb2');
                                    $tb3 =  $this->input->post('tb3');
                                    $tb4 =  $this->input->post('tb4');
                                    $tb5 =  $this->input->post('tb5');
                                    $tb6 =  $this->input->post('tb6');
                                    $tb7 =  $this->input->post('tb7');
                                    $tb8 =  $this->input->post('tb8');
                                    $tb9 =  $this->input->post('tb9');
                                    $tb10 = $this->input->post('tb10');
                                    $tb11 = $this->input->post('tb11');
                                    $tb12 = $this->input->post('tb12');
                                    $tb13 = $this->input->post('tb13');
                                    $tb14 = $this->input->post('tb14');
                                    $tb15 = $this->input->post('tb15');
                                    $tb16 = $this->input->post('tb16');
                                    $tb17 = $this->input->post('tb17');
                                    $tb18 = $this->input->post('tb18');
                                    $tb19 = $this->input->post('tb19');
                                    $tb20 = $this->input->post('tb20');
                                    $tb21 = $this->input->post('tb21');
                                    $tb22 = $this->input->post('tb22');
                                    $tb23 = $this->input->post('tb23');
                                    $tb24 = $this->input->post('tb24');
                                    $tb25 = $this->input->post('tb25');
                                    $tb26 = $this->input->post('tb26');

                                    

                                    $result = array(
                                        'prepri_b' => $tb1,
                                        'prepri_g' => $tb2,
                                        'i_b'      => $tb3,
                                        'i_g'      => $tb4,
                                        'ii_b'     => $tb5,
                                        'ii_g'     => $tb6,
                                        'iii_b'    => $tb7,
                                        'iii_g'    => $tb8,
                                        'iv_b'     => $tb9,
                                        'iv_g'     => $tb10,
                                        'v_b'      => $tb11,
                                        'v_g'      => $tb12,
                                        'vi_b'     => $tb13,
                                        'vi_g'     => $tb14,
                                        'vii_b'    => $tb15,
                                        'vii_g'    => $tb16,
                                        'viii_b'   => $tb17,
                                        'viii_g'   => $tb18,
                                        'ix_b'     => $tb19,
                                        'ix_g'     => $tb20,
                                        'x_b'      => $tb21,
                                        'x_g'      => $tb22,
                                        'xi_b'     => $tb23,
                                        'xi_g'     => $tb24,
                                        'xii_b'    => $tb25,
                                        'xii_g'    => $tb26
                                    );
                                    $this->Udise_enrolmentmodel->enrol6update($result,$school_id,$category);
                            }
                          }
                          }else{ 

                                   $category[0] = 'gen';
                                   $category[1] = 'sc';
                                   $category[2] = 'st';
                                   $category[3] = 'obc';
                                   $category[4] = 'muslm';
                                   $category[5] = 'christ';
                                   $category[6] = 'sikh';
                                   $category[7] = 'budhst';
                                   $category[8] = 'parsi';
                                   $category[9] = 'jain';
                                   $category[10] = 'othrs';



                       for($a=0;$a<count($category);$a++){
                          $result= array( 'school_udise' => $school_udise,
                                        'school_key_id'=> $school_id,
                                        'category'     => $category[$a],                      
                                        'createdat'    => date('Y-m-d H:i:s')
                                      );
                           $this->Udise_enrolmentmodel->enrol6insert($result);
                       }
               }

            }

             $data=$this->Udise_enrolmentmodel->getenrol6($school_id);

             foreach ($data as $enrol6) {
              // set1
               if ($enrol6->category=='gen') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set1 Ending

               // set2
               if ($enrol6->category=='sc') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set2 Ending

               // set3
               if ($enrol6->category=='st') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set3 Ending

               // set4
               if ($enrol6->category=='obc') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set4 Ending

               // set5
               if ($enrol6->category=='muslm') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set5 Ending

               // set6
               if ($enrol6->category=='christ') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set6 Ending

               // set7
               if ($enrol6->category=='sikh') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set7 Ending


               // set8
               if ($enrol6->category=='budhst') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set8 Ending

               // set9
               if ($enrol6->category=='parsi') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set9 Ending

               // set10
               if ($enrol6->category=='jain') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set10 Ending

               // set11
               if ($enrol6->category=='othrs') {
                    $data[$enrol6->category.'_'.'prepri_b'] =  $enrol6->prepri_b;
                    $data[$enrol6->category.'_'.'prepri_g'] =  $enrol6->prepri_g;
                    $data[$enrol6->category.'_'.'i_b'] =  $enrol6->i_b;
                    $data[$enrol6->category.'_'.'i_g'] =  $enrol6->i_g;
                    $data[$enrol6->category.'_'.'ii_b'] =  $enrol6->ii_b;
                    $data[$enrol6->category.'_'.'ii_g'] =  $enrol6->ii_g;
                    $data[$enrol6->category.'_'.'iii_b'] =  $enrol6->iii_b;
                    $data[$enrol6->category.'_'.'iii_g'] =  $enrol6->iii_g;
                    $data[$enrol6->category.'_'.'iv_b'] =  $enrol6->iv_b;
                    $data[$enrol6->category.'_'.'iv_g'] =  $enrol6->iv_g;
                    $data[$enrol6->category.'_'.'v_b'] =  $enrol6->v_b;
                    $data[$enrol6->category.'_'.'v_g'] =  $enrol6->v_g;
                    $data[$enrol6->category.'_'.'vi_b'] =  $enrol6->vi_b;
                    $data[$enrol6->category.'_'.'vi_g'] =  $enrol6->vi_g;
                    $data[$enrol6->category.'_'.'vii_b'] =  $enrol6->vii_b;
                    $data[$enrol6->category.'_'.'vii_g'] =  $enrol6->vii_g;
                    $data[$enrol6->category.'_'.'viii_b'] =  $enrol6->viii_b;
                    $data[$enrol6->category.'_'.'viii_g'] =  $enrol6->viii_g;
                    $data[$enrol6->category.'_'.'ix_b'] =  $enrol6->ix_b;
                    $data[$enrol6->category.'_'.'ix_g'] =  $enrol6->ix_g;
                    $data[$enrol6->category.'_'.'x_b'] =  $enrol6->x_b;
                    $data[$enrol6->category.'_'.'x_g'] =  $enrol6->x_g;
                    $data[$enrol6->category.'_'.'xi_b'] =  $enrol6->xi_b;
                    $data[$enrol6->category.'_'.'xi_g'] =  $enrol6->xi_g;
                    $data[$enrol6->category.'_'.'xii_b'] =  $enrol6->xii_b;
                    $data[$enrol6->category.'_'.'xii_g'] =  $enrol6->xii_g;
               }
              // set11 Ending

             }
           

            $this->load->view('Udise/emis_school_enrolment6',$data);
        }
    }else{
          redirect('/','refresh');
        }
    
    }
// ***** Enrolment6 Ending *****



  
    // ***** enrolment page1 Form1 *****
    public

    function enrolmnt1frm1(){

      $emis_loggedin = $this->session->userdata('emis_loggedin');
      $school_id = $this->session->userdata('emis_school_id');
      if ($emis_loggedin) {

          $this->form_validation->set_rules('enrlmnt1_b_tb1', 'Age (in complete years) | Below 5 | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb2', 'Age (in complete years) | Age 5 | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb3', 'Age (in complete years) | Age 6 | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb4', 'Age (in complete years) | Age 7 | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb5', 'Age (in complete years) | Age above 7 | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb6', 'Total children admitted in grade 1', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb7', 'Out of the Total in Grade I Number of children with pre-school experience in | Same School | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb8', 'Out of the Total in Grade I Number of children with pre-school experience in | Another school | Boys', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_b_tb9', 'Out of the Total in Grade I Number of children with pre-school experience in | Anganwadi/ECCE center | Boys', 'required|max_length[6]|numeric');

          $this->form_validation->set_rules('enrlmnt1_g_tb1', 'Age (in complete years) | Below 5 | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb2', 'Age (in complete years) | Age 5 | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb3', 'Age (in complete years) | Age 6 | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb4', 'Age (in complete years) | Age 7 | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb5', 'Age (in complete years) | Age above 7 | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb6', 'Total children admitted in grade 1', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb7', 'Out of the Total in Grade I Number of children with pre-school experience in | Same School | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb8', 'Out of the Total in Grade I Number of children with pre-school experience in | Another school | Girls', 'required|max_length[6]|numeric');
          $this->form_validation->set_rules('enrlmnt1_g_tb9', 'Out of the Total in Grade I Number of children with pre-school experience in | Anganwadi/ECCE center | Girls', 'required|max_length[6]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment1', validation_errors());
          }else{
        // set1
        $age_blw5_b           = $this->input->post('enrlmnt1_b_tb1');
        $age_5_b              = $this->input->post('enrlmnt1_b_tb2');
        $age_6_b              = $this->input->post('enrlmnt1_b_tb3');
        $age_7_b              = $this->input->post('enrlmnt1_b_tb4');
        $age_abv7_b           = $this->input->post('enrlmnt1_b_tb5');
        $tot_chldns_adgrd1_b  = $this->input->post('enrlmnt1_b_tb6');
        $tot_grd1_smeschl_b   = $this->input->post('enrlmnt1_b_tb7');
        $tot_grd1_anthrschl_b = $this->input->post('enrlmnt1_b_tb8');
        $tot_grd1_ecce_b      = $this->input->post('enrlmnt1_b_tb9');
        // set1 Ending

        // set2
        $age_blw5_g           = $this->input->post('enrlmnt1_g_tb1');
        $age_5_g              = $this->input->post('enrlmnt1_g_tb2');
        $age_6_g              = $this->input->post('enrlmnt1_g_tb3');
        $age_7_g              = $this->input->post('enrlmnt1_g_tb4');
        $age_abv7_g           = $this->input->post('enrlmnt1_g_tb5');
        $tot_chldns_adgrd1_g  = $this->input->post('enrlmnt1_g_tb6');
        $tot_grd1_smeschl_g   = $this->input->post('enrlmnt1_g_tb7');
        $tot_grd1_anthrschl_g = $this->input->post('enrlmnt1_g_tb8');
        $tot_grd1_ecce_g      = $this->input->post('enrlmnt1_g_tb9');
        // set2 Ending

        $data=array(
           'age_blw5_b'                 => $age_blw5_b,
           'age_5_b'                    => $age_5_b,
           'age_6_b'                    => $age_6_b,
           'age_7_b'                    => $age_7_b,
           'age_abv7_b'                 => $age_abv7_b,
           'tot_chldns_adgrd1_b'        => $tot_chldns_adgrd1_b,
           'tot_grd1_smeschl_b'         => $tot_grd1_smeschl_b,
           'tot_grd1_anthrschl_b'       => $tot_grd1_anthrschl_b,
           'tot_grd1_ecce_b'            => $tot_grd1_ecce_b,

           'age_blw5_g'                 => $age_blw5_g,
           'age_5_g'                    => $age_5_g,
           'age_6_g'                    => $age_6_g,
           'age_7_g'                    => $age_7_g,
           'age_abv7_g'                 => $age_abv7_g,
           'tot_chldns_adgrd1_g'        => $tot_chldns_adgrd1_g,
           'tot_grd1_smeschl_g'         => $tot_grd1_smeschl_g,
           'tot_grd1_anthrschl_g'       => $tot_grd1_anthrschl_g,
           'tot_grd1_ecce_g'            => $tot_grd1_ecce_g,
        );

        $this->Udise_enrolmentmodel->enrlmentfrm1update($data, $school_id);
      }
      // php validation Ending
        redirect('Udise_enrolment/emis_school_enrolment1','refresh');
      }else{
        redirect('Udise_enrolment/emis_school_enrolment1', 'refresh');
      }

    }
    // ***** enrolment page1 Form1 *****


    // ***** Enrolment page1 Form3 *****
    public

    function enrolmnt1frm3(){

      $emis_loggedin = $this->session->userdata('emis_loggedin');
      $school_id     = $this->session->userdata('emis_school_id');

      if ($emis_loggedin) {
          
          $enlmnttfrm3drpdwn = $this->input->post('myage');


          if ($enlmnttfrm3drpdwn == 'blw5') {

             $this->form_validation->set_rules('lt5tb1', 'Age <5 | I | Boys', 'required|max_length[6]|numeric');
             $this->form_validation->set_rules('lt5tb2', 'Age <5 | I | Girls', 'required|max_length[6]|numeric');
         
          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              
              $i_b       = $this->input->post('lt5tb1');
              $i_g       = $this->input->post('lt5tb2');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

          if ($enlmnttfrm3drpdwn == '5') {
              
              $this->form_validation->set_rules('ag5tb1', 'Age 5 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag5tb2', 'Age 5 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag5tb3', 'Age 5 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag5tb4', 'Age 5 | II | Girls', 'required|max_length[6]|numeric');
         
          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{

              $i_b       = $this->input->post('ag5tb1');
              $i_g       = $this->input->post('ag5tb2');
              $ii_b      = $this->input->post('ag5tb3');
              $ii_g      = $this->input->post('ag5tb4');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'    => $ii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }

        }


          if ($enlmnttfrm3drpdwn == '6') {
              $this->form_validation->set_rules('ag6tb1', 'Age 6 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag6tb2', 'Age 6 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag6tb3', 'Age 6 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag6tb4', 'Age 6 | II | Girls', 'required|max_length[6]|numeric');
         
          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $i_b       = $this->input->post('ag6tb1');
              $i_g       = $this->input->post('ag6tb2');
              $ii_b      = $this->input->post('ag6tb3');
              $ii_g      = $this->input->post('ag6tb4');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'    => $ii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

          if ($enlmnttfrm3drpdwn == '7') {
              
              $this->form_validation->set_rules('ag7tb1', 'Age 7 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag7tb2', 'Age 7 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag7tb3', 'Age 7 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag7tb4', 'Age 7 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag7tb5', 'Age 7 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag7tb6', 'Age 7 | III | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{

              $i_b       = $this->input->post('ag7tb1');
              $i_g       = $this->input->post('ag7tb2');
              $ii_b      = $this->input->post('ag7tb3');
              $ii_g      = $this->input->post('ag7tb4');
              $iii_b     = $this->input->post('ag7tb5');
              $iii_g     = $this->input->post('ag7tb6');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '8') {

              $this->form_validation->set_rules('ag8tb1', 'Age 8 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb2', 'Age 8 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb3', 'Age 8 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb4', 'Age 8 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb5', 'Age 8 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb6', 'Age 8 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb7', 'Age 8 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag8tb8', 'Age 8 | IV | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              
              $i_b       = $this->input->post('ag8tb1');
              $i_g       = $this->input->post('ag8tb2');
              $ii_b      = $this->input->post('ag8tb3');
              $ii_g      = $this->input->post('ag8tb4');
              $iii_b     = $this->input->post('ag8tb5');
              $iii_g     = $this->input->post('ag8tb6');
              $iv_b      = $this->input->post('ag8tb7');
              $iv_g      = $this->input->post('ag8tb8');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

          if ($enlmnttfrm3drpdwn == '9') {
              

              $this->form_validation->set_rules('ag9tb1', 'Age 9 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb2', 'Age 9 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb3', 'Age 9 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb4', 'Age 9 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb5', 'Age 9 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb6', 'Age 9 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb7', 'Age 9 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb8', 'Age 9 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb9', 'Age 9 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag9tb10', 'Age 9 | V | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{

              $i_b       = $this->input->post('ag9tb1');
              $i_g       = $this->input->post('ag9tb2');
              $ii_b      = $this->input->post('ag9tb3');
              $ii_g      = $this->input->post('ag9tb4');
              $iii_b     = $this->input->post('ag9tb5');
              $iii_g     = $this->input->post('ag9tb6');
              $iv_b      = $this->input->post('ag9tb7');
              $iv_g      = $this->input->post('ag9tb8');
              $v_b       = $this->input->post('ag9tb9');
              $v_g       = $this->input->post('ag9tb10');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '10') {

              $this->form_validation->set_rules('ag10tb1', 'Age  10 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb2', 'Age  10 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb3', 'Age  10 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb4', 'Age  10 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb5', 'Age  10 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb6', 'Age  10 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb7', 'Age  10 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb8', 'Age  10 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb9', 'Age  10 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb10', 'Age 10  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb11', 'Age  10 | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag10tb12', 'Age 10  | VI | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              
              $i_b       = $this->input->post('ag10tb1');
              $i_g       = $this->input->post('ag10tb2');
              $ii_b      = $this->input->post('ag10tb3');
              $ii_g      = $this->input->post('ag10tb4');
              $iii_b     = $this->input->post('ag10tb5');
              $iii_g     = $this->input->post('ag10tb6');
              $iv_b      = $this->input->post('ag10tb7');
              $iv_g      = $this->input->post('ag10tb8');
              $v_b       = $this->input->post('ag10tb9');
              $v_g       = $this->input->post('ag10tb10');
              $vi_b      = $this->input->post('ag10tb11');
              $vi_g      = $this->input->post('ag10tb12');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '11') {
              
              $this->form_validation->set_rules('ag11tb1', 'Age  11 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb2', 'Age  11 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb3', 'Age  11 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb4', 'Age  11 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb5', 'Age  11 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb6', 'Age  11 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb7', 'Age  11 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb8', 'Age  11 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb9', 'Age  11 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb10', 'Age 11  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb11', 'Age 11  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb12', 'Age 11  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb13', 'Age 11  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag11tb14', 'Age 11  | VII | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $i_b       = $this->input->post('ag11tb1');
              $i_g       = $this->input->post('ag11tb2');
              $ii_b      = $this->input->post('ag11tb3');
              $ii_g      = $this->input->post('ag11tb4');
              $iii_b     = $this->input->post('ag11tb5');
              $iii_g     = $this->input->post('ag11tb6');
              $iv_b      = $this->input->post('ag11tb7');
              $iv_g      = $this->input->post('ag11tb8');
              $v_b       = $this->input->post('ag11tb9');
              $v_g       = $this->input->post('ag11tb10');
              $vi_b      = $this->input->post('ag11tb11');
              $vi_g      = $this->input->post('ag11tb12');
              $vii_b      = $this->input->post('ag11tb13');
              $vii_g      = $this->input->post('ag11tb14');

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '12') {
              
              $this->form_validation->set_rules('ag12tb1', 'Age  12 | I | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb2', 'Age  12 | I | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb3', 'Age  12 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb4', 'Age  12 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb5', 'Age  12 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb6', 'Age  12 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb7', 'Age  12 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb8', 'Age  12 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb9', 'Age  12 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb10', 'Age 12  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb11', 'Age 12  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb12', 'Age 12  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb13', 'Age 12  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb14', 'Age 12  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb15', 'Age 12  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb16', 'Age 12  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb17', 'Age 12  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag12tb18', 'Age 12  | IX | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{

              $i_b       = $this->input->post('ag12tb1');
              $i_g       = $this->input->post('ag12tb2');
              $ii_b      = $this->input->post('ag12tb3');
              $ii_g      = $this->input->post('ag12tb4');
              $iii_b     = $this->input->post('ag12tb5');
              $iii_g     = $this->input->post('ag12tb6');
              $iv_b      = $this->input->post('ag12tb7');
              $iv_g      = $this->input->post('ag12tb8');
              $v_b       = $this->input->post('ag12tb9');
              $v_g       = $this->input->post('ag12tb10');
              $vi_b      = $this->input->post('ag12tb11');
              $vi_g      = $this->input->post('ag12tb12');
              $vii_b     = $this->input->post('ag12tb13');
              $vii_g     = $this->input->post('ag12tb14');
              $viii_b    = $this->input->post('ag12tb15');
              $viii_g    = $this->input->post('ag12tb16');
              $ix_b      = $this->input->post('ag12tb17');
              $ix_g      = $this->input->post('ag12tb18');
              

              $data = array(
                'i_b'    => $i_b,
                'i_g'    => $i_g,
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '13') {
              
              $this->form_validation->set_rules('ag13tb1', 'Age  13 | II | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb2', 'Age  13 | II | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb3', 'Age  13 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb4', 'Age  13 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb5', 'Age  13 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb6', 'Age  13 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb7', 'Age  13 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb8', 'Age  13 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb9', 'Age  13 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb10', 'Age 13  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb11', 'Age 13  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb12', 'Age 13  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb13', 'Age 13  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb14', 'Age 13  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb15', 'Age 13  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb16', 'Age 13  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb17', 'Age 13  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag13tb18', 'Age 13  | IX | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $ii_b       = $this->input->post('ag13tb1');
              $ii_g       = $this->input->post('ag13tb2');
              $iii_b      = $this->input->post('ag13tb3');
              $iii_g      = $this->input->post('ag13tb4');
              $iv_b       = $this->input->post('ag13tb5');
              $iv_g       = $this->input->post('ag13tb6');
              $v_b        = $this->input->post('ag13tb7');
              $v_g        = $this->input->post('ag13tb8');
              $vi_b       = $this->input->post('ag13tb9');
              $vi_g       = $this->input->post('ag13tb10');
              $vii_b      = $this->input->post('ag13tb11');
              $vii_g      = $this->input->post('ag13tb12');
              $viii_b     = $this->input->post('ag13tb13');
              $viii_g     = $this->input->post('ag13tb14');
              $ix_b       = $this->input->post('ag13tb15');
              $ix_g       = $this->input->post('ag13tb16');
             
              

              $data = array(
                'ii_b'   => $ii_b,
                'ii_g'   => $ii_g,
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

            if ($enlmnttfrm3drpdwn == '14') {
              
              $this->form_validation->set_rules('ag14tb1', 'Age  14 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb2', 'Age  14 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb3', 'Age  14 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb4', 'Age  14 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb5', 'Age  14 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb6', 'Age 14  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb7', 'Age 14  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb8', 'Age 14  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb9', 'Age 14  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb10', 'Age 14  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb11', 'Age 14  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb12', 'Age 14  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb13', 'Age 14  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb14', 'Age 14  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb15', 'Age 14  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb16', 'Age 14  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb17', 'Age 14  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag14tb18', 'Age 14  | XI | Girls', 'required|max_length[6]|numeric');


              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag14tb1');
              $iii_g      = $this->input->post('ag14tb2');
              $iv_b       = $this->input->post('ag14tb3');
              $iv_g       = $this->input->post('ag14tb4');
              $v_b        = $this->input->post('ag14tb5');
              $v_g        = $this->input->post('ag14tb6');
              $vi_b       = $this->input->post('ag14tb7');
              $vi_g       = $this->input->post('ag14tb8');
              $vii_b      = $this->input->post('ag14tb9');
              $vii_g      = $this->input->post('ag14tb10');
              $viii_b     = $this->input->post('ag14tb11');
              $viii_g     = $this->input->post('ag14tb12');
              $ix_b       = $this->input->post('ag14tb13');
              $ix_g       = $this->input->post('ag14tb14');
              $x_b        = $this->input->post('ag14tb15');
              $x_g        = $this->input->post('ag14tb16');
              $xi_b       = $this->input->post('ag14tb17');
              $xi_g       = $this->input->post('ag14tb18');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
            );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '15') {
              
              $this->form_validation->set_rules('ag15tb1', 'Age  15 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb2', 'Age  15 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb3', 'Age  15 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb4', 'Age  15 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb5', 'Age  15 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb6', 'Age 15  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb7', 'Age 15  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb8', 'Age 15  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb9', 'Age 15  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb10', 'Age 15  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb11', 'Age 15  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb12', 'Age 15  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb13', 'Age 15  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb14', 'Age 15  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb15', 'Age 15  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb16', 'Age 15  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb17', 'Age 15  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb18', 'Age 15  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb19', 'Age 15  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag15tb20', 'Age 15  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag15tb1');
              $iii_g      = $this->input->post('ag15tb2');
              $iv_b       = $this->input->post('ag15tb3');
              $iv_g       = $this->input->post('ag15tb4');
              $v_b        = $this->input->post('ag15tb5');
              $v_g        = $this->input->post('ag15tb6');
              $vi_b       = $this->input->post('ag15tb7');
              $vi_g       = $this->input->post('ag15tb8');
              $vii_b      = $this->input->post('ag15tb9');
              $vii_g      = $this->input->post('ag15tb10');
              $viii_b     = $this->input->post('ag15tb11');
              $viii_g     = $this->input->post('ag15tb12');
              $ix_b       = $this->input->post('ag15tb13');
              $ix_g       = $this->input->post('ag15tb14');
              $x_b        = $this->input->post('ag15tb15');
              $x_g        = $this->input->post('ag15tb16');
              $xi_b       = $this->input->post('ag15tb17');
              $xi_g       = $this->input->post('ag15tb18');
              $xii_b      = $this->input->post('ag15tb19');
              $xii_g      = $this->input->post('ag15tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
            );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

          if ($enlmnttfrm3drpdwn == '16') {
              
              $this->form_validation->set_rules('ag16tb1', 'Age  16 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb2', 'Age  16 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb3', 'Age  16 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb4', 'Age  16 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb5', 'Age  16 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb6', 'Age 16  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb7', 'Age 16  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb8', 'Age 16  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb9', 'Age 16  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb10', 'Age 16  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb11', 'Age 16  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb12', 'Age 16  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb13', 'Age 16  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb14', 'Age 16  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb15', 'Age 16  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb16', 'Age 16  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb17', 'Age 16  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb18', 'Age 16  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb19', 'Age 16  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag16tb20', 'Age 16  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag16tb1');
              $iii_g      = $this->input->post('ag16tb2');
              $iv_b       = $this->input->post('ag16tb3');
              $iv_g       = $this->input->post('ag16tb4');
              $v_b        = $this->input->post('ag16tb5');
              $v_g        = $this->input->post('ag16tb6');
              $vi_b       = $this->input->post('ag16tb7');
              $vi_g       = $this->input->post('ag16tb8');
              $vii_b      = $this->input->post('ag16tb9');
              $vii_g      = $this->input->post('ag16tb10');
              $viii_b     = $this->input->post('ag16tb11');
              $viii_g     = $this->input->post('ag16tb12');
              $ix_b       = $this->input->post('ag16tb13');
              $ix_g       = $this->input->post('ag16tb14');
              $x_b        = $this->input->post('ag16tb15');
              $x_g        = $this->input->post('ag16tb16');
              $xi_b       = $this->input->post('ag16tb17');
              $xi_g       = $this->input->post('ag16tb18');
              $xii_b      = $this->input->post('ag16tb19');
              $xii_g      = $this->input->post('ag16tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
            );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '17') {
              
              $this->form_validation->set_rules('ag17tb1', 'Age  17 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb2', 'Age  17 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb3', 'Age  17 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb4', 'Age  17 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb5', 'Age  17 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb6', 'Age 17  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb7', 'Age 17  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb8', 'Age 17  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb9', 'Age 17  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb10', 'Age 17  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb11', 'Age 17  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb12', 'Age 17  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb13', 'Age 17  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb14', 'Age 17  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb15', 'Age 17  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb16', 'Age 17  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb17', 'Age 17  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb18', 'Age 17  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb19', 'Age 17  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag17tb20', 'Age 17  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag17tb1');
              $iii_g      = $this->input->post('ag17tb2');
              $iv_b       = $this->input->post('ag17tb3');
              $iv_g       = $this->input->post('ag17tb4');
              $v_b        = $this->input->post('ag17tb5');
              $v_g        = $this->input->post('ag17tb6');
              $vi_b       = $this->input->post('ag17tb7');
              $vi_g       = $this->input->post('ag17tb8');
              $vii_b      = $this->input->post('ag17tb9');
              $vii_g      = $this->input->post('ag17tb10');
              $viii_b     = $this->input->post('ag17tb11');
              $viii_g     = $this->input->post('ag17tb12');
              $ix_b       = $this->input->post('ag17tb13');
              $ix_g       = $this->input->post('ag17tb14');
              $x_b        = $this->input->post('ag17tb15');
              $x_g        = $this->input->post('ag17tb16');
              $xi_b       = $this->input->post('ag17tb17');
              $xi_g       = $this->input->post('ag17tb18');
              $xii_b      = $this->input->post('ag17tb19');
              $xii_g      = $this->input->post('ag17tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }



          if ($enlmnttfrm3drpdwn == '18') {
              
              
              $this->form_validation->set_rules('ag18tb1', 'Age  18 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb2', 'Age  18 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb3', 'Age  18 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb4', 'Age  18 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb5', 'Age  18 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb6', 'Age 18  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb7', 'Age 18  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb8', 'Age 18  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb9', 'Age 18  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb10', 'Age 18  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb11', 'Age 18  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb12', 'Age 18  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb13', 'Age 18  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb14', 'Age 18  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb15', 'Age 18  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb16', 'Age 18  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb17', 'Age 18  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb18', 'Age 18  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb19', 'Age 18  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag18tb20', 'Age 18  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag18tb1');
              $iii_g      = $this->input->post('ag18tb2');
              $iv_b       = $this->input->post('ag18tb3');
              $iv_g       = $this->input->post('ag18tb4');
              $v_b        = $this->input->post('ag18tb5');
              $v_g        = $this->input->post('ag18tb6');
              $vi_b       = $this->input->post('ag18tb7');
              $vi_g       = $this->input->post('ag18tb8');
              $vii_b      = $this->input->post('ag18tb9');
              $vii_g      = $this->input->post('ag18tb10');
              $viii_b     = $this->input->post('ag18tb11');
              $viii_g     = $this->input->post('ag18tb12');
              $ix_b       = $this->input->post('ag18tb13');
              $ix_g       = $this->input->post('ag18tb14');
              $x_b        = $this->input->post('ag18tb15');
              $x_g        = $this->input->post('ag18tb16');
              $xi_b       = $this->input->post('ag18tb17');
              $xi_g       = $this->input->post('ag18tb18');
              $xii_b      = $this->input->post('ag18tb19');
              $xii_g      = $this->input->post('ag18tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '19') {
              
              $this->form_validation->set_rules('ag19tb1', 'Age  19 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb2', 'Age  19 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb3', 'Age  19 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb4', 'Age  19 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb5', 'Age  19 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb6', 'Age 19  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb7', 'Age 19  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb8', 'Age 19  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb9', 'Age 19  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb10', 'Age 19  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb11', 'Age 19  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb12', 'Age 19  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb13', 'Age 19  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb14', 'Age 19  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb15', 'Age 19  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb16', 'Age 19  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb17', 'Age 19  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb18', 'Age 19  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb19', 'Age 19  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag19tb20', 'Age 19  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag19tb1');
              $iii_g      = $this->input->post('ag19tb2');
              $iv_b       = $this->input->post('ag19tb3');
              $iv_g       = $this->input->post('ag19tb4');
              $v_b        = $this->input->post('ag19tb5');
              $v_g        = $this->input->post('ag19tb6');
              $vi_b       = $this->input->post('ag19tb7');
              $vi_g       = $this->input->post('ag19tb8');
              $vii_b      = $this->input->post('ag19tb9');
              $vii_g      = $this->input->post('ag19tb10');
              $viii_b     = $this->input->post('ag19tb11');
              $viii_g     = $this->input->post('ag19tb12');
              $ix_b       = $this->input->post('ag19tb13');
              $ix_g       = $this->input->post('ag19tb14');
              $x_b        = $this->input->post('ag19tb15');
              $x_g        = $this->input->post('ag19tb16');
              $xi_b       = $this->input->post('ag19tb17');
              $xi_g       = $this->input->post('ag19tb18');
              $xii_b      = $this->input->post('ag19tb19');
              $xii_g      = $this->input->post('ag19tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
                
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == '20') {
              
              $this->form_validation->set_rules('ag20tb1', 'Age  20 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb2', 'Age  20 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb3', 'Age  20 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb4', 'Age  20 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb5', 'Age  20 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb6', 'Age 20  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb7', 'Age 20  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb8', 'Age 20  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb9', 'Age 20  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb10', 'Age 20  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb11', 'Age 20  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb12', 'Age 20  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb13', 'Age 20  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb14', 'Age 20  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb15', 'Age 20  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb16', 'Age 20  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb17', 'Age 20  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb18', 'Age 20  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb19', 'Age 20  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag20tb20', 'Age 20  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag20tb1');
              $iii_g      = $this->input->post('ag20tb2');
              $iv_b       = $this->input->post('ag20tb3');
              $iv_g       = $this->input->post('ag20tb4');
              $v_b        = $this->input->post('ag20tb5');
              $v_g        = $this->input->post('ag20tb6');
              $vi_b       = $this->input->post('ag20tb7');
              $vi_g       = $this->input->post('ag20tb8');
              $vii_b      = $this->input->post('ag20tb9');
              $vii_g      = $this->input->post('ag20tb10');
              $viii_b     = $this->input->post('ag20tb11');
              $viii_g     = $this->input->post('ag20tb12');
              $ix_b       = $this->input->post('ag20tb13');
              $ix_g       = $this->input->post('ag20tb14');
              $x_b        = $this->input->post('ag20tb15');
              $x_g        = $this->input->post('ag20tb16');
              $xi_b       = $this->input->post('ag20tb17');
              $xi_g       = $this->input->post('ag20tb18');
              $xii_b      = $this->input->post('ag20tb19');
              $xii_g      = $this->input->post('ag20tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
                
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }

          if ($enlmnttfrm3drpdwn == '21') {
              
              $this->form_validation->set_rules('ag21tb1', 'Age  21 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb2', 'Age  21 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb3', 'Age  21 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb4', 'Age  21 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb5', 'Age  21 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb6', 'Age 21  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb7', 'Age 21  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb8', 'Age 21  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb9', 'Age 21  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb10', 'Age 21  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb11', 'Age 21  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb12', 'Age 21  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb13', 'Age 21  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb14', 'Age 21  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb15', 'Age 21  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb16', 'Age 21  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb17', 'Age 21  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb18', 'Age 21  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb19', 'Age 21  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag21tb20', 'Age 21  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag21tb1');
              $iii_g      = $this->input->post('ag21tb2');
              $iv_b       = $this->input->post('ag21tb3');
              $iv_g       = $this->input->post('ag21tb4');
              $v_b        = $this->input->post('ag21tb5');
              $v_g        = $this->input->post('ag21tb6');
              $vi_b       = $this->input->post('ag21tb7');
              $vi_g       = $this->input->post('ag21tb8');
              $vii_b      = $this->input->post('ag21tb9');
              $vii_g      = $this->input->post('ag21tb10');
              $viii_b     = $this->input->post('ag21tb11');
              $viii_g     = $this->input->post('ag21tb12');
              $ix_b       = $this->input->post('ag21tb13');
              $ix_g       = $this->input->post('ag21tb14');
              $x_b        = $this->input->post('ag21tb15');
              $x_g        = $this->input->post('ag21tb16');
              $xi_b       = $this->input->post('ag21tb17');
              $xi_g       = $this->input->post('ag21tb18');
              $xii_b      = $this->input->post('ag21tb19');
              $xii_g      = $this->input->post('ag21tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
                
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
      }


          if ($enlmnttfrm3drpdwn == '22') {
              
              $this->form_validation->set_rules('ag22tb1', 'Age  22 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb2', 'Age  22 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb3', 'Age  22 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb4', 'Age  22 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb5', 'Age  22 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb6', 'Age 22  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb7', 'Age 22  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb8', 'Age 22  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb9', 'Age 22  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb10', 'Age 22  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb11', 'Age 22  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb12', 'Age 22  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb13', 'Age 22  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb14', 'Age 22  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb15', 'Age 22  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb16', 'Age 22  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb17', 'Age 22  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb18', 'Age 22  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb19', 'Age 22  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('ag22tb20', 'Age 22  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('ag22tb1');
              $iii_g      = $this->input->post('ag22tb2');
              $iv_b       = $this->input->post('ag22tb3');
              $iv_g       = $this->input->post('ag22tb4');
              $v_b        = $this->input->post('ag22tb5');
              $v_g        = $this->input->post('ag22tb6');
              $vi_b       = $this->input->post('ag22tb7');
              $vi_g       = $this->input->post('ag22tb8');
              $vii_b      = $this->input->post('ag22tb9');
              $vii_g      = $this->input->post('ag22tb10');
              $viii_b     = $this->input->post('ag22tb11');
              $viii_g     = $this->input->post('ag22tb12');
              $ix_b       = $this->input->post('ag22tb13');
              $ix_g       = $this->input->post('ag22tb14');
              $x_b        = $this->input->post('ag22tb15');
              $x_g        = $this->input->post('ag22tb16');
              $xi_b       = $this->input->post('ag22tb17');
              $xi_g       = $this->input->post('ag22tb18');
              $xii_b      = $this->input->post('ag22tb19');
              $xii_g      = $this->input->post('ag22tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
                
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }


          if ($enlmnttfrm3drpdwn == 'gt22') {
              
              $this->form_validation->set_rules('gt22tb1', 'Age  Greater than 22 | III | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb2', 'Age  Greater than 22 | III | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb3', 'Age  Greater than 22 | IV | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb4', 'Age  Greater than 22 | IV | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb5', 'Age  Greater than 22 | V | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb6', 'Age Greater than 22  | V | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb7', 'Age Greater than 22  | VI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb8', 'Age Greater than 22  | VI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb9', 'Age Greater than 22  | VII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb10', 'Age Greater than 22  | VII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb11', 'Age Greater than 22  | VIII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb12', 'Age Greater than 22  | VIII | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb13', 'Age Greater than 22  | IX | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb14', 'Age Greater than 22  | IX | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb15', 'Age Greater than 22  | X | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb16', 'Age Greater than 22  | X | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb17', 'Age Greater than 22  | XI | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb18', 'Age Greater than 22  | XI | Girls', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb19', 'Age Greater than 22  | XII | Boys', 'required|max_length[6]|numeric');
              $this->form_validation->set_rules('gt22tb20', 'Age Greater than 22  | XII | Girls', 'required|max_length[6]|numeric');

              if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('enrolment2', validation_errors());
          }else{
              $iii_b      = $this->input->post('gt22tb1');
              $iii_g      = $this->input->post('gt22tb2');
              $iv_b       = $this->input->post('gt22tb3');
              $iv_g       = $this->input->post('gt22tb4');
              $v_b        = $this->input->post('gt22tb5');
              $v_g        = $this->input->post('gt22tb6');
              $vi_b       = $this->input->post('gt22tb7');
              $vi_g       = $this->input->post('gt22tb8');
              $vii_b      = $this->input->post('gt22tb9');
              $vii_g      = $this->input->post('gt22tb10');
              $viii_b     = $this->input->post('gt22tb11');
              $viii_g     = $this->input->post('gt22tb12');
              $ix_b       = $this->input->post('gt22tb13');
              $ix_g       = $this->input->post('gt22tb14');
              $x_b        = $this->input->post('gt22tb15');
              $x_g        = $this->input->post('gt22tb16');
              $xi_b       = $this->input->post('gt22tb17');
              $xi_g       = $this->input->post('gt22tb18');
              $xii_b      = $this->input->post('gt22tb19');
              $xii_g      = $this->input->post('gt22tb20');
              
             
              

              $data = array(
                'iii_b'  => $iii_b,
                'iii_g'  => $iii_g,
                'iv_b'   => $iv_b,
                'iv_g'   => $iv_g,
                'v_b'    => $v_b,
                'v_g'    => $v_g,
                'vi_b'   => $vi_b,
                'vi_g'   => $vi_g,
                'vii_b'  => $vii_b,
                'vii_g'  => $vii_g,
                'viii_b' => $viii_b,
                'viii_g' => $viii_g,
                'ix_b'   => $ix_b,
                'ix_g'   => $ix_g,
                'x_b'    => $x_b,
                'x_g'    => $x_g,
                'xi_b'   => $xi_b,
                'xi_g'   => $xi_g,
                'xii_b'  => $xii_b,
                'xii_g'  => $xii_g,
              );
              $this->Udise_enrolmentmodel->enrlmentfrm3update($data, $school_id,$enlmnttfrm3drpdwn);
          }
        }



              
              redirect('Udise_enrolment/emis_school_enrolment1','refresh');
      }

      else{
            redirect('Udise_enrolment/emis_school_enrolment1','refresh');
          }

    }
    // ***** Enrolment page1 Form3 Ending *****

    // ***** Enrolmanet page2 Form1 *****
      public

      function enrlmnt2frm1(){

        date_default_timezone_set('Asia/Kolkata');

        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $school_id     = $this->session->userdata('emis_school_id');

        if ($emis_loggedin) {
              $school_udise = $this->session->userdata('emis_school_udise');
          if ($this->input->post('medium') !="" && $this->input->post('medium') ) {
            $medium = $this->input->post('medium');
                                    
              // set1
              $med_i_b  = $this->input->post('tb1');
              $med_i_g  = $this->input->post('tb2');
              // set1 Ending

              // set2
              $med_ii_b  = $this->input->post('tb3');
              $med_ii_g  = $this->input->post('tb4');
              // set2 Ending              


              // set3
              $med_iii_b  = $this->input->post('tb5');
              $med_iii_g  = $this->input->post('tb6');
              // set3 Ending


              // set4
              $med_iv_b  = $this->input->post('tb7');
              $med_iv_g  = $this->input->post('tb8');
              // set4 Ending


              // set5
              $med_v_b  = $this->input->post('tb9');
              $med_v_g  = $this->input->post('tb10');
              // set5 Ending


              // set6
              $med_vi_b  = $this->input->post('tb11');
              $med_vi_g  = $this->input->post('tb12');
              // set6 Ending


              // set7
              $med_vii_b  = $this->input->post('tb13');
              $med_vii_g  = $this->input->post('tb14');
              // set7 Ending


              // set8
              $med_viii_b  = $this->input->post('tb15');
              $med_viii_g  = $this->input->post('tb16');
              // set8 Ending

              // set9
              $med_ix_b  = $this->input->post('tb17');
              $med_ix_g  = $this->input->post('tb18');
              // set9 Ending              

              // set10
              $med_x_b  = $this->input->post('tb19');
              $med_x_g  = $this->input->post('tb20');
              // set10 Ending              

              // set11
              $med_xi_b  = $this->input->post('tb21');
              $med_xi_g  = $this->input->post('tb22');
              // set11 Ending              

              // set12
              $med_xii_b  = $this->input->post('tb23');
              $med_xii_g  = $this->input->post('tb24');
              // set12 Ending              
              $form1 = $this->Udise_enrolmentmodel->gettbl1dts($school_id,$medium);

                                    $this->form_validation->set_rules('tb1', 'I | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb2', 'I | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb3', 'II | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb4', 'II | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb5', 'III | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb6', 'III | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb7', 'IV | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb8', 'IV | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb9', 'V | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb10', 'V | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb11', 'VI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb12', 'VI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb13', 'VII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb14', 'VII | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb15', 'VIII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb16', 'VIII | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb17', 'IX | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb18', 'IX | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb19', 'X | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb20', 'X | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb21', 'XI | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb22', 'XI | Girls', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb23', 'XII | Boys', 'required|max_length[6]|numeric');
                                    $this->form_validation->set_rules('tb24', 'XII | Girls', 'required|max_length[6]|numeric');


                                    if ($this->form_validation->run()==FALSE) {
                                      $this->session->set_flashdata('enrolment2frm1', validation_errors());
                                    }else{

            if ($form1) {


              $data = array(
                // set1
                'med_i_b'      =>  $med_i_b,
                'med_i_g'      =>  $med_i_g,
                // set1 Ending

                // set2
                'med_ii_b'      =>  $med_ii_b,
                'med_ii_g'      =>  $med_ii_g,
                // set2 Ending

                // set3
                'med_iii_b'      =>  $med_iii_b,
                'med_iii_g'      =>  $med_iii_g,
                // set3 Ending

                // set4
                'med_iv_b'      =>  $med_iv_b,
                'med_iv_g'      =>  $med_iv_g,
                // set4 Ending

                // set5
                'med_v_b'      =>  $med_v_b,
                'med_v_g'      =>  $med_v_g,
                // set5 Ending

                // set6
                'med_vi_b'      =>  $med_vi_b,
                'med_vi_g'      =>  $med_vi_g,
                // set6 Ending

                // set7
                'med_vii_b'      =>  $med_vii_b,
                'med_vii_g'      =>  $med_vii_g,
                // set7 Ending

                // set8
                'med_viii_b'      =>  $med_viii_b,
                'med_viii_g'      =>  $med_viii_g,
                // set8 Ending


                // set9
                'med_ix_b'      =>  $med_ix_b,
                'med_ix_g'      =>  $med_ix_g,
                // set9 Ending


                // set10
                'med_x_b'      =>  $med_x_b,
                'med_x_g'      =>  $med_x_g,
                // set10 Ending

                // set11
                'med_xi_b'      =>  $med_xi_b,
                'med_xi_g'      =>  $med_xi_g,
                // set11 Ending

                // set12
                'med_xii_b'      =>  $med_xii_b,
                'med_xii_g'      =>  $med_xii_g,
                // set12 Ending
              );

              $this->Udise_enrolmentmodel->enrl2frm1update($data,$medium,$school_id);
              
            }else{
              
              
              $data = array(

                'udise_code'   =>  $school_udise,

                'school_key_id' => $school_id,

                'med_instrct'  =>  $medium,

                // set1
                'med_i_b'      =>  $med_i_b,
                'med_i_g'      =>  $med_i_g,
                // set1 Ending

                // set2
                'med_ii_b'      =>  $med_ii_b,
                'med_ii_g'      =>  $med_ii_g,
                // set2 Ending

                // set3
                'med_iii_b'      =>  $med_iii_b,
                'med_iii_g'      =>  $med_iii_g,
                // set3 Ending

                // set4
                'med_iv_b'      =>  $med_iv_b,
                'med_iv_g'      =>  $med_iv_g,
                // set4 Ending

                // set5
                'med_v_b'      =>  $med_v_b,
                'med_v_g'      =>  $med_v_g,
                // set5 Ending

                // set6
                'med_vi_b'      =>  $med_vi_b,
                'med_vi_g'      =>  $med_vi_g,
                // set6 Ending

                // set7
                'med_vii_b'      =>  $med_vii_b,
                'med_vii_g'      =>  $med_vii_g,
                // set7 Ending

                // set8
                'med_viii_b'      =>  $med_viii_b,
                'med_viii_g'      =>  $med_viii_g,
                // set8 Ending


                // set9
                'med_ix_b'      =>  $med_ix_b,
                'med_ix_g'      =>  $med_ix_g,
                // set9 Ending


                // set10
                'med_x_b'      =>  $med_x_b,
                'med_x_g'      =>  $med_x_g,
                // set10 Ending

                // set11
                'med_xi_b'      =>  $med_xi_b,
                'med_xi_g'      =>  $med_xi_g,
                // set11 Ending

                // set12
                'med_xii_b'      =>  $med_xii_b,
                'med_xii_g'      =>  $med_xii_g,
                // set12 Ending

                'createdat'              => date('Y-m-d H:i:s')

              );

              $this->Udise_enrolmentmodel->enrl2frm1insrt($data);
            }
          }
          }
              redirect('Udise_enrolment/emis_school_enrolment2','refresh');
        }else{
             redirect('Udise_enrolment/emis_school_enrolment2','refresh');
        }

      }
    // ***** Enroment page2 Form1 Ending *****

    // ***** Enrolment page2 Form1 Remove data *****
       public

       function tbl1remove(){
        $medium_id = $this->uri->segment(3);
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $school_id     = $this->session->userdata('emis_school_id');

        // ***** If part started *****
        if ($emis_loggedin) {
          $this->Udise_enrolmentmodel->enrl2frm1del($medium_id);
          redirect('Udise_enrolment/emis_school_enrolment2','refresh');
        }else{
          redirect('Udise_enrolment/emis_school_enrolment2','refresh');
        }
        // ***** table part Ending *****
       }
    // ***** Enrolment page2 Form1 Remove data Ending*****


    // ***** Enrolment page3 Form1 Update data *****
      // Update Arts

  public

  function updatearts()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "0" || $value == "1" || $value == "2")
        {
        $data = array(
          "arts" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_enrolmentmodel->updatedata($data, $school_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Arts Update " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Update Arts Ending


    // Update Science

  public

  function updatescience()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "0" || $value == "1" || $value == "2")
        {
        $data = array(
          "science" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_enrolmentmodel->updatedata($data, $school_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Science Update " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
// Update Science Ending

    // Update Commerce

  public

  function updatecommerce()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "0" || $value == "1" || $value == "2")
        {
        $data = array(
          "commerce" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_enrolmentmodel->updatedata($data, $school_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Commerce Update " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
// Update Commerce Ending

    // Update Vocational

  public

  function updatevocational()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "0" || $value == "1" || $value == "2")
        {
        $data = array(
          "vocational" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_enrolmentmodel->updatedata($data, $school_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "vocational Update " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
// Update Vocational Ending


    // Update Other stream

  public

  function updateothstream()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "0" || $value == "1" || $value == "2")
        {
        $data = array(
          "oth_stream" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_enrolmentmodel->updatedata($data, $school_id))
          {
          $result_arr['response_code'] = 1;
          }
          else
          {
          $result_arr['response_code'] = 0;
          $result_arr['error_msg'] = "Unable to update the database. Kindly re-try";
          }
        }
        else
        {
        $result_arr['response_code'] = - 1;
        $result_arr['error_msg'] = "Other Streams Update " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
// Update Other stream Ending


// ***** Enrolment page3 Form1 Update data *****
  }

?>





