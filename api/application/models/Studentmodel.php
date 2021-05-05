<?php
class Studentmodel extends CI_Model
{
    function __construct() 
	{
      parent::__construct();
    }

    public function get_block_id($col,$val)
    {
        $this->db->select('block_id')
                 ->from('students_school_child_count')
                 ->where($col,$val);
        $result = $this->db->get()->first_row();
        return $result->block_id;
        // return $result;
    }

  /** Screen Name : Common pool Report
   *  Purpose     : Student List Common pool Report
   *  Done by     : MR Magesh/ramco.
   *  Controller  : Student/school_migration
   */
    public function get_school_student_migration($block_id)
    {

      $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,NAME,school_type,school_name,gender,students_transfer_history.class_studying_id,students_child_detail.unique_id_no,students_transfer_history.id,baseapp_class_studying.class_studying,
         (CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE
          CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
          CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE
          CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE
          CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE
          CASE WHEN transfer_reason=6 THEN 'Duplicate EMIS Entry' END END END END END END) AS Reason,remarks 
          FROM students_child_detail
          JOIN students_transfer_history  ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no
     LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer
     LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id = students_transfer_history.class_studying_id
         WHERE students_school_child_count.block_id=".$block_id." AND  students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12  group by students_child_detail.unique_id_no";
         
              $query = $this->db->query($SQL);
       return $query->result(); 

    
    }

  /** Screen Name : Common pool Report
   *  Purpose     : to Save Student List 
   *  Done by     : MR Magesh/ramco.
   *  Controller  : Student/save_common_student_list
   */
    public function save_common_student_list($save_data)
    {

        if($save_data['id'] !=''){
          $up=$this->db->update('students_transfer_history', $save_data, "id = ".$save_data['id']);
          return $up;
        }else{
        $this->db->insert('students_transfer_history',$save_data);
        return $this->db->insert_id();
        }         
    }

    public function generate_tc_details($students_id)
    {
          $this->db->select('`students_child_detail`.*, `baseapp_bloodgroup`.`group`, `a`.`occu_name` as `father_occ`, `b`.`occu_name` as `mother_occ`, `baseapp_parentincome`.`income_value`, `schoolnew_mediumofinstruction`.`MEDINSTR_DESC`, `schoolnew_district`.`district_name`, `baseapp_religion`.`religion_name`, `baseapp_sub_castes`.`caste_name`,students_transfer_history.transfer_reason,students_school_child_count.school_name,students_school_child_count.district_name,students_school_child_count.edu_dist_name,students_school_child_count.block_name,students_transfer_certificate_details.*,c.medinstr_desc as first_lang,baseapp_community.community_name,baseapp_group_code.group_name,baseapp_group_code.group_code')
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
                $result = $this->db->get()->first_row();
                // print_r($this->db->last_query());die;
                // print_r($result);die;
                return $result;

    }
    
  /** Screen Name : Students Admitted 
   *  Purpose     : to update
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Student/update_students_transfer_post
   *              : Registration/updateStudentsRaiseRequest_post
   * */
  public function update_students_info($update,$table,$where_condition)
  {
      $this->db->where($where_condition);
      $this->db->update($table,$update);
      return $update;
  }

      /**
       * Students List - Update Students Profile 
       * CTRL : Student/to_update_student_details
       * sriram - 19/03/2019
       **/
      public function update_student_profile($update,$tname)
      {

        // $this->db->trans_start();
        $this->db->where('id',$update['id']);
        $this->db->update($tname,$update);
        $affectedRows=$this->db->affected_rows();
        // $this->db->trans_complete();            
        // if ($this->db->trans_status() === false) {
        //               $result = array( 'message' => 'Unable to Update details!',
        //                                'dataStatus' => false );
        // }else if ($this->db->trans_status() === true) {
        //             if($affectedRows > 0 ) {
        //               $result = array( 'message' => 'Successfully Updated!',
        //                                'dataStatus' => true );
        //             }else {
        //               $result = array( 'message' => 'There is no changes in data. Haven`t Updated Anything!.',
        //                                'dataStatus' => true );
        //             }
        // }else{
        //               $result = array( 'message' => 'Something Went Wrong!. Nothing to Update',
        //                                'dataStatus' => false );
        // }
        return $affectedRows;

      }

      public function updateStudExtID($stid,$school_id,$unique_id){
        $this->db->select('manage_cate_id'); 
        $this->db->where('school_id',$school_id);
        $query = $this->db->get('schoolnew_basicinfo');
        $mgmt_id = $query->first_row()->manage_cate_id;

        $this->db->select('user_id,smart_id'); 
        $this->db->where('id',$stid);
        $query = $this->db->get('students_child_detail');
        $user_id = $query->first_row()->user_id;
        $smart_id = $query->first_row()->smart_id;
        switch($mgmt_id){
          case 1 : case 2: case 4: 
            if($user_id == '' && $smart_id== ''){
              $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(1,lpad(".$stid.",9,0)), `smart_id` = left(md5(".$unique_id."),12)
                     WHERE `id`=".$stid;
              $msg ="Student-User-ID and Student-Smartcard-ID";
            }else if($user_id == ''){
              $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(1,lpad(".$stid.",9,0))
                     WHERE `id`=".$stid;
                     $msg ="Student-User-ID";
            }else if($smart_id == ''){
              $SQL = "UPDATE `students_child_detail` SET `smart_id` = left(md5(".$unique_id."),12)
                     WHERE `id`=".$stid;
                     $msg ="Student-Smartcard-ID";
            }else{ $SQL = "";$msg =""; }
          break;
          case 3 : case 5: 
            if($user_id== '' && $smart_id== ''){
              $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(2,lpad(".$stid.",9,0)), `smart_id` = left(md5(".$unique_id."),12)
                     WHERE `id`=".$stid;
                     $msg ="Student-User-ID and Student-Smartcard-ID";
            }else if($user_id== ''){
              $SQL = "UPDATE `students_child_detail` SET `user_id` = concat(2,lpad(".$stid.",9,0))
                     WHERE `id`=".$stid;
                     $msg ="Student-User-ID";
            }else if($smart_id== ''){
              $SQL = "UPDATE `students_child_detail` SET `smart_id` = left(md5(".$unique_id."),12)
                     WHERE `id`=".$stid;
                     $msg ="Student-Smartcard-ID";
            }else{ $SQL = "";$msg =""; }
          break;
          default :  $SQL = "";$msg =""; break;
        }
        if(!empty($SQL)){
          $this->db->trans_start();
          $query = $this->db->query($SQL);
          $affectedRows=$this->db->affected_rows();
          $this->db->trans_complete();   
          if ($this->db->trans_status() === false) {
            $result = 'Unable to update the '.$msg.'!';
          }else if ($this->db->trans_status() === true) {
            $result = ($affectedRows > 0 ) ? $msg.' are Updated !!!' : 'There is no changes '.$msg.' Haven`t Updated Anything!';
          }else{ $result = $msg.' are not Updated,Try Again !'; }
        }else{ $result = 'Something Went Wrong!'; }
        return $result;         
      }

  /** Screen Name : Tranfer student List
   *  Purpose     : to save students transfer
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Student/update_students_transfer_post
   * */
  public function save_students_info($save,$table)
  {
    // print_r($table);die;
        $this->db->insert($table,$save);
        return $this->db->insert_id();
  }

  /** Screen Name : Students Transfer
   *  Purpose     : transfer history 
   *  Done by     : Sriram - 27/03/2019
   *  Controller  : Student/update_students_transfer_post
   *              : Registration/updateStudentsRaiseRequest_post
   * */
  public function get_transfer_history($data)
  {
        // print_r($data);

      $this->db->order_by('id','DESC');
      $this->db->limit($data['limit']);
       $result = [];
      if($data['get_result']==1){
       $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->first_row();
    }else
    {
      $result = $this->db->get_where('students_transfer_history',array('unique_id_no'=>$data['unique_id_no']))->result();
    }
      // print_r($this->db->last_query());die;
    // print_r($result);die;
      return $result;

  }

  function student_summary($school_id){
    $sql = "SELECT sg.class_id, sg.section, 
sum(case when scd.gender = 1 and scd.class_studying_id = sg.class_id  and scd.class_section = sg.section and scd.transfer_flag = 0 then 1 else 0 end) AS boys,
sum(case when scd.gender = 2 and scd.class_studying_id = sg.class_id  and scd.class_section = sg.section and scd.transfer_flag = 0 then 1 else 0 end) AS girls,
g.group_name as Grp,
m.MEDINSTR_DESC as Medium, u.teacher_name as teacher_name
from students_child_detail scd
left join schoolnew_section_group sg on sg.school_key_id = scd.school_id
left join udise_staffreg u on u.teacher_id = sg.class_teacher_id
left join schoolnew_mediumofinstruction m on m.ID=sg.school_medium_id
left join baseapp_group_code g on g.id=sg.group_id
where scd.school_id=$school_id and sg.class_id in (1,2,3,4,5,6,7,8,9,10,13,14,15) and scd.transfer_flag=0 group by sg.class_id,sg.section";
    $query = $this->db->query($sql);
  //print_r($this->db->last_query());
    // print_r($query->result());die();
    return $query->result();
  }

