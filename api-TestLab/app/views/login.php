<?php include __DIR__ . '/includes/header.php'; ?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/stylesRegistro.css">

    <?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = ""; // Cambiar según configuración
$dbname = "TestLab";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Inicializar variables
$error = "";

// Procesar formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Verificar si los campos están vacíos
    if (empty($correo) || empty($contrasena)) {
        $error = "Por favor, completa todos los campos.";
    } else {
        // Buscar al usuario en la base de datos
        $sql = "SELECT id, contrasena FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($contrasena, $user['contrasena'])) {
                // Iniciar sesión y redirigir al perfil
                session_start();
                $_SESSION['usuario_id'] = $user['id'];
                header("Location: http://localhost/califia/api-TestLab/app/views/perfilUsuario.php");
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
            }
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>

    </head>
<body>
    <div class="login-container">
        <h1>Inicio de Sesión</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <button type="submit">Iniciar Sesión</button>
            </div>
            <div class="options">
                <a href="#">¿Olvidaste tu contraseña?</a><br>

                <a href="registro.php">Crear una cuenta</a>
            </div>
        </form>
    </div>
</body>
</html>

 <!-- PHP Footer -->
 <?php include __DIR__ . '/includes/footer.php'; ?>
