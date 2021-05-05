<?php
/** Commited Date
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    
    /* *************************************************************
     * get user login details                                      *
     * params:email,password                                       *
     * created by VIT-sriram                                       *
     * *************************************************************/
    
    
    
    public function login($records)
    {
        
        date_default_timezone_set('Asia/Kolkata');
                  $this->db->select('emis_user_id,emis_usertype,emis_username,login_attempt,status,emis_password,temp_log,emis_usertype1');
		$result = $this->db->get_where('emis_userlogin',array('emis_username'=>$records['emis_username']))->first_row();
        if(!empty($result)) // Check User Name
        {   
                
            if($result->status=='Active') //User Name Active Or InActive
            {
                if($result->emis_password == md5($records['emis_password'])) //Password Check
                {

                    unset($result->emis_password);

                    // Update Login Timestamp
                    $update['emis_user_id'] = $result->emis_user_id;
                    $update['login_date'] = date('Y-m-d');
                    $update['logged_in'] = date('Y-m-d H-i-s');
                    $this->update_log_status($update);

                    // User Login Details Refer Auth Libraries
                    
                    $LoginDetails = $this->getLoginInformation($result->emis_usertype,$result->emis_user_id);
                    $login_information = $LoginDetails['LoginInformation'];

                    //Merge Login Information
                    $result = $this->auth->merge_array_data($result,$login_information);
                    // print_r($result);die;
                    $data['Status'] = true;
                    $data['message'] = '';
                    $data['result'] = $result;

                    // Final Data Return 
                    return $data; 
                }else // Password Mismatch
                {
                    
                    $data['message'] = 'Password Mismatch';
                    $data['Status'] = false;
                    return $data;
                }

            }else // Status Inactive
            {
                $data['message'] = 'Your Account is Inactive. Please Contact tnemiscel@gmail.com';
                $data['loginStatus'] = false;
                return $data;
            }

        }else // Check The Teacher Table
        {       
            $this->db->select('emisuser_teacher.emis_username,emisuser_teacher.emis_user_id,emisuser_teacher.emis_usertype,emisuser_teacher.emis_usertype1,emisuser_teacher.emis_password,emisuser_teacher.status,udise_staffreg.teacher_name,udise_offreg.district_id,udise_offreg.office_area,udise_offreg.tamil_name,udise_staffreg.teacher_type,teacher_type.type_teacher,teacher_subjects.subjects')
                    ->from('emisuser_teacher')
                    ->join('udise_staffreg','udise_staffreg.u_id = emisuser_teacher.emis_user_id','left')
                    ->join('teacher_subjects','teacher_subjects.id = udise_staffreg.appointed_subject','left')
                    ->join('teacher_type','teacher_type.id = udise_staffreg.teacher_type','left')
                    ->join('udise_offreg','udise_offreg.off_key_id = udise_staffreg.off_id','left')
                    ->where('emis_username',$records['emis_username']);
            $result = $this->db->get()->first_row();                  
            if(!empty($result)) // Teacher Information
            {   
                if($result->status=='Active') // Teacher Status
                {
                    // Password Check
                    if($result->emis_password == md5($records['emis_password'])) 
                    {

                        unset($result->emis_password);
                        // Update Login Timestamp
                        $update['emis_user_id'] = $result->emis_user_id;
                        $update['login_date'] = date('Y-m-d');
                        $update['logged_in'] = date('Y-m-d H-i-s');
                        $this->update_log_status($update);


                        $data['Status'] = true;
                        $data['message'] = '';
                        $data['result'] = $result;
                        //Final Result Return 

                        return $data;
                    }else // Password Mismatch
                    {
                        
                        $data['message'] = 'Password Mismatch';
                        $data['Status'] = false;
                        return $data;
                    }

                }else // Account Inactive
                {
                    $data['message'] = 'Your Account is Inactive. Please Contact tnemiscel@gmail.com';
                    $data['Status'] = false;
                    return $data;
                }

            }else // User Name Not Available
            {

                    $data['message'] = 'User Name Does Not Exist';
                    $data['Status'] = false;
                    return $data;
            }             
        }
        
    }

  /****************************************** End ******************************************/

  /** ******************************************************
    * Update Log Status After Login                        *
    * params $userData                                     *
    * VIT-sriram                                           *
    * 26/02/2019                                           *
    * ******************************************************/


    function update_log_status($userData)
    {

       $this->db->where('emis_user_id',$userData['emis_user_id']);
       return $this->db->update('emis_userlogin', $userData);
    }
    /**
    * User Category Name get 
    * params $id
    * VIT-sriram
    * 26/02/2019
    **/
    function get_category($id)
    {
        $result =  $this->db->get_where('user_category',array('id'=>$id))->first_row();
        return $result;
    }

    public function getLoginInformation($user_type,$user_id) 
    {
        $LoginDetails = $this->auth->get_login_details($user_type,$user_id);
        return $LoginDetails;
    }
    
     public function emis_state_resetpassword($emis_usertype,$oldpass,$user_id,$username,$data){
       

        if(!empty($oldpass))
        {
            $this->db->select('*');
            $this->db->from('emis_userlogin');
            $this->db->where('ref',$oldpass);
            $this->db->WHERE('emis_user_id',$user_id);
            $this->db->WHERE('emis_username',$username);
            $this->db->WHERE('emis_usertype',$emis_usertype);
            $result = $this->db->get()->result_array();
            if(count($result)!=0)
            {
             $this->db->set($data);
             $this->db->WHERE('emis_user_id', $user_id);
             $this->db->WHERE('emis_username', $username);
             $this->db->WHERE('emis_usertype',$emis_usertype);
             return $this->db->update('emis_userlogin');   
            }   
   
        }        
    }
}
?>