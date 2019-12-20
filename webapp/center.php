<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019
include('includes/auth.php');
include('includes/getTemperatureData.php');
include('includes/getHumidityData.php');
include('includes/getPressureData.php');
include ('../templates/header.php');

$latestTemp = $dataPoints[0]['y'];
$latestHum = $dataPoints2[0]['y'];
$latestPress = $dataPoints3[0]['y'];

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="dataList.php">Data list</a>
            </div>
        </div>
        <div class="navbar-collapse collapse w-50 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container" style="margin-top: 5%;">


    <div class="row">
        <div class="col-sm">
            <h1 class="text-center">
                <?php echo $latestTemp ?>˚C
            </h1>
            <p class="text-center">Latest temperature</p>
        </div>
        <div class="col-sm">
            <h1 class="text-center">
                <?php echo $latestHum ?>% RH
            </h1>
            <p class="text-center">Latest humidity</p>
        </div>
        <div class="col-sm">
            <h1 class="text-center">
                <?php echo $latestPress ?> Pa
            </h1>
            <p class="text-center">Latest pressure</p>
        </div>
    </div>
    <br>


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