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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Grupo Garzon C.A. | Ciclo de Servicio</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Icono Garzon -->
  <link rel="shortcut icon" href="dist/img/favicon.png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <script src="Chart.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/cylinder.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>


  <style>
    body,html{
              width:100%;
              height:100%;
              padding:0px;
              margin:0px;
             }
             .modal-dialog{
              height:calc(100% - 60px);
              }
             .modal-content{
              height:100%;
              }
             .modal-header{
              height:50px;
              }
             .model-footer{
              height:75px;
              }
             .modal-body {
              height:calc(100% - 125px);
              overflow-y: scroll;     /*give auto it will take based in content */
             }
  </style>

  <style type="text/css">
   #container2, #sliders {
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
   }

   #container2 {
    height: 400px; 
   }

   #container3 {
    height: 400px;
    min-width: 400px;
    max-width: 1000px;
    margin: 0 auto;
   }
  </style>

</head>



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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <div class="row">
          <div class="col-lg-3 col-6">
          <?php
            $resul5=$activo5->Totales_Diarios_Status();
            if($resul5)
             {
              $con5=0;
              $flag1=0;
              $flag2=0;
              $flag3=0;
              $flag4=0;
              while($row5 = mysqli_fetch_array($resul5))
               { 
                $zzz_descripcion[$con5] = $row5[0];
                $zzz_total[$con5] = $row5[1];
                //echo '<BR>'.$zzz_descripcion[$con5];
                //echo '<BR>'.$zzz_total[$con5];

                if($zzz_descripcion[$con5]=='Bien')
                 {
                  $flag1 = $zzz_total[$con5];
                 }

                if($zzz_descripcion[$con5]=='Averiado')
                 {
                  $flag2 = $zzz_total[$con5];
                 }

                if($zzz_descripcion[$con5]=='Reparacion')
                 {
                  $flag3 = $zzz_total[$con5];
                 }

                if($zzz_descripcion[$con5]=='Falla')
                 {
                  $flag4 = $zzz_total[$con5];
                 }

                $con5++;
               }
             }

            $resul6=$activo6->Encontar_Total_Detalle();
            if($resul6)
             {
              $con1=0;
              while($row = mysqli_fetch_array($resul6))
               { 
                $aaa_descripcion[$con1] = $row[0];
                $aaa_total[$con1] = $row[1];
                //echo '<BR>'.$aaa_descripcion[$con1];
                //echo '<BR>'.$aaa_total[$con1];
                $con1++;
               }
             }
          ?>
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $aaa_total[0];?></h3>

                <p><?php echo $aaa_descripcion[0];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $flag1;?> Hoy <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $aaa_total[1];?><sup style="font-size: 20px"></sup></h3>

                <p><?php echo $aaa_descripcion[1];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-wrench"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $flag2;?> Hoy <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $aaa_total[2];?></h3>

                <p><?php echo $aaa_descripcion[2];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-settings"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $flag3;?> Hoy <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $aaa_total[3];?></h3>

                <p><?php echo $aaa_descripcion[3];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-close-circled"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $flag4;?> Hoy <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
        </div><!-- /.row -->


        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                    Totales de Fallas por Sucursal
                </h3>
                <?php
                  $valor1=0;
                  $data11 = '';
                  $data22 = '';
                  $total_sucursal=0;
                  $porcentaje = array();
                  $matriz_fallas = array();
                  $matriz_porcentajes = array();
                  $totales_sucursales = array();

                  $resul6=$activo6->Totales_Fallas_Sucursal();
                  if($resul6)
                   {
                    $con11=0;
                    while($row11 = mysqli_fetch_array($resul6))
                     {
                      $abc_id[$con11]=$row11[0];
                      $abc_sucursal[$con11]=$row11[1];
                      $abc_total[$con11]=$row11[2];
                      //echo '<BR>'.$abc_total[$con11];
                      $total_sucursal = ($total_sucursal + $abc_total[$con11]);

                      $resul12=$activo6->Encontrar_Area_Status($abc_id[$con11]);
                      if($resul12)
                       {
                        $con12=1;
                        while($row12 = mysqli_fetch_array($resul12))
                         {
                          $valor1=$row12[0];
                          $def_total[$con12]=$row12[2];
                          //echo '<br>'.$valor1;
                          //echo '<br>'.$def_total[$con12];
                          $matriz_fallas[$con11][$valor1]=$def_total[$con12];
                          //echo '<BR>'."[".$con11."][".$valor1."]"." --> ".$matriz_fallas[$con11][$valor1]." = ".$def_total[$con12];
                          @$totales_sucursales[$con11] = ($totales_sucursales[$con11] + $def_total[$con12]);
                          $con12++;
                         }
                       }

                      $con11++;
                     }
                   }
                   //echo '<br>'.$total_sucursal;
                   //echo '<br>'.$con11++;
                   //echo '<br>';
                   
                   for($i=0;$i<$con11;$i++)
                    {
                     @$porcentaje[$i] = (($abc_total[$i] * 100)/$total_sucursal);
                    }

                   for($j=0;$j<$con11;$j++)
                    {
                     for($k=1;$k<=9;$k++)
                      {
                       if(empty($matriz_fallas[$j][$k]))
                        {
                         $matriz_fallas[$j][$k]=0;
                        }
                      }
                    }

                   for($j=0;$j<$con11;$j++)
                    {
                     for($k=1;$k<=9;$k++)
                      {
                       @$matriz_porcentajes[$j][$k] = (($matriz_fallas[$j][$k]*100)/$totales_sucursales[$j]);
                      }
                    }
                //echo '<BR>'.$con11;
                //echo '<BR>';
                //echo print_r($matriz_porcentajes);
                ?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  
                <script>
                  // Create the chart
                  Highcharts.chart('container4', {
                  chart: {
                          type: 'column'
                         },
                  title: {
                          text: 'Porcentaje(%) de Fallas por cada Sucursal para el Ciclo de Servicio'
                         },
                  subtitle: {
                             text: 'Presione Click en cada una de las columnas para mas detalles'
                            },
                  xAxis: {
                          type: 'category'
                         },
                  yAxis: {
                          title: {
                                  text: 'Porcentaje por Sucursales'
                                 }
                         },
                  legend: {
                           enabled: false
                          },
                  plotOptions: {
                                series: {
                                         borderWidth: 0,
                                         dataLabels: {
                                                      enabled: true,
                                                      format: '{point.y:.2f}%'
                                                     }
                                        }
                               },
                  tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> total<br/>'
                           },
                  series: [{
                            name: "Sucursales CC",
                            colorByPoint: true,
                            data: [{
                                    name: "Rotaria",y: <?php echo $porcentaje[0];?>,drilldown: "Rotaria"
                                   },
                                   {
                                    name: "Merida",y: <?php echo $porcentaje[1];?>,drilldown: "Merida"
                                   },
                                   {
                                    name: "Barinas",y: <?php echo $porcentaje[2];?>,drilldown: "Barinas"
                                   },
                                   {
                                    name: "Acarigua",y: <?php echo $porcentaje[3];?>,drilldown: "Acarigua"
                                   },
                                   {
                                    name: "Barquisimeto",y: <?php echo $porcentaje[4];?>,drilldown: "Barquisimeto"
                                   },
                                   {
                                    name: "San Josecito",y: <?php echo $porcentaje[5];?>,drilldown: "San Josecito"
                                   },
                                   {
                                    name: "Pueblo Nuevo",y: <?php echo $porcentaje[6];?>,drilldown: "Pueblo Nuevo"
                                   },
                                   {
                                    name: "Castellana",y: <?php echo $porcentaje[7];?>,drilldown: "Castellana"
                                   },
                                   {
                                    name: "Santa Barbara",y: <?php echo $porcentaje[8];?>,drilldown: "Santa Barbara"
                                   },
                                   {
                                    name: "Cabimas",y: <?php echo $porcentaje[9];?>,drilldown: "Cabimas"
                                   },
                                   {
                                    name: "Ejido",y: <?php echo $porcentaje[10];?>,drilldown: "Ejido"
                                   },
                                   {
                                    name: "Madre Juana",y: <?php echo $porcentaje[11];?>,drilldown: "Madre Juana"
                                   },
                                   {
                                    name: "Alto Chama",y: <?php echo $porcentaje[12];?>,drilldown: "Alto Chama"
                                   },
                                   {
                                    name: "Lagunillas",y: <?php echo $porcentaje[13];?>,drilldown: "Lagunillas"
                                   },
                                   {
                                    name: "Paramillo",y: <?php echo $porcentaje[14];?>,drilldown: "Paramillo"
                                   }]
                          }],
                  drilldown: {
                              series: [
                                       {
                                        name: "Rotaria",id: "Rotaria",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[0][1];?>],["Balanzas",<?php echo $matriz_porcentajes[0][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[0][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[0][4];?>],["REDCOM",<?php echo $matriz_porcentajes[0][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[0][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[0][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[0][8];?>],["CCTV",<?php echo $matriz_porcentajes[0][9];?>] ]
                                       },
                                       {
                                        name: "Merida",id: "Merida",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[1][1];?>],["Balanzas",<?php echo $matriz_porcentajes[1][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[1][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[1][4];?>],["REDCOM",<?php echo $matriz_porcentajes[1][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[1][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[1][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[1][8];?>],["CCTV",<?php echo $matriz_porcentajes[1][9];?>] ]
                                       },
                                       {
                                        name: "Barinas",id: "Barinas",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[2][1];?>],["Balanzas",<?php echo $matriz_porcentajes[2][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[2][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[2][4];?>],["REDCOM",<?php echo $matriz_porcentajes[2][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[2][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[2][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[2][8];?>],["CCTV",<?php echo $matriz_porcentajes[2][9];?>] ]
                                       },
                                       {
                                        name: "Acarigua",id: "Acarigua",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[3][1];?>],["Balanzas",<?php echo $matriz_porcentajes[3][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[3][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[3][4];?>],["REDCOM",<?php echo $matriz_porcentajes[3][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[3][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[3][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[3][8];?>],["CCTV",<?php echo $matriz_porcentajes[3][9];?>] ]
                                       },
                                       {
                                        name: "Barquisimeto",id: "Barquisimeto",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[4][1];?>],["Balanzas",<?php echo $matriz_porcentajes[4][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[4][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[4][4];?>],["REDCOM",<?php echo $matriz_porcentajes[4][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[4][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[4][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[4][8];?>],["CCTV",<?php echo $matriz_porcentajes[4][9];?>] ]
                                       },
                                       {
                                        name: "San Josecito",id: "San Josecito",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[5][1];?>],["Balanzas",<?php echo $matriz_porcentajes[5][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[5][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[5][4];?>],["REDCOM",<?php echo $matriz_porcentajes[5][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[5][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[5][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[5][8];?>],["CCTV",<?php echo $matriz_porcentajes[5][9];?>] ]
                                       },
                                       {
                                        name: "Pueblo Nuevo",id: "Pueblo Nuevo",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[6][1];?>],["Balanzas",<?php echo $matriz_porcentajes[6][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[6][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[6][4];?>],["REDCOM",<?php echo $matriz_porcentajes[6][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[6][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[6][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[6][8];?>],["CCTV",<?php echo $matriz_porcentajes[6][9];?>] ]
                                       },
                                       {
                                        name: "Castellana",id: "Castellana",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[7][1];?>],["Balanzas",<?php echo $matriz_porcentajes[7][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[7][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[7][4];?>],["REDCOM",<?php echo $matriz_porcentajes[7][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[7][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[7][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[7][8];?>],["CCTV",<?php echo $matriz_porcentajes[7][9];?>] ]
                                       },
                                       {
                                        name: "Santa Barbara",id: "Santa Barbara",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[8][1];?>],["Balanzas",<?php echo $matriz_porcentajes[8][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[8][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[8][4];?>],["REDCOM",<?php echo $matriz_porcentajes[8][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[8][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[8][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[8][8];?>],["CCTV",<?php echo $matriz_porcentajes[8][9];?>] ]
                                       },
                                       {
                                        name: "Cabimas",id: "Cabimas",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[9][1];?>],["Balanzas",<?php echo $matriz_porcentajes[9][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[9][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[9][4];?>],["REDCOM",<?php echo $matriz_porcentajes[9][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[9][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[9][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[9][8];?>],["CCTV",<?php echo $matriz_porcentajes[9][9];?>] ]
                                       },
                                       {
                                        name: "Ejido",id: "Ejido",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[10][1];?>],["Balanzas",<?php echo $matriz_porcentajes[10][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[10][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[10][4];?>],["REDCOM",<?php echo $matriz_porcentajes[10][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[10][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[10][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[10][8];?>],["CCTV",<?php echo $matriz_porcentajes[10][9];?>] ]
                                       },
                                       {
                                        name: "Madre Juana",id: "Madre Juana",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[11][1];?>],["Balanzas",<?php echo $matriz_porcentajes[11][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[11][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[11][4];?>],["REDCOM",<?php echo $matriz_porcentajes[11][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[11][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[11][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[11][8];?>],["CCTV",<?php echo $matriz_porcentajes[11][9];?>] ]
                                       },
                                       {
                                        name: "Alto Chama",id: "Alto Chama",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[12][1];?>],["Balanzas",<?php echo $matriz_porcentajes[12][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[12][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[12][4];?>],["REDCOM",<?php echo $matriz_porcentajes[12][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[12][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[12][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[12][8];?>],["CCTV",<?php echo $matriz_porcentajes[12][9];?>] ]
                                       },
                                       {
                                        name: "Lagunillas",id: "Lagunillas",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[13][1];?>],["Balanzas",<?php echo $matriz_porcentajes[13][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[13][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[13][4];?>],["REDCOM",<?php echo $matriz_porcentajes[13][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[13][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[13][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[13][8];?>],["CCTV",<?php echo $matriz_porcentajes[13][9];?>] ]
                                       },
                                       {
                                        name: "Paramillo",id: "Paramillo",
                                        data: [ ["SAIG",<?php echo $matriz_porcentajes[14][1];?>],["Balanzas",<?php echo $matriz_porcentajes[14][2];?>],["Linea de Caja",<?php echo $matriz_porcentajes[14][3];?>],["Puntos de Venta",<?php echo $matriz_porcentajes[14][4];?>],["REDCOM",<?php echo $matriz_porcentajes[14][5];?>],["Equipos Operativos",<?php echo $matriz_porcentajes[14][6];?>],["Equipos Administrativos",<?php echo $matriz_porcentajes[14][7];?>],["Fotocopiadoras",<?php echo $matriz_porcentajes[14][8];?>],["CCTV",<?php echo $matriz_porcentajes[14][9];?>] ]
                                       }
                                      ]
                             }
                  });
                </script>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                    Totales de Status
                </h3>
                <?php
                  $data1 = '';
                  $data2 = '';
                  $data3 = '';
                  $data4 = '';
                  $etiqueta = '';
                  
                  $resul7=$activo7->Totales_Status_Areas();
                  if($resul7)
                   {
                    $con1=0;
                    while ($row = mysqli_fetch_array($resul7))
                     {
                      if($row[0]==1)
                       {
                        $data1 = $data1 . $row[3] .',';
                       }
                      if($row[0]==2)
                       {
                        $data2 = $data2 . $row[3] .',';
                       }
                      if($row[0]==3)
                       {
                        $data3 = $data3 . $row[3] .',';
                       }
                      if($row[0]==4)
                       {
                        $data4 = $data4 . $row[3] .',';
                       }
                      //echo '<BR>'.$data1;
                      //echo '<BR>'.$data2;
                      //echo '<BR>'.$data3;
                      //echo '<BR>'.$data4;
                      $con1++;
                     }
                   }
                   //$data1 = trim($data1," ");
                   //$data2 = trim($data2," ");
                   //$etiqueta = trim($etiqueta," ");
                   //echo $data1;
                ?>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div id="container3" style="height: 400px"></div>
                  
                  <script>
                    Highcharts.chart('container3', 
                      {
                       chart: {
                               type: 'column',
                               options3d: {
                                           enabled: true,
                                           alpha: 15,
                                           beta: 15,
                                           viewDistance: 25,
                                           depth: 40
                                          }
                              },
                       title: {
                               text: 'Totales de Status por Areas del Ciclo de Servicios'
                              },
                       xAxis: {
                               categories: ['SAIG', 'Blnz', 'LnCj', 'PtVt', 'RedC', 'EqOp', 'EqAd', 'Ftcp', 'CCTV'],
                               labels: {
                                        skew3d: true,
                                        style: {
                                                fontSize: '16px'
                                               }
                                       }
                              },
                       yAxis: {
                               allowDecimals: false,
                               min: 0,
                               title: {
                                       text: 'Cantidad de Ocurrencias',
                                       skew3d: true
                                      }
                              },
                       tooltip: {
                                 headerFormat: '<b>{point.key}</b><br>',
                                 pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
                                },
                       plotOptions: {
                                     column: {
                                              stacking: 'normal',
                                              depth: 40
                                             }
                                    },
                       series: [{
                                 name: 'Bien',
                                 data: [<?php echo $data1;?>],
                                 stack: 'status1'
                                }, 
                                {
                                 name: 'Averiado',
                                 data: [<?php echo $data2;?>],
                                 stack: 'status2'
                                }, 
                                {
                                 name: 'Reparación',
                                 data: [<?php echo $data3;?>],
                                 stack: 'status3'
                                }, 
                                {
                                 name: 'Falla',
                                 data: [<?php echo $data4;?>],
                                 stack: 'status4'
                               }]
                      });
                  </script>  
              </div>
            </div>
          </div>
        </div>




        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">

            <!-- TABLE: ULTIMOS REGISTROS -->
            <div class="card card-warning">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                  <i class="fa fa-area-chart"></i>
                    Ultimos Registros Agregados
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Area</th>
                      <th>Sucursal</th>
                      <th>Fecha y Hora</th>
                      <th>Status</th>
                      <th>Usuario</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      $resul5=$activo5->Consultar_Diario_Ciclo();
                      if($resul5)
                       {
                        $con5=0;
                        while($row5=mysqli_fetch_array($resul5))
                         {
                          $abc_id[$con5]=$row5[0];
                          $abc_sucursal[$con5]=$row5[1];
                          $abc_fecha[$con5]=$row5[2];
                          $abc_usuario[$con5]=$row5[5];
                          $abc_caja[$con5]=$row5[6];

                          $fecha[$con5] = date('d/m/Y',strtotime($abc_fecha[$con5]));
                          $hora[$con5] = date('H:i:s',strtotime($abc_fecha[$con5]));
                          $salida_final[$con5] = $fecha[$con5]." - ".$hora[$con5];

                          $resul1=$activo1->Consultar_Nombre_Sucursal($abc_sucursal[$con5]);
                          if($resul1)
                           {
                            $con1=0;
                            while($row1=mysqli_fetch_array($resul1))
                             {
                              $def_id[$con1]=$row1[2];
                             }
                           }

                          $resul6=$activo6->Buscar_Detalle_Ciclo($abc_id[$con5]);
                          if($resul6)
                           {
                            $con6=0;
                            while($row6=mysqli_fetch_array($resul6))
                             {
                              $opq_total[$con6]=$row6[0];
                              $opq_status[$con6]=$row6[1];
                              $con6++;
                             }
                           }

                           if($opq_status[0]=='Bien')
                             {
                              $color = "badge badge-success";
                              $color2="#00a65a";
                             }
                           if($opq_status[0]=='Averiado')
                            {
                             $color = "badge badge-warning";
                             $color2="#f39c12";
                            }
                           if($opq_status[0]=='Reparacion')
                            {
                             $color = "badge badge-primary";
                             $color2="#00c0ef";
                            }
                           if($opq_status[0]=='Falla')
                            {
                             $color = "badge badge-danger";
                             $color2="#f56954";
                            }

                          $resul7=$activo7->Encontrar_Area_Item($abc_id[$con5]);
                          if($resul7)
                           {
                            $con7=0;
                            while($row7=mysqli_fetch_array($resul7))
                             {
                              $ijk_id_sub_area[$con7]=$row7[0];
                             }
                           }

                          $resul8=$activo8->Encontrar_Area(@$ijk_id_sub_area[$con7]);
                          if($resul8)
                           {
                            $con8=0;
                            while($row8=mysqli_fetch_array($resul8))
                             {
                              $mnl_descripcion[$con8]=$row8[3];
                             }
                           }

                          echo "<tr>";
                           echo "<td><a href='javascript:void(0);' data-href='CargarContenido.php?id=$abc_id[$con5]' class='openPopup' data-modal='#myModal1'>$mnl_descripcion[$con8]</a></td>";
                           echo "<td>$def_id[$con1]</td>";
                           echo "<td>$salida_final[$con5]</td>";
                           echo "<td><span class='$color'>$opq_status[0]</span></td>";
                           echo "<td>$abc_usuario[$con5]</td>";
                          echo "</tr>";
                          $con5++;
                         }
                       }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.card-body -->
            </div><!-- /.card-header -->

              <?php
                $resul51=$activo5->Consultar_Ciclo();
                if($resul51)
                 {
                  $con51=0;
                  while($row51=mysqli_fetch_array($resul51))
                   {
                    $con51++;
                   }
                 }

                $resul52=$activo5->Cantidad_Areas_Mes();
                if($resul52)
                 {
                  $con52=0;
                  while($row52=mysqli_fetch_array($resul52))
                   {
                    $abc_mes[$con52]=$row52[0];
                    $abc_cantidad[$con52]=$row52[1];
                    $con52++;
                   }
                 }

                $resul53=$activo5->Cantidad_Areas_Semana();
                if($resul53)
                 {
                  $con53=0;
                  while($row53=mysqli_fetch_array($resul53))
                   {
                    $def_cantidad[$con53]=$row53[0];
                   }
                 }

                $resul54=$activo5->Cantidad_Areas_Dia();
                if($resul54)
                 {
                  $con54=0;
                  while($row54=mysqli_fetch_array($resul54))
                   {
                    $ijk_cantidad[$con54]=$row54[0];
                   }
                 }
              ?>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i><?php echo $con51;?></span>
                      <span class="description-text">TOTAL REGISTROS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i><?php echo $abc_cantidad[0];?></span>
                      <span class="description-text">TOTAL DEL MES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i><?php echo $def_cantidad[$con53];?></span>
                      <span class="description-text">TOTAL SEMANA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-success"><i class="fa fa-caret-up"></i><?php echo $ijk_cantidad[$con54];?></span>
                      <span class="description-text">TOTAL DEL DIA</span>
                    </div><!-- /.description-block -->
                  </div>
                </div><!-- /.row -->
              </div><!-- /.card-footer -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->

      

    <!-- Modal 1 -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <!-- Modal contenido-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h5 class="modal-title text-dark">Detalle del Ciclo de Servicio</h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de los DIV Modal 1 -->



    <!-- Modal 2 -->
    <div class="modal fade" id="ModalStatus" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark"></h5>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
<!-- Fin de los DIV Modal 2 -->


    <!-- Modal 3 -->
    <div class="modal fade" id="modalCajas" tabindex="-1" role="dialog" aria-labelledby="modalCajas" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark"></h5>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
<!-- Fin de los DIV Modal 3 -->

      </div><!--/. container-fluid -->
    </section><!-- /.content -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->

                  <?php
                    $resul6=$activo6->Buscar_Total_Detalle();
                    if($resul6)
                     {
                      $con6=0;
                      $total=0;
                      $porcentaje=0;
                      while($row6=mysqli_fetch_array($resul6))
                       {
                        $opq_total[$con6]=$row6[0];
                        $opq_descripcion[$con6]=$row6[1];
                        
                        $total = $total + $opq_total[$con6];
                        $con6++;
                       }
                     }
                     $porcentaje1 = (($opq_total[0]*100)/$total);
                     $porcentaje2 = (($opq_total[1]*100)/$total);
                     $porcentaje3 = (($opq_total[2]*100)/$total);
                     $porcentaje4 = (($opq_total[3]*100)/$total);
                     
                     if($opq_descripcion[0]=='Averiado')
                      $color1 = "badge-warning";
                     if($opq_descripcion[0]=='Bien')
                      $color1 = "badge-success";
                     if($opq_descripcion[0]=='Reparacion')
                      $color1 = "badge-primary";
                     if($opq_descripcion[0]=='Falla')
                      $color1 = "badge-danger";
                      //echo '<BR>'."Color 1: ".$color1;
                     if($opq_descripcion[1]=='Averiado')
                      $color2 = "badge-warning";
                     if($opq_descripcion[1]=='Bien')
                      $color2 = "badge-success";
                     if($opq_descripcion[1]=='Reparacion')
                      $color2 = "badge-primary";
                     if($opq_descripcion[1]=='Falla')
                      $color2 = "badge-danger";
                      //echo '<BR>'."Color 2: ".$color2;
                     if($opq_descripcion[2]=='Averiado')
                      $color3 = "badge-warning";
                     if($opq_descripcion[2]=='Bien')
                      $color3 = "badge-success";
                     if($opq_descripcion[2]=='Reparacion')
                      $color3 = "badge-primary";
                     if($opq_descripcion[2]=='Falla')
                      $color3 = "badge-danger";
                      //echo '<BR>'."Color 3: ".$color3;
                     if($opq_descripcion[3]=='Averiado')
                      $color4 = "badge-warning";
                     if($opq_descripcion[3]=='Bien')
                      $color4 = "badge-success";
                     if($opq_descripcion[3]=='Reparacion')
                      $color4 = "badge-primary";
                     if($opq_descripcion[3]=='Falla')
                      $color4 = "badge-danger";
                      //echo '<BR>'."Color 4: ".$color4;
                  ?>

        </div>


      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="./dist/js/demo.js"></script>
<!-- FastClick -->
<script src="./plugins/fastclick/fastclick.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="./plugins/chartjs-old/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="./plugins/sparkline/jquery.sparkline.min.js"></script>


<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>



<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var modal = $(this).attr('data-modal');
        $('.modal-body').load(dataURL,function(){
            $('#myModal1').modal({show:true});
        });
    }); 
});
</script>


</form>
</body>
</html>