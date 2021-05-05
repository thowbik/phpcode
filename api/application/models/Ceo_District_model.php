<?php
class Ceo_District_model extends CI_Model{
    
	function __construct(){
		parent::__construct();
	}
	
	public function get_districtName($district_id){
    	$result = $this->db->get_where('schoolnew_district',array('id'=>$district_id))->first_row();
		  return $result;
  }
	
	
	/*
		$sql="select *,schoolnew_district.id,schoolnew_district.district_name,schoolnew_district.email from schoolnew_basicinfo 
		left join schoolnew_manage_cate on schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id 
		left join schoolnew_management on schoolnew_management.id=schoolnew_basicinfo.sch_management_id
		left join schoolnew_school_department on schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id
		left join schoolnew_category on schoolnew_category.id=schoolnew_category.sch_cate_id
		left join schoolnew_academic_detail on schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
		left join schoolnew_training_detail on schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id";
	*/
	
	 /*  function Created by Venba Tamilmaran for listing the school after the filter */
	 function get_school_list_district_cate($district_id,$schoolcategory,$block_id){
        $this->db->select('a.udise_code,a.curr_stat,a.curstat_date,district_id,a.urbanrural,a.local_body_id,a.lb_vill_town_muni,a.cluster_id,a.panchayat_id,a.lb_habitation_id,
                           a.assembly_id,a.parliament_id,a.municipal_id,a.city_id,a.pincode,a.address,a.school_name,a.manage_cate_id,
                           a.sch_management_id,a.sch_cate_id,a.latitude,longitude,a.sch_email,a.sch_directorate_id,a.school_id,a.block_id,
                           a.edu_dist_id,a.sch_shortname,b.manage_name,c.management,d.department,e.category_name,f.school_type,
                           f.minority_sch,f.minority_yr,f.renewal_valid,f.rte,f.minority_grp,f.low_class,f.high_class,f.yr_last_renwl,f.certifi_no,
                           f.resid_schl,f.typ_resid_schl,f.shftd_schl,f.cwsn_scl,f.school_key_id,f.yr_estd_schl,f.yr_recogn_schl,f.yr_recgn_first,
                           f.yr_rec_schl_elem,f.yr_rec_schl_sec,f.yr_rec_schl_hsc,f.upgrad_prito_uprpri,f.upgrad_uprprito_sec,f.upgrad_secto_higsec,f.hill_frst,f.spl_edtor,f.scl_category,f.hill_frst as schl_situated,
                           g.angan_childs,g.angan_wrks,g.anganwadi,g.anganwadi_center,g.anganwadi_stu_b,g.anganwadi_stu_g,g.anganwadi_schl,
                           t1.app_status,t1.ceo_comments,t1.state_comments,t1.id as hist_pk') 
                 ->from('schoolnew_basicinfo a')
				 ->join('(select id,school_id ,app_status,ceo_comments,state_comments 
                            from schoolnew_basic_info_history 
                           where id in (select max(id) 
                                          from schoolnew_basic_info_history 
                                      group by school_id)) as t1','t1.school_id = a.school_id', 'left')
                 ->join('schoolnew_manage_cate b','b.id = a.manage_cate_id','left')
                 ->join('schoolnew_management c','c.id = a.sch_management_id','left')
                 ->join('schoolnew_school_department d','d.id = a.sch_directorate_id','left')
                 ->join('schoolnew_category e','e.id = a.sch_cate_id','left')
                 ->join('schoolnew_academic_detail f','f.school_key_id = a.school_id','left')
                 ->join('schoolnew_training_detail g','g.school_key_id = a.school_id','left')
                 ->where('a.district_id',$district_id)
                 ->order_by('a.school_id', 'asc');
                 if(!empty($schoolcategory))
                 {
                  $this->db->where('a.manage_cate_id',$schoolcategory);
                 }
                 if(!empty($block_id))
                 {
                  $this->db->where('a.block_id',$block_id);
                 }
                 // $this->db->limit(10);
       $result =  $this->db->get()->result();
       // print_r($this->db->last_query());
       return $result;
	 }
    
     function get_school_list_district_wise($district_id){
        $this->db->select('a.*,c.management,f.scl_category,f.school_type,f.low_class,f.high_class,g.mhrd_assign_date,g.mhrd_allot_date') 
                 ->from('schoolnew_basicinfo a')
                 ->join('schoolnew_management c','c.id = a.sch_management_id','left')
                 ->join('schoolnew_academic_detail f','f.school_key_id = a.school_id','left')
                 ->join('schoolnew_training_detail g','g.school_key_id = a.school_id','left')
                 ->where('a.district_id',$district_id);
       $result =  $this->db->get()->result();
       return $result;
     }
     
	public function get_allmajorcategory(){
		$this->db->select('*')
        ->from('schoolnew_manage_cate');           
        $query = $this->db->get(); 
        return $query->result();
    }
	
	public function get_subcategoryname(){
        $this->db->select('*')
        ->from('schoolnew_management');          
        $query = $this->db->get(); 
        return $query->result();
	}
	
	public function get_alldeptcategory(){
        $this->db->select('*')
        ->from('schoolnew_school_department');          
        $query = $this->db->get(); 
        return $query->result();
    }
	
	
	public function get_common_select_tables($select='',$table,$where='',$group_by=''){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($where)){
			$this->db->where($where);
        }
        if(!empty($group_by)){
          $this->db->group_by($group_by);
        }
        $result = $this->db->get()->result();
        return $result;
    }
	
