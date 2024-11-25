<?php
// Incluir la conexión a la base de datos y funciones necesarias
include 'db.php';
include 'functions.php';

// Iniciar sesión y procesar formulario
session_start();

// Si el servidor recibe un POST, procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    $email = sanitizeInput($_POST['email']);
    $confirm_password = sanitizeInput($_POST['confirm_password']);

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hash de la contraseña

        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "El correo electrónico ya está registrado.";
        } else {
            $sql = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES ('$username', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['flash_message'] = "Registro exitoso. Ahora puedes iniciar sesión.";
                header("Location: /califia/Proyecto/registro/Inicio%20de%20sesion/demas/login.php");
                exit();
            } else {
                $error = "Error en el registro: " . $conn->error;
            }
        }
    } else {
        $error = "Las contraseñas no coinciden.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Registro</title>
    <link rel="stylesheet" href="/califiaV2.0/Proyecto/registro/inicio de sesion/demas/estilos.css">
</head>
<body>
    <div class="registro-contenedor">
        <h1>Registro de Usuario</h1>
        <form method="POST" action="">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirma tu contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <input type="submit" value="Registrarse">
        </form>

        <div class="pie">
            <p>Registro © 2009 | Powered by Nostalgia</p>
        </div>
    </div>
    <script src="/califia/Proyecto/registro/Includes/encrptar.js"></script>
</body>
</html>
