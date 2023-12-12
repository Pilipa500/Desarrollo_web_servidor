<?php
// Iniciar sesión
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION["datos"])) {
    // Si no hay sesión activa, redirigir a la página de login
    header("Location: login.php");
    exit();
}

// Leer la información de la sesión
$usuarioActual = $_SESSION["datos"];

// Leer la información de usuarios del archivo
$usuariosRegistrados = [];
$archivoUsuarios = "usuarios.txt";

if (file_exists($archivoUsuarios)) {
    // Leer el contenido del archivo
    $lineasUsuarios = file($archivoUsuarios);

    // Recorrer las líneas y crear un array con la información de los usuarios
    foreach ($lineasUsuarios as $linea) {
        $datosUsuario = explode(',', $linea);
        $usuariosRegistrados[] = array("email" => trim($datosUsuario[0]), "nombre" => trim($datosUsuario[1]), "edad" => trim($datosUsuario[2]));
    }
    //cierrro la sesión
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Usuario</title>
</head>
<body>
    <form action="#" method="get">
        <fieldset>
            <h1>Portal de usuario</h1>
            <p>Hola, tu clave es <?php echo $usuarioActual["password"]; ?></p>
            <table border="1">
                <tr>
                    <th>Correo electrónico</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>
                <?php
                // Mostrar la información de los usuarios registrados
                foreach ($usuariosRegistrados as $usuario) {
                    echo "<tr>";
                    echo "<td>{$usuario['email']}</td>";
                    echo "<td>{$usuario['nombre']}</td>";
                    echo "<td>{$usuario['edad']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <button>Leer usuarios</button>
            <a href="cerrar_sesion.php"><button type="button">Cerrar sesión</button></a>
        </fieldset>
    </form>
</body>
</html>
