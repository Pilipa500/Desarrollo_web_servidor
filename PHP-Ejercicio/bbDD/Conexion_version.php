<?php

try{
    $mysqul= "mysql:host=localhost;dbname=bbdd_empresa;charset=UTF8";
    $usuario= "Pilar";
    $password= "MANAGER2024";

    $conexion = new PDO($mysqul, $usuario, $password);
    echo "Base de datos conectada.</p>";

    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Version: $version </p>";

}catch(PDOException $e)
{
    //muestra error
    echo"<p>" . $e->getMessage(). "<p>";
}
?>