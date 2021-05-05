<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Schools_requirements extends REST_Controller
{

        function __construct()
        {
                 parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Schools_homemodel');
                 $this->load->model('AllApproveModel');
                 $this->load->model('Authmodel');
				 $this->load->model('Homemodel');
                 $this->load->library('upload');
                 $this->load->helper('url','file','form');
                 $this->load->helper('text');
                 $this->load->library('AWS_S3');
				 $this->load->library('AWSBucket');
				date_default_timezone_set('Asia/Kolkata'); 
                // $autoload['helper'] = array('url', 'file', 'form');
        }


 public function get_slas_class7_report_post()
    {
          echo "hi";
    }
 

    public function School_Requirements_post(){

      $school_requirements = $this->post();
         //print_r($school_records);

         
       $school_id = $school_requirements['school_id'];
     //echo $school_id;
        $school['school_req'] = $this->Schools_homemodel->school_req_details($school_id);
      //  pri$data['school_contributions'['cont_type']];
       // print_r($data);
          
        
      if(!empty($school))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $school ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   

    }


    public function LoadSchoolsByRequirementId_get()
    {
       $school_requirements_id = $this->get();
       $school_id = $this->get();
       

         
       $req_id = $school_requirements_id['req_id'];
        $school_id = $school_requirements_id['school_id'];
     //echo $school_id;
      $requirement['school_req_details'] = $this->Schools_homemodel->school_By_req_id_details($school_id,$req_id);
      //  pri$data['school_contributions'['cont_type']];
       // print_r($data);
         
        
      if(!empty($requirement))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $requirement ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   

    }


    public function AddNewNeedSchoolRequirements_post()
    {
       $requirement['school_needs_req_details'] = $this->Schools_homemodel->need_school_req_details();
        if(!empty($requirement))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $requirement ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   


    }


	/*
	$school_id =$this->session->userdata('emis_school_id');
		
		 $qty  = $_POST['Quantity'];
		 $mat_id = $_POST['itemname'];
		 $itemname1 = $_POST['itemname1'];
		 		 
		 if($mat_id ==500 )
		 {
			 $cat_id  = $_POST['cate'];
			 $sub_cat_id  = $_POST['sub_cate'];
		 }else 
		 {
			 $cat_id  = $_POST['cate3'];
			 $sub_cat_id  = $_POST['sub_cate3'];
		 }
		 $createdate = date('Y-m-d h:i:s');
		 
			  $arr = array('school_id'=>$school_id,'mat_id'=>$mat_id,'qty'=>$qty,'cat_id'=>$cat_id,'sub_cat_id'=>$sub_cat_id,
			  'isactive'=>1,'created_on'=>$createdate,'created_by'=>$itemname1);
			 $response = $this->Homemodel->save_school_needs($arr);
		
		   
	*/
   public function SaveSchoolRequirements_post()
   {
        $ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$school_id = $token['school_id'];
        $emis_userid=$token['emis_user_id'];
  
     $school_requirements_data = $this->post();

	 
	  $arrpass = array('school_id'=>$school_id,'mat_id'=>$school_requirements_data['mat_id'],'qty'=>$school_requirements_data['qty'],'cat_id'=>$school_requirements_data['cat_id'],'sub_cat_id'=>$school_requirements_data['sub_cat_id'],
			  'isactive'=>1,'created_by'=>$emis_userid);
   
     $save_requirements['school_req_details'] = $this->Schools_homemodel->save_school_requirements($arrpass);
      //  pri$data['school_contributions'['cont_type']];
       // print_r($data);
         
        
      if(!empty($save_requirements))
         {
		 $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                            'message'  => 'Data Saved successfully' ],REST_Controller::HTTP_OK);     
      
              
     }
    
       else
      {
	  $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Unable to save data',],REST_Controller::HTTP_BAD_REQUEST);
       
      }   

   }

   public function PutSchoolsRequirements_post()
   {
     $input = $this->post();
	 
     $update_school_requirements['school_req_details'] = $this->Schools_homemodel->update_school_requirements($input);
	
      if(!empty($update_school_requirements))
         {
      
            $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                            'message'  => 'Data Updated successfully' ],REST_Controller::HTTP_OK); 
     }
    
       else
      {
         $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Unable to save data',],REST_Controller::HTTP_BAD_REQUEST);
      }   
   }

  

