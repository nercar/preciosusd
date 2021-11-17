<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo1 = new sucursal("","","");
$activo2 = new sub_area("","");
$activo3 = new item("","","","","");
$activo4 = new status("","","");
$activo5 = new area_item("","","");
error_reporting(E_ALL);
$paso=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ciclo de Servicios | Balanzas</title>
  <meta charset="utf-8" />

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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  

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

<body>
    <div class="container py-5">  
        <div class="row">  
            <div class="offset-md-2 col-md-8 offset-md-2">  
                <div class="card">  
                    <div class="card-header bg-primary text-white">  
                        <h4 class="card-title text-uppercase">BALANZAS</h4>
                    </div>
                    <div class="card-body">
                        <form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data" novalidate>
                        <!--<form id="form1" novalidate>-->
                            <div class="row">  
                                <div class="col-sm-8 col-md-8 col-xs-12">
                                    <label for="firstName">Sucursal:</label>
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
  $filas=5;
  $Vector_Datos = array();
  echo '<BR>';
  echo "<label for='TiposBalanzas'>Tipos de Balanzas:</label>";
  echo '<BR>';
  echo '<BR>';
    for($i=0;$i<$filas;$i++)
     {
      echo "<div class='row'>";
        echo "<div class='col-sm-5 col-md-5 col-xs-12'>";
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
              echo "<label for='nombrebalanza'>$xyz_descripcion[$i]:</label>";
              //echo "<span class='brand-text font-weight-light'>$xyz_descripcion[$i]</span>";
              $Vector_Datos[$i] = $xyz_id[$i];
             }
            $con3++;
           }
         }
        echo "</div>";

        echo "<div class='col-sm-3 col-md-3 col-xs-12'>";
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
                                    <label for="address">Observaciones:</label>
                                    <textarea class="form-control" id='obser' name='obser' rows="3" placeholder='Observaciones' aria-describedby="inputGroupPrepend"></textarea>
                                </div>
                            </div>
<?php 
  $su_usu->Desconectar();
?>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="float-right">
                                        <button class="btn btn-danger rounded-0" type="submit">Cancelar</button>
                                        <button name="registrar" type="submit" id="registrar" class="btn btn-primary rounded-0">Registrar</button>
                                        <input name="guardar" type="submit" id="guardar" class="btn btn-primary rounded-0" value="Guardar"/>
                                    </div>
                                </div>
                            </div>

<?php
  if(@$_POST[guardar])
   {
    echo "Olaaaaaaaaaaaaaaaaaaaaaaa";
   }
?>

                        </form>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  

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