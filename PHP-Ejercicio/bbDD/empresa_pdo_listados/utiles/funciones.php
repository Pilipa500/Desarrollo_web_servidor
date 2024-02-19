<?php

/**
 * FUNCIONES DE VALIDACIÓN
 */

/*
    * Función que devuelve el valor del campo recibido como párametro
    * @param {string} $campo - Nombre del campo a comprobar en el REQUEST
    * @param {string} $valor - Valor del campo recibido como parámetro
    */
function obtenerValorCampo(string $campo): string
{
  // Comprobamos si nos llega el nombre del campo en el REQUEST
  if (!isset($_REQUEST[$campo])) {
    $valor = "";
  } else {
    // Limpiamos el campo de etiquetas y espacios
    $valor = trim(strip_tags($_REQUEST[$campo]));
  }
  return $valor;
}


/**
 * FIN FUNCIONES DE VALIDACIÓN
 */


/**
 * FUNCIONES TRABAJAR CON BBDD
 */
function conectarPDO(string $host, string $user, string $password, string $bbdd)
{

  try {
    //configuración cadena de conexión
    $mysqul = "mysql:host=$host;dbname=$bbdd;charset=UTF8";
    //creación de la conexión (instancia de PDO)
    $conexion = new PDO ($mysqul, $user, $password);
    //$usuario = "Pilar";CON LO ANTERIOR NO ES NECESARIO DETALLAR ESTO
    //$password = "MANAGER2024";
    //configuración del modo error
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    //$conexion = new PDO($mysqul, $usuario, $password, $opciones);
    echo "Base de datos conectada.</p>";

    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Version: $version </p>";
  } catch (PDOException $e) {
    //muestra error
    $e->getMessage();
  }
  return $conexion;
}

function resultadoConsulta(PDO $conex, String $consulta)
{
  try {
    $resultado = $conex->query($consulta);
    return $resultado;
  } 
  catch (PDOException $exception) 
  { //mensaje de erro de la excepción
    $exception->getMessage();
    //borrar bloque de datos
    $conex = null;
    //eliminar conexión a BBDD
    $resultado = null;
  }
}




/**
 * FIN FUNCIONES TRABAJAR CON BBDD
 */
