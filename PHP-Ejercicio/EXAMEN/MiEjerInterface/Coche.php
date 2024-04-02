<?php

require_once("Vehiculo.php");
// Definición de una clase que hereda de Vehiculo
class Coche extends Vehiculo {
    private $combustible;

    public function __construct($marca, $modelo, $anio, $combustible) {
        parent::__construct($marca, $modelo, $anio);
        $this->combustible = $combustible;
    }

    public function getCombustible() {
        return $this->combustible;
    }

    public function setCombustible($combustible) {
        $this->combustible = $combustible;
    }

    public function toString() {
        return parent::toString() . ", Combustible: " . $this->combustible;
    }

    // Nueva función para verificar si el depósito de combustible está lleno
    public function depositoLleno() {
        return $this->combustible == "Lleno";
    }

    // Nueva función para verificar si el coche puede llegar a una distancia máxima de 200 km
    public function puedeLlegar200Km() {
        return $this->combustible == "Lleno";
    }

    // Implementación de la interfaz
    public function getNumeroRuedas() {
        return 4; // Un coche típicamente tiene 4 ruedas
    }

    public function enMarcha() {
        return true; // En este caso, asumimos que el coche siempre está en marcha
    }

    public function estadoGeneral() {
        return "Estado general del coche: Bueno"; // En este caso, proporcionamos una información general del estado
    }
}


?>