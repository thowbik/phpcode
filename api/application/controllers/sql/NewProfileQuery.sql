SELECT DISTINCTROW	
	schoolnew_basicinfo.udise_code,
	schoolnew_basicinfo.school_name,
    schoolnew_basicinfo.address,
	locationentry.district_name,
    locationentry.edu_dist_name,
    locationentry.block_name,
    schoolnew_basicinfo.pincode,schoolnew_basicinfo.latitude,schoolnew_basicinfo.longitude,
    (CASE WHEN schoolnew_basicinfo.urbanrural=2 THEN 'URBAN' ELSE
		CASE WHEN schoolnew_basicinfo.urbanrural=1 THEN 'RURAL' END END) AS urbanrural,
	zone_type,village_ward,village_munci,schoolnew_assembly.assembly_name,schoolnew_parliament.parli_name,
    manage_name,schooldirectrate.management,department,
    schoolnew_basicinfo.office_mobile,
    schoolnew_basicinfo.corr_mobile,
    schoolnew_basicinfo.sch_email,
    schoolnew_basicinfo.website,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.office_std_code),' - ',schoolnew_basicinfo.office_landline) AS office_landline,
    CONCAT((SELECT std_code FROM schoolnew_stdcode_mas WHERE id=schoolnew_basicinfo.corr_std_code),' - ',schoolnew_basicinfo.corr_landlline) AS corr_landline,
    schoolnew_academic_detail.yr_estd_schl,
    (CASE WHEN schoolnew_academic_detail.shftd_schl=1 THEN 'YES' ELSE 'NO' END) AS shftd_schl,
    (CASE WHEN schoolnew_academic_detail.hill_frst=1 THEN 'In Forest/Hill area' ELSE
		CASE WHEN schoolnew_academic_detail.hill_frst=2 THEN 'Near Forest/Hill area' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=3 THEN 'Near the High ways' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=4 THEN 'Near Coastal Area' ELSE
        CASE WHEN schoolnew_academic_detail.hill_frst=0 THEN 'Not Applicable' ELSE '(NO DATA FOUND)' END END END END END
	) AS hill_frst,(CASE WHEN RESITYPE_DESC IS NULL THEN 'NO' ELSE RESITYPE_DESC END) as typ_resid_schl,
    (CASE WHEN schoolnew_academic_detail.cwsn_scl=1 THEN 'YES' ELSE 'NO' END) AS cwsn_scl,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_elem IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_elem END) AS yr_rec_schl_elem,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_sec IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_sec END) AS yr_rec_schl_sec,
    (CASE WHEN schoolnew_academic_detail.yr_rec_schl_hsc IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_rec_schl_hsc END) AS yr_rec_schl_hsc,
    (CASE WHEN schoolnew_academic_detail.yr_recgn_first IS NULL OR schoolnew_academic_detail.yr_recgn_first=0  THEN 'N/A' ELSE schoolnew_academic_detail.yr_recgn_first END) AS yr_recgn_first,
    (CASE WHEN schoolnew_academic_detail.yr_last_renwl IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.yr_last_renwl END) AS yr_last_renwl,
    (CASE WHEN schoolnew_academic_detail.certifi_no IS NULL THEN 'N/A' ELSE schoolnew_academic_detail.certifi_no END) AS certifi_no,
    schoolnew_type.category_name as scl_category,schoolnew_academic_detail.school_type,
    MONTHNAME('2008-12-01' + INTERVAL schoolnew_academic_detail.acad_mnth_start MONTH) AS acad_mnth_start,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.low_class) as low_class,
    (SELECT class_studying FROM baseapp_class_studying WHERE baseapp_class_studying.id=schoolnew_academic_detail.high_class) as high_class,
    (CASE WHEN (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) IS NULL THEN 'NO'
		ELSE CASE WHEN schoolnew_academic_detail.minority_grp=13 THEN CONCAT((SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp),' - ',schoolnew_academic_detail.minority_other) ELSE 
        (SELECT minority FROM schoolnew_minority WHERE schoolnew_minority.id=schoolnew_academic_detail.minority_grp) END END) AS minority_grp,
	(CASE WHEN schoolnew_academic_detail.minority_sch=1 THEN schoolnew_academic_detail.minority_yr ELSE 'NO' END) AS minority_yr,
    (CASE WHEN schoolnew_infra_detail.road_connect=1 THEN CONCAT('Kutcha Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=2 THEN CONCAT('Partial Pucca Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN schoolnew_infra_detail.road_connect=3 THEN CONCAT('No Road',' - ',schoolnew_infra_detail.distance_road,' mts') ELSE
    CASE WHEN (schoolnew_infra_detail.road_connect=NULL OR  schoolnew_infra_detail.road_connect=0 OR schoolnew_infra_detail.road_connect IS NULL) THEN 'N/A' END
    END END END) AS weather_roads,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_boys,'NO') AS train_prov_boys,
    IF(schoolnew_training_detail.special_train=1,schoolnew_training_detail.train_prov_grls,'NO') AS train_prov_grls,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_by=1 THEN 'SCHOOL TEACHERS' ELSE
	CASE WHEN schoolnew_training_detail.train_cond_by=2 THEN 'SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=3 THEN 'BOTH SCHOOL & SPECIALLY ENGAGED TEACHERS' ELSE
    CASE WHEN schoolnew_training_detail.train_cond_by=4 THEN 'NGO' END END END END),'NO') AS train_cond_by,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_cond_in=1 THEN 'SCHOOL PREMISES' ELSE
		CASE WHEN schoolnew_training_detail.train_cond_in=2 THEN 'OTHER THAN SCHOOL PREMISES' ELSE
			CASE WHEN schoolnew_training_detail.train_cond_in=3 THEN 'BOTH SCHOOL AND OTHER PREMISES' END END END),'N/A') AS train_cond_in,
    IF(schoolnew_training_detail.special_train=1,(CASE WHEN schoolnew_training_detail.train_type=1 THEN 'RESIDENTIAL' ELSE
		CASE WHEN schoolnew_training_detail.train_type=2 THEN 'NON-RESIDENTIAL' ELSE
			CASE WHEN schoolnew_training_detail.train_type=3 THEN 'BOTH RESIDENTIAL AND NON-RESIDENTIAL' END END END),'N/A') AS train_type,
    (CASE WHEN schoolnew_training_detail.anganwadi=1 THEN 'YES' ELSE 'NO' END) AS anganwadi,
    IF(schoolnew_training_detail.anganwadi=1,angan_childs,'N/A') AS angan_childs,
    IF(schoolnew_training_detail.anganwadi=1,angan_wrks,'N/A') AS angan_wrks,
    schoolnew_training_detail.anganwadi_center,
    (CASE WHEN schoolnew_training_detail.anganwadi_train=1 THEN 'YES' ELSE 'NO' END) AS anganwadi_train,
    (CASE WHEN schoolnew_safety_details.sdmp_dev=1 THEN 'YES' ELSE 'NO' END) AS sdmp_dev,
    (CASE WHEN schoolnew_safety_details.sturct_saf=1 THEN 'YES' ELSE 'NO' END) AS sturct_saf,
    (CASE WHEN schoolnew_safety_details.nonsturct_saf=1 THEN 'YES' ELSE 'NO' END) AS nonsturct_saf,
    (CASE WHEN schoolnew_safety_details.cctv_school=1 THEN 'YES' ELSE 'NO' END) AS cctv_school,
    (CASE WHEN schoolnew_safety_details.firext_schl=1 THEN 'YES' ELSE 'NO' END) AS firext_schl,
    (CASE WHEN schoolnew_safety_details.nodtchr_schlsaf=1 THEN 'YES' ELSE 'NO' END) AS nodtchr_schlsaf,
    (CASE WHEN schoolnew_safety_details.dister_trng=1 THEN 'YES' ELSE 'NO' END) AS dister_trng,
    (CASE WHEN schoolnew_safety_details.dister_part=1 THEN 'YES' ELSE 'NO' END) AS dister_part,
    (CASE WHEN schoolnew_safety_details.slfdfse_trng=1 THEN schoolnew_safety_details.noslfdfse_trng ELSE 'NO' END) AS slfdfse_trng,
    (CASE WHEN schoolnew_committee_detail.suppliment_prevousyr=1 THEN 'YES' ELSE 'NO' END) AS suppliment_prevousyr,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_prepri=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_prepri,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_pri=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_pri,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_upp,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_sec,
    (CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.txtbk_curyr_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS txtbk_curyr_hsec,
    
    (CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grade_preprim=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grade_preprim,
    (CASE WHEN schoolnew_textbook_detail.tle_grade_prim=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grade_prim=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grade_prim=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grade_prim,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_upp,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_sec,
    (CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.tle_grde_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS tle_grde_hsec,
    
    (CASE WHEN schoolnew_textbook_detail.sports_prepri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_prepri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_prepri=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_prepri,
    (CASE WHEN schoolnew_textbook_detail.sports_pri=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_pri=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_pri=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_pri,
    (CASE WHEN schoolnew_textbook_detail.sports_upp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_upp=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_upp=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_upp,
    (CASE WHEN schoolnew_textbook_detail.sports_sec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_sec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_sec=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_sec,
    (CASE WHEN schoolnew_textbook_detail.sports_hsec=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_textbook_detail.sports_hsec=2 THEN 'NO' ELSE
			CASE WHEN schoolnew_textbook_detail.sports_hsec=3 THEN 'NOT APPLICABLE' END
	END END) AS sports_hsec,
    (CASE WHEN smc_const=1 THEN 'YES' ELSE 'NO' END) AS smc_const,
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_no,'N/A') as smc_acc_no,
    IF(schoolnew_committee_detail.smc_sep_bnkacc=1,schoolnew_committee_detail.smc_acc_name,'N/A') as smc_acc_name,
    IF(smc_const=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smc_bnk_brnch),'N/A') as smc_bank,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_name,'N/A') AS smc_chair_name,
    IF(smc_const=1,schoolnew_committee_detail.smc_chair_mble,'N/A') AS smc_chair_mble,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_mle,'N/A') AS smc_tot_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_tot_fmle,'N/A') AS smc_tot_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_mle,'N/A') AS smc_prnts_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_prnts_fmle,'N/A') AS smc_prnts_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_mle,'N/A') AS smc_rep_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_rep_fmle,'N/A') AS smc_rep_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_mle,'N/A') AS smc_weakr_mle,
    IF(smc_const=1,schoolnew_committee_detail.smc_weakr_fmle,'N/A') AS smc_weakr_fmle,
    IF(smc_const=1,schoolnew_committee_detail.smc_no_prev_acyr,'N/A') AS smc_no_prev_acyr,
    IF(smc_const=1,schoolnew_committee_detail.smc_const_yr,'N/A') AS smc_const_yr,
    (CASE WHEN schoolnew_committee_detail.smc_sdp=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smc_sdp=0 THEN 'NO' ELSE '(NO-DATA FOUND)' END END) AS smc_sdp,
        
	(CASE WHEN schoolnew_committee_detail.smdc_constitu=1 THEN 'YES' ELSE 'NO' END) AS smdc_constitu,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_name,'N/A') as smdc_acc_name,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,schoolnew_committee_detail.smdc_acc_no,'N/A') as smdc_acc_no,
    IF(schoolnew_committee_detail.smdc_sep_bnkacc=1,(SELECT CONCAT(bank_name,'<br>',branch,'<br>',branch_add,'<br>',city,'<br>IFSC CODE:',ifsc_code) FROM schoolnew_branch where id=schoolnew_committee_detail.smdc_bnk_brnch),'N/A') as smdc_bank,
    
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_mle,'N/A') as smdc_tot_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_tot_fmle,'N/A') as smdc_tot_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_mle,'N/A') as smdc_parnt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_parnt_fmle,'N/A') as smdc_parnt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_mle,'N/A') as smdc_lb_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_lb_fmle,'N/A') as smdc_lb_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_mle,'N/A') as smdc_minori_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_minori_fmle,'N/A') as smdc_minori_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_women,'N/A') as smdc_women,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_mle,'N/A') as smdc_scst_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_scst_fmle,'N/A') as smdc_scst_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_mle,'N/A') as smdc_deo_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_deo_fmle,'N/A') as smdc_deo_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_mle,'N/A') as smdc_audit_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_audit_fmle,'N/A') as smdc_audit_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_mle,'N/A') as smdc_exprt_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_exprt_fmle,'N/A') as smdc_exprt_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_mle,'N/A') as smdc_techrs_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_techrs_fmle,'N/A') as smdc_techrs_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_mle,'N/A') as smdc_hm_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_hm_fmle,'N/A') as smdc_hm_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_mle,'N/A') as smdc_prnci_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_prnci_fmle,'N/A') as smdc_prnci_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mle,'N/A') as smdc_chair_mle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_fmle,'N/A') as smdc_chair_fmle,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_const_yr,'N/A') as smdc_const_yr,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_no_last_acyr,'N/A') as smdc_no_last_acyr,
    (CASE WHEN schoolnew_committee_detail.smdc_sip=1 THEN 'YES' ELSE
		CASE WHEN schoolnew_committee_detail.smdc_sip=0 THEN 'NO' ELSE 'N/A' END END) AS smdc_sip,
	IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_contrib_amt,'N/A') as smdc_contrib_amt,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_name,'N/A') as smdc_chair_name,
    IF(schoolnew_committee_detail.smdc_constitu=1,schoolnew_committee_detail.smdc_chair_mble,'N/A') as smdc_chair_mble,
    
    IF(schoolnew_committee_detail.sbc_const=1,schoolnew_committee_detail.sbc_const_year,'NO') as sbc_const,
    
    IF(schoolnew_committee_detail.acadecomm_const=1,schoolnew_committee_detail.acadecomm_year,'NO') as acadecomm_const,
    (CASE WHEN schoolnew_committee_detail.pta_const=1 THEN 'YES' ELSE 'NO' END) AS pta_const,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_est_yr,'N/A') as pta_est_yr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_no_curyr,'N/A') as pta_no_curyr,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_reg_no,'N/A') as pta_reg_no,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_subscri_amt,'N/A') as pta_subscri_amt,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_name,'N/A') as pta_chair_name,
    IF(schoolnew_committee_detail.pta_const=1,schoolnew_committee_detail.pta_chair_mble,'N/A') as pta_chair_mble,
    TRUNCATE((schoolnew_infra_detail.land_avail_sqft/43560),3) AS land_avail_sqft,
    IF(schoolnew_infra_detail.play_facility=1,TRUNCATE((schoolnew_infra_detail.play_area_sqft/43560),3),IF(schoolnew_infra_detail.play_alt_arrang=1,CONCAT(schoolnew_infra_detail.play_address,'<br>Distance:',schoolnew_infra_detail.dist_build_playgr),'N/A')) AS play_area_sqft,
    
    IF(schoolnew_infra_detail.land_exp_scl=1,TRUNCATE((schoolnew_infra_detail.play_land_area/43560),3),'N/A') AS play_land_area,
    (CASE WHEN schoolnew_infra_detail.land_ownersip=1 THEN 'RENTED' ELSE
		CASE WHEN schoolnew_infra_detail.land_ownersip=2 THEN 'LEASED' ELSE
			CASE WHEN schoolnew_infra_detail.land_ownersip=3 THEN 'OWNED' ELSE
				CASE WHEN schoolnew_infra_detail.land_ownersip=4 THEN 'RENTAL FREE' END END END END) AS land_ownersip,
	IF(schoolnew_infra_detail.land_ownersip=1,schoolnew_infra_detail.land_rent_amt,'N/A') AS land_rent_amt,
    IF(schoolnew_infra_detail.land_ownersip=2,schoolnew_infra_detail.land_lease_perid,'N/A') AS land_lease_perid,
    IF(schoolnew_infra_detail.land_ownersip=2,DATE_FORMAT(schoolnew_infra_detail.valid_upto,"%d/%m/%Y"),'N/A') AS valid_upto,
    (CASE WHEN schoolnew_infra_detail.cmpwall_type=1 THEN 'PUCCA' ELSE
		CASE WHEN schoolnew_infra_detail.cmpwall_type=2 THEN 'PUCCA BUT BROKEN' ELSE
			CASE WHEN schoolnew_infra_detail.cmpwall_type=3 THEN 'BARBED WIRE FENCING' ELSE
				CASE WHEN schoolnew_infra_detail.cmpwall_type=4 THEN 'HEDGES' ELSE
					CASE WHEN schoolnew_infra_detail.cmpwall_type=5 THEN 'UNDER CONSTRUCTION' ELSE
						CASE WHEN schoolnew_infra_detail.cmpwall_type=6 THEN 'NO BOUNDRY WALL' END END END END END END) AS cmpwall_type,
	IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_perimtr) as cmpwall_perimtr,
    IF(schoolnew_infra_detail.cmpwall_type=6,'N/A',schoolnew_infra_detail.cmpwall_length) as cmpwall_length,
    schoolnew_infra_detail.build_block_no,
    schoolnew_infra_detail.classrm_undr_constr,
	(CASE WHEN schoolnew_infra_detail.classrm_desk_studs=1 THEN 'YES' ELSE 'NO' END) AS classrm_desk_studs,
	(CASE WHEN schoolnew_infra_detail.ramp_disable_child=1 THEN 'YES' ELSE 'NO' END) AS ramp_disable_child,
	(CASE WHEN schoolnew_infra_detail.ramp_handrail=1 THEN 'YES' ELSE 'NO' END) AS ramp_handrail,
	IF(schoolnew_infra_detail.staffquarter=1,schoolnew_infra_detail.rooms_staffquartrs,'N/A') AS rooms_staffquartrs,
	(CASE WHEN schoolnew_infra_detail.fulltime_lib=1 THEN 'YES' ELSE 'NO' END) AS fulltime_lib,
	(CASE WHEN schoolnew_infra_detail.news_subscribe=1 THEN 'YES' ELSE 'NO' END) AS news_subscribe,
        
        schoolnew_infra_detail.toil_gents_tot,
        schoolnew_infra_detail.toil_ladies_tot,
        schoolnew_infra_detail.urinal_gents_tot,
        schoolnew_infra_detail.urinals_tot_ladies,
        
        schoolnew_infra_detail.toil_bys_inuse,
        schoolnew_infra_detail.toil_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_nonfunc_bys=4 THEN 'N/A' END END END END) AS toil_nonfunc_bys,
        schoolnew_infra_detail.toil_inuse_grls,
        schoolnew_infra_detail.toil_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.toil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.toil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.toil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.toil_reasn_grls=4 THEN 'N/A' END END END END) AS toil_reasn_grls,
                    
		schoolnew_infra_detail.cwsntoil_inuse_bys,
        schoolnew_infra_detail.cwsntoil_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_bys=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_bys,
        schoolnew_infra_detail.cwsntoil_inuse_grls,
        schoolnew_infra_detail.cwsntoil_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.cwsntoil_reasn_grls=4 THEN 'N/A' END END END END) AS cwsntoil_reasn_grls,
        schoolnew_infra_detail.urinls_inuse_bys,
        schoolnew_infra_detail.urinls_notuse_bys,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_bys=4 THEN 'N/A' END END END END) AS urinls_reasn_bys,
        schoolnew_infra_detail.urinls_inuse_grls,
        schoolnew_infra_detail.urinls_notuse_grls,
        (CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=1 THEN 'WATER SUPPLY' ELSE
			CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=2 THEN 'DRAINAGE PROBLEM' ELSE
				CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=3 THEN 'DAMAGED' ELSE
					CASE WHEN schoolnew_infra_detail.urinls_reasn_grls=4 THEN 'N/A' END END END END) AS urinls_reasn_grls,
		schoolnew_infra_detail.toil_waterfac_bys,
        schoolnew_infra_detail.toil_waterfac_grls,
        schoolnew_infra_detail.urinls_waterfac_bys,
        schoolnew_infra_detail.urinls_waterfac_grls,
        (CASE WHEN schoolnew_infra_detail.toil_sanit_wrks=1 THEN 'YES' ELSE 'NO' END) AS toil_sanit_wrks,
        IF(schoolnew_infra_detail.toil_land_avail=1,schoolnew_infra_detail.toil_land_avail_sqft,'NO') AS toil_land_avail,
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_avail_no,
        IF(schoolnew_infra_detail.napkin_incin=1,schoolnew_infra_detail.napkin_avail_no,'N/A') AS napkin_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_avail_no,'N/A') AS inci_auto_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_auto_func_no,'N/A') AS inci_auto_func_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_avail_no,'N/A') AS inci_man_avail_no,
        IF(schoolnew_infra_detail.incinerator=1,schoolnew_infra_detail.inci_man_func_no,'N/A') AS inci_man_func_no,
        schoolnew_infra_detail.tot_handwash_bys,
        schoolnew_infra_detail.tot_handwash_grls,
        IF(schoolnew_infra_detail.drnkwater_avail=1,
        (CASE WHEN schoolnew_infra_detail.drnkwater_source=1 THEN 'HAND PUMPS' ELSE
			CASE WHEN schoolnew_infra_detail.drnkwater_source=2 THEN 'WELL' ELSE
				CASE WHEN schoolnew_infra_detail.drnkwater_source=3 THEN 'TAP WATER' ELSE
					CASE WHEN schoolnew_infra_detail.drnkwater_source=4 THEN 'RO PURIFIER' ELSE
						CASE WHEN schoolnew_infra_detail.drnkwater_source=5 THEN 'PACKAGED/BOTTELED' ELSE
							CASE WHEN schoolnew_infra_detail.drnkwater_source=-1 THEN CONCAT('OTHERS - ',schoolnew_infra_detail.drnkwater_othsource) END END END END END END),'NO') AS drnkwater_avail,
		IF(schoolnew_infra_detail.drnkwater_source=2,(CASE WHEN schoolnew_infra_detail.well_top=1 THEN 'YES' ELSE 'NO' END),'N/A') AS well_top,
        IF(schoolnew_infra_detail.water_test=1,'YES','NO') AS water_test,
        IF(schoolnew_infra_detail.overheadtank_avail=1,'YES','NO') AS overheadtank_avail,
        IF(schoolnew_infra_detail.waterpuri_avail=1,'YES','NO') AS waterpuri_avail,
        IF(schoolnew_infra_detail.schl_rainwtr_hrv=1,'YES','NO') AS schl_rainwtr_hrv,
        IF(schoolnew_infra_detail.solar_panel=1,'YES','NO') AS solar_panel,
        IF(schoolnew_infra_detail.kitchen_garden=1,'YES','NO') AS kitchen_garden,
        (CASE WHEN schoolnew_infra_detail.class_dustbin=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.class_dustbin=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.class_dustbin=2 THEN 'YES BUT SOME' END END END) AS class_dustbin,
		(CASE WHEN schoolnew_infra_detail.waste_toilets=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.waste_toilets=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_toilets=2 THEN 'YES BUT SOME' END END END) AS waste_toilets,
		(CASE WHEN schoolnew_infra_detail.waste_kitchen=1 THEN 'YES' ELSE 
			CASE WHEN schoolnew_infra_detail.waste_kitchen=0 THEN 'NO' ELSE
				CASE WHEN schoolnew_infra_detail.waste_kitchen=2 THEN 'YES BUT SOME' END END END) AS waste_kitchen,
        (CASE WHEN schoolnew_academic_detail.cal=1 THEN 'YES' ELSE 'NO' END) AS cal,
        IF((schoolnew_academic_detail.clab=1 OR schoolnew_academic_detail.clab=3),CONCAT(
        (CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END),'-',schoolnew_academic_detail.year_implmnt),CASE WHEN schoolnew_academic_detail.clab=1 THEN 'ICT' ELSE
			CASE WHEN schoolnew_academic_detail.clab=2 THEN 'CAL' ELSE
				CASE WHEN schoolnew_academic_detail.clab=3 THEN 'ICT AND CAL' ELSE
					CASE WHEN schoolnew_academic_detail.clab=4 THEN 'NONE' END END END END) AS clab,
			(CASE WHEN schoolnew_academic_detail.ict_lab=1 THEN 'YES' ELSE 'NO' END) AS ict_lab,
            (CASE WHEN schoolnew_academic_detail.model_ict=1 THEN 'BOOT MODEL' ELSE
				CASE WHEN schoolnew_academic_detail.model_ict=2 THEN 'BOO MODEL' ELSE
					CASE WHEN schoolnew_academic_detail.model_ict=3 THEN 'OTHER MODEL' END END END) AS model_ict,
			(CASE WHEN schoolnew_academic_detail.ict_type=1 THEN 'FULL TIME' ELSE
				CASE WHEN schoolnew_academic_detail.ict_type=2 THEN 'PART TIME' ELSE
					CASE WHEN schoolnew_academic_detail.ict_type=3 THEN 'NOT AVALIABLE' END END END) AS model_ict_type,
			(CASE WHEN schoolnew_academic_detail.electricity=1 THEN 'YES' ELSE
				CASE WHEN schoolnew_academic_detail.electricity=2 THEN 'NO' ELSE
					CASE WHEN schoolnew_academic_detail.electricity=3 THEN 'NOT FUNCTIONING' END END END) AS electricity,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,'YES','NO') AS med_ckup_lstyr,        
			IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_1 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_1,'%d/%m/%Y') ELSE 'NO DATA' END),'N/A') AS medcheckup_1,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_2 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_2,"%d/%m/%Y") ELSE 'NO DATA' END),'N/A') AS medcheckup_2,
            IF(schoolnew_training_detail.med_ckup_lstyr=1,(CASE WHEN schoolnew_training_detail.med_ckup_3 IS NOT NULL THEN DATE_FORMAT(schoolnew_training_detail.med_ckup_3,"%d/%m/%Y") ELSE 'NO DATA' END),'N/A') AS medcheckup_3,
            
            (CASE WHEN schoolnew_training_detail.deworm_tab=1 THEN 'COMPLETE TWO DOSE' ELSE
				CASE WHEN schoolnew_training_detail.deworm_tab=2 THEN 'PARTIALLY ONE DOSE' ELSE
					CASE WHEN schoolnew_training_detail.deworm_tab=3 THEN 'NONE' END END END) AS deworm_tab,
			(CASE WHEN schoolnew_training_detail.iron_folic=1 THEN 'YES' ELSE 'NO' END) AS iron_folic,
	langandmed.medium_instruct as mediumetr,
    langandmed.lang_instruct as langetr,
    (CASE WHEN spl_edtor=1 THEN 'AT CLUSTER LEVEL' ELSE
		CASE WHEN spl_edtor=2 THEN 'DEDICATED' ELSE
			CASE WHEN spl_edtor=3 THEN 'NO' ELSE
				CASE WHEN spl_edtor IS NULL THEN 'NO DATA' END END END END) AS spl_edtor,
	(CASE WHEN schoolnew_training_detail.stu_councel=1 THEN 'YES' ELSE 'NO' END) AS stu_councel,
    IF(schoolnew_training_detail.sci_lab_sec=0,'NO',schoolnew_training_detail.tot_room) AS tot_room
