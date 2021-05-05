<?php
    class LibPrimeDetails{
        function setPrimeDetails($primedetail){
            $ts =explode(".",getallheaders()['Token']);
    		$token=json_decode(base64_decode($ts[1]),true);
    		$emis_loggedin =$token['status'];
            $rtvalue="";
            if($emis_loggedin){
                switch($primedetail){
                    case 'udise':{
                        if(isset($_GET['udise'])){
                            $rtvalue=$_GET['udise'];
                        }else{
                            $rtvalue=$token['udise_code'];
                        }
                        break;
                    }
                    case 'acyear':{
                        if(isset($_GET['acyear'])){
                            $rtvalue=$_GET['acyear'];
                        }else{
                            $rtvalue=date("m",strtotime("now"))>5?(date("Y").'-'.date("y")+1):((date("Y")-1).'-'.date("y"));
                        }
                        break;
                    }
                }
                return $rtvalue;
            }
        }
        function allWhereCondtion($tname="",$emis_user_id="",$emis_user_type_id=""){
            $where='';
            switch($emis_user_type_id){
                case 1:{
                    $where=' AND '.$tname.'school_id='.$emis_user_id;
                    break;
                }
                case 2:
                case 6:{
                    $where=' AND '.$tname.'block_id='.$emis_user_id;
                    break;
                }
                case 3:
                case 9:{
                    $where=' AND '.$tname.'district_id='.$emis_user_id;
                    break;
                }
                case 4:
                case 10:{
                    $where=' AND '.$tname.'edu_dist_id='.$emis_user_id;
                    break;
                }
                case 5:{
                    $where='';
                    break;
                }
            }        
            return $where;
            
        }

    
        function allGroupAndNext($tname="",$emis_user_type_id=""){
            $groupandnext=array();
            $grp=0;
            if(isset($_GET['grp'])){
                $grp=$_GET['grp'];
            }
            
            if(!isset($_GET['q'])){
                $_GET['q']=0;
            }
            
            if(isset($_GET['q'])){
                switch($emis_user_type_id){
                    case 5:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'district_id';
                                $groupandnext['groupname']='district_name';
                                $groupandnext['next']='EDU';
                                $groupandnext['reportid']='emis_district_id';
                                $groupandnext['ctrl']='State';
                                break;
                            }
                            case 'EDU':{
                                $groupandnext['group']=$tname.'edu_dist_id';
                                $groupandnext['groupname']='edu_dist_name';
                                $groupandnext['next']='BLK';
                                $groupandnext['where']=' AND '.$tname.'district_id='.$_GET['q'];
                                break;
                            }
                            case 'BLK':{
                                $groupandnext['group']=$tname.'block_id';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$_GET['q'];
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'school_id';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                                break;
                            }
                        }
                        break;
                    }
                    case 2:
                    case 6:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'school_id';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['reportid']='emis_block_id';
                                break;
                            }
                        }
                        break;
                    }
                    case 3:
                    case 9:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'edu_dist_id';
                                $groupandnext['groupname']='edu_dist_name';
                                $groupandnext['next']='BLK';
                                $groupandnext['reportid']='emis_district_id';
                                $groupandnext['ctrl']='Ceo_District';
                                
                                break;
                            }
                            case 'BLK':{
                                $groupandnext['group']=$tname.'block_id';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['where']=' AND '.$tname.'edu_dist_id='.$_GET['q'];
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'school_id';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                                break;
                            }
                        }
                        break;
                    }
                    case 4:
                    case 10:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'block_id';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['reportid']='emis_deo_id';
                                $groupandnext['ctrl']='Deo_District';
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'school_id';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_id='.$_GET['q'];
                                break;
                            }
                            
                        }
                        break;
                    }
                }
            }
            //print_r($groupandnext);die();
            return $groupandnext;
        }
        function mhrdallWhereCondtion($tname="",$emis_user_id="",$emis_user_type_id=""){
            $where='';
            switch($emis_user_type_id){
                case 1:{
                    $where=' AND '.$tname.'old_udise_sch_code='.$emis_user_id;
                    break;
                }
                case 2:
                case 6:{
                    $where=' AND '.$tname.'block_cd='.$emis_user_id;
                    break;
                }
                case 3:
                case 9:{
                    $where=' AND '.$tname.'district_cd='.$emis_user_id;
                    break;
                }
                case 4:
                case 10:{
                    $where=' AND '.$tname.'edu_block_cd='.$emis_user_id;
                    break;
                }
                case 5:{
                    $where='';
                    break;
                }
            }        
            return $where;
            
        }

    
        function mhrdallGroupAndNext($tname="",$emis_user_type_id=""){
            $groupandnext=array();
            $grp=0;
            if(isset($_GET['grp'])){
                $grp=$_GET['grp'];
            }
            
            if(!isset($_GET['q'])){
                $_GET['q']=0;
            }
            
            if(isset($_GET['q'])){
                switch($emis_user_type_id){
                    case 5:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'district_cd';
                                $groupandnext['groupname']='district_name';
                                $groupandnext['next']='EDU';
                                $groupandnext['reportid']='emis_district_id';
                                $groupandnext['ctrl']='State';
                                break;
                            }
                            case 'EDU':{
                                $groupandnext['group']=$tname.'edu_block_cd';
                                $groupandnext['groupname']='edu_dist_name';
                                $groupandnext['next']='BLK';
                                $groupandnext['where']=' AND '.$tname.'district_cd='.$_GET['q'];
                                break;
                            }
                            case 'BLK':{
                                $groupandnext['group']=$tname.'block_cd';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['where']=' AND '.$tname.'edu_block_cd='.$_GET['q'];
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'old_udise_sch_code';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_cd='.$_GET['q'];
                                break;
                            }
                        }
                        break;
                    }
                    case 2:
                    case 6:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'old_udise_sch_code';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['reportid']='emis_block_id';
                                break;
                            }
                        }
                        break;
                    }
                    case 3:
                    case 9:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'edu_block_cd';
                                $groupandnext['groupname']='edu_dist_name';
                                $groupandnext['next']='BLK';
                                $groupandnext['reportid']='emis_district_id';
                                $groupandnext['ctrl']='Ceo_District';
                                
                                break;
                            }
                            case 'BLK':{
                                $groupandnext['group']=$tname.'block_cd';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['where']=' AND '.$tname.'edu_block_cd='.$_GET['q'];
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'old_udise_sch_code';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_cd='.$_GET['q'];
                                break;
                            }
                        }
                        break;
                    }
                    case 4:
                    case 10:{
                        switch($grp){
                            case '0':{
                                $groupandnext['group']=$tname.'block_cd';
                                $groupandnext['groupname']='block_name';
                                $groupandnext['next']='SCH';
                                $groupandnext['reportid']='emis_deo_id';
                                $groupandnext['ctrl']='Deo_District';
                                break;
                            }
                            case 'SCH':{
                                $groupandnext['group']=$tname.'old_udise_sch_code';
                                $groupandnext['groupname']='school_name';
                                $groupandnext['next']='';
                                $groupandnext['where']=' AND '.$tname.'block_cd='.$_GET['q'];
                                break;
                            }
                            
                        }
                        break;
                    }
                }
            }
            //print_r($groupandnext);die();
            return $groupandnext;
        }
    }
?>