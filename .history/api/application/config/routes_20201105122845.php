<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['autenticadors'] = 'autenticador/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Login_Controller/login';
$route['ResetPassword']='Login_Controller/login_password_reset';

/* Teacher module Routes   creted by Tamilmaran-venba*/

$route['stflist'] ='Udise_staff/schstflist';
$route['stfdeputelist'] ='Udise_staff/schdeputestflist';
$route['stfvolunteerlist'] ='Udise_staff/schvolunteerstflist';
$route['GetDropdown_Staff']='Udise_staff/schstfmasters';
$route['GetDropdown_Depute']='Udise_staff/schstfdeputematers'; 
 /* Testing Purpose */
// $route['TeacherlistTesting'] ='Udise_staff/school_teacherlist_testing';
// $route['NonTeacherlistTesting'] ='Udise_staff/school_nonteacherlist_testing';
// $route['DeputeTeacherlistTesting'] ='Udise_staff/depute_teacherlist_testing';
// $route['VolunteerTeacherlistTesting'] ='Udise_staff/volunteer_teacherlist_testing';

 /* Testing Purpose */
 /*Teacher Transfer Module ceo/state */
 $route['TeacherTransfer'] ='Udise_staff/volunteer_teacherlist_testing';
 /* end of teacher transfer module */

/*end of teacher module routes */

 /*School Module Classlist  creted by Tamilmaran-venba */

   $route['Classlist'] ='Home/schoolwise_classlist';
   $route['DeleteClass'] ='Home/delete_class';
   $route['AddClass'] ='Home/add_class';
   $route['EditClass'] ='Home/edit_class';
   $route['teacherlist']='Home/teacher_list';

 /*end of School Module Classlist */	
		
/** Common Routes */
    $route['schoolWiseStudentList'] = 'Schools_home/schoolwise_student_list';
    $route['classWiseStudentList'] ='Schools_home/classwise_students_list';
    $route['classWiseSection'] ='Schools_home/classwise_section';
    $route['allsectionsbyclass'] = 'Schools_home/allsectionsbyclass';
    $route['schoolWiseClassandSection'] ='Schools_home/schoolwise_class_section';
    $route['getCommonTables'] ='Home/get_common_tables';
/** Common Routes Ends Here */
/** Dashboard Routes */
    $route['schoolsDashboard'] ='Schools_home/schools_dashboard';
/** Dashboard Routes Ends Here */

/* Timetable Module   creted by Tamilmaran-venba*/
$route['GetClass_Details']='TimetableController/getClassSection';
$route['GetMaster_Timetable']='TimetableController/loadMasterTimeTable';
$route['GetMaster_Timetabledata']='TimetableController/getmasterdata';
$route['SaveMaster_Timatable']='TimetableController/savemastertimetable';


$route['GetWeek_Timetabledata'] = 'TimetableController/getweeklydata';
$route['GetLasteek_Timetabledata'] = 'TimetableController/getlastweektimetable';
$route['SaveWeek_Timatable']  = 'TimetableController/saveweeklytimetable';
$route['GetToday_Timetable'] ='TimetableController/todaytimetable';
$route['GetToday_Teacherclasses']  ='TimetableController/getteacher_todayclasses';
$route['SaveToday_Timetable'] ='TimetableController/update_today_timetable';
$route['GetTeacher_List']='TimetableController/get_teacherlist_all';
$route['GetWeek_Teacherdata']='TimetableController/get_week_teacherdata';

$route['GetDropdown_Transfer']='State/transfer_dropdown';
$route['GetTeacherlist_Transfer']='State/transfer_teacherlist';
$route['SaveTeacher_Transfer']='State/saveteacher_transfer';
$route['SaveTeacher_Transferdepute']='State/saveteacher_deputetransfer';
$route['Teacher_Transferhistory']='State/Teacher_transferdetails';
$route['Teacher_Transferhistory_District']='State/Teacher_transferdetails_district';
$route['Teacher_Transferhistory_Block']='State/Teacher_transferdetails_block';
/* End of Timetable Routes */

/* School Basic*/
$route['schoolBasic'] ='Basic/emis_school_detail_entry';
/** End of School-Basic */


/** Scheme Related Routes -- Starts Here ----- **/
    $route['schemesWiseApplicableClasses'] ='Schemes/applicable_classes';
    $route['schemesSubCategoryList'] ='Schemes/schemes_subcategory_list';
    $route['bookList'] ='Schemes/book_list';
    $route['checkWithExistingSerialNo'] = 'Schemes/check_with_exist_serialno';
 
    $route['noonmealList'] ='Schemes/noonmeal_list';
    $route['saveSchemes'] ='Schemes/save_scheme';
    $route['saveNoonmeal'] ='Schemes/to_handle_common_save';
    $route['updateNoonmeal'] ='Schemes/to_handle_common_update';

    $route['uniformList'] ='Schemes/uniform_list';
    $route['saveUniform'] ='Schemes/to_handle_common_save';
    $route['updateUniform'] ='Schemes/to_handle_common_update';

    $route['existingLaptopList'] ='Schemes/laptop_distribution';
    $route['laptopList'] ='Schemes/laptop_list';
    $route['saveLaptop'] ='Schemes/to_handle_common_save';
    $route['updateLaptop'] ='Schemes/to_handle_common_update';
    $route['updatePreviousXIIDtlsForLaptop'] ='Schemes/to_update_previous_XIIdtls_for_laptop';

    $route['primarySchoolBookList'] ='Schemes/primary_schools_book_list';
    $route['savePrimarySchoolBookDtls'] ='Schemes/to_handle_common_save';
    $route['updatePrimarySchoolBookDtls'] ='Schemes/to_handle_common_update';
    $route['finalsavePrimarySchoolBookDtls'] ='Schemes/to_handle_common_update';

    $route['secondarySchoolBookList'] ='Schemes/secondary_schools_book_list';
    $route['saveSecondarySchoolBookDtls'] ='Schemes/to_handle_common_save';
    $route['updateSecondarySchoolBookDtls'] ='Schemes/to_handle_common_update';
    $route['finalsaveSecondarySchoolBookDtls'] ='Schemes/to_handle_common_update';

    $route['higerSecondarySchoolBookList'] ='Schemes/higer_secondary_schools_book_list';
    $route['saveHigerSecondarySchoolBookDtls'] ='Schemes/to_handle_common_save';
    $route['updateHigerSecondarySchoolBookDtls'] ='Schemes/to_handle_common_update';
    $route['finalsaveHigerSecondarySchoolBookDtls'] ='Schemes/to_handle_common_update';

/** Scheme Related Routes ---- ends Here ----- **/

/** Student Related Routes -- Starts Here ----- **/
/** 1) Common Pool   */
    $route['schoolMigration'] ='Student/school_migration';
    $route['saveCommonPoolStudentList'] = 'Student/save_common_student_list';

/** 2) Registration */
    $route['studentRegistration'] = 'Registration/emis_student_reg';

    $route['searchStudentDetails'] = 'Registration/studetus_search';
    $route['searchArchiveStudentDetails'] = 'Registration/studetus_search_arch';

    $route['studentRegData'] = 'Registration/to_save_student_registration_details';
    $route['subcastebycomm'] = 'Registration/subcastebycomm';

    $route['updateStudentsRaiseRequest'] = 'Registration/update_students_raise_request';
    $route['updateStudentsAdmitted'] = 'Registration/updated_emis_students_admitted';

    $route['studsrchArchToCpool'] = 'Registration/stud_insert';
    // (for district Login)
    $route['studPendingTransReqt'] = "Registration/students_raise_request";
    $route['studPendingTransReqtReject'] = "Registration/update_students_reject";
    $route['studPendingTransReqtSave'] = "Registration/update_students_transfer_request";
    

/** 3 Summary*/
    $route['studentSummaryUpto10th'] = 'Student/student_summary_classwise';
    $route['studentSummaryHrSec'] = 'Student/student_summary_classwise_11_12';

/** 4 Tagging */
    $route['saveStudentTaggingRTE']='Student/save_students_tagging_rte';
	$route['saveStudentTaggingCWSN']='Student/save_students_tagging_cwsn';
	$route['saveStudentTaggingAWARDS']='Student/save_students_tagging_awards';
	$route['saveStudentTaggingSPORTS']='Student/save_students_tagging_sports';
	$route['saveStudentTaggingOSC']='Student/save_students_tagging_osc';
	$route['saveStudentTaggingVOCATION']='Student/save_students_tagging_vocation';
	$route['classWiseTaggingStudentList'] ='Student/classwise_students_list_tagging';
	$route['studentTaggingData'] ='Student/students_taggingdata';
	
	
/** 5 Student List */
    $route['studentListWithMasterData'] = 'Student/emis_school_student_classwise_with_master_data';
    $route['updateStudentDetails'] = 'Student/to_update_student_details';

