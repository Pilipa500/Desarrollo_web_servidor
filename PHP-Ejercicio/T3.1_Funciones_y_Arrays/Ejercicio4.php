<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    /*Ciudades: Escriba un array de ocho ciudades de España. Elimina al 
    azar una de ellas y muestra el nuevo array de ciudades*/
</head>
<body>
<?php

// 1. Array original de ciudades
$ciudades = array("Madrid", "Barcelona", "Valencia", "Sevilla", "Zaragoza", "Málaga", "Murcia", "Palma de Mallorca");
echo "<br>";
// 2. Eliminar una ciudad al azar
$ciudadEliminada = array_rand($ciudades);// utiliza la función array_rand para obtener una clave aleatoria del array de ciudades
unset($ciudades[$ciudadEliminada]);//utiliza unset para eliminar la ciudad correspondiente.

// 3. Mostrar el nuevo array de ciudades
echo "Array de ciudades después de eliminar una ciudad al azar:\n";
print_r($ciudades);

?>

    
</body>
</html>