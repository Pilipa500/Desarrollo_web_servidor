<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de alumnos con su edad</title>
</head>
<body>
    <h1>TAbla de alumnos con su edad</h1>
    <p>Dadas las siguientes tablas con nombre y edad de los alumnos de dos clases diferentes:</p>
    <?php
        $clase1=[
            ["Juan"=>21],
            ["María"=>19],
            ["Pedro"=>24],
            ["Antonio"=>30],
            ["Carmen"=>24],
            ["Carlos"=>26],
            ["Lucía"=>22],
        ];
        $clase2=[
            ["Jaime"=>27],
            ["Luisa"=>21],
            ["Aitor"=>33],
            ["Macarena"=>22],
            ["María"=>27],
            ["Pedro"=>28],
            ["Juan"=>24],
        ];

        var_dump($clase1[0]);
           ?>
            
</body>
</html>