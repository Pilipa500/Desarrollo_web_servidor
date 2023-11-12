<!DOCTYPE html>
<html lang="en">
    <style>
        label{
            display: ;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/*Comparar el mayor número de 3 con Switch
*/
$num1 = 10;
$num2 = 20;
$num3 = 15;

switch (true) {
    case $num1 > $num2 && $num1 > $num3:
        echo "El número mayor es $num1";
        break;
    case $num2 > $num1 && $num2 > $num3:
        echo "El número mayor es $num2";
        break;
    default:
        echo "El número mayor es $num3";
}
?>
<form method="post" action="">
    <label for="num1">Primer número</label>
    <input type="number" id="num1" name="num1" required>
    <br>
    <label for="num2">Segundo número</label>
    <input type="number" id="num2" name="num2" required>
    <br>
    <label for="num3">Tercer número</label>
    <input type="number" id="num3" name="num3" required>
    <br><br>
    <input type="submit" id="if" name="if" value="Comparar if">
    <input type="submit" id="switch" name="switch" value="Comparar switch">
</form>
    
</body>
</html>