<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtener numeros impares</title>
</head>
<body>
    <!-- EJERCICIO 1 
    Realizar un programa que obtenga los números impares entre 1 y 50. 
    Una vez obtenido el resultado,  comprobar cuales son números primos.
    La evaluación de los números impares y primos se hará con funciones.-->
    <h1>Obtener numeros impares entre 1 y 50</h1>
    <?php
// Función para obtener números impares entre 1 y 50 y verificar si son primos
function numerosImparesPrimos() {
    for ($i = 1; $i <= 50; $i+=2) { // Solo números impares
        $esPrimo = true;
        for ($j = 2; $j * $j <= $i; $j++) {// Este bucle for se utiliza para iterar
             //a través de los valores de $j desde 2 hasta la raíz cuadrada de $i.
             // La condición $j * $j <= $i se utiliza porque si un número no es 
             //divisible por ningún número menor o igual a su raíz cuadrada, 
             //entonces no será divisible por ningún otro número mayor, por lo que no es primo
            if ($i % $j == 0) {
                $esPrimo = false;
                break;
            }
        }
        if ($esPrimo) {
            echo "Número impar y primo: $i\n";
        } else {
            echo "Número impar: $i\n";
        }
    }
}

// Llamar a la función para obtener los resultados
numerosImparesPrimos();
?>

    
</body>
</html>