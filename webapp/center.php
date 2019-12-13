<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019
include('includes/auth.php');
include('includes/getTemperatureData.php');
include('includes/getHumidityData.php');
include('includes/getPressureData.php');

if ($_SESSION['sound']) {
    echo '<audio autoplay>'.
        '<source src="intro.mp3">'.
        '</audio>';
    $_SESSION['sound'] = false;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>8BALL INDUSTRIES</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./styles/style.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 5%;">
    <div class="row">
        <div class="col-md">
            <img src="img/logo.png" alt="" width="150px;" style="margin-bottom: 2%;">
        </div>
        <div class="col-md"></div>
        <div class="col-md">
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md"></div>
                <div class="col-md"><a href="index.php">Logout</a></div>
            </div></div>
    </div>

    <div class="row">
        <div class="col-md">
            <div id="chartTemp">

            </div>
        </div>
        <div class="col-md">
            <div id="chartHum">

            </div>
        </div>
        <div class="col-md">
            <div id="chartPressure">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/apexcharts.js"></script>
<?php include('templates/chartSettings.php'); ?>
<?php include('templates/footer.php'); ?>