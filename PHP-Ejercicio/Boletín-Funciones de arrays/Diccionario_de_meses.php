<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<p>Introduce un numero al azar (entre 1-12) para obtener su equivalencia
    en mes de los idiomas, inglés, francés y aleman. <br>
    Si quieres que se genere un mes aleatorio en francés, introduce 666
</p>
<body>
</pre>

<form method="post">
    <div>
        <label for="mesalAzar">Inserte un mes</label>
        <input type="number" name="mesalAzar">
    </div>
</form>

<table>
    <th colspan="4">Traduccion de meses a distintos idiomas</th>
    <tbody>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <?php echo cargarDatos() ?>
        <?php endif; ?>

    </tbody>
</table>
    <?php
     function cargarDatos()
     {
         if ($_SERVER["REQUEST_METHOD"] == "POST")
             // Comprobamos si las variables estan cargadas   
             if (isset($_POST["mesalAzar"]) && !empty($_POST["mesAzar"])) {
                 $mesAzar = $_POST["mesalAzar"] - 1; // Restamos uno para que coincida con el índice del array, que empieza en 0            }
             }
$arrayMeses = [
            ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"]
        ];
        function mostrarTabla($mesalAzar, $arrayMeses){

        };//tengo que desarrollar esta funcion!!!
    }
    echo "<br>";
    var_dump (mostrarTabla);
    echo "<br>";
        ?>
</body>
</html>
