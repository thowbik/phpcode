<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// define login route name for token verification
// defined('ROUTE_LOGIN')        OR define('ROUTE_LOGIN', 'login'); // no errors





//encript database table name
defined('EMIS_LOGIN') OR define('EMIS_LOGIN','login');
defined('TEACHERS_IMAGE_KEY') OR define('TEACHERS_IMAGE_KEY','AKIAJW6QTZLSOS4X4IRA');
defined('TEACHERS_IMAGE_SECRET') OR define('TEACHERS_IMAGE_SECRET','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');
defined('TEACHER_BUCKET_NAME') OR define('TEACHER_BUCKET_NAME','tnschoolsawsphoto');
defined('EMIS_REPORT') OR define('EMIS_REPORT','emis-reports');
defined('Students') OR define('Students','Students');
defined('Students_EMIS') OR define('Students_EMIS','Students_emis');


defined('VIDEOS_BUCKET_NAME') OR define('VIDEOS_BUCKET_NAME','gisvideos');
defined('VIDEOS_SECRET') OR define('VIDEOS_SECRET','nrC6XPkHD5x1ttOGnPaIrVwKRday3JFv2TYaa963');
defined('VIDEOS_KEY') OR define('VIDEOS_KEY','AKIA4HOG6W4VZPQOCSWZ');
defined('HEADERTOKEN') OR define('HEADERTOKEN',serialize (array ("udise_staffreg","teacher_dates","teacher_training_details","teacher_volunteers","teacher_volunteers_subjects")));		//SINGLE
defined('TOKENHEADER') OR define('TOKENHEADER',serialize (array ("teacher_volunteers_subjects","teacherdepute_entry")));	//MULTI

defined('HEADERTOKEN') OR define('HEADERTOKEN',serialize (array ("mgmt_app_status")));		//SINGLE
defined('TOKENHEADER') OR define('TOKENHEADER',serialize (array ("mgmt_app_doc_uploads")));	//MULTI

//EMIS TABLENAME 
defined('REGULAR_STUDENT') OR define('REGULAR_STUDENT','students_child_detail');
defined('MIGRANT_STUDENT') OR define('MIGRANT_STUDENT','students_migrant_detail');
defined('CURR_CPOOL_STUDENT') OR define('CPOOL_STUDENT','students_cpool_archive1920');
defined('CPOOL_STUDENT_1920') OR define('CPOOL_STUDENT_1920','students_cpool_archive1920');
defined('CPOOL_STUDENT_1819') OR define('CPOOL_STUDENT_1819','students_cpool_archive201819');
defined('CPOOL_STUDENT_1718') OR define('CPOOL_STUDENT_1718','students_cpool_archive1718');
defined('NOONMEAL') OR define('NOONMEAL','schoolnew_meal');
defined('SCHOOLDOCS') OR define('SCHOOLDOCS',serialize (array('minority_status','building_doc','building_stab_certi','building_license','sanitary_certi','fire_safety','upload_permi_certi','upload_sch_photo','closure_order','land_details')));
defined('INTERMEDIATEDOCS') OR define('INTERMEDIATEDOCS',serialize (array ("intermediate")));


defined('CALL_TREE_SECRET') OR define('CALL_TREE_SECRET','F2jNLgyiWDHRlNSe9xA30R23W/KDq9z1OQpid2xl');
defined('CALL_TREE_KEY') OR define('CALL_TREE_KEY','AKIA4HOG6W4VTXBF45UV');