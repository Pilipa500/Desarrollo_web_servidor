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
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    
</head>
<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
        
        // Realiza la conexion a la base de datos a través de una función 
        $conexion = conectarPDO($host, $user, $password, $bbdd);

        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT e.id, e.nombre nempleado, e.apellidos, e.email, e.hijos, e.salario, 
                            p.nacionalidad,
                            d.nombre ndepart,
                            s.nombre nsede
                        FROM empleados e INNER JOIN departamento O e.departament_id = d.id 
                                         INNER JOIN sedes s      ON s.id = d.sede_id
                                         INNER JOIN paises p       ON p.id = e.pais_id";
                       
        
        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El 
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
             while($fila = $resultado->fetch(PDO::FETCH_OBJ)):
            ?>
            <tr>
            <!-- <th><?php echo $fila->nempleado;?>  -->
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Nº hijos</th>
            <th>Salario</th>
            <th>Nacionalidad</th>
            <th>Departamento</th>
            <th>Sede</th>
        </tr>
            
        </tbody>
    </table>
        
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>
    <?php

        // Libera el resultado y cierra la conexión
    
    ?>
</body>
</html>