<?php

class AUTHORIZATION
{
    public static function validateTimestamp()
    {
        $CI =& get_instance();
        $headersData = getallheaders();
         print_r($headersData);die;

        if (!array_key_exists("Token",$headersData))
        {
          
            set_status_header(REST_CONTROLLER::HTTP_OK,"OK");
            $response['status']=false;
            $response['error']="Token required!";
           echo json_encode($response);
            exit;
        }
        else{
            $token = self::validateToken($headersData['Token']);
			//echo "else";
			
            if($token != false && (now() - $token->exp < ($CI->config->item('token_timeout') * 60))){
                
               set_status_header(200,"OK");
               return $token;
           }
          else if($token == false){
              
               set_status_header(REST_CONTROLLER::HTTP_UNAUTHORIZED,"Unauthorized");
               $response['status']=false;
               $response['error']="Invalid token!";
               echo json_encode($response);
               exit;
           }
           // if ($token != false && (now() - $token->iat < ($CI->config->item('token_timeout') * 60))) {
           
           //     return $token;
           // }
           else{
            //set_status_header(REST_CONTROLLER::HTTP_UNAUTHORIZED,"Unauthorized");
               //$tokenData['status'] = false;
			   
               //exit;
   
           }
        }
    }

    public static function validateToken($token)
    {
        $CI =& get_instance();
        return JWT::decode($token, $CI->config->item('jwt_key'));
    }

    public static function generateToken($data)
    {
        $CI =& get_instance();
        return JWT::encode($data, $CI->config->item('jwt_key'));
    }

    //check authorization user or not

    public static function checkAuthorizationUser($routingName){
        $CI =& get_instance();
        $headersData = getallheaders();
        // echo $routingName;die;
        if (!array_key_exists("Authorization",$headersData) OR $headersData['Authorization']!=$CI->config->item('authorization_key'))
        {
            set_status_header(REST_CONTROLLER::HTTP_UNAUTHORIZED,"Unauthorized");
            $response['status']=false;
             $response['error']="Access denied!";
             echo json_encode($response);
             exit;  
        }
        /**Commented for non-use of Token by wesley**/
        // else if($routingName!='login'){
        //     $validateToken = self::validateTimestamp();
        //     return $validateToken;
        // }
        /**Commented for non-use of Token by wesley**/
          else{
            return true;
          }
    }

}