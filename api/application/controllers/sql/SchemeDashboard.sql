SELECT 
	IFNULL(indcount,stdcount) as indcount,
	scheme_id,class_studying_id,class_studying,visibility,low_class,high_class,checkbit
FROM(SELECT 
	SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN schoolnew_schemeindent.scheme_id=freescheme.scheme_id THEN 1 ELSE NULL END END) as indcount,
	COUNT(DISTINCT students_child_detail.id) as stdcount,
    freescheme.scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility,low_class,high_class,
    (CASE WHEN schoolnew_schemeindent.scheme_id IS NOT NULL THEN 1 ELSE 0 END) as checkbit
FROM students_child_detail
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
LEFT JOIN (SELECT   
	schoolnew_schemeapplicable.scheme_id,
    MIN(schoolnew_schemeapplicable.appli_lowclass) as low_class,
    MAX(schoolnew_schemeapplicable.appli_highclass) as high_class,
    appli_count,visibility,hill_restrict,school_key_id
FROM schoolnew_freescheme
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.hill_frst=hill_restrict OR hill_restrict=0
LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
WHERE school_key_id=3531
GROUP BY scheme_id,school_key_id) AS freescheme ON freescheme.school_key_id=students_child_detail.school_id
WHERE students_child_detail.school_id=3531 AND class_studying_id<=12 AND transfer_flag=0
AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
GROUP BY freescheme.scheme_id,class_studying_id 
ORDER BY class_studying_id ASC,visibility DESC) AS der;



SELECT 
	SUM(CASE WHEN schoolnew_schemeindent.student_id=students_child_detail.id THEN 
			CASE WHEN schoolnew_schemeindent.scheme_id=freescheme.scheme_id THEN 1 ELSE NULL END END) as indcount,
    freescheme.scheme_id,class_studying_id,baseapp_class_studying.class_studying,visibility,low_class,high_class,
    (CASE WHEN freescheme.scheme_id=schoolnew_schemeindent.scheme_id THEN 1 ELSE 0 END) as checkbit,
    COUNT(DISTINCT students_child_detail.id) as stdcount
FROM students_child_detail
LEFT JOIN schoolnew_schemeindent ON schoolnew_schemeindent.student_id=students_child_detail.id
LEFT JOIN baseapp_class_studying ON baseapp_class_studying.id=class_studying_id
LEFT JOIN (SELECT   
	schoolnew_schemeapplicable.scheme_id,
    MIN(schoolnew_schemeapplicable.appli_lowclass) as low_class,
    MAX(schoolnew_schemeapplicable.appli_highclass) as high_class,
    appli_count,visibility,hill_restrict,school_key_id
FROM schoolnew_freescheme
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.hill_frst=hill_restrict OR hill_restrict=0
LEFT JOIN schoolnew_schemeapplicable ON schoolnew_schemeapplicable.scheme_id=schoolnew_freescheme.id
WHERE school_key_id=3531
GROUP BY scheme_id,school_key_id) AS freescheme ON freescheme.school_key_id=students_child_detail.school_id
WHERE students_child_detail.school_id=3531 AND class_studying_id<=12 AND transfer_flag=0
AND (student_admitted_section='Aided' OR student_admitted_section IS NULL)
GROUP BY freescheme.scheme_id,class_studying_id 
ORDER BY class_studying_id ASC,visibility DESC;


