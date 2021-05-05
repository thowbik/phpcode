SELECT 
	IF(newschool_details.udise_code IS NULL,'NOT ASSIGNED',newschool_details.udise_code) as udise_code,
    school_name,
    address,pincode,email,website,schooltype,
    (SELECT class_studying FROM baseapp_class_studying WHERE id=newschool_details.low_class) AS low_class,
    (SELECT class_studying FROM baseapp_class_studying WHERE id=newschool_details.high_class) AS high_class,
    district_name,block_name,assembly_name,parli_name,edu_dist_name,
    IF(urbanrural=2,'URBAN','RURAL') AS urbanrural,zone_type,village_ward,village_munci,village_id,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=newschool_details.school_stdcode),' - ',newschool_details.school_landline) AS office_landline,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=newschool_details.corr_hm_stdcode),' - ',newschool_details.corr_hm_landline) AS corr_landline,
    newschool_details.mobile AS office_mobile,
    newschool_details.corr_hm_mobile AS corr_mobile,
    newschool_details.email AS sch_email,
    manage_name,schooldirectrate.management,department,
    schoolnew_type.category_name as scl_category,
    schooltype AS school_type,
    TRUNCATE((newschool_detailsland.totland_sq/43560),3) AS land_avail_sqft,
    IF(newschool_detailsland.playgroundfacil=1,TRUNCATE((newschool_detailsland.playground_sq/43560),3),IF(newschool_detailsland.alterarrange=1,CONCAT(newschool_detailsland.alter_address,'<br>Distance:',newschool_detailsland.dist_bg),'N/A')) AS play_area_sqft,
    
    IF(newschool_detailsland.schoolfaci=1,TRUNCATE((newschool_detailsland.expan_sq/43560),3),'N/A') AS play_land_area,
    (CASE WHEN newschool_detailsland.landowner=1 THEN 'RENTED' ELSE
		CASE WHEN newschool_detailsland.landowner=2 THEN 'LEASED' ELSE
			CASE WHEN newschool_detailsland.landowner=3 THEN 'OWNED' ELSE
				CASE WHEN newschool_detailsland.landowner=4 THEN 'RENTAL FREE' END END END END) AS land_ownersip,
	IF(newschool_detailsland.landowner=1,newschool_detailsland.land_amount,'N/A') AS land_rent_amt,
    IF(newschool_detailsland.landowner=2,newschool_detailsland.period_lease,'N/A') AS land_lease_perid,
    IF(newschool_detailsland.landowner=2,DATE_FORMAT(newschool_detailsland.lease_date,"%d/%m/%Y"),'N/A') AS valid_upto,
    
    
    (CASE WHEN newschool_detailsland.wall_type=1 THEN 'PUCCA' ELSE
		CASE WHEN newschool_detailsland.wall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
			CASE WHEN newschool_detailsland.wall_type=3 THEN 'BARBED WIRE FENCING' ELSE
				CASE WHEN newschool_detailsland.wall_type=4 THEN 'HEDGES' ELSE
					CASE WHEN newschool_detailsland.wall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
						CASE WHEN newschool_detailsland.wall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_type,
	IF(newschool_detailsland.wall_type=6,'N/A',newschool_detailsland.peri_bound) as cmpwall_perimtr,
    IF(newschool_detailsland.wall_type=6,'N/A',newschool_detailsland.land_bound) as cmpwall_length,
    
    newschool_detailsland.total_block AS build_block_no,
    newschool_detailsland.class_und_con AS classrm_undr_constr,
	(CASE WHEN newschool_detailsland.desk=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studs,
	(CASE WHEN newschool_detailsland.ramp=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_child,
	(CASE WHEN newschool_detailsland.handrails=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrail,
	IF(newschool_detailsland.staffquater=1,newschool_detailsland.quater_room,'N/A') AS rooms_staffquartrs,
        
        newschool_detailsland.gent_toil_staff as toil_gents_tot,
        newschool_detailsland.ladie_toil_staff as toil_ladies_tot,
        newschool_detailsland.gent_uri_staff as urinal_gents_tot,
        newschool_detailsland.ladie_uri_staff as urinals_tot_ladies,
        
        newschool_detailsland.tot_inuse_boys as toil_bys_inuse,
        newschool_detailsland.tot_notuse_boys as toil_notuse_bys,
        (CASE WHEN newschool_detailsland.reason_notuse_boys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.reason_notuse_boys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.reason_notuse_boys=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.reason_notuse_boys=4 THEN 'N/A' END END END END) AS toil_nonfunc_bys,
        newschool_detailsland.tot_inuse_girls as toil_inuse_grls,
        newschool_detailsland.tot_notuse_girls as toil_notuse_grls,
        (CASE WHEN newschool_detailsland.reason_notuse_girls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.reason_notuse_girls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.reason_notuse_girls=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.reason_notuse_girls=4 THEN 'N/A' END END END END) AS toil_reasn_grls,
                    
		newschool_detailsland.cswn_inuse_boys as cwsntoil_inuse_bys,
        newschool_detailsland.cswn_notuse_boys as cwsntoil_notuse_bys,
        (CASE WHEN newschool_detailsland.cwsn_reasonnotuse_boys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.cwsn_reasonnotuse_boys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.cwsn_reasonnotuse_boys=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.cwsn_reasonnotuse_boys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_bys,
        newschool_detailsland.cwsn_inuse_girls as cwsntoil_inuse_grls,
        newschool_detailsland.cwsn_notuse_girls as cwsntoil_notuse_grls,
        (CASE WHEN newschool_detailsland.cwsn_reasonnotuse_girls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.cwsn_reasonnotuse_girls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.cwsn_reasonnotuse_girls=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.cwsn_reasonnotuse_girls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grls,
        newschool_detailsland.urinals_inuse_boys as urinls_inuse_bys,
        newschool_detailsland.urinals_notuse_boys as urinls_notuse_bys,
        (CASE WHEN newschool_detailsland.urinal_reasonnotuse_boys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.urinal_reasonnotuse_boys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.urinal_reasonnotuse_boys=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.urinal_reasonnotuse_boys=4 THEN 'N/A' END END END END) AS urinls_reasn_bys,
        newschool_detailsland.urinals_inuse_girls as urinls_inuse_grls,
        newschool_detailsland.urinals_notuse_girls as urinls_notuse_grls,
        (CASE WHEN newschool_detailsland.urinal_reasonnotuse_girls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN newschool_detailsland.urinal_reasonnotuse_girls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN newschool_detailsland.urinal_reasonnotuse_girls=3 THEN 'DAMAGED' ELSE
					CASE WHEN newschool_detailsland.urinal_reasonnotuse_girls=4 THEN 'N/A' END END END END) AS urinls_reasn_grls,
		newschool_detailsland.toi_flush_boys as toil_waterfac_bys,
        newschool_detailsland.toi_flush_girls as toil_waterfac_grls,
        newschool_detailsland.urinal_faci_boys as urinls_waterfac_bys,
        newschool_detailsland.urinal_faci_girls as urinls_waterfac_grls,
        (CASE WHEN newschool_detailsland.sanitory=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrks,
        IF(newschool_detailsland.additional_toilet=1,newschool_detailsland.additional_sqft,'NO') AS toil_land_avail,
        IF(newschool_detailsland.napkin=1,newschool_detailsland.napkin_func,'N/A') AS napkin_avail_no,
        IF(newschool_detailsland.napkin=1,newschool_detailsland.napkin_nonfunc,'N/A') AS napkin_func_no,
        IF(newschool_detailsland.incen=1,newschool_detailsland.nonfunc_choolas,'N/A') AS inci_auto_avail_no,
        IF(newschool_detailsland.incen=1,newschool_detailsland.func_auto,'N/A') AS inci_auto_func_no,
        IF(newschool_detailsland.incen=1,newschool_detailsland.nonfunc_choolas,'N/A') AS inci_man_avail_no,
        IF(newschool_detailsland.incen=1,newschool_detailsland.func_choolas,'N/A') AS inci_man_func_no,
        newschool_detailsland.tot_tap_avail as tot_handwash_bys,
        newschool_detailsland.tot_tap_func as tot_handwash_grls,
        IF(newschool_detailsland.drinkingwater=1,
        (CASE WHEN newschool_detailsland.drink_water=1 THEN 'HAND PUMPS' ELSE
			CASE WHEN newschool_detailsland.drink_water=2 THEN 'WELL' ELSE
				CASE WHEN newschool_detailsland.drink_water=3 THEN 'TAP WATER' ELSE
					CASE WHEN newschool_detailsland.drink_water=4 THEN 'RO PURIFIER' ELSE
						CASE WHEN newschool_detailsland.drink_water=5 THEN 'PACKAGED/BOTTELED' ELSE
							CASE WHEN newschool_detailsland.drink_water=-1 THEN CONCAT('OTHERS - ',newschool_detailsland.other_drinkwater) END END END END END END),'NO') AS drnkwater_avail,
		IF(newschool_detailsland.drink_water=2,(CASE WHEN newschool_detailsland.wellclose=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_top,
        IF(newschool_detailsland.schooltank=1,'YES','NO') AS overheadtank_avail,
        IF(newschool_detailsland.waterpurifier=1,'YES','NO') AS waterpuri_avail,
        IF(newschool_detailsland.rainwater=1,'YES','NO') AS schl_rainwtr_hrv,
        
        endow_amt,
        (SELECT bank FROM schoolnew_bank WHERE schoolnew_bank.id = endow_bank_id) AS endow_bank_id,
        DATE_FORMAT(endow_date_deposit, '%d/%m/%Y') AS endow_date_deposit,
        DATE_FORMAT(endow_date_maturity, '%d/%m/%Y') AS endow_date_maturity,
        endow_certif,
        corp_amt,
        (SELECT bank FROM schoolnew_bank WHERE schoolnew_bank.id = corp_bank_id) AS corp_bank_id,
        DATE_FORMAT(corp_date_deposit, '%d/%m/%Y') AS corp_date_deposit,
        corp_accno,
        trust_name,
        trust_address,trust_pincode,trust,
        IF(schoolnew_fund.trust=1,DATE_FORMAT(trustdate, '%d/%m/%Y'),'N/A') AS trustdate,
        IF(schoolnew_fund.trust=1,trustplacereg,'N/A') as trustplace,
        newschool_trustentry.id as instid,
        newschool_trustentry.trustname as institutionname,
        newschool_trustentry.trustplace as institutionplace,
        amount,challan_no,challan_date,ifsc_code,challan_filename,
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
		schoolnew_library_entry.num_books,newschool_documententry.id as docid,docno,surveyno,placereg,DATE_FORMAT(datereg, '%d/%m/%Y') AS datereg,
        
        renewal.certificate_filename,renewal.certificate_filepath,renewal.certificatename,
        renewal.certificate_id as certid,renewal.fileid,renewal.challan_filepath as challanfp

    
    
FROM newschool_details
JOIN (SELECT category_name,
(CASE WHEN id=1 THEN 15 ELSE
  CASE WHEN id=2 THEN 15 ELSE
	CASE WHEN id=3 THEN 15 END END END) AS low_class,
(CASE WHEN id=1 THEN 13 ELSE
  CASE WHEN id=2 THEN 5 ELSE
	CASE WHEN id=3 THEN 8 END END END) AS high_class
from schoolnew_type WHERE schoolnew_type.id IN (1,2,3)) as schoolnew_type ON schoolnew_type.high_class=newschool_details.high_class
JOIN (SELECT  
		schoolnew_zone_type.zone_type,
		schoolnew_habitation_all.name as village_ward,
		schoolnew_localbody_all.name as village_munci,
		schoolnew_habitation_all.id as village_id
	FROM schoolnew_localbody_all
	JOIN schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
	JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
) AS localbodyall ON village_id=newschool_details.vill_habitation_id
JOIN (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
		JOIN schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
		JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
) AS schooldirectrate ON schooldirectrate.directid=newschool_details.sch_directorate_id 
JOIN schoolnew_parliament ON schoolnew_parliament.id=newschool_details.parliament_id
JOIN schoolnew_assembly ON schoolnew_assembly.id=newschool_details.assembly_id
JOIN (SELECT 
			schoolnew_district.id as district_id,
			schoolnew_district.district_name,
			schoolnew_edn_dist_mas.id as edu_dist_id,
			schoolnew_edn_dist_mas.edn_dist_name as edu_dist_name,
			schoolnew_block.id as block_id,
			schoolnew_block.block_name
		FROM
			schoolnew_district
		JOIN schoolnew_edn_dist_mas ON schoolnew_edn_dist_mas.district_id=schoolnew_district.id
		JOIN schoolnew_edn_dist_block ON schoolnew_edn_dist_block.edn_dist_id=schoolnew_edn_dist_mas.id AND schoolnew_edn_dist_block.district_code=schoolnew_district.id
		JOIN schoolnew_block ON schoolnew_block.district_id=schoolnew_district.id AND schoolnew_edn_dist_block.block_id
		GROUP BY district_id,district_name,edu_dist_id,edu_dist_name,block_id,block_name
) AS locationentry ON locationentry.district_id=newschool_details.district_id AND locationentry.edu_dist_id=newschool_details.edu_dist_id AND locationentry.block_id=newschool_details.block_id
JOIN newschool_detailsland ON newschool_detailsland.temp_id=newschool_details.temp_id
JOIN schoolnew_fund ON schoolnew_fund.school_key_id=newschool_details.temp_id
JOIN schoolnew_natureofconst_entry ON schoolnew_natureofconst_entry.school_key_id=newschool_details.temp_id
LEFT JOIN (SELECT schoolnew_classroomlevel_entry.id as clsetry_id,school_key_id,category_name,num_rooms FROM schoolnew_classroomlevel_entry 
		JOIN schoolnew_type ON schoolnew_type.id=schoolnew_classroomlevel_entry.school_type
) AS clsentry  ON clsentry.school_key_id=newschool_details.temp_id
JOIN schoolnew_library_entry ON schoolnew_library_entry.school_key_id=newschool_details.temp_id
JOIN newschool_documententry ON newschool_documententry.temp_id=newschool_details.temp_id
JOIN newschool_trustentry ON newschool_trustentry.temp_id=newschool_details.temp_id
JOIN (SELECT school_key_id,certificate_filename,certificate_filepath,certificate_id,schoolnew_renewalfiles.id as fileid,challan_filepath,
challan_filename,ifsc_code,challan_date,challan_no,amount,schoolnew_renewalcertificate_master.certificatename,
schoolnew_renewalfiles.id as ctid,schoolnew_renewalcertificate_master.id as certid FROM schoolnew_renewal
JOIN schoolnew_renewcategory ON schoolnew_renewcategory.renewal_id=schoolnew_renewal.id
JOIN schoolnew_renewalfiles ON schoolnew_renewalfiles.renewal_id=schoolnew_renewal.id
JOIN schoolnew_renewalcertificate_master ON schoolnew_renewalcertificate_master.id =schoolnew_renewalfiles.certificate_id) AS renewal ON renewal.school_key_id=newschool_details.temp_id
WHERE newschool_details.temp_id=3531;