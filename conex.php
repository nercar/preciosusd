<?php
class AdminBD
{
 var $BaseDatos;   // Nombre de la Base de Datos
 var $Servidor;    // IP del servidor donde se encuentra la base de datos
 var $Usuario;     // Login del usuario de la conexion con MySQL
 var $Clave;       // Contraseña o Password del Usuario
 var $Puerto;      // Puerto de Conexion
 var $Conexion;    // Identificador de la conexión
 var $Consulta;
 var $Error;
 var $conex;
 var $data;
 var $data2;
 var $Cant_Filas;

//-------------------------------------------------------------------------------------------------------------------------------
function AdminBD()// constructor de la clase
{
  $this->Servidor = "localhost";
  $this->Puerto = "3306";
  $this->BaseDatos = "c_servicio";
  $this->Usuario = "root";
  $this->Clave = "G4rz0n2019";
}

//-------------------------------------------------------------------------------------------------------------------------------
function Conectar() //método de que permite la conexión con la base de datos
 {
  $cadena_conexion = "host=".$this->Servidor." user=".$this->Usuario." password=".$this->Clave;
  //echo '<br>'.$cadena_conexion;
  //$this->Conexion = mysqli_connect("localhost", "root", "G4rz0n2019", "c_servicio");
  $this->Conexion = mysqli_connect($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);

  if(!$this->Conexion)
   {
    $this->Error = "<br>No se ha podido establecer la conexión con el Servidor MySQL...";
    echo $this->Error;
    return 0;
   }
  else
   {
    //$this->Error = "<br>Conexion Establecida...";
    //echo $this->Error;
   }
 } //Fin del método de Conexión

//-------------------------------------------------------------------------------------------------------------------------------
function Desconectar()//método para desconectar
 {
  mysqli_close($this->Conexion) or die("Error: Durante la desconexión");
 }//fin del método

//-------------------------------------------------------------------------------------------------------------------------------
function Ejecutar($SQL) //método para ejecutar una consulta sql 
 {
  //echo $SQL;
  if($SQL == "") 
   {
    $this->Error = "No ha especificado una consulta SQL";
    return 0;//Retorna 0 si no se ha especificado una sentencia
   }    
   //$this->Consulta = mysql_query($this->Conexion,$SQL);//se Ejecuta la sentecia
   $this->Consulta = mysqli_query($this->Conexion,$SQL);//se Ejecuta la sentecia

   if(!$this->Consulta)
    {
     $this->Error = mysqli_error();
     echo '<br>'.$this->Error;
     return 0;
    }
   else 
    {
     //echo "bien...";
    }
   return $this->Consulta;//si la consulta se realizó con éxito se retorna el identificador de la misma
 }
 // Fin del método Ejecutar

//-------------------------------------------------------------------------------------------------------------------------------
function LeerRegistro()
 {
  if(isset($this->Consulta))
  {
   $this->data = @mysqli_fetch_object($this->Consulta); 
   //echo $this->data;
  }
  else{
   $this->Error = mysqli_error();
    return -1;
  } 
  return $this->data;
 
 }

//-------------------------------------------------------------------------------------------------------------------------------
function LeerRegistro2($posicion)
 {
  if(isset($this->Consulta))
   {
    $result_type = PGSQL_ASSOC;
    $this->data2 = @pg_fetch_array($this->Consulta,$posicion,$result_type);
    //echo $this->data2;
   }
  else
   {
    $this->Error = pg_last_error();
    //echo "Error...";
    return -1;
   } 
  return $this->data2;
 }

//-------------------------------------------------------------------------------------------------------------------------------
function numFilas()//Retorna la cantidad de filas de una consulta
 {
  if(isset($this->Consulta))
   {
  $this->Cant_Filas = @mysqli_num_rows($this->Consulta);
  //echo $this->Cant_Filas;
  return $this->Cant_Filas;
   }
  else
   {
  $this->Error = "No se ha ejecutado la sentencia o ha ocurrido un error durante la misma";
    return 0;
   }
 }//fin del método

//-------------------------------------------------------------------------------------------------------------------------------
 function numCampos()
 {
  return pg_num_fields($this->Consulta);
 }//fin del método

//-------------------------------------------------------------------------------------------------------------------------------
 function nombreCampo($numcampo) 
  {
   return pg_field_name($this->Consulta, $numcampo);
  }//fin del método

//-------------------------------------------------------------------------------------------------------------------------------
 function get_consulta()
  {
   return $this->Consulta;
  } 

}//fin de la clase manejadora de la base de datos
 

