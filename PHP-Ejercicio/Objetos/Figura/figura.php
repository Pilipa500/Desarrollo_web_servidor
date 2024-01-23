<?php
abstract class figura
{
   //Variables
    private $id;
    protected $longLado;
    protected $numLados;
    private $color;

    //Variables estáticas
    public static $numFiguras=0;

    //constructor
    public function __construct($lon, $num, $color)
    {
       //actualización de variable estáticas
       self::$numFiguras++; 

       //inicialización de variables
       $this->id = self::$numFiguras;
       $this->longLado =$lon;
       $this->numLados = $num;
       $this->color = $color; 
    }

    //seter
    public function setColor ($newColor)
    {   //establecer color
        $this->color = $newColor;
    }
    //geter
    public function getColor()
    {
        return $this->color;
    }
    //setter y getter mágicos
    public function __set ($newVariable, $valor)
    {
        //crear variable en tiempo de ejecución
        $this->$newVariable = $valor;
    }
    public function __get($var)
    {
        //si existe la variable
        if (property_exists ($this, $var))
         {
            //se retorna valor
            return $this->$var;
        } 
   }
    //funciones auxiliares
    public function getPerimetro()
    {
        return $this->numLados * $this->longLado;
    } 

    //funciones auxiliares comunes a todas
    abstract public function getArea();

    public function toString()
    {
        return "Soy una figura";
    }

    //probar sobrecarga de métodos


}
?>