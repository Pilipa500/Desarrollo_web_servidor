<?php
Class Cliente{

    //atributos
    private $nombre;
    private $producto;
    public  $apodo;

    public static $clientela="";

    //constructor
    public function __construct($nombre, $producto,$apodo)
    {
        $this->nombre= $nombre;
        $this->producto = $producto;
        $this->apodo =$apodo;
        self::$clientela++;

        echo "Nombre creado";
    }
    //destructor
    public function __destruct()
    {
        self::$clientela--;
    }

    //get y set
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getProducto(){
        return $this->producto;
    }
    public function setProducto($producto){
        $this->producto =$producto;
    }
    public function getApodo(){
        return $this->apodo;
    }
    public function setApodo($apodo){
        $this->apodo=$apodo;
    }

    public  function mostrar(){
        echo $this->nombre . "es conocido como" . $this->apodo;
    }
}
?>