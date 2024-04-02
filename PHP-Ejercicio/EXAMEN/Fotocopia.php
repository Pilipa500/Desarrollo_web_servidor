<?php
require_once("Papel.php");

class Fotocopia extends Papel{

    public function __construct($paginasGastadas,$paginasRecicladas,$dobleCara,$alto,$largo)
    {
        //Llamada al constructor padre
        parent:: __construct($paginasGastadas,$paginasRecicladas,$dobleCara,$alto,$largo); 
            $this->largo=$largo;
            $this->alto=$alto;
            // $this->dobleCara=false;
            $this->paginasGastadas++;

        
    }

    //destruir la fotocopia
    public function __destruct()
    {
        $this->paginasRecicladas++;
    }

    //funcion toString para mostrar la información
    public function toString(){
        parent::__toString(). "fotocopia doble cara" .$this->dobleCara. "si o no";
    }
}
?>