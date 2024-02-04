<?php
include 'iembalaje.php';
class Libro extends Papel implements iembalaje {
    private $titulo;
    private $numPag;

    public function __construct($alto, $largo, $numPag) {
        parent::__construct($alto, $largo);
        $this->numPag = $numPag;
        $this->dobleCara = true;
        $this->paginasGastadas++;
    }

    public function __destruct() {
        $this->paginasRecicladas += $this->numPag;
    }

    public function embalar($unidades) {
        $this->volumenEnvoltorio = ($this->alto * $this->largo * $this->numPag) * $unidades;
    }

    public function __toString() {
        return "Libro de $this->numPag páginas titulado $this->titulo\n";
    }
}
?>
