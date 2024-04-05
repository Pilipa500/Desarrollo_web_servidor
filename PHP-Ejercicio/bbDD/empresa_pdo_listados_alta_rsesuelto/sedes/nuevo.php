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
    <title>Alta nueva sede</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta de una nueva sede</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$sede = "";
    	$direccion = "";

    	if ($_SERVER["REQUEST_METHOD"]=="POST")
    	{
		    
		    $comprobarValidacion = true;
		    $longitudMinimaSede = 3;
		    $longitudMaximaSede = 50;
		    $longitudMinimaDireccion = 10;
		    $longitudMaximaDireccion = 255;
		    
		    // Obtenemos el campo del nombre de la sede y dirección
		    $sede = obtenerValorCampo("nombre");
		    $direccion = obtenerValorCampo("direccion");

		    
	    	//-----------------------------------------------------
	        // Validaciones
	        //-----------------------------------------------------
	        // Nombre de la sede
	        if (!validarLongitudCadena($sede, $longitudMinimaSede ,$longitudMaximaSede)) 
	        {
	            $errores["sede"] = "La sede de la empresa tiene que tener una longitud mínima de $longitudMinimaSede y máxima de $longitudMaximaSede caracteres.";
	        	$sede = "";
	        }
	        // Dirección de la sede
	        if (!validarLongitudCadena($direccion, $longitudMinimaDireccion, $longitudMaximaDireccion)) 
	        {
	            $errores["direccion"] = "La direccion de la empresa tiene que tener una longitud mínima de $longitudMinimaDireccion y máxima de $longitudMaximaDireccion caracteres.";
	            $direccion = "";
	        }
    	}
  	?>

  	<?php
  		if (!$comprobarValidacion || count($errores) > 0):
  
  	?>
  		<form action="<?php print htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	<p>
	            <!-- Campo nombre de la sede -->
	            <input type="text" name="nombre" placeholder="Sede" value="<?php echo $sede ?>">
	            <?php
	            	if (isset($errores["sede"])):
	            ?>
	            	<p class="error"><?php echo $errores["sede"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <!-- Campo dirección de la sede -->
	            <input type="text" name="direccion" placeholder="Dirección" value="<?php echo $direccion ?>">
	            <?php
	            	if (isset($errores["direccion"])):
	            ?>
	            	<p class="error"><?php echo $errores["direccion"] ?></p>
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
			$insert = "insert into sedes (nombre, direccion) values (:nombre, :direccion)";

			// preparar la consulta
			$consulta = $conexion->prepare($insert);

			$consulta->bindParam(':nombre', $sede); 
			$consulta->bindParam(':direccion', $direccion); 

			// ejecutar la consulta 
			$consulta->execute();

			$consulta = null;

        	$conexion = null;

        	// redireccionamos al listado de sedes
  			header("Location: listado.php");
  			
    	endif;
    ?>
   <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de sedes</a>
        </div>
   </div>
</body>
</html>