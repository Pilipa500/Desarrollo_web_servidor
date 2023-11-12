<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar números</title>
</head>
<body>
   <?php
   /*Comparar el mayor número de 3 implementandolo
   con estructura if*/
   
        $num1 = 10;
        $num2 = 20;
        $num3 = 15;

        if ($num1 > $num2 && $num1 > $num3) {
            echo "El número mayor es $num1";
        } elseif ($num2 > $num1 && $num2 > $num3) {
            echo "El número mayor es $num2";
        } else {
            echo "El número mayor es $num3";
        }
    ?>

</body>
</html>