<?php
require_once ("vehiculo.php");
class furgoneta extends vehiculo{
    //escribo la función para poder aparcar en la planta
    function puedeAparcar ($miPlanta){
    //true si está en el array y no es subterraneo2
    return (array_search($miPlanta, $this->plantas) !==false && array_search($miPlanta, $this->plantas)<2);
    }
}
?>