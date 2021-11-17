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

  <title>Precios USD | Consultar</title>


  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="dist/img/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/gijgo.min.js"></script>
  <script src="gijgo.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


</head>


<body class="hold-transition sidebar-mini">
<!--<form name="form1" method="POST" id="form1" action="" enctype="multipart/form-data">-->
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


        <h1>Galería de imágenes</h1>
        <p></p>
        <?php
          $borrar= filter_input(INPUT_GET, 'borrar');
          if(!empty($borrar))
           {
            unlink("uploads/".$borrar);
           }
         if(isset($_FILES['imagen'])) 
          {
           if(explode("/", $_FILES['imagen']['type'])[0] == 'image') 
            {
             move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/" . $_FILES['imagen']['name']);
        ?>
        
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Ok</strong> El archivo se ha subido con éxito.
        </div>
        <?php
            }
           else
            {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error</strong> El archivo subido no es de tipo imagen.
        </div>
        <?php
            }
          }
        ?>
        <form action='Subir_Imagenes.php' method="post" enctype="multipart/form-data">
          <input type="file" name="imagen">
          <input type="submit" class="btn btn-success" value="Guardar Imagen">
        </form>
        <hr/>
        <div style='display:flex;flex-wrap: wrap;'>
        <?php
          $imagenes = scandir("./uploads");
          for($i=2; $i<count($imagenes); $i++)
           {
        ?>
        <div class="card" style="width:125px" >
          <img class="card-img-top" src="uploads/<?= $imagenes[$i] ?>" alt="Card image">
          <div class="card-body">
            <h4 class="card-title"><?= $imagenes[$i] ?></h4>
            <a href="?borrar=<?= $imagenes[$i] ?>" class="btn btn-danger">Borrar</a>
          </div>
        </div>
        <?php
         }
        ?>
     </div>

<!--
        <p></p>
        <div class="container">
          <h3 align="center">Subir imágenes al servidor FTP</h3>
          <div align="center">
            <button type="button" data-toggle="modal" data-target="#src_img_upload" class="btn btn-success btn-lg">Subir archivos</button>
          </div>
          <br/>
          <div id="image_gallery">
            <?php
              /*$images = glob("uploads/*.*");
              foreach($images as $image)
               {
                echo '<div class="col-md-2" align="center"><img src="' . $image .'" width="50px" height="50px" style="border:1px dotted #cacaca; margin-top:10px;"/></div>';
               }*/
            ?>
          </div>
        </div>
        <br/>

        <div id="src_img_upload" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Subir multiples imágenes</h1>
              </div>
              <div class="modal-body">
                <form method="POST" id="upload_form">
                  <label>Seleccione las imágenes</label>
                  <input type="file" name="images[]" id="img_select" multiple class='form-control'>
                </form>
              </div>
            </div>
          </div>
        </div>
-->

  </div>
  <br></br>
  
  <footer class="main-footer">
    <div class="float-right d-sm-none d-md-block"></div>
    <strong>Copyright &copy; 2020 <a href="http://www.elgarzon.com">Grupo Garzon C.A.</a></strong> Todos los derechos reservados.
  </footer>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>


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

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>


<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>


<script>
  $(function () 
   {
    $("#example1").DataTable(
      {
       pageLength: 15,
       lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "Todos"]],
       //"dom": '<"dt-buttons"Bf><"clear">lirtp',
       paging: true,
       autoWidth: true,
       language:
         {
          lengthMenu: "Mostrar _MENU_ Registros",
          zeroRecords: "Disculpe - No se encontraron Registros",
          info: "Mostrando _END_ de _MAX_ Registros",
          infoEmpty: "Pagina _PAGE_ de _PAGES_",
          infoFiltered: "(Filtrado de _MAX_ entradas totales)",
          sSearch: "Buscar:",
          processing: "Por favor espere, Consultando...",
          emptyTable: "Ningún dato disponible en esta tabla",
          loadingRecords: "Cargando...",
          zeroRecords: "No se encontraron resultados",
          paginate: 
           {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior"
           },
          aria:
           {
            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
           }
         }
      }
      );
   });
</script>


<script>
$(document).ready(function(){
 $('#img_select').change(function(){
 $('#upload_form').submit();
 });
 $('#upload_form').on('submit', function(e){
 e.preventDefault();
     $.ajax({
 url : "upload.php",
 method : "POST",
 data: new FormData(this),
 contentType:false,
 processData:false,
 success: function(data){
 $('#img_select').val('');  
                $('#src_img_upload').modal('hide');  
                $('#image_gallery').html(data); 
 }
 })
 });
});

</script>


<!--</form>-->
</body>
</html>