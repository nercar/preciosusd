<?php
  $contraseña = "";
  $usuario = "sa";
  $nombreBaseDeDatos = "BDES";
  $rutaServidor = "192.168.20.207";
  
  $ServidorMerida = "192.168.2.99";
  $ServidorEjido = "192.168.9.1";
  $ServidorAltoChama = "192.168.13.1";
  $ServidorLagunillas = "192.168.18.200";
  $localidadMerida = 1;
  $localidadEjido = 13;
  $localidadAltoChama = 16;
  $localidadLagunillas = 18;

  try
   {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "\nConexion realizada a la base de datos principal...\n";

    $sql = "SELECT * from BDES.dbo.ESARTICULOS_USD";
    $valores = array();
    $con1=0;
    $pdo_statement_object = $base_de_datos->prepare($sql);
    $pdo_statement_object->execute();
    $result = $pdo_statement_object->fetchAll();
    $cantidad00 = $pdo_statement_object->rowCount();
    //echo "Cantidad: $cantidad00 <BR>";

    $stmt = $base_de_datos->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD");
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_OBJ))
     {
      $valores[$con1][0] = $row->codigo;
      $valores[$con1][1] = $row->tipo;
      $valores[$con1][2] = $row->codigotasa;
      $valores[$con1][3] = $row->precio_usd;
      $valores[$con1][4] = $row->localidad;
      $valores[$con1][5] = $row->porcentaje_existencia;
      $valores[$con1][6] = $row->costo_usd;
      $valores[$con1][7] = $row->campo1;
      $con1++;
     }


    //Servidor Merida 192.168.2.99
    try
     {
      $base_de_datos07 = new PDO("sqlsrv:server=$ServidorMerida;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos07->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 07...\n";

      $sql07 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object07 = $base_de_datos07->prepare($sql07);
      $pdo_statement_object07->execute();
      $result07 = $pdo_statement_object07->fetchAll();
      $cantidad07 = $pdo_statement_object07->rowCount();
      //echo "Cantidad de Registros: $cantidad07 <BR>";
      $row07=0;

      for($row07=0;$row07<$cantidad00;$row07++)
       {
        if($valores[$row07][4] == $localidadMerida)
         {
          //echo '<BR>'.$row07.' '.$valores[$row07][0];
          $sentencia07 = $base_de_datos07->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia07->execute([$valores[$row07][0],$valores[$row07][4]]);
          $validar07 = $sentencia07->fetchObject();
      
          if(!$validar07)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag07 = $base_de_datos07->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera07 = $flag07->execute([$valores[$row07][0], $valores[$row07][1], $valores[$row07][2], $valores[$row07][3],$valores[$row07][4], $valores[$row07][5], $valores[$row07][6], $valores[$row07][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag07 = $base_de_datos07->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera07 = $flag07->execute([$valores[$row07][0], $valores[$row07][1], $valores[$row07][2], $valores[$row07][3], $valores[$row07][4], $valores[$row07][5], $valores[$row07][6], $valores[$row07][7], $valores[$row07][0], $valores[$row07][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e07)
     {
      echo "Ocurrió un error con la base de datos: " . $e07->getMessage();
     }


    //Servidor Ejido 192.168.9.1
    try
     {
      $base_de_datos13 = new PDO("sqlsrv:server=$ServidorEjido;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos13->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 13...\n";

      $sql13 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object13 = $base_de_datos13->prepare($sql13);
      $pdo_statement_object13->execute();
      $result13 = $pdo_statement_object13->fetchAll();
      $cantidad13 = $pdo_statement_object13->rowCount();
      //echo "Cantidad de Registros: $cantidad13 <BR>";
      $row13=0;

      for($row13=0;$row13<$cantidad00;$row13++)
       {
        if($valores[$row13][4] == $localidadEjido)
         {
          //echo '<BR>'.$row13.' '.$valores[$row13][0];
          $sentencia13 = $base_de_datos13->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia13->execute([$valores[$row13][0],$valores[$row13][4]]);
          $validar13 = $sentencia13->fetchObject();
      
          if(!$validar13)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag13 = $base_de_datos13->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera13 = $flag13->execute([$valores[$row13][0], $valores[$row13][1], $valores[$row13][2], $valores[$row13][3],$valores[$row13][4], $valores[$row13][5], $valores[$row13][6], $valores[$row13][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag13 = $base_de_datos13->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera13 = $flag13->execute([$valores[$row13][0], $valores[$row13][1], $valores[$row13][2], $valores[$row13][3], $valores[$row13][4], $valores[$row13][5], $valores[$row13][6], $valores[$row13][7], $valores[$row13][0], $valores[$row13][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e13)
     {
      echo "Ocurrió un error con la base de datos: " . $e13->getMessage();
     }


    //Servidor AltoChama 192.168.13.1
    try
     {
      $base_de_datos14 = new PDO("sqlsrv:server=$ServidorAltoChama;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos14->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 14...\n";

      $sql14 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object14 = $base_de_datos14->prepare($sql14);
      $pdo_statement_object14->execute();
      $result14 = $pdo_statement_object14->fetchAll();
      $cantidad14 = $pdo_statement_object14->rowCount();
      //echo "Cantidad de Registros: $cantidad14 <BR>";
      $row14=0;

      for($row14=0;$row14<$cantidad00;$row14++)
       {
        if($valores[$row14][4] == $localidadAltoChama)
         {
          //echo '<BR>'.$row14.' '.$valores[$row14][0];
          $sentencia14 = $base_de_datos14->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia14->execute([$valores[$row14][0],$valores[$row14][4]]);
          $validar14 = $sentencia14->fetchObject();
      
          if(!$validar14)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag14 = $base_de_datos14->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera14 = $flag14->execute([$valores[$row14][0], $valores[$row14][1], $valores[$row14][2], $valores[$row14][3],$valores[$row14][4], $valores[$row14][5], $valores[$row14][6], $valores[$row14][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag14 = $base_de_datos14->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera14 = $flag14->execute([$valores[$row14][0], $valores[$row14][1], $valores[$row14][2], $valores[$row14][3], $valores[$row14][4], $valores[$row14][5], $valores[$row14][6], $valores[$row14][7], $valores[$row14][0], $valores[$row14][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e14)
     {
      echo "Ocurrió un error con la base de datos: " . $e14->getMessage();
     }


    //Servidor Lagunillas 192.168.18.200
    try
     {
      $base_de_datos15 = new PDO("sqlsrv:server=$ServidorLagunillas;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos15->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 15...\n";

      $sql15 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object15 = $base_de_datos15->prepare($sql15);
      $pdo_statement_object15->execute();
      $result15 = $pdo_statement_object15->fetchAll();
      $cantidad15 = $pdo_statement_object15->rowCount();
      //echo "Cantidad de Registros: $cantidad15 <BR>";
      $row15=0;

      for($row15=0;$row15<$cantidad00;$row15++)
       {
        if($valores[$row15][4] == $localidadLagunillas)
         {
          //echo '<BR>'.$row15.' '.$valores[$row15][0];
          $sentencia15 = $base_de_datos15->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia15->execute([$valores[$row15][0],$valores[$row15][4]]);
          $validar15 = $sentencia15->fetchObject();
      
          if(!$validar15)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag15 = $base_de_datos15->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera15 = $flag15->execute([$valores[$row15][0], $valores[$row15][1], $valores[$row15][2], $valores[$row15][3],$valores[$row15][4], $valores[$row15][5], $valores[$row15][6], $valores[$row15][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag15 = $base_de_datos15->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera15 = $flag15->execute([$valores[$row15][0], $valores[$row15][1], $valores[$row15][2], $valores[$row15][3], $valores[$row15][4], $valores[$row15][5], $valores[$row15][6], $valores[$row15][7], $valores[$row15][0], $valores[$row15][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e15)
     {
      echo "Ocurrió un error con la base de datos: " . $e15->getMessage();
     }


   }
  catch (Exception $e)
   {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
   }

?>