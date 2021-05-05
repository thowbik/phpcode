<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/

// $active_group = 'production_read_access';
// $active_group = 'production_write_access';
$active_group = 'default';
//$active_record = TRUE;

$query_builder = TRUE;

$old_host = 'staging-cluster.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';
$new_host = 'attendance-2.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';
$read_host = 'attendance-2.cluster-ro-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';

//$exam_write_host = 'attendance-2.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';
//$exam_read_host = 'replica1-attendance.cvxfty5zotmt.ap-south-1.rds.amazonaws.com';

$exam_write_host = 'exams.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';
$exam_read_host = 'exams.cluster-ro-cvxfty5zotmt.ap-south-1.rds.amazonaws.com';

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => $new_host,
    'username' => 'staging',
    'password' => 'p7e9e72CRngtuWTF',
    'database' => 'tnschools_working',
    'port'     => '3306',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT == 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

	// $db['default']['dsn']	= '';
    // $db['default']['hostname'] = $exam_write_host;
    // $db['default']['username'] = 'examuser';
    // $db['default']['password'] = 'y7JnZpct';
    // $db['default']['database'] = 'exams';
    // $db['default']['port']     = '3306';
    // $db['default']['dbdriver'] = 'mysqli';
    // $db['default']['dbprefix'] = '';
    // $db['default']['pconnect'] = FALSE;
    // $db['default']['db_debug'] = (ENVIRONMENT == 'production');
    // $db['default']['cache_on'] = FALSE;
    // $db['default']['cachedir'] = '';
    // $db['default']['char_set'] = 'utf8';
    // $db['default']['dbcollat'] = 'utf8_general_ci';
    // $db['default']['swap_pre'] = '';
    // $db['default']['encrypt'] = FALSE;
    // $db['default']['compress'] = FALSE;
    // $db['default']['stricton'] = FALSE;
    // $db['default']['failover'] = array();
	// $db['default']['save_queries'] = TRUE;

	// $db['read']['dsn']	= '';
    // $db['read']['hostname'] = $exam_read_host;
    // $db['read']['username'] = 'examuser';
    // $db['read']['password'] = 'y7JnZpct';
    // $db['read']['database'] = 'exams';
    // $db['read']['port']     = '3306';
    // $db['read']['dbdriver'] = 'mysqli';
    // $db['read']['dbprefix'] = '';
    // $db['read']['pconnect'] = FALSE;
    // $db['read']['db_debug'] = (ENVIRONMENT == 'production');
    // $db['read']['cache_on'] = FALSE;
    // $db['read']['cachedir'] = '';
    // $db['read']['char_set'] = 'utf8';
    // $db['read']['dbcollat'] = 'utf8_general_ci';
    // $db['read']['swap_pre'] = '';
    // $db['read']['encrypt'] = FALSE;
    // $db['read']['compress'] = FALSE;
    // $db['read']['stricton'] = FALSE;
    // $db['read']['failover'] = array();
	// $db['read']['save_queries'] = TRUE;

	
/*$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'tnschools-cluster.cluster-ro-cvxfty5zotmt.ap-south-1.rds.amazonaws.com',
	'username' => 'reademis',
	'password' => 'Emis@9102',
	'database' => 'tnschools_working',
	'port'     => '3306',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);*/
/*$db['production_write_access'] = array(
	'dsn'	=> '',
	'hostname' => 'tnschools-cluster.cluster-cvxfty5zotmt.ap-south-1.rds.amazonaws.com',
	'username' => '',
	'password' => '',
	'database' => 'tnschools_working',
	'port'     => '3306',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
db['default'] = array(
 	'dsn'	=> '',
 	'hostname' => '13.127.73.127',
 	'username' => 'staging',
 	'password' => 'gevJwZJr2zG6vp46cauZ',
 	'database' => 'clean_db',
 	'port'     => '3306',
 	'dbdriver' => 'mysqli',
 	'dbprefix' => '',
 	'pconnect' => FALSE,
 	'db_debug' => (ENVIRONMENT !== 'production'),
 	'cache_on' => FALSE,
 	'cachedir' => '',
 	'char_set' => 'utf8',
 	'dbcollat' => 'utf8_general_ci',
 	'swap_pre' => '',
 	'encrypt' => FALSE,
 	'compress' => FALSE,
 	'stricton' => FALSE,
 	'failover' => array(),
 	'save_queries' => TRUE
);*/


// echo 'Connecting to database: ' .$db['default']['database'];
//  $dbh=mysql_connect
//  (
//    $db['default']['hostname'],
//    $db['default']['username'],
//    $db['default']['password'])
//    or die('Cannot connect to the database because: ' . mysql_error());
//    mysql_select_db ($db['default']['database']);

//    echo '<br />   Connected OK:'  ;
//    die( 'file: ' .__FILE__ . ' Line: ' .__LINE__); 
   
?>