//Unneccesar
public function LoadSchoolRequirementsUpdates_put()
 {
  
   $input = $this->put();
  
   $update_school_requirements['school_req_details'] = $this->Schools_homemodel->update_school_requirements_updates($input);
      if(!empty($update_school_requirements))
         {
      
            $this->response(['Data Updated successfully.'],REST_Controller::HTTP_OK);     
         }
    
       else
         {
           $this->response(['Unable to udpate data'],REST_Controller::HTTP_BAD_REQUEST);
         }   
 

// $image = base64_decode($image);
// $image_name = md5(uniqid(rand(), true));
// $filename = $image_name . '.' . 'png';
// //rename file name with random number
// $path = "emis-code/upload/".$filename;
// //image uploading folder path
// file_put_contents($path . $filename, $image);
// // image is bind and upload to respective folde

// $data_insert = array('front_img'=>$filename);
// print_r($data_insert);


 //echo $image;
// $image = base64_decode($image);

//  $image_name = md5(uniqid(rand(), true));
//  $filename = $image_name . '.' . 'png';
//  //echo $image_name;
//  $path = "/uploads/".$filename;
//  echo $path;


//   file_put_contents($path . $filename, $image);





//   $config = array(
// 'upload_path' => "./uploads/",
// 'allowed_types' => "gif|jpg|png|jpeg|pdf",
// 'overwrite' => TRUE,
// 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
// 'max_height' => "768",
// 'max_width' => "1024"
// );
// $this->load->library('upload', $config);
// if($this->upload->do_upload())
// {
// $data = array('upload_data' => $this->upload->data($image));
// $this->load->view('upload_success',$data);
// }
// else
// {
// $error = array('error' => $this->upload->display_errors());
// echo "UABLE";
// }


 
    // echo 'start upload';
    // $config['upload_path'] = '/upload/';
    // $this->load->library('upload',$config);
    // if (!$this->upload->do_upload($image))
    // {
    //    echo 'NOT upload';
    //    $error = array('error' => $this->upload->display_errors());
    //     $this->load->view('display', $error);  //loads the view display.php with error
    // }
    // else
    // {
    //   echo 'success!';
    // }
    // echo 'end upload';
    // $data = array('upload_data' => $this->upload->data());
    // $this->load->view('display', $data); //loads view display.php with data
  

  


//         $foldername = './uploads' . $this->post('images_uploads');
//         echo $fo

//         if(!file_exists($foldername) && !is_dir($foldername)) {
//             mkdir($foldername, 0750, true);
//         }

//         $config['upload_path'] = $foldername;
//         echo $config['upload_path'];
//         $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xlsx|xls|txt';
//         $config['max_size'] = '10240';

//         $this->load->library('upload', $config);        

//         if ( ! $this->upload->do_upload())
//         {
//             //return $this->response(array('error' => strip_tags($this->upload->display_errors())), 404);
//             return $this->response(array('error' => var_export($this->post('file'), true)), 404);

//         }
//         else
//         {
//             $data = array('upload_data' => $this->upload->data());
//             return $this->response(array('error' => $data['upload_data']), 404);
//         }
// return $this->response(array('success' => 'successfully uploaded' ), 200);      
}

//  public function SchoolDashboardCsrDetails_post()
//  {

// //   $input = $this->input->post();
// //   print_r($input);

  
//  //$school_requirements['total_school_reqs'] = $this->Schools_homemodel->Total_school_requirements($School_id);

//  }


//for list page of contributions
    public function emis_school_needs_csr_get()
    {
	
	
	    $ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin) {
        $school_id = $token['school_id'];
	  //echo $school_id;
      $data['csr_material_master'] =$this->Homemodel->school_needs_csr_material_master();
      $data['cate'] =$this->Homemodel->cate();
      $data['sub_cate'] =$this->Homemodel->sub_cate();
      $data['csr_material'] =$this->Homemodel->get_school_needs_csr($school_id);
	  if($data)
	  {
	   $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','material_details'=>$data],REST_Controller::HTTP_OK);
	
	  }
    	}
		else{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
		}	
    
}

 public function emis_school_needs_csr_by_id_get()
    {

      $ts=explode(".",getallheaders()['Token']);
      $token = json_decode(base64_decode($ts[1]),true);
    $emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
    if($emis_loggedin) {
      $school_id = $token['school_id'];
   
    $id=$this->get('id');
      $data['csr_material_master'] =$this->Homemodel->school_needs_csr_material_master_byid($id);
      $data['cate'] =$this->Homemodel->cate_byid($id);
      $data['sub_cate'] =$this->Homemodel->sub_cate_byid($id);
      if($data)
    {
     $this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','material_details'=>$data],REST_Controller::HTTP_OK);
  
    }
      }
    else{
      $this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Successfully','result'=>array()],REST_Controller::HTTP_OK);
    } 
    
}


  public function emis_del_school_csr_get()
  {
        $ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin) {
		$data_get = $this->get('id');
		
		 $data['csr_material_master'] =$this->Homemodel->school_needs_del_csr_material_master($data_get);
		
		 
		  if(!empty($data['csr_material_master']))
		{
		   
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Can Not Delete! Requirement Item Already Received','result'=>array()],REST_Controller::HTTP_OK);
	 
		}
		else
		{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Data deleted Successfully','result'=>array()],REST_Controller::HTTP_OK);
  
		}
		

		
    }
  }
