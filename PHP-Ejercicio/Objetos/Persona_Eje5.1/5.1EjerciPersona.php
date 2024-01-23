<?php

class Persona{
    private $nombre;
    private $apellidos;
    private $edad;

//constructores con valores por defecto
public function __construct($nombre, $apellidos, $edad)
{
    $this->$nombre = $nombre;
    $this->$apellidos = $apellidos;
    $this->$edad = $edad;
}

//metodos get y set para nombre
public function getNombre()
{
    return $this->nombre;
}
public function setNombre($nombre){
    $this->nombre = $nombre;
}
 // Métodos get y set para apellidos
 public function getApellidos() {
    return $this->apellidos;
}

public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

// Métodos get y set para edad
public function getEdad() {
    return $this->edad;
}

public function setEdad($edad) {
    $this->edad = $edad;
}

// Método para determinar si es mayor de edad
public function mayorEdad() {
    return $this->edad >= 18;
}

// Método para obtener el nombre completo
public function nombreCompleto() {
    return $this->nombre . " " . $this->apellidos;
}
}
?>