/** 6 TC */

    $route['schoolsStudentsTransferList'] = 'Student/emis_school_get_students_transfer';
    $route['updateStudentsTransferDetails'] = 'Student/update_students_transfer';

    // $route['studentsTransferList'] = 'Student/get_students_transfer_list';
    $route['studentsTransferList'] = 'Registration/students_transfer_list';
    $route['studentsTransferSave'] = 'Registration/save_transfer_certificate_details';
    $route['TC'] = 'Registration/generate_student_tc';

    $route['studentRequestRaised'] = 'Student/student_request_raised';

    $route['transferRequest'] = 'Student/school_transferrequest';

/** 7 last Two 12th students Details 17-18 & 18-19  */    
    $route['previousXIIDtls'] = 'Student/emis_previous_XII_dtls';
    $route['savePreviousXIIDtls'] = 'Student/add_previous_XII_dtls';
    $route['updatePreviousXIIDtls'] = 'Student/edit_previous_XII_dtls';

/** 8 Spl cash */
    $route['stuSplCashlist'] ='Schools_home/students_special_cash';
    $route['stuSplCashAccnoCheck'] ='Schools_home/check_accountnumber_special_cash';
    $route['stuSplCashsave'] ='Schools_home/save_special_cash';

/** Student Related Routes -- ends Here ----- **/

  
$route['allStudentList'] = 'Student/emis_school_student_classwise';
/** SAMPLE API */

// $route['getFees'] = 'Masters_Controller/get_fees';




/*End Dashboard*/

$route['Co_Scholastic']='Home/emis_school_student_co_scholastic';
$route['Scholastic_1_8']='Home/emis_school_student_mark';
$route['Scholastic_9_10']='Home/emis_school_student_mark1';



/**Master Time Table Report Starts here by wesley**/
$route['SchoolwiseClassTimetableReportDist']='State/schoolwise_class_timetable_report_dist';
$route['SchoolwiseClassTimetableReportBlk']='State/schoolwise_class_timetable_report_blk';

/**Master Time Table Report Ends here by wesley**/

/*state end*/


/* State CEO,DEO for Timetablereport by Nirmal*/
$route['TimetableReport']='State/schoolwise_class_TimetableReport';
/* end */


/*image*/
$route['Teacher_Image']='Home/emis_Udise_staff_dash';
$route['getAWSS3Image'] = 'Schools_home/to_get_AWS_S3_image';
$route['getAWSS3Image/(:any)'] = 'Schools_home/to_get_AWS_S3_image';
$route['stfprofpic']='Udise_staff/teacherphoto_update';
/*end image*/

/*Registers Starts here*/

/**Student Registers Starts here**/
$route['studentSchemeListNMMS']='School_register/student_scheme_list_nmms';
$route['studentSchemeListTRSTSE']='School_register/student_scheme_list_trstse';
$route['studentSchemeListInspire']='School_register/student_scheme_list_inspire';

$route['studentSchemeListSports']='School_register/student_scheme_list_sports';
$route['studCommunityReport']='School_register/stud_community_report';
$route['EMISStudentDisablityList']='School_register/emis_student_disablity_list';
$route['benefitStudentsList']='School_register/benefit_students_list';
$route['RTIStudentsList']='School_register/RTI_students_list';
$route['studentsOsc']='School_register/students_osc';

$route['studReligionReport']='School_register/stud_religion_report';
$route['studVOCNSFQReport']='School_register/stud_voc_nsqf_report';
$route['studCWSNReport']='School_register/stud_cwsn_report';
$route['studBPLReport']='School_register/stud_BPL_report';
$route['studAadharReport']='School_register/stud_aadhar_report';
$route['reportAge']='School_register/report_age';
/**Student Registers Ends here**/

/**Schemes Registers Starts here**/
$route['PTMGRNoonMealProgram']='School_register/ptmgr_noon_meal_program';
$route['EMISSchoolTextbooksDistributionDetails']='School_register/emis_school_textbooks_Distribution_details';
$route['EMISSchoolNotebooksDistributionDetails']='School_register/emis_school_notebooks_Distribution_details';
$route['EMISSchoolBagsDistributionDetails']='School_register/emis_school_bags_Distribution_details';
$route['EMISSchoolUniformsDistributionDetails']='School_register/emis_school_uniforms_Distribution_details';
$route['EMISSchoolFootwearDistributionDetails']='School_register/emis_school_footwear_Distribution_details';
$route['EMISSchoolBuspassDistributionDetails']='School_register/emis_school_buspass_Distribution_details';
$route['EMISSchoolColourPencilDistributionDetails']='School_register/emis_school_ColourPencil_Distribution_details';
$route['EMISSchoolGeometryBoxDistributionDetails']='School_register/emis_school_GeometryBox_Distribution_details';
$route['EMISSchoolAtlasDistributionDetails']='School_register/emis_school_Atlas_Distribution_details';
$route['EMISSchoolSweaterDistributionDetails']='School_register/emis_school_Sweater_Distribution_details';
$route['EMISSchoolRainCoatDistributionDetails']='School_register/emis_school_Raincoat_Distribution_details';
$route['EMISSchoolBootDistributionDetails']='School_register/emis_school_boot_Distribution_details';
$route['EMISSchoolSocksDistributionDetails']='School_register/emis_school_Socks_Distribution_details';
$route['EMISSchoolLaptopsDistribution11Details']='School_register/emis_school_Laptops_Distribution11_details';
$route['EMISSchoolLaptopsDistribution12Details']='School_register/emis_school_Laptops_Distribution12_details';
$route['EMISSchoolLaptopsPreviousYearDistribution12Details']='School_register/emis_school_Laptops_Previous_Year_Distribution12_details';
/**Schemes Registers Ends here**/

/**Teacher And School Registers Starts Here**/
$route['EMISStaffAttendanceMonthlySchoolwise']='Udise_staff/emis_staff_attendance_monthly_schoolwise';
$route['StaffTrainingDetails']='Udise_staff/staff_training_dtls';
/**Teacher And School Registers Ends Here**/

/**Below API Done by Tamilmaran(Student Attentence Report Monthwise)**/
$route['studentAttendenceReport'] = 'Student/get_students_wise_report';
/****/

/**Schemes Registers Ends here**/


/*Registers Ends*/

/***************************************************************
Renewal Creation By Ramco Magesh
***************************************************************/

$route['renewalschlist']='Schools_home/renewalgetlist';
$route['renewalsubmit']='Schools_home/renewalapply';
$route['renewalstatus']='Schools_home/renewalstatus';
$route['renewaldocssubmit']='Schools_home/renewalapply';
$route['renewalsubmissionlist'] = 'Schools_home/renewalsubmissionlist';
$route['renewalapprove'] = 'Schools_home/renewalapprove';
$route['renewalpdfview'] = 'Schools_home/renewalpdfview';
$route['renewaldashboard'] ='Schools_home/dashboardrenewalcount';
$route['renewaldashboardlist'] ='Schools_home/dashboardrenewal';
$route['gt'] ='Schools_home/gt';

/***************************************************************
Renewal Ends here By Ramco Magesh
****************************************************************/

/****************************************************************
Students QuickAdmit Creation by Ramco Magesh
*****************************************************************/

$route['QuickAdmit']='Registration/QuickAdmit';
$route['Mschool']='Registration/Mschool';
$route['NssTagging']='Registration/nsstagging';
$route['GetNssTagging']='Registration/nsstagginglist';

/*******************************************************************
Ends Here QuickAdmit Creation DETAILS By Ramco Magesh
*******************************************************************/

/***************************************************************
DCF FORM DETAILS By Ramco Magesh
***************************************************************/
$route['schoolprofilelist']='Schools_home/schoolprofilelist';
$route['editschoolprofile']='Schools_home/editschoolprofile';
$route['schoolfetchlist']='Udise_staff/fetchpassword';
$route['getschoollist'] = 'Udise_staff/getschoollist';
$route['schoolnamesave'] = 'Udise_staff/schoolnamesave';
$route['fetchteacherlist'] = 'Udise_staff/fetchteacherlist';
$route['teacherschoolsave'] ='Udise_staff/teacherschoolsave';
$route['studentsflaglist']='Udise_staff/studentsflaglist';
$route['studentsflagsave']='Udise_staff/studentsflagsave';

/*************************************************************
Ends Here DCF FORM DETAILS By Ramco Magesh
*************************************************************/



/*************************************************************
Teacher update & Student invalid aadhar&phone By Ramco Magesh
************************************************************/
//$route['tchupdate']='Udise_staff/updatestaffdetails';
$route['volunteersave']='Udise_staff/volunteersstaffsave';
$route['volunteeraadhar']='Udise_staff/volunteersstaffaadhar';
$route['volunteerall']='Udise_staff/volunteersstaff';

