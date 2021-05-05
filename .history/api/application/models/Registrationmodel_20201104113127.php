<?php

class Registrationmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
    function getallreligions(){
            $this->db->select('*')
                ->from('baseapp_religion');              
                $query = $this->db->get();      
        return $query->result();
    }

  
   /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
    function getrte_type(){
        $query ="select concat(category,'-',sub_category)as cate,id from 
        baseapp_rte_type ";
        $result = $this->db->query($query)->result();
        return $result;
    }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
    function getallsubcaste($community){
     $this->db->select('*')
              ->from('baseapp_sub_castes')
              ->where('community_id',$community);              
              $query = $this->db->get();      
       return $query->result();
    } 

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getalllaunguages(){
  	     $this->db->select('*')
              ->from('schoolnew_mediumofinstruction');              
              $query = $this->db->get();      
       return $query->result();
  }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getalldisadvantages(){
  	     $this->db->select('*')
              ->from('baseapp_disadvantaged_group');              
              $query = $this->db->get();      
       return $query->result();
  }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getalldisabilities(){
  	     $this->db->select('*')
              ->from('baseapp_differently_abled');              
              $query = $this->db->get();      
       return $query->result();
  }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getallachooldist(){
  	     $this->db->select('*')
              ->from('schoolnew_district')
              ->order_by('district_name','asc');            
              $query = $this->db->get();      
       return $query->result();
  }
 /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getallmediumofinst($schoolkeyid){
	     $SQL = "select * from schoolnew_mediumentry 
join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut where school_key_id=".$schoolkeyid;
        $query = $this->db->query($SQL);
        return $query->result_array();
  }
 /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
	function getallgroupcodes($gruop){
	     $this->db->select('*');
	 if($gruop=='29'){ $this->db->from('baseapp_group_code_cbse');  }else{
	 $this->db->from('baseapp_group_code');  }            
	 $query = $this->db->get(); 
	  return $query->result();           
  }
   /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getallbloodgroup(){
       $this->db->select('*')
        ->from('baseapp_bloodgroup');           
       $query = $this->db->get(); 
        return $query->result();           
  }
	  function getallclassstudying(){
	     $this->db->select('*')
	      ->from('baseapp_class_studying');           
	 $query = $this->db->get(); 
	  return $query->result();           
  }
 /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  	  function getmanagecateid($schoolid){
        //print_r($school_id);
	     $this->db->select('schoolnew_manage_cate.*')
	      ->from('schoolnew_basicinfo')
	      ->join('schoolnew_manage_cate','schoolnew_basicinfo.manage_cate_id=schoolnew_manage_cate.id')
	      ->where('schoolnew_basicinfo.school_id',$schoolid);           
	  $query = $this->db->get(); 
    //print_r($query);
	  return $query->result();           
  }

  
 /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
 function getmanagecatename($schid){
  $this->db->distinct('school_mana_id');
        $this->db->select('schoolnew_school_department.*')
        ->from('schoolnew_school_department')
        ->join('schoolnew_basicinfo','schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id')
        ->where('schoolnew_basicinfo.school_id',$schid);           
   $query = $this->db->get(); 
    return $query->row('school_mana_id');
 }

    /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
    function getclasslist($classid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_academic_detail');
       $this->db->where('school_key_id',$classid); 
       $query =  $this->db->get();
       return $query->result();
    }
    /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
    function getallclassstudying1($low,$high){
      
       $SQL="SELECT id,class_studying FROM (
                SELECT id,class_studying FROM baseapp_class_studying 
                UNION
                SELECT (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 0 ELSE id END) as id,
                    (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 'NA' ELSE class_studying END) as class_studying 
                FROM baseapp_class_studying) AS M1   
             WHERE (id BETWEEN (CASE WHEN (".$low.">12 AND ".$high."<=12) THEN 0 ELSE ".$low." END) AND ".$high.") 
             OR (id BETWEEN 13 AND (CASE WHEN (".$low.">12 AND ".$low."<=14) THEN 14 ELSE ".$low." END));" ; 
             
      // echo($SQL);die();
       $query = $this->db->query($SQL);
       return $query->result_array();    
  }

   /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getallincomes($table){
           $this->db->select('*'); 
       $this->db->from($table); 
       $query =  $this->db->get();
       return $query->result();
  }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getregstudentcount($schoolid){
    $this->db->select('*'); 
    $this->db->from('schoolnew_basicinfo');
    $this->db->where('school_id',$schoolid); 
    $query =  $this->db->get();
    return $query->row('student_id_count'); 
  }

  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/emis_student_reg_get
   * */
  function getregupdatecount($schoolid,$updatcount){
   $data=array('student_id_count'=>$updatcount);
   $this->db->where('school_id',$schoolid); 
   return $this->db->update('schoolnew_basicinfo', $data); 
  }


  /** Screen Name : Student admission ( new entry )
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Registration/studetus_search_post 
   * */
    public function get_students_admit_details($where_condition,$like_condition)
    {
      $this->db->select('a.unique_id_no,a.name,a.id,a.gender,a.class_studying_id,a.class_section,a.education_medium_id,a.school_admission_no,a.request_flag,a.school_id,a.dob,a.transfer_flag,c.community_name,b.school_name,a.smart_id,
      b.block_id,b.edu_dist_id,b.district_id')
               ->from('students_child_detail a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->join('baseapp_community c','c.id = a.community_id','left');
               if(!empty($where_condition)){
                $this->db->where($where_condition);
               }
               if(!empty($like_condition)){
                  $this->db->like($like_condition);
               }
      $result = $this->db->get()->result();
       //print_r($result);
      $records = [];
      if(!empty($result))
      {
          $records['data'] = $result;
          $records['status'] = true;
          $records['total'] = count($result);
          $records['message'] = '';
      }else
      {
           $records['data'] = '';
          $records['status'] = false; 
          $records['message'] = 'No Data Available';
      }
      return $records;

    }
  
  public function get_students_admit_details_arch($where_condition,$like_condition)
  {
      $this->db->select('a.unique_id_no,a.name,a.id,a.gender,a.class_studying_id,a.class_section,a.education_medium_id,a.school_admission_no,a.request_flag,a.school_id,a.dob,a.transfer_flag,c.community_name,b.school_name,a.smart_id,
      b.block_id,b.edu_dist_id,b.district_id')
               ->from('students_cpool_archive a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->join('baseapp_community c','c.id = a.community_id','left');
               if(!empty($where_condition)){
                $this->db->where($where_condition);
               }
               if(!empty($like_condition)){
                  $this->db->like($like_condition);
               }
               
               $result = $this->db->get()->result();
               //print_r($result);
      $records = [];
      if(!empty($result))
      {
          $records['data'] = $result;
          $records['status'] = true;
          $records['message'] = '';
          $records['total'] = count($result);
      }else
      {
           $records['data'] = '';
          $records['status'] = false; 
          $records['message'] = 'No Data Available';
          $records['total'] = count($result);
      }
      return $records;

  }

      function getstudentfortcdetails($school_id){
        $this->db->select('basetbl.id as student_id_in_child_dtl,basetbl.name,
        basetbl.name_tamil,
        basetbl.dob,
        basetbl.mothertounge_id,
        basetbl.education_medium_id,basetbl.doj,
        basetbl.unique_id_no,
        basetbl.school_id,
        basetbl.transfer_flag,
        basetbl.class_studying_id,
        baseapp_class_studying.class_studying,
        basetbl.class_section,
        basetbl.school_admission_no,
        basetbl.child_admitted_under_reservation,
        students_transfer_certificate_details.student_id as student_id_in_tc_dtl,
        students_transfer_certificate_details.student_unique_id, students_transfer_certificate_details.student_school_id, 
        students_transfer_certificate_details.student_name, students_transfer_certificate_details.student_dob_words, students_transfer_certificate_details.school_recognition_no, 
        students_transfer_certificate_details.student_nationality, students_transfer_certificate_details.student_community_tc, students_transfer_certificate_details.student_idenitiy1, 
        students_transfer_certificate_details.student_idenitiy2, students_transfer_certificate_details.student_class_id, students_transfer_certificate_details.student_current_class_id, 
        students_transfer_certificate_details.student_medium_inst, students_transfer_certificate_details.student_promote_class, students_transfer_certificate_details.student_scholarship, 
        students_transfer_certificate_details.student_medical_date, students_transfer_certificate_details.student_last_date, students_transfer_certificate_details.student_conduct, 
        students_transfer_certificate_details.student_tc_date, students_transfer_certificate_details.student_period_study_from, students_transfer_certificate_details.student_period_study_to, 
        students_transfer_certificate_details.student_apply_tc,
        students_transfer_certificate_details.student_first_lang,students_transfer_certificate_details.student_admission_date,students_transfer_certificate_details.hm_tc_flag'); 
    $this->db->from('students_child_detail as basetbl');
    $this->db->join('baseapp_class_studying','baseapp_class_studying.id = basetbl.class_studying_id','left');
    $this->db->join('students_transfer_certificate_details','students_transfer_certificate_details.student_unique_id = basetbl.unique_id_no and students_transfer_certificate_details.student_school_id = basetbl.school_id and students_transfer_certificate_details.student_current_class_id = basetbl.class_studying_id','left');
    $this->db->where('school_id',$school_id);
    $this->db->order_by('class_studying_id', 'ASC');
    $this->db->order_by('class_section', 'ASC');
    $this->db->order_by('basetbl.name', 'ASC');

    $result =  $this->db->get()->result();
    // print_r($this->db->last_query());
    // die();
    return $result;


    /*$sql="select * from students_child_detail join schoolnew_section_group on schoolnew_section_group.id=students_child_detail.class_section where class_studying_id=".$class_id." and class_section=".$section_id." and school_id=".$school_id." and transfer_flag=0";
    $query = $this->db->query($sql);
    return $query->result_array(); */
    }

  public function save_transfer_certificate($students_data)
    {
        if($students_data['student_id'] !='')
        {
            $this->db->trans_start();
            $this->db->where('student_id',$students_data['student_id']);
            $this->db->update('students_transfer_certificate_details',$students_data);
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();            
        }else
        {
          $this->db->trans_start();
          $this->db->insert('students_transfer_certificate_details',$students_data);
          $affectedRows=$this->db->affected_rows();
          $this->db->trans_complete();                  
        }
 
            if ($this->db->trans_status() === false) {
                $result = array( 'message' => 'Unable to Update details!',
                                'dataStatus' => false );
            }else if ($this->db->trans_status() === true) {
            if($affectedRows > 0 ) {
                $result = array( 'message' => 'Successfully Updated!',
                                'dataStatus' => true );
            }else {
                $result = array( 'message' => 'There is no changes in data. Haven`t Updated Anything!.',
                                'dataStatus' => true );
            }
            }else{
                $result = array( 'message' => 'Something Went Wrong!. Nothing to Update',
                                'dataStatus' => false );
            }
            return $result;
    }
    
    function getallcommunity($religion){
        $this->db->select('*')
                     ->from('baseapp_community')
                     ->where('religion_id',$religion);              
                     $query = $this->db->get();      
              return $query->result();
         }

         
        function emissturegdata($data,$tname,$admit_log,$student_rte_appli){
          $student_name = $data['name'];
          $unique_id_no = $data['unique_id_no'];
          $school_id = $data['school_id'];
          $this->db->trans_start();
          $this->db->insert($tname, $data); 
          $SID = $this->db->insert_id();
          $affectedRows=$this->db->affected_rows();
          $this->db->trans_complete();            
          if ($this->db->trans_status() === false) {
            $result = array( 'message' => 'Unable to Update details!',
                             'dataStatus' => false );
          }else if ($this->db->trans_status() === true) {
              if(!empty($student_rte_appli)){
                $student_rte_appli['unique_id_no'] = $unique_id_no;
                 $RteExtn = $this->updateRTEStudExtID($student_rte_appli);
              }else{ $RteExtn = ''; }
              if(!empty($admit_log)){
                $d['student_id'] = $SID;
                $d['school_id'] = $admit_log['schl_id'];
                $d['class'] = $admit_log['class'];
                $d['section'] = $admit_log['sec'];
                $d['student_name'] = $admit_log['stud_name'];
                $d['admitted_date'] = $admit_log['admt_date'];
                $d['status'] = $admit_log['admison_status'];
                $d['remarks'] = $admit_log['remrks'];
                $this->db->insert('students_admit_log',$d); 
              }
              if($affectedRows > 0 ) {      
                  $studExtn = $this->updateStudExtID($SID,$school_id,$unique_id_no);
                  $result = array( 'message' => 'Registered Successfully <br>
                                         Student Name - '.$student_name.'<br>
                                         Unique ID No - '.$unique_id_no.' ',
                                 'dataStatus' => true, 
                                 'additionalMessage'=>$studExtn,
                                );
              }else {
                  $result = array( 'message' => 'There is no changes in data. Haven`t Updated Anything!',
                                  'dataStatus' => true );
              }
          }else{
            $result = array( 'message' => 'Something Went Wrong!',
                            'dataStatus' => false );
          }
          return $result;
        
        //  if($res){
        //      return $res;
        //  }
        //  else{
        //     $db_error = $this->db->error();
        //     return $db_error;
        //  }
        }
        public function updateStudExtID($stid,$school_id,$unique_id){
          $this->db->select('manage_cate_id'); 
          $this->db->where('school_id',$school_id);
          $query = $this->db->get('schoolnew_basicinfo');
          $mgmt_id = $query->first_row()->manage_cate_id;
          switch($mgmt_id){
            case 1 : case 2: case 4: 
            // $update_dtls = array("user_id"=>concat(1,lpad($stid,9,0)),"smart_id"=>left(md5($unique_id),12)); 
            $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(1,lpad(".$stid.",9,0)), `smart_id` = left(md5(".$unique_id."),12)
                     WHERE `school_id`=".$school_id." AND `id`=".$stid;
            break;
            case 3 : case 5: 
              // $update_dtls = array("user_id"=>concat(2,lpad($stid,9,0)),"smart_id"=>left(md5($unique_id),12)); 
              $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(2,lpad(".$stid.",9,0)), `smart_id` = left(md5(".$unique_id."),12)
                      WHERE `school_id`=".$school_id." AND `id`=".$stid;
            break;
            default :  
            // $update_dtls = array(); 
            $SQL = "";
            break;
          }
          if(!empty($SQL)){
            $this->db->trans_start();
            // $this->db->where('school_id',$school_id); 
            // $this->db->where('id',$stid); 
            // $this->db->update('students_child_detail',$update_dtls);
            $query = $this->db->query($SQL);
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();   
            if ($this->db->trans_status() === false) {
              $result = 'Unable to update Student-User-ID and Student-Smartcard-ID !';
            }else if ($this->db->trans_status() === true) {
              $result = ($affectedRows > 0 ) ? ' Student-User-ID and Student-Smartcard-ID are Updated !!!' : 'There is no changes in Student-User-ID and Student-Smartcard-ID . Haven`t Updated Anything!';
            }else{ $result = 'Student-User-ID and Student-Smartcard-ID are not Updated,Try Again !'; }
          }else{ $result = 'Something Went Wrong!'; }
          return $result;         
        }

        public function updateRTEStudExtID($rtedetails){
            $this->db->trans_start();
            $rtedetails['register_no'] = $rtedetails['rte_appli_no'];
            unset($rtedetails['rte_appli_no']);
            $this->db->where('register_no',$rtedetails['register_no']); 
            $this->db->update('student_rte_appli',$rtedetails);
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();   
            return $this->db->trans_status();
        }
          /**
           * Students Admitted
           * VIT-sriram
           * 27/03/2019
           **/
          public function update_students_info($update,$table,$where_condition)
          {
          
              $this->db->where($where_condition);
              $this->db->update($table,$update);
              return $update;
          }

      
        /*
        * Transfer History 
        * VIT-sriram
        * 27/03/2019 
        **/
        public function get_transfer_history($data)
        {
            $this->db->order_by('id','DESC');
            $this->db->limit($data['limit']);
            $result = [];
            if($data['get_result']==1){
            $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->first_row();
            }else
            {
            $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->result();
            }
            
            return $result;

        }

        function getudiscecode($scl_id){
          $this->db->select('*'); 
   $this->db->from('schoolnew_basicinfo');
   $this->db->where('school_id',$scl_id); 
   $query =  $this->db->get();
   return $query->row('udise_code');
}

  public function get_arch_students_info($unique_id)
  {
     $SQL= "SELECT * FROM students_cpool_archive where unique_id_no=".$unique_id."";
            $query = $this->db->query($SQL);
     return $query->result_array();
  }

  public function check_unique_id($unique_id)
  {
     $SQL=   "SELECT count(unique_id_no) as uni FROM students_child_detail where unique_id_no=".$unique_id."";
            $query = $this->db->query($SQL);
        return $query->result_array();
  }

  function insert_stud_cmn_data($data){
    
    $this->db->trans_start();
    $this->db->insert('students_child_detail', $data); 
    $affectedRows=$this->db->affected_rows();
    $this->db->trans_complete();            

          if ($this->db->trans_status() === false) {
            $result = array( 'message' => 'Unable to Update details!',
                             'dataStatus' => false );
          }else if ($this->db->trans_status() === true) {
              if($affectedRows > 0 ) {
                  $result = array( 'message' => 'Student Moved To Common Pool !!!',
                                   'dataStatus' => true );
              }else {
                  $result = array( 'message' => 'There is no changes in data. Haven`t Updated Anything!',
                                  'dataStatus' => true );
              }
          }else{
            $result = array( 'message' => 'Something Went Wrong!',
                            'dataStatus' => false );
          }
          return $result;
  }

  public function delete_stud_cmn_data($unique_id_no){
    $this->db->trans_start();
    $this->db->where('unique_id_no', $unique_id_no);
    $this->db->delete('students_cpool_archive'); 
    $affectedRows=$this->db->affected_rows();
    $this->db->trans_complete();            
    if ($this->db->trans_status() === false) { $message = 'Fail To Delete Try Again!';
    } else if ($this->db->trans_status() === true) {
         if($affectedRows > 0 ) {
            $message = 'Successfully Deleted';
         } else {
            $message = 'There is No Records to Delete!.';
         }
    }
    else{
         $message = 'Fail To Delete Try Again!.';
    }
    return $message;
  }

  public function generate_tc_details($students_id)
    {
          $this->db->select('`students_child_detail`.*, `baseapp_bloodgroup`.`group`, `a`.`occu_name` as `father_occ`, `b`.`occu_name` as `mother_occ`, `baseapp_parentincome`.`income_value`, `schoolnew_mediumofinstruction`.`MEDINSTR_DESC`, `schoolnew_district`.`district_name`, `baseapp_religion`.`religion_name`, `baseapp_sub_castes`.`caste_name`,students_transfer_history.transfer_reason as transfer_reason,students_school_child_count.school_name,students_school_child_count.district_name,students_school_child_count.edu_dist_name,students_school_child_count.block_name,students_transfer_certificate_details.*,c.medinstr_desc as first_lang,baseapp_community.community_name,baseapp_group_code.mhrd_id,baseapp_group_code.group_name,baseapp_group_code.group_code,students_school_child_count.udise_code as school_code')
                    ->from('students_child_detail')
                    ->join('baseapp_bloodgroup','baseapp_bloodgroup.`id` = `students_child_detail`.`bloodgroup`','left')
                    ->join('baseapp_occupation a','a.id = students_child_detail.father_occupation','left')
                ->join('baseapp_occupation b','b.id = students_child_detail.mother_occupation','left')
                ->join('baseapp_parentincome','baseapp_parentincome.id = students_child_detail.parent_income','left')
                ->join('students_transfer_certificate_details','students_transfer_certificate_details.student_unique_id = students_child_detail.unique_id_no','left')
                ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                ->join('schoolnew_district','schoolnew_district.id = students_child_detail.district_id','left')
                ->join('baseapp_religion','baseapp_religion.id = students_child_detail.religion_id','left')
                ->join('baseapp_sub_castes','baseapp_sub_castes.id = students_child_detail.subcaste_id','left')
                ->join('students_transfer_history','students_transfer_history.unique_id_no = students_child_detail.unique_id_no and students_transfer_history.school_id_transfer = students_child_detail.school_id','left')
                ->join('baseapp_community','baseapp_community.id=students_child_detail.community_id','left')
                ->join('students_school_child_count','students_school_child_count.school_id = students_transfer_certificate_details.student_school_id')
                ->join('baseapp_group_code','baseapp_group_code.id=students_transfer_certificate_details.student_group_code','left')
                ->join('schoolnew_mediumofinstruction c','c.MEDINSTR_ID = students_transfer_certificate_details.student_first_lang','left')
                ->where('students_transfer_certificate_details.student_id',$students_id);
                $this->db->order_by('students_transfer_history.id',"DESC");
                $result = $this->db->get()->first_row();
                // print_r($this->db->last_query());die;
                // print_r($result);die;
                return $result;

    }
	
	/**********************************************************************************************************************
		Students QuickAdmit Creation - Don't change anything in code by Ramco Magesh
	**********************************************************************************************************************/
	public function QuickAdmit($tablename,$singlearray){
		return $this->db->insert($tablename,$singlearray);
	}
	public function Mschool($emis_userid){
		/*select school_id,
class_studying_id,class_section,education_medium_id,MEDINSTR_DESC
 from students_child_detail 
join (select school_key_id,medium_instrut,MEDINSTR_DESC from schoolnew_mediumentry join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut where school_key_id=".$emis_userid.") as mediumin on mediumin.medium_instrut=students_child_detail.education_medium_id
left join baseapp_group_code on baseapp_group_code.id=students_child_detail.group_code_id
 where school_id=".$emis_userid." group by class_studying_id,class_section;*/
		$sql="select school_id,class_studying_id,class_section,MEDINSTR_DESC,group_name,group_code_id,education_medium_id from students_child_detail 
join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID=students_child_detail.education_medium_id
and school_id=".$emis_userid." 
left join baseapp_group_code on baseapp_group_code.id=students_child_detail.group_code_id
join (select school_key_id,class_id,section_id,sections from
(SELECT schoolnew_class_section.school_key_id,class_id,substring_index(substring_index(section_ids, ',', n),',',-1) as section_id,sections
FROM schoolnew_class_section
JOIN (select n from
(select (char_length(section_ids)-char_length(replace(section_ids,',',''))+1) as n from schoolnew_class_section group by n) as ndet
where n is not null) as num on char_length(section_ids)- char_length(replace(section_ids, ',', ''))>= n - 1
WHERE schoolnew_class_section.school_key_id=".$emis_userid.") as sections 
group by class_id,section_id) as allsections on allsections.school_key_id=students_child_detail.school_id 
where students_child_detail.school_id=".$emis_userid."
group by class_studying_id,class_section,education_medium_id;";
		$query=$this->db->query($sql);
		if($query==null)
			return null;
		else
			return $query->result_array();
	}
	/**********************************************************************************************************************
		Students QuickAdmit Creation - Don't change anything in END HERE code by Ramco Magesh
	**********************************************************************************************************************/
	
	/**********************************************************************************************************************
		Students NSSTagging Creation - Don't change anything in code by Ramco Magesh
	**********************************************************************************************************************/
	public function NssTagging($tablename,$multi,$reference){
		
		/*$SQL="SELECT * FROM ".$tablename." WHERE student_id=".$reference['student_id'].";";
		//print_r($SQL);
		$res=$this->db->query($SQL);
		$pr=$res->result_array();
		if($pr[0]!=null){
			return $this->db->update($tablename,$singlearray,$reference);
		}else{
			return $this->db->insert($tablename,$singlearray);
		}*/
		if($this->db->delete($tablename,$reference)){

			return $this->db->insert_batch($tablename,$multi);
		}else{
			return false;
		}
		
	}
	
	
	public function nsstagginglist($where){
		$sql="select students_club_participation.school_id,student_id,students_club_participation.class_studying_id,students_club_participation.class_section,participate_type_id,participate_subtype_id,participate_level,acyear,participate_type,participate_sub_type ,name
from students_club_participation 
left join student_mst_activities on student_mst_activities.type_id=students_club_participation.participate_type_id and students_club_participation.participate_subtype_id=student_mst_activities.subtype_id
left join students_child_detail on students_child_detail.id=students_club_participation.student_id ".$where.";";
		$query=$this->db->query($sql);
		if($query==null)
			return null;
		else

			return $query->result_array();
	}
	/**********************************************************************************************************************
		Students NSSTagging Creation - Don't change anything in END HERE code by Ramco Magesh
	**********************************************************************************************************************/
 
}
?>