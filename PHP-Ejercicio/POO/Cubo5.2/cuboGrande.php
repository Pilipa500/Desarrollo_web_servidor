<?php
//importo la clase padre Cubo
 require_once("Cubo.php"); 
 
 //clase cuboGrande3
class cuboGrande extends Cubo{

    //atributo
    private $volumen;

    //variable estatica
    public static $numCubo=0;

    //constructor
    public function __construct ($volumen, $numCubo,$color, $litros, $tieneAsa){
       
        //llamada al constructor del padre
        parent::__construct($color, $litros, $tieneAsa);
        $this-> volumen=$volumen;
        $this-> numCubo=$numCubo;

        self::$numCubo++;
        
    }
    //get y set


    //aquí haré la funcion para calcular el volumen
    public function calcularVolumen(){
        
    }
}
?>