	public function get_common_table_details($table,$where=''){           
        if(!empty($where)){
              $this->db->where($where[0],$where[1]);
        }
        return $this->db->get($table)->result();
    }
	// get the block details based on district
    function get_block($dist_id)
	   {
			$this->db->select('id,block_name');
			$this->db->from('schoolnew_block');
			$this->db->where('district_id',$dist_id);
			$query = $this->db->get();
			return $query->result();
       }
	function get_localBodyall($district_id){
      $this->db->select('*');
      $this->db->from('schoolnew_localbody_all');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();
   }
   function get_localBody($district_id){
      $this->db->select('*');
      $this->db->from('schoolnew_local_body');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();
   }
   function get_edudist($district_id){
      $this->db->select('*');
      $this->db->from('schoolnew_edn_dist_mas');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();
   }
    function get_hapitation($localbody_id){
      $this->db->select('*');
      $this->db->from('schoolnew_habitation_all');
	  $this->db->where('localbody_id',$localbody_id);
      $query =  $this->db->get();
      return $query->result();
   }
   function get_muncipality($district_id){

      $this->db->select('*');
      $this->db->from('schoolnew_municipality');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result();

   }
   function get_cluster($district_id){

      $this->db->select('*');
      $this->db->from('schoolnew_cluster_mas');
      $this->db->where('district_id',$district_id);
      $this->db->order_by("clus_name", "asc");
      $query =  $this->db->get();
      return $query->result();

   }
    function get_city($district_id)
   {
	  $this->db->select('*');
      $this->db->from('schoolnew_city');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result(); 
   }
   function get_parliament()
   {
	  $this->db->select('*');
      $this->db->from('schoolnew_parliament');
      $query =  $this->db->get();
      return $query->result(); 
   }
   function get_assembly($district_id)
   {
	   $this->db->select('*');
      $this->db->from('schoolnew_assembly');
      $this->db->where('district_id',$district_id);
      $query =  $this->db->get();
      return $query->result(); 
   }
   function check_ID($table,$where){
       
    $this->db->select('id');
    $this->db->from($table);
    $this->db->where($where);
    $result = $this->db->get();
    $id = $result->num_rows() > 0 ? $result->row()->id :'';
    return $id;
   }

