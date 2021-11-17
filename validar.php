<?php
 function validar($log1,$log2)
  {
   session_start();
   if(!isset($_SESSION['estado']) && !isset($_SESSION['HTTP_USER_AGENT']))
	{
	 $entrada=$_SERVER['HTTP_USER_AGENT']."CICLO_SERVICIO_EMPRESAS_GARZON_22-07-2019";
     $usuario_session = new SUsuario($log1,$log2,"","","");
	 $usuario_session->BuscarUsuario();	
	 if($usuario_session->Validar()) 
	  {
       $_SESSION['HTTP_USER_AGENT'] = md5($entrada);  
	   $_SESSION['estado'] = "logeado"; 
	   $_SESSION['nomusu'] = $usuario_session->get_login();
	  }
	 else
	  {
	   echo "<BR> </BR>";
	   echo "No hay nada aqui...";
	   echo "<BR> </BR>";
	  }
	}
   if($_SESSION['HTTP_USER_AGENT']!=$entrada &&  $_SESSION['estado']!="logeado")
	{
	 echo "<BR> </BR>";
	 echo "Algo esta mal";
	 echo "<BR> </BR>";
	}
	return $LOGusuario=$_SESSION['nomusu'];
  }
?>