<?php
require_once("Vehiculo.php");

//clase coche
class coche extends vehiculo{
    //variables
    private $matricula;
    private $kilometros;

    //constructor
    public function __construct($matricula="", $kilometros=0, $marca, $color, $plazas=0, $aparcado)
    {
        //llamada al constructor de la superclase
        parent::__construct ($marca,$color,$plazas,$aparcado);

        $this->matricula =$matricula;
        $this->kilometros;

        $this->comprobarMatri($matricula);
    }

    public function comprobarMatri($matricula){
        $patron = '/^[0-9]{4}[BCDFGHJKLMNPRSTVWXYZ]{3}$/'; 
        if(preg_match($patron, $matricula)){
            echo 'La matrícula es válida';
        }
        else{
            echo 'La matrícula no es válida';
        }
        }
        //metodo para comprobar si el coche puede circular
        public function puedeCircular(){
            return !empty($this->matricula);
        }
        //metodo para comprobar si podemos viajar
        public function viajar($kilometros){
            if($this->puedeCircular() && $this->isAparcado()===false && $kilometros>=0){
              $this->kilometros += $kilometros;
              echo "Viaje de $kilometros km realizado.\n";
            }else{
              echo "No se puede realizar el viaje.\n";
            }  
            }
            //metodo toString para el coche
            public function toString(){
                return parent::toString() .", Matricula: {$this->matricula}, Kilómetros: {$this->kilometros}";
            }
        }
     


    
?>