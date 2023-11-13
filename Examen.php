<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los dados</title>
</head>
<body>
    <h1>Todos los dados</h1>
    <p>Si sacas todos los dados en menos de doce tiradas, habrás ganado, en caso contrario
        habrás perdido.</p>
    <?php
    //1. Generar array con 6 números aleatorios del 1 al 6
    $randomArray = array();
    while ($randomArray[] =rand(1,6)){
        $randomArray = array();

    }
   /* for ($i = 0; $i < 6; $i++) {
        $randomArray[] = rand(1, 6);
        
    }*/
    //2. Cuentos los valores que hay en el array
    $valueCounts = array_count_values($randomArray);//muestro el resultado de cada una de las tiradas
    echo "Frecuencia de cada valor:\n";//
    
    for ($i = 1; $i <= 6; $i++) {
    echo "Número $i: " . ($valueCounts[$i] ?? 0) . " veces\n";
    
    }
    if (($valueCounts[$i] ?? 0) <12 && ($valueCounts[$i] ?? 0)>=12){
        echo "Has ganado. Has sacado $valueCounts de tiradas (&#128077;)";
    }
    else{
        echo "Has perdido: (&#128078;)";
    }

    ?>

    
</body>
</html>