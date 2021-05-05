
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_asset extends CI_Controller

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
    $this->load->model('Udisemodel');
    $this->load->model('Udise_assetmodel');
     date_default_timezone_set('Asia/Kolkata');
    }

    // asset module data update section
  // updateschoolbuilding

  public

  function updateschlbuildstatus()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2" || $value == "3" || $value == "4" || $value == "5" || $value == "6" || $value == "7")
        {
        $data = array(
          "buil_status" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "School Building Status " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // update school building type

  public

  function updateschoolbuildingtype()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2" || $value == "3" || $value == "4")
        {
        $data = array(
          "buil_type" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "school type " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // update school boundary wall type

  public

  function updateboundarywalltype()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2" || $value == "3" || $value == "4" || $value == "5")
        {
        $data = array(
          "bndrywl_type" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "school type " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // update Land avail for expansion of school facilities

  public

  function updatelandavailforschlexpnsion()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "landavail_expnsin" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "school type " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // update Land avail for expansion of school facilities

  public

  function updateseproomsforheadtchrandpriciavail()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "seprom_headteach" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Room avail data " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Electricity connection is available in the school

  public

  function updateelectricitycnxnavailinschl()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2" || $value == "3")
        {
        $data = array(
          "elecon_avail" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Electricity Connection Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // subscribe Newspaper magazines

  public

  function updateschoolsubscibenewspprormagzine()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2" || $value == "3")
        {
        $data = array(
          "substo_newsppr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Electricity Connection Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatetotnoofcomputersavailable()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "noofcomp_avail" => $value
        );
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "School Name Tamil" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Total number of computers Functional

  public

  function updatecomputersfunctional()
    {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      $school_id = $this->session->userdata('emis_school_id');
      if (true)
        {
        $data = array(
          "noofcom_func" => $value
        );
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "School Name Tamil" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }


  // asset module *page1 *formsubmit1
  public

  function updateclassroomschlbycondtion()
    {
    

$this->load->library('session');
$this->load->library('form_validation');

// setting php form rules
// set1

$this->form_validation->set_rules('pucca1', 'Pucca Good Condition', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('pucca2', 'Pucca Minor Repair', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('pucca3', 'Pucca Major Repair', 'required|max_length[3]|numeric');

// set2

$this->form_validation->set_rules('partpucca1', 'Partially Pucca Good Condition', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('partpucca2', 'Partially Pucca Minor Repair', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('partpucca3', 'Partially Pucca Major Repair', 'required|max_length[3]|numeric');

// set3

$this->form_validation->set_rules('kuchcha1', 'Kuchcha Good Condition', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('kuchcha2', 'Kuchcha Minor Repair', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('kuchcha3', 'Kuchcha Major Repair', 'required|max_length[3]|numeric');

// set4

$this->form_validation->set_rules('tent1', 'Tent Good Condition', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('tent2', 'Tent Minor Repair', 'required|max_length[3]|numeric');
$this->form_validation->set_rules('tent3', 'Tent Major Repair', 'required|max_length[3]|numeric');

// setting php form rules ending

$emis_loggedin = $this->session->userdata('emis_loggedin');
$school_id = $this->session->userdata('emis_school_id');

if ($emis_loggedin)
  {
  if ($this->form_validation->run() == FALSE)
    {
    // echo validation_errors();
    $this->session->set_flashdata('error', validation_errors());
    // return false;
    redirect('Udise_asset/emis_school_asset1', 'refresh');
    }
    else
    {
    $puc_gdcondt = $_POST['pucca1'];
    $puc_minrpr = $_POST['pucca2'];
    $puc_majrpr = $_POST['pucca3'];
    $partpucca1 = $_POST['partpucca1'];
    $partpucca2 = $_POST['partpucca2'];
    $partpucca3 = $_POST['partpucca3'];
    $kuchcha1 = $_POST['kuchcha1'];
    $kuchcha2 = $_POST['kuchcha2'];
    $kuchcha3 = $_POST['kuchcha3'];
    $tent1 = $_POST['tent1'];
    $tent2 = $_POST['tent2'];
    $tent3 = $_POST['tent3'];
    $data = array(
      'puc_gdcondt' => $puc_gdcondt,
      'puc_minrpr' => $puc_minrpr,
      'puc_majrpr' => $puc_majrpr,
      'par_puc_gdcondt' => $partpucca1,
      'par_puc_minrpr' => $partpucca2,
      'par_puc_majrpr' => $partpucca3,
      'kuch_gdcondt' => $kuchcha1,
      'kuch_minrpr' => $kuchcha2,
      'kuch_majrpr' => $kuchcha3,
      'tnt_gdcondt' => $tent1,
      'tnt_minrpr' => $tent2,
      'tnt_majrpr' => $tent3
    );
    $this->Udise_assetmodel->assetform1update($data, $school_id);
    }

  redirect('Udise_asset/emis_school_asset1', 'refresh');
  }
  else
  {
  redirect('Udise_asset/emis_school_asset1', 'refresh');
  }


    }

  public

  function updateasset2form1()
    {
    $this->load->library('session');
    $this->load->library('form_validation');

      // setting php form rules
      // set1
      $this->form_validation->set_rules('totclassromsforinstructionalpurps', 'Total Classrooms used for instructional purposes', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('noofclasunderconstction', 'No of classrooms under construction', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnoofclassdilapdated', 'Total classrooms in dilapidated condition', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('availoffurniture', 'Available of furniture(desk/table) for students', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('primary', 'Primary', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('secondary', 'Secondary', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('upperprimary', 'Upper Primary', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('highersecondary', 'Higher Secondary', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnoofromsavailotherthclsinschool', 'Total number of rooms other than classrooms available in the school', 'required|max_length[5]|numeric');



    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

        if ($this->form_validation->run() == FALSE)
          {
            // echo validation_errors();
            $this->session->set_flashdata('error', validation_errors());
            // return false;
            redirect('Udise_asset/emis_school_asset2', 'refresh');
          }
        else
          {
            $clsrms_usdfrinspurp = $_POST['totclassromsforinstructionalpurps'];
            $clsrms_undrcons = $_POST['noofclasunderconstction'];
            $clsrms_dilap = $_POST['totnoofclassdilapdated'];
            $frnitravail_frstu = $_POST['availoffurniture'];
            $otofclsrms_pri = $_POST['primary'];
            $otofclsrms_sec = $_POST['secondary'];
            $otofclsrms_uprpri = $_POST['upperprimary'];
            $otofclsrms_hsc = $_POST['highersecondary'];
            $totno_rmsavl_othrthclsrms = $_POST['totnoofromsavailotherthclsinschool'];
            $data = array(
              'clsrms_usdfrinspurp' => $clsrms_usdfrinspurp,
              'clsrms_undrcons' => $clsrms_undrcons,
              'clsrms_dilap' => $clsrms_dilap,
              'frnitravail_frstu' => $frnitravail_frstu,
              'otofclsrms_pri' => $otofclsrms_pri,
              'otofclsrms_sec' => $otofclsrms_sec,
              'otofclsrms_uprpri' => $otofclsrms_uprpri,
              'otofclsrms_hsc' => $otofclsrms_hsc,
              'totno_rmsavl_othrthclsrms' => $totno_rmsavl_othrthclsrms,
            );
          $this->Udise_assetmodel->asset2form1update($data, $school_id);
        }

      
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
      else
      {
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
    }

  // *asset1 *formsubmit1 completed

  // asset2form2 Update section

  public

  function updateasset2form2()
    {
    $this->load->library('session');
    $this->load->library('form_validation');

      // setting php form rules
      // set1
      $this->form_validation->set_rules('nooftoiletseatsavailinschoolboys', 'No of Toilets seats available in school Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('nooftoiletseatsavailinschoolgirls', 'No of Toilets seats available in school Girls', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnofunctionaltoiletsforboys', 'Out of the above, total number of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users,closable door) Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnofunctionaltoiletsforgirls', 'Out of the above, total number of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users,closable door) Girls', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('cwsnboys', 'No of CWSN friendly functional toilets Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('cwsngirls', 'No of CWSN friendly functional toilets Girls', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('runningwateravailintoiletsforflusingandcleaningboys', 'How many of above toilets have running water available in the toilet for flusing and cleaning Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('runningwateravailintoiletsforflusingandcleaninggirls', '', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnoofurinalsavailboys', 'Total number of urinals available Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('totnoofurinalsavailgirls', 'Total number of urinals available Girls', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('outofabovehowmanyurinalshavwaterfaciboys', 'Out of the above, how many urinals have water facility Boys', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('outofabovehowmanyurinalshavwaterfacigirls', 'Out of the above, how many urinals have water facility Girls', 'required|max_length[3]|numeric');
      $this->form_validation->set_rules('handwashfacilitynearurinalblockselect', 'Is hand washing facility available near toilets/urinals block', 'required');

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

        if ($this->form_validation->run() == FALSE)
          {
            // echo validation_errors();
            $this->session->set_flashdata('asset2', validation_errors());
            // return false;
            redirect('Udise_asset/emis_school_asset2', 'refresh');
          }
        else
          {
            $nooftoilts_avl_bys = $_POST['nooftoiletseatsavailinschoolboys'];
            $nooftoilts_avl_gls = $_POST['nooftoiletseatsavailinschoolgirls'];
            $nooftoilts_func_bys = $_POST['totnofunctionaltoiletsforboys'];
            $nooftoilts_func_gls = $_POST['totnofunctionaltoiletsforgirls'];
            $noofcwsnfrndly_func_toilts_bys = $_POST['cwsnboys'];
            $noofcwsnfrndly_func_toilts_gls = $_POST['cwsngirls'];
            $toiltsavl_rnigwtr_flshingndclning_bys = $_POST['runningwateravailintoiletsforflusingandcleaningboys'];
            $toiltsavl_rnigwtr_flshingndclning_gls = $_POST['runningwateravailintoiletsforflusingandcleaninggirls'];
            $noofurnls_avl_bys = $_POST['totnoofurinalsavailboys'];
            $noofurnls_avl_gls = $_POST['totnoofurinalsavailgirls'];
            $urnlshv_wtrfac_bys = $_POST['outofabovehowmanyurinalshavwaterfaciboys'];
            $urnlshv_wtrfac_gls = $_POST['outofabovehowmanyurinalshavwaterfacigirls'];
            $hndwshfacavl_toiltsurnlsblck = $_POST['handwashfacilitynearurinalblockselect'];
            $data = array(
              'nooftoilts_avl_bys' => $nooftoilts_avl_bys,
              'nooftoilts_avl_gls' => $nooftoilts_avl_gls,
              'nooftoilts_func_bys' => $nooftoilts_func_bys,
              'nooftoilts_func_gls' => $nooftoilts_func_gls,
              'noofcwsnfrndly_func_toilts_bys' => $noofcwsnfrndly_func_toilts_bys,
              'noofcwsnfrndly_func_toilts_gls' => $noofcwsnfrndly_func_toilts_gls,
              'toiltsavl_rnigwtr_flshingndclning_bys' => $toiltsavl_rnigwtr_flshingndclning_bys,
              'toiltsavl_rnigwtr_flshingndclning_gls' => $toiltsavl_rnigwtr_flshingndclning_gls,
              'noofurnls_avl_bys' => $noofurnls_avl_bys,
              'noofurnls_avl_gls' => $noofurnls_avl_gls,
              'urnlshv_wtrfac_bys' => $urnlshv_wtrfac_bys,
              'urnlshv_wtrfac_gls' => $urnlshv_wtrfac_gls,
              'hndwshfacavl_toiltsurnlsblck' => $hndwshfacavl_toiltsurnlsblck,
            );
            $this->Udise_assetmodel->asset2form2update($data, $school_id);
        }
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
      else
      {
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
    }

  // asset2form3 Update section

  public

  function updateasset2form3()
    {
    $this->load->library('session');
    $this->load->library('form_validation');

    $lib_avl = $_POST['library'];
    $bokbnk_avl = $_POST['bookbank'];
    $redngcorn_avl = $_POST['readingcorner'];

    //set1 
    $this->form_validation->set_rules('library', 'Library Available', 'required');
    if ($lib_avl == 1) {
      $this->form_validation->set_rules('librarybookdata', 'Library Total number of books', 'required|max_length[6]|numeric');      
      $this->form_validation->set_rules('fulltimelibrary', 'Does the school have a full-time library?', 'required');      
    }

    $this->form_validation->set_rules('bookbank', 'Bookbank Available', 'required');
    if ($bokbnk_avl == 1) {
      $this->form_validation->set_rules('bookbankbook', 'Bookbank Total number of books', 'required|max_length[6]|numeric');      
    }

    $this->form_validation->set_rules('readingcorner', 'Reading Corner Available', 'required');
    if ($bokbnk_avl == 1) {
      $this->form_validation->set_rules('readingcornerbook', 'Reading Corner Total number of books', 'required|max_length[6]|numeric');      
    }

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {
        if ($this->form_validation->run() == FALSE)
          {
            // echo validation_errors();
            $this->session->set_flashdata('asset3', validation_errors());
            // return false;
            redirect('Udise_asset/emis_school_asset2', 'refresh');
          }
        else
          {
           
      if ($lib_avl == 1)
        {
        $lib_totnoboks = $_POST['librarybookdata'];
        $schlhav_fultimlib = $_POST['fulltimelibrary'];
        }
        else
        {
        $lib_totnoboks = Null;
        $schlhav_fultimlib = Null;
        }

      
      if ($bokbnk_avl == 1)
        {
        $bokbnk_totnoboks = $_POST['bookbankbook'];
        }
        else
        {
        $bokbnk_totnoboks = Null;
        }

      
      if ($redngcorn_avl == 1)
        {
        $redngcorn_totnoboks = $_POST['readingcornerbook'];
        }
        else
        {
        $redngcorn_totnoboks = Null;
        }

      $data = array(
        'lib_avl' => $lib_avl,
        'lib_totnoboks' => $lib_totnoboks,
        'bokbnk_avl' => $bokbnk_avl,
        'bokbnk_totnoboks' => $bokbnk_totnoboks,
        'redngcorn_avl' => $redngcorn_avl,
        'redngcorn_totnoboks' => $redngcorn_totnoboks,
        'schlhav_fultimlib' => $schlhav_fultimlib
      );
      $this->Udise_assetmodel->asset2form3update($data, $school_id);
        }
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
      else
      {
      redirect('Udise_asset/emis_school_asset2', 'refresh');
      }
    }

  // asset2form3 Update section

  public

  function updateasset3()
    {
    $this->load->library('session');
    $this->load->library('form_validation');

    // posted datas
    $drnkingwtravl_schprmis = $_POST['drinkingwater'];
    $schlhv_plygrnd = $_POST['playgroundfacility'];
    $schlhv_cal = $_POST['cal'];
    $medchckupcondct_lstacdmicyr = $_POST['medicalcheckup'];
    $rmp_disbledchldrs = $_POST['ramp'];

    // set1 *set rules validation
    $this->form_validation->set_rules('drinkingwater', 'Whether drinking water is available in the school premies', 'required');
    if ($drnkingwtravl_schprmis==1) {
      $this->form_validation->set_rules('drinkingoptin1', 'What is the main source of drinking water', 'required');
      $this->form_validation->set_rules('drinkingoptin2', 'Whether water purifier available', 'required');
      $this->form_validation->set_rules('drinkingoptin3', 'Does the school have provision for rain water harvesting', 'required');            
    }else{}

    // set2 *set rules validation
    $this->form_validation->set_rules('playgroundfacility', 'Whether the school have Playground facility', 'required');
    if ($schlhv_plygrnd==2) {
      $this->form_validation->set_rules('playgroundoption1', 'Whether school has alternative arrangements for children to play outdoor games and other physical activities in an adjourning playground/muncipal park etc', 'required');
    }else{}

    // set3 *set rules validation
    $this->form_validation->set_rules('cal', 'Does the school have Computer Aided learning(CAL) Lab', 'required');
    if ($schlhv_cal==1) {
      $this->form_validation->set_rules('caloption1', 'Does the school have smart classroom (availability of Internet/LAN, computers, software solutions with trainers)   
', 'required');
      $this->form_validation->set_rules('caloption2', 'Does the school have computer tablet for teaching', 'required');
      $this->form_validation->set_rules('caloption3', 'Does the school have internet facility', 'required');
    }else{}


    // set4 *set rules validation
    $this->form_validation->set_rules('medicalcheckup', 'Whether Medical check-up of students was conducted in last academic year', 'required');
    if ($medchckupcondct_lstacdmicyr==1) {
      $this->form_validation->set_rules('medicalcheckupoption', 'Total number of Medical check-ups conducted in the school during last academic year', 'required|max_length[5]|numeric');
      $this->form_validation->set_rules('medicalcheckupoption1', 'De-worming tablets given to children', 'required');
      $this->form_validation->set_rules('medicalcheckupoption2', 'Iron and Folic acid tablets given to children as per guideliness of WCD', 'required');
    }else{}


    // set5 *set rules validation
    $this->form_validation->set_rules('ramp', 'Whether ramp for disabled children to access classrooms exits', 'required');
    if ($rmp_disbledchldrs==1) {
      $this->form_validation->set_rules('rampoption', 'Whether Hand-rails for ramp is available', 'required');
    }else{}

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

        if ($this->form_validation->run() == FALSE)
          {
            // echo validation_errors();
            $this->session->set_flashdata('asset3', validation_errors());
            // return false;
            redirect('Udise_asset/emis_school_asset3', 'refresh');
          }
        else
          {
           // option1question
      if ($drnkingwtravl_schprmis == 1)
        {
        $mnsrc_drnkingwtr = $_POST['drinkingoptin1'];
        $wtrpur_avl = $_POST['drinkingoptin2'];
        $hvprov_rainwtrharvst = $_POST['drinkingoptin3'];
        }
        else
        {
        $mnsrc_drnkingwtr = Null;
        $wtrpur_avl = Null;
        $hvprov_rainwtrharvst = Null;
        }

      // option2

      
      if ($schlhv_plygrnd == 2)
        {
        $schlhv_alt_arngmnts = $_POST['playgroundoption1'];
        }
        else
        {
        $schlhv_alt_arngmnts = Null;
        }

      // option3

      
      if ($schlhv_cal == 1)
        {
        $schlhv_smtclsrms = $_POST['caloption1'];
        $schlhv_comptab = $_POST['caloption2'];
        $schlhv_netfac = $_POST['caloption3'];
        }
        else
        {
        $schlhv_smtclsrms = Null;
        $schlhv_comptab = Null;
        $schlhv_netfac = Null;
        }

      // option4

      
      if ($medchckupcondct_lstacdmicyr == 1)
        {
        $totnoofmedchckupcondct_lastacademicyear = $_POST['medicalcheckupoption'];
        $dewormtablts_chldrns = $_POST['medicalcheckupoption1'];
        $irnflictblts_wcd = $_POST['medicalcheckupoption2'];
        }
        else
        {
        $totnoofmedchckupcondct_lastacademicyear = Null;
        $dewormtablts_chldrns = Null;
        $irnflictblts_wcd = Null;
        }

      // option5

      
      if ($rmp_disbledchldrs == 1)
        {
        $hndrlrmp_avl = $_POST['rampoption'];
        }
        else
        {
        $hndrlrmp_avl = Null;
        }

      $data = array(
        'drnkingwtravl_schprmis' => $drnkingwtravl_schprmis,
        'mnsrc_drnkingwtr' => $mnsrc_drnkingwtr,
        'wtrpur_avl' => $wtrpur_avl,
        'hvprov_rainwtrharvst' => $hvprov_rainwtrharvst,
        'schlhv_plygrnd' => $schlhv_plygrnd,
        'schlhv_alt_arngmnts' => $schlhv_alt_arngmnts,
        'schlhv_cal' => $schlhv_cal,
        'schlhv_smtclsrms' => $schlhv_smtclsrms,
        'schlhv_comptab' => $schlhv_comptab,
        'schlhv_netfac' => $schlhv_netfac,
        'medchckupcondct_lstacdmicyr' => $medchckupcondct_lstacdmicyr,
        'totnoofmedchckupcondct_lastacademicyear' => $totnoofmedchckupcondct_lastacademicyear,
        'dewormtablts_chldrns' => $dewormtablts_chldrns,
        'irnflictblts_wcd' => $irnflictblts_wcd,
        'rmp_disbledchldrs' => $rmp_disbledchldrs,
        'hndrlrmp_avl' => $hndrlrmp_avl,
      );
      $this->Udise_assetmodel->asset3formupdate($data, $school_id);
        }

      
      redirect('Udise_asset/emis_school_asset3', 'refresh');
      }
      else
      {
      redirect('Udise_asset/emis_school_asset3', 'refresh');
      }
    }

  public

  function updateseprateroomforassisthmorviceprici()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "seprm_asst_hmorvicpric" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Separate room for Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatesepratecomonromforgirls()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "sepcomrom_gls" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Separate common room for girls Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatestaffroomforteachers()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "stfrom_tchrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Separate Room for teachers Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatecomputerlab()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "comp_lab" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Computer Lab Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatecocurricularactivtyartscraftroom()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "cocriclractvtyartsrom" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Co-curricular Activity Availability " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatestaffquarters()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "staff_quarters" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Staff Quarter " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updateintegratedsciencelab()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "integrtdscinc_lab" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Integrated Science Lab " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  public

  function updatelibraryroom()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "lib_room" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Library Room " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Equipment Facility

  public

  function updateschoolequipmntfacavail()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "ado_visl_pub_addr_sys" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Audio/Visual/Public Address System " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Equipment Facility Fire Extinguisher

  public

  function updateschoolequipmntfacavailfireex()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "fire_exting" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Fire Extinguisher " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Equipment Facility Science Kit

  public

  function updateschoolequipmntfacavailsciencekit()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "scince_kit" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Science Kit " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Equipment Facility Maths Kit

  public

  function updateschoolequipmntfacavailmathkit()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "math_kit" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Science Kit " . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // Equipment Facility Biometric device

  public

  function updateschoolequipmntfacavailbiometricdevice()
    {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "biomet_dev" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_assetmodel->updatedata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Biometric device" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // asset4 Update section

  public

  function updateasset4()
    {
    $this->load->library('session');
    $this->load->library('form_validation');
    
    $phy_seprom_avl = $_POST['physicsroomavail'];
    $che_seprom_avl = $_POST['chemistryroomavail'];
    $bio_seprom_avl = $_POST['biologyroomavail'];
    $comp_seprom_avl = $_POST['computerroomavail'];
    $math_seprom_avl = $_POST['mathsroomavail'];
    $lng_seprom_avl = $_POST['languageroomavail'];
    $geo_seprom_avl = $_POST['geographyroomavail'];
    $hmescince_seprom_avl = $_POST['homescienceroomavail'];
    $psyc_seprom_avl = $_POST['psychologyroomavail'];

    // set1
    $this->form_validation->set_rules('physicsroomavail', 'Physics Separate Room Available', 'required');
    if ($phy_seprom_avl==1) {
      $this->form_validation->set_rules('physicspresentcondition', 'Physics Present Condition', 'required');
    }

    // set2
    $this->form_validation->set_rules('chemistryroomavail', 'Chemistry Separate Room Available', 'required');
    if ($che_seprom_avl==1) {
      $this->form_validation->set_rules('chemistrypresentcondtion', 'Chemistry Present Condition', 'required');
    }

    // set3
    $this->form_validation->set_rules('biologyroomavail', 'Biology Separate Room Available', 'required');
    if ($bio_seprom_avl==1) {
      $this->form_validation->set_rules('biologypresentcondition', 'Biology Present Condition', 'required');
    }

    // set4
    $this->form_validation->set_rules('computerroomavail', 'Computer Separate Room Available', 'required');
    if ($comp_seprom_avl==1) {
      $this->form_validation->set_rules('computerpresentcondition', 'Computer Present Condition', 'required');
    }


    // set5
    $this->form_validation->set_rules('mathsroomavail', 'Maths Separate Room Available', 'required');
    if ($math_seprom_avl==1) {
      $this->form_validation->set_rules('mathspresentcondition', 'Maths Present Condition', 'required');
    }


    // set6
    $this->form_validation->set_rules('languageroomavail', 'Language Separate Room Available', 'required');
    if ($lng_seprom_avl==1) {
      $this->form_validation->set_rules('languagepresentcondition', 'Language Present Condition', 'required');
    }


    // set7
    $this->form_validation->set_rules('geographyroomavail', 'Geography Separate Room Available', 'required');
    if ($geo_seprom_avl==1) {
      $this->form_validation->set_rules('goegraphypresentcondition', 'Geography Present Condition', 'required');
    }


    // set8
    $this->form_validation->set_rules('homescienceroomavail', 'Home science Separate Room Available', 'required');
    if ($hmescince_seprom_avl==1) {
      $this->form_validation->set_rules('homesciencepresentcondition', 'Home science Present Condition', 'required');
    }


    // set8
    $this->form_validation->set_rules('psychologyroomavail', 'Psychology Separate Room Available', 'required');
    if ($psyc_seprom_avl==1) {
      $this->form_validation->set_rules('psychologypresentcondition', 'Psychology Present Condition', 'required');
    }

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

        if ($this->form_validation->run() == FALSE)
          {
            // echo validation_errors();
            $this->session->set_flashdata('asset4', validation_errors());
            // return false;
            redirect('Udise_asset/emis_school_asset4', 'refresh');
          }
        else
          {
            // physics

      
      if ($phy_seprom_avl == 1)
        {
        $phy_prsntcondit = $_POST['physicspresentcondition'];
        }
        else
        {
        $phy_prsntcondit = Null;
        }

      // Chemistry

      if ($che_seprom_avl == 1)
        {
        $che_prsntcondit = $_POST['chemistrypresentcondtion'];
        }
        else
        {
        $che_prsntcondit = Null;
        }

      // Biology

      
      if ($bio_seprom_avl == 1)
        {
        $bio_prsntcondit = $_POST['biologypresentcondition'];
        }
        else
        {
        $bio_prsntcondit = Null;
        }

      // computer

      
      if ($comp_seprom_avl == 1)
        {
        $comp_prsntcondit = $_POST['computerpresentcondition'];
        }
        else
        {
        $comp_prsntcondit = Null;
        }

      // Maths

      
      if ($math_seprom_avl == 1)
        {
        $math_prsntcondit = $_POST['mathspresentcondition'];
        }
        else
        {
        $math_prsntcondit = Null;
        }

      // Language

      
      if ($lng_seprom_avl == 1)
        {
        $lng_prsntcondit = $_POST['languagepresentcondition'];
        }
        else
        {
        $lng_prsntcondit = Null;
        }

      // Geography

      
      if ($geo_seprom_avl == 1)
        {
        $geo_prsntcondit = $_POST['goegraphypresentcondition'];
        }
        else
        {
        $geo_prsntcondit = Null;
        }

      // Home Science

      
      if ($hmescince_seprom_avl == 1)
        {
        $hmescince_prsntcondit = $_POST['homesciencepresentcondition'];
        }
        else
        {
        $hmescince_prsntcondit = Null;
        }

      // Psychology

      
      if ($psyc_seprom_avl == 1)
        {
        $psyc_prsntcondit = $_POST['psychologypresentcondition'];
        }
        else
        {
        $psyc_prsntcondit = Null;
        }

      $data = array(
        'phy_seprom_avl' => $phy_seprom_avl,
        'phy_prsntcondit' => $phy_prsntcondit,
        'che_seprom_avl' => $che_seprom_avl,
        'che_prsntcondit' => $che_prsntcondit,
        'bio_seprom_avl' => $bio_seprom_avl,
        'bio_prsntcondit' => $bio_prsntcondit,
        'comp_seprom_avl' => $comp_seprom_avl,
        'comp_prsntcondit' => $comp_prsntcondit,
        'math_seprom_avl' => $math_seprom_avl,
        'math_prsntcondit' => $math_prsntcondit,
        'lng_seprom_avl' => $lng_seprom_avl,
        'lng_prsntcondit' => $lng_prsntcondit,
        'geo_seprom_avl' => $geo_seprom_avl,
        'geo_prsntcondit' => $geo_prsntcondit,
        'hmescince_seprom_avl' => $hmescince_seprom_avl,
        'hmescince_prsntcondit' => $hmescince_prsntcondit,
        'psyc_seprom_avl' => $psyc_seprom_avl,
        'psyc_prsntcondit' => $psyc_prsntcondit
      );
      $this->Udise_assetmodel->asset4formupdate($data, $school_id);
        }
      
      redirect('Udise_asset/emis_school_asset4', 'refresh');
      }
      else
      {
      redirect('Udise_asset/emis_school_asset4', 'refresh');
      }
    }


  // Udise asset module *page1 view
    public

  function emis_school_asset1()
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
          $asset = $this->Udise_assetmodel->get_asset1_form_details($school_id);
          
          if (!$asset) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_assetmodel->assetinsrt($record);
          }
          // asset module1 datas
          $asset = $this->Udise_assetmodel->get_asset1_form_details($school_id);
          $data['buil_status'] = $asset[0]->buil_status;
          $data['buil_type'] = $asset[0]->buil_type;
          $data['bndrywl_type'] = $asset[0]->bndrywl_type;
          $data['landavail_expnsin'] = $asset[0]->landavail_expnsin;
          $data['seprom_headteach'] = $asset[0]->seprom_headteach;
          $data['elecon_avail'] = $asset[0]->elecon_avail;
          $data['substo_newsppr'] = $asset[0]->substo_newsppr;
          $data['noofcomp_avail'] = $asset[0]->noofcomp_avail;
          $data['noofcom_func'] = $asset[0]->noofcom_func;
          $data['puc_gdcondt'] = $asset[0]->puc_gdcondt;
          $data['puc_minrpr'] = $asset[0]->puc_minrpr;
          $data['puc_majrpr'] = $asset[0]->puc_majrpr;
          $data['par_puc_gdcondt'] = $asset[0]->par_puc_gdcondt;
          $data['par_puc_minrpr'] = $asset[0]->par_puc_minrpr;
          $data['par_puc_majrpr'] = $asset[0]->par_puc_majrpr;
          $data['kuch_gdcondt'] = $asset[0]->kuch_gdcondt;
          $data['kuch_minrpr'] = $asset[0]->kuch_minrpr;
          $data['kuch_majrpr'] = $asset[0]->kuch_majrpr;
          $data['tnt_gdcondt'] = $asset[0]->tnt_gdcondt;
          $data['tnt_minrpr'] = $asset[0]->tnt_minrpr;
          $data['tnt_majrpr'] = $asset[0]->tnt_majrpr;
          $this->load->view('Udise/emis_school_asset1', $data);
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
  // Udise asset module *page1 viewending

  // Udise *asset module *page2 view
    public

  function emis_school_asset2()
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

          $asset = $this->Udise_assetmodel->get_asset2_form_details($school_id);
          
          if (!$asset) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_assetmodel->assetinsrt($record);
          }
          // asset module1 datas
          $asset = $this->Udise_assetmodel->get_asset2_form_details($school_id);

          // asset module2 datas

          $data['clsrms_usdfrinspurp'] = $asset[0]->clsrms_usdfrinspurp;
          $data['clsrms_undrcons'] = $asset[0]->clsrms_undrcons;
          $data['clsrms_dilap'] = $asset[0]->clsrms_dilap;
          $data['frnitravail_frstu'] = $asset[0]->frnitravail_frstu;
          $data['otofclsrms_pri'] = $asset[0]->otofclsrms_pri;
          $data['otofclsrms_sec'] = $asset[0]->otofclsrms_sec;
          $data['otofclsrms_uprpri'] = $asset[0]->otofclsrms_uprpri;
          $data['otofclsrms_hsc'] = $asset[0]->otofclsrms_hsc;
          $data['totno_rmsavl_othrthclsrms'] = $asset[0]->totno_rmsavl_othrthclsrms;

          // asset module2 form2

          $data['nooftoilts_avl_bys'] = $asset[0]->nooftoilts_avl_bys;
          $data['nooftoilts_avl_gls'] = $asset[0]->nooftoilts_avl_gls;
          $data['nooftoilts_func_bys'] = $asset[0]->nooftoilts_func_bys;
          $data['nooftoilts_func_gls'] = $asset[0]->nooftoilts_func_gls;
          $data['noofcwsnfrndly_func_toilts_bys'] = $asset[0]->noofcwsnfrndly_func_toilts_bys;
          $data['noofcwsnfrndly_func_toilts_gls'] = $asset[0]->noofcwsnfrndly_func_toilts_gls;
          $data['toiltsavl_rnigwtr_flshingndclning_bys'] = $asset[0]->toiltsavl_rnigwtr_flshingndclning_bys;
          $data['toiltsavl_rnigwtr_flshingndclning_gls'] = $asset[0]->toiltsavl_rnigwtr_flshingndclning_gls;
          $data['noofurnls_avl_bys'] = $asset[0]->noofurnls_avl_bys;
          $data['noofurnls_avl_gls'] = $asset[0]->noofurnls_avl_gls;
          $data['urnlshv_wtrfac_bys'] = $asset[0]->urnlshv_wtrfac_bys;
          $data['urnlshv_wtrfac_gls'] = $asset[0]->urnlshv_wtrfac_gls;
          $data['hndwshfacavl_toiltsurnlsblck'] = $asset[0]->hndwshfacavl_toiltsurnlsblck;

          // asset module2 form3

          $data['lib_avl'] = $asset[0]->lib_avl;
          $data['lib_totnoboks'] = $asset[0]->lib_totnoboks;
          $data['bokbnk_avl'] = $asset[0]->bokbnk_avl;
          $data['bokbnk_totnoboks'] = $asset[0]->bokbnk_totnoboks;
          $data['redngcorn_avl'] = $asset[0]->redngcorn_avl;
          $data['redngcorn_totnoboks'] = $asset[0]->redngcorn_totnoboks;
          $data['schlhav_fultimlib'] = $asset[0]->schlhav_fultimlib;
          $this->load->view('Udise/emis_school_asset2', $data);
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
   // Udise *asset module *page2 view ending

   // Udise *asset module *page3 view
  public

  function emis_school_asset3()
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
           $asset = $this->Udise_assetmodel->get_asset3_form_details($school_id);
          
          if (!$asset) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_assetmodel->assetinsrt($record);
          }
          // asset module1 datas
          $asset = $this->Udise_assetmodel->get_asset3_form_details($school_id);

          // asset module3
          // set1

          $data['drnkingwtravl_schprmis'] = $asset[0]->drnkingwtravl_schprmis;
          $data['mnsrc_drnkingwtr'] = $asset[0]->mnsrc_drnkingwtr;
          $data['wtrpur_avl'] = $asset[0]->wtrpur_avl;
          $data['hvprov_rainwtrharvst'] = $asset[0]->hvprov_rainwtrharvst;

          // set1 ending
          // set2

          $data['schlhv_plygrnd'] = $asset[0]->schlhv_plygrnd;
          $data['schlhv_alt_arngmnts'] = $asset[0]->schlhv_alt_arngmnts;

          // set2 ending
          // set3

          $data['schlhv_cal'] = $asset[0]->schlhv_cal;
          $data['schlhv_smtclsrms'] = $asset[0]->schlhv_smtclsrms;
          $data['schlhv_comptab'] = $asset[0]->schlhv_comptab;
          $data['schlhv_netfac'] = $asset[0]->schlhv_netfac;

          // set3 ending
          // set4

          $data['medchckupcondct_lstacdmicyr'] = $asset[0]->medchckupcondct_lstacdmicyr;
          $data['totnoofmedchckupcondct_lastacademicyear'] = $asset[0]->totnoofmedchckupcondct_lastacademicyear;
          $data['dewormtablts_chldrns'] = $asset[0]->dewormtablts_chldrns;
          $data['irnflictblts_wcd'] = $asset[0]->irnflictblts_wcd;

          // set4 ending
          // set5

          $data['rmp_disbledchldrs'] = $asset[0]->rmp_disbledchldrs;
          $data['hndrlrmp_avl'] = $asset[0]->hndrlrmp_avl;

          // set5 ending

          $this->load->view('Udise/emis_school_asset3', $data);
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
   // Udise *asset module *page3 view ending

  // Udise *asset module *page4 view
  public

  function emis_school_asset4()
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
          $asset = $this->Udise_assetmodel->get_asset4_form_details($school_id);
          
          if (!$asset) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_assetmodel->assetinsrt($record);
          }
          // asset module1 datas
          $asset = $this->Udise_assetmodel->get_asset4_form_details($school_id);


          // asset module4 datas

          $data['seprm_asst_hmorvicpric'] = $asset[0]->seprm_asst_hmorvicpric;
          $data['sepcomrom_gls'] = $asset[0]->sepcomrom_gls;
          $data['stfrom_tchrs'] = $asset[0]->stfrom_tchrs;
          $data['comp_lab'] = $asset[0]->comp_lab;
          $data['cocriclractvtyartsrom'] = $asset[0]->cocriclractvtyartsrom;
          $data['staff_quarters'] = $asset[0]->staff_quarters;
          $data['integrtdscinc_lab'] = $asset[0]->integrtdscinc_lab;
          $data['lib_room'] = $asset[0]->lib_room;
          $data['ado_visl_pub_addr_sys'] = $asset[0]->ado_visl_pub_addr_sys;
          $data['fire_exting'] = $asset[0]->fire_exting;
          $data['scince_kit'] = $asset[0]->scince_kit;
          $data['math_kit'] = $asset[0]->math_kit;
          $data['biomet_dev'] = $asset[0]->biomet_dev;
          $data['phy_seprom_avl'] = $asset[0]->phy_seprom_avl;
          $data['phy_prsntcondit'] = $asset[0]->phy_prsntcondit;
          $data['che_seprom_avl'] = $asset[0]->che_seprom_avl;
          $data['che_prsntcondit'] = $asset[0]->che_prsntcondit;
          $data['bio_seprom_avl'] = $asset[0]->bio_seprom_avl;
          $data['bio_prsntcondit'] = $asset[0]->bio_prsntcondit;
          $data['comp_seprom_avl'] = $asset[0]->comp_seprom_avl;
          $data['comp_prsntcondit'] = $asset[0]->comp_prsntcondit;
          $data['math_seprom_avl'] = $asset[0]->math_seprom_avl;
          $data['math_prsntcondit'] = $asset[0]->math_prsntcondit;
          $data['lng_seprom_avl'] = $asset[0]->lng_seprom_avl;
          $data['lng_prsntcondit'] = $asset[0]->lng_prsntcondit;
          $data['geo_seprom_avl'] = $asset[0]->geo_seprom_avl;
          $data['geo_prsntcondit'] = $asset[0]->geo_prsntcondit;
          $data['hmescince_seprom_avl'] = $asset[0]->hmescince_seprom_avl;
          $data['hmescince_prsntcondit'] = $asset[0]->hmescince_prsntcondit;
          $data['psyc_seprom_avl'] = $asset[0]->psyc_seprom_avl;
          $data['psyc_prsntcondit'] = $asset[0]->psyc_prsntcondit;
          $this->load->view('Udise/emis_school_asset4', $data);
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
   // // Udise *asset module *page4 view
  
  }

?>



