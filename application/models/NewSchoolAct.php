<?php
class NewSchoolActModel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function getAllNeed(){
        $SQL="SELECT 
        	schoolnew_district.id as district_id,
            schoolnew_district.district_name as district_name,
            schoolnew_edn_dist_mas.id as edudist_id,
            schoolnew_edn_dist_mas.edn_dist_name as edudist_name,
            schoolnew_block.id as block_id,
            schoolnew_block.block_name as block_name,
            std_code,schoolnew_stdcode_mas.id as std_code_id
        FROM schoolnew_district
        JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
        JOIN schoolnew_block ON schoolnew_block.edu_dist_id=schoolnew_edn_dist_mas.id
        JOIN schoolnew_stdcode_mas ON schoolnew_stdcode_mas.dist_id=schoolnew_district.id;";
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
}
?>