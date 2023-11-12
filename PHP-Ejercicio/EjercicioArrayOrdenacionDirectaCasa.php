<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección Directa</title>
</head>

<body>
    <h1>Selección Directa</h1>
    <p>Selección directa
        Implementa el método de ordenación de "selección directa" para un array con los valores: 50, 23, 18, 10, 27, 43, 5.

        Declara el array e inicialízalo.
        Crea un botón para ejecutar la ordenación "Selección directa" de esos valores.
        Muestra el array antes y después, comprobando que ahora está ordenado.</p>
        
    <?php
    $miArray = array(50, 23, 18, 10, 27, 43, 5); //definición del array
    // Función para ordenar un array usando Selección Directa
    function seleccionDirecta($miArray,$inicio)
    {
        $n = count($miArray);
        $menor=$inicio;
        for ($i = $inicio+1; $i < $n; $i++) 
            {   if ($miArray[$i]<=$miArray[$menor]) {
                // Intercambiamos los valores
                $menor = $i;
                
            }
        }
            return $menor;
        
    }
        if(isset($_POST['boton'] )){
           $n = count($miArray);

         //hago la ordenación por selección directa   
            for ($i=0; $i <$n ; $i++) { 
            $min = seleccionDirecta($miArray,$i);
            if($i !=$min){
            //intercambia los valores
            
                $temp=$miArray[$i];
                $miArray[$i]=$miArray[$min];
                $miArray[$min]=$temp;
            }
        }
            //enseña el array después de ordenarlo
         echo "<p>Array ordenado</p>";
         echo "<pres>";
         print_r($miArray);
         echo "</pre>";
        }

    ?>
        <form action="#" method="post">
            <input type="submit" name="boton" value="Ordenar">
        </form>
</body>

</html>
