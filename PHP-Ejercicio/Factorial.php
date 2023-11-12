<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calcular el factorial de un número</h1>
    <p>Implementar el factorial de un número con las estructuras for,
    While , Do while y por recursividad.  El resultado final tiene generar
    como salida el resultado y una explicación de cada una de las estructuras
    realizadas, destacando las diferencias de cada una de ellas (puede incluir código).</p>

    <h3>Solución:</h3>
    <form action="post" action="">
        <fieldset>
            <legend>En este espacion vamos a calcular el factorial de un número </legend>
            <label for="a">Factorial de:</label>
            <input type="number" id="a" name="a" required>
            <br>
            <input type="submit" id="for" name="for" value="Utilizar For">
            <input type="submit" id="whi" name="whi" value="Utilizar While">
            <input type="submit" id="dow" name="dow" value="Utilizar Do While">
            <input type="submit" id="rec" name="rec" value="Utilizar Do While">

        </fieldset>
    </form>
    <?php
        function factorialFor($n) {
            $resultado = 1;
            for ($i = 1; $i <= $n; $i++) {
                $resultado =  $resultado* $i;
            }
            return $resultado;
        }

        $num = 5; // Número para calcular el factorial
        $resultado = factorialFor($num);
        echo "Factorial de $num usando for: $resultado";
        ?>

</body>
</html>