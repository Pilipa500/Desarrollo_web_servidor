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
    <title>Listado de sedes</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta nueva sede</h1>

    <?php
//Inicializacion de valores
$validacion = false;
$errores =[];
$sede = "";
$direccion = "";
        //cuando se viene de un sbumit
        if($_SERVER["REQUEST_METHOD" == "POST"]){
        
        
        $longMinSede = 3;
        $longMaxSede = 50;
        $longMinDirec = 10;
        $longMaxDirec = 255;

        //Obtención de datos
        $sede = obtenerValorCampo("nombre");
        $direccion = obtenerValorCampo("direccion");

        //validaciones

        //validacion de sede
        if(!validarLongitudCadena($sede, $longMinSede, $longMaxSede))
        {
            $errores['sede']= "La sede de la empresa no cumple con la longitud. Min: $longMinSede . Max: $longMaxSede";
            $sede =" ";
        }
          //validacion direccion
          if(!validarLongitudCadena($direccion, $longMinDirec, $longMaxDirec))
          {
              $errores['direccion']= "La sede de la empresa no cumple con la longitud. Min: $longMinSede . Max: $longMaxSede";
              $sede = " ";
          }
        }
        ?>

       
          <?php
          if (!$validacion || count ($errores)>0):
            ?>
         //AÑADIR EL FORMULARIO DEL PDF
         <form action=""
            <?php
                if(isset$errores["sedes"]()):
            ?>
            {}
            else
            {//con errores

            }

            ?>

        // Realiza la conexion a la base de datos a través de una función 
        $conexion = conectarPDO($host, $user, $password, $bbdd);

        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT * FROM sedes";

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);
    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Dirección</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->
            <?php
            while($fila = $resultado->fetch (PDO::FETCH_ASSOC)):
            ?>
             <!-- Fila -->
             <tr>
                <!-- Columna nombre-->
                <td>
                    <?php
                    echo $fila["nombre"];
                    ?>
                </td>
                <!-- Columna Dirección-->
                <td><?php echo $fila["direccion"]; ?></td>
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
        <div class="enlaces">
            <a href="nuevo.php">Crear nueva sede</a>
        </div>
    </div>

    <?php

        // Libera el resultado y cierra la conexión
        $resultado = null;
        $conexion = null;
    
    ?>
</body>
</html>