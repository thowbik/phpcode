<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_fixa extends CI_Controller {

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
    $this->load->model('Fixa_model');
    $this->load->library('session'); 
    $this->load->model('Homemodel');
    $this->load->model('Datamodel');
    
    // ***** Load Model for Udise_adminmodel *****
    date_default_timezone_set('Asia/Kolkata');  


  
  }

  // Staff Fixtation
   public function emis_staff_fixa()
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
          if($user_type_id==1 || $user_type_id==2 || $user_type_id==3) {

                $school_id = $this->session->userdata('emis_school_id'); 
                $udise_id  = $this->session->userdata('emis_school_udise');  
                $data['details'] = $this->Fixa_model->get_fixa_dtls($udise_id);

                // echo "Hello this is Staff Fixation data";

                // echo '<pre>';  print_r($details); echo '</pre>';

                $this->load->view('emis_staff_fixa',$data);

           }else{ redirect('/', 'refresh');}
       }
    }else { redirect('/', 'refresh'); }


   }
   // Staff Fixation Details
}