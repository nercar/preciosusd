<?php
/*$segundos = 120;
header("Refresh:".$segundos);*/
include("seguridad.php");
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo1 = new sucursal("","","");
$activo2 = new sub_area("","");
$activo3 = new item("","","","","");
$activo4 = new detalle_caja("","","");
$activo5 = new ciclo("","","","","","","");
$activo6 = new detalle_ciclo("","","","","","");
$activo7 = new area_item("","","");
$activo8 = new area("","","","","");
$activo9 = new status("","","");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Grupo Garzon C.A. | Ciclo de Servicio</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Icono Garzon -->
  <link rel="shortcut icon" href="dist/img/favicon.png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <script src="Chart.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/gijgo.min.js"></script>
  <script src="gijgo.min.js"></script>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


  <style type="text/css">
   .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
  }
  .map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
  }
</style>


<style type="text/css">
.map-container-9,
.map-container-10,
.map-container-11 {
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container-9 iframe
.map-container-10 iframe
.map-container-11 iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
</style>


</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.php" class="nav-link">Ciclo de Servicio</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
      <img src="dist/img/GG.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Grupo Garzon C.A.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $LOGusuario;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard fa-1x fa-fw"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard01.php" class="nav-link">
                  <i class="nav-icon fa fa-area-chart text-info"></i>
                  <p> Resumen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard02.php" class="nav-link">
                  <i class="nav-icon fa fa-bar-chart text-info"></i>
                  <p> Diario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard03.php" class="nav-link">
                  <i class="nav-icon fa fa-line-chart text-info"></i>
                  <p> Fecha</p>
                </a>
              </li>              
            </ul>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-recycle fa-spin fa-1x fa-fw"></i>
              <p>
                Ciclo de Servicio
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./saig.php" class="nav-link">
                  <i class="nav-icon fa fa-keyboard-o text-info"></i>
                  <p> SAIG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./balanzas.php" class="nav-link">
                  <i class="nav-icon fa fa-balance-scale text-info"></i>
                  <p> Balanzas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./lineacaja.php" class="nav-link">
                  <i class="nav-icon fa fa-fax text-info"></i>
                  <p> Linea de Caja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./puntosventa.php" class="nav-link">
                  <i class="nav-icon fa fa-credit-card text-info"></i>
                  <p> Puntos de Venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./redcom.php" class="nav-link">
                  <i class="nav-icon fa fa-sitemap text-info"></i>
                  <p> RedCom</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./equiposoperativos.php" class="nav-link">
                  <i class="nav-icon fa fa-desktop text-info"></i>
                  <p> Equipos Operativos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./equiposadministrativos.php" class="nav-link">
                  <i class="nav-icon fa fa-television text-info"></i>
                  <p> PC'S Administrativos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./fotocopiadoras.php" class="nav-link">
                  <i class="nav-icon fa fa-print text-info"></i>
                  <p> Fotocopiadoras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./cctv.php" class="nav-link">
                  <i class="nav-icon fa fa-video-camera text-info"></i>
                  <p> CCTV</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>


<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-gear fa-1x fa-fw"></i>
              <p>
                Configuracion
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-keyboard-o text-info"></i>
                  <p> Sub-areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-balance-scale text-info"></i>
                  <p> Cajas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-fax text-info"></i>
                  <p> Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-credit-card text-info"></i>
                  <p> Sucursales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-sitemap text-info"></i>
                  <p> Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./configuracion.php" class="nav-link">
                  <i class="nav-icon fa fa-desktop text-info"></i>
                  <p> Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <!--
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Diario</h1>
          </div>
        </div>
      </div>
    </section>
    -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Estadisticas Diarias - Ciclo de Servicio</h3>
              </div>
              <div class="card-body text-secondary text-center">
              <?php
                $resul8=$activo8->Contar_Areas();
                if($resul8)
                 {
                  $con88=0;
                  while($row8 = mysqli_fetch_array($resul8))
                   {
                    $con88++;
                   }
                 }

                $vector_areas = array();
                $vector_auxi = array();
                $etiquetas = array("fa-keyboard-o", "fa-balance-scale", "fa-fax", "fa-credit-card", "fa-sitemap", "fa-desktop", "fa-television", "fa-print", "fa-video-camera");

                $resul8=$activo8->Contar_Totales_Areas();
                if($resul8)
                 {
                  $con8=0;
                  $pos1=1;
                  while($row8 = mysqli_fetch_array($resul8))
                   {
                    $rst_paso[$con8]=$row8[0];
                    $vector_areas[$pos1] = $rst_paso[$con8];
                    //echo '<BR>'.$rst_paso[$con8];
                    $con8++;
                    $pos1++;
                   }
                 }
                 $vector_auxi = array_count_values($vector_areas);
                 for($j=1;$j<=$con88;$j++)
                  {
                   if(empty($vector_auxi[$j]))
                    {
                     $vector_auxi[$j]=0;
                    }
                  }
              ?>

                <!--<button type="button" class="btn btn-primary">
                  Messages <span class="badge badge-light">4</span>
                </button>-->

              <?php
                $resul8=$activo8->Contar_Areas();
                if($resul8)
                 {
                  $con88=1;
                  $con888=0;
                  while($row8 = mysqli_fetch_array($resul8))
                   {
                    $uvw[$con88]=$row8[2];
                    echo "<a class='btn btn-app'>";
                      echo "<span class='badge bg-primary'>$vector_auxi[$con88]</span>";
                      echo "<i class='fa $etiquetas[$con888]'></i>$uvw[$con88]";
                    echo "</a>";                    
                    $con88++;
                    $con888++;
                   }
                 }

              ?>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!--<div class="card-footer">
     <label class="control-label col-sm-2 requiredField">Fecha: </label>
      <div class="input-group">
       <input name="datepicker" id="datepicker" width="225" />
       <span class="input-group-append">
         <input name="crear" type="submit" class="btn btn-primary btn-block" id="crear" value="Consultar"/>
       </span>
      </div>
    </div>-->

    <!-- Main content -->
    <BR>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-area-chart"></i>
                    Status Diario por Sucursal
                </h3>
                <?php
                  $dataPoints = array();
                  $dataPoints1 = array();
                  $dataPoints2 = array();
                  $dataPoints3 = array();
                  $dataPoints4 = array();
                  $matriz_chart4 =array();
                  $vector_sucursales = array();
                  $matriz_status1 = array();
    
     
                  $resul1=$activo1->Encontrar_Sucursal();
                  if($resul1)
                   {
                    $con1=1;
                    while($row1 = mysqli_fetch_array($resul1))
                     {
                      $abc_descripcion[$con1]=$row1[2];
                      $vector_sucursales[$con1] = $abc_descripcion[$con1];
                      $con1++;
                     }
                   }
                  
                  $resul9=$activo9->Encontrar_Status();
                  if($resul9)
                   {
                    $con9=0;
                    while($row9 = mysqli_fetch_array($resul9))
                     {
                      $xyz_id[$con9]=$row9[0];
                      $xyz_descripcion[$con9]=$row9[1];
                      $con9++;
                     }
                   }

                  $resul5=$activo5->Totales_Diario_Sucursal();
                  if($resul5)
                   {
                    $con5=0;
                    while($row5 = mysqli_fetch_array($resul5))
                     {
                      $pos1 = $row5[0];
                      $pos2 = $row5[2];
                      $aaa_descripcion[$con5] = $row5[1];
                      $aaa_total[$con5] = $row5[4];
                      
                      $matriz_chart4[$pos1][$pos2]=$aaa_total[$con5];
                      //echo '<BR>'.$aaa_descripcion[$con5]." --> ".$pos1." ".$pos2." --> ".$matriz_chart4[$pos1][$pos2];
                      $con5++;
                     }
                   }


                  for($i=1;$i<$con1;$i++)
                   {
                    for($j=1;$j<=$con9;$j++)
                     {
                      if(empty($matriz_chart4[$i][$j]))
                       {
                        $matriz_chart4[$i][$j] = 0;
                       }
                     }
                   }


                  for($i=1;$i<$con1;$i++)
                   {
                    $matriz_status1[$i][1] = $vector_sucursales[$i];
                    $matriz_status1[$i][2] = $matriz_chart4[$i][1];
                    $matriz_status1[$i][3] = $matriz_chart4[$i][2];
                    $matriz_status1[$i][4] = $matriz_chart4[$i][3];
                    $matriz_status1[$i][5] = $matriz_chart4[$i][4];
                    array_push($dataPoints1, array("label"=> $matriz_status1[$i][1], "y"=> $matriz_status1[$i][2]));
                    array_push($dataPoints2, array("label"=> $matriz_status1[$i][1], "y"=> $matriz_status1[$i][3]));
                    array_push($dataPoints3, array("label"=> $matriz_status1[$i][1], "y"=> $matriz_status1[$i][4]));
                    array_push($dataPoints4, array("label"=> $matriz_status1[$i][1], "y"=> $matriz_status1[$i][5]));
                   }

                   /*echo "<pre>";
                    print_r($dataPoints1);
                   echo "</pre>";*/
                ?>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>

              <div class="card-body">
                <div class="chart">
                  <div id="chartContainer" style="height: 250px; width: 100%;"></div>

                  <script>
                    window.onload = function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2",
                        title: {
                        text: ""
                        },
                        subtitles: [{
                                     text: "Cantidades"
                                   }],
                        axisY: {
                                includeZero: true
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
                                yValueFormatString: "###",
                                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                               },
                               {
                                type: "stackedArea",
                                name: "Falla",
                                showInLegend: true,
                                yValueFormatString: "###",
                                dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
                               }]
                        });
     
                    chart.render();
     
                    function toggleDataSeries(e)
                     {
                      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) 
                       {
                        e.dataSeries.visible = false;
                       }
                      else
                       {
                        e.dataSeries.visible = true;
                       }
                       chart.render();
                     }
                    }
                  </script>
                </div>
              </div>
            </div><!--Card-->
          </div><!--Columna-->
        </div><!--Fila-->


        <div class="row">

          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Status General por dia
                </h3>
                <?php
                  /*if(@$_POST[crear])
                   {
                    echo '<BR>'.@$_POST[datepicker];
                   }*/
                  $data1 = '';
                  $data2 = '';
                  $data3 = '';
                  $data4 = '';
                  $var1=0;
                  $var2=0;
                  $mat = array();

                  $resul9=$activo9->Encontrar_Status();
                  if($resul9)
                   {
                    $con9=0;
                    while($row9 = mysqli_fetch_array($resul9))
                     {
                      $xyz_id[$con9]=$row9[0];
                      $xyz_descripcion[$con9]=$row9[1];
                      $con9++;
                     }
                   }

                  $resul1=$activo5->Status_Diario_Final();
                  if($resul1)
                   {
                    $con1=0;
                    while($row1 = mysqli_fetch_array($resul1))
                     {
                      $var1 = $row1[0];
                      $var2 = $row1[1];
                      $valor3[$con1] = $row1[2];
                      $valor4[$con1] = $row1[3];
                      
                      $mat[$var1][$var2]=$valor3[$con1];
                      //echo '<BR>'.$var1." ".$var2." --> ".$mat[$var1][$var2]." = ".$valor3[$con1];
                      $con1++;
                     }
                   }

                  for($i=2;$i<=8;$i++)
                   {
                    for($j=1;$j<=$con9;$j++)
                     {
                      if(empty($mat[$i][$j]))
                       {
                        $mat[$i][$j]=0;
                       }
                     }
                   }

                  for($i=2;$i<=8;$i++)
                   {
                    $data1 = $data1 . '"'. $mat[$i][1].'",';
                    $data2 = $data2 . '"'. $mat[$i][2].'",';
                    $data3 = $data3 . '"'. $mat[$i][3].'",';
                    $data4 = $data4 . '"'. $mat[$i][4].'",';
                   }

                  /*for($i=2,$k=1;$i<=8;$i++,$k++)
                   {
                    echo '<BR>'."Fila$k:  ";
                    for($j=1;$j<=$con9;$j++)
                     {
                      echo "  ".$mat[$i][$j];
                     }
                   }*/
                   //echo '<BR>'.$data1;
                   //echo '<BR>'.$data2;
                   //echo '<BR>'.$data3;
                   //echo '<BR>'.$data4;
                ?>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="chart1" style="height:250px"></canvas>

                  <script>
                   var multipleBarChart = document.getElementById('chart1').getContext('2d');

                   var myMultipleBarChart = new Chart(multipleBarChart, {
                       type: 'bar',
                       data: {
                       labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                       datasets : [{
                                    label: "Bien",
                                    backgroundColor: '#59d05d',
                                    borderColor: '#59d05d',
                                    data: [<?php echo $data1; ?>],
                                  },{
                                     label: "Averiado",
                                     backgroundColor: '#fdaf4b',
                                     borderColor: '#fdaf4b',
                                     data: [<?php echo $data2; ?>],
                                  },{
                                      label: "Reparacion",
                                      backgroundColor: '#177dff',
                                      borderColor: '#177dff',
                                      data: [<?php echo $data3; ?>],
                                  },{
                                      label: "Falla",
                                      backgroundColor: '#F7464A',
                                      borderColor: '#F7464A',
                                      data: [<?php echo $data4; ?>],
                                     }],
                          },
                       options: {
                                 responsive: true, 
                                 maintainAspectRatio: false,
                                 legend: {
                                          position : 'bottom'
                                         },
                                 title: {
                                         display: true,
                                         text: 'Status por Dia'
                                        },
                                 tooltips: {
                                            mode: 'index',
                                            intersect: false
                                           },
                                 responsive: true,
                                 scales: {
                                          xAxes: [{
                                          stacked: true,
                                         }],
                                          yAxes: [{
                                          stacked: true
                                         }]
                                }
                          }
                       });
                  </script>

                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Reparaciones por Sucursal
                </h3>
                <?php
                  $data10 = '';
                  $data20 = '';
                  $var10=0;
                  $vector_reparacion = array();
                  $sucursales = array();

                  $resul11=$activo1->Encontrar_Sucursal();
                  if($resul11)
                   {
                    $con11=1;
                    while($row11 = mysqli_fetch_array($resul11))
                     {
                      $abc_id[$con11]=$row11[0];
                      $abc_descripcion[$con11]=$row11[2];
                      $sucursales[$con11]=$abc_descripcion[$con11];
                      $con11++;
                     }
                   }

                  $resul1=$activo5->Totales_Reparaciones_Dia();
                  if($resul1)
                   {
                    $con1=1;
                    while($row1 = mysqli_fetch_array($resul1))
                     {
                      $var10 = $row1[2];
                      $valor[$con1] = $row1[0];
                      
                      $vector_reparacion[$var10]=$valor[$con1];
                      //echo '<BR>'.$var10." --> ".$vector_reparacion[$var10]." = ".$valor[$con1];
                      $con1++;
                     }
                   }
                  
                  for($j=1;$j<$con11;$j++)
                   {
                    if(empty($vector_reparacion[$j]))
                     {
                      $vector_reparacion[$j]=0;
                     }
                   }

                  for($i=1;$i<$con11;$i++)
                   {
                    $data10 = $data10 . '"'. $vector_reparacion[$i].'",';
                   }

                  for($j=1;$j<$con11;$j++)
                   {
                    $data20 = $data20 . '"'. $sucursales[$j].'",';
                   }

                  /*for($i=2,$k=1;$i<=8;$i++,$k++)
                   {
                    echo '<BR>'."Fila$k:  ";
                    for($j=1;$j<=$con9;$j++)
                     {
                      echo "  ".$mat[$i][$j];
                     }
                   }*/
                   //echo '<BR>'.$data10;
                   //echo '<BR>'.$data20;
                   //echo '<BR>'.$data3;
                   //echo '<BR>'.$data4;
                ?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="chart3" style="height:250px"></canvas>

                <script>
                   var ctxD = document.getElementById("chart3").getContext('2d');
                   var myLineChart = new Chart(ctxD, {

                   type: 'bar',
                   data: {
                   labels: [<?php echo $data20;?>],
                   datasets: [{
                               label: "Reparacion",
                               borderColor: "#177dff",
                               pointBorderColor: "#FFF",
                               pointBackgroundColor: "#177dff",
                               pointBorderWidth: 2,
                               pointHoverRadius: 4,
                               pointHoverBorderWidth: 1,
                               pointRadius: 4,
                               backgroundColor: 'transparent',
                               fill: true,
                               borderWidth: 2,
                               data: [<?php echo $data10; ?>]
                              }]
                             },
                   options : {
                              responsive: true,
                              maintainAspectRatio: false,
                              legend: {
                                       position: 'top',
                                      },
                              tooltips: {
                                         bodySpacing: 4,
                                         mode:"nearest",
                                         intersect: 0,
                                         position:"nearest",
                                         xPadding:10,
                                         yPadding:10,
                                         caretPadding:10
                                        },
                              layout:{
                                      padding:{left:15,right:15,top:15,bottom:15}
                                     }
                             }
                            });
                </script>

              </div><!-- card-body-->
            </div><!-- card-->

          </div><!-- /.col (LEFT) -->


          <div class="col-md-6">

            <!-- LINE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                    Averias por Sucursal
                </h3>
                <?php
                  $data10 = '';
                  $data20 = '';
                  $var10=0;
                  $vector_averias = array();
                  $sucursales = array();

                  $resul11=$activo1->Encontrar_Sucursal();
                  if($resul11)
                   {
                    $con11=1;
                    while($row11 = mysqli_fetch_array($resul11))
                     {
                      $abc_id[$con11]=$row11[0];
                      $abc_descripcion[$con11]=$row11[2];
                      $sucursales[$con11]=$abc_descripcion[$con11];
                      $con11++;
                     }
                   }

                  $resul1=$activo5->Totales_Averias_Dia();
                  if($resul1)
                   {
                    $con1=1;
                    while($row1 = mysqli_fetch_array($resul1))
                     {
                      $var10 = $row1[2];
                      $valor[$con1] = $row1[0];
                      
                      $vector_averias[$var10]=$valor[$con1];
                      //echo '<BR>'.$var10." --> ".$vector_averias[$var10]." = ".$valor[$con1];
                      $con1++;
                     }
                   }
                  
                  for($j=1;$j<$con11;$j++)
                   {
                    if(empty($vector_averias[$j]))
                     {
                      $vector_averias[$j]=0;
                     }
                   }

                  for($i=1;$i<$con11;$i++)
                   {
                    $data10 = $data10 . '"'. $vector_averias[$i].'",';
                   }

                  for($j=1;$j<$con11;$j++)
                   {
                    $data20 = $data20 . '"'. $sucursales[$j].'",';
                   }

                  /*for($i=2,$k=1;$i<=8;$i++,$k++)
                   {
                    echo '<BR>'."Fila$k:  ";
                    for($j=1;$j<=$con9;$j++)
                     {
                      echo "  ".$mat[$i][$j];
                     }
                   }*/
                   //echo '<BR>'.$data10;
                   //echo '<BR>'.$data20;
                   //echo '<BR>'.$data3;
                   //echo '<BR>'.$data4;
                ?>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="chart2" style="height:250px"></canvas>
                  <!--<canvas id="chart2" style="width: 200; height: 125; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>-->
                  <script>
                   var multipleLineChart = document.getElementById('chart2').getContext('2d');

                   var myMultipleLineChart = new Chart(multipleLineChart, {
                   type: 'line',
                   data: {
                   labels: [<?php echo $data20;?>],
                   datasets: [{
                               label: "Averiado",
                               borderColor: "#fdaf4b",
                               pointBorderColor: "#FFF",
                               pointBackgroundColor: "#fdaf4b",
                               pointBorderWidth: 2,
                               pointHoverRadius: 4,
                               pointHoverBorderWidth: 1,
                               pointRadius: 4,
                               backgroundColor: 'transparent',
                               fill: true,
                               borderWidth: 2,
                               data: [<?php echo $data10; ?>]
                              }]
                             },
                   options : {
                              responsive: true, 
                              maintainAspectRatio: false,
                              legend: {
                                       position: 'top',
                                      },
                              tooltips: {
                                         bodySpacing: 4,
                                         mode:"nearest",
                                         intersect: 0,
                                         position:"nearest",
                                         xPadding:10,
                                         yPadding:10,
                                         caretPadding:10
                                        },
                              layout:{
                                      padding:{left:15,right:15,top:15,bottom:15}
                                     }
                             }
                            });
                  </script>

                </div><!-- /.chart-->
              </div><!-- /.card-body-->
            </div><!-- /.card-->


            <!-- BAR CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                    Fallas por Sucursal
                </h3>
                <?php
                  $data10 = '';
                  $data20 = '';
                  $var10=0;
                  $vector_fallas = array();
                  $sucursales = array();

                  $resul11=$activo1->Encontrar_Sucursal();
                  if($resul11)
                   {
                    $con11=1;
                    while($row11 = mysqli_fetch_array($resul11))
                     {
                      $abc_id[$con11]=$row11[0];
                      $abc_descripcion[$con11]=$row11[2];
                      $sucursales[$con11]=$abc_descripcion[$con11];
                      $con11++;
                     }
                   }

                  $resul1=$activo5->Totales_Fallas_Dia();
                  if($resul1)
                   {
                    $con1=1;
                    while($row1 = mysqli_fetch_array($resul1))
                     {
                      $var10 = $row1[2];
                      $valor[$con1] = $row1[0];
                      
                      $vector_fallas[$var10]=$valor[$con1];
                      //echo '<BR>'.$var10." --> ".$vector_fallas[$var10]." = ".$valor[$con1];
                      $con1++;
                     }
                   }
                  
                  for($j=1;$j<$con11;$j++)
                   {
                    if(empty($vector_fallas[$j]))
                     {
                      $vector_fallas[$j]=0;
                     }
                   }

                  for($i=1;$i<$con11;$i++)
                   {
                    $data10 = $data10 . '"'. $vector_fallas[$i].'",';
                   }

                  for($j=1;$j<$con11;$j++)
                   {
                    $data20 = $data20 . '"'. $sucursales[$j].'",';
                   }

                  /*for($i=2,$k=1;$i<=8;$i++,$k++)
                   {
                    echo '<BR>'."Fila$k:  ";
                    for($j=1;$j<=$con9;$j++)
                     {
                      echo "  ".$mat[$i][$j];
                     }
                   }*/
                   //echo '<BR>'.$data10;
                   //echo '<BR>'.$data20;
                   //echo '<BR>'.$data3;
                   //echo '<BR>'.$data4;
                ?>


                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <!--<canvas id="chart4" style="height:230px"></canvas>-->
                  <canvas id="chart4" style="height:230px"></canvas>

                  <script>

                  var barChart = document.getElementById('chart4').getContext('2d');

                  var myBarChart = new Chart(barChart, {
                      type: 'horizontalBar',
                      data: {
                      labels: [<?php echo $data20;?>],
                      datasets : [{
                      label: "Fallas",
                      backgroundColor: '#F7464A',
                      borderColor: '#F7464A',
                      data: [<?php echo $data10;?>],
                      }],
                      },
                      options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                      yAxes: [{
                      ticks: {
                      beginAtZero:true
                      }
                      }]
                      },
                      }
                      });
                  </script>

                </div><!-- /.chart-->
              </div><!-- /.card-body-->
            </div><!-- /.card-->


          </div><!-- /.col-->
        </div><!-- /.row-->


          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fa fa-line-chart"></i>
                      Sucursales - Areas
                  </h3>
                
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-bordered">
                        <?php
                          $resul8=$activo8->Contar_Areas();
                          echo "<tr class='bg-info'>";
                          echo "<th class='text-center'>Sucursales</th>";
                          if($resul8)
                           {
                            $con8=0;
                            while($row8 = mysqli_fetch_array($resul8))
                             {
                              $ijk_descripcion_ciclo[$con8]=$row8[2];
                              $ijk_descripcion[$con8]=$row8[3];

                              echo "<th class='text-center'>$ijk_descripcion_ciclo[$con8]</th>";
                              $con8++;
                             }
                           }
                           echo "</tr>";  
                        ?>

                        <?php
                          $matriz = array();
                          $pos1=0;
                          $pos2=0;

                          $resul1=$activo1->Encontrar_Sucursal();
                          if($resul1)
                           {
                            $con1=1;
                            while($row1 = mysqli_fetch_array($resul1))
                             {
                              $abc_id[$con1]=$row1[0];
                              $abc_descripcion[$con1]=$row1[2];
                              $con1++;
                             }
                           }
                          
                          $resul8=$activo8->Contar_Areas();
                          if($resul8)
                           {
                            $con8=1;
                            while($row8 = mysqli_fetch_array($resul8))
                             {
                              $ijk_id[$con8]=$row8[0];
                              $ijk_descripcion[$con8]=$row8[3];
                              $ijk_paso[$con8]=$row8[4];
                              $con8++;
                             }
                           }

                          $resul5=$activo5->Sucursales_Totales_Areas();
                          if($resul5)
                           {
                            $con5=1;
                            while($row5 = mysqli_fetch_array($resul5))
                             {
                              $pos1=$row5[0];
                              $def_descripcion_sucursal[$con5]=$row5[1];
                              $pos2=$row5[2];
                              $matriz[$pos1][$pos2]=1;
                              $con5++;
                             }
                           }
                          
                          for($i=1;$i<$con1;$i++)
                           {
                            echo "<tr>";
                            echo "<th class='text-center'>$abc_descripcion[$i]</th>";
                            for($j=1;$j<$con8;$j++)
                             {
                              if(@$matriz[$i][$j]==1)
                               {
                                echo "<td>";
                                  echo "<div class='wrapper text-center'>";
                                    echo "<div class='btn-group'>";
                                      //echo "<a href='javascript:void(0);' data-href='CargarContenidoModal.php?id=$jhonny' class='openPopup'>A</a>";
                                      echo "<a href='javascript:void(0);' data-href='CargarContenidoModal.php?id1=$abc_id[$i]&id2=$abc_id[$j]' class='openPopup' class='btn btn-sm btn-default' role='button'><i class='icon fa fa-check-circle'></i></a>";
                                      //echo "<button type='button' class='btn btn-sm btn-default'><a href='CargarContenidoModal.php?id=$jhonny' class='openPopup'><i class='icon fa fa-check-circle'></i></a></button>";
                                      //echo "<button type='button' class='btn btn-sm btn-default' data-toggle='modal' data-target='#miModal'><i class='icon fa fa-check-circle'></i></button>";
                                    echo "</div>";
                                  echo "</div>";
                                echo "</td>";
                               }
                              else
                               {
                                echo "<td></td>";
                                //echo "</td>";
                               }
                             }
                             echo "</tr>";
                           }
                        ?>
                
                      </table>
                    </div><!-- /.table-responsive -->
                  </div><!-- /.card-body -->
              </div><!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
            <div class="col-md-9">
              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1do_cYWibScJh9sYAw2dOOWpAZ1OoF-tZ" width="640" height="480"></iframe>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!--<br></br>-->
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalRegular">Vista Atlas</button>
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalSatellite">Vista Satelite</button>
                <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalCustom">Vista Relieve</button>
                <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#modalPersonalizado">Vista Terrestre</button>
              </div>
            </div>
          </div>


