<?php
require_once("Vehiculo.php");

//clase coche
class coche extends vehiculo{
    //variables
    private $matricula;
    private $kilometros;

    //constructor
    public function __construct($matricula="", $kilometros=0, $marca, $color, $plazas,$aparcado)
    {
        //llamada al constructor de la superclase
        parent::__construct ($marca,$color,$plazas,$aparcado);

        $this->matricula =$matricula;
        $this->kilometros;

        $this->comprobarMatri($matricula);
    }

    public function comprobarMatri(){
        if (preg_match"\d ",$matricula) 
    } 
}

    
?>