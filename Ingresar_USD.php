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

  <title>Precios USD | Agregar</title>

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
  <!-- Select2 -->
  <link href="plugins/select2/select2.min.css" rel="stylesheet"/>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


  <script>
    $(document).ready(function() 
     {
      $('.js-example-basic-multiple').select2();
     });
  </script>


</head>


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
    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Registrar Precios USD</h3>
          </div>
          <form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data">
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

            <?php
              $consulta = " SELECT BDES.dbo.ESSucursales.codigo, BDES.dbo.ESSucursales.nombre, BDES.dbo.ESSucursales.servidor FROM BDES.dbo.ESSucursales WHERE BDES.dbo.ESSucursales.estado = '1' AND BDES.dbo.ESSucursales.activa = '1' ";
              
              $sentencia = $base_de_datos->prepare($consulta, [ PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, ]);
              $resultado = $sentencia->execute();
              $xtotales = $sentencia->rowCount();
            ?>

              <div class="col-md-6">
                <div class="form-group form-focus">
                  <label class="focus-label">Sucursal:</label>
                  <select class="js-example-basic-multiple" name="sucursales[]" multiple="multiple" style="width: 100%" required>
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
                    <option value="<?php echo $abc_codigo[$con1]?>"><?php echo $abc_nombre[$con1]?></option>
                    <?php
                          $con1++;
                         }
                       }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Existencia(%):</label>
                  <input type="text" class="form-control floating" name="usd_existencia" id="usd_existencia" minlength="1" maxlength="2" required pattern="[0-9]+" title="Solo Números. Tamaño mínimo: 1 digito Tamaño máximo: 2 digitos" required>
                  <div class="invalid-tooltip">Ingrese el porcentaje de existencia del articulo</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group form-focus">
                  <label class="focus-label">Costo USD:</label>
                  <input type="text" class="form-control floating" name="usd_costo" id="usd_costo" required pattern="[0-9]+" title="Debe ingresar solo números." required>
                  <div class="invalid-tooltip">Ingrese el costo en USD del articulo</div>
                </div>
              </div>

            </div>
        </div>
        <input name="total_sucursales" type="text" id="total_sucursales" size="1" value="<?php echo $xtotales;?>" style="visibility:hidden"/>  

        <div class="card-footer text-center">
          <input name="guardar" type="submit" class="btn btn-primary btn-md" id="guardar" value="Guardar"/>
          <!--<button type="submit" name="guardar" id="guardar" class="btn btn-info">Guardar</button>-->
        </div>

      </div>
    </section>
  </div>


