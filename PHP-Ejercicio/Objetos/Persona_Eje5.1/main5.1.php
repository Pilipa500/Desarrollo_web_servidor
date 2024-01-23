<?php
// Prueba de la clase Persona
require_once ('5.1EjerciPersona.php');
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