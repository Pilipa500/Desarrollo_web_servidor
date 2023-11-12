<!-- Escribe un ejercicio de nombre en el que se definan 2 variables, $a y $b.
A esas variables habrá que darle valores numéricos.
A continuación, para cada operador +,-,*,/ deberá mostrarte unos mensajes del siguiente tipo:
Realizarlo con echo, print y printf

El resultado se sumar $a y $b es: xxx

El resultado se restar $a y $b es: xxx

El resultado se multiplicar $a y $b es: xxx

El resultado se dividir $a y $b es: xxx


El título de la página deberá ser Operadores-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores</title>
</head>
<body>

<?php
$a = 3;
$b = 9;
$resultado = $a+$b;
echo "<p>El resultado de sumar  $a  y  $b es:  $resultado.</p>";
$resultadoRestar =$a-$b;
echo "<p>El resultado de restar $a menos $b es: $resultadoRestar.</p>";
$resultadoMultiplicar = $a * $b;
echo "<p>El resultado de multiplicar $a por $b es: $resultadoMultiplicar.</p>";
$resultadoDividir= $a / $b;
echo "<p>El resultado de dividir $a entre $b es: $resultadoDividir.</p>";

?>
</body>
</html>