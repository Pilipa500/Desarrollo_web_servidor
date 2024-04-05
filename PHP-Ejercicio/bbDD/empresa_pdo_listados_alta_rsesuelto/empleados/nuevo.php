<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta nuevo departamento</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta de un nuevo empleado</h1>
    <?php

    	// $errores = [];
    	// $comprobarValidacion = false;
    	$errores = [];
    	$comprobarValidacion = false;
    	$limiteInferiorHijos = 0;
    	$limiteSuperiorHijos = 10;
    	$nombre = "";
    	$longitudMinimaNombre = 3;
		$longitudMaximaNombre = 50;
    	$apellidos = "";
    	$longitudMinimaApellidos = 3;
		$longitudMaximaApellidos = 150;
    	$email = "";
    	$longitudMaximaEmail = 120;
    	$salario = "";
    	$hijos = "";
    	$nacionalidad = "";
    	$departamento = "";

    	if ($_SERVER["REQUEST_METHOD"]=="POST")
    	{
		    
		    $comprobarValidacion = true;
		    
		    // Obtenemos el campo del nombre de la sede y dirección
		    $nombre = obtenerValorCampo("nombre");
		    $apellidos = obtenerValorCampo("apellidos");
		    $email = obtenerValorCampo("email");
		    $salario = obtenerValorCampo("salario");
		    $hijos = obtenerValorCampo("numeroHijos");
		    $nacionalidad = obtenerValorCampo("nacionalidad");
		    $departamento = obtenerValorCampo("departamento");
		    
	    	//-----------------------------------------------------
	        // Validaciones
	        //-----------------------------------------------------
	        // Nombre del empleado
	        if (!validarLongitudCadena($nombre, $longitudMinimaNombre ,$longitudMaximaNombre)) 
	        {
	            $errores["nombre"] = "El nombre del empleado tiene que tener una longitud mínima de $longitudMinimaNombre y máxima de $longitudMaximaNombre caracteres.";
	        	$nombre = "";
	        }

	        // Apellidos del empleado
	        if (!validarLongitudCadena($apellidos, $longitudMinimaApellidos, $longitudMaximaApellidos))
	        {
	            $errores["apellidos"] = "Los apellidos del empleado tienen que tener una longitud mínima de $longitudMinimaApellidos y máxima de $longitudMaximaApellidos caracteres.";
	            $apellidos = "";
	        }

	        // Correo electrónico del empleado
	        if (!validarEmail($email))
	        {
	            $errores["email"] = "El correo electrónico del empleado no es válido.";
	            $email = "";
	        }
	        elseif (strlen($email)>$longitudMaximaEmail)
	        {
				$errores["email"] = "El correo electrónico del empleado no puede superar los longitudMaximaEmail caracteres.";
	            $email = "";
	        }

	        // El número de hijos del empleado
	        if (!validarEnteroLimites($hijos, $limiteInferiorHijos,$limiteSuperiorHijos))
	        {
	            $errores["hijos"] = "El número de hijos del empleado debe estar entre $limiteInferiorHijos y $limiteSuperiorHijos.";
	            $hijos = "";
	        }

	        // Salario del empleado
	        if (!validarDecimalPositivo($salario))
	        {
	            $errores["salario"] = "El salario debe ser un número decimal positivo.";
	            $salario = "";
	        } 


	        // Nombre del departamento
	        if (!validarEnteroPositivo($departamento))
	        {
	            $errores["departamento"] = "El nombre del departamento es obligatoria.";
	            $sede = "";
	        }
	        else
	        {

	        	// Comprobar que no exita un departamento con ese nombre
	        	$conexion = conectarPDO($host, $user, $password, $bbdd);

	        	// consulta a ejecutar
				$select = "SELECT * FROM departamentos where id = :id";

				// preparar la consulta
				$consulta = $conexion->prepare($select);

				$consulta->bindParam(':id', $departamento); 

				// ejecutar la consulta 
				$consulta->execute();

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					$errores["departamento"] = "No ha seleccionado un departamento válido.";
				}

				$consulta = null;

        		$conexion = null;
	        }

	        // Nacionalidad del empleado
	        if (!validarEnteroPositivo($nacionalidad))
	        {
	            $errores["nacionalidad"] = "La nacionalidad del empleado es obligatoria.";
	            $nacionalidad = "";
	        }
	        else
	        {

	        	// Comprobar que no exita una nacionalidad con ese id
	        	$conexion = conectarPDO($host, $user, $password, $bbdd);

	        	// consulta a ejecutar
				$select = "SELECT * FROM paises where id = :id";

				// preparar la consulta
				$consulta = $conexion->prepare($select);

				$consulta->bindParam(':id', $nacionalidad); 

				// ejecutar la consulta 
				$consulta->execute();

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					$errores["nacionalidad"] = "No ha seleccionado una nacionalidad válida.";
				}

				$consulta = null;

        		$conexion = null;
	        }



    	}
  	?>

  	<?php
  		if (!$comprobarValidacion || count($errores) > 0):
  
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	<p>
	            <!-- Campo nombre del empleado -->
	            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
	            <?php
	            	if (isset($errores["nombre"])):
	            ?>
	            	<p class="error"><?php echo $errores["nombre"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo apellidos del empleado -->
	            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos ?>">
	            <?php
	            	if (isset($errores["apellidos"])):
	            ?>
	            	<p class="error"><?php echo $errores["apellidos"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo correo electrónico del empleado -->
	            <input type="text" name="email" placeholder="Correo electrónico" value="<?php echo $email ?>">
	            <?php
	            	if (isset($errores["email"])):
	            ?>
	            	<p class="error"><?php echo $errores["email"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo salario del empleado -->
	            <input type="number" step="0.01" name="salario" placeholder="Salario" value="<?php echo $salario ?>">
	            <?php
	            	if (isset($errores["salario"])):
	            ?>
	            	<p class="error"><?php echo $errores["salario"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo número de hijos del empleado -->
	            <input type="number" name="numeroHijos" placeholder="Número de hijos" value="<?php echo $hijos ?>">
	            <?php
	            	if (isset($errores["hijos"])):
	            ?>
	            	<p class="error"><?php echo $errores["hijos"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo nacionalidad del empleado -->
	            <select id="nacionalidad" name="nacionalidad">
	            	<option value="">Seleccione Nacionalidad</option>
	            <?php
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nacionalidad FROM paises ORDER BY nacionalidad";
	            	
	            	$resultado = resultadoConsulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $nacionalidad ? "selected" : ""?>><?php echo $row["nacionalidad"]; ?></option>
  				<?php
  					endwhile;

  					$consulta = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["nacionalidad"])):
	            ?>
	            	<p class="error"><?php echo $errores["nacionalidad"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo departamento del empleado -->
	            <select id="departamento" name="departamento">
	            	<option value="">Seleccione Departamento</option>
	            <?php
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM departamentos ORDER BY nombre";
	            	
	            	$resultado = resultadoConsulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $departamento ? "selected" : ""?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  					
  					$consulta = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["departamento"])):
	            ?>
	            	<p class="error"><?php echo $errores["departamento"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Botón submit -->
	            <input type="submit" value="Guardar">
	        </p>
	    </form>
  	<?php
  		else:
  			$conexion = conectarPDO($host, $user, $password, $bbdd);
  			
			// consulta a ejecutar
			$insert = "insert into empleados (nombre, apellidos, email, salario, hijos, pais_id, departamento_id) values (:nombre,  :apellidos, :email, :salario, :hijos, :nacionalidad, :departamento)";

			// preparar la consulta
			$consulta = $conexion->prepare($insert);

			$consulta->bindParam(':nombre', $nombre);
			$consulta->bindParam(':apellidos', $apellidos); 
			$consulta->bindParam(':email', $email);
			$consulta->bindParam(':salario', $salario); 
			$consulta->bindParam(':hijos', $hijos);
			$consulta->bindParam(':nacionalidad', $nacionalidad); 
			$consulta->bindParam(':departamento', $departamento);
			
			// ejecutar la consulta y captura de la excepcion
			try 
			{
				$consulta->execute();
			}
			catch (PDOException $exception)
			{
           		exit($exception->getMessage());
        	}

			$consulta = null;

        	$conexion = null;

        	// redireccionamos al listado de departamentos
  			header("Location: listado.php");
  			
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de empleados</a>
        </div>
   </div>
</body>
</html>