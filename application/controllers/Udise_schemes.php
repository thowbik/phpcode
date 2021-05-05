
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Udise_schemes extends CI_Controller

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
    $this->load->model('Udise_schemesmodel');
    }

    // staff module data update section


    public

  function emis_school_schemes1()
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

          // php validation part 
          $this->form_validation->set_rules('facility', 'Facility', 'required');
          $this->form_validation->set_rules('tb1', 'General|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9', 'Muslim Minority|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Muslim Minority|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Other Minority Groups|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Other Minority Groups|Girls', 'required|max_length[4]|numeric');



          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('schemes', validation_errors());
            // return false;
            // redirect('Udise_schemes/emis_school_schemes1', 'refresh');
          }else{

          if ($this->input->post('facility') != "") {
                
                $facility = $this->input->post('facility');
                $tb1  = $this->input->post('tb1');
                $tb2  = $this->input->post('tb2');
                $tb3  = $this->input->post('tb3');
                $tb4  = $this->input->post('tb4');
                $tb5  = $this->input->post('tb5');
                $tb6  = $this->input->post('tb6');
                $tb7  = $this->input->post('tb7');
                $tb8  = $this->input->post('tb8');
                $tot1 = (($tb1)+($tb3)+($tb5)+($tb7));
                $tot2 = (($tb2)+($tb4)+($tb6)+($tb8));
                $tb9  = $this->input->post('tb9');
                $tb10 = $this->input->post('tb10');
                $tb11 = $this->input->post('tb11');
                $tb12 = $this->input->post('tb12');

                
                $schemes1 = $this->Udise_schemesmodel->viewschemes1($school_id,$facility);

            if ($schemes1) {

                $record = array(
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                );

                $this->Udise_schemesmodel->updateschemes1($record,$school_id,$facility);

                }else{
                  $record = array(
                    'udise_code'    => $school_udise,
                    'school_key_id' => $school_id,
                    'facility'      => $facility,
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                    'createdat'     => date('Y-m-d H:i:s')
                  );
                  $this->Udise_schemesmodel->insertschme1($record);
                }    

          }

      }
      // php validation part Ending

          // schemes1 data
          $data['scheme1dta'] = $this->Udise_schemesmodel->viewschemes1dta($school_id);

          // schemes1 datas
          
          $this->load->view('Udise/emis_school_schemes1',$data);
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
    // $this->load->view('Udise/emis_school_schemes1');
    }


    // Udise *schemes module *page2 *form1 view

    public

  function emis_school_schemes2()
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
          $school_id = $this->session->userdata('emis_school_id');

        // php validation part 
          $this->form_validation->set_rules('schem2fac', 'Facility', 'required');
          $this->form_validation->set_rules('tb1', 'General|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9', 'Muslim Minority|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Muslim Minority|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Other Minority Groups|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Other Minority Groups|Girls', 'required|max_length[4]|numeric');



          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('schemes', validation_errors());
            // return false;
            // redirect('Udise_schemes/emis_school_schemes1', 'refresh');
          }else{

          if ($this->input->post('schem2fac') != "") {
                
                $facility = $this->input->post('schem2fac');
                $tb1  = $this->input->post('tb1');
                $tb2  = $this->input->post('tb2');
                $tb3  = $this->input->post('tb3');
                $tb4  = $this->input->post('tb4');
                $tb5  = $this->input->post('tb5');
                $tb6  = $this->input->post('tb6');
                $tb7  = $this->input->post('tb7');
                $tb8  = $this->input->post('tb8');
                $tot1 = (($tb1)+($tb3)+($tb5)+($tb7));
                $tot2 = (($tb2)+($tb4)+($tb6)+($tb8));
                $tb9  = $this->input->post('tb9');
                $tb10 = $this->input->post('tb10');
                $tb11 = $this->input->post('tb11');
                $tb12 = $this->input->post('tb12');

                
                $schemes2 = $this->Udise_schemesmodel->viewschemes2($school_id,$facility);

            if ($schemes2) {

                $record = array(
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                );

                $this->Udise_schemesmodel->updateschemes2($record,$school_id,$facility);

                }else{
                  $record = array(
                    'udise_code'    => $school_udise,
                    'school_key_id' => $school_id,
                    'facility'      => $facility,
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                    'createdat'     => date('Y-m-d H:i:s')
                  );
                  $this->Udise_schemesmodel->insertschme2($record);
                }    
          }
        }
        // php validation Ending
          // echo $student_id;
          $data['scheme2dta']= $this->Udise_schemesmodel->viewschemes2dta($school_id);

          
          $this->load->view('Udise/emis_school_schemes2', $data);
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

    // Uidse *schemes  module *page3 form update


  public

  function emis_school_schemes3()
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

          // echo $student_id;
         
          // php validation part 
          $this->form_validation->set_rules('sch3fac', 'Facility', 'required');
          $this->form_validation->set_rules('tb1', 'General|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9', 'Muslim Minority|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Muslim Minority|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Other Minority Groups|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Other Minority Groups|Girls', 'required|max_length[4]|numeric');



          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('schemes', validation_errors());
            // return false;
            // redirect('Udise_schemes/emis_school_schemes1', 'refresh');
          }else{

          // schemes1 datas

          if ($this->input->post('sch3fac') != "") {
                
                $facility = $this->input->post('sch3fac');
                $tb1  = $this->input->post('tb1');
                $tb2  = $this->input->post('tb2');
                $tb3  = $this->input->post('tb3');
                $tb4  = $this->input->post('tb4');
                $tb5  = $this->input->post('tb5');
                $tb6  = $this->input->post('tb6');
                $tb7  = $this->input->post('tb7');
                $tb8  = $this->input->post('tb8');
                $tot1 = (($tb1)+($tb3)+($tb5)+($tb7));
                $tot2 = (($tb2)+($tb4)+($tb6)+($tb8));
                $tb9  = $this->input->post('tb9');
                $tb10 = $this->input->post('tb10');
                $tb11 = $this->input->post('tb11');
                $tb12 = $this->input->post('tb12');

                
                 $schemes3 = $this->Udise_schemesmodel->viewschemes3($school_id,$facility);

            if ($schemes3) {

                $record = array(
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                );

                $this->Udise_schemesmodel->updateschemes3($record,$school_id,$facility);

                }else{
                  $record = array(
                    'udise_code'    => $school_udise,
                    'school_key_id' => $school_id,
                    'facility'      => $facility,
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                    'createdat'     => date('Y-m-d H:i:s')
                  );
                  $this->Udise_schemesmodel->insertschme3($record);
                }    
          }
      }
      // ***** php validation Ending *****

          $data['scheme3dta']= $this->Udise_schemesmodel->viewschemes3dta($school_id);

          
          $this->load->view('Udise/emis_school_schemes3', $data);
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
    //$this->load->view('Udise/emis_school_schemes3');
    }

   // Udise schemes module *page4 view

    public

  function emis_school_schemes4()
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

          if ($this->input->post('sch4fac') != "") {
            
          // php validation part 
          $this->form_validation->set_rules('tb1', 'General|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'General|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'SC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'SC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'ST|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'ST|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb7', 'OBC|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb8', 'OBC|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb9', 'Muslim Minority|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb10', 'Muslim Minority|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb11', 'Other Minority Groups|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb12', 'Other Minority Groups|Girls', 'required|max_length[4]|numeric');
          }


          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('schemes4', validation_errors());
          }else{

          // echo $student_id;
          // <<<<<<<<<<<<<<<<<<<< Schemes4 form1>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
              if ($this->input->post('sch4fac') != "") {
                
                $facility = $this->input->post('sch4fac');
                $tb1  = $this->input->post('tb1');
                $tb2  = $this->input->post('tb2');
                $tb3  = $this->input->post('tb3');
                $tb4  = $this->input->post('tb4');
                $tb5  = $this->input->post('tb5');
                $tb6  = $this->input->post('tb6');
                $tb7  = $this->input->post('tb7');
                $tb8  = $this->input->post('tb8');
                $tot1 = (($tb1)+($tb3)+($tb5)+($tb7));
                $tot2 = (($tb2)+($tb4)+($tb6)+($tb8));
                $tb9  = $this->input->post('tb9');
                $tb10 = $this->input->post('tb10');
                $tb11 = $this->input->post('tb11');
                $tb12 = $this->input->post('tb12');

                
                 $schemes4 = $this->Udise_schemesmodel->viewschemes4($school_id,$facility);

            if ($schemes4) {

                $record = array(
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                );

                $this->Udise_schemesmodel->updateschemes4($record,$school_id,$facility);

                }else{
                  $record = array(
                    'udise_code'    => $school_udise,
                    'school_key_id' => $school_id,
                    'facility'      => $facility,
                    'gen_b'         => $tb1,
                    'gen_g'         => $tb2,
                    'sc_b'          => $tb3,
                    'sc_g'          => $tb4,
                    'st_b'          => $tb5,
                    'st_g'          => $tb6,
                    'obc_b'         => $tb7,
                    'obc_g'         => $tb8,
                    'tot_b'         => $tot1,
                    'tot_g'         => $tot2,
                    'musmin_b'      => $tb9,
                    'musmin_g'      => $tb10,
                    'othmin_b'      => $tb11,
                    'othmin_g'      => $tb12,
                    'createdat'     => date('Y-m-d H:i:s')
                  );
                  $this->Udise_schemesmodel->insertschme4frm1($record);
                }    
          }

          // <<<<<<<<<<<<<<<<<<<< Schemes4 form1 Ending >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
      }

            if ($this->input->post('sch4fac2') != "") {
            
          // php validation part 
          $this->form_validation->set_rules('tb1', 'Elementary|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb2', 'Elementary|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb3', 'Secondary|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb4', 'Secondary|Girls', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb5', 'Higher Secondary|Boys', 'required|max_length[4]|numeric');
          $this->form_validation->set_rules('tb6', 'Higher Secondary|Girls', 'required|max_length[4]|numeric');
          }

          // php validation
          if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('schemestb2', validation_errors());
            // return false;
            // redirect('Udise_schemes/emis_school_schemes1', 'refresh');
          }else{

          // <<<<<<<<<<<<<<<<<<<< Schemes4 form2>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
              if ($this->input->post('sch4fac2') != "") {

                
                $facility = $this->input->post('sch4fac2');
                $tb1  = $this->input->post('tb1');
                $tb2  = $this->input->post('tb2');
                $tb3  = $this->input->post('tb3');
                $tb4  = $this->input->post('tb4');
                $tb5  = $this->input->post('tb5');
                $tb6  = $this->input->post('tb6');
                
                 $schemes4frm2 = $this->Udise_schemesmodel->viewschemes4frm2($school_id,$facility);

            if ($schemes4frm2) {

                $record = array(
                    'ele_b'          => $tb1,
                    'ele_g'          => $tb2,
                    'sec_b'          => $tb3,
                    'sec_g'          => $tb4,
                    'hsc_b'          => $tb5,
                    'hsc_g'          => $tb6
                );

                $this->Udise_schemesmodel->updateschemes4frm2($record,$school_id,$facility);

                }else{
                  $record = array(
                    'udise_code'     => $school_udise,
                    'school_key_id'  => $school_id,
                    'facility'       => $facility,
                    'ele_b'          => $tb1,
                    'ele_g'          => $tb2,
                    'sec_b'          => $tb3,
                    'sec_g'          => $tb4,
                    'hsc_b'          => $tb5,
                    'hsc_g'          => $tb6,
                    'createdat'      => date('Y-m-d H:i:s')
                  );
                  $this->Udise_schemesmodel->insertschme4frm2($record);
                }    
          }
        }
        // php validation Ending
          // <<<<<<<<<<<<<<<<<<<< Schemes4 form2 Ending >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


          $data['scheme4dta']= $this->Udise_schemesmodel->viewschemes4dta($school_id);
          // schemes4 form1 datas

          // schemes4 form2 datas
          $data['schemes4frm2dta'] = $this->Udise_schemesmodel->viewschemes4frm2dta($school_id);
          // schemes4 form2 datas
          
          $this->load->view('Udise/emis_school_schemes4', $data);
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

    // Udise *schemes module *page4 *form view

  }

?>



