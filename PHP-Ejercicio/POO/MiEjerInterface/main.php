<?php
require_once("DameDatos.php");
require_once("Vehiculo.php");
require_once("Camion.php");
require_once("Coche.php");

// Programa principal
$vehiculo1 = new Vehiculo("Toyota", "Corolla", 2022);
$coche1 = new Coche("Ford", "Fiesta", 2020, "Lleno");
$camion1 = new Camion("Volvo", "FH16", 2019, 150);

echo "Contador de vehículos: " . Vehiculo::getContador() . "\n";

echo $vehiculo1->toString() . "\n";
echo $coche1->toString() . "\n";
echo $camion1->toString() . "\n";

// Comprobando si el depósito de combustible del coche está lleno
echo "Depósito de combustible del coche lleno: " . ($coche1->depositoLleno() ? "Sí" : "No") . "\n";

// Comprobando si el coche puede llegar a una distancia máxima de 200 km
echo "Coche puede llegar a 200 km: " . ($coche1->puedeLlegar200Km() ? "Sí" : "No") . "\n";

//

?>