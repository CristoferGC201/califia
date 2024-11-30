<?php
include_once '../../config/database.php';

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $edad = (int)$_POST['edad'];

    // Validación básica
    if (empty($nombre) || empty($email) || empty($password) || empty($edad)) {
        header("Location: ../views/registro.php?mensaje=Todos los campos son obligatorios.&tipo=error");
        exit();
    }

    // Verifica que el correo no esté registrado
    $sql = "SELECT id FROM Usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../views/registro.php?mensaje=El correo ya está registrado.&tipo=error");
        exit();
    }

    // Cifra la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserta el nuevo usuario en la base de datos
    $sql = "INSERT INTO Usuarios (nombre, email, password, edad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $hashedPassword, $edad);

    if ($stmt->execute()) {
        header("Location: ../views/registro.php?mensaje=Usuario registrado con éxito.&tipo=success");
    } else {
        header("Location: ../views/registro.php?mensaje=Error al registrar el usuario.&tipo=error");
    }
    exit();
}
?>
