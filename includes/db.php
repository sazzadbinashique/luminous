<?php 
// phpinfo();
/*ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
error_reporting(E_ALL);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
ini_set('display_startup_errors', '1');*/

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "luminous";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connection =mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno()) {
	throw new Exception('Failed to connect to MySQL.' . mysqli_connect_error());
}




?>
