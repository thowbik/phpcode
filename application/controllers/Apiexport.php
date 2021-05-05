<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiexport extends CI_Controller {

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
    $this->load->helper(array('form','url','html'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->database(); 
    $this->load->model('Apimodel');
   }


    public function emis_getstudetails(){

      if(isset($_GET ["key_id"]) && $_GET ["key_id"] == "bad89c180fec1606805aa603044a56e" ){
  $emis_uniqueidno  = $_GET ["emis_uniqueidno"];
  if($emis_uniqueidno!="" ){ 

    $this->load->database(); 
    $this->load->model('Apimodel');
    $stuprofile = $this->Apimodel->getstuprofile($emis_uniqueidno);


    if($stuprofile)
    {
     $data['results']=$stuprofile;
 	}
 	else
 	{
 		$response = array( 
                        'status'    => FALSE,
                        'Message'   => 'Invalid Student id, Please try again with valid id.'         
                       );
      $data['results']=$response;
 	}

          echo json_encode($data);
  
      }else{
      $response = array( 
                        'status'    => FALSE,
                        'Message'   => 'Invalid Student id, Please try again with valid id.'         
                       );
      $data['results']=$response;
          echo json_encode($data);
      }

     }else{
      $response1 = array( 
          'status'    => FALSE,
          'Message'   => 'Invalid Credentials, Please try again with valid key.'   
         );
    $data1['results']=$response1;
    echo json_encode($data1);
      }

   }
  


} ?>