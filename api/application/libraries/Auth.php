<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Rest Controller
 * A fully RESTful server implementation for CodeIgniter using one library, one config file and one controller.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @version         3.0.0
 */

/****************************** End ************************************/


/** Commited Date
 * 
 */




class Auth 
{
    


    public function get_CI_instance()
    {
        $CI =& get_instance();
        $CI->load->database();
        return $CI;
    }


    public function get_login_details($user_type,$user_id)
    {
        $this->get_CI_instance();
        $select ='';
        $table  ='';
        $where  = '';
    	switch ($user_type) {
    		case 1: //SChool
    			$select = 'school_id,udise_code,school_name,district_id,block_id,edu_dist_id,edu_dist_name,district_name,school_type,school_type_id,management,cate_type,section_nos,low_class,high_class,total,totstaff';
                $table  = 'students_school_child_count';
                $where  = array('school_id'=>$user_id);
    		break;
    		case 2: //Block
    			$select = 'block_name,block_type,edu_dist_id,district_id';
                $table  = 'schoolnew_block';
                $where  = array('id'=>$user_id);
    		break;
    		case 3: //District
                $select = 'district_name,email';
                $table  = 'schoolnew_district';
                $where  = array('id'=>$user_id);
    			
    		break;
    		case 4: //Edu District
    			$select = 'edn_dist_name,district_id';
                $table  = 'schoolnew_edn_dist_mas';
                $where  = array('id'=>$user_id);
                
    		break;
    		case 5: //State
    			
    		break;
    		case 6: //BEO
    			$select = 'block_name,block_type,edu_dist_id,district_id';
                $table  = 'schoolnew_block';
                $where  = array('id'=>$user_id);
            break;
    		case 7: //CRC
    			
    		break;
    		case 8: //HM
    			
    		break;
    		case 8: //HM
    			
    		break;
    		case 9: //CEO
                $select = 'district_name,email';
                $table  = 'schoolnew_district';
                $where  = array('id'=>$user_id);
    			
    		break;
    		case 10: //DEO
    			$select = 'edn_dist_name,district_id';
                $table  = 'schoolnew_edn_dist_mas';
                $where  = array('id'=>$user_id);
                
    		break;
    		case 11: //HM
    			
    		break;
    		case 12: //DIR/JD
    			
    		break;
    		case 13: //JD
    			
    		break;
    		case 14: //Teacher
    			
    		break;
    		case 15: //Corporation
    			
    		break;
    		case 16: //Collector
    			
    		break;
    		case 17: //Students
    			
    		break;
    		
    	}
        $LoginInformation = '';
        if($select !='')
        {
            $LoginInformation = $this->get_ceo_information($select,$table,$where);
        }
        $LoginUser = $this->get_user_category($user_type);
        $data['LoginInformation'] = $this->merge_array_data($LoginInformation,$LoginUser);
        return $data;

    }


    /** *********************************************************
      * Get Login Information                                   *
      * VIT-sriram                                              *
      * 11/09/2019                                              *
      *                                                         *
      * *********************************************************/


    public function get_ceo_information($select,$table,$where)
    {
        $CI = $this->get_CI_instance();
        $CI->db->select($select)
                 ->from($table)
                 ->where($where);
        $result = $CI->db->get()->first_row();

        return $result;
    }


    public function get_user_category($type_id)
    {
        $CI = $this->get_CI_instance();
        $CI->db->select('user_type')
               ->from('user_category')
               ->where('id',$type_id);
        $result = $CI->db->get()->first_row();
        return $result;
    }



    /** *****************************************************
      * Multi Array of Object Merge - function use          *
      * VIT-sriram - Createdby                              *
      * 12/09/2019 - CreateDate                             *
      * @parmas Const Array Object List                     *
      * *****************************************************/


    public function merge_array_data($result,$login_information)
    {
        
        return (object) array_merge((array) $result, (array) $login_information);
        
    }
}
?>