<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--
		Desarrollo Web en Entorno Servidor 
	
		Debes programar una aplicación para mantener una pequeña agenda en una única página web programada enPHP.
		La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono.
		Además, no podrá haber nombres repetidos en la agenda.
		En la parte superior de la página web se mostrará el contenido de la agenda.
		En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto,
		uno para el nombre y otro para el número de teléfono.
		Cada vez que se envíe el formulario se comprobará:
				•	Si el nombre está vacío, se mostrará una advertencia.
				•	Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío,
						se añadirá a la agenda.
				•	Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono,
						se sustituirá el número de teléfono anterior.
				•	Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono,
						se eliminará de la agenda la entrada correspondiente a ese nombre.
-->
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Agenda</title>


</head>
<!-- Comenzamos poniendo el foco del cursor en la pregunta de nombre -->

<body>
	<?php
	$agenda;
	$val = false;
	// Función de validación de nombre
	function validateName($name){
		// Comprobamos que el nombre solo contenga letras y espacios
		if (preg_match("/^[A-Za-z ]{3,15}$/", $name)) {
			return true;
		} else {
			echo "El nombre no es válido, tiene que tener un minimo de 3 caracteres y un máximo de 15";
			return false;
		}
	}
	//Función de Validación del número de telefono
	function validateNumero($numero){
		// Comprobamos que el nombre solo contenga letras y espacios
		if (preg_match('/^([(]?[0-9]{4}[)]?[ ]?)([0-9]{3}[.]?[0-9]{3}[.]?[0-9]{3})|([\+][0-9]{2}[ ]?)([0-9]{3}[.]?[0-9]{3}[.]?[0-9]{3})$/', $numero)) {
			return true;
		} else {
			 echo "El número no es válido, tiene que ir con prefijo 0034 o +34";
			return false;
		}
	}
	//Esta función localiza la posición del nombre dentro de la agenda.
	function localizarPosicion($name,$agenda){
		$posr=array_search($name, $agenda);
		return $posr;//devuelve la posición del nombre dentro del array
	}
	function comprobarNombre($name,$agenda){
		foreach ($agenda as $key) { //Aqui se recorren todas las posiciones del array	
			if ($agenda[$key] == $name) { //Aqui se comprueba que si una posicion coincide con el nombre la variable $val vale true
				return true;
			}
		}
	}
	function agregarContacto($telefono,$name,$agenda){
		if (!empty($telefono) && comprobarNombre($name,$agenda)==false) { //aqui se comprueba que si el teléfono no está vacío y el nombre no coicide en la lista (que no está en la agenda) lo añade.
			// $agenda[localizarPosicion($name,$agenda)] = $name;
			// $agenda[localizarPosicion($name,$agenda)+ 1] = $telefono;
			// $pos=0;
			$agenda[localizarPosicion($name,$agenda)] = $_POST['nombre'];
			$agenda[localizarPosicion($name,$agenda) + 1] = $_POST['telefono'];
			
			return $agenda;// print_r ($agenda);
			//return implode(",", $agenda);
		}
		
	}

	

	// Comprobamos que se han recibido los datos 'anteriores' por POST
	
	if (!empty($_POST['personas'])) {
		// Se crea un array con todos los datos antiguos indicándole que están separados por coma
		$agenda = explode(",", $_POST['personas']);
		// almacenamos en 'pos' el número de elementos almacenados
		$pos = count($agenda);
		print $_POST['personas'];
	} else {
		// Si no hay datos antiguos, sólo reiniciamos las variables globales
		$agenda = array();
		$pos = 0;
	}

	// -------------------------------------------------------------------------------------------

	if (!empty($_POST['nombre'])) { //Aqui se comprueba que el nombre no esté vacío, si no está vacío se ejecuta el bucle for
		foreach ($agenda as $key => $value) { //Aqui se recorren todas las posiciones del array	
			if ($agenda[$key] == $_POST['nombre']) { //Aqui se comprueba que si una posicion coincide con el nombre la variable $val vale true
				$val = true;
			}
		}
		if (validateName($_POST['nombre']) && validateNumero($_POST['telefono'])) {//Aquí se comprueba que el nombre y el número introducido sea válido

			agregarContacto($_POST['telefono'],$_POST['nombre'],$agenda);

			// if (!empty($_POST['telefono']) && $val == false) { //aqui se comprueba que si el teléfono no está vacío y el nombre no coicide en la lista (que no está en la agenda) lo añade.
			// 	$agenda[$pos] = $_POST['nombre'];
			// 	$agenda[$pos + 1] = $_POST['telefono'];
			// }
			
		}
		
			if ($val == true && !empty($_POST['telefono'])&& validateNumero($_POST['telefono'])) {//Si el nombre existe y el teléfono no está vacío  entra en el if
				//print_r("La posicion es".localizarPosicion($_POST['nombre'],$agenda));
				// print_r();
				//$posr = array_search($_POST['nombre'], $agenda);//aqui localizo la posición del nombre que se repite.
			$agenda[localizarPosicion($_POST['nombre'],$agenda) + 1] = $_POST['telefono']; //aqui se reemplaza el número de telefono por el indicado por el formulario
		}
		
		
		
		
		if ($val == true && empty($_POST['telefono'])) {
			//$posrepe = array_search($_POST['nombre'], $agenda); //Aqui se comprueba cual es la posición del valor introducido por teclado.
			array_splice($agenda, localizarPosicion($_POST['nombre'],$agenda), 2); //aqui con esta función cojo dentro del array $agenda la posición que tiene el valor repetido y le digo mediante el 2 que quiero que me seleccione esa posición y la siguiente, y como no le indico nada más las borra. 

		}
	} else { //Si el nombre está vacío aparece el mensaje de EL Nombre no puede estar vacío.
		echo " <br><h2>El Nombre no puede estar vacío</h2>";
	}


	// --------------------------------------------------------------------------------------------
	if (isset($_POST['nombre'])) {
	}


	// Si hay datos que mostrar, lo hacemos
	if (count($agenda) > 1) {
		echo "<h1>Agenda:</h1>";
		echo "<table border=1><tr align='center'><th>Nombre</th><th>Tel&eacute;fono</th></tr>";
		// Mostramos una fila de la tabla por cada dato a presentar
		for ($i = 0; $i < count($agenda); $i += 2) {

			echo "<tr><td>" . $agenda[$i] . "</td><td>" . $agenda[$i + 1] . "</td></tr>";
		}
		echo "</table>";
		// print_r($agenda);
	}

	?>

	<form name="formulario" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<br>
		Nombre: <input name="nombre" type="text" />
		<br>
		<br>
		Teléfono: <input name="telefono" type="text" />
		<br>

		<!-- Creamos un campo oculto para enviar los datos ya recogidos con anterioridad -->
		<input name="personas" type="hidden" value="<?php if (isset($agenda)) echo implode(",", $agenda) ?>" style="text-align:right;" />

		<!-- Enviamos los datos del formulario -->
		<br><br><input type="submit" value="enviar" />
	</form>

</body>

</html>