   function insert_school_district_data($save)
   {
	 
	  $this->db->insert('schoolnew_basic_info_history',$save); 
      return $this->db->insert_id();
	
   }
   public function block_profile_completion_status($district_id,$school_type)
 {
 if($school_type !='')
		{
			$WHERE = " and school_type_id='".$school_type."'";
		}
		else{
			$WHERE =' '; 
		}
	$sql="select school_key_id,a.school_name,udise_code,block_name,
 part_1,part_2,part_3,part_4,part_5,part_6,part_7,part_8
   from schoolnew_profilecomplete
  left join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
  where district_id=".$district_id.$WHERE." group by school_key_id;";
// print_r($sql);
$query = $this->db->query($sql);
        return $query->result();
 }
	
  public function get_RTE_districtwise_school_list($dist_id,$school_cat,$block_id ='')
  {
      $direct_id = array(27,29,28);
      $this->db->select('c.id,a.block_name,a.school_type,a.udise_code,a.school_name,a.school_id,IFNULL(c.acad_year,0) as asad_year,c.entry_class,c.rte_seats,c.section_nos,c.total_seats,d.latitude,d.longitude')
                ->join('schoolnew_academic_detail b','b.school_key_id = a.school_id')
                ->join('schoolnew_rte c','c.school_key_id = a.school_id','left')
                ->join('schoolnew_basicinfo d','d.school_id = a.school_id','left')
                ->where('a.district_name',$dist_id)
                ->where('b.rte',1);                
      if(!empty($block_id))
      {
        $this->db->where('block_name',$block_id);
      }
      $result = $this->db->get('students_school_child_count a')->result();
      return $result;
  }

