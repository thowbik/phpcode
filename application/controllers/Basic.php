 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/third_party/mpdf/mpdf.php';
require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
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
    /*$this->load->library('session');
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


    


        


       	$this->load->view('emis_schoolnew_basic',$data);

      } else{ redirect('/', 'refresh');}

     }

     } else { redirect('/', 'refresh'); }*/
     
     
     switch($this->uri->segment(3,0)){
        case 1:$this->load->view('schoolInfo/dashboarddistrict');break;
        case 2:$this->load->view('schoolInfo/dashboardblock');break;
        case 3:$this->load->view('schoolInfo/dashboardschool');break;
     }
     

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
        if($this->uri->segment(3,0)){
            echo('<option value="">Choose</option>'.$getsub);
        }
        else{
            echo($sub);   
        }

         } else { echo('Not Logged');redirect('/', 'refresh'); }
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
        
        if($this->uri->segment(3,0)){
            echo('<option value="">Choose</option>'.$getdept);
        }
        else{
            echo $dept;  
        }                   
         

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









    //Functions Included By Vivek Rao - Ramco Cements Limited

    function emis_school_details_entry(){
        
        $part=$this->uri->segment(3,0);
        
        //Parsing Data
        $school_udise=$this->session->userdata('emis_school_id')==''?$this->uri->segment(4,0):$this->session->userdata('emis_school_id');
        $data['basic']=$this->Homemodel->getSchoolInfo($school_udise);
		//print_r($data['basic']);
        $data['profile']=$this->Datamodel->getProfileComplete($data['basic'][0]->udise_code);
        $data['districts'] = $this->Datamodel->get_alldistricts();
        $data['stdcode']=$this->Datamodel->getSTDCodeByDistrict($data['basic'][0]->district_id);
        $data['resitype']=$this->Datamodel->getResidentialType();
        $data['schooltype']=$this->Datamodel->getallschoolcategory();
        $data['schoolcategory']=$this->Datamodel->getallschoolcategory();
        $data['schoolmanagement']=$this->Datamodel->get_allmajorcategory();
        $data['mediumInstruct']=$this->Datamodel->getMediumInstruct();
        $data['minority']=$this->Datamodel->getminority();
        $data['languagesubject']=$this->Datamodel->getLanguageasSubject();
        $data['bankdistrict']=$this->Datamodel->get_allbankdistricts();
        $data['trade']=$this->Datamodel->getTrades();
        
        $data['ictlist']=$this->Datamodel->getICTList(1);
        $data['ictlistofthings']=$this->Datamodel->getICTList(3);
        $data['ictlistofkits']=$this->Datamodel->getICTList(2);
        $data['bank']=$this->Datamodel->getbankList();
        $data['lablist']=$this->Datamodel->getLablist();
        $data['constructlist']=$this->Datamodel->getConstructlist();
        $data['clublist']=$this->Datamodel->getclub();
        //print_r($data['clublist']);
        $data['ictsuplier']=$this->Datamodel->getICTSupplier();
        
        $data['profile']=$this->Datamodel->getProfileComplete($data['basic'][0]->udise_code);
        //echo json_encode($data['minority']);
        //print_r($data);die();
        
        switch($part){
            case 1:$this->load->view('schoolInfo/emis_schoolnew_basic',$data);break;
            case 2:$this->load->view('schoolInfo/emis_schoolnew_basic_part2',$data);break;
            case 3:$this->load->view('schoolInfo/emis_schoolnew_basic_part3',$data);break;
            case 4:$this->load->view('schoolInfo/emis_schoolnew_basic_part4',$data);break;
            case 5:$this->load->view('schoolInfo/emis_schoolnew_basic_part5',$data);break;
            case 6:$this->load->view('schoolInfo/emis_schoolnew_basic_part6',$data);break;
            case 7:$this->load->view('schoolInfo/emis_schoolnew_basic_part7',$data);break;
            case 8:$this->load->view('schoolInfo/emis_schoolnew_basic_part8',$data);break;
        }
        
        
    }
    
    
    function addressChainDetails(){
        $selectAddress=$this->uri->segment(3,0);
        
        $check=($selectAddress > 0 && $selectAddress < 7) ? 7 : $selectAddress;
        
        $zonetypeid[0]='schoolnew_zone_type';            //Based On District_ID
        $zonetypeid[7]='schoolnew_localbody_all';        //Based On District_ID and ZoneTypeID
        $zonetypeid[8]='schoolnew_block';               //Based On District_ID
        $zonetypeid[9]='schoolnew_cluster_mas';         //Based On Block_ID
        $zonetypeid[10]='schoolnew_assembly';           //Based On District_id
        $zonetypeid[11]='schoolnew_parliament';          //Based On Assembly_id
        $zonetypeid[12]='schoolnew_edn_dist_mas';
        $zonetypeid[13]='schoolnew_habitation_all';     //Based On LocalBodyID and Zonetype
        
        $tableDescribtion=$this->Datamodel->getTableDescribtion($zonetypeid[$check]);
        //echo('Select Address :'.$selectAddress);
        //print_r($tableDescribtion);
        switch($check){
            case 0:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getDistrictBasedLocalBody($this->input->post('district_id'),$this->input->post('urbanrural')),$tableDescribtion,$check);break;
            //case 1:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getVillageByBlock($this->input->post('blockordistrict_id')),$tableDescribtion,$selectAddress);break;
            case 8:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getUrbanAndRuralBlock($this->input->post('district_id'),$this->input->post('urbanrural')),$tableDescribtion,$check);break;
            case 9:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getClustersByBlock($this->input->post('block_id')),$tableDescribtion,$check);break;
            case 10:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getAssemblyIDbyDistrict($this->input->post('district_id')),$tableDescribtion,$check);break;
            case 11:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getParlimentIDbyDistrict($this->input->post('assembly_id')),$tableDescribtion,$check);break;
            case 12:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getEducationDistrictbyDistrict($this->input->post('district_id')),$tableDescribtion,0);break;
            case 13:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getAllHabitationBylocalbidyid($this->input->post('village_ward')),$tableDescribtion,13);break;
            //case 13:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getAllHabitationBylocalbidyid($this->input->post('village_panchayat_id')),$tableDescribtion,13);break;
            case 7:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getZonebyDistrict($this->input->post('district_id'),$zonetypeid[$check],$selectAddress),$tableDescribtion,$check);break;//2 click to 3 drop values
        }
        
        print_r($opt);
    }
    
    
    function bankaddressChainDetail(){
        $selectAddress=$this->uri->segment(3,0);
        $zonetypeid[0]='';                              //
        $zonetypeid[1]='schoolnew_bank';                //Based On bank_dist_id
        $zonetypeid[2]='schoolnew_branch';              //Based On bank_id
        $zonetypeid[3]='schoolnew_branch';
        
        
        $tableDescribtion=$this->Datamodel->getTableDescribtion($zonetypeid[$selectAddress]);
        
        switch($selectAddress){
            case 1:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getBankByBankDistrict($this->input->post('bankdistrict_id')),$tableDescribtion,$selectAddress);break;
            case 2:$opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getBranchByBank($this->input->post('bankname_id')),$tableDescribtion,1);break;
            //case 3:$opt=preg_replace('/\s+/', '', $this->Datamodel->getIFSCByBranch($this->input->post('bankbranch_id'))[0]['ifsc_code']);
            case 3:$opt=preg_replace('/\s+/', '|', trim($this->Datamodel->getIFSCByBranch($this->input->post('bankbranch_id'))[0]['ifsc_code']));
        }
        
        echo($opt);
    }
    
    
    function getSTDCodeByDistrictID(){
        $tableDescribtion=$this->Datamodel->getTableDescribtion('schoolnew_stdcode_mas');
        $opt=$this->Homemodel->createOptionForSelection($this->Datamodel->getSTDCodeByDistrict($this->input->post('district_id'),0),$tableDescribtion,0);
        echo($opt);
    }
    
    public function schoolupdation()
    {
        //print_r($_POST);
        //die();
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $part=$this->uri->segment(3,0);
        
        /*$tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academicinfo';
        $tableNames[2]='schoolnew_academicinfo2';
        $tableNames[3]='schoolnew_land';
        $tableNames[4]='schoolnew_building';
        $tableNames[5]='schoolnew_infradet';
        $tableNames[6]='schoolnew_fund';*/
        
        $tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academic_detail';
        $tableNames[2]='schoolnew_infra_detail';
        $tableNames[3]='schoolnew_training_detail';
        $tableNames[4]='schoolnew_textbook_detail';
        $tableNames[5]='schoolnew_committee_detail';
        $tableNames[6]='schoolnew_fund';
        $tableNames[7]='schoolnew_grants_details';
        $tableNames[8]='schoolnew_finance_details';
        $tableNames[9]='schoolnew_safety_details';
        
        
        //All Tables are Multiple Insert Recurresive Table
        //$tableNames[7]='schoolnew_building_abs';
        $tableNames[10]='schoolnew_ictentry';
        $tableNames[11]='schoolnew_internet';
        $tableNames[12]='schoolnew_labentry';
        $tableNames[13]='schoolnew_equipment';
        $tableNames[14]='schoolnew_inventry';
        $tableNames[15]='schoolnew_medical';
        $tableNames[16]='schoolnew_feestruct';
        $tableNames[17]='schoolnew_mediumentry';
        $tableNames[18]='schoolnew_voctrade_entry';
        $tableNames[19]='schoolnew_langtaught_entry';
        $tableNames[20]='schoolnew_dayswork_entry';
        $tableNames[21]='schoolnew_extracc_entry';
        $tableNames[22]='schoolnew_inspection_entry';
        $tableNames[23]='schoolnew_natureofconst_entry';
        $tableNames[24]='schoolnew_library_entry';
        $tableNames[25]='schoolnew_classroomlevel_entry';
    
        $this->postCorrection();
        
        $tableID=0;
        foreach($tableNames as $tbs => $tablename){
            if($tablename=='schoolnew_basicinfo'){
                $referID='udise_code';$referValue=$this->session->userdata('emis_school_udise');
                //$referID='school_id';$referValue=$this->session->userdata('emis_school_id');
            }
            else{
                $referID='school_key_id';$referValue=$this->session->userdata('emis_school_id');
            }
            $data['tableName']=$tablename;  
            $data['referenceID']=$referID;
            $data['referenceValue']=$referValue;
            $data['data']=$this->_remap(part1andpart2,$data['tableName']);
            $data['InsertCheck']=null;
            //echo($tablename.'<br>');
            if($tableID > 9){
                if(!isset($_POST[$tablename])){
                    continue;
                }
                else{
                    echo $tablename."<br>";
                    //if($_POST[$tablename]!='' && (!empty($_POST[$tablename]))){
                        $data['data']=$_POST[$tablename];
                        $data['InsertCheck']=3;
                    //}
                }
            }
            if($data['data']!=''){
                if(!$this->_remap(InsertAndUpdate,$data)){
                    print_r($data['data']);die("Error :".$tablename);
                    $this->session->set_flashdata('errors','Unable to update. please try after some time.-'.$tablename);
                    redirect('Basic/emis_school_details_entry/'.$part.'/error');
                }
            }
            $tableID++;
        }
        $data=array('school_key_id' => $this->session->userdata('emis_school_id'),'part_'.$part => 1);
        if($this->Homemodel->UpdateProfileCompleteFlag($data,$this->session->userdata('emis_school_id'))){
            //print_r($_POST);die("Completed");
            $this->session->set_userdata('school_profile',$this->Datamodel->getProfileComplete($this->session->userdata('emis_school_udise')));
            
            $allpart=8;$checkpart=6;
            
            //if($part>=$checkpart){
                if($this->session->userdata('school_manage')<5){
                    if($this->session->userdata('school_manage')==3 && $part==7){
                        $this->Homemodel->updatetemplog($this->session->userdata('emis_user_sno'));
                        redirect('Home/emis_school_dash');
                    }
                    else if($this->session->userdata('school_manage')==1 && $part==6){
                        $part=8;
                    }
                    else if($part==8){
                        $this->Homemodel->updatetemplog($this->session->userdata('emis_user_sno'));
                        redirect('Home/emis_school_dash');
                    }
                    else{
                        $part+=1;
                    }
                }
            //}
            redirect('Basic/emis_school_details_entry/'.($part).'/success');
            
            /*switch($part){
                case 1:redirect('Basic/emis_school_details_entry/2/success');break;
                case 2:redirect('Basic/emis_school_details_entry/3/success');break;
                case 3:redirect('Basic/emis_school_details_entry/4/success');break;
                case 4:redirect('Basic/emis_school_details_entry/5/success');break;
                case 5:redirect('Basic/emis_school_details_entry/6/success');break;
                case 6:{
                    
                     redirect('Basic/emis_school_details_entry/8/success');
                     
                    break;
                }
                case 7:redirect('Home/emis_school_dash');break;
                case 8:redirect('Home/emis_school_dash');break;
                
            }*/
        }else{
            $this->session->set_flashdata('errors','Unable to update. please try after some time.-schoolnew_profilecomplete');
            redirect('Basic/emis_school_details_entry/'.$part.'/error');
        }
    }
    
    
    function postCorrection(){
        $created_date=date('Y-m-d',strtotime("now+5hours30minutes"));
        $yearrecarray=array();
        foreach($_POST as $post => $value){
            switch($post){
                case 'urbanrural':$_POST['town_panchayat_id']=$_POST['urbanrural'];break;
                case 'addressline_1':$_POST['address']=$_POST['addressline_1'].'\n'.$_POST['addressline_2'];break;
                case 'yearofrec_0':{$i=0;
                    while(isset($_POST['yearofrec_'.$i])){
                        switch($_POST['yearofrec_'.$i]){
                            case 1:$_POST['yr_rec_schl_elem']=$_POST['firstRecognition_'.$i];break;
                            case 2:$_POST['yr_rec_schl_sec']=$_POST['firstRecognition_'.$i];break;
                            case 3:$_POST['yr_rec_schl_hsc']=$_POST['firstRecognition_'.$i];break;
                        }
                        $yearrecarray[]=$_POST['yearofrec_'.$i];
                        $i++;
                        
                    }
                    $ycheck=0;
                    while($ycheck<4){
                        if(!in_array($ycheck,$yearrecarray)){
                            switch($ycheck){
                                case 1:$_POST['yr_rec_schl_elem']=NULL;break;
                                case 2:$_POST['yr_rec_schl_sec']=NULL;break;
                                case 3:$_POST['yr_rec_schl_hsc']=NULL;break;
                            }
                        }
                        $ycheck++;
                    }
                    
                    break;
                }
                
                case 'ccesh_0':{$i=0;
                    while(isset($_POST['ccesh_'.$i])){
                        switch($_POST['ccesh_'.$i]){
                            case 1:$_POST['cce_imp_schl_elem']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                            case 2:$_POST['cce_imp_schl_sec']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                            case 3:$_POST['cce_imp_schl_hsc']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                        }
                        $i++;
                    }
                }
                
                case 'hiddenmedium_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['instructedlang_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'medium_instrut'    =>      $_POST['instructedlang_'.$i],
                                        'other_medium'       =>     $_POST['ifothers_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $_POST['noof_med']=$i-1;
                    $tbname=$_POST['hiddenmedium_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenlanguage_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['languagetaught_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'lang_taught'       =>      $_POST['languagetaught_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $tbname=$_POST['hiddenlanguage_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenvoctrades_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['prevocationaltrades_'.$i]) && $_POST['prevocationaltrades_'.$i]!=NULL){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'voc_trade'         =>      $_POST['prevocationaltrades_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $tbname=$_POST['hiddenvoctrades_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenclub_0':{$i=1;$dtmulti=array();
                    while(isset($_POST['club_'.$i])){
                       $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'extra_cc'          =>      $_POST['club_'.$i],
                                        'other_cc'          =>      $_POST['ifothersd_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenclub_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenlbrc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lbrc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'library_type'          =>      $_POST['lbrc_'.$i],
                                        'num_books'             =>      $_POST['lbr1_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenlbrc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                    break;
                }
                case 'hiddenoac_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['oac_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'school_type'          =>   $_POST['oac_'.$i],
                                        'num_rooms'          =>     $_POST['hmr_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenoac_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddennoc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['noc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'             =>      $this->session->userdata('emis_school_id'),
                                        'construct_type'            =>      $_POST['noc_'.$i],
                                        'total_flrs'                =>      $_POST['totalarea_'.$i],
                                        'tot_classrm_use'           =>      $_POST['classroominuse_'.$i],
                                        'tot_classrm_nouse'         =>      $_POST['classroomnotuse_'.$i],
                                        'off_room'                  =>      $_POST['officeroom_'.$i],
                                        'lab_room'                  =>      $_POST['labroom_'.$i],
                                        'library_room'              =>      $_POST['libraryroom_'.$i],
                                        'comp_room'                 =>      $_POST['com_'.$i],
                                        'art_room'                  =>      $_POST['gam_'.$i],
                                        'staff_room'                =>      $_POST['staffroom_'.$i],
                                        'hm_room'                   =>      $_POST['sra_'.$i],
                                        'girl_room'                 =>      $_POST['scrg1_'.$i],
                                        'good_condition'            =>      $_POST['goodcondition_'.$i],
                                        'need_minorrep'             =>      $_POST['needminorrep_'.$i],
                                        'need_majorrep'             =>      $_POST['needmajorrep_'.$i],
                                        'total_room'                =>      $_POST['noofrooms_'.$i],
                                        'created_date'              =>      $created_date
                                     );
                        $i++;
                    }
                    $tbname=$_POST['hiddennoc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenhours_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['sch_'.$i])){
                            $chld=explode(":",$_POST['childrenhours_'.$i]);
                            $teas=explode(":",$_POST['teacherhours_'.$i]);
                          $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'school_type'           =>      $_POST['sch_'.$i],
                                        'instr_dys'             =>      $_POST['instructdays_'.$i],
                                        'hrs_chldrn_sty_schl'   =>      (int) $chld[0],
                                        'mns_chldrn_sty_schl'   =>      (int) $chld[1],
                                        'hrs_tchrs_sty_schl'    =>      (int) $teas[0],
                                        'mns_tchrs_sty_schl'    =>      (int) $teas[1],
                                        'cce_impl'              =>      $_POST['ccesch_'.$i],
                                        'cce_cum'               =>      $_POST['crm_'.$i],
                                        'cce_shared'            =>      $_POST['crs_'.$i],
                                        'created_date'          =>      $created_date
                                     );
                        $i++;
                    }
                    $tbname=$_POST['hiddenhours_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenofficer000_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['officer000_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'officer_type'          =>      $_POST['officer000_'.$i],
                                        'purpose'               =>      $_POST['officer00_'.$i],
                                        'date_inspect'          =>      date('Y-m-d',strtotime($_POST['visitdate_'.$i])),
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenofficer000_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddensd_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['sd_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'ict_type'              =>      $_POST['sd_'.$i],
                                        'avail_nos'             =>      $_POST['avai_'.$i],
                                        'working_nos'           =>      $_POST['func_'.$i],
                                        'supplied_by'           =>      $_POST['supp_'.$i],
                                        'donor_ict'             =>      $_POST['ifotherngo_'.$i],
                                        'purpose'               =>      $_POST['prupu_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddensd_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddencmpname_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['cmpname_'.$i]) && $_POST['internet']==1){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'provided_by'           =>      $_POST['internetfacility_'.$i],
                                        'other_ngo'             =>      $_POST['ifother_'.$i],
                                        'subscriber'            =>      $_POST['cmpname_'.$i],
                                        'data_speed'            =>      $_POST['speed_'.$i],
                                        'range_unit'            =>      $_POST['range_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddencmpname_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenlablist_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lablist_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'lab_id'                =>      $_POST['lablist_'.$i],
                                        'seperate_room'         =>      $_POST['spr_'.$i],
                                        'condition_now'         =>      $_POST['equip_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenlablist_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenkit_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['kit_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'equip_id'              =>      $_POST['kit_'.$i],
                                        'supplied_by'           =>      $_POST['supp1_'.$i],
                                        'ngo_name'              =>      $_POST['supplyth_'.$i],
                                        'quantity'              =>      $_POST['func1_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenkit_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenlot_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lot_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'inventry_id'           =>      $_POST['lot_'.$i],
                                        'supplied_by'           =>      $_POST['supply_'.$i],
                                        'donor_invent'          =>      $_POST['iflisup_'.$i],
                                        'avail_nos'             =>      $_POST['avail_'.$i],
                                        'working_nos'           =>      $_POST['funct_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenlot_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddeninstifee_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['instifee_'.$i])){
                        $exp=$_POST['classid_'.$i];
                        if($exp==-3){$cls=15;}elseif($exp==-2){$cls=14;}elseif($exp==-1){$cls=13;}else{$cls=$exp;}
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'class_id'              =>      $cls,
                                        'inst_fee'              =>      $_POST['instifee_'.$i],
                                        'tution_fee'            =>      $_POST['tutfee_'.$i],
                                        'regular_fee'           =>      $_POST['regularfee_'.$i],
                                        'transport_fee'         =>      $_POST['transfee_'.$i],
                                        'annual_fee'            =>      $_POST['annualfee_'.$i],
                                        'book_fee'              =>      $_POST['bookfee_'.$i],
                                        'lab_fee'               =>      $_POST['labfee_'.$i],
                                        'other_fee'             =>      $_POST['otherfee_'.$i],
                                        'total_fee'             =>      $_POST['totfee_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddeninstifee_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
            }
            if($value==''){$value=null;}
        }
    }
    
    function part1andpart2($tbdesc=null){
                //print_r($_POST);
        $tableDescribtion=$this->Datamodel->getTableDescribtion($tbdesc);
        foreach($tableDescribtion as $tds){
            foreach($_POST as $post => $value){
                if($tds['Field']==$post){
                    if($value=='' && $value=null){
                        $data[$post]=null;
                    }
                    else{
                        $data[$post]=$value;
                    }
                }
            }
        }
        //echo('<br><br>');
        //print_r($_POST);
        //echo('<br><br>');
        return $data;
    }
    function _remap($method,$args){
        if (method_exists($this, $method)){
            $data=$this->$method($args);
            return $data;
        }
        else{
            $this->index($method,$args);
        }
    }
   
  
    
    function InsertAndUpdate($data=null){
        //print_r($data);
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) {
            /*'edu_district_id' => $this->input->post('yearofestablishment'),             //Establishment of School
                'offcat_id' => $this->input->post('firstRecognition'),                      //Year of Recognition
                'office_email1' => $this->input->post('lastrenewal'),                       //Year of Recognition
                'office_email2' => $this->input->post('lastrenewalcertificatenumber')      //Year of Recognition*/
           if($this->Homemodel->UpdateToTableData($data['tableName'],$data['referenceID'],$data['data'],$data['referenceValue'],$data['InsertCheck'])){
                unset($_POST[$data['tableName']]);
                return true;
           }
           else{
                $this->session->set_flashdata('errors','Unable to update. please try after some time.');
                return false;
           }
        }
    }
    
    
    function getPartInformationByPost(){
        /*$tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academicinfo';
        $tableNames[2]='schoolnew_academicinfo2';
        $tableNames[3]='schoolnew_land';
        $tableNames[4]='schoolnew_building';
        $tableNames[5]='schoolnew_infradet';
        $tableNames[6]='schoolnew_fund';schoolnew_basic_detail*/
        
        
        $tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academic_detail';
        $tableNames[2]='schoolnew_infra_detail';
        $tableNames[3]='schoolnew_training_detail';
        $tableNames[4]='schoolnew_textbook_detail';
        $tableNames[5]='schoolnew_committee_detail';
        $tableNames[6]='schoolnew_fund';
        $tableNames[7]='schoolnew_grants_details';
        $tableNames[8]='schoolnew_finance_details';
        $tableNames[9]='schoolnew_safety_details';
        
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);die();
        
        /*foreach($data as $pidx => $pval){
            echo($pidx."<br>");
        }*/
        $school_udise=$this->session->userdata('emis_school_id')==''?$this->uri->segment(3,0):$this->session->userdata('emis_school_id');
        $i=0;
        foreach($tableNames as $key => $table){
            if($table=='schoolnew_basicinfo'){
                $referID='school_id';$referValue=$school_udise;
            }
            else{
                $referID='school_key_id';$referValue=$school_udise;
            }
            $tdata=$this->Homemodel->ModelForAllParts($table,$referID,$referValue);
            /*if(!($tdata=$this->Homemodel->ModelForAllParts($table,$referID,$referValue)))
            {
                die('Error In DataBase');
            }*/
            $yearreccheckbit=0;$yearrec=array();
            if(isset($tdata[0])){
                foreach($tdata[0] as $tidx =>$tval){
                    //print_r($tidx);
                    foreach($data as $pidx => $pval){
                        if($tidx == $pidx){
                            $vdata[$tidx]=$tval;
                            $i++;
                        }
                        else{
                            switch($tidx){
                                case 'urbanrural':{$vdata['urbanrural']=$tval==0?2:$tval;
                                $vdata['urbanruraltext']=($vdata['urbanrural']=='2'?'Urban':'Rural');break;}
                                case 'address':$add=explode('\n',$tval);$vdata['addressline_1']=$add[0];$vdata['addressline_2']=$add[1];
                                case 'yr_rec_schl_elem':
                                case 'yr_rec_schl_sec':
                                case 'yr_rec_schl_hsc':{
                                     if(($tval!=0 || $tval!=null)){
                                        if($tidx=='yr_rec_schl_elem' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=1;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_elem';
                                        }
                                        elseif($tidx=='yr_rec_schl_sec' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=2;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_sec';
                                        }
                                        elseif($tidx=='yr_rec_schl_hsc' && (!in_array($tidx,$yearrec))){
                                            $vdata['yearofrec_'.$yearreccheckbit]=3;
                                            $vdata['firstRecognition_'.$yearreccheckbit]=$tval;
                                            $yearreccheckbit++;
                                            $yearrec[]='yr_rec_schl_hsc';
                                        }
                                        
                                     }
                                    break;
                                }
                                case 'local_body_id':$vdata['localbody_id']=$tval;break;
                                case 'lb_vill_town_muni':$vdata['village_ward']=$tval;break;
                                case 'lb_habitation_id':$vdata['vill_habitation_id']=$tval;break;
                            }
                        }
                    }
                }
            }
        }
        
        foreach($data as $pidx => $pval){
            if (strpos($pidx, 'hidden') !==false) {
                $referID='school_key_id';$referValue=$school_udise;
                $tdata=$this->Homemodel->ModelForAllParts($pval,$referID,$referValue);
                switch($pidx){
                    case 'hiddenmedium_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            if($tval->other_medium!=''){
                                $vdata['ifothers_'.$i]=$tval->other_medium;
                            }
                            $vdata['instructedlang_'.$i]=$tval->medium_instrut;
                            $i++;
                            //print_r($tval);echo('<br>');
                        }
                        break;
                    }
                    case 'hiddenlanguage_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['languagetaught_'.$i]=$tval->lang_taught;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenhours_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sch_'.$i]=$tval->school_type;
                            $vdata['instructdays_'.$i]=$tval->instr_dys;
                            $vdata['childrenhours_'.$i]=date('H:i',strtotime($tval->hrs_chldrn_sty_schl.':'.$tval->mns_chldrn_sty_schl));
                            $vdata['teacherhours_'.$i]=date('H:i',strtotime($tval->hrs_tchrs_sty_schl.':'.$tval->mns_tchrs_sty_schl));
                            $vdata['ccesch_'.$i]=$tval->cce_impl==null?0:$tval->cce_impl;
                            $vdata['crm_'.$i]=$tval->cce_cum==null?0:$tval->cce_cum;
                            $vdata['crs_'.$i]=$tval->cce_shared==null?0:$tval->cce_shared;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenclub_0':{$i=1;
                        foreach($tdata as $tidx => $tval){
                            $vdata['club_'.$i]=$tval->extra_cc;
                            $vdata['ifothersd_'.$i]=$tval->other_cc;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenofficer000_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['officer000_'.$i]=$tval->officer_type;
                            $vdata['officer00_'.$i]=$tval->purpose;
                            $vdata['visitdate_'.$i]=date('Y-m-d',strtotime($tval->date_inspect));
                            $i++;
                        }
                        break;
                    }
                    case 'hiddensd_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sd_'.$i]=$tval->ict_type;
                            $vdata['avai_'.$i]=$tval->avail_nos;
                            $vdata['func_'.$i]=$tval->working_nos;
                            $vdata['supp_'.$i]=$tval->supplied_by;
                            $vdata['ifotherngo_'.$i]=$tval->donor_ict;
                            $vdata['prupu_'.$i]=$tval->purpose;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddencmpname_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['internetfacility_'.$i]=$tval->provided_by;
                            $vdata['ifother_'.$i]=$tval->other_ngo;
                            $vdata['cmpname_'.$i]=$tval->subscriber;
                            $vdata['speed_'.$i]=$tval->data_speed;
                            $vdata['range_'.$i]=$tval->range_unit;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlablist_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lablist_'.$i]=$tval->lab_id;
                            $vdata['spr_'.$i]=$tval->seperate_room;
                            $vdata['equip_'.$i]=$tval->condition_now;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenkit_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['kit_'.$i]=$tval->equip_id;
                            $vdata['supp1_'.$i]=$tval->supplied_by;
                            $vdata['supplyth_'.$i]=$tval->ngo_name;
                            $vdata['func1_'.$i]=$tval->quantity;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlot_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->inventry_id;
                            $vdata['supply_'.$i]=$tval->supplied_by;
                            $vdata['iflisup_'.$i]=$tval->donor_invent;
                            $vdata['avail_'.$i]=$tval->avail_nos;
                            $vdata['funct_'.$i]=$tval->working_nos;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddeninstifee_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->class_id;
                            $vdata['instifee_'.$i]=$tval->inst_fee;
                            $vdata['tutfee_'.$i]=$tval->tution_fee;
                            $vdata['regularfee_'.$i]=$tval->regular_fee;
                            $vdata['transfee_'.$i]=$tval->transport_fee;
                            $vdata['annualfee_'.$i]=$tval->annual_fee;
                            $vdata['bookfee_'.$i]=$tval->book_fee;
                            $vdata['labfee_'.$i]=$tval->lab_fee;
                            $vdata['otherfee_'.$i]=$tval->other_fee;
                            $vdata['totfee_'.$i]=$tval->total_fee;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddennoc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['noc_'.$i]=$tval->construct_type;
                            $vdata['totalarea_'.$i]=$tval->total_flrs;
                            $vdata['classroominuse_'.$i]=$tval->tot_classrm_use;
                            $vdata['classroomnotuse_'.$i]=$tval->tot_classrm_nouse;
                            $vdata['officeroom_'.$i]=$tval->off_room;
                            $vdata['labroom_'.$i]=$tval->lab_room;
                            $vdata['libraryroom_'.$i]=$tval->library_room;
                            $vdata['com_'.$i]=$tval->comp_room;
                            $vdata['gam_'.$i]=$tval->art_room;
                            $vdata['staffroom_'.$i]=$tval->staff_room;
                            $vdata['sra_'.$i]=$tval->hm_room;
                            $vdata['scrg1_'.$i]=$tval->girl_room;
                            $vdata['goodcondition_'.$i]=$tval->good_condition;
                            $vdata['needminorrep_'.$i]=$tval->need_minorrep;
                            $vdata['needmajorrep_'.$i]=$tval->need_majorrep;
                            $vdata['noofrooms_'.$i]=$tval->total_room;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlbrc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lbrc_'.$i]=$tval->library_type;
                            $vdata['lbr1_'.$i]=$tval->num_books;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenoac_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['oac_'.$i]=$tval->school_type;
                            $vdata['hmr_'.$i]=$tval->num_rooms;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenvoctrades_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['prevocationaltrades_'.$i]=$tval->voc_trade;
                            $i++;
                        }
                        break;
                    }
                }
            }
        }
        echo(json_encode($vdata));
    }
    
    function schoolRenewalsubmit(){
       //print_r($_POST);die(); 
	   // AWS Info
       //Uploading Files to Bucket
       //print_r($_FILES);die();
	   $bucketName = 'renewalapplicationemis';
	   $IAM_KEY = 'AKIAI3EE36AJMUO6YBVQ';
	   $IAM_SECRET = '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';
	   // Connect to AWS
	   try {
		  // You may need to change the region. It will say in the URL when the bucket is open
		  // and on creation.
		  $s3 = S3Client::factory(
			 array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'ap-south-1'
			)
		  );
	   } catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	   }
       $temp=$i=0;
       $udise=$this->session->userdata('emis_school_udise');
       $fileIndex=['cmp_file_','latestPermission_','challan_'];
       $certificate=$this->Homemodel->getCertificateMaster();
       foreach($fileIndex as $f){
            if($f=='cmp_file_'){
                $i=$certificate[$temp]->id;
            }
            $var=$f.$i;
            while(isset($_FILES[$var])){
                $total = count($_FILES[$var]['name']);//echo($total);die();
                for($j=0;$j<$total;$j++){
                    if(is_array($_FILES[$var]['name'])){
                        if($_FILES[$var]['name'][$j]!='' && $_FILES[$var]['name'][$j]!=null){
                            $ext=explode('.',basename($_FILES[$var]['name'][$j]));
                            $mime=$_FILES[$var]['mime'][$j];
                            $tmpname=$_FILES[$var]['tmp_name'][$j];
                        }
                        else{
                            continue;
                        }
                    }
                    else{
                       if($_FILES[$var]['name']!=null && $_FILES[$var]['name']!=''){
                            $ext=explode('.',basename($_FILES[$var]['name']));
                            $mime=$_FILES[$var]['mime'];
                            $tmpname=$_FILES[$var]['tmp_name'];
                        }
                        else{
                            continue;
                        } 
                    }
                    $fname=$udise.'_'.uniqid($certificate[$temp]->id.'_').'.'.$ext[1];
                    $keyName = 'Renewal_Application_TESTING/' . $fname;
                    $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
                    try {    
	                   $s3->putObject(
                            array(
				                                'Bucket'        =>  $bucketName,
				                                'Key'           =>  $keyName,
				                                'SourceFile'    =>  $tmpname,
				                                'StorageClass'  =>  'STANDARD',
                                        'ContentType'   =>  $mime,
                                        'ACL'           => 'public-read'
                                                
                            )
                        );
                        $s3->waitUntil('ObjectExists', array(
                                            'Bucket' => $bucketName,
                                            'Key'    => $keyName
                            ));
                        $plainUrl = $s3->getObjectUrl($bucketName, $keyName); 
                        $filesArray[$var][$j]=$plainUrl;       
                        //echo('<br>'.$var.'---'.$j.'  ');print_r($filesArray);
                    } catch (S3Exception $e) {die('Error:'.$e->getMessage());} catch (Exception $e) {die('Error:'.$e->getMessage());}
                }
                if($f=='cmp_file_'){
                    $temp++;
                    $i=$certificate[$temp]->id;
                    $var=$f.$i;
                }
                elseif($f!='cmp_file_'){
                    $i++;
                    $var=$f.$i;    
                }
            }
            $i=0;
        }
        
        
        //die();
        //Data Insert Applying Renewal
        $timestamp=date("Y-m-d H:i:s",time());
        $renewal_id=($_POST['renewal_id']==''||$_POST['renewal_id']==0)?time():$_POST['renewal_id'];
        $data=array(
                    'school_key_id'        => $_POST['school_key_id'],
                    'lastrenewal_filename' => $_FILES['latestPermission_0']['name'],
                    'lastrenewal_filepath' => $filesArray['latestPermission_0'][0],
                    'createddate'          => $timestamp,
                    'condsatisfied'        => $_POST['condsatisfied'], 
                    'auth'                 => 0,
                    'timestamp'            => $timestamp,
                    'renewal_id'           => $renewal_id
                   );
                   
        if(!($renewal=$this->Homemodel->RenewalInsert($data,'schoolnew_renewal',2))){
            die('Renewal Failed');
        }
        
        //Renewal Category Insert
        $i=0;
        $category=['renewal','upgrade','additional'];
        unset($data);
        foreach($category as $c => $cat){
            if(isset($_POST['amount_'.$i]) && isset($_POST[$cat])){
                $data[$i]=array(
                        'renewal_id'        =>  $renewal,
                        'applied_category'  =>  $_POST[$cat],
                        'amount'            =>  $_POST['amount_'.$i],
                        'challan_no'        =>  $_POST['challannumber_'.$i],
                        'challan_date'      =>  $_POST['challandate_'.$i],
                        'ifsc_code'         =>  $_POST['ifsc_'.$i],
                        'challan_filename'  =>  $_FILES['challan_'.$i]['name'],
                        'challan_filepath'  =>  $filesArray['challan_'.$i][0]
                );
            }
            $i++;    
        }
        //print_r($data);
        //die();
        if(!$this->Homemodel->RenewalInsert($data,'schoolnew_renewcategory',3)){
            die('Renewal Category Failed');
        }
        unset($data);
        $i=0;$z=0;
        //print_r($filesArray);die();
        foreach($certificate as $cer){
            $cerid=$cer->id;
            $var='cmp_file_'.$cerid;
            $j=0;
            if(isset($filesArray[$var])){
                foreach($filesArray[$var] as $index => $filepath){
                    $data[$z]=array(
                            'renewal_id'            =>  $renewal,
                            'certificate_id'        =>  $cerid,
                            'certificate_filename'  =>  $_FILES[$var]['name'][$j++],
                            'certificate_filepath'  =>  $filepath,
                            'auth'                  =>  0
                    );
                    //echo("<br>".$var."-----".$filepath);
                    $z++;
                }
            }
        }
        //die();
        if(!$this->Homemodel->RenewalInsert($data,'schoolnew_renewalfiles',3)){
            die('Renewal Files Failed');
        }
        redirect('Home/renewalform','refresh');
		//$this->load->view('renewal/renewalform',$data);
    }
    function pdf()
    {
        if($this->uri->segment(3,0)!=null){
            $school_udise=$this->uri->segment(3,0);
        }
        else{
            $school_udise=$this->session->userdata('emis_school_id');
        }
        //Get Module_id 
        $module=($this->uri->segment(5,0)==''||$this->uri->segment(5,0)==0)?1:$this->uri->segment(5,0); 
        $ts=" WHERE schoolnew_renewal.school_key_id=".$school_udise." GROUP BY school_key_id";
        $where=" schoolnew_renewal.school_key_id=".$school_udise." AND (vaild_upto IS NULL OR vaild_upto > DATE(NOW()))";
        //$data['renew']=$this->Blockmodel->getallrenewallist($where,$ts);
        $this->load->model('AllApproveModel');
        $data['renew']=$this->AllApproveModel->AllApproveExcute($where,$ts,$module,'');
        $data['user']=$this->AllApproveModel->getAllUserCategory();
        $directorate_dee=array(16,18,27,29,32,34);
        $approved=array();
        if(!empty($data['renew'])){
            foreach($data['renew'] as $d){
                foreach($data['user'] as $user){
                    if($user['id']==$d['approvedby'] && !in_array($d['approvedby'],$approved)){
                        $comment[$user['id']]['filenumber']=$d['filenumber'];
                        $comment[$user['id']]['ts']=$d['ts'];
                        $finalcat=0;
                        if($user['id']==$d['final_cat_id']){
                           $comment['comment']=$d['approveremarks']; 
                           $finalcat=1;
                        }
                        $display=$this->AllApproveModel->usercategoryDisplay($user['id'],$d['sch_directorate_id']);
                        $comment[$user['id']]['username']=$display[0]['display_text'];
                        $comment[$user['id']]['discontent']=$display[0]['display_content'];
                        $comment[$user['id']]['finalcat']=$finalcat;
                        array_push($approved,$d['approvedby']);
                        $dir=$d['sch_directorate_id'];
                    }
                }
                /*if($d['approvedby']==2){
                    $rc=$d['filenumber'];
                    $dt=$d['ts'];    
                    if(in_array($d['sch_directorate_id'],$directorate_dee)){
                        $comment=$d['approveremarks'];  
                    }
                }
                elseif($d['approvedby']==1){
                    $rc1=$d['filenumber'];
                    $dt1=$d['ts'];  
                    $comment=$d['approveremarks'];  
                }
                elseif($d['approvedby']==3){
                    $rc2=$d['filenumber'];
                    $dt2=$d['ts'];    
                }*/
            }
        }
        else{die('RENEWAL FILE EXPIRED DATE EXPIRED : ASK FOR RE-APPLICATION ELSE QUEUE TO RESET ALL');}
        //print_r($comment);die();
        $data['comment']=$comment;
        $content=$this->load->view('ceo/pdfreport',$data,true);
        //echo($content);die();
        $pdfFilePath = "output_pdf_name.pdf";
        //load mPDF library
        //$this->load->library('M_pdf');
        if($module==1){
            $this->m_pdf = new mpdf('"UTF-8","A4","","",10,10,10,10,6,3');
            $content=$this->load->view('ceo/pdfreport',$data,true);
        }elseif($module==4 && $dir!=28){
            $this->m_pdf = new mpdf('ta',[210,297]);
            $content=$this->load->view('newSchool/pdfreport',$data,true);
        }elseif($module==4 && $dir==28){
            $this->m_pdf = new mpdf('ta',[210,297]);
            $content=$this->load->view('newSchool/pdfreportdms',$data,true);
        }
        //echo($content);die();
        //generate the PDF from the given html
        $this->m_pdf->showImageErrors = true;
        $this->m_pdf->WriteHTML($content);
        //download it.
        $this->m_pdf->Output($pdfFilePath, "I");
    }
   /**************************************************************************************************************/
    function callscheme() { 
        $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
        // print_r($data['scheme']);
        $this->load->view('freeSchemes/schemehome',$data);
    }
    function calldemo() { 
        $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
        $this->load->view('freeSchemes/stusch',$data);
    }
    function callbusindent() { 
        $school_id=$this->session->userdata('emis_school_id');
        $lowandhigh=$this->Datamodel->getclasslist($school_id);
        if($lowandhigh[0]->low_class==13 || $lowandhigh[0]->low_class==14 || $lowandhigh[0]->low_class==15){
            $lowandhigh[0]->low_class=1;
        }
        $data['class_id']=$this->Datamodel->getallclassstudying1($lowandhigh[0]->low_class,$lowandhigh[0]->high_class);
        $this->load->view('freeSchemes/busindent',$data);
    }
    
    function callbusdis() { 
        $school_id=$this->session->userdata('emis_school_id');
        $lowandhigh=$this->Datamodel->getclasslist($school_id);
        if($lowandhigh[0]->low_class==13 || $lowandhigh[0]->low_class==14 || $lowandhigh[0]->low_class==15){
            $lowandhigh[0]->low_class=1;
        }
        $data['class_id']=$this->Datamodel->getallclassstudying1($lowandhigh[0]->low_class,$lowandhigh[0]->high_class);
        $this->load->view('freeSchemes/busdis',$data);
    }
    
    function callgeneral() { 
        $scheme=$array = json_decode(json_encode($this->Homemodel->getSchemeCountNotVisible($this->session->userdata('emis_school_id'))), True);
        $notebook=$array = json_decode(json_encode($this->Homemodel->getNotebook($this->session->userdata('emis_school_id'))), True);
        $result = array();$key='class_studying_id';
        foreach($scheme as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        $data['scheme']=$result;
        $result = array();$key='class_studying';
        foreach($notebook as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }   
        $data['notebook']=$result;
        $this->load->view('freeSchemes/generalinfo',$data);
    }
    
    function schemesummary() {
        $vis="schoolnew_freescheme.visibility>-2";
        $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
        $data['summary']=json_decode(json_encode($this->Homemodel->getSummaryCount($this->session->userdata('emis_school_id'))),true);
        $this->load->view('freeSchemes/schemesummary',$data);
    }
    
    function schemeIndentSubmit(){
            
            date_default_timezone_set('Asia/Kolkata');
            $scheme_id=$_POST['scheme_id'];
            $classid=$_POST['class_id'];
            $sectionid = $_POST['section_id'];
            $students=$this->Homemodel->getStudentforScheme($scheme_id,$classid,$this->session->userdata('emis_school_id'),$sectionid);
            
            
            foreach($students as $stud){        
                if((isset($_POST['opt_'.$stud->id]) && $_POST['opt_'.$stud->id]==1)||(isset($_POST['dt_'.$stud->id]))){
                        $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null?$_POST['size_'.$stud->id]:NULL):NULL;
                        $dt=$stud->indent!=null?$stud->indent:date("Y-m-d H:m:s",strtotime("now"));
                        $iid=$stud->iid!=NULL?$stud->iid:NULL;
                        
                        $ser=isset($_POST['ser_'.$stud->id])?($_POST['ser_'.$stud->id]!=null?$_POST['ser_'.$stud->id]:NULL):NULL;
                        if($dis!=NULL){$_POST['finalsub']=1;}
                        $dis=isset($_POST['dt_'.$stud->id])?($_POST['dt_'.$stud->id]!=null?$_POST['dt_'.$stud->id]:NULL):NULL;
                        
                        if(isset($_POST['dt_'.$stud->id])){
                            $update=1;
                        }
                        
                        $result[$i++]=array(
                        'id'=> $iid,
                        'scheme_id'=> $scheme_id,
                        'scheme_category' => $size,
                        'student_id' => $stud->id,
                        'school_id' => $this->session->userdata('emis_school_id'),
                        'class'=> $classid,
                        'indent_date' => $dt,
                        'createddate' => date('Y-m-d h:i:s'),
                        'distribution_date' => $dis,
                        'unique_supply' => $ser,
                        'finalsub' => $_POST['finalsub'],
                        'isactive'=> 1
                        );
                        $check=1;
                    }
                    /*else{
                        if($_POST['opt_'.$stud->id]=='' && $stud->iid!=null && $check==0){
                            $result[$j++]=array('id' => $stud->iid);
                        }
                    }*/
                }
                //print_r($result);die();
                if($update==0){
                    if(!$this->Homemodel->schemeIndent($result,$scheme_id,$classid,$this->session->userdata('emis_school_id'))){
                        print_r($result);
                        die('Error Insert');
                    }
               }
               else{
                  if(!$this->Homemodel->schemeIndentUpdate($result)){
                        print_r($result);
                        die('Error Update');
                  }  
               }  
            redirect($_POST['redirect'],'refresh');
    }

    function generalSchemeIndent(){
        date_default_timezone_set('Asia/Kolkata');
        $cond='(schoolnew_freescheme.visibility=0 OR schoolnew_freescheme.visibility=-1)'; 
        $schemes=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$cond);
        $dt=date("Y-m-d H:i:s",strtotime("now"));$i=0;$update=0;
        
        foreach($schemes as $sch){
            $students=$this->Homemodel->getStudentsBetweenClass($this->session->userdata('emis_school_id'),$sch->id);
            foreach($students as $stud){
                $result[$i++]=array(
                    'id'=> NULL,
                    'scheme_id'=> $sch->id,
                    'scheme_category' => $stud->schcat,
                    'student_id' => $stud->studid,
                    'indent_date' => $dt,
                    'createddate' => $dt,
                    'distribution_date' => date("Y-m-d H:i:s",strtotime("now")),
                    'finalsub' => 1
                );
            }
        }
        //print_r($result);die();
        if(!$this->Homemodel->fullindent($result)){
                //print_r($result);
                die('Error');
        }
        redirect('Basic/schemesummary','refresh');
        //print_r($result);die();
    }
    
    function busIndentSubmit(){
        date_default_timezone_set('Asia/Kolkata');
        $school_id=$this->session->userdata('emis_school_id');
        $students=json_decode(json_encode($students=$this->Homemodel->studentsInClass($_POST['selected_class'],$school_id)),true);
        $i=0;
        //print_r($_POST);
        foreach($students as $stud){
            //echo($stud['id'].'<br>');
            if($_POST['opt_'.$stud['id']]==1){
                
                if(isset($_POST['dt_'.$stud['id']]))
                    $dist_date=$_POST['dt_'.$stud['id']]==''?null:$_POST['dt_'.$stud['id']];
                elseif(isset($_POST['ser_'.$stud['id']]))
                    $uniqsupply=$_POST['ser_'.$stud['id']]==''?null:$_POST['ser_'.$stud['id']];
                else
                    $dist_date=$uniqsupply=null;
                    
                $datetime=$stud['created_date']==null?date("Y-m-d H:i:s",strtotime("now")):$stud['created_date'];
                
                if(isset($_POST['dt_'.$stud['id']])){
                    $update=1;
                }
                $dt[$i++]=array(
                            'id'                    =>   $stud['iid'],
                            'student_id'            =>   $stud['id'],
                            'from_stoping'          =>   $_POST['busfrom_'.$stud['id']],
                            'to_stoping'            =>   $_POST['busto_'.$stud['id']],
                            'bus_routes'            =>   $_POST['route_'.$stud['id']],
                            'unique_supply'         =>   $uniqsupply,
                            'created_date'          =>   $datetime,
                            'distribution_date'     =>   $dist_date,
                            'finalsub'              =>   $_POST['finalsub']
                        );   
            }
        }
        if($update==0){
            if(!$this->Homemodel->schemeIndent($dt,'',$_POST['selected_class'],$this->session->userdata('emis_school_id'))){
                print_r($result);
                die('Error Insert');
            }
        }
        else{
          if(!$this->Homemodel->schemeIndentUpdate($dt,'schoolnew_busindent')){
                print_r($result);
                die('Error Update');
          }  
        }  
        redirect($_POST['redirect'],'refresh');
    }
    
    function getStudentforScheme(){
        $scheme_id=$this->input->post('scheme_id');
        $classid=$this->input->post('appli_class');
        $data['students']=$this->Homemodel->getStudentforScheme($scheme_id,$classid,$this->session->userdata('emis_school_id'));
        $data['scheme']=$this->Homemodel->getSchemeDetails($scheme_id,$classid);
        //print_r($data);die();
        echo json_encode($data);
    } 

    //function Modified On 19-07-19 Venba/ps
    function callgeneral1() { 
       $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
       
       //    if($this->input->post('term')!=null){
    //       $term = $this->input->post('term') != 'Y' ? $this->input->post('term') : NULL ;
    //       $where = ' where a.term = '.$term;
    //       $data['termid'] = $this->input->post('term');    
    //       $data['notebook'] = $this->Homemodel->getDtlforNoteBookEligibility($where);
        
    //    }
    //    else if($this->input->post('term')==null){
    //       $data['termid'] = null;
             $data['notebook'] = $this->Homemodel->getDtlforNoteBookEligibility('');
    //    }
    //    echo 'term'.$this->input->post('term');
    //    print_r($data);
       $this->load->view('freeSchemes/neededgeneral',$data);
    }
    function calldis() { 
        $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
        $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
        $this->load->view('freeSchemes/distribution',$data);
    }
    function calldashboard() { 
        $group='';
        if($this->input->post('schname')!=null){
            $where=' AND schoolnew_schemeindent.scheme_id='.$this->input->post('schname');
            $data['scheme_id']=$this->input->post('schname');
        }
        elseif($this->uri->segment(5,0)!=null){
            $where=' AND schoolnew_schemeindent.scheme_id='.$this->uri->segment(5,0);
            $data['scheme_id']=$this->uri->segment(5,0);
        }
        
        if($this->uri->segment(6,0)!=null){
            $distri=' NOT';
        }
        else{
            $distri='';
        }
        
        switch(1){
            case $this->session->userdata('emis_state_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $groupby=' GROUP BY dist_id';
                        $group='dist_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND students_school_child_count.district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND students_school_child_count.block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_district_id')!=null:{
                 switch($this->uri->segment(3,0)){
                    case '0':{
                        $where .= ' AND students_school_child_count.district_id='.$this->session->userdata('emis_district_id');
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND students_school_child_count.district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND students_school_child_count.block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY students_school_child_count.school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_deo_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->session->userdata('emis_deo_id');
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND students_school_child_count.district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='blk_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND students_school_child_count.block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY students_school_child_count.school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_block_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case '0':{
                        $where .= ' AND beo_map='.$this->session->userdata('emis_usertype1').' AND students_school_child_count.block_id='.$this->session->userdata('emis_block_id');
                        $groupby=' GROUP BY students_school_child_count.school_id'; 
                        $group='school_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND students_school_child_count.district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND beo_map='.$this->session->userdata('emis_usertype1').' AND block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY students_school_child_count.school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
            case $this->session->userdata('emis_school_id')!=null:{
                switch($this->uri->segment(3,0)){
                    case 0:{
                        $where .= ' AND students_school_child_count.school_id='.$this->session->userdata('emis_school_id');
                        $groupby=' GROUP BY students_school_child_count.school_id';
                        $group='school_id';
                        break;
                    }
                    case 'EDU':{
                        $where .= ' AND students_school_child_count.district_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY edudistrict_id';
                        $group='edudistrict_id';
                        break;
                    }
                    case 'Block':{
                        $where .= ' AND students_school_child_count.edu_dist_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY blk_id';
                        $group='blk_id';
                        break;
                    }
                    case 'School':{
                        $where .= ' AND students_school_child_count.block_id='.$this->uri->segment(4,0);
                        $groupby=' GROUP BY students_school_child_count.school_id';
                        $group='school_id';
                        break;
                    }
                }
                break;
            }
        }
        
        if($data['scheme_id']==9){
            $groupby.=',class_studying_id';
            $temp='class_studying_id,'.$group;
        }
        else{
            $temp=$group;
        }
        
        $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
        $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
        $dashboard=$this->Homemodel->getDashboardCount($where,$groupby,$temp,$distri);
        
        $dashboard=json_decode(json_encode($dashboard), True);
        $result = array();$key=$group;
        foreach($dashboard as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        //print_r($result);die();
        $data['dashboard']=$result;
        
        $this->load->view('freeSchemes/dashboard',$data);
    }
    function getDistributionScheme(){
        $scheme_id=$this->input->post('scheme_id');
        $classid=$this->input->post('appli_class');
        $stu_arr = $this->Homemodel->getDistibutionforScheme($scheme_id,$classid,$this->session->userdata('emis_school_id'));
        if(sizeof($stu_arr)<=0){ 
            $students_array = $this->Homemodel->getStudentforScheme($scheme_id,$classid,$this->session->userdata('emis_school_id'));
        }
        else{
            $students_array = $stu_arr;
        }
        $data['students']=$students_array;
        $data['scheme']=$this->Homemodel->getSchemeDetails($scheme_id,$classid);
        echo json_encode(json_decode(json_encode($data),true));
    } 

    function getStudentsForBusIndent(){
        $class_id=$this->input->post('appli_class');
        $school_id=$this->session->userdata('emis_school_id');
        $students=$this->Homemodel->studentsInClass($class_id,$school_id);
        echo(json_encode($students));
    }
    function busDistribution(){
        $class_id=$this->input->post('appli_class');
        $school_id=$this->session->userdata('emis_school_id');
        $students=$this->Homemodel->busDistribution($class_id,$school_id);
        echo(json_encode($students));
    }
    function getBankByIFSC(){
        $ifsc=$this->input->post('ifsc');
        $students=$this->Homemodel->getBankByIFSC($ifsc);
        echo json_encode($students);
    }    
    function removeFiles(){
        $fileid=$this->input->post('fileid');
        $fileid=$this->input->post('filenode');
    }
    
    function schoolUpgrade(){
        $this->load->library('session');
        $school_id=$this->session->userdata('emis_school_id');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
            if($school_id!=''){
                $data['basic']=$this->Homemodel->getSchoolInfo($school_id);
                $SQL=' WHERE schoolnew_basicinfo.curr_stat=1 AND schoolnew_basicinfo.school_id='.$school_id;
                $GRP=' GROUP BY udise_code';
                $data['pc']=$this->Statemodel->profilecompletecount($SQL.$GRP,"T1.udise_code=T2.udise_code",$GRP);
                //$data['grp']=json_decode(json_encode($this->Datamodel->getallgroupcodes($data['basic'][0]->sch_management_id)),true);
                $data['certificate']=json_decode(json_encode($this->Homemodel->getCertificateMaster(' WHERE upgradation=1')),true);
    			$this->load->view('renewal/upgradeform',$data);
            }
            else{
                redirect('AllApprove/CheckForSubmission/3', 'refresh');
            }
		}else {
			redirect('/', 'refresh');
		}
    }
    function getGroupCodes(){
        $school_id=$this->session->userdata('emis_school_id');
		$emis_loggedin = $this->session->userdata('emis_loggedin');
		if($emis_loggedin) { 
            $groups=json_decode(json_encode($this->Homemodel->getGroupCodeBySchoolid($school_id),true));
			echo json_encode($groups);
		}else {
			redirect('/', 'refresh');
		}
    }

    /** For DEE-WISE Scheme-Distribution Functionality : last mod - 01.08.2019(venba/ps) */
        public function dee_providing_list(){

            // $where = 'Where 1';
                
                if($this->input->post('schname')!=null){
                    
                    $scheme_id = $this->input->post('schname');
                    $medium_id = $this->input->post('medname')!=null? $this->input->post('medname') : $this->uri->segment(5,0);
                    $term_id = $scheme_id == 9 ? $this->input->post('term') : '' ;
                    $book_id = $scheme_id == 9 ? $this->input->post('bkname') : '' ;
                    $set_id = $scheme_id == 1 ? $this->input->post('set') : '' ;
                    
                    $where = $scheme_id == 9 ? " AND b.cate_type IN ('Primary School' , 'Middle School') AND a.mediumid = ".$medium_id : " AND b.cate_type IN ('Primary School' , 'Middle School') " ;
                    
                    
                    switch($scheme_id){
                        // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                        // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                        case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                        case 9 : $tname = 'schoolnew_books_dist' ; break; 
                        case 11: $tname = 'schoolnew_computerindent' ; break; 
                        // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                        // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        default : $tname = 'schoolnew_schemeindent' ;  break;
                    }

                    $data['schemeid']=$scheme_id;
                    $data['mediumid']=$scheme_id == 9 ? $this->input->post('medname') : '' ;
                    $data['termid'] = $term_id;
                    $data['bookid'] = $book_id;
                    $data['setid'] = $set_id;
                }
                else if($this->uri->segment(6,0)!=null || $this->uri->segment(6,0) != 0){
                    
                    // echo('elseif - uri functionalities');
                    // echo '<br/>';

                    $scheme_id = $this->uri->segment(6,0);
                    $medium_id = $this->input->post('medname') != null  ? 
                                $this->input->post('medname') : 
                                $this->uri->segment(5,0) != 0 ? explode ("-", $this->uri->segment(5,0))[0] : '';

                    $term_id = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[1] : '' ;
                    $book_id = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[2] : '' ;
                    $set_id = $scheme_id == 1 ? $this->uri->segment(5,0) : '' ;
                    // echo '$scheme_id'.$scheme_id;
                    // echo '$medium_id'.$medium_id;
                    // echo '$set_id'.$set_id;
                    // echo '<br/>';
                    $where = $scheme_id == 9 ? " AND b.cate_type IN ('Primary School' , 'Middle School') AND a.mediumid = ".$medium_id : " AND b.cate_type IN ('Primary School' , 'Middle School') " ;
                    
                    
                    switch($scheme_id){
                        // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                        // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                        case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                        case 9 : $tname = 'schoolnew_books_dist' ; break; 
                        case 11: $tname = 'schoolnew_computerindent' ; break; 
                        // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                        // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                        default : $tname = 'schoolnew_schemeindent' ; break;
                    }

                    $data['schemeid'] = $scheme_id;    
                    $data['mediumid'] = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[0]  : '' ;    
                    $data['termid'] = $term_id ;
                    $data['bookid'] = $book_id ;
                    $data['setid'] = $scheme_id == 1 ? $set_id : '' ;
                    
                }   
            
                switch(1){
                    case $this->session->userdata('emis_state_id')!=null:{
                        
                        switch($this->uri->segment(3,0)){
                            case '0':{ $groupby=' GROUP BY b.district_id';
                                    break;
                                    }
                            case 'EDU':{
                                    $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                    $groupby=' GROUP BY b.edu_dist_id';
                                    break;
                                    }
                            case 'Block':{
                                    $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                    $groupby=' GROUP BY b.block_id';
                                    break;
                                    }
                            case 'School':{
                                        $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                        $groupby=' GROUP BY a.schoolid';
                                        break;
                                    }
                        }
                        break;
                    }
                    case $this->session->userdata('emis_district_id')!=null:{
                        switch($this->uri->segment(3,0)){
                            case '0':{
                                $where .= ' AND b.district_id='.$this->session->userdata('emis_district_id');
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                            }
                            case 'EDU':{
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                            }
                            case 'Block':{
                                $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.block_id';
                                break;
                            }
                            case 'School':{
                                $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                        }
                        break;
                    }
                    case $this->session->userdata('emis_deo_id')!=null:{
                        switch($this->uri->segment(3,0)){
                            case '0':{
                                $where .= ' AND b.edu_dist_id='.$this->session->userdata('emis_deo_id');
                                $groupby=' GROUP BY b.block_id';
                                break;
                            }
                            case 'EDU':{
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                            }
                            case 'Block':{
                                $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.block_id';
                                break;
                            }
                            case 'School':{
                                $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                        }
                        break;
                    }
                    case $this->session->userdata('emis_block_id')!=null:{
                        switch($this->uri->segment(3,0)){
                            case '0':{
                                $where .= ' AND b.block_id='.$this->session->userdata('emis_block_id');
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                            case 'EDU':{
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                            }
                            case 'Block':{
                                $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.block_id';
                                break;
                            }
                            case 'School':{
                                $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                        }
                        break;
                    }
                    case $this->session->userdata('emis_school_id')!=null:{
                        switch($this->uri->segment(3,0)){
                            case 0:{
                                $where .= ' AND a.schoolid='.$this->session->userdata('emis_school_id');
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                            case 'EDU':{
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY a.edu_dist_id';
                                
                                break;
                            }
                            case 'Block':{
                                $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.block_id';
                                
                                break;
                            }
                            case 'School':{
                                $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY a.schoolid';
                                break;
                            }
                        }
                        break;
                    }
                }
            
                $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
                $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
                $data['mediumofinstruction']  = $this->Homemodel->getListAllMediumOfInstruction();
                $data['textbooklist']  = $this->Homemodel->getListAllTextBookDtl();
        
                
                
                    if($this->input->post('schname')!=null){
        
                        if($scheme_id == 9){
                            // echo '<br/>';
                            // echo 'uri 7th segment is 0 but scheme_id is 9';
                            // echo '<br/>';
                            $concat_textbookwhere = " AND ab.book_id = ".$book_id." AND ab.term = ".$term_id." ";
                            $data['providing_list']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$concat_textbookwhere);
                            // WHERE aa.isactive = 1 AND aa.`scheme_id` = 9 GROUP BY bb.school_id, bb.`class_studying_id`, bb.`education_medium_id`) d ON a.schoolid = d.school_id AND a.`classid` = d.class_studying_id AND a.`mediumid` = d.education_medium_id LEFT JOIN district_scheme_despatch e ON b.district_id = e.`districtid` AND a.classid = e.`classid` AND a.mediumid = e.`mediumid` WHERE b.district_id IS NOT NULL AND b.cate_type IN ('Primary School' , 'Middle School') AND a.mediumid = 16 AND d.book_id = 1 AND d.term = 0 ;
                        }
                        else if($scheme_id == 1){
                            // echo '<br/>';
                            // echo 'uri 7th segment is 0 but scheme_id is 1'.$set_id;
                            // echo '<br/>';
                            $concat_where = $scheme_id." AND aa.sets = ".$set_id." ";
                            $data['providing_list']=$this->Homemodel->getProvidingListCount($concat_where,$where,$groupby,$tname);        
                        }
                        else{       
                            // echo '<br/>'; 
                            // echo 'uri 7th segment is 0 but remaining scheme_id';
                            // echo '<br/>';
                            $data['providing_list']=$this->Homemodel->getProvidingListCount($scheme_id,$where,$groupby,$tname);        
                        }

                    }else if($this->input->post('schname')==null){
        
                        if($this->uri->segment(6,0) != 0){      
                                if($this->uri->segment(6,0) == 9){
                                    // echo '<br/>';
                                    // echo 'uri 7th segment has some value but scheme_id is 9';
                                    // echo '<br/>';
                                    $concat_textbookwhere = " AND ab.book_id = ".$book_id." AND ab.term = ".$term_id." ";
                                    $data['providing_list']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$concat_textbookwhere);
                                }
                                elseif($this->uri->segment(6,0) == 1){
                                    // echo '<br/>';
                                    // echo 'uri 7th segment has some value but scheme_id is 1';
                                    // echo '<br/>';
                                    $concat_where = $scheme_id." AND aa.sets = ".$set_id." ";
                                    $data['providing_list']=$this->Homemodel->getProvidingListCount($concat_where,$where,$groupby,$tname);        
                                }
                                else{
                                    // echo '<br/>';
                                    // echo 'uri 7th segment has some value but remaining scheme_id';
                                    // echo '<br/>';
                                    $data['providing_list']=$this->Homemodel->getProvidingListCount($scheme_id,$where,$groupby,$tname);        
                                }
                        }
                        else{
                        // echo '<br/>';
                        // echo 'default empty';
                        // echo '<br/>';
                        $data['providing_list']=[];
                        } 
                    }
                    
                    $this->load->view('freeSchemes/emis_dee_distribution',$data);
                
        }
    /** DEE-WISE Scheme-Distribution Functionality Ends  */
       
    /** For DSE-WISE Scheme-Distribution Functionality : last mod - 01.08.2019(venba/ps) */
        public function dse_providing_list(){

            // $where = 'Where 1';

            if($this->input->post('schname')!=null){

                $scheme_id = $this->input->post('schname');
                $medium_id = $this->input->post('medname')!=null? $this->input->post('medname') : $this->uri->segment(5,0);
                $term_id = $scheme_id == 9 ? $this->input->post('term') : '' ;
                $book_id = $scheme_id == 9 ? $this->input->post('bkname') : '' ;
                $set_id = $scheme_id == 1 ? $this->input->post('set') : '' ;
                
                $where = $scheme_id == 9  ? " AND b.cate_type IN ('High School' , 'Higher Secondary School') AND a.mediumid = ".$medium_id : " AND b.cate_type IN ('High School' , 'Higher Secondary School') " ;
                
                switch($scheme_id){
                    // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                    // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                    case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                    case 9 : $tname = 'schoolnew_books_dist' ; break; 
                    case 11: $tname = 'schoolnew_computerindent' ; break; 
                    // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                    // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    default : $tname = 'schoolnew_schemeindent' ; break;
                }

                $data['schemeid']=$scheme_id;
                $data['mediumid']=$scheme_id == 9 ? $this->input->post('medname') : '' ;
                $data['termid']=$term_id ;
                $data['bookid']=$book_id ;
                $data['setid'] = $scheme_id == 1 ? $set_id : '' ;
            }
            else if($this->uri->segment(6,0)!=null || $this->uri->segment(6,0) != 0){

                $scheme_id = $this->uri->segment(6,0);
                $medium_id = $this->input->post('medname') != null  ? $this->input->post('medname') : 
                             $this->uri->segment(5,0) != 0 ? explode ("-", $this->uri->segment(5,0))[0] : '';
                $term_id = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[1] : '' ;
                $book_id = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[2] : '' ;
                $set_id = $scheme_id == 1 ? $this->uri->segment(5,0) : '' ;
                   
                $where = $scheme_id == 9 ? " AND b.cate_type IN ('High School' , 'Higher Secondary School') AND a.mediumid = ".$medium_id : " AND b.cate_type IN ('High School' , 'Higher Secondary School') " ;
                // $where = $scheme_id == 9 ? " AND b.cate_type IN ('High School' , 'Higher Secondary School') AND a.mediumid = ".$medium_id :
                        //  $scheme_id == 1 ? " AND b.cate_type IN ('High School' , 'Higher Secondary School')" : " AND b.cate_type IN ('High School' , 'Higher Secondary School') " ;
                
                switch($scheme_id){
                    // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                    // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                    case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                    case 9 : $tname = 'schoolnew_books_dist' ; break; 
                    case 11: $tname = 'schoolnew_computerindent' ; break; 
                    // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                    // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                    default : $tname = 'schoolnew_schemeindent' ; break;
                }

                $data['schemeid'] = $scheme_id;    
                $data['mediumid'] = $scheme_id == 9 ? explode ("-", $this->uri->segment(5,0))[0]  : '' ;    
                $data['termid'] = $term_id ;
                $data['bookid'] = $book_id ;
                $data['setid'] = $set_id ;
                
            }   
        
            switch(1){
                case $this->session->userdata('emis_state_id')!=null:{
                    
                    switch($this->uri->segment(3,0)){
                        case '0':{ $groupby=' GROUP BY b.district_id';
                                break;
                                }
                        case 'EDU':{
                            
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                        }
                        case 'School':{
                                
                                    $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                    $groupby=' GROUP BY a.schoolid';
                                    break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_district_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case '0':{
                            $where .= ' AND b.district_id='.$this->session->userdata('emis_district_id');
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_deo_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case '0':{
                            $where .= ' AND b.edu_dist_id='.$this->session->userdata('emis_deo_id');
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_school_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case 0:{
                            $where .= ' AND a.schoolid='.$this->session->userdata('emis_school_id');
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.edu_dist_id';
                            
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
            }
        
            $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
            $data['textbooklist']  = $this->Homemodel->getListAllTextBookDtl();
            $data['mediumofinstruction']  = $this->Homemodel->getListAllMediumOfInstruction();
            
            if($this->input->post('schname') !=null){
                    // echo 'providing list is schname is null';
                    // echo '<br/>';
                    $dyn_val = $scheme_id == 1 ? $scheme_id." AND aa.sets = ".$set_id." " : $scheme_id; 
                    $data['providing_list']=$this->Homemodel->getProvidingListCount($dyn_val,$where,$groupby,$tname);        
                    // $data['providing_list']=$this->Homemodel->getProvidingListCount($scheme_id,$where,$groupby,$tname);        
            }
            else{ 
                    if($this->uri->segment(6,0) != 0){
                           $dyn_val = $scheme_id == 1 ? $scheme_id." AND aa.sets = ".$set_id." " : $scheme_id; 
                           $data['providing_list']=$this->Homemodel->getProvidingListCount($dyn_val,$where,$groupby,$tname);        
                        // $data['providing_list']=$this->Homemodel->getProvidingListCount($scheme_id,$where,$groupby,$tname);        
                    }
                    else{
                        $data['providing_list']=[];
                    } 
            } 
                
            $this->load->view('freeSchemes/emis_dse_distribution',$data);
            
            
        }
    /** DSE-WISE Scheme-Distribution Functionality Ends  */

    /** For DSE-WISE TextBook-Distribution Functionality  : last mod - 01.08.2019(venba/ps) */
        public function textbook_providing_list(){
            //   $where = 'Where 1';

            $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
            $data['mediumofinstruction']  = $this->Homemodel->getListAllMediumOfInstruction();
            $data['textbooklist']  = $this->Homemodel->getListAllTextBookDtl();
            $tname = 'schoolnew_books_dist' ;
            

            if($this->uri->segment(5,0) == 0){
                $tab_id = $this->input->post('hd_tabid');    
                $medium_id = $this->input->post('medname'.$tab_id)!=null? $this->input->post('medname'.$tab_id) : explode ("-", $this->uri->segment(5,0))[0];
                $where = " AND b.cate_type IN ('High School' , 'Higher Secondary School') AND a.mediumid = ".$medium_id ;
                $term_id = $this->input->post('term');
                // echo '$term_id'.$term_id;
                $book_id = $this->input->post('bkname'.$tab_id);
            }
            else if($this->uri->segment(5,0)!=null || $this->uri->segment(5,0) != 0){            
                $tab_id=$this->uri->segment(6,0);  
                $medium_id = $this->input->post('medname'.$tab_id) != null  ? $this->input->post('medname'.$tab_id) : $this->uri->segment(5,0) != 0 ? explode ("-", $this->uri->segment(5,0))[0] : '';
                $where = " AND b.cate_type IN ('High School' , 'Higher Secondary School') AND a.mediumid = ".$medium_id ;
                $term_id = explode ("-", $this->uri->segment(5,0))[1];
                $book_id = explode ("-", $this->uri->segment(5,0))[2];
            }   

            switch(1){
                case $this->session->userdata('emis_state_id')!=null:{
                    
                    switch($this->uri->segment(3,0)){
                        case '0':{ $groupby=' GROUP BY b.district_id';
                                break;
                                }
                        case 'EDU':{
                                $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.edu_dist_id';
                                break;
                                }
                        case 'Block':{
                                $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                                $groupby=' GROUP BY b.block_id';
                                break;
                                }
                        case 'School':{
                                    $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                                    $groupby=' GROUP BY a.schoolid';
                                    break;
                                }
                    }
                    break;
                }
                case $this->session->userdata('emis_district_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case '0':{
                            $where .= ' AND b.district_id='.$this->session->userdata('emis_district_id');
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'Block':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.block_id';
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_deo_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case '0':{
                            $where .= ' AND b.edu_dist_id='.$this->session->userdata('emis_deo_id');
                            $groupby=' GROUP BY b.block_id';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'Block':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.block_id';
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_block_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case '0':{
                            $where .= ' AND b.block_id='.$this->session->userdata('emis_block_id');
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.edu_dist_id';
                            break;
                        }
                        case 'Block':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.block_id';
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
                case $this->session->userdata('emis_school_id')!=null:{
                    switch($this->uri->segment(3,0)){
                        case 0:{
                            $where .= ' AND a.schoolid='.$this->session->userdata('emis_school_id');
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                        case 'EDU':{
                            $where .= ' AND b.district_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.edu_dist_id';
                            
                            break;
                        }
                        case 'Block':{
                            $where .= ' AND b.edu_dist_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY b.block_id';
                            
                            break;
                        }
                        case 'School':{
                            $where .= ' AND b.block_id='.$this->uri->segment(4,0);
                            $groupby=' GROUP BY a.schoolid';
                            break;
                        }
                    }
                    break;
                }
            }
            
            $data['tabid']= $tab_id;
            $data['mediumid']=$medium_id;
            $data['termid']=$term_id;
            $data['bookid']=$book_id;
            if($medium_id!=null){                
                
                if($tab_id == 1){
                
                                $where2 = " AND ab.book_id = ".$book_id." AND ab.term = ".$term_id." ";    
                                $data['providing_list1']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where2);
                                $data['providing_list2']=[];
                                $data['providing_list3']=[];
                }
                else if($tab_id == 2){
                
                                $where2 = " AND ab.book_id = ".$book_id." AND ab.term = 0 ";
                                $data['providing_list1']=[];
                                $data['providing_list2']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where2);
                                $data['providing_list3']=[];
                }
                else if($tab_id == 3){
                
                                $where2 = " AND ab.book_id = ".$book_id." AND ab.term = 0 ";
                                $data['providing_list1']=[];
                                $data['providing_list2']=[];
                                $data['providing_list3']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where2);
                }
                else{
                
                        $data['providing_list1']=[];
                        $data['providing_list2']=[];
                        $data['providing_list3']=[];
                }

                
            }else if($this->uri->segment(6,0) != null){
            
                        if($this->uri->segment(6,0) == 1){
                            if(explode ("-", $this->uri->segment(5,0))[0] != 0){                                  
                                
                                        $where2 = " AND ab.book_id = ".$book_id." AND ab.term = ".$term_id." ";
                                        $data['providing_list1']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where2);
                                        $data['providing_list2']=[];
                                        $data['providing_list3']=[];
                            }       
                        }
                        else if($this->uri->segment(6,0) == 2){
                            if(explode ("-", $this->uri->segment(5,0))[0] != 0){                                          
                                
                                        $where3 = " AND ab.book_id = ".$book_id." AND ab.term = 0 ";
                                        $data['providing_list1']=[];
                                        $data['providing_list2']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where3);
                                        $data['providing_list3']=[];
                            }   
                        }
                        else if($this->uri->segment(6,0) == 3){
                            if(explode ("-", $this->uri->segment(5,0))[0] != 0){                                  
                                
                                        $where3 = " AND ab.book_id = ".$book_id." AND ab.term = 0 ";
                                        $data['providing_list1']=[];
                                        $data['providing_list2']=[];
                                        $data['providing_list3']=$this->Homemodel->gettextbookProvidingListCount(9,$where,$groupby,$tname,$where3);
                            }
                        }
                        else{
                        
                        $data['providing_list1']=[];
                        $data['providing_list2']=[];
                        $data['providing_list3']=[];
                        } 
                    }
                    
                    $this->load->view('freeSchemes/emis_textbook_distribution',$data);
        }
    /** DSE-WISE TextBook-Distribution Functionality Ends  */


    /** Common Save Functionality for both Indent and Distribution Entry Details : last Mod - 07-09-2019(venba/ps) 
     *  0 - other schemes if -> uniform details , else footwear and hill stations details
     **/
        function save_scheme_dtls(){
            
            date_default_timezone_set('Asia/Kolkata');
            $scheme_id=$_POST['scheme_id'];
            $classid=$_POST['class_id'];
            $sectionid = $_POST['section_id'];
            // $students=$this->Homemodel->getStudentforScheme($scheme_id,$classid,$this->session->userdata('emis_school_id'),$sectionid);
            // echo '$students';
            // print_r($students);

            $size=NULL;$i=0;$update=0;$j=0;$check=0;

            switch($scheme_id){
                // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                case 9 : $tname = 'schoolnew_books_dist' ; break; 
                case 11: $tname = 'schoolnew_computerindent' ; break; 
                // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                default : $tname = 'schoolnew_schemeindent' ; break;
            }
            
            if($this->uri->segment(3,0) == 0){    
                if($scheme_id == 1){
                    $studentslistforuniform=$this->Homemodel->getStudentforUniformDist($classid,$this->session->userdata('emis_school_id'),$sectionid,$tname);            
                    $tname='schoolnew_schemeindent';
                    $validation=0;$x=0;$y=0;$i=0;

                    foreach($studentslistforuniform as $stud){        
                        $updated = $_POST['updated_'.$stud->id];
                        $eligble_case = isset($_POST['opt_'.$stud->id]) ? 1 : 0;
                        if($stud->indent_date == null){
                            $validation++;
                        }

                        if($updated == 1 && $eligble_case == 1){     
                            $set1_dis=isset($_POST['set1_dt_'.$stud->id])?($_POST['set1_dt_'.$stud->id]!=null?$_POST['set1_dt_'.$stud->id]:NULL):NULL;
                            $set2_dis=isset($_POST['set2_dt_'.$stud->id])?($_POST['set2_dt_'.$stud->id]!=null?$_POST['set2_dt_'.$stud->id]:NULL):NULL;
                            $set3_dis=isset($_POST['set3_dt_'.$stud->id])?($_POST['set3_dt_'.$stud->id]!=null?$_POST['set3_dt_'.$stud->id]:NULL):NULL;
                            $set4_dis=isset($_POST['set4_dt_'.$stud->id])?($_POST['set4_dt_'.$stud->id]!=null?$_POST['set4_dt_'.$stud->id]:NULL):NULL;
                            $ser=isset($_POST['ser_'.$stud->id])?($_POST['ser_'.$stud->id]!=null?$_POST['ser_'.$stud->id]:NULL):NULL;
                            $dt=$stud->indent_date!=null?date("Y-m-d H:m:s",strtotime($stud->indent_date)):date("Y-m-d H:m:s",strtotime("now"));

                                if($set1_dis != $stud->set1_distribution_date){
                                    
                                    $uniform_arr[$x++]=array(
                                        'scheme_id'=> $scheme_id,'scheme_category' => $stud->set1_scheme_category,
                                        'student_id' => $stud->id,'school_id' => $this->session->userdata('emis_school_id'),
                                        'class'=> $classid,'indent_date' => $dt,'createddate' => date('Y-m-d h:i:s'),
                                        'distribution_date' => $set1_dis,'unique_supply' => null,
                                        'sets'=>1,'isactive'=> 1
                                    );
                                                
                                    $studs[$y++]=array(
                                        'scheme_id'=> $scheme_id,
                                        'school_id' => $this->session->userdata('emis_school_id'),
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'sets' => 1,
                                        'isactive'=> 1 );
                                }
                                if($set2_dis != $stud->set2_distribution_date){
                                    
                                    $uniform_arr[$x++]=array(
                                        'scheme_id'=> $scheme_id,'scheme_category' => $stud->set1_scheme_category,
                                        'student_id' => $stud->id,'school_id' => $this->session->userdata('emis_school_id'),
                                        'class'=> $classid,'indent_date' => $dt,'createddate' => date('Y-m-d h:i:s'),
                                        'distribution_date' => $set2_dis,'unique_supply' => null,
                                        'sets'=>2,'isactive'=> 1
                                    );
                                                
                                    $studs[$y++]=array(
                                        'scheme_id'=> $scheme_id,
                                        'school_id' => $this->session->userdata('emis_school_id'),
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'sets' => 2,
                                        'isactive'=> 1 );
                                }

                                if($set3_dis != $stud->set3_distribution_date){
                                    
                                    $uniform_arr[$x++]=array(
                                        'scheme_id'=> $scheme_id,'scheme_category' => $stud->set1_scheme_category,
                                        'student_id' => $stud->id,'school_id' => $this->session->userdata('emis_school_id'),
                                        'class'=> $classid,'indent_date' => $dt,'createddate' => date('Y-m-d h:i:s'),
                                        'distribution_date' => $set3_dis,'unique_supply' => null,
                                        'sets'=>3,'isactive'=> 1
                                    );
                                                
                                    $studs[$y++]=array(
                                        'scheme_id'=> $scheme_id,
                                        'school_id' => $this->session->userdata('emis_school_id'),
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'sets' => 3,
                                        'isactive'=> 1 );
                                }
                                if($set4_dis != $stud->set4_distribution_date){
                                    
                                    $uniform_arr[$x++]=array(
                                        'scheme_id'=> $scheme_id,'scheme_category' => $stud->set1_scheme_category,
                                        'student_id' => $stud->id,'school_id' => $this->session->userdata('emis_school_id'),
                                        'class'=> $classid,'indent_date' => $dt,'createddate' => date('Y-m-d h:i:s'),
                                        'distribution_date' => $set4_dis,'unique_supply' => null,
                                        'sets'=>4,'isactive'=> 1
                                    );
                                                
                                    $studs[$y++]=array(
                                        'scheme_id'=> $scheme_id,
                                        'school_id' => $this->session->userdata('emis_school_id'),
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'sets' => 4,
                                        'isactive'=> 1 );
                                }

                                
                        }

                        if($updated == 1 && $eligble_case == 0){     
                            for($j=1;$j<=4;$j++){
                                $studs[$y++]=array(
                                    'scheme_id'=> $scheme_id,
                                    'school_id' => $this->session->userdata('emis_school_id'),
                                    'class_id'=> $classid,
                                    'student_id' => $stud->id,
                                    'sets' => $j,
                                    'isactive'=> 1 );
                            }
                        }
                    }

                    $uniform_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($uniform_arr,$tname)
                    : $this->Homemodel->updateOnUniformIndent($studs,$uniform_arr,$tname,$sectionid);

                    // $uniform_response = $this->Homemodel->submitSchemeDtls($uniform_arr,1,$classid,$schoolid,'schoolnew_schemeindent',$sectionid);
        
                    if(!$uniform_response){
                        echo '<script language="javascript">';
                        echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                        echo '</script>';
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Data Successfully Inserted !")';
                        echo '</script>';
                    }         
                }
                else{
                            // $tname='schoolnew_schemeindent';
                            $validation=0;$x=0;$y=0;

                            $studentslistforfootwear= $this->Homemodel->getOtherDistibutionforScheme($this->session->userdata('emis_school_id'),$classid,$sectionid,$scheme_id,$tname);
                            foreach($studentslistforfootwear as $stud){
                                $updated = $_POST['updated_'.$stud->id];
                                $eligble_case = isset($_POST['opt_'.$stud->id]) ? 1 : 0;
                                if($stud->indent_date == null){
                                    $validation++;
                                }

                                if($updated == 1 && $eligble_case == 1){     
                                    // $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null?$_POST['size_'.$stud->id]:NULL):NULL;
                        
                                    $ser=isset($_POST['ser_'.$stud->id])?($_POST['ser_'.$stud->id]!=null?$_POST['ser_'.$stud->id]:NULL):NULL;
                                    $dis=isset($_POST['dt_'.$stud->id])?($_POST['dt_'.$stud->id]!=null?$_POST['dt_'.$stud->id]:NULL):NULL;
                                    $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null?$_POST['size_'.$stud->id]:NULL):NULL;
                                    $dt=$stud->indent_date !=null?$stud->indent_date:date("Y-m-d H:m:s",strtotime("now"));
                                    
                                    $result[$x++]=array(  'scheme_id'=> $scheme_id,'scheme_category' => $size,
                                                        'student_id' => $stud->id,'school_id' => $this->session->userdata('emis_school_id'),
                                                        'class'=> $classid,'indent_date' => $dt,
                                                        'createddate' => date('Y-m-d h:i:s'),
                                                        'distribution_date' => $dis,
                                                        'unique_supply' => $ser,'isactive'=> 1
                                                        );
                                    
                                    $studs[$y++]=array(
                                        'scheme_id'=> $scheme_id,
                                        'school_id' => $this->session->userdata('emis_school_id'),
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'isactive'=> 1 );
                                }

                                if($updated == 1 && $eligble_case == 0){     
                                        $studs[$y++]=array(
                                            'scheme_id'=> $scheme_id,
                                            'school_id' => $this->session->userdata('emis_school_id'),
                                            'class_id'=> $classid,
                                            'student_id' => $stud->id,
                                            'isactive'=> 1 );
                                }
                            }
                                        
                            // $footwear_response = $this->Homemodel->submitSchemeDtls($footwear_arr,2,$classid,$schoolid,'schoolnew_schemeindent',$sectionid);
                            $footwear_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($result,$tname)
                                        : $this->Homemodel->updateOnSchemeIndent($studs,$result,$tname,$sectionid);

                            if(!$footwear_response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            else{
                                            echo '<script language="javascript">';
                                            echo 'alert("Data Successfully Inserted !")';
                                            echo '</script>';
                            }
                }
            }
           
            redirect($_POST['redirect'].'/'.$scheme_id.'/'.$classid.'/'.$sectionid,'refresh');
        
        }
    /** Common Save Functionality for both Indent and Distribution Entry Functionality Ends  */

    /** Scheme Indent Functionality : last mod - 01.08.2019(venba/ps) */
        //To Load Uniform Indent View 
        function uniform_indent() { 
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
            $this->load->view('freeSchemes/emis_uniform_indent',$data);
        }  

        //In Uniform Indent - To Load Data on Datatable(Ajax Response)
        function get_uniform_indent(){
            $classid=$this->input->post('appli_class');
            $sectionid=$this->input->post('appli_section');
            $tname='schoolnew_schemeindent';
            $new_tname='schoolnew_uniform_scheme';
            $checks =  $this->Homemodel->getNoonmealCountforUniformIndent($this->session->userdata('emis_school_id'),$classid,$sectionid,$tname);
            // 'schoolnew_mealindent'
            
            if($checks == 1){
                $data['students']=$this->Homemodel->getStudentforUniformIndent($this->session->userdata('emis_school_id'),$classid,$sectionid,1,$tname);
                $data['scheme']=$this->Homemodel->getSchemeDetails(1,$classid);
            }
            else{
                $data['students']=[];
            }
            echo json_encode($data);
        } 

        //To Save Uniform Indent
        function save_uniform_indent(){

            date_default_timezone_set('Asia/Kolkata');
            $classid=$this->input->post('class_id');
            $sectionid=$this->input->post('section_id');
            $schoolid=$this->session->userdata('emis_school_id');
            $tname='schoolnew_schemeindent';$validation=0;$x=0;$y=0;$i=0;
            $new_tname='schoolnew_uniform_scheme';
            $students=$this->Homemodel->getStudentforUniformIndent($schoolid,$classid,$sectionid,1,$tname);
            foreach($students as $stud){        
                $updated = $_POST['updated_'.$stud->id];
                $eligble_case = isset($_POST['opt_'.$stud->id]) ? 1 : 0;
                    if($stud->indent_date == null){
                        $validation++;
                    }
                    if($updated == 1 && $eligble_case == 1){     
                        $size1=isset($_POST['set1_size_'.$stud->id])?($_POST['set1_size_'.$stud->id]!=null || $_POST['set1_size_'.$stud->id]!=0 ?$_POST['set1_size_'.$stud->id]:NULL):NULL;
                        $size2=isset($_POST['set2_size_'.$stud->id])?($_POST['set2_size_'.$stud->id]!=null || $_POST['set2_size_'.$stud->id]!=0 ?$_POST['set2_size_'.$stud->id]:NULL):NULL;
                        $size3=isset($_POST['set3_size_'.$stud->id])?($_POST['set3_size_'.$stud->id]!=null || $_POST['set3_size_'.$stud->id]!=0 ?$_POST['set3_size_'.$stud->id]:NULL):NULL;
                        $size4=isset($_POST['set4_size_'.$stud->id])?($_POST['set4_size_'.$stud->id]!=null || $_POST['set4_size_'.$stud->id]!=0 ?$_POST['set4_size_'.$stud->id]:NULL):NULL;
                        $dt=date("Y-m-d H:m:s",strtotime("now"));
                            if($size1 != $stud->set1_scheme_category){
                                $uniform_arr[$i++]=array(
                                    'scheme_id'=> 1,'scheme_category' => $size1,'student_id' => $stud->id,
                                    'school_id' => $schoolid,'class'=> $classid,'indent_date' => $dt,
                                    'createddate' => date('Y-m-d h:i:s'),'distribution_date' => null,
                                    'unique_supply' => null,'sets'=>1,'isactive'=> 1
                                );
                                $studs[$y++]=array(
                                    'scheme_id'=> 1,
                                    'school_id' => $schoolid,
                                    'class_id'=> $classid,
                                    'student_id' => $stud->id,
                                    'sets' => 1,
                                    'isactive'=> 1 );
                            }

                            if($size2 != $stud->set2_scheme_category){
                                $uniform_arr[$i++]=array(
                                    'scheme_id'=> 1,'scheme_category' => $size2,'student_id' => $stud->id,
                                    'school_id' => $schoolid,'class'=> $classid,'indent_date' => $dt,
                                    'createddate' => date('Y-m-d h:i:s'),'distribution_date' => null,
                                    'unique_supply' => null,'sets'=>2,'isactive'=> 1
                                );
                                $studs[$y++]=array(
                                    'scheme_id'=> 1,
                                    'school_id' => $schoolid,
                                    'class_id'=> $classid,
                                    'student_id' => $stud->id,
                                    'sets' => 2,
                                    'isactive'=> 1 );
                            }
                            if($size3 != $stud->set3_scheme_category){
                                $uniform_arr[$i++]=array(
                                    'scheme_id'=> 1,'scheme_category' => $size3,'student_id' => $stud->id,
                                    'school_id' => $schoolid,'class'=> $classid,'indent_date' => $dt,
                                    'createddate' => date('Y-m-d h:i:s'),'distribution_date' => null,
                                    'unique_supply' => null,'sets'=>3,'isactive'=> 1
                                );
                                $studs[$y++]=array(
                                    'scheme_id'=> 1,
                                    'school_id' => $schoolid,
                                    'class_id'=> $classid,
                                    'student_id' => $stud->id,
                                    'sets' => 3,
                                    'isactive'=> 1 );
                            }
                            if($size4 != $stud->set4_scheme_category){
                                $uniform_arr[$i++]=array(
                                    'scheme_id'=> 1,'scheme_category' => $size4,'student_id' => $stud->id,
                                    'school_id' => $schoolid,'class'=> $classid,'indent_date' => $dt,
                                    'createddate' => date('Y-m-d h:i:s'),'distribution_date' => null,
                                    'unique_supply' => null,'sets'=>4,'isactive'=> 1
                                );
                                $studs[$y++]=array(
                                    'scheme_id'=> 1,
                                    'school_id' => $schoolid,
                                    'class_id'=> $classid,
                                    'student_id' => $stud->id,
                                    'sets' => 4,
                                    'isactive'=> 1 );
                        
                            }
                    }

                    if($updated == 1 && $eligble_case == 0){     
                        for($j=1;$j<=4;$j++){
                            $studs[$y++]=array(
                                'scheme_id'=> 1,
                                'school_id' => $schoolid,
                                'class_id'=> $classid,
                                'student_id' => $stud->id,
                                'sets' => $j,
                                'isactive'=> 1 );
                        }
                    }
            }
            
            $uniform_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($uniform_arr,$tname)
            : $this->Homemodel->updateOnUniformIndent($studs,$uniform_arr,$tname,$sectionid);
                
            // $uniform_response = $this->Homemodel->submitSchemeDtls($uniform_arr,1,$classid,$schoolid,'schoolnew_schemeindent',$sectionid);
            
            if(!$uniform_response){
                echo '<script language="javascript">';
                echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                echo '</script>';
            }
            // else{
            //     echo '<script language="javascript">';
            //     echo 'alert("Data Successfully Inserted !")';
            //     echo '</script>';
            // }         
            
            redirect($_POST['redirect'].'/'.$classid.'/'.$sectionid,'refresh');
        }    

        //To View footwear and sweater Indent
        function essentials_indent(){
            $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
            $this->load->view('freeSchemes/emis_otherscheme_indent',$data);
        }
            
        //In Footwear Indent - To Load Data on Datatable(Ajax Response)
        function get_footwear_indent(){

            $classid=$this->input->post('appli_class');
            $sectionid=$this->input->post('appli_section');
            $old_tname = 'schoolnew_footwear_scheme' ;
            $tname = 'schoolnew_schemeindent' ;
            $data['students'] = $this->Homemodel->getStudentforFootwearAndHillStationIndent($this->session->userdata('emis_school_id'),$classid,$sectionid,2,$tname);
            $data['footwear_scheme']=$this->Homemodel->getSchemeDetails(2,$classid);
            echo json_encode($data);
        } 

        //To Save Footwear Indent
        function save_footwear_indent(){

            date_default_timezone_set('Asia/Kolkata');
            $classid=$_POST['class_id'];
            $sectionid = $_POST['section_id'];
            $schoolid = $this->session->userdata('emis_school_id');
            
            $tname='schoolnew_schemeindent';$validation=0;$x=0;$y=0;
            $new_tname = 'schoolnew_footwear_scheme' ;
            $students = $this->Homemodel->getStudentforFootwearAndHillStationIndent($schoolid,$classid,$sectionid,2,$tname);

            foreach($students as $stud){        
                $updated = $_POST['updated_'.$stud->id];
                $eligble_case = isset($_POST['opt_'.$stud->id]) ? 1 : 0;
                if($stud->indent_date == null){
                    $validation++;
                }

                if($updated == 1 && $eligble_case == 1){     
                    // $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null?$_POST['size_'.$stud->id]:NULL):NULL;
                    $footwear_size=isset($_POST['footwear_size_'.$stud->id])?($_POST['footwear_size_'.$stud->id]!=null?$_POST['footwear_size_'.$stud->id]:NULL):NULL;
                    $dt=date("Y-m-d H:m:s",strtotime("now"));
                    
                    $footwear_arr[$x++]=array(
                        'scheme_id'=> 2,
                        'scheme_category' => $footwear_size,
                        'student_id' => $stud->id,
                        'school_id' => $schoolid,
                        'class'=> $classid,
                        'indent_date' => $dt,
                        'createddate' => date('Y-m-d h:i:s'),
                        'distribution_date' => null,
                        'unique_supply' => null,
                        'isactive'=> 1
                    );
                    $studs[$y++]=array(
                        'scheme_id'=> 2,
                        'school_id' => $schoolid,
                        'class_id'=> $classid,
                        'student_id' => $stud->id,
                        'isactive'=> 1 );
                }

                if($updated == 1 && $eligble_case == 0){     
                        $studs[$y++]=array(
                            'scheme_id'=> 2,
                            'school_id' => $schoolid,
                            'class_id'=> $classid,
                            'student_id' => $stud->id,
                            'isactive'=> 1 );
                }
            }
                        
            // $footwear_response = $this->Homemodel->submitSchemeDtls($footwear_arr,2,$classid,$schoolid,'schoolnew_schemeindent',$sectionid);
            $footwear_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($footwear_arr,$tname)
                           : $this->Homemodel->updateOnSchemeIndent($studs,$footwear_arr,$tname,$sectionid);

            if(!$footwear_response){
                echo '<script language="javascript">';
                echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                echo '</script>';
            }
            else{
                            echo '<script language="javascript">';
                            echo 'alert("Data Successfully Inserted !")';
                            echo '</script>';
            }
            
            // redirect($_POST['redirect'],'refresh');
            redirect($_POST['redirect'].'/'.$classid.'/'.$sectionid,'refresh');
        }

        //To View noonmeal Indent
        function noonmeal_indent() { 
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'));
            $this->load->view('freeSchemes/emis_noonmeal_indent',$data);
        }

        //In Noonmeal Indent - To Load Data on Datatable(Ajax Response)
        function get_noonmeal_indent(){
                $classid=$this->input->post('appli_class');        
                $sectionid = $this->input->post('appli_section');    
                $schoolid = $this->session->userdata('emis_school_id');
                $tname='schoolnew_schemeindent';
                $new_tname='schoolnew_mealindent';
                
                $data['students']=$this->Homemodel->getStudentforNoonmealIndent($schoolid,$classid,$sectionid,$tname);

                echo json_encode(json_decode(json_encode($data),true));
        }

        //To Save noonmeal Indent
        function save_noonmeal_indent(){
                
                date_default_timezone_set('Asia/Kolkata');

                $schemeid=$this->input->post('scheme_id');
            
                $classid=$this->input->post('class_id');

                $sectionid =$this->input->post('section_id');

                $schoolid = $this->session->userdata('emis_school_id');

                $tname='schoolnew_schemeindent';$validation=0;$x=0;$y=0;
                $new_tname='schoolnew_mealindent';

                $students=$this->Homemodel->getStudentforNoonmealIndent($schoolid,$classid,$sectionid,$tname);
                
                foreach($students as $stud){
                        $updated = $_POST['updated_'.$stud->id];

                        if($stud->unique_supply == null){
                            $validation++;
                        }

                        $eligble_case = isset($_POST['eligble_'.$stud->id]) ? 1 : 0;

                        $indentdt=$stud->indent_date!=null||$stud->indent_date!=0000-00-00?$stud->indent:date("Y-m-d H:i:s",strtotime("now"));

                        if($updated == 1 && $eligble_case == 1){     
                            $noonmeal_arr[$x++]=array(
                                'scheme_id'=> $schemeid,'scheme_category' => null,
                                'student_id' => $stud->id,'school_id' => $schoolid,
                                'class'=> $classid,'indent_date' => $indentdt,
                                'createddate' => date("Y-m-d H:i:s",strtotime("now")),
                                'distribution_date' => date("Y-m-d H:i:s",strtotime("now")),
                                'unique_supply' => $eligble_case,'isactive'=> 1 );
                        }

                        if($updated == 1 && $eligble_case == 0){     
                            $studs[$y++]=array(
                                               'scheme_id'=> $schemeid,
                                               'school_id' => $schoolid,
                                               'class_id'=> $classid,
                                               'student_id' => $stud->id,
                                               'isactive'=> 1 );
                        }
                }
// echo '$validation'.$validation;
// echo 'count($students)'.count($students);
// echo 'one';
// print_r($studs); echo '<br/>';echo'two';
// print_r($noonmeal_arr);
//die();


                $noonmeal_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($noonmeal_arr,$tname)
                                                                       : $this->Homemodel->updateOnSchemeIndent($studs,$noonmeal_arr,$tname,$sectionid);
                       
                if(!$noonmeal_response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                                echo '</script>';
                }
                // else{
                //                 echo '<script language="javascript">';
                //                 echo 'alert("Data Successfully Inserted !")';
                //                 echo '</script>';
                // }

                redirect($_POST['redirect'].'/'.$classid.'/'.$sectionid,'refresh');
        }

        //To View Stationery Indent
        function stationery_indent(){

                $where="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.id IN (4,5,6,7,8,9)";
                $groupby = " group by schoolnew_freescheme.id";

                // $school_id = $this->session->userdata('emis_school_id');
                // $data['scheme'] = $this->Homemodel->getListAllFilteredSchemes($where,$groupby);
                // $school = $this->Homemodel->student_classwise($school_id);
                // $data['students_classwise_count'] = $school['school_details'];
                // $data['class_level'] = $school['result'];

                $vis="schoolnew_freescheme.visibility>-2";
                $data['scheme']=$this->Homemodel->getListAllFilteredSchemes($where,$groupby);
                $data['summary']=json_decode(json_encode($this->Homemodel->getSummaryCountForStationeryIndent($this->session->userdata('emis_school_id'))),true);
                
                // $data['notebook'] =$this->Homemodel->getDtlforNoteBookEligibility();

                if($this->input->post('nb_form_term')!=null){
                    //   $term = $this->input->post('term') == '1' ? $this->input->post('nb_form_term') : NULL ;
                    //   $wher e2 = ' where a.term = '.$term;
                
                    $where3 = $this->input->post('term') == '1' ? ' where a.term is null or a.term NOT IN (2,3)' : ' where a.term = '.$this->input->post('nb_form_term');
                    $data['termID'] = $this->input->post('nb_form_term');    
                    $data['notebook'] = $this->Homemodel->getDtlforNoteBookEligibility($where3);
                }
                else if($this->input->post('nb_form_term')==null){
                    $data['termID'] = null;
                    $where3 = ' where a.term = "1"' ;
                    $data['notebook'] = $this->Homemodel->getDtlforNoteBookEligibility($where3);
                }
                $this->load->view('freeSchemes/emis_stationery_indent',$data);

        }

    /** Indent Functionality Ends  */

    /** Scheme Laptop-Distribution Functionality : 01.08.2019(venba/ps) */

        //To Load Laptop Distribution View 
        function laptop_dist() { 
            // $vis="schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
            // $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
            $where="schoolnew_freescheme.id IN (11)";
            $groupby = " group by schoolnew_freescheme.id";
            $school_id = $this->session->userdata('emis_school_id');
            $data['scheme'] = $this->Homemodel->getListAllFilteredSchemes($where,$groupby);
            $this->load->view('freeSchemes/emis_laptop_distribution',$data);
        }

        
        //In Laptop Distribution - classwise Sectionlist(Ajax Response)
        function get_school_section_details()
        {
          $class_id = $this->input->post('class_id');
          $class_section = $this->Homemodel->get_schoolwise_class_section($class_id);
          echo json_encode($class_section);
        }

        //In Laptop Distribution - To Load Data on Datatable(Ajax Response)
        function get_laptop_distribution(){
            
            $classid=$this->input->post('appli_class');        
            $sectionid = $this->input->post('appli_section');
            $aca_yr_id = $this->input->post('academic_year_id');
            $data['students']= $this->Homemodel->getLaptopDistibutionforScheme(11,$classid,$aca_yr_id,$this->session->userdata('emis_school_id'),$sectionid);
            $data['scheme']=$this->Homemodel->getSchemeDetails(11,$classid);
            echo json_encode(json_decode(json_encode($data),true));
        } 
    
        //In Laptop Distribution - To Save Records to DB
        function save_laptop_distribution(){

            date_default_timezone_set('Asia/Kolkata');
            $classid=$_POST['hide_class_id'];
            $aca_year_id = $_POST['hide_aca_yr_id'];
            $academicyear = $_POST['hide_academic_yr'];
            $sectionid = $_POST['hide_section_id'];
            $schoolid=$this->session->userdata('emis_school_id');
            $loggedin_user=$this->session->userdata('emis_user_id');
            $schoolpupils = $this->Homemodel->getLaptopDistibutionforScheme(11,$classid,$aca_year_id,$schoolid,$sectionid);

            $tname='schoolnew_computerindent';$x=0;
            
                foreach($schoolpupils as $sp){
                    // if(isset($_POST['opt_'.$sp->id])){
                        $updated = $_POST['updated_'.$sp->id];
                        $checked = isset($_POST['opt_'.$sp->id]) ? 1 : 0;

                        $ser = isset($_POST['ser_'.$sp->id])?($_POST['ser_'.$sp->id]!=null?$_POST['ser_'.$sp->id]:NULL):NULL;
                        $dis=isset($_POST['dt_'.$sp->id])?($_POST['dt_'.$sp->id]!=null?$_POST['dt_'.$sp->id]:NULL):NULL;

                        if($updated == 1){
                            $laptop_dist_arr[$x++]=array(
                                'scheme_id'=> 11,
                                'student_id' => $sp->id,
                                'school_id' => $schoolid,
                                'class'=> $classid,
                                'timestamp' => date('Y-m-d h:i:s'),
                                'distribution_date' => isset($_POST['opt_'.$sp->id]) ? $dis : null,
                                'unique_supply' => isset($_POST['opt_'.$sp->id]) ? $ser : null,
                                'created_by'=> $loggedin_user,
                                'acyear'=>$academicyear,
                                'isactive'=> $checked    
                            );
                          }
                 }
            
                $laptop_dist_response =  $this->Homemodel->saveLaptopDistDtls($laptop_dist_arr,$tname,$sectionid);
            
                if($laptop_dist_response == 0){
                    echo '<script>alert("There is No Changes In Our Records!")</script>';
                }
                else if($laptop_dist_response == 1){
                    echo '<script>alert("Successfully Registered")</script>';
                }
                else if($laptop_dist_response == 2){
                    echo '<script>alert("SomeThing Went Wrong!")</script>';
                }
                
                redirect($_POST['redirect'].'/'.$aca_year_id.'/'.$classid.'/'.$sectionid,'refresh');
                
                
        }

        //In Laptop Distribution - UniqueID Validation (field-Change-wise with Existing Data)
        function check_with_exist_serialno(){
            $rec = $this->input->post('rec');
            $msg = isset($rec) ? $this->Homemodel->checkWithExistUniqueID($rec) : 1; 
            echo $msg;
        }


        //To Load Other Scheme Distribution View 
        function essentials_dist(){
            // $vis="schoolnew_freescheme.hill_restrict=0 AND schoolnew_freescheme.visibility=1";
            $vis="schoolnew_freescheme.hill_restrict=0 AND schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2";
            $data['scheme']=$this->Homemodel->getListAllSchemes($this->session->userdata('emis_school_id'),$vis);
            $this->load->view('freeSchemes/emis_otherscheme_distribution',$data);
        }

        function get_essentials_dist(){
            $scheme_id=$this->input->post('scheme_id');
            $classid=$this->input->post('appli_class');        
            $sectionid = $this->input->post('appli_section');    
            $schoolid = $this->session->userdata('emis_school_id');

            switch($scheme_id){
                // case 1 : $tname = 'schoolnew_uniform_scheme' ; break; 
                // case 2 : $tname = 'schoolnew_footwear_scheme' ; break; 
                case 3 : $tname = 'schoolnew_notebooks_dist' ; break; 
                case 9 : $tname = 'schoolnew_books_dist' ; break; 
                case 11: $tname = 'schoolnew_computerindent' ; break; 
                // case 12 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 15 : $tname = 'schoolnew_mealindent' ; break; 
                // case 16 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 17 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                // case 18 : $tname = 'schoolnew_hillstation_scheme' ; break; 
                default : $tname = 'schoolnew_schemeindent' ; break;
            }

            if($scheme_id == 1){
                $data['students']=$this->Homemodel->getStudentforUniformDist($classid,$this->session->userdata('emis_school_id'),$sectionid,$tname);
            }
            else{ 
                $data['students']= $this->Homemodel->getOtherDistibutionforScheme($schoolid,$classid,$sectionid,$scheme_id,$tname);
                
            }
            $data['scheme']=$this->Homemodel->getSchemeDetails($scheme_id,$classid);
            echo json_encode(json_decode(json_encode($data),true));
        }
    /** Laptop-Distribution Functionality Ends */

    /** Hill Section Scheme Functionality : last mod - 20.08.2019(venba/ps) */
        function hill_station_scheme() { 
            $where="schoolnew_freescheme.visibility = 1 AND schoolnew_freescheme.hill_restrict = 1";
            $groupby = " group by schoolnew_freescheme.id";
            $data['scheme'] = $this->Homemodel->getListAllFilteredSchemes($where,$groupby);
            $this->load->view('freeSchemes/emis_hill_station_scheme',$data);
        }
        //To Load Data on table(Ajax Response)
        function get_hill_station_scheme(){
            
            $class_id=$this->input->post('appli_class');        
            $section_id = $this->input->post('appli_section');
            $scheme_id = $this->input->post('scheme');
            $school_id = $this->session->userdata('emis_school_id');
            $new_tname = 'schoolnew_hillstation_scheme' ;
            $tname='schoolnew_schemeindent';
            $data['students']=$this->Homemodel->getStudentforFootwearAndHillStationIndent($school_id,$class_id,$section_id,$scheme_id,$tname);
            $data['schemes_category']=$this->Homemodel->getSchemeDetails($scheme_id,$class_id);
            echo json_encode($data);

        }
        function save_hill_station_scheme(){

            date_default_timezone_set('Asia/Kolkata');
            $classid=$this->input->post('hd_class_id');
            $sectionid = $this->input->post('hd_section_id');
            $schemeid = $this->input->post('hd_scheme_id');
            $type = $this->input->post('hd_scheme_type');
            $dt = date("Y-m-d H:m:s",strtotime("now"));

            $schoolid=$this->session->userdata('emis_school_id');
            

            $tname='schoolnew_schemeindent';$validation=0;$x=0;$y=0;
            $new_tname = 'schoolnew_hillstation_scheme' ;
            $students=$this->Homemodel->getStudentforFootwearAndHillStationIndent($schoolid,$classid,$sectionid,$schemeid,$tname);

            foreach($students as $stud){        
                $updated = $_POST['updated_'.$stud->id];
                $eligble_case = isset($_POST['opt_'.$stud->id]) ? 1 : 0;       
                if($stud->indent_date == null){
                    $validation++;
                }

                if($updated == 1 && $eligble_case == 1){     
                    // $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null?$_POST['size_'.$stud->id]:NULL):NULL;
                    $size=isset($_POST['size_'.$stud->id])?($_POST['size_'.$stud->id]!=null || $_POST['size_'.$stud->id]!=0 ?$_POST['size_'.$stud->id]:NULL):NULL;
                    $indent_dt = ($stud->indent_date != null || $stud->indent_date != '') ? $stud->indent_date  : $dt ;
                    $distribute_dt = $type == 1 ? isset($_POST['dt_'.$stud->id])?($_POST['dt_'.$stud->id]!=null?$_POST['dt_'.$stud->id]:NULL):NULL:NULL;
                    
                    $_arr[$x++]=array('scheme_id'=> $schemeid,'scheme_category' => $size,
                                      'student_id' => $stud->id,'school_id' => $schoolid,
                                      'class'=> $classid,'indent_date' => $indent_dt,'createddate' => $dt,
                                      'distribution_date' => $distribute_dt,'unique_supply' => null,'isactive'=> 1);

                                      $studs[$y++]=array(
                                        'scheme_id'=> $schemeid,
                                        'school_id' => $schoolid,
                                        'class_id'=> $classid,
                                        'student_id' => $stud->id,
                                        'isactive'=> 1 );
                }

                if($updated == 1 && $eligble_case == 0){     
                        $studs[$y++]=array(
                            'scheme_id'=> $schemeid,
                            'school_id' => $schoolid,
                            'class_id'=> $classid,
                            'student_id' => $stud->id,
                            'isactive'=> 1 );
                }
            }
               
            // $_response = $this->Homemodel->submitSchemeDtls($_arr,$schemeid,$classid,$schoolid,'schoolnew_schemeindent',$sectionid);     
            
            $_response = ($validation == count($students)) ? $this->Homemodel->insertOnSchemeIndent($_arr,$tname)
                            : $this->Homemodel->updateOnSchemeIndent($studs,$_arr,$tname,$sectionid);
            

            if(!$_response){
                echo '<script language="javascript">';
                echo 'alert("SomeThing Went Wrong While Inserting the Data. Have To Check Again !")';
                echo '</script>';
            }
            else{
                            echo '<script language="javascript">';
                            echo 'alert("Data Successfully Inserted !")';
                            echo '</script>';
            }

            redirect($_POST['redirect'].'/'.$schemeid.'/'.$classid.'/'.$sectionid.'/'.$type,'refresh');
        }
    /** Hill Section Ends  */

    /** Additional School Profile Details Functionality last mod -  20.08.2019(venba/ps) */
        function additional_details() { 
                $school_id = $this->session->userdata('emis_school_id');
                
                $library_entry = json_decode(json_encode($this->Homemodel->getListOfLibraryEntry($school_id)), True);

                foreach($library_entry as $key=>$value) { 
                    if($value['library_type'] == 1){ $library_entry[$key]["name"]= "Library"; }
                    if($value['library_type'] == 2){ $library_entry[$key]['name'] = 'Book Bank'; }
                    if($value['library_type'] == 3){ $library_entry[$key]['name'] = 'Reading Corner'; }
                    if($value['library_type'] == 4){ $library_entry[$key]['name'] = 'Newspapers/Magazines'; }
                    if($value['library_type'] == 5){ $library_entry[$key]['name'] = 'None'; }
                }
                
                $training_detail_arr=array('boarding_pri_yn','boarding_pri_b','boarding_pri_g','boarding_upr_yn','boarding_upr_b','boarding_upr_g','boarding_sec_yn','boarding_sec_b','boarding_sec_g','boarding_hsec_yn','boarding_hsec_b','boarding_hsec_g','ppsec_yn','anganwadi_stu_b','anganwadi_stu_g','ict_tools_yn','ict_teach_hrs','medchk_tot','teachdev_yn','teachdev_tot','teachdev_fun','grd1_samescl_b','grd1_samescl_g','grd1_othscl_b','grd1_othscl_g','grd1_angan_b','grd1_angan_g');
                $academic_detail_arr=array( 'mtongue_pri','board_sec','board_sec_no','board_sec_oth','board_hsec','board_hsec_no','board_hsec_oth','distance_pri','distance_upr','distance_sec','distance_hsec');
                $committee_detail_arr = array( 'smc_par_sc','smc_par_st','smc_tch_m','smc_tch_f','smc_trained_m','smc_trained_f','smc_meetings','smdc_par_ews_m','smdc_par_ews_f','smdc_smc_same_yn','smdc_trained_m','smdc_trained_f');
                $infra_detail_arr = array('clsrms_dptd','bld_status','stus_hv_furnt','ahmvp_room_yn','hand_pump_tot','hand_pump_fun','well_prot_tot','well_prot_fun','well_unprot_tot','well_unprot_fun','tap_tot','tap_fun','pack_water','pack_water_fun','othsrc_tot','othsrc_fun','othsrc_name','handwash_toil_yn');
            
                $data['library_entry'] = $library_entry;
                $data['training_detail'] = $this->Homemodel->getListOfAdditionalProfileDetail($training_detail_arr,$school_id,'schoolnew_training_detail');
                $data['academic_detail'] = $this->Homemodel->getListOfAdditionalProfileDetail($academic_detail_arr,$school_id,'schoolnew_academic_detail');
                $data['committee_detail'] = $this->Homemodel->getListOfAdditionalProfileDetail($committee_detail_arr,$school_id,'schoolnew_committee_detail');
                $data['infra_detail'] = $this->Homemodel->getListOfAdditionalProfileDetail($infra_detail_arr,$school_id,'schoolnew_infra_detail');
                $data['lib_entry_detail'] = $this->Homemodel->getListOfLibraryEntry($school_id);
            
                $this->load->view('schoolInfo/emis_school_profile_additional_details',$data);
                
        }

        function save_additional_detials(){
            $segment=$this->uri->segment(3,0);
            $school_id = $this->session->userdata('emis_school_id');
            $tab = $this->input->post('hide_tab_name');
            // print_r($this->input->post());

            switch($segment){
                        case 1:{
                            $array_data = array('boarding_pri_yn'=> $this->input->post('boarding_pri_yn'),
                                                'boarding_pri_b'=> $this->input->post('boarding_pri_b'),
                                                'boarding_pri_g'=> $this->input->post('boarding_pri_g'),
                                                'boarding_upr_yn'=> $this->input->post('boarding_upr_yn'),
                                                'boarding_upr_b'=> $this->input->post('boarding_upr_b'),
                                                'boarding_upr_g'=> $this->input->post('boarding_upr_g'),
                                                'boarding_sec_yn' => $this->input->post('boarding_sec_yn'),
                                                'boarding_sec_b' => $this->input->post('boarding_sec_b'),
                                                'boarding_sec_g' => $this->input->post('boarding_sec_g'),
                                                'boarding_hsec_yn' => $this->input->post('boarding_hsec_yn'),
                                                'boarding_hsec_b' => $this->input->post('boarding_hsec_b'),
                                                'boarding_hsec_g' => $this->input->post('boarding_hsec_g'));
                            $table_name = 'schoolnew_training_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$array_data,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        }   
                        case 2:{
                            $academic_detail_arr=array( 'board_sec' => $this->input->post('board_sec'),
                                                        'board_sec_no' => $this->input->post('board_sec_no'),
                                                        'board_sec_oth' => $this->input->post('board_sec_oth'),
                                                        'board_hsec' => $this->input->post('board_hsec'),
                                                        'board_hsec_no' => $this->input->post('board_hsec_no'),
                                                        'board_hsec_oth' => $this->input->post('board_hsec_oth'));
                            $table_name = 'schoolnew_academic_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$academic_detail_arr,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        } 
                        case 3:{
                            $academic_detail_arr=array( 'distance_pri' => $this->input->post('distance_pri'),
                                                        'distance_upr' => $this->input->post('distance_upr'),
                                                        'distance_sec' => $this->input->post('distance_sec'),
                                                        'distance_hsec' => $this->input->post('distance_hsec'));
                            $table_name = 'schoolnew_academic_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$academic_detail_arr,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        } 
                        case 4:{
                            $array_data = array( 'ppsec_yn'=> $this->input->post('ppsec_yn'),
                                                'anganwadi_stu_b'=> $this->input->post('anganwadi_stu_b'),
                                                'anganwadi_stu_g'=> $this->input->post('anganwadi_stu_g'));
                            $table_name = 'schoolnew_training_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$array_data,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        } 
                        case 5:{
                            $committee_detail_arr = array( 
                                                        'smc_par_sc' => $this->input->post('smc_par_sc'),
                                                        'smc_par_st' => $this->input->post('smc_par_st'),
                                                        'smc_tch_m' => $this->input->post('smc_tch_m'),
                                                        'smc_tch_f' => $this->input->post('smc_tch_f'),
                                                        'smc_trained_m' => $this->input->post('smc_trained_m'),
                                                        'smc_trained_f' => $this->input->post('smc_trained_f'),
                                                        'smc_meetings' => $this->input->post('smc_meetings'),
                                                        'smdc_par_ews_m' => $this->input->post('smdc_par_ews_m'),
                                                        'smdc_par_ews_f' => $this->input->post('smdc_par_ews_f'),
                                                        'smdc_smc_same_yn' => $this->input->post('smdc_smc_same_yn'),
                                                        'smdc_trained_m' => $this->input->post('smdc_trained_m'),
                                                        'smdc_trained_f'=> $this->input->post('smdc_trained_f'));
                            $table_name = 'schoolnew_committee_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$committee_detail_arr,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        } 
                        case 6:{
                            
                            $array_data = array('ict_tools_yn'=> $this->input->post('ict_tools_yn'),
                                                'ict_teach_hrs'=> $this->input->post('ict_teach_hrs'),
                                                'teachdev_yn'=> $this->input->post('teachdev_yn'),
                                                'teachdev_tot'=> $this->input->post('teachdev_tot'),
                                                'teachdev_fun'=> $this->input->post('teachdev_fun'));
                            $table_name = 'schoolnew_training_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$array_data,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }

                            $array_data2 =array('hand_pump_tot'=> $this->input->post('hand_pump_tot'),
                                                'hand_pump_fun'=> $this->input->post('hand_pump_fun'),
                                                'well_prot_tot'=> $this->input->post('well_prot_tot'),
                                                'well_prot_fun'=> $this->input->post('well_prot_fun'),
                                                'well_unprot_tot'=> $this->input->post('well_unprot_tot'),
                                                'well_unprot_fun'=> $this->input->post('well_unprot_fun'),
                                                'tap_tot'=> $this->input->post('tap_tot'),
                                                'tap_fun'=> $this->input->post('tap_fun'),
                                                'pack_water'=> $this->input->post('pack_water'),
                                                'pack_water_fun'=> $this->input->post('pack_water_fun'),
                                                'othsrc_tot'=> $this->input->post('othsrc_tot'),
                                                'othsrc_fun'=> $this->input->post('othsrc_fun'),
                                                'othsrc_name'=> $this->input->post('othsrc_name'),
                                                'handwash_toil_yn'=> $this->input->post('handwash_toil_yn'));
                            $response2 = $this->Homemodel->update_additional_profile_dtls($school_id,$array_data2,'schoolnew_infra_detail');
                            if(!$response2){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }

                            $library_entry = json_decode(json_encode($this->Homemodel->getListOfLibraryEntry($school_id)), True);
                            if(!empty($library_entry))
                            {
                                    foreach($library_entry as $key=>$value) { 
                                        $array_data3 =array('ncert_books'=> $this->input->post('ncert_books_'.$value['library_type']));
                                        $response3 = $this->Homemodel->update_library_entry_dtls($school_id,$array_data3,$value['library_type']);
                                    }
                            }

                            // $array_data3 =array('ncert_books'=> $this->input->post('ncert_books'));
                            // $response3 = $this->Homemodel->update_library_entry_dtls($school_id,$array_data3,'schoolnew_library_entry');
                            // if(!$response3){
                            //     echo '<script language="javascript">';
                            //     echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                            //     echo '</script>';
                            // }
                            
                            break;
                        } 
                        case 7:{
                            $infra_detail_arr = array('clsrms_dptd' => $this->input->post('clsrms_dptd'),
                                                    'bld_status' => $this->input->post('bld_status'),
                                                    'stus_hv_furnt' =>$this->input->post('stus_hv_furnt'),
                                                    'ahmvp_room_yn' => $this->input->post('ahmvp_room_yn'));            
                            $table_name = 'schoolnew_infra_detail';
                            $response = $this->Homemodel->update_additional_profile_dtls($school_id,$infra_detail_arr,$table_name);
                            if(!$response){
                                echo '<script language="javascript">';
                                echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                echo '</script>';
                            }
                            break;
                        } 
                        case 8:{
                                $array_data = array('medchk_tot'=> $this->input->post('medchk_tot'),
                                                    'grd1_samescl_b'=> $this->input->post('grd1_samescl_b'),
                                                    'grd1_samescl_g'=> $this->input->post('grd1_samescl_g'),
                                                    'grd1_othscl_b'=> $this->input->post('grd1_othscl_b'),
                                                    'grd1_othscl_g'=> $this->input->post('grd1_othscl_g'),
                                                    'grd1_angan_b'=> $this->input->post('grd1_angan_b'),
                                                    'grd1_angan_g'=> $this->input->post('grd1_angan_g'));
                                $table_name = 'schoolnew_training_detail';
                                $response = $this->Homemodel->update_additional_profile_dtls($school_id,$array_data,$table_name);
                                if(!$response){
                                    echo '<script language="javascript">';
                                    echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                    echo '</script>';
                                }

                                $academic_detail_arr=array( 'mtongue_pri' => $this->input->post('mtongue_pri'));
                                $table_name2 = 'schoolnew_academic_detail';
                                $response2 = $this->Homemodel->update_additional_profile_dtls($school_id,$academic_detail_arr,$table_name2);
                                if(!$response2){
                                    echo '<script language="javascript">';
                                    echo 'alert("SomeThing Went Wrong While Updating the Data. Have To Check Again !")';
                                    echo '</script>';
                                }
                                break;
                        } 
                    }
                    redirect('Basic/additional_details/'.$tab,'refresh');
        }
    /** Additional School Profile Details Functionality Ends   */


    /*****************************************************************************
            Temporary Schoool details update 28-03-2019
            **********************************************************************/
            
            
    /*public function schoolupdation()
    {
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        $part=$this->uri->segment(3,0);
        
        $tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academicinfo';
        $tableNames[2]='schoolnew_academicinfo2';
        $tableNames[3]='schoolnew_land';
        $tableNames[4]='schoolnew_building';
        $tableNames[5]='schoolnew_infradet';
        $tableNames[6]='schoolnew_fund';
        
        //All Tables are Multiple Insert Recurresive Table
        //$tableNames[7]='schoolnew_building_abs';
        $tableNames[7]='schoolnew_ictentry';
        $tableNames[8]='schoolnew_internet';
        $tableNames[9]='schoolnew_labentry';
        $tableNames[10]='schoolnew_equipment';
        $tableNames[11]='schoolnew_inventry';
        $tableNames[12]='schoolnew_medical';
        $tableNames[13]='schoolnew_feestruct';
        $tableNames[14]='schoolnew_mediumentry';
        $tableNames[15]='schoolnew_voctrade_entry';
        $tableNames[16]='schoolnew_langtaught_entry';
        $tableNames[17]='schoolnew_dayswork_entry';
        $tableNames[18]='schoolnew_extracc_entry';
        $tableNames[19]='schoolnew_inspection_entry';
        $tableNames[20]='schoolnew_natureofconst_entry';
        $tableNames[21]='schoolnew_library_entry';
        $tableNames[22]='schoolnew_classroomlevel_entry';
        
        $this->postCorrection();
        
        $tableID=0;
        foreach($tableNames as $tbs => $tablename){
            if($tablename=='schoolnew_basicinfo'){
                $referID='udise_code';$referValue=$this->session->userdata('emis_school_udise');
            }
            else{
                $referID='school_key_id';$referValue=$this->session->userdata('emis_school_id');
            }
            $data['tableName']=$tablename;  
            $data['referenceID']=$referID;
            $data['referenceValue']=$referValue;
            $data['data']=$this->_remap(part1andpart2,$data['tableName']);
            $data['InsertCheck']=null;
            //echo($tablename.'<br>');
            if($tableID > 6){
                if(!isset($_POST[$tablename])){
                    continue;
                }
                else{
                    echo $tablename."<br>";
                    $data['data']=$_POST[$tablename];
                    $data['InsertCheck']=3;
                }
            }
            if($data['data']!=''){
                if(!$this->_remap(InsertAndUpdate,$data)){
                    print_r($data['data']);die("Error :".$tablename);
                    $this->session->set_flashdata('errors','Unable to update. please try after some time.-'.$tablename);
                    redirect('Basic/emis_school_details_entry/'.$part.'/error');
                }
            }
            $tableID++;
        }
        $data=array('school_key_id' => $this->session->userdata('emis_school_id'),'part_'.$part => 1);
        if($this->Homemodel->UpdateProfileCompleteFlag($data,$this->session->userdata('emis_school_id'))){
            //print_r($_POST);die("Completed");
            $this->session->set_userdata('school_profile',$this->Datamodel->getProfileComplete($this->session->userdata('emis_school_udise')));
            
            switch($part){
                case 1:redirect('Basic/emis_school_details_entry/2/success');break;
                case 2:redirect('Basic/emis_school_details_entry/3/success');break;
                case 3:redirect('Basic/emis_school_details_entry/4/success');break;
                case 4:redirect('Basic/emis_school_details_entry/5/success');break;
                case 5:redirect('Basic/emis_school_details_entry/6/success');break;
                case 6:{
                    if($this->session->userdata('school_manage')>1 && $this->session->userdata('school_manage')<5)
                        redirect('Basic/emis_school_details_entry/7/success');
                    else
                        redirect('Home/emis_school_profile'); 
                    break;
                }
                case 7:redirect('Home/emis_school_profile');break;
                
            }
        }else{
            $this->session->set_flashdata('errors','Unable to update. please try after some time.-schoolnew_profilecomplete');
            redirect('Basic/emis_school_details_entry/'.$part.'/error');
        }
    }
    
    
    function postCorrection(){
        $created_date=date('Y-m-d',strtotime("now+5hours30minutes"));
        foreach($_POST as $post => $value){
            switch($post){
                case 'urbanrural':$_POST['town_panchayat_id']=$_POST['urbanrural'];break;
                case 'addressline_1':$_POST['address']=$_POST['addressline_1'].'\n'.$_POST['addressline_2'];break;
                case 'yearofrec_0':{$i=0;
                    while(isset($_POST['yearofrec_'.$i])){
                        switch($_POST['yearofrec_'.$i]){
                            case 1:$_POST['yr_rec_schl_elem']=$_POST['firstRecognition_'.$i];break;
                            case 2:$_POST['yr_rec_schl_sec']=$_POST['firstRecognition_'.$i];break;
                            case 3:$_POST['yr_rec_schl_hsc']=$_POST['firstRecognition_'.$i];break;
                        }
                        $i++;
                    }
                    break;
                }
                
                case 'ccesh_0':{$i=0;
                    while(isset($_POST['ccesh_'.$i])){
                        switch($_POST['ccesh_'.$i]){
                            case 1:$_POST['cce_imp_schl_elem']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                            case 2:$_POST['cce_imp_schl_sec']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                            case 3:$_POST['cce_imp_schl_hsc']=$_POST['ccesh_'.$i];$_POST['cumm_rcrd_ppl_mntnd']=$_POST['crm_'.$i];$_POST['cumm_rcrd_ppl_shrwthprnts']=$_POST['crs_'.$i];break;
                        }
                        $i++;
                    }
                }
                
                case 'hiddenmedium_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['instructedlang_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'medium_instrut'    =>      $_POST['instructedlang_'.$i],
                                        'other_medium'       =>     $_POST['ifothers_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $_POST['noof_med']=$i-1;
                    $tbname=$_POST['hiddenmedium_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenlanguage_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['languagetaught_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'lang_taught'       =>      $_POST['languagetaught_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $tbname=$_POST['hiddenlanguage_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenvoctrades_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['prevocationaltrades_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'voc_trade'         =>      $_POST['prevocationaltrades_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                           $i++;
                    }
                    $tbname=$_POST['hiddenvoctrades_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenclub_0':{$i=1;$dtmulti=array();
                    while(isset($_POST['club_'.$i])){
                       $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'extra_cc'          =>      $_POST['club_'.$i],
                                        'other_cc'          =>      $_POST['ifothersd_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenclub_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenlbrc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lbrc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'library_type'          =>      $_POST['lbrc_'.$i],
                                        'num_books'             =>      $_POST['lbr1_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenlbrc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                    break;
                }
                case 'hiddenoac_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['oac_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'     =>      $this->session->userdata('emis_school_id'),
                                        'school_type'          =>   $_POST['oac_'.$i],
                                        'num_rooms'          =>     $_POST['hmr_'.$i],
                                        'created_date'      =>      $created_date
                                    );
                           
                       $i++;
                    }
                    $tbname=$_POST['hiddenoac_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddennoc_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['noc_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'             =>      $this->session->userdata('emis_school_id'),
                                        'construct_type'            =>      $_POST['noc_'.$i],
                                        'total_flrs'                =>      $_POST['totalarea_'.$i],
                                        'tot_classrm_use'           =>      $_POST['classroominuse_'.$i],
                                        'tot_classrm_nouse'         =>      $_POST['classroomnotuse_'.$i],
                                        'off_room'                  =>      $_POST['officeroom_'.$i],
                                        'lab_room'                  =>      $_POST['labroom_'.$i],
                                        'library_room'              =>      $_POST['libraryroom_'.$i],
                                        'comp_room'                 =>      $_POST['com_'.$i],
                                        'art_room'                  =>      $_POST['gam_'.$i],
                                        'staff_room'                =>      $_POST['staffroom_'.$i],
                                        'hm_room'                   =>      $_POST['sra_'.$i],
                                        'girl_room'                 =>      $_POST['scrg1_'.$i],
                                        'total_room'                =>      $_POST['noofrooms_'.$i],
                                        'created_date'              =>      $created_date
                                     );
                        $i++;
                    }
                    $tbname=$_POST['hiddennoc_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenhours_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['sch_'.$i])){
                            $chld=explode(":",$_POST['childrenhours_'.$i]);
                            $teas=explode(":",$_POST['teacherhours_'.$i]);
                          $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'school_type'           =>      $_POST['sch_'.$i],
                                        'instr_dys'             =>      $_POST['instructdays_'.$i],
                                        'hrs_chldrn_sty_schl'   =>      (int) $chld[0],
                                        'mns_chldrn_sty_schl'   =>      (int) $chld[1],
                                        'hrs_tchrs_sty_schl'    =>      (int) $teas[0],
                                        'mns_tchrs_sty_schl'    =>      (int) $teas[1],
                                        'cce_impl'              =>      $_POST['ccesch_'.$i],
                                        'cce_cum'               =>      $_POST['crm_'.$i],
                                        'cce_shared'            =>      $_POST['crs_'.$i],
                                        'created_date'          =>      $created_date
                                     );
                        $i++;
                    }
                    $tbname=$_POST['hiddenhours_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                
                case 'hiddenofficer000_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['officer000_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'officer_type'          =>      $_POST['officer000_'.$i],
                                        'purpose'               =>      $_POST['officer00_'.$i],
                                        'date_inspect'          =>      date('Y-m-d',strtotime($_POST['visitdate_'.$i])),
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenofficer000_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddensd_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['sd_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'ict_type'              =>      $_POST['sd_'.$i],
                                        'working_no'            =>      $_POST['avai_'.$i],
                                        'not_working_no'        =>      $_POST['func_'.$i],
                                        'supplied_by'           =>      $_POST['supp_'.$i],
                                        'donor_ict'             =>      $_POST['ifotherngo_'.$i],
                                        'purpose'               =>      $_POST['prupu_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddensd_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddencmpname_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['supp_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'internet'              =>      $_POST['internet_yes'],
                                        'provided_by'           =>      $_POST['internetfacility_'.$i],
                                        'other_ngo'             =>      $_POST['ifother_'.$i],
                                        'subscriber'            =>      $_POST['cmpname_'.$i],
                                        'data_speed'            =>      $_POST['speed_'.$i],
                                        'range_unit'            =>      $_POST['range_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddencmpname_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenlablist_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lablist_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'lab_id'                =>      $_POST['lablist_'.$i],
                                        'seperate_room'         =>      $_POST['spr_'.$i],
                                        'condition_now'         =>      $_POST['equip_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenlablist_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenkit_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['kit_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'equip_id'              =>      $_POST['kit_'.$i],
                                        'supplied_by'           =>      $_POST['supp1_'.$i],
                                        'ngo_name'              =>      $_POST['supplyth_'.$i],
                                        'quantity'              =>      $_POST['func1_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenkit_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddenlot_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['lot_'.$i])){
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'inventry_id'              =>      $_POST['lot_'.$i],
                                        'supplied_by'           =>      $_POST['supply_'.$i],
                                        'donor_invent'              =>      $_POST['iflisup_'.$i],
                                        'working_no'            =>      $_POST['avail_'.$i],
                                        'not_working_no'        =>      $_POST['funct_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddenlot_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
                case 'hiddeninstifee_0':{$i=0;$dtmulti=array();
                    while(isset($_POST['instifee_'.$i])){
                        $exp=$_POST['classid_'.$i];
                        if($exp==-3){$cls=15;}elseif($exp==-2){$cls=14;}elseif($exp==-1){$cls=13;}else{$cls=$exp;}
                        $dtmulti[$i]=array(
                                        'school_key_id'         =>      $this->session->userdata('emis_school_id'),
                                        'class_id'              =>      $cls,
                                        'inst_fee'              =>      $_POST['instifee_'.$i],
                                        'tution_fee'            =>      $_POST['tutfee_'.$i],
                                        'regular_fee'           =>      $_POST['regularfee_'.$i],
                                        'transport_fee'         =>      $_POST['transfee_'.$i],
                                        'annual_fee'            =>      $_POST['annualfee_'.$i],
                                        'book_fee'              =>      $_POST['bookfee_'.$i],
                                        'lab_fee'               =>      $_POST['labfee_'.$i],
                                        'other_fee'             =>      $_POST['otherfee_'.$i],
                                        'total_fee'             =>      $_POST['totfee_'.$i],
                                        'created_date'          =>      $created_date
                                    );
                        $i++;
                    }
                    $tbname=$_POST['hiddeninstifee_0'];
                    $_POST[$tbname]=$dtmulti;
                    break;
                }
            }
            if($value==''){$value=null;}
        }
    }
    
    function part1andpart2($tbdesc=null){
                //print_r($_POST);
        $tableDescribtion=$this->Datamodel->getTableDescribtion($tbdesc);
        foreach($tableDescribtion as $tds){
            foreach($_POST as $post => $value){
                if($tds['Field']==$post){
                    $data[$post]=$value;
                }
            }
        }
        //echo('<br><br>');
        //print_r($_POST);
        //echo('<br><br>');
        return $data;
    }
    function _remap($method,$args){
        if (method_exists($this, $method)){
            $data=$this->$method($args);
            return $data;
        }
        else{
            $this->index($method,$args);
        }
    }
   
  
    
    function InsertAndUpdate($data=null){
        //print_r($data);
        $emis_loggedin = $this->session->userdata('emis_loggedin');
        if($emis_loggedin) {
            /*'edu_district_id' => $this->input->post('yearofestablishment'),             //Establishment of School
                'offcat_id' => $this->input->post('firstRecognition'),                      //Year of Recognition
                'office_email1' => $this->input->post('lastrenewal'),                       //Year of Recognition
                'office_email2' => $this->input->post('lastrenewalcertificatenumber')      //Year of Recognition
           if($this->Homemodel->UpdateToTableData($data['tableName'],$data['referenceID'],$data['data'],$data['referenceValue'],$data['InsertCheck'])){
                unset($_POST[$data['tableName']]);
                return true;
           }
           else{
                $this->session->set_flashdata('errors','Unable to update. please try after some time.');
                return false;
           }
        }
    }
    
    
    function getPartInformationByPost(){

        $tableNames[0]='schoolnew_basicinfo';
        $tableNames[1]='schoolnew_academicinfo';
        $tableNames[2]='schoolnew_academicinfo2';
        $tableNames[3]='schoolnew_land';
        $tableNames[4]='schoolnew_building';
        $tableNames[5]='schoolnew_infradet';
        $tableNames[6]='schoolnew_fund';
        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        
        /*foreach($data as $pidx => $pval){
            echo($pidx."<br>");
        }
        
        foreach($tableNames as $key => $table){
            if($table=='schoolnew_basicinfo'){
                $referID='udise_code';$referValue=$this->session->userdata('emis_school_udise');
            }
            else{
                $referID='school_key_id';$referValue=$this->session->userdata('emis_school_id');
            }
            $tdata=$this->Homemodel->ModelForAllParts($table,$referID,$referValue);
            //print_r($tdata[0]);
            if(isset($tdata[0])){
                foreach($tdata[0] as $tidx =>$tval){
                    //print_r($tidx);
					$i=0;
                    foreach($data as $pidx => $pval){
                        if($tidx == $pidx){
                            $vdata[$tidx]=$tval;
                            $i++;
                        }
                        else{
                            switch($tidx){
                                case 'town_panchayat_id':{$vdata['urbanrural']=$tval==0?2:$tval;
                                $vdata['urbanruraltext']=($vdata['urbanrural']=='2'?'Urban':'Rural');break;}
                                case 'address':$add=explode('\n',$tval);$vdata['addressline_1']=$add[0];$vdata['addressline_2']=$add[1];
                                case 'yr_rec_schl_elem':if($tval!=0 || $tval!=null){$vdata['yearofrec_0']=1;$vdata['firstRecognition_0']=$tval;}break;
                                case 'yr_rec_schl_sec':if($tval!=0 || $tval!=null){$vdata['yearofrec_1']=2;$vdata['firstRecognition_1']=$tval;}break;
                                case 'yr_rec_schl_hsc':if($tval!=0 || $tval!=null){$vdata['yearofrec_2']=3;$vdata['firstRecognition_2']=$tval;}break;
                                case 'village_panchayat_id':$vdata['village_ward']=$tval;break;
                                case 'local_body_type_id':$vdata['localbody_id']=$tval;break;
                            }
                        }
                    }
                }
            }
        }
        
        foreach($data as $pidx => $pval){
            if (strpos($pidx, 'hidden') !== false) {
                $referID='school_key_id';$referValue=$this->session->userdata('emis_school_id');
                $tdata=$this->Homemodel->ModelForAllParts($pval,$referID,$referValue);
                switch($pidx){
                    case 'hiddenmedium_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            if($tval->other_medium!=''){
                                $vdata['ifothers_'.$i]=$tval->other_medium;
                            }
                            $vdata['instructedlang_'.$i]=$tval->medium_instrut;
                            $i++;
                            //print_r($tval);echo('<br>');
                        }
                        break;
                    }
                    case 'hiddenlanguage_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['languagetaught_'.$i]=$tval->lang_taught;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenhours_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sch_'.$i]=$tval->school_type;
                            $vdata['instructdays_'.$i]=$tval->instr_dys;
                            $vdata['childrenhours_'.$i]=date('H:i',strtotime($tval->hrs_chldrn_sty_schl.':'.$tval->mns_chldrn_sty_schl));
                            $vdata['teacherhours_'.$i]=date('H:i',strtotime($tval->hrs_tchrs_sty_schl.':'.$tval->mns_tchrs_sty_schl));
                            $vdata['ccesch_'.$i]=$tval->cce_impl==null?0:$tval->cce_impl;
                            $vdata['crm_'.$i]=$tval->cce_cum==null?0:$tval->cce_cum;
                            $vdata['crs_'.$i]=$tval->cce_shared==null?0:$tval->cce_shared;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenclub_0':{$i=1;
                        foreach($tdata as $tidx => $tval){
                            $vdata['club_'.$i]=$tval->extra_cc;
                            $vdata['ifothersd_'.$i]=$tval->other_cc;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenofficer000_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['officer000_'.$i]=$tval->officer_type;
                            $vdata['officer00_'.$i]=$tval->purpose;
                            $vdata['visitdate_'.$i]=date('Y-m-d',strtotime($tval->date_inspect));
                            $i++;
                        }
                        break;
                    }
                    case 'hiddensd_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['sd_'.$i]=$tval->ict_type;
                            $vdata['avai_'.$i]=$tval->working_no;
                            $vdata['func_'.$i]=$tval->not_working_no;
                            $vdata['supp_'.$i]=$tval->supplied_by;
                            $vdata['ifotherngo_'.$i]=$tval->donor_ict;
                            $vdata['prupu_'.$i]=$tval->purpose;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddencmpname_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['internet_yes']=$tval->internet;
                            $vdata['internetfacility_'.$i]=$tval->provided_by;
                            $vdata['ifother_'.$i]=$tval->other_ngo;
                            $vdata['cmpname_'.$i]=$tval->subscriber;
                            $vdata['speed_'.$i]=$tval->data_speed;
                            $vdata['range_'.$i]=$tval->range_unit;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlablist_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lablist_'.$i]=$tval->lab_id;
                            $vdata['spr_'.$i]=$tval->seperate_room;
                            $vdata['equip_'.$i]=$tval->condition_now;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenkit_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['kit_'.$i]=$tval->equip_id;
                            $vdata['supp1_'.$i]=$tval->supplied_by;
                            $vdata['supplyth_'.$i]=$tval->ngo_name;
                            $vdata['func1_'.$i]=$tval->quantity;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlot_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->inventry_id;
                            $vdata['supply_'.$i]=$tval->supplied_by;
                            $vdata['iflisup_'.$i]=$tval->donor_invent;
                            $vdata['avail_'.$i]=$tval->working_no;
                            $vdata['funct_'.$i]=$tval->not_working_no;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddeninstifee_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lot_'.$i]=$tval->class_id;
                            $vdata['instifee_'.$i]=$tval->inst_fee;
                            $vdata['tutfee_'.$i]=$tval->tution_fee;
                            $vdata['regularfee_'.$i]=$tval->regular_fee;
                            $vdata['transfee_'.$i]=$tval->transport_fee;
                            $vdata['annualfee_'.$i]=$tval->annual_fee;
                            $vdata['bookfee_'.$i]=$tval->book_fee;
                            $vdata['labfee_'.$i]=$tval->lab_fee;
                            $vdata['otherfee_'.$i]=$tval->other_fee;
                            $vdata['totfee_'.$i]=$tval->total_fee;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddennoc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['noc_'.$i]=$tval->construct_type;
                            $vdata['totalarea_'.$i]=$tval->total_flrs;
                            $vdata['classroominuse_'.$i]=$tval->tot_classrm_use;
                            $vdata['classroomnotuse_'.$i]=$tval->tot_classrm_nouse;
                            $vdata['officeroom_'.$i]=$tval->off_room;
                            $vdata['labroom_'.$i]=$tval->lab_room;
                            $vdata['libraryroom_'.$i]=$tval->library_room;
                            $vdata['com_'.$i]=$tval->comp_room;
                            $vdata['gam_'.$i]=$tval->art_room;
                            $vdata['staffroom_'.$i]=$tval->staff_room;
                            $vdata['sra_'.$i]=$tval->hm_room;
                            $vdata['scrg1_'.$i]=$tval->girl_room;
                            $vdata['noofrooms_'.$i]=$tval->total_room;
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenlbrc_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['lbrc_'.$i]=$tval->library_type;
                            $vdata['lbr1_'.$i]=$tval->num_books;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenoac_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['oac_'.$i]=$tval->school_type;
                            $vdata['hmr_'.$i]=$tval->num_rooms;
                            
                            $i++;
                        }
                        break;
                    }
                    case 'hiddenvoctrades_0':{$i=0;
                        foreach($tdata as $tidx => $tval){
                            $vdata['prevocationaltrades_'.$i]=$tval->voc_trade;
                            $i++;
                        }
                        break;
                    }
                }
            }
        }
        
        echo(json_encode($vdata));
    }*/
    
    
    /******************************************************************************************
                Generate.js need to change the document element by name
    *********************************************************************************************/

}
?>