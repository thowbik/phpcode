
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_admin extends CI_Controller

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
    $this->load->model('Udise_adminmodel');
    }

    // asset module data update section
  

  // ***** update Respondent Landline STD code *****
  public

  function updateemis_school_admin_respondentlandlinestd()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rsp_lndlne_std" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Respondent Landline STD Code" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Respondent Landline STD code  Ending*****


  // ***** update Respondent Landline Number *****
  public

  function updateemis_school_admin_respondentlandlineno()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rsp_lndlne_no" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Respondent Landline Landline number" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Respondent Landline Number Ending*****


    // ***** update Respondent Mobile Number *****
  public

  function updateemis_school_admin_respondentmobileno()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rsp_mbl_no" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Respondent Mobile number" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Respondent Mobile Number Ending*****


    // ***** update Year of establishment of the school *****
  public

  function updateemis_school_admin_yearofestablishmentschool()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_estd_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Year of establishment of the school" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of establishment of the school Ending *****



     // ***** update When does the academic session start *****
  public

  function updateemis_school_admin_whenacademicsessionstart()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5' || $value == '6' || $value == '7' || $value == '8' || $value == '9' || $value == '10' || $value == '11' || $value == '12')
        {
        $data = array(
          "acd_sess_mnth" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Academic session start" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
 // ***** update When does the academic session start Ending*****


    // ***** update Year of Recognition of the school Elementry *****
  public

  function updateyrofrecofschlelem()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_rec_schl_elem" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Year of Recognition of the school Elementry" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of Recognition of the school Elementry Ending*****


    // ***** update Year of Recognition of the school Secondary *****
  public

  function updateyrofrecofschlsec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_rec_schl_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Year of Recognition of the school Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of Recognition of the school Secondary Ending*****


    // ***** update Year of Recognition of the school Higher Secondary *****
  public

  function updateyrofrecofschlhsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_rec_schl_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Year of Recognition of the school Higher Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of Recognition of the school Higher Secondary Ending*****


    // ***** update Year of upgradation of the school Primary to Upper Primary *****
  public

  function updateyrofupgrdprimtouppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_upgrd_schl_pri_uppr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Year of upgradation of the school Primary to Upper Primary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of upgradation of the school Primary to Upper Primary Ending*****



    // ***** update Year of upgradation of the school Upper Primary to Secondary *****
  public

  function updateyrofupgrduppritosec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_upgrd_schl_upr_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Year of upgradation of the school Upper Primary to Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of upgradation of the school Upper Primary to Secondary Ending*****


    // ***** update Year of upgradation of the school Secondary to Higher Secondary *****
  public

  function updateyrofupgrdsectohsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "yr_upgrd_schl_sec_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Year of upgradation of the Secondary to Higher Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Year of upgradation of the school Secondary to Higher Secondary Ending*****


    // ***** update Is this a shift school *****
  public

  function updateisthisashiftschool()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == 1 || $value == 2)
        {
        $data = array(
          "shftd_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Is this a shift school" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update update Is this a shift school Ending*****




    // ***** update Are the pupils at the primary stage taught throught their mother tongue *****
  public

  function updatepuplatpristgtaugmthrtngue()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == 1 || $value == 2)
        {
        $data = array(
          "pri_stg_mothr_tngue" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update pupils at the primary stage taught throught their mother tongue" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Are the pupils at the primary stage taught throught their mother tongue Ending*****



    // ***** update Does the school offers an pre-vocational course(s) at secondary stage *****
  public

  function updateschlofrprevoccour()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == 1 || $value == 2)
        {
        $data = array(
          "schl_ofr_prevoc_cours" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Does the school offers an pre-vocational course(s) at secondary stage" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Does the school offers an pre-vocational course(s) at secondary stage Ending*****


    // ***** update Does the school provide educational and vocational guidance and counseling to students *****
  public

  function updateschlprvdeducndvocguidcounsl()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == 1 || $value == 2)
        {
        $data = array(
          "schl_prvd_edu_voc_gud" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Does the school provide educational and vocational guidance and counseling to students" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Does the school provide educational and vocational guidance and counseling to students Ending*****



    // ***** update Primary school/section *****
  public

  function updatedistnceoftheprischl()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "pri_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Primary school/section" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Primary school/section Ending*****



    // ***** update Upper Primary school/section *****
  public

  function updatedistnceoftheupprprischl()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "uppri_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Upper Primary school/section" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Upper Primary school/section Ending*****



    // ***** update Secondary school/section *****
  public

  function updatedistnceofthesecschl()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "sec_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Secondary school/section" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update secondary school/section Ending*****



    // ***** update Higher school/section *****
  public

  function updatedistnceofthehscjnrclg()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hsc_schl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Higher Secondary school/section" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Higher school/section Ending*****



    // ***** update Whether school is approachable by all-weather roads *****
  public

  function updatewhtrschlapprchalwthrs()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "schl_aprch_alwther" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update school is approachable by all-weather roads" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** update Whether school is approachable by all-weather roads Ending*****
  // +++++ Administrative Info page 2 Ending +++++

    // +++++ Administrative Info page 3 +++++
    // ***** update Number of instructional days (previous academic year) *****

    // ***** Primary *****
  public

  function updatenoofinstrdyspri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "instr_dys_pri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) primary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Primary Ending*****

    // ***** Secondary *****
  public

  function updatenoofinstrdyssec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "instr_dys_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Secondary Ending*****

    // ***** Upper Primary *****
  public

  function updatenoofinstrdysuppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "instr_dys_uppri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Upper Primary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Upper Primary Ending*****


    // ***** Higher Secondary *****
  public

  function updatenoofinstrdyshsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "instr_dys_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Higher Secondary" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Higher Secondary Ending*****

  // ***** update Number of instructional days (previous academic year) Ending *****


    // ***** update Average school hours for children(per day) - Number of hours children stay in school *****

    // ***** Primary Hours*****
  public

  function updateavgschlhrschldrspri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_chldrn_sty_schl_pri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Primary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Primary Hours Ending*****


    // ***** Primary Minutes*****
  public

  function updateavgschlminschldrspri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_chldrn_sty_schl_pri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Primary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Primary Minutes Ending*****


    // ***** Secondary Hours*****
  public

  function updateavgschlhrschlsec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_chldrn_sty_schl_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Secondary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Secondary Hours Ending*****


    // ***** Secondary Minutes*****
  public

  function updateavgschlminsschldrssec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_chldrn_sty_schl_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Secondary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Secondary Minutes Ending*****


    // ***** Upper Primary Hours*****
  public

  function updateavgschlhrschluppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_chldrn_sty_schl_uppri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Upper Primary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Upper Primary Hours Ending*****


    // ***** Upper Primary Minutes*****
  public

  function updateavgschlminsschluppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_chldrn_sty_schl_uppri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Upper Primary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Upper Primary Minutes Ending*****


    // ***** Higher Secondary Hours*****
  public

  function updateavgschlhrschlhsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_chldrn_sty_schl_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Higher Secondary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Higher Secondary Hours Ending*****


    // ***** Higher Secondary Minutes*****
  public

  function updateavgschlminsschlhsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_chldrn_sty_schl_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of instructional days (previous academic year) Higher Secondary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Higher Secondary Minutes Ending*****

    // ***** update Average school hours for children(per day) - Number of hours children stay in school Ending*****


    // ***** update Average working hours for Teachers(per day) - Number of hours teachers stay in school *****
    // ***** Primary Hours*****
  public

  function updateavgwrknghrstchrspri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_tchrs_sty_schl_pri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Primary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Primary Hours Ending*****

    // ***** Primary Mins *****
  public

  function updateavgwrkngminstchrspri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_tchrs_sty_schl_pri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Primary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Primary Mins Ending*****


    // ***** Secondary Hours*****
  public

  function updateavgwrknghrstchrssec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_tchrs_sty_schl_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Secondary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Secondary Hours Ending*****

    // ***** Secondary Mins *****
  public

  function updateavgwrkngminstchrssec()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_tchrs_sty_schl_sec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Secondary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Secondary Mins Ending*****


  // ***** Upper Primary Hours*****
  public

  function updateavgwrknghrstchrsuppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_tchrs_sty_schl_uppri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Upper Primary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Upper Primary Hours Ending*****

    // ***** Upper Primary Mins *****
  public

  function updateavgwrkngminstchrsuppri()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_tchrs_sty_schl_uppri" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Upper Primary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Upper Primary Mins Ending*****


  // ***** Higher Secondary Hours*****
  public

  function updateavgwrknghrstchrshsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "hrs_tchrs_sty_schl_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Higher Secondary Hours" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Higher Secondary Hours Ending*****

    // ***** Higher Secondary Mins *****
  public

  function updateavgwrkngminstchrshsc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mins_tchrs_sty_schl_hsc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update average working hours for Teachers(per day) - Number of hours teachers stay in school Higher Secondary Minutes" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
  // ***** Higher Secondary Mins Ending*****

    // ***** update Average working hours for Teachers(per day) - Number of hours teachers stay in school Ending*****


    // ***** update Number of children enrolled at entry level under 25% quota as per RTE  *****
    public

  function updatenoofchldrnsenrld25prcnt()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "chldrns_enrld_25prcnt_rte" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of children enrolled at entry level under 25% quota as per RTE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of children enrolled at entry level under 25% quota as per RTE  Ending*****


    // ***** update Number of students continuing who got admission under 25% quota in previous year  *****
    public

  function updatenoofstdntscontigtadmsnundr25prcntqta()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "stud_admsn_25prcnt_prv_yr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of students continuing who got admission under 25% quota in previous year" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of students continuing who got admission under 25% quota in previous year Ending *****


    // ***** update Number of meetings held by SMC during the previous academic year *****
    public

  function updatenoofmtnghldbysmc()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "mtngs_smc_prev_acdyr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of meetings held by SMC during the previous academic year" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of meetings held by SMC during the previous academic year Ending*****



    // ***** update Whether SMC has prepared the School Development Plan *****
    public

  function updatesmcprplndsdp()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "smc_prep_sdp" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Whether SMC has prepared the School Development Plan" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Whether SMC has prepared the School Development Plan Ending*****


    // ***** update Number of visits for academic inspections *****
    public

  function updatenoofvistsacadinspect()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "vists_acd_inspec" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of visits for academic inspections" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of visits for academic inspections Ending *****


    // ***** update Number of visits by CRC Co-ordinator *****
    public

  function updatenoofvistscrccordntr()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "vists_crc_cord" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of visits by CRC Co-ordinator" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of visits by CRC Co-ordinator Ending*****


    // ***** update Number of visits by Block level officer (BRC/BEO) *****
    public

  function updatenoofvistsblcklvlcrs()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "vists_blcklvl_brc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of visits by Block level officer (BRC/BEO)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of visits by Block level officer (BRC/BEO) Ending *****


    // ***** update Number of SMDC meetings held during the last academic year *****
    public

  function updatenoofsmdcmetnghldlstacadyr()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "smdc_metng_lstacd_yr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Number of SMDC meetings held during the last academic year" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Number of SMDC meetings held during the last academic year Ending *****


    // ***** update Whether SMDC has prepared school improvement plan *****
    public

  function updatesmdcprpdschlimprvmntpln()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "smdc_prpd_schl_imprv" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Whether SMDC has prepared school improvement plan" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Whether SMDC has prepared school improvement plan Ending *****



    // ***** update Whether the school building committee (SBC) has been constituted *****
    public

  function updatesbcconstitd()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "sbc_constitd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Whether the school building committee (SBC) has been constituted" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Whether the school building committee (SBC) has been constituted Ending *****



    // ***** update Whether the School has Constituted its Academic Committee *****
    public

  function updateschlhasconstitdacadcomte()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "schl_constitd_acd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_adminmodel->updateadmindata($data, $school_id))
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
        $result_arr['error_msg'] = "update Whether the School has Constituted its Academic Committee" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }
    // ***** update Whether the School has Constituted its Academic Committee Ending *****

    public

    function updateadmin5frm1(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
      // main set1
          $resid_schl = $_POST['isthisresidentialschool'];
        // **** if for Administrative Information step 5 | Is this a residential school *****
        if ($resid_schl == 1) {
            
            $typ_resid_schl = $_POST['typeofresidentialschool'];

            $brdng_fac_avl_stg = $_POST['brdngfacavlflwngstglvl'];
            // **** Is this a residential school | Whether boarding facilities are available for the following Stage/level*****
            if ($brdng_fac_avl_stg == 1) {
                
                // set1
                // **** Whether boarding facilities are available for the following Stage/level |  Primary student *****
                  $resid_pri_stud = $_POST['brdngfacavlflngpristud'];
                if ($resid_pri_stud == 1) {
                  $resid_pri_stud_g =$_POST['noofgirlsprimarystudent'];
                  $resid_pri_stud_b =$_POST['noofboysprimarystudent'];
                }else{
                  $resid_pri_stud_g =NULL;
                  $resid_pri_stud_b =NULL;
                }
                // **** Whether boarding facilities are available for the following Stage/level |  Primary student Ending*****
                // set1 Ending

                // set2
                // **** Whether boarding facilities are available for the following Stage/level |  Upper Primary student *****
                 $resid_uppri_stud = $_POST['brdngfacavlflnguppristud'];
                if ($resid_uppri_stud == 1) {
                  $resid_uppri_stud_g = $_POST['noofgirlsupperprimarystudent'];
                  $resid_uppri_stud_b = $_POST['noofboysupperprimarystudent'];
                }else{
                  $resid_uppri_stud_g =NULL;
                  $resid_uppri_stud_b =NULL;
                }
                // **** Whether boarding facilities are available for the following Stage/level |  Upper Primary student Ending*****
                // set2 Ending


                // set3
                // **** Whether boarding facilities are available for the following Stage/level |  Secondary student *****
                 $resid_sec_stud = $_POST['brdngfacavlflngsecstud'];
                if ($resid_sec_stud == 1) {
                  $resid_sec_stud_g = $_POST['noofgirlssecondarystudent'];
                  $resid_sec_stud_b = $_POST['noofboyssecondarystudent'];
                }else{
                  $resid_sec_stud_g =NULL;
                  $resid_sec_stud_b =NULL;
                }
                // **** Whether boarding facilities are available for the following Stage/level |  Secondary student Ending*****
                // set3 Ending

                // set4
                // **** Whether boarding facilities are available for the following Stage/level | Higher Secondary student *****
                 $resid_hsc_stud = $_POST['brdngfacavlflnghscstud'];
                if ($resid_hsc_stud == 1) {
                  $resid_hsc_stud_b = $_POST['noofgirlshighersecondarystudent'];
                  $resid_hsc_stud_g = $_POST['noofboyshighersecondarystudent'];
                }else{
                  $resid_hsc_stud_b =NULL;
                  $resid_hsc_stud_g =NULL;
                }
                // **** Whether boarding facilities are available for the following Stage/level | Higher Secondary student Ending*****
                // set4 Ending


            }else{
                $resid_pri_stud      = NULL;
                $resid_uppri_stud    = NULL;
                $resid_sec_stud      = NULL;
                $resid_hsc_stud      = NULL;

                $resid_pri_stud_g =NULL;
                $resid_pri_stud_b =NULL;

                $resid_uppri_stud_g =NULL;
                $resid_uppri_stud_b =NULL;

                $resid_sec_stud_g =NULL;
                $resid_sec_stud_b =NULL;

                $resid_hsc_stud_b =NULL;
                $resid_hsc_stud_g =NULL;

            }
            // **** Is this a residential school | Whether boarding facilities are available for the following Stage/level Ending*****

          }else{
            $typ_resid_schl = NULL;
            $brdng_fac_avl_stg = NULL;

            $resid_pri_stud      = NULL;
                $resid_uppri_stud    = NULL;
                $resid_sec_stud      = NULL;
                $resid_hsc_stud      = NULL;

                $resid_pri_stud_g =NULL;
                $resid_pri_stud_b =NULL;

                $resid_uppri_stud_g =NULL;
                $resid_uppri_stud_b =NULL;

                $resid_sec_stud_g =NULL;
                $resid_sec_stud_b =NULL;

                $resid_hsc_stud_b =NULL;
                $resid_hsc_stud_g =NULL;
            
        }
        // **** if for Administrative Information step 5 | Is this a residential school Ending*****
      // main set1 Ending


        $data = array(
                        'resid_schl'                            => $resid_schl, 
                        'typ_resid_schl'                        => $typ_resid_schl,
                        'brdng_fac_avl_stg'                     => $brdng_fac_avl_stg,
                        'resid_pri_stud'                        => $resid_pri_stud,
                        'resid_pri_stud_g'                      => $resid_pri_stud_g,
                        'resid_pri_stud_b'                      => $resid_pri_stud_b,
                        'resid_uppri_stud'                      => $resid_uppri_stud,
                        'resid_uppri_stud_g'                    => $resid_uppri_stud_g,
                        'resid_uppri_stud_b'                    => $resid_uppri_stud_b,
                        'resid_sec_stud'                        => $resid_sec_stud,
                        'resid_sec_stud_g'                      => $resid_sec_stud_g,
                        'resid_sec_stud_b'                      => $resid_sec_stud_b,
                        'resid_hsc_stud'                        => $resid_hsc_stud,
                        'resid_hsc_stud_b'                      => $resid_hsc_stud_b,
                        'resid_hsc_stud_g'                      => $resid_hsc_stud_g,
                        
                      );

       $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin5', 'refresh');
       }else{
       redirect('Admin/emis_school_admin5', 'refresh');
    }

  }
  // main set form1

    // form2 Starting
    public

    function updateadmin5frm2(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {

      // main set2
          $min_mangd_schl = $_POST['isthisaminoritymanagedschool'];

          // ***** If for Administrative Information step 5 | Is this a minority managed school *****
          if ($min_mangd_schl==1) {
             $typ_minrty_cmnty = $_POST['typeofaminoritymanagedschool'];
          }else{
             $typ_minrty_cmnty = NULL;
          }
          // ***** If for Administrative Information step 5 | Is this a minority managed school Ending*****

      // main set2 Ending

      // main set3
          $prepri_sction_atchd_schl = $_POST['preprisecattcdschl'];

          // ***** If for Administrative Information step 5 | Whether preprimary section(other than Anganwadi) attached to school *****
          if ($prepri_sction_atchd_schl==1) {
             $tot_stud_prepri_grd   = $_POST['totstudpreprigrd1precd'];
             $tot_tchr_prepri       = $_POST['preprimarytotteachers'];
          }else{
             $tot_stud_prepri_grd   = NULL;
             $tot_tchr_prepri       = NULL;
          }
          // ***** If for Administrative Information step 5 | Whether preprimary section(other than Anganwadi) attached to school Ending*****

      // main set3 Ending


      // main set4
          $angwdi_cntr_schlcmps = $_POST['anganwadicentrinschlcampus'];

          // ***** If for Administrative Information step 5 | Anganwadi center in or adjacent to school campus *****
          if ($angwdi_cntr_schlcmps==1) {
             $angwdi_cntr_tot_chldrs   = $_POST['totchildrensinanganwadi'];
             $tot_tchrs_angwdi_wrks    = $_POST['totteachersoranganwadiworkers'];
          }else{
             $angwdi_cntr_tot_chldrs   = NULL;
             $tot_tchrs_angwdi_wrks    = NULL;
          }
          // ***** If for Administrative Information step 5 | Anganwadi center in or adjacent to school campus Ending*****

      // main set4 Ending


      // main set5
          $cce_imp_schl = $_POST['ccebeingimplementedschool'];

          // ***** If for Administrative Information step 5 | Is CCE being implemented in school *****
          if ($cce_imp_schl==1) {
             $cce_imp_schl_elem        = $_POST['ccebeingimplmentedinschlelemntry'];
             $cce_imp_schl_sec         = $_POST['ccebeingimplmentedinschlsecondary'];
             $cce_imp_schl_hsc         = $_POST['ccebeingimplmentedinschlhighersecondary'];

                if ($cce_imp_schl_elem == 1 || $cce_imp_schl_sec == 1 || $cce_imp_schl_hsc == 1 ) {
                  $cumm_rcrd_ppl_mntnd       = $_POST['cumltvercrdspuplmntnd'];
                  $cumm_rcrd_ppl_shrwthprnts = $_POST['cumrcrdpuplshrdwithprnts'];
                }else{
                  $cumm_rcrd_ppl_mntnd       = NULL;
                  $cumm_rcrd_ppl_shrwthprnts = NULL;
                }

          }else{
             $cce_imp_schl_elem   = NULL;
             $cce_imp_schl_sec    = NULL;
             $cce_imp_schl_hsc    = NULL;

             $cumm_rcrd_ppl_mntnd       = NULL;
             $cumm_rcrd_ppl_shrwthprnts = NULL;
          }
          // ***** If for Administrative Information step 5 | Is CCE being implemented in school Ending*****

      // main set5 Ending

        $data = array(
                        'min_mangd_schl'                        => $min_mangd_schl,
                        'typ_minrty_cmnty'                      => $typ_minrty_cmnty,
                        'prepri_sction_atchd_schl'              => $prepri_sction_atchd_schl,
                        'tot_stud_prepri_grd'                   => $tot_stud_prepri_grd,
                        'tot_tchr_prepri'                       => $tot_tchr_prepri,
                        'angwdi_cntr_schlcmps'                  => $angwdi_cntr_schlcmps,
                        'angwdi_cntr_tot_chldrs'                => $angwdi_cntr_tot_chldrs,
                        'tot_tchrs_angwdi_wrks'                 => $tot_tchrs_angwdi_wrks,
                        'cce_imp_schl'                          => $cce_imp_schl,
                        'cce_imp_schl_elem'                     => $cce_imp_schl_elem,
                        'cce_imp_schl_sec'                      => $cce_imp_schl_sec,
                        'cce_imp_schl_hsc'                      => $cce_imp_schl_hsc,
                        'cumm_rcrd_ppl_mntnd'                   => $cumm_rcrd_ppl_mntnd,
                        'cumm_rcrd_ppl_shrwthprnts'             => $cumm_rcrd_ppl_shrwthprnts
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin5', 'refresh');
       }else{
       redirect('Admin/emis_school_admin5', 'refresh');
    }

  }
  // form 2 Ending


    // form 3
    public

    function updateadmin5frm3(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {

      // main set6
          $smc_constud = $_POST['smchasbeenconstituted'];

          // ***** If for Administrative Information step 5 | Whether school management committee (SMC) has been constituted (Only for Govt./Aided schools) *****

          if ($smc_constud==1) {
             // set1
             $smc_tot_membr_mle             = $_POST['smctotnumbermale'];
             $smc_tot_membr_fmle            = $_POST['smctotnumberfemale'];

             // set2
             $smc_membr_parnts_mle          = $_POST['smcmembrofparentsorguardiansmale'];
             $smc_membr_parnts_fmle         = $_POST['smcmembrofparentsorguardiansfemale'];

             // set3
             $smc_reprsnt_loc_auth_mle      = $_POST['smcrepresentativesmale'];
             $smc_reprsnt_loc_auth_fmle     = $_POST['smcrepresentativesfemale'];
          }else{
             $smc_tot_membr_mle             = NULL;
             $smc_tot_membr_fmle            = NULL;
             
             $smc_membr_parnts_mle          = NULL;
             $smc_membr_parnts_fmle         = NULL;
             
             $smc_reprsnt_loc_auth_mle      = NULL;
             $smc_reprsnt_loc_auth_fmle     = NULL;
          }
          // ***** If for Administrative Information step 5 | Whether school management committee (SMC) has been constituted (Only for Govt./Aided schools) Ending*****
          // main set6 Ending
      $data = array(
                        
                        'smc_constud'                           => $smc_constud,
                        'smc_tot_membr_mle'                     => $smc_tot_membr_mle,
                        'smc_tot_membr_fmle'                    => $smc_tot_membr_fmle,
                        'smc_membr_parnts_mle'                  => $smc_membr_parnts_mle,
                        'smc_membr_parnts_fmle'                 => $smc_membr_parnts_fmle,
                        'smc_reprsnt_loc_auth_mle'              => $smc_reprsnt_loc_auth_mle,
                        'smc_reprsnt_loc_auth_fmle'             => $smc_reprsnt_loc_auth_fmle
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin5', 'refresh');
       }else{
       redirect('Admin/emis_school_admin5', 'refresh');
    }

  }
  // form 3 Ending
      

    // form 4
    public

    function updateadmin5frm4(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
      // main set7
          $sep_bnk_smc_maintnd = $_POST['sepbnksmcmantnd'];

          // ***** If for Administrative Information step 5 | Whether separate bank account for SMC is being maintained *****

          if ($sep_bnk_smc_maintnd == 1) {
             $smc_brnch                     = $_POST['smcaccountbranch'];
             $smc_bnk_nme                   = $_POST['smcaccountbankname'];
             $smc_acc_no                    = $_POST['smcaccountno'];
             $smc_ifsc                      = $_POST['smcaccountifsc'];
             $smc_acc_nme                   = $_POST['smcaccountname'];
          }else{
             $smc_brnch                     = NULL;
             $smc_bnk_nme                   = NULL;
             $smc_acc_no                    = NULL;
             $smc_ifsc                      = NULL;
             $smc_acc_nme                   = NULL;
          }
          // ***** If for Administrative Information step 5 | Whether separate bank account for SMC is being maintained Ending*****

      // main set7 Ending
                    $data = array(
                        'sep_bnk_smc_maintnd'                   => $sep_bnk_smc_maintnd,
                        'smc_brnch'                             => $smc_brnch,
                        'smc_bnk_nme'                           => $smc_bnk_nme,
                        'smc_acc_no'                            => $smc_acc_no,
                        'smc_ifsc'                              => $smc_ifsc,
                        'smc_acc_nme'                           => $smc_acc_nme
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin5', 'refresh');
       }else{
       redirect('Admin/emis_school_admin5', 'refresh');
    }
  }
  // form4 Ending


      // form 5
    public

    function updateadmin5frm5(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
          // main set8
          $chld_enrld_attndspectrng = $_POST['anychildenrldschlatndspcltrng'];

          // ***** If for Administrative Information step 5 | Whether any child enrolled in the school is attending special training *****

          if ($chld_enrld_attndspectrng == 1) {
             $no_chldrs_spectrng_utsep30_b                   = $_POST['no_chldrs_spectrng_utsep30_b'];
             $no_chldrs_spectrng_utsep30_g                   = $_POST['no_chldrs_spectrng_utsep30_g'];
             $no_chldrs_spectrng_enrld_acadyr_b              = $_POST['no_chldrs_spectrng_enrld_acadyr_b'];
             $no_chldrs_spectrng_enrld_acadyr_g              = $_POST['no_chldrs_spectrng_enrld_acadyr_g'];
             $no_chldrs_spectrng_cmpltd_prevacdyr_b          = $_POST['no_chldrs_spectrng_cmpltd_prevacdyr_b'];
             $no_chldrs_spectrng_cmpltd_prevacdyr_g          = $_POST['no_chldrs_spectrng_cmpltd_prevacdyr_g'];
             $who_condct_spec_trng                           = $_POST['whoconductsspcltaining'];
             $spec_trng_cndt                                 = $_POST['spcltraingconductedin'];
             $typ_trng_condct                                = $_POST['typeoftrainingbeingconducted'];
          }else{
             $no_chldrs_spectrng_utsep30_b                   = NULL;
             $no_chldrs_spectrng_utsep30_g                   = NULL;
             $no_chldrs_spectrng_enrld_acadyr_b              = NULL;
             $no_chldrs_spectrng_enrld_acadyr_g              = NULL;
             $no_chldrs_spectrng_cmpltd_prevacdyr_b          = NULL;
             $no_chldrs_spectrng_cmpltd_prevacdyr_g          = NULL;
             $who_condct_spec_trng                           = NULL;
             $spec_trng_cndt                                 = NULL;
             $typ_trng_condct                                = NULL;
          }
          // ***** If for Administrative Information step 5 | Whether any child enrolled in the school is attending special training Ending*****

      // main set8 Ending
      $data = array(
                        'chld_enrld_attndspectrng'              => $chld_enrld_attndspectrng,
                        'no_chldrs_spectrng_utsep30_b'          => $no_chldrs_spectrng_utsep30_b,
                        'no_chldrs_spectrng_utsep30_g'          => $no_chldrs_spectrng_utsep30_g,
                        'no_chldrs_spectrng_enrld_acadyr_b'     => $no_chldrs_spectrng_enrld_acadyr_b,
                        'no_chldrs_spectrng_enrld_acadyr_g'     => $no_chldrs_spectrng_enrld_acadyr_g,
                        'no_chldrs_spectrng_cmpltd_prevacdyr_b' => $no_chldrs_spectrng_cmpltd_prevacdyr_b,
                        'no_chldrs_spectrng_cmpltd_prevacdyr_g' => $no_chldrs_spectrng_cmpltd_prevacdyr_g,
                        'who_condct_spec_trng'                  => $who_condct_spec_trng,
                        'spec_trng_cndt'                        => $spec_trng_cndt,
                        'typ_trng_condct'                       => $typ_trng_condct
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin5', 'refresh');
       }else{
       redirect('Admin/emis_school_admin5', 'refresh');
    }
  }
// form5 Ending


  // ***** Admin page 6 form1 *****

      // form 1
    public

    function updateadmin6frm1(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
          // main set8
          $fulset_txtbok_recvd = $_POST['fulsettxtbckrcvdcrntacadyr'];

          // ***** If for Administrative Information step 5 | Whether any child enrolled in the school is attending special training *****

          if ($fulset_txtbok_recvd == 1) {
             $txtbok_recvd_crntacd_mnth                   = $_POST['fulsettxtbckrcvdcrntacad_mnth'];
             $txtbok_recvd_crntacd_yr                     = $_POST['fulsettxtbckrcvdcrntacad_yr'];
          }else{
             $txtbok_recvd_crntacd_mnth                   = NULL;
             $txtbok_recvd_crntacd_yr                     = NULL;
          }
          // ***** If for Administrative Information step 5 | Whether any child enrolled in the school is attending special training Ending*****

      // main set8 Ending
      $data = array(
                        'fulset_txtbok_recvd'              => $fulset_txtbok_recvd,
                        'txtbok_recvd_crntacd_mnth'          => $txtbok_recvd_crntacd_mnth,
                        'txtbok_recvd_crntacd_yr'          => $txtbok_recvd_crntacd_yr
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin6', 'refresh');
       }else{
       redirect('Admin/emis_school_admin6', 'refresh');
    }
  }
// form1 Ending


   // form 2
    public

    function updateadmin6frm2(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
          // main set8
          $cmplt_txtbok_recvd_pri     = $_POST['cmpltfretxtbokrcvd_pri'];
          $cmplt_txtbok_recvd_uppri   = $_POST['cmpltfretxtbokrcvd_uppri'];

          $tle_avl_grd_pri            = $_POST['tle_avl_grd_pri'];
          $tle_avl_grd_uppri          = $_POST['tle_avl_grd_uppri'];

          $ply_matrl_pri              = $_POST['ply_matrl_pri'];
          $ply_matrl_uppri            = $_POST['ply_matrl_uppri'];


          $ply_matrl_sec              = $_POST['ply_matrl_sec'];
 
      // main set8 Ending
      $data = array(
                        'cmplt_txtbok_recvd_pri'              => $cmplt_txtbok_recvd_pri,
                        'cmplt_txtbok_recvd_uppri'            => $cmplt_txtbok_recvd_uppri,
                        'tle_avl_grd_pri'                     => $tle_avl_grd_pri,
                        'tle_avl_grd_uppri'                   => $tle_avl_grd_uppri,
                        'ply_matrl_pri'                       => $ply_matrl_pri,
                        'ply_matrl_uppri'                     => $ply_matrl_uppri,
                        'ply_matrl_sec'                       => $ply_matrl_sec
                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin6', 'refresh');
       }else{
       redirect('Admin/emis_school_admin6', 'refresh');
    }
  }
// form 2 Ending


  // form 3
    public

    function updateadmin6frm3(){
       $this->load->library('session');
       $this->load->library('form_validation');


       $emis_loggedin = $this->session->userdata('emis_loggedin');
       $school_udise = $this->session->userdata('emis_school_udise');
       $school_id = $this->session->userdata('emis_school_id');
       if ($emis_loggedin) {
          // main set8
          $smc_smdc_same_schl         = $_POST['smdc'];

          if ($smc_smdc_same_schl == 2) {
            $smdc_constud         = $_POST['smdcconstituted'];
              if ($smdc_constud == 1) {
                  $smdc_tot_membr_m              =     $_POST['smdcconstdtot_m'];   
                  $smdc_tot_membr_f              =     $_POST['smdcconstdtot_f'];
                  $smdc_noof_repr_pta_m          =     $_POST['smdccondnofrepprnts_m'];         
                  $smdc_noof_repr_pta_f          =     $_POST['smdccondnofrepprnts_f'];   
                  $smdc_noof_repr_lcbdy_m        =     $_POST['smdcconstdrepnmneloc_m'];      
                  $smdc_noof_repr_lcbdy_f        =     $_POST['smdcconstdrepnmneloc_f'];     
                  $smdc_noof_mebrs_edubckmin_m   =     $_POST['smdcconstdbckwdcom_m'];           
                  $smdc_noof_mebrs_edubckmin_f   =     $_POST['smdcconstdbckwdcom_f'];          
                  $smdc_noof_mebrs_wms_f         =     $_POST['smdcconstd_wmngrp_f'];              
                  $smdc_noof_mebrs_scst_m        =     $_POST['smdcconstdscst_m'];              
                  $smdc_noof_mebrs_scst_f        =     $_POST['smdcconstdscst_f'];         
                  $smdc_noof_nmines_deo_m        =     $_POST['smdcconstddeo_m'];                  
                  $smdc_noof_nmines_deo_f        =     $_POST['smdcconstddeo_f'];            
                  $smdc_noof_nmines_aad_m        =     $_POST['smdcconstdaad_m'];
                  $smdc_noof_nmines_aad_f        =     $_POST['smdcconstdaad_f'];    
                  $smdc_noof_subjt_exp_m         =     $_POST['smdcconstdrmsa_m'];    
                  $smdc_noof_subjt_exp_f         =     $_POST['smdcconstdrmsa_f'];        
                  $smdc_noof_techrs_m            =     $_POST['smdcconstdmaths_m'];           
                  $smdc_noof_techrs_f            =     $_POST['smdcconstdmaths_f'];     
                  $smdc_prnclorhm_cp_m           =     $_POST['smdcconstdprncyhm_m'];     
                  $smdc_prnclorhm_cp_f           =     $_POST['smdcconstdprncyhm_f'];    
                  $smdc_chrprsn_m                =     $_POST['smdcconstdcharper_m'];      
                  $smdc_chrprsn_f                =     $_POST['smdcconstdcharper_f'];            
              }else{
                  $smdc_tot_membr_m              =     NULL;
                  $smdc_tot_membr_f              =     NULL;
                  $smdc_noof_repr_pta_m          =     NULL;
                  $smdc_noof_repr_pta_f          =     NULL;
                  $smdc_noof_repr_lcbdy_m        =     NULL;
                  $smdc_noof_repr_lcbdy_f        =     NULL;
                  $smdc_noof_mebrs_edubckmin_m   =     NULL;
                  $smdc_noof_mebrs_edubckmin_f   =     NULL;
                  $smdc_noof_mebrs_wms_f         =     NULL;
                  $smdc_noof_mebrs_scst_m        =     NULL;
                  $smdc_noof_mebrs_scst_f        =     NULL;
                  $smdc_noof_nmines_deo_m        =     NULL;
                  $smdc_noof_nmines_deo_f        =     NULL;
                  $smdc_noof_nmines_aad_m        =     NULL;
                  $smdc_noof_nmines_aad_f        =     NULL;
                  $smdc_noof_subjt_exp_m         =     NULL;
                  $smdc_noof_subjt_exp_f         =     NULL;
                  $smdc_noof_techrs_m            =     NULL;
                  $smdc_noof_techrs_f            =     NULL;
                  $smdc_prnclorhm_cp_m           =     NULL;
                  $smdc_prnclorhm_cp_f           =     NULL;
                  $smdc_chrprsn_m                =     NULL;
                  $smdc_chrprsn_f                =     NULL;
              }
            $sep_bnk_smdc_maintnd = $_POST['smdcbankaccntdtls'];
            if ($sep_bnk_smdc_maintnd == 1) {
                 $smdc_brnch                     =    $_POST['smdcaccountbranch'];
                 $smdc_bnk_nme                   =    $_POST['smdcaccountbankname'];
                 $smdc_acc_no                    =    $_POST['smdcaccountno'];
                 $smdc_ifsc                      =    $_POST['smdcaccountifsc'];
                 $smdc_acc_nme                   =    $_POST['smdcaccountname'];
            }else{
                 $smdc_brnch                     =    NULL;
                 $smdc_bnk_nme                   =    NULL;
                 $smdc_acc_no                    =    NULL;
                 $smdc_ifsc                      =    NULL;
                 $smdc_acc_nme                   =    NULL;
            }
            $schl_pta             =$_POST['pta'];
            if ($schl_pta == 1) {
                $pta_metng_hld_yr                =  $_POST['ptameetingsheld'];
            }else{
                $pta_metng_hld_yr                =    NULL;
            }

          }
          else{
            $smdc_constud         = NULL; 
            $sep_bnk_smdc_maintnd = NULL;
            $schl_pta             = NULL;


                  $smdc_tot_membr_m              =     NULL;
                  $smdc_tot_membr_f              =     NULL;
                  $smdc_noof_repr_pta_m          =     NULL;
                  $smdc_noof_repr_pta_f          =     NULL;
                  $smdc_noof_repr_lcbdy_m        =     NULL;
                  $smdc_noof_repr_lcbdy_f        =     NULL;
                  $smdc_noof_mebrs_edubckmin_m   =     NULL;
                  $smdc_noof_mebrs_edubckmin_f   =     NULL;
                  $smdc_noof_mebrs_wms_f         =     NULL;
                  $smdc_noof_mebrs_scst_m        =     NULL;
                  $smdc_noof_mebrs_scst_f        =     NULL;
                  $smdc_noof_nmines_deo_m        =     NULL;
                  $smdc_noof_nmines_deo_f        =     NULL;
                  $smdc_noof_nmines_aad_m        =     NULL;
                  $smdc_noof_nmines_aad_f        =     NULL;
                  $smdc_noof_subjt_exp_m         =     NULL;
                  $smdc_noof_subjt_exp_f         =     NULL;
                  $smdc_noof_techrs_m            =     NULL;
                  $smdc_noof_techrs_f            =     NULL;
                  $smdc_prnclorhm_cp_m           =     NULL;
                  $smdc_prnclorhm_cp_f           =     NULL;
                  $smdc_chrprsn_m                =     NULL;
                  $smdc_chrprsn_f                =     NULL;

                  $smdc_brnch                     =    NULL;
                 $smdc_bnk_nme                   =    NULL;
                 $smdc_acc_no                    =    NULL;
                 $smdc_ifsc                      =    NULL;
                 $smdc_acc_nme                   =    NULL;

                 $pta_metng_hld_yr                =    NULL;
          }
          
 
      // main set8 Ending
      $data = array(
                    
                    'smc_smdc_same_schl'            =>    $smc_smdc_same_schl,                           
                    'smdc_constud'                   =>    $smdc_constud,                    
                    'smdc_tot_membr_m'               =>    $smdc_tot_membr_m,                        
                    'smdc_tot_membr_f'               =>    $smdc_tot_membr_f,                        
                    'smdc_noof_repr_pta_m'           =>    $smdc_noof_repr_pta_m,                            
                    'smdc_noof_repr_pta_f'           =>    $smdc_noof_repr_pta_f,                            
                    'smdc_noof_repr_lcbdy_m'         =>    $smdc_noof_repr_lcbdy_m,                              
                    'smdc_noof_repr_lcbdy_f'         =>    $smdc_noof_repr_lcbdy_f,                              
                    'smdc_noof_mebrs_edubckmin_m'    =>    $smdc_noof_mebrs_edubckmin_m,                                   
                    'smdc_noof_mebrs_edubckmin_f'    =>    $smdc_noof_mebrs_edubckmin_f,                                   
                    'smdc_noof_mebrs_wms_f '         =>    $smdc_noof_mebrs_wms_f,                             
                    'smdc_noof_mebrs_scst_m '        =>    $smdc_noof_mebrs_scst_m,                              
                    'smdc_noof_mebrs_scst_f'         =>    $smdc_noof_mebrs_scst_f,                              
                    'smdc_noof_nmines_deo_m'         =>    $smdc_noof_nmines_deo_m,                              
                    'smdc_noof_nmines_deo_f'         =>    $smdc_noof_nmines_deo_f,                              
                    'smdc_noof_nmines_aad_m'         =>    $smdc_noof_nmines_aad_m,                              
                    'smdc_noof_nmines_aad_f'         =>    $smdc_noof_nmines_aad_f,                              
                    'smdc_noof_subjt_exp_m'          =>    $smdc_noof_subjt_exp_m,                             
                    'smdc_noof_subjt_exp_f'          =>    $smdc_noof_subjt_exp_f,                             
                    'smdc_noof_techrs_m'             =>    $smdc_noof_techrs_m,                          
                    'smdc_noof_techrs_f'             =>    $smdc_noof_techrs_f,                          
                    'smdc_prnclorhm_cp_m'            =>    $smdc_prnclorhm_cp_m,                           
                    'smdc_prnclorhm_cp_f'            =>    $smdc_prnclorhm_cp_f,                           
                    'smdc_chrprsn_m'                 =>    $smdc_chrprsn_m,                      
                    'smdc_chrprsn_f'                 =>    $smdc_chrprsn_f,                      
                    'sep_bnk_smdc_maintnd'           =>    $sep_bnk_smdc_maintnd,                            
                    'smdc_brnch'                     =>    $smdc_brnch,                  
                    'smdc_bnk_nme'                   =>    $smdc_bnk_nme,                    
                    'smdc_acc_no'                    =>    $smdc_acc_no,                   
                    'smdc_ifsc'                      =>    $smdc_ifsc,                 
                    'smdc_acc_nme'                   =>    $smdc_acc_nme,                    
                    'schl_pta'                       =>    $schl_pta,                
                    'pta_metng_hld_yr'               =>    $pta_metng_hld_yr                        

                      );
         $this->Udise_adminmodel->admininfoupdate($data,$school_id);
         redirect('Admin/emis_school_admin6', 'refresh');
       }else{
       redirect('Admin/emis_school_admin6', 'refresh');
    }
  }
// form 3 Ending
    
// ***** Admin page 6 form1 Ending*****

  }

?>



