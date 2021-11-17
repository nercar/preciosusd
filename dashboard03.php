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
$activo10 = new caja("","","");
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

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


  <script>
    $(document).ready(function()
     {
      $('.openPopup').on('click',function()
       {
        var dataURL = $(this).attr('data-href');
        var modal = $(this).attr('data-modal');
        $('.modal-body').load(dataURL,function()
         {
          $('#myModal1').modal({show:true});
         });
       }); 
     });
</script>

</head>


<body class="hold-transition sidebar-mini">
<form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light border-bottom">
    <!-- Left navbar links -->
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

    <!--<div class="card-footer">
     <label class="control-label col-sm-2 requiredField">Fecha: </label>
      <div class="input-group">
       <input name="datepicker" id="datepicker" width="225" />
        <span class="input-group-append">
          <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
        </span>
      </div>
    </div>-->
    <p></p>
    <div class="row">
      <div class="offset-md-2 col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header bg-info text-white">
            <h4 class="card-title">Listado por Rango de Fechas:</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-10">
                <h5 class='text-primary'>Sucursal:</h5>
                <select class="custom-select" name="sucursal" id="sucursal">
                  <option value="0">Todas</option>
                    <?php
                      $resul1=$activo1->Consultar_Sucursal();
                      if($resul1)
                       {
                        $con1=0;
                        while($row1=mysqli_fetch_array($resul1))
                         {
                          $opq_id[$con1]=$row1[0];
                          $opq_descripcion[$con1]=$row1[2];
                    ?>
                  <option value="<?php echo $opq_id[$con1]?>"><?php echo $opq_descripcion[$con1]?> </option>
                    <?php
                          $con1++;
                         }
                       }
                    ?>
                </select>
                <p></p>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 class='text-primary'>Fecha Inicial:</h5>
                  <div class="input-group">
                    <input name="datepicker1" id="datepicker1" width="225" required>
                    <div class="invalid-tooltip">Por favor seleccione la Fecha</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 class='text-primary'>Fecha Final:</h5>
                  <div class="input-group">
                    <input name="datepicker2" id="datepicker2" width="225" required>
                    <div class="invalid-tooltip">Por favor seleccione la Fecha</div>
                  </div>
                </div>
              </div>
            </div>
            <p></p>
            <div class="row">
              <!-- <div class="col-sm-12 col-md-12 col-xs-12"> -->
                <div class="mx-auto">
                  <input name="consultar" type="submit" class="btn btn-primary btn-sm" id="consultar" value="Consultar"/>
                </div>
              <!--</div>-->
            </div>
          </div>  
        </div>  
      </div>  
    </div>

    <?php
      if(@$_POST[consultar])
       {
        //echo '<br>'.@$_POST["sucursal"];
        //echo '<br>'.@$_POST["datepicker1"];
        //echo '<br>'.@$_POST["datepicker2"];
    ?>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">

            <!-- TABLE: ULTIMOS REGISTROS -->
            <div class="card card-secondary">
              <div class="card-header border-transparent">
                <h3 class="card-title">Registros Agregados</h3>

                <div class="card-tools">
                  <button id="exportButton" class="btn btn-success clearfix"><span class="fa fa-file-excel-o"></span> Excel</button>
                </div>
              </div><!-- /.card-header -->

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="exportTable" class="table m-0">
                    <thead>
                    <tr>
                      <th>Area</th>
                      <th>Sucursal</th>
                      <th>Item</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Status</th>
                      <th>Caja</th>
                      <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      $nueva_fecha1 = @$_POST[datepicker1];
                      $nueva_fecha2 = @$_POST[datepicker2];
                      $nueva_sucursal = @$_POST[sucursal];
                      $ultima_fecha1 = date('Y/m/d',strtotime($nueva_fecha1));
                      $ultima_fecha2 = date('Y/m/d',strtotime($nueva_fecha2));
                      $color1='';
                      $color2='';

                      //$resul5=$activo5->Encontrar_Diario_Fechas($ultima_fecha,$nueva_sucursal);
                      $resul5=$activo5->Encontrar_Diario_Fechas_Multiples($ultima_fecha1,$ultima_fecha2,$nueva_sucursal);
                      if($resul5)
                       {
                        $con5=0;
                        while($row5=mysqli_fetch_array($resul5))
                         {
                          $abc_id[$con5]=$row5[0];
                          $abc_sucursal[$con5]=$row5[1];
                          $abc_fecha[$con5]=$row5[2];
                          $abc_observaciones[$con5]=$row5[4];
                          $abc_usuario[$con5]=$row5[5];
                          $abc_caja[$con5]=$row5[6];

                          $fecha1[$con5] = date_create($abc_fecha[$con5]);
                          $salida1[$con5] = date_format($fecha1[$con5], 'd/m/Y');
                          $salida2[$con5] = date_format($fecha1[$con5], 'G:i:s a');


                          $resul1=$activo1->Consultar_Nombre_Sucursal($abc_sucursal[$con5]);
                          if($resul1)
                           {
                            $con1=0;
                            while($row1=mysqli_fetch_array($resul1))
                             {
                              $def_id[$con1]=$row1[2];
                             }
                           }

                          $resul6=$activo6->Encontrar_Detalle_Ciclo($abc_id[$con5]);
                          if($resul6)
                           {
                            $con6=0;
                            while($row6=mysqli_fetch_array($resul6))
                             {
                              $opq_item[$con6]=$row6[0];
                              $opq_sub_area[$con6]=$row6[1];
                              $opq_status[$con6]=$row6[2];

                              if($opq_status[$con6]==1)
                               {
                                $color1 = "badge badge-success";
                                $color2 = "Bien";
                               }
                              if($opq_status[$con6]==2)
                               {
                                $color1 = "badge badge-warning";
                                $color2 = "Averiado";
                               }
                              if($opq_status[$con6]==3)
                               {
                                $color1 = "badge badge-primary";
                                $color2 = "Reparación";
                               }
                              if($opq_status[$con6]==4)
                               {
                                $color1 = "badge badge-danger";
                                $color2 = "Falla";
                               }

                            $resul3=$activo3->Encontrar_Nombre_Item($opq_item[$con6]);
                            if($resul3)
                             {
                              $con3=0;
                              while($row3=mysqli_fetch_array($resul3))
                               {
                                $ijk_id_item[$con3]=$row3[0];
                                $ijk_desc_item[$con3]=$row3[1];
                               }
                             }

                            $resul2=$activo2->Encontrar_Sub_Area($opq_sub_area[$con6]);
                            if($resul2)
                             {
                              $con2=0;
                              while($row2=mysqli_fetch_array($resul2))
                               {
                                $mnl_descripcion[$con2]=$row2[1];
                               }
                             }

                            $resul10=$activo10->Encontar_Caja($abc_caja[$con5]);
                            if($resul10)
                             {
                              $con10=0;
                              while($row10=mysqli_fetch_array($resul10))
                               {
                                $rst_id[$con10]=$row10[0];
                                $rst_descripcion[$con10]=$row10[1];
                               }
                             }

                              echo "<tr>";
                                echo "<td>$mnl_descripcion[$con2]</td>";
                                echo "<td>$def_id[$con1]</td>";
                                echo "<td>$ijk_desc_item[$con3]</td>";
                                echo "<td>$salida1[$con5]</td>";
                                echo "<td>$salida2[$con5]</td>";
                                echo "<td><span class='$color1'>$color2</span></td>";
                                echo "<td>$rst_descripcion[$con10]</td>";
                                echo "<td>$abc_observaciones[$con5]</td>";
                              echo "</tr>";
                              $con6++;
                             }
                           }
                           $con5++;
                         }
                       }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.card-body -->
            </div><!-- /.card-header -->

            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        

      </div><!--/. container-fluid -->
    </section><!-- /.content -->
    <?php
       }
    ?>


    <!-- Modal 1 -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
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
  $('#datepicker1').datepicker({
    uiLibrary: 'bootstrap4',
  });
</script>
<script>
  $('#datepicker2').datepicker({
    uiLibrary: 'bootstrap4',
  });
</script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

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


<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Area: { type: String },
                        Sucursal: { type: String },
                        Item: { type: String },
                        Fecha: { type: String },
                        Hora: { type: String },
                        Status: { type: String},
                        Caja: { type: String },
                        Observaciones: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "Registros Agregados",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Area"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Sucursal"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Item"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Fecha"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Hora"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Status"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Caja"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Observaciones"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: String, value: item.Area },
                                        { type: String, value: item.Sucursal },
                                        { type: String, value: item.Item },
                                        { type: String, value: item.Fecha },
                                        { type: String, value: item.Hora },
                                        { type: String, value: item.Status },
                                        { type: String, value: item.Caja },
                                        { type: String, value: item.Observaciones }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "ListadoExcel"
                });
            });
        });
    });
</script>

<style>
    #exportButton {
        border-radius: 0;
    }
</style><!-- Exportar una Tabla deDatos a Excel -->

</form>
</body>
</html>