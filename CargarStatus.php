<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();
$activo1 = new sucursal("","","");

  //$flag = " SELECT CAST(ciclo.fecha as date),item.descripcion,sub_area.descripcion,detalle_ciclo.fk_id_status,status.descripcion FROM ciclo,detalle_ciclo,status,item,sub_area WHERE detalle_ciclo.fk_id_ciclo = ciclo.id AND detalle_ciclo.fk_id_status = status.id AND item.id = detalle_ciclo.fk_id_item AND sub_area.id = detalle_ciclo.fk_id_sub_area AND detalle_ciclo.fk_id_status <> 1 ORDER BY ciclo.fecha DESC,detalle_ciclo.fk_id_status ";
  $flag = "SELECT CAST(ciclo.fecha as date),CAST(ciclo.fecha as time),ciclo.fk_id_sucursal,item.descripcion,sub_area.descripcion,detalle_ciclo.fk_id_status,status.descripcion,ciclo.observacion FROM ciclo,detalle_ciclo,status,item,sub_area WHERE detalle_ciclo.fk_id_ciclo = ciclo.id AND detalle_ciclo.fk_id_status = status.id AND item.id = detalle_ciclo.fk_id_item AND sub_area.id = detalle_ciclo.fk_id_sub_area AND detalle_ciclo.fk_id_status <> 1 ORDER BY ciclo.fecha DESC,detalle_ciclo.fk_id_status";  
  //echo '<BR>'.$flag;
  $query = $su_usu->Ejecutar($flag);
  $cantidad_filas = $su_usu->numFilas();
  //echo '<BR>'.$cantidad_filas;

  echo "<div class='card-body p-0'>";
   echo "<div class='table-responsive'>";
    echo "<table class='table m-0'>";
     echo "<thead class='bg-primary'>";
      echo "<tr>";
       echo "<th>Fecha</th>";
       echo "<th>Sucursal</th>";
       echo "<th>Item</th>";
       echo "<th>Sub-Area</th>";
       echo "<th>Status</th>";
       echo "<th>Observaciones</th>";
      echo "</tr>";
     echo "</thead>";

     echo "<tbody>";
     if($query)
      {
       $con1=0;
       while($row1=mysqli_fetch_array($query))
        {
         $abc_fecha[$con1]=$row1[0];
         $abc_hora[$con1]=$row1[1];
         $abc_sucursal[$con1]=$row1[2];
         $abc_item[$con1]=$row1[3];
         $abc_subarea[$con1]=$row1[4];
         $abc_status[$con1]=$row1[5];
         $abc_descripcion_status[$con1]=$row1[6];
         $abc_observaciones[$con1]=$row1[7];

         $fecha01[$con1] = date('d/m/Y',strtotime($abc_fecha[$con1]));
         
          $resul1=$activo1->Consultar_Nombre_Sucursal($abc_sucursal[$con1]);
          if($resul1)
           {
            $con2=0;
            while($row1=mysqli_fetch_array($resul1))
             {
              $def_nombre_sucursal[$con2]=$row1[2];
             }
           }

         if($abc_status[$con1]==2)
          {
           $color_descripcion[$con1] = "badge-warning";
          }

         if($abc_status[$con1]==3)
          {
           $color_descripcion[$con1] = "badge-info";
          }

         if($abc_status[$con1]==4)
          {
           $color_descripcion[$con1] = "badge-danger";
          }

         echo "<tr>";
          echo "<td>$fecha01[$con1]</td>";
          echo "<td>$def_nombre_sucursal[$con2]</td>";
          echo "<td>$abc_item[$con1]</td>";
          echo "<td>$abc_subarea[$con1]</td>";
          echo "<td><span class='badge $color_descripcion[$con1]'>$abc_descripcion_status[$con1]</span></td>";
          echo "<td>$abc_observaciones[$con1]</td>";
         echo "</tr>";
         $con1++;
        }
      }
     echo "</tbody>";
    echo "</table>";
   echo "</div>";//Cierre del Div table-responsive
  echo "</div>";//Cierre del Div card-body
?>