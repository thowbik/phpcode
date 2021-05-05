<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

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
    $this->load->database(); 
    $this->load->model('Homemodel');
     $this->load->model('Authmodel');
    $this->load->model('Datamodel');
    $this->load->model('Statemodel');
    $this->load->model('Districtmodel');
    $this->load->model('Sectionmodel');
    $this->load->model('Adminmodel');
    $this->load->model('Schoolgroupmodel');
    $this->load->helper(array('form','url','html'));
	$this->load->library(array('session', 'form_validation'));
	$this->load->helper('security');
      $this->load->model('Blockmodel');
  
  }
 
      
   public function emis_school_noofsections()
   {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
        $emis_templog =$this->session->userdata('emis_school_templog');
        $emis_templog1 =$this->session->userdata('emis_school_templog1');
        if($emis_templog==0 || $emis_templog1==0){
          redirect('home/emis_school_gotoredirect','refresh');
        }
        else
        {
          $user_type_id=$this->session->userdata('emis_user_type_id');
          if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {

              $school_id = $this->session->userdata('emis_school_id');  
              	 
              $data['details'] = $this->Sectionmodel->getallclasssections($school_id);
               //print_r($data['details']);
              $this->load->view('emis_school_noofsec',$data);
            }  else{ redirect('/', 'refresh');}
        }        
      
    }else { redirect('/', 'refresh'); }

   }  

   public function getclassdetails()
   {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
      $class_id = $this->input->post('class_id');
      $school_id = $this->session->userdata('emis_school_id');
   	  $result_arr = $this->Sectionmodel->getclasssection_details($class_id,$school_id);
      echo json_encode($result_arr);
    }
    else { redirect('/', 'refresh'); }
   		
   }

   public function emis_school_class_section_register()
   {

    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $this->form_validation->set_rules('emis_class_section_id_hidden', 'id', 'trim|required');
      $this->form_validation->set_rules('emis_school_class_standard', 'Standard', 'trim|required');
    $this->form_validation->set_rules('emis_no_sections', 'Number of sections','trim|required|integer');
          if($this->form_validation->run() == FALSE)
          {
            $this->session->set_flashdata('errors', validation_errors());
            redirect('Section/emis_school_noofsections');

          }
          else{

            //check if the number of sections is reduced

            $id = $this->input->post('emis_class_section_id_hidden');
            $temp_class_id = $this->Sectionmodel->get_mapping_class($this->input->post('emis_school_class_standard'));
            $class_id = $temp_class_id[0]->id;
             $school_id = $this->session->userdata('emis_school_id'); 
             $unaided = $this->input->post('emis_un_aided_section_id');
             $unaided_with_comma = implode(',',$unaided );  

                $data = array(
                  'sections' => $this->input->post('emis_no_sections'),
                    'section_ids' => $this->input->post('emis_section_id'),
                     'un_aided_section_ids' => $unaided_with_comma
                   );
                $given_sections = $this->input->post('emis_no_sections');
                $data_sec =  $this->Sectionmodel->get_number_of_sections($class_id,$id,$school_id) ;
                $current_sections = $data_sec[0]->sections;
                $countinstudenttable = $this->Sectionmodel->get_number_of_sections_student($class_id,$school_id) ;
                if($given_sections < $current_sections && $given_sections < $countinstudenttable)
                {
                     $this->session->set_flashdata('errors','Cannot reduce the sections as there are students in the exsisting sections.Kindly re-check and reduce');
                  redirect('Section/emis_school_noofsections');
  
                }
                else
                {
                  if( $this->Sectionmodel->update($data,$class_id,$id,$school_id) )
                  {
                      
                      redirect('Section/emis_school_noofsections');

                  }
                  else
                  {
                      
                      $this->session->set_flashdata('errors','unable to update please try later');
                      redirect('Section/emis_school_noofsections');
                  }
               }//studentcount check
               
               }//form validation
          
      }//main authentication if
      else { redirect('/', 'refresh'); }


   	
 
 }//method 

 public function emis_school_class_section_add_register(){

  $this->form_validation->set_rules('emis_add_school_class_standard', 'Standard', 'trim|required');
  $this->form_validation->set_rules('emis_add_no_sections', 'Number of sections', 'trim|required|integer');
  $this->form_validation->set_rules('emis_add_section_id', 'Section names', 'trim|required');
  
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 

        if ($this->form_validation->run() == FALSE)
        {
           $this->session->set_flashdata('errors', validation_errors());
             redirect('Section/emis_school_noofsections');
        }
        
        else
        {

        $unaided = $this->input->post('emis_add_un_aided_section_id');
         $unaided_with_comma = implode(',',$unaided );
         
      $data = array(
           'school_key_id' => $this->session->userdata('emis_school_id'),
           'class_id' => $this->input->post('emis_add_school_class_standard'),
           'sections' => $this->input->post('emis_add_no_sections'),
           'section_ids' => $this->input->post('emis_add_section_id'),
           'un_aided_section_ids' => $unaided_with_comma
           
              
            );

          if( $this->Sectionmodel->insert_data($data) )
            {

                redirect('Section/emis_school_noofsections');

            }
            else
            {
                $this->session->set_flashdata('errors',"Unable to update please try later");
                redirect('Section/emis_school_noofsections');
            }

          }
      }else { redirect('/', 'refresh'); }

 }

  
  public function deleteclassdetails()
  {
  	$emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) { 
        $id = $this->input->post('id');
        $school_id = $school_id=$this->session->userdata('emis_school_id');
   	      if ($this->Sectionmodel->delete_classsection_details($id,$school_id))
   	      {
   	      	echo true;
   	      }
   	      else
   	      {
   	      	echo false;
   	      }
      }else { redirect('/', 'refresh'); }

   		
  }
  public function getallstandards()
  {
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {    
       $school_id = $this->session->userdata('emis_school_id');
       $result = $this->Sectionmodel->getallstandards($school_id);
        echo json_encode($result);
      }
      else { redirect('/', 'refresh'); }
  }


}

?>    
