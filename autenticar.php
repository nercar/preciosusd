<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
<script language="JavaScript" src="md5.js"></script>
<script language="JavaScript">

//var numero = 0x17062015;  // Me genera un numero aleatorio para concatenarlo al password
//numero = numero.toString();
function calculaMD5()
 {
  var pw = document.forms["form1"].elements["valo"].value
  //alert(pw);
  //pw += numero  // Aqui se concatena el numero
 }
</script>

</head>

<body>
<form action="validar.php" method="post" name="form1" id="form1">
<?php
  include("conex.php");
  $login = $_POST["login"];
  $password = $_POST["password"];
  //echo '<BR>'.$login;
  //echo '<BR>'.$password;
  $cone = new SUsuario($login,$password,"","","");
  $compro = $cone->Validar();
  //echo "<BR> El valor es: ".$compro;
  
  if($compro==2)
   {
    include("validar.php");
  	$usua = validar($login,$password);
	
    $_SESSION['nomusu'] = $_POST["login"];
	  $flag = $_SESSION['nomusu'];
	  echo "<script> location='index3.php?usuario=$flag'; </script>";
	  exit;
   }
  if($compro == 1)
   {
	  echo "<script> alert('Clave invalida pulse una tecla para continuar'); </script>";
	  echo "<script> location='index.php'; </script>";
    exit;
   }
  if($compro == -5)
   {
	  echo "<script> alert('Usuario no Registrado o Suspendido, pulse una tecla para continuar'); </script>";
    echo "<script> location='index.php'; </script>";
	  exit;
   }
  ob_flush();
?>
</form>
</body>
</html>