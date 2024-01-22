<?php
require_once("autobus.php");
require_once("coche.php");
require_once("vehiculo.php");
require_once("furgoneta.php");

//genero y configuro los vehiculos nuevos
$autobus = new autobus("Volvo", "Oruga", "Corporativo", "El Torero","Empresa Pages");
$furgoneta = new furgoneta("Volkswagen", "Camper", "Rojo-blanco", "RentingEu", "Eiffage");
$coche = new Coche("Ford","B-Max","blanco","DoloresF");
?>
<div>

    ¿Puedo aparcar el coche en la superficie?:

    <strong><?php echo ($coche->puedeAparcar("superficie")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿Puedo aparcar el coche en el subterráneo 2?:

    <strong><?php echo ($coche->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿Puedo aparcar la furgoneta en la superficie?:

   <strong><?php echo ($furgoneta->puedeAparcar("superficie")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿Puedo aparcar la furgoneta el subterráneo 2?:

    <strong><?php echo ($furgoneta->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿Puedo aparcar el autobús en la superficie?:

    <strong><?php echo ($autobus->puedeAparcar("superficie")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿Puedo aparcar el autobús el subterráneo 1?:

    <strong><?php echo ($autobus->puedeAparcar("subterraneo1")) ? "si" : "no" ?></strong>

</div>

<div>

    ¿A qué empresa pertenece el autobús?:

    <strong><?php echo $autobus->getEmpresa() ?></strong>

</div>

