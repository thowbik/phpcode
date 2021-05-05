SELECT DISTINCTROW
	trade,clubs,(SELECT category_name FROM schoolnew_type WHERE id=schoolnew_dayswork_entry.school_type) AS daywork_school_type,
    schoolnew_dayswork_entry.instr_dys,
    CONCAT(schoolnew_dayswork_entry.hrs_chldrn_sty_schl,':',IF((LENGTH(schoolnew_dayswork_entry.mns_chldrn_sty_schl)<2),CONCAT(schoolnew_dayswork_entry.mns_chldrn_sty_schl,0),schoolnew_dayswork_entry.mns_chldrn_sty_schl)) AS stud_hrs,
    CONCAT(schoolnew_dayswork_entry.hrs_tchrs_sty_schl,':',IF((LENGTH(schoolnew_dayswork_entry.mns_tchrs_sty_schl)<2),CONCAT(schoolnew_dayswork_entry.mns_tchrs_sty_schl,0),schoolnew_dayswork_entry.mns_tchrs_sty_schl)) AS teach_hrs,
    (CASE WHEN schoolnew_dayswork_entry.cce_impl=1 THEN 'YES' ELSE 'NO' END) AS cce_impl,
    (CASE WHEN schoolnew_dayswork_entry.cce_cum=1 THEN 'YES' ELSE 'NO' END) AS cce_cum,
    (CASE WHEN schoolnew_dayswork_entry.cce_shared=1 THEN 'YES' ELSE 'NO' END) AS cce_shared
FROM schoolnew_dayswork_entry
JOIN (SELECT clubs,school_key_id FROM schoolnew_extracc_entry
			JOIN schoolnew_club ON schoolnew_club.id=schoolnew_extracc_entry.extra_cc) AS clubsetr ON clubsetr.school_key_id=schoolnew_dayswork_entry.school_key_id
LEFT JOIN (SELECT IF(prevoc_course=1,trade,'NO') AS trade,schoolnew_voctrade_entry.school_key_id FROM schoolnew_voctrade_entry
			JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_voctrade_entry.school_key_id AND schoolnew_academic_detail.prevoc_course=1
			JOIN schoolnew_trade on schoolnew_trade.id=schoolnew_voctrade_entry.voc_trade) as voctrade ON voctrade.school_key_id=schoolnew_dayswork_entry.school_key_id
WHERE schoolnew_dayswork_entry.school_key_id=3531;