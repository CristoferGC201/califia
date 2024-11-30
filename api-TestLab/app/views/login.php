
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/stylesRegistro.css">

    <?php
session_start(); // Iniciar sesión

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
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
        $sql = "SELECT id, correo, contrasena, nombre FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($contrasena, $user['contrasena'])) {
                // Iniciar sesión y almacenar el nombre en lugar de "username"
                $_SESSION['usuario_id'] = $user['id']; 
                $_SESSION['nombre'] = $user['nombre']; // Guardar el nombre del usuario en la sesión
                $_SESSION['correo'] = $user['correo']; // Guardar correo para mostrarlo en el perfil si es necesario

                // Redirigir al index.php después de un inicio de sesión exitoso
                header("Location: index.php");
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
