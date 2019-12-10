<?php include('includes/auth.php'); ?>
<?php
// Author: Emirhan Gocturk
// Date: 2 December 2019
include('includes/getTemperatureData.php');
include('includes/getHumidityData.php');
include('includes/getPressureData.php');
?>
<?php include('templates/cHeader.php'); ?>
<?php
if($_SESSION['sound'] ){
    echo '<audio autoplay>'.
            '<source src="intro.mp3">'.
        '</audio>';
    $_SESSION['sound'] = false;
}
?>
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
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div class="col-md">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div class="col-md">
            <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>