 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

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

	 function __construct() {
         parent::__construct();
         $this->load->library('session');
         $this->load->helper('form');
         $this->load->library('encrypt');
         $this->load->model('Authmodel');
        $this->load->database(); 
   		$this->load->model('Homemodel');

      }

// form validations
	 function alpha_dash_space($fullname){
		if (! preg_match('/^[a-zA-Z0-9\s]+$/', $fullname)) {
		$this->form_validation->set_message('alpha_dash_space', 
		  'The %s field may only contain alpha characters, numbers & White spaces');
		return FALSE;
		} else
		{
		return TRUE;
		}
	}

	function alpha_dash_space_dot($fullname){
		if (! preg_match('/^[a-zA-Z0-9\s.]+$/', $fullname)) {
		$this->form_validation->set_message('alpha_dash_space_dot', 
		  'The %s field may only contain alpha characters, numbers & White spaces');
		return FALSE;
		} else
		{
		return TRUE;
		}
	}

	function alpha_dash_space_comma($fullname){
		if (! preg_match('/^[a-zA-Z0-9\s,]+$/', $fullname)) {
		$this->form_validation->set_message('alpha_dash_space_comma', 
		  'The %s field may only contain alpha characters, numbers & White spaces');
		return FALSE;
		} else
		{
		return TRUE;
		}
	}

	function alpha_dash_space_comma_dot($fullname){
		if (! preg_match('/^[a-zA-Z0-9\s,.]+$/', $fullname)) {
		$this->form_validation->set_message('alpha_dash_space_comma_dot', 
		  'The %s field may only contain alpha characters, numbers & White spaces');
		return FALSE;
		} else
		{
		return TRUE;
		}
	}


   public function emis_login(){
    $this->load->library('form_validation');
   	$this->load->helper(array('form', 'url'));
	$this->load->library('session');
	$this->session->unset_userdata('logindetails');
	$loggedin = $this->session->userdata('emis_loggedin');
	if($loggedin)
		{		
			// echo "function in";die;
		  $temp_log = $this->session->userdata('emis_temp_log');
				
					// echo "if";
        

					// print_r($this->session->userdata());die;

					$usertypename = $this->session->userdata('emis_user_type_name');
					$emisusertype = $this->session->userdata('emis_user_type_id');
					$emis_usertype1 = $this->session->userdata('emis_block_id');
					$emisuserid = $this->session->userdata('emis_teacher_id');
					$emisuser_id = $this->session->userdata('emis_user_id');
					// echo $usertypename;
					if($usertypename=='school' && $emisusertype==1){
						if($temp_log ==0){
							redirect('home/emis_school_gotoredirect','refresh');
						}else{
					$schooldetails = $this->Authmodel->getschooldetails($emisuser_id);
					// print_r($schooldetails);die;
					if(($schooldetails[0]->high_class)>=10){ $this->session->set_userdata('emis_school_highclass',TRUE); }
					redirect('Home/emis_school_gotoredirect', 'refresh');}
					}else if($usertypename=='block' && $emisusertype==2){

					
					redirect('block/emis_block_home', 'refresh');
					}else if($emisusertype==6 && $emis_usertype1==1){
					   	
					    redirect('Beo_block/emis_block_home', 'refresh');
				    }else if($emisusertype==6 && $emis_usertype1==2){
				        
					    redirect('Beo_block/emis_block_home', 'refresh');
					}else if($emisusertype==6 && $emis_usertype1==3){
					   	
					    redirect('Beo_block/emis_block_home', 'refresh');
					}else if($usertypename=='CEO' && $emisusertype==9){
					    
					  	redirect('Ceo_District/emis_Ceo_District_dash', 'refresh');
				    }else if($usertypename=='COLLECTOR' && $emisusertype==16){
					    
					  	redirect('Collector/emis_Collector_dash', 'refresh');
					}else if($usertypename=='district' && $emisusertype==3){
						redirect('District/emis_district_dash', 'refresh');
					}else if($usertypename=='state' && $emisusertype==5){
					  	
					   redirect('state/baseDash', 'refresh');
					}else if($usertypename=='DEO' && $emisusertype==10){
						
						redirect('Deo_District/emis_Deo_District_dash','refresh');
					}else if($usertypename=='CORPORATION' && $emisusertype==15 && $emis_usertype1==1){
						
						redirect('Corporation/emis_district_dash','refresh');
				 }else if($usertypename=='CORPORATION' && $emisusertype==15 && $emis_usertype1==2){
						
						redirect('Corporation/emis_district_dash','refresh');
				 }else if($usertypename=='DC' && $emisusertype==19){
						
						redirect('DC/emis_district_dash','refresh');
				 }
                    else if($usertypename=='TEACHER' && $emisusertype==14)
					{
						// echo "if";die;
						$cat_check = $this->Authmodel->get_teaching_teacher_login($emisuserid);
						// print_r($cat_check);die;
						if($cat_check->category==1)
						{
							// echo "if";
					    $this->session->set_userdata('emis_teacher_id',$emisuserid);
                        $this->session->set_userdata('user_type',$emisusertype);
                        $this->session->set_userdata('emis_teacher_school_id',$cat_check->school_key_id);
                        // $this->session->set_userdata('temp_log',$loginauth->temp)
					  	redirect('Udise_staff/emis_Udise_staff_dash', 'refresh');

						}else
						{
							$data['error'] = 'This Teaching Staff only Login';
						}

					}
					else if($emisusertype==18) 
					{
						
					  	redirect('csr_admin_controller/CsrDash', 'refresh');

					}
					
                    else{
                    	// echo "else else";
                        $this->session->sess_destroy();  
                        redirect('/','refresh');
                    }

			
			}else
			{ $this->load->view('Auth/emis_login'); }

   }

 
	public function emis_login_verify()
	{
	       //die();
 		date_default_timezone_set('Asia/Calcutta');
		$date=date('Y-m-d');       
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('security');
		$this->load->library('form_validation');


        $this->form_validation->set_rules('emis_username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('emis_password', 'Password', 'trim|required|xss_clean');
           
		// print_r($this->input->post());
		if ($this->form_validation->run() == FALSE)
		{
			
 	      $this->load->view('Auth/emis_login');
		}
		else
		{	
			// print_r($this->input->post());die;
				$data = array(
					'identity' => $this->input->post('emis_username'),
					'password' => md5($this->input->post('emis_password'))
					);

				$this->load->database(); 
				$this->load->model('Authmodel');		
				$loginauth = $this->Authmodel->loginverfication($data);	
				// print_r($loginauth);die;
				$usernameverfication = $this->Authmodel->usernameverfication($data);
				$login_date = "";
				if($usernameverfication)
				{
					// echo "if";die;
				foreach($usernameverfication as $res)
					{
							$login_date    = $res->login_date;
						    $login_attempt = $res->login_attempt;	
					}
				}

				if(($login_date == $date) && ($login_attempt >= 5))
				{
			
				  $data['error']="Your Login Attempt Limit exceeded today, Please try again tomorrow";
		 	      $this->load->view('Auth/emis_login',$data);
				}
				else
				{
                
				if($loginauth)
				{  
					// echo "if";die;
					$usertypename="";
					$emisusertype="";
                    $emis_usertype1="";
					$emisuserid="";
					foreach($loginauth as $loginauth)
					{
					   $emisusertype=$loginauth->emis_usertype;
                       $emis_usertype1=$loginauth->emis_usertype1;
                       //print_r($emisusertype);die();
                      
					   $emisuserid=$loginauth->emis_user_id;
					   $this->load->model('Authmodel');
					   $usertypename=$this->Authmodel->getusertype($loginauth->emis_usertype);
					   $this->session->set_userdata('emis_loggedin','Active');	
					   $this->session->set_userdata('emis_user_id',$loginauth->emis_user_id);
					   $this->session->set_userdata('emis_username',$loginauth->emis_username);
					   $this->session->set_userdata('emis_user_type_id',$loginauth->emis_usertype);
                       $this->session->set_userdata('emis_usertype1',$loginauth->emis_usertype1);
					   $this->session->set_userdata('emis_user_type_name',$usertypename);
					   $this->session->set_userdata('emis_user_sno',$loginauth->sno);
					   $this->session->set_userdata('emis_temp_log',$loginauth->temp_log);

			        $time=date('H-i-s');
			        $datetime=$date.' '.$time;
			        $this->load->model('Authmodel');
			        $data=array('logged_in'=>$datetime,'login_date'=>$date,'login_attempt'=>0);
			        $this->Authmodel->update_log_status($loginauth->emis_user_id,$data);

		            ///last go home school
					}
                  	
                    
					
					if($loginauth->status == 'Active')
					{
						 //echo "if";die;
                         $this->session->set_userdata('emis_user_id',$loginauth->emis_user_id);
						 if($usertypename=='School' && $emisusertype==1){
							$this->load->model('Authmodel');
                    		$this->load->model('Datamodel');
							$schooldetails = $this->Authmodel->getschooldetails($emisuserid);
							//print_r($schooldetails);die;
							$this->session->set_userdata('emis_school_id',$emisuserid);
							$this->session->set_userdata('emis_school_udise',$schooldetails[0]->udise_code);
							$this->session->set_userdata('emis_school_block',$schooldetails[0]->block_id);
							$this->session->set_userdata('emis_school_district',$schooldetails[0]->district_id);
							$this->session->set_userdata('emis_school_board',$schooldetails[0]->board);
							$this->session->set_userdata('school_manage',$schooldetails[0]->manage_cate_id);
							$this->session->set_userdata('sch_depart',$schooldetails[0]->sch_management_id);
							$this->session->set_userdata('sch_dircet',$schooldetails[0]->sch_directorate_id);
							$this->session->set_userdata('emis_school_restriction',$schooldetails[0]->hill_frst);
							
							$this->session->set_userdata('school_profile',$this->Datamodel->getProfileComplete($schooldetails[0]->udise_code));
							
							$this->session->set_userdata('user_type',$emisusertype);
							if(($schooldetails[0]->high_class)>=10){ 
								$this->session->set_userdata('emis_school_highclass',TRUE); 
							}
							//die("Closed");
							redirect('Home/emis_school_gotoredirect','refresh');
						}else if($usertypename=='block' && $emisusertype==2){
                     		$this->session->set_userdata('user_type',$emisusertype);
							$this->session->set_userdata('emis_block_id',$emisuserid);
							redirect('block/emis_block_home', 'refresh');
						}else if($emisusertype==6 && $emis_usertype1==1){
					    	$this->session->set_userdata('user_type',$emisusertype);
					   		$this->session->set_userdata('emis_block_id',$emisuserid);
					   		$this->session->set_userdata('emis_usertype1',$emis_usertype1);
					    	redirect('Beo_block/emis_block_home', 'refresh');
				    	}else if($emisusertype==6 && $emis_usertype1==2){
				         	$this->session->set_userdata('user_type',$emisusertype);
					   		$this->session->set_userdata('emis_block_id',$emisuserid);
					    	$this->session->set_userdata('emis_usertype1',$emis_usertype1);
					    	redirect('Beo_block/emis_block_home', 'refresh');
						}else if($emisusertype==6 && $emis_usertype1==3){
					    
					   		$this->session->set_userdata('emis_block_id',$emisuserid);
                        	$this->session->set_userdata('user_type',$emisusertype);
                        	$this->session->set_userdata('emis_usertype1',$emis_usertype1);
					    	redirect('Beo_block/emis_block_home', 'refresh');
						}else if($emisusertype==6 && $emis_usertype1==4){
					    
					   		$this->session->set_userdata('emis_block_id',$emisuserid);
                        	$this->session->set_userdata('user_type',$emisusertype);
                        	$this->session->set_userdata('emis_usertype1',$emis_usertype1);
					    	redirect('Beo_block/emis_block_home', 'refresh');
						}else if($emisusertype==6 && $emis_usertype1==5){
					    	$this->session->set_userdata('emis_loggedin','Active');	
					   		$this->session->set_userdata('emis_block_id',$emisuserid);
                        	$this->session->set_userdata('user_type',$emisusertype);
                        	$this->session->set_userdata('emis_usertype1',$emis_usertype1);
					    	redirect('Beo_block/emis_block_home', 'refresh');
						}else if($usertypename=='CEO' && $emisusertype==9){
					   		$this->session->set_userdata('emis_loggedin','Active');	
					    	$this->session->set_userdata('emis_district_id',$emisuserid);
                        	$this->session->set_userdata('usertype1',$loginauth->emis_usertype1);
                        	$this->session->set_userdata('user_type',$emisusertype);
					  		redirect('Ceo_District/emis_Ceo_District_dash', 'refresh');
						}else if($usertypename=='COLLECTOR' && $emisusertype==16){
					    	$this->session->set_userdata('emis_loggedin','Active');	
					    	$this->session->set_userdata('emis_district_id',$emisuserid);
                        	//$this->session->set_userdata('usertype1',$loginauth->emis_usertype1);
                        	$this->session->set_userdata('user_type',$emisusertype);
					  		redirect('Collector/emis_Collector_dash', 'refresh');
						}else if($usertypename=='district' && $emisusertype==3){
					   
							$this->session->set_userdata('emis_district_id',$emisuserid);
                        	$this->session->set_userdata('usertype1',$loginauth->emis_usertype1);
                        	$this->session->set_userdata('user_type',$emisusertype);
                        	redirect('District/emis_district_dash', 'refresh');
						}else if($usertypename=='state' && $emisusertype==5){
					   		//$this->session->set_userdata('emis_district_id',$emisuserid);
					   		$this->session->set_userdata('emis_state_id',$emisuserid);
                       		$this->session->set_userdata('user_type',$emisusertype);
					   		redirect('state/baseDash', 'refresh');
                      		// redirect('AllApprove/Dashboard','refresh');
						}else if($usertypename=='DEO' && $emisusertype==10){
					   		$this->session->set_userdata('emis_loggedin','Active');	
							$this->session->set_userdata('emis_deo_id',$emisuserid);
                        	$this->session->set_userdata('user_type',$emisusertype);
							redirect('Deo_District/emis_Deo_District_dash','refresh');
						}else if($usertypename=='CORPORATION' && $emisusertype==15 && $emis_usertype1==1){
					  		$this->session->set_userdata('emis_loggedin','Active');	
					   		$this->session->set_userdata('emis_corporation_id',$emisuserid);
                       		$this->session->set_userdata('user_type',$emisusertype);
							redirect('Corporation/emis_district_dash','refresh');
						}else if($usertypename=='CORPORATION' && $emisusertype==15 && $emis_usertype1==2){
					  		$this->session->set_userdata('emis_loggedin','Active');	
					   		$this->session->set_userdata('emis_corporation_id',$emisuserid);
                       		$this->session->set_userdata('user_type',$emisusertype);
							redirect('Corporation/emis_district_dash','refresh');
						}
						else if($usertypename=='DC' && $emisusertype==19){
					  		$this->session->set_userdata('emis_loggedin','Active');	
					  		$this->session->set_userdata('emis_district_id',$emisuserid);
                      		$this->session->set_userdata('user_type',$emisusertype);
							redirect('DC/emis_district_dash','refresh');
						}
                    	else if(($usertypename=='TEACHER' && $emisusertype==14) ||($usertypename =="HM" && $emisusertype==8))
						{
							// echo "if";die;
							$cat_check = $this->Authmodel->get_teaching_teacher_login($emisuserid);
							// print_r($cat_check);die;
							if($cat_check->category==1)
							{
							// echo "if";
					    		$this->session->set_userdata('emis_teacher_id',$emisuserid);
                        		$this->session->set_userdata('user_type',$emisusertype);
                        		$this->session->set_userdata('emis_teacher_school_id',$cat_check->school_key_id);

                        		// $this->session->set_userdata('temp_log',$loginauth->temp)
					  			redirect('Udise_staff/emis_Udise_staff_dash', 'refresh');

							}else
							{
								$data['error'] = 'This Teaching Staff only Login';
							}

						}
						else if($emisusertype==18) 
						{					  	
				          redirect('csr_admin_controller/CsrDash', 'refresh');

						}
                    	else{
                        	$this->session->sess_destroy();  
                        	redirect('/','refresh');
                    	}

					}
					
					else
					{
						//  $data['error']="Your district schools has been locked today, please login tomorrow..!";
						 $data['error']="Schools Logins are Restricted in this Portal..!";
		 	             $this->load->view('Auth/emis_login',$data);
					}	


		   
				}
				
					}

		}
	
	}

	public function logout(){
		$this->load->database();
        $this->load->library('session');
         $loggedin = $this->session->userdata('emis_loggedin');

        if($loggedin)
        {
          date_default_timezone_set('Asia/Calcutta');
          $date=date('Y-m-d');
          $time=date('H-m-s');
          $datetime=$date.' '.$time;
          $co_id = $this->session->userdata('emis_user_id');
          $this->load->model('Authmodel');
          $data=array('logged_out'=>$datetime);
          $this->Authmodel->update_log_status($co_id,$data); 
        }

         $this->session->sess_destroy();  

      redirect('/','refresh');
	}


	public function emis_forgotpass(){
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
		$this->session->unset_userdata('logindetails');
		$loggedin = $this->session->userdata('emis_loggedin');
		if($loggedin)
			{		redirect('home/emis_school_home', 'refresh'); }
		else
			{ $this->load->view('Auth/emis_forgotpass'); }

   }

    
    public function emis_forgetpassword(){

		date_default_timezone_set('Asia/Calcutta');
		$date=date('Y-m-d');       
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('security');
		$this->load->library('form_validation');
        $this->load->database();
        // $forget_email = $this->input->post('emis_forget_email');
		$udisecode=$this->input->post('user_name');
		// print_r($this->input->post());die;
        $this->load->model('Authmodel');
        $data = '';
        if($udisecode !=''){
        $checkudiseuser = $this->Authmodel->checkemailuser($udisecode); 
		// print_r($checkudiseuser);die;
		if($checkudiseuser){
		$to_email=$checkudiseuser[0]->sch_email;
        $udise_code=$checkudiseuser[0]->udise_code;	
        	
        
             $this->send_mail($to_email,$udise_code);
             //$this->send_headmail($head_email,$udise_code);
        }else{
        	$data['error']="No Udise Code Found!.. Please enter valid Udise Code!";
        }
    	}
           $this->load->view('Auth/emis_forgotpass',$data);
	}




    
    
    // public function send_headmail($head_email,$udise_code) {

         // $from_email = "donotreply.emis@gmail.com";
		 // $encr1=base64_encode(base64_encode($head_email));
         // $encr2=$this->emis_crypt($encr1,'e');

         // //Load email library
         // $config = Array(
		    // 'protocol' => 'smtp',
		    // 'smtp_host' => 'ssl://smtp.gmail.com',
		    // 'smtp_port' => 465,
		    // 'smtp_user' => 'donotreply.emis@gmail.com',
		    // 'smtp_pass' => 'HelloWorld@101',
		    // 'mailtype'  => 'txt', 
		    // 'charset'   => 'utf-8'
		// );
         // $this->load->library('email',$config);
         // $this->email->set_newline("\r\n");	
 		 // $this->email->from($from_email, 'EMIS');
         // $this->email->to($head_email);
		 
         // $this->email->subject('EMIS | Password reset option for udise code:'.$udise_code);
        // $this->email->message('Password reset option Link:
        	// Follow this link: 
        	// '.base_url().'Security/forgot_password/'.urlencode($encr2).' click on link.');
			
        
         // if($this->email->send()){
       
          // $data['error2']="Reset Password Link successfully sent to your School's Email ID and District Co-Ordinator!";
           // $this->load->view('Auth/emis_forgotpass',$data); 
         // }else{
        
         	// $data['error']="something went wrong! Please try again!";
           // $this->load->view('Auth/emis_forgotpass',$data);
       // }
    // }
    

	public function testmail()
	{
		
		// using SendGrid's PHP Library
		// https://github.com/sendgrid/sendgrid-php
		// If you are using Composer (recommended)
		require 'vendor/autoload.php';
		// If you are not using Composer
		// require("path/to/sendgrid-php/sendgrid-php.php");
		$from = new SendGrid\Email("Example User", "donotreply.emis@gmail.com");
		$subject = "Sending with SendGrid is Fun";
		$to = new SendGrid\Email("Example User", "gkupulsar@gmail.com");
		$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('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');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		echo $response->statusCode();
		print_r($response->headers());
		echo $response->body();

		// export SENDGRID_API_KEY='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'

		// curl --request POST \
		//   --url https://api.sendgrid.com/v3/mail/send \
		//   --header "Authorization: Bearer $SENDGRID_API_KEY" \
		//   --header 'Content-Type: application/json' \
		//   --data '{"personalizations": [{"to": [{"email": "gkpulsar@gmail.com"}]}],"from": {"email": "donotreply.emis@gmail.com"},"subject": "Sending with SendGrid is Fun","content": [{"type": "text/plain", "value": "working fine1"}]}'

	}
    
    
    public function send_mail($to_email,$udise_code) {
        
         $from_email = "donotreply.emis@gmail.com";
		 $encr1=base64_encode(base64_encode($to_email));
         $encr2=$this->emis_crypt($encr1,'e');

         //Load email library
         $config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'donotreply.emis@gmail.com',
		    'smtp_pass' => 'tnemisssa',
		    'mailtype'  => 'txt', 
		    'charset'   => 'utf-8'
		);
         $this->load->library('email',$config);
         $this->email->set_newline("\r\n");	
 		 $this->email->from($from_email, 'EMIS');
         $this->email->to($to_email);
		 
         $this->email->subject('EMIS | Password reset option for udise code');
         $this->email->message('Password reset option Link:
        	Follow this link: 
        	'.base_url().'Security/forgot_password/'.urlencode($encr2).' click on link.');

       //   Send mail
         if($this->email->send()){
          $data['error2']="Reset Password Link successfully sent to your School's Email ID";
           $this->load->view('Auth/emis_forgotpass',$data); 
         }else{
         // echo "Email not sent ";
         	$data['error']="something went wrong! Please try again!";
           $this->load->view('Auth/emis_forgotpass',$data);
       }
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



	/**
	* Get Students Profile Without login
	* 25/02/2019
	* VIT-sriram
	**/

	public function get_students_barcode_details(){

		
			$bar_code_data = $this->uri->segment(2);
		
          $this->load->model('Authmodel');

			if(!empty($bar_code_data))
			{

				$student_id = $bar_code_data;
				$data['students_details'] = $this->Authmodel->get_barcode_students_details($student_id);
				// print_r($data);die;
				$this->load->view('Auth/students_profile',$data);

			}else
			{
				$this->emis_login();
			}

	}


	/**
	* EMIS Forget Password 
	* VIT-sriram
	* 08/03/2019
	**/

	public function emis_forget_user_details()
	{
			$this->load->model('Authmodel');
			
		$this->load->helper(array('form', 'url'));
		$this->load->helper('security');
		$this->load->library('form_validation');
        $this->load->database();
		date_default_timezone_set('Asia/Calcutta');

        // print_r($this->input->post());die;
			$udise_code = $this->input->post('udisecode');
			$teacher_code = $this->input->post('teacher_code');
			$form_id = $this->input->post('form_id');
			// echo $form_id;
			$data['form_id'] = $form_id;
			// if(!empty($form_id)){
			// switch ($form_id) {
			// 	case 1:
			// echo $teacher_code;
			if($this->input->post()){
					if($teacher_code !='' && $udise_code !=''){
						// echo "if";
					$user_details = $this->Authmodel->get_EMIS_user_details($udise_code,$teacher_code);

						if($user_details['status'])
						{
							$school_info = $user_details['data'];

							$save['id'] = '';
							$save['district_id'] = $school_info->district_id;
							$save['block_id'] = $school_info->block_id;
							$save['edu_dist_id'] = $school_info->edu_dist_id;
							$save['school_id'] = $school_info->school_id;
							$save['emis_user'] = $teacher_code;
							$save['ip_access'] = $_SERVER['REMOTE_ADDR'];
							$save['reset_flag'] = 1;
							$save['created_date'] = date('Y-m-d');

							// print_r($save);die;

							$user_data = $this->Authmodel->save_forget_user_details($save);

							if(!empty($user_data))
							{
								$data['success'] = "Request Confirm Please Check Your Email Id";
							}

						}else
						{
							$data['error'] = $user_details['message'];
						}
					}else
					{
						$data['error'] = 'Please Enter The User Name';
					}
				}

			// 	break;
			// 	case 2:
			// 	break;
			// 	case 3:
			// 	break;
			// 	case 4:
			// 	break;
			// 	case 5:
			// 	break;
			// 	case 6:
			// 	break;
			// 	case 7:
			// 	break;
				
			// }
		

           $this->load->view('Auth/emis_forgotpass',$data);

	}
	
        



} 
?>