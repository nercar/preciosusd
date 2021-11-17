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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


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


<script type="text/javascript">
$(document).on('change','.btn-file :file',function(){
  var input = $(this);
  var numFiles = input.get(0).files ? input.get(0).files.length : 1;
  var label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
  input.trigger('fileselect',[numFiles,label]);
});
$(document).ready(function(){
  $('.btn-file :file').on('fileselect',function(event,numFiles,label){
    var input = $(this).parents('.input-group').find(':text');
    var log = numFiles > 1 ? numFiles + ' files selected' : label;
    if(input.length){ input.val(log); }else{ if (log) alert(log); }
  });
});
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

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
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


    <div class="container py-2">
      <div class="row">  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-info text-white">
              <h4 class="card-title text-uppercase">REGISTRAR PRECIOS USD</h4>
            </div>
            <div class="card-body">
              <form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data" novalidate>
            </div>


<div class="container">
  <div class="panel panel-primary">
    <div class="panel-body">
      <div class="col-lg-12">

        <div class="col-lg-12">
          <div class="input-group">
            <label class="input-group-btn">
              <span class="btn btn-primary btn-file">
                Seleccione Archivo <input accept=".xlsx,.xls,.txt,.csv" class="hidden" name="banner" type="file" id="banner">
              </span>
            </label>
            <input class="form-control" id="banner_captura" readonly="readonly" name="banner_captura" type="text" value="">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="float-right">
                  <input name="mostrar" type="submit" id="mostrar" class="btn btn-primary rounded-0" value="Mostrar"/>
                </div>
              </div>
            </div>
          </div>
        </div>


