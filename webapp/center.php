<?php include('includes/getTemperatureData.php'); ?>
<?php include('templates/cHeader.php'); ?>

<div class="container" style="margin-top: 5%;">
    <img src="img/logo.png" alt="" width="150px;" style="margin-bottom: 2%;">

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include('templates/footer.php'); ?>