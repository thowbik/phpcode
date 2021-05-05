<?php


class Common
{
	
	/**
	* Geting AWS_S3 Link Generate
	* VIT-sriram
	* 13/03/2019
	**/
	public static function get_url($bukect_name,$keyname,$time,$bukect_key='',$bukect_secret='')
	{
			// echo $bukect_name;
			$CI = & get_instance();
			$CI->load->library('AWS_S3');
			
			return $CI->aws_s3->get_AWS_S3_Images($bukect_name,$keyname,$time,$bukect_key,$bukect_secret);

	}

	/**
	* Check Header Details
	* VIT-sriram
	* 04/04/2019
	***/

	public static function get_high_class($school_id)
	{
			$CI = & get_instance();
			$CI->load->database();
			$CI->db->select('cate_type,high_class');
			$result = $CI->db->get_where('students_school_child_count',array('school_id'=>$school_id))->first_row();

		return $result;
	}

	public static function get_list_count($table,$count_var,$where)
	{
		// echo "function in";die;
			$CI = & get_instance();
			$CI->load->database();

		$CI->db->select('count('.$count_var.') as count')
			   ->from($table)
			   ->where($where);
		$result = $CI->db->get()->first_row();
		// print_r($result);die;
		return $result;
	}

	public static function get_multi_list($table,$where)
	{
			$CI = & get_instance();
			$CI->load->database();

		$CI->db->from($table);
		if(!empty($where))
		{
			$CI->db->where($where);
		}

		$result = $CI->db->get()->result();
		// print_r($CI->db->last_query());die;
		return $result;
	}

	public static function get_single_list($table,$where)
	{
			$CI = & get_instance();
			$CI->load->database();
			// $CI->db->where($where);
		$result = $CI->db->get_where($table,$where)->first_row();
		// print_r($CI->db->last_query());
		return $result;

	}


	/****************************
	* Session Search Filter 	*
	* VIT-sriram 				*
	* 24/04/2019  				*
	*****************************/
	public static function session_search_filter($manage,$school_cate,$current_status=0)
	{
			$CI = & get_instance();
			$CI->load->library('session');
		//print_r($school_cate);

		if($current_status==1)
		{
			$CI->session->unset_userdata('manage');
			$CI->session->unset_userdata('school_cate');

		}

		$session_manage = $CI->session->userdata('manage');
      	$session_cate = $CI->session->userdata('school_cate');
      	// print_r($session_manage);
      	$manage_data = '';
      	$school_cate_data = '';
	      if(!empty($manage))
	      {
	      	$manage_data = $manage;
	      	$school_cate_data = $school_cate;
	      	$CI->session->unset_userdata('manage');
	      	$CI->session->unset_userdata('school_cate');
	      	$CI->session->set_userdata('manage',$manage);
	      	$CI->session->set_userdata('school_cate',$school_cate);
	      }else if(!empty($school_cate))
	      {
	      	$school_cate_data = $school_cate;
	      	$CI->session->unset_userdata('school_cate');
	      	$CI->session->set_userdata('school_cate',$school_cate);
	      }else
	      {
	      	$manage_data = $session_manage;
	      	$school_cate_data = $session_cate;
	      }
	      $data['manage'] = $manage_data;
	      $data['school_cate'] = $school_cate_data;
	      // print_r($data);
	      return $data;
	}

	 /*******************************
	   * QR Code Generate 		  	* 
	   * VIT-sriram 				*
	   * 10/05/2019  				*
	   ******************************/
	 public static function print_qr($user_id)
    {
    	$CI = & get_instance();
    	$CI->load->library('ci_qr_code');
        $CI->config->load('qr_code');

        $qr_code_config = array();
        $output_file = APPPATH.'docs/qr.jpg';
        $qr_code_config['cacheable'] = $CI->config->item('cacheable');
        $qr_code_config['cachedir'] = $output_file;
        $qr_code_config['imagedir'] = $CI->config->item('imagedir');
        $qr_code_config['errorlog'] = $CI->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $CI->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $CI->config->item('quality');
        $qr_code_config['size'] = $CI->config->item('size');
        $qr_code_config['black'] = $CI->config->item('black');
        $qr_code_config['white'] = $CI->config->item('white');
        $CI->ci_qr_code->initialize($qr_code_config);
        // get full name and user details
        $user_details = 'Hello QR Code';
        $image_name = $user_id . ".jpg";
        // create user content
        $codeContents = $user_id;
        
        $params['data'] = $codeContents;
        $params['level'] = 'H';
        $params['size'] = 2;
        $params['savename'] = $output_file.$qr_code_config['imagedir'];
        $CI->ci_qr_code->generate($params);
        $CI->data['qr_code_image_url'] = $output_file;
        // save image path in tree table
        // $CI->user->change_userqr($user_id, $image_name);
        // then redirect to see image link
        $file = $params['savename'];
        
    }


