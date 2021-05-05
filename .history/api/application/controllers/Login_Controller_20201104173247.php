<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// require_once APPPATH . '/libraries/Auth.php';
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          
 * @license         MIT
 * @link            
 */

/** Commited Date
 * 
 */
class Login_Controller extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['login_post']['limit'] = 10000; // 100 requests per hour per user/key
        $this->load->model('Login_model','login_model');
        // $this->load->library('auth');
        $this->load->helper('rest_generate_helper');
    }

   

    /**
     * Login API For All Level
     * VIT-sriram
     * 19/08/2019
     * Parms(username,password)
     */

    public function login_post()
    {   
		$records = $this->post('records');
		
		 $loginDetails = $this->login_model->login($records);// Check if the users data store 
        if ($loginDetails['Status'])
            {
                $result         = $loginDetails['result'];
                $tokenData      = new ArrayObject();
                $type_name      = $this->login_model->get_category($result->emis_usertype);
                $tokenData      = $result;
                $tokenData->iat = strtotime("now");
                $tokenData->exp = strtotime("+30 days");
                $output['token'] = AUTHORIZATION::generateToken($tokenData);
                        $data['dataStatus'] = false;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['records'] = $output;
                        $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                        $data['dataStatus'] = true;
                        $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                        $data['message'] = $loginDetails['message'];
                        $this->response($data,REST_Controller::HTTP_OK);
            }
    }


    public function school_details_post()
    {


        $block_id = $this->post('block_id');
        // echo $block_id;die;
        $result = $this->observation_model->get_school_details($block_id);
        // print_r(json_encode($result));die;
        if(!empty($result))
        {
                        $data['dataStatus'] = true;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['records'] = $result;
                        $this->response($data,REST_Controller::HTTP_OK);
        }else
        {
                        $data['dataStatus'] = false;
                        $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                        $data['message'] = 'No Data';
                        $this->response($data,REST_Controller::HTTP_NO_CONTENT);
        }


    }

    public function login_password_reset_post()
  {
    $this->load->model('Login_model');
    $key = 'EMIS_web@2019_api';
    $get_token_det=explode(".",getallheaders()['Token']);
    $token = json_decode(base64_decode($get_token_det[1]),true);
 
    $emis_loggedin=$token['status'];
     $emis_usertype=$token['emis_usertype'];
    
    //print_r($token);
   
    if($emis_loggedin == "Active") 
    {
          $newpass = $this->post('new_password');
          $oldpass = $this->post('old_password');
          $reset_data=array('emis_password'=>md5($newpass),'temp_log'=>1,'ref'=>$newpass);

          //State
        if($emis_usertype == 5)
        {
          $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
         
        }
       //CEO
        else if($emis_usertype == 9)
        {
         $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
          
        }
         //DEO
        else if($emis_usertype == 10)
        {
         $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
          
        }
        //BEO
        else if($emis_usertype == 6)
        {
         $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
         
        }
        //Block
        else if($emis_usertype == 2)
        {
         $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
          
        }
        //School
        else if($emis_usertype == 1)
        {
         $emis_user_id =$token['emis_user_id'];
         $username=$token['emis_username'];
        
        }
        //DC
        else if($emis_usertype == 3)
        {
         $emis_user_id =$token['emis_user_id'];
         $username=$token['emis_username'];
        }
        //user emis
        else if($emis_usertype == 20)
        {
          $emis_user_id =$token['emis_user_id'];
         $username=$token['emis_username'];
        }
        //admin emis
        else if($emis_usertype == 21)
        {
          $emis_user_id =$token['emis_user_id'];
          $username=$token['emis_username'];
        }


      $result_data  = $this->Login_model->emis_state_resetpassword($emis_usertype,$oldpass,$emis_user_id,$username,$reset_data);

      if(!empty($result_data))
        {
                        $data['dataStatus'] = true;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['message'] = "Password Reset Successfully!!";
                        $this->response($data,REST_Controller::HTTP_OK);
        }
        else
        {
                        $data['dataStatus'] = false;
                        $data['status'] = REST_Controller::HTTP_OK;
                        $data['message'] = 'Old Password Not Exists! Try Again!!';
                        $this->response($data,REST_Controller::HTTP_OK);
        }

    }
    else
        {
                        $data['dataStatus'] = false;
                        $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                        $data['message'] = 'No Data';
                        $this->response($data,REST_Controller::HTTP_NO_CONTENT);
        } 
  }


    



}
