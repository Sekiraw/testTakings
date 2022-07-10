@extends('master')

@section('title', 'Upload')

@section('content')

<?php

$dataPoints = array(
    array("label"=> "Correct answers", "y"=> $correct),
    array("label"=> "Incorrect answers", "y"=> $incorrect)
);

?>
<body>
<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title:{
                text: "Diagram"
            },
            subtitles: [{
                text: "Diagram"
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "#,##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

@endsection
