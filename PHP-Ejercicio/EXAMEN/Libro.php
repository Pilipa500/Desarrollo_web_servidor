<?php
require_once("Papel");
require_once("iEmbalaje");

class  Libro extends Papel implements iEmbalaje{

//atributo
     public $titulo;

     private $numeroPaginas;
     private $ancho;

    //constructor
    public function __construct($paginasGastadas,$paginasRecicladas,$dobleCara,$alto,$largo, $titulo,$numeroPaginas,$ancho)
    {
        //llamada al constructor padre
        parent::__construct($paginasGastadas,$paginasRecicladas,$dobleCara,$alto,$largo);
            
            $this->numeroPaginas=$numeroPaginas;
            $this->ancho=$numeroPaginas/100;

            // $this->dobleCara=true;creo que deberia ser una constante de Papel public constant DOBLECARA;

            $this->largo=$largo;
            $this->alto=$alto;
            
        
    }


    public function embalar(){

    }
    public function calcularVolumen($unidades){

    }
    public function __destruct(){
        $this->paginasRecicladas--;

    }
}
?>
