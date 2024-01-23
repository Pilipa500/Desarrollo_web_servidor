<?php

class Cubo{
    private $color;
    private $litros;
    //private $asa;

    //constructores
    public function __construct($color,$litros) {
        $this->color = $color;
        $this->litros = $litros;
        //$this->asa = $asa;
    }

    //get y set para color
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    //get y set para litros
    public function getLitros()
    {
        return $this->litros;
    }
    public function setLitros($litros)
    {
        $this->litros = $litros;
    }
    //get y set para asa
    //public function getAsa()
    //{
       // return $this->asa;
    //}
    //public function setAsa($asa)
    //{
      //  $this->asa=$asa;
    //}

    //metodo para llenar cubo
    public function llenarCubo($cantidad)
    {
        return $this->litros + $cantidad;
    }
    //metodo para ver cubo completo
    public function datosCubo()
    {
        return $this->color ."de". $this->litros ."litros";
    }
}
?>