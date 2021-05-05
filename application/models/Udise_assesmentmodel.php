<?php

class Udise_assesmentmodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();

    }

    function updte_asses1_frm1($data,$school_id,$category){
    $this->db->where('category',$category);
 	$this->db->where('school_key_id',$school_id);
 	return $this->db->update('udise_ases_elelvl_grd_v',$data);
 }
    
    // udise assement page1 table1 view the data
    function get_assesmentfrm1($school_id){
    	$this->db->select('category,stud_apprd_b,stud_apprd_g,stud_apprd_t,stud_passd_b,stud_passd_g,stud_passd_t,stud_passd_mt60_b,stud_passd_mt60_g,stud_passd_mt60_t');
    	$this->db->where('school_key_id',$school_id);
    	$query = $this->db->get('udise_ases_elelvl_grd_v');
    	return $query->result();
    }

    // ****** assesment1 form1 insert ****
    function get_asses1frm1insrt($record){
        $this->db->insert('udise_ases_elelvl_grd_v',$record);
    }
    // ****** assesment1 form1 insert Ending****

    // ****** assesment1 form2 Update ****
    function updte_asses1_frm2($data,$school_id,$category){
    $this->db->where('category',$category);
    $this->db->where('school_key_id',$school_id);
    return $this->db->update('udise_ases_elelvl_grd_viii',$data);
    }
    // ****** assesment1 form2 Update Ending ****

    // ****** assesment1 form2 Insert ****
    function get_asses1frm2insrt($record){
        $this->db->insert('udise_ases_elelvl_grd_viii',$record);
    }
    // ****** assesment1 form2 Insert Ending****

    // udise assement page1 table2 view the data
    function get_assesmentfrm2($school_id){
        $this->db->select('category,stud_apprd_b,stud_apprd_g,stud_apprd_t,stud_passd_b,stud_passd_g,stud_passd_t,stud_passd_mt60_b,stud_passd_mt60_g,stud_passd_mt60_t');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_elelvl_grd_viii');
        return $query->result();
    }

    // udise assement page2 table1 Insert the data
    function get_asses2frm1insrt($data){
       $this->db->insert('udise_ases_brdex_grd_x',$data);
    }

    // udise assement page2 table1 update the data
    function updte_asses2_frm1($data,$school_id,$category){
        $this->db->where('category',$category);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_brdex_grd_x',$data);
    }

    // udise assement page2 table1 view the data
    function get_assmnt2frm1($school_id){
        $this->db->select('category,stud_aprd_reg_b,stud_aprd_reg_g,stud_aprd_reg_t,stud_aprd_othreg_b,stud_aprd_othreg_g,stud_aprd_othreg_t,stud_pasd_reg_b,stud_pasd_reg_g,stud_pasd_reg_t,stud_pasd_othreg_b,stud_pasd_othreg_g,stud_pasd_othreg_t');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_brdex_grd_x');
        return $query->result();
    }
    
    // udise assement page2 table2 the data
    function get_asses2frm2insrt($data){
        $this->db->insert('udise_ases_brdex_regstu_grd_x',$data);
    }
    // udise assement page2 table2 insert the data Ending

    // udise assement page2 table2 update the data
    function updte_asses2_frm2($data,$school_id,$range){
        $this->db->where('mark_range',$range);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_brdex_regstu_grd_x',$data);   
    }


    // udise assement page2 table2 view the data
    function get_assmnt2frm2($school_id){
        $this->db->select('mark_range,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_brdex_regstu_grd_x');
        return $query->result();
    }


    //  udise assement page2 table2 the data
    function get_asses2frm3insrt($data){
        $this->db->insert('udise_ases_brdex_othregstu_grd_x',$data);
    }
    // udise assement page2 table2 insert the data Ending


    // udise assement page2 table3 view the data
    function updte_asses2_frm3($data,$school_id,$range){
        $this->db->where('mark_range',$range);
        $this->db->where('school_key_id',$school_id,$range);
        return $this->db->update('udise_ases_brdex_othregstu_grd_x',$data);      
    }

    

    // udise assement page2 table3 view the data
    function get_assmnt2frm3($school_id){
        $this->db->select('mark_range,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_brdex_othregstu_grd_x');
        return $query->result();
    }


    // periodical assesement module page 3 table 1 data Insert
    function assmnt3frm1insrt($record){
        $this->db->insert('udise_ases_univ_grd_xii',$record);
    }
    // periodical assesement module page 3 table 1 data Insert Ending

    // periodical assesement module page 3 table 1 data update module
    function updte_asses3_frm1($data,$school_id,$stream){
        $this->db->where('stream',$stream);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_univ_grd_xii',$data);
    }


    // udise assement page3 table1 view the data
    function get_assmnt3frm1($school_id){
        $this->db->select('stream,apprd_gen_b,apprd_gen_g,apprd_sc_b,apprd_sc_g,apprd_st_b,apprd_st_g,apprd_obc_b,apprd_obc_g,apprd_tot_b,apprd_tot_g,pasd_gen_b,pasd_gen_g,pasd_sc_b,pasd_sc_g,pasd_st_b,pasd_st_g,pasd_obc_b,pasd_obc_g,pasd_tot_b,pasd_tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_univ_grd_xii');
        return $query->result();
    }

    

    // periodical assesement module page 3 table 2 data update module
    function updte_asses3_frm2($data,$school_id,$stream){
        $this->db->where('stream',$stream);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_univ_otreg_grd_xii',$data);
    }

    // udise assement page3 table2 view the data
    function get_assmnt3frm2($school_id){
        $this->db->select('stream,apprd_gen_b,apprd_gen_g,apprd_sc_b,apprd_sc_g,apprd_st_b,apprd_st_g,apprd_obc_b,apprd_obc_g,apprd_tot_b,apprd_tot_g,pasd_gen_b,pasd_gen_g,pasd_sc_b,pasd_sc_g,pasd_st_b,pasd_st_g,pasd_obc_b,pasd_obc_g,pasd_tot_b,pasd_tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_univ_otreg_grd_xii');
        return $query->result();
    }

    // udise assement page3 table3 insert the data
    function assmnt3frm2insrt($record){
        $this->db->insert('udise_ases_univ_otreg_grd_xii',$record);
    }
    
    // periodical assesement module page 3 table 3 data insert module
    function get_asses3frm3insrt($record){
        $this->db->insert('udise_ases_univ_ran_reg_grd_xii',$record);
    }
    // periodical assesement module page 3 table 3 data insert Ending


    // periodical assesement module page 3 table 3 data update module
    function updte_asses3_frm3($data,$school_id,$mark_range){
        $this->db->where('mark_range',$mark_range);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_univ_ran_reg_grd_xii',$data);
    }


    // periodical assesement module *page3 *table3 data view module
   function get_assmnt3frm3($school_id){
        $this->db->select('mark_range,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_univ_ran_reg_grd_xii');
        return $query->result();
   }

    function get_asses3frm4insrt($record){
        $this->db->insert('udise_ases_univ_ran_othreg_grd_xii',$record);
    }
    // periodical assesement module page 3 table 4 data update module
    function updte_asses3_frm4($data,$school_id,$mark_range){
        $this->db->where('mark_range',$mark_range);
        $this->db->where('school_key_id',$school_id);
        return $this->db->update('udise_ases_univ_ran_othreg_grd_xii',$data);
    }
    
     // periodical assesement module *page3 *table4 data view module
   function get_assmnt3frm4($school_id){
        $this->db->select('mark_range,gen_b,gen_g,sc_b,sc_g,st_b,st_g,obc_b,obc_g,tot_b,tot_g');
        $this->db->where('school_key_id',$school_id);
        $query = $this->db->get('udise_ases_univ_ran_othreg_grd_xii');
        return $query->result();
   }
    
}
?>