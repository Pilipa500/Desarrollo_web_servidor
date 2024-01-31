<?php
require_once "Cliente.php";
require_once "Productos.php";
$preciooriginal=100;
$cliente1=new Cliente("Manuel","Perez");
echo ("<b>".$cliente1->getNombre()."<br></b>");
$preciofinalCliente1 = $cliente1->calcularPrecio($preciooriginal);
$cliente2=new Cliente("Vanesa","Lopez");
echo ("<b>".$cliente2->getNombre()."<br></b>");
$cliente2->setDescuento(true);
$preciofinalCliente2 = $cliente2->calcularPrecio($preciooriginal);
$cliente2->getEdad();
$producto1=new Producto("patata",5);

$cliente1->setProductos($producto1);

$arrayproductos=$cliente1->getProductos();

foreach($arrayproductos as $productosuelto){
    echo($productosuelto->getNombre());
}

?>