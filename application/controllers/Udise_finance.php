
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_finance extends CI_Controller

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
    $this->load->model('Udise_financemodel');
    date_default_timezone_set('Asia/Kolkata');
    }




  public

  function emis_school_finance()
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

          // echo $student_id;
          $financefund = $this->Udise_financemodel->financefund($school_id);

          if (!$financefund) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_financemodel->financetb1insrt($record);
          }

          $financefund = $this->Udise_financemodel->financefund($school_id);

          $financeexpnditre = $this->Udise_financemodel->financeexpnditre($school_id);

           if (!$financeexpnditre) {
            $record = array(
              'udise_code'    => $school_udise,
              'school_key_id' => $school_id,
              'createdat'     => date('Y-m-d H:i:s')
              );
            $this->Udise_financemodel->financetb2insrt($record);
          }

          $financefund = $this->Udise_financemodel->financefund($school_id);
          
          $financeexpnditre = $this->Udise_financemodel->financeexpnditre($school_id);

          // finance datas

          // table1
          $data['schl_dev_grnt_recpt']            = $financefund[0]->schl_dev_grnt_recpt;
          $data['schl_dev_grnt_expdtr']           = $financefund[0]->schl_dev_grnt_expdtr;
          $data['schl_maintnc_grnt_recpt']        = $financefund[0]->schl_maintnc_grnt_recpt;
          $data['schl_maintnc_grnt_expdtr']       = $financefund[0]->schl_maintnc_grnt_expdtr;
          $data['schl_tlm_grnt_recpt']            = $financefund[0]->schl_tlm_grnt_recpt;
          $data['schl_tlm_grnt_expdtr']           = $financefund[0]->schl_tlm_grnt_expdtr;


          // table2
          
          // set1
          $data['cvlwrk_grntsrecv']               = $financeexpnditre[0]->cvlwrk_grntsrecv;
          $data['cvlwrk_grntsspnt']               = $financeexpnditre[0]->cvlwrk_grntsspnt;
          $data['cvlwrk_grntsspil']               = $financeexpnditre[0]->cvlwrk_grntsspil;
          //set2
          $data['anlsch_grntsrecv']               = $financeexpnditre[0]->anlsch_grntsrecv;
          $data['anlsch_grntsspnt']               = $financeexpnditre[0]->anlsch_grntsspnt;
          $data['anlsch_grntsspil']               = $financeexpnditre[0]->anlsch_grntsspil;

          //set3
          $data['minrpr_grntsrecv']               = $financeexpnditre[0]->minrpr_grntsrecv;
          $data['minrpr_grntsspnt']               = $financeexpnditre[0]->minrpr_grntsspnt;
          $data['minrpr_grntsspil']               = $financeexpnditre[0]->minrpr_grntsspil;

          //set4
          $data['repndreplac_grntsrecv']          = $financeexpnditre[0]->repndreplac_grntsrecv;
          $data['repndreplac_grntsspnt']          = $financeexpnditre[0]->repndreplac_grntsspnt;
          $data['repndreplac_grntsspil']          = $financeexpnditre[0]->repndreplac_grntsspil;

          //set5
          $data['purc_grntsrecv']                 = $financeexpnditre[0]->purc_grntsrecv;
          $data['purc_grntsspnt']                 = $financeexpnditre[0]->purc_grntsspnt;
          $data['purc_grntsspil']                 = $financeexpnditre[0]->purc_grntsspil;

          //set6
          $data['mtng_grntsrecv']                 = $financeexpnditre[0]->mtng_grntsrecv;
          $data['mtng_grntsspnt']                 = $financeexpnditre[0]->mtng_grntsspnt;
          $data['mtng_grntsspil']                 = $financeexpnditre[0]->mtng_grntsspil;

          //set7
          $data['othr_grntsrecv']                 = $financeexpnditre[0]->othr_grntsrecv;
          $data['othr_grntsspnt']                 = $financeexpnditre[0]->othr_grntsspnt;
          $data['othr_grntsspil']                 = $financeexpnditre[0]->othr_grntsspil;

          //set8
          $data['tot_grntsrecv']                  = $financeexpnditre[0]->tot_grntsrecv;
          $data['tot_grntsspnt']                  = $financeexpnditre[0]->tot_grntsspnt;
          $data['tot_grntsspil']                  = $financeexpnditre[0]->tot_grntsspil;

          $this->load->view('Udise/emis_school_finance', $data);
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

    // $this->load->view('Udise/emis_school_finance');
    }

    

     public function updateschoolfinance_fund(){

       //date_default_timezone_set('Asia/Kolkata');
    $this->load->library('session');
    $this->load->library('form_validation');

    // set1
    $this->form_validation->set_rules('schlfundform1schldevgranttb1','School Development Grant(UnderSSA) | Receipt','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundform1schldevgranttb2','School Development Grant(UnderSSA) | Expenditure','required|max_length[10]|numeric');

    // set2
    $this->form_validation->set_rules('schlfundform1schlmaintenancegranttb1','School Maintenance Grant(UnderSSA) | Receipt','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundform1schlmaintenancegranttb2','School Maintenance Grant(UnderSSA) | Expenditure','required|max_length[10]|numeric');

    // set3
    $this->form_validation->set_rules('schlfundform1schltlmorteachersgranttb1','TLM/Teachers Grant(UnderSSA) | Receipt','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundform1schltlmorteachersgranttb2','TLM/Teachers Grant(UnderSSA) | Expenditure','required|max_length[10]|numeric');

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_udise = $this->session->userdata('emis_school_udise');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {

         if ($this->form_validation->run()==FALSE) {
          $this->session->set_flashdata('finance1',validation_errors());

          redirect('Udise_finance/emis_school_finance','refresh');
        } else {
      // set1 
      $schl_dev_grnt_recpt        = $_POST['schlfundform1schldevgranttb1'];
      $schl_dev_grnt_expdtr       = $_POST['schlfundform1schldevgranttb2'];
      $schl_maintnc_grnt_recpt    = $_POST['schlfundform1schlmaintenancegranttb1'];
      $schl_maintnc_grnt_expdtr   = $_POST['schlfundform1schlmaintenancegranttb2'];
      $schl_tlm_grnt_recpt        = $_POST['schlfundform1schltlmorteachersgranttb1'];
      $schl_tlm_grnt_expdtr       = $_POST['schlfundform1schltlmorteachersgranttb2'];
     

      $data = array(
        // set1
        'schl_dev_grnt_recpt'           => $schl_dev_grnt_recpt,
        'schl_dev_grnt_expdtr'          => $schl_dev_grnt_expdtr,
        'schl_maintnc_grnt_recpt'       => $schl_maintnc_grnt_recpt,
        'schl_maintnc_grnt_expdtr'      => $schl_maintnc_grnt_expdtr,
        'schl_tlm_grnt_recpt'           => $schl_tlm_grnt_recpt,
        'schl_tlm_grnt_expdtr'          => $schl_tlm_grnt_expdtr,
               
        //'createdat'                 => date('Y-m-d H:i:s')
      );
      $this->Udise_financemodel->updatefinfund($data,$school_id);
    }
      redirect('Udise_finance/emis_school_finance', 'refresh');
      }
      else
      {
      redirect('Udise_finance/emis_school_finance', 'refresh');
      }


     }



     public
     function updateschool_expendit(){

      //date_default_timezone_set('Asia/Kolkata');
    $this->load->library('session');
    $this->load->library('form_validation');

    // set1
    $this->form_validation->set_rules('schlfundcivilworktb1','Civil works | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundcivilworktb2','Civil works | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundcivilworktb3','Civil works | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');

    // set2
    $this->form_validation->set_rules('schlfundannualgrantstb1','Annual School Grants | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundannualgrantstb2','Annual School Grants | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundannualgrantstb3','Annual School Grants | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');

    // set3
    $this->form_validation->set_rules('schlfundminorrepairormaintenancetb1','Minor repair/maintenance | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundminorrepairormaintenancetb2','Minor repair/maintenance | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundminorrepairormaintenancetb3','Minor repair/maintenance | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');

    // set4
    $this->form_validation->set_rules('schlfundrepairandmaintenancetb1','Repair and replacement of laboratory equipment`s | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundrepairandmaintenancetb2','Repair and replacement of laboratory equipment`s | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundrepairandmaintenancetb3','Repair and replacement of laboratory equipment`s | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');


    // set5
    $this->form_validation->set_rules('schlfundpurchasebookstb1','Purchase of books, periodicals, newspapers, etc | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundpurchasebookstb2','Purchase of books, periodicals, newspapers, etc | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundpurchasebookstb3','Purchase of books, periodicals, newspapers, etc | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');

    // set6
    $this->form_validation->set_rules('schlfundgrantformeetingtb1','Grant for meeting water, telephones and electricity charges | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundgrantformeetingtb2','Grant for meeting water, telephones and electricity charges | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundgrantformeetingtb3','Grant for meeting water, telephones and electricity charges | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');

    // set7
    $this->form_validation->set_rules('schlfundotherstb1','Others | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundotherstb2','Others | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundotherstb3','Others | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');


    // set8
    $this->form_validation->set_rules('schlfundotherstb1','Total(Grants at the school level) | Grants received','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundotherstb2','Total(Grants at the school level) | Grants utilized/spent','required|max_length[10]|numeric');
    $this->form_validation->set_rules('schlfundotherstb3','Total(Grants at the school level) | Spill over as on 1st April(`), current year','required|max_length[10]|numeric');



    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $school_udise = $this->session->userdata('emis_school_udise');
    $school_id = $this->session->userdata('emis_school_id');
    if ($emis_loggedin)
      {
       
       if ($this->form_validation->run() == FALSE) {
         $this->session->set_flashdata('finance2',validation_errors());
       }else{
      // set1 
      $cvlwrk_grntsrecv        = $_POST['schlfundcivilworktb1'];
      $cvlwrk_grntsspnt        = $_POST['schlfundcivilworktb2'];
      $cvlwrk_grntsspil        = $_POST['schlfundcivilworktb3'];

      // set2
      $anlsch_grntsrecv        = $_POST['schlfundannualgrantstb1'];
      $anlsch_grntsspnt        = $_POST['schlfundannualgrantstb2'];
      $anlsch_grntsspil        = $_POST['schlfundannualgrantstb3'];

      // set3
      $minrpr_grntsrecv        = $_POST['schlfundminorrepairormaintenancetb1'];
      $minrpr_grntsspnt        = $_POST['schlfundminorrepairormaintenancetb2'];
      $minrpr_grntsspil        = $_POST['schlfundminorrepairormaintenancetb3'];
     
      // set4
      $repndreplac_grntsrecv   = $_POST['schlfundrepairandmaintenancetb1'];
      $repndreplac_grntsspnt   = $_POST['schlfundrepairandmaintenancetb2'];
      $repndreplac_grntsspil   = $_POST['schlfundrepairandmaintenancetb3'];


      // set5
      $purc_grntsrecv          = $_POST['schlfundpurchasebookstb1'];
      $purc_grntsspnt          = $_POST['schlfundpurchasebookstb2'];
      $purc_grntsspil          = $_POST['schlfundpurchasebookstb3'];


      // set6
      $mtng_grntsrecv          = $_POST['schlfundgrantformeetingtb1'];
      $mtng_grntsspnt          = $_POST['schlfundgrantformeetingtb2'];
      $mtng_grntsspil          = $_POST['schlfundgrantformeetingtb3'];


      // set7
      $othr_grntsrecv          = $_POST['schlfundotherstb1'];
      $othr_grntsspnt          = $_POST['schlfundotherstb2'];
      $othr_grntsspil          = $_POST['schlfundotherstb3'];


      // set8
      $tot_grntsrecv           = $_POST['schlfundtotaltb1'];
      $tot_grntsspnt           = $_POST['schlfundtotaltb2'];
      $tot_grntsspil           = $_POST['schlfundtotaltb3'];



      $data = array(
        // set1
        'cvlwrk_grntsrecv'          => $cvlwrk_grntsrecv,
        'cvlwrk_grntsspnt'          => $cvlwrk_grntsspnt,
        'cvlwrk_grntsspil'          => $cvlwrk_grntsspil,

        // set2
        'anlsch_grntsrecv'          => $anlsch_grntsrecv,
        'anlsch_grntsspnt'          => $anlsch_grntsspnt,
        'anlsch_grntsspil'          => $anlsch_grntsspil,

        // set3
        'minrpr_grntsrecv'          => $minrpr_grntsrecv,
        'minrpr_grntsspnt'          => $minrpr_grntsspnt,
        'minrpr_grntsspil'          => $minrpr_grntsspil,

        // set4
        'repndreplac_grntsrecv'     => $repndreplac_grntsrecv,
        'repndreplac_grntsspnt'     => $repndreplac_grntsspnt,
        'repndreplac_grntsspil'     => $repndreplac_grntsspil,


        // set5
        'purc_grntsrecv'            => $purc_grntsrecv,
        'purc_grntsspnt'            => $purc_grntsspnt,
        'purc_grntsspil'            => $purc_grntsspil,


        // set6
        'mtng_grntsrecv'            => $mtng_grntsrecv,
        'mtng_grntsspnt'            => $mtng_grntsspnt,
        'mtng_grntsspil'            => $mtng_grntsspil,


        // set7
        'othr_grntsrecv'            => $othr_grntsrecv,
        'othr_grntsspnt'            => $othr_grntsspnt,
        'othr_grntsspil'            => $othr_grntsspil,


        // set8
        'tot_grntsrecv'             => $tot_grntsrecv,
        'tot_grntsspnt'             => $tot_grntsspnt,
        'tot_grntsspil'             => $tot_grntsspil,
               
        //'createdat'                 => date('Y-m-d H:i:s')
      );
      $this->Udise_financemodel->updatefinexpenditre($data,$school_id);
    }
      redirect('Udise_finance/emis_school_finance', 'refresh');
      }
      else
      {
      redirect('Udise_finance/emis_school_finance', 'refresh');
      }

     }
    // Finance Ending

  
  }

?>



