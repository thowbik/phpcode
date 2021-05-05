<?php

class Datamodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

  function getallreligions(){
  	     $this->db->select('*')
              ->from('baseapp_religion');              
              $query = $this->db->get();      
       return $query->result();
  }

  function getallcommunity($religion){
 $this->db->select('*')
              ->from('baseapp_community')
              ->where('religion_id',$religion);              
              $query = $this->db->get();      
       return $query->result();
  }
  function getrte_type(){
 $query ="select concat(category,'-',sub_category)as cate,id from 
        baseapp_rte_type ";
        $result = $this->db->query($query)->result();
        return $result;
  }

    function getallsubcaste($community){
 $this->db->select('*')
              ->from('baseapp_sub_castes')
              ->where('community_id',$community);              
              $query = $this->db->get();      
       return $query->result();
  }

  function getalllaunguages(){
  	     $this->db->select('*')
              ->from('schoolnew_mediumofinstruction');              
              $query = $this->db->get();      
       return $query->result();
  }

function getalldisadvantages(){
  	     $this->db->select('*')
              ->from('baseapp_disadvantaged_group');              
              $query = $this->db->get();      
       return $query->result();
  }

  function getalldisabilities(){
  	     $this->db->select('*')
              ->from('baseapp_differently_abled');              
              $query = $this->db->get();      
       return $query->result();
  }

    function getallachooldist(){
         $this->db->select('*')
              ->from('schoolnew_district')
              ->order_by('district_name','asc');            
              $query = $this->db->get();      
       return $query->result();
  }

    function getallschoolblock($district_id){
        $this->db->select('*')
             ->from('schoolnew_block')
             ->where('district_id',$district_id)
             ->order_by('block_name','asc');                 
              $query = $this->db->get();  
       return $query->result();
  }

  function getallmediumofinst($schoolkeyid){
	     $SQL = "select * from schoolnew_mediumentry 
join schoolnew_mediumofinstruction on schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_mediumentry.medium_instrut where school_key_id=".$schoolkeyid;
        $query = $this->db->query($SQL);
        return $query->result_array();
  }

	function getallgroupcodes($gruop){
	     $this->db->select('*');
	 if($gruop=='29'){ $this->db->from('baseapp_group_code_cbse');  }else{
	 $this->db->from('baseapp_group_code');  }            
	 $query = $this->db->get(); 
	  return $query->result();           
  }

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

  function getallsection($schoolkeyid,$class){
  	$this->db->select('*')
	      ->from('schoolnew_section_group')
	      ->where('school_key_id',$schoolkeyid) 
         ->where('class_id',$class);  
                  
	 $query = $this->db->get(); 
     return $query->result();     
	 // return $query->row('section');

  }

   function get_allbankdistricts(){
    $this->db->select('*')
        ->from('schoolnew_bank_district')  
		->order_by('bank_dist', 'ASC');		
		$query = $this->db->get(); 
		return $query->result();
  }
 
 function get_allmajorcategory(){

      $this->db->select('*')
        ->from('schoolnew_manage_cate');           
   $query = $this->db->get(); 
    return $query->result();

 }
function get_majorcategoryname($id){

      $this->db->select('manage_name')
        ->from('schoolnew_manage_cate') 
        ->where('id',$id);        
   $query = $this->db->get(); 
    return $query->result();

 }

 function get_allsubcategory($data){

     $this->db->select('*')
        ->from('schoolnew_management')
        ->where('mana_cate_id',$data);           
   $query = $this->db->get(); 
    return $query->result();

 }

