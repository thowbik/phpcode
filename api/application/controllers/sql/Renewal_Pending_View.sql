CREATE VIEW `renewal_checking` AS (
SELECT renewal_id,academic_yr,
school_key_id,udise_code,school_name,district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name,
beo_map,directorate,auth,sch_directorate_id,vaild_from,vaild_upto,fromclass,toclass,createddate,applied_category,pending,pending_days,
pending_with,
IF(pending_with IS NULL AND pending=6,'BEO NOT MAPPED',pending_with) AS pending_desc FROM
(SELECT renewal_id,
(CASE WHEN MONTH(createddate)>4 THEN (CONCAT(DATE_FORMAT(createddate,"%Y"),'-',DATE_FORMAT(createddate,"%y")+1)) ELSE
(CONCAT(DATE_FORMAT(createddate,"%Y")-1,'-',DATE_FORMAT(createddate,"%y"))) END
) AS academic_yr,
school_key_id,udise_code,school_name,district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name,
beo_map,directorate,auth,sch_directorate_id,vaild_from,vaild_upto,fromclass,toclass,createddate,applied_category,pending,
DATEDIFF(DATE(NOW()),DATE(createddate)) AS pending_days, 
IF(pending IS NOT NULL AND (pending!='APPROVED' AND pending!='REJECTED'),(SELECT CONCAT(UPPER(user_category.user_type),' : ',emis_username," / ",ref) FROM 
emis_userlogin 
JOIN user_category ON user_category.id=emis_userlogin.emis_usertype
WHERE emis_user_id=IF(pending IN (9,12,13),district_id,IF(pending IN (6),block_id,IF(pending IN (10),edu_dist_id,0))) AND emis_usertype=pending AND IF(pending IN (6),emis_usertype1=beo_map,emis_usertype1 IS NOT NULL) AND status='Active' LIMIT 1),IF(pending='REJECTED','REJECTED',IF(pending='APPROVED','APPROVED',directorate))) AS pending_with
FROM 
(SELECT 
	DISTINCT renewal.id AS renewal_id,renewal.school_key_id, 
	renewal.school_name,renewal.udise_code,renewal.district_id,renewal.block_id,renewal.edu_dist_id,
    renewal.district_name,renewal.block_name,renewal.edu_dist_name,renewal.beo_map,
    (SELECT department FROM schoolnew_school_department WHERE id=renewal.sch_directorate_id) AS directorate,
    auth,renewal.sch_directorate_id,vaild_from,vaild_upto,fromclass,toclass,createddate,renewal.applied_category,
    (CASE WHEN auth IS NULL THEN (SELECT auth_cat_id FROM schoolnew_moduleauth WHERE module_id=renewal.applied_category AND school_type=renewal.sch_directorate_id LIMIT 1) ELSE
		CASE WHEN auth=(SELECT final_cat_id FROM schoolnew_moduleauth WHERE module_id=renewal.applied_category AND school_type=renewal.sch_directorate_id LIMIT 1) THEN 'APPROVED' ELSE
        CASE WHEN (auth=-1 OR vaild_from='0000-00-00' OR vaild_upto='0000-00-00') THEN 'REJECTED' ELSE
		(SELECT auth_cat_id FROM 
			(SELECT auth_cat_id,school_type,module_id FROM schoolnew_moduleauth
				UNION ALL
			SELECT final_cat_id,school_type,module_id FROM schoolnew_moduleauth) as subauth 
            WHERE auth_cat_id!=IF(auth<0,-(auth),auth) AND school_type=renewal.sch_directorate_id AND module_id=renewal.applied_category LIMIT 1
        ) 
	END END END) AS pending
FROM (SELECT schoolnew_renewal.id,school_name,schoolnew_renewal.school_key_id,udise_code,district_id,block_id,edu_dist_id,district_name,
block_name,edu_dist_name,schoolnew_renewal.timestamp,sch_directorate_id,management,cate_type,vaild_from,vaild_upto,fromclass,toclass,createddate,applied_category, 
(SELECT beo_map FROM schoolnew_basicinfo WHERE schoolnew_basicinfo.school_id=school_key_id) AS beo_map
FROM schoolnew_renewal 
JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category<>4
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE schoolnew_renewal.timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id)
UNION ALL
SELECT schoolnew_renewal.id,school_name,schoolnew_renewal.school_key_id,udise_code,district_id,block_id,edu_dist_id,district_name,
block_name,edn_dist_name,schoolnew_renewal.timestamp,sch_directorate_id,management,cate_type,vaild_from,vaild_upto,fromclass,toclass,createddate,applied_category, 
(SELECT beo_map FROM schoolnew_basicinfo WHERE schoolnew_basicinfo.school_id=schoolnew_renewal.school_key_id) AS beo_map
FROM schoolnew_renewal 
JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id AND schoolnew_renewcategory.applied_category=4
JOIN newschool_profile ON newschool_profile.school_id=schoolnew_renewal.school_key_id
WHERE schoolnew_renewal.timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id)
) AS renewal
LEFT JOIN (SELECT * FROM schoolnew_renewapprove WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewapprove GROUP BY renewal_id)) AS renew_approve ON
renew_approve.renewal_id=renewal.id) AS pending_derived) AS pending_final);