<?php

class Datamodel extends CI_Model
{
    function __construct() 
	{
      parent::__construct();
    }

	function getProfileComplete($udise_code)
	{
        $SQL="SELECT * FROM schoolnew_profilecomplete
              JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_profilecomplete.school_key_id
              WHERE udise_code=".$udise_code;
        $query = $this->db->query($SQL);
        if($query!=null)
            return $query->result_array();
        else
            return null;
    }	
	function getallschoolcategory()
	{
       $this->db->select('*')
            ->from('schoolnew_type');          
       $query = $this->db->get(); 
       return $query->result();
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
	function getallbloodgroup(){
       $this->db->select('*')
        ->from('baseapp_bloodgroup');           
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
            // echo $SQL;
            // die();
        $query = $this->db->query($SQL);
        return $query->result();
    }

	function get_alldistricts()
	{
		$this->db->select('*');
        $this->db->from('schoolnew_district');  
        $this->db->order_by("district_name", "asc");     
        $query = $this->db->get(); 
       return $query->result();

    } 
	function getSTDCodeByDistrict($district_id,$opt=1)
	{
        if($opt==1)
		{
            $this->db->select('*'); 
            $this->db->from('schoolnew_stdcode_mas');
            $this->db->where('dist_id',$district_id); 
            $query =  $this->db->get();
            return $query->result();
        }
        else
		{
            $SQL="SELECT * FROM schoolnew_stdcode_mas WHERE dist_id=".$district_id;
            $query = $this->db->query($SQL);
            return $query->result_array();
        }
    } 
	function getResidentialType()
	{
        $this->db->select('*');
        $this->db->from('schoolnew_resitype');
        $this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }

	function get_allmajorcategory()
	{
        $this->db->select('*');
        $this->db->from('schoolnew_manage_cate');           
        $query = $this->db->get(); 
        return $query->result();
	}
    function getMediumInstruct()
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        //$this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }
	function getminority()  
	{
        $this->db->select('*');
        $this->db->from('schoolnew_minority');
        $this->db->order_by('minority','asc');
        $query = $this->db->get();
        return $query->result();
    }
    function getLanguageasSubject()
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        $query =  $this->db->get();
        return $query->result();
    }
	function get_allbankdistricts()
	{
        $this->db->select('*');
        $this->db->from('schoolnew_bank_district');
		$this->db->order_by('bank_dist', 'ASC');		
		$query = $this->db->get(); 
		return $query->result();
    } 
    function getTrades()
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_trade');
        $query =  $this->db->get();
        return $query->result();
    }
	function getICTList($p)
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_list');
		$this->db->where('category',$p);
		$this->db->order_by("ict_type", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
    function getbankList()
	{
        $SQL="select distinct(bankcode),id,bank from schoolnew_bank group by bankcode ORDER BY bank ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	function getLablist()
    {
        $this->db->select('*'); 
        $this->db->from('schoolnew_lab');
		$this->db->order_by("visibility", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
	function getConstructlist()
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_construct');
        $query =  $this->db->get();
        return $query->result();
    }
	function getclub()
	{
        $SQL="SELECT * FROM schoolnew_club";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	function getICTSupplier()
	{
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_suppliers');
        $query =  $this->db->get();
        return $query->result();
    }
	
	//Part 1
	
    public function save_schoolbasic1_part($data)
	{
		$result = $this->db->get_where('schoolnew_basicinfo',array('school_id'=>$data['school_id'],'udise_code'=>$data['udise_code']))->first_row();
			
		 if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id'],'udise_code'=>$data['udise_code']));
			$this->db->update('schoolnew_basicinfo',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_basicinfo',$data);
			return $this->db->insert_id();
		 }
		 
	}
	public function save_schoolbasic1_part1($data)
	{
		 $result1 = $this->db->get_where('schoolnew_academic_detail',array('school_key_id'=>$data['school_id']))->first_row();
		  
		 if(!empty($result1))
		 {
			$this->db->where(array('school_key_id'=>$data['school_id']));
			$this->db->update('schoolnew_academic_detail',$data);
            return $data['school_key_id'];

		 }else
		 {
			$this->db->insert('schoolnew_academic_detail',$data);
			return $this->db->insert_id();
		 }
	}
	//part 2
	public function save_schoolbasic2_school($data)
	{
		 $result1 = $this->db->get_where('schoolnew_academic_detail',array('school_key_id'=>$data['school_id']))->first_row();
		  
		 if(!empty($result1))
		 {
			$this->db->where(array('school_key_id'=>$data['school_id']));
			$this->db->update('schoolnew_academic_detail',$data);
            return $data['school_key_id'];

		 }else
		 {
			$this->db->insert('schoolnew_academic_detail',$data);
			return $this->db->insert_id();
		 }
	}
	
	
	  
	//part 3 
	//SCHOOL DAYS AND HOURS DETAILS first part mattum
	public function save_school_traning($data)
    {
		$result = $this->db->get_where('schoolnew_dayswork_entry',array('school_id'=>$data['school_id'],'school_type'=>$data['school_type']))->first_row();
			
		 if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id'],'school_type'=>$data['school_type']));
			$this->db->update('schoolnew_dayswork_entry',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_dayswork_entry',$data);
			return $this->db->insert_id();
		 }
    } 
	//remaining part
	public function save_school_traning1($data)
	{
		
		$result = $this->db->get_where('schoolnew_training_detail',array('school_id'=>$data['school_id']))->first_row();
			
		 if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id']));
			$this->db->update('schoolnew_training_detail',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_training_detail',$data);
			return $this->db->insert_id();
		 }
	}
	  
	//Part 4 
	public function save_school_committee($data)
	{
		$result = $this->db->get_where('schoolnew_committee_detail',array('school_id'=>$data['school_id']))->first_row();
			
		 if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id']));
			$this->db->update('schoolnew_committee_detail',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_committee_detail',$data);
			return $this->db->insert_id();
		 }
	} 
	//part5
	
	public function save_school_land($data)
	{
		$result = $this->db->get_where('schoolnew_infra_detail',array('school_key_id'=>$data['school_id']))->first_row();
		
		if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id']));
			$this->db->update('schoolnew_infra_detail',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_infra_detail',$data);
			return $this->db->insert_id();
		 }
	}
	public function save_school_land1($data)
	{
		$result = $this->db->get_where('schoolnew_natureofconst_entry',array('school_key_id'=>$data['school_id']))->first_row();
	    $this->db->insert('schoolnew_natureofconst_entry',$data);
		return $this->db->insert_id();
	}
	
	//Part6
	public function save_school_inventry($data)
	{
		$result = $this->db->get_where('schoolnew_inventry',array('school_key_id'=>$data['school_id'],'inventry_id'=>$data['inventry_id']))->first_row();
		
		if(!empty($result))
		 {
			$this->db->where(array('school_id'=>$data['school_id'],'inventry_id'=>$data['inventry_id']));
			$this->db->update('schoolnew_inventry',$data);
            return $data['school_id'];

		 }else
		 {
			$this->db->insert('schoolnew_inventry',$data);
			return $this->db->insert_id();
		 }
	}
      
    function getTableDescribtion($tableName){
        $SQL="DESCRIBE ".$tableName;
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
	
	function get_allsubcategory($data){

        $this->db->select('*')
           ->from('schoolnew_management')
           ->where('mana_cate_id',$data);           
      $query = $this->db->get(); 
       return $query->result();
   
    }

    function get_alldeptcategory($data){
        //print_r($data);die();
        $this->db->select('*')
           ->from('schoolnew_school_department')
           ->where('school_mana_id',$data);            
      $query = $this->db->get(); 
       return $query->result();
   
    }

    function get_allblocks($data){
        //print_r($data);die();
        $this->db->select('*')
          ->from('schoolnew_block')
          ->where('district_id',$data);           
     $query = $this->db->get(); 
     //print_r($query->result());
      return $query->result();
  
  
   }

   function getDistrictBasedLocalBody($district_id,$urbanrural){
    $SQL="SELECT schoolnew_zone_type.id,schoolnew_zone_type.zone_type FROM schoolnew_zone_type,
          schoolnew_local_body where schoolnew_local_body.zone_type_id=schoolnew_zone_type.id 
          and schoolnew_local_body.district_id=".$district_id." AND type=".$urbanrural;
          
    $query = $this->db->query($SQL);
    
    return $query->result_array();
    }

    function getZonebyDistrict($district_id,$tableName,$zonetype){
        $SQL="SELECT * FROM ".$tableName." WHERE district_id=".$district_id." AND zone_type_id=".$zonetype." ORDER BY name ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    function getAllHabitationBylocalbidyid($localbody_id){
        $SQL="SELECT * FROM schoolnew_habitation_all WHERE localbody_id=".$localbody_id." ORDER BY name ASC";
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
    
    
    
    
    
}
?>