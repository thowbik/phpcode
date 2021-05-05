CREATE VIEW student_count AS ( SELECT school_id,school_type_id,class_id,strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM (
    SELECT school_id,school_type_id,'1' as class_id,SUM(c1_b+c1_g+c1_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'2' as class_id,SUM(c2_b+c2_g+c2_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'3' as class_id,SUM(c3_b+c3_g+c3_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'4' as class_id,SUM(c4_b+c4_g+c4_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'5' as class_id,SUM(c5_b+c5_g+c5_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'6' as class_id,SUM(c6_b+c6_g+c6_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'7' as class_id,SUM(c7_b+c7_g+c7_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'8' as class_id,SUM(c8_b+c8_g+c8_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'9' as class_id,SUM(c9_b+c9_g+c9_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'10' as class_id,SUM(c10_b+c10_g+c10_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'11' as class_id,SUM(c11_b+c11_g+c11_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id
	UNION ALL
	SELECT school_id,school_type_id,'12' as class_id,SUM(c12_b+c12_g+c12_t) as strength,district_id,district_name,block_id,block_name,edu_dist_id,edu_dist_name,hill_frst,school_name FROM students_school_child_count JOIN schoolnew_academic_detail ON school_key_id=school_id GROUP BY school_id) AS student_count
);

