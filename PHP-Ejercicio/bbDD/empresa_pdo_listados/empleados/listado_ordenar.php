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
    <script type="text/javascript">
        function ordenarListado(campo, orden)
        {
            location.href = "listado_ordenar.php?orden="+campo+"&sentido="+orden;
        }
    </script>
</head>
<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
        // Campos que permiten ordenación
        $camposOrdenacion = ["nempleado", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];

        // Obtener campo de la ordenación
        if (isset($_GET["orden"])) 
        {
            $campoOrdenar = $_GET["orden"];
            if (!in_array($campoOrdenar,$camposOrdenacion)) 
            {
                $campoOrdenar = $camposOrdenacion[0];
            }
        } 
        else 
        {
            $campoOrdenar = $camposOrdenacion[0];
        }

        // Obtener sentido de la ordenación
        $sentidosOrdenacion = ["ASC", "DESC"];
        if (isset($_GET["sentido"])) 
        {
            $sentidoOrdenar = $_GET["sentido"];
            if (!in_array($sentidoOrdenar,$sentidosOrdenacion)) 
            {
                $sentidoOrdenar = $sentidosOrdenacion[0];
            }
        } 
        else 
        {
            $sentidoOrdenar = $sentidosOrdenacion[0];
        }
        
        // Realiza la conexion a la base de datos a través de una función 
        $conexion = conectarPDO($host, $user, $password, $bbdd);

        // Realiza la consulta a ejecutar en la base de datos en una variable utiliza las variables $campoOrdenar y $sentidoOrdenar
        $consulta = "SELECT e.id, e.nombre nempleado, e.apellidos, e.email, e.hijos, e.salario, 
                            p.nacionalidad,
                            d.nombre ndepart,
                            s.nombre nsede
                     FROM empleados e INNER JOIN departamentos ON e.departamento_id = d.id 
                                      INNER JOIN sedes s      ON s.id = d.sede_id
                                      INNER JOIN paises p       ON p.id = e.pais_id
                    ORDER BY $campoOrdenar $sentidoOrdenar";

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);
        
    ?>

        <table border="1" cellpadding="10">
            <thead>
                <th>Nombre <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'DESC')">&#8595</a></th>
                <th>Apellidos <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'DESC')">&#8595</a></th>
                <th>Correo electrónico <a href="javascript: void(0);" onclick="ordenarListado('email', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('email', 'DESC')">&#8595</a></th>
                <th>Nº hijos <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'DESC')">&#8595</a></th>
                <th>Salario <a href="javascript: void(0);" onclick="ordenarListado('salario', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('salario', 'DESC')">&#8595</a></th>
                <th>Nacionalidad <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'DESC')">&#8595</a></th>
                <th>Departamento <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'DESC')">&#8595</a></th>
                <th>Sede <a href="javascript: void(0);" onclick="ordenarListado('sede', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('sede', 'DESC')">&#8595</a></th>
            </thead>
            <tbody>

                <!-- Muestra los datos -->

                <?php
             while($fila = $resultado->fetch(PDO::FETCH_OBJ)):
            ?>
        <tr>
            <td><?php echo $fila->nempleado;?> </td>
            <td><?php echo $fila->apellidos;?></td>
            <td><?php echo $fila->email;?></td>
            <td><?php echo $fila->hijos;?></td>
            <td><?php echo $fila->salario;?></td>
            <td><?php echo $fila->nacionalidad;?></td>
            <td><?php echo $fila->ndepart;?></td>
            <td><?php echo $fila->nsede;?></td>
        </tr>

            </tbody>
        </table>
        <div class="contenedor">
            <div class="enlaces">
                <a href="../index.html">Volver a página de listados</a>
            </div>
        </div>

    
    <?php
    endwhile;
    ?>

       
        <?php

        // Libera el resultado y cierra la conexión
        $resultado = null;
        $conexion = null;
    
    ?>
    
   
</body>
</html>