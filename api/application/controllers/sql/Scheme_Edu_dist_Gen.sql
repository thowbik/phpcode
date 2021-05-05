SELECT 
	freescheme.fscheme_id,
    freescheme.scheme_name,
    SUM(CASE WHEN student_count.class_id BETWEEN appli_lowclass AND appli_highclass THEN 1 ELSE 0 END) AS scheme_count,
    school_id,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,school_name
FROM student_count
JOIN (SELECT 
	schoolnew_freescheme.id as fscheme_id,
	schoolnew_freescheme.scheme_name,
    MIN(schoolnew_schemeapplicable.appli_lowclass) as appli_lowclass,
    MAX(schoolnew_schemeapplicable.appli_highclass) as appli_highclass,
    schoolnew_freescheme.hill_restrict
FROM schoolnew_freescheme
JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
WHERE schoolnew_freescheme.visibility>-2 AND schoolnew_freescheme.visibility!=2
GROUP BY fscheme_id) AS freescheme ON student_count.class_id BETWEEN freescheme.appli_lowclass AND freescheme.appli_highclass
AND (hill_restrict=hill_frst OR hill_restrict=0)
JOIN baseapp_class_studying ON baseapp_class_studying.id=student_count.class_id
WHERE student_count.school_type_id IN (1,2) AND district_id=29
GROUP BY fscheme_id,edu_dist_id;