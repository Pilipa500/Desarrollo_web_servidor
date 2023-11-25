<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar expresiones regulares</title>
    <style>
      .verde{
        color:green;
      }
      .rojo{
        color:red;
      }
    </style>
    <p>Desarrollar un patrón para validar las siguientes cadenas que se solicitan:</p>
    <ol>
        <li>Un número negativo</li>
        <li>Número de teléfono</li>
        <li>Dni con la letra correspondiente</li>
        <li>Una dirección ip</li>
        <li>Comienza con c ó C y no tiene más de 5 caracteres</li>
        <li>Validar una variable php</li>
        <li>Contener mayúsculas en cualquier posición, excepto la primera y última</li>
        <li>Validar un dirección http ó https</li>
        <li>Validar una dirección de correo para gmail.com, outlook.es y g.educaand.es</li>
    </ol>
</head>

<body>
    <form action="#" method="post">
        <p>Pon un cadena: <input type="text" name="num"> </p>
        <input type="submit" name="boton" value="Comprobar">
    </form>

    <?php

    if (isset($_POST['boton'])) {
        $cadena = $_POST['num'];
       //1. Un cadena negativo
       echo "<p><b>1. - Validar si es un número negativo</b></p>";
        $patron_numero_negativo = "/^-[0-9]+$/";

        if (is_numeric($cadena)) {

            // comprobar patron
            if(preg_match($patron_numero_negativo , $cadena))
            {
                echo "<p class='verde'>$cadena es un número negativo</p>";
            }
            else{
                echo "<p class='verde'>$cadena es un número positivo</p>";
            }
            
        } else {
            echo "Debes introducir un cadena";
        }
    }
/************************************************ */
/* 2. Si es un numero de telefono 
          ^  que empiece por 6, 7, 9
       \d{8} le sigan 8 cifras
          $    termina la cadena
            ***********************/
            echo "<p><b>2. - Validar si es un número de teléfono </b></p>";
            $patron_telefono = "/^[679]\d{8}$/"; // Empieza por 6, 7, o 9 y tiene 8 cifras

            if (preg_match($patron_telefono, $cadena)) {
                echo "<p class='verde'>$cadena es un número de teléfono válido</p>";
            } else {
                echo "<p class='rojo'>$cadena no es un número de teléfono válido</p>";
            }   
 /**************************************************
  ***
  *  3. DNI con la letra correspondiente (ejemplo: 12345678A)
            ^ empieza
            \d cualquier cadena {8} veces o 8 numeros
            [A-Z] cualquier letra mayúsculas
  *
  ****************************************************/ 
  echo "<p><b>3. Validar si es un DNI con la letra correspondiente</b></p>"; 
  $patron_dni = "/^\d{8}[A-Z]$/";

  if (preg_match($patron_dni, $cadena)) {
    echo "<p class='verde'>$cadena es un DNI válido</p>";
} else {
    echo "<p class='rojo'>$cadena no es un DNI válido</p>";
}
      /******************************************************
       *    4. Validar una dirección ip
       *      ^  empieza
       *      (25[0-5]|2[0-4][0-9]|[0-1]?[0-9]?[0-9]) Representa un octeto válido de la dirección IP, que puede ser un número entre 0 y 255. Se utiliza una expresión regular alternativa (|) para permitir tres rangos de números posibles.
       *      (\.){3} Representa los tres puntos decimales que separan los cuatro octetos de la dirección IP.
       *      (25[0-5]|2[0-4][0-9]|[0-1]?[0-9]?[0-9]) Representa el último octeto
       *      $ final de la cadena
       * 
       ******************************************************/
      echo "<p><b>4. - Validar si es una dirección ip</b></p>";
      $patron_ip = '/^((25[0-5]|2[0-4][0-9]|[0-1]?[0-9]?[0-9])\.){3}(25[0-5]|2[0-4][0-9]|[0-1]?[0-9]?[0-9])$/';

      if (preg_match ($patron_ip, $cadena)){
        echo "<p class='verde'>$cadena es una ip válida </p>";
      }else {
        echo "<p class='rojo'>$cadena no es una ip válida</p>";
      }
      

           /************************************************ */
            /*6. Validar una variable php 
                      ^  que empiece
                     [_a-zA-Z]  subrayado o letra
                      .*   cualquier cadena de caracteres
                      $  termina la cadena
            **************************************************/
            echo "<p><b>6. - Validar si es una variable php</b></p>";
        $patron_php = '/^[_a-zA-Z].*$/';

        if (preg_match ($patron_php, $cadena)) {
          echo "<p class='verde'>$cadena es una variable php válida</p>";
        }else {
          echo "<p class 'rojo'>$cadena no es una php válida</p>";
        }
          /******************************************************
           *  7. Contener mayúsculas en cualquier posición, exepto
           *     la primera y la última
           *             ^  que empiece
           *          [a-z]  por una minúscula
           *       [A-Za-Z*] seguida por cualquier combinacion de may y minuscu
           *          [a-z] por una minúscula
           *            $   termina la cadena
           * 
           *  
           *******************************************************/
             echo "<p><b>7. - ¿Contener mayúsculas en cualquier posición, excepto la primera y última?</b></p>";

             //establecer el patrón
              $patron = '/^[a-z][A-Za-z]*[a-z]$/';

              if(preg_match($patron, $cadena)){
                echo '<p class="verde">Cumple</p>';
              }else{
                echo '<p class="rojo">No cumple</p>';
              }
          /************************************************ */
            /*8. Validar una direccion http o htpps 
                      ^  que empiece
                http    que tenga http o 
                    s?     que tenga o no s
                     ://    que tenga : //
                     .+    que tenga algo
                      $  termina la cadena
            **************************************************/
            
            echo "<p><b>8. - ¿Validar un dirección http ó https?</b></p>";

            //establecer el patrón
             $patron = '#^http?://.+$#';//se usan las almohadillas para empezar y finalizar para no confundir con tanta //

             if(preg_match($patron, $cadena)){
               echo '<p class="verde">Cumple</p>';
             }else{
               echo '<p class="rojo">No cumple</p>';
             }
    /************************************************ */
          /*  9.Validar una dirección de correo para mail@gmail.com, mail@outlook.es y mail@g.educaand.es 
                      ^  que empiece
                    .+   lo que sea
                     @   que tenga @
(gmail.com|outlook.com|g.educaand.es)     gmail.com, outlook.com, g.educaand.es
                      $  termina la cadena
    **************************************************/
            
            echo "<p><b>9. - ¿Validar una dirección de correo para gmail.com, outlook.es y g.educaand.es?</b></p>";

            //establecer el patrón
             $patron = '/^.+@(gmail.com|outlook.com|g.educaand.es)$/';

             if(preg_match($patron, $cadena)){
               echo '<p class="verde">Cumple</p>';
             }else{
               echo '<p class="rojo">No cumple</p>';
             }
            
    ?>
</body>

</html>