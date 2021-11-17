<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();
//echo "El codigo es: ".$_GET['codigo'];

$contraseña = "";
$usuario = "sa";
$nombreBaseDeDatos = "BDES";
$rutaServidor = "192.168.20.207";

  try
   {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion realizada a la base de datos: ";
   }
  catch (Exception $e)
   {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
   }

/*if(!empty($_GET['codigo']))
 {
 }
else
 {
  echo 'No hay Contenido por mostrar...';
 }*/
?>