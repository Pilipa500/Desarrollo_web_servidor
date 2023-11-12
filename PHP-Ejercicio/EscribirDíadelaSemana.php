<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del día
de la semana.-->
</head>
<body>
    <form action="#" method="post">
        <label for="escribe">Escribe un numero del 1 al 7 y te digo a que día corresponde</label>
        <input type="text" name="seleccion"><br>
        <input type="submit" value="Aceptar">
    </form>
    <?php
    $seleccion=$_POST['seleccion'];
    switch ($seleccion){
        case 1:
            $dia="lunes";
            break;
        case 2:
            $dia="martes";
            break;
        case 3:
            $dia="miercoles";
            break;
        case 4:
            $dia="jueves";
            break;
        case 5:
            $dia="viernes";
            break;
        case 6:
            $dia="sabado";
            break;
        case 7:
            $dia="domingo";
            break;
        default:
            $dia="Debe introducir un número del 1 al 7";
    }
    echo $dia;
    ?>
    
</body>
</html>