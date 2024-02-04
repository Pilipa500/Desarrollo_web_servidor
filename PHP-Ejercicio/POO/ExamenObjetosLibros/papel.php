<?php
abstract class Papel {
    protected $paginasGastadas = 0;
    protected $paginasRecicladas = 0;
    private $dobleCara;

    abstract public function calcularEspacio();

    public function __construct($alto, $largo) {
        $this->alto = $alto;
        $this->largo = $largo;
        $this->dobleCara = false;
    }

    public function getDobleCara() {
        return $this->dobleCara;
    }

    public function __toString() {
        return "Se usa un papel de tamaño ($this->alto x $this->largo): $this->alto x $this->largo\n";
    }
}
?>
