<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class Externalapi extends REST_Controller {

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
       header('Content-type: application/json');

  }
   
      public function attendancesource_get()
   {

      if(isset($_GET ["emis_udisecode"])){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $school_id  = $_GET ["school_id"];
  if($emis_udisecode!=""){ 

    $this->load->database(); 
  $this->load->model('Mob_model');
    

    $standardlist  = $this->Mob_model->getallstandardsbyschool($school_id);
    
                      $finaloutput = array();
                      $finaloutput1 = array();

                       $output=array();
                       $lowclass = intval($standardlist[0]->low_class);
                       $highclass = intval($standardlist[0]->high_class);

                      $newans  = $this->Mob_model->getallbrachesbyschoolinchildetail_idcard($school_id);

                         foreach ($newans as $newans) 
                         {   
                            $output[$newans->class_studying_id]=$newans->count;             
                         }

                         for($i=$lowclass;$i<=$highclass;$i++)
                          {
                            if(isset($output[$i]) &&  $output[$i] != "")
                            {
                             $finaloutput['class'] = $i;
                             $finaloutput['strength'] = $output[$i];
                            array_push($finaloutput1,$finaloutput);

                            }       
                            else{
                              $finaloutput['class'] = $i;
                             $finaloutput['strength'] = "0";
                             array_push($finaloutput1,$finaloutput);
                            }           
                          }
                
                      $data1['results']=$finaloutput1;
                      echo json_encode($data1);

      }else{
      $response = array( 
                        'status'    => FALSE,
                        'Message'   => 'Udisecode id empty, Please Enter Valid Udisecode id.'         
                       );
      $data['results']=$response;
          echo json_encode($data);
      }

     }else{
      $response1 = array( 
          'status'    => FALSE,
          'Message'   => 'Invalid inputs! Please try again later!'   
         );
    $data1['results']=$response1;
    echo json_encode($data1);
      }
   }

   
      public function emis_login_post(){

        if(isset($_POST ["username"]) && isset($_POST ["password"]) && $_POST ["username"]!=""  && $_POST ["password"]!="")
        {
                date_default_timezone_set('Asia/Calcutta');
                $date=date('Y-m-d');       
                $this->load->library('session');
                $this->load->helper(array('form', 'url'));
                  
                $data = array(
                  'identity' => $_POST ["username"],
                  'password' =>  md5($_POST ["password"])
                  );

                $this->load->database(); 
                $this->load->model('Authmodel');    
                $loginauth = $this->Authmodel->loginverfication($data); 

                $usernameverfication = $this->Authmodel->usernameverfication($data);
                $login_date = "";
                        if($usernameverfication)
                        {
                        foreach($usernameverfication as $res)
                          {
                              $login_date    = $res->login_date;
                                $login_attempt = $res->login_attempt; 
                          }
                        }

                        if(($login_date == $date) && ($login_attempt >= 5))
                        {
                        //  $data = array(
                        //  'warningmessage' => 'Your Login Attempt Limit exceeded today, Please try again tomorrow'
                        //  );  
                        // $data['training']= $this->Candidatemodel->getalltrainings($date);
                      //       $this->load->view('web/training',$data);
                        $response1 = array( 
                                  'Message'   => 'Your Login Attempt Limit exceeded today, Please try again tomorrow'         
                                 );
                        $data1=array('error'=>1,'msg' => $response1);


                        echo json_encode($data1);

                        }
                        else
                        {

                        if($loginauth)
                        {  
                          foreach($loginauth as $loginauth)
                          {


                           if($loginauth->status == 'Active')
                        {  
                      
                          $emisusertype=$loginauth->emis_usertype;
                          $emisuserid=$loginauth->emis_user_id;

                          $name="";
                              $mail="";
                              $mobile="";
                              $time=date('H-i-s');
                              $datetime=$date.' '.$time;
                              $this->load->model('Authmodel');
                              $this->load->model('Mob_model');
                              $data=array('logged_in'=>$datetime,'login_date'=>$date,'login_attempt'=>0);
                              $this->Authmodel->update_log_status($emisuserid,$data);


                              if($emisusertype==1) { $usertype = 'SCHOOL'; }
                              else if($emisusertype==2) { $usertype = 'BLOCK'; }
                              else if($emisusertype==3) { $usertype = 'DISTRICT'; }
                              else if($emisusertype==4) { $usertype = 'EDUDISTRICT'; }
                              else if($emisusertype==5) { $usertype = 'STATE'; }
                              $schooldetails = $this->Authmodel->getschooldetails($emisuserid);
                              $attendance     = $this->Mob_model->attendancedata($emisuserid);

                                if($attendance)
                                {
                                   $txtShSes1     =  $attendance[0]->session_1;  
                                   $txtShSes2      =  $attendance[0]->session_2;  
                                  $txtShLUpDt      =  $attendance[0]->date;

                                }
                                else
                                {
                                   $txtShSes1     =  "";  
                                   $txtShSes2      =  "";  
                                  $txtShLUpDt      =  "";
                                }


                               $response1 = array( 
                                  
                                  'Message'         => 'Login Successfully',

                                  'id'              =>  $schooldetails[0]->id,
                                  'txtShId'         =>  $emisuserid,
                                  'txtShName'       =>  $schooldetails[0]->school_name,
                                  'txtShNameTm'     =>  $schooldetails[0]->school_name_tamil,
                                  'txtShCode'       =>  $schooldetails[0]->udise_code,                                  
                                  'address'         =>  $schooldetails[0]->address,      
                                  'pincode'         =>  $schooldetails[0]->pincode,      
                                  'mobile'          =>  $schooldetails[0]->mobile,      
                                  'sch_email'       =>  $schooldetails[0]->sch_email,      

                                  'txtShSes1'       =>  $txtShSes1,
                                  'txtShSes2'       =>  $txtShSes2,
                                  'txtShLUpDt'      =>  $txtShLUpDt, 

                                  'logintype'       =>  $usertype
                                 );
                            $data1=array('error'          => 0,'msg' => $response1);
                            echo json_encode($data1);

                              }
                          else
                          {
                        $response1 = array( 
                                  'Message'   => 'Your district schools has been locked today, please login tomorrow..!'         
                                 );
                         $data1=array('error'          => 1,'msg' => $response1);
                        echo json_encode($data1);
                          }


                          }

                         
                        }
                        else
                        {  
                          $this->load->model('Authmodel');    
                            $usernameverfication = $this->Authmodel->usernameverfication($data);  
                            if($usernameverfication){

                            foreach($usernameverfication as $res)
                                {
                                    $this->load->model('Authmodel');
                                    $getcandidatelogindata = $this->Authmodel->getuserlogindata($res->emis_user_id);
                                        $attemptcount = "";

                                        if($getcandidatelogindata){
                                        foreach($getcandidatelogindata as $getcandidatelogindata){
                                          if($getcandidatelogindata->login_date != $date)
                                          {   $attemptcount =  0;  }
                                           else {
                                            $attemptcount =  $getcandidatelogindata->login_attempt;  }                    
                                        }

                                        $data=array('login_date'=>$date,'login_attempt'=>($attemptcount+1));

                                         $this->Authmodel->update_log_status($res->emis_user_id,$data);
                                      }
                                    }
                                    }
                                   
                        $response1 = array( 
                                  'Message'   => 'Username or Password Invalid, Please try again...'         
                                 );
                        $data1=array('error'          => 1,'msg' => $response1);
                        echo json_encode($data1);
                        }   

                        }

      }else{

        $response1 = array( 
                 'Message'   => 'Invalid crendtials, Please Enter Valid Credentials..'        
                 );
       $data1=array('error'          => 1,'msg' => $response1);
        echo json_encode($data1);
      }

      }
       



}
?>

