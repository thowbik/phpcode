<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class RTE extends REST_Controller
{

        function __construct()
        {
                 parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Schools_homemodel');
                 $this->load->model('AllApproveModel');
                 $this->load->model('Authmodel');
		         		 $this->load->model('Rtemodel');
                 $this->load->library('upload');
                 $this->load->helper('url','file','form');
                 $this->load->helper('text');
                 $this->load->library('AWS_S3');
	      			   $this->load->library('AWSBucket');
				        date_default_timezone_set('Asia/Kolkata'); 
                 // $autoload['helper'] = array('url', 'file', 'form');
        }



  public function RTE_ApplicationStatus_get()
  {
      $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
    

      if($emislogin == "Active")
      {

       $district_id = $this->get('district_id');
       if($emis_usertype == 3 || $emis_usertype == 19)
        {
            $token_district_id = $token['emis_user_id'];
        }
        else if($emis_usertype == 9)
        {
           $token_district_id = $token['district_id'];
        }
         //For CEO LOGIN
       
       
        if($emis_usertype == 9 || $emis_usertype == 3 || $emis_usertype ==19)
        {
          
           if($district_id!="")
           {
            $dist=$district_id; 
           }
           else
           {
            $dist=$token_district_id; 
           }
        }


     //For STATE 
        if($emis_usertype == 5)
        {
         
          if($district_id !="")
          {
            $dist=$district_id;
           
          }
          else
          {
            
            $dist = "";
           
          } 

        }
        
        
       $RTE['Application_status'] = $this->Rtemodel->rte_application_status($dist);
      
       if(!empty($RTE))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $RTE ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   

     
     }

  }

  public function RTE_TypeWiseApplicationsss_get()
  {
      $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
     

      if($emislogin == "Active")
      {
        


     //For STATE LOGIN
        
     
        
       $RTE['Type_wise_application'] = $this->Rtemodel->rte_typewise_application($dist);
       $this->response(['dataStatus' => true,
       'status'  => REST_Controller::HTTP_OK,
       'result'  => $RTE ],REST_Controller::HTTP_OK);
       
     
     }

  }

  public function RTE_TypeWiseApplication_get()
  {
      $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
     

      if($emislogin == "Active")
      {
        if($emis_usertype == 3 || $emis_usertype == 19)
        {
            $token_district_id = $token['emis_user_id'];
        }
        else if($emis_usertype == 9)
        {
           $token_district_id = $token['district_id'];
        }

         //For CEO LOGIN AND DC
         $district_id = $this->get('district_id');


        if($emis_usertype == 9 || $emis_usertype == 3  || $emis_usertype == 19)
        {
          
           if($district_id!="")
           {
            $dist=$district_id; 
           }
           else
           {
            $dist=$token_district_id; 
           }
        }


     //For STATE LOGIN
        if($emis_usertype == 5)
        {
         
          if($district_id !="")
          {
            $dist=$district_id;
           
          }
          else
          {
            $dist = "";

           
          } 

        }
     
        
       $RTE['Type_wise_application'] = $this->Rtemodel->rte_typewise_application($dist);
      
       if(!empty($RTE))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $RTE ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   

     
     }

  }

  public function RTE_Application_Verification_get()
  {
    $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
      $token_district_id = $token['district_id'];
    
      if($emislogin == "Active")
      {
         $register_no = $this->get('register_no');
         if($emis_usertype == 9 || $emis_usertype == 19)
         {
           $RTE['get_verification_student_list'] = $this->Rtemodel->get_list_of_student($register_no,$token_district_id);
              if(!empty($RTE['get_verification_student_list']))
                {
                   $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $RTE['get_verification_student_list'] ],REST_Controller::HTTP_OK);     
                }
    
             else
               {
                  $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'NO Data FOund!!',],REST_Controller::HTTP_BAD_REQUEST);
                } 

          }
      }

  }

  public function RTEStudentData_Retrive_get()
  {
    $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
      $token_district_id = $token['district_id'];
      $school_type_id=$token['school_type_id'];
      $school_id=$token['school_id'];

    
      if($emis_usertype == 1)
      {
         $register_no = $this->get('register_no');

         if($school_type_id == 3)
         {
          if(!empty($register_no))
          {
              $seats_available = $this->Rtemodel->seats_available_in_schl($school_id);
              if($seats_available>'0'){
                  $RTE['RTE_STUDENT_DATA'] = $this->Rtemodel->RTE_Students_list($register_no);    
                  if(!empty($RTE['RTE_STUDENT_DATA']) && ($RTE['RTE_STUDENT_DATA'] != 1)){ 
                          $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                          'message' => 'Candidate Eligible',
                        'result'  =>  $RTE['RTE_STUDENT_DATA'] ],REST_Controller::HTTP_OK);     
                  }else if($RTE['RTE_STUDENT_DATA'] == 1){
                          $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_OK,
                          'message' => 'Student Already Registered!!'],REST_Controller::HTTP_OK);   
                  }else{
                          $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_OK,
                          'message' => 'Candidate Not Eligible',],REST_Controller::HTTP_OK);
                  } 
              }else{
                  $this->response(['dataStatus' => false,
                  'status'  => REST_Controller::HTTP_OK,
                  'message' => 'All RTE Seats filled',],REST_Controller::HTTP_OK);
        
              }
           
          }
           else
               {
                  $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'paramsa missing!! ',],REST_Controller::HTTP_BAD_REQUEST);
                } 
           
          }
           else
               {
                  $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'School Type Id Mismatched!!!!!! ',],REST_Controller::HTTP_BAD_REQUEST);
                } 
           

      }
      else
               {
                  $this->response(['dataStatus' => true,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Token Mismatched!!!!!! ',],REST_Controller::HTTP_BAD_REQUEST);
                } 
  }
  public function RTE_Update_App_verification_post()
  {
    $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
       $emis_usertype=$token['emis_usertype'];
      if($emislogin == "Active")
      {
         $records = $this->post('records');


         if($emis_usertype == 9)
         {
          $RTE['update_verification_student_list'] = $this->Rtemodel->update_verfication_student($records);
          if(!empty($RTE))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                   'message'=>"Updated Data Successfully",      
                            'result'  => $RTE['update_verification_student_list'] ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   
         }

      }
  }

  /**RTE reports by wesley(Don't remove it)**/
  public function rte_report_get()
  {
      $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
    
      $schl_id = $this->get('school_id');

      if($emislogin == "Active")
      {         
        if($emis_usertype == 3 || $emis_usertype == 19)
        {
            $district_id=$token['emis_user_id'];
        }
        else if($emis_usertype == 9)
        {
           $district_id=$token['district_id'];
        }
          $rte_report = $this->Rtemodel->get_rte_report($schl_id,$district_id);
          if(!empty($rte_report)){      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,     
                            'result'  => $rte_report],REST_Controller::HTTP_OK);     
          }else{
            $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'Data Not Available.',],REST_Controller::HTTP_BAD_REQUEST);
          }
      }
  }
   /**RTE reports by wesley(Don't remove it)**/
   /**RTE available seats(Don't remove it)**/
  public function rte_seats_get()
  {
      $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
      $schl_id = $token['school_id'];

      if($emislogin == "Active")
      {         
          $result = $this->Rtemodel->seats_available_in_schl($schl_id);
          if($result>'0'){      
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,     
                             'tot_rte_seats'  => $result],REST_Controller::HTTP_OK);     
          }else{
            $this->response(['dataStatus' => true,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'RTE seats filled',],REST_Controller::HTTP_BAD_REQUEST);
          }
      }
  }
   /**RTE available seats(Don't remove it)**/
