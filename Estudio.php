<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio</title>
</head>
<body>
    <?php
    /*Arrays */
    $semana=array('lunes', 'martes', 'jueves' );
    echo $semana[0]." ".$semana[1]." ".$semana[2]."<br>";
    
    //modificar Array
    $semana[2]='miercoles';
    echo $semana[0].  " " . $semana[1] . " " .$semana[2] . "<br>";

    //actualmente se forman así
    $meses =['enero', 'febrero', 'marzo'];
    echo $meses[0] . " " . $meses[1] . " ".$meses[2];

    //recorrer arrays con foreach
    $array1= array(1,2,3,4,5);
        foreach($array1 as $valor){
            echo $valor;
        }
    //recorrer array asociativos, son los que tienen como indice un string
    $valores = array("uno"=>1, "dos"=> 2, "tres"=> 3, "cuatro"=>4);
        foreach($valores as $k => $v){
            echo "$valores [$k] => $v";
            echo "<br>";
        }
    //Estructura de control de while
    $num = 0;
    $respuesta = "Oporto";
    $intentos = 1;

    while($num <=10) {
            echo $num;
            echo "<br>";
            $num++;
    }
    /*while($respuesta != "Lisboa"){
        echo "Intentos " . $intentos;
        if($intentos == 3){
                    $respuestas ="Lisboa";
        }
        $intentos++;
    }*/
    //estructura de control de do while
    $valor=10;

    while ($valor != 10){
            echo"Dentro del while";
     }
     do{
        echo "Dentro del do while";
     }while ($valor!=10);
     echo "<br>";
     //Funciones
     $numero1 = 5;
     $numero2 = 10;

     function sumar(){
        echo "Soy una funcion para sumar";
     }
     sumar();

     function sumarnumeros($num1, $num2){
        echo $num1 + $num2;
        echo "<br>";
     }
     sumarnumeros($numero1,1);

     function sumarnumerosretorno($num1, $num2){
            return $num1 + $num2;
     }
     $resultado= sumarnumerosretorno($numero1, $numero2);
     echo $resultado;
     echo "<br>";

     //recursividad (es para solucionar x ejemplo factoriales, como 
     //las matrioscas, es meter una función dentro de otra y de otra..)
     function factorial ($n){
            if($n==1){
                    return 1;
            }else{
                    echo $n . " x ";
                    return $n * factorial($n-1);
            }
            }
     $resultado = factorial(5);
     echo $resultado;
     echo "<br>";

     //Funciones de arrays
     //array_dif se usa para comparar un array con uno o más arrays
     //array_dif(array $array1, array $array2...):array;

     $numero1 = array (11, 22, 33);
     $numero2 = array (11, 33, 55);

     $colores1 = array ("color1" => "rojo", "color2" => "verde", "color3"=> "azul", "color4"=> "naranja");
     $colores2 = array ("color1" => "verde", "color2" => "azul", "color3"=> "amarillo");
     
     $diferencias1 = array_diff($numero1,$numero2);
     $diferencias2 = array_diff($colores1,$colores2);

     var_dump($diferencias1);
     echo "<br>";
     var_dump($diferencias2);
     echo "<br>";

     //array_merge se usa para unir arrays, uno detrás de otro
     $a1 = array ("rojo", "verde");
     $a2 = array ("azul", "amarillo");

     $unido = array_merge($a1,$a2);
     var_dump ($unido);

     //ordenar arrays- sort(); modifica el array que se le pasa y lo ordena.
     //actua sobre el propio array, no crea uno nuevo
     //ordena por valor de menor a mayor. Y si dos miembros son iguales su orden será indefinido
     //para ponerlo en orden inverso - rsor();
     $dias=array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo");

     var_dump ($dias);
     echo"<br>";

     sort($dias);
     var_dump ($dias);//ordena por orden alfabetico los días (los contenidos) y cambia las posiciones (keys)
     echo"<br>";
    
     //ordenar con arrays- asort(); ordena y mantiene la asociacion de keys
     //ordena por valor de menos a mayor y si dos miembros son iguales su orden será indefinido
     $dias=array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo");

     var_dump ($dias);
     echo"<br>";

     asort($dias);
     var_dump ($dias);//ordena por orden alfabetico los días (los contenidos) y cambia las posiciones (keys)
     echo"<br>";

     //ordenar con ksort() ordena por las keys
     $numeros = array (10,11,8, 103,99, 54);//array indexado

     var_dump($numeros);
     echo "<br>";

     ksort($numeros);
     var_dump($numeros);
     echo "<br>";

     $arraynombres = array ("Javier" => "29", "Patricia"=> "18", "Emilio" => "26");//arrays asociativo
     //donde se ve más claramente como se ordena por la keys
     var_dump ($arraynombres);
     echo "<br>";

     ksort($arraynombres);
     var_dump($arraynombres);
     echo "<br>";

     //modificar el contenido de un array
     //array_shift();- Añade los elementos pasados al inicio del array

    $frutas = array ("naranja","platano", "manzana", "frambuesa");

    var_dump ($frutas);
    echo "<br>";

    $elimnado = array_shift ($frutas);
    var_dump ($elimnado);
    echo "<br>";
    var_dump ($frutas);



    ?>


</body>
</html>