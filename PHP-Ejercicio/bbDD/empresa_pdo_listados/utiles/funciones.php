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

//Evaluar longitud cadena
function validarLongitudCadena(string $texto, int $minimo, int $maximo): bool
{
  $validacion =false;

  if(strlen($texto)   >=$minimo && strlen($texto) >=$maximo)
  {
    $validacion =true;
  }
  return $validacion;
}

/**
 * FIN FUNCIONES DE VALIDACIÓN
 */


/**
 * FUNCIONES TRABAJAR CON BBDD
 */
function conectarPDO(string $host, string $user, string $password, string $bbdd) : PDO
{

  try {
    //configuración cadena de conexión
    $mysqul = "mysql:host=$host;dbname=$bbdd;charset=UTF8";
    //creación de la conexión (instancia de PDO)
    $conexion = new PDO ($mysqul, $user, $password);
    
    //configuración del modo error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
  } catch (PDOException $e) {
    //mensaje de error de la excepción
    exit($e->getMessage());
    
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
?>
