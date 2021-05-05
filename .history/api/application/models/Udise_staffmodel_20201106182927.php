 <?php

class Udise_staffmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    public function staffinsrt($record,$table,$where_condition)
    {

      $this->db->select('id');
      $this->db->from($table);
      $this->db->where($where_condition);
      $result = $this->db->get();
      $id = $result->num_rows() > 0 ? $result->row()->id :'';
      if($id){
          $this->db->where($where_condition);
          $this->db->update($table,$record);
          $affectedRows=$this->db->affected_rows();
          return $affectedRows > 0 ? $id : null; 
      }else{
          $this->db->insert($table,$record);
          return $this->db->insert_id();
      }
    }

    // update Staff Details
    // function updatedatastaff($data,$school_udise)
    // {
    //   $this->db->where('udise_code',$school_udise);      
    //   return $this->db->update('udise_staffinfo', $data);         
    // }

    public function updatedatastaff($update,$table,$where_condition)
    {
      $this->db->where($where_condition);
      $this->db->update($table,$update);
      return $update;
    }

     // getting staff details
    function get_staff1($school_udise){
      $this->db->select('accntnt,lib_asst,lab_asst,udc_hedclrk,ldc,peon_mts,night_wtchmn,tchingstff_reg,tchingstff_cntrct,prtme_instctr');
      $this->db->where('udise_code',$school_udise);
      $query = $this->db->get('udise_staffinfo');
      return $query->result();
    }

  
