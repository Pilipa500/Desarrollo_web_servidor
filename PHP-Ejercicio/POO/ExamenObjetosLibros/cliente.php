<?php
class Cliente {
    public static $clientela = 0;
    public $nombre;
    public $producto = "";
    public $apodo;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        self::$clientela++;
        echo "$nombre creado.\n";
    }

    public function __destruct() {
        self::$clientela--;
    }

    public function comprarProd($producto) {
        $this->producto = $producto;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function mostrar() {
        echo "$this->nombre es conocido por $this->apodo.\n";
    }
}
?>
