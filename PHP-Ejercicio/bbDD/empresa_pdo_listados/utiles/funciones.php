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
function conectarPDO($host, $user, $password, $bbdd)
{

  try {
    $mysqul = "mysql:host=localhost;dbname=bbdd_tarde_empresa;charset=UTF8";
    $usuario = "Pilar";
    $password = "MANAGER2024";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    $conexion = new PDO($mysqul, $usuario, $password, $opciones);
    echo "Base de datos conectada.</p>";

    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Version: $version </p>";
  } catch (PDOException $e) {
    //muestra error
    echo "<p>" . $e->getMessage() . "<p>";
  }
  return $conexion;
}

function resultadoConsulta(PDO $conex, String $consulta)
{
  try {
    $resultado = $conex->query($consulta);
    return $resultado;
  } catch (PDOException $exception) {
    $exception->getMessage();

    $conex = null;
    $resultado = null;
  }
}




/**
 * FIN FUNCIONES TRABAJAR CON BBDD
 */
