<?php
/**
 * Created by PhpStorm.
 * User: Mahmud suleman sheikh Wunnam
 * Date: 12/25/2019
 * Time: 10:43 AM
 */
//title of the page
if(!isset($title)){$title = "Homepage";}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Timetable||<?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="<?php echo url_for("styles/customeStyle.css") ?>"/>
    <link  rel="stylesheet" href="<?php echo url_for("styles/bootstrap/css/bootstrap.min.css") ?>"/>
</head>
<body>


