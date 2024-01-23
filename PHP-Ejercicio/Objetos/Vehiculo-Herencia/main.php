<?php
//importar ficheros
require_once ('Vehiculo.php');
require_once ('Coche.php');
// Prueba de las clases
$vehiculo1 = new vehiculo("Bicicleta", "Rojo", 1, true);
$vehiculo1->arrancar();
echo $vehiculo1->toString() . "\n";
echo "<br></br>";
$coche1 = new Coche("1234BBC", 100, "Toyota", "Azul", 5, true);
$coche1->arrancar();
$coche1->viajar(50);
echo $coche1->toString() . "\n";
?>
