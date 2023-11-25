<?php
function ecuacion2grado($coeficientes)
{
    // Obtener los coeficientes de la ecuación
    $a = $coeficientes[0];
    $b = $coeficientes[1];
    $c = $coeficientes[2];

    // Calcular el discriminante
    $discriminante = $b * $b - 4 * $a * $c;
    $resultado = "El resultado es..";
    // switch para determinar el tipo de raíces
    switch (true) {
        case $discriminante > 0:
            // Caso 1: Dos raíces reales distintas
            $raiz1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $raiz2 = (-$b - sqrt($discriminante)) / (2 * $a);
            $resultado = "La ecuación tiene dos raíces reales: x1 = $raiz1 y x2 = $raiz2";
            break;

        case $discriminante == 0:
            // Caso 2: Una raíz real única
            $raiz = -$b / (2 * $a);
            $resultado = "La ecuación tiene una raíz real única: x = $raiz";
            break;

        default:
            // Caso 3: Raíces complejas o imaginarias
            $parteReal = -$b / (2 * $a);
            $parteImaginaria = sqrt(abs($discriminante)) / (2 * $a);
            $resultado = "La ecuación tiene raíces complejas: x1 = $parteReal + $parteImaginaria i y x2 = $parteReal - $parteImaginaria i";
            break;
    }
    return $resultado;
}

$coeficientes = [1, -3, 2];
$resultado = ecuacion2grado($coeficientes);
echo $resultado;