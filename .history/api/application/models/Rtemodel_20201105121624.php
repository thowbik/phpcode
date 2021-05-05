<?php

class Rtemodel extends CI_Model
{
     function __construct() 
	   {
       parent::__construct();
     }

  function rte_application_status($district_id)
  {
      if($district_id !="")
      {
       $where ='and sc.district_id = '.$district_id.' ';  
       //$group= 'group by sc.block_id';
       $group= 'group by sc.udise_code';
      }
      else
      {

        $where ="";
        $group= 'group by sc.district_id';
        //$group= 'group by sc.udise_code';
      }
      
//            $sql = "select sc.district_name,sc.district_id,sc.block_name, sc.udise_code, sc.school_name, sc.management, c.rte_seats,
// sum(case when rte.app_category = 1 and rte.appli_status = 1 then 1 else 0 end) as Received_WS,
// sum(case when rte.app_category = 2 and rte.appli_status = 1 then 1 else 0 end) as Received_DG,
// sum(case when rte.app_category = 3 and rte.appli_status = 1 then 1 else 0 end) as Received_DGS,
// sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as Eligible_WS,
// sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as Eligible_DG,
// sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as Eligible_DGS,
// sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_WS,
// sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_DG,
// sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_DGS,
// sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and rte.admit_status = 1 then 1 else 0 end) as Admit_WS,
// sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and rte.admit_status = 1 then 1 else 0 end) as Admit_DG,
// sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) and rte.allot_status = 1 and rte.admit_status = 1 then 1 else 0 end) as Admit_DGS
// from students_school_child_count sc
// left join student_rte_applied_schools s on sc.school_id = s.school_id 
// left join student_rte_appli rte on rte.register_no = s.register_no
// join schoolnew_rte c on c.school_key_id = s.school_id
// join schoolnew_academic_detail a on a.school_key_id = sc.school_id
// where s.isactive = 1 and a.rte=1 ".$where.$group."";

          $sql = "select sc.district_name,sc.district_id,sc.block_name, sc.udise_code, sc.school_name, sc.management, c.rte_seats,
          sum(case when rte.app_category = 1 and rte.appli_status = 1 then 1 else 0 end) as Received_WS,
          sum(case when rte.app_category = 2 and rte.appli_status = 1 then 1 else 0 end) as Received_DG,
          sum(case when rte.app_category = 3 and rte.appli_status = 1 then 1 else 0 end) as Received_DGS,
          sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as
          Eligible_WS,
          sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as
          Eligible_DG,
          sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) then 1 else 0 end) as
          Eligible_DGS,
          sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (1) and
          s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_WS,
          sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (1) and
          s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_DG,
          sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (1) and
          s.school_id = rte.allot_school_id then 1 else 0 end) as Allotted_DGS,
          sum(case when rte.app_category = 1 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (0,1) and
          rte.admit_status = 1 and rte.allot_school_id = sc.school_id then 1 else 0 end) as Admit_WS,
          sum(case when rte.app_category = 2 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (0,1) and
          rte.admit_status = 1 and rte.allot_school_id = sc.school_id then 1 else 0 end) as Admit_DG,
          sum(case when rte.app_category = 3 and rte.appli_status = 1 and rte.verify_status in (1,2) and s.allot_status in (0,1) and
          rte.admit_status = 1 and rte.allot_school_id = sc.school_id then 1 else 0 end) as Admit_DGS
          from students_school_child_count sc
          left join student_rte_applied_schools s on sc.school_id = s.school_id and s.isactive = 1 
          left join student_rte_appli rte on rte.register_no = s.register_no and s.isactive=1
          join schoolnew_rte c on c.school_key_id = s.school_id
          join schoolnew_academic_detail a on a.school_key_id = sc.school_id
          where s.isactive = 1 and a.rte=1 ".$where.$group."";
         $query = $this->db->query($sql);
            //print_r($this->db->last_query());die();
         $result = $query->result_array();

        return $result;
     }

     function rte_typewise_application($district_id)
     {         
       if($district_id !="")
      {
       $where ='and sc.district_id = '.$district_id.'';  
       $group= 'group by sc.school_id';
      }
      else
      {
        $where ="";
        $group= 'group by sc.district_id';
      }

      $sql = "select sc.district_name,sc.block_name, sc.udise_code, sc.school_name, sc.management,
              sum(case when rte.appli_status = 1 then 1 else 0 end) as Received,
              sum(case when rte.app_category = 1 and rte.appli_status = 1 then 1 else 0 end) as WS,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 2 and rte.appli_status = 1 then 1 else 0 end) as DG_BC,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 3 and rte.appli_status = 1 then 1 else 0 end) as DG_MBC,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 4 and rte.appli_status = 1 then 1 else 0 end) as DG_SC,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 5 and rte.appli_status = 1 then 1 else 0 end) as DG_ST,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 6 and rte.appli_status = 1 then 1 else 0 end) as DG_SCA,
              sum(case when rte.app_category = 2 and rte.app_sub_category = 7 and rte.appli_status = 1 then 1 else 0 end) as DG_DNC,
              sum(case when rte.app_category = 3 and rte.app_sub_category = 8 and rte.appli_status = 1 then 1 else 0 end) as DGS_Orphan,
              sum(case when rte.app_category = 3 and rte.app_sub_category = 9 and rte.appli_status = 1 then 1 else 0 end) as DGS_DA,
              sum(case when rte.app_category = 3 and rte.app_sub_category = 10 and rte.appli_status = 1 then 1 else 0 end) as DGS_Scav,
              sum(case when rte.app_category = 3 and rte.app_sub_category = 11 and rte.appli_status = 1 then 1 else 0 end) as DGS_Trans,
              sum(case when rte.app_category = 3 and rte.app_sub_category = 12 and rte.appli_status = 1 then 1 else 0 end) as DGS_HIV
              from student_rte_appli rte
              left join student_rte_applied_schools s on s.register_no = rte.register_no 
              left join students_school_child_count sc on sc.school_id = s.school_id
              where s.isactive = 1 $where $group";
  
         $query = $this->db->query($sql);
         $result = $query->result_array();
       //  print_r($this->db->last_query());die();
        return $result;

     }
     function get_list_of_student($reg_no,$district_id)
     {

      if($reg_no=="")
          {

           $sql="SELECT std.register_no,std.student_name,b_r_t.category,std.map_address,std.address,
           std.verify_status,std.reason,std.remarks FROM student_rte_appli as std JOIN 
           baseapp_rte_type b_r_t ON std.app_category = b_r_t.cat_id and std.app_sub_category = b_r_t.id
           where district_id = $district_id 
           and std.appli_status = 1";
           $query = $this->db->query($sql);
           $result = $query->result_array();
           return $result;  
           
           }

      else if($reg_no!="") 
            {
           
            $sql="SELECT std.register_no,std.student_name,std.gender,std.dob,std.class,b_r_t.category,
            b_r_t.sub_category,std.mobile,std.map_address,std.address,std.verify_status,std.verified_by,
            std.reason,std.remarks,std.photo_filepath,std.proof_of_birth_filepath,std.parent_id_filepath,
            std.address_proof_filepath,std.other_certifi_filepath FROM student_rte_appli as std JOIN 
            baseapp_rte_type b_r_t ON std.app_category = b_r_t.cat_id and std.app_sub_category = b_r_t.id where  district_id = $district_id 
            and std.register_no = $reg_no and std.appli_status = 1";

                   $query = $this->db->query($sql);
                   $result = $query->result_array();
                   return $result;    
             }
      }
      function RTE_Students_list($reg)
      {

        if($reg!="")
        {
           $sql="SELECT std.student_name as name,std.gender as gender,std.dob as dob,std.class as class_studying_id,std.email as email,std.admit_status as AdmitStatus,mobile as phone_number,community as community_id,religion as religion_id,district_id as district_id,pincode as pin_code,r_type.id as rte_type,appli_status as ApplStatus,verify_status as VerifyStatus from  student_rte_appli as std  LEFT JOIN baseapp_rte_type r_type ON r_type.cat_id =  std.app_category and r_type.id=std.app_sub_category   where std.appli_status = 1 and register_no = $reg";

                   $query = $this->db->query($sql);
                   $result = $query->result_array();               
                   if(!empty($result))
                   {
                      if($result[0]['AdmitStatus'] == 1)
                      {
                          return 1;
                      }else if($result[0]['ApplStatus'] == 1 && $result[0]['VerifyStatus'] == 1 || $result[0]['VerifyStatus'] == 2)
                      {
                          $final_result=$result;
                          return $final_result;
                      }else{                   
                          $final_result=array();                    
                          return $final_result;
                      }
                   }
             
        }
      }


      function update_verfication_student($update_data)
      
        {
            
               $this->db->where('register_no',$update_data['register_no']);
               $this->db->where('appli_status',1);
               $rte_schools = $this->db->update('student_rte_appli',$update_data); 
            
               return $rte_schools;
       }

       function get_rte_report($schl_id,$dist_id)
       {
        if(!empty($schl_id))
        {
         $where = 'and sc.school_id = "'.$schl_id.'"';
        }
        else
        {
           $where = 'and sc.district_id = "'.$dist_id.'"';
        }


          //$schl_id = '727';
          $SQL = "select r.register_no as Reg_No, student_name as Applicant,dob as DOB,case when gender =1 then 'Boy' when gender = 2 then 'Girl' when gender = 3 then 'Transgender' end as Gender,case when class= 13 then 'LKG' when class = 1 then class end as Applied_Class,rt.category as Category, rte.sub_category as Sub_Category, mobile as Mobile,parent_name as Parent_Guardian, r.address as Address, r.pincode as PIN, case when verify_status =0 then 'Verification Pending' when verify_status = 1 then 'Eligible' when verify_status = 3 then 'Not Eligible' when verify_status = 2 then 'Document Missing' end as Status, case when reason=0 then 'NA' when reason=1 then 'Invalid Document' when reason=2 then 'Incorrect Residence' when reason=3 then 'Other' end as Reason, remarks as Remarks,  s.allot_status,sc.district_name
          from student_rte_appli r
          left join student_rte_applied_schools s on s.register_no = r.register_no and r.appli_status = 1 and s.isactive=1
          join students_school_child_count sc on sc.school_id = s.school_id
          join schoolnew_academic_detail a on a.school_key_id= sc.school_id
          inner join baseapp_rte_type rt on rt.cat_id = r.app_category
          inner join baseapp_rte_type rte on rte.id  = r.app_sub_category
          where r.appli_status = 1 and s.isactive =1 $where and a.rte=1 group by r.register_no order by r.student_name;";  
          $query = $this->db->query($SQL);
          $result = $query->result_array();
          //print_r($result);die();
          return $result;
       }

