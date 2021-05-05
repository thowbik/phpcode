<?php
require_once APPPATH . '/config/JWToken.php';
class AUTHORIZATION
{
    public static function validateTimestamp()
    {
        $CI =& get_instance();
        $headersData = getallheaders();
        // print_r($headersData);die;

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
        //unset($data->rsa_school_id);
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
        else if($routingName!='login' && $routingName!='StuExamAbsRes' && $routingName!='StuExamAbsChk' && $routingName!='StuExamAbsChkTenth' && $routingName!='StuExamAbsResTenth' && $routingName!='EMISStuIDValidatn' && $routingName!='schlReg' && $routingName!='schlRegLogin'){
            // $validateToken = self::validateTimestamp();
            // return $validateToken; 
              if($CI->uri->segments[1] == 'e-learn' || $CI->uri->segments[1] == 'auth'){return true;}
              else{ $validateToken = self::validateTimestamp();
                    return $validateToken; 
              }
        }
        else{
            return true;
        }
    }

    public static function rsaToken($tokenData){
        //$privateKey = file_get_contents(realpath('./application/helpers/diksha.pem'));
        $privateKey = file_get_contents(realpath('./application/helpers/privateprod.pem'));
        //$privateKey = file_get_contents(realpath('./application/helpers/publicprod.pem'));
        //echo $privateKey;die();
        //print_r($_SERVER['HTTP_HOST']);die();
        if($_SERVER['HTTP_HOST'] == 'localhost'){
            $aud = "https://preprod.ntp.net.in";
            $redirect_uri = "https://preprod.ntp.net.in/resources";
        }else if($_SERVER['HTTP_HOST'] == '13.232.216.80'){
            $aud = "https://preprod.ntp.net.in";
            $redirect_uri = "https://preprod.ntp.net.in/resources";
        }else if($_SERVER['HTTP_HOST'] == 'emis1.tnschools.gov.in'){
            $aud = "https://diksha.gov.in";
            $redirect_uri = "https://diksha.gov.in/resources";
        }
        $time=time();
        $exp = time() + 600;
        $payload = [
        // "jti" => "10000169", 
        // "iss" => "tn", 
        // "sub" => "10000169", 
        // "aud" => "https://preprod.ntp.net.in", 
        // "iat" => $time,
        // "nbf" => $time,
        // "exp" => $exp,
        // "name" => "CHAMUNDESWARI C.T",
        // "state_id" => "tn",
        // "school_id" => "33260612798",
        // "redirect_uri" => "https://preprod.ntp.net.in/resources",
        "jti" => $tokenData->teacher_id,
        "iss" => "tn", 
        "sub" => $tokenData->teacher_id,      
        "aud" => $aud,
        "iat" => $time,
        "nbf" => $time,
        "exp" => $exp,
        "name" => $tokenData->teacher_name,
        "state_id" => "tn",
        "school_id" => $tokenData->rsa_school_id,
        "redirect_uri" => $redirect_uri,
        ];
        return $token = JWToken::encode($payload, $privateKey, 'RS256');
    }

}