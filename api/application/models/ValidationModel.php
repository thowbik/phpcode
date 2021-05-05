<?php
class ValidationModel extends CI_Model
{
    function __construct() {
      parent::__construct();
    }
    function getListGenderSchools($where){
        $SQL="SELECT unique_id_no,name,gender,class_studying_id,class_section,udise_code,school_name FROM schoolnew_academic_detail 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_academic_detail.school_key_id
        JOIN students_child_detail ON students_child_detail.school_id=students_school_child_count.school_id
        WHERE ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getStudentsEmptyFields($selection,$where){
        $SQL="SELECT unique_id_no,name,class_studying_id,class_section,".$selection."udise_code,school_name FROM schoolnew_academic_detail 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_academic_detail.school_key_id
        JOIN students_child_detail ON students_child_detail.school_id=students_school_child_count.school_id
        WHERE ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getStaffValidations($selection,$where){
        $SQL="SELECT teacher_code,teacher_name,aadhar_no,subjects,".$selection."students_school_child_count.udise_code,school_name
        FROM udise_staffreg 
        JOIN teacher_subjects ON teacher_subjects.id=udise_staffreg.appointed_subject
        JOIN students_school_child_count ON students_school_child_count.school_id=udise_staffreg.school_key_id 
        WHERE ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getSchoolDetailsValidations($select,$where){
        $SQL="SELECT udise_code,school_name,category".$select." 
        FROM schoolnew_academic_detail 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_academic_detail.school_key_id
        JOIN schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=students_school_child_count.school_id
        JOIN schoolnew_dayswork_entry ON schoolnew_dayswork_entry.school_key_id=schoolnew_committee_detail.school_key_id
        JOIN schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_dayswork_entry.school_key_id
        JOIN (SELECT school_key_id,SUM(IF(library_type=2,num_books,0)) as book_bank,SUM(IF(library_type=1,num_books,0)) AS library_books,SUM(IF(ncert_books IS NOT NULL,ncert_books,0)) AS ncert_books 
        FROM schoolnew_library_entry GROUP BY school_key_id)AS schoolnew_library_entry ON schoolnew_library_entry.school_key_id=schoolnew_infra_detail.school_key_id
        WHERE ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    function ageOutofRange($where){
        $SQL="SELECT udise_code,
        school_name,unique_id_no,name,aadhaar_uid_number,IF(gender=1,'MALE','FEMALE') AS gender,dob,(SELECT class_studying FROM baseapp_class_studying WHERE id=class_studying_id) as class_studying,
        class_section,(YEAR(DATE(NOW()))-YEAR(dob)) AS AGE 
        FROM students_child_detail 
        JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
        WHERE 
        ((YEAR(DATE(NOW()))-YEAR(dob)) NOT BETWEEN 
        (CASE WHEN (class_studying_id=13 OR class_studying_id=14 OR class_studying_id=15) THEN 1 ELSE
        CASE WHEN class_studying_id=1 THEN 5 ELSE
        CASE WHEN class_studying_id=2 THEN 7 ELSE
        CASE WHEN class_studying_id=3 THEN 8 ELSE
        CASE WHEN class_studying_id=4 THEN 9 ELSE
        CASE WHEN class_studying_id=5 THEN 10 ELSE
        CASE WHEN class_studying_id=6 THEN 11 ELSE
        CASE WHEN class_studying_id=7 THEN 12 ELSE
        CASE WHEN class_studying_id=8 THEN 13 ELSE
        CASE WHEN class_studying_id=9 THEN 14 ELSE
        CASE WHEN class_studying_id=10 THEN 15 ELSE
        CASE WHEN class_studying_id=11 THEN 16 ELSE
        CASE WHEN class_studying_id=12 THEN 17 END END END END END END END END END END END END END) AND 
        (CASE WHEN (class_studying_id=13 OR class_studying_id=14 OR class_studying_id=15) THEN 5 ELSE
        CASE WHEN class_studying_id=1 THEN 7 ELSE
        CASE WHEN class_studying_id=2 THEN 9 ELSE
        CASE WHEN class_studying_id=3 THEN 10 ELSE
        CASE WHEN class_studying_id=4 THEN 11 ELSE
        CASE WHEN class_studying_id=5 THEN 12 ELSE
        CASE WHEN class_studying_id=6 THEN 13 ELSE
        CASE WHEN class_studying_id=7 THEN 14 ELSE
        CASE WHEN class_studying_id=8 THEN 15 ELSE
        CASE WHEN class_studying_id=9 THEN 16 ELSE
        CASE WHEN class_studying_id=10 THEN 17 ELSE
        CASE WHEN class_studying_id=11 THEN 18 ELSE
        CASE WHEN class_studying_id=12 THEN 19 END END END END END END END END END END END END END)) ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    function meduiumNotEqualToStudent($where){
        $SQL="SELECT udise_code,school_name,unique_id_no,name as student_name,
        CONCAT(class_studying_id,' - ',class_section) AS student_class_section,
        CONCAT(class_id,' - ',section) as school_class_section,
        (SELECT MEDINSTR_DESC FROM schoolnew_mediumofinstruction WHERE MEDINSTR_ID=education_medium_id) AS student_education_medium,
        (SELECT MEDINSTR_DESC FROM schoolnew_mediumofinstruction WHERE MEDINSTR_ID=school_medium_id) AS school_education_meduium 
        FROM students_child_detail 
        JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
        JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=students_child_detail.school_id AND schoolnew_section_group.class_id=students_child_detail.class_studying_id
        AND schoolnew_section_group.section=students_child_detail.class_section
        WHERE students_child_detail.education_medium_id!=schoolnew_section_group.school_medium_id ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    function classroomsnotequalslevelsandcontions($selection,$where){
        $SQL="SELECT udise_code,school_name".$selection."
        FROM(
        SELECT schoolnew_natureofconst_entry.school_key_id,
        (IF(tot_classrm_use IS NULL,0,tot_classrm_use)+IF(tot_classrm_nouse IS NULL,0,tot_classrm_nouse)) as tot_cls,
        (IF(good_condition IS NULL,0,good_condition)+IF(need_minorrep IS NULL,0,need_minorrep)+IF(need_majorrep IS NULL,0,need_majorrep)) as tot_cond_cls,
        SUM(CASE WHEN schoolnew_classroomlevel_entry.school_type IN (1,2,3,4,5) THEN IF(schoolnew_classroomlevel_entry.num_rooms IS NULL,0,schoolnew_classroomlevel_entry.num_rooms) ELSE 0 END) AS level_cls 
        FROM schoolnew_natureofconst_entry 
        JOIN schoolnew_classroomlevel_entry ON schoolnew_classroomlevel_entry.school_key_id=schoolnew_natureofconst_entry.school_key_id
        GROUP BY schoolnew_natureofconst_entry.school_key_id) AS class_rooms_entry
        JOIN students_school_child_count ON students_school_child_count.school_id=class_rooms_entry.school_key_id
        WHERE ".$where;
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    function updatePostedSingleData($tablename,$data){
        //print_r($data);die();
        return $this->db->update($tablename,$data,array("id" => $data["id"]));
    }
}
?>