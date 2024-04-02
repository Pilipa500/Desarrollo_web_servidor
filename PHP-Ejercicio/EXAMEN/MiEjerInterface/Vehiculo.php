<?php
require_once("DameDatos.php");

//definición de la clase Vehículo

class Vehiculo implements DameDatos {
    public $marca;
    public $modelo;
    public $anio;
    protected static $contador=0;

    //constructor

    public function __construct($marca, $modelo, $anio){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        self::$contador++;

        
    }
    //metodo destructor para que se borren al final del programa los vehiculos
    public function __destruct(){
        echo "El vehiculo ya no existe. <br>";
    }

    
    //Getter y setter
    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo=$modelo;
    }
    public function getAnio(){
        return $this->anio;
    }
    public static function getContador(){
        return self::$contador;
    }

    //función para comprobar si el depósito de combustible está lleno
    public function depositoLleno(){
        return true;
    }

    //función para verificar si el vehículo puede llegar a una distancia máxima de 200 km
    public function puedeLLegar200km(){
        return true;
    }

    //implementacion de la interfaz
    //Saber el número de ruedas. Un coche tiene tipicamente 4 
    public function getNumeroRuedas(){
        return 4;
    }

    //asumo que el coche siempre está en marcha
    public function enMarcha(){
        return true;
    }
    //Damos una informacion general del estado del vehiculo
    public function estadoGeneral(){
        return "Estado general del coche: Bueno";
    }
    // Implementación del método toString() de la interfaz Imprimible
    public function toString() {
        return "Marca: " . $this->marca . ", Modelo: " . $this->modelo . ", Año: " . $this->anio;
    }
}
?>