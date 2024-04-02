<?php

class Cubo {
    // Atributos
    private $color;
    private $litros;
    private $tieneAsa;
  

    // Constructor
    public function __construct($color, $litros, $tieneAsa) {
        $this->color = $color;
        $this->litros = $litros;
        $this->tieneAsa = $tieneAsa;
    }

    // Métodos SET
    public function setColor($color) {
        $this->color = $color;
    }

    public function setLitros($litros) {
        $this->litros = $litros;
    }

    public function setTieneAsa($tieneAsa) {
        $this->tieneAsa = $tieneAsa;
    }

    // Métodos GET
    public function getColor() {
        return $this->color;
    }

    public function getLitros() {
        return $this->litros;
    }

    public function getTieneAsa() {
        return $this->tieneAsa;
    }

    // Método para ver si el cubo está lleno
    public function estaLleno() {
        return $this->litros === 100;
    }

    // Método para agregar litros al cubo
    public function agregarLitros($cantidad) {
        if ($this->litros + $cantidad <= 100) {
            $this->litros += $cantidad;
            return true;
        } else {
            return false; // El cubo se desbordaría, no se puede agregar la cantidad especificada
        }
    }
    //añadir una interface que sea volumen y con un metodo calcular volumen
    //añadir una subclase cubo grande y pequeño hijas de cubo y con variables staticas y 
    //contador en el constructor y destructor para contar los cubos
    //meterle un metodo abstracto al cubo  
}

?>
