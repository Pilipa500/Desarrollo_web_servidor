<?php
require_once ("Vehiculo.php");
require_once("DameDatos.php");
//definición de la clase que hereda de vehículo
class Camion extends Vehiculo{
    //atributos
    private $carga_maxima;

    //constructor
    public function __construct($marca, $modelo, $anio, $carga_maxima){
        parent::__construct($marca, $modelo, $anio);
        $this->carga_maxima= $carga_maxima;
    }

    //get y set
    public function getCargamaxima(){
        return $this->carga_maxima;
    }
    public function setCargamaxima($carga_maxima){
        $this->carga_maxima=$carga_maxima;
    }
    public function toString() {
        return parent::toString() . ", Carga Máxima: " . $this->carga_maxima . " kg";
    }

    // Nueva función para verificar si el camión puede circular con la carga máxima de 200 toneladas
    public function puedeCircular() {
        return $this->carga_maxima <= 200;
    }
    // Implementación de la interfaz
    public function getNumeroRuedas() {
        return 18; // Un camión típicamente tiene 18 ruedas
    }
    public function enMarcha() {
        return false; // En este caso, asumo que el camión no está en marcha
    }

    public function estadoGeneral() {
        return "Estado general del camión: Regular"; // En este caso, proporcionamos una información general del estado
    }
    }
   

?>