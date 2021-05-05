<?php

class Csradmin_model extends CI_Model
{
    function __construct() 
	  {
      parent::__construct();
      $this->load->library('AWS_S3');
    }


    function get_pending_details_users()
   {  
  
     $this->db->select('csr_school_requirements.mat_id,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit) as req_amount,csr_contribution_details.req_id,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit)-sum(csr_contribution_details.amount) as pending');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_school_requirements');

     $this->db->join('csr_material_master','csr_school_requirements.mat_id = csr_material_master.id','left');    
       $this->db->join ('csr_contribution_details','csr_school_requirements.id = csr_contribution_details.req_id','left');
 
      $where = '(csr_contribution_details.status="FUNDS_RECEIVED" or csr_contribution_details.status = "MAT_RECEIVED")';
      
    $this->db ->where($where);
     $query1 = $this->db->get();
    //  
     //return $query->result_array();
   

   

   $this->db->select('count(distinct csr_contributions.user_id) as count_name,csr_contributions.user_id,sum(csr_contributions.amount) as amount');
  //$this->db->set('amount','amount - 10',FALSE);
   $this->db->from('csr_contributions');
    $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
    $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
    $query2 = $this->db->get();
    //  
    // return $query->result_array();


    //for FUNDS total
     $this->db->select('csr_contributions.cont_type,sum(csr_contributions.amount) as total');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_contributions');
      $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');

   $where = '(csr_contributions.status = "FUNDS_RECEIVED" and csr_contributions.cont_type = "1")';
     $this->db->where($where);
    
      $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");


   
     
     $fund_query = $this->db->get()->result_array();
     //$fund_query->result_array();
    //  
     
//for Material Total
     $this->db->select('csr_contributions.cont_type,csr_contribution_details.status,sum(csr_contribution_details.amount) as total');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_contributions');
     $this->db->join ('csr_contribution_details','csr_contributions.id = csr_contribution_details.cont_id','left');
   
     $this->db->where('csr_contribution_details.status','MAT_RECEIVED');
   $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
     
     $material_query = $this->db->get()->result_array();
     //$material_query->result_array();
    //  
    
    //for Online Total
     $this->db->select('sum(csr_contributions.amount) as online');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_contributions');
   
      $where = '(csr_contributions.status ="FUNDS_RECEIVED" and csr_contributions.cont_type ="1" and payment_mode="1")';
      
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
     $online_mode= $this->db->get()->result_array();



//for Offline TOtal
     $this->db->select('sum(csr_contributions.amount) as offline');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_contributions');
    
       
      $where = '(csr_contributions.status ="MAT_RECEIVED" and csr_contributions.cont_type = "2" and payment_mode="2")';
      
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
     $offline_mode= $this->db->get()->result_array();



    $this->db->select('count(csr_school_requirements.school_id) as school,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit) as req_amount,sum(csr_contribution_details.amount) as received_amt');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_school_requirements');

     $this->db->join('csr_material_master','csr_school_requirements.mat_id = csr_material_master.id','left');
     $this->db->join ('csr_contribution_details','csr_school_requirements.id = csr_contribution_details.req_id','left');
   
      $where = '(csr_contribution_details.status="FUNDS_RECEIVED" or csr_contribution_details.status = "MAT_RECEIVED")';

      
    $this->db ->where($where);
     $query = $this->db->get();
    //print_r($this->db->last_query());// die;  
     $school_req = $query->result_array();


$this->db->select('count(distinct id) as user');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_user');

   
     
     $count_user = $this->db->get()->result_array();


$this->db->select('count(distinct id) as total_user');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_user');
     
 $this->db->where("day(CONVERT_TZ(csr_user.created_on,'+00:00','+05:30')) = day(NOW())");
     
     $reg_user = $this->db->get()->result_array();
 

    $this->db->select("count(distinct csr_contributions.user_id) as supporter_count,sum(csr_contributions.amount) as sum_amount,csr_contributions.user_id,day(NOW()),day(CONVERT_TZ(csr_contributions.updatedon,'+00:00','+05:30')) ");
  //$this->db->set('amount','amount - 10',FALSE);
   $this->db->from('csr_contributions');
    $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
    $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");

    $this->db->where("day(CONVERT_TZ(csr_contributions.updatedon,'+00:00','+05:30')) = day(NOW())");

    $query = $this->db->get();


    // print_r($this->db->last_query());
     $support_today = $query->result_array();

     
     
     $get_all['dashboard'] = array('total_req'=>$query1->result_array(),'total_support_received'=>$query2->result_array(),'today_Registered Users' => $reg_user,'total_registered_users'=>$count_user,'fund' => $fund_query,'material' => $material_query,'online'=>$online_mode,'offline'=>$offline_mode,'last_two_month' => $query_last_two_month,'last_month' => $query_last,'last_one_day' => $query_last_one_day,'total_school_details'=>$school_req,'support_received_today' => $support_today);
      return $get_all;

   
}

