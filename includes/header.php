<?php session_start(); ?>
<?php  include_once "includes/db.php"; ?>
<?php include "function.php"; ?>
<?php

if ( !isset($_SESSION['user_id']) || isset($_SESSION['user_id'])){
    $info = getBrowserWithVersion();
    date_default_timezone_set("Asia/Dhaka");

    $user_id =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : '0';
//var_dump($user_id);die();
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

    if (!$user_activity_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }

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

    <title><?= SITE_TITLE;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/blog-home.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
