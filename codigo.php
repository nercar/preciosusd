<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo = new area("","","","","");
$activo2 = new area_item("","","");
$activo3 = new status("","","");
//$activo->MDB->Conectar();
error_reporting(E_ALL);
$paso=1;
?>
<form name="form1" method="POST" id="form1" action="codigo.php" enctype="multipart/form-data">

      <table id="example1" class="table table-bordered table-striped">
      <tbody>
        <tr>
          <td><table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SAIG</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               <td><div class="form-group">
                    <!-- <label>Tipo de SAIG</label> -->
                <select class="form-control" name="id_area" id="id_area">
                <option value="0">Seleccione</option>
                 <?php
                   $resul1=$activo->Buscar_area($paso);
                   if($resul1)
                    {
	                 $con=0;
	                 while($row=mysqli_fetch_array($resul1))
	                  {
	                   $abc_id[$con]=$row[0];
	                   $abc_descripcion[$con]=$row[3];
                 ?>
                <option value="<?php echo $abc_id[$con]?>">                 <?php echo $abc_descripcion[$con]?> </option>
                 <?php
	               $con++;
  	                  }
                    }
                 ?>
                </select>
                </div></td>
               </tr>
               <input name="xyz_id_area" type="text" id="xyz_id_area" size="1" value="<?php echo $id_area;?>" style="visibility:hidden"/>
              <tr>
              <td>
              <input name="crear" type="submit" class="col-1 btn btn-secondary btn-sm" id="crear" value="Crear"/>
              </td>
              </tr>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
<?php
  if(@$_POST[crear])
   {
	$con2=0;
	$con3=0;
	//echo "Ingreso".@$_POST[id_area];
    $bandera = @$_POST[id_area];
	$sql = " SELECT * FROM area_item WHERE id_area_paso='". $bandera ."' ORDER BY id_item ";
    $su_usu->Ejecutar($sql);
    $filas=$su_usu->numFilas();
	//echo "filas=".$filas;

    echo "<div class='container'>";
    for($i=0;$i<$filas;$i++)
     {
	  echo "<div class='row'>";
	   echo "<div class='col-4' style='background-color:#ccc'>";
	    //echo "<h4>Monitor</h4>";
		$resul2=$activo2->Consultar_area_item2($bandera);
		if($resul2)
		 {
		  $con2=0;
		  while($row2=mysqli_fetch_array($resul2))
	       {
			//$row2=mysqli_fetch_array($resul2);   
			//$xyz_id_item[$i]=$row2[1];
	        $xyz_descripcion[$i]=$row2[0];
			if($i==$con2)
			 {
              //echo "<h4>$xyz_descripcion[$i]</h4>";
			  echo "<p class='text-muted'>$xyz_descripcion[$i]</p>";
			 }
			$con2++;
  	       }
         }

	   echo "</div>";
	   //echo $i;
	   echo "<div class='col-4' style='background-color:#ddd'>";
	    echo "<div class='form-group'>";
		 echo '<select class="form-control" name="valor'.$i.'" id="valor'.$i.'">';
		    echo "<option value='0'>Seleccionar</option>";
			$resul3=$activo3->Consultar_Status();
			if($resul3)
			 {
			  $con3=0;
			  while($row3=mysqli_fetch_array($resul3))
	           {
				$ijk_id[$con3]=$row3[0];
	            $ijk_descripcion[$con3]=$row3[1];
                echo "<option value='$ijk_id[$con3]'>";                echo "$ijk_descripcion[$con3]";
				echo "</option>";
                $con3++;
  	           }
             }
		 echo "</select>";
		echo"</div>";
	   echo "</div>";
	  echo "</div>";
	 }
    echo "</div>";
	$su_usu->Desconectar();
   }
  else
   {
	//echo "Fallo...";
   }
   
?>

          </td>
        </tr>
        <tr>
         <td>
          <input name="guardar" type="submit" class="col-1 btn btn-secondary btn-sm" id="guardar" value="Guardar"/>
         </td>
        </tr>

      </tbody>
      </table>
      </form>
      