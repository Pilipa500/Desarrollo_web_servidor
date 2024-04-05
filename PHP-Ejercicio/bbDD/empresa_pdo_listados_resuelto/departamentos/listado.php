<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");
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
        $consulta = "SELECT d.id id, s.nombre sede, presupuesto, d.nombre FROM sedes s INNER JOIN departamentos d ON s.id = d.sede_id";

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);

        $resultado->bindColumn(1, $id);
        $resultado->bindColumn(2, $sede); 
        $resultado->bindColumn(3, $presupuesto);
        $resultado->bindColumn(4, $nombre);

    ?>
        <table border="1" cellpadding="10">
            <thead>
                <th>Departamento</th>
                <th>Presupuesto</th>
                <th>Sede</th>
            </thead>
            <tbody>
                <?php
                    // para mostrar todos los datos
                    while ($registro = $resultado->fetch(PDO::FETCH_BOUND)):
                ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $presupuesto; ?></td>
                        <td><?php echo $sede; ?></td>
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
        $resultado = null;

        $conexion = null;
    ?>
</body>
</html>