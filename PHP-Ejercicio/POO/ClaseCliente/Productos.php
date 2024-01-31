<?php

class Producto
{
    private $nombre_producto;
    private static $id_producto=0;
    private $cantidad;


public function __construct($nombre,$cantidad)
{
    $this->nombre_producto = $nombre;
    $this->cantidad = $cantidad;
    self::$id_producto++;
}

public function getNombre(){
    return $this->nombre_producto;
}

public function getCantidad(){
    return $this->cantidad;
}

}
?>