//END

//FOR DELTE UPDTAED Images
  public function DeleteCsrUpdateDetails_get()
  {
        $ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$emis_loggedin=$token['status'];
        $emis_userid=$token['emis_user_id'];
        $emis_user_type_id=$token['emis_usertype'];
		if($emis_loggedin) {
		$data_get = $this->get('id');
		
		 $data['req_updates_del'] =$this->Homemodel->delete_csr_wise_update_details($data_get);
		
		 
		  if(!empty($data['req_updates_del']))
		{
		   
			$this->response(['dataStatus'=>true,'status'=>REST_Controller::HTTP_OK,'message'=>'Data Deleted SuccessFully!!','result'=>array()],REST_Controller::HTTP_OK);
	 
		}
		else
		{
			$this->response(['dataStatus'=>false,'status'=>REST_Controller::HTTP_OK,'message'=>'Unable To delete!!','result'=>array()],REST_Controller::HTTP_OK);
  
		}
		

		
    }
  }


public function SchoolDashboardCsrDetails_post()
{
  $school_id = $this->post();
 // print_r($school_id['school_id']);
  $school_requirements['total_school_reqs'] = $this->Schools_homemodel->Total_school_requirements($school_id['school_id']);
  if(!empty($school_requirements))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $school_requirements ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   
}

public function SaveSchoolRequirementWiseDetails_post()
{

       $ts=explode(".",getallheaders()['Token']);
	    $token = json_decode(base64_decode($ts[1]),true);
		$school_id=$token['school_id'];
   
		
		$data_post = $this->post('Description');
   $array_convert =  json_decode($data_post);
    
   
		//$array = array('fk_req_id'=> $data['fk_req_id'],'update_status'=> $data['update_status'],'img_url_1'=> base64_decode($data['img_url_1']));
		foreach($_FILES as $filesindex => $filevalue){
	
				
				$data = $_FILES[$filesindex]['name'];
			 
			  
		
				
			}
            $data_array = array('update_status'=>$array_convert->update_status,'created_by'=>$array_convert->created_on,'fk_req_id'=> $array_convert->fk_req_id,'img_url_1' => $data[0],'img_url_2' => $data[1],'img_url_3' => $data[2]);
	     
	   $ins = $this->db->insert('csr_school_req_updates',$data_array);
        $last_id = $this->db->insert_id();
       $keyname = 'csr_photos/'.'req_'.$array_convert->fk_req_id.'/'.'update_'.$last_id;
   
       $AWS=new AWSBucket(TEACHER_BUCKET_NAME,TEACHERS_IMAGE_KEY,TEACHERS_IMAGE_SECRET,$keyname,$_FILES,'STANDARD_IA');
				$uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files,$AWS->storageClass,0);
               
				if(!empty($uploadarr))
         {
      
            $this->response(['Data Saved successfully!!'],REST_Controller::HTTP_OK);     
         }
    
       else
         {
           $this->response(['Unable to save data!!'],REST_Controller::HTTP_BAD_REQUEST);
         }   
     
		//$this->response(['Data Saved successfully.','mesage'=>$data_array],REST_Controller::HTTP_OK);  
			
		
		/*$data_array = array('created_by'=>$school_id,'update_status' => $data['update_status'],'fk_req_id' => $data['fk_req_id'],'img_url_1' =>'22','img_url_2'=>$_FILES['img_url_2']['name'],'img_url_3'=>$_FILES['img_url_3']['name'] );
	    
	   $ins = $this->db->insert('csr_school_req_updates',$data_array);
        $last_id = $this->db->insert_id();
		

			foreach($_FILES as $filesindex => $filevalue){
	
				$ext=explode('.',$filevalue['name']);
				$_FILES[$filesindex]['name'] = $ext[0].'.'.$ext[1];	
			 
			  
		
				
			}
				$keyname = 'csr_photos/'.'req_'.$data['fk_req_id'].'/'.'update_'.$last_id;

				//print_r($keyname);die();
				$AWS=new AWSBucket(TEACHER_BUCKET_NAME,TEACHERS_IMAGE_KEY,TEACHERS_IMAGE_SECRET,$keyname,$_FILES,'STANDARD_IA');
				$uploadarr=$AWS->uploadFilesToAWS($AWS->bucket,$AWS->key,$AWS->secret,$AWS->foldername,$AWS->files,$AWS->storageClass,0);
				if(!empty($uploadarr))
         {
      
            $this->response(['Data Saved successfully.'],REST_Controller::HTTP_OK);     
         }
    
       else
         {
           $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
         }   
 
				//$i=1;

				//$s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,"",$keyname,$_FILES[$filesindex]['name']); 
				// echo $s3Result;
			
	*/
	
  
}