  function student_summary_11_12($school_id){
    $sql = "SELECT sum(case gender when 1 then 1 else 0 end ) AS male,sum(case gender when 2 then 1 else 0 end ) AS Female,class_studying_id,class_section,(select group_name from baseapp_group_code where baseapp_group_code.id=students_child_detail.group_code_id limit 1) AS grp,(select MEDINSTR_DESC from schoolnew_mediumofinstruction where schoolnew_mediumofinstruction.ID=students_child_detail.education_medium_id limit 1) AS edu_med FROM students_child_detail where school_id=".$school_id." and class_studying_id in (11,12)  and transfer_flag=0  group by class_studying_id,group_code_id,education_medium_id";
    $query = $this->db->query($sql);
    // print_r($this->db->last_query());
    // print_r($query->result());die();
    return $query->result();
  }

  /** getdtls (QUERY) Functionality are Starts Here : last mod - 28.09.2019(venba/ps) */
  function get_previous_XII_dtls($school_id,$tbl){ 
    $SQL="SELECT dge.SCHL,dge.SCH_NAME,dge.PER_REGNO, dge.NAME, dge.SEX, dge.DOB,dge.MANAGEMENT,dge.YEAR, dge.MED_IN, dge.UDISE_CODE, dge.REGNO, dge.LAPTOPSERIALNO ,dge.LAPTOPDISTRIBUTIONDATE,
    student_past_12_status.id, student_past_12_status.ac_year, student_past_12_status.class_type, student_past_12_status.result, student_past_12_status.result_other, student_past_12_status.current_status, student_past_12_status.status_other ,laptop_distributed
    FROM ".$tbl." dge LEFT JOIN student_past_12_status ON student_past_12_status.regno = dge.REGNO and student_past_12_status.school_udise_code = ".$school_id."
    WHERE dge.UDISE_CODE =".$school_id."  AND SCHL not in (8888,9999) ORDER BY dge.REGNO ;";
    $query = $this->db->query($SQL);
   // print_r($this->db->last_query());
    return $query->result();
}

function insert_previous_XII_dtls($data)
{
// print_r($data);
$this->db->insert('student_past_12_status', $data);        
$afftectedRows = $this->db->insert_id();
if($afftectedRows > 0){
  return true;
}
else{
  return false;
}
}

function update_previous_XII_dtls($id,$data){
//   $this->db->where('id', $data);      
//   return $this->db->update('student_past_12_status', $data);        
        $this->db->where('student_past_12_status.id',$id);      
        $this->db->update('student_past_12_status',$data);         
        return true;
}
function check_with_exist_regno($reg){
$this->db->from('student_past_12_status');
$this->db->where('regno',$reg);
$result = $this->db->count_all_results();
return $result;
}

