<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta cartas</title>
</head>
<body>
    <h1>Cuenta cartas</h1>
    <p>En este ejercicio se tiene que crear un programa que muestre una partida de
solitario "Cuenta cartas". Las reglas del juego son las siguientes:</p>
 <ul>
    <li>Se muestran entre cinco y diez cartas de corazones no repetidas, con valores al
azar entre 1 y 10</li>
    <li>Encima de las cartas se muestran los valores desde 1 hasta el número de cartas
que haya, (entre 5 y 10).</li>
    <li>Si coincide algún número con el número de la carta correspondiente inferior, el
jugador pierde y se muestra el mensaje: "Lo siento has perdido".</li>
<li>Si todas las cartas tienen valores distintos del número correspondiente superior,
el jugador gana y se muestra:"¡Enhorabuena has ganado!"</li>
 </ul>
 <?php

 $randonCartas = array();//enuncio el array con el que vamos a generar la tirada al azar de 10 cartas
 $randonCartas []=rand (1,10);
 
 $jugadaCartas = array($randonCartas []=rand (1,10));//array de la jugada

 
 print_r($jugadaCartas);


 ?>

</body>
</html>