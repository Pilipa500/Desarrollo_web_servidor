<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <?php
    // Función para validar la edad con un patrón
    function validarEdad($edad) {
        return preg_match("/^(1[8-9]|[2-5][0-9]|6[0-5])$/", $edad);
    }

    // Función para validar el correo electrónico con un patrón
    function validarEmail($email) {
        return preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
    }

    // Función para guardar la información del usuario en el archivo de texto
    function guardarUsuario($usuario, $archivo) {
        file_put_contents($archivo, $usuario, FILE_APPEND | LOCK_EX);
    }

    // Manejar el envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $password = $_POST["password"];
        $confirmarPassword = $_POST["confirmarPassword"];

        // Validar email y edad con patrones
        if (validarEmail($email) && validarEdad($edad) && $password == $confirmarPassword) {
            // Crear una cadena con la información del usuario
            $usuario = "$email, $nombre, $edad, $password\n";

            // Guardar el usuario en el archivo
            guardarUsuario($usuario, "usuarios.txt");

            // Mensaje de registro exitoso
            echo "<p>Registro exitoso. Usuario registrado correctamente.</p>";
        } else {
            // Mensaje de error
            echo "<p>Error en el registro. Por favor, verifique los datos ingresados.</p>";
        }
    }
    ?>

    <form action="registro.php" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="edad">Edad:</label>
        <input type="text" name="edad" required pattern="^(1[8-9]|[2-5][0-9]|6[0-5])$"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="confirmarPassword">Confirmar Contraseña:</label>
        <input type="password" name="confirmarPassword" required><br>

        <input type="submit" value="Sign in">
    </form>
</body>
</html>
