<?php
include("seguridad.php");
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/cylinder.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <link rel="stylesheet" href="https://github.com/downloads/lafeber/world-flags-sprite/flags16.css" />


<style type="text/css">
#container10 {
  min-width: 310px;
  max-width: 800px;
  height: 600px;
  margin: 0 auto;
} ?>
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

    </div><!-- /.sidebar-menu -->
  </aside><!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">


        <div class="row">

          <div class="col-12 col-sm-6 col-md-4">
           <!-- Apply any bg-* class to to the info-box to color it -->
           <div class="info-box bg-primary">
            <!-- <a href="./saig.php" class="nav-link">-->
            <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-cogs fa-2x"></i></a></span>
            <!--</a>-->
            <div class="info-box-content">
             <a href="#" class="nav-link" data-toggle="modal" data-target="#dialogo2">
              <span class="info-box-text">SUB-AREAS</span>
             </a>
             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
              <span class="progress-description">
              </span>
            </div>
           </div>  
           <!-- /.info-box-content -->
           <!-- /.info-box -->
          </div>


         <div class="col-12 col-sm-6 col-md-4">
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-danger">
           <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-shopping-cart fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="#" class="nav-link">
              <span class="info-box-text">CAJAS</span>
             </a>

             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              
             </span>
            </div>
          </div>  
          <!-- /.info-box-content -->
          <!-- /.info-box -->
         </div>

         <div class="col-12 col-sm-6 col-md-4">
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-success">
           <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-puzzle-piece fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="#" class="nav-link">
              <span class="info-box-text">ITEMS</span>
             </a>
             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              
             </span>
            </div>
          </div>  
          <!-- /.info-box-content -->
          <!-- /.info-box -->
         </div>


        </div>


        <div class="row">

         <div class="col-12 col-sm-6 col-md-4">
          
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-dark">
           <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-building fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="#" class="nav-link">
              <span class="info-box-text">SUCURSALES</span>
             </a>

             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              
             </span>
            </div>
          </div>  
          <!-- /.info-box-content -->
          <!-- /.info-box -->
          </div>  


          <div class="col-12 col-sm-6 col-md-4">
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-warning">
           <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-check fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="#" class="nav-link"> 
              <span class="info-box-text">STATUS</span>
             </a>

             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              
             </span>
            </div>
          </div>  
          <!-- /.info-box-content -->
          <!-- /.info-box -->
         </div>

         <div class="col-12 col-sm-6 col-md-4">
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-info">
           <span class="info-box-icon elevation-1"><a href="#" class="nav-link"><i class="fa fa-users fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="#" class="nav-link">
              <span class="info-box-text">USUARIOS</span>
             </a>

             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              
             </span>
            </div>
          </div>
          <!-- /.info-box-content -->
          <!-- /.info-box -->
         </div>

        </div>

        <?php
          $rand = array('1','2','3','4','5','6','7','8','9','10','11','12');
          $dataprueba='';

          for($i=0;$i<12;$i++)
           {
            //$dataprueba = $dataprueba . $rand[rand(0,12)] .',';
            $dataprueba = $dataprueba . $rand[$i] .',';
           }
          //var_dump($dataprueba);
          //echo '<BR>'.$dataprueba;

        ?>


        <div class="row">
          <div class="col-sm-12 col-md-12 col-xs-12">
            <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
              <script>
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Top 10 Items mas AVERIAS Febrero 2020'
  },
  subtitle: {
    text: 'Fuente: <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Cantidad de Fallas'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Population in 2019: <b>{point.y:.1f} millions</b>'
  },
  series: [{
    name: 'Population',
    data: [
           ['VPOS', 343],['Banda', 206],['Punto Sofitasa', 101],['Monitor Lateral', 65],['Punto BNC', 56],['Multifuncionales', 52],['Camara', 42],['Domos', 33],['Balanza', 32],['Antenas de Seguridad', 29]
           ],
    dataLabels: {
                 enabled: true,
                 rotation: -90,
                 color: '#FFFFFF',
                 align: 'left',
                 format: '{point.y:.0f}', // one decimal
                 y: 10, // 10 pixels down from the top
                 style: {
                         fontSize: '10px',
                         fontFamily: 'Verdana, sans-serif'
                        }
                }
          }]
  });
              </script>
          </div>
        </div>



        <br></br>
        <div class="row">
          <div class="col-md-6">
            <div id="container2"></div>
              <script>
                Highcharts.chart('container2', {
                                                chart: {
                                                        type: 'column', options3d: {
                                                                                    enabled: true,
                                                                                    alpha: 10,
                                                                                    beta: 25,
                                                                                    depth: 70
                                                                                   }
                                                       },
                                                title: {
                                                        text: '3D chart with null values'
                                                       },
                                                subtitle: {
                                                           text: 'Notice the difference between a 0 value and a null point'
                                                          },
                                                plotOptions: {
                                                              column: {
                                                                       depth: 25
                                                                      }
                                                             },
                                                xAxis: {
                                                        categories: ['VPOS', 'MONITOR', 'PLATCO', 'IMPRESORA', 'UPS', 'TECLADO', 'BALANZA', 'CAMARA', 'PUNTO BNC', 'BANDA'],
                                                labels: {
                                                         skew3d: true,
                                                         style: {
                                                                 fontSize: '16px'
                                                                }
                                               }
                                },
                                  yAxis: {
                                          title: {
                                                  text: null
                                                 }
                                         },
                                  series: [
                                          {
                                            name: 'Ventas',data: [20, 30, 35, 40, 10, 50, 11, 40, 60, 33]
                                          }
                                          ]
                });                
              </script>
          </div>
        <!--</div>
        

        <br></br>
        <div class="row">-->
          <div class="col-md-6">
            <div id="container4" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
              <script>
                Highcharts.chart('container4',
                  {
                   chart: {
                           type: 'bar'
                          },
                   title: {
                           text: 'Averias, Reparaciones y Fallas por Sucursal Febrero 2020'
                          },
                   subtitle: {
                              text: 'Fuente: <a href="http://cicloservicio.elgarzon.com">cicloservicio.elgarzon.com</a>'
                             },
                   xAxis: {
                           categories: ['Rotaria', 'Merida', 'Barinas', 'Acarigua', 'Barquisimeto', 'San Josesito', 'Pueblo Nuevo', 'Castellana', 'Santa Barbara', 'Cabimas', 'Ejido', 'Madre Juana', 'Alto Chama', 'Lagunillas', 'Paramillo'],
                           title: {
                                   text: null
                                  }
                          },
                   yAxis: {
                           min: 0,
                           title: {
                                   text: 'Cantidades',
                                   align: 'high'
                                  },
                   labels: {
                            overflow: 'justify'
                           }
                  },
                  tooltip: {
                            valueSuffix: ' cientos'
                           },
                            plotOptions: {
                                          bar: {
                                                dataLabels: {
                                                             enabled: true
                                                            }
                                               }
                                         },
                            legend: {
                                     layout: 'vertical',
                                     align: 'right',
                                     verticalAlign: 'top',
                                     x: 5,
                                     y: 40,
                                     floating: true,
                                     borderWidth: 1,
                                     backgroundColor:
                                     Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                                     shadow: true
                                    },
                            credits: {
                                      enabled: false
                                     },
                            series: [{
                                      name: 'Averia',
                                      data: [3,126,11,50,231,0,160,20,267,354,146,37,32,1,5]
                                     },
                                     {
                                      name: 'Reparación',
                                      data: [0,18,0,21,0,0,0,0,237,0,0,0,0,9,1]
                                     },
                                     {
                                      name: 'Falla',
                                      data: [3,204,6,310,84,0,207,0,483,1,47,70,87,34,1]
                                    }]
                  }
                );
              </script>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div id="container10"></div>
              <script>
               Highcharts.chart('container10', {
                                                colors: ['#FFFF00', '#177DFF', '#F7464A'],
                                                chart: {
                                                        type: 'column',
                                                        inverted: true,
                                                        polar: true
                                                       },
                                                title: {
                                                        text: 'Averias, Reparaciones y Fallas por Sucursal 2019'
                                                       },
                                                tooltip: {
                                                          outside: true
                                                         },
                                                pane: {
                                                       size: '75%',
                                                       endAngle: 270
                                                      },
                                                xAxis: {
                                                        tickInterval: 1,
                                                        labels: {
                                                                 align: 'right',
                                                                 useHTML: true,
                                                                 allowOverlap: true,
                                                                 step: 1,
                                                                 y: 4,
                                                                 style: {
                                                                         fontSize: '12px'
                                                                        }
                                                                },
                                                lineWidth: 0,
                                                categories: [
      'Rotaria <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Merida <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Barinas <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Acarigua <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Barquisimeto <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'San Josecito <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Pueblo Nuevo <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Castellana <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Santa Barbara <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Cabimas <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Ejido <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Madre Juana <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Alto Chama <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Lagunillas <span class="f16"><span id="flag" class="flag ve">' + '</span></span>',
      'Paramillo <span class="f16"><span id="flag" class="flag ve">' + '</span></span>'
    ]
  },
  yAxis: {
    lineWidth: 0,
    tickInterval: 25,
    reversedStacks: false,
    endOnTick: true,
    showLastLabel: true
  },
  plotOptions: {
    column: {
      stacking: 'normal',
      borderWidth: 0,
      pointPadding: 0,
      groupPadding: 0.15
    }
  },
  series: [{
    name: 'Averias',
    data: [1, 151, 41, 165, 270, 4, 83, 9, 256, 422, 125, 132, 29, 3, 5]
  }, {
    name: 'Reparaciones',
    data: [0, 26, 0, 89, 1, 6, 0, 0, 267, 0, 1, 11, 9, 12, 0]
  }, {
    name: 'Fallas',
    data: [1, 398, 21, 656, 149, 21, 128, 0, 330, 7, 170, 286, 159, 96, 0]
  }]
});
</script>




<!-- MODAL DE SUB-AREAS -->
<div class="modal fade" id="dialogo2" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
      
            <!-- cabecera del diálogo -->
            <div class="modal-header">
              <h4 class="modal-title">Registrar Sub-Area:</h4>
              <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
      
            <!-- cuerpo del diálogo -->
            <div class="modal-body">
                <div class="container-fluid">   
                    <form>
                      <div class="form-group row">
                          <label for="usuario" class="col-lg-3 col-form-label">Nombre Sub-Area:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" id="usuario">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="clave" class="col-lg-3 col-form-label">Seleccione Area:</label>
                          <div class="col-lg-9">
                            <input type="password" class="form-control" id="clave">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-lg-3 col-lg-9">
                            <!--<button type="submit" class="btn btn-default">Entrar</button>-->
                          </div>
                      </div>
                    </form>                    
                </div>            
            </div>
            <!-- pie del diálogo -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
      
          </div>
        </div>
      </div>
  </div>






        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    </div>
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
    <div class="float-right d-none d-sm-block-down">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>

</body>
</html>