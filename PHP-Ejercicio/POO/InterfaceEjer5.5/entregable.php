<?php

//definicion interface
interface iEntregable
{
    //función entregar
    public function entregar();
    //función devolver
    public function devolver();

    //funcion consulta
    public function isEntregado();
}

?>