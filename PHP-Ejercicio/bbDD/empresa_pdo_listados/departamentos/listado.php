<?php

// Incluye ficheros de variables y funciones
require_once("../utiles/funciones.php");
require_once("../utiles/variables.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de departamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_BOUND)</h1>

    <?php
    // Realiza la conexion a la base de datos a través de una función 
    $conexion = conectarPDO($host, $user, $password, $bbdd);

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $consulta = "SELECT d.nombre, d.presupuesto, s.nombre
                       FROM departamentos d
                       INNER JOIN sedes s ON s.id = d.sede_id
                    ";

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
    $resultado = resultadoConsulta($conexion, $consulta);

    //enlazar datos (bound, bind)
    $resultado->bindColumn(1, $nombredpto);
    $resultado->bindColumn(2, $presupuesto);
    $resultado->bindColumn(3, $nombresede);


    ?>
    <table border="1" cellpadding="10">
        <thead>
            <th>Departamento</th>
            <th>Presupuesto</th>
            <th>Sede</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->
            <?php
            while ($fila = $resultado->fetch(PDO::FETCH_BOUND)) : //Renombra las columnas con el nombre de la variable que le hemos puesto
            ?>

                <!-- Fila -->
                <tr>
                    <!-- Columna nombre-->
                <td>
                    <?php
                    echo $nombredpto;
                    ?>
                </td>
                <!-- Columna Dirección (Esta forma es más fácil de ver)-->
                <td><?php echo $presupuesto; ?></td>
               
                <!-- Columna nombre de sede-->
                <td><?php echo $nombresede; ?></td> 
                </tr>

            <?php
            endwhile;
            ?>

        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>


    <?php

    // Libera el resultado y cierra la conexión
    $resultado = null;
    $conexion = null;


    ?>
</body>

</html>