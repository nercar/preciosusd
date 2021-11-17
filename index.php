<?php
  @session_start();
  //session_start();
  if(!isset($_SESSION['nomusu']))
   {
    //session_unregister($_SESSION['nomusu']);
    //session_unregister($_SESSION['estado']);
    //session_unregister($_SESSION['HTTP_USER_AGENT']);
   }
   session_unset();
   //echo $_SESSION['nomusu'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Grupo Garzon C.A. | Precios USD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
	<link rel="icon"       type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<script language="JavaScript" src="md5.js"></script>
<script type="text/javascript" src="config.js"></script>
<script language="JavaScript">

//var numero = 0x17062015;  // Me genera un numero aleatorio para concatenarlo al password
//numero = numero.toString();
function calculaMD5() 
 {
  var pw = document.forms["login"].elements["password"].value
  //alert(pw);
  //pw += numero  // Aqui se concatena el numero
  return calcMD5(pw)
  //alert(calcMD5(pw));
 }

function enviaMD5(hash) 
 {
  //document.forms["login"].elements["cifrado"].value = hash; //Este era el codigo fuente planteado originalmente pero es mejor usar
  //document.forms["login"].elements["numero"].value = numero; //Numero no lo necesito porq no lo estoy generando
  document.forms["login"].elements["password"].value = hash;
  document.forms["login"].submit();
 }

function on_validar()
 {
  var F = document.login;
  if(F.login.value == "")
   {
	alert("Debe ingresar su nombre de Usuario");
	F.login.focus();
	return false;
   }
  if(F.password.value == "")
   {
	alert("Debe ingresar su contraseña");
	F.password.focus();
	return false;
   }
   enviaMD5(calculaMD5());	
   return true;
 }
</script>

<script language="JavaScript">
 mensaje="Botón derecho desactivado.";
 function desDerecho(e)
  {
   if(navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2))
    return false;
   else
    if(navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
	 {
      alert(mensaje);
      return false;
     }
  }
  document.onmousedown=desDerecho;
  if(document.layers) window.captureEvents(Event.MOUSEDOWN);
   window.onmousedown=desDerecho;
</script>

<script language="javascript">
 function valida()
  {
   var login=document.form1.usuario.value;
   var pass=document.form1.clave.value;
   if(login && pass)
    {
     document.form1.action="autenticar.php";
	 document.form1.submit();
    }

  if(!login && !pass)
   {
   	alert("Por favor ingrese un usuario y una contraseña");
   	document.getElementById("usuario").focus();
   }
  else
   if(!login)
   	{
   	 alert("Por favor ingrese un usuario");
   	 document.getElementById("usuario").focus();
   	}
   else
    if(!pass)
     {
      alert("Por favor ingrese su contraseña");
      document.getElementById("clave").focus();
     }
    else
     return false;
  }
</script>

</head>

<?php
  $sw='';
  if($sw==1)
   {
	echo "<script> alert('Contraseña Invalida'); </script>";
   }
  if($sw==2)
   {
	echo "<script> alert('Esta Bien'); </script>";
   }
  if($sw==-5)
   {
	echo "<script> alert('Usuario no Registrado'); </script>";
   }
?>

<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="autenticar.php" method="post" name="login" id="login" onSubmit="return on_validar()" >
					<span class="login100-form-title p-b-49">
						Precios USD
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Nombre de Usuario es Requerido">
						<span class="label-input100">Usuario:</span>
						<input class="input100" type="text" name="login" id="login" value="" placeholder="Usuario Intranet">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contraseña es Requerida">
						<span class="label-input100">Contraseña:</span>
						<input class="input100" name="password" type="password" value="" id="password" placeholder="Contraseña Intranet">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Olvido su contraseña ?
						</a>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Iniciar Sesión
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->

</body>
</html>