<!DOCTYPE html>
<html lang="es">

<style>
    label {
        display: inline-block;
        width: 100px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>Ecuación segundo grado</title>
</head>

<body>

    <!-- EJERCICIO 6 -->
    <h1>Tema 3: Ejercicio 6</h1>
    <p> Define un array con tres posiciones que representa una ecuación de segundo grado:&nbsp;&nbsp;</p>
    <p><strong><span class="" style="font-size: medium;">a·x</span><sup><span class="" style="font-size: medium;">2</span></sup><span class="" style="font-size: medium;"> + b·x + c = 0&nbsp;</span></strong></p>
    <ul>
        <li>La posición [0] representa al número "a"</li>
        <li>La posición [1] representa al número "b".</li>
        <li>La posición [2] representa al número "c".</li>
    </ul>
    <p>La fórmula para resolver es:&nbsp;(-b±√(b²-4ac))/(2a)</p>
    <p>NOTA: La función raiz en php se calcula:&nbsp;<strong>sqrt</strong>(float&nbsp;<code>$arg</code>):&nbsp;float</p>
    <p></p>
    <h3>Solución:</h3>

    <form method="post" action="">
        <label for="a">Valor a:</label>
        <input type="number" name="a" id="a" required>
        <br>
        <label for="b">Valor b:</label>
        <input type="number" name="b" id="b" required>
        <br>
        <label for="c">Valor c:</label>
        <input type="number" name="c" id="c" required>
        <br>
        <input type="submit" id="Calcular" name="Calcular" value="Calcular">
        <br>
    </form>

    <?php
    if (isset($_POST['Calcular'])) {
        // Se inicializa el array
        $ecuacion = array($_POST['a'], $_POST['b'], $_POST['c']);

        // Se halla el discriminante
        $disc = $ecuacion[1] * $ecuacion[1] - 4 * $ecuacion[0] * $ecuacion[2];

        // Si el discriminante es 0, solo hay una solución
        switch (true) {
            case $disc == 0:
                $sol = -$ecuacion[1] / 2 * $ecuacion[0];
                echo "La solución es x = $sol";
                break;

            case $disc > 0:
                // En este caso hay solucion doble por el +-
                $sol1 = (-$ecuacion[1] + sqrt($disc)) / 2 * $ecuacion[0];
                $sol2 = (-$ecuacion[1] - sqrt($disc)) / 2 * $ecuacion[0];

                echo "<br>La solución 1 es x = $sol1";
                echo "<br>La solución 2 es x = $sol2";
                break;

            default:
                echo "No tiene soluciones reales porque su discriminante es menor que 0.";
                break;
        }
    }
    ?>
</body>

</html>