  /** Screen Name : Transfer And Promotions -> Students Request Raised 
   *  Purpose     : Students Request Raised Report
   *  Done by     : MR Magesh/ramco.
   *  Controller  : Student/student_request_raised
   */
public function getstudentraised($school_id){
  $sql="select 
     students_child_detail.id,name,name_tamil,aadhaar_uid_number,class_studying_id,	
       student_admitted_section,group_code_id,education_medium_id,students_child_detail.district_id,
     unique_id_no,students_child_detail.school_id,transfer_flag,class_section,request_flag,	
       request_date,request_id,students_school_child_count.school_name,
       sc.school_name as oldschoolname
       from students_child_detail 
       join students_school_child_count on students_school_child_count.school_id=students_child_detail.request_id
       join students_school_child_count as sc ON sc.school_id=students_child_detail.school_id
       where request_flag='1' and students_school_child_count.school_id=".$school_id." ";
       //echo $sql;
       //die();
  $query = $this->db->query($sql);
  return $query->result_array();
}
/** ********* Ends ****** */

/*********************************Start Raise a request ***************************/
function emisraisearequestflag($student_id,$data){

  $this->db->where('unique_id_no', $student_id);
  return  $this->db->update('students_child_detail', $data);
}


function getrequestedstudents($schoolid){
  $this->db->select('b.school_id,a.unique_id_no,a.school_admission_no,a.name,a.dob,a.class_studying_id,b.school_name'); 
  $this->db->from('students_child_detail a');
  $this->db->join('students_school_child_count b','b.school_id = a.request_id');
  $this->db->where('a.school_id',$schoolid);
  $this->db->where('a.transfer_flag',0);
  $this->db->where('a.request_flag','1');
  $this->db->order_by('name','asc');

  $query =  $this->db->get();
  return $query->result();  
}
/*********************************END Raise a request ***************************/
public function student_present_status()
  {    $sql ="select id,child_status from baseapp_osc";
     $query = $this->db->query($sql);
      return $query->result();
  }
   public function baseapp_rte_type()
        {
      $sql= "SELECT  id,category,sub_category FROM baseapp_rte_type";
          $query = $this->db->query($sql);
              return $query->result();
        }
    public function baseapp_differently_abled()
        {
        $sql= "select da_code,da_name from  baseapp_differently_abled";
        $query = $this->db->query($sql);
            return $query->result();
    }
	 public function dropdown_dtls($select,$tname)
  {    
            $this->db->select($select);
            $this->db->from($tname);
            $this->db->where('isactive',1);
            $query =  $this->db->get();
            return $query->result();
    }
	function getscheme_trstse_all($school_id)
  {
    $this->db->select('student_scholor_trstse.id,student_scholor_trstse.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        $this->db->from('student_scholor_trstse');
    $this->db->join('students_child_detail','student_scholor_trstse.student_id = students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_trstse.school_id');
    $this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
     
        $query = $this->db->get();
        $result = $query->result();
        return $result;
  }
   function getsports_list()
  {
    $this->db->select('*');
        $this->db->from('schoolnew_sport_list');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    
  }
  function game_participating_level()
  {
    $this->db->select('*');
        $this->db->from('schoolnew_game_participating_level');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
  }
   public function getClassDetail1($school_id) {
    
        $this->db->select('DISTINCT(schoolnew_section_group.class_id) AS value,schoolnew_section_group.no_of_periods as periods,schoolnew_section_group.section,schoolnew_section_group.id');
        $this->db->from('schoolnew_section_group');
     //$this->db->join('schoolnew_timetable_configuration','schoolnew_section_group.class_id = schoolnew_timetable_configuration.class_id and schoolnew_section_group.school_key_id=schoolnew_timetable_configuration.school_id','LEFT');
        $this->db->where('schoolnew_section_group.school_key_id', $school_id);
    $this->db->group_by('schoolnew_section_group.class_id');
    $this->db->order_by('schoolnew_section_group.class_id');
        $query = $this->db->get();
        $result = $query->result();
     // print_r($this->db->last_query());
        return $result;
       }
	   public function student_ied_benefits()
  {    $sql ="SELECT id, benefit, isactive FROM student_ied_benefits;";
     $query = $this->db->query($sql);
      return $query->result();
  }
	       public function get_classwise_student_details($class_id,$section_id,$school_id)
    {


     $this->db->select('students_child_detail.id,
                        students_child_detail.name,
                        students_child_detail.name_tamil,
                        students_child_detail.name_id_card,
                        students_child_detail.name_tamil_id_card,
                        students_child_detail.aadhaar_uid_number,
                        students_child_detail.gender,
                        students_child_detail.dob,
                        students_child_detail.community_id,
                        students_child_detail.religion_id,
                        students_child_detail.mothertounge_id,
                        students_child_detail.phone_number,
                        students_child_detail.differently_abled,
                        students_child_detail.disadvantaged_group,
                        students_child_detail.subcaste_id,
                        students_child_detail.house_address,
                        students_child_detail.pin_code,
                        students_child_detail.mother_name,
                        students_child_detail.mother_occupation,
                        students_child_detail.father_name,
                        students_child_detail.father_occupation,
                        students_child_detail.student_admitted_section,
                        students_child_detail.group_code_id,
                        students_child_detail.education_medium_id,
                        students_child_detail.district_id,
                        students_child_detail.unique_id_no,
                        students_child_detail.school_id,
                        students_child_detail.transfer_flag,
                        students_child_detail.class_studying_id,
                        baseapp_class_studying.class_studying,
                        students_child_detail.class_section,
                        students_child_detail.school_admission_no,
                        students_child_detail.guardian_name,
                        students_child_detail.parent_income,
                        students_child_detail.street_name,
                        students_child_detail.area_village,
                        students_child_detail.doj,
                        students_child_detail.email,
                        students_child_detail.prv_class_std,
                        students_child_detail.child_admitted_under_reservation,
                        students_child_detail.bloodgroup,
                        students_child_detail.rte_type,students_child_detail.father_qualify, students_child_detail.mother_qualify, students_child_detail.guardian_qualify,
                        schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_district.district_name'); 
     $this->db->from('students_child_detail');
     $this->db->join('baseapp_bloodgroup','baseapp_bloodgroup.id = students_child_detail.bloodgroup','left')
              ->join('baseapp_occupation a','a.id = students_child_detail.father_occupation','left')
              ->join('baseapp_occupation b','b.id = students_child_detail.mother_occupation','left')
              ->join('baseapp_parentincome','baseapp_parentincome.id = students_child_detail.parent_income','left')
              ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
              ->join('schoolnew_district','schoolnew_district.id = students_child_detail.district_id','left')
              ->join('baseapp_religion','baseapp_religion.id = students_child_detail.religion_id','left')
              ->join('baseapp_sub_castes','baseapp_sub_castes.id = students_child_detail.subcaste_id','left')
              ->join('baseapp_class_studying','baseapp_class_studying.id = students_child_detail.class_studying_id','left');
     if(!empty($class_id)){
        $this->db->where('class_studying_id', $class_id); 
          $this->db->where('transfer_flag',0);
     }
     if(!empty($section_id)){
        $this->db->where('class_section', $section_id); 
     }
     if(!empty($school_id)){
        $this->db->where('school_id',$school_id);
     }
     if($class_id == 0)
     {
      $class_id = 12;
       $this->db->where('class_studying_id', $class_id); 
      $this->db->where('transfer_flag',1);
     }
   
     $this->db->order_by('students_child_detail.name', 'ASC');
     $result =  $this->db->get()->result();
    
     return $result;
     

     /*$sql="select * from students_child_detail join schoolnew_section_group on schoolnew_section_group.id=students_child_detail.class_section where class_studying_id=".$class_id." and class_section=".$section_id." and school_id=".$school_id." and transfer_flag=0";
     $query = $this->db->query($sql);
     return $query->result_array(); */
    }
   public function getscheme_search_stud1($records){	
   if($records['class_id'] == 0)
   {
    $transfer_flag =1;
   }
   else 
   {
    $transfer_flag =0;
   }	

      $sql="select students_child_detail.id as stu_id,students_child_detail.unique_id_no,students_child_detail.name,
      students_child_detail.gender,students_child_detail.differently_abled,child_admitted_under_reservation as rte,
      rte_type,students_child_detail.class_section,students_child_detail.class_studying_id,baseapp_rte_type.id ,da_name ,
      baseapp_rte_type.category,sub_category,trstse as trstse_exam_passed, nmmsexam_passed as nmms_exam_passed, inspire as inspire_award_date,
      remarks as inspire_award_topic,school_type_id,game_participating as participating_game_name,
      last_participating_date as participating_date,last_participating_level as participating_level,
      winner_level_details as winner_level
      ,students_ied.benefit,students_ied.differently_type as cwsn,students_ied.provided_by,students_ied.national_id as nation_id,
      students_ied.acad_year as academic_year,present_status,training_type,students_osc.ac_year,nsqf_sector as sector,nsq_job_role as role
      from students_child_detail 
	  left join baseapp_differently_abled on baseapp_differently_abled.da_code=students_child_detail.differently_abled 
	  left join baseapp_rte_type on baseapp_rte_type.id = students_child_detail.rte_type 
	  join students_school_child_count on students_school_child_count.school_id = students_child_detail.school_id
left join student_scholor_nmms on student_scholor_nmms.school_id = students_child_detail.school_id and student_scholor_nmms.student_id = students_child_detail.unique_id_no
left join student_scholor_sports_participation on student_scholor_sports_participation.school_id = students_child_detail.school_id and student_scholor_sports_participation.student_id = students_child_detail.unique_id_no
left join students_ied on students_ied.school_id = students_child_detail.school_id and students_ied.student_id = students_child_detail.unique_id_no
left join students_osc on students_osc.school_id = students_child_detail.school_id and students_osc.unique_id_no = students_child_detail.unique_id_no
left join student_vocational on student_vocational.school_key_id = students_child_detail.school_id and student_vocational.unique_id_no = students_child_detail.unique_id_no
where students_child_detail.school_id =".$records['school_id']."  and students_child_detail.unique_id_no=".$records['student_id']."  and transfer_flag =$transfer_flag";
		$query = $this->db->query($sql);
      return $query->result_array();
	
  
    }
	  /*
      * Attendance Section wise
      * VIT-Tamilmaran
      * 31/dec/2019
      **/

      public function get_attendance_sectionwise_details($school_id,$class_id,$section_id,$table,$date)
      {
 
      // print_r($school_id);
	  // print_r($class_id);print_r($section_id);print_r($table);print_r($date);
	 // die();
       $date = date('Y-m-d',strtotime($date));
 
                $this->db->select('name,unique_id_no,class_section,gender');
               $this->db->from('students_child_detail');
               $this->db->where('school_id',$school_id);
               $this->db->where('transfer_flag',0);
               $this->db->where('class_studying_id',$class_id);
               $this->db->where('class_section',$section_id);
               $result = $this->db->get()->result();
               if(!empty($result)){
               $current_month_days = date('t',strtotime($date));
                       $month_year = date('Y-m',strtotime($date));
                       // echo $month_year;die;
                       $abse_list = [];
                       $absent_list = [];
                       $old_unique_id = '';
                       for($i=1;$i<=$current_month_days;$i++){
                         $date = date('Y-m-d',strtotime($month_year.'-'.$i));
 
               $abse[$i] = $this->get_attendance_sectionwise_name($date,$table,$school_id,$class_id,$section_id);
 
             
                 foreach($result as $index=>$class_det)
                     {
                       $absent_list[$index]['name'] = $class_det->name;
                                 $absent_list[$index]['section'] = $class_det->class_section; 
                                 $absent_list[$index]['unique_id'] = $class_det->unique_id_no;
                                 $absent_list[$index]['gender'] = $class_det->gender;
                     
 
                 if($abse[$i] !='')
                 {
                         // echo $i.'<br/>';
                   $abse_list = $abse[$i];
                   
                        
                   if($abse_list->session1_allA !=0){
                     
                     $abs_name =  explode(",",$abse_list->session1_students);
                       // print_r($abse[$i]);
 
                     
                       foreach($abs_name as $aindex=>$abs)
                       {
                                
                           if($class_det->unique_id_no == $abs)
                           {
                                 
                                 $absent_list[$index][$i]= "0";
                                 
                                 $status = 0;
                                 $old_unique_id = $abs;
                             // echo $i."if<br/>";
 
                                 // echo ($abs=='3302010011300241');
                           } 
                       }
                       if($old_unique_id !=$class_det->unique_id_no)
                           { 
                             
                             // echo"if";
 
                                  
 
                                 $absent_temp= "1";
                                 
                                 
                                 $absent_list[$index][$i]= $absent_temp;
                           }
                     }else
                     {
                        $absent_temp= "1";
                                 
                                 
                                 $absent_list[$index][$i]= $absent_temp;
                     }
                         
                   }else
                   {
                     $absent_list[$index][$i] = '-1'; 
                   }
 
                 }
                 // $absent_list[$i] = $absent_list;
               }
             }
             // echo"<pre>";print_r($absent_list);echo"</pre>";die;
            
 
                      
                       
         return $absent_list;die;
 
 
 
               }
			    public function get_attendance_sectionwise_name($date,$table,$school_id,$class,$section)
          {

              
            $this->db->select('session1_students,st_section,session1_allA,date');
            $this->db->from($table);
            $this->db->where('date',$date);
            $this->db->where('school_id',$school_id); 
              $this->db->where('st_class',$class);
              $this->db->where('st_section',$section);
              $this->db->group_by('st_section');

              // print_r($this->db->last_query());
              return $this->db->get()->first_row();
              
              
          }
		  public function studchild_stud_tagging_rte($data)
		  {
			
			   $res = $this->db->get_where('students_child_detail',array('school_id'=>$data['school_id'],'unique_id_no'=>$data['unique_id_no']))->first_row();
			
		     if(!empty($res))
		     {

                  $insert_array=array('user_id'=>$data['unique_id_no'],'field_id' =>$data['field_id'],'user_id'=>$data['user_id'],'old_field_value'=>$data['old_field_value'],'approval_status'=>$data['approval_status'],'approval_flag'=>$data['approval_flag'],'approving_authority_type'=>$data['approving_authority_type'],'new_field_value'=>$data['child_admitted_under_reservation']);
                $this->db->trans_start();
                $this->db->insert('db_field_approval_log',$insert_array);
              
                // $this->db->where(array('unique_id_no'=>$data['unique_id_no'],'school_id'=>$data['school_id']));
                // $this->db->update('students_child_detail',$data);
                $affectedRows=$this->db->affected_rows();
                $this->db->trans_complete();            
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
              
		      }else{	
                $result = array( 'message' => 'There is No Student Details to update',
                                 'dataStatus' => false );
          }
          return $result;
		 }
		 public function studsch_stud_taggingied($data)
		{
      // print_r($data);
			$res = $this->db->get_where('students_ied',array('school_id'=>$data['school_id'],'student_id'=>$data['student_id']))->first_row();
			 
		 if(!empty($res))
		 {
        $this->db->trans_start();
		    $this->db->where(array('student_id'=>$data['student_id'],'school_id'=>$data['school_id']));
        $this->db->update('students_ied',$data);
        $affectedRows=$this->db->affected_rows();
        $this->db->trans_complete();            
		 }else
		 {
        
        $this->db->trans_start();
        $this->db->insert('students_ied',$data);
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
    
		   public function studsch_stud_tagging($data)
		{
          $this->db->insert('student_scholor_nmms',$data); 
         return $this->db->insert_id(); 
           
		 if(!empty($result))
		 {
			 
				
		    $this->db->where(array('student_id'=>$data['student_id'],'school_id'=>$data['school_id']));
			
	      	$this->db->update('student_scholor_nmms',$data);

			return $data['school_id'];

		 }else
		 {
				
			$this->db->insert('student_scholor_nmms',$data);
			return $this->db->insert_id();
		 }
				 
    }
    function insert_student_participate($savestudent_participate)
	{
	 $this->db->insert('student_scholor_sports_participation',$savestudent_participate); 
     return $this->db->insert_id();	
  }
  function insert_student_osc($save_OSC)
  {
   $this->db->insert('students_osc',$save_OSC); 
     return $this->db->insert_id(); 
  }
  public function stud_vocation_dtl($data)
  {
  
  $this->db->select('student_vocational.id');//get id
  $this->db->from('student_vocational'); //table name
  $this->db->where('student_vocational.school_key_id',$data['school_key_id']);//in which schoolid row want to inactive
  $this->db->where('student_vocational.unique_id_no',$data['unique_id_no']); //get studentid datas along with schoolid
  $this->db->where('student_vocational.isactive', 1); //get active datas along with student and schoolid
  $res = $this->db->get()->first_row();
  
  if(!empty($res))
  {
    $this->db->trans_start();
    $this->db->where(array('school_key_id'=>$data['school_key_id'],'unique_id_no'=>$data['unique_id_no']));
    $this->db->update('student_vocational',$data);
    $affectedRows=$this->db->affected_rows();
    $this->db->trans_complete();            
  }
  else{
    $this->db->trans_start();
    $this->db->insert('student_vocational',$data);
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
  // $this->db->insert('student_vocational',$data);
  // return $this->db->insert_id();
  
  }
  
  /*****************************************************************
	 Ramoc Magesh Invalide aadhar & phonenumber
   *****************************************************************/
   
    public function student_invalidaadharnocount($school_id){
		$sql="select unique_id_no,school_id,aadhaar_uid_number,sum(((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12))) as cnt from students_child_detail where school_id=".$school_id." and  transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12));";
		$query = $this->db->query($sql);
		if($query==null){
			return 0;
        }else{
			return $query->result_array();
		}
    }
  
	public function student_invalidaadharno_list($school_id){
		$sql="select id,name,aadhaar_uid_number,gender,dob,phone_number,class_studying_id,class_section,school_id,unique_id_no from students_child_detail where school_id=".$school_id." and transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12)) GROUP BY unique_id_no;";
		$query = $this->db->query($sql);
		if($query==null){
			return null;
        }else{
			return $query->result_array();
		}
    }

	public function student_invalidphnno_count($school_id){
		$sql="select sum((length(phone_number)<>10 or left(phone_number,1)<6)) as cnt from students_child_detail where transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and phone_number=null and school_id=".$school_id.";";
		$query = $this->db->query($sql);
		return $query->result_array();
		
    }
 
	public function student_invalidphnno_list($school_id){
		$sql="select id,name,aadhaar_uid_number,gender,dob,phone_number,class_studying_id,class_section,school_id,unique_id_no  from students_child_detail where transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and school_id=".$school_id.";";
		$query = $this->db->query($sql);
		if($query==null){
			return null;
        }else{
			return $query->result_array();
		}
    }
    
  /***********************************************************
      Student Aadhar updation
  ************************************************************/
	public function studentaadharupdate($data,$studentid){
		//print_r($data);die();
		$this->db->where('unique_id_no', $studentid);
		return $this->db->update('students_child_detail', $data);
	}
	
	public function studentphoneupdate($data,$studentid){
		//print_r($data);die();
		$this->db->where('unique_id_no', $studentid);
		return $this->db->update('students_child_detail', $data);
	}
  
	public function get_aadhar($aadhar) {
        $SQL = 'select unique_id_no,name,aadhaar_uid_number,school_id from students_child_detail where aadhaar_uid_number='.$aadhar.' limit 1';
        $query = $this->db->query($SQL);
        if($query==null){
			return null;
		}else{
			return $query->result();
		}
    }
	
    function insert_promote_history($data)
    {
     $this->db->insert('students_promote_history',$data); 
     return $this->db->insert_id(); 
    }

    public function get_districtid()
    {
      $this->db->select('id,district_code,district_name');
      $this->db->from('schoolnew_district');
      $query =  $this->db->get();
      return $query->result();
    }

    public function get_stu_raise_request($dist_id)
    {
        $this->db->select('students_child_detail.name,students_child_detail.unique_id_no,students_child_detail.dob,students_child_detail.class_studying_id,students_child_detail.class_section,students_child_detail.request_date,b.school_name as old_school,b.school_id as old_school_id,b.udise_code as old_school_code,students_child_detail.request_id,c.udise_code as request_school_code,c.school_name,c.school_id,students_child_detail.education_medium_id,students_child_detail.school_admission_no') 
        ->from('students_child_detail')
        ->join('students_school_child_count b','b.school_id=students_child_detail.school_id')
        ->join('students_school_child_count c','c.school_id=students_child_detail.request_id')
        ->where('b.district_id',$dist_id)
        ->where('students_child_detail.request_flag','1')
        ->where('students_child_detail.request_date >','2019-03-01')
        ->order_by('students_child_detail.request_date','DESC');
        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;

    }

    /**Student Absentees in exam api by wesley**/
      function stud_abs_chk($tname,$reg_no){
          $this->db->select('name,subject_name,school_name,center_name,mobile1,mobile1_name,mobile1_relation,mobile2,mobile2_name,mobile2_relation,mobile3,mobile3_name,mobile3_relation,address,pincode,landmark,district,exam_yn,transport_yn');
              $this->db->from($tname);
              $this->db->where('regno',$reg_no);
              $query = $this->db->get();
              //print_r($this->db->last_query());die();
              $result = $query->result_array();
              return $result;
      }

      function stud_response_on_exam($tname,$records){
         $reg_no = $records['reg_no'];
         unset($records['reg_no']);
        // $this->db->select('regno,center_name,mobile1,mobile1_name,mobile1_relation,mobile2,mobile2_name,mobile2_relation,mobile3,mobile3_name,mobile3_relation,address,pincode,landmark,district,exam_yn,transport_yn');
        // $where = "mobile1 is  NOT NULL and mobile1 !='' and mobile1_name is  NOT NULL and mobile1_name !='' and mobile1_relation is  NOT NULL and mobile1_relation !='' and mobile2 is  NOT NULL and mobile2 !='' and mobile2_name is  NOT NULL and mobile2_name !='' and mobile2_relation is  NOT NULL and mobile2_relation !='' and mobile3 is  NOT NULL and mobile3 !='' and mobile3_name is  NOT NULL and mobile3_name !='' and mobile3_relation is  NOT NULL and mobile3_relation !='' and address is  NOT NULL
        // and address !='' and pincode is  NOT NULL and pincode !='' and landmark is  NOT NULL and landmark !='' and exam_yn is  NOT NULL and exam_yn !='' and transport_yn is NOT NULL and transport_yn !=''";
        // $this->db->where($where);
        // $this->db->where('regno',$reg_no);
        // $query = $this->db->get($tname);
        // $result = $query->result_array();
        if(!empty($records)){ /**Data Present Already**/
        //      $result['status'] = "1";
        //      return $result;
        // }else{ /**Data Inserted Newly**/
             $this->db->where('regno', $reg_no);    
             $this->db->update($tname, $records);
             $result = $this->db->affected_rows();
             //$result['status'] = "0";
             //print_r($result);die();
             return $result; 
             //
        }
             
      }

    
    function stud_abs_chk_tenth($tname,$roll_no){
      /**subject_name*/
      $this->db->select('NAME,SCHOOL_NAME,Main_CENTRE_NAME,type,unique_id_no,student_id,same_city_yn,containment_yn,epass_yn,epass_id,transport_mode,transport_yn,mobile1,mobile1_name,mobile1_relation,mobile2,mobile2_name,mobile2_relation,mobile3,mobile3_name,mobile3_relation,address,pincode,landmark,district,teacher_assigned,teacher_id,teacher_phone');
          $this->db->from($tname);
          $this->db->where('ROLLNO',$roll_no);
          $query = $this->db->get();
          //print_r($this->db->last_query());die();
          $result = $query->result_array();
          return $result;
    } 
    
    function stud_id_validtn($tname,$stu_id){

      $class_stud_id = array(10,11,12);
      $this->db->select('id as student_id,unique_id_no');
          $this->db->from($tname);
          $this->db->where('unique_id_no',$stu_id);
          $this->db->where_in('class_studying_id',$class_stud_id);
          $query = $this->db->get();
          //print_r($this->db->last_query());die();
          $result = $query->result_array();
          if(!empty($result)){
            $data['result'] = $result;
            $data['status'] = true;
            return $data;
          }else{
            $data['stata'] = false;
            return $data; 
          }
          
    } 

    function stud_response_on_exam_tenth($tname,$records){
      $roll_no = $records['roll_no'];
      unset($records['roll_no']);
     // $this->db->select('regno,center_name,mobile1,mobile1_name,mobile1_relation,mobile2,mobile2_name,mobile2_relation,mobile3,mobile3_name,mobile3_relation,address,pincode,landmark,district,exam_yn,transport_yn');
     // $where = "mobile1 is  NOT NULL and mobile1 !='' and mobile1_name is  NOT NULL and mobile1_name !='' and mobile1_relation is  NOT NULL and mobile1_relation !='' and mobile2 is  NOT NULL and mobile2 !='' and mobile2_name is  NOT NULL and mobile2_name !='' and mobile2_relation is  NOT NULL and mobile2_relation !='' and mobile3 is  NOT NULL and mobile3 !='' and mobile3_name is  NOT NULL and mobile3_name !='' and mobile3_relation is  NOT NULL and mobile3_relation !='' and address is  NOT NULL
     // and address !='' and pincode is  NOT NULL and pincode !='' and landmark is  NOT NULL and landmark !='' and exam_yn is  NOT NULL and exam_yn !='' and transport_yn is NOT NULL and transport_yn !=''";
     // $this->db->where($where);
     // $this->db->where('regno',$reg_no);
     // $query = $this->db->get($tname);
     // $result = $query->result_array();
     if(!empty($records)){ /**Data Present Already**/
     //      $result['status'] = "1";
     //      return $result;
     // }else{ /**Data Inserted Newly**/
          $this->db->where('ROLLNO', $roll_no);    
          $this->db->update($tname, $records);
          $result = $this->db->affected_rows();
          //$result['status'] = "0";
          //print_r($result);die();
          return $result; 
          //
     }
          
   }

      function IED_std_report($dist_id,$blck_id,$udise_code,$school_type)
      {

        if($udise_code!="")
        {
          $query="select scd.id,scd.unique_id_no,scd.name,scd.class_studying_id,d.da_name,d.da_code,i.disable_percentage,i.nid,i.udid,
case when i.support_in = 1 then 'School'
when i.support_in = 2 then 'SRP Center'
when i.support_in = 3 then 'Home Based'
end as Supported_in,
case when scd.transfer_flag = 0 then 'School'
else 'Common Pool'
end as EMIS_location
from students_school_child_count sc
join students_child_detail scd on scd.school_id = sc.school_id
left join students_ied_details i on i.student_id = scd.id
left join baseapp_differently_abled d on d.da_code = scd.differently_abled
where sc.udise_code = $udise_code and scd.differently_abled in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22) order by scd.class_studying_id,scd.name";
$return_value =  $this->db->query($query);
     return $return_value->result_array();

        }
   
        if($dist_id=="")
        {
          $select = "sc.district_name,sc.district_id,"; 
          $where="";
          $group="group by sc.district_name order by sc.district_name"; 
        }
        if($dist_id!="")
        {
         $select="sc.block_name,sc.block_id,";
         $where="and sc.district_id = $dist_id";
         $group = "group by sc.block_name order by sc.block_name";
        }
        if($blck_id!="")
        {
         $where="and sc.block_id =  $blck_id"; 
         $select="sc.udise_code, sc.school_name, sc.cate_type,";
         $group = "group by sc.udise_code order by sc.school_name";
        }
         $query ="select $select sum(case when scd.transfer_flag = 0 then 1 else 0 end)  as CWSN_Student_in_school,
sum(case when scd.transfer_flag = 1 then 1 else 0 end) as CWSN_CP,
sum(case when i.support_in = 1 then 1 else 0 end) as School,
sum(case when i.support_in = 2 then 1 else 0 end) as SRP_Center,
sum(case when i.support_in = 3 then 1 else 0 end) as Home_Based,
sum(case when i.nid_yn =1 then 1 else 0 end) as NID,
sum(case when i.udid_yn = 1 then 1 else 0 end) as UDID,
sum(case when i.account_yn = 1 then 1 else 0 end) as Account_Number
from students_school_child_count sc
join students_child_detail scd on scd.school_id = sc.school_id
left join students_ied_details i on i.student_id = scd.id
where scd.differently_abled in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22) and sc.school_type_id in ($school_type) $where $group";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
       
     //print_r($this->db->last_query());die();
     
      }
      function edit_IED_std($records)
      {
         $id = $records['id'];

        $std_child_det = array('differently_abled'=> $records['differently_abled']);

        $std_ied_det =array('identified_date'=> $records['identified_date'],'student_id'=> $records['id'],'nid_yn'=>$records['nid_yn'],'nid'=>$records['nid'],'udid_yn'=>$records['udid_yn'],'udid'=>$records['udid'],'disable_percentage'=>$records['disable_percentage'],'training_type'=>$records['training_type'],'account_yn'=>$records['account_yn'],'transfer_mode'=>$records['transfer_mode'],'support_in'=>$records['support_in'],'mainstream_date'=>$records['mainstream_date'],'mainstream_yn'=>$records['mainstream_yn'],'med_board_certi_yn'=>$records['med_board_certi_yn']);

        $std_bank_acc = array('student_id'=> $records['id'],'branch_id'=>$records['branch_id'],'account_no'=>$records['account_no'],'bank_id'=>$records['bank_id']);


        if($records['id'] !='')
        { 
      $query1 ="select id from students_child_detail where id=$id";
      $return_value1 = $this->db->query($query1);
        $result1 = $return_value1->result_array();
     
        $query2 ="select student_id from students_ied_details where student_id=$id";
      $return_value2 = $this->db->query($query2);
      $result2 = $return_value2->result_array();
   
        $query3 ="select student_id from students_bank_acc where student_id=$id";
      $return_value3 = $this->db->query($query3);
        $result3 = $return_value3->result_array();
      
    
        if(!empty($result1))
        {
          
          $this->db->where('id',$id);
          $update_std_child_det=$this->db->update('students_child_detail',$std_child_det);
          

        }
        else
        {
          
          $insert_std_child_det=$this->db->insert('students_child_detail',$std_child_det);
          
        }
        if(!empty($result2))
        {

           $this->db->where('student_id',$id);
          $update_students_ied_details=$this->db->update('students_ied_details',$std_ied_det);
          
        }
        else
        {
          $insert_students_ied_details=$this->db->insert('students_ied_details',$std_ied_det);
          
        }
        if(!empty($result3))
         {
           $this->db->where('student_id',$id);
           $update_students_bank_acc=$this->db->update('students_bank_acc',$std_bank_acc);
            
         }
         else
         {
            $inert_students_bank_acc=$this->db->insert('students_bank_acc',$std_bank_acc);
             
         }

       
        return true;
        }
      }
      public function diff_able()
      {
        $query = "select * from baseapp_differently_abled";
        $return_value =  $this->db->query($query);
        return $return_value->result_array();
      }

  function bank_retreive_details($data)
  {
      
      
      $query = "select id,bank_id,bank_name,branch from schoolnew_branch where ifsc_code='".$data."'";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
      //print_r($this->db->last_query());
 }
 function get_ied_student($id)
 {
   
   $query = "select i.student_id,i.identified_date,i.nid_yn,i.nid,i.udid_yn,i.udid,i.disable_percentage,i.training_type,i.account_yn,i.transfer_mode,i.support_in,i.mainstream_date,i.mainstream_yn,i.med_board_certi_yn, c.differently_abled,a.branch_id,a.account_no,a.bank_id from students_ied_details i left join students_child_detail c ON c.id=i.student_id left join students_bank_acc a ON a.student_id=i.student_id where i.student_id=$id and isactive=1";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
 }
     
  /**Student Absentees in exam api by wesley**/

  function students_club_participation($schID)
 {
   
   $SQL = "select scd.unique_id_no as EMIS_ID, scd.name as StudName,c.class_studying_id as Class,
            case when c.participate_type_id = 1 then 'Clubs'
            else 'Other' end as ParticipationIn,
            case 
            when c.participate_subtype_id =1 then 'Eco Club'
            when c.participate_subtype_id =2 then 'NSS'
            when c.participate_subtype_id =3 then 'JRC'
            when c.participate_subtype_id =1 then 'NSS'
            end as Detail,
            c.acyear as AcademicYr from students_club_participation c 
            join students_child_detail scd on scd.id = c.student_id
            where c.school_id = ".$schID;
            $result =  $this->db->query($SQL);
            return $result->result_array();
          }


   function Save_Tracking_details($records,$id)
   {
  
   $SQL = "select student_id from students_covid_benefit_tracking where id =$id";
            $result =  $this->db->query($SQL);
             $result_value= $result->result_array();

       

    if(!empty($result_value))
   {
           // $params=array('student_id'=> $records['student_id'],'benefit_type'=> $records['benefit_type'],'distribute_date'=> $records['distribute_date'],'term'=>$records['term']);
           // $this->db->where('student_id',$student_id);
           //  $this->db->where('id',$id);
           // $update_tracking=$this->db->update('students_covid_benefit_tracking',$params);

           // return $update_tracking;
        //print_r($records);die();
        // $SQL = "select student_id from students_covid_benefit_tracking where student_id = ".$records['student_id'];
        //           $result =  $this->db->query($SQL);
        //           $result_value= $result->result_array();

        //if(!empty($result_value)){
      
              $params=array('student_id'=> $records['student_id'],'benefit_type'=> $records['benefit_type'],'distribute_date'=> $records['distribute_date'],'term'=>$records['term']);
                $this->db->where('id',$id);
              $update_tracking=$this->db->update('students_covid_benefit_tracking',$params);
              //print_r($this->db->last_query());die();
              return $update_tracking;                
        
        // else{
            
        //       $insert_tracking=$this->db->insert('students_covid_benefit_tracking',$records);
        //       return $insert_tracking;
        // }
   }
   } 
   function Student_Tracking_details($student_id)
   {

    if(!empty($student_id))
    {
            $SQL = "select * from students_covid_benefit_tracking where isactive=1 and student_id=$student_id";
            $result =  $this->db->query($SQL);
           
            return $result->result_array();   

    }
   }
   function Benefit_List_details($id)
   {
    if(!empty($id))
    {
            $SQL = "select * from students_covid_benefit_tracking where isactive=0 and id= $id";
            $result =  $this->db->query($SQL);
            return $result->result_array();   

    }
   }
   function insert_students_covid_benefit_tracking($details) {
      $this->db->trans_start();
      $this->db->insert_batch('students_covid_benefit_tracking',$details);
      $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();       
      // return $affectedRows;
      if ($this->db->trans_status() === false) {
        $result = 'Fail to Update the Details. Try again !' ;
    } else if ($this->db->trans_status() === true) {
           if($affectedRows > 0 ) {
                $result = 'Benefit Details Updated - affectedRows '.$affectedRows;
           } else {
                $result = 'Haven`t Update Anything. Try again !';
           }
    } else{
        $result = 'Sorry, Something Went Wrong. Try again !';
    }
    return $result;
   }
function delete_students_covid_benefit_tracking($StudentID){
  $this->db->trans_start();
  $this->db->where('student_id', $StudentID);
  $this->db->delete('students_covid_benefit_tracking'); 
  $affectedRows=$this->db->affected_rows();
  $this->db->trans_complete();            
  if ($this->db->trans_status() === false) { $message = 'StudentId Not Found!';
  } else if ($this->db->trans_status() === true) {
       if($affectedRows > 0 ) {
       $message = 'Successfully Deleted Existing Records - DeletedRows '.$affectedRows;
       } else {
       $message = 'There is No Records to Delete!.';
       }
  }
  else{
       $message = 'Fail To Delete Try Again!.';
  }
  return $message;
}
          function update_students_covid_school_map($id,$records){
            
            $this->db->trans_start();
            if($id != ''){
              $this->db->where('id',$id);
              $this->db->update('students_covid_school_map',$records);
            }else{ $records['created_date'] = date('Y-m-d');$this->db->insert('students_covid_school_map',$records);}
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();       

            if ($this->db->trans_status() === false) {
                $result = array( 'message' => 'Fail to Update the Details. Try again !','dataStatus' => false );
            } else if ($this->db->trans_status() === true) {
                   if($affectedRows > 0 ) {
                        $result = array( 'message' => 'Successfully Updated !','dataStatus' => true );
                   } else {
                        $result = array( 'message' => 'Haven`t Update Anything. Try again !','dataStatus' => false );
                   }
            } else{
                $result = array( 'message' => 'Something Went Wrong. Try again !','dataStatus' => false );
            }
            return $result;  
          }
          public function dcapproval($students_child_detail,$admit_log){
            $childArr = array('transfer_flag'=>$students_child_detail['transfer_flag']);
            $this->db->where('id',$students_child_detail['index_id']);
            $this->db->update('students_child_detail',$childArr);
            $affectedRows=$this->db->affected_rows();
            if($affectedRows > 0 ) {      
              if(!empty($admit_log)){
                $d['student_id'] = $students_child_detail['index_id'];
                $d['school_id'] = $admit_log['schl_id'];
                $d['class'] = $admit_log['class'];
                $d['section'] = $admit_log['sec'];
                $d['student_name'] = $admit_log['stud_name'];
                $d['admitted_date'] = $admit_log['admt_date'];
                $d['status'] = $admit_log['admison_status'];
                $d['remarks'] = $admit_log['remrks'];
                $this->db->insert('students_admit_log',$d); 
                $affectRows=$this->db->affected_rows();
                if($affectRows > 0 ) { return true; }else{ return false; }
              }else{ return false; }
            }else{ return false; }
          }        

          public function dcstuddetails($dist){
            //  $this->db->select('students_school_child_count.udise_code as udise_code,
            //                    students_admit_log.school_id as schl_id,
            //                    students_school_child_count.school_name as schl_name,
            //                    students_admit_log.student_id as stud_id,
            //                    students_admit_log.student_name as stud_name,
            //                    students_admit_log.class as class,
            //                    students_admit_log.section as sec,                   
            //                    basetbl.aadhaar_uid_number,
            //                    basetbl.phone_number,
            //                    students_admit_log.admitted_date as admt_date,
            //                    students_admit_log.status as admison_status,
            //                    students_admit_log.remarks as remrks'); 
            //   $this->db->from('students_admit_log');
            //   $this->db->join('students_child_detail basetbl','basetbl.id = students_admit_log.student_id and basetbl.transfer_flag = students_admit_log.status','left');
            //   $this->db->join('students_school_child_count','students_school_child_count.school_id = students_admit_log.school_id','left');
            //   $this->db->where('students_admit_log.id','select max(al.id) from students_admit_log al where al.student_id = students_admit_log.student_id');
            //   if($dist!=''){$this->db->where('students_school_child_count.district_id',$dist);}
            //   $this->db->order_by('students_admit_log.student_id','DESC');
            //   $result =  $this->db->get()->result();
            //   return $result;
            if($dist!=''){$wh =  'and c.district_id = '.$dist; }else{ $wh = ''; }
            $qry = "select c.udise_code as udise_code, c.block_name as block_name, c.school_name as schl_name, a.school_id as schl_id, a.student_id as stud_id,a.student_name as stud_name, a.class as class, a.section as `sec`, `a`.`admitted_date` as `admt_date`, `a`.`status` as `admison_status`, `a`.`remarks` as `remrks`,`b`.`aadhaar_uid_number`, `b`.`phone_number` from students_admit_log a left join students_child_detail b on b.id = a.student_id and b.transfer_flag = a.status left join students_school_child_count c ON c.school_id = a.school_id where a.id = (select max(al.id) from students_admit_log al where al.student_id = a.student_id) ".$wh." order by a.student_id";
            $result =  $this->db->query($qry);
            return $result->result();
          }
          public function student_volunteersave($data) {
            if($data['id'] !=''){
              $up=$this->db->update('students_non_formal', $data, "id = ".$data['id']);
              unset($data['created_date']);
              unset($data['id']);
              $up=$this->db->insert('students_non_formal_log', $data, "id = ".$data['id']);
              return $up;
            } else {
              $test = $this->db->insert('students_non_formal',$data);
              if(!empty($test)){
                return 1;
              } else {
                return 0;
              }
            }
          }
          public function get_student_volunteer($school_id){
            $SQL="select students_non_formal.id as IndxID,school_id as SchlID,student_name as StudNam,students_non_formal.gender as Gendr,da_type as Disability,parent_type as ParentType,parent_name as ParentName,mother_tongue as MotherTongue,academic_qualify as AcademicQualify,students_non_formal.aadhar_no as Aadhar,mobile as Mobile,students_non_formal.social_category as SocialCategory,address as Address,pincode as Pincode,district_id as DistrictId,native_district_id as NativeDistrictId,dob as DOB,doj as DOJ, students_non_formal.age as AGE, students_non_formal.active as Status,students_non_formal.primer as BookIssued, volunteer_id as VolunteerId, teacher_volunteers.teacher_name as TeacherName from students_non_formal 
            left join teacher_volunteers on teacher_volunteers.id = students_non_formal.volunteer_id
            where school_id = $school_id and students_non_formal.active =1";
            $query = $this->db->query($SQL);
            return $query->result_array();
          }
          public function get_student_field_list()
          {
             $SQL="select * from db_field_approval where user_type='SCHL'";
            $query = $this->db->query($SQL);
            return $query->result_array();
          }
          public function get_volunter_student_teacher_list($school_id)
          {
             $SQL="SELECT id as VoluntrID, teacher_name as TeachNam FROM teacher_volunteers WHERE school_key_id = $school_id AND Active = 1";
            $query = $this->db->query($SQL);
            return $query->result_array();
            
          }
           public function get_assigned_std_list($school_id)
          {
             $SQL="select std.id as IndxID,std.student_name as StudName,std.volunteer_id as VoluntrID,teach.teacher_name as TeachName from students_non_formal std join teacher_volunteers teach ON teach.id = std.volunteer_id where std.school_id=$school_id";
            $query = $this->db->query($SQL);
            return $query->result_array();
          }
          public function save_volunter_student_teacher_list($update_data)
          {
                    
            for($i=0;$i<count($update_data);$i++)
            {

                $this->db->where('id',$update_data[$i]['id']);
                $this->db->update('students_non_formal', $update_data[$i]);
                 $affectedRows=$this->db->affected_rows();
               }
            if($affectedRows > 0 )
             {      
              return 1;
             }
             else {
              return 0;
             }
            }

// public function save_req_raise($rec){
  
// }
            public function save_inspection_report($rec){


              $records_get = array('id'=>$rec[0]['IndxID'],
              'school_id' => $rec[0]['SchlID'],
              'volunteer_id' => $rec[0]['VoluntrID'],
              'emis_usertype' => $rec[0]['UserType'],
              'emis_user_id' => $rec[0]['UserID'],
              'emis_username' => $rec[0]['UserName'],
              'guidebook_issued' => $rec[0]['GuideIssued'],
              'learners_enroled' => $rec[0]['LearnrEnroled'],
              'primers_available' => $rec[0]['PrimrAvail'],
              'primers_all' => $rec[0]['PrimrAll'],
              'chapter_taught' => $rec[0]['ChptrTaught'],
              'learners_assessment_attended' => $rec[0]['LearnrsAssmntAtnded'],
              'learners_assessment_passed' => $rec[0]['LeanrsAssmntPassd'],
              'latitude' => $rec[0]['Lat'],
              'longitude' => $rec[0]['Long'],
              'visit_date_time' => $rec[0]['VisitDateTime'],
              'photo1' => $rec[0]['Pht1'],
              'photo2' => $rec[0]['Pht2'],
              'photo3' => $rec[0]['Pht3'],
              'quality' => $rec[0]['Qualty'],
              'motivation' => $rec[0]['Motivatn'],
              'remarks' => $rec[0]['Remarks'],
              'isactive' => $rec[0]['Stats'],
              'created_at'   => date('Y-m-d H:i:s')
            );
            
             if(!empty($records_get['id']))
             {
               $this->db->where('id',$records_get['id']);
                $this->db->update('schoolnew_non_formal_inspection', $records_get);
                 $affectedRows=$this->db->affected_rows();  
                
              if($affectedRows > 0 )
             {      
              
               $message = 'Updated';
               return $message;
             }
             else {
             
               $message = '';
                return $message;
             }
             }
             else
             {
              $affectedRows = $this->db->insert('schoolnew_non_formal_inspection',$records_get);
                
             if($affectedRows > 0 )
             {      
              
               $message = 'Inserted';
               return $message;
             }
             else {
               $message = '';
               return $message;
             }


             }
            }
            
            
  public function get_Student_details($UserId)  
  {
   
    $SQL="select id as IndxID,name as Name,aadhaar_uid_number as AadharID,school_id as SchlID,unique_id_no as Uniq_ID_no from students_child_detail where user_id =$UserId";
    $query = $this->db->query($SQL);
    return $query->result_array();
           
  }
  public function get_volunteer_Attent($emis_username,$emis_usertype)
  {
    $current_date =date("Y-m-d");
    $SQL="select schl_count.school_id as SchoolId,std.student_name as StdName, std.gender as Gender,std.mobile as Mobile, 
    std.id as StudId, reg.teacher_name as HMName,reg.mbl_nmbr as HMMobile,
     schl_count.school_name as SchName,  
    tv.teacher_name as VolunteerName,tv.mbl_nmbr as VolunteerMobil,
    tv.gender as VolunteerGender,(case when att.students_listA !=0 then att.students_listA else 0 end)as StudentAbsentList,att.emis_username
    from emisuser_teacher et
    inner join teacher_volunteers tv on et.emis_user_id =tv.id 
    LEFT join udise_staffreg reg  ON reg.school_key_id = tv.school_key_id  and reg.teacher_type IN(26,27,28,29) and reg.archive=1
    JOIN students_non_formal std ON std.volunteer_id = tv.id  and std.school_id =tv.school_key_id 
    JOIN students_school_child_count schl_count ON schl_count.school_id =tv.school_key_id  
    LEFT JOIN schoolnew_nonformal_attendance att ON att.school_id = std.school_id  and DATE(att.created_at) = '$current_date'
    where et.emis_usertype =$emis_usertype and et.emis_user_id =$emis_username and std.Active=1 and tv.type >0";

   
    $query = $this->db->query($SQL);
    // print_r($this->db->last_query());die();
    return $query->result_array();
     
  }
  public function get_gender_count($emis_username,$emis_usertype)
  {
    $current_date = date("Y-m-d");
    $SQL="select 
    sum(case when snf.gender = 1 then 1 else 0 end) AS total_Male,
  sum(case when snf.gender =2  then 1 else 0 end) AS total_Female,
  sum(case when snf.gender = 1 then 1 else 0 end)+sum(case when snf.gender = 2 then 1 else 0 end) as TotalStrength
      ,0 as MalePresent,0 as FemalePresent,0 as MaleAbsent,0 as FemaleAbsent,1 as Batch,1 as VolunteerAttenace,(case when att.status = 1 then 1 else 0 end)as Status
       from students_non_formal snf 
       inner join
       emisuser_teacher et on snf.volunteer_id=et.emis_user_id 
       left join schoolnew_nonformal_attendance att on att.emis_username = et.emis_username and DATE(created_at) = '$current_date' 
         where snf.volunteer_id=$emis_username and et.emis_usertype =$emis_usertype and snf.Active = 1";
    $query = $this->db->query($SQL);
    return $query->result_array();
     
  }

  public function get_AttentDet($emis_username,$emis_usertype)
  {
    $current_date = date("Y-m-d");
    $SQL="select att.batch as Batch,att.attendance_date as AttendDate,maleP as MalePresent,femaleP as FemalePresent, sum(maleP+maleA) as total_Male,sum(femaleP+femaleA) as total_Female, maleA as MaleAbsent,
    femaleA as FemaleAbsent,allP as AllPresent,allA as AllAbsent,total_strength as TotalStrength,students_listA as StudentAbsentList,
    volunteer_attendance as VolunteerAttenace,version as Version,lat as Latitude ,lng as Longitude,device_id as DeviceId,
    att.created_at as CreationTime,att.update_at as UpdationTime, att.emis_username as EMISUsername,(case when att.status = 1 then 1 else 0 end)as Status from schoolnew_nonformal_attendance att where  emis_username = $emis_username and emis_usertype = $emis_usertype and DATE(created_at) = '$current_date'";
    $query = $this->db->query($SQL);
    return $query->result_array();
 
  }

  public function save_volunter_attentance($rec)
  {
    
    $records_get = array(
    'school_id' => $rec['SchoolId'],
    'batch' => $rec['Batch'],
    'attendance_date' => $rec['AttendDate'],
    'maleP' => $rec['MalePresent'],
    'femaleP' => $rec['FemalePresent'],
    'maleA' => $rec['MaleAbsent'],
    'femaleA' => $rec['FemaleAbsent'],
    'allP' => $rec['AllPresent'],
    'allA' => $rec['AllAbsent'],
    'total_strength' => $rec['TotalStrength'],
    'students_listA' => $rec['StudentAbsentList'],
    'volunteer_attendance' => $rec['VolunteerAttendance'],
    'version' => $rec['Version'],
    'lat' => $rec['Latitude'],
    'lng' => $rec['Longitude'],
    'device_id' => $rec['DeviceId'],
    'emis_username' =>$rec['EMISUsername'],
    'emis_usertype' =>$rec['EMISUserType'],
    'update_at'   => date('Y-m-d H:i:s'),
    'created_at'=>date('Y-m-d H:i:s'),
    'status'=>'1'
  );
  

  if(!empty($records_get))
  {
    $school = $records_get['school_id'];
    $emisuser = $records_get['emis_username'];
    $emistype = $records_get['emis_usertype'];
    $batch = $records_get['batch'];
    $current_date = date("Y-m-d");
    $SQL="select emis_username,update_at,batch from schoolnew_nonformal_attendance where emis_username =$emisuser  and emis_usertype=$emistype  and school_id =$school and DATE(created_at) = '$current_date'";
    $query = $this->db->query($SQL);
    $check_status = $query->result_array();
if(!empty($check_status))
{
return 2;
}
else{

  $affectedRows = $this->db->insert('schoolnew_nonformal_attendance',$records_get);
  return $affectedRows;
}
  
  }
          
}  
public function get_req_raised($req_id){
  $SQL="select students_child_detail.id as IndxID, students_child_detail.name as Name, user_id as StudentId, students_child_detail.gender as Gendr, aadhaar_uid_number as Aadhr,dob as DOB, phone_number as MobNo, mother_name as MothrNam, father_name as FathrNam, baseapp_class_studying.class_studying as ClsStdyg, baseapp_education_medium.education_medium as EduMed, baseapp_district.district_name as DistNam , schoolnew_basicinfo.school_name as SchlNam, class_section as Sec, school_admission_no as AdmsnNo, smart_id as SmrtID, unique_id_no as UniqueId 
  from students_child_detail 
  left join baseapp_class_studying on baseapp_class_studying.id = students_child_detail.class_studying_id
  left join baseapp_education_medium on baseapp_education_medium.id = students_child_detail.education_medium_id
  left join baseapp_district on baseapp_district.id = students_child_detail.district_id
  left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_child_detail.school_id
  where request_id = $req_id and request_flag ='1';";
  $query = $this->db->query($SQL);
  return $query->result_array();
}   
public function req_stu_list($data) {
      $stuntData= array(
          'id'=>$data['IndxID'],
          'request_flag'=>'0',
    );
    $this->db->where('id',$stuntData['id']);
    $res = $this->db->update('students_child_detail', $stuntData);
    return $res;
  }

public function get_req_pending($scl_id){
  $SQL="select students_child_detail.id as IndxID, students_child_detail.name as Name, user_id as StudentId, students_child_detail.gender as Gendr, aadhaar_uid_number as Aadhr,dob as DOB, phone_number as MobNo, mother_name as MothrNam, father_name as FathrNam, baseapp_class_studying.class_studying as ClsStdyg, baseapp_education_medium.education_medium as EduMed, baseapp_district.district_name as DistNam , schoolnew_basicinfo.school_name as SchlNam, class_section as Sec, school_admission_no as AdmsnNo, smart_id as SmrtID, unique_id_no as UniqueId 
  FROM students_child_detail 
  left join baseapp_class_studying on baseapp_class_studying.id = students_child_detail.class_studying_id
  left join baseapp_education_medium on baseapp_education_medium.id = students_child_detail.education_medium_id
  left join baseapp_district on baseapp_district.id = students_child_detail.district_id
  left join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_child_detail.school_id
  where students_child_detail.school_id = $scl_id and request_flag ='1';";
  $query = $this->db->query($SQL);
  return $query->result_array();
}

public function get_smart_card_details($smart_id){
  
  $SQL="select students_child_detail.id as IndxId,
  students_child_detail.name as Name,
  students_child_detail.name_tamil as TamilName,
  students_child_detail.name_id_card as IdCrdName,
  students_child_detail.name_tamil_id_card as TamIdCrdName,
  students_child_detail.aadhaar_uid_number as Aadhar,
  students_child_detail.gender as Gender,
  students_child_detail.dob as BOD,
  students_child_detail.community_id as CommunityID,
  students_child_detail.religion_id as ReligionID,
  students_child_detail.mothertounge_id as MothTungId,
  schoolnew_mediumofinstruction.MEDINSTR_DESC as MothTungName,
  d.MEDINSTR_DESC as MEDINSTR,
  students_child_detail.phone_number as PhoneNum,
  students_child_detail.differently_abled as DiffAbled,
  students_child_detail.disadvantaged_group as DisAdvGroup,
  students_child_detail.subcaste_id  as SubCastId,
  students_child_detail.house_address as HouseAdds,
  students_child_detail.pin_code as PinCode,
  students_child_detail.mother_name as MothNam,
  students_child_detail.mother_occupation as MothOccu,
  students_child_detail.father_name as FathNam,
  students_child_detail.father_occupation as FathOccu,
  students_child_detail.class_studying_id as ClsStudId,
  students_child_detail.student_admitted_section as StuAdmSec,
  students_child_detail.group_code_id as GrpCodeId,
  students_child_detail.education_medium_id as EduMedId,
  students_child_detail.district_id as DisId,
  students_child_detail.unique_id_no as UniqueId,
  students_child_detail.school_id as SchlId,
  students_child_detail.transfer_flag as TransFlag,
  students_child_detail.class_section as ClsSec,
  students_child_detail.school_admission_no as SclAdmNo,
  students_child_detail.guardian_name as GuardName,
  students_child_detail.parent_income as ParentIncome,
  students_child_detail.street_name as StrName,
  students_child_detail.area_village as AreaVillage,
  students_child_detail.doj as DOJ,
  students_child_detail.pass_fail as PassFail,
  students_child_detail.email as Email,
  students_child_detail.prv_class_std as PrvClsStd,
  students_child_detail.bloodgroup as BloodGroup,
  students_child_detail.photo as Img,
  baseapp_community.community_name as CommunityName,
  students_child_detail.request_flag as ReqFlag,
  students_child_detail.request_date as ReqDate,
  students_child_detail.request_id as ReqID,
  students_child_detail.smart_id as SmartID,
  students_child_detail.rte_type as Rte,
  students_school_child_count.school_name as SclName,
  baseapp_bloodgroup.group as BloodGrp,
  a.occu_name as FatherOcc,
  b.occu_name as MotherOcc,
  baseapp_parentincome.income_value as Income,
  schoolnew_district.district_name as DistName,
  baseapp_religion.religion_name as ReligionName,
  baseapp_sub_castes.caste_name as CasteName
            from students_child_detail 
             left join baseapp_bloodgroup on baseapp_bloodgroup.id = students_child_detail.bloodgroup
             left join baseapp_occupation as a on a.id = students_child_detail.father_occupation
             left join baseapp_occupation as b on b.id = students_child_detail.mother_occupation
            left join students_school_child_count on students_school_child_count.school_id = students_child_detail.school_id
            left join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.mothertounge_id
            left join baseapp_parentincome on baseapp_parentincome.id = students_child_detail.parent_income
            left join schoolnew_mediumofinstruction as d on d.MEDINSTR_ID = students_child_detail.education_medium_id
            left join schoolnew_district on schoolnew_district.id = students_child_detail.district_id
            left join baseapp_religion on baseapp_religion.id = students_child_detail.religion_id
            left join baseapp_community on baseapp_community.id=students_child_detail.community_id
            left join  baseapp_sub_castes on baseapp_sub_castes.id = students_child_detail.subcaste_id
            where transfer_flag = 0 and students_child_detail.smart_id = '$smart_id';";
  $query = $this->db->query($SQL);
  return $query->result_array();
}
public function get_data_dc(){
  $sql = "select id as IndexID,user_id as UsrID,old_field_value as OldFldVal,new_field_value as NewFldVal,approval_status as ApprvlSts,approval_flag as ApprvlFlg,approving_authority_type as ApprvngAuthTyp from db_field_approval_log where approval_status = 1 and approval_flag = 1";
  $query = $this->db->query($sql);
  return $query->result_array();
}
public function update_Approval_Rejection($rec)
{
  $structure_data = array('id'=> $rec['IndexID'],
  'approval_flag'=> $rec['ApprvlFlg'],'approving_authority_type'=> $rec['ApprvngAuthTyp'],'updated_date'=> $rec['UpdtdDat']);
 

  if($structure_data['id'] !=''){
    $update=$this->db->update('db_field_approval_log', $structure_data, "id = ".$structure_data['id']);
  
    return $update;
  }
}

public function AccntDetails_InsrtUpdt($data)
{
  $count=count($data);
  $records_details = array(
    'id'=>$data['IndxID'],
    'student_id'=>$data['StudID'],
    'acc_type'=>$data['AccTyp'],
    'account_no'=>$data['AccNo'],
    'branch_id'=>$data['BrnchID'],
    'passbook_img'=>$data['PassBookImg'],
    'bank_id'=>$data['BankID']);
    if($count == 6){
      $date_merge = array('updated_at'   => date('Y-m-d H:i:s'),
      'created_at'=>date('Y-m-d H:i:s'),);
      $final_details = array_merge($date_merge,$records_details);
      $this->db->insert('students_bank_acc',$final_details);
      $affectedRows=$this->db->affected_rows();

      if($affectedRows == 1) {
        $affectedRows = 1;
        return $affectedRows;
      } else {
        return 0;
      }

    } else if($count == 7){
      $date_merge = array('updated_at' => date('Y-m-d H:i:s'));
      $array_merge =  array_merge($records_details,$date_merge);         
      $this->db->where('id',$array_merge['id']);
      $this->db->update('students_bank_acc',$array_merge);
      $affectedRows=$this->db->affected_rows();

      if($affectedRows == 1) {
        $affectedRows = 2;
        return $affectedRows;
      } else {
        return 0;
      }

    } else {
      $params = array('active'=>0);
      $this->db->where('id',$records_details['id']);
      $this->db->update('students_bank_acc',$params);
      $affectedRows=$this->db->affected_rows();
      if($affectedRows == 1) {
        $affectedRows = 3;
        return $affectedRows;
      } else {
        return 0;
      }
    }
  }
  public function GetStdBnk_Det($rec)
  {
    $school_id=$rec['SchoolId'];
    $class_id=$rec['ClassId'];
    $section=$rec['Section'];
    $SQL="
    select  b.id as IndexId, a.id as StudentID, a.name as StudentName, a.class_section as Section, a.class_studying_id as Class, b.bank_id as StudBankId, a.school_id as SchoolID
    from students_child_detail a  
    join students_bank_acc b on b.student_id=a.id
    where school_id=$school_id and class_studying_id=$class_id and class_section='$section';
    ";
    $query=$this->db->query($SQL);
    return $query->result_array();  
  }

//   public function GetStdBnkID_Det($rec)
//   {
//    $school_id=$rec['SchoolId'];
//    $class_id=$rec['ClassId'];
//    $section=$rec['Section'];
//    $IndexId=$rec['IndexId'];
//     $SQL="
//     select b.id as IndexId, a.id as StudentID, a.name as StudentName, a.class_section as Section, a.class_studying_id as Class, b.bank_id as StudBankId,
//  a.school_id as SchoolID, b.account_no as AccNum, a.doj as DOJ, b.branch_id as BranchId
//   from students_child_detail a  
//   join students_bank_acc b on b.student_id=a.id
//   where a.school_id=$school_id and a.class_studying_id= $class_id and a.class_section='$section' and b.id = $IndexId;
//     ";
//     $query=$this->db->query($SQL);
//     return $query->result_array();  
//   }

}
?>
