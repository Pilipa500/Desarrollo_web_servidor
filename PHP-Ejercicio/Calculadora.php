<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
<?php

function calculadora($operacion, $valor1, $valor2) {
    switch ($operacion) {
        case 'sumar':
            return $valor1 + $valor2;
        case 'restar':
            return $valor1 - $valor2;
        case 'multiplicar':
            return $valor1 * $valor2;
        case 'dividir':
            if ($valor2 != 0) {
                return $valor1 / $valor2;
            } else {
                return "No es posible dividir por cero.";
            }
        default:
            return "Operación no válida";
    }
}

$operacion = 'sumar'; // Cambia esto por la operación que desees realizar (sumar, restar, multiplicar, dividir)
$valor1 = 10;
$valor2 = 5;

$resultado = calculadora($operacion, $valor1, $valor2);

echo "El resultado de la operación $operacion entre $valor1 y $valor2 es: $resultado";

?>
</body>
</html>