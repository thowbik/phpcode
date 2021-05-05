<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic extends CI_Controller {

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
    $this->load->helper('security');
    $this->load->database(); 
    $this->load->model('Homemodel');
     $this->load->model('Authmodel');
    $this->load->model('Datamodel');
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

    //$user_type_id=$this->session->userdata('emis_user_type_id');
    //if($user_type_id==1)
   public function emis_school_basic1()
   {
    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {


     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }

    else{
         $user_type_id=$this->session->userdata('emis_user_type_id');
    if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {
        $school_udise = $this->session->userdata('emis_school_udise');
        $details = $this->Homemodel->get_school_form1_details($school_udise);

        $data['school_name'] = $details[0]->school_name;
        $data['school_name_tamil'] = $details[0]->school_name_tamil;
        $data['udise_code'] = $details[0]->udise_code;


        $data['current_district'] = $details[0]->district_id;
        $data['current_block'] = $details[0]->block_id;
        $data['current_cluster'] = $details[0]->cluster_id;
        $data['current_edu_district'] = $details[0]->edu_dist_id;
        $data['current_localbody'] = $details[0]->local_body_type_id;
        $data['current_assembly'] = $details[0]->assembly_id;
        $data['current_parliament_constituency'] = $details[0]->parliament_id;


        $data['districts'] = $this->Datamodel->get_alldistricts();
        $data['blocks']  = $this->Datamodel->get_allblocks($data['current_district']);
        $data['clusters'] = $this->Datamodel->get_allclusters($data['current_block']);
        $data['edu_districts'] = $this->Datamodel->get_alledudistricts($data['current_block']);
        $data['localbody'] = $this->Datamodel->get_alllocalbody($data['current_district']);
        
        $data['assembly'] = $this->Datamodel->get_allassembly($data['current_district']);
        $data['parliaments'] = $this->Datamodel->get_allparliaments( $data['current_assembly'] );


        $data['current_district_name'] = "";
        $data['current_block_name'] = "";
        $data['current_cluster_name'] = "";
        $data['current_edu_district_name'] = "";
        $data['current_localbody_name'] = "";
        $data['current_assembly_constituency_name'] = "";
        $data['current_parliament_constituency_name'] = "";



        if(!is_null($details[0]->district_id) && !empty($details[0]->district_id) )
        {
        $data['current_district_name'] = $this->Datamodel->get_district_name($details[0]->district_id)[0]->district_name;
        }
        if(!is_null($details[0]->block_id) && !empty($details[0]->block_id) )
        {
        $data['current_block_name'] = $this->Datamodel->get_block_name($details[0]->block_id)[0]->block_name;
         $is_present = FALSE ;
         foreach($data['blocks'] as $b)
         {
            if($b->id == $details[0]->block_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['block_error'] = "Block stored does not match with District. Kindly contact district admin and correct the same.";
         }

        }
        if(!is_null($details[0]->cluster_id) && !empty($details[0]->cluster_id) )
        {
        $data['current_cluster_name'] = $this->Datamodel->get_cluster_name($details[0]->cluster_id)[0]->clus_name;
          $is_present = FALSE ;
         foreach($data['clusters'] as $b)
         {
            if($b->clus_code == $details[0]->cluster_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['cluster_error'] = "Cluster data is incorrect.Kindly contact district admin and correct the same.";
         }

        }
        if(!is_null($details[0]->edu_dist_id) && !empty($details[0]->edu_dist_id) )
        {
        $data['current_edu_district_name'] = $this->Datamodel->get_edu_district_name($details[0]->edu_dist_id)[0]->edn_dist_name;
          $is_present = FALSE ;
          foreach($data['edu_districts'] as $b)
         {
            if($b->edn_dist_id == $details[0]->edu_dist_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['edn_dist_error'] = "Educational district data is incorrect.Kindly contact district admin and correct the same.";
         }
        }
        if(!is_null($details[0]->local_body_type_id) && !empty($details[0]->local_body_type_id) )
        {
        $data['current_localbody_name'] = $this->Datamodel->get_localbody_name($details[0]->local_body_type_id)[0]->localbody_name;
        $is_present = FALSE ;
          foreach($data['localbody'] as $b)
         {
            if($b->id == $details[0]->local_body_type_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['localbody_error'] = "LocalBody data is incorrect.Kindly contact district admin and correct the same.";
           
         }
        }
        if(!is_null($details[0]->assembly_id) && !empty($details[0]->assembly_id) )
        {
         $data['current_assembly_constituency_name'] = $this->Datamodel->get_assembly_constituency_name($details[0]->assembly_id)[0]->assembly_name;
          $is_present = FALSE ;
          foreach($data['assembly'] as $b)
         {
            if($b->id == $details[0]->assembly_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['assembly_error'] = "Assembly constituency data is incorrect.Kindly contact district admin and correct the same.";
         }
        }
        if(!is_null($details[0]->parliament_id) && !empty($details[0]->parliament_id) )
        {
        $data['current_parliament_constituency_name'] = $this->Datamodel->get_parliament_constituency_name($details[0]->parliament_id)[0]->parli_name;
          $is_present = FALSE ;
          foreach($data['parliaments'] as $b)
         {
            if($b->id == $details[0]->parliament_id)
            {
              $is_present = TRUE;
              break;
            }        

         }
         if(!$is_present)
         {
           $data['parliament_error'] = "Parliaments constituency data is incorrect.Kindly contact district admin and correct the same.";
           
         }


        }


        // data to be loaded based on localbody values

        $data['current_corporation'] = "";
        $data['current_corporation_zone'] ="";
        $data['current_coporation_ward'] ="";
        $data['corporations']= array();
        $data['zcorporations'] = array();
        $data['wcorporations'] = array();

        $data['municipalities'] = array();
        $data['current_municipality'] = "";
        $data['current_municipality_ward'] = "";
        $data['wmunicipalities'] = array();

        $data['townpanchayats'] = array();
        $data['current_town_panchayat'] = "";
        $data['wtownpanchayats']= array();
        $data['current_town_ward_panchayat'] = "";

        $data['cantonments'] = array();
        $data['current_cantonment'] = "";
        $data['current_cantonment_ward'] = "";
        $data['wcantonments'] = array();


        $data['current_township'] = "";
        $data['townships'] = array();
        $data['current_township_ward'] = "";
        $data['wtownships'] = array();

        $data['current_village'] = "";
        $data['current_village_hab'] = ""; 
        $data['villages'] =  array();
        $data['hvillages'] = array();

        $current_localbody_name = $data['current_localbody_name'] ;
        if(!is_null($current_localbody_name) && !empty($current_localbody_name) )
        {
            if($current_localbody_name == "Village Panchayat")
            {
              $data['current_village'] = $details[0]->village_panchayat_id;
              $data['current_village_hab'] = $details[0]->vill_habitation_id;
              $data['villages'] = $this->Datamodel->get_allvillages($data['current_block']);
              $data['hvillages'] = $this->Datamodel->get_allhvillages( $data['current_village']);
            }

            if($current_localbody_name == "Village Panchayat")
            {
              $data['current_village'] = $details[0]->village_panchayat_id;
              $data['current_village_hab'] = $details[0]->vill_habitation_id;
              $data['villages'] = $this->Datamodel->get_allvillages($data['current_block']);
              $data['hvillages'] = $this->Datamodel->get_allhvillages( $data['current_village']);
            }
            else if($current_localbody_name == "Municipality")
            {
              $data['municipalities'] = $this->Datamodel->get_allmunicipality($data['current_district']);
              $data['current_municipality'] = $details[0]->municipality_id ;
              $data['current_municipality_ward'] = $details[0]->municipal_ward_id;
              $data['wmunicipalities'] = $this->Datamodel->get_allmunicipalityward( $data['current_municipality'] );


            }
            else if($current_localbody_name == "Town Panchayat")
            {
              
              $data['townpanchayats'] =  $this->Datamodel->get_alltownpanchayat($data['current_district']);
              $data['current_town_panchayat'] = $details[0]->town_panchayat_id;
              $data['wtownpanchayats']= $this->Datamodel->get_alltownpanchayatward($data['current_town_panchayat']);
              $data['current_town_ward_panchayat'] = $details[0]->town_panchayat_ward_id;

             
            }
            else if($current_localbody_name == "Township")
            {
                $data['current_township'] = $details[0]->township_id;
                $data['townships'] = $this->Datamodel->get_alltownships($data['current_district']);
                $data['current_township_ward'] = $details[0]->township_ward_id;
                $data['wtownships'] = $this->Datamodel->get_alltownshipwards($data['current_township']);

            }
            else if($current_localbody_name == "Cantonment")
            {
                $data['current_cantonment'] = $details[0]->cantonment_id;
                $data['current_cantonment_ward'] = $details[0]->cantonment_ward_id;
                $data['cantonments'] = $this->Datamodel->get_allcantonment($data['current_district']);
                $data['wcantonments'] = $this->Datamodel->get_allcantonmentwards($data['current_cantonment']);

            }
            else if($current_localbody_name == "Extended Chennai Corporation" || $current_localbody_name == "Corporation")
            {
                  $data['current_corporation'] = $details[0]->corporation_id;
                  $data['current_corporation_zone'] = $details[0]->corpn_zone_id;
                  $data['current_coporation_ward'] = $details[0]->corpn_ward_id;
                  $data['corporations'] = $this->Datamodel->get_allcorporations($data['current_district']);
                  $data['zcorporations'] = $this->Datamodel->get_allcorporationzone($data['current_corporation']);
                  $data['wcorporations'] = $this->Datamodel->get_allcorporationward($data['current_corporation_zone']);

            }
          }


    


        


       	$this->load->view('emis_school_basic1',$data);

      } else{ redirect('/', 'refresh');}

     }

     } else { redirect('/', 'refresh'); }

   }
    
   public function emis_school_basic2()
   {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {


     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }

     else{
 
        $user_type_id=$this->session->userdata('emis_user_type_id');
        if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {
            $school_udise = $this->session->userdata('emis_school_udise');
            $details = $this->Homemodel->get_school_form2_details($school_udise);
            $data['address'] = $details[0]->address;
            $data['pincode'] = $details[0]->pincode;
            $data['landline'] = $details[0]->landline;
            $data['landline2'] = $details[0]->landline2;
            $data['mobile'] = $details[0]->mobile;
            $data['sch_email'] = $details[0]->sch_email;
            $data['website'] = $details[0]->website;
            $data['current_std_id'] = $details[0]->stdcode_id;
            if($this->session->userdata('emis_user_type_id') == 3 )
            {
               $id = $this->session->userdata('emis_district_id');
            } 
            else
            {
              $id = $this->session->userdata('emis_school_district');
            }
            //$details = 
            $data['std_details'] = $this->Homemodel->get_std_details($id);

            $this->load->view('emis_school_basic2',$data);
          } else{ redirect('/', 'refresh');}

      }

     } else { redirect('/', 'refresh'); }

   }
   
   public function emis_school_basic3()
   {



    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }
     else{
            $user_type_id=$this->session->userdata('emis_user_type_id');
            if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {    

                $school_udise = $this->session->userdata('emis_school_udise');
                $details = $this->Homemodel->get_school_form3_details($school_udise);

                $data['districts'] = $this->Datamodel->get_allbankdistricts();
                $data['current_district'] = $details[0]->bank_dist_id;
                $data['current_bank'] = $details[0]->bank_id;
                $data['current_branch'] = $details[0]->branch_id;
                $data['districts'] = $this->Datamodel->get_allbankdistricts();
                $data['banks'] = $this->Homemodel->getbanksby_dist($data['current_district']);
                $data['branchs'] = $this->Homemodel->getbranchby_bankid($data['current_bank']);
                $data['bankaccno'] = $details[0]->bankaccno;
                $this->load->view('emis_school_basic3',$data);

            }else{ redirect('/', 'refresh');}

        }

     } else { redirect('/', 'refresh'); }
    

   }
   public function emis_school_basic4()
   {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

     $emis_templog =$this->session->userdata('emis_school_templog');
     $emis_templog1 =$this->session->userdata('emis_school_templog1');
     if($emis_templog==0 || $emis_templog1==0){
        redirect('home/emis_school_gotoredirect','refresh');
     }
      else{
            $user_type_id=$this->session->userdata('emis_user_type_id');
            if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {
       
                $school_udise = $this->session->userdata('emis_school_udise');
                $details = $this->Homemodel->get_school_form4_details($school_udise);
                $data['pta_no'] = $details[0]->pta_no;
                $data['draw_off_code'] = $details[0]->draw_off_code;

                $data['current_sub_yr'] =  $details[0]->pta_sub_yr;
                $data['current_pta']=$details[0]->pta_esta;

                $data['current_major']=$details[0]->manage_cate_id;
                $data['current_sub']=$details[0]->sch_management_id;
                $data['current_department']=$details[0]->sch_directorate_id;
                $data['current_category']=$details[0]->sch_cate_id;

                $data['current_major_name']= $this->Datamodel->get_majorcategoryname($details[0]->manage_cate_id)[0]->manage_name;
                $data['current_sub_name']=$this->Datamodel->get_subcategoryname($details[0]->sch_management_id)[0]->management;
                $data['current_department_name']=$this->Datamodel->get_departmentname($details[0]->sch_directorate_id)[0]->department;

                //get all category data
                
                $data['major']=$this->Datamodel->get_allmajorcategory();
                $data['sub']=$this->Datamodel->get_allsubcategory($data['current_major']);
                $data['dept']=$this->Datamodel->get_alldeptcategory($data['current_sub']);
                $data['category']=$this->Datamodel->get_all_schoolcategory();
                $data['current_category_name'] = "" ;
                if(!is_null($data['current_category']) && !empty($data['current_category']))
                {
                  $data['current_category_name'] = $this->Datamodel->get_schoolcategory_name( $data['current_category'])[0]->category_name;
                }


                $this->load->view('emis_school_basic4',$data);

            } else{ redirect('/', 'refresh');}

        }

    } else { redirect('/', 'refresh'); }
    
   }
   public function emis_school_basic5()
   {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');

    if($emis_loggedin) {

       $emis_templog =$this->session->userdata('emis_school_templog');
       $emis_templog1 =$this->session->userdata('emis_school_templog1');
       if($emis_templog==0 || $emis_templog1==0){
          redirect('home/emis_school_gotoredirect','refresh');
       }

      else{

            $user_type_id=$this->session->userdata('emis_user_type_id');
            if($user_type_id==1 || $user_type_id==2 || $user_type_id==3 || $user_type_id==5) {

                 $school_udise = $this->session->userdata('emis_school_udise');
                 $details = $this->Homemodel->get_school_form5_details($school_udise);
                $data['current_longitude'] = $details[0]->longitude ;
                $data['current_latitude'] = $details[0]->latitude ;
                
                $this->load->view('emis_school_basic5',$data);
            } else { redirect('/', 'refresh');}

          }

     } else { redirect('/', 'refresh'); }

   }
   public function update5()
   {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    // form  validation starts 
    // form 5 check for latitute and longitude data
//      $this->load->library('form_validation');
      $value = $this->input->post('value');
      $name = $this->input->post('name');
           // log_message('debug', $name);
      //log_message('debug', $value);
     
  if(($name == "latitude" && $this->isValidLatitude($value) ) || ($name == "longitude" && $this->isValidLongitude($value) ) )
    {

      //log_message('debug', $name);
      //log_message('debug', $value);
      $this->load->database(); 
      $this->load->model('Homemodel');
      $data = array( $name => $value );
      $school_udise = $this->session->userdata('emis_school_udise');
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
        $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";

      }

    }
    else
    {
      $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = $name ." is not in the correct format.Re-check and submit again ";
    }
   // log_message('debug', $result_arr['error_msg']);

    echo json_encode($result_arr);

     } else { redirect('/', 'refresh'); }

   }


  
  
 public function updatestd()
   {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {
  

    $value = $this->input->post('value');
    if($value!= "" && preg_match("/^\d+$/",$value))
    {
      
      $school_udise = $this->session->userdata('emis_school_udise');

      $data = array( "stdcode_id" => $value );

      if( $this->Homemodel->updatedata($data,$school_udise))
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }
    }
    else
    {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "Std code " ." Format is incorrect .Re-check and submit again ";
    }

    echo json_encode($result_arr);

     } else { redirect('/', 'refresh'); }
  


  }

  public function updatebankacc()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

     $value = $this->input->post('value');

     if(preg_match("/^\d+$/",$value))
     {

      $data = array( "bankaccno" => $value );
      $school_udise = $this->session->userdata('emis_school_udise');
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "Bank account number" ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }

    

  }
  public function updateofficercode()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $value = $this->input->post('value');
       $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match("/^\w+$/",$value))
     {

      $data = array( "drawingofficercode" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "drawing officer code" ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }

  }
  public function updateptayear()
 {


    $value = $this->input->post('value');
    if($value != "")
    {
      $school_udise = $this->session->userdata('emis_school_udise');

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $value = $this->input->post('value');
      $school_udise = $this->session->userdata('emis_school_udise');
      $data = array( "pta_sub_yr" => $value );

      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }
    }
    else
    {
      $result_arr['response_code'] = -1;
      $result_arr['error_msg'] = "Year cannot be empty";
    }
    echo json_encode($result_arr);

     } else { redirect('/', 'refresh'); }

 }

 public function updateschoolcategory()
 {


    $value = $this->input->post('value');
    if($value != "")
    {
      $school_udise = $this->session->userdata('emis_school_udise');

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $value = $this->input->post('value');
      $school_udise = $this->session->userdata('emis_school_udise');
      $data = array( "sch_cate_id" => $value );

      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
         
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }
    }
    else
    {
      $result_arr['response_code'] = -1;
      $result_arr['error_msg'] = "school category cannot be empty";
    }
    echo json_encode($result_arr);

     } else { redirect('/', 'refresh'); }

 }
  public function updateptaregstate()
 {


    $value = $this->input->post('value');
    if($value == "Yes" || $value == "No")
    {
      $school_udise = $this->session->userdata('emis_school_udise');
      $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

      $value = $this->input->post('value');
      $school_udise = $this->session->userdata('emis_school_udise');
      $data = array( "pta_esta" => $value );

      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
        $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }
    }
    else
    {
      $result_arr['response_code'] = -1;
      $result_arr['error_msg'] = "Only yes or no values are allowed";
    }

    echo json_encode($result_arr);


     } else { redirect('/', 'refresh'); }


 }


 public function updateptano()
  {

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

       $value = $this->input->post('value');

     $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match("/^\w+$/",$value))
     {

      $data = array( "pta_no" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "PTA regsistration number " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


  }
 public function updatewebsite(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match("/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/",$value))
     {

      $data = array( "website" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "website " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }
 public function updateemail(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$value))
     {
        $checkalreadyemail = $this->Homemodel->checkalreadycheckemail($value);
        if($checkalreadyemail)
        {
          $result_arr['response_code'] = -1;
          $result_arr['error_msg'] = "Email already use. please use another! ";
        }
        else
        {
              $data = array( "sch_email" => $value );
              if( $this->Homemodel->updatedata($data,$school_udise) )
              {
                 $result_arr['response_code'] = 1;
              }
              else
              {
                $result_arr['response_code'] = 0;
                $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
              }
          }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "website " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }
 public function updatemobile(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^\d{10}$/',$value))
     {
            $checkalreadymobile = $this->Homemodel->checkalreadycheckmobile($value);
            if($checkalreadymobile)
            {
              $result_arr['response_code'] = -1;
              $result_arr['error_msg'] = "Mobile number already use. please use another!";
            }
            else
            {
                $data = array( "mobile" => $value );
                if( $this->Homemodel->updatedata($data,$school_udise) )
                {
                   $result_arr['response_code'] = 1;
                }
                else
                {
                  $result_arr['response_code'] = 0;
                  $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
                }
            }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "Mobile " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }

 public function updatelandline2(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^\d{6,8}$/',$value))
     {

      $data = array( "landline2" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "landline " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }
 public function updatelandline(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^\d{6,8}$/',$value))
     {

      $data = array( "landline" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "landline " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }
  public function updatepincode(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^(6|5)\d{5}$/',$value))
     {

      $data = array( "pincode" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "Pincode " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }

 public function updateaddress(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(! preg_match('/[^-.?!,;:()&\'\/ A-Za-z0-9]/',$value))
     {

      $data = array( "address" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "Address " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }

  public function updateschoolname(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');


     if( ! preg_match('/[^-.?!,;:()&\'\/ A-Za-z0-9]/',$value))
     {

      $data = array( "school_name" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "School Name " ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 } 

public function updateschoolnametamil(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(true)
     {

      $data = array( "school_name_tamil" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "School Name Tamil" ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 }

  public function updateudisecode(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $value = $this->input->post('value');
   $school_udise = $this->session->userdata('emis_school_udise');

     if(preg_match('/^[0-9]{11}$/',$value))
     {

      $data = array( "udise_code" => $value );
      if( $this->Homemodel->updatedata($data,$school_udise) )
      {
         $result_arr['response_code'] = 1;
      }
      else
      {
        $result_arr['response_code'] = 0;
        $result_arr['error_msg'] ="Unable to update the database. Kindly re-try";
      }


     }
     else
     {
       $result_arr['response_code'] = -1;
       $result_arr['error_msg'] = "udise code" ." is not in the correct format.Re-check and submit again ";
     }
      echo json_encode($result_arr);

       } else { redirect('/', 'refresh'); }


 } 
  public function getbankbydistcode(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $dist_code = $this->input->post('distcode');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getallbanks  = $this->Homemodel->getbanksby_dist($dist_code);
    $getbanks='';  
        foreach($getallbanks as $gab)
        {
            $getbanks =$getbanks."<option value='".$gab->id."'>".$gab->bank."</option>";  
        }
         $banks    =  "<select  class='form-control' tabindex='1' id='emis_prof_bank_name' name='emis_prof_bank_name'>
                                 <option value='' style='color:#bfbfbf;'>Select Bank</option>
                                ".$getbanks."                           
                            </select> ";
                           
        echo $banks; 

         } else { redirect('/', 'refresh'); }
  }



   public function getbranchbybankid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $bankid = $this->input->post('bankid');
    $this->load->database(); 
    $this->load->model('Homemodel');
    $getallbranchs  = $this->Homemodel->getbranchby_bankid($bankid);
    $getbranches='';  
        foreach($getallbranchs as $gabr)
        {
            $getbranches =$getbranches."<option value='".$gabr->id."'>".$gabr->branch.' - '.$gabr->ifsc_code."</option>";  
        }
         $branches    =  "<select  class='form-control' tabindex='1' id='emis_prof_branch_name' name='emis_prof_branch_name'>
                                 <option value='' style='color:#bfbfbf;'>Select Branch..</option>
                                ".$getbranches."                           
                            </select> ";
                           
        echo $branches; 

         } else { redirect('/', 'refresh'); }
  }


  //1


   public function getsubbymajorcategory(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $mana_id = $this->input->post('mana_cate_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallsub  = $this->Datamodel->get_allsubcategory($mana_id);
    $getsub='';  
        foreach($getallsub as $gabr)
        {
            $getsub =$getsub."<option value='".$gabr->id."'>".$gabr->management."</option>";  
        }
         $sub    =  "<select  class='form-control' tabindex='1' id='emis_mangement_sub_cat' name='emis_mangement_sub_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Sub Category</option>
                                ".$getsub."                           
                            </select> ";
                           
        echo $sub; 

         } else { redirect('/', 'refresh'); }
  }

  //2


   public function getdirectoratebysub(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('school_mana_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getalldept  = $this->Datamodel->get_alldeptcategory($id);
    $getdept='';  
        foreach($getalldept as $gabr)
        {
            $getdept =$getdept."<option value='".$gabr->id."'>".$gabr->department."</option>";  
        }
         $dept    =  "<select  class='form-control' tabindex='1' id='emis_mangement_directorate' name='emis_mangement_directorate'>
                                 <option value='' style='color:#bfbfbf;'>Select Directorate/Department</option>
                                ".$getdept."                           
                            </select> ";
                           
        echo $dept; 

         } else { redirect('/', 'refresh'); }
  }

  //3


   public function getschoolcategorybydirectorate(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('school_dept_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallcategory  = $this->Datamodel->get_allschoolcategory($id);
    $getcat='';  
        foreach($getallcategory as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->category."</option>";  
        }
         $category    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $category; 

         } else { redirect('/', 'refresh'); }
  }

//1

  public function getblocksbydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallblocks  = $this->Datamodel->get_allblocks($id);
    $getblock='';  
        foreach($getallblocks as $gabr)
        {
            $getblock =$getblock."<option value='".$gabr->id."'>".$gabr->block_name."</option>";  
        }
         $blocks    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getblock."                           
                            </select> ";
                           
        echo $blocks; 

         } else { redirect('/', 'refresh'); }
  }



public function getclusterwithblock(){

  $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('blk_code_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallclusters  = $this->Datamodel->get_allclusters($id);
    $getclus='';  
        foreach($getallclusters as $gabr)
        {
            $getclus =$getclus."<option value='".$gabr->clus_code."'>".$gabr->clus_name."</option>";  
        }
         $clusters     =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getclus."                           
                            </select> ";
                           
        echo $clusters ; 

         } else { redirect('/', 'refresh'); }
  }



   public function get_edu_district_with_block(){
   $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('block_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getalledudistricts  = $this->Datamodel->get_alledudistricts($id);
    $getcat='';  
        foreach($getalledudistricts as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->edn_dist_id."'>".$gabr->edn_dist_name."</option>";  
        }
         $edu_districts    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $edu_districts; 

         } else { redirect('/', 'refresh'); }
  }

//4

public function getlocalbodyadminbydistrct(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getalllocalbody  = $this->Datamodel->get_alllocalbody($id);
    $getcat='';  
        foreach( $getalllocalbody as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->localbody_name."</option>";  
        }
         $localbody    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $localbody; 

          } else { redirect('/', 'refresh'); }
  }

//5

public function getvillagebyblock(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('block_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallvillages  = $this->Datamodel->get_allvillages($id);
    $getcat='';  
        foreach($getallvillages as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $villages    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $villages; 

          } else { redirect('/', 'refresh'); }
  }

//6

public function getvilhabbyvilpan(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('village_panchayat_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallhvillages  = $this->Datamodel->get_allhvillages($id);
    $getcat='';  
        foreach($getallhvillages as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $hvillages    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $hvillages; 

          } else { redirect('/', 'refresh'); }
  }

//7

public function getassemblybydistrict(){

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallassembly  = $this->Datamodel->get_allassembly($id);
    $getcat='';  
        foreach($getallassembly as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->assembly_name."</option>";  
        }
         $assembly    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $assembly; 

          } else { redirect('/', 'refresh'); }
  }

//8

  public function getparliamentnamebyassembly(){

       $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('assembly_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getallparliaments  = $this->Datamodel->get_allparliaments($id);
    $getcat='';  
        foreach($getallparliaments as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->parli_name."</option>";  
        }
         $parliaments    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $parliaments; 

          } else { redirect('/', 'refresh'); }
  }

public function getmunicipalitybydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getmunicipality  = $this->Datamodel->get_allmunicipality($id);
    $getcat='';  
    foreach($getmunicipality as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->municipality."</option>";  
        }
         $municipality    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $municipality; 

          } else { redirect('/', 'refresh'); }
  }
  public function getmunicipalwardbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('municipality_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getmunicipality  = $this->Datamodel->get_allmunicipalityward($id);
    $getcat='';  
    foreach($getmunicipality as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $municipality    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $municipality; 

          } else { redirect('/', 'refresh'); }
  }

  

  public function gettownpanchayatbydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $gettownpanchayats  = $this->Datamodel->get_alltownpanchayat($id);
    $getcat='';  
    foreach($gettownpanchayats as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->townpanchayat."</option>";  
        }
         $townpanchayats    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $townpanchayats; 

          } else { redirect('/', 'refresh'); }
  }


  public function gettownpanchayatwardbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('townpanchayat_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $wgettownpanchayats  = $this->Datamodel->get_alltownpanchayatward($id);
    $getcat='';  
    foreach($wgettownpanchayats as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $wtownpanchayats    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $wtownpanchayats; 

          } else { redirect('/', 'refresh'); }
  }

public function getcantonementbydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getcontonments  = $this->Datamodel->get_allcantonment($id);
    $getcat='';  
    foreach($getcontonments as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->contonment."</option>";  
        }
         $contonements    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $contonements; 

          } else { redirect('/', 'refresh'); }
  }

public function getcontonmentwardbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('contonment_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $wgetcontonments  = $this->Datamodel->get_allcantonmentwards($id);
    $getcat='';  
    foreach($wgetcontonments as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $wcontonements    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $wcontonements; 

          } else { redirect('/', 'refresh'); }
  }
  public function gettownshipbydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $gettownships  = $this->Datamodel->get_alltownships($id);
    $getcat='';  
    foreach($gettownships as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->township."</option>";  
        }
         $townships    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $townships; 

          } else { redirect('/', 'refresh'); }
  }
