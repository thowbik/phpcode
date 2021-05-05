CREATE VIEW `newschool_pending` AS (SELECT 
	DISTINCT renewal.id AS renewal_id, 
	renewal.school_name,
    renewal.school_key_id,
    renewal.udise_code,
    renewal.district_id,renewal.block_id,
    renewal.edu_dist_id,
    renewal.district_name,
    renewal.block_name,
    renewal.edu_dist_name,
    renewal.timestamp,
    (SELECT department FROM schoolnew_school_department WHERE id=renewal.sch_directorate_id) AS directorate,
    auth,renewal.sch_directorate_id,management,cate_type, 
    (CASE WHEN auth IS NULL THEN (SELECT auth_cat_id FROM schoolnew_moduleauth WHERE module_id=4 AND school_type=renewal.sch_directorate_id LIMIT 1) ELSE
		(SELECT auth_cat_id FROM 
			(SELECT auth_cat_id,school_type FROM schoolnew_moduleauth WHERE module_id=4
				UNION ALL
			SELECT final_cat_id,school_type FROM schoolnew_moduleauth WHERE module_id=4) as subauth 
            WHERE auth_cat_id!=IF(auth<0,-(auth),auth) AND school_type=renewal.sch_directorate_id LIMIT 1
        ) 
	END) AS pending
FROM (
SELECT schoolnew_renewal.id,schoolnew_renewal.school_key_id,udise_code,sch_directorate_id,school_name,
newschool_profile.district_id,newschool_profile.block_id,newschool_profile.edu_dist_id,district_name,block_name,edu_dist_name,
schoolnew_renewal.timestamp,(SELECT management FROM schoolnew_management WHERE id=newschool_profile.sch_management_id) AS 
management,
(SELECT category_name FROM schoolnew_type WHERE id=scl_category)cate_type 
FROM schoolnew_renewal 
JOIN newschool_profile ON newschool_profile.school_id=schoolnew_renewal.school_key_id
JOIN (SELECT schoolnew_district.id as district_id,district_name,schoolnew_block.id as block_id,block_name,
schoolnew_edn_dist_mas.id as edu_dist_id,edn_dist_name AS edu_dist_name FROM schoolnew_district
JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
JOIN schoolnew_block ON schoolnew_block.edu_dist_id=schoolnew_edn_dist_mas.id) AS locmap ON locmap.district_id=newschool_profile.district_id 
AND locmap.block_id=newschool_profile.block_id AND locmap.edu_dist_id=newschool_profile.edu_dist_id
WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id) AND
vaild_from IS NULL) AS renewal
LEFT JOIN (SELECT * FROM schoolnew_renewapprove WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewapprove GROUP BY renewal_id)
AND renewal_id IN (SELECT id FROM schoolnew_renewal WHERE timestamp IN (SELECT MAX(timestamp) FROM schoolnew_renewal GROUP BY school_key_id) AND vaild_from IS NULL)) AS renew_approve ON
renew_approve.renewal_id=renewal.id);