$route['vocationalstflist'] = 'Udise_staff/vocationalnsqfstafflist';
$route['vocationalstfsave']='Udise_staff/vocationalnsqfstaffsave';
$route['vocationalstfaadhar']='Udise_staff/vocationalnsqfstaffaadhar';
$route['vocationalstfdelete']='Udise_staff/vocationalnsqfstaffdelete';

$route['stafftrainlist']='Udise_staff/stafftraininglist';
$route['traineedetails']='Udise_staff/traineedetails';
$route['savetrainingdetails']='Udise_staff/savetrainingdetails';
$route['deletetrainee'] ='Udise_staff/deletetrainee';
$route['trainingdetailsreport'] ='Udise_staff/trainingdetailsreport';
$route['stafftrainingattendedby'] ='Udise_staff/staff_training_attendedby';
$route['stafftrainingconductedlist'] ='Udise_staff/staff_training_conducted';
$route['stafftrainingconductedsave'] ='Udise_staff/save_staff_training_conducted';
$route['stafftrainingconductbytrid'] ='Udise_staff/staff_training_conducted_by_train_id';
$route['stafftrainingconductedupdate'] ='Udise_staff/update_staff_training_conducted';
$route['teaching']='Udise_staff/teaching';
$route['deputationlist']='Udise_staff/teacherdeputation';
$route['deputationlistall']='Udise_staff/teacherdeputationviewall';
$route['alldistrictlist']='Udise_staff/alldistrict';
$route['deputealllist']='Udise_staff/deputealllist';
$route['deputesubmit']='Udise_staff/deputesubmit';
$route['checkaadhar']='Udise_staff/checkaadharno';
$route['stfsaveall']='Udise_staff/teachersaveall';
$route['stfupdateall']='Udise_staff/teacherupdateall';
$route['teacherlogindetails']='Udise_staff/teacherlogindetails';
$route['getbankdetails'] = 'Udise_staff/checkbankdetails';
$route['checkbankacc'] = 'Udise_staff/checkaccountnumber';
$route['stffixationschlist'] ='Udise_staff/scllistforstffixation';
$route['stffixationdetails'] ='Udise_staff/getstafffixationdetails';
$route['stffixationsave'] ='Udise_staff/savestafffixationdetails';

$route['stftransferdetailsupdate'] = 'Udise_staff/update_staff_transfer';
$route['stftransfer'] ='Udise_staff/staff_transfer';

$route['stuaadharcnt']='Student/students_invalidaadharnocount';
$route['stuaadharall']='Student/students_invalidaadharno';
$route['stucheckaadhar']='Student/studentcheckaadharno';
$route['studaadharupdate']='Student/updateaadhar';
$route['stuphonecnt'] ='Student/students_invalidphonenocount';
$route['stuphoneall'] ='Student/students_invalidphoneno';
$route['stuphoneupdate']='Student/updatephone';

$route['studentattend'] = 'Attendance/studlist';
$route['studentscllist'] = 'Attendance/studentschoollist';
$route['studentsclclasslist']='Attendance/studentclasswiselist';
$route['studentlist']='Attendance/studentlistall';
$route['teacherattend'] = 'Attendance/stafflist';
$route['staffschoolwise'] = 'Attendance/staffwiseschool';
$route['staffdatewise'] = 'Attendance/staffdatewiseschool';
$route['facilitieslist'] = 'Attendance/facilitieslist';
$route['facilistall'] = 'Attendance/facilitiesall';

$route['schoolphotos'] = 'Attendance/schoolphotos';
$route['uploadphotos'] = 'Attendance/saveschoolphotos';
/************************************************
Student Update By Ramoc Magesh
************************************************/
$route['studupdate']='Student/UpdateStudentProfile';

/***************************************************
Ceo District list By Ramco Magesh
**************************************************/
$route['ceoeditschoollist']='Ceo_District/districtschoolslist';


/**************************************************
State School Count done by Ramco Magesh
**************************************************/
$route['dashboard']='State/Dashboard';

$route['schoollist']='State/stateschoollist';

$route['renewallist']='State/dashrenewal';
$route['brtedetails']='Schools_home/brtedetails';

//By NIrmal
$route['osclist']='State/OSCList';
$route['studentsDroppedout']='State/students_Dropped_out';
//END



$route['indicators'] ='State/indicators';
$route['ranksheet'] = 'State/rankSheet';





$route['student_count_state']='State/emisstatestudentcount';
$route['student_count_district_wise']='State/emisstatehome';
$route['student_count_block_wise']='State/get_classwise_district';
$route['student_count_school_wise']='State/get_dash_blockwise_school';

/*teacher details*/
$route['teacher_details']='State/emis_teacher_details';//by Grade
$route['teacher_details_block']='State/emis_teacher_classwise_district';
$route['teacher_details_school']='State/emis_teacher_classwise_block';
/*End teacher details*/

/***********************************************
END at Ramco Magesh
************************************************/



/*common Pool*/
$route['Common_pool']='State/get_district_migration';
$route['Common_pool_block']='State/get_block_migration';
$route['Common_pool_school']='State/get_school_migration';
$route['CP_transfer_reason']='State/get_district_migration_reason';
$route['CP_transfer_reason_block']='State/get_block_migration_reason';
$route['CP_transfer_reason_school']='State/get_school_migration_reason';
/*End Common Pool*/

/**Common API for State,Dist,Block Starts here by wesley**/

/*Common Pool starts*/
$route['CommonPool']='State/district_migration';
/*Common Pool Ends*/

/*State Home Starts here*/
$route['StateHome']='State/state_home';
/*State Home Ends here*/



/**Common API for State,Dist,Block Ends here by wesley**/


/* student list */
$route['State_Total_Studentlist']='State/state_student_list';






/*********************************************
	Done by Ramco VivekRao
*********************************************/
$route['schmaster']='Schools_home/schoolProfilemaster';
$route['schprof']='Schools_home/schoolProfileView';
$route['editschoprof']='Schools_home/schoolProfile';
$route['enroll']='Schools_home/enrollmentDetails';
$route['enroll42a']='Schools_home/enrollmentDetails';
$route['enroll42b']='Schools_home/enrollmentDetails';
$route['enroll42c']='Schools_home/enrollmentDetails';
$route['enroll42d']='Schools_home/enrollmentDetails';
$route['enroll45a']='Schools_home/enrollmentDetails';
$route['enroll45b']='Schools_home/enrollmentDetails';
$route['applyRenewal']='Schools_home/SchoolRenewal';
$route['schprofmonitor']='State/profileMonitoring';
$route['downloads']='State/downloads';
$route['existsrenewal']='Schools_home/renewalExists';
$route['result']='Schools_home/annualResult';
$route['grants']='Schools_home/grandsDetails';
$route['safety']='Schools_home/safetyDetails';
$route['CheckForSubmission']="Approval/CheckForSubmission";
$route['vocational']='Schools_home/vocational';
$route['ifsc']="Basic/getBankByIFSC";
$route['mhrdStateEnroll']="State/mhrdStateEnrollment";
$route['tch3']="Schools_home/teachingandnonteaching31";

$route['teachbyaadhar']="Udise_staff/teacherdetials";
$route['teachbycode']="Udise_staff/teacherdetials";
$route['teachbyname']="Udise_staff/teacherdetials";
$route['byudise']="Basic/schoolbyudisecode";
$route['listschools']="Basic/listschoolsby";
$route['listteacher']="Udise_staff/listteachersby";
$route['liststrength']="Basic/listbystrength";
$route['ptrstrength']="Basic/ptrstrength";

$route['getDistrict']="MasterCtrl/getAllMasters";
$route['getBlock']="MasterCtrl/getAllMasters";
$route['getEduDistrict']="MasterCtrl/getAllMasters";
$route['getHabitation']="MasterCtrl/getAllMasters";
$route['getLocalBody']="MasterCtrl/getAllMasters";
$route['getAssembly']="MasterCtrl/getAllMasters";
$route['getParliment']="MasterCtrl/getAllMasters";
$route['getCluster']="MasterCtrl/getAllMasters";
$route['getManagement']="MasterCtrl/getAllMasters";
$route['getDeparment']="MasterCtrl/getAllMasters";
$route['getTeacherType']="MasterCtrl/getAllMasters";
$route['getTeacherSubjects']="MasterCtrl/getAllMasters";

$route['delDistrict']="MasterCtrl/getAllMasters";
$route['delBlock']="MasterCtrl/getAllMasters";
$route['delEduDistrict']="MasterCtrl/getAllMasters";
$route['delHabitation']="MasterCtrl/getAllMasters";
$route['delLocalBody']="MasterCtrl/getAllMasters";
$route['delAssembly']="MasterCtrl/getAllMasters";
$route['delParliment']="MasterCtrl/getAllMasters";
$route['delCluster']="MasterCtrl/getAllMasters";
$route['delManagement']="MasterCtrl/getAllMasters";
$route['delDeparment']="MasterCtrl/getAllMasters";
$route['delTeacherType']="MasterCtrl/getAllMasters";
$route['delTeacherSubjects']="MasterCtrl/getAllMasters";

