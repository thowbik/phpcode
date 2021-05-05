
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_sdvariable extends CI_Controller

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

  public function __construct()
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
    $this->load->model('Udise_sdvarmodel');
    date_default_timezone_set('Asia/Kolkata');
    }



    
    // State Defined Variables functions



    // TV/DVD functional
    public 

    function updateemis_school_sdvariables_tvdvdfunctional()
    {
      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "tvfnctnl" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update TV/DVD Functional" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }

    }

    // Maths Kit Received
    public 

    function updateemis_school_sdvariables_mathskitreceived(){

      $this->load->library('session');
      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == "1" || $value == "2")
        {
        $data = array(
          "mathkit_recvd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Maths Kit Received" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
      
    }

    // No. of teachers need Maths kit training
    public 

    function updateemis_school_sdvariables_noofteachrsneedmathskit(){

      $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "tchrsnd_mathkittrning" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Need Maths kit training" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
    }

  // No. of books available in the reading corner
  public 

  function updateemis_school_sdvariables_noofbooksavailinreadingcorner(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "boksavail_rdcrnr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update books available in the reading corner" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
}

  // No. of children actually reading supplementry and graded books in the Reading corner (based on the Head Master/Teachers Observation)
  public 

  function updateemis_school_sdvariables_noofchildrenreadingsupplementry(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "chldrnsactulyrdngcrnr_hm" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of children actually reading supplementry and graded books in the Reading corner" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Whether the school situated
  public 

  function updateemis_school_sdvariables_schoolsituated(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5' )
        {
        $data = array(
          "schl_situtd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Whether the school situated" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Mention school email id
  public 

  function updateemis_school_sdvariables_schoolemailid(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "schl_email" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Mention school email id" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Name of the BRTE in-charge of the school
  public 

  function updateemis_school_sdvariables_schoolbrteinchargename(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "brteinchrge_name" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Name of the BRTE in-charge of the school" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Reason for Toilet not functional
  public 

  function updateemis_school_sdvariables_reasonfortoiletnotfunctional(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2' || $value == '3' || $value == '4')
        {
        $data = array(
          "resn_toiltsnotfunc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Reason for Toilet not functional" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Is land available for construction of additional toilets if required
  public 

  function updateemis_school_sdvariables_landavailforconstruction(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "land_availconstrc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Land Available for Construction" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Whether drinking water facility provided to all children in all working days
  public 

  function updateemis_school_sdvariables_drinkingwaterfacprovidedtoallchildrens(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "drnkngwtrfacprovchldrn_allwrkngdys" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Whether drinking water facility provided to all children in all working days" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  } 


  // Water facility available for
  public 

  function updateemis_school_sdvariables_waterfacilityavailfor(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2' || $value == '3' || $value == '4')
        {
        $data = array(
          "wtrfac_avail" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Water facility available" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Whether the school is provided with Overhead tank
  public 

  function updateemis_school_sdvariables_schloverldedtank(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2' || $value == '3')
        {
        $data = array(
          "schlprvded_ovrhdtnk" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Whether the school is provided with Overhead tank" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }

  // No. of Desktop computers Supplied by (for classes I-VIII)

  // SSA
  public 

  function updateemis_school_sdvariables_desktopcomputersupliedforssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compsupld_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // DSE
  public 

  function updateemis_school_sdvariables_desktopcomputersupliedfordse(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compsupld_dse" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update DSE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DEE
  public 

  function updateemis_school_sdvariables_desktopcomputersupliedfordee(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compsupld_dee" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update DEE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // RMSA
  public 

  function updateemis_school_sdvariables_desktopcomputersupliedforrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compsupld_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Others
  public 

  function updateemis_school_sdvariables_desktopcomputersupliedforothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compsupld_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // No. of Desktop computers in working condition supplied under (for classes I-VIII)

  // SSA
  public 

  function updateemis_school_sdvariables_desktopcomputerworkngsupliedforssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compwrkngcond_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Desktops SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // DSE
  public 

  function updateemis_school_sdvariables_desktopcomputerworkngsupliedfordse(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compwrkngcond_dse" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Desktops DSE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  } 


  // DEE
  public 

  function updateemis_school_sdvariables_desktopcomputerworkngsupliedfordee(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compwrkngcond_dee" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Desktops DEE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // RMSA
  public 

  function updateemis_school_sdvariables_desktopcomputerworkngsupliedforrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compwrkngcond_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Desktops RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Others
  public 

  function updateemis_school_sdvariables_desktopcomputerworkngsupliedforothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "compwrkngcond_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Desktops Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // No of laptops available
  public 

  function updateemis_school_sdvariables_nooflaptopsavail(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptps_avail" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Laptops available" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  //No. of Laptops Supplied by (for classes I-VIII)

  // SSA
  public 

  function updateemis_school_sdvariables_laptopssupliedforssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpssplied_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of laptops supplied by ssa" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DSE
  public 

  function updateemis_school_sdvariables_laptopssupliedfordse(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpssplied_dse" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of laptops supplied by dse" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DEE
  public 

  function updateemis_school_sdvariables_laptopssupliedfordee(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpssplied_dee" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of laptops supplied by dee" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // RMSA
  public 

  function updateemis_school_sdvariables_laptopssupliedforrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpssplied_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of laptops supplied by RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Others
  public 

  function updateemis_school_sdvariables_laptopssupliedforothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpssplied_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of laptops supplied by Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



   // STATE DEFINED VARIABLE PAGE 2

   // No. of Laptops in working condition supplied under (for classes I-VIII)

   // SSA
  public 

  function updateemis_school_sdvariables_laptopsworkngsupliedforssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpswrkngcond_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Laptops in working condition supplied under (for classes I-VIII) SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }

  // DSE
  public 

  function updateemis_school_sdvariables_laptopsworkngsupliedfordse(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpswrkngcond_dse" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Laptops in working condition supplied under (for classes I-VIII) DSE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DSE
  public 

  function updateemis_school_sdvariables_laptopsworkngsupliedfordee(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpswrkngcond_dee" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Laptops in working condition supplied under (for classes I-VIII) DEE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // RMSA
  public 

  function updateemis_school_sdvariables_laptopsworkngsupliedforrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpswrkngcond_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Laptops in working condition supplied under (for classes I-VIII) RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Others
  public 

  function updateemis_school_sdvariables_laptopsworkngsupliedforothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "laptpswrkngcond_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Laptops in working condition supplied under (for classes I-VIII) Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of LCD Projectors available
  public 

  function updateemis_school_sdvariables_nooflcdprojectorsavail(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrs_avail" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of LCD Projectors available" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of LCD Projectors in working condition
  public 

  function updateemis_school_sdvariables_nooflcdprojectorsinworkingcondtion(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrswrkng_cond" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of LCD Projectors in working condition" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No. of LCD projectors Supplied by


  // SSA

  public 

  function updateemis_school_sdvariables_lcdprojectorssupliedforssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrssplied_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of LCD projectors Supplied by SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DSE

  public 

  function updateemis_school_sdvariables_lcdprojectorssupliedfordse(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrssplied_dse" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of LCD projectors Supplied by DSE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // DEE 

  public 

  function updateemis_school_sdvariables_lcdprojectorssupliedfordee(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrssplied_dee" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of LCD projectors Supplied by DEE" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // RMSA

  public 

  function updateemis_school_sdvariables_lcdprojectorssupliedforrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrssplied_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of LCD projectors Supplied by RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }




  // Others

  public 

  function updateemis_school_sdvariables_lcdprojectorssupliedforothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "lcdprojtrssplied_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of LCD projectors Supplied by Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Whether Azim Premji Foundation (APF) CDs has been installed in Desktops and laptops

  public 

  function updateemis_school_sdvariables_apfcdinstalledindesktopandlaptop(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "apfcd_instld_deskndlaptps" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Azim Premji Foundation (APF) CDs has been installed in Desktops and laptops" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Number of Ramps provided under

  // SSA

  public 

  function updateemis_school_sdvariables_nooframpsprovidedunderssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rmpsprvdedundr_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Number of Ramps provided under SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // PWD

  public 

  function updateemis_school_sdvariables_nooframpsprovidedunderpwd(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rmpsprvdedundr_pwd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Number of Ramps provided under PWD" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Others

  public 

  function updateemis_school_sdvariables_nooframpsprovidedunderothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "rmpsprvdedundr_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Number of Ramps provided under Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No. of Benches and Desks available (for Classes VI-VIII)

  public 

  function updateemis_school_sdvariables_noofbenchanddeskavail(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "bnchsnddesks_avail" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of Benches and Desks available (for Classes VI-VIII)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No. of Benches and Desks required (Based on enrolment for Classes VI-VIII)

  public 

  function updateemis_school_sdvariables_noofbenchanddeskrequired(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "bnchsnddesks_reqrd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No. of Benches and Desks required (Based on enrolment for Classes VI-VIII)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // SMC Contribution (In Rs.)

  public 

  function updateemis_school_sdvariables_smccontribution(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "smc_contrb" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update SMC Contribution" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Whether the school is provided with fire extinguisher

  public 

  function updateemis_school_sdvariables_schlprovidedwithfireextinguisher(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "firextinsr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update school is provided with fire extinguisher" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Whether the school has been provided with water purifier/RO system

  public 

  function updateemis_school_sdvariables_schlprovidedwithwaterpurifierorrosys(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "watpurf" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update school has been provided with water purifier/RO system" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // If Compound wall required, mention the required length in meters

  public 

  function updateemis_school_sdvariables_compoundwallrequiredlength(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "cmpondwalreq_lngth" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Compound wall required, mention the required length in meters" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Whether the school report card for the year 2016-17 has been displayed on the Notice board

  public 

  function updateemis_school_sdvariables_schlreportcardfor2016_17(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "schlrepcrdisplyd_ntcbrd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update school report card for the year 2016-17 has been displayed on the Notice board" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Whether the UDISE data for the year 2016-17 has been shared with community(SMC) members?

  public 

  function updateemis_school_sdvariables_udisedataforyear2016_17sharedwithsmc(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "udisedtashrd_smc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update UDISE data for the year 2016-17 has been shared with community(SMC) members" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // SMDC contribution (in Rs.)

  public 

  function updateemis_school_sdvariables_smdccontribution(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "smdc_contrb" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update SMDC Contribution" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No. of Academic inspection made by CEO/DEO(RMSA Officials) for sec.school

  public 

  function updateemis_school_sdvariables_academicinspection(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "vistsmd_ceodeo" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Academic inspection made by CEO/DEO(RMSA Officials) for sec.school" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No. of visits made by ADPC/EDC (RMSA officials) for secondary school

  public 

  function updateemis_school_sdvariables_adpcoredcforsecondaryschl(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "vistsmd_adpcedc" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update visits made by ADPC/EDC (RMSA officials) for secondary school" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // No. of Toilets in Dilapidated Condtion

  public 

  function updateemis_school_sdvariables_nooftoiletsindilapidatedcondtion(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toilts_dilpcondit" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Toilets in Dilapidated Condtion" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // school has been provided with napkin vending machine

  public 

  function updateemis_school_sdvariables_providednapkinvendingmachine(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1' || $value == '2')
        {
        $data = array(
          "schlprvd_npknvenmchn" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update school has been provided with napkin vending machine" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of Toilets units constructed by PSU under CSR

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutedpsuundercsr(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_psucsr" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Toilets units constructed by PSU under CSR" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of Toilets units constructed by RD

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutedrd(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_rd" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Toilets units constructed by RD" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of Toilets units constructed by NABARD

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutednabard(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_nabard" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Toilets units constructed by NABARD" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }

  // No of Toilets units constructed by SSA

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutedssa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_ssa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Toilets units constructed by SSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of Toilets units constructed by RMSA

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutedrmsa(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_rmsa" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Toilets units constructed by RMSA" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // No of Toilets units constructed by Others

  public 

  function updateemis_school_sdvariables_nooftoiletunitsconstrcutedothers(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if (true)
        {
        $data = array(
          "toiltsconstrc_othrs" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update No of Toilets units constructed by Others" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Whether the School has been provided with Air purifier

  public 

  function updateemis_school_sdvariables_schlhasbeenprovidedwithairpurifier(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1'|| $value == '2')
        {
        $data = array(
          "schlprvd_airpurif" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Whether the School has been provided with Air purifier" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Is the sanitary worker engaged to clean the toilets

  public 

  function updateemis_school_sdvariables_sanitaryworkerengagedtocleantoilets(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1'|| $value == '2')
        {
        $data = array(
          "santrywrkrengedcl_tolts" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Is the sanitary worker engaged to clean the toilets" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }



  // Land (Minimum 2 to 3 Cents)

  public 

  function updateemis_school_sdvariables_gardenformationlandmin2to3cents(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1'|| $value == '2')
        {
        $data = array(
          "land_min2t3cnts" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Land (Minimum 2 to 3 Cents)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }


  // Sufficient Water Facilities for Graden Maintenance

  public 

  function updateemis_school_sdvariables_sufficentwaterfacforgardenmaintenance(){

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if ($emis_loggedin)
      {
      $value = $this->input->post('value');
      if ($value == '1'|| $value == '2')
        {
        $data = array(
          "sufficntwatfac_garmntence" => $value
        );
        $school_id = $this->session->userdata('emis_school_id');
        if ($this->Udise_sdvarmodel->updatesdvariabledata($data, $school_id))
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
        $result_arr['error_msg'] = "Update Land (Minimum 2 to 3 Cents)" . " is not in the correct format.Re-check and submit again ";
        }

      echo json_encode($result_arr);
      }
      else
      {
      redirect('/', 'refresh');
      }
  }

 function updatesdvariablefrm(){
    //date_default_timezone_set('Asia/Kolkata');
    $this->load->library('session');
    $this->load->library('form_validation');

    $tvdvd_avail                = $_POST['tvordvdselect'];
    $schlhv_brdbndintrntfac     = $_POST['schlprovidedwithbroadbandinternetfacility'];
    $incinrtravail_glstoilt     = $_POST['incineratoravailingilrstoilsselect'];
    $rampsavail_usbuldngs       = $_POST['rampsavailinallusablebuildingselect'];

    // set1
    $this->form_validation->set_rules('tvordvdselect','TV/DVD available','required');
    if ($tvdvd_avail == 1) {
        $this->form_validation->set_rules('tvordvdsuppliedbyssa','Whether supplied by SSA','required');
    }

    // set2
    $this->form_validation->set_rules('schlprovidedwithbroadbandinternetfacility','Whether the school has been provided with Broadband Internet facility','required');
    if ($schlhv_brdbndintrntfac == 1) {
        $this->form_validation->set_rules('internetfacilityhasprovidedyes','Internet facility has been provided By','required');
    }

    // set3
    $this->form_validation->set_rules('incineratoravailingilrstoilsselect','Whether Incinerator is available in the Girls toilet','required');
    if ($incinrtravail_glstoilt == 1) {
        $this->form_validation->set_rules('installationiselectricalormanual','Whether the installation is electrical or manual','required');
    }


    // set4
    $this->form_validation->set_rules('rampsavailinallusablebuildingselect','Are ramps available in all usable buildings','required');
    if ($rampsavail_usbuldngs == 2) {
        $this->form_validation->set_rules('nooframpsrequired','Number of ramps required','required');
    }

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_udise = $this->session->userdata('emis_school_udise');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('sdvar',validation_errors());
          redirect('Udise_sdvariable/emis_school_sdvariable3','refresh');
        }else{

      // set1 
        
      

      if ($tvdvd_avail == 1) {
        $supld_ssa                = $_POST['tvordvdsuppliedbyssa'];
      }else{
        $supld_ssa                = NULL;
      }
      

      

      if ($schlhv_brdbndintrntfac == 1) {
        $intrntfac_prvdby         = $_POST['internetfacilityhasprovidedyes'];
      }else{
        $intrntfac_prvdby         = NULL;
      }
      

      

      if ($incinrtravail_glstoilt == 1) {
        $instltin_electormanl     = $_POST['installationiselectricalormanual'];
      }else{
        $instltin_electormanl     = NULL;
      }

      

      

      if ($rampsavail_usbuldngs == 2) {
        $nooframps_req            = $_POST['nooframpsrequired'];
      }else{
        $nooframps_req            = NULL;
      }
      
      

      $data = array(
        // set1
        'tvdvd_avail'             => $tvdvd_avail,
        'supld_ssa'               => $supld_ssa,
        'schlhv_brdbndintrntfac'  => $schlhv_brdbndintrntfac,
        'intrntfac_prvdby'        => $intrntfac_prvdby,
        'incinrtravail_glstoilt'  => $incinrtravail_glstoilt,
        'instltin_electormanl'    => $instltin_electormanl,
        'rampsavail_usbuldngs'    => $rampsavail_usbuldngs,
        'nooframps_req'           => $nooframps_req
        
        //'createdat'                 => date('Y-m-d H:i:s')
      );
      $this->Udise_sdvarmodel->updatesdvariabledata($data,$school_id);
    }
      redirect('Udise_sdvariable/emis_school_sdvariable3', 'refresh');
      }
      else
      {
      redirect('Udise_sdvariable/emis_school_sdvariable3', 'refresh');
      }
 }

 // state Defined Variable update module Ending

 // *state Defined Module *view part

  // *state Defined variable *page1
  public

  function emis_school_sdvariable1()
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
          $school_udise                                  = $this->session->userdata('emis_school_udise');
          $school_id                                    = $this->session->userdata('emis_school_id');
          
          $sdvariable1                                    = $this->Udise_sdvarmodel->get_sdvardata1($school_id);
          if (!$sdvariable1) {
                       $record = array(
                          'udise_code'    => $school_udise,
                          'school_key_id' => $school_id,
                          'createdat'     => date('Y-m-d H:i:s')
                          );
                        $this->Udise_sdvarmodel->sdvarinsrt($record);
          }          

          $sdvariable1                                    = $this->Udise_sdvarmodel->get_sdvardata1($school_id);
          // State Defined variable module1 datas

          $data['tvfnctnl']                              = $sdvariable1[0]->tvfnctnl;
          $data['mathkit_recvd']                         = $sdvariable1[0]->mathkit_recvd;
          $data['tchrsnd_mathkittrning']                 = $sdvariable1[0]->tchrsnd_mathkittrning;
          $data['boksavail_rdcrnr']                      = $sdvariable1[0]->boksavail_rdcrnr;
          $data['chldrnsactulyrdngcrnr_hm']              = $sdvariable1[0]->chldrnsactulyrdngcrnr_hm;
          $data['schl_situtd']                           = $sdvariable1[0]->schl_situtd;
          $data['schl_email']                            = $sdvariable1[0]->schl_email;
          $data['brteinchrge_name']                      = $sdvariable1[0]->brteinchrge_name;
          $data['resn_toiltsnotfunc']                    = $sdvariable1[0]->resn_toiltsnotfunc;
          $data['land_availconstrc']                     = $sdvariable1[0]->land_availconstrc;
          $data['drnkngwtrfacprovchldrn_allwrkngdys']    = $sdvariable1[0]->drnkngwtrfacprovchldrn_allwrkngdys;
          $data['wtrfac_avail']                          = $sdvariable1[0]->wtrfac_avail;
          $data['schlprvded_ovrhdtnk']                   = $sdvariable1[0]->schlprvded_ovrhdtnk;
          $data['compsupld_ssa']                         = $sdvariable1[0]->compsupld_ssa;
          $data['compsupld_dse']                         = $sdvariable1[0]->compsupld_dse;
          $data['compsupld_dee']                         = $sdvariable1[0]->compsupld_dee;
          $data['compsupld_rmsa']                        = $sdvariable1[0]->compsupld_rmsa;
          $data['compsupld_othrs']                       = $sdvariable1[0]->compsupld_othrs;
          $data['compwrkngcond_ssa']                     = $sdvariable1[0]->compwrkngcond_ssa;
          $data['compwrkngcond_dse']                     = $sdvariable1[0]->compwrkngcond_dse;
          $data['compwrkngcond_dee']                     = $sdvariable1[0]->compwrkngcond_dee;
          $data['compwrkngcond_rmsa']                    = $sdvariable1[0]->compwrkngcond_rmsa;
          $data['compwrkngcond_othrs']                   = $sdvariable1[0]->compwrkngcond_othrs;
          $data['laptps_avail']                          = $sdvariable1[0]->laptps_avail;
          $data['laptpssplied_ssa']                      = $sdvariable1[0]->laptpssplied_ssa;
          $data['laptpssplied_dse']                      = $sdvariable1[0]->laptpssplied_dse;
          $data['laptpssplied_dee']                      = $sdvariable1[0]->laptpssplied_dee;
          $data['laptpssplied_rmsa']                     = $sdvariable1[0]->laptpssplied_rmsa;
          $data['laptpssplied_othrs']                    = $sdvariable1[0]->laptpssplied_othrs;


          $this->load->view('Udise/emis_school_sdvariable1', $data);
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

    //$this->load->view('Udise/emis_school_sdvariable1');
    }
  // *state Defined variable *page1 Ending


  // *state Defined variable *page2
  public

  function emis_school_sdvariable2()
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
          $school_udise                                  = $this->session->userdata('emis_school_udise');
         
          $school_id                                    = $this->session->userdata('emis_school_id');
          
          $sdvariable2                                   = $this->Udise_sdvarmodel->get_sdvardata2($school_id);
          
          if (!$sdvariable2) {
                       $record = array(
                          'udise_code'    => $school_udise,
                          'school_key_id' => $school_id,
                          'createdat'     => date('Y-m-d H:i:s')
                          );
                        $this->Udise_sdvarmodel->sdvarinsrt($record);
          }          

          $sdvariable2                                    = $this->Udise_sdvarmodel->get_sdvardata2($school_id); 

          // State Defined variable module2 datas

          $data['laptpswrkngcond_ssa']                   = $sdvariable2[0]->laptpswrkngcond_ssa;
          $data['laptpswrkngcond_dse']                   = $sdvariable2[0]->laptpswrkngcond_dse;
          $data['laptpswrkngcond_dee']                   = $sdvariable2[0]->laptpswrkngcond_dee;
          $data['laptpswrkngcond_rmsa']                  = $sdvariable2[0]->laptpswrkngcond_rmsa;
          $data['laptpswrkngcond_othrs']                 = $sdvariable2[0]->laptpswrkngcond_othrs;
          $data['lcdprojtrs_avail']                      = $sdvariable2[0]->lcdprojtrs_avail;
          $data['lcdprojtrswrkng_cond']                  = $sdvariable2[0]->lcdprojtrswrkng_cond;
          $data['lcdprojtrssplied_ssa']                  = $sdvariable2[0]->lcdprojtrssplied_ssa;
          $data['lcdprojtrssplied_dse']                  = $sdvariable2[0]->lcdprojtrssplied_dse;
          $data['lcdprojtrssplied_dee']                  = $sdvariable2[0]->lcdprojtrssplied_dee;
          $data['lcdprojtrssplied_rmsa']                 = $sdvariable2[0]->lcdprojtrssplied_rmsa;
          $data['lcdprojtrssplied_othrs']                = $sdvariable2[0]->lcdprojtrssplied_othrs;
          $data['apfcd_instld_deskndlaptps']             = $sdvariable2[0]->apfcd_instld_deskndlaptps;
          $data['rmpsprvdedundr_ssa']                    = $sdvariable2[0]->rmpsprvdedundr_ssa;
          $data['rmpsprvdedundr_pwd']                    = $sdvariable2[0]->rmpsprvdedundr_pwd;
          $data['rmpsprvdedundr_othrs']                  = $sdvariable2[0]->rmpsprvdedundr_othrs;
          $data['bnchsnddesks_avail']                    = $sdvariable2[0]->bnchsnddesks_avail;
          $data['bnchsnddesks_reqrd']                    = $sdvariable2[0]->bnchsnddesks_reqrd;
          $data['smc_contrb']                            = $sdvariable2[0]->smc_contrb;
          $data['firextinsr']                            = $sdvariable2[0]->firextinsr;
          $data['watpurf']                               = $sdvariable2[0]->watpurf;
          $data['cmpondwalreq_lngth']                    = $sdvariable2[0]->cmpondwalreq_lngth;
          $data['schlrepcrdisplyd_ntcbrd']               = $sdvariable2[0]->schlrepcrdisplyd_ntcbrd;
          $data['udisedtashrd_smc']                      = $sdvariable2[0]->udisedtashrd_smc;
          $data['smdc_contrb']                           = $sdvariable2[0]->smdc_contrb;
          // $data['acdmc_inspc']                           = $sdvariable2[0]->acdmc_inspc;
          $data['vistsmd_ceodeo']                        = $sdvariable2[0]->vistsmd_ceodeo;
          $data['vistsmd_adpcedc']                       = $sdvariable2[0]->vistsmd_adpcedc;
          $data['toilts_dilpcondit']                     = $sdvariable2[0]->toilts_dilpcondit;

          $this->load->view('Udise/emis_school_sdvariable2', $data);
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
    // *state Defined variable *page2 ending


  // *state Defined variable *page3
  public

  function emis_school_sdvariable3()
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
          $school_udise                                  = $this->session->userdata('emis_school_udise');
          $school_id                                    = $this->session->userdata('emis_school_id');
          
          $sdvariable3                                   = $this->Udise_sdvarmodel->get_sdvardata3($school_id);
          
           if (!$sdvariable3) {
                       $record = array(
                          'udise_code'    => $school_udise,
                          'school_key_id' => $school_id,
                          'createdat'     => date('Y-m-d H:i:s')
                          );
                        $this->Udise_sdvarmodel->sdvarinsrt($record);
          }          

          $sdvariable3                                    = $this->Udise_sdvarmodel->get_sdvardata3($school_id);

          // State Defined variable module2 datas

          $data['schlprvd_npknvenmchn']                   = $sdvariable3[0]->schlprvd_npknvenmchn;
          $data['toiltsconstrc_psucsr']                   = $sdvariable3[0]->toiltsconstrc_psucsr;
          $data['toiltsconstrc_rd']                       = $sdvariable3[0]->toiltsconstrc_rd;
          $data['toiltsconstrc_nabard']                   = $sdvariable3[0]->toiltsconstrc_nabard;
          $data['toiltsconstrc_ssa']                      = $sdvariable3[0]->toiltsconstrc_ssa;
          $data['toiltsconstrc_rmsa']                     = $sdvariable3[0]->toiltsconstrc_rmsa;
          $data['toiltsconstrc_othrs']                    = $sdvariable3[0]->toiltsconstrc_othrs;
          $data['schlprvd_airpurif']                      = $sdvariable3[0]->schlprvd_airpurif;
          $data['santrywrkrengedcl_tolts']                = $sdvariable3[0]->santrywrkrengedcl_tolts;
          $data['land_min2t3cnts']                        = $sdvariable3[0]->land_min2t3cnts;
          $data['sufficntwatfac_garmntence']              = $sdvariable3[0]->sufficntwatfac_garmntence;
          
          $data['tvdvd_avail']                            = $sdvariable3[0]->tvdvd_avail;
          $data['supld_ssa']                              = $sdvariable3[0]->supld_ssa;
          $data['schlhv_brdbndintrntfac']                 = $sdvariable3[0]->schlhv_brdbndintrntfac;
          $data['intrntfac_prvdby']                       = $sdvariable3[0]->intrntfac_prvdby;
          $data['incinrtravail_glstoilt']                 = $sdvariable3[0]->incinrtravail_glstoilt;
          $data['instltin_electormanl']                   = $sdvariable3[0]->instltin_electormanl;
          $data['rampsavail_usbuldngs']                   = $sdvariable3[0]->rampsavail_usbuldngs;
          $data['nooframps_req']                          = $sdvariable3[0]->nooframps_req;


          $this->load->view('Udise/emis_school_sdvariable3', $data);
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
    // *state Defined variable *page3 Ending


}
?>



