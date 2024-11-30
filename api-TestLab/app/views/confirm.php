<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "TestLab";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = "";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar si el token es válido
    $sql = "SELECT id FROM usuarios WHERE token = ? AND activo = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Activar cuenta
        $sql_update = "UPDATE usuarios SET activo = 1, token = NULL WHERE token = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("s", $token);

        if ($stmt_update->execute()) {
            $mensaje = "¡Tu cuenta ha sido activada exitosamente!";
        } else {
            $mensaje = "Error al activar la cuenta. Inténtalo de nuevo.";
        }
    } else {
        $mensaje = "Token inválido o cuenta ya activada.";
    }
} else {
    $mensaje = "Solicitud inválida.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>
