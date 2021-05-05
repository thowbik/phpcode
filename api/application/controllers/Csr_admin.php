<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Csr_admin extends REST_Controller
{

        function __construct()
        {
                 parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Schools_homemodel');
                $this->load->model('Csradmin_model');
                 $this->load->model('AllApproveModel');
                 $this->load->model('Authmodel');
                 $this->load->library('upload');
                 $this->load->helper('url','file','form');
                 $this->load->helper('text');
                 $this->load->library('AWS_S3');
                // $autoload['helper'] = array('url', 'file', 'form');
        }



 

    public function CsrDashboard_post(){
            $dashboard['dash_det'] = $this->Csradmin_model->get_pending_details_users();

      if(!empty($dashboard))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $dashboard ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
     
     
    }
    public function CsrUsersListPage_post()
    {
         $csr_data = $this->Csradmin_model->get_csr_user_list();

         if(!empty($csr_data))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $csr_data ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   

    }


    public function CsrUsersContributionWiseDetails_post()
    {
        
       $user_id = $this->post();
        $user_contribution['user_contribution'] = $this->Csradmin_model->get_user_contribution_detials($user_id['id']);
        if(!empty($user_contribution))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $user_contribution ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
    
    }

     public function SchoolNeedsCsrList_post()
    {
          $csr['csr_needs'] = $this->Csradmin_model->get_csr_need_list();
            if(!empty($csr))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $csr ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
     
       
    
    }
    public function SchoolNeedsCsrDistrictWise_post()
    {
      $district_id = $this->post();
       $csr['csr_needs_district_wise'] = $this->Csradmin_model->get_csr_need_list_district_wise($district_id['district_id']);
        if(!empty($csr))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $csr ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
     
    }
    public function SchoolNeedsCsrBlockWise_post()
    {
      $block_id = $this->post();
       $csr['csr_needs_block_wise'] = $this->Csradmin_model->get_csr_need_list_block_wise_school($block_id['block_id']);
        if(!empty($csr))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $csr ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
     
    }


   



}

//***********************************************************************

?>