SELECT 
	COUNT(DISTINCT schoolnew_renewal.id) as cnt,user_type
FROM schoolnew_renewal
JOIN schoolnew_renewapprove ON schoolnew_renewapprove.renewal_id=schoolnew_renewal.id
JOIN students_school_child_count ON students_school_child_count.school_id=schoolnew_renewal.school_key_id
JOIN (SELECT auth,user_type FROM (SELECT auth FROM(SELECT module_id,school_type,CAST(auth_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth
UNION ALL
SELECT module_id,school_type,CAST(final_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth 
UNION ALL
SELECT module_id,school_type,-1*CAST(final_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth ) AS authn) AS authend
JOIN (SELECT CAST(id AS SIGNED) as id,user_type FROM user_category
UNION ALL
SELECT -1*CAST(id AS SIGNED) as id,user_type FROM user_category) as user_category ON user_category.id=auth) AS user_category ON user_category.auth=schoolnew_renewapprove.auth
GROUP BY user_type;



SELECT auth,user_type FROM (SELECT auth FROM(SELECT module_id,school_type,CAST(auth_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth
UNION ALL
SELECT module_id,school_type,CAST(final_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth 
UNION ALL
SELECT module_id,school_type,-1*CAST(final_cat_id AS SIGNED) as auth FROM schoolnew_moduleauth ) AS authn) AS authend
JOIN (SELECT CAST(id AS SIGNED) as id,user_type FROM user_category
UNION ALL
SELECT -1*CAST(id AS SIGNED) as id,user_type FROM user_category) as user_category ON user_category.id=auth;