    /**
      * Class Section Order 
      * VIT-sriram
      * 29/07/2019
      *********/

    public static function get_classwise_order()
    {

    	return  array('4'=>'1','5'=>'2','6'=>'3','7'=>'4','8'=>'5','9'=>'6','10'=>'7','11'=>'8','12'=>'9','13'=>'10','14'=>'11','15'=>'12','3'=>'13','2'=>'14','1'=>'15');
    	
    }
	
	
	
	
	/**
	  * Dynaminic Header Load
	  * VIT-raj
	  * 31/07/2019
	  **/
	  
	  public static function emis_dynamic_header($type,$usertype)
	  {
		  
		  // $uheader = $this->Homemodel->user_header($type,$usertype);
		  $CI = & get_instance();
		  $CI->load->database();
		  
		     $CI->db->select('type_id, p_id, child_lvl_1, child_lvl_2, description,link, school_user, block_user, district_user, edu_district_user, state_user, BEO_user, CRC_user, HM_user, CEO_user, DEO_user, DIRJD_user, JD_user, TEACHER_user, CORPORATION_user, status');
		   $CI->db->from('dashboard_set');
		   $CI->db->where('type_id',$type);
		   $CI->db->where('status ',1);
		   $CI->db->where('school_user',$usertype);
		   
		   $query = $CI->db->get();
           $uheader = $query->result();
		   
		     // print_r($this->db->last_query());
			 // foreach($result as $index=>$res)
			 // {
				 // $flist[$index]['p_id'] = $res->p_id;
				  
			 // }
			
		   
		  // print_r($uheader);
		 // die();
		  
		    $header_menu = array();
		    $level2_menu = array();
		    $level3_menu = array();
			
			  // echo"<pre>";print_r(count($uheader));echo"<pre>";die();
             foreach($uheader as $header_menu_key =>$header_menu_value)
			 {
				if($header_menu_value->child_lvl_1 != 0 && $header_menu_value->child_lvl_2 !=0 )
			    {
					$level3_menu[$header_menu_value->p_id][$header_menu_value->child_lvl_1][] = $header_menu_value;
				}
				if($header_menu_value->child_lvl_1 != 0 && $header_menu_value->child_lvl_2 ==0)
			    {
					$level2_menu[$header_menu_value->p_id][] = $header_menu_value;
					//$level2_menu[$header_menu_value->p_id]['level3'] = $header_menu_value;
				}
				if($header_menu_value->child_lvl_1 == 0 && $header_menu_value->child_lvl_2 ==0) 
			    {
					$header_menu[$header_menu_value->p_id] = $header_menu_value;
					//$header_menu[header_menu_value->p_id]['level2'] = $level2_menu;
				}
					
			 }
			 
			 foreach($level2_menu as $level2_key => $level2_value)
			 {
				 //echo ($level2_value->p_id);
				 //echo ($level2_value->child_lvl_1);
				 //echo"<pre>";print_r($level2_value);echo"<pre>";
				 foreach($level2_value as $key => $value)
				 {
					 // echo $level2_key.'-'.$value->child_lvl_1;
					$level2_menu[$level2_key][$key]->level3 = isset($level3_menu[$level2_key][$value->child_lvl_1]) ? $level3_menu[$level2_key][$value->child_lvl_1] : array();
				 }
				  
			 }
			 foreach($header_menu as $h_key => $h_value)
			 {
				 $header_menu[$h_key]->level2 = $level2_menu[$h_value->p_id]; 
			 }
			 
			 return $header_menu;
	  }

