<?php

class Homemodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


     function updatedata($data,$school_udise)
    {
      $this->db->where('udise_code', $school_udise);      
      return $this->db->update('schoolnew_basicinfo', $data);         
    }
	

    function get_cluster_details($data)
    {
    	 $this->db->select('clus_code,	clus_name'); 
    	$this->db->where('blk_code_id', $data);
    	$query = $this->db->get('schoolnew_cluster_mas');
        
         // Make a new array for the posts
   		 $posts = array();

    	// For the purposes of this example, we'll only return the title
    	foreach ($query->result() as $row) {
       		$posts[$row->clus_code] = $row->clus_name;
    	}
		return $posts ;
 

    }
/*******************************pearlin***********************/
public function get_districtName($district_id)
      {
        $result = $this->db->get_where('schoolnew_district',array('id'=>$district_id))->first_row();
        return $result;
      }
public function get_edu_dist_name($deo_id)
      {
        $result = $this->db->get_where('schoolnew_edn_dist_mas',array('id'=>$deo_id))->first_row();
        // print_r($result);die;
        return $result;
      }
      public function get_district_Name($district_id)
      {
        $result = $this->db->get_where('schoolnew_district',array('id'=>$district_id))->first_row();
        // print_r($result);die;
        return $result;
      }
       public function get_block_name($block_id)
  {
    $this->db->select('block_name')
              ->from('schoolnew_block')
              ->where('id',$block_id);
              $result = $this->db->get()->first_row();
              // print_r($this->db->last_query());
              return $result;
    
  }
  public function get_block_id($school_id)
  {
    $this->db->select('block_id')
             ->from('students_school_child_count')
             ->where('school_id',$school_id);
             $result = $this->db->get()->first_row();
             return $result;
  }
  function getrte_type(){
 $query ="select concat(category,'-',sub_category)as cate,id from 
        baseapp_rte_type ";
        $result = $this->db->query($query)->result();
        return $result;
  }
    public function get_beo_name($block_id,$beo_id)
  {
   
 $this->db->SELECT('schoolnew_block.block_name,schoolnew_basicinfo.beo_map')
 ->FROM ('schoolnew_block')
 ->JOIN ('schoolnew_basicinfo','schoolnew_basicinfo.block_id=schoolnew_block.id')
 ->WHERE('schoolnew_block.id',$block_id)
 ->WHERE('schoolnew_basicinfo.beo_map',$beo_id);
              $result = $this->db->get()->first_row();
            //  print_r($this->db->last_query());
              return $result;
    
  }
/***********************************************************************/

	function getscheme_studentdata($school_id,$student_id)
	{
		$this->db->select('*'); 
        $this->db->where('school_id', $school_id); 
    	$this->db->where('unique_id_no', $student_id); 
    	$query =  $this->db->get('students_child_detail');
    	return $query->result();
		
	}
    function get_std_details($data)
    {
         $this->db->select('id,  std_code'); 
        $this->db->where('dist_id', $data);
        $query = $this->db->get('schoolnew_stdcode_mas');
        
         // Make a new array for the posts
         $posts = array();

        // For the purposes of this example, we'll only return the title
        foreach ($query->result() as $row) {
            $posts[$row->id] = $row->std_code;
        }
        return $posts ;
 

    }
    function get_school_form1_details($school_udise)
    {
    	$this->db->select('*'); 

    	$this->db->where('udise_code', $school_udise); 
    	$query =  $this->db->get('schoolnew_basicinfo');
    	return $query->result();
    }
    function get_localbody_name($id)
    {
      $this->db->select('localbody_name'); 

      $this->db->where('id', $id); 
      $query =  $this->db->get('schoolnew_local_body');
      return $query->result();
    }
    function get_school_form2_details($school_udise)
    {
    	$this->db->select('address, pincode, landline, landline2, mobile, sch_email, website, stdcode_id'); 
    	$this->db->where('udise_code', $school_udise); 
    	$query =  $this->db->get('schoolnew_basicinfo');
    	return $query->result();
    }
    function get_school_form3_details($school_udise)
    {

    	$this->db->select('bankaccno, bank_dist_id, bank_id, branch_id'); 
    	$this->db->where('udise_code', $school_udise); 
    	$query =  $this->db->get('schoolnew_basicinfo');
    	return $query->result();
    }
    function get_school_form4_details($school_udise)
    {

    	$this->db->select('pta_no, draw_off_code, pta_sub_yr, pta_esta, manage_cate_id, sch_management_id, sch_directorate_id, sch_cate_id'); 

    	$this->db->where('udise_code', $school_udise); 
    	$query =  $this->db->get('schoolnew_basicinfo');
    	return $query->result();
    }
    function get_school_form5_details($school_udise)
    {
    	$this->db->select('latitude, longitude, cluster_id'); 
    	$this->db->where('udise_code', $school_udise); 
    	$query =  $this->db->get('schoolnew_basicinfo');
    	return $query->result();
    }

    function getbanksby_dist($dist_code){
        $this->db->select('*'); 
        $this->db->from('schoolnew_bank');
        $this->db->where('bank_dist_id', $dist_code);   
        $query =  $this->db->get();
        return $query->result();
    }
    
    function getbranchby_bankid($bankid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_branch');
       $this->db->where('bank_id', $bankid);   
       $query =  $this->db->get();
       return $query->result(); 
    }


    function getallbrachesbyschool($schoolid){
       $this->db->select('sum(c1_b+c1_g+c1_t) as class1,sum(c2_b+c2_g+c2_t) as class2,sum(c3_b+c3_g+c3_t) as class3,sum(c4_b+c4_g+c4_t) as class4,sum(c5_b+c5_g+c5_t) as class5,sum(c6_b+c6_g+c6_t) as class6,sum(c7_b+c7_g+c7_t) as class7,sum(c8_b+c8_g+c8_t) as class8,sum(c9_b+c9_g+c9_t) as class9,sum(c10_b+c10_g+c10_t) as class10,sum(c11_b+c11_g+c11_t) as class11,sum(c12_b+c12_g+c12_t) as class12') 
         ->from('students_school_child_count')
         ->join('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
         ->where('schoolnew_basicinfo.school_id', $schoolid);    
       $query =  $this->db->get();
       return $query->result(); 
    }

    function getenrollment($schoolid){
       $this->db->select('total'); 
       $this->db->from('schoolnew_enroll_abstract');
       $this->db->where('school_id', $schoolid);   
       $query =  $this->db->get();
       return $query->result();
    }

    function getallsectionsbyclass($schoolid,$classid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_class_section');
       $this->db->where('class_id', $classid);
       $this->db->where('school_key_id', $schoolid);   
       $query =  $this->db->get();
       return $query->row('section_ids');
    }

        function getsingleclass($id){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id', $id);   
       $query =  $this->db->get();
       return $query->row('class_studying');
    }

    function getallstudsbyclsec($schoolid,$classid,$section){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       if($section!=''){$this->db->where('class_section', $section);} 
       $this->db->where('class_studying_id', $classid); 
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $query =  $this->db->get();
       return $query->result();  
    }

        function getstudentdata($schoolid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $query =  $this->db->get();
       return $query->result();  
    }

         function updatestudata($uniqeid,$data)
    {
      $this->db->where('unique_id_no', $uniqeid);      
      return $this->db->update('students_child_detail', $data);         
    }

    function getstuprofile1($stuid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('unique_id_no',$stuid); 
       $query =  $this->db->get();
       return $query->result();  
    }
    
   /*function getsection1($sectionid){
       $sql="select * from schoolnew_section_group where id=".$sectionid;
       $query = $this->db->query($sql);
       return $query->result_array(); 
    }*/

    function getreligion($religion_id){
       $this->db->select('religion_name'); 
       $this->db->from('baseapp_religion');
       $this->db->where('id',$religion_id); 
       $query =  $this->db->get();
       return $query->row('religion_name');  
    }
    function getcommunity($community_id){
       $this->db->select('community_name'); 
       $this->db->from('baseapp_community');
       $this->db->where('religion_id',$community_id); 
       $query =  $this->db->get();
       return $query->row('community_name');  
    }
    function getsubcase($subcaste_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_sub_castes');
       $this->db->where('id',$subcaste_id); 
       $query =  $this->db->get();
       return $query->result();  
    }
    function getmother($mothertounge_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_language');
       $this->db->where('id',$mothertounge_id); 
       $query =  $this->db->get();
       return $query->result();  
    }
    function getdistrict_id($district_id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_district');
       $this->db->where('id',$district_id); 
       $query =  $this->db->get();
       return $query->result();  
    }
    function getclass_studying_id($class_studying_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$class_studying_id); 
       $query =  $this->db->get();
       return $query->row('class_studying');  
    }
     function getgroup_code_id($group_code_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_group_code');
       $this->db->where('id',$group_code_id); 
       $query =  $this->db->get();
       return $query->row('group_name');  
    }
     function getcbse_subject_id($cbse_subject1_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_group_code_cbse');
       $this->db->where('id',$cbse_subject1_id); 
       $query =  $this->db->get();
       return $query->row('group_name');  
    }
 function geteducation_medium_id($education_medium_id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_mediumofinstruction');
       $this->db->where('MEDINSTR_ID',$education_medium_id); 
       $query =  $this->db->get();
       return $query->row('education_medium');  
    }
    
    function getmediuminstruct ($education_medium_id) {
        $SQL = "select * from schoolnew_mediumofinstruction where MEDINSTR_ID=".$education_medium_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

  function getallblocksbydist($dist){
       $this->db->select('*'); 
       $this->db->from('schoolnew_block');
       $this->db->where('district_id',$dist); 
       $query =  $this->db->get();
       return $query->result(); 
  }
  function getallschoolsbyblock($blockid){
       $this->db->select('school_id,school_name'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('block_id',$blockid); 
       $query =  $this->db->get();
       return $query->result();
  }
  public function getTeacherlist($school_id) {
		
        $query = 'SELECT teacher_name,teacher_code 
		FROM udise_staffreg  
		WHERE udise_staffreg.school_key_id = ' . $school_id;
        $result = $this->db->query($query)->result();
        return $result;
    }
  function getallclassbyschool($schoolid){
       $this->db->select('baseapp_class_studying.class_studying,schoolnew_class_section.class_id'); 
       $this->db->from('schoolnew_class_section');
       $this->db->join('baseapp_class_studying','schoolnew_class_section.class_id=baseapp_class_studying.id');
       $this->db->where('schoolnew_class_section.school_key_id', $schoolid);    
       $query =  $this->db->get();
       return $query->result(); 
  }
  function getallsectbyclass($schoolid,$classid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_class_section');
       $this->db->where('class_id', $classid);
       $this->db->where('school_key_id', $schoolid);   
       $query =  $this->db->get();
   return $query->row('sections');
}

 function getallstudsbysearch($district,$block,$schoolid,$classid,$section){
     $this->db->select('school_id,name,dob,father_name,unique_id_no,class_section,class_studying_id,school_admission_no,community_id,transfer_flag'); 
     $this->db->from('students_child_detail');
     if($district!=""){ $this->db->where('district_id', $district); } 
     if($block!=""){ $this->db->where('block_id', $block); }
     if($schoolid!=""){ $this->db->where('school_id', $schoolid);  }
     if($classid!=""){ $this->db->where('class_studying_id', $classid); }
    if($section!=""){ $this->db->where('class_section', $section); }
     $query =  $this->db->get();
     return $query->result();
}

 function getallstudsbysearchsep($unique,$aadhaar,$mobile){
     $this->db->select('school_id,name,dob,father_name,unique_id_no,class_section,class_studying_id,school_admission_no,community_id,transfer_flag'); 
     $this->db->from('students_child_detail');
     if($unique!=""){ $this->db->where('unique_id_no', $unique); } 
     if($aadhaar!=""){ $this->db->where('aadhaar_uid_number', $aadhaar); }
     if($mobile!=""){ $this->db->where('phone_number', $mobile);  }
     $query =  $this->db->get();
     return $query->result();
}

 function getallstudsbysearchsep1($dobdate, $pincode){
     $this->db->select('school_id,name,dob,father_name,unique_id_no,class_section,class_studying_id,school_admission_no,community_id,transfer_flag'); 
     $this->db->from('students_child_detail');
     if($dobdate!=""){ $this->db->where('dob', $dobdate); }
      if($pincode!=""){ $this->db->where('pin_code', $pincode); } 
     $query =  $this->db->get();
     return $query->result();
}

 function getallstudsbysearchsep2($schoolid,$classid,$section){
     $this->db->select('school_id,name,dob,father_name,unique_id_no,class_section,class_studying_id,school_admission_no,community_id,transfer_flag'); 
     $this->db->from('students_child_detail');
     if($schoolid!=""){ $this->db->where('school_id', $schoolid); } 
     if($classid!=""){ $this->db->where('class_studying_id', $classid); } 
     if($section!=""){ $this->db->where('class_section', $section); } 
     $query =  $this->db->get();
     return $query->result();
}



/*************************Functions Written By Elavarasi Vivek Rao *****************************************************************************************/
function getListAllSchemes($school_key_id,$visibility="schoolnew_freescheme.visibility>0"){
        $SQL="SELECT 
    id,scheme_name, 
    IF(((CASE low_class WHEN 15 THEN 1 ELSE 
            CASE low_class WHEN 14 THEN 1 ELSE 
                CASE low_class WHEN 13 THEN 1 ELSE low_class END END END))>=appli_lowclass,
                (CASE low_class WHEN 15 THEN 1 ELSE 
                    CASE low_class WHEN 14 THEN 1 ELSE 
                        CASE low_class WHEN 13 THEN 1 ELSE low_class END END END),appli_lowclass) as appli_lowclass, 
    IF(high_class<=appli_highclass,high_class,appli_highclass) as appli_highclass 
    FROM ( 
        SELECT schoolnew_freescheme.*,low_class,high_class, MIN(appli_lowclass) as appli_lowclass,MAX(appli_highclass) as appli_highclass 
        FROM schoolnew_schemeapplicable 
        JOIN schoolnew_freescheme ON schoolnew_freescheme.id=schoolnew_schemeapplicable.scheme_id 
        JOIN schoolnew_academic_detail 
        WHERE schoolnew_academic_detail.school_key_id=".$school_key_id." 
            AND (schoolnew_freescheme.hill_restrict=(SELECT hill_frst FROM schoolnew_academic_detail WHERE school_key_id=".$school_key_id.") 
            OR schoolnew_freescheme.hill_restrict=0) AND ".$visibility." group by schoolnew_freescheme.id) AS t1 
    WHERE (((CASE low_class WHEN 15 THEN 1 ELSE CASE low_class WHEN 14 THEN 1 ELSE CASE low_class WHEN 13 THEN 1 ELSE low_class END END END)  BETWEEN appli_lowclass AND appli_highclass) 
OR (appli_highclass BETWEEN (CASE low_class WHEN 15 THEN 1 ELSE CASE low_class WHEN 14 THEN 1 ELSE CASE low_class WHEN 13 THEN 1 ELSE low_class END END END) AND high_class)) ORDER BY visibility DESC;";
 //echo($SQL);die();
 if($school_key_id!=''){
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    // print_r($query->result());
    return $query->result();   
 }
 else{
    $SQL="SELECT schoolnew_freescheme.id,scheme_name,MIN(appli_lowclass) as appli_lowclass,MAX(appli_highclass) as appli_highclass,appli_count FROM schoolnew_freescheme 
JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
WHERE ".$visibility." group by schoolnew_freescheme.id;";
    
    $query = $this->db->query($SQL);
    return $query->result(); 
 }
 
 
}
function getSchemeDetails($scheme_id,$where){
    $SQL="SELECT schoolnew_schemedetail.id,schoolnew_schemedetail.scheme_category,multiselect, 
(CASE WHEN (".$where." BETWEEN appli_lowclass AND appli_highclass) THEN 'selected' ELSE NULL END) as sel FROM schoolnew_schemedetail
          JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_schemedetail.scheme_id 
          AND schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id
          WHERE schoolnew_schemeapplicable.scheme_id=".$scheme_id;//echo($SQL);die();
          
    /*//Changed SQL
        $SQL="SELECT schoolnew_freescheme.id,scheme_name,schoolnew_schemedetail.scheme_category FROM schoolnew_freescheme
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_freescheme.id
JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.idool_key_id=".$school_key_id.") 
OR schoolnew_freescheme.hill_restrict=0) AND (
(((CASE ".$class." WHEN 15 THEN 1 ELSE
	 CASE ".$class." WHEN 14 THEN 1 ELSE
		CASE ".$class." WHEN 13 THEN 1 ELSE
			".$class." 
		END
	 END
 END) BETWEEN appli_lowclass AND appli_highclass) OR (".$class." BETWEEN appli_lowclass AND appli_highclass))) GROUP BY id;";*/
    $query = $this->db->query($SQL);
    return $query->result();
}
function getgroupcode($school_id,$subid=""){
  //print_r($classid);die();
    $SQL="SELECT
group_code,baseapp_group_code.id,
CONCAT((SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub3 limit 1),'/',
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub4 limit 1),'/',
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub5 limit 1),'/',
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub6 limit 1)) AS groups,
   
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub3 limit 1) AS sub3,
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub4 limit 1) AS sub4,
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub5 limit 1) AS sub5,
   (SELECT baseapp_group_subjects.subject FROM baseapp_group_subjects WHERE baseapp_group_subjects.subject_code=baseapp_group_code.sub6 limit 1) AS sub6
FROM students_child_detail
JOIN baseapp_group_code on baseapp_group_code.id=students_child_detail.group_code_id and baseapp_group_code.group_description=IF(class_studying_id=11,1,IF(class_studying_id=12,2,NULL))
WHERE students_child_detail.school_id=".$school_id.$subid."  GROUP BY group_code;";//echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}

function getSchemeDetails2($where){
    $SQL="SELECT schoolnew_schemedetail.id,schoolnew_schemedetail.scheme_category,multiselect, 
(CASE WHEN (".$where." BETWEEN appli_lowclass AND appli_highclass) THEN 'selected' ELSE NULL END) as sel FROM schoolnew_schemedetail
          JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_schemedetail.scheme_id 
          AND schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id
          WHERE schoolnew_schemeapplicable.scheme_id in (1,2)";//echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}

function getStudentforScheme($scheme_id,$class,$school_id){
    $SQL="SELECT 
            id,unique_id_no,name,dependscheme,scheme_id,class_section,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE indent END) as indent,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE iid END) as iid,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE finalsub END) as finalsub,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE distri END) as distri,
            unique_supply,
            scheme_category
            FROM ( 
    SELECT 
        students_child_detail.id, 
        unique_id_no,name,class_section, 
        schoolnew_freescheme.dependscheme, 
        schoolnew_schemeindent.scheme_id AS scheme_id, 
        schoolnew_schemeindent.indent_date AS indent,
        schoolnew_schemeindent.id AS iid,
        schoolnew_schemeindent.finalsub AS finalsub,
        schoolnew_schemeindent.distribution_date AS distri,
        schoolnew_schemeindent.unique_supply AS unique_supply,
        scheme_category
         FROM students_child_detail 
    LEFT JOIN schoolnew_schemeindent ON students_child_detail.id IN (
    SELECT student_id FROM schoolnew_schemeindent WHERE scheme_id IN (
        SELECT t1.id FROM schoolnew_freescheme as t1 
        LEFT JOIN schoolnew_freescheme as t2 ON t2.dependscheme=t1.id WHERE t2.id=".$scheme_id." OR t1.id=".$scheme_id."
    )
)AND schoolnew_schemeindent.isactive = 1 AND students_child_detail.id=schoolnew_schemeindent.student_id 
LEFT JOIN schoolnew_freescheme ON schoolnew_freescheme.id=".$scheme_id." 
JOIN schoolnew_section_group ON 
        schoolnew_section_group.school_key_id=students_child_detail.school_id AND
        schoolnew_section_group.section=students_child_detail.class_section AND 
        schoolnew_section_group.class_id=students_child_detail.class_studying_id AND
        (schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
WHERE class_studying_id=".$class." AND students_child_detail.school_id=".$school_id." AND transfer_flag=0 AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)) AS der 
WHERE IF((select scheme_id from schoolnew_schemeindent where student_id IN (select id FROM students_child_detail where school_id=".$school_id." AND transfer_flag=0 AND class_studying_id=".$class.") AND scheme_id=".$scheme_id." 
GROUP BY scheme_id) IS NULL,IF(dependscheme IS NOT NULL,(scheme_id IS NULL OR (scheme_id=dependscheme AND finalsub=1)),scheme_id IS NULL),scheme_id IS NULL) OR  scheme_id=".$scheme_id.";";
//echo($SQL);die();

    $query = $this->db->query($SQL);
    return $query->result();
}
function getDistibutionforScheme($scheme_id,$class,$school_id){ 
    
     $SQL="SELECT 
            id,unique_id_no,name,dependscheme,scheme_id,class_section,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE indent END) as indent,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE iid END) as iid,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE finalsub END) as finalsub,
            (CASE WHEN scheme_id=dependscheme THEN NULL ELSE distri END) as distri,
            scheme_category,
            unique_supply
            FROM ( 
    SELECT 
        students_child_detail.id, 
        unique_id_no,name, 
        schoolnew_freescheme.dependscheme, 
        schoolnew_schemeindent.scheme_id AS scheme_id,
       
		date_format(schoolnew_schemeindent.indent_date,'%d-%m-%Y') AS indent,
        schoolnew_schemeindent.id AS iid,
        schoolnew_schemeindent.finalsub AS finalsub,
        schoolnew_schemeindent.distribution_date AS distri,
        unique_supply,class_section,
        scheme_category
         FROM students_child_detail 
    LEFT JOIN schoolnew_schemeindent ON students_child_detail.id IN (
    SELECT student_id FROM schoolnew_schemeindent WHERE scheme_id IN (
        SELECT t1.id FROM schoolnew_freescheme as t1 
        LEFT JOIN schoolnew_freescheme as t2 ON t2.dependscheme=t1.id WHERE t2.id=".$scheme_id." OR t1.id=".$scheme_id."
    )
) AND students_child_detail.id=schoolnew_schemeindent.student_id
LEFT JOIN schoolnew_freescheme ON schoolnew_freescheme.id=".$scheme_id." 
JOIN schoolnew_section_group ON 
        schoolnew_section_group.school_key_id=students_child_detail.school_id AND
        schoolnew_section_group.section=students_child_detail.class_section AND 
        schoolnew_section_group.class_id=students_child_detail.class_studying_id AND
        (schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
WHERE class_studying_id=".$class." AND students_child_detail.school_id=".$school_id." AND transfer_flag=0 AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)) AS der 
WHERE (scheme_id=".$scheme_id." OR scheme_id IS NULL ) AND (finalsub=1 OR finalsub=0);";//echo($SQL);die();

    $query = $this->db->query($SQL);
    return $query->result();
}


