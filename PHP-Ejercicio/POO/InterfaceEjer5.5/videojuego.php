<?php
//importar ficheros
require_once ("entregable.php");
//Declaración de la clase

class videojuego implements iEntregable
{
    //variable estatica
    public static $cantidad;

    //declaracion de variables
    private $titulo;
    private $numeroHoras;
    private $entregado;
    private $genero;

    //constructor
    public function __construct($tit, $nH, $gen)
    {
        //inicializar
        $this->titulo = $tit;
        // $this->numeroHoras = $nH;
        $this->genero = $gen;
        $this->entregado = false;
        if($nH>0)
        {
            $this->numeroHoras=$nH;
        }
        self::$cantidad=0;
    }
        //destructor
        public function __destruct()
        {
            
        }

    //getters
    public function contar() {
        
        //incrementar varible estatica
        return self::$cantidad++;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getNhora()
    {
        return $this->numeroHoras;
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
    public function setHoras($hor)
    {
        $this->numeroHoras = $hor;
    }
    public function setGenero($gen)
    {
        $this->genero = $gen;
    }

    //funcion toString
    public function toString()
    {
        return "<p>Videojuego con titulo :" . $this->getTitulo().
                "<br>Con numero de horas: " . $this->getNhora().
                "<br>Genero: " . $this->getGenero();
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