public function SaveSchoolRequirementWiseDetails_posts()
{

$input = $this->post();

  //$newfilename = "newfilename";
 //print_r( $_FILES['image']['name']);
$insert_datas = array('update_status' => $comment,'fk_req_id' => $input['req_id'],'img_url_1'=> $_FILES['image']['name'][0],'img_url_2'=>$_FILES['image']['name'][1],'img_url_3' => $_FILES['image']['name'][2]);

  
 $ins = $this->db->insert('csr_school_req_updates',$insert_datas);
 $last_id = $this->db->insert_id();

 foreach ($_FILES['image']['name'] as $key => $value) {
  //print_r($value);
     if(count($_FILES['image']['name']) <= 3)
     {
       if(isset($_FILES['image']['name'][$key])){
      $errors= array();
      $file_name = $_FILES['image']['name'][$key];
      $file_size =$_FILES['image']['size'][$key];
      $file_tmp =$_FILES['image']['tmp_name'][$key];
      $file_type=$_FILES['image']['type'][$key];
    // print_r($file_name);
      
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$key])));

      $expensions= array("jpeg","jpg","png");
      if(file_exists($file_name))
       {
        echo "Sorry, file already exists.";
        }
      // if(in_array($file_ext,$expensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }

      // if($file_size > 2097152){
      //    $errors[]='File size must be excately 2 MB';
      // }

     $remove_img_type =  rtrim($file_name,".jpg/jpeg/png/gif");
    
     $filename = $remove_img_type . '.' . 'png';
     $path = "uploads/".$filename;
  // substr($filename, 0,1);
  // echo $filename;
      if(empty($errors)==true){
         $this->load->library('AWS_S3');
        move_uploaded_file($file_tmp,"uploads/".$filename);
       // echo "Success";
         $keyname = 'csr_photos/'.'req_'.$input['req_id'].'/'.'update_'.$last_id.'/'.$filename;
         //echo $keyname;
         $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$path);  
        echo $s3Result;

         //$get_image_name = array('img_url_1' => $);

      }

      else{
         print_r($errors);
      }
    }
  }
    else
    {
      echo "Allow Only minimum 3 Images to Upload";
     }
    
   
   }
 

   if(!empty($ins))
         {
      
            $this->response(['Data Saved successfully.'],REST_Controller::HTTP_OK);     
         }
    
       else
         {
           $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
         }   
 
//  print_r($input);
//  print_r($_FILES['image']['name']);
// $merge_data=  array_merge($input,$_FILES['image']['name']);
// print_r($merge_data);

   
// $input = $this->post();
// print_r($input);
// $image = $_FILES['image_url']['name'];
// //echo $image;

// $target_path = APPPATH."uploads/";  
//  $target_path = $target_path.basename( $_FILES['image_url']['name']); 
//  echo $target_path;  
// //   echo $FILES['image_url']['name'];
// if(move_uploaded_file($image,$target_path)) 
//  {  
//     echo "File uploaded successfully!";  
//   }
//  else
//  {
//    echo "FAIl to load";
//  } 



