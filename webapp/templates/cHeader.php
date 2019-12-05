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
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "dark1",
                title: {
                    text: "Temperature"
                },
                axisY: {
                    title: "Celsius"
                },
                data: [{
                    type: "line",
                    lineColor: "orange",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

            var chart2 = new CanvasJS.Chart("chartContainer2", {
                theme: "dark1",
                title: {
                    text: "Humidity"
                },
                axisY: {
                    title: "RH"
                },
                data: [{
                    type: "line",
                    lineColor: "orange",
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();

            var chart3 = new CanvasJS.Chart("chartContainer3", {
                theme: "dark1",
                title: {
                    text: "Pressure"
                },
                axisY: {
                    title: "Pascal"
                },
                data: [{
                    type: "line",
                    lineColor: "orange",
                    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart3.render();
        }
    </script>
</head>
<body>