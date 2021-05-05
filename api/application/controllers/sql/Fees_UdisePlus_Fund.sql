SELECT 
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
    trust_address,trust_pincode,trust, DATE_FORMAT(trustdate, '%d/%m/%Y') AS trustdate,trustplacereg,
    
    brlbks_elebys,brlbks_elegls,brailbks_secbys,brlbks_secgls,brailbks_hsecbys,brlbks_hsegls,
    brlkit_elebys,brlkit_elegls,brailkit_secbys,brlkit_secgls,brailkit_hsecbys,brlkit_hsegls,
    lvnkit_elebys,lvnkit_elegls,lvnkit_secbys,lvnkit_secgls,lvnkit_hsecbys,lvnkit_hsegls,
    hearaid_elebys,hearaid_elegls,hearaid_secbys,hearaid_secgls,hearaid_hsecbys,hearaid_hsegls,
    braces_elebys,braces_elegls,braces_secbys,braces_secgls,braces_hsecbys,braces_hsegls,
    crthes_elebys,crthes_elegls,crthes_secbys,crthes_secgls,crthes_hsecbys,crthes_hsegls,
    whlchr_elebys,whlchr_elegls,whlchr_secbys,whlchr_secgls,whlchr_hsecbys,whlchr_hsegls,
    tricyle_elebys,tricyle_elegls,tricyle_secbys,tricyle_secgls,tricyle_hsecbys,tricyle_hsegls,
    caliper_elebys,caliper_elegls,caliper_secbys,caliper_secgls,caliper_hsecbys,caliper_hsegls,
    escort_elebys,escort_elegls,escort_secbys,escort_secgls,escort_hsecbys,escort_hsegls,
    stipend_elebys,stipend_elegls,stipend_secbys,stipend_secgls,stipend_hsecbys,stipend_hsegls,
    schoolnew_feestruct.id as feesid,(SELECT baseapp_class_studying.class_studying FROM baseapp_class_studying WHERE id=class_id) as class_id,
    inst_fee,tution_fee,regular_fee,transport_fee,annual_fee,book_fee,lab_fee,other_fee,total_fee,
    ssadevep_recept,ssadevep_expdtre,ssamntn_recept,ssamntn_expdtre,ssatlm_recept,ssatlm_expdtre,ssacivil_recept,
    ssacivil_expdtre,ssaannual_recept,ssaannual_expdtre,ssamnr_recept,ssamnr_expdtre,ssarpr_recept,ssarpr_expdtre,
    ssapur_recept,ssapur_expdtre,ssametwtr_recept,ssametwtr_expdtre,ssaoth_recept,ssaoth_expdtre,ssatot_recept,ssatot_expdtre,
    ssacmpste_recept,ssacmpste_expdtre,ssalibg_recept,ssalibg_expdtre,ssaped_recept,ssaped_expdtre,ssamedia_recept,ssamedia_expdtre,
    ssatrngsmcdc_recept,ssatrngsmcdc_expdtre,ssapreschl_recept,ssapreschl_expdtre,
    IF(ngo_fince=1,CONCAT(ngo_name,'-',ngo_amt,' Rs.'),'NO') AS ngo_name,
    IF(psu_fince=1,CONCAT(psu_name,'-',psu_amt,' Rs.'),'NO') AS psu_name,
    (CASE WHEN main_com=1 THEN 'YES' ELSE 'NO' END) AS main_com,
    (CASE WHEN sprts_equip=1 THEN 'YES' ELSE 'NO' END) AS sprts_equip,
    (CASE WHEN lib_boks=1 THEN 'YES' ELSE 'NO' END) AS lib_boks,
    noteacher_adhar,
    (CASE WHEN stuatdnce_elet=1 THEN 'YES' ELSE 'NO' END) AS stuatdnce_elet,
    (CASE WHEN tchratdnce_elet=1 THEN 'YES' ELSE 'NO' END) AS tchratdnce_elet,
    (CASE WHEN schlevl_cmp=1 THEN 'YES' ELSE 'NO' END) AS schlevl_cmp,
    (CASE WHEN schl_imp=1 THEN 'YES' ELSE 'NO' END) AS schl_imp,
    (CASE WHEN schlreg_pfms=1 THEN 'YES' ELSE 'NO' END) AS schlreg_pfms
FROM schoolnew_basicinfo
LEFT JOIN schoolnew_grants_details ON schoolnew_grants_details.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_finance_details ON schoolnew_finance_details.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_fund ON schoolnew_fund.school_key_id=schoolnew_basicinfo.school_id
LEFT JOIN schoolnew_feestruct ON schoolnew_feestruct.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=3531;