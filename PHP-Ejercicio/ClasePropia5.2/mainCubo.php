<?php
//pruebo el cubo y empiezo creando uno
require_once('cubo.php');
$cubo1 = new Cubo ("rojo", 5);
$cubo2 = new Cubo ("amarillo", 2);

//ver los datos del cubo
echo "Color cubo " .$cubo1->datosCubo()."<br>";
?>