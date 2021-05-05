<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller {

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
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->helper('security');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $this->load->model('Authmodel');
    $this->load->model('Datamodel');
  }
 
    
/*------------------------------------------------------------*/

     public function emis_school_asset1()
   {
    $this->load->library('session');
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
        $school_udise = $this->session->userdata('emis_school_udise');
        $details = $this->Homemodel->get_school_form1_details($school_udise);

        $data['school_name'] = $details[0]->school_name;
        $data['school_name_tamil'] = $details[0]->school_name_tamil;
        $data['udise_code'] = $details[0]->udise_code;
        $data['current_district'] = $details[0]->district_id;
        $data['current_block'] = $details[0]->block_id;

        $this->load->view('Design/emis_school_asset1',$data);

      } else{ redirect('/', 'refresh');}

     }

     } else { redirect('/', 'refresh'); }

   }




        public function emis_school_asset2()
   {
 
    $this->load->view('Design/emis_school_asset2');

   }  
        public function emis_school_asset3()
   {
 
    $this->load->view('Design/emis_school_asset3');

   }  
        public function emis_school_asset4()
   {
 
    $this->load->view('Design/emis_school_asset4');

   }  



       public function emis_school_staff1()
       {
        $this->load->view('Design/emis_school_staff1');
       }

       public function emis_school_staff2()
       {
        $this->load->view('Design/emis_school_staff2');
       }

       public function emis_school_staff3()
       {
        $this->load->view('Design/emis_school_staff3');
       }

       public function emis_school_staffdetail()
       {
        $this->load->view('emis_school_staffdetail');
       }
     


      public function emis_school_enrolment1(){
        $this->load->view('Design/emis_school_enrolment1');
      }

      public function emis_school_enrolment2(){
        $this->load->view('Design/emis_school_enrolment2');
      }

      public function emis_school_enrolment3(){
        $this->load->view('Design/emis_school_enrolment3');
      }

       public function emis_school_enrolment4(){
        $this->load->view('Design/emis_school_enrolment4');
      }





      public function emis_school_sdvariable1(){
        $this->load->view('Design/emis_school_sdvariable1');
      }
      public function emis_school_sdvariable2(){
        $this->load->view('Design/emis_school_sdvariable2');
      }
      public function emis_school_sdvariable3(){
        $this->load->view('Design/emis_school_sdvariable3');
      }



      public function emis_school_examresult1(){
        $this->load->view('Design/emis_school_examresult1');
      }

      public function emis_school_boardexamresult1(){
        $this->load->view('Design/emis_school_boardexamresult1');
      }

      public function emis_school_boardoruniversityexamresult(){
        $this->load->view('Design/emis_school_boardoruniversityexamresult');
      }



      // schemes module

      public function emis_school_schemes1(){
        $this->load->view('Design/emis_school_schemes1');
      }

       public function emis_school_schemes2(){
        $this->load->view('Design/emis_school_schemes2');
      }

       public function emis_school_schemes3(){
        $this->load->view('Design/emis_school_schemes3');
      }

      public function emis_school_schemes4(){
        $this->load->view('Design/emis_school_schemes4');
      }

      public function emis_school_finance(){
        $this->load->view('Design/emis_school_finance');
      }


        public function emis_school_home_design()
   {
     $this->load->library('session');
     $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin)
      { 

    $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1){ 

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if( $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }else{
        $this->load->view('Design/emis_school_home_design');
     }

    }else if($user_type_id==3 || $user_type_id==2 ){
          $this->load->view('Design/emis_school_home_design');
    }

     } else { redirect('/', 'refresh'); }
   }
/*------------------------------------------------------------*/

}

?>