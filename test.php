<?php
	/*mysql_connect('localhost', 'root', '');

	mysql_select_db('video_system');
	*/

//connect mysql database
$host = "localhost";
$user = "root";
$pass = "123456";
$db = "demo";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));

?> 