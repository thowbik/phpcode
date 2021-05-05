<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class LO_exam extends REST_Controller{

        function __construct()
        {
                parent::__construct();
                 $this->load->database(); 
                 //$this->load->model('Homemodel');
                 $this->load->model('LOExammodel');
        }

        public function start_exam_post(){
            $records = $this->post('records');
            
            $school_id = $records['school_id'];
            $unique_id_no = $records['unique_id_no'];
            $medium_id = $records['medium_id'];
           // print_r($medium_id);
           // die();
            if(!empty($school_id)){
                $data['quest_set']=$this->LOExammodel->start_exam($school_id,$unique_id_no,$medium_id);
                    if(!empty($data)){
                        if($data['quest_set']['0']['session_status'] == '0'){
                            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Test Interpted,Continue it',
                            'result'  => $data ],REST_Controller::HTTP_OK); 
                        }else{
                            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'message' => 'Session created Successfully,You can start the Exam',
                            'result'  => $data ],REST_Controller::HTTP_OK); 
                        }                            
                    }else{
                        $this->response(['dataStatus' => false,
                        'status'  => REST_Controller::HTTP_BAD_REQUEST,
                        'message' => 'Some problems occurred, please try again.',
                        ],REST_Controller::HTTP_BAD_REQUEST);
                    }                
            }
            else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Please Provide the information.',
                                    ],REST_Controller::HTTP_NOT_FOUND);
            } 
        }
        public function insert_answer_post(){
            $records = $this->post('records');
            
            $data['session_id'] = $records['session_id'];
            $data['serial_no'] = $records['serial_no'];
            $data['q_id'] = $records['q_id'];
            $data['choice_id'] = $records['choice_id'];
            $data['marks'] = $records['choice_weight'];            
            $data['duration'] = $records['duration'];
            $data['created_date'] = date('Y-m-d H-i-s');
            $data['review_flag'] = '0';
            $tname = 'exams_student_response';

            if(!empty($data['q_id'])){
                $dat['answer_insert']=$this->LOExammodel->common_insert($tname,$data);
                if(!empty($dat)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Answer inserted successfully.',
                    'result'  => $dat ],REST_Controller::HTTP_OK);     
                }else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_BAD_REQUEST,
                                    'message' => 'Some problems occurred, please try again.',
                                    ],REST_Controller::HTTP_BAD_REQUEST);
                }                
            }
            else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Please Provide the information.',
                                    ],REST_Controller::HTTP_NOT_FOUND);
            }   
        }


        public function final_submit_post(){
            $records = $this->post('records');
            
            $data['session_id'] = $records['session_id'];
            $data['unique_id_no'] = $records['unique_id_no'];
            $data['session_status'] = $records['session_status'];
            $tname = 'exams_session_detail';

            if(!empty($data)){
                $dat['final_submit']=$this->LOExammodel->common_update_lofinal($tname,$data);               
                if($dat['final_submit']=='1'){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'message' => 'Exam Completed successfully.',
                    'result'  => $dat ],REST_Controller::HTTP_OK);     
                }else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_BAD_REQUEST,
                                    'message' => 'Some problems occurred, please try again.',
                                    ],REST_Controller::HTTP_BAD_REQUEST);
                }                
            }
            else{
                    $this->response(['dataStatus' => false,
                                    'status'  => REST_Controller::HTTP_NOT_FOUND,
                                    'message' => 'Please Provide the information.',
                                    ],REST_Controller::HTTP_NOT_FOUND);
            }   
        }  
        
        
}
?>