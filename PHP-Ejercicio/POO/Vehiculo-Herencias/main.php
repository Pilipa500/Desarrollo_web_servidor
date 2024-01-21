<?php
//importar ficheros
require_once (Vehiculo.php);
require_once (Coche.php);
// Prueba de las clases
$vehiculo1 = new Vehiculo("Bicicleta", "Rojo", 1);
$vehiculo1->arrancar();
echo $vehiculo1->toString() . "\n";

$coche1 = new Coche("1234 ABC", 100, "Toyota", "Azul", 5);
$coche1->viajar(50);
echo $coche1->toString() . "\n";
?>
