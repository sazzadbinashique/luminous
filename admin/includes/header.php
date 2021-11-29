<?php include "../Config/config.php"; ?>
<?php include "../includes/db.php"; ?>
<?php include "../includes/function.php"; ?>
<?php include "function.php"; ?>
<?php ob_start(); ?>
<?php session_start();?>
<?php 
if (!isset($_SESSION['user_role'])) {

    header("Location: ../");
 
}else{

    if (isset($_SESSION['user_id'])){
        $info = getBrowserWithVersion();
        date_default_timezone_set("Asia/Dhaka");

        $user_id =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : '0';
        $date = date('Y-m-d');
        $time = date("H:i:s");
        $week_of_year = date("W", strtotime(date('Y-m-d')));
        $ip = getUserIpAddr();
        $path = $_SERVER['REQUEST_URI'];
        $os = $info['platform'];
        $browser = $info['browser'];
        $ref = $info['ref'];

        $query = "INSERT INTO activity_log (date,time, weak_of_year, user_id, ip, path, os, browser, ref) ";
        $query.= "VALUES ('{$date}', '{$time}', '{$week_of_year}', '{$user_id}', '$ip', '{$path}', '{$os}', '{$browser}', '{$ref}')";
        $user_activity_query = mysqli_query($connection, $query);
        if (!$user_activity_query) {
            throw new Exception('QUERY FAILED.' . mysqli_error($connection));
        }
    }

    //  if ($_SESSION['user_role'] !== 'admin') {
    //     header("Location: ../index.php");
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="assets/css/custom.css" rel="stylesheet">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> -->

   


</head>

<body >

<!-- <div class="preloader-wrapper">
    <div class="preloader">
        <img height="300px" width="300px" src="../images/loader.gif" alt="NILA">
    </div>
</div>
 -->
