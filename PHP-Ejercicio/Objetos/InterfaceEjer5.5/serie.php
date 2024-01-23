<?php

//imporatar ficheros
require_once ("entregable.php");

//Declaración de la clase

class serie implements iEntregable
{
    //declaracion de variables
    private $titulo;
    private $ntemp;
    private $entregado;
    private $genero;

    //constructor
    public function __construct($tit, $tem, $gen)
    {
        //inicializar
        $this->titulo = $tit;
        $this->ntemp = $tem;
        $this->genero = $gen;
        $this->entregado = "False";

    }
    //getters
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getNtemp()
    {
        return $this->ntemp;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    

    //setters
    public function setTitulo($tit)
    {
        $this->titulo = $tit;
    }
    public function setTemporadas($temp)
    {
        $this->ntemp = $temp;
    }
    public function setGenero($gen)
    {
        $this->genero = $gen;
    }

    //funcion toString
    public function toString()
    {
        return $texto1= "<p> Serie con titulo:". $this-> getTitulo().
            "<br>Genero: " . $this->getGenero().
            "<br>Temporadas: " . $this->getNtemp().
            "</p>";
            if($this->entregado)
            {
                $texto2="entregado. </p>";
            }
            else{
                $texto2="sin entregar. </p>";
            }
            return $texto1 . $texto2;
    }

     //función entregar
     public function entregar()
     {
        $this->entregado = true;
     }
     //función devolver
     public function devolver()
     {
        $this->entregado = false;
     }
 
     //funcion consulta
     public function isEntregado()
     {
        return $this->entregado;
     }
}
?>