//***********************************************************************

//By NIrmal Startet Here 

   public function RTEAllot_Status_post()
   {

    $records = $this->post('records');
     $result = $this->Rtemodel->rte_allotstatus_change($records);
       if($result>'0'){      
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,     
                             'message'  => 'Alloted Student SuccessFuly!!!',
                             'data' =>$result ],REST_Controller::HTTP_OK);     
          }else{
            $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'NO Reg No or School_id For Allotement',],REST_Controller::HTTP_OK);
          }

   }
   public function RTE_DC_SchoolList_get()
   {
    $key = 'EMIS_web@2019_api';
      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true); 
      $emislogin=$token['status'];
      $emis_usertype=$token['emis_usertype'];
      $district_id = $token['emis_user_id'];
      if($emis_usertype == 3  || $emis_usertype == 19)
      {
         $result = $this->Rtemodel->rte_Dc_schoolList($district_id);
        if($result>'0'){      
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_OK,     
                             'message'  => 'Data Available!!!',
                              'result'=>$result ],REST_Controller::HTTP_OK);     
          }else{
            $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'Data Not Availble!!',],REST_Controller::HTTP_OK);
          }
      }
      else{
            $this->response(['dataStatus' => false,
                              'status'  => REST_Controller::HTTP_OK,
                              'message' => 'Token mismatched',],REST_Controller::HTTP_BAD_REQUEST);
          }
          




   }





}
?>
