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
    <h1>Alta de un nuevo departamento</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$departamento = "";
    	$presupuesto = "";
    	$sede = "";

    	if ($_SERVER["REQUEST_METHOD"]=="POST")
    	{
		    
		    $comprobarValidacion = true;
		    $longitudMinimaDepartamento = 3;
			$longitudMaximaDepartamento = 100;
		    
		    // Obtenemos el campo del nombre de la sede y dirección
		    $departamento = obtenerValorCampo("nombre");
		    $presupuesto = obtenerValorCampo("presupuesto");
		    $sede = obtenerValorCampo("sede");
		    
	    	//-----------------------------------------------------
	        // Validaciones
	        //-----------------------------------------------------
	        // Nombre del departamento
	        if (!validarLongitudCadena($departamento, $longitudMinimaDepartamento ,$longitudMaximaDepartamento)) 
	        {
	            $errores["departamento"] = "El nombre del departamento tiene que tener una longitud mínima de $longitudMinimaDepartamento y máxima de $longitudMaximaDepartamento caracteres.";
	            $departamento = "";
	        } 
	        else 
	        {
	        	// Comprobar que no exita un departamento con ese nombre
	        	$conexion = conectarPDO($host, $user, $password, $bbdd);

	        	// consulta a ejecutar
				$select = "SELECT * FROM departamentos where nombre = :nombre";

				// preparar la consulta
				$consulta = $conexion->prepare($select);

				$consulta->bindParam(':nombre', $departamento); 

				// ejecutar la consulta 
				$consulta->execute();

				// comprobamos si tenemos más de un registro
				if ($consulta->rowCount() > 0)
				{
					$errores["departamento"] = "Ya existe un departamento con ese nombre.";
				}

				$consulta = null;

        		$conexion = null;

	        }

	        // Presupuesto del departamento
	        if (!validarEnteroPositivo($presupuesto)) 
	        {
	            $errores["presupuesto"] = "El presupuesto debe ser un número entero positivo.";
	            $presupuesto = "";
	        } 

	        // Nombre de la sede
	        if (!validarEnteroPositivo($sede))
	        {
	            $errores["sede"] = "El nombre de la sede es obligatoria.";
	            $sede = "";
	        }
	        else
	        {

	        	// Comprobar que no exita un departamento con ese nombre
	        	$conexion = conectarPDO($host, $user, $password, $bbdd);

	        	// consulta a ejecutar
				$select = "SELECT * FROM sedes where id = :id";

				// preparar la consulta
				$consulta = $conexion->prepare($select);

				$consulta->bindParam(':id', $sede); 

				// ejecutar la consulta 
				$consulta->execute();

				// comprobamos si algún registro 
				if ($consulta->rowCount() == 0)
				{
					$errores["sede"] = 'No ha seleccionado una sede correcta.';
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
	            <!-- Campo nombre del departamento -->
	            <input type="text" name="nombre" placeholder="Departamento" value="<?php echo $departamento ?>">
	            <?php
	            	if (isset($errores["departamento"])):
	            ?>
	            	<p class="error"><?php echo $errores["departamento"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo presupuesto del departamento -->
	            <input type="number" name="presupuesto" placeholder="Presupuesto" value="<?php echo $presupuesto ?>">
	            <?php
	            	if (isset($errores["presupuesto"])):
	            ?>
	            	<p class="error"><?php echo $errores["presupuesto"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo nombre de la sede -->
	            <select id="sede" name="sede">
	            	<option value="">Seleccione Sede</option>
	            <?php
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM sedes";
	            	
	            	$resultado = resultadoConsulta($conexion, $consulta);

  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $sede ? "selected" : "" ?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  					
  					$resultado = null;

        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["sede"])):
	            ?>
	            	<p class="error"><?php echo $errores["sede"] ?></p>
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
			$insert = "insert into departamentos (nombre, presupuesto, sede_id) values (:nombre, :presupuesto, :sede_id)";

			// preparar la consulta
			$consulta = $conexion->prepare($insert);

			$consulta->bindParam(':nombre', $departamento);
			$consulta->bindParam(':presupuesto', $presupuesto);
			$consulta->bindParam(':sede_id', $sede);

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
            <a href="listado.php">Volver al listado de departamentos</a>
        </div>
   </div>
</body>
</html>