public function gettownshipbyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('township_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $gettownships  = $this->Datamodel->get_alltownshipwards($id);
    $getcat='';  
    foreach($gettownships as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $townships    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $townships; 

          } else { redirect('/', 'refresh'); }
  }
public function getcorporationbydistrict(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('district_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $getcorporations  = $this->Datamodel->get_allcorporations($id);
    $getcat='';  
    foreach($getcorporations as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->corporation."</option>";  
        }
         $corporations    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $corporations; 

          } else { redirect('/', 'refresh'); }
  }

public function getcorporationzonenamebyid(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('corporation_id');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $zgetcorporations  = $this->Datamodel->get_allcorporationzone($id);
    $getcat='';  
    foreach($zgetcorporations as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->corpn_zone."</option>";  
        }
         $zcorporations    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $zcorporations; 

          } else { redirect('/', 'refresh'); }
  }

public function getcoporationwardbyzone(){

    $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

    $id = $this->input->post('corporation_zone');
    $this->load->database(); 
    $this->load->model('Datamodel');
    $wgetcorporations  = $this->Datamodel->get_allcorporationward($id);
    $getcat='';  
    foreach($wgetcorporations as $gabr)
        {
            $getcat =$getcat."<option value='".$gabr->id."'>".$gabr->name."</option>";  
        }
         $wcorporations    =  "<select  class='form-control' tabindex='1' id='emis_school_cat' name='emis_school_cat'>
                                 <option value='' style='color:#bfbfbf;'>Select Category</option>
                                ".$getcat."                           
                            </select> ";
                           
        echo $wcorporations; 

          } else { redirect('/', 'refresh'); }
  }
  public function emis_admin_bank_data_register()
  {
      $this->form_validation->set_rules('emis_prof_bank_district', 'Bank District', 'trim|required');
      $this->form_validation->set_rules('emis_prof_bank_name', 'Bank Name', 'trim|required');
      $this->form_validation->set_rules('emis_prof_branch_name', 'Branch Name', 'trim|required');
        
      if($this->form_validation->run() == FALSE)
      {
        $this->session->set_flashdata('errors', validation_errors());
        redirect('Basic/emis_school_basic3');
      }
      else
      {
        $this->load->library('session');
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) {

                $data = array(
            'bank_dist_id' => $this->input->post('emis_prof_bank_district'),
            'bank_id' => $this->input->post('emis_prof_bank_name'),
            'branch_id' => $this->input->post('emis_prof_branch_name')
                );

            $school_udise = $this->session->userdata('emis_school_udise');
          if( $this->Homemodel->updatedata($data,$school_udise) )
          {

              redirect('Basic/emis_school_basic3');

          }
          else
          {
            $this->session->set_flashdata('errors',"Unable to update please try later");
            redirect('Basic/emis_school_basic3');
          }
      }


       else { redirect('/', 'refresh'); }
    }

 }

 public function emis_admin_school_category_register()
 {
  $this->form_validation->set_rules('emis_mangement_maj_cat', 'mangement major category', 'trim|required');
  $this->form_validation->set_rules('emis_mangement_sub_cat', 'mangement sub category', 'trim|required');
  $this->form_validation->set_rules('emis_mangement_directorate', 'mangement directorate', 'trim|required');

  if ($this->form_validation->run() == FALSE)
  {
     $this->session->set_flashdata('errors', validation_errors());
      redirect('Basic/emis_school_basic4');
  }
  else
  {

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    if($emis_loggedin) {

   $data = array(
        'manage_cate_id' => $this->input->post('emis_mangement_maj_cat'),
        'sch_management_id' => $this->input->post('emis_mangement_sub_cat'),
         'sch_directorate_id' => $this->input->post('emis_mangement_directorate')
        
      ); 
   $school_udise = $this->session->userdata('emis_school_udise');
    if( $this->Homemodel->updatedata($data,$school_udise) )
    {

       redirect('Basic/emis_school_basic4');

    }
    else
    {
      $this->session->set_flashdata('errors',"Unable to update please try later");
       redirect('Basic/emis_school_basic4');
    }

  }


   else { redirect('/', 'refresh'); }
  }




 }
 
 
  function calldashboard1() { 
       $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
       $this->load->view('freeSchemes/board',$data);
    }

 public function emis_location_register()
 {

     $this->load->library('session');
    $emis_loggedin = $this->session->userdata('emis_loggedin');
    $this->form_validation->set_rules('emis_prof_revenue_district', 'Revenue district', 'trim|required');
     $this->form_validation->set_rules('emis_prof_block_name', 'Block', 'trim|required');
      $this->form_validation->set_rules('emis_prof_cluster_name', 'Cluster', 'trim|required');
      $this->form_validation->set_rules('emis_prof_edu_district_name', 'educational  district', 'trim|required');
      $this->form_validation->set_rules('emis_prof_local_body_admin_name', 'Local body name', 'trim|required');
      $this->form_validation->set_rules('emis_prof_assembly_name', 'Assembly name', 'trim|required');
      $this->form_validation->set_rules('emis_prof_parliment_constituency_name', 'constituency name', 'trim|required');

    if ($this->form_validation->run() == FALSE)
  {
     $this->session->set_flashdata('errors', validation_errors());
      redirect('Basic/emis_school_basic1');
  }
  else
  {


    if($emis_loggedin) {
   
 
   $data = array(
        'district_id' => $this->input->post('emis_prof_revenue_district'),
        'block_id' => $this->input->post('emis_prof_block_name'),
         'cluster_id' => $this->input->post('emis_prof_cluster_name'),
         'edu_dist_id' => $this->input->post('emis_prof_edu_district_name'),
          'local_body_type_id' => $this->input->post('emis_prof_local_body_admin_name'),
          'village_panchayat_id' => $this->input->post('emis_prof_village_panchayat_name'),
          'vill_habitation_id' => $this->input->post('emis_prof_village_habitation_name'),
           'corporation_id' => $this->input->post('emis_prof_corporation_name'),
           'corpn_zone_id' => $this->input->post('emis_prof_corporation_zone_name'),
           'corpn_ward_id' => $this->input->post('emis_prof_corporation_ward_name'),
           'municipality_id' => $this->input->post('emis_municipality_name'),
           'municipal_ward_id' => $this->input->post('emis_municipality_ward_name'),
           'town_panchayat_id' => $this->input->post('emis_prof_town_panchayat_name'),
           'town_panchayat_ward_id' => $this->input->post('emis_prof_town_panchayat_ward_name'),
           'cantonment_id' => $this->input->post('emis_prof_cantonement_name'),            
           'cantonment_ward_id' => $this->input->post('emis_prof_cantonement_ward_name'),
            'township_id' => $this->input->post('emis_prof_township_name'),
           'township_ward_id' => $this->input->post('emis_prof_township_ward_name'),
         'assembly_id' => $this->input->post('emis_prof_assembly_name'),
         'parliament_id' => $this->input->post('emis_prof_parliment_constituency_name')
        
      ); 
    $school_udise = $this->session->userdata('emis_school_udise');
    if( $this->Homemodel->updatedata($data,$school_udise) )
    {
       if($this->session->userdata('emis_user_type_id') == 3 &&  $this->input->post('emis_prof_revenue_district') != $this->session->userdata('emis_district_id'))
       {
         $this->session->unset_userdata('emis_school_udise');
         redirect('District/emis_district_home');
         
       } 
       else {
        redirect('Basic/emis_school_basic1');
       }

    }
    else
    {
      $this->session->set_flashdata('errors','Unable to update. please try after some time.');
      redirect('Basic/emis_school_basic1');
    }

      } else { redirect('/', 'refresh'); }

  }



 }

 public function emis_location_registerforschool()
 {
  $emis_loggedin = $this->session->userdata('emis_loggedin');
  if($emis_loggedin) {
    $data = array('village_panchayat_id' => $this->input->post('emis_prof_village_panchayat_name'),
          'vill_habitation_id' => $this->input->post('emis_prof_village_habitation_name'),
           'corporation_id' => $this->input->post('emis_prof_corporation_name'),
           'corpn_zone_id' => $this->input->post('emis_prof_corporation_zone_name'),
           'corpn_ward_id' => $this->input->post('emis_prof_corporation_ward_name'),
           'municipality_id' => $this->input->post('emis_municipality_name'),
           'municipal_ward_id' => $this->input->post('emis_municipality_ward_name'),
           'town_panchayat_id' => $this->input->post('emis_prof_town_panchayat_name'),
           'town_panchayat_ward_id' => $this->input->post('emis_prof_town_panchayat_ward_name'),
           'cantonment_id' => $this->input->post('emis_prof_cantonement_name'),            
           'cantonment_ward_id' => $this->input->post('emis_prof_cantonement_ward_name'),
            'township_id' => $this->input->post('emis_prof_township_name'),
           'township_ward_id' => $this->input->post('emis_prof_township_ward_name')
           );
    $school_udise = $this->session->userdata('emis_school_udise');
    if( $this->Homemodel->updatedata($data,$school_udise) )
    {
       redirect('Basic/emis_school_basic1');

    }
    else
    {
      $this->session->set_flashdata('errors','Unable to update. please try after some time.');
      redirect('Basic/emis_school_basic1');
    }

  }else { redirect('/', 'refresh'); }

 }

   
}
?>