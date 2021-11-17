    <!DOCTYPE HTML>
    <html>
    <head>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </head>
    <body>

    <?php

    $valor1 = 216;
    $dataPoints1 = array(
        array("label"=> "Rotaria", "y"=> $valor1 ),
        array("label"=> "Merida", "y"=> 195 ),
        array("label"=> "Barinas", "y"=> 155 ),
        array("label"=> "Acarigua", "y"=> 187 ),
        array("label"=> "Barquisimeto", "y"=> 173 ),
        array("label"=> "San Josesito", "y"=> 132 ),
        array("label"=> "Pueblo Nuevo", "y"=> 129 ),
        array("label"=> "Castellana", "y"=> 216 ),
        array("label"=> "Santa Barbara", "y"=> 195 ),
        array("label"=> "Cabimas", "y"=> 175 ),
        array("label"=> "Ejido", "y"=> 147 ),
        array("label"=> "Madre Juana", "y"=> 173 ),
        array("label"=> "Alto Chama", "y"=> 152 ),
        array("label"=> "Lagunillas", "y"=> 139 )
    );
     
    $dataPoints2 = array(
        array("label"=> "Rotaria", "y"=> 55 ),
        array("label"=> "Merida", "y"=> 17 ),
        array("label"=> "Barinas", "y"=> 72 ),
        array("label"=> "Acarigua", "y"=> 137 ),
        array("label"=> "Barquisimeto", "y"=> 93 ),
        array("label"=> "San Josesito", "y"=> 72 ),
        array("label"=> "Pueblo Nuevo", "y"=> 78 ),
        array("label"=> "Castellana", "y"=> 510 ),
        array("label"=> "Santa Barbara", "y"=> 17 ),
        array("label"=> "Cabimas", "y"=> 72 ),
        array("label"=> "Ejido", "y"=> 27 ),
        array("label"=> "Madre Juana", "y"=> 13 ),
        array("label"=> "Alto Chama", "y"=> 12 ),
        array("label"=> "Lagunillas", "y"=> $valor1 )
    );
     
    $dataPoints3 = array(
        array("label"=> "Rotaria", "y"=> $valor1 ),
        array("label"=> "Merida", "y"=> 88 ),
        array("label"=> "Barinas", "y"=> 122 ),
        array("label"=> "Acarigua", "y"=> 112 ),
        array("label"=> "Barquisimeto", "y"=> 312 ),
        array("label"=> "San Josesito", "y"=> 133 ),
        array("label"=> "Pueblo Nuevo", "y"=> 137 ),
        array("label"=> "Castellana", "y"=> 89 ),
        array("label"=> "Santa Barbara", "y"=> 81 ),
        array("label"=> "Cabimas", "y"=> 122 ),
        array("label"=> "Ejido", "y"=> 512 ),
        array("label"=> "Madre Juana", "y"=> 126 ),
        array("label"=> "Alto Chama", "y"=> 133 ),
        array("label"=> "Lagunillas", "y"=> 437 )
    );
     
    $dataPoints4 = array(
        array("label"=> "Rotaria", "y"=> 180 ),
        array("label"=> "Merida", "y"=> 280 ),
        array("label"=> "Barinas", "y"=> 79 ),
        array("label"=> "Acarigua", "y"=> 478 ),
        array("label"=> "Barquisimeto", "y"=> 579 ),
        array("label"=> "San Josesito", "y"=> 979 ),
        array("label"=> "Pueblo Nuevo", "y"=> 884 ),
        array("label"=> "Castellana", "y"=> 80 ),
        array("label"=> "Santa Barbara", "y"=> 682 ),
        array("label"=> "Cabimas", "y"=> 75 ),
        array("label"=> "Ejido", "y"=> 476 ),
        array("label"=> "Madre Juana", "y"=> 676 ),
        array("label"=> "Alto Chama", "y"=> 278 ),
        array("label"=> "Lagunillas", "y"=> $valor1 )
    );

    ?>

    <div id="chartContainer" style="height: 250px; width: 80%;"></div>

    <script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", { 
        theme: "light2",
        title: {
            text: "Tipos de Status por Sucursal"
        },
        subtitles: [{
            text: "por cantidad de status"
        }],
        axisY: {
            includeZero: false
        },
        legend:{
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        toolTip: {
            shared: true
        },
        data: [{
            type: "stackedArea",
            name: "Bien",
            showInLegend: true,
            visible: false,
            yValueFormatString: "###",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "stackedArea",
            name: "Averiado",
            showInLegend: true,
            yValueFormatString: "###",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "stackedArea",
            name: "Reparacion",
            showInLegend: true,
            visible: false,
            yValueFormatString: "###",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },
        {
            type: "stackedArea",
            name: "Falla",
            showInLegend: true,
            visible: false,
            yValueFormatString: "###",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        }]
    });
     
    chart.render();
     
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
     
    }
    </script>

    </body>
    </html>