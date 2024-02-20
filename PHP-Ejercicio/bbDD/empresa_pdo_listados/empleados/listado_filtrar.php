<?php
//0. Inclusión de ficheros php
//1. Conexión a bbdd
//2. Definir consulta
//3. Realizar/Ejecutar consulta
//   Selección/inserción/borrado/
//4. Extraer/interpretar la información
    //while(que leerá todo los datos que nos vienen)
//5. Borrar bbdd
    //Desconectar

    // Incluye ficheros de variables y funciones
    require_once("../utiles/funciones.php");
    require_once("../utiles/variables.php");

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
        $texto = obtenerValorCampo('texto');
        $salarioMinimo = obtenerValorCampo('salarioMinimo');
        $salarioMaximo = obtenerValorCampo('salarioMaximo');
        $hijos = obtenerValorCampo('hijos');
        
        // Crea las condiciones de filtrado
        $condicionesWhere = "";
        $condiciones=[];
        
        //condición del texto
        if ($texto!="")
        {
          $condiciones[]= "e.nempleado like '% $texto %' OR e.apellidos like '%$texto%' OR e.email like '%$texto%'";//filtro para buscar en texto
        }
        //condiciones del salario REVISAR ESTAS CONDICIONES
        elseif ($salarioMaximo!="" && $salarioMinimo!="")
        {
          $condiciones[] = "salario <= $salarioMaximo";
        }
        elseif ($salarioMinimo!="")
        {
          $condiciones[] = "salario <= $salarioMinimo";
        }

        //condiciones hijos
        if($hijos!="")
        {
          $condiciones[] = "hijos = $hijos";
        }
       //Generar el string de condiciones WHERE
       //si el numero de condiciones es mayor que 0
        if(count($condiciones) >0){
          //inicio del where
          $condicionesWhere = "WHERE";

          //recorremos condiciones añadiendolas una a una
          foreach($condiciones as $contador => $valorCondicion){
            //Concateno la condicion de cada posición del array
            $condicionesWhere .= $valorCondicion;
            if($contador < count($condiciones)-1)
            {
              $condicionesWhere.= " AND ";
            }
          }
        }

        // Realiza la consulta a ejecutar en la base de datos en una variable
        $consulta = "SELECT e.id, e.nombre nempleado, e.apellidos, e.email, e.hijos, e.salario, 
                            p.nacionalidad,
                            d.nombre ndepart,
                            s.nombre nsede
                        FROM empleados e INNER JOIN departamentos d ON e.departamento_id = d.id 
                                         INNER JOIN sedes s      ON s.id = d.sede_id
                                         INNER JOIN paises p       ON p.id = e.pais_id
                        $condicionesWhere";

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        $resultado = resultadoConsulta($conexion, $consulta);
 
        // Muestra los criterios de búsqueda
        
      
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
             while($fila = $resultado->fetch(PDO::FETCH_OBJ)):
            ?>
            <tr>
            <td><?php echo $fila->nempleado;?> </td>
            <td><?php echo $fila->apellidos;?></td>
            <td><?php echo $fila->email;?></td>
            <td><?php echo $fila->hijos;?></td>
            <td><?php echo $fila->salario;?></td>
            <td><?php echo $fila->nacionalidad;?></td>
            <td><?php echo $fila->ndepart;?></td>
            <td><?php echo $fila->nsede;?></td>
        </tr>
        <?php
    endwhile;
    ?>

            
              
          </tbody>
        </table>
      
      <div class="contenedor">
          <div class="enlaces">
              <a href="../index.html">Volver a página de listados</a>
          </div>
      </div>

    <?php

        // Libera el resultado y cierra la conexión
        $resultado = null;
        $conexion = null;
    
    ?>
</body>
</html>
