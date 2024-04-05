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
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    
</head>
<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
        
        // Realiza la conexion a la base de datos a través de una función 
        $conexion = conectarPDO($host, $user, $password, $bbdd);

        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT e.id, e.nombre nombre, apellidos, email, hijos, salario, nacionalidad, d.nombre departamento, s.nombre sede
        FROM empleados e 
        INNER JOIN departamentos d ON 
        d.id = e.departamento_id
        INNER JOIN sedes s ON 
        s.id = d.sede_id
        INNER JOIN paises p ON
        p.id = e.pais_id";
        
        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);

    ?>
        
    <table border="1" cellpadding="10" style="margin-bottom: 10px;">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Nº hijos</th>
            <th>Salario</th>
            <th>Nacionalidad</th>
            <th>Departamento</th>
            <th>Sede</th>
        </thead>
        <tbody>
            <!-- Mostrar todos los datos de los empleados -->
            <?php
               
                // para mostrar todos los datos
                while ($registro = $resultado->fetch(PDO::FETCH_OBJ)):
            ?>
                <tr>
                    <td><?php echo $registro->nombre; ?></td>
                    <td><?php echo $registro->apellidos; ?></td>
                    <td><?php echo $registro->email; ?></td>
                    <td><?php echo $registro->hijos; ?></td>
                    <td><?php echo $registro->salario; ?> €</td>
                    <td><?php echo $registro->nacionalidad; ?></td>
                    <td><?php echo $registro->departamento; ?></td>
                    <td><?php echo $registro->sede; ?></td>
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
</body>
</html>