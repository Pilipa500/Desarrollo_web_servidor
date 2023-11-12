<!---Realiza otro ejercicio que para 2 variables, $base y $altura, asigne a otra variable, $area, el área del triángulo. A continuación te deberá mostrar el siguiente mensaje:

El área del triángulo cuya base es $base y altura $altura es: $area.

Los datos de entrada se introducirán a mediante un formulario. Habrá que cambiar el color del texto, del fondo de la página y deberá tener el siguiente texto:

CALCULAR ÁREA TRIÁNGULO

Escribe la base:      

Escribe la altura:      

El título de la página será: Área de un triángulo.-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de un Triangulo</title>
</head>

<body>

    <h2>CALCULAR AREA TRIANGULO</h2>
    <form method="post">
        <label for="base">Escribe la base:</label>
        <input type="number" name="base">
        <label for="altura" >Escribe la altura:</label>
        <input type="number" name="altura">
        <input type="submit" name="resultado">
    </form>

    <?php

    //comprobar si se envia el formulario y se recogen los datos
    if (isset($_POST['resultado'])) {
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        $area;
        // Verificamos si los campos no están vacíos
        if (!empty($base)  && !empty($altura)) {
            // Mostramos el resultado en la página
            $area = 1 / 2 * $base * $altura;
        }
        echo "El resultado del area de tu triangulo es: $area";
    }
    ?>

</body>

</html>