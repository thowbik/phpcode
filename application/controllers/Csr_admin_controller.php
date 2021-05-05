<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csr_admin_controller extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
    $this->load->database(); 
    $this->load->library('session','typography-'); 
   
     $this->load->model('Csr_admin_model');
     $this->load->helper('common_helper');
  }
  public function social_icon()
  {
    $this->load->view('social_icons.html');
  }
  public function CsrDash(){

     $pending['csr_pending'] = $this->Csr_admin_model->get_pending_details_users();

     $user_count['count'] = $this->Csr_admin_model->csr_user_count();


     $result = $this->Csr_admin_model->csr_user_contribute_type();
     $school_details['school'] = $this->Csr_admin_model->school_requirement_details();
     $count_csr_user = $this->Csr_admin_model->csr_user_count_for_dashboard();
     $count_csr_user_today_contribute = $this->Csr_admin_model->csr_user_count_for_today_details();
  

  
      $list_dash = array('csr_pending' => $pending['csr_pending'],'count'=>$user_count['count'],'material'=>$result,'fund' => $result,'online'=>$result,'offline'=>$result,'last_month' => $result,'last_two_month' =>$result,'last_one_day' => $result,'school' => $school_details['school'],'user_count' => $count_csr_user,'today_count' => $count_csr_user,'today_contribute' => $count_csr_user_today_contribute);

     





     $this->load->view('csr_admin/csr_dashboard_page',$list_dash);
    
    } 
  //for mail contents text editor
   public function csr_email_page()
   {
     $get_data['csr_content'] = $this->Csr_admin_model->get_csr_mail_details();
   
     //print_r($get_id);
     
       $this->load->view('csr_admin/csr_email_contents',$get_data);
   }

 public function load_mail_contents()
   {
     $id['id'] = $this->uri->segment(3, 0);
     $get_db['get_values'] = $this->Csr_admin_model->mial_load_display($id);

     //$get_data['csr_content'] = $this->Csr_admin_model->get_csr_mail_details();
   
    
     
       $this->load->view('csr_admin/mail_update',$get_db);
   }

   public function window_update_content()
   {
     $form = $this->input->post();
     
        if($form)
       {
          

           $data = array
           (
               "mail_code"   => $form['mail_code'],
               "mail_comment" =>$form['mail_comment'],
               "from_mail" =>$form['from_mail'],
               "display_name" =>$form['mail_code'],
               "subject" => $form['display_name'],
                "content" => $form['content'],
                "id" => $form['hidden']
                
                        
           );
          
         // print_r($data);
       }

       $update_content = $this->Csr_admin_model->save_update_mail_details($data);
       redirect('csr_admin_controller/csr_email_page','refresh');

   }

public function csr_save_mail_content()
   {
 
$form = $this->input->post('form');

   
     $data = array();
        if($form)
       {
           parse_str($_POST['form'],$searcharray);

           $data = array
           (
               "mail_code"   => trim(str_replace(' ', '_',$searcharray['mail_code'])),
               "mail_comment" =>$searcharray['mail_comment'],
               "from_mail" =>$searcharray['from_mail'],
               "display_name" =>$searcharray['display_name'],
               "subject" => $searcharray['subject'],   
                "content" => $searcharray['content']
               
                
                        
           );
          
         // print_r($data);
       }
    $insert_content = $this->Csr_admin_model->save_csr_mail_details($data);


 // $data_assign = array('content' => $username);
    // $this->typography->protect_braced_quotes = TRUE;
//
     // $string = $this->typography->auto_typography($data_assign['mail_comment']);
     // print_r($string);die();
     // $save_contents = $this->Csr_admin_model->save_csr_mail_details($string);
     
   
      //print_r($this->typography->nl2br_except_pre($username));
     
     
   }
   public function csr_update_mail_content()
   {
      $form = $this->input->post('form');
       $data = array();
        if($form)
       {
           parse_str($_POST['form'],$searcharray);

           $data = array
           (
               "mail_code"   => trim(str_replace(' ', '_',$searcharray['mail_code'])),
               "mail_comment" =>$searcharray['mail_comment'],
               "from_mail" =>$searcharray['from_mail'],
               "display_name" =>$searcharray['display_name'],
               "subject" => $searcharray['subject'],   
                "content" => $searcharray['content'],
                "id" => $searcharray['hidden']
               
                
                        
           );
          
         // print_r($data);
       }

       $update_content = $this->Csr_admin_model->save_update_mail_details($data);
    


   }
   //for contribution listing pages
   public function csr_admin()
   {
      $data['csr_view'] = $this->Csr_admin_model->get_csr_user_contributions();
    
      $array =array('data' => $data['csr_view']);
  
  // print_r($array);
   
  // die;
  
     $this->load->view('csr_admin/csr_admin_panel_user',$array);
   }
   
  public function update_child()
  { 
     $val = $_POST['Id'];
     
    $result_set = $this->Csr_admin_model->get_school_id_district($val);

    echo json_encode($result_set);
     // $school_details['school_data'] = $this->Csr_admin_model->get_school_id_district();
   
  }
  public function Update_csr_admin_details()
  {
   
     $form = $this->input->post('form');
   
     $data = array();
        if($form)
       {
           parse_str($_POST['form'],$searcharray);
           $data = array
           (
               "id"   => $searcharray['hidden'],
               "status" =>$searcharray['status'],
               "payment_ref" =>$searcharray['payment_ref'],
               "mat_delivery_date" =>$searcharray['mat_delivery_date'],
               "mat_delivery_point" => $searcharray['mat_delivery_point'],   
                "gen_dev_fund_remarks" => $searcharray['gen_dev_fund_remarks'],
                "payment_type" =>$searcharray['payment_type'],
                "payment_date" =>$searcharray['payment_date'],
                "bank_branch" =>$searcharray['bank_branch'],
                "mode_of_deposit"=>$searcharray['mode_of_deposit'],
                "cheque_drop_address" => $searcharray['cheque_drop_address']
                
                        
           );
          
       }
     $update_master = $this->Csr_admin_model->update_admin_page($data);

  }
 public function Update_csr_admin_child_details()
  {
   
     //$form = $this->input->post('form');
    $id = $_POST['id'];

     $status = $_POST['status_id'];

           
           $child_data = array
           (
               "id"   => $id,
               "status" =>$status
               
           );
         
     $update_child_data = $this->Csr_admin_model->update_child_list_model($child_data);

  }

  public function csr_load_user()
  {
    $csr_data['csr_user_list'] = $this->Csr_admin_model->get_csr_user_list();
  
    $this->load->view('csr_admin/csr_user_list_page',$csr_data);
  }
  public function csr_user_for_contribution()
  {
    $id['id'] = $this->uri->segment(3, 0);
    $get_id = $id['id'];

    
     
 
         
     $contribution_user['user'] = $this->Csr_admin_model->get_contribution_user($get_id);
     $user_to_contribution['contribution'] = $this->Csr_admin_model->get_csr_contribution_to_user($get_id);
      $array_list = array('user' =>$contribution_user['user'],'contribution' => $user_to_contribution['contribution']);
     // foreach ($array as $key => $value) {

        
     // }
      $response = $this->load->view('csr_admin/csr_admin_panel',$array_list);
     // // echo ($response);
     



  }
// public function csr_contribution_to_user_list()
// {
//   $contribution_user['user'] = $this->Csr_admin_model->get_contribution_user($get_id);
     

// }

 
  
}
?>
