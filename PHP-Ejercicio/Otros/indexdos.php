<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 4: Preferencias</title>
</head>
<body>
    <?php
$a=3;
$b=5;
$resultado=$a+$b;
echo "El resultado es ".$resultado;
?>

    <form action="#" method="get">
        <fieldset>
            <legend>Indique sus preferencias por favor</legend>
            <p>Elija una fecha: <input type="date" ></p>
            <p>Elija un fichero: <input type="file"></p>
            <p>AMD <input type="radio">Intel i5 <input type="radio">Intel i7<input type="radio"> </p>
        </fieldset>

        <fieldset>
            <legend>Indique sus preferencias por favor</legend>
            <p>Matemáticas<input type="radio">Historia<input type="radio">Geografia<input type="radio">Lengua<input type="radio"> </p>
            <p>Nombre <input type="text"></p>
            <p>Apellidos <input type="text"></p>
            <p>Dirección<input type="text"></p>
            <p>Elije un color:<input type="color" name="color_control" /></p>
            <textarea name="texto" id="texto_rellanar" cols="30" rows="10"></textarea>
            <p>Elije una fecha:<input type="date"></p>
            <input list="lista">
                <datalist id= lista>
                    <option value="inglés">
                    <option value="frances">
                    <option value="aleman">
                </datalist>
            <p>Elije una hora: <input type="time"</p>
            <p>Elije un fichero <input type="file"</p>
            <p>Hombre<input type="radio" id="sexo" name="sexo" value="hombre">Mujer<input type="radio" id="sexo" name="sexo" value="mujer"></p>
        </fieldset>
    </form>
    
</body>
</html>