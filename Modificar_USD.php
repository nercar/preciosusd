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

  <title>Precios USD | Modificar</title>

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


  <!-- Select2 -->
  <link href="plugins/select2/select2.min.css" rel="stylesheet"/>
  <script>
    $(document).ready(function() 
     {
      $('.js-example-basic-multiple').select2();
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
        <a href="index3.php" class="nav-link">Precios USD</a>
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
              <i class="nav-icon fa fa-dollar fa-spin fa-1x fa-fw"></i>
              <p>
                Precios USD
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Agregar_USD.php" class="nav-link">
                  <i class="nav-icon fa fa-file-excel-o text-info"></i>
                  <p> Importar Archivo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Ingresar_USD.php" class="nav-link">
                  <i class="nav-icon fa fa-file-text-o text-info"></i>
                  <p> Agregar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Consultar_USD.php" class="nav-link">
                  <i class="nav-icon fa fa-search text-info"></i>
                  <p> Consultar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Modificar_USD.php" class="nav-link">
                  <i class="nav-icon fa fa-edit text-info"></i>
                  <p> Modificar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Listar_USD.php" class="nav-link">
                  <i class="nav-icon fa fa-list-alt text-info"></i>
                  <p> Listar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>


    <?php
      $contraseña = "";
      $usuario = "sa";
      $nombreBaseDeDatos = "BDES";
      $rutaServidor = "192.168.20.207";
      $valores = array();
    
      try
       {
        $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexion realizada a la base de datos: ";
       }
      catch (Exception $e)
       {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
       }

      // FETCH_ASSOC
      $sentencia = $base_de_datos->prepare("SELECT BDES.dbo.ESFormasPago_FactorC.codigo, BDES.dbo.ESFormasPago_FactorC.factor, BDES.dbo.ESFormasPago_FactorC.fechahora FROM BDES.dbo.ESFormasPago_FactorC");
      $sentencia->setFetchMode(PDO::FETCH_ASSOC);
      $sentencia->execute();
      // Ahora le vamos a indicar el fetch mode para llamar al fetch:
      $i=0;
      while($row = $sentencia->fetch(PDO::FETCH_OBJ))
       {
        $valores[$i][0] = $row->codigo;
        $valores[$i][1] = $row->factor;
        $valores[$i][2] = $row->fechahora;
        $valores[$i][3] = $row->fechahora;
        $valores[$i][2] = date_create($valores[$i][2]);
        $valores[$i][3] = date_create($valores[$i][3]);

        $valores[$i][2] = date_format($valores[$i][2], 'd/m/Y');
        $valores[$i][3] = date_format($valores[$i][3], 'G:i:s a');        
        $i++;
       }
    ?>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-gear fa-spin fa-1x fa-fw"></i>
              <p>
                Tasas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./phpinfo.php" class="nav-link">
                  <i class="nav-icon fa fa-files-o text-info"></i>
                  <p> Monitor: <?php echo number_format($valores[0][1], 2, ',', '.')." BsS.";?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./phpinfo.php" class="nav-link">
                  <i class="nav-icon fa fa-files-o text-info"></i>
                  <p> Pesos:  <?php echo number_format($valores[1][1], 3, ',', '.')." COP";?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./phpinfo.php" class="nav-link">
                  <i class="nav-icon fa fa-files-o text-info"></i>
                  <p> BCV: <?php echo number_format($valores[2][1], 2, ',', '.')." BsS.";?></p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

    </div>
  </aside>

  <div class="content-wrapper">

    <div class="row">
          <div class="col-md-4">

            <div class="card card-widget widget-user-2">
              
              <div class="widget-user-header bg-primary">
                <h5 class="widget-user-desc">Dolar Monitor</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Codigo: <span class="float-right badge bg-primary"><?php echo $valores[0][0];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Tasa: <span class="float-right badge bg-info"><?php echo number_format($valores[0][1], 2, ',', '.')." BsS.";?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Ultima Actualización: <span class="float-right badge bg-success"><?php echo $valores[0][2];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Hora: <span class="float-right badge bg-danger"><?php echo $valores[0][3];?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-widget widget-user-2">
              <div class="widget-user-header bg-success">
                <h5 class="widget-user-desc">Tasa Pesos</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Codigo: <span class="float-right badge bg-primary"><?php echo $valores[1][0];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Tasa: <span class="float-right badge bg-info"><?php echo number_format($valores[1][1], 3, ',', '.')." COP";?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Ultima Actualización: <span class="float-right badge bg-success"><?php echo $valores[1][2];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Hora: <span class="float-right badge bg-danger"><?php echo $valores[1][3];?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-widget widget-user-2">
              <div class="widget-user-header bg-warning">
                <h5 class="widget-user-desc">Dolar BCV</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Codigo: <span class="float-right badge bg-primary"><?php echo $valores[2][0];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Tasa: <span class="float-right badge bg-info"><?php echo number_format($valores[2][1], 2, ',', '.')." BsS.";?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Ultima Actualización: <span class="float-right badge bg-success"><?php echo $valores[2][2];?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Hora: <span class="float-right badge bg-danger"><?php echo $valores[2][3];?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

    <p></p>
    <div class="row">
      <div class="offset-md-2 col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header bg-info text-white">
            <h4 class="card-title">Modificar Precios USD</h4>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-md-5">
                <div class="form-group form-focus">
                  <label class="focus-label">Ingrese el Código:</label>
                  <input type="text" class="form-control floating" name="cod_art" id="cod_art" value="<?php if(isset($_POST["cod_art"])){ echo $_POST["cod_art"];} ?>" minlength="7" maxlength="7" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 7 digitos Tamaño máximo: 7 digitos" required>
                  <div class="invalid-tooltip">Ingrese el código del articulo</div>
                </div>
              </div>

              <?php
                $consulta = " SELECT BDES.dbo.ESSucursales.codigo, BDES.dbo.ESSucursales.nombre, BDES.dbo.ESSucursales.servidor FROM BDES.dbo.ESSucursales WHERE BDES.dbo.ESSucursales.estado = '1' AND BDES.dbo.ESSucursales.activa = '1' ";
                $sentencia = $base_de_datos->prepare($consulta, [ PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, ]);
                $resultado = $sentencia->execute();
                $xtotales = $sentencia->rowCount();
              ?>

              <div class="col-md-7">
                <div class="form-group form-focus">
                  <label class="focus-label">Sucursal:</label>
                  <select class="custom-select custom-select-md" name="nombre_sucursal" id="nombre_sucursal" style='height:38px' value="<?php echo $_POST["nombre_sucursal"]?>" required>
                    <option value="99">TODAS</option>
                    <?php
                      $resultado = $sentencia->execute();
                      if($resultado === true)
                       {
                        $con1=0;
                        while($puntero = $sentencia->fetchObject())
                         {
                          $abc_codigo[$con1]=$puntero->codigo;
                          $abc_nombre[$con1]=$puntero->nombre;
                    ?>
                    <option value="<?php echo $abc_codigo[$con1]?>" <?php if(@$_POST["nombre_sucursal"]==$abc_codigo[$con1]) echo "selected";?> ><?php echo $abc_nombre[$con1]?> </option>
                    <?php
                          $con1++;
                         }
                       }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <p></p><p></p>


            <div class="col-sm-12 col-md-12 col-xs-12">
              <div class="text-center">
                <input name="consultar" type="submit" class="btn btn-primary btn-sm" id="consultar" value="Consultar"/>
              </div>
            </div>

          </div>
        </div>  
      </div>  
    </div>


    <?php
      if(@$_POST[consultar])
       {
        $xcodigo = $_POST["cod_art"];
        $contador = $_POST["nombre_sucursal"];
        //$valor = count($contador);
        
        /*for($i=0;$i<count($contador);$i++)
         {
          echo "<br> Sucursal: ".$contador[$i];
         }*/

        if($contador=='99')
         {
          echo "<br> Codigo Articulo: ".$xcodigo;
          echo "<br> Los datos se modificaran en todas las Sucursales...";
    ?>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">

          <div class="card-header">
            <h3 class="card-title">Modificar Precios USD</h3>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Código:</label>
                  <input type="text" class="form-control floating" name="usd_codigo" id="usd_codigo" value="<?php echo $xcodigo;?>" disabled>
                  <div class="invalid-tooltip">Ingrese el código del articulo</div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Tipo:</label>
                  <input type="text" class="form-control floating" name="usd_tipo" id="usd_tipo" minlength="1" maxlength="1" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 1 digito Tamaño máximo: 1 digito" required>
                  <div class="invalid-tooltip">Ingrese el código del tipo de articulo</div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Tasa:</label>
                  <input type="text" class="form-control floating" name="usd_codigotasa" id="usd_codigotasa" minlength="2" maxlength="2" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 2 digitos Tamaño máximo: 2 digitos" required>
                  <div class="invalid-tooltip">Ingrese el código de la tasa</div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Precio USD:</label>
                  <input type="text" class="form-control floating" name="usd_precio" id="usd_precio" required pattern="[0-9]+" title="Debe ingresar solo números." required>
                  <div class="invalid-tooltip">Ingrese el precio en USD del articulo</div>
                </div>
              </div>
            
              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Existencia(%):</label>
                  <input type="text" class="form-control floating" name="usd_tipo" id="usd_tipo" minlength="1" maxlength="1" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 1 digito Tamaño máximo: 1 digito" required>
                  <div class="invalid-tooltip">Ingrese el porcentaje de existencia del articulo</div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group form-focus">
                  <label class="focus-label">Costo USD:</label>
                  <input type="text" class="form-control floating" name="usd_codigotasa" id="usd_codigotasa" minlength="2" maxlength="2" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 2 digitos Tamaño máximo: 2 digitos" required>
                  <div class="invalid-tooltip">Ingrese el costo en USD del articulo</div>
                </div>
              </div>

            </div>

            <div class="col-sm-12 col-md-12 col-xs-12">
              <div class="text-center">
                <input name="modificar" type="submit" class="btn btn-primary btn-sm" id="modificar" value="Modificar"/>
              </div>
            </div>

      </div>
    </section>

<?php
         }
        else
         {
          echo "<br> Codigo Articulo: ".$xcodigo;
          echo "<br> Solo la sucursal: ".$contador;
          //print_r($contador);
?>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">

          <div class="card-header">
            <h3 class="card-title">Modificar Precios USD</h3>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Código:</label>
                  <input type="text" class="form-control floating" name="usd_codigo" id="usd_codigo" minlength="7" maxlength="7" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 7 digitos Tamaño máximo: 7 digitos" required>
                  <div class="invalid-tooltip">Ingrese el código del articulo</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Tipo:</label>
                  <input type="text" class="form-control floating" name="usd_tipo" id="usd_tipo" minlength="1" maxlength="1" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 1 digito Tamaño máximo: 1 digito" required>
                  <div class="invalid-tooltip">Ingrese el código del tipo de articulo</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Tasa:</label>
                  <input type="text" class="form-control floating" name="usd_codigotasa" id="usd_codigotasa" minlength="2" maxlength="2" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 2 digitos Tamaño máximo: 2 digitos" required>
                  <div class="invalid-tooltip">Ingrese el código de la tasa</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Precio USD:</label>
                  <input type="text" class="form-control floating" name="usd_precio" id="usd_precio" required pattern="[0-9]+" title="Debe ingresar solo números." required>
                  <div class="invalid-tooltip">Ingrese el precio en USD del articulo</div>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group form-focus">
                  <label class="focus-label">Sucursal:</label>
                  <input type="text" class="form-control floating" name="usd_codigo" id="usd_codigo" minlength="7" maxlength="7" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 7 digitos Tamaño máximo: 7 digitos" required>
                  <div class="invalid-tooltip">Seleccione el nombre de la sucusal</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Existencia(%):</label>
                  <input type="text" class="form-control floating" name="usd_tipo" id="usd_tipo" minlength="1" maxlength="1" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 1 digito Tamaño máximo: 1 digito" required>
                  <div class="invalid-tooltip">Ingrese el porcentaje de existencia del articulo</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Costo USD:</label>
                  <input type="text" class="form-control floating" name="usd_codigotasa" id="usd_codigotasa" minlength="2" maxlength="2" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 2 digitos Tamaño máximo: 2 digitos" required>
                  <div class="invalid-tooltip">Ingrese el costo en USD del articulo</div>
                </div>
              </div>

            </div>
        
            <div class="col-sm-12 col-md-12 col-xs-12">
              <div class="text-center">
                <input name="modificar" type="submit" class="btn btn-primary btn-sm" id="modificar" value="Modificar"/>
              </div>
            </div>

      </div>
    </section>          

    <?php
         }

       }
    ?>



  </div><!-- /.content-wrapper -->

  <br></br>
  <footer class="main-footer">
    <div class="float-right d-sm-none d-md-block"></div>
    <strong>Copyright &copy; 2020 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>


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
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/select2/select2.min.js"></script>
<!--<link href="plugins/select2/select2.min.js"/>-->



</form>
</body>
</html>