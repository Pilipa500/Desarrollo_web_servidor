<?php

function resolverEcuacionSegundoGrado($coeficientes) {
    // Descomponer el array
    list($a, $b, $c) = $coeficientes;

    // Calcular el discriminante
    $discriminante = $b**2 - 4*$a*$c;

    // Verificar si la ecuación tiene solución
    if ($discriminante >= 0) {
        // Calcular las soluciones
        $solucion1 = (-$b + sqrt($discriminante)) / (2*$a);
        $solucion2 = (-$b - sqrt($discriminante)) / (2*$a);

        // Devolver las soluciones como un array
        return array($solucion1, $solucion2);
    } else {
        // Si el discriminante es negativo, la ecuación no tiene solución real
        return "La ecuación no tiene solución real.";
    }
}

// Definir los coeficientes de la ecuación
$coeficientes = array(1, -3, 2);  // Ecuación: x^2 - 3x + 2 = 0

// Resolver la ecuación
$resultado = resolverEcuacionSegundoGrado($coeficientes);

// Mostrar el resultado
if (is_array($resultado)) {
    echo "Solución 1: " . $resultado[0] . "<br>";
    echo "Solución 2: " . $resultado[1];
} else {
    echo $resultado;
}

?>
