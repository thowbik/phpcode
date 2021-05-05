SELECT 
	schoolnew_natureofconst_entry.id as constr_id,
    (CASE WHEN schoolnew_natureofconst_entry.construct_type=1 THEN 'PUCCA' ELSE
		CASE WHEN schoolnew_natureofconst_entry.construct_type=2 THEN 'PARTIALLY PUCCA' ELSE
			CASE WHEN schoolnew_natureofconst_entry.construct_type=3 THEN 'KUTCHA' ELSE
				CASE WHEN schoolnew_natureofconst_entry.construct_type=4 THEN 'DEPLICATED BUILDING' ELSE
					CASE WHEN schoolnew_natureofconst_entry.construct_type=5 THEN 'BUILDING UNDER CONSTRUCTION' END END END END END) AS construct_type,
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
        clsentry.category_name,
        clsentry.num_rooms,
        
        (CASE WHEN schoolnew_library_entry.library_type=1 THEN 'LIBRARY' ELSE
			CASE WHEN schoolnew_library_entry.library_type=2 THEN 'BOOK BANK' ELSE
				CASE WHEN schoolnew_library_entry.library_type=3 THEN 'READING CORNER' ELSE
					CASE WHEN schoolnew_library_entry.library_type=4 THEN 'NEWSPAPER MAGAZINES' ELSE
						CASE WHEN schoolnew_library_entry.library_type=5 THEN 'NONE' END END END END END) AS library_type,
		schoolnew_library_entry.num_books,
        
        
        schoolnew_inspection_entry.id as inspectid,
    (CASE WHEN schoolnew_inspection_entry.officer_type=0 THEN 'N/A' ELSE
		CASE WHEN schoolnew_inspection_entry.officer_type=1 THEN 'CEO' ELSE
			CASE WHEN schoolnew_inspection_entry.officer_type=2 THEN 'DEO' ELSE
				CASE WHEN schoolnew_inspection_entry.officer_type=3 THEN 'BEO' ELSE
					CASE WHEN schoolnew_inspection_entry.officer_type=4 THEN 'DDRO' ELSE
						CASE WHEN schoolnew_inspection_entry.officer_type=5 THEN 'EDU. OFFICER (CORP.)' ELSE
							CASE WHEN schoolnew_inspection_entry.officer_type=6 THEN 'ASST. EDU. OFFICER (CORP.)' END END END END END END END) AS officer_type,
     (CASE WHEN schoolnew_inspection_entry.purpose=1 THEN 'AUDIT' ELSE
		CASE WHEN schoolnew_inspection_entry.purpose=2 THEN 'ACADEMIC' ELSE
			CASE WHEN schoolnew_inspection_entry.purpose=3 THEN 'NON-ACADEMIC' END END END) AS purpose,
	DATE_FORMAT(schoolnew_inspection_entry.date_inspect,"%d/%m/%Y") as date_inspect
    
FROM schoolnew_basicinfo
JOIN schoolnew_inspection_entry ON schoolnew_inspection_entry.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_natureofconst_entry ON schoolnew_natureofconst_entry.school_key_id=schoolnew_basicinfo.school_id
JOIN (SELECT schoolnew_classroomlevel_entry.id as clsetry_id,school_key_id,category_name,num_rooms FROM schoolnew_classroomlevel_entry 
		JOIN schoolnew_type ON schoolnew_type.id=schoolnew_classroomlevel_entry.school_type
) AS clsentry  ON clsentry.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_library_entry ON schoolnew_library_entry.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=3531;