<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Schools_contributions extends REST_Controller
{

        function __construct()
        {
                 parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Schools_homemodel');
        				 $this->load->model('AllApproveModel');
        				 $this->load->model('Authmodel');
                 $this->load->model('Csradmin_model');
                 
                 $this->load->library('upload');
                 $this->load->helper('url');
                 $this->load->helper('text');
                 $this->load->library('AWS_S3');
        }



 /**  For load KT Contributions details of kt_books,kt_device,kt_volunter_info against School Logged id **/   
   
    public function LoadSchoolsContributions_post()
    {
          $school_records = $this->post();
         //print_r($school_records);

         
       $school_id = $school_records['school_id'];
     //echo $school_id;
        $data['school_contributions'] = $this->Schools_homemodel->contribution_details($school_id);
      //  pri$data['school_contributions'['cont_type']];
       // print_r($data);
         
        
      if(!empty($data))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   
    }

   public function LoadContributionWiseDetails_post()
   {
      $contribution_wise_records = $this->post();
      
       $data_list['school_contributions'] = $this->Schools_homemodel->contribution_wise_details($contribution_wise_records['id']);
       if(!empty($data_list))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data_list ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   

   }
   public function LoadSchoolGetContribution_post()
   {
    $contribution_wise_records = $this->post();

       $data_list['school_wise_contributions'] = $this->Schools_homemodel->contribution_school_wise_details($contribution_wise_records['id']);
       if(!empty($data_list))
         {
      
            $this->response(['dataStatus' => true,
                  'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data_list ],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['dataStatus' => false,
                          'status'  => REST_Controller::HTTP_BAD_REQUEST,
                          'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
      }   
   }

    public function SaveSchoolContributions_post()

    {
       $school_contributions_data = $this->post();
     
     $save_contributions['school_cont_details'] = $this->Schools_homemodel->save_school_contribution($school_contributions_data);
      //  pri$data['school_contributions'['cont_type']];
       // print_r($data);
         
        
      if(!empty($save_contributions))
        {
      
            $this->response(['Data created successfully.'],REST_Controller::HTTP_OK);     
      }
    
       else
      {
        $this->response(['Unable to save data'],REST_Controller::HTTP_BAD_REQUEST);
       }   
    }
    public function PutSchoolsContributions_put()
    {
     $input = $this->put();
     $update_school_contribution['school_cont_details'] = $this->Schools_homemodel->update_school_contribution($input);
      if(!empty($update_school_contribution))
         {
      
            $this->response(['Data Updated successfully.'],REST_Controller::HTTP_OK);     
     }
    
       else
      {
        $this->response(['Unable to udpate data'],REST_Controller::HTTP_BAD_REQUEST);
      }   
    }
    public function PutContributionChildDetails_put()
    {
      $input = $this->put();
      $update_child_school_contribution['school_cont_details'] = $this->Schools_homemodel->update_school_child_contribution($input);
      if(!empty($update_child_school_contribution))
         {
      
            $this->response(['Data Updated successfully.'],REST_Controller::HTTP_OK);     
          }
    
      else
      {
        $this->response(['Unable to udpate data'],REST_Controller::HTTP_BAD_REQUEST);
      }   
    }
    public function LoadCsrContributions_post()
    {

   $all_contributions['school_cont_details'] = $this->Csradmin_model->get_csr_user_contributions();
        if(!empty($all_contributions))
          {
      
             $this->response(['dataStatus' => true,
                   'status'  => REST_Controller::HTTP_OK,
                             'result'  => $all_contributions ],REST_Controller::HTTP_OK);     
      }
    
        else
       {
         $this->response(['dataStatus' => false,
                           'status'  => REST_Controller::HTTP_BAD_REQUEST,
                           'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
       }   
    }

    // public function LoadSchoolRequirementsUpdates_post()
    // {
     
    // if( ! $this->post('status')) {
    //     $this->response(NULL, 400);
    // }
    // $this->load->library('upload');

    // if ( ! $this->upload->do_upload() ) {
    //     $this->response(array('error' => strip_tags($this->upload->display_errors())), 404);
    // } else {
    //     $upload = $this->upload->data();
    //     $this->response($upload, 200);
    // }



    // }

    // public function School_Requirements_post(){

    //   $school_requirements = $this->post();
    //      //print_r($school_records);

         
    //    $school_id = $school_requirements['school_id'];
    //  //echo $school_id;
    //     $school['school_req'] = $this->Schools_homemodel->school_req_details($school_id);
    //   //  pri$data['school_contributions'['cont_type']];
    //    // print_r($data);
          
        
    //   if(!empty($school))
    //      {
      
    //         $this->response(['dataStatus' => true,
    //               'status'  => REST_Controller::HTTP_OK,
    //                         'result'  => $school ],REST_Controller::HTTP_OK);     
    //  }
    
    //    else
    //   {
    //     $this->response(['dataStatus' => false,
    //                       'status'  => REST_Controller::HTTP_BAD_REQUEST,
    //                       'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
    //   }   

    // }


    // public function LoadSchoolsByRequirementId_post()
    // {
    //    $school_requirements_id = $this->post();
    //    $school_id = $this->post();
       

         
    //    $req_id = $school_requirements_id['req_id'];
    //     $school_id = $school_requirements_id['school_id'];
    //  //echo $school_id;
    //   $requirement['school_req_details'] = $this->Schools_homemodel->school_By_req_id_details($school_id,$req_id);
    //   //  pri$data['school_contributions'['cont_type']];
    //    // print_r($data);
         
        
    //   if(!empty($requirement))
    //      {
      
    //         $this->response(['dataStatus' => true,
    //               'status'  => REST_Controller::HTTP_OK,
    //                         'result'  => $requirement ],REST_Controller::HTTP_OK);     
    //  }
    
    //    else
    //   {
    //     $this->response(['dataStatus' => false,
    //                       'status'  => REST_Controller::HTTP_BAD_REQUEST,
    //                       'message' => 'Some problems occurred, please try again.',],REST_Controller::HTTP_BAD_REQUEST);
    //   }   

    // }


// public function LoadSchoolRequirementsUpdates_post()
//  {
//   $image = $this->post('images_uploads');
//   echo "<img src=".$image." width='300' height='300' />";




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


//  //echo $image;
// // $image = base64_decode($image);

// //  $image_name = md5(uniqid(rand(), true));
// //  $filename = $image_name . '.' . 'png';
// //  //echo $image_name;
// //  $path = "/uploads/".$filename;
// //  echo $path;


// //   file_put_contents($path . $filename, $image);





// //   $config = array(
// // 'upload_path' => "./uploads/",
// // 'allowed_types' => "gif|jpg|png|jpeg|pdf",
// // 'overwrite' => TRUE,
// // 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
// // 'max_height' => "768",
// // 'max_width' => "1024"
// // );
// // $this->load->library('upload', $config);
// // if($this->upload->do_upload())
// // {
// // $data = array('upload_data' => $this->upload->data($image));
// // $this->load->view('upload_success',$data);
// // }
// // else
// // {
// // $error = array('error' => $this->upload->display_errors());
// // echo "UABLE";
// // }


 
//     // echo 'start upload';
//     // $config['upload_path'] = '/upload/';
//     // $this->load->library('upload',$config);
//     // if (!$this->upload->do_upload($image))
//     // {
//     //    echo 'NOT upload';
//     //    $error = array('error' => $this->upload->display_errors());
//     //     $this->load->view('display', $error);  //loads the view display.php with error
//     // }
//     // else
//     // {
//     //   echo 'success!';
//     // }
//     // echo 'end upload';
//     // $data = array('upload_data' => $this->upload->data());
//     // $this->load->view('display', $data); //loads view display.php with data
  

  


// //         $foldername = './uploads' . $this->post('images_uploads');
// //         echo $fo

// //         if(!file_exists($foldername) && !is_dir($foldername)) {
// //             mkdir($foldername, 0750, true);
// //         }

// //         $config['upload_path'] = $foldername;
// //         echo $config['upload_path'];
// //         $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xlsx|xls|txt';
// //         $config['max_size'] = '10240';

// //         $this->load->library('upload', $config);        

// //         if ( ! $this->upload->do_upload())
// //         {
// //             //return $this->response(array('error' => strip_tags($this->upload->display_errors())), 404);
// //             return $this->response(array('error' => var_export($this->post('file'), true)), 404);

// //         }
// //         else
// //         {
// //             $data = array('upload_data' => $this->upload->data());
// //             return $this->response(array('error' => $data['upload_data']), 404);
// //         }
// // return $this->response(array('success' => 'successfully uploaded' ), 200);      
// }



}
?>