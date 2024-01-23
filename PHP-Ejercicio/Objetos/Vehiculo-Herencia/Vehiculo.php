<?php
class vehiculo{

    //variables
    private $marca;
    private $color;
    private $plazas;
    private $aparcado;

    //constructores
    public function __construct ($marca,$color,$plazas=0,$aparcado)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->plazas = $plazas;
        $this->aparcado= true;
    }
    
    //get y set

    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function getPlazas() {
        return $this->plazas;
    }

    public function setPlazas($plazas) {
        
        // Controlar que las plazas sean un número positivo
        if (is_numeric($plazas) && $plazas >= 0) {
            $this->plazas = $plazas;
        } else {
            // Si no es un numero entero salta este mensaje 
            echo "Error: Las plazas deben ser un número entero positivo.\n";
        }
    }

    public function aparcar() {
        $this->aparcado = true;
    }

    public function arrancar() {
        $this->aparcado = false;
    }

    public function isAparcado() {
        if ($this-> aparcado) {
            return true;
        } else {
            return false;
        }
       
    }

    public function toString() {
        return "Marca: {$this->marca}, Color: {$this->color}, Plazas: {$this->plazas}, Aparcado: " . ($this->aparcado ? 'Sí' : 'No');
    }
}

?>