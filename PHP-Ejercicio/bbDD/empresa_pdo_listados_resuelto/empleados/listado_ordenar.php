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
        $camposOrdenacion = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];

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

        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT e.id, e.nombre nombre, apellidos, email, hijos, salario, nacionalidad, d.nombre departamento, s.nombre sede
        FROM empleados e 
        INNER JOIN departamentos d ON 
        d.id = e.departamento_id
        INNER JOIN sedes s ON 
        s.id = d.sede_id
        INNER JOIN paises p ON
        p.id = e.pais_id
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
        $consulta = null;

        $conexion = null;
    ?>
</body>
</html>