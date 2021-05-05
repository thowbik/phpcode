<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

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
  function __construct()
  {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('form','url','html'));
      $this->load->library(array('session', 'form_validation'));
      $this->load->helper('security');
      $this->load->database(); 
      $this->load->model('Homemodel');
       $this->load->model('Authmodel');
      $this->load->model('Datamodel');
      $this->load->model('Statemodel');
      $this->load->model('Districtmodel');
      $this->load->model('Sectionmodel');
      $this->load->model('Adminmodel');
      $this->load->model('Schoolgroupmodel');
      // $this->load->library('session'); 
          $this->load->model('Blockmodel');
  }
   
    

    public function forgot_password()
   {
      $this->load->library('encrypt');
      $email = $this->uri->segment(3,0);

      $data['email'] = base64_decode(base64_decode($this->emis_crypt($email,'d')));
//decrypt_string(urldecode($ney));
      $this->load->view('Auth/emis_changepass', $data);
   }

   public function change_password(){

     $password = $this->input->post('emis_rest_user_cnfpass1');

     $school_id = $this->input->post('emis_schoolid');

     $data  = array('emis_password' => md5($password),
                     'ref' =>$password);

     $this->Homemodel->updatepasswordschool($school_id,$data);

     $this->session->sess_destroy(); 

     redirect('/','refresh');
 
   }

       function emis_crypt($string,$action) {
    // you may change these values to your own
    $secret_key = 'billa';
    $secret_iv = 'mangatha';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
   

   









}
?>

