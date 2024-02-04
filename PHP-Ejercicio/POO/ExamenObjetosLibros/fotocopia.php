<?php
class Fotocopia extends Papel {
    public function __construct($alto, $largo) {
        parent::__construct($alto, $largo);
        $this->paginasGastadas++;
    }

    public function __destruct() {
        $this->paginasRecicladas++;
    }

    public function __toString() {
        return parent::__toString() . "Es a doble cara: " . ($this->dobleCara ? "Sí" : "No") . "\n";
    }
}
?>
