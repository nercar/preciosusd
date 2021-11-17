<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

if(!empty($_GET['id1']))
 {
  $activo2 = new sucursal("","","");
  $activo3 = new area("","","","","");
  $activo6 = new caja("","","");
  
  $flag = " SELECT sub_area.descripcion,item.descripcion,status.descripcion,ciclo.puesto,ciclo.observacion FROM ciclo,detalle_ciclo,area_item,sucursal,area,item,status,sub_area WHERE ciclo.id = detalle_ciclo.fk_id_ciclo AND ciclo.fk_id_sucursal = sucursal.id AND area.id = area_item.id_area_paso AND detalle_ciclo.fk_id_sub_area = sub_area.id AND detalle_ciclo.fk_id_sub_area = area_item.id_sub_area AND detalle_ciclo.fk_id_item = item.id AND detalle_ciclo.fk_id_status = status.id AND DATE(ciclo.fecha) = CURDATE() AND ciclo.fk_id_sucursal = '". $_GET['id1'] ."' AND area_item.id_area_paso = '". $_GET['id2'] ."' GROUP BY detalle_ciclo.fk_id_ciclo, detalle_ciclo.fk_id_item, detalle_ciclo.fk_id_sub_area, detalle_ciclo.fk_id_status ORDER BY ciclo.fecha ";
  //echo '<BR>'.$flag;
  $query = $su_usu->Ejecutar($flag);
  $cantidad_filas = $su_usu->numFilas();
  //echo '<BR>'.$cantidad_filas;
  

  $resul2=$activo2->Consultar_Nombre_Sucursal($_GET['id1']);
  if($resul2)
   {
    $con2=0;
    while($row2=mysqli_fetch_array($resul2))
     {
      $def_descripcion[$con2]=$row2[2];
     }
   }

  $resul3=$activo3->Encontrar_Area($_GET['id2']);
  if($resul3)
   {
    $con3=0;
    while($row3=mysqli_fetch_array($resul3))
     {
      $ijk_descripcion[$con3]=$row3[3];
     }
   }


  echo "<div class='card-body p-0'>";
    echo "<div class='table-responsive'>";
      echo "<table class='table table-hover'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><h6>Sucursal: $def_descripcion[$con2]</h6></th>";
            echo "<th><h6>Area: $ijk_descripcion[$con3]</h6></th>";
          echo "</tr>";
        echo "</thead>";
      echo "</table>";
      //echo "<table class='table m-0'>";
      echo "<table class='table table-hover'>";
        echo "<thead class='bg-info'>";
          echo "<tr>";
            echo "<th><h6>Sub-Area</h6></th>";
            echo "<th><h6>Item</h6></th>";
            echo "<th><h6>Status</h6></th>";
            echo "<th><h6>Caja</h6></th>";
          echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
          if($query)
           {
            $con1=0;
            $con2=0;
            while($row1=mysqli_fetch_array($query))
             {
              $abc_sub_area[$con1]=$row1[0];
              $abc_item[$con1]=$row1[1];
              $abc_status[$con1]=$row1[2];
              $abc_caja[$con1]=$row1[3];
              $abc_observacion[$con1]=$row1[4];
         
              $resul6=$activo6->Encontar_Caja($abc_caja[$con1]);
              if($resul6)
               {
                $con6=0;
                while($row6=mysqli_fetch_array($resul6))
                 {
                  $rst_id[$con6]=$row6[0];
                  $rst_descripcion[$con6]=$row6[1];
                 }
               }
              
              if($abc_status[$con1]=='Bien')
               $color = "badge badge-success";
              if($abc_status[$con1]=='Averiado')
               $color = "badge badge-warning";
              if($abc_status[$con1]=='Reparacion')
               $color = "badge badge-primary";
              if($abc_status[$con1]=='Falla')
               $color = "badge badge-danger";

              echo "<tr>";
                echo "<td>$abc_sub_area[$con1]</td>";
                echo "<td>$abc_item[$con1]</td>";
                echo "<td><span class='$color'>$abc_status[$con1]</span></td>";
                echo "<td>$rst_descripcion[$con6]</td>";
              echo "</tr>";
              $con1++;
             }
           }
        echo "</tbody>";
        $con2 = $con1-1;
      echo "</table>";
      echo '<BR>';
      echo "<h5 class='m-0 text-dark'>Observaciones:</h5>";
        echo "<div class='form-group'>";
          echo "<textarea class='form-control' id='obser' name='obser' rows='2'>".@$abc_observacion[$con2]."</textarea>";
        echo "</div>";
    echo "</div>"; // Cierre del div table-responsive
  echo "</div>"; // Cierre del div card-body
 }
else
 {
  echo 'No hay contenido...';
 }
?>