<?php
  $contraseña = "";
  $usuario = "sa";
  $nombreBaseDeDatos = "BDES";
  $rutaServidor = "192.168.20.207";
  
  $ServidorRotaria = "192.168.0.200";
  $ServidorSanJosecito = "192.168.6.1\productivo";
  $ServidorPuebloNuevo = "192.168.12.1";
  $ServidorCastellana = "192.168.7.1";
  $ServidorMadreJuana = "192.168.8.200";
  $ServidorParamillo = "192.168.21.200";
  $localidadRotaria = 2;
  $localidadSanJosecito = 8;
  $localidadPuebloNuevo = 9;
  $localidadCastellana = 10;
  $localidadMadreJuana = 14;
  $localidadParamillo = 21;
  

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


    //Servidor Pueblo Nuevo 192.168.12.1
    try
     {
      $base_de_datos01 = new PDO("sqlsrv:server=$ServidorPuebloNuevo;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos01->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 01...\n";

      $sql01 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object01 = $base_de_datos01->prepare($sql01);
      $pdo_statement_object01->execute();
      $result01 = $pdo_statement_object01->fetchAll();
      $cantidad01 = $pdo_statement_object01->rowCount();
      //echo "Cantidad de Registros: $cantidad01 <BR>";
      $row01=0;

      for($row01=0;$row01<$cantidad00;$row01++)
       {
        if($valores[$row01][4] == $localidadPuebloNuevo)
         {
          //echo '<BR>'.$row01.' '.$valores[$row01][0];
          $sentencia01 = $base_de_datos01->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia01->execute([$valores[$row01][0],$valores[$row01][4]]);
          $validar01 = $sentencia01->fetchObject();
      
          if(!$validar01)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag01 = $base_de_datos01->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera01 = $flag01->execute([$valores[$row01][0], $valores[$row01][1], $valores[$row01][2], $valores[$row01][3],$valores[$row01][4], $valores[$row01][5], $valores[$row01][6], $valores[$row01][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag01 = $base_de_datos01->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera01 = $flag01->execute([$valores[$row01][0], $valores[$row01][1], $valores[$row01][2], $valores[$row01][3], $valores[$row01][4], $valores[$row01][5], $valores[$row01][6], $valores[$row01][7], $valores[$row01][0], $valores[$row01][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e01)
     {
      echo "Ocurrió un error con la base de datos: " . $e01->getMessage();
     }


    //Servidor Castellana 192.168.7.1
    try
     {
      $base_de_datos02 = new PDO("sqlsrv:server=$ServidorCastellana;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos02->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 02...\n";

      $sql02 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object02 = $base_de_datos02->prepare($sql02);
      $pdo_statement_object02->execute();
      $result02 = $pdo_statement_object02->fetchAll();
      $cantidad02 = $pdo_statement_object02->rowCount();
      //echo "Cantidad de Registros: $cantidad02 <BR>";
      $row02=0;

      for($row02=0;$row02<$cantidad00;$row02++)
       {
        if($valores[$row02][4] == $localidadCastellana)
         {
          //echo '<BR>'.$row02.' '.$valores[$row02][0];
          $sentencia02 = $base_de_datos02->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia02->execute([$valores[$row02][0],$valores[$row02][4]]);
          $validar02 = $sentencia02->fetchObject();
      
          if(!$validar02)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag02 = $base_de_datos02->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera02 = $flag02->execute([$valores[$row02][0], $valores[$row02][1], $valores[$row02][2], $valores[$row02][3],$valores[$row02][4], $valores[$row02][5], $valores[$row02][6], $valores[$row02][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag02 = $base_de_datos02->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera02 = $flag02->execute([$valores[$row02][0], $valores[$row02][1], $valores[$row02][2], $valores[$row02][3], $valores[$row02][4], $valores[$row02][5], $valores[$row02][6], $valores[$row02][7], $valores[$row02][0], $valores[$row02][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e02)
     {
      echo "Ocurrió un error con la base de datos: " . $e02->getMessage();
     }


    //Servidor Rotaria 192.168.0.200
    try
     {
      $base_de_datos03 = new PDO("sqlsrv:server=$ServidorRotaria;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos03->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 03...\n";

      $sql03 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object03 = $base_de_datos03->prepare($sql03);
      $pdo_statement_object03->execute();
      $result03 = $pdo_statement_object03->fetchAll();
      $cantidad03 = $pdo_statement_object03->rowCount();
      //echo "Cantidad de Registros: $cantidad03 <BR>";
      $row03=0;

      for($row03=0;$row03<$cantidad00;$row03++)
       {
        if($valores[$row03][4] == $localidadRotaria)
         {
          //echo '<BR>'.$row03.' '.$valores[$row03][0];
          $sentencia03 = $base_de_datos03->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia03->execute([$valores[$row03][0],$valores[$row03][4]]);
          $validar03 = $sentencia03->fetchObject();
      
          if(!$validar03)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag03 = $base_de_datos03->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera03 = $flag03->execute([$valores[$row03][0], $valores[$row03][1], $valores[$row03][2], $valores[$row03][3],$valores[$row03][4], $valores[$row03][5], $valores[$row03][6], $valores[$row03][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag03 = $base_de_datos03->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera03 = $flag03->execute([$valores[$row03][0], $valores[$row03][1], $valores[$row03][2], $valores[$row03][3], $valores[$row03][4], $valores[$row03][5], $valores[$row03][6], $valores[$row03][7], $valores[$row03][0], $valores[$row03][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e03)
     {
      echo "Ocurrió un error con la base de datos: " . $e03->getMessage();
     }


    //Servidor San Josecito 192.168.6.1\productivo
    try
     {
      $base_de_datos04 = new PDO("sqlsrv:server=$ServidorSanJosecito;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos04->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 04...\n";

      $sql04 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object04 = $base_de_datos04->prepare($sql04);
      $pdo_statement_object04->execute();
      $result04 = $pdo_statement_object04->fetchAll();
      $cantidad04 = $pdo_statement_object04->rowCount();
      //echo "Cantidad de Registros: $cantidad04 <BR>";
      $row04=0;

      for($row04=0;$row04<$cantidad00;$row04++)
       {
        if($valores[$row04][4] == $localidadSanJosecito)
         {
          //echo '<BR>'.$row04.' '.$valores[$row04][0];
          $sentencia04 = $base_de_datos04->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia04->execute([$valores[$row04][0],$valores[$row04][4]]);
          $validar04 = $sentencia04->fetchObject();
      
          if(!$validar04)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag04 = $base_de_datos04->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera04 = $flag04->execute([$valores[$row04][0], $valores[$row04][1], $valores[$row04][2], $valores[$row04][3],$valores[$row04][4], $valores[$row04][5], $valores[$row04][6], $valores[$row04][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag04 = $base_de_datos04->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera04 = $flag04->execute([$valores[$row04][0], $valores[$row04][1], $valores[$row04][2], $valores[$row04][3], $valores[$row04][4], $valores[$row04][5], $valores[$row04][6], $valores[$row04][7], $valores[$row04][0], $valores[$row04][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e04)
     {
      echo "Ocurrió un error con la base de datos: " . $e04->getMessage();
     }


    //Servidor Paramillo 192.168.21.200
    try
     {
      $base_de_datos05 = new PDO("sqlsrv:server=$ServidorParamillo;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos05->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 05...\n";

      $sql05 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object05 = $base_de_datos05->prepare($sql05);
      $pdo_statement_object05->execute();
      $result05 = $pdo_statement_object05->fetchAll();
      $cantidad05 = $pdo_statement_object05->rowCount();
      //echo "Cantidad de Registros: $cantidad05 <BR>";
      $row05=0;

      for($row05=0;$row05<$cantidad00;$row05++)
       {
        if($valores[$row05][4] == $localidadParamillo)
         {
          //echo '<BR>'.$row05.' '.$valores[$row05][0];
          $sentencia05 = $base_de_datos05->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia05->execute([$valores[$row05][0],$valores[$row05][4]]);
          $validar05 = $sentencia05->fetchObject();
      
          if(!$validar05)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag05 = $base_de_datos05->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera05 = $flag05->execute([$valores[$row05][0], $valores[$row05][1], $valores[$row05][2], $valores[$row05][3],$valores[$row05][4], $valores[$row05][5], $valores[$row05][6], $valores[$row05][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag05 = $base_de_datos05->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera05 = $flag05->execute([$valores[$row05][0], $valores[$row05][1], $valores[$row05][2], $valores[$row05][3], $valores[$row05][4], $valores[$row05][5], $valores[$row05][6], $valores[$row05][7], $valores[$row05][0], $valores[$row05][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e05)
     {
      echo "Ocurrió un error con la base de datos: " . $e05->getMessage();
     }


    //Servidor Madre Juana 192.168.8.200
    try
     {
      $base_de_datos06 = new PDO("sqlsrv:server=$ServidorMadreJuana;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos06->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 06...\n";

      $sql06 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object06 = $base_de_datos06->prepare($sql06);
      $pdo_statement_object06->execute();
      $result06 = $pdo_statement_object06->fetchAll();
      $cantidad06 = $pdo_statement_object06->rowCount();
      //echo "Cantidad de Registros: $cantidad06 <BR>";
      $row06=0;

      for($row06=0;$row06<$cantidad00;$row06++)
       {
        if($valores[$row06][4] == $localidadMadreJuana)
         {
          //echo '<BR>'.$row06.' '.$valores[$row06][0];
          $sentencia06 = $base_de_datos06->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia06->execute([$valores[$row06][0],$valores[$row06][4]]);
          $validar06 = $sentencia06->fetchObject();
      
          if(!$validar06)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag06 = $base_de_datos06->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera06 = $flag06->execute([$valores[$row06][0], $valores[$row06][1], $valores[$row06][2], $valores[$row06][3],$valores[$row06][4], $valores[$row06][5], $valores[$row06][6], $valores[$row06][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag06 = $base_de_datos06->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera06 = $flag06->execute([$valores[$row06][0], $valores[$row06][1], $valores[$row06][2], $valores[$row06][3], $valores[$row06][4], $valores[$row06][5], $valores[$row06][6], $valores[$row06][7], $valores[$row06][0], $valores[$row06][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e06)
     {
      echo "Ocurrió un error con la base de datos: " . $e06->getMessage();
     }


   }
  catch (Exception $e)
   {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
   }

?>