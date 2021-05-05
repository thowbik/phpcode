SELECT 
	labetrid,Lab,seperate_room,condition_now,
    eqipid,ictkit,kitsupplier,quantity,
    invenid,inven_avail,inven_working,inven_item,invensupp,
    IF(internetid IS NULL,'0',internetid) as internet,
    IF(internetid IS NULL,'N/A',subscriber) as subscriber,
    IF(internetid IS NULL,'N/A',data_speed) as data_speed,
    IF(internetid IS NULL,'N/A',provided_by) as provided_by,
    ictetrid,avail_nos,working_nos,ict_type,supplied_by,purpose
FROM schoolnew_basicinfo
JOIN (SELECT schoolnew_labentry.id as labetrid,school_key_id,schoolnew_lab.Lab,
(CASE WHEN seperate_room=1 THEN 'SEPERATE ROOM' ELSE 'NO SEPERATE ROOM' END) AS seperate_room,
(CASE WHEN condition_now=1 THEN 'FULLY EQUIPPED' ELSE
	CASE WHEN condition_now=2 THEN 'PARTIALLY EQUIPPED' ELSE
		CASE WHEN condition_now=3 THEN 'NOT APPLICABLE' END END END) AS condition_now FROM schoolnew_labentry
JOIN schoolnew_lab ON schoolnew_lab.id=schoolnew_labentry.lab_id) AS ictlab ON ictlab.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_equipment.id as eqipid, school_key_id,schoolnew_ict_list.ict_type as ictkit, 
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_equipment.ngo_name) ELSE supplier_name END) AS kitsupplier,
quantity
FROM schoolnew_equipment 
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_equipment.equip_id
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_equipment.supplied_by) AS equipetr ON equipetr.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_inventry.id as invenid,school_key_id,avail_nos as inven_avail,working_nos as inven_working,ict_type as inven_item,
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_inventry.donor_invent) ELSE supplier_name END) AS invensupp
FROM schoolnew_inventry 
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_inventry.inventry_id
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_inventry.supplied_by) AS schoolinventory ON schoolinventory.school_key_id=schoolnew_basicinfo.school_id

JOIN (SELECT schoolnew_ictentry.id as ictetrid,school_key_id,avail_nos,working_nos,schoolnew_ict_list.ict_type,
(CASE WHEN supplied_by=15 THEN CONCAT(supplier_name,'-',schoolnew_ictentry.donor_ict) ELSE supplier_name END) AS supplied_by,
(CASE WHEN purpose=1 THEN 'TEACHING' ELSE
	CASE WHEN purpose=2 THEN 'ADMINISTRATIVE' ELSE
		CASE WHEN purpose=3 THEN 'ACADEMIC' ELSE
			CASE WHEN purpose=4 THEN 'NONE' END END END END) AS purpose
FROM schoolnew_ictentry
JOIN schoolnew_ict_list ON schoolnew_ict_list.id=schoolnew_ictentry.ict_type 
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_ictentry.supplied_by) AS ictentry ON ictentry.school_key_id=schoolnew_basicinfo.school_id

LEFT JOIN (SELECT schoolnew_internet.id as internetid,school_key_id,subscriber,
(CASE WHEN range_unit=1 THEN CONCAT(data_speed,' Kbps') ELSE
	CASE WHEN range_unit=2 THEN CONCAT(data_speed,' KBps') ELSE
		CASE WHEN range_unit=3 THEN CONCAT(data_speed,' Mbps') ELSE
			CASE WHEN range_unit=4 THEN CONCAT(data_speed,' MBps') END END END END) AS data_speed,
(CASE WHEN provided_by=15 THEN CONCAT(supplier_name,'-',schoolnew_internet.other_ngo) ELSE supplier_name END) AS provided_by
FROM schoolnew_internet 
JOIN schoolnew_ict_suppliers ON schoolnew_ict_suppliers.id=schoolnew_internet.provided_by) AS interetr ON interetr.school_key_id=schoolnew_basicinfo.school_id
WHERE schoolnew_basicinfo.school_id=3531;