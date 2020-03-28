<?php
/**
 * Created by PhpStorm.
 * User: Mahmud suleman sheikh Wunnam
 * Date: 12/25/2019
 * Time: 10:43 AM
 */

//title of the page
if(!isset($title)){$title = "Admin Homepage";}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin||<?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="<?php echo url_for("styles/main.css") ?>"/>
</head>
<body>