	function get_csr_user_list()
	{
         $this->db->select('csr_user.id,csr_user.name,csr_user.mobile,csr_user.email,csr_user.created_on,csr_user_org.orgname,csr_user_org.org_address,csr_user_org.org_pan,csr_user_org.org_other_details,csr_user.profile_share,csr_user.notify_pref')
		  ->from('csr_user_org')
		  ->join('csr_user','csr_user.id = csr_user_org.id','left')
		  ->group_by("CASE WHEN csr_user.name IS NOT NULL THEN csr_user.name END",FALSE)
		  ->order_by("csr_user.name", "asc");
		   // csr_contributions.payment_date,csr_contributions.bank_branch,csr_contributions.mode_of_deposit,csr_contributions.cheque_drop_address
		    
		    $query =  $this->db->get();

  
            $user_list['user_list'] = $query->result_array();
            return $user_list;

	}
	function get_user_contribution_detials($id)
	{
          $this->db->select('csr_contributions.user_id,csr_contributions.id,csr_contributions.payment_ref,csr_contributions.gen_dev_fund_remarks,csr_contributions.mat_delivery_point,csr_contributions.mat_delivery_date,csr_contributions.cont_type,csr_contributions.payment_mode,csr_contributions.amount,csr_user.name,csr_contributions.timestamp,csr_contributions.status,csr_contributions.payment_type,csr_contributions.cheque_drop_address,csr_contributions.mode_of_deposit,csr_contributions.payment_date,csr_contributions.bank_branch')
    ->from('csr_contributions')
    ->join('csr_user','csr_user.id = csr_contributions.user_id','left')
    ->where('csr_contributions.user_id',$id);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))<='2019-11-04'");
    $contribution_list =  $this->db->get()->result_array();  
    


  $this->db->select('csr_user.id,csr_user.name,csr_user.mobile,csr_user.email,csr_user.created_on,csr_user_org.orgname,csr_user_org.org_address,csr_user_org.org_pan,csr_user_org.org_address,csr_user.profile_share,csr_user.notify_pref')
  ->from('csr_user_org')
  ->join('csr_user','csr_user.id = csr_user_org.id','left')
  ->where('csr_user.id',$id)
  ->group_by("CASE WHEN csr_user.name IS NOT NULL THEN csr_user.name END",FALSE)
  ->order_by("csr_user.name", "asc");
  $this->db->where("date(CONVERT_TZ(csr_user.updated_on,'+00:00','+05:30'))>='2019-11-04'");
   // csr_contributions.payment_date,csr_contributions.bank_branch,csr_contributions.mode_of_deposit,csr_contributions.cheque_drop_address
   
       $user_list =  $this->db->get()->result_array();
 //  
  
     

      $user_contribution = array('user_details' => $user_list,'contribution_details' => $contribution_list);
      return $user_contribution;

	}
	public function get_csr_need_list()
	{



	$this->db->select('district_id,district_name,sum(qty)as qty,count(csr_school_requirements.school_id) as school_id')
  ->from('csr_school_requirements')
  ->join('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id ','left')
  ->join('students_school_child_count','students_school_child_count.school_id = csr_school_requirements.school_id ','left')
  ->join('csr_category_master','csr_category_master.id = csr_school_requirements.cat_id ','left')
  ->join('csr_subcategory_master','csr_subcategory_master.id = csr_school_requirements.sub_cat_id ','left')

  ->where('csr_school_requirements.isactive',1)
  ->group_by("district_id");
 


		       
			  $user_list =  $this->db->get()->result_array();
			  return $user_list;
	}
	public function get_csr_need_list_district_wise($dist){
		
                 $this->db->select('block_id,block_name,sum(qty)as qty,sum(qty)as qty,count(csr_school_requirements.school_id) as school_id,material_name,sub_cat_name,cat_name')
				  ->from('csr_school_requirements')
				  ->join('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id ','left')
				  ->join('students_school_child_count','students_school_child_count.school_id = csr_school_requirements.school_id ','left')
				  ->join('csr_category_master','csr_category_master.id = csr_school_requirements.cat_id ','left')
				  ->join('csr_subcategory_master','csr_subcategory_master.id = csr_school_requirements.sub_cat_id ','left')
				  ->where('csr_school_requirements.isactive',1)
				  ->where('students_school_child_count.district_id',$dist)
				  ->group_by("block_id");
				  $user_list =  $this->db->get()->result_array();
			       return $user_list;
	}

	public function get_csr_need_list_block_wise_school($block)
	 {


	       	     $this->db->select('csr_school_requirements.school_id,school_name,sum(qty)as qty,material_name,sub_cat_name,cat_name')
	 			  ->from('csr_school_requirements')
	 			  ->join('csr_material_master','csr_material_master.id = csr_school_requirements.mat_id ','left')
	 			  ->join('students_school_child_count','students_school_child_count.school_id = csr_school_requirements.school_id ','left')
	 			  ->join('csr_category_master','csr_category_master.id = csr_school_requirements.cat_id ','left')
	 			  ->join('csr_subcategory_master','csr_subcategory_master.id = csr_school_requirements.sub_cat_id ','left')
	 			  ->where('csr_school_requirements.isactive',1)
	 			  ->where('students_school_child_count.block_id',$block)
	 			  ->group_by("students_school_child_count.school_id,material_name");


	 			  $user_list =  $this->db->get()->result_array();
	 		       return $user_list;
	 }

   public function get_csr_user_contributions()
  {
      $this->db->distinct('csr_contributions.id');
      $this->db->select('csr_contributions.id,csr_contributions.user_id,merchant_txn_id,csr_contributions.cont_towards,csr_contributions.amount,csr_user.name,csr_contributions.timestamp,csr_contributions.status,csr_contributions.payment_type,csr_contributions.mode_of_deposit,csr_contributions.payment_date,csr_contributions.bank_branch')
               ->from('csr_contributions')  
              ->join('csr_user','csr_user.id = csr_contributions.user_id','left')
              ->join('csr_txn_details','csr_txn_details.con_id =  csr_contributions.id and csr_txn_details.user_id =csr_user.id','left');
      $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
   $this->db->group_by('csr_contributions.id');
     $query =  $this->db->get();
   // // print_r($this->db->last_query($query));
      return $query->result_array();       

   }

}
      

 

?>