FROM schoolnew_basicinfo
JOIN schoolnew_academic_detail ON schoolnew_academic_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_infra_detail ON schoolnew_infra_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_parliament ON schoolnew_parliament.id=schoolnew_basicinfo.parliament_id
JOIN schoolnew_assembly ON schoolnew_assembly.id=schoolnew_basicinfo.assembly_id
JOIN schoolnew_training_detail ON schoolnew_training_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_committee_detail ON schoolnew_committee_detail.school_key_id=schoolnew_basicinfo.school_id
JOIN schoolnew_textbook_detail ON schoolnew_textbook_detail.school_key_id=schoolnew_basicinfo.school_id

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
) AS locationentry ON locationentry.district_id=schoolnew_basicinfo.district_id AND locationentry.edu_dist_id=schoolnew_basicinfo.edu_dist_id AND locationentry.block_id=schoolnew_basicinfo.block_id 

JOIN (SELECT  
		schoolnew_zone_type.zone_type,
		schoolnew_habitation_all.name as village_ward,
		schoolnew_localbody_all.name as village_munci,
		schoolnew_habitation_all.id as village_id
	FROM schoolnew_localbody_all
	JOIN schoolnew_habitation_all ON schoolnew_localbody_all.id=schoolnew_habitation_all.localbody_id
	JOIN schoolnew_zone_type ON schoolnew_zone_type.id=schoolnew_habitation_all.zone_type_id AND schoolnew_localbody_all.zone_type_id
) AS localbodyall ON village_id=schoolnew_basicinfo.lb_habitation_id

