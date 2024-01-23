<?php
require_once("figura.php");
//clase
class cuadrado extends figura{

    //variable
    private $nombre3D;

    //variable estática
    public static $totalCuadrados = 0;

    //constructor
    public function __construct($lon, $col)
    {
        //llamada al constructor de superclase
        parent::__construct($lon, 4, $col);

        //inicialización de variable
        $this->nombre3D = "Cubo";
    }
    //setter y getter mágicos
    public function __set($newVariable, $valor)
    {
        //crear variable en tiempo de ejecución
        $this->$newVariable = $valor;
    }
    public function __get($var)
    {
        //si existe la variable dentro del objeto 
        if (property_exists ($this, $var))
         {
            //se retorna valor
            return $this->$var;
        } 
    }

    //funciones auxiliares

    //obtener area

    public function getArea()
    {
        //devolver area de un cuadrado
        return $this->longLado * $this->longLado;
    }
    //devolver información sobre el objeto
    public function toString()
    {
        return "Soy un cuadrado";
    }
}

?>