
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_assesment extends CI_Controller

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

  public

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
    $this->load->model('Udisemodel');
    $this->load->model('Udise_assesmentmodel');
    }

  // assesment *page1 data displaying

  public

  function emis_school_examresult1()
    {
    date_default_timezone_set('Asia/Kolkata');
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
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
          $assmnt1frm1 = $this->Udise_assesmentmodel->get_assesmentfrm1($school_id);

          // form1

          if ($assmnt1frm1)
            {

            if ($this->input->post('category') != "")
              {

            // php validation part 
          $this->form_validation->set_rules('tb1', 'Number of Students Appeared   | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'Number of Students Appeared   | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'Number of Students Passed/Qualified | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'Number of Students Passed/Qualified | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'Number of Students Passed with more than 60% | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'Number of Students Passed with more than 60% | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm1', validation_errors());
          }else{
              $category = $this->input->post('category');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tot1 = (($tb1) + ($tb2));
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tot2 = (($tb3) + ($tb4));
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tot3 = (($tb5) + ($tb6));
              $result = array(
                'stud_apprd_b' => $tb1,
                'stud_apprd_g' => $tb2,
                'stud_apprd_t' => $tot1,
                'stud_passd_b' => $tb3,
                'stud_passd_g' => $tb4,
                'stud_passd_t' => $tot2,
                'stud_passd_mt60_b' => $tb5,
                'stud_passd_mt60_g' => $tb6,
                'stud_passd_mt60_t' => $tot3
              );
              $this->Udise_assesmentmodel->updte_asses1_frm1($result, $school_id, $category);
              }
            }
          // ***** php validation 
          }
          // php valdiation ending
            else
            {
            $category = array(
              'gen',
              'sc',
              'st',
              'obc'
            );
            foreach($category as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'category' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses1frm1insrt($result);
              }
            }

          // form1 Ending

          $assmnt1frm2 = $this->Udise_assesmentmodel->get_assesmentfrm2($school_id);

          // ***** form2 *****

          if ($assmnt1frm2)
            {

              // php form validation
          if ($this->input->post('category_tbl2') != "")
              {
               // php validation part 
          $this->form_validation->set_rules('tb1', 'Number of Students Appeared   | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'Number of Students Appeared   | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'Number of Students Passed/Qualified | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'Number of Students Passed/Qualified | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'Number of Students Passed with more than 60% | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'Number of Students Passed with more than 60% | Girls', 'required|max_length[4]|numeric');
          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm2', validation_errors());
          }else{

              $category = $this->input->post('category_tbl2');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tot1 = (($tb1) + ($tb2));
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tot2 = (($tb3) + ($tb4));
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tot3 = (($tb5) + ($tb6));
              $result = array(
                'stud_apprd_b' => $tb1,
                'stud_apprd_g' => $tb2,
                'stud_apprd_t' => $tot1,
                'stud_passd_b' => $tb3,
                'stud_passd_g' => $tb4,
                'stud_passd_t' => $tot2,
                'stud_passd_mt60_b' => $tb5,
                'stud_passd_mt60_g' => $tb6,
                'stud_passd_mt60_t' => $tot3
              );
              $this->Udise_assesmentmodel->updte_asses1_frm2($result, $school_id, $category);
              }
            }
      }
      // php validation Ending
            else
            {
            $category = array(
              'gen',
              'sc',
              'st',
              'obc'
            );
            foreach($category as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'category' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses1frm2insrt($result);
              }
            }

          // ***** form2 Ending *****

          $assmnt1frm1 = $this->Udise_assesmentmodel->get_assesmentfrm1($school_id);
          foreach($assmnt1frm1 as $form1)
            {
            if ($form1->category == "gen")
              {
              $data[$form1->category . '_' . 'apprd_b'] = $form1->stud_apprd_b;
              $data[$form1->category . '_' . 'apprd_g'] = $form1->stud_apprd_g;
              $data[$form1->category . '_' . 'apprd_t'] = $form1->stud_apprd_t;
              $data[$form1->category . '_' . 'passd_b'] = $form1->stud_passd_b;
              $data[$form1->category . '_' . 'passd_g'] = $form1->stud_passd_g;
              $data[$form1->category . '_' . 'passd_t'] = $form1->stud_passd_t;
              $data[$form1->category . '_' . 'mt60_b'] = $form1->stud_passd_mt60_b;
              $data[$form1->category . '_' . 'mt60_g'] = $form1->stud_passd_mt60_g;
              $data[$form1->category . '_' . 'mt60_t'] = $form1->stud_passd_mt60_t;
              }

            if ($form1->category == "sc")
              {
              $data[$form1->category . '_' . 'apprd_b'] = $form1->stud_apprd_b;
              $data[$form1->category . '_' . 'apprd_g'] = $form1->stud_apprd_g;
              $data[$form1->category . '_' . 'apprd_t'] = $form1->stud_apprd_t;
              $data[$form1->category . '_' . 'passd_b'] = $form1->stud_passd_b;
              $data[$form1->category . '_' . 'passd_g'] = $form1->stud_passd_g;
              $data[$form1->category . '_' . 'passd_t'] = $form1->stud_passd_t;
              $data[$form1->category . '_' . 'mt60_b'] = $form1->stud_passd_mt60_b;
              $data[$form1->category . '_' . 'mt60_g'] = $form1->stud_passd_mt60_g;
              $data[$form1->category . '_' . 'mt60_t'] = $form1->stud_passd_mt60_t;
              }

            if ($form1->category == "st")
              {
              $data[$form1->category . '_' . 'apprd_b'] = $form1->stud_apprd_b;
              $data[$form1->category . '_' . 'apprd_g'] = $form1->stud_apprd_g;
              $data[$form1->category . '_' . 'apprd_t'] = $form1->stud_apprd_t;
              $data[$form1->category . '_' . 'passd_b'] = $form1->stud_passd_b;
              $data[$form1->category . '_' . 'passd_g'] = $form1->stud_passd_g;
              $data[$form1->category . '_' . 'passd_t'] = $form1->stud_passd_t;
              $data[$form1->category . '_' . 'mt60_b'] = $form1->stud_passd_mt60_b;
              $data[$form1->category . '_' . 'mt60_g'] = $form1->stud_passd_mt60_g;
              $data[$form1->category . '_' . 'mt60_t'] = $form1->stud_passd_mt60_t;
              }

            if ($form1->category == "obc")
              {
              $data[$form1->category . '_' . 'apprd_b'] = $form1->stud_apprd_b;
              $data[$form1->category . '_' . 'apprd_g'] = $form1->stud_apprd_g;
              $data[$form1->category . '_' . 'apprd_t'] = $form1->stud_apprd_t;
              $data[$form1->category . '_' . 'passd_b'] = $form1->stud_passd_b;
              $data[$form1->category . '_' . 'passd_g'] = $form1->stud_passd_g;
              $data[$form1->category . '_' . 'passd_t'] = $form1->stud_passd_t;
              $data[$form1->category . '_' . 'mt60_b'] = $form1->stud_passd_mt60_b;
              $data[$form1->category . '_' . 'mt60_g'] = $form1->stud_passd_mt60_g;
              $data[$form1->category . '_' . 'mt60_t'] = $form1->stud_passd_mt60_t;
              }
            }

          // assesment module *page1 *table1

          $assmnt1frm2 = $this->Udise_assesmentmodel->get_assesmentfrm2($school_id);
          foreach($assmnt1frm2 as $form2)
            {
            if ($form2->category == "gen")
              {
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_b'] = $form2->stud_apprd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_g'] = $form2->stud_apprd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_t'] = $form2->stud_apprd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_b'] = $form2->stud_passd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_g'] = $form2->stud_passd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_t'] = $form2->stud_passd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_b'] = $form2->stud_passd_mt60_b;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_g'] = $form2->stud_passd_mt60_g;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_t'] = $form2->stud_passd_mt60_t;
              }

            if ($form2->category == "sc")
              {
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_b'] = $form2->stud_apprd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_g'] = $form2->stud_apprd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_t'] = $form2->stud_apprd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_b'] = $form2->stud_passd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_g'] = $form2->stud_passd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_t'] = $form2->stud_passd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_b'] = $form2->stud_passd_mt60_b;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_g'] = $form2->stud_passd_mt60_g;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_t'] = $form2->stud_passd_mt60_t;
              }

            if ($form2->category == "st")
              {
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_b'] = $form2->stud_apprd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_g'] = $form2->stud_apprd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_t'] = $form2->stud_apprd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_b'] = $form2->stud_passd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_g'] = $form2->stud_passd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_t'] = $form2->stud_passd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_b'] = $form2->stud_passd_mt60_b;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_g'] = $form2->stud_passd_mt60_g;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_t'] = $form2->stud_passd_mt60_t;
              }

            if ($form2->category == "obc")
              {
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_b'] = $form2->stud_apprd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_g'] = $form2->stud_apprd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'apprd_t'] = $form2->stud_apprd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_b'] = $form2->stud_passd_b;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_g'] = $form2->stud_passd_g;
              $data['grd8' . '_' . $form2->category . '_' . 'passd_t'] = $form2->stud_passd_t;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_b'] = $form2->stud_passd_mt60_b;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_g'] = $form2->stud_passd_mt60_g;
              $data['grd8' . '_' . $form2->category . '_' . 'mt60_t'] = $form2->stud_passd_mt60_t;
              }
            }

          // assesment module *page1 *table2

          $this->load->view('Udise/emis_school_examresult1', $data);
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

  // assesment *page1 datas ending
  // Assesment *page2 datas

  public

  function emis_school_boardexamresult1()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
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
          $school_id = $this->session->userdata('emis_school_id');
          $assmnt2frm1 = $this->Udise_assesmentmodel->get_assmnt2frm1($school_id);

          // <<<<<<<<<<<<<<<<<assesment page2 form1>>>>>>>>>>>>>

          if ($assmnt2frm1)
            {
            if ($this->input->post('caten2_tb1') != "")
              {

            // php validation part 
          $this->form_validation->set_rules('tb1', 'Number of Students Appeared | Regular Students | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'Number of Students Appeared | Regular Students | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'Number of Students Appeared | Other than Regular Students (if any) | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'Number of Students Appeared | Other than Regular Students (if any) | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'Number of Students Passed/Qualified | Regular Students | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'Number of Students Passed/Qualified | Regular Students | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'Number of Students Passed/Qualified | Other than Regular Students (if any) | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'Number of Students Passed/Qualified | Other than Regular Students (if any) | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm3', validation_errors());
          }else{
              $category = $this->input->post('caten2_tb1');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tot1 = (($tb1) + ($tb2));
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tot2 = (($tb3) + ($tb4));
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tot3 = (($tb5) + ($tb6));
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot4 = (($tb7) + ($tb8));
              $result = array(
                'stud_aprd_reg_b' => $tb1,
                'stud_aprd_reg_g' => $tb2,
                'stud_aprd_reg_t' => $tot1,
                'stud_aprd_othreg_b' => $tb3,
                'stud_aprd_othreg_g' => $tb4,
                'stud_aprd_othreg_t' => $tot2,
                'stud_pasd_reg_b' => $tb5,
                'stud_pasd_reg_g' => $tb6,
                'stud_pasd_reg_t' => $tot3,
                'stud_pasd_othreg_b' => $tb7,
                'stud_pasd_othreg_g' => $tb8,
                'stud_pasd_othreg_t' => $tot4,
              );
              $this->Udise_assesmentmodel->updte_asses2_frm1($result, $school_id, $category);
              }
            }
          }
            else
            {
            $category = array(
              'gen',
              'sc',
              'st',
              'obc'
            );
            foreach($category as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'category' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses2frm1insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page2 form1 Ending >>>>>>>>>>>>>

          $assmnt2frm2 = $this->Udise_assesmentmodel->get_assmnt2frm2($school_id);

          // <<<<<<<<<<<<<<<<<assesment page2 form2>>>>>>>>>>>>>

          if ($assmnt2frm2)
            {
            if ($this->input->post('en2tb2_cat') != "")
              {

              // php validation part 
          $this->form_validation->set_rules('tb1', 'General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm4', validation_errors());
          }else{

              $range = $this->input->post('en2tb2_cat');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot_b = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot_g = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $result = array(
                'gen_b' => $tb1,
                'gen_g' => $tb2,
                'sc_b' => $tb3,
                'sc_g' => $tb4,
                'st_b' => $tb5,
                'st_g' => $tb6,
                'obc_b' => $tb7,
                'obc_g' => $tb8,
                'tot_b' => $tot_b,
                'tot_g' => $tot_g,
              );
              $this->Udise_assesmentmodel->updte_asses2_frm2($result, $school_id, $range);
              }
            }
        }
            else
            {
            $range = array(
              'ut40',
              '41to60',
              '61to80',
              'abv80'
            );
            foreach($range as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'mark_range' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses2frm2insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page2 form2 Ending >>>>>>>>>>>>>

          $assmnt2frm3 = $this->Udise_assesmentmodel->get_assmnt2frm3($school_id);

          // <<<<<<<<<<<<<<<<<assesment page2 form3>>>>>>>>>>>>>

          if ($assmnt2frm3)
            {
            if ($this->input->post('en2tb3_cat') != "")
              {

                // php validation started


              // php validation part 
          $this->form_validation->set_rules('tb1', 'General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm5', validation_errors());
          }else{

              $range = $this->input->post('en2tb3_cat');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot_b = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot_g = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $result = array(
                'gen_b' => $tb1,
                'gen_g' => $tb2,
                'sc_b' => $tb3,
                'sc_g' => $tb4,
                'st_b' => $tb5,
                'st_g' => $tb6,
                'obc_b' => $tb7,
                'obc_g' => $tb8,
                'tot_b' => $tot_b,
                'tot_g' => $tot_g,
              );
              $this->Udise_assesmentmodel->updte_asses2_frm3($result, $school_id, $range);
              }
            }
        }
        // php validation ending
            else
            {
            $range = array(
              'ut40',
              '41to60',
              '61to80',
              'abv80'
            );
            foreach($range as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'mark_range' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses2frm3insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page2 form3 Ending >>>>>>>>>>>>>

          $assmnt2frm1 = $this->Udise_assesmentmodel->get_assmnt2frm1($school_id);
          foreach($assmnt2frm1 as $form1)
            {
            if ($form1->category == "gen")
              {
              $data[$form1->category . '_' . 'aprd_reg_b'] = $form1->stud_aprd_reg_b;
              $data[$form1->category . '_' . 'aprd_reg_g'] = $form1->stud_aprd_reg_g;
              $data[$form1->category . '_' . 'aprd_reg_t'] = $form1->stud_aprd_reg_t;
              $data[$form1->category . '_' . 'aprd_othreg_b'] = $form1->stud_aprd_othreg_b;
              $data[$form1->category . '_' . 'aprd_othreg_g'] = $form1->stud_aprd_othreg_g;
              $data[$form1->category . '_' . 'aprd_othreg_t'] = $form1->stud_aprd_othreg_t;
              $data[$form1->category . '_' . 'pasd_reg_b'] = $form1->stud_pasd_reg_b;
              $data[$form1->category . '_' . 'pasd_reg_g'] = $form1->stud_pasd_reg_g;
              $data[$form1->category . '_' . 'pasd_reg_t'] = $form1->stud_pasd_reg_t;
              $data[$form1->category . '_' . 'pasd_othreg_b'] = $form1->stud_pasd_othreg_b;
              $data[$form1->category . '_' . 'pasd_othreg_g'] = $form1->stud_pasd_othreg_g;
              $data[$form1->category . '_' . 'pasd_othreg_t'] = $form1->stud_pasd_othreg_t;
              }

            if ($form1->category == "sc")
              {
              $data[$form1->category . '_' . 'aprd_reg_b'] = $form1->stud_aprd_reg_b;
              $data[$form1->category . '_' . 'aprd_reg_g'] = $form1->stud_aprd_reg_g;
              $data[$form1->category . '_' . 'aprd_reg_t'] = $form1->stud_aprd_reg_t;
              $data[$form1->category . '_' . 'aprd_othreg_b'] = $form1->stud_aprd_othreg_b;
              $data[$form1->category . '_' . 'aprd_othreg_g'] = $form1->stud_aprd_othreg_g;
              $data[$form1->category . '_' . 'aprd_othreg_t'] = $form1->stud_aprd_othreg_t;
              $data[$form1->category . '_' . 'pasd_reg_b'] = $form1->stud_pasd_reg_b;
              $data[$form1->category . '_' . 'pasd_reg_g'] = $form1->stud_pasd_reg_g;
              $data[$form1->category . '_' . 'pasd_reg_t'] = $form1->stud_pasd_reg_t;
              $data[$form1->category . '_' . 'pasd_othreg_b'] = $form1->stud_pasd_othreg_b;
              $data[$form1->category . '_' . 'pasd_othreg_g'] = $form1->stud_pasd_othreg_g;
              $data[$form1->category . '_' . 'pasd_othreg_t'] = $form1->stud_pasd_othreg_t;
              }

            if ($form1->category == "st")
              {
              $data[$form1->category . '_' . 'aprd_reg_b'] = $form1->stud_aprd_reg_b;
              $data[$form1->category . '_' . 'aprd_reg_g'] = $form1->stud_aprd_reg_g;
              $data[$form1->category . '_' . 'aprd_reg_t'] = $form1->stud_aprd_reg_t;
              $data[$form1->category . '_' . 'aprd_othreg_b'] = $form1->stud_aprd_othreg_b;
              $data[$form1->category . '_' . 'aprd_othreg_g'] = $form1->stud_aprd_othreg_g;
              $data[$form1->category . '_' . 'aprd_othreg_t'] = $form1->stud_aprd_othreg_t;
              $data[$form1->category . '_' . 'pasd_reg_b'] = $form1->stud_pasd_reg_b;
              $data[$form1->category . '_' . 'pasd_reg_g'] = $form1->stud_pasd_reg_g;
              $data[$form1->category . '_' . 'pasd_reg_t'] = $form1->stud_pasd_reg_t;
              $data[$form1->category . '_' . 'pasd_othreg_b'] = $form1->stud_pasd_othreg_b;
              $data[$form1->category . '_' . 'pasd_othreg_g'] = $form1->stud_pasd_othreg_g;
              $data[$form1->category . '_' . 'pasd_othreg_t'] = $form1->stud_pasd_othreg_t;
              }

            if ($form1->category == "obc")
              {
              $data[$form1->category . '_' . 'aprd_reg_b'] = $form1->stud_aprd_reg_b;
              $data[$form1->category . '_' . 'aprd_reg_g'] = $form1->stud_aprd_reg_g;
              $data[$form1->category . '_' . 'aprd_reg_t'] = $form1->stud_aprd_reg_t;
              $data[$form1->category . '_' . 'aprd_othreg_b'] = $form1->stud_aprd_othreg_b;
              $data[$form1->category . '_' . 'aprd_othreg_g'] = $form1->stud_aprd_othreg_g;
              $data[$form1->category . '_' . 'aprd_othreg_t'] = $form1->stud_aprd_othreg_t;
              $data[$form1->category . '_' . 'pasd_reg_b'] = $form1->stud_pasd_reg_b;
              $data[$form1->category . '_' . 'pasd_reg_g'] = $form1->stud_pasd_reg_g;
              $data[$form1->category . '_' . 'pasd_reg_t'] = $form1->stud_pasd_reg_t;
              $data[$form1->category . '_' . 'pasd_othreg_b'] = $form1->stud_pasd_othreg_b;
              $data[$form1->category . '_' . 'pasd_othreg_g'] = $form1->stud_pasd_othreg_g;
              $data[$form1->category . '_' . 'pasd_othreg_t'] = $form1->stud_pasd_othreg_t;
              }
            }

          // <<<<<<<<<<<<<<<<<assesment page2 form1 Ending>>>>>>>>>>>>>

          $assmnt2frm2 = $this->Udise_assesmentmodel->get_assmnt2frm2($school_id);
          foreach($assmnt2frm2 as $form2)
            {
            if ($form2->mark_range == "ut40")
              {
              $data[$form2->mark_range . '_' . 'gen_b'] = $form2->gen_b;
              $data[$form2->mark_range . '_' . 'gen_g'] = $form2->gen_g;
              $data[$form2->mark_range . '_' . 'sc_b'] = $form2->sc_b;
              $data[$form2->mark_range . '_' . 'sc_g'] = $form2->sc_g;
              $data[$form2->mark_range . '_' . 'st_b'] = $form2->st_b;
              $data[$form2->mark_range . '_' . 'st_g'] = $form2->st_g;
              $data[$form2->mark_range . '_' . 'obc_b'] = $form2->obc_b;
              $data[$form2->mark_range . '_' . 'obc_g'] = $form2->obc_g;
              $data[$form2->mark_range . '_' . 'tot_b'] = $form2->tot_b;
              $data[$form2->mark_range . '_' . 'tot_g'] = $form2->tot_g;
              }

            if ($form2->mark_range == "41to60")
              {
              $data['rng' . '_' . $form2->mark_range . '_' . 'gen_b'] = $form2->gen_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'gen_g'] = $form2->gen_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'sc_b'] = $form2->sc_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'sc_g'] = $form2->sc_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'st_b'] = $form2->st_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'st_g'] = $form2->st_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'obc_b'] = $form2->obc_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'obc_g'] = $form2->obc_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'tot_b'] = $form2->tot_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'tot_g'] = $form2->tot_g;
              }

            if ($form2->mark_range == "61to80")
              {
              $data['rng' . '_' . $form2->mark_range . '_' . 'gen_b'] = $form2->gen_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'gen_g'] = $form2->gen_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'sc_b'] = $form2->sc_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'sc_g'] = $form2->sc_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'st_b'] = $form2->st_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'st_g'] = $form2->st_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'obc_b'] = $form2->obc_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'obc_g'] = $form2->obc_g;
              $data['rng' . '_' . $form2->mark_range . '_' . 'tot_b'] = $form2->tot_b;
              $data['rng' . '_' . $form2->mark_range . '_' . 'tot_g'] = $form2->tot_g;
              }

            if ($form2->mark_range == "abv80")
              {
              $data[$form2->mark_range . '_' . 'gen_b'] = $form2->gen_b;
              $data[$form2->mark_range . '_' . 'gen_g'] = $form2->gen_g;
              $data[$form2->mark_range . '_' . 'sc_b'] = $form2->sc_b;
              $data[$form2->mark_range . '_' . 'sc_g'] = $form2->sc_g;
              $data[$form2->mark_range . '_' . 'st_b'] = $form2->st_b;
              $data[$form2->mark_range . '_' . 'st_g'] = $form2->st_g;
              $data[$form2->mark_range . '_' . 'obc_b'] = $form2->obc_b;
              $data[$form2->mark_range . '_' . 'obc_g'] = $form2->obc_g;
              $data[$form2->mark_range . '_' . 'tot_b'] = $form2->tot_b;
              $data[$form2->mark_range . '_' . 'tot_g'] = $form2->tot_g;
              }
            }

          $assmnt2frm3 = $this->Udise_assesmentmodel->get_assmnt2frm3($school_id);

          // assesment module *page1 *table1

          foreach($assmnt2frm3 as $form3)
            {
            if ($form3->mark_range == "ut40")
              {
              $data['otreg' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "41to60")
              {
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "61to80")
              {
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['otreg' . '_' . 'rng' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "abv80")
              {
              $data['otreg' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['otreg' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }
            }

          // Assesment module *page2 *form3

          $this->load->view('Udise/emis_school_boardexamresult1', $data);
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

  // assesment *page2 values ending
  // assesment *page3 values view

  public

  function emis_school_boardoruniversityexamresult()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
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
          $assmnt3frm1 = $this->Udise_assesmentmodel->get_assmnt3frm1($school_id);

          // <<<<<<<<<<<<<<<<<assesment page3 form1>>>>>>>>>>>>>

          if ($assmnt3frm1)
            {
            if ($this->input->post('stream') != "")
              {

            // php validation part 
          $this->form_validation->set_rules('tb1',  'Number of Students Appeared | General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2',  'Number of Students Appeared | General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3',  'Number of Students Appeared | SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4',  'Number of Students Appeared | SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5',  'Number of Students Appeared | ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6',  'Number of Students Appeared | ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7',  'Number of Students Appeared | OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8',  'Number of Students Appeared | OBC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9',  'Number of Students Passed | General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Number of Students Passed | General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Number of Students Passed | SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Number of Students Passed | SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb13', 'Number of Students Passed | ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb14', 'Number of Students Passed | ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb15', 'Number of Students Passed | OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb16', 'Number of Students Passed | OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm6', validation_errors());
          }else{

              $stream = $this->input->post('stream');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot1 = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot2 = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $tb9 = $this->input->post('tb9');
              $tb10 = $this->input->post('tb10');
              $tb11 = $this->input->post('tb11');
              $tb12 = $this->input->post('tb12');
              $tb13 = $this->input->post('tb13');
              $tb14 = $this->input->post('tb14');
              $tb15 = $this->input->post('tb15');
              $tb16 = $this->input->post('tb16');
              $tot3 = (($tb9) + ($tb11) + ($tb13) + ($tb15));
              $tot4 = (($tb10) + ($tb12) + ($tb14) + ($tb16));
              $result = array(
                'apprd_gen_b' => $tb1,
                'apprd_gen_g' => $tb2,
                'apprd_sc_b' => $tb3,
                'apprd_sc_g' => $tb4,
                'apprd_st_b' => $tb5,
                'apprd_st_g' => $tb6,
                'apprd_obc_b' => $tb7,
                'apprd_obc_g' => $tb8,
                'apprd_tot_b' => $tot1,
                'apprd_tot_g' => $tot2,
                'pasd_gen_b' => $tb9,
                'pasd_gen_g' => $tb10,
                'pasd_sc_b' => $tb11,
                'pasd_sc_g' => $tb12,
                'pasd_st_b' => $tb13,
                'pasd_st_g' => $tb14,
                'pasd_obc_b' => $tb15,
                'pasd_obc_g' => $tb16,
                'pasd_tot_b' => $tot3,
                'pasd_tot_g' => $tot4,
              );
              $this->Udise_assesmentmodel->updte_asses3_frm1($result, $school_id, $stream);
              }
            }
        }
        // php validation Ending
            else
            {
            $stream = array(
              'arts',
              'science',
              'commerce',
              'vocational',
              'oth_stream'
            );
            foreach($stream as $stream)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'stream' => $stream,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->assmnt3frm1insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page3 form1 Ending >>>>>>>>>>>>>

          $assmnt3frm2 = $this->Udise_assesmentmodel->get_assmnt3frm2($school_id);

          // <<<<<<<<<<<<<<<<<assesment page3 form2>>>>>>>>>>>>>

          if ($assmnt3frm2)
            {
            if ($this->input->post('tb2stream2') != "")
              {

                // php validation part 
          $this->form_validation->set_rules('tb1',  'Number of Students Appeared | General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2',  'Number of Students Appeared | General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3',  'Number of Students Appeared | SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4',  'Number of Students Appeared | SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5',  'Number of Students Appeared | ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6',  'Number of Students Appeared | ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7',  'Number of Students Appeared | OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8',  'Number of Students Appeared | OBC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9',  'Number of Students Passed | General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Number of Students Passed | General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Number of Students Passed | SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Number of Students Passed | SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb13', 'Number of Students Passed | ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb14', 'Number of Students Passed | ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb15', 'Number of Students Passed | OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb16', 'Number of Students Passed | OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm7', validation_errors());
          }else{

              $stream = $this->input->post('tb2stream2');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot1 = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot2 = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $tb9 = $this->input->post('tb9');
              $tb10 = $this->input->post('tb10');
              $tb11 = $this->input->post('tb11');
              $tb12 = $this->input->post('tb12');
              $tb13 = $this->input->post('tb13');
              $tb14 = $this->input->post('tb14');
              $tb15 = $this->input->post('tb15');
              $tb16 = $this->input->post('tb16');
              $tot3 = (($tb9) + ($tb11) + ($tb13) + ($tb15));
              $tot4 = (($tb10) + ($tb12) + ($tb14) + ($tb16));
              $result = array(
                'apprd_gen_b' => $tb1,
                'apprd_gen_g' => $tb2,
                'apprd_sc_b' => $tb3,
                'apprd_sc_g' => $tb4,
                'apprd_st_b' => $tb5,
                'apprd_st_g' => $tb6,
                'apprd_obc_b' => $tb7,
                'apprd_obc_g' => $tb8,
                'apprd_tot_b' => $tot1,
                'apprd_tot_g' => $tot2,
                'pasd_gen_b' => $tb9,
                'pasd_gen_g' => $tb10,
                'pasd_sc_b' => $tb11,
                'pasd_sc_g' => $tb12,
                'pasd_st_b' => $tb13,
                'pasd_st_g' => $tb14,
                'pasd_obc_b' => $tb15,
                'pasd_obc_g' => $tb16,
                'pasd_tot_b' => $tot3,
                'pasd_tot_g' => $tot4,
              );
              $this->Udise_assesmentmodel->updte_asses3_frm2($result, $school_id, $stream);
              }
            }
        }
            else
            {
            $stream = array(
              'arts',
              'science',
              'commerce',
              'vocational',
              'oth_stream'
            );
            foreach($stream as $stream)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'stream' => $stream,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->assmnt3frm2insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page3 form2 Ending >>>>>>>>>>>>>

          $assmnt3frm3 = $this->Udise_assesmentmodel->get_assmnt3frm3($school_id);

          // <<<<<<<<<<<<<<<<<assesment page2 form3>>>>>>>>>>>>>

          if ($assmnt3frm3)
            {
            if ($this->input->post('en3tb3_cat') != "")
              {

                // php validation started


              // php validation part 
          $this->form_validation->set_rules('tb1', 'General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm8', validation_errors());
          }else{
              $range = $this->input->post('en3tb3_cat');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot_b = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot_g = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $result = array(
                'gen_b' => $tb1,
                'gen_g' => $tb2,
                'sc_b' => $tb3,
                'sc_g' => $tb4,
                'st_b' => $tb5,
                'st_g' => $tb6,
                'obc_b' => $tb7,
                'obc_g' => $tb8,
                'tot_b' => $tot_b,
                'tot_g' => $tot_g,
              );
              $this->Udise_assesmentmodel->updte_asses3_frm3($result, $school_id, $range);
              }
            }
        }
        // Php validation part Ending
            else
            {
            $range = array(
              'ut40',
              '41to60',
              '61to80',
              'abv80'
            );
            foreach($range as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'mark_range' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses3frm3insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page2 form3 Ending >>>>>>>>>>>>>

          $assmnt3frm4 = $this->Udise_assesmentmodel->get_assmnt3frm4($school_id);

          // <<<<<<<<<<<<<<<<<assesment page2 form3>>>>>>>>>>>>>

          if ($assmnt3frm4)
            {
            if ($this->input->post('en3tb4_cat') != "")
              {

             // php validation part 
          $this->form_validation->set_rules('tb1', 'General | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST | Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC | Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC | Girls', 'required|max_length[4]|numeric');


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('assesmentfrm9', validation_errors());
          }else{

              $range = $this->input->post('en3tb4_cat');
              $tb1 = $this->input->post('tb1');
              $tb2 = $this->input->post('tb2');
              $tb3 = $this->input->post('tb3');
              $tb4 = $this->input->post('tb4');
              $tb5 = $this->input->post('tb5');
              $tb6 = $this->input->post('tb6');
              $tb7 = $this->input->post('tb7');
              $tb8 = $this->input->post('tb8');
              $tot_b = (($tb1) + ($tb3) + ($tb5) + ($tb7));
              $tot_g = (($tb2) + ($tb4) + ($tb6) + ($tb8));
              $result = array(
                'gen_b' => $tb1,
                'gen_g' => $tb2,
                'sc_b' => $tb3,
                'sc_g' => $tb4,
                'st_b' => $tb5,
                'st_g' => $tb6,
                'obc_b' => $tb7,
                'obc_g' => $tb8,
                'tot_b' => $tot_b,
                'tot_g' => $tot_g,
              );
              $this->Udise_assesmentmodel->updte_asses3_frm4($result, $school_id, $range);
              }
            }
        }
        // php validation Ending
            else
            {
            $range = array(
              'ut40',
              '41to60',
              '61to80',
              'abv80'
            );
            foreach($range as $cat)
              {
              $result = array(
                'school_udise' => $school_udise,
                'school_key_id' => $school_id,
                'mark_range' => $cat,
                'createdat' => date('Y-m-d H:i:s')
              );
              $this->Udise_assesmentmodel->get_asses3frm4insrt($result);
              }
            }

          // <<<<<<<<<<<<<<<<< assesment page2 form3 Ending >>>>>>>>>>>>>

          $assmnt3frm1 = $this->Udise_assesmentmodel->get_assmnt3frm1($school_id);

          // ***** Enrolment page3 form1 *****

          foreach($assmnt3frm1 as $form1)
            {
            if ($form1->stream == "arts")
              {
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form1->apprd_gen_b;
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form1->apprd_gen_g;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form1->apprd_sc_b;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form1->apprd_sc_g;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'b'] = $form1->apprd_st_b;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'g'] = $form1->apprd_st_g;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form1->apprd_obc_b;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form1->apprd_obc_g;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form1->apprd_tot_b;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form1->apprd_tot_g;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form1->pasd_gen_b;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form1->pasd_gen_g;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form1->pasd_sc_b;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form1->pasd_sc_g;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'b'] = $form1->pasd_st_b;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'g'] = $form1->pasd_st_g;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form1->pasd_obc_b;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form1->pasd_obc_g;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form1->pasd_tot_b;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form1->pasd_tot_g;
              }

            if ($form1->stream == "science")
              {
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form1->apprd_gen_b;
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form1->apprd_gen_g;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form1->apprd_sc_b;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form1->apprd_sc_g;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'b'] = $form1->apprd_st_b;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'g'] = $form1->apprd_st_g;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form1->apprd_obc_b;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form1->apprd_obc_g;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form1->apprd_tot_b;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form1->apprd_tot_g;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form1->pasd_gen_b;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form1->pasd_gen_g;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form1->pasd_sc_b;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form1->pasd_sc_g;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'b'] = $form1->pasd_st_b;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'g'] = $form1->pasd_st_g;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form1->pasd_obc_b;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form1->pasd_obc_g;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form1->pasd_tot_b;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form1->pasd_tot_g;
              }

            if ($form1->stream == "commerce")
              {
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form1->apprd_gen_b;
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form1->apprd_gen_g;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form1->apprd_sc_b;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form1->apprd_sc_g;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'b'] = $form1->apprd_st_b;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'g'] = $form1->apprd_st_g;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form1->apprd_obc_b;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form1->apprd_obc_g;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form1->apprd_tot_b;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form1->apprd_tot_g;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form1->pasd_gen_b;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form1->pasd_gen_g;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form1->pasd_sc_b;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form1->pasd_sc_g;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'b'] = $form1->pasd_st_b;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'g'] = $form1->pasd_st_g;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form1->pasd_obc_b;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form1->pasd_obc_g;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form1->pasd_tot_b;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form1->pasd_tot_g;
              }

            if ($form1->stream == "vocational")
              {
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form1->apprd_gen_b;
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form1->apprd_gen_g;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form1->apprd_sc_b;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form1->apprd_sc_g;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'b'] = $form1->apprd_st_b;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'g'] = $form1->apprd_st_g;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form1->apprd_obc_b;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form1->apprd_obc_g;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form1->apprd_tot_b;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form1->apprd_tot_g;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form1->pasd_gen_b;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form1->pasd_gen_g;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form1->pasd_sc_b;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form1->pasd_sc_g;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'b'] = $form1->pasd_st_b;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'g'] = $form1->pasd_st_g;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form1->pasd_obc_b;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form1->pasd_obc_g;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form1->pasd_tot_b;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form1->pasd_tot_g;
              }

            if ($form1->stream == "oth_stream")
              {
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form1->apprd_gen_b;
              $data[$form1->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form1->apprd_gen_g;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form1->apprd_sc_b;
              $data[$form1->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form1->apprd_sc_g;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'b'] = $form1->apprd_st_b;
              $data[$form1->stream . '_' . 'apprd_st' . '_' . 'g'] = $form1->apprd_st_g;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form1->apprd_obc_b;
              $data[$form1->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form1->apprd_obc_g;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form1->apprd_tot_b;
              $data[$form1->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form1->apprd_tot_g;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form1->pasd_gen_b;
              $data[$form1->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form1->pasd_gen_g;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form1->pasd_sc_b;
              $data[$form1->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form1->pasd_sc_g;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'b'] = $form1->pasd_st_b;
              $data[$form1->stream . '_' . 'pasd_st' . '_' . 'g'] = $form1->pasd_st_g;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form1->pasd_obc_b;
              $data[$form1->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form1->pasd_obc_g;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form1->pasd_tot_b;
              $data[$form1->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form1->pasd_tot_g;
              }
            }

          // ***** Enrolment page3 form1 ending *****

          $assmnt3frm2 = $this->Udise_assesmentmodel->get_assmnt3frm2($school_id);

          // ***** Enrolment page3 form2 *****

          foreach($assmnt3frm2 as $form2)
            {
            if ($form2->stream == "arts")
              {
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form2->apprd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form2->apprd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form2->apprd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form2->apprd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'b'] = $form2->apprd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'g'] = $form2->apprd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form2->apprd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form2->apprd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form2->apprd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form2->apprd_tot_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form2->pasd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form2->pasd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form2->pasd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form2->pasd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'b'] = $form2->pasd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'g'] = $form2->pasd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form2->pasd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form2->pasd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form2->pasd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form2->pasd_tot_g;
              }

            if ($form2->stream == "science")
              {
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form2->apprd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form2->apprd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form2->apprd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form2->apprd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'b'] = $form2->apprd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'g'] = $form2->apprd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form2->apprd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form2->apprd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form2->apprd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form2->apprd_tot_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form2->pasd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form2->pasd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form2->pasd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form2->pasd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'b'] = $form2->pasd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'g'] = $form2->pasd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form2->pasd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form2->pasd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form2->pasd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form2->pasd_tot_g;
              }

            if ($form2->stream == "commerce")
              {
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form2->apprd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form2->apprd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form2->apprd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form2->apprd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'b'] = $form2->apprd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'g'] = $form2->apprd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form2->apprd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form2->apprd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form2->apprd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form2->apprd_tot_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form2->pasd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form2->pasd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form2->pasd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form2->pasd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'b'] = $form2->pasd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'g'] = $form2->pasd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form2->pasd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form2->pasd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form2->pasd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form2->pasd_tot_g;
              }

            if ($form2->stream == "vocational")
              {
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form2->apprd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form2->apprd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form2->apprd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form2->apprd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'b'] = $form2->apprd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'g'] = $form2->apprd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form2->apprd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form2->apprd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form2->apprd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form2->apprd_tot_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form2->pasd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form2->pasd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form2->pasd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form2->pasd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'b'] = $form2->pasd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'g'] = $form2->pasd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form2->pasd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form2->pasd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form2->pasd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form2->pasd_tot_g;
              }

            if ($form2->stream == "oth_stream")
              {
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'b'] = $form2->apprd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_gen' . '_' . 'g'] = $form2->apprd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'b'] = $form2->apprd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_sc' . '_' . 'g'] = $form2->apprd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'b'] = $form2->apprd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_st' . '_' . 'g'] = $form2->apprd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'b'] = $form2->apprd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_obc' . '_' . 'g'] = $form2->apprd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'b'] = $form2->apprd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'apprd_tot' . '_' . 'g'] = $form2->apprd_tot_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'b'] = $form2->pasd_gen_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_gen' . '_' . 'g'] = $form2->pasd_gen_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'b'] = $form2->pasd_sc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_sc' . '_' . 'g'] = $form2->pasd_sc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'b'] = $form2->pasd_st_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_st' . '_' . 'g'] = $form2->pasd_st_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'b'] = $form2->pasd_obc_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_obc' . '_' . 'g'] = $form2->pasd_obc_g;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'b'] = $form2->pasd_tot_b;
              $data['othreg_' . $form2->stream . '_' . 'pasd_tot' . '_' . 'g'] = $form2->pasd_tot_g;
              }
            }

          // ***** Enrolment page3 form2 Ending *****

          $assmnt3frm3 = $this->Udise_assesmentmodel->get_assmnt3frm3($school_id);
          foreach($assmnt3frm3 as $form3)
            {
            if ($form3->mark_range == "ut40")
              {
              $data[$form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data[$form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data[$form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data[$form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data[$form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data[$form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data[$form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data[$form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data[$form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data[$form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "41to60")
              {
              $data['rng' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "61to80")
              {
              $data['rng' . '_' . $form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data['rng' . '_' . $form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data['rng' . '_' . $form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }

            if ($form3->mark_range == "abv80")
              {
              $data[$form3->mark_range . '_' . 'gen_b'] = $form3->gen_b;
              $data[$form3->mark_range . '_' . 'gen_g'] = $form3->gen_g;
              $data[$form3->mark_range . '_' . 'sc_b'] = $form3->sc_b;
              $data[$form3->mark_range . '_' . 'sc_g'] = $form3->sc_g;
              $data[$form3->mark_range . '_' . 'st_b'] = $form3->st_b;
              $data[$form3->mark_range . '_' . 'st_g'] = $form3->st_g;
              $data[$form3->mark_range . '_' . 'obc_b'] = $form3->obc_b;
              $data[$form3->mark_range . '_' . 'obc_g'] = $form3->obc_g;
              $data[$form3->mark_range . '_' . 'tot_b'] = $form3->tot_b;
              $data[$form3->mark_range . '_' . 'tot_g'] = $form3->tot_g;
              }
            }

          // ***** assesment module *page3 *table1 *****
          // ***** assesment module *page3 *table1 Ending *****

          $assmnt3frm4 = $this->Udise_assesmentmodel->get_assmnt3frm4($school_id);
          foreach($assmnt3frm4 as $form4)
            {
            if ($form4->mark_range == "ut40")
              {
              $data['othreg_' . $form4->mark_range . '_' . 'gen_b'] = $form4->gen_b;
              $data['othreg_' . $form4->mark_range . '_' . 'gen_g'] = $form4->gen_g;
              $data['othreg_' . $form4->mark_range . '_' . 'sc_b'] = $form4->sc_b;
              $data['othreg_' . $form4->mark_range . '_' . 'sc_g'] = $form4->sc_g;
              $data['othreg_' . $form4->mark_range . '_' . 'st_b'] = $form4->st_b;
              $data['othreg_' . $form4->mark_range . '_' . 'st_g'] = $form4->st_g;
              $data['othreg_' . $form4->mark_range . '_' . 'obc_b'] = $form4->obc_b;
              $data['othreg_' . $form4->mark_range . '_' . 'obc_g'] = $form4->obc_g;
              $data['othreg_' . $form4->mark_range . '_' . 'tot_b'] = $form4->tot_b;
              $data['othreg_' . $form4->mark_range . '_' . 'tot_g'] = $form4->tot_g;
              }

            if ($form4->mark_range == "41to60")
              {
              $data['othreg' . '_' . $form4->mark_range . '_' . 'gen_b'] = $form4->gen_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'gen_g'] = $form4->gen_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'sc_b'] = $form4->sc_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'sc_g'] = $form4->sc_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'st_b'] = $form4->st_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'st_g'] = $form4->st_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'obc_b'] = $form4->obc_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'obc_g'] = $form4->obc_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'tot_b'] = $form4->tot_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'tot_g'] = $form4->tot_g;
              }

            if ($form4->mark_range == "61to80")
              {
              $data['othreg' . '_' . $form4->mark_range . '_' . 'gen_b'] = $form4->gen_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'gen_g'] = $form4->gen_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'sc_b'] = $form4->sc_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'sc_g'] = $form4->sc_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'st_b'] = $form4->st_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'st_g'] = $form4->st_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'obc_b'] = $form4->obc_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'obc_g'] = $form4->obc_g;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'tot_b'] = $form4->tot_b;
              $data['othreg' . '_' . $form4->mark_range . '_' . 'tot_g'] = $form4->tot_g;
              }

            if ($form4->mark_range == "abv80")
              {
              $data['othreg_' . $form4->mark_range . '_' . 'gen_b'] = $form4->gen_b;
              $data['othreg_' . $form4->mark_range . '_' . 'gen_g'] = $form4->gen_g;
              $data['othreg_' . $form4->mark_range . '_' . 'sc_b'] = $form4->sc_b;
              $data['othreg_' . $form4->mark_range . '_' . 'sc_g'] = $form4->sc_g;
              $data['othreg_' . $form4->mark_range . '_' . 'st_b'] = $form4->st_b;
              $data['othreg_' . $form4->mark_range . '_' . 'st_g'] = $form4->st_g;
              $data['othreg_' . $form4->mark_range . '_' . 'obc_b'] = $form4->obc_b;
              $data['othreg_' . $form4->mark_range . '_' . 'obc_g'] = $form4->obc_g;
              $data['othreg_' . $form4->mark_range . '_' . 'tot_b'] = $form4->tot_b;
              $data['othreg_' . $form4->mark_range . '_' . 'tot_g'] = $form4->tot_g;
              }
            }

          // ***** assesment module *page3 *table2 *****
          // ***** assesment module *page3 *table2 Ending *****
          // assesment module *page3 *form3
          // assesment module *page3 *form4

          $this->load->view('Udise/emis_school_brdorunivexmreslt', $data);
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

  // schemes module assesment *page3 view ending

  }

?>