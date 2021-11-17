<?php
  include("conex.php");
  $su_usu = new AdminBD();
  $su_usu->Conectar();

  $bandera = new detalle_caja("","","");
  error_reporting(E_ALL);

  $t1=$_POST['t1'];
  $t2=$_POST['t2'];
  //$t3=$_POST['t3'];

  if($t2==20)
   {
    //$respuesta1='<select name="list3" >';
    //$respuesta1.='<option value="0">Seleccione</option>';
    //$respuesta1.='</select>';
    //echo "document.getElementById('listado3').innerHTML='".$respuesta1."';\n";
    if($t1=='0')
     {
	  $respuesta='<select class="form-control" name="list8" onChange="generarListado17(this,30,list7)">';
      $respuesta.='<option value="0">Seleccione</option>';
	  $respuesta.='</select>';
     }
    else
     {
	  $respuesta='<select class="form-control" name="list8" onChange="generarListado17(this,30,list7)">';
	  $respuesta.='<option value="0">Seleccione</option>';
	  $resul2=$bandera->Buscar_detalle_caja($t1);
	  if($resul2)
	   {
	    $con = 0;
	    while($row=mysqli_fetch_array($resul2))
	     {
		  $id[$con]=$row[0];
		  $descripcion[$con]=$row[1];
		  $respuesta.='<option value="'.$id[$con].'"> '.utf8_decode(utf8_encode($descripcion[$con])).'</option>';
		  $con++;
	     }
	   }
	  $respuesta.='</select>';
      //echo "alert('".$con."');\n"; 
     }
     echo "document.getElementById('listado8').innerHTML='".$respuesta."';\n";
   }
?>