   /* *******************************
	* Session Toilet Search Filter 	*
	* VIT-sriram 					*
	* 16/08/2019  					*
	* *******************************/
	public static function session_search_tot_filter($manage,$school_cate,$sch_tot,$sch_comp,$sch_ratio,$current_status=0)
	{
			$CI = & get_instance();
			$CI->load->library('session');
		// print_r($sch_tot);

		if($current_status==1)
		{
	      	Common::session_create('manage','',0);
			Common::session_create('school_cate','',0);
			Common::session_create('school_toilet','',0);
			Common::session_create('school_comp','',0);
			Common::session_create('school_ratio','',0);
			
		}

		$session_manage = Common::session_create('manage','',2);
      	$session_cate   = Common::session_create('school_cate','',2);
      	$session_toilet = Common::session_create('school_toilet','',2);
      	$session_comp   = Common::session_create('school_comp','',2);
      	$session_ratio  = Common::session_create('school_ratio','',2);
      	
      	
      	$manage_data 	  = '';
      	$school_cate_data = '';
      	$school_toilet    = '';
      	$school_ratio     = '';
      	$school_comp 	  = '';

      	$school_toilet = $sch_tot;
		
	     
	    $school_comp = $sch_comp;
	    	
	     
	    $school_ratio = $sch_ratio;
	    
	      if(!empty($manage))
	      {
	      	$manage_data = $manage;
	      	$school_cate_data = $school_cate;
	      	
	      	Common::session_create('manage','',0);
	      	Common::session_create('school_cate','',0);
	      	Common::session_create('manage',$manage,1);
	      	Common::session_create('school_cate',$school_cate,1);
	      	Common::session_create('school_toilet','',0);
			Common::session_create('school_toilet',$sch_tot,1);
	      	Common::session_create('school_comp','',0);
			Common::session_create('school_comp',$sch_comp,1);
			Common::session_create('school_ratio','',0);
			Common::session_create('school_ratio',$sch_ratio,1);
	      }else if(!empty($school_cate))
	      {
	      	$school_cate_data = $school_cate;
	      	Common::session_create('school_cate','',0);
			Common::session_create('school_cate',$school_cate,1);
	      	
	      }
	      else
	      {
	      	$manage_data 	  = $session_manage;
	      	$school_cate_data = $session_cate;
	      	$school_toilet    = $session_toilet;
	      	$school_comp 	  = $session_comp;
	      	$school_ratio 	  = $session_ratio;
	      }
	      // echo $sch_tot;
	      	
	      $data['manage'] = $manage_data;
	      $data['school_cate'] = $school_cate_data;
	      $data['school_toilet'] = $school_toilet;
	      $data['school_comp'] = $school_comp;
	      $data['school_ratio'] = $school_ratio;

	      // print_r($CI->session->userdata());
	      return $data;
	}


	/** **
	  * Session Set And Unset 
	  * VIT-sriram
	  * 16/08/2019
	  * Set - 1 Unset - 0 get - 2
	  ***********/

	public static function session_create($ses_name,$ses_value,$ses_flag=1)
	{
			$CI = & get_instance();
			$CI->load->library('session');
			
			if($ses_flag==1)
			{
				$CI->session->set_userdata($ses_name,$ses_value);
			}else if($ses_flag==2)
			{
				return $CI->session->userdata($ses_name);
			}
			else
			{
				$CI->session->unset_userdata($ses_name);
			}

	}


	public static function spiecal_char_search($charter)
	{
			if($charter !='')
			{
				$chart_arr = array('>'=>1,'='=>2,'<'=>3);

				return array_search($charter, $chart_arr);
			}
	}


	public static function callAPI($method, $url, $data,$flag=0)
	{
	   $curl = curl_init();

	   switch ($method){
	      case "POST":
	         curl_setopt($curl, CURLOPT_POST, 1);
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	         break;
	      case "PUT":
	         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
	         break;

	      default:
	         if ($data)
	            $url = sprintf("%s?%s", $url, http_build_query($data));
	   }

	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	      'Authorization: EMIS@2019_api',
	      'Content-Type: application/json',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	   // EXECUTE:
	   $result = curl_exec($curl);
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   if($flag==1)
	   {
	   		$result = Common::api_data_deocde($result);
	   }
	   return $result;
	}

	public static function validateToken($token)
    {
        $CI =& get_instance();
        return JWT::decode($token, 'ingDLMRuGe9UKHRNjs7cYckS2yul4lc3');
    }


    public static function api_data_deocde($data)
    {

    	$response = json_decode($data, true);
		$errors = $response['response']['errors'];
		$data = $response;
		
		return $data;
    }


    public static function dateFormat($date)
    {
    		return ($date !=''?date('Y-m-d',strtotime($date)):'');
    }



}