/**No of RTE seats in School starts here by wesley**/
      function rte_seats($schl_id)
      {
        $SQL = "select rte_seats as tot_rte_seats from schoolnew_rte where isactive = 1 and school_key_id = '$schl_id';";  
        $query = $this->db->query($SQL);
        $result = $query->result_array();
        return $result;
      }
/**No of RTE seats in School ends here by wesley**/

/**Check Whether RTE seats are available in School api starts here by wesley**/
      function seats_available_in_schl($schl_id)
      {
        $sql = "select * from student_rte_appli where allot_school_id = $schl_id;";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if(!empty($data)){
         // $SQL = "select (rte_seats-rte_applied) as  rte_balance from schoolnew_rte r join (select allot_school_id,count(*) as rte_applied from student_rte_appli group by allot_school_id)  as a on a.allot_school_id=r.school_key_id where school_key_id='$schl_id';";
          $SQL = "select (rte_seats-rte_applied) as  rte_balance from schoolnew_rte r join (select allot_school_id,count(*) as rte_applied from student_rte_appli where admit_status = 1 group by allot_school_id)  as a on a.allot_school_id=r.school_key_id where school_key_id='$schl_id';";
          $query = $this->db->query($SQL);
          $result = $query->result_array();
          return $result['0']['rte_balance'];
        }else{
          $SQL = "select rte_seats from schoolnew_rte where school_key_id = $schl_id;";
          $query = $this->db->query($SQL);
          $result = $query->result_array();
          return $result['0']['rte_seats'];
        }
      }