$route['addDistrict']="MasterCtrl/addDataToMasters";
$route['addBlock']="MasterCtrl/addDataToMasters";
$route['addEduDistrict']="MasterCtrl/addDataToMasters";
$route['addHabitation']="MasterCtrl/addDataToMasters";
$route['addLocalBody']="MasterCtrl/addDataToMasters";
$route['addAssembly']="MasterCtrl/addDataToMasters";
$route['addParliment']="MasterCtrl/addDataToMasters";
$route['addCluster']="MasterCtrl/addDataToMasters";
$route['addManagement']="MasterCtrl/addDataToMasters";
$route['addDeparment']="MasterCtrl/addDataToMasters";
$route['addTeacherType']="MasterCtrl/addDataToMasters";
$route['addTeacherSubjects']="MasterCtrl/addDataToMasters";


$route['updDistrict']="MasterCtrl/addDataToMasters";
$route['updBlock']="MasterCtrl/addDataToMasters";
$route['updEduDistrict']="MasterCtrl/addDataToMasters";
$route['updHabitation']="MasterCtrl/addDataToMasters";
$route['updLocalBody']="MasterCtrl/addDataToMasters";
$route['updAssembly']="MasterCtrl/addDataToMasters";
$route['updParliment']="MasterCtrl/addDataToMasters";
$route['updCluster']="MasterCtrl/addDataToMasters";
$route['updManagement']="MasterCtrl/addDataToMasters";
$route['updDeparment']="MasterCtrl/addDataToMasters";
$route['updTeacherType']="MasterCtrl/addDataToMasters";
$route['updTeacherSubjects']="MasterCtrl/addDataToMasters";


$route['ctrec']="MasterCtrl/createRecords";


$route['listboysingirlsschool']="Validation/listofgenderschools";
$route['listgirlsinboysschool']="Validation/listofgenderschools";
$route['ageOutofRange']="Validation/listofgenderschools";
$route['mediumNotMatching']="Validation/listofgenderschools";
$route['classRoomsNotEqualStageLevel']="Validation/listofgenderschools";
$route['classRoomsNotEqualConditions']="Validation/listofgenderschools";



$route['blankAadhar']="Validation/studentswithemptys";
$route['blankMedium']="Validation/studentswithemptys";
$route['blankGroup']="Validation/studentswithemptys";
$route['blankPhoto']="Validation/studentswithemptys";
$route['blankBloodGroup']="Validation/studentswithemptys";

$route['dojlessdob']="Validation/staffvalidationscheck";
$route['dojlessdopsj']="Validation/staffvalidationscheck";
$route['studiedupto']="Validation/staffvalidationscheck";
$route['less18']="Validation/staffvalidationscheck";
$route['great58']="Validation/staffvalidationscheck";
$route['sub1eqsub2']="Validation/staffvalidationscheck";
$route['misstraining']="Validation/staffvalidationscheck";
$route['classtaught']="Validation/staffvalidationscheck";
$route['estdYearValidation']="Validation/schoolDetailsValidation";

$route['primaryNullValidation']="Validation/schoolDetailsValidation";
$route['upperPrimaryNullValidation']="Validation/schoolDetailsValidation";
$route['secondaryNullValidation']="Validation/schoolDetailsValidation";
$route['higherSecondaryNullValidation']="Validation/schoolDetailsValidation";

$route['upgPriToUPriValidation']="Validation/schoolDetailsValidation";
$route['upgUPriToSecValidation']="Validation/schoolDetailsValidation";
$route['upgSecToHSecValidation']="Validation/schoolDetailsValidation";
$route['distToPrimary']="Validation/schoolDetailsValidation";
$route['distToUpPrimary']="Validation/schoolDetailsValidation";
$route['distToSec']="Validation/schoolDetailsValidation";
$route['distToHSec']="Validation/schoolDetailsValidation";
$route['smcIFSCValid']="Validation/schoolDetailsValidation";
$route['smdcIFSCValid']="Validation/schoolDetailsValidation";

$route['ppriInstrDaysVaild']="Validation/schoolDetailsValidation";
$route['primInstrDaysVaild']="Validation/schoolDetailsValidation";
$route['middInstrDaysVaild']="Validation/schoolDetailsValidation";
$route['highInstrDaysVaild']="Validation/schoolDetailsValidation";
$route['hsecInstrDaysVaild']="Validation/schoolDetailsValidation";
$route['specInstrDaysVaild']="Validation/schoolDetailsValidation";

$route['ppriStdyHRSVaild']="Validation/schoolDetailsValidation";
$route['primStdyHRSVaild']="Validation/schoolDetailsValidation";
$route['middStdyHRSVaild']="Validation/schoolDetailsValidation";
$route['highStdyHRSVaild']="Validation/schoolDetailsValidation";
$route['hsecStdyHRSVaild']="Validation/schoolDetailsValidation";
$route['specStdyHRSVaild']="Validation/schoolDetailsValidation";

$route['ppriTeachHRSVaild']="Validation/schoolDetailsValidation";
$route['primTeachHRSVaild']="Validation/schoolDetailsValidation";
$route['middTeachHRSVaild']="Validation/schoolDetailsValidation";
$route['highTeachHRSVaild']="Validation/schoolDetailsValidation";
$route['hsecTeachHRSVaild']="Validation/schoolDetailsValidation";
$route['specTeachHRSVaild']="Validation/schoolDetailsValidation";

$route['boysToiledINGirlsSchools']="Validation/schoolDetailsValidation";
$route['girlsToiledINBoysSchools']="Validation/schoolDetailsValidation";

$route['libBooksHighNERTBooks']="Validation/schoolDetailsValidation";
$route['bookBankHighNERTBooks']="Validation/schoolDetailsValidation";


$route['updateStudentAadhar']="Validation/updateDesiredDataPosted";
$route['updateStudentBlankMedium']="Validation/updateDesiredDataPosted";
$route['updateStudentBlankGroup']="Validation/updateDesiredDataPosted";
$route['updateStudentBlankBloodGroup']="Validation/updateDesiredDataPosted";

/***********************************************
			End
***********************************************/

$route['incenfac']='Schools_home/incenFacChildren'; 
$route['schlproPDF']='Schools_home/schlProPDF';


/**SCHOLASTIC ACHIEVEMENT OF CHILDREN starts here by wesley**/

$route['schlProfLangMedi'] = "Schools_home/schlprof_langu_medi";

/**Scholastic 1 to 8th Starts**/

$route['StudentmarkInsert_1_To_8']='Home/emis_school_insert_1_to_8';

/**Scholastic 1 to 8th Ends**/

/**Scholastic 9th and 10th Starts**/

$route['StudentmarkInsert_9_10']='School_register/studentmark_insert_9_10';
$route['StudentmarkUpdate_9_10']='School_register/studentmark_update_9_10';

/**Scholastic 9th and 10th Ends**/

/**SCHOLASTIC ACHIEVEMENT OF CHILDREN ends here by wesley**/

/**PINDICS HM EVAL starts here by wesley **/
$route['PINDICSHMEval']='Udise_staff/pindics_hm_eval';
$route['PINDICSSingleTeachr']='Udise_staff/pindics_single_teachr_data';
$route['PINDICSHMEvalInsert']='Udise_staff/pindics_hm_eval_insert';
/**PINDICS HM EVAL ends here by wesley **/

/**Learning Outcome API's starts here by wesley**/
$route['StartExam']='LO_exam/start_exam';
$route['QuestionSet']='LO_exam/quest_set';
$route['InsertAnswer']='LO_exam/insert_answer';
$route['FinalSubmit']='LO_exam/final_submit';
/**Learning Outcome API's ends here by wesley**/

/** Contribution API Routes start here created by nirmal */
$route['LoadSchoolsKTContributions'] = 'Schools_ktcontributions/LoadSchoolsLoginKTContributionsDetails';
$route['LoadTeacherSubjects']='Schools_ktcontributions/LoadSubjects';

//Contribution for HM
$route['LoadSchoolsContributions']='Schools_contributions/LoadSchoolsContributions';
$route['LoadSchoolRequirementsUpdates']='Schools_requirements/LoadSchoolRequirementsUpdates';

//school requirements 
$route['LoadSchoolRequirements'] = 'Schools_requirements/School_Requirements';
$route['AddNewNeedSchoolRequirements'] = 'Schools_requirements/AddNewNeedSchoolRequirements';

//school detials by req_id
$route['LoadSchoolRequirementWiseDetails']='Schools_requirements/LoadSchoolsByRequirementId';

//save school_req details
$route['SaveSchoolRequirements']='Schools_requirements/SaveSchoolRequirements';

