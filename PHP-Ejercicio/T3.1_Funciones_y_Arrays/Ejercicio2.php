<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <!--Suma - multiplicación de números
Escriba un programa que cada vez que se ejecute muestre dos números entre 1 y 10 al azar, e indique:
● La suma de dichos números
● La multiplicación de dichos números. -->

<?php
// Genera dos números aleatorios entre 1 y 10
$num1 = rand(1, 10);
$num2 = rand(1, 10);

// Calcula la suma de los números
$suma = $num1 + $num2;

// Calcula la multiplicación de los números
$producto = $num1 * $num2;

// Muestra los números generados, la suma y la multiplicación
echo "Número 1: $num1<br>";
echo "Número 2: $num2<br>";
echo "Suma: $suma<br>";
echo "Multiplicación: $producto<br>";
?>

    
</body>
</html>