  public function save_RTE_school_list($save_data)
  {
      if($save_data['id'] !=''){
          $this->db->where('id',$save_data['id']);
          $this->db->update('schoolnew_rte',$save_data);
          return $save_data['id'];
      }else{
      $this->db->insert('schoolnew_rte',$save_data);
      return $this->db->insert_id();
      }      
  }
  function getallblocksbydist($district_id){
      
      $query="select scb.id,scb.block_code,scb.block_name,scb.district_id,(select count(std.school_id)  from students_school_child_count std where block_id=scb.id) as total_schools,(select count(sc1.school_id)  from students_school_child_count std  join schoolnew_zonal_schools sc1 ON sc1.school_id= std.school_id where block_id=scb.id and sc1.isactive=1) as zonal_schools ,(select count(sc2.subschool_id)  from students_school_child_count std  join schoolnew_zonal_subschools sc2 ON sc2.subschool_id= std.school_id where block_id=scb.id and sc2.isactive=1) as sub_zonal_schools, (select total_schools -(count(sc1.school_id) + count(sc2.subschool_id))  from students_school_child_count std left join schoolnew_zonal_schools sc1 ON sc1.school_id= std.school_id and sc1.isactive=1 left join schoolnew_zonal_subschools sc2 ON sc2.subschool_id= std.school_id and sc2.isactive=1  where block_id=scb.id) as un_assigned,(select staff_reg.teacher_name from udise_staffreg staff_reg join schoolnew_brte_map map ON map.brte_id=staff_reg.u_id where map.isactive=1 and map.map_type=1 and staff_reg.archive=1 and map.block_id=scb.id group by staff_reg.u_id limit 1 ) as BRTE_NAME,(select staff_reg.u_id from udise_staffreg staff_reg join schoolnew_brte_map map ON map.brte_id=staff_reg.u_id where map.isactive=1 and map.map_type=1 and staff_reg.archive=1 and map.block_id=scb.id group by staff_reg.u_id limit 1 ) as BRTE_ID from schoolnew_block scb where scb.district_id=$district_id";
       $result = $this->db->query($query)->result();
        return $result;
  }
  function getallschoolsbyblock($district_id){
	  $schooltype = array(1,2,4);
       $this->db->select('block_id,school_id,school_name'); 
       $this->db->from('schoolnew_basicinfo');
       $this->db->where('district_id',$district_id); 
	   $this->db->where_in('manage_cate_id',$schooltype); 
       $query =  $this->db->get();
       return $query->result();
  }
  public function getTeacherlist($school_id) {
		
        $query = 'SELECT teacher_name,teacher_code,u_id 
		FROM udise_staffreg  
		WHERE archive=1 and udise_staffreg.school_key_id = ' . $school_id;
        $result = $this->db->query($query)->result();
        return $result;
    }
	public function getTeacherpindics($teacherid) {
		
        $query = 'SELECT hm_ev_status,status,teacher_id 
		FROM teacher_pindics  
		WHERE  teacher_pindics.teacher_id = ' . $teacherid;
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_flash_news($dist_id,$user_id,$usertype_id)
    {

       $this->db->select('schoolnew_flashnews.*,user_category.user_type')
                     ->from('schoolnew_flashnews')
                     ->join('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                     ->where('district_name',$dist_id)
                     ->where('created_by',$user_id)
                     ->where('created_type_id',$usertype_id)
                     ->or_where('authority',$usertype_id)
                     ->group_by('updated_date')
                     ->order_by('schoolnew_flashnews.id DESC')
                     ->limit(10);

              $flash_result = $this->db->get()->result();
              // print_r($this->db->last_query());
              // print_r($flash_result);die;
              return $flash_result;
    }

    public function getallschoolbydist($block)
    {
        
     //$query = "select school_id as SchlID,school_name as SchlName,block_name as BlckName,udise_code as UdiseCode from students_school_child_count where block_id= $block and school_type_id =1 and catty_id in(4,5)";
     
    //  $query = "select students_school_child_count.school_id as SchlID,students_school_child_count.school_name as SchlName,students_school_child_count.block_name as BlckName,students_school_child_count.udise_code as UdiseCode from
    //  students_school_child_count left join schoolnew_zonal_schools on students_school_child_count.school_id = schoolnew_zonal_schools.school_id where students_school_child_count.block_id = $block and students_school_child_count.school_type_id =1 and students_school_child_count.catty_id in(4,5) and schoolnew_zonal_schools.school_id is null;";
     $query = "select students_school_child_count.block_id,students_school_child_count.school_id as SchlID,students_school_child_count.school_name as SchlName,students_school_child_count.block_name as BlckName,students_school_child_count.udise_code as UdiseCode from    students_school_child_count where students_school_child_count.block_id = $block and students_school_child_count.school_type_id =1 and students_school_child_count.catty_id in(4,5) and school_id not in (select school_id from schoolnew_zonal_schools s where id in (select max(id) from schoolnew_zonal_schools group by school_id ) and isactive=1 );";
     $return_value =  $this->db->query($query);
     return $return_value->result_array();
    }
     public function getallsubschoolbydist($school)
    {

      $get_block = "select block_id from students_school_child_count where school_id=$school";
      $block_value =  $this->db->query($get_block);
      $block_res =  $block_value->result_array();

      $block_id = $block_res[0]['block_id'];
      $query = "select school_id SchlID,school_name as SchlName,block_name as BlckName,udise_code as UdiseCode,school_type as SchoolType from students_school_child_count where block_id= $block_id and school_id NOT IN(select school_id from schoolnew_zonal_schools where isactive=1) and school_id NOT IN(select subschool_id from schoolnew_zonal_subschools where isactive=1)";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }

    public function Save_zonalSchools($records)
    {
     
       for($i=0;$i<count($records);$i++)
        {
            $set_array = array('school_id' => $records[$i]['school_id'],'zonal_id'=> $records[$i]['zonal_id'],'created_at'=>date('Y-d-m h:i:s'));
            $this->db->insert('schoolnew_zonal_schools', $set_array); 

        }
 
          if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        return FALSE;
     
    }

     public function Save_zonal_Sub_Schools($records)
    {
     
     
       for($i=0;$i<count($records['records']);$i++)
        {
            $set_array = array('subschool_id' => $records['records'][$i]['SubSchlID'],'zonal_id'=> $records['ZonalID'],'created_at'=>date('Y-d-m h:i:s'));
            $this->db->insert('schoolnew_zonal_subschools', $set_array); 

        }
 
          if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        return FALSE;
     
    }
    public function Save_zonal_BRTE_TECHER($records)
    {  
        $brte_map = $records['0']['MapType'];
        $brte_id = $records['0']['BrteID'];
        $zonal_id = $records['0']['ZonalID'];


        if($brte_map == '2'){
           for($i=0;$i<count($records);$i++)
           {

          $sql = "update schoolnew_brte_map set isactive = 0 where map_type = 2 and zonal_id ='".$records[$i]['ZonalID']."'";
          $query = $this->db->query($sql);
          $affectedRows=$this->db->affected_rows();

           }

          
        }
          
       if($brte_map == '1'){
           for($i=0;$i<count($records);$i++)
           {
           
          $sql = "update schoolnew_brte_map set isactive = 0 where map_type = 1 and block_id ='".$records[$i]['BlockID']."'";
          $query = $this->db->query($sql);
        
          $affectedRows=$this->db->affected_rows();

           }

          
        }

        for($i=0;$i<count($records);$i++)
        {        
            $set_array = array('brte_id' => $records[$i]['BrteID'],'map_type'=>$records[$i]['MapType'], 'zonal_id'=> $records[$i]['ZonalID'],'block_id'=> $records[$i]['BlockID'], 'created_at'=>date('Y-d-m h:i:s'));
            $this->db->insert('schoolnew_brte_map', $set_array); 
        }
        if ($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getallZonalschool($blck_id)
    {
      //isactivw=1
      //$query = "select zone_sch.school_id as SchlID,std.school_name as SchlName,zone_sch.zonal_id as ZonalID from students_school_child_count std JOIN schoolnew_zonal_schools zone_sch ON  zone_sch.school_id=std.school_id where district_id= $dist";
      $query = "select zone_sch.school_id as SchlID,std.school_name as SchlName,zone_sch.zonal_id as ZonalID from students_school_child_count std JOIN schoolnew_zonal_schools zone_sch ON zone_sch.school_id=std.school_id where std.block_id= $blck_id and zone_sch.isactive=1";
      $return_value =  $this->db->query($query);
      //print_r($this->db->last_query());die();
      return $return_value->result_array();
    }

    public function getallSubZonalschool($dist)
    {
      $query = "select zone_sch.subschool_id as SchlID,std.school_name as SchlName,zone_sch.zonal_id as ZonalID from students_school_child_count std JOIN schoolnew_zonal_subschools zone_sch ON  zone_sch.subschool_id=std.school_id where district_id= $dist and zone_sch.isactive=1";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
    }

    public function getzonalschoolbyblock($block_id)
    {
     //$query = "select sch.school_id as SchlID,std.school_name as SchlName,sch.zonal_id as ZonalID from students_school_child_count std join schoolnew_zonal_schools sch ON sch.school_id = std.school_id where std.block_id=$block_id";
     $query = "select sch.school_id as SchlID,std.school_name as SchlName,sch.zonal_id as ZonalID from students_school_child_count std
     join schoolnew_zonal_schools sch ON sch.school_id = std.school_id right join schoolnew_zonal_subschools sub_schl on sub_schl.zonal_id = sch.zonal_id where std.block_id=$block_id and sch.isactive = 1 and sub_schl.isactive=1 group by sch.zonal_id;";
     $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
    }

    public function getzonalallbyblock($block_id)
    {
       $query = "select sch.school_id as ZonalSchlID,std.school_name as SchlName,sch.zonal_id as ZonalID,subsch.subschool_id as ZonalSubSchlID,brte_map.brte_id as BrteID from students_school_child_count std left join schoolnew_zonal_schools sch ON sch.school_id = std.school_id left join schoolnew_zonal_subschools subsch ON subsch.zonal_id = sch.zonal_id left join schoolnew_brte_map brte_map ON brte_map.zonal_id = sch.zonal_id where std.block_id=$block_id group by sch.zonal_id,brte_map.zonal_id";
      $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
     
    


    }
    public function Delete_zonal_Schools($school)
    {
      
      $query = "select zonal_id from schoolnew_zonal_schools where school_id=$school";
      $return_value =  $this->db->query($query);
      $zonal_code =  $return_value->result_array(); 
      $zonal_id= $zonal_code[0]['zonal_id'];

    if(!empty($zonal_id))
    {
   $exceute = "update schoolnew_zonal_schools sch  LEFT JOIN schoolnew_zonal_subschools subsch ON subsch.zonal_id = sch.zonal_id   LEFT JOIN schoolnew_brte_map b_map ON b_map.zonal_id = sch.zonal_id  set sch.isactive=0, subsch.isactive=0,b_map.isactive=0,sch.created_at='".date('Y-m-d H:i:s')."' WHERE sch.zonal_id =$zonal_id";
      $query = $this->db->query($exceute);
      $affectedRows=$this->db->affected_rows();
      return $affectedRows;
    }
    return false;

    }
    public function Delete_zonal_SubSchools($school)
    {
      
      if(!empty($school))
    {
       $exceute = "update schoolnew_zonal_subschools subsch set subsch.isactive=0,subsch.created_at='".date('Y-m-d H:i:s')."' WHERE subsch.subschool_id =$school";
      $query = $this->db->query($exceute);
      $affectedRows=$this->db->affected_rows();
      return $affectedRows;
 
    }
     return false;
  }
   
    
    public function get_zonal_school_types($zonal_id)
    {

     if(!empty($zonal_id))
    {
    $query = "select COUNT(CASE WHEN std.school_type_id = 1 then 1 ELSE NULL END) as 'Government',COUNT(CASE WHEN std.school_type_id = 2 then 1 ELSE NULL END) as 'Fully_Aided',COUNT(CASE WHEN std.school_type_id = 3 then 1 ELSE NULL END) as 'Un_Aided',COUNT(CASE WHEN std.school_type_id = 4 then 1 ELSE NULL END) as 'Partially_Aided',COUNT(CASE WHEN std.school_type_id = 5 then 1 ELSE NULL END) as 'Central_Goverment' from students_school_child_count std left join schoolnew_zonal_subschools sc2 ON sc2.subschool_id=std.school_id and sc2.isactive=1 and sc2.zonal_id=$zonal_id where  sc2.isactive=1 and sc2.zonal_id=$zonal_id";
      $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
    }
    return false;

    }
    public function get_zonal_schools($block)
    {
      if(!empty($block))
    {
    $query = "select count(sc1.school_id) as Total_ZonalSchoolsCount from students_school_child_count std join schoolnew_zonal_schools sc1 ON sc1.school_id = std.school_id where std.block_id=$block";
      $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
  
    }
    return false;
    }
    
     public function get_all_schools($block)
    {
      if(!empty($block))
    {
    $query = "select count(std.school_id) as AllTotalSchoolsCount from students_school_child_count std  where std.block_id=$block";
      $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
  
    }
    return false;
    }
    public function get_zonal_sub_schools($block)
    {
      if(!empty($block))
    {
    $query = "select count(sc1.school_id) + count(sc2.subschool_id)  as TotalZonal_SubZonal_SchoolsCount from students_school_child_count std join schoolnew_zonal_schools sc1 ON sc1.school_id = std.school_id  join schoolnew_zonal_subschools sc2 ON sc2.subschool_id = std.school_id where std.block_id=$block";
      $return_value =  $this->db->query($query);
     return $return_value->result_array(); 
  
    }
    return false;
    }


	
}
?>