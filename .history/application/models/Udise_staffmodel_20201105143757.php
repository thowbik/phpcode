 <?php

class Udise_staffmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    // insert staff1 table data
    function staffinsrt($record){
      $this->db->insert('udise_staffinfo',$record);
    }

    // update Staff Details
    function updatedatastaff($data,$school_udise)
    {
      $this->db->where('udise_code', $school_udise);      
      return $this->db->update('udise_staffinfo', $data);         
    }

     // getting staff details
    function get_staff1($school_udise){
      $this->db->select('accntnt,lib_asst,lab_asst,udc_hedclrk,ldc,peon_mts,night_wtchmn,tchingstff_reg,tchingstff_cntrct,prtme_instctr');
      $this->db->where('udise_code',$school_udise);
      $query = $this->db->get('udise_staffinfo');
      return $query->result();
    }
function get_bank_details($ifsc)
{
	 // $PT = (string) $ifsc;
	 $ifsccode = (string) $ifsc;
	  $query ="select branch,bank_name,id from 
        schoolnew_branch 
		 where  ifsc_code='".$ifsc."' ";
        $result = $this->db->query($query)->result();
        return $result;
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
$this->db->select('udise_staffreg.u_id,udise_staffreg.school_key_id,udise_staffreg.teacher_code,udise_staffreg.teacher_name,udise_staffreg.social_category,udise_staffreg.e_blood_grp,udise_staffreg.gender,udise_staffreg.staff_dob,udise_staffreg.staff_psjoin,udise_staffreg.professional,
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
	function staffregbankdata($bankdetails,$check=0){
		//print_r($bankdetails);
      //$this->db->set('createdat', mdate('%Y-%m-%d %H:%i:%s', now()));

      if($check==0){
          $this->db->insert('teacher_dates',$bankdetails);
          $bd = $this->db->insert_id();  
      }
    
      return $bd;
    }
	 function volunteersstaffreg($data){
     
          $this->db->insert('teacher_volunteers',$data);
          $cid = $this->db->insert_id();
         return $cid;
    }
	function volunteersstaffreg_subjects($data){
     
          $this->db->insert('teacher_volunteers_subjects',$data);
          $vid = $this->db->insert_id();
          return $vid;
    }
	function get_volunteers($aadharno){
       $this->db->select('*'); 
       $this->db->from('teacher_volunteers');
       $this->db->where('aadhar_no',$aadharno); 
       $query =  $this->db->get();
       return $query->result();
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
    function updatestaffregdata($data,$user_id)
    {
      // $this->db->where('udise_code', $school_udise);
      $this->db->where('u_id',$user_id);
      return $this->db->update('udise_staffreg', $data);         
    }

    /***Ramco Magesh **/
    
    function get_academic($academic) {
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
	function get_teacher_type(){
		$this->db->select('id,type_teacher');
		$this->db->from('teacher_type');
		$this->db->where('category',1); 
		$query = $this->db->get();
		return $query->result();
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

    public function get_cat_cond($id)
    {
     $this->db->select('*');
     $this->db->where('id',$id);
     $this->db->from('teacher_type');
     $query = $this->db->get();
     // print_r($this->db->last_query());
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
	function get_teacher_subjects(){
		$this->db->select('id,subjects');
		$this->db->from('teacher_subjects');
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
    
    function get_aadhar($aadhar) {
        $SQL = 'select teacher_code,teacher_name,aadhar_no from udise_staffreg where aadhar_no='.$aadhar.' limit 1';
        $query = $this->db->query($SQL);
            if($query==null)
                return null;
            else
                return $query->result();
    }
	function get_aadhar_volunteers($aadhar) {
        $SQL = 'select id,teacher_name,aadhar_no,organization_name from teacher_volunteers where aadhar_no='.$aadhar.' limit 1;';
        //echo $SQL;
        //die();
        $query = $this->db->query($SQL);
        return $query->result();
    }
    
   
   
   
    
      // geeting the staff data
    function get_staff_form_details($unique_id_staff)
	{
      
    $SQL='select udise_staffreg.u_id,udise_staffreg.teacher_name,udise_staffreg.teacher_code,udise_staffreg.teacher_id,udise_staffreg.staff_dob,teacher_social_category.social_cat,
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,suffix.suffix as suf_name,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,schoolnew_district.district_name,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,udise_staffreg.academic,baseapp_bloodgroup.group,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,  teacher_professional_qualify.professional,udise_staffreg.e_ug,udise_staffreg.e_pg,udise_staffreg.subject1,udise_staffreg.subject2,udise_staffreg.subject3,
        appointedsubject.subjects as appsub,s1.subjects as ts1,s2.subjects as ts2,s3.subjects as ts3,s4.subjects as ts4,s5.subjects as ts5,s6.subjects as ts6,udise_staffreg.professional as tprofessional,udise_staffreg.teacher_type,udise_staffreg.appointed_subject,
        teacher_type.type_teacher as desgination,teacher_type.category as category,teacher_academic_qualify.academic_teacher,teacher_ug_degree.ug_degree, teacher_pg_degree.pg_degree,udise_staffreg.e_picid
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
left join teacher_subjects as s4 on s4.id=udise_staffreg.subject4
left join teacher_subjects as s5 on s5.id=udise_staffreg.subject5
left join teacher_subjects as s6 on s6.id=udise_staffreg.subject6
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join suffix on suffix.id=udise_staffreg.suffix
left join teacher_ug_degree on teacher_ug_degree.id=udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id=udise_staffreg.e_pg
where udise_staffreg.u_id='.$unique_id_staff;
       
		$query = $this->db->query($SQL);
    // print_r($this->db->last_query());
    	return $query->result();
        
    }
	function get_teachingstaff_list($school_id)
	{
		$sql="SELECT a.udise_code, a.teacher_name,a.teacher_code,b.question1,emis_no1,emis_no2,emis_no3,c.type_teacher

FROM udise_staffreg a 
left join teachers_child_studyingstatus b ON a.teacher_code=b.teacher_code
 JOIN teacher_type c ON a.teacher_type = c.id AND c.category = 1
WHERE a.school_key_id = ".$school_id." AND a.archive=1 ";

 $query = $this->db->query($sql);
		   //print_r($this->db->last_query());
        return $query->result();
		
	}
	function teacherchild_details($teachercode)
   {
	   $this->db->select('teacher_code');
        $this->db->from('teachers_child_studyingstatus');
        $this->db->where('teacher_code',$teachercode);
		
        $query = $this->db->get();
        $result = $query->result();
        return $result; 
   }
function teacher_childstudying_status($data){
     $this->db->insert('teachers_child_studyingstatus',$data); 
     return $this->db->insert_id();
    }
function teacher_childstudying_status_update($teacher_code,$data)
{
	$this->db->where('teacher_code',$teacher_code);
         $this->db->update('teachers_child_studyingstatus',$data); 
		return $this->db->insert_id();
	
}
    
    function get_staff_details($school_udise,$tmp){
    
        $user_type_id=$this->session->userdata('emis_user_type_id');
        $SQL='select udise_staffreg.deputed,udise_staffreg.u_id,udise_staffreg.off_id,udise_staffreg.status,udise_staffreg.school_key_id,udise_staffreg.teacher_name,udise_staffreg.teacher_name_tamil,udise_staffreg.teacher_code,udise_staffreg.staff_dob,teacher_social_category.social_cat,
        
        udise_staffreg.gender,udise_staffreg.aadhar_no,udise_staffreg.e_blood_grp,udise_staffreg.social_category,suffix.suffix as suf_name,udise_staffreg.e_picid as photo,
        udise_staffreg.e_prnts_nme,udise_staffreg.teacher_mother_name,udise_staffreg.teacher_spouse_name,udise_staffreg.disability_type,
        udise_staffreg.types_disability,udise_staffreg.staff_join,udise_staffreg.staff_pjoin,udise_staffreg.staff_psjoin,schoolnew_district.district_name,
        udise_staffreg.e_prsnt_place,udise_staffreg.e_prsnt_distrct,udise_staffreg.e_prsnt_pincode,udise_staffreg.cps_gps,
        udise_staffreg.suffix,udise_staffreg.cps_gps_details,udise_staffreg.aadhar_no,udise_staffreg.appointment_nature,udise_staffreg.academic,baseapp_bloodgroup.group,
        udise_staffreg.recruit_type,udise_staffreg.recruit_rank,udise_staffreg.recruit_year,
        udise_staffreg.e_prsnt_doorno,udise_staffreg.e_prsnt_street,udise_staffreg.email_id,udise_staffreg.mbl_nmbr,  teacher_professional_qualify.professional,udise_staffreg.e_ug,udise_staffreg.e_pg,udise_staffreg.subject1,udise_staffreg.subject2,udise_staffreg.subject3,udise_staffreg.subject4,udise_staffreg.subject5,udise_staffreg.subject6,
        appointedsubject.subjects as appsub,s1.subjects as ts1,s2.subjects as ts2,s3.subjects as ts3,udise_staffreg.professional as tprofessional,udise_staffreg.teacher_type,udise_staffreg.appointed_subject,
        teacher_type.type_teacher as desgination,teacher_type.category as category,teacher_academic_qualify.academic_teacher,teacher_ug_degree.ug_degree, teacher_pg_degree.pg_degree 
        deputed_place,depute_key,depute_frmdate,depute_todate,udise_staffreg.trng_needed,
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
left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1
left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2
left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3
left join teacher_subjects as s4 on s4.id=udise_staffreg.subject4
left join teacher_subjects as s5 on s5.id=udise_staffreg.subject5
left join teacher_subjects as s6 on s6.id=udise_staffreg.subject6
left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
left join teacher_dates on teacher_dates.teacher_id=udise_staffreg.teacher_code
left join schoolnew_branch on schoolnew_branch.id=teacher_dates.branch_id
left join suffix on suffix.id = udise_staffreg.suffix 
left join teacher_ug_degree on teacher_ug_degree.id = udise_staffreg.e_ug
left join teacher_pg_degree on teacher_pg_degree.id = udise_staffreg.e_pg
left join teacherdepute_entry on teacherdepute_entry.teacher_code=udise_staffreg.teacher_code
where '.($user_type_id==1?'udise_staffreg.school_key_id':'udise_staffreg.off_id').'='.$school_udise.($tmp!=null?' AND udise_offreg.office_type_id='.$tmp:' AND udise_staffreg.archive=1 group by teacher_code;');
    //echo($SQL);die();
		$query = $this->db->query($SQL);
    // print_r($this->db->last_query());
    	return $query->result();
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
   
    function get_depute_details($school_udise){
        $sql = "select teacher_name,type_teacher,subjects,teacherdepute_entry.teacher_code,
(case when category=1 then 'Teaching'
    when category=2 then 'Non-Teaching' else 'NA'
    end) as category from teacherdepute_entry
    
join udise_staffreg on udise_staffreg.teacher_code=teacherdepute_entry.teacher_code
join teacher_type on teacher_type.id=udise_staffreg.teacher_type 
join teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject 
where udise_code=".$school_udise." group by teacher_name";
                $query = $this->db->query($sql);
                return $query->result();
    }
    
    function getvolunteer($school_id) {
        $sql = "select teacher_volunteers.school_key_id,teacher_volunteers.teacher_name,organization_name,organization_type,teacher_volunteers_subjects.from_date,teacher_volunteers_subjects.to_date,a.subjects as s1,b.subjects as s2,c.subjects as s3 from teacher_volunteers
        join teacher_volunteers_subjects on teacher_volunteers_subjects.school_key_id=teacher_volunteers.school_key_id and teacher_volunteers_subjects.teacher_id=teacher_volunteers.id
		join teacher_subjects a on a.id=teacher_volunteers_subjects.sub1
		join teacher_subjects b on b.id=teacher_volunteers_subjects.sub2
		join teacher_subjects c on c.id=teacher_volunteers_subjects.sub3
        where teacher_volunteers.school_key_id=".$school_id." group by teacher_volunteers.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function deputesave($data,$dmulti,$vl,$teacher_code){
        //print_r($vl);
        //die();
        
            $this->db->where('teacher_code',$teacher_code);
            $this->db->update('udise_staffreg', $data);
            
            $this->db->where('teacher_code',$teacher_code);
            $this->db->delete('teacherdepute_entry');
            if($this->db->insert_batch('teacherdepute_entry',$dmulti)){
                if(!empty($vl)){
                    $query = $this->db->get_where('teacher_volunteers_subjects',array('teacher_code' => $teacher_code));
                    if($query->num_rows()<=0){
                        return $this->db->insert('teacher_volunteers_subjects',$vl);
                    }else{
                        $this->db->where('teacher_code',$teacher_code);
                        return $this->db->update('teacher_volunteers_subjects', $vl);
                    }
                }   
            }
            
    }
    
    function deputalllist($u_id){
        $sql="select teacherdepute_entry.id,deputed,deputed_place,depute_key,
(select district_id from (select school_id,district_id from schoolnew_basicinfo
union all
select off_key_id,district_id from udise_offreg) as der1 where school_id=depute_key) as district_id,
(select schoolnew_basicinfo.block_id from schoolnew_block where schoolnew_basicinfo.block_id=schoolnew_block.id) as block_id,
teacherdepute_entry.u_id,teacherdepute_entry.teacher_code,depute_frmdate,depute_todate,teacherdepute_entry.created_date from teacherdepute_entry 
left join udise_staffreg on udise_staffreg.teacher_code=teacherdepute_entry.teacher_code
left join schoolnew_basicinfo on schoolnew_basicinfo.school_id=teacherdepute_entry.depute_key
left join udise_offreg on udise_offreg.off_key_id=teacherdepute_entry.depute_key
where teacherdepute_entry.u_id=".$u_id.";";
//echo $sql; die();
        $query= $this->db->query($sql);
        if($query==null){
            return null;
        }else{
            return $query->result();
        }
    }
    
    function getdepute($school_id) {
		$today=date("Y-m-d");
        $sql = "SELECT teacher_name,type_teacher,
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
WHERE teacherdepute_entry.depute_key=".$school_id." AND teacherdepute_entry.deputed_place=1 AND teacherdepute_entry.depute_todate < ".$today."";
//echo($sql);die();
                $query = $this->db->query($sql);
                return $query->result();
                
                /*select 
                teacher_name,type_teacher,subjects,
                (case when category=1 then 'Teaching'
                when category=2 then 'Non-Teaching' else 'NA'
                end) as category,schoolnew_basicinfo.school_name,
                depute_key,teacherdepute_entry.teacher_code,depute_frmdate,depute_todate from teacherdepute_entry
                join udise_staffreg on udise_staffreg.teacher_code=teacherdepute_entry.teacher_code
                join teacher_type on teacher_type.id=udise_staffreg.teacher_type
                join teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
                join schoolnew_basicinfo on schoolnew_basicinfo.school_id=udise_staffreg.school_key_id
                join schoolnew_basicinfo as sc on sc.school_id=teacherdepute_entry.depute_key
                where teacherdepute_entry.depute_key=*/
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
   
    
    function getallschools() {
        $SQL="select school_id,school_name,udise_code from schoolnew_basicinfo";
        $query = $this->db->query($SQL);
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
	function update_admit_transfer_id($staff_uid,$update,$school_id,$teacher_code)
	{
	//	print_r($update);die();
		$this->db->where('u_id',$staff_uid);
    $this->db->update('udise_staffreg',array('school_key_id'  => $school_id));
    $this->db->where('u_id',$staff_uid);
		$this->db->update('udise_staffreg',array('archive'  => 1));

    $this->db->where('teacher_id',$teacher_code);
    $this->db->update('teacher_regu_dates',array('school_key_id'  => $school_id));

    $this->db->where('teacher_id',$teacher_code);
    $this->db->update('teacher_dates',array('school_key_id'  => $school_id));

    $this->db->where('teacher_id',$teacher_code);
    $this->db->update('teacher_extra',array('school_key_id'  => $school_id));

		return true;
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


  public function update_staff_det($update)
  {
	  // print_r($update);
	   // print_r($update['u_id']);
	  // // print_r('test');
	   // die();
        $this->db->where('u_id',$update['u_id']);
        $this->db->update('udise_staffreg',$update);
        return $update['u_id'];
  }
  public function count_teacher($teachercode)
	{
		
		$this->db->select('count(teacher_id)as countdata');
        $this->db->from('teacher_dates');
        $this->db->where('teacher_id',$teachercode);
		
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	
	public function count_accountnumber($checkaccountnumber,$checkteachercode)
	{
		
		$this->db->select('count(bank_acc)as countdata');
        $this->db->from('teacher_dates');
        $this->db->where('bank_acc',$checkaccountnumber);
		$this->db->where_not_in('teacher_id',$checkteachercode);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
  
  public function update_staff_bank($bankdetails,$teachercode)
  {
	  // print_r($update);
	   // print_r($update['u_id']);
	  // // print_r('test');
	   // die();
        $this->db->where('teacher_id',$teachercode);
        $this->db->update('teacher_dates',$bankdetails);
        return $update['u_id'];
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
            // print_r($this->db->last_query());die;
            return $staff_data['id'];
        }else
        {
          $this->db->insert($table,$staff_data);
          return $this->db->insert_id();
        }
  }

  public function teacher_pindics_details($table,$pindics_data)
  {
    
        if($pindics_data['status'] =='0')
        {         
          if(($pindics_data['pi_id'] != '')){
            $this->db->where('pi_id',$pindics_data['pi_id']);
            $this->db->update($table,$pindics_data);  
            return $pindics_data['pi_id'];
          }else{    
            
            $this->db->insert($table,$pindics_data);
            return $this->db->insert_id();
          }
        }else{
          if($pindics_data['pi_id'] != ''){
            $this->db->where('pi_id',$pindics_data['pi_id']);
            $this->db->update($table,$pindics_data);  
            return $pindics_data['pi_id'];
          }else{            
            $this->db->insert($table,$pindics_data);
            return $this->db->insert_id();
          }          
        }
  }

  public function get_pindics_details($teacher_id)
  {
      $this->db->select('*');
      $this->db->where('teacher_id',$teacher_id);
      $result = $this->db->get('teacher_pindics')->result_array();
      return $result;
      /*if(!empty($result)){
        //print_r($result);
        return $result;
      }else{
        //echo "false";
        return false;
      }*/
      //echo "hai";
      //die();      
  }

  function get_head_account_details($id){
    // echo $id;
    $this->db->select('head_of_account AS head_of_account_name');
    $this->db->where('id',$id);
    return $this->db->get('schoolnew_head_account')->result_array();
  }

  /****************************************
    * Get Full Details Part 2 Staff       *
    * VIT-sriram                          *
    * 29/05/2019                          *
    ***************************************/

  public function get_staff_part2_details($select,$table,$where)
  {
      $this->db->select($select)
               ->from($table)
               ->where($where);
      $result = $this->db->get()->first_row();
      // print_r($this->db->last_query());
      return $result;
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


        //save home work

    public function save_home_work($table,$save_data)
    {
        if($save_data['id']!='')
        {
          $this->db->where('id',$save_data['id']);
          $this->db->update($table,$save_data);
          return $save_data['id'];
        }else
        {
          $this->db->insert($table,$save_data);
          return $this->db->insert_id();
        }
    }

    public function get_home_work_details($school_id,$teacher_id)
    {
        $this->db->select('teachers_homework.id,teachers_homework.school_key_id,teachers_homework.teacher_id,teachers_homework.class_section_id,teachers_homework.subject,teachers_homework.information,teachers_homework.doc_upload,teachers_homework.status,schoolnew_textbooks_list.book_name,schoolnew_section_group.class_id,schoolnew_section_group.section ')
                  ->from('teachers_homework')
                  ->join('schoolnew_textbooks_list','schoolnew_textbooks_list.id = teachers_homework.subject','left')
                  ->join('schoolnew_section_group','schoolnew_section_group.id = teachers_homework.class_section_id','left')
                  ->where('teachers_homework.teacher_id',$teacher_id)
                  ->where('teachers_homework.school_key_id',$school_id)
                  ->where('teachers_homework.status',1);
            $result = $this->db->get()->result();

            return $result;
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
          $this->db->select('b.teacher_name,b.teacher_code, (case when a.attstatus is null then 1 else 0 end ) as present, a.attres,gender,appointedsubject.subjects,teacher_type.type_teacher as desgination,b.teacher_type,a.attstatus,a.id',false)
          ->from('udise_staffreg as b')
          ->join($table.' as a','a.teacher_code =  b.teacher_code and a.date='."'".$date."'",'left')
          ->join('teacher_type','b.teacher_type=teacher_type.id','left')
          ->join('teacher_subjects as appointedsubject',' appointedsubject.id=b.appointed_subject','left')
          ->where('b.school_key_id',$school_id)
          
          ->where('b.archive ',1)
          ->order_by('a.id','DESC');
          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;
  }

  // save attendance

  public function emis_teacher_save_attendance($table,$save_data)
  {       
      $this->db2 = $this->load->database('attendance',TRUE); 
                         $this->db2->select('id,school_id,teacher_code');
      $exits_att_data = $this->db2->get_where($table,array('school_id'=>$save_data['school_id'],'teacher_code'=>$save_data['teacher_code'],'date'=>date('Y-m-d')))->first_row();

      if($exits_att_data !='')
      { 
          $save_data['id'] = $exits_att_data->id;
          $save_data['modified'] = date('Y-m-d h:i:s');
          $this->db2->where('id',$save_data['id']);
          $this->db2->update($table,$save_data);
          return $save_data['teacher_code'];  
      }else
      {
          $save_data['created'] = date('Y-m-d h:i:s');

          $this->db2->insert($table,$save_data);
          return $this->db2->insert_id();
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
                      $absent_list[$index]['tacher_code'] = $staff_det->teacher_code;
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



                                 $absent_list[$index][$i]['present'] = 0;
                                 $absent_list[$index][$i]['reason'] = $abse_staff_list->attres;
                                 $status = 0;
                                 $old_unique_id = $abse_staff_list->teacher_code;
                             
                           }

                           if($old_unique_id !=$staff_det->teacher_code){
                              $absent_list[$index][$i]['present'] = 1;
                              $absent_list[$index][$i]['reason'] = '';

                           }
                        }
                       }
                       else
                      {
                        $absent_list[$index][$i]['present'] = '-1';
                        $absent_list[$index][$i]['reason'] = '';

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

  /*************************************** End ****************************************/

  /**
    * BRTE Staff Observation Records
    * VIT-sriram
    * 19/09/2019
    */

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

  /*************************************** End ****************************************/
  //Staff Trainee Details (venba/ps)
  function add_training_staff_dtl($arr){
    $this->db->insert('teacher_training_details',$arr);
    $count = $this->db->affected_rows();
    return $count;
  }

  function update_training_staff_dtl($arr,$id){
    
    if($id != ''){
        $data = array('isactive' => 0,
                      'updatedat' => date('Y-m-d h:i:s'));

        $this->db->where('id', $id);
        $this->db->update('teacher_training_details', $data);
    }
    $this->db->insert('teacher_training_details',$arr);
    $count = $this->db->affected_rows();
    return $count;
  }

  function get_trainee_dtl($id){
    $this->db->select('a.id,a.teacher_code,a.training_type,a.training_other,a.trained_at,a.training_date,a.training_days');
    $this->db->from('teacher_training_details a');
    $this->db->where('a.id',$id);    
    $result = $this->db->get()->result();
    return $result;
  }

  function get_training_staff_dtl($ac_year,$school){
    $this->db->select('a.id,b.teacher_name,a.teacher_code,a.training_type as training_type_id, c.training as training_type,a.training_other,a.trained_at,a.training_days');
    $this->db->select("date_format(a.training_date,'%d/%m/%Y') AS training_date");
    $this->db->from('teacher_training_details a');
    $this->db->join('udise_staffreg b','a.teacher_code = b.teacher_code ','left');
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

  function get_staff_name($school_id){
    $this->db->select('u_id,teacher_code,teacher_name,teacher_type,appointed_subject,teacher_dates.head_account');
    $this->db->from('udise_staffreg')
             ->join('teacher_dates','teacher_dates.teacher_id = udise_staffreg.teacher_code and teacher_dates.school_key_id = udise_staffreg.school_key_id','left');
    $this->db->where('archive',1);
    $this->db->where('udise_staffreg.school_key_id',$school_id);
    // print_r($this->db->last_query());
    return $this->db->get()->result();
  }

  function get_ac_year_from_teacher_training_details(){
    $this->db->select('acyear')->distinct();
    $this->db->from('teacher_training_details');
    $this->db->order_by('acyear','desc');
    return $this->db->get()->result();
  }

  function get_list_of_teacher_training_dtls($select,$tname)
  {    
    $this->db->select($select);
    $this->db->from($tname);
    $query =  $this->db->get();
    return $query->result();      
  }

  //Staff Trainee Details (venba/ps)


  /************************* End ************************************/


  public function get_fixation_staff_details($school_id)
  {
      $this->db->select('a.id,a.go_number,a.go_date,c.type_teacher,a.teacher_id,a.ac_head,                        a.surplus,a.appt_subject,d.subjects,b.teacher_name,a.go_dept,a.go_type,a.temp_go_number,a.temp_go_dept,a.temp_go_date,a.temp_go_upto_date,a.designation,a.isactive')
               ->from('teacher_post a')
               ->join('udise_staffreg b','b.teacher_code = a.teacher_id and a.school_key_id = b.school_Key_id','left')
               ->join('teacher_type c','c.id = a.designation','left')
               ->join('teacher_subjects d','d.id = a.appt_subject','left')
               ->where('a.school_key_id',$school_id)
               ->where('a.isactive',1);
      $result = $this->db->get()->result();
      // print_r($this->db->last_query());
      return $result;

  }


  /**
    * Summary of Scale Register Schoolwise
    * VIT-sriram
    * 30/09/2019
    */

  public function get_schoolwise_scale_summary($sch_id)
  {
      $this->db->select('count(designation) as sanc,sum(If(teacher_post.teacher_id !="",1,0)) as in_position ,a.type_teacher,b.subjects,sum(If(teacher_post.teacher_id ="",1,0)) as vacent,sum(iF(surplus=1,1,0)) as surplus')
               ->from('teacher_post')
               ->join('teacher_type a','a.id = teacher_post.designation','left')
               ->join('teacher_subjects b','b.id = teacher_post.appt_subject','left')
               ->where('teacher_post.school_key_id',$sch_id)
               ->where('teacher_post.isactive',1)
               ->group_by('designation,appt_subject');
      $result = $this->db->get()->result();
//print_r($this->db->last_query());
      return $result;
  }
  /**
   * HM Evaluating teachers in pindics
   * Functionality Added By Wesley
   */
  public function pindics_hm_eval_insert($data){
    $this->db->where('teacher_id',$data['teacher_id']);
    return $this->db->update('teacher_pindics', $data);  
  }
  public function pindics_single_teacher_detail($data){
    $this->db->select('*');
      $this->db->where('teacher_id',$data['teacher_id']);
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
  public function get_teacher_details($school_id){
   // $school_id= "3713";
    $SQL = "select * from teacher_pindics a
    left join udise_staffreg b on b.u_id = a.teacher_id where a.status = 1 
    and b.school_key_id = ".$school_id."";
    $query = $this->db->query($SQL);
    return $query->result();
 }
 function get_hm_details($school_id){
  //$school_id= "3713";
  $SQL = "select * from udise_staffreg where school_key_id=".$school_id." 
  and teacher_type in (26,27,28,29) and archive='1';";    
  $query = $this->db->query($SQL);
  return $query->result_array();
 }
 function brte_block_list(){
   $brte_id = $this->session->userdata('emis_user_id');
   //  $brte_id = '30645280';
  // $brte_id = '645034';
   //echo $brte_id;
   $exist_sql = 'select m.hss_block_id,m.hss_block_name from udise_staffreg
   join udise_offreg on udise_offreg.off_key_id = udise_staffreg.school_key_id
   join brte_school_map m on m.brte_id=udise_staffreg.u_id       
   where udise_staffreg.u_id = '.$brte_id.' group by m.hss_block_id';
   $sql = 'select students_school_child_count.block_id,students_school_child_count.block_name from udise_staffreg
   join udise_offreg on udise_offreg.off_key_id = udise_staffreg.school_key_id
           join students_school_child_count on students_school_child_count.district_id = udise_offreg.district_id
   where udise_staffreg.u_id = '.$brte_id.' group by students_school_child_count.block_id;';
   $query = $this->db->query($sql);  
   return $query->result();
 }
 function pindics_school_detial($block_id){
   // $brte_id = $this->session->userdata('emis_user_id');
   // $brte_id = '645034';
   // $block_id = 1;
    $exist_sql = 'select students_school_child_count.school_id,students_school_child_count.school_name from students_school_child_count 
   join brte_school_map on brte_school_map.hss_block_id=students_school_child_count.block_id
   where brte_school_map.brte_id = '.$brte_id.' and students_school_child_count.school_type_id in (1,2,4)
   group by students_school_child_count.school_id;';
    $sql = 'select students_school_child_count.school_id, concat(students_school_child_count.udise_code, " ", "-", " ", students_school_child_count.school_name) as school_name from students_school_child_count
    where block_id = '.$block_id.' and students_school_child_count.school_type_id in (1,2,4)
    group by students_school_child_count.school_id order by students_school_child_count.udise_code;
';
    $query = $this->db->query($sql);
    return $query->result();
    
  }
  public function get_teachers_details($school_id){
    //$school_id= "3713";
    /*$SQL = "select * from teacher_pindics a
    left join udise_staffreg b on b.u_id = a.teacher_id where a.status = 1 
    and b.school_key_id = ".$school_id."";*/
    $sql = "select udise_staffreg.u_id as teacher_id,udise_staffreg.teacher_name as teacher_name from udise_staffreg 
    join teacher_type on teacher_type.id = udise_staffreg.teacher_type
    where udise_staffreg.school_key_id = ".$school_id." and udise_staffreg.archive=1 order by udise_staffreg.teacher_name;";   
    $query = $this->db->query($sql);    
    return $query->result();
 }
 public function pindics_brte_eval_insert($data){
  $this->db->where('teacher_id',$data['teacher_id']);
  return $this->db->update('teacher_pindics', $data);  
 }
 /** Functionality Ends Here */
}
?>