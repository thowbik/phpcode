<?php
class AllApproveModel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function AllApproveExcute($where,$group,$module,$sublist){
        
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
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NOT NULL AND vaild_from!='0000-00-00'))>0,IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,'IN RESET QUEUE','APPROVED'), 
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
                            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) 
            FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) 
            AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
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
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NULL OR vaild_from='0000-00-00'))>0,
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                    timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                )>0,96,97),
                IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,96,98))
        ELSE 
            IF((SELECT COUNT(1) FROM schoolnew_renewal WHERE id=T1.id AND (vaild_from IS NOT NULL AND vaild_from!='0000-00-00'))>0,IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
            )>0,96,98), 
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
                        )>0,96,97),
                    IF((SELECT COUNT(1) FROM schoolnew_renewalreset WHERE 
                            timestamp=(SELECT MAX(timestamp) FROM schoolnew_renewalreset as sr WHERE sr.renewal_id=T1.id) AND approved_emis_sno IS NULL
                    )>0,96,99)
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
                            auth_cat_id NOT IN (SELECT IF(T1.auth!=0,IF(srr.auth<0,-(srr.auth),srr.auth),srr.auth) 
            FROM schoolnew_renewapprove as srr WHERE srr.renewal_id=T1.id AND srr.auth!=T1.auth GROUP BY auth) 
            AND school_type=T1.sch_directorate_id AND module_id=".$module." LIMIT 1
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
)  AS appauth,
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
        (($this->session->userdata('emis_user_type_id')!=1 && $this->session->userdata('emis_user_type_id')!=5 && $this->session->userdata('emis_user_type_id')!='')?"AND (schoolnew_moduleauth.auth_cat_id=".$this->session->userdata('emis_user_type_id')." OR schoolnew_moduleauth.final_cat_id=".$this->session->userdata('emis_user_type_id').")":" ")."
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
        ".(($this->session->userdata('emis_user_type_id')!=1 && $this->session->userdata('emis_user_type_id')!=5)?("WHERE appauth".($this->uri->segment(4,0)==0?"<96":($this->uri->segment(4,0)==-1?" IS NOT NULL":"=".$this->uri->segment(4,0)))." OR appauth IS NULL"):"").";";
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
    function getSchoolProfileData($schoolid){
        ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
        //$this->load->helper("url");
        //$url=str_replace("https","http",base_url());
        //echo($url);die();
        $dargs=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false),
        "http"=>array('timeout' => 60, 
        'user_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/3.0.0.1'));
        
        if($this->uri->segment(4,0)!=2){
            $MyFile = file_get_contents(base_url()."application/controllers/sql/NewProfileQuery.sql",false,stream_context_create($dargs));
            //$MyFile = $url."application/controllers/sql/NewProfileQuery.sql";
        }
        else{
            $MyFile = file_get_contents(base_url()."application/controllers/sql/NewSchoolQuery_1.sql",false,stream_context_create($dargs));
            //$MyFile = $url."application/controllers/sql/NewProfileQuery.sql";
        }
        
        /*$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $MyFile);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $MyFile = curl_exec($curl);
        curl_close($curl);*/
        
        $SQL=str_replace("3531",$schoolid,$MyFile);
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();  
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
        $query = $this->db->query($SQL);
        return $query->result_array();  
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
        $query = $this->db->query($SQL);
        return $query->result_array();  
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
        $query = $this->db->query($SQL);
        return $query->result_array();  
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
        $query = $this->db->query($SQL);
        return $query->result_array();  
    }
    
    
    
    function DashBoardCounts($where){
        $SQL="SELECT * FROM schoolnew_manage_cate
                LEFT JOIN (
                SELECT 
                	SUM(total_b+total_g+total_t) AS stud_total,
                    SUM(teach_tot) as teach_tot,
                    SUM(nonteach_tot) AS nonteach_tot,
                    COUNT(*) AS totschoolss,
                    SUM((CASE WHEN school_type_id=1 THEN (Prkg_b+Prkg_g+Prkg_t+lkg_b+lkg_g+lkg_t+ukg_b+ukg_g+ukg_t+c1_b+c1_g+c1_t) ELSE 0 END)) AS totalstud,
                    school_type_id,district_id,edu_dist_id,block_id
                FROM students_school_child_count 
                WHERE school_type_id IS NOT NULL ".$where."
                GROUP BY school_type_id) AS totlist ON totlist.school_type_id=schoolnew_manage_cate.id
                LEFT JOIN (
                SELECT 
                	SUM(total_b+total_g+total_t) AS all_total,
                    SUM(teach_tot+nonteach_tot) as all_tot,
                    COUNT(*) AS totschools,
                    SUM((CASE WHEN school_type_id=1 THEN (Prkg_b+Prkg_g+Prkg_t+lkg_b+lkg_g+lkg_t+ukg_b+ukg_g+ukg_t+c1_b+c1_g+c1_t) ELSE 0 END)) AS totalstud
                FROM students_school_child_count 
                WHERE school_type_id IS NOT NULL ".$where.") AS totget  ON totget.all_total IS NOT NULL;";
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
    
    function renewalDashBoardCount($where){
        $SQL="Select id as auth_cat_id,pending,user_type,url from
        (SELECT 99 AS id,COUNT(1) AS pending,'TOTAL APPLICATION' AS user_type FROM schoolnew_renewal
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id) ".$where."
        UNION ALL
        SELECT 98 AS id,COUNT(1) AS pending,'PENDING APPLICATION' AS user_type FROM schoolnew_renewal 
        WHERE vaild_from IS NULL AND timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id) 
        AND school_key_id IN (SELECT school_id FROM students_school_child_count WHERE udise_code IS NOT NULL ".$where.")
        UNION ALL
        SELECT 97 AS id,COUNT(1) AS pending,'APPROVED APPLICATION' AS user_type FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE vaild_from IS NOT NULL AND vaild_from!='0000-00-00' ".$where."
        UNION ALL
        SELECT 96 AS id,COUNT(1) AS pending,'REJECTED APPLICATION' AS user_type FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE vaild_from IS NOT NULL AND vaild_from='0000-00-00' ".$where."
        UNION ALL
        SELECT 95 AS id,COUNT(1) AS pending,'RE-APPLICATION PENDING' AS user_type FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE vaild_from IS NULL AND schoolnew_renewal.id IN (SELECT id FROM schoolnew_renewal WHERE vaild_from='0000-00-00') ".$where."
        UNION ALL
        SELECT 94 AS id,COUNT(1) AS pending,'RE-APPLICATION APPROVED' AS user_type FROM schoolnew_renewal 
        JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
        WHERE vaild_from IS NOT NULL AND schoolnew_renewal.id IN (SELECT id FROM schoolnew_renewal WHERE vaild_from='0000-00-00') AND vaild_from!='0000-00-00' ".$where."
        UNION ALL
        SELECT pending,COUNT(1),user_category.user_type FROM renewal_pending 
        JOIN user_category ON user_category.id=renewal_pending.pending
        WHERE udise_code IS NOT NULL ".$where."
        GROUP BY user_category.user_type 
        UNION ALL 
        SELECT '-1' AS pending,COUNT(1) AS pending,'UNRECOGNISHED' AS usertype FROM renewal_pending 
        WHERE pending IS NULL ".$where.") AS allcount
        LEFT JOIN 
        (SELECT 97 AS auth_cat_id,'Block/getRenewalDash/0/0/1' as url
        UNION ALL
        SELECT 96 AS auth_cat_id,'Block/getRenewalDash/0/0/2' as url
        UNION ALL
        SELECT id,CONCAT('AllApprove/RenewalPendingDashboard/',id) as url FROM user_category) AS geturl ON geturl.auth_cat_id=allcount.id;";
        //echo($SQL);die();
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    function get_districtwise_report($user_type)
    {
        $this->db->order_by('report_lvl','ACSE');
        return $this->db->get_where('report_csv',array('dashboard'=>$user_type,'flag'=>1))->result();
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
    function renewalPendingDashboard($user_type,$where)
    {
        $SQL="SELECT 
	           district_name,edu_dist_name,block_name,udise_code,school_name,cate_type,directorate,DATEDIFF(DATE(NOW()),timestamp) as pending
            FROM renewal_checking WHERE pending=".$user_type." ".$where;
            //echo($SQL);die();
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
    
	
	
}
?>