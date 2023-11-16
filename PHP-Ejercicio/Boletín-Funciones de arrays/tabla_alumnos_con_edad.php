<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, td, tr{ border: solid black 1px; border-collapse: collapse;}
    </style>
    <title>Tabla de alumnos con su edad</title>
</head>
<body>
    <h1>TAbla de alumnos con su edad</h1>
    <p>Dadas las siguientes tablas con nombre y edad de los alumnos de dos clases diferentes:</p>
    <?php
           $clase1= array(
            "Juan"=> 21,
            "María"=>19,
            "Pedro"=>24,
            "Antonio"=>30,
            "Carmen"=>24,
            "Carlos"=>26,
            "Lucía"=>22,
           );

           //Mostrar la clase 1
           mostrarTabla($clase1);

        function mostrarTabla(array $t)
        {
            // Abrimos tabla
            echo "<table>";
            foreach ($t as $indice => $valor) {
            
                // Abrir fila
                echo "<tr>";
                    //Celda izq
                    echo "<td> $indice </td>";
                    // Celda derecha
                    echo "<td> $valor </td>";
                // Cerrar fila
                echo "</tr>";
                
             
            }

            // Cerrar tabla
            echo "</table>";
            echo "<br>";
        }

        

        
        $clase2=array(
            "Jaime"=>27,
            "Luisa"=>21,
            "Aitor"=>33,
            "Macarena"=>22,
            "María"=>27,
            "Pedro"=>28,
            "Juan"=>24,
        );

        mostrarTabla($clase2);


       
        $unionTablas = array_merge($clase1, $clase2);//con esta función creo la uníon de las dos tablas 
        mostrarTabla($unionTablas);
        ?>
            
</body>
</html>