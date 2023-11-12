<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo según la hora</title>
    <!--Realiza un programa en php que pida una hora por teclado y que muestre luego buenos días, buenas
tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.-->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        input {
            padding: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
          
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <label for="hora">Introduce la hora (formato de 24 horas): </label>
        <input type="number" id="hora" name="hora" min="0" max="23" required>
        <button type="submit">Obtener Saludo</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//comprueba si la solicitud al servidor fue hecha x POST
        // Obtener la hora del formulario
        $hora = intval($_POST["hora"]);//Aquí sacamos el valor de la variable "hora" del formulario y 
        //luego se convierte en un entero por medio del método intval();

        // Validar la entrada
        if ($hora >= 0 && $hora <= 23) {
            // Determinar el saludo según la hora
            if ($hora >= 6 && $hora < 12) {
                $saludo = "Buenos días";
            } elseif ($hora >= 12 && $hora < 21) {
                $saludo = "Buenas tardes";
            } else {
                $saludo = "Buenas noches";
            }

            // Mostrar el saludo
            echo "<div>{$saludo}</div>";
        } else {
            // Mostrar mensaje de error si la hora no es válida
            echo "<div style='color: red;'>Hora no válida. Debe estar entre 0 y 23.</div>";
        }
    }
    ?>
</body>
</html>

