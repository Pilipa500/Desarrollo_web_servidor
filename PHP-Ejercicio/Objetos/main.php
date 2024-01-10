<?php
    //importar fichero
    require_once ('persona.php');

    //instanciar clase persona
    $p1 = new Persona("Pilar", "Diaz");
    $p2 = new Persona("Ana", "Perez");

    //consultar variables estatica
    echo "El numero total de personas es:" . persona::$totalpersonas;

    //eliminamos el objeto p2
    unset($p2);
    echo"<p>El numero total de persona es :" . persona::$totalpersonas;


    //Llamada a setter
    $p1 ->setApellidos ("Pilar", "Diaz");

    //Llamada a getter
    echo "<p>Los apellidos son: " .$p1->getApellidos() . "<p>";


    //actualizar edad
    $p1-> edad= 20;
    echo"<p>La edad de p1 es " . $p1->edad. "<p>";

    //informar de mayoria de edad
    if($p1->mayorEdad())
    {
        echo $p1-> getApelLidos() . "es mayor de edad.";
    }
    else
    {
        echo $p1->getApellidos() . "es menor de edad.";
    }

    echo "<p>El salario base es: " . persona::SALARIOBASE;

    //creo variable en ejecucion con setter mágico
    $p1->horas = 40;

    //leo varible en ejecución con getter mágico
    echo "<p>Número de horas: " . $p1->horas . "<p1>";

    //clonar un objeto
    $p3 = clone($p1);
    $p3->setApellidos("otroapellido");

    echo "<p>apellidos p3: " . $p3->getApellidos() . "</p>";
    echo "<p>apellidos p1: " . $p1->getApellidos() . "</p>";

    //referenciar a un objeto
    $p3 = ($p1);
    $p3->setApellidos("otroapellido");

    echo "<p>apellidos p3: " . $p3->getApellidos() . "</p>";
    echo "<p>apellidos p1: " . $p1->getApellidos() . "</p>";

    //guardar objetos en sesiones
    session_start();
    $_SESSION['persona'] = serialize($p1);
    $_SESSION['persona'] = ($p1);
?>