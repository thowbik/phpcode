<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolgroups extends CI_Controller {

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
    $this->load->library(array('session', 'form_validation'));
    $this->load->database(); 
    $this->load->model('Homemodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel');
    $this->load->helper('security');
        $this->load->model('Blockmodel');
  
  
  }

 
    public function emis_school_groupfunctioning()
   {
 
       $emis_loggedin = $this->session->userdata('emis_loggedin');
        $is_high_class=$this->session->userdata('emis_school_highclass');
        $is_cbsc = $this->session->userdata('emis_school_board');
        
    if($emis_loggedin) {
      
      $emis_templog =$this->session->userdata('emis_school_templog');
      $emis_templog1 =$this->session->userdata('emis_school_templog1');

       $school_id=$this->session->userdata('emis_school_id');
       $manage_cate=$this->Datamodel->getmanagecatename($school_id);

     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }
      else{
            if($is_high_class && $manage_cate!="11" && $manage_cate!="12" && $manage_cate!="28" && $manage_cate!="29" &&$manage_cate!="33" && $manage_cate!="34")
            {
               $user_type_id=$this->session->userdata('emis_user_type_id');
              if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {
                  $this->load->helper('security');
                  $school_id = $this->session->userdata('emis_school_id');   
                  $data['details'] = $this->Schoolgroupmodel->getallgroupdata($school_id);
                  $this->load->view('emis_school_groupfunc',$data);
              }else{ redirect('/', 'refresh');}
            }
            else
            {
              // $this->session->set_flashdata('errors','Your school does not have class 11th or 12th.Please check the data');
              redirect('Admin/emis_school_admin1', 'refresh');
            }
        }
    }else { redirect('/', 'refresh'); }

   }

   public function deleteclassdetails()
  {
  		    $emis_loggedin = $this->session->userdata('emis_loggedin');
          if($emis_loggedin) {
              $id = $this->input->post('id');
              $school_id = $this->session->userdata('emis_school_id');   
       	      if ($this->Schoolgroupmodel->delete_group_details($id,$school_id))
       	      {
       	      	echo true;
       	      }
       	      else
       	      {
       	      	echo false;
       	      }
            }
            else { redirect('/', 'refresh'); }

   		
  }

  public function edit_group_register()
  {

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $this->form_validation->set_rules('emis_group_name', 'Group Name', 'trim|required');
       $this->form_validation->set_rules('emis_group_section', 'Number of sections in group', 'trim|required|integer');
       $this->form_validation->set_rules('emis_group_id_hidden', 'Group row id', 'trim|required|integer');
        
        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('errors', validation_errors());
          redirect('Schoolgroups/emis_school_groupfunctioning');
        }
        else
        {
        		$id = $this->input->post('emis_group_id_hidden'); 
            $group_name = $this->input->post('emis_group_name');  
            $school_id = $this->session->userdata('emis_school_id');   
         		     $data = array(
             	'sec_in_group' => $this->input->post('emis_group_section')
                   
              	);
         		 

            	if( $this->Schoolgroupmodel->update($data,$id,$group_name,$school_id) )
            	{

               		redirect('Schoolgroups/emis_school_groupfunctioning');

            	}
            	else
            	{
              		$this->session->set_flashdata('errors','unable to update. Please try later');
               		redirect('Schoolgroups/emis_school_groupfunctioning');
            	}
        }
     }else { redirect('/', 'refresh'); }



  }

  public function add_group_register()
  {

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {    

       $this->form_validation->set_rules('emis_group_add', 'Group Name', 'trim|required');
       $this->form_validation->set_rules('emis_group_add_section', 'Number of sections in group', 'trim|required|integer');
        
        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('errors', validation_errors());
          redirect('Schoolgroups/emis_school_groupfunctioning');
        }
       else
       {
             $data = array(
            'school_key_id' => $this->session->userdata('emis_school_id')   ,
           'group_name' => $this->input->post('emis_group_add'),
           'sec_in_group' => $this->input->post('emis_group_add_section')
               
            );
         

          if( $this->Schoolgroupmodel->add($data) )
          {

              redirect('Schoolgroups/emis_school_groupfunctioning');

          }
          else
          {
              $this->session->set_flashdata('errors','Unable to add group data,please try later');
              redirect('Schoolgroups/emis_school_groupfunctioning');
          }
        }
    }
    else { redirect('/', 'refresh'); }


  }

  public function getallschoolgroups()
  {
    
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $school_id = $this->session->userdata('emis_school_id');   
      $data = $this->Schoolgroupmodel->getallschoolgroups($school_id);
      echo json_encode($data);
    }
    else { redirect('/', 'refresh'); }

  }


 }

?>