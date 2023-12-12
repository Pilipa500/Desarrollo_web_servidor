<?php
// Iniciar sesión
session_start();

// Verificar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener los datos del formulario
    $email = isset($_GET["mail"]) ? $_GET["mail"] : "";
    $contrasenia = isset($_GET["contrasenia"]) ? $_GET["contrasenia"] : "";

    // Verificar las credenciales
    if ($email == "usuario@gmail.com" && $contrasenia == "1234") {
        // Crear una sesión y guardar el array "datos"
        $_SESSION["datos"] = array("email" => $email, "password" => $contrasenia);

        // Redirigir a la página de portal
        header("Location: portal.php");
        exit();
    } else {
        // Mostrar mensaje de login incorrecto
        echo "<p>Login incorrecto. Por favor, verifique las credenciales.</p>";

        // Crear una cookie con el email durante 10 segundos
        setcookie("email_cookie", $email, time() + 10, "/");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <form action="portal.php" method="get">
        <p>E-mail:<br> <input type="email" name="mail" value="<?php echo isset($_COOKIE['email_cookie']) ? $_COOKIE['email_cookie'] : ''; ?>"><br>
        <p>Contraseña:<br><input type="password" name="contrasenia"><br>
        <button>Log in</button>
    </form>
</body>
</html>
