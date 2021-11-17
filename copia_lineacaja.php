<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo1 = new sucursal("","","");
$activo2 = new sub_area("","");
$activo3 = new item("","","","","");
$activo4 = new status("","","");
error_reporting(E_ALL);
$paso=3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ciclo de Servicios | BLANZAS</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
        <a href="index3.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contactos</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
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
          <a href="#" class="d-block">jhortiz</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


 <form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data">
  <div class="content-wrapper">

            <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
              </tr>
            </thead>
            <tbody>
              <th>SUCURSAL</th>
              <tr>
               <td>
                <div class="form-group">
                    <!-- <label>Tipo de SAIG</label> -->
                <select class="form-control" name="sucursal" id="sucursal">
                <option value="0">Seleccione</option>
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
                </div></td>
               </tr>
               <input name="xyz_sucursal" type="text" id="xyz_sucursal" size="1" value="<?php echo $sucursal;?>" style="visibility:hidden"/>
            </tbody>
            <?php
              $resul2=$activo2->Consultar_Sub_Area($paso);
              if($resul2)
               {
                $con2=0;
                while($row2=mysqli_fetch_array($resul2))
                 {
                  $con2++;
                 }
               }
               echo "Cantidad: ".$con2;
            ?>
            <tbody>
              <th>LINEA DE CAJA</th>
              <tr>
               <td>
               <div class="form-group">
                    <!-- <label>Lines de Caja</label> -->
                <select class="form-control" name="id_area" id="id_area">
                <option value="0">Seleccione</option>
                 <?php
                   $resul2=$activo2->Consultar_Sub_Area($paso);
                   if($resul2)
                    {
                     $con2=0;
                     while($row2=mysqli_fetch_array($resul2))
                      {
                       $abc_id[$con2]=$row2[1];
                       $abc_descripcion[$con2]=$row2[0];
                 ?>
                <option value="<?php echo $abc_id[$con2]?>"><?php echo $abc_descripcion[$con2]?> </option>
                 <?php
                       $con2++;
                      }
                    }
                 ?>
                </select>
               </div>
             </td>
               </tr>
               <input name="xyz_id_area" type="text" id="xyz_id_area" size="1" value="<?php echo $id_area;?>" style="visibility:hidden"/>
              <tr>
              <td>
              <div class="row">
               <div class="col-md-2 text-center">
                <input name="crear" type="submit" class="btn btn-primary btn-block" id="crear" value="Crear"/>
               </div>
              </div>
              </td>
              </tr>
            </tbody>
            <tfoot>
            </tfoot>
            </table>

<?php
  if(@$_POST[crear])
   {
    $con1=0;
    $con2=0;
    $con3=0;
    $bandera = @$_POST[id_area];
    //echo "Ingreso".@$_POST[id_area];
    $resul3=$activo3->Consultar_Item($bandera,$paso);
    if($resul3)
     {
      $con3=0;
      while($row3=mysqli_fetch_array($resul3))
       {
        $con3++;
       }
     }

    $filas=$con3;
    //$filas=19;
    //$bandera=9;
    //echo "Filas: ".$filas;
    $Vector_Datos = array();
    
    echo "<div class='container'>";

    echo "<section class='content'>";
     echo "<div class='container-fluid'>";
      echo "<div class='row'>";
       echo "<div class='col-md-6'>";
        echo "<div class='card'>";
         echo "<div class='card-header'>";
          echo "<h3 class='card-title'>Linea de Caja</h3>";
         echo "</div>";
         echo "<div class='card-body'>";
          echo "<table class='table table-hover table-bordered col-sm-12'>";

    for($i=0;$i<$filas;$i++)
     {
      //echo "<div class='row'>";
       //echo "<div class='col-md-3 col-sm-3' style='background-color:#eee'>";
       //echo "<h4>Monitor</h4>";
       
       //echo "<td>Update $i</td>";
       //echo "<td>Mensaje $i</td>";

       $resul3=$activo3->Buscar_Item($bandera,$paso);
       if($resul3)
        {
         $con3=0;
         while($row3=mysqli_fetch_array($resul3))
          {
           echo "<tr>";
           $xyz_descripcion[$i]=$row3[0];
           $xyz_id[$i]=$row3[1];
           if($i==$con3)
            {
             //echo "<h4>$xyz_descripcion[$i]</h4>";
             //echo "<p class='text-muted'>$xyz_descripcion[$i]</p>";
             //echo "<p class='justify-content-start'>$xyz_descripcion[$i]</p>";
             echo "<td>$xyz_descripcion[$i]</td>";
             //echo "<span class='brand-text font-weight-light'>$xyz_descripcion[$i]</span>";
             $Vector_Datos[$i] = $xyz_id[$i];
             
             echo "<td>";
             echo '<select class="form-control" name="valor'.$i.'" id="valor'.$i.'">';
              echo "<option value='0'>Seleccionar</option>";
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
             echo "</td>";
            }
           $con3++;
           echo "</tr>";
          }

        }
       //echo "</div>";
     }
   echo "</table>";
   echo "</div>";
   echo "</div>";
   echo "</div>";
   echo "</div>";
   echo "</div>";
   echo "</section>";

      //echo '<BR>';
      echo "<div class='form-group'>";
       echo "<textarea class='form-control' id='obser' name='obser' rows='2' placeholder='Observaciones...'>";
       echo "</textarea>";
      echo "</div>";
   echo "</div>";
    
    $su_usu->Desconectar();
    echo "<div class='form-group'>";
     echo "<div class='col-md-2 text-center'>";
      echo "<input name='guardar' type='submit' class='btn btn-primary btn-block' id='guardar' value='Guardar'/>";
     echo "</div>";
    echo "</div>";

  //echo "<input name='guardar' type='submit' class='col-1 btn btn-secondary btn-sm' id='guardar' value='Guardar'/>";
   }
  else
   {
  //echo "Fallo...";
   }
?>

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
    $vector = unserialize($_POST['ijk_vector']);
    $flag=0;
    $fk_id_usuario = 18;
    $fecha = time();
    $fecha1 = date("Ymd",$fecha);
    $hora1 = date("His");
    $cadena = $fecha1.$hora1;
    $nueva_cadena = md5($cadena);
  
    date_default_timezone_set('America/Caracas');
    $descripcion = "CICLO DE INFRAESTRUCTURA";
    $fecha_hora_actual = date('Y-m-d H:i:s');
    //$fecha_ciclo = date( "Y/m/d" , $fecha );
    $sucu = @$_POST[opq_sucu];
    $num_filas = @$_POST[abc_filas];
    $observaciones = @$_POST[obser];
    $band2 = @$_POST[abc_bandera];

    $nuevo_ciclo = new ciclo($nueva_cadena,$sucu,$fecha_hora_actual,$descripcion,$observaciones,$fk_id_usuario);

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
          //echo "<BR>El valor es: ".$valor." Posicion: ".$j;
          $nuevo_detalle_ciclo = new detalle_ciclo(NULL,$nueva_cadena,$vector[$i],$band2,$valor,$observaciones);
          $flag2=$nuevo_detalle_ciclo->Insertar_Detalle_Ciclo();
         }
       }
     }
    if($flag=='1' && $flag2=='1') 
     {
      echo "<script> alert('Registro(s) agregado(s) exitosamente'); </script>";
     }
     //echo "<BR><br>Bandera: ".@$_POST[abc_bandera];
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