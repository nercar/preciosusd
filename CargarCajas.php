<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

  $flag = "SELECT CAST(ciclo.fecha as date),item.descripcion,sub_area.descripcion,detalle_ciclo.fk_id_status,status.descripcion FROM ciclo,detalle_ciclo,status,item,sub_area WHERE detalle_ciclo.fk_id_ciclo = ciclo.id AND detalle_ciclo.fk_id_status = status.id AND item.id = detalle_ciclo.fk_id_item AND sub_area.id = detalle_ciclo.fk_id_sub_area AND ciclo.puesto <> 0 ORDER BY ciclo.fecha DESC,detalle_ciclo.fk_id_status";
  //echo '<BR>'.$flag;
  $query = $su_usu->Ejecutar($flag);
  $cantidad_filas = $su_usu->numFilas();
  //echo '<BR>'.$cantidad_filas;

  $activo5 = new ciclo("","","","","","","");
  $activo6 = new caja("","","");

  echo "<div class='card-body p-0'>";
   echo "<div class='table-responsive'>";
    echo "<table class='table m-0'>";
     echo "<thead class='bg-secondary'>";
      echo "<tr>";
       echo "<th>Fecha</th>";
       echo "<th>Sucursal</th>";
       echo "<th>Caja</th>";
       echo "<th>Item</th>";
       echo "<th>Status</th>";
      echo "</tr>";
     echo "</thead>";

     echo "<tbody>";
     if($query)
      {
                $color_cajas='';
                $resul56=$activo5->Status_Caja_Sucursal();
                if($resul56)
                 {
                  $con56=0;
                  while($row56=mysqli_fetch_array($resul56))
                   {
                    $opq_fecha[$con56]=$row56[0];
                    $opq_sucursal[$con56]=$row56[1];
                    $opq_caja[$con56]=$row56[2];
                    $opq_item[$con56]=$row56[3];
                    $opq_status[$con56]=$row56[4];

                    $resul6=$activo6->Encontar_Caja($opq_caja[$con56]);
                    if($resul6)
                     {
                      $con6=0;
                      while($row6=mysqli_fetch_array($resul6))
                       {
                        $rst_id[$con6]=$row6[0];
                        $rst_descripcion[$con6]=$row6[1];
                       }
                     }

                    $fecha56[$con56] = date('d/m/Y',strtotime($opq_fecha[$con56]));

                    if($opq_status[$con56]=='Bien')
                     {
                      $color = "badge badge-success";
                     }
                    
                    if($opq_status[$con56]=='Averiado')
                     {
                      $color = "badge badge-warning";
                     }
                    
                    if($opq_status[$con56]=='Reparacion')
                     {
                      $color = "badge badge-primary";
                     }
                    
                    if($opq_status[$con56]=='Falla')
                     {
                      $color = "badge badge-danger";
                     }

                    echo "<tr>";
                      echo "<td>$fecha56[$con56]</td>";
                      echo "<td>$opq_sucursal[$con56]</td>";
                      echo "<td>$rst_descripcion[$con6]</td>";
                      echo "<td>$opq_item[$con56]</td>";
                      echo "<td><span class='$color'>$opq_status[$con56]</span></td>";
                    echo "</tr>";
                    $con56++;
                   }
                 }
      }
     echo "</tbody>";
    echo "</table>";
   echo "</div>"; // cierre deldiv table-responsive
  echo "</div>"; // cierredel div card-body
?>