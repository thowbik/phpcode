<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

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
    $this->load->model('Homemodel');
    $this->load->model('Datamodel');
     $this->load->model('Authmodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel'); 
    $this->load->model('Blockmodel');

  
  }


  function isValidLongitude($longitude){
    if(preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/",
      $longitude)) {
       return true;
    } else {
       return false;
    }
  }

    function isValidLatitude($latitude){
    if (preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $latitude)) {  
          return TRUE;
    } else {
         return FALSE;
    }
  }

  
  public function emis_login(){

        if(isset($_GET ["username"]) && isset($_GET ["password"]) && $_GET ["username"]!=""  && $_GET ["password"]!=""){
    date_default_timezone_set('Asia/Calcutta');
    $date=date('Y-m-d');       
    $this->load->library('session');
    $this->load->helper(array('form', 'url'));
      
    $data = array(
      'identity' => $_GET ["username"],
      'password' =>  md5($_GET ["password"])
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
              'status'    => FALSE,
              'Message'   => 'Your Login Attempt Limit exceeded today, Please try again tomorrow'         
             );
    $data1['results']=$response1;
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
          $data=array('logged_in'=>$datetime,'login_date'=>$date,'login_attempt'=>0);
          $this->Authmodel->update_log_status($emisuserid,$data);
          $schooldetails = $this->Authmodel->getschooldetails($emisuserid);

           $response1 = array( 
              'status'    => TRUE,
              'Message'   => 'Login Successfully',
              'emisuserid'=>  $emisuserid,
              'udisecode' =>  $schooldetails[0]->udise_code
             );
        $data1['results']=$response1;
        echo json_encode($data1);

          }
      else
      {
    $response1 = array( 
              'status'    => FALSE,
              'Message'   => 'Your district schools has been locked today, please login tomorrow..!'         
             );
    $data1['results']=$response1;
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
              'status'    => FALSE,
              'Message'   => 'Username or Password Invalid, Please try again...'         
             );
    $data1['results']=$response1;
    echo json_encode($data1);
    }   

    }

  }else{

    $response1 = array( 
              'status'    => FALSE,
             'Message'   => 'Invalid crendtials, Please Enter Valid Credentials..'        
             );
    $data1['results']=$response1;
    echo json_encode($data1);
  }

  }

  public function emis_schoolprofile()   
    {
    
            if(isset($_GET ["emis_udisecode"])){
          $emis_udisecode  = $_GET ["emis_udisecode"];
          if($emis_udisecode!=""){             
            $this->load->database(); 
          $this->load->model('Mob_model');
            $schoolprofile= $this->Mob_model->getschoolprofiledetails($emis_udisecode);

            $response1 = array();

            if(!empty($schoolprofile)){

            $school_id  = $schoolprofile[0]->school_id;
            $schoolname  = $schoolprofile[0]->school_name;
            $udise_code  = $schoolprofile[0]->udise_code;
            $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
            $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
            $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
            $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);
            $schcategory = $this->Datamodel->getmanagecateid($schoolprofile[0]->school_id);
            $manage_name= $schcategory[0]->manage_name;

            $response1=array(
                          'school_id'=>$school_id,
                          'schoolname'=>$schoolname,
                           'udisecode'=>$udise_code,
                           'blockname'=>$blockname,
                           'schoolcate'=>$schoolcate,
                           'schmanage'=>$schmanage,
                           'schdirector'=>$schdirector,
                           'manage_name'=>$manage_name);

          }else{
           $response1 = array( 
                          'status'    => FALSE,
                          'Message'   => 'No data available!'         
                         );
          }


            $data1['results']=$response1;
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


      public function emisstu_getdataclasslist(){


          if(isset($_GET ["emis_udisecode"]))
          {
              $emis_udisecode  = $_GET ["emis_udisecode"];
              $school_id  = $_GET ["school_id"];
              if($emis_udisecode!=""){ 

                      $this->load->database(); 
                      $this->load->model('Mob_model');

                      $standardlist  = $this->Mob_model->getallstandardsbyschool($school_id);
                      // $classlist = $this->Mob_model->getclasslistsplit($standardlist[0]->low_class,$standardlist[0]->high_class);

                      $finaloutput = array();
                      $finaloutput1 = array();

                       $output=array();
                       $lowclass = intval($standardlist[0]->low_class);
                       $highclass = intval($standardlist[0]->high_class);

                      $newans  = $this->Mob_model->getallbrachesbyschoolinchildetail_stu2($school_id);

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

              } else
              {
                $response = array( 
                                    'status'    => FALSE,
                                    'Message'   => 'Udisecode id empty, Please Enter Valid Udisecode id.'         
                                   );
                  $data['results']=$response;
                  echo json_encode($data);
              }

          }else
          {
              $response1 = array( 
                  'status'    => FALSE,
                  'Message'   => 'Invalid inputs! Please try again later!'   
                 );
              $data1['results']=$response1;
              echo json_encode($data1);
          }

   }



   public function emisstu_getdatasectionlist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"])){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $school_id  = $_GET ["school_id"];
  if($emis_udisecode!="" || $emis_class!=""){ 

    $this->load->database(); 
    $this->load->model('Mob_model');

    $sections  = $this->Mob_model->getallsectionsbyclass($school_id,$emis_class);

    $a=array();
    $cste=array();
    if($sections!=""){ $a=explode(',',$sections); 

    $counta = count($a);

    $strength =  $this->Mob_model->getallsectionstrengthsbyclass_stu($school_id,$emis_class);
   
     $output=array();
     $finaloutput = array();
     $finaloutput1 = array();

                    foreach ($strength as $strength) 
                         {   
                            $output[$strength->class_section]=$strength->count;             
                         }
                        
                 for($i=0;$i<$counta;$i++)
                  {
                    if(isset($output[$a[$i]]) &&  $output[$a[$i]] != "")
                    {
                     $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = $output[$a[$i]];
                    array_push($finaloutput1,$finaloutput);

                    }       
                    else{
                      $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = "0";
                     array_push($finaloutput1,$finaloutput);
                    }           
                  }

    $data1['results']=$finaloutput1;
    echo json_encode($data1);


        }else{
           $response = array( 
                              'status'    => FALSE,
                              'Message'   => 'No section Availale..'         
                             );
            $data['results']=$response;
            echo json_encode($data);
        }

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


 public function emisstu_getdatastulist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"]) && isset($_GET ["emis_section"]) ){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $emis_section = $_GET ["emis_section"];
  $school_id  = $_GET ["school_id"];

  if($emis_udisecode!="" || $emis_class!="" || $emis_section!=""){ 

    $this->load->database(); 
    $this->load->model('Mob_model');
    $allstuds  = $this->Mob_model->getallstudsbyclsecnew_stu($school_id,$emis_class,$emis_section);

     $data['results']=$allstuds;
          echo json_encode($data);
   
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

   public function emis_getdataclasslist(){


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



   public function emis_getdatasectionlist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"])){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $school_id  = $_GET ["school_id"];
  if($emis_udisecode!="" || $emis_class!=""){    

    $this->load->database(); 
    $this->load->model('Mob_model');

    $sections  = $this->Mob_model->getallsectionsbyclass($school_id,$emis_class);

    $a=array();
    $cste=array();
    if($sections!=""){ $a=explode(',',$sections); 

    $counta = count($a);

    $strength =  $this->Mob_model->getallsectionstrengthsbyclass($school_id,$emis_class);
   
     $output=array();
     $finaloutput = array();
     $finaloutput1 = array();

                    foreach ($strength as $strength) 
                         {   
                            $output[$strength->class_section]=$strength->count;             
                         }
                        
                 for($i=0;$i<$counta;$i++)
                  {
                    if(isset($output[$a[$i]]) &&  $output[$a[$i]] != "")
                    {
                     $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = $output[$a[$i]];
                    array_push($finaloutput1,$finaloutput);

                    }       
                    else{
                      $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = "0";
                     array_push($finaloutput1,$finaloutput);
                    }           
                  }

    $data1['results']=$finaloutput1;
    echo json_encode($data1);

        }else{
           $response = array( 
                              'status'    => FALSE,
                              'Message'   => 'No section Availale..'         
                             );
            $data['results']=$response;
            echo json_encode($data);
        }

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


 public function emis_getdatastulist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"]) && isset($_GET ["emis_section"]) ){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $emis_section = $_GET ["emis_section"];
  $school_id  = $_GET ["school_id"];
  if($emis_udisecode!="" || $emis_class!="" || $emis_section!=""){ 

    $this->load->database(); 
    $this->load->model('Mob_model');


    $allstuds  = $this->Mob_model->getallstudsbyclsecnew($school_id,$emis_class,$emis_section);

     $data['results']=$allstuds;
          echo json_encode($data);
   
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


 public function emis_getidcardclasslist(){


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

                      $newans  = $this->Mob_model->getallbrachesbyschoolinchildetail_idcard1($school_id);

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



   public function emis_getidcardsectionlist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"])){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $school_id  = $_GET ["school_id"];
  if($emis_udisecode!="" || $emis_class!=""){ 

    $this->load->database(); 
    $this->load->model('Mob_model');


$sections  = $this->Mob_model->getallsectionsbyclass($school_id,$emis_class);

    $a=array();
    $cste=array();
    if($sections!=""){ $a=explode(',',$sections); 

    $counta = count($a);

    $strength =  $this->Mob_model->getallsectionstrengthsbyclass1($school_id,$emis_class);
   
     $output=array();
     $finaloutput = array();
     $finaloutput1 = array();

                    foreach ($strength as $strength) 
                         {   
                            $output[$strength->class_section]=$strength->count;             
                         }
                        
                 for($i=0;$i<$counta;$i++)
                  {
                    if(isset($output[$a[$i]]) &&  $output[$a[$i]] != "")
                    {
                     $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = $output[$a[$i]];
                    array_push($finaloutput1,$finaloutput);

                    }       
                    else{
                      $finaloutput['section'] = $a[$i];
                     $finaloutput['strength'] = "0";
                     array_push($finaloutput1,$finaloutput);
                    }           
                  }

    $data1['results']=$finaloutput1;
    echo json_encode($data1);


        }else{
           $response = array( 
                              'status'    => FALSE,
                              'Message'   => 'No section Availale..'         
                             );
            $data['results']=$response;
            echo json_encode($data);
        }

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


 public function emis_getidcardstulist(){


      if(isset($_GET ["emis_udisecode"]) && isset($_GET ["emis_class"]) && isset($_GET ["emis_section"]) ){
  $emis_udisecode  = $_GET ["emis_udisecode"];
  $emis_class  = $_GET ["emis_class"];
  $emis_section = $_GET ["emis_section"];
  $school_id  = $_GET ["school_id"];

  if($emis_udisecode!="" || $emis_class!="" || $emis_section!=""){ 

    $this->load->database(); 
    $this->load->model('Mob_model');

    $allstuds  = $this->Mob_model->getallstudsbyclsecnew1($school_id,$emis_class,$emis_section);

     $data['results']=$allstuds;
          echo json_encode($data);
   
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


 public function emis_getstudetails(){

      if(isset($_GET ["emis_udisecode"]) ){
  $emis_uniqueidno  = $_GET ["emis_uniqueidno"];
  if($emis_uniqueidno!="" ){ 

    $this->load->database(); 
    $this->load->model('Mob_model');
    $stuprofile = $this->Mob_model->getstuprofile($emis_uniqueidno);

    foreach($stuprofile as $key)
      {    $photo1 = base_url().'asset/photograph/'.$key->photo; }
    

     $data['results']=$stuprofile;
     $data['photourl'] = $photo1;
          echo json_encode($data, JSON_UNESCAPED_SLASHES);
  
      }else{
      $response = array( 
                        'status'    => FALSE,
                        'Message'   => 'Permission Denied, Invalid Student id !'         
                       );
      $data['results']=$response;
          echo json_encode($data);
      }

     }else{
      $response1 = array( 
          'status'    => FALSE,
          'Message'   => 'Permission Denied, Invalid School user !'   
         );
    $data1['results']=$response1;
    echo json_encode($data1);
      }

   }



   public function getallgenders(){

    $allgenders1 = array('id'=>'1',
                        'gender'=>'Male');
    $allgenders2 = array('id'=>'2',
                        'gender'=>'Female');
    $allgenders3 = array('id'=>'3',
                        'gender'=>'Transgender');
    $totalarr = array();
    array_push($totalarr,$allgenders1);
    array_push($totalarr,$allgenders2);
    array_push($totalarr,$allgenders3);
    $data['results']=$totalarr;
    echo json_encode($data);
  
   }

    public function getallbloods(){

    $this->load->database(); 
    $this->load->model('Mob_model');
    $allbloods = $this->Mob_model->getallbloodgroups();
    $data['results']=$allbloods;
    echo json_encode($data);
  
   }


    public function getalldistrict(){

    $this->load->database(); 
    $this->load->model('Mob_model');
    $alldistrict = $this->Mob_model->getalldistrict();
    $data['results']=$alldistrict;
    echo json_encode($data);
  
   }

    public function getclassinschool()
    {
      if(isset($_GET ["emis_udisecode"]) )
      {
        $schoolid  = $_GET ["emis_udisecode"];
          $this->load->database(); 
          $this->load->model('Mob_model');

          $getclasses = $this->Mob_model->getclasses($schoolid);
          $data['results']=$getclasses;
          echo json_encode($data);
      }
      else
      {
          $response1 = array( 
              'status'    => FALSE,
              'Message'   => 'Permission Denied, Invalid School user!'   
             );
          $data1['results']=$response1;
          echo json_encode($data1);
      }  
   }

       public function getsectioninschool()
    {
      if(isset($_GET ["emis_udisecode"]) )
      {
        $schoolid  = $_GET ["emis_udisecode"];
        $class_id  = $_GET ["class_id"];
          $this->load->database(); 
          $this->load->model('Mob_model');

          $getsections = $this->Mob_model->getsections($schoolid,$class_id);
          $data['results']=$getsections;
          echo json_encode($data);
      }
      else
      {
          $response1 = array( 
              'status'    => FALSE,
              'Message'   => 'Permission Denied, Invalid School user!'   
             );
          $data1['results']=$response1;
          echo json_encode($data1);
      }  
   }



    public function emis_idcard_savestudentdata()
    {
  
          if(isset($_GET ["emis_udisecode"]) )
              {
                      $studentid=$this->input->get('emis_uniqueidno');

                      $date = date('Y-m-d');
                      $time = date('h:i:s');
                      $datetime = $date." ".$time;
                      $this->load->database(); 
                      $this->load->model('Homemodel');



                         if($this->input->post('v1')!="Aadhaar Enrollment not done")
                         {

                               $data33 =array('name'=>$this->input->get('emis_stu_name'),
                                          'gender'=>$this->input->get('emis_stu_gender'),
                                          'father_name'=>$this->input->get('emis_stu_fname'),
                                          'mother_name'=>$this->input->get('emis_stu_mname'),
                                          'guardian_name'=>$this->input->get('emis_stu_gname'),
                                          'aadhaar_uid_number'=>$this->input->get('emis_stu_aadhaar'),
                                          'enrollmentnumber'=>$this->input->get('emis_stu_enrolment'),
                                          'bloodgroup'=>$this->input->get('emis_stu_blood'),
                                          'adhaarappliedstatus'=>'Applied',
                                          'idcardstatus'=>'Not Aprooved',
                                          'idapproove'=>'0',
                                          'dob'=>$this->input->get('emis_stu_dob'),
                                          'class_studying_id'=>$this->input->get('emis_stu_class'),
                                          'class_section'=>$this->input->get('emis_stu_section'),
                                          'house_address' =>$this->input->get('emis_stu_add1'),
                                          'street_name'  =>$this->input->get('emis_stu_add2'),
                                          'area_village' =>$this->input->get('emis_stu_city'),
                                          'district_id'  =>$this->input->get('emis_stu_district'),
                                          'pin_code'  =>$this->input->get('emis_stu_pincode'));

                                     

                                   $this->Homemodel->saveidcardupdate($studentid,$data33);
                                   $data2=array('idcardstatus'=>'Not Aprooved',
                                                  'idapproove'=>'0');
                                    $this->Homemodel->saveidcardtableupdate($studentid,$data2);


                                  $response1 = array( 
                                            'status'    => TRUE,
                                            'Message'   => 'Successfully Updated'   
                                           );
                                        $data1['results']=$response1;
                                        echo json_encode($data1);

                         }
                           else
                         {

                                 $data44 =array('name'=>$this->input->get('emis_stu_name'),
                                          'gender'=>$this->input->get('emis_stu_gender'),
                                          'father_name'=>$this->input->get('emis_stu_fname'),
                                          'mother_name'=>$this->input->get('emis_stu_mname'),
                                          'guardian_name'=>$this->input->get('emis_stu_gname'),
                                          'aadhaar_uid_number'=>$this->input->get('emis_stu_aadhaar'),
                                          'enrollmentnumber'=>$this->input->get('emis_stu_enrolment'),
                                          'bloodgroup'=>$this->input->get('emis_stu_blood'),
                                          'adhaarappliedstatus'=>'Notapplied',
                                          'idcardstatus'=>'Not Aprooved',
                                          'idapproove'=>'0',
                                          'dob'=>$this->input->get('emis_stu_dob'),
                                          'class_studying_id'=>$this->input->get('emis_stu_class'),
                                          'class_section'=>$this->input->get('emis_stu_section'),
                                          'house_address' =>$this->input->get('emis_stu_add1'),
                                          'street_name'  =>$this->input->get('emis_stu_add2'),
                                          'area_village' =>$this->input->get('emis_stu_city'),
                                          'district_id'  =>$this->input->get('emis_stu_district'),
                                          'pin_code'  =>$this->input->get('emis_stu_pincode'));

                                $this->Homemodel->saveidcardupdate($studentid,$data44);
                                $data2=array('idcardstatus'=>'Not Aprooved',
                                                  'idapproove'=>'0');
                                    $this->Homemodel->saveidcardtableupdate($studentid,$data2);
                               $response1 = array( 
                                            'status'    => TRUE,
                                            'Message'   => 'Successfully Updated'   
                                           );
                                        $data1['results']=$response1;
                                        echo json_encode($data1);

                         }
              }        
              else
                {
                    $response1 = array( 
                        'status'    => FALSE,
                        'Message'   => 'Permission Denied, Invalid School user!'   
                       );
                    $data1['results']=$response1;
                    echo json_encode($data1);
                }
      }



    public function getidcarddataverfication()
    {
       if(isset($_GET ["emis_udisecode"]) )
              {

             $studentid =  $this->input->get('studentid');
             $this->load->database(); 
             $this->load->model('Homemodel');
             $stuprofile1  = $this->Homemodel->getstuprofile1($studentid);
             

             $grp1=2;  $grp2=2;  $grp3=2;  $grp4=2; $temp=1;

         

                 $name = $stuprofile1[0]->name;

                 $adhaar = $stuprofile1[0]->aadhaar_uid_number;
                 $enroll = $stuprofile1[0]->enrollmentnumber;
                 $notapplied = $stuprofile1[0]->adhaarappliedstatus;

                 $dob = $stuprofile1[0]->dob;
                 $gender = $stuprofile1[0]->gender;

                 $mother= $stuprofile1[0]->mother_name;
                 $father = $stuprofile1[0]->father_name;
                 $guardian = $stuprofile1[0]->guardian_name;

                 $class = $stuprofile1[0]->class_studying_id;
                 $section = $stuprofile1[0]->class_section;

                 $bloodgroup = $stuprofile1[0]->bloodgroup;
                 $photo = $stuprofile1[0]->photo;

                 $door = $stuprofile1[0]->house_address;
                 $street = $stuprofile1[0]->street_name;
                 $city = $stuprofile1[0]->area_village;
                 $district = $stuprofile1[0]->district_id;
                 $pincode = $stuprofile1[0]->pin_code;

                 if($adhaar!="" || $enroll!="" || $notapplied!="Not entered" ){
                   $grp1=0;
                 }

                 if($mother!="" || $father!="" || $guardian!=""){
                   $grp2=0;
                 }

                 if($name!="" && $gender!="" && $class!="" && $section!="" && $dob!="" && $class!="" && $section!="" && $door!="" && $street!="" && $city!="" && $district!="" && $pincode!="" ){
                   $grp3=0;
                 }

                 if($bloodgroup!="" && $photo!="" ){
                   $grp4=0;
                 }

                 //  if($bloodgroup!=""){
                 //   $grp4=0;
                 // }


                 if($grp1==0 && $grp2==0 && $grp3==0 && $grp4==0 ){
                  $data0=array('idcardstatus'=>'Aprooved');
                  $this->Homemodel->changeidcardapproovalstatus($studentid,$data0);
                 
                  $response1 = array( 
                        'status'    => TRUE,
                        'Message'   => 'Data Approved Successfully!'   
                       );
                    $data1['results']=$response1;
                    echo json_encode($data1);
                
                 }else{
                  $response1 = array( 
                        'status'    => FALSE,
                        'Message'   => 'Please fill all mandatory fields to complete data approval.'   
                       );
                    $data1['results']=$response1;
                    echo json_encode($data1);
                 }

             
           }

        else
                {
                    $response1 = array( 
                        'status'    => FALSE,
                        'Message'   => 'Permission Denied, Invalid School user!'   
                       );
                    $data1['results']=$response1;
                    echo json_encode($data1);
                }

        }
  

      public function getidcardidaproove()
      {
          if(isset($_GET ["emis_udisecode"]) )
              {
                $stuidlist =  $this->input->get('studentid');
                $data=array('idapproove'=>'1');
                $this->Homemodel->updateidcardidapproove($stuidlist,$data);

                $response1 = array( 
                        'status'    => TRUE,
                        'Message'   => 'Id card approved Successfully!'   
                       );
                    $data1['results']=$response1;
                    echo json_encode($data1);
            }
           else
            {
                $response1 = array( 
                    'status'    => FALSE,
                    'Message'   => 'Permission Denied, Invalid School user!'   
                   );
                $data1['results']=$response1;
                echo json_encode($data1);
            }
      }   


        public function savepic(){
          if(isset($_GET ["emis_udisecode"]) )
              {
                 $studentid =  $this->input->get('studentid');
                    $path= './asset/photograph/';
                  
                  if ( isset($_FILES['image']['name'])) {
                  
                       $target_path = $path . basename($_FILES['image']['name']);
                    
                       $image_name =  $_FILES['image']['name'];
                    
                    $response1 = array( 
                    'photo'    => $image_name  
                    );
                       $this->load->database();
                       $this->load->model('Mob_model');
                       $this->Mob_model->savestudentimage($studentid,$response1);
                    try {
                          
                        // Throws exception incase file is not being moved
                        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                            // make error flag true
                            echo json_encode(array('status'=>'fail', 'message'=>'could not move file'));
                        }
                        
                        // File successfully uploaded
                        echo json_encode(array('status'=>'success', 'message'=>'File Uploaded'));
                    } catch (Exception $e) {
                        // Exception occurred. Make error flag true
                        echo json_encode(array('status'=>'fail', 'message'=>$e->getMessage()));
                    }
                    
                    
                    } else {
                    // File parameter is missing
                    echo json_encode(array('status'=>'fail', 'message'=>'Not received any file'));
                   }  
              }
           else
            {
                $response1 = array( 
                    'status'    => FALSE,
                    'Message'   => 'Permission Denied, Invalid School user!'   
                   );
                $data1['results']=$response1;
                echo json_encode($data1);
            }   
        } 




    public function getmajorcounts()
    {
      if(isset($_GET ["emis_udisecode"]) )
      {
        $schoolid  = $_GET ["emis_udisecode"];

          $this->load->database(); 
          $this->load->model('Mob_model');

          $gettotalcount = $this->Mob_model->gettotalcount($schoolid);
          $getdataapproved = $this->Mob_model->getdataapprovalcount($schoolid);
          $getidapproved = $this->Mob_model->getidapprovalcount($schoolid);

    

          foreach($gettotalcount as $gettotalcount){
          $data['totalcount']=$gettotalcount->count; }

          if($getdataapproved){
          foreach($getdataapproved as $getdataapproved){
          $data['dataapprovedcount']=$getdataapproved->count; }
          }
          else
          {
          $data['dataapprovedcount']='0';     
          }

          if($getidapproved){
          foreach($getidapproved as $getidapproved){
          $data['idapprovedcount']=$getidapproved->count; }
          }
          else
          {
          $data['idapprovedcount']='0';     
          }

          echo json_encode($data);
      }
      else
      {
          $response1 = array( 
              'status'    => FALSE,
              'Message'   => 'Permission Denied, Invalid School user!'   
             );
          $data1['results']=$response1;
          echo json_encode($data1);
      }  
   }

       public function maintenacemode()
     {
          $this->load->database(); 
          $this->load->model('Mob_model');

          $maintenance = $this->Mob_model->maintenancemode();
          foreach($maintenance as $maintenance){
          $response1 = array( 
              'status'    => $maintenance->status,
              'description' => $maintenance->description  
             );
          }
          echo json_encode($response1);
     }


}?>