//update school_re0q_details
$route['PutSchoolsRequirements']='Schools_requirements/PutSchoolsRequirements';

//save school_cont_details
$route['SaveSchoolContributions'] ='Schools_contributions/SaveSchoolContributions';

//contribution  wise details
$route['LoadContributionWiseDetails']='Schools_contributions/LoadContributionWiseDetails';
$route['LoadCsrContributions']='Schools_contributions/LoadCsrContributions';

//contribution against school
$route['LoadSchoolGetContribution'] ='Schools_contributions/LoadSchoolGetContribution';

//contribution edit action
$route['PutSchoolsContributions'] = 'Schools_contributions/PutSchoolsContributions';

//update child details of schools
$route['PutContributionChildDetails']='Schools_contributions/PutContributionChildDetails';
//for save
$route['SaveSchoolRequirementWiseDetails']='Schools_requirements/SaveSchoolRequirementWiseDetails';

//school Dashboard over requirements and recieved amount
$route['SchoolDashboardCsrDetails'] = 'Schools_requirements/SchoolDashboardCsrDetails';

$route['DeleteCsrUpdateDetails']='Schools_requirements/DeleteCsrUpdateDetails';
//CSRADMIN by nirmal

//Dashboard
 $route['LoadcsrAdminDashboard']='Csr_admin/CsrDashboard';
 //csr user page
 $route['CsrUsersList']='Csr_admin/CsrUsersListPage';
 //csr user contribution wise
 $route['CsrUsersContributionWise'] ='Csr_admin/CsrUsersContributionWiseDetails';

 //school needs Csr 
 $route['SchoolNeedsCsr'] = 'Csr_admin/SchoolNeedsCsrList';
 $route['SchoolNeedsCsrDistrictWise']='Csr_admin/SchoolNeedsCsrDistrictWise';
 $route['SchoolNeedsCsrBlockWise']='Csr_admin/SchoolNeedsCsrBlockWise';

 //class 7 splash score 2019
 //$route['GetSlasClass7Report'] = 'Schools_requirements/get_slas_class7_report';
  $route['GetSlasClass7Report'] = 'Home/get_slas_class7_report';

 //Scale Register
 $route['GetScaleRegister']='Udise_staff/GetAllScaleRegister';
 $route['SaveScaleRegister'] ='Udise_staff/SaveScaleRegister';
 $route['PutScaleRegister'] = 'Udise_staff/PutScaleRegister';
 $route['DeleteScaleRegister']='Udise_staff/DeleteScaleRegister';
 /** Contribution Routes Ends Here */
 
 /** State Attendence Report Tamil */
  $route['GetAttendanceDetails']='State/attendance_details';
  $route['GetAttendanceDetailsDistrict']='State/attendance_blockwise_details';
  
  $route['GetStudentsAttendanceDetailsBlock']='State/attendance_schoolwise_details';
 
  $route['GetStudentsAttendanceClasswise']='State/attendance_student_classwise';
  $route['GetStudentsAttendanceSectionwise']='State/attendance_sectionwise_details';
  
  
  $route['GetTeacherAttendanceDetailsBlock']='State/attendance_teacher_schoolwise';
  $route['GetTeacherAttendanceClasswise']='State/attendance_teacher_classwise';

  $route['GetStudentAttendanceSearch']='State/student_attendance_search';
  $route['GetTeacherAttendanceSearch']='State/teacher_attendance_search';
 
//  ********************nirmal
//State for student by 
 $route['EmisNoonMealsReport'] ='State/emis_state_district_noonmeal_count_details';
 $route['EmisNoonMealsReportByDistrictWise']='State/meal_school_distic_based_count_details';
 $route['MealSchoolEligibleStudCount']='State/meal_school_eligible_stud_count';

 //state for CWSN Students Liast
 $route['CWSNStudentReportDistrictwise']='State/emis_student_disablity_list';
 $route['CWSNStudentReportBlockWise']='State/emis_student_disability_blockwise';
  $route['CWSNStudentReportSchoolWise']='State/emis_student_disability_schoolwise';

  //RTE REPORT 
  $route['RTEStudentReport'] ='State/emis_student_RTE_list';
  $route['RTEStudentReportDistrictWise']='State/get_RTE_district';
  //RTE 2019
  $route['RTEStudentReport2019']='State/emis_student_RTE_list_2019';
  $route['RTEStudentReportSchoolWise2019']='State/get_RTE_school_2019';

  //aadhar enrolemnt report
  $route['AadharEnrolementdetails'] = 'State/emis_state_district_aadhar_count';
  $route['AadharSchoolDistrictBasedCount']='State/aadhar_school_distic_based_count_details';
  $route['AadharSchoolNotinCountDetails']='State/aadhar_school_notin_count_details';
  

//for Schools and sections
  $route['DistrictSchoolWiseClassSection'] = 'State/district_schoolwise_class_section';
  $route['SchoolWiseClassSection'] = 'State/schoolwise_class_section';
  $route['SchoolClassSection']= 'State/school_class_section';
 
  $route['DistrictSchoolWiseHigherSection']='State/district_schoolwise_higher_section';
  $route['SchoolClassHigherSection']='State/school_class_higher_section';
  $route['SchoolHigherClassSection']='State/school_higher_class_section';

   //for pindics report
   $route['EmisStatePindicsReport'] ='State/emis_state_pindics_report';


//BRTE list
   $route['BRTEList']='State/BRTE_List';
   $route['BRTEListTeacher']='State/BRTE_List_teacher';
   $route['BRTEAssignedSchool']='State/BRTE_assigned_school';

//Slas Report
   //school Wise
   $route['SlasReportschlDist'] = 'State/slas_report_schl_dist';
   $route['SlasReportSchlBlk']='State/slas_report_schl_blk';
   $route['SlasReportSchlWiseGet']='State/slas_report_schl_wise';
   $route['SlasReportCateDist']='State/slas_report_cate_dist';
   $route['SlasReportManageDist']='State/slas_report_mana_dist';

//Dist Wise
   $route['StudentSlasReportDist']='State/slas_report_dist';
   $route['StudentSlasReportBlk']="State/slas_report_blk";
   $route['StudentSlasReportSchl']="State/slas_report_schl";

   //state  laptopdistribution 
  $route['stlaptopdistrlist'] = 'State/emis_computerindent';
  $route['stlaptopdistrdistwiselist'] = 'State/state_laptop_district';
  $route['stlaptopdistrschwiselist'] = 'State/schoolwise_laptop_distlist';
  
  //School Profile Report

  $route['SchoolProfileVerificationDistrictWise'] ='State/school_profile_verification_district_wise';
  
  $route['SchoolProfileVerificationDistrict'] ='State/school_profile_verification_district';

  $route['SchoolLandVerificationDistrictWise'] ='State/school_land_verification_district_wise';
  $route['SchoolLandVerificationDistrict']='State/school_land_verification_district';

  //WAITING LIST $route['SchoolLabDetails']='State/school_lab_details';
 

 $route['SchoolCommitteeVerificationDistrictWise']='State/school_committee_verification_district_wise';
 $route['SchoolCommitteeVerificationDistrict']='State/school_committee_verification_district';

 /********************************************************
	Building,Wash,Land Reports changes by Magesh
*********************************************************/
 $route['schoolbuildinglist']='State/schoolbuildinglist';
 $route['schoolwashlist']='State/schoolsanitationlist';
 


 $route['SchoolSanitationVerificationDistrict']='State/school_sanitation_verification_district';
 
 
 
 $route['EmisStateSchoolBuildingSchool']='State/get_emis_state_school_building_school';

 $route['SchoolNatureDetails']='State/school_nature_details';


