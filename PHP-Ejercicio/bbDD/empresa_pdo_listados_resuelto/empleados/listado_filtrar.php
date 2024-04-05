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
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Listado de empleados (filtrar por salario y/o número de hijos)</h1>
    <div style="margin-bottom: 1em">
      <fieldset style="width:50%">
        <legend>Filtrado</legend>
        <form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <p><label for="texto">Texto <input type="text" name="texto"></label>
          </p>
          <p><label for="salarioMinimo">Salario mínimo <input type="number" step="0.01" name="salarioMinimo" min="0"></label>
          <label for="salarioMaximo">Salario Máximo <input type="number" step="0.01" name="salarioMaximo" min="0"></label>
          </p>
          <p>Hijos: <select name="hijos">
            <option value="">Seleccione el número de hijos</option>
            <?php
              for ($i=0; $i<=10; $i++):
            ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
              endfor;
            ?>
          </select>
          </p>
          <input type="submit" value="Filtrar">
        </form>
      </fieldset>
    </div>
      <?php
        
        // Realiza la conexion a la base de datos a través de una función 
        $conexion = conectarPDO($host, $user, $password, $bbdd);

        // Obtenemos los valores del formulario de filtrado
        $texto = obtenerValorCampo("texto");
        $salarioMinimo = obtenerValorCampo("salarioMinimo");
        $salarioMaximo = obtenerValorCampo("salarioMaximo");
        $hijos = obtenerValorCampo("hijos");

        $condicionWhere = "";
        $condiciones = [];

        // Creamos la condición del texto
        if ($texto!="")
        {
          $condiciones[] = "(e.nombre like '%$texto%' OR apellidos like '%$texto%' OR email like '%$texto%')";
        } 

        // Creamos la condición del salario
        if ($salarioMinimo!="" && $salarioMaximo!="") 
        {
          $condiciones[] = " salario between $salarioMinimo and $salarioMaximo";
        } 
        elseif ($salarioMinimo!="")
        {
          $condiciones[] = "salario >= $salarioMinimo";
        } 
        elseif ($salarioMaximo!="")
        {
          $condiciones[] = "salario <= $salarioMaximo";
        } 

        // Creamos la condición del número de hijos
        if ($hijos!="") 
        {
          $condiciones[] = "hijos=$hijos";
        } 

        if (count($condiciones) > 0) 
        {
          $condicionWhere = "WHERE ";
          foreach ($condiciones as $contador => $condicion) 
          {
            // Si ponemos primero la condición y depués el AND
            $condicionWhere .= $condicion;
            if ($contador < count($condiciones) -1) 
            {
              $condicionWhere .= " AND ";
            }
    
          }
        }
        
        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT e.id, e.nombre nombre, apellidos, email, hijos, salario, nacionalidad, d.nombre departamento, s.nombre sede
        FROM empleados e 
        INNER JOIN departamentos d ON 
        d.id = e.departamento_id
        INNER JOIN sedes s ON 
        s.id = d.sede_id
        INNER JOIN paises p ON
        p.id = e.pais_id 
        $condicionWhere";

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);

        // Obtenemos el número de registros de la consulta
        $numRegistros = $resultado->rowCount();
 
        // Mostramos los criterios de búsqueda
        if ($texto!= "" || $salarioMinimo!= "" || $salarioMaximo!="" || $hijos!=""):
      ?>
          <h3>Criterios de búsqueda:</h3>
          <ul>
            <!-- Texto en campo de nombre, apellidos o email -->
            <?php
              if ($texto!= ""):
            ?>
              <li>Texto en nombre, apellidos o email: <?php echo $texto;?></li>
            <?php
              endif;
            ?>
            <!-- Salario Mínimo -->
            <?php
              if ($salarioMinimo!= ""):
            ?>
              <li>Salario Mínimo: <?php echo $salarioMinimo;?></li>
            <?php
              endif;
            ?>
            <!-- Salario Máximo -->
            <?php
              if ($salarioMaximo!= ""):
            ?>
              <li>Salario Máximo: <?php echo $salarioMaximo;?></li>
            <?php
              endif;
            ?>
            <!-- Número de Hijos -->
            <?php
              if ($hijos!= ""):
            ?>
              <li>Número de hijos: <?php echo $hijos;?></li>
            <?php
              endif;
            ?>
          </ul>
      <?php
        endif;

        if ($numRegistros==0):
      ?>   
          <p>No hay registros con los criterios de búsqueda introducidos.</p>
      
      <?php

        else:

      ?> 
      
        <table border="1" cellpadding="10">
          <thead>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Correo electrónico</th>
              <th>Nº hijos</th>
              <th>Salario</th>
              <th>Nacionalidad</th>
              <th>Departamento</th>
              <th>Sede</th>
          </thead>
          <tbody>
              <?php
                 
                  // para mostrar todos los datos
                  while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)):
              ?>
                  <tr>
                      <td><?php echo $registro["nombre"]; ?></td>
                      <td><?php echo $registro["apellidos"]; ?></td>
                      <td><?php echo $registro["email"]; ?></td>
                      <td><?php echo $registro["hijos"]; ?></td>
                      <td><?php echo $registro["salario"]; ?> €</td>
                      <td><?php echo $registro["nacionalidad"]; ?></td>
                      <td><?php echo $registro["departamento"]; ?></td>
                      <td><?php echo $registro["sede"]; ?></td>
                  </tr>
                  </tr>
              <?php
                  endwhile;
              ?>
          </tbody>
        </table>
      <?php

        endif;
      
      ?>
      <div class="contenedor">
          <div class="enlaces">
              <a href="../index.html">Volver a página de listados</a>
          </div>
      </div>

    <?php
        $consulta = null;

        $conexion = null;
    ?>
</body>
</html>