<?php
  if(@$_POST[mostrar])
   {
    $dir_subida = '/xampp/htdocs/PreciosUSD/';
    $fichero_subido = $dir_subida . basename($_FILES["banner"]["name"]);
    echo '<pre>';
     if(move_uploaded_file($_FILES['banner']['tmp_name'], $fichero_subido))
      {}
     else
      {
       echo "El Archivo no fue subio correctamente...Verifique su estructura";
      }

     // Muestra informacion del Archivo a subir (nombre,tipo,ubicacion,tamaño)
     //print_r($_FILES);
     print "</pre>";

    require_once 'PHPExcel/Classes/PHPExcel.php';
    $archivo = basename($_FILES["banner"]["name"]);
    //echo '<BR>'."El nombre del archivo es: ".$archivo;
    $inputFileType = PHPExcel_IOFactory::identify($archivo);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($archivo);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
?>


    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Material</th>
          <th>Descripcion</th>
          <th>Tasa</th>
          <th>Precio USD</th>
          <th>Tipo</th>
          <th>Localidad</th>
          <th>Existencia</th>
          <th>Costo USD</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $Datos = array();
        $num=0;
        $var=1;

        for($row=1;$row<=@$highestRow;$row++)
         {
          $Datos[$num][0] = $sheet->getCell("A".$row)->getValue();
          $Datos[$num][1] = $sheet->getCell("B".$row)->getValue();
          $Datos[$num][2] = $sheet->getCell("C".$row)->getValue();
          $Datos[$num][3] = $sheet->getCell("D".$row)->getValue();
          $Datos[$num][4] = $sheet->getCell("E".$row)->getValue();
          $Datos[$num][5] = $sheet->getCell("F".$row)->getValue();
          $Datos[$num][6] = $sheet->getCell("G".$row)->getValue();
          $Datos[$num][7] = $sheet->getCell("H".$row)->getValue();

          $num++;
      ?>
      <tr>
        <th scope='row'><?php echo $num;?></th>
          <td><?php echo $sheet->getCell("A".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("B".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("C".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("D".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("E".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("F".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("G".$row)->getValue();?></td>
          <td><?php echo $sheet->getCell("H".$row)->getValue();?></td>
      </tr>
      <?php
         }
      ?>
      </tbody>
    </table>
<?php
  /*echo('<pre>');
   print_r($Datos);
  echo('</pre>');*/
  echo "Total de Registros: ".$highestRow.'<BR><BR>';
 ?>

  </div>
 </div>
</div>

<div class="row">
  <div class="mx-auto">
    <input name="guardar" type="submit" id="guardar" class="btn btn-primary btn-sm" value="Importar"/>
  </div>
</div>


<?php
   }
 ?>
                    </div>
                </div>  
            </div>  
        </div>  
    </div>

<tr>
 <td>
  <input name="abc_bandera" type="text" id="abc_bandera" size="1" value="<?php echo $bandera;?>" style="visibility:hidden"/>
  <input type="hidden" name="ijk_vector" value='<?php echo serialize($Datos);?>'>
  <input type="hidden" name="abc_filas" value="<?php echo $highestRow;?>" id="abc_filas" size="1" style="visibility:hidden"/>
 </td>
</tr>

<?php
  if(@$_POST[guardar])
   {
    /*echo "El nombre del servidor es: {$_SERVER['SERVER_NAME']}<hr>"; 
    echo "Vienes procedente de la página: {$_SERVER['HTTP_REFERER']}<hr>"; 
    echo "Te has conectado usando el puerto: {$_SERVER['REMOTE_PORT']}<hr>"; */
    
    //echo "El nombre del host de usuario es: {$_SERVER['REMOTE_HOST']}";

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

    $valores = unserialize($_POST['ijk_vector']);
    $indice = $_POST['abc_filas'];
    //print_r($valores);
    
    /*for($row=0;$row<$indice;$row++)
     {
      echo '<BR>'.$valores[$row][0].' '.$valores[$row][1];
     }*/

    /*echo('<pre>');
     //var_dump($valores);
     print_r($valores);
    echo('</pre>');*/

    $contraseña = "";
    $usuario = "sa";
    $nombreBaseDeDatos = "BDES";
    $rutaServidor = "192.168.20.207";
    
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
   
    $sql = "SELECT * from dbo.ESARTICULOS_USD";
    $pdo_statement_object = $base_de_datos->prepare($sql);
    $pdo_statement_object->execute();
    
    $result = $pdo_statement_object->fetchAll();
    
    /*
    print_r($result);
    $xcodigo = "1000018";
    */
    $xtipo = 0;
    $xcosto = "0";
    $xprecio1 = "0";
    $xpreciooferta = '0';
    $ximpuesto = '0';
    $todas_localidades=99;

    
    $consulta_loc = " SELECT BDES.dbo.ESSucursales.codigo, BDES.dbo.ESSucursales.nombre, BDES.dbo.ESSucursales.servidor FROM BDES.dbo.ESSucursales WHERE BDES.dbo.ESSucursales.estado = '1' AND BDES.dbo.ESSucursales.activa = '1' ";

    $sentencia_loc = $base_de_datos->prepare($consulta_loc, [ PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, ]);
    $resultado_loc = $sentencia_loc->execute();
    $totales_loc = $sentencia_loc->rowCount();
    $loc=0;
    while($puntero_loc = $sentencia_loc->fetchObject())
     {
      $abc_codigo[$loc]=$puntero_loc->codigo;
      $abc_nombre[$loc]=$puntero_loc->nombre;
      $loc++;
     }


    date_default_timezone_set('America/Caracas');
    $xfechacreacion = date('Ymd H:i:s');
    $xfechamodificacion = date('Ymd H:i:s');
    $xusuario = $LOGusuario;
    $xprecioregulado = 1;
    $xtipocambio = 0;
    $xtipo = 0;
    $xnombre_pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $xpuerto = $_SERVER['REMOTE_PORT'];
    $xenlace = $_SERVER['HTTP_REFERER'];
    $xdir_mac = 0;
    $xdireccion_ip = $ip2;
    $xcampo1 = "0";

    $mac='DESCONOCIDA';
    foreach(explode("\n",str_replace(' ','',trim(`getmac`,"\n"))) as $i)
    if(strpos($i,'Tcpip')>-1){$mac=substr($i,0,17);break;}
    $xdir_mac = $mac;

    
    for($row=0;$row<$indice;$row++)
     {
      //echo '<BR>'.$valores[$row][5];
      //echo '<BR>'.$totales_loc;

      if($valores[$row][5]==$todas_localidades)
       {
        //echo '<BR>'."Ingreso es igual a 99...";

        for($col=0;$col<$totales_loc;$col++)
         {
          //echo '<BR>'.$abc_codigo[$col];
          $sentencia = $base_de_datos->prepare("SELECT codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1 FROM dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad=? ;");

          $sentencia->execute([$valores[$row][0],$abc_codigo[$col]]);
          $validar = $sentencia->fetchObject();
      
          if(!$validar)
           {
            //echo "<BR> ¡No existe Articulo con este Codigo $valores[$row][0] !";
            $sentencia2 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

            $resultado2 = $sentencia2->execute([$valores[$row][0], $valores[$row][4], $valores[$row][2], $valores[$row][3], $abc_codigo[$col], $valores[$row][6], $valores[$row][7], $xcampo1]);

            $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(codigo, descripcion, costo, precio1, preciooferta, impuesto, fechacreacion, fechamodificacion, usuario, precioregulado, tipocambio, tipo, codigotasa, precio_usd, nombre_equipo, puerto, enlace, dir_mac, direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

            $resultado4 = $sentencia4->execute([$valores[$row][0], $valores[$row][1], $valores[$row][7], $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $abc_codigo[$col], $valores[$row][4], $valores[$row][2], $valores[$row][3], $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
           }
          else
           {
            //echo "<BR> El Articulo ya existe !!!... ";
            $sentencia2 = $base_de_datos->prepare("UPDATE dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=? WHERE codigo=? AND localidad=? ;");
        
            $resultado2 = $sentencia2->execute([$valores[$row][0], $valores[$row][4], $valores[$row][2], $valores[$row][3], $abc_codigo[$col], $valores[$row][6], $valores[$row][7], $valores[$row][0], $abc_codigo[$col]]);

            $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(codigo, descripcion, costo, precio1, preciooferta, impuesto, fechacreacion, fechamodificacion, usuario, precioregulado, tipocambio, tipo, codigotasa, precio_usd, nombre_equipo, puerto, enlace, dir_mac, direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        
            $resultado4 = $sentencia4->execute([$valores[$row][0], $valores[$row][1], $valores[$row][7], $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $abc_codigo[$col], $valores[$row][4], $valores[$row][2], $valores[$row][3], $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
           }
         }//Fin del For col

       }
      else
       {
        $sentencia = $base_de_datos->prepare("SELECT codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1 FROM dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad=? ;");
      
        $sentencia->execute([$valores[$row][0],$valores[$row][5]]);
        $validar = $sentencia->fetchObject();
      
        if(!$validar)
         {

          //echo "<BR> ¡No existe Articulo con este Codigo $valores[$row][0] !";
          $sentencia2 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

          $resultado2 = $sentencia2->execute([$valores[$row][0], $valores[$row][4], $valores[$row][2], $valores[$row][3], $valores[$row][5], $valores[$row][6], $valores[$row][7], $xcampo1]);

          $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(codigo, descripcion, costo, precio1, preciooferta, impuesto, fechacreacion, fechamodificacion, usuario, precioregulado, tipocambio, tipo, codigotasa, precio_usd, nombre_equipo, puerto, enlace, dir_mac, direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
          $resultado4 = $sentencia4->execute([$valores[$row][0], $valores[$row][1], $valores[$row][7], $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $valores[$row][5], $valores[$row][4], $valores[$row][2], $valores[$row][3], $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
         }
        else
         {
          //echo "<BR> El Articulo ya existe !!!... ";
          $sentencia2 = $base_de_datos->prepare("UPDATE dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=? WHERE codigo=? AND localidad=? ;");
        
          $resultado2 = $sentencia2->execute([$valores[$row][0], $valores[$row][4], $valores[$row][2], $valores[$row][3], $valores[$row][5], $valores[$row][6], $valores[$row][7], $valores[$row][0], $valores[$row][5]]);

          $sentencia4 = $base_de_datos->prepare("INSERT INTO dbo.ESARTICULOS_CAMBIOS_USD(codigo, descripcion, costo, precio1, preciooferta, impuesto, fechacreacion, fechamodificacion, usuario, precioregulado, tipocambio, tipo, codigotasa, precio_usd, nombre_equipo, puerto, enlace, dir_mac, direccion_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        
          $resultado4 = $sentencia4->execute([$valores[$row][0], $valores[$row][1], $valores[$row][7], $xprecio1, $xpreciooferta, $ximpuesto, $xfechacreacion, $xfechamodificacion, $xusuario, $xprecioregulado, $valores[$row][5], $valores[$row][4], $valores[$row][2], $valores[$row][3], $xnombre_pc, $xpuerto, $xenlace, $xdir_mac, $xdireccion_ip]);
         }
       }
     }//Fin del for

    if($resultado2 === true)
     {
      echo "<script> alert('Registro(s) importado(s) exitosamente'); </script>";
     }
    else
     {
      echo "<script> alert('Ocurrio un error. Por favor verifica la estructura del archivo'); </script>";
      exit();
     }
  
   }
?>

</div><!-- /.content-wrapper -->

  <!--<aside class="control-sidebar control-sidebar-dark"></aside>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block-down">
      Anything you want
    </div>
    <strong>Copyright &copy; 2020 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>-->
</div>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
-->
</form>
</body>
</html>