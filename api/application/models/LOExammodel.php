<?php

class LOExammodel extends CI_Model
{
     function __construct() 
	   {
       parent::__construct();
     }
     function start_exam($school_id,$unique_id_no,$medium_id){

         $tname = 'exams_session_detail';
         $data['school_id']=$school_id;
         $data['unique_id_no']=$unique_id_no;
         $data['session_status'] = '0';
         $data['start_time'] = date('Y-m-d H-i-s');
         $data['updated_date'] = date('Y-m-d H-i-s');

         $sql = "SELECT qset_id FROM exams_quest_set WHERE qset_medium = ".$medium_id." ORDER BY RAND() LIMIT 1" ;
         $query = $this->db->query($sql);
         $result = $query->result_array(); 
         $data['qset_id'] = $result['0']['qset_id'];

         if(!empty($data['qset_id'])){

              if(!empty($data['unique_id_no'])){                   
                    $this->db->select('*')
                    ->from('exams_session_detail')
                    ->where('unique_id_no',$data['unique_id_no'])            
                    ->where('session_status',0);
                    $query = $this->db->get(); 
                    $result = $query->result_array();
                    if(!empty($result)){
                          if($result['0']['session_status'] == '0'){
                              $update['session_status'] = '1';
                              $session_id = $result['0']['session_id'];

                              $this->db->where('session_id', $session_id);
                              $this->db->update('exams_session_detail',$update);
                              $row = $this->db->affected_rows();
                              if($row == '1'){
                                   $query = $this->db->insert($tname,$data); 
                                   $row = $this->db->affected_rows();
                                   if($row == '1'){
                                        $this->db->select('*')
                                        ->from('exams_session_detail')
                                        ->where('unique_id_no',$data['unique_id_no'])            
                                        ->where('session_status',0);
                                        $query = $this->db->get(); 
                                        $result = $query->result_array();
                                        $session_id = $result['0']['session_id'];
                                        $qset_id = $result['0']['qset_id'];
                                   }

                        if(!empty($qset_id)){               
                         $this->db->select('exams_quest_set.qset_question_id')
                         ->from('exams_quest_set')
                         ->where('qset_id',$qset_id);
                         $query = $this->db->get(); 
                         $result1 = $query->result_array();
                         $question_list = $result1['0']['qset_question_id'];
          
                         $result2 = array();
                         $questions = (explode(",",$question_list));
                         foreach($questions as $key => $quest) {    
                              $result2[$key]['session_id']  = $session_id;                        
                              $this->db->select('exams_quest_bank.q_id,exams_quest_bank.q_text,exams_quest_bank.q_img')
                              ->from('exams_quest_bank')
                              ->join('exams_quest_detail', 'exams_quest_bank.q_id= exams_quest_detail.q_id')
                              ->where('exams_quest_bank.q_id',$quest)
                              ->where('exams_quest_bank.isactive','1')
                              ->group_by('exams_quest_detail.q_topic'); 
                              $querys = $this->db->get(); 
                              $result2[$key]['quest'] = $querys->result_array();
                              
                              $this->db->select('exams_quest_choice.q_id,exams_quest_choice.choice_id,exams_quest_choice.choice_text,exams_quest_choice.choice_img,exams_quest_choice.choice_correct_yn,exams_quest_choice.choice_weight')
                              ->from('exams_quest_choice')
                              ->where('q_id',$quest)
                              ->where('isactive','1'); 
                              $query = $this->db->get(); 
                              $result2[$key]['choice'] = $query->result_array();   
                          }
                          return $result2;
                    }
                              }
                              //return $this->db->affected_rows();

                             
                              //  $this->db->select('exams_student_response.q_id')
                              //  ->from('exams_student_response')
                              //  //->join('exams_session_detail', 'exams_quest_bank.q_id= exams_quest_detail.id')
                              //  ->where('session_id',$result['0']['session_id']);
                              //  $query = $this->db->get(); 
                              //  //print_r($this->db->last_query());
                              //  $result = $query->result_array();
                              //  print_r($result);
                              //  die();
                          }
                    }else{
                         $query = $this->db->insert($tname,$data); 
                         $row = $this->db->affected_rows();
                         if($row == '1'){
                              $this->db->select('*')
                              ->from('exams_session_detail')
                              ->where('unique_id_no',$data['unique_id_no'])            
                              ->where('session_status',0);
                              $query = $this->db->get(); 
                              $result = $query->result_array();
                              $session_id = $result['0']['session_id'];
                              $qset_id = $result['0']['qset_id'];
                         }   

                        if(!empty($qset_id)){               
                         $this->db->select('exams_quest_set.qset_question_id')
                         ->from('exams_quest_set')
                         ->where('qset_id',$qset_id);
                         $query = $this->db->get(); 
                         $result1 = $query->result_array();
                         $question_list = $result1['0']['qset_question_id'];
                         //return $question_list;
          
                         $result2 = array();
                         $questions = (explode(",",$question_list));
                         foreach($questions as $key => $quest) {    
                              $result2[$key]['session_id']  = $session_id;                        
                              $this->db->select('exams_quest_bank.q_id,exams_quest_bank.q_text,exams_quest_bank.q_img')
                              ->from('exams_quest_bank')
                              ->join('exams_quest_detail', 'exams_quest_bank.q_id= exams_quest_detail.q_id')
                              ->where('exams_quest_bank.q_id',$quest)
                              ->where('exams_quest_bank.isactive','1')
                              ->group_by('exams_quest_detail.q_topic'); 
                              $querys = $this->db->get(); 
                              $result2[$key]['quest'] = $querys->result_array();
                              
                              $this->db->select('exams_quest_choice.q_id,exams_quest_choice.choice_id,exams_quest_choice.choice_text,exams_quest_choice.choice_correct_yn,exams_quest_choice.choice_weight')
                              ->from('exams_quest_choice')
                              ->where('q_id',$quest)
                              ->where('isactive','1'); 
                              $query = $this->db->get(); 
                              $result2[$key]['choice'] = $query->result_array();   
                          }
                          return $result2;
                    }

                    }
              }
         
         }
     }

     function common_insert($tname,$data){         
          $result = $this->db->insert($tname, $data); 
          return $result;

          // $query = $this->db->insert($tname,$data); 
          // $qury = $this->db->last_query();
          // $row = $this->db->affected_rows();
          // $id = $this->db->insert_id();
          // $q = $this->db->get_where($tname, array('session_id' => $id));
          // $result =  $q->row_array();
          // $qset_id = $result['qset_id'];
          // $session_id = $result['session_id'];
          
          //print_r($this->db->last_query());
     }
     function common_update_lofinal($tname,$data){

          $session_id = $data['session_id'];
          $unique_id_no = $data['unique_id_no'];
          $session_status = $data['session_status'];
           $this->db->where('session_id', $session_id);
           $this->db->where('unique_id_no', $unique_id_no);      
           $this->db->update($tname, $data); 
           $result = $this->db->affected_rows();
           return $result;	           
      } 

}    