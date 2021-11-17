<!--<!DOCTYPE HTML>
<html>

<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<body>
<?php
  $data1 = "Grafico en Tiempo Real";
?>
<div id="chartContainer" style="height: 250px; width: 50%;"></div>

<script>
window.onload = function () {

var dps = []; // dataPoints
var chart = new CanvasJS.Chart("chartContainer", {
    title :{
        text: "Grafico en Tiempo Real"
    },
    axisY: {
        includeZero: false
    },
    data: [{
        type: "bar",
        dataPoints: dps
    }]
});

var xVal = 0;
var yVal = 100;
var updateInterval = 1000;
var dataLength = 10; // number of dataPoints visible at any point

var updateChart = function (count) {

    count = count || 1;

    for (var j = 0; j < count; j++) {
        yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
        dps.push({
            x: xVal,
            y: yVal
        });
        xVal++;
    }

    if (dps.length > dataLength) {
        dps.shift();
    }

    chart.render();
};

updateChart(dataLength);
setInterval(function(){updateChart()}, updateInterval);

}
</script>

</body>
</html>-->



<!DOCTYPE HTML>
<html>
<head>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>

<?php
  $dataPoints = array( array("label"=> "SAIG", "y"=> 60), 
                       array("label"=> "Blnz", "y"=> 25), 
                       array("label"=> "LnCj", "y"=> 140),
                       array("label"=> "PtVt", "y"=> 85), 
                       array("label"=> "REDCOM", "y"=> 180), 
                       array("label"=> "EqOp", "y"=> 93), 
                       array("label"=> "EQAdm", "y"=> 53), 
                       array("label"=> "Ftcp", "y"=> 77), 
                       array("label"=> "CCTV", "y"=> 23) 
                     );

  $valor = 150;
  $etiqueta = "Ciclo ";
?>

<div id="chartContainer" style="height: 350px; width: 50%;"></div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Ciclo de Servicio"
    },
    axisY: {
        minimum: 0,
        maximum: <?php echo $valor;?>,
        suffix: ""
    },
    data: [{
        type: "column",
        yValueFormatString: "#,##0.00\"%\"",
        indexLabel: "{y}",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
 
function updateChart()
 {
  var color,deltaY, yVal;
  var dps = chart.options.data[0].dataPoints;
  for (var i = 0; i < dps.length; i++)
   {
    deltaY = (2 + Math.random() * (-2 - 2));
    yVal =  Math.min(Math.max(deltaY + dps[i].y, 0), 90);
    //alert(dps[i].y);
    color = yVal > 100 ? "#59d05d" : yVal >= 50 ? "#fdaf4b" : yVal < 50 ? "#177dff" : null;
    //alert(color);
    dps[i] = { label: "<?php echo $etiqueta;?>"+(i+1) , y: yVal, color: color };
   }
   chart.options.data[0].dataPoints = dps;
   chart.render();
 };
 updateChart();
 setInterval(function () { updateChart() }, 100);
}

</script>

</body>
</html>


    <!--<!DOCTYPE HTML>
    <html>
    <head>

      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </head>
    <body>

    <?php
    $dataPoints1 = array();
    $dataPoints2 = array();
    $updateInterval = 5000; //in millisecond
    $initialNumberOfDataPoints = 100;
    $x = time() * 1000 - $updateInterval * $initialNumberOfDataPoints;
    $y1 = 1500;
    $y2 = 1550;
    //echo '<BR>'.$x;

    // generates first set of dataPoints 
    for($i = 0; $i < $initialNumberOfDataPoints; $i++){
        $y1 += round(rand(-2, 2));
        $y2 += round(rand(-2, 2));  
        array_push($dataPoints1, array("x" => $x, "y" => $y1));
        array_push($dataPoints2, array("x" => $x, "y" => $y2));
        $x += $updateInterval;
    }
     
    ?>

    <div id="chartContainer" style="height: 300px; width: 100%;"></div>

        <script>
    window.onload = function() {
     
    var updateInterval = <?php echo $updateInterval ?>;
    var dataPoints1 = <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>;
    var dataPoints2 = <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>;
    var yValue1 = <?php echo $y1 ?>;
    var yValue2 = <?php echo $y2 ?>;
    var xValue = <?php echo $x ?>;
     
    var chart = new CanvasJS.Chart("chartContainer", {
        zoomEnabled: true,
        title: {
            text: "Registro en vivo del Ciclo de Servicio en Area SAIG"
        },
        axisX: {
            title: "El grafico se actualiza cada " + updateInterval / 1000 + " segundos"
        },
        axisY:{
            suffix: " registros",
            includeZero: false
        }, 
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            verticalAlign: "top",
            fontSize: 22,
            fontColor: "dimGrey",
            itemclick : toggleDataSeries
        },
        data: [{ 
                type: "line",
                name: "SAIG Marcaje",
                xValueType: "dateTime",
                yValueFormatString: "#,### registros",
                xValueFormatString: "hh:mm:ss TT",
                showInLegend: true,
                legendText: "{name} " + yValue1 + " registros",
                dataPoints: dataPoints1
            },
            {               
                type: "line",
                name: "SAIG Registro" ,
                xValueType: "dateTime",
                yValueFormatString: "#,### registros",
                showInLegend: true,
                legendText: "{name} " + yValue2 + " registros",
                dataPoints: dataPoints2
        }]
    });
     
    chart.render();
    setInterval(function(){updateChart()}, updateInterval);
     
    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
     
    function updateChart() {
        var deltaY1, deltaY2;
        xValue += updateInterval;
        // adding random value
        yValue1 += Math.round(2 + Math.random() *(-2-2));
        yValue2 += Math.round(2 + Math.random() *(-2-2));
     
        // pushing the new values
        dataPoints1.push({
            x: xValue,
            y: yValue1
        });
        dataPoints2.push({
            x: xValue,
            y: yValue2
        });
     
        // updating legend text with  updated with y Value 
        chart.options.data[0].legendText = " SAIG Marcaje " + yValue1 + " registros";
        chart.options.data[1].legendText = " SAIG Registro " + yValue2+ " registros";
        chart.render();
    }

    }
    </script>

    </body>
    </html>-->