// $route['SchoolLabDetails']='State/school_lab_details';

 
//State Special Cash Incentive Report
  $route['StateDistrictSpecialCash'] = 'State/state_district_special_cash';
  $route['SchoolwiseSpecialCash']  = 'State/schoolwise_special_cash';
  $route['SchoolNeedsCSR'] = 'State/school_needs_csr';

  //Private Schools
  $route['RenewalStateDistrict']='State/renewal_state_district';
  $route['GetRenewalStateBlock']='State/get_renewal_state_block';
  $route['GetRenewalStateSchool']='State/get_renewal_state_school';

 

  $route['SchoolUnrecognizedList'] ='State/emis_school_unrecognized_list';
  $route['SchoolUnrecognizedBlockList'] ='State/emis_school_unrecognized_block';

 $route['StudentRTEAllocation']='State/emis_student_RTE_allocation';
 $route['RTESchoolAllocation']='State/get_RTE_school_allocation';

  //END

  //COMMUNITY REPORT
  $route['StudCommunityReport'] = 'State/stud_community_report';
  $route['StudCommunityReportDist']='State/stud_community_report_dist';
  $route['StudCommunityReportBlk']='State/stud_community_report_blk';
  $route['StudCommunityReportSchl'] ='State/stud_community_report_schl';

  //STAFF POST 5 YRS
  $route['EmisTeacherGt5years']='State/emis_teacher_gt_5years';
  $route['EmisTeacherGt5yearsSchool']='State/emis_teacher_gt_5years_school';

  $route['EmisStaffStudDistrictDetails']='State/emis_staff_stud_district_details';
  $route['EmisStaffStudDistSchoolDetails']="State/emis_staff_stud_dist_school_details";
  
  $route['EmisSchoolNeedsCsrById']="Schools_requirements/emis_school_needs_csr_by_id";
  $route['EmisSchoolNeedsCsr']="Schools_requirements/emis_school_needs_csr";
  $route['EmisDelSchoolCsr']="Schools_requirements/emis_del_school_csr";
  /*  Created by tamil School Profile Edit in ceo level */
  $route['UpdateSchoolprofile']='Ceo_District/school_profile_update';
  $route['SaveupSchoolprofile']='Ceo_District/school_profile_saveup';
  $route['SchoolProfileList']='Ceo_District/emis_district_schools_list';
  $route['SchoolProfileApprovalListDW']='State/emis_district_schools_list';
  $route['SchoolProfileApprovalList']='State/emis_state_schools_list';
  $route['SchoolProfileApproval']='State/state_schools_approval'; 
  $route['SchoolProfileRejection']='State/state_schools_rejection'; 
  $route['GetHabitation']='Ceo_District/habitation_list';
   /** get block school api by tamilbala**/
   $route['Blocklist_Schoollist']='Ceo_District/blocklist_schoollist';
   $route['School_Teacherlist']='Ceo_District/teacherlist';
    $route['School_Teacherpindics']='Ceo_District/teacherpindics';
/** get block school api by tamilbala**/
  /**School summary api by wesley**/
  $route['schoolSummary']='Schools_home/school_summary';
  /**School summary api by wesley**/
  
  /**School Profile completion status api by Tamilbala**/
  
  $route['Profile_Completion']='Ceo_District/profile_status_schoollist_distwise';
  $route['Profile_Completion_State']='State/emis_school_profile_completed';/* statewise */
  $route['Profile_Completion_Block']='State/profile_status_blockwise';/* statewise */
  $route['Profile_Completion_Schoolwise']='State/profile_status_schoolkwise';/* statewise */
  /**School Profile completion status api by Tamilbala**/
  
  

  /**School Password Resend api by wesley starts here */
  $route['schlPswdResend']='Schools_home/schl_pswd_resend';
  $route['blocklist']='Schools_home/blocklist';
  $route['schlDetails']='Schools_home/emis_blockwise_school';
  /**School Password Resend api by wesley ends here */

  /**UDISE declaration confimation by HM,CRC,BEO and CEO api by wesley starts here**/
  $route['hmUdiseConf']='Schools_home/hm_udise_conf';   /*HM,CRC,BEO and CEO validation have this same api params only diff*/
  $route['crcSchlList']='Schools_home/crc_schl_list';
  $route['udiseValidatorDet']='Schools_home/udise_vali_det';
  /**UDISE declaration confimation by HM,CRC,BEO and CEO api by wesley ends here**/

  /**Blocklist for CRC in UDISE validation starts here by wesley **/
  $route['crcBlocklist']='Schools_home/crc_block_list';  /**use this same api for brte blocklist**/  
  /**Blocklist for CRC in UDISE validation ends here by wesley **/

  /**RTE Intake capacity of schools by CEO api by wesley starts here**/
  $route['rTEIntakeCEO']='Ceo_District/RTE_districtwise_school_details';
  $route['rTESchlDataSave']='Ceo_District/save_RTE_school_list';
  /**RTE Intake capacity of schools by CEO api by wesley ends here**/

  /**School UDISE status report by wesley starts here**/
  $route['udiseStatus']='State/school_udise_status_report';
  //$route['udiseCountState']='State/school_udise_count_rep';
  /**School UDISE status report by wesley ends here**/

  $route['studmigrationreport1']='State/district_migration_details';
  $route['studmigrationreport2']='State/student_migration_details';

  /**Landing page for Teachers, BRTE api by wesley starts here**/
  $route['teacherDetails']='Schools_home/teacher_data';
  /**Landing page for Teachers, BRTE api by wesley ends here**/

  $route['beo_assignment']='State/beo_assignment';
  $route['beo_assignment_save']='State/deosubmit';

  $route['pt_staff_paided_list']='Udise_staff/pt_teacher_list';
  $route['pt_staff_paided_dtls_save']='Udise_staff/pt_teacher_dtls_save';
  $route['pt_staff_paided_report']='Udise_staff/pt_teacher_report';

  //RTE Reports By Nirmal
  $route['RTE_ApplicationStatus']='RTE/RTE_ApplicationStatus';
  $route['RTE_TypeWiseApplication']='RTE/RTE_TypeWiseApplication';
  $route['RTE_TypeWiseApplicationsss']='RTE/RTE_TypeWiseApplicationsss';
  $route['RTEStudentEligibleList']='RTE/RTEStudentData_Retrive';
  $route['RTEAllotStatus']='RTE/RTEAllot_Status';
  $route['RTEDCSchoolList']='RTE/RTE_DC_SchoolList';


  //RTE Studednt Verify Bu=y Nirmal
  $route['RTE_Verification_list']='RTE/RTE_Application_Verification';
  $route['Update_App_verification']='RTE/RTE_Update_App_verification';

  //ATSL Reprts By Nirmal
  
  $route['ATSLTopicMediumWise']='State/ATSL_Topic_MediumWise';
  $route['ATSLSchoolPreviousReport']='State/ATSL_School_Previous_Report';
 $route['ATSLStudentWiseReport']='State/ATSL_StudentWiseReport';
  
  

  // (for district Login)
  $route['stfTransferReqtList'] = "Udise_staff/stf_approval_request";
  $route['stfTransferReqtRejection'] = "Udise_staff/stf_approval_rejection";
  $route['stfTransferReqtApprovals'] = "Udise_staff/stf_approvals";

  // (for admin Login - Timesheet Module)
  $route['taskDtlsList'] = "Home/task_dtls";
  $route['taskDtlsSave'] = "Home/update_task_dtls";
  $route['taskDtlsDelete'] = "Home/delete_task_dtls";
  // (for admin Login - Project Master Module)
  $route['projDtlsList'] = "Home/proj_dtls";
  $route['projDtlsSave'] = "Home/update_proj_dtls";
  $route['projDtlsDelete'] = "Home/delete_proj_dtls";

  $route['summaryMarks'] = "Schools_home/summary_marks";

//FOr Login User and Admin Project Report By Nirmal
  $route['ResourceDropdown']='State/Resource_dropdown';
  $route['AllProjectSummary']='State/All_Project_Summary';
  $route['ActivitywiseReport']='State/Activity_wise_Report';
  $route['DatewiseReport']='State/Date_wise_Report';

  //FOr State Login Teacher Taught Class By NIrmal 
  $route['TeachersByClassTaught']='State/Teachers_byClass_Taught';

  //For PARTIME TEACHER REPORT State and CEO LOGIN By Nirmal
  $route['PartimeTeacherReport']='State/Partime_Teacher_RPRT';

  //For Project Module for Type ID 20 and 21 done by nirmal
  $route['SaveElearnContent']='State/Save_Elearn_content';
  $route['GetElearnContent']='State/Get_Elearn_Content';
  $route['DropdownSubjectsChapter']='State/Get_Dropdown_Subjects_Chapter';
  $route['ELearnContentReport']='State/E_LearnContentReport';


//DOUBT

  $route['FeedbackElearnContent']='State/FeedbackElearn_Content';
  $route['FeedbackSummary']='State/Feedback_Summary';
  $route['StudentFeedbackList']='State/Student_Feedback_List';
   $route['TeacherFeedbackList']='State/Teacher_Feedback_List';
   $route['RetreiveStudTeacher']='State/Retreive_stud_teacher';

//EMD


  $route['GetExternalOrgDocs']='State/Get_ExternalOrg_Docs';

  //End by NIrmal
  
  $route['staffDesignationList'] = 'Udise_staff/teacher_type';
  $route['searchStaffDetails'] = 'Udise_staff/staff_search';
  $route['searchSchoolDetails'] = 'State/school_search';
  $route['searchMasterDetails'] = "State/school_search_master_list";

//For Statistcts Count By Nirmal
  $route['StatisticsSchoolCount']='State/Statistics_School_Count';
  $route['StatisticsStudentCount']='State/Statistics_Student_Count';
  $route['StatisticsTeacherCount']='State/Statistics_Teacher_Count';
  $route['StatisticsClassWiseCount']='State/Statistics_ClassWise_Count';
