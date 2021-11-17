<!DOCTYPE HTML>
<html>
<head>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>

<body>

<?php
 
$dataPoints = array();
$y = 1;
for($i=0; $i<14; $i++)
 {
  $y+= rand(0,1) * 0.01;
  array_push($dataPoints, array("x" => $i, "y" => $y));
}
?>

<div id="chartContainer" style="height: 250px; width: 100%;"></div>


<script>
window.onload = function() {
 
var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
 
var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    title: {
        text: "Registros agregados al Ciclo de Servicio"
    },
    axisX:{
        title: "Tiempo en Milisegundos"
    },
    axisY:{
        includeZero: false,
        suffix: ""
    },
    data: [{
            type: "line",
            xValueType: "dateTime",
            xValueFormatString: "hh:MM:ss TT",
            yValueFormatString: "#.##0",
            toolTipContent: "{y} Registros",
            dataPoints: dataPoints
    }]
});
chart.render();
 
var updateInterval = 1000;
setInterval(function () { updateChart() }, updateInterval);
 
var xValue = dataPoints.length;
var yValue = dataPoints[dataPoints.length - 1].y;
 
function updateChart() {
    yValue += (Math.random() - 0.5) * 0.1;
    dataPoints.push({ x: xValue, y: yValue });
    xValue++;
    chart.render();
};
 
}
</script>

</body>
</html>