<?php

//importar ficheros
require_once ("serie.php");
require_once("videojuego.php");

//crear arrays de 5 posiciones
$series = array();
$videojuegos = array();

//informamos con 5 objetos series
for($i=1; $i<=5; $i++)
{
    $tit = "Titulo " . $i;
    $tem = rand(1,5);
    $gen = "Genero " . $i;
    $series[] = new serie ($tit, $tem, $gen);
}

//informamos con 5 videojuegos
for($i=1; $i<=5; $i++)
{
    $tit = "Titulo " . $i;
    $tem = rand(10,50);
    $gen = "Genero " . $i;
    $videojuegos[] = new videojuego($tit, $tem, $gen);
}
//entregar
$series[2]->entregar();
$series[4]->entregar();
$videojuegos[1]->entregar();
$videojuegos[3]->entregar();

//imprimir
echo "<p><b>Serie</b></p>";
foreach ($series as $serie){
    echo $serie->toString();
}
 
echo "<p><b>Videojuegos</b></p>";
foreach ($videojuegos as $videojuego){
    echo $videojuego->toString();
}

?>