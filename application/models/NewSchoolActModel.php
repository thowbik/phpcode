<?php
class NewSchoolActModel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function getAllNeed($whereCondition,$cnd=1){
        $SQL="SELECT 
            	schoolnew_district.id as district_id,
                schoolnew_district.district_name as district_name,
                schoolnew_edn_dist_mas.id as edudist_id,
                schoolnew_edn_dist_mas.edn_dist_name as edudist_name,
                schoolnew_block.id as block_id,
                schoolnew_block.block_name as block_name,block_type,
                std_code,schoolnew_stdcode_mas.id as std_code_id".(($cnd==1)?",
                schoolnew_zone_type.id AS zone_type_id, schoolnew_zone_type.zone_type AS zone_type_name,
                schoolnew_localbody_all.id AS village_id,schoolnew_localbody_all.name AS village_name,
                schoolnew_habitation_all.id AS habit_id,schoolnew_habitation_all.name AS habit_name,
                schoolnew_assembly.id AS assembly_id,schoolnew_assembly.assembly_name,
                schoolnew_parliament.id AS parliment_id,schoolnew_parliament.parli_name as parliment_name":"")."
            FROM schoolnew_district
            JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
            JOIN schoolnew_block ON schoolnew_block.edu_dist_id=schoolnew_edn_dist_mas.id
            JOIN schoolnew_stdcode_mas ON schoolnew_stdcode_mas.dist_id=schoolnew_district.id
            ".(($cnd==1)?"
            JOIN schoolnew_localbody_all ON schoolnew_localbody_all.district_id=schoolnew_district.id
            JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_localbody_all.zone_type_id
            JOIN schoolnew_habitation_all ON schoolnew_habitation_all.localbody_id=schoolnew_localbody_all.id AND schoolnew_habitation_all.zone_type_id=schoolnew_zone_type.id
            JOIN schoolnew_assembly ON schoolnew_assembly.district_id=schoolnew_district.id
            JOIN schoolnew_parliament ON schoolnew_parliament.id=schoolnew_assembly.parli_id":"")."
        ".$whereCondition.";";
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
    function getSchoolManagement($idin){
        $SQL="SELECT id,management FROM schoolnew_management WHERE id IN (".$idin.")";
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
    function getSchoolDepart($cond,$c=0){
        $SQL="SELECT schoolnew_management.id as manage_id,management, 
            schoolnew_school_department.id as depart_id,department
            FROM schoolnew_management
            JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
            WHERE schoolnew_management.id IN (22,29) ".$cond;
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
    function searchSchoolNames($cond,$c=0){
        $SQL="SELECT school_id,udise_code,school_name
        FROM students_school_child_count WHERE district_id IS NOT NULL AND school_name LIKE ".$cond.";";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function selectfromtable($tablename,$where){
        $SQL="SELECT * FROM ".$tablename." ".$where;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
}
?>