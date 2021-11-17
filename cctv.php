<?php
include("seguridad.php");
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo1 = new sucursal("","","");
$activo2 = new sub_area("","");
$activo3 = new item("","","","","");
$activo4 = new status("","","");
$activo5 = new area_item("","","");
error_reporting(E_ALL);
$paso=9;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ciclo de Servicios | CCTV</title>

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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


<style type="text/css">
<!--
.header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
-->
</style>

<script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('form1');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
</script>


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
    
    <div class="container py-5">
        <div class="row">
            <div class="offset-md-2 col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="card-title text-uppercase">CCTV</h4>
                    </div>
                    <div class="card-body">
                        <form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data" novalidate>
                        <!--<form id="form1" novalidate>-->
                            <div class="row">  
                                <div class="col-sm-8 col-md-8 col-xs-12">
                                    <h5 class='text-primary'>Sucursal:</h5>
                                    <select class="custom-select" name="sucursal" id="sucursal" required>
                                    <option value="">Seleccione</option>
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
                                    <div class="invalid-tooltip">Por favor seleccione la Sucursal.</div>
                                </div>
                            </div>

<?php
  $resul2=$activo2->Consultar_Sub_Area($paso);
  if($resul2)
   {
    $con2=0;
    while($row2=mysqli_fetch_array($resul2))
     {
      $xyz_descripcion[$con2]=$row2[0];
      $xyz_id[$con2]=$row2[1];
     }
   }
   $band2 = $xyz_id[$con2];
   //echo "Sub-Area: ".$band2;

  $resul3=$activo3->Consultar_Item($xyz_id[$con2],$paso);
  if($resul3)
   {
    $con3=0;
    while($row3=mysqli_fetch_array($resul3))
     {
      $con3++;
     }
   }  

  $filas=$con3;
  //echo '<BR>'." Filas: ".$filas;
  $Vector_Datos = array();
  echo '<BR>';
  echo "<h5 class='text-primary'>Circuito Cerrado de Televisión:</h5>";
  echo '<BR>';
  //echo '<BR>';
  //echo '<BR>'." Paso: ".$paso;
    for($i=0;$i<$filas;$i++)
     {
      echo "<div class='row'>";
        echo "<div class='col-sm-7 col-md-7 col-xs-12'>";
        $resul3=$activo5->Encontrar_Items($paso);
        if($resul3)
         {
          $con3=0;
          while($row3=mysqli_fetch_array($resul3))
           {
            $xyz_id[$i]=$row3[0];
            $xyz_descripcion[$i]=$row3[1];

            if($i==$con3)
             {
              echo "<label for='cctv'>$xyz_descripcion[$i]:</label>";
              //echo "<span class='brand-text font-weight-light'>$xyz_descripcion[$i]</span>";
              $Vector_Datos[$i] = $xyz_id[$i];
             }
            $con3++;
           }
         }
        echo "</div>";

        echo "<div class='col-sm-5 col-md-5 col-xs-12'>";
         echo "<div class='form-group'>";
          echo '<select class="custom-select" name="valor'.$i.'" id="valor'.$i.'">';
          //echo '<select class="form-control" name="valor'.$i.'" id="valor'.$i.'">';
           //echo "<option value='0'>Seleccionar</option>";
           echo "<option value=''>Seleccione</option>";
            $resul4=$activo4->Consultar_Status();
            if($resul4)
             {
              $con4=0;
              while($row4=mysqli_fetch_array($resul4))
               {
                $ijk_id[$con4]=$row4[0];
                $ijk_descripcion[$con4]=$row4[1];
                echo "<option value='$ijk_id[$con4]'>";
                echo "$ijk_descripcion[$con4]";
                echo "</option>";
                $con4++;
               }
             }
          echo "</select>";
         echo"</div>";
        echo "</div>";
      echo "</div>";
     }
?>
                            <div class="row">
                              <div class="col-sm-12 col-md-12 col-xs-12">
                                <h6 class='text-primary'>Observaciones:</h6>
                                <textarea class="form-control" id='obser' name='obser' rows="3" placeholder='Observaciones' aria-describedby="inputGroupPrepend"></textarea>
                              </div>
                            </div>
<?php
  $su_usu->Desconectar();
?>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="float-right">
                                        <input name="guardar" type="submit" id="guardar" class="btn btn-primary rounded-0" value="Guardar"/>
                                    </div>
                                </div>
                            </div>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>

<tr>
 <td>
  <input name="opq_sucu" type="text" id="opq_sucu" size="1" value="<?php echo @$_POST[sucursal];?>" style="visibility:hidden"/>
  <input name="abc_filas" type="text" id="abc_filas" size="1" value="<?php echo $filas;?>" style="visibility:hidden"/>
  <input name="abc_bandera" type="text" id="abc_bandera" size="1" value="<?php echo $bandera;?>" style="visibility:hidden"/>
  <input type="hidden" name="ijk_vector" value='<?php echo serialize($Vector_Datos);?>'>
 </td>
</tr>

<?php
  if(@$_POST[guardar])
   {
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
     {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
     }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
     {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
     }
    else
     {
      $ip=$_SERVER['REMOTE_ADDR'];
     }

    $fk_id_usuario = $LOGusuario;
    $vector = unserialize($_POST['ijk_vector']);
    $flag=0;
    $flag2=0;
    $fecha = time();
    $fecha1 = date("Ymd",$fecha);
    $hora1 = date("His");
    $cadena = $fecha1.$hora1;
    $nueva_cadena = md5($cadena);
  
    date_default_timezone_set('America/Caracas');
    $descripcion = "CICLO DE INFRAESTRUCTURA";
    $fecha_hora_actual = date('Y-m-d H:i:s');
    //$fecha_ciclo = date( "Y/m/d" , $fecha );
    $sucu = @$_POST[sucursal];
    $num_filas = @$_POST[abc_filas];
    $observaciones = @$_POST[obser];
    $puesto = 0;

    $nuevo_ciclo = new ciclo($nueva_cadena,$sucu,$fecha_hora_actual,$descripcion,$observaciones,$fk_id_usuario,$puesto);

    $flag=$nuevo_ciclo->Insertar_Ciclo();
    if($flag)
     {
      //echo "Filas: ".$num_filas;
      for($i=0;$i<$num_filas;$i++)
       {
        //echo "<BR>El valor del Vector es: ".$Vector_Datos[$i];
        if($_POST["valor"."$i"]!=0)
         {
          $valor = $_POST["valor"."$i"];
          $nuevo_detalle_ciclo = new detalle_ciclo(NULL,$nueva_cadena,$vector[$i],$band2,$valor,$observaciones);
          $flag2=$nuevo_detalle_ciclo->Insertar_Detalle_Ciclo();
         }
       }
     }
    //echo '<BR>'.$flag;
    //echo '<BR>'.$flag2;
    if($flag=='1')
     {
      if($flag2=='1')
       {
        echo "<script> alert('Registro(s) agregado(s) exitosamente'); </script>";
       }
      else
       {
        echo "<script> alert('Debe selecionar el Status de por lo menos un Item'); </script>";
        $flag3=$nuevo_ciclo->Eliminar_Ciclo($nueva_cadena,$sucu);
       }
     }
     //echo '<BR>'.$flag3;
   }
?>


</div><!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block-down">
      Anything you want
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
</form>
</body>
</html>