<?php
session_start(); // Inicia la sesión para manejar datos de usuario
include_once '../../config/database.php'; // Conexión a la base de datos

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar si el usuario existe
    $sql = "SELECT id, nombre, password FROM Usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $usuario['password'])) {
            // Credenciales correctas
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];

            // Redirige al dashboard o página principal
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Contraseña incorrecta
            $error = "Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        $error = "No se encontró ningún usuario con ese correo.";
    }
} else {
    $error = "Error al enviar el formulario.";
}
?>
