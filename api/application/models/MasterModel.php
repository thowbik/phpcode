<?php
class MasterModel extends CI_Model
{
    function __construct() {
      parent::__construct();
    }
    function getMasterData($tableName,$where,$update){
       
        if($update=="get"){
            $SQL="SELECT * FROM ".$tableName." WHERE".$where;
        }else{
            return $this->db->delete($tableName, array('id' => $where));  
        }
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getMasterDistData(){
         
          $SQL="SELECT id as IndxID,district_code as DistID,district_name as DistNam,email as Email FROM schoolnew_district";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function getMasterAcadDet(){

        $SQL="SELECT id as IndxID,academic_teacher as AcadmicTeachr,visibility as Visiblty FROM teacher_academic_qualify";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array(); 
    }
    function addMasterData($tableName,$dt,$update){
        $SQL="DESCRIBE ".$tableName.";";
        $query = $this->db->query($SQL);
        $cols=$query->result_array();
        //print_r($dt);die();    
        foreach($cols as $c){
            foreach($dt as $idx => $data){
                if(strtolower($idx)==strtolower(implode("",explode("_",$c['Field'])))){
                    //echo(strtolower($idx)."==".strtolower(implode("",explode("_",$c['Field']))));die();
                    $pstarr[$c['Field']]=$data;
                    break;
                }else{
                    $pstarr[$c['Field']]=NULL;
                }
            }
        }
        //print_r($pstarr);die();
        if($update=="add"){
            return $this->db->insert($tableName,$pstarr);
        }else{
            return $this->db->update($tableName,$pstarr,array("id"=>$pstarr['id']));
        }
    }



    function getDes($t){
        $SQL="DESCRIBE ".$t.";";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
}
?>