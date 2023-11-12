<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda binaria</title>
</head>

<body>
    <h1>Búsqueda binaria</h1>
    <p>Implementa el método de búsqueda binaria para que busque un número en un array predefinido con los valores: 5, 10, 18, 23, 27, 43, 50.

        Declara el array e inicialízalo.
        Crea una entrada numérica para introducir el número a buscar.
        Crea un botón para ejecutar la búsqueda
        Muestra un mensaje indicando si se ha encontrado, su índice y su posición dentro del array.
        Comenta el código.</p>

    <form method="post">
        <label>Ingrese un número a buscar: </label>
        <input type="number" name="numero">
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <p><?php echo $resultado; ?></p>

    <?php

    $miArray = array(5, 10, 18, 23, 27, 43, 50); //definición del array
    // Función para realizar la búsqueda binaria
    function busquedaBinaria($array, $elemento)
    {
        $izquierda = 0;
        $derecha = count($array) - 1;

        while ($izquierda <= $derecha) {
            $medio = $izquierda + floor(($derecha - $izquierda) / 2);//floor() - Esta función
            // redondea los números de punto flotantes a la baja hasta el número entero anterior
            // Por ejemplo, 5.2 se convierte en 5 y 8.9 en 8. 

            if ($array[$medio] == $elemento) {
                echo"Elemento encontrado en posición $medio";
            }
            if ($array[$medio] < $elemento) {
                $izquierda = $medio + 1;
            } else {
                $derecha = $medio - 1;
            }
        }

        return -1; // Elemento no encontrado
    }

    // Inicializar variables
$resultado = '';
$numeroBuscado = isset($_POST['numero']) ? (int)$_POST['numero'] : null;

if (isset($_POST['buscar'])) {
    // Realizar la búsqueda si se hizo clic en el botón "Buscar"
    if (!is_null($numeroBuscado)) {
        $indice = busquedaBinaria($miArray, $numeroBuscado);
        if ($indice != -1) {
            $resultado = "El número $numeroBuscado se encontró en el índice $indice del array.";
        } else {
            $resultado = "El número $numeroBuscado no se encontró en el array.";
        }
    } else {
        $resultado = "Por favor, ingrese un número para buscar.";
    }
}

?>
   

</body>

</html>