<script>
    // Author: Frank Wolff
    // Date: 13 December 2019

    // Temperature chart
    var options = {
        chart: {
            type: 'area',
            stacked: false,
            // id and group enables simultaneous scrolling
            id: 'temp',
            group: 'linegraphs',
            height: 350,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Temperature',
            data: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }],
        markers: {
            size: 0,
        },
        title: {
            text: 'Temperature',
            align: 'center'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                text: 'weather'
            },
            title: {
                text: 'Celsius'
            },
        },
        xaxis: {
            type: 'category',
            categories: [],
            labels: {
                show: true,
                rotate: -45,
                rotateAlways: false,
                hideOverlappingLabels: true,
                showDuplicates: false,
                trim: true,
                minHeight: undefined,
                maxHeight: 120,
                offsetX: 0,
                offsetY: 0,
                format: undefined,
                formatter: function(val) {
                    return Math.round(val);
                }
            },
        },
        tooltip: {
            shared: false,
            y: {
                text: 'Test'
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#chartTemp"),
        options
    );
    chart.render();

    // Humidity chart
    var optionsHum = {
        chart: {
            type: 'area',
            // id and group enables simultaneous scrolling
            id: 'hum',
            group: 'linegraphs',
            stacked: false,
            height: 350,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Humidity',
            data: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }],
        markers: {
            size: 0,
        },
        title: {
            text: 'Humidity',
            align: 'center'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                text: 'weather'
            },
            title: {
                text: 'RH'
            },
        },
        xaxis: {
            type: 'category',
            categories: [],
            labels: {
                show: true,
                rotate: -45,
                rotateAlways: false,
                hideOverlappingLabels: true,
                showDuplicates: false,
                trim: true,
                minHeight: undefined,
                maxHeight: 120,
                offsetX: 0,
                offsetY: 0,
                format: undefined,
                formatter: function(val) {
                    return Math.round(val);
                },
            },
        },

        tooltip: {
            shared: false,
            y: {
                text: 'Test'
            }
        }
    }

    var chartHum = new ApexCharts(
        document.querySelector("#chartHum"),
        optionsHum
    );
    chartHum.render();

    // Pressure chart
    var optionsPressure = {
        chart: {
            type: 'area',
            // id and group enables simultaneous scrolling
            id: 'pressure',
            group: 'linegraphs',
            stacked: false,
            height: 350,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: 'zoom'
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Pressure',
            data: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        }],
        markers: {
            size: 0,
        },
        title: {
            text: 'Pressure',
            align: 'center'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                text: 'weather'
            },
            title: {
                text: 'Pascal'
            },
        },
        crosshairs: {
            show: true,
            width: 1,
            position: 'back',
            opacity: 0.9,
            stroke: {
                color: '#b6b6b6',
                width: 0,
                dashArray: 0,
            },
            fill: {
                type: 'solid',
                color: '#B1B9C4',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                },
            },
        },
        xaxis: {
            type: 'category',
            categories: [],
            labels: {
                show: true,
                rotate: -45,
                rotateAlways: false,
                hideOverlappingLabels: true,
                showDuplicates: false,
                trim: true,
                minHeight: undefined,
                maxHeight: 120,
                offsetX: 0,
                offsetY: 0,
                format: undefined,
                formatter: function(val) {
                    return Math.round(val);
                }
            },
        },
        tooltip: {
            shared: false,
            y: {
                text: 'Test'
            }
        }
    }

    var chartPressure = new ApexCharts(
        document.querySelector("#chartPressure"),
        optionsPressure
    );
    chartPressure.render();
</script>
