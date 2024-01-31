<?php

class Cliente
{
    public $nombre;
    private $id;
    private $apellido;
    private $edad;
    private $descuento = false;
    private static $numclientes = 0;
    private $productos=array();

    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        self::$numclientes++;
        $this->id = self::$numclientes;
        if(($this->id % 2) == 0){
            $this->porcentaje=50;
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function getEdad()
    {
        return $this->edad;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getId()
    {
        return $this->id;
    }
    
        public function getProductos(){
            return $this->productos;
        }

    public function __get($atrib)
    {
        if(property_exists($this,$atrib)){
            return $this->$atrib;
        }
    }

    public function __set($atrib,$valor){
        $this->$atrib=$valor;
    }

    public function setNombre($nombrenuevo)
    {
        return $this->nombre = $nombrenuevo;
    }

    public function setProductos($producto){
        return $this->productos[] = $producto;
    }

    public function setApellido($apellidonuevo)
    {
        return $this->apellido = $apellidonuevo;
    }
    public function setEdad($edadnueva)
    {
        if (is_numeric($edadnueva) && $edadnueva >= 0) {
            $this->edad = $edadnueva;
        } else {
            echo "La edad debe ser un número positivo";
        }
    }
    
    public function setDescuento($aplicardescuento)
    {
        return $this->descuento = $aplicardescuento;
    }

    public function calcularPrecio($precio)
    {
        if ($this->descuento) {
            $descuentopararestar = $precio /100*$this->porcentaje;
            $precioConDescuento = $precio - $descuentopararestar;
            echo "Precio con descuento: $" . $precioConDescuento."<br>";
            return $precioConDescuento;
        } else {
            echo "Precio sin descuento: $" . $precio."<br>"; 
            return $precio;
        }
    }
}
