SELECT pending,user_type,auth_cat_id FROM(SELECT SUM(pending) as pending,auth_cat_id FROM (SELECT 
	SUM(CASE WHEN students_school_child_count.sch_directorate_id=schoolnew_moduleauth.school_type THEN 
			CASE WHEN schoolnew_moduleauth.auth_cat_id NOT IN (SELECT auth FROM schoolnew_renewapprove WHERE renewal_id=schoolnew_renewal.id)
		THEN 1 ELSE 0 END END) AS pending,schoolnew_moduleauth.auth_cat_id
FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
JOIN schoolnew_moduleauth ON schoolnew_moduleauth.school_type=students_school_child_count.sch_directorate_id AND module_id=1
WHERE school_id IS NOT NULL AND schoolnew_renewal.vaild_from IS NULL
group by auth_cat_id
UNION ALL
SELECT 
	SUM(CASE WHEN students_school_child_count.sch_directorate_id=schoolnew_moduleauth.school_type THEN 
			CASE WHEN schoolnew_moduleauth.auth_cat_id IN (SELECT auth FROM schoolnew_renewapprove WHERE renewal_id=schoolnew_renewal.id) AND schoolnew_moduleauth.final_cat_id NOT IN (SELECT auth FROM schoolnew_renewapprove WHERE renewal_id=schoolnew_renewal.id)
		THEN 1 ELSE 0 END END) AS pending,schoolnew_moduleauth.final_cat_id
FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
JOIN schoolnew_moduleauth ON schoolnew_moduleauth.school_type=students_school_child_count.sch_directorate_id AND module_id=1
WHERE school_id IS NOT NULL AND schoolnew_renewal.vaild_from IS NULL
group by final_cat_id
UNION ALL
SELECT COUNT(*) AS total,99 as user_type FROM schoolnew_renewal
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE school_id IS NOT NULL
UNION ALL
SELECT COUNT(*) AS rejected,98 as user_type FROM schoolnew_renewal 
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE vaild_from='0000-00-00' AND school_id IS NOT NULL
UNION ALL
SELECT COUNT(*) AS approved,97 as user_type FROM schoolnew_renewal 
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
WHERE vaild_from!='0000-00-00' AND school_id IS NOT NULL ) AS allpend
GROUP BY auth_cat_id) AS auth_cat 
JOIN (
SELECT id,user_type FROM(SELECT id,user_type FROM user_category
UNION ALL
SELECT 99 as id,'TOTAL APPLICATION' as user_type FROM user_category
UNION ALL
SELECT 98 as id,'REJECTED APPLICATION' as user_type FROM user_category
UNION ALL
SELECT 97 as id,'APPROVED APPLICATION' as user_type FROM user_category) AS user_cat GROUP BY id) AS user_cat ON user_cat.id=auth_cat.auth_cat_id
ORDER BY auth_cat_id DESC;