<!--Modal: Name-->
<div class="modal fade" id="modalRegular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body mb-0 p-0">
        <!--Google map-->
        <div id="map-container-google-16" class="z-depth-1-half map-container-9" style="height: 400px">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Ex4PsQCeoq2e12Es2jUc6RHCLnHMuk_d"
           frameborder="0" width="100%" height="450" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Cerrar<i class="fas fa-map-marker-alt ml-1"></i></button>
      </div>
    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: Name-->


<!--Modal: Name-->
<div class="modal fade" id="modalSatellite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body mb-0 p-0">
        <!--Google map-->
        <div id="map-container-google-17" class="z-depth-1-half map-container-10" style="height: 400px">
         <iframe src="https://www.google.com/maps/d/u/0/embed?mid=14YZq1RBLpDiY8KRErhHM80n75jYLfwDC" 
          frameborder="0" width="100%" height="450" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
       <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Cerrar<i class="fas fa-map-marker-alt ml-1"></i></button></div>
      </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: Name-->


<!--Modal: Name-->
<div class="modal fade" id="modalCustom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body mb-0 p-0">
        <!--Google map-->
        <div id="map-container-google-18" class="z-depth-1-half map-container-11"  style="height: 400px">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Zd2cZpBsyTwgzV4lJaHs6ZI9HKqtbqTH" 
           frameborder="0" width="100%" height="450" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <!--Footer-->

      <div class="modal-footer justify-content-center">
       <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Cerrar<i class="fas fa-map-marker-alt ml-1"></i></button></div>
      </div>
    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: Name-->


<!--Modal: Name-->
<div class="modal fade" id="modalPersonalizado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body mb-0 p-0">
        <!--Google map-->
        <div id="map-container-google-18" class="z-depth-1-half map-container-11"  style="height: 400px">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1HHe35Dwed17M5aDNgIHdC0yxT6l1Dzg9" 
           frameborder="0" width="100%" height="450" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <!--Footer-->

      <div class="modal-footer justify-content-center">
       <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Cerrar<i class="fas fa-map-marker-alt ml-1"></i></button></div>
      </div>
    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: Name-->


<!-- Modal de la Matriz de Sucursales por Area -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable">
    <!-- Modal contenido-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h6 class="modal-title text-dark">Detalles de Area por Sucursal</h6>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div><!-- Fin de los DIV Modal -->



      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->


  <br></br>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block"></div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside><!-- /.control-sidebar -->

</div><!-- ./wrapper -->


<script>
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4',
  });
</script>


<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="./plugins/chartjs-old/Chart.min.js"></script>
<!-- FastClick -->
<script src="./plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>


<script>
  $(document).ready(function()
    {
     $('.openPopup').on('click',function()
       {
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function()
         {
          $('#myModal1').modal({show:true});
         });
       }); 
    });
</script>

</form>
</body>
</html>