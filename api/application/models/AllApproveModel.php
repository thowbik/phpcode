<?php
class AllApproveModel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function AllApproveExcute($where,$group,$module,$sublist,$usertype){
        
        if($module==4 || $module==5){
            $tb1="newschool_details";
            $tb2="newschool_details";
        }
        else{
            $tb1="schoolnew_basicinfo";
            $tb2="schoolnew_academic_detail";
        }
        
        
        $SQL="SELECT * FROM (SELECT 
	T1.*, 
    schoolnew_renewapprove.timestamp as ts, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.auth ELSE NULL END) as approvedby, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.filename ELSE NULL END) as approvefile, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.filepath ELSE NULL END) as approvefilepath, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.remarks ELSE NULL END) as approveremarks, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.id ELSE NULL END) as approveid, 
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN schoolnew_renewapprove.fileno ELSE NULL END) as filenumber,
    (CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN
	   CASE WHEN schoolnew_renewapprove.auth > 0 THEN
		  CASE WHEN schoolnew_renewapprove.auth=T1.final_cat_id THEN 
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from='0000-00-00'))>0,
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                    timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,'IN RESET QUEUE','SEND TO RESET QUEUE'),
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,'IN RESET QUEUE','APPROVED'))
        ELSE 
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NOT NULL AND vaild_from!='0000-00-00'))>0,'APPROVED', 
        CONCAT('WAITING FOR ',
        (CONVERT((SELECT user_type FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci')
        ,' APPROVAL'))
        END
	ELSE CASE WHEN schoolnew_renewapprove.auth < 0 THEN
			CASE WHEN schoolnew_renewapprove.auth=-1 THEN  
				IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from!='00-00-0000'))>0,
                    IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                            timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                        )>0,'IN RESET QUEUE','SEND TO RESET QUEUE'),
                    IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                            timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                    )>0,'IN RESET QUEUE','REJECTED')
                )            
            ELSE
            IF(T1.auth=0 AND schoolnew_renewapprove.auth!=-1,'CONTACT ADMIN', 
			CONCAT((SELECT user_type FROM user_category WHERE id=-(schoolnew_renewapprove.auth)),' SENT TO ',
            (CONVERT((SELECT user_type FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            subauth.auth=IF(schoolnew_renewapprove.auth<0,1,2) AND
            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci'))) END
		 END
	END
    ELSE CASE WHEN schoolnew_renewapprove.renewal_id IS NULL THEN CONCAT('WAITING FOR ',
        (CONVERT((SELECT user_type FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            auth=1 AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci')
        ,' APPROVAL') ELSE NULL END
END
) AS appprocess,
(CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN
	CASE WHEN schoolnew_renewapprove.auth > 0 THEN
		CASE WHEN schoolnew_renewapprove.auth=T1.final_cat_id THEN 
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from='00-00-0000'))>0,
            IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,96,97),IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,96,98))
        ELSE  
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NOT NULL AND vaild_from!='0000-00-00'))>0,98, 
        CONCAT(
        (CONVERT((SELECT id FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci')))
        END
	ELSE CASE WHEN schoolnew_renewapprove.auth < 0 THEN
			CASE WHEN schoolnew_renewapprove.auth=-1 THEN  
				IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from!='00-00-0000'))>0,
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,96,97),IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,96,99))            
            ELSE 
			CONCAT(
            (CONVERT((SELECT id FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            subauth.auth=IF(schoolnew_renewapprove.auth<0,1,2) AND
            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci')) END
		 END
	END
    ELSE CASE WHEN schoolnew_renewapprove.renewal_id IS NULL THEN CONCAT(
        (CONVERT((SELECT id FROM user_category WHERE id=(SELECT auth_cat_id FROM 
				(SELECT auth_cat_id,school_type,module_id,1 as auth FROM schoolnew_moduleauth
					UNION ALL
				SELECT final_cat_id,school_type,module_id,2 as auth FROM schoolnew_moduleauth) as subauth 
            WHERE 
            auth=1 AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
			)) USING 'utf8mb4') COLLATE 'utf8mb4_general_ci')) ELSE NULL END
END
) AS appauth,
(CASE schoolnew_renewapprove.renewal_id WHEN T1.id THEN
	CASE WHEN schoolnew_renewapprove.auth > 0 THEN
		CASE WHEN schoolnew_renewapprove.auth=T1.final_cat_id THEN 
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from='00-00-0000'))>0,
            IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,'warning','danger'),IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,'warning','success'))
        ELSE 'primary' END
	ELSE CASE WHEN schoolnew_renewapprove.auth < 0 THEN
			CASE WHEN schoolnew_renewapprove.auth=-1 THEN  
				IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from!='00-00-0000'))>0,
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,'warning','danger'),IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,'warning','default'))            
            ELSE 'primary' END
		 END
	END
    ELSE CASE WHEN schoolnew_renewapprove.renewal_id IS NULL THEN 'default' ELSE NULL END
END
) AS appcolor,
    (CASE WHEN (SELECT reason_reset FROM schoolnew_renewalreset WHERE timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id)) IS NULL THEN NULL 
    ELSE (SELECT reason_reset FROM schoolnew_renewalreset WHERE timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id)) END) AS reset_reason
    FROM (
		SELECT 
			schoolnew_renewal.id, 
            schoolnew_renewal.auth, 
            schoolnew_renewal.createddate, 
            schoolnew_renewal.school_key_id, 
            schoolnew_renewal.year_rec_remarks, 
            schoolnew_renewal.vaild_from, 
            schoolnew_renewal.vaild_upto, 
            schoolnew_renewal.renewal_id, 
            schoolnew_renewal.contidion_file, 
            (CASE schoolnew_renewcategory.applied_category WHEN 1 THEN 'RENEWAL' ELSE 
				CASE schoolnew_renewcategory.applied_category WHEN 2 THEN 'TAMIL MEDIUM' ELSE 
					CASE schoolnew_renewcategory.applied_category WHEN 3 THEN 'ADDITIONAL CLASSES OR UPGRADATION' ELSE
						CASE schoolnew_renewcategory.applied_category WHEN 4 THEN 'NEW SCHOOLS' ELSE
                            CASE schoolnew_renewcategory.applied_category WHEN 5 THEN 'OPENING PERMISSION' ELSE NULL END 
                        END
                    END END END) AS appliedfor, 
                    schoolnew_renewcategory.applied_category,
                    schoolnew_renewcategory.amount, 
                    schoolnew_renewcategory.challan_no, 
                    schoolnew_renewcategory.challan_date, 
                    schoolnew_renewcategory.ifsc_code, 
                    schoolnew_renewcategory.challan_filename, 
                    schoolnew_renewcategory.challan_filepath, 
                    schoolnew_renewal.file_exp, 
                    schoolnew_renewalfiles.id as fileid, 
                    schoolnew_renewal.lastrenewal_filename, 
                    schoolnew_renewal.lastrenewal_filepath, 
                    schoolnew_renewalfiles.certificate_filename, 
                    schoolnew_renewalfiles.certificate_filepath, 
                    schoolnew_renewalfiles.certificate_exp, 
                    schoolnew_renewalfiles.beo_certificateremarks, 
                    ".$tb1.".udise_code, 
                    ".$tb1.".school_name, 
                    ".$tb1.".address, 
                    ".$tb1.".pincode, 
                    schoolnew_block.block_name, 
                    schoolnew_block.id as block_id, 
                    ".$tb1.".block_id as blk_id,
                    schoolnew_district.district_name,
                    schoolnew_edn_dist_mas.edn_dist_name, 
                    MAX(schoolnew_renewalfiles.certificate_id) AS lst,
                    schoolnew_renewalcertificate_master.id as certificate_id, 
                    schoolnew_renewalcertificate_master.certificatename, 
                    (CASE schoolnew_renewal.condsatisfied WHEN 1 THEN 'FULLY SATISFIED' ELSE 
						CASE schoolnew_renewal.condsatisfied WHEN 2 THEN 'PARTLY SATISFIED' ELSE 
							CASE schoolnew_renewal.condsatisfied WHEN 3 THEN 'NONE SATISFIED' ELSE 
								CASE schoolnew_renewal.condsatisfied WHEN 4 THEN 'NOT APPLICABLE' ELSE NULL END END END END) AS 
                                conditionstatisfied, 
					(CASE schoolnew_renewal.fromclass WHEN 15 THEN 'PRE-KG' ELSE 
						CASE schoolnew_renewal.fromclass WHEN 14 THEN 'UKG' ELSE CASE schoolnew_renewal.fromclass WHEN 13 THEN 'LKG' ELSE 
							CASE WHEN schoolnew_renewal.fromclass IS NULL THEN NULL ELSE schoolnew_renewal.fromclass END END END END) AS low_class,
                            (CASE schoolnew_renewal.toclass WHEN 15 THEN 'PRE-KG' ELSE 
                                CASE schoolnew_renewal.toclass WHEN 14 THEN 'UKG' ELSE 
                                    CASE schoolnew_renewal.toclass WHEN 13 THEN 'LKG' ELSE 
                                        CASE WHEN schoolnew_renewal.toclass IS NULL THEN NULL ELSE schoolnew_renewal.toclass END END END END) AS high_class, 
                            ".$tb2.".low_class as lc,
                            ".$tb2.".high_class as hc, 
                            DATEDIFF(NOW(),schoolnew_renewal.createddate) as pending, 
                            ".$tb1.".sch_directorate_id, 
                            schoolnew_renewcategory.class_group,
                            schoolnew_moduleauth.id as moduleauth_id,
                            schoolnew_moduleauth.final_cat_id,
                            schoolnew_renewalfiles.value_paid,
                            schoolnew_renewalfiles.certificate_number,
                            schoolnew_renewalfiles.certificate_ifsc,
                            schoolnew_renewalfiles.certificate_date,
                            schoolnew_renewcategory.applied_category as appcat
                            FROM schoolnew_renewal 
        JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category=".$module." 
        ".($module>4?'LEFT ':'')."JOIN schoolnew_renewalfiles ON schoolnew_renewalfiles.renewal_id=schoolnew_renewal.id 
        ".($module>4?'LEFT ':'')."JOIN schoolnew_renewalcertificate_master ON schoolnew_renewalcertificate_master.id=schoolnew_renewalfiles.certificate_id 
        JOIN ".$tb1." ON ".$tb1.".".($module<4?'school_id':'temp_id')."=schoolnew_renewal.school_key_id ".($module>=4?'AND '.$tb1.'.temp_id IN (SELECT temp_id FROM newschool_registercomplete WHERE final_flag=1)':'')."
        JOIN schoolnew_district ON schoolnew_district.id=".$tb1.".district_id 
        JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id AND schoolnew_edn_dist_mas.id=".$tb1.".edu_dist_id 
        JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id 
        JOIN schoolnew_block ON schoolnew_block.id=schoolnew_edn_dist_block.block_id 
        ".($module<4?'JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_renewal.school_key_id':'')."
        JOIN schoolnew_school_department ON schoolnew_school_department.id=".$tb1.".sch_directorate_id 
        JOIN schoolnew_emismodule ON schoolnew_emismodule.id=schoolnew_renewcategory.applied_category
        JOIN schoolnew_moduleauth ON schoolnew_moduleauth.school_type=schoolnew_school_department.id 
        AND schoolnew_moduleauth.module_id=schoolnew_emismodule.id ".
        (($usertype!=1 && $usertype!=5 && $usertype!='')?"AND (schoolnew_moduleauth.auth_cat_id=".$usertype." OR schoolnew_moduleauth.final_cat_id=".$usertype.")":" ")."
        JOIN (select CAST(id AS SIGNED) as id,user_type from user_category
            union
            select -1*CAST(id AS SIGNED) as id,user_type from user_category) as user_category ON user_category.id=schoolnew_moduleauth.auth_cat_id OR user_category.id=schoolnew_moduleauth.final_cat_id
        WHERE 
        schoolnew_renewal.timestamp IN (SELECT ".($module==1?"MAX(schoolnew_renewal.timestamp)":"schoolnew_renewal.timestamp")." FROM schoolnew_renewal 
        JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category=".$module."
        GROUP BY schoolnew_renewal.school_key_id) 
        AND ".$where.$sublist." GROUP BY schoolnew_renewalfiles.id) AS T1 
        LEFT JOIN schoolnew_renewapprove ON schoolnew_renewapprove.renewal_id=T1.id
        GROUP BY fileid,approveid,id ORDER BY ts DESC) AS final_approve
        ".(($usertype!=1 && $usertype!=5)?("WHERE appauth".($_GET['app']==0?"<96":($_GET['app']==-1?" IS NOT NULL":"=".$_GET['app']))." OR appauth IS NULL"):"").";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();    
    }
    
    function ApproveInsertAndUpdate($data){
        //print_r($data);die();
        $this->db->trans_start();
        foreach($data as $d => $dtarray){
            //print_r($dtarray);echo('<br>');continue;
            if(!is_bool($dtarray['settings']['process'])){
                $processfunction=$dtarray['settings']['process'];
                //$this->db->$dtarray['settings']['process']($d,$dtarray[$dtarray['settings']['position']],$dtarray['settings']['reference']);
                
                if($d=='schoolnew_renewapprove'){
                    $SQL="SELECT id,renewal_id,auth FROM schoolnew_renewapprove WHERE renewal_id=".$dtarray['single']['renewal_id']." ORDER BY id DESC LIMIT 1 OFFSET 0;";
                    $query = $this->db->query($SQL);
                    $res=$query->result_array();
                    //print_r($res);die();
                    if($res[0]['auth']==$dtarray['single']['auth']){
                        continue;
                    }
                }
                if(isset($dtarray[$dtarray['settings']['position']])){
                    $this->db->$processfunction($d,$dtarray[$dtarray['settings']['position']],$dtarray['settings']['reference']);
                    continue;
                }
                if ($this->db->trans_status() === FALSE){
                    return false;
                }
            }
            else{
                print_r($data);
                die();
            }
        }
        //die();
        $this->db->trans_complete();
        return true;
    }
    
    function getAllUserCategory(){
        $SQL="select CAST(id AS SIGNED) as id,user_type from user_category
              union
              select -1*CAST(id AS SIGNED) as id,user_type from user_category";
        $query = $this->db->query($SQL);
        return $query->result_array();  
    }
    
    function getRejectionList($module,$schooltype,$usertype){
        $SQL="SELECT user_category.id,user_type FROM user_category
                JOIN (
                SELECT auth_cat_id as id,school_type,module_id FROM schoolnew_moduleauth
                UNION 
                SELECT final_cat_id as id,school_type,module_id FROM schoolnew_moduleauth) as auth ON auth.id=user_category.id
                WHERE auth.module_id=".$module." AND auth.school_type=".$schooltype." AND user_category.id!=".$usertype."
                UNION
                SELECT id,user_type FROM user_category WHERE id=1";
        $query = $this->db->query($SQL);
        return $query->result_array();  
    }
    
    function getResetQueue($renewal_id){
        $SQL="SELECT 
            	schoolnew_renewal.id as rid,
            	schoolnew_renewal.renewal_id, 
                schoolnew_renewal.school_key_id, 
                students_school_child_count.udise_code, 
                students_school_child_count.school_name,
                students_school_child_count.cate_type, 
                students_school_child_count.sch_directorate_id, 
                students_school_child_count.management, 
                students_school_child_count.district_id,
                students_school_child_count.district_name,
                students_school_child_count.edu_dist_id,
                students_school_child_count.edu_dist_name,
                students_school_child_count.block_id,
                students_school_child_count.block_name,
                schoolnew_renewalreset.reason_reset,
                schoolnew_renewal.timestamp, 
                allusers.user_name,
                COUNT(*) as totcnt,
                (SELECT auth FROM schoolnew_renewapprove WHERE schoolnew_renewapprove.emis_userid=schoolnew_renewalreset.sent_emis_sno 
                AND schoolnew_renewapprove.renewal_id=schoolnew_renewalreset.renewal_id ORDER BY id DESC limit 1) as auth
            FROM schoolnew_renewalreset  
            JOIN schoolnew_renewal ON schoolnew_renewal.id=schoolnew_renewalreset.renewal_id AND schoolnew_renewal.vaild_from IS NOT NULL 
            JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id 
            JOIN (SELECT dist_id,usertype,CONCAT(user_category.user_type,'-',getusers.district_name) as user_name FROM (
                    SELECT id as dist_id,9 as usertype,district_name FROM schoolnew_district
                        UNION ALL
                    SELECT id as dist_id,10 as usertype,edn_dist_name FROM schoolnew_edn_dist_mas
                        UNION ALL
                    SELECT id as dist_id,6 as usertype,block_name FROM schoolnew_block) AS getusers                    
                    JOIN user_category ON user_category.id=getusers.usertype) AS allusers 
                    ON allusers.dist_id=(SELECT emis_user_id FROM emis_userlogin WHERE sno=schoolnew_renewalreset.sent_emis_sno) 
            AND allusers.usertype=(SELECT emis_usertype FROM emis_userlogin WHERE sno=schoolnew_renewalreset.sent_emis_sno) 
            WHERE".$renewal_id." schoolnew_renewalreset.timestamp=(SELECT MAX(sr.timestamp) FROM schoolnew_renewalreset AS sr WHERE sr.id=schoolnew_renewalreset.id)
            AND schoolnew_renewalreset.approved_emis_sno IS NULL
            GROUP BY schoolnew_renewalreset.renewal_id;";
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            return $query->result_array();  
        
    }
    
    function setResetQueue(){
        
        $SQL="SELECT renewal_id FROM schoolnew_renewalreset 
                WHERE renewal_id IN 
                	(SELECT schoolnew_renewal.id FROM schoolnew_renewal JOIN
                        schoolnew_renewapprove ON schoolnew_renewapprove.renewal_id=schoolnew_renewal.id
                        WHERE (schoolnew_renewapprove.auth=-1 AND
                        (vaild_from IS NULL OR
                        vaild_upto IS NULL)) OR 
                	(schoolnew_renewapprove.auth=(SELECT schoolnew_moduleauth.final_cat_id FROM schoolnew_moduleauth
                        WHERE schoolnew_moduleauth.school_type=(SELECT sch_directorate_id FROM students_school_child_count 
                        WHERE school_id=(SELECT school_key_id FROM schoolnew_renewal WHERE schoolnew_renewal.id=schoolnew_renewalreset.renewal_id)) AND schoolnew_moduleauth.module_id=1) AND
                        (vaild_from!='0000-00-00' OR
                        vaild_upto!='0000-00-00'))) AND schoolnew_renewalreset.timestamp=(SELECT MAX(sr.timestamp) FROM schoolnew_renewalreset AS sr WHERE sr.id=schoolnew_renewalreset.id);";
        //echo($SQL);
        $query=$this->db->query($SQL);
        $res=$query->result_array();
        $up=array();
        if($res!=null){
            foreach($query->result_array() as $reset){
                $up[]=array(
                    'id'                =>  $reset['renewal_id'],
                    'vaild_from'        => '0000-00-00',
                    'vaild_upto'        => '0000-00-00',
                    'fromclass'         =>  NULL,
                    'toclass'           =>  NULL,
                    'contidion_file'    =>  NULL,
                );
            }
            if(!empty($up)){
                if(!$this->db->update_batch('schoolnew_renewal',$up, 'id')){
                    echo('Model Error:<br>');
                    return false;
                }
            }
        }
        return $this->getResetQueue('');
    }
    
    
    
    //PDF Generation Data Collection
    /*function getSchoolProfileData($schoolid){
        ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
        //$this->load->helper("url");
        //$url=str_replace("https","http",base_url());
        //echo($url);die();
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        
        if($this->uri->segment(4,0)!=2){
            $url=base_url()."application/controllers/sql/NewProfileQuery.sql";
            //$url="https://emis1.tnschools.gov.in/application/controllers/sql/NewProfileQuery.sql";
            //echo($url);die();
        }
        else{
            $url=base_url()."application/controllers/sql/NewSchoolQuery_1.sql";
        }
        $MyFile = file_get_contents($url,false,stream_context_create($dargs));
        //echo($MyFile);die();
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
        if($SQL!=""){
        $query = $this->db->query($SQL);
        return $query->result_array();
        }else{
            echo("ERROR:504 Problem With File Permission");
            die();
        }  
    }
    function getDayWorksTradeClubs($schoolid){
        //$this->load->helper("url");
        $url=str_replace("https","http",base_url());
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        $MyFile = file_get_contents(base_url()."application/controllers/sql/DayWork_Clubs_Trade.sql",false,stream_context_create($dargs));
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
        if($SQL!=""){
        $query = $this->db->query($SQL);
        return $query->result_array();
        }else{
            echo("ERROR:504 Problem With File Permission");
            die();
        }    
    }
    function getBlocksClassRoomLibraryInspection($schoolid){
        //$this->load->helper("url");
        $url=str_replace("https","http",base_url());
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        $MyFile = file_get_contents(base_url()."application/controllers/sql/Blocks_ClassRoom_Library_Inspection.sql",false,stream_context_create($dargs));
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
         if($SQL!=""){
        $query = $this->db->query($SQL);
        return $query->result_array();
        }else{
            echo("ERROR:504 Problem With File Permission");
            die();
        }    
    }
    function getEquipLabInternet($schoolid){
        //$this->load->helper("url");
        $url=str_replace("https","http",base_url());
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        $MyFile = file_get_contents(base_url()."application/controllers/sql/Equip_Lab_Intenet.sql",false,stream_context_create($dargs));
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
         if($SQL!=""){
        $query = $this->db->query($SQL);
        return $query->result_array();
        }else{
            echo("ERROR:504 Problem With File Permission");
            die();
        }  
    }
    function getFeesUdisePlusFund($schoolid){
        //$this->load->helper("url");
        $url=str_replace("https","http",base_url());
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        $MyFile = file_get_contents(base_url()."application/controllers/sql/Fees_UdisePlus_Fund.sql",false,stream_context_create($dargs));
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
        if($SQL!=""){
        $query = $this->db->query($SQL);
        return $query->result_array();
        }else{
            echo("ERROR:504 Problem With File Permission");
            die();
        }  
    }*/
    
    
    
    function DashBoardCounts($where){
        $SQL="SELECT * FROM schoolnew_manage_cate
                LEFT JOIN (
                SELECT 
                	SUM(total_b+total_g+total_t) AS stud_total,
                    SUM(teach_tot) as teach_tot,
                    SUM(nonteach_tot) AS nonteach_tot,
                    COUNT(*) AS totschools,
                    SUM((CASE WHEN school_type_id=1 THEN (Prkg_b+Prkg_g+Prkg_t+lkg_b+lkg_g+lkg_t+ukg_b+ukg_g+ukg_t+c1_b+c1_g+c1_t) ELSE 0 END)) AS prekg_1st,
                    school_type_id,district_id,edu_dist_id,block_id
                FROM students_school_child_count 
                WHERE school_type_id IS NOT NULL ".$where."
                GROUP BY school_type_id) AS totlist ON totlist.school_type_id=schoolnew_manage_cate.id
                LEFT JOIN (
                SELECT 
                	SUM(total_b+total_g+total_t) AS totalstudents,
                    SUM(teach_tot+nonteach_tot) as totalteacher,
                    SUM(teach_tot) AS total_teaching,
                    SUM(nonteach_tot) AS total_nonteaching,
                    COUNT(1) AS totalschools,
                    SUM((CASE WHEN school_type_id=1 THEN (Prkg_b+Prkg_g+Prkg_t+lkg_b+lkg_g+lkg_t+ukg_b+ukg_g+ukg_t+c1_b+c1_g+c1_t) ELSE 0 END)) AS prekg_1st
                FROM students_school_child_count 
                WHERE school_type_id IS NOT NULL ".$where.") AS totget  ON totget.totalstudents IS NOT NULL;";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    
    function StudentsCount($where,$group){
        $SQL="SELECT 
            	school_id,school_name,school_type_id,sch_directorate_id,
                district_id,district_name,
                edu_dist_id,edu_dist_name,
                block_id,block_name,
                management,cate_type,school_type,
                SUM(Prkg_b+Prkg_g+Prkg_t) AS 'PRE-KG',
                SUM(lkg_b+lkg_g+lkg_t) AS 'LKG',
                SUM(ukg_b+ukg_g+ukg_t) AS 'UKG',
                SUM(c1_b+c1_g+c1_t) AS 'I',
                SUM(c2_b+c2_g+c2_t) AS 'II',
                SUM(c3_b+c3_g+c3_t) AS 'III',
                SUM(c4_b+c4_g+c4_t) AS 'IV',
                SUM(c5_b+c5_g+c5_t) AS 'V',
                SUM(c6_b+c6_g+c6_t) AS 'VI',
                SUM(c7_b+c7_g+c7_t) AS 'VII',
                SUM(c8_b+c8_g+c8_t) AS 'VIII',
                SUM(c9_b+c9_g+c9_t) AS 'IX',
                SUM(c10_b+c10_g+c10_t) AS 'X',
                SUM(c11_b+c11_g+c11_t) AS 'XI',
                SUM(c12_b+c12_g+c12_t) AS 'XII',
                SUM(total_b+total_g+total_t) AS total
            FROM
            students_school_child_count
            WHERE district_id IS NOT NULL ".$where."
            GROUP BY school_type,cate_type,management,".$group.";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function TeachersCount($where,$group){
        $SQL="SELECT  
            	SUM(teach_mle+teach_fmle) AS teach_total,
                SUM(nonteach_mle+nonteach_fmle) AS nonteach,
                SUM(teach_hm_mle+teach_hm_fmle) AS hm,
                SUM(teach_bt_mle+teach_bt_fmle) AS bt,
                SUM(teach_pg_mle+teach_pg_fmle) AS pg,
                SUM(teach_sg_mle+teach_sg_fmle) AS sg,
                SUM(teach_othr_mle+teach_othr_fmle) AS oth,
                students_school_child_count.district_id,students_school_child_count.district_name,
                students_school_child_count.edu_dist_id,students_school_child_count.edu_dist_name,
                students_school_child_count.block_id,students_school_child_count.block_name,
                students_school_child_count.school_id,students_school_child_count.school_name,
            	students_school_child_count.udise_code, students_school_child_count.school_type,
            	students_school_child_count.cate_type
            FROM teacher_profile_count
            JOIN students_school_child_count ON students_school_child_count.school_id=teacher_profile_count.school_key_id
            WHERE students_school_child_count.udise_code IS NOT NULL ".$where."
            GROUP BY students_school_child_count.school_type_id,".$group.";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function schoolCount($where,$group){
        $SQL="SELECT count(distinct school_id) as dptcnt,department,udise_code,school_name,school_type,
            district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
            FROM students_school_child_count
            JOIN schoolnew_school_department ON schoolnew_school_department.id=students_school_child_count.sch_directorate_id
            WHERE students_school_child_count.school_id IS NOT NULL 
            GROUP BY sch_directorate_id;";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	
	/********************************************
	Renewal done by Magesh
	*********************************************/
	public function renewalcount($where){
		$sql="SELECT user_category.user_type,COUNT(1) as total FROM renewal_pending JOIN user_category ON user_category.id=renewal_pending.pending WHERE udise_code IS NOT NULL ".$where." GROUP BY user_category.user_type
union all
select 'TOTAL PENDING' as user_type,count(1) as total from renewal_pending where udise_code IS NOT NULL ".$where."
union all
SELECT 'UNRECOGNIZED' AS user_type,COUNT(1) AS total FROM renewal_pending WHERE pending IS NULL and udise_code IS NOT NULL ".$where."
union all
SELECT 'APPROVED APPLICATION' AS user_type,COUNT(1) AS total FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE vaild_from IS NOT NULL AND vaild_from!='0000-00-00' ".$where."
UNION ALL
SELECT 'REJECTED APPLICATION' AS user_type,COUNT(1) AS total FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE vaild_from IS NOT NULL AND vaild_from='0000-00-00' ".$where.";";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    
    public function renewal($section,$where){
		if($section!=''){
		$sql="SELECT renewal_pending.renewal_id,school_name,renewal_pending.school_key_id as school_id,renewal_pending.udise_code,district_id,block_id,edu_dist_id,district_name,block_name,edu_dist_name,directorate,renewal_pending.auth,sch_directorate_id,pending,user_type,createddate,datediff(now(),createddate) as pendingdays FROM renewal_pending JOIN user_category ON user_category.id=renewal_pending.pending 
JOIN schoolnew_renewal on schoolnew_renewal.id=renewal_pending.renewal_id
WHERE udise_code IS NOT NULL and pending=".$section." ".$where.";";
		}else{
			$sql="SELECT renewal_pending.renewal_id,school_name,renewal_pending.school_key_id,renewal_pending.udise_code,district_id,block_id,edu_dist_id,district_name,block_name,edu_dist_name,directorate,renewal_pending.auth,sch_directorate_id,pending,user_type,createddate,
			datediff(now(),createddate) as pendingdays FROM renewal_pending JOIN user_category ON user_category.id=renewal_pending.pending 
JOIN schoolnew_renewal on schoolnew_renewal.id=renewal_pending.renewal_id
WHERE udise_code IS NOT NULL ".$where.";";
		}
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	 public function get_renewal_rejected($section,$where){
		$SQL="SELECT * FROM schoolnew_renewal 
			JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id and curr_stat=1
			JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
			JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
			WHERE vaild_from is not null and vaild_from ='0000-00-00' ".$where.";";
			//echo $SQL; die();
            $query = $this->db->query($SQL);
			return $query->result_array();

    }
	
	
	
	public function renewalapprove($section,$where,$group){
		$sql="SELECT 
        	district_id,
        	district_name, 
        	edu_dist_id, 
        	edu_dist_name, 
        	block_id, 
        	block_name, 
        	school_id, 
        	school_name, 
        	udise_code,
        	schoolnew_renewal.id as renewal_id,
        	count(1) as catcount,
            max(timestamp) as appdate
        FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE  vaild_from!='0000-00-00' ".$where." group by ".$group.";";
		//echo($sql);die();
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function brtedetails($brtelogin){
		$sql="select district_id,block_id,school_id,block_name,udise_code,school_name,brte_id,brte_name from brte_school_map where isactive=1 and brte_id=".$brtelogin.";";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
    function get_districtwise_report($user_type,$report_level) 
    {

        $this->db->order_by('report_lvl','ACSE');
        $report_res = $this->db->get_where('report_csv',array('dashboard'=>$user_type,'report_lvl'=>$report_level,'flag'=>1))->result();
     
        return $report_res;

    }
    
    function get_flash_news($where)
    {
        $SQL="SELECT schoolnew_flashnews.*,user_category.user_type
                FROM schoolnew_flashnews
            JOIN user_category ON user_category.id = schoolnew_flashnews.created_type_id
            JOIN (SELECT district_name,block_name,district_id,edu_dist_id,block_id from students_school_child_count) as disttable ON 
            disttable.district_name=schoolnew_flashnews.district_name AND disttable.block_name=schoolnew_flashnews.block_name
            WHERE schoolnew_flashnews.id IS NOT NULL ".$where." GROUP BY created_by,created_date limit 10;";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
   
    function usercategoryDisplay($usertype,$directorate){
        $SQL="SELECT usercategory_id,sch_directorate_id,display_content,display_text FROM usercategory_display
                WHERE usercategory_id=".$usertype." AND (sch_directorate_id IS NULL OR sch_directorate_id=".$directorate.");";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function renewalChecking($strimp){
        $SQL="SELECT udise_code,school_name,district_name,edu_dist_name,block_name,
            directorate,
            (CASE WHEN applied_category=1 THEN 'RENEWAL' ELSE
CASE WHEN applied_category=2 THEN 'TAMIL MEDIUM' ELSE
CASE WHEN applied_category=3 THEN 'UPGRADATION' ELSE
CASE WHEN applied_category=4 THEN 'NEW SCHOOL' ELSE NULL END END END END) AS applied_category,pending_days, IF((LENGTH(pending)>2 OR pending IS NULL),
pending_desc,LEFT(pending_desc,13)) AS pending_desc,
IF(vaild_from IS NULL OR vaild_from=\"0000-00-00\",\"-\",CONCAT(DATE_FORMAT(vaild_from,\"%d/%m/%Y\"),\" TO \",DATE_FORMAT(vaild_upto,\"%d/%m/%Y\"))) as validity,
IF(vaild_from IS NULL OR vaild_from=\"0000-00-00\",\"-\",CONCAT(
CASE WHEN fromclass=13 THEN 'L.K.G.' ELSE CASE WHEN fromclass=14 THEN 'U.K.G.' ELSE CASE WHEN fromclass=13 THEN 'Pre.K.G.' ELSE fromclass END END END
,\" TO \",CASE WHEN toclass=13 THEN 'L.K.G.' ELSE CASE WHEN toclass=14 THEN 'U.K.G.' ELSE CASE WHEN toclass=13 THEN 'Pre.K.G.' ELSE toclass END END END)) AS valid_class
            FROM renewal_checking WHERE udise_code IN ('".$strimp."');";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    
    function allApproveStatus($category,$where,$exepost){
        
        switch($exepost){
            case 1:{
                $SQL=" SELECT * FROM (SELECT COUNT(1) AS cnt,
                (CASE WHEN (pending_desc IN (SELECT UPPER(user_type) FROM user_category)) THEN CONCAT('PENDING WITH ',pending_desc) ELSE pending_desc END) AS pending_desc,
                district_id,edu_dist_id,block_id,
                     (CASE WHEN pending_desc='APPROVED' THEN '98/2' ELSE
                    	CASE WHEN pending_desc='REJECTED' THEN '99/3' ELSE
                    		CASE WHEN (pending_desc IN (SELECT UPPER(user_type) FROM user_category)) THEN CONCAT(pending,'/1') ELSE NULL END 
                    	END 
                    END) AS path,
                    (CASE WHEN pending_desc='APPROVED' THEN 2 ELSE
                    	CASE WHEN pending_desc='REJECTED' THEN 3 ELSE
                    		CASE WHEN pending_desc IN (SELECT UPPER(user_type) FROM user_category) THEN 
                    			CASE WHEN pending IN (1,2,6,7,8,14,17) THEN 4 ELSE
                    				CASE WHEN pending IN (10) THEN 5 ELSE
                    					CASE WHEN pending IN (9,12,13,15,16) THEN 6 ELSE NULL END
                    				END
                    			END
                    		ELSE CASE WHEN pending_desc='NO BEO MAPPED' THEN 991 ELSE 999 END END
                    	END 
                    END) AS position,pending
                    FROM renewal_checking WHERE applied_category=".$category.$where."
                    GROUP BY pending_desc ORDER BY position ASC) AS derived
                    WHERE position IS NOT NULL;";
                break;
            }
            case 2:{
                $SQL="SELECT COUNT(1) AS cnt,directorate as pending_desc,district_id,edu_dist_id,block_id,NULL path,
                     (CASE WHEN sch_directorate_id IN (2,3,16,18,27,29,32,34,42) THEN 2 ELSE 
                    	CASE WHEN sch_directorate_id IN (1,5,15,17,19,20,21,22,23,24,26,31,33) THEN 3 ELSE  
                            CASE WHEN sch_directorate_id IN (28) THEN 4 ELSE 9 END
                        END
                     END) AS position
                     FROM renewal_checking WHERE applied_category=".$category.$where."
                     GROUP BY directorate ORDER BY position ASC;";
                break;
            }
            default:{
                $SQL="SELECT COUNT(1) as cnt,'TOTAL' AS pending_desc,district_id,edu_dist_id,block_id,'0' as path,'1' as postion FROM renewal_checking WHERE applied_category=".$category.$where.";";
            }
        }
        //echo($SQL."<br><br>");
        //$exepost==2?die():"";
        //AND auth_cat_id=".$this->session->userdata('emis_user_type_id')
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function studentMarkTermSummary($where,$group,$term=1,$indicator){
        $SQL="SELECT
        SUM(total) AS total_stud,
                
        SUM(attend_tam) AS attend_tam,
        SUM(pstud_tam) AS pstud_tam,
        MAX(mstud_tam)  AS mstud_tam,
        SUM(abstud_tam) AS abstud_tam,
        ROUND((SUM(abstud_tam)/SUM(attend_tam)),2) AS astud_tam,
        SUM(dstud_tam) AS dstud_tam,
        SUM(cstud_tam) AS cstud_tam,
        SUM(istud_tam) AS istud_tam,
        SUM(bstud_tam) AS bstud_tam,
        SUM(lstud_tam) AS lstud_tam,
        ROUND(AVG(s_avg_stud_tam),2) AS s_avg_stud_tam,
        min_avg_tam,
        max_avg_tam,
        dtavg_stud_tam,
        MAX(dtavg_stud_tam) AS stmax_stud_tam,
        MIN(dtavg_stud_tam) AS stmin_stud_tam,

        SUM(attend_eng) AS attend_eng,
        SUM(pstud_eng) AS pstud_eng,
        MAX(mstud_eng)  AS mstud_eng,
        SUM(abstud_eng) AS abstud_eng,
        ROUND((SUM(abstud_eng)/SUM(attend_eng)),2) AS astud_eng,
        SUM(dstud_eng) AS dstud_eng,
        SUM(cstud_eng) AS cstud_eng,
        SUM(istud_eng) AS istud_eng,
        SUM(bstud_eng) AS bstud_eng,
        SUM(lstud_eng) AS lstud_eng,
        ROUND(AVG(s_avg_stud_eng),2) AS s_avg_stud_eng,
        min_avg_eng,
        max_avg_eng,
        dtavg_stud_eng,
        MAX(dtavg_stud_eng) AS stmax_stud_eng,
        MIN(dtavg_stud_eng) AS stmin_stud_eng,
                
        SUM(attend_mat) AS attend_mat,
        SUM(pstud_mat) AS pstud_mat,
        MAX(mstud_mat)  AS mstud_mat,
        SUM(abstud_mat) AS abstud_mat,
        ROUND((SUM(abstud_mat)/SUM(attend_mat)),2) AS astud_mat,
        SUM(dstud_mat) AS dstud_mat,
        SUM(cstud_mat) AS cstud_mat,
        SUM(istud_mat) AS istud_mat,
        SUM(bstud_mat) AS bstud_mat,
        SUM(lstud_mat) AS lstud_mat,
        ROUND(AVG(s_avg_stud_mat),2) AS s_avg_stud_mat,
        min_avg_mat,
        max_avg_mat,
        dtavg_stud_mat,
        MAX(dtavg_stud_mat) AS stmax_stud_mat,
        MIN(dtavg_stud_mat) AS stmin_stud_mat,
                
        SUM(attend_sci) AS attend_sci,
        SUM(pstud_sci) AS pstud_sci,
        MAX(mstud_sci)  AS mstud_sci,
        SUM(abstud_sci) AS abstud_sci,
        ROUND((SUM(abstud_sci)/SUM(attend_sci)),2) AS astud_sci,
        SUM(dstud_sci) AS dstud_sci,
        SUM(cstud_sci) AS cstud_sci,
        SUM(istud_sci) AS istud_sci,
        SUM(bstud_sci) AS bstud_sci,
        SUM(lstud_sci) AS lstud_sci,
        ROUND(AVG(s_avg_stud_sci),2) AS s_avg_stud_sci,
        min_avg_sci,
        max_avg_sci,
        dtavg_stud_sci,
        MAX(dtavg_stud_sci) AS stmax_stud_sci,
        MIN(dtavg_stud_sci) AS stmin_stud_sci,
                
        SUM(attend_soc) AS attend_soc,
        SUM(pstud_soc) AS pstud_soc,
        MAX(mstud_soc)  AS mstud_soc,
        SUM(abstud_soc) AS abstud_soc,
        ROUND((SUM(abstud_soc)/SUM(attend_soc)),2) AS astud_soc,
        SUM(dstud_soc) AS dstud_soc,
        SUM(cstud_soc) AS cstud_soc,
        SUM(istud_soc) AS istud_soc,
        SUM(bstud_soc) AS bstud_soc,
        SUM(lstud_soc) AS lstud_soc,
        ROUND(AVG(s_avg_stud_soc),2) AS s_avg_stud_soc,
        min_avg_soc,
        max_avg_soc,
        dtavg_stud_soc,
        MAX(dtavg_stud_soc) AS stmax_stud_soc,
        MIN(dtavg_stud_soc) AS stmin_stud_soc,
        
        state_stud_tam,
        state_stud_eng,
        state_stud_mat,
        state_stud_sci,
        state_stud_soc,
        district_id,
        district_name,
        block_id,block_name,
        edu_dist_id,edu_dist_name, 
        students_school_child_count.school_id,
        udise_code,school_name
FROM schoolnew_student_mark_summary
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_student_mark_summary.school_id
JOIN (SELECT
        COUNT(1) AS sch_tot,
        MIN(s_avg_stud_tam) AS min_avg_tam,
        MAX(s_avg_stud_tam) AS max_avg_tam,
        
        MIN(s_avg_stud_eng) AS min_avg_eng,
        MAX(s_avg_stud_eng) AS max_avg_eng,
        
        MIN(s_avg_stud_mat) AS min_avg_mat,
        MAX(s_avg_stud_mat) AS max_avg_mat,
        
        MIN(s_avg_stud_sci) AS min_avg_sci,
        MAX(s_avg_stud_sci) AS max_avg_sci,
        
        MIN(s_avg_stud_soc) AS min_avg_soc,
        MAX(s_avg_stud_soc) AS max_avg_soc,
        
        ROUND(AVG(s_avg_stud_tam),2) AS dtavg_stud_tam,
        ROUND(AVG(s_avg_stud_eng),2) AS dtavg_stud_eng,
        ROUND(AVG(s_avg_stud_mat),2) AS dtavg_stud_mat,
        ROUND(AVG(s_avg_stud_sci),2) AS dtavg_stud_sci,
        ROUND(AVG(s_avg_stud_soc),2) AS dtavg_stud_soc,
        district_id AS dist_id
        FROM schoolnew_student_mark_summary
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_student_mark_summary.school_id
        GROUP BY district_id) AS dist_summary ON dist_summary.dist_id=students_school_child_count.district_id
JOIN (SELECT
        ROUND(AVG(s_avg_stud_tam),2) AS state_stud_tam,
        ROUND(AVG(s_avg_stud_eng),2) AS state_stud_eng,
        ROUND(AVG(s_avg_stud_mat),2) AS state_stud_mat,
        ROUND(AVG(s_avg_stud_sci),2) AS state_stud_sci,
        ROUND(AVG(s_avg_stud_soc),2) AS state_stud_soc
        FROM schoolnew_student_mark_summary) as state_avg_proc
    WHERE term=".$term.$where." GROUP BY ".$group.";";
    //echo($SQL);die();
    $query = $this->db->query($SQL);
    return $query->result_array();
  }
  
  function rankSheet(){
    $SQL="SELECT schoolnew_district_ranksheet.*,FIND_IN_SET( overscore,(SELECT GROUP_CONCAT( overscore ORDER BY overscore DESC ) FROM schoolnew_district_ranksheet)) AS distrank
            FROM schoolnew_district_ranksheet ORDER BY distrank ASC";
    $query = $this->db->query($SQL);
    return $query->result_array();
  }
    
    function studentMarkTermList($where,$group,$term=1,$indicator){
        
        set_time_limit(300);   
        ini_set('mysql.connect_timeout','300');   
        ini_set('max_execution_time', '300');   
        $SQL="SELECT 
            	total,
                final_der.district_id,final_der.district_name,final_der.block_id,block_name,final_der.edu_dist_id,final_der.edu_dist_name,udise_code,school_name,
                final_der.school_id,"
                .(($indicator==1 || $indicator==3)?
                "attend_tam,attend_eng,attend_mat,attend_sci,attend_soc,":"")
                
                .($indicator==1?"pstud_tam,":($indicator==2?"mstud_tam,":($indicator==3?"abstud_tam,ROUND((abstud_tam/attend_tam),2) AS astud_tam,":($indicator==4?"dstud_tam,":($indicator==5?"cstud_tam,":($indicator==6?"istud_tam,":""))))))
                .($indicator==1?"pstud_eng,":($indicator==2?"mstud_eng,":($indicator==3?"abstud_eng,ROUND((abstud_eng/attend_eng),2) AS astud_eng,":($indicator==4?"dstud_eng,":($indicator==5?"cstud_eng,":($indicator==6?"istud_eng,":""))))))
                .($indicator==1?"pstud_mat,":($indicator==2?"mstud_mat,":($indicator==3?"abstud_mat,ROUND((abstud_mat/attend_mat),2) AS astud_mat,":($indicator==4?"dstud_mat,":($indicator==5?"cstud_mat,":($indicator==6?"istud_mat,":""))))))
                .($indicator==1?"pstud_sci,":($indicator==2?"mstud_sci,":($indicator==3?"abstud_sci,ROUND((abstud_sci/attend_sci),2) AS astud_sci,":($indicator==4?"dstud_sci,":($indicator==5?"cstud_sci,":($indicator==6?"istud_sci,":""))))))
                .($indicator==1?"pstud_soc":($indicator==2?"mstud_soc":($indicator==3?"abstud_soc,ROUND((abstud_soc/attend_soc),2) AS astud_soc":($indicator==4?"dstud_soc":($indicator==5?"cstud_soc":($indicator==6?"istud_soc":"")))))).
            " FROM
            (
            SELECT
            SUM(students_school_child_count.total) as total,
            district_id,
            district_name,
            block_id,block_name,
            edu_dist_id,edu_dist_name, 
            students_school_child_count.school_id,
            udise_code,school_name,
            ".(($indicator==1 || $indicator==3)?"
            SUM(SQSMT.attend1=1) AS attend_tam,
            SUM(SQSMT.attend2=1) AS attend_eng,
            SUM(SQSMT.attend3=1) AS attend_mat,
            SUM(SQSMT.attend4=1) AS attend_sci,
            SUM(SQSMT.attend5=1) AS attend_soc,
            ":"")
            .(($indicator==1 || $indicator==4 || $indicator==5 || $indicator==6)?"SUM((SQSMT.FAM1+SQSMT.SAM1)>35) AS pstud_tam,":($indicator==2?"MAX((SQSMT.FAM1+SQSMT.SAM1)) AS mstud_tam,":($indicator==3?"SUM((SQSMT.FAM1+SQSMT.SAM1)) AS abstud_tam,":($indicator==4?"SUM((SQSMT.FAM1+SQSMT.SAM1)>=75) AS dstud_tam,":($indicator==5?"SUM((SQSMT.FAM1+SQSMT.SAM1)=100) AS cstud_tam,":($indicator==6?"SUM((SQSMT.FAM1+SQSMT.SAM1)<=35) AS istud_tam,":""))))))
            .(($indicator==1 || $indicator==4 || $indicator==5 || $indicator==6)?"SUM((SQSMT.FAM2+SQSMT.SAM2)>35) AS pstud_eng,":($indicator==2?"MAX((SQSMT.FAM2+SQSMT.SAM2)) AS mstud_eng,":($indicator==3?"SUM((SQSMT.FAM2+SQSMT.SAM2)) AS abstud_eng,":($indicator==4?"SUM((SQSMT.FAM2+SQSMT.SAM2)>=75) AS dstud_eng,":($indicator==5?"SUM((SQSMT.FAM2+SQSMT.SAM2)=100) AS cstud_eng,":($indicator==6?"SUM((SQSMT.FAM2+SQSMT.SAM2)<=35) AS istud_eng,":""))))))
            .(($indicator==1 || $indicator==4 || $indicator==5 || $indicator==6)?"SUM((SQSMT.FAM3+SQSMT.SAM3)>35) AS pstud_mat,":($indicator==2?"MAX((SQSMT.FAM3+SQSMT.SAM3)) AS mstud_mat,":($indicator==3?"SUM((SQSMT.FAM3+SQSMT.SAM3)) AS abstud_mat,":($indicator==4?"SUM((SQSMT.FAM3+SQSMT.SAM3)>=75) AS dstud_mat,":($indicator==5?"SUM((SQSMT.FAM3+SQSMT.SAM3)=100) AS cstud_mat,":($indicator==6?"SUM((SQSMT.FAM3+SQSMT.SAM3)<=35) AS istud_mat,":""))))))
            .(($indicator==1 || $indicator==4 || $indicator==5 || $indicator==6)?"SUM((SQSMT.FAM4+SQSMT.SAM4)>35) AS pstud_sci,":($indicator==2?"MAX((SQSMT.FAM4+SQSMT.SAM4)) AS mstud_sci,":($indicator==3?"SUM((SQSMT.FAM4+SQSMT.SAM4)) AS abstud_sci,":($indicator==4?"SUM((SQSMT.FAM4+SQSMT.SAM4)>=75) AS dstud_sci,":($indicator==5?"SUM((SQSMT.FAM4+SQSMT.SAM4)=100) AS cstud_sci,":($indicator==6?"SUM((SQSMT.FAM4+SQSMT.SAM4)<=35) AS istud_sci,":""))))))
            .(($indicator==1 || $indicator==4 || $indicator==5 || $indicator==6)?"SUM((SQSMT.FAM5+SQSMT.SAM5)>35) AS pstud_soc":($indicator==2?"MAX((SQSMT.FAM5+SQSMT.SAM5)) AS mstud_soc":($indicator==3?"SUM((SQSMT.FAM5+SQSMT.SAM5)) AS abstud_soc":($indicator==4?"SUM((SQSMT.FAM5+SQSMT.SAM5)>=75) AS dstud_soc":($indicator==5?"SUM((SQSMT.FAM5+SQSMT.SAM5)=100) AS cstud_soc":($indicator==6?"SUM((SQSMT.FAM5+SQSMT.SAM5)<=35) AS istud_soc":"")))))).
            "
            FROM schoolnew_qstudent_markterm".$term." AS SQSMT
            JOIN students_school_child_count ON students_school_child_count.school_id=SQSMT.school_id ".$where." GROUP BY ".$group.") AS final_der;";
        echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function duplicateStudents($where){

        if($this->session->userdata('emis_loggedin')=='Active'){
            if($this->session->userdata('emis_user_type_id')==6){
                $end=") AS chh
                    GROUP BY name,gender,dob,father_name,school_id
                    HAVING repeated<=1) AS beopan
                    JOIN students_child_detail ON 
                    beopan.name=students_child_detail.name AND
                    beopan.gender=students_child_detail.gender AND
                    beopan.dob=students_child_detail.dob AND
                    beopan.father_name=students_child_detail.father_name AND 
                    beopan.school_id=students_child_detail.school_id;";
                $start="SELECT beopan.* FROM (SELECT *,COUNT(1) AS repeated FROM (";   
    			$where.=" AND students_child_detail.id NOT IN (SELECT student_id FROM students_dupli_history)";
    			
            }elseif($this->session->userdata('emis_user_type_id')==1){
                $start="";
                $end="WHERE students_child_detail.id NOT IN (SELECT student_id FROM students_dupli_history);";
            }
            
            
            $SQL=$start."SELECT 
                    	students_school_child_count.school_id,
                        students_school_child_count.udise_code,
                        students_school_child_count.school_name,
                        students_school_child_count.district_id,
                        students_school_child_count.district_name,
                        students_school_child_count.edu_dist_id,
                        students_school_child_count.edu_dist_name,
                        students_school_child_count.block_id,
                        students_school_child_count.block_name,
                        students_child_detail.id as stud_id,
                        students_child_detail.unique_id_no,
                        students_child_detail.name,
                        students_child_detail.gender,
                        students_child_detail.name_id_card,
                        students_child_detail.class_studying_id,
                        students_child_detail.aadhaar_uid_number,
                        students_child_detail.class_section,
                        students_child_detail.dob,
                        students_child_detail.father_name,
                        students_child_detail.mother_name,
                        students_child_detail.transfer_flag,
    					students_child_detail.photo
                    FROM students_school_child_count
                    JOIN students_child_detail ON students_child_detail.school_id=students_school_child_count.school_id
                    JOIN (SELECT 
                    	students_child_detail.name,
                        students_child_detail.gender,
                        students_child_detail.dob,
                        students_child_detail.father_name,
                        students_child_detail.mother_name,
                        school_id,
                        COUNT(1) AS repeated
                    FROM 
                    	students_child_detail
                    WHERE transfer_flag=0 AND school_id IN (SELECT school_id FROM students_school_child_count WHERE school_id IS NOT NULL ".$where.")
                    GROUP BY students_child_detail.name,
                    students_child_detail.gender,
                    students_child_detail.dob,
                    students_child_detail.father_name
                    HAVING repeated>1) as dups ON 
                    dups.name=students_child_detail.name AND
                    dups.gender=students_child_detail.gender AND
                    dups.dob=students_child_detail.dob AND
                    dups.father_name=students_child_detail.father_name
    				".$end;
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            return $query->result_array();
        }else {
            $this->session->session_destroy();
            redirect('/','refresh');
        }
    }
	
	function getstudlist($stud,$check=0){
		$sql="select school_id,id as student_id,unique_id_no,name as stud_name,dob,gender,father_name".
		($check==1?",class_studying_id,education_medium_id,school_admission_no,
		(CASE
			WHEN (MONTH(date(now())) > 4) THEN CONCAT(CONVERT( DATE_FORMAT(date(now()), '%Y') USING UTF8MB4), '-', (DATE_FORMAT(date(now()), '%y') + 1))
                ELSE CONCAT((DATE_FORMAT(date(now()), '%Y') - 1), '-', CONVERT( DATE_FORMAT(date(now()), '%y') USING UTF8MB4))
        END) AS academic_yr,doj,class_section":"")." from students_child_detail where id=".$stud;
		//echo($sql);die();
		$query = $this->db->query($sql);
        return $query->result_array();
	}
	
    function insertDuplicatstud($get){
		return $this->db->insert('students_dupli_history',$get);
	}
	
	function studuplicatelist($where,$group){
		$sql="select count(1) as total,sum(total_b+total_g+total_t) as totalstudent,district_name,edu_dist_name,block_name,udise_code,school_name,school_id,district_id,block_id,edu_dist_id,sum(student_duplication_count.Prkg_b+student_duplication_count.Prkg_g+student_duplication_count.Prkg_t+student_duplication_count.lkg_b+student_duplication_count.lkg_g+student_duplication_count.lkg_t+student_duplication_count.ukg_b+student_duplication_count.ukg_g+student_duplication_count.
ukg_t+student_duplication_count.c1_b+student_duplication_count.c1_g+student_duplication_count.c1_t+student_duplication_count.c2_b+student_duplication_count.c2_g+student_duplication_count.c2_t+student_duplication_count.c3_b+student_duplication_count.c3_g+student_duplication_count.c3_t+student_duplication_count.c4_b+student_duplication_count.c4_g+student_duplication_count.c4_t+student_duplication_count.c5_b+student_duplication_count.c5_g+student_duplication_count.c5_t+student_duplication_count.c6_b+student_duplication_count.c6_g+student_duplication_count.c6_t+student_duplication_count.c7_b+student_duplication_count.c7_g+student_duplication_count.
c7_t+student_duplication_count.c8_b+student_duplication_count.c8_g+student_duplication_count.c8_t+student_duplication_count.c9_b+student_duplication_count.c9_g+student_duplication_count.c9_t+student_duplication_count.c10_b+student_duplication_count.c10_g+student_duplication_count.c10_t+student_duplication_count.c11_b+student_duplication_count.c11_g+student_duplication_count.c11_t+student_duplication_count.c12_b+student_duplication_count.c12_g+student_duplication_count.c12_t) as duplicatecount
from students_school_child_count
join student_duplication_count on student_duplication_count.school_key_id=students_school_child_count.school_id
 where udise_code is not null ".$where." group by ".$group.";";
		//echo $sql; die();
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function studentremoval(){
		$sql="select ceodup.*,district_id,block_id,edu_dist_id,district_name,block_name,edu_dist_name,school_name,udise_code from (select 
        students_child_detail.id as student_id,
        students_child_detail.name as student_name,
        students_child_detail.dob,
        students_child_detail.gender,
        students_child_detail.father_name,
		students_child_detail.mother_name,
        students_child_detail.school_id,
        students_child_detail.unique_id_no,
        students_child_detail.photo,
		(select class_studying from baseapp_class_studying where id=students_child_detail.class_studying_id) as class_studying_id,
		students_child_detail.education_medium_id,
		students_child_detail.school_admission_no,
		(CASE
			WHEN (MONTH(date(now())) > 4) THEN CONCAT(CONVERT( DATE_FORMAT(date(now()), '%Y') USING UTF8MB4), '-', (DATE_FORMAT(date(now()), '%y') + 1))
                ELSE CONCAT((DATE_FORMAT(date(now()), '%Y') - 1), '-', CONVERT( DATE_FORMAT(date(now()), '%y') USING UTF8MB4))
        END) AS academic_yr,
		students_child_detail.doj,
        students_child_detail.class_section,
        (CASE WHEN students_child_detail.id=students_dupli_history.student_id THEN
			CASE WHEN students_dupli_history.remarks=1 THEN 'TO BE REMOVED' ELSE
				CASE WHEN students_dupli_history.remarks=0 THEN 'TO BE RETAINED' END
			END
		ELSE NULL END) as remarks,
		(CASE WHEN students_child_detail.id=students_dupli_history.student_id THEN students_dupli_history.remarks ELSE NULL END) as rmk
        from students_child_detail
        join students_dupli_history on students_dupli_history.stud_name=students_child_detail.name and students_dupli_history.dob=students_child_detail.dob and students_dupli_history.gender=students_child_detail.gender and students_dupli_history.father_name=students_child_detail.father_name 
        WHERE students_child_detail.transfer_flag=0 and students_dupli_history.approve is null) as ceodup
        join students_school_child_count on students_school_child_count.school_id=ceodup.school_id;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    
    function getRenewCategory($school_id){
        $SQL="SELECT applied_category FROM schoolnew_renewcategory
        WHERE renewal_id=(SELECT id FROM schoolnew_renewal WHERE timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewal WHERE school_key_id=".$school_id."));";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
		return $query->result_array();
    }
    
    /*function getSchoolProfileData($schoolid){
        $SQL="SELECT DISTINCTROW
schoolnew_basicinfo.udise_code,
schoolnew_basicinfo.school_name,
schoolnew_basicinfo.district_id,
schoolnew_basicinfo.edu_dist_id,
schoolnew_basicinfo.block_id,
schoolnew_basicinfo.manage_cate_id,
schoolnew_basicinfo.sch_management_id,
schoolnew_basicinfo.sch_cate_id,
schoolnew_basicinfo.sch_directorate_id,
schoolnew_basicinfo.local_body_id,
schoolnew_basicinfo.lb_vill_town_muni,
schoolnew_basicinfo.lb_habitation_id,
schoolnew_basicinfo.cluster_id,
schoolnew_basicinfo.assembly_id,
schoolnew_basicinfo.parliament_id,
schoolnew_basicinfo.address,
locationentry.district_name,
locationentry.edu_dist_name,
locationentry.block_name,
schoolnew_basicinfo.pincode,
schoolnew_basicinfo.latitude,
schoolnew_basicinfo.longitude,
(CASE WHEN schoolnew_basicinfo.urbanrural=2 THEN 'URBAN' ELSE
		CASE WHEN schoolnew_basicinfo.urbanrural=1 THEN 'RURAL' END END) AS urbanrurals,
 urbanrural,
zone_type,village_ward,
village_munci,
schoolnew_assembly.assembly_name,
schoolnew_parliament.parli_name,
manage_name,schooldirectrate.management,department,
schoolnew_basicinfo.office_mobile,
schoolnew_basicinfo.corr_mobile,
schoolnew_basicinfo.sch_email,
schoolnew_basicinfo.website,
(SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.office_std_code) as office_std_code,
schoolnew_basicinfo.office_landline AS office_landline,
(SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.corr_std_code) as corr_std_code,
schoolnew_basicinfo.corr_landlline AS corr_landlline,
schoolnew_academic_detail.yr_estd_schl,
shftd_schl,
hill_frst,
RESITYPE_DESC,
typ_resid_schl,
cwsn_scl,
yr_rec_schl_elem,
yr_rec_schl_sec,
yr_rec_schl_hsc,
yr_recgn_first,
yr_last_renwl,
certifi_no,
schoolnew_academic_detail.scl_category,
schoolnew_type.category_name as schooltypescl_category,
schoolnew_academic_detail.school_type,

acad_mnth_start,
schoolnew_academic_detail.low_class,
schoolnew_academic_detail.high_class,
(SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.low_class)
as low_classes,
(SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.high_class)
as high_classes,
schoolnew_academic_detail.minority_grp,
schoolnew_academic_detail.minority_other,
schoolnew_academic_detail.minority_yr,

(CASE WHEN (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp)
IS NULL THEN 'NO'
ELSE CASE WHEN schoolnew_academic_detail.minority_grp=13 THEN CONCAT((SELECT minority FROM schoolnew_minority WHERE
schoolnew_minority.id=schoolnew_academic_detail.minority_grp),' - ',schoolnew_academic_detail.minority_other) ELSE
(SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) END END) AS
minority_grps,
(CASE WHEN schoolnew_academic_detail.minority_sch=1 THEN schoolnew_academic_detail.minority_yr ELSE 'NO' END) AS
minority_yrs,
schoolnew_infra_detail.road_connect,
schoolnew_infra_detail.distance_road,
schoolnew_infra_detail.weather_roads,
schoolnew_infra_detail.land_exp_scl,
(CASE WHEN schoolnew_infra_detail.road_connect=1 THEN CONCAT('Kutcha Road',' - ',schoolnew_infra_detail.distance_road,'
mts') ELSE
CASE WHEN schoolnew_infra_detail.road_connect=2 THEN CONCAT('Partial Pucca Road',' -
',schoolnew_infra_detail.distance_road,' mts') ELSE
CASE WHEN schoolnew_infra_detail.road_connect=3 THEN CONCAT('No Road',' - ',schoolnew_infra_detail.distance_road,' mts')
ELSE
CASE WHEN (schoolnew_infra_detail.road_connect=NULL OR schoolnew_infra_detail.road_connect=0 OR
schoolnew_infra_detail.road_connect IS NULL) THEN 'N/A' END
END END END) AS weather_roadss,
schoolnew_training_detail.special_train,
schoolnew_training_detail.train_prov_boys,
schoolnew_training_detail.train_prov_grls,
schoolnew_training_detail.train_cond_by,
schoolnew_training_detail.train_cond_in,
schoolnew_training_detail.train_type,

IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_boys,'NO') AS train_prov_boyss,
IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_grls,'NO') AS train_prov_grlss,
IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_by=1 THEN 'SCHOOL TEACHERS'
ELSE
CASE WHEN schoolnew_training_detail.train_cond_by=2 THEN 'SPECIALLY ENGAGED TEACHERS' ELSE
CASE WHEN schoolnew_training_detail.train_cond_by=3 THEN 'BOTH SCHOOL & SPECIALLY ENGAGED TEACHERS' ELSE
CASE WHEN schoolnew_training_detail.train_cond_by=4 THEN 'NGO' END END END END),'NO') AS train_cond_by,
IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_in=1 THEN 'SCHOOL PREMISES'
ELSE
CASE WHEN schoolnew_training_detail.train_cond_in=2 THEN 'OTHER THAN SCHOOL PREMISES' ELSE
CASE WHEN schoolnew_training_detail.train_cond_in=3 THEN 'BOTH SCHOOL AND OTHER PREMISES' END END END),'N/A') AS
train_cond_in,
IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_type=1 THEN 'RESIDENTIAL' ELSE
CASE WHEN schoolnew_training_detail.train_type=2 THEN 'NON-RESIDENTIAL' ELSE
CASE WHEN schoolnew_training_detail.train_type=3 THEN 'BOTH RESIDENTIAL AND NON-RESIDENTIAL' END END END),'N/A') AS
train_types,

anganwadi,
IF(schoolnew_training_detail.anganwadi=1,angan_childs,'N/A') AS angan_childs,
IF(schoolnew_training_detail.anganwadi=1,angan_wrks,'N/A') AS angan_wrks,
schoolnew_training_detail.anganwadi_center,
anganwadi_train,
sdmp_dev,
sturct_saf,
nonsturct_saf,
cctv_school,
firext_schl,
nodtchr_schlsaf,
dister_trng,
dister_part,
slfdfse_trng,
noslfdfse_trng,
suppliment_prevousyr,
txtbk_curyr_prepri,
txtbk_curyr_pri,
txtbk_curyr_upp,
txtbk_curyr_sec,
txtbk_curyr_hsec,
tle_grade_preprim,
tle_grade_prim,
tle_grde_upp,
tle_grde_sec,
tle_grde_hsec,
sports_prepri,
sports_pri,
sports_upp,
sports_sec,
sports_hsec,
smc_const,
schoolnew_committee_detail.smc_sep_bnkacc,
schoolnew_committee_detail.smc_acc_no,
schoolnew_committee_detail.smc_acc_name,

IF(smc_const=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smc_bnk_brnch),'N/A') as smc_bank,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_name,'N/A') AS smc_chair_name,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_mble,'N/A') AS smc_chair_mble,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_mle,'N/A') AS smc_tot_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_fmle,'N/A') AS smc_tot_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_mle,'N/A') AS smc_prnts_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_fmle,'N/A') AS smc_prnts_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_mle,'N/A') AS smc_rep_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_fmle,'N/A') AS smc_rep_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_mle,'N/A') AS smc_weakr_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_fmle,'N/A') AS smc_weakr_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_no_prev_acyr,'N/A') AS smc_no_prev_acyr,
    IF(smc_const=1,schoolnew_committee_detail.smc_const_yr,'N/A') AS smc_const_yr,
    schoolnew_committee_detail.smc_sdp,schoolnew_committee_detail.smdc_constitu,
    
    (CASE WHEN schoolnew_committee_detail.smc_sdp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smc_sdp=0 THEN 'NO' ELSE '(NO-DATA FOUND)' END END) AS smc_sdps,

	(CASE WHEN schoolnew_committee_detail.smdc_constitu=1 THEN 'YES' ELSE 'NO' END) AS smdc_constitus,
    
    schoolnew_committee_detail.smdc_sep_bnkacc,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_name,'N/A') as smdc_acc_name,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_no,'N/A') as smdc_acc_no,
    
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smdc_bnk_brnch),'N/A') as smdc_bank,
	schoolnew_committee_detail.smdc_constitu,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_mle,'N/A') as smdc_tot_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_fmle,'N/A') as smdc_tot_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_mle,'N/A') as smdc_parnt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_fmle,'N/A') as smdc_parnt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_mle,'N/A') as smdc_lb_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_fmle,'N/A') as smdc_lb_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_mle,'N/A') as smdc_minori_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_fmle,'N/A') as smdc_minori_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_women,'N/A') as smdc_women,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_mle,'N/A') as smdc_scst_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_fmle,'N/A') as smdc_scst_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_mle,'N/A') as smdc_deo_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_fmle,'N/A') as smdc_deo_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_mle,'N/A') as smdc_audit_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_fmle,'N/A') as smdc_audit_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_mle,'N/A') as smdc_exprt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_fmle,'N/A') as smdc_exprt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_mle,'N/A') as smdc_techrs_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_fmle,'N/A') as smdc_techrs_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_mle,'N/A') as smdc_hm_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_fmle,'N/A') as smdc_hm_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_mle,'N/A') as smdc_prnci_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_fmle,'N/A') as smdc_prnci_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mle,'N/A') as smdc_chair_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_fmle,'N/A') as smdc_chair_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_const_yr,'N/A') as smdc_const_yr,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_no_last_acyr,'N/A') as smdc_no_last_acyr,
    schoolnew_committee_detail.smdc_sip,
    
    (CASE WHEN schoolnew_committee_detail.smdc_sip=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smdc_sip=0 THEN 'NO' ELSE 'N/A' END END) AS smdc_sip,
        
	IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_contrib_amt,'N/A') as smdc_contrib_amt,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_name,'N/A') as smdc_chair_name,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mble,'N/A') as smdc_chair_mble,
	schoolnew_committee_detail.sbc_const,
    IF(schoolnew_committee_detail.sbc_const=1,schoolnew_committee_detail.sbc_const_year,'NO') as sbc_const,

    IF(schoolnew_committee_detail.acadecomm_const=1,schoolnew_committee_detail.acadecomm_year,'NO') as acadecomm_const,
    schoolnew_committee_detail.pta_const,
    (CASE WHEN schoolnew_committee_detail.pta_const=1 THEN 'YES' ELSE 'NO' END) AS pta_const,
    
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_est_yr,'N/A') as pta_est_yr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_no_curyr,'N/A') as pta_no_curyr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_reg_no,'N/A') as pta_reg_no,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_subscri_amt,'N/A') as pta_subscri_amt,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_name,'N/A') as pta_chair_name,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_mble,'N/A') as pta_chair_mble,
    
    TRUNCATE((schoolnew_infra_detail.land_avail_sqft/43560),3) AS land_avail_sqft,
    schoolnew_infra_detail.play_facility,
    schoolnew_infra_detail.play_alt_arrang,
    schoolnew_infra_detail.play_address,
    schoolnew_infra_detail.dist_build_playgr,
    
    
    IF(schoolnew_infra_detail.play_facility=1,TRUNCATE((schoolnew_infra_detail.play_area_sqft/43560),3),IF(schoolnew_infra_detail.play_alt_arrang=1,CONCAT(schoolnew_infra_detail.play_address,'<br>Distance:',schoolnew_infra_detail.dist_build_playgr),'N/A')) AS play_area_sqft,
schoolnew_infra_detail.land_exp_scl,
    IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area/43560),3),'N/A') AS play_land_area,
    
    land_ownersip,
    
    (CASE WHEN schoolnew_infra_detail.land_ownersip=1 THEN 'RENTED' ELSE
		CASE WHEN schoolnew_infra_detail.land_ownersip=2 THEN 'LEASED' ELSE
			CASE WHEN schoolnew_infra_detail.land_ownersip=3 THEN 'OWNED' ELSE
				CASE WHEN schoolnew_infra_detail.land_ownersip=4 THEN 'RENTAL FREE' END END END END) AS land_ownersips,
                
                
	IF(schoolnew_infra_detail.land_ownersip=1,schoolnew_infra_detail.land_rent_amt,'N/A') AS land_rent_amt,
    IF(schoolnew_infra_detail.land_ownersip=2,schoolnew_infra_detail.land_lease_perid,'N/A') AS land_lease_perid,
    IF(schoolnew_infra_detail.land_ownersip=2,DATE_FORMAT(schoolnew_infra_detail.valid_upto,"%d/%m/%Y"),'N/A') AS valid_upto,
    schoolnew_infra_detail.cmpwall_type,
    (CASE WHEN schoolnew_infra_detail.cmpwall_type=1 THEN 'PUCCA' ELSE
		CASE WHEN schoolnew_infra_detail.cmpwall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
			CASE WHEN schoolnew_infra_detail.cmpwall_type=3 THEN 'BARBED WIRE FENCING' ELSE
				CASE WHEN schoolnew_infra_detail.cmpwall_type=4 THEN 'HEDGES' ELSE
					CASE WHEN schoolnew_infra_detail.cmpwall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
						CASE WHEN schoolnew_infra_detail.cmpwall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_type,
	IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_perimtr) as cmpwall_perimtr,
    IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_length) as cmpwall_length,
    schoolnew_infra_detail.build_block_no,
    schoolnew_infra_detail.classrm_undr_constr,
    schoolnew_infra_detail.classrm_desk_studs,
    schoolnew_infra_detail.ramp_disable_child,
    schoolnew_infra_detail.ramp_handrail,
    schoolnew_infra_detail.staffquarter,
    schoolnew_infra_detail.fulltime_lib,
    schoolnew_infra_detail.news_subscribe,
	(CASE WHEN schoolnew_infra_detail.classrm_desk_studs=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studss,
	(CASE WHEN schoolnew_infra_detail.ramp_disable_child=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_child,
	(CASE WHEN schoolnew_infra_detail.ramp_handrail=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrail,
	IF(schoolnew_infra_detail.staffquarter=1,schoolnew_infra_detail.rooms_staffquartrs,'N/A') AS rooms_staffquartrs,
	(CASE WHEN schoolnew_infra_detail.fulltime_lib=1 THEN 'YES' ELSE 'NO' END) AS fulltime_lib,
	(CASE WHEN schoolnew_infra_detail.news_subscribe=1 THEN 'YES' ELSE 'NO' END) AS news_subscribe,

        schoolnew_infra_detail.toil_gents_tot,
        schoolnew_infra_detail.toil_ladies_tot,
        schoolnew_infra_detail.urinal_gents_tot,
        schoolnew_infra_detail.urinals_tot_ladies,

        schoolnew_infra_detail.toil_bys_inuse,
        schoolnew_infra_detail.toil_notuse_bys,
        schoolnew_infra_detail.toil_nonfunc_bys,
        (CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=4 THEN 'N/A' END END END END) AS toil_nonfunc_byss,
                    
        schoolnew_infra_detail.toil_inuse_grls,
        schoolnew_infra_detail.toil_notuse_grls,
        schoolnew_infra_detail.toil_reasn_grls,
        (CASE WHEN schoolnew_infra_detail.toil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_reasn_grls=4 THEN 'N/A' END END END END) AS toil_reasn_grlss,

		schoolnew_infra_detail.cwsntoil_inuse_bys,
        schoolnew_infra_detail.cwsntoil_notuse_bys,
        schoolnew_infra_detail.cwsntoil_reasn_bys,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_byss,
        schoolnew_infra_detail.cwsntoil_inuse_grls,
        schoolnew_infra_detail.cwsntoil_notuse_grls,
        schoolnew_infra_detail.cwsntoil_reasn_grls,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grlss,
        schoolnew_infra_detail.urinls_inuse_bys,
        schoolnew_infra_detail.urinls_notuse_bys,
        schoolnew_infra_detail.urinls_reasn_bys,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=4 THEN 'N/A' END END END END) AS urinls_reasn_byss,
                    
        schoolnew_infra_detail.urinls_inuse_grls,
        schoolnew_infra_detail.urinls_notuse_grls,
        schoolnew_infra_detail.urinls_reasn_grls,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=4 THEN 'N/A' END END END END) AS urinls_reasn_grlss,
		schoolnew_infra_detail.toil_waterfac_bys,
        schoolnew_infra_detail.toil_waterfac_grls,
        schoolnew_infra_detail.urinls_waterfac_bys,
        schoolnew_infra_detail.urinls_waterfac_grls,
        schoolnew_infra_detail.toil_sanit_wrks,
        (CASE WHEN schoolnew_infra_detail.toil_sanit_wrks=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrkss,
        schoolnew_infra_detail.toil_land_avail,
        schoolnew_infra_detail.napkin_incin,
        schoolnew_infra_detail.incinerator,
        
        IF(schoolnew_infra_detail.toil_land_avail=1,schoolnew_infra_detail.toil_land_avail_sqft,'NO') AS toil_land_avail,
        
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_avail_no,
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_avail_no,'N/A') AS inci_auto_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_func_no,'N/A') AS inci_auto_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_avail_no,'N/A') AS inci_man_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_func_no,'N/A') AS inci_man_func_no,
        
        schoolnew_infra_detail.tot_handwash_bys,
        schoolnew_infra_detail.tot_handwash_grls,
        schoolnew_infra_detail.drnkwater_avail,
        schoolnew_infra_detail.drnkwater_source,
        schoolnew_infra_detail.drnkwater_othsource,
        schoolnew_infra_detail.well_top,
        IF(schoolnew_infra_detail.drnkwater_avail=1,
        (CASE WHEN schoolnew_infra_detail.drnkwater_source=1 THEN 'HAND PUMPS' ELSE
			CASE WHEN schoolnew_infra_detail.drnkwater_source=2 THEN 'WELL' ELSE
				CASE WHEN schoolnew_infra_detail.drnkwater_source=3 THEN 'TAP WATER' ELSE
					CASE WHEN schoolnew_infra_detail.drnkwater_source=4 THEN 'RO PURIFIER' ELSE
						CASE WHEN schoolnew_infra_detail.drnkwater_source=5 THEN 'PACKAGED/BOTTELED' ELSE
							CASE WHEN schoolnew_infra_detail.drnkwater_source=-1 THEN CONCAT('OTHERS - ',schoolnew_infra_detail.drnkwater_othsource) END END END END END END),'NO') AS drnkwater_avails,
                            
		IF(schoolnew_infra_detail.drnkwater_source=2,(CASE WHEN schoolnew_infra_detail.well_top=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_tops,
        
        water_test,
        
        overheadtank_avail,
        
        waterpuri_avail,
        
        schl_rainwtr_hrv,
        
        solar_panel,
        
        kitchen_garden,
        schoolnew_infra_detail.class_dustbin,
        (CASE WHEN schoolnew_infra_detail.class_dustbin=1 THEN 'YES' ELSE
			CASE WHEN schoolnew_infra_detail.class_dustbin=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.class_dustbin=2 THEN 'YES BUT SOME' END END END) AS class_dustbins,
             schoolnew_infra_detail.waste_toilets,   
		(CASE WHEN schoolnew_infra_detail.waste_toilets=1 THEN 'YES' ELSE
			CASE WHEN schoolnew_infra_detail.waste_toilets=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_toilets=2 THEN 'YES BUT SOME' END END END) AS waste_toiletss,
                schoolnew_infra_detail.waste_kitchen,
		(CASE WHEN schoolnew_infra_detail.waste_kitchen=1 THEN 'YES' ELSE
			CASE WHEN schoolnew_infra_detail.waste_kitchen=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_kitchen=2 THEN 'YES BUT SOME' END END END) AS waste_kitchens,
               schoolnew_academic_detail.cal, 
               schoolnew_academic_detail.clab,
               schoolnew_academic_detail.year_implmnt,
        (CASE WHEN schoolnew_academic_detail.cal=1 THEN 'YES' ELSE 'NO' END) AS cal,
        
        IF((schoolnew_academic_detail.clab=1 OR schoolnew_academic_detail.clab=3),CONCAT(
        (CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END),'-',schoolnew_academic_detail.year_implmnt),CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END) AS clabs,
                    schoolnew_academic_detail.ict_lab,
			(CASE WHEN schoolnew_academic_detail.ict_lab=1 THEN 'YES' ELSE 'NO' END) AS ict_labs,
            schoolnew_academic_detail.model_ict,
            (CASE WHEN schoolnew_academic_detail.model_ict=1 THEN 'BOOT MODEL' ELSE
				CASE WHEN schoolnew_academic_detail.model_ict=2 THEN 'BOO MODEL' ELSE
					CASE WHEN schoolnew_academic_detail.model_ict=3 THEN 'OTHER MODEL' END END END) AS model_icts,
			(CASE WHEN schoolnew_academic_detail.ict_type=1 THEN 'FULL TIME' ELSE
				CASE WHEN schoolnew_academic_detail.ict_type=2 THEN 'PART TIME' ELSE
					CASE WHEN schoolnew_academic_detail.ict_type=3 THEN 'NOT AVALIABLE' END END END) AS model_ict_type,
                    schoolnew_academic_detail.electricity,
                    
			(CASE WHEN schoolnew_academic_detail.electricity=1 THEN 'YES' ELSE
				CASE WHEN schoolnew_academic_detail.electricity=2 THEN 'NO' ELSE
					CASE WHEN schoolnew_academic_detail.electricity=3 THEN 'NOT FUNCTIONING' END END END) AS electricitys,
                    schoolnew_training_detail.med_ckup_lstyr,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,'YES','NO') AS med_ckup_lstyrs,
            
			IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_1 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_1,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_1,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_2 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_2,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_2,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_3 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_3,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_3,

            deworm_tab,
			iron_folic,
	langandmed.medium_instruct as mediumetr,
    langandmed.lang_instruct as langetr,
    spl_edtor,
	stu_councel,
    IF(schoolnew_training_detail.sci_lab_sec=0,'NO',schoolnew_training_detail.tot_room) AS tot_room
FROM schoolnew_basicinfo
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_parliament ON schoolnew_parliament.id=schoolnew_basicinfo.parliament_id
JOIN schoolnew_assembly ON schoolnew_assembly.id=schoolnew_basicinfo.assembly_id
JOIN schoolnew_training_detail ON schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_textbook_detail ON schoolnew_textbook_detail.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT
			schoolnew_district.id as district_id,
			schoolnew_district.district_name,
			schoolnew_edn_dist_mas.id as edu_dist_id,
			schoolnew_edn_dist_mas.edn_dist_name as edu_dist_name,
			schoolnew_block.id as block_id,
			schoolnew_block.block_name
		FROM
			schoolnew_district
		JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
		JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.district_code=schoolnew_district.id
		JOIN schoolnew_block ON schoolnew_block.district_id=schoolnew_district.id AND schoolnew_edn_dist_block.block_id
		GROUP BY district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
) AS locationentry ON locationentry.district_id=schoolnew_basicinfo.district_id AND locationentry.edu_dist_id=schoolnew_basicinfo.edu_dist_id AND locationentry.block_id=schoolnew_basicinfo.block_id

JOIN (SELECT
		schoolnew_zone_type.zone_type,
		schoolnew_habitation_all.name as village_ward,
		schoolnew_localbody_all.name as village_munci,
		schoolnew_habitation_all.id as village_id
	FROM schoolnew_localbody_all
	JOIN schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
	JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
) AS localbodyall ON village_id=schoolnew_basicinfo.lb_habitation_id

JOIN (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
		JOIN schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
		JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
) AS schooldirectrate ON schooldirectrate.directid=schoolnew_basicinfo.sch_directorate_id

JOIN (SELECT * FROM schoolnew_type) as schoolnew_type ON schoolnew_type.id=schoolnew_academic_detail.scl_category
JOIN (SELECT medid,landesc.school_key_id,medium_instruct,langid,lang_instruct FROM
			(SELECT schoolnew_mediumentry.id as medid,schoolnew_mediumentry.school_key_id,
				schoolnew_mediumofinstruction.MEDINSTR_DESC AS medium_instruct
			FROM schoolnew_mediumofinstruction
			JOIN schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=schoolnew_mediumofinstruction.MEDINSTR_ID) AS meddesc
		JOIN (SELECT schoolnew_langtaught_entry.id as langid,schoolnew_langtaught_entry.school_key_id,
					schoolnew_mediumofinstruction.MEDINSTR_DESC AS lang_instruct
				FROM schoolnew_mediumofinstruction
				JOIN schoolnew_langtaught_entry ON schoolnew_langtaught_entry.lang_taught=schoolnew_mediumofinstruction.MEDINSTR_ID
) as landesc ON landesc.school_key_id=meddesc.school_key_id) AS langandmed ON langandmed.school_key_id=schoolnew_basicinfo.school_id

LEFT JOIN (SELECT * FROM schoolnew_resitype) as schoolnew_resitype ON schoolnew_resitype.RESITYPE_ID=schoolnew_academic_detail.typ_resid_schl
LEFT JOIN schoolnew_safety_details ON schoolnew_safety_details.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=".$schoolid.";";
    echo($SQL);die("NewFunction");
        $query = $this->db->query($SQL);
		return $query->result_array();
    }*/
    
    function getSchoolProfileData($schoolid){
        
    /**Query Changed by wesley**/

    $SQL="SELECT DISTINCTROW
    schoolnew_basicinfo.udise_code,
    schoolnew_basicinfo.school_name,
    schoolnew_basicinfo.panchayat_id,
    schoolnew_basicinfo.municipal_id,
    schoolnew_basicinfo.city_id,
    schoolnew_basicinfo.corr_name,
    
    schoolnew_basicinfo.district_id,
    schoolnew_basicinfo.edu_dist_id,
    schoolnew_basicinfo.block_id,
    schoolnew_basicinfo.manage_cate_id,
    schoolnew_basicinfo.sch_management_id,
    schoolnew_basicinfo.sch_cate_id,
    schoolnew_basicinfo.sch_directorate_id,
    schoolnew_basicinfo.local_body_id,
    schoolnew_basicinfo.lb_vill_town_muni,
    schoolnew_basicinfo.lb_habitation_id,
    (select clus_name from schoolnew_cluster_mas where clus_code=schoolnew_basicinfo.cluster_id) as cluster_name,
    schoolnew_basicinfo.cluster_id,
    schoolnew_basicinfo.assembly_id,
    schoolnew_basicinfo.parliament_id,
    schoolnew_basicinfo.address,
    
    locationentry.district_name,
    locationentry.edu_dist_name,
    locationentry.block_name,
    schoolnew_basicinfo.pincode,schoolnew_basicinfo.latitude,schoolnew_basicinfo.longitude,
    
    (CASE WHEN schoolnew_basicinfo.urbanrural=2 THEN 'URBAN' ELSE
    CASE WHEN schoolnew_basicinfo.urbanrural=1 THEN 'RURAL' END END) AS urbanrurals,
    urbanrural,
    
    zone_type,village_ward,village_ward as municipal_name,village_munci,village_munci as lb_vill_town_muni_name,schoolnew_assembly.assembly_name,schoolnew_parliament.parli_name,
    manage_name,schooldirectrate.management,department,
    schoolnew_basicinfo.office_mobile,
    schoolnew_basicinfo.corr_mobile,
    schoolnew_basicinfo.sch_email,
    schoolnew_basicinfo.website,
    schoolnew_basicinfo.office_std_code,
    schoolnew_basicinfo.corr_std_code,
    (SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.office_std_code) as office_std_codes,
    schoolnew_basicinfo.office_landline AS office_landline,
    (SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.corr_std_code) as corr_std_codes,
    schoolnew_basicinfo.corr_landlline AS corr_landlline,
    schoolnew_sectionbyclass.pre_pri_sec,
    schoolnew_sectionbyclass.class1_sec,
    schoolnew_sectionbyclass.class2_sec,
    schoolnew_sectionbyclass.class3_sec,
    schoolnew_sectionbyclass.class4_sec,
    schoolnew_sectionbyclass.class5_sec,
    schoolnew_sectionbyclass.class6_sec,
    schoolnew_sectionbyclass.class7_sec,
    schoolnew_sectionbyclass.class8_sec,
    schoolnew_sectionbyclass.class9_sec,
    schoolnew_sectionbyclass.class10_sec,
    schoolnew_sectionbyclass.class11_sec,
    schoolnew_sectionbyclass.class12_sec,
    
    schoolnew_inventory_facility.lap_nbook_avail,
    schoolnew_inventory_facility.lap_nbook_tot,
    schoolnew_inventory_facility.lap_nbook_func,
    schoolnew_inventory_facility.tablet_avail,
    schoolnew_inventory_facility.tablet_tot,
    schoolnew_inventory_facility.tablet_func,
    schoolnew_inventory_facility.dcomp_avail,
    schoolnew_inventory_facility.dcomp_tot,
    schoolnew_inventory_facility.dcomp_func,
    schoolnew_inventory_facility.PC_avail,
    schoolnew_inventory_facility.PC_tot,
    schoolnew_inventory_facility.PC_func,
    schoolnew_inventory_facility.DB_avail,
    schoolnew_inventory_facility.DB_LMS_tot,
    schoolnew_inventory_facility.DB_func,
    schoolnew_inventory_facility.server_avail,
    schoolnew_inventory_facility.server_tot,
    schoolnew_inventory_facility.server_func,
    schoolnew_inventory_facility.projtr_avail,
    schoolnew_inventory_facility.projtr_tot,
    schoolnew_inventory_facility.projtr_func,
    schoolnew_inventory_facility.scnr_avail,
    schoolnew_inventory_facility.scnr_tot,
    schoolnew_inventory_facility.scnr_func,
    schoolnew_inventory_facility.webcam_avail,
    schoolnew_inventory_facility.webcam_tot,
    schoolnew_inventory_facility.webcam_func,
    schoolnew_inventory_facility.printr_avail,
    schoolnew_inventory_facility.printr_tot,
    schoolnew_inventory_facility.printr_func,
    schoolnew_inventory_facility.gnrtr_invups_avail,
    schoolnew_inventory_facility.gnrtr_invups_tot,
    schoolnew_inventory_facility.gnrtr_invups_func,
    schoolnew_inventory_facility.intrntfac_avail,
    schoolnew_inventory_facility.intrntfac_tot,
    schoolnew_inventory_facility.intrntfac_func,
    schoolnew_inventory_facility.dth_antna_avail,
    schoolnew_inventory_facility.dth_antna_tot,
    schoolnew_inventory_facility.dth_antna_func,
    schoolnew_inventory_facility.econtnt_dig_avail,
    schoolnew_inventory_facility.econtnt_dig_tot,
    schoolnew_inventory_facility.econtnt_dig_func,
    schoolnew_inventory_facility.lab_rm_avail,
    schoolnew_inventory_facility.lab_prsnt_cond,
    schoolnew_inventory_facility.phy_rm_avail,
    schoolnew_inventory_facility.phy_prsnt_cond,
    schoolnew_inventory_facility.chem_rm_avail,
    schoolnew_inventory_facility.chem_prsnt_cond,
    schoolnew_inventory_facility.bio_rm_avail,
    schoolnew_inventory_facility.bio_prsnt_cond,
    schoolnew_inventory_facility.math_rm_avail,
    schoolnew_inventory_facility.math_prsnt_cond,
    schoolnew_inventory_facility.lang_rm_avail,
    schoolnew_inventory_facility.lang_prsnt_cond,
    schoolnew_inventory_facility.geo_rm_avail,
    schoolnew_inventory_facility.geo_prsnt_cond,
    schoolnew_inventory_facility.hom_scnrm_avail,
    schoolnew_inventory_facility.hom_scnprsnt_cond,
    schoolnew_inventory_facility.psy_rm_avail,
    schoolnew_inventory_facility.psy_prsnt_cond,
    schoolnew_inventory_facility.equ_fac_avail,
    schoolnew_inventory_facility.aud_visfac_avail,
    schoolnew_inventory_facility.scien_fac_avail,
    schoolnew_inventory_facility.math_fac_avail,
    schoolnew_inventory_facility.bio_fac_avail,
    schoolnew_inventory_facility.lcd_led_plas_avail,
    schoolnew_inventory_facility.lcd_led_plas_tot,
    schoolnew_inventory_facility.lcd_led_plas_func,
    schoolnew_inventory_facility.asst_CWSN_avail,
    schoolnew_inventory_facility.asst_CWSN_tot,
    schoolnew_inventory_facility.asst_CWSN_func,
    
    
    
    
    
    
    schoolnew_academic_detail.shftd_schl,
    schoolnew_academic_detail.hill_frst,
    RESITYPE_DESC,
    schoolnew_academic_detail.yr_estd_schl,
    schoolnew_academic_detail.resid_schl,
    schoolnew_academic_detail.typ_resid_schl,
    schoolnew_academic_detail.cwsn_scl,
    schoolnew_academic_detail.yr_rec_schl_elem,
    schoolnew_academic_detail.yr_rec_schl_sec,
    schoolnew_academic_detail.yr_rec_schl_hsc,
    schoolnew_academic_detail.yr_recgn_first,
    schoolnew_academic_detail.yr_last_renwl,
    schoolnew_academic_detail.certifi_no,
    schoolnew_academic_detail.scl_category,
    schoolnew_academic_detail.yr_recogn_schl,
    schoolnew_academic_detail.upgrad_prito_uprpri,
    schoolnew_academic_detail.upgrad_uprprito_sec,
    schoolnew_academic_detail.upgrad_secto_higsec,
    schoolnew_type.category_name as schooltypescl_category,
    schoolnew_category.category_name,
    schoolnew_academic_detail.board_sec,
    schoolnew_academic_detail.board_sec_no,
    schoolnew_academic_detail.board_sec_oth,
    schoolnew_academic_detail.board_hsec,
    schoolnew_academic_detail.board_hsec_no,
    schoolnew_academic_detail.board_hsec_oth,
    schoolnew_academic_detail.school_type,
    schoolnew_academic_detail.yr_upgradprito_uprpri,
    schoolnew_academic_detail.yr_upgraduprprito_sec,
    schoolnew_academic_detail.yr_upgradsecto_higsec,
    schoolnew_academic_detail.rte_25p_applied,
    schoolnew_academic_detail.rte_25p_enrolled,
    schoolnew_academic_detail.rte_pvt_c1_b,
    schoolnew_academic_detail.rte_pvt_c1_g,
    schoolnew_academic_detail.rte_pvt_c2_b,
    schoolnew_academic_detail.rte_pvt_c2_g,
    schoolnew_academic_detail.rte_pvt_c3_b,
    schoolnew_academic_detail.rte_pvt_c3_g,
    schoolnew_academic_detail.rte_pvt_c4_b,
    schoolnew_academic_detail.rte_pvt_c4_g,
    schoolnew_academic_detail.rte_pvt_c5_b,
    schoolnew_academic_detail.rte_pvt_c5_g,
    schoolnew_academic_detail.rte_pvt_c6_b,
    schoolnew_academic_detail.rte_pvt_c6_g,
    schoolnew_academic_detail.rte_pvt_c7_b,
    schoolnew_academic_detail.rte_pvt_c7_g,
    schoolnew_academic_detail.rte_pvt_c8_b,
    schoolnew_academic_detail.rte_pvt_c8_g,
    schoolnew_academic_detail.rte_bld_c0_b,
    schoolnew_academic_detail.rte_bld_c0_g,
    schoolnew_academic_detail.rte_bld_c1_b,
    schoolnew_academic_detail.rte_bld_c1_g,
    schoolnew_academic_detail.rte_bld_c2_b,
    schoolnew_academic_detail.rte_bld_c2_g,
    schoolnew_academic_detail.rte_bld_c3_b,
    schoolnew_academic_detail.rte_bld_c3_g,
    schoolnew_academic_detail.rte_bld_c4_b,
    schoolnew_academic_detail.rte_bld_c4_g,
    schoolnew_academic_detail.rte_bld_c5_b,
    schoolnew_academic_detail.rte_bld_c5_g,
    schoolnew_academic_detail.rte_bld_c6_b,
    schoolnew_academic_detail.rte_bld_c6_g,
    schoolnew_academic_detail.rte_bld_c7_b,
    schoolnew_academic_detail.rte_bld_c7_g,
    schoolnew_academic_detail.rte_bld_c8_b,
    schoolnew_academic_detail.rte_bld_c8_g,
    schoolnew_academic_detail.rte_ews_c9_b,
    schoolnew_academic_detail.rte_ews_c9_g,
    schoolnew_academic_detail.rte_ews_c10_b,
    schoolnew_academic_detail.rte_ews_c10_g,
    schoolnew_academic_detail.rte_ews_c11_b,
    schoolnew_academic_detail.rte_ews_c11_g,
    schoolnew_academic_detail.rte_ews_c12_b,
    schoolnew_academic_detail.rte_ews_c12_g,
    schoolnew_academic_detail.txtbk_recd_yn,
    schoolnew_academic_detail.txtbk_recd_mon,
    
    acad_mnth_start,
    schoolnew_academic_detail.low_class,
    schoolnew_academic_detail.high_class,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.low_class)
    as low_classes,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.high_class)
    as high_classes,
    
    (CASE WHEN (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp)
    IS NULL THEN 'NO'
    ELSE CASE WHEN schoolnew_academic_detail.minority_grp=13 THEN CONCAT((SELECT minority FROM schoolnew_minority WHERE
    schoolnew_minority.id=schoolnew_academic_detail.minority_grp),' - ',schoolnew_academic_detail.minority_other) ELSE
    (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) END END) AS
    minority_grps,
    schoolnew_academic_detail.minority_grp,
    (CASE WHEN schoolnew_academic_detail.minority_sch=1 THEN schoolnew_academic_detail.minority_yr ELSE 'NO' END) AS
    minority_yrs,
    schoolnew_academic_detail.minority_sch,
    schoolnew_academic_detail.minority_yr,
    schoolnew_infra_detail.road_connect,
    schoolnew_infra_detail.distance_road,
    schoolnew_infra_detail.weather_roads,
    schoolnew_infra_detail.land_exp_scl,
    schoolnew_infra_detail.clsrms_dptd,
    schoolnew_infra_detail.toil_handwash_soap,
    schoolnew_infra_detail.handwash_meal_yn,
    (CASE WHEN schoolnew_infra_detail.road_connect=1 THEN CONCAT('Kutcha Road',' - ',schoolnew_infra_detail.distance_road,'
    mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=2 THEN CONCAT('Partial Pucca Road',' -
    ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=3 THEN CONCAT('No Road',' - ',schoolnew_infra_detail.distance_road,' mts')
    ELSE
    CASE WHEN (schoolnew_infra_detail.road_connect=NULL OR schoolnew_infra_detail.road_connect=2 OR
    schoolnew_infra_detail.road_connect IS NULL) THEN 'N/A' END
    END END END) AS weather_roadss,
    schoolnew_training_detail.special_train,
    schoolnew_training_detail.train_prov_boys,
    schoolnew_training_detail.train_prov_grls,
    schoolnew_training_detail.train_cond_in,
    schoolnew_training_detail.train_type,
    schoolnew_training_detail.train_cond_by,
    schoolnew_training_detail.train_cond_in,
    schoolnew_training_detail.boarding_pri_yn,
    schoolnew_training_detail.boarding_pri_b,
    schoolnew_training_detail.boarding_pri_g,
    schoolnew_training_detail.boarding_upr_yn,
    schoolnew_training_detail.boarding_upr_b,
    schoolnew_training_detail.boarding_upr_g,
    schoolnew_training_detail.boarding_sec_yn,
    schoolnew_training_detail.boarding_sec_b,
    schoolnew_training_detail.boarding_sec_g,
    schoolnew_training_detail.boarding_hsec_yn,
    schoolnew_training_detail.boarding_hsec_b,
    schoolnew_training_detail.boarding_hsec_g,
    
    schoolnew_training_detail.spltrg_py_enrol_b,
    schoolnew_training_detail.spltrg_py_enrol_g,
    schoolnew_training_detail.spltrg_py_prov_b,
    schoolnew_training_detail.spltrg_py_prov_g,
    schoolnew_training_detail.remedial_tch_enrol,
    schoolnew_training_detail.grd1_samescl_b,
    schoolnew_training_detail.grd1_samescl_g,
    schoolnew_training_detail.grd1_othscl_b,
    schoolnew_training_detail.grd1_othscl_g,
    schoolnew_training_detail.grd1_angan_b,
    schoolnew_training_detail.grd1_angan_g,
    schoolnew_training_detail.anganwadi_schl,

    schoolnew_training_detail.anganwadi_stu_b,
    schoolnew_training_detail.anganwadi_stu_g,
    
    
    
    
    
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_boys,'NO') AS train_prov_boyss,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_grls,'NO') AS train_prov_grlss,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_by=1 THEN 'SCHOOL TEACHERS'
    ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=2 THEN 'SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=3 THEN 'BOTH SCHOOL & SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=4 THEN 'NGO' END END END END),'NO') AS train_cond_bys,
    
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_in=1 THEN 'SCHOOL PREMISES'
    ELSE
    CASE WHEN schoolnew_training_detail.train_cond_in=2 THEN 'OTHER THAN SCHOOL PREMISES' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_in=3 THEN 'BOTH SCHOOL AND OTHER PREMISES' END END END),'N/A') AS
    train_cond_ins,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_type=1 THEN 'RESIDENTIAL' ELSE
    CASE WHEN schoolnew_training_detail.train_type=2 THEN 'NON-RESIDENTIAL' ELSE
    CASE WHEN schoolnew_training_detail.train_type=3 THEN 'BOTH RESIDENTIAL AND NON-RESIDENTIAL' END END END),'N/A') AS
    train_types,anganwadi,
    
    (CASE WHEN schoolnew_training_detail.anganwadi=1 THEN 'YES' ELSE 'NO' END) AS anganwadis,
    IF(schoolnew_training_detail.anganwadi=1,angan_childs,'N/A') AS angan_childs,
    IF(schoolnew_training_detail.anganwadi=1,angan_wrks,'N/A') AS angan_wrks,
    schoolnew_training_detail.anganwadi_center,
    schoolnew_training_detail.anganwadi_train,
    (CASE WHEN schoolnew_training_detail.anganwadi_train=1 THEN 'YES' ELSE 'NO' END) AS anganwadi_trains,
    
    (CASE WHEN schoolnew_safety_details.sdmp_dev=1 THEN 'YES' ELSE 'NO' END) AS sdmp_devs,
    (CASE WHEN schoolnew_safety_details.sturct_saf=1 THEN 'YES' ELSE 'NO' END) AS sturct_safs,
    (CASE WHEN schoolnew_safety_details.nonsturct_saf=1 THEN 'YES' ELSE 'NO' END) AS nonsturct_safs,
    (CASE WHEN schoolnew_safety_details.cctv_school=1 THEN 'YES' ELSE 'NO' END) AS cctv_schools,
    (CASE WHEN schoolnew_safety_details.firext_schl=1 THEN 'YES' ELSE 'NO' END) AS firext_schls,
    (CASE WHEN schoolnew_safety_details.nodtchr_schlsaf=1 THEN 'YES' ELSE 'NO' END) AS nodtchr_schlsafs,
    (CASE WHEN schoolnew_safety_details.dister_trng=1 THEN 'YES' ELSE 'NO' END) AS dister_trngs,
    (CASE WHEN schoolnew_safety_details.dister_part=1 THEN 'YES' ELSE 'NO' END) AS dister_parts,
    (CASE WHEN schoolnew_safety_details.slfdfse_trng=1 THEN schoolnew_safety_details.noslfdfse_trng ELSE 'NO' END) AS
    slfdfse_trngs,
    (CASE WHEN schoolnew_committee_detail.suppliment_prevousyr=1 THEN 'YES' ELSE 'NO' END) AS suppliment_prevousyrs,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=3 THEN 'NOT APPLICABLE' END
    END END) AS txtbk_curyr_prepris,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=3 THEN 'NOT APPLICABLE' END
    END END) AS txtbk_curyr_pris,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=3 THEN 'NOT APPLICABLE' END
    END END) AS txtbk_curyr_upps,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=3 THEN 'NOT APPLICABLE' END
    END END) AS txtbk_curyr_secs,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=3 THEN 'NOT APPLICABLE' END
    END END) AS txtbk_curyr_hsecs,
    
    (CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=3 THEN 'NOT APPLICABLE' END
    END END) AS tle_grade_preprims,
    (CASE WHEN schoolnew_textbook_detail.tle_grade_prim=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grade_prim=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grade_prim=3 THEN 'NOT APPLICABLE' END
    END END) AS tle_grade_prims,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_upp=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_upp=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_upp=3 THEN 'NOT APPLICABLE' END
    END END) AS tle_grde_upps,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_sec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_sec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_sec=3 THEN 'NOT APPLICABLE' END
    END END) AS tle_grde_secs,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=3 THEN 'NOT APPLICABLE' END
    END END) AS tle_grde_hsecs,
    
    (CASE WHEN schoolnew_textbook_detail.sports_prepri=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_prepri=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_prepri=3 THEN 'NOT APPLICABLE' END
    END END) AS sports_prepris,
    (CASE WHEN schoolnew_textbook_detail.sports_pri=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_pri=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_pri=3 THEN 'NOT APPLICABLE' END
    END END) AS sports_pris,
    (CASE WHEN schoolnew_textbook_detail.sports_upp=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_upp=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_upp=3 THEN 'NOT APPLICABLE' END
    END END) AS sports_upps,
    (CASE WHEN schoolnew_textbook_detail.sports_sec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_sec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_sec=3 THEN 'NOT APPLICABLE' END
    END END) AS sports_secs,
    (CASE WHEN schoolnew_textbook_detail.sports_hsec=1 THEN 'YES' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_hsec=2 THEN 'NO' ELSE
    CASE WHEN schoolnew_textbook_detail.sports_hsec=3 THEN 'NOT APPLICABLE' END
    END END) AS sports_hsecs,
    (CASE WHEN smc_const=1 THEN 'YES' ELSE 'NO' END) AS smc_consts,
    
    
    
    
    schoolnew_safety_details.sdmp_dev,
    schoolnew_safety_details.sturct_saf,
    schoolnew_safety_details.nonsturct_saf,
    schoolnew_safety_details.cctv_school,
    schoolnew_safety_details.firext_schl,
    schoolnew_safety_details.nodtchr_schlsaf,
    schoolnew_safety_details.dister_trng,
    schoolnew_safety_details.dister_part,
    schoolnew_safety_details.slfdfse_trng,
    schoolnew_safety_details.noslfdfse_trng,
    schoolnew_safety_details.guidline_disply_brd,
    schoolnew_safety_details.grnt_frstlvl_conslrs,
    schoolnew_safety_details.guidlins_counsling,
    schoolnew_safety_details.sensitiz_parnts,
    
    schoolnew_safety_details.awrnss_studscomm,
    schoolnew_safety_details.studs_feedbck,
    schoolnew_safety_details.safty_sugstn,
    schoolnew_safety_details.copies_studs,
    
    
    schoolnew_textbook_detail.txtbk_curyr_prepri,
    schoolnew_textbook_detail.txtbk_curyr_pri,
    schoolnew_textbook_detail.txtbk_curyr_upp,
    schoolnew_textbook_detail.txtbk_curyr_sec,
    schoolnew_textbook_detail.txtbk_curyr_hsec,
    schoolnew_textbook_detail.tle_grade_preprim,
    schoolnew_textbook_detail.tle_grade_prim,
    schoolnew_textbook_detail.tle_grde_upp,
    schoolnew_textbook_detail.tle_grde_sec,
    schoolnew_textbook_detail.tle_grde_hsec,
    schoolnew_textbook_detail.sports_prepri,
    schoolnew_textbook_detail.sports_pri,
    schoolnew_textbook_detail.sports_upp,
    schoolnew_textbook_detail.sports_sec,
    schoolnew_textbook_detail.sports_hsec,
    schoolnew_committee_detail.suppliment_prevousyr,
    schoolnew_committee_detail.smc_const,
    schoolnew_committee_detail.smc_tch_m,
    schoolnew_committee_detail.smc_tch_f,
    schoolnew_committee_detail.smc_trained_m,
    schoolnew_committee_detail.smc_trained_f,
    schoolnew_committee_detail.smdc_smc_same_yn,
    schoolnew_committee_detail.smc_par_sc,
    schoolnew_committee_detail.smc_par_st,
    schoolnew_committee_detail.smc_par_ews,
    schoolnew_committee_detail.smc_par_min,
    schoolnew_committee_detail.smdc_par_ews_m,
    schoolnew_committee_detail.smdc_par_ews_f,
    schoolnew_committee_detail.smdc_trained_m,
    schoolnew_committee_detail.smdc_trained_f,
    schoolnew_committee_detail.smdcparents_belong,
    schoolnew_committee_detail.smdcparents_belong,
    
    schoolnew_committee_detail.smc_sep_bnkacc,
    schoolnew_committee_detail.smc_ifsc,
    schoolnew_committee_detail.smc_bnk_brnch,
    schoolnew_committee_detail.smdc_bnk_brnch,
    schoolnew_committee_detail.smdc_ifsc,
    schoolnew_committee_detail.smc_bnk_nme,
    schoolnew_committee_detail.smdc_bnk_name,
    schoolnew_committee_detail.smc_acc_no,
    schoolnew_committee_detail.smc_acc_name,
    
    
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_no,'N/A') as smc_acc_nos,
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_name,'N/A') as smc_acc_names,
    IF(smc_const=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smc_bnk_brnch),'N/A') as smc_bank,
        IF(smc_const=1,schoolnew_committee_detail.smc_chair_name,'N/A') AS smc_chair_name,
        IF(smc_const=1,schoolnew_committee_detail.smc_chair_mble,'N/A') AS smc_chair_mble,
        IF(smc_const=1,schoolnew_committee_detail.smc_tot_mle,'N/A') AS smc_tot_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_tot_fmle,'N/A') AS smc_tot_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_prnts_mle,'N/A') AS smc_prnts_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_prnts_fmle,'N/A') AS smc_prnts_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_rep_mle,'N/A') AS smc_rep_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_rep_fmle,'N/A') AS smc_rep_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_weakr_mle,'N/A') AS smc_weakr_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_weakr_fmle,'N/A') AS smc_weakr_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_no_prev_acyr,'N/A') AS smc_no_prev_acyr,
        IF(smc_const=1,schoolnew_committee_detail.smc_const_yr,'N/A') AS smc_const_yr,
        schoolnew_committee_detail.smc_sdp,schoolnew_committee_detail.smdc_constitu,
        (CASE WHEN schoolnew_committee_detail.smc_sdp=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_committee_detail.smc_sdp=2 THEN 'NO' ELSE '(NO-DATA FOUND)' END END) AS smc_sdps,
    
        (CASE WHEN schoolnew_committee_detail.smdc_constitu=1 THEN 'YES' ELSE 'NO' END) AS smdc_constitus,
        schoolnew_committee_detail.smdc_sep_bnkacc,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_name,'N/A') as smdc_acc_name,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_no,'N/A') as smdc_acc_no,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smdc_bnk_brnch),'N/A') as smdc_bank,
    
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_mle,'N/A') as smdc_tot_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_fmle,'N/A') as smdc_tot_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_mle,'N/A') as smdc_parnt_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_fmle,'N/A') as smdc_parnt_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_mle,'N/A') as smdc_lb_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_fmle,'N/A') as smdc_lb_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_mle,'N/A') as smdc_minori_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_fmle,'N/A') as smdc_minori_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_women,'N/A') as smdc_women,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_mle,'N/A') as smdc_scst_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_fmle,'N/A') as smdc_scst_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_mle,'N/A') as smdc_deo_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_fmle,'N/A') as smdc_deo_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_mle,'N/A') as smdc_audit_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_fmle,'N/A') as smdc_audit_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_mle,'N/A') as smdc_exprt_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_fmle,'N/A') as smdc_exprt_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_mle,'N/A') as smdc_techrs_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_fmle,'N/A') as smdc_techrs_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_mle,'N/A') as smdc_hm_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_fmle,'N/A') as smdc_hm_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_mle,'N/A') as smdc_prnci_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_fmle,'N/A') as smdc_prnci_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mle,'N/A') as smdc_chair_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_fmle,'N/A') as smdc_chair_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_const_yr,'N/A') as smdc_const_yr,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_no_last_acyr,'N/A') as smdc_no_last_acyr,
        schoolnew_committee_detail.smdc_sip,
    
        (CASE WHEN schoolnew_committee_detail.smdc_sip=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_committee_detail.smdc_sip=2 THEN 'NO' ELSE 'N/A' END END) AS smdc_sips,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_contrib_amt,'N/A') as smdc_contrib_amt,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_name,'N/A') as smdc_chair_name,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mble,'N/A') as smdc_chair_mble,
        schoolnew_committee_detail.sbc_const,schoolnew_committee_detail.sbc_const_year,
    
        IF(schoolnew_committee_detail.sbc_const=1,schoolnew_committee_detail.sbc_const_year,'NO') as sbc_consts,
        schoolnew_committee_detail.acadecomm_const,schoolnew_committee_detail.acadecomm_year,
        IF(schoolnew_committee_detail.acadecomm_const=1,schoolnew_committee_detail.acadecomm_year,'NO') as acadecomm_consts,
        schoolnew_committee_detail.pta_const,
        (CASE WHEN schoolnew_committee_detail.pta_const=1 THEN 'YES' ELSE 'NO' END) AS pta_consts,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_est_yr,'N/A') as pta_est_yr,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_no_curyr,'N/A') as pta_no_curyr,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_reg_no,'N/A') as pta_reg_no,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_subscri_amt,'N/A') as pta_subscri_amt,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_name,'N/A') as pta_chair_name,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_mble,'N/A') as pta_chair_mble,
        TRUNCATE((schoolnew_infra_detail.land_avail_sqft/43560),3) AS land_avail_acre,
        schoolnew_infra_detail.land_avail_sqft,
    
        schoolnew_infra_detail.play_facility,
        schoolnew_infra_detail.play_alt_arrang,
        schoolnew_infra_detail.play_address,
        schoolnew_infra_detail.dist_build_playgr,
        schoolnew_infra_detail.play_area_sqft,
        schoolnew_infra_detail.ramp_building_yn,
        schoolnew_infra_detail.tot_handwash_grls,
        schoolnew_infra_detail.toil_handwash_soap,
        IF(schoolnew_infra_detail.play_facility=1,TRUNCATE((schoolnew_infra_detail.play_area_sqft/43560),3),IF(schoolnew_infra_detail.play_alt_arrang=1,CONCAT(schoolnew_infra_detail.play_address,'<br>Distance:',schoolnew_infra_detail.dist_build_playgr),'N/A')) AS play_area_sqfts,
    
        -- IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area/43560),3),'N/A') AS play_land_area, - commented by wesley
        IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area),3),'N/A') AS play_land_area,
         schoolnew_infra_detail.land_ownersip,
        (CASE WHEN schoolnew_infra_detail.land_ownersip=1 THEN 'RENTED' ELSE
            CASE WHEN schoolnew_infra_detail.land_ownersip=2 THEN 'LEASED' ELSE
                CASE WHEN schoolnew_infra_detail.land_ownersip=3 THEN 'OWNED' ELSE
                    CASE WHEN schoolnew_infra_detail.land_ownersip=4 THEN 'RENTAL FREE' END END END END) AS land_ownersips,
    
        IF(schoolnew_infra_detail.land_ownersip=1,schoolnew_infra_detail.land_rent_amt,'N/A') AS land_rent_amt,
        IF(schoolnew_infra_detail.land_ownersip=2,schoolnew_infra_detail.land_lease_perid,'N/A') AS land_lease_perid,
        IF(schoolnew_infra_detail.land_ownersip=2,DATE_FORMAT(schoolnew_infra_detail.valid_upto,'%d/%m/%Y'),'N/A') AS valid_upto,
        schoolnew_infra_detail.cmpwall_type,
        schoolnew_infra_detail.cmpwall_perimtr,
        schoolnew_infra_detail.cmpwall_length,
    
        schoolnew_infra_detail.build_block_no,
        schoolnew_infra_detail.classrm_undr_constr,
        schoolnew_infra_detail.classrm_desk_studs,
        schoolnew_infra_detail.ramp_disable_child,
        schoolnew_infra_detail.ramp_handrail,
        schoolnew_infra_detail.staffquarter,
        schoolnew_infra_detail.fulltime_lib,
        schoolnew_infra_detail.news_subscribe,
    
        (CASE WHEN schoolnew_infra_detail.cmpwall_type=1 THEN 'PUCCA' ELSE
            CASE WHEN schoolnew_infra_detail.cmpwall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
                CASE WHEN schoolnew_infra_detail.cmpwall_type=3 THEN 'BARBED WIRE FENCING' ELSE
                    CASE WHEN schoolnew_infra_detail.cmpwall_type=4 THEN 'HEDGES' ELSE
                        CASE WHEN schoolnew_infra_detail.cmpwall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
                            CASE WHEN schoolnew_infra_detail.cmpwall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_types,
    
        IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_perimtr) as cmpwall_perimtrs,
        IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_length) as cmpwall_lengths,
    
        (CASE WHEN schoolnew_infra_detail.classrm_desk_studs=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studss,
        (CASE WHEN schoolnew_infra_detail.ramp_disable_child=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_childs,
        (CASE WHEN schoolnew_infra_detail.ramp_handrail=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrails,
        IF(schoolnew_infra_detail.staffquarter=1,schoolnew_infra_detail.rooms_staffquartrs,'N/A') AS rooms_staffquartrss,
        (CASE WHEN schoolnew_infra_detail.fulltime_lib=1 THEN 'YES' ELSE 'NO' END) AS fulltime_libs,
        (CASE WHEN schoolnew_infra_detail.news_subscribe=1 THEN 'YES' ELSE 'NO' END) AS news_subscribes,
    
            schoolnew_infra_detail.toil_gents_tot,
            schoolnew_infra_detail.toil_ladies_tot,
            schoolnew_infra_detail.urinal_gents_tot,
            schoolnew_infra_detail.urinals_tot_ladies,
    
            schoolnew_infra_detail.toil_bys_inuse,
            schoolnew_infra_detail.toil_notuse_bys,
            schoolnew_infra_detail.toil_nonfunc_bys,
    
            (CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=4 THEN 'N/A' END END END END) AS toil_nonfunc_byss,
            schoolnew_infra_detail.toil_inuse_grls,
            schoolnew_infra_detail.toil_notuse_grls,
            schoolnew_infra_detail.toil_reasn_grls,
    
            (CASE WHEN schoolnew_infra_detail.toil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.toil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.toil_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.toil_reasn_grls=4 THEN 'N/A' END END END END) AS toil_reasn_grlss,
    
            schoolnew_infra_detail.cwsntoil_inuse_bys,
            schoolnew_infra_detail.cwsntoil_notuse_bys,
            schoolnew_infra_detail.cwsntoil_reasn_bys,
    
            (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_byss,
    
    
            schoolnew_infra_detail.cwsntoil_inuse_grls,
            schoolnew_infra_detail.cwsntoil_notuse_grls,
            schoolnew_infra_detail.cwsntoil_reasn_grls,
    
            (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grlss,
            schoolnew_infra_detail.urinls_inuse_bys,
            schoolnew_infra_detail.urinls_notuse_bys,
            schoolnew_infra_detail.urinls_reasn_bys,
            (CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=4 THEN 'N/A' END END END END) AS urinls_reasn_byss,
            schoolnew_infra_detail.urinls_inuse_grls,
            schoolnew_infra_detail.urinls_notuse_grls,
            schoolnew_infra_detail.urinls_reasn_grls,
            (CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=4 THEN 'N/A' END END END END) AS urinls_reasn_grlss,
            schoolnew_infra_detail.toil_waterfac_bys,
            schoolnew_infra_detail.toil_waterfac_grls,
            schoolnew_infra_detail.urinls_waterfac_bys,
            schoolnew_infra_detail.urinls_waterfac_grls,
            schoolnew_infra_detail.toil_sanit_wrks,
            (CASE WHEN schoolnew_infra_detail.toil_sanit_wrks=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrkss,
    
            schoolnew_infra_detail.toil_land_avail,
            schoolnew_infra_detail.toil_land_avail_sqft,
    
            IF(schoolnew_infra_detail.toil_land_avail=1,schoolnew_infra_detail.toil_land_avail_sqft,'NO') AS toil_land_avails,
            schoolnew_infra_detail.napkin_incin,
            schoolnew_infra_detail.incinerator,
            IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_avail_no,
            IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_func_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_avail_no,'N/A') AS inci_auto_avail_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_func_no,'N/A') AS inci_auto_func_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_avail_no,'N/A') AS inci_man_avail_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_func_no,'N/A') AS inci_man_func_no,
            schoolnew_infra_detail.tot_handwash_bys,
            schoolnew_infra_detail.tot_handwash_grls,
            schoolnew_infra_detail.drnkwater_avail,
            schoolnew_infra_detail.drnkwater_source,
            schoolnew_infra_detail.drnkwater_othsource,
            schoolnew_infra_detail.well_top,
            schoolnew_infra_detail.toilet_yn,
            schoolnew_infra_detail.tot_handwash_pts,
    
            IF(schoolnew_infra_detail.drnkwater_avail=1,
            (CASE WHEN schoolnew_infra_detail.drnkwater_source=1 THEN 'HAND PUMPS' ELSE
                CASE WHEN schoolnew_infra_detail.drnkwater_source=2 THEN 'WELL' ELSE
                    CASE WHEN schoolnew_infra_detail.drnkwater_source=3 THEN 'TAP WATER' ELSE
                        CASE WHEN schoolnew_infra_detail.drnkwater_source=4 THEN 'RO PURIFIER' ELSE
                            CASE WHEN schoolnew_infra_detail.drnkwater_source=5 THEN 'PACKAGED/BOTTELED' ELSE
                                CASE WHEN schoolnew_infra_detail.drnkwater_source=-1 THEN CONCAT('OTHERS - ',schoolnew_infra_detail.drnkwater_othsource) END END END END END END),'NO') AS drnkwater_avails,
    
    
            IF(schoolnew_infra_detail.drnkwater_source=2,(CASE WHEN schoolnew_infra_detail.well_top=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_top,
    
            schoolnew_infra_detail.water_test,
            schoolnew_infra_detail.overheadtank_avail,
            schoolnew_infra_detail.waterpuri_avail,
            schoolnew_infra_detail.schl_rainwtr_hrv,
            schoolnew_infra_detail.solar_panel,
            schoolnew_infra_detail.kitchen_garden,
            schoolnew_infra_detail.class_dustbin,
            schoolnew_infra_detail.waste_toilets,
            schoolnew_infra_detail.waste_kitchen,
    
            IF(schoolnew_infra_detail.water_test=1,'YES','NO') AS water_tests,
            IF(schoolnew_infra_detail.overheadtank_avail=1,'YES','NO') AS overheadtank_avails,
            IF(schoolnew_infra_detail.waterpuri_avail=1,'YES','NO') AS waterpuri_avails,
            IF(schoolnew_infra_detail.schl_rainwtr_hrv=1,'YES','NO') AS schl_rainwtr_hrvs,
            IF(schoolnew_infra_detail.solar_panel=1,'YES','NO') AS solar_panels,
            IF(schoolnew_infra_detail.kitchen_garden=1,'YES','NO') AS kitchen_gardens,
    
    
            (CASE WHEN schoolnew_infra_detail.class_dustbin=1 THEN 'YES' ELSE
                CASE WHEN schoolnew_infra_detail.class_dustbin=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.class_dustbin=3 THEN 'YES BUT SOME' END END END) AS class_dustbins,
            (CASE WHEN schoolnew_infra_detail.waste_toilets=1 THEN 'YES' ELSE
                CASE WHEN schoolnew_infra_detail.waste_toilets=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.waste_toilets=3 THEN 'YES BUT SOME' END END END) AS waste_toiletss,
            (CASE WHEN schoolnew_infra_detail.waste_kitchen=1 THEN 'YES' ELSE
                CASE WHEN schoolnew_infra_detail.waste_kitchen=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.waste_kitchen=3 THEN 'YES BUT SOME' END END END) AS waste_kitchens,
    
                schoolnew_academic_detail.yr_upgradprito_uprpri,
                schoolnew_academic_detail.yr_upgraduprprito_sec,
                schoolnew_academic_detail.yr_upgradsecto_higsec,
                schoolnew_academic_detail.rte_pvt_c0_b,
                schoolnew_academic_detail.rte_pvt_c0_g,
                schoolnew_academic_detail.rte_pvt_c1_b,
                schoolnew_academic_detail.rte_pvt_c1_g,
                schoolnew_academic_detail.rte_pvt_c2_b,
                schoolnew_academic_detail.rte_pvt_c2_g,
                schoolnew_academic_detail.rte_pvt_c3_b,
                schoolnew_academic_detail.rte_pvt_c3_g,
                schoolnew_academic_detail.rte_pvt_c4_b,
                schoolnew_academic_detail.rte_pvt_c4_g,
                schoolnew_academic_detail.rte_pvt_c5_b,
                schoolnew_academic_detail.rte_pvt_c5_g,
                schoolnew_academic_detail.rte_pvt_c6_b,
                schoolnew_academic_detail.rte_pvt_c6_g,
                schoolnew_academic_detail.rte_pvt_c7_b,
                schoolnew_academic_detail.rte_pvt_c7_g,
                schoolnew_academic_detail.rte_pvt_c8_b,
                schoolnew_academic_detail.rte_pvt_c8_g,
                schoolnew_academic_detail.rte_bld_c0_b,
                schoolnew_academic_detail.rte_bld_c0_g,
                schoolnew_academic_detail.rte_bld_c1_b,
                schoolnew_academic_detail.rte_bld_c1_g,
                schoolnew_academic_detail.rte_bld_c2_b,
                schoolnew_academic_detail.rte_bld_c2_g,
                schoolnew_academic_detail.rte_bld_c3_b,
                schoolnew_academic_detail.rte_bld_c3_g,
                schoolnew_academic_detail.rte_bld_c4_b,
                schoolnew_academic_detail.rte_bld_c4_g,
                schoolnew_academic_detail.rte_bld_c5_b,
                schoolnew_academic_detail.rte_bld_c5_g,
                schoolnew_academic_detail.rte_bld_c6_b,
                schoolnew_academic_detail.rte_bld_c6_g,
                schoolnew_academic_detail.rte_bld_c7_b,
                schoolnew_academic_detail.rte_bld_c7_g,
                schoolnew_academic_detail.rte_bld_c8_b,
                schoolnew_academic_detail.rte_bld_c8_g,
                schoolnew_academic_detail.rte_ews_c9_b,
                schoolnew_academic_detail.rte_ews_c9_g,
                schoolnew_academic_detail.rte_ews_c10_b,
                schoolnew_academic_detail.rte_ews_c10_g,
                schoolnew_academic_detail.rte_ews_c11_b,
                schoolnew_academic_detail.rte_ews_c11_g,
                schoolnew_academic_detail.rte_ews_c12_b,
                schoolnew_academic_detail.rte_ews_c12_g,
                schoolnew_academic_detail.txtbk_recd_yn,
                schoolnew_academic_detail.txtbk_recd_mon,
    
    
    
                schoolnew_academic_detail.prevoc_course,
                schoolnew_academic_detail.mtongue_pri,
                schoolnew_academic_detail.distance_pri,
                schoolnew_academic_detail.distance_upr,
                schoolnew_academic_detail.distance_sec,
                schoolnew_academic_detail.distance_hsec,
                schoolnew_academic_detail.cal,
                   schoolnew_academic_detail.clab,
                   schoolnew_academic_detail.year_implmnt,
                   schoolnew_academic_detail.ict_lab,
                   schoolnew_academic_detail.model_ict,
                   schoolnew_academic_detail.ict_type,
    
            (CASE WHEN schoolnew_academic_detail.cal=1 THEN 'YES' ELSE 'NO' END) AS cals,
            IF((schoolnew_academic_detail.clab=1 OR schoolnew_academic_detail.clab=3),CONCAT(
            (CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
                CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
                    CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
                        CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END),'-',schoolnew_academic_detail.year_implmnt),CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
                CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
                    CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
                        CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END) AS clabs,
                (CASE WHEN schoolnew_academic_detail.ict_lab=1 THEN 'YES' ELSE 'NO' END) AS ict_labs,
                (CASE WHEN schoolnew_academic_detail.model_ict=1 THEN 'BOOT MODEL' ELSE
                    CASE WHEN schoolnew_academic_detail.model_ict=2 THEN 'BOO MODEL' ELSE
                        CASE WHEN schoolnew_academic_detail.model_ict=3 THEN 'OTHER MODEL' END END END) AS model_icts,
                (CASE WHEN schoolnew_academic_detail.ict_type=1 THEN 'FULL TIME' ELSE
                    CASE WHEN schoolnew_academic_detail.ict_type=2 THEN 'PART TIME' ELSE
                        CASE WHEN schoolnew_academic_detail.ict_type=3 THEN 'NOT AVALIABLE' END END END) AS model_ict_type,
    
                    schoolnew_academic_detail.electricity,
                (CASE WHEN schoolnew_academic_detail.electricity=1 THEN 'YES' ELSE
                    CASE WHEN schoolnew_academic_detail.electricity=2 THEN 'NO' ELSE
                        CASE WHEN schoolnew_academic_detail.electricity=3 THEN 'NOT FUNCTIONING' END END END) AS electricitys,
                    schoolnew_training_detail.med_ckup_lstyr,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,'YES','NO') AS med_ckup_lstyr,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_1 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_1,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_1,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_2 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_2,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_2,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_3 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_3,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_3,
                schoolnew_training_detail.deworm_tab,
                (CASE WHEN schoolnew_training_detail.deworm_tab=1 THEN 'COMPLETE TWO DOSE' ELSE
                    CASE WHEN schoolnew_training_detail.deworm_tab=2 THEN 'PARTIALLY ONE DOSE' ELSE
                        CASE WHEN schoolnew_training_detail.deworm_tab=3 THEN 'NONE' END END END) AS deworm_tabs,
                    schoolnew_training_detail.iron_folic,
                (CASE WHEN schoolnew_training_detail.iron_folic=1 THEN 'YES' ELSE 'NO' END) AS iron_folics,
        langandmed.medium_instruct as mediumetr,
        langandmed.lang_instruct as langetr,
    
        langandmed.medium_instrut,
        langandmed.other_medium,
        langandmed.lang_taught,
    
        spl_edtor,
        (CASE WHEN spl_edtor=1 THEN 'AT CLUSTER LEVEL' ELSE
            CASE WHEN spl_edtor=2 THEN 'DEDICATED' ELSE
                CASE WHEN spl_edtor=3 THEN 'NO' ELSE
                    CASE WHEN spl_edtor IS NULL THEN 'NO DATA' END END END END) AS spl_edtors,
                schoolnew_training_detail.stu_councel,
        (CASE WHEN schoolnew_training_detail.stu_councel=1 THEN 'YES' ELSE 'NO' END) AS stu_councels,
        IF(schoolnew_training_detail.sci_lab_sec=2,'NO',schoolnew_training_detail.tot_room) AS tot_room,
        schoolnew_profilecomplete.part_1,
        schoolnew_profilecomplete.part_2,
        schoolnew_profilecomplete.part_3,
        schoolnew_profilecomplete.part_4,
        schoolnew_profilecomplete.part_5,
        schoolnew_profilecomplete.part_6,
        schoolnew_profilecomplete.part_7,
        schoolnew_profilecomplete.part_8,
        schoolnew_profilecomplete.part_9,
        schoolnew_profilecomplete.part_10,
        enroll.*
    FROM schoolnew_basicinfo
    left join schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_parliament ON schoolnew_parliament.id=schoolnew_basicinfo.parliament_id
    left join schoolnew_assembly ON schoolnew_assembly.id=schoolnew_basicinfo.assembly_id
    left join schoolnew_training_detail ON schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_textbook_detail ON schoolnew_textbook_detail.school_key_id=schoolnew_basicinfo.school_id
    
    left join (SELECT
                schoolnew_district.id as district_id,
                schoolnew_district.district_name,
                schoolnew_edn_dist_mas.id as edu_dist_id,
                schoolnew_edn_dist_mas.edn_dist_name as edu_dist_name,
                schoolnew_block.id as block_id,
                schoolnew_block.block_name
            FROM
                schoolnew_district
            left join schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
            left join schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.district_code=schoolnew_district.id
            left join schoolnew_block ON schoolnew_block.district_id=schoolnew_district.id AND schoolnew_edn_dist_block.block_id
            GROUP BY district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
    ) AS locationentry ON locationentry.district_id=schoolnew_basicinfo.district_id AND locationentry.edu_dist_id=schoolnew_basicinfo.edu_dist_id AND locationentry.block_id=schoolnew_basicinfo.block_id
    
    left join (SELECT
            schoolnew_zone_type.zone_type,
            schoolnew_habitation_all.name as village_ward,
            schoolnew_localbody_all.name as village_munci,
            schoolnew_habitation_all.id as village_id
        FROM schoolnew_localbody_all
        left join schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
        left join schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
    ) AS localbodyall ON village_id=schoolnew_basicinfo.lb_habitation_id
    
    left join (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
            left join schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
            left join schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
    ) AS schooldirectrate ON schooldirectrate.directid=schoolnew_basicinfo.sch_directorate_id
    
    left join (SELECT * FROM schoolnew_type) as schoolnew_type ON schoolnew_type.id=schoolnew_academic_detail.scl_category
    left join (SELECT * FROM schoolnew_category) as schoolnew_category ON schoolnew_category.id=schoolnew_basicinfo.sch_cate_id
    left join (SELECT medid,landesc.school_key_id,medium_instruct,langid,lang_instruct,medium_instrut,other_medium,lang_taught FROM
                (SELECT schoolnew_mediumentry.id as medid,schoolnew_mediumentry.school_key_id,
                    schoolnew_mediumofinstruction.MEDINSTR_DESC AS medium_instruct,medium_instrut,other_medium
                FROM schoolnew_mediumofinstruction
                left join schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=schoolnew_mediumofinstruction.MEDINSTR_ID) AS meddesc
            left join (SELECT schoolnew_langtaught_entry.id as langid,schoolnew_langtaught_entry.school_key_id,
                        schoolnew_mediumofinstruction.MEDINSTR_DESC AS lang_instruct,lang_taught
                    FROM schoolnew_mediumofinstruction
                    left join schoolnew_langtaught_entry ON schoolnew_langtaught_entry.lang_taught=schoolnew_mediumofinstruction.MEDINSTR_ID
    ) as landesc ON landesc.school_key_id=meddesc.school_key_id) AS langandmed ON langandmed.school_key_id=schoolnew_basicinfo.school_id
    
    left join (SELECT * FROM schoolnew_resitype) as schoolnew_resitype ON schoolnew_resitype.RESITYPE_ID=schoolnew_academic_detail.typ_resid_schl
    left join schoolnew_safety_details ON schoolnew_safety_details.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_sectionbyclass on schoolnew_sectionbyclass.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_inventory_facility on schoolnew_inventory_facility.school_key_id=schoolnew_basicinfo.school_id
    left join schoolnew_profilecomplete ON schoolnew_profilecomplete.school_key_id=schoolnew_basicinfo.school_id
    left join (select
    school_id,
    sum(class_studying_id = 13 and gender = 1) as enrol_lkg_boys,
    sum(class_studying_id = 13 and gender = 2) as enrol_lkg_girls,
    sum(class_studying_id = 14 and gender = 1) as enrol_ukg_boys,
    sum(class_studying_id = 14 and gender = 2) as enrol_ukg_girls,
    sum(year(now())-year(dob) <5 and class_studying_id=1 and gender=1) as grd1_boys_below_5, sum(year(now())-year(dob) <5 and
        class_studying_id=1 and gender=2) as grd1_girls_below_5, sum(year(now())-year(dob)=5 and class_studying_id=1 and
        gender=1) as grd1_boys_age_5, sum(year(now())-year(dob)=5 and class_studying_id=1 and gender=2) as grd1_girls_age_5,
        sum(year(now())-year(dob)=6 and class_studying_id=1 and gender=1) as grd1_boys_age_6, sum(year(now())-year(dob)=6
        and class_studying_id=1 and gender=2) as grd1_girls_age_6, sum(year(now())-year(dob)=7 and class_studying_id=1 and
        gender=1) as grd1_boys_age_7, sum(year(now())-year(dob)=7 and class_studying_id=1 and gender=2) as grd1_girls_age_7,
        sum(year(now())-year(dob)> 7 and class_studying_id = 1 and gender=1) as grd1_boys_above_7,
        sum(year(now())-year(dob) > 7 and class_studying_id = 1 and gender=2) as grd1_girls_above_7,
        sum(class_studying_id=1 and class_studying_id = 1 and gender=1) as grd1_tot_1_boys,
        sum(class_studying_id=1 and class_studying_id = 1 and gender=2) as grd1_tot_1_girls
        from students_child_detail where school_id =".$schoolid." and transfer_flag=0) AS enroll on enroll.school_id=schoolnew_basicinfo.school_id where
        schoolnew_basicinfo.school_id=".$schoolid." group by schoolnew_basicinfo.school_id;";

        /**Query Changed by wesley**/

        //echo($SQL);die("NewFunction");
        $query = $this->db->query($SQL);
        return $query->result_array();
        

        /**Query Commented by wesley**/

        /*$SQL="SELECT DISTINCTROW	
            
        schoolnew_basicinfo.udise_code,
        schoolnew_basicinfo.school_name,
        schoolnew_basicinfo.panchayat_id,
        schoolnew_basicinfo.municipal_id,
        schoolnew_basicinfo.city_id,
        schoolnew_basicinfo.corr_name,
        
        schoolnew_basicinfo.district_id,
        schoolnew_basicinfo.edu_dist_id,
        schoolnew_basicinfo.block_id,
        schoolnew_basicinfo.manage_cate_id,
        schoolnew_basicinfo.sch_management_id,
        schoolnew_basicinfo.sch_cate_id,
        schoolnew_basicinfo.sch_directorate_id,
        schoolnew_basicinfo.local_body_id,
        schoolnew_basicinfo.lb_vill_town_muni,
        schoolnew_basicinfo.lb_habitation_id,
        (select clus_name from schoolnew_cluster_mas where clus_code=schoolnew_basicinfo.cluster_id) as cluster_name,
        schoolnew_basicinfo.cluster_id,
        schoolnew_basicinfo.assembly_id,
        schoolnew_basicinfo.parliament_id,
        schoolnew_basicinfo.address,
        
        locationentry.district_name,
        locationentry.edu_dist_name,
        locationentry.block_name,
        schoolnew_basicinfo.pincode,schoolnew_basicinfo.latitude,schoolnew_basicinfo.longitude,
        
        (CASE WHEN schoolnew_basicinfo.urbanrural=2 THEN 'URBAN' ELSE
            CASE WHEN schoolnew_basicinfo.urbanrural=1 THEN 'RURAL' END END) AS urbanrurals,
        urbanrural,
        
        zone_type,village_ward,village_munci,schoolnew_assembly.assembly_name,schoolnew_parliament.parli_name,
        manage_name,schooldirectrate.management,department,
        schoolnew_basicinfo.office_mobile,
        schoolnew_basicinfo.corr_mobile,
        schoolnew_basicinfo.sch_email,
        schoolnew_basicinfo.website,
        schoolnew_basicinfo.office_std_code,
        schoolnew_basicinfo.corr_std_code,
        (SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.office_std_code) as office_std_codes,
    schoolnew_basicinfo.office_landline AS office_landline,
    (SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.corr_std_code) as corr_std_codes,
    schoolnew_basicinfo.corr_landlline AS corr_landlline,
    schoolnew_sectionbyclass.pre_pri_sec,
    schoolnew_sectionbyclass.class1_sec, 
    schoolnew_sectionbyclass.class2_sec, 
    schoolnew_sectionbyclass.class3_sec, 
    schoolnew_sectionbyclass.class4_sec,
    schoolnew_sectionbyclass.class5_sec,
    schoolnew_sectionbyclass.class6_sec, 
    schoolnew_sectionbyclass.class7_sec, 
    schoolnew_sectionbyclass.class8_sec, 
    schoolnew_sectionbyclass.class9_sec, 
    schoolnew_sectionbyclass.class10_sec,
    schoolnew_sectionbyclass.class11_sec,
    schoolnew_sectionbyclass.class12_sec,

    schoolnew_inventory_facility.lap_nbook_avail,
    schoolnew_inventory_facility.lap_nbook_tot,
    schoolnew_inventory_facility.lap_nbook_func,
    schoolnew_inventory_facility.tablet_avail,
    schoolnew_inventory_facility.tablet_tot,
    schoolnew_inventory_facility.tablet_func,
    schoolnew_inventory_facility.dcomp_avail,
    schoolnew_inventory_facility.dcomp_tot,
    schoolnew_inventory_facility.dcomp_func,
    schoolnew_inventory_facility.PC_avail,
    schoolnew_inventory_facility.PC_tot,
    schoolnew_inventory_facility.PC_func,
    schoolnew_inventory_facility.DB_avail,
    schoolnew_inventory_facility.DB_LMS_tot,
    schoolnew_inventory_facility.DB_func,
    schoolnew_inventory_facility.server_avail,
    schoolnew_inventory_facility.server_tot,
    schoolnew_inventory_facility.server_func,
    schoolnew_inventory_facility.projtr_avail,
    schoolnew_inventory_facility.projtr_tot,
    schoolnew_inventory_facility.projtr_func,
    schoolnew_inventory_facility.scnr_avail,
    schoolnew_inventory_facility.scnr_tot,
    schoolnew_inventory_facility.scnr_func,
    schoolnew_inventory_facility.webcam_avail,
    schoolnew_inventory_facility.webcam_tot,
    schoolnew_inventory_facility.webcam_func,
    schoolnew_inventory_facility.printr_avail,
    schoolnew_inventory_facility.printr_tot,
    schoolnew_inventory_facility.printr_func,
    schoolnew_inventory_facility.gnrtr_invups_avail,
    schoolnew_inventory_facility.gnrtr_invups_tot,
    schoolnew_inventory_facility.gnrtr_invups_func,
    schoolnew_inventory_facility.intrntfac_avail,
    schoolnew_inventory_facility.intrntfac_tot,
    schoolnew_inventory_facility.intrntfac_func,
    schoolnew_inventory_facility.dth_antna_avail,
    schoolnew_inventory_facility.dth_antna_tot,
    schoolnew_inventory_facility.dth_antna_func,
    schoolnew_inventory_facility.econtnt_dig_avail,
    schoolnew_inventory_facility.econtnt_dig_tot,
    schoolnew_inventory_facility.econtnt_dig_func,
    schoolnew_inventory_facility.lab_rm_avail,
    schoolnew_inventory_facility.lab_prsnt_cond,
    schoolnew_inventory_facility.phy_rm_avail,
    schoolnew_inventory_facility.phy_prsnt_cond,
    schoolnew_inventory_facility.chem_rm_avail,
    schoolnew_inventory_facility.chem_prsnt_cond,
    schoolnew_inventory_facility.bio_rm_avail,
    schoolnew_inventory_facility.bio_prsnt_cond,
    schoolnew_inventory_facility.math_rm_avail,
    schoolnew_inventory_facility.math_prsnt_cond,
    schoolnew_inventory_facility.lang_rm_avail,
    schoolnew_inventory_facility.lang_prsnt_cond,
    schoolnew_inventory_facility.geo_rm_avail,
    schoolnew_inventory_facility.geo_prsnt_cond,
    schoolnew_inventory_facility.hom_scnrm_avail,
    schoolnew_inventory_facility.hom_scnprsnt_cond,
    schoolnew_inventory_facility.psy_rm_avail,
    schoolnew_inventory_facility.psy_prsnt_cond,
    schoolnew_inventory_facility.equ_fac_avail,
    schoolnew_inventory_facility.aud_visfac_avail,
    schoolnew_inventory_facility.scien_fac_avail,
    schoolnew_inventory_facility.math_fac_avail,
    schoolnew_inventory_facility.bio_fac_avail,
    schoolnew_inventory_facility.lcd_led_plas_avail,
    schoolnew_inventory_facility.lcd_led_plas_tot,
    schoolnew_inventory_facility.lcd_led_plas_func, 
    schoolnew_inventory_facility.asst_CWSN_avail,
    schoolnew_inventory_facility.asst_CWSN_tot,
    schoolnew_inventory_facility.asst_CWSN_func,






    schoolnew_academic_detail.shftd_schl,
    schoolnew_academic_detail.hill_frst,
    RESITYPE_DESC,
    schoolnew_academic_detail.yr_estd_schl,
    schoolnew_academic_detail.resid_schl,
    schoolnew_academic_detail.typ_resid_schl,
    schoolnew_academic_detail.cwsn_scl,
    schoolnew_academic_detail.yr_rec_schl_elem,
    schoolnew_academic_detail.yr_rec_schl_sec,
    schoolnew_academic_detail.yr_rec_schl_hsc,
    schoolnew_academic_detail.yr_recgn_first,
    schoolnew_academic_detail.yr_last_renwl,
    schoolnew_academic_detail.certifi_no,
    schoolnew_academic_detail.scl_category,
    schoolnew_academic_detail.yr_recogn_schl,
    schoolnew_academic_detail.upgrad_prito_uprpri,
    schoolnew_academic_detail.upgrad_uprprito_sec,
    schoolnew_academic_detail.upgrad_secto_higsec,
    schoolnew_type.category_name as schooltypescl_category,
    schoolnew_category.category_name,
    schoolnew_academic_detail.board_sec,
    schoolnew_academic_detail.board_sec_no,
    schoolnew_academic_detail.board_sec_oth,
    schoolnew_academic_detail.board_hsec,
    schoolnew_academic_detail.board_hsec_no,
    schoolnew_academic_detail.board_hsec_oth,
    schoolnew_academic_detail.school_type,
    schoolnew_academic_detail.yr_upgradprito_uprpri,
    schoolnew_academic_detail.yr_upgraduprprito_sec,
    schoolnew_academic_detail.yr_upgradsecto_higsec,
    schoolnew_academic_detail.rte_25p_applied, 
    schoolnew_academic_detail.rte_25p_enrolled, 
    schoolnew_academic_detail.rte_pvt_c1_b, 
    schoolnew_academic_detail.rte_pvt_c1_g, 
    schoolnew_academic_detail.rte_pvt_c2_b, 
    schoolnew_academic_detail.rte_pvt_c2_g, 
    schoolnew_academic_detail.rte_pvt_c3_b, 
    schoolnew_academic_detail.rte_pvt_c3_g, 
    schoolnew_academic_detail.rte_pvt_c4_b, 
    schoolnew_academic_detail.rte_pvt_c4_g, 
    schoolnew_academic_detail.rte_pvt_c5_b, 
    schoolnew_academic_detail.rte_pvt_c5_g, 
    schoolnew_academic_detail.rte_pvt_c6_b, 
    schoolnew_academic_detail.rte_pvt_c6_g, 
    schoolnew_academic_detail.rte_pvt_c7_b, 
    schoolnew_academic_detail.rte_pvt_c7_g, 
    schoolnew_academic_detail.rte_pvt_c8_b, 
    schoolnew_academic_detail.rte_pvt_c8_g, 
    schoolnew_academic_detail.rte_bld_c0_b, 
    schoolnew_academic_detail.rte_bld_c0_g, 
    schoolnew_academic_detail.rte_bld_c1_b, 
    schoolnew_academic_detail.rte_bld_c1_g, 
    schoolnew_academic_detail.rte_bld_c2_b, 
    schoolnew_academic_detail.rte_bld_c2_g, 
    schoolnew_academic_detail.rte_bld_c3_b, 
    schoolnew_academic_detail.rte_bld_c3_g, 
    schoolnew_academic_detail.rte_bld_c4_b, 
    schoolnew_academic_detail.rte_bld_c4_g, 
    schoolnew_academic_detail.rte_bld_c5_b, 
    schoolnew_academic_detail.rte_bld_c5_g, 
    schoolnew_academic_detail.rte_bld_c6_b, 
    schoolnew_academic_detail.rte_bld_c6_g, 
    schoolnew_academic_detail.rte_bld_c7_b, 
    schoolnew_academic_detail.rte_bld_c7_g, 
    schoolnew_academic_detail.rte_bld_c8_b, 
    schoolnew_academic_detail.rte_bld_c8_g, 
    schoolnew_academic_detail.rte_ews_c9_b, 
    schoolnew_academic_detail.rte_ews_c9_g, 
    schoolnew_academic_detail.rte_ews_c10_b,
    schoolnew_academic_detail.rte_ews_c10_g,
    schoolnew_academic_detail.rte_ews_c11_b,
    schoolnew_academic_detail.rte_ews_c11_g,
    schoolnew_academic_detail.rte_ews_c12_b,
    schoolnew_academic_detail.rte_ews_c12_g,
    schoolnew_academic_detail.txtbk_recd_yn,
    schoolnew_academic_detail.txtbk_recd_mon,

        acad_mnth_start,
    schoolnew_academic_detail.low_class,
    schoolnew_academic_detail.high_class,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.low_class)
    as low_classes,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.high_class)
    as high_classes,

        (CASE WHEN (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp)
    IS NULL THEN 'NO'
    ELSE CASE WHEN schoolnew_academic_detail.minority_grp=13 THEN CONCAT((SELECT minority FROM schoolnew_minority WHERE
    schoolnew_minority.id=schoolnew_academic_detail.minority_grp),' - ',schoolnew_academic_detail.minority_other) ELSE
    (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) END END) AS
    minority_grps,
    schoolnew_academic_detail.minority_grp,
    (CASE WHEN schoolnew_academic_detail.minority_sch=1 THEN schoolnew_academic_detail.minority_yr ELSE 'NO' END) AS
    minority_yrs,
    schoolnew_academic_detail.minority_sch,
    schoolnew_academic_detail.minority_yr,
    schoolnew_infra_detail.road_connect,
    schoolnew_infra_detail.distance_road,
    schoolnew_infra_detail.weather_roads,
    schoolnew_infra_detail.land_exp_scl,
    schoolnew_infra_detail.clsrms_dptd,
    schoolnew_infra_detail.toil_handwash_soap,
    schoolnew_infra_detail.handwash_meal_yn,
    (CASE WHEN schoolnew_infra_detail.road_connect=1 THEN CONCAT('Kutcha Road',' - ',schoolnew_infra_detail.distance_road,'
    mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=2 THEN CONCAT('Partial Pucca Road',' -
    ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=3 THEN CONCAT('No Road',' - ',schoolnew_infra_detail.distance_road,' mts')
    ELSE
    CASE WHEN (schoolnew_infra_detail.road_connect=NULL OR schoolnew_infra_detail.road_connect=2 OR
    schoolnew_infra_detail.road_connect IS NULL) THEN 'N/A' END
    END END END) AS weather_roadss,
    schoolnew_training_detail.special_train,
    schoolnew_training_detail.train_prov_boys,
    schoolnew_training_detail.train_prov_grls,
    schoolnew_training_detail.train_cond_in,
    schoolnew_training_detail.train_type,
        schoolnew_training_detail.train_cond_by,
        schoolnew_training_detail.train_cond_in,
    schoolnew_training_detail.boarding_pri_yn,
    schoolnew_training_detail.boarding_pri_b,
    schoolnew_training_detail.boarding_pri_g,
    schoolnew_training_detail.boarding_upr_yn,
    schoolnew_training_detail.boarding_upr_b,
    schoolnew_training_detail.boarding_upr_g,
    schoolnew_training_detail.boarding_sec_yn,
    schoolnew_training_detail.boarding_sec_b,
    schoolnew_training_detail.boarding_sec_g,
    schoolnew_training_detail.boarding_hsec_yn,
    schoolnew_training_detail.boarding_hsec_b,
    schoolnew_training_detail.boarding_hsec_g,
        
        schoolnew_training_detail.spltrg_py_enrol_b,
        schoolnew_training_detail.spltrg_py_enrol_g,
        schoolnew_training_detail.spltrg_py_prov_b, 
        schoolnew_training_detail.spltrg_py_prov_g, 
        schoolnew_training_detail.remedial_tch_enrol,
        schoolnew_training_detail.grd1_samescl_b,
    schoolnew_training_detail.grd1_samescl_g,	
    schoolnew_training_detail.grd1_othscl_b,	
    schoolnew_training_detail.grd1_othscl_g,
    schoolnew_training_detail.grd1_angan_b,	
    schoolnew_training_detail.grd1_angan_g,
    schoolnew_training_detail.anganwadi_schl,
        
        
        
        
        
        IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_boys,'NO') AS train_prov_boyss,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_grls,'NO') AS train_prov_grlss,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_by=1 THEN 'SCHOOL TEACHERS'
    ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=2 THEN 'SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=3 THEN 'BOTH SCHOOL & SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=4 THEN 'NGO' END END END END),'NO') AS train_cond_bys,

    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_in=1 THEN 'SCHOOL PREMISES'
    ELSE
    CASE WHEN schoolnew_training_detail.train_cond_in=2 THEN 'OTHER THAN SCHOOL PREMISES' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_in=3 THEN 'BOTH SCHOOL AND OTHER PREMISES' END END END),'N/A') AS
    train_cond_ins,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_type=1 THEN 'RESIDENTIAL' ELSE
    CASE WHEN schoolnew_training_detail.train_type=2 THEN 'NON-RESIDENTIAL' ELSE
    CASE WHEN schoolnew_training_detail.train_type=3 THEN 'BOTH RESIDENTIAL AND NON-RESIDENTIAL' END END END),'N/A') AS
    train_types,anganwadi,

        (CASE WHEN schoolnew_training_detail.anganwadi=1 THEN 'YES' ELSE 'NO' END) AS anganwadis,
        IF(schoolnew_training_detail.anganwadi=1,angan_childs,'N/A') AS angan_childs,
        IF(schoolnew_training_detail.anganwadi=1,angan_wrks,'N/A') AS angan_wrks,
        schoolnew_training_detail.anganwadi_center,
        schoolnew_training_detail.anganwadi_train,
        (CASE WHEN schoolnew_training_detail.anganwadi_train=1 THEN 'YES' ELSE 'NO' END) AS anganwadi_trains,
        
        (CASE WHEN schoolnew_safety_details.sdmp_dev=1 THEN 'YES' ELSE 'NO' END) AS sdmp_devs,
        (CASE WHEN schoolnew_safety_details.sturct_saf=1 THEN 'YES' ELSE 'NO' END) AS sturct_safs,
        (CASE WHEN schoolnew_safety_details.nonsturct_saf=1 THEN 'YES' ELSE 'NO' END) AS nonsturct_safs,
        (CASE WHEN schoolnew_safety_details.cctv_school=1 THEN 'YES' ELSE 'NO' END) AS cctv_schools,
        (CASE WHEN schoolnew_safety_details.firext_schl=1 THEN 'YES' ELSE 'NO' END) AS firext_schls,
        (CASE WHEN schoolnew_safety_details.nodtchr_schlsaf=1 THEN 'YES' ELSE 'NO' END) AS nodtchr_schlsafs,
        (CASE WHEN schoolnew_safety_details.dister_trng=1 THEN 'YES' ELSE 'NO' END) AS dister_trngs,
        (CASE WHEN schoolnew_safety_details.dister_part=1 THEN 'YES' ELSE 'NO' END) AS dister_parts,
        (CASE WHEN schoolnew_safety_details.slfdfse_trng=1 THEN schoolnew_safety_details.noslfdfse_trng ELSE 'NO' END) AS slfdfse_trngs,
        (CASE WHEN schoolnew_committee_detail.suppliment_prevousyr=1 THEN 'YES' ELSE 'NO' END) AS suppliment_prevousyrs,
        (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=3 THEN 'NOT APPLICABLE' END
        END END) AS txtbk_curyr_prepris,
        (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=3 THEN 'NOT APPLICABLE' END
        END END) AS txtbk_curyr_pris,
        (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=3 THEN 'NOT APPLICABLE' END
        END END) AS txtbk_curyr_upps,
        (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=3 THEN 'NOT APPLICABLE' END
        END END) AS txtbk_curyr_secs,
        (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=3 THEN 'NOT APPLICABLE' END
        END END) AS txtbk_curyr_hsecs,
        
        (CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=3 THEN 'NOT APPLICABLE' END
        END END) AS tle_grade_preprims,
        (CASE WHEN schoolnew_textbook_detail.tle_grade_prim=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.tle_grade_prim=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.tle_grade_prim=3 THEN 'NOT APPLICABLE' END
        END END) AS tle_grade_prims,
        (CASE WHEN schoolnew_textbook_detail.tle_grde_upp=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.tle_grde_upp=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.tle_grde_upp=3 THEN 'NOT APPLICABLE' END
        END END) AS tle_grde_upps,
        (CASE WHEN schoolnew_textbook_detail.tle_grde_sec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.tle_grde_sec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.tle_grde_sec=3 THEN 'NOT APPLICABLE' END
        END END) AS tle_grde_secs,
        (CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=3 THEN 'NOT APPLICABLE' END
        END END) AS tle_grde_hsecs,
        
        (CASE WHEN schoolnew_textbook_detail.sports_prepri=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.sports_prepri=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.sports_prepri=3 THEN 'NOT APPLICABLE' END
        END END) AS sports_prepris,
        (CASE WHEN schoolnew_textbook_detail.sports_pri=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.sports_pri=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.sports_pri=3 THEN 'NOT APPLICABLE' END
        END END) AS sports_pris,
        (CASE WHEN schoolnew_textbook_detail.sports_upp=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.sports_upp=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.sports_upp=3 THEN 'NOT APPLICABLE' END
        END END) AS sports_upps,
        (CASE WHEN schoolnew_textbook_detail.sports_sec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.sports_sec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.sports_sec=3 THEN 'NOT APPLICABLE' END
        END END) AS sports_secs,
        (CASE WHEN schoolnew_textbook_detail.sports_hsec=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_textbook_detail.sports_hsec=2 THEN 'NO' ELSE
                CASE WHEN schoolnew_textbook_detail.sports_hsec=3 THEN 'NOT APPLICABLE' END
        END END) AS sports_hsecs,
        (CASE WHEN smc_const=1 THEN 'YES' ELSE 'NO' END) AS smc_consts,
        
        
        
        
    schoolnew_safety_details.sdmp_dev,
    schoolnew_safety_details.sturct_saf,
    schoolnew_safety_details.nonsturct_saf,
    schoolnew_safety_details.cctv_school,
    schoolnew_safety_details.firext_schl,
    schoolnew_safety_details.nodtchr_schlsaf,
    schoolnew_safety_details.dister_trng,
    schoolnew_safety_details.dister_part,
    schoolnew_safety_details.slfdfse_trng,
    schoolnew_safety_details.noslfdfse_trng,
    schoolnew_safety_details.guidline_disply_brd,
    schoolnew_safety_details.grnt_frstlvl_conslrs,
    schoolnew_safety_details.guidlins_counsling,
    schoolnew_safety_details.sensitiz_parnts,

    schoolnew_safety_details.awrnss_studscomm,
    schoolnew_safety_details.studs_feedbck,
    schoolnew_safety_details.safty_sugstn,
    schoolnew_safety_details.copies_studs,


    schoolnew_textbook_detail.txtbk_curyr_prepri,
    schoolnew_textbook_detail.txtbk_curyr_pri,
    schoolnew_textbook_detail.txtbk_curyr_upp,
    schoolnew_textbook_detail.txtbk_curyr_sec,
    schoolnew_textbook_detail.txtbk_curyr_hsec,
    schoolnew_textbook_detail.tle_grade_preprim,
    schoolnew_textbook_detail.tle_grade_prim,
    schoolnew_textbook_detail.tle_grde_upp,
    schoolnew_textbook_detail.tle_grde_sec,
    schoolnew_textbook_detail.tle_grde_hsec,
    schoolnew_textbook_detail.sports_prepri,
    schoolnew_textbook_detail.sports_pri,
    schoolnew_textbook_detail.sports_upp,
    schoolnew_textbook_detail.sports_sec,
    schoolnew_textbook_detail.sports_hsec,
    schoolnew_committee_detail.suppliment_prevousyr,
    schoolnew_committee_detail.smc_const,
    schoolnew_committee_detail.smc_tch_m,
    schoolnew_committee_detail.smc_tch_f,
    schoolnew_committee_detail.smc_trained_m,
    schoolnew_committee_detail.smc_trained_f,
    schoolnew_committee_detail.smdc_smc_same_yn,
    schoolnew_committee_detail.smc_par_sc, 
    schoolnew_committee_detail.smc_par_st,
    schoolnew_committee_detail.smc_par_ews,
    schoolnew_committee_detail.smc_par_min,
    schoolnew_committee_detail.smdc_par_ews_m,
    schoolnew_committee_detail.smdc_par_ews_f,
    schoolnew_committee_detail.smdc_trained_m,
    schoolnew_committee_detail.smdc_trained_f,
    schoolnew_committee_detail.smdcparents_belong,
    schoolnew_committee_detail.smdcparents_belong,

    schoolnew_committee_detail.smc_sep_bnkacc,
    schoolnew_committee_detail.smc_ifsc,	
    schoolnew_committee_detail.smc_bnk_brnch,
    schoolnew_committee_detail.smdc_bnk_brnch,
    schoolnew_committee_detail.smdc_ifsc,
    schoolnew_committee_detail.smc_bnk_nme,
    schoolnew_committee_detail.smdc_bnk_name,
    schoolnew_committee_detail.smc_acc_no,
    schoolnew_committee_detail.smc_acc_name,
        
        
        IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_no,'N/A') as smc_acc_nos,
        IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_name,'N/A') as smc_acc_names,
        IF(smc_const=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smc_bnk_brnch),'N/A') as smc_bank,
        IF(smc_const=1,schoolnew_committee_detail.smc_chair_name,'N/A') AS smc_chair_name,
        IF(smc_const=1,schoolnew_committee_detail.smc_chair_mble,'N/A') AS smc_chair_mble,
        IF(smc_const=1,schoolnew_committee_detail.smc_tot_mle,'N/A') AS smc_tot_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_tot_fmle,'N/A') AS smc_tot_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_prnts_mle,'N/A') AS smc_prnts_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_prnts_fmle,'N/A') AS smc_prnts_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_rep_mle,'N/A') AS smc_rep_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_rep_fmle,'N/A') AS smc_rep_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_weakr_mle,'N/A') AS smc_weakr_mle,
        IF(smc_const=1,schoolnew_committee_detail.smc_weakr_fmle,'N/A') AS smc_weakr_fmle,
        IF(smc_const=1,schoolnew_committee_detail.smc_no_prev_acyr,'N/A') AS smc_no_prev_acyr,
        IF(smc_const=1,schoolnew_committee_detail.smc_const_yr,'N/A') AS smc_const_yr,
        schoolnew_committee_detail.smc_sdp,schoolnew_committee_detail.smdc_constitu,
        (CASE WHEN schoolnew_committee_detail.smc_sdp=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_committee_detail.smc_sdp=2 THEN 'NO' ELSE '(NO-DATA FOUND)' END END) AS smc_sdps,
            
        (CASE WHEN schoolnew_committee_detail.smdc_constitu=1 THEN 'YES' ELSE 'NO' END) AS smdc_constitus,
        schoolnew_committee_detail.smdc_sep_bnkacc,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_name,'N/A') as smdc_acc_name,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_no,'N/A') as smdc_acc_no,
        IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smdc_bnk_brnch),'N/A') as smdc_bank,
        
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_mle,'N/A') as smdc_tot_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_fmle,'N/A') as smdc_tot_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_mle,'N/A') as smdc_parnt_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_fmle,'N/A') as smdc_parnt_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_mle,'N/A') as smdc_lb_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_fmle,'N/A') as smdc_lb_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_mle,'N/A') as smdc_minori_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_fmle,'N/A') as smdc_minori_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_women,'N/A') as smdc_women,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_mle,'N/A') as smdc_scst_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_fmle,'N/A') as smdc_scst_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_mle,'N/A') as smdc_deo_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_fmle,'N/A') as smdc_deo_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_mle,'N/A') as smdc_audit_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_fmle,'N/A') as smdc_audit_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_mle,'N/A') as smdc_exprt_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_fmle,'N/A') as smdc_exprt_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_mle,'N/A') as smdc_techrs_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_fmle,'N/A') as smdc_techrs_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_mle,'N/A') as smdc_hm_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_fmle,'N/A') as smdc_hm_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_mle,'N/A') as smdc_prnci_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_fmle,'N/A') as smdc_prnci_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mle,'N/A') as smdc_chair_mle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_fmle,'N/A') as smdc_chair_fmle,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_const_yr,'N/A') as smdc_const_yr,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_no_last_acyr,'N/A') as smdc_no_last_acyr,
        schoolnew_committee_detail.smdc_sip,
        
        (CASE WHEN schoolnew_committee_detail.smdc_sip=1 THEN 'YES' ELSE
            CASE WHEN schoolnew_committee_detail.smdc_sip=2 THEN 'NO' ELSE 'N/A' END END) AS smdc_sips,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_contrib_amt,'N/A') as smdc_contrib_amt,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_name,'N/A') as smdc_chair_name,
        IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mble,'N/A') as smdc_chair_mble,
        schoolnew_committee_detail.sbc_const,schoolnew_committee_detail.sbc_const_year,
        
        IF(schoolnew_committee_detail.sbc_const=1,schoolnew_committee_detail.sbc_const_year,'NO') as sbc_consts,
        schoolnew_committee_detail.acadecomm_const,schoolnew_committee_detail.acadecomm_year,
        IF(schoolnew_committee_detail.acadecomm_const=1,schoolnew_committee_detail.acadecomm_year,'NO') as acadecomm_consts,
        schoolnew_committee_detail.pta_const,
        (CASE WHEN schoolnew_committee_detail.pta_const=1 THEN 'YES' ELSE 'NO' END) AS pta_consts,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_est_yr,'N/A') as pta_est_yr,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_no_curyr,'N/A') as pta_no_curyr,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_reg_no,'N/A') as pta_reg_no,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_subscri_amt,'N/A') as pta_subscri_amt,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_name,'N/A') as pta_chair_name,
        IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_mble,'N/A') as pta_chair_mble,
        TRUNCATE((schoolnew_infra_detail.land_avail_sqft/43560),3) AS land_avail_acre,
        schoolnew_infra_detail.land_avail_sqft,
        
        schoolnew_infra_detail.play_facility,
        schoolnew_infra_detail.play_alt_arrang,
        schoolnew_infra_detail.play_address,
        schoolnew_infra_detail.dist_build_playgr,
        schoolnew_infra_detail.play_area_sqft,
        schoolnew_infra_detail.ramp_building_yn,
        schoolnew_infra_detail.tot_handwash_grls,
        schoolnew_infra_detail.toil_handwash_soap,
        IF(schoolnew_infra_detail.play_facility=1,TRUNCATE((schoolnew_infra_detail.play_area_sqft/43560),3),IF(schoolnew_infra_detail.play_alt_arrang=1,CONCAT(schoolnew_infra_detail.play_address,'<br>Distance:',schoolnew_infra_detail.dist_build_playgr),'N/A')) AS play_area_sqfts,
        
        IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area/43560),3),'N/A') AS play_land_area,
        schoolnew_infra_detail.land_ownersip,
        (CASE WHEN schoolnew_infra_detail.land_ownersip=1 THEN 'RENTED' ELSE
            CASE WHEN schoolnew_infra_detail.land_ownersip=2 THEN 'LEASED' ELSE
                CASE WHEN schoolnew_infra_detail.land_ownersip=3 THEN 'OWNED' ELSE
                    CASE WHEN schoolnew_infra_detail.land_ownersip=4 THEN 'RENTAL FREE' END END END END) AS land_ownersips,
                
        IF(schoolnew_infra_detail.land_ownersip=1,schoolnew_infra_detail.land_rent_amt,'N/A') AS land_rent_amt,
        IF(schoolnew_infra_detail.land_ownersip=2,schoolnew_infra_detail.land_lease_perid,'N/A') AS land_lease_perid,
        IF(schoolnew_infra_detail.land_ownersip=2,DATE_FORMAT(schoolnew_infra_detail.valid_upto,\"%d/%m/%Y\"),'N/A') AS valid_upto,
        schoolnew_infra_detail.cmpwall_type,
        schoolnew_infra_detail.cmpwall_perimtr,
        schoolnew_infra_detail.cmpwall_length,
        
        schoolnew_infra_detail.build_block_no,
        schoolnew_infra_detail.classrm_undr_constr,
        schoolnew_infra_detail.classrm_desk_studs,
        schoolnew_infra_detail.ramp_disable_child,
        schoolnew_infra_detail.ramp_handrail,
        schoolnew_infra_detail.staffquarter,
        schoolnew_infra_detail.fulltime_lib,
        schoolnew_infra_detail.news_subscribe,
        
        (CASE WHEN schoolnew_infra_detail.cmpwall_type=1 THEN 'PUCCA' ELSE
            CASE WHEN schoolnew_infra_detail.cmpwall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
                CASE WHEN schoolnew_infra_detail.cmpwall_type=3 THEN 'BARBED WIRE FENCING' ELSE
                    CASE WHEN schoolnew_infra_detail.cmpwall_type=4 THEN 'HEDGES' ELSE
                        CASE WHEN schoolnew_infra_detail.cmpwall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
                            CASE WHEN schoolnew_infra_detail.cmpwall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_types,
                        
        IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_perimtr) as cmpwall_perimtrs,
        IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_length) as cmpwall_lengths,
        
        (CASE WHEN schoolnew_infra_detail.classrm_desk_studs=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studss,
        (CASE WHEN schoolnew_infra_detail.ramp_disable_child=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_childs,
        (CASE WHEN schoolnew_infra_detail.ramp_handrail=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrails,
        IF(schoolnew_infra_detail.staffquarter=1,schoolnew_infra_detail.rooms_staffquartrs,'N/A') AS rooms_staffquartrss,
        (CASE WHEN schoolnew_infra_detail.fulltime_lib=1 THEN 'YES' ELSE 'NO' END) AS fulltime_libs,
        (CASE WHEN schoolnew_infra_detail.news_subscribe=1 THEN 'YES' ELSE 'NO' END) AS news_subscribes,
            
            schoolnew_infra_detail.toil_gents_tot,
            schoolnew_infra_detail.toil_ladies_tot,
            schoolnew_infra_detail.urinal_gents_tot,
            schoolnew_infra_detail.urinals_tot_ladies,
            
            schoolnew_infra_detail.toil_bys_inuse,
            schoolnew_infra_detail.toil_notuse_bys,
            schoolnew_infra_detail.toil_nonfunc_bys,
            
            (CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=4 THEN 'N/A' END END END END) AS toil_nonfunc_byss,
            schoolnew_infra_detail.toil_inuse_grls,
            schoolnew_infra_detail.toil_notuse_grls,
            schoolnew_infra_detail.toil_reasn_grls,
            
            (CASE WHEN schoolnew_infra_detail.toil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.toil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.toil_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.toil_reasn_grls=4 THEN 'N/A' END END END END) AS toil_reasn_grlss,
                        
            schoolnew_infra_detail.cwsntoil_inuse_bys,
            schoolnew_infra_detail.cwsntoil_notuse_bys,
            schoolnew_infra_detail.cwsntoil_reasn_bys,
            
            (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_byss,
                    
                    
            schoolnew_infra_detail.cwsntoil_inuse_grls,
            schoolnew_infra_detail.cwsntoil_notuse_grls,
            schoolnew_infra_detail.cwsntoil_reasn_grls,
            
            (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grlss,
            schoolnew_infra_detail.urinls_inuse_bys,
            schoolnew_infra_detail.urinls_notuse_bys,
            schoolnew_infra_detail.urinls_reasn_bys,
            (CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=4 THEN 'N/A' END END END END) AS urinls_reasn_byss,
            schoolnew_infra_detail.urinls_inuse_grls,
            schoolnew_infra_detail.urinls_notuse_grls,
            schoolnew_infra_detail.urinls_reasn_grls,
            (CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
                CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
                    CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=3 THEN 'DAMAGED' ELSE
                        CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=4 THEN 'N/A' END END END END) AS urinls_reasn_grlss,
            schoolnew_infra_detail.toil_waterfac_bys,
            schoolnew_infra_detail.toil_waterfac_grls,
            schoolnew_infra_detail.urinls_waterfac_bys,
            schoolnew_infra_detail.urinls_waterfac_grls,
            schoolnew_infra_detail.toil_sanit_wrks,
            (CASE WHEN schoolnew_infra_detail.toil_sanit_wrks=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrkss,
            
            schoolnew_infra_detail.toil_land_avail,
            schoolnew_infra_detail.toil_land_avail_sqft,
            
            IF(schoolnew_infra_detail.toil_land_avail=1,schoolnew_infra_detail.toil_land_avail_sqft,'NO') AS toil_land_avails,
            schoolnew_infra_detail.napkin_incin,
            schoolnew_infra_detail.incinerator,
            IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_avail_no,
            IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_func_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_avail_no,'N/A') AS inci_auto_avail_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_func_no,'N/A') AS inci_auto_func_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_avail_no,'N/A') AS inci_man_avail_no,
            IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_func_no,'N/A') AS inci_man_func_no,
            schoolnew_infra_detail.tot_handwash_bys,
            schoolnew_infra_detail.tot_handwash_grls,
            schoolnew_infra_detail.drnkwater_avail,
            schoolnew_infra_detail.drnkwater_source,
            schoolnew_infra_detail.drnkwater_othsource,
            schoolnew_infra_detail.well_top,
            schoolnew_infra_detail.toilet_yn,
            schoolnew_infra_detail.tot_handwash_pts,
            
            IF(schoolnew_infra_detail.drnkwater_avail=1,
            (CASE WHEN schoolnew_infra_detail.drnkwater_source=1 THEN 'HAND PUMPS' ELSE
                CASE WHEN schoolnew_infra_detail.drnkwater_source=2 THEN 'WELL' ELSE
                    CASE WHEN schoolnew_infra_detail.drnkwater_source=3 THEN 'TAP WATER' ELSE
                        CASE WHEN schoolnew_infra_detail.drnkwater_source=4 THEN 'RO PURIFIER' ELSE
                            CASE WHEN schoolnew_infra_detail.drnkwater_source=5 THEN 'PACKAGED/BOTTELED' ELSE
                                CASE WHEN schoolnew_infra_detail.drnkwater_source=-1 THEN CONCAT('OTHERS - ',schoolnew_infra_detail.drnkwater_othsource) END END END END END END),'NO') AS drnkwater_avails,
                            
                            
            IF(schoolnew_infra_detail.drnkwater_source=2,(CASE WHEN schoolnew_infra_detail.well_top=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_top,
            
            schoolnew_infra_detail.water_test,
            schoolnew_infra_detail.overheadtank_avail,
            schoolnew_infra_detail.waterpuri_avail,
            schoolnew_infra_detail.schl_rainwtr_hrv,
            schoolnew_infra_detail.solar_panel,
            schoolnew_infra_detail.kitchen_garden,
            schoolnew_infra_detail.class_dustbin,
            schoolnew_infra_detail.waste_toilets,
            schoolnew_infra_detail.waste_kitchen,
            
            IF(schoolnew_infra_detail.water_test=1,'YES','NO') AS water_tests,
            IF(schoolnew_infra_detail.overheadtank_avail=1,'YES','NO') AS overheadtank_avails,
            IF(schoolnew_infra_detail.waterpuri_avail=1,'YES','NO') AS waterpuri_avails,
            IF(schoolnew_infra_detail.schl_rainwtr_hrv=1,'YES','NO') AS schl_rainwtr_hrvs,
            IF(schoolnew_infra_detail.solar_panel=1,'YES','NO') AS solar_panels,
            IF(schoolnew_infra_detail.kitchen_garden=1,'YES','NO') AS kitchen_gardens,
            
            
            (CASE WHEN schoolnew_infra_detail.class_dustbin=1 THEN 'YES' ELSE 
                CASE WHEN schoolnew_infra_detail.class_dustbin=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.class_dustbin=3 THEN 'YES BUT SOME' END END END) AS class_dustbins,
            (CASE WHEN schoolnew_infra_detail.waste_toilets=1 THEN 'YES' ELSE 
                CASE WHEN schoolnew_infra_detail.waste_toilets=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.waste_toilets=3 THEN 'YES BUT SOME' END END END) AS waste_toiletss,
            (CASE WHEN schoolnew_infra_detail.waste_kitchen=1 THEN 'YES' ELSE 
                CASE WHEN schoolnew_infra_detail.waste_kitchen=2 THEN 'NO' ELSE
                    CASE WHEN schoolnew_infra_detail.waste_kitchen=3 THEN 'YES BUT SOME' END END END) AS waste_kitchens,
                
                schoolnew_academic_detail.yr_upgradprito_uprpri,
                schoolnew_academic_detail.yr_upgraduprprito_sec,
                schoolnew_academic_detail.yr_upgradsecto_higsec,
                schoolnew_academic_detail.rte_pvt_c0_b, 
                schoolnew_academic_detail.rte_pvt_c0_g,
                schoolnew_academic_detail.rte_pvt_c1_b, 
                schoolnew_academic_detail.rte_pvt_c1_g, 
                schoolnew_academic_detail.rte_pvt_c2_b, 
                schoolnew_academic_detail.rte_pvt_c2_g, 
                schoolnew_academic_detail.rte_pvt_c3_b, 
                schoolnew_academic_detail.rte_pvt_c3_g, 
                schoolnew_academic_detail.rte_pvt_c4_b, 
                schoolnew_academic_detail.rte_pvt_c4_g, 
                schoolnew_academic_detail.rte_pvt_c5_b, 
                schoolnew_academic_detail.rte_pvt_c5_g, 
                schoolnew_academic_detail.rte_pvt_c6_b, 
                schoolnew_academic_detail.rte_pvt_c6_g, 
                schoolnew_academic_detail.rte_pvt_c7_b, 
                schoolnew_academic_detail.rte_pvt_c7_g, 
                schoolnew_academic_detail.rte_pvt_c8_b, 
                schoolnew_academic_detail.rte_pvt_c8_g, 
                schoolnew_academic_detail.rte_bld_c0_b, 
                schoolnew_academic_detail.rte_bld_c0_g, 
                schoolnew_academic_detail.rte_bld_c1_b, 
                schoolnew_academic_detail.rte_bld_c1_g, 
                schoolnew_academic_detail.rte_bld_c2_b, 
                schoolnew_academic_detail.rte_bld_c2_g, 
                schoolnew_academic_detail.rte_bld_c3_b, 
                schoolnew_academic_detail.rte_bld_c3_g, 
                schoolnew_academic_detail.rte_bld_c4_b, 
                schoolnew_academic_detail.rte_bld_c4_g, 
                schoolnew_academic_detail.rte_bld_c5_b, 
                schoolnew_academic_detail.rte_bld_c5_g, 
                schoolnew_academic_detail.rte_bld_c6_b, 
                schoolnew_academic_detail.rte_bld_c6_g, 
                schoolnew_academic_detail.rte_bld_c7_b, 
                schoolnew_academic_detail.rte_bld_c7_g, 
                schoolnew_academic_detail.rte_bld_c8_b, 
                schoolnew_academic_detail.rte_bld_c8_g, 
                schoolnew_academic_detail.rte_ews_c9_b, 
                schoolnew_academic_detail.rte_ews_c9_g, 
                schoolnew_academic_detail.rte_ews_c10_b,
                schoolnew_academic_detail.rte_ews_c10_g,
                schoolnew_academic_detail.rte_ews_c11_b,
                schoolnew_academic_detail.rte_ews_c11_g,
                schoolnew_academic_detail.rte_ews_c12_b,
                schoolnew_academic_detail.rte_ews_c12_g,
                schoolnew_academic_detail.txtbk_recd_yn,
                schoolnew_academic_detail.txtbk_recd_mon,
                
            
                
                schoolnew_academic_detail.prevoc_course,
                schoolnew_academic_detail.mtongue_pri,
                schoolnew_academic_detail.distance_pri,
                schoolnew_academic_detail.distance_upr,
                schoolnew_academic_detail.distance_sec,
                schoolnew_academic_detail.distance_hsec,
                schoolnew_academic_detail.cal, 
                schoolnew_academic_detail.clab,
                schoolnew_academic_detail.year_implmnt,
                schoolnew_academic_detail.ict_lab,
                schoolnew_academic_detail.model_ict,
                schoolnew_academic_detail.ict_type,
                
            (CASE WHEN schoolnew_academic_detail.cal=1 THEN 'YES' ELSE 'NO' END) AS cals,
            IF((schoolnew_academic_detail.clab=1 OR schoolnew_academic_detail.clab=3),CONCAT(
            (CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
                CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
                    CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
                        CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END),'-',schoolnew_academic_detail.year_implmnt),CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
                CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
                    CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
                        CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END) AS clabs,
                (CASE WHEN schoolnew_academic_detail.ict_lab=1 THEN 'YES' ELSE 'NO' END) AS ict_labs,
                (CASE WHEN schoolnew_academic_detail.model_ict=1 THEN 'BOOT MODEL' ELSE
                    CASE WHEN schoolnew_academic_detail.model_ict=2 THEN 'BOO MODEL' ELSE
                        CASE WHEN schoolnew_academic_detail.model_ict=3 THEN 'OTHER MODEL' END END END) AS model_icts,
                (CASE WHEN schoolnew_academic_detail.ict_type=1 THEN 'FULL TIME' ELSE
                    CASE WHEN schoolnew_academic_detail.ict_type=2 THEN 'PART TIME' ELSE
                        CASE WHEN schoolnew_academic_detail.ict_type=3 THEN 'NOT AVALIABLE' END END END) AS model_ict_type,
                    
                    schoolnew_academic_detail.electricity,
                (CASE WHEN schoolnew_academic_detail.electricity=1 THEN 'YES' ELSE
                    CASE WHEN schoolnew_academic_detail.electricity=2 THEN 'NO' ELSE
                        CASE WHEN schoolnew_academic_detail.electricity=3 THEN 'NOT FUNCTIONING' END END END) AS electricitys,
                    schoolnew_training_detail.med_ckup_lstyr,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,'YES','NO') AS med_ckup_lstyr,        
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_1 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_1,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_1,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_2 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_2,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_2,
                IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_3 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_3,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_3,
                schoolnew_training_detail.deworm_tab,
                (CASE WHEN schoolnew_training_detail.deworm_tab=1 THEN 'COMPLETE TWO DOSE' ELSE
                    CASE WHEN schoolnew_training_detail.deworm_tab=2 THEN 'PARTIALLY ONE DOSE' ELSE
                        CASE WHEN schoolnew_training_detail.deworm_tab=3 THEN 'NONE' END END END) AS deworm_tabs,
                    schoolnew_training_detail.iron_folic,
                (CASE WHEN schoolnew_training_detail.iron_folic=1 THEN 'YES' ELSE 'NO' END) AS iron_folics,
        langandmed.medium_instruct as mediumetr,
        langandmed.lang_instruct as langetr,
        
        langandmed.medium_instrut,
        langandmed.other_medium,
        langandmed.lang_taught,
        
        spl_edtor,
        (CASE WHEN spl_edtor=1 THEN 'AT CLUSTER LEVEL' ELSE
            CASE WHEN spl_edtor=2 THEN 'DEDICATED' ELSE
                CASE WHEN spl_edtor=3 THEN 'NO' ELSE
                    CASE WHEN spl_edtor IS NULL THEN 'NO DATA' END END END END) AS spl_edtors,
                schoolnew_training_detail.stu_councel,
        (CASE WHEN schoolnew_training_detail.stu_councel=1 THEN 'YES' ELSE 'NO' END) AS stu_councels,
        IF(schoolnew_training_detail.sci_lab_sec=2,'NO',schoolnew_training_detail.tot_room) AS tot_room,
        schoolnew_profilecomplete.part_1,
        schoolnew_profilecomplete.part_2,
        schoolnew_profilecomplete.part_3,
        schoolnew_profilecomplete.part_4,
        schoolnew_profilecomplete.part_5,
        schoolnew_profilecomplete.part_6,
        schoolnew_profilecomplete.part_7,
        schoolnew_profilecomplete.part_8,
        schoolnew_profilecomplete.part_9,
        schoolnew_profilecomplete.part_10,
        enroll.*
    FROM schoolnew_basicinfo
    JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
    JOIN schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_basicinfo.school_id
    JOIN schoolnew_parliament ON schoolnew_parliament.id=schoolnew_basicinfo.parliament_id
    JOIN schoolnew_assembly ON schoolnew_assembly.id=schoolnew_basicinfo.assembly_id
    JOIN schoolnew_training_detail ON schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id
    JOIN schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=schoolnew_basicinfo.school_id
    JOIN schoolnew_textbook_detail ON schoolnew_textbook_detail.school_key_id=schoolnew_basicinfo.school_id

    JOIN (SELECT 
                schoolnew_district.id as district_id,
                schoolnew_district.district_name,
                schoolnew_edn_dist_mas.id as edu_dist_id,
                schoolnew_edn_dist_mas.edn_dist_name as edu_dist_name,
                schoolnew_block.id as block_id,
                schoolnew_block.block_name
            FROM
                schoolnew_district
            JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
            JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.district_code=schoolnew_district.id
            JOIN schoolnew_block ON schoolnew_block.district_id=schoolnew_district.id AND schoolnew_edn_dist_block.block_id
            GROUP BY district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
    ) AS locationentry ON locationentry.district_id=schoolnew_basicinfo.district_id AND locationentry.edu_dist_id=schoolnew_basicinfo.edu_dist_id AND locationentry.block_id=schoolnew_basicinfo.block_id 

    JOIN (SELECT  
            schoolnew_zone_type.zone_type,
            schoolnew_habitation_all.name as village_ward,
            schoolnew_localbody_all.name as village_munci,
            schoolnew_habitation_all.id as village_id
        FROM schoolnew_localbody_all
        JOIN schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
        JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
    ) AS localbodyall ON village_id=schoolnew_basicinfo.lb_habitation_id

    JOIN (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
            JOIN schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
            JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
    ) AS schooldirectrate ON schooldirectrate.directid=schoolnew_basicinfo.sch_directorate_id

    JOIN (SELECT * FROM schoolnew_type) as schoolnew_type ON schoolnew_type.id=schoolnew_academic_detail.scl_category
    JOIN (SELECT * FROM schoolnew_category) as schoolnew_category ON schoolnew_category.id=schoolnew_basicinfo.sch_cate_id
    LEFT JOIN (SELECT medid,landesc.school_key_id,medium_instruct,langid,lang_instruct,medium_instrut,other_medium,lang_taught FROM 
                (SELECT schoolnew_mediumentry.id as medid,schoolnew_mediumentry.school_key_id,
                    schoolnew_mediumofinstruction.MEDINSTR_DESC AS medium_instruct,medium_instrut,other_medium
                FROM schoolnew_mediumofinstruction
                JOIN schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=schoolnew_mediumofinstruction.MEDINSTR_ID) AS meddesc
            JOIN (SELECT schoolnew_langtaught_entry.id as langid,schoolnew_langtaught_entry.school_key_id,
                        schoolnew_mediumofinstruction.MEDINSTR_DESC AS lang_instruct,lang_taught
                    FROM schoolnew_mediumofinstruction
                    JOIN schoolnew_langtaught_entry ON schoolnew_langtaught_entry.lang_taught=schoolnew_mediumofinstruction.MEDINSTR_ID
    ) as landesc ON landesc.school_key_id=meddesc.school_key_id) AS langandmed ON langandmed.school_key_id=schoolnew_basicinfo.school_id

    LEFT JOIN (SELECT * FROM schoolnew_resitype) as schoolnew_resitype ON schoolnew_resitype.RESITYPE_ID=schoolnew_academic_detail.typ_resid_schl        
    LEFT JOIN schoolnew_safety_details ON schoolnew_safety_details.school_key_id=schoolnew_basicinfo.school_id
    LEFT JOIN schoolnew_sectionbyclass on schoolnew_sectionbyclass.school_key_id=schoolnew_basicinfo.school_id
    LEFT JOIN schoolnew_inventory_facility on schoolnew_inventory_facility.school_key_id=schoolnew_basicinfo.school_id
    LEFT JOIN schoolnew_profilecomplete ON schoolnew_profilecomplete.school_key_id=schoolnew_basicinfo.school_id
    JOIN (select 
    school_id,
    sum(class_studying_id = 13 and gender = 1) as enrol_lkg_boys, 
    sum(class_studying_id = 13 and gender = 2) as enrol_lkg_girls,
    sum(class_studying_id = 14 and gender = 1) as enrol_ukg_boys, 
    sum(class_studying_id = 14 and gender = 2) as enrol_ukg_girls,
    sum(year(now())-year(dob) <5 and class_studying_id = 1 and gender = 1) as grd1_boys_below_5,
    sum(year(now())-year(dob) <5 and class_studying_id = 1 and gender = 2) as grd1_girls_below_5,
    sum(year(now())-year(dob) =5 and class_studying_id = 1 and gender = 1) as grd1_boys_age_5,
    sum(year(now())-year(dob) =5 and class_studying_id = 1 and gender = 2) as grd1_girls_age_5, 
    sum(year(now())-year(dob) = 6 and class_studying_id = 1 and gender=1) as grd1_boys_age_6,
    sum(year(now())-year(dob) = 6 and class_studying_id = 1 and gender=2) as grd1_girls_age_6,
    sum(year(now())-year(dob) = 7 and class_studying_id = 1 and gender=1) as grd1_boys_age_7,
    sum(year(now())-year(dob) = 7 and class_studying_id = 1 and gender=2) as grd1_girls_age_7,
    sum(year(now())-year(dob) > 7 and class_studying_id = 1 and gender=1) as grd1_boys_above_7,
    sum(year(now())-year(dob) > 7 and class_studying_id = 1 and gender=2) as grd1_girls_above_7,
    sum(class_studying_id=1 and class_studying_id = 1 and gender=1) as grd1_tot_1_boys,
    sum(class_studying_id=1 and class_studying_id = 1 and gender=2) as grd1_tot_1_girls 
    from students_child_detail where school_id =".$schoolid." and transfer_flag=0) AS enroll
    WHERE schoolnew_basicinfo.school_id=".$schoolid.";";*/

    /**Query Commented by wesley**/

    }
    
    
    function getDayWorksTradeClubs($schoolid){
        $SQL="SELECT DISTINCTROW
	trade,voc_trade,clubs,extra_cc,other_cc,(SELECT category_name FROM schoolnew_type WHERE id=schoolnew_dayswork_entry.school_type) AS daywork_school_type,
    schoolnew_dayswork_entry.instr_dys, schoolnew_dayswork_entry.hrs_chldrn_sty_schl,schoolnew_dayswork_entry.mns_chldrn_sty_schl,schoolnew_dayswork_entry.hrs_tchrs_sty_schl,
	schoolnew_dayswork_entry.mns_tchrs_sty_schl,
	school_type,
    CONCAT(schoolnew_dayswork_entry.hrs_chldrn_sty_schl,':',IF((LENGTH(schoolnew_dayswork_entry.mns_chldrn_sty_schl)<2),CONCAT(schoolnew_dayswork_entry.mns_chldrn_sty_schl,0),schoolnew_dayswork_entry.mns_chldrn_sty_schl)) AS stud_hrs,
    CONCAT(schoolnew_dayswork_entry.hrs_tchrs_sty_schl,':',IF((LENGTH(schoolnew_dayswork_entry.mns_tchrs_sty_schl)<2),CONCAT(schoolnew_dayswork_entry.mns_tchrs_sty_schl,0),schoolnew_dayswork_entry.mns_tchrs_sty_schl)) AS teach_hrs,
	schoolnew_dayswork_entry.cce_impl,
	schoolnew_dayswork_entry.cce_cum,
	schoolnew_dayswork_entry.cce_shared,
    (CASE WHEN schoolnew_dayswork_entry.cce_impl=1 THEN 'YES' ELSE 'NO' END) AS cce_impls,
    (CASE WHEN schoolnew_dayswork_entry.cce_cum=1 THEN 'YES' ELSE 'NO' END) AS cce_cums,
    (CASE WHEN schoolnew_dayswork_entry.cce_shared=1 THEN 'YES' ELSE 'NO' END) AS cce_shareds
FROM schoolnew_dayswork_entry
JOIN (SELECT clubs,school_key_id,extra_cc,other_cc FROM schoolnew_extracc_entry
			JOIN schoolnew_club ON schoolnew_club.id=schoolnew_extracc_entry.extra_cc) AS clubsetr ON clubsetr.school_key_id=schoolnew_dayswork_entry.school_key_id
LEFT JOIN (SELECT IF(prevoc_course=1,trade,'NO') AS trade,schoolnew_voctrade_entry.school_key_id,schoolnew_voctrade_entry.voc_trade FROM schoolnew_voctrade_entry
			JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_voctrade_entry.school_key_id
			JOIN schoolnew_trade on schoolnew_trade.id=schoolnew_voctrade_entry.voc_trade) as voctrade ON voctrade.school_key_id=schoolnew_dayswork_entry.school_key_id
WHERE schoolnew_dayswork_entry.school_key_id=".$schoolid.";";
//echo($SQL);die();
        $query = $this->db->query($SQL);
		return $query->result_array();
    }
    function getBlocksClassRoomLibraryInspection($schoolid){
        $SQL="SELECT 
	schoolnew_natureofconst_entry.id as constr_id,
	schoolnew_natureofconst_entry.construct_type,
    (CASE WHEN schoolnew_natureofconst_entry.construct_type=1 THEN 'PUCCA' ELSE
		CASE WHEN schoolnew_natureofconst_entry.construct_type=2 THEN 'PARTIALLY PUCCA' ELSE
			CASE WHEN schoolnew_natureofconst_entry.construct_type=3 THEN 'KUTCHA' ELSE
				CASE WHEN schoolnew_natureofconst_entry.construct_type=4 THEN 'DEPLICATED BUILDING' ELSE
					CASE WHEN schoolnew_natureofconst_entry.construct_type=5 THEN 'BUILDING UNDER CONSTRUCTION' END END END END END) AS construct_types,
		schoolnew_natureofconst_entry.total_flrs,
        schoolnew_natureofconst_entry.tot_classrm_use,
        schoolnew_natureofconst_entry.tot_classrm_nouse,
        schoolnew_natureofconst_entry.off_room,
        schoolnew_natureofconst_entry.lab_room,
        schoolnew_natureofconst_entry.library_room,
        schoolnew_natureofconst_entry.comp_room,
        IFNULL(schoolnew_natureofconst_entry.art_room,'-') as art_room,
        schoolnew_natureofconst_entry.staff_room,
        schoolnew_natureofconst_entry.hm_room,
        schoolnew_natureofconst_entry.girl_room,
        IFNULL(schoolnew_natureofconst_entry.good_condition,'-') AS good_condition,
        IFNULL(schoolnew_natureofconst_entry.need_minorrep,'-') AS need_minorrep,
        IFNULL(schoolnew_natureofconst_entry.need_majorrep,'-') AS need_majorrep,
        schoolnew_natureofconst_entry.total_room,
		clsentry.school_type,
        clsentry.category_name,
        clsentry.num_rooms,
		schoolnew_library_entry.library_type,
        (CASE WHEN schoolnew_library_entry.library_type=1 THEN 'LIBRARY' ELSE
			CASE WHEN schoolnew_library_entry.library_type=2 THEN 'BOOK BANK' ELSE
				CASE WHEN schoolnew_library_entry.library_type=3 THEN 'READING CORNER' ELSE
					CASE WHEN schoolnew_library_entry.library_type=4 THEN 'NEWSPAPER MAGAZINES' ELSE
						CASE WHEN schoolnew_library_entry.library_type=5 THEN 'NONE' END END END END END) AS library_types,
					
		schoolnew_library_entry.num_books,schoolnew_library_entry.ncert_books,
        
        
        schoolnew_inspection_entry.id as inspectid,
    (CASE WHEN schoolnew_inspection_entry.officer_type=0 THEN 'N/A' ELSE
		CASE WHEN schoolnew_inspection_entry.officer_type=1 THEN 'CEO' ELSE
			CASE WHEN schoolnew_inspection_entry.officer_type=2 THEN 'DEO' ELSE
				-- CASE WHEN schoolnew_inspection_entry.officer_type=3 THEN 'BEO' ELSE
                CASE WHEN schoolnew_inspection_entry.officer_type=3 THEN 'BEO/BRC' ELSE
					CASE WHEN schoolnew_inspection_entry.officer_type=4 THEN 'DDRO' ELSE
						-- CASE WHEN schoolnew_inspection_entry.officer_type=5 THEN 'EDU. OFFICER (CORP.)' ELSE
                        CASE WHEN schoolnew_inspection_entry.officer_type=5 THEN 'CRC Co-ordinator' ELSE
							-- CASE WHEN schoolnew_inspection_entry.officer_type=6 THEN 'ASST. EDU. OFFICER (CORP.)'
                            CASE WHEN schoolnew_inspection_entry.officer_type=6 THEN 'State level Officers' ELSE
                                CASE WHEN schoolnew_inspection_entry.officer_type=7 THEN 'Educational Officer(Corporation)' ELSE
                                    CASE WHEN schoolnew_inspection_entry.officer_type=8 THEN 'Asst Educational Officer(Corporation)' END END END END END END END END END) AS officer_types,schoolnew_inspection_entry.officer_type,
     (CASE WHEN schoolnew_inspection_entry.purpose=1 THEN 'AUDIT' ELSE
		CASE WHEN schoolnew_inspection_entry.purpose=2 THEN 'ACADEMIC' ELSE
			CASE WHEN schoolnew_inspection_entry.purpose=3 THEN 'NON-ACADEMIC' END END END) AS purposes,purpose,
	DATE_FORMAT(schoolnew_inspection_entry.date_inspect,\"%d/%m/%Y\") as date_inspect
    
FROM schoolnew_basicinfo
JOIN schoolnew_inspection_entry ON schoolnew_inspection_entry.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_natureofconst_entry ON schoolnew_natureofconst_entry.school_key_id=schoolnew_basicinfo.school_id
JOIN (SELECT schoolnew_classroomlevel_entry.id as clsetry_id,schoolnew_classroomlevel_entry.school_type,school_key_id,category_name,num_rooms FROM schoolnew_classroomlevel_entry 
		JOIN schoolnew_type ON schoolnew_type.id=schoolnew_classroomlevel_entry.school_type
) AS clsentry  ON clsentry.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_library_entry ON schoolnew_library_entry.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=".$schoolid.";";
        $query = $this->db->query($SQL);
		return $query->result_array();
    }
    function getEquipLabInternet($schoolid){
        $SQL="SELECT 
	labetrid,Lab,seperate_rooms,seperate_room,condition_nows,condition_now,
	lab_id,
    eqipid,ictkit,kitsupplier,quantity,
    invenid,inven_avail,inven_working,
	inven_item,
	inventry_id,
	invensupp,
    IF(internetid IS NULL,'0',internetid) as internet,
    IF(internetid IS NULL,'N/A',subscriber) as subscriber,
    IF(internetid IS NULL,'N/A',data_speed) as data_speed,
    IF(internetid IS NULL,'N/A',provided_by) as provided_by,
	range_unit,
	provided_bys,
	data_speeds,
    ictetrid,
	avail_nos,
	working_nos,
	ict_type,
	supplied_by,
	ictentry.supplied_by,
	ictentry.supplied_bys,
	ictentry.purposes,
	ictentry.purpose,
	ictentry.ict,
	equipetr.equip_id,
	equipetr.tot_func,
	purpose
FROM schoolnew_basicinfo
JOIN (SELECT schoolnew_labentry.id as labetrid,school_key_id,schoolnew_lab.Lab,seperate_room,lab_id,
(CASE WHEN seperate_room=1 THEN 'SEPERATE ROOM' ELSE 'NO SEPERATE ROOM' END) AS seperate_rooms,
(CASE WHEN condition_now=1 THEN 'FULLY EQUIPPED' ELSE
	CASE WHEN condition_now=2 THEN 'PARTIALLY EQUIPPED' ELSE
		CASE WHEN condition_now=3 THEN 'NOT APPLICABLE' END END END) AS condition_nows,condition_now FROM schoolnew_labentry
JOIN schoolnew_lab ON schoolnew_lab.id=schoolnew_labentry.lab_id) AS ictlab ON ictlab.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_equipment.id as eqipid,equip_id, school_key_id,schoolnew_ict_list.ict_type as ictkit, 
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_equipment.ngo_name) ELSE supplier_name END) AS kitsupplier,
quantity,tot_func
FROM schoolnew_equipment 
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_equipment.equip_id
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_equipment.supplied_by) AS equipetr ON equipetr.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_inventry.inventry_id,
schoolnew_inventry.id as invenid,school_key_id,avail_nos as inven_avail,working_nos as inven_working,ict_type as inven_item,
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_inventry.donor_invent) ELSE supplier_name END) AS invensupp
FROM schoolnew_inventry 
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_inventry.inventry_id
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_inventry.supplied_by) AS schoolinventory ON schoolinventory.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_ictentry.id as ictetrid,school_key_id,avail_nos,working_nos,schoolnew_ict_list.ict_type,schoolnew_ictentry.ict_type as ict,supplied_by,
	
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_ictentry.donor_ict) ELSE supplier_name END) AS supplied_bys,
(CASE WHEN purpose=1 THEN 'TEACHING' ELSE
	CASE WHEN purpose=2 THEN 'ADMINISTRATIVE' ELSE
		CASE WHEN purpose=3 THEN 'ACADEMIC' ELSE
			CASE WHEN purpose=4 THEN 'NONE' END END END END) AS purposes,purpose
FROM schoolnew_ictentry
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_ictentry.ict_type 
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_ictentry.supplied_by) AS ictentry ON ictentry.school_key_id=schoolnew_basicinfo.school_id

LEFT JOIN (SELECT schoolnew_internet.id as internetid,school_key_id,subscriber,
(CASE WHEN range_unit=1 THEN CONCAT(data_speed,' Kbps') ELSE
	CASE WHEN range_unit=2 THEN CONCAT(data_speed,' KBps') ELSE
		CASE WHEN range_unit=3 THEN CONCAT(data_speed,' Mbps') ELSE
			CASE WHEN range_unit=4 THEN CONCAT(data_speed,' MBps') END END END END) AS data_speeds,
		
(CASE WHEN provided_by=15 THEN CONCAT(supplier_name,'-',schoolnew_internet.other_ngo) ELSE supplier_name END) AS provided_bys,provided_by,data_speed,range_unit

FROM schoolnew_internet 
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_internet.provided_by) AS interetr ON interetr.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=".$schoolid.";";
        $query = $this->db->query($SQL);
		return $query->result_array();
    }
    function getFeesUdisePlusFund($schoolid){
        $SQL="SELECT 
    endow_amt,
    (SELECT bank FROM schoolnew_bank WHERE schoolnew_bank.id = endow_bank_id) AS endow_bank_ids,
	endow_bank_id,
    DATE_FORMAT(endow_date_deposit, '%d/%m/%Y') AS endow_date_deposit,
    DATE_FORMAT(endow_date_maturity, '%d/%m/%Y') AS endow_date_maturity,
    endow_certif,
    corp_amt,
	corp_bank_id,
    (SELECT bank FROM schoolnew_bank WHERE schoolnew_bank.id = corp_bank_id) AS corp_bank_ids,
    DATE_FORMAT(corp_date_deposit, '%d/%m/%Y') AS corp_date_deposit,
    corp_accno,
    trust_name,
    trust_address,trust_pincode,trust, DATE_FORMAT(trustdate, '%d/%m/%Y') AS trustdate,trustplacereg,
    brlbks_prebys,brlbks_pregls,brlbks_elebys,brlbks_elegls,brlbks_uppbys,brlbks_uppgls,brailbks_secbys,brlbks_secgls,brailbks_hsecbys,brlbks_hsegls,
    brlkit_prebys,brlkit_pregls,brlkit_elebys,brlkit_elegls,brlkit_uppbys,brlkit_uppgls,brailkit_secbys,brlkit_secgls,brailkit_hsecbys,brlkit_hsegls,
    lvnkit_prebys,lvnkit_pregls,lvnkit_elebys,lvnkit_elegls,lvnkit_uppbys,lvnkit_uppgls,lvnkit_secbys,lvnkit_secgls,lvnkit_hsecbys,lvnkit_hsegls,
    hearaid_prebys,hearaid_pregls,hearaid_elebys,hearaid_elegls,hearaid_uppbys,hearaid_uppgls,hearaid_secbys,hearaid_secgls,hearaid_hsecbys,hearaid_hsegls,
    braces_prebys,braces_pregls,braces_elebys,braces_elegls,braces_uppbys,braces_uppgls,braces_secbys,braces_secgls,braces_hsecbys,braces_hsegls,
    crthes_prebys,crthes_pregls,crthes_elebys,crthes_elegls,crthes_uppbys,crthes_uppgls,crthes_secbys,crthes_secgls,crthes_hsecbys,crthes_hsegls,
    whlchr_prebys,whlchr_pregls,whlchr_elebys,whlchr_elegls,whlchr_uppbys,whlchr_uppgls,whlchr_secbys,whlchr_secgls,whlchr_hsecbys,whlchr_hsegls,
    tricyle_prebys,tricyle_pregls,tricyle_elebys,tricyle_elegls,tricyle_uppbys,tricyle_uppgls,tricyle_secbys,tricyle_secgls,tricyle_hsecbys,tricyle_hsegls,
    caliper_prebys,caliper_pregls,caliper_elebys,caliper_elegls,caliper_uppbys,caliper_uppgls,caliper_secbys,caliper_secgls,caliper_hsecbys,caliper_hsegls,
    escort_prebys,escort_pregls,escort_elebys,escort_elegls,escort_uppbys,escort_uppgls,escort_secbys,escort_secgls,escort_hsecbys,escort_hsegls,
    stipend_prebys,stipend_pregls,stipend_elebys,stipend_elegls,stipend_uppbys,stipend_uppgls,stipend_secbys,stipend_secgls,stipend_hsecbys,stipend_hsegls,
    schoolnew_feestruct.id as feesid,
	(SELECT baseapp_class_studying.class_studying FROM baseapp_class_studying WHERE id=class_id) as class_ids,
	class_id,
    inst_fee,tution_fee,regular_fee,transport_fee,annual_fee,book_fee,lab_fee,other_fee,total_fee,
    ssadevep_recept,ssadevep_expdtre,ssamntn_recept,ssamntn_expdtre,ssatlm_recept,ssatlm_expdtre,ssacivil_recept,
    ssacivil_expdtre,ssaannual_recept,ssaannual_expdtre,ssamnr_recept,ssamnr_expdtre,ssarpr_recept,ssarpr_expdtre,
    ssapur_recept,ssapur_expdtre,ssametwtr_recept,ssametwtr_expdtre,ssaoth_recept,ssaoth_expdtre,ssatot_recept,ssatot_expdtre,
    ssacmpste_recept,ssacmpste_expdtre,ssalibg_recept,ssalibg_expdtre,ssaped_recept,ssaped_expdtre,ssamedia_recept,ssamedia_expdtre,
    ssatrngsmcdc_recept,ssatrngsmcdc_expdtre,ssapreschl_recept,ssapreschl_expdtre,
	
    IF(ngo_fince=1,CONCAT(ngo_name,'-',ngo_amt,' Rs.'),'NO') AS ngo_names,
    IF(psu_fince=1,CONCAT(psu_name,'-',psu_amt,' Rs.'),'NO') AS psu_names,
	ngo_name,
	psu_name,
	ngo_amt,
	psu_amt,
	
	ngo_fince,
	
	psu_fince,
	
    (CASE WHEN main_com=1 THEN 'YES' ELSE 'NO' END) AS main_coms,
    (CASE WHEN sprts_equip=1 THEN 'YES' ELSE 'NO' END) AS sprts_equips,
    (CASE WHEN lib_boks=1 THEN 'YES' ELSE 'NO' END) AS lib_bokss,
    noteacher_adhar,
    (CASE WHEN stuatdnce_elet=1 THEN 'YES' ELSE 'NO' END) AS stuatdnce_elets,
    (CASE WHEN tchratdnce_elet=1 THEN 'YES' ELSE 'NO' END) AS tchratdnce_elets,
    (CASE WHEN schlevl_cmp=1 THEN 'YES' ELSE 'NO' END) AS schlevl_cmps,
    (CASE WHEN schl_imp=1 THEN 'YES' ELSE 'NO' END) AS schl_imps,
    (CASE WHEN schlreg_pfms=1 THEN 'YES' ELSE 'NO' END) AS schlreg_pfmss,
	schoolnew_finance_details.schl_imp,
	schoolnew_finance_details.schlevl_cmp,
	schoolnew_finance_details.stuatdnce_elet,
	schoolnew_finance_details.tchratdnce_elet,
	schoolnew_finance_details.lib_boks,
	schoolnew_finance_details.main_com,
	schoolnew_finance_details.sprts_equip,
	schoolnew_finance_details.schlreg_pfms,
	
	schoolnew_finance_details.ssagrntmjrrpr_recept, 
schoolnew_finance_details.ssagrntmjrrpr_expdtre,
schoolnew_finance_details.comu_fince,
schoolnew_finance_details.comu_name, 
schoolnew_finance_details.comu_amt, 
schoolnew_finance_details.othr_fince,
schoolnew_finance_details.othr_name,
schoolnew_finance_details.othr_amt
	
FROM schoolnew_basicinfo
LEFT JOIN schoolnew_grants_details ON schoolnew_grants_details.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_finance_details ON schoolnew_finance_details.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_fund ON schoolnew_fund.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_feestruct ON schoolnew_feestruct.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=".$schoolid.";";
        $query = $this->db->query($SQL);
		return $query->result_array();
    }
	
    
    function AllDataOnce($allData,$school_id=""){
        if($school_id==""){
            $ts =explode(".",getallheaders()['Token']);
    		$token=json_decode(base64_decode($ts[1]),true);
    		$emis_loggedin =$token['status']; 
            $school_id = $token['school_id'];
        }
        $this->db->trans_start();
        foreach($allData as $tablename => $tableData){
            if(!is_array(array_shift(array_values($tableData)))){   //Finding Single Insert or Batch Insert
                $reference=array(array_search($school_id,$tableData)=>$school_id);
                $refindex=array_search($school_id,$tableData);
                if($reference!="" && $refindex!=""){
                    $SQL="SELECT ".array_search($school_id,$tableData)." FROM ".$tablename." WHERE ".array_search($school_id,$tableData)."=".$school_id;
                    $result=$this->db->query($SQL)->result_array();
                    if(count($result)>0){       //Find Insert or Update
                        $this->db->update($tablename, $tableData, $reference);
                    }else{
                        $this->db->insert($tablename, $tableData);
                    }
                }else{
                    return false;
                }
            }else{
                $reference=array(array_search($school_id,$tableData[0])=>$school_id);
                $refindex=array_search($school_id,$tableData[0]);
                //print_r(array($refindex => $reference[$refindex]));die();
                if($this->db->delete($tablename,array($refindex => $reference[$refindex]))){
					//print_r($this->db->last_query());die();
                    $this->db->insert_batch($tablename,$tableData);
                }
                //die("Multi Insert Is Not Supported Right Now");
            }
            
            if ($this->db->trans_status() === FALSE){
                return false;
            }
        }
        $this->db->trans_complete();
        return true;
        
    }
    
    function renewalDataAtOnce($data){
        $this->db->trans_start();
        foreach($data as $tablename => $tableData){
            if(!is_array(array_shift(array_values($tableData)))){   //Finding Single Insert or Batch Insert
                $this->db->insert($tablename, $tableData);
            }else{
                $this->db->insert_batch($tablename, $tableData);
            }
            if ($this->db->trans_status() === FALSE){
                //return false;
            }
        }
        $this->db->trans_complete();
        return true;
    }
    
    function getRenewalID(){
        $SQL="SELECT id FROM schoolnew_renewal ORDER BY id DESC LIMIT 1;";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    function enrollmentDetails42a($ac_year,$udise_sch_code,$repeaters,$itemgroup,$dist_id,$edu_dist_id){
        /*$SQL="SELECT * FROM(SELECT
        mhrd_sch_enr_fresh.udise_sch_code,
        mhrd_sch_enr_fresh.ac_year,
        item_group,
        (CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=1 THEN 'GENERAL' ELSE
            CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=2 THEN 'SC' ELSE
                CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=3 THEN 'ST' ELSE
                    CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=4 THEN 'OBC' END
                END
            END
        END) AS items,
        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_fresh
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_fresh GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
            //echo($SQL);die();
            if(!empty($dist_id) || !empty($edu_dist_id)){
                if(!empty($dist_id)){
                    $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.district_id";
                    $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.district_id";
                }
                else if(!empty($edu_dist_id)){
                    $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                    $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                }
                $SQL = "SELECT * FROM
                    (SELECT
                    -- sc.district_name as dist,
                    f.ac_year,
                    item_group,
                    (CASE WHEN f.item_group=1 AND f.item_id=1 THEN 'GENERAL' ELSE
                    CASE WHEN f.item_group=1 AND f.item_id=2 THEN 'SC' ELSE
                    CASE WHEN f.item_group=1 AND f.item_id=3 THEN 'ST' ELSE
                    CASE WHEN f.item_group=1 AND f.item_id=4 THEN 'OBC' END
                    END
                    END
                    END) AS items,
                    sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
                    sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
                    AS item_total
                    FROM mhrd_sch_enr_fresh f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1 ,items
                    UNION ALL
                    SELECT
                    -- sc.district_name as dist,
                    t.ac_year,
                    item_group,
                    'TOTAL' AS items,
                    sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
                    sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
                    AS item_total
                    FROM mhrd_enr_total t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 ) AS
                    enr_total_fresh
                    WHERE  ac_year='".$ac_year."' AND item_group='".$itemgroup."' order by items;";
            }else{
                $SQL="SELECT * FROM
                    (SELECT
                        mhrd_sch_enr_fresh.udise_sch_code,
                        mhrd_sch_enr_fresh.ac_year,
                        item_group,
                        (CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=1 THEN 'GENERAL' ELSE
                            CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=2 THEN 'SC' ELSE
                                CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=3 THEN 'ST' ELSE
                                    CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=4 THEN 'OBC' END
                                END
                            END
                        END) AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                    FROM mhrd_sch_enr_fresh where udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."'
                    UNION ALL
                    SELECT
                        mhrd_enr_total.udise_sch_code,
                        mhrd_enr_total.ac_year,
                        item_group,
                        'TOTAL' AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                    FROM mhrd_enr_total where udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_id='".$itemgroup."' AND item_group='".$repeaters."' ) AS enr_total_fresh 
                WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' ORDER BY items";


            }
            
            
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails42b($ac_year,$udise_sch_code,$repeaters,$itemgroup,$dist_id,$edu_dist_id){
        /*$SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_fresh.udise_sch_code,
            	mhrd_sch_enr_fresh.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=5 THEN 'MUSLIM' ELSE
	               CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=6 THEN 'CHRISTIAN' ELSE
	                   CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=7 THEN 'SIKH' ELSE
				            CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=8 THEN 'BUDDHIST' ELSE
				                CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=9 THEN 'PARSI' ELSE
				                    CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=10 THEN 'JAIN' ELSE
								        CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END 
								    END 
								END 
				            END 
				        END 
                    END 
				END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_fresh
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_fresh GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
    if(!empty($dist_id) || !empty($edu_dist_id)){

            if(!empty($dist_id)){
                $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.district_id";
                $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.district_id";
            }
            else if(!empty($edu_dist_id)){
                $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
            }

            $SQL="SELECT * FROM(SELECT
            -- sc.district_name as dist,
            f.ac_year,
            item_group,
            (CASE WHEN f.item_group=2 AND f.item_id=5 THEN 'MUSLIM' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=6 THEN 'CHRISTIAN' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=7 THEN 'SIKH' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=8 THEN 'BUDDHIST' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=9 THEN 'PARSI' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=10 THEN 'JAIN' ELSE
            CASE WHEN f.item_group=2 AND f.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END
            END
            END
            END
            END
            END
            END) AS items,
            sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
            sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
            AS item_total
            FROM mhrd_sch_enr_fresh f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1 ,items
            UNION ALL
            SELECT
            -- sc.district_name as dist,
            t.ac_year,
            item_group,
            'TOTAL' AS items,
            sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
            sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
            AS item_total
            FROM mhrd_enr_total t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 ) AS
            enr_total_fresh
            WHERE  ac_year='".$ac_year."' AND item_group='".$itemgroup."' order by items ;";
        }else{
            $SQL="SELECT * FROM(SELECT
                    mhrd_sch_enr_fresh.udise_sch_code,
                    mhrd_sch_enr_fresh.ac_year,
                    item_group,
                    (CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=5 THEN 'MUSLIM' ELSE
                    CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=6 THEN 'CHRISTIAN' ELSE
                        CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=7 THEN 'SIKH' ELSE
                                CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=8 THEN 'BUDDHIST' ELSE
                                    CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=9 THEN 'PARSI' ELSE
                                        CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=10 THEN 'JAIN' ELSE
                                            CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END 
                                        END 
                                    END 
                                END 
                            END 
                        END 
                    END) AS items,
                    cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
            (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
        FROM mhrd_sch_enr_fresh WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."'
        UNION ALL
                        SELECT
                            mhrd_enr_total.udise_sch_code,
                            mhrd_enr_total.ac_year,
                            item_group,
                            'TOTAL' AS items,
                            cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                            (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                        FROM mhrd_enr_total WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group='".$repeaters."' AND item_id=".$itemgroup.") AS enr_total_fresh
                    WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' ORDER BY items";
        }
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails42c($ac_year,$udise_sch_code,$repeaters,$itemgroup,$dist_id,$edu_dist_id){
        /*$SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_fresh.udise_sch_code,
            	mhrd_sch_enr_fresh.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=12 THEN 'HAVING AADHAR' ELSE
            				CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'BPL' END 
     			END) AS items,
                 cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_fresh
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_fresh GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
        if(!empty($dist_id) || !empty($edu_dist_id)){
           // echo $dist_id;die();
                if(!empty($dist_id)){
                    $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.district_id";
                    $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.district_id";
                }
                else if(!empty($edu_dist_id)){
                    $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                    $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                }
               $SQL="SELECT * FROM(SELECT
                -- sc.district_name as dist,
                f.ac_year,
                item_group,
                (CASE WHEN f.item_group=3 AND f.item_id=12 THEN 'HAVING AADHAR' ELSE
            				CASE WHEN f.item_group=3 AND f.item_id=13 THEN 'BPL' END 
     			END) AS items,
                sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
                sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
                AS item_total
                FROM mhrd_sch_enr_fresh f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1 ,items
                UNION ALL
                SELECT
                -- sc.district_name as dist,
                t.ac_year,
                item_group,
                'TOTAL' AS items,
                sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
                sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
                AS item_total
                FROM mhrd_enr_total t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 ) AS
                enr_total_fresh
                WHERE  ac_year='".$ac_year."' AND item_group='".$itemgroup."' order by items;";
            }else{
                $SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_fresh.udise_sch_code,
            	mhrd_sch_enr_fresh.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=12 THEN 'HAVING AADHAR' ELSE
            				CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'BPL' END 
     			END) AS items,
                 cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                    (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                FROM mhrd_sch_enr_fresh WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup."
                UNION ALL
                    SELECT
                        mhrd_enr_total.udise_sch_code,
                        mhrd_enr_total.ac_year,
                        item_group,
                        'TOTAL' AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                    FROM mhrd_enr_total WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_id=".$itemgroup." AND item_group=".$repeaters.") AS enr_total_fresh
                WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup." ORDER BY items";
            }
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails42d($ac_year,$udise_sch_code,$repeaters,$itemgroup,$dist_id,$edu_dist_id){
        //echo("rep :".$repeaters."\n"."udise:".$udise_sch_code."\n"."ac_year:".$ac_year."\n"."item_group:".$itemgroup);die();
        /*$SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_fresh.udise_sch_code,
            	mhrd_sch_enr_fresh.ac_year,
                item_group,item_id,
            	(CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'TRANSGENDER' ELSE 'NODATA' END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_fresh
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,item_id,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_fresh WHERE item_group=3 AND item_id=13 GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=3 AND item_id=13 AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
    if(!empty($dist_id) || !empty($edu_dist_id)){
        // echo $dist_id;die();
             if(!empty($dist_id)){
                 $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.district_id";
                 $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.district_id";
             }
             else if(!empty($edu_dist_id)){
                 $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                 $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
             }
            $SQL="SELECT * FROM(SELECT
             -- sc.district_name as dist,
             f.ac_year,
             item_group,
             (CASE WHEN f.item_group='".$itemgroup."' AND f.item_id='".$repeaters."' THEN 'TRANSGENDER' ELSE 'NODATA' END) AS items,
             sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
             sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
             AS item_total
             FROM mhrd_sch_enr_fresh f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1 ,items
             UNION ALL
             SELECT
             -- sc.district_name as dist,
             t.ac_year,
             item_group,
             'TOTAL' AS items,
             sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
             sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
             AS item_total
             FROM mhrd_sch_enr_fresh t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 ) AS
             enr_total_fresh
             WHERE  ac_year='".$ac_year."' AND item_group='".$itemgroup."' order by items;";
         }else{
            //  $SQL="SELECT * FROM(SELECT
            //              mhrd_sch_enr_fresh.udise_sch_code,
            //              mhrd_sch_enr_fresh.ac_year,
            //              item_group,item_id,
            //              (CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'TRANSGENDER' ELSE 'NODATA' END) AS items,
            //              cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
            //      (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
            //  FROM mhrd_sch_enr_fresh WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup."
            //  UNION ALL
            //                  SELECT
            //                      mhrd_enr_total.udise_sch_code,
            //                      mhrd_enr_total.ac_year,
            //                      item_group,item_id,
            //                      'TOTAL' AS items,
            //                      cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
            //                      (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
            //                  FROM mhrd_enr_total WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_id=".$itemgroup." AND item_group=".$repeaters.") AS enr_total_fresh
            //              WHERE item_group=3 AND item_id=13 AND udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup." ORDER BY items";
            //echo "hi";die();
        
            $SQL="SELECT * FROM(SELECT
                        mhrd_sch_enr_fresh.udise_sch_code,
                        mhrd_sch_enr_fresh.ac_year,
                        item_group,item_id,
                        (CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'TRANSGENDER' ELSE 'NODATA' END) AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
            FROM mhrd_sch_enr_fresh WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup."
            UNION ALL
                            SELECT
                                mhrd_enr_total.udise_sch_code,
                                mhrd_enr_total.ac_year,
                                item_group,item_id,
                                'TOTAL' AS items,
                                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                                (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                            FROM mhrd_enr_total WHERE udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_id=".$repeaters." AND item_group=".$itemgroup.") AS enr_total_fresh
                        WHERE item_group=".$itemgroup." AND item_id=".$repeaters." AND udise_sch_code='".$udise_sch_code."' AND ac_year='".$ac_year."' AND item_group=".$itemgroup." ORDER BY items";
            
            }
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails45a($ac_year,$udise_sch_code,$repeaters,$itemgroup){
         
        /**Commented by wesley**/
        /*   $SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_reptr.udise_sch_code,
            	mhrd_sch_enr_reptr.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=1 THEN 'GENERAL' ELSE
            		CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=2 THEN 'SC' ELSE
            			CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=3 THEN 'ST' ELSE
            				CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=4 THEN 'OBC' END
            			END
            		END
            	END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_reptr
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_reptr GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
    /**Commented by wesley**/

    /**Added by wesley**/
    $SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_reptr.udise_sch_code,
            	mhrd_sch_enr_reptr.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=1 THEN 'GENERAL' ELSE
            		CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=2 THEN 'SC' ELSE
            			CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=3 THEN 'ST' ELSE
            				CASE WHEN mhrd_sch_enr_reptr.item_group=1 AND mhrd_sch_enr_reptr.item_id=4 THEN 'OBC' END
            			END
            		END
            	END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_reptr
    UNION ALL
                    SELECT
                        mhrd_sch_enr_reptr.udise_sch_code,
                        mhrd_sch_enr_reptr.ac_year,
                        item_group,
                        'TOTAL' AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                    FROM mhrd_sch_enr_reptr GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";
    /**Added by wesley**/
        
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails45b($ac_year,$udise_sch_code,$repeaters,$itemgroup){
    /**Commented by wesley */    
        /*$SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_reptr.udise_sch_code,
            	mhrd_sch_enr_reptr.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=5 THEN 'MUSLIM' ELSE
	               CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=6 THEN 'CHRISTIAN' ELSE
	                   CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=7 THEN 'SIKH' ELSE
				            CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=8 THEN 'BUDDHIST' ELSE
				                CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=9 THEN 'PARSI' ELSE
				                    CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=10 THEN 'JAIN' ELSE
								        CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END 
								    END 
								END 
				            END 
				        END 
                    END 
				END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_reptr
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,item_group,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_reptr GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';"; */

    /**Commented by wesley**/


    /**Added by wesley**/

    $SQL="SELECT * FROM(SELECT
            	mhrd_sch_enr_reptr.udise_sch_code,
            	mhrd_sch_enr_reptr.ac_year,
                item_group,
            	(CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=5 THEN 'MUSLIM' ELSE
	               CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=6 THEN 'CHRISTIAN' ELSE
	                   CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=7 THEN 'SIKH' ELSE
				            CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=8 THEN 'BUDDHIST' ELSE
				                CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=9 THEN 'PARSI' ELSE
				                    CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=10 THEN 'JAIN' ELSE
								        CASE WHEN mhrd_sch_enr_reptr.item_group=2 AND mhrd_sch_enr_reptr.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END 
								    END 
								END 
				            END 
				        END 
                    END 
				END) AS items,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_reptr
    UNION ALL
    SELECT
                        mhrd_sch_enr_reptr.udise_sch_code,
                        mhrd_sch_enr_reptr.ac_year,
                        item_group,
                        'TOTAL' AS items,
                        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
                    FROM mhrd_sch_enr_reptr GROUP BY item_group,udise_sch_code) AS item_total) AS item_list_type
    WHERE item_group=".$itemgroup." AND ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";

    /**Added by wesley**/    
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            //echo($this->db->last_query());die();
            return $query->result_array();
    }
    function enrollmentDetails($ac_year,$udise_sch_code,$repeaters,$itemgroup,$dist_id,$edu_dist_id){
        $SQL="SET @repeaters=".$repeaters.",@itemgroup=".$itemgroup.";";
        $query = $this->db->query($SQL);
        if($repeaters<=4){ //Others Enrollments
                    /*$SQL="SET @repeaters=".$repeaters.",@itemgroup=".$itemgroup.";";
        $query = $this->db->query($SQL);
                    //echo($this->db->last_query());
        $SQL="SELECT
            	mhrd_sch_enr_fresh.udise_sch_code,
                mhrd_sch_enr_fresh.ac_year,
                (CASE WHEN (mhrd_sch_enr_reptr.item_group=mhrd_sch_enr_fresh.item_group AND mhrd_sch_enr_reptr.item_id=mhrd_sch_enr_fresh.item_id) THEN
            		CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=1 THEN 'GENERAL' ELSE
            			CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=2 THEN 'SC' ELSE
            				CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=3 THEN 'ST' ELSE
            					CASE WHEN mhrd_sch_enr_fresh.item_group=1 AND mhrd_sch_enr_fresh.item_id=4 THEN 'OBC' ELSE
            						CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=5 THEN 'MUSLIM' ELSE
            							CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=6 THEN 'CHRISTIAN' ELSE
            								CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=7 THEN 'SIKH' ELSE
            									CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=8 THEN 'BUDDHIST' ELSE
            										CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=9 THEN 'PARSI' ELSE
            											CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=10 THEN 'JAIN' ELSE
            												CASE WHEN mhrd_sch_enr_fresh.item_group=2 AND mhrd_sch_enr_fresh.item_id=11 THEN 'OTHER' ELSE 'ITEMID' END 
            											END 
            										END 
            									END 
            								END 
            							END 
            						END 
            					END 
            				END 
            			END 
            		END 
            	ELSE 
            		CASE WHEN @itemgroup>2 THEN 
            			CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=12 THEN 'HAVING AADHAR' ELSE
            				CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=13 THEN 'BPL' ELSE
            					CASE WHEN mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id=14 THEN 'TRANSGENDER' ELSE 'NODATA' END 
            				END 
            			END
            		END
                END) AS items,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.cpp_b IS NULL,0,mhrd_sch_enr_reptr.cpp_b)+mhrd_sch_enr_fresh.cpp_b) ELSE SUM(mhrd_sch_enr_reptr.cpp_g) END) AS classpp_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.cpp_g IS NULL,0,mhrd_sch_enr_reptr.cpp_g)+mhrd_sch_enr_fresh.cpp_g) ELSE SUM(mhrd_sch_enr_reptr.cpp_g) END) AS classpp_girls,    
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c1_b IS NULL,0,mhrd_sch_enr_reptr.c1_b)+mhrd_sch_enr_fresh.c1_b) ELSE SUM(mhrd_sch_enr_reptr.c1_b) END) AS class1_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c1_g IS NULL,0,mhrd_sch_enr_reptr.c1_g)+mhrd_sch_enr_fresh.c1_g) ELSE SUM(mhrd_sch_enr_reptr.c1_g) END) AS class1_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c2_b IS NULL,0,mhrd_sch_enr_reptr.c2_b)+mhrd_sch_enr_fresh.c2_b) ELSE SUM(mhrd_sch_enr_reptr.c2_b) END) AS class2_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c2_g IS NULL,0,mhrd_sch_enr_reptr.c2_g)+mhrd_sch_enr_fresh.c2_g) ELSE SUM(mhrd_sch_enr_reptr.c2_g) END) AS class2_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c3_b IS NULL,0,mhrd_sch_enr_reptr.c3_b)+mhrd_sch_enr_fresh.c3_b) ELSE SUM(mhrd_sch_enr_reptr.c3_b) END) AS class3_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c3_g IS NULL,0,mhrd_sch_enr_reptr.c3_g)+mhrd_sch_enr_fresh.c3_g) ELSE SUM(mhrd_sch_enr_reptr.c3_g) END) AS class3_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c4_b IS NULL,0,mhrd_sch_enr_reptr.c4_b)+mhrd_sch_enr_fresh.c4_b) ELSE SUM(mhrd_sch_enr_reptr.c4_b) END) AS class4_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c4_g IS NULL,0,mhrd_sch_enr_reptr.c4_g)+mhrd_sch_enr_fresh.c4_g) ELSE SUM(mhrd_sch_enr_reptr.c4_g) END) AS class4_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c5_b IS NULL,0,mhrd_sch_enr_reptr.c5_b)+mhrd_sch_enr_fresh.c5_b) ELSE SUM(mhrd_sch_enr_reptr.c5_b) END) AS class5_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c5_g IS NULL,0,mhrd_sch_enr_reptr.c5_g)+mhrd_sch_enr_fresh.c5_g) ELSE SUM(mhrd_sch_enr_reptr.c5_g) END) AS class5_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c6_b IS NULL,0,mhrd_sch_enr_reptr.c6_b)+mhrd_sch_enr_fresh.c6_b) ELSE SUM(mhrd_sch_enr_reptr.c6_b) END) AS class6_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c6_g IS NULL,0,mhrd_sch_enr_reptr.c6_g)+mhrd_sch_enr_fresh.c6_g) ELSE SUM(mhrd_sch_enr_reptr.c6_g) END) AS class6_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c7_b IS NULL,0,mhrd_sch_enr_reptr.c7_b)+mhrd_sch_enr_fresh.c7_b) ELSE SUM(mhrd_sch_enr_reptr.c7_b) END) AS class7_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c7_g IS NULL,0,mhrd_sch_enr_reptr.c7_g)+mhrd_sch_enr_fresh.c7_g) ELSE SUM(mhrd_sch_enr_reptr.c7_g) END) AS class7_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c8_b IS NULL,0,mhrd_sch_enr_reptr.c8_b)+mhrd_sch_enr_fresh.c8_b) ELSE SUM(mhrd_sch_enr_reptr.c8_b) END) AS class8_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c8_g IS NULL,0,mhrd_sch_enr_reptr.c8_g)+mhrd_sch_enr_fresh.c8_g) ELSE SUM(mhrd_sch_enr_reptr.c8_g) END) AS class8_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c9_b IS NULL,0,mhrd_sch_enr_reptr.c9_b)+mhrd_sch_enr_fresh.c9_b) ELSE SUM(mhrd_sch_enr_reptr.c9_b) END) AS class9_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c9_g IS NULL,0,mhrd_sch_enr_reptr.c9_g)+mhrd_sch_enr_fresh.c9_g) ELSE SUM(mhrd_sch_enr_reptr.c9_g) END) AS class9_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c10_b IS NULL,0,mhrd_sch_enr_reptr.c10_b)+mhrd_sch_enr_fresh.c10_b) ELSE SUM(mhrd_sch_enr_reptr.c10_b) END) AS class10_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c10_g IS NULL,0,mhrd_sch_enr_reptr.c10_g)+mhrd_sch_enr_fresh.c10_g) ELSE SUM(mhrd_sch_enr_reptr.c10_g) END) ASClass10_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c11_b IS NULL,0,mhrd_sch_enr_reptr.c11_b)+mhrd_sch_enr_fresh.c11_b) ELSE SUM(mhrd_sch_enr_reptr.c11_b) END) AS class11_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c11_g IS NULL,0,mhrd_sch_enr_reptr.c11_g)+mhrd_sch_enr_fresh.c11_g) ELSE SUM(mhrd_sch_enr_reptr.c11_g) END) AS class11_girls,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c12_b IS NULL,0,mhrd_sch_enr_reptr.c12_b)+mhrd_sch_enr_fresh.c12_b) ELSE SUM(mhrd_sch_enr_reptr.c12_b) END) AS class12_boys,
            (CASE WHEN  @repeaters=1 THEN SUM(IF(mhrd_sch_enr_reptr.c12_g IS NULL,0,mhrd_sch_enr_reptr.c12_g)+mhrd_sch_enr_fresh.c12_g) ELSE SUM(mhrd_sch_enr_reptr.c12_g) END) AS class12_girls
            FROM mhrd_sch_enr_fresh 
            LEFT JOIN mhrd_sch_enr_reptr ON CAST(mhrd_sch_enr_reptr.udise_sch_code AS UNSIGNED)=CAST(mhrd_sch_enr_fresh.udise_sch_code AS UNSIGNED)
            AND mhrd_sch_enr_fresh.ac_year=mhrd_sch_enr_reptr.ac_year AND mhrd_sch_enr_reptr.item_group=mhrd_sch_enr_fresh.item_group
            AND mhrd_sch_enr_reptr.item_id=mhrd_sch_enr_fresh.item_id
            WHERE
            IF(@itemgroup=1,mhrd_sch_enr_fresh.item_id IN (1,2,3,4),
            IF(@itemgroup=2,mhrd_sch_enr_fresh.item_id IN (5,6,7,8,9,10,11),
            IF(@itemgroup=3,mhrd_sch_enr_fresh.item_id IN (12,13),
            IF(@itemgroup=4,mhrd_sch_enr_fresh.item_group=3 AND mhrd_sch_enr_fresh.item_id IN (14),mhrd_sch_enr_fresh.udise_sch_code IS NOT NULL))))
            AND CAST(mhrd_sch_enr_fresh.udise_sch_code AS UNSIGNED)=".$udise_sch_code." AND mhrd_sch_enr_fresh.ac_year='".$ac_year."'
            GROUP BY items;";*/
            return null;
        }elseif($repeaters==5){ //Age wise Enrollments
            
            /**Commented by wesley**/
            /*$SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,
            IF(age_id<5,'<5',IF(age_id>22,'>22',age_id)) AS age_id,
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)
                AS item_total
                FROM mhrd_sch_enr_age
                UNION ALL
                SELECT
                item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g)
                AS total_items FROM (SELECT
                udise_sch_code,ac_year,'Total' AS age_id,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
                SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS
                tot_c3_b,SUM(c3_g) AS tot_c3_g,
                SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS
                tot_c6_b,SUM(c6_g) AS tot_c6_g,
                SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS
                tot_c9_b,SUM(c9_g) AS tot_c9_g,
                SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS
                tot_c12_b,
                SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_age GROUP BY udise_sch_code) AS item_total) AS item_list_type
    WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/
                /**Commented by wesley**/
                if(!empty($dist_id) || !empty($edu_dist_id)){
                    if(!empty($dist_id)){
                        $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' group by sc.district_id";
                        $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.district_id";
                    }
                    else if(!empty($edu_dist_id)){
                        $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' group by sc.edu_dist_id";
                        $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                    }
                    $SQL = "SELECT * FROM (SELECT 
                    -- sc.district_name as dist,
                    ac_year,
                    IF(age_id<5,'<5',IF(age_id>22,'>22',age_id)) AS age_id,
                        sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
                    sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
                        AS item_total
                        FROM mhrd_sch_enr_age f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1 ,age_id
                        UNION ALL
                        SELECT
                        -- sc.district_name as dist,
                        t.ac_year,
                        'TOTAL' AS age_id,
                        sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
                        sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
                        AS item_total
                        FROM mhrd_enr_total t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 ) AS
                        item_list_type;";
                }else{
                /**Altered by wesley**/
                $SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,
                IF(age_id<5,'<5',IF(age_id>22,'>22',age_id)) AS age_id,
                    cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                    (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g)
                    AS item_total
                    FROM mhrd_sch_enr_age WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."'
                    UNION ALL
                    SELECT
                    item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g)
                    AS total_items FROM (SELECT
                    udise_sch_code,ac_year,'Total' AS age_id,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
                    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS
                    tot_c3_b,SUM(c3_g) AS tot_c3_g,
                    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS
                    tot_c6_b,SUM(c6_g) AS tot_c6_g,
                    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS
                    tot_c9_b,SUM(c9_g) AS tot_c9_g,
                    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS
                    tot_c12_b,
                    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_age WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."' GROUP BY udise_sch_code) AS item_total) AS item_list_type";
                /**Altered by wesley**/
                }
    }elseif($repeaters==6){ //Medium wise Enrollments
            /**Commented by wesley**/

            /*$SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,MEDINSTR_DESC as medium_type, 
                cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_medinstr
    JOIN schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.id=mhrd_sch_enr_medinstr.medinstr_type
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_medinstr GROUP BY udise_sch_code) AS item_total) AS item_list_type
    WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";*/

        /**Commented by wesley**/
        if(!empty($dist_id) || !empty($edu_dist_id)){
            if(!empty($dist_id)){
                $where1 = "where sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' group by sc.district_id";
                $where2 = "where sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.district_id";
            }
            else if(!empty($edu_dist_id)){
                $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' group by sc.edu_dist_id";
                $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
            }
            $SQL = "SELECT * FROM (SELECT sc.district_name as dist,ac_year,MEDINSTR_DESC as medium_type,
            sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
            sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g) AS item_total
            FROM mhrd_sch_enr_medinstr f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned)
            JOIN schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.id=f.medinstr_type
            $where1,medium_type 
            UNION ALL
            SELECT
            item_total.* FROM (SELECT
            sc.district_name as dist,t.ac_year,'TOTAL' AS medium_type,sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
            sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g) as total FROM mhrd_enr_total t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) 
            $where2 ) AS item_total) AS item_list_type;";
        }else{
        
        /**Altered by wesley**/

        $SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,MEDINSTR_DESC as medium_type,
        cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
        FROM mhrd_sch_enr_medinstr
        JOIN schoolnew_mediumofinstruction ON schoolnew_mediumofinstruction.id=mhrd_sch_enr_medinstr.medinstr_type WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."'
        UNION ALL
        SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
        SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
        SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
        SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
        SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
        SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_medinstr WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."' GROUP BY udise_sch_code) AS item_total) AS item_list_type
        WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."' ORDER BY medium_type;";

        /**Altered by wesley**/
        }    
        }elseif($repeaters==7){ //CWSN Enrollment Details

            /**commented by wesley**/

           /* $SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,da_name,
            cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
        (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
    FROM mhrd_sch_enr_cwsn
    JOIN baseapp_differently_abled ON baseapp_differently_abled.da_code=mhrd_sch_enr_cwsn.disability_type
    UNION ALL
    SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
        udise_sch_code,ac_year,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
    SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
    SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
    SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
    SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
    SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_cwsn GROUP BY udise_sch_code) AS item_total) AS item_list_type
    WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';"; */

        /**commented by wesley**/

        /**Altered by wesley**/
        if(!empty($dist_id) || !empty($edu_dist_id)){
            if(!empty($dist_id)){
                $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND f.disability_type='7' group by sc.district_id";
                $where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND disability_type='7' group by sc.district_id";
                //$where2 = "where  sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' AND f.disability_type='7' GROUP BY sc.district_id";
            }
            else if(!empty($edu_dist_id)){
                $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND f.disability_type='7' group by sc.edu_dist_id";
                $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND t.disability_type='7' group by sc.edu_dist_id";
                //$where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_id='".$repeaters."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
            }
            $SQL = "SELECT * FROM (SELECT sc.district_name as dist,ac_year,da_name,
            sum(f.cpp_b) as cpp_b,sum(f.cpp_g) as cpp_g,sum(f.c1_b) as c1_b,sum(f.c1_g) as c1_g,sum(f.c2_b) as c2_b,sum(f.c2_g) as c2_g,sum(f.c3_b) as c3_b,sum(f.c3_g) as c3_g,sum(f.c4_b) as c4_b,sum(f.c4_g) as c4_g,sum(f.c5_b) as c5_b,sum(f.c5_g) as c5_g,sum(f.c6_b) as c6_b,sum(f.c6_g) as c6_g,sum(f.c7_b) as c7_b,sum(f.c7_g) as c7_g,sum(f.c8_b) as c8_b,sum(f.c8_g) as c8_g,sum(f.c9_b) as c9_b,sum(f.c9_g) as c9_g,sum(f.c10_b) as c10_b,sum(f.c10_g) as c10_g,sum(f.c11_b) as c11_b,sum(f.c11_g) as c11_g,sum(f.c12_b) as c12_b,sum(f.c12_g) as c12_g,
            sum(f.cpp_b+f.cpp_g+f.c1_b+f.c1_g+f.c2_b+f.c2_g+f.c3_b+f.c3_g+f.c4_b+f.c4_g+f.c5_b+f.c5_g+f.c6_b+f.c6_g+f.c7_b+f.c7_g+f.c8_b+f.c8_g+f.c9_b+f.c9_g+f.c10_b+f.c10_g+f.c11_b+f.c11_g+f.c12_b+f.c12_g)
            AS item_total
            FROM mhrd_sch_enr_cwsn f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned)  
            JOIN baseapp_differently_abled ON baseapp_differently_abled.da_code=f.disability_type $where1 ,da_name
            UNION ALL
            SELECT
            -- sc.district_name as dist,
            item_total.* FROM (SELECT
            sc.district_name as dist,ac_year,'Total' AS items,
            sum(t.cpp_b) as cpp_b,sum(t.cpp_g) as cpp_g,sum(t.c1_b) as c1_b,sum(t.c1_g) as c1_g,sum(t.c2_b) as c2_b,sum(t.c2_g) as c2_g,sum(t.c3_b) as c3_b,sum(t.c3_g) as c3_g,sum(t.c4_b) as c4_b,sum(t.c4_g) as c4_g,sum(t.c5_b) as c5_b,sum(t.c5_g) as c5_g,sum(t.c6_b) as c6_b,sum(t.c6_g) as c6_g,sum(t.c7_b) as c7_b,sum(t.c7_g) as c7_g,sum(t.c8_b) as c8_b,sum(t.c8_g) as c8_g,sum(t.c9_b) as c9_b,sum(t.c9_g) as c9_g,sum(t.c10_b) as c10_b,sum(t.c10_g) as c10_g,sum(t.c11_b) as c11_b,sum(t.c11_g) as c11_g,sum(t.c12_b) as c12_b,sum(t.c12_g) as c12_g,
            sum(t.cpp_b+t.cpp_g+t.c1_b+t.c1_g+t.c2_b+t.c2_g+t.c3_b+t.c3_g+t.c4_b+t.c4_g+t.c5_b+t.c5_g+t.c6_b+t.c6_g+t.c7_b+t.c7_g+t.c8_b+t.c8_g+t.c9_b+t.c9_g+t.c10_b+t.c10_g+t.c11_b+t.c11_g+t.c12_b+t.c12_g)
            FROM mhrd_sch_enr_cwsn t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) $where2 )  AS item_total) AS item_list_type
            WHERE  ac_year='".$ac_year."';";
        }else{          
            $SQL="SELECT * FROM (SELECT udise_sch_code,ac_year,da_name,
            cpp_b,cpp_g,c1_b,c1_g,c2_b,c2_g,c3_b,c3_g,c4_b,c4_g,c5_b,c5_g,c6_b,c6_g,c7_b,c7_g,c8_b,c8_g,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                (cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total
            FROM mhrd_sch_enr_cwsn 
            JOIN baseapp_differently_abled ON baseapp_differently_abled.da_code=mhrd_sch_enr_cwsn.disability_type WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."'
            UNION ALL
            SELECT item_total.*,(tot_cpp_b+tot_cpp_g+tot_c1_b+tot_c1_g+tot_c2_b+tot_c2_g+tot_c3_b+tot_c3_g+tot_c4_b+tot_c4_g+tot_c5_b+tot_c5_g+tot_c6_b+tot_c6_g+tot_c7_b+tot_c7_g+tot_c8_b+tot_c8_g+tot_c9_b+tot_c9_g+tot_c10_b+tot_c10_g+tot_c11_b+tot_c11_g+tot_c12_b+tot_c12_g) AS total_items FROM (SELECT
                udise_sch_code,ac_year,'Total' AS items,SUM(cpp_b) AS tot_cpp_b,SUM(cpp_g) AS tot_cpp_g,
            SUM(c1_b) AS tot_c1_b,SUM(c1_g) AS tot_c1_g,SUM(c2_b) AS tot_c2_b,SUM(c2_g) AS tot_c2_g,SUM(c3_b) AS tot_c3_b,SUM(c3_g) AS tot_c3_g,
            SUM(c4_b) AS tot_c4_b,SUM(c4_g) AS tot_c4_g,SUM(c5_b) AS tot_c5_b,SUM(c5_g) AS tot_c5_g,SUM(c6_b) AS tot_c6_b,SUM(c6_g) AS tot_c6_g,
            SUM(c7_b) AS tot_c7_b,SUM(c7_g) AS tot_c7_g,SUM(c8_b) AS tot_c8_b,SUM(c8_g) AS tot_c8_g,SUM(c9_b) AS tot_c9_b,SUM(c9_g) AS tot_c9_g,
            SUM(c10_b) AS tot_c10_b,SUM(c10_g) AS tot_c10_g,SUM(c11_b) AS tot_c11_b,SUM(c11_g) AS tot_c11_g,SUM(c12_b) AS tot_c12_b,
            SUM(c12_g) AS tot_c12_g FROM mhrd_sch_enr_cwsn WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."' AND disability_type='".$repeaters."' GROUP BY udise_sch_code) AS item_total) AS item_list_type
            WHERE ac_year='".$ac_year."' AND udise_sch_code='".$udise_sch_code."';";
        }
        /**Altered by wesley**/

        }elseif($repeaters==8){
            if(!empty($dist_id) || !empty($edu_dist_id)){
                if(!empty($dist_id)){
                    $where1 = "WHERE IF(@itemgroup=1,caste_id IN (1,2,3,4),IF(@itemgroup=2,caste_id IN (5,6,7,8,9,10,11),caste_id NOT IN (0))) AND sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' group by sc.district_id";
                    $ehere2 = "WHERE IF(@itemgroup=1,caste_id IN (1,2,3,4),IF(@itemgroup=2,caste_id IN (5,6,7,8,9,10,11),caste_id NOT IN (0))) AND
                                sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' GROUP BY sc.district_id";
                }
                else if(!empty($edu_dist_id)){
                    $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' group by sc.edu_dist_id";
                    $where2 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' AND item_group='".$itemgroup."' group by sc.edu_dist_id";
                }
                $SQL = "SELECT * FROM (SELECT sc.district_name as dist,ac_year,
                (CASE
                WHEN stream_id=111 THEN 'ARTS'
                WHEN stream_id=112 THEN 'SCIENCE'
                WHEN stream_id=113 then 'COMMERCE'
                WHEN stream_id=114 then 'VOCATIONAL'
                WHEN stream_id=115 then 'OTHER'
                END) AS streams,
                (CASE
                WHEN caste_id=1 THEN 'GENERAL'
                WHEN caste_id=2 THEN 'SC'
                WHEN caste_id=3 THEN 'ST'
                WHEN caste_id=4 THEN 'OBC'
                WHEN caste_id=5 THEN 'MUSLIM'
                WHEN caste_id=6 THEN 'CHRISTIAN'
                WHEN caste_id=7 THEN 'SIKH'
                WHEN caste_id=8 THEN 'BUDDHIST'
                WHEN caste_id=9 THEN 'PARSI'
                WHEN caste_id=10 THEN 'JAIN'
                WHEN caste_id=11 THEN 'OTHER' END) AS item_id,
                sum(ec11_b) as ec11_b,sum(ec11_g) as ec11_g,sum(ec12_b) as ec12_b,sum(ec12_g) as ec12_g,sum(rc11_b) as rc11_b,sum(rc11_g) as rc11_g,sum(rc12_b) as rc12_b,sum(rc12_g) as rc12_g,
                SUM(ec11_b+ec11_g+ec12_b+ec12_g+rc11_b+rc11_g+rc12_b+rc12_g) AS total
                FROM mhrd_sch_enr_by_stream f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned)
                $where1,stream_id,item_id 
                UNION ALL
                SELECT sc.district_name as dist,ac_year,
                'TOTAL' AS streams,
                'TOTAL' AS item_id,
                sum(ec11_b) as ec11_b,sum(ec11_g) as ec11_g,sum(ec12_b) as ec12_b,sum(ec12_g) as ec12_g,sum(rc11_b) as rc11_b,sum(rc11_g) as rc11_g,sum(rc12_b) as rc12_b,sum(rc12_g) as rc12_g,
                SUM(ec11_b+ec11_g+ec12_b+ec12_g+rc11_b+rc11_g+rc12_b+rc12_g) AS total
                FROM mhrd_sch_enr_by_stream t left join students_school_child_count sc on sc.udise_code=cast(t.udise_sch_code as unsigned) 
                $where2) AS strm_ern;";
            }else{
                $SQL="
                SELECT * FROM (SELECT udise_sch_code,ac_year,
                (CASE
                WHEN stream_id=111 THEN 'ARTS'
                WHEN stream_id=112 THEN 'SCIENCE'
                WHEN stream_id=113 then 'COMMERCE'
                WHEN stream_id=114 then 'VOCATIONAL'
                WHEN stream_id=115 then 'OTHER'
                END) AS streams,
                (CASE
                WHEN caste_id=1 THEN 'GENERAL'
                WHEN caste_id=2 THEN 'SC'
                WHEN caste_id=3 THEN 'ST'
                WHEN caste_id=4 THEN 'OBC'
                WHEN caste_id=5 THEN 'MUSLIM'
                WHEN caste_id=6 THEN 'CHRISTIAN'
                WHEN caste_id=7 THEN 'SIKH'
                WHEN caste_id=8 THEN 'BUDDHIST'
                WHEN caste_id=9 THEN 'PARSI'
                WHEN caste_id=10 THEN 'JAIN'
                WHEN caste_id=11 THEN 'OTHER' END) AS item_id,
                ec11_b,ec11_g,ec12_b,ec12_g,rc11_b,rc11_g,rc12_b,rc12_g,
                SUM(ec11_b+ec11_g+ec12_b+ec12_g+rc11_b+rc11_g+rc12_b+rc12_g) AS total
                FROM mhrd_sch_enr_by_stream
                WHERE IF(@itemgroup=1,caste_id IN (1,2,3,4),IF(@itemgroup=2,caste_id IN (5,6,7,8,9,10,11),caste_id NOT IN (0))) AND ac_year='".$ac_year."'
                AND udise_sch_code='".$udise_sch_code."' GROUP BY stream_id,item_id,udise_sch_code
                UNION ALL
                SELECT udise_sch_code,ac_year,
                'TOTAL' AS streams,
                'TOTAL' AS item_id,
                ec11_b,ec11_g,ec12_b,ec12_g,rc11_b,rc11_g,rc12_b,rc12_g,
                SUM(ec11_b+ec11_g+ec12_b+ec12_g+rc11_b+rc11_g+rc12_b+rc12_g) AS total
                FROM mhrd_sch_enr_by_stream
            WHERE IF(@itemgroup=1,caste_id IN (1,2,3,4),IF(@itemgroup=2,caste_id IN (5,6,7,8,9,10,11),caste_id NOT IN (0))) AND ac_year='".$ac_year."'
                AND udise_sch_code='".$udise_sch_code."' GROUP BY udise_sch_code) AS strm_ern
                WHERE udise_sch_code='".$udise_sch_code."';";
            }
        }
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
    
    function totalForTable($ac_year,$udise_sch_code,$repeaters,$itemgroup){
        $SQL="SELECT udise_sch_code,ac_year
,SUM(cpp_b) AS cpp_b,SUM(cpp_g) AS cpp_g,SUM(c1_b) AS c1_b,SUM(c1_g) AS c1_g,SUM(c2_b) AS c2_b,
SUM(c2_g) AS c2_g,SUM(c3_b) AS c3_b,SUM(c3_g) AS c3_g,SUM(c4_b) AS c4_b,SUM(c4_g) AS c4_g,
SUM(c5_b) AS c5_b,SUM(c5_g) AS c5_g,SUM(c6_b) AS c6_b,SUM(c6_g) AS c6_g,SUM(c7_b) AS c7_b,SUM(c7_g) AS c7_g,SUM(c8_b) AS c8_b,SUM(c8_g) AS c8_g,SUM(c9_b) AS c9_b,SUM(c9_g) AS c9_g,SUM(c10_b )AS c10_b,SUM(c10_g )AS c10_g,SUM(c11_b )AS c11_b,SUM(c11_g )AS c11_g,SUM(c12_b )AS c12_b,SUM(c12_g )AS c12_g
FROM mhrd_sch_enr_fresh WHERE item_group=1 AND udise_sch_code=".$udise_sch_code." AND ac_year='".$ac_year."'";
$query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }

    function incenFacDetails($school_id,$grade_id){
        
        $SQL = "select (select gen_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_gen_g,
        (select sc_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_obc_g,
        
        (select txtbk_gen_b+txtbk_sc_b+txtbk_st_b+txtbk_obc_b) as tot_txtbk_boys,
        (select txtbk_gen_g+txtbk_sc_g+txtbk_st_g+txtbk_obc_b+txtbk_obc_g) as tot_txtbk_girls,

        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=1 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as txtbk_min_g,
        
        (select gen_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_gen_g, 
        (select sc_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_obc_g,
        
        (select uni_gen_b+uni_sc_b+uni_st_b+uni_obc_b) as tot_uni_boys,
        (select uni_gen_g+uni_sc_g+uni_st_g+uni_obc_g) as tot_uni_girls,
        
        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=2 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as uni_min_g,
       
        (select gen_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_gen_g, 
        (select sc_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_obc_g,
       
        (select trans_gen_b+trans_sc_b+trans_st_b+trans_obc_b) as tot_trans_boys,
        (select trans_gen_g+trans_sc_g+trans_st_g+trans_obc_g) as tot_trans_girls,

        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=3 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as trans_min_g,
        
        (select gen_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_gen_g, 
        (select sc_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_obc_g,
       
        (select escort_gen_b+escort_sc_b+escort_st_b+escort_obc_b) as tot_escort_boys,
        (select escort_gen_g+escort_sc_g+escort_st_g+escort_obc_g) as tot_escort_girls,

        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=4 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as escort_min_g,
        
        (select gen_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_gen_g, 
        (select sc_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_obc_g,
        
        (select cicyle_gen_b+cicyle_sc_b+cicyle_st_b+cicyle_obc_b) as tot_cicyle_boys,
        (select cicyle_gen_g+cicyle_sc_g+cicyle_st_g+cicyle_obc_g) as tot_cicyle_girls,

        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=5 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as cicyle_min_g,

        (select gen_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_gen_b,
        (select gen_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_gen_g, 
        (select sc_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_sc_b,
        (select sc_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_sc_g,
        (select st_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_st_b,
        (select st_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_st_g,
        (select obc_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_obc_b,
        (select obc_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_obc_g,
        
        (select state_gen_b+state_sc_b+state_st_b+state_obc_b) as tot_state_boys,
        (select state_gen_g+state_sc_g+state_st_g+state_obc_g) as tot_state_girls,

        (select min_muslim_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_mus_b,
        (select min_muslim_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code and inc.grade_pri_upr=2 limit 1) as state_mus_g,
        (select min_oth_b from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code  limit 1) as state_min_b,
        (select min_oth_g from mhrd_sch_incentives r where incentive_type=6 and grade_pri_upr=".$grade_id." and r.udise_sch_code=inc.udise_sch_code limit 1) as state_min_g
        from mhrd_sch_incentives inc join students_school_child_count sc on sc.udise_code=cast(inc.udise_sch_code as unsigned) where sc.school_type_id in (1,2,4) and inc.ac_year = '2018-19' and sc.school_id = ".$school_id." group by school_id;";
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die(); 
        return $query->result_array();
    }

    function incenFacCWSN($school_id){
      
        $SQL="select (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=1 and r.udise_sch_code=inc.udise_sch_code limit 1) as braibk_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=2 and r.udise_sch_code=inc.udise_sch_code limit 1) as braikt_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=3 and r.udise_sch_code=inc.udise_sch_code limit 1) as lowvsn_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=4 and r.udise_sch_code=inc.udise_sch_code limit 1) as heargaid_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=5 and r.udise_sch_code=inc.udise_sch_code limit 1) as brace_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=6 and r.udise_sch_code=inc.udise_sch_code limit 1) as cruct_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=7 and r.udise_sch_code=inc.udise_sch_code limit 1) as whlchr_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=8 and r.udise_sch_code=inc.udise_sch_code limit 1) as tricyc_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=10 and r.udise_sch_code=inc.udise_sch_code limit 1) as cali_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=11 and r.udise_sch_code=inc.udise_sch_code limit 1) as escrt_hsec_g,
        (select tot_pre_pri_b from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_pre_pri_b,
        (select tot_pre_pri_g from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_pre_pri_g, 
        (select tot_pry_b from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_pry_b,
        (select tot_pry_g from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_pry_g,
        (select tot_upr_b from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_upr_b,
        (select tot_upr_g from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_upr_g,
        (select tot_sec_b from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_sec_b,
        (select tot_sec_g from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_sec_g,
        (select tot_hsec_b from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_hsec_b,
        (select tot_hsec_g from mhrd_sch_incen_cwsn r where item_id=12 and r.udise_sch_code=inc.udise_sch_code limit 1) as stipnd_hsec_g
        from mhrd_sch_incen_cwsn inc join students_school_child_count sc on sc.udise_code=cast(inc.udise_sch_code as unsigned) where sc.school_type_id in 
        (1,2,4) and inc.ac_year = '2018-19' and sc.school_id = ".$school_id." group by school_id;";
        
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
    
    function annualExamResult($tablename,$udise_code,$acyear,$item,$dist_id,$edu_dist_id){
        $tablestack=['mhrd_sch_exmres_c5','mhrd_sch_exmres_c8'];
        $itemid=array('mhrd_sch_exmres_c10' => ' AND item_id IN ('.($item==0?'1,2':$item).')','mhrd_sch_exmres_c12' => ' AND item_id IN ('.($item==0?'3,4':$item).')');
        if(!empty($dist_id) || !empty($edu_dist_id)){
            if(!empty($dist_id)){
                $SQL = "SELECT
                    sc.district_name,academic_year,
                    gen_app_b,gen_app_g,
                    obc_app_b,obc_app_g,
                    sc_app_b,sc_app_g,
                    st_app_b,st_app_g,
                    
                    gen_pass_b,gen_pass_g,
                    obc_pass_b,obc_pass_g,
                    sc_pass_b,sc_pass_g,
                    st_pass_b,st_pass_g
                    ".($tablename=='mhrd_sch_exmres_c12'?",(CASE 
                                                    	WHEN stream_id=111 THEN 'ARTS' 
                                                    	WHEN stream_id=112 THEN 'SCIENCE' 
                                                        WHEN stream_id=113 then 'COMMERCE'
                                                    	WHEN stream_id=114 then 'VOCATIONAL'
                                                    	WHEN stream_id=115 then 'OTHER'
                                                        WHEN stream_id NOT IN (111,112,113,114,115) THEN 'NOT IN LIST'
                                                    END) AS streams":"")."
                    ".(!in_array($tablename,$tablestack)?",item_id":"")."
                    ".(in_array($tablename,$tablestack)?",gen_60p_b,gen_60p_g,
                    obc_60p_b,obc_60p_g,
                    sc_60p_b,sc_60p_g,
                    st_60p_b,st_60p_g":"")."
                    FROM ".$tablename." m left join students_school_child_count sc on sc.udise_code=cast(m.udise_sch_code as unsigned)
                    WHERE district_id='".$dist_id."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename]."group by sc.district_id".";":"");
        
            }
            else if(!empty($edu_dist_id)){
                $SQL = "SELECT
                    sc.district_name,academic_year,
                    gen_app_b,gen_app_g,
                    obc_app_b,obc_app_g,
                    sc_app_b,sc_app_g,
                    st_app_b,st_app_g,
                    
                    gen_pass_b,gen_pass_g,
                    obc_pass_b,obc_pass_g,
                    sc_pass_b,sc_pass_g,
                    st_pass_b,st_pass_g
                    ".($tablename=='mhrd_sch_exmres_c12'?",(CASE 
                                                    	WHEN stream_id=111 THEN 'ARTS' 
                                                    	WHEN stream_id=112 THEN 'SCIENCE' 
                                                        WHEN stream_id=113 then 'COMMERCE'
                                                    	WHEN stream_id=114 then 'VOCATIONAL'
                                                    	WHEN stream_id=115 then 'OTHER'
                                                        WHEN stream_id NOT IN (111,112,113,114,115) THEN 'NOT IN LIST'
                                                    END) AS streams":"")."
                    ".(!in_array($tablename,$tablestack)?",item_id":"")."
                    ".(in_array($tablename,$tablestack)?",gen_60p_b,gen_60p_g,
                    obc_60p_b,obc_60p_g,
                    sc_60p_b,sc_60p_g,
                    st_60p_b,st_60p_g":"")."
                    FROM ".$tablename." m left join students_school_child_count sc on sc.udise_code=cast(m.udise_sch_code as unsigned)
                    WHERE edu_dist_id='".$edu_dist_id."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename]."group by sc.edu_dist_id".";":"");}
            }else{    
            $SQL="SELECT 
            	udise_sch_code,academic_year,
                gen_app_b,gen_app_g,
                obc_app_b,obc_app_g,
                sc_app_b,sc_app_g,
                st_app_b,st_app_g,
                
                gen_pass_b,gen_pass_g,
                obc_pass_b,obc_pass_g,
                sc_pass_b,sc_pass_g,
                st_pass_b,st_pass_g
                ".($tablename=='mhrd_sch_exmres_c12'?",(CASE 
                                                    	WHEN stream_id=111 THEN 'ARTS' 
                                                    	WHEN stream_id=112 THEN 'SCIENCE' 
                                                        WHEN stream_id=113 then 'COMMERCE'
                                                    	WHEN stream_id=114 then 'VOCATIONAL'
                                                    	WHEN stream_id=115 then 'OTHER'
                                                        WHEN stream_id NOT IN (111,112,113,114,115) THEN 'NOT IN LIST'
                                                    END) AS streams":"")."
                ".(!in_array($tablename,$tablestack)?",item_id":"")."
                ".(in_array($tablename,$tablestack)?",gen_60p_b,gen_60p_g,
                obc_60p_b,obc_60p_g,
                sc_60p_b,sc_60p_g,
                st_60p_b,st_60p_g":"")."
            FROM ".$tablename."
            WHERE udise_sch_code='".$udise_code."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename].";":"");
        }
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
    function annualExamMarks($tablename,$udise_code,$acyear,$item,$dist_id,$edu_dist_id){
        $tablestack=['mhrd_sch_exmres_c5','mhrd_sch_exmres_c8'];
        $itemid=array('mhrd_sch_exmmarks_c10' => ' AND item_id IN ('.($item==0?'1,2':$item).')','mhrd_sch_exmmarks_c12' => ' AND item_id IN ('.($item==0?'3,4':$item).')');
        if(!empty($dist_id) || !empty($edu_dist_id)){
            if(!empty($dist_id)){
                $SQL = "SELECT
                district_name,
                academic_year,
                item_id,
                (CASE
                WHEN marks_range_id=1 THEN '<40%' 
                WHEN marks_range_id=2 THEN '40 - <60%' 
                WHEN marks_range_id=3 THEN '60 - <80%' 
                WHEN marks_range_id=4 THEN '>80%' END) AS marks_range_id, 
                gen_b,gen_g, 
                obc_b,obc_g, 
                sc_b,sc_g, 
                st_b,st_g 
                FROM ".$tablename." m left join students_school_child_count sc on sc.udise_code=cast(m.udise_sch_code as unsigned) 
                WHERE district_id='".$dist_id."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename]."group by sc.district_id".";":"");
            }
            else if(!empty($edu_dist_id)){
                $SQL = "SELECT
                district_name,
                academic_year,
                item_id,
                (CASE
                WHEN marks_range_id=1 THEN '<40%' 
                WHEN marks_range_id=2 THEN '40 - <60%' 
                WHEN marks_range_id=3 THEN '60 - <80%' 
                WHEN marks_range_id=4 THEN '>80%' END) AS marks_range_id, 
                gen_b,gen_g, 
                obc_b,obc_g, 
                sc_b,sc_g, 
                st_b,st_g 
                FROM ".$tablename." m left join students_school_child_count sc on sc.udise_code=cast(m.udise_sch_code as unsigned) 
                WHERE edu_dist_id='".$edu_dist_id."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename]."group by sc.edu_dist_id".";":"");
            }                
            }else{
                $SQL="SELECT 
                    udise_sch_code,
                    academic_year,
                    item_id,
                    (CASE 
                        WHEN marks_range_id=1 THEN '<40%'
                        WHEN marks_range_id=2 THEN '40 - <60%'
                        WHEN marks_range_id=3 THEN '60 - <80%'
                        WHEN marks_range_id=4 THEN '>80%' END) AS marks_range_id,
                    gen_b,gen_g,
                    obc_b,obc_g,
                    sc_b,sc_g,
                    st_b,st_g 
            FROM ".$tablename."
            WHERE udise_sch_code='".$udise_code."' AND academic_year='".$acyear."'".(!in_array($tablename,$tablestack)?$itemid[$tablename].";":"");
        }
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
    
    function getGrants($udise,$acyear){
        $SQL="SELECT udise_sch_code
            ,ac_year
            ,dev_grt_r,dev_grt_e
            ,maint_grt_r,maint_grt_e
            ,tlm_grt_r,tlm_grt_e
            ,cw_grt_r,cw_grt_e
            ,anl_grt_r,anl_grt_e
            ,minrep_grt_r,minrep_grt_e
            ,labrep_grt_r,labrep_grt_e
            ,book_grt_r,book_grt_e
            ,elec_grt_r,elec_grt_e
            ,oth_grt_r,oth_grt_e
            ,tot_grt_r,tot_grt_e
            ,compo_grt_r,compo_grt_e
            ,lib_grt_r,lib_grt_e
            ,sport_grt_r,sport_grt_e
            ,media_grt_r,media_grt_e
            ,smc_grt_r,smc_grt_e
            ,presch_grt_r,presch_grt_e
            ,ngo_asst_yn,psu_asst_yn,comm_asst_yn,oth_asst_yn,ict_reg_yn,
            sport_reg_yn,lib_reg_yn,ngo_asst_rcvd,psu_asst_rcvd,
            comm_asst_rcvd,oth_asst_rcvd,ngo_asst_name,psu_asst_name,
            comm_asst_name,oth_asst_name FROM mhrd_sch_recp_exp 
            WHERE udise_sch_code='".$udise."' AND ac_year='".$acyear."';";
        $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
	
    function getSafetyDetails($udise,$acyear){
        $SQL="SELECT udise_sch_code,ac_year,sdmp_plan_yn,struct_safaud_yn,nonstr_safaud_yn,fire_ext_yn,safty_trng_yn,dismgmt_taug_yn,slfdef_grt_yn,slfdef_trained,extra_column_1,cctv_cam_yn,nodal_tch_yn FROM mhrd_sch_safety
        WHERE udise_sch_code='".$udise."' AND ac_year='".$acyear."';";
         $query = $this->db->query($SQL);
        //echo($this->db->last_query());die();
        return $query->result_array();
    }
	
	public function vocationalnsqf($udise,$acyear,$section,$dist_id,$edu_dist_id){
        //echo "test";echo $dist_id;die();
        if(!empty($dist_id)){
            $where1 = "where  sc.district_id='".$dist_id."' AND ac_year='".$acyear."' group by sc.district_id";            
        }
        else if(!empty($edu_dist_id)){
            $where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$acyear."' group by sc.edu_dist_id";
        }
		if($section==1){
            if(!empty($dist_id) || !empty($edu_dist_id)){
                $sql = "select sc.district_name,ac_year,sector_no,sector_id,item_id,sum(f.c9_b),sum(f.c9_g),sum(f.c10_b),sum(f.c10_g),sum(f.c11_b),sum(f.c11_g),sum(f.c12_b),sum(f.c12_g),
                (select sector from student_nsqf_sector where id=sector_no) as sector,
                (CASE WHEN item_id=1 THEN 'GENERAL' WHEN item_id=2 THEN 'SC' WHEN item_id=3 THEN 'ST' WHEN item_id=4 THEN 'OBC' WHEN item_id=5 THEN 'MUSLIM' WHEN item_id=6 THEN 'CHRISTIAN' WHEN item_id=7 THEN 'SIKH' WHEN item_id=8 THEN 'BUDDHIST' WHEN item_id=9 THEN 'PARSI' WHEN item_id=10 THEN 'JAIN' WHEN item_id=11 THEN 'OTHER' WHEN item_id=12 THEN 'CWSN' END) AS item_id
                 from mhrd_nsqf_enr_caste f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1";
            }else{
                $sql="select udise_sch_code,ac_year,sector_no,sector_id,item_id,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                (select sector from student_nsqf_sector where id=sector_no) as sector,
                (CASE WHEN item_id=1 THEN 'GENERAL' WHEN item_id=2 THEN 'SC' WHEN item_id=3 THEN 'ST' WHEN item_id=4 THEN 'OBC' WHEN item_id=5 THEN 'MUSLIM' WHEN item_id=6 THEN 'CHRISTIAN' WHEN item_id=7 THEN 'SIKH' WHEN item_id=8 THEN 'BUDDHIST' WHEN item_id=9 THEN 'PARSI' WHEN item_id=10 THEN 'JAIN' WHEN item_id=11 THEN 'OTHER' WHEN item_id=12 THEN 'CWSN' END) AS item_id
                from mhrd_nsqf_enr_caste where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector_id asc;";
            }			
		}elseif($section==2){
            if(!empty($dist_id) || !empty($edu_dist_id)){
                $sql = "select sc.district_name,ac_year,sub_sector_id,sector_id,sector_no,sum(f.c9_b),sum(f.c9_g),sum(f.c10_b),sum(f.c10_g),sum(f.c11_b),sum(f.c11_g),sum(f.c12_b),sum(f.c12_g),
                (select sector from student_nsqf_sector where id=sector_no) as sector,
                (select job_role from student_nsqf_job_roles where id=sub_sector_id) as jobrole
                 from mhrd_nsqf_enr_sub_sec f left join students_school_child_count sc on sc.udise_code=cast(f.udise_sch_code as unsigned) $where1";
            }else{
                $sql="SELECT udise_sch_code,ac_year,sub_sector_id,sector_id,sector_no,c9_b,c9_g,c10_b,c10_g,c11_b,c11_g,c12_b,c12_g,
                (select sector from student_nsqf_sector where id=sector_no) as sector,
                (select job_role from student_nsqf_job_roles where id=sub_sector_id) as jobrole
                FROM mhrd_nsqf_enr_sub_sec where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector;";
		    }
		}elseif($section==4){
			$sql="SELECT udise_sch_code,ac_year,sector_no,sector_id,class_type_id,c9,c10,c11,c12,
(select sector from student_nsqf_sector where id=sector_no) as sector,
(case when class_type_id=1 then 'Theory (in hours)' when class_type_id=2 then 'Practical (in hours)' when class_type_id=3 then 'Field Visit (in Number)' when class_type_id=4 then 'Training in Industry* (in hours))' else 'NA' end) as classtype FROM mhrd_nsqf_class_cond where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector_id asc;";
		}elseif($section==5){
			$sql="select udise_sch_code,ac_year,sector_no,sector_id,marks_range_id,gen_b,gen_g,obc_b,obc_g,sc_b,sc_g,st_b,st_g,
(select sector from student_nsqf_sector where id=sector_no) as sector,
(case when marks_range_id=1 then 'up to 40% ' when marks_range_id=2 then '41-60%' when marks_range_id=3 then '61-80%' when marks_range_id=4 then 'Above 80%' end) as markrange from mhrd_nsqf_exmres_c10 where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector_id asc;";
		}elseif($section==6){
			$sql="select udise_sch_code,ac_year,sector_no,sector_id,marks_range_id,gen_b,gen_g,obc_b,obc_g,sc_b,sc_g,st_b,st_g,
(select sector from student_nsqf_sector where id=sector_no) as sector,
(case when marks_range_id=1 then 'up to 40% ' when marks_range_id=2 then '41-60%' when marks_range_id=3 then '61-80%' when marks_range_id=4 then 'Above 80%' end) as markrange from mhrd_nsqf_exmres_c12 where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector_id asc;";
		}elseif($section==7){
			$sql="select udise_sch_code,ac_year,sector_no,sector_id,agency_id,agency_name,cert_no,cert_agency,
(select sector from student_nsqf_sector where id=sector_no) as sector
 from mhrd_nsqf_trng_prov where udise_sch_code='".$udise."' and ac_year='".$acyear."' order by sector_id asc;";
		}else{
			$sql="select udise_sch_code,ac_year,nsqf_yn,voc_course_yn,sec1_sub,sec1_year,sec2_sub,sec2_year,
(select sector from student_nsqf_sector where id=sec1_sub) as sector1,
(select sector from student_nsqf_sector where id=sec2_sub) as sector2
from mhrd_nsqf_basic_info where udise_sch_code='".$udise."' and ac_year='".$acyear."';";
		}
        $query=$this->db->query($sql);
        //echo($this->db->last_query());die();
		return $query->result_array();
	}
    
    function getProfileComplete($where,$group){
        if($group==""){
            $group='NULL';
        }
        $SQL="SELECT 
            	school_id,udise_code,school_name,
                district_id,district_name,
                edu_dist_id,edu_dist_name,
                block_id,block_name,
            	SUM(part_1=0) AS notstarted_part_1,
                SUM(part_2=0) AS notstarted_part_2,
                SUM(part_3=0) AS notstarted_part_3,
                SUM(part_4=0) AS notstarted_part_4,
                SUM(part_5=0) AS notstarted_part_5,
                SUM(part_6=0) AS notstarted_part_6,
                SUM(part_7=0) AS notstarted_part_7,
                SUM(part_8=0) AS notstarted_part_8,
                SUM(part_9=0) AS notstarted_part_9,
                SUM(part_10=0) AS notstarted_part_10,
                SUM(part_1=1) AS completed_part_1,
                SUM(part_2=1) AS completed_part_2,
                SUM(part_3=1) AS completed_part_3,
                SUM(part_4=1) AS completed_part_4,
                SUM(part_5=1) AS completed_part_5,
                SUM(part_6=1) AS completed_part_6,
                SUM(part_7=1) AS completed_part_7,
                SUM(part_8=1) AS completed_part_8,
                SUM(part_9=1) AS completed_part_9,
                SUM(part_10=1) AS completed_part_10,
                
                IF('".$group."'='SCH',part_1,SUM(part_1=2)) AS submitted_part_1,
            	IF('".$group."'='SCH',part_2,SUM(part_2=2)) AS submitted_part_2,
            	IF('".$group."'='SCH',part_3,SUM(part_3=2)) AS submitted_part_3,
            	IF('".$group."'='SCH',part_4,SUM(part_4=2)) AS submitted_part_4,
            	IF('".$group."'='SCH',part_5,SUM(part_5=2)) AS submitted_part_5,
            	IF('".$group."'='SCH',part_6,SUM(part_6=2)) AS submitted_part_6,
            	IF('".$group."'='SCH',part_7,SUM(part_7=2)) AS submitted_part_7,
            	IF('".$group."'='SCH',part_8,SUM(part_8=2)) AS submitted_part_8,
            	IF('".$group."'='SCH',part_9,SUM(part_9=2)) AS submitted_part_9,
            	IF('".$group."'='SCH',part_10,SUM(part_10=2)) AS submitted_part_10
            FROM students_school_child_count
            JOIN schoolnew_profilecomplete ON schoolnew_profilecomplete.school_key_id=students_school_child_count.school_id
            WHERE school_id IS NOT NULL ".$where. " GROUP BY ".$group.";";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	
	
	
	/*function getSchoolProfileData($schoolid){
        $SQL="SELECT DISTINCTROW	
	schoolnew_basicinfo.udise_code,
	schoolnew_basicinfo.school_name,
    schoolnew_basicinfo.address,
	locationentry.district_name,
    locationentry.edu_dist_name,
    locationentry.block_name,
    schoolnew_basicinfo.pincode,schoolnew_basicinfo.latitude,schoolnew_basicinfo.longitude,
    (CASE WHEN schoolnew_basicinfo.urbanrural=2 THEN 'URBAN' ELSE
		CASE WHEN schoolnew_basicinfo.urbanrural=1 THEN 'RURAL' END END) AS urbanrural,
	zone_type,village_ward,village_munci,schoolnew_assembly.assembly_name,schoolnew_parliament.parli_name,
    manage_name,schooldirectrate.management,department,
    schoolnew_basicinfo.office_mobile,
    schoolnew_basicinfo.corr_mobile,
    schoolnew_basicinfo.sch_email,
    schoolnew_basicinfo.website,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.office_std_code),' - ',schoolnew_basicinfo.office_landline) AS office_landline,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.corr_std_code),' - ',schoolnew_basicinfo.corr_landlline) AS corr_landline,
    schoolnew_academic_detail.yr_estd_schl,
    (CASE WHEN schoolnew_academic_detail.shftd_schl=1 THEN 'YES' ELSE 'NO' END) AS shftd_schl,
    (CASE WHEN schoolnew_academic_detail.hill_frst=1 THEN 'In Forest/Hill area' ELSE
		CASE WHEN schoolnew_academic_detail.hill_frst=2 THEN 'Near Forest/Hill area' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=3 THEN 'Near the High ways' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=4 THEN 'Near Coastal Area' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=0 THEN 'Not Applicable' ELSE '(NO DATA FOUND)' END END END END END
	) AS hill_frst,(CASE WHEN RESITYPE_DESC IS NULL THEN 'NO' ELSE RESITYPE_DESC END) as typ_resid_schl,
    (CASE WHEN schoolnew_academic_detail.cwsn_scl=1 THEN 'YES' ELSE 'NO' END) AS cwsn_scl,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_elem IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_elem END) AS yr_rec_schl_elem,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_sec IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_sec END) AS yr_rec_schl_sec,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_hsc IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_hsc END) AS yr_rec_schl_hsc,
    (CASE WHEN schoolnew_academic_detail.yr_recgn_first IS NULL OR schoolnew_academic_detail.yr_recgn_first=0  THEN 'N/A' ELSE schoolnew_academic_detail.yr_recgn_first END) AS yr_recgn_first,
    (CASE WHEN schoolnew_academic_detail.yr_last_renwl IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_last_renwl END) AS yr_last_renwl,
    (CASE WHEN schoolnew_academic_detail.certifi_no IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.certifi_no END) AS certifi_no,
    schoolnew_type.category_name as scl_category,schoolnew_academic_detail.school_type,
    MONTHNAME('2008-12-01' + INTERVAL schoolnew_academic_detail.acad_mnth_start MONTH) AS acad_mnth_start,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.low_class) as low_class,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.high_class) as high_class,
    (CASE WHEN (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) IS NULL THEN 'NO'
		ELSE CASE WHEN schoolnew_academic_detail.minority_grp=13 THEN CONCAT((SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp),' - ',schoolnew_academic_detail.minority_other) ELSE 
        (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) END END) AS minority_grp,
	(CASE WHEN schoolnew_academic_detail.minority_sch=1 THEN schoolnew_academic_detail.minority_yr ELSE 'NO' END) AS minority_yr,
    (CASE WHEN schoolnew_infra_detail.road_connect=1 THEN CONCAT('Kutcha Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=2 THEN CONCAT('Partial Pucca Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=3 THEN CONCAT('No Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN (schoolnew_infra_detail.road_connect=NULL OR  schoolnew_infra_detail.road_connect=0 OR schoolnew_infra_detail.road_connect IS NULL) THEN 'N/A' END
    END END END) AS weather_roads,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_boys,'NO') AS train_prov_boys,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_grls,'NO') AS train_prov_grls,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_by=1 THEN 'SCHOOL TEACHERS' ELSE
	CASE WHEN schoolnew_training_detail.train_cond_by=2 THEN 'SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=3 THEN 'BOTH SCHOOL & SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=4 THEN 'NGO' END END END END),'NO') AS train_cond_by,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_in=1 THEN 'SCHOOL PREMISES' ELSE
		CASE WHEN schoolnew_training_detail.train_cond_in=2 THEN 'OTHER THAN SCHOOL PREMISES' ELSE
			CASE WHEN schoolnew_training_detail.train_cond_in=3 THEN 'BOTH SCHOOL AND OTHER PREMISES' END END END),'N/A') AS train_cond_in,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_type=1 THEN 'RESIDENTIAL' ELSE
		CASE WHEN schoolnew_training_detail.train_type=2 THEN 'NON-RESIDENTIAL' ELSE
			CASE WHEN schoolnew_training_detail.train_type=3 THEN 'BOTH RESIDENTIAL AND NON-RESIDENTIAL' END END END),'N/A') AS train_type,
    (CASE WHEN schoolnew_training_detail.anganwadi=1 THEN 'YES' ELSE 'NO' END) AS anganwadi,
    IF(schoolnew_training_detail.anganwadi=1,angan_childs,'N/A') AS angan_childs,
    IF(schoolnew_training_detail.anganwadi=1,angan_wrks,'N/A') AS angan_wrks,
    schoolnew_training_detail.anganwadi_center,
    (CASE WHEN schoolnew_training_detail.anganwadi_train=1 THEN 'YES' ELSE 'NO' END) AS anganwadi_train,
    (CASE WHEN schoolnew_safety_details.sdmp_dev=1 THEN 'YES' ELSE 'NO' END) AS sdmp_dev,
    (CASE WHEN schoolnew_safety_details.sturct_saf=1 THEN 'YES' ELSE 'NO' END) AS sturct_saf,
    (CASE WHEN schoolnew_safety_details.nonsturct_saf=1 THEN 'YES' ELSE 'NO' END) AS nonsturct_saf,
    (CASE WHEN schoolnew_safety_details.cctv_school=1 THEN 'YES' ELSE 'NO' END) AS cctv_school,
    (CASE WHEN schoolnew_safety_details.firext_schl=1 THEN 'YES' ELSE 'NO' END) AS firext_schl,
    (CASE WHEN schoolnew_safety_details.nodtchr_schlsaf=1 THEN 'YES' ELSE 'NO' END) AS nodtchr_schlsaf,
    (CASE WHEN schoolnew_safety_details.dister_trng=1 THEN 'YES' ELSE 'NO' END) AS dister_trng,
    (CASE WHEN schoolnew_safety_details.dister_part=1 THEN 'YES' ELSE 'NO' END) AS dister_part,
    (CASE WHEN schoolnew_safety_details.slfdfse_trng=1 THEN schoolnew_safety_details.noslfdfse_trng ELSE 'NO' END) AS slfdfse_trng,
    (CASE WHEN schoolnew_committee_detail.suppliment_prevousyr=1 THEN 'YES' ELSE 'NO' END) AS suppliment_prevousyr,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_prepri,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_pri,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_upp,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_sec,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_hsec,
    
    (CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grade_preprim,
    (CASE WHEN schoolnew_textbook_detail.tle_grade_prim=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grade_prim=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grade_prim=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grade_prim,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_upp,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_sec,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_hsec,
    
    (CASE WHEN schoolnew_textbook_detail.sports_prepri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_prepri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_prepri=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_prepri,
    (CASE WHEN schoolnew_textbook_detail.sports_pri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_pri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_pri=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_pri,
    (CASE WHEN schoolnew_textbook_detail.sports_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_upp,
    (CASE WHEN schoolnew_textbook_detail.sports_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_sec,
    (CASE WHEN schoolnew_textbook_detail.sports_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_hsec,
    (CASE WHEN smc_const=1 THEN 'YES' ELSE 'NO' END) AS smc_const,
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_no,'N/A') as smc_acc_no,
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_name,'N/A') as smc_acc_name,
    IF(smc_const=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smc_bnk_brnch),'N/A') as smc_bank,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_name,'N/A') AS smc_chair_name,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_mble,'N/A') AS smc_chair_mble,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_mle,'N/A') AS smc_tot_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_fmle,'N/A') AS smc_tot_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_mle,'N/A') AS smc_prnts_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_fmle,'N/A') AS smc_prnts_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_mle,'N/A') AS smc_rep_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_fmle,'N/A') AS smc_rep_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_mle,'N/A') AS smc_weakr_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_fmle,'N/A') AS smc_weakr_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_no_prev_acyr,'N/A') AS smc_no_prev_acyr,
    IF(smc_const=1,schoolnew_committee_detail.smc_const_yr,'N/A') AS smc_const_yr,
    (CASE WHEN schoolnew_committee_detail.smc_sdp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smc_sdp=0 THEN 'NO' ELSE '(NO-DATA FOUND)' END END) AS smc_sdp,
        
	(CASE WHEN schoolnew_committee_detail.smdc_constitu=1 THEN 'YES' ELSE 'NO' END) AS smdc_constitu,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_name,'N/A') as smdc_acc_name,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_no,'N/A') as smdc_acc_no,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smdc_bnk_brnch),'N/A') as smdc_bank,
    
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_mle,'N/A') as smdc_tot_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_fmle,'N/A') as smdc_tot_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_mle,'N/A') as smdc_parnt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_fmle,'N/A') as smdc_parnt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_mle,'N/A') as smdc_lb_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_fmle,'N/A') as smdc_lb_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_mle,'N/A') as smdc_minori_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_fmle,'N/A') as smdc_minori_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_women,'N/A') as smdc_women,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_mle,'N/A') as smdc_scst_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_fmle,'N/A') as smdc_scst_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_mle,'N/A') as smdc_deo_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_fmle,'N/A') as smdc_deo_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_mle,'N/A') as smdc_audit_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_fmle,'N/A') as smdc_audit_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_mle,'N/A') as smdc_exprt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_fmle,'N/A') as smdc_exprt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_mle,'N/A') as smdc_techrs_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_fmle,'N/A') as smdc_techrs_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_mle,'N/A') as smdc_hm_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_fmle,'N/A') as smdc_hm_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_mle,'N/A') as smdc_prnci_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_fmle,'N/A') as smdc_prnci_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mle,'N/A') as smdc_chair_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_fmle,'N/A') as smdc_chair_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_const_yr,'N/A') as smdc_const_yr,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_no_last_acyr,'N/A') as smdc_no_last_acyr,
    (CASE WHEN schoolnew_committee_detail.smdc_sip=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smdc_sip=0 THEN 'NO' ELSE 'N/A' END END) AS smdc_sip,
	IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_contrib_amt,'N/A') as smdc_contrib_amt,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_name,'N/A') as smdc_chair_name,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mble,'N/A') as smdc_chair_mble,
    
    IF(schoolnew_committee_detail.sbc_const=1,schoolnew_committee_detail.sbc_const_year,'NO') as sbc_const,
    
    IF(schoolnew_committee_detail.acadecomm_const=1,schoolnew_committee_detail.acadecomm_year,'NO') as acadecomm_const,
    (CASE WHEN schoolnew_committee_detail.pta_const=1 THEN 'YES' ELSE 'NO' END) AS pta_const,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_est_yr,'N/A') as pta_est_yr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_no_curyr,'N/A') as pta_no_curyr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_reg_no,'N/A') as pta_reg_no,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_subscri_amt,'N/A') as pta_subscri_amt,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_name,'N/A') as pta_chair_name,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_mble,'N/A') as pta_chair_mble,
    TRUNCATE((schoolnew_infra_detail.land_avail_sqft/43560),3) AS land_avail_sqft,
    IF(schoolnew_infra_detail.play_facility=1,TRUNCATE((schoolnew_infra_detail.play_area_sqft/43560),3),IF(schoolnew_infra_detail.play_alt_arrang=1,CONCAT(schoolnew_infra_detail.play_address,'<br>Distance:',schoolnew_infra_detail.dist_build_playgr),'N/A')) AS play_area_sqft,
    
    IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area/43560),3),'N/A') AS play_land_area,
    (CASE WHEN schoolnew_infra_detail.land_ownersip=1 THEN 'RENTED' ELSE
		CASE WHEN schoolnew_infra_detail.land_ownersip=2 THEN 'LEASED' ELSE
			CASE WHEN schoolnew_infra_detail.land_ownersip=3 THEN 'OWNED' ELSE
				CASE WHEN schoolnew_infra_detail.land_ownersip=4 THEN 'RENTAL FREE' END END END END) AS land_ownersip,
	IF(schoolnew_infra_detail.land_ownersip=1,schoolnew_infra_detail.land_rent_amt,'N/A') AS land_rent_amt,
    IF(schoolnew_infra_detail.land_ownersip=2,schoolnew_infra_detail.land_lease_perid,'N/A') AS land_lease_perid,
    IF(schoolnew_infra_detail.land_ownersip=2,DATE_FORMAT(schoolnew_infra_detail.valid_upto,\"%d/%m/%Y\"),'N/A') AS valid_upto,
    (CASE WHEN schoolnew_infra_detail.cmpwall_type=1 THEN 'PUCCA' ELSE
		CASE WHEN schoolnew_infra_detail.cmpwall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
			CASE WHEN schoolnew_infra_detail.cmpwall_type=3 THEN 'BARBED WIRE FENCING' ELSE
				CASE WHEN schoolnew_infra_detail.cmpwall_type=4 THEN 'HEDGES' ELSE
					CASE WHEN schoolnew_infra_detail.cmpwall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
						CASE WHEN schoolnew_infra_detail.cmpwall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_type,
	IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_perimtr) as cmpwall_perimtr,
    IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_length) as cmpwall_length,
    schoolnew_infra_detail.build_block_no,
    schoolnew_infra_detail.classrm_undr_constr,
	(CASE WHEN schoolnew_infra_detail.classrm_desk_studs=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studs,
	(CASE WHEN schoolnew_infra_detail.ramp_disable_child=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_child,
	(CASE WHEN schoolnew_infra_detail.ramp_handrail=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrail,
	IF(schoolnew_infra_detail.staffquarter=1,schoolnew_infra_detail.rooms_staffquartrs,'N/A') AS rooms_staffquartrs,
	(CASE WHEN schoolnew_infra_detail.fulltime_lib=1 THEN 'YES' ELSE 'NO' END) AS fulltime_lib,
	(CASE WHEN schoolnew_infra_detail.news_subscribe=1 THEN 'YES' ELSE 'NO' END) AS news_subscribe,
        
        schoolnew_infra_detail.toil_gents_tot,
        schoolnew_infra_detail.toil_ladies_tot,
        schoolnew_infra_detail.urinal_gents_tot,
        schoolnew_infra_detail.urinals_tot_ladies,
        
        schoolnew_infra_detail.toil_bys_inuse,
        schoolnew_infra_detail.toil_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=4 THEN 'N/A' END END END END) AS toil_nonfunc_bys,
        schoolnew_infra_detail.toil_inuse_grls,
        schoolnew_infra_detail.toil_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.toil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_reasn_grls=4 THEN 'N/A' END END END END) AS toil_reasn_grls,
                    
		schoolnew_infra_detail.cwsntoil_inuse_bys,
        schoolnew_infra_detail.cwsntoil_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_bys,
        schoolnew_infra_detail.cwsntoil_inuse_grls,
        schoolnew_infra_detail.cwsntoil_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grls,
        schoolnew_infra_detail.urinls_inuse_bys,
        schoolnew_infra_detail.urinls_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=4 THEN 'N/A' END END END END) AS urinls_reasn_bys,
        schoolnew_infra_detail.urinls_inuse_grls,
        schoolnew_infra_detail.urinls_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=4 THEN 'N/A' END END END END) AS urinls_reasn_grls,
		schoolnew_infra_detail.toil_waterfac_bys,
        schoolnew_infra_detail.toil_waterfac_grls,
        schoolnew_infra_detail.urinls_waterfac_bys,
        schoolnew_infra_detail.urinls_waterfac_grls,
        (CASE WHEN schoolnew_infra_detail.toil_sanit_wrks=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrks,
        IF(schoolnew_infra_detail.toil_land_avail=1,schoolnew_infra_detail.toil_land_avail_sqft,'NO') AS toil_land_avail,
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_avail_no,
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_avail_no,'N/A') AS inci_auto_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_func_no,'N/A') AS inci_auto_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_avail_no,'N/A') AS inci_man_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_func_no,'N/A') AS inci_man_func_no,
        schoolnew_infra_detail.tot_handwash_bys,
        schoolnew_infra_detail.tot_handwash_grls,
        IF(schoolnew_infra_detail.drnkwater_avail=1,
        (CASE WHEN schoolnew_infra_detail.drnkwater_source=1 THEN 'HAND PUMPS' ELSE
			CASE WHEN schoolnew_infra_detail.drnkwater_source=2 THEN 'WELL' ELSE
				CASE WHEN schoolnew_infra_detail.drnkwater_source=3 THEN 'TAP WATER' ELSE
					CASE WHEN schoolnew_infra_detail.drnkwater_source=4 THEN 'RO PURIFIER' ELSE
						CASE WHEN schoolnew_infra_detail.drnkwater_source=5 THEN 'PACKAGED/BOTTELED' ELSE
							CASE WHEN schoolnew_infra_detail.drnkwater_source=-1 THEN CONCAT('OTHERS - ',schoolnew_infra_detail.drnkwater_othsource) END END END END END END),'NO') AS drnkwater_avail,
		IF(schoolnew_infra_detail.drnkwater_source=2,(CASE WHEN schoolnew_infra_detail.well_top=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_top,
        IF(schoolnew_infra_detail.water_test=1,'YES','NO') AS water_test,
        IF(schoolnew_infra_detail.overheadtank_avail=1,'YES','NO') AS overheadtank_avail,
        IF(schoolnew_infra_detail.waterpuri_avail=1,'YES','NO') AS waterpuri_avail,
        IF(schoolnew_infra_detail.schl_rainwtr_hrv=1,'YES','NO') AS schl_rainwtr_hrv,
        IF(schoolnew_infra_detail.solar_panel=1,'YES','NO') AS solar_panel,
        IF(schoolnew_infra_detail.kitchen_garden=1,'YES','NO') AS kitchen_garden,
        (CASE WHEN schoolnew_infra_detail.class_dustbin=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.class_dustbin=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.class_dustbin=2 THEN 'YES BUT SOME' END END END) AS class_dustbin,
		(CASE WHEN schoolnew_infra_detail.waste_toilets=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.waste_toilets=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_toilets=2 THEN 'YES BUT SOME' END END END) AS waste_toilets,
		(CASE WHEN schoolnew_infra_detail.waste_kitchen=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.waste_kitchen=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_kitchen=2 THEN 'YES BUT SOME' END END END) AS waste_kitchen,
        (CASE WHEN schoolnew_academic_detail.cal=1 THEN 'YES' ELSE 'NO' END) AS cal,
        IF((schoolnew_academic_detail.clab=1 OR schoolnew_academic_detail.clab=3),CONCAT(
        (CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END),'-',schoolnew_academic_detail.year_implmnt),CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END) AS clab,
			(CASE WHEN schoolnew_academic_detail.ict_lab=1 THEN 'YES' ELSE 'NO' END) AS ict_lab,
            (CASE WHEN schoolnew_academic_detail.model_ict=1 THEN 'BOOT MODEL' ELSE
				CASE WHEN schoolnew_academic_detail.model_ict=2 THEN 'BOO MODEL' ELSE
					CASE WHEN schoolnew_academic_detail.model_ict=3 THEN 'OTHER MODEL' END END END) AS model_ict,
			(CASE WHEN schoolnew_academic_detail.ict_type=1 THEN 'FULL TIME' ELSE
				CASE WHEN schoolnew_academic_detail.ict_type=2 THEN 'PART TIME' ELSE
					CASE WHEN schoolnew_academic_detail.ict_type=3 THEN 'NOT AVALIABLE' END END END) AS model_ict_type,
			(CASE WHEN schoolnew_academic_detail.electricity=1 THEN 'YES' ELSE
				CASE WHEN schoolnew_academic_detail.electricity=2 THEN 'NO' ELSE
					CASE WHEN schoolnew_academic_detail.electricity=3 THEN 'NOT FUNCTIONING' END END END) AS electricity,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,'YES','NO') AS med_ckup_lstyr,        
			IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_1 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_1,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_1,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_2 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_2,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_2,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_3 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_3,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_3,
            
            (CASE WHEN schoolnew_training_detail.deworm_tab=1 THEN 'COMPLETE TWO DOSE' ELSE
				CASE WHEN schoolnew_training_detail.deworm_tab=2 THEN 'PARTIALLY ONE DOSE' ELSE
					CASE WHEN schoolnew_training_detail.deworm_tab=3 THEN 'NONE' END END END) AS deworm_tab,
			(CASE WHEN schoolnew_training_detail.iron_folic=1 THEN 'YES' ELSE 'NO' END) AS iron_folic,
	langandmed.medium_instruct as mediumetr,
    langandmed.lang_instruct as langetr,
    (CASE WHEN spl_edtor=1 THEN 'AT CLUSTER LEVEL' ELSE
		CASE WHEN spl_edtor=2 THEN 'DEDICATED' ELSE
			CASE WHEN spl_edtor=3 THEN 'NO' ELSE
				CASE WHEN spl_edtor IS NULL THEN 'NO DATA' END END END END) AS spl_edtor,
	(CASE WHEN schoolnew_training_detail.stu_councel=1 THEN 'YES' ELSE 'NO' END) AS stu_councel,
    IF(schoolnew_training_detail.sci_lab_sec=0,'NO',schoolnew_training_detail.tot_room) AS tot_room
FROM schoolnew_basicinfo
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_parliament ON schoolnew_parliament.id=schoolnew_basicinfo.parliament_id
JOIN schoolnew_assembly ON schoolnew_assembly.id=schoolnew_basicinfo.assembly_id
JOIN schoolnew_training_detail ON schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_textbook_detail ON schoolnew_textbook_detail.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT 
			schoolnew_district.id as district_id,
			schoolnew_district.district_name,
			schoolnew_edn_dist_mas.id as edu_dist_id,
			schoolnew_edn_dist_mas.edn_dist_name as edu_dist_name,
			schoolnew_block.id as block_id,
			schoolnew_block.block_name
		FROM
			schoolnew_district
		JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
		JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.district_code=schoolnew_district.id
		JOIN schoolnew_block ON schoolnew_block.district_id=schoolnew_district.id AND schoolnew_edn_dist_block.block_id
		GROUP BY district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
) AS locationentry ON locationentry.district_id=schoolnew_basicinfo.district_id AND locationentry.edu_dist_id=schoolnew_basicinfo.edu_dist_id AND locationentry.block_id=schoolnew_basicinfo.block_id 

JOIN (SELECT  
		schoolnew_zone_type.zone_type,
		schoolnew_habitation_all.name as village_ward,
		schoolnew_localbody_all.name as village_munci,
		schoolnew_habitation_all.id as village_id
	FROM schoolnew_localbody_all
	JOIN schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
	JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
) AS localbodyall ON village_id=schoolnew_basicinfo.lb_habitation_id

JOIN (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
		JOIN schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
		JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
) AS schooldirectrate ON schooldirectrate.directid=schoolnew_basicinfo.sch_directorate_id

JOIN (SELECT * FROM schoolnew_type) as schoolnew_type ON schoolnew_type.id=schoolnew_academic_detail.scl_category
JOIN (SELECT medid,landesc.school_key_id,medium_instruct,langid,lang_instruct FROM 
			(SELECT schoolnew_mediumentry.id as medid,schoolnew_mediumentry.school_key_id,
				schoolnew_mediumofinstruction.MEDINSTR_DESC AS medium_instruct
			FROM schoolnew_mediumofinstruction
			JOIN schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=schoolnew_mediumofinstruction.MEDINSTR_ID) AS meddesc
		JOIN (SELECT schoolnew_langtaught_entry.id as langid,schoolnew_langtaught_entry.school_key_id,
					schoolnew_mediumofinstruction.MEDINSTR_DESC AS lang_instruct
				FROM schoolnew_mediumofinstruction
				JOIN schoolnew_langtaught_entry ON schoolnew_langtaught_entry.lang_taught=schoolnew_mediumofinstruction.MEDINSTR_ID
) as landesc ON landesc.school_key_id=meddesc.school_key_id) AS langandmed ON langandmed.school_key_id=schoolnew_basicinfo.school_id

LEFT JOIN (SELECT * FROM schoolnew_resitype) as schoolnew_resitype ON schoolnew_resitype.RESITYPE_ID=schoolnew_academic_detail.typ_resid_schl        
LEFT JOIN schoolnew_safety_details ON schoolnew_safety_details.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=".$schoolid.";";
        //echo($SQL);die("NewFunction");
        $query = $this->db->query($SQL);
		return $query->result_array();
    }*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*******************************************************************************
		School Profile Master
	********************************************************************************/
	
	
	function getSchoolInfo($school_udise){
        
        $SQL="SELECT *,schoolnew_basicinfo.udise_code as udise_code,schoolnew_basicinfo.block_id as bid,schoolnew_stdcode_mas.id as sid FROM schoolnew_basicinfo
            LEFT JOIN schoolnew_block ON schoolnew_block.id=schoolnew_basicinfo.block_id
            LEFT JOIN schoolnew_district ON schoolnew_district.id=schoolnew_basicinfo.district_id
            LEFT JOIN schoolnew_stdcode_mas ON schoolnew_stdcode_mas.dist_id=schoolnew_basicinfo.district_id
            LEFT JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
            LEFT JOIN schoolnew_manage_cate ON schoolnew_manage_cate.id=schoolnew_basicinfo.manage_cate_id
            LEFT JOIN schoolnew_management ON schoolnew_management.id=schoolnew_basicinfo.sch_management_id
            LEFT JOIN schoolnew_school_department ON schoolnew_school_department.id=schoolnew_basicinfo.sch_directorate_id
            LEFT JOIN baseapp_category ON baseapp_category.id=schoolnew_basicinfo.sch_cate_id
            WHERE   
            schoolnew_basicinfo.school_id=".$school_udise;
            //echo $SQL;
            //die();
            $query = $this->db->query($SQL);
            return $query->result();
    }
	
	
	
	
	function getProfileCompletes($udise_code){
        $SQL="SELECT * FROM schoolnew_profilecomplete
              JOIN schoolnew_basicinfo ON schoolnew_basicinfo.school_id=schoolnew_profilecomplete.school_key_id
              WHERE udise_code=".$udise_code;
        $query = $this->db->query($SQL);
        if($query!=null)
            return $query->result_array();
        else
            return null;
    }
	
	function get_alldistricts(){
		$this->db->select('*');
        $this->db->from('schoolnew_district');  
        $this->db->order_by("district_name", "asc");     
        $query = $this->db->get(); 
       return $query->result();
    } 
	
	function getSTDCodeByDistrict($district_id,$opt=1){
        if($opt==1)
		{
            $this->db->select('*'); 
            $this->db->from('schoolnew_stdcode_mas');
            $this->db->where('dist_id',$district_id); 
            $query =  $this->db->get();
            return $query->result();
        }
        else
		{
            $SQL="SELECT * FROM schoolnew_stdcode_mas WHERE dist_id=".$district_id;
            $query = $this->db->query($SQL);
            return $query->result_array();
        }
    } 
	
	function getResidentialType(){
        $this->db->select('*');
        $this->db->from('schoolnew_resitype');
        $this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }
	
	
	function getallschoolcategory(){
       $this->db->select('*')
            ->from('schoolnew_type');          
       $query = $this->db->get(); 
       return $query->result();
    }
	
	
	function get_allmajorcategory(){
        $this->db->select('*');
        $this->db->from('schoolnew_manage_cate');           
        $query = $this->db->get(); 
        return $query->result();
	}
	
	
	function getMediumInstruct(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        //$this->db->where('VISIBLE_YN',1);
        $query =  $this->db->get();
        return $query->result();
    }
	
	
	
	function getminority(){
        $this->db->select('*');
        $this->db->from('schoolnew_minority');
        $this->db->order_by('minority','asc');
        $query = $this->db->get();
        return $query->result();
    }
	
    function getLanguageasSubject(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_mediumofinstruction');
        $query =  $this->db->get();
        return $query->result();
    }
	
	function get_allbankdistricts(){
        $this->db->select('*');
        $this->db->from('schoolnew_bank_district');
		$this->db->order_by('bank_dist', 'ASC');		
		$query = $this->db->get(); 
		return $query->result();
    } 
	
    function getTrades(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_trade');
        $query =  $this->db->get();
        return $query->result();
    }
	
	function getICTList($p){
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_list');
		$this->db->where('category',$p);
		$this->db->order_by("ict_type", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
	
    function getbankList(){
        $SQL="select distinct(bankcode),id,bank from schoolnew_bank group by bankcode ORDER BY bank ASC";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	
	function getLablist(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_lab');
		$this->db->order_by("visibility", "asc");
        $query =  $this->db->get();
        return $query->result();
    }
	
	function getConstructlist(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_construct');
        $query =  $this->db->get();
        return $query->result();
    }
	
	function getclub(){
        $SQL="SELECT * FROM schoolnew_club";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
	function getICTSupplier(){
        $this->db->select('*'); 
        $this->db->from('schoolnew_ict_suppliers');
        $query =  $this->db->get();
        return $query->result();
    }
	
	
	function udise_validation_hm_crc($records,$table){
        $school_id = $records['school_key_id'];
        unset($records['schl_name']);
        $ac_year = $records['ac_year'];
        $SQL="SELECT * FROM ".$table." WHERE school_key_id = ".$school_id." and ac_year = '$ac_year'";
        $result=$this->db->query($SQL)->result_array();
        if(count($result)>0){    
            $records['updated_date'] = date("Y-m-d h:i:s");             
            $this->db->where('school_key_id',$school_id);
            $this->db->update($table,$records);
            return "updated";
        }else{
            $records['created_date'] = date("Y-m-d h:i:s");
            $this->db->insert($table, $records);
            return "inserted";
        }                  
    }

    function udise_validator_det($schl_id,$table){
        $SQL="SELECT * FROM ".$table." WHERE school_key_id = ".$schl_id." and ac_year = '2019-20'";
        $result=$this->db->query($SQL)->result_array();
        //print_r($result);die();
        return $result;                
    }
    
    //Vivek Rao Bhosale
    
    function stateEnrollment($where,$item,$acyear){
        $SQL="SELECT ac_year,
                item_group,
                (CASE WHEN item_id=1 THEN 'GENERAL'
                		WHEN item_id=2 THEN 'SC'
                        WHEN item_id=3 THEN 'ST'
                        WHEN item_id=4 THEN 'OBC'
                        WHEN item_id=5 THEN 'TOTAL' END) AS item,
                SUM(cpp_b) AS cpp_b,
                SUM(cpp_g) AS cpp_g,
                SUM(c1_b) AS c1_b,
                SUM(c1_g) AS c1_g,
                SUM(c2_b) AS c2_b,
                SUM(c2_g) AS c2_g,
                SUM(c3_b) AS c3_b,
                SUM(c3_g) AS c3_g,
                SUM(c4_b) AS c4_b,
                SUM(c4_g) AS c4_g,
                SUM(c5_b) AS c5_b,
                SUM(c5_g) AS c5_g,
                SUM(c6_b) AS c6_b,
                SUM(c6_g) AS c6_g,
                SUM(c7_b) AS c7_b,
                SUM(c7_g) AS c7_g,
                SUM(c8_b) AS c8_b,
                SUM(c8_g) AS c8_g,
                SUM(c9_b) AS c9_b,
                SUM(c9_g) AS c9_g,
                SUM(c10_b) AS c10_b,
                SUM(c10_g) AS c10_g,
                SUM(c11_b) AS c11_b,
                SUM(c11_g) AS c11_g,
                SUM(c12_b) AS c12_b,
                SUM(c12_g) AS c12_g,
                SUM(cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total 
                FROM mhrd_sch_enr_fresh WHERE ac_year='".$acyear."' AND item_group=".$item." AND udise_sch_code IN (SELECT udise_sch_code FROM mhrd_school_master WHERE udise_sch_code IS NOT NULL ".$where.") GROUP BY item_id
                UNION ALL 
                SELECT ac_year,
                item_group,
                'TOTAL' AS item,
                SUM(cpp_b) AS cpp_b,
                SUM(cpp_g) AS cpp_g,
                SUM(c1_b) AS c1_b,
                SUM(c1_g) AS c1_g,
                SUM(c2_b) AS c2_b,
                SUM(c2_g) AS c2_g,
                SUM(c3_b) AS c3_b,
                SUM(c3_g) AS c3_g,
                SUM(c4_b) AS c4_b,
                SUM(c4_g) AS c4_g,
                SUM(c5_b) AS c5_b,
                SUM(c5_g) AS c5_g,
                SUM(c6_b) AS c6_b,
                SUM(c6_g) AS c6_g,
                SUM(c7_b) AS c7_b,
                SUM(c7_g) AS c7_g,
                SUM(c8_b) AS c8_b,
                SUM(c8_g) AS c8_g,
                SUM(c9_b) AS c9_b,
                SUM(c9_g) AS c9_g,
                SUM(c10_b) AS c10_b,
                SUM(c10_g) AS c10_g,
                SUM(c11_b) AS c11_b,
                SUM(c11_g) AS c11_g,
                SUM(c12_b) AS c12_b,
                SUM(c12_g) AS c12_g,
                SUM(cpp_b+cpp_g+c1_b+c1_g+c2_b+c2_g+c3_b+c3_g+c4_b+c4_g+c5_b+c5_g+c6_b+c6_g+c7_b+c7_g+c8_b+c8_g+c9_b+c9_g+c10_b+c10_g+c11_b+c11_g+c12_b+c12_g) AS item_total 
                FROM mhrd_sch_enr_fresh WHERE ac_year='".$acyear."' AND item_group=".$item." AND udise_sch_code IN (SELECT udise_sch_code FROM mhrd_school_master WHERE udise_sch_code IS NOT NULL ".$where.");";
                
                //echo($SQL);die();
                
                $query = $this->db->query($SQL);
                return $query->result_array();
        }
        function teacherPosition($udise,$acyear,$dist_id,$edu_dist_id){

            if(!empty($dist_id) || !empty($edu_dist_id)){
                if(!empty($dist_id)){                    
                    //$where1 = "where sc.district_id='".$dist_id."' AND ac_year='".$ac_year."' group by sc.district_id";
                    $where1 = "join mhrd_mst_district d on d.udise_district_code=m.district_cd 
                    WHERE d.district_id='".$dist_id."' AND ac_year='".$ac_year."' group by d.district_name";
                }
                else if(!empty($edu_dist_id)){
                    //$where1 = "where  sc.edu_dist_id='".$edu_dist_id."' AND ac_year='".$ac_year."' group by sc.edu_dist_id";
                    $where1 = "mhrd_mst_loc_edu_block d on d.udise_edu_block_code=m.edu_block_cd WHERE d.udise_edu_block_code='".$edu_dist_id."' AND ac_year='".$ac_year."' group by d.edu_block_name";
                }
                $SQL = "SELECT 
                -- d.district_name,
                ac_year,
                sum(tch_regular),
                sum(tch_contract),
                sum(tch_part_time),
                sum(nontch_accnt),
                sum(nontch_lib_asst),
                sum(nontch_lab_asst),
                sum(nontch_udc),
                sum(nontch_ldc),
                sum(nontch_peon),
                sum(nontch_watchman),
                tch_hav_adhr FROM mhrd_sch_staff_posn p 
                join mhrd_school_master m on m.old_udise_sch_code=p.udise_sch_code 
                $where1;";
            }else{
                $SQL="SELECT udise_sch_code,
                ac_year,
                tch_regular,
                tch_contract,		
                tch_part_time,		
                nontch_accnt,		
                nontch_lib_asst,		
                nontch_lab_asst,	
                nontch_udc,	
                nontch_ldc,	
                nontch_peon,	
                nontch_watchman,
                tch_hav_adhr FROM mhrd_sch_staff_posn WHERE udise_sch_code='".$udise."' AND ac_year='".$acyear."';";
            }
            //echo($SQL);die();
            $query = $this->db->query($SQL);
            return $query->result_array();
        }

        // public function teacher_data($teacher_id){
        //     $SQL="SELECT * from udise_staffreg where teacher_id = '".$teacher_id."';";
        //     $query = $this->db->query($SQL);
        //     return $query->result_array();
        // }

        public function teacher_data($teacher_id){
            $SQL="select udise_staffreg.u_id,udise_staffreg.teacher_id, udise_staffreg.off_code, udise_staffreg.off_id, udise_staffreg.district_id,udise_staffreg.block_id, udise_staffreg.udise_code, udise_staffreg.school_key_id, 
            udise_staffreg.teacher_code, udise_staffreg.aadhar_no, udise_staffreg.cps_gps_details, udise_staffreg.cps_gps, udise_staffreg.suffix,suffix.suffix as suffix_name, udise_staffreg.teacher_name, 
            udise_staffreg.teacher_name_tamil, udise_staffreg.e_prnts_nme, udise_staffreg.teacher_mother_name, udise_staffreg.teacher_spouse_name, udise_staffreg.e_med, 
            udise_staffreg.gender, udise_staffreg.staff_dob, udise_staffreg.staff_join, udise_staffreg.staff_pjoin, udise_staffreg.staff_psjoin, 
            udise_staffreg.e_doj_prpost, udise_staffreg.social_category,teacher_social_category.social_cat as social_category_name,udise_staffreg.teacher_type,teacher_type.type_teacher as type_teacher_name, 
            udise_staffreg.appointment_nature,(case when appointment_nature='1' then 'Regular' when appointment_nature='2' then 'Contract' when appointment_nature='3' then 'Part-Time' else 'NA' end) as appointment_nature_name,
            udise_staffreg.academic, teacher_academic_qualify.academic_teacher as academic_name,
            udise_staffreg.professional,teacher_professional_qualify.professional as professional_name,udise_staffreg.class_taught,teacher_class_taught.category as class_taught_name,
            udise_staffreg.appointed_subject,appointedsubject.subjects as appointed_subject_name, udise_staffreg.subject1,s1.subjects as subject1_name, udise_staffreg.subject2, 
            s2.subjects as subject2_name,udise_staffreg.subject3,s3.subjects as subject3_name, 
            udise_staffreg.subject4,s4.subjects as subject4_name, udise_staffreg.subject5, s5.subjects as subject5_name,udise_staffreg.subject6,s6.subjects as subject6_name,
            udise_staffreg.deputed, udise_staffreg.dep_place, udise_staffreg.dep_off, udise_staffreg.dep_scl, 
            udise_staffreg.dep_scldist, udise_staffreg.dep_sclblk, udise_staffreg.dep_date, udise_staffreg.brc, udise_staffreg.crc, udise_staffreg.diet, udise_staffreg.others, udise_staffreg.trng_needed, udise_staffreg.trng_received, udise_staffreg.nontch_days, 
            udise_staffreg.math_upto, udise_staffreg.science_upto, udise_staffreg.english_upto, udise_staffreg.soc_study_upto, udise_staffreg.lang_study_upto, 
            udise_staffreg.wrkng_presentschlsince, udise_staffreg.disability_type, udise_staffreg.types_disability, 
            udise_staffreg.trained_cwsn, udise_staffreg.trained_comp, udise_staffreg.mbl_nmbr, udise_staffreg.email_id, udise_staffreg.e_prsnt_doorno, udise_staffreg.e_prsnt_street, 
            udise_staffreg.e_prsnt_place, udise_staffreg.e_prsnt_distrct,schoolnew_district.district_name as e_prsnt_distrct_name, udise_staffreg.e_prsnt_pincode, 
            udise_staffreg.e_blood_grp,baseapp_bloodgroup.group as e_blood_grp_ame, udise_staffreg.e_picid, 
            udise_staffreg.e_ug, udise_staffreg.e_pg,
            teacher_ug_degree.ug_degree as e_ug_name,teacher_pg_degree.pg_degree as e_pg_name, udise_staffreg.recruit_rank, udise_staffreg.recruit_year, udise_staffreg.scl_flag, udise_staffreg.recruit_type, udise_staffreg.posting_nature, udise_staffreg.picid, 
            udise_staffreg.trans_category, udise_staffreg.trans_remarks, udise_staffreg.trans_date, udise_staffreg.status, udise_staffreg.archive, udise_staffreg.qr_code,teacher_type.category as category
            from udise_staffreg
            left join schoolnew_basicinfo on schoolnew_basicinfo.udise_code= udise_staffreg.udise_code
            left join baseapp_bloodgroup on baseapp_bloodgroup.id=udise_staffreg.e_blood_grp
            left join schoolnew_district on schoolnew_district.id= udise_staffreg.e_prsnt_distrct
            left join teacher_type on teacher_type.id = udise_staffreg.teacher_type
            left join teacher_academic_qualify on teacher_academic_qualify.id=udise_staffreg.academic
            left join teacher_professional_qualify on teacher_professional_qualify.id=udise_staffreg.professional
            left join teacher_subjects as appointedsubject on appointedsubject.id=udise_staffreg.appointed_subject
            left join teacher_subjects as s1 on s1.id=udise_staffreg.subject1
            left join teacher_subjects as s2 on s2.id=udise_staffreg.subject2
            left join teacher_subjects as s3 on s3.id=udise_staffreg.subject3
            left join teacher_social_category on teacher_social_category.id=udise_staffreg.social_category
            left join teacher_subjects as s4 on s4.id=udise_staffreg.subject4
            left join teacher_subjects as s5 on s5.id=udise_staffreg.subject5
            left join teacher_subjects as s6 on s6.id=udise_staffreg.subject6
            left join suffix on suffix.id=udise_staffreg.suffix
            left join teacher_ug_degree on teacher_ug_degree.id=udise_staffreg.e_ug
            left join teacher_pg_degree on teacher_pg_degree.id=udise_staffreg.e_pg 
            left join teacher_class_taught on teacher_class_taught.id = udise_staffreg.class_taught 
            where udise_staffreg.teacher_id= '".$teacher_id."';";
            $query = $this->db->query($SQL);
            return $query->result_array();

        }

        public function get_medium($school_id){
            $SQL="select 'Medium',med.MEDINSTR_DESC,med.id from schoolnew_mediumofinstruction med join schoolnew_mediumentry met on met.medium_instrut=med.id and met.school_key_id='".$school_id."';";
            $query = $this->db->query($SQL);
            return $query->result_array();
        }
        public function get_lang($school_id){
            $SQL="select 'Lang',med.MEDINSTR_DESC,med.id from schoolnew_mediumofinstruction med join schoolnew_langtaught_entry lang on lang.lang_taught=med.id and lang.school_key_id='".$school_id."';";
            $query = $this->db->query($SQL);
            return $query->result_array();
        }

        /**Udise + student class wise strength and number of teaching and non teaching staff starts here**/

        public function get_stuTeachNonTeachStrngth($school_id){
            $SQL="select
            sum(prkg_b+prkg_g+prkg_t) as Pre_KG,
            sum(lkg_b+lkg_g+lkg_t) as LKG,
            sum(ukg_b+ukg_g+ukg_t) as UKG,
            sum(c1_b+c1_g+c1_t) as Class1,
            sum(c2_b+c2_g+c2_t) as Class2,
            sum(c3_b+c3_g+c3_t) as Class3,
            sum(c4_b+c4_g+c4_t) as Class4,
            sum(c5_b+c5_g+c5_t) as Class5,
            sum(c6_b+c6_g+c6_t) as Class6,
            sum(c7_b+c7_g+c7_t) as Class7,
            sum(c8_b+c8_g+c8_t) as Class8,
            sum(c9_b+c9_g+c9_t) as Class9,
            sum(c10_b+c10_g+c10_t) as Class10,
            sum(c11_b+c11_g+c11_t) as Class11,
            sum(c12_b+c12_g+c12_t) as Class12,
            teach_tot as Teach_Staff,
            nonteach_tot as Non_Teach_Staff
            from students_school_child_count where school_id ='".$school_id."';";
            $query = $this->db->query($SQL);
            return $query->result_array();
        }

        /**Udise + student class wise strength and number of teaching and non teaching staff ends here**/
}
?>