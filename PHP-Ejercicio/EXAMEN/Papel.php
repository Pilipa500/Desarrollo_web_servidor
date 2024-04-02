<?php

class Papel{
    //Atributos
    public $paginasGastadas=0;
    public $paginasRecicladas=0;

    private $dobleCara;

    protected $alto; 
    protected $largo;

    //constructor
    public function __construct($paginasGastadas,$paginasRecicladas,$dobleCara,$alto,$largo){
        $this->paginasGastadas=0;
        $this->paginasRecicladas=0;
        $this->dobleCara=$dobleCara;
        $this->alto=$alto;
        $this->largo=$largo;
    }
    //metodo  CalcularESpacio que se escribirá en la subclase

    public function calcularEspacio(){

    }

    //metodo getDoblecara
    public function getDobleCara(){
        return $this->dobleCara;
    }

    //metodo toString 
    public function __toString()
    {
        echo "Se usa un papel de tamaño". $this->alto . " X " . $this->largo;
    }
}
?>