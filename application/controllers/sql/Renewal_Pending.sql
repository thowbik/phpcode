SELECT 
	district_id as dist_id,
	district_name, 
	edu_dist_id as edudistrict_id, 
	edu_dist_name, 
	block_id as blk_id, 
	block_name, 
	school_id as school_id, 
	school_name, 
	udise_code,
	schoolnew_renewal.id as renewal_id,
	count(*) as catcount,
	DATEDIFF(CURDATE(),DATE_FORMAT(schoolnew_renewal.timestamp,"%Y-%m-%d")) as pending
FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE vaild_from IS NULL AND schoolnew_renewal.id NOT IN (select renewal_id FROM schoolnew_renewapprove WHERE auth=10 GROUP BY renewal_id)
GROUP BY block_id;


SELECT * FROM emis_userlogin WHERE emis_username like "deo%" and emis_user_id=60; 

select * from schoolnew_edn_dist_mas where district_id=6;