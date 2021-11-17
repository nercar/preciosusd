<?php
  $contraseña = "";
  $usuario = "sa";
  $nombreBaseDeDatos = "BDES";
  $rutaServidor = "192.168.20.207";
  
  $ServidorBarinas = "192.168.3.1";
  $ServidorAcarigua = "192.168.4.1";
  $ServidorBarquisimeto = "192.168.5.1";
  $ServidorSantaBarbara = "192.168.10.1";
  $ServidorCabimas = "192.168.11.200";
  $localidadBarinas = 4;
  $localidadAcarigua = 5;
  $localidadBarquisimeto = 6;
  $localidadSantaBarbara = 11;
  $localidadCabimas = 12;
  

  try
   {
    $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "\nConexion realizada a la base de datos principal...\n";

    $sql = "SELECT * from BDES.dbo.ESARTICULOS_USD";
    $valores = array();
    $con1=0;
    $pdo_statement_object = $base_de_datos->prepare($sql);
    $pdo_statement_object->execute();
    $result = $pdo_statement_object->fetchAll();
    $cantidad00 = $pdo_statement_object->rowCount();
    echo "Cantidad de Registros: $cantidad00 <BR>";

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


    //Servidor Barinas 192.168.3.1
    try
     {
      $base_de_datos08 = new PDO("sqlsrv:server=$ServidorBarinas;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos08->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 08...\n";

      $sql08 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object08 = $base_de_datos08->prepare($sql08);
      $pdo_statement_object08->execute();
      $result08 = $pdo_statement_object08->fetchAll();
      $cantidad08 = $pdo_statement_object08->rowCount();
      //echo "Cantidad de Registros: $cantidad08 <BR>";
      $row08=0;

      for($row08=0;$row08<$cantidad00;$row08++)
       {
        if($valores[$row08][4] == $localidadBarinas)
         {
          //echo '<BR>'.$row08.' '.$valores[$row08][0];
          $sentencia08 = $base_de_datos08->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia08->execute([$valores[$row08][0],$valores[$row08][4]]);
          $validar08 = $sentencia08->fetchObject();
      
          if(!$validar08)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag08 = $base_de_datos08->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera08 = $flag08->execute([$valores[$row08][0], $valores[$row08][1], $valores[$row08][2], $valores[$row08][3],$valores[$row08][4], $valores[$row08][5], $valores[$row08][6], $valores[$row08][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag08 = $base_de_datos08->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera08 = $flag08->execute([$valores[$row08][0], $valores[$row08][1], $valores[$row08][2], $valores[$row08][3], $valores[$row08][4], $valores[$row08][5], $valores[$row08][6], $valores[$row08][7], $valores[$row08][0], $valores[$row08][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e08)
     {
      echo "Ocurrió un error con la base de datos: " . $e08->getMessage();
     }


    //Servidor Acarigua 192.168.4.1
    try
     {
      $base_de_datos09 = new PDO("sqlsrv:server=$ServidorAcarigua;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos09->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 09...\n";

      $sql09 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object09 = $base_de_datos09->prepare($sql09);
      $pdo_statement_object09->execute();
      $result09 = $pdo_statement_object09->fetchAll();
      $cantidad09 = $pdo_statement_object09->rowCount();
      //echo "Cantidad: $cantidad09 <BR>";
      $row09=0;

      for($row09=0;$row09<$cantidad00;$row09++)
       {
        if($valores[$row09][4] == $localidadAcarigua)
         {
          //echo '<BR>'.$row09.' '.$valores[$row09][0];
          $sentencia09 = $base_de_datos09->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia09->execute([$valores[$row09][0],$valores[$row09][4]]);
          $validar09 = $sentencia09->fetchObject();
      
          if(!$validar09)
           {
            //echo "<BR> No existe Articulo con este Codigo $valores[$row09][0] !!!";
            $flag09 = $base_de_datos09->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera09 = $flag09->execute([$valores[$row09][0], $valores[$row09][1], $valores[$row09][2], $valores[$row09][3], $valores[$row09][4], $valores[$row09][5], $valores[$row09][6], $valores[$row09][7]]);
           }
          else
           {
            $flag09 = $base_de_datos09->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera09 = $flag09->execute([$valores[$row09][0], $valores[$row09][1], $valores[$row09][2], $valores[$row09][3], $valores[$row09][4], $valores[$row09][5], $valores[$row09][6], $valores[$row09][7], $valores[$row09][0], $valores[$row09][4]]);
           }
         }  
       }//Fin del For
     }
    catch (Exception $e09)
     {
      echo "Ocurrió un error con la base de datos: " . $e09->getMessage();
     }


    //Servidor Barquisimeto 192.168.5.1
    try
     {
      $base_de_datos10 = new PDO("sqlsrv:server=$ServidorBarquisimeto;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos10->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 10...\n";

      $sql10 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object10 = $base_de_datos10->prepare($sql10);
      $pdo_statement_object10->execute();
      $result10 = $pdo_statement_object10->fetchAll();
      $cantidad10 = $pdo_statement_object10->rowCount();
      //echo "Cantidad de Registros: $cantidad10 <BR>";
      $row10=0;

      for($row10=0;$row10<$cantidad00;$row10++)
       {
        if($valores[$row10][4] == $localidadBarquisimeto)
         {
          //echo '<BR>'.$row10.' '.$valores[$row10][0];
          $sentencia10 = $base_de_datos10->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia10->execute([$valores[$row10][0],$valores[$row10][4]]);
          $validar10 = $sentencia10->fetchObject();
      
          if(!$validar10)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag10 = $base_de_datos10->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera10 = $flag10->execute([$valores[$row10][0], $valores[$row10][1], $valores[$row10][2], $valores[$row10][3],$valores[$row10][4], $valores[$row10][5], $valores[$row10][6], $valores[$row10][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag10 = $base_de_datos10->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera10 = $flag10->execute([$valores[$row10][0], $valores[$row10][1], $valores[$row10][2], $valores[$row10][3], $valores[$row10][4], $valores[$row10][5], $valores[$row10][6], $valores[$row10][7], $valores[$row10][0], $valores[$row10][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e10)
     {
      echo "Ocurrió un error con la base de datos: " . $e10->getMessage();
     }


    //Servidor Santa Barbara 192.168.10.1
    try
     {
      $base_de_datos11 = new PDO("sqlsrv:server=$ServidorSantaBarbara;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos11->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 11...\n";

      $sql11 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object11 = $base_de_datos11->prepare($sql11);
      $pdo_statement_object11->execute();
      $result11 = $pdo_statement_object11->fetchAll();
      $cantidad11 = $pdo_statement_object11->rowCount();
      //echo "Cantidad de Registros: $cantidad11 <BR>";
      $row11=0;

      for($row11=0;$row11<$cantidad00;$row11++)
       {
        if($valores[$row11][4] == $localidadSantaBarbara)
         {
          //echo '<BR>'.$row11.' '.$valores[$row11][0];
          $sentencia11 = $base_de_datos11->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia11->execute([$valores[$row11][0],$valores[$row11][4]]);
          $validar11 = $sentencia11->fetchObject();
      
          if(!$validar11)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag11 = $base_de_datos11->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera11 = $flag11->execute([$valores[$row11][0], $valores[$row11][1], $valores[$row11][2], $valores[$row11][3],$valores[$row11][4], $valores[$row11][5], $valores[$row11][6], $valores[$row11][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag11 = $base_de_datos11->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera11 = $flag11->execute([$valores[$row11][0], $valores[$row11][1], $valores[$row11][2], $valores[$row11][3], $valores[$row11][4], $valores[$row11][5], $valores[$row11][6], $valores[$row11][7], $valores[$row11][0], $valores[$row11][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e11)
     {
      echo "Ocurrió un error con la base de datos: " . $e11->getMessage();
     }


    //Servidor Cabimas 192.168.11.200
    try
     {
      $base_de_datos12 = new PDO("sqlsrv:server=$ServidorCabimas;database=$nombreBaseDeDatos", $usuario, $contraseña);
      $base_de_datos12->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "\nConexion realizada a la base de datos 12...\n";

      $sql12 = "SELECT * from BDES.dbo.ESARTICULOS_USD";
      $pdo_statement_object12 = $base_de_datos12->prepare($sql12);
      $pdo_statement_object12->execute();
      $result12 = $pdo_statement_object12->fetchAll();
      $cantidad12 = $pdo_statement_object12->rowCount();
      //echo "Cantidad de Registros: $cantidad12 <BR>";
      $row12=0;

      for($row12=0;$row12<$cantidad00;$row12++)
       {
        if($valores[$row12][4] == $localidadCabimas)
         {
          //echo '<BR>'.$row12.' '.$valores[$row12][0];
          $sentencia12 = $base_de_datos12->prepare("SELECT codigo,tipo,codigotasa,precio_usd,localidad,porcentaje_existencia,costo_usd,campo1 FROM BDES.dbo.ESARTICULOS_USD WHERE codigo = ? AND localidad = ?;");
          $sentencia12->execute([$valores[$row12][0],$valores[$row12][4]]);
          $validar12 = $sentencia12->fetchObject();
      
          if(!$validar12)
           {
            //echo "<BR> No existe Articulo con este Codigo y Localidad...!!!";
            $flag12 = $base_de_datos12->prepare("INSERT INTO BDES.dbo.ESARTICULOS_USD(codigo, tipo, codigotasa, precio_usd, localidad, porcentaje_existencia, costo_usd, campo1) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $bandera12 = $flag12->execute([$valores[$row12][0], $valores[$row12][1], $valores[$row12][2], $valores[$row12][3],$valores[$row12][4], $valores[$row12][5], $valores[$row12][6], $valores[$row12][7]]);
           }
          else
           {
            //echo "<BR> Ya existe un Articulo con ese Codigo y Localidad...!!!";
            $flag12 = $base_de_datos12->prepare("UPDATE BDES.dbo.ESARTICULOS_USD SET codigo=?, tipo=?, codigotasa=?, precio_usd=?, localidad=?, porcentaje_existencia=?, costo_usd=?, campo1=? WHERE codigo=? AND localidad=?;");
            $bandera12 = $flag12->execute([$valores[$row12][0], $valores[$row12][1], $valores[$row12][2], $valores[$row12][3], $valores[$row12][4], $valores[$row12][5], $valores[$row12][6], $valores[$row12][7], $valores[$row12][0], $valores[$row12][4]]);
           }
         }
       }//Fin del For
     }
    catch (Exception $e12)
     {
      echo "Ocurrió un error con la base de datos: " . $e12->getMessage();
     }


   }
  catch (Exception $e)
   {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
   }

?>