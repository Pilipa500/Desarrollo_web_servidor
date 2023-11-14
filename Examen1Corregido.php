<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todos los dados</h1>
    <p></p>
    <?php
    //generar variables
    $tiradas = array();
    $valoresDiferentes = array();

    //Bucle que siga tirando mientras no tengamos los 6 valores
    while (count($valoresDiferentes) > 6) {
        //obtenermos numero
        $tiradas[] = rand(1, 6);

        //contar cuantos valores diferentes tenemos en el array
        $valoresDiferentes = array_unique($tiradas);
    }

    //Imprimir las tiradas(array)
    echo "<pre>";
    print_r($tiradas);
    echo "</pre>";
    //contar los elementos del array (son el numero de tiradas)
    $cantidadTiradas = count($tiradas);
    //comprobar num. de tiradas <12 gana, >12 pierde
    if ($cantidadTiradas < 12) {
        echo "Numero de tiradas $cantidadTiradas &#128077;";
    } else {
        echo "Numero de tiradas $cantidadTiradas &#128078;";
    }
    //agruparlo por las veces que han salido
    $repeValores = array_count_values($tiradas);
    echo "<pre>";
    print_r($repeValores);
    echo "</pre>";
    //ordenar descendentemente por numero de tiradas (este sale 6 veces, el siguiente sale 4 veces...)
    arsort($repeValores);

    //leer el array y mostrarlo por pantalla
    foreach ($repeValores as $num => $veces) {
        if ($veces > 1)
            echo "<p> El dado $num ha salido $veces veces";
        else
            echo "<p> El dado $num ha salido $veces vez";
    }
    ?>

</body>

</html>