/**Check Whether RTE seats are available in School api ends here by wesley**/      



/// RTE ALLOTED STATUS CHNAGE MIDEL
public function rte_allotstatus_change($data)
{
    $school_id=$data['school_id'];
    $register_no=$data['register_no'];
  //  echo $data['allot_status'];die();
   $allot_status=$data['allot_status'];
    $update_data = array('allot_status' =>$allot_status);

      if(!empty($school_id) && !empty($register_no))
      {
               $this->db->where('register_no',$register_no);
                 $this->db->where('school_id',$school_id);
               $rte_schools = $this->db->update('student_rte_applied_schools',$update_data); 
            
               $afftectedRows = $this->db->affected_rows();

                if($afftectedRows !=0)
                {
                  $insert_array = array('register_no'=> $register_no,'school_id'=> $school_id,'allot_status'=>$allot_status,'modified_date'=>date('Y-m-d H:i:s'));
                  
                    $this->db->insert('student_rte_allot_history',$insert_array); 
                   
                    $insert_res = $this->db->insert_id();
                   if(!empty($insert_res))
                   {
                      $SQL = "select register_no,school_id,allot_status from student_rte_applied_schools where school_id = $school_id  and register_no=$register_no;";
                   $query = $this->db->query($SQL);
                   $result = $query->result_array();
                   return $result;
                   }
                    return false;                 
                 
                }
                  return false;
     }
     else
     {
      return false;
     }
    

}
public function rte_Dc_schoolList($district_id)
  {
 $SQL = "SELECT sch.school_id,sch.udise_code,sch.block_name,sch.block_id,sch.school_name FROM tnschools_working.schoolnew_academic_detail acad LEFT JOIN students_school_child_count sch ON sch.school_id = acad.school_key_id where sch.school_type_id=3 and acad.rte=1 and district_id=$district_id";
          $query = $this->db->query($SQL);
          $result = $query->result_array();
            $afftectedRows = $this->db->affected_rows();
        
                if($afftectedRows !=0)
                {
                  return $result;
                }
                  return false;
    

  }

}    