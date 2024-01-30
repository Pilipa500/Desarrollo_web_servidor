<!-- Ejercicio: Interfaces
Crea una clase Serie con las siguientes características:
● Sus atributos privados son:
○ título
○ número de temporadas
○ entregado
○ género
Crear el constructor de la clase, sabiendo que al principio el atributo entregado siempre vale
False.
Los métodos que se tienen que implementar son:
● Métodos get de todos los atributos, excepto de entregado.
● Métodos set de todos los atributos, excepto de entregado.
● Método toString para devolver la información de la serie.
Crea una clase Videojuego con las siguientes características:
● Sus atributos privados son:
○ título
○ horas estimadas
○ entregado
○ género
Crear el constructor de la clase, sabiendo que al principio entregado siempre vale false.
Los métodos que se implementara serán:
● Métodos get de todos los atributos, excepto de entregado.
● Métodos set de todos los atributos, excepto de entregado.
● Método toString para devolver la información del juego.
Como vemos, en principio, las clases anteriores no son padre-hija, pero si tienen cosas en
común, por eso vamos a hacer una interfaz llamada Entregable con los siguientes
métodos:
● entregar(): cambia el atributo prestado a true.
● devolver(): cambia el atributo prestado a false.
● isEntregado(): devuelve el estado del atributo prestado.
Implementa los anteriores métodos en las clases Videojuego y Serie.
Crea un nuevo fichero que importe las clases anteriores y realiza lo siguiente:
● Crea dos arrays, uno de Series y otro de Videojuegos, de 5 posiciones cada uno.
Crea un objeto en cada posición del array, con los valores que desees
● Entrega algunos Videojuegos y Series con el método entregar().
Desarrollo Web Entorno Servidor
—-------------------------------------------------------------------------------------------------------------------------------
● Cuenta cuantos Series y Videojuegos hay entregados. Al contarlos, devuélvelos
(utiliza el método devolver).
● indica el videojuego tiene más horas estimadas y la serie con más temporadas.
Muestra los datos en pantalla con toda su información (usa el método toString()). -->
<?php

//importar ficheros
require_once ("entregable.php");

//Declaración de la clase

class serie implements iEntregable
{
    //variables estaticas
    public static $cantidad;
    public static $max;
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
        $this->entregado = "False";//lo pongo aqui xq te dice que de inicio
        //siempre es falso, si lo pongo en el constructor me lo pueden machacar
        //y poner true de inicio
        if($tem>0){
            $this->ntemp=$tem;
        }
        self::$cantidad=0;

        //calcular serie con más temporadas
        if(isset(self::$max))
        {
        if($tem >= self::$max->getNtemp())
        {
            self::$max=$this; 
        }
        else
        {
            self::$max = $this;
        }
        //incrementar estatica
        self::$cantidad++;
    }}
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