<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros aleatorios</title>
</head>
<body>
<?php

// Generar array con 6 números aleatorios del 1 al 6
$randomArray = array();
for ($i = 0; $i < 6; $i++) {
    $randomArray[] = rand(1, 6);
}

// Mostrar cuántas veces aparece cada valor en el array
$valueCounts = array_count_values($randomArray);
echo "Frecuencia de cada valor:\n";
for ($i = 1; $i <= 6; $i++) {
    echo "Número $i: " . ($valueCounts[$i] ?? 0) . " veces\n";
}

// Obtener otro número aleatorio entre 1 y 6
$randomNumber = rand(1, 6);

// Comprobar si el número aleatorio está en el array y mostrar los índices
$indices = array_keys($randomArray, $randomNumber);
if (!empty($indices)) {
    echo "\nEl número $randomNumber está en los índices: " . implode(", ", $indices) . "\n";
} else {
    echo "\nEl número $randomNumber no está en el array\n";
}

// Mostrar el array original ordenado de mayor a menor
rsort($randomArray);
echo "\nArray original ordenada de mayor a menor:\n";
print_r($randomArray);

// Mostrar el array sin valores duplicados y sin huecos en los índices
$uniqueArray = array_values(array_unique($randomArray));
echo "\nArray sin duplicados y sin huecos en los índices:\n";
print_r($uniqueArray);

?>

    
</body>
</html>