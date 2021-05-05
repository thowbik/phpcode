<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';

class School_register extends REST_Controller{

        function __construct()
        {
                parent::__construct();
                 $this->load->database(); 
                 $this->load->model('Homemodel');
        }

        /** Screen Name : DashBoard Registers
         *  Purpose     : Students Registers only
         *  Refer       : In emis-code (ctrl : Home -> Registers
         */

        /**Student Registers Starts here**/

        function student_scheme_list_nmms_get()
        {   
            $school_id = $this->get('emis_school_id');
            //$classnumber=$this->get('classno');
            //$sectionname=$this->get('sectionname');
            if(!empty($school_id)){
            $data['nmms']=$this->Homemodel->getscheme_nmms($school_id);
            $data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        
        function student_scheme_list_trstse_get()
        {                
                $school_id = $this->get('emis_school_id');
                if(!empty($school_id)){
                $data['trstse']=$this->Homemodel->getscheme_trstse($school_id);//,$classnumber,$sectionname);
                $data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
                    if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function student_scheme_list_inspire_get()
        {                         
                $school_id = $this->get('emis_school_id');
                if(!empty($school_id)){
                $data['inspire']=$this->Homemodel->getscheme_inspire($school_id);    
                $data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
                    if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function student_scheme_list_sports_post()
        {       
            $records = $this->post('records');
            if($records)
            $school_id = $records['emis_school_id'];
            $classnumber=$records['classno'];        
            $sectionname =$records['sectionname'];  

            if(!empty($school_id)){
            $data['sports_search']=$this->Homemodel->getscheme_search_sports($school_id,$classnumber,$sectionname);
            $data['sportslist']=$this->Homemodel->getsports_list();
            $data['student_tag1']=$this->Homemodel->getscheme_search_stud1($school_id,$classnumber,$sectionname);
            $data['classDetails'] = $this->Homemodel->getClassDetail($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function RTI_students_list_post()
        {              
            $records = $this->post('records');
            if($records)
            $school_id = $records['emis_school_id'];
            $class_id=$records['class_id'];        
            $section_id =$records['section_id']; 

            if(!empty($school_id)){
                $data['RTI_List'] = $this->Homemodel->get_RTI_students_list($school_id);
                $data['class_id'] = $class_id;
                $data['section_id'] = $section_id;
                $data['school_classwise'] = $this->Homemodel->get_schoolwise_class($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_student_disablity_list_get()
        {   
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['allstuds'] = $this->Homemodel->get_classwise_student_disability( $school_id);
                $data ['stud_detail'] =$this->Homemodel->dis_class_student_disability($school_id);          
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function benefit_students_list_get()
        {    
            $school_id = $this->get('emis_school_id');   
            if(!empty($school_id)){
                $data['cwsn_benefit'] = $this->Homemodel->cwsn_benefit($school_id);          
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function students_osc_get()
        {     
            $school_id = $this->get('emis_school_id'); 
            if(!empty($school_id)){
                $data['student_osc'] = $this->Homemodel->students_osc_reg($school_id);         
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_religion_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
            $data['school_community'] = $this->Homemodel->stud_religion_report($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_voc_nsqf_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
            $data['school_community'] = $this->Homemodel->stud_voc_nsqf_report($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_cwsn_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
            $data['school_community'] = $this->Homemodel->stud_cwsn_report($school_id); 
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_BPL_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['school_community'] = $this->Homemodel->stud_BPL_report($school_id); 
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_aadhar_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['school_community'] = $this->Homemodel->stud_aadhar_report($school_id); 
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function report_age_get()
        {  
            //$district_id = $this->get('emis_district_id'); 
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['student_age'] = $this->Homemodel->get_report_age($school_id); 
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function stud_community_report_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['school_community'] = $this->Homemodel->stud_community_report($school_id);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
            
        /**Student Registers Ends here**/
  
        /**Schemes Registers Starts here**/
        function emis_school_Laptops_Distribution11_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $where =11;
                $data['Laptops_distribute_details'] = $this->Homemodel->emis_school_Laptops_Distribution_details($school_id, $where);
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Laptops_Distribution12_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $where=12;
                $data['Laptops_distribute_details'] = $this->Homemodel->emis_school_Laptops_Distribution_details($school_id, $where);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Laptops_Previous_Year_Distribution12_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['Laptops_distribute_pervious'] = $this->Homemodel->emis_school_Laptops_Pervious_Year_Distribution12_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function ptmgr_noon_meal_program_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['ptmgr_noon_meal_program'] = $this->Homemodel->ptmgr_noon_meal_program($school_id);
                    if(!empty($data)){
                            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_textbooks_Distribution_details_post()
        {                      
            $records = $this->post('records');
            if($records)
            $school_id = $records['emis_school_id'];
            $classnumber = $records['classno'];   
            $term = $records['term1'];    
            if(!empty($school_id)){
                $data['classDetails'] = $this->Homemodel->getClassDetail1($school_id);
                $data['group_name']=$this->Homemodel->group_names();
                if(!empty($classnumber))
                {
                $data['text_book_distribute_details'] = $this->Homemodel->emis_school_textbooks_Distribution_details($school_id,$classnumber,$term);
                }                       
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_notebooks_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['note_book_distribute_details'] = $this->Homemodel->emis_school_notebooks_Distribution_details($school_id);
                    if(!empty($data)){
                            $this->response(['dataStatus' => true,
                            'status'  => REST_Controller::HTTP_OK,
                            'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_bags_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['bags_distribute_details'] = $this->Homemodel->emis_school_bags_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_uniforms_Distribution_details_post()
        {                      
            $records = $this->post('records');
            if($records)
            $school_id = $records['emis_school_id'];
            $sets = $records['set'];      
            if(!empty($school_id)){
                $data['uniform_distribute_details'] = $this->Homemodel->emis_school_uniforms_Distribution_details($school_id,$sets);         
                if(!empty($data)){
                    $this->response(['dataStatus' => true,
                    'status'  => REST_Controller::HTTP_OK,
                    'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_footwear_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['footwear_distribute_details'] = $this->Homemodel->emis_school_footwear_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_buspass_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['buspass_distribute_details'] = $this->Homemodel->emis_school_buspass_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_ColourPencil_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['colorpencil_distribute_details'] = $this->Homemodel->emis_school_ColourPencil_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_GeometryBox_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['geometrybox_distribute_details'] = $this->Homemodel->emis_school_GeometryBox_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Atlas_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['atlas_distribute_details'] = $this->Homemodel->emis_school_Atlas_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Sweater_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['sweater_distribute_details'] = $this->Homemodel->emis_school_Sweater_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Raincoat_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['raincoat_distribute_details'] = $this->Homemodel->emis_school_Raincoat_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_boot_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['boot_distribute_details'] = $this->Homemodel->emis_school_boot_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        function emis_school_Socks_Distribution_details_get()
        {  
            $school_id = $this->get('emis_school_id');
            if(!empty($school_id)){
                $data['socks_distribute_details'] = $this->Homemodel->emis_school_Socks_Distribution_details($school_id);
                if(!empty($data)){
                        $this->response(['dataStatus' => true,
                        'status'  => REST_Controller::HTTP_OK,
                        'result'  => $data ],REST_Controller::HTTP_OK);     
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
        /**Schemes Registers Ends here**/

        //To Save Records to DB
    public function studentmark_insert_9_10_post(){
            
    $records = $this->post('records');
    $arrdata = $records['data'];
    $termid = $records['termid'];
    $classid = $records['classid'];
    //$reason = json_decode($this->input->post('reason'),true);
    $reason = $records['reason'];
    $schoolid = $records['schoolid'];
    //unset($records[0]);
    //unset($records[1]);

    $response_count = 0 ;    
    
    if($termid == 1 || $termid == 3 || $termid == 5){
            $tname = 'schoolnew_qstudents_highsclterm';  
    }elseif($termid == 2 || $termid == 4 || $termid == 6){
            $tname = 'schoolnew_qstudents_highsclyrly'; 
    }
    
    switch($termid)
    {
        case '1':
        case '2': $s_id='1';break;
        case '3':
        case '4': $s_id='2';break;
        case '5': 
        case '6': $s_id='3';break;    
    }
  
    foreach ($arrdata as $key => $value){
        $status=1;
        $data = array(
                    'class_id' => $classid,
                    'section'  => $value['section'],
                    'student_id'=>$value['student_id'],
                    'student_name'=>$value['student_name'],
                    'access'.$s_id =>1,
                   // 'acc_reason'.$s_id => $value['student_id']!=''?$value['student_id']:$value['acc_reason'],
                    'acc_reason'.$s_id => $value['student_id']!=''?$value['student_id']:$value['reason'],
                    'school'.$s_id."_id" => $schoolid,
                    'lang'.$s_id  =>$value['A'] != 0 ? $value['A']:NULL,
                    'eng'.$s_id =>$value['B'] != 0 ? $value['B']:NULL,
                    'maths'.$s_id =>$value['C']!= 0 ? $value['C']:NULL,
                    'science'.$s_id =>$value['D']!= 0 ? $value['D']:NULL,
                    'pract'.$s_id =>$value['E']!= 0 ? $value['E']:NULL,
                    'social'.$s_id=>$value['F']!= 0 ? $value['F']:NULL,
                    'total'.$s_id =>$value['G']!= 0 ? $value['G']:NULL,
                    'status'.$s_id=> $status,
                    'created_date' => date("Y-m-d H:i:s"),); 

             $response = $this->Homemodel->common_save_for_scholastic($tname,$data);
             $response_count += 1;   
    }
         
    if($response_count == count($arrdata))
    {	
        $this->response(['dataStatus' => true,
                         'status'  => REST_Controller::HTTP_CREATED,
                         'message' => 'Successfully Inserted',
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
  
  public function studentmark_update_9_10_post(){
    $records = $this->post('records');
    $classid = $records['classid'];
    $schoolid = $records['schoolid'];
    $termid = $records['termid'];
    $arrdata = $records['data'];
    //$reason = json_decode($records['reason'],true);
    $reason = $records['reason'];
    $subjectid = $records['subjectid'];
    //unset($records[0]);
    //unset($records[1]);       

    $response_count = 0 ;
  
    if($termid == 1 || $termid == 3 || $termid == 5){
            $tname = 'schoolnew_qstudents_highsclterm';  
    }elseif($termid == 2 || $termid == 4 || $termid == 6){
            $tname = 'schoolnew_qstudents_highsclyrly'; 
    }
    switch($termid)
    {
        case '1':
        case '2': $s_id='1';break;
        case '3':
        case '4': $s_id='2';break;
        case '5': 
        case '6': $s_id='3';break;    
    }
    foreach ($arrdata as $key => $value){
        $status=2;
        $data = array(
                    'class_id' => $classid,
                    'section'  => $value['section'],
                    'student_id'=>$value['student_id'],
                    'student_name'=>$value['student_name'],
                    //'access'.$s_id =>0,
                    'acc_reason'.$s_id => $value['student_id']!=''?$value['student_id']:$value['Reason'],
                    'school'.$s_id."_id" => $schoolid,
                    'lang'.$s_id  =>$value['A'] != 0 ? $value['A']:NULL,
                    'eng'.$s_id =>$value['B'] != 0 ? $value['B']:NULL,
                    'maths'.$s_id =>$value['C']!= 0 ? $value['C']:NULL,
                    'science'.$s_id =>$value['D']!= 0 ? $value['D']:NULL,
                    'pract'.$s_id =>$value['E']!= 0 ? $value['E']:NULL,
                    'social'.$s_id=>$value['F']!= 0 ? $value['F']:NULL,
                    'total'.$s_id =>$value['G']!= 0 ? $value['G']:NULL,
                    'status'.$s_id=> $status,
                    'created_date' => date("Y-m-d H:i:s"),);                    
                    $response = $this->Homemodel->common_update_for_scholastic($value['UpdateID'],$tname,$data);
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
}
?>
