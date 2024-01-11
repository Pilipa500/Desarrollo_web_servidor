<?php

class Persona{
    private $nombre;
    private $apellidos;
    private $edad;
}
//constructores con valores por defecto
public function __construct($nombre = "", $apellidos ="", $edad=18)
{
    $this->$nombre = $nombre;
    $this->$apellidos = $apellidos,
    $this->$edad = $edad;
}

//metodos get y set para nombre
public function getNombre(){
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

// Prueba de la clase Persona
$persona1 = new Persona("Juan", "Pérez", 25);

// Obtener y mostrar información
echo "Nombre completo: " . $persona1->nombreCompleto() . "<br>";
echo "Edad: " . $persona1->getEdad() . " años<br>";
echo "¿Es mayor de edad? " . ($persona1->mayorEdad() ? "Sí" : "No") . "<br>";

// Modificar la edad y mostrar la información actualizada
$persona1->setEdad(17);
echo "Nueva edad: " . $persona1->getEdad() . " años<br>";
echo "¿Es mayor de edad? " . ($persona1->mayorEdad() ? "Sí" : "No") . "<br>";
?>