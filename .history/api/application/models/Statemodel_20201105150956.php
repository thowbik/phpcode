     <?php

class Statemodel extends CI_Model
{
    
    function __construct() {
        parent::__construct();
    }


    function getstateprofiledetails($id){
       $this->db->SELECT('*'); 
       $this->db->FROM('statenew_bascinfo');
       $this->db->WHERE('state_id',$id); 
       $query =  $this->db->get();
       return $query->result();
    }
  
  //emis_team
    function getalldistrictcountsbyclass(){
       $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id, sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, sum(total_b+total_g+total_t) as total') 
       ->FROM('students_school_child_count')
       ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
       ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->group_by('schoolnew_district.district_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
    }
  //csr report
  // public function emis_csr_report()
  // {
    // $sql="SELECT convert_tz(a.`timestamp`,'+00:00','+05:30') as time, b.`name` as 'Supporter_Name', b.`email` as  Email, b.`mobile` as Mobile, c.`orgname` as  'Org_Name', c.`org_pan` 'PAN', IF(a.`cont_type` = 0,'Materials','Funds') 'Contribution_Type', IF (a.`cont_towards` = 1,'General Fund','Specific Need') 'Towards', CASE WHEN a.`payment_mode` = 1 THEN 'Online' WHEN a.`payment_mode` = 2 THEN 'Offline' ELSE 'NA' END AS 'Payment_MODE', a.`amount` Amount, a.`gen_dev_fund_remarks` 'Remarks'
// FROM csr_contributions a
// LEFT JOIN csr_user b ON a.user_id = b.`id`
// LEFT JOIN csr_user_org c ON b.`id` = c.`user_id`
// WHERE a.`STATUS` IN ('FUNDS_RECEIVED','MATERIALS_RECEIVED')
// ORDER BY a.Timestamp desc";
// //print_r($sql);
// //die();
       // $query = $this->db->query($sql);
       // return $query->result();
  // }
  public function emis_csr_report()
  {


//    $sql="SELECT convert_tz(a.`timestamp`,'+00:00','+05:30') as time, a.id,b.`name` as 'Supporter_Name', b.`email` as  Email, b.`mobile` as Mobile, c.`orgname` as  'Org_Name', c.`org_pan` 'PAN', IF(a.`cont_type` = 0,'Materials','Funds') 'Contribution_Type', IF (a.`cont_towards` = 1,'General Fund','Specific Need') 'Towards', CASE WHEN a.`payment_mode` = 1 THEN 'Online' WHEN a.`payment_mode` = 2 THEN 'Offline' ELSE 'NA' END AS 'Payment_MODE', a.`amount` Amount, a.`gen_dev_fund_remarks` 'Remarks'
// FROM csr_contributions a
// LEFT JOIN csr_user b ON a.user_id = b.`id`
// LEFT JOIN csr_user_org c ON b.`id` = c.`user_id`
// WHERE a.`STATUS` IN ('FUNDS_RECEIVED','MATERIALS_RECEIVED')
// ORDER BY a.Timestamp desc";




    $sql= "SELECT  convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
JOIN csr_school_requirements b ON a.`req_id` = b.`id`
JOIN csr_material_master c ON b.`mat_id` = c.`id`
JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
JOIN csr_contributions ccc ON a.cont_id = ccc.id
JOIN csr_user u ON ccc.user_id = u.id
JOIN csr_user_org org ON u.id = org.user_id 
WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1";
//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }
  // public function emis_school_contributer_details($school_id)
  // {


// //    $sql="SELECT convert_tz(a.`timestamp`,'+00:00','+05:30') as time, a.id,b.`name` as 'Supporter_Name', b.`email` as  Email, b.`mobile` as Mobile, c.`orgname` as  'Org_Name', c.`org_pan` 'PAN', IF(a.`cont_type` = 0,'Materials','Funds') 'Contribution_Type', IF (a.`cont_towards` = 1,'General Fund','Specific Need') 'Towards', CASE WHEN a.`payment_mode` = 1 THEN 'Online' WHEN a.`payment_mode` = 2 THEN 'Offline' ELSE 'NA' END AS 'Payment_MODE', a.`amount` Amount, a.`gen_dev_fund_remarks` 'Remarks'
// // FROM csr_contributions a
// // LEFT JOIN csr_user b ON a.user_id = b.`id`
// // LEFT JOIN csr_user_org c ON b.`id` = c.`user_id`
// // WHERE a.`STATUS` IN ('FUNDS_RECEIVED','MATERIALS_RECEIVED')
// // ORDER BY a.Timestamp desc";




    // $sql= "SELECT  convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
// JOIN csr_school_requirements b ON a.`req_id` = b.`id`
// JOIN csr_material_master c ON b.`mat_id` = c.`id`
// JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
// JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
// JOIN csr_contributions ccc ON a.cont_id = ccc.id
// JOIN csr_user u ON ccc.user_id = u.id
// JOIN csr_user_org org ON u.id = org.user_id 
// WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and d.school_id = $school_id";
// //print_r($sql);
// //die();
       // $query = $this->db->query($sql);
       // return $query->result();
  // }

  public function emis_school_contributer_details_by_material($school_id)
{
  $sql="SELECT u.id as ids,convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
JOIN csr_school_requirements b ON a.`req_id` = b.`id`
JOIN csr_material_master c ON b.`mat_id` = c.`id`
JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
JOIN csr_contributions ccc ON a.cont_id = ccc.id
JOIN csr_user u ON ccc.user_id = u.id
JOIN csr_user_org org ON u.id = org.user_id 

WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and d.school_id = $school_id";
 $query = $this->db->query($sql);
       return $query->result();
}
//for pdf generation for contributions
public function pdf_contribution_by_contributors($cont_id)
  {


//    $sql="SELECT convert_tz(a.`timestamp`,'+00:00','+05:30') as time, a.id,b.`name` as 'Supporter_Name', b.`email` as  Email, b.`mobile` as Mobile, c.`orgname` as  'Org_Name', c.`org_pan` 'PAN', IF(a.`cont_type` = 0,'Materials','Funds') 'Contribution_Type', IF (a.`cont_towards` = 1,'General Fund','Specific Need') 'Towards', CASE WHEN a.`payment_mode` = 1 THEN 'Online' WHEN a.`payment_mode` = 2 THEN 'Offline' ELSE 'NA' END AS 'Payment_MODE', a.`amount` Amount, a.`gen_dev_fund_remarks` 'Remarks'
// FROM csr_contributions a
// LEFT JOIN csr_user b ON a.user_id = b.`id`
// LEFT JOIN csr_user_org c ON b.`id` = c.`user_id`
// WHERE a.`STATUS` IN ('FUNDS_RECEIVED','MATERIALS_RECEIVED')
// ORDER BY a.Timestamp desc";




    $sql= "SELECT  convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
JOIN csr_school_requirements b ON a.`req_id` = b.`id`
JOIN csr_material_master c ON b.`mat_id` = c.`id`
JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
JOIN csr_contributions ccc ON a.cont_id = ccc.id
JOIN csr_user u ON ccc.user_id = u.id
JOIN csr_user_org org ON u.id = org.user_id 
WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and a.cont_id = $cont_id ";
//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }

 public function emis_school_contributer_details($school_id)
  {


//    $sql="SELECT convert_tz(a.`timestamp`,'+00:00','+05:30') as time, a.id,b.`name` as 'Supporter_Name', b.`email` as  Email, b.`mobile` as Mobile, c.`orgname` as  'Org_Name', c.`org_pan` 'PAN', IF(a.`cont_type` = 0,'Materials','Funds') 'Contribution_Type', IF (a.`cont_towards` = 1,'General Fund','Specific Need') 'Towards', CASE WHEN a.`payment_mode` = 1 THEN 'Online' WHEN a.`payment_mode` = 2 THEN 'Offline' ELSE 'NA' END AS 'Payment_MODE', a.`amount` Amount, a.`gen_dev_fund_remarks` 'Remarks'
// FROM csr_contributions a
// LEFT JOIN csr_user b ON a.user_id = b.`id`
// LEFT JOIN csr_user_org c ON b.`id` = c.`user_id`
// WHERE a.`STATUS` IN ('FUNDS_RECEIVED','MATERIALS_RECEIVED')
// ORDER BY a.Timestamp desc";




    $sql= "SELECT  convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
JOIN csr_school_requirements b ON a.`req_id` = b.`id`
JOIN csr_material_master c ON b.`mat_id` = c.`id`
JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
JOIN csr_contributions ccc ON a.cont_id = ccc.id
JOIN csr_user u ON ccc.user_id = u.id
JOIN csr_user_org org ON u.id = org.user_id 
WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and d.school_id = $school_id";
//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }
  
  
  public function total_amount_recieved_by_contribution($school_id)
  {
     $sql= "SELECT  convert_tz(ccc.`timestamp`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, sum(a.`amount`) as received_amt, a.`status`FROM csr_contribution_details a
JOIN csr_school_requirements b ON a.`req_id` = b.`id`
JOIN csr_material_master c ON b.`mat_id` = c.`id`
JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
JOIN csr_contributions ccc ON a.cont_id = ccc.id
JOIN csr_user u ON ccc.user_id = u.id
JOIN csr_user_org org ON u.id = org.user_id 
WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and d.school_id = $school_id";
 $sql = $this->db->query($sql);
       return $sql->result();
  }
function school_wise_retreive_req_contribution($school_id)
  {
    // $this->db->select('count(csr_school_requirements.school_id) as school,sum(csr_school_requirements.qty* csr_material_master.cost_per_unit) as req_amount,sum(csr_contribution_details.amount) as received_amt');
    // // $this->db->set('amount','amount - 10',FALSE);
    //  $this->db->from('csr_school_requirements');

    //  $this->db->join('csr_material_master','csr_school_requirements.mat_id = csr_material_master.id','left');
    //  $this->db->join ('csr_contribution_details','csr_school_requirements.id = csr_contribution_details.req_id','left');
   
    //   $where = '(csr_contribution_details.status="FUNDS_RECEIVED" or csr_contribution_details.status = "MAT_RECEIVED")';

      
    // $this->db ->where($where);
    // $this->db-> where(csr_school_requirements.school_id = $school_id);
    //  $query = $this->db->get();
    // //print_r($this->db->last_query());// die;  
    //  return $query->result_array();
    $sql= "SELECT `a`.`id` as `req_id`,sum(`a`.qty*b.cost_per_unit) as req_amount,`a`.`is_featured`, `b`.`DEscription` as `desc`, `a`.`school_id`,`e`.`district_id`, `e`.`block_id`, `e`.`district_name`,`e`.`district_name`, `e`.`block_name`, `e`.`udise_code`,`e`.`school_type`, `e`.`school_name`, `e`.`management`,`e`.`category`, `a`.`mat_id`, `b`.`material_name`, `c`.`id` as `cad_id`, `c`.`cat_name`, `d`.`id` as `sud_cat_id`,`d`.`sub_cat_name`, `a`.`qty`,`b`.`cost_per_unit`, `a`.`created_by`, `a`.`created_on`, `a`.`updated_by`,`a`.`updated_on`, IFNULL(g.received_qty, 0) as received_qty
    FROM `csr_school_requirements` as `a`
    LEFT JOIN `csr_material_master` as `b` ON `a`.`mat_id` = `b`.`id` and `b`.`isactive` = 1
    LEFT JOIN (SELECT req_id,sum(qty) as received_qty,sum(amount) as received_amt FROM csr_contribution_details where status = 'FUNDS_RECEIVED' OR status = 'MAT_RECEIVED' group by req_id) as g ON `a`.`id` = `g`.`req_id`
    LEFT JOIN `csr_category_master` as `c` ON `b`.`cat_id` = `c`.`id` and `b`.`id` = `a`.`mat_id` and `c`.`isactive` = 1
    LEFT JOIN `csr_subcategory_master` as `d` ON `b`.`sub_cat_id` = `d`.`id` and `d`.`isactive` = 1
    LEFT JOIN `students_school_child_count` as `e` ON `a`.`school_id` = `e`.`school_id`
    WHERE `a`.`qty` > ifnull(g.received_qty,0)
    AND `a`.`isactive` = 1
    AND `b`.`cost_per_unit` IS NOT NULL
    AND `a`.`school_id` = $school_id
    ORDER BY `a`.`id` DESC";
// $sql= "SELECT  sum(b.qty*c.cost_per_unit) as req_amount,sum(a.amount) as received_amt,convert_tz(d.`updated_date`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
// LEFT JOIN csr_school_requirements b ON a.`req_id` = b.`id`
// LEFT JOIN csr_material_master c ON b.`mat_id` = c.`id`
// LEFT JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
// LEFT JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
// LEFT JOIN csr_contributions ccc ON a.cont_id = ccc.id
// LEFT JOIN csr_user u ON ccc.user_id = u.id
// LEFT JOIN csr_user_org org ON u.id = org.user_id 
// WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and b.school_id = $school_id";

//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();

  }

  function get_school_id_by_requirements($school_id)
  {
//     $sql= "SELECT  (b.qty*c.cost_per_unit) as req_amount,convert_tz(d.`updated_date`,'+00:00','+05:30') as time,ccc.cont_type,org.orgname,a.`cont_id`,u.name as Supporter_name,u.mobile as Mobile,d.district_name,d.udise_code,d.block_name,d.edu_dist_name, d.school_name, d.cate_type, cc.`cat_name`, c.`material_name`, a.`qty`, c.`cost_per_unit`, a.`amount`, a.`status`FROM csr_contribution_details a
// JOIN csr_school_requirements b ON a.`req_id` = b.`id`
// JOIN csr_material_master c ON b.`mat_id` = c.`id`
// JOIN `csr_category_master` cc ON c.`cat_id` = cc.`id`
// JOIN students_school_child_count d ON b.`school_id` = d.`school_id`
// JOIN csr_contributions ccc ON a.cont_id = ccc.id
// JOIN csr_user u ON ccc.user_id = u.id
// JOIN csr_user_org org ON u.id = org.user_id 
// WHERE a.status IN ('FUNDS_RECEIVED','MATERIAL_RECEIVED') and ccc.cont_towards != 1 and b.school_id = $school_id";
$sql= "SELECT `a`.`id` as `req_id`,(`a`.qty*b.cost_per_unit) as req_amount,`a`.`is_featured`, `b`.`DEscription` as `desc`, `a`.`school_id`,`e`.`district_id`, `e`.`block_id`, `e`.`district_name`,`e`.`district_name`, `e`.`block_name`, `e`.`udise_code`,`e`.`school_type`, `e`.`school_name`, `e`.`management`,`e`.`category`, `a`.`mat_id`, `b`.`material_name`, `c`.`id` as `cad_id`, `c`.`cat_name`, `d`.`id` as `sud_cat_id`,`d`.`sub_cat_name`, `a`.`qty`,`b`.`cost_per_unit`, `a`.`created_by`, `a`.`created_on`, `a`.`updated_by`,`a`.`updated_on`, IFNULL(g.received_qty, 0) as received_qty,convert_tz(e.`updated_date`,'+00:00','+05:30') as time
FROM `csr_school_requirements` as `a`
LEFT JOIN `csr_material_master` as `b` ON `a`.`mat_id` = `b`.`id` and `b`.`isactive` = 1
LEFT JOIN (SELECT req_id,sum(qty) as received_qty FROM csr_contribution_details where status = 'FUNDS_RECEIVED' OR status = 'MAT_RECEIVED' group by req_id) as g ON `a`.`id` = `g`.`req_id`
LEFT JOIN `csr_category_master` as `c` ON `b`.`cat_id` = `c`.`id` and `b`.`id` = `a`.`mat_id` and `c`.`isactive` = 1
LEFT JOIN `csr_subcategory_master` as `d` ON `b`.`sub_cat_id` = `d`.`id` and `d`.`isactive` = 1
LEFT JOIN `students_school_child_count` as `e` ON `a`.`school_id` = `e`.`school_id`
WHERE `a`.`qty` > ifnull(g.received_qty,0)
AND `a`.`isactive` = 1
AND `b`.`cost_per_unit` IS NOT NULL
AND `a`.`school_id` = $school_id
ORDER BY `a`.`id` DESC";

//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }
  
  
//for model to modal history of status change
  
function status_history($school_id,$id)
{
  // $req_id = $d;
  
   //echo $id;
  
  $sql= "SELECT b.id as req,d.school_name,a.id,a.fk_req_id,a.update_status,a.img_url_1,a.img_url_2,a.img_url_3,a.created_by,convert_tz(a.`updated_on`,'+00:00','+05:30')as updated_on FROM csr_school_req_updates a
JOIN csr_school_requirements b ON a.`created_by` = b.`id`
JOIN students_school_child_count d ON d.`school_id` = a.`created_by`
WHERE a.created_by = $school_id and a.fk_req_id = $id";


//print_r($sql);
//die();
     $query = $this->db->query($sql);

   //  print_r($this->db->last_query($query));
     return $query->result_array();
     


}

    public function dists()
  {
    $sql="SELECT id,district_name FROM schoolnew_district";
//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }
    public function block()
  {
    $sql="SELECT id,block_name FROM baseapp_block";
//print_r($sql);
//die();
       $query = $this->db->query($sql);
       return $query->result();
  }
    public function staff_list($dist,$blk,$udise,$schoolname,$teach,$teachname,$design)
  {  
     
      $where ="where u.archive = 1";
     if(!empty($dist))
     {
       $where .= " and sc.district_id =".$dist."";
     }
     
     if(!empty($block))
     {
       $where .= " and sc.block_id =".$block."";
     }
     
     // if(!empty($school))
     // {
       // $where .=" and school_id =".$school."";
     // }
     if(!empty($udise))
     {
       $where .=" and sc.udise_code =".$udise."";
     }
     if(!empty($schoolname))
     {
       $where .=" and sc.school_name ='".$schoolname."'";
     }if(!empty($teach))
     {
       $where .=" and u.teacher_code ='".$teach."'";
     }
     if(!empty($teachname))
     {
       $where .=" and u.teacher_name ='".$teachname."'";
     }
     if(!empty($design))
     {
       $where .=" and  t.id =".$design." ";
     }
    
    // $sql="SELECT district_name,block_name,school_name,udise_staffreg.udise_code,
    // teacher_code, teacher_name,type_teacher,teacher_type  from  students_school_child_count 
// left join udise_staffreg on udise_staffreg.school_key_id =students_school_child_count.school_id 
// left join teacher_type on teacher_type.id=udise_staffreg.teacher_type
 // ".$where."";
 
 $sql="select sc.district_name, sc.block_name, sc.udise_code, sc.school_name, u.teacher_name, u.teacher_code, t.type_teacher
from students_school_child_count sc 
join udise_staffreg u on u.school_key_id = sc.school_id 
join teacher_type t on t.id = u.teacher_type
 ".$where."";
 
      $query = $this->db->query($sql);
       return $query->result();
  }
  

  //emis_team
   function getalldistrictcountsbyclass1($manage){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');     
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
    }

  //emis_team
    function getalldistrictcountsbyclassblock($distid){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
        if($query->num_rows() > 0){
      return $query->result();
        }else{
         return false;
        }
    }  

  //emis_team
    function getalldistrictcountsbyclassblock1($distid,$manage){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_block.block_name'); 
        $query =  $this->db->get();
        if($query->num_rows() > 0){
         return $query->result();
        }else{
         return false;
        }
   } 

   function getsingledistname($distid){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_district');
       $this->db->WHERE('id',$distid); 
       $query =  $this->db->get();
       return $query->row('district_name');
   }

  //emis_team
    function getalldistrictcountsbyclassschool($blckid){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG, sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
       }
  } 

  //Nirmal
  public function get_OSC_List($dist,$block,$school)
  { 
    if($dist!="")
    { 
     $select=",students_school_child_count.district_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt";
      $where="and district_id=$dist";
      $left="";
      $grp=",students_school_child_count.block_name";
    }
    if($dist=="")
    {
     
     $select=",students_school_child_count.block_name,present_status,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.block_name,count(unique_id_no) as cnt";
     $where="";
     $left="";
     $grp=",students_school_child_count.district_name";
    }
    if($block!="")
    {
      $select=",students_school_child_count.school_name,students_school_child_count.school_id,students_school_child_count.district_name,students_school_child_count.block_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt";
      $where="and block_id=$block";
      $left="";
      $grp=",students_school_child_count.school_name";
    }
    if($school!="")
    {
       $select =",students_child_detail.class_section,students_child_detail.class_studying_id,students_osc.school_id,students_osc.name,students_osc.unique_id_no,students_school_child_count.school_name,students_school_child_count.block_name,students_school_child_count.district_name,training_type,ac_year";
       $where="and students_school_child_count.school_id=$school";
       $left="left join students_child_detail on students_child_detail.unique_id_no=students_osc.unique_id_no";
      $grp="";
    }
    $query="SELECT(select child_status FROM baseapp_osc WHERE students_osc.present_status=baseapp_osc.id limit 1) as present_sts $select FROM students_osc LEFT JOIN students_school_child_count ON students_school_child_count.school_id=students_osc.school_id $left WHERE students_osc.present_status!=0 $where group by present_status $grp";
      $query =  $this->db->query($query);
   
      return $query->result_array();
    
  } 
//pearlin
//   public function aget_OSC_List()
// {
//   $this->db->SELECT('(SELECT child_status FROM baseapp_osc WHERE students_osc.present_status=baseapp_osc.id limit 1) as present_sts,students_school_child_count.block_name,students_school_child_count.district_name,present_status,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.block_name,count(unique_id_no) as cnt')
//   ->FROM('students_osc') 
//   ->JOIN('students_school_child_count','students_school_child_count.school_id=students_osc.school_id','left')
//   ->WHERE('students_osc.present_status!=',0)
//   ->group_by('present_status')
//   ->group_by('students_school_child_count.district_id');

//        $query =  $this->db->get();
//      // print_r($this->db->last_query());
//        return $query->result(); 
// }
public function get_OSC_List_block($district_id)
{
   $this->db->SELECT('(SELECT child_status FROM baseapp_osc WHERE students_osc.present_status=baseapp_osc.id limit 1) as present_sts,
   students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,
   present_status,students_school_child_count.block_id,students_school_child_count.block_name,count(unique_id_no) as cnt')
   ->FROM('students_osc') 
  ->JOIN ('students_school_child_count','students_school_child_count.school_id=students_osc.school_id','left')
  ->WHERE('students_school_child_count.district_id',$district_id)
  ->WHERE('students_osc.present_status!=',0) 
  ->group_by('present_status')
  ->group_by('students_school_child_count.block_name');
    $query =  $this->db->get();
     // print_r($this->db->last_query());
       return $query->result(); 
}

public function get_OSC_List_school($block_id)
{
    $this->db->SELECT(' (SELECT child_status FROM baseapp_osc WHERE students_osc.present_status=baseapp_osc.id limit 1) as present_sts,
    students_school_child_count.school_name,students_school_child_count.school_id,students_school_child_count.district_name,
    students_school_child_count.block_name,present_status,students_school_child_count.block_id,students_school_child_count.block_name,
    count(unique_id_no) as cnt')
    -> FROM('students_osc')
    ->JOIN('students_school_child_count','students_school_child_count.school_id=students_osc.school_id','left')
    ->WHERE('students_school_child_count.block_id',$block_id)
    ->WHERE('students_osc.present_status!=',0)
    ->group_by('present_status')
    ->group_by('students_school_child_count.school_name');

         $query = $this->db->get();
        // print_r($SQL);
       return $query->result(); 
}
  public function students_osc_reg($school_id) {
    $this->db->SELECT('class_section,class_studying_id,students_osc.school_id,students_osc.name,students_osc.unique_id_no,
      (SELECT child_status FROM baseapp_osc WHERE students_osc.present_status=baseapp_osc.id limit 1) as pre_stus ,students_school_child_count.school_name,students_school_child_count.block_name,students_school_child_count.district_name,training_type,ac_year')
      ->FROM('students_osc')
      ->JOIN('students_child_detail','students_child_detail.unique_id_no=students_osc.unique_id_no','left')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_osc.school_id','left')
      ->WHERE('students_school_child_count.school_id=',$school_id)
      ->WHERE('present_status!=',0);
       $query = $this->db->get();
       return $query->result();  
       
    }
     public function students_Dropped_out($dist,$block,$school) {

      if($dist!="")
    { 
     $select="select count(transfer_reason) as cnt,sc.district_name,sc.district_id,sc.block_name,sc.block_id";
     $where="transfer_reason = 4 and sc.district_id = $dist";
     $left="";
     $grp="group by block_name";
     $join="JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no";
    }
    if($dist=="")
    {
     
     $select="select count(transfer_reason) as cnt,sc.district_name,sc.district_id";
     $where="transfer_reason = 4";
     $left="";
     $join="JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no";
     $grp="group by sc.district_name";
    }
    if($block!="")
    {
      $select="select count(transfer_reason) as cnt,sc.district_name,sc.district_id,block_name,sc.block_id,sc.school_name,sc.school_id";
     $where="transfer_reason = 4 and sc.block_id = $block";
     $left="";
     $join="JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no";
     $grp="group by school_name";
    }
    if($school!="")
    {
       $select="select students_child_detail.phone_number,name,students_child_detail.unique_id_no,students_child_detail.class_studying_id,sc.school_name";
     $where="transfer_reason = 4 and sc.school_id=$school";
     $left="";
     $grp="group by students_child_detail.unique_id_no";
     $join="JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no";

    }
    $query="$select FROM students_transfer_history JOIN students_school_child_count sc ON sc.school_id=students_transfer_history.school_id_transfer $join where $where $grp";

      $query =  $this->db->query($query);
      return $query->result_array(); 
      //print_r($this->db->last_query());die();
    
      
       
    }
    
    public function students_Dropped_out_block($dist_id) {
    $this->db->SELECT('count(*) as cnt,district_name,district_id,block_name,block_id')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->WHERE('remarks=','Dropped out')
       ->WHERE('district_id=',$dist_id)
      ->group_by('block_name');
       $query = $this->db->get();
       return $query->result();  
       
    }
    public function students_Dropped_out_school($block_id) {
    $this->db->SELECT('count(*) as cnt,district_name,district_id,block_name,block_id,school_name,school_id')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->WHERE('remarks=','Dropped out')
       ->WHERE('block_id=',$block_id)
      ->group_by('school_name');
       $query = $this->db->get();
          //print_r($this->db->last_query());
       return $query->result();  
    
    }
      public function students_Dropped_out_student_list($school_id) {
    $this->db->SELECT('students_child_detail.phone_number,name,students_child_detail.unique_id_no,students_child_detail.class_studying_id,students_school_child_count.school_name')
      ->FROM('students_transfer_history')
      ->JOIN('students_school_child_count','students_school_child_count.school_id=students_transfer_history.school_id_transfer')
      ->JOIN('students_child_detail','students_child_detail.unique_id_no=students_transfer_history.unique_id_no')
      ->WHERE('remarks=','Dropped out')
      ->WHERE('students_school_child_count.school_id=',$school_id)
      ->group_by('students_child_detail.unique_id_no');
       $query = $this->db->get();
          //print_r($this->db->last_query());
       return $query->result();  
    
    }
 public function stud_community_report($district_id,$block_id,$school_type,$cate_type)
  {
  if($district_id!="")
  {
 
  $where="district_id = $district_id";
  $group_by="scc.community_code";
  }
  else if($block_id!="")
  {
   $where="block_id = $block_id";
   $group_by="scc.community_code";
  }
  else 
  {
   $where="";
  $group_by="scc.community_code";
  }
  //print_r($school_type);
  //echo "</br>";
  //print_r($cate_type);
   //echo "</br>";
  //echo "DISTRICT".$district_id;
   //echo "</br>";
  //echo "BLOCK".$block_id;die();
    //print_r($school_cate);
  $this->db->SELECT('scc.school_id, scc.community_code,
    SUM(scc.Prkg_b+scc.Prkg_g) AS prekg_t ,
    SUM(scc.lkg_b+scc.lkg_g) AS lkg_t,
    SUM(scc.ukg_b + scc.ukg_g) AS ukg_t,
    SUM(scc.c1_b+scc.c1_g) AS c1,
    SUM(scc.c2_b+scc.c2_g) AS c2,
    SUM(scc.c3_b+scc.c3_g) AS c3,
    SUM(scc.c4_b+scc.c4_g) AS c4,
    SUM(scc.c5_b+scc.c5_g) AS c5,
    SUM(scc.c6_b+scc.c6_g) AS c6,
    SUM(scc.c7_b+scc.c7_g) AS c7,
    SUM(scc.c8_b+scc.c8_g) AS c8,
    SUM(scc.c9_b+scc.c9_g) AS c9,
    SUM(scc.c10_b+scc.c10_g) AS c10,
    SUM(scc.c11_b+scc.c11_g) AS c11,
    SUM(scc.c12_b+scc.c12_g) AS c12,
    SUM(scc.total_b+scc.total_g) AS total,(SELECT community_name FROM baseapp_community WHERE baseapp_community.community_code= scc.community_code limit 1) as community_name')
  ->FROM('students_community_school_count AS scc')
  //->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
  ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left');
  if($district_id !="" || $block_id!="")
  {
    $this->db->WHERE($where);
  }
 
 
   if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('students_school_child_count.cate_type',$cate_type);
          }
  
   $this->db->GROUP_BY($group_by);
   
   
      $query =  $this->db->get();
     //print_r($this->db->last_query());
       return $query->result();
      }



         public function stud_community_report_dist($district_id,$block_id,$community_name,$school_type,$cate_type)
            {
        if($district_id!="")
          {
 
          $where="district_id = $district_id";
          $group_by="block_name";
          }
          else if($block_id!="")
          {
           $where="block_id = $block_id";
           $group_by="school_name";
          }
          else 
          {
           $where="";
          $group_by="district_name";
          }

           $this->db->SELECT('students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,scc.school_id, scc.community_code,
                              SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total, (SELECT community_name FROM baseapp_community WHERE baseapp_community.community_code= scc.community_code limit 1) as community_name')
                     ->FROM('students_community_school_count AS scc')
                    // ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                     ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                     ->WHERE('scc.community_code',$community_name);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
             $this->db->where($where);
                  $this->db->group_by($group_by);
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
             public function stud_community_report_blk($dist_id,$community_name,$school_type,$cate_type)
            {

                $this->db->SELECT('students_school_child_count.block_name,scc.school_id, scc.community_code,
                               SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total,(SELECT community_name FROM baseapp_community WHERE baseapp_community.community_code= scc.community_code limit 1) as  community_name')
                           ->FROM('students_community_school_count AS scc')
                          // ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                           ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                           ->WHERE('community_code',$community_name)
                           ->WHERE('district_id',$dist_id);
                           if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
               //     print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
              public function stud_community_report_schl($blk,$community_name,$school_type,$cate_type)
            {

            $this->db->SELECT('  students_school_child_count.block_name,students_school_child_count.school_name,
                         scc.school_id,  scc.community_code,  SUM(scc. Prkg_b+scc. Prkg_g) AS prekg_t ,SUM(scc. lkg_b+scc. lkg_g) AS lkg_t,SUM(scc. ukg_b + scc. ukg_g) AS ukg_t,SUM(scc. c1_b+scc. c1_g) AS c1,SUM(scc. c2_b+scc. c2_g) AS c2,SUM(scc.c3_b+scc.c3_g) AS c3,SUM(scc. c4_b+scc. c4_g) AS c4,SUM(scc. c5_b+scc. c5_g) AS c5,SUM(scc.  c6_b+scc. c6_g) AS c6,SUM(scc.  c7_b+scc. c7_g) AS c7,SUM(scc.c8_b+scc.c8_g) AS c8,SUM(scc. c9_b+scc. c9_g) AS c9,SUM(scc.c10_b+scc. c10_g) AS c10,SUM(scc.c11_b+scc. c11_g) AS c11,SUM(scc.  c12_b+scc. c12_g) AS c12,SUM(scc.total_b+scc.total_g) AS total,(SELECT community_name FROM baseapp_community WHERE baseapp_community.community_code= scc.community_code limit 1) as   community_name')
                    ->FROM('students_community_school_count AS scc')
                 // ->JOIN('baseapp_community','baseapp_community.community_code =scc.community_code','left')
                   ->JOIN('students_school_child_count','students_school_child_count.school_id =scc.school_id','left')
                   ->WHERE('community_code',$community_name)
                   ->WHERE('block_id',$blk);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
                  $this->db->group_by('school_name');
                  // return $result;
                  $result = $this->db->get()->result();
               //  print_r($this->db->last_query());
                    return $result;
                // print_r(count($result));die;
            }
  //
  //emis_team
    function getalldistrictcountsbyclassschool1($blckid,$manage){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG, sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
        }
    }  

    function getsingleblockname($bid){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_block');
       $this->db->WHERE('id',$bid); 
       $query =  $this->db->get();
       return $query->row('block_name');
    }


   function getalldistrictcounts(){
       $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(total_b+total_g+total_t) as total')
       ->FROM('students_school_child_count')
       ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
       ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->group_by('schoolnew_district.district_name');
     $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
  }

    function getschoolprofiledetails($id){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_basicinfo');
       $this->db->WHERE('curr_stat',1);
       $this->db->WHERE('school_id',$id); 
       $query =  $this->db->get();
       return $query->result();
   }


    function getallbrachesbyschool($schoolid){
       $this->db->SELECT('sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class1,sum(c2_b+c2_g+c2_t) as class2,sum(c3_b+c3_g+c3_t) as class3,sum(c4_b+c4_g+c4_t) as class4,sum(c5_b+c5_g+c5_t) as class5,sum(c6_b+c6_g+c6_t) as class6,sum(c7_b+c7_g+c7_t) as class7,sum(c8_b+c8_g+c8_t) as class8,sum(c9_b+c9_g+c9_t) as class9,sum(c10_b+c10_g+c10_t) as class10,sum(c11_b+c11_g+c11_t) as class11,sum(c12_b+c12_g+c12_t) as class12') 
       ->FROM('students_school_child_count')
       ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->WHERE('schoolnew_basicinfo.school_id', $schoolid);    
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
    }

    function getallstudentsbyschid($schoolid,$classid){
       $this->db->SELECT('*') 
       ->FROM('students_child_detail')
       ->WHERE('school_id', $schoolid)  
       ->WHERE('transfer_flag',0)
       ->WHERE('class_studying_id', $classid);    
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
    }

    function getsingleschoolname($bid){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_basicinfo');
       $this->db ->WHERE('curr_stat',1);
       $this->db->WHERE('school_id',$bid); 
       $query =  $this->db->get();
       return $query->row('school_name');
    }

    function getsingleclassname($bid){
       $this->db->SELECT('*'); 
       $this->db->FROM('baseapp_class_studying');
       $this->db->WHERE('id',$bid); 
       $query =  $this->db->get();
       return $query->row('class_studying');
    }

    function getallgenderbydistrict(){
       $this->db->SELECT('schoolnew_district.district_name,sum(students_school_child_count.total_b) as boys, sum(students_school_child_count.total_g) as girls, sum(students_school_child_count.total_t) as transgender')
       ->FROM('students_school_child_count')
       ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
       ->JOIN('schoolnew_district','schoolnew_basicinfo.district_id=schoolnew_district.id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->group_by('schoolnew_district.district_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }
  }

    function getallgenderbydistrict1($comm){
        $this->db->SELECT('students_community_school_count.community_code,schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_community_school_count')
        ->JOIN('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('students_community_school_count.community_code',$comm)
        ->group_by('schoolnew_district.district_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
        }else{
      return false;
    }
    }

    function getallgenderbydistrict2($manage){
        $this->db->SELECT('schoolnew_district.district_name,sum(students_school_child_count.total_b) as boys, sum(students_school_child_count.total_g) as girls, sum(students_school_child_count.total_t) as transgender')
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


    function getallblockscountbydistrict($distid){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getallblockcountsbyschool($blckid){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,schoolnew_basicinfo.sch_cate_id,schoolnew_basicinfo.sch_management_id,sum(total_b+total_g+total_t) as total') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }  
       
  function getallblockscommuniywise($distid,$comm){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_community_school_count')
        ->JOIN('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('students_community_school_count.community_code',$comm)
        ->group_by('schoolnew_block.block_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 

  function getallblockkkcountsbyclassschool($blckid,$comm){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_community_school_count')
        ->JOIN('schoolnew_basicinfo','students_community_school_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('students_community_school_count.community_code',$comm)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

   function getcommunityname($comm){
       $this->db->SELECT('*'); 
       $this->db->FROM('baseapp_community');
       $this->db->WHERE('community_code',$comm); 
       $query =  $this->db->get();
       return $query->row('community_name');
  }


    function getoldpassstate($state_id,$username){
       $this->db->SELECT('*'); 
       $this->db->FROM('emis_userlogin');
       $this->db->WHERE('emis_user_id',$state_id); 
       $this->db->WHERE('emis_username',$username);
       $query =  $this->db->get();
       return $query->row('emis_password');
    }

    function emis_state_resetpassword($user_id,$username,$data){
       $this->db->WHERE('emis_user_id', $user_id);
       $this->db->WHERE('emis_username', $username);
       return $this->db->update('emis_userlogin',$data);         
   
    }

        /////////report 
    function getalldistrictcountsbyclassreport(){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getalldistrictcountsbyclassreport1($manage){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


    function getalldistrictcountsbyclassblockreport($distid){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }  

    function getalldistrictcountsbyclassblockreport1($distid,$manage){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 


    function getalldistrictcountsbyclassschoolreport($blckid){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 

    function getalldistrictcountsbyclassschoolreport1($blckid,$manage){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_idcard_child_count')
        ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 


   // Aadhaar reports

    function getalldistrictcountsbyclassaadhaar(){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getalldistrictcountsbyclassaadhaar1($manage){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }



    function getalldistrictcountsbyclassblockaadhaar($distid){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_block.district_id',$distid)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }  

    function getalldistrictcountsbyclassblockaadhaar1($distid,$manage){
        $this->db->SELECT('schoolnew_block.block_name,schoolnew_block.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.district_id',$distid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->group_by('schoolnew_block.block_name');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }   


    function getalldistrictcountsbyclassschoolaadhaar($blckid){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 

    function getalldistrictcountsbyclassschoolaadhaar1($blckid,$manage){
        $this->db->SELECT('schoolnew_basicinfo.school_name,schoolnew_basicinfo.school_id,schoolnew_basicinfo.udise_code,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12') 
        ->FROM('students_aadhaar_child_count')
        ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_block ','schoolnew_basicinfo.block_id=schoolnew_block.id')
        ->WHERE('schoolnew_block.id',$blckid)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('schoolnew_basicinfo.school_id')
        ->group_by('schoolnew_basicinfo.udise_code');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  } 


    function getallstandardsbyschool($id){
       $this->db->SELECT('low_class,high_class'); 
       $this->db->FROM('schoolnew_academicinfo');
       $this->db->WHERE('school_key_id',$id); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getallbrachesbyschoolinchildetail($schoolid,$class_id){
       $this->db->SELECT('name'); 
       $this->db->FROM('students_child_detail');
       $this->db->WHERE('school_id',$schoolid);
       $this->db->WHERE('class_studying_id',$class_id);
       $this->db->WHERE('transfer_flag',0); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getallbrachesbyschoolinchildetail2_view($schoolid){
       $this->db->SELECT('*'); 
       $this->db->FROM('students_child_detail');
       $this->db->WHERE('school_id',$schoolid);
       $this->db->WHERE('transfer_flag',0);
       $this->db->WHERE('idcardstatus','Aprooved');
       $this->db->WHERE('idapproove','0'); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getclasschildcout($schoolid,$class_id){
       $this->db->SELECT('*'); 
       $this->db->FROM('students_child_detail');
       $this->db->WHERE('school_id',$schoolid);
       $this->db->WHERE('class_studying_id',$class_id);
       $this->db->WHERE('transfer_flag',0);
       $this->db->WHERE('idcardstatus','Aprooved');
       $this->db->WHERE('idapproove','0'); 
       $query =  $this->db->get();
       return $query->result();
    }

    function getstandaradnamesepe($classid){
       $this->db->SELECT('*'); 
       $this->db->FROM('baseapp_class_studying');
       $this->db->WHERE('id',$classid); 
       $query =  $this->db->get();
       return $query->row('class_studying');
    }



    function getallstudentsbyschidreport($schoolid,$classid){
       $this->db->SELECT('*') 
       ->FROM('students_child_detail')
       ->WHERE('school_id', $schoolid)  
       ->WHERE('class_studying_id', $classid)
       ->WHERE('transfer_flag',0)
       ->WHERE('idcardstatus','Aprooved')
       ->WHERE('idapproove','0');   
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
    }


    function getallschoolsby_idname($where_condition){
       $this->db->SELECT('*,h.school_id,h.district_id,h.block_id,h.edu_dist_id,h.district_name,h.block_name,h.edu_dist_name,h.udise_code,h.school_name,h.school_type,h.school_type_id,h.sch_directorate_id,h.management,h.category,h.cate_type,h.section_nos,h.low_class,h.high_class') 
                ->FROM('schoolnew_basicinfo a')
                ->JOIN('students_school_child_count h','h.school_id = a.school_id','left')
                ->JOIN('schoolnew_manage_cate b','b.id = a.manage_cate_id','left')
                ->JOIN('schoolnew_management c','c.id = a.sch_management_id','left')
                ->JOIN('schoolnew_school_department d','d.id = a.sch_directorate_id','left')
                ->JOIN('schoolnew_category e','e.id = a.sch_cate_id','left')
                ->JOIN('schoolnew_academic_detail f','f.school_key_id = a.school_id','left')
                ->JOIN('schoolnew_resitype r','r.RESITYPE_ID = f.typ_resid_schl','left')
                ->JOIN('schoolnew_training_detail g','g.school_key_id = a.school_id','left');                
                if(!empty($where_condition)){
                  $this->db->WHERE($where_condition);
                }
                $result = $this->db->get()->result();
                return $result;

    }

    function getallsch_bydist(){
        $this->db->SELECT('schoolnew_district.id,schoolnew_district.district_name,count(schoolnew_basicinfo.school_id) as total') 
        ->FROM('schoolnew_basicinfo')
        ->JOIN('schoolnew_district','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.id')
        ->order_by('schoolnew_district.district_name','ASC');
        $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getalldistrictcountsbygender(){
        $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b) as class_1_b,sum(c2_b) as class_2_b,sum(c3_b) as class_3_b,sum(c4_b) as class_4_b,sum(c5_b) as class_5_b,sum(c6_b) as class_6_b,sum(c7_b) as class_7_b,sum(c8_b) as class_8_b,sum(c9_b) as class_9_b,sum(c10_b) as class_10_b,sum(c11_b) as class_11_b,sum(c12_b) as class_12_b, sum(c1_g) as class_1_g,sum(c2_g) as class_2_g,sum(c3_g) as class_3_g,sum(c4_g) as class_4_g,sum(c5_g) as class_5_g,sum(c6_g) as class_6_g,sum(c7_g) as class_7_g,sum(c8_g) as class_8_g,sum(c9_g) as class_9_g,sum(c10_g) as class_10_g,sum(c11_g) as class_11_g,sum(c12_g) as class_12_g') 
        ->FROM('students_school_child_count')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->group_by('schoolnew_district.district_name');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getalladhaarenrollcount(){
       $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t') 
       ->FROM('students_aadhaar_child_count')
       ->JOIN('schoolnew_basicinfo','students_aadhaar_child_count.school_id=schoolnew_basicinfo.school_id')
       ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->group_by('schoolnew_district.district_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
    }

    function getallsmartcardenrollcount(){
       $this->db->SELECT('schoolnew_district.district_name,schoolnew_district.id,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t') 
       ->FROM('students_idcard_child_count')
       ->JOIN('schoolnew_basicinfo','students_idcard_child_count.school_id=schoolnew_basicinfo.school_id')
       ->JOIN('schoolnew_district ','schoolnew_basicinfo.district_id=schoolnew_district.id')
       ->WHERE('schoolnew_basicinfo.curr_stat',1)
       ->group_by('schoolnew_district.district_name');
       $query =  $this->db->get();
       if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
    }

    function getallcurrentcountsbyclass(){
        $this->db->SELECT('sum(c1) as class1,sum(c2) as class2,sum(c3) as class3,sum(c4) as class4,sum(c5) as class5,sum(c6) as class6,sum(c7) as class7,sum(c8) as class8,sum(c9) as class9,sum(c10) as class10,sum(c11) as class11,sum(c12) as class12') 
        ->FROM('cron_school_enrollment_count');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getallcurrentcountsbyclass1($manage){
        $this->db->SELECT('sum(c1) as class1,sum(c2) as class2,sum(c3) as class3,sum(c4) as class4,sum(c5) as class5,sum(c6) as class6,sum(c7) as class7,sum(c8) as class8,sum(c9) as class9,sum(c10) as class10,sum(c11) as class11,sum(c12) as class12') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage)
        ->WHERE('schoolnew_basicinfo.curr_stat',1);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  function getallstudistcoutnbyclass($class,$dist){
    $this->db->SELECT('sum('.$class.') as tot') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.district_id',$dist)
        ->WHERE('schoolnew_basicinfo.curr_stat',1);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->row('tot');
    }else{
      return false;
    }
  }

    function getallstudistcoutnbyclass1($class,$dist,$manage){
    $this->db->SELECT('sum('.$class.') as tot') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.district_id',$dist)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->row('tot');
    }else{
      return false;
    }
  }

    function getallstublockcoutnbyclass($class,$block){
    $this->db->SELECT('sum('.$class.') as tot') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.block_id',$block)
        ->WHERE('schoolnew_basicinfo.curr_stat',1);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->row('tot');
    }else{
      return false;
    }
  }

    function getallstublockcoutnbyclass1($class,$block,$manage){
    $this->db->SELECT('sum('.$class.') as tot') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.block_id',$block)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->row('tot');
    }else{
      return false;
    }
  }


   function getallstuschoolcoutnbyclass($class,$block){
    $this->db->SELECT($class.' as class,schoolnew_basicinfo.school_id,schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.block_id',$block)
        ->WHERE('schoolnew_basicinfo.curr_stat',1);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

    function getallstuschoolcoutnbyclass1($class,$block,$manage){
    $this->db->SELECT($class.' as class,schoolnew_basicinfo.school_id,schoolnew_basicinfo.school_name,schoolnew_basicinfo.udise_code') 
        ->FROM('cron_school_enrollment_count')
        ->JOIN('schoolnew_basicinfo','cron_school_enrollment_count.school_id=schoolnew_basicinfo.school_id')
        ->WHERE('schoolnew_basicinfo.block_id',$block)
        ->WHERE('schoolnew_basicinfo.curr_stat',1)
        ->WHERE('schoolnew_basicinfo.sch_management_id',$manage);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }
    
    
  function getmanagecate(){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_manage_cate');
       $query =  $this->db->get();
       return $query->result();

    }
    function getmanagecate_124(){
       $this->db->SELECT('*'); 
       $this->db->FROM('schoolnew_manage_cate');
       $this->db->where_in("id",array(1,2,4));
       $query =  $this->db->get();
       return $query->result();

    }

  function get_school_management_data($getschooltype){
      $this->db->SELECT('*'); 
      $this->db->FROM('schoolnew_management');
      $this->db->WHERE('mana_cate_id',$getschooltype);
      $query = $this->db->get();
      return $query->result();
    }

    function getallspcialreports(){
        $this->db->SELECT('emis_school_special_reports.school_id,emis_school_special_reports.udise_code,schoolnew_basicinfo.school_name,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, sum(total_b+total_g+total_t) as total')
        ->FROM('students_school_child_count')
        ->JOIN('emis_school_special_reports','students_school_child_count.school_id=emis_school_special_reports.school_id')
        ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id')
        ->group_by('emis_school_special_reports.school_id')
        ->group_by('schoolnew_basicinfo.school_name')
        ->group_by('emis_school_special_reports.udise_code');
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


   
  

  function gtealltransferes(){
    $this->db->SELECT('*'); 
      $this->db->FROM('schoolnew_district');
    $this->db->order_by('district_name ',asc);
      $query = $this->db->get();
      return $query->result();
  }

  function gettransfrername($id){
      $this->db->SELECT('*'); 
      $this->db->FROM('emis_userlogin'); 
      $this->db->WHERE('sno',$id);  
      $query = $this->db->get();
      return $query->row('emis_username');
  }
  function getdistrict($dist_id)
  {
  $this->db->SELECT('district_name');
    $this->db->FROM('schoolnew_district');
    $this->db->WHERE('id',$dist_id);
    
    $query = $this->db->get();
    return $query->result();  
  }

function get_tchr($udise_code,$tech_cde){

    $this->db->SELECT('u_id,teacher_name');
    $this->db->FROM('udise_staffreg');
    $this->db->WHERE('udise_code',$udise_code);
    $this->db->WHERE('teacher_type',$tech_cde);
    $query = $this->db->get();
    return $query->result();

}
// get all district Details
  function get_dist_details(){
    $this->db->SELECT('district_id,district_name');
    $this->db->FROM('districtnew_basicinfo');
    $query = $this->db->get();
    return $query->result();
  }
  
  // emis_teachertype
  function get_teacher_type(){
    $this->db->SELECT('id,type_teacher');
    $this->db->FROM('teacher_type');
    $query = $this->db->get();
    return $query->result();
  }
  
  //emis_team(teachercountdetails)
  function get_dist_teacherdetails(){
    $this->db->SELECT('sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher, sum(teach_bt_mle+teach_bt_fmle) as BTteacher, sum(teach_sg_mle+teach_sg_fmle) as SGteacher, sum(teach_pg_mle+teach_pg_fmle) as PGteacher'); 
    $this->db->FROM('teacher_profile_count');    
    $query = $this->db->get();
    return $query->result();
  }
  
  //emis_team
  function get_dist_teacherdistrictdetails($cate_type){
    $this->db->SELECT('students_school_child_count.district_id as dist_id,students_school_child_count.district_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher ,sum(teach_hm_fmle+teach_hm_mle) as HM,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle) as Govteacher');
    $this->db->FROM('teacher_profile_count');
    $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','left');
          $this->db->WHERE('students_school_child_count.school_type','Government');
           $this->db->group_by('students_school_child_count.district_name');
  if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
    }
    /******** surplus report DSE ************/
    /*CREATED by Bala */
    function get_dist_teacher_surplus_districtdetails(){
    $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.district_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) then 1 else 0 end) as BT,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when (udise_staffreg.teacher_type=26 OR udise_staffreg.teacher_type=27 OR udise_staffreg.teacher_type=28 OR udise_staffreg.teacher_type=29) then 1 else 0 end) as HM

FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id

LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
 WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
                 return $query->result();
    }
    
    function getalldistrictcountsbyteacherblock_surplus($dist_id){
    $sql= "SELECT  students_school_child_count.block_name,students_school_child_count.block_id,students_school_child_count.district_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) then 1 else 0 end) as BT,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when (udise_staffreg.teacher_type=26 OR udise_staffreg.teacher_type=27 OR udise_staffreg.teacher_type=28 OR udise_staffreg.teacher_type=29) then 1 else 0 end) as HM

FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
WHERE students_school_child_count.district_id=".$dist_id."
group by students_school_child_count.block_id;";
        $query = $this->db->query($sql);
                 return $query->result();
  }
  
  function getalldistrictcountsbyclassteach_surplus($block_id){
        $sql= "SELECT  students_school_child_count.block_name,students_school_child_count.udise_code,students_school_child_count.school_name,
       sum(case when desgnation in (41)  then 1 else 0 end) as SG,
       sum(case when desgnation in(11) then 1 else 0 end) as BT,
       sum(case when desgnation in(36) then 1 else 0 end) as PG,
       sum(case when (udise_staffreg.teacher_type=26 OR udise_staffreg.teacher_type=27 OR udise_staffreg.teacher_type=28 OR udise_staffreg.teacher_type=29) then 1 else 0 end) as HM

      FROM teacher_transfer_appli  
      JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
      JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id
      LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
      WHERE students_school_child_count.block_id=".$block_id."
      group by students_school_child_count.udise_code;";
        $query = $this->db->query($sql);
                 return $query->result();
  }  

  /******** End report DSE ************/
  function getalldistrictcountsbyteacherblock($dist_id,$cate_type){
    $this->db->SELECT('students_school_child_count.district_name,students_school_child_count.block_id as block_id,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle) as Govteacher,district_name')
    ->FROM('teacher_profile_count')  
         ->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id')
        ->WHERE('students_school_child_count.school_type','Government')
          ->WHERE('students_school_child_count.district_id=',$dist_id)
            ->group_by('students_school_child_count.block_name')
          ->group_by('students_school_child_count.district_name');
   if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
  

  
  //emis_team
    function getalldistrictcountsbyclassteach($block_id,$cate_type){
        $this->db->SELECT('students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.school_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle) as Govteacher,block_name') 
        ->FROM('teacher_profile_count')
        ->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id')
        ->WHERE('students_school_child_count.school_type','Government')
        ->WHERE('students_school_child_count.block_id=',$block_id)
        ->group_by('students_school_child_count.school_id')
        ->group_by('students_school_child_count.udise_code')
         
        ->group_by('students_school_child_count.school_name');
     if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }  
  
  
  //emis_team
  function get_dist_countdge(){
    $this->db->SELECT('sum(class_studying_id=10) as tenth, sum(class_studying_id=11) as eleven, sum(class_studying_id=12) as twelve, sum(class_studying_id=10 or class_studying_id=11 or class_studying_id=12) as schoolcount'); 
    $this->db->FROM('students_child_detail');    
    $query = $this->db->get();
    return $query->result();
  }
  
  //emis_team  between 1 and 10
  function schoolcatemanagefilter($school_type,$cate,$id1,$id2){
    // echo $school_type;
    // echo $id1;
    // if($manage == 1){
    //  $manage = array(1,2,3,4,5,6,7,8,9,10);
    //  //echo json_encode($manage);
    // }
    // elseif($manage == 2){
    //  $manage = array(13,14,15,16,17,18,19,20,21); 
    //  //echo json_encode($manage);
    // }
    // elseif($manage == 3){
    //  $manage = array(22,23,24,25,26,27,29,35);
    //  //echo json_encode($manage);
    // }
    // elseif($manage == 4){
    //  $manage = array(11,12,28,30,31,32,33,34);
    //  //echo json_encode($manage);
    // }
    
    // if($cate == 1){
    //  $cate = array(1,11,12);
    //  //echo json_encode($cate);
    // }
    // elseif($cate == 2){
    //  $cate = array(2,4);
    //  //echo json_encode($cate);
    // }
    // elseif($cate == 3){
    //  $cate = array(6,7,8);
    //  //echo json_encode($cate);
    // }
    // elseif($cate == 4){
    //  $cate = array(3,5,9,10);
    //  //echo json_encode($cate);
    // }


    /**
    * Student Child Count Table to fetch Data
    * VIT
    * 04-01-2019
    */


    $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`school_name`, (Prkg_b+Prkg_g+Prkg_t) as PREKG, (lkg_b+lkg_g+lkg_t) as LKG, (ukg_b+ukg_g+ukg_t) as UKG, (c1_b+c1_g+c1_t) as class_1, (c2_b+c2_g+c2_t) as class_2, (c3_b+c3_g+c3_t) as class_3, (c4_b+c4_g+c4_t) as class_4, (c5_b+c5_g+c5_t) as class_5, (c6_b+c6_g+c6_t) as class_6, (c7_b+c7_g+c7_t) as class_7, (c8_b+c8_g+c8_t) as class_8, (c9_b+c9_g+c9_t) as class_9, (c10_b+c10_g+c10_t) as class_10, (c11_b+c11_g+c11_t) as class_11, (c12_b+c12_g+c12_t) as class_12, `total`, count(distinct(students_school_child_count.school_id)) as schoolcount, sum(teach_tot) as teachercount,sum(nonteach_tot) as nonteachercount')
      ->FROM('students_school_child_count')
     
     
     ->WHERE('school_type',$school_type)
     ->WHERE('cate_type',$cate)
     ->group_by('school_type')
     ->group_by('district_name')
     ->group_by('block_name')
     ->group_by('management')
     ->group_by('cate_type')
     ->group_by('school_id')
     ->group_by('udise_code')
     ->group_by('school_name');
     // print_r($id1);
     if(!empty($id1) && !empty($id2))
     {
       $this->db->WHERE('total<=',$id1);
       $this->db->WHERE('total>=',$id2);
     }
     else if(!empty($id2) && empty($id1) )
     {
      $this->db->WHERE('total>=',$id2);
     }
     else if(!empty($id1) && empty($id2) )
     {
      $this->db->WHERE('total<=',$id1);
     }
     // ->WHERE('schoolnew_basicinfo.curr_stat',1)
     // ->group_by('schoolnew_district.district_name')
     // ->group_by('schoolnew_block.block_name')
     // ->group_by('schoolnew_edn_dist_mas.edn_dist_name')
     // ->group_by('schoolnew_management.management')
     // ->group_by('baseapp_category.category_name')
     // ->group_by('schoolnew_basicinfo.school_id')
     // ->group_by('schoolnew_basicinfo.udise_code')
     // ->group_by('schoolnew_basicinfo.school_name');
     $query =  $this->db->get();
      // print_r($query->result());die;
       if($query->num_rows() > 0){
      return $query->result();
       }else{
      return false;
       }  
  }
  
  //emis dashboard2
  function get_countdash1(){
        
    $this->db->SELECT('sum(total) as total,school_id');
    $this->db->FROM('students_school_child_count');
    $query =  $this->db->get();
    return $query->result();
    }
  
  /*function get_countdash2(){
        
    $this->db->SELECT('(Prkg_b+Prkg_g+Prkg_t) as PREKG,(lkg_b+lkg_g+lkg_t) as LKG,(ukg_b+ukg_g+ukg_t) as UKG,(c1_b+c1_g+c1_t) as class_1,(c2_b+c2_g+c2_t) as class_2,(c3_b+c3_g+c3_t) as class_3,(c4_b+c4_g+c4_t) as class_4,(c5_b+c5_g+c5_t) as class_5,(c6_b+c6_g+c6_t) as class_6,(c7_b+c7_g+c7_t) as class_7,(c8_b+c8_g+c8_t) as class_8,(c9_b+c9_g+c9_t) as class_9,(c10_b+c10_g+c10_t) as class_10,(c11_b+c11_g+c11_t) as class_11,(c12_b+c12_g+c12_t) as class_12')
    ->FROM('students_school_child_count')
    ->JOIN('schoolnew_basicinfo','students_school_child_count.school_id=schoolnew_basicinfo.school_id','left')
        ->JOIN('schoolnew_management','schoolnew_basicinfo.manage_cate_id=schoolnew_management.mana_cate_id','left')
    ->WHERE('schoolnew_basicinfo.manage_cate_id',1);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }*/

        /*Models Written By Vivek Rao Ramco Cements*/
        function profilecompletecount($groupby){
             $SQL="SELECT 
  COUNT(*) AS tot, 
  SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_1=1 THEN 1 
            ELSE 0 END ELSE 0 END) as p1,
    SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_2=1 THEN 1 ELSE 0 END ELSE 0 END) as p2,
    SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_3=1 THEN 1 ELSE 0 END ELSE 0 END) as p3,
    SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_4=1 THEN 1 ELSE 0 END ELSE 0 END) as p4,
    SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_5=1 THEN 1 ELSE 0 END ELSE 0 END) as p5,
    SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_6=1 THEN 1 ELSE 0 END ELSE 0 END) as p6,
   SUM(CASE WHEN school_id=school_key_id THEN
      CASE WHEN part_7=1 THEN 1 ELSE 0 END ELSE 0 END) as p7,
            schoolnew_basicinfo.curr_stat,
schoolnew_basicinfo.udise_code,schoolnew_basicinfo.school_name,schoolnew_district.district_name,schoolnew_block.block_name,schoolnew_district.id as did,schoolnew_block.id as bid,IF(schoolnew_profilecomplete.school_key_id=schoolnew_basicinfo.school_id,1,0) as chkbit
FROM schoolnew_profilecomplete,schoolnew_basicinfo
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id ".$groupby;
                $query = $this->db->query($SQL);
                return $query->result_array();
            }


          /**
          *VIT -sriram
          */
        public function get_school_type()
        {
            $result = $this->db->get('schoolnew_type')->result();
            return $result;
        }


         
  
        public function getallstate_dse($school_type,$cate_type)
        {
          
          $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(1,5,15,17,19,20,21,22,23,24,26,31,33));



          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->group_by('district_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }
/*jan 28th 2019*/
             public function get_state_school_student_teacher_total()
          {

            $this->db->SELECT('sum(teach_mle+teach_fmle+nonteach_mle+nonteach_fmle) as teacher_total,sum(nonteach_mle+nonteach_fmle) as nonteaching_total,sum(total) student_total,count(students_school_child_count.school_id) as school_total')
            ->FROM('teacher_profile_count')
            -> JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right');
            

            $result = $this->db->get()->first_row();
            // echo"<pre>";print_r($result);echo"</pre>";die;
            return $result;

          }

          public function get_districtwise_report($user_type)
    {
         $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_WHERE('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
    }
          public function govt_enrollment()
          {
        $SQL=" SELECT sum(Prkg_b+Prkg_g+Prkg_t+lkg_b+lkg_g+lkg_t+ukg_b+ukg_g+ukg_t+c1_b+c1_g+c1_t) as total FROM students_school_child_count WHERE school_type_id=1"; 
//print_r($SQL);
//die();
        $query = $this->db->query($SQL);
        return $query->result();
            
          }
        

         
          public function get_state_scool_type_based_schoolinfo()
          {
              $this->db->SELECT('school_type');
              $this->db->group_by('school_type');
              $result = $this->db->get_WHERE('students_school_child_count',array('school_type !='=>''))->result();
              //print_r($result);die;

              if(!empty($result))
              {
              $over_school_info['result'] = $result;

                foreach($result as $res)
                {
                  $school_info[] = $this->get_state_school_type_count($res->school_type);
                }
              $over_school_info['school_info'] = $school_info;

                
              }else
              {
                $over_school_info['school_info'] = '';
                $over_school_info['result'] = '';
              }
              // $over_school_info['school_type'] = $result;
            // echo"<pre>";print_r($over_school_info);echo"</pre>";die;
              
              return $over_school_info;
          }

          public function get_state_school_type_count($school_type)
          {
            
            $this->db->SELECT('sum(nonteach_mle+nonteach_fmle) as non_teach,IFNULL(sum(teach_mle+teach_fmle),0) as teacher_total,IFNULL(sum(total),0) student_total,IFNULL(count(*),0) as school_total,district_id')
            ->FROM('teacher_profile_count')
            ->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
            ->WHERE('school_type',$school_type);
            


             $result = $this->db->get()->first_row();
              // print_r($)
             $school_details[$school_type] = $result;

             return $school_details;
          }

          //pearlin
   public function get_state_renewal_details()
           {
            $SQL="SELECT 
  (SELECT 
    COUNT(*)
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth=0) AND schoolnew_renewal.vaild_upto IS NULL
  ) AS BEO,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE  (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL
    
  ) AS DE0,
  (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
  JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
WHERE (department like '%Directorate%of%School%Education%' OR  department 
 like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth=2) AND schoolnew_renewal.vaild_upto IS NULL) AS CE0,
    (SELECT count(*) FROM schoolnew_renewal WHERE vaild_FROM is not null and vaild_FROM !='0000-00-00') AS APPROVED,
  (SELECT count(*) FROM schoolnew_renewal WHERE vaild_FROM is not null and vaild_FROM ='0000-00-00') AS REJECTED,
    (SELECT 
    COUNT(*) 
  FROM 
    schoolnew_renewal 
        JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
        WHERE schoolnew_renewal.vaild_upto IS NULL
  ) AS TOTAL,  school_name,udise_code,district_name,block_name,createddate, schoolnew_basicinfo.district_id,schoolnew_basicinfo.block_id
    FROM
    schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
   
    WHERE vaild_FROM IS NULL";

     $query = $this->db->query($SQL);
     return $query->result_array();
           }
     /**  public function get_blockwise_school($district)
        {

            $this->db->SELECT('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total,block_name')
              ->FROM('students_school_child_count')
              ->WHERE('district_name',$district)
              ->group_by('block_name');
              $query = $this->db->get();
           return $query->result();
             

    }*/
        public function get_blockwise_school($block_name,$school_type,$cate_type)
        {

            $this->db->SELECT('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
              ->FROM('students_school_child_count')

               ->WHERE('block_id',$block_name);
          

                if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
           

            $this->db->WHERE_in('school_type_id',$school_type);
          }else

          {

            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->WHERE_in('cate_type',$cate_type);

          }
          $this->db->group_by('school_id'); 

           $result = $this->db->get()->result();
            //  print_r($this->db->last_query());die()       
          return $result; 

        }


     public function get_state_schoolwise($blk)
        {

            $this->db->SELECT('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total,block_name')
              ->FROM('students_school_child_count')
              ->WHERE('block_name',$blk)
              ->group_by('school_name');
              $query = $this->db->get();
           return $query->result();
             

    }



    
      
    
        
      
    /**
  * Get Teacher Strick Report
  * VIT-Sriram
  * 01/02/2019
  **/
    public function get_teacherstrick_reports($school_type)
    {
      // $this->db->distinct();
      $this->db->SELECT("sum(b.totstaff) as total_teacher,b.district_name,sum(a.part) as 'teacher_participate',sum(a.notpart) as 'teacher_not_participate'");
      $this->db->FROM('students_school_child_count b');
      $this->db->JOIN(" (SELECT count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id FROM teacher_report WHERE archive = 1 group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
      $this->db->WHERE_in('school_type',$school_type);
      $this->db->group_by('b.district_name');
      
      $result = $this->db->get()->result();
      // print_r($this->db->last_query());
      
      // print_r($result);
      return $result; 
    }

    /**
    * Get Teacher District Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_district_reports($dist_name,$school_type)
    {
      $this->db->distinct();
     $this->db->SELECT("sum(b.totstaff) as total_teacher,b.edu_dist_name,sum(a.part) as 'teacher_participate',sum(a.notpart) as 'teacher_not_participate'");
      $this->db->FROM('students_school_child_count b');
      $this->db->JOIN(" (SELECT count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id FROM teacher_report WHERE archive = 1  group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
      $this->db->WHERE('district_name',$dist_name);
      $this->db->WHERE_in('b.school_type',$school_type);
      $this->db->group_by('b.edu_dist_name');
      $result = $this->db->get()->result();

      // print_r($this->db->last_query());
      return $result;  
    }
    /**
    * Get Teacher Block Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_block_reports($edu_name,$school_type)
    {
      $this->db->distinct();
       $this->db->SELECT("sum(b.totstaff) as total_teacher,b.block_name,sum(a.part) as 'teacher_participate',sum(a.notpart) as 'teacher_not_participate'");
      $this->db->FROM('students_school_child_count b');
      $this->db->JOIN(" (SELECT count(distinct teacher_id),sum(IF(teacher_report.partici='1',1,0)) as 'part',sum(IF(teacher_report.partici='0',1,0)) as 'notpart',school_key_id FROM teacher_report WHERE archive = 1 group by school_key_id) a",'a.`school_key_id` = b.school_id','left');
      $this->db->WHERE('b.edu_dist_name',$edu_name);
      $this->db->WHERE_in('b.school_type',$school_type);
      $this->db->group_by('b.block_name');
      $result = $this->db->get()->result();
      // print_r($result);
      return $result;
    }

    /**
    * Get Teacher School Strick Report
    * VIT-Sriram
    * 01/02/2019
    **/

    public function get_teacherstrick_school_reports($block_name,$school_type)
    {
      // echo $block_name;
      $this->db->distinct();
      $this->db->select("count(DISTINCT(a.teacher_id)),b.totstaff as total_teacher,sum(if(partici=1,1,0)) as 'teacher_participate', sum(if(partici =0,1,0)) as 'teacher_not_participate',school_name,udise_code,school_id");
      $this->db->from('students_school_child_count b');
      $this->db->join('teacher_report a','a.school_key_id = b.school_id','left');
      $this->db->where('b.block_name',$block_name);
      $this->db->where_in('b.school_type',$school_type);
      $this->db->group_by('b.school_id');
      $this->db->WHERE('a.archive',1);
      $result = $this->db->get()->result();
      // print_r($result);
      return $result;

    }

    public function get_teacherstrick_teacher_reports($school_id,$school_type)
    {
      // echo $school_id;
      $this->db->distinct();
      $this->db->SELECT('*');
      $this->db->FROM('teacher_report');
      $this->db->JOIN('udise_staffreg','udise_staffreg.school_key_id = teacher_report.school_key_id and udise_staffreg.teacher_code = teacher_report.teacher_id ');
      $this->db->WHERE('teacher_report.school_key_id',$school_id);
      $this->db->WHERE('teacher_report.archive',1);
      $result = $this->db->get()->result();
      // print_r($result);die;
      return $result;
    }

    public function get_school_name($school_id)
    {
      $this->db->SELECT('school_name');
      $result = $this->db->get_WHERE('students_school_child_count',array('school_id'=>$school_id))->first_row();
      // print_r($result);
      return $result;
    } 
        
   
        
        
   
  
    //****Done by pearlin********/

      

    public function get_state_renewal_pending_details()

    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
    
        WHERE (department like '%Directorate%of%Elementary%Education%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth=0) AND schoolnew_renewal.vaild_upto IS NULL";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
      public function get_state_deo_pending_details()
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
  
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
        WHERE  (department like '%Directorate%of%School%Education%' or  department like '%Directorate%of%Matriculation %Schools%') AND schoolnew_renewal.id NOT IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE (auth!=3 OR auth!=3 or auth IS NULL) ) AND schoolnew_renewal.vaild_upto IS NULL";
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
     public function get_state_ceo_pending_details()
    {
   $SQL=   "SELECT * FROM schoolnew_renewal 
    JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id
    JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
    JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
    JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id 
       WHERE (department like '%Directorate%of%School%Education%' OR  department  like '%Directorate%of%Matriculation %Schools%' OR department not like '%Directorate%of%Elementary%Education%' ) AND schoolnew_renewal.id IN (SELECT renewal_id FROM schoolnew_renewapprove WHERE auth=2) AND schoolnew_renewal.vaild_upto IS NULL";
          
            $query = $this->db->query($SQL);
        return $query->result_array();

    }
    
    function get_dist_teaching_details($cate_type){
       $this->db->SELECT("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,district_name,district_id as dist_id");
        $this->db->FROM('teacher_profile_count');
        $this->db->JOIN('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('district_id');
     
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          
               $result = $this->db->get()->result();
              //print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
    }
    function get_dist_non_teaching_details($cate_type){
        $this->db->SELECT(" 
       sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,district_name,district_id as dist_id")
     ->  FROM ('teacher_profile_count') 
      ->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right')
       ->group_by ('district_id');
          if(!empty($cate_type))
              {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
         }

    /**
        *Get Attendance School Report Districtwise
        *VIT-sriram
        *08/02/2019
        **/

        public function get_attendance_schoolreport_districtwise($date,$table)
        {
          

            $date = date('Y-m-d',strtotime($date));
         
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("b.district_name,b.district_id,count(distinct b.school_id) as total_school",false)
         ->SELECT('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked_school"',false)
         ->SELECT('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked_school"',false)
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT count(st_section) as section,school_id FROM '.$table.' WHERE date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->WHERE_in('school_type',$school_type)
         ->where('b.total>',0)
         ->group_by('b.district_name');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          return $result;
         
        }

        public function get_attendance_teacherreport_districtwise($date,$table)
        {

           $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("count(a.school_id) as total_school,a.district_name,a.district_id",false)
         ->SELECT('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT count(distinct school_code) as "marked_school" ,school_code FROM '.$table.' WHERE date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
         ->WHERE_in('school_type',$school_type)
         ->where('a.totstaff>',0)
         ->group_by('a.district_name');
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
          
        }

       

        /**
        *get attendance school Blockwise
        *VIT - sriram
        *08/02/2019
        **/

        public function get_attendance_schoolreport_blockwise($dist_id,$date,$table)
        {
            $date = date('Y-m-d',strtotime($date));
          // echo $date;
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("b.block_name,b.block_id,count(distinct b.school_id) as total_school",false)
         ->SELECT('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked_school"',false)
         ->SELECT('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked_school"',false)
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT count(st_section) as section,school_id FROM '.$table.' WHERE date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->WHERE_in('school_type',$school_type)
         ->WHERE('district_id',$dist_id)
         ->where('b.total>',0)
         ->group_by('b.block_name');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          return $result;
         
        }
        /**
        * Get attendance Teacher Blockwise
        * VIT-sriram
        * 18/02/2019
        **/

        public function get_attendance_teacherreport_blockwise($dist,$date,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("count(a.school_id) as total_school,a.block_name,a.block_id",false)
         ->SELECT('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT count(distinct school_code) as "marked_school" ,school_code FROM '.$table.' WHERE date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
         ->WHERE('district_id',$dist)
         ->WHERE_in('school_type',$school_type)
         ->where('a.totstaff>',0)
         ->group_by('a.block_name');
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
        }

        /**
        *get attendance school schoolWise
        *VIT - sriram
        *08/02/2019
        **/
        public function get_attendance_report_schoolwise($block_id,$date,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');

         
          $this->db->SELECT("b.section_nos,b.udise_code,b.school_name,sum(total) as today_total_student,b.school_id",false)
         ->SELECT('sum(IFNULL(section, 0)) as marked_section',false)
         ->SELECT('IFNULL(a.persent, 0) as today_present',false)
         ->SELECT('IFNULL(absent, 0) as today_absent ',false)
         ->SELECT('IFNULL(today_present,0) as total_persent')
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT sum(session1_all) as today_present,count(st_section) as section,sum(session1_allP) as persent ,sum(session1_allA) as absent,school_id FROM '.$table.' WHERE date = "'.$date.'"  group by school_id) as a','a.school_id = b.school_id','left')
         ->WHERE_in('school_type',$school_type)
         ->WHERE('b.block_id',$block_id)
         ->where('b.total>',0)
         ->group_by('b.school_id');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
          //   echo "<pre>";
          // print_r($result);
          // echo "</pre>";die;
              return $result;
          }
        
        public function get_attendance_teacher_report_schoolwise($date,$block_id,$table)
        {

          $date = date('Y-m-d',strtotime($date));
          $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("sum(distinct a.totstaff) as total_teacher,a.school_id,udise_code,school_name",false)
         ->SELECT('(case when (b.absent is null) then 0 else (a.totstaff - sum(IFNULL(b.absent, 0))) end) as present',false)
         ->SELECT('sum(IFNULL(b.absent,0)) as absent,IFNULL(b.school_code,-1) school_code',false)
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT school_code,

sum(distinct case when (attstatus!="") then 1 else 0 end) as absent FROM '.$table.' WHERE date = "'.$date.'" group by teacher_code,school_code) as b','a.udise_code = b.school_code','left')
         ->WHERE('a.block_id',$block_id)
         ->WHERE_in('a.school_type',$school_type)
         ->where('a.totstaff>',0)
         ->group_by('a.school_id');
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);
         return $result;

        }

        /**
        * classwise Report
        * 22/01/2019
        * VIT-Sriram
        **/

        public function get_attendance_report_classwise($school_id)
        {
            // $this->db->SELECT('schoolnew_section_group.*,students_school_child_count.udise_code,students_school_child_count.school_name')
            // ->FROM('students_school_child_count')
            // ->JOIN('schoolnew_section_group','schoolnew_section_group.school_key_id = students_school_child_count.school_id')
            // ->WHERE('school_id',$school_id)
            // ->group_by('class_id');

            // $result = $this->db->get()->result();
            // return $result;

        }

        public function get_attendance_report_section($class_id,$school_id)
        {

            $result = $this->db->get_WHERE('schoolnew_section_group',array('class_id'=>$class_id,'school_key_id'=>$school_id))->result_array();
            
            return $result;
        }


        /**
        * Get Teacher Attendace classwise
        * VIT-sriram
        * 18/02/2019
        **/

        public function get_attendance_teacher_classwise($date,$school_id,$table)
        {
            $date = date('Y-m-d',strtotime($date));
          $this->db->SELECT('b.teacher_name, IFNULL(a.present,1) as present, a.attres, gender',false)
          ->FROM('udise_staffreg as b')
          ->JOIN('(SELECT a.teacher_name, IF(a.attstatus="", "1", "0") as present, `a`.`attres`,a.teacher_code,a.school_id FROM '.$table.' as `a` WHERE `a`.`date` = "'.$date.'") as a','a.teacher_code =  b.u_id','left')
          
          ->WHERE('b.school_key_id',$school_id)
          ->WHERE('b.archive ',1);
          
          $result = $this->db->get()->result();
          // print_r($this->db->last_query());
          return $result;
        }

    /**
     * get School Type Districts
     * VIT-sriram
     * 01/02/2019
     */

     public function get_attendance_school_type($date,$table)
     {
      $date = date('Y-m-d',strtotime($date));
         $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("b.district_name,b.district_id,b.school_type,count(distinct b.school_id) as total_school",false)
         ->SELECT('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked"',false)
         ->SELECT('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked"',false)
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT count(st_section) as section,school_id FROM '.$table.' WHERE date = "'.$date.'" group by school_id) as a','b.school_id = a.school_id','left')
         ->WHERE_in('school_type',$school_type)
         ->where('b.total>',0)
         ->group_by('school_type')
         ->order_by("b.school_type_id asc");
         
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);die;
        return $result;
     }

     /**
     * get School Type Districts Teacher
     * VIT-sriram
     * 18/02/2019
     */

     public function get_attendance_teacher_type($date,$table)
     {
      $date = date('Y-m-d',strtotime($date));
      // echo $table;
         $school_type = array('Government','Fully Aided','Partially Aided');

         $this->db->SELECT("count(a.school_id) as total_school,a.school_type",false)
         ->SELECT('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT count(distinct school_code) as "marked_school" ,school_code FROM '.$table.' WHERE date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
         ->WHERE_in('school_type',$school_type)
         ->group_by('a.school_type')
         ->where('a.totstaff>',0)
         ->order_by("a.school_type_id asc");
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
     }


     /**
     * Get School Type Blockwise
     * VIT-sriram
     * 01/02/2019
     **/
     public function get_attendance_school_type_blockwise($dist,$date,$table)
     {
      $date = date('Y-m-d',strtotime($date));
         $school_type = array('Government','Fully Aided','Partially Aided');
         $this->db->SELECT("b.school_type,count(distinct b.school_id) as total_school",false)
         ->SELECT('sum(IF(a.section = b.section_nos,1,0)) as "Fully_Marked"',false)
         ->SELECT('sum(IF(a.section != b.section_nos,1,0)) as "Partially_Marked"',false)
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT count(st_section) as section,school_id FROM '.$table.' WHERE date = "'.$date.'" group by school_id) 
     as a','b.school_id = a.school_id','left')
         ->WHERE_in('school_type',$school_type)
         ->WHERE('b.district_id',$dist)
         ->group_by('school_type')
         ->where('b.total>',0)
         ->order_by("b.school_type_id asc");

         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         // print_r($result);die;
        return $result;
     }    

      /**
      * Teacher Attendance Blockwise
      * VIT-sriram
      * 18/02/2019
      ***/
     public function get_attendance_teacher_tpye_blockwise($dist,$date,$table)
     {
      $date = date('Y-m-d',strtotime($date));

         $school_type = array('Government','Fully Aided','Partially Aided');

         $this->db->SELECT("count(a.school_id) as total_school,a.school_type",false)
         ->SELECT('sum(IFNULL(b.marked_school,0)) as marked_school',false)
         
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT count(distinct school_code) as "marked_school" ,school_code FROM '.$table.' WHERE date = "'.$date.'" group by school_code) as b','a.udise_code = b.school_code','left')
          ->WHERE('a.district_id',$dist)
         ->WHERE_in('school_type',$school_type)

         ->group_by('a.school_type')
         ->where('a.total>',0)
         ->order_by("a.school_type_id asc");
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
     }

     public function get_attendance_search_details($date,$school_type,$district,$block,$table)
     {
       
      $date = date('Y-m-d',strtotime($date));
      // echo $table;
        $this->db->SELECT("b.section_nos,b.udise_code,b.school_name,sum(total) as today_total_student,b.school_id",false)
         ->SELECT('sum(IFNULL(section, 0)) as marked_section',false)
         ->SELECT('IFNULL(a.persent, 0) as today_present',false)
         ->SELECT('IFNULL(absent, 0) as today_absent ',false)
         ->SELECT('IFNULL(today_present,0) as total_persent')
         ->FROM('students_school_child_count b')
         ->JOIN(' (SELECT sum(session1_all) as today_present,count(st_section) as section,
     sum(session1_allP) as persent ,sum(session1_allA) as absent,school_id FROM '.$table.' WHERE 
     date = "'.$date.'"  group by school_id) as a','a.school_id = b.school_id','left');
         $this->db->where('b.total>',0);
         if(!empty($school_type))
         {
            $this->db->WHERE('school_type',$school_type['name']);
           $this->db->WHERE($school_type['atten_details']);
           $this->db->WHERE('district_id',$school_type['district']);
           
         }

         if(!empty($district))
         {

            $this->db->WHERE('district_id',$district['name']);
           $this->db->WHERE_in('school_type',$district['school_type']);
           $this->db->WHERE($district['atten_details']);


         }

         if(!empty($block))
         {

             $this->db->WHERE('block_id',$block['name']);
            $this->db->WHERE($block['atten_details']);
            $this->db->WHERE_in('school_type',$block['school_type']);
         }

         $this->db->group_by('b.school_id');


         $result = $this->db->get()->result();
         // print_r($this->db->last_query());die;
         return $result;

     }


     /**
     * Attendance Teacher Search
     * VIT-sriram
     * 16/03/2019
     **/
     public function get_teacher_attendance_search($date,$school_type,$district,$block,$table)
     {
     
      //print_r($date);
   // print_r($school_type);
   // print_r($district);
   // print_r($table);
   // die();
          // $school_type = array('Government','Fully Aided','Partially Aided');
      $date = date('Y-m-d',strtotime($date));
         $this->db->SELECT("sum(distinct a.totstaff) as total_teacher,a.school_id,udise_code,school_name",false)
         ->SELECT('(case when (b.prensent is null and school_code is null) then 0 else (a.totstaff - IFNULL(b.absent, 0)) end) as present',false)
         ->SELECT('sum(IFNULL(b.absent,0)) as absent,IFNULL(b.school_code,-1) school_code',false)
         ->FROM('students_school_child_count a')
         ->JOIN(' (SELECT distinct teacher_code,school_code,school_id,
                sum(distinct case when attstatus="" then 1 else 0 end) as prensent,
                sum(distinct case when attstatus!=""  then 1 else 0 end) as absent FROM '.$table.' WHERE date = "'.$date.'" group by teacher_code,school_id)
        as b','a.school_id = b.school_id','left');
         $this->db->where('a.total>',0);
         if(!empty($school_type))
         {
           $this->db->WHERE('school_type',$school_type['name']);
           $this->db->WHERE($school_type['atten_details']);
           $this->db->WHERE('district_id',$school_type['district']);
           
         }

         if(!empty($district))
         {

           $this->db->WHERE('district_id',$district['name']);
           $this->db->WHERE_in('school_type',$district['school_type']);
           $this->db->WHERE($district['atten_details']);

         }

         if(!empty($block))
         {

            $this->db->WHERE('block_id',$block['name']);
            $this->db->WHERE($block['atten_details']);
            $this->db->WHERE_in('school_type',$block['school_type']);
         }

         $this->db->group_by('a.school_id');
         $result = $this->db->get()->result();
         // print_r($this->db->last_query());
         return $result;
     }

    /**
     * Get Attendance Classwise
     * VIT-sriram
     * 13/02/2019
     **/
     public function get_attendance_classwise_details($school_id,$date,$table)
     {
    
        $this->db->SELECT('low_class,high_class');
        $result = $this->db->get_WHERE('students_school_child_count',array('school_id'=>$school_id))->first_row();
        // print_r($result->low_class);
        $SELECT_arr = [];
     $SELECT_len = [];
        if(!empty($result)){
       if($result->low_class == 15)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($SELECT_len, $i);

          array_push($SELECT_arr, ('(Prkg_b+Prkg_g+Prkg_t) as Prkg'),('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class == 13)
        {

          for($i=1;$i<=$result->high_class;$i++)
      {
        array_push($SELECT_len, $i);

          array_push($SELECT_arr,('(lkg_b+lkg_g+lkg_t) as lkg'),('(ukg_b+ukg_g+ukg_t) as ukg'),('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else if($result->low_class !=0 && $result->high_class !=0)
        {
          for($i=$result->low_class;$i<=$result->high_class;$i++)
      {
        // array_push($SELECT_len, $i);

          array_push($SELECT_arr, ('(c'.$i.'_b+c'.$i.'_g+c'.$i.'_t) as c'.$i));
      }
        }else
        {
          array_push($SELECT_arr,'*');
        }
        
      }

      // print_r($SELECT_arr);

      $SELECT_query = implode(",", $SELECT_arr);
      $this->db->SELECT($SELECT_query);
      
     $school_details =  $this->db->get_WHERE('students_school_child_count',array('school_id'=>$school_id))->first_row();

      

        $classwise = [];
          // print_r($result->low_class);
          // print_r($school_att_details);

if($result->low_class == 15)
        {

              $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,15,$school_details,$date,$table);

            array_push($classwise,$temparr);


         // echo $result->low_class;
        $k = sizeof($classwise);

          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k+1;
        // echo $i;
         
              $classwise[] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
        
      }
      
        }else if($result->low_class == 13)
        { 

          $temparr = $this->get_attendance_class_details($school_id,13,$school_details,$date,$table);

            array_push($classwise,$temparr);
            $temparr = $this->get_attendance_class_details($school_id,14,$school_details,$date,$table);
            
            array_push($classwise,$temparr);
        
        $k = sizeof($classwise);
        // echo $result->low_class;
          for($i=1;$i<=$result->high_class;$i++)
      {   
        $k = $k;
        // echo $k;
         
              $classwise[] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);
              $k = $k+1;
        
      }
          
      }else
      {

        
            // $classwise = [];
            for($i=$result->low_class;$i<=$result->high_class;$i++)
          {   

              // $class = 'c'.$i;
            
                
              $classwise[] = $this->get_attendance_class_details($school_id,$i,$school_details,$date,$table);

           
      
          }

       
        
     }
        // echo "<pre>";print_r($classwise);echo"</pre>";
        return $classwise;

   }
     public function get_attendance_class_details($school_id,$class_id,$school_info,$date,$table)
     {
      // echo $class_id;
      $this->db->SELECT('sum(session1_allP) as present,sum(session1_allA) as absent,st_class');
        $this->db->FROM($table);
        $this->db->WHERE('date',date('Y-m-d',strtotime($date)));
        $this->db->WHERE('school_id',$school_id);
        $this->db->WHERE('st_class',$class_id);
        // $this->db->group_by('st_class');
        $result  = $this->db->get()->first_row();
        // print_r($this->db->last_query());
        // echo $class_id;
        if($class_id==13)
        {
          $class = 'lkg';
        }else if($class_id==14)
        {
          $class = 'ukg';
        }else if($class_id==15)
        {
          $class = 'Prkg';
        }else
        {

        $class = 'c'.$class_id;
        }
        // echo $class;
        // print_r($school_info);
        $classwise['total_class'] = $school_info->$class;
        if(!empty($result->st_class)){
        $classwise['class'] = $result->st_class;
        $classwise['present'] = $result->present;
        $classwise['absent'] = $result->absent;
        }else
        {
          // echo $class_id;
        $classwise['class'] = $class_id;
        $classwise['present'] = 0;
        $classwise['absent'] = 0;
        }
        // print_r($classwise);
        return $classwise;
     }


     public function get_attendance_sectionwise_details($school_id,$class,$table,$date)
     {
      $date = date('Y-m-d',strtotime($date));

               $this->db->SELECT('id,name,unique_id_no,class_section,gender');
              $this->db->FROM('students_child_detail');
              $this->db->WHERE('school_id',$school_id);
              $this->db->WHERE('transfer_flag',0);
              $this->db->WHERE('class_studying_id',$class);
              $result = $this->db->get()->result();
              // print_r($result);
              if(!empty($result))
              {   $absent_name = [];

                    $absent_list = [];
                 
                      $status = 0;
                      // print_r($result);
                      $old_unique_id = ''; 
                      $old_section = ''; 

                      foreach($result as $index=>$class_det)
                      {   


                      $abse = $this->get_attendance_sectionwise_name($date,$table,$school_id,$class,$class_det->class_section);
                      
                      if(!empty($abse))
                      {
                        if($abse->session1_allA !=0){
                          // echo "if".$index;
                         $absent_name = explode(",",$abse->session1_students);

                         foreach($absent_name as $absindex =>$abs)
                          {

                             if($class_det->id == $abs)
                          {
                                $absent_list[$index]['name'] = $class_det->name;
                                $absent_list[$index]['section'] = $class_det->class_section; 
                                $absent_list[$index]['present'] = "0";
                                $absent_list[$index]['unique_id'] = $class_det->id;
                                $absent_list[$index]['gender'] = $class_det->gender;
                                
                                $status = 0;
                                $old_unique_id = $abs;
                                // echo ($abs=='3302010011300241');
                          } 
                          }

                          }
                          
                          if($old_unique_id !=$class_det->id)
                          { 
                            
                            // echo $index."if<br/>";

                                $absent_temp['name'] = $class_det->name; 
                                $absent_temp['section'] = $class_det->class_section; 

                                $absent_temp['present'] = "1";
                                $absent_temp['unique_id'] = $class_det->id;
                                $absent_temp['gender'] = $class_det->gender;
                                
                                array_push($absent_list,$absent_temp);
                          }

                      }else
                      {
                        // echo "else";
                                $absent_list[$index]['name'] = $class_det->name;
                                $absent_list[$index]['section'] = $class_det->class_section; 
                                $absent_list[$index]['present'] = "-1";
                                $absent_list[$index]['gender'] = $class_det->gender;
                                
                                 
                      }


                      }
                     // echo"<pre>";print_r($absent_list);echo"</pre>";die;

                     
                      
        return $absent_list;



              }

            }

          /**
          * Get Attendance Students Name
          * 20/02/2019
          * VIT-sriram
          **/
          public function get_attendance_sectionwise_name($date,$table,$school_id,$class,$section)
          {

            $this->db->SELECT('session1_students,st_section,session1_allA');
            $this->db->FROM($table);
            $this->db->WHERE('date',$date);
            $this->db->WHERE('school_id',$school_id); 
              $this->db->WHERE('st_class',$class);
              $this->db->WHERE('st_section',$section);
              $this->db->group_by('st_section');

              return $this->db->get()->first_row();
              
          }



     


/******************************* End Of the Attendance *********************/




     /**
     * Get Renewal District
     * VIT-sriram
     * 11/02/2019
     **/

    public function get_renewal_state_district($school_type,$district_id)
     {
       
      //print_r($district_id);print_r($school_type);die();

        $this->db->SELECT('ssc.district_name,ssc.block_name
        ,count(ssc.management) as mange,count(ac.yr_last_renwl) as last_year');
        $this->db->FROM('students_school_child_count ssc');
        $this->db->JOIN('schoolnew_academic_detail ac','ac.school_key_id = ssc.school_id','left');

        if(!empty($district_id)){
      $this->db->join('schoolnew_basic_detail as sb','sb.school_id = ssc.school_id','left');
      $this->db->join('schoolnew_school_department sd','sd.id = sb.sch_directorate_id','left');
          $this->db->WHERE_in('ssc.school_type',$school_type);
          $this->db->WHERE('ssc.district_id',$district_id);
          $this->db->group_by('ssc.block_name');

       
        }elseif(!empty($block_id)){
          $this->db->WHERE_in('ssc.school_type',$school_type);
          $this->db->WHERE_in('ssc.block_id',$block_id);
          $this->db->group_by('ssc.school_id');
        }else{
         
          $this->db->WHERE_in('ssc.school_type',$school_type);
          $this->db->group_by('ssc.district_name');
        }          
         $result = $this->db->get()->result();
       
        //print_r($this->db->last_query());die();
         return $result;
      }


      

        /**
     * Get Renewal block
     * VIT-sriram
     * 11/02/2019
     **/

     public function get_renewal_state_block($school_type,$dist_name)
     {
      // echo $dist_name;
          $this->db->SELECT('ssc.block_name
,count(ssc.management) as mange,count(ac.yr_last_renwl) as last_year')
          ->FROM('students_school_child_count ssc')
          ->JOIN('schoolnew_academic_detail ac','ac.school_key_id = ssc.school_id','left')
          ->WHERE('district_name',$dist_name)
          ->WHERE_in('ssc.school_type',$school_type)
          ->group_by('ssc.block_name');

          $result = $this->db->get()->result();
          // print_r($result);
          return $result;
        }

          /**
     * Get Renewal School
     * VIT-sriram
     * 11/02/2019
     **/

     public function get_renewal_state_school($school_type,$block_name)
     {
      // echo $dist_name;
          $this->db->SELECT('ssc.school_name,ssc.management,ssc.category,ssc.udise_code,ssc.school_id
,ssc.management as mange, ac.yr_last_renwl as last_year,yr_recgn_first,ac.certifi_no ,sd.department')
          ->FROM('students_school_child_count ssc')
          ->JOIN('schoolnew_academic_detail ac','ac.school_key_id = ssc.school_id','left')
          ->JOIN('schoolnew_basic_detail sb','sb.school_id = ssc.school_id','left')
          ->JOIN('schoolnew_school_department sd','sd.id = sb.sch_directorate_id','left')

          ->WHERE('block_name',$block_name)
          ->WHERE_in('ssc.school_type',$school_type)
          ->group_by('ssc.school_id');

          $result = $this->db->get()->result();
          // print_r($result);
          return $result;
        }

//pearlin
        public function get_emis_blockwise_district($district_name,$school_type,$cate_type)
            {

                $this->db->SELECT('block_name,block_id,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
                  ->FROM('students_school_child_count')
                  ->WHERE('district_id',$district_name);
                  if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type_id',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                 //  print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;
            }
     
              public function get_emis_blockwise_dee($district_name,$school_type,$cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array('2','3','16','18','27','29','32','34','42'));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('district_name',$district_name);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                   print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
            public function get_emis_blockwise_dse($district_name,$school_type,$cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(1,5,15,17,19,20,21,22,23,24,26,31,33));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('district_name',$district_name);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
             public function get_emis_blockwise_dms($dist_id,$cate_type)
            {
     
               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(28));
         if(!empty($cate_type))  
          {

             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('district_id',$dist_id);
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
        
        function getalldistrictcountsbyteachingblock($dist_id){
            $SQL="SELECT 
        sum(case when school_type='Un-aided' then teach_tot else 0 end) as unaided,
        sum(case when school_type='Fully Aided' then teach_tot else 0 end) as fullyaided,
        sum(case when school_type='Government' then teach_tot else 0 end) as government,
        sum(case when school_type='Partially Aided' then teach_tot else 0 end) as PartiallyAided,
        sum(case when school_type='Central Govt' then teach_tot else 0 end) as CentralGovt,district_name,district_id as dist_id,block_name
        FROM students_school_child_count group by block_id group_by block_name";
              $query = $this->db->query($SQL);
                return $query->result();
           
          }
             public function get_schoolwise_class($school_id)
                {
                  $this->db->SELECT('school_name,block_name,district_name,udise_code,school_type,management,cate_type,category,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class1,sum(c2_b+c2_g+c2_t) as class2,sum(c3_b+c3_g+c3_t) as class3,sum(c4_b+c4_g+c4_t) as class4,sum(c5_b+c5_g+c5_t) as class5,sum(c6_b+c6_g+c6_t) as class6,sum(c7_b+c7_g+c7_t) as class7,sum(c8_b+c8_g+c8_t) as class8,sum(c9_b+c9_g+c9_t) as class9,sum(c10_b+c10_g+c10_t) as class10,sum(c11_b+c11_g+c11_t) as class11,sum(c12_b+c12_g+c12_t) as class12') 
               ->FROM('students_school_child_count')
               
               ->WHERE('school_id', $school_id);    
               $result =  $this->db->get()->first_row();
                return $result;
                }
       public function get_districtName($district_id)
      {
        $result = $this->db->get_WHERE('schoolnew_district',array('id'=>$district_id))->first_row();
        // print_r($result);die;
        return $result;
      }

function get_teaching_staff_block($dist_id,$cate_type){
 $this->db->SELECT("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_id as dist_id,district_name");
        $this->db->FROM('teacher_profile_count');
        $this->db->JOIN('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('block_id');
     
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
           $this->db->WHERE('district_id',$dist_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
  function get_nonteaching_staff_block($dist_id,$cate_type){

 $this->db->SELECT("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,block_name,block_id,district_name,district_id");
       $this->db->FROM('teacher_profile_count');
       $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=teacher_profile_count.school_key_id','right');
      $this->db->group_by('block_id'); 

       if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
           $this->db->WHERE('district_id',$dist_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }
    function get_teaching_block_school($block_id,$cate_type){
      
      $this->db->SELECT("sum(case when school_type='Un-aided' then (teach_mle+teach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (teach_mle+teach_fmle)  else 0 end) as fullyaided,
       sum(case when school_type='Government' then (teach_mle+teach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (teach_mle+teach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (teach_mle+teach_fmle) else 0 end) as CentralGovt,block_name,school_name,school_id,school_type,udise_code,block_id,district_id as dist_id,district_name");
        $this->db->FROM('teacher_profile_count');
        $this->db->JOIN('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('school_id');
     
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
           $this->db->WHERE('block_id',$block_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;
  }  
   function get_nonteaching_block_school($block_id,$cate_type){
      
      $this->db->SELECT("sum(case when school_type='Un-aided' then (nonteach_mle+nonteach_fmle) else 0 end) as unaided,
       sum(case when school_type='Fully Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as fullyaided,
       sum(case when school_type='Government' then (nonteach_mle+nonteach_fmle) else 0 end) as government,
       sum(case when school_type='Partially Aided' then (nonteach_mle+nonteach_fmle) else 0 end) as PartiallyAided,
       sum(case when school_type='Central Govt' then (nonteach_mle+nonteach_fmle) else 0 end) as CentralGovt,school_name,block_id,school_id,udise_code,block_name");
        $this->db->FROM('teacher_profile_count');
        $this->db->JOIN('students_school_child_count','students_school_child_count.school_id = teacher_profile_count.school_key_id ','right');
         $this->db->group_by('school_id');
     
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
           $this->db->WHERE('block_id',$block_id);
               $result = $this->db->get()->result();
              // print_r($this->db->last_query());die();
               // print_r($result);die;
              return $result;

  }  

  /*function getFreeSchemeGeneral($WHERE){
    $SQL="SELECT 
    COUNT(CASE WHEN scheme_id=1 THEN 1 ELSE NULL END) AS uniform,
    COUNT(CASE WHEN scheme_id=2 THEN 1 ELSE NULL END) AS footwear,
    COUNT(CASE WHEN scheme_id=4 THEN 1 ELSE NULL END) AS school_bag,
  COUNT(CASE WHEN scheme_id=9 THEN 1 ELSE NULL END) AS txtandnote,
    COUNT(CASE WHEN scheme_id=10 THEN 1 ELSE NULL END) AS cycle,
    COUNT(CASE WHEN scheme_id=11 THEN 1 ELSE NULL END) AS laptop
FROM 
  schoolnew_schemeindent 
    WHERE schoolnew_schemeindent.distribution_date IS NULL AND schoolnew_schemeindent.finalsub=1 
    AND schoolnew_schemeindent.scheme_id IN (1,2,4,9,10,11) AND 
    student_id IN (SELECT id FROM students_child_detail WHERE school_id IN (SELECT school_id FROM students_school_child_count WHERE udise_code IS NOT NULL".$WHERE."));";
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result();
  } */ 

  /**
      * Get Flash News Content
      * VIT-sriram
      * 27/02/2019
      **/

    public function get_flash_news()
    {
      
      $FROM_date = date('Y-m-d',strtotime("-3 days"));
      $to_date = date('Y-m-d');
        $this->db->SELECT('schoolnew_flashnews.*,user_category.user_type')
                     ->FROM('schoolnew_flashnews')
                     ->JOIN('user_category','user_category.id = schoolnew_flashnews.created_type_id')
                      ->WHERE('created_date>=',$FROM_date)
                      ->WHERE('created_date<=',$to_date)
                     ->group_by('created_by,created_date')
                     


                     ->order_by('schoolnew_flashnews.id DESC')
                     ->limit(10);

              $flash_result = $this->db->get()->result();
              // print_r($this->db->last_query());
              // print_r($flash_result);die;
              return $flash_result;

    }


    public function get_flash_news_authority()
    {
       $type = array(6,1,9,10);
          $this->db->WHERE_in('id',$type);
        $result = $this->db->get('user_category')->result();

        return $result;
    }

    public function get_flash_sms_authority()
    {
      $type = array(6,1,9,10,14,17);
          $this->db->WHERE_in('id',$type);
        $result = $this->db->get('user_category')->result();

        return $result;
    }

    public function get_all_district()
    {

        $result = $this->db->get('schoolnew_district')->result();

        return $result;

    }

    public function get_all_block_name($dist_id)
    {   
        $this->db->JOIN('schoolnew_district a','a.id = b.district_id');
        $this->db->WHERE_in('a.district_name',$dist_id);
        $result = $this->db->get('schoolnew_block b')->result();
        return $result;
    }

    public function save_flash_news_data($save_datas)
    {
      
      $this->db->insert_batch('schoolnew_flashnews',$save_datas);
    return $this->db->insert_id();

      
    }
    public function get_classwise_student_disability($district_id,$block_id)
      {
   
    if($district_id!="")
    {
    
      /**Changed the table from students_child_detail to summary */

    $common_id = "block_name";
    $where = "where students_school_child_count.district_id = ".$district_id." group by block_id";
    }
    else if($block_id != "")
    {
      /**Changed the table from students_child_detail to summary */

     $common_id = "school_name";
    $where = "where students_school_child_count.block_id = ".$block_id." group by block_id";
    }
    else
    {
      
      /**Changed the table from students_child_detail to summary */

     $common_id = "district_name";
     $where = "group by district_id";
    }

      /*$SQL="SELECT 
    SUM(CASE WHEN differently_abled=1 THEN 1 ELSE 0 END) AS VIB,
    SUM(CASE WHEN differently_abled=2 THEN 1 ELSE 0 END) AS VILV,
    SUM(CASE WHEN differently_abled=3 THEN 1 ELSE 0 END) AS HI,
    SUM(CASE WHEN differently_abled=4 THEN 1 ELSE 0 END) AS SI,
    SUM(CASE WHEN differently_abled=5 THEN 1 ELSE 0 END) AS LI,
    SUM(CASE WHEN differently_abled=6 THEN 1 ELSE 0 END) AS MR,
    SUM(CASE WHEN differently_abled=7 THEN 1 ELSE 0 END) AS LD,
    SUM(CASE WHEN differently_abled=8 THEN 1 ELSE 0 END) AS CP,
    SUM(CASE WHEN differently_abled=9 THEN 1 ELSE 0 END) AS Aut,
    SUM(CASE WHEN differently_abled=10 THEN 1 ELSE 0 END) AS MD,
    SUM(CASE WHEN differently_abled=11 THEN 1 ELSE 0 END) AS Mus_dyp,
    SUM(CASE WHEN differently_abled=12 THEN 1 ELSE 0 END) AS DS,
    SUM(CASE WHEN differently_abled=13 THEN 1 ELSE 0 END) AS LC,
    SUM(CASE WHEN differently_abled=14 THEN 1 ELSE 0 END) AS Dwar,
    SUM(CASE WHEN differently_abled=15 THEN 1 ELSE 0 END) AS ID,
    SUM(CASE WHEN differently_abled=16 THEN 1 ELSE 0 END) AS CNC,
    SUM(CASE WHEN differently_abled=17 THEN 1 ELSE 0 END) AS MS,
    SUM(CASE WHEN differently_abled=18 THEN 1 ELSE 0 END) AS Tha,
    SUM(CASE WHEN differently_abled=19 THEN 1 ELSE 0 END) AS Hemo,
    SUM(CASE WHEN differently_abled=20 THEN 1 ELSE 0 END) AS SCD,
    SUM(CASE WHEN differently_abled=21 THEN 1 ELSE 0 END) AS AAV,
    SUM(CASE WHEN differently_abled=22 THEN 1 ELSE 0 END) AS PD,
    students_school_child_count.$common_id FROM students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id $where";*/

$SQL="SELECT $common_id, VIB,VILV,HI,SI,LI,MR,LD,CP,Aut,MD,Mus_dyp,DS,LC,Dwar,IntDis as ID,CNC,MS,Tha,Hemo,SCD,AAV,PD
FROM students_ied_count
JOIN students_school_child_count ON students_school_child_count.school_id=students_ied_count.school_id $where";
  $query = $this->db->query($SQL);
   return $query->result();
       
      }
      public function get_classwise_student_disability_block($dist_id)
      {

        $SQL="SELECT 
    SUM(CASE WHEN differently_abled=1 THEN 1 ELSE 0 END) AS VIB,
    SUM(CASE WHEN differently_abled=2 THEN 1 ELSE 0 END) AS VILV,
    SUM(CASE WHEN differently_abled=3 THEN 1 ELSE 0 END) AS HI,
    SUM(CASE WHEN differently_abled=4 THEN 1 ELSE 0 END) AS SI,
    SUM(CASE WHEN differently_abled=5 THEN 1 ELSE 0 END) AS LI,
    SUM(CASE WHEN differently_abled=6 THEN 1 ELSE 0 END) AS MR,
    SUM(CASE WHEN differently_abled=7 THEN 1 ELSE 0 END) AS LD,
    SUM(CASE WHEN differently_abled=8 THEN 1 ELSE 0 END) AS CP,
    SUM(CASE WHEN differently_abled=9 THEN 1 ELSE 0 END) AS Aut,
    SUM(CASE WHEN differently_abled=10 THEN 1 ELSE 0 END) AS MD,
    SUM(CASE WHEN differently_abled=11 THEN 1 ELSE 0 END) AS Mus_dyp,
    SUM(CASE WHEN differently_abled=12 THEN 1 ELSE 0 END) AS DS,
    SUM(CASE WHEN differently_abled=13 THEN 1 ELSE 0 END) AS LC,
    SUM(CASE WHEN differently_abled=14 THEN 1 ELSE 0 END) AS Dwar,
    SUM(CASE WHEN differently_abled=15 THEN 1 ELSE 0 END) AS ID,
    SUM(CASE WHEN differently_abled=16 THEN 1 ELSE 0 END) AS CNC,
    SUM(CASE WHEN differently_abled=17 THEN 1 ELSE 0 END) AS MS,
    SUM(CASE WHEN differently_abled=18 THEN 1 ELSE 0 END) AS Tha,
    SUM(CASE WHEN differently_abled=19 THEN 1 ELSE 0 END) AS Hemo,
    SUM(CASE WHEN differently_abled=20 THEN 1 ELSE 0 END) AS SCD,
    SUM(CASE WHEN differently_abled=21 THEN 1 ELSE 0 END) AS AAV,
    SUM(CASE WHEN differently_abled=22 THEN 1 ELSE 0 END) AS PD,
    students_school_child_count.block_name
FROM students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
WHERE students_child_detail.transfer_flag=0 AND students_school_child_count.district_name='".$dist_id."' group by block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_classwise_student_disability_school($block_name)
      {

        $SQL="SELECT 
    SUM(CASE WHEN differently_abled=1 THEN 1 ELSE 0 END) AS VIB,
    SUM(CASE WHEN differently_abled=2 THEN 1 ELSE 0 END) AS VILV,
    SUM(CASE WHEN differently_abled=3 THEN 1 ELSE 0 END) AS HI,
    SUM(CASE WHEN differently_abled=4 THEN 1 ELSE 0 END) AS SI,
    SUM(CASE WHEN differently_abled=5 THEN 1 ELSE 0 END) AS LI,
    SUM(CASE WHEN differently_abled=6 THEN 1 ELSE 0 END) AS MR,
    SUM(CASE WHEN differently_abled=7 THEN 1 ELSE 0 END) AS LD,
    SUM(CASE WHEN differently_abled=8 THEN 1 ELSE 0 END) AS CP,
    SUM(CASE WHEN differently_abled=9 THEN 1 ELSE 0 END) AS Aut,
    SUM(CASE WHEN differently_abled=10 THEN 1 ELSE 0 END) AS MD,
    SUM(CASE WHEN differently_abled=11 THEN 1 ELSE 0 END) AS Mus_dyp,
    SUM(CASE WHEN differently_abled=12 THEN 1 ELSE 0 END) AS DS,
    SUM(CASE WHEN differently_abled=13 THEN 1 ELSE 0 END) AS LC,
    SUM(CASE WHEN differently_abled=14 THEN 1 ELSE 0 END) AS Dwar,
    SUM(CASE WHEN differently_abled=15 THEN 1 ELSE 0 END) AS ID,
    SUM(CASE WHEN differently_abled=16 THEN 1 ELSE 0 END) AS CNC,
    SUM(CASE WHEN differently_abled=17 THEN 1 ELSE 0 END) AS MS,
    SUM(CASE WHEN differently_abled=18 THEN 1 ELSE 0 END) AS Tha,
    SUM(CASE WHEN differently_abled=19 THEN 1 ELSE 0 END) AS Hemo,
    SUM(CASE WHEN differently_abled=20 THEN 1 ELSE 0 END) AS SCD,
    SUM(CASE WHEN differently_abled=21 THEN 1 ELSE 0 END) AS AAV,
    SUM(CASE WHEN differently_abled=22 THEN 1 ELSE 0 END) AS PD,
    students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.school_type
FROM students_child_detail
JOIN baseapp_differently_abled ON baseapp_differently_abled.id=students_child_detail.differently_abled
JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
WHERE students_child_detail.transfer_flag=0 AND students_school_child_count.block_name='".$block_name."' group by school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function get_classwise_RTE_student($district_id,$block_id)
      {
    if($district_id !="")
    {

     /*Changed the table from students_child_detail to summary by wesley */
     
    /* $SQL=" select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,sc.udise_code,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id='".$district_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; */

        $SQL=" select sc.block_name,sc.block_id,sc.school_id,sc.school_name,sc.udise_code,st.prkg,st.lkg,st.ukg,sc.udise_code,st.class1,st.class2,st.class3,st.class4,st.class5,st.class6,st.class7,st.class8,st.class9,st.class10,st.class11,st.class12 from students_rte_count st 
        left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id='".$district_id."' and sc.school_type_id in (2,3,4) group by sc.school_id;"; 

    }
    else if($block_id !="")
    {

      /*Changed the table from students_child_detail to summary by wesley*/

      /*$SQL=" select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,sc.udise_code,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
 left join students_school_child_count sc on sc.school_id=st.school_id where sc.block_id='".$block_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;";*/ 

      $SQL=" select sc.block_name,sc.block_id,sc.school_id,sc.school_name,sc.udise_code,st.prkg,st.lkg,st.ukg,sc.udise_code,st.class1,st.class2,st.class3,st.class4,st.class5,st.class6,st.class7,st.class8,st.class9,st.class10,st.class11,st.class12 from students_rte_count st 
      left join students_school_child_count sc on sc.school_id=st.school_id where sc.block_id='".$block_id."' and sc.school_type_id in (2,3,4) group by sc.school_id;"; 

    }
    else
    {

      /*Changed the table from students_child_detail to summary by wesley*/

       /*$SQL="SELECT sc.district_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as C1,SUM(class_studying_id=2) as C2, SUM(class_studying_id=3) as C3,SUM(class_studying_id=4) as C4, SUM(class_studying_id=5) as C5,SUM(class_studying_id=6) as C6,SUM(class_studying_id=7) as C7,SUM(class_studying_id=8) as C8, SUM(class_studying_id=9) as C9,SUM(class_studying_id=10) as C10, SUM(class_studying_id=11) as C11,SUM(class_studying_id=12) as C12 FROM students_child_detail st 
          JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.district_name";*/ 

      $SQL=" select sc.district_name,sc.district_id,st.prkg,st.lkg,st.ukg,st.class1,st.class2,st.class3,st.class4,st.class5,st.class6,st.class7,st.class8,st.class9,st.class10,st.class11,st.class12 from students_rte_count st 
      left join students_school_child_count sc on sc.school_id=st.school_id where sc.school_type_id in (2,3,4) group by sc.district_id;"; 
    }

       //print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
      

    



  public function get_blockwise_RTE_student($dist_id)
      {

        $SQL=" SELECT sc.block_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 FROM students_child_detail st 
JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE sc.district_id='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
    
       return $query->result();
       

      }
       public function get_schoolwise_RTE_student($dist_id)
      {

        $SQL=" SELECT sc.block_name,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 FROM students_child_detail st 
left JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE sc.district_name='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) group by sc.school_name;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
      }
       public function get_classwise_RTE_student_2019($district_id,$block_id)
      {
     if($district_id !="")
    {
     
     $SQL="select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.district_id='".$district_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.school_name;"; 

    }
    else if($block_id !="")
    {
     $SQL="select sc.block_name,sc.school_id,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 from students_child_detail st 
left join students_school_child_count sc on sc.school_id=st.school_id where sc.block_id='".$block_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.school_name;"; 

    }
    else
    {
     $SQL="SELECT sc.district_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as C1,SUM(class_studying_id=2) as C2, SUM(class_studying_id=3) as C3,SUM(class_studying_id=4) as C4, SUM(class_studying_id=5) as C5,SUM(class_studying_id=6) as C6,SUM(class_studying_id=7) as C7,SUM(class_studying_id=8) as C8, SUM(class_studying_id=9) as C9,SUM(class_studying_id=10) as C10, SUM(class_studying_id=11) as C11,SUM(class_studying_id=12) as C12 FROM students_child_detail st 
       left JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.district_name"; 

     }
       //print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_blockwise_RTE_student_2019($dist_id)
      {

        $SQL=" SELECT sc.block_name,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 FROM students_child_detail st 
left JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE sc.district_name='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function get_schoolwise_RTE_student_2019($dist_id,$block)
      {
        if($dist_id!="")
        {
         $SQL=" SELECT sc.block_name,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 FROM students_child_detail st 
left JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE sc.district_id='".$dist_id."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.school_name;"; 
        }
        else if($block!="")
        {
           $SQL=" SELECT sc.block_name,sc.school_name,sc.udise_code,sc.school_type,SUM(class_studying_id=15) as pre_kg,SUM(class_studying_id=13) as lkg,SUM(class_studying_id=14) as ukg,SUM(class_studying_id=1) as c1,SUM(class_studying_id=2) as c2, SUM(class_studying_id=3) as c3,SUM(class_studying_id=4) as c4, SUM(class_studying_id=5) as c5,SUM(class_studying_id=6) as c6,SUM(class_studying_id=7) as c7,SUM(class_studying_id=8) as c8, SUM(class_studying_id=9) as c9,SUM(class_studying_id=10) as c10, SUM(class_studying_id=11) as c11,SUM(class_studying_id=12) as c12 FROM students_child_detail st 
left JOIN students_school_child_count sc on sc.school_id=st.school_id WHERE sc.block_id='".$block."' and st.transfer_flag=0 and st.child_admitted_under_reservation='yes' and sc.school_type_id in (2,3,4) and created_at between '2019-05-25 00:00:00' and NOW() group by sc.school_name;"; 
        }

       
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
      }
    
    
    public function getallstateclass2018($where){
        $sql="SELECT students_school_child_count.district_id,students_school_child_count.block_id,students_school_child_count.district_name,school_type,students_school_child_count.block_name,district_name,management,cate_type,students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.teach_tot,students_school_child_count.school_name,sum(class1) as class_1, sum(class2) as class_2, sum(class3) as class_3,sum(class4) as class_4, sum(class5) as class_5, sum(class6) as class_6, sum(class7) as class_7, sum(class8) as class_8,sum(class9) as class_9, sum(class10) as class_10, sum(class11) as class_11, sum(class12) as class_12,sum(prekg) as Prkg, sum(lkg) as LKG, sum(ukg)as UKG, sum(students_enrolled_2018_19.total) as total FROM students_enrolled_2018_19 JOIN students_school_child_count ON students_school_child_count.school_id=students_enrolled_2018_19.school_key_id WHERE ".$where." GROUP BY district_id;";
    echo $sql; die();
    $query=$this->db->query($sql);
        return $query->result();
    }
    
  public function get_emis_blockwise_district_2018($dist_id,$school_type,$cate_type){
               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(class1) as class_1,sum(class2) as class_2,sum(class3) as class_3,sum(class4) as class_4,sum(class5) as class_5,sum(class6) as class_6,sum(class7) as class_7,sum(class8) as class_8,sum(class9) as class_9,sum(class10) as class_10,sum(class11) as class_11,sum(class12) as class_12,sum(prekg) as Prkg,sum(lkg) as LKG,sum(ukg)as UKG,sum(students_enrolled_2018_19.total) as total')
                              ->FROM('students_enrolled_2018_19')
                              ->JOIN('students_school_child_count','students_school_child_count.school_id=students_enrolled_2018_19.school_key_id')
                              ->WHERE('students_school_child_count.district_name',$dist_id);
            if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
                  $this->db->group_by('block_name');
                  // return $result;
                  $result = $this->db->get()->result();
                //  print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;
            }
             public function get_blockwise_school_2018($block_name,$school_type,$cate_type)
        {

          $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(class1) as class_1,sum(class2) as class_2,sum(class3) as class_3,sum(class4) as class_4,sum(class5) as class_5,sum(class6) as class_6,sum(class7) as class_7,sum(class8) as class_8,sum(class9) as class_9,sum(class10) as class_10,sum(class11) as class_11,sum(class12) as class_12,sum(prekg) as Prkg,sum(lkg) as LKG,sum(ukg)as UKG,sum(students_enrolled_2018_19.total) as total')
            ->FROM('students_enrolled_2018_19')
              ->JOIN('students_school_child_count','students_school_child_count.school_id=students_enrolled_2018_19.school_key_id')
                  ->WHERE('students_school_child_count.block_id',$block_name);
          

                if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
           

            $this->db->WHERE_in('school_type',$school_type);
          }else

          {

            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))
          {
             $this->db->WHERE_in('cate_type',$cate_type);

          }
          $this->db->group_by('school_id'); 

           $result = $this->db->get()->result();
                     
          return $result; 

        }
         

     public function get_classwise_RTE_allocation()
      {

        $SQL="SELECT count(a.school_id) as tot,district_name,IFNULL(sum(b.rte_seats),0) as rte_seats,IFNULL(sum(b.school_list),0) as school_count,c.school_type,c.low_class  FROM students_school_child_count a
left JOIN (SELECT section_nos,rte_seats,count(distinct(school_key_id)) as school_list,school_key_id FROM schoolnew_rte group by school_key_id) as b on b.school_key_id = a.school_id 
JOIN schoolnew_academic_detail c on c.school_key_id =a.school_id
WHERE c.rte=1
group by district_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
      public function staff_fixa_report()
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
    SUM(elig_sg) AS eligible,
    SUM(sanc_sg) AS sanctioned,
    SUM(avail_sg) AS available,
    SUM(need_sg) AS need,
    SUM(surp_w_sg) SWS,
    SUM(surp_wo_sg) AS SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(elig_phm) AS elig_phm,
    SUM(sanc_phm) AS sanc_phm,
    SUM(avail_phm) AS avail_phm,
    SUM(surp_w_phm) AS surp_w_phm,
    SUM(surp_wo_phm) AS surp_wo_phm,
    SUM(need_hhm) AS need_phm,
    SUM(elig_mhm) AS elig_mhm,
    SUM(sanc_mhm) AS sanc_mhm,
    SUM(avail_mhm) AS avail_mhm,
    SUM(surp_w_mhm) AS surp_w_mhm,
    SUM(surp_wo_mhm) AS surp_wo_mhm,
    SUM(need_mhm) AS need_mhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE  students_school_child_count.sch_directorate_id IN (2,3,16,18,27,29,32,34,42) AND school_type_id=1
GROUP BY district_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
      public function staff_fixa_report_block($district_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
    SUM(elig_sg) AS eligible,
    SUM(sanc_sg) AS sanctioned,
    SUM(avail_sg) AS available,
    SUM(need_sg) AS need,
    SUM(surp_w_sg) SWS,
    SUM(surp_wo_sg) AS SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(elig_phm) AS elig_phm,
    SUM(sanc_phm) AS sanc_phm,
    SUM(avail_phm) AS avail_phm,
    SUM(surp_w_phm) AS surp_w_phm,
    SUM(surp_wo_phm) AS surp_wo_phm,
    SUM(need_hhm) AS need_phm,
    SUM(elig_mhm) AS elig_mhm,
    SUM(sanc_mhm) AS sanc_mhm,
    SUM(avail_mhm) AS avail_mhm,
    SUM(surp_w_mhm) AS surp_w_mhm,
    SUM(surp_wo_mhm) AS surp_wo_mhm,
    SUM(need_mhm) AS need_mhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE  students_school_child_count.district_id=".$district_id." AND students_school_child_count.sch_directorate_id IN (2,3,16,18,27,29,32,34,42) AND school_type_id=1
GROUP BY block_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_fixa_report_school($block_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
   SUM(elig_sg) AS eligible,
    SUM(sanc_sg) AS sanctioned,
    SUM(avail_sg) AS available,
    SUM(need_sg) AS need,
    SUM(surp_w_sg) SWS,
    SUM(surp_wo_sg) AS SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(elig_phm) AS elig_phm,
    SUM(sanc_phm) AS sanc_phm,
    SUM(avail_phm) AS avail_phm,
    SUM(surp_w_phm) AS surp_w_phm,
    SUM(surp_wo_phm) AS surp_wo_phm,
    SUM(need_hhm) AS need_phm,
    SUM(elig_mhm) AS elig_mhm,
    SUM(sanc_mhm) AS sanc_mhm,
    SUM(avail_mhm) AS avail_mhm,
    SUM(surp_w_mhm) AS surp_w_mhm,
    SUM(surp_wo_mhm) AS surp_wo_mhm,
    SUM(need_mhm) AS need_mhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE  students_school_child_count.block_id=".$block_id." AND students_school_child_count.sch_directorate_id IN (2,3,16,18,27,29,32,34,42) AND school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }

      public function staff_fixa_report_PG()
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,

    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
    SUM(surp_wo_sg) AS SWO,
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.sch_directorate_id IN (1,5,15,17,19,20,21,22,23,24,26,31,33) AND school_type_id=1
GROUP BY district_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function staff_fixa_report_PG_block($district_id)
      {
//print_r($district_id);
        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
  
    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
   
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY block_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_fixa_report_PG_school($block_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,

    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_SWS,
    SUM(surp_wo_sg) AS sg_SWO,
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_SWS,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_SWO,
    SUM(elig_hhm) AS elig_hhm,
    SUM(sanc_hhm) AS sanc_hhm,
    SUM(avail_hhm) AS avail_hhm,
    SUM(surp_w_hhm) AS surp_w_hhm,
    SUM(surp_wo_hhm) AS surp_wo_hhm,
    SUM(need_hhm) AS need_hhm,
    SUM(vac_tam + vac_eng + vac_mat + vac_sci + vac_soc) AS bt_vac,
 
    SUM(vac_sg) AS vac_sg,
    SUM(vac_mhm) AS vac_mhm,
    SUM(vac_phm) AS vac_phm,
    SUM(vac_hhm) AS vac_hhm
FROM
    students_school_child_count

LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND students_school_child_count.block_id=".$block_id." and students_school_child_count.school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }

       public function staff_fixa_report_PG1()
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg
  
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id
WHERE students_school_child_count.sch_directorate_id IN (1,5,15,17,19,20,21,22,23,24,26,31,33) AND school_type_id=1
GROUP BY district_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function staff_fixa_report_PG_block1($district_id)
      {
//print_r($district_id);
        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.district_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
    SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg
   
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id

WHERE students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND students_school_child_count.district_id=".$district_id." and students_school_child_count.school_type_id=1
GROUP BY block_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_fixa_report_PG_school1($block_id)
      {

        $SQL="SELECT 
    students_school_child_count.district_id,
    students_school_child_count.school_name,
    students_school_child_count.block_id,
    students_school_child_count.block_name,
    students_school_child_count.school_id,
   SUM(elig_high_tot) AS eligible,
    SUM(sanc_high_tot) AS sanctioned,
    SUM(avail_high_tot) AS available,
    SUM(need_high_tot) AS need,
    SUM(swp_high_tot) SWS,
    SUM(swop_high_tot) AS SWO,
    SUM(vac_high_tot) AS vac_high_tot_pg
FROM
    students_school_child_count
LEFT JOIN teacher_panel4 ON teacher_panel4.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel4.district_id

WHERE students_school_child_count.sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) AND students_school_child_count.block_id=".$block_id." and students_school_child_count.school_type_id=1
GROUP BY school_id";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       
/* public function get_blockwise_RTE_allocation($dist_id)
      {

        $SQL="SELECT count(a.school_id) as tot,block_name,IFNULL(sum(b.school_list),0) as school_count  FROM students_school_child_count a
left JOIN (SELECT count(distinct(school_key_id)) as school_list,school_key_id FROM schoolnew_rte group by school_key_id) as b on b.school_key_id = a.school_id 
JOIN schoolnew_academic_detail c on c.school_key_id =a.school_id
WHERE a.district_name='".$dist_id."' AND  a.school_type_id in (2,3,4) AND a.sch_directorate_id in (16,18,27,29,28) AND c.minority_sch=0
group by block_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }*/

 public function get_schoolwise_RTE_allocation($dist_id)
      {

 $SQL="SELECT count(a.school_id) as tot,school_name,school_id,udise_code,edu_dist_name,block_name,b.section_nos,b.rte_seats,IFNULL(sum(b.school_list),0) as school_count,c.school_type,c.low_class  FROM students_school_child_count a
   left JOIN (SELECT section_nos,rte_seats,count(distinct(school_key_id)) as school_list,school_key_id FROM schoolnew_rte group by school_key_id) as b on b.school_key_id = a.school_id 
JOIN schoolnew_academic_detail c on c.school_key_id =a.school_id
WHERE a.district_name='".$dist_id."' AND  c.rte=1
group by school_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result(); 
     }

public function get_dist_student_migration()
{
  $SQL="SELECT sc.district_name,sc.block_id,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type as School_Type,sc.management as Management,sc.cate_type as Category,
sum(sc.school_type_id=1  and tr.school_id_admit is null) as government,
sum(sc.school_type_id=2  and tr.school_id_admit is null) as fullyaided,
sum(sc.school_type_id=3  and tr.school_id_admit is null) as unaided,
sum(sc.school_type_id=4  and tr.school_id_admit is null) as PartiallyAided,
sum(sc.school_type_id=5  and tr.school_id_admit is null) as CentralGovt FROM students_school_child_count sc left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.transfer_reason in (1,2,3,4) and  tr.school_id_admit is null and tr.class_studying_id!=12  group by sc.district_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_blk_student_migration($dist_id)
{
  $SQL="SELECT sc.district_name,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type as School_Type,sc.management as Management,sc.cate_type as Category,
sum(sc.school_type_id=1  and tr.school_id_admit is null) as government,
sum(sc.school_type_id=2  and tr.school_id_admit is null) as fullyaided,
sum(sc.school_type_id=3  and tr.school_id_admit is null) as unaided,
sum(sc.school_type_id=4  and tr.school_id_admit is null) as PartiallyAided,
sum(sc.school_type_id=5  and tr.school_id_admit is null) as CentralGovt FROM students_school_child_count sc left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.transfer_reason in (1,2,3,4) and tr.school_id_admit is null and tr.class_studying_id!=12 and sc.district_id='".$dist_id."'  group by sc.block_name";
         $query = $this->db->query($SQL);
        //  print_r($this->db->last_query());die();
       return $query->result(); 
}
public function get_school_student_migration($block_name)
{
  $SQL="SELECT sc.district_name,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type as School_Type,sc.management as Management,sc.cate_type as Category,
sum(sc.school_type_id=1  and tr.school_id_admit is null) as government,
sum(sc.school_type_id=2  and tr.school_id_admit is null) as fullyaided,
sum(sc.school_type_id=3  and tr.school_id_admit is null) as unaided,
sum(sc.school_type_id=4  and tr.school_id_admit is null) as PartiallyAided,
sum(sc.school_type_id=5  and tr.school_id_admit is null) as CentralGovt FROM students_school_child_count sc
left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.transfer_reason in (1,2,3,4) and  tr.school_id_admit is null and tr.class_studying_id!=12 and sc.block_name='".$block_name."'  group by sc.school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_dist_student_migration_remarks()
{
  $SQL="SELECT district_name,district_id,sum(students_pool_child_count.total_b+students_pool_child_count.total_g) as tot_std,(select count(remarks='') from students_transfer_history where students_transfer_history.school_id_transfer=students_pool_child_count.school_id) as  not_marked_remarks FROM tnschools_working.students_pool_child_count
 JOIN students_school_child_count  on students_school_child_count.school_id= students_pool_child_count.school_id
 GROUP BY district_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_blk_student_migration_remarks($dist_id)
{
  $SQL="SELECT district_name,district_id,block_name,sum(students_pool_child_count.total_b+students_pool_child_count.total_g) as tot_std,(select count(remarks='') from students_transfer_history where students_transfer_history.school_id_transfer=students_pool_child_count.school_id) as  not_marked_remarks FROM tnschools_working.students_pool_child_count
 JOIN students_school_child_count  on students_school_child_count.school_id= students_pool_child_count.school_id
 where students_school_child_count.district_name='".$dist_id."' 
 GROUP BY block_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_student_migration_remarks($block_name)
{
    $SQL="SELECT students_school_child_count.school_name,district_name,district_id,block_name,sum(students_pool_child_count.total_b+students_pool_child_count.total_g) as tot_std,(select count(remarks='') from students_transfer_history where students_transfer_history.school_id_transfer=students_pool_child_count.school_id) as  not_marked_remarks FROM tnschools_working.students_pool_child_count
 JOIN students_school_child_count  on students_school_child_count.school_id= students_pool_child_count.school_id
 where students_school_child_count.block_name='".$block_name."' 
 GROUP BY school_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_dist_student_migration_reason()
{
  $SQL="SELECT sc.district_name,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type ,sc.management as Management,sc.cate_type as Category,sum(tr.transfer_reason=1) as Long_Absent,sum(tr.transfer_reason=2) as Transfered_by_Parents,sum(tr.transfer_reason=3) as Terminal_Class,sum(tr.transfer_reason=4) as Dropped_Out,sum(tr.transfer_reason=5) as Student_Expired,sum(tr.transfer_reason=6) as Duplicate_Entry,sum(tr.transfer_reason is null) as No_Reason FROM students_school_child_count sc left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.school_id_admit is null and tr.class_studying_id!=12 group by sc.district_name";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_blk_student_migration_reason($dist_id)
{
  $SQL="SELECT sc.district_name,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type ,sc.management as Management,sc.cate_type as Category,sum(tr.transfer_reason=1) as Long_Absent,sum(tr.transfer_reason=2) as Transfered_by_Parents,sum(tr.transfer_reason=3) as Terminal_Class,sum(tr.transfer_reason=4) as Dropped_Out,sum(tr.transfer_reason=5) as Student_Expired,sum(tr.transfer_reason=6) as Duplicate_Entry,sum(tr.transfer_reason is null) as No_Reason FROM students_school_child_count sc left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.school_id_admit is null and tr.class_studying_id!=12 and sc.district_id='".$dist_id."' group by sc.block_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_student_migration_reason($block_name)
{
  $SQL="SELECT sc.district_name,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type ,sc.management as Management,sc.cate_type as Category,sum(tr.transfer_reason=1) as Long_Absent,sum(tr.transfer_reason=2) as Transfered_by_Parents,sum(tr.transfer_reason=3) as Terminal_Class,sum(tr.transfer_reason=4) as Dropped_Out,sum(tr.transfer_reason=5) as Student_Expired,sum(tr.transfer_reason=6) as Duplicate_Entry,sum(tr.transfer_reason is null) as No_Reason FROM students_school_child_count sc left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id WHERE tr.school_id_admit is null and tr.class_studying_id!=12 and sc.block_name='".$block_name."' group by sc.school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_dist_student_migration_details()
{
  $SQL="SELECT 
              t1.udise_code as udise1,t1.school_name as schname1,t1.school_type_id as t1,t1.school_type as sty1,
              t2.udise_code as udise2,t2.school_name as schname2,t2.school_type_id as t2,t2.school_type as sty2,
              t2.district_id,t2.edu_dist_id,t2.block_id,t2.district_name,t2.edu_dist_name,t2.block_name,SUM(CASE WHEN t1.school_type_id=1 AND t2.school_type_id=2 THEN 1 ELSE 0 END) AS gtofa,
              SUM(CASE WHEN t1.school_type_id=1 AND t2.school_type_id=3 THEN 1 ELSE 0 END) AS gtoua,
              SUM(CASE WHEN t1.school_type_id=1 AND t2.school_type_id=4 THEN 1 ELSE 0 END) AS gtopa,
              SUM(CASE WHEN t1.school_type_id=1 AND t2.school_type_id=5 THEN 1 ELSE 0 END) AS gtocg,
              SUM(CASE WHEN t1.school_type_id=2 AND t2.school_type_id=1 THEN 1 ELSE 0 END) AS fatog,
              SUM(CASE WHEN t1.school_type_id=3 AND t2.school_type_id=1 THEN 1 ELSE 0 END) AS uatog,
              SUM(CASE WHEN t1.school_type_id=4 AND t2.school_type_id=1 THEN 1 ELSE 0 END) AS patog, 
              SUM(CASE WHEN t1.school_type_id=5 AND t2.school_type_id=1 THEN 1 ELSE 0 END) AS cgtog
         FROM students_transfer_history
         JOIN students_school_child_count as t1 ON t1.school_id=school_id_transfer
         JOIN students_school_child_count as t2 ON t2.school_id=school_id_admit
        WHERE school_id_transfer IS NOT NULL AND school_id_admit IS NOT NULL 
     GROUP BY t2.district_id;";

  $old_SQL="SELECT *, 
   SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=4 THEN 1 ELSE 0 END) AS gtopa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtocg,
   
   SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
   SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
   SUM(CASE WHEN T1.t1=4 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog, 
   SUM(CASE WHEN T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS cgtog
FROM (
SELECT 
sch1.udise_code as udise1,sch1.school_name as schname1,
sch1.school_type_id as t1,sch1.school_type as sty1,
   sch2.udise_code as udise2,sch2.school_name as schname2,
   sch2.school_type_id as t2,sch2.school_type as sty2,
   sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.district_name,sch2.edu_dist_name,sch2.block_name
FROM students_transfer_history
JOIN students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit
WHERE sch1.udise_code IS NOT NULL AND sch2.udise_code IS NOT NULL) as T1
GROUP BY district_id;";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_migration_detail_student($dist_id,$school_type_FROM,$school_type_to)
{
  // $new_SQL="SELECT 
  //           sch1.udise_code as udise1,sch1.school_name as schname1,
  //           sch1.school_type_id as t1,sch1.school_type as sty1,
  //           sch2.udise_code as udise2,sch2.school_name as schname2,
  //           sch2.school_type_id as t2,sch2.school_type as sty2,
  //           students_transfer_history.unique_id_no,
  //           sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.school_id,
  //           students_child_detail.name as s_name,
  //           students_child_detail.unique_id_no as EMIS_ID, sch2.district_name,sch2.block_name,
  //           SUM(CASE WHEN sch1.school_type_id=1 AND sch2.school_type_id=2 THEN 1 ELSE 0 END) AS gtofa,
  //           SUM(CASE WHEN sch1.school_type_id=1 AND sch2.school_type_id=3 THEN 1 ELSE 0 END) AS gtoua,
  //           SUM(CASE WHEN sch1.school_type_id=1 AND sch2.school_type_id=4 AND sch2.school_type_id=5 THEN 1 ELSE 0 END) AS gtopg,
  //           SUM(CASE WHEN sch1.school_type_id=2 AND sch2.school_type_id=1 THEN 1 ELSE 0 END) AS fatog,
  //           SUM(CASE WHEN sch1.school_type_id=3 AND sch2.school_type_id=1 THEN 1 ELSE 0 END) AS uatog,
  //           SUM(CASE WHEN sch1.school_type_id=4 AND sch2.school_type_id=5 AND sch2.school_type_id=1 THEN 1 ELSE 0 END) AS patog
  //     FROM students_transfer_history
  //     JOIN students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
  //     JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no
  //     JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit
  //    WHERE school_id_transfer IS NOT NULL AND school_id_admit IS NOT NULL AND sch1.school_type='".$school_type_FROM."' AND sch2.school_type='".$school_type_to."'
  // GROUP BY students_transfer_history.unique_id_no";
 
  $SQL="SELECT *, 
   SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
   SUM(CASE WHEN T1.t1=1 AND T1.t2=4 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtopa,
  
   
   SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
   SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
   SUM(CASE WHEN T1.t1=4 AND T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog
 
FROM (
SELECT 
sch1.udise_code as udise1,sch1.school_name as schname1,
sch1.school_type_id as t1,sch1.school_type as sty1,
   sch2.udise_code as udise2,sch2.school_name as schname2,
   sch2.school_type_id as t2,sch2.school_type as sty2,
   students_transfer_history.unique_id_no,sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.school_id,students_child_detail.name as s_name,students_child_detail.unique_id_no as EMIS_ID, sch2.district_name,sch2.block_name
FROM students_transfer_history
JOIN students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no
JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit
WHERE   sch1.school_type='".$school_type_FROM."' AND sch2.school_type='".$school_type_to."' ) as T1
GROUP BY unique_id_no";

         $query = $this->db->query($SQL);
       return $query->result(); 
}

public function get_school_unrecognized_list()
{
  $SQL="SELECT district_name,count(*) as tot
FROM schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
WHERE curr_stat=1 AND  schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by District_id";
         $query = $this->db->query($SQL);
          return $query->result(); 
}


public function get_school_unrecognized_lists($district_id,$block_id)
{
if($district_id!="")
{
$SQL="select *,count(*) as tot
from schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
where curr_stat=1 AND  schoolnew_district.id='".district_id."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";

}
else if($block_id!="")
{
$SQL="select *,count(*) as tot
from schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
where curr_stat=1 AND  schoolnew_block.id='".$block_id."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";

}
else
{
   $SQL="SELECT *,count(*) as tot
FROM schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
WHERE curr_stat=1 AND  schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by District_id";
      
}

    $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_unrecognized_block($district_name)
{

  $SQL="SELECT *,count(*) as tot
FROM schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
WHERE curr_stat=1 AND   schoolnew_district.district_name='".$district_name."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function get_school_unrecognized_school($block_name)
{
  $SQL="SELECT *,count(*) as tot
FROM schoolnew_basicinfo 
JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
WHERE curr_stat=1 AND  schoolnew_block.block_name='".$block_name."' AND schoolnew_basicinfo.manage_cate_id=3 AND schoolnew_basicinfo.sch_management_id=35 AND schoolnew_basicinfo.sch_directorate_id=47 group by school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}

 public function get_school_profile_verification_district_wise($district_id,$block_id,$school_type,$cate_type)
{
   if($district_id!="")
   {
   
    $where ="students_school_child_count.district_id=$district_id";
  $group_by = "students_school_child_count.school_name";
   }
   else if($block_id!="")
   {
    $where ="students_school_child_count.block_id=$block_id";
  $group_by = "students_school_child_count.school_name";
   }
   else 
   {
  
   
   $group_by = "students_school_child_count.district_id";
   
   }
  

 $this->db->SELECT('*,schoolnew_academic_detail.school_type as sch_typ,count(*) as std_count');
 $this->db->FROM('schoolnew_academic_detail');
 $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_academic_detail.school_key_id');
 $this->db->JOIN('schoolnew_training_detail','schoolnew_training_detail.school_key_id=schoolnew_academic_detail.school_key_id');

 if($district_id!="" || $block_id!="")
 {
    $this->db->WHERE($where); 
 }
 $this->db->group_by($group_by); 

 if(!empty($school_type))
          {
             
            $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
           
          }
          else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.district_name'); 
          $query = $this->db->get();
        
          //print_r($this->db->last_query());die;
          return $query->result();

        }

  public function get_school_profile_verification_district($district_id,$block_id,$school_type,$cate_type)
{

 $this->db->SELECT('*,schoolnew_academic_detail.school_type as sch_typ');
$this->db->FROM('schoolnew_academic_detail');
$this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_academic_detail.school_key_id','left');
$this->db->JOIN('schoolnew_training_detail','schoolnew_training_detail.school_key_id=schoolnew_academic_detail.school_key_id');
if(!empty($district_id)){
  $this->db->WHERE('students_school_child_count.district_id',$district_id);
}else if(!empty($block_id)){
  $this->db->WHERE('students_school_child_count.block_id',$block_id);
}
$this->db->GROUP_BY('students_school_child_count.school_id');

   if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          //$this->db->group_by('students_school_child_count.district_name'); 
          if(!empty($district_id)){
          $this->db->group_by('students_school_child_count.district_name'); 
          }else if(!empty($block_id)){
            $this->db->group_by('students_school_child_count.block_name');   
          }
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

        }

 




         public function get_school_sanitation_verification_block_1($school_type,$cate_type,$district_id,$WHERE)
        {
          $this->db->SELECT('count(*) as std_count,sum(total_b) as total_b,sum(total_g) as total_g,sum(toil_bys_inuse) as toil_bys_inuse,sum(toil_inuse_grls) as toil_inuse_grls,sum(toil_notuse_bys) as toil_notuse_bys,sum(toil_notuse_grls) as toil_notuse_grls,sum(urinls_notuse_bys) as urinls_notuse_bys,sum(urinls_notuse_grls) as urinls_notuse_grls,block_id,block_name');
           $this->db->FROM('schoolnew_infra_detail');
         $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
          $this->db->WHERE('students_school_child_count.district_id',$district_id);
          $this->db-> GROUP_BY('block_name');
          if(!empty($school_type))
                   {
                     $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
                   }else
                   {
                     $this->db->WHERE('students_school_child_count.school_type','Government');
                   }

          if(!empty($WHERE))
          {
              $this->db->WHERE($WHERE);
          }
                   
                   if(!empty($cate_type))
                   {
                        $this->db->WHERE_in('cate_type',$cate_type);
                   }
          $result = $this->db->get()->result();
        // print_r($this->db->last_query());
          return $result;
        }
        public function get_school_sanitation_verification_district_1($block_id,$school_type,$cate_type,$WHERE)
          {
            $this->db->SELECT('*');
             $this->db->FROM('schoolnew_infra_detail');
           $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
            $this->db->WHERE('students_school_child_count.block_id',$block_id);
            $this->db-> GROUP_BY('school_id');
            if(!empty($school_type))
                             {
                               $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
                             }else
                             {
                               $this->db->WHERE('students_school_child_count.school_type','Government');
                             }

                    if(!empty($WHERE))
                    {
                        $this->db->WHERE($WHERE);
                    }
                             
                             if(!empty($cate_type))
                             {
                                  $this->db->WHERE_in('cate_type',$cate_type);
                             }
  
          $query = $this->db->get();
        //print_r($this->db->last_query());die;
          return $query->result();
        }
 public function get_school_committee_verification_district_wise($district_id,$block_id,$school_type,$cate_type)
{
if($district_id!="")
   {
    
    $where ="students_school_child_count.district_id = $district_id";
  $group_by = "school_id";
   }
   else if($block_id!="")
   {
   $where ="students_school_child_count.block_id=$block_id";
  $group_by = "school_id";
   }
   else 
   {
   
   $group_by = "students_school_child_count.district_id";
   
   }
  $this->db->SELECT('*,count(*) as std_count');
  $this->db->FROM('schoolnew_committee_detail');
   $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_committee_detail.school_key_id');
   if($district_id !='' || $block_id!='')
   {
       $this->db->WHERE($where);
   }
   $this->db->GROUP_BY($group_by);



if(!empty($school_type))
          {
            $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.district_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();
        }
 public function get_school_committee_verification_district($district_id,$block_id,$school_type,$cate_type)
{
   $this->db->SELECT('*');
   $this->db->FROM('schoolnew_committee_detail');
   $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_committee_detail.school_key_id');
   if(!empty($district_id)){
    $this->db-> WHERE('students_school_child_count.district_id',$district_id);  
   }else if(!empty($block_id)){
    $this->db-> WHERE('students_school_child_count.block_id',$block_id);
   }
   $this->db->GROUP_BY('school_id');
if(!empty($school_type))
          {
            $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('students_school_child_count.school_type','Government');
          }
          else
          {
            $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->group_by('students_school_child_count.district_name'); 
          $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();
        }

/****************state model*************************/
function get_state_teacher_timetable_report_dist($schooltype,$teachertype,$periods,$firstday,$lastday)
{
  if($schooltype==1)
          {
           
           $sch_typ="'Primary School' , 'Middle School'";
          }
          else
          {
             $sch_typ="'High School', 'Higher Secondary School'";
          }
          //print_r($sch_typ);
               $SQL="SELECT 
    SUM(teacher_count) As Periods,
    COUNT(a.teacher_name) AS tech_cnt,
    schoolnew_district.id as dist_id,schoolnew_district.district_name
FROM udise_staffreg b
JOIN(SELECT 
        COUNT(PT) AS teacher_count,
            udise_staffreg.teacher_name,
            students_school_child_count.district_name,
            students_school_child_count.block_name,
            students_school_child_count.school_name,
            students_school_child_count.school_id,students_school_child_count.district_id
    FROM
        schoolnew_timetable_weekly_classwise
    JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id = udise_staffreg.school_key_id
        AND schoolnew_timetable_weekly_classwise.PT = udise_staffreg.teacher_code
    JOIN students_school_child_count ON students_school_child_count.school_id = udise_staffreg.school_key_id
    WHERE
        timetable_date >= '".$firstday."'
            AND timetable_date <= '".$lastday."'
            AND schoolnew_timetable_weekly_classwise.PT != ''
            AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL
            AND udise_staffreg.teacher_type ='".$teachertype."'
            AND students_school_child_count.management IN ('School Education Department School' , 'Municipal School')
            AND students_school_child_count.cate_type IN (".$sch_typ.")
    GROUP BY teacher_name
    HAVING teacher_count <= '".$periods."'  UNION ALL 
    SELECT 
        COUNT(PT) AS teacher_count,
            teacher_volunteers_subjects.teacher_name,
            students_school_child_count.district_name,
            students_school_child_count.block_name,
            students_school_child_count.school_name,
            students_school_child_count.school_id,students_school_child_count.district_id
    FROM
        schoolnew_timetable_weekly_classwise
    JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id = udise_staffreg.school_key_id
        AND schoolnew_timetable_weekly_classwise.PT = udise_staffreg.teacher_code
    JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id = teacher_volunteers_subjects.school_key_id
        AND schoolnew_timetable_weekly_classwise.PT = teacher_volunteers_subjects.teacher_id
    JOIN students_school_child_count ON students_school_child_count.school_id = teacher_volunteers_subjects.school_key_id
    WHERE
        timetable_date >= '".$firstday."'
            AND timetable_date <= '".$lastday."'
            AND schoolnew_timetable_weekly_classwise.PT != ''
            AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL
            AND udise_staffreg.teacher_type = '".$teachertype."'
            AND students_school_child_count.management IN ('School Education Department School' , 'Municipal School')
            AND students_school_child_count.cate_type IN ('Primary School' , 'Middle School')
    GROUP BY teacher_name
    HAVING teacher_count <= '".$periods."') AS a ON a.teacher_name = b.teacher_name AND a.school_id=b.school_key_id
LEFT JOIN schoolnew_district ON schoolnew_district.id=a.district_id
WHERE
    a.district_name IS NOT NULL
GROUP BY dist_id";
           
    

 $query = $this->db->query($SQL);
 //print_r($this->db->last_query());
       return $query->result();   
}
function get_state_teacher_timetable_report($dist_id,$schooltype,$teachertype,$periods,$firstday,$lastday)
{

  if($schooltype==1)
          {
           
           $sch_typ="'Primary School' , 'Middle School'";
          }
          else
          {
             $sch_typ="'High School', 'Higher Secondary School'";
          }
         
               $SQL="SELECT count(PT) as teacher_count , udise_staffreg.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,subjects FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
JOIN teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id 
WHERE timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."' AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.district_id=".$dist_id." and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School')
 GROUP BY teacher_name  having teacher_count <='".$periods."'
UNION ALL
SELECT count(PT) as teacher_count, teacher_volunteers_subjects.teacher_name,students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,subjects FROM schoolnew_timetable_weekly_classwise
JOIN udise_staffreg ON schoolnew_timetable_weekly_classwise.school_id=udise_staffreg.school_key_id and schoolnew_timetable_weekly_classwise.PT=udise_staffreg.teacher_code
JOIN teacher_subjects on teacher_subjects.id=udise_staffreg.appointed_subject
JOIN teacher_volunteers_subjects ON schoolnew_timetable_weekly_classwise.school_id=teacher_volunteers_subjects.school_key_id and schoolnew_timetable_weekly_classwise.PT=teacher_volunteers_subjects.teacher_id
JOIN students_school_child_count on students_school_child_count.school_id=teacher_volunteers_subjects.school_key_id
WHERE  timetable_date >= '".$firstday."' AND timetable_date <= '".$lastday."' AND schoolnew_timetable_weekly_classwise.PT != '' AND schoolnew_timetable_weekly_classwise.leavestatus IS NULL 
AND udise_staffreg.teacher_type='".$teachertype."' and students_school_child_count.district_id=".$dist_id." and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in (".$sch_typ.")
 GROUP BY teacher_name having teacher_count <='".$periods."'";
        

 $query = $this->db->query($SQL);

       return $query->result();   
}
function get_state_school_teacher_timetable($districtid)
{
$SQL="SELECT students_school_child_count.district_name,school_name,school_id,students_school_child_count.block_id as block_id
,students_school_child_count.block_name,sum(teach_bt_mle+teach_bt_fmle) as BTteacher
,sum(teach_sg_mle+teach_sg_fmle) as SGteacher,sum(teach_pg_mle+teach_pg_fmle) as PGteacher
,sum(teach_hm_fmle+teach_hm_mle) as HM ,sum(teach_othr_mle+teach_othr_fmle) as Others,
sum(teach_hm_fmle+teach_hm_mle+teach_bt_mle+teach_bt_fmle+teach_sg_mle+teach_sg_fmle+teach_pg_mle+teach_pg_fmle+teach_othr_mle+teach_othr_fmle) as Govteacher,district_name
    FROM teacher_profile_count 
         JOIN students_school_child_count on students_school_child_count.school_id=teacher_profile_count.school_key_id
        WHERE students_school_child_count.school_type_id in(1,2)
         and students_school_child_count.district_id=".$districtid."
            group by  students_school_child_count.school_id;";
 $query = $this->db->query($SQL);
       return $query->result();   
}
function get_school_teacherlist_timetable($schoolid)
 {
   $SQL="SELECT SUM(CASE WHEN udise_staffreg.teacher_code=schoolnew_timetable_weekly_classwise.PT THEN 1 ELSE 0 END) as assignperiods,udise_staffreg.teacher_code,teacher_name FROM schoolnew_timetable_weekly_classwise
left JOIN udise_staffreg on school_key_id=schoolnew_timetable_weekly_classwise.school_id
WHERE school_id=".$schoolid."  
group by udise_staffreg.teacher_code;";
 $query = $this->db->query($SQL);
       return $query->result(); 
  
 }
 function get_class_teacherassign($teacherid)
   {
   $SQL="SELECT count(PT)as assignperiods,concat(class_id,'-',section)as class,teacher_name FROM schoolnew_timetable_weekly_classwise 
left JOIN udise_staffreg on udise_staffreg.teacher_code = schoolnew_timetable_weekly_classwise.PT
WHERE schoolnew_timetable_weekly_classwise.PT=".$teacherid."";
     $query = $this->db->query($SQL);
     return $query->result();
   }
 function get_state_dist_school_details($district_id,$block_id){


 if($district_id!="")
 {
 
    $this->db->select('sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,sum(case when a.school_medium_id is null then 1  else 0 end)as unmediummarked,
  students_school_child_count.* from schoolnew_section_group a');
     // $this->db->from('students_school_child_count');
    $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.district_id',$district_id);
    $this->db->where_in('students_school_child_count.school_type_id',array(2,4));
   $this->db->group_by('a.school_key_id');
   $query = $this->db->get();
   
 }
 else if($block_id)
 {
 $this->db->select('sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,sum(case when a.school_medium_id is null then 1  else 0 end)as unmediummarked,
  students_school_child_count.* from schoolnew_section_group a');
     // $this->db->from('students_school_child_count');
    $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.block_id',$block_id);
    $this->db->where_in('students_school_child_count.school_type_id',array(2,4));
   $this->db->group_by('a.school_key_id');
   $query = $this->db->get();
 }
 else
 {
  $SQL="SELECT  count(school_id) as total_school,district_id,district_name,sum(aided)as aided,sum(self_finance)as self_financed,sum(unmarked)as unmarked,sum(unmediummarked)as unmediummarked FROM students_school_child_count 
      left JOIN (SELECT sum(case when b.class_id=12 or  b.class_id=11 then 1 else  0 end) as twelth,sum(case when b.group_id !=0 and b.class_id=12 or b.class_id=11  then 1 else  0 end) as nogroup,sum(case when b.school_type=1 then 1 else  0 end) as aided,
    sum(case when b.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when b.school_type is null then 1  else 0 end)as unmarked,sum(case when b.school_medium_id is null then 1  else 0 end)as unmediummarked,school_key_id  FROM schoolnew_section_group b group by school_key_id)  as b on b.school_key_id = students_school_child_count .school_id
WHERE students_school_child_count.school_type_id in(2,4) group by  students_school_child_count.district_id";
$query = $this->db->query($SQL);

 }

       return $query->result();    
   } 


   function get_state_dist_school_timetable_data(){

      $SQL="SELECT  count(school_id) as total_school,district_id,district_name,sum(aided)as aided,sum(self_finance)as self_financed,sum(unmarked)as unmarked,sum(unmediummarked)as unmediummarked FROM students_school_child_count 
      left JOIN (SELECT sum(case when b.school_type=1 then 1 else  0 end) as aided,
    sum(case when b.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when b.school_type is null then 1  else 0 end)as unmarked,sum(case when b.school_medium_id is null then 1  else 0 end)as unmediummarked,school_key_id  FROM schoolnew_section_group b group by school_key_id)  as b on b.school_key_id = students_school_child_count .school_id
WHERE students_school_child_count.school_type_id in(1,2) group by  students_school_child_count.district_id";
 $query = $this->db->query($SQL);
       return $query->result(); 
   } 
   function get_state_dist_higher_school_details($district_id,$block_id){

   if($district_id!="")
   {
      $this->db->select('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=12 then 1 else  0 end) as nogrouptwelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=11 then 1 else  0 end) as nogroupelevelth,sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,students_school_child_count.* from schoolnew_section_group a');
    $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.district_id',$district_id);
    $this->db->where('students_school_child_count.high_class',12);
    $this->db->where_in('students_school_child_count.school_type_id',array(1,2,4));
    $this->db->group_by('a.school_key_id');
      $query = $this->db->get();
   }
   else if($block_id!="")
   {
   $this->db->select('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=12 then 1 else  0 end) as nogrouptwelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=11 then 1 else  0 end) as nogroupelevelth,sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,students_school_child_count.* from schoolnew_section_group a');
     // $this->db->from('students_school_child_count');
    $this->db->join('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
      $this->db->where('students_school_child_count.block_id',$block_id);
    $this->db->where('students_school_child_count.high_class',12);
    $this->db->where_in('students_school_child_count.school_type_id',array(1,2,4));
    $this->db->group_by('a.school_key_id');
      $query = $this->db->get();
   }
   else {
   $SQL="SELECT  count(school_id) as total_school,district_id,district_name,sum(aided)as aided,sum(self_finance)as self_financed,sum(unmarked)as unmarked,sum(twelth)as highersection,sum(nogroup)as highergroup FROM students_school_child_count 
      left JOIN (SELECT sum(case when b.class_id=12 or  b.class_id=11 then 1 else  0 end) as twelth,sum(case when b.group_id !=0 and b.class_id=12 or b.class_id=11  then 1 else  0 end) as nogroup,sum(case when b.school_type=1 then 1 else  0 end) as aided,
    sum(case when b.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when b.school_type is null then 1  else 0 end)as unmarked,school_key_id  FROM schoolnew_section_group b group by school_key_id)  as b on b.school_key_id = students_school_child_count .school_id
WHERE students_school_child_count.school_type_id in(1,2,4) and students_school_child_count.high_class=12 group by  students_school_child_count.district_id";
  $query = $this->db->query($SQL);
   }
  
  
       return $query->result(); 
   } 
   function get_state_school_details($districtid)
   {
      $this->db->SELECT('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when a.group_id !=0 and a.class_id=12 or a.class_id=11  then 1 else  0 end) as nogroup,sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked,sum(case when a.school_medium_id is null then 1  else 0 end)as unmediummarked ,students_school_child_count.* FROM schoolnew_section_group a');
     // $this->db->FROM('students_school_child_count');
    $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
    $this->db->WHERE('students_school_child_count.district_id',$districtid);
    $this->db->WHERE_in('students_school_child_count.school_type_id',array(2,3,4));
    $this->db->group_by('a.school_key_id');
      $query =  $this->db->get();
      return $query->result();
   }
   function get_state_school_details_timetable_data($districtid)
   {
      $this->db->SELECT('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when a.group_id !=0 and a.class_id=12 or a.class_id=11  then 1 else  0 end) as nogroup,sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked,sum(case when a.school_medium_id is null then 1  else 0 end)as unmediummarked ,students_school_child_count.* FROM schoolnew_section_group a');
     // $this->db->FROM('students_school_child_count');
    $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
    $this->db->WHERE('students_school_child_count.district_id',$districtid);
    $this->db->WHERE_in('students_school_child_count.school_type_id',array(2,4));
    $this->db->group_by('a.school_key_id');
      $query =  $this->db->get();
      return $query->result();
   }
   
   function get_state_school_higher_details($districtid){

      $this->db->SELECT('sum(case when a.class_id=12 or  a.class_id=11 then 1 else  0 end) as twelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=12 then 1 else  0 end) as nogrouptwelth,sum(case when  a.group_id  is not null and a.group_id !=0 and a.class_id=11 then 1 else  0 end) as nogroupelevelth,sum(case when a.school_type=1 then 1 else  0 end) as aided,
  sum(case when a.school_type = 2 then 1  else 0 end) as self_finance,
    sum(case when a.school_type is null then 1  else 0 end)as unmarked ,students_school_child_count.* FROM schoolnew_section_group a');
     // $this->db->FROM('students_school_child_count');
    $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=a.school_key_id','left');
    $this->db->WHERE('students_school_child_count.district_id',$districtid);
    $this->db->WHERE('students_school_child_count.high_class',12);
    $this->db->WHERE_in('students_school_child_count.school_type_id',array(1,2,4));
    
    $this->db->group_by('a.school_key_id');
      $query =  $this->db->get();
      return $query->result();
   }
    
   public function  get_school_class_details($school_id)
  {
    $this->db->SELECT('schoolnew_section_group.*,baseapp_group_code.group_name,schoolnew_mediumofinstruction.MEDINSTR_DESC, schoolnew_section_group.students as student_count');
      $this->db->FROM('schoolnew_section_group');
    $this->db->JOIN('students_child_detail','students_child_detail.school_id =schoolnew_section_group.school_key_id
      and students_child_detail.class_studying_id=schoolnew_section_group.class_id and students_child_detail.class_section=schoolnew_section_group.section','left');
    $this->db->JOIN('baseapp_group_code ','baseapp_group_code.id=schoolnew_section_group.group_id','left');
    $this->db->JOIN('schoolnew_mediumofinstruction','schoolnew_mediumofinstruction.MEDINSTR_ID=schoolnew_section_group.school_medium_id','left');
      $this->db->WHERE('schoolnew_section_group.school_key_id',$school_id);
    $this->db->order_by('schoolnew_section_group.class_id');
    $this->db->group_by('schoolnew_section_group.id');
      $query =  $this->db->get();
      return $query->result();



  }

  function get_dist_school_timetable_details_dist($school_cate){ 
      if(!empty($school_cate)){
        $cate_type=implode("','", $school_cate);   
        $where=" where students_school_child_count.cate_type in ('".$cate_type."') and students_school_child_count.school_type_id=1 and schoolnew_section_group.class_id not in('13','14','15')";
      }else{
        $where="where students_school_child_count.school_type_id=1 and schoolnew_section_group.class_id not in('13','14','15')";
      }
          $SQL="SELECT
          district_name,
          block_name,
          udise_code,
          school_name,
          district_id,block_id,school_id,
          COUNT(master_classid) AS summarked,
          COUNT(students_school_child_count.school_id) AS sumsection
          FROM
          students_school_child_count
          JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=students_school_child_count.school_id
          LEFT JOIN (SELECT DISTINCT(master_classid) AS master_classid FROM schoolnew_timetable_term_classwise) AS mstid ON mstid.master_classid=schoolnew_section_group.id ".$where."
          GROUP BY district_id;";
      
          $query = $this->db->query($SQL);
          //print_r($this->db->last_query());die;
          return $query->result();
  }
  function get_dist_school_timetable_details_blk($dist_id,$school_cate,$this_week_fst,$this_week_ed){

    
     if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);

      $where=" where students_school_child_count.cate_type in ('".$cate_type."') and students_school_child_count.district_id=".$dist_id." and students_school_child_count.school_type_id=1 and schoolnew_section_group.class_id not in('13','14','15')";
    }else{
     $where="where students_school_child_count.district_id=".$dist_id." and students_school_child_count.school_type_id=1 and schoolnew_section_group.class_id not in('13','14','15')";
    }
    $SQL="SELECT
    district_name,
    block_name,
    udise_code,
    school_name,
    district_id,block_id,school_id,
    COUNT(master_classid) AS summarked,
    COUNT(students_school_child_count.school_id) AS sumsection
    FROM
    students_school_child_count
    JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=students_school_child_count.school_id
    LEFT JOIN (SELECT DISTINCT(master_classid) AS master_classid FROM schoolnew_timetable_term_classwise) AS mstid ON mstid.master_classid=schoolnew_section_group.id
    ".$where." GROUP BY block_id";   
    $query = $this->db->query($SQL);
      //print_r($this->db->last_query());die;
    return $query->result();
  }

      function get_dist_school_timetable_details($school_cate,$block_id,$this_week_fst,$this_week_ed){
       if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where=" and students_school_child_count.cate_type in ('".$cate_type."')";
    }
    else
    {
     $where="";
    }
       $SQL="select count(a.class_id)as totalclasssection,OUTPUT,school_key_id,school_name,block_name,district_name,block_id,district_id,udise_code from  schoolnew_section_group a
   left join students_school_child_count on students_school_child_count.school_id=a.school_key_id
   left join (SELECT COUNT(1) AS OUTPUT, school_id FROM (select count(*) as marked,school_id from schoolnew_timetable_weekly_classwise
   where  timetable_date BETWEEN '".$this_week_fst."' AND '".$this_week_ed."' group by class_id,section,school_id) AS marked GROUP BY school_id
   ) as b on a.school_key_id = b.school_id where class_id not in (13,14,15)
   and students_school_child_count.block_id='".$block_id."' ".$where." group by school_key_id";
   
         $query = $this->db->query($SQL);
            //print_r($this->db->last_query());die;
       return $query->result();
   }
      function get_school_class_section_timetable($school_id,$this_week_fst,$this_week_ed)
   {
      $SQL="select
  concat(schoolnew_section_group.class_id,'-',schoolnew_section_group.section) as class,
  MAX((CASE WHEN (schoolnew_section_group.class_id=schoolnew_timetable_term_classwise.class_id 
    AND schoolnew_section_group.section=schoolnew_timetable_term_classwise.section) THEN 1
        ELSE 0 END
  ))as time_table
from schoolnew_timetable_term_classwise
LEFT JOIN schoolnew_section_group ON schoolnew_section_group.school_key_id=schoolnew_timetable_term_classwise.school_id
where school_id=".$school_id."  and schoolnew_section_group.class_id not in (13,14,15) group by class;";

         $query = $this->db->query($SQL);
       return $query->result();
   }
     function get_section_period_count($school_id,$class,$section)
   {
    
    $this->db->select('sum(case when PS is null or PT=0 then 1 else  0 end) as notmarked,
     sum(case when PS is not null or PT !=0 then 1 else  0 end) as marked  from schoolnew_timetable_weekly_classwise');
      $this->db->where('school_id',$school_id);
    $this->db->where('class_id',$class);
    $this->db->where('section',$section);
      $query =  $this->db->get();
      return $query->result();
   }
    /******************************************************
            Function done by Ramoc Magesh 23-04-2019
    *******************************************************/
    
    

    public function school_construction_district($WHERE,$group) {
        $sql= "SELECT COUNT(DISTINCT school_key_id) as noofschool, 
        udise_code,school_name,district_name,COUNT(schoolnew_natureofconst_entry.id) as noofblock,
        district_id,block_id,edu_dist_id FROM schoolnew_natureofconst_entry 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_natureofconst_entry.school_key_id
        ".$WHERE.$group."";
        //echo $sql;
        //die();
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function school_labdetails_district($WHERE,$group) {
        $sql= "SELECT COUNT(*) as noofschool,
                udise_code,
                school_name,
                district_id,district_name,
                block_id,block_name,
                edu_dist_name,edu_dist_id,
                ictlab.Lab,
                seperate_room,
                condition_now
                FROM  
                (SELECT schoolnew_labentry.id as labetrid,schoolnew_labentry.lab_id as lab_id,school_key_id,schoolnew_lab.Lab, 
                (CASE WHEN seperate_room=1 THEN 'SEPERATE ROOM' ELSE 'NO SEPERATE ROOM' END) AS seperate_room,
                (CASE WHEN condition_now=1 THEN 'FULLY EQUIPPED' ELSE
                CASE WHEN condition_now=2 THEN 'PARTIALLY EQUIPPED' ELSE
            CASE WHEN condition_now=3 THEN 'NOT APPLICABLE' END END END) AS condition_now FROM schoolnew_labentry
                JOIN schoolnew_lab ON schoolnew_lab.id=schoolnew_labentry.lab_id) AS ictlab 
                JOIN students_school_child_count on students_school_child_count.school_id = ictlab.school_key_id ".$WHERE.$group."";
        //echo $sql;
        //die();
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    public function school_devicedetails_district($WHERE,$group) {
        $sql = "SELECT 
  COUNT(*) as schoolcount,
  district_name,district_id,
    edu_dist_id,edu_dist_name,
    block_id,block_name,
    school_id,school_name,udise_code,
    SUM(avail_nos) as totalavail,
    SUM(working_nos) as totalfunctional,purpose,supplied_by,ict_type,avail_nos,working_nos
FROM
students_school_child_count
JOIN (SELECT schoolnew_ictentry.id as ictetrid,school_key_id,avail_nos,working_nos,schoolnew_ict_list.ict_type,
schoolnew_ict_list.id as ictid,schoolnew_ict_suppliers.id as supp_id,
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_ictentry.donor_ict) ELSE supplier_name END) AS supplied_by,
(CASE WHEN purpose=1 THEN 'TEACHING' ELSE
  CASE WHEN purpose=2 THEN 'ADMINISTRATIVE' ELSE
    CASE WHEN purpose=3 THEN 'ACADEMIC' ELSE
      CASE WHEN purpose=4 THEN 'NONE' END END END END) AS purpose
FROM schoolnew_ictentry
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_ictentry.ict_type 
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_ictentry.supplied_by) as ictetr ON ictetr.school_key_id=students_school_child_count.school_id ".$WHERE.$group."";
        //print_r($sql);
        //die();
        $query = $this->db->query($sql);
        return $query->result();
    }
  
    public function schoolprofilecompletionlist($WHERE,$group) {
        $sql = "SELECT COUNT(*) as schoolcount,district_name,district_id,edu_dist_id,edu_dist_name,block_id,block_name,school_id,school_name,udise_code,
        schoolnew_profileverification.school_key_id,module_id,module,max(schoolnew_profileverification.timestamp),
        verification,emis_sno,max(schoolnew_profileverifyid.timestamp),schoolnew_profileverifyid.school_key_id,schoolnew_profileverifyid.id
        FROM
        students_school_child_count
        left JOIN schoolnew_profileverification on schoolnew_profileverification.school_key_id=
   students_school_child_count.school_id
   left JOIN schoolnew_profileverifyid on schoolnew_profileverifyid.school_key_id=students_school_child_count.school_id
   left JOIN schoolnew_partdetails on schoolnew_partdetails.id=schoolnew_profileverification.module_id ".$WHERE.$group." ";
       //echo $sql;
       //die();
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function beoverify($a,$b,$schoolid){
        //print_r($b['emis_sno']);
        //die();
        
        if($schoolid!=''){
            $this->db->WHERE('school_key_id', $schoolid);
            $this->db->delete('schoolnew_profileverification');
        }
        if($this->db->insert_batch('schoolnew_profileverification',$a)){
            //if($b['emis_sno']!=null){return $this->db->update_batch('schoolnew_profileverifyid', $b, 'emis_sno');}else{ }
            return $this->db->insert('schoolnew_profileverifyid',$b);
        }
        return false;    
    }
    
   
    public function getschool($WHERE,$group) {
            
      $sql = "SELECT students_school_child_count.district_name,school_type,students_school_child_count.block_name,
           block_id,district_id,edu_dist_id,edu_dist_name,school_id, management, cate_type, students_school_child_count.school_id, students_school_child_count.udise_code, 
           students_school_child_count.teach_tot,students_school_child_count.school_name,
           concat(students_school_child_count.udise_code,' - ',students_school_child_count.school_name) as schoolname,sum(c1_b+c1_g+c1_t) as class_1,
           sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,
           sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,
           sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,
           sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total 
           FROM students_school_child_count
      JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id WHERE ".$WHERE.$group."";
    
      //print_r($sql);
          //die();
        $query = $this->db->query($sql);
        return $query->result();
  
    }
    public function school_partdetails() {
        $sql = "SELECT id,module FROM schoolnew_partdetails";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /***********************************************************
    ************************************************************/
    
    
    

 public function get_blockwise_dee($block_name,$school_type,$cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array('2','3','16','18','27','29','32','34','42'));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
             public function get_blockwise_dse($block_name,$school_type,$cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(1,5,15,17,19,20,21,22,23,24,26,31,33));



          if(!empty($school_type))
           {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else
          {
            $this->db->WHERE('school_type','Government');
          }
          if(!empty($cate_type))  
          {
             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }
   public function getallstate_dms($cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`,`students_school_child_count`.`district_id`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(28));
            
        
          if(!empty($cate_type))  
          {

             $this->db->WHERE_in('cate_type',$cate_type);
          }
             $this->db->group_by('district_id');
                  // return $result;
                  $result = $this->db->get()->result();
                    return $result;
                // print_r(count($result));die;

            }
               /**************************************
              * School special cash insentive *
              * VIT-Bala                        *
              * 25/04/2019                        *
              *************************************/
   function get_state_dist_special_cash(){
      $SQL="SELECT count(a.school_id)as school_count,sum(c12_b+c12_g+c12_t) as 'twelth',district_name,district_id,sum(stu_mark) as mark,sum(not_elig) as not_elig FROM students_school_child_count a 
    left JOIN (SELECT distinct unique_id_no,sum(If(student_eligible=1,1,0)) as stu_mark,sum(If(student_eligible=0,1,0)) as not_elig,school_id FROM students_special_cash_incentive WHERE  flag = 0  and update_at >= '2019-06-01'  group by school_id) b on b.school_id = a.school_id 
   WHERE school_type_id in (1,2,4) and high_class = 12  group by district_id;";

         $query = $this->db->query($SQL);
         // print_r($this->db->last_query());
       return $query->result(); 
   }
   function get_dist_special_cash($district_id){
     
       $SQL="SELECT count(a.school_id)as school_count,sum(c12_b+c12_g+c12_t) as 'student_count',district_name,district_id,sum(stu_mark) as student_marked,udise_code,school_name,sum(not_elig) as not_elig FROM students_school_child_count a 
       left JOIN (SELECT distinct unique_id_no,sum(If(student_eligible=1,1,0)) as stu_mark,sum(If(student_eligible=0,1,0)) as not_elig,school_id FROM students_special_cash_incentive WHERE  flag = 0  and update_at >= '2019-06-01' group by school_id) b on b.school_id = a.school_id 
       WHERE school_type_id in (1,2,4) and high_class = 12  
     and district_id=".$district_id."  group by a.school_id;";
       $query = $this->db->query($SQL);
       return $query->result(); 
   }


        /************ special cash insentive ***********/
    
              /**************************************
              * School get subjects for lesson plan *
              * VIT-Bala                        *
              * 23/05/2019                        *
              *************************************/
        function get_subjects()
        {
        $SQL="SELECT *,teacher_subjects.id,teacher_subjects.subjects FROM schoolnew_lesson_plan
      right JOIN teacher_subjects on schoolnew_lesson_plan.subject_id=teacher_subjects.id";
            $query = $this->db->query($SQL);
            return $query->result();  
        }
        function get_term_plan_details()
        {
      $SQL="SELECT * FROM schoolnew_term_plan";
            $query = $this->db->query($SQL);
            return $query->result();   
        }
        function insert_lesson_plan_data($data){
          // print_r($data);
          // die();
              $this->db->insert('schoolnew_lesson_plan',$data); 
             return $this->db->insert_id();
              }
         function insert_term_plan_data($data){
      
              $this->db->insert('schoolnew_term_plan',$data); 
             return $this->db->insert_id();
              }
        function timetable_configuration_update($data,$updateid)
  {
          $this->db->WHERE('id',$updateid);
          return $this->db->update('schoolnew_term_plan', $data);   
  }
              public function get_blockwise_dms($block_name,$cate_type)
            {

               $this->db->SELECT('`students_school_child_count`.`district_name`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
          ->WHERE_in('schoolnew_school_department.id', array(28));
   
          if(!empty($cate_type))  
          {

             $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->WHERE('block_name',$block_name);
                  $this->db->group_by('school_id');
                  // return $result;
                  $result = $this->db->get()->result();
                  // print_r($this->db->last_query());die;
                    return $result;
                // print_r(count($result));die;

            }



/********************************************************
Only changes Building,Wash,Land list done by Magesh      
********************************************************/
  public function schoolbuildingdetails($where,$group,$order){
    $sql="select school_id,
count(1) as totalschools,
udise_code,
block_name,
school_name,
build_block_no,
sum(IFNULL(cons.pucca,0)) as pucca,
sum(IFNULL(cons.partially_pucca,0)) as partially_pucca,
sum(IFNULL(cons.kutcha,0)) as kutcha,construct_type,total_flrs,tot_classrm_use,tot_classrm_nouse,off_room,lab_room,library_room,comp_room,art_room,staff_room,hm_room,girl_room,good_condition,need_minorrep,need_majorrep,total_room,created_date,cons.modified_date,district_id,block_id,edu_dist_id,district_name from students_school_child_count
left join schoolnew_infra_detail on schoolnew_infra_detail.school_key_id=students_school_child_count.school_id
left join ((SELECT sum(case when construct_type =1 then 1 else 0 end) as pucca,sum(case when construct_type =2 then 1 else 0 end) as partially_pucca,sum(case when construct_type =3 then 1 else 0 end) as kutcha,school_key_id,construct_type,total_flrs,tot_classrm_use,tot_classrm_nouse,off_room,lab_room,library_room,comp_room,art_room,staff_room,hm_room,girl_room,good_condition,need_minorrep,need_majorrep,total_room,created_date,modified_date FROM schoolnew_natureofconst_entry group by school_key_id)) as cons on cons.school_key_id=students_school_child_count.school_id where udise_code is not null
".$where." group by ".$group." order by ".$order.";";
  //echo ($sql); die();
  $query=$this->db->query($sql);
  return $query->result_array();
  }
  
  
  public function schoolsanitationdetails($where,$group,$order){
    $sql="select 
count(1) as totalschools,
district_id,
block_id,
school_id,
udise_code,
district_name,
block_name,
school_name,
sum(total_b) as total_b,
sum(toil_bys_inuse) as toil_bys_inuse,
sum(toil_notuse_bys) as toil_notuse_bys,
sum(total_g) as total_g,
sum(toil_inuse_grls) as toil_inuse_grls,
sum(toil_notuse_grls) as toil_notuse_grls,
sum(urinls_notuse_bys) as urinls_notuse_bys,
sum(urinls_notuse_grls) as urinls_notuse_grls,
tot_handwash_bys,
tot_handwash_grls,
(case when drnkwater_avail=1 then 'Yes' when drnkwater_avail=0 then 'No' end) as drnkwater,
(case when drnkwater_source=1 then 'Hand Pumps' when drnkwater_source=2 then 'Well' when drnkwater_source=3 then 'Tap Water' when drnkwater_source=4 then 'RO Purifier' when drnkwater_source=-1 then 'Others' end) as drinkingsource,
(case when incinerator=1 then 'Yes' when incinerator=0 then 'No' end) as incinerator,
inci_auto_avail_no,
inci_man_avail_no,
inci_auto_func_no,
inci_man_func_no
 from schoolnew_infra_detail
 
 join students_school_child_count on students_school_child_count.school_id=schoolnew_infra_detail.school_key_id where udise_code is not null ".$where." group by ".$group."  order by ".$order.";";
    $query=$this->db->query($sql);
    return $query->result_array();
  }
  
  public function schoollanddetails(){
    $sql="";
    $query=$this->db->query($sql);
    return $query->result_array();
  }


  
/*********************************************************
      End
**********************************************************/
      
  //aadhar count details
   function emis_state_district_aadhar_count($district_id,$block_id){
   
       if($district_id!='')
       {
        $select= "SELECT students_aadhaar_child_count.school_id,students_school_child_count.district_id,district_name,sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,district_name,district_id,udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_id,students_school_child_count.block_name,students_school_child_count.edu_dist_name FROM students_aadhaar_child_count 
 join students_school_child_count on students_school_child_count.school_id 
 =students_aadhaar_child_count.school_id";
               $where = "district_id = $district_id group by  students_school_child_count.school_id";         
       }
       else if($block_id!='')
       {
       $select= "SELECT students_aadhaar_child_count.school_id,
         students_school_child_count.district_id,district_name,
         sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
      sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent  FROM students_aadhaar_child_count 
       JOIN students_school_child_count on students_school_child_count.school_id = students_aadhaar_child_count.school_id";
           $where ="block_id = $block_id group by school_id";   
       }
       else
       {
       $select= "SELECT students_aadhaar_child_count.school_id,
         students_school_child_count.district_id,district_name,
         sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
      sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent  FROM students_aadhaar_child_count 
       JOIN students_school_child_count on students_school_child_count.school_id = students_aadhaar_child_count.school_id";
             $where ='district_id is not null group by district_id';     
       }
         $sql="$select and $where";
        $query = $this->db->query($sql);
           return $query->result(); 
 
    
   }
   //aadhar school state distic base count details
     function aadhar_school_distic_based_count_details($districtid,$block_id){
      if($districtid!="")
      {
        $sql="SELECT students_school_child_count.district_id,district_name,udise_code,
              sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
              sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,
              students_school_child_count.school_name,
              students_school_child_count.school_type,
              students_school_child_count.school_id,
              students_school_child_count.block_name,
              students_school_child_count.edu_dist_name
              FROM students_aadhaar_child_count 
              JOIN students_school_child_count on students_school_child_count.school_id=students_aadhaar_child_count.school_id 
              WHERE students_school_child_count.district_id  = ".$districtid." 
              group by students_school_child_count.school_id  ";
      }
      if($block_id!="")
      {
        $sql="SELECT students_school_child_count.district_id,district_name,udise_code,
              sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
              sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,
              students_school_child_count.school_name,
              students_school_child_count.school_type,
              students_school_child_count.school_id,
              students_school_child_count.block_name,
              students_school_child_count.edu_dist_name
              FROM students_aadhaar_child_count 
              JOIN students_school_child_count on students_school_child_count.school_id=students_aadhaar_child_count.school_id 
              WHERE students_school_child_count.block_id  = ".$block_id." 
              group by students_school_child_count.school_id  ";
      }
//       $sql="SELECT students_aadhaar_child_count.school_id,students_school_child_count.district_id,district_name,sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
// sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,district_name,district_id,udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_id,students_school_child_count.block_name,students_school_child_count.edu_dist_name FROM students_aadhaar_child_count 
//  JOIN students_school_child_count on students_school_child_count.school_id 
//  =students_aadhaar_child_count.school_id  WHERE district_id  = ".$districtid."
//  group by students_school_child_count.school_id  ";
       
              // atlast you have to add for transfer flag.
              // -- select .. students_child_detail.transfer_flag
              // -- JOIN students_child_detail on students_school_child_count.school_id = students_child_detail.school_id 
              // -- where .. and students_child_detail.transfer_flag = 1

    
      $query =  $this->db->query($sql);
      return $query->result();
   }
   //aadhar distic school base count
   function aadhar_school_base_count_details($school_id){
   $sql="SELECT students_aadhaar_child_count.school_id,students_school_child_count.district_id,district_name,sum(students_aadhaar_child_count.total_b+students_aadhaar_child_count.total_g+students_aadhaar_child_count.total_t)as aadharin, 
sum(students_school_child_count.total_b+students_school_child_count.total_g+students_school_child_count.total_t)as totalstudent,district_name,district_id,udise_code,students_school_child_count.school_name,students_school_child_count.school_type,students_school_child_count.school_id,students_school_child_count.block_name,students_school_child_count.edu_dist_name FROM students_aadhaar_child_count 
 JOIN students_school_child_count on students_school_child_count.school_id 
 =students_aadhaar_child_count.school_id  WHERE students_school_child_count.school_id  = ".$school_id." ";
    
      $query =  $this->db->query($sql);
      return $query->result();
   }
   
   public function  notin_aadhar_school_base_count_details($school_id)
   {
    $sql ="SELECT unique_id_no,name,gender,dob,class_studying_id,class_section  FROM students_child_detail  WHERE school_id =  ".$school_id." and
      NULLIF(aadhaar_uid_number, ' ') IS NULL and transfer_flag =0 ";
    
      $query =  $this->db->query($sql);
    //  print_r($this->db->last_query());die();
       $query->result();
   }
   public function emis_state_district_noonmeal_count_details($district_id,$block_id)
   {
   
   if($district_id !="")
   {

       $sql="
      select aa.district_id,aa.district_name,aa.school_name,aa.school_id,aa.block_name,aa.udise_code,aa.total, bb.meals from
      (SELECT district_id, district_name,school_id,school_name,block_name,udise_code,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t+c9_b+c9_g+c9_t+c10_b+c10_g+c10_t) AS total FROM students_school_child_count where students_school_child_count.school_type_id in (1 ,2) and district_id= ".$district_id." GROUP BY district_id,school_id) aa
       left join
      (
      select students_school_child_count.district_id,students_school_child_count.school_id,students_school_child_count.school_name,count(*) meals from schoolnew_schemeindent
      left join students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id
      left join students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id where students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and students_school_child_count.district_id  = ".$district_id." and schoolnew_schemeindent.unique_supply =1 and schoolnew_schemeindent.isactive = 1
      group by students_school_child_count.school_id) bb

      on  aa.school_id = bb.school_id ";
   }
   else if($block_id!="")
   {
   $sql="
      select aa.district_id,aa.district_name,aa.school_name,aa.school_id,aa.block_name,aa.udise_code,aa.total, bb.meals from
      (SELECT district_id, district_name,school_id,school_name,block_name,udise_code,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t+c9_b+c9_g+c9_t+c10_b+c10_g+c10_t) AS total FROM students_school_child_count where students_school_child_count.school_type_id in (1 ,2) and block_id= ".$block_id." GROUP BY block_id,school_id) aa
       left join
      (
      select students_school_child_count.district_id,students_school_child_count.school_id,students_school_child_count.school_name,count(*) meals from schoolnew_schemeindent
      left join students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id
      left join students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id where students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and students_school_child_count.block_id  = ".$block_id." and schoolnew_schemeindent.unique_supply =1 and schoolnew_schemeindent.isactive = 1
      group by students_school_child_count.school_id) bb

      on  aa.school_id = bb.school_id ";
   }
   else
   {
   
           $sql="SELECT aa.district_id,aa.district_name, aa.total, bb.meals FROM 
    (SELECT district_id, district_name,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t+c9_b+c9_g+c9_t+c10_b+c10_g+c10_t) AS total FROM students_school_child_count WHERE students_school_child_count.school_type_id in (1 ,2) GROUP BY district_id) aa
     left JOIN
    (SELECT students_school_child_count.district_id,count(*) meals FROM schoolnew_schemeindent 
    left JOIN students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id 
    left JOIN students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id WHERE students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and schoolnew_schemeindent.unique_supply = 1 and schoolnew_schemeindent.isactive = 1  
    group by district_id  ) bb
    on aa.district_id = bb.district_id";
   }
   
    $query =  $this->db->query($sql);
      return $query->result();
   }
   
     public function meal_school_distic_based_count_details($districtid)
   {
    
   $sql="
SELECT aa.district_id,aa.district_name,aa.school_name,aa.school_id,aa.block_name,aa.udise_code,aa.total, bb.meals FROM 
(SELECT district_id, district_name,school_id,school_name,block_name,udise_code,SUM(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t+c9_b+c9_g+c9_t+c10_b+c10_g+c10_t) AS total FROM students_school_child_count WHERE students_school_child_count.school_type_id in (1,2) and district_id= ".$districtid." GROUP BY district_id,school_id) aa left JOIN(SELECT students_school_child_count.district_id,students_school_child_count.school_id,students_school_child_count.school_name,count(*) meals FROM schoolnew_schemeindent 
left JOIN students_child_detail on students_child_detail.id =schoolnew_schemeindent.student_id 
left JOIN students_school_child_count on students_school_child_count.school_id =students_child_detail.school_id WHERE students_school_child_count.school_type_id in (1 ,2) and schoolnew_schemeindent.scheme_id=15 and students_school_child_count.district_id  = ".$districtid."
 and schoolnew_schemeindent.unique_supply =1 and schoolnew_schemeindent.isactive = 1   
group by district_id,students_school_child_count.school_id) bb

on  aa.school_id = bb.school_id ";
    $query =  $this->db->query($sql);
      return $query->result();
   }
   public function  meal_school_eligible_stud_count_details($school_id)
   {
     $sql="SELECT students_school_child_count.school_id,students_school_child_count.school_name,students_school_child_count.district_id,dob,gender,unique_id_no,schoolnew_schemeindent.student_id,students_child_detail.name,students_child_detail.class_studying_id,students_child_detail.class_section
 FROM students_school_child_count 
JOIN students_child_detail on  students_child_detail.school_id =  students_school_child_count.school_id 
JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id= students_child_detail.id
WHERE schoolnew_schemeindent.scheme_id=15 and students_school_child_count.school_type_id in (1 ,2) and students_child_detail.school_id =".$school_id." 
 and schoolnew_schemeindent.unique_supply =1 and schoolnew_schemeindent.isactive = 1 group by unique_id_no ";
   $query =  $this->db->query($sql);
      return $query->result();  
   }
   //staff districtwise count 
   public function  emis_staff_district_count_details()
   {
     $sql ="SELECT district_id,district_name, sum(teach_tot)as staff,sum(nonteach_tot)as nonstaff,sum(totstaff)as totstaff FROM students_school_child_count WHERE district_id is not null group by district_id";
     $query =  $this->db->query($sql);
      return $query->result();   
   }
    public function  emis_staff_BRTE()
   {
     $sql ="SELECT COUNT(1) AS cnt,district_name,off_sch.district_id FROM udise_staffreg
JOIN (
SELECT school_id,district_id,district_name FROM students_school_child_count
UNION ALL
SELECT off_key_id,district_id,district_name FROM udise_offreg
JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 GROUP BY off_sch.district_id";
     $query =  $this->db->query($sql);
      return $query->result();   
   }
    public function  emis_staff_BRTE_list($dist_id)
   {
     $sql ="SELECT COUNT(1) AS cnt,district_name,off_sch.district_id,teacher_code,teacher_name,(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr FROM udise_staffreg
JOIN (
SELECT school_id,district_id,district_name FROM students_school_child_count
UNION ALL
SELECT off_key_id,district_id,district_name FROM udise_offreg
JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 and  off_sch.district_id=".$dist_id." group by teacher_code";
     $query =  $this->db->query($sql);
      return $query->result();   
   }
   //staff district schoolwise count
    public function  emis_staff_district_school_count_details($districtid)
   {
     $sql ="SELECT district_id,district_name,school_id,school_name,block_name,udise_code,teach_tot as staff, nonteach_tot as nonstaff,totstaff as totstaff FROM students_school_child_count WHERE district_id = ".$districtid."  group by district_id,school_id";
     $query =  $this->db->query($sql);
      return $query->result();   
   }
   public function emis_staff_school_count_details($school_id)
   {
       $sql =" SELECT students_school_child_count.district_id,district_name,school_id,school_name,block_name,students_school_child_count.udise_code, udise_staffreg.teacher_name,gender,staff_JOIN,teacher_type,teacher_professional_qualify.professional,students_school_child_count.category as categoryname ,mbl_nmbr, email_id,type_teacher, teacher_type.category  FROM  students_school_child_count 
JOIN udise_staffreg on udise_staffreg.school_key_id = students_school_child_count.school_id
JOIN teacher_type on teacher_type.id = udise_staffreg.teacher_type
JOIN teacher_professional_qualify on teacher_professional_qualify.id= udise_staffreg.professional
WHERE school_id  = ".$school_id." ";

      $query =  $this->db->query($sql);
      return $query->result(); 
   }
   

            /************************ End *****************************/

            /************************ Student Search Details **********/

            /**********************************************
              * Students Search Details Timeline          *
              * VIT-sriram                                *
              * 26/04/2019                                *
              *********************************************/
           public function get_student_search($student_id)
           {
             $this->db->SELECT('c.school_name,a.unique_id_no,a.doj,b.class_studying_id,a.street_name,d.school_name as transfer_school ,e.school_name as admit_school,b.created_at,b.updated_at,b.school_doj')
                      ->FROM('students_child_detail a')
                      ->JOIN('students_transfer_history b','b.unique_id_no = a.unique_id_no','left')
                      ->JOIN('students_school_child_count c','c.school_id = a.school_id')
                      ->JOIN('students_school_child_count d','d.school_id = b.school_id_transfer')
                      ->JOIN('students_school_child_count e','e.school_id = b.school_id_admit')
                      
                      ->WHERE('a.unique_id_no',3302080100601121)
                      ->order_by('b.class_studying_id','DESC');
              $result = $this->db->get()->result();
                // print_r($result);die;
              return $result;
           }
           public function getstategovt($school_type,$cate_type)
        {
          
          $this->db->SELECT(' schoolnew_district.district_name,
   schoolnew_district.id,
   SUM(CASE WHEN class_studying_id=15 THEN 1 ELSE 0 END) AS prekg,
   SUM(CASE WHEN class_studying_id=14 THEN 1 ELSE 0 END) AS ukg,
   SUM(CASE WHEN class_studying_id=13 THEN 1 ELSE 0 END) AS lkg,
   SUM(CASE WHEN class_studying_id=1 THEN 1 ELSE 0 END) AS c1,
   SUM(CASE WHEN class_studying_id=2 THEN 1 ELSE 0 END) AS c2,
   SUM(CASE WHEN class_studying_id=3 THEN 1 ELSE 0 END) AS c3,
   SUM(CASE WHEN class_studying_id=4 THEN 1 ELSE 0 END) AS c4,
   SUM(CASE WHEN class_studying_id=5 THEN 1 ELSE 0 END) AS c5,
   SUM(CASE WHEN class_studying_id=6 THEN 1 ELSE 0 END) AS c6,
   SUM(CASE WHEN class_studying_id=7 THEN 1 ELSE 0 END) AS c7,
   SUM(CASE WHEN class_studying_id=8 THEN 1 ELSE 0 END) AS c8,
   SUM(CASE WHEN class_studying_id=9 THEN 1 ELSE 0 END) AS c9,
   SUM(CASE WHEN class_studying_id=10 THEN 1 ELSE 0 END) AS c10,
   SUM(CASE WHEN class_studying_id=11 THEN 1 ELSE 0 END) AS c11,
   SUM(CASE WHEN class_studying_id=12 THEN 1 ELSE 0 END) AS c12')
          ->FROM('students_child_detail')
          ->JOIN('schoolnew_basicinfo','schoolnew_basicinfo.school_id=students_child_detail.school_id')
          ->JOIN('schoolnew_district','schoolnew_district.id=schoolnew_basicinfo.district_id')
          ->WHERE('students_child_detail.created_at >=','2019-04-01 00:00:00')
          ->WHERE('st.created_at <=','NOW()');
        
          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
          $this->db->group_by('district_name'); 
          $query = $this->db->get();
       //   print_r($this->db->last_query());die;
          return $query->result();

        }
     //stud_admission_count
         public function stud_admission_count(){
            $sql ="SELECT 
            count(*) as noofstudents,
              students_school_child_count.district_name,
              students_school_child_count.district_id,
              SUM(Prkg_b+Prkg_g+Prkg_t) AS prekg,
              SUM(ukg_b+ukg_g+ukg_t) AS ukg,
              SUM(lkg_b+lkg_g+lkg_t) AS lkg,
              SUM(c1_b+c1_g+c1_t) AS c1,
              SUM(c2_b+c2_g+c2_t) AS c2,
              SUM(c3_b+c3_g+c3_t ) AS c3,
              SUM(c4_b+c4_g+c4_t) AS c4,
              SUM(c5_b+c5_g+c5_t) AS c5,
              SUM(c6_b+c6_g+c6_t) AS c6,
              SUM(c7_b+c7_g+c7_t) AS c7,
              SUM(c8_b+c8_g+c8_t) AS c8,
              SUM(c9_b+c9_g+c9_t) AS c9,
              SUM(c10_b+c10_g+c10_t) AS c10,
              SUM(c11_b+c11_g+c11_t) AS c11,
              SUM(c12_b+c12_g+c12_t) AS c12
              FROM students_school_child_count
             WHERE school_type_id=1 group by district_id";
              $query = $this->db->query($sql);
              return $query->result();
            }
      
      
      
      
      public function  emis_dist_school_prekg_student_JOINed($districtid){
        
         $sql ="SELECT 
            count(*) as noofstudents,
              students_school_child_count.district_name,
              students_school_child_count.school_name,
              SUM(Prkg_b+Prkg_g+Prkg_t) AS prekg,
              SUM(ukg_b+ukg_g+ukg_t) AS ukg,
              SUM(lkg_b+lkg_g+lkg_t) AS lkg,
              SUM(c1_b+c1_g+c1_t) AS c1,
              SUM(c2_b+c2_g+c2_t) AS c2,
              SUM(c3_b+c3_g+c3_t ) AS c3,
              SUM(c4_b+c4_g+c4_t) AS c4,
              SUM(c5_b+c5_g+c5_t) AS c5,
              SUM(c6_b+c6_g+c6_t) AS c6,
              SUM(c7_b+c7_g+c7_t) AS c7,
              SUM(c8_b+c8_g+c8_t) AS c8,
              SUM(c9_b+c9_g+c9_t) AS c9,
              SUM(c10_b+c10_g+c10_t) AS c10,
              SUM(c11_b+c11_g+c11_t) AS c11,
              SUM(c12_b+c12_g+c12_t) AS c12
              FROM students_school_child_count
             WHERE school_type_id=1 and district_id=".$districtid." group by block_id";
        
         $query = $this->db->query($sql);
                 return $query->result();
      }

            /**********************************
              * Staff Fixuation Districtwise  *
              * VIT-sriram                    *
              * 08/05/2019                    *
              *********************************/

            public function get_staff_fix_district()
            {
              $this->db->SELECT('a.district_name,a.district_id,count(a.school_id) as tot_school,count(mark_school) as mark_school')
                        ->FROM('students_school_child_count a')
                        ->JOIN('(SELECT count(school_key_id) as mark_school,school_key_id FROM teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->WHERE_in('a.school_type_id',array('1'))
                         ->WHERE_in('a.management',array('School Education Department School','Municipal School','Fully Aided School','Anglo Indian (Fully Aided) School','Oriental (Fully Aided) Sanskrit School','Oriental (Fully Aided) Arabic School'))
                         ->WHERE_in('a.cate_type',array('Middle School','Primary School'))
                        ->group_by('a.district_id')
                        ->order_by('a.district_name','ASC');
                $result = $this->db->get()->result();
                return $result;
            }

            public function get_staff_fix_schoolwise($dist_id)
            {
                $this->db->SELECT('a.school_name,a.school_id,a.udise_code,a.block_name,teach_status')
                         ->FROM('students_school_child_count a')
                         ->JOIN('(SELECT count(school_key_id) as mark_school,school_key_id,teach_status FROM teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->WHERE_in('a.school_type_id',array('1'))
                         ->WHERE_in('a.management',array('School Education Department School','Municipal School','Fully Aided School','Anglo Indian (Fully Aided) School','Oriental (Fully Aided) Sanskrit School','Oriental (Fully Aided) Arabic School'))
                         ->WHERE_in('a.cate_type',array('Middle School','Primary School'))
                         ->WHERE('a.district_id',$dist_id);
                $result = $this->db->get()->result();
                return $result;
            }

             public function get_staff_fix_district_dse()
            {
              $this->db->SELECT('a.district_name,a.block_id,a.district_id,count(a.school_id) as tot_school,count(mark_school) as mark_school')
                        ->FROM('students_school_child_count a')
                        ->JOIN('(SELECT count(school_key_id) as mark_school,school_key_id FROM teacher_panel2 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                         ->WHERE_in('a.school_type_id',array('1'))
                         ->WHERE_in('a.management',array('School Education Department School','Municipal School'))
                         ->WHERE_in('a.cate_type',array('High School','Higher Secondary School'))
                        ->group_by('a.district_id')
                        ->order_by('a.district_name','ASC');
                $result = $this->db->get()->result();
                return $result;
            }

            public function get_staff_fix_schoolwise_dse($dist_id)
            {
                $this->db->SELECT('a.school_name,a.school_id,a.udise_code,a.block_name,status,teach_status,count(mark_school) as mark_school,
                (CASE mark_school WHEN 1 THEN 1 ELSE  
                CASE mark_school1 WHEN 1 THEN 1 ELSE 0 END END) as mm,count(mark_school1) as mark_school1')
                         ->FROM('students_school_child_count a')
                         ->JOIN('(SELECT count(school_key_id) as mark_school,school_key_id,status FROM teacher_panel4 group by school_key_id) as b','b.school_key_id = a.school_id ','left')
                          ->JOIN('(SELECT count(school_key_id) as mark_school1,school_key_id,teach_status FROM teacher_panel2 group by school_key_id) as c','c.school_key_id = a.school_id ','left')
                       ->WHERE_in('a.school_type_id',array('1'))
                         ->WHERE_in('a.management',array('School Education Department School','Municipal School'))
                         ->WHERE_in('a.cate_type',array('High School','Higher Secondary School'))
                         ->WHERE('a.district_id',$dist_id)
                         ->group_by('a.school_id');

                $result = $this->db->get()->result();
               // print_r($this->db->last_query());die;
                return $result;
            }
      
            /****************************** End ************************/

/**
     * Get School Name
     * VIT-sriram
     * 16/05/2019
     ****/

   public function get_schools($where_condition)
   {
        
      $this->db->SELECT('school_name,udise_code,district_id,block_id,edu_dist_id')
               ->FROM('students_school_child_count');
        if($where_condition){
        $this->db->WHERE($where_condition);}
        $result = $this->db->get()->result();
        return $result; 
    }
            public function emis_staff_stud_district_details($district_id,$block_id)
      {
      if($district_id!="")
      {
      $sql="
        select aa.district_id,aa.district_name,aa.stud,aa.student,aa.students,aa.block_name,aa.school_name,aa.udise_code,aa.category,aa.school_type,bb.SGT,bb.BT,bb.PG,(aa.stud/bb.SGT)as studsgt,(aa.student/bb.BT)as studBT,(aa.students/bb.PG) as studPG  from 
        (SELECT students_school_child_count.district_id,school_id,district_name,block_name,school_name,udise_code,category,school_type,sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as stud , sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as student,sum(c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)as students FROM students_school_child_count 
        where students_school_child_count.district_id= ".$district_id." and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
        GROUP BY students_school_child_count.school_id) aa
        left join 
        (select students_school_child_count.district_id,school_id,udise_staffreg.udise_code,udise_staffreg.school_key_id,sum(if(teacher_type = 41,1,0))as SGT,sum(if(teacher_type = 11,1,0)) as BT,sum(if(teacher_type = 36,1,0)) as PG from  udise_staffreg  JOIN students_school_child_count on students_school_child_count.school_id= udise_staffreg.school_key_id  
        where students_school_child_count.district_id= ".$district_id."  and students_school_child_count.school_type_id !=3 and students_school_child_count.school_type_id != 5
        group by students_school_child_count.school_id ) bb 
        on  aa.school_id = bb.school_id  ";
      
      }
      else
      {
      $sql="SELECT aa.district_id,aa.district_name,aa.stud,aa.student,aa.students,bb.SGT,bb.BT,bb.PG,(aa.stud/bb.SGT)as studsgt,(aa.student/bb.BT)as studBT,(aa.students/bb.PG) as studPG FROM 
          (SELECT students_school_child_count.district_id,school_id,district_name,block_name,school_name,udise_code,category,school_type,sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as stud , sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as student,sum(c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)as students FROM students_school_child_count 
          WHERE  students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
          GROUP BY students_school_child_count.district_id) aa
          left JOIN 
          (SELECT students_school_child_count.district_id,school_id,udise_staffreg.udise_code,udise_staffreg.school_key_id,sum(if(teacher_type = 41,1,0))as SGT,sum(if(teacher_type = 11,1,0)) as BT,sum(if(teacher_type = 36,1,0)) as PG FROM  udise_staffreg  JOIN students_school_child_count on students_school_child_count.school_id= udise_staffreg.school_key_id  
          WHERE students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
          group by students_school_child_count.district_id) bb 
          on  aa.district_id = bb.district_id";
      }
      

        
         $query = $this->db->query($sql);
                 return $query->result();
      }
      
      
      
      public function  emis_staff_stud_dist_school_details($districtid)
      {
        $sql="
        SELECT aa.district_id,aa.district_name,aa.stud,aa.student,aa.students,aa.block_name,aa.school_name,aa.udise_code,aa.category,aa.school_type,bb.SGT,bb.BT,bb.PG,(aa.stud/bb.SGT)as studsgt,(aa.student/bb.BT)as studBT,(aa.students/bb.PG) as studPG FROM 
        (SELECT students_school_child_count.district_id,school_id,district_name,block_name,school_name,udise_code,category,school_type,sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as stud , sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as student,sum(c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)as students FROM students_school_child_count 
        WHERE students_school_child_count.district_id= ".$districtid." 
        and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
        GROUP BY students_school_child_count.school_id) aa
        left JOIN 
        (SELECT students_school_child_count.district_id,school_id,udise_staffreg.udise_code,udise_staffreg.school_key_id,sum(if(teacher_type = 41,1,0))as SGT,sum(if(teacher_type = 11,1,0)) as BT,sum(if(teacher_type = 36,1,0)) as PG FROM  udise_staffreg  JOIN students_school_child_count on students_school_child_count.school_id= udise_staffreg.school_key_id  
        WHERE students_school_child_count.district_id= ".$districtid." 
        and students_school_child_count.school_type_id !=3 and  students_school_child_count.school_type_id != 5
        group by students_school_child_count.school_id  ) bb 
        on  aa.school_id = bb.school_id  ";
                  $query = $this->db->query($sql);
                 return $query->result();
      }
      public function emis_staff_fixa_tot_school_details()
      {
        
        $sql= "SELECT sum(teacher_panel2.elig_tot) as elig_tot2,sum(sanc_tot)as sanc_tot,sum(avail_tot)as avail_tot,sum(surp_w_tot)as surp_w_tot,sum(surp_wo_tot)as surp_wo_tot,sum(need_tot)as need_tot,sum(teach_status)as teach_status FROM teacher_panel2 
JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";

        $query = $this->db->query($sql);
                 return $query->result();
      }
      public function staff_eligible()
      {
        $sql="SELECT 
         sum(elig_sg) as sg,sum(elig_sci)as sci,sum(elig_mat)as mat,sum(elig_eng)as eng,sum(elig_tam)as tam,sum(elig_soc)as soc
          FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
                $query = $this->db->query($sql);
                 return $query->result();
      }
      public function staff_sanct()
      {
        $sql="SELECT 
          sum(sanc_sg)as sg,sum(sanc_sci)as sci,sum(sanc_mat)as mat,sum(sanc_eng)as eng,sum(sanc_tam)as tam,sum(sanc_soc)as soc
                  FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
                $query = $this->db->query($sql);
                 return $query->result();
      }
      
      
      
      public function staff_avail()
      {
        $sql="SELECT 
       sum(avail_sg)as sg,sum(avail_sci)as sci,sum(avail_mat)as mat,sum(avail_eng)as eng,sum(avail_tam)as tam,sum(avail_soc)as soc
        FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
                $query = $this->db->query($sql);
                 return $query->result();
      }
      
      public function staff_need()
      {
        $sql="SELECT 
       sum(need_sg)as sg,sum(need_sci)as sci,sum(need_mat)as mat,sum(need_eng)as eng,sum(need_tam)as tam,sum(need_soc)as soc
        FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
      }
      
      
      public function staff_surpwith() 
      {
        $sql="
      SELECT  sum(surp_w_sg)as sg,sum(surp_w_sci)as sci,sum(surp_w_mat)as mat,sum(surp_w_eng)as eng,sum(surp_w_tam)as tam,sum(surp_w_soc)as soc
            FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
      }


            public function staff_surpwithout()
      {
        $sql="
        SELECT sum(surp_wo_sg)as sg,sum(surp_wo_sci)as sci,sum(surp_wo_mat)as mat,sum(surp_wo_eng)as eng,sum(surp_wo_tam)as tam,sum(surp_wo_soc)as soc
      FROM teacher_panel2 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id
WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
      }
      
      
      public function emis_staff_eligiblepost()
      {
        $sql= "SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, elig_sg,elig_sci,elig_mat,elig_eng,elig_tam,elig_soc,elig_tot
         FROM students_school_child_count
         JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
      
      }
      
      public function emis_staff_sanctionpost()
      {
        $sql= "SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category,sanc_sg, sanc_sci, sanc_mat, sanc_eng, sanc_tam, sanc_soc, sanc_tot
         FROM students_school_child_count
        JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
        
      }
      
      public function emis_staff_availpost()
      {
        $sql= "SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, avail_sg, avail_sci, avail_mat, avail_eng, avail_tam, avail_soc, avail_tot
         FROM students_school_child_count
        JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
        
      }
      
      public function emis_staff_needpost()
      {
         
      $sql= "SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category,  need_sg, need_sci, need_mat, need_eng, need_tam, need_soc, need_tot
         FROM students_school_child_count
        JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
        
      }
      
      public function emis_staff_surpwithpost()
      {
         
      $sql= "
      SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, surp_w_sg, surp_w_sci, surp_w_mat, surp_w_eng, surp_w_tam, surp_w_soc, surp_w_tot
         FROM students_school_child_count
      JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
        
      }
      public function emis_staff_surpwithoutpost()
      {
         
      $sql= "SELECT district_name,school_id,students_school_child_count.district_id,block_name,school_name,udise_code,category, surp_wo_sg, surp_wo_sci, surp_wo_eng, surp_wo_mat, surp_wo_tam, surp_wo_soc, surp_wo_tot
         FROM students_school_child_count
        JOIN teacher_panel2 on teacher_panel2.school_key_id = students_school_child_count.school_id
         WHERE students_school_child_count.sch_directorate_id in (2,3,16,18,27,29,32,34,42)";
        $query = $this->db->query($sql);
                 return $query->result();
        
      }

        public function emis_dee_teacher_profile()
      {
        $SQL="SELECT sc.district_name,sum((teach_hm_fmle+teach_hm_mle) and cate_type='Middle School') as HM_middle,
d.middle_hm as dee_hm_middle,
sum((teach_hm_fmle+teach_hm_mle) and cate_type='Primary School') as HM_primary,
d.primary_hm as dee_hm_pri,
sum(teach_bt_fmle+teach_bt_mle) as BT,
d.bt_assistant as dee_BT,
sum(teach_sg_fmle+teach_sg_mle) as SG,
d.sec_grade_teach as dee_SG,
sum(teach_pet_fml+teach_pet_ml) as PET,
d.phy_edu_teach as dee_PET,
sum(sub_tam) as tam_pand,
d.tamil_pandit as dee_tam_pand,
sum(teach_voc_ml+teach_voc_fml) as voc,
d.prevoc_teach as dee_voc,
sum(teach_pet_fml+teach_pd_ml) as PD
FROM students_school_child_count sc 
JOIN teacher_profile_count tr on tr.school_key_id=sc.school_id 
JOIN dee_teachers d on d.district=sc.district_name
 WHERE sc.management in ('School Education Department School','Municipal School','Fully Aided School','Anglo Indian (Fully Aided) School','Oriental (Fully Aided) Sanskrit School','Oriental (Fully Aided) Arabic School') and sc.cate_type in ('Middle School','Primary School') and school_type_id in(1,2) group by sc.district_name"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();
       

      }
      public function emis_dee_HM_middle()
      {

        $SQL="SELECT sum(teach_hm_mle+teach_hm_fmle) as HM_Middle FROM teacher_profile_count
 JOIN students_school_child_count on students_school_child_count.school_id=teacher_profile_count.school_key_id
WHERE students_school_child_count.cate_type='Middle School' AND students_school_child_count.sch_directorate_id in (2,3,16,18,42) group by district_id;"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();
       

      }

            
            function schemeedureport($WHERE,$group) {
                
                $SQL="SELECT 
                      freescheme.fscheme_id,
                        freescheme.scheme_name,
                        SUM(CASE WHEN student_count.class_id BETWEEN appli_lowclass AND appli_highclass THEN 1 ELSE 0 END) AS scheme_count,
                        school_id,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,school_name
                    FROM student_count
                    JOIN (SELECT 
                      schoolnew_freescheme.id as fscheme_id,
                      schoolnew_freescheme.scheme_name,
                        MIN(schoolnew_schemeapplicable.appli_lowclass) as appli_lowclass,
                        MAX(schoolnew_schemeapplicable.appli_highclass) as appli_highclass,
                        schoolnew_freescheme.hill_restrict
                    FROM schoolnew_freescheme
                    JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
                    WHERE schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2 AND schoolnew_freescheme.id!=14
                    GROUP BY fscheme_id) AS freescheme ON student_count.class_id BETWEEN freescheme.appli_lowclass AND freescheme.appli_highclass
                    AND (hill_restrict=hill_frst OR hill_restrict=0)
                    JOIN baseapp_class_studying ON baseapp_class_studying.id=student_count.class_id
                    WHERE student_count.school_type_id IN (1,2) ".$WHERE."
                    GROUP BY fscheme_id".$group.";";
                
                //echo($SQL);die();
                $query = $this->db->query($SQL);
                return $query->result();
                
                
            }
              public function staff_fixtation_sub_wise()
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(vac_sg) as vac_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg,sum(vac_tam) as vac_tamil,sum(vac_eng) as vac_eng,sum(vac_sci) as vac_sci,sum(vac_mat) as vac_mat,sum(vac_soc) as vac_soc
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND school_type_id=1";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }
    
     public function desgination()
   {
    $sql="select  id, type_teacher, category from teacher_type where category =1";
    $query =  $this->db->query($sql);
      return $query->result();
   }

         public function staff_fixtation_sub_wise_dse()
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(vac_sg) as vac_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg,sum(vac_tam) as vac_tamil,sum(vac_eng) as vac_eng,sum(vac_sci) as vac_sci,sum(vac_mat) as vac_mat,sum(vac_soc) as vac_soc
FROM
    students_school_child_count
LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
WHERE 
 students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') AND school_type_id=1;";
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }
       /* public function staff_fixtation_sub_wise_pg()
      {

        $SQL="SELECT sum(elig_tam) as eli_tamil,sum(elig_eng) as eli_eng,sum(elig_sci) as eli_sci,sum(elig_mat) as eli_mat,sum(elig_soc) eli_soc,sum(sanc_tam) as sanc_tam,sum(sanc_eng) as sanc_eng,sum(sanc_sci) as sanc_sci,sum(sanc_mat) as sanc_mat,sum(sanc_soc) sanc_soc,sum(avail_tam) as avail_tam,sum(avail_eng) as avail_eng,sum(avail_sci) as avail_sci,sum(avail_mat) as avail_mat,sum(avail_soc) avail_soc,sum(surp_w_tam) as surp_w_tam,sum(surp_w_eng) as surp_w_eng,sum(surp_w_sci) as surp_w_sci,sum(surp_w_mat) as surp_w_mat,sum(surp_w_soc) surp_w_soc,sum(surp_wo_tam) as surp_wo_tam,sum(surp_wo_eng) as surp_wo_eng,sum(surp_wo_sci) as surp_wo_sci,sum(surp_wo_mat) as surp_wo_mat,sum(surp_wo_soc) surp_wo_soc,sum(need_tam) as need_tam,sum(need_eng) as need_eng,sum(need_sci) as need_sci,sum(need_mat) as need_mat,sum(need_soc) need_soc,sum(elig_sg) as elig_sg,sum(sanc_sg) as sanc_sg ,sum(avail_sg) as avail_sg,sum(need_sg) as need_sg,sum(surp_w_sg) as surp_w_sg,sum(surp_wo_sg) as surp_wo_sg
FROM teacher_panel2 "; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
      
       return $query->result();

      }*/
        public function staff_transfer_req()
      {

        $SQL="SELECT  students_school_child_count.district_name,students_school_child_count.district_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when desgnation in(28) then 1 else 0 end) as HM_mid,
  sum(case when desgnation in(29) then 1 else 0 end) as HM_pri, 
sum(case when desgnation not in(11,41,36,28,29) or desgnation is null then 1 else 0 end) as Oth
 FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
group by students_school_child_count.district_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
       public function staff_transfer_req_block($district_id)
      {

        $SQL="SELECT  students_school_child_count.block_name,students_school_child_count.block_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when desgnation in(28) then 1 else 0 end) as HM_mid,
sum(case when desgnation in(29) then 1 else 0 end) as HM_pri, 
sum(case when desgnation not in(11,41,36,28,29) or desgnation is null then 1 else 0 end) as Oth
 FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.district_id=".$district_id." and  students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
group by students_school_child_count.block_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
      
      }
         public function staff_transfer_req_teacher($block_id)
      {

        $SQL="SELECT  (SELECT max(dates) FROM teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as DOR,teacher_transfer_appli.gender,teacher_transfer_appli.doj_pr,teacher_transfer_appli.doj_pr_schol,teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,
(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=teacher_transfer_appli.subject LIMIT 1) AS otn,
(SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_transfer_appli.desgnation LIMIT 1) AS otn1,
         (SELECT description FROM teacher_trans_priority WHERE teacher_trans_priority.id=teacher_transfer_appli.priority_claimed) AS PC,
            (SELECT block2 FROM teacher_panel_schools WHERE teacher_panel_schools.school_id=students_school_child_count.school_id LIMIT 1) as block
 FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.block_id=".$block_id."  and   students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('Primary School', 'Middle School') AND teacher_transfer_appli.transfer=1
group by teacher_transfer_appli.teacher_id";
// print_r($SQL);
// die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function staff_transfer_dse_req()
      {

        $SQL="SELECT  students_school_child_count.district_name,students_school_child_count.district_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when desgnation in(26) then 1 else 0 end) as HS, 
 sum(case when desgnation in(27) then 1 else 0 end) as HSS,
 sum(case when desgnation not in(11,41,36,26,27) or desgnation is null then 1 else 0 end) as Oth
 FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School') and teacher_transfer_appli.transfer=1
group by students_school_child_count.district_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
     //  print_r($this->db->last_query());
       return $query->result();
       

      }
       public function staff_transfer_dse_req_block($district_id)
      {

        $SQL="SELECT  students_school_child_count.block_name,students_school_child_count.block_id,
sum(case when desgnation in (41)  then 1 else 0 end) as SG,
sum(case when desgnation in(11) and subject=48 then 1 else 0 end) as BT_tam,
sum(case when desgnation in(11) and subject=46 then 1 else 0 end) as BT_eng,
sum(case when desgnation in(11) and subject=3 then 1 else 0 end) as BT_mat,
sum(case when desgnation in(11) and subject=7 then 1 else 0 end) as BT_sci,
sum(case when desgnation in(11) and subject=8 then 1 else 0 end) as BT_soc,
sum(case when desgnation in(36) then 1 else 0 end) as PG,
sum(case when desgnation in(26) then 1 else 0 end) as HS, 
sum(case when desgnation in(27) then 1 else 0 end) as HSS,
sum(case when desgnation not in(11,41,36,26,27) or desgnation is null then 1 else 0 end) as Oth
 FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.district_id=".$district_id." and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School')
 and teacher_transfer_appli.transfer=1 group by students_school_child_count.block_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
         public function staff_transfer_dse_req_teacher($district_id)
      {

        $SQL="SELECT  (SELECT max(dates) FROM teacher_regu_dates WHERE teacher_regu_dates.teacher_id=teacher_transfer_appli.teacher_id LIMIT 1) as DOR,teacher_transfer_appli.gender,teacher_transfer_appli.doj_pr,teacher_transfer_appli.doj_pr_schol,teacher_transfer_appli.teacher_id,teacher_transfer_appli.name,students_school_child_count.school_name,students_school_child_count.cate_type,
(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=teacher_transfer_appli.subject LIMIT 1) AS otn,
(SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_transfer_appli.desgnation LIMIT 1) AS otn1,
         (SELECT description FROM teacher_trans_priority WHERE teacher_trans_priority.id=teacher_transfer_appli.priority_claimed
                                ) AS PC,
                                   (SELECT block2 FROM teacher_panel_schools WHERE teacher_panel_schools.school_id=students_school_child_count.school_id LIMIT 1) as block
 FROM teacher_transfer_appli  
  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
WHERE students_school_child_count.district_id=".$district_id."  and students_school_child_count.management in ('School Education Department School','Municipal School') and students_school_child_count.cate_type in ('High School', 'Higher Secondary School')
and teacher_transfer_appli.transfer=1 group by teacher_transfer_appli.teacher_id"; 
//print_r($SQL);
//die();
       $query = $this->db->query($SQL);
       return $query->result();
       

      }
        public function emis_dse_teacher_profile()
      {

        $SQL="SELECT sc.district_name,
sum((teach_hm_fmle+teach_hm_mle) and cate_type='Higher Secondary School') as emis_hrd_hm,
d.filled_hrsehm as dse_hrs_hm,
sum((teach_hm_fmle+teach_hm_mle) and cate_type='High School') as emis_hs_hm,
d.filled_hshm as dse_hs_hm,
sum(teach_bt_fmle+teach_bt_mle) as emis_bt,
d.filled_bt as dse_bt,
sum(teach_sg_fmle+teach_sg_mle) as emis_sg,
d.filled_sgt as dse_sg,
sum(teach_pg_mle+teach_pg_fmle) as emis_pg,
d.filled_pg as dse_pg,
sum(teach_pet_fml+teach_pet_ml) as PET,
d.filled_pet as dse_PET,
sum(teach_voc_ml+teach_voc_fml) as voc,
d.filled_voc_inst as dse_voc,
sum(teach_pd_ml+teach_pd_fml) as PD
 FROM students_school_child_count sc JOIN teacher_profile_count tr on tr.school_key_id=sc.school_id
 JOIN dse_teachers d on d.district=sc.district_name
 WHERE sc.management in ('School Education Department School','Municipal School') and sc.cate_type in ('High School','Higher Secondary School') and school_type_id=1 group by sc.district_name";

       $query = $this->db->query($SQL);
      
       return $query->result();
       

      }
    /*DSE total surplus count  by bala */
    public function emis_total_surplus_teacher()
    {
     $SQL="SELECT count(a.id) as total FROM teacher_transfer_appli a 
JOIN teacher_panel_schools b on a.school_key_id=b.school_id 
JOIN teacher_type c on a.desgnation=c.id
JOIN teacher_subjects d on a.subject=d.id
WHERE surplus=1 and b.dept='DSE'";
       $query = $this->db->query($SQL);
       return $query->result();
    }
    
    public function emis_total_surplus_teacher_type()
    {
        $sql= "SELECT 
    sum(case when desgnation in (41)  then 1 else 0 end) as SG,
          sum(case when desgnation in(11) then 1 else 0 end) as BT,
        sum(case when desgnation in(36) then 1 else 0 end) as PG,
    sum(case when desgnation in(26) then 1 else 0 end) as high_hm,
sum(case when desgnation in(27) then 1 else 0 end) as hrs_hm,
school_id,count(teacher_transfer_appli.id) as total FROM teacher_transfer_appli  
 JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id WHERE teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33) and teacher_transfer_appli.desgnation in(41,11,36,26,27)";
        $query = $this->db->query($sql);
                 return $query->result();
    
    } 
    public function emis_total_surplus_teacher_highhm()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation in(26) group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_hrshm()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation in(27) group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_pg()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
     and teacher_transfer_appli.surplus=1
     
and teacher_transfer_appli.desgnation=36 group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_bt()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects,udise_staffreg.staff_dob
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation=11  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_sg_dse()
    {
     $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(1,5,15,17,19,20,21,22,23,24,26,31,33)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation=41  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    
  /* End of the DEEE surplus module */
/*DEE total surplus count  by bala */
    public function emis_total_surplus_teacher_dee()
    {
     $SQL="SELECT count(teacher_transfer_appli.id) as total FROM teacher_transfer_appli  
 JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id WHERE teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29)";
       $query = $this->db->query($SQL);
       return $query->result();
    }
    
    public function emis_total_surplus_teacher_type_dee()
    {
        $sql= "SELECT 
    sum(case when desgnation in (41)  then 1 else 0 end) as SG,
          sum(case when desgnation in(11) then 1 else 0 end) as BT,
        sum(case when desgnation in(36) then 1 else 0 end) as PG,
    sum(case when desgnation in(29) then 1 else 0 end) as Primary_HM,
sum(case when desgnation in(28) then 1 else 0 end) as Middle_HM,
school_id,count(teacher_transfer_appli.id) as total FROM teacher_transfer_appli  
 JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
 JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id WHERE teacher_transfer_appli.surplus=1 and  schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42) and teacher_transfer_appli.desgnation in(41,11,36,28,29)";
        $query = $this->db->query($sql);
                 return $query->result();
    
    } 
    public function emis_total_surplus_teacher_phm_dee()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       WHERE schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation in(29)  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
     public function emis_total_surplus_teacher_mhm_dee()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
       WHERE schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation in(28) group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_pg_dee()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
     and teacher_transfer_appli.surplus=1
     
and teacher_transfer_appli.desgnation=36  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_bt_dee()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation=11  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_total_surplus_teacher_sg_dee()
    {
      $sql= "SELECT  students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,students_school_child_count.udise_code,udise_staffreg.teacher_name,udise_staffreg.staff_JOIN,udise_staffreg.staff_pJOIN,udise_staffreg.staff_psJOIN,teacher_subjects.subjects
FROM teacher_transfer_appli  
JOIN students_school_child_count on  students_school_child_count.school_id=teacher_transfer_appli.school_key_id
JOIN udise_staffreg on udise_staffreg.school_key_id=teacher_transfer_appli.school_key_id and udise_staffreg.teacher_code=teacher_transfer_appli.teacher_id
JOIN teacher_subjects on udise_staffreg.appointed_subject=teacher_subjects.id
LEFT JOIN teacher_type ON udise_staffreg.teacher_type=teacher_type.id
JOIN schoolnew_school_department on schoolnew_school_department.id=students_school_child_count.sch_directorate_id
         WHERE schoolnew_school_department.id in(2,3,16,18,27,29,32,34,42)
     and teacher_transfer_appli.surplus=1
and teacher_transfer_appli.desgnation=41  group by teacher_transfer_appli.teacher_id";
        $query = $this->db->query($sql);
                 return $query->result();
      
    }
    public function emis_PG_fixation($sql)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.district_name,students_school_child_count.district_id,".$sql." FROM teacher_panel4
       JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id
        group by district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
  function getsubjects(){
       $this->db->SELECT('*'); 
       $this->db->FROM('teacher_panel_subject');
       $this->db->WHERE('visible',1); 
       $query =  $this->db->get();
       return $query->result();
    }

    
    
    
     public function get_state_school_dee()
    {
     // print_r($sql);
        $sql="SELECT management,count(*) as s_cnt FROM students_school_child_count WHERE sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by management";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dee($mang)
    {
     // print_r($sql);
        $sql="SELECT district_name,count(*) as s_cnt,management FROM students_school_child_count WHERE management='".$mang."' and sch_directorate_id in (2,3,16,18,27,29,32,34,42) group by district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dee($dist,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id WHERE management='".$mang."' and sch_directorate_id in (2,3,16,18,27,29,32,34,42) and district_name='".$dist."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dse()
    {
     // print_r($sql);
        $sql="SELECT management,count(*) as s_cnt FROM students_school_child_count WHERE sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) group by management";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dse($mang)
    {
     // print_r($sql);
        $sql="SELECT district_name,count(*) as s_cnt,management FROM students_school_child_count WHERE management='".$mang."' and sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) group by district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dse($dist,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id WHERE management='".$mang."' and sch_directorate_id in (1,5,15,17,19,20,21,22,23,24,26,31,33) and district_name='".$dist."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_dms()
    {
     // print_r($sql);
        $sql="SELECT management,count(*) as s_cnt FROM students_school_child_count WHERE sch_directorate_id in (28) group by management";
        $query = $this->db->query($sql);
       //  print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_dms($mang)
    {
     // print_r($sql);
        $sql="SELECT district_name,count(*) as s_cnt,management FROM students_school_child_count WHERE management='".$mang."' and sch_directorate_id in (28) group by district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_dms($dist,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id WHERE management='".$mang."' and sch_directorate_id in (28) and district_name='".$dist."' group by school_id;";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
      public function get_state_school_others()
    {
     // print_r($sql);
        $sql="SELECT management,count(*) as s_cnt FROM students_school_child_count WHERE sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) group by management";
        $query = $this->db->query($sql);
       //  print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_district_others($mang)
    {
     // print_r($sql);
        $sql="SELECT district_name,count(*) as s_cnt,management FROM students_school_child_count WHERE management='".$mang."' and sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) group by district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
     public function get_state_school_wise_others($dist,$mang)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.management,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,school_type,(select teacher_name from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as teacher_name,(select mbl_nmbr from udise_staffreg where udise_staffreg.school_key_id=students_school_child_count.school_id and teacher_type=29 limit 1) as mbl_nmbr FROM students_school_child_count left JOIN udise_staffreg on udise_staffreg.school_key_id=students_school_child_count.school_id WHERE management='".$mang."' and sch_directorate_id in (4,6,7,8,9,10,11,12,13,14,25,30,35,36,37,38,39,40,41,43,44,45,46,47,48) and district_name='".$dist."' group by school_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
    
  /* End of the DEEE surplus module */

    //dse staff fixation summary by raju
  public function  emis_staff_fixa_tot_school_details_dse()
  {
    $sql="  SELECT 
    sum(elig_1+elig_2+elig_3+elig_4+elig_5+elig_6+elig_7+elig_8+elig_10+elig_11+elig_12+elig_16+elig_17+elig_18+elig_19+elig_20+elig_21) as elig,
    sum(sanc_1+sanc_2+sanc_3+sanc_4+sanc_5+sanc_6+sanc_7+sanc_8+sanc_10+sanc_11+sanc_12+sanc_16+sanc_17+sanc_18+sanc_19+sanc_20+sanc_21)as sanc,
    sum(avail_1+avail_2+avail_3+avail_4+avail_5+avail_6+avail_7+avail_8+avail_10+avail_11+avail_12+avail_16+avail_17+avail_18+avail_19+avail_20+avail_21)as avail,
    sum(need_1+need_2+need_3+need_4+need_5+need_6+need_7+need_8+need_10+need_11+need_12+need_16+need_17+need_18+need_19+need_20+need_21)as need,
     sum(swp_1+ swp_2+swp_3+swp_4+swp_5+swp_6+swp_7+swp_8+swp_10+swp_11+swp_12+swp_16+swp_17+swp_18+swp_19+swp_20+swp_21)as swp,
    sum(swop_1+swop_2+swop_3+swop_4+swop_5+swop_6+swop_7+swop_8+swop_10+swop_11+swop_12+swop_16+swop_17+swop_18+swop_19+swop_20+swop_21)as swop,
     sum(vac_high_tot)as vac , 
    SUM(elig_sci + elig_mat + elig_eng + elig_tam + elig_soc) AS bt_eli,
    SUM(sanc_sci + sanc_mat + sanc_eng + sanc_tam + sanc_soc) AS bt_sanc,
    SUM(avail_sci + avail_mat + avail_eng + avail_tam + avail_soc) AS bt_avail,
    SUM(need_sci + need_mat + need_eng + need_tam + need_soc) AS bt_need,
    SUM(surp_w_sci + surp_w_mat + surp_w_eng + surp_w_tam + surp_w_soc) AS bt_surp,
    SUM(surp_wo_sci + surp_wo_mat + surp_wo_eng + surp_wo_tam + surp_wo_soc) AS bt_surpwo,
    SUM(elig_sg) AS sg_eligible,
    SUM(sanc_sg) AS sg_sanctioned,
    SUM(avail_sg) AS sg_available,
    SUM(need_sg) AS sg_need,
    SUM(surp_w_sg) sg_sws,
    SUM(surp_wo_sg) AS sg_swos
     FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
     $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
    }
     public function dsestaff_eligible()
   {
     $sql=" SELECT   sum(elig_1) as tamil,sum(elig_2) as english ,sum(elig_3) as physics,sum(elig_4) as chemistry,sum(elig_5)as biology,
        sum(elig_6) as botany,sum(elig_7) as zoology ,sum(elig_8) as statistics ,
        sum(elig_10) as geography,sum(elig_11) as microbiology,sum(elig_12)as biochemistry,
        sum(elig_16) as mathematics ,sum(elig_17) as homescience ,sum(elig_18) as history,sum(elig_19) as economics ,sum(elig_20) as politicalscience ,sum(elig_21)as commerce,
                sum(elig_sg)as sg ,sum(elig_soc)as ss ,sum(elig_sci)as sc, sum(elig_tam) as tam,sum(elig_eng) as eng,sum(elig_mat) as mat,sum(elig_mhm) as mhm,sum(elig_hhm) as hhm,sum(elig_phm)as phm
          FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
         $query = $this->db->query($sql);
        // print_r($this->db->last_query());
            return $query->result();
   }
   public function dsestaff_sanct()
   {
      $sql=" SELECT   sum(sanc_1) as tamil,sum(sanc_2) as english ,sum(sanc_3) as physics,sum(sanc_4) as chemistry,sum(sanc_5)as biology,
        sum(sanc_6) as botany,sum(sanc_7) as zoology ,sum(sanc_8) as statistics ,
        sum(sanc_10) as geography,sum(sanc_11) as microbiology,sum(sanc_12)as biochemistry,
        sum(sanc_16) as mathematics ,sum(sanc_17) as homescience ,sum(sanc_18) as history,sum(sanc_19) as economics ,sum(sanc_20) as politicalscience ,sum(sanc_21)as commerce,sum(sanc_sg)as sg ,sum(sanc_soc)as ss ,sum(sanc_sci)as sc,sum(sanc_hhm) as hhm, sum(sanc_tam) as tam,sum(sanc_eng) as eng,sum(sanc_mat) as mat
         FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
     $query = $this->db->query($sql);
    // print_r($this->db->last_query());
        return $query->result();
   }
   public function dsestaff_avail()
   {
      $sql=" SELECT sum(avail_1) as tamil,sum(avail_2) as english ,sum(avail_3) as physics,sum(avail_4) as chemistry,sum(avail_5)as biology,
        sum(avail_6) as botany,sum(avail_7) as zoology ,sum(avail_8) as statistics ,
        sum(avail_10) as geography,sum(avail_11) as microbiology,sum(avail_12)as biochemistry,
        sum(avail_16) as mathematics ,sum(avail_17) as homescience ,sum(avail_18) as history,sum(avail_19) as economics ,sum(avail_20) as politicalscience ,sum(avail_21)as commerce,sum(avail_sg)as sg ,sum(avail_soc)as ss ,sum(avail_sci)as sc,sum(avail_hhm) as hhm, sum(avail_tam) as tam,sum(avail_eng) as eng,sum(avail_mat) as mat,sum(avail_mhm) as mhm,sum(avail_phm)as phm
             FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
      $query = $this->db->query($sql);
      // print_r($this->db->last_query());
          return $query->result();
   }
   public function dsestaff_need()
   {
     $sql=" SELECT sum(need_1) as tamil,sum(need_2) as english ,sum(need_3) as physics,sum(need_4) as chemistry,sum(need_5)as biology,
      sum(need_6) as botany,sum(need_7) as zoology ,sum(need_8) as statistics,
      sum(need_10) as geography,sum(need_11) as microbiology,sum(need_12)as biochemistry,
      sum(need_16) as mathematics ,sum(need_17) as homescience ,sum(need_18) as history,sum(need_19) as economics ,sum(need_20) as politicalscience ,sum(need_21)as commerce,sum(need_sg)as sg ,sum(need_soc)as ss ,sum(need_sci)as sc,sum(need_hhm) as hhm, sum(need_tam) as tam,sum(need_eng) as eng,sum(need_mat) as mat 
             FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
        $query = $this->db->query($sql);
      // print_r($this->db->last_query());
            return $query->result(); 
   }
   public function dsestaff_surpwith()
   {
      $sql=" SELECT  sum(swp_1) as tamil,sum(swp_2) as english ,sum(swp_3) as physics,sum(swp_4) as chemistry,sum(swp_5)as biology,
        sum(swp_6) as botany,sum(swp_7) as zoology ,sum(swp_8) as statistics ,
        sum(swp_10) as geography,sum(swp_11) as microbiology,sum(swp_12)as biochemistry,
        sum(swp_16) as mathematics ,sum(swp_17) as homescience ,sum(swp_18) as history,sum(swp_19) as economics ,sum(swp_20) as politicalscience ,sum(swp_21)as commerce,sum(surp_w_sg)as sg ,sum(surp_w_soc)as ss ,sum(surp_w_sci)as sc,sum(surp_w_hhm) as hhm, sum(surp_w_tam) as tam,sum(surp_w_eng) as eng,sum(surp_w_mat) as mat,sum(surp_w_mhm) as mhm,sum(surp_w_phm)as phm
            FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
      $query = $this->db->query($sql);
      // print_r($this->db->last_query());
          return $query->result();
   }
   public function dsestaff_surpwithout()
   {
     $sql=" SELECT sum(swop_1) as tamil,sum(swop_2) as english ,sum(swop_3) as physics,sum(swop_4) as chemistry,sum(swop_5)as biology,
        sum(swop_6) as botany,sum(swop_7) as zoology ,sum(swop_8) as statistics ,
        sum(swop_10) as geography,sum(swop_11) as microbiology,sum(swop_12)as biochemistry,
        sum(swop_16) as mathematics ,sum(swop_17) as homescience ,sum(swop_18) as history,sum(swop_19) as economics ,sum(swop_20) as politicalscience ,sum(swop_21)as commerce,sum(surp_wo_sg)as sg ,sum(surp_wo_soc)as ss ,sum(surp_wo_sci)as sc,sum(surp_wo_hhm) as hhm, sum(surp_wo_tam) as tam,sum(surp_wo_eng) as eng,sum(surp_wo_mat) as mat 
 FROM  students_school_child_count
     left JOIN  teacher_panel4 on teacher_panel4.school_key_id = students_school_child_count.school_id and  teacher_panel4.district_id =students_school_child_count.district_id
     LEFT JOIN teacher_panel2 ON teacher_panel2.school_key_id = students_school_child_count.school_id AND students_school_child_count.district_id=teacher_panel2.district_id
    left JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
         WHERE sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3)  AND school_type_id=1";
     $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result(); 
   }

   public function get_teacher_gt_5years($district_id,$tmp)
   {
  
   if($district_id!="") 
   {
    $sql="SELECT sc.district_name as District,sc.school_type,sc.cate_type,count(*) as Teachers FROM students_school_child_count sc left JOIN udise_staffreg tr on tr.school_key_id=sc.school_id WHERE tr.archive=1 and (Year(current_date())- year(staff_psJOIN))>".$tmp." and sc.management in ('School Education Department School','Municipal School') and sc.cate_type in ('High School','Higher Secondary School') and sc.school_type_id in (1,2) group by sc.district_name,sc.school_type,sc.cate_type";
   
   }
   
     $query=$this->db->query($sql);
     return $query->result(); 
   }
    public function get_teacher_gt_5years_school($dist_id,$tmp)
   {
    $sql="SELECT sc.district_name as District,sc.school_name,sc.school_id,sc.school_type,sc.cate_type,count(*) as Teachers,
sum(teacher_type=11) as BT,
sum(teacher_type=36) as PG,
sum(teacher_type=41) as SG,
sum(teacher_type in (26,27,28,29,89)) as HM,
sum(teacher_type not in (26,27,28,29,89,11,36,41)) as others
 FROM students_school_child_count sc left JOIN udise_staffreg tr on tr.school_key_id=sc.school_id WHERE tr.archive=1 and (Year(current_date())- year(staff_psJOIN))>".$tmp." and sc.management in ('School Education Department School','Municipal School') and sc.cate_type in ('High School','Higher Secondary School') and sc.school_type_id in (1,2) AND sc.district_id='".$dist_id."' group by sc.district_name,sc.school_type,sc.cate_type,sc.school_name,tr.teacher_type";
// print_r($sql);
     $query=$this->db->query($sql);
     return $query->result(); 
   }
  //promotion dee and dse report by raju
  public function promotion_deereport($sub,$pan)
  {
    $sql=" SELECT teachers_promotion_eligible.school_key_id,teachers_promotion_eligible.district_id,teacher_name,teacher_id, appointment_date, doj_pr_post, doj_pr_school, teachers_promotion_eligible.dob, designation,type_teacher, teachers_promotion_eligible.appointed_subject, promo_eligible, regularisation_date,district_name,block_name,students_school_child_count.school_name,subjects,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3,
case when panel1 ='".$pan."' and panel1_subject = ".$sub."  then panel1_rank else 0 end as rank1, 
case when panel2 ='".$pan."' and panel2_subject = ".$sub."  then  panel2_rank else 0 end as rank2,
case when panel3 ='".$pan."'and panel3_subject = ".$sub."  then panel2_rank else 0 end as rank3,udise_staffreg.udise_code
FROM teachers_promotion_eligible
    JOIN students_school_child_count on students_school_child_count.school_id = teachers_promotion_eligible.school_key_id
    JOIN udise_staffreg on udise_staffreg.teacher_code =teachers_promotion_eligible.teacher_id 
    JOIN teacher_subjects on teacher_subjects.id =teachers_promotion_eligible.appointed_subject
    JOIN teacher_type on teacher_type.id =teachers_promotion_eligible.designation 
    JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id  
    WHERE  sch_cate_id in (1,2,4,11,12) and  sch_management_id in  (1,3)  and promo_eligible = 1 and (panel1_subject = ".$sub." or panel2_subject = ".$sub." or panel3_subject =  ".$sub.") 
        and ( panel1 = '".$pan."'  or panel2 = '".$pan."'  or panel3 = '".$pan."' ) ";
      $query = $this->db->query($sql);
          // print_r($this->db->last_query()); group by teacher_id
        return $query->result();
  }
  
  public function promotion_dsereport($sub,$pan)
  {
    $sql="SELECT teachers_promotion_eligible.school_key_id,teachers_promotion_eligible.district_id,teacher_name,teacher_id, appointment_date, doj_pr_post, doj_pr_school, dob, designation,type_teacher, teachers_promotion_eligible.appointed_subject, promo_eligible, regularisation_date,district_name,block_name,students_school_child_count.school_name,subjects,panel1_subject, panel1_desig, panel1_rank, panel2_subject, panel2_desig, panel2_rank, panel3_subject, panel3_desig, panel3_rank, major1, major2, major3,panel1,panel2,panel3,
case when panel1 ='".$pan."' and panel1_subject = ".$sub."  then panel1_rank else 0 end as rank1, 
case when panel2 ='".$pan."' and panel2_subject = ".$sub."  then  panel2_rank else 0 end as rank2,
case when panel3 ='".$pan."'and panel3_subject = ".$sub."  then panel2_rank else 0 end as rank3,udise_staffreg.udise_code
FROM teachers_promotion_eligible
    JOIN students_school_child_count on students_school_child_count.school_id = teachers_promotion_eligible.school_key_id
    JOIN udise_staffreg on udise_staffreg.teacher_code =teachers_promotion_eligible.teacher_id 
    JOIN teacher_subjects on teacher_subjects.id =teachers_promotion_eligible.appointed_subject
    JOIN teacher_type on teacher_type.id =teachers_promotion_eligible.designation 
    JOIN schoolnew_basicinfo on schoolnew_basicinfo.school_id = udise_staffreg.school_key_id  
    WHERE  sch_cate_id in (3,5,6,7,8,9,10) and  sch_management_id in  (1,3) and promo_eligible = 1 and (panel1_subject = ".$sub." or panel2_subject = ".$sub." or panel3_subject =  ".$sub.") 
        and ( panel1 = '".$pan."'  or panel2 = '".$pan."'  or panel3 = '".$pan."' ) ";
      $query = $this->db->query($sql);
          // print_r($this->db->last_query()); die(); group by teacher_id
        return $query->result();
  }
  public function vacancy_dsereport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 FROM teacher_panel4 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id  group by students_school_child_count.district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function live_vacancy_dsereport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 FROM teacher_panel4_cp JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4_cp.school_key_id  group by students_school_child_count.district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_dsereport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(need_1) as need_1,SUM(need_2) as need_2,SUM(need_3) as need_3,SUM(need_4) as need_4,SUM(need_5) as need_5,SUM(need_6) as need_6,SUM(need_7) as need_7,SUM(need_8) as need_8,SUM(need_9) as need_9,SUM(need_10) as need_10,SUM(need_11) as need_11,SUM(need_12) as need_12,SUM(need_13) as need_13,SUM(need_14) as need_14,SUM(need_15) as need_15,SUM(need_16) as need_16,SUM(need_17) as need_17,SUM(need_18) as need_18,SUM(need_19) as need_19,SUM(need_20) as need_20,SUM(need_21) as need_21,SUM(need_22) as need_22,SUM(need_23) as need_23,SUM(need_24) as need_24,SUM(need_25) as need_25,SUM(need_26) as need_26,SUM(need_27) as need_27,SUM(need_28) as need_28,SUM(need_29) as need_29,SUM(need_30) as need_30,SUM(need_31) as need_31,SUM(need_32) as need_32,SUM(need_33) as need_33,SUM(need_34) as need_34,SUM(need_35) as need_35,SUM(need_36) as need_36,SUM(need_37) as need_37,SUM(need_38) as need_38,SUM(need_39) as need_39,SUM(need_40) as need_40,SUM(need_41) as need_41,SUM(need_42) as need_42,SUM(need_43) as need_43 FROM teacher_panel4 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id  group by students_school_child_count.district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function vacancy_dse_sg_btreport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE  dept='DSE' group by students_school_child_count.district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function live_vacancy_dse_sg_btreport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2_cp 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
    WHERE  dept='DSE' group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_dse_sg_btreport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_phm) as phm,SUM(need_hhm) as hhm,SUM(need_phm) as phm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE  dept='DSE' group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_dee_sg_btreport()
    {
     // print_r($sql);
       $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_phm) as phm,SUM(need_hhm) as hhm,SUM(need_phm) as phm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE  dept='DEE' group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function vacancy_dee_sg_btreport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE  dept='DEE' group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function live_vacancy_dee_sg_btreport()
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.district_name,students_school_child_count.district_id,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2_cp 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
    WHERE  dept='DEE' group by students_school_child_count.district_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  //////////////
  public function vacancy_district_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 FROM teacher_panel4 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id WHERE students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
  public function live_vacancy_district_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_1) as vac_1,SUM(vac_2) as vac_2,SUM(vac_3) as vac_3,SUM(vac_4) as vac_4,SUM(vac_5) as vac_5,SUM(vac_6) as vac_6,SUM(vac_7) as vac_7,SUM(vac_8) as vac_8,SUM(vac_9) as vac_9,SUM(vac_10) as vac_10,SUM(vac_11) as vac_11,SUM(vac_12) as vac_12,SUM(vac_13) as vac_13,SUM(vac_14) as vac_14,SUM(vac_15) as vac_15,SUM(vac_16) as vac_16,SUM(vac_17) as vac_17,SUM(vac_18) as vac_18,SUM(vac_19) as vac_19,SUM(vac_20) as vac_20,SUM(vac_21) as vac_21,SUM(vac_22) as vac_22,SUM(vac_23) as vac_23,SUM(vac_24) as vac_24,SUM(vac_25) as vac_25,SUM(vac_26) as vac_26,SUM(vac_27) as vac_27,SUM(vac_28) as vac_28,SUM(vac_29) as vac_29,SUM(vac_30) as vac_30,SUM(vac_31) as vac_31,SUM(vac_32) as vac_32,SUM(vac_33) as vac_33,SUM(vac_34) as vac_34,SUM(vac_35) as vac_35,SUM(vac_36) as vac_36,SUM(vac_37) as vac_37,SUM(vac_38) as vac_38,SUM(vac_39) as vac_39,SUM(vac_40) as vac_40,SUM(vac_41) as vac_41,SUM(vac_42) as vac_42,SUM(vac_43) as vac_43 FROM teacher_panel4_cp JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4_cp.school_key_id WHERE students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
  public function vacancy_district_dse_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE students_school_child_count.district_id=".$dist_id." and dept='DSE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        return $query->result();
    }
  public function live_vacancy_district_dse_sg_btreport($dist_id)
    {
        $sql="SELECT students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2_cp 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
    WHERE students_school_child_count.district_id='".$dist_id."' and dept='DSE' group by students_school_child_count.school_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
  public function vacancy_district_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_hhm) as hhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function live_vacancy_district_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.district_name,students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.school_id,students_school_child_count.udise_code,students_school_child_count.district_id,SUM(vac_sg) as vac_sg,SUM(vac_sci) as sciense,SUM(vac_mat) as maths,SUM(vac_eng) as english,SUM(vac_tam) as tamil,SUM(vac_soc) as social,SUM(vac_mhm) as mhm,SUM(vac_phm) as phm,SUM(vac_telu) as telugu,SUM(vac_agr) as agri,SUM(vac_com) as computer,SUM(vac_pet) as pet,SUM(vac_sew) as sew,SUM(vac_mus) as music,SUM(vac_dra) as drawing,SUM(vac_pd2) as pd2,SUM(vac_kann) as kannadam,SUM(vac_mala) as malayalam,SUM(vac_urdu) as urudu FROM teacher_panel2_cp 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2_cp.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2_cp.school_key_id 
    WHERE students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_district_dsereport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_1) as need_1,SUM(need_2) as need_2,SUM(need_3) as need_3,SUM(need_4) as need_4,SUM(need_5) as need_5,SUM(need_6) as need_6,SUM(need_7) as need_7,SUM(need_8) as need_8,SUM(need_9) as need_9,SUM(need_10) as need_10,SUM(need_11) as need_11,SUM(need_12) as need_12,SUM(need_13) as need_13,SUM(need_14) as need_14,SUM(need_15) as need_15,SUM(need_16) as need_16,SUM(need_17) as need_17,SUM(need_18) as need_18,SUM(need_19) as elig_19,SUM(need_20) as need_20,SUM(need_21) as need_21,SUM(need_22) as need_22,SUM(need_23) as need_23,SUM(need_24) as need_24,SUM(need_25) as need_25,SUM(need_26) as need_26,SUM(need_27) as need_27,SUM(need_28) as need_28,SUM(need_29) as need_29,SUM(need_30) as need_30,SUM(need_31) as need_31,SUM(need_32) as need_32,SUM(need_33) as need_33,SUM(need_34) as need_34,SUM(need_35) as need_35,SUM(need_36) as need_36,SUM(need_37) as need_37,SUM(need_38) as need_38,SUM(need_39) as need_39,SUM(need_40) as need_40,SUM(need_41) as need_41,SUM(need_42) as need_42,SUM(need_43) as elig_43 FROM teacher_panel4 JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel4.school_key_id WHERE students_school_child_count.district_id=".$dist_id." group by school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_district_dse_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_mhm) as mhm,SUM(need_phm) as phm,SUM(need_phm) as phm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE students_school_child_count.district_id=".$dist_id." and dept='DSE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function need_district_dee_sg_btreport($dist_id)
    {
     // print_r($sql);
        $sql="SELECT students_school_child_count.block_name,students_school_child_count.school_name,students_school_child_count.district_id,SUM(need_sg) as need_sg,SUM(need_sci) as sciense,SUM(need_mat) as maths,SUM(need_eng) as english,SUM(need_tam) as tamil,SUM(need_soc) as social,SUM(need_mhm) as mhm,SUM(need_phm) as phm,SUM(need_phm) as phm,SUM(need_telu) as telugu,SUM(need_kann) as kannadam,SUM(need_mala) as malayalam,SUM(need_urdu) as urudu FROM teacher_panel2 
    JOIN students_school_child_count on students_school_child_count.school_id=teacher_panel2.school_key_id 
    JOIN teacher_panel_schools on teacher_panel_schools.school_id=teacher_panel2.school_key_id 
    WHERE students_school_child_count.district_id=".$dist_id." and dept='DEE' group by students_school_child_count.school_id;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  

   public function get_beo_list()
    {
     // print_r($sql);
        $sql="SELECT recruit_mode,teacher_panel_beotransfer.doj_pr_beo,teacher_panel_beotransfer.doj_beo,teacher_panel_beotransfer.doj_mhm,teacher_panel_beotransfer.dob,teacher_panel_beotransfer.id,location,teacher_panel_beotransfer.name,schoolnew_district.district_name,schoolnew_block.block_name FROM teacher_panel_beotransfer
JOIN schoolnew_district on schoolnew_district.id=teacher_panel_beotransfer.district
JOIN schoolnew_block on schoolnew_block.id=teacher_panel_beotransfer.block";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();

    }
    public function teacher_panel_mainpage()
    {
      $sql="SELECT *,sum(case when status=2 then 1 else 0 end) as completed, 
    sum(case when status=3 then 1 else 0 end) as Relinquished,
    (SELECT designation FROM teacher_panel_teachtype WHERE teacher_panel_teachtype.id= teacher_panel_mainpage.teacher_type) as des FROM teacher_panel_mainpage WHERE directorate=1 and total_count >=0   group by agenda";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
      public function teacher_panel_mainpage_dse()
    {
      $sql=" SELECT *,sum(case when status=2 then 1 else 0 end) as completed,
                      sum(case when status=3 then 1 else 0 end) as Relinquished,
                      (SELECT designation FROM teacher_panel_teachtype WHERE teacher_panel_teachtype.id= teacher_panel_mainpage.teacher_type) as des
              FROM teacher_panel_mainpage WHERE directorate=2 and  total_count >=0    group by agenda";
             $query = $this->db->query($sql);
        //print_r($this->db->last_query());
             return $query->result();
    }

      public function emis_teacher_panel_dee($transfer_type,$teach_type,$loc)
    {

        

         $t_type=$this->input->get('transfer_type')=='3'?'teacher_panel_transfers.new_desig':'teacher_panel_transfers.designation';
//print_r($t_type);
      $sql="SELECT (case when designation=102 then (SELECT name FROM teacher_panel_beotransfer WHERE teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id limit 1) else
case when designation in (11,41,26,27,28,29,36) then (SELECT teacher_name FROM udise_staffreg WHERE udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id limit 1) end
 end) as teacher_name,teacher_id,
 (SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_panel_transfers.designation LIMIT 1) AS des,
 (SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=teacher_panel_transfers.subject LIMIT 1) AS sub,
(SELECT school_name FROM students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.school_key_id LIMIT 1) AS school,
(SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_panel_transfers.new_desig LIMIT 1) AS new_des,
(SELECT subject FROM teacher_panel_subject WHERE teacher_panel_subject.sub_code=teacher_panel_transfers.new_subject LIMIT 1) AS new_sub,
(SELECT school_name FROM students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.new_school_key_id LIMIT 1) AS new_school,
(SELECT block2 FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS old_block,
(SELECT district_name FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS district,

(SELECT block2 FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.new_block LIMIT 1) AS new_block
 FROM teacher_panel_transfers 
left JOIN udise_staffreg on udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id
left JOIN teacher_panel_beotransfer on teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id
WHERE teacher_panel_transfers.transfer_type=".$transfer_type." and ".$t_type."=".$teach_type." AND teacher_status".$loc."=2";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
   public function emis_teacher_panel_dse($transfer_type,$teach_type,$loc)
    {
      
         $t_type=$this->input->get('transfer_type')=='3'?'teacher_panel_transfers.new_desig':'teacher_panel_transfers.designation';
      $sql="SELECT (case when designation=102 then (SELECT name FROM teacher_panel_beotransfer WHERE teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id limit 1) else
case when designation in (11,41,26,27,28,29,36) then (SELECT teacher_name FROM udise_staffreg WHERE udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id limit 1) end
 end) as teacher_name,teacher_id,
 (SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_panel_transfers.designation LIMIT 1) AS des,
 (SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=teacher_panel_transfers.subject LIMIT 1) AS sub,
(SELECT school_name FROM students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.school_key_id LIMIT 1) AS school,
(SELECT type_teacher FROM teacher_type WHERE teacher_type.id=teacher_panel_transfers.new_desig LIMIT 1) AS new_des,
(SELECT subject FROM teacher_panel_subject WHERE teacher_panel_subject.sub_code=teacher_panel_transfers.new_subject LIMIT 1) AS new_sub,
(SELECT school_name FROM students_school_child_count WHERE students_school_child_count.school_id=teacher_panel_transfers.new_school_key_id LIMIT 1) AS new_school,
(SELECT block2 FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS old_block,
(SELECT district_name FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.curr_block LIMIT 1) AS district,

(SELECT block2 FROM teacher_panel_deemaint WHERE teacher_panel_deemaint.block2_id=teacher_panel_transfers.new_block LIMIT 1) AS new_block
 FROM teacher_panel_transfers 
left JOIN udise_staffreg on udise_staffreg.teacher_code=teacher_panel_transfers.teacher_id
left JOIN teacher_panel_beotransfer on teacher_panel_beotransfer.staff_id=teacher_panel_transfers.teacher_id
WHERE teacher_panel_transfers.transfer_type=".$transfer_type." and ".$t_type."=".$teach_type." AND teacher_status".$loc."=2";
       $query = $this->db->query($sql);
       // print_r($this->db->last_query());
        return $query->result();
    }
  public function get_teacher_code($u_id)
  {
  $sql="SELECT teacher_code,teacher_name,subject1,subject2,subject3,subject4,subject5,subject6 FROM udise_staffreg WHERE u_id=".$u_id."";
    $query = $this->db->query($sql);
        return $query->result();  
  }
public function school_mainpage()
    {
      $sql="SELECT udise_code,school_name FROM students_school_child_count limit 10";
       $query = $this->db->query($sql);
       
        return $query->result();
    }
  public function save_panel2_cp($schoolid,$savesubjectpanel2)
  {
    $this->db->WHERE('school_key_id',$schoolid);
  return $this->db->update('teacher_panel2_cp',$savesubjectpanel2); 
  }
  public function emis_computerindent()
  {
    $sql="SELECT sc.school_id,sc.district_name,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type,sum(c11_b+c11_g+c11_t) as Class11_Enr,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=11  group by school_id)) as Class11_dist,sum(c12_b+c12_g+c12_t) as Class12_Enr,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=12 and (acyear='2018-19' or acyear='2018-2019'))) as Class12_dist,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=12 and (acyear='2019-20' or acyear='2019-2020'))) as Class12_19_20 FROM students_school_child_count sc  WHERE sc.school_type_id in (1,2) and sc.cate_type='Higher Secondary School' group by sc.district_id";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
  }
  public function emis_computerindent_laptop($dist)
  {
    $sql="SELECT sc.school_id,sc.district_name,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type,sum(c11_b+c11_g+c11_t) as Class11_Enr,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=11 group by school_id)) as Class11_dist,sum(c12_b+c12_g+c12_t) as Class12_Enr,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=12 and (acyear='2018-19' or acyear='2018-2019'))) as Class12_dist,sum((SELECT count(*) FROM schoolnew_computerindent WHERE school_id=sc.school_id and isactive=1 and class=12 and (acyear='2019-20' or acyear='2019-2020'))) as Class12_19_20 FROM students_school_child_count sc  WHERE sc.school_type_id in (1,2) and sc.cate_type='Higher Secondary School' and sc.district_id=".$dist." group by sc.udise_code";
       $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
  }

  public function emis_computerindent_schoolwise($school){
    $sql="SELECT a.unique_id_no,a.name,a.name_tamil,a.class_studying_id,a.class_section, a.transfer_flag,
    b.unique_supply
    FROM students_child_detail a 
    left JOIN schoolnew_computerindent b on a.school_id = b.school_id and a.id = b.student_id
    WHERE a.school_id = ".$school."
    group by a.id ORDER BY a.class_section,a.NAME ASC;";
    $query = $this->db->query($sql);
   // print_r($this->db->last_query());
    return $query->result();
  }

  public function teacher_transfer($savetransfer)
  {
       $this->db->trans_start();
       $this->db->insert('teacher_trans_history',$savetransfer); 
       $id = $this->db->insert_id(); 
       $affectedRows=$this->db->affected_rows();
       $this->db->trans_complete();            
    if ($this->db->trans_status() === false) {
      $message = 'Unable to Transfer details!';
    }else if ($this->db->trans_status() === true) {
          if($affectedRows > 0 ) {
                $message = 'Successfully Transfer!';
          }else $message = 'There is no changes in data. please try again!.';
    }else $message = 'Something Went Wrong!. please try Again';
    return $message;
  }
  
  public function transfer_teacher_debutation($savetransfer_debuted)
  {
   $this->db->insert('teacherdepute_entry',$savetransfer_debuted); 
     return $this->db->insert_id(); 
  }
  function save_teacher_volunteer($savevolunteer_debuted)
  {
  $this->db->insert('teacher_volunteers_subjects',$savevolunteer_debuted); 
     return $this->db->insert_id(); 
  }
  public function update_flag($u_id,$debuted)
  {
  $this->db->WHERE('u_id',$u_id);
  return $this->db->update('udise_staffreg',$debuted);  
  }
  public function update_school_key_id($u_id,$updateschool_key_id)
  {
      $this->db->trans_start();
      $this->db->where('u_id',$u_id);
      $this->db->update('udise_staffreg',$updateschool_key_id);
      // $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();            
      return $this->db->trans_status();
    }
    
   public function dist($dist)
   {
    $sql ="SELECT district_name FROM tnschools_working.schoolnew_district 
    WHERE id= ".$dist."";
    $query = $this->db->query($sql);
    // print_r($this->db->last_query());
        return $query->result();
   }
   
    public function get_new_user_dtls($wheres,$groupby){
    
 $sql="SELECT c.district_id as id, c.edu_dist_id,c.District_Name,c.Block_Name, c.Edu_Dist_Name,c.school_id, c.School_Name,c.block_id ,sum(c.teach_tot)as total_teacher, sum(Logged)as Logged FROM
(SELECT 
x.district_id, x.District_Name, x.edu_dist_id, x.Edu_Dist_Name, x.block_id, x.Block_Name, x.school_id, x.School_Name, x.teach_tot, count(a.`teacher_code`) Logged
FROM tntp_users a

JOIN udise_staffreg b ON a.teacher_code = b.teacher_code AND (b.`archive` = 1) 

JOIN students_school_child_count x ON b.school_key_id = x.school_id AND x.`school_type_id` IN (1,2) 
GROUP BY x.school_id) c 
".$wheres.$groupby." ";
 $query = $this->db->query($sql);
       //print_r($this->db->last_query());
        return $query->result();
    }
  
  function getteacher_unlogged($school_id)
  {
    $sql="SELECT a.udise_code, a.teacher_name,d.teacher_type, IF(b.teacher_code IS NULL, 'neverloggedin', 'loggedin') as status

FROM udise_staffreg a 
LEFT JOIN tntp_users b ON a.teacher_code = b.teacher_code
JOIN teacher_type c ON a.teacher_type = c.id AND c.category = 1
JOIN teacher_panel_teachtype d on d.designation=a.teacher_type
WHERE a.school_key_id = ".$school_id." and a.archive=1";
 
 // SELECT 
// c.district_name, c.edu_dist_name, c.block_name, c.school_name, c.teach_tot, count(a.`teacher_code`)
// FROM tntp_users a
// JOIN udise_staffreg b ON a.teacher_code = b.teacher_code
// JOIN students_school_child_count c ON b.school_key_id = c.school_id
// GROUP BY c.district_name, c.edu_dist_name, c.block_name, c.school_name
 

 
 $query = $this->db->query($sql);
       //print_r($this->db->last_query());
        return $query->result();
    
  }
  function getschool_name($school_id)
  {
    $sql="SELECT school_name from students_school_child_count
where school_id = ".$school_id."";
 $query = $this->db->query($sql);
        return $query->result();
    
  }
  
  public function get_new_staff_view_dtls($WHERE)
  {
     $sql="SELECT b.District_Name, b.Block_Name, b.Edu_Dist_Name, b.School_Name, b.Teacher_Name,c.id,a.views FROM tntp_userviews a
JOIN `emis_schools_teachers` b ON a.`teacher_code` = b.`Teacher_Code`
JOIN schoolnew_edn_dist_mas c ON b.Edu_Dist_Name = c.edn_dist_name
".$WHERE." ORDER BY views desc limit 20";
     
     $query = $this->db->query($sql);
         return $query->result();
  }
  

    // public function get_user_count($WHERE,$groupby,$flag){

    //     if($flag == 1){ $WHERE = "WHERE DATE(FROM_unixtime(a.firstaccess)) = CURDATE()".$WHERE; }
    //     elseif($flag == 2){ $WHERE = "WHERE month(FROM_unixtime(a.firstaccess)) = month(CURDATE())".$WHERE; }
    //     elseif($flag == 3){ $WHERE = "WHERE year(FROM_unixtime(a.firstaccess)) = year(CURDATE())".$WHERE; }
    //     elseif($flag == 4){ $WHERE = "WHERE week(FROM_unixtime(a.firstaccess)) = week(CURDATE())".$WHERE; }

    //     $sql="SELECT count(b.Teacher_Code) as Teacher_Count, DATE(FROM_unixtime(a.firstaccess)),c.id as edu_dist_id
    //           FROM tntp_users a
    //           JOIN emis_schools_teachers b ON a.teacher_code = b.Teacher_Code 
    //           JOIN schoolnew_edn_dist_mas c ON b.Edu_Dist_Name = c.edn_dist_name ".$WHERE.$groupby.";";

    //     $query = $this->db->query($sql);
    // // print_r($this->db->last_query());
    //      return $query->result();
    // }

    public function get_user_count($WHERE,$groupby,$flag){

          if($flag == 1){ $WHERE = "WHERE DATE(FROM_unixtime(a.firstaccess)) = CURDATE()".$WHERE; }
      elseif($flag == 2){ $WHERE = "WHERE month(FROM_unixtime(a.firstaccess)) = month(CURDATE())".$WHERE; }
      elseif($flag == 3){ $WHERE = "WHERE year(FROM_unixtime(a.firstaccess)) = year(CURDATE())".$WHERE; }
      elseif($flag == 4){ $WHERE = "WHERE week(FROM_unixtime(a.firstaccess)) = week(CURDATE())".$WHERE; }

      $sql="SELECT count(b.Teacher_Code) as Teacher_Count, DATE(FROM_unixtime(a.firstaccess)),b.edu_dist_id
            FROM tntp_users a
            JOIN emis_schools_teachers b ON a.teacher_code = b.Teacher_Code ".$WHERE.$groupby.";";

      $query = $this->db->query($sql);
      return $query->result();
  }

  public function get_user_count_last($WHERE,$groupby,$flag){

        if($flag == 1){ $WHERE = "WHERE DATE(FROM_unixtime(a.lastaccess)) = CURDATE()".$WHERE; }
        elseif($flag == 2){ $WHERE = "WHERE month(FROM_unixtime(a.lastaccess)) = month(CURDATE())".$WHERE; }
        elseif($flag == 3){ $WHERE = "WHERE year(FROM_unixtime(a.lastaccess)) = year(CURDATE())".$WHERE; }
        elseif($flag == 4){ $WHERE = "WHERE week(FROM_unixtime(a.lastaccess)) = week(CURDATE())".$WHERE; }

        $sql="SELECT count(b.Teacher_Code) as Teacher_Count, DATE(FROM_unixtime(a.lastaccess)),c.id as edu_dist_id
              FROM tntp_users a
              JOIN emis_schools_teachers b ON a.teacher_code = b.Teacher_Code 
              JOIN schoolnew_edn_dist_mas c ON b.Edu_Dist_Name = c.edn_dist_name ".$WHERE.$groupby.";";

        $query = $this->db->query($sql);
    // print_r($this->db->last_query());
         return $query->result();
    }
    
  //staff transfer list 
  public function emis_staff_FROM_to_trans_dist_count($FROMdate,$todate,$dist,$block)
  
  {
    /*left JOIN students_school_child_count c on c.district_id=teacher_trans_history.FROM_scl_dist 
left JOIN students_school_child_count d on d.district_id=teacher_trans_history.to_scl_dist */
     if($FROMdate !='1970-01-01' and $FROMdate !='')
    {
      $WHERE = "and teacher_trans_history.trans_date between '".$FROMdate."' and  '".$todate."'";
    }
    else{
      $WHERE = ' '; 
    }
     if($FROMdate !='1970-01-01' and $FROMdate !='')
    {
      $WHEREdist = "and teacher_trans_history.trans_date between '".$FROMdate."' and  '".$todate."'";
    }
    else{
      $WHEREdist = ' '; 
    }
    
    $sql="SELECT FROM_schl_keyid,to_schl_keyid, staff_id, transferer_id, user_type_id,teacher_trans_history.trans_date,
    c.id,c.district_name as FROM_scl_dist,d.district_name as to_scl_dist, transferer,  FROM_teachertype, to_teachertype, trans_type,a.cate_type,a.school_name as oldschool,
    b.school_name as newschool,
SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist = to_scl_dist and FROM_block = to_block  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School' ) THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as withinblock,
 SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist = to_scl_dist and FROM_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as   blocktoblock,
 SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist != to_scl_dist and FROM_block != to_block
  and( a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as disttodist,
 SUM(CASE WHEN  to_schl_keyid =0  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as school_off,
 SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist != to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School') THEN 1 ELSE 0 END ELSE 0 END) as dsedisttodist,
 SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and to_block != ' ' and FROM_scl_dist = to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dseblocktoblock
FROM teacher_trans_history 
left JOIN schoolnew_district c on c.id=teacher_trans_history.FROM_scl_dist 
left JOIN schoolnew_district d on d.id=teacher_trans_history.to_scl_dist 
left JOIN udise_staffreg on teacher_trans_history.staff_id =udise_staffreg.u_id
left JOIN students_school_child_count a on a.school_id=teacher_trans_history.FROM_schl_keyid 
left JOIN students_school_child_count b on b.school_id=teacher_trans_history.to_schl_keyid 
WHERE teacher_trans_history.trans_date >= '2019-07-15'  and FROM_scl_dist is not null  ".$WHERE." 
 group by FROM_scl_dist";
     $query = $this->db->query($sql);
           // print_r($this->db->last_query());
         return $query->result();
  }
  
  public function emis_staff_FROM_to_trans_block_count($dist,$fdate,$tdate)
  {
    
    
     if($fdate !='1970-01-01' and $fdate !='')
    {
      $WHERE = "and teacher_trans_history.trans_date between '".$fdate."' and  '".$tdate."'";
    }
    else{
      $WHERE = ' '; 
    }
    $sql =" SELECT  FROM_schl_keyid, to_schl_keyid, staff_id, transferer_id,user_type_id,teacher_trans_history.trans_date, 
     transferer,  FROM_teachertype, 
    to_teachertype, trans_type,a.cate_type,a.school_name as oldschool,b.school_name as newschool,c.id,c.block_name as FROM_block
    ,d.block_name as to_block,
        SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist = to_scl_dist and FROM_block = to_block  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School')  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as withinblock,
        SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist = to_scl_dist and FROM_block != to_block
        and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as   blocktoblock,
       SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist != to_scl_dist and FROM_block != to_block
       and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as disttodist,
      SUM(CASE WHEN  to_schl_keyid =0  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as school_off,
      SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and FROM_scl_dist != to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School') THEN 1 ELSE 0 END ELSE 0 END) as dsedisttodist,
      SUM(CASE WHEN FROM_schl_keyid  != to_schl_keyid and to_block != ' ' and FROM_scl_dist = to_scl_dist  THEN CASE WHEN staff_id and( a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dseblocktoblock
      FROM teacher_trans_history 
      left JOIN schoolnew_block c on c.id=teacher_trans_history.FROM_block 
      left JOIN schoolnew_block d on d.id=teacher_trans_history.to_block 
      left JOIN students_school_child_count a on a.udise_code=teacher_trans_history.FROM_schl_keyid 
      left JOIN students_school_child_count b on b.udise_code=teacher_trans_history.to_schl_keyid 
      WHERE teacher_trans_history.trans_date >= '2019-07-15'  and FROM_scl_dist= '".$dist."'
  ".$WHERE."  group by FROM_block";
  
   $query = $this->db->query($sql);
           // print_r($this->db->last_query());   //order by  a.district_name asc   
         return $query->result();
  }
 function getallteachertranshistory($block,$fdate,$tdate)
  {
   
     if($fdate !='1970-01-01' and $fdate !=' ')
    {
      $WHERE = "and teacher_trans_history.trans_date between '".$fdate."' and  '".$tdate."'";
    }
    else{
      $WHERE = ' '; 
    }
      $sql=" SELECT FROM_schl, FROM_schl_keyid, to_schl, to_schl_keyid, staff_id, transferer_id, user_type_id,teacher_trans_history.trans_date, 
      c.id,c.district_name as FROM_scl_dist, to_scl_dist, transferer,  FROM_teachertype, to_teachertype,teacher_name,FROM_block, trans_type,a.cate_type,a.school_name as oldschool,b.school_name as newschool,type_teacher,
SUM(CASE WHEN FROM_schl  != to_schl and FROM_scl_dist = to_scl_dist and FROM_block = to_block  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School')  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as withinblock,
 SUM(CASE WHEN FROM_schl  != to_schl and FROM_scl_dist = to_scl_dist and FROM_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School') THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as   blocktoblock,
 SUM(CASE WHEN FROM_schl  != to_schl and FROM_scl_dist != to_scl_dist and FROM_block != to_block
  and (a.cate_type = 'Primary School' or a.cate_type = 'Middle School' )THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as disttodist,
 SUM(CASE WHEN  to_schl =0  THEN CASE WHEN staff_id THEN 1 ELSE 0 END ELSE 0 END) as school_off,
 SUM(CASE WHEN FROM_schl  != to_schl and FROM_scl_dist != to_scl_dist THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dsedisttodist,
 SUM(CASE WHEN FROM_schl  != to_schl and to_block != ' ' and FROM_scl_dist = to_scl_dist  THEN CASE WHEN staff_id and (a.cate_type = 'Higher Secondary School' or a.cate_type = 'High School' )THEN 1 ELSE 0 END ELSE 0 END) as dseblocktoblock
FROM teacher_trans_history 
left JOIN schoolnew_district c on c.id=teacher_trans_history.FROM_scl_dist 
left JOIN udise_staffreg on teacher_trans_history.staff_id =udise_staffreg.u_id
JOIN teacher_type on teacher_type.id=udise_staffreg.teacher_type
left JOIN students_school_child_count a on a.udise_code=teacher_trans_history.FROM_schl 
left JOIN students_school_child_count b on b.udise_code=teacher_trans_history.to_schl 
WHERE teacher_trans_history.trans_date >= '2019-07-15' and FROM_block= '".$block."'
 ".$WHERE." group by staff_id ";
    
    
     $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
  }
  
 public function trans_off_transfer()
 {
   $sql = "SELECT id,district_id,office_type,office_name FROM udise_offreg" ;
    $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
 }
 
 public function users_active_lastmonth($where)
 {
   $sql="SELECT b.District_Name, b.Block_Name, b.Edu_Dist_Name, b.School_Name, count(b.Teacher_Name)as tech FROM tntp_userviews a JOIN emis_schools_teachers b ON a.`teacher_code` = b.`Teacher_Code` JOIN schoolnew_edn_dist_mas c ON b.Edu_Dist_Name = c.edn_dist_name 
GROUP BY b.District_Name, b.Block_Name, b.Edu_Dist_Name, b.School_Name
 ".$where."";
$query = $this->db->query($sql);
           // print_r($this->db->last_query());
        return $query->result();
 }

  function get_BRTE_List($district_id,$block_id){
     // print_r($school_cate);
    // if(!empty($school_cate)){

    //   $cate_type=implode("','", $school_cate);
    //   $where="left join students_school_child_count on students_school_child_count.school_id=brte_school_map.school_id where students_school_child_count.cate_type in ('".$cate_type."') ";
    // }
    // else
    // {
    //  $where="";
    // }
  
  if($district_id!="")
  {
  
   $sql ="SELECT COUNT(1) AS cnt,district_name,off_sch.district_id,teacher_code,teacher_name,(select subjects from teacher_subjects where teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr FROM udise_staffreg
JOIN (
SELECT std.school_id,std.district_id,std.district_name FROM students_school_child_count as std
UNION ALL
SELECT ofreg.off_key_id,ofreg.district_id,ofreg.district_name FROM udise_offreg as ofreg
JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 and  off_sch.district_id=".$district_id." group by teacher_code";

  }
  else if($block_id!="")
  {
   $sql ="SELECT COUNT(1) AS cnt,district_name,off_sch.district_id,teacher_code,teacher_name,(select subjects from teacher_subjects where teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr FROM udise_staffreg
JOIN (
SELECT std.school_id,std.district_id,std.district_name FROM students_school_child_count as std
UNION ALL
SELECT ofreg.off_key_id,ofreg.district_id,ofreg.district_name FROM udise_offreg as ofreg
JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 and  off_sch.district_id=".$block_id." group by teacher_code";
  }
  else
  {
     $sql="SELECT COUNT(distinct(brte_id)) AS assigned_brte,count(brte_id) asgn_schl,brte_school_groups.district_id,a.cnt as total_brte,a.district_name FROM brte_school_groups 
JOIN udise_staffreg ON brte_school_groups.brte_id = udise_staffreg.u_id  
JOIN (SELECT COUNT(1) AS cnt,district_name,off_sch.district_id FROM udise_staffreg
JOIN (
SELECT std.school_id,std.district_id,std.district_name FROM students_school_child_count as std
UNION ALL
SELECT ofreg.off_key_id,ofreg.district_id,ofreg.district_name FROM udise_offreg as ofreg

JOIN schoolnew_district ON schoolnew_district.id=district_id) AS off_sch ON off_sch.school_id=udise_staffreg.school_key_id
WHERE teacher_type=103 GROUP BY off_sch.district_id) as a on a.district_id=brte_school_groups.district_id GROUP BY district_id"; 

  }
         $query = $this->db->query($sql); 
         return $query->result();
   }
 function get_BRTE_List_block($dist_id,$school_cate){
     // print_r($school_cate);
    if(!empty($school_cate)){
      $cate_type=implode("','", $school_cate);
      $where="left join students_school_child_count on students_school_child_count.school_id=brte_school_map.school_id where students_school_child_count.cate_type in ('".$cate_type."') and brte_school_map.district_id=".$dist_id."";
    }
    else
    {
     $where=" where brte_school_map.district_id=".$dist_id." ";
    }
       $SQL="SELECT (select count(*) from students_school_child_count where students_school_child_count.block_id=brte_school_map.block_id) Total_school,COUNT(1) AS brte_cnt,(select block_name from students_school_child_count where students_school_child_count.school_id=brte_school_map.school_id) as block_name,(select district_name from students_school_child_count where students_school_child_count.school_id=brte_school_map.school_id) as district_name,(select block_id from students_school_child_count where students_school_child_count.school_id=brte_school_map.school_id) as block_id FROM brte_school_map  GROUP BY brte_school_map.block_id";
   
         $query = $this->db->query($SQL);
      //  print_r($this->db->last_query());
       return $query->result();
   }
    function get_BRTE_List_teacher($block,$dist){
     // print_r($school_cate);
    // if(!empty($school_cate)){
    //   $cate_type=implode("','", $school_cate);
    //   $where="left join students_school_child_count on students_school_child_count.school_id=brte_school_map.school_id where students_school_child_count.cate_type in ('".$cate_type."')";
    // }
    // else
    // {
    //  $where="";
    // }\
      if($dist!="")
      {
     $SQL="SELECT 
        COUNT(brte_school_groups.brte_name) AS teacher_count,
            udise_staffreg.teacher_name,udise_staffreg.teacher_id,udise_staffreg.teacher_code,(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr,
          
           students_school_child_count.school_id,brte_school_groups.district_id,students_school_child_count.block_id,students_school_child_count.block_name,students_school_child_count.district_name,(case when brte_school_groups.school_id!=0 then students_school_child_count.school_name else
            case when brte_school_groups.school_id=0 then (select block_name from schoolnew_block where schoolnew_block.id=brte_school_groups.brc_block_id limit 1)  end end) as school_name,brte_id
    FROM
        brte_school_groups
    JOIN  students_school_child_count ON students_school_child_count.school_id=brte_school_groups.school_id
    JOIN udise_staffreg ON brte_school_groups.brte_id = udise_staffreg.u_id 
     AND brte_school_groups.district_id=".$dist."
  ".$where."
    GROUP BY teacher_name";
      }
      else if($block!="")
      {
        $SQL="SELECT 
        COUNT(brte_school_groups.brte_name) AS teacher_count,
            udise_staffreg.teacher_name,udise_staffreg.teacher_id,udise_staffreg.teacher_code,(SELECT subjects FROM teacher_subjects WHERE teacher_subjects.id=udise_staffreg.appointed_subject limit 1) as appointed_subject,mbl_nmbr,
          
           students_school_child_count.school_id,brte_school_groups.district_id,students_school_child_count.block_id,students_school_child_count.block_name,students_school_child_count.district_name,(case when brte_school_groups.school_id!=0 then students_school_child_count.school_name else
            case when brte_school_groups.school_id=0 then (select block_name from schoolnew_block where schoolnew_block.id=brte_school_groups.brc_block_id limit 1)  end end) as school_name,brte_id
    FROM
        brte_school_groups
    JOIN  students_school_child_count ON students_school_child_count.school_id=brte_school_groups.school_id
    JOIN udise_staffreg ON brte_school_groups.brte_id = udise_staffreg.u_id 
     AND students_school_child_count.block_id=".$block."
  ".$where."
    GROUP BY teacher_name";
      }
       
   
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());
       return $query->result();
   }
     function BRTE_assigned_school($brte_id){
     // print_r($school_cate);
       $SQL="SELECT school_name,brte_name,block_name,udise_code FROM brte_school_groups
left JOIN students_school_child_count ON students_school_child_count.school_id=brte_school_groups.school_id
where brte_id=".$brte_id.";";
   
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());
       return $query->result();
   }
  public function bag_indent_dist()
  {
      
      $sql="select students_school_child_count.district_id, students_school_child_count.block_id, students_school_child_count.block_name,district_name, sum(if(class_studying_id =1,1,0)) as c1, sum(if(class_studying_id =2,1,0)) as c2, sum(if(class_studying_id =3,1,0)) as c3, sum(if(class_studying_id =4,1,0)) as c4, sum(if(class_studying_id =5,1,0)) as c5, sum(if(class_studying_id =6,1,0)) as c6, sum(if(class_studying_id =7,1,0)) as c7, sum(if(class_studying_id =8,1,0)) as c8, sum(if(class_studying_id =9,1,0)) as c9, sum(if(class_studying_id =10,1,0)) as c10, sum(if(class_studying_id =11,1,0)) as c11, sum(if(class_studying_id =12,1,0)) as c12 from students_child_detail

        JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id

        where  class_studying_id >= 1 and class_studying_id <= 12  and ( school_type_id =1 or school_type_id =2 ) and  (cate_type = 'Higher Secondary School' or cate_type = 'High School') group by students_school_child_count.district_id order by district_name asc;";
     

           $query = $this->db->query($sql);
          // print_r($this->db->last_query());
            return $query->result();
  }
public function desbag_indent($dist,$blk)
  {
      
    if(!empty($blk))
    {
      // echo $size;
      $d="school_name,";
      
      
      $where ="and students_school_child_count.block_id =".$blk." group by school_name order by school_name asc";
    }
    
     
    
    else{
      
      $d =" students_school_child_count.block_id,block_name,"; 
      
      $where  ="group by students_school_child_count.block_id order by block_name asc"; 
    }
    
  
    
      $sql="select ".$d." 
   
       sum(if(class_studying_id =1,1,0)) as c1,
       sum(if(class_studying_id =2,1,0)) as c2,
       sum(if(class_studying_id =3,1,0)) as c3,
       sum(if(class_studying_id =4,1,0)) as c4,
       sum(if(class_studying_id =5,1,0)) as c5,
       sum(if(class_studying_id =6,1,0)) as c6,
       sum(if(class_studying_id =7,1,0)) as c7,
       sum(if(class_studying_id =8,1,0)) as c8,
       sum(if(class_studying_id =9,1,0)) as c9,
       sum(if(class_studying_id =10,1,0)) as c10,
       sum(if(class_studying_id =11,1,0)) as c11,
       sum(if(class_studying_id =12,1,0)) as c12
       from students_child_detail  
      
       JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id
       
       where   class_studying_id >= 1 and  class_studying_id <= 12 and ( school_type_id =1 or school_type_id =2 )   and  students_school_child_count.district_id = ".$dist."  and (cate_type = 'Higher Secondary School' or  cate_type = 'High School')  ".$where." ";
     

           $query = $this->db->query($sql);
           // print_r($this->db->last_query());
            return $query->result();
  }
  public function desbag_indent_schl($dist,$blk)
  {
      $sql="select students_school_child_count.block_id,block_name,students_school_child_count.district_id, students_school_child_count.block_id, students_school_child_count.block_name,district_name, sum(if(class_studying_id =1,1,0)) as c1, sum(if(class_studying_id =2,1,0)) as c2, sum(if(class_studying_id =3,1,0)) as c3, sum(if(class_studying_id =4,1,0)) as c4, sum(if(class_studying_id =5,1,0)) as c5, sum(if(class_studying_id =6,1,0)) as c6, sum(if(class_studying_id =7,1,0)) as c7, sum(if(class_studying_id =8,1,0)) as c8, sum(if(class_studying_id =9,1,0)) as c9, sum(if(class_studying_id =10,1,0)) as c10, sum(if(class_studying_id =11,1,0)) as c11, sum(if(class_studying_id =12,1,0)) as c12 from students_child_detail JOIN students_school_child_count ON students_school_child_count.school_id=students_child_detail.school_id where class_studying_id >= 1 and class_studying_id <= 12 and ( school_type_id =1 or school_type_id =2 ) and students_school_child_count.block_id = ".$blk." and (cate_type = 'Higher Secondary School' or cate_type = 'High School') group by students_school_child_count.block_id order by block_name asc";
     

           $query = $this->db->query($sql);
           // print_r($this->db->last_query());
            return $query->result();
  }
  
  
  public function school_needs_csr($dist,$blk,$item,$cat,$subcate)
  {
    if(!empty($dist))
    { 
           if(!empty($cat) && !empty($subcate) && !empty($item))
      {
        
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,mat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate." and mat_id =".$item." ";
      }
          else if(!empty($cat) && !empty($subcate))
      {
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($cat))
      {
        $d = "csr_school_requirements.cat_id,"; 
        $values = "and csr_school_requirements.cat_id = ".$cat."";
      }
      else if(!empty($subcate))
      {
        $d="csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($item))
      {
        $d="mat_id,";
        $values = "and mat_id =".$item." ";
      }
      
      else{
        
        $d = " ";
        $values = " ";
      }
      
      $sql="select ".$d." block_id,block_name,sum(qty)as qty,sum(qty)as qty,count(csr_school_requirements.school_id) as school_id,material_name,sub_cat_name,cat_name 
           from csr_school_requirements
         join  csr_material_master on csr_material_master.id = csr_school_requirements.mat_id
                 join  students_school_child_count on students_school_child_count.school_id  = csr_school_requirements.school_id
         left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id
         left join  csr_subcategory_master on csr_subcategory_master.id =  csr_school_requirements.sub_cat_id
         where csr_school_requirements.isactive = 1 and district_id = ".$dist." 
         ".$values."
                 group by students_school_child_count.school_id,material_name";
    }
    else if(!empty($blk))
    { 
           if(!empty($cat) && !empty($subcate) && !empty($item))
      {
        
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,mat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate." and mat_id =".$item." ";
      }
          else if(!empty($cat) && !empty($subcate))
      {
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($cat))
      {
        $d = "csr_school_requirements.cat_id,"; 
        $values = "and csr_school_requirements.cat_id = ".$cat."";
      }
      else if(!empty($subcate))
      {
        $d="csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($item))
      {
        $d="mat_id,";
        $values = "and mat_id =".$item." ";
      }
      
      else{
        
        $d = " ";
        $values = " ";
      }
      
      $sql="select ".$d." csr_school_requirements.school_id,school_name,sum(qty)as qty,material_name,sub_cat_name,cat_name 
           from csr_school_requirements
         join  csr_material_master on csr_material_master.id = csr_school_requirements.mat_id
                 join  students_school_child_count on students_school_child_count.school_id  = csr_school_requirements.school_id
         left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id
         left join  csr_subcategory_master on csr_subcategory_master.id =  csr_school_requirements.sub_cat_id
         where csr_school_requirements.isactive = 1 and block_id =".$blk."
         ".$values."
                 group by students_school_child_count.school_id,material_name";
    }
    else
    {   
           
         
       if(!empty($cat) && !empty($subcate) && !empty($item))
      {
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,mat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate." and mat_id =".$item." ";
      }
          else if(!empty($cat) && !empty($subcate))
      {
        $d="csr_school_requirements.cat_id, csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.cat_id = ".$cat." and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($cat))
      {
        $d = "csr_school_requirements.cat_id,"; 
        $values = "and csr_school_requirements.cat_id = ".$cat."";
      }
      else if(!empty($subcate))
      {
        $d="csr_school_requirements.sub_cat_id,";
        $values = "and csr_school_requirements.sub_cat_id =".$subcate."";
      }
      else if(!empty($item))
      {
        $d="mat_id,";
        $values = "and mat_id =".$item." ";
      }
      
      else{
        $d = " ";
        $values = " ";
      }
      $sql = "select district_id,district_name,".$d." sum(qty)as qty,count(csr_school_requirements.school_id) as school_id
        from csr_school_requirements 
        join csr_material_master on csr_material_master.id = csr_school_requirements.mat_id 
        join students_school_child_count on students_school_child_count.school_id = csr_school_requirements.school_id 
        left join csr_category_master on csr_category_master.id = csr_school_requirements.cat_id 
        left join csr_subcategory_master on csr_subcategory_master.id = csr_school_requirements.sub_cat_id
        where  csr_school_requirements.isactive = 1  ".$values."
        group by district_id ";
      
    }
           
       $query = $this->db->query($sql);
             return $query->result(); 
  }
    public function  school_needs_csr_material_master()
    {
      $sql ="select id, material_name, cat_id, sub_cat_id, isactive from csr_material_master ";
      $query = $this->db->query($sql);
          return $query->result();  
    }
    public function cate()
    {
     $sql ="select id, cat_name, isactive  from  csr_category_master";
      $query = $this->db->query($sql);
          return $query->result();    
    }
     public function sub_cate()
    {
     $sql ="select id, sub_cat_name, cat_id, isactive from  csr_subcategory_master";
       $query = $this->db->query($sql);
           return $query->result();   
    }
    
    
    public function get_student_strength_dtl($dist,$filter,$stud) 
    { 
      // // echo $class; 
      // // echo $stud; 
      // // print_r($block_filter); 
      // if($class == 11){ 
      //   $condition = 'a.c11_b+a.c11_g+a.c11_t <='. $stud . " AND a.c11_b+a.c11_g+a.c11_t > 0 " ; 
      // }  
      // else{ 
      //   $condition = 'a.c12_b+a.c12_g+a.c12_t <='. $stud . " AND a.c12_b+a.c12_g+a.c12_t > 0 " ;; 
      // } 
 
 
         if(!empty($dist)){ 
        
          // $sql_old ="SELECT a.udise_code,a.school_id, a.school_name,count(b.class_studying_id) as student_count,b.class_studying_id,b.class_section, 
          // (select count(c.teacher_type) from udise_staffreg c where a.school_id = c.school_key_id and c.teacher_type =36 ) as  total_pgteachers, 
          // GROUP_CONCAT(DISTINCT b.class_section) as group_section 
          // FROM  students_child_detail b  
          // LEFT JOIN students_school_child_count a on b.school_id =a.school_id 
          // WHERE a.cate_type = 'Higher Secondary School'   
          // AND ".$condition."  
          // AND a.school_type_id in(".$filter.") 
          // AND a.district_id=".$dist." and class_studying_id =".$class." 
          // GROUP BY a.school_id"; 
 
          $sql ="SELECT a.udise_code,a.school_id, a.school_name, a.c9_b+a.c9_g+a.c9_t+a.c10_b+a.c10_g+a.c10_t+a.c11_b+a.c11_g+a.c11_t+a.c12_b+a.c12_g+a.c12_t  AS student_count,b.class_studying_id,b.class_section, 
          a.c11_b+a.c11_g+a.c11_t AS Plus1, a.c12_b+a.c12_g+a.c12_t AS Plus2,a.c9_b+a.c9_g+a.c9_t AS nineth, a.c10_b+a.c10_g+a.c10_t AS tenth, 
          (SELECT count(c.teacher_type) FROM udise_staffreg c WHERE a.school_id = c.school_key_id AND c.teacher_type =36 ) as  total_pgteachers, 
          GROUP_CONCAT(DISTINCT b.class_section) AS group_section 
          FROM students_school_child_count a 
          JOIN students_child_detail b ON b.school_id =a.school_id 
          WHERE a.district_id=".$dist." AND a.school_type_id IN (".$filter.") AND a.cate_type in('Higher Secondary School','High School')  
          AND ((a.c9_b+a.c9_g+a.c9_t > 0 AND a.c9_b+a.c9_g+a.c9_t <= ".$stud." ) or (a.c10_b+a.c10_g+a.c10_t > 0 AND a.c10_b+a.c10_g+a.c10_t <= ".$stud." )or (a.c11_b+a.c11_g+a.c11_t > 0 AND a.c11_b+a.c11_g+a.c11_t <= ".$stud." )or (a.c12_b+a.c12_g+a.c12_t > 0 AND a.c12_b+a.c12_g+a.c12_t <= ".$stud." ))  
          AND class_studying_id IN (9,10,11,12) 
          GROUP BY a.school_id;"; 
         } 
         else{ 
                
                // $sql_old ="SELECT a.district_id, a.district_name, count(a.school_name) as total_no_of_schools, a.school_type, a.school_type_id, a.management, a.category, a.cate_type  
                //       FROM students_school_child_count a  
                //       WHERE a.cate_type in ('Higher Secondary School','High School')  
                //       AND ".$condition."  
                //       AND a.school_type_id in(".$filter.") 
                //       GROUP BY a.district_id;"; 
 
                      // $sql_recent ="SELECT a.district_id, a.district_name, count(a.school_name) AS total_no_of_schools,a.school_type, a.school_type_id, a.management, a.category, a.cate_type, a.c11_b+a.c11_g+a.c11_t AS Plus1, a.c12_b+a.c12_g+a.c12_t AS Plus2 
                      // FROM students_school_child_count a  
                      // WHERE a.cate_type = 'Higher Secondary School'  
                      // AND (a.c12_b+a.c12_g+a.c12_t <=".$stud." AND a.c12_b+a.c12_g+a.c12_t > 0)  OR (a.c11_b+a.c11_g+a.c11_t <=".$stud." AND a.c11_b+a.c11_g+a.c11_t > 0 ) 
                      // AND a.school_type_id IN(".$filter.") GROUP BY a.district_id;"; 
 
                      $sql="SELECT a.district_id, a.district_name, count(a.school_name) AS total_no_of_schools, 
                                   a.school_type, a.school_type_id, a.management, a.category, a.cate_type,  
                                   a.c9_b+a.c9_g+a.c9_t AS nineth,  
                                   a.c10_b+a.c10_g+a.c10_t AS tenth, 
                                   a.c11_b+a.c11_g+a.c11_t AS Plus1, 
                                   a.c12_b+a.c12_g+a.c12_t AS Plus2  
                            FROM students_school_child_count a  
                            WHERE a.cate_type in ('Higher Secondary School','High School')  
                            AND ((a.c9_b+a.c9_g+a.c9_t > 0 AND a.c9_b+a.c9_g+a.c9_t <= ".$stud." ) or (a.c10_b+a.c10_g+a.c10_t > 0 AND a.c10_b+a.c10_g+a.c10_t <= ".$stud." )or (a.c11_b+a.c11_g+a.c11_t > 0 AND a.c11_b+a.c11_g+a.c11_t <= ".$stud." )or (a.c12_b+a.c12_g+a.c12_t > 0 AND a.c12_b+a.c12_g+a.c12_t <= ".$stud." ))  
                            AND a.school_type_id in (".$filter.") GROUP BY a.district_id;"; 
                       
        } 
        $query = $this->db->query($sql); 
        // print_r($this->db->last_query()); 
        return $query->result(); 
       
    } 
 
    public function get_student_strength_groupwise_dtl($where1) 
      { 
        // $sql_old ="SELECT group_code_id, group_name ,class_studying_id,class_section  
        // FROM students_child_detail 
        // JOIN baseapp_group_code on baseapp_group_code.id =students_child_detail.group_code_id 
        // WHERE school_id=".$where1." and class_studying_id in (11,12);"; 
 
$sql="SELECT students_child_detail.group_code_id, baseapp_group_code.group_name ,students_child_detail.class_studying_id,students_child_detail.class_section ,count(students_child_detail.unique_id_no) as students_name_count 
FROM students_child_detail 
left JOIN baseapp_group_code on baseapp_group_code.id = students_child_detail.group_code_id 
WHERE school_id=".$where1." and class_studying_id in (9,10,11,12) and transfer_flag= 0 
group by group_name,class_studying_id,class_section ;"; 
            $query = $this->db->query($sql); 
        return $query->result();       
    }

 public function dge_2017_18_report()
{
   $sql ="SELECT COUNT(1) AS std_cnt,district_name,district_id,1 AS dge FROM dge_class12_2018
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE
where school_type_id in (1,2,4) 
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018' and laptop_distributed=1 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018' and laptop_distributed=0 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id
";
       $query = $this->db->query($sql);
           return $query->result();   
}
  public function dge_2017_18_report_blk($dist_id)
{
   $sql ="SELECT COUNT(1) AS std_cnt,block_name,block_id,1 AS dge FROM dge_class12_2018
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4) 
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4)  and laptop_distributed=1  and student_past_12_status.ac_year='2017-2018' and class_type in ('government','aided')
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4)  and laptop_distributed=0  and student_past_12_status.ac_year='2017-2018' and class_type in ('government','aided')
GROUP BY students_school_child_count.block_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function dge_2017_18_report_schl($block_id)
{

$sql ="select dge_class12_2018.UDISE_CODE,count(dge_class12_2018.PER_REGNO) as PER_REGNO,
(select count(*) from student_past_12_status where ac_year= '2017-2018' and class_type in ('government','aided') and student_past_12_status.school_udise_code=students_school_child_count.udise_code and laptop_distributed=1) as assigned,(select count(*) from student_past_12_status where ac_year= '2017-2018' and  class_type in ('government','aided') and student_past_12_status.school_udise_code=students_school_child_count.udise_code and laptop_distributed=0) as not_marked,
(select count(PER_REGNO) from dge_class12_2018 where dge_class12_2018.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2018.udise_code 
from dge_class12_2018
join students_school_child_count on students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function dge_2018_19_report()
{
   $sql ="SELECT COUNT(1) AS std_cnt,district_name,district_id,1 AS dge FROM dge_class12_2019
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE
where school_type_id in (1,2,4)
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4) and student_past_12_status.ac_year='2018-2019' and laptop_distributed=1 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4) and student_past_12_status.ac_year='2018-2019' and laptop_distributed=0 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
  public function dge_2018_19_report_blk($dist_id)
{
   $sql ="SELECT COUNT(1) AS std_cnt,block_name,block_id,1 AS dge FROM dge_class12_2019
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4) 
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4) and class_type in ('government','aided')   and student_past_12_status.ac_year='2018-2019' and laptop_distributed=1
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4) and class_type in ('government','aided')  and student_past_12_status.ac_year='2018-2019' and laptop_distributed=1
GROUP BY students_school_child_count.block_id
";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function dge_2018_19_report_schl($block_id)
{

$sql = "select dge_class12_2019.UDISE_CODE,count(dge_class12_2019.PER_REGNO) as PER_REGNO,
(select count(*) from student_past_12_status where student_past_12_status.school_udise_code=students_school_child_count.udise_code  and student_past_12_status.ac_year='2018-2019' and laptop_distributed=1 and class_type in ('government','aided')) as assigned,
(select count(*) from student_past_12_status where ac_year= '2018-2019' and student_past_12_status.school_udise_code=students_school_child_count.udise_code and laptop_distributed=0 and class_type in ('government','aided')) as not_marked,
(select count(PER_REGNO) from dge_class12_2019 where dge_class12_2019.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2019.udise_code 
from dge_class12_2019
 join students_school_child_count on students_school_child_count.udise_code=dge_class12_2019.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function teacher_child_studyingstatus()
    {
        $sql="SELECT distinct district_id,district_name, sum(teach_tot)as staff,0 as No,0 as Yes,0 as NA FROM students_school_child_count WHERE district_id is not null and school_type_id in (1) group by district_id
UNION ALL
select distinct students_school_child_count.district_id,students_school_child_count.district_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
WHERE school_type_id in (1)
group by students_school_child_count.district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
  public function teacher_child_studyingstatus_district($district_id)
    {
   //  print_r($district_id);
        $sql="SELECT block_id,block_name,district_name, sum(teach_tot)as staff,0 as No,0 as Yes,0 as NA FROM students_school_child_count WHERE district_id is not null and district_name='".$district_id."' and school_type_id in (1) group by block_id
UNION ALL
select students_school_child_count.block_id,students_school_child_count.block_name,students_school_child_count.district_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
WHERE students_school_child_count.district_name='".$district_id."' and school_type_id in (1)
group by students_school_child_count.block_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
public function teacher_child_studyingstatus_block($block_id)
    {
   // print_r($district_id); die();

        $sql="SELECT udise_code,school_name,school_id,block_name, sum(teach_tot)as staff,0 as No,0 as Yes,0 as NA FROM students_school_child_count WHERE block_id is not null and block_name='".$block_id."' and school_type_id in (1,2,4) group by school_id

UNION ALL
select students_school_child_count.udise_code,students_school_child_count.school_name,students_school_child_count.school_id,students_school_child_count.block_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
WHERE students_school_child_count.block_name='".$block_id."' and school_type_id in (1)
group by students_school_child_count.school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
    public function teacher_child_studyingstatus_std($school_name)
    {
   // print_r($district_id); die();
        $sql="select students_child_detail.unique_id_no,students_child_detail.name,(select school_name from students_school_child_count where students_child_detail.school_id=students_school_child_count.school_id) as school_name,(select udise_code from students_school_child_count where students_child_detail.school_id=students_school_child_count.school_id) as udise_code,students_school_child_count.block_name,null as staff,sum(case when question1=2 then 1 else 0 end) as No,
sum(case when question1=1 then 1 else 0 end) as Yes,
sum(case when question1=3 then 1 else 0 end) as NA
from teachers_child_studyingstatus
LEFT JOIN udise_staffreg on udise_staffreg.teacher_code=teachers_child_studyingstatus.teacher_code
LEFT JOIN students_school_child_count on students_school_child_count.school_id=udise_staffreg.school_key_id
LEFT JOIN students_child_detail on students_child_detail.unique_id_no=teachers_child_studyingstatus.emis_no1
WHERE students_school_child_count.school_name='".$school_name."' and school_type_id in (1,2,4) and question1=1
group by students_child_detail.unique_id_no;";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }

    public function class_12_status_cate()
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,
sum(current_status='joined arts and science /') as arts_sci,
sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4) and student_past_12_status.ac_year='2018-2019' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY district_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
     public function class_12_status_cate_blk($district_name)
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,block_name,block_id,
sum(current_status='joined arts and science /') as arts_sci,
sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where district_name='".$district_name."' and school_type_id in (1,2,4) and student_past_12_status.ac_year='2018-2019' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY block_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
     public function class_12_status_cate_schl($block_name)
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,block_name,block_id,school_name,
sum(current_status='joined arts and science /') as arts_sci,
sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where block_name='".$block_name."' and school_type_id in (1,2,4) and student_past_12_status.ac_year='2018-2019' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
     public function class_12_status_cate_17_18()
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,

sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4) and student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY district_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
    }
 public function class_12_status_cate_17_18_blk($district_name)
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,block_name,block_id,
sum(current_status='joined arts and science /') as arts_sci,
sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where district_name='".$district_name."' and school_type_id in (1,2,4) and student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY block_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
     public function class_12_status_cate_17_18_schl($block_name)
    {
   // print_r($district_id); die();
        $sql="
SELECT district_name,district_id,block_name,block_id,school_name,
sum(current_status='joined arts and science /') as arts_sci,
sum(current_status='joined arts and science / law college') as arts_sci_law,
sum(current_status='joined engineering colleg' or current_status='joined engineering college') as eng,
sum(current_status='joined medical college') as medi_clg,
sum(current_status='joined polytechnic colleg' or current_status='joined polytechnic college') as poly_clg,
sum(current_status='not studying / working') as stud_work,
sum(current_status='other') as other,
sum(current_status='working') as working
 FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where block_name='".$block_name."' and school_type_id in (1,2,4) and student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass' and class_type in('aided','government')
GROUP BY school_id";
        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query->result();
    }
    public function dge_2017_18_cate()
{
   $sql ="SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when (class_type='aided' or class_type='government') and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass'  and students_school_child_count.school_type_id in (1,2,4)
GROUP BY students_school_child_count.district_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
  public function dge_2017_18_cate_blk($dist_id)
{
   $sql ="SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when class_type='aided' or class_type='government' and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id,block_name,block_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and district_name='".$dist_id."' and student_past_12_status.result='pass'
GROUP BY students_school_child_count.block_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function dge_2017_18_cate_schl($block_name)
{

$sql ="SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when class_type='aided' or class_type='government' and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id,udise_code,school_type,school_name FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and block_name='".$block_name."' and student_past_12_status.result='pass'
and school_type_id in (1,2,4) GROUP BY students_school_child_count.school_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function dge_2018_19_cate()
{
   $sql ="SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when class_type='aided' and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2018-2019' and student_past_12_status.result='pass'  
GROUP BY students_school_child_count.district_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
  public function dge_2018_19_cate_blk($dist_id)
{
   $sql ="SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when class_type='aided' and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id,block_name,block_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2018-2019' and district_name='".$dist_id."' and student_past_12_status.result='pass'
GROUP BY students_school_child_count.block_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function dge_2018_19_cate_schl($block_name)
{

$sql = "SELECT sum(case when students_school_child_count.school_type_id=1 then 1 else 0 end) AS govt,
     sum(case when class_type='aided' and  students_school_child_count.school_type_id=2 then 1 else 0 end) AS aided,
       sum(case when class_type='aided' and students_school_child_count.school_type_id=4 then 1 else 0 end) AS par_aid,
       district_name,district_id,udise_code,school_type,school_name FROM student_past_12_status
LEFT JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2018-2019' and block_name='".$block_name."' and student_past_12_status.result='pass' 
GROUP BY students_school_child_count.school_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 function schoolwise_class_question_report_dist($school_type,$cate_type){
   
   /*$this->db->select("sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) AS std_cnt,district_name,district_id,1 AS dge");
   $this->db->FROM("students_school_child_count");

          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
   //$this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("district_id");
   $this->db->get();
   $query1 = $this->db->last_query();

   $this->db->select("COUNT(distinct(student_id)) AS assigned,district_name,district_id,2 as dge");
   $this->db->FROM("schoolnew_qstudent_markdetails");
   $this->db->JOIN("students_school_child_count","students_school_child_count.school_id=schoolnew_qstudent_markdetails.school_id");
   $this->db->WHERE("class_id BETWEEN '1' AND '8'");
   $this->db->WHERE("term_id",1);

          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
  // $this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("district_id");

   $this->db->get();
   $query2 = $this->db->last_query();
  $query = $this->db->query($query1." UNION ".$query2);
  return $query->result();
 //print_r($this->db->last_query());die;*/
       $SQL="select sc.district_name as District,sc.district_id,sc.block_name as Block,sc.edu_dist_name as Education_District,sc.udise_code as UDISE_Code,sc.school_name as School_Name,sc.management as Management,sc.school_type as Management_Type,sc.category as Category,sc.cate_type as Category_Group,(select sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) from students_school_child_count where students_school_child_count.district_id=sc.district_id and school_type_id in (1,2,4)) as Total_Students,count(distinct m.student_id) as Term1_Marked from students_school_child_count sc left join schoolnew_qstudent_markdetails m on m.school_id=sc.school_id and class_id between 1 and 8 and term_id=1 where sc.school_type_id in (1,2,4) group by sc.district_id";
   
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());die;
       return $query->result();
   }
    function schoolwise_class_question_report_blk($dist_id,$school_type,$cate_type){
   

   $this->db->select("sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) AS std_cnt,block_name,block_id,1 AS dge");
   $this->db->FROM("students_school_child_count");
 $this->db->WHERE("district_name",$dist_id);
          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
  // $this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("block_id");
   $this->db->get();
   $query1 = $this->db->last_query();

   $this->db->select("COUNT(distinct(student_id)) AS assigned,block_name,block_id,2 as dge");
   $this->db->FROM("schoolnew_qstudent_markdetails");
   $this->db->JOIN("students_school_child_count","students_school_child_count.school_id=schoolnew_qstudent_markdetails.school_id");
   $this->db->WHERE("class_id BETWEEN '1' AND '8'");
   $this->db->WHERE("term_id",1);
   $this->db->WHERE("district_name",$dist_id);

          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
  // $this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("block_id");

   $this->db->get();
   $query2 = $this->db->last_query();
  $query = $this->db->query($query1." UNION ".$query2);
// print_r($this->db->last_query());die;
  return $query->result();
      /* $SQL="SELECT sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) AS std_cnt,block_name,block_id,1 AS dge FROM students_school_child_count
       where school_type_id in (1,2,4) and district_name='".$dist_id."'
GROUP BY block_name
UNION ALL
SELECT COUNT(distinct(student_id)) AS assigned,block_name,block_id,2 as dge FROM schoolnew_qstudent_markdetails
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_qstudent_markdetails.school_id
where class_id BETWEEN '1' AND '8' and school_type_id in (1,2,4)  and students_school_child_count.district_name='".$dist_id."'
GROUP BY students_school_child_count.block_name";
   
         $query = $this->db->query($SQL);
        print_r($this->db->last_query());die;
       return $query->result();*/
   }
    function schoolwise_class_question_report_schl($blk_id,$school_type,$cate_type){
   

   $this->db->select("sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) AS std_cnt,block_name,block_id,school_name,students_school_child_count.udise_code,1 AS dge");
   $this->db->FROM("students_school_child_count");
 $this->db->WHERE("block_name",$blk_id);
          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
  // $this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("school_id");
   $this->db->get();
   $query1 = $this->db->last_query();

   $this->db->select("COUNT(distinct(student_id)) AS assigned,block_name,block_id,school_name,students_school_child_count.udise_code,2 as dge");
   $this->db->FROM("schoolnew_qstudent_markdetails");
   $this->db->JOIN("students_school_child_count","students_school_child_count.school_id=schoolnew_qstudent_markdetails.school_id");
   $this->db->WHERE("class_id BETWEEN '1' AND '8'");
    $this->db->WHERE("term_id",1);
   $this->db->WHERE("block_name",$blk_id);

          if(!empty($school_type))
          {
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          

            $this->db->WHERE_in('school_type',$school_type);
          }else if(empty($this->input->get('magt_type')))
          {
            $this->db->WHERE('school_type','Government');
          }
          else
          {
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
          }
          if(!empty($cate_type))
          {
               $this->db->WHERE_in('cate_type',$cate_type);
          }
 //  $this->db->where_in("school_type_id",array(1,2,4));
   $this->db->group_by("students_school_child_count.school_id");

   $this->db->get();
   $query2 = $this->db->last_query();
  $query = $this->db->query($query1." UNION ALL ".$query2);
  //print_r($this->db->last_query());
  return $query->result();
   }
public function laptop_distribution_monitoring()
{
  $SQL="SELECT count(students_school_child_count.school_id) as tot_schl,count(DISTINCT(student_past_12_status.school_udise_code)) as schl_sts_cnt,
  sum(case when students_school_child_count.school_type_id in(1,2,4) and class_type in ('government','aided') then (c12_b+c12_g+c12_t) else 0 end) AS stud_cnt,
     sum(case when laptop_distributed=0 then 1 else 0 end) AS lap_not_dis,
       sum(case when laptop_distributed=1 then 1 else 0 end) AS lap_dis,
       district_name,district_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass'  and students_school_child_count.school_type_id in (1,2,4) and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function laptop_distribution_monitoring_dist($dist_name)
{
  $SQL="SELECT count(students_school_child_count.school_id) as tot_schl,count(DISTINCT(student_past_12_status.school_udise_code)) as schl_sts_cnt,
  sum(case when students_school_child_count.school_type_id in(1,2,4) and class_type in ('government','aided') then (c12_b+c12_g+c12_t) else 0 end) AS stud_cnt,
     sum(case when laptop_distributed=0 then 1 else 0 end) AS lap_not_dis,
       sum(case when laptop_distributed=1 then 1 else 0 end) AS lap_dis,
       district_name,block_name,block_id,district_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass'  and students_school_child_count.school_type_id in (1,2,4) and class_type in ('government','aided') and district_name='".$dist_name."'
GROUP BY students_school_child_count.block_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function laptop_distribution_monitoring_block($block_name)
{
  $SQL="SELECT count(students_school_child_count.school_id) as tot_schl,count(DISTINCT(student_past_12_status.school_udise_code)) as schl_sts_cnt,
  sum(case when students_school_child_count.school_type_id in(1,2,4) and class_type in ('government','aided') then (c12_b+c12_g+c12_t) else 0 end) AS stud_cnt,
     sum(case when laptop_distributed=0 then 1 else 0 end) AS lap_not_dis,
       sum(case when laptop_distributed=1 then 1 else 0 end) AS lap_dis,
       school_name,school_id,block_name,block_id,district_id FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where  student_past_12_status.ac_year='2017-2018' and student_past_12_status.result='pass'  and students_school_child_count.school_type_id in (1,2,4) and class_type in ('government','aided') and block_name='".$block_name."'
GROUP BY students_school_child_count.school_id";
         $query = $this->db->query($SQL);
       return $query->result(); 
}
public function past_12_2017_18_report()
{
   $sql ="SELECT COUNT(1) AS std_cnt,district_name,district_id,1 AS dge FROM dge_class12_2018
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE
where school_type_id in (1,2,4) 
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018' and flag=1 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id
UNION ALL
SELECT COUNT(1) AS assigned,district_name,district_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
where school_type_id in (1,2,4)  and student_past_12_status.ac_year='2017-2018' and flag=0 and class_type in ('government','aided')
GROUP BY students_school_child_count.district_id
";
       $query = $this->db->query($sql);
           return $query->result();   
}
  public function past_12_2017_18_report_blk($dist_id)
{
   $sql ="SELECT COUNT(1) AS std_cnt,block_name,block_id,1 AS dge FROM dge_class12_2018
JOIN students_school_child_count ON students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4) 
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,2 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4)  and flag=1  and student_past_12_status.ac_year='2017-2018' and class_type in ('government','aided')
GROUP BY students_school_child_count.block_id
UNION ALL
SELECT COUNT(1) AS assigned,block_name,block_id,3 as dge FROM student_past_12_status
JOIN students_school_child_count ON students_school_child_count.udise_code=student_past_12_status.school_udise_code
WHERE district_name='".$dist_id."' and school_type_id in (1,2,4)  and flag=0  and student_past_12_status.ac_year='2017-2018' and class_type in ('government','aided')
GROUP BY students_school_child_count.block_id";
       $query = $this->db->query($sql);
           return $query->result();   
}
 public function past_12_2017_18_report_schl($block_id)
{

$sql ="select dge_class12_2018.UDISE_CODE,count(dge_class12_2018.PER_REGNO) as PER_REGNO,
(select count(*) from student_past_12_status where ac_year= '2017-2018' and class_type in ('government','aided') and student_past_12_status.school_udise_code=students_school_child_count.udise_code and flag=1) as assigned,(select count(*) from student_past_12_status where ac_year= '2017-2018' and  class_type in ('government','aided') and student_past_12_status.school_udise_code=students_school_child_count.udise_code and flag=0) as not_marked,
(select count(PER_REGNO) from dge_class12_2018 where dge_class12_2018.udise_code=students_school_child_count.udise_code) as std_cnt,district_id,block_name,block_id,school_name,school_type,dge_class12_2018.udise_code 
from dge_class12_2018
join students_school_child_count on students_school_child_count.udise_code=dge_class12_2018.UDISE_CODE where block_name='".$block_id."' and school_type_id in (1,2,4)  
group by udise_code";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function slas_report_dist($pst,$gender)
{
  //print_r($gender);
   if($gender=='' || $gender=='all')
  {
    $gen="(gender='Boys' OR gender='Girls')";
  }
  else if($gender=="Boys")
  {
    $gen = "gender='Boys'";
  }
  else if($gender=="Girls")
  {
    $gen = "gender='Girls'";
  }
  $SQL="SELECT *,ROUND(((p0*100)/total),2) as per0,ROUND(((p1*100)/total),2) as per1,ROUND(((p2*100)/total),2) as per2,ROUND(((p3*100)/total),2) as per3,ROUND(((p4*100)/total),2) as per4 FROM (SELECT COUNT(1) AS total,district_id,district_name,
  SUM(CASE WHEN ".$pst."=0 THEN 1 ELSE 0 END) AS 'p0',
SUM(CASE WHEN ".$pst.">=1 AND ".$pst."<=3 THEN 1 ELSE 0 END) AS 'p1',
SUM(CASE WHEN ".$pst.">=4 AND ".$pst."<=6 THEN 1 ELSE 0 END) AS 'p2',
SUM(CASE WHEN ".$pst.">=7 AND ".$pst."<=9 THEN 1 ELSE 0 END) AS 'p3',
SUM(CASE WHEN ".$pst.">=10 AND ".$pst."<=12 THEN 1 ELSE 0 END) AS 'p4'
FROM students_slas_class7
JOIN students_school_child_count ON students_school_child_count.school_id=students_slas_class7.school_id
WHERE students_school_child_count.district_id IS NOT NULL and ".$gen." GROUP BY students_school_child_count.district_id) AS der1";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_blk($dist_id,$pst,$gender)
{
 if($gender=='' || $gender=='all')
  {
    $gen="(gender='Boys' OR gender='Girls')";
  }
  else if($gender=="Boys")
  {
    $gen = "gender='Boys'";
  }
  else if($gender=="Girls")
  {
    $gen = "gender='Girls'";
  }
  $SQL="SELECT *,ROUND(((p0*100)/total),2) as per0,ROUND(((p1*100)/total),2) as per1,ROUND(((p2*100)/total),2) as per2,ROUND(((p3*100)/total),2) as per3,ROUND(((p4*100)/total),2) as per4 FROM (SELECT COUNT(1) AS total,district_name,block_id,block_name,
  SUM(CASE WHEN ".$pst."=0 THEN 1 ELSE 0 END) AS 'p0',
SUM(CASE WHEN ".$pst.">=1 AND ".$pst."<=3 THEN 1 ELSE 0 END) AS 'p1',
SUM(CASE WHEN ".$pst.">=4 AND ".$pst."<=6 THEN 1 ELSE 0 END) AS 'p2',
SUM(CASE WHEN ".$pst.">=7 AND ".$pst."<=9 THEN 1 ELSE 0 END) AS 'p3',
SUM(CASE WHEN ".$pst.">=10 AND ".$pst."<=12 THEN 1 ELSE 0 END) AS 'p4'
FROM students_slas_class7
JOIN students_school_child_count ON students_school_child_count.school_id=students_slas_class7.school_id
WHERE  ".$gen." and students_school_child_count.district_id=".$dist_id." GROUP BY students_school_child_count.block_id) AS der1";
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl($blk_id,$pst,$gender)
{
 if($gender=='' || $gender=='all')
  {
    $gen="(gender='Boys' OR gender='Girls')";
  }
  else if($gender=="Boys")
  {
    $gen = "gender='Boys'";
  }
  else if($gender=="Girls")
  {
    $gen = "gender='Girls'";
  }
  $SQL="SELECT *,ROUND(((p0*100)/total),2) as per0,ROUND(((p1*100)/total),2) as per1,ROUND(((p2*100)/total),2) as per2,ROUND(((p3*100)/total),2) as per3,ROUND(((p4*100)/total),2) as per4 FROM (SELECT COUNT(1) AS total,district_name,block_id,block_name,students_school_child_count.school_name,students_school_child_count.school_id,
  SUM(CASE WHEN ".$pst."=0 THEN 1 ELSE 0 END) AS 'p0',
SUM(CASE WHEN ".$pst.">=1 AND ".$pst."<=3 THEN 1 ELSE 0 END) AS 'p1',
SUM(CASE WHEN ".$pst.">=4 AND ".$pst."<=6 THEN 1 ELSE 0 END) AS 'p2',
SUM(CASE WHEN ".$pst.">=7 AND ".$pst."<=9 THEN 1 ELSE 0 END) AS 'p3',
SUM(CASE WHEN ".$pst.">=10 AND ".$pst."<=12 THEN 1 ELSE 0 END) AS 'p4'
FROM students_slas_class7
JOIN students_school_child_count ON students_school_child_count.school_id=students_slas_class7.school_id
WHERE students_school_child_count.block_id IS NOT NULL and ".$gen." and students_school_child_count.block_id=".$blk_id." GROUP BY students_school_child_count.school_id) AS der1";
         $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl_dist($district_id,$block_id,$catty_id,$manage_id)
{

  if(!empty($catty_id))
  {
    $where="where des1.catty_id=".$catty_id."";
    $cate_type="des1.cate_type,des1.catty_id,";
  }
  else if(!empty($manage_id))
  {
   $where="where des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else if($district_id !="")
  {
     $where="WHERE students_school_child_count.district_id=".$district_id."";
   $groupby = "block_name";
     $cate_type="";
  }
  else if($block_id!="")
  {
  $where="WHERE students_school_child_count.block_id=".$block_id."";
   $groupby = "school_name";
     $cate_type="";
  }
  else
  {
      $where="";
     $cate_type="";
    $groupby = "district_name";
  }
  $SQL="SELECT ".$cate_type."des1.district_name,des1.district_id,sum(tot_schl) as tot_schl,
  sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT manage_id,cate_type,catty_id,district_name,district_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 ".$where."
 GROUP BY students_school_child_count.$groupby";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl_blk($dist_id,$catty_id,$manage_id)
{
  if(!empty($catty_id))
  {
    $where="WHERE students_school_child_count.district_id=".$dist_id." and des1.catty_id=".$catty_id."";
     $cate_type="des1.cate_type,des1.catty_id,";
  }
else if(!empty($manage_id))
  {
   $where="WHERE students_school_child_count.district_id=".$dist_id." and des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else
  {
    $where="WHERE students_school_child_count.district_id=".$dist_id."";
     $cate_type="";
  }

  $SQL="SELECT ".$cate_type."des1.block_name,des1.block_id,des1.district_name,sum(tot_schl) as tot_schl,
  sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT manage_id,cate_type,catty_id,block_name,block_id,district_name,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 ".$where."
 GROUP BY students_school_child_count.block_id";
         $query = $this->db->query($SQL);
       // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_schl_wise($blk_id,$catty_id,$manage_id)
{
  if(!empty($catty_id))
  {
    $where="WHERE students_school_child_count.block_id=".$blk_id." and des1.catty_id=".$catty_id."";
     $cate_type="des1.cate_type,";
  }
else if(!empty($manage_id))
  {
   $where="WHERE students_school_child_count.block_id=".$blk_id." and des1.manage_id=".$manage_id."";
    $cate_type="des1.manage_id,";
  }
  else
  {
    $where="WHERE students_school_child_count.block_id=".$blk_id."";
     $cate_type="des1.catty_id,";
  }
 
  $SQL="SELECT ".$cate_type."des1.school_name,des1.school_id,des1.block_name,des1.block_id,sum(tot_schl) as tot_schl,
sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT manage_id,cate_type,catty_id,school_name,students_slas_class7.school_id,block_name,block_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 ".$where."
GROUP BY students_school_child_count.school_id";
         $query = $this->db->query($SQL);
        //print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_cate_dist()
{
 
  $SQL="SELECT des1.catty_id,des1.district_name,des1.cate_type,sum(tot_schl) as tot_schl,
  sum(CASE WHEN per_school BETWEEN 0.00 AND 0.1 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.1  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0.00 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT district_name,district_id,cate_type,catty_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 GROUP BY students_school_child_count.catty_id";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
public function slas_report_mana_dist()
{
 
  $SQL="SELECT des1.management,des1.manage_id,des1.district_name,sum(tot_schl) as tot_schl,
  sum(CASE WHEN per_school BETWEEN 0.00 AND 0.00 then 1 else 0 end) as per_0,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0.00 AND 0.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per0,
sum(CASE WHEN per_school BETWEEN 0.00 AND 20.00 then 1 else 0 end) as per_20,
ROUND(((sum(CASE WHEN  per_school BETWEEN 0 AND 20.00  then 1 else 0 end)*100)/sum(tot_schl)),2) as per20,
sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end) as per_21_40,
ROUND(((sum(CASE WHEN per_school BETWEEN 20.01 AND 40.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per40,
sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00  then 1 else 0 end) as per_41_60,
ROUND(((sum(CASE WHEN per_school BETWEEN 40.01 AND 60.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per60,
sum(CASE WHEN per_school BETWEEN 60.01 AND 80.00 then 1 else 0 end) as per_61_80,
ROUND(((sum(CASE WHEN per_school BETWEEN 60.00 AND 80.00 then 1 else 0 end)*100)/sum(tot_schl)),2) as per80,
sum(CASE WHEN per_school BETWEEN 80.01 AND 100  then 1 else 0 end) as per_81_100,
ROUND(((sum(CASE WHEN per_school BETWEEN 80.01 AND 100 then 1 else 0 end)/sum(tot_schl)*100)),2) as per100

FROM
(SELECT district_name,district_id,students_school_child_count.management,students_school_child_count.manage_id,count(1) as tot_std,COUNT(DISTINCT(students_slas_class7.school_id)) AS tot_schl,SUM(tamil+english+science+maths+science+social) AS sub_tot,
 (sum(tamil+english+science+maths+science+social)/COUNT(1)) as avg_score,students_slas_class7.school_id AS schl_id,
ROUND(((SUM(tamil+english+science+maths+science+social)/COUNT(1))/COUNT(DISTINCT(students_slas_class7.school_id))),2) as per_school
 from students_slas_class7 JOIN students_school_child_count on students_school_child_count.school_id=students_slas_class7.school_id 
 GROUP BY students_slas_class7.school_id) AS des1
 JOIN students_school_child_count ON students_school_child_count.school_id=des1.schl_id
 GROUP BY students_school_child_count.manage_id";
         $query = $this->db->query($SQL);
      // print_r($this->db->last_query());
       return $query->result(); 

}
 public function student_marks_9_10($termid,$tname,$cls_id)
{
  switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   $sql ="
SELECT * FROM (SELECT COUNT(1) AS sec_cnt,district_name as dist,district_id
FROM schoolnew_section_group
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id
AND students_school_child_count.school_type_id IN (1,2,4)
WHERE schoolnew_section_group.class_id IN (".$cls_id.")
GROUP BY district_id) AS totsec
LEFT JOIN (
SELECT SUM(cnt) AS markedcnt,district_id,district_name FROM students_school_child_count
JOIN (
SELECT COUNT(1) AS cnt,school".$s_id."_id FROM (select school".$s_id."_id,class_id,section from ".$tname."
WHERE status".$s_id."=3 and class_id in(".$cls_id.") and cp_status!=1
GROUP BY school".$s_id."_id,class_id,section) AS markedsec GROUP BY school".$s_id."_id) AS final_der ON final_der.school".$s_id."_id=students_school_child_count.school_id
GROUP BY district_id) AS mkcnt ON mkcnt.district_id=totsec.district_id order by totsec.dist;
";
//print_r($sql);die();
       $query = $this->db->query($sql);
           return $query->result();   
}
public function student_marks_9_10_blk($dist_id,$termid,$tname,$cls_id)
{
  switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   $sql ="
SELECT * FROM (SELECT COUNT(1) AS sec_cnt,block_name as blk,block_id
FROM schoolnew_section_group
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id
AND students_school_child_count.school_type_id IN (1,2,4)
WHERE schoolnew_section_group.class_id IN (".$cls_id.") and district_name='".$dist_id."'
GROUP BY block_id) AS totsec
LEFT JOIN (
SELECT SUM(cnt) AS markedcnt,block_id,block_name FROM students_school_child_count
JOIN (
SELECT COUNT(1) AS cnt,school".$s_id."_id FROM (select school".$s_id."_id,class_id,section from ".$tname."
WHERE status".$s_id."=3 and class_id in(".$cls_id.") and cp_status!=1
GROUP BY school1_id,class_id,section) AS markedsec GROUP BY school".$s_id."_id) AS final_der ON final_der.school".$s_id."_id=students_school_child_count.school_id
GROUP BY block_id) AS mkcnt ON mkcnt.block_id=totsec.block_id order by totsec.blk;
";
       $query = $this->db->query($sql);
           return $query->result();   
}
public function student_marks_9_10_schl($block_id,$termid,$tname,$cls_id)
{
  switch($termid)
                      {
                        case '1':
                        case '2': $s_id='1';break;
                        case '3':
                        case '4': $s_id='2';break;
                        case '5': 
                        case '6': $s_id='3';break;
                       
                      }
   $sql ="
SELECT * FROM (SELECT COUNT(1) AS sec_cnt,school_name as schl,school_id
FROM schoolnew_section_group
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id
AND students_school_child_count.school_type_id IN (1,2,4)
WHERE schoolnew_section_group.class_id IN (".$cls_id.") and block_name='".$block_id."'
GROUP BY school_id) AS totsec
LEFT JOIN (
SELECT SUM(cnt) AS markedcnt,school_id,school_name FROM students_school_child_count
JOIN (
SELECT COUNT(1) AS cnt,school".$s_id."_id FROM (select school".$s_id."_id,class_id,section from ".$tname."
WHERE status".$s_id."=3 and class_id in(".$cls_id.") and cp_status!=1
GROUP BY school1_id,class_id,section) AS markedsec GROUP BY school".$s_id."_id) AS final_der ON final_der.school".$s_id."_id=students_school_child_count.school_id
GROUP BY school_id) AS mkcnt ON mkcnt.school_id=totsec.school_id
";
       $query = $this->db->query($sql);
      //print_r($sql);die();
           return $query->result();   
} 

  public function  emis_state_pindics_report($district_id,$block_id)
      {

    if($district_id!="")
    {
    
     $sql = "select sc.school_id,sc.block_name,sc.udise_code,sc.school_name,sc.school_type,count(*) as teach_staff,sum(p.teacher_id is not null) as teach_completed,case when sum(p.hm_ev_status=1) is null then 0 else sum(p.hm_ev_status=1) end  as hm_completed,case when sum(p.brte_ev_status=1) is null then 0 else sum(p.brte_ev_status=1) end  as brte_completed from udise_staffreg u
        join students_school_child_count sc on sc.school_id=u.school_key_id
        left join teacher_pindics p on p.teacher_id=u.u_id and p.status=1  
        where sc.district_id = ".$district_id." and sc.school_type_id in (1,2,4) and u.archive=1 and u.class_taught in (1,2,3,6,9) and u.appointment_nature=1 and u.teacher_type in (8,9,11,12,13,17,18,21,22,23,24,25,26,27,28,29,30,31,32,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,87,88,89,90,91,92,93,94,97,98,99,103,117,118)group by sc.school_id order by sc. block_name;";
        
    }
    else if($block_id!="")
    {
     $sql = "select sc.school_id,sc.block_name,sc.udise_code,sc.school_name,sc.school_type,count(*) as teach_staff,sum(p.teacher_id is not null) as teach_completed,case when sum(p.hm_ev_status=1) is null then 0 else sum(p.hm_ev_status=1) end  as hm_completed,case when sum(p.brte_ev_status=1) is null then 0 else sum(p.brte_ev_status=1) end  as brte_completed from udise_staffreg u
        join students_school_child_count sc on sc.school_id=u.school_key_id
        left join teacher_pindics p on p.teacher_id=u.u_id and p.status=1  
        where sc.block_id = ".$block_id." and sc.school_type_id in (1,2,4) and u.archive=1 and u.class_taught in (1,2,3,6,9) and u.appointment_nature=1 and u.teacher_type in (8,9,11,12,13,17,18,21,22,23,24,25,26,27,28,29,30,31,32,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,87,88,89,90,91,92,93,94,97,98,99,103,117,118)group by sc.school_id order by sc. block_name;";
        
    }
    else
    {
    $sql = "select sc.district_name,count(*) as teach_staff,sum(p.teacher_id is not null) as teach_completed,case when sum(p.hm_ev_status=1) is null then 0 else sum(p.hm_ev_status=1) end  as hm_completed,case when sum(p.brte_ev_status=1) is null then 0 else sum(p.brte_ev_status=1) end  as brte_completed from udise_staffreg u
        join students_school_child_count sc on sc.school_id=u.school_key_id
        left join teacher_pindics p on p.teacher_id=u.u_id and p.status=1  
        where sc.school_type_id in (1,2,4) and u.archive=1 and u.class_taught in (1,2,3,6,9) and u.appointment_nature=1 and u.teacher_type in (8,9,11,12,13,17,18,21,22,23,24,25,26,27,28,29,30,31,32,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,87,88,89,90,91,92,93,94,97,98,99,103,117,118)group by sc.district_id order by sc.district_name;";
        
    }
        


        $query = $this->db->query($sql);
        return $query->result();
      } 
      
public function student_co_scholastic_1_8()
{

   $sql ="SELECT * FROM (SELECT COUNT(1) AS sec_cnt,district_name as dist,district_id FROM schoolnew_section_group JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id AND students_school_child_count.school_type_id IN (1,2,4) WHERE schoolnew_section_group.class_id between 8 and 10 GROUP BY district_id) AS totsec LEFT JOIN ( SELECT SUM(cnt) AS markedcnt,district_id,district_name FROM students_school_child_count JOIN ( SELECT COUNT(1) AS cnt,school_id FROM (select school_id,schoolnew_qstudent_cs_markdetails.class_id,section from schoolnew_qstudent_cs_markdetails
left join schoolnew_section_group on schoolnew_section_group.school_key_id=schoolnew_qstudent_cs_markdetails.school_id
 WHERE status=1 and schoolnew_qstudent_cs_markdetails.class_id between 8 and 10 GROUP BY school_id,schoolnew_qstudent_cs_markdetails.class_id,section) AS markedsec GROUP BY school_id) AS final_der ON final_der.school_id=students_school_child_count.school_id GROUP BY district_id) AS mkcnt ON mkcnt.district_id=totsec.district_id order by totsec.dist
";
//print_r($sql);die();
       $query = $this->db->query($sql);
           return $query->result();   
}

public function student_co_scholastic_1_8_blk($dist_id)
{
 if($this->session->userdata('emis_user_type_id') == 5){
  $dist="district_name='".$dist_id."'";
 }
 else  if($this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 3  ){
  $dist="district_id=".$dist_id."";
}
else if($this->session->userdata('emis_user_type_id')==10){
  $dist="edu_dist_id=".$dist_id."";
}
   $sql ="SELECT * FROM (SELECT COUNT(1) AS sec_cnt,block_name as blk,block_id FROM schoolnew_section_group JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id AND students_school_child_count.school_type_id IN (1,2,4) WHERE schoolnew_section_group.class_id between 8 and 10 and $dist
GROUP BY block_id) AS totsec LEFT JOIN ( SELECT SUM(cnt) AS markedcnt,block_id,block_name FROM students_school_child_count JOIN ( SELECT COUNT(1) AS cnt,school_id FROM (select school_id,schoolnew_qstudent_cs_markdetails.class_id,section from schoolnew_qstudent_cs_markdetails
left join schoolnew_section_group on schoolnew_section_group.school_key_id=schoolnew_qstudent_cs_markdetails.school_id
 WHERE status=1 and schoolnew_qstudent_cs_markdetails.class_id between 8 and 10 GROUP BY school_id,schoolnew_qstudent_cs_markdetails.class_id,section) AS markedsec GROUP BY school_id) AS final_der ON final_der.school_id=students_school_child_count.school_id GROUP BY block_id) AS mkcnt ON mkcnt.block_id=totsec.block_id order by totsec.blk
";
//print_r($sql);die();
       $query = $this->db->query($sql);
           return $query->result();   
}
public function student_co_scholastic_1_8_schl($block_id)
{

   if($this->session->userdata('emis_user_type_id') == 5 || $this->session->userdata('emis_user_type_id') == 9 || $this->session->userdata('emis_user_type_id') == 10 || $this->session->userdata('emis_user_type_id') == 3 ){
  $blk="block_name='".$block_id."'";
 }
 else {
  $blk="block_id=".$block_id."";
}
   $sql ="SELECT * FROM (SELECT COUNT(1) AS sec_cnt,school_name as schl,school_id FROM schoolnew_section_group JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_section_group.school_key_id AND students_school_child_count.school_type_id IN (1,2,4) WHERE schoolnew_section_group.class_id between 8 and 10  and $blk GROUP BY school_id) AS totsec LEFT JOIN (SELECT SUM(cnt) AS markedcnt,students_school_child_count.school_id,school_name FROM students_school_child_count JOIN ( SELECT COUNT(1) AS cnt,school_id FROM (select schoolnew_qstudent_cs_markdetails.school_id,schoolnew_qstudent_cs_markdetails.class_id,section from schoolnew_qstudent_cs_markdetails
left join schoolnew_section_group on schoolnew_section_group.school_key_id=schoolnew_qstudent_cs_markdetails.school_id
 WHERE status=1 and schoolnew_qstudent_cs_markdetails.class_id between 8 and 10 GROUP BY schoolnew_qstudent_cs_markdetails.school_id,schoolnew_qstudent_cs_markdetails.class_id,section) AS markedsec GROUP BY school_id) AS final_der ON final_der.school_id=students_school_child_count.school_id GROUP BY students_school_child_count.school_id) AS mkcnt ON mkcnt.school_id=totsec.school_id order by totsec.schl
";
//print_r($sql);die();
       $query = $this->db->query($sql);
           return $query->result();   
}
      /**Added by wesley**/
      public function  emis_state_hm_pidics()
      {
        /*$data = "select a.district_id,sum(a.teach_tot) as teach_staff,sum(COALESCE(b.id,0)) as completed,a. district_name from students_school_child_count a
        left join (select count(teacher_pindics.teacher_id) as id,teacher_pindics.teacher_id,teacher_pindics.school_key_id from teacher_pindics join udise_staffreg on u_id = hm_id where teacher_pindics.hm_ev_status =1 and udise_staffreg.teacher_type in (26,27,28,29) group by teacher_pindics.teacher_id) b on b.school_key_id = a.school_id 
        group by a.district_id;";  */         
        $data = "select a.district_id,sum(a.teach_tot) as teach_staff,sum(COALESCE(b.id,0)) as completed,a. district_name from students_school_child_count a
        left join (select count(teacher_pindics.teacher_id) as id,teacher_pindics.teacher_id,teacher_pindics.school_key_id from teacher_pindics where hm_ev_status = 1 group by teacher_id) b on b.school_key_id = a.school_id 
        where a.school_type_id in (1,2,4) group by a.district_id;";        
        $query = $this->db->query($data);
        return $query->result();
      }      
      public function  emis_state_teacher_pidics()
      {
        $data = "select a.district_id,sum(a.teach_tot) as teach_staff,sum(COALESCE(b.id,0)) as completed,a. district_name from students_school_child_count a
        left join (select count(teacher_pindics.teacher_id) as id,teacher_pindics.teacher_id,teacher_pindics.school_key_id from teacher_pindics where status = 1 group by teacher_id) b on b.school_key_id = a.school_id 
        where a.school_type_id in (1,2,4) group by a.district_id;";       
        $query = $this->db->query($data);
        return $query->result();
      }  
      /**Added by wesley**/   
      public function get_students_admit_details($search,$db_col)
  {
    //print_r($db_col);die();
      $this->db->select('a.unique_id_no,a.name,a.id,a.gender,a.class_studying_id,a.class_section,a.education_medium_id,a.school_admission_no,a.request_flag,a.school_id,a.dob,a.transfer_flag,c.community_name,b.school_name,a.smart_id')
               ->from('students_child_detail a')
               ->join('students_school_child_count b','b.school_id = a.school_id','left')
               ->join('baseapp_community c','c.id = a.community_id','left')
               // ->where('a.transfer_flag',1)
               ->where($db_col,$search);
             
      $result = $this->db->get()->result();
       //print_r($result);
      $records = [];
      if(!empty($result))
      {
          $records['data'] = $result;
          $records['status'] = true;
          $records['message'] = '';
      }else
      {
           $records['data'] = '';
          $records['status'] = false; 
          $records['message'] = 'No Data Available';
      }
      return $records;

  }
  
  
  
  
  public function getallstateclass($school_type,$cate_type){

        $this->db->SELECT('`students_school_child_count`.`district_name`,`students_school_child_count`.`district_id`, `school_type`, `students_school_child_count`.`block_name`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count');
        if(!empty($school_type)){
        
             // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
            $this->db->WHERE_in('school_type_id',$school_type);

        }else if(empty($this->input->get('magt_type'))){
         
            $this->db->WHERE('school_type','Government');
        }else{
            $this->db->WHERE('school_type',$this->input->get('magt_type'));
        }
        if(!empty($cate_type)){
            $this->db->WHERE_in('cate_type',$cate_type);
        }
        $this->db->group_by('district_name'); 
        $query = $this->db->get();
 // print_r($this->db->last_query());die();
        return $query->result();

    }

    public function getallstatestudentcount($school_type,$cate_type,$dist_id,$blck_id){
      $this->db->SELECT('`students_school_child_count`.`district_name`, `district_id`, `school_type`, `students_school_child_count`.`block_name`, `block_id`, `district_name`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
        ->FROM('students_school_child_count');
      if(!empty($school_type)){
           // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
          $this->db->WHERE_in('school_type',$school_type);
      }else if(empty($this->input->get('magt_type'))){
          $this->db->WHERE('school_type','Government');
      }else{
          $this->db->WHERE('school_type',$this->input->get('magt_type'));
      }
      if(!empty($cate_type)){
          $this->db->WHERE_in('cate_type',$cate_type);
      }
      if(!empty($dist_id)){
        $this->db->WHERE('district_id', $dist_id);
        $this->db->group_by('block_name');
      }else if(!empty($blck_id)){
        $this->db->WHERE('block_id', $blck_id);
        $this->db->group_by('school_name');
      }else{
        $this->db->group_by('district_name'); 
      }        
      $query = $this->db->get();
      // print_r($this->db->last_query());die;
      return $query->result();

  }  
  
    public function getallstate_dee($directorate,$manage,$school_cate,$school_type)
        {
                        /* directorate */
    
                if($directorate==1)
                {
                  $d_id= array('');
                }
                else if($directorate==2)
                {
                  $d_id = array(2,3,16,18,27,29,32,34,42);
                  
                }
                 else if($directorate==3)
                 {
                  $d_id= array(1,5,15,17,19,20,21,22,23,24,26,31,33);
                   
                 }
                 else
                 {
                  $d_id = array(28); 
                 }
                 /* end directorate */
                 /* manage */
                 if($manage=='')
                 {
                  $manage_type=''; 
                 }
                 else
                 {
                  $manage_type=$manage; 
                 }
                
                 /* end of the manage */
                  /* school category */
                 if($school_cate=='')
                 {
                  $cate_type=''; 
                 }
                 else
                 {
                  $cate_type=$school_cate; 
                 }
                
                 /* end of the category */
                 /* school_type */
                 if($school_type=='')
                 {
                  $sch_type=''; 
                 }
                 else
                 {
                  $sch_type=$school_type; 
                 }
                 
                 /* end of the school_type */
                 
                 //print_r($d_id);
                // print_r($manage_type);
                // print_r($cate_type);
                // print_r($sch_type);
                // die();
    
          $this->db->SELECT('`students_school_child_count`.`district_name`, `students_school_child_count.school_type`, `students_school_child_count`.`block_name`,
      `district_id`, `management`, `cate_type`, `students_school_child_count`.`school_id`, `students_school_child_count`.`udise_code`, 
      `students_school_child_count`.`teach_tot`,`students_school_child_count`.`school_name`,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) 
      as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,
      sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,
      sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12, total_t,sum(Prkg_b+Prkg_g+Prkg_t) as Prkg,sum(lkg_b+lkg_g+lkg_t) as LKG
      ,sum(ukg_b+ukg_g+ukg_t)as UKG,sum(total_b+total_g+total_t) as total')
          ->FROM('students_school_child_count')
          ->JOIN('schoolnew_school_department','schoolnew_school_department.id=students_school_child_count.sch_directorate_id')
      ->JOIN('schoolnew_academic_detail','schoolnew_academic_detail.school_key_id=students_school_child_count.school_id')
          ->WHERE_in('schoolnew_school_department.id',$d_id)
         
      ->WHERE_in('students_school_child_count.school_type',$manage_type)
      ->WHERE_in('schoolnew_academic_detail.school_type',$sch_type)
      ->WHERE_in('cate_type',$cate_type)
          ->GROUP_BY('students_school_child_count.district_id');
           $query = $this->db->get();
          // print_r($this->db->last_query());die;
          return $query->result();

  }
  
  
  /******************************************************************
  School Count done by Ramco Magesh
  ****************************************************************/
  
  public function state_school($where,$group,$groupname){
    $sql="select 
count(1) as totalschools,
manage_id,
students_school_child_count.district_name,
students_school_child_count.district_id,
students_school_child_count.block_id,
students_school_child_count.management,
students_school_child_count.block_name,
students_school_child_count.school_name,
students_school_child_count.udise_code,
school_type,
teacher_name,
mbl_nmbr
FROM students_school_child_count 
left JOIN (select school_key_id,teacher_name,mbl_nmbr from udise_staffreg where teacher_type=29 group by school_key_id) as tch on tch.school_key_id=students_school_child_count.school_id where udise_code is not null ".$where." group by ".$group." order by ".$groupname.";";
//echo $sql;die();
    $query=$this->db->query($sql);
    return $query->result();
  }
  
  

  public function getallblock(){
    // print_r($sql);
        $sql="SELECT  district_id,id as block_id,block_name FROM schoolnew_block group by id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
  public function getallschool(){
    // print_r($sql);
        $sql="SELECT  block_id,school_id,school_name FROM students_school_child_count group by school_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
  public function getalloffice(){
    // print_r($sql);
        $sql="SELECT  district_id,block_id,off_key_id,office_name FROM udise_offreg group by off_key_id";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();

    }
  public function getschoolteachers($school_id,$teachertype)
  {
     $sql="SELECT  u_id,teacher_name FROM udise_staffreg where school_key_id=".$school_id." and teacher_type=".$teachertype."";
        $query = $this->db->query($sql);
        // print_r($this->db->last_query());
        return $query->result();
  }
  
/**Common API Starts here by wesley**/

/**Common Pool Student Migration for(State,Dist,Block) Starts**/
function common_student_migration($dist_id,$block_id)
{ 
  if(!empty($dist_id))
  {
    $where="WHERE tr.transfer_reason in (1,2,3,4) and tr.school_id_admit is null and tr.class_studying_id!=12 and sc.district_id='".$dist_id."'  group by sc.block_name";  
  }  
  elseif(!empty($block_id))
  {
    $where="WHERE tr.transfer_reason in (1,2,3,4) and  tr.school_id_admit is null and tr.class_studying_id!=12 and sc.block_id='".$block_id."'  group by sc.school_id";    
  } 
  else
  {
    $where="WHERE tr.transfer_reason in (1,2,3,4) and  tr.school_id_admit is null and tr.class_studying_id!=12  group by sc.district_name";
  } 
  $SQL="SELECT sc.district_name,sc.block_id,sc.district_id,sc.block_name,sc.edu_dist_name,sc.udise_code,sc.school_name,sc.school_type as School_Type,sc.management as Management,sc.cate_type as Category,
  sum(sc.school_type_id=1  and tr.school_id_admit is null) as government,
  sum(sc.school_type_id=2  and tr.school_id_admit is null) as fullyaided,
  sum(sc.school_type_id=3  and tr.school_id_admit is null) as unaided,
  sum(sc.school_type_id=4  and tr.school_id_admit is null) as PartiallyAided,
  sum(sc.school_type_id=5  and tr.school_id_admit is null) as CentralGovt FROM students_school_child_count sc 
  left JOIN students_transfer_history tr on tr.school_id_transfer=sc.school_id ".$where."";
  $query = $this->db->query($SQL);
  return $query->result(); 
}

/**Common Pool Student Migration for(State,Dist,Block) Ends**/
public function emis_blockwise_district($district_id,$school_type,$cate_type)
{
    $this->db->SELECT('block_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
         ->FROM('students_school_child_count')
         ->WHERE('district_id',$district_id);
         
    if(!empty($school_type)){
        // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
        $this->db->WHERE_in('school_type',$school_type);
    }else{
        $this->db->WHERE('school_type','Government');
    }
    if(!empty($cate_type)){
        $this->db->WHERE_in('cate_type',$cate_type);
    }
        $this->db->group_by('block_name');
        // return $result;
        $result = $this->db->get()->result();
        // print_r($this->db->last_query());die;
        return $result;
        // print_r(count($result));die;
}

public function blockwise_school($block_id,$school_type,$cate_type)
{
    $this->db->SELECT('school_id,udise_code,school_name,sum(Prkg_b+Prkg_g+Prkg_t) as PREKG,sum(lkg_b+lkg_g+lkg_t) as LKG,sum(ukg_b+ukg_g+ukg_t) as UKG,sum(c1_b+c1_g+c1_t) as class_1,sum(c2_b+c2_g+c2_t) as class_2,sum(c3_b+c3_g+c3_t) as class_3,sum(c4_b+c4_g+c4_t) as class_4,sum(c5_b+c5_g+c5_t) as class_5,sum(c6_b+c6_g+c6_t) as class_6,sum(c7_b+c7_g+c7_t) as class_7,sum(c8_b+c8_g+c8_t) as class_8,sum(c9_b+c9_g+c9_t) as class_9,sum(c10_b+c10_g+c10_t) as class_10,sum(c11_b+c11_g+c11_t) as class_11,sum(c12_b+c12_g+c12_t) as class_12,sum(total_b+total_g+total_t) as total')
    ->FROM('students_school_child_count')
    ->WHERE('block_id',$block_id); 
      if(!empty($school_type)){
          // "'" . implode("','", array_map('mysql_escape_string', $school_type)) . "'";
        $this->db->WHERE_in('school_type',$school_type);
      }else{
        $this->db->WHERE('school_type','Government');
      }
      if(!empty($cate_type)){
        $this->db->WHERE_in('cate_type',$cate_type);
      }
    $this->db->group_by('school_id'); 
    $result = $this->db->get()->result();                     
    return $result; 
}
public function school_type()
 {
   $sql="select id,manage_name
 from schoolnew_manage_cate
";
$query = $this->db->query($sql);
        return $query->result();
 }

 public function state_profile_completion_status($school_type)
 {
      if($school_type !='')
    {
      $WHERE = "and school_type_id=".$school_type."";
    }
    else{
      $WHERE =' '; 
    }
    
   $sql="



select district_id,district_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete
 join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 ".$WHERE."  group by district_id 
 
 union all
 
 
SELECT null,'Total' as total,
SUM(total_school) as tsch,
SUM(f1notsave) as f1notsave,
SUM(f1save) as f1save,
SUM(f1finalsubmit) as f1finalsubmit,
SUM(f2notsave) as f2notsave,
SUM(f2save) as f2save,
SUM(f2finalsubmit) as f2finalsubmit,
SUM(f3notsave) as f3notsave,
SUM(f3save) as f3save,
SUM(f3finalsubmit) as f3finalsubmit,
SUM(f4notsave) as f4notsave,
SUM(f4save) as f4save,
SUM(f4finalsubmit) as f4finalsubmit,
SUM(f5notsave) as f5notsave,
SUM(f5save) as f5save,
SUM(f5finalsubmit) as f5finalsubmit,
SUM(f6notsave) as f6notsave,
SUM(f6save) as f6save,
SUM(f6finalsubmit) as f6finalsubmit,
SUM(f7notsave) as f7notsave,
SUM(f7save) as f7save,
SUM(f7finalsubmit) as f7finalsubmit,
SUM(f8notsave) as f8notsave,
SUM(f8save) as f8save,
SUM(f8finalsubmit) as f8finalsubmit
 from(select district_id,district_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete

join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 ".$WHERE."  group by district_id  order by district_name) as der 
 
";
 
 
$query = $this->db->query($sql);
        return $query->result();
 }
 
 public function district_profile_completion_status($district_id,$school_type)
 {
   if($school_type !='')
    {
      $WHERE = "and school_type_id='".$school_type."'";
    }
    else{
      $WHERE =' '; 
    }
   $sql="
select block_id,block_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete
 join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 where district_id=".$district_id." ".$WHERE." group by block_id 
 
 union all
 
 
SELECT null,'Total' as total,
SUM(total_school) as tsch,
SUM(f1notsave) as f1notsave,
SUM(f1save) as f1save,
SUM(f1finalsubmit) as f1finalsubmit,
SUM(f2notsave) as f2notsave,
SUM(f2save) as f2save,
SUM(f2finalsubmit) as f2finalsubmit,
SUM(f3notsave) as f3notsave,
SUM(f3save) as f3save,
SUM(f3finalsubmit) as f3finalsubmit,
SUM(f4notsave) as f4notsave,
SUM(f4save) as f4save,
SUM(f4finalsubmit) as f4finalsubmit,
SUM(f5notsave) as f5notsave,
SUM(f5save) as f5save,
SUM(f5finalsubmit) as f5finalsubmit,
SUM(f6notsave) as f6notsave,
SUM(f6save) as f6save,
SUM(f6finalsubmit) as f6finalsubmit,
SUM(f7notsave) as f7notsave,
SUM(f7save) as f7save,
SUM(f7finalsubmit) as f7finalsubmit,
SUM(f8notsave) as f8notsave,
SUM(f8save) as f8save,
SUM(f8finalsubmit) as f8finalsubmit
 from(select district_id,district_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete

join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
where district_id=".$district_id." ".$WHERE." group by block_id order by block_name) as der 
 ;
 
;";
$query = $this->db->query($sql);
        return $query->result();
 } 
  
 public function block_profile_completion_status($block_id,$school_type)
 {
    if($school_type !='')
    {
      $WHERE = "and school_type_id='".$school_type."'";
    }
    else{
      $WHERE =' '; 
    }
   $sql="
select udise_code,school_key_id,school_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete
 join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 where block_id=".$block_id." ".$WHERE." group by school_key_id 
 
 union all
 
 
SELECT 'Total' as total,null,null,
SUM(total_school) as tsch,
SUM(f1notsave) as f1notsave,
SUM(f1save) as f1save,
SUM(f1finalsubmit) as f1finalsubmit,
SUM(f2notsave) as f2notsave,
SUM(f2save) as f2save,
SUM(f2finalsubmit) as f2finalsubmit,
SUM(f3notsave) as f3notsave,
SUM(f3save) as f3save,
SUM(f3finalsubmit) as f3finalsubmit,
SUM(f4notsave) as f4notsave,
SUM(f4save) as f4save,
SUM(f4finalsubmit) as f4finalsubmit,
SUM(f5notsave) as f5notsave,
SUM(f5save) as f5save,
SUM(f5finalsubmit) as f5finalsubmit,
SUM(f6notsave) as f6notsave,
SUM(f6save) as f6save,
SUM(f6finalsubmit) as f6finalsubmit,
SUM(f7notsave) as f7notsave,
SUM(f7save) as f7save,
SUM(f7finalsubmit) as f7finalsubmit,
SUM(f8notsave) as f8notsave,
SUM(f8save) as f8save,
SUM(f8finalsubmit) as f8finalsubmit
 from(select district_id,district_name,
count(a.school_id) as total_school,
sum(case when part_1=0 then 1 else 0 end) as f1notsave,
sum(case when part_1=1 then 1 else 0 end) as f1save,
sum(case when part_1=2 then 1 else 0 end) as f1finalsubmit,
sum(case when part_2=0 then 1 else 0 end) as f2notsave,
sum(case when part_2=1 then 1 else 0 end) as f2save,
sum(case when part_2=2 then 1 else 0 end) as f2finalsubmit,
sum(case when part_3=0 then 1 else 0 end) as f3notsave,
sum(case when part_3=1 then 1 else 0 end) as f3save,
sum(case when part_3=2 then 1 else 0 end) as f3finalsubmit,
sum(case when part_4=0 then 1 else 0 end) as f4notsave,
sum(case when part_4=1 then 1 else 0 end) as f4save,
sum(case when part_4=2 then 1 else 0 end) as f4finalsubmit,
sum(case when part_5=0 then 1 else 0 end) as f5notsave,
sum(case when part_5=1 then 1 else 0 end) as f5save,
sum(case when part_5=2 then 1 else 0 end) as f5finalsubmit,
sum(case when part_6=0 then 1 else 0 end) as f6notsave,
sum(case when part_6=1 then 1 else 0 end) as f6save,
sum(case when part_6=2 then 1 else 0 end) as f6finalsubmit,
sum(case when part_7=0 then 1 else 0 end) as f7notsave,
sum(case when part_7=1 then 1 else 0 end) as f7save,
sum(case when part_7=2 then 1 else 0 end) as f7finalsubmit,
sum(case when part_8=0 then 1 else 0 end) as f8notsave,
sum(case when part_8=1 then 1 else 0 end) as f8save,
sum(case when part_8=2 then 1 else 0 end) as f8finalsubmit
from schoolnew_profilecomplete

join students_school_child_count a on a.school_id=schoolnew_profilecomplete.school_key_id
 where block_id=".$block_id." ".$WHERE." group by school_key_id ) as der

;";
$query = $this->db->query($sql);
        return $query->result();
 }
 
  /* This function Created by Venba Tamilmaran for listing the school after the filter */
 function get_schoolbasicinfo($school_id)
   {
     $this->db->select('*') 
                 ->from('schoolnew_basic_info_history a')
                ->where('a.school_id',$school_id);
                  $result =  $this->db->get()->last_row();
                  return $result;
          
   }
 function get_allmajorcategory(){

         $this->db->select('*')
        ->from('schoolnew_manage_cate');           
        $query = $this->db->get(); 
        return $query->result();

        }
  function get_school_list_district($schoolcategory){
    if($schoolcategory){
      $innrwhere = " and manage_cate_id = ".$schoolcategory;
      $outrwhere = " and a.manage_cate_id = ".$schoolcategory;
     }else{
      $innrwhere = "";
      $outrwhere = "";
     }
    //  $this->db->select('count(school_id) as total_school,district_id,district_name') 
    //              ->from('schoolnew_basic_info_history a')
    //              ->join('schoolnew_district b','b.id = a.district_id','left')
    //     ->where('app_status',0)
    //             ->group_by('district_id');
    //              if(!empty($schoolcategory))
    //              {
    //               $this->db->where('a.manage_cate_id',$schoolcategory);
    //              }
    //              // $this->db->limit(10);
    //    $result =  $this->db->get()->result();
       // print_r($this->db->last_query());
    $sql="SELECT count(school_id) AS total_school,a.district_id,b.district_name
            FROM schoolnew_basic_info_history a
       LEFT JOIN schoolnew_district b ON b.id = a.district_id
      INNER JOIN (SELECT MAX(id) AS MaxId,app_status,district_id,manage_cate_id 
                    FROM schoolnew_basic_info_history 
                   WHERE app_status = 0 ".$innrwhere." 
                   GROUP BY school_id) AS innrq ON innrq.MaxId = a.id AND a.district_id = innrq.district_id AND a.manage_cate_id = innrq.manage_cate_id
           WHERE a.app_status = 0 ".$outrwhere." 
           GROUP BY district_id ;";
    $query = $this->db->query($sql);
return $query->result();
      //  return $result;
   }
   function schoolbasicinfo_insert($arr)
   {
      $this->db->insert('schoolnew_basicinfo',$arr); 
      $id = $this->db->insert_id();
      $data=array('school_id'=>$id);
      $where=array('id'=>$id);
      $this->db->where($where);
      $this->db->update('schoolnew_basicinfo',$data);
      return $this->db->affected_rows() > 0 ? $id : 0;
   }
   function school_insert($table,$arr)
   {
      $this->db->insert($table,$arr); 
      return $this->db->insert_id();
   }
   function school_count($table,$where)
   {
      $this->db->select('count(*) as count')
               ->from($table)
               ->where($where);
      $query =  $this->db->get();
      if($query->num_rows() > 0){
        return $query->row('count');
      }else{
        return 0;
      }
   }
   function school_update($update_data,$table,$where)
   {
      $this->db->where($where);
      $this->db->update($table,$update_data);
      $where['affected_rows'] = $this->db->affected_rows();
      return $where;
      // return $this->db->affected_rows();
   }
   
   function schoolnew_basic_info_history_id($school)
    {
   $this->db->SELECT('Max(id) as max_id') 
        ->FROM('schoolnew_basic_info_history')
        ->WHERE('school_id',$school);
    $query =  $this->db->get();
    if($query->num_rows() > 0){
      return $query->row('max_id');
    }else{
      return 0;
    }}
    
    function update_appstatus_history($history_table,$updatehistory,$where)
    {
   
      $this->db->where($where);
      $this->db->update($history_table,$updatehistory);
      return true;
   }
  
  function schoolnew_basic_info_history_details($dist_id,$schoolcategory){
    /* $sql="SELECT id, school_id, block_id, district_id, urbanrural as urbranrural, local_body_id, lb_vill_town_muni, 
    cluster_id, panchayat_id, lb_habitation_id, assembly_id, 
    parliament_id, municipal_id, city_id, pincode, address, latitude, longitude, curstat_date as curr_stat_date, 
    yr_estd_schl, yr_recogn_schl, yr_recgn_first, yr_rec_schl_elem, yr_rec_schl_sec, yr_rec_schl_hsc, 
    upgrad_prito_uprpri, upgrad_uprprito_sec, upgrad_secto_higsec, spl_edtor, ceo_comments, state_comments,
    anganwadi_stu_g, anganwadi_stu_b, edu_dist_id, school_name, sch_shortname, sch_mail as sch_email, minority as minority_sch, minority_group as minority_grp, 
    sch_cate_id as scl_category, manage_cate_id, sch_management_id, school_type, sch_directorate_id, rte, high_class, low_class, renewal_valid as minority_yr , 
    last_renewal as yr_last_renwl, certi_no as certifi_no, schl_situated, resid_scl as resid_schl, resid_type as typ_resid_schl, angan as anganwadi, angan_code as anganwadi_center, anagan_wrks, 
    schl_shift, schl_cwsn as cwsn_scl, curr_stat,anganwadi_schl
    FROM schoolnew_basic_info_history where curr_stat != 0 and id = (SELECT Max(id) FROM schoolnew_basic_info_history where school_id = ".$school.");";*/
    if($schoolcategory){
     $innrwhere = "district_id = ".$dist_id." and manage_cate_id = ".$schoolcategory;
     $outrwhere = "a.district_id = ".$dist_id." and a.manage_cate_id = ".$schoolcategory;
    }else{
     $innrwhere = "district_id = ".$dist_id;
     $outrwhere = "a.district_id = ".$dist_id;
    }
    $sql="SELECT a.id, b.udise_code,a.school_id, a.block_id, a.district_id, a.urbanrural, a.local_body_id, a.lb_vill_town_muni, 
                 a.cluster_id, a.panchayat_id, a.lb_habitation_id, a.assembly_id, a.parliament_id, a.municipal_id, a.city_id, a.pincode, a.address, 
                 a.latitude, a.longitude, a.curstat_date, a.yr_estd_schl, a.yr_recogn_schl, a.yr_recgn_first, a.yr_rec_schl_elem, a.yr_rec_schl_sec, 
                 a.yr_rec_schl_hsc,a.upgrad_prito_uprpri, a.upgrad_uprprito_sec, a.upgrad_secto_higsec, a.spl_edtor, a.ceo_comments, a.state_comments,a.anganwadi_stu_g, a.anganwadi_stu_b, a.edu_dist_id, a.school_name, a.sch_shortname, a.sch_mail as sch_email, a.minority as minority_sch, a.minority_group as minority_grp, 
                 a.sch_cate_id, a.manage_cate_id, a.sch_management_id, a.school_type, a.sch_directorate_id, a.rte, a.high_class, a.low_class, a.renewal_valid as minority_yr , a.last_renewal as yr_last_renwl, a.certi_no as certifi_no, a.schl_situated, a.resid_scl as resid_schl, a.resid_type as typ_resid_schl, a.angan as anganwadi, a.angan_code as anganwadi_center, a.anagan_wrks as angan_wrks, 
                 a.schl_shift as shftd_schl, a.schl_cwsn as cwsn_scl, a.curr_stat,anganwadi_schl,a.app_status
            FROM schoolnew_basic_info_history a LEFT JOIN schoolnew_basicinfo b ON b.school_id = a.school_id
      INNER JOIN (SELECT MAX(id) AS MaxId,app_status,district_id,manage_cate_id FROM schoolnew_basic_info_history WHERE app_status = 0 and ".$innrwhere." GROUP BY school_id) AS innrq 
              ON innrq.MaxId = a.id AND a.district_id = innrq.district_id AND a.manage_cate_id = innrq.manage_cate_id
           WHERE a.app_status = 0 and ".$outrwhere.";";
       $query = $this->db->query($sql);
       return $query->result_array();
  }

    /**Udise school status report by wesley starts here**/  
    public function get_udise_completion_status($cat_type,$dist_id,$block_id)
    {
       $ac_year = '2019-20';
       $sql = "SELECT `students_school_child_count`.`udise_code`, `students_school_child_count`.`school_name`, 
              `students_school_child_count`.`school_id`, `students_school_child_count`.`school_type`,
              case when `mhrd_dcf_form_entry`.`id` is null then 'Pending' else 'Completed' end as status  
              FROM `students_school_child_count` left JOIN `mhrd_dcf_form_entry` ON 
              `students_school_child_count`.`school_id`=`mhrd_dcf_form_entry`.`school_key_id` AND 
              `mhrd_dcf_form_entry`.`ac_year` = '$ac_year' WHERE `students_school_child_count`.`catty_id` = '$cat_type' ";
      if(!empty($dist_id)){
        $sql .= "and `students_school_child_count`.`district_id` = '$dist_id' ORDER BY `students_school_child_count`.`school_name` ASC;";
      }else{
        $sql .= "and `students_school_child_count`.`block_id` = '$block_id' ORDER BY `students_school_child_count`.`school_name` ASC;";
      }
      
       $query = $this->db->query($sql);
      // print_r($this->db->last_query());die();
      // if($query->num_rows() > 0){
        return $query->result_array();
      //  }else{
      // return false;
      //  }
    }   
    public function get_udise_compl_count($school_type){
      echo "model";
      echo $school_type;die();
      $ac_year = '2019-20';
      $sql = "SELECT `students_school_child_count`.`udise_code`, `students_school_child_count`.`school_name`, 
            `students_school_child_count`.`school_id`, `students_school_child_count`.`school_type`,
            case when `mhrd_dcf_form_entry`.`id` is null then 'Pending' else 'Completed' end as status  
            FROM `students_school_child_count` left JOIN `mhrd_dcf_form_entry` ON 
            `students_school_child_count`.`school_id`=`mhrd_dcf_form_entry`.`school_key_id` AND 
            `mhrd_dcf_form_entry`.`ac_year` = '$ac_year' WHERE `students_school_child_count`.`catty_id` = '$cat_type' ";
      
    }
    /**Udise school status report by wesley ends here**/  
    public function get_dist_student_migration_details2($where,$groupby)
    {
    $SQL="SELECT *, 
            SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
            SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
            SUM(CASE WHEN T1.t1=1 AND T1.t2=4 THEN 1 ELSE 0 END) AS gtopa,
            SUM(CASE WHEN T1.t1=1 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtocg,
            SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
            SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
            SUM(CASE WHEN T1.t1=4 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog, 
            SUM(CASE WHEN T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS cgtog
            FROM (
                SELECT 
                    sch1.udise_code as udise1,sch1.school_name as schname1,
                    sch1.school_type_id as t1,sch1.school_type as sty1,
                    sch2.udise_code as udise2,sch2.school_name as schname2,
                    sch2.school_type_id as t2,sch2.school_type as sty2,
                    sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.district_name,sch2.edu_dist_name,sch2.block_name
                    FROM students_transfer_history
                    JOIN students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
                    JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit ) as T1".$where.$groupby.";";
            $query = $this->db->query($SQL);
            return $query->result(); 
    }

    public function get_migration_detail_student2($where)
    {    
    $SQL="SELECT *, 
            SUM(CASE WHEN T1.t1=1 AND T1.t2=2 THEN 1 ELSE 0 END) AS gtofa,
            SUM(CASE WHEN T1.t1=1 AND T1.t2=3 THEN 1 ELSE 0 END) AS gtoua,
            SUM(CASE WHEN T1.t1=1 AND T1.t2=4 AND T1.t2=5 THEN 1 ELSE 0 END) AS gtopa,  
            SUM(CASE WHEN T1.t1=2 AND T1.t2=1 THEN 1 ELSE 0 END) AS fatog,
            SUM(CASE WHEN T1.t1=3 AND T1.t2=1 THEN 1 ELSE 0 END) AS uatog,
            SUM(CASE WHEN T1.t1=4 AND T1.t1=5 AND T1.t2=1 THEN 1 ELSE 0 END) AS patog
            FROM (
                    SELECT 
                    sch1.udise_code as udise1,sch1.school_name as schname1,
                    sch1.school_type_id as t1,sch1.school_type as sty1,
                    sch2.udise_code as udise2,sch2.school_name as schname2,
                    sch2.school_type_id as t2,sch2.school_type as sty2,
                    students_transfer_history.unique_id_no,sch2.district_id,sch2.edu_dist_id,sch2.block_id,sch2.school_id,students_child_detail.name as s_name,students_child_detail.unique_id_no as EMIS_ID, sch2.district_name,sch2.block_name
                    FROM students_transfer_history
                    JOIN students_school_child_count as sch1 ON sch1.school_id=school_id_transfer
                    JOIN students_child_detail ON students_child_detail.unique_id_no=students_transfer_history.unique_id_no
                    JOIN students_school_child_count as sch2 ON sch2.school_id=school_id_admit ".$where." 
                    ) as T1 GROUP BY unique_id_no;";
        $query = $this->db->query($SQL);
        return $query->result(); 
    }
  public function get_school_land_verification_district($district_id,$block_id,$school_type,$cate_type)
  {
    $this->db->SELECT('*');
    $this->db->FROM('schoolnew_infra_detail');
    $this->db->JOIN('students_school_child_count','students_school_child_count.school_id=schoolnew_infra_detail.school_key_id');
    if(!empty($block_id)){
      $this->db->WHERE('students_school_child_count.block_id',$block_id);
    }else if(!empty($district_id)){
      $this->db->WHERE('students_school_child_count.district_id',$district_id);
    }    
    $this->db->GROUP_BY('school_id');
      
      if(!empty($school_type))
      {
          $this->db->WHERE_in('students_school_child_count.school_type',$school_type);
      }
      else if(empty($this->input->get('magt_type')))
      {
          $this->db->WHERE('students_school_child_count.school_type','Government');
      }
      else
      {
        $this->db->WHERE('students_school_child_count.school_type',$this->input->get('magt_type'));
      }
      if(!empty($cate_type))
      {
          $this->db->WHERE_in('cate_type',$cate_type);
      }
      $this->db->group_by('students_school_child_count.district_name'); 
      $query = $this->db->get();
      return $query->result();
  }


      /*****************************************************************************
                         Ramoc Cements Magesh Elumalai 13-02-2019
      *****************************************************************************/
      public function get_beo_assignment($deodistrictid) {
        $sql = "SELECT students_school_child_count.school_id,
        students_school_child_count.udise_code,
        students_school_child_count.school_name,
        block_name,edu_dist_name,
        schoolnew_edn_dist_block.block_id,
        schoolnew_edn_dist_block.beo_count,
        beo_map
      FROM students_school_child_count
      join schoolnew_edn_dist_block on schoolnew_edn_dist_block.block_id=students_school_child_count.block_id
      join schoolnew_basicinfo on schoolnew_basicinfo.school_id = students_school_child_count.school_id
      where students_school_child_count.edu_dist_id=".$deodistrictid." group by school_id";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      public function updatebeotask($beo) {
           
        return $this->db->update_batch('schoolnew_basicinfo',$beo,'udise_code'); 
        
     }
    /*********************************************************************************** */


//Created By Nirmal
           
  
      public function ATSL_TOPIC_MEDIUM_Report($district_id,$school_id,$medium,$topic)
    {
     
      if($district_id!="")
     {
       $dis_id ="and sc.district_id = $district_id";
       $select ="select sc.block_name,sc.block_id,sc.school_id,m.udise_code, m.school_name"; 
       $join="join students_school_child_count sc on sc.school_id = m.school_id";
       $where ="and m.class_id = 9 group by sc.block_name, m.udise_code,m.school_name";
     }
     if($district_id=="")
     {
      $select="select sc.district_id,m.district_name";
      $where = "and m.class_id = 9 group by district_name";
      $join="join students_school_child_count sc on sc.school_id = m.school_id";
      $dis_id="";
     }
     if($school_id!="")
     {
     
      $select ="select class_id";
      $school="where school_id = $school_id and";
      $where="group by class_id";
       $dis_id="";
       $join="";

     }

     $sql = "$select,
    sum(case when $topic = 0 then 1 else 0 end) as Score_0,
    sum(case when $topic >0 and $topic <6 then 1 else 0 end) as Score_1_5,
    sum(case when $topic >5 and $topic <11 then 1 else 0 end) as Score_6_10,
    sum(case when $topic >10 and $topic <16 then 1 else 0 end) as Score_11_15,
     count(*) as Total
    from exams_marks_summary m $join
    where m.medium_id = $medium $dis_id $where;";
    $query = $this->db->query($sql);
    return $query->result_array();
    
   
    } 
    public function ATSL_School_Previous_report($school_id)
    {

  $query = "select name,class_id,medium_id,topic1,topic2,topic3,topic4,topic5,topic6,Total from exams_marks_summary
where school_id = $school_id order by class_id,medium_id,name;";
     $return_value =  $this->db->query($query);
      return $return_value->result_array(); 
    }

  public function ATSL_Stduent_wise_report($school_id)
    {

     $query = "select username,name,class_id,case when medium_id = 16 then 'Tamil' when medium_id = 19 then 'English' end as Medium_,Topic1, Topic2,Topic3, Topic4, Topic5, Topic6,Total from exams_marks_summary where school_id = $school_id";
     $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
    }
    public function resource_list()
    {
       $query = "select resource_id,resource_name from emis_mst_resource
where isactive = 1 order by resource_name";
     $return_value =  $this->db->query($query);
      return $return_value->result_array(); 
      
    }

    public function project_summary() 
    {
      $query = "select a.module_reference, a.application, a.module_name, a.start_date, a.planned_end_date, a.actual_end_date,
sum(b.duration_hrs) as sum,a.module_status, a.module_scope_filepath from emis_mst_module a
join emis_timesheet b on a.id = b.module_id and b.isactive=1
group by a.id;";
      $return_value =  $this->db->query($query);
      return $return_value->result_array(); 

    }
    public function activity_wise_report($emis_usertype)
    {
      if($emis_usertype == 20)
      {
       $join ="";
       $where="";
       $group = "group by a.id";
      }
      else if($emis_usertype == 21) 
      {
       $join = "join emis_mst_resource r on r.resource_id = b.resource_id";
       $where ="where b.resource_id =$emis_usertype";
        $group = "group by a.id";
      }

      $query = "select a.module_name, a.module_status,
sum(case when b.task_type_id = 1 then b.duration_hrs else 0 end) as Front_En,
sum(case when b.task_type_id = 2 then b.duration_hrs else 0 end) as API_Delopment,
sum(case when b.task_type_id = 3 then b.duration_hrs else 0 end) as Meetin,
sum(case when b.task_type_id = 4 then b.duration_hrs else 0 end) as Testin,
sum(case when b.task_type_id = 5 then b.duration_hrs else 0 end) as Bug_Fixin,
sum(case when b.task_type_id = 6 then b.duration_hrs else 0 end) as Data_Validatio,
sum(case when b.task_type_id = 7 then b.duration_hrs else 0 end) as Server_Managemen,
sum(case when b.task_type_id = 8 then b.duration_hrs else 0 end) as Learning_Trainin,
sum(case when b.task_type_id = 9 then b.duration_hrs else 0 end) as Report_Genetatio,
sum(case when b.task_type_id = 10 then b.duration_hrs else 0 end) as Report_Automatio,
sum(case when b.task_type_id = 11 then b.duration_hrs else 0 end) as Integration_API_Front,
sum(case when b.task_type_id = 12 then b.duration_hrs else 0 end) as DB_Magement,
sum(case when b.task_type_id = 13 then b.duration_hrs else 0 end) as Leaves,
sum(b.duration_hrs) as Total
from emis_mst_module a
left join emis_timesheet b on b.module_id = a.id
$join $where  $group";
      $return_value =  $this->db->query($query);
    return $return_value->result_array();
      
    }

    public function date_wise_report($emis_usertype,$token_emis_usertype,$from,$to)
    {
       
      if($token_emis_usertype == 20)
      {
       $join ="join emis_mst_resource r on r.resource_id = a.resource_id";
       $where="where a.timesheet_date between '$from' and '$to' and r.resource_id = $emis_usertype";
       $group = "group by a.timesheet_date,r.resource_id,b.id,t.id";
      }
      else if($token_emis_usertype == 21) 
      {
       $join = "join emis_mst_resource r on r.resource_id = a.resource_id and r.resource_id = $emis_usertype";
       $where ="where a.timesheet_date between '$from' and '$to' and r.resource_id = $emis_usertype";
        $group = "group by a.timesheet_date,b.id,t.id";
      }

      $query = "select a.timesheet_date, b.module_name, t.task_description, sum(a.duration_hrs) as Hours from emis_mst_module b
left join emis_timesheet a on a.module_id = b.id
join emis_mst_tasktype t on t.id = a.task_type_id
$join $where $group";
     
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     
    }
    public function teacher_taught_class($school_type,$appoinment,$district)
    {

    if($district!="")
    {
     
     $where=" where m.sch_mgmt_id in ($school_type) and d.district_id=$district and t.nature_of_appt = $appoinment group by c.id";
    }
    else
    {
     
     $where=" where m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment group by c.id";
    }


          $query = "select c.category,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=1 and t.nature_of_appt =$appoinment then 1 else 0 end) as Primary_I_V,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=2 and t.nature_of_appt =$appoinment then 1 else 0 end) as Upr_Primary_I_VII,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=4 and t.nature_of_appt =$appoinment then 1 else 0 end) as Upr_Primary_VI_VII,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=6 and t.nature_of_appt =$appoinment then 1 else 0 end) as Secondary_I_X,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=7 and t.nature_of_appt =$appoinment then 1 else 0 end) as Secondary_VI_X,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=8 and t.nature_of_appt =$appoinment then 1 else 0 end) as Secondary_IX_X,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=3 and t.nature_of_appt =$appoinment then 1 else 0 end) as HSS_I_XII,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=5 and t.nature_of_appt =$appoinment then 1 else 0 end) as HSS_VI_XII,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=10 and t.nature_of_appt =$appoinment then 1 else 0 end) as HSS_IX_XII,
    sum(case when m.sch_mgmt_id in ($school_type) and m.sch_category_id=11 and t.nature_of_appt =$appoinment then 1 else 0 end) as HSS_XI_XII,
    sum(case when m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment then 1 else 0 end) as Total
    from mhrd_school_master m
    left join mhrd_tch_profile t on t.udise_sch_code = m.old_udise_sch_code
    left join teacher_class_taught c on c.id = t.class_taught
    left join mhrd_mst_district d on d.udise_district_code = m.district_cd $where";
         
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
    
    }
    
    public function partime_teacher_reprt($district_id,$user_id,$block_id)
    {
     
      if($district_id!="")
      {
         $select ="select sc.block_name, sc.udise_code, sc.school_name, sc.school_type, sc.cate_type, count(*) as total";
        $where = "where u.archive = 1 and u.teacher_type = 7 and sc.school_type_id in (1,2,4) and";
        $dist = "sc.district_id = $district_id";
        $group = "group by sc.block_name, sc.school_id";
      }
      else if($block_id!="")
      {
        $select ="select sc.block_name,sc.block_id, sc.udise_code, sc.school_name, sc.school_type, sc.cate_type, count(*) as total";
        $where = "where u.archive = 1 and u.teacher_type = 7 and sc.school_type_id in (1,2,4) and";
        $dist = "sc.block_id = $block_id";
        $group = "group by sc.block_name, sc.school_id";
      }
      else 
      {
       $dist = "";
       $select ="select sc.district_name,sc.district_id, count(*) as total";
       $where ="where u.archive = 1 and u.teacher_type = 7 and sc.school_type_id in (1,2,4)";
       $group = "group by sc.district_name";
      }
       
      $query = "$select from  students_school_child_count sc join udise_staffreg u on u.school_key_id = sc.school_id $where $dist $group";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
    //print_r($this->db->last_query());die();
     
    }

    //
    public function dropdown_class($class)
    {

      if($class!="")
      {
       $query = "select id,subject from students_elearn_mst_subjects where class=$class and isactive=1";
      }
      
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
     public function dropdown_sub($class,$sub)
    {
     
      if($sub!="")
      {
       $query = "select id,chapter from students_elearn_mst_subjects where subject=$sub and class=$class and isactive=1";
      }
      
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
    public function save_elearn($data,$approve_id)
    {

      if(!empty($data))
      {

       $insert_data = $this->db->insert('students_elearn_content',$data);
      return $insert_data;  
      }
      else if( $approve_id!="")
      {
       $this->db->WHERE('id',$approve_id['id']);
        return $this->db->update('students_elearn_content',$approve_id); 
      }

      
    }
    public function get_elearn_content()
    {
      $query = "select id,class,subject,chapter,label,content_name,isactive as Approved from students_elearn_content";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();

    }

    public function teacher_id($teach_id)
    {
    $query = "select u_id from udise_staffreg where teacher_id=$teach_id";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
    public function save_feed_back($records)
    {
      
      $records['created_at']=date('Y-m-d h:i:s');
      //print_r($records);die();
      $save_data=$this->db->insert('students_elearn_feedback',$records);
      return $save_data;

    }
    public function student_id($std_id)
    {
 $query = "select id from students_child_detail where unique_id_no=$std_id ";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
    public function Retreive_stud_teacher($user_type_id,$user_id)
    {
     
     if($user_type_id == 14)
     {
       $query = "select teacher_name from udise_staffreg where teacher_id=$user_id";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();

     }
     else if($user_type_id==17)
     {
      $query = "select name from students_child_detail where unique_id_no=$user_id";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }

    }
    public function feedback_summary()
    {
    $query = "select sum(case when user_type_id = 17 and feedback_type = 1 then 1 else 0 end) as Student_Quest,
sum(case when user_type_id = 17 and feedback_type <> 1 then 1 else 0 end) as Student_feedback,
sum(case when user_type_id = 14 and feedback_type = 1 then 1 else 0 end) as Teachers_Quest,
sum(case when user_type_id = 14 and feedback_type <> 1 then 1 else 0 end) as Teachers_feedback
from students_elearn_feedback ";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();

    }
    public function Student_Feedack_List()
    {
      $query = "select f.created_at as Date,sc.district_name, sc.school_name, scd.name, scd.class_studying_id,case when f.feedback_type = 1 then 'Question / Doubt' else 'Feedback' end as Feedback_Type, f.feedback as Description from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
left join students_elearn_feedback f on f.user_id = scd.id
where f.user_type_id = 17 and f.isactive = 1 group by f.id";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
     public function Teacher_Feedack_List()
    {
      $query = "select f.created_at as Date,sc.district_name, sc.school_name, u.teacher_name, t.type_teacher,case when f.feedback_type = 1 then 'Question / Doubt' else 'Feedback' end as Feedback_Type, f.feedback as Description from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
left join students_elearn_feedback f on f.user_id = u.u_id
left join teacher_type t on t.id=u.teacher_type
where f.user_type_id = 14 and f.isactive = 1 group by f.id";
       $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }

    function get_all_org_detiails()
     {
       $this->db->select('e2.org_name,e1.file_name,e1.doc_filepath');
       $this->db->from('external_doc_upload e1');
       $this->db->join('external_org_details e2','e2.user_id=e1.user_id');
        return $this->db->get()->result_array();
     }

     function Statistics_School_Count($dist_id,$edu_dist_id,$blck_id,$type_report,$school_type_id)
     {

     
      if($dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where district_id = $dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where district_id = $dist_id and school_type_id = $school_type_id";
          $grp="group by management"; 
        }
       
      }
      if($dist_id=="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where school_type_id = $school_type_id";
          $grp="group by management"; 
        }
       
       
      }
      if($edu_dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where edu_dist_id = $edu_dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where edu_dist_id = $edu_dist_id and school_type_id = $school_type_id";
          $grp="group by management"; 
        }
       
      }
      if($blck_id!="")
      {
        if($type_report ==1)
        {
         $select="block_id,school_type"; 
         $where = "where block_id = $blck_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="block_id,management"; 
          $where = "where block_id = $blck_id and school_type_id = $school_type_id";
          $grp="group by management"; 
        }
        
      }

       $query = "select $select,
sum(case when catty_id = 1 then 1 else 0 end) as Pre_Primary_School, 
sum(case when catty_id = 2 then 1 else 0 end) as Primary_School, 
sum(case when catty_id = 3 then 1 else 0 end) as Middle_School, 
sum(case when catty_id = 4 then 1 else 0 end) as High_School,
sum(case when catty_id = 5  then 1 else 0 end) as Hr_Sec_School,  
sum(case when catty_id = 6  then 1 else 0 end) as Others,
count(*) as Total from students_school_child_count $where $grp";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
      
     // print_r($this->db->last_query());die();
     }
     function Statistics_Student_Count($dist_id,$edu_dist_id,$blck_id,$type_report,$school_type)
     {
      if($dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where district_id = $dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where district_id = $dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($dist_id=="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where school_type_id = $school_type";
          $grp="group by management"; 
        }
       
       
      }
      if($edu_dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where edu_dist_id = $edu_dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where edu_dist_id = $edu_dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($blck_id!="")
      {
        if($type_report ==1)
        {
         $select="block_id,school_type"; 
         $where = "where block_id = $blck_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="block_id,management"; 
          $where = "where block_id = $blck_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
        
      }

       $query = "select $select,
sum(case when catty_id = 1 then total else 0 end) as Pre_Primary_School, 
sum(case when catty_id = 2 then total else 0 end) as Primary_School, 
sum(case when catty_id = 3 then total else 0 end) as Middle_School, 
sum(case when catty_id = 4 then total else 0 end) as High_School,
sum(case when catty_id = 5 then total else 0 end) as Hr_Sec_School,  
sum(case when catty_id = 6 then total else 0 end) as Others,
sum(total) as Total from students_school_child_count $where $grp";
      $return_value =  $this->db->query($query);
       return $return_value->result_array();
     // print_r($this->db->last_query());die();
     }

     function Statistics_Teacher_Count($dist_id,$edu_dist_id,$blck_id,$type_report,$school_type)
     {
      if($dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where district_id = $dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where district_id = $dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($dist_id=="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where school_type_id = $school_type";
          $grp="group by management"; 
        }
       
       
      }
      if($edu_dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where edu_dist_id = $edu_dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where edu_dist_id = $edu_dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($blck_id!="")
      {
        if($type_report ==1)
        {
         $select="block_id,school_type"; 
         $where = "where block_id = $blck_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="block_id,management"; 
          $where = "where block_id = $blck_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
        
      }
       $query = "select $select,
sum(case when catty_id = 1 then teach_tot else 0 end) as Pre_Primary_School, 
sum(case when catty_id = 2 then teach_tot else 0 end) as Primary_School, 
sum(case when catty_id = 3 then teach_tot else 0 end) as Middle_School, 
sum(case when catty_id = 4 then teach_tot else 0 end) as High_School,
sum(case when catty_id = 5 then teach_tot else 0 end) as Hr_Sec_School,  
sum(case when catty_id = 6 then teach_tot else 0 end) as Special_School,
sum(teach_tot) as Total from students_school_child_count $where $grp";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     // print_r($this->db->last_query());die();
     }

     function Statistics_class_Count($dist_id,$edu_dist_id,$blck_id,$type_report,$school_type)
     {

      if($dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where district_id = $dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where district_id = $dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($dist_id=="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where school_type_id = $school_type";
          $grp="group by management"; 
        }
       
       
      }
      if($edu_dist_id!="")
      {
        if($type_report ==1)
        {
         $select="school_type"; 
         $where = "where edu_dist_id = $edu_dist_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="management"; 
          $where = "where edu_dist_id = $edu_dist_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
       
      }
      if($blck_id!="")
      {
        if($type_report ==1)
        {
         $select="block_id,school_type"; 
         $where = "where block_id = $blck_id";
         $grp="group by school_type";   
        }
        else if($type_report == 2)
        {
          $select="block_id,management"; 
          $where = "where block_id = $blck_id and school_type_id = $school_type";
          $grp="group by management"; 
        }
        
      }

       $query = "select $select, 
sum(prkg_b+prkg_g+lkg_b+lkg_g+ukg_b+ukg_g) as KG_Students,
sum(c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g) as I_V_Students,
sum(c6_b+c6_g+c7_b+c7_g+c8_b+c8_g) as VI_VII_Students,
sum(c9_b+c9_g+c10_b+c10_g) as IX_X_Students,
sum(c11_b+c11_g+c12_b+c12_g) as XI_XII_Students,
sum(total) as Total
from students_school_child_count $where $grp";
      $return_value =  $this->db->query($query);

      return $return_value->result_array();
     // print_r($this->db->last_query());die();
     }
    function udise_verfication_report_list($dist_id)
     { 
       if($dist_id!="")
      {
        $select="select sc.block_name,sc.block_id,sc.udise_code,sc.school_name,sc.school_type,d.dcf_certify_by_school_auth_date as School_Status,d.dcf_certify_by_crc_auth_date as BRTE_Status, d.dcf_certify_by_block_auth_date as BEO_Status,d.dcf_certify_by_ceo_auth_date as DC_CEO_Status from students_school_child_count sc";
       $where = "where sc.district_id = $dist_id group by sc.udise_code";
       $group="";
      }
      if($dist_id=="")
      {
       $select="select sc.district_name,sc.district_id,count(*) as Total_Schools,sum(case when d.dcf_certify_by_school_auth_date is not null then 1 else 0 end) as Verified_Schools,sum(case when d.dcf_certify_by_crc_auth_date is not null then 1 else 0 end) as Verified_by_BRTE,sum(case when d.dcf_certify_by_block_auth_date is not null then 1 else 0 end) as Verified_by_BEO,sum(case when d.dcf_certify_by_ceo_auth_date is not null then 1 else 0 end) as Verified_by_DC_CEO from students_school_child_count sc";
       $where = "";
       $group="group by sc.district_name"; 
      }
      $query = "$select left join mhrd_dcf_form_entry d on d.school_key_id = sc.school_id $where $group";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
      
     }

     function teacher_qualification_acedmics($dist,$school_type,$appoinment)
     {
     if($dist!="")
      {
    
       $where ="and d.district_id = $dist";
      
      }
      if($dist=="")
      {
       $where = "";
     
      }
      $query = "select c.category,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 1 and t.nature_of_appt =$appoinment then 1 else 0 end) as Below_secondary,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 2 and t.nature_of_appt =$appoinment then 1 else 0 end) as Secondary,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 3 and t.nature_of_appt =$appoinment then 1 else 0 end) as Higher_secondary,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 4 and t.nature_of_appt =$appoinment then 1 else 0 end) as Graduate,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 5 and t.nature_of_appt =$appoinment then 1 else 0 end) as Post_graduate,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 6 and t.nature_of_appt =$appoinment then 1 else 0 end) as MPhil,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 7 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
PhD,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_acad = 8 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
PostDoctoral,
sum(case when m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment then 1 else 0 end) as Total
from mhrd_school_master m 
left join mhrd_tch_profile t on t.udise_sch_code = m.old_udise_sch_code
left join teacher_class_taught c on c.id = t.class_taught 
left join mhrd_mst_district d on d.udise_district_code = m.district_cd
where m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment $where group by c.id";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
      //print_r($this->db->last_query());die();
     }

 function teacher_qualification_prof($dist,$school_type,$appoinment)
     {
     if($dist!="")
      {
    
       $where ="and d.district_id = $dist";
      
      }
      if($dist=="")
      {
       $where = "";
     
      }
      $query = "select c.category,sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 1 and t.nature_of_appt =$appoinment then 1 else 0 end) as Diploma_or_certificate_in_TT,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 2 and t.nature_of_appt =$appoinment then 1 else 0 end) as
 BElEd,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 3 and t.nature_of_appt =$appoinment then 1 else 0 end) as BEd_or_equivalent,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 4 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
MEd_or_equivalent,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 5 and t.nature_of_appt =$appoinment then 1 else 0 end) as Others,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 6 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
None,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 7 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
Diploma_degree_in_special_education,
sum(case when m.sch_mgmt_id in ($school_type) and t.qual_prof = 8 and t.nature_of_appt =$appoinment then 1 else 0 end) as 
Pursuing_professional_course,
sum(case when m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment then 1 else 0 end) as Total
from mhrd_school_master m 
left join mhrd_tch_profile t on t.udise_sch_code = m.old_udise_sch_code
left join teacher_class_taught c on c.id = t.class_taught 
left join mhrd_mst_district d on d.udise_district_code = m.district_cd
where m.sch_mgmt_id in ($school_type) and t.nature_of_appt = $appoinment $where group by c.id";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
      //print_r($this->db->last_query());die();
     }
     function save_bank_details($data)
     {
      $check=$data['ifsc_code'];
      $query = "select * from schoolnew_branch where ifsc_code='$check'";
      $return_value =  $this->db->query($query);
    
      if(!empty($return_value->result_array()))
        {
         return 0;
        }
        else
        {
          $insert =$this->db->insert('schoolnew_branch',$data);
          return $insert;
        }
     }
    public function bank_district_dropdown()
    {
       $query = "select id,bank_dist from schoolnew_bank_district";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
    }
     public function bank_dropdown_details($dist_id)
     {
     
        $query = "select s1.id,bank from schoolnew_bank s1 join schoolnew_bank_district s on s.id = s1.bank_dist_id where bank_dist_id=$dist_id";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }
      
     public function nearest_schools($dist_id,$block,$school_type)
     {
      if($dist_id!="")
      {
       $where="where sc.district_id = $dist_id";
      }
      else if($block!="")
      {
       $where="where sc.block_id = $block";
      }
      $query = "select sc.block_name, sc.udise_code, sc.school_name,sc.school_id as school_key_id, sc.school_type, sc.cate_type, sb.latitude, sb.longitude,a.distance_pri, a.distance_upr, a.distance_sec, a.distance_hsec, case when d.weather_roads = 1 then 'Yes' else 'No' end as All_Weather_Road from students_school_child_count sc
left join schoolnew_basicinfo sb on sb.school_id = sc.school_id
left join schoolnew_academic_detail a on a.school_key_id = sc.school_id
left join schoolnew_infra_detail d on d.school_key_id = sc.school_id
$where and sc.school_type_id in ($school_type) order by sc.block_name,sc.school_name";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }


     public function no_enrollment($dist,$block)
     {
      if($dist!="")
      {
       $select ="select block_name, udise_code, school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where total =0 and district_id = $dist";
        $grp="group by udise_code";
      
      }
      else if($block!="")
      {
         $select ="select block_name, udise_code, school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where total =0 and block_id = $block";
        $grp="group by udise_code";
      }
      else
      {
        $select ="select district_name,district_id,sum(case when total =0 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when total =0 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when total =0 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when total =0 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when total =0 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where total =0";
        $grp="group by district_name";
      }
      $query = "$select from students_school_child_count sc $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
      

     }
      public function no_teacher($dist,$block)
     {
      if($dist!="")
      {
       $select ="select block_name, udise_code, school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where teach_tot =0 and district_id = $dist";
       $grp="group by udise_code";
      
      }
      else if($block!="")
      {
        $select ="select block_name, udise_code, school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where teach_tot =0 and block_id = $block";
       $grp="group by udise_code";
      }
      else
      {
        $select ="select district_name,district_id,sum(case when teach_tot =0 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when teach_tot =0 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when teach_tot =0 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when teach_tot =0 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when teach_tot =0 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where teach_tot =0";
        $grp="group by district_name";
      }
      $query = "$select from students_school_child_count sc $where $grp";
      $return_value =  $this->db->query($query);

     return $return_value->result_array();
     
      

     }

     public function no_ramp($dist,$block)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where i.ramp_disable_child = 2 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }
      else if($block!="")
      {
         $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where i.ramp_disable_child = 2 and block_id = $block";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      }
      else
      {
        $select ="select district_name,district_id,sum(case when i.ramp_disable_child=2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when i.ramp_disable_child=2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when i.ramp_disable_child=2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when i.ramp_disable_child=2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when i.ramp_disable_child=2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where i.ramp_disable_child = 2";
        $grp="group by district_name";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     

     }

     
     public function no_drinkwater($dist,$block)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where i.drnkwater_avail = 2 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }

     else if($block!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where i.drnkwater_avail = 2 and block_id = $block";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      }
      
      else
      {
        $select ="select district_name,district_id,sum(case when i.drnkwater_avail = 2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when i.drnkwater_avail = 2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when i.drnkwater_avail = 2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when i.drnkwater_avail = 2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when i.drnkwater_avail = 2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where i.drnkwater_avail = 2";
        $grp="group by district_name";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);

     return $return_value->result_array();
     
      

     }
     
      public function no_boysTiolet($dist,$block)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where (i.toil_bys_inuse+i.toil_nonfunc_bys) = 0 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }
     else if($block!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where (i.toil_bys_inuse+i.toil_nonfunc_bys) = 0 and block_id = $block";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }
      else
      {
        $select ="select district_name,district_id,sum(case when (i.toil_bys_inuse+i.toil_nonfunc_bys)=0 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when (i.toil_bys_inuse+i.toil_nonfunc_bys)=0 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when (i.toil_bys_inuse+i.toil_nonfunc_bys)=0 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when (i.toil_bys_inuse+i.toil_nonfunc_bys)=0 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when (i.toil_bys_inuse+i.toil_nonfunc_bys)=0 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where (i.toil_bys_inuse+i.toil_nonfunc_bys) = 0";
        $grp="group by district_name";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
      

     }
     
      public function no_girlsTiolet($dist,$block)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }
      else if($block!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and block_id = $block";
        $grp="group by udise_code";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
      
      }

      else
      {
        $select ="select district_name,district_id,sum(case when (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when (i.toil_inuse_grls+i.toil_notuse_grls) = 0 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where (i.toil_inuse_grls+i.toil_notuse_grls) = 0";
        $grp="group by district_name";
        $join="left join schoolnew_infra_detail i on i.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
     }
    

      public function no_smc($dist,$block)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.smc_const = 2 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
       else if($block!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.smc_const = 2 and block_id = $block";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
      else
      {
        $select ="select district_name,district_id,sum(case when c.smc_const = 2=2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when c.smc_const = 2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when c.smc_const = 2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when c.smc_const = 2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when c.smc_const = 2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where c.smc_const = 2";
        $grp="group by district_name";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
     }

    public function no_smdc($dist,$block_id)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.smdc_constitu = 2 and district_id = $dist and sc.cate_type in ('High School','Higher Secondary School')";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
      else if($block_id!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.smdc_constitu = 2 and block_id = $block_id and sc.cate_type in ('High School','Higher Secondary School')";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
      else
      {
        $select ="select district_name,district_id,sum(case when c.smdc_constitu=2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when c.smdc_constitu=2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when c.smdc_constitu=2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when c.smdc_constitu=2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when c.smdc_constitu=2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where c.smdc_constitu = 2";
        $grp="group by district_name";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
     }
   
      public function no_pta($dist,$block_id)
     {
      if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.pta_const = 2 and district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
      else  if($block_id!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when type = 1 then 'Boys' when type = 2 then 'Girls' when type = 3 then 'Co-Ed' end as Type, school_type, cate_type, total_b, total_g,teach_tot";
       $where="where c.pta_const = 2 and block_id = $block_id";
        $grp="group by udise_code";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
      
      }
      else
      {
        $select ="select district_name,district_id,sum(case when c.pta_const=2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when c.pta_const=2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when c.pta_const=2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when c.pta_const=2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when c.pta_const=2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where c.pta_const = 2";
        $grp="group by district_name";
        $join="left join schoolnew_committee_detail c on c.school_key_id = sc.school_id";
    
      }
      $query = "$select from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     
    
     }


     public function No_Electricity($dist,$block_id)
     {
       if($dist!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when sc.type = 1 then 'Boys' when sc.type = 2 then 'Girls' when sc.type = 3 then 'Co-Ed' end as Type, sc.school_type, sc.cate_type, sc.total_b, sc.total_g,sc.teach_tot";
       $where="where electricity = 2 and sc.district_id = $dist";
        $grp="group by udise_code";
        $join="left join schoolnew_academic_detail i on i.school_key_id = sc.school_id";
      
      }
      else  if($block_id!="")
      {
       $select ="select sc.block_name, sc.udise_code, sc.school_name,case when sc.type = 1 then 'Boys' when sc.type = 2 then 'Girls' when sc.type = 3 then 'Co-Ed' end as Type, sc.school_type, sc.cate_type, sc.total_b, sc.total_g,sc.teach_tot";
       $where="where electricity = 2 and sc.block_id = $block_id";
        $grp="group by udise_code";
        $join="left join schoolnew_academic_detail i on i.school_key_id = sc.school_id";
      
      }
      else
      {
        $select ="select district_name,district_id,sum(case when i.electricity=2 and sc.school_type_id = 1 then 1 else 0 end) as Government,
sum(case when i.electricity=2 and sc.school_type_id = 2 then 1 else 0 end) as Fully_Aided,
sum(case when i.electricity=2 and sc.school_type_id = 3 then 1 else 0 end) as Unaided,
sum(case when i.electricity=2 and sc.school_type_id = 4 then 1 else 0 end) as Partially_Aided, 
sum(case when i.electricity=2 and sc.school_type_id = 5 then 1 else 0 end) as Central_Govt";
        $where="where electricity = 2";
        $grp="group by district_name";
        $join="left join schoolnew_academic_detail i on i.school_key_id = sc.school_id";
    
      }
      $query = "$select  from students_school_child_count sc $join $where $grp";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     }

     public function IED_techer($dist)
     {
  
      if($dist!="")
      {
      $select="select u.teacher_id, u.teacher_name,case
when teacher_ied_type = 1 then 'Special Educator'
when teacher_ied_type = 2 then 'Therapist'
when teacher_ied_type = 3 then 'Special Educator(BRTE)'
end as Teacher_Type,s.specialisation,s.qualification, u.mbl_nmbr";
      $where="where u.archive = 1 and  u.teacher_type = 128 and (o.district_id = $dist or sc.district_id = $dist) group by u.u_id";    
     
      }

      else
      {
         $select=" select sc.district_id,sc.district_name,
sum(case when teacher_ied_type = 1 then 1 else 0 end) as Special_Educator,sum(case when teacher_ied_type = 2 then 1 else 0 end) as
 Therapist,sum(case when teacher_ied_type = 3 then 1 else 0 end) as
 Special_Educator_BRTE,count(teacher_ied_type) as Total";
      $where="where u.archive = 1 and u.teacher_type = 128 group by sc.district_name";
    
      }
      $query = "$select from udise_staffreg u
left join teachers_special_details s on s.teacher_id = u.u_id
left join udise_offreg o on o.off_key_id = u.school_key_id
left join students_school_child_count sc on sc.school_id = u.school_key_id
$where";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     // print_r($this->db->last_query());die();
     }

     public function save_IED_techer($records)
     {
      $insert = $this->db->insert('teachers_special_details',$records);
      return $insert;
     }
     public function get_ied_teacher($teacher_id)
     {
      $query = "select * from teachers_special_details where teacher_id=$teacher_id and isactive=1";
      $return_value =  $this->db->query($query);
     return $return_value->result_array();
     }

     public function BT_Teachers_Subject($dist,$block,$sub_id,$school_type_id,$report_id)
     {

    //DC  /  CEO
      if($dist!="" && $report_id == 1)
      {
      $select="select u.teacher_id, u.teacher_name,s.subjects, u.mbl_nmbr, sc.udise_code, sc.school_name, sc.school_type, sc.cate_type from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id
join teacher_subjects s on s.id = u.appointed_subject";
      $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) and sc.district_id = $dist group by u.teacher_id";
      }
      else if($dist!="" && $report_id == 2)
      {
      $select="select u.teacher_id, u.teacher_name,s.subjects, u.mbl_nmbr, sc.udise_code, sc.school_name, sc.cate_type from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id
join teacher_subjects s on s.id = u.appointed_subject";

      $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id and sc.district_id = $dist group by u.teacher_id";
      }

      //BLOOCK 
      else if($block!="" && $report_id == 1)
      {
      $select="select u.teacher_id, u.teacher_name,s.subjects, u.mbl_nmbr, sc.udise_code, sc.school_name, sc.school_type, sc.cate_type,sc.block_id from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id
join teacher_subjects s on s.id = u.appointed_subject";
      $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) and sc.block_id = $block group by u.teacher_id";
      }
      else if($block!="" && $report_id == 2)
      {
      $select="select u.teacher_id, u.teacher_name,s.subjects, u.mbl_nmbr, sc.udise_code, sc.school_name,sc.block_id, sc.cate_type from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id
join teacher_subjects s on s.id = u.appointed_subject";

      $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id and sc.block_id = $block group by u.teacher_id";
      }

      //STATE
      else if($dist=="" && $report_id == 1)
      {
        if($school_type_id!="")
      {
       $select="select sc.district_name,sc.district_id,
sum(case when sc.school_type_id =1 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Government,
sum(case when sc.school_type_id =2 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Fully_Aided,
sum(case when sc.school_type_id =4 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Partially_Aided,
sum(case when sc.school_type_id in (1,2,4) and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Total  from students_school_child_count sc join udise_staffreg u on u.school_key_id = sc.school_id";
      $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) group by sc.district_name";
      }
      else
      {
         $select="select sc.district_name,sc.district_id,
sum(case when sc.school_type_id =1 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Government,
sum(case when sc.school_type_id =2 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Fully_Aided,
sum(case when sc.school_type_id =4 and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Partially_Aided,
sum(case when sc.school_type_id in (1,2,4) and u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) then 1 else 0 end) as Total  from students_school_child_count sc join udise_staffreg u on u.school_key_id = sc.school_id";
      $where="where u.archive = 1 and u.teacher_type = 11 and (u.subject1 = $sub_id or u.subject2 = $sub_id or u.subject3 = $sub_id or u.subject4 = $sub_id or u.subject5 = $sub_id or u.subject6=$sub_id) group by sc.district_name";
      }
        
    
      }
      else if($dist=="" && $report_id == 2)
      {
        if($school_type_id!="")
      { 

        $select ="select sc.district_name,sc.district_id,
sum(case when sc.school_type_id =1 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id then 1 else 0 end) as Government,
sum(case when sc.school_type_id =2 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id then 1 else 0 end) as Fully_Aided,
sum(case when sc.school_type_id =4 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  then 1 else 0 end) as Partially_Aided,
sum(case when  sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  then 1 else 0 end) as Total
from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id";
      
       $where="where sc.school_type_id in ($school_type_id) and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  group by sc.district_name";
      }
      else
      {
        $select ="select sc.district_name,sc.district_id,
sum(case when sc.school_type_id =1 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id then 1 else 0 end) as Government,
sum(case when sc.school_type_id =2 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id then 1 else 0 end) as Fully_Aided,
sum(case when sc.school_type_id =4 and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  then 1 else 0 end) as Partially_Aided,
sum(case when  sc.school_type_id in (1,2,4) and u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  then 1 else 0 end) as Total
from students_school_child_count sc
join udise_staffreg u on u.school_key_id = sc.school_id";
        $where="where u.archive = 1 and u.teacher_type = 11 and u.appointed_subject = $sub_id  group by sc.district_name";
      }
        
      }
      $query = "$select $where";
      $return_value =  $this->db->query($query);
    
    return $return_value->result_array();
   

     }
     public function Teacher_Assigment($udise)
     {

      $query = "select a.ROLLNO,a.NAME,a.class,
case when a.containment_yn = 1 then 'Yes' when a.containment_yn = 2 then 'No' else 'Not Updated' end as Containment_Zone, 
case when a.transport_yn = 1 then 'Yes' when a.transport_yn = 2 then 'No' else 'Not Updated' end as Transport_Reqd, a.teacher_assigned, sc.school_name as Assigned_Exam_Centre from dge_class_10_11_2020 a
left join students_school_child_count sc on sc.school_id =  a.new_center_school_id 
where UDIS_CODE = $udise";
      $return_value =  $this->db->query($query);
       return $return_value->result_array();

     }
     public function update_Teacher_Assign($data)
     {
     // print_r($data);die();
      if($data['ROLLNO']!=0)
      {
        $this->db->WHERE('ROLLNO',$data['ROLLNO']);
        return $this->db->update('dge_class_10_11_2020',$data); 
       
      }
      
     }
     public function roll_no_details($roll_no)
     {
      $query = "select case when same_city_yn = 1 then 'Yes' when same_city_yn = 2 then 'No' else 'Not Updated' end as Same_City,
case when containment_yn = 1 then 'Yes' when containment_yn = 2 then 'No' else 'Not Updated' end as Containment_Zone,
case when transport_yn = 1 then 'Yes' when transport_yn = 2 then 'No' else 'Not Updated' end as Transport_Reqd,address,pincode,mobile1,mobile1_relation,mobile2,mobile2_relation,mobile3,mobile3_relation from dge_class_10_11_2020
where ROLLNO = $roll_no";
      $return_value =  $this->db->query($query);
       return $return_value->result_array();
     }
     public function teacher_details($school_id)
     {
     $query = "select teacher_id,teacher_name,mbl_nmbr from udise_staffreg where school_key_id = $school_id and archive=1";
      $return_value =  $this->db->query($query);
       return $return_value->result_array();
     }
     public function get_Teacher_det($records,$teacher_id)
     {
         $query = "select teacher_id,teacher_name,mbl_nmbr from udise_staffreg where teacher_id = $teacher_id and archive=1";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
        
      
      // if(!empty($get_rsult_teacher))
      // {
      //   $update_data = array('ROLLNO'=>$records['ROLLNO'] ,'teacher_id'=>$get_rsult_teacher[0]['teacher_id'],'teacher_assigned'=> $get_rsult_teacher[0]['teacher_name'],'teacher_phone'=> $get_rsult_teacher[0]['mbl_nmbr']);
      //   $this->db->WHERE('ROLLNO', $update_data['ROLLNO']);
      //  return $this->db->update('dge_class_10_11_2020',$update_data);
     
      // }
      // else
      // {
      //   return 0;
      // }
     
     }

     public function Teachers_Assigns($dist)
     {
      if($dist!="")
      {
       $select="select sc.udise_code,sc.school_name,sc.district_name,"; 
      $join="join dge_class_10_11_2020 a on a.udis_code = sc.udise_code";
      $group="where district_id = $dist group by sc.udise_code";
      }
      else
      {
       $select="select sc.district_name,sc.district_id,"; 
      $join="left join dge_class_10_11_2020 a on a.udis_code = sc.udise_code";
      $group="group by sc.district_name";
      }

      $query = "$select sum(case when a.class=10 then 1 else 0 end) as Class_10_Stud,
sum(case when a.class=11 then 1 else 0 end) as Class_11_Stud,
sum(case when a.containment_yn = 1 then 1 else 0 end) as Containment,
sum(case when a.transport_yn = 1 then 1 else 0 end) as Transport_Reqd,
sum(case when a.teacher_id is not null then 1 else 0 end) as Students_assigned_Teachers
from students_school_child_count sc $join $group";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }
     public function block_details($dist)
     {
      $query = "select distinct block_id,block_name from students_school_child_count where district_id = $dist";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }
     public function school_details($block)
     {
       $query = "select distinct school_id,school_name,udise_code from students_school_child_count where block_id = $block";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }
     public function staff_fixation_report($dist_id,$report)
     {
      
      if($report == 1)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.elig_sg,s.elig_bt_eng,s.elig_bt_mat,s.elig_bt_sci, s.elig_bt_ss, s.elig_bt_tam,s.elig_bt_total"; 
      }
      else if($report == 2)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.sanc_sg,s.sanc_bt_eng,s.sanc_bt_mat,s.sanc_bt_sci, s.sanc_bt_ss, s.sanc_bt_ss, s.sanc_bt_total"; 
     
      }
       else if($report == 3)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.in_position_sg,s.in_position_bt_eng,s.in_position_bt_mat,s.in_position_bt_sci, s.in_position_bt_ss, s.in_position_bt_tam, s.in_position_bt_total"; 
     
      }
       else if($report == 4)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.vacant_sg,s.vacant_bt_eng,s.vacant_bt_mat,s.vacant_bt_sci, s.vacant_bt_ss, s.vacant_bt_tam, s.vacant_bt_total"; 
     
      }
       else if($report == 5)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.surplus_sg,s.surplus_bt_eng,s.surplus_bt_mat,s.surplus_bt_sci, s.surplus_bt_ss, s.surplus_bt_tam, s.surplus_bt_total"; 
     
      }
       else if($report == 6)
      {
       $select="select sc.udise_code, sc.school_name, sc.cate_type, a.school_type, s.need_sg,s.need_bt_eng,s.need_bt_mat,s.need_bt_sci, s.need_bt_ss, s.need_bt_tam, s.need_bt_total"; 
     
      }

      $query = "$select from students_school_child_count sc join staffix_dse_sg_bt s on s.school_id = sc.school_id
join schoolnew_academic_detail a on a.school_key_id = s.school_id 
where district_id = $dist_id group by sc.udise_code";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();
     }
     public function Udise_Verification_1_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $join = "left join mhrd_mst_district d on d.udise_district_code= mhrd_school_master.district_cd where d.district_id =$dist and";
     }
     else if($block!="")
     {
      $join="left join mhrd_mst_block b on b.udise_block_code= mhrd_school_master.block_cd where b.block_id = $block and";
     }
     else if($edu_dist!="")
     {
      $join="left join mhrd_mst_loc_edu_block e on e.udise_edu_block_code= mhrd_school_master.block_cd_2 where e.dev_block_id = $edu_dist and";
     }
     else
     {
      $join="where";
     }

    $query = "select 'Primary' as Schools,sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master $join sch_category_id in (1,0)  union all 
select 'Upper Primary',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master $join sch_category_id in (2,4) union all 
select 'Secondary',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master $join sch_category_id in (6,7,8) union all 
select 'Higher Secondary',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master $join sch_category_id in (3,5,10,11)";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();

     }

     public function Udise_Verification_2_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $select="select case when gender=1 then 'Male' when gender<>1 then 'Female' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_district d on d.udise_district_code=left(sp.udise_sch_code,4) where d.district_id=$dist) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_district d on d.udise_district_code=left(tc.udise_sch_code,4) where d.district_id=$dist  group by Staff union all
select case when social_cat=1 then 'General' when social_cat=2 then 'SC' when social_cat=3 then 'ST' when social_cat=4 then 'OBC' else 'Others' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_district d on d.udise_district_code=left(sp.udise_sch_code,4) where d.district_id=$dist) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_district d on d.udise_district_code=left(tc.udise_sch_code,4) where d.district_id=$dist group by social_cat";

    }

     else if($block!="")
     {
      $select="select case when gender=1 then 'Male' when gender<>1 then 'Female' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_block b on b.udise_block_code=left(sp.udise_sch_code,6) where b.block_id=$block) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_block b on b.udise_block_code=left(tc.udise_sch_code,6) where b.block_id=$block  group by Staff union all
select case when social_cat=1 then 'General' when social_cat=2 then 'SC' when social_cat=3 then 'ST' when social_cat=4 then 'OBC' else 'Others' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_block b on b.udise_block_code=left(sp.udise_sch_code,6) where b.block_id=$block) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_block b on b.udise_block_code=left(tc.udise_sch_code,6) where b.block_id=$block  group by social_cat";
     }
     else if($edu_dist!="")
     {
      $select="select case when gender=1 then 'Male' when gender<>1 then 'Female' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_loc_edu_block e on e.udise_edu_block_code=left(sp.udise_sch_code,6) where e.dev_block_id=$edu_dist) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_loc_edu_block e on e.udise_edu_block_code=left(tc.udise_sch_code,6) where e.dev_block_id=$edu_dist group by Staff union all
select case when social_cat=1 then 'General' when social_cat=2 then 'SC' when social_cat=3 then 'ST' when social_cat=4 then 'OBC' else 'Others' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn sp left join mhrd_mst_loc_edu_block e on e.udise_edu_block_code=left(sp.udise_sch_code,6) where e.dev_block_id=$edu_dist) as Non_Teaching from mhrd_tch_profile tc left join mhrd_mst_loc_edu_block e on e.udise_edu_block_code=left(tc.udise_sch_code,6) where e.dev_block_id=$edu_dist group by social_cat";
     }
     else
     {
      $select="select case when gender=1 then 'Male' when gender<>1 then 'Female' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn) as Non_Teaching from mhrd_tch_profile tc  group by Staff union all
select case when social_cat=1 then 'General' when social_cat=2 then 'SC' when social_cat=3 then 'ST' when social_cat=4 then 'OBC' else 'Others' end as Staff,sum(nature_of_appt=1) as Regular,sum(nature_of_appt=2) as Contract,sum(nature_of_appt=3) as Part_Time,count(*) as Teaching,(select sum(nontch_accnt+nontch_lib_asst+nontch_lab_asst+nontch_udc+nontch_ldc+nontch_peon+nontch_watchman) from mhrd_sch_staff_posn) as Non_Teaching from mhrd_tch_profile tc  group by social_cat";
     }

$query ="$select";
      $return_value =  $this->db->query($query);
    return $return_value->result_array();
     //print_r($this->db->last_query());die();


     }

     public function Udise_Verification_3_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $join = "enr left join mhrd_mst_district d on d.udise_district_code=left(enr.udise_sch_code,4) where d.district_id=$dist and";
     }
     else if($block!="")
     {
      $join="enr left join mhrd_mst_block d on d.udise_block_code=left(enr.udise_sch_code,6) where d.block_id=$block and";
     }
     else if($edu_dist!="")
     {
      $join="enr left join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=left(enr.udise_sch_code,6) where d.dev_block_id=$edu_dist and";
     }
     else
     {
      $join="where";
     }

    $query = "select 'Pre-Primary' as Students,(select sum(cpp_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(cpp_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(cpp_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(cpp_b+cpp_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(cpp_b+cpp_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all
select 'Class 1' as Students,(select sum(c1_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c1_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c1_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c1_b+c1_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c1_b+c1_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 2' as Students,(select sum(c2_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c2_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c2_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c2_b+c2_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c2_b+c2_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 3' as Students,(select sum(c3_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c3_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c3_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c3_b+c3_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c3_b+c3_g) from mhrd_enr_total $join
 item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 4' as Students,(select sum(c4_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c4_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c4_g) from mhrd_sch_enr_fresh $join  item_id=50 and item_group=5) as Transgender,(select sum(c4_b+c4_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c4_b+c4_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 5' as Students,(select sum(c5_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c5_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c5_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c5_b+c5_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c5_b+c5_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 6' as Students,(select sum(c6_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c6_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c6_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c6_b+c6_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c6_b+c6_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 7' as Students,(select sum(c7_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c7_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c7_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c7_b+c7_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c7_b+c7_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 8' as Students,(select sum(c8_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c8_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c8_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c8_b+c8_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c8_b+c8_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 9' as Students,(select sum(c9_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c9_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c9_g) from mhrd_sch_enr_fresh $join  item_id=50 and item_group=5) as Transgender,(select sum(c9_b+c9_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c9_b+c9_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 10' as Students,(select sum(c10_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c10_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c10_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(c10_b+c10_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c10_b+c10_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 11' as Students,(select sum(c11_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c11_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c11_g) from mhrd_sch_enr_fresh $join  item_id=50 and item_group=5) as Transgender,(select sum(c11_b+c11_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c11_b+c11_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Class 12' as Students,(select sum(c12_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(c12_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(c12_g) from mhrd_sch_enr_fresh $join  item_id=50 and item_group=5) as Transgender,(select sum(c12_b+c12_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(c12_b+c12_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 union all 
select 'Total' as Students,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_enr_total $join item_id=1 and item_group=1) as Boys,(select sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Girls,(select sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_id=50 and item_group=5) as Transgender,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b+cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_enr_total $join item_id=1 and item_group=3) as CWSN,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b+cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_enr_total $join item_id=1 and item_group=1) as Total from mhrd_school_master group by 1 
";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();

     }
     public function Udise_Verification_4_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $join = "fr  left join mhrd_mst_district d on d.udise_district_code=left(fr.udise_sch_code,4) where d.district_id=$dist and";
     }
     else if($block!="")
     {
      $join=" fr left join mhrd_mst_block d on d.udise_block_code=left(fr.udise_sch_code,6) where d.block_id=$block and";
     }
     else if($edu_dist!="")
     {
      $join="fr left join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=left(fr.udise_sch_code,6) where d.dev_block_id=$edu_dist and";
     }
     else
     {
      $join="where";
     }

    $query = "select 'Boys' as Students,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_sch_enr_fresh $join item_id=1) as General,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_sch_enr_fresh $join item_id=2) as SC,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_sch_enr_fresh $join item_id=3) as ST,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_sch_enr_fresh $join item_id=4) as OBC,(select sum(cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b) from mhrd_sch_enr_fresh $join item_group=1) as Total from mhrd_sch_enr_fresh $join item_group=1 group by item_group union all
select 'Girls' as Students,(select  sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_id=1) as General,(select  sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_id=2) as SC,(select  sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_id=3) as ST,(select  sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_id=4) as OBC,(select  sum(cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g) from mhrd_sch_enr_fresh $join item_group=1) as Total from mhrd_sch_enr_fresh $join item_group=1 group by item_group";
      $return_value =  $this->db->query($query);
      return $return_value->result_array();

     }

  public function Udise_Verification_5_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $join = "m left join mhrd_mst_district d on d.udise_district_code=m.district_cd  where d.district_id=$dist";
     }
     else if($block!="")
     {
      $join="m left join mhrd_mst_block d on d.udise_block_code=m.block_cd  where d.block_id=$block";
     }
     else if($edu_dist!="")
     {
      $join=" m left join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=m.block_cd_2  where d.dev_block_id=$edu_dist";
     }
     else
     {
      $join="";
     }

        $query = "select case when sch_type=1 then 'Boys' when sch_type=2 then 'Girls' else 'Co-Ed' end as School_Type,sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master $join group by sch_type";
        $return_value =  $this->db->query($query);
         return $return_value->result_array();

     }

      public function Udise_Verification_6_report($dist,$block,$edu_dist)
     {
     if($dist!="")
     {
      $join = "left join mhrd_mst_district d on d.udise_district_code=m.district_cd  where d.district_id=$dist and";
     }
     else if($block!="")
     {
      $join="left join mhrd_mst_block d on d.udise_block_code=m.block_cd  where d.block_id=$block and";
     }
     else if($edu_dist!="")
     {
      $join="left join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=m.block_cd_2  where d.dev_block_id=$edu_dist and";
     }
     else
     {
      $join="where";
     }

        $query = "select 'Schools without Physics Lab' as 'Labs_in_Higher_Secondary_Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.phy_lab_yn=2 union all
select 'Schools without Chemistry Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.chem_lab_yn=2 union all
select 'Schools without Biology Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.boi_lab_yn=2 union all
select 'Schools without Mathematics Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.math_lab_yn=2 union all
select 'Schools without Language Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.lang_lab_yn=2 union all
select 'Schools without Geography Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.geo_lab_yn=2 union all
select 'Schools without Home Science Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.homesc_lab_yn=2 union all
select 'Schools without Psychology Lab' as 'Labs in Higher Secondary Schools',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join sch_category_id in (3,5,10,11) and fa.psycho_lab_yn=2";
        $return_value =  $this->db->query($query);
         return $return_value->result_array();

     }

     public function Udise_Verification_7_report($dist,$block,$edu_dist)
     {
      //due differetn joint condition so use joint and joint1
     if($dist!="")
     {
       $join = "sp left join mhrd_mst_district d on d.udise_district_code=left(sp.udise_sch_code,4) where d.district_id=$dist and";
       $join1="join mhrd_mst_district d on d.udise_district_code=left(fa.udise_sch_code,4) where d.district_id=$dist and";
       $join_where="";
     }
     else if($block!="")
     {
       $join = "sp left join mhrd_mst_block d on d.udise_block_code=left(sp.udise_sch_code,6) where d.block_id=$block and";
       $join1="join mhrd_mst_block d on d.udise_block_code=left(fa.udise_sch_code,6) where d.block_id=$block and";
       $join_where="";
     }
     else if($edu_dist!="")
     {
       $join = "sp left join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=left(sp.udise_sch_code,6) where d.dev_block_id=$edu_dist and";
       $join1="join mhrd_mst_loc_edu_block d on d.udise_edu_block_code=left(fa.udise_sch_code,6) where d.dev_block_id=$edu_dist and";
       $join_where="";
     }
     else
     {
      $join_where="where";
     }

        $query = "select 'Zero Enrolment Schools ' as 'Verification_Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m  where old_udise_sch_code in (select distinct udise_sch_code from mhrd_enr_total $join $join_where item_group=1 and item_id=1 and (cpp_b+c1_b+c2_b+c3_b+c4_b+c5_b+c6_b+c7_b+c8_b+c9_b+c10_b+c11_b+c12_b+cpp_g+c1_g+c2_g+c3_g+c4_g+c5_g+c6_g+c7_g+c8_g+c9_g+c10_g+c11_g+c12_g)=0) union all
select 'Zero Staff Schools ' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m  where old_udise_sch_code  in (select distinct udise_sch_code from mhrd_sch_staff_posn $join $join_where(tch_contract+tch_regular+tch_part_time)=0) union all

select 'Schools without drinking water ' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.drink_water_yn=2 union all
select 'Schools without electricity ' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.electricity_yn=2 union all
select 'Schools without ramp' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.ramps_yn=2 union all
select 'Schools without playground' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.playground_yn=2 union all
select 'Schools without Boundary wall' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.bndrywall_type=5 union all
select 'Schools without Boys Toilets' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.toiletb=0 and m.sch_type in (1,3) union all
select 'Schools without Girls Toilets' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.toiletg=0 and m.sch_type in (3,2) union all
select 'Schools without CWSN Toilets' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.toiletb_cwsn+fa.toiletg_cwsn=0 union all
select 'Schools without Staff Toilet' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_facility fa on fa.udise_sch_code=m.old_udise_sch_code $join_where $join1 fa.toilet_yn=2 union all
select 'Schools with Boarding Facility' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master m join mhrd_sch_profile fa on fa.udise_sch_code=m.old_udise_sch_code $join_where  $join1 (fa.boarding_pri_yn=1 or fa.boarding_upr_yn=1 or fa.boarding_sec_yn=1 or fa.boarding_hsec_yn=1) union all
select 'Schools with Minority Status' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where $join1 fc.minority_yn=1 union all
select 'Schools with Tinkering Lab' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where $join1 sch_category_id in (3,5,10,11) and fc.tinkering_lab_yn=1 union all
select 'Schools with ICT Lab' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.ict_lab_yn=1 union all
select 'Schools with CAL Lab' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.cal_lab_yn=2 union all
select 'Schools with Integrated Science Lab' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 sch_category_id in (3,5,10,11) and fc.integrated_lab_yn=2 and fa.sch_type in (3,2) union all
select 'Schools without SMC' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile s on s.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 sch_category_id in (3,5,10,11) and s.smc_yn=2 union all
select 'Schools without PTA' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 sch_category_id in (3,5,10,11) and fc.smdc_pta_yn=2 union all
select 'Schools without Handwash Facility' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility m on m.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 (m.handwash_yn=2) union all
select 'Schools that are Shift Schools' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile pr on pr.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 pr.shift_sch_yn=1 union all
select 'Special Schools for CWSN' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile pr on pr.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 pr.cwsn_sch_yn=1 union all
select 'Schools without All Weather Road access' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile pr on pr.udise_sch_code=fa.old_udise_sch_code $join_where  $join1  pr.approach_road_yn=2 union all
select 'Schools without Inspection/Visits' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_profile pr on pr.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 (pr.no_inspect=0 and pr.no_visit_brc=0 and pr.no_visit_crc=0 and pr.no_visit_dis=0) union all
select 'Schools with Dilapilated Buildings' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.bld_blk_dptd>0 union all
select 'Schools with Kutcha Buildings' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.bld_blk_kuc>0 union all
select 'Schools with Dilapilated Classrooms' as 'Verification Parameters',sum(sch_mgmt_id in (1,2,3,6,90)) as Govt,sum(sch_mgmt_id in (4)) as Aided,sum(sch_mgmt_id in (5,97,98)) as Unaided,sum(sch_mgmt_id in (91,92,93,94,95,96)) as Central,sum(sch_mgmt_id in (8)) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.clsrms_dptd>0  union all
select 'Schools not conducting medical checkups' as 'Verification Parameters',coalesce(sum(sch_mgmt_id in (1,2,3,6,90)),0) as Govt,coalesce(sum(sch_mgmt_id in (4)),0) as Aided,coalesce(sum(sch_mgmt_id in (5,97,98)),0) as Unaided,coalesce(sum(sch_mgmt_id in (91,92,93,94,95,96)),0) as Central,coalesce(sum(sch_mgmt_id in (8)),0) as Others,count(*) as Total from mhrd_school_master fa join mhrd_sch_facility fc on fc.udise_sch_code=fa.old_udise_sch_code $join_where  $join1 fc.medchk_tot=0

";
        $return_value =  $this->db->query($query);
         return $return_value->result_array();

     }
      
      public function stud_special_cash_incentive_rpt($select,$where,$groupby){

      $sql = "select ".$select."
      students_school_child_count.district_id,students_school_child_count.block_id,students_school_child_count.edu_dist_id,students_school_child_count.district_name,
      students_school_child_count.block_name,students_school_child_count.edu_dist_name,students_school_child_count.cate_type,
      students_school_child_count.school_type,students_school_child_count.school_type_id,
      count(students_child_detail.unique_id_no) as c12_ttl,
      count(students_special_cash_incentive.unique_id_no) as c12_cash_rcvd_ttl,
      (count(students_child_detail.unique_id_no) - count(students_special_cash_incentive.unique_id_no)) as c12_cash_not_rcvd_ttl
      from students_child_detail 
      left join students_special_cash_incentive on students_child_detail.school_id = students_special_cash_incentive.school_id and students_child_detail.unique_id_no = students_special_cash_incentive.unique_id_no
      left join students_school_child_count on students_child_detail.school_id = students_school_child_count.school_id 
      where students_child_detail.class_studying_id = 12 and students_child_detail.transfer_flag = 0 and students_school_child_count.cate_type = 'Higher Secondary School' and ".$where."
      group by ".$groupby;
      $query = $this->db->query($sql);
        return $query->result_array();
     }

    //  select id,school_key_id from schoolnew_academic_detail where school_key_id = 353117;
     public function save_nearest_schools($tbl,$data){
     $this->db->SELECT('Max(id) as max_id')->FROM($tbl)->WHERE('school_key_id',$data['school_key_id']);
     $query =  $this->db->get();
     $id = $query->num_rows() > 0 ? $query->row('max_id') : '';
     if(!empty($id))
     {
      $this->db->trans_start();
      $this->db->where('school_key_id',$data['school_key_id']); 
      $this->db->update($tbl,$data);
      $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();            
    }
    else{
      $this->db->trans_start();
      $this->db->insert($tbl,$data);
      $affectedRows=$this->db->affected_rows();
      $this->db->trans_complete();            
    }  

    // if ($this->db->trans_status() === false) {
    //   $message = 'Unable to Update details!';
    // }else if ($this->db->trans_status() === true) {
    //       if($affectedRows > 0 ) {
    //             $message = 'Successfully Updated!';
    //       }else $message = 'There is no changes in data. Haven`t Updated Anything!.';
    // }else $message = 'Something Went Wrong!. Nothing to Update';

    return array( $affectedRows,$this->db->trans_status() );
}

public function Students_Teacher_Data($report,$school)

{
  if($report ==1)
  {

   $sql = "select 'Students with Medium blank' as info,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
where (education_medium_id is null or education_medium_id =0) and transfer_flag =0 and sc.school_id  = $school
union all
select 'Students with Medium not matching Medium of their Section' as info, scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
join schoolnew_section_group g on g.school_key_id = scd.school_id
where (g.class_id = scd.class_studying_id) and (g.section = scd.class_section) and (g.school_medium_id <> scd.education_medium_id) and scd.transfer_flag =0 and sc.school_id = $school
union all
select 'Students with Community blank' as info,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
left join students_school_child_count sc on sc.school_id = scd.school_id
where (community_id is null or community_id = 0) and transfer_flag =0 and sc.school_id = $school
union all
select 'Students with Religion blank' as info, scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
where (religion_id is null or religion_id = 0) and transfer_flag =0 and sc.school_id =$school
union all
select 'Students with DOB blank' as info,scd.unique_id_no,scd.name,
scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
where (dob is null) and transfer_flag =0 and sc.school_id =$school
union all
select 'XI-XII Students with group blank' as info,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
where (group_code_id is null or group_code_id =0) and (class_studying_id in (11,12)) and transfer_flag =0 and sc.school_id =$school
union all
select 'Students with Income group incorrect' as info,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
join students_school_child_count sc on sc.school_id = scd.school_id
where (parent_income is null or parent_income = 0 or parent_income > 13) and transfer_flag =0 and sc.school_id =$school
union all
select 'Students with Mother Tongue blank' as info,scd.unique_id_no,scd.name, scd.class_studying_id, scd.class_section from students_child_detail scd
left join students_school_child_count sc on sc.school_id = scd.school_id
where (mothertounge_id is null or mothertounge_id = 0) and transfer_flag =0 and sc.school_id = $school";
}
else if($report == 2)
{
   $sql = "select 'Teachers with Social Category Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.social_category is null or u.social_category =0) and u.archive = 1 and t.category = 1 and sc.school_id = $school
union all
select 'Teachers with Nature of Appointment Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.appointment_nature is null or u.appointment_nature =0) and u.archive = 1 and  t.category = 1 and sc.school_id = $school
union all
select 'Teachers with Class Taught Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type where (u.class_taught is null or u.class_taught =0) and u.archive = 1 and t.category = 1 and sc.school_id = $school
union all
select 'Teachers with DOJ Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.staff_join is null or u.staff_join =0) and u.archive = 1 and t.category = 1 and sc.school_id = $school
union all
select ' Teachers with Academic Qualification Blank ' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.academic is null or u.academic =0) and u.archive = 1 and t.category = 1 and sc.school_id = $school
union all
select ' Teachers with Professional Qualification Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.professional is null or u.professional =0) and u.archive = 1 and t.category = 1 and sc.school_id = $school
union all
select 'Teachers with English, Math, Science, Social Science, Language Studied Upto Blank' as info,u.teacher_id, u.teacher_name from udise_staffreg u
join students_school_child_count sc on sc.school_id = u.school_key_id
join teacher_type t on t.id = u.teacher_type
where (u.english_upto is null or u.lang_study_upto is null or u.math_upto is null or u.science_upto is null or u.soc_study_upto is null) and u.archive = 1 and t.category = 1 and sc.school_id = $school";
}

      $query = $this->db->query($sql);
        return $query->result_array();

}

public function ELearnRprt()
{
  $sql="select class,subject,medium,
sum(case when file_type = 'Video' then 1 else 0 end) as Videos,
sum(case when file_type = 'Link' then 1 else 0 end) as Links,
sum(case when file_type = 'Document' then 1 else 0 end) as Documents,
count(*) as Total
from students_elearn_content where isactive=1 group by class, subject, medium order by class, subject;";
      $query = $this->db->query($sql);
        return $query->result_array();  
}
public function School_Master($dist,$block_id)
{
  if($dist!="")
  {
 $sql="select dis.district_name as District,blk.block_name as Block,ed.edn_dist_name as Education_District,ba.udise_code as UDISE_Code,ba.old_udise_code as old_udise_code,ba.school_name as School_Name,mg.management as Management,sty.manage_name as Management_Type,cat.category_name as Category,cg.category_name as Category_Group,case when ba.urbanrural =1 then 'Rural' else 'Urban' end as Locality,case when td.anganwadi = 1 then 'Yes' else 'No' end as Pre_Primary, case when td.anganwadi_schl = 1 then 'Yes' else 'No' end as Anganwadi, dep.department as Directorate,lb.localbody_name as LocalBody,lba.name as Town_Munici_Village_Corp,hb.name as Habitation_Ward,cl.clus_name as Cluster,ba.latitude as Latitute,ba.longitude as Longitude,ass.assembly_name as Assembly,pa.parli_name as Parliament from schoolnew_basicinfo ba left join schoolnew_district dis on dis.id=ba.district_id left join schoolnew_block blk on blk.id=ba.block_id left join schoolnew_edn_dist_mas ed on ed.id=ba.edu_dist_id left join schoolnew_academic_detail aca on aca.school_key_id=ba.school_id left join schoolnew_management mg on mg.id=ba.sch_management_id left join schoolnew_category cat on cat.id=ba.sch_cate_id left join schoolnew_type cg on cg.id=cat.type_id left join schoolnew_manage_cate sty on sty.id=ba.manage_cate_id left join schoolnew_school_department dep on dep.id=ba.sch_directorate_id left join schoolnew_local_body lb on lb.zone_type_id=ba.local_body_id
left join schoolnew_training_detail td on td.school_key_id = ba.school_id
left join schoolnew_localbody_all lba on lba.id=ba.lb_vill_town_muni left join schoolnew_habitation_all hb on hb.id=ba.lb_habitation_id left join schoolnew_cluster_mas cl on cl.clus_code=ba.cluster_id left join schoolnew_assembly ass on ass.id=ba.assembly_id left join schoolnew_parliament pa on pa.id=ba.parliament_id where ba.curr_stat=1 and ba.district_id=$dist group by ba.udise_code";
  }
  if($block_id!="")
  {
    $sql="select dis.district_name as District,blk.block_name as Block,ed.edn_dist_name as Education_District,ba.udise_code as UDISE_Code,ba.old_udise_code as old_udise_code,ba.school_name as School_Name,mg.management as Management,sty.manage_name as Management_Type,cat.category_name as Category,cg.category_name as Category_Group,case when ba.urbanrural =1 then 'Rural' else 'Urban' end as Locality,case when td.anganwadi = 1 then 'Yes' else 'No' end as Pre_Primary, case when td.anganwadi_schl = 1 then 'Yes' else 'No' end as Anganwadi, dep.department as Directorate,lb.localbody_name as LocalBody,lba.name as Town_Munici_Village_Corp,hb.name as Habitation_Ward,cl.clus_name as Cluster,ba.latitude as Latitute,ba.longitude as Longitude,ass.assembly_name as Assembly,pa.parli_name as Parliament from schoolnew_basicinfo ba left join schoolnew_district dis on dis.id=ba.district_id left join schoolnew_block blk on blk.id=ba.block_id left join schoolnew_edn_dist_mas ed on ed.id=ba.edu_dist_id left join schoolnew_academic_detail aca on aca.school_key_id=ba.school_id left join schoolnew_management mg on mg.id=ba.sch_management_id left join schoolnew_category cat on cat.id=ba.sch_cate_id left join schoolnew_type cg on cg.id=cat.type_id left join schoolnew_manage_cate sty on sty.id=ba.manage_cate_id left join schoolnew_school_department dep on dep.id=ba.sch_directorate_id left join schoolnew_local_body lb on lb.zone_type_id=ba.local_body_id
left join schoolnew_training_detail td on td.school_key_id = ba.school_id
left join schoolnew_localbody_all lba on lba.id=ba.lb_vill_town_muni left join schoolnew_habitation_all hb on hb.id=ba.lb_habitation_id left join schoolnew_cluster_mas cl on cl.clus_code=ba.cluster_id left join schoolnew_assembly ass on ass.id=ba.assembly_id left join schoolnew_parliament pa on pa.id=ba.parliament_id where ba.curr_stat=1 and ba.block_id=$block_id group by ba.udise_code";
  }

 
   $query = $this->db->query($sql);
        return $query->result_array();  
}


public function no_of_std($dist_id,$ac_year)
{
  if($dist_id!="")
  {
    $select="r.id,sc.block_name,sc.school_id,sc.udise_code, sc.school_name";
    $current_rtes="sum(case when scd.child_admitted_under_reservation = 'Yes' and scd.transfer_flag = 0 and scd.class_studying_id in (13,14) then 1 else 0 end) as Current_RTE_KG,
sum(case when scd.child_admitted_under_reservation = 'Yes' and scd.transfer_flag = 0 and scd.class_studying_id in (1,2,3,4,5,6,7,8) then 1 else 0 end) as Current_RTE_1_8,";
$where="and sc.district_id = $dist_id  group by sc.udise_code";
  }
  else
  {
   $select="sc.district_name,sc.district_id";
    $current_rtes="";
    $where="group by sc.district_id";
  }

  $sql="select $select,sum(lkg_b+lkg_t+lkg_g+ukg_b+ukg_g+ukg_t) as Current_KG_All,
sum(c1_b+c1_g+c1_t+c2_b+c2_g+c2_t+c3_b+c3_g+c3_t+c4_b+c4_g+c4_t+c5_b+c5_g+c5_t+c6_b+c6_g+c6_t+c7_b+c7_g+c7_t+c8_b+c8_g+c8_t) as Current_1_8_All,$current_rtes r.rte_students_kg as Submitted_KG,r.rte_students_1_8 as Submited_1_8,sum(r.rte_students_kg+r.rte_students_1_8) as Submitted_Total from schoolnew_basicinfo b
left join students_school_child_count sc on sc.school_id = b.school_id
left join schoolnew_rte_reimbursement r on r.school_id = sc.school_id and sc.school_type_id in (2,3,4) and r.acyear= $ac_year and r.isactive = 1
left join schoolnew_academic_detail d on d.school_key_id = sc.school_id and d.rte=1
left join students_child_detail scd on scd.school_id = sc.school_id
where sc.school_type_id in (2,3,4)  $where";
   $query = $this->db->query($sql);
   
  return $query->result_array();  
 
}
public function amount_confirm($dist_id,$ac_year)
{
  if($dist_id!="")
  {
   $select=" sc.block_name, sc.udise_code, sc.school_name,sc.school_id,";
   $condtion=",r.calculated_amount_kg, r.calculated_amount_1_8,r.calculated_amount_total,
case when r.submit_status = 0 then 'Not Submitted' when r.submit_status = 1 then 'Submitted' end as Submission_Status,r.from_date,r.to_date";
   $where="and sc.district_id = $dist_id  group by sc.udise_code";
  }
  else
  {
  
   $select="sc.district_id,sc.district_name,";
   $condtion=",r.reimburse_amount_kg as Reimbursement_KG,r.reimburse_amount_1_8 as Reimbursement_1_8,sum(r.reimburse_amount_kg + r.reimburse_amount_1_8) as Total_Reimbursement";
   $where="group by sc.district_id";
  }
  $sql="select $select r.rte_students_kg as Submitted_KG, r.rte_students_1_8 as Submited_1_8,
sum(r.rte_students_kg+r.rte_students_1_8) as Submitted_Total $condtion from schoolnew_basicinfo b left join students_school_child_count sc on sc.school_id = b.school_id
left join schoolnew_rte_reimbursement r on r.school_id = sc.school_id and sc.school_type_id in (2,3,4) and r.acyear=$ac_year and r.isactive = 1
left join schoolnew_academic_detail d on d.school_key_id = sc.school_id and d.rte=1
left join students_child_detail scd on scd.school_id = sc.school_id
where sc.school_type_id in (2,3,4) $where";
  $query=$this->db->query($sql);
  return $query->result_array();

}
public function Reimbursement_Status($dist_id,$ac_year)
{
  if($dist_id!="")
  {
   $selct="sc.block_name, sc.udise_code, sc.school_name,sc.school_id, r.calculated_amount_kg, r.calculated_amount_1_8,r.calculated_amount_total,
r.reimburse_amount_kg as Approved_KG_Amt, r.reimburse_amount_1_8 as Approved_1_8_Amt,r.reimburse_amount_total as Approved_Total_Amt,
case when r.submit_status = 0 then 'Not Submitted' when r.submit_status = 1 then 'Submitted' end as Submission_Status,
case when r.approval_status = 0 then 'Not Approved' when r.submit_status = 1 and r.approval_status = 0 then 'In Progress' when r.approval_status = 1 then 'Approved' when r.approval_status = 2 then 'Rejected' end as Approve_Status,
case when r.reimburse_status = 0 then 'Yet to Reimburse' when r.reimburse_status = 1 then 'Reimbursement Complete' end as Reimburse_Status";
$where="and sc.district_id = $dist_id  group by sc.udise_code";
  }
  else
  {
    $selct="sc.district_id,sc.district_name,r.calculated_amount_kg as Reimbursement_claimed_KG,r.calculated_amount_1_8 as Reimbursement_claimed_1_8,sum(r.calculated_amount_kg +r.calculated_amount_1_8) as Total_reimbursement_claimed,r.reimburse_amount_kg as Reimbursement_Approved_KG,r.reimburse_amount_1_8 as Reimbursement_Approved_1_8,sum(reimburse_amount_kg+reimburse_amount_1_8) as Total_Reimbursement_Approved";
  $where="group by sc.district_id";
  }

  $sql="select $selct from schoolnew_basicinfo b
left join students_school_child_count sc on sc.school_id = b.school_id
left join schoolnew_rte_reimbursement r on r.school_id = sc.school_id and sc.school_type_id in (2,3,4) and r.acyear=$ac_year and r.isactive = 1
left join schoolnew_academic_detail d on d.school_key_id = sc.school_id and d.rte=1
left join students_child_detail scd on scd.school_id = sc.school_id
where sc.school_type_id in (2,3,4) $where";
  $query=$this->db->query($sql);
  return $query->result_array();

}
public function Save_step1($records)
{
    $school_id=$records['school_id'];
    $ac_year=json_encode($records['acyear']);
 
 //For Clacluation of total
$sql="select schoolnew_rte_mst_reimbursement.amount_per_kg,schoolnew_rte_mst_reimbursement.amount_per_1_8 from schoolnew_rte_reimbursement left join schoolnew_rte_mst_reimbursement ON schoolnew_rte_mst_reimbursement.acyear=schoolnew_rte_reimbursement.acyear where schoolnew_rte_mst_reimbursement.acyear= $ac_year";
  $query=$this->db->query($sql);
  $calcluation = $query->result_array();

//Calculation 
  $Calculated_amount_kg =$records['rte_students_kg']*$calcluation[0]['amount_per_kg'];
  $Calculated_amount_1_8=$records['rte_students_1_8']*$calcluation[0]['amount_per_1_8'];
  $Calculated_amount_total=$Calculated_amount_kg + $Calculated_amount_1_8;

//Assign value for fields
 $records['calculated_amount_kg']= $Calculated_amount_kg;
 $records['calculated_amount_1_8']= $Calculated_amount_1_8;
 $records['calculated_amount_total']= $Calculated_amount_total;
 $records['created_at'] = date('Y-m-d h:i:s');
  


 //Check Exist Data found or Not 
  if($records['school_id']!="")
  {
    
     $sql="select * from schoolnew_rte_reimbursement where school_id=$school_id and acyear= $ac_year";
  $query=$this->db->query($sql);
  $res = $query->result_array();
  //print_r($records);
   if($res[0]['school_id'] == $school_id && $res[0]['acyear'] == $records['acyear'])
   {
      
       $this->db->WHERE('school_id', $records['school_id']);
      return $this->db->update('schoolnew_rte_reimbursement',$records);
      
   }
   else
   {
    
    return $this->db->insert('schoolnew_rte_reimbursement',$records);
   }

  }

}

public function Update_Step_2($records)
{
    $school_id=$records['school_id'];
    $ac_year=json_encode($records['acyear']);

  $sql="select * from schoolnew_rte_reimbursement where school_id=$school_id and acyear= $ac_year";
  $query=$this->db->query($sql);
  $res = $query->result_array();
  //print_r($records);
   if($res[0]['school_id'] == $school_id && $res[0]['acyear'] == $records['acyear'])
   {
     $this->db->WHERE('school_id', $records['school_id']);
      return $this->db->update('schoolnew_rte_reimbursement',$records);
   }
 }
 public function class_list_quesBank()
 {
$sql="select distinct class from students_elearn_mst_subjects";
  $query=$this->db->query($sql);
  return $query->result_array();

 }
 public function subject_list_quesBank($class)
 {
  $sql="select distinct subject from students_elearn_mst_subjects where class=$class";
  $query=$this->db->query($sql);
  return $query->result_array();
 }
 public function save_question_bank_details($records)
 {


   if($records['qset_id']!="")
   {
      $this->db->WHERE('qset_id', $records['qset_id']);
       return $this->db->update('exams_quest_set',$records);
   }
else
   {
   return $this->db->insert('exams_quest_set',$records);
  }
  
 
}
public function delete_question_bank_details($id)

{     
  if($id!="")
  {
       $this->db->WHERE('qset_id',$id);
       return $this->db->update('exams_quest_set',array('isactive'=>0));
  }
  else
  {
    return 0; 

  }
    
}
 public function updatemgmtdocs($mgmt_docs){
      if(!empty($mgmt_docs)){
      if($this->db->insert_batch('mgmt_app_doc_uploads',$mgmt_docs)){
         return true;
      }else return false;
      }else return false;
 }

public function eclass_id($table,$where){
  $this->db->select('id')
  ->from($table)
  ->where($where);
$query =  $this->db->get();
if($query->num_rows() > 0){
return $query->row('id');
}else{
return 0;
}
}

/**RTE State level and District level Report and RTE pswd reterive by wesley starts here**/    
public function RTEdaywiserep($data)
{
  $sql = "select date(appli_complete_date) as Applied_Date,
  sum(case when (app_category = 1 and appli_status = 1) then 1 else 0 end) as WS,
  sum(case when (app_category = 2 and appli_status = 1) then 1 else 0 end) as DG,
  sum(case when (app_category = 3 and appli_status = 1) then 1 else 0 end) as DG_Special,
  sum(case when appli_status = 1 then 1 else 0 end) as Total 
  from student_rte_appli where appli_status = 1";
   if($data['emis_usertype'] == '9'){ //CEO
     $dist_id = $data['dist_id'];
     $sql .= " and district_id = '$dist_id' group by Applied_Date;";
   }else if($data['emis_usertype'] == '5'){  //State
     $sql .= " group by Applied_Date;";
   }
  $query = $this->db->query($sql);
  //print_r($this->db->last_query());die();
  $result = $query->result_array();
  return $result;
} 

public function RTEpasswrd($reg_no)
{
  $sql = "select ref as pwd from student_rte_appli where register_no = '$reg_no';";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  return $result;
} 
/**RTE State level and District level Report and RTE pswd reterive by wesley ends here**/ 



/* MDEIUM List API*/
public function Get_UdiseList($udise_code)
{
$sql = "SELECT schoolnew_basicinfo.school_id,schoolnew_mediumentry.id,schoolnew_mediumentry.medium_instrut as medium_id,schoolnew_mediumofinstruction.MEDINSTR_DESC as medium_name FROM tnschools_working.schoolnew_basicinfo left join schoolnew_mediumentry ON schoolnew_mediumentry.school_key_id = schoolnew_basicinfo.school_id left join schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID = schoolnew_mediumentry.medium_instrut where schoolnew_basicinfo.udise_code=$udise_code";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  return $result;
}
public function add_NewMedium($data,$udise)
{
  $medium_exist_id = $data['medium_instrut'];

  $sql = "SELECT schoolnew_basicinfo.school_id,schoolnew_mediumentry.id,schoolnew_mediumentry.medium_instrut as medium_id,schoolnew_mediumofinstruction.MEDINSTR_DESC as medium_name FROM tnschools_working.schoolnew_basicinfo left join schoolnew_mediumentry ON schoolnew_mediumentry.school_key_id = schoolnew_basicinfo.school_id left join schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.MEDINSTR_ID = schoolnew_mediumentry.medium_instrut where schoolnew_basicinfo.udise_code=$udise and schoolnew_mediumentry.medium_instrut=$medium_exist_id";
  $query = $this->db->query($sql);
  $result = $query->result_array();


if(!empty($result))
{
     
  for($i=0;$i<count($result);$i++)
  {
   
   if($result[$i]['medium_id'] == $data['medium_instrut'])
   {
     return 0;
   }
  }
}
else 
{
  $data_val =array('school_key_id'=> $data['school_key_id'],'medium_instrut'=>$data['medium_instrut']);
   $insert_medium = $this->db->insert('schoolnew_mediumentry',$data_val);
   return $insert_medium;
}

}
public function Get_medium_list()
{
  $sql = "SELECT MEDINSTR_ID as medium_id,MEDINSTR_DESC as medium_name from schoolnew_mediumofinstruction";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  return $result;

}
public function delete_Medium($medium,$school,$id)
{
 $sql = "SELECT * from schoolnew_section_group where school_medium_id=$medium and school_key_id=$school";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  
  
  if(!empty($result))
  {
   
   return 0;
   
  }
  else 
  {
      $this->db->WHERE('id', $id);
      $this->db->WHERE('school_key_id', $school);
       $this->db->WHERE('medium_instrut', $medium);
     return $this->db->delete('schoolnew_mediumentry');
  }
     
  
}
public function Report_schoolClassMedium($school)
{

  $sql = "select scd.unique_id_no as EMIS_ID, scd.name as Name, scd.gender,
  case when scd.class_studying_id =15 then 'PreKG' when scd.class_studying_id = 13 then 'LKG' when scd.class_studying_id = 14 then 'UKG' else class_studying_id end as Class, scd.class_section as Section from students_child_detail scd
  where scd.id>25604525 and school_id = $school order by scd.class_studying_id,name;";
   $query = $this->db->query($sql);
   $result = $query->result_array();
   return $result;
}

public function Report_schoolClassMedium1($school)
{
  $sql = "select scd.unique_id_no as EMIS_ID, scd.name as Name, 
 case when scd.class_studying_id =15 then 'PreKG' when scd.class_studying_id = 13 then 'LKG' when scd.class_studying_id = 14 then 'UKG' else scd.class_studying_id end as Class, scd.class_section as Section from students_child_detail scd
join students_transfer_history h on h.unique_id_no = scd.unique_id_no
where admit_date >= '2020-08-17' and h.school_id_admit = $school and scd.transfer_flag=0 order by scd.class_studying_id, name;";
  $query = $this->db->query($sql);
  $result = $query->result_array(); 
  return $result;
}

/* END */
public function getudisecode($school_id){
  $this->db->select('udise_code'); 
  $this->db->where('school_id',$school_id);
  $query = $this->db->get('schoolnew_basicinfo');
  $uc = $query->first_row()->udise_code;
  return $uc;
}

public function Get_BRTE_TeachersList($dist){
  $this->db->distinct();
  $this->db->select('brte_id,brte_name'); 
  $this->db->where('district_id',$dist);
  $query = $this->db->get('brte_school_groups')->result_array();
  //print_r($this->db->last_query());die();
  return $query;
}

public function BRTE_assigned_to_block($bid){
  $sql = "select DISTINCT schoolnew_brte_map.brte_id as 'BRTEID',
                 brte_school_groups.brte_name as ' BrteName',
                 brte_school_groups.brte_sub as 'Subject' 
            from schoolnew_brte_map 
       left join brte_school_groups on brte_school_groups.brte_id = schoolnew_brte_map.brte_id
           where schoolnew_brte_map.map_type = 2 and schoolnew_brte_map.isactive=0 and schoolnew_brte_map.block_id = ".$bid.";";
  $query = $this->db->query($sql);
  $result = $query->result_array(); 
  return $result;
}

}
  

?>