function get_subcategoryname($id){

     $this->db->select('management')
        ->from('schoolnew_management')
        ->where('id',$id);           
   $query = $this->db->get(); 
    return $query->result();

 }
 function get_alldeptcategory($data){

     $this->db->select('*')
        ->from('schoolnew_school_department')
        ->where('school_mana_id',$data);            
   $query = $this->db->get(); 
    return $query->result();

 }

  function get_departmentname($id){

     $this->db->select('department')
        ->from('schoolnew_school_department')
        ->where('id',$id);            
   $query = $this->db->get(); 
    return $query->result();

 }
 function get_allschoolcategory($data){

      $this->db->select('*')
        ->from('schoolnew_school_category')
        ->where('school_dept_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }
  function get_all_schoolcategory(){

      $this->db->select('*')
        ->from('schoolnew_category');          
   $query = $this->db->get(); 
     $posts = array();

        // For the purposes of this example, we'll only return the title
      foreach ($query->result() as $row) {
            $posts[$row->id] = $row->category_name;
        }
        return $posts ;


 }
function getallschoolcategory(){
    $this->db->select('*')
        ->from('schoolnew_type');          
   $query = $this->db->get(); 
   return $query->result();
 }
 function get_schoolcategory_name($id){

    $this->db->select('*');
        
      $this->db->where('id', $id); 
      $query =  $this->db->get('schoolnew_category');
      return $query->result();
 }

//1
 function get_alldistricts(){

      $this->db->select('*')
        ->from('schoolnew_district');  
      $this->db->order_by("district_name", "asc");     
   $query = $this->db->get(); 
    return $query->result();


 }
 
 function getallschoolblk(){

      $this->db->select('*')
        ->from('schoolnew_block'); 
   $query = $this->db->get(); 
    return $query->result();


 }

function get_district_name($id){

      $this->db->select('district_name')
        ->from('schoolnew_district')
        ->where('id',$id);       
   $query = $this->db->get(); 
    return $query->result();


 }


//2

  function get_allblocks($data){
      $this->db->select('*')
        ->from('schoolnew_block')
        ->where('district_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

function get_block_name($id){

      $this->db->select('block_name')
        ->from('schoolnew_block')
        ->where('id',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }

 //3

  function get_allclusters($data){

      $this->db->select('*')
        ->from('schoolnew_cluster_mas')
        ->where('blk_code_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

  function get_cluster_name($id){

      $this->db->select('clus_name')
        ->from('schoolnew_cluster_mas')
        ->where('clus_code',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }

 //4

  function get_alledudistricts($data){

      $this->db->select('*')
        ->from('schoolnew_edn_dist_block')
        ->where('block_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

  function get_edu_district_name($id){

      $this->db->select('edn_dist_name')
        ->from('schoolnew_edn_dist_block')
        ->where('edn_dist_id',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }
 //5

  function get_alllocalbody($data){

      $this->db->select('*')
        ->from('schoolnew_local_body')
        ->where('district_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

  function get_localbody_name($id){

      $this->db->select('localbody_name')
        ->from('schoolnew_local_body')
        ->where('id',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }
 //6

  function get_allvillages($data){

      $this->db->select('*')
        ->from('schoolnew_village_panchayat')
        ->where('block_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

 //7

  function get_allhvillages($data){

      $this->db->select('*')
        ->from('schoolnew_village_habitation')
        ->where('village_panchayat_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

 //8

  function get_allassembly($data){

      $this->db->select('*')
        ->from('schoolnew_assembly')
        ->where('district_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }

function get_assembly_constituency_name($id){

      $this->db->select('assembly_name')
        ->from('schoolnew_assembly')
        ->where('id',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }

 //9

  function get_allparliaments($data){

      $this->db->select('*')
        ->from('schoolnew_parliament')
        ->where('assembly_id',$data);           
   $query = $this->db->get(); 
    return $query->result();


 }


function get_parliament_constituency_name($id){

      $this->db->select('parli_name')
        ->from('schoolnew_parliament')
        ->where('id',$id);           
   $query = $this->db->get(); 
    return $query->result();


 }

function get_allmunicipality($district_id){

     $this->db->select('*')
        ->from('schoolnew_municipality')
        ->where('district_id',$district_id);           
   $query = $this->db->get(); 
    return $query->result();

}
function get_allmunicipalityward($municipality_id){

     $this->db->select('*')
        ->from('schoolnew_municipal_habitation`')
        ->where('municipal_id',$municipality_id);           
   $query = $this->db->get(); 
    return $query->result();
}

function get_alltownships($district_id){

     $this->db->select('*')
        ->from('schoolnew_township')
        ->where('district_id',$district_id);           
   $query = $this->db->get(); 
    return $query->result();

}
function get_alltownshipwards($township_id){

     $this->db->select('*')
        ->from('schoolnew_township_habitation')
        ->where('township_id',$township_id);           
   $query = $this->db->get(); 
    return $query->result();
}

function get_alltownpanchayat($district_id){

     $this->db->select('*')
        ->from('schoolnew_townpanchayat')
        ->where('district_id',$district_id);           
   $query = $this->db->get(); 
    return $query->result();

}
function get_alltownpanchayatward($townpanchayat_id){

     $this->db->select('*')
        ->from('schoolnew_town_panchayat_habitation')
        ->where('town_panchayat_id',$townpanchayat_id);           
   $query = $this->db->get(); 
    return $query->result();
}

function get_allcantonment($district_id){

     $this->db->select('*')
        ->from('schoolnew_contonment')
        ->where('district_id',$district_id);           
   $query = $this->db->get(); 
    return $query->result();

}
function get_allcantonmentwards($contonment_id){

     $this->db->select('*')
        ->from('schoolnew_contonment_habitation')
        ->where('contonment_id',$contonment_id);           
   $query = $this->db->get(); 
    return $query->result();
}

function get_allcorporations($district_id){

     $this->db->select('*')
        ->from('schoolnew_corporation')
        ->where('district_id',$district_id);           
   $query = $this->db->get(); 
    return $query->result();

}
function get_allcorporationzone($corporation_id){

     $this->db->select('*')
        ->from('schoolnew_corporation_zone')
        ->where('corporation_id',$corporation_id);           
   $query = $this->db->get(); 
    return $query->result();
}
function get_allcorporationward($corpn_zone_id){

     $this->db->select('*')
        ->from('schoolnew_corpn_habitation')
        ->where('corpn_zone_id',$corpn_zone_id);           
   $query = $this->db->get(); 
    return $query->result();

}

 function getmanagecatename($schid){
  $this->db->distinct('school_mana_id');
        $this->db->select('schoolnew_school_department.*')
        ->from('schoolnew_school_department')
        ->join('schoolnew_basicinfo','schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id')
        ->where('schoolnew_basicinfo.school_id',$schid);           
   $query = $this->db->get(); 
    return $query->row('school_mana_id');
 }

  function getclass_studying_id($class_studying_id){
       $this->db->select('*'); 
       $this->db->from('baseapp_class_studying');
       $this->db->where('id',$class_studying_id); 
       $query =  $this->db->get();
       return $query->row('class_studying');  
    }

  function getclasslist($classid){
       $this->db->select('*'); 
       $this->db->from('schoolnew_academic_detail');
       $this->db->where('school_key_id',$classid); 
       $query =  $this->db->get();
       return $query->result();
  }

    function getallclassstudying1($low,$high,$check=1){
      
       $SQL="SELECT id,class_studying FROM (
                SELECT id,class_studying FROM baseapp_class_studying 
                UNION
                SELECT (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 0 ELSE id END) as id,
                    (CASE WHEN (SELECT id FROM baseapp_class_studying WHERE id=".$low.") IS NULL THEN 'NA' ELSE class_studying END) as class_studying 
                FROM baseapp_class_studying) AS M1   
             WHERE ((id BETWEEN (CASE WHEN (".$low.">12 AND ".$high."<=12) THEN 0 ELSE ".$low." END) AND ".$high.") 
             OR (id BETWEEN 13 AND (CASE WHEN (".$low.">12 AND ".$low."<=14) THEN 14 ELSE ".$low." END))) ".($check==0?"AND class_studying IN ('LKG','UKG','PRE-KG','I')":"").";" ; 
             
      // echo($SQL);die();
       $query = $this->db->query($SQL);
       return $query->result_array();    
  }

  function getallincomes(){
           $this->db->select('*'); 
       $this->db->from('baseapp_parentincome'); 
       $query =  $this->db->get();
       return $query->result();
  }

  function get_allschooolsbyblock($block_id){
           $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('block_id',$block_id); 
       $query =  $this->db->get();
       return $query->result();
  }

    function get_schmanagementname($id){
           $this->db->select('*'); 
       $this->db->from('schoolnew_management');
       $this->db->where('id',$id); 
       $query =  $this->db->get();
       return $query->row('management');
  }

      function get_teachername($id){
           $this->db->select('*'); 
       $this->db->from('udise_staffreg');
       $this->db->where('u_id',$id); 
       $query =  $this->db->get();
       return $query->row('teacher_name');
  }

    function get_district_name1($id){
           $this->db->select('*'); 
       $this->db->from('emis_userlogin');
       $this->db->where('sno',$id); 
       $query =  $this->db->get();
       return $query->row('emis_username');
  }

  function get_school_det($id){
           $this->db->select('*'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('udise_code',$id); 
       $query =  $this->db->get();
       return $query->result();
  }



  function getallcommunityfull(){
              $this->db->distinct('community_code');
              $this->db->select('community_code,community_name')
              ->from('baseapp_community')
              ->order_by("community_code", "asc");    
              $query = $this->db->get();      
       return $query->result();
  }

    function getdeclarationdata($school_id){
       $this->db->select('*'); 
       $this->db->from('students_school_declaration_abst');
       $this->db->where('school_id',$school_id); 
       $query =  $this->db->get();
       return $query->result();
  }
  
  function get_office($district_id) {
       $this->db->select('*'); 
       $this->db->from('udise_offreg');
       $this->db->where('district_id',$district_id); 
       $query =  $this->db->get();
       return $query->result(); 
  }
  
   function get_allschoolblocks($district_id,$block_id){
        $SQL="SELECT * FROM schoolnew_basicinfo WHERE district_id=".$district_id." and block_id=".$block_id." ORDER BY school_name ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
/************************************************************************************************************************
            Function Included By Vivek Rao KP Ramco Cements Ltd.
*************************************************************************************************************************/
    
    function getSTDCodeByDistrict($district_id,$opt=1){
        if($opt==1){
            $this->db->select('*'); 
            $this->db->from('schoolnew_stdcode_mas');
            $this->db->where('dist_id',$district_id); 
            $query =  $this->db->get();
            return $query->result();
        }
        else{
            $SQL="SELECT * FROM schoolnew_stdcode_mas WHERE dist_id=".$district_id;
            $query = $this->db->query($SQL);
            return $query->result_array();
        }
    }
    
    function getResidentialType(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_resitype');
        $this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }
    
    function getMediumInstruct(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        //$this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }
    
    function getLanguageasSubject(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        $query =  $this->db->get();
        return $query->result();
    }
    function getDistrictBasedLocalBody($district_id,$urbanrural){
        $SQL="SELECT schoolnew_zone_type.id,schoolnew_zone_type.zone_type FROM schoolnew_zone_type,
              schoolnew_local_body where schoolnew_local_body.zone_type_id=schoolnew_zone_type.id 
              and schoolnew_local_body.district_id=".$district_id." AND type=".$urbanrural;
              
        $query = $this->db->query($SQL);
        
        return $query->result_array();
    }
    function getUrbanAndRuralBlock($district_id,$urbanrural){
        $SQL="SELECT * FROM schoolnew_block WHERE district_id=".$district_id." AND block_type='".$urbanrural."'";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getVillageByBlock($block_id){
        $SQL="SELECT * FROM schoolnew_village_panchayat WHERE block_id=".$block_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getZonebyDistrict($district_id,$tableName,$zonetype){
        $SQL="SELECT * FROM ".$tableName." WHERE district_id=".$district_id." AND zone_type_id=".$zonetype." ORDER BY name ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getClustersByBlock($block_id){
        $SQL="SELECT * FROM schoolnew_cluster_mas WHERE blk_code_id=(SELECT id FROM schoolnew_block WHERE block_code=".$block_id.")";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getAssemblyIDbyDistrict($block_id){
        $SQL="SELECT * FROM schoolnew_assembly WHERE district_id=".$block_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getParlimentIDbyDistrict($block_id){
        $SQL="SELECT schoolnew_parliament.id,schoolnew_parliament.parli_name,schoolnew_parliament.district_id  FROM schoolnew_parliament 
join schoolnew_assembly on schoolnew_parliament.id=schoolnew_assembly.parli_id
where schoolnew_assembly.id=".$block_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getEducationDistrictbyDistrict($district_id){
        $SQL="SELECT * FROM schoolnew_edn_dist_mas where district_id=".$district_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getTableDescribtion($tableName){
        $SQL="DESCRIBE ".$tableName;
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }

    function getBankByBankDistrict($district_id){
        $SQL="SELECT * FROM schoolnew_bank WHERE bank_dist_id=".$district_id." ORDER BY bank ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
     function getBranchByBank($district_id){
        $SQL="SELECT * FROM schoolnew_branch WHERE bank_id=".$district_id." ORDER BY branch ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getIFSCByBranch($district_id){
        $SQL="SELECT ifsc_code FROM schoolnew_branch WHERE id=".$district_id;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getTrades(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_trade');
        $query =  $this->db->get();
        return $query->result();
    }
    
     function getbankList(){
        $SQL="select distinct(bankcode),id,bank from schoolnew_bank group by bankcode ORDER BY bank ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getICTList($p){
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_list');
		$this->db->where('category',$p);
		$this->db->order_by("ict_type", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
    

    function getminority() {
        $this->db->select('*');
        $this->db->from('schoolnew_minority');
        $this->db->order_by('minority','asc');
        $query = $this->db->get();
        return $query->result();
    }
    
     function getLablist(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_lab');
		$this->db->order_by("visibility", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
    
    
     function getConstructlist(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_construct');
        $query =  $this->db->get();
        return $query->result();
    }
    
    function getICTSupplier(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_suppliers');
        $query =  $this->db->get();
        return $query->result();
    }
    
    function getAllHabitationBylocalbidyid($localbody_id){
        $SQL="SELECT * FROM schoolnew_habitation_all WHERE localbody_id=".$localbody_id." ORDER BY name ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getclub(){
        $SQL="SELECT * FROM schoolnew_club";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function getProfileComplete($udise_code){
        $SQL="SELECT * FROM schoolnew_profilecomplete
                JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_profilecomplete.school_key_id
                WHERE udise_code=".$udise_code;
        $query = $this->db->query($SQL);
        if($query!=null)
            return $query->result_array();
        else
            return null;
    }

}
?>