// END by Nirmal

  /**Student Absentees in exam api by wesley**/
    /**12th**/
    $route['StuExamAbsChk']='Student/stu_exam_absent_check';
    $route['StuExamAbsRes']='Student/stu_exam_response';
    /**12th**/

    /**10th**/
    $route['StuExamAbsChkTenth']='Student/stu_exam_absent_check_tenth';
    $route['StuExamAbsResTenth']='Student/stu_exam_response_tenth';
    $route['EMISStuIDValidatn']='Student/EMIS_stu_id_validatn'; 
    /**10th**/
    /**Student Absentees in exam api by wesley**/


//For UDISE+ Verification Status - District & CEO Login By Nirmal
 $route['UdiseVerficationStatusReport']='State/Udise_Verfication_Status_Report';

 //For Teachers by Professional and Academic Qualifcation Report Done By Nirmal
 $route['TeachersByAcademicQualification']='State/TeachersBy_Academic_Qualification';
 $route['TeachersByProfQualification'] ='State/TeachersBy_Prof_Qualification'; 

//FOr Bank Detials API By Nirmal
 $route['DistBankDropdownList']='State/DistBank_Dropdown_List';
 $route['SchlBankDropdownList']='State/SchlBank_Dropdown_List';
  $route['SaveSchoolBankDet'] ='State/SaveSchool_Bank_Det'; 

  //For Nearset Govt school Report By Nirmal
 $route['NearestSchoolReport'] ='State/Nearest_School_Report'; 
 $route['SaveNearestSchoolReport'] ='State/saveNearestSchoolsDtls';
 //For IED Students Report By Nirmal
 $route['IEDStudentsReport']='Student/IED_Students_Report';
 $route['EditIEDStudents']='Student/Edit_IED_Students';
 $route['DiffAbledDet']='Student/Diff_Abled_Det';
 $route['RetrieveIfscBankdet']='Student/Retrieve_Ifsc_Bank_det';
 $route['GetIEDStudents']='Student/Get_IEDStudents';

 //For NO Reports By Nirmal

 $route['NoEnrolmentReport']='State/No_Enrolment_report';
 $route['NoTeachersReport']='State/No_Teachers_report';
 $route['NoRampReport']='State/No_Ramp_report';
 $route['NoDrinkWaterReport']='State/No_DrinkWater_report';
 $route['NoGirlsTioletReport']='State/No_GirlsTiolet_report';
 $route['NoBysTioletReport']='State/No_BysTiolet_report';
 $route['NoSMCReport']='State/No_SMC_report';
 $route['NoSMDCReport']='State/No_SMDC_report';
 $route['NoPTAReport']='State/No_PTA_report';
 $route['NoElectricity']='State/No_Electricity';

//IED Teachers Report By Nirmal
 $route['IEDTeachersReport'] = 'State/IED_Teachers_Report';
 $route['SAveIEDTeachersReport'] = 'State/Save_IED_Teachers';
 $route['GetIEDTeachers']='State/Get_IED_Teacher';

 //BT Teachers By Nirmal
 $route['BTTeachersBySubject']='State/BT_Teachersby_Subject'; 

 //Teacher Assigment School Level By Nirmal
 $route['SchoolTeacherAssignment']='State/School_Teacher_Assignment'; 
 $route['RetrieveTeacherAssign']='State/Retrieve_TeacherAssign';
 $route['UpdateTeacherAssign'] ='State/Update_Teacher_Assign';
 $route['ReportTeacherAssign']='State/Report_Teacher_Assign';
 $route['SchoolDropdownForCenters']='State/SchoolDropdownFor_Centers';

 //Staff Fixation Bu Nirmal
 $route['StaffFixationRprt']='State/Staff_Fixation';

 $route['TeachersTrainingDet']='Udise_staff/Teachers_Training_Det';
 $route['cashIncentiveReport']='State/special_cash_incentive';
 

//Udise Verifications Reports By Nirmal
 $route['UdiseVerification1']='State/Udise_Verification_1';
 $route['UdiseVerification2']='State/Udise_Verification_2';
 $route['UdiseVerification3']='State/Udise_Verification_3';
 $route['UdiseVerification4']='State/Udise_Verification_4';
 $route['UdiseVerification5']='State/Udise_Verification_5';
 $route['UdiseVerification6']='State/Udise_Verification_6';
 $route['UdiseVerification7']='State/Udise_Verification_7';

 /**Udise + student class wise strength and number of teaching and non teaching staff starts here**/
 $route['StuTeachNonTeachStrngth']='Schools_home/stuTeachNonTeachStrngth';
 /**Udise + student class wise strength and number of teaching and non teaching staff ends here**/



 $route['StudentsTeacherData']='State/Students_Teacher_Data';


  /**API's using school_id starts here by wesley**/
  $route['school1']='Schools_home/school_1';
  $route['school2']='Schools_home/school_2';
  $route['school3']='Schools_home/school_3';
  $route['school4']='Schools_home/school_4';
  $route['school5']='Schools_home/school_5';
 
  $route['school6']='Schools_home/school_6';
  $route['school7']='Schools_home/school_7';
  
  $route['school8']='Schools_home/school_8';
  /**API's using school_id ends here by wesley**/

  /**New School Registration API's starts here by wesley**/
  $route['schlReg']='Newschool/newSchoolCreate';
  $route['schlRegLogin']='Newschool/newSchoolLogin';
  $route['schlReg1']='Newschool/formsubmit';
  // $route['schlReg2']='Newschool/formsubmit';
  $route['schlReg2']='Newschool/schlReg2';
  //$route['schlReg3']='Newschool/formsubmit';
  $route['schlReg3']='Newschool/schlregthree';
  $route['schlReg4']='Newschool/finalsubmit';
  $route['commonDrpdwn']='Registration/getalldetails';
  $route['docuplddata']='Schools_home/docuplddata';
  $route['ordercpydata']='Schools_home/orderCopyData';
  /**New School Registration API's ends here by wesley**/

  $route['newSchlDtls']='Newschool/newschldtls';
  $route['newSchlDocDtls']='Newschool/newschldocdtls';
  /**New School Approval api by wesley starts here**/
  $route['newSchlAppList']='Newschool/newschlapplist';

  $route['formForward']='Newschool/formforward';
  /**New School Approval api by wesley ends here**/


//BY API NIMRAL

  //Get dropdown
  //FOR CLASS,SECTION,MEDIUM
    $route['GetSchoolSectionDetails']='Udise_staff/Get_School_Section_Details';
     $route['GetSectionMediumDetails']='Udise_staff/Get_Section_Medium_Details';
     //COMMON API END


     //save adn edit
     $route['SaveHomeWork']='Udise_staff/Save_Home_Work';

     //Listing 
     $route['GetHomeWorkdetails']='Udise_staff/home_work_list';

     //delet
     $route['deletehomework']='Udise_staff/home_work_delete';

     //END

   
  
 //END By Nirmal
    
     $route['flashNEWSmaster'] = "State/flash_news";
     $route['flashNEWSsave'] = "State/save_flash_news";
     $route['flashSMSmaster'] = "State/flash_SMS";
     $route['allblockname'] = "State/all_block_name";
     $route['SchoolMaster'] ='State/School_Master';    

//By Nirmal

  //Reports

    $route['Step1_NumberofStudents']='State/Number_of_Students';
    $route['Step2_AmountConfirmation']='State/Amount_Confirmation';
    $route['Step3_ReimbursementStatus']='State/Reimbursement_Status';
 
 //Save or Update Data
    $route['SaveConfirmStep1']='State/Save_Step_1';
    $route['UpdateConfirmStep2']='State/Update_Step_2';
    
/**API's starts here by wesley**/
$route['NPSchl']='Schools_home/NandPSchool';
$route['MatricSchl']='Schools_home/MatricSchl';
$route['CBSENOC']='Schools_home/CBSENOC';

/**Pending with CEO(CEO,District and State)**/
$route['CBSENOCDrilldownCEO']='Schools_home/CBSENOCDrilldownCEO';
/**Pending with CEO(CEO,District and State)**/

/**Pending with Director within District(CEO,District and State)**/
$route['CBSENOCDrilldownDir']='Schools_home/CBSENOCDrilldownDir';
/**Pending with Director within District(CEO,District and State)**/

/**Pending with Director Districtwise(State)**/
$route['CBSENOCDrilldownDirState']='Schools_home/CBSENOCDrilldownDirState';
/**Pending with Director Districtwise(State)**/

/**Management Application API starts here by wesley**/

/**NOC registration**/
$route['MngmentAppli']='Schools_home/MngmentAppli';
$route['MngmentAppliNOC']='Schools_home/MngmentAppliNoc';
/**NOC registration**/

/**Management Application API ends here by wesley**/
/**API's ends here by wesley**/         


// Question Bank APi's done By Nirmal