//-------------------------------------------------------------------------------------------------------------------------------
class SUsuario
{
var $login;
var $password;
var $trabajador;
var $privilegio;
var $status;
var $MDB;

//-------------------------------------------------------------------------------------------------------------------------------
function SUsuario($login,$password,$trabajador,$privilegio,$status)
 {
  $this->login=$login;
  $this->password=$password;
  $this->trabajador=$trabajador;
  $this->privilegio=$privilegio;
  $this->status=$status;
  $this->MDB = new AdminBD;
  $this->MDB->Conectar();
 }
 
//-------------------------------------------------------------------------------------------------------------------------------
function AsignarDatos2($data)
 {
  $this->login=$data->login;
  $this->password=$data->password;
  $this->trabajador=$data->trabajador;
  $this->privilegio=$data->privilegio;
  $this->status=$data->status;
 } //Fin del método Asignar Datos


//-------------------------------------------------------------------------------------------------------------------------------
function Validar()
 {
  $this->login;
  $usu=$this->BuscarUsuario();
  if($usu)
   {
    //echo '<BR>'.$usu->password;
    //echo '<BR>'.$this->password;
    if($usu->password==$this->password)
     return 2;
    else
     return 1;
   }
  else
   {
    //echo "No ingreso...";
    return -5;  
   }
 }

//-------------------------------------------------------------------------------------------------------------------------------
function insertar()
 {
  $SQL="INSERT INTO usuarios_intranet(login,password,trabajador,privilegio,status)";
  $SQL.=" VALUES('" .$this->login. "','" .$this->password. "','" .$this->trabajador. "','" .$this->privilegio. "','" .$this->status. "')";
  //echo $SQL;
  if($this->MDB->Ejecutar($SQL))
   {
    return 1;
   }
  else
   {
    echo "<BR>".$this->MDB->Error."<BR>";
    return -1;
   }
 }


//-------------------------------------------------------------------------------------------------------------------------------
function modificar($clave,$log)
 {
  $sql = "UPDATE usuarios_intranet set password ='".$clave."'  where login='".$log."'";
  if($this->MDB->Ejecutar($sql))
   {
    return 1;
   }
  else
   {
    //echo "<BR>".$this->MDB->Error."<BR>";
    return -1;
   }
 }


//-------------------------------------------------------------------------------------------------------------------------------
function BuscarUsuario()
 {
  $SQL=" SELECT * FROM usuarios_intranet WHERE login='". $this->login ."' AND status='Activo' ";
  //echo '<br>'.$SQL;
  $this->MDB->Ejecutar($SQL);
  return $this->MDB->LeerRegistro();
 }

//-------------------------------------------------------------------------------------------------------------------------
function BuscarUsuarioModificar($login)
 {
  $sql = "UPDATE usuarios_intranet set status = 'Suspendido' where login='".$login."'";
  //echo "<br><br>".$sql;
  if($this->MDB->Ejecutar($sql))
   {
    return 1;
   }
  else
   {
    //echo "log...".$login;
    echo "<BR>".$this->MDB->Error."<BR>";
    return 0;
   }
 }


//-------------------------------------------------------------------------------------------------------------------------------
function BuscarUsuario2($tipo)
 {
  $BY="";
  if($tipo=="login")
   {
    $BY="login='".$this->login."'";
   }
   $SQL="SELECT login,password,trabajador,privilegio,status";
   $SQL.=" FROM usuarios_intranet WHERE ".$BY;
   if($this->MDB->Ejecutar($SQL))
    {
     $filas=$this->MDB->numFilas();
     if($filas>0)
      {   
       $usuar = $this->MDB->LeerRegistro();
       $this->asignarDatos2($usuar);
       return 1;
      }
     else
      {
       return 0;
      }
    }
   else
    {
     return 0;
    }
 }// Fin del método BuscarUsuarios


//------------------------------------------------------------------------------------------------------------------------------- 
function eliminar_usuario()
 {
  $sql = "UPDATE usuarios_intranet set status = 'Suspendido' where login='".$this->login."'";
  $this->MDB->Ejecutar($sql); 
 }

//-------------------------------------------------------------------------------------------------------------------------------
function Destruir()
 {
  $this->MDB->Desconectar(); 
 }

//-------------------------------------------------------------------------------------------------------------------------------
function get_login()
  {
   return $this->login;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function set_login($login)
  {
   $this->login = $login;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function get_password()
  {
   return $this->password;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function set_password($password)
  {
   $this->password = $password;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function get_trabajador()
  {
   return $this->trabajador;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function set_trabajador($trabajador)
  {
   $this->trabajador = $trabajador;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function get_privilegio()
  {
   return $this->privilegio;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function set_privilegio($privilegio)
  {
   $this->privilegio = $privilegio;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function get_status()
  {
   return $this->status;
  }

//-------------------------------------------------------------------------------------------------------------------------------
function set_status($status)
  {
   $this->status = $status;
  }

}//Fin de la clase SUsuario


//------------------------------------------------------------------------------------------------------------
class DatosBI
   {
    //-----------Inicio de sesion------------------------------------
    var $servidor="192.168.20.207";
    var $usuario="sa";
    var $password="";
    var $BD="BDES";


  //------------------------SUCURSALES-----------------------------
  var $servidorROT="192.168.0.200";   //ROTARIA
  var $servidorMER="192.168.2.99";  //MERIDA
  var $servidorBAR="192.168.3.1";     //BARINAS
  var $servidorACA="192.168.4.1";     //ACARIGUA
  var $servidorBARQ="192.168.5.1";  //BARQUISIMETO
  var $servidorSANJ="192.168.6.1\productivo"; //SAN JOSECITO
  var $servidorCAS="192.168.7.1";   //CASTELLANA
  var $servidorMAD="192.168.8.200"; //MADRE JUANA
  var $servidorEJI="192.168.9.1";     //EJIDO
  var $servidorSANT="192.168.10.1"; //SANTA BARBARA
  var $servidorCAB="192.168.11.200";  //CABIMAS
  var $servidorPUE="192.168.12.1";  //PUEBLO NUEVO
  var $servidorALT="192.168.13.1";  //ALTO CHAMA
  var $servidorLAG="192.168.18.200";  //LAGUNILLAS
  var $servidorPAR="192.168.21.200";  //PARAMILLO

  var $BDESCAJA = "BDES_POSCAJA";


 //------------------------------------------------------------------------------------------------
 function ConectarServidor($servidor,$usuario,$password,$BD)
  {
    $cnx=mssql_connect($servidor,$usuario,$password);
    //echo '<BR>'.$cnx;
    if($cnx)
     {
      $conex=mssql_select_db($BD,$cnx) or die("Error al Selecionar La Base de Datos");
     }
    return $cnx;
  }


//-------------------------------------------------------------------------------------
   function numfilas($resultado)
  {
      $n=mssql_num_rows($resultado);
      return $n;
  }

//--------------------------------------------------------------------------------------------- 
   function filas($resultado)
  {
     $campo=mssql_fetch_array($resultado);
     return $campo;
  }
  
//--------------------------------------------------------------------------------------------- 
   function cerrar()
  {
      mssql_close();
  }

//--------------------------------------------------------------------------------------------- 
   function Desconectar()//método para desconectar
  {
    mssql_close($this->Conexion) or die("Error: Durante la desconexión");
  }

//--------------------------------------------------------------------------------------------- 
   function sentencia($query)
  {
    $resultado=mssql_query($query);
    //echo $resultado;
    return $resultado;
  }

//--------------------------------------------------------------------------------------------- 
   function xfilas($resultado)
  {
     $campo=mssql_fetch_row($resultado);
     return $campo;
  } 

//---------------------------------------------------------------------------------------------  
 function conectar()
  {
    $cnx=mssql_connect($this->servidor,$this->usuario,$this->password) or die("Error de Conexion");
    $conex=mssql_select_db($this->BD,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }


//--------------------------------------------ROTARIA-------------------------------------------------------  
  function conectarRotaria()
  {
    $cnx=mssql_connect($this->servidorROT,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }

//--------------------------------------------MERIDA-------------------------------------------------------
  function conectarMerida()
  {
    $cnx=mssql_connect($this->servidorMER,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;

  }

//--------------------------------------------BARINAS-------------------------------------------------------
  function conectarBarinas()
   {
    $cnx=mssql_connect($this->servidorBAR,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
   }

//--------------------------------------------ACARIGUA-------------------------------------------------------

  function conectarAcarigua()
  {

    $cnx=mssql_connect($this->servidorACA,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

//--------------------------------------------BARQUISIMETO-------------------------------------------------------
  function conectarBarquisimeto()
  {
    $cnx=mssql_connect($this->servidorBARQ,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 


//--------------------------------------------SAN JOSECITO---------------------------------------------------
 function conectarSanJosecito()
  {
    $cnx=mssql_connect($this->servidorSANJ,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

//--------------------------------------------CASTELLANA-------------------------------------------------------
  function conectarCastellana()
  {
    $cnx=mssql_connect($this->servidorCAS,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

//---------------------------------------------MADRE JUANA----------------------------------------------------
  function conectarMadreJuana()
  {
    $cnx=mssql_connect($this->servidorMAD,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

//--------------------------------------------EJIDO-------------------------------------------------------
  function conectarEjido()
  {
    $cnx=mssql_connect($this->servidorEJI,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

//--------------------------------------------SANTA BARBARA---------------------------------------------------
  function conectarSantaBarbara()
  {
    $cnx=mssql_connect($this->servidorSANT,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }

  //--------------------------------------------CABIMAS-------------------------------------------------------  
  function conectarCabimas()
  {
    $cnx=mssql_connect($this->servidorCAB,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 

  //--------------------------PUEBLO NUEVO ---------------------------------------------------------------  
  function conectarPuebloNuevo()
  {
    $cnx=mssql_connect($this->servidorPUE,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  } 


  function conectarAltoChama()
  {
    $cnx=mssql_connect($this->servidorALT,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }

  function conectarLagunillas()
  {
    $cnx=mssql_connect($this->servidorLAG,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }

  function conectarParamillo()
  {
    $cnx=mssql_connect($this->servidorPAR,$this->usuario,$this->password) or die("Error de Conexion!!!!");
    $conex=mssql_select_db($this->BDES,$cnx) or die("Error al Selecionar La Base de Datos");
    return $conex;
  }



}//Fin de la Clase Base Datos BI+