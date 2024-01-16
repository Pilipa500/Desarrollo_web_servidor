<?php
//importar fichero
//require_once("figura.php");como solo usamos cuadrado no es necesario importar este
require_once("cuadrado.php");

//crear cuadrado
$c1 = new cuadrado(5,"rojo");


//acceder a funciones de cuadrado, subclase
echo "<p><b>Acceder al objeto c1 (subclase):<ul></b></p>";

//Leer variables protegidas
echo "<p>Longitud del lado: " . $c1->longLado. "</p>";
echo "<p>Numero de lado: " . $c1->numLados. "</p>";

//acceder a metodos de figura, superclase
echo "<p>Color: " . $c1->getColor() . "</p>";

//acceder a variables de cuadrado, subclase
echo "<p><b><u>Acceder al objeto C1 (subclase):</u></b></p>";
echo "<p>Nombre del cuadrado:  ".$c1->nombre3D ."</p>";

//acceder a funciones de cuadrado, subclase
echo "<p>·El area es: " .$c1->getArea() . "</p>";

//usar setter mágico
$c1->inventada = "prueba";
echo "<p> Variable inventada se ha creado </p>";
//usar el getter mágico
echo "<p>La variable inventada vale: " .$c1->inventada."</p>";

?>