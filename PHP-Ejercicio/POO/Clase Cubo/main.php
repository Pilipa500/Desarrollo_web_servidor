<?php

require_once('Cubo.php');

// Crear instancias de la clase Cubo
$cubo1 = new Cubo("Rojo", 50, true);
$cubo2 = new Cubo("Azul", 20, false);

// Mostrar información inicial
echo "Cubo 1:\n";
echo "Color: " . $cubo1->getColor() . "\n";
echo "Litros: " . $cubo1->getLitros() . "\n";
echo "Tiene Asa: " . ($cubo1->getTieneAsa() ? 'Sí' : 'No') . "\n\n";

echo "Cubo 2:\n";
echo "Color: " . $cubo2->getColor() . "\n";
echo "Litros: " . $cubo2->getLitros() . "\n";
echo "Tiene Asa: " . ($cubo2->getTieneAsa() ? 'Sí' : 'No') . "\n\n";

// Modificar atributos
$cubo1->setColor("Verde");
$cubo1->setLitros(80);
$cubo2->setTieneAsa(true);

// Mostrar información después de la modificación
echo "Cubo 1 después de la modificación:\n";
echo "Color: " . $cubo1->getColor() . "\n";
echo "Litros: " . $cubo1->getLitros() . "\n";
echo "Tiene Asa: " . ($cubo1->getTieneAsa() ? 'Sí' : 'No') . "\n\n";

echo "Cubo 2 después de la modificación:\n";
echo "Color: " . $cubo2->getColor() . "\n";
echo "Litros: " . $cubo2->getLitros() . "\n";
echo "Tiene Asa: " . ($cubo2->getTieneAsa() ? 'Sí' : 'No') . "\n\n";

// Realizar operaciones adicionales
echo "¿El Cubo 1 está lleno? " . ($cubo1->estaLleno() ? 'Sí' : 'No') . "\n";
echo "Agregando 30 litros al Cubo 1...\n";
if ($cubo1->agregarLitros(30)) {
    echo "Litros agregados con éxito. Nuevo volumen: " . $cubo1->getLitros() . " litros.\n";
} else {
    echo "No se pueden agregar 30 litros, el cubo se desbordaría.\n";
}

?>
