<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

/*
 * Changes:
 * 1. This project contains .htaccess file for windows machine.
 *    Please update as per your requirements.
 *    Samples (Win/Linux): http://stackoverflow.com/questions/28525870/removing-index-php-from-url-in-codeigniter-on-mandriva
 *
 * 2. Change 'encryption_key' in application\config\config.php
 *    Link for encryption_key: http://jeffreybarke.net/tools/codeigniter-encryption-key-generator/
 * 
 * 3. Change 'jwt_key' in application\config\jwt.php
 *
 */

class Auth extends REST_Controller
{
    /**
     * URL: http://localhost/CodeIgniter-JWT-Sample/auth/token
     * Method: GET
     */
    public function token_post()
    {
        
       //echo(isset($this->post('username')));die();
        $user_name = ($this->post('username') && $this->post('username') != '') ? $this->post('username') : null;
        $pwd = $this->post('password') && $this->post('password') != '' ? $this->post('password') : null;
        $api_client = ($this->post('client')) && $this->post('client') != '' ? $this->post('client') : null;

        if($user_name != null && $pwd != null && $api_client != '')
        {    
            $this->db->SELECT('EMISUSER_TEACHER.emis_user_id,EMISUSER_TEACHER.emis_username,EMISUSER_TEACHER.emis_usertype,USER_CATEGORY.user_type,UDISE_STAFFREG.udise_code,UDISE_STAFFREG.teacher_type,TEACHER_TYPE.type_teacher,UDISE_STAFFREG.teacher_name,UDISE_STAFFREG.teacher_type,UDISE_OFFREG.district_id');
            $this->db->FROM(emisuser_teacher.' as EMISUSER_TEACHER');
            $this->db->JOIN(udise_staffreg.' as UDISE_STAFFREG',"UDISE_STAFFREG.u_id = EMISUSER_TEACHER.emis_user_id",'LEFT');
            $this->db->JOIN(udise_offreg.' as UDISE_OFFREG','UDISE_STAFFREG.school_key_id = UDISE_OFFREG.off_key_id','LEFT');
            $this->db->JOIN(user_category.' as USER_CATEGORY','EMISUSER_TEACHER.emis_usertype = USER_CATEGORY.id','LEFT');
            $this->db->JOIN(teacher_type.' as TEACHER_TYPE','UDISE_STAFFREG.teacher_type = TEACHER_TYPE.id','LEFT');
            $this->db->WHERE('emisuser_teacher.emis_username',$user_name);
            $this->db->WHERE('emisuser_teacher.emis_password',md5($pwd));
            $this->db->WHERE('emisuser_teacher.STATUS','Active');
            $login_data = $this->db->GET()->row();

            if(!$login_data)
            {
                $this->db->SELECT('EMIS_USERLOGIN.emis_user_id,EMIS_USERLOGIN.emis_username,EMIS_USERLOGIN.emis_usertype,USER_CATEGORY.user_type,UDISE_OFFREG.district_id,SCHOOLNEW_BLOCK.district_id as district_id_from_block');
                 $this->db->FROM(emis_userlogin.' as EMIS_USERLOGIN');
                $this->db->JOIN(udise_offreg.' as UDISE_OFFREG','UDISE_OFFREG.office_user = EMIS_USERLOGIN.emis_username','LEFT');
                $this->db->JOIN(user_category.' as USER_CATEGORY','EMIS_USERLOGIN.emis_usertype = USER_CATEGORY.id','LEFT');
                $this->db->JOIN(schoolnew_block.' as SCHOOLNEW_BLOCK','EMIS_USERLOGIN.emis_user_id = SCHOOLNEW_BLOCK.id','LEFT');
//$this->db->JOIN(TEACHER_TYPE.' as TEACHER_TYPE','UDISE_STAFFREG.teacher_type = TEACHER_TYPE.id','LEFT');
                $this->db->WHERE('EMIS_USERLOGIN.emis_username',$user_name);
                $this->db->WHERE('EMIS_USERLOGIN.emis_password',md5($pwd));
                $this->db->WHERE('EMIS_USERLOGIN.STATUS','Active');
                $login_data = $this->db->GET()->row();
            }
           //print_r($this->db->last_query());
           //print_r($login_data);die();
            if(($login_data))
            {
                $iat = time();
                $one_month_time = (60 * 60 * 24 * 30);
                $exp = $iat + $one_month_time;
                $tokenData = array();
                $tokenData['emis_username'] = $login_data->emis_username; 
                $tokenData['iss'] = 'https://www.emis.com'; 
                $tokenData['iat'] = $iat; 
                $tokenData['exp'] = $exp; 
                $tokenData['sub'] = 'tn_school_app'; 
               // $tokenData['block_id'] = $login_data->block_id; 
               // $tokenData['school_id'] = $login_data->school_id; 
                $tokenData['district_id'] = isset($login_data->district_id) && $login_data->district_id != "" ? $login_data->district_id : $login_data->district_id_from_block; 
                $tokenData['emis_usertype'] = $login_data->emis_usertype ? $login_data->emis_usertype : 'NOT AVAILABLE'; 
                $tokenData['teacher_type'] = isset($login_data->teacher_type) ? $login_data->teacher_type : 'NOT AVAILABLE'; 
                $output['token'] = AUTHORIZATION::generateToken($tokenData);
                $output['userdata'] = array('username' => (isset($login_data->teacher_name) ? $login_data->teacher_name : 'NOT AVAILABLE'));
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else
            {      
                log_message('error','User not Found!');   
                $this->set_response(array('msg' => 'User not Found!'), REST_Controller::HTTP_NOT_FOUND);
            }
        }else{
			print_r('Client Id');
		}
    }


    public function checkapi_post()
    {
        print_r($this->post());
    }
}