function studentsInClass($class_id,$school_id){
    $SQL="SELECT 
        	students_child_detail.id,
        	students_child_detail.name,
        	students_child_detail.unique_id_no,
            from_stoping,to_stoping,bus_routes,
            finalsub,class_section,
            distribution_date,
            schoolnew_busindent.created_date,
            schoolnew_busindent.id as iid
        FROM students_child_detail
        JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=students_child_detail.school_id AND schoolnew_section_group.section=students_child_detail.class_section AND schoolnew_section_group.class_id=students_child_detail.class_studying_id AND(schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
        LEFT JOIN schoolnew_busindent ON schoolnew_busindent.student_id=students_child_detail.id
        WHERE transfer_flag=0 AND school_id=".$school_id." AND class_studying_id=".$class_id." ORDER BY id,class_section;";
    //echo($SQL);
    $query = $this->db->query($SQL);
    return $query->result();
}
function busDistribution($class_id,$school_id){
    $SQL="SELECT 
        	students_child_detail.id,
        	students_child_detail.name,
        	students_child_detail.unique_id_no,
            from_stoping,to_stoping,bus_routes,
            finalsub,class_section,unique_supply,
            distribution_date,
            DATE_FORMAT(schoolnew_busindent.created_date,'%Y-%m-%d') as created_date,
            schoolnew_busindent.id as iid,
            DATE_FORMAT(NOW(),'%Y-%m-%d') as lstdt
        FROM students_child_detail
        JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=students_child_detail.school_id AND schoolnew_section_group.section=students_child_detail.class_section AND schoolnew_section_group.class_id=students_child_detail.class_studying_id AND(schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
        JOIN schoolnew_busindent ON schoolnew_busindent.student_id=students_child_detail.id
        WHERE transfer_flag=0 AND school_id=".$school_id." AND class_studying_id=".$class_id." ORDER BY id,class_section;";
    //echo($SQL);
    $query = $this->db->query($SQL);
    return $query->result();
}
// function schemeIndent($data,$scheme_id,$class,$school_id){
//     $res=null;  
//     if($scheme_id!=''){ 
//         $qres=$this->getStudentforScheme($scheme_id,$class,$school_id);
//         foreach($qres as $q){
//             if($q->iid!='')$res[]=$q->iid;    
//         }
//         $tname='schoolnew_schemeindent';
//     }
//     else{
//         $qres=$this->studentsInClass($class,$school_id);
//         foreach($qres as $q){
//             if($q->iid!='')$res[]=$q->iid;
//         }
//         $tname='schoolnew_busindent';
//     }
//     if($res!=null){
//         $this->db->where_in('id',$res);
//         $this->db->delete($tname);
//         if($data==null) return true;
//         else{
//             if($tname=='schoolnew_schemeindent'){
//                 for($i=0;$i<count($data);$i++){   
//                         $sql = "INSERT INTO ".$tname." (scheme_id,student_id,indent_date,createddate,distribution_date,unique_supply,finalsub) VALUES('".$data[$i][scheme_id]
//                         ."','".$data[$i][student_id]
//                         ."','".$data[$i][indent_date]
//                         ."','".$data[$i][createddate]
//                         ."','".$data[$i][distribution_date]
//                         ."','".$data[$i][unique_supply]
//                         ."','".$data[$i][finalsub]."');";
    
//                         if (!$this->db->query($sql)) {
//                             return false;
//                         }
//                         else {
//                         return true;
//                         }
//                     }
//                 }
//                 else if($tname=='schoolnew_busindent'){
//                     return $this->db->insert_batch($tname, $data);
//                 }
//         }
//        }
//     else{
//         if($data!=null){
//             if($tname=='schoolnew_schemeindent'){
//                 for($i=0;$i<count($data);$i++){   
//                         $sql = "INSERT INTO ".$tname." (scheme_id,student_id,indent_date,createddate,distribution_date,unique_supply,finalsub) VALUES('".$data[$i][scheme_id]
//                         ."','".$data[$i][student_id]
//                         ."','".$data[$i][indent_date]
//                         ."','".$data[$i][createddate]
//                         ."','".$data[$i][distribution_date]
//                         ."','".$data[$i][unique_supply]
//                         ."','".$data[$i][finalsub]."');";
    
//                         if (!$this->db->query($sql)) {
//                             return false;
//                         }
//                         else {
//                         return true;
//                         }
//                     }
//                 }
//                 else if($tname=='schoolnew_busindent'){
//                     return $this->db->insert_batch($tname, $data);
//                 }
//         }
//         else
//             return true;
//     }
// }

function schemeIndent($data,$scheme_id,$class,$school_id){
    $res=null;  
    if($scheme_id!=''){ 
        $qres=$this->getStudentforScheme($scheme_id,$class,$school_id);
        foreach($qres as $q){
            if($q->iid!='')
                $res[]=$q->iid;
        }
        $tname='schoolnew_schemeindent';
    }
    else{
        $qres=$this->studentsInClass($class,$school_id);
        foreach($qres as $q){
            if($q->iid!='')
                $res[]=$q->iid;
        }
        $tname='schoolnew_busindent';
    }
    
    if($res!=null){
        $this->db->where_in('id',$res);
        $this->db->delete($tname);
        if($data==null){
            return true;
        }
        else{
            return $this->db->insert_batch($tname, $data);
        }
    }
    else{
        if($data!=null)
            return $this->db->insert_batch($tname, $data);
        else
            return true;
    }
}

// function DistributionOfSchemeIndent($data,$scheme_id,$class,$school_id){}

function fullindent($data){
    //print_r($data);die();
    return $this->db->insert_batch('schoolnew_schemeindent', $data);
}
function schemeIndentUpdate($data,$tbname='schoolnew_schemeindent'){
    print_r($data);
    echo $tbname;
    // return $this->db->update_batch($tbname,$data, 'id'); 
}

function getSchemeCountNotVisible($school_id){
    $SQL="SELECT	
    SUM(CASE WHEN (schoolnew_freescheme.id=sch1.scheme_id AND schoolnew_schemedetail.id=sch1.scheme_category) OR (sch1.scheme_category IS NULL AND schoolnew_schemedetail.id IS NULL) THEN
            CASE WHEN class_studying_id between appli_lowclass AND appli_highclass THEN 1 ELSE NULL END 
    ELSE NULL END) AS cscount, 
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id then 1 else NULL end) AS indcount, 
    schoolnew_freescheme.id,
    schoolnew_schemedetail.scheme_category,
    sch1.scheme_name,
    class_studying_id,
    class_studying,
    DATE_FORMAT(indent_date,'%d/%b/%Y') as indent_date
FROM 
    students_child_detail
LEFT JOIN schoolnew_freescheme ON schoolnew_freescheme.visibility=0 
JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id 
LEFT JOIN (
    select schoolnew_freescheme.id as scheme_id,scheme_name,appli_lowclass,appli_highclass,schoolnew_schemeapplicable.scheme_category 
    from schoolnew_schemeapplicable 
    JOIN schoolnew_freescheme ON schoolnew_freescheme.id=schoolnew_schemeapplicable.scheme_id 
    WHERE (schoolnew_freescheme.hill_restrict=(
                                                SELECT hill_frst FROM schoolnew_academic_detail 
                                                WHERE school_key_id=".$school_id.") OR schoolnew_freescheme.hill_restrict=0) 
                                                AND visibility=0 group by schoolnew_freescheme.id,schoolnew_schemeapplicable.scheme_category) as sch1 ON scheme_id=schoolnew_freescheme.id
LEFT JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_freescheme.id AND sch1.scheme_category=schoolnew_schemedetail.id
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
AND schoolnew_schemeindent.scheme_id=schoolnew_freescheme.id 
JOIN schoolnew_section_group ON 
        schoolnew_section_group.school_key_id=students_child_detail.school_id AND
        schoolnew_section_group.section=students_child_detail.class_section AND 
        schoolnew_section_group.class_id=students_child_detail.class_studying_id AND
        (schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
WHERE class_studying_id NOT IN (15,14,13) AND school_id=".$school_id." AND visibility=0 AND transfer_flag=0 AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
    group by sch1.scheme_id,class_studying_id ORDER BY class_studying_id,id;";//echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}
function getNotebook($school_id){
    $SQL="SELECT 
	SUM(CASE WHEN class_studying_id between appli_lowclass AND appli_highclass then 1 else NULL end) AS cscount,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id then 1 else NULL end) AS indcount, 
    count(*) as studcount,
    freescheme.scheme_category,
    DATE_FORMAT(schoolnew_schemeindent.indent_date,'%d/%b/%Y') as indent_date,
    class_studying,appli_count
FROM students_child_detail
JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
JOIN 
	(SELECT schoolnew_schemedetail.id,schoolnew_schemedetail.scheme_category,appli_lowclass,appli_highclass,appli_count FROM schoolnew_schemedetail
        JOIN schoolnew_schemeapplicable ON schoolnew_schemedetail.scheme_id=schoolnew_schemeapplicable.scheme_id
        AND schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id
        WHERE schoolnew_schemedetail.scheme_id=3 GROUP BY schoolnew_schemeapplicable.scheme_category) as freescheme
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
AND schoolnew_schemeindent.scheme_category=freescheme.id
JOIN schoolnew_section_group ON 
        schoolnew_section_group.school_key_id=students_child_detail.school_id AND
        schoolnew_section_group.section=students_child_detail.class_section AND 
        schoolnew_section_group.class_id=students_child_detail.class_studying_id AND
        (schoolnew_section_group.school_type IS NULL OR schoolnew_section_group.school_type=1)
WHERE class_studying_id NOT IN (15,14,13) AND school_id=".$school_id." AND transfer_flag=0 AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
GROUP BY class_studying,freescheme.scheme_category ORDER BY class_studying_id,scheme_category;";
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}
function getStudentsBetweenClass($school_id,$scheme_id){
    $SQL="SELECT 
            students_child_detail.id as studid,
            scheme_id,
            t1.id as schcat,
            class_studying_id,
            class_studying,
            t1.scheme_category,
            appli_lowclass,
            appli_highclass FROM students_child_detail JOIN ( 
SELECT 
	schoolnew_freescheme.id as scheme_id, 
    schoolnew_schemedetail.id, 
    schoolnew_schemeapplicable.appli_lowclass, 
    schoolnew_schemeapplicable.appli_highclass, 
    schoolnew_schemedetail.scheme_category, 
    schoolnew_freescheme.visibility 
FROM schoolnew_freescheme 
LEFT JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_freescheme.id 
LEFT JOIN schoolnew_schemeapplicable ON 
(schoolnew_schemeapplicable.scheme_id=schoolnew_schemedetail.scheme_id AND 
schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id) OR (schoolnew_schemeapplicable.scheme_category IS NULL AND
schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id) group by id,scheme_id order by scheme_id) as t1 ON (class_studying_id BETWEEN appli_lowclass AND appli_highclass)
JOIN baseapp_class_studying ON baseapp_class_studying.id=students_child_detail.class_studying_id
WHERE class_studying_id NOT IN (13,14,15) AND transfer_flag=0 AND school_id=".$school_id." AND scheme_id=".$scheme_id." ORDER BY class_studying_id;"; //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}


function getDashboardCount($where,$groupby,$group,$distri){
    /*$SQL="SELECT 
	schoolnew_district.id as dist_id,
	district_name,
    schoolnew_edn_dist_mas.id as edudistrict_id,
    schoolnew_edn_dist_mas.edn_dist_name,
    schoolnew_block.id as blk_id,
    block_name,
    schoolnew_basicinfo.school_id as school_id,
    school_name,
    udise_code,
    COUNT(CASE WHEN class_studying_id=1 THEN 1 ELSE NULL END) AS C1,
    COUNT(CASE WHEN class_studying_id=2 THEN 1 ELSE NULL END) AS C2,
    COUNT(CASE WHEN class_studying_id=3 THEN 1 ELSE NULL END) AS C3,
    COUNT(CASE WHEN class_studying_id=4 THEN 1 ELSE NULL END) AS C4,
    COUNT(CASE WHEN class_studying_id=5 THEN 1 ELSE NULL END) AS C5,
    COUNT(CASE WHEN class_studying_id=6 THEN 1 ELSE NULL END) AS C6,
    COUNT(CASE WHEN class_studying_id=7 THEN 1 ELSE NULL END) AS C7,
    COUNT(CASE WHEN class_studying_id=8 THEN 1 ELSE NULL END) AS C8,
    COUNT(CASE WHEN class_studying_id=9 THEN 1 ELSE NULL END) AS C9,
    COUNT(CASE WHEN class_studying_id=10 THEN 1 ELSE NULL END) AS C10,
    COUNT(CASE WHEN class_studying_id=11 THEN 1 ELSE NULL END) AS C11,
    COUNT(CASE WHEN class_studying_id=12 THEN 1 ELSE NULL END) AS C12
FROM schoolnew_schemeindent
JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id AND transfer_flag=0
JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.id=schoolnew_basicinfo.edu_dist_id AND schoolnew_edn_dist_mas.district_id=schoolnew_district.id
JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.block_id AND schoolnew_block.id=schoolnew_basicinfo.block_id
WHERE distribution_date IS NULL AND finalsub=1 ".$where.$group;*/
    //echo($SQL);die();
    
    /*$SQL="SELECT schoolnew_district.id as dist_id, district_name, schoolnew_edn_dist_mas.id as edudistrict_id, 
    schoolnew_edn_dist_mas.edn_dist_name, schoolnew_block.id as blk_id, block_name, schoolnew_basicinfo.school_id as school_id, school_name, udise_code,
(CASE WHEN schoolnew_schemeindent.scheme_category IS NULL THEN
	CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN
	   (SELECT MEDINSTR_DESC FROM schoolnew_mediumofinstruction 
		JOIN students_child_detail AS scd ON scd.education_medium_id=MEDINSTR_ID
        WHERE scd.id=students_child_detail.id AND scd.transfer_flag=0)
	ELSE
		NULL
    END
 ELSE
 schoolnew_schemedetail.scheme_category END) AS scheme_category,
  SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END
		END 
	) AS boys_count,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END
		END 
	) AS girls_count,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=3 THEN 1 ELSE 0 END
		END 
	) AS trans_count,
COUNT(CASE WHEN schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category THEN 1 ELSE 0 END) AS catcount,
schoolnew_schemeindent.scheme_id,appli_count
FROM schoolnew_schemeindent
LEFT JOIN schoolnew_schemedetail ON schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category AND schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id
LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id AND schoolnew_schemeapplicable.scheme_id=schoolnew_schemedetail.scheme_id
JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id AND transfer_flag=0 
JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id 
JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id 
JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.id=schoolnew_basicinfo.block_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.id AND schoolnew_block.district_id=schoolnew_district.id 
WHERE distribution_date IS NULL AND finalsub=1 ".$where.$group.",scheme_category;";


//AND schoolnew_basicinfo.school_id IN (SELECT school_id FROM students_child_detail WHERE id IN(SELECT student_id FROM schoolnew_schemeindent GROUP BY student_id) GROUP BY school_id)
    /*$SQL="SELECT  dist_id, district_name, edudistrict_id,edn_dist_name,blk_id, block_name,school_id, school_name, udise_code,T1.scheme_category,
scheme_category_id,T1.scheme_id,appli_count,
COUNT(CASE WHEN schoolnew_schemeindent.scheme_category=T1.scheme_category THEN 1 ELSE 0 END) AS catcount FROM
(SELECT schoolnew_district.id as dist_id, district_name, schoolnew_edn_dist_mas.id as edudistrict_id, schoolnew_edn_dist_mas.edn_dist_name, schoolnew_block.id as blk_id, block_name, schoolnew_basicinfo.school_id as school_id, school_name, udise_code, 
(CASE WHEN schoolnew_schemeindent.scheme_category IS NULL THEN
	CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN
	   (SELECT MEDINSTR_DESC FROM schoolnew_mediumofinstruction 
		JOIN students_child_detail AS scd ON scd.education_medium_id=schoolnew_mediumofinstruction.MEDINSTR_ID
        WHERE scd.id=students_child_detail.id AND scd.id=schoolnew_schemeindent.student_id AND scd.transfer_flag=0)
	ELSE
		NULL
    END
 ELSE
schoolnew_schemedetail.scheme_category END) AS scheme_category,
(CASE WHEN schoolnew_schemeindent.scheme_category IS NULL THEN
	CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN
	   (SELECT MEDINSTR_ID FROM schoolnew_mediumofinstruction 
		JOIN students_child_detail AS scd ON scd.education_medium_id=schoolnew_mediumofinstruction.MEDINSTR_ID
        WHERE scd.id=students_child_detail.id AND scd.id=schoolnew_schemeindent.student_id AND scd.transfer_flag=0)
	ELSE
		NULL
    END
 ELSE
schoolnew_schemeindent.scheme_category END) AS scheme_category_id,
schoolnew_schemeindent.scheme_id,appli_count FROM 
schoolnew_schemeindent 
LEFT JOIN schoolnew_schemedetail ON schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category AND schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id 
LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_category=schoolnew_schemedetail.id AND schoolnew_schemeapplicable.scheme_id=schoolnew_schemedetail.scheme_id 
JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id AND transfer_flag=0 
JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_child_detail.school_id 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id 
JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.id=schoolnew_basicinfo.edu_dist_id AND schoolnew_edn_dist_mas.district_id=schoolnew_district.id JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.block_id=schoolnew_basicinfo.block_id 
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.block_id AND schoolnew_block.id=schoolnew_basicinfo.block_id 
WHERE distribution_date IS NULL AND finalsub=1 AND transfer_flag=0 ".$where.") AS T1
JOIN schoolnew_schemeindent ON schoolnew_schemeindent.scheme_category=T1.scheme_category_id
JOIN schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID=T1.scheme_category_id ".$group.",T1.scheme_category;";*/


    //New Query
    $SQL="SELECT 
	students_school_child_count.district_id as dist_id,
    students_school_child_count.district_name,
    students_school_child_count.edu_dist_id as edudistrict_id,
    students_school_child_count.edu_dist_name as edn_dist_name,
    students_school_child_count.block_id as blk_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    students_school_child_count.school_name,
    students_school_child_count.udise_code,
	(CASE WHEN schoolnew_schemeindent.scheme_id=9 THEN
		CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
            (SELECT MEDINSTR_DESC FROM schoolnew_mediumofinstruction WHERE MEDINSTR_ID=students_child_detail.education_medium_id)
		ELSE
			NULL
		END
	ELSE
	   scheme_cat.scheme_category END) AS scheme_category,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END
		END 
	) AS boys_count,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END
		END 
	) AS girls_count,
    SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN students_child_detail.gender=3 THEN 1 ELSE 0 END
		END 
	) AS trans_count,
COUNT(CASE WHEN scheme_cat.scheme_category_id=schoolnew_schemeindent.scheme_category THEN 1 ELSE 0 END) AS catcount,
schoolnew_schemeindent.scheme_id,appli_count,
(SELECT class_studying FROM baseapp_class_studying WHERE id=students_child_detail.class_studying_id) as class_studying,
students_child_detail.class_studying_id
FROM schoolnew_schemeindent
JOIN (SELECT 
	schoolnew_schemeapplicable.scheme_id,
    schoolnew_schemeapplicable.appli_count,
    schoolnew_schemedetail.id as scheme_category_id,
    schoolnew_schemedetail.scheme_category
	FROM schoolnew_schemeapplicable
LEFT JOIN schoolnew_schemedetail on schoolnew_schemedetail.scheme_id=schoolnew_schemeapplicable.scheme_id 
AND schoolnew_schemedetail.id=schoolnew_schemeapplicable.scheme_category) AS scheme_cat ON 
scheme_cat.scheme_id=schoolnew_schemeindent.scheme_id AND
IF(schoolnew_schemeindent.scheme_id IN (SELECT scheme_id FROM schoolnew_schemedetail group by scheme_id),scheme_cat.scheme_category_id=schoolnew_schemeindent.scheme_category,TRUE)
JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id AND transfer_flag=0
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=students_school_child_count.school_id
JOIN (SELECT school_key_id,MEDINSTR_ID as id,MEDINSTR_DESC as meddesc FROM schoolnew_mediumofinstruction
        JOIN schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=MEDINSTR_ID) AS medch ON medch.school_key_id=students_child_detail.school_id 
AND medch.id=students_child_detail.education_medium_id 
WHERE distribution_date IS".$distri." NULL AND finalsub=1 ".$where.$groupby.",scheme_category ORDER BY ".$group.";";

    //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}

function getSummaryCount($school_id){
    /*$SQL="SELECT 
	IF(schoolnew_schemeindent.student_id IS NULL,COUNT(students_child_detail.id),SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 1 ELSE 0 END)) as indcount,
    scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility 
FROM students_child_detail
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
LEFT JOIN schoolnew_freescheme ON schoolnew_freescheme.id=schoolnew_schemeindent.scheme_id
WHERE students_child_detail.school_id=".$school_id." AND class_studying_id<=12 GROUP BY scheme_id,class_studying_id ORDER BY class_studying_id ASC,visibility DESC;";*/
    
    $SQL="SELECT 
	IF(scheme_id!=14,IFNULL(indcount,stdcount),indcount) as indcount,
	scheme_id,class_studying_id,class_studying,visibility,low_class,high_class,checkbit
FROM(SELECT 
	SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN schoolnew_schemeindent.scheme_id=freescheme.scheme_id THEN 1 ELSE NULL END END) as indcount,
	COUNT(DISTINCT students_child_detail.id) as stdcount,
    freescheme.scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility,low_class,high_class,
    (CASE WHEN schoolnew_schemeindent.scheme_id IS NOT NULL THEN 1 ELSE 0 END) as checkbit
FROM students_child_detail
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
LEFT JOIN (SELECT   
	schoolnew_schemeapplicable.scheme_id,
    MIN(schoolnew_schemeapplicable.appli_lowclass) as low_class,
    MAX(schoolnew_schemeapplicable.appli_highclass) as high_class,
    appli_count,visibility,hill_restrict,school_key_id
FROM schoolnew_freescheme
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.hill_frst=hill_restrict OR hill_restrict=0
LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
WHERE school_key_id=".$school_id."
GROUP BY scheme_id,school_key_id) AS freescheme ON freescheme.school_key_id=students_child_detail.school_id
WHERE students_child_detail.school_id=".$school_id." AND class_studying_id<=12 AND transfer_flag=0
AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
GROUP BY freescheme.scheme_id,class_studying_id 
ORDER BY class_studying_id ASC,visibility DESC) AS der;";

    //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
}

/*************************END Written By Elavarasi Vivek Rao *****************************************************************************************/

