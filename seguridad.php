<?php
  header("Cache-control: private"); 
  //session_name("loginUsuario");
  session_start();
  $entrada=$_SERVER['HTTP_USER_AGENT']."CICLO_SERVICIO_EMPRESAS_GARZON_22-07-2019";;

  if(!isset($_SESSION['estado']) && !isset($_SESSION['HTTP_USER_AGENT']))
   {
    echo "<script> alert('Debe Iniciar Sesion...'); </script>";
    //exit;
    echo "<script> location='index.php'; </script>";
	  exit;
   }
  else 
   {
    if($_SESSION['HTTP_USER_AGENT']!=md5($entrada) &&  $_SESSION['estado']!="logeado")
     {
      echo "<script> alert('Debe Iniciar Sesion...'); </script>";
      //exit;
      echo "<script> location='index.php'; </script>";
	    exit;
      //echo "no hay estado";
     }
     //echo session_id(); 
     $LOGusuario=$_SESSION['nomusu'];
   }
?>