JOIN (SELECT manage_name,management,department,schoolnew_school_department.id as directid FROM schoolnew_manage_cate
		JOIN schoolnew_management ON schoolnew_management.mana_cate_id=schoolnew_manage_cate.id
		JOIN schoolnew_school_department ON schoolnew_school_department.school_mana_id=schoolnew_management.id
) AS schooldirectrate ON schooldirectrate.directid=schoolnew_basicinfo.sch_directorate_id

JOIN (SELECT * FROM schoolnew_type) as schoolnew_type ON schoolnew_type.id=schoolnew_academic_detail.scl_category
JOIN (SELECT medid,landesc.school_key_id,medium_instruct,langid,lang_instruct FROM 
			(SELECT schoolnew_mediumentry.id as medid,schoolnew_mediumentry.school_key_id,
				schoolnew_mediumofinstruction.MEDINSTR_DESC AS medium_instruct
			FROM schoolnew_mediumofinstruction
			JOIN schoolnew_mediumentry ON schoolnew_mediumentry.medium_instrut=schoolnew_mediumofinstruction.MEDINSTR_ID) AS meddesc
		JOIN (SELECT schoolnew_langtaught_entry.id as langid,schoolnew_langtaught_entry.school_key_id,
					schoolnew_mediumofinstruction.MEDINSTR_DESC AS lang_instruct
				FROM schoolnew_mediumofinstruction
				JOIN schoolnew_langtaught_entry ON schoolnew_langtaught_entry.lang_taught=schoolnew_mediumofinstruction.MEDINSTR_ID
) as landesc ON landesc.school_key_id=meddesc.school_key_id) AS langandmed ON langandmed.school_key_id=schoolnew_basicinfo.school_id

LEFT JOIN (SELECT * FROM schoolnew_resitype) as schoolnew_resitype ON schoolnew_resitype.RESITYPE_ID=schoolnew_academic_detail.typ_resid_schl        
LEFT JOIN schoolnew_safety_details ON schoolnew_safety_details.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=3531;