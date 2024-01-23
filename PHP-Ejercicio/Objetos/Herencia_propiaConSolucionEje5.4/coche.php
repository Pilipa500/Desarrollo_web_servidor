<?php
require_once ("vehiculo.php");
class coche extends vehiculo{
    function puedeAparcar($miPlanta){
        //True si está en el array y no es superficie
        return (array_search($miPlanta,$this->plantas) !== false && array_search($miPlanta,$this->plantas) > 0);
    }
}
?>