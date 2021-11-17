<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

if(!empty($_GET['id']))
 {
  $activo2 = new sub_area("","");
  $activo3 = new item("","","","","");
  $activo4 = new status("","","");
  $activo5 = new ciclo("","","","","","","");

  //Traer contenido de la base de datos
  //$su_usu->set_charset("utf8");
  $flag = "SELECT * FROM detalle_ciclo WHERE fk_id_ciclo = '". $_GET['id'] ."'";
  $query = $su_usu->Ejecutar($flag);
  $cantidad_filas = $su_usu->numFilas();
  //echo '<BR>'.$cantidad_filas;

  echo "<div class='card-body p-0'>";
   echo "<div class='table-responsive'>";
    echo "<table class='table m-0'>";
     echo "<thead class='bg-info'>";
      echo "<tr>";
       echo "<th>Sub-Area</th>";
       echo "<th>Item</th>";
       echo "<th>Status</th>";
       echo "<th>Caja</th>";
      echo "</tr>";
     echo "</thead>";

     echo "<tbody>";
     if($query)
      {
       $con1=0;
       while($row1=mysqli_fetch_array($query))
        {
         $abc_id[$con1]=$row1[0];
         $abc_item[$con1]=$row1[2];
         $abc_sub_area[$con1]=$row1[3];
         $abc_status[$con1]=$row1[4];
         
         $resul2=$activo2->Encontrar_Sub_Area($abc_sub_area[$con1]);
         if($resul2)
          {
           $con2=0;
           while($row2=mysqli_fetch_array($resul2))
            {
             $def_descripcion[$con2]=$row2[1];
            }
          }

         $resul3=$activo3->Encontrar_Nombre_Item($abc_item[$con1]);
         if($resul3)
          {
           $con3=0;
           while($row3=mysqli_fetch_array($resul3))
            {
             $ijk_descripcion[$con3]=$row3[1];
            }
          }

         $resul4=$activo4->Buscar_Nombre_Status($abc_status[$con1]);
         if($resul4)
          {
           $con4=0;
           while($row4=mysqli_fetch_array($resul4))
            {
             $mnl_descripcion[$con4]=$row4[1];
            }
          }

          if($mnl_descripcion[$con4]=='Bien')
           $color = "badge badge-success";
          if($mnl_descripcion[$con4]=='Averiado')
           $color = "badge badge-warning";
          if($mnl_descripcion[$con4]=='Reparacion')
           $color = "badge badge-primary";
          if($mnl_descripcion[$con4]=='Falla')
           $color = "badge badge-danger";

         $resul5=$activo5->Consultar_Numero_Caja($_GET['id']);
         if($resul5)
          {
           $con5=0;
           while($row5=mysqli_fetch_array($resul5))
            {
             $opq_observacion[$con5]=$row5[4];
             $opq_puesto[$con5]=$row5[6];
            }
          }

         echo "<tr>";
          echo "<td>$def_descripcion[$con2]</td>";
          echo "<td>$ijk_descripcion[$con3]</td>";
          echo "<td><span class='$color'>$mnl_descripcion[$con4]</span></td>";
          echo "<td>$opq_puesto[$con5]</td>";
         echo "</tr>";
         $con1++;
        }
      }
     echo "</tbody>";

    echo "</table>";
    echo '<BR>';
    echo "<h5 class='m-0 text-dark'>Observaciones:</h5>";
    echo "<div class='form-group'>";
     echo "<textarea class='form-control' id='obser' name='obser' rows='2'>".$opq_observacion[$con5]."</textarea>";
    echo "</div>";

   echo "</div>"; // cierre del Div table-responsive
  echo "</div>"; // cierre del Div card-body
 }
else
 {
  echo 'No hay Contenido...';
 }
?>