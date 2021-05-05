 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Basic extends REST_Controller
 {
        function __construct()
        {
                parent::__construct();

                $this->load->helper(array('form','url','html'));
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper('security');
                $this->load->database(); 
                $this->load->model('Datamodel');
                $this->load->model('Homemodel');
		}
		
		public function emis_school_detail_entry_get()
	    {
	    
		$school_udise =$this->get('school_id');     //url pass panna data eduthudu varakku
		//echo $school_udise; die();
	
	    $data['basic']=$this->Datamodel->getSchoolInfo($school_udise);
		// print_r($data); die();
		
	    $data['profile']=$this->Datamodel->getProfileComplete($data['basic'][0]->udise_code);
        $data['stdcode']=$this->Datamodel->getSTDCodeByDistrict($data['basic'][0]->district_id);
		$data['districts'] = $this->Datamodel->get_alldistricts();
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
        $data['ictsuplier']=$this->Datamodel->getICTSupplier();
		
	    $data['dataStatus'] = true;
        $data['status'] = REST_Controller::HTTP_OK;
        $this->response($data,REST_Controller::HTTP_OK);
	}
	 //over all school basic information data frend fitch 
   function emis_school_details_entry_post()   //this array function mula post data
   {
	
	    $record = $this->post("records");
        $part = $record['part'];
	    $school_udise =$record['school'];
	    // echo $school_udise ;
		// die();
		
		
        $data['dataStatus'] = true;
        $data['status'] = REST_Controller::HTTP_OK;
		$d=$this->Datamodel->getSchoolInfo($school_udise);
		$data['basic']=$d;
		// $data['basic'] = REST_Controller::HTTP_OK;
		$data['profile']=$this->Datamodel->getProfileComplete($data['basic'][0]->udise_code);
		$data['basic']=$this->Datamodel->getSchoolInfo($school_udise);
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
        $data['ictsuplier']=$this->Datamodel->getICTSupplier();
        $data['dataStatus'] = true;
        $data['status'] = REST_Controller::HTTP_OK;
        $this->response($data,REST_Controller::HTTP_OK);
    }
	public function emis_school_alldetail_entry_get()
	{
	     $part =1;
       	 $school_udise = 66;
         $data['basic']=$this->Homemodel->getSchoolInfo($school_udise);  //part1
		 $data['districts'] = $this->Datamodel->get_alldistricts(); //part1
		 $data['resitype']=$this->Datamodel->getResidentialType();   //part1
		 $data['stdcode']=$this->Datamodel->getSTDCodeByDistrict($data['basic'][0]->district_id); //part1 
		 $data['schoolmanagement']=$this->Datamodel->get_allmajorcategory(); //part1 ,part2
		 $data['schoolcategory']=$this->Datamodel->getallschoolcategory();  //part2
         $data['mediumInstruct']=$this->Datamodel->getMediumInstruct();  //part2
         $data['minority']=$this->Datamodel->getminority();  //part2
         $data['languagesubject']=$this->Datamodel->getLanguageasSubject(); //part2
         $data['profile']=$this->Datamodel->getProfileComplete($data['basic'][0]->udise_code); // 
         $data['clublist']=$this->Datamodel->getclub();  //part3
         $data['schooltype']=$this->Datamodel->getallschoolcategory();   //part3
         $data['bankdistrict']=$this->Datamodel->get_allbankdistricts(); //part4
		 $data['constructlist']=$this->Datamodel->getConstructlist();  // part5
         $data['ictsuplier']=$this->Datamodel->getICTSupplier(); //part5,part6
         $data['trade']=$this->Datamodel->getTrades();
         $data['ictlist']=$this->Datamodel->getICTList(1); //part 6
         $data['ictlistofthings']=$this->Datamodel->getICTList(3);  //part6
         $data['ictlistofkits']=$this->Datamodel->getICTList(2); //part6
         $data['lablist']=$this->Datamodel->getLablist(); //part6
		 $data['bank']=$this->Datamodel->getbankList();  //part7
		 $data['dataStatus'] = true;
         $data['status'] = REST_Controller::HTTP_OK;
         $this->response($data,REST_Controller::HTTP_OK);
		
    }
	public function save_school_basic1_post() //post
	{
		
		// //array list 
		 $record = $this->post("records");
		 // print_r($record);
		 // die();
// // $school_id  =$record          
// // udise_code          
// // school_name        
// // corr_std_code       
// // district_id         
// // block_id            
// // local_body_id       
// // lb_vill_town_muni  
// // lb_habitation_id   
// // edu_dist_id         
// // address             
// // pincode             
// // office_std_code     
// // office_landline     
// // corr_landlline      
// // office_mobile       
// // corr_mobile         
// // sch_email           
// // website             
// // assembly_id         
// // parliament_id       
// // latitude            
// // longitude           
// // manage_cate_id      
// // sch_management_id
// // sch_directorate_id
// // create_date
// // modified_date
		
		
		
		
		
		
		
		 print_r($record);
		 die();
		 // $data['dataStatus'] = true;
         // $data['status'] = REST_Controller::HTTP_OK;
		 $response = $this->Datamodel->save_schoolbasic1_part($record);
		 $response = $this->Datamodel->save_schoolbasic1_part1($record);
		 // $this->response($data,REST_Controller::HTTP_OK);
		 
		   if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
		
	}
	public function save_school_basic2_post() 
	{
		 $record = $this->post("records");
		  print_r($record);
		 die();
		 // $data['dataStatus'] = true;
         // $data['status'] = REST_Controller::HTTP_OK;
		  $response = $this->Datamodel->save_schoolbasic2_school($record);
		
		 // $this->response($data,REST_Controller::HTTP_OK);
		   if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully ";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
	}
	public function save_school_basic3_post() 
	{
		 $record = $this->post("records");
	
		  print_r($record);
		 die();
		 // $data['dataStatus'] = true;
         // $data['status'] = REST_Controller::HTTP_OK;
		  $response = $this->Datamodel->save_school_traning($record);
		  $response =$this->Datamodel->save_school_traning1($record);
		 // $this->response($data,REST_Controller::HTTP_OK);
		   if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully ";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
	}
	public function save_school_basic4_post() //post
	{
		 $record = $this->post("records");
		   print_r($record);
		 die();
		 // $data['dataStatus'] = true;
         // $data['status'] = REST_Controller::HTTP_OK;
		 $response = $this->Datamodel->save_school_committee($record);
		  if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
		
	}
	
    public function save_school_basic5_post()
	{
		 $record = $this->post("records");
		   print_r($record);
		 die();
		 // $data['dataStatus'] = true;
         // $data['status'] = REST_Controller::HTTP_OK;
		 $response = $this->Datamodel->save_school_land($record);
		 $response1 = $this->Datamodel->save_school_land1($record);
		  if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
	}
	
	public function save_school_basic6_post()
	{
		$record = $this->post("records");
		  print_r($record);
		 die();
		 $response = $this->Datamodel->save_school_inventry($record);
		 $response1 = $this->Datamodel->save_school_inventry1($record);
		  if($response > 0 )
            {	
                $data['dataStatus'] = true;
                $data['status'] = REST_Controller::HTTP_OK;
                $data['msg'] = "Save SuccessFully";
                $this->response($data,REST_Controller::HTTP_OK);
            }
            else
            {
                $data['dataStatus'] = false;
                $data['status'] = REST_Controller::HTTP_NO_CONTENT;
                $data['msg'] = "Some thing went wrong";
                $this->response($data,REST_Controller::HTTP_OK);
            }
	}
	function getBankByIFSC_get(){
	    //echo("IFSC");die();
        $ifsc=$_GET['ifsc'];
        $students=$this->Homemodel->getBankByIFSC($ifsc);
        echo json_encode($students);
    }    
	
    function schoolbyudisecode_get(){
        $result=$this->Homemodel->getdetailsbyudise($_GET['udise']);
	    $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'result'=>$result],REST_Controller::HTTP_OK);
    }
    
    function listschoolsby_post(){
        $data=$this->post('records');
        //print_r($data);
        $checkkey=['district_id','edu_dist_id','block_id','sch_cate_id','sch_management_id','sch_directorate_id','school_type'];
        /*foreach($checkkey as $key){
            $data['records'][$key]="";
        }
        echo(json_encode($data));die();*/
        foreach($checkkey as $key){
            if($key!="school_type"){
                if(array_key_exists($key,$data)){
                    $senddata[]='schoolnew_basicinfo.'.$key.' IN ('.$data[$key].') AND';
                }else{
                    $senddata[]='schoolnew_basicinfo.'.$key.' IS NOT NULL AND';
                }
            }else{
                if(array_key_exists($key,$data)){
                    $exp=explode(",",$data[$key]);
                    $prdt="schoolnew_academic_detail.".$key." IN ('".implode("','",$exp)."')";
                    $senddata[]=$prdt;
                }
                else{
                    $senddata[]="schoolnew_academic_detail.".$key." IS NOT NULL";
                }
            }
        }
        $where = "WHERE ".implode(" ",$senddata);
        
        $result=$this->Homemodel->getlistschools($where);
	    $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'result'=>$result],REST_Controller::HTTP_OK);
    }

    function listbystrength_post(){
        $data=$this->post('records');
        $check=['str','con','val'];  
        //print_r($data);    
        foreach($check as $key){
            if(array_key_exists($key,$data)){
                if($key=="str"){
                    $serstr="total_".$data[$key];       
                }
                else{
                    $serstr.=$data[$key];    
                }
            }else{
                if($key=="str"){
                    $serstr="total";
                }else{
                    $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'result'=>"No Condition or Value Determined"],REST_Controller::HTTP_OK);
                }
            }
        }
        //echo($serstr);
        $where=" WHERE ".$serstr;
        $result=$this->Homemodel->getliststrength($where);
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'result'=>$result]);
    }
    function ptrstrength_post(){
        $data=$this->post('records');
        $check=['con','val'];  
        //print_r($data);
        $serstr='ptr';    
        foreach($check as $key){
            if(array_key_exists($key,$data)){
                $serstr.=$data[$key];
            }else{
                $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'result'=>"No Condition or Value Determined"],REST_Controller::HTTP_OK);
            }
        }
        //echo($serstr);
        $where=" WHERE ".$serstr;
        $result=$this->Homemodel->getptrstrength($where);
        $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'result'=>$result]);
    }

 }
?>