//basic 1 updates
 function Religionlist(){
    $this->db->select('*')
        ->from('baseapp_religion');           
   $query = $this->db->get(); 
    return $query->result();

  }
  function communitylist(){
       $this->db->select('*'); 
       $this->db->from('baseapp_community');
       $query =  $this->db->get();
       return $query->result(); 
    }
    function subcaselist(){
       $this->db->select('*'); 
       $this->db->from('baseapp_sub_castes');
       $query =  $this->db->get();
       return $query->result();  
    }
     function mothertlist(){
       $this->db->select('*'); 
       $this->db->from('baseapp_language');
      $query =  $this->db->get();
      return $query->result();   
    }
    function disadvantageslist(){
       $this->db->select('*'); 
       $this->db->from('baseapp_disadvantaged_group');
      $query =  $this->db->get();
      return $query->result();   
    }
    function disabilitieslist(){
         $this->db->select('*')
              ->from('baseapp_differently_abled');              
              $query = $this->db->get();      
       return $query->result();
    }
    function getbloodgroupname($id){
         $this->db->select('*'); 
         $this->db->from('baseapp_bloodgroup');
         $this->db->where('id',$id); 
         $query =  $this->db->get();
         return $query->result();   
    }
    function getDisadvantagegroupName($id){
         $this->db->select('*'); 
         $this->db->from('baseapp_disadvantaged_group');
         $this->db->where('id',$id); 
         $query =  $this->db->get();
         return $query->result();   
    }
    function getDisabilityGroupName($mothertounge_id){
         $this->db->select('*'); 
         $this->db->from('baseapp_differently_abled');
         $this->db->where('id',$mothertounge_id); 
         $query =  $this->db->get();
         return $query->result();   
    }
     function getcommunity1($community_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_community');
       $this->db->where('id',$community_id); 
       $query =  $this->db->get();
       return $query->result(); 
    }

    function prof1dataupdate($studid,$data){
      $this->db->where('unique_id_no', $studid);
       return  $this->db->update('students_child_detail', $data);
    }

    function getprvclassname($id){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('class_studying');
    }

    function emischangestudentflag($student_id,$date){
      $data=array('transfer_flag'=>1,'request_flag'=>'0');
       $this->db->where('unique_id_no', $student_id);
       return  $this->db->update('students_child_detail', $data);
    }

 /*********************************Start Raise a request ***************************/
    function emisraisearequestflag($student_id,$data){

       $this->db->where('unique_id_no', $student_id);
       return  $this->db->update('students_child_detail', $data);
    }


  function getrequestedstudents($schoolid){
       $this->db->select('b.school_id,a.unique_id_no,a.school_admission_no,a.name,a.dob,a.class_studying_id,b.school_name'); 
       $this->db->from('students_child_detail a');
       $this->db->join('students_school_child_count b','b.udise_code = a.request_id');
       $this->db->where('a.school_id',$schoolid);
       $this->db->where('a.transfer_flag',0);
       $this->db->where('a.request_flag','1');
       $this->db->order_by('name','asc');

       $query =  $this->db->get();
       return $query->result();  
    }
 /*********************************END Raise a request ***************************/



    function getstudetailsfortransfer($id){
        $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('unique_id_no',$id); 
       $query =  $this->db->get();
       return $query->result();
    }
    function emisaddstutransferhistory($data){
      return $this->db->insert('student_transferhistory', $data);   
    }
    function checkstutransferstatus($id,$sid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('unique_id_no',$id);
       $this->db->where('school_id',$sid);
       
       $query =  $this->db->get();
       if($query -> num_rows() == 1){
       return $query->result();
       }
       else
       {
         return false;
       }
    }

     function updatestudata_admission($uniqeid,$data)
    {
      $this->db->where('unique_id_no', $uniqeid);      
      return $this->db->update('students_child_detail', $data);         
    }

    function getstuflag($id){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('unique_id_no',$id); 
       $query =  $this->db->get();
       return $query->row('transfer_flag');
    } 
   function getschoolprofiledetails($id){
        $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }
   function getschoollenrollabstract($id){
        $this->db->select('*'); 
       $this->db->from('schoolnew_enroll_abstract');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }   
  function getblockname($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_block');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('block_name');
    } 
  function getcatename($id){
        if($id!=""){
           $this->db->select('*'); 
           $this->db->from('baseapp_category');
           $this->db->where('id',$id); 
           $query =  $this->db->get();
           return $query->row('category_name');
       }else{
            $this->db->select('*'); 
            $this->db->from('baseapp_category');
            $query =  $this->db->get();
            return $query->result();
       }
    } 
  function getmanagename($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_management');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('management');
    } 
      function getdirectoratename($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_school_department');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('department');
    } 

       function getschooluname($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row('udise_code');
    } 
    function getallstandardsbyschool($id){
       $this->db->select('low_class,high_class'); 
       $this->db->from('schoolnew_academicinfo');
       $this->db->where('school_key_id',$id); 
       $query =  $this->db->get();
       return $query->result();
    }
  

  function getschoolname($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row('school_name');
  }

      function emis_school_resetpassword($school_id,$username,$data){
      $this->db->where('emis_user_id', $school_id);
       $this->db->where('emis_username', $username);
      return $this->db->update('emis_userlogin', $data);         
    }

    function getoldpassschool($school_id,$username){
             $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('emis_user_id',$school_id); 
       $this->db->where('emis_username',$username);
       $query =  $this->db->get();
       return $query->row('emis_password');
    }

    function getallbrachesbyschoolinchildetail($schoolid,$class_id){
       $this->db->select('name'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id',$class_id);
       $this->db->where('transfer_flag',0); 
       $query =  $this->db->get();
       return $query->result();
    }
        function getallbrachesbyschoolinchildetail_idcard($schoolid,$class_id){
       $this->db->select('name'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id',$class_id);
       $this->db->where('transfer_flag',0); 
       $this->db->where('idcardstatus','Not Aprooved');
       $query =  $this->db->get();
       return $query->result();
    }

        function getstandaradnamesepe($classid){
             $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$classid); 
       $query =  $this->db->get();
       return $query->row('class_studying');
    }

      function getschooludsccode($id){
       $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('school_id',$id); 
       $query =  $this->db->get();
       return $query->row('udise_code');
  }


      function getschoolmediumname($id){
       $this->db->select('*'); 
       $this->db->from('baseapp_education_medium');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('education_medium');
  }

      function getallbrachesbyschoolinchildetail1($schoolid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0); 
       $query =  $this->db->get();
       return $query->result();
    }

     function getoccupation($id){
      $this->db->select('*');
      $this->db->from('baseapp_occupation');
      $this->db->where('id',$id);
      $query =  $this->db->get();
      return $query->row('occu_name');
   }

   function getschoolidbyudisecode($udisecode){
          $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('udise_code',$udisecode);
      $query =  $this->db->get();
      return $query->row('school_id');
   }

   function getsepratesectionlist($class){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id<=',$class); 
       $query =  $this->db->get();
       return $query->result();
   }

   function getparentincome($id){
          $this->db->select('*'); 
       $this->db->from('baseapp_parentincome');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('income_value');
   }

   function updateschfirstdata($school_id,$data)
    {
      $this->db->where('school_id', $school_id);      
      return $this->db->update('schoolnew_basicinfo', $data);         
    }

   function updateenrollmentabstract($school_id,$data2)
    {
      $this->db->where('school_id', $school_id);      
      return $this->db->update('schoolnew_enroll_abstract', $data2);         
    }

   function insertenrollmentabstract($school_id,$data3)
    {
       return $this->db->insert('schoolnew_enroll_abstract', $data3);        
    }

    function checkalreadycheckemail($email,$school_id){
                $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('sch_email',$email);
      $this->db->where('school_id !=',$school_id);
      $query =  $this->db->get();
      return $query->result();
    }

     function checkalreadycheckmobile($mobile,$school_id){
                $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('mobile',$mobile);
      $this->db->where('school_id !=',$school_id);
      $query =  $this->db->get();
      return $query->result();
    }

    function checkenrllabstblavail($school_id){
                $this->db->select('id');
      $this->db->from('schoolnew_enroll_abstract');
      $this->db->where('school_id',$school_id);
      $query =  $this->db->get();
      return $query->result();
    }

       function updateschuserfirstdata($school_id,$data)
    {
      $this->db->where('emis_user_id', $school_id);      
      return $this->db->update('emis_userlogin', $data);         
    }

      function getschoolidbyemail($email){
                $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('sch_email',$email);
      $query =  $this->db->get();
      return $query->row('school_id');
    }

    function updatepasswordschool($school_id,$data){
      $this->db->where('emis_user_id', $school_id);      
      return $this->db->update('emis_userlogin', $data); 
    }

    function getschoolnamesep($id){
                      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$id);
      $query =  $this->db->get();
      return $query->row('school_name');
    }

     function getschooludisesep($id){
                      $this->db->select('*');
      $this->db->from('schoolnew_basicinfo');
      $this->db->where('school_id',$id);
      $query =  $this->db->get();
      return $query->row('udise_code');
    }

       function getparentincomeall(){
          $this->db->select('*'); 
       $this->db->from('baseapp_parentincome');
       $query =  $this->db->get();
       return $query->result();
   }

   function checkcreatedatestudent($studentid,$school_id){
          $this->db->select('created_at'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$school_id);
       $this->db->where('unique_id_no',$studentid);
       $query =  $this->db->get();
       return $query->row('created_at');
   }

   function getallparentoccupation(){
             $this->db->select('*'); 
       $this->db->from('baseapp_occupation');
       $query =  $this->db->get();
       return $query->result();
   }

   // function getstuprofileimages($studentid){
   //               $this->db->select('*'); 
   //     $this->db->from('students_child_idcard');
   //      $this->db->where('unique_id_no',$studentid);
   //     $query =  $this->db->get();
   //     return $query->result();
   // }

      function getallbloodgroups($studentid){
                 $this->db->select('*'); 
       $this->db->from('baseapp_bloodgroup');
       $query =  $this->db->get();
       return $query->result();
   }

   function saveidcardtable($data){
    return $this->db->insert('students_child_idcard', $data);   
   }

    function saveidcardupdate($stuid,$data){
      $this->db->where('unique_id_no', $stuid);      
      return $this->db->update('students_child_detail', $data); 
    }

    function getidcardupdatestudent($studentid){
      $this->db->select('*'); 
       $this->db->from('students_child_idcard');
        $this->db->where('unique_id_no',$studentid);
       $query =  $this->db->get();
       return $query->result();
    }

        function saveidcardtableupdate($stuid,$data){
      $this->db->where('unique_id_no', $stuid);      
      return $this->db->update('students_child_idcard', $data); 
    }


      function getspecbloodgroup($id){
                 $this->db->select('*'); 
       $this->db->from('baseapp_bloodgroup');
         $this->db->where('id',$id);
       $query =  $this->db->get();
       return $query->row('group');
   }

   function changeidcardapproovalstatus($studid,$data){
     $this->db->where('unique_id_no', $studid);      
      return $this->db->update('students_child_detail', $data);
   }

    function getallstudsbyclsecnew($schoolid,$classid,$section,$limit){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('class_section', $section); 
       $this->db->where('class_studying_id', $classid); 
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Not Aprooved');
       $this->db->order_by('name','asc');

       if($limit!=""){  $this->db->limit($limit); }
       $query =  $this->db->get();
       return $query->result();  
    }

    function getidcardstudentlist($schoolid,$class,$section){
    $this->db->select('*'); 
    $this->db->from('students_child_detail');

    $this->db->where('school_id',$schoolid);
    $this->db->where('class_studying_id',$class);
    $this->db->where('class_section',$section);
    $this->db->where('idcardstatus','Aprooved');
     $this->db->where('idapproove','1');
    $query =  $this->db->get();
    return $query->result();  
    }

        function getidcardstudentlist1($studid,$schoolid){
    $this->db->select('*'); 
    $this->db->from('students_child_detail');
    $this->db->where('school_id',$schoolid);
    $this->db->where('unique_id_no',$studid);
    $query =  $this->db->get();
    return $query->result();  
    }

          function getallbrachesbyschoolinchildetail2($schoolid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
     $this->db->where('school_id',$schoolid);
     $this->db->where('idcardstatus','Aprooved');
     $this->db->where('idapproove','1');
       $this->db->where('transfer_flag',0); 
       $query =  $this->db->get();
       return $query->result();
    }

     function getallbrachesbyschoolinchildetail22($schoolid,$class_id){
       $this->db->select('name'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id',$class_id);
       $this->db->where('transfer_flag',0); 
        $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','1');
       $query =  $this->db->get();
       return $query->result();
    }


    function updateidcardidapproove($stuid,$data){
      $this->db->where('unique_id_no', $stuid);      
      return $this->db->update('students_child_detail', $data); 
    }

     function getallbrachesbyschoolinchildetail1_view($schoolid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Not Aprooved'); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getallbrachesbyschoolinchildetail2_view($schoolid){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0'); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getallbrachesbyschoolinchildetail22_view($schoolid,$class_id){
        $this->db->select('name'); 
       $this->db->from('students_child_detail');
       $this->db->where('school_id',$schoolid);
       $this->db->where('class_studying_id',$class_id);
       $this->db->where('transfer_flag',0); 
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0'); 
       $query =  $this->db->get();
       return $query->result();
    }

      function getallstudsbyclsecnew1($schoolid,$classid,$section,$limit){
       $this->db->select('*'); 
       $this->db->from('students_child_detail');
       $this->db->where('class_section', $section); 
       $this->db->where('class_studying_id', $classid); 
       $this->db->where('school_id',$schoolid);
       $this->db->where('transfer_flag',0);
       $this->db->where('idcardstatus','Aprooved');
       $this->db->where('idapproove','0');

       if($limit!=""){  $this->db->limit($limit); }
       $query =  $this->db->get();
       return $query->result();  
    }


    public function update_examdta($key,$value){        
        $this->db->where('unique_id_no',$key);
        $this->db->update('students_child_detail',array('c_exam'=>$value));
        return true;
    }


   /***************** Declaeration table insert and update ***********************/
   
    function declaratinoupdate($upload){
        return $this->db->insert('students_school_declaration_abst', $upload); 
    } 

 /* $$$$$$$$$$$$$$$$$$$$$$$$$ get flash data $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/

       function getflashdata($type){
       $this->db->select('content,saidby'); 
       $this->db->from('flash_news');
       $this->db->where('type',$type);
       $this->db->where('status',1);
       $this->db->order_by('sno', 'desc');
       $query =  $this->db->get();
       return $query->result();
    }
    
/**************************************************************************************************************************
    Function Included By Vivek Rao KP Ramco Cements Limited
**************************************************************************************************************************/

    function createOptionForSelection($dataArray,$tableDescribtion,$checkbit){
        $options='<option value="">Choose....</option>';
        if($checkbit==8 || $checkbit==9 || $checkbit==10 || $checkbit==13){
            //return $dataArray;
            $checkbit=2;
        }
        else if($checkbit==0 || $checkbit==11){
             $checkbit=1;
        }
        else if($checkbit==1 || $checkbit=7){
            $checkbit=3; 
        } 
        
        foreach($dataArray as $opt){
            $options.='<option value="'.$opt[$tableDescribtion[0]['Field']].'">'.$opt[$tableDescribtion[$checkbit]['Field']].'</option>';
        }
        return $options;
    }
    
    function UpdateDataWithTableName($data,$udiseOrkeyid,$tableName)
    {
      $this->db->where('udise_code', $udiseOrkeyid);      
      return $this->db->update($tableName, $data);         
    }
    
    function getSchoolInfo($school_udise)
    {
        
        $SQL="SELECT *,schoolnew_basicinfo.udise_code as udise_code,schoolnew_basicinfo.block_id as bid,schoolnew_stdcode_mas.id as sid FROM schoolnew_basicinfo
            LEFT JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
            LEFT JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
            LEFT JOIN schoolnew_stdcode_mas ON schoolnew_stdcode_mas.dist_id=schoolnew_basicinfo.district_id
            LEFT JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
            LEFT JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id
            LEFT JOIN schoolnew_management ON schoolnew_management.id=schoolnew_basicinfo.sch_management_id
            LEFT JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id
            LEFT JOIN baseapp_category ON baseapp_category.id=schoolnew_basicinfo.sch_cate_id
            WHERE   
            schoolnew_basicinfo.school_id=".$school_udise;
            //echo $SQL;
            //die();
            $query = $this->db->query($SQL);
            return $query->result();
    }
    
    
    function UpdateToTableData($tableName,$referID,$data,$referValue,$InsertOrUpdate){
        //echo($tableName);
        $this->db->from($tableName);
        $this->db->where($referID, $referValue); 
        $query =  $this->db->get();
        $check=$query->result();
        $cbit='true';
        if($InsertOrUpdate==null){
            if($check[0]->id==null){
                $data[$referID]=$referValue;
                return $this->db->insert($tableName, $data);
            }
            else{
                $this->db->where($referID, $referValue);      
                return $this->db->update($tableName, $data);
            }
        }
        else if($InsertOrUpdate==3){
            if($check[0]->id!=''){
                $this->db->where($referID, $referValue); 
                $this->db->delete($tableName); 
            }
            if(!empty($data)){
                return $this->db->insert_batch($tableName, $data);
            }else{
                return true;
            }
        }
    }
    
    function UpdateProfileCompleteFlag($data,$school_key_id){
        $this->db->select('id'); 
        $this->db->from('schoolnew_profilecomplete');
        $this->db->where('school_key_id', $school_key_id); 
        $query =  $this->db->get();
        $check=$query->result();
        
        if($check[0]->id!=''){
            $this->db->where('school_key_id',$school_key_id);      
            return $this->db->update('schoolnew_profilecomplete', $data);
        }
        else{
            return $this->db->insert('schoolnew_profilecomplete', $data);
        }
    }
    
    
    function ModelForAllParts($table,$rID,$rVal){
        $SQL="SELECT * FROM ".$table." WHERE ".$rID."=".$rVal;
        $query = $this->db->query($SQL);
        if($query==null)
            return null;
        else
            return $query->result();
    }
    
    
    function getLastRenewal($school_key_id){
        $SQL="SELECT * FROM schoolnew_renewal WHERE school_key_id=".$school_key_id;
        $query = $this->db->query($SQL);
        if($query==null)
            return null;
        else
            return $query->result();
    }
    
    function construtionModel($schoolid){
        $SQL="SELECT *,(CASE construct_type WHEN 1 THEN 'PUCCA' WHEN 2 THEN 'PARTIALLY PUCCA' WHEN 3 THEN 'KUTCHA' WHEN construct_type IS NULL THEN 'N/A' ELSE 'AN' END) AS constr
FROM schoolnew_natureofconst_entry where school_key_id=".$schoolid;
        $query = $this->db->query($SQL);
        return $query->result();
    }
    
    function getCertificateMaster($where=' WHERE upgradation=0'){
        $SQL="SELECT * FROM schoolnew_renewalcertificate_master".$where;
        $query = $this->db->query($SQL);
        if($query==null)
            return null;
        else
            return $query->result();
    }
    function getBankByIFSC($IFSC){
        $SQL="SELECT * FROM schoolnew_branch WHERE ifsc_code='".$IFSC."'";
        $query = $this->db->query($SQL);
        if($query==null)
            return null;
        else
            return $query->result();
    }
    
    function RenewalInsert($data,$tableName,$batch){
        if($batch==3){
            return $this->db->insert_batch($tableName, $data);
        }
        elseif($batch==2){
            $this->db->insert($tableName, $data);
            return $this->db->insert_id();
        }
    }
    
    
    
    function getallclassstudying($low,$high){
      
       $SQL="SELECT id,class_studying FROM (
                SELECT id,class_studying FROM baseapp_class_studying 
                UNION
                SELECT (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 0 ELSE id END) as id,
                    (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 'NA' ELSE class_studying END) as class_studying 
                FROM baseapp_class_studying) AS M1   
             WHERE (id BETWEEN (CASE WHEN (".$low.">12 AND ".$high."<12) THEN 0 ELSE ".$low." END) AND ".$high.") 
             OR (id BETWEEN 13 AND (CASE WHEN (".$low.">12 AND ".$low."<=14) THEN 14 ELSE ".$low." END));" ; 
             
       //echo($SQL);die();
       $query = $this->db->query($SQL);
       return $query->result_array();    
  }
    
    
    function getGroupCodeBySchoolid($school_id,$desc="AND group_description=1"){
        $SQL="SELECT *,(CASE WHEN ((sub3 IN (105,107,109,111,113,119,131,133,135,303,307,309,315,319,323,327,331,335,339,343,379)) OR
(sub4 IN (105,107,109,111,113,119,131,133,135,303,307,309,315,319,323,327,331,335,339,343,379)) OR 
(sub5 IN (105,107,109,111,113,119,131,133,135,303,307,309,315,319,323,327,331,335,339,343,379)) OR 
(sub6 IN (105,107,109,111,113,119,131,133,135,303,307,309,315,319,323,327,331,335,339,343,379))) THEN 1 ELSE 0 END
) as labs FROM baseapp_group_code WHERE 
            group_code NOT IN 
            (IFNULL((SELECT group_id FROM schoolnew_section_group WHERE school_key_id=".$school_id." AND (class_id=11 OR class_id=12) 
                    GROUP BY group_id),''))".$desc.";";
         //echo($SQL);die();
       $query = $this->db->query($SQL);
       return $query->result_array();    
    }
    
    
     /**
    *Students Schools classwise
    *VIT
    * 28/01/2019
    */

    public function student_classwise($school_id)
    {
      // echo $school_id;
      $this->db->select('low_class,high_class');
     $result =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
      // print_r($result);die;
     $select_arr = [];
     $select_len = [];
     if(!empty($result)){
       if($result->low_class == 15)
        {
          // echo  "if";
          if($result->high_class!=13 && $result->high_class!=14 && $result->high_class!=15)
        {
          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($select_len, $i);

          array_push($select_arr, 'Prkg_b','Prkg_g','Prkg_t','lkg_b','lkg_g','lkg_t','ukg_b','ukg_g','ukg_t','c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
      }
    }else 
    {
          array_push($select_arr, '*');

    }
        }else if($result->low_class == 13)
        {
          // echo "else if";
          // echo $result->high_class;
        if($result->high_class!=14 && $result->high_class!=15 && $result->high_class!=13)
        {
          for($i=1;$i<=$result->high_class;$i++)
          {
            array_push($select_len, $i);

              array_push($select_arr,'lkg_b','lkg_g','lkg_t','ukg_b','ukg_g','ukg_t','c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
          }
        }else
        {
            array_push($select_arr,'*');

        }
        }else if($result->low_class !=0 && $result->high_class !=0)
        {
          for($i=$result->low_class;$i<=$result->high_class;$i++)
      {
        // array_push($select_len, $i);

          array_push($select_arr, 'c'.$i.'_b','c'.$i.'_g','c'.$i.'_t');
      }
        }else
        {
          // echo "else";
          array_push($select_arr,'*');
        }
        
      }
      // print_r($select_arr);die;
      $select_query = implode(",", $select_arr);
      // print_r($select_query);die;
      $this->db->select($select_query);
      
     $school_details =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
     
     $tempArr_len = [];
     if($result->low_class ==15)
      {
        $tempArr_len['low_class'] = 1;
        $tempArr_len['high_class'] = $result->low_class; 
      }else if($result->low_class ==13)
      {
         $tempArr_len['low_class'] = 1;
        $tempArr_len['high_class'] = $result->low_class;
      }else
      {
        $tempArr_len['low_class'] = $result->low_class;
          $tempArr_len['high_class'] = $result->high_class;
      }
     
     $school_over_all_details['school_details'] = $school_details;
     // $school_over_all_details['select_len'] = $select_len; 
     $school_over_all_details['result'] = $tempArr_len;
     // print_r($school_over_all_details);die;
     return $school_over_all_details;
    }
    public $head_master_array = [];
    public function emis_school_staff_details($school_id)
    {
      // echo $school_udise;die;
      // $head_master_array = array(26,27,28,29);

//        $SQL="SELECT  udise_staffreg.u_id,udise_staffreg.teacher_type,udise_staffreg.teacher_code,udise_staffreg.gender,
// teacher_type.type_teacher,teacher_type.category,teacher_subjects.subjects,udise_staffreg.udise_code,
// count(CASE udise_staffreg.gender WHEN 1 THEN 1 ELSE NULL END) AS male,
// count(CASE udise_staffreg.gender WHEN 2 THEN 1 ELSE NULL END) AS female,
// count(CASE udise_staffreg.gender WHEN 3 THEN 1 ELSE NULL END) AS trans,
// (CASE udise_staffreg.teacher_type WHEN 11 THEN 'BT' ELSE  
//   CASE udise_staffreg.teacher_type WHEN 36 THEN 'PG' ELSE
//     CASE udise_staffreg.teacher_type WHEN 41 THEN 'SGT' ELSE
//       CASE WHEN (udise_staffreg.teacher_type=26 OR udise_staffreg.teacher_type=27 OR udise_staffreg.teacher_type=28 OR udise_staffreg.teacher_type=29) THEN 'HM' ELSE 
//         CASE teacher_type.category WHEN 1 THEN 'OTHER' ELSE 'NT' END
//             END
//     END
//   END
// END) AS otn,
// (CASE teacher_type.category WHEN 1 THEN 'T' ELSE 'NT' END) AS tnn
// FROM udise_staffreg
// LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
// LEFT JOIN teacher_subjects ON udise_staffreg.subject1=teacher_subjects.id
// WHERE udise_staffreg.udise_code=".$school_udise." AND udise_staffreg.archive=1 AND 
// category IS NOT NULL AND udise_staffreg.teacher_type IN (SELECT id FROM teacher_type) group by otn;";
    // $query = $this->db->query($SQL);

      $result = $this->db->get_where('teacher_profile_count',array('school_key_id'=>$school_id))->first_row();
    // echo"<pre>";print_r($query->result_array());echo"</pre>";die;
    return $result;

              }

    

    /**
    * Class Wise Function Start
    * Get Section 
    *@param $class_id ,$school_key_id
    *VIT
    */

    public function getsectiondetails($class_id,$school_id)
    {
      $result = $this->db->get_where('schoolnew_section_group',array('school_key_id'=>$school_id,'class_id'=>$class_id))->result();
      // print_r($this->db->last_query());die;
      // print_r($result);die;
      return $result;
    }

    /**
    * Schoolwise Community
    * VIT - sriram
    * 23/01/2019
    **/

    public function get_dash_schoolwise_community()
    {
      $school_id = $this->session->userdata('emis_user_id');
        $this->db->select('bc,mbc,st,sc,oc,dnc')
        ->from('students_school_child_count')
         ->where('school_id',$school_id);
        $result = $this->db->get()->first_row();
        return $result;
      
    }
	public function get_classwise_community($class_id)
    {
		
      $school_id = $this->session->userdata('emis_user_id');
     $select_arr = array('(c'.$class_id.'_b+c'.$class_id.'_g+c'.$class_id.'_t) as c,baseapp_community.community_name');
	 $select_arr = implode(",",$select_arr);
      $this->db->select($select_arr)
            ->from(' students_community_school_count')
            ->join('baseapp_community','students_community_school_count.community_code = baseapp_community.community_code')
            ->where('school_id',$school_id)
            ->group_by('students_community_school_count.community_code');
            $result = $this->db->get()->result();
            return $result;
	 
      
    }
	// public function get_dash_schoolwise_community()
    // {
      // $school_id = $this->session->userdata('emis_user_id');
        // $this->db->select('bc,mbc,st,sc,oc,dnc')
        // ->from('students_school_child_count')
         // ->where('school_id',$school_id);
        // $result = $this->db->get()->first_row();
        // return $result;
      
    // }

    public function get_schoolwise_class()
    {
      $school_id = $this->session->userdata('emis_user_id');
      // echo $school_id;
      $this->db->select('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
            ->from('students_school_child_count')
            ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
            ->where('school_id',$school_id)
            ->group_by('class_id');

            $result = $this->db->get()->result();
            return $result;
    }
        // This function also used in scheme menu under laptop distribution by (venba/ps) dated = 31/7/19
        // and Academic Records -> SubjectWise CCE Records menu by (venba/ps) dated = 30/9/19
        public function get_schoolwise_class_section($class_id)
        {
            $school_id = $this->session->userdata('emis_user_id');
            $result = $this->db->get_where('schoolnew_section_group',array('class_id'=>$class_id,'school_key_id'=>$school_id))->result_array();
            
            return $result;
        }

        /***************************** Students Over all Details ******************/
        
      public function get_classwise_student_details($class_id,$section_id)
      {
      $school_id = $this->session->userdata('emis_user_id');

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
students_child_detail.class_studying_id,
students_child_detail.student_admitted_section,
students_child_detail.group_code_id,
students_child_detail.education_medium_id,
students_child_detail.district_id,
students_child_detail.unique_id_no,
students_child_detail.school_id,
students_child_detail.transfer_flag,
students_child_detail.class_section,
students_child_detail.school_admission_no,
students_child_detail.guardian_name,
students_child_detail.parent_income,
students_child_detail.street_name,
students_child_detail.area_village,
students_child_detail.doj,
students_child_detail.pass_fail,
students_child_detail.email,
students_child_detail.created_at,
students_child_detail.updated_at,
students_child_detail.status,
students_child_detail.prv_class_std,
students_child_detail.child_admitted_under_reservation,
students_child_detail.bloodgroup,
students_child_detail.photo,
students_child_detail.request_flag,
students_child_detail.request_date,
students_child_detail.request_id,
students_child_detail.smart_id,
students_child_detail.rte_type,
baseapp_bloodgroup.group,a.occu_name as father_occ,b.occu_name as mother_occ,baseapp_parentincome.income_value,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_district.district_name,baseapp_religion.religion_name,baseapp_sub_castes.caste_name'); 
       $this->db->from('students_child_detail');
       $this->db->join('baseapp_bloodgroup','baseapp_bloodgroup.id = students_child_detail.bloodgroup','left')
                ->join('baseapp_occupation a','a.id = students_child_detail.father_occupation','left')
                ->join('baseapp_occupation b','b.id = students_child_detail.mother_occupation','left')
                ->join('baseapp_parentincome','baseapp_parentincome.id = students_child_detail.parent_income','left')
                ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                ->join('schoolnew_district','schoolnew_district.id = students_child_detail.district_id','left')
                ->join('baseapp_religion','baseapp_religion.id = students_child_detail.religion_id','left')
                ->join('baseapp_sub_castes','baseapp_sub_castes.id = students_child_detail.subcaste_id','left');

       $this->db->where('class_studying_id', $class_id); 
       if(!empty($section_id)){
       $this->db->where('class_section', $section_id); 
       }
       $this->db->where('school_id',$school_id);
       $this->db->where('transfer_flag',0);

       $result =  $this->db->get()->result();
        // print_r($this->db->last_query());
       return $result;
       

       /*$sql="select * from students_child_detail join schoolnew_section_group on schoolnew_section_group.id=students_child_detail.class_section where class_studying_id=".$class_id." and class_section=".$section_id." and school_id=".$school_id." and transfer_flag=0";
       $query = $this->db->query($sql);
       return $query->result_array(); */
      }

        /**
        * Get All Table Details
        * VIT-sriram
        * 13/03/2019
        **/

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

        function getallmediumofinst($school_id){
       
        
        $this->db->select('b.*')
                 ->from('schoolnew_mediumentry a')
                 ->join('schoolnew_mediumofinstruction b','b.MEDINSTR_ID = a.medium_instrut')
                 ->where('school_key_id',$school_id);
        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;
        
  }

      /**************************************** End ***************************/

      public function get_schoolwise_aadhaardetails()
      {
        $school_id = $this->session->userdata('emis_user_id');

        $this->db->select('count(*) as aadhaar_not_update');
        $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'aadhaar_uid_number'=>'','transfer_flag'=>'0'))->first_row();
        return $result;
      }

      public function get_schoolwise_bloodgroupdetails()
      {
        $school_id = $this->session->userdata('emis_user_id');

        $this->db->select('count(*) as blood_not_update');
        $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'bloodgroup'=>'','transfer_flag'=>'0'))->first_row();
        return $result;
      }

        public function get_school_student_attendance(){

            $date = date('Y-m-d');
        $school_id = $this->session->userdata('emis_user_id');



            
            
            $this->db->select('sum(session1_femaleA) fe_present,sum(session1_maleA) ma_present,school_id')
             ->from('students_attend_daily')
              ->where('date',$date)

            ->where('school_id',$school_id);
            $result = $this->db->get()->first_row();

            return $result;

      }
	  
	function insert_co_scholostic_data($data,$classid){
     $this->db->insert('schoolnew_q_coscholostic_details',$data); 
     return $this->db->insert_id();
    }
    
    function co_scholostic_details($school_id,$classid)
	 {
	$this->db->select('id,assessed,FA,FB,FC,status');
	$this->db->where('school_id',$school_id ); 
	$this->db->where('class_id',$classid );  
    $query = $this->db->get('schoolnew_q_coscholostic_details');
    return $query->result();	 
	 }
	 function update_co_scholostic_data_final($data,$id)
	{
		
		$this->db->where('id',$id);
		return $this->db->update('schoolnew_q_coscholostic_details', $data); 
	}
	function update_co_scholostic_data($data,$id)
	{
		
	   $this->db->where('id',$id);
	   return $this->db->update('schoolnew_q_coscholostic_details', $data);	
	}
	function student_cs_list($school_id,$classid,$termid)
	 {  
	
		$this->db->select('a.id as stuid,a.*,b.id as updid,b.*')
    ->from('students_child_detail a')
    ->join('(select * from schoolnew_qstudent_cs_markdetails where term_id = '.$termid.' and school_id='.$school_id.' group by schoolnew_qstudent_cs_markdetails.student_id) as b','a.id = b.student_id','left')
    ->where('a.school_id',$school_id)
    ->where('a.class_studying_id',$classid)
    ->where('a.transfer_flag',0)
    ->group_by('a.class_section')
    ->group_by('a.gender')
    ->group_by('a.name');
    
   
		$result = $this->db->get()->result();
     //print_r($this->db->last_query());
        return $result;
	 }
	 function insert_co_student_mark_data($data){
     $this->db->insert('schoolnew_qstudent_cs_markdetails',$data); 
     return $this->db->insert_id();
    }
	
	function insert_co_student_attendance($studentabsent,$attendancevalue)
	{
		
	   $this->db->set('student_attendance',$attendancevalue);	
	   $this->db->where_in('student_id',$studentabsent);
	   $this->db->update('schoolnew_qstudent_cs_markdetails');
       $result = $this->db->affected_rows();
	   return $result;	   
	}
	function update_co_student_mark_data($data,$id)
	{
	$this->db->where('id',$id);
		return $this->db->update('schoolnew_qstudent_cs_markdetails', $data); 	
	}
	function update_co_student_mark_final($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('schoolnew_qstudent_cs_markdetails', $data); 
	}
	function update_co_student_absent_data($stuabs,$data)
	{
	    $this->db->where('student_id',$stuabs);
		return $this->db->update('schoolnew_qstudent_cs_markdetails', $data); 	
	}
	function update_co_student_absent($stuabs,$attendancevalue)
	{
		// print_r($stuabs);
		// die();
	   $this->db->set('student_attendance',$attendancevalue);	
	   $this->db->where('student_id',$stuabs);
	   $this->db->update('schoolnew_qstudent_cs_markdetails');
       $result1 = $this->db->affected_rows();
	   return $stuabs;	   
	}
	function update_co_student_present($stupre,$attendancevalue)
	{
		// print_r($stuabs);
		// die();
	   $this->db->set('student_attendance',$attendancevalue);	
	   $this->db->where('student_id',$stupre);
	   $this->db->update('schoolnew_qstudent_cs_markdetails');
       $result2 = $this->db->affected_rows();
	   return $stuabs;	   
	}
	function student_list($school_id,$classid,$subid,$termid,$sectionid,$tname)
   {  
    if($sectionid == '0'){ $concat_where = ""; }
    else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 

    // $this->db->select('a.id as stuid,a.*,b.id as updid,b.*')
    // ->from('students_child_detail a')
    // ->join('(select * from schoolnew_qstudent_markdetails where subject_id = '.$subid.' and term_id = '.$termid.' group by schoolnew_qstudent_markdetails.student_id) as b','a.id = b.student_id','left')
    // ->where('a.school_id',$school_id)
    // ->where('a.class_studying_id',$classid)
    // ->where('a.transfer_flag',0);
    // $result = $this->db->get()->result();
    //     return $result;
    $sql = " SELECT a.id as stuid, a.name, a.name_tamil, a.gender, a.dob, a.community_id, a.religion_id, a.mothertounge_id, 
    a.class_studying_id, a.district_id, a.unique_id_no, a.school_id, a.transfer_flag, a.class_section, 
    b.id as updid, b.term_id,b.subject_id, b.student_attendance, b.student_id, b.student_name, b.FAA, b.FAB,b.FAC, b.FAD, b.FBA, b.FBB, b.FBC, b.FBD, b.FAM, b.SAM, b.status, b.created_date, b.updated_date
    FROM students_child_detail a 
    LEFT JOIN schoolnew_qstudent_markdetails b ON a.id = b.student_id AND b.term_id = ".$termid." AND b.subject_id = ".$subid." 
    WHERE a.school_id = ".$school_id." AND a.class_studying_id = ".$classid.$concat_where." AND a.transfer_flag = 0 order by a.name" ;
    $query = $this->db->query($sql);

    return $query->result_array();  
   }
  function insert_student_mark_data($data){
    
    $this->db->select('id');
    $result = $this->db->get_where('schoolnew_qstudent_markdetails',array('school_id'=>$data['school_id'],'term_id'=>$data['term_id'],'class_id'=>$data['class_id'],'subject_id'=>$data['subject_id'],'student_id'=>$data['student_id']))->first_row();
   
    if($result->id !='')
    {
      $this->db->where('id',$result->id);
      $this->db->update('schoolnew_qstudent_markdetails',$data);
      return $data['student_id'];
    }else
    {
      $this->db->insert('schoolnew_qstudent_markdetails',$data); 
      return $this->db->affected_rows();
    }
    }
  // function update_student_mark_data($data,$id)
  // {
  // $this->db->where('id',$id);
  //  return $this->db->update('schoolnew_qstudent_markdetails', $data);  
  // }
 function update_student_mark_data($data,$id)
  {
   
    if($id == ""){
      $data['student_attendance'] = 1;
      $this->db->insert('schoolnew_qstudent_markdetails',$data); 
      return $this->db->insert_id();
    }
    else{
      $this->db->where('id',$id);
      return $this->db->update('schoolnew_qstudent_markdetails', $data);  }
  }
  
  function update_student_mark_final($data,$id)
  {
    $this->db->where('id',$id);
    return $this->db->update('schoolnew_qstudent_markdetails', $data); 
  }
  function update_student_absent_data($stuabs,$data)
  {
      $this->db->where('student_id',$stuabs);
    return $this->db->update('schoolnew_qstudent_markdetails', $data);  
  }
  function studentmark_details($school_id,$classid)
   {
  $this->db->select('id,student_id,student_name,FAA,FAB,FAC,FAD,FBA,FBB,FBC,FBD,SAM,status');
  $this->db->where('school_id',$school_id ); 
  $this->db->where('class_id',$classid ); 
    $query = $this->db->get('schoolnew_qstudent_markdetails');
    return $query->result();   
   }
	   function insert_studentreg_data($data){
		  
     $this->db->insert('schoolnew_qstudentreg_details',$data); 
     return $this->db->insert_id();
    }
	function update_studentreg_data($data,$id)
	{
		
	   $this->db->where('id',$id);
	   return $this->db->update('schoolnew_qstudentreg_details',$data);	
	}
	function update_studentreg_data_final($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('schoolnew_qstudentreg_details',$data); 
	}
	
	function school_studentreg_details($school_id)
	 {
	$this->db->select('id,RB,RG,RT,YEB,YEG,YET,YEPB,YEPG,YEPT,status');
	$this->db->where('school_id',$school_id ); 
    $query = $this->db->get('schoolnew_qstudentreg_details');
    return $query->result();	 
	 }
	 function save_question_answer($data){
		
     $this->db->insert('schoolnew_qquestion_answer',$data); 
     return $this->db->insert_id();
    }
    function school_question_answer_details($school_id)
	 {
	$this->db->select('id,a1,a2,a3,a4,a4text,a5,a6,status');
	$this->db->where('school_id',$school_id ); 
    $query = $this->db->get('schoolnew_qquestion_answer');
    return $query->result();	 
	 }
	 function update_question_answer($data,$id)
	{
		
		$this->db->where('id',$id);
		return $this->db->update('schoolnew_qquestion_answer',$data); 
	}
    function final_question_answer($data,$id)
	{
	    $this->db->where('id',$id);
		return $this->db->update('schoolnew_qquestion_answer',$data); 	
	}
   


	

	

	 function update_student_attendance($studentabsent,$attendancevalue)
	{
	   $this->db->set('student_attendance',$attendancevalue);	
	   $this->db->where_in('student_id',$studentabsent);
	   $this->db->update('schoolnew_qstudent_markdetails');
       $result = $this->db->affected_rows();
	   return $result;	   
	}
	
	
    /************************************************************
             Function done by Magesh Elumalai 20-02-2019
    *************************************************************/
    
    public function Selectoption($data,$tablelist,$selectaddress) {
        $options = "<option value=''>Choose</option>";     
        
        $data = json_decode(json_encode($data),true);
        print_r($data);
        if($selectaddress == 0 || $selectaddress == 1 || $selectaddress == 5 || $selectaddress == 6) {
            $selectaddress = 2;
        }else if($selectaddress == 3 || $selectaddress==7 || $selectaddress==8){
            $selectaddress = 1;
        }else if($selectaddress == 4) {
            $selectaddress = 3;
        }
        foreach($data as $dt) {
           
            $options.="<option value=".$dt[$tablelist[0]['Field']].">".$dt[$tablelist[$selectaddress]['Field']]."</option>";
        }
        echo $options;
    }
    
    function ordercopylist($module){
        //echo 'Conflict check';
        $con = 'IS NOT NULL';
		
        if($this->session->userdata('emis_state_id')!=''){
            $where="";
        }elseif($this->session->userdata('emis_district_id')!=''){
            $where="AND ".($module==4?"newschool_details":"students_school_child_count").".district_id=".$this->session->userdata('emis_district_id');
			$con="=".$this->session->userdata('emis_user_type_id');
        }elseif($this->session->userdata('emis_deo_id')){
            $where="AND ".($module==4?"newschool_details":"students_school_child_count").".edu_dist_id=".$this->session->userdata('emis_deo_id');
			$con="=".$this->session->userdata('emis_user_type_id');
        }elseif($this->session->userdata('emis_block_id')){
            $where="AND ".($module==4?"newschool_details":"students_school_child_count").".block_id=".$this->session->userdata('emis_block_id');
			$con="=".$this->session->userdata('emis_user_type_id');
        }
        
        $sql="SELECT school_key_id,
        school_name,
        department, 
        IF(udise_code IS NULL,CONCAT('<input type=\"text\" id=\"udise_',school_key_id,'\" name=\"udise_',school_key_id,'\" class=\"form-control\" maxlength=\"11\" onkeypress=\"return event.charCode>=48 && event.charCode<=57\"/>'),udise_code) AS udise_code,
		vaild_upto,exp
        FROM (SELECT school_key_id,
        IF(schoolnew_renewcategory.applied_category=4,newschool_details.udise_code,students_school_child_count.udise_code) AS udise_code,
        IF(schoolnew_renewcategory.applied_category=4,newschool_details.school_name,students_school_child_count.school_name) AS school_name, 
        schoolnew_school_department.department,schoolnew_renewal.vaild_upto,IF(schoolnew_renewal.vaild_upto<DATE(NOW()),0,1) as exp
        FROM schoolnew_renewal 
        JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category=".$module."
        LEFT JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        LEFT JOIN newschool_details ON newschool_details.temp_id=schoolnew_renewal.school_key_id
        JOIN schoolnew_school_department ON schoolnew_school_department.id=IF(schoolnew_renewcategory.applied_category=4,newschool_details.sch_directorate_id,students_school_child_count.sch_directorate_id) AND schoolnew_school_department.id in (select distinct(school_type) from schoolnew_moduleauth where module_id=".$module." and final_cat_id ".$con.")
        WHERE vaild_from IS NOT NULL ".$where.") AS approvedlist;";
        
        //echo($sql);die();
        $query = $this->db->query($sql);
        return $query->result_array();  

    }
    function saveUdise($data){
        //echo 'Conflict check';
        return $this->db->update_batch('newschool_details', $data, 'temp_id');
        //return true;
    }
    
    function newschooldashboardlist(){
        $sql = "select sum(case when pending =6 then 1 else 0 end) as beo,
sum(case when pending =9 then 1 else 0 end) as ceo, sum(case when pending=10 then 1 else 0 end) as deo,count(*) as total from newschool_pending";
        $query= $this->db->query($sql);
        return $query->result_array();
    }
    
    function newschoolreportlist($where,$group){
        
        $sql="select count(*) as Total,
        renewal_id,school_name,school_key_id,udise_code,district_id,block_id,edu_dist_id,district_name,block_name,edu_dist_name,max(timestamp) as date,
        directorate,auth,sch_directorate_id,management,cate_type,(select user_type from user_category where id=pending) as pending
         from newschool_pending where ".$where." group by ".$group;
        //echo $sql;
        //die();
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function callprofileview($tempid){
        //echo 'Conflict check';
        $sql="select * from newschool_profile where emis_user_id=".$tempid;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function insertorupdatedata($data){
        //print_r($data);echo('<br>');//die();
        //echo 'Conflict check';
        if($data['multi']){
            $this->db->where($data['referid'], $data['refervalue']);
            if($this->db->delete($data['tablename'])){
                if(count($data['tabledata'][0])>1){
                    return $this->db->insert_batch($data['tablename'],$data['tabledata']);
                }
                else{
                    return false;
                }
            }
        }else{
            $query = $this->db->get_where($data['tablename'],array($data['referid'] => $data['refervalue']));
            $result=$query->result_array();
            if($result==NULL){
                $this->db->insert($data['tablename'], $data['tabledata']);
                return $this->db->insert_id();    
            }else{
                $updateid=$result[0]['id'];
                if($this->db->update($data['tablename'], $data['tabledata'], $data['referid']."=".$data['refervalue']))
                    return $updateid;
                else
                    return false;
            }
            
        }
    }
    
    
    function tempidcreation(){
        //echo 'Conflict check';
        $sql = "SELECT (MAX(temp_id)+1) AS temp_id FROM (SELECT school_id as temp_id FROM (SELECT MAX(school_id) as school_id FROM schoolnew_basicinfo 
UNION ALL SELECT MAX(temp_id) as school_id FROM newschool_details) AS regid) AS tempid_create;";
        $query = $this->db->query($sql);
        return $query->result_array();    
    }
    
    function insertorupdatedata1($data,$tbname="newschool_details"){
      $this->db->insert($tbname, $data);   
      return $this->db->insert_id();
    }
    
    
    public function loginverfication($temp_id,$emis_password){
        $sql = "select * from newschool_details where temp_id='".$temp_id."' and emis_password='".$emis_password."';";
        $query = $this->db->query($sql);
        return $query->result_array();    
    }
    
    public function getProfileComplete($temp_id) {
        $sql="select * from newschool_registercomplete where temp_id='".$temp_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();    
    }
    
    function findtablename($columnname,$tablenames){
        $sql="SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME IN ('".$columnname."')
                AND TABLE_SCHEMA='tnschools_working' AND TABLE_NAME in('".$tablenames."') GROUP BY TABLE_NAME;";
        $query = $this->db->query($sql);
        return $query->result_array(); 

    }
    
     function registercompletecount($groupby){
        //echo 'Conflict check';
             $SQL="select COUNT(*) AS tot, 
	           SUM(CASE WHEN newschool_registercomplete.temp_id = newschool_details.temp_id THEN
			   CASE WHEN part_1=1 THEN 1 
            ELSE 0 END ELSE 0 END) as p1,
    SUM(CASE WHEN newschool_registercomplete.temp_id = newschool_details.temp_id THEN
			CASE WHEN part_2=1 THEN 1 ELSE 0 END ELSE 0 END) as p2,
    SUM(CASE WHEN newschool_registercomplete.temp_id = newschool_details.temp_id THEN
			CASE WHEN part_3=1 THEN 1 ELSE 0 END ELSE 0 END) as p3,
            newschool_details.temp_id,newschool_details.school_name,schoolnew_district.district_name,
            schoolnew_block.block_name,schoolnew_district.id as did,schoolnew_block.id as bid,
            IF(newschool_registercomplete.temp_id=newschool_details.temp_id,1,0) as chkbit
FROM newschool_registercomplete,newschool_details
JOIN schoolnew_district ON schoolnew_district.id=newschool_details.district_id
JOIN schoolnew_block ON schoolnew_block.id=newschool_details.block_id ".$groupby;
                $query = $this->db->query($SQL);
                return $query->result_array();
            }
    
    public function getstudentraised($school_id){
        $sql="select 
	         students_child_detail.id,name,name_tamil,aadhaar_uid_number,class_studying_id,	
             student_admitted_section,group_code_id,education_medium_id,students_child_detail.district_id,
	         unique_id_no,students_child_detail.school_id,transfer_flag,class_section,request_flag,	
             request_date,request_id,students_school_child_count.school_name,
             sc.school_name as oldschoolname
             from students_child_detail 
             join students_school_child_count on students_school_child_count.udise_code=students_child_detail.request_id
             join students_school_child_count as sc ON sc.school_id=students_child_detail.school_id
             where request_flag='1' and students_school_child_count.school_id=".$school_id." ";
             //echo $sql;
             //die();
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function deputeall($where,$group){
        $sql = "select school_id,udise_code,school_name, students_school_child_count.district_id, district_name, 
                students_school_child_count.block_id,block_name,office_name,off_key_id from students_school_child_count
                join udise_offreg on udise_offreg.district_id=students_school_child_count.district_id where ".$where.$group."";
                
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    
    /*************************************************************
    *************************************************************/


    /*****************************Get Flash News ***********************/ 


    public function get_flash_news_data()
    {
      $school_id = $this->session->userdata('emis_school_id');
      $this->db->select('district_name,block_name,school_type,cate_type');
      $result = $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
      $school_type_id = $this->session->userdata('emis_user_type_id');
        if(!empty($result))
        {
          // print_r($this->session->userdata());
            $this->db->select('schoolnew_flashnews.*,user_category.user_type')
                     ->from('schoolnew_flashnews')
                     ->join('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                     ->where('authority',$school_type_id)
                     ->where('district_name',$result->district_name)
                     ->where('block_name',$result->block_name)
                     ->where('FIND_IN_SET("Government",school_type)!=',0)
                     
                     // ->where('FIND_IN_SET("'.$result->school_type.'",school_type)')
                     ->where('FIND_IN_SET("'.$result->cate_type.'",cate_type)!=',0)
                     ->group_by('updated_date')
                     ->order_by('schoolnew_flashnews.id DESC')
                     ->limit(5);

              $flash_result = $this->db->get()->result();
        // print_r($this->db->total_queries());
              // print_r($this->db->last_query());
              
              // print_r($flash_result);die;
              return $flash_result;
        }else
        {
          return false;
        }

    }



    public function get_flash_field_data()
    {

      $school_id = $this->session->userdata('emis_user_id');

      $this->db->select('sum(db_count) as count,content,db_field')
               ->from('schoolnew_flashfield')
               ->where('school_key_id',$school_id)
               ->group_by('content,db_field');

        $result = $this->db->get()->result();
        // print_r($this->db->last_query)
        return $result;

    }

    /***********************************End ***************************/
       public function get_classwise_student_disability( $school_id)
      {
      $school_id = $this->session->userdata('emis_user_id');
      $SQL="select 
    SUM(CASE WHEN class_studying_id=1 THEN 1 ELSE 0 END) AS cls_1,
    SUM(CASE WHEN class_studying_id=2 THEN 1 ELSE 0 END) AS cls_2,
    SUM(CASE WHEN class_studying_id=3 THEN 1 ELSE 0 END) AS cls_3,
    SUM(CASE WHEN class_studying_id=4 THEN 1 ELSE 0 END) AS cls_4,
    SUM(CASE WHEN class_studying_id=5 THEN 1 ELSE 0 END) AS cls_5,
    SUM(CASE WHEN class_studying_id=6 THEN 1 ELSE 0 END) AS cls_6,
    SUM(CASE WHEN class_studying_id=7 THEN 1 ELSE 0 END) AS cls_7,
    SUM(CASE WHEN class_studying_id=8 THEN 1 ELSE 0 END) AS cls_8,
    SUM(CASE WHEN class_studying_id=9 THEN 1 ELSE 0 END) AS cls_9,
    SUM(CASE WHEN class_studying_id=10 THEN 1 ELSE 0 END) AS cls_10,
    SUM(CASE WHEN class_studying_id=11 THEN 1 ELSE 0 END) AS cls_11,
    SUM(CASE WHEN class_studying_id=12 THEN 1 ELSE 0 END) AS cls_12,baseapp_differently_abled.da_name
from students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
where school_id=".$school_id." GROUP BY baseapp_differently_abled.id"; 

       $query = $this->db->query($SQL);
       return $query->result();
       
      }
	  
	  
	  public function  dis_class_student_disability($school_id)
	  {
		  $sql="select  name, gender, dob,  phone_number, differently_abled,  class_studying_id, district_id, unique_id_no, school_id, transfer_flag, class_section,da_name
          from students_child_detail
          JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
          where school_id=".$school_id." and differently_abled !=0";
       $query = $this->db->query($sql);
       return $query->result();
	  }


    /******************** Teacher Password Reset **********************/

      /**
      * Get Teacher Password Details
      * VIT-sriram
      * 08/03/2019
      **/

      public function get_teacher_password_reset()
      { 


          $school_id = $this->session->userdata('emis_user_id');

          $this->db->select('a.*,b.teacher_name,b.gender,b.mbl_nmbr,b.email_id,b.u_id')
                   ->from('emis_userlog a')
                   ->join('udise_staffreg b','b.school_key_id = a.school_id and b.teacher_code = a.emis_user')
                   ->where('a.school_id',$school_id)
                   ->where('a.reset_flag',1);
          $result = $this->db->get()->result();
          return $result;


      }


      public function update_teacher_password_reset($update)
      {

        $this->db->where('id',$update['id']);
        $this->db->update('emis_userlog',$update);
        // print_r($this->db->last_query());
        return $this->db->affected_rows();

      }


      public function update_login_details($update_det,$table)
      {
          $this->db->where('emis_user_id',$update_det['emis_user_id']);
          $this->db->update($table,$update_det);

          $update_data =  $this->db->affected_rows(); 
          // echo $update_data;
          
            $get_old_pass = $this->get_user_old_password($update_det['emis_user_id'],$table);

            return $get_old_pass;
          
      }


      public function get_user_old_password($u_id,$table){
      $this->db->select('ref');
    $result = $this->db->get_where($table,array('emis_user_id'=>$u_id))->first_row();
    // print_r($this->db->last_query());
    return $result;
  }

    public function get_school_details()
    {
        $school_id = $this->session->userdata('emis_user_id');
        $this->db->select('sch_email');
       $school_details =  $this->db->get_where('schoolnew_basicinfo',array('school_id'=>$school_id))->first_row();
       return $school_details;
    }


    /***********************************End ****************************/
    /******************************** RTI Module **********************/
    /**
    * Get RTI Studnets Schoolwise
    * VIT-sriram
    * 11/03/2019
    **/

    public function get_RTI_Students_list($school_id)
    {

        $school_id = $this->session->userdata('emis_school_id');
        // if(!empty($class_id))
        // {
          // $this->db->where('class_studying_id',$class_id);
        // }

        // if(!empty($section_id))
        // {
            // $this->db->where('class_section',$section_id);
        // }
       // // $this->db->limit(10);
        // $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id))->result();

        // // print_r($this->db->last_query());

        // return $result;
		
			$sql ="select   name, gender, dob, community_id, class_studying_id, unique_id_no, class_section, child_admitted_under_reservation ,rte_type,community_name,category,sub_category from students_child_detail 
 LEFT JOIN baseapp_community ON students_child_detail.community_id = baseapp_community.id
left join baseapp_rte_type on baseapp_rte_type.id   =students_child_detail.rte_type
 where child_admitted_under_reservation = 'Yes' and school_id = ".$school_id ." and  unique_id_no is not null and transfer_flag=0";
  $query = $this->db->query($sql);
			   return $query->result(); 

    }
     public function get_RTI_Students_list1($class_id,$section_id)
    {

        $school_id = $this->session->userdata('emis_school_id');
        if(!empty($class_id))
        {
          $this->db->where('class_studying_id',$class_id);
        }

        if(!empty($section_id))
        {
            $this->db->where('class_section',$section_id);
        }
       // $this->db->limit(10);
        $result = $this->db->get_where('students_child_detail',array('school_id'=>$school_id,'child_admitted_under_reservation'=>'Yes'))->result();

        // print_r($this->db->last_query());

        return $result;

    }
/******************************************pearlin**************************************/
 public function save_RTE_students_list($save_data)
    {
     
        if($save_data['id'] !=''){
          $up=$this->db->update('students_child_detail', $save_data, "id = ".$save_data['id']);
          return $up;
        }else{
        $this->db->insert('students_child_detail',$save_data);
        return $this->db->insert_id();
        } 

        
    }

    /**********************************END ***************************/

    /********************** Attendance Monthwise Report ****************/

      /**
      * Attendance Section wise
      * VIT-sriram
      * 14/03/2019
      **/

      public function get_attendance_sectionwise_details($school_id,$class,$section,$table,$date)
      {
 
 // $school_id = '47186';
       $date = date('Y-m-d',strtotime($date));
 
                $this->db->select('name,unique_id_no,class_section,gender');
               $this->db->from('students_child_detail');
               $this->db->where('school_id',$school_id);
               $this->db->where('transfer_flag',0);
               $this->db->where('class_studying_id',$class);
               $this->db->where('class_section',$section);
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
 
               $abse[$i] = $this->get_attendance_sectionwise_name($date,$table,$school_id,$class,$section);
 
             
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
                                 
                                 $absent_list[$index][$i]['present'] = "0";
                                 
                                 $status = 0;
                                 $old_unique_id = $abs;
                             // echo $i."if<br/>";
 
                                 // echo ($abs=='3302010011300241');
                           } 
                       }
                       if($old_unique_id !=$class_det->unique_id_no)
                           { 
                             
                             // echo"if";
 
                                  
 
                                 $absent_temp['present'] = "1";
                                 
                                 
                                 $absent_list[$index][$i]= $absent_temp;
                           }
                     }else
                     {
                        $absent_temp['present'] = "1";
                                 
                                 
                                 $absent_list[$index][$i]= $absent_temp;
                     }
                         
                   }else
                   {
                     $absent_list[$index][$i]['present'] = '-1'; 
                   }
 
                 }
                 // $absent_list[$i] = $absent_list;
               }
             }
             // echo"<pre>";print_r($absent_list);echo"</pre>";die;
            
 
                      
                       
         return $absent_list;die;
 
 
 
               }

                /**
          * Get Attendance Students Name
          * 20/02/2019
          * VIT-sriram
          **/
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

        /**
        * Update Students Profile
        * VIT-sriram
        * 19/03/2019
        *****/

        public function update_student_profile($update)
        {
          // print_r($update);
          $this->db->where('id',$update['id']);
          $this->db->update('students_child_detail',$update);
          // $this->db->last_query();die;
          return $this->db->affected_rows();
        }

        
        
        
        /******************* scholor module *************/
	
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
	
	public function getClassDetail($school_id) {
		
        $this->db->select('DISTINCT(schoolnew_section_group.class_id) AS value,schoolnew_section_group.no_of_periods as periods,schoolnew_section_group.section,schoolnew_section_group.id');
        $this->db->from('schoolnew_section_group');
		 //$this->db->join('schoolnew_timetable_configuration','schoolnew_section_group.class_id = schoolnew_timetable_configuration.class_id and schoolnew_section_group.school_key_id=schoolnew_timetable_configuration.school_id','LEFT');
        $this->db->where('schoolnew_section_group.school_key_id', $school_id);
		$this->db->group_by('schoolnew_section_group.class_id');
		$this->db->order_by('schoolnew_section_group.id');
        $query = $this->db->get();
        $result = $query->result();
		 // print_r($this->db->last_query());
        return $result;
    }

	public function students_osc_reg() {
    
      $sql=' select class_section,class_studying_id,students_osc.school_id,students_osc.name,students_osc.unique_id_no,(select child_status from baseapp_osc where students_osc.present_status=baseapp_osc.id limit 1) as pre_stus ,training_type,ac_year  from students_osc
 left join students_child_detail on students_child_detail.unique_id_no=students_osc.unique_id_no;';
       $query = $this->db->query($sql);
       return $query->result();  
       
    }
	
	
	
	


	
	function insert_scholor_national($savescholor_national)
	{
	 $this->db->insert('student_scholor_nmms',$savescholor_national); 
     return $this->db->insert_id();	
	}
	function insert_scholor_state($savescholor_state)
	{
	 $this->db->insert('student_scholor_trstse',$savescholor_state); 
     return $this->db->insert_id();	
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

	function insert_inspire_awards($savestudent_inspire)
	{
	 $this->db->insert('student_scholor_inspire_award',$savestudent_inspire); 
     return $this->db->insert_id();	
	}
	function update_student_nmms($updateid,$update_nmms)
	{
	
		$this->db->where('id',$updateid);
         $this->db->update('student_scholor_nmms',$update_nmms); 
		return $this->db->insert_id();
	}
	function update_student_trstse($updateid,$update_trstse)
	{
	    $this->db->where('id',$updateid);
         $this->db->update('student_scholor_trstse',$update_trstse); 
		return $this->db->insert_id();	
	}
	function update_student_inspire($updateid,$update_inspire)
	{
		$this->db->where('id',$updateid);
         $this->db->update('student_scholor_inspire_award',$update_inspire); 
		return $this->db->insert_id();	
		
	}
	function update_student_sports($updateid,$update_sports)
	{
		 $this->db->where('id',$updateid);
         $this->db->update('student_scholor_sports_participation',$update_sports); 
		 return $this->db->insert_id();
	}
	function delete_student_nmms($deleteid)
	{
	     $this->db->where('id', $deleteid);
         $this->db->delete('student_scholor_nmms'); 
		return $this->db->insert_id();	
	}
	function delete_student_trstse($deleteid)
	{
		$this->db->where('id', $deleteid);
         $this->db->delete('student_scholor_trstse'); 
		return $this->db->insert_id();	
	}
	function delete_student_inspire($deleteid)
	{
		$this->db->where('id', $deleteid);
         $this->db->delete('student_scholor_inspire_award'); 
		return $this->db->insert_id();	
	}
	function delete_student_sports($deleteid)
	{
		$this->db->where('id', $deleteid);
         $this->db->delete('student_scholor_sports_participation'); 
		return $this->db->insert_id();	
	}
  public function stud_vocation_dtl($data)
{

$this->db->select('student_vocational.id');//get id
$this->db->from('student_vocational'); //table name
$this->db->where('student_vocational.school_key_id',$data['school_key_id']);//in which schoolid row want to inactive
$this->db->where('student_vocational.unique_id_no',$data['unique_id_no']); //get studentid datas along with schoolid
$this->db->where('student_vocational.isactive', 1); //get active datas along with student and schoolid

$result = $this->db->get()->result();

if(!empty($result))
{
$update_data = array('isactive' => 0,
'updatedat' => date("Y-m-d H:i:s"));

$this->db->where(array('school_key_id'=>$data['school_key_id'],'unique_id_no'=>$data['unique_id_no']));
$this->db->update('student_vocational',$update_data);
}

$this->db->insert('student_vocational',$data);
return $this->db->insert_id();

}

//IF Unique-id Already Existing or not
function checkNationIDWithExist($rec){
$sql = "SELECT students_ied.id FROM students_ied WHERE students_ied.isactive = 1 AND students_ied.national_id = '".$rec."'";
$query = $this->db->query($sql);
if($query->num_rows() == 0){
return 0;
}
else{
return 1;
}
}
	/******************* scholor module *************/

    
    
    /******************Homemodel******************************************/
	function getscheme_search_nmms($school_id,$classnumber,$sectionname)
	{
		$this->db->select('*');
        $this->db->from('students_child_detail');
        $this->db->where('school_id', $school_id); 
		$this->db->where('class_studying_id',$classnumber);
		$this->db->where('class_section',$sectionname);
        $query = $this->db->get();
        $result = $query->result();
         // print_r($this->db->last_query());
        return $result;
	}
	function getscheme_nmms($school_id)
	{
		$this->db->select('student_scholor_nmms.*,students_child_detail.name,students_child_detail.gender,community_name');
        $this->db->from('student_scholor_nmms');
		$this->db->join('students_child_detail','student_scholor_nmms.student_id = students_child_detail.unique_id_no');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
		// $this->db->where('student_scholor_nmms.class', $classnumber); 
	    // $this->db->where('student_scholor_nmms.section', $sectionname);
        $this->db->where( 'nmmsexam_passed !=','0000-00-00');		  
        $query = $this->db->get();
        $result = $query->result();
		  // print_r($this->db->last_query());
		// die();
        return $result;
	}
	function getscheme_nmms_all($school_id)
	{
		$this->db->select('student_scholor_nmms.id,student_scholor_nmms.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
    $this->db->from('student_scholor_nmms');
		$this->db->join('students_child_detail','student_scholor_nmms.student_id = students_child_detail.unique_id_no');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
    $this->db->where('students_child_detail.school_id', $school_id); 
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		
	}
	function getscheme_search_trstse($school_id,$classnumber,$sectionname)
	{
		    $this->db->select('*');
        $this->db->from('students_child_detail');
        $this->db->where('school_id', $school_id); 
    	  $this->db->where('class_studying_id',$classnumber);
		    $this->db->where('class_section',$sectionname);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getscheme_trstse($school_id) //,$classnumber,$sectionname)
	{
		// $this->db->select('student_scholor_trstse.id,student_scholor_trstse.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        // $this->db->from('student_scholor_trstse');
		// $this->db->join('students_child_detail','student_scholor_trstse.student_id = students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_trstse.school_id');
		// $this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        // $this->db->where('students_child_detail.school_id', $school_id); 
		 // $this->db->where('student_scholor_trstse.class', $classnumber); 
		  // $this->db->where('student_scholor_trstse.section', $sectionname); 
		  
		  $this->db->select('student_scholor_nmms.*,students_child_detail.name,students_child_detail.gender,community_name');
        $this->db->from('student_scholor_nmms');
		$this->db->join('students_child_detail','student_scholor_nmms.student_id = students_child_detail.unique_id_no');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
		// $this->db->where('student_scholor_nmms.class', $classnumber); 
	    // $this->db->where('student_scholor_nmms.section', $sectionname);
        $this->db->where('trstse !=','0000-00-00');
        $query = $this->db->get();
		
        $result = $query->result();
		 // print_r($this->db->last_query());
		// die();
        return $result;
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
	function getscheme_search_inspire($school_id,$classnumber,$sectionname)
	{
		$this->db->select('*');
        $this->db->from('students_child_detail');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->or_where('school_id',$school_id); 
    	$this->db->where('class_studying_id',$classnumber);
		$this->db->where('class_section',$sectionname);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getscheme_inspire($school_id) //$classnumber,$sectionname)
	{
		// $this->db->select('baseapp_community.community_name,student_scholor_inspire_award.id,student_scholor_inspire_award.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        // $this->db->from('student_scholor_inspire_award');
		// $this->db->join('students_child_detail','student_scholor_inspire_award.student_id =students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_inspire_award.school_id','left');
		// $this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        // $this->db->or_where('students_child_detail.school_id', $school_id); 
		// $this->db->where('student_scholor_inspire_award.class', $classnumber); 
		  // $this->db->where('student_scholor_inspire_award.section', $sectionname); 
		   $this->db->select('student_scholor_nmms.*,students_child_detail.name,students_child_detail.gender,community_name,remarks');
        $this->db->from('student_scholor_nmms');
		$this->db->join('students_child_detail','student_scholor_nmms.student_id = students_child_detail.unique_id_no');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
		// $this->db->where('student_scholor_nmms.class', $classnumber); 
	    // $this->db->where('student_scholor_nmms.section', $sectionname);
		    $this->db->where('inspire !=','0000-00-00');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getscheme_inspire_all($school_id)
	{
		$this->db->select('baseapp_community.community_name,student_scholor_inspire_award.id,student_scholor_inspire_award.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        $this->db->from('student_scholor_inspire_award');
		$this->db->join('students_child_detail','student_scholor_inspire_award.student_id =students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_inspire_award.school_id','left');
		$this->db->join('baseapp_community','students_child_detail.community_id = baseapp_community.id' ,'LEFT');
        $this->db->where('students_child_detail.school_id', $school_id); 
		
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getscheme_search_sports($school_id,$classnumber,$sectionname)
	{
		$this->db->select('*');
        $this->db->from('students_child_detail');
        $this->db->where('school_id', $school_id); 
    	$this->db->where('class_studying_id',$classnumber);
		$this->db->where('class_section',$sectionname);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
	function getscheme_sports($school_id,$classnumber,$sectionname)
	{
	       $this->db->select('schoolnew_game_participating_level.participating_level,schoolnew_sport_list.sport_name,student_scholor_sports_participation.id,student_scholor_sports_participation.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        $this->db->from('student_scholor_sports_participation');
		    $this->db->join('schoolnew_game_participating_level','student_scholor_sports_participation.last_participating_level = schoolnew_game_participating_level.id' ,'LEFT');
        $this->db->join('schoolnew_sport_list','student_scholor_sports_participation.game_participating = schoolnew_sport_list.id' ,'LEFT');
	    	$this->db->join('students_child_detail','student_scholor_sports_participation.student_id = students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_sports_participation.school_id','left');
		
        $this->db->where('students_child_detail.school_id', $school_id);
	    	$this->db->where('student_scholor_sports_participation.class', $classnumber); 
		    $this->db->where('student_scholor_sports_participation.section', $sectionname); 
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
    function getscheme_sports_all($school_id)
	{
		$this->db->select('schoolnew_game_participating_level.participating_level,schoolnew_sport_list.sport_name,student_scholor_sports_participation.id,student_scholor_sports_participation.*,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id,students_child_detail.class_section');
        $this->db->from('student_scholor_sports_participation');
		$this->db->join('schoolnew_game_participating_level','student_scholor_sports_participation.last_participating_level = schoolnew_game_participating_level.id' ,'LEFT');
        $this->db->join('schoolnew_sport_list','student_scholor_sports_participation.game_participating = schoolnew_sport_list.id' ,'LEFT');
		$this->db->join('students_child_detail','student_scholor_sports_participation.student_id = students_child_detail.unique_id_no and students_child_detail.school_id=student_scholor_sports_participation.school_id','left');
        $this->db->where('students_child_detail.school_id', $school_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
	}
    
    
    
    /**********************************/	
    
    
    
    




    /***************************** Special Cash ******************
     * Special Cash
     * VIT-sriram
     * 28/03/2019
     **/
    
    public function get_special_cash_details($school_id)
    {
        $this->db->distinct();
        $this->db->select('a.id stu_id,a.name,a.unique_id_no as stu_unique_id,a.class_section,a.class_studying_id,b.*,a.school_id,c.school_name,phone_number,d.bank_name,d.micr_code')
                 ->from('students_child_detail a')
                 ->join('students_school_child_count c','c.school_id = a.school_id')
                 ->join('students_special_cash_incentive b','b.unique_id_no = a.unique_id_no','left')
                 ->join('schoolnew_branch d','d.ifsc_code = b.ifsc_code and d.branch = b.branch','left')
                 ->where(array('a.school_id'=>$school_id,'a.transfer_flag'=>0,'class_studying_id'=>'12'));

          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          // print_r($result);
          return $result;

    }

    public function check_acc_no($table,$where_condition,$id)
    {
        $this->db->from($table);
        $this->db->where($where_condition);
        $result = $this->db->get()->first_row();
        // print_r($result);
        // print_r($this->db->last_query());
        if(!empty($result))
        {
          if($id == $result->id)
          {
            return false;
          }else{
          return true;
          }
        }else
        {
            return false;
        }
    }


    /**
    * Save Special Cash Details
    * VIT-sriram
    * 04/04/2019
    ****/
    public function save_special_cash_details($cash_details,$school_id)
    {
      // print_r($cash_details);
        date_default_timezone_set('Asia/Calcutta');

      if(!empty($cash_details['id']))
      { 
        $cash_details['updated_by'] = $this->session->userdata('emis_school_id');
        $cash_details['update_at'] = date('Y-m-d h:i:s');
            $this->db->where('id',$cash_details['id']);
            $this->db->update('students_special_cash_incentive',$cash_details);

            return $cash_details['id'];
      }else
      {
        $cash_details['created_by'] = $school_id;
        $cash_details['created_date'] = date('Y-m-d h:i:s');
        $this->db->insert('students_special_cash_incentive',$cash_details);
        return $this->db->insert_id();
      }
    }

    /******************************* End **************************/
    
    /***************************** Students Transfer Details *******************/
    /********************************
      * Students Transfer List      *
      * VIT-sriram                  *
      * 15/04/2019                  *
      *******************************/

    public function get_students_transfer_list($class_id,$section_id)
    {
      $school_id = $this->session->userdata('emis_user_id');

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
students_child_detail.class_studying_id,
students_child_detail.student_admitted_section,
students_child_detail.group_code_id,
students_child_detail.education_medium_id,
students_child_detail.district_id,
students_child_detail.unique_id_no,
students_child_detail.school_id,
students_child_detail.transfer_flag,
students_child_detail.class_section,
students_child_detail.school_admission_no,
students_child_detail.guardian_name,
students_child_detail.parent_income,
students_child_detail.street_name,
students_child_detail.area_village,
students_child_detail.doj,
students_child_detail.pass_fail,
students_child_detail.email,
students_child_detail.created_at,
students_child_detail.updated_at,
students_child_detail.status,
students_child_detail.prv_class_std,
students_child_detail.child_admitted_under_reservation,
students_child_detail.bloodgroup,
students_child_detail.photo,
students_child_detail.request_flag,
students_child_detail.request_date,
students_child_detail.request_id,
students_child_detail.smart_id,
baseapp_bloodgroup.group,a.occu_name as father_occ,b.occu_name as mother_occ,baseapp_parentincome.income_value,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_district.district_name,baseapp_religion.religion_name,baseapp_sub_castes.caste_name,students_transfer_certificate_details.*'); 
       $this->db->from('students_child_detail');
       $this->db->join('baseapp_bloodgroup','baseapp_bloodgroup.id = students_child_detail.bloodgroup','left')
                ->join('baseapp_occupation a','a.id = students_child_detail.father_occupation','left')

                ->join('baseapp_occupation b','b.id = students_child_detail.mother_occupation','left')
                ->join('baseapp_parentincome','baseapp_parentincome.id = students_child_detail.parent_income','left')
                ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                ->join('schoolnew_district','schoolnew_district.id = students_child_detail.district_id','left')
                ->join('baseapp_religion','baseapp_religion.id = students_child_detail.religion_id','left')
                ->join('baseapp_sub_castes','baseapp_sub_castes.id = students_child_detail.subcaste_id','left')
                ->join('students_transfer_certificate_details','students_transfer_certificate_details.student_unique_id = students_child_detail.unique_id_no and students_transfer_certificate_details.student_school_id = students_child_detail.school_id','left');
       $this->db->where('class_studying_id', $class_id); 
       $this->db->where('students_child_detail.transfer_flag',1);
       if(!empty($section_id)){
       $this->db->where('class_section', $section_id); 
       }
       $this->db->where('school_id',$school_id);
       

       $result =  $this->db->get()->result();
        // print_r($this->db->last_query());
       return $result;
    }

    public function save_transfer_certificate($students_data)
    {
        if($students_data['student_id'] !='')
        {
          // echo $students_data['student_id'];
          $this->db->where('student_id',$students_data['student_id']);
          $this->db->update('students_transfer_certificate_details',$students_data);
          return $students_data['student_id']; 
        }else
        {
          $students_data['created_by'] = $this->session->userdata('emis_school_id');
          $students_data['created_date'] = date('Y-m-d h:i:s');
          $this->db->insert('students_transfer_certificate_details',$students_data);
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
	
	public function emis_school_textbooks_Distribution_details($school_id,$classnumber,$term)
	{
			// $sql="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,baseapp_community.community_name,
			// schoolnew_mediumofinstruction.MEDINSTR_DESC
			// from schoolnew_schemeindent
			
			// join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			// join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			// join baseapp_community on baseapp_community.id =students_child_detail.community_id
		    // join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			// where schoolnew_schemeindent.scheme_id = 9 and students_child_detail.school_id = ".$school_id." ";
			 if($term == 1)
				{
					$where = 'and schoolnew_textbooks_list.term = 1';
				}else if($term == 2)
				{
					 $where = 'and schoolnew_textbooks_list.term = 2';
				}else if($term == 3)
				{
					 $where = 'and schoolnew_textbooks_list.term = 3';
				}
				else 
				{
					$where = ' ';
				}
			
			 
  $sql ="select name,gender,unique_id_no,class_studying_id,class_section,distribution_date,schoolnew_textbooks_list.book_name,schoolnew_textbooks_list.term,schoolnew_mediumofinstruction.MEDINSTR_ID,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_books_dist.group_code, group_name
  from students_child_detail
  join schoolnew_books_dist on schoolnew_books_dist.school_id = students_child_detail.school_id and schoolnew_books_dist.student_id= students_child_detail.id
  join schoolnew_textbooks_list on schoolnew_textbooks_list.book_id =schoolnew_books_dist.book_id and 
  schoolnew_textbooks_list.medium =schoolnew_books_dist.medium
  join  schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = schoolnew_books_dist.medium
   left join   baseapp_group_code on baseapp_group_code.group_code = schoolnew_books_dist.group_code
  where students_child_detail.school_id=".$school_id." and  class_studying_id=".$classnumber."   ".$where."  group by subject,unique_id_no order by students_child_detail.unique_id_no";
  // echo $sql; die;
	   $query = $this->db->query($sql);
       return $query->result();  
	}
	
	public function emis_school_notebooks_Distribution_details($school_id)
	{
		// echo($school_id);
		
		// $sql="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_mediumofinstruction.MEDINSTR_DESC
			// from schoolnew_schemeindent  
			// join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			// join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			// join baseapp_community on baseapp_community.id = students_child_detail.community_id
			 // join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			// where schoolnew_schemeindent.scheme_id = 3 and students_child_detail.school_id = ".$school_id."";
//  join   baseapp_group_code on baseapp_group_code.group_code = students_child_detail.group_code
			$sql="select name,gender,unique_id_no,class_studying_id,class_section,distribution_date,schoolnew_notebooks_dist.group_code, schoolnew_mediumofinstruction.MEDINSTR_ID,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_notebooks_dist.count as counts,schoolnew_notebooks_dist.scheme_category,schoolnew_schemedetail.scheme_category as scat
  from students_child_detail
  join schoolnew_notebooks_dist on schoolnew_notebooks_dist.school_id = students_child_detail.school_id and schoolnew_notebooks_dist.student_id= students_child_detail.id
   left  join  schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = schoolnew_notebooks_dist.medium
   join schoolnew_schemedetail on schoolnew_schemedetail.id = schoolnew_notebooks_dist.scheme_category
 
 WHERE students_child_detail.school_id =".$school_id." order by unique_id_no";
	   $query = $this->db->query($sql);
       return $query->result(); 
	}
	public function emis_school_bags_Distribution_details($school_id)
	{
		$sql="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
			from schoolnew_schemeindent  
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id = students_child_detail.community_id
			join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
			join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id
			join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 4 and students_child_detail.school_id  = ".$school_id." ";
			
	   $query = $this->db->query($sql);
       return $query->result(); 
	}
	public function emis_school_uniforms_Distribution_details($school_id,$sets)
	{
		if(!empty($sets))
	    {
         $where ="and  sets =".$sets."";
		}
		else
		{
		 $where ="  ";
		}
		$sql="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC,sets
		 from schoolnew_schemeindent  
		join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
		join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
		join baseapp_community on baseapp_community.id = students_child_detail.community_id
		join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id
		join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
		where schoolnew_schemeindent.scheme_id = 1   and isactive=1
		  and students_child_detail.school_id  = ".$school_id."  ".$where." ";
	   $query = $this->db->query($sql);
	   // echo $sql;
       return $query->result(); 
	}
	public function emis_school_footwear_Distribution_details($school_id)
	{
			$sql="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
            from schoolnew_schemeindent  
				join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
				join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
				join baseapp_community on baseapp_community.id = students_child_detail.community_id
				join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
                join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id 
				join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
				where schoolnew_schemeindent.scheme_id = 2 and students_child_detail.school_id  = ".$school_id."  ";
			   $query = $this->db->query($sql);
			   return $query->result();  
	}
	public function emis_school_buspass_Distribution_details($school_id)
	{
		$sql="select students_child_detail.name,gender,unique_id_no,community_id,class_studying_id,class_section,schoolnew_busindent.distribution_date,schoolnew_mediumofinstruction.MEDINSTR_DESC,baseapp_community.community_name
        from students_child_detail  
			join  schoolnew_busindent on  schoolnew_busindent.student_id = students_child_detail.id 
			join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			join baseapp_community on baseapp_community.id = students_child_detail.community_id
			and students_child_detail.school_id  = ".$school_id."  ";
        $query = $this->db->query($sql);
       return $query->result(); 
	}
	public function emis_school_ColourPencil_Distribution_details($school_id)
	{
		$sql ="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,baseapp_community.community_name,
			schoolnew_mediumofinstruction.MEDINSTR_DESC
			from schoolnew_schemeindent
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id =students_child_detail.community_id
		    join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 6 and students_child_detail.school_id  = ".$school_id."  ";
			$query = $this->db->query($sql);
            return $query->result(); 
	}
	public function emis_school_GeometryBox_Distribution_details($school_id)
	{
		$sql ="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,baseapp_community.community_name,
			schoolnew_mediumofinstruction.MEDINSTR_DESC
			from schoolnew_schemeindent
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id =students_child_detail.community_id
		    join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 7 and students_child_detail.school_id  = ".$school_id."  ";
			$query = $this->db->query($sql);
            return $query->result(); 
	}
	public function emis_school_Atlas_Distribution_details($school_id)
	{
		$sql ="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,baseapp_community.community_name,
			schoolnew_mediumofinstruction.MEDINSTR_DESC
			from schoolnew_schemeindent
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id =students_child_detail.community_id
		    join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 8 and students_child_detail.school_id  = ".$school_id." ";
			$query = $this->db->query($sql);
            return $query->result(); 
	}
	public function emis_school_Sweater_Distribution_details($school_id)
	{
		$sql ="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
			 from schoolnew_schemeindent  
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id = students_child_detail.community_id
		    join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
            join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id
			join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 12 and students_child_detail.school_id  = ".$school_id." ";
	        $query = $this->db->query($sql);
            return $query->result();
	}
	public function emis_school_Raincoat_Distribution_details($school_id)
	{
		$sql ="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
			 from schoolnew_schemeindent  
			join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			join baseapp_community on baseapp_community.id = students_child_detail.community_id
			join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
            join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id
			join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			where schoolnew_schemeindent.scheme_id = 18
			and students_child_detail.school_id  = ".$school_id." ";
            $query = $this->db->query($sql);
            return $query->result();
	}
	public function emis_school_boot_Distribution_details($school_id)
	{
		$sql="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
		 from schoolnew_schemeindent  
		join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
		join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
		join baseapp_community on baseapp_community.id = students_child_detail.community_id
		join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id 
		join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
		where schoolnew_schemeindent.scheme_id = 16 and students_child_detail.school_id  = ".$school_id." ";
  	   $query = $this->db->query($sql);
       return $query->result();
	}
	public function emis_school_Socks_Distribution_details($school_id)
	{
		$sql="select distinct schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.gender,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.unique_id_no,baseapp_community.community_name,schoolnew_schemedetail.scheme_category,schoolnew_mediumofinstruction.MEDINSTR_DESC
		 from schoolnew_schemeindent  
		join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
		join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
		join baseapp_community on baseapp_community.id = students_child_detail.community_id
		join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id = schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		join schoolnew_schemeapplicable on schoolnew_schemeapplicable.scheme_category = schoolnew_schemedetail.id and schoolnew_schemedetail.scheme_id = schoolnew_schemeapplicable.scheme_id
		join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
		where schoolnew_schemeindent.scheme_id = 17
		  and students_child_detail.school_id  = ".$school_id."  ";
	   $query = $this->db->query($sql);
       return $query->result();
	}
	public function emis_school_Laptops_Distribution_details($school_id,$where)
	{
		// $sql ="select schoolnew_schemeindent.student_id,schoolnew_schemeindent.scheme_id, schoolnew_schemeindent.distribution_date,students_child_detail.community_id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,baseapp_community.community_name,unique_supply,
			// schoolnew_mediumofinstruction.MEDINSTR_DESC
			// from schoolnew_schemeindent
			// join students_child_detail on students_child_detail.id = schoolnew_schemeindent.student_id
			// join schoolnew_freescheme on schoolnew_freescheme.id  = schoolnew_schemeindent.scheme_id
			// join baseapp_community on baseapp_community.id =students_child_detail.community_id
		    // join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id
			// where schoolnew_schemeindent.scheme_id = 11 and students_child_detail.school_id  = ".$school_id." "; 
			
			$sql ="select    students_child_detail.id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,isactive, scheme_id, scheme_category, student_id, indent_date, distribution_date, unique_supply,students_child_detail.school_id
  from students_child_detail
 left  join schoolnew_computerindent on schoolnew_computerindent.student_id =students_child_detail.id
  where schoolnew_computerindent.scheme_id = 11 and students_child_detail.school_id  =".$school_id." and isactive =1 and transfer_flag=0 and class_studying_id =".$where."";
			
			$query = $this->db->query($sql);
            return $query->result();
    }
    
    public function getListAllMediumOfInstruction(){
        $sql ="select * from schoolnew_mediumofinstruction where schoolnew_mediumofinstruction.VISIBLE_YN = 1"; 
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function getProvidingListCount($val,$where,$groupby,$tname){
          
        // $sql1="SELECT IF(b.cate_type IN ('High School' , 'Higher Secondary School'),1,0) Directorate, b.district_id, b.district_name as District, b.edu_dist_id, b.edu_dist_name as EduDist, b.block_id, b.block_name as Block, a.schoolid, b.school_name as School, a.classid as Class, a.mediumid,
        //      SUM(CASE WHEN ( a.classid=1) THEN ifnull(a.count,0) ELSE 0 END) AS Class1_Eligible,
        //      SUM(CASE WHEN ( a.classid=1) THEN ifnull(d.dist,0) ELSE 0 END) AS Class1_Distributed,
        //      SUM(CASE WHEN ( a.classid=1) THEN ifnull(e.count,0) ELSE 0 END) AS Class1_Despatched,
        //      SUM(CASE WHEN ( a.classid=2) THEN ifnull(a.count,0) ELSE 0 END) AS Class2_Eligible,
        //      SUM(CASE WHEN ( a.classid=2) THEN ifnull(d.dist,0) ELSE 0 END) AS Class2_Distributed,
        //      SUM(CASE WHEN ( a.classid=2) THEN ifnull(e.count,0) ELSE 0 END) AS Class2_Despatched,
        //      SUM(CASE WHEN ( a.classid=3) THEN ifnull(a.count,0) ELSE 0 END) AS Class3_Eligible,
        //      SUM(CASE WHEN ( a.classid=3) THEN ifnull(d.dist,0) ELSE 0 END) AS Class3_Distributed,
        //      SUM(CASE WHEN ( a.classid=3) THEN ifnull(e.count,0) ELSE 0 END) AS Class3_Despatched,
        //      SUM(CASE WHEN ( a.classid=4) THEN ifnull(a.count,0) ELSE 0 END) AS Class4_Eligible,
        //      SUM(CASE WHEN ( a.classid=4) THEN ifnull(d.dist,0) ELSE 0 END) AS Class4_Distributed,
        //      SUM(CASE WHEN ( a.classid=4) THEN ifnull(e.count,0) ELSE 0 END) AS Class4_Despatched,
        //      SUM(CASE WHEN ( a.classid=5) THEN ifnull(a.count,0) ELSE 0 END) AS Class5_Eligible,
        //      SUM(CASE WHEN ( a.classid=5) THEN ifnull(d.dist,0) ELSE 0 END) AS Class5_Distributed,
        //      SUM(CASE WHEN ( a.classid=5) THEN ifnull(e.count,0) ELSE 0 END) AS Class5_Despatched,
        //      SUM(CASE WHEN ( a.classid=6) THEN ifnull(a.count,0) ELSE 0 END) AS Class6_Eligible,
        //      SUM(CASE WHEN ( a.classid=6) THEN ifnull(d.dist,0) ELSE 0 END) AS Class6_Distributed,
        //      SUM(CASE WHEN ( a.classid=6) THEN ifnull(e.count,0) ELSE 0 END) AS Class6_Despatched,
        //      SUM(CASE WHEN ( a.classid=7) THEN ifnull(a.count,0) ELSE 0 END) AS Class7_Eligible,
        //      SUM(CASE WHEN ( a.classid=7) THEN ifnull(d.dist,0) ELSE 0 END) AS Class7_Distributed,
        //      SUM(CASE WHEN ( a.classid=7) THEN ifnull(e.count,0) ELSE 0 END) AS Class7_Despatched,
        //      SUM(CASE WHEN ( a.classid=8) THEN ifnull(a.count,0) ELSE 0 END) AS Class8_Eligible,
        //      SUM(CASE WHEN ( a.classid=8) THEN ifnull(d.dist,0) ELSE 0 END) AS Class8_Distributed,
        //      SUM(CASE WHEN ( a.classid=8) THEN ifnull(e.count,0) ELSE 0 END) AS Class8_Despatched,
        //      SUM(CASE WHEN ( a.classid=9) THEN ifnull(a.count,0) ELSE 0 END) AS Class9_Eligible,
        //      SUM(CASE WHEN ( a.classid=9) THEN ifnull(d.dist,0) ELSE 0 END) AS Class9_Distributed,
        //      SUM(CASE WHEN ( a.classid=9) THEN ifnull(e.count,0) ELSE 0 END) AS Class9_Despatched,
        //      SUM(CASE WHEN ( a.classid=10) THEN ifnull(a.count,0) ELSE 0 END) AS Class10_Eligible,
        //      SUM(CASE WHEN ( a.classid=10) THEN ifnull(d.dist,0) ELSE 0 END) AS Class10_Distributed,
        //      SUM(CASE WHEN ( a.classid=10) THEN ifnull(e.count,0) ELSE 0 END) AS Class10_Despatched,
        //      SUM(CASE WHEN ( a.classid=11) THEN ifnull(a.count,0) ELSE 0 END) AS Class11_Eligible,
        //      SUM(CASE WHEN ( a.classid=11) THEN ifnull(d.dist,0) ELSE 0 END) AS Class11_Distributed,
        //      SUM(CASE WHEN ( a.classid=11) THEN ifnull(e.count,0) ELSE 0 END) AS Class11_Despatched,
        //      SUM(CASE WHEN ( a.classid=12) THEN ifnull(a.count,0) ELSE 0 END) AS Class12_Eligible,
        //      SUM(CASE WHEN ( a.classid=12) THEN ifnull(d.dist,0) ELSE 0 END) AS Class12_Distributed,
        //      SUM(CASE WHEN ( a.classid=12) THEN ifnull(e.count,0) ELSE 0 END) AS Class12_Despatched
        //             FROM school_medium_child_count a
        //             LEFT JOIN students_school_child_count b ON a.schoolid = b.school_id
        //             LEFT JOIN (
        //         SELECT bb.school_id, bb.class_studying_id, bb.education_medium_id, count(aa.distribution_date) dist
        //         FROM schoolnew_schemeindent aa
        //         LEFT JOIN students_child_detail bb ON aa.student_id = bb.id
        //         WHERE aa.scheme_id = 9
        //         GROUP BY  bb.school_id, bb.class_studying_id, bb.education_medium_id) d
        //         ON a.schoolid = d.school_id AND a.classid = d.class_studying_id AND a.mediumid = d.education_medium_id
        //         LEFT JOIN 
        //         district_scheme_despatch e ON b.district_id = e.districtid AND a.classid = e.classid AND a.mediumid = e.mediumid
        //         WHERE 1".$where.$groupby.";";

                    $sql_query="SELECT IF(b.cate_type IN ('High School' , 'Higher Secondary School'),1,0) Directorate, b.district_id, b.district_name as District, b.edu_dist_id, b.edu_dist_name as EduDist, b.block_id, b.block_name as Block, a.schoolid, b.school_name as School, a.classid, a.mediumid,
                    SUM(CASE WHEN ( a.classid=1) THEN ifnull(a.count,0) ELSE 0 END) AS Class1_Eligible, 
                    SUM(CASE WHEN ( a.classid=1) THEN ifnull(d.dist,0) ELSE 0 END) AS Class1_Distributed, 
                    CASE WHEN ( a.classid=1) THEN 0 ELSE 0 END AS Class1_Despatched, 
                    SUM(CASE WHEN ( a.classid=2) THEN ifnull(a.count,0) ELSE 0 END) AS Class2_Eligible, 
                    SUM(CASE WHEN ( a.classid=2) THEN ifnull(d.dist,0) ELSE 0 END) AS Class2_Distributed, 
                    CASE WHEN ( a.classid=2) THEN 0 ELSE 0 END AS Class2_Despatched, 
                    SUM(CASE WHEN ( a.classid=3) THEN ifnull(a.count,0) ELSE 0 END) AS Class3_Eligible, 
                    SUM(CASE WHEN ( a.classid=3) THEN ifnull(d.dist,0) ELSE 0 END) AS Class3_Distributed, 
                    CASE WHEN ( a.classid=3) THEN 0 ELSE 0 END AS Class3_Despatched, 
                    SUM(CASE WHEN ( a.classid=4) THEN ifnull(a.count,0) ELSE 0 END) AS Class4_Eligible, 
                    SUM(CASE WHEN ( a.classid=4) THEN ifnull(d.dist,0) ELSE 0 END) AS Class4_Distributed, 
                    CASE WHEN ( a.classid=4) THEN 0 ELSE 0 END AS Class4_Despatched, 
                    SUM(CASE WHEN ( a.classid=5) THEN ifnull(a.count,0) ELSE 0 END) AS Class5_Eligible, 
                    SUM(CASE WHEN ( a.classid=5) THEN ifnull(d.dist,0) ELSE 0 END) AS Class5_Distributed, 
                    CASE WHEN ( a.classid=5) THEN 0 ELSE 0 END AS Class5_Despatched, 
                    SUM(CASE WHEN ( a.classid=6) THEN ifnull(a.count,0) ELSE 0 END) AS Class6_Eligible, 
                    SUM(CASE WHEN ( a.classid=6) THEN ifnull(d.dist,0) ELSE 0 END) AS Class6_Distributed, 
                    CASE WHEN ( a.classid=6) THEN 0 ELSE 0 END AS Class6_Despatched, 
                    SUM(CASE WHEN ( a.classid=7) THEN ifnull(a.count,0) ELSE 0 END) AS Class7_Eligible, 
                    SUM(CASE WHEN ( a.classid=7) THEN ifnull(d.dist,0) ELSE 0 END) AS Class7_Distributed, 
                    CASE WHEN ( a.classid=7) THEN 0 ELSE 0 END AS Class7_Despatched, 
                    SUM(CASE WHEN ( a.classid=8) THEN ifnull(a.count,0) ELSE 0 END) AS Class8_Eligible, 
                    SUM(CASE WHEN ( a.classid=8) THEN ifnull(d.dist,0) ELSE 0 END) AS Class8_Distributed, 
                    (CASE WHEN ( a.classid=8 )THEN 0 ELSE 0 END) AS Class8_Despatched, 
                    SUM(CASE WHEN ( a.classid=9) THEN ifnull(a.count,0) ELSE 0 END) AS Class9_Eligible, 
                    SUM(CASE WHEN ( a.classid=9) THEN ifnull(d.dist,0) ELSE 0 END) AS Class9_Distributed, 
                    CASE WHEN ( a.classid=9) THEN 0 ELSE 0 END AS Class9_Despatched, 
                    SUM(CASE WHEN ( a.classid=10) THEN ifnull(a.count,0) ELSE 0 END) AS Class10_Eligible, 
                    SUM(CASE WHEN ( a.classid=10) THEN ifnull(d.dist,0) ELSE 0 END) AS Class10_Distributed, 
                    CASE WHEN ( a.classid=10) THEN 0 ELSE 0 END AS Class10_Despatched, 
                    SUM(CASE WHEN ( a.classid=11) THEN ifnull(a.count,0) ELSE 0 END) AS Class11_Eligible, 
                    SUM(CASE WHEN ( a.classid=11) THEN ifnull(d.dist,0) ELSE 0 END) AS Class11_Distributed, 
                    CASE WHEN ( a.classid=11) THEN 0 ELSE 0 END AS Class11_Despatched, 
                    SUM(CASE WHEN ( a.classid=12) THEN ifnull(a.count,0) ELSE 0 END) AS Class12_Eligible, 
                    SUM(CASE WHEN ( a.classid=12) THEN ifnull(d.dist,0) ELSE 0 END) AS Class12_Distributed, 
                    CASE WHEN ( a.classid=12) THEN 0 ELSE 0 END AS Class12_Despatched 
                    FROM school_medium_child_count a
                    LEFT JOIN students_school_child_count b ON a.schoolid = b.school_id
                    LEFT JOIN (
                                SELECT bb.school_id, bb.`class_studying_id`, bb.`education_medium_id`, count(aa.`distribution_date`) dist
                                FROM ".$tname." aa
                                LEFT JOIN students_child_detail bb ON aa.`student_id` = bb.`id`
                                WHERE aa.`scheme_id` = ".$val."
                                GROUP BY  bb.school_id, bb.`class_studying_id`, bb.`education_medium_id`) d
                            ON a.schoolid = d.school_id AND a.`classid` = d.class_studying_id AND a.`mediumid` = d.education_medium_id
                    WHERE b.district_id IS NOT NULL ".$where.$groupby.";";

            $query = $this->db->query($sql_query);
            // print_r($this->db->last_query());
            // print_r($query->result());die();
            return $query->result();
            
            }

             
            function gettextbookProvidingListCount($scheme_id,$where,$groupby,$tname,$where2){
                // echo $scheme_id;
                // echo $where;
                // echo $groupby;
                // echo $tname;
                // echo $where2;

                $sql="SELECT IF(b.cate_type IN ('High School' , 'Higher Secondary School'),1,0) Directorate, b.district_id, b.district_name as District, b.edu_dist_id, b.edu_dist_name as EduDist, b.block_id, b.block_name as Block, a.schoolid, b.school_name as School, a.classid, a.mediumid,d.scheme_id as schemeid,
                d.book_id,d.term,d.book_name,
                             SUM(CASE WHEN ( a.classid=1) THEN ifnull(a.count,0) ELSE 0 END) AS Class1_Eligible,
                             SUM(CASE WHEN ( a.classid=1) THEN ifnull(d.dist,0) ELSE 0 END) AS Class1_Distributed,
                             CASE WHEN ( a.classid=1) THEN 0 ELSE 0 END AS Class1_Despatched,
                             SUM(CASE WHEN ( a.classid=2) THEN ifnull(a.count,0) ELSE 0 END) AS Class2_Eligible,
                             SUM(CASE WHEN ( a.classid=2) THEN ifnull(d.dist,0) ELSE 0 END) AS Class2_Distributed,
                             CASE WHEN ( a.classid=2) THEN 0 ELSE 0 END AS Class2_Despatched,
                             SUM(CASE WHEN ( a.classid=3) THEN ifnull(a.count,0) ELSE 0 END) AS Class3_Eligible,
                             SUM(CASE WHEN ( a.classid=3) THEN ifnull(d.dist,0) ELSE 0 END) AS Class3_Distributed,
                             CASE WHEN ( a.classid=3) THEN 0 ELSE 0 END AS Class3_Despatched,
                             SUM(CASE WHEN ( a.classid=4) THEN ifnull(a.count,0) ELSE 0 END) AS Class4_Eligible,
                             SUM(CASE WHEN ( a.classid=4) THEN ifnull(d.dist,0) ELSE 0 END) AS Class4_Distributed,
                             CASE WHEN ( a.classid=4) THEN 0 ELSE 0 END AS Class4_Despatched,
                             SUM(CASE WHEN ( a.classid=5) THEN ifnull(a.count,0) ELSE 0 END) AS Class5_Eligible,
                             SUM(CASE WHEN ( a.classid=5) THEN ifnull(d.dist,0) ELSE 0 END) AS Class5_Distributed,
                             CASE WHEN ( a.classid=5) THEN 0 ELSE 0 END AS Class5_Despatched,
                             SUM(CASE WHEN ( a.classid=6) THEN ifnull(a.count,0) ELSE 0 END) AS Class6_Eligible,
                             SUM(CASE WHEN ( a.classid=6) THEN ifnull(d.dist,0) ELSE 0 END) AS Class6_Distributed,
                             CASE WHEN ( a.classid=6) THEN 0 ELSE 0 END AS Class6_Despatched,
                             SUM(CASE WHEN ( a.classid=7) THEN ifnull(a.count,0) ELSE 0 END) AS Class7_Eligible,
                             SUM(CASE WHEN ( a.classid=7) THEN ifnull(d.dist,0) ELSE 0 END) AS Class7_Distributed,
                             CASE WHEN ( a.classid=7) THEN 0 ELSE 0 END AS Class7_Despatched,
                             SUM(CASE WHEN ( a.classid=8) THEN ifnull(a.count,0) ELSE 0 END) AS Class8_Eligible,
                             SUM(CASE WHEN ( a.classid=8) THEN ifnull(d.dist,0) ELSE 0 END) AS Class8_Distributed,
                             CASE WHEN ( a.classid=8 )THEN 0 ELSE 0 END AS Class8_Despatched,
                             SUM(CASE WHEN ( a.classid=9) THEN ifnull(a.count,0) ELSE 0 END) AS Class9_Eligible,
                             SUM(CASE WHEN ( a.classid=9) THEN ifnull(d.dist,0) ELSE 0 END) AS Class9_Distributed,
                             CASE WHEN ( a.classid=9) THEN 0 ELSE 0 END AS Class9_Despatched,
                             SUM(CASE WHEN ( a.classid=10) THEN ifnull(a.count,0) ELSE 0 END) AS Class10_Eligible,
                             SUM(CASE WHEN ( a.classid=10) THEN ifnull(d.dist,0) ELSE 0 END) AS Class10_Distributed,
                             CASE WHEN ( a.classid=10) THEN 0 ELSE 0 END AS Class10_Despatched,
                             SUM(CASE WHEN ( a.classid=11) THEN ifnull(a.count,0) ELSE 0 END) AS Class11_Eligible,
                             SUM(CASE WHEN ( a.classid=11) THEN ifnull(d.dist,0) ELSE 0 END) AS Class11_Distributed,
                             CASE WHEN ( a.classid=11) THEN 0 ELSE 0 END AS Class11_Despatched,
                             SUM(CASE WHEN ( a.classid=12) THEN ifnull(a.count,0) ELSE 0 END) AS Class12_Eligible,
                             SUM(CASE WHEN ( a.classid=12) THEN ifnull(d.dist,0) ELSE 0 END) AS Class12_Distributed,
                             CASE WHEN ( a.classid=12) THEN 0 ELSE 0 END AS Class12_Despatched
                            FROM school_medium_child_count a
                            LEFT JOIN
                            students_school_child_count b ON a.schoolid = b.school_id AND b.school_type = 'Government' AND b.management IN ('School Education Department School','Municipal School')
                            LEFT JOIN 
                            (
                                SELECT bb.school_id, bb.`class_studying_id`, bb.`education_medium_id`, count(aa.`distribution_date`) dist,aa.scheme_id,ab.book_id,ab.term,ab.book_name
                                FROM ".$tname." aa  LEFT JOIN schoolnew_textbooks_list ab ON ab.book_id =aa.book_id AND aa.medium =ab.medium 
                                    LEFT JOIN students_child_detail bb ON aa.`student_id` = bb.`id`
                                    WHERE aa.isactive = 1 ".$where2." AND aa.`scheme_id` = ".$scheme_id." GROUP BY  bb.school_id, bb.`class_studying_id`, bb.`education_medium_id`) d
                                ON a.schoolid = d.school_id AND a.`classid` = d.class_studying_id AND a.`mediumid` = d.education_medium_id
                                WHERE b.district_id IS NOT NULL ".$where.$groupby.";";
                $query = $this->db->query($sql);
                return $query->result();
            }

            function getListAllFilteredSchemes($where,$groupby){
              $sql = "SELECT schoolnew_freescheme.id,scheme_name,MIN(appli_lowclass) as appli_lowclass,MAX(appli_highclass) as appli_highclass,appli_count FROM schoolnew_freescheme 
                        JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id WHERE ".$where.$groupby.";";
              $query = $this->db->query($sql);
              // print_r($this->db->last_query());
              // print_r($query->result());die();
              return $query->result();
            }
            
            function getSummaryCountForStationeryIndent($school_id){ 
                $SQL="SELECT COUNT(DISTINCT students_child_detail.id) as stdcount,
                      freescheme.scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility,low_class,high_class,
                      (CASE WHEN schoolnew_schemeindent.scheme_id IS NOT NULL THEN 1 ELSE 0 END) as checkbit
                      FROM students_child_detail
                      LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
                      LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
                      LEFT JOIN (SELECT schoolnew_schemeapplicable.scheme_id,
			          MIN(schoolnew_schemeapplicable.appli_lowclass) as low_class,
			          MAX(schoolnew_schemeapplicable.appli_highclass) as high_class,
			          appli_count,visibility,hill_restrict,school_key_id
			          FROM schoolnew_freescheme
			          JOIN schoolnew_academic_detail ON schoolnew_academic_detail.hill_frst=hill_restrict OR hill_restrict=0
			          LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
			          WHERE school_key_id=".$school_id."
			          GROUP BY scheme_id,school_key_id ) AS freescheme ON freescheme.school_key_id=students_child_detail.school_id
                      WHERE students_child_detail.school_id=".$school_id." AND class_studying_id<=12 AND transfer_flag=0
                      GROUP BY freescheme.scheme_id,class_studying_id 
                      ORDER BY class_studying_id ASC,visibility DESC;";
                $query = $this->db->query($SQL);
                // print_r($this->db->last_query());die;
                return $query->result();
            }

            // function getUniformAndFootwearScheme($class,$setid,$school_id){ 
            //     // echo $class;
            //     // echo $setid;
            //     // echo $school_id;
            //     if($setid != '' ){ $concat_where = " AND b.sets = ".$setid;}else{ $concat_where = "";}
            //     $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
            //     b.scheme_id, b.scheme_category, DATE_FORMAT(b.indent_date, '%d/%m/%Y') as indent_date, b.distribution_date, b.unique_supply,
            //     c.scheme_id as new_scheme_id,c.scheme_category as new_scheme_category
            //     FROM students_child_detail a
            //     LEFT JOIN schoolnew_schemeindent b
            //     ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id in(1)
            //     LEFT JOIN (schoolnew_schemeindent as c)
	        //     ON  a.id = c.student_id AND c.isactive = 1 AND c.scheme_id in(2)
            //     WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class.";";
            //     $query = $this->db->query($SQL);
            //     // print_r($this->db->last_query());die;
            //     return $query->result();
            // }

            function getStudentforFootwearAndHillStationIndent($school_id,$class,$section_id,$scheme_id,$tname){ 
                if($section_id == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$section_id."'"; } 
                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                b.scheme_id as scheme_id, b.scheme_category as new_scheme_category,b.indent_date as indent_date, b.distribution_date, b.unique_supply
                FROM students_child_detail a
                LEFT JOIN ".$tname." b
                ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id =".$scheme_id." 
                WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class." ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                // print_r($this->db->last_query());die;
                return $query->result();
            }

            function getStudentforNoonmealIndent($schoolid,$class,$sectionid,$tname){ 
                if($sectionid == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 

                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                        b.scheme_id as scheme_id, b.scheme_category as new_scheme_category,
                        b.indent_date as indent , b.distribution_date, b.unique_supply
                        FROM students_child_detail a
                        LEFT JOIN ".$tname." b
                        ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id in(15)
                        WHERE a.transfer_flag = 0 AND a.school_id=".$schoolid." AND a.class_studying_id = ".$class.$concat_where." ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                // print_r($this->db->last_query());die;
                return $query->result();
            }

            function getStudentforUniformIndent($school_id,$class,$section_id,$scheme_id,$tname){ 
                if($section_id == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$section_id."'"; } 
                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                b.scheme_id,b.indent_date as indent_date, b.distribution_date, b.unique_supply,
                (select unique_supply from ".$tname." where a.id = ".$tname.".student_id AND ".$tname.".isactive = 1 AND ".$tname.".scheme_id = 15 limit 1) as NoonmealCheck,
                sum(IF(b.sets = 1 ,b.scheme_category, 0)) set1_scheme_category,
                sum(IF(b.sets = 2 ,b.scheme_category, 0)) set2_scheme_category,
                sum(IF(b.sets = 3 ,b.scheme_category, 0)) set3_scheme_category,
                sum(IF(b.sets = 4 ,b.scheme_category, 0)) set4_scheme_category
                FROM students_child_detail a
                LEFT JOIN ".$tname." b
                ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id = 1
                WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class.$concat_where." group by a.id ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                return $query->result();
            }

            function getStudentforUniformDist($class,$school_id,$sectionid,$tname){
                if($sectionid == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 
                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                b.scheme_id, b.scheme_category,b.indent_date as indent_date, b.distribution_date, b.unique_supply,
                b.scheme_category as set1_scheme_category,b.distribution_date as set1_distribution_date,
                c.scheme_category as set2_scheme_category,c.distribution_date as set2_distribution_date,
                d.scheme_category as set3_scheme_category,d.distribution_date as set3_distribution_date,
                e.scheme_category as set4_scheme_category,e.distribution_date as set4_distribution_date
                FROM students_child_detail a
                LEFT JOIN ".$tname." b
                ON a.id = b.student_id AND b.isactive = 1 and b.sets = 1 AND b.scheme_id = 1
                LEFT JOIN ".$tname." c
                ON a.id = c.student_id AND c.isactive = 1 and c.sets = 2 AND b.scheme_id = 1
                LEFT JOIN ".$tname." d
                ON a.id = d.student_id AND d.isactive = 1 and d.sets = 3 AND b.scheme_id = 1
                LEFT JOIN ".$tname." e
                ON a.id = e.student_id AND e.isactive = 1 and e.sets = 4 AND b.scheme_id = 1
                WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class.$concat_where." group by a.id ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                return $query->result();
            }
            
            // function getStudentforUniformDist($class,$school_id,$sectionid){
            //     if($sectionid == '0'){ $concat_where = ""; }
            //     else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 
            //     $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
            //     b.scheme_id,b.indent_date as indent_date, b.unique_supply,
            //     group_concat(concat('Set ',b.sets, ' - ', c.scheme_category)) as scheme_category,
            //     group_concat(concat(b.sets,'-',b.scheme_category)) as scheme_category_id,
            //     group_concat(concat(b.sets,'-',b.distribution_date)) as distribution_date
            //     FROM students_child_detail a
            //     LEFT JOIN schoolnew_schemeindent b ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id = 1
            //     LEFT JOIN schoolnew_schemedetail c ON b.scheme_category = c.id
            //     WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class.$concat_where." group by a.id ORDER BY a.class_section,a.NAME ASC;";
            //     $query = $this->db->query($SQL);
            //     return $query->result();
            // }
            
            function getOtherDistibutionforScheme($school_id,$class,$sectionid,$scheme_id,$tname){ 
                if($sectionid == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$sectionid."'"; }
                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section, 
                b.scheme_id, b.scheme_category, b.indent_date as indent_date, b.distribution_date, b.unique_supply
                FROM students_child_detail a
                LEFT JOIN ".$tname." b
                ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id = ".$scheme_id."
                WHERE a.transfer_flag = 0 AND a.school_id=".$school_id." AND a.class_studying_id = ".$class.$concat_where." ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                //   print_r($this->db->last_query());
                //   print_r($query->result());die();
                return $query->result();
            }
            
            function getNoonmealCountforUniformIndent($school_id,$class,$sectionid,$tname){
                if($sectionid == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND b.class_section = '".$sectionid."'"; } 
                $SQL="SELECT a.id FROM ".$tname." a 
                LEFT JOIN students_child_detail b
                ON b.id = a.student_id 
                WHERE a.isactive = 1 AND a.scheme_id = 15 AND a.school_id=".$school_id." AND a.class = ".$class.$concat_where.";";
                $query = $this->db->query($SQL);
                if($query->num_rows() == 0){
                    return 0;
                }
                else{
                    return 1;
                }
            }

            function getDtlforNoteBookEligibility($where){
                $SQL="SELECT concat(a.class, '-T', ifnull(a.term,1)) as termwiseclass , a.class as class, ifnull(a.term,'Y') as term,
                      sum(a.col1) as FortyPageRuled, 
                      sum(a.col2) as FortyPageScience, 
                      sum(a.col3) as FortyPageMaths, 
                      sum(a.col4) as EightyPageRuled, 
                      sum(a.col5) as EightyPageScience, 
                      sum(a.col6) as EightyPageMaths, 
                      sum(a.col7) as TwoLines, 
                      sum(a.col8) as FourLines, 
                      sum(a.col9) as Drawing, 
                      sum(a.col10) as Composition, 
                      sum(a.col11) as GeometryNote, 
                      sum(a.col12) as GraphNote,
                      sum(a.col13) as RecordNote FROM (
                    SELECT class, term,
                    IF (scheme_category = 1, count, 0) AS col1,
                    IF (scheme_category = 2, count, 0) AS col2,
                    IF (scheme_category = 3, count, 0) AS col3,
                    IF (scheme_category = 4, count, 0) AS col4,
                    IF (scheme_category = 5, count, 0) AS col5,
                    IF (scheme_category = 6, count, 0) AS col6,
                    IF (scheme_category = 7, count, 0) AS col7,
                    IF (scheme_category = 8, count, 0) AS col8,
                    IF (scheme_category = 9, count, 0) AS col9,
                    IF (scheme_category = 10, count, 0) AS col10,
                    IF (scheme_category = 11, count, 0) AS col11,
                    IF (scheme_category = 12, count, 0) AS col12,
                    IF (scheme_category = 41, count, 0) AS col13
                    FROM schoolnew_notebooks_list 
                    ) a ".$where." GROUP BY concat(a.class, '-T', ifnull(a.term,1)) order by a.class;";
                $query = $this->db->query($SQL);
                // print_r($this->db->last_query());die;
                return $query->result();
            }
            
            // function getSummaryCountForEssentialsIndent($school_id){ 
            //     $SQL="SELECT 
            //     IFNULL(indcount,stdcount) as indcount,
            //     scheme_id,class_studying_id,class_studying,visibility,low_class,high_class,checkbit
            //     FROM(SELECT 
            //     SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
            //             CASE WHEN schoolnew_schemeindent.scheme_id=freescheme.scheme_id THEN 1 ELSE NULL END END) as indcount,
            //     COUNT(DISTINCT students_child_detail.id) as stdcount,
            //     freescheme.scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility,low_class,high_class,
            //     (CASE WHEN schoolnew_schemeindent.scheme_id IS NOT NULL THEN 1 ELSE 0 END) as checkbit
            // FROM students_child_detail
            // LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
            // LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
            // LEFT JOIN (SELECT   
            //     schoolnew_schemeapplicable.scheme_id,
            //     MIN(schoolnew_schemeapplicable.appli_lowclass) as low_class,
            //     MAX(schoolnew_schemeapplicable.appli_highclass) as high_class,
            //     appli_count,visibility,hill_restrict,school_key_id
            // FROM schoolnew_freescheme
            // JOIN schoolnew_academic_detail ON schoolnew_academic_detail.hill_frst=hill_restrict OR hill_restrict=0
            // LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
            // WHERE school_key_id=".$school_id."
            // GROUP BY scheme_id,school_key_id) AS freescheme ON freescheme.school_key_id=students_child_detail.school_id
            // WHERE students_child_detail.school_id=".$school_id." AND class_studying_id<=12 AND transfer_flag=0
            // AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
            // GROUP BY freescheme.scheme_id,class_studying_id 
            // ORDER BY class_studying_id ASC,visibility DESC) AS der;";
            
            //     //echo($SQL);die();
            //     $query = $this->db->query($SQL);
            //     return $query->result();
            // }

                function teacher_login_details($school_id){
                /*$sql = "select school_key_id,teacher_code,teacher_name,emis_username,ref from emisuser_teacher
                        join udise_staffreg on udise_staffreg.u_id=emisuser_teacher.emis_user_id 
                        join students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
                        where school_key_id=".$school_id." and school_type_id in (1,2,4)";*/
                        
                        $sql = "select school_key_id,teacher_code,teacher_name,emis_username,ref 
                        from emisuser_teacher
                        join udise_staffreg on udise_staffreg.u_id=emisuser_teacher.emis_user_id 
                        join students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
                        where school_key_id=".$school_id." and school_type_id in (1,2,4)";
                        $query = $this->db->query($sql);
              // print_r($this->db->last_query());
              // print_r($query->result());die();
              return $query->result();
            }
// SELECT * FROM tnschools_working.students_school_child_count;


    /*********************************** End ******************************/

    /**************************** Scheme Distribution *********************/


    // class list 
      public function emis_note_book_class()
      {
          $this->db->select('id,class')
                   ->from('schoolnew_notebooks_list')
                   ->group_by('class');

          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;

      }
    // student List

    public function get_student_list_scheme_details($class_id,$section_id,$group_id)
    {
        $this->db->distinct();
        $this->db->select('students_child_detail.name,students_child_detail.unique_id_no,students_child_detail.id as students_id,students_child_detail.school_id as student_school_id,,schoolnew_mediumofinstruction.MEDINSTR_DESC,students_child_detail.class_section')

                 ->from('students_child_detail')
                 ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_child_detail.school_id and schoolnew_section_group.class_id = students_child_detail.class_studying_id and schoolnew_section_group.section = students_child_detail.class_section','left')
                 ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                 
                 
                 ->join('baseapp_group_code','baseapp_group_code.id = students_child_detail.group_code_id','left')
                 ->where('students_child_detail.school_id',$this->session->userdata('emis_school_id'))
                 ->where('students_child_detail.class_studying_id',$class_id);

                 
                 
                 $this->db->where('students_child_detail.transfer_flag',0);
                 if($this->session->userdata('school_manage') !=1){
                  $this->db->where('schoolnew_section_group.school_type',1);
                }

                  if($group_id >=0 && $group_id <=3 )
                  {
                  }else
                  {
                  $this->db->where('baseapp_group_code.group_code',$group_id);
                  }
                  // $this->db->group_by('students_child_detail.id');
                 // ->where('schoolnew_books_dist.isactive',1);
          $result = $this->db->get()->result();
          // print_r($this->session->userdata());
          // print_r($this->db->last_query());
          return $result;
    }
    // note book 
    public function get_student_list_book_scheme_details($class_id,$section_id,$group_id,$note_book_id)
    {
      // print_r($this->session->userdata());

        $this->db->distinct();
        $this->db->select('students_child_detail.name,students_child_detail.unique_id_no,students_child_detail.id as students_id,students_child_detail.school_id as student_school_id,,schoolnew_mediumofinstruction.MEDINSTR_DESC,students_child_detail.class_section,schoolnew_notebooks_dist.count,schoolnew_notebooks_dist.id sch_dist_id')

                 ->from('students_child_detail')
                 ->join('schoolnew_section_group','schoolnew_section_group.school_key_id = students_child_detail.school_id and schoolnew_section_group.class_id = students_child_detail.class_studying_id and schoolnew_section_group.section = students_child_detail.class_section','left')
                 ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                 ->join('schoolnew_notebooks_dist','schoolnew_notebooks_dist.student_id = students_child_detail.id and schoolnew_notebooks_dist.scheme_category='.$note_book_id,'left')
                 ->join('schoolnew_schemedetail','schoolnew_schemedetail.id = schoolnew_notebooks_dist.scheme_category and schoolnew_schemedetail.scheme_id = schoolnew_notebooks_dist.scheme_id','left')
                 ->join('baseapp_group_code','baseapp_group_code.id = students_child_detail.group_code_id','left')
                 ->where('students_child_detail.school_id',$this->session->userdata('emis_school_id'))
                 ->where('students_child_detail.class_studying_id',$class_id);
                 
                 if($section_id !='0')
                 {

                  
                      $this->db->where('students_child_detail.class_section',$section_id);
                 }
                 
                 $this->db->where('students_child_detail.transfer_flag',0);

                 if($this->session->userdata('school_manage')==4)
                 {
                    $this->db->where('schoolnew_section_group.school_type',1);
                 }

                  if($group_id >=0 && $group_id <=3 ){
                  }else
                  {
                  $this->db->where('baseapp_group_code.group_code',$group_id);
                  }
                  $this->db->group_by('students_child_detail.id');
                 // ->where('schoolnew_books_dist.isactive',1);
          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;
    }

    // Avabile Count
    public function get_note_book_count($class,$group_code)
    {
        $this->db->select('schoolnew_schemedetail.id as sch_id,schoolnew_schemedetail.scheme_category,schoolnew_notebooks_list.count')
                 ->from('schoolnew_notebooks_list')
                 ->join('schoolnew_schemedetail','schoolnew_schemedetail.id = schoolnew_notebooks_list.scheme_category')
                 ->where('schoolnew_notebooks_list.class',$class)
                 ->where('schoolnew_notebooks_list.group_code',$group_code);
        $result = $this->db->get()->result();
        return $result;
    }       

    // Save Distribution

    public function save_distribution($table,$save_data)
    {

        $result = $this->db->get_where($table,array('student_id'=>$save_data['student_id'],'school_id'=>$save_data['school_id'],'class'=>$save_data['class'],'medium'=>$save_data['medium'],'group_code'=>$save_data['group_code'],'book_id'=>$save_data['book_id']))->first_row();
        // print_r($result);
        if($result !=''){
          $save_data['distribution_date'] = $result->distribution_date;
            $this->db->where('id',$result->id);
            $save_data['id'] = $result->id;
            $this->db->update($table,$save_data);
            // print_r($this->db->last_query());die;
            return $save_data['id'];
        }else
        {
            $this->db->insert($table,$save_data);
            return $this->db->insert_id();
        }
      
    }

  /****************************************** End *********************************/

             function updatefile($school_key_id,$image){
        $this->db->where('school_key_id', $school_key_id);      
       $this->db->update('schoolnew_infra_detail', $image); 
       return $school_key_id;  
   
    }

    function getpic($school_id){
              $this->db->select('photo,photo1,photo2,photo3,photo4,photo5')
                       ->from('schoolnew_infra_detail')
                       ->where('school_key_id',$school_key_id);
              $result = $this->db->get()->first_row();
              // print_r($this->db->last_query());
              // print_r($query->result());die();
              return $result;
            }
// SELECT * FROM tnschools_working.students_school_child_count; 


  /*************************************** Note Book Distribution *****************/

  // Note Book Details

  public function get_emis_note_book_details($where)
  {
      $this->db->select('schoolnew_notebooks_list.id,schoolnew_notebooks_list.class,schoolnew_notebooks_list.medium,schoolnew_notebooks_list.scheme_category,schoolnew_notebooks_list.count,schoolnew_schemedetail.scheme_category as cate')
               ->from('schoolnew_notebooks_list')
               ->join('schoolnew_schemedetail','schoolnew_schemedetail.id = schoolnew_notebooks_list.scheme_category','left')
               ->where($where);

        $result = $this->db->get()->result();
        // print_r($this->db->last_query());
        return $result;
  }      

  // Save Distribution

    public function save_notebook_distribution($table,$save_data)
    {
        $result = $this->db->get_where($table,array('student_id'=>$save_data['student_id'],'school_id'=>$save_data['school_id'],'scheme_category'=>$save_data['scheme_category'],'isactive'=>1))->first_row();
        // print_r($result);die;
        if($result !=''){
            $this->db->where('id',$result->id);
            
            $this->db->update($table,$save_data);
            return $save_data['id'];
        }else
        {
            $this->db->insert($table,$save_data);
            return $this->db->insert_id();
        }
    }

    // edit noteBook 

    public function get_emis_dist_notebook($where,$student_id='')
    {
        if($student_id  !='')
        {
          $select = 'schoolnew_notebooks_dist.id as dist_id,schoolnew_notebooks_dist.count as entry_count';
        }
          $this->db->select('schoolnew_notebooks_list.id,schoolnew_notebooks_list.class,schoolnew_notebooks_list.medium,schoolnew_notebooks_list.scheme_category,schoolnew_notebooks_list.count,schoolnew_schemedetail.scheme_category as cate,'.$select)
                   ->from('schoolnew_notebooks_list');
                   if($student_id !=''){
                   $this->db->join('schoolnew_notebooks_dist','schoolnew_notebooks_list.scheme_category = schoolnew_notebooks_dist.scheme_category and schoolnew_notebooks_list.class = schoolnew_notebooks_dist.class  and schoolnew_notebooks_list.group_code = schoolnew_notebooks_dist.group_code','left');
                 }
                   $this->db->join('schoolnew_schemedetail','schoolnew_schemedetail.id = schoolnew_notebooks_list.scheme_category','left')
                   ->where($where);
                   if($student_id !='')
                   {
                    $this->db->where('schoolnew_notebooks_dist.student_id',$student_id);
                   }
                   $this->db->group_by('schoolnew_notebooks_list.scheme_category');

              $result = $this->db->get()->result();
              // print_r($this->db->last_query());
          return $result;
    }

    function student_summary($school_id){
              $sql = "SELECT sum(case gender when 1 then 1 else 0 end ) AS male,sum(case gender when 2 then 1 else 0 end ) AS Female,class_studying_id,class_section,(select group_name from baseapp_group_code where baseapp_group_code.id=students_child_detail.group_code_id limit 1) AS grp,(select MEDINSTR_DESC from schoolnew_mediumofinstruction where schoolnew_mediumofinstruction.ID=students_child_detail.education_medium_id limit 1) AS edu_med FROM students_child_detail where school_id=".$school_id." and class_studying_id not in (11,12)  and transfer_flag=0 group by class_studying_id,class_section ";
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

            /** Scheme Laptop-Distribution (QUERY) Functionality are Starts Here : last mod - 18.07.2019(venba/ps) */
            
            //Get the Laptop-Distribution Dtls
            function getLaptopDistibutionforScheme($scheme_id,$class,$academicyear,$school_id,$sectionid){ 
                if($sectionid == '0'){ $concat_where = ""; }
                else{ $concat_where = " AND a.class_section = '".$sectionid."'"; }
                $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section, 
                b.scheme_id, b.scheme_category, b.indent_date, b.distribution_date, b.unique_supply
                FROM students_child_detail a
                LEFT JOIN schoolnew_computerindent b
                ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id = 11
                WHERE a.school_id=".$school_id." AND a.class_studying_id = ".$class." AND a.transfer_flag = ".$academicyear.$concat_where." ORDER BY a.class_section,a.NAME ASC;";
                $query = $this->db->query($SQL);
                return $query->result();
            }

            //To Check or Compare With Existing Data 
            //IF Unique-id Already Existing or not 
            function checkWithExistUniqueID($rec){
                $sql = "SELECT schoolnew_computerindent.id FROM schoolnew_computerindent WHERE isactive = 1 AND schoolnew_computerindent.unique_supply = '".$rec."'";
                $query = $this->db->query($sql);
                if($query->num_rows() == 0){
                    return 0;
                }
                else{
                    return 1;
                }
            }
            /** --- Scheme Laptop-Distribution DB-Functionality are Ends Here --- */
            function submitSchemeDtls($data,$scheme_id,$class,$school_id,$tname,$section){
                        // for($i=0;$i<count($data);$i++){ 
                            $this->db->select($tname.'.id');//get id 
                            $this->db->from($tname); //table name 
                            if($section != '0'){
                               $this->db->join('students_child_detail','students_child_detail.id = '.$tname.'.student_id','LEFT');
                            }
                            $this->db->where($tname.'.school_id',$school_id);//in which student row want to inactive 
                            $this->db->where($tname.'.scheme_id',$scheme_id); //along with student and scheme want to inactive means
                            $this->db->where($tname.'.class',$class); //along with student and scheme want to inactive means
                            $this->db->where($tname.'.isactive', 1);   
                            if($section != '0'){
                                $this->db->where('students_child_detail.class_section', $section);   
                            }
                            
                            $result = $this->db->get()->result();

                        if(!empty($result)){
                            for($i=0;$i<count($result);$i++){ 
                                $this->db->set('isactive', 0); //value that used to update column  
                                $this->db->where('id', $result[$i]->id); //which row want to upgrade  
                                $this->db->update($tname);  //table name
                            }
                        }

                        if($data==null)return true;
                        else return $this->db->insert_batch($tname, $data);
                        // return 1;
                    
            }

            function updateOnSchemeIndent($where_arr,$data,$tname,$section){
              // print_r($where_arr);
              // echo '<br/>'.'sdf';
              // print_r($data);
              // echo '<br/>'.$tname.'<br/>';
              // echo $section.'<br/>';
              
                for($i=0;$i<count($where_arr);$i++){ 
                    $this->db->select($tname.'.id');//get id 
                    $this->db->from($tname); //table name 
                    if($section != '0'){
                       $this->db->join('students_child_detail','students_child_detail.id = '.$tname.'.student_id','LEFT');
                       $this->db->where('students_child_detail.class_section', $section);   
                    }
                    $this->db->where($tname.'.school_id',$where_arr[$i]['school_id']);//in which student row want to inactive 
                    $this->db->where($tname.'.scheme_id',$where_arr[$i]['scheme_id']); //along with student and scheme want to inactive means
                    $this->db->where($tname.'.class',$where_arr[$i]['class_id']); //along with student and scheme want to inactive means
                    $this->db->where($tname.'.isactive',$where_arr[$i]['isactive']);   
                    $this->db->where($tname.'.student_id',$where_arr[$i]['student_id']);   
                    $id = $this->db->get()->row()->id;                    
                    // print_r($this->db->last_query());
                     $this->db->set('isactive', 0); //value that used to update column  
                     $this->db->where('id',$id); //which row want to upgrade  
                     $this->db->update($tname);  //table name
                }

                if($data==null)return true;
                else{
                      $this->db->insert_batch($tname, $data);
                      return ($this->db->affected_rows() > 0) ? true : false;
                }
            }

          //   function updateOnLaptopDist($data,$class,$school_id,$tname,$section,$acyear){
          //           // for($i=0;$i<count($data);$i++){ 
          //               $this->db->select($tname.'.id');//get id 
          //               $this->db->from($tname); //table name 
          //               if($section != '0'){
          //                  $this->db->join('students_child_detail','students_child_detail.id = '.$tname.'.student_id','LEFT');
          //                  $this->db->where('students_child_detail.class_section', $section);   
          //               }
          //               $this->db->where($tname.'.school_id',$school_id);//in which student row want to inactive 
          //               $this->db->where($tname.'.scheme_id',11); //along with student and scheme want to inactive means
          //               $this->db->where($tname.'.class',$class); //along with student and scheme want to inactive means
          //               $this->db->where($tname.'.acyear',$acyear);
          //               $this->db->where($tname.'.isactive', 1);   
                        
          //               $result = $this->db->get()->result();
          //           if(!empty($result)){
          //               for($i=0;$i<count($result);$i++){ 
          //                   $this->db->set('isactive', 0); //value that used to update column  
          //                   $this->db->where('id', $result[$i]->id); //which row want to upgrade  
          //                   $this->db->update($tname);  //table name
          //               }
          //           }

          //           if($data==null)return true;
          //           else return $this->db->insert_batch($tname, $data);
          //           // return 1;     
          //  }
          function saveLaptopDistDtls($data,$tname,$section){
            $flag = 0 ;
            if(!empty($data)){
              for($i=0;$i<count($data);$i++){ 
                $this->db->select($tname.'.id');//get id 
                $this->db->from($tname); //table name 
                if($section != '0'){
                  $this->db->join('students_child_detail','students_child_detail.id = '.$tname.'.student_id','LEFT');
                  $this->db->where('students_child_detail.class_section', $section);   
                }
                $this->db->where($tname.'.school_id',$data[$i]['school_id']);//in which student row want to inactive 
                $this->db->where($tname.'.acyear',$data[$i]['acyear']);
                $this->db->where($tname.'.class',$data[$i]['class']); //along with student and scheme want to inactive means
                $this->db->where($tname.'.student_id',$data[$i]['student_id']);   
                $id = $this->db->get()->row()->id;        
                if($id !=''){
                  $this->db->where('id',$id);
                  $this->db->update($tname,$data[$i]);
                  $this->db->affected_rows() > 0 ? $flag++ : '';
                }else{
                  $this->db->insert($tname,$data[$i]); 
                  // $insert_id = $this->db->insert_id();
                  $this->db->affected_rows() > 0 ? $flag++ : '';
                }       
                // print_r($this->db->last_query());
              }
              // if($flag>0) return true;
              // else return false;
              if($flag > 0) return 1 ;
              else return 2;
            }
            // else return false;
            else return 0;
          }
   
           function updateOnUniformIndent($where_arr,$data,$tname,$section){
               
            for($i=0;$i<count($where_arr);$i++){ 
                // console.log($where_arr[$i]);
                $this->db->select($tname.'.id');//get id 
                $this->db->from($tname); //table name 
                if($section != '0'){
                   $this->db->join('students_child_detail','students_child_detail.id = '.$tname.'.student_id','LEFT');
                   $this->db->where('students_child_detail.class_section', $section);   
                }
                // $this->db->where($where_arr[$i]);
                $this->db->where($tname.'.school_id',$where_arr[$i]['school_id']);//in which student row want to inactive 
                $this->db->where($tname.'.scheme_id',$where_arr[$i]['scheme_id']); //along with student and scheme want to inactive means
                $this->db->where($tname.'.class',$where_arr[$i]['class_id']); //along with student and scheme want to inactive means
                $this->db->where($tname.'.isactive',$where_arr[$i]['isactive']);   
                $this->db->where($tname.'.sets',$where_arr[$i]['sets']);   
                $this->db->where($tname.'.student_id',$where_arr[$i]['student_id']);   
                $id = $this->db->get()->row()->id;
                $this->db->set('isactive', 0); //value that used to update column  
                $this->db->where('id',$id); //which row want to upgrade  
                $this->db->update($tname);  //table name
            }

            if($data==null)return true;
            else{
                  $this->db->insert_batch($tname, $data);
                  return ($this->db->affected_rows() > 0) ? true : false;
            }

        }

            function insertOnSchemeIndent($data,$tname){
                if($data==null)return true;
                else{
                      $this->db->insert_batch($tname, $data);
                      return ($this->db->affected_rows() > 0) ? true : false;
                }
            }


            function UpdateHillSchemeDtls($data,$scheme_id,$class,$school_id,$tname,$student_id){
         
                            $this->db->select($tname.'.id');//get id 
                            $this->db->from($tname); //table name 
                            $this->db->where($tname.'.school_id',$school_id);//in which student row want to inactive 
                            $this->db->where($tname.'.scheme_id',$scheme_id); //along with student and scheme want to inactive means
                            $this->db->where($tname.'.student_id',$student_id);
                            $this->db->where($tname.'.isactive', 1);   
                            // print_r($this->db->last_query());
                            $result = $this->db->get()->result();
                            // print_r($result);
                            // die();
                            if(!empty($result)){
                                for($i=0;$i<count($result);$i++){ 
                                    $this->db->set('isactive', 0); //value that used to update column  
                                    $this->db->where('id', $result[$i]->id); //which row want to upgrade  
                                    $this->db->update($tname);  //table name
                                }
                            }
    
                            if($data==null)return true;
                            else return $this->db->insert_batch($tname, $data);
                

            }

            function UpdateSchemeDtls($data,$scheme_id,$class,$school_id,$tname,$student_id){
         
                $this->db->select($tname.'.id');//get id 
                $this->db->from($tname); //table name 
                $this->db->where($tname.'.school_id',$school_id);//in which student row want to inactive 
                $this->db->where($tname.'.scheme_id',$scheme_id); //along with student and scheme want to inactive means
                $this->db->where($tname.'.student_id',$student_id);
                $this->db->where($tname.'.isactive', 1);   
                $result = $this->db->get()->result();
                // print_r($result);
                // die();
                if(!empty($result)){
                    for($i=0;$i<count($result);$i++){ 
                        $this->db->set('isactive', 0); //value that used to update column  
                        $this->db->where('id', $result[$i]->id); //which row want to upgrade  
                        $this->db->update($tname);  //table name
                    }
                }

                if($data==null)return true;
                else return $this->db->insert_batch($tname, $data);
    
            }

            /** Textbook Distribution AJAX (QUERY) Functionality to load textbook data  : last mod - 29.07.2019(venba/ps) */
            // function gettextbookdtl($term,$medium){
            //     $this->db->select('id, book_id, book_name,medium,isactive');
            //     $this->db->from('schoolnew_textbooks_list');
            //     $this->db->where('schoolnew_textbooks_list.medium',$medium);
            //     $this->db->where('schoolnew_textbooks_list.term',$term); 
            //     $this->db->where('schoolnew_textbooks_list.isactive', 1);   
            //     $this->db->group_by('schoolnew_textbooks_list.book_id');
            //     $this->db->order_by('schoolnew_textbooks_list.book_id');

            //     $query = $this->db->get();
            //     $result = $query->result();
		    //     // print_r($this->db->last_query());
            //     return $result;
            //     // return $query->result_array();
            // }


            /** Textbook Distribution AJAX (QUERY) Functionality to load textbook data  : last mod - 29.07.2019(venba/ps) */
            // function getclasswisetextbookdtl($class,$medium){
            //     $this->db->select('id, book_id, book_name,medium,isactive');
            //     $this->db->from('schoolnew_textbooks_list');
            //     $this->db->where('schoolnew_textbooks_list.medium',$medium);
            //     $this->db->where('schoolnew_textbooks_list.term',0); 
            //     $this->db->where('schoolnew_textbooks_list.class',$class); 
            //     $this->db->where('schoolnew_textbooks_list.isactive', 1);   
            //     $this->db->group_by('schoolnew_textbooks_list.book_id');
            //     $this->db->order_by('schoolnew_textbooks_list.book_id');

            //     $query = $this->db->get();
            //     $result = $query->result();
            //     return $result;
            //     // return $query->result_array();
            // }

            /** Textbook Distribution(QUERY) Functionality to load all textbook data  : last mod - 29.07.2019(venba/ps) */
            function getListAllTextBookDtl(){
                $this->db->select('id, book_id, book_name,medium,term,isactive');
                $this->db->from('schoolnew_textbooks_list');
                $this->db->where('schoolnew_textbooks_list.isactive', 1);   
                $this->db->group_by('schoolnew_textbooks_list.book_id');
                $this->db->order_by('schoolnew_textbooks_list.book_id');
                $query = $this->db->get();
                $result = $query->result();
                return $result;
            }


        
              public function ptmgr_noon_meal_program($school_id)
  {
    //print_r($school_id);
      $sql="select students_school_child_count.school_id,students_school_child_count.school_name,students_school_child_count.district_id,dob,gender,unique_id_no,schoolnew_schemeindent.student_id,students_child_detail.name,students_child_detail.class_studying_id,baseapp_community.community_name,students_child_detail.class_section 
FROM students_school_child_count
join students_child_detail on  students_child_detail.school_id =  students_school_child_count.school_id
join schoolnew_schemeindent ON schoolnew_schemeindent.student_id= students_child_detail.id
join baseapp_community on baseapp_community.id =students_child_detail.community_id
where schoolnew_schemeindent.scheme_id=15 and students_school_child_count.school_type_id in (1 ,2) and students_child_detail.school_id=".$school_id." and schoolnew_schemeindent.unique_supply = 1 and schoolnew_schemeindent.isactive = 1 group by schoolnew_schemeindent.student_id";
     $query = $this->db->query($sql);
    // print_r($this->db->last_query());
       return $query->result();  
  }
       public function noon_meal_program_not_opt($school_id)
  {
    //print_r($school_id);
      $sql="select students_school_child_count.school_id,students_school_child_count.school_name,students_school_child_count.district_id,dob,gender,unique_id_no,schoolnew_schemeindent.student_id,students_child_detail.name,students_child_detail.class_studying_id,baseapp_community.community_name,students_child_detail.class_section FROM students_school_child_count join students_child_detail on students_child_detail.school_id = students_school_child_count.school_id
       join schoolnew_schemeindent ON schoolnew_schemeindent.student_id= students_child_detail.id 
       join baseapp_community on baseapp_community.id =students_child_detail.community_id
       where schoolnew_schemeindent.scheme_id=15 and students_school_child_count.school_type_id in (1 ,2) and students_child_detail.school_id=".$school_id." and schoolnew_schemeindent.unique_supply in (0,null) and schoolnew_schemeindent.isactive=1 group by schoolnew_schemeindent.student_id";
     $query = $this->db->query($sql);
    // print_r($this->db->last_query());
       return $query->result();  
  }

  
// SELECT * FROM tnschools_working.students_school_child_count;

	public function baseapp_rte_type()
        {
		  $sql=	"SELECT  id,category,sub_category FROM baseapp_rte_type";
		      $query = $this->db->query($sql);
              return $query->result();
        }
		public function baseapp_differently_abled()
        {
		    $sql=	"select da_code,da_name from  baseapp_differently_abled";
		    $query = $this->db->query($sql);
            return $query->result();
		}
		public function rte($school_id,$classnumber,$sectionname)
		{
			$sql="select id,child_admitted_under_reservation from students_child_detail where school_id =".$school_id."  and  class_studying_id =".$classnumber."  and class_section ='".$sectionname."' ";
			 $query = $this->db->query($sql);
            return $query->result();
		}
		
	    public function getscheme_search_stud($school_id,$classnumber,$sectionname)
		{
			$sql="select unique_id_no,name,students_child_detail.gender,differently_abled,child_admitted_under_reservation,rte_type,class_section,class_studying_id,baseapp_rte_type.id ,da_name ,baseapp_rte_type.category,sub_category,trstse, nmmsexam_passed, inspire,remarks,school_type_id, national_id, differently_type, students_ied.benefit, provided_by, acad_year,student_ied_benefits.benefit as bf,game_participating,last_participating_date,last_participating_level,winner_level_details  from students_child_detail
 left join baseapp_differently_abled on baseapp_differently_abled.da_code=students_child_detail.differently_abled
 left join baseapp_rte_type on baseapp_rte_type.id = students_child_detail.rte_type 
join students_school_child_count on students_school_child_count.school_id = students_child_detail.school_id 
left join student_scholor_nmms on student_scholor_nmms.school_id = students_child_detail.school_id and student_scholor_nmms.student_id = students_child_detail.unique_id_no 

left join students_ied on students_ied.school_id = students_child_detail.school_id and students_ied.student_id = students_child_detail.unique_id_no
left join  student_ied_benefits on student_ied_benefits.id  =students_ied.benefit
			
left join student_scholor_sports_participation on student_scholor_sports_participation.school_id = students_child_detail.school_id and student_scholor_sports_participation.student_id = students_child_detail.unique_id_no
where students_child_detail.school_id =".$school_id."  and  students_child_detail.class_studying_id =".$classnumber."  and students_child_detail.class_section ='".$sectionname."' and  transfer_flag =0 group by students_child_detail.unique_id_no ";
//echo $sql;
 $query = $this->db->query($sql);
            return $query->result();
		}
    public function getscheme_search_stud1($school_id,$classnumber,$sectionname)
    {

      $sql="select unique_id_no,name,gender,differently_abled,child_admitted_under_reservation,rte_type,class_section,class_studying_id,baseapp_rte_type.id ,da_name ,baseapp_rte_type.category,sub_category,trstse, nmmsexam_passed, inspire,remarks,school_type_id,game_participating,last_participating_date,last_participating_level,winner_level_details from students_child_detail 
	  left join baseapp_differently_abled on baseapp_differently_abled.da_code=students_child_detail.differently_abled left join baseapp_rte_type on baseapp_rte_type.id = students_child_detail.rte_type join students_school_child_count on students_school_child_count.school_id = students_child_detail.school_id
left join student_scholor_nmms on student_scholor_nmms.school_id = students_child_detail.school_id and student_scholor_nmms.student_id = students_child_detail.unique_id_no
left join student_scholor_sports_participation on student_scholor_sports_participation.school_id = students_child_detail.school_id and student_scholor_sports_participation.student_id = students_child_detail.unique_id_no
where students_child_detail.school_id =".$school_id."  and transfer_flag =0";
//echo $sql;
 $query = $this->db->query($sql);
            return $query->result();
  
    }
		
	    public function studsch_stud_tagging($data)
		{
          $this->db->insert('student_scholor_nmms',$data); 
     return $this->db->insert_id(); 
            // print_r($data);
			//$result = $this->db->get_where('student_scholor_nmms',array('school_id'=>$data['school_id'],'student_id'=>$data['student_id']))->first_row();
			//print_r($result);
			 
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
		
		public function studchild_stud_tagging($data)
		{
			  // print_r($data);
			$result = $this->db->get_where('students_child_detail',array('school_id'=>$data['school_id'],'unique_id_no'=>$data['unique_id_no']))->first_row();
			//print_r($result);
			 
		 if(!empty($result))
		 {
				
		    $this->db->where(array('unique_id_no'=>$data['unique_id_no'],'school_id'=>$data['school_id']));
			
	      	$this->db->update('students_child_detail',$data);

			return $data['school_id'];

		 }else
		 {
				
			$this->db->insert('students_child_detail',$data);
			return $this->db->insert_id();
		 }
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
	   
	   public function group_names()
	   {
		   $this->db->select('group_code,group_name');
		   $this->db->from('baseapp_group_code');
		   $query = $this->db->get();
           $result = $query->result();
		    // print_r($this->db->last_query());
		    return $result;
			
			
	   }
     public function get_school_student_migration($block_id)
{

  $SQL="SELECT udise_code,phone_number,father_name,block_name,block_id,name,school_type,school_name,gender,students_transfer_history.class_studying_id,students_child_detail.unique_id_no,students_transfer_history.id,(CASE WHEN transfer_reason=1 THEN 'Long Absent' ELSE 
   CASE WHEN transfer_reason=2 THEN 'Transfer Request by Parents' ELSE
     CASE WHEN transfer_reason=3 THEN 'Terminal Class' ELSE 
     CASE WHEN transfer_reason=4 THEN 'Dropped Out' ELSE 
     CASE WHEN transfer_reason=5 THEN 'Student Died' ELSE 
     CASE WHEN transfer_reason=6 THEN 'Duplicate EMIS Entry' 
     END 
     END 
     END 
     END 
     END 
     END) AS Reason,remarks 
FROM students_child_detail 
JOIN students_transfer_history ON students_transfer_history.unique_id_no=students_child_detail.unique_id_no LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id AND students_transfer_history.school_id_transfer WHERE students_school_child_count.block_id=".$block_id." AND students_transfer_history.school_id_admit IS NULL AND students_transfer_history.class_studying_id!=12 group by students_child_detail.unique_id_no";

  
         $query = $this->db->query($SQL);
         //print_r($this->db->last_query());
       return $query->result(); 
}
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


  /**************************** End *******************************/

  /************************* Attendance Report For school Classwise *****************/

   /**
     * Get Attendance Classwise
     * VIT-sriram
     * 29/07/2019
     **/
     public function get_attendance_classwise_details($school_id,$date,$table)
     {
        $this->db->select('low_class,high_class');
        $result = $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();
        // print_r($result->low_class);
        $select_arr = [];
     $select_len = [];
        if(!empty($result)){
       if($result->low_class == 15)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($select_len, $i);

          array_push($select_arr, ('(Prkg_b+Prkg_g+Prkg_t) as Prkg'),('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class == 13)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($select_len, $i);

          array_push($select_arr,('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class !=0 && $result->high_class !=0)
        {
          for($i=$result->low_class;$i<=$result->high_class;$i++)
      {
        // array_push($select_len, $i);

          array_push($select_arr, ('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else
        {
          array_push($select_arr,'*');
        }
        
      }

      // print_r($select_arr);

      $select_query = implode(",", $select_arr);
      $this->db->select($select_query);
      
     $school_details =  $this->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();

      

        $classwise = [];
          // print_r($result->low_class);
          // print_r($school_att_details);

if($result->low_class == 15)
        {

              $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,15,$school_details,$date,$table);

            array_push($classwise,$temparr);


         // echo $result->low_class;
        $k = sizeof($classwise);

          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k+1;
        // echo $i;
         
              $classwise[$k] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
        
      }
      
        }else if($result->low_class == 13)
        { 

          $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
        
        $k = sizeof($classwise);
        // echo $result->low_class;
          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k;
        // echo $k;
         
              $classwise[$k] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
              $k = $k+1;
        
      }
          
      }else
      {

        
            // $classwise = [];
            for($i=$result->low_class;$i<=$result->high_class;$i++)
          {   

              // $class = 'c'.$i;
            
                
              $classwise[$i] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);

           
      
          }

       
        
     }
        // echo "<pre>";print_r($classwise);echo"</pre>";
        return $classwise;

   }
     function class_details($school_id)
   {
        $this->db->select('class_id');
        $this->db->from('schoolnew_section_group');
        $this->db->where('school_key_id',$school_id);
        $this->db->where('class_id <= 8');
        $this->db->group_by('class_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;  
   }
     public function get_attendance_class_details($school_id,$class_id,$school_info,$date,$table)
     {
      // echo $class_id;
      $this->db->select('sum(session1_allP) as present,sum(session1_allA) as absent,st_class,sum(session1_maleP) as male_present,sum(session1_femaleP) as female_present,sum(session1_maleA) as male_Absent,sum(session1_femaleA) as female_Absent');
        $this->db->from($table);
        $this->db->where('date',date('Y-m-d',strtotime($date)));
        $this->db->where('school_id',$school_id);
        $this->db->where('st_class',$class_id);
        // $this->db->group_by('st_class');
        $result  = $this->db->get()->first_row();
        // print_r($this->db->last_query());
        // echo $class_id;
        if($class_id==13)
        {
          $class = 'lkg';
        }else if($class_id==14)
        {
          $class = 'ukg';
        }else if($class_id==15)
        {
          $class = 'Prkg';
        }else
        {

        $class = 'c'.$class_id;
        }
        // print_r($result);
        $classwise['total_class'] = $school_info->$class;
        if(!empty($result->st_class)){
        $classwise['class'] = $result->st_class;
        $classwise['present'] = $result->present;
        $classwise['male_present'] = $result->male_present;
        $classwise['female_present'] = $result->female_present;
        $classwise['absent'] = $result->absent;
        $classwise['male_absent'] = $result->male_Absent;
        $classwise['female_absent'] = $result->female_Absent;


        }else
        {
          // echo $class_id;
        $classwise['class'] = $class_id;
        $classwise['present'] = 0;
        $classwise['male_present'] = 0;
        $classwise['female_present'] = 0;
        $classwise['absent'] = 0;
        $classwise['male_absent'] = 0;
        $classwise['female_absent'] = 0;
        }
        // print_r($classwise);
        return $classwise;
     }


     /** 
       * Sectionwise Count
       * VIT-sriram
       * 09/08/2019
      **/
     public function get_attendance_class_sectionwise_details($school_id,$class_id,$table)
     {
      // echo $class_id;
      $this->db->select('st_section,sum(session1_allP) as present,sum(session1_allA) as absent,st_class,sum(session1_maleP) as male_present,sum(session1_femaleP) as female_present,sum(session1_maleA) as male_Absent,sum(session1_femaleA) as female_Absent');
        $this->db->from($table);
        $this->db->where('date',date('Y-m-d'));
        $this->db->where('school_id',$school_id);
        $this->db->where('st_class',$class_id);
        $this->db->group_by('st_section');
        $result  = $this->db->get()->result();
        
        return $result;
     }
	 //header model by raju
	  public function user_header($type,$usertype)
	   {
		
	   }
	 
	public function  emis_school_Laptops_Pervious_Year_Distribution12_details($school_id)
	{
		$sql ="select    students_child_detail.id,students_child_detail.name,students_child_detail.class_studying_id ,students_child_detail.class_section,students_child_detail.gender,students_child_detail.unique_id_no,isactive, scheme_id, scheme_category, student_id, indent_date, distribution_date, unique_supply,students_child_detail.school_id
  from students_child_detail
   left join schoolnew_computerindent on schoolnew_computerindent.student_id =students_child_detail.id
  where schoolnew_computerindent.scheme_id = 11 and students_child_detail.school_id  =".$school_id." and isactive =1 and class_studying_id =12 and transfer_flag=1";
    $query = $this->db->query($sql);
       return $query->result(); 
	}

  public function db_check()
  {
        $prod_db = $this->load->database('prod',TRUE);
        echo"<pre>";print_r($prod_db);echo"</pre>";

        $this->db->select('*')
                 ->from('tnschools_working.emisuser_teacher a')
                 ->join($prod_db->database.'.lms_user b','b.username = a.emis_username','left')
                 ->where('b.auth','db')
                 ->limit('10');
        $result = $this->db->get()->result();

        echo"<pre>";print_r($result);echo"</pre>";
  } 
  //pearlin  
  public function stud_community_report($school)
  {
  $sql="select  school_id, students_community_school_count.community_code, Prkg_b, Prkg_g, lkg_b, lkg_g, ukg_b, ukg_g, c1_b, c1_g, c2_b, c2_g,  c3_b, c3_g, c4_b, c4_g, c5_b, c5_g,  c6_b, c6_g,  c7_b, c7_g,  c8_b, c8_g, c9_b, c9_g,  c10_b, c10_g,  c11_b, c11_g,  c12_b, c12_g,  total_b, total_g,total_t, community_name from students_community_school_count 
    join baseapp_community on baseapp_community.community_code =students_community_school_count.community_code
    where school_id =".$school." 
    group by community_name";
 $query = $this->db->query($sql);
			return $query->result();
			}
      public function stud_aadhar_report($school)
  {
  $sql="select count(*) as total,
sum(class_studying_id=15 AND gender=1) as PREKG_b,sum(class_studying_id=15 AND gender=2) as PREKG_g,
sum(class_studying_id=14 AND gender=1) as UKG_b,sum(class_studying_id=14 AND gender=2) as UKG_g,
sum(class_studying_id=13 AND gender=1) as LKG_b,sum(class_studying_id=13 AND gender=2) as LKG_g,
SUM(class_studying_id=1 AND gender=1) as c1_b,SUM(class_studying_id=1 AND gender=2) as c1_g,
SUM(class_studying_id=2 AND gender=1) as c2_b,SUM(class_studying_id=2 AND gender=2) as c2_g, 
SUM(class_studying_id=3 AND gender=1) as c3_b, SUM(class_studying_id=3 AND gender=2) as c3_g,
SUM(class_studying_id=4 AND gender=1) as c4_b,SUM(class_studying_id=4 AND gender=2) as c4_g, 
SUM(class_studying_id=5 AND gender=1) as c5_b, SUM(class_studying_id=5 AND gender=2) as c5_g,
SUM(class_studying_id=6 AND gender=1) as c6_b,SUM(class_studying_id=6 AND gender=2) as c6_g,
SUM(class_studying_id=7 AND gender=1) as c7_b,SUM(class_studying_id=7 AND gender=2) as c7_g,
SUM(class_studying_id=8 AND gender=1) as c8_b,SUM(class_studying_id=8 AND gender=2) as c8_g,
 SUM(class_studying_id=9 AND gender=1) as c9_b, SUM(class_studying_id=9 AND gender=2) as c9_g,
 SUM(class_studying_id=10 AND gender=1) as c10_b,SUM(class_studying_id=10 AND gender=2) as c10_g,
 SUM(class_studying_id=11 AND gender=1) as c11_b,SUM(class_studying_id=11 and gender=2) as c11_g,
 SUM(class_studying_id=12 AND gender=1) as c12_b,SUM(class_studying_id=12 AND gender=2) as c12_g  from students_child_detail where school_id=".$school." and transfer_flag=0 and aadhaar_uid_number is not null
";
 $query = $this->db->query($sql);
      return $query->result();
      }
       public function stud_BPL_report($school)
  {
  $sql="select count(*) as total,
sum(class_studying_id=15 AND gender=1) as PREKG_b,sum(class_studying_id=15 AND gender=2) as PREKG_g,
sum(class_studying_id=14 AND gender=1) as UKG_b,sum(class_studying_id=14 AND gender=2) as UKG_g,
sum(class_studying_id=13 AND gender=1) as LKG_b,sum(class_studying_id=13 AND gender=2) as LKG_g,
SUM(class_studying_id=1 AND gender=1) as c1_b,SUM(class_studying_id=1 AND gender=2) as c1_g,
SUM(class_studying_id=2 AND gender=1) as c2_b,SUM(class_studying_id=2 AND gender=2) as c2_g, 
SUM(class_studying_id=3 AND gender=1) as c3_b, SUM(class_studying_id=3 AND gender=2) as c3_g,
SUM(class_studying_id=4 AND gender=1) as c4_b,SUM(class_studying_id=4 AND gender=2) as c4_g, 
SUM(class_studying_id=5 AND gender=1) as c5_b, SUM(class_studying_id=5 AND gender=2) as c5_g,
SUM(class_studying_id=6 AND gender=1) as c6_b,SUM(class_studying_id=6 AND gender=2) as c6_g,
SUM(class_studying_id=7 AND gender=1) as c7_b,SUM(class_studying_id=7 AND gender=2) as c7_g,
SUM(class_studying_id=8 AND gender=1) as c8_b,SUM(class_studying_id=8 AND gender=2) as c8_g,
 SUM(class_studying_id=9 AND gender=1) as c9_b, SUM(class_studying_id=9 AND gender=2) as c9_g,
 SUM(class_studying_id=10 AND gender=1) as c10_b,SUM(class_studying_id=10 AND gender=2) as c10_g,
 SUM(class_studying_id=11 AND gender=1) as c11_b,SUM(class_studying_id=11 and gender=2) as c11_g,
 SUM(class_studying_id=12 AND gender=1) as c12_b,SUM(class_studying_id=12 AND gender=2) as c12_g  from students_child_detail where transfer_flag=0 and school_id=".$school." and parent_income in (1,2,3,4,5)
";
 $query = $this->db->query($sql);
      return $query->result();
      }
       public function stud_voc_nsqf_report($school)
  {
  $sql="select sum(case when students_child_detail.gender=1 then 1 else 0 end) as cnt_b,sum(case when students_child_detail.gender=2 then 1 else 0 end) as cnt_g,nsq_job_role,(select job_role from student_nsqf_job_roles where student_nsqf_job_roles.id=student_vocational.nsq_job_role limit 1) as job_role ,nsqf_sector, (select sector from student_nsqf_sector where student_nsqf_sector.id=student_vocational.nsqf_sector limit 1) as job_sector ,student_vocational.unique_id_no,
sum(student_vocational.class_studying_id=15 AND student_vocational.gender=1) as PREKG_b,sum(student_vocational.class_studying_id=15 AND student_vocational.gender=2) as PREKG_g,
sum(student_vocational.class_studying_id=14 AND student_vocational.gender=1) as UKG_b,sum(student_vocational.class_studying_id=14 AND student_vocational.gender=2) as UKG_g,
sum(student_vocational.class_studying_id=13 AND student_vocational.gender=1) as LKG_b,sum(student_vocational.class_studying_id=13 AND student_vocational.gender=2) as LKG_g,
SUM(student_vocational.class_studying_id=1 AND student_vocational.gender=1) as c1_b,SUM(student_vocational.class_studying_id=1 AND student_vocational.gender=2) as c1_g,
SUM(student_vocational.class_studying_id=2 AND student_vocational.gender=1) as c2_b,SUM(student_vocational.class_studying_id=2 AND student_vocational.gender=2) as c2_g, 
SUM(student_vocational.class_studying_id=3 AND student_vocational.gender=1) as c3_b, SUM(student_vocational.class_studying_id=3 AND student_vocational.gender=2) as c3_g,
SUM(student_vocational.class_studying_id=4 AND student_vocational.gender=1) as c4_b,SUM(student_vocational.class_studying_id=4 AND student_vocational.gender=2) as c4_g, 
SUM(student_vocational.class_studying_id=5 AND student_vocational.gender=1) as c5_b, SUM(student_vocational.class_studying_id=5 AND student_vocational.gender=2) as c5_g,
SUM(student_vocational.class_studying_id=6 AND student_vocational.gender=1) as c6_b,SUM(student_vocational.class_studying_id=6 AND student_vocational.gender=2) as c6_g,
SUM(student_vocational.class_studying_id=7 AND student_vocational.gender=1) as c7_b,SUM(student_vocational.class_studying_id=7 AND student_vocational.gender=2) as c7_g,
SUM(student_vocational.class_studying_id=8 AND student_vocational.gender=1) as c8_b,SUM(student_vocational.class_studying_id=8 AND student_vocational.gender=2) as c8_g,
 SUM(student_vocational.class_studying_id=9 AND student_vocational.gender=1) as c9_b, SUM(student_vocational.class_studying_id=9 AND student_vocational.gender=2) as c9_g,
 SUM(student_vocational.class_studying_id=10 AND student_vocational.gender=1) as c10_b,SUM(student_vocational.class_studying_id=10 AND student_vocational.gender=2) as c10_g,
 SUM(student_vocational.class_studying_id=11 AND student_vocational.gender=1) as c11_b,SUM(student_vocational.class_studying_id=11 and student_vocational.gender=2) as c11_g,
 SUM(student_vocational.class_studying_id=12 AND student_vocational.gender=1) as c12_b,SUM(student_vocational.class_studying_id=12 AND student_vocational.gender=2) as c12_g 
from student_vocational left join students_child_detail on students_child_detail.unique_id_no=student_vocational.unique_id_no where school_key_id=".$school." and nsqf_sector!='' and nsq_job_role!='' group by nsqf_sector,nsq_job_role,student_vocational.unique_id_no;";
 $query = $this->db->query($sql);
 //print_r($sql);
      return $query->result();
      }
         public function stud_cwsn_report($school)
  {
  $sql="select (select benefit from student_ied_benefits where students_ied.benefit=student_ied_benefits.id) as benefit,count(student_id) as cnt ,
sum(students_child_detail.class_studying_id=15 AND students_child_detail.gender=1) as PREKG_b,sum(students_child_detail.class_studying_id=15 AND students_child_detail.gender=2) as PREKG_g,
sum(students_child_detail.class_studying_id=14 AND students_child_detail.gender=1) as UKG_b,sum(students_child_detail.class_studying_id=14 AND students_child_detail.gender=2) as UKG_g,
sum(students_child_detail.class_studying_id=13 AND students_child_detail.gender=1) as LKG_b,sum(students_child_detail.class_studying_id=13 AND students_child_detail.gender=2) as LKG_g,
SUM(students_child_detail.class_studying_id=1 AND students_child_detail.gender=1) as c1_b,SUM(students_child_detail.class_studying_id=1 AND students_child_detail.gender=2) as c1_g,
SUM(students_child_detail.class_studying_id=2 AND students_child_detail.gender=1) as c2_b,SUM(students_child_detail.class_studying_id=2 AND students_child_detail.gender=2) as c2_g, 
SUM(students_child_detail.class_studying_id=3 AND students_child_detail.gender=1) as c3_b, SUM(students_child_detail.class_studying_id=3 AND students_child_detail.gender=2) as c3_g,
SUM(students_child_detail.class_studying_id=4 AND students_child_detail.gender=1) as c4_b,SUM(students_child_detail.class_studying_id=4 AND students_child_detail.gender=2) as c4_g, 
SUM(students_child_detail.class_studying_id=5 AND students_child_detail.gender=1) as c5_b, SUM(students_child_detail.class_studying_id=5 AND students_child_detail.gender=2) as c5_g,
SUM(students_child_detail.class_studying_id=6 AND students_child_detail.gender=1) as c6_b,SUM(students_child_detail.class_studying_id=6 AND students_child_detail.gender=2) as c6_g,
SUM(students_child_detail.class_studying_id=7 AND students_child_detail.gender=1) as c7_b,SUM(students_child_detail.class_studying_id=7 AND students_child_detail.gender=2) as c7_g,
SUM(students_child_detail.class_studying_id=8 AND students_child_detail.gender=1) as c8_b,SUM(students_child_detail.class_studying_id=8 AND students_child_detail.gender=2) as c8_g,
 SUM(students_child_detail.class_studying_id=9 AND students_child_detail.gender=1) as c9_b, SUM(students_child_detail.class_studying_id=9 AND students_child_detail.gender=2) as c9_g,
 SUM(students_child_detail.class_studying_id=10 AND students_child_detail.gender=1) as c10_b,SUM(students_child_detail.class_studying_id=10 AND students_child_detail.gender=2) as c10_g,
 SUM(students_child_detail.class_studying_id=11 AND students_child_detail.gender=1) as c11_b,SUM(students_child_detail.class_studying_id=11 and students_child_detail.gender=2) as c11_g,
 SUM(students_child_detail.class_studying_id=12 AND students_child_detail.gender=1) as c12_b,SUM(students_child_detail.class_studying_id=12 AND students_child_detail.gender=2) as c12_g 
from students_ied
left join students_child_detail on students_child_detail.unique_id_no=students_ied.student_id
 where students_child_detail.school_id=66 and benefit!='' group by benefit;";
 $query = $this->db->query($sql);
      return $query->result();
      }
       public function stud_religion_report($school_id)
  {
    $sql="select count(*) as total,(select religion_name from baseapp_religion where baseapp_religion.id=students_child_detail.religion_id limit 1) as religion,sum(class_studying_id=15 AND gender=1) as PREKG_b,sum(class_studying_id=15 AND gender=2) as PREKG_g,sum(class_studying_id=14 AND gender=1) as UKG_b,sum(class_studying_id=14 AND gender=2) as UKG_g,sum(class_studying_id=13 AND gender=1) as LKG_b,sum(class_studying_id=13 AND gender=2) as LKG_g,SUM(class_studying_id=1 AND gender=1) as c1_b,SUM(class_studying_id=1 AND gender=2) as c1_g,SUM(class_studying_id=2 AND gender=1) as c2_b,SUM(class_studying_id=2 AND gender=2) as c2_g, SUM(class_studying_id=3 AND gender=1) as c3_b, SUM(class_studying_id=3 AND gender=2) as c3_g,SUM(class_studying_id=4 AND gender=1) as c4_b,SUM(class_studying_id=4 AND gender=2) as c4_g, SUM(class_studying_id=5 AND gender=1) as c5_b, SUM(class_studying_id=5 AND gender=2) as c5_g,SUM(class_studying_id=6 AND gender=1) as c6_b,SUM(class_studying_id=6 AND gender=2) as c6_g,SUM(class_studying_id=7 AND gender=1) as c7_b,SUM(class_studying_id=7 AND gender=2) as c7_g,SUM(class_studying_id=8 AND gender=1) as c8_b,SUM(class_studying_id=8 AND gender=2) as c8_g, SUM(class_studying_id=9 AND gender=1) as c9_b, SUM(class_studying_id=9 AND gender=2) as c9_g,SUM(class_studying_id=10 AND gender=1) as c10_b,SUM(class_studying_id=10 AND gender=2) as c10_g, SUM(class_studying_id=11 AND gender=1) as c11_b,SUM(class_studying_id=11 and gender=2) as c11_g,SUM(class_studying_id=12 AND gender=1) as c12_b,SUM(class_studying_id=12 AND gender=2) as c12_g  from students_child_detail where school_id=".$school_id." and transfer_flag=0 group by religion_id;";
 $query = $this->db->query($sql);
      return $query->result();
      }
       public function get_report_age($school_id)
  {
  $sql="select count(*) as tot,TIMESTAMPDIFF(YEAR,DOB,CURDATE()) AS Age,
sum(class_studying_id=15 AND gender=1) as PREKG_b,sum(class_studying_id=15 AND gender=2) as PREKG_g,
sum(class_studying_id=14 AND gender=1) as UKG_b,sum(class_studying_id=14 AND gender=2) as UKG_g,
sum(class_studying_id=13 AND gender=1) as LKG_b,sum(class_studying_id=13 AND gender=2) as LKG_g,
SUM(class_studying_id=1 AND gender=1) as c1_b,SUM(class_studying_id=1 AND gender=2) as c1_g,
SUM(class_studying_id=2 AND gender=1) as c2_b,SUM(class_studying_id=2 AND gender=2) as c2_g, 
SUM(class_studying_id=3 AND gender=1) as c3_b, SUM(class_studying_id=3 AND gender=2) as c3_g,
SUM(class_studying_id=4 AND gender=1) as c4_b,SUM(class_studying_id=4 AND gender=2) as c4_g, 
SUM(class_studying_id=5 AND gender=1) as c5_b, SUM(class_studying_id=5 AND gender=2) as c5_g,
SUM(class_studying_id=6 AND gender=1) as c6_b,SUM(class_studying_id=6 AND gender=2) as c6_g,
SUM(class_studying_id=7 AND gender=1) as c7_b,SUM(class_studying_id=7 AND gender=2) as c7_g,
SUM(class_studying_id=8 AND gender=1) as c8_b,SUM(class_studying_id=8 AND gender=2) as c8_g,
SUM(class_studying_id=9 AND gender=1) as c9_b, SUM(class_studying_id=9 AND gender=2) as c9_g,
SUM(class_studying_id=10 AND gender=1) as c10_b,SUM(class_studying_id=10 AND gender=2) as c10_g,
SUM(class_studying_id=11 AND gender=1) as c11_b,SUM(class_studying_id=11 and gender=2) as c11_g,
SUM(class_studying_id=12 AND gender=1) as c12_b,SUM(class_studying_id=12 AND gender=2) as c12_g 
from students_child_detail where transfer_flag=0 and school_id=".$school_id." group by TIMESTAMPDIFF(YEAR,DOB,CURDATE());";
 $query = $this->db->query($sql);
      return $query->result();
      }
   public function updatetemplog($emissno){
        return $this->db->update('emis_userlogin', array('temp_log1' =>2), "sno = ".$emissno);
   }
   
   //indent summary raj
	public function uniform_indentboy($scheme,$dist,$set,$tname)
	{ 
		if(!empty($dist))
		{
			
			$d =" block_id,block_name,".$tname;
			$s = "and sets=".$set."";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		}
		
		else if(!empty($scheme))
		{    
            // echo "students_school_child_count.district_id,district_name,".$tname;
	        $s = "  " ;
			$d ="students_school_child_count.district_id,district_name,"; 
			$where ="group by students_school_child_count.district_id order by district_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.district_id,district_name,".$tname; 
			$s = "and sets=".$set."";
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
        }

		$sql="select ".$d.$tname.".scheme_id,sets,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE IV' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE V' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='SIZE VI' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS bset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS bset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS bset10_count
  from ".$tname." 
JOIN students_child_detail ON students_child_detail.id=".$tname.".student_id   and students_child_detail.school_id = ".$tname.".school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
     JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
     where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 ) ".$where ." ";
	// echo $sql;
		$query = $this->db->query($sql);
		
			return $query->result();
	}
		public function uniform_indentgirl($scheme,$dist,$set,$tname)
	{
		if(!empty($dist))
		{
			
			$d =" block_id,block_name,";
			$s = "and sets=".$set."";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		}
		
		else if(!empty($scheme))
		{    
	        $s = "  " ;
			$d =" students_school_child_count.district_id,district_name,"; 
			$where ="group by students_school_child_count.district_id order by district_name asc";
		}
		
		else{
			$scheme =1;
			$d =" students_school_child_count.district_id,district_name,"; 
			$s = "and sets=".$set."";
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		$sql="select ".$d.$tname.".scheme_id,sets,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END END ) AS girls_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS gset1_count, 
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS gset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS gset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE IV' THEN 1 ELSE 0 END END ) AS gset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE V' THEN 1 ELSE 0 END END ) AS gset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS gset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VI' THEN 1 ELSE 0 END END ) AS gset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS gset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS gset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS gset10_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=3 THEN 1 ELSE 0 END END ) AS trans_count
  from ".$tname." 
JOIN students_child_detail ON students_child_detail.id=".$tname.".student_id   and students_child_detail.school_id = ".$tname.".school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
     JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
     where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0  and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 )  ".$where ." ";
		$query = $this->db->query($sql);
			return $query->result();
	}
	
	public function uniform_indentsboy($scheme,$blk,$set,$tname)
	{
	  if(!empty($blk))
		{
			$d="school_name,";
			$s = "and sets=".$set."";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		$sql="select ".$d." ".$tname.".scheme_id,sets,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE IV' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'SIZE V' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='SIZE VI' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS bset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS bset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS bset10_count

  from ".$tname." 
JOIN students_child_detail ON students_child_detail.id=".$tname.".student_id  and students_child_detail.school_id = ".$tname.".school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
     JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
     where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null  and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 ) ".$where ." ";
		$query = $this->db->query($sql);
			return $query->result();
	}
	public function uniform_indentsgirl($scheme,$blk,$set,$tname)
	{
	  if(!empty($blk))
		{
			$d="school_name,";
			$s = "and sets=".$set."";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		$sql="select ".$d." ".$tname.".scheme_id,sets,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=2 THEN 1 ELSE 0 END END ) AS girls_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE I' THEN 1 ELSE 0 END END ) AS gset1_count, 
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE II' THEN 1 ELSE 0 END END ) AS gset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE III' THEN 1 ELSE 0 END END ) AS gset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE IV' THEN 1 ELSE 0 END END ) AS gset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE V' THEN 1 ELSE 0 END END ) AS gset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE PRIMARY' THEN 1 ELSE 0 END END ) AS gset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VI' THEN 1 ELSE 0 END END ) AS gset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE VII' THEN 1 ELSE 0 END END ) AS gset8_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='SIZE VIII' THEN 1 ELSE 0 END END ) AS gset9_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'SIZE LARGE UPPER PRIMARY' THEN 1 ELSE 0 END END ) AS gset10_count
  from ".$tname." 
JOIN students_child_detail ON students_child_detail.id=".$tname.".student_id   and students_child_detail.school_id = ".$tname.".school_id
  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
    JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
    where  ".$tname.".scheme_id =".$scheme." and ".$tname.".isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  ".$s." and distribution_date is null and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 )  ".$where ." ";
		$query = $this->db->query($sql);
			return $query->result();
	}
	public function footwear_indentboy($scheme,$dist,$blk)
	{  
	    if(!empty($dist))
		{
			
			$d =" block_id,block_name,";
			
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		}
		else if(!empty($scheme))
		{
			$d="students_school_child_count.district_id,district_name,";
			$where ="group by students_school_child_count.district_id order by district_name asc";
		}
		else if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else{
			$scheme =2;
			$d =" students_school_child_count.district_id,district_name,"; 
			
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		
		$sql="select ".$d." ".$tname.".scheme_id,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,

SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count,
SUM(CASE WHEN ".$tname.".student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=".$tname.".scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS bset15_count

  from ".$tname." 
  JOIN students_child_detail ON students_child_detail.id=".$tname.".student_id   and students_child_detail.school_id = ".$tname.".school_id
   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=".$tname.".scheme_id AND schoolnew_schemedetail.id=".$tname.".scheme_category
where  ".$tname.".scheme_id=".$scheme."  and ".$tname.".isactive =1  and   class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 )
  ".$where."";
  $query = $this->db->query($sql);
			return $query->result();
	}
   // public function get_classwise_student_api($class_id,$section_id){
         // $school_id = $this->session->userdata('emis_user_id');

       // $this->db->select('students_child_detail.id,
// students_child_detail.name,
// students_child_detail.name_tamil,
// students_child_detail.name_id_card,
// students_child_detail.name_tamil_id_card,
// students_child_detail.aadhaar_uid_number,
// students_child_detail.gender,
// students_child_detail.dob,
// students_child_detail.community_id,
// students_child_detail.religion_id,
// students_child_detail.mothertounge_id,
// students_child_detail.phone_number,
// students_child_detail.differently_abled,
// students_child_detail.disadvantaged_group,
// students_child_detail.subcaste_id,
// students_child_detail.house_address,
// students_child_detail.pin_code,
// students_child_detail.mother_name,
// students_child_detail.mother_occupation,
// students_child_detail.father_name,
// students_child_detail.father_occupation,
// students_child_detail.class_studying_id,
// students_child_detail.student_admitted_section,
// students_child_detail.group_code_id,
// students_child_detail.education_medium_id,
// students_child_detail.district_id,
// students_child_detail.unique_id_no,
// students_child_detail.school_id,
// students_child_detail.transfer_flag,
// students_child_detail.class_section,
// students_child_detail.school_admission_no,
// students_child_detail.guardian_name,
// students_child_detail.parent_income,
// students_child_detail.street_name,
// students_child_detail.area_village,
// students_child_detail.doj,
// students_child_detail.pass_fail,
// students_child_detail.email,
// students_child_detail.created_at,
// students_child_detail.updated_at,
// students_child_detail.status,
// students_child_detail.prv_class_std,
// students_child_detail.child_admitted_under_reservation,
// students_child_detail.bloodgroup,
// students_child_detail.photo,
// students_child_detail.request_flag,
// students_child_detail.request_date,
// students_child_detail.request_id,
// students_child_detail.smart_id,
// students_child_detail.rte_type,
// baseapp_bloodgroup.group,a.occu_name as father_occ,b.occu_name as mother_occ,baseapp_parentincome.income_value,schoolnew_mediumofinstruction.MEDINSTR_DESC,schoolnew_district.district_name,baseapp_religion.religion_name,baseapp_sub_castes.caste_name'); 
       // $this->db->from('students_child_detail');
       // $this->db->join('baseapp_bloodgroup','baseapp_bloodgroup.id = students_child_detail.bloodgroup','left')
                // ->join('baseapp_occupation a','a.id = students_child_detail.father_occupation','left')
                // ->join('baseapp_occupation b','b.id = students_child_detail.mother_occupation','left')
                // ->join('baseapp_parentincome','baseapp_parentincome.id = students_child_detail.parent_income','left')
                // ->join('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID = students_child_detail.education_medium_id','left')
                // ->join('schoolnew_district','schoolnew_district.id = students_child_detail.district_id','left')
                // ->join('baseapp_religion','baseapp_religion.id = students_child_detail.religion_id','left')
                // ->join('baseapp_sub_castes','baseapp_sub_castes.id = students_child_detail.subcaste_id','left');

       // $this->db->where('class_studying_id', $class_id); 
       // if(!empty($section_id)){
       // $this->db->where('class_section', $section_id); 
       // }
       // $this->db->where('school_id',$school_id);
       // $this->db->where('transfer_flag',0);

        // $result = $this->db->get();
		
		// return $result->result();
       
   // }

    function save_mhrd_dcf($table,$save_data)
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

  function save_mhrd_dcf_final($table,$save_data)
   {
      
          $this->db->where('dcf_certify_by_crc_auth_place',$save_data['dcf_certify_by_crc_auth_place']);
          $this->db->update($table,$save_data);
          return $save_data['dcf_certify_by_crc_auth_place'];
      

   }
   public function footwear_indentboys($scheme,$dists,$blk)
   {
	    if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 THEN 1 ELSE 0 END END ) AS boys_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=1 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =1 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS bset15_count

  from schoolnew_schemeindent 
  JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id   and students_child_detail.school_id = schoolnew_schemeindent.school_id
   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
where  schoolnew_schemeindent.scheme_id=".$scheme." and and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 )  
  ".$where."";
  $query = $this->db->query($sql);
			return $query->result();
	   
   }
		
		
	public function footwear_indentsgirl($scheme,$dists,$blk)
	{
		if(!empty($dists))
		{
			
			$d =" block_id,block_name,";
			
			$where ="and students_school_child_count.district_id =".$dists." group by block_id order by block_name asc";
		}
		else if(!empty($scheme))
		{
			$d="students_school_child_count.district_id,district_name,";
			$where ="group by students_school_child_count.district_id order by district_name asc";
		}
		else if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else{
			$scheme =2;
			$d =" students_school_child_count.district_id,district_name,"; 
			
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,


SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS gset1_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS gset2_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS gset3_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS gset4_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS gset5_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS gset6_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS gset7_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS gset8_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS gset9_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS gset10_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS gset11_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS gset12_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS gset13_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS gset14_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS gset15_count
		
		 from schoolnew_schemeindent 
  JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id    and students_child_detail.school_id = schoolnew_schemeindent.school_id
   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
where  schoolnew_schemeindent.scheme_id=".$scheme."  and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null and transfer_flag =0 and( cate_type = 'Primary School' or cate_type = 'Middle School') and ( school_type_id =1 or school_type_id =2 ) 
  ".$where."";
  $query = $this->db->query($sql);
			return $query->result();
	}
	
	public function footwear_indentsgirls($scheme,$dists,$blk)
	{
		 if(!empty($blk))
		{
			$d="school_name,";
			
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		
		
		$sql="select ".$d." schoolnew_schemeindent.scheme_id,


SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 9' THEN 1 ELSE 0 END END ) AS gset1_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-I:Size 10' THEN 1 ELSE 0 END END ) AS gset2_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-I:Size 11' THEN 1 ELSE 0 END END ) AS gset3_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 12' THEN 1 ELSE 0 END END ) AS gset4_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category= 'Cat-I:Size 13' THEN 1 ELSE 0 END END ) AS gset5_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 1' THEN 1 ELSE 0 END END ) AS gset6_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category='Cat-II:Size 2' THEN 1 ELSE 0 END END ) AS gset7_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 3' THEN 1 ELSE 0 END END ) AS gset8_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN students_child_detail.gender=2 and schoolnew_schemedetail.scheme_category ='Cat-II:Size 4' THEN 1 ELSE 0 END END ) AS gset9_count,

SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-II:Size 5' THEN 1 ELSE 0 END END ) AS gset10_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 6' THEN 1 ELSE 0 END END ) AS gset11_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 7' THEN 1 ELSE 0 END END ) AS gset12_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 8' THEN 1 ELSE 0 END END ) AS gset13_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 9' THEN 1 ELSE 0 END END ) AS gset14_count,
SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN students_child_detail.gender =2 and schoolnew_schemedetail.scheme_category = 'Cat-III:Size 10' THEN 1 ELSE 0 END END ) AS gset15_count
		
		 from schoolnew_schemeindent 
  JOIN students_child_detail ON students_child_detail.id=schoolnew_schemeindent.student_id    and students_child_detail.school_id = schoolnew_schemeindent.school_id
   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
where  schoolnew_schemeindent.scheme_id=".$scheme."  and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null and( cate_type = 'Primary School' or cate_type = 'Middle School')  and ( school_type_id =1 or school_type_id =2 ) and transfer_flag =0  
  ".$where."";
  $query = $this->db->query($sql);
			return $query->result();
		
	}	
	public function student_ied_benefits()
	{    $sql ="SELECT id, benefit, isactive FROM student_ied_benefits;";
		 $query = $this->db->query($sql);
			return $query->result();
	}
  public function student_present_status()
  {    $sql ="select id,child_status from baseapp_osc";
     $query = $this->db->query($sql);
      return $query->result();
  }
	    public function studsch_stud_taggingied($data)
		{
            // print_r($data);
			$result = $this->db->get_where('students_ied',array('school_id'=>$data['school_id'],'student_id'=>$data['student_id']))->first_row();
			//print_r($result);
			 
		 if(!empty($result))
		 {
				
		    $this->db->where(array('student_id'=>$data['student_id'],'school_id'=>$data['school_id']));
			
	      	$this->db->update('students_ied',$data);

			return $data['school_id'];

		 }else
		 {
				
			$this->db->insert('students_ied',$data);
			return $this->db->insert_id();
		 }
				 
		}
		public function cwsn_benefit($school_id)
		{
			$sql="select unique_id_no,name,students_child_detail.gender,differently_abled,child_admitted_under_reservation,rte_type,class_section,class_studying_id,baseapp_rte_type.id ,da_name ,baseapp_rte_type.category,sub_category,trstse, nmmsexam_passed, inspire,remarks,school_type_id, national_id, differently_type, students_ied.benefit, provided_by, acad_year,student_ied_benefits.benefit as bf from students_child_detail
 left join baseapp_differently_abled on baseapp_differently_abled.da_code=students_child_detail.differently_abled
 left join baseapp_rte_type on baseapp_rte_type.id = students_child_detail.rte_type 
join students_school_child_count on students_school_child_count.school_id = students_child_detail.school_id 
left join student_scholor_nmms on student_scholor_nmms.school_id = students_child_detail.school_id and student_scholor_nmms.student_id = students_child_detail.unique_id_no 

left join students_ied on students_ied.school_id = students_child_detail.school_id and students_ied.student_id = students_child_detail.unique_id_no
left join  student_ied_benefits on student_ied_benefits.id  =students_ied.benefit
			

where students_child_detail.school_id =".$school_id." and   students_ied.isactive =1";
//echo $sql;
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
	
	public function bag_indent($dist,$class,$blk)
	{
		   if(!empty($dist))
		   {
			$d =" block_id,block_name,";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		   }
		   else if(!empty($blk))
		   {
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
			}
		   else 
		   {
			$d =" students_school_child_count.district_id,district_name,"; 
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		   }
		   $sql="select ".$d." 
		   sum(if(class_studying_id =1,1,0)) as c1,
		   sum(if(class_studying_id =2,1,0)) as c2,
		   sum(if(class_studying_id =3,1,0)) as c3,
		   sum(if(class_studying_id =4,1,0)) as c4,
		   sum(if(class_studying_id =5,1,0)) as c5,
		   sum(if(class_studying_id =6,1,0)) as c6,
		   sum(if(class_studying_id =7,1,0)) as c7,
		   sum(if(class_studying_id =8,1,0)) as c8,
		   sum(if(class_studying_id =9,1,0)) as c9,
		   sum(if(class_studying_id =10,1,0)) as c10,
		   sum(if(class_studying_id =11,1,0)) as c11,
		   sum(if(class_studying_id =12,1,0)) as c12
		   from students_child_detail  
		   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		   where ".$class."  and ( school_type_id =1 or school_type_id =2 )     ".$where." ";
		   $query = $this->db->query($sql);
		   return $query->result();
	}
			
    public function crayan_indent($dist,$blk,$class)
	{
		    if(!empty($dist))
		    {
			 $d =" block_id,block_name,";
			 $where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
			}
			else if(!empty($blk))
		    {
			$d="school_name,";
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
			}
			else
			{
			$d =" students_school_child_count.district_id,district_name,"; 
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
			}
		
		$sql="select ".$d." 
		 sum(if(class_studying_id =1,1,0)) as c1,
		 sum(if(class_studying_id =2,1,0)) as c2 
		 from students_child_detail 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		 where  ".$class."  and ( school_type_id =1 or school_type_id =2 )  ".$where." ";
		 $query = $this->db->query($sql);
         return $query->result();
	}
			
		
	public function colorpencil_indent($dist,$blk,$class)
	{
			if(!empty($dist))
		        {
			       $d =" block_id,block_name,";
				   $where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
				}
			else if(!empty($blk))
				{
					$d="school_name,";
					$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
				}
				else
				{
					$d =" students_school_child_count.district_id,district_name,"; 
					$where  ="group by students_school_child_count.district_id order by district_name asc"; 
				}
		
		$sql="select ".$d." 
		   sum(if(class_studying_id =3,1,0)) as c1,
		   sum(if(class_studying_id =4,1,0)) as c2,
		   sum(if(class_studying_id =5,1,0)) as c3
		   from students_child_detail 
		   JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		   where  class_studying_id >= 3 and class_studying_id <= 5  ".$class." and ( school_type_id =1 or school_type_id =2 ) ".$where." ";
		  // echo $sql;
		    $query = $this->db->query($sql);
            return $query->result();
	}
			
		
			
		public function geomentry_indent($dist,$blk,$class)
		{
				if(!empty($dist))
		        {
			
					$d =" block_id,block_name,";
					$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
				}
				else if(!empty($blk))
				{
					$d="school_name,";
					$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
				}
				else
				{
					$d =" students_school_child_count.district_id,district_name,"; 
					$where  ="group by students_school_child_count.district_id order by district_name asc"; 
				}
		
		  $sql="select ".$d." 
		  sum(if(class_studying_id =6,1,0)) as c1,
		  sum(if(class_studying_id =7,1,0)) as c2,
		  sum(if(class_studying_id =8,1,0)) as c3
		  from students_child_detail
		  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		  where  class_studying_id >= 6 and class_studying_id <= 8 ".$class." and ( school_type_id =1 or school_type_id =2 )   ".$where." ";
		  // echo $sql;
		  $query = $this->db->query($sql);
            return $query->result();
		}
		
			
	   public function atlas_indent($dist,$blk,$class)
	   {
				if(!empty($dist))
		        {
					$d =" block_id,block_name,";
					$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
				}
				else if(!empty($blk))
				{
					$d="school_name,";
					$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
				}
				else{
					$d =" students_school_child_count.district_id,district_name,"; 
					$where  ="group by students_school_child_count.district_id order by district_name asc"; 
				}
		    $sql="select ".$d." 
			sum(if(class_studying_id =6,1,0)) as c1,
			sum(if(class_studying_id =7,1,0)) as c2,
			sum(if(class_studying_id =8,1,0)) as c3
			from students_child_detail 
			JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
			 where  class_studying_id >= 6 and class_studying_id <= 8 and ( school_type_id =1 or school_type_id =2 ) ".$class."  ".$where." ";
			   // echo $sql;
		    $query = $this->db->query($sql);
            return $query->result();
	  }
			
		
	 public function sweater_indent($scheme,$dist,$blk,$class)
	 {
		if(!empty($dist))
		{
			
			$d =" block_id,block_name,";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		}
		
		else if(!empty($blk))
		{
		$d="school_name,";
		$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else{
			$scheme =12;
			$d =" students_school_child_count.district_id,district_name,"; 
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		
	
		
	$sql="select ".$d." schoolnew_schemeindent.scheme_id,schoolnew_schemeindent.scheme_category,
   
       sum(if(class_studying_id =1,1,0)) as c1,
       sum(if(class_studying_id =2,1,0)) as c2,
       sum(if(class_studying_id =3,1,0)) as c3,
       sum(if(class_studying_id =4,1,0)) as c4,
       sum(if(class_studying_id =5,1,0)) as c5,
       sum(if(class_studying_id =6,1,0)) as c6,
       sum(if(class_studying_id =7,1,0)) as c7,
       sum(if(class_studying_id =8,1,0)) as c8
     
       from students_child_detail  
       JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id =students_child_detail.id
       JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
       join schoolnew_schemedetail on schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
       where  distribution_date is null and schoolnew_schemeindent.scheme_id= ".$scheme." and schoolnew_schemeindent.isactive =1  and  class_studying_id >= 1 and  class_studying_id <= 8 and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) ".$class." ".$where." ";
	   

       $query = $this->db->query($sql);
            return $query->result();
			}
			
            function getListOfLibraryEntry($school_id){
                $this->db->select('id, school_key_id, library_type, num_books,ncert_books');
                $this->db->from('schoolnew_library_entry');
                $this->db->where('schoolnew_library_entry.school_key_id', $school_id);   
                $this->db->where_in('schoolnew_library_entry.library_type',array(1,2));
                $query = $this->db->get();
                $result = $query->result();
                return $result;
            }
            function getListOfAdditionalProfileDetail($arr,$school_id,$table_name){
                $this->db->select($arr);
                $this->db->from($table_name);
                $this->db->where($table_name.'.school_key_id', $school_id);   
                $query = $this->db->get();
                $result = $query->result();
                return $result;

            }
            function update_additional_profile_dtls($school_id,$array_data,$table_name){
                $this->db->where($table_name.'.school_key_id', $school_id);      
                $this->db->update($table_name,$array_data);         
                return true;
            }

            function update_library_entry_dtls($school_id,$array_data,$library_type){
                
                $this->db->where('schoolnew_library_entry.school_key_id',$school_id);      
                // $this->db->where_in('schoolnew_library_entry.library_type',array(1,2));
                $this->db->where('schoolnew_library_entry.library_type',$library_type);      
                $this->db->update('schoolnew_library_entry',$array_data);         
                return true;
            }
	 public function ankleboot($scheme,$dist,$blk,$class)
	 {
		  
		 if(!empty($dist))
		{   $scheme =16;
			$d =" block_id,block_name,";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		} 
		else if(!empty($blk))
		{
			$d="school_name,";
			$scheme =16;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else{
			$d =" students_school_child_count.district_id,district_name,"; 
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		  
		$sql ="
        select schoolnew_schemeindent.scheme_id,".$d."
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Small:Size 9' THEN 1 ELSE 0 END END ) AS bset1_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Small:Size 10' THEN 1 ELSE 0 END END ) AS bset2_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category ='Small:Size 11' THEN 1 ELSE 0 END END ) AS bset3_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Small:Size 12' THEN 1 ELSE 0 END END ) AS bset4_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category= 'Small:Size 13' THEN 1 ELSE 0 END END ) AS bset5_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Small:Size 1' THEN 1 ELSE 0 END END ) AS bset6_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category='Medium:Size 2' THEN 1 ELSE 0 END END ) AS bset7_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Medium:Size 3' THEN 1 ELSE 0 END END ) AS bset8_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id  THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category ='Medium:Size 4' THEN 1 ELSE 0 END END ) AS bset9_count,
        SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category = 'Large:Size 5' THEN 1 ELSE 0 END END ) AS bset10_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)  and schoolnew_schemedetail.scheme_category = 'Large:Size 6' THEN 1 ELSE 0 END END ) AS bset11_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Large:Size 7' THEN 1 ELSE 0 END END ) AS bset12_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Large:Size 8' THEN 1 ELSE 0 END END ) AS bset13_count,
		SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2)   and schoolnew_schemedetail.scheme_category = 'Large:Size 9' THEN 1 ELSE 0 END END ) AS bset14_count
		
        from  students_child_detail
        JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id
		JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
		JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category
		where  schoolnew_schemeindent.scheme_id= ".$scheme."  and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
		 // echo $sql;
            $query = $this->db->query($sql);
            return $query->result();
	  }
	  public function socks_indent($scheme,$dist,$blk,$class)
	  {
		  
		if(!empty($dist))
		{   $scheme =17;
			$d =" block_id,block_name,";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		} 
		 else if(!empty($blk))
		{
			$d="school_name,";
			$scheme =17;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else
		{
			$d =" students_school_child_count.district_id,district_name,"; 
			$where  ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		  
		  $sql ="
          select schoolnew_schemeindent.scheme_id,".$d." 
		  SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'M (8-9.5)' THEN 1 ELSE 0 END END ) AS bset1_count, 
		  SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'L(9-11)' THEN 1 ELSE 0 END END ) AS bset2_count
		  from  students_child_detail
          JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id 
		  JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id 
		  JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category 
		  where  schoolnew_schemeindent.scheme_id= ".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
		  $query = $this->db->query($sql);
          return $query->result();
	  }
	  
	  public function raincoat_indent($scheme,$dist,$blk,$class)
	  {
		if(!empty($dist))
		{   $scheme =18;
			$d =" block_id,block_name,";
			$where ="and students_school_child_count.district_id =".$dist." group by block_id order by block_name asc";
		} 
		else if(!empty($blk))
		{
			$d="school_name,";
			$scheme =18;
			$where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
		}
		else
		{
		    $d =" students_school_child_count.district_id,district_name,"; 
		    $where ="group by students_school_child_count.district_id order by district_name asc"; 
		}
		  
		 $sql ="
         select schoolnew_schemeindent.scheme_id,".$d."
         SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 5' THEN 1 ELSE 0 END END ) AS bset1_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 6' THEN 1 ELSE 0 END END ) AS bset2_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category ='Size 7' THEN 1 ELSE 0 END END ) AS bset3_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Size 8' THEN 1 ELSE 0 END END ) AS bset4_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category= 'Size 10' THEN 1 ELSE 0 END END ) AS bset5_count, 
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category = 'Size 12' THEN 1 ELSE 0 END END ) AS bset6_count,
		 SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id and schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id THEN CASE WHEN (students_child_detail.gender=1 or students_child_detail.gender=2) and schoolnew_schemedetail.scheme_category='Size 14' THEN 1 ELSE 0 END END ) AS bset7_count
		 from  students_child_detail
         JOIN   schoolnew_schemeindent ON  schoolnew_schemeindent.student_id = students_child_detail.id and schoolnew_schemeindent.school_id =students_child_detail.school_id 
		 JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id 
		 JOIN schoolnew_schemedetail ON schoolnew_schemedetail.scheme_id=schoolnew_schemeindent.scheme_id AND schoolnew_schemedetail.id=schoolnew_schemeindent.scheme_category 
		 where  schoolnew_schemeindent.scheme_id= ".$scheme." and  class_studying_id >= 1 and  class_studying_id <= 8  and distribution_date is null  and transfer_flag =0 and ( school_type_id =1 or school_type_id =2 ) and schoolnew_schemeindent.isactive=1 ".$class." ".$where."";
		 $query = $this->db->query($sql);
         return $query->result();		  
	  }
	  
	  //School_needs_CSR by raj
	  public function  school_needs_csr_material_master()
	  {
		  $sql ="select id, material_name,cat_id, sub_cat_id, isactive from csr_material_master ";
		  $query = $this->db->query($sql);
          return $query->result();	
	  }
	  public function cate()
	  {
		 $sql ="select id, cat_name, isactive  from  csr_category_master";
		  $query = $this->db->query($sql);
          return $query->result();	  
	  }
	   public function sub_cate()
	  {
		 $sql ="select id, sub_cat_name, cat_id, isactive from  csr_subcategory_master";
		   $query = $this->db->query($sql);
           return $query->result();	  
	  }
	  
	  
	  public function save_school_needs($data)
	  {
		  	
        $result = $this->db->get_where('csr_school_requirements',array('school_id'=>$data['school_id'],'mat_id'=>$data['mat_id']))->first_row();
     // print_r($result);die();
       //,'created_by'=>$data['created_by']
     if(!empty($result))
     {
        
        $this->db->where(array('school_id'=>$data['school_id'],'mat_id'=>$data['mat_id']));
      
          $this->db->update('csr_school_requirements',$data);

      return $data['school_id'];

     }else
     {
        
      $this->db->insert('csr_school_requirements',$data);
      return $this->db->insert_id();
     }
    }
	  public function get_school_needs_csr($school)
	  {
		  $sql="select csr_material_master.id,DEscription, material_name, sub_cat_name,cat_name,csr_school_requirements.created_by,
				school_id, mat_id, qty, csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,csr_school_requirements.created_on  from csr_school_requirements
				join  csr_material_master on csr_material_master.id = csr_school_requirements.mat_id
				left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id
				left join  csr_subcategory_master on csr_subcategory_master.id =  csr_school_requirements.sub_cat_id
				where school_id =".$school." and csr_school_requirements.isactive = 1  order by created_on desc";
          $query = $this->db->query($sql);
          return $query->result();
	  }
	  public function get_needscsr_details($id,$school_id)
	  {
		  $sql="select csr_material_master.id, material_name, sub_cat_name,cat_name,csr_school_requirements.created_by,
				 school_id, mat_id, qty, csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,csr_school_requirements.created_on from csr_school_requirements
				join  csr_material_master on csr_material_master.id = csr_school_requirements.mat_id
				left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id
				left join  csr_subcategory_master on csr_subcategory_master.id =  csr_school_requirements.sub_cat_id

				where school_id =".$school_id." and csr_school_requirements.mat_id = ".$id."";
          $query = $this->db->query($sql);
          return $query->result();
    }
  
    /** getdtls (QUERY) Functionality are Starts Here : last mod - 28.09.2019(venba/ps) */
    function get_previous_XII_dtls($school_id,$tbl){ 
            $SQL="SELECT ".$tbl.".SCHL, ".$tbl.".SCH_NAME,".$tbl.".PER_REGNO, ".$tbl.".NAME, ".$tbl.".SEX, ".$tbl.".DOB,".$tbl.".MANAGEMENT,".$tbl.".YEAR, ".$tbl.".MED_IN, ".$tbl.".UDISE_CODE, ".$tbl.".REGNO ,
            student_past_12_status.id, student_past_12_status.ac_year, student_past_12_status.class_type, student_past_12_status.result, student_past_12_status.result_other, student_past_12_status.current_status, student_past_12_status.status_other ,laptop_distributed
            FROM ".$tbl." LEFT JOIN student_past_12_status ON student_past_12_status.regno = ".$tbl.".REGNO and student_past_12_status.school_udise_code = ".$school_id."
            WHERE UDISE_CODE =".$school_id."  AND SCHL not in (8888,9999) ORDER BY ".$tbl.".REGNO ;";
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
    /** ********* Ends ****** */

 //get Textbook dtls (venba/ps) dated = 31/7/19
 public function get_classwise_textbook($class_id,$term_id,$subj_id)
 {
   if($subj_id == ''){
     $arr = array('class'=>$class_id,'term'=>$term_id,'medium' => 16);
   }
    else{
$arr = array('class'=>$class_id,'term'=>$term_id,'medium' => 16,'id'=>$subj_id);
    }
     $school_id = $this->session->userdata('emis_user_id');
     $result = $this->db->get_where('schoolnew_textbooks_list',$arr)->result_array();
     
     return $result;
 }
 public function get_slas_class7_report($school_id)
  {
    //print_r($school_id);
    $sql="select unique_id,students_slas_class7.name,school_name,tamil,english,maths,science,social from students_slas_class7
join students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id
where students_slas_class7.school_id=".$school_id." and students_slas_class7.name is not null
GROUP BY unique_id;";
     $query = $this->db->query($sql);
       return $query->result();
  }

  function student_list_9_10($school_id,$classid,$termid,$sectionid,$tname)
   {  
    switch($termid)
                      {
                        case '1': 
                        case '2':$s_id='1';break;
                        case '3': 
                        case '4':$s_id='2';break;
                        case '5':
                        case '6': $s_id='3';break;
                      }
    if($sectionid == '0'){ $concat_where = ""; }
    else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 

    $sql = " SELECT a.id as stuid, a.name, a.name_tamil, a.gender, a.dob, a.community_id, a.religion_id, a.mothertounge_id, 
        a.class_studying_id, a.district_id, a.unique_id_no, a.school_id, a.transfer_flag, a.class_section,b.acc_reason1,b.school1_id,b.lang".$s_id." as lang,b.eng".$s_id." as eng,b.maths".$s_id." as maths,b.science".$s_id." as science,b.pract".$s_id." as pract,b.social".$s_id." as social,b.total".$s_id." as total, b.status".$s_id." as status,b.access".$s_id." as access,b.acc_reason".$s_id." as acc_reason,b.id as updid
   
     FROM students_child_detail a 
     LEFT JOIN ".$tname." b ON a.id = b.student_id
     WHERE a.school_id = ".$school_id." AND a.class_studying_id = ".$classid.$concat_where." AND a.transfer_flag = 0 order by a.name;

    " ;

    $query = $this->db->query($sql);

    return $query->result_array();  
   }
    function insert_student_mark_data_9_10($data,$tname){
        $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }

        $this->db->select('id');
    $result = $this->db->get_where($tname,array('class_id'=>$data['class_id'],'student_id'=>$data['student_id']))->first_row();
 // print_r($this->db->last_query());die();
      if($result->id !='')
      {
        $this->db->where('id',$result->id);
        $this->db->update($tname,$data);
        return $data['student_id'];
      }else
      {
        $this->db->insert($tname,$data); 
        return $this->db->affected_rows();
      }
    }
    
 function update_student_absent($stuabs,$attendancevalue)
  {
    // print_r($stuabs);
    // die();
     $this->db->set('student_attendance',$attendancevalue); 
     $this->db->where('student_id',$stuabs);
     $this->db->update('schoolnew_qstudent_markdetails');
       $result = $this->db->affected_rows();
     return $result;     
  }
    function update_student_absent_data_9_10($stuabs,$data,$tname)
  {
      $this->db->where('student_id',$stuabs);
    return $this->db->update($tname, $data);  
  }
    function update_student_absent_9_10($stuabs,$attendancevalue,$tname)
  {
    // print_r($stuabs);
    // die();
    $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where('student_id',$stuabs);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
  function insert_student_attendance($studentabsent,$attendancevalue)
  {
    
     $this->db->set('student_attendance',$attendancevalue); 
     $this->db->where_in('student_id',$studentabsent);
     $this->db->update('schoolnew_qstudent_markdetails');
       $result = $this->db->affected_rows();
     return $result;     
  }
  function insert_student_attendance_9_10($studentabsent,$attendancevalue,$tname)
  {
      $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where_in('student_id',$studentabsent);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
  function update_student_mark_data_9_10($data,$id,$tname)
  {
     $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   
if($id == ""){
      $data['access'.$s_id] = 0;
      $this->db->insert($tname,$data); 
      return $this->db->insert_id();
    }
  //print_r($id);die();
      $this->db->where('id',$id);
      return $this->db->update($tname, $data);
  }
  function update_student_present($stupre,$attendancevalue)
  {
    // print_r($stuabs);
    // die();
     $this->db->set('student_attendance',$attendancevalue); 
     $this->db->where('student_id',$stupre);
     $this->db->update('schoolnew_qstudent_markdetails');
       $result = $this->db->affected_rows();
     return $result;     
  }
  function update_student_present_9_10($stupre,$attendancevalue,$tname)
  {
    // print_r($stuabs);
    // die();
     $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where('student_id',$stupre);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
  
  
     function student_list_11_12($school_id,$classid,$termid,$sectionid,$tname,$subid)
   {  
   
    $sql = " SELECT a.id as stuid, a.name, a.name_tamil, a.gender, a.dob, a.community_id, a.religion_id, a.mothertounge_id, 
        a.class_studying_id, a.district_id, a.unique_id_no, a.school_id, a.transfer_flag, a.class_section
     FROM students_child_detail a 
     WHERE a.school_id = ".$school_id." AND a.class_studying_id = ".$classid." AND a.transfer_flag = 0 AND a.group_code_id=".$subid." order by a.name " ;
      $query = $this->db->query($sql);
           //print_r($this->db->last_query());
            return $query->result();
}
function insert_student_mark_data_11_12($data,$tname){
        $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }

        $this->db->select('id');
    $result = $this->db->get_where($tname,array('class_id'=>$data['class_id'],'student_id'=>$data['student_id']))->first_row();
 // print_r($this->db->last_query());die();
      if($result->id !='')
      {
        $this->db->where('id',$result->id);
        $this->db->update($tname,$data);
        return $data['student_id'];
      }else
      {
        $this->db->insert($tname,$data); 
        return $this->db->affected_rows();
      }
    }
      function update_student_absent_data_11_12($stuabs,$data,$tname)
  {
      $this->db->where('student_id',$stuabs);
    return $this->db->update($tname, $data);  
  }
  function update_student_absent_11_12($stuabs,$attendancevalue,$tname)
  {
    // print_r($stuabs);
    // die();
    $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where('student_id',$stuabs);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
   function insert_student_attendance_11_12($studentabsent,$attendancevalue,$tname)
  {
      $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where_in('student_id',$studentabsent);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
  function update_student_mark_data_11_12($data,$id,$tname)
  {
     $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   
if($id == ""){
      $data['access'.$s_id] = 0;
      $this->db->insert($tname,$data); 
      return $this->db->insert_id();
    }
  //print_r($id);die();
      $this->db->where('id',$id);
      return $this->db->update($tname, $data);
  }
  function update_student_present_11_12($stupre,$attendancevalue,$tname)
  {
    // print_r($stuabs);
    // die();
     $termid=$this->input->post('termid');
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   
     $this->db->set('access'.$s_id,$attendancevalue); 
     $this->db->where('student_id',$stupre);
     $this->db->update($tname);
       $result = $this->db->affected_rows();
     return $result;     
  }
   function update_student_mark_final_9_10($data,$id,$tname)
  {

      $termid=$this->input->post('termid');
//print_r($tname);
       switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
    $this->db->where('id',$id);
    return $this->db->update($tname,$data); 
  }
   public function student_invalid_aadhar_no($school_id)
  {
    //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
    $sql="select unique_id_no,aadhaar_uid_number,sum(((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12))) as cnt from students_child_detail where school_id=".$school_id." and  transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12))";
 $query = $this->db->query($sql);

 //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
      }
       public function student_invalid_aadhar_no_list($school_id)
  {
    //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
    $sql="select * from students_child_detail where school_id=".$school_id." and transfer_flag=0 and ((length(aadhaar_uid_number)=12 and aadhaar(aadhaar_uid_number,0)<>0) or (length(aadhaar_uid_number)<>12)) GROUP BY unique_id_no";
 $query = $this->db->query($sql);

 //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
      }
       public function student_invalid_phn_no($school_id)
  {
    //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
    $sql="select sum((length(phone_number)<>10 or left(phone_number,1)<6)) as cnt from students_child_detail where  transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and school_id=".$school_id."";
 $query = $this->db->query($sql);

 //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
      }
       public function student_invalid_phn_no_list($school_id)
  {
    //$temp_aadh="aadhaar(aadhaar_uid_number,0)<>0)";
    $sql="select * from students_child_detail where  transfer_flag=0 and ((length(phone_number)<>10 or left(phone_number,1)<6)) and school_id=".$school_id."";
 $query = $this->db->query($sql);

 //print_r($this->db->last_query());die(); ,$temp_aadh;
      return $query->result();
      }
	  
	/***********************************************************
			Student Aadhar updation
	************************************************************/
	public function studentaadharupdate($data,$studentid){
		$this->db->where('unique_id_no', $studentid);
		return $this->db->update('students_child_detail', $data);
	}
	
	function get_aadhar($aadhar) {
        $SQL = 'select unique_id_no,name,aadhaar_uid_number from students_child_detail where aadhaar_uid_number='.$aadhar.' limit 1';
        $query = $this->db->query($SQL);
        if($query==null)
			return null;
        else
        return $query->result();
    }

}
?>