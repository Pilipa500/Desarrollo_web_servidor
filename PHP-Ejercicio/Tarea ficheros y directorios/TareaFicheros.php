<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /***************************************
     * 
     * Acceso a ficheros
     * 
     * 
     ****************************************/
    //Obtener el directorio actual
    $directorio = getcwd();

    //Mostrar
    echo "El directorio actual es: $directorio.";

    $nuevoDir = "C:";
    //Cambiar a la ruta C:/
    if (chdir("$nuevoDir")) {
        echo "<p>Se ha entrado en $nuevoDir </p>";
    } else {
        echo "<p>No ha entrado en $nuevoDir</p>";
    };

    //crear un directorio
    if (file_exists("DirPruebas")) {
        echo "Ya existe";
    } else {
        //No exite, la creo.
        if (mkdir("DirPruebas")) {
            echo "He creado el directorio \"DirPruebas\"";
        } else {
            echo "Error al crear el directorio \"DirPruebas\"";
        }
    }

    //Entrar en DirPrueba (version basica)/
    chdir ("DirPruebas");

    //Entra en DirPruebas (version control errores)
    if (chdir("DirPruebas")) {
        echo "<p>Se ha entrado en DirPruebas </p>";
    } else {
        echo "<p>No ha entrado en DirPruebas</p>";
        echo "<p>Seguimos en el directorio". getcwd()."</p>";
    }
  
    //leer directorio
    $arrFicheros =scandir(getcwd());

    echo "<pre>";
    print_r($arrFicheros);
    echo "</pre>";

    /***************************************
     * 
     * Listar fichero que contienen un 2 en nombre.
     * Si no existe, crear uno para poder realizar la prueba
     * 
     * 
     ****************************************/
    //Patrón
    $patron = "/2+/";
    $resultados=array();
    
     foreach ($arrFicheros as $nomFich) {
       if (preg_match($patron, $nomFich)) {
           $resultados[]=$nomFich;
       }
    }

    if(!empty($resultados)){
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";
    }

    else{
        //Mensaje
        echo"Creamos un nuevo fichero porque el directorio está vacio";

        //creamos fichero
        if($file= fopen("FicheroPrueba.txt", 'w')){

        

        //Introduce un mensaje
        fwrite($file, "ESto es el texto del fichero prueba.");

        //Cerrar el fichero

        fclose($file);
        }else{
            echo"Error el directorio estaba vacio";
        }
    }
     /***************************************
     * 
     * Leer fichero de texto
     * 
     * 
     ****************************************/
    //comprobar que el fichero existe 
    $fichero = "Leeme.txt";
    if(file_exists($fichero)){

        //si existe lo leo
        if($file= fopen($fichero, 'r'))
        {
            //se abre correctamente, leo
            while (!feof($file)){//se comprueba EOF, fin de fichero
                //se recupera una linea
                $linea= fgets($file);
                echo "<p>$linea</p>";
            }
        //se cierra el fichero
        fclose($file);
        }
        else {
            echo "No se ha podido abrir el fichero";
        }
    }
    ?>

</body>

</html>