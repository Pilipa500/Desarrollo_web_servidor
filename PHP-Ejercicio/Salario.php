<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular salario</title>
</head>
<body>
    <?php
    $salario=2000;
    $impuesto=0.15;
    $resultado=$salario-($salario*$impuesto);

    echo "El salario sin descontar el impuesto es: $salario € de impuestos";
    echo "El salario $salario una vez descontado: $resultado";
    ?>
    <?php

    ?>

    <form methodo="post" action="#" >
        <label for="salario">Salario</label>
        <input type="submit" name="salarioBoton">
        <input type="number" name="salario"><br>
       

        <label for="resultado">Resultado</label>
        <input type="submit" name="SalarioResultado">
        <input type="number" name="resultado"><br>
        
    </form>
</body>
</html>