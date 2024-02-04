<?php
include 'cliente.php';
include 'fotocopia.php';
include 'libro.php';

// Crear cliente "pepe"
$pepe = new Cliente("pepe");

// Crear fotocopia a doble cara
$fotocopia = new Fotocopia(10, 20);

// Mostrar superficie
$fotocopia->calcularEspacio();

// Pepe compra la fotocopia
$pepe->comprarProd($fotocopia);

// Mostrar datos de la fotocopia
echo $pepe->getProducto();

// Mostrar páginas gastadas y recicladas
echo "Páginas gastadas: $fotocopia->paginasGastadas\n";
echo "Páginas recicladas: $fotocopia->paginasRecicladas\n";

// Mostrar clientela total
echo "Clientela total: " . Cliente::$clientela . "\n";

// Eliminar cliente y fotocopia
unset($pepe);
unset($fotocopia);

// Mostrar páginas gastadas y recicladas después de eliminar cliente y fotocopia
echo "Páginas gastadas: $fotocopia->paginasGastadas\n";
echo "Páginas recicladas: $fotocopia->paginasRecicladas\n";

// Mostrar clientela total después de eliminar cliente y fotocopia
echo "Clientela total: " . Cliente::$clientela . "\n";

// Crear libro
$libro = new Libro(12, 25, 200);
$libro->embalar(2);

// Mostrar volumenEnvoltorio del libro
echo "Volumen del envoltorio del libro: " . $libro->volumenEnvoltorio . "\n";

// Crear cliente "Juan" con el producto libro creado
$juan = new Cliente("Juan");
$juan->comprarProd($libro);

// Mostrar páginas gastadas y recicladas después de crear cliente Juan
echo "Páginas gastadas: $libro->paginasGastadas\n";
echo "Páginas recicladas: $libro->paginasRecicladas\n";

// Mostrar clientela total después de crear cliente Juan
echo "Clientela total: " . Cliente::$clientela . "\n";
?>