function get_transfer_staff_curd($school_udise,$emis_staff_search_adhaar)
{
$this->db->select('udise_staffreg.u_id,udise_staffreg.teacher_code,udise_staffreg.teacher_name,udise_staffreg.social_category,udise_staffreg.e_blood_grp,udise_staffreg.gender,udise_staffreg.staff_dob,udise_staffreg.staff_psjoin,udise_staffreg.professional,
teacher_type.type_teacher,teacher_type.category,teacher_subjects.subjects')
              ->from('udise_staffreg')
              ->join('teacher_type','udise_staffreg.teacher_type=teacher_type.id','left')
               ->join('teacher_subjects','udise_staffreg.subject1=teacher_subjects.id','left')
              ->where('udise_staffreg.udise_code',$school_udise)
        ->where('udise_staffreg.aadhar_no',$emis_staff_search_adhaar)
              ->where('udise_staffreg.archive',0);            
              $query = $this->db->get();      
              return $query->result();
    } 
  function get_transfer_staff_details($school_udise,$emis_staff_search_adhaar)
{
$this->db->select('udise_staffreg.u_id,udise_staffreg.teacher_code,udise_staffreg.teacher_name,udise_staffreg.social_category,udise_staffreg.e_blood_grp,udise_staffreg.gender,udise_staffreg.staff_dob,udise_staffreg.staff_psjoin,udise_staffreg.professional,
teacher_type.type_teacher,teacher_type.category,teacher_subjects.subjects')
              ->from('udise_staffreg')
              ->join('teacher_type','udise_staffreg.teacher_type=teacher_type.id','left')
               ->join('teacher_subjects','udise_staffreg.subject1=teacher_subjects.id','left')
              ->where('udise_staffreg.archive',0); 
        if(!empty($emis_staff_search_adhaar)){
              $this->db->where('udise_staffreg.aadhar_no',$emis_staff_search_adhaar);
        $this->db->where('udise_staffreg.archive',0); 
          }       
              $query = $this->db->get();      
              return $query->result();
    }


    // Staff registration insert
    function staffreg($data,$check=0){
      //$this->db->set('createdat', mdate('%Y-%m-%d %H:%i:%s', now()));

      if($check==0){
        
       
          $this->db->insert('udise_staffreg',$data);
          $cid = $this->db->insert_id();  
      }
     /* else{


        $this->db->insert_batch('teacher_mediumentry',$data);
        $cid=0;
      }*/
      return $cid;
    }

    public function staffregsecondpart($staff_data)
    {
          $this->db->insert('teacher_dates',$staff_data);
          return $this->db->insert_id();
    }
    public function staffregregulationpart($regulation){
      if($this->db->insert_batch('teacher_regu_dates',$regulation)){
        return true;
      }
      else{
        return false;
      }
    }

    public function stafflogpart($logpart)
    {
      if($this->db->insert_batch('db_field_approval_log',$logpart)){
        return true;
      }
      else{
        return false;
      }
    }
    

  //Staff Manacat
  function getmanacate($schoolid){
       $this->db->select('manage_cate_id'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$schoolid); 
       $query =  $this->db->get();
       return $query->result();
    }
  
  //Staff Manacat
  function getmanacate1($schoolid){
       $this->db->select('sch_cate_id'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$schoolid); 
       $query =  $this->db->get();
       return $query->result();
    }
  
  //Staff count
  function getregteachercount(){
       $this->db->select('max(u_id) as maxid'); 
       $this->db->from('udise_staffreg');
     $query =  $this->db->get();
       return $query->result();
    }
  //Staff code
  function getregteachercode($getteachercount1){
       $this->db->select('teacher_code'); 
       $this->db->from('udise_staffreg');
     $this->db->where('u_id',$getteachercount1); 
       $query =  $this->db->get();
       return $query->result();
    }
   
    

     // update Staff Registered data
    function updatestaffregdata($updateteaching_staff_data,$u_id)
    {
      // $this->db->where('udise_code', $school_udise);
      $this->db->where('u_id',$u_id);
      return $this->db->update('udise_staffreg',$updateteaching_staff_data);         
    }
  
  
  function getallschoolblk(){

      $this->db->select('*')
        ->from('schoolnew_block'); 
   $query = $this->db->get(); 
    return $query->result();
 }
 function get_allschooolsbyblock($block_id){
           $this->db->select('school_id,school_name,block_id'); 
       $this->db->from('schoolnew_basicinfo');
     //  $this->db->where('block_id',$block_id); 
       $query =  $this->db->get();
       return $query->result();
  }
  function get_office() {
       $this->db->select('id as school_id,office_name as school_name,district_id'); 
       $this->db->from('udise_offreg');
       //$this->db->where('block_id',$block_id); 
       $query =  $this->db->get();
       return $query->result(); 
  }

    /***Ramco Magesh **/
    
    function get_academic() {
         $SQL="select * from teacher_academic_qualify ";
         $query = $this->db->query($SQL);
         return $query->result_array();
    }
    function get_professional() {
         $SQL="select * from teacher_professional_qualify";
         $query = $this->db->query($SQL);
       return $query->result();
    }
     function get_office_id() {
        $user_type_id=$this->session->userdata('emis_user_type_id');
        $user_name=$this->session->userdata('emis_username');
         $SQL="
SELECT udise_offreg.id as office_id,udise_offreg.off_key_id as off_key_id,udise_offreg.office_user FROM udise_offreg
JOIN emis_userlogin on emis_userlogin.emis_username=udise_offreg.office_user
where emis_userlogin.emis_usertype=$user_type_id and emis_userlogin.emis_username='$user_name'";
         $query = $this->db->query($SQL);
       return $query->result();
    }
    
  
  function getdistrict_id($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_district');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->result();  
    }
  function getbloodgroupname($id){
         $this->db->select('*'); 
         $this->db->from('baseapp_bloodgroup');
         $this->db->where('id',$id); 
         $query =  $this->db->get();
         return $query->result();   
    }

    public function get_techsocialcat(){
     $SQL="select * from teacher_social_category";
         $query = $this->db->query($SQL);
       return $query->result();
    }
  
  // emis_teachertype
  function get_teacher_type($school_type_id,$cate_id){
   

    if($school_type_id == 1 || $school_type_id == 2 || $school_type_id == 4)
    {
      //HSS
      if($cate_id == 3 || $cate_id == 5 || $cate_id == 9 || $cate_id == 10)
      {
       $id = array(7,8,11,12,13,17,18,21,22,23,25,27,31,32,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,128,131,132);
      $this->db->select('id,type_teacher');
      $this->db->from('teacher_type');
      $this->db->where('category',1); 
      $this->db->where_in('id', $id);
      $query = $this->db->get();
       return $query->result();    
      }
      //MS
      else if($cate_id == 2)
      {
       $id = array(7,11,28,39,40,41,42,43,54,128,131,132);
      $this->db->select('id,type_teacher');
      $this->db->from('teacher_type');
      $this->db->where('category',1); 
      $this->db->where_in('id', $id);
      $query = $this->db->get();
       return $query->result();    
      }
    //HS
     else if($cate_id == 6 || $cate_id == 7 || $cate_id == 8)
      {
       $id = array(7,11,26,39,40,41,42,43,54,128,131,132);
      $this->db->select('id,type_teacher');
      $this->db->from('teacher_type');
      $this->db->where('category',1); 
      $this->db->where_in('id', $id);
      $query = $this->db->get();
       return $query->result();    
      }
      //PS
      else if($cate_id == 1)
      {
       $id = array(29,41,128);
      $this->db->select('id,type_teacher');
      $this->db->from('teacher_type');
      $this->db->where('category',1); 
      $this->db->where_in('id', $id);
      $query = $this->db->get();
       return $query->result();    
      }
    }
    else 
    {
        $this->db->select('id,type_teacher');
      $this->db->from('teacher_type');
      $this->db->where('category',1); 
       $query = $this->db->get();
       return $query->result();  
    }
    
    
  }
  
  // emis_teachertype
  function get_nonteacher_type(){
    $this->db->select('id,type_teacher');
    $this->db->from('teacher_type');
    $this->db->where('category',2); 
    $query = $this->db->get();
    return $query->result();
  }
  
  // emis_teachertype ug
  function get_teacher_typeug(){
    $this->db->select('id,ug_degree');
    $this->db->from('teacher_ug_degree');
    $query = $this->db->get();
    return $query->result();
  }
  
  // emis_teachertype pg
  function get_teacher_typepg(){
    $this->db->select('id,pg_degree');
    $this->db->from('teacher_pg_degree');
    
    $query = $this->db->get();
    return $query->result();
  }



  function get_teacher_classtaught($cate_id){

      if($cate_id==1)
      {
         $allowed_taught=array(1);  
      }
      else if($cate_id==2)
      {
          $allowed_taught=array(1,2,3,8,9); 
      }
     else if($cate_id == 3)
      {
       $allowed_taught=array(1,2,3,6,8,9,4,7,5); 
      }
      else if($cate_id == 4)
      {
       $allowed_taught=array(2); 
      }
      else if($cate_id == 5)
      {
        $allowed_taught=array(2,6,4,7,5); 
      }
      
      else if($cate_id == 6)
      {
         $allowed_taught=array(1,2,3,4,6,8,9); 
      }
      else if($cate_id == 7)
      {
        $allowed_taught=array(2,6,4); 
      }
      else if($cate_id == 8)
      {
          $allowed_taught=array(4); 
      }
      else if($cate_id == 9)
      {
       $allowed_taught=array(4,7,5);  
      }
      else if($cate_id == 10)
      {
       $allowed_taught=array(5);  
      }
     
          $id = $allowed_taught;       
          $this->db->select('id,category');
          $this->db->from('teacher_class_taught');
          $this->db->where_in('id',$id);
          $query = $this->db->get();
          return $query->result();

  
  }

  // emis_teachertype suffix
  function get_teacher_suffix(){
    $this->db->select('id,suffix');
    $this->db->from('suffix');
    $query = $this->db->get();
    return $query->result();
  }
    
    
    
    // emis_teachersubjects
  function get_teacher_office(){
    $this->db->select('*');
    $this->db->from('udise_offreg');
    $query = $this->db->get();
    return $query->result();
  }
    
    function getMediumInstruct(){
         $SQL='select * from schoolnew_mediumofinstruction';
        $query = $this->db->query($SQL);
      return $query->result();
        
        /*$SQL='select * from schoolnew_mediumentry
join schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut
where schoolnew_mediumentry.school_key_id='.$unique_id_staff;
        $query = $this->db->query($SQL);
      return $query->result();*/
    }
    
    
  function get_aadhar_volunteers($aadhar) {
        $SQL = 'select id,teacher_name,aadhar_no,organization_name from teacher_volunteers where aadhar_no='.$aadhar.' limit 1;';
        //echo $SQL;
        //die();
        $query = $this->db->query($SQL);
        return $query->result();
    }
    
   
   
    function get_nsqf_sector(){
      $this->db->select('id,sector');
      $this->db->from('student_nsqf_sector');
      $query = $this->db->get();
      return $query->result();
    }
    
      // geeting the staff data
    function get_staff_form_details($unique_id_staff)
  {
      
      $SQL='select udise_staffreg.u_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.staff_dob,teacher_social_category.social_cat,
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,suffix.suffix as suf_name,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,schoolnew_district.district_name,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,udise_staffreg.academic,baseapp_bloodgroup.group,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,  teacher_professional_qualify.professional,udise_staffreg.e_ug,udise_staffreg.e_pg,udise_staffreg.subject1,udise_staffreg.subject2,udise_staffreg.subject3,
        appointedsubject.subjects as appsub,s1.subjects as ts1,s2.subjects as ts2,s3.subjects as ts3,udise_staffreg.professional as tprofessional,udise_staffreg.teacher_type,udise_staffreg.appointed_subject,
        teacher_type.type_teacher as desgination,teacher_type.category as category,teacher_academic_qualify.academic_teacher,teacher_ug_degree.ug_degree,
    teacher_pg_degree.pg_degree,udise_staffreg.e_picid
        from udise_staffreg
left join schoolnew_basicinfo on schoolnew_basicinfo.udise_code= udise_staffreg.udise_code
left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp
left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct
left join teacher_type on teacher_type.id = udise_staffreg.teacher_type
left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic
left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional
left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1
left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2
left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join suffix on suffix.id=udise_staffreg.suffix
left join teacher_ug_degree on teacher_ug_degree.id=udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id=udise_staffreg.e_pg
where udise_staffreg.u_id='.$unique_id_staff;
       
    $query = $this->db->query($SQL);
    // print_r($this->db->last_query());
      return $query->result();
        
    }
    
    function get_teaching_staff_details($school_id){
    
       
      
          $SQL='select udise_staffreg.deputed,udise_staffreg.teacher_id,udise_staffreg.u_id,udise_staffreg.off_id,udise_staffreg.status,udise_staffreg.school_key_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.staff_dob,teacher_social_category.social_cat,
          udise_staffreg.teacher_name_tamil,udise_staffreg.e_picid,
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,suffix.suffix as suf_name,udise_staffreg.e_picid as photo,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,schoolnew_district.district_name,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,udise_staffreg.academic,baseapp_bloodgroup.group,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,  teacher_professional_qualify.professional,udise_staffreg.e_ug,udise_staffreg.e_pg,udise_staffreg.subject1,udise_staffreg.subject2,udise_staffreg.subject3,udise_staffreg.subject4,udise_staffreg.subject5,udise_staffreg.subject6,
        appointedsubject.subjects as appsub,s1.subjects as ts1,s2.subjects as ts2,s3.subjects as ts3,udise_staffreg.professional as tprofessional,udise_staffreg.teacher_type,udise_staffreg.appointed_subject,
        teacher_type.type_teacher as desgination,teacher_type.category as category,teacher_academic_qualify.academic_teacher,teacher_ug_degree.ug_degree, teacher_pg_degree.pg_degree 
        deputed_place,depute_key,depute_frmdate,depute_todate,udise_staffreg.trng_needed,trng_received,
udise_staffreg.nontch_days,
udise_staffreg.math_upto,
udise_staffreg.science_upto,
udise_staffreg.english_upto,
udise_staffreg.lang_study_upto,
udise_staffreg.soc_study_upto,
udise_staffreg.trained_cwsn,
udise_staffreg.trained_comp,
udise_staffreg.class_taught,teacher_dates.ifsc_code,teacher_dates.bank_acc,teacher_dates.pan_no,schoolnew_branch.bank_name,
schoolnew_branch.branch,teacher_dates.teacher_uid,sslc_dop,higersec_dop,doj_block,promo_eligi_date,relinguish,relinguish_date,
      prob_id,prob_date,doj_dept,head_account,posting_nature,teachers_cpool_history.transfer_reason,teachers_cpool_history.id as cp_history_id
        from udise_staffreg
left join udise_offreg on udise_offreg.off_key_id = udise_staffreg.school_key_id and udise_staffreg.archive=1
left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp and udise_staffreg.archive=1
left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct and udise_staffreg.archive=1
left join teacher_type on teacher_type.id = udise_staffreg.teacher_type and udise_staffreg.archive=1
left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic and udise_staffreg.archive=1
left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional and udise_staffreg.archive=1
left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject and udise_staffreg.archive=1
left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1 and udise_staffreg.archive=1
left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2 and udise_staffreg.archive=1
left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3 and udise_staffreg.archive=1
left join teacher_subjects as s4 on s4.id=udise_staffreg.subject4 and udise_staffreg.archive=1
left join teacher_subjects as s5 on s5.id=udise_staffreg.subject5  and udise_staffreg.archive=1 
left join teacher_subjects as s6 on s6.id=udise_staffreg.subject6 and udise_staffreg.archive=1
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category and udise_staffreg.archive=1
left join teacher_dates on teacher_dates.teacher_uid=udise_staffreg.u_id and udise_staffreg.archive=1
left join schoolnew_branch on schoolnew_branch.id=teacher_dates.branch_id and udise_staffreg.archive=1
left join suffix on suffix.id = udise_staffreg.suffix  and udise_staffreg.archive=1
left join teacher_ug_degree on teacher_ug_degree.id = udise_staffreg.e_ug and udise_staffreg.archive=1
left join teacher_pg_degree on teacher_pg_degree.id = udise_staffreg.e_pg and udise_staffreg.archive=1
left join teacherdepute_entry on teacherdepute_entry.teacher_code=udise_staffreg.teacher_code and udise_staffreg.archive=1
left join teachers_cpool_history on teachers_cpool_history.teacher_uid=udise_staffreg.u_id and udise_staffreg.archive=1

where udise_staffreg.school_key_id='.$school_id.' AND  udise_staffreg.archive=1  group by teacher_code;';
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    
      return $query->result();
    }
  
      function get_nonteaching_staff_details($school_id){
    
       // $school_udise=3509;
     // $tmp='';
       // $user_type_id=1;
      
          $SQL='select udise_staffreg.deputed,udise_staffreg.u_id,udise_staffreg.off_id,udise_staffreg.status,udise_staffreg.school_key_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.staff_dob,teacher_social_category.social_cat,
        
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,suffix.suffix as suf_name,udise_staffreg.e_picid as photo,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,schoolnew_district.district_name,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,udise_staffreg.academic,baseapp_bloodgroup.group,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,  teacher_professional_qualify.professional,udise_staffreg.e_ug,udise_staffreg.e_pg,
       udise_staffreg.professional as tprofessional,udise_staffreg.teacher_type,
        teacher_type.type_teacher as desgination,teacher_type.category as category,teacher_academic_qualify.academic_teacher,teacher_ug_degree.ug_degree, teacher_pg_degree.pg_degree 
        deputed_place,depute_key,depute_frmdate,depute_todate,udise_staffreg.trng_needed,trng_received,
udise_staffreg.nontch_days,
udise_staffreg.math_upto,
udise_staffreg.science_upto,
udise_staffreg.english_upto,
udise_staffreg.lang_study_upto,
udise_staffreg.soc_study_upto,
udise_staffreg.trained_cwsn,
udise_staffreg.trained_comp,
udise_staffreg.class_taught,teacher_dates.ifsc_code,teacher_dates.bank_acc,teacher_dates.pan_no,schoolnew_branch.bank_name,
schoolnew_branch.branch
        from udise_staffreg
left join udise_offreg on udise_offreg.off_key_id = udise_staffreg.school_key_id 
left join schoolnew_basicinfo on schoolnew_basicinfo.udise_code= udise_staffreg.udise_code
left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp
left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct
left join teacher_type on teacher_type.id = udise_staffreg.teacher_type
left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic
left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional

left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join teacher_dates on teacher_dates.teacher_id=udise_staffreg.teacher_code
left join schoolnew_branch on schoolnew_branch.id=teacher_dates.branch_id
left join suffix on suffix.id = udise_staffreg.suffix 
left join teacher_ug_degree on teacher_ug_degree.id = udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id = udise_staffreg.e_pg
left join teacherdepute_entry on teacherdepute_entry.teacher_code=udise_staffreg.teacher_code
where udise_staffreg.school_key_id='.$school_id.' AND  udise_staffreg.archive=1 and teacher_type.category=2 group by teacher_code;';
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    // print_r($this->db->last_query());
      return $query->result();
    }
  public function get_common_table_details($table,$where='')
        {           
          if(!empty($where))
          {
            // $where =implode(",",$where);die;
                $this->db->where($where[0],$where[1]);
          }
          return $this->db->get($table)->result();
          // print_r($this->db->last_query());
        }

  public function emis_brte_staff_observation_records($teacher_id)
  {
      $this->db->select('b.school_name,b.udise_code,a.createdon')
               ->from('school_observations a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->where('a.createdby',$teacher_id);
      $result = $this->db->get()->result();
        // print_r($this->db->last_query());
      return $result;
  }
  
  

  
  function getteacherstaffdetails($unique_id_staff) {
    $SQL="select udise_staffreg.u_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.staff_dob,
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,
        appointedsubject.subjects as appsub,
        s1.subjects as ts1,
        s2.subjects as ts2,
        s3.subjects as ts3,
        udise_staffreg.professional as tprofessional,

        teacher_type.type_teacher as desgination,
        teacher_type.category as category,
        teacher_academic_qualify.academic_teacher,
        suffix.suffix,
        teacher_ug_degree.ug_degree,
        teacher_pg_degree.pg_degree,schoolnew_basicinfo.school_name,
        teacher_professional_qualify.professional,udise_staffreg.e_picid,baseapp_bloodgroup.group
        from udise_staffreg
left join schoolnew_basicinfo on schoolnew_basicinfo.udise_code= udise_staffreg.udise_code
left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp
left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct
left join teacher_type on teacher_type.id = udise_staffreg.teacher_type
left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic
left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional
left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1
left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2
left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join suffix on suffix.id=udise_staffreg.suffix
left join teacher_ug_degree on teacher_ug_degree.id=udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id=udise_staffreg.e_pg
where udise_staffreg.u_id=".$unique_id_staff;
    $query = $this->db->query($SQL);
    // print_r($this->db->last_query());
      return $query->result();
  
  }
  
  function getnonteacherstaffdetails($unique_id_staff) {
     
    $SQL="select udise_staffreg.u_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.staff_dob,
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,
        appointedsubject.subjects as appsub,
        s1.subjects as ts1,
        s2.subjects as ts2,
        s3.subjects as ts3,
        udise_staffreg.professional as tprofessional,
        teacher_type.type_teacher as desgination,
        teacher_type.category as category,
        teacher_academic_qualify.academic_teacher,
        suffix.suffix,
        teacher_ug_degree.ug_degree,
        teacher_pg_degree.pg_degree
        from udise_staffreg
left join schoolnew_basicinfo on schoolnew_basicinfo.udise_code= udise_staffreg.udise_code
left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp
left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct
left join teacher_type on teacher_type.id = udise_staffreg.teacher_type
left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic
left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional
left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1
left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2
left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join suffix on suffix.id=udise_staffreg.suffix
left join teacher_ug_degree on teacher_ug_degree.id=udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id=udise_staffreg.e_pg
where udise_staffreg.u_id=".$unique_id_staff;
    $query = $this->db->query($SQL);
      return $query->result();
  
  }
   
    
    
    function getvolunteer($school_id) {
    
    //print_r($school_id);
        $sql = "select teacher_volunteers.school_key_id,teacher_volunteers.id,teacher_volunteers.teacher_name,organization_name,organization_type,
    teacher_volunteers_subjects.from_date,teacher_volunteers_subjects.to_date,a.subjects as s1,b.subjects as s2,c.subjects as 
    s3 from teacher_volunteers
        left join teacher_volunteers_subjects on teacher_volunteers_subjects.school_key_id=teacher_volunteers.school_key_id and teacher_volunteers_subjects.teacher_id=teacher_volunteers.id
    left join teacher_subjects a on a.id=teacher_volunteers_subjects.sub1
    left join teacher_subjects b on b.id=teacher_volunteers_subjects.sub2
     left join teacher_subjects c on c.id=teacher_volunteers_subjects.sub3
        where teacher_volunteers.school_key_id='".$school_id."' group by teacher_volunteers.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function getdepute($school_id) {
      $today=date("Y-m-d");
        $sql = "SELECT teacher_name,type_teacher,teacherdepute_entry.u_id,
    (SELECT subjects FROM teacher_subjects WHERE id=udise_staffreg.appointed_subject)subjects,
(CASE WHEN category=1 THEN 'TEACHING' WHEN category=2 THEN  'NON-TEACHING' ELSE 'NA' END) as category,a.subjects as s1,b.subjects as s2,c.subjects as s3,
    schoolnew_basicinfo.school_name,
depute_key,
    teacherdepute_entry.teacher_code,
    depute_frmdate,
    depute_todate 
    FROM teacherdepute_entry
JOIN udise_staffreg on udise_staffreg.u_id=teacherdepute_entry.u_id
join teacher_subjects a on a.id=udise_staffreg.subject1
    join teacher_subjects b on b.id=udise_staffreg.subject2
    join teacher_subjects c on c.id=udise_staffreg.subject3
    JOIN teacher_type ON teacher_type.id=udise_staffreg.teacher_type
JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id=udise_staffreg.school_key_id  
WHERE teacherdepute_entry.depute_key=".$school_id." AND teacherdepute_entry.deputed_place=1 AND teacherdepute_entry.depute_todate > '".$today."'";
//echo($sql);die();
                $query = $this->db->query($sql);
                return $query->result();
    }
    
    function deputationentry($teacher_code){
        $sql = "select depute_key,case when deputed_place=1 then 'School'
                when deputed_place=2 then 'Office' else 'NA' end as place,deputed_place  
                ,teacherdepute_entry.teacher_code,depute_frmdate,depute_todate,
                district_name,teacher_name,school_name 
                from teacherdepute_entry
                join udise_staffreg on udise_staffreg.teacher_code=teacherdepute_entry.teacher_code
                join (select 1 as keyid,school_id,school_name,district_id,district_name
                from students_school_child_count
                union all
                select 2 as keyid,off_key_id,office_name,district_id,district_name
                from udise_offreg
                join schoolnew_district on schoolnew_district.id=udise_offreg.district_id)
                as depute on depute.keyid=teacherdepute_entry.deputed_place and depute.school_id=teacherdepute_entry.depute_key
                where teacherdepute_entry.teacher_code=".$teacher_code." ";
        $query = $this->db->query($sql);
        return $query->result();
    }
   
    
    
//created by vit for update archieve (transfer)// 
  function update_transfer_id($staff_uid)
  {
    
    $this->db->where('u_id',$staff_uid);
    $this->db->update('udise_staffreg',array('archive'=>0));
    return true;
  }
//created by vit for update archieve,emis_school_id,emis_school_udise (Admit)//   
  function updatestaffhistroy($records,$table,$name)
  {
      $where = array('teacher_uid'=>$records['teacher_uid']);
      $query = $this->db->get_where($table,$where);
      $lastrow=$query->last_row();
    
    if($lastrow->id!=''){
      $this->db->trans_start();
      $this->db->where('id',$lastrow->id);
      $this->db->update($table,$records);
      $SID = $lastrow->id;
      $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();            
    }else{
      // $records['created_date'] = date("Y-m-d");
      // $this->db->trans_start();
      // $this->db->insert($table,$records);
      // $SID = $this->db->insert_id();
      // $affectedRows=$this->db->affected_rows();
      // $this->db->trans_complete();            
      $affectedRows=0;
    }
  
      if ($this->db->trans_status() === false) {
          $result = 'Fail to Update the Staff`s CPool History Details!';
      } else if ($this->db->trans_status() === true) {
        if($affectedRows > 0 ) {
           $result = $name.' Staff Successfully Updates. Staff`s CPool History_ID is '.$SID;
        } else {
           $result = 'There is no changes in CPool History details. Haven`t Updated Anything!.';
        }
      }
      else{
           $result = 'Something Went Wrong in Staff CPool History functionality!.';
      }
      return $result;
  }

  /**
  * Single sign on Get Password
  * VIT-sriram
  * 05/03/2019
  *****/

  public function get_sso_password($teacher_id)
  {
    $this->db->select('ref,emis_username');
    $result = $this->db->get_where('emisuser_teacher',array('emis_user_id'=>$teacher_id))->first_row();
    // print_r($this->db->last_query());
    return $result;
  }


  public function update_reset_password($update)
  {
      $this->db->where('emis_user_id',$update['emis_user_id']);
      $this->db->update('emisuser_teacher',$update);

      return $this->db->affected_rows();
  }

  /********************** End *************************/

  /***************** Teacher Edit *********************/

  /**
   * Check Aadhar Number
   * VIT-sriram
   * 10/04/2019
   **/
  public function check_aadhar_no($table,$where,$id)
  {

      $this->db->where($where);
      $result = $this->db->get($table)->first_row();

      if(!empty($result))
      {
          if($id == $result->u_id)
          {
              return false;
          }else
          {
            return true;
          }
      }else
      {
        return false;
      }
  }


  


  /************************ End ***********************/

  /*********************** Staff Part 2 ****************/

  /**************************************
    * Save And Update Function          *
    * VIT-Sriram                        *
    * 29/05/2019                        *
    *************************************/

  public function save_staff_details($table,$staff_data)
  {


        if($staff_data['id'] !='')
        {
            $this->db->where('id',$staff_data['id']);
            $this->db->update($table,$staff_data);
            return $staff_data['id'];
        }else
        {
          $this->db->insert($table,$staff_data);
          return $this->db->insert_id();
        }
  }

  function get_head_account_details($id){
    // echo $id;
    $this->db->select('head_of_account AS head_of_account_name');
    $this->db->where('id',$id);
    return $this->db->get('schoolnew_head_account')->result_array();
  }

  /****************************************
    * Get Full Details Part 2 Staff       *
    * VIT-Tamilbala                          *
    * 29/05/2019                          *
    ***************************************/

   function get_staff_part2_details($school_id)
  {
      $sql ="select id,school_key_id,teacher_id,sslc_dop,higersec_dop,doj_block,promo_eligi_date,relinguish,relinguish_date,
      prob_id,prob_date,doj_dept,head_account
            from  teacher_dates 
      
                where school_key_id=".$school_id."";
               $query = $this->db->query($sql);
        return $query->result();
  }
   function get_staff_part3_details($school_id)
  {
       
      
      $sql ="select id,teacher_uid,teacher_id,school_key_id,type_date,dates,appoint_nature
            from  teacher_regu_dates 
                where school_key_id=".$school_id."";
        $query = $this->db->query($sql);
        return $query->result();
  }


  /**
    * Regu Date Remove
    * VIT-sriram
    * 19/06/2019
    ******/

  public function reg_staff_remove($where)
  {
      $this->db->where($where);
      $this->db->delete('teacher_regu_dates');

      return $where['id'];
  }
 function pindics_school_detial($data){
    $brte_id = $this->session->userdata('emis_user_id');
   // $brte_id = '645034';
    $exist_sql = 'select brte_school_map.school_id as school_id,brte_school_map.school_name from brte_school_map
    join brte_school_groups on brte_school_groups.group_id=brte_school_map.hss_udise_code
    where brte_school_groups.is_active = 1 and brte_school_map.brte_id= '.$brte_id.' union all
    select brte_school_map.hss_school_id as school_id,brte_school_map.hss_school_name from brte_school_map
    join brte_school_groups on brte_school_groups.group_id=brte_school_map.hss_udise_code
    where brte_school_groups.is_active = 1 and brte_school_map.brte_id= '.$brte_id.' group by school_id
    ;';
    $sql = 'select students_school_child_count.school_id,students_school_child_count.school_name from students_school_child_count 
   join brte_school_map on brte_school_map.hss_block_id=students_school_child_count.block_id
   where brte_school_map.brte_id = '.$brte_id.' and students_school_child_count.school_type_id in (1,2,4)
   group by students_school_child_count.school_id;';
    $query = $this->db->query($sql);
    return $query->result();
  }
  /*********************************** End *******************************/

   /***************************** Teacher Dashboard Home Work ************/

    public function get_schoolwise_class($school_id)
    {
      // $school_id = $this->session->userdata('emis_user_id');
      // echo $school_id;
      $this->db->select('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
            ->from('students_school_child_count')
            ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
            ->where('school_id',$school_id)
            ->group_by('class_id');

            $result = $this->db->get()->result();
            return $result;
    }

    public function get_schoolwise_class_section($class_id,$school_id)
        {
      // $school_id = $this->session->userdata('emis_user_id');
            $result = $this->db->get_where('schoolnew_section_group',array('class_id'=>$class_id,'school_key_id'=>$school_id))->result_array();
            
            return $result;
        }
        public function get_schoolwise_class_section_medium($class,$section,$school_id)
        {

          //   $result = $this->db->get_where('schoolnew_section_group',array('class_id'=>$class,'section'=>$section,'school_key_id'=>$school_id))->result_array();
          // //  print_r($this->db->last_query());die();
          //   return $result;


             $SQL="select schoolnew_section_group.*,schoolnew_mediumofinstruction.MEDINSTR_DESC as medium_name,grp.group_name from schoolnew_section_group left join schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID = schoolnew_section_group.school_medium_id left JOIN baseapp_group_code grp ON grp.id = schoolnew_section_group.group_id where class_id=$class and section ='".$section."' and school_key_id=$school_id";
          $query = $this->db->query($SQL);
         return $query->result_array(); 
        }

public function get_schoolwise_student_promote_list($class,$section,$school_id)
{

    $SQL="select * from students_child_detail where class_studying_id=$class and class_section='$section' and school_id=$school_id and transfer_flag=0 order by name  ASC";
          $query = $this->db->query($SQL);
         return $query->result_array(); 
   
}

public function Update_promote_Student($records)
{
  
  if(!empty($records['update_list']))
  {
           //$this->db->where('unique_id_no',$records['unique_id_no']);
           //$this->db->update('students_child_detail',$records);

          $res = $this->db->update_batch('students_child_detail', $records['update_list'], 'id');
         
        if($res!=0)
        {

        
             $this->db->insert_batch('students_promote_history',$records['insert_list']);
             $insert_data =$this->db->insert_id();
             if($insert_data!="")
             {
              return 1;
             }
             else
             {
              return 0;
             }
           
        }
         // print_r($this->db->last_query());
          //echo $res;die(); 
         //print_r($this->db->last_query());die();
  }
}

        //save home work
public function save_home_work($table,$save_data)
    {   
      $class_id=$save_data['class_id'];
      $section=json_encode($save_data['section']);
      $school=$save_data['school_key_id'];            
    
    $query = "select id from schoolnew_section_group where class_id = $class_id and section = $section and school_key_id = $school ";
      $return_value =  $this->db->query($query);
     $res =  $return_value->result_array();
    

   $save_data_final=array('school_key_id'=>$save_data['school_key_id'],'teacher_id'=>$save_data['teacher_id'],'date'=>$save_data['date'],'information'=>$save_data['information'],'class_section_id'=>$res[0]['id'],'status'=>1,'created_at'=>$save_data['created_at'],'subject'=>$save_data['subject']);    
     
       if(empty($res))
       {
        return false;
       }

        if(!isset($save_data['id']))
        {
           $this->db->insert($table,$save_data_final);
          return $this->db->insert_id();
        }
       

      else if($save_data['id']!="")
        {
          $this->db->where('id',$save_data['id']);
          $this->db->update($table,$save_data_final);
          return $save_data['id'];
        }
    
    }

    public function get_home_work_details($school_id,$teacher_id)
    {
         $SQL="select teachers_homework.id,teachers_homework.school_key_id,teachers_homework.teacher_id,teachers_homework.class_section_id,teachers_homework.subject,teachers_homework.information,teachers_homework.doc_upload,teachers_homework.status,schoolnew_section_group.class_id,schoolnew_section_group.section,schoolnew_textbooks_list.book_name from teachers_homework left join schoolnew_section_group ON schoolnew_section_group.id = teachers_homework.class_section_id left join schoolnew_textbooks_list ON schoolnew_textbooks_list.subject = teachers_homework.subject where teachers_homework.teacher_id=$teacher_id and teachers_homework.school_key_id =$school_id and teachers_homework.status=1";
          $query = $this->db->query($SQL);
         return $query->result_array(); 
    }

    
    public function delete_home_work_details($school_id,$teacher_id,$id)
    {


    $this->db->update('teachers_homework',array('status' => '0'),array('teacher_id'=>$teacher_id,'school_key_id'=> $school_id,'id'=>$id));
   return true;
        
    }
   

    // get subject

    public function get_subject_details($class_id)
    {
        $this->db->group_by('medium,group_code,subject');
        $result = $this->db->get_where('schoolnew_textbooks_list',array('class'=>$class_id,'hw_subject'=>1))->result();

        return $result;
    }

    /********************************* End **************************************/

      /*************************** Teacher Attendance *****************/

  public function emis_schoolwise_teacher_list($school_id,$table)
  {
            $date = date('Y-m-d');
          $this->db->select('b.teacher_name,b.teacher_code, coalesce(a.present,1) as present, a.attres,gender,appointedsubject.subjects,teacher_type.type_teacher as desgination,b.teacher_type,a.attstatus,a.id',false)
          ->from('udise_staffreg as b')
          ->join('(SELECT distinct a.teacher_name,a.attstatus, IF(a.attstatus="", "1", "0") as present, `a`.`attres`,a.teacher_code,a.school_id,a.id FROM '.$table.' as `a` WHERE `a`.`date` = "'.$date.'" group by teacher_code) as a','a.teacher_code =  b.teacher_code','left')
          ->join('teacher_type','b.teacher_type=teacher_type.id','left')
          ->join('teacher_subjects as appointedsubject',' appointedsubject.id=b.appointed_subject','left')
          ->where('b.school_key_id',$school_id)
          
          ->where('b.archive ',1);
          
          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;
  }

  // save attendance

  public function emis_teacher_save_attendance($table,$save_data)
  {
                         $this->db->select('id,school_id,teacher_code');
      $exits_att_data = $this->db->get_where($table,array('school_id'=>$save_data['school_id'],'teacher_code'=>$save_data['teacher_code']))->first_row();

      if($exits_att_data !='')
      { 
          $save_data['id'] = $exits_att_data->id;
          $this->db->where('id',$save_data['id']);
          $this->db->update($table,$save_data);
          return $save_data['teacher_code'];  
      }else
      {
          $this->db->insert($table,$save_data);
          return $this->db->insert_id();
      }
  }


  /******************************* End ***********************************/

  /******************************** Staff Attendance Monthwise ***********/

  /******************************************
    * Staff Monthwise attendance            *
    * VIT-sriram                            *
    * 24/07/2019                            *
    *****************************************/

  public function emis_staff_attendance_school_monthwise($table,$school_id,$date)
  {

      $this->db->select('teacher_name,gender,teacher_code')
               ->from('udise_staffreg')
               ->where('school_key_id',$school_id)
               ->where('archive',1)
               ->order_by('teacher_name','ASC');
      $result = $this->db->get()->result();
      // print_r($result);
              if(!empty($result))
              {
                       $absent_list = [];
                       $old_unique_id = '';
                       $current_month_days = date('t',strtotime($date));
                       $month_year = date('Y-m',strtotime($date));
                       for($i=1;$i<=$current_month_days;$i++)
                       {
                         $date = date('Y-m-d',strtotime($month_year.'-'.$i));
  
               $abse[$i] = $this->emis_staff_attendance_absent_list_school_monthwise($table,$school_id,$date);

                    foreach($result as $index=>$staff_det)
                    {

                      $absent_list[$index]['teacher_name'] = $staff_det->teacher_name;
                      $absent_list[$index]['gender'] = $staff_det->gender;
                      $absent_list[$index]['teacher_code'] = $staff_det->teacher_code;
                      // print_r($abse[$i]);
                        $abse_staffs = $abse[$i];
                      // echo $abse
                      if(!empty($abse[$i]))
                      {
                        foreach($abse_staffs as $abse_staff_list){
                        // echo $staff_det->teacher_code.'=='.$abse_staff_list->teacher_code.'<br/>';
                                 
                                 // $absent_list[$i]['present'] = $abse_staff_list->present;
                                 // $absent_list[$i]['reason'] = $abse_staff_list->attres;

                        if($abse_staff_list->teacher_code == $staff_det->teacher_code && $abse_staff_list->attstatus !='')
                           {
                            // echo "id";



                                 $absent_list[$index][$i] = 0;
                                // $absent_list[$index][$i]['present'] = 0;
                                // $absent_list[$index][$i]['reason'] = $abse_staff_list->attres;
                                 $status = 0;
                                 $old_unique_id = $abse_staff_list->teacher_code;
                             
                           }

                           if($old_unique_id !=$staff_det->teacher_code){
                              $absent_list[$index][$i] = 1;
                             // $absent_list[$index][$i]['present'] = 1;
                             // $absent_list[$index][$i]['reason'] = '';

                           }
                        }
                       }
                       else
                      {
                        $absent_list[$index][$i] = '-1';
                       // $absent_list[$index][$i]['present'] = '-1';
                       // $absent_list[$index][$i]['reason'] = '';

                      }
                    }
                  
                  
              }
            }

                  // echo"<pre>";print_r($absent_list);echo"</pre>";die;

            return $absent_list;
    
        

  }


  public function emis_staff_attendance_absent_list_school_monthwise($table,$school_id,$date)
  {
    // echo $school_id;
      // $this->db->distinct();
      $this->db->select('b.id,,b.attstatus, b.attstatus,school_id,teacher_code,attres',false)
          ->from($table.' as b')
          ->where('b.date',$date)
          ->where('b.school_id',$school_id);
               // print_r($this->db->last_query());
      return $this->db->get()->result();

  }

  
  
  /****************************************************
      Teacher Update Api By Ramco Magesh
  *****************************************************/
  public function get_aadhar($aadhar) {
    $SQL = 'select teacher_code,teacher_name,aadhar_no from udise_staffreg where aadhar_no='.$aadhar.' limit 1';
    $query = $this->db->query($SQL);
        if($query==null)
            return null;
        else
            return $query->result();
  }
  
  public function update_staff_det($update){
    //print_r($update);die();
        $this->db->where('u_id',$update['u_id']);
        $this->db->update('udise_staffreg',$update);
        return $update['u_id'];
  }
  
  public function count_accountnumber($checkaccountnumber,$checkteachercode){
    $sql="select count(bank_acc) as countdata from teacher_dates where bank_acc=".$checkaccountnumber." and teacher_id not in(".$checkteachercode.");";
        $query = $this->db->query($sql);
        return $query->row()->countdata;
  }
  
  public function count_teacher($teachercode)
  {
    
        $this->db->select('count(teacher_id)as countdata');
        $this->db->from('teacher_dates');
        $this->db->where('teacher_id',$teachercode);
        $query = $this->db->get();
        return $query->row()->countdata;
    
  }
  
  public function update_staff_bank($bank){
    // $this->db->where('teacher_id',$bank['teacher_id']);
    // if($this->db->update('teacher_dates',$bank)){
    //  return true;
    // }else{
    //  return false;
    // }
        $this->db->select('id');
        $this->db->from('teacher_dates');
        $this->db->where('teacher_id',$bank['teacher_id']);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
          $this->db->where('teacher_id',$bank['teacher_id']);
          if($this->db->update('teacher_dates',$bank)){
            return true;
          }else{
            return false;
          } 
        }
        else
        {
          if($this->db->insert('teacher_dates',$bank)){
            return true;
          }else{
            return false;
          }
          
          // return $this->db->insert_id();
        }
      }
  public function updateregulation($regulation,$teacher_code){
        $this->db->where('teacher_id',$teacher_code);
        $this->db->delete('teacher_regu_dates');
        if(!empty($regulation)){
        //print_r($regulation);die('sadfasdfasdfasd');
        if($this->db->insert_batch('teacher_regu_dates',$regulation)){
         return true;
        }else return false;
    }else return false;
  }
  
  public function staff_training_maxid(){
        $sql="select MAX(training_id) as max from teacher_training_details;";
        $query = $this->db->query($sql);
        return $query->row()->max;
  }
  
  
  /*******************************************************
    Teacher Depuation by Ramco Magesh
  *******************************************************/
  
  public function get_depute_details($school_udise){
        $sql = "select teacher_name,type_teacher,subjects,teacherdepute_entry.teacher_code,
(case when category=1 then 'Teaching'
    when category=2 then 'Non-Teaching' else 'NA'
    end) as category from teacherdepute_entry
    
join udise_staffreg on udise_staffreg.teacher_code=teacherdepute_entry.teacher_code
join teacher_type on teacher_type.id=udise_staffreg.teacher_type 
join teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject 
where udise_code=".$school_udise." group by teacher_name";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
  

  
  
  
  
  function getallachooldist(){
    $sql="select * from schoolnew_district order by district_name asc;";
    $query=$this->db->query($sql);        
        return $query->result_array();
  }
  
  public function deputeall($where,$group){
        $sql = "select school_id,udise_code,school_name, students_school_child_count.district_id, district_name, 
                students_school_child_count.block_id,block_name,office_name,off_key_id from students_school_child_count
                join udise_offreg on udise_offreg.district_id=students_school_child_count.district_id where ".$where.$group."";
                
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
  public function Tabledescribe($tablename){
    $sql="desc ".$tablename.";";
    $query=$this->db->query($sql);
    return $query->result_array();
  }
  
  
  public function deputesave($data,$tablename,$reference){
    if(in_array($tablename,unserialize(HEADERTOKEN))){
      if(!$this->db->update($tablename,$data,$reference)){
        return $this->db->insert($tablename,$data);
      }else{
        //return true;
      }
      return true;
    }else if(in_array($tablename,unserialize(TOKENHEADER))){
      if($this->db->delete($tablename,$reference)){
        return $this->db->insert_batch($tablename,$data);
      }
      return true;
    }
    }

    public function getallschools() {
        $SQL="select school_id,school_name,udise_code from schoolnew_basicinfo";
        $query = $this->db->query($SQL);
      return $query->result();
    }
  
  public function staffsave($data,$tablename,$reference){
    //print_r($data);die();
    if(in_array($tablename,unserialize(HEADERTOKEN))){
      $this->db->insert($tablename,$data);
      return $this->db->insert_id();
    }
  }
  /*******************************************************
    Teacher Login Details
  *******************************************************/
  public function teacher_login_details($school_id){
        $sql = "select school_key_id,teacher_code,teacher_name,emis_username,ref from emisuser_teacher join udise_staffreg on udise_staffreg.u_id=emisuser_teacher.emis_user_id join students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id where school_key_id=".$school_id." and school_type_id in (1,2,3,4)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  
  /*********************************************************
    Training Details by Ramco Magesh
  **********************************************************/
//  public function trainingstaffdtl($school_id){
//    $sql="select a.id,b.teacher_name,a.teacher_code,a.training_type as training_type_id, c.training as training_type,a.training_other,a.trained_at,a.training_days,a.acyear,date_format(a.training_date,'%d/%m/%Y') AS training_date from teacher_training_details a 
// join udise_staffreg b on a.teacher_code = b.teacher_code
// join teacher_training c on a.training_type = c.id where a.isactive=1 and b.school_key_id=".$school_id." order by b.teacher_name asc;";
//    $query=$this->db->query($sql);
//    return $query->result_array();
//  }
  
  public function traineelist($id){
    $sql="select a.id,teacher_name,a.teacher_id,a.training_mode,a.teacher_code,a.training_type,a.training_other,a.trained_at,a.training_date,a.training_days from teacher_training_details a join udise_staffreg on udise_staffreg.teacher_id=a.teacher_id where a.id=".$id.";";
    $query=$this->db->query($sql);
    return $query->result_array();
  }
  
  public function staffname($school_id){
    $sql="select u_id,teacher_code,teacher_id,teacher_name,class_taught from udise_staffreg where archive=1 and school_key_id=".$school_id.";";
    $query= $this->db->query($sql);
    return $query->result_array();
  }
  
  public function listtrainingdtls(){    
    $sql="select id,training from teacher_training;";
    $query=$this->db->query($sql);
    return $query->result_array();
  }
  // public function trainstaffsave($data,$tablename,$ref){
  //  $query = $this->db->get_where($tablename,$ref);
  //  $lastrow=$query->last_row();
    
  //  if($lastrow->id!=''){
  //    $this->db->where('id',$lastrow->id);
  //           return $this->db->update($tablename,$data);
  //  }else{
  //    return $this->db->insert($tablename,$data);
  //  }
  // }

  public function trainstaffsave($data,$tablename,$id){
    if($id){
            $this->db->trans_start();
            $this->db->where('id',$id);
            $this->db->update($tablename,$data);
            $SID = $id;
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();            
    }else{
            $this->db->trans_start();
            $this->db->insert($tablename,$data);
            $SID = $this->db->insert_id();
            $affectedRows=$this->db->affected_rows();
            $this->db->trans_complete();            
    }
    
    if ($this->db->trans_status() === false) {
      $result = array( 'message' => 'Fail to Update the Details!',
                       'dataStatus' => true );
    } else if ($this->db->trans_status() === true) {
      if($affectedRows > 0 ) {
      $result = array( 'message' => 'Successfully Updates!',
                       'identificationPurpose' => 'PKID is '.$SID,
                       'dataStatus' => true );
    } else {
      $result = array( 'message' => 'There is no changes in details. Haven`t Updated Anything!.',
                       'dataStatus' => false );
      }
 }
 else{
      $result = array( 'message' => 'Something Went Wrong!.',
                       'dataStatus' => false );
 }
 return $result;
  }
  function delete_trainee_data($deletedid){
    $this->db->trans_start();
    $this->db->where('id', $deletedid);
    $this->db->delete('teacher_training_details'); 
    $affectedRows=$this->db->affected_rows();
    $this->db->trans_complete();            
    if ($this->db->trans_status() === false) {
         $result = array( 'message' => 'Fail to Delete the Details!',
                          'dataStatus' => true );
    } else if ($this->db->trans_status() === true) {
         if($affectedRows > 0 ) {
         $result = array( 'message' => 'Successfully Deleted!',
                          'dataStatus' => true );
         } else {
         $result = array( 'message' => 'TraineeId Not Found!.',
                          'dataStatus' => false );
         }
    }
    else{
         $result = array( 'message' => 'Something Went Wrong!.',
                          'dataStatus' => false );
    }
    return $result;
}

function training_details_report($ay,$teacher_id){
    $sql="select tt.training_date, tt.trained_at,
    case when tt.training_type = '' then tt.training_other
    when tt.training_type =0 then tt.training_other
    else t.training end as Training_type,  tt.training_mode, tt.training_days from teacher_training_details tt
    left join teacher_training t on t.id= tt.training_type
    where tt.teacher_id = ".$teacher_id." and acyear = '".$ay."' and isactive=1 order by training_date desc;";
    $query= $this->db->query($sql);
    return $query->result_array();
}
  /*public function update_training_staff_dtl($arr,$id){
    if($id != ''){
      $data = array('isactive' => 0,
                'updatedat' => date('Y-m-d h:i:s')
      );

      $this->db->where('id', $id);
      $this->db->update('teacher_training_details', $data);
    }
    $this->db->insert('teacher_training_details',$arr);
    $count = $this->db->affected_rows();
    return $count;
  }*/

  
  function get_training_staff_dtl($ac_year,$school){
    $this->db->select('a.id,b.teacher_name,a.teacher_id,a.teacher_code,a.training_type as training_type_id, c.training as training_type,a.training_other,a.trained_at,a.training_days,a.training_date,a.training_mode');
    $this->db->from('teacher_training_details a');
    $this->db->join('udise_staffreg b','a.teacher_id = b.teacher_id ','left');
    $this->db->join('teacher_training c','a.training_type = c.id','left');
    $this->db->where('a.isactive',1);    
    $this->db->where('b.school_key_id',$school);    
    if($ac_year != ''){
        $this->db->where('a.acyear',$ac_year);    
    }
    $this->db->order_by('b.teacher_name','asc');
    $result = $this->db->get()->result();
    return $result;
  }
  

  public function get_ac_year_from_teacher_training_details(){
    $this->db->select('acyear')->distinct();
    $this->db->from('teacher_training_details');
    $this->db->order_by('acyear','desc');
    return $this->db->get()->result();
  }
  /***********************************************************
    Teacher Volunteers
  ***********************************************************/
  
  public function get_teacher_subjects(){
    $this->db->select('id,subjects');
    $this->db->from('teacher_subjects');
    $query = $this->db->get();
    return $query->result();
  }
  
  
  public function volunteersstaffreg($singledata,$tablename){
    //print_r($singledata);die();
    return $this->db->insert($tablename,$singledata);
    }
  
  public function get_volunteers($aadhar){
    $sql="select id,school_key_id,teacher_name,teacher_code,aadhar_no,email,gender,staff_dob,staff_join,organization_type,organization_name,mbl_nmbr,academic,e_ug,e_pg,posting_nature,professional,Active,created_date,updated_date from teacher_volunteers where aadhar_no=".$aadhar."";
    $query=$this->db->query($sql);
    return $query->result_array();
    }
  
  /********************************************************
    END
  ********************************************************/
  
  /**PINDICS HM Evalution starts here by wesley**/

  public function get_teacher_details($school_id){
    
    $SQL = "select a.pi_id,a.teacher_id,a.hm_id,a.HM_EV_1,a.HM_EV_2,a.HM_EV_3,a.HM_EV_4,a.HM_EV_5,a.HM_EV_6,a.HM_EV_7,a.HM_EV_8,a.hm_ev_status,a.hm_ev_date,b.u_id,b.teacher_name from teacher_pindics a
    left join udise_staffreg b on b.u_id = a.teacher_id where a.status = 1 
    and b.school_key_id = ".$school_id."";
    $query = $this->db->query($SQL);
    return $query->result();
  }
  public function get_hm_details($school_id){
    $SQL = "select udise_staffreg.u_id as HM_id from udise_staffreg where school_key_id=".$school_id." 
    and teacher_type in (26,27,28,29) and archive='1';";    
    $query = $this->db->query($SQL);
    return $query->result_array();
  }

  public function pindics_single_teacher_detail($teacher_id){
    $this->db->select('*');
      $this->db->where('teacher_id',$teacher_id);
      $query = $this->db->get('teacher_pindics');
      $result = $query->result();
      if(empty($result)){
        $result = 'EMPTY';
        return $result;
      }else{        
        return $result;
      }
     // return $query->result();
  }

  public function pindics_hm_eval_insert($data){
    $this->db->where('teacher_id',$data['teacher_id']);
    return $this->db->update('teacher_pindics', $data);  
  }
  /**PINDICS HM Evalution ends here by wesley**/

                                
  
   public function get_fixation_staff_details($school_id)
  {
      $this->db->select('a.id,a.go_number,a.go_date,c.type_teacher,a.teacher_id,a.ac_head,                        a.surplus,a.appt_subject,d.subjects,b.teacher_name,a.go_dept,a.go_type,a.temp_go_number,a.temp_go_dept,a.temp_go_date,a.temp_go_upto_date,a.designation,a.isactive')
               ->from('teacher_post a')
               ->join('udise_staffreg b','b.teacher_code = a.teacher_id and a.school_key_id = b.school_Key_id','left')
               ->join('teacher_type c','c.id = a.designation','left')
               ->join('teacher_subjects d','d.id = a.appt_subject','left')
               ->where('a.school_key_id',$school_id)
               ->where('a.isactive',1);
      $staff_details = $this->db->get()->result();
  

      $this->db->select('count(designation) as sanc,sum(If(teacher_post.teacher_id !="",1,0)) as in_position ,a.type_teacher,b.subjects,sum(If(teacher_post.teacher_id ="",1,0)) as vacent,sum(iF(surplus=1,1,0)) as surplus')
               ->from('teacher_post')
               ->join('teacher_type a','a.id = teacher_post.designation','left')
               ->join('teacher_subjects b','b.id = teacher_post.appt_subject','left')
               ->where('teacher_post.school_key_id',$school_id)
               ->where('teacher_post.isactive',1)
               ->group_by('designation,appt_subject');
      $scale_register_summary = $this->db->get()->result();
   
    $this->db->select('u_id,teacher_code,teacher_name,teacher_type,appointed_subject,teacher_dates.head_account');
    $this->db->from('udise_staffreg')
             ->join('teacher_dates','teacher_dates.teacher_id = udise_staffreg.teacher_code and teacher_dates.school_key_id = udise_staffreg.school_key_id','left');
    $this->db->where('archive',1);
    $this->db->where('udise_staffreg.school_key_id',$school_id);
    // print_r($this->db->last_query());
    $staff_name = $this->db->get()->result();

    $this->db->select('id,subjects');
    $this->db->from('teacher_subjects');
    $subjects_list = $this->db->get()->result();

     $this->db->select('id,head_of_account');
     $this->db->from(' schoolnew_head_account');
     $head_account_list = $this->db->get()->result();

       $this->db->select('id,type_teacher');
       $this->db->from(' teacher_type');
       $teacher_type = $this->db->get()->result();
   


      $get_scale_register = array('scale_reg_details' =>$staff_details,'scale_reg_summary' => $scale_register_summary,'staff_name' => $staff_name,'subject_list' => $subjects_list,'head_account' => $head_account_list,'teacher_type' => $teacher_type);
      return $get_scale_register;

  }
  public function save_scale_register_details($scale_reg_data)
  {
   // print_r($scale_reg_data);
    $this->db->insert('teacher_post',$scale_reg_data);
    return true;

  }
  public function put_scale_register_details($staff_post_id,$staff)

{
  $this->db->update('teacher_post',$staff,array('id'=>$staff_post_id));
  return true;
}
 public function delete_scale_register_details($staff_post_id)
 {
   $this->db->update('teacher_post',array('isactive' => '0'),array('id'=>$staff_post_id));
   return true;
}         

public function get_bank_details($ifsc)
{
   // $PT = (string) $ifsc;
   $ifsccode = (string) $ifsc;
    $query ="select branch,bank_name,id from 
        schoolnew_branch 
     where  ifsc_code='".$ifsc."' ";
        $result = $this->db->query($query)->result();
        return $result;
}

function get_nsqf_training_staff_dtl($school){
  $this->db->select('id, school_key_id, teacher_name, gender, dob, mobile, aadhaar, soc_cat, qual_acad, qual_prof, appoint_sector, nature_of_appt, class_taught, industry_exp, training_exp, inductrain_receive_yn,inservtrain_receive_yn');
  $this->db->from('teacher_nsqf_staffs');
  $this->db->where('archive','1');
  $this->db->where('school_key_id',$school);    
  $this->db->order_by('teacher_name','asc');
  $result = $this->db->get()->result_array();
  return $result;
}

public function check_nsqf_staff_aadhar_dtl($aadhar) {
  $this->db->select('teacher_name');
  $this->db->from('teacher_nsqf_staffs');
  $this->db->where('aadhaar',$aadhar);
  $result = $this->db->get();
  if($result->num_rows() > 0){
    return $result->row()->teacher_name;
  }
  else{
    return null;
  }
}

function save_nsqf_trainee_staff_dtl($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->update('teacher_nsqf_staffs',$data);
    }
    else{
      $this->db->insert('teacher_nsqf_staffs',$data); 
    }
    $affectedRows=$this->db->affected_rows();

    return $affectedRows > 0 ? true : false; 
}

function delete_nsqf_trainee_staff_dtl($id){
  if(!empty($id)){
    $this->db->where('id',$id);
    $this->db->update('teacher_nsqf_staffs',array('archive'=>'0'));
    $affectedRows=$this->db->affected_rows();
    return $affectedRows > 0 ? true : false; 
  }
  else{
    return false;
  }
}

  function getschoollistforstafffixation($did){
    $data = array('High School','Higher Secondary School');
    $this->db->select('students_school_child_count.id, students_school_child_count.school_id, 
        students_school_child_count.district_id, students_school_child_count.block_id, 
        students_school_child_count.edu_dist_id, students_school_child_count.district_name, 
        students_school_child_count.block_name, students_school_child_count.edu_dist_name, 
        students_school_child_count.udise_code, students_school_child_count.school_name, 
        students_school_child_count.school_type, students_school_child_count.school_type_id, 
        students_school_child_count.cate_id, students_school_child_count.management, students_school_child_count.category, 
        students_school_child_count.cate_type, students_school_child_count.section_nos, 
        students_school_child_count.low_class, students_school_child_count.high_class, 
        students_school_child_count.school_type, students_school_child_count.catty_id,
        ,schoolnew_academic_detail.school_type as school_category_type')
         ->from('students_school_child_count')
         ->join('schoolnew_academic_detail','schoolnew_academic_detail.school_key_id = students_school_child_count.school_id','left') 
         ->where_in('students_school_child_count.cate_type',$data)
         ->where('students_school_child_count.district_id',$did)
         ->where('students_school_child_count.school_type_id',1)
         ->order_by('students_school_child_count.udise_code','asc');                 
          $query = $this->db->get();  
      return $query->result();
 // ('High School','Higher Secondary School')
  }

  function getstafffixationdetails($sch){
    
    $this->db->select('id, school_id, class_1_5_em, class_6_em, class_7_em, class_8_em, class_6_8_em_total, class_9_em, class_10_em, class_9_10_em_total, class_6_10_em_total, 
                                      class_1_5_tm, class_6_tm, class_7_tm, class_8_tm, class_6_8_tm_total, class_9_tm, class_10_tm, class_9_10_tm_total, class_6_10_tm_total, 
      section_1_5, section_6_8, section_9_10, section_6_10, 
      posts_by_tt, status,
      elig_sg, elig_bt_sci, elig_bt_mat, elig_bt_eng, elig_bt_tam, elig_bt_ss, elig_bt_total, elig_total, 
      pg_period_sg, pg_period_bt_sci, pg_period_bt_mat, pg_period_bt_eng, pg_period_bt_tam, pg_period_bt_ss, pg_period_bt_total, pg_period_total, 
      net_sg, net_bt_sci, net_bt_mat, net_bt_eng, net_bt_tam, net_bt_ss, net_bt_total, net_total, 
      sanc_sg, sanc_bt_sci, sanc_bt_mat, sanc_bt_eng, sanc_bt_tam, sanc_bt_ss, sanc_bt_total, sanc_total,
     surplus_sg, surplus_bt_sci, surplus_bt_mat, surplus_bt_eng, surplus_bt_tam, surplus_bt_ss, surplus_bt_total, surplus_total, 
      need_sg, need_bt_sci, need_bt_mat, need_bt_eng, need_bt_tam, need_bt_ss, need_bt_total, need_total, 
      in_position_sg, in_position_bt_sci, in_position_bt_mat, in_position_bt_eng, in_position_bt_tam, in_position_bt_ss, in_position_bt_total, in_position_total, 
      vacant_sg, vacant_bt_sci, vacant_bt_mat, vacant_bt_eng, vacant_bt_tam, vacant_bt_ss, vacant_bt_total, vacant_total, updated_date')
         ->from('staffix_dse_sg_bt')
         ->where('staffix_dse_sg_bt.school_id',$sch);
          $query = $this->db->get();  
      return $query->result_array();
 
  }

  function savestafffixationdetails($data){
   if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->update('staffix_dse_sg_bt',$data);
    }
    else{
      $this->db->insert('staffix_dse_sg_bt',$data); 
    }
    $affectedRows=$this->db->affected_rows();

    return $affectedRows > 0 ? true : false;    
 
  }
  function get_pt_teachers_list($school_id){
    $this->db->select('u_id,teacher_id,teacher_code,udise_code,school_key_id,teacher_name')
         ->from('udise_staffreg')
         ->where('teacher_type',7)
         ->where('archive',1)
         ->where('school_key_id',$school_id);
    $query = $this->db->get();  
    return $query->result_array();
  }

  // function get_pt_teacher_paided_list($school_id){
  //   $this->db->select('u.teacher_name, pt.paid_yn,pt.paid_date,id, pt.teacher_id, pt.school_id, pt.month, pt.isactive, pt.modified_date')
  //        ->from('udise_staffreg u')
  //        ->join('teachers_pt_paid pt','pt.school_id = u.school_key_id','left') 
  //        ->where('teacher_type',7)
  //        ->where('archive',1)
  //        ->where('pt.month',03)
  //        ->where('school_key_id',$school_id);
  //   // $this->db->select('u.teacher_name, pt.paid_yn,pt.paid_date,id, pt.teacher_id, pt.school_id, pt.month, pt.isactive, pt.modified_date')
  //   //      ->from('udise_staffreg u')
  //   //      ->join('teachers_pt_paid pt','pt.school_id = u.school_key_id','left') 
  //   //      ->where('school_key_id',$school_id);
  //   $query = $this->db->get();  
  //   return $query->result_array();
  // }
  function update_pt_teacher_paid_details($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->update('teachers_pt_paid',$data);
      $affectedRows=$this->db->affected_rows();
      return $affectedRows > 0 ? $data['id'] : 0;       
    }
    else{
      $data['created_date']= date("Y-m-d");
      $this->db->insert('teachers_pt_paid',$data); 
      $affectedRows=$this->db->affected_rows();
      $insertId = $this->db->insert_id();
      return $affectedRows > 0 ? $insertId : 0;       
    }
    // return $affectedRows > 0 ? true : false;       
  }

  // function get_pt_teacher_report($month){
  //   /* GROUP BY pt.school_id*/
  //   $SQL="select sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type, 
  //         sum(case when pt.paid_yn = 1 then 1 else 0 end) as Paid,
  //         sum(case when pt.paid_yn = 2 then 1 else 0 end) as Not_Paid
  //         from students_school_child_count sc
  //         left join teachers_pt_paid pt on sc.school_id = pt.school_id 
  //         where pt.month in (".$month.") group by sc.school_id
  //         UNION
  //         select '','','','','',
  //         sum(case when pt.paid_yn = 1 and month = ".$month." then 1 else 0 end) as Paid_Total,
  //         sum(case when pt.paid_yn = 2 and month = ".$month." then 1 else 0 end) as Not_Paid_Total
  //         from teachers_pt_paid pt;";
  //   $query = $this->db->query($SQL);
  //   return $query->result(); 
  // }


  function get_pt_teacher_report($month,$select,$where,$groupby)
  {
    // $SQL="select sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type, 
    // sum(case when u.teacher_type = 7 then 1 else 0 end) as PT_Teachers,
    // sum(case when u.teacher_type = 7 and pt.paid_yn = 1 then 1 else 0 end) as Paid,
    // sum(case when u.teacher_type = 7 and pt.paid_yn = 2 then 1 else 0 end) as Not_Paid
    // from students_school_child_count sc 
    // left join udise_staffreg u on u.school_key_id = sc.school_id
    // left join teachers_pt_paid pt on pt.teacher_id =u.u_id and pt.month=".$month."
    // where u.archive = 1 and sc.school_type_id in (1,2,4) and sc.district_id=".$dist." 
    // group by sc.school_id having PT_Teachers >0;";
    // $SQL="select sc.district_name, sc.block_name, sc.udise_code, sc.school_name, sc.school_type,sc.school_id,sc.district_id,sc.block_id,
    $SQL="select ".$select.",
    sum(case when u.teacher_type = 7 then 1 else 0 end) as PT_Teachers,
    sum(case when u.teacher_type = 7 and pt.paid_yn = 1 then 1 else 0 end) as Paid,
    sum(case when u.teacher_type = 7 and pt.paid_yn = 2 then 1 else 0 end) as Not_Paid
    from students_school_child_count sc 
    left join udise_staffreg u on u.school_key_id = sc.school_id
    left join teachers_pt_paid pt on pt.teacher_id =u.u_id and pt.month=".$month."
    where u.archive = 1 and sc.school_type_id in (1,2,4) ".$where." 
    group by ".$groupby." having PT_Teachers >0;";
    
    $query = $this->db->query($SQL);
    // print_r($this->db->last_query());
    // die();
    return $query->result(); 
  }

  function get_pt_teacher_list($school_id,$month){
    $SQL="SELECT u.u_id,u.teacher_code,u.teacher_name,u.teacher_type,p.id,p.teacher_id,p.school_id,p.paid_yn,p.month,p.paid_date,p.isactive FROM udise_staffreg u
    LEFT JOIN teachers_pt_paid p ON p.school_id = u.school_key_id AND u.u_id = p.teacher_id AND p.month = ".$month."
    WHERE u.teacher_type = 7 AND u.archive = 1 AND u.school_key_id = ".$school_id."
    ORDER BY u.teacher_name ASC;";
    $query = $this->db->query($SQL);
    return $query->result(); 
  }

  public function get_districtid()
    {
      $this->db->select('id,district_code,district_name');
      $this->db->from('schoolnew_district');
      $query =  $this->db->get();
      return $query->result();
    }

  public function get_approval_request($dist){
    $SQL="SELECT th.id, th.teacher_uid, th.teacher_type, th.from_school_id, th.to_school_id, 
    th.transfer_date, th.admit_date, th.transfer_reason,
    (CASE WHEN th.transfer_reason=1 THEN 'Retried' ELSE 
     CASE WHEN th.transfer_reason=2 THEN 'Expired' ELSE
     CASE WHEN th.transfer_reason=3 THEN 'Unauthorised' END END END) as reason, th.approve_status, 
    th.approve_date,sc.district_id,sc.cate_type as from_school_category_type,
    sc.udise_code as from_school_udise_code,sc.school_name as from_school_name ,
    sc.school_type as from_school_type,us.archive,us.teacher_name 
    FROM udise_staffreg us 
    left join teachers_cpool_history th on th.teacher_uid=us.u_id and us.archive = 1
    left join students_school_child_count sc on sc.school_id=th.from_school_id and sc.school_type_id in (1,2,4)
    where th.approve_status != 2 and sc.district_id = ".$dist.";";
    $query = $this->db->query($SQL);
    return $query->result(); 
  }

  public function searchstaffs($where_condition,$like_condition)
  {
      $this->db->select('udise_staffreg.u_id,udise_staffreg.teacher_name,udise_staffreg.teacher_name_tamil,udise_staffreg.teacher_id,udise_staffreg.teacher_code,
      udise_staffreg.gender,udise_staffreg.staff_dob,udise_staffreg.aadhar_no,udise_staffreg.e_prsnt_distrct,schoolnew_district.district_name,udise_staffreg.mbl_nmbr,udise_staffreg.teacher_type,
      teacher_type.type_teacher AS desgination,teacher_type.category AS category,udise_staffreg.udise_code,udise_staffreg.school_key_id,
      schoolnew_basicinfo.school_name,udise_staffreg.status')
               ->from('udise_staffreg')
               ->join('schoolnew_basicinfo','schoolnew_basicinfo.school_id= udise_staffreg.school_key_id','left')
               ->join('schoolnew_district','schoolnew_district.id= udise_staffreg.e_prsnt_distrct','left')
               ->join('teacher_type','teacher_type.id = udise_staffreg.teacher_type','left')
               ->where($where_condition);
               if(!empty($like_condition)){
                  $this->db->like($like_condition);
               }
      $result = $this->db->get()->result_array();
      // print_r($this->db->last_query());   
      // die();
      return $result;
  }
  public function Teacher_training_det($dist,$school_type,$training_mode)
  {
    if($training_mode==1)
    {
     $SQL="select sc.block_name, u.teacher_id,u.teacher_name, t.type_teacher, sc.udise_code, sc.school_name,tt.training,td.trained_at,sum(training_days) as Days from students_school_child_count sc
 left join udise_staffreg u on u.school_key_id = sc.school_id and sc.school_type_id in (1,2,4) and u.archive = 1
 join teacher_type t on t.id = u.teacher_type
 left join teacher_training_details td on td.teacher_code = u.teacher_code and u.archive = 1
 left join teacher_training tt on tt.id = td.training_type
 where sc.school_type_id in ($school_type) and u.archive = 1 and sc.district_id = $dist and t.category = 1 group by u.u_id, tt.training,td.trained_at having Days >0";
    }
    else if($training_mode==2)
    {
     $SQL="select sc.block_name, u.teacher_id, u.teacher_name, t.type_teacher, sc.udise_code, sc.school_name, sum(training_days) as Days from students_school_child_count sc
 left join udise_staffreg u on u.school_key_id = sc.school_id and sc.school_type_id in (1,2,4) and u.archive = 1
 join teacher_type t on t.id = u.teacher_type
 left join teacher_training_details td on td.teacher_code = u.teacher_code and u.archive = 1
 left join teacher_training tt on tt.id = td.training_type
 where sc.school_type_id in ($school_type) and u.archive = 1 and sc.district_id = $dist and t.category = 1 group by u.u_id having Days is Null or Days = 0";
    }
    
    $query = $this->db->query($SQL);
    return $query->result_array(); 
  }
  
  function staff_training_conducted() {
    $SQL="select ttd.training_id, ttd.training_date,ttd.trained_at,ttd.training_mode,ttd.training_days, ttd.acyear, count(ttd.teacher_id) as teacher_count,GROUP_CONCAT(usr.teacher_name) AS teachers from teacher_training_details ttd
          left join udise_staffreg usr on usr.teacher_id = ttd.teacher_id
          where ttd.isactive = 1 and ttd.training_id != '' group by ttd.training_id;";
    $query = $this->db->query($SQL);
    return $query->result_array(); 
  }
  
  function staff_training_attendedby($id) {
    $SQL="select usr.teacher_type as teacher_type_id ,tt.type_teacher as teacher_type_label,usr.teacher_id,usr.teacher_name,sscc.school_id,sscc.school_name
    from udise_staffreg usr
    left join students_school_child_count sscc on usr.school_key_id=sscc.school_id
    left join teacher_type tt on tt.id = usr.teacher_type
    where usr.teacher_id = ".$id." ;";
    $query = $this->db->query($SQL);
    return $query->result_array(); 
  }

  function staff_training_conducted_save($staff) {
      if(!empty($staff)){
         if($this->db->insert_batch('teacher_training_details',$staff)){
            return true;
         }else return false;
      }else return false;
  } 

  function staff_training_conducted_update($staff) {
    if(!empty($staff)){
       if($this->db->update_batch('teacher_training_details',$staff,'id')){
          return true;
       }else return false;
    }else return false;
  } 

  function teacher_training_details_inactive($idarr,$training_id) {
    $SQL="UPDATE teacher_training_details
             SET isactive = 0
           WHERE id IN (".implode(',',$idarr).") and training_id = ".$training_id.";";
    $query = $this->db->query($SQL);
    $affectedRows=$this->db->affected_rows();
    return $affectedRows;
  }

  function seachteacherbygivencondition($where){
    $SQL="SELECT teacher_id,teacher_code,teacher_name,archive,
    (SELECT type_teacher FROM teacher_type WHERE id=udise_staffreg.teacher_type) AS teacher_type,
    (SELECT subjects FROM teacher_subjects WHERE id=udise_staffreg.appointed_subject) AS appointed_subject,
    staff_dob
    FROM udise_staffreg".$where;

    //echo($SQL);die();
    $query=$this->db->query($SQL);
    return $query->result_array();
  }  
  function getlistteachers($where){
    $SQL="SELECT teacher_id,teacher_code,teacher_name,archive,
    (SELECT type_teacher FROM teacher_type WHERE id=udise_staffreg.teacher_type) AS teacher_type,
    (SELECT subjects FROM teacher_subjects WHERE id=udise_staffreg.appointed_subject) AS appointed_subject,
    staff_dob,staff_join,schoolnew_basicinfo.udise_code,school_name,school_type,mbl_nmbr
    FROM udise_staffreg
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=udise_staffreg.school_key_id
    JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
    ".$where;
    //echo($SQL);die();
    $query=$this->db->query($SQL);
    return $query->result_array();
  }

  /**Teacher Volunteer by karthick**/	

  public function teacher_volunteersave($tablename,$data){
    $this->db->insert($tablename,$data);
    return $data;
  }

  public function get_teacher_volunteer() {
    $SQL="select * from teacher_volunteers ";
    $query = $this->db->query($SQL);
    return $query->result_array();
  }

  /**********************************************************************************
    Teacher List and School List function Done by - Ramco Magesh
*************************************************************************************/
  public function fetchpassword($udise){
    $sql="select emis_username,emis_password,ref from emis_userlogin where emis_username=".$udise.";";
    //echo $sql; die();
    $query =$this->db->query($sql);
    return $query->result_array();
  }
  
  public function fetchlist($udise){
    $sql="select school_id,school_name,old_udise_code,udise_code from schoolnew_basicinfo where udise_code=".$udise.";";
    //echo $sql;die();
    $query =$this->db->query($sql);
    return $query->result_array();
  }
  
  public function schoolnamesave($data,$reference){
    $this->db->update("schoolnew_basicinfo",$data,$reference);
    $this->db->update("students_school_child_count",$data,$reference);
    return true;
  }
  
  public function teachersmalllist($aadhar){
    $sql="select u_id,teacher_id,teacher_code,school_key_id,udise_code,teacher_name,archive,status,type_teacher,teacher_type from udise_staffreg 
    join teacher_type on teacher_type.id=udise_staffreg.teacher_type where aadhar_no=".$aadhar." and archive=0;";
    $query=$this->db->query($sql);
    if($query==null){
      return null;
    }else{
      return $query->result_array();
    }
  }
  public function teacherschoolsave($firstarray,$reference,$secondarray,$reference1){
    $this->db->update("udise_staffreg",$firstarray,$reference);
    $this->db->update("teachers_cpool_history",$secondarray,$reference1);
    return true;
  }
  
  public function studentsflaglist($student_unique_id){
    $sql="select student_unique_id,student_name,student_school_id,hm_tc_flag from students_transfer_certificate_details where student_unique_id=".$student_unique_id.";";
    $query=$this->db->query($sql);
    if($query==null){
      return null;
    }else{
      return $query->result_array();
    }
  }
  public function studentsflagsave($firstarray,$reference){
    return $this->db->update("students_transfer_certificate_details",$firstarray,$reference);
  }

  
  /********************************************************************************************
    Ends here Teacher and School List done by - Ramco Magesh
  ********************************************************************************************/

  public function teacherdropdown(){
    $SQL="select teachers_roles.id, teachers_roles.teacher_id, teachers_roles.role_id, teachers_roles.subject, teachers_roles.class, 
          udise_staffreg.u_id, udise_staffreg.teacher_code, udise_staffreg.teacher_name
          from teachers_roles 
          left join udise_staffreg on udise_staffreg.teacher_id = teachers_roles.teacher_id where teachers_roles.role_id = 2 and teachers_roles.isactive = 1;";
    $query=$this->db->query($SQL);
    return $query->result_array();
  }

  public function calltreetrack($arr){
    // die();
    if(count($arr)>0){
				if((int)$arr[0]->RoleID  == 1){
                $SQL="select teachers_calltree_tracking.id as IndexID,
                teachers_calltree_tracking.call_id as CallReference,
                teachers_calltree_tracking.receive_date as RecDate,
                teachers_calltree_tracking.phone as PhoneNo,
                teachers_calltree_tracking.subject as AssignedSub,
                teachers_calltree_tracking.class as AssignedCls,
                teachers_calltree_tracking.assigned_teacher_id as AssignTeach,
                udise_staffreg.teacher_name
                from teachers_calltree_tracking
                left join udise_staffreg on udise_staffreg.teacher_id = teachers_calltree_tracking.assigned_teacher_id 
                where teachers_calltree_tracking.subject = '".$arr[0]->AssignedSub."' and teachers_calltree_tracking.class = ".$arr[0]->AssignedCls." and teachers_calltree_tracking.isactive = 1 and teachers_calltree_tracking.assigned_teacher_id =".$arr[0]->TeachID." ;";
                $query=$this->db->query($SQL);
                return $query->result_array();
							}
				else if((int)$arr[0]->RoleID  == 2){
                $SQL="select teachers_calltree_tracking.id as IndexID,
                teachers_calltree_tracking.call_id as CallReference,
                teachers_calltree_tracking.receive_date as RecDate,
                teachers_calltree_tracking.phone as PhoneNo,
                teachers_calltree_tracking.subject as Subject,
                teachers_calltree_tracking.class as Class,
                teachers_calltree_tracking.response_date as RespoDate,
                teachers_calltree_tracking.status as CallStatus,
                teachers_calltree_tracking.remarks as CallRemarks,
                teachers_calltree_tracking.no_of_calls as NoOfCalls
                from teachers_calltree_tracking 
                where teachers_calltree_tracking.assigned_teacher_id =".$arr[0]->TeachID." and teachers_calltree_tracking.isactive = 1;";
                $query=$this->db->query($SQL);
                return $query->result_array();
        }
    }else{
           return array();
    }
  }

  public function calltreetrack2($param,$where){
    // echo $this->db->count_all('teachers_calltree_tracking');
    $this->db->select($param);
    $this->db->from('teachers_calltree_tracking');
    if(!empty($where['assigned_by'])){
      $this->db->join('udise_staffreg', 'udise_staffreg.teacher_id = teachers_calltree_tracking.assigned_teacher_id','left');
    }
    $this->db->where($where);
    $result = $this->db->get()->result();
    return $result;
  }

  public function update_teachers_calltree_tracking($where,$records){
   // print_r($where);
   // print_r($records);die();
    $this->db->trans_start();
    $this->db->where($where);
    $this->db->update('teachers_calltree_tracking',$records);
    $affectedRows=$this->db->affected_rows();
    $this->db->trans_complete();            
    if ($this->db->trans_status() === false) {
      $result = array( 'message' => 'Fail to Update the Details. Try again !',
                       'dataStatus' => false );
    } else if ($this->db->trans_status() === true) {
      if($affectedRows > 0 ) {
        $result = array( 'message' => 'Successfully Updated !',
                       'dataStatus' => true );
      } else {
        $result = array( 'message' => 'There is no changes in details almost same. Haven`t Update Anything !',
                       'dataStatus' => false );
      }
    } else{
      $result = array( 'message' => 'Something Went Wrong. Try again !',
                       'dataStatus' => false );
    }
    return $result;
  }

  public function updateStfID($uid,$code){
    $this->db->select('teacher_id'); 
    $this->db->where('u_id',$uid);
    $query = $this->db->get('udise_staffreg');
    $teacher_id = $query->first_row()->teacher_id;
    if($teacher_id == ''){
      $SQL = "UPDATE `udise_staffreg` SET `teacher_id` = concat(left(".$code.",1),lpad(".$uid.",7,0))
             WHERE `u_id`=".$uid;
      $query = $this->db->query($SQL);
      $affectedRows=$this->db->affected_rows();
      $result = ($affectedRows > 0 ) ? true : false;
      return $result;         
    }else{ return false; }
  }

  public function updateStfQRCODE($uid){
    $this->db->select('teacher_id,qr_code'); 
    $this->db->where('u_id',$uid);
    $query = $this->db->get('udise_staffreg');
    $teacher_id = $query->first_row()->teacher_id;
    $qr_code = $query->first_row()->qr_code;
    if($qr_code == ''){
      $SQL = "UPDATE `udise_staffreg` SET `qr_code` = mid(md5(concat(".$teacher_id.")),5,12)
             WHERE `u_id`=".$uid;
      $query = $this->db->query($SQL);
      $affectedRows=$this->db->affected_rows();
      $result = ($affectedRows > 0 ) ? true : false;
      return $result;         
    }else{ return false; }  
  }
}
?>