<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class Schemes extends REST_Controller
 {
        function __construct()
        {
                parent::__construct();

                $this->load->helper(array('form','url','html'));
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper('security');
                $this->load->database(); 
                $this->load->model('Schemesmodel');
                $this->load->model('Schools_homemodel');
            
        }

        // Master : Schemes Wise Applicable Classes 
        // Sample Params : url?school_id = 66
        function applicable_classes_get() { 
            // $school_id = $this->get('school_id');
                
            // $data['dataStatus'] = true;
            // $data['status'] = REST_Controller::HTTP_OK;
            // $data['result']=$this->Schemesmodel->getListAllSchemes($school_id);
            // $this->response($data,REST_Controller::HTTP_OK);
                $school_id = $this->get('school_id');
                if(!empty($school_id)){   
                    $arr = $this->Schemesmodel->getListAllSchemes($school_id);    
                    if(!empty($arr)){
                        $this->response(['dataStatus' => true,
                                         'status'  => REST_Controller::HTTP_OK,
                                         'result'  => $arr ],REST_Controller::HTTP_OK);
                    }
                    else{
                        $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NO_CONTENT,
                                        'message' => 'No Records Found!, please try again.',
                                        ],REST_Controller::HTTP_OK);
                    }
                }
                else{
                        $this->response(['dataStatus' => false,
                                        'status'  => REST_Controller::HTTP_NOT_FOUND,
                                        'message' => 'Please Provide the information.',
                                        ],REST_Controller::HTTP_OK);
                }
        }

        

        function schemes_subcategory_list_get(){
            $where[0] = 'scheme_id';
            $where[1] = $this->get('id');
            if(!empty($this->get('id'))){   
                $arr = $this->Schools_homemodel->get_common_table_details('schoolnew_schemedetail',$where);
                if(!empty($arr)){
                    $this->response(['dataStatus' => true,
                                     'status'  => REST_Controller::HTTP_OK,
                                     'result'  => $arr ],REST_Controller::HTTP_OK);
                }
                else{
                    $this->response(['dataStatus' => false,
                                     'status'  => REST_Controller::HTTP_NO_CONTENT,
                                     'message' => 'No Records Found!, please try again..',
                                     ],REST_Controller::HTTP_OK);
                }
            }
            else{
                $this->response(['dataStatus' => false,
                                 'status'  => REST_Controller::HTTP_NOT_FOUND,
                                 'message' => 'Please Provide the information.',
                                ],REST_Controller::HTTP_OK);
            }
            
        }

        // Master : Classes Wise Student List 
        // Sample Params : {"records":{"class_id":6,"section":"A","school_id":2112}}
        function uniform_list_post(){
            $records = $this->post('records');
            if($records)
            $school_id = $records['school_id'];
            $class_id=$records['class_id'];        
            $section_id =$records['section'];                
            $arr = $this->Schemesmodel->uniformList($school_id,$class_id,$section_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);
              
            
        }

        // Master : Classes Wise Student List 
        // Sample Params : {"records":{"class_id":6,"section":"A","school_id":2112}}
        function noonmeal_list_post(){
            $records = $this->post('records');
            $school_id = $records['school_id'];
            $class_id=$records['class_id'];        
            $section_id =$records['section'];    
            // $arr = $this->Schemesmodel->getStudentforNoonmealIndent($school_id,$class_id,$section_id,$tname);
            $arr = $this->Schemesmodel->noonmealList($school_id,$class_id,$section_id);
            
            // if(!empty($arr)){
            //     $arr = $this->Schemesmodel->noonmealList($school_id,$class_id,$section_id);
            // }
            // else{
                
            // }

            // $tname='schoolnew_schemeindent';
            // $new_tname='schoolnew_meal';

            $this->response(['dataStatus' => true,
            'status'  => REST_Controller::HTTP_OK,
            'result'  => $arr ],REST_Controller::HTTP_OK);
        }
        public function laptop_distribution_post(){
            $records = $this->post('records');
            $classid = $records['class_id'];        
            $sectionid = $records['section'];
            $aca_yr_id = $records['ac_year_id'];
            $school_id = $records['school_id'];
            $arr = $this->Schemesmodel->LaptopDistibutionforScheme(11,$classid,$aca_yr_id,$school_id,$sectionid);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);
            
        } 

        //To Save Records to DB
        public function to_handle_common_save_post(){
            
            $records = $this->post('records');
            $arrdata = $records['data'];
            $tname = $records['tname'];
            $response_count = 0 ;

            foreach ($arrdata as $key => $value){
                     $response = $this->Schemesmodel->common_save_for_schemes($tname,$value);
                     $response_count += 1;   
            }
                 
            if($response_count == count($arrdata))
            {	
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_CREATED,
                                 'message' => 'Successfully Updated',
                                ],REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details',
                                ],REST_Controller::HTTP_OK);
            }
        }

        public function to_handle_common_update_post(){
            $records = $this->post('records');
            $arrdata = $records['data'];
            // $id = $records['id'];
            $tname = $records['tname'];
            $response_count = 0 ;

            foreach ($arrdata as $key => $value){
                $response = $this->Schemesmodel->common_update_for_schemes($value['id'],$tname,$value);
                $response_count += 1;   
            }
            
            // $response = $this->Schemesmodel->common_update($tname,$arrdata);

            if($response_count == count($arrdata))
            {	
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_OK,
                                 'message' => 'Successfully Updated',
                                ],REST_Controller::HTTP_OK);

            }
            else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details',
                                ],REST_Controller::HTTP_OK);
            }

        }

        public function save_scheme_post(){
            
            $records = $this->post('records');

            $arrdata = $records['data'];
            $tname = constant($records['constant']);
            if(!empty($arrdata)){
    
                $response_count = $this->Schemesmodel->save_scheme($tname,$arrdata);

                if($response_count == count($arrdata))
                {	
                    $this->response(['dataStatus' => true,
                                    'status'  => REST_Controller::HTTP_OK,
                                    'message' => 'Successfully Updated..',
                                    ],REST_Controller::HTTP_OK);
                }
                else
                {
                    $this->response(['dataStatus' => true,
                                    'status'  => REST_Controller::HTTP_OK,
                                    'message' => 'Some of the Details are Updated ! Please recheck it ..',
                                    ],REST_Controller::HTTP_OK);
                }
           }
           else{
            $this->response(['dataStatus' => true,
                             'status'  => REST_Controller::HTTP_NO_CONTENT,
                             'message' => 'No Records Found!, please try again.',
                            ],REST_Controller::HTTP_OK);
           }
        }


        //In Laptop Distribution - UniqueID Validation (field-Change-wise with Existing Data)
        function check_with_exist_serialno_get(){

            $records = $this->get('serialno');                    
            if(!empty($records)){   
                $val = isset($records) ? $this->Schemesmodel->checkWithExistUniqueID($records) : 0; 
                if($val != ''){
                        $this->response(['dataStatus' => true,
                                         'status'  => REST_Controller::HTTP_OK,
                                         'result' => $val ],REST_Controller::HTTP_OK);
                }
                else{
                        $this->response(['dataStatus' => false,
                                         'status'  => REST_Controller::HTTP_NO_CONTENT,
                                         'message' => 'No Records Found!, please try again.',
                                        ],REST_Controller::HTTP_OK);
                }
            }
            else{
                        $this->response(['dataStatus' => false,
                                         'status'  => REST_Controller::HTTP_NOT_FOUND,
                                         'message' => 'Please Provide the information.',
                                        ],REST_Controller::HTTP_OK);
            }
        }

        public function book_list_post(){
            $rec = $this->post('records');
            $class_id =$rec['class_id'];
            $medium_id = $rec['medium'];
            $term_id = $rec['term'];
            $arr = $this->Schemesmodel->text_book_list($class_id,$medium_id,$term_id);
            
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);
            
        }

        public function laptop_list_post(){
            $records = $this->post('records');
            $classid = $records['class_id'];
            $aca_yr_id = $records['ac_year_id'];
            $school_id = $records['school_id'];
            $sectionid = $records['section'];
            // if($aca_yr = '2018-2019'){
            //     $arr = $this->Schemesmodel->laptopList($classid,1,$school_id,$sectionid);    
            // }else if($aca_yr = '2019-2020'){
            //     $arr = $this->Schemesmodel->laptopList($classid,0,$school_id,$sectionid);    
            // }else if($aca_yr = '2017-2018'){
            //     // $arr = $this->Schemesmodel->laptopList1718($classid,0,$school_id,$sectionid);    
            // }
            $arr = $this->Schemesmodel->laptopList($classid,$aca_yr_id,$school_id,$sectionid);    
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);
        }
        
        public function primary_schools_book_list_post(){
            $records = $this->post('records');            
            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $medium_id = $records['medium'];
            $arr = $this->Schemesmodel->textbookListForPrimarySchool($medium_id,$class_id,$school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);

            
        }

        public function to_update_previous_XIIdtls_for_laptop_post(){

            $records = $this->post('records');
            // print_r($records);
            // die();
            $arrdata = $records['data'];
            $tname = $records['tname'];
            $response_count = 0 ;
            $col = 'REGNO';

            foreach ($arrdata as $key => $value){
                $reg = $value['REGNO'];
                unset($value['REGNO']); 
                $response = $this->Schemesmodel->updatePreXIILaptopDtl($reg,$tname,$value);
                $response_count += 1;   
            }
            
            if($response_count == count($arrdata))
            {	
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_OK,
                                 'message' => 'Successfully Updated',
                                ],REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response(['dataStatus' => true,
                                 'status'  => REST_Controller::HTTP_SERVICE_UNAVAILABLE,
                                 'message' => 'Something Went Wrong..! Unable To Update the Details',
                                ],REST_Controller::HTTP_OK);
            }
        }

        public function secondary_schools_book_list_post(){
            $records = $this->post('records');            
            $class_id = $records['class_id'];        
            $school_id = $records['school_id'];
            $medium_id = $records['medium'];
            $arr = $this->Schemesmodel->textbookListForSecondarySchool($medium_id,$class_id,$school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);

            
        }

        public function higer_secondary_schools_book_list_post(){
            $records = $this->post('records');            
            $class_id = $records['class_id'];
            $section = $records['section'];
            $school_id = $records['school_id'];
            $arr['booklist'] = $this->Schemesmodel->getHrSecBookList($class_id,$section,$school_id);
            $arr['studentlist'] = $this->Schemesmodel->textbookListForHigerSecondarySchool($class_id,$section,$school_id);
            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $arr ],REST_Controller::HTTP_OK);

        }    


 }
?>