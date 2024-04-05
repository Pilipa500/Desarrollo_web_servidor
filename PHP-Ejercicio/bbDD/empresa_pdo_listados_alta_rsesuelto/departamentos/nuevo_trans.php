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
    <script type="text/javascript">
        function mostrarSede() 
        {
        	document.getElementById("altaSede").value = 1;
        	document.getElementById("nuevaSede").style.display = "inline";
        }
    </script>
</head>
<body>
    <h1>Alta de un nuevo departamento/sede</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$departamento = "";
    	$presupuesto = "";
    	$sede = "";
    	$altaSede = "";
    	$nombreSede = "";
    	$direccionSede = "";

    	if ($_SERVER["REQUEST_METHOD"]=="POST")
    	{
		    
		    $comprobarValidacion = true;
		    $longitudMinimaDepartamento = 3;
			$longitudMaximaDepartamento = 100;
			$longitudMinimaSede = 3;
		    $longitudMaximaSede = 50;
		    $longitudMinimaDireccion = 10;
		    $longitudMaximaDireccion = 255;
		    
		    // Obtenemos el campo del nombre de la sede y dirección
		    $departamento = obtenerValorCampo("nombre");
		    $presupuesto = obtenerValorCampo("presupuesto");
		    $sede = obtenerValorCampo("sede");
		    $altaSede = obtenerValorCampo("altaSede");
			$nombreSede = obtenerValorCampo("nombreSede");
			$direccionSede = obtenerValorCampo("direccionSede");
		    
	    	//-----------------------------------------------------
	        // Validaciones
	        //-----------------------------------------------------
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
	        	if ($altaSede == "")
	        	{
	        		$errores["sede"] = 'El nombre de la sede es obligatoria.';
	            	$sede = "";
	        	} 
	        	else 
	        	{
	            	// Validamos los campos de una nueva sede
					// Nombre de la sede
			        if (!validarLongitudCadena($nombreSede, $longitudMinimaSede ,$longitudMaximaSede)) 
			        {
			            $errores["nombreSede"] = "La sede de la empresa tiene que tener una longitud mínima de $longitudMinimaSede y máxima de $longitudMaximaSede caracteres.";
			        	$nombreSede = "";
			        }
			        // Dirección de la sede
			        if (!validarLongitudCadena($direccionSede, $longitudMinimaDireccion, $longitudMaximaDireccion)) 
			        {
			            $errores["direccionSede"] = "La direccion de la empresa tiene que tener una longitud mínima de $longitudMinimaDireccion y máxima de $longitudMaximaDireccion caracteres.";
			            $direccionSede = "";
			        }

	        	}
	            
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
  				</select> - <a href="javascript: void(0);" onclick="mostrarSede();">Añadir Sede</a>
  				<fieldset id="nuevaSede" <?php echo $altaSede == "" ? 'style="display:none"' : "" ?>>
  					<legend>Nueva Sede</legend>
  					<!-- Campo para controlar el alta de una nueva sede -->
			        <input type="hidden" id="altaSede" name="altaSede" value="<?php echo $altaSede ?>">
  					<p>
			            <!-- Campo nombre de la sede -->
			            <input type="text" name="nombreSede" placeholder="Sede" value="<?php echo $nombreSede ?>">
			            <?php
			            	if (isset($errores["nombreSede"])):
			            ?>
			            	<p class="error"><?php echo $errores["nombreSede"] ?></p>
			            <?php
			            	endif;
			            ?>
			        </p>
	        		<p>
			            <!-- Campo dirección de la sede -->
			            <input type="text" name="direccionSede" placeholder="Dirección" value="<?php echo $direccionSede ?>">
			            <?php
			            	if (isset($errores["direccionSede"])):
			            ?>
			            	<p class="error"><?php echo $errores["direccionSede"] ?></p>
			            <?php
			            	endif;
			            ?>
			        </p>
  				</fieldset>
  				
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
	            <input type="submit" value="Guadar">
	        </p>
	    </form>
  	<?php
  		else:
  			$conexion = conectarPDO($host, $user, $password, $bbdd);
  			// Tenemos que dar de alta la sede antes de crear el departamento
  			try {
  				$conexion->beginTransaction();

	  			if ($altaSede != "")
	  			{
	  				$insert = "insert into sedes (nombre, direccion) values (:nombreSede, :direccionSede)";

					// preparar la consulta
					$consulta = $conexion->prepare($insert);

					$consulta->execute(array(':nombreSede' => $nombreSede, ':direccionSede' => $direccionSede));
					
					//Obtenemos el nuevo id de la sede insertada
					$sede = $conexion->lastInsertId();
					// echo  ($sede);
					$consulta = null;
	  			}

	  			// consulta a ejecutar de los departamentos
				$insert = "insert into departamentos (nombre, presupuesto, sede_id) values (:nombre, :presupuesto, :sede_id)";

				// preparar la consulta
				$consulta = $conexion->prepare($insert);

				$consulta->bindParam(':nombre', $departamento);
				$consulta->bindParam(':presupuesto', $presupuesto);
				$consulta->bindParam(':sede_id', $sede);

				// ejecutar la consulta 
				$consulta->execute();

				$consulta = null;

				$conexion->commit();
	  		
	  		} 
	  		catch (Exception $e)
	  		{
  				echo  "<p>No se ha podido crear la sede y departamento correctamente.</p>";
  				$conexion->rollback();
  				exit();
			}


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