<?php
  if(@$_POST[guardar])
   {
    if(isset($_SERVER["HTTP_CLIENT_IP"]))
     {
      $ip2 = $_SERVER["HTTP_CLIENT_IP"];
     }
    elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
     {
      $ip2 = $_SERVER["HTTP_X_FORWARDED_FOR"];
     }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
     {
      $ip2 = $_SERVER["HTTP_X_FORWARDED"];
     }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
     {
      $ip2 = $_SERVER["HTTP_FORWARDED_FOR"];
     }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
     {
      $ip2 = $_SERVER["HTTP_FORWARDED"];
     }
    else
     {
      $ip2 = $_SERVER["REMOTE_ADDR"];
     }
    //echo $ip2.'<BR>';

    date_default_timezone_set('America/Caracas');
    $xfechacreacion = date('Ymd H:i:s');
    $xfechamodificacion = date('Ymd H:i:s');
    $xusuario = $LOGusuario;
    $xprecioregulado = 1;
    $xtipocambio = 0;
    $xnombre_pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $xpuerto = $_SERVER['REMOTE_PORT'];
    $xenlace = $_SERVER['HTTP_REFERER'];
    $xdir_mac = 0;
    $xprecio1 = 0;
    $xpreciooferta = 0;
    $ximpuesto = 0;
    $xdireccion_ip = $ip2;

    $mac='DESCONOCIDA';
    foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i)
    if(strpos($i,'Tcpip')>-1){$mac=substr($i,0,17);break;}
    $xdir_mac = $mac;


    $xusd_codigo=$_POST["usd_codigo"];
    $xusd_tipo=$_POST["usd_tipo"];
    $xusd_codigotasa=$_POST["usd_codigotasa"];
    $xusd_precio=$_POST["usd_precio"];
    $xusd_existencia=$_POST["usd_existencia"];
    $xusd_costo=$_POST["usd_costo"];
    $xcampo1 = "0";

    $contador=$_POST["sucursales"];
    $num_sucu=$_POST["total_sucursales"];

    $consulta0 = " SELECT BDES.dbo.ESARTICULOS.descripcion FROM BDES.dbo.ESARTICULOS WHERE BDES.dbo.ESARTICULOS.codigo = '". $xusd_codigo ."' ";
    $sentencia0 = $base_de_datos->prepare($consulta0, [ PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, ]);
    $resultado0 = $sentencia0->execute();
    if($resultado0 === true)
     {
      $con0=0;
      while($puntero0 = $sentencia0->fetchObject())
       {
        $nombre_articulo[$con0]=$puntero0->descripcion;
        //$con0++;
       }
     }


    $codigo_localidad = array();
    $consulta = " SELECT BDES.dbo.ESSucursales.codigo FROM BDES.dbo.ESSucursales WHERE BDES.dbo.ESSucursales.estado = '1' AND BDES.dbo.ESSucursales.activa = '1' ";
    $sentencia = $base_de_datos->prepare($consulta, [ PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, ]);
    $resultado = $sentencia->execute();
    if($resultado === true)
     {
      $con1=0;
      while($puntero = $sentencia->fetchObject())
       {
        $codigo_localidad[$con1]=$puntero->codigo;
        $con1++;
       }
     }
    

    //recorremos el array de sucursales seleccionadas.
    for($i=0;$i<count($contador);$i++)
     {
      if($contador[$i] == 99)
       {
        //echo "<br>Selecciono Todas las Sucursales ".$contador[$i];

        for($row=0;$row<$num_sucu;$row++)
         {
          $sentencia = $base_de_datos->prepare("SELECT BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.localidad, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia, BDES.dbo.ESARTICULOS_USD.costo_usd, BDES.dbo.ESARTICULOS_USD.campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE BDES.dbo.ESARTICULOS_USD.codigo = ? AND BDES.dbo.ESARTICULOS_USD.localidad=? ;");
          $sentencia->execute([$xusd_codigo,$codigo_localidad[$row]]);
          $validar = $sentencia->fetchObject();
      
          if(!$validar)
           {
            //echo "<BR> ¡No existe Articulo con este Codigo $valores[$row][0] !";
            $sentencia2 = $base_de_datos->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.localidad, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia, BDES.dbo.ESARTICULOS_USD.costo_usd, BDES.dbo.ESARTICULOS_USD.campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $resultado2 = $sentencia2->execute([$xusd_codigo, $xusd_tipo, $xusd_codigotasa, $xusd_precio, $codigo_localidad[$row], $xusd_existencia, $xusd_costo, $xcampo1]);

            $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.descripcion, BDES.dbo.ESARTICULOS_USD.costo, BDES.dbo.ESARTICULOS_USD.precio1, BDES.dbo.ESARTICULOS_USD.preciooferta, BDES.dbo.ESARTICULOS_USD.impuesto, BDES.dbo.ESARTICULOS_USD.fechacreacion, BDES.dbo.ESARTICULOS_USD.fechamodificacion, BDES.dbo.ESARTICULOS_USD.usuario, BDES.dbo.ESARTICULOS_USD.precioregulado, BDES.dbo.ESARTICULOS_USD.tipocambio, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.nombre_equipo, BDES.dbo.ESARTICULOS_USD.puerto, BDES.dbo.ESARTICULOS_USD.enlace, BDES.dbo.ESARTICULOS_USD.dir_mac, BDES.dbo.ESARTICULOS_USD.direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            
            $resultado4 = $sentencia4->execute([$xusd_codigo, $nombre_articulo[0], $xusd_costo, $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $codigo_localidad[$row], $xusd_tipo, $xusd_codigotasa, $xusd_precio, $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
           }
          else
           {
            //echo "<BR> El Articulo ya existe !!!... ";
            $sentencia2 = $base_de_datos->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET BDES.dbo.ESARTICULOS_USD.codigo=?, BDES.dbo.ESARTICULOS_USD.tipo=?, BDES.dbo.ESARTICULOS_USD.codigotasa=?, BDES.dbo.ESARTICULOS_USD.precio_usd=?, BDES.dbo.ESARTICULOS_USD.localidad=?, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia=?, BDES.dbo.ESARTICULOS_USD.costo_usd=? WHERE BDES.dbo.ESARTICULOS_USD.codigo=? AND BDES.dbo.ESARTICULOS_USD.localidad=? ;");
            $resultado2 = $sentencia2->execute([$xusd_codigo, $xusd_tipo, $xusd_codigotasa, $xusd_precio, $codigo_localidad[$row], $xusd_existencia, $xusd_costo, $xusd_codigo, $codigo_localidad[$row]]);

            $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.descripcion, BDES.dbo.ESARTICULOS_USD.costo, BDES.dbo.ESARTICULOS_USD.precio1, BDES.dbo.ESARTICULOS_USD.preciooferta, BDES.dbo.ESARTICULOS_USD.impuesto, BDES.dbo.ESARTICULOS_USD.fechacreacion, BDES.dbo.ESARTICULOS_USD.fechamodificacion,BDES.dbo.ESARTICULOS_USD.usuario, BDES.dbo.ESARTICULOS_USD.precioregulado, BDES.dbo.ESARTICULOS_USD.tipocambio, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.nombre_equipo, BDES.dbo.ESARTICULOS_USD.puerto, BDES.dbo.ESARTICULOS_USD.enlace, BDES.dbo.ESARTICULOS_USD.dir_mac, BDES.dbo.ESARTICULOS_USD.direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        
            $resultado4 = $sentencia4->execute([$xusd_codigo, $nombre_articulo[0], $xusd_costo, $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $codigo_localidad[$row], $xusd_tipo, $xusd_codigotasa, $xusd_precio, $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
           }
         }//Fin del for

       }
      else
       {
        //echo "<br>La Sucursal seleccionada es: ".$contador[$i];
        $sentencia = $base_de_datos->prepare("SELECT BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.localidad, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia, BDES.dbo.ESARTICULOS_USD.costo_usd, BDES.dbo.ESARTICULOS_USD.campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE BDES.dbo.ESARTICULOS_USD.codigo = ? AND BDES.dbo.ESARTICULOS_USD.localidad=? ;");
        $sentencia->execute([$xusd_codigo,$contador[$i]]);
        $validar = $sentencia->fetchObject();
      
        if(!$validar)
         {
          //echo "<BR> No existe Articulo con este Codigo...";
          $sentencia2 = $base_de_datos->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.localidad, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia, BDES.dbo.ESARTICULOS_USD.costo_usd, BDES.dbo.ESARTICULOS_USD.campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
          $resultado2 = $sentencia2->execute([$xusd_codigo, $xusd_tipo, $xusd_codigotasa, $xusd_precio, $contador[$i], $xusd_existencia, $xusd_costo, $xcampo1]);

          $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.descripcion, BDES.dbo.ESARTICULOS_USD.costo, BDES.dbo.ESARTICULOS_USD.precio1, BDES.dbo.ESARTICULOS_USD.preciooferta, BDES.dbo.ESARTICULOS_USD.impuesto, BDES.dbo.ESARTICULOS_USD.fechacreacion, BDES.dbo.ESARTICULOS_USD.fechamodificacion, BDES.dbo.ESARTICULOS_USD.usuario, BDES.dbo.ESARTICULOS_USD.precioregulado, BDES.dbo.ESARTICULOS_USD.tipocambio, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.nombre_equipo, BDES.dbo.ESARTICULOS_USD.puerto, BDES.dbo.ESARTICULOS_USD.enlace, BDES.dbo.ESARTICULOS_USD.dir_mac, BDES.dbo.ESARTICULOS_USD.direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            
          $resultado4 = $sentencia4->execute([$xusd_codigo, $nombre_articulo[0], $xusd_costo, $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $contador[$i], $xusd_tipo, $xusd_codigotasa, $xusd_precio, $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
         }
        else
         {
          //echo "<BR> El Articulo ya existe !!!... ";
          $sentencia2 = $base_de_datos->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET BDES.dbo.ESARTICULOS_USD.codigo=?, BDES.dbo.ESARTICULOS_USD.tipo=?, BDES.dbo.ESARTICULOS_USD.codigotasa=?, BDES.dbo.ESARTICULOS_USD.precio_usd=?, BDES.dbo.ESARTICULOS_USD.localidad=?, BDES.dbo.ESARTICULOS_USD.porcentaje_existencia=?, BDES.dbo.ESARTICULOS_USD.costo_usd=? WHERE BDES.dbo.ESARTICULOS_USD.codigo=? AND BDES.dbo.ESARTICULOS_USD.localidad=? ;");
          $resultado2 = $sentencia2->execute([$xusd_codigo, $xusd_tipo, $xusd_codigotasa, $xusd_precio, $contador[$i], $xusd_existencia, $xusd_costo, $xusd_codigo, $contador[$i]]);

          $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(BDES.dbo.ESARTICULOS_USD.codigo, BDES.dbo.ESARTICULOS_USD.descripcion, BDES.dbo.ESARTICULOS_USD.costo, BDES.dbo.ESARTICULOS_USD.precio1, BDES.dbo.ESARTICULOS_USD.preciooferta, BDES.dbo.ESARTICULOS_USD.impuesto, BDES.dbo.ESARTICULOS_USD.fechacreacion, BDES.dbo.ESARTICULOS_USD.fechamodificacion,BDES.dbo.ESARTICULOS_USD.usuario, BDES.dbo.ESARTICULOS_USD.precioregulado, BDES.dbo.ESARTICULOS_USD.tipocambio, BDES.dbo.ESARTICULOS_USD.tipo, BDES.dbo.ESARTICULOS_USD.codigotasa, BDES.dbo.ESARTICULOS_USD.precio_usd, BDES.dbo.ESARTICULOS_USD.nombre_equipo, BDES.dbo.ESARTICULOS_USD.puerto, BDES.dbo.ESARTICULOS_USD.enlace, BDES.dbo.ESARTICULOS_USD.dir_mac, BDES.dbo.ESARTICULOS_USD.direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        
          $resultado4 = $sentencia4->execute([$xusd_codigo, $nombre_articulo[0], $xusd_costo, $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $contador[$i], $xusd_tipo, $xusd_codigotasa, $xusd_precio, $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
         }
       }

     }//Fin del For

     if($resultado2 === true)
      {
       echo "<script> alert('Registro(s) agregados(s) exitosamente'); </script>";
      }
     else
      {
       echo "<script> alert('Ocurrio un error al insertar el registro... Por favor verifique'); </script>";
       exit();
      }
   }
?>



</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/select2/select2.min.js"></script>
<!--<link href="plugins/select2/select2.min.js"/>-->


</form>
</body>
</html>