//   $uploads_dir = '/uploads';
// foreach ($_FILES["image_url"]["error"] as $key => $error) {
//     if ($error == UPLOAD_ERR_OK) {
//         $tmp_name = $_FILES["image_url"]["tmp_name"];
//         // basename() may prevent filesystem traversal attacks;
//         // further validation/sanitation of the filename may be appropriate
//         $name = basename($_FILES["image_url"]["name"]);
//         move_uploaded_file($tmp_name, "$uploads_dir/$tmp_name");
//     }
// }





        //  $upload = $input['image_url'];  

        // $config['upload_path'] = './uploads/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = 0;
        // $config['max_width'] = 0;
        // $config['max_height'] = 0;

        // $this->load->library('upload', $config);

        // if (!$this->upload->do_upload($image)) {
        //     $error = array('error' => $this->upload->display_errors());
        //    print_r($error);
          
        // } else {
        //     $data = array('image_metadata' => $this->upload->data());
        //     print_r($data);
 
        //     }



 //else{  
//     echo "Sorry, file not uploaded, please try again!";  
// }  

//print_r($input['img_url_1']);
// $image = base64_decode($input['image_url']);
// $image_name = md5(uniqid(rand(), true));
// $filename = $image_name . '.' . 'png';
// //rename file name with random number
// $path = "uploads/".$filename;
// //image uploading folder path
// $ifp = fopen( $path, 'wb'); 
// $get_file =file_put_contents($path . $filename, $image);
// echo $get_file;


// $keyname = 'tnschoolsawsphoto/csr_photos/'.'req_'.$input['req_id'].'/'.'update_'.$input['id'].'/'.$filename;
// $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$path);
// echo $s3Result;
// image is bind and upload to respective folde
  
  // $save_school_requirements_wise['school_req_details'] = $this->Schools_homemodel->save_school_requirements_updates($input);
   //print_r($save_school_requirements_wise);


    // 


    // $tempdoc = $input['img_url_1'];
   // $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname);










//****************

//24-01-2020
   //  $input = $this->post();
   // // print_r($input);
   //  $img = $this->post('img_url_1');
   //  $this->load->library('AWS_S3');
   //  $folderPath = "uploads/";
   //  $image_parts = explode(";base64,",$img);
   //  print_r($image_parts);

   
   //  $image_type_aux = explode("uploads/",$image_parts[0]);
   //  $image_base64 = base64_decode($image_parts[0]);
     
   //   $name = uniqid() . '.png';
   //   $file = $folderPath .$name;
   //   $ifp = fopen( $image_parts, 'wb'); 
   //   file_put_contents($file,$image_base64);



   //  $tmp = "uploads/".$name;
   //  $keyname = 'tnschoolsawsphoto/csr_photos/'.$input['img_url_1'];
   //  $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$tmp);

   //  echo $s3Result;




    //*************************************************//





    
    //$this->saveImageAmazomS3($name);

//             if(!empty($input)){
        
//                 $base64_img =  str_replace("[removed]","data:image/png;base64,",$input['img_url_1']);

//                  $output_file = APPPATH."docs/temp_base64_images_schools.jpg";

//                  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//                  $charactersLength = strlen($characters);
//                  $randomString = '';
//                      for ($i = 0; $i < 5; $i++)
//                       {
//                          $randomString .= $characters[rand(0,$charactersLength - 1)];
//                         // echo $randomString;
//                        }

//                  $temp_file_name = $randomString.date('Y-m-d-H:m:s');
//                 echo $temp_file_name; echo "<br>";
//                  $ifp = fopen( $output_file, 'wb'); 
//                  echo $ifp;

//                  $data1 = explode( ',',$base64_img);


//                  fwrite( $ifp, base64_decode( $data1[ 1 ] ) );

//                  // clean up the file resource
//                  fclose( $ifp ); 
              

//               $tempdoc = $output_file;

// //tnschoolsawsphoto/csr_photos/req_11/update_499/natural2.jpeg
// //$key = 'tnschoolsawsphoto/csr_photos/'.'req_'.$input['req_id'].'/'.'update_'.$input['id'].'/'.$input['img_url_1'];

//           $keyname = 'tnschoolsawsphoto/csr_photos/'.'req_'.$input['req_id'].'/'.'update_'.$input['id'].'/'.$input['img_url_1'];
// ;
//              // echo $keyname;
//              $tmp = $tempdoc;
//             // echo $tmp;
           
//              $s3Result = $this->aws_s3->update_S3_images(TEACHER_BUCKET_NAME,$keyname,$tmp);
       
//             echo $s3Result;

//             }

    //  https://s3.ap-south-1.amazonaws.com/tnschoolsawsphoto/csr_photos/req_11/update_499/natural2.jpeg  


















}

//***********************************************************************







}
?>
