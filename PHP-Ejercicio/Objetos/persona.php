 <?php
    //definición de clase
    class Persona
    {   
        //definicion variable estatica
        public static $totalpersonas=0;

        //constantes
        const SALARIOBASE=1000;

        //definicion de variables
        private $nombre;
        private $apellidos;
        public $edad;

        //constructores
        public function __construct($n, $a)
        {
            $this->nombre       =$n;//primera forma de hacer el constructor
            $this->apellidos    =$a;//segunda manera. Las dos son válidas
            
            //incremento el numero de personas
            Persona::$totalpersonas++;
        }
        //destructor. Se ejecuta cuando el código haya 
        //terminado sus funciones y se destrulla
        public function __destruct()
        {
           Persona::$totalpersonas--; 
        }

        //llamada getters
        public function  getApellidos(){
            return $this->apellidos;
        }

        //llamada al setter
        public function setApellidos($ap)
        {
            $this->apellidos = $ap;
        }

        //metodos auxiliares
        public function mayorEdad()
        {
            return $this->edad >=18;
        }

        //getter y setter mágicos
        public function __get ($atrib)
        {
            //si existe el atributo en el objeto
            if(property_exists($this, $atrib))
            {
                //retorno el valor
                return $this->$atrib;
            }
        }

        //setter mágicos
        public function __set($atrib, $valor)
        {
            //crea un nuevo atributo con el valor indicado
            $this->$atrib = $valor;
        }
    }

 ?>