$route['QuesBnkClassList']='State/QuestionBank_CLassList';
$route['QuesBankSubjectList']='State/QuestionBank_SubjectList';
$route['SaveQuestionBank']='State/Save_quest_bank';
$route['DeleteQuestionBnk']='State/Delete_ques_bank';
//END BY NIRMAL

$route['NOCwithCBSEDtls']='Schools_home/dtls_nocwithcbse';
$route['NOCwithCBSEReport']='Schools_home/rpt_nocwithcbse';
$route['NOCwithCBSESchoolWiseDtls']='Schools_home/school_nocwithcbse';
$route['NOCwithCBSESaveChecklistDtls']='Schools_home/save_checklist_nocwithcbse';
$route['NOCwithCBSESaveSchoolDtls']='Schools_home/save_schoolwise_nocwithcbse';
$route['NOCwithCBSESaveDocDtls']='Schools_home/docdtls_nocwithcbse';
$route['NOCwithCBSECeoListing']='Schools_home/ceo_nocwithcbse';

/**CBSE NOC Approval by CEO starts here(wesley)**/
$route['NOCCBSEFrwdRej']='Schools_home/noccbse_frwd_rej';
$route['NOCCBSEApprvl']='Schools_home/noccbse_apprvl';
/**CBSE NOC Approval by CEO ends here(wesley)**/

$route['SaveEclassDownloadStatus']='Schools_home/save_students_eclass_download_status';
$route['BatchMaster']='Schools_home/batch_master_for_eclass';
$route['SectionGroup']='Schools_home/section_group_for_eclass';
$route['EclassDownloadStsStudList']='Schools_home/students_status_for_eclass';


/* API for NOC Approval status and listing and doiwnlad  By nirmal*/

$route['ApprovalDocsBySchool']='Schools_home/Approval_Docs_BySchool';
$route['ApprovalSchoolStatus']='Schools_home/Approval_School_Status';
$route['SchoolDownloadOrder']='Schools_home/School_DownloadOrder'; 
$route['SchoolDownloadOrderCondition']='Schools_home/School_DownloadOrder_Condition'; 
$route['SchlAppliStage3']='Schools_home/SchlAppli_Stage3';
$route['CeoSchoolAppliList']='Schools_home/Ceo_SchoolAppli_List';

$route['GetApiByAPPID']='Schools_home/GetApiByAPP_ID';


/* End By Nirmal */

/* API for New School Module done by SAve adn retrival By NIRMAL*/
$route['GetAppDocRemaksDet']='Schools_home/GetAppDocRemaks_Det';
$route['SaveAppDocRemaksDet']='Schools_home/SaveAppDocRemaks_Det';
//END

//API FOR STUDENT WRONG ENTRY API By NIrmal
$route['GetStudentWrongEntry']='Schools_home/GetStudentWrong_Entry';


//END

//API FOR FIT INDIA BY NIRMAL
$route['SaveFitIndia']='Schools_home/Save_Fit_India';
$route['FitIndiaReport']='Schools_home/Fit_India_Report';
$route['GetFitIndiaDet']='Schools_home/Get_Fit_India_Det';

$route['GetListPromoteStudents']='Udise_staff/Get_List_Promote_Students';
$route['UpdatePromoteStudents']='Udise_staff/Update_Promote_Students';

$route['e-learn/textbook']='Schools_home/elearn';
$route['e-learn/storybook']='Schools_home/elearn';
$route['e-learn/classification']='Schools_home/elearn';

$route['e-learn/test']='Schools_home/test';

//END

/**RTE State level and District level Report by wesley starts here**/
$route['RTEDayWiseRep']='State/RTE_DayWise_Rep';
$route['RTEPswdRetrive']='State/RTE_pswd';
/**RTE State level and District level Report by wesley ends here**/



//Start by Nirmal for Medium List and Ssave
$route['GetMediumList']='State/GetMedium_List';
$route['MediumDropdown']='State/Medium_Dropdown';
$route['AddNeweMedium']='State/AddNewe_Medium';
$route['DeleteMedium']='State/Delete_Medium';

$route['SchoolClassMedium']='State/School_class_medium';

$route['SchoolClassMedium1']='State/School_class_medium1';

/**Diksha Login API by wesley starts here**/
$route['dikshaLogin']='Home/diksha_login';
/**Diksha Login API by wesley ends here**/

/** Staff - call tracking */
$route['TeacherDropdown']="Udise_staff/teacher_dropdown";
$route['stfRole']="Udise_staff/stf_role";
$route['CoOrdinator']="Udise_staff/call_tree_track";
$route['CoOrdinatorUpdate']="Udise_staff/co_ordinator_update";
$route['CallSupporter']="Udise_staff/call_tree_track";
$route['CallSupporterUpdate']="Udise_staff/call_supporter_update";

/** students Club Participation List */
$route['studClubParticipation'] = "Student/students_club_participation";

//End

/**  CWSN & KGBV MODULE API*/
$route['UpdateTrackingDetails'] = "Student/UpdateTracking_Details";
$route['StudentDetailsTraked']='Student/StudentDetails_Traked';
$route['BenefitBasedDropdown']='Student/BenefitBased_Dropdown';

// END


$route['studCOVIDSchlMapUpdation'] = "Student/students_covid_school_map_updation";
$route['studCOVIDSchlMap'] = "Student/students_covid_school_map";
$route['studCOVIDSchlMap2'] = "Schools_home/kgbv_cwsn_students_school_covid_map";
$route['distGovtschools'] = "Schools_home/district_schools";

//End

/** KGBV & CWSN class & sec list starts here by wesley**/
$route['kgbvcwsnClassSection'] = "Schools_home/kgbv_cwsn_Class_Section";
/** KGBV & CWSN class list ends here by wesley**/

/**KGBV & CWSN student's assigned data for School Login starts here by wesley **/
$route['kgbvcwsnStudMappedSchl'] = "Schools_home/kgbv_cwsn_Stud_Map_Schl";
$route['kgbvcwsnmappedStudDetls'] = "Schools_home/kgbv_cwsn_maped_Stud_Detls";
/**KGBV & CWSN student's assigned data for School Login starts here by wesley **/

$route['rteReport'] = "RTE/rte_report";
/**No of RTE seats in School starts here by wesley**/
$route['rteSeats'] = "RTE/rte_seats";
/**No of RTE seats in School ends here by wesley**/


/** Districtwise Block and School Lists  (ZONAL APIS)By NIrmal**/

//BLOCKS AND SCHOOLS LIST APIS
$route['BlockList'] = "Ceo_District/blocklist";
$route['schoolDistrictWise'] = "Ceo_District/schoollist_by_DistrictWise";

//ZONAL SCHOOLS APIS
$route['SaveZonalSchools'] = "Ceo_District/SaveZonal_Schools";
$route['GetZonalSchools'] = "Ceo_District/GetZonal_Schools";
$route['ZonalSchoolByBlock']="Ceo_District/ZonalSchool_ByBlock";
$route['ZonalAllByBlock']="Ceo_District/ZonalAll_ByBlock";
$route['deleteZonalSchools']="Ceo_District/delete_ZonalSchools";
$route['ZonalBasedSchoolTypes']="Ceo_District/ZonalBased_SchoolTypes";
$route['BlockWIseZonalSubzonalCount']="Ceo_District/BlockWIseZonalSubzonal_Count";


//SUB SCHOOLS APIS
$route['SubschoolDistrictWise'] = "Ceo_District/Subschool_DistrictWise";
$route['SaveSubZonalSchools'] = "Ceo_District/SaveZonal_Sub_Schools";
$route['GetSubZonalSchools'] = "Ceo_District/GetSubZonal_Schools";
$route['deleteZonalSubSchools']="Ceo_District/delete_ZonalSubSchools";


//BRTE TEACHER API 
$route['SaveBRTEZonalSchools'] = "Ceo_District/SaveBRTE_ZonalSchools";


//END

$route['DCApproval'] = "Student/DCApproval";
$route['DCReject'] = "Student/DCReject";
$route['DCStudDtls'] = "Student/DCStudDtls";


//BY NIRMAL BRTE TEACHERS LIST
$route['BRTE_TeacherList']='State/BRTE_Teachers_list';
$route['BRTEassignedtoblock']='State/BRTE_assigned_to_block';

$route['zonalSchool'] = 'Schools_home/zonalSchool';

/**API for content transfer by wesley starts here**/
$route['e-learn/StuContentTrans']='Schools_home/elearn';
/**API for content transfer by wesley ends here**/


//userDetails API --------------------------------
$route['auth/userDetails'] = "Home/userDetails";
//mailDetails API --------------------------------
$route['auth/mailDetails'] = "Home/mailDetails";
//updatePassword API --------------------------------
$route['auth/updatePassword'] = "Home/updatePassword";

$route['getFields'] = "Home/getFields";

