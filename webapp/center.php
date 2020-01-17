<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019
include('includes/auth.php');
include('includes/getTemperatureData.php');
include('includes/getHumidityData.php');
include('includes/getPressureData.php');
include('includes/getLight.php');
include('templates/header.php');
include('templates/navbar.php');

// Store latest temperature in an easier to be called variable
$latestTemp = $dataPoints[0]['y'];
$latestHum = $dataPoints2[0]['y'];
$latestPress = $dataPoints3[0]['y'];
$latestLight = $dataPoints4[0]['y'];

// Plays the introduction sound
if ($_SESSION['sound']) {
    echo '<audio autoplay>'.
        '<source src="intro.mp3">'.
        '</audio>';
    $_SESSION['sound'] = false;
}
?>

<div class="container" style="margin-top: 5%;">
    <div class="row">
        <div class="col-md">
            <h1 class="text-center">
                <?php echo $latestTemp ?>˚C
            </h1>
            <p class="text-center">Latest temperature</p>
            <p class="text-center">Temperature</p>
            <div id="chartTemp"></div>
        </div>
        <div class="col-md">
            <h1 class="text-center">
                <?php echo $latestHum ?>% RH
            </h1>
            <p class="text-center">Latest humidity</p>
            <p class="text-center">Humidity</p>
            <div id="chartHum"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <h1 class="text-center">
                <?php echo $latestPress ?> Pa
            </h1>
            <p class="text-center">Latest pressure</p>
            <p class="text-center">Pressure</p>
            <div id="chartPressure"></div>
        </div>
        <div class="col-md">
            <h1 class="text-center">
                <?php echo $latestLight ?> %
            </h1>
            <p class="text-center">Latest ambient light</p>
            <p class="text-center">Ambient Light</p>
            <div id="chartLight"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/apexcharts.js"></script>
<?php include('templates/chartSettings.php'); ?>
<?php include('templates/footer.php'); ?>