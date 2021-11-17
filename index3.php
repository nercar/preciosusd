<?php
include("seguridad.php");
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();
$name_user = @$_GET['usuario'];
$_SESSION["login"]=$name_user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Grupo Garzon C.A. | Precios USD</title>

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
              <li class="nav-item">
                <a href="./Subir_Imagenes.php" class="nav-link">
                  <i class="nav-icon fa fa-list-alt text-info"></i>
                  <p> Subir Imagenes</p>
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
                  <i class="nav-icon fa fa-money text-info"></i>
                  <p> Monitor: <?php echo number_format($valores[0][1], 2, ',', '.')." BsS.";?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./phpinfo.php" class="nav-link">
                  <i class="nav-icon fa fa-money text-info"></i>
                  <p> Pesos:  <?php echo number_format($valores[1][1], 3, ',', '.')." COP";?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./phpinfo.php" class="nav-link">
                  <i class="nav-icon fa fa-money text-info"></i>
                  <p> BCV: <?php echo number_format($valores[2][1], 2, ',', '.')." BsS.";?></p>
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


        <div class="row">

          <div class="col-12 col-sm-6 col-md-4">      
            <div class="info-box bg-primary">
              <span class="info-box-icon elevation-1"><a href="./Agregar_USD.php" class="nav-link"><i class="fa fa-file-excel-o fa-2x"></i></a>
              </span>
                <div class="info-box-content">
                  <a href="./Agregar_USD.php" class="nav-link">
                    <span class="info-box-text">Importar Archivo</span>
                  </a>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">Precios USD</span>
                </div>
            </div>
          </div>

         <div class="col-12 col-sm-6 col-md-4">      
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-success">
           <!-- <a href="./saig.php" class="nav-link">-->
            <span class="info-box-icon elevation-1"><a href="./Ingresar_USD.php" class="nav-link"><i class="fa fa-file-text-o fa-2x"></i></a></span>
           <!--</a>-->
            <div class="info-box-content">
              <a href="./Ingresar_USD.php" class="nav-link">
               <span class="info-box-text">Agregar</span>
              </a>
             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
              <span class="progress-description">
               Precios USD
              </span>
            </div>
          </div>
         </div>


          <div class="col-12 col-sm-6 col-md-4">
          <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="info-box bg-secondary">
           <span class="info-box-icon elevation-1"><a href="./Consultar_USD.php" class="nav-link"><i class="fa fa-search fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="./Consultar_USD.php" class="nav-link">
              <span class="info-box-text">Consultar</span>
             </a>

             <!-- The progress section is optional -->
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              Precios USD
             </span>
            </div>
          </div>  
          <!-- /.info-box-content -->
          <!-- /.info-box -->
         </div>


        </div>
        <div class="row">

         <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box bg-danger">
           <span class="info-box-icon elevation-1"><a href="./Modificar_USD.php" class="nav-link"><i class="fa fa-edit fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="./Modificar_USD.php" class="nav-link">
              <span class="info-box-text">Modificar</span>
             </a>
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              Precios USD
             </span>
            </div>
          </div>  
         </div>

         <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box bg-warning">
           <span class="info-box-icon elevation-1"><a href="./Listar_USD.php" class="nav-link"><i class="fa fa-list-alt fa-2x"></i></a></span>
            <div class="info-box-content">
             <a href="./Listar_USD.php" class="nav-link">
              <span class="info-box-text">Listar</span>
             </a>
             <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
             </div>
             <span class="progress-description">
              Precios USD
             </span>
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
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
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