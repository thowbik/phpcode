

 <?php

class Csr_admin_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }

 function mial_load_display($id)
 {
  $id_get = $id['id'];
  //echo $id_get;
  $this->db->select('mail_code,from_mail,mail_comment,display_name,content,id,subject')
           ->from('csr_mail_contents')
           ->where('id',$id_get);
    
       $query =  $this->db->get();
   
       return $query->result_array();

 }
public function insert_image($req_id,$comment,$school_id) {
    

$insert_datas = array('update_status' => $comment,'created_by'=>$school_id,'fk_req_id' => $req_id,'img_url_1'=> $_FILES['files']['name'][0],'img_url_2'=>$_FILES['files']['name'][1],'img_url_3' => $_FILES['files']['name'][2]);
 $ins = $this->db->insert('csr_school_req_updates',$insert_datas);

 if ($ins == true) 
 {
 $sql= "SELECT b.id as req,d.school_name,a.id,a.update_status,a.created_by,convert_tz(a.`updated_on`,'+00:00','+05:30')as updated_on FROM csr_school_req_updates a
JOIN csr_school_requirements b ON a.`created_by` = b.`id`
JOIN students_school_child_count d ON d.`school_id` = a.`created_by`
WHERE a.created_by = $school_id and a.fk_req_id = $req_id";


//print_r($sql);
//die();
       $query = $this->db->query($sql);
     //  print_r($this->db->last_query($query));
       return $query->result_array();

  }

  }
  function get_csr_user_contributions()
  {
     // $this->db->distinct('csr_contributions.id');
      $this->db->select('csr_contributions.user_id,merchant_txn_id,csr_contributions.cont_towards,csr_contributions.payment_ref,csr_contributions.gen_dev_fund_remarks,csr_contributions.mat_delivery_point,csr_contributions.mat_delivery_date,csr_contributions.cont_type,csr_contributions.payment_mode,csr_contributions.amount,csr_user.name,csr_contributions.timestamp,csr_contributions.status,csr_contributions.payment_type,csr_contributions.cheque_drop_address,csr_contributions.mode_of_deposit,csr_contributions.payment_date,csr_contributions.bank_branch')
              ->from('csr_contributions')  
              ->join('csr_user','csr_user.id = csr_contributions.user_id','left')
              ->join('csr_txn_details','csr_txn_details.con_id =  csr_contributions.id and csr_txn_details.user_id =csr_user.id','left');
      $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
	 $this->db->group_by('csr_contributions.id');
      $query =  $this->db->get();
	 // print_r($this->db->last_query($query));
      return $query->result_array();       

   }
   
  function get_csr_mail_details()
  {
  $this->db->select('mail_code,from_mail,mail_comment,display_name,content,id,subject')
           ->from('csr_mail_contents');
    
       $query =  $this->db->get();
    
       return $query->result_array();
          
   }
   function save_csr_mail_details($string)
  {
  
  $this->db->insert('csr_mail_contents',$string);
  
             
    
       
   }
   function save_update_mail_details($data)
   {
     
     $this->db->where('id',$data['id']);
    $update = $this->db->update('csr_mail_contents',$data);
    //  
   
            if($update == 1)
            {
              return true;
            }
            else
            {
              return false;
            }
          
   }

    
   public function update_admin_page($data)
  {

    $this->db->where('id',$data['id']);
    $update = $this->db->update('csr_contributions',$data);
    //  
   
            if($update == 1)
            {
              
              
               $this->db->where('cont_id',$data['id']);
               $this->db->set('status',$data['status']);
                $this->db->update('csr_contribution_details');
                
               return true;
             
            }
            else
            {
              return false;
            }
   }
   public function update_child_list_model($child_data)
  {


               $this->db->where('id',$child_data['id']);
               $this->db->set('status',$child_data['status']);
              $results = $this->db->update('csr_contribution_details');
              //  
    
            if($results == 1)
            {
              return true;
             
            }
            else
            {
              return false;
            }
   }
   public function get_school_id_district($Id) {

    $this->db->select ('convert_tz(csr_contributions.timestamp,"+00:00","+05:30") as time,csr_contribution_details.req_id,csr_contribution_details.cont_id,csr_contribution_details.qty,csr_contribution_details.status,csr_contribution_details.amount,csr_contribution_details.id,students_school_child_count.district_name,students_school_child_count.school_name'); 
    $this->db->from ('csr_contributions');
    $this->db->join ('csr_contribution_details','csr_contribution_details.cont_id = csr_contributions.id','left');
    $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_contribution_details.school_id','left');
   $this->db->where ('csr_contribution_details.cont_id',$Id);
   //$this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
   //  

    $query = $this->db->get();
    return $query->result();

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

  
return $query->result_array();
       
            
   }

   function get_contribution_user($id)
   {
      $this->db->select('csr_contributions.user_id,csr_contributions.id,csr_contributions.payment_ref,csr_contributions.gen_dev_fund_remarks,csr_contributions.mat_delivery_point,csr_contributions.mat_delivery_date,csr_contributions.cont_type,csr_contributions.payment_mode,csr_contributions.amount,csr_user.name,csr_contributions.timestamp,csr_contributions.status,csr_contributions.payment_type,csr_contributions.cheque_drop_address,csr_contributions.mode_of_deposit,csr_contributions.payment_date,csr_contributions.bank_branch')
    ->from('csr_contributions')
    ->join('csr_user','csr_user.id = csr_contributions.user_id','left')
    ->where('csr_contributions.user_id',$id);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))<='2019-11-04'");

    
  
    

    

    // csr_contributions.payment_date,csr_contributions.bank_branch,csr_contributions.mode_of_deposit,csr_contributions.cheque_drop_address
    
       $query =  $this->db->get();
    //  

       return $query->result_array();
          
 
          
   }

   function get_csr_contribution_to_user($id)
  {

  $this->db->select('csr_user.id,csr_user.name,csr_user.mobile,csr_user.email,csr_user.created_on,csr_user_org.orgname,csr_user_org.org_address,csr_user_org.org_pan,csr_user_org.org_address,csr_user.profile_share,csr_user.notify_pref')
  ->from('csr_user_org')
  ->join('csr_user','csr_user.id = csr_user_org.id','left')
  ->where('csr_user.id',$id)
  ->group_by("CASE WHEN csr_user.name IS NOT NULL THEN csr_user.name END",FALSE)
  ->order_by("csr_user.name", "asc");
  $this->db->where("date(CONVERT_TZ(csr_user.updated_on,'+00:00','+05:30'))>='2019-11-04'");
   // csr_contributions.payment_date,csr_contributions.bank_branch,csr_contributions.mode_of_deposit,csr_contributions.cheque_drop_address
    
       $query =  $this->db->get();
 //  
  
return $query->result_array();
       
            
   }
   function school_requirement_details()
   {
    // $this->db->select('csr_school_requirements.school_id,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit) as req_amount,csr_contribution_details.req_id,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit)-sum(csr_contribution_details.amount) as pending');
    // // $this->db->set('amount','amount - 10',FALSE);
    //  $this->db->from('csr_school_requirements');

    //  $this->db->join('csr_material_master','csr_school_requirements.mat_id = csr_material_master.id','left');
    //  $this->db->join ('csr_contribution_details','csr_school_requirements.id = csr_contribution_details.req_id','left');
   
    //   $where = '(csr_contribution_details.status="FUNDS_RECEIVED" or csr_contribution_details.status = "MAT_RECEIVED")';
      
    // $this->db ->where($where);
    //  $query = $this->db->get();
    // //  
    //  return $query->result_array();
  $this->db->select('count(csr_school_requirements.school_id) as school,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit) as req_amount,sum(csr_contribution_details.amount) as received_amt');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_school_requirements');

     $this->db->join('csr_material_master','csr_school_requirements.mat_id = csr_material_master.id','left');
     $this->db->join ('csr_contribution_details','csr_school_requirements.id = csr_contribution_details.req_id','left');
   
      $where = '(csr_contribution_details.status="FUNDS_RECEIVED" or csr_contribution_details.status = "MAT_RECEIVED")';

      
    $this->db ->where($where);
     $query = $this->db->get();
    //print_r($this->db->last_query());// die;  
     return $query->result_array();


   }
    function csr_user_count_for_dashboard()
   {
     $this->db->select('count(distinct id) as user');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_user');

   
     
     $count_user = $this->db->get()->result_array();


$this->db->select('count(distinct id) as total_user');
    // $this->db->set('amount','amount - 10',FALSE);
     $this->db->from('csr_user');
     
 $this->db->where("day(CONVERT_TZ(csr_user.created_on,'+00:00','+05:30')) = day(NOW())");
     
     $total_user = $this->db->get()->result_array();



     $user_details = array('count' => $count_user,'total' => $total_user);
     return $user_details;
   }

 function csr_user_count_for_today_details()
   {

   $this->db->select("count(distinct csr_contributions.user_id) as count_name,sum(csr_contributions.amount) as sum_amount,csr_contributions.user_id,day(NOW()),day(CONVERT_TZ(csr_contributions.updatedon,'+00:00','+05:30')) ");
  //$this->db->set('amount','amount - 10',FALSE);
   $this->db->from('csr_contributions');
    $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
    $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");

    $this->db->where("day(CONVERT_TZ(csr_contributions.updatedon,'+00:00','+05:30')) = day(NOW())");

    $query = $this->db->get();


    // print_r($this->db->last_query());
     return $query->result_array();

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
     $query = $this->db->get();
    //  
     return $query->result_array();
   }
   function csr_user_count()
   {

   $this->db->select('count(distinct csr_contributions.user_id) as count_name,csr_contributions.user_id,sum(csr_contributions.amount) as amount');
  //$this->db->set('amount','amount - 10',FALSE);
   $this->db->from('csr_contributions');
    $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
    $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
    $this->db ->where($where);
    $this->db->where("date(CONVERT_TZ(csr_contributions.timestamp,'+00:00','+05:30'))>='2019-11-04'");
    $query = $this->db->get();
    //  
     return $query->result_array();

   }
   function csr_user_contribute_type()   {

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


//for last One month Registers

  // $this->db->select('count(distinct csr_contributions.user_id) as count_name');
  // //$this->db->set('amount','amount - 10',FALSE);
  //  $this->db->from('csr_contributions');
  //   $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
    

  // $this->db->where('csr_user.created_on BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()');
  //  $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
      
  //    $this->db ->where($where);

 
  
  //    $query_last = $this->db->get()->result_array();
    
     



     // $merge = array('fund' => $fund_query,'material' => $material_query,'online'=>$online_mode,'offline'=>$offline_mode,'last_month' => $query_last);





    // foreach ($merge['last_month'] as $key => $values) {
    //  // print_r($values['count_name']);
    //  // print_r("YES");
    //   }

     //for last Two Months

  //  $this->db->select('count(distinct csr_contributions.user_id) as count_name,csr_user.created_on');
  // //$this->db->set('amount','amount - 10',FALSE);
  //  $this->db->from('csr_contributions');
  //   $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
  //  $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
      
    
  //    $this->db ->where($where);
  //  $this->db->where('csr_user.created_on BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
 
  
  //    $query_last_two_month = $this->db->get()->result_array();



     //For last 1 day
  //     $this->db->select('count(distinct csr_contributions.user_id) as count_name');
  // //$this->db->set('amount','amount - 10',FALSE);
  //  $this->db->from('csr_contributions');
  //  $this->db->join ('csr_user','csr_contributions.user_id = csr_user.id','left');
  //    $where ='(csr_contributions.status = "FUNDS_RECEIVED" or csr_contributions.status = "MAT_RECEIVED")';
      
    
  //    $this->db ->where($where);
  //  $this->db->where('csr_user.created_on BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()');
 
  
  //    $query_last_one_day = $this->db->get()->result_array();

    
     $merge = array('fund' => $fund_query,'material' => $material_query,'online'=>$online_mode,'offline'=>$offline_mode,'last_two_month' => $query_last_two_month,'last_month' => $query_last,'last_one_day' => $query_last_one_day);


     return $merge;





   }

    public function dist_block_school_propose() {

    $this->db->select ('convert_tz(csr_contributions.timestamp,"+00:00","+05:30") as time,csr_contribution_details.req_id,csr_contribution_details.cont_id,csr_contribution_details.qty,csr_contribution_details.status,csr_contribution_details.amount,csr_contribution_details.id,students_school_child_count.district_name,students_school_child_count.school_name'); 
    $this->db->from ('csr_contributions');
    $this->db->join ('csr_contribution_details','csr_contribution_details.cont_id = csr_contributions.id','left');
    $this->db->join ('students_school_child_count','students_school_child_count.school_id = csr_contribution_details.school_id','left');
   $this->db->where ('csr_contribution_details.cont_id',$Id);

   //  

    $query = $this->db->get();
    return $query->result();

  }
   

  } 
?>