<?php
function path() { echo 'https://kensunhid.com/taxi-station'; }
include_once 'config/db_connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taxi station</title>
    <link rel="stylesheet" href="<?php path(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php path(); ?>/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <header class="col-sm-12">
                <a href="<?php path(); ?>"><h1>Taxi station</h1></a>
            </header>

            <nav class="col-sm-12">
                <li><a href="<?php path(); ?>/page/orders.php">Orders</a></li>
                <li><a href="<?php path(); ?>/page/drivers.php">Drivers</a></li>
                <li><a href="<?php path(); ?>/page/cars.php">Cars</a></li>
            </nav>