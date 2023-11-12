<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenación de Intercambio</title>
</head>

<body>
    <h1>Intercambio</h1>
    <p>Implementa el método de ordenación de "intercambio"
        para un array con los valores: 50, 23, 18, 10, 27, 43, 5.</p>
    <ul>
        <li>Declara el array e inicialízalo.</li>
        <li>Crea un botón para ejecutar la ordenación "Intercambio" de esos valores.</li>
        <li>Muestra el array antes y después, comprobando que ahora está ordenado</li>
    </ul>
    <?php
    //definición del array
    $miArray = array(
        0 => 50,
        1 => 23,
        2 => 18,
        3 => 10,
        4 => 27,
        5 => 43,
        6 => 5,
    );

    function intercambio($miArray)
    {
        $n = count($miArray);
        $inicio=0;
        $menor = $inicio;
        for ($i = $inicio; $i < $n; $i++) //bucle de interaciones
        {
            for ($j = $i; $j < $n; $j++) { //bucle de las posiciones
                if ($miArray[$i] > $miArray[$j]) { //cambio las posiciones
                    $temp = $miArray[$i];
                    $miArray[$i] = $miArray[$j];
                    $miArray[$j] = $temp;
                }
            }
        }
    }
    echo "<p>Array ordenado</p>";
    echo "<pres>";
    print_r($miArray);
    echo "</pre>";
    ?>

</body>

</html>