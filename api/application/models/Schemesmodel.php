<?php

class Schemesmodel extends CI_Model
{
    function __construct() 
	{
      parent::__construct();
    }
    function getListAllSchemes($school_key_id,$visibility="schoolnew_freescheme.visibility>0"){
        $SQL="SELECT id,scheme_name, 
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


    function getStudentforNoonmealIndent($schoolid,$class,$sectionid,$tname){ 
        if($sectionid == '0'){ $concat_where = ""; }
        else{ $concat_where = " AND a.class_section = '".$sectionid."'"; } 

        $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                b.scheme_id as scheme_id, b.scheme_category as new_scheme_category,
                b.indent_date as indent , b.distribution_date, b.unique_supply
                FROM students_child_detail a
                LEFT JOIN ".$tname." b
                ON 
                WHERE a.transfer_flag = 0 AND a.school_id=".$schoolid." AND a.class_studying_id = ".$class.$concat_where." ORDER BY a.class_section,a.NAME ASC;";
        $query = $this->db->query($SQL);
        // print_r($this->db->last_query());die;
        return $query->result();
    }
    
        function noonmealList($schoolid,$class,$sectionid){
            $this->db->select("a.id as student_id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                               b.scheme_id as scheme_id,b.indent_date as indent , b.distribution_date, b.is_opted,b.id as noonmeal_primaryid,
                               CONCAT(c.class_studying, ' - ', a.class_section) as class_and_section");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_meal b', 'a.id = b.student_id AND b.scheme_id in(15) AND `b`.`school_id` = '.$schoolid.'', 'left');
            $this->db->join('baseapp_class_studying c','c.id = a.class_studying_id','left');
            $this->db->where('a.transfer_flag',0);
            $this->db->where('a.school_id',$schoolid);
            $this->db->where('a.class_studying_id',$class);
            if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            // $this->db->order_by('a.NAME','asc');
            $result = $this->db->get()->result();
            //print_r($result); die();
            return $result;
        }

        // function uniformList($schoolid,$class,$sectionid){
        //     $this->db->select("a.id, a.school_id, a.scheme_id, a.student_id, a.class, a.section, a.indent_date, a.set1_distribution_date, a.set2_distribution_date, a.set3_distribution_date, a.set4_distribution_date,
        //      a.set1_category, a.set2_category, a.set3_category, a.set4_category, a.finalsub, a.references, a.created_at, a.updated_at");
        //     $this->db->from('schoolnew_schemes a');
        //     $this->db->where('a.school_id',$schoolid);
        //     $this->db->where('a.class',$class);
        //     $this->db->where('a.section',$sectionid);
        //     $this->db->where('a.scheme_id',1);
        //     $result = $this->db->get()->result();
        //     // print_r($result);
        //     return $result;
        // }


        function uniformList($schoolid,$class,$sectionid){
            $this->db->select("a.id as student_id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                               b.indent_date as indent ,b.student_id as studid,
                               b.scheme_id, b.class, b.section, b.indent_date, b.set1_distribution_date, b.set2_distribution_date, b.set3_distribution_date, b.set4_distribution_date,  b.set1_category, b.set2_category, b.set3_category, b.set4_category, b.finalsub,
                               b.id as uniform_primaryid,CONCAT(c.class_studying, ' - ', a.class_section) as class_and_section");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_schemes b', 'a.id = b.student_id', 'left');
            $this->db->join('baseapp_class_studying c','c.id = a.class_studying_id','left');
            $this->db->where('a.transfer_flag',0);
            $this->db->where('a.school_id',$schoolid);
            $this->db->where('a.class_studying_id',$class);
            if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            // $this->db->order_by('a.NAME','asc');
            $result = $this->db->get()->result();
            // print_r($result);
            return $result;
        }
        
        //Get the Laptop-Distribution Dtls
        function LaptopDistibutionforScheme($scheme_id,$class,$academicyear,$school_id,$sectionid){             
            
            
            if($sectionid == '0'){ $concat_where = ""; }
            else{ $concat_where = " AND a.class_section = '".$sectionid."'"; }
            $SQL="SELECT a.id as id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section, 
            b.scheme_id, b.scheme_category, b.indent_date, b.distribution_date, b.unique_supply
            FROM students_child_detail a
            LEFT JOIN schoolnew_computerindent b
            ON a.id = b.student_id AND b.isactive = 1 AND b.scheme_id = 11
            WHERE a.school_id=".$school_id." AND a.class_studying_id = ".$class." AND a.transfer_flag = ".$academicyear.$concat_where." ORDER BY a.NAME ASC;";
            $query = $this->db->query($SQL);
            // print_r($this->db->last_query());
            return $query->result();
        }

        //To Check or Compare With Existing Data 
        //IF Unique-id Already Existing or not 
        function checkWithExistUniqueID($rec){
            // SELECT schoolnew_computerindent.id FROM schoolnew_computerindent WHERE isactive = 1 AND schoolnew_computerindent.unique_supply = '".$rec."'";
            
            $sql = "select sum(counter) as counter
                   from (
                        select count(unique_supply) as counter from schoolnew_computerindent where unique_supply = '".$rec."'
                        union all
                        select count(LAPTOPSERIALNO) as counter from dge_class12_2018 where LAPTOPSERIALNO = '".$rec."'
                        union all
                        select count(LAPTOPSERIALNO) as counter from dge_class12_2019 where LAPTOPSERIALNO = '".$rec."'
                    ) as counts;";

            $query = $this->db->query($sql);
            $result = $query->first_row();
            return $result->counter;
            
        }

        function laptopList($class,$acyear,$schoolid,$sectionid){
            
            $this->db->select("a.id as student_id,a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
                               b.scheme_id, b.school_id, b.class, b.distribution_date, b.unique_supply, b.isactive, b.acyear, b.student_id as studid, b.finalsub,b.id as laptop_primaryid,b.indent_date as indent,
                               CONCAT(c.class_studying, ' - ', a.class_section) as class_and_section");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_computerindent b', 'a.id = b.student_id', 'left');
            $this->db->join('baseapp_class_studying c','c.id = a.class_studying_id','left');
            $this->db->where('a.transfer_flag',$acyear);
            $this->db->where('a.school_id',$schoolid);
            $this->db->where('a.class_studying_id',$class);
            if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            // $this->db->order_by('a.NAME','asc');
            $result = $this->db->get()->result();
            return $result;
        }

        function textbookListForPrimarySchool($mediumid,$class,$schoolid){
            
            $this->db->select("a.id as student_id,
            a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
            b.medium, b.ac_year,
            b.term1_language1_distribution_date, b.term1_language1_book_id, 
            b.term2_language1_distribution_date, b.term2_language1_book_id, 
            b.term3_language1_distribution_date, b.term3_language1_book_id, 
            b.term1_language2_distribution_date, b.term1_language2_book_id, 
            b.term2_language2_distribution_date, b.term2_language2_book_id, 
            b.term3_language2_distribution_date, b.term3_language2_book_id, 
            b.term1_mathematics_distribution_date, b.term1_mathematics_book_id, 
            b.term2_mathematics_distribution_date, b.term2_mathematics_book_id, 
            b.term3_mathematics_distribution_date, b.term3_mathematics_book_id, 
            b.term1_science_distribution_date, b.term1_science_book_id, 
            b.term2_science_distribution_date, b.term2_science_book_id, 
            b.term3_science_distribution_date, b.term3_science_book_id, 
            b.term1_socialscience_distribution_date, b.term1_socialscience_book_id, 
            b.term2_socialscience_distribution_date, b.term2_socialscience_book_id, 
            b.term3_socialscience_distribution_date, b.term3_socialscience_book_id, 
            b.indent_date as indent , b.finalsub,b.id as txtbook_primaryid");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_textbookindent_pri b', 'a.id = b.student_id', 'left');
            $this->db->where('a.transfer_flag',0);
            $this->db->where('a.education_medium_id',$mediumid);
            $this->db->where('a.school_id',$schoolid);
            // $this->db->where('a.transfer_flag',$acyear);
            $this->db->where('a.class_studying_id',$class);
            // if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            $result = $this->db->get()->result();
            // print_r($result);
            return $result;
        }

        function textbookListForSecondarySchool($mediumid,$class,$schoolid){
            $this->db->select("a.id as student_id,
            a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
            b.medium, b.ac_year,
            b.term1_language1_distribution_date, b.term1_language1_book_id, 
            b.term2_language1_distribution_date, b.term2_language1_book_id, 
            b.term1_language2_distribution_date, b.term1_language2_book_id, 
            b.term2_language2_distribution_date, b.term2_language2_book_id, 
            b.term1_mathematics_distribution_date, b.term1_mathematics_book_id, 
            b.term2_mathematics_distribution_date, b.term2_mathematics_book_id, 
            b.term1_science_distribution_date, b.term1_science_book_id, 
            b.term2_science_distribution_date, b.term2_science_book_id, 
            b.term1_socialscience_distribution_date, b.term1_socialscience_book_id, 
            b.term2_socialscience_distribution_date, b.term2_socialscience_book_id, 
            b.indent_date as indent , b.finalsub,b.id as sec_txtbook_primaryid");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_textbookindent_sec b', 'a.id = b.student_id', 'left');
            $this->db->where('a.transfer_flag',0);
            $this->db->where('a.education_medium_id',$mediumid);
            $this->db->where('a.school_id',$schoolid);
            // $this->db->where('a.transfer_flag',$acyear);
            $this->db->where('a.class_studying_id',$class);
            // if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            $result = $this->db->get()->result();
            // print_r($result);
            return $result;
        }

        function textbookListForHigerSecondarySchool($class_id,$section,$school_id){
            $this->db->select("a.id as student_id,
            a.unique_id_no, a.NAME as name, a.class_studying_id, a.class_section,
            b.medium, b.ac_year,b.group_code, 
            b.language1_distribution_date, 
            b.language1_book_id, 
            b.language2_distribution_date, 
            b.language2_book_id, 
            b.volume1_subject1_distribution_date, 
            b.volume1_subject1_id, 
            b.volume2_subject1_distribution_date, 
            b.volume2_subject1_id, 
            b.volume1_subject2_distribution_date, 
            b.volume1_subject2_id, 
            b.volume2_subject2_distribution_date, 
            b.volume2_subject2_id, 
            b.volume1_subject3_distribution_date, 
            b.volume1_subject3_id, 
            b.volume2_subject3_distribution_date, 
            b.volume2_subject3_id, 
            b.volume1_subject4_distribution_date, 
            b.volume1_subject4_id, 
            b.volume2_subject4_distribution_date, 
            b.volume2_subject4_id, 
            b.volume1_subject5_distribution_date, 
            b.volume1_subject5_id, 
            b.volume2_subject5_distribution_date, 
            b.volume2_subject5_id, 
            b.volume1_subject6_distribution_date, 
            b.volume1_subject6_id, 
            b.volume2_subject6_distribution_date, 
            b.volume2_subject6_id, 
            b.indent_date as indent , b.finalsub,b.id as hrsec_txtbook_primaryid");
            $this->db->from('students_child_detail a');
            $this->db->join('schoolnew_textbookindent_hrsec b', 'a.id = b.student_id', 'left');
            $this->db->where('a.transfer_flag',0);
            $this->db->where('a.school_id',$school_id);
            $this->db->where('a.class_studying_id',$class_id);
            $this->db->where('a.class_section',$section);
            // if($sectionid != '0'){ $this->db->where('a.class_section',$sectionid); }
            $result = $this->db->get()->result();
            // print_r($result);
            return $result;
        }

        function getHrSecBookList($class,$section,$school){

            return $this->db
                    ->select('a.school_key_id,a.class_id,a.section,a.school_medium_id ,b.group_code,b.group_name,c.book_id,c.book_name')
                    ->from('schoolnew_section_group a')
                    ->join('baseapp_group_code b', 'b.id = a.group_id','left ')
                    ->join('schoolnew_textbooks_list c', 'c.group_code = b.group_code and c.class = a.class_id and c.medium = a.school_medium_id','left ')
                    ->where('a.class_id',$class)
                    ->where('a.section',$section)
                    ->where('a.school_key_id',$school)
                    ->get()
                    ->result();
        }

        function common_save_for_schemes($tname,$data){return $this->db->insert($tname, $data); }
        function common_update_for_schemes($id,$tname,$data)
        {
                $this->db->where('id', $id);      
                $this->db->update($tname, $data); 
                $result = $this->db->affected_rows();
	            return $result;	           
        }
        function updatePreXIILaptopDtl($id,$tname,$data)
        {
            // print_r($data);
            // echo($id);
            // echo($tname);

                $this->db->where('REGNO', $id);      
                $this->db->update($tname, $data); 
                $result = $this->db->affected_rows();
	            return $result;	           
        }
        function common_save($tname, $data){
            return $this->db->insert_batch($tname, $data);
        }
        function common_update($tname,$data){
        
            return $this->db->update_batch($tname, $data, 'id');
            print_r($this->db->last_query());
        }

        function save_scheme($tname,$data){
            $rowcount = 0;
            foreach ($data as $key => $value){
                

                    if($value['id'] == null){
                        unset($value['id']);
                        $this->db->insert($tname, $value);
                        // $insertrowcount = $this->db->affected_rows();
                    }
                    else if($value['id'] != null){
                        $this->db->where('id', $value['id']);      
                        $this->db->update($tname, $value); 
                        // $updaterowcount = $this->db->affected_rows();
                    }
                    $rowcount++;
            }

            return $rowcount;

        }

        function text_book_list($class,$medium,$term){
            return $result = $this
                            ->db
                            ->select('id, class, medium, term, book_id, book_name ')
                            ->where('class', $class)
                            ->where('medium', $medium)
                            ->where('term', $term)
                            ->get('schoolnew_textbooks_list')
                            ->result();
             
        }

        function get_previous_XII_dtls($school_id,$tbl){ 
            $SQL="SELECT dge.SCHL, dge.SCH_NAME,dge.PER_REGNO, dge.NAME, dge.SEX, dge.DOB,dge.MANAGEMENT,dge.YEAR, dge.MED_IN, dge.UDISE_CODE, dge.REGNO ,
            dge.LAPTOPSERIALNO,dge.LAPTOPDISTRIBUTIONDATE,
            student_past_12_status.id, student_past_12_status.ac_year, student_past_12_status.class_type, student_past_12_status.result, student_past_12_status.result_other, student_past_12_status.current_status, student_past_12_status.status_other ,laptop_distributed,LAPTOPSERIALNO,
            FROM ".$tbl." AS dge LEFT JOIN student_past_12_status ON student_past_12_status.regno = dge.REGNO and student_past_12_status.school_udise_code = ".$school_id."
            WHERE dge.UDISE_CODE =".$school_id."  AND SCHL not in (8888,9999) ORDER BY dge.REGNO ;";
            $query = $this->db->query($SQL);
           // print_r($this->db->last_query());
            return $query->result();
        }
        
        
}
?>