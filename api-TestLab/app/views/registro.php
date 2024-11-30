<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "TestLab";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];
    $nivel_academico = $_POST['nivel_academico'];

    if (empty($nombre) || empty($correo) || empty($contrasena) || empty($confirmar_contrasena) || empty($nivel_academico)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";
    } elseif ($contrasena !== $confirmar_contrasena) {
        $error = "Las contraseñas no coinciden.";
    } else {
        // Verificar si el correo ya está registrado
        $sql_check = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $correo);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $error = "Este correo ya está registrado.";
        } else {
            // Encriptar contraseña y generar token (si es necesario para confirmación)
            $hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

            // Insertar datos en la base de datos
            $sql_insert = "INSERT INTO usuarios (nombre, correo, contrasena, nivel_academico) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssss", $nombre, $correo, $hashed_password, $nivel_academico);

            if ($stmt_insert->execute()) {
                // Almacenamos el ID del usuario recién registrado en la sesión
                $_SESSION['usuario_id'] = $conn->insert_id;

                // Redirigir a la página de perfil de usuario
                header("Location: http://localhost/califia/api-TestLab/app/views/login.php");
                exit();
            } else {
                $error = "Error al registrar. Inténtalo de nuevo.";
            }
        }
    }
}

$conn->close();
?>
    <link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/stylesRegistro.css">
    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

</head>
<body>
    
       
        <?php if ($error): ?>
            <p class="message error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="message success"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
        <form method="POST" action="">

        <h2>Registro de Usuario</h2>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="confirmar_contrasena">Confirmar Contraseña</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
            </div>
            <div class="form-group">
                <label for="nivel_academico">Nivel Académico</label>
                <select id="nivel_academico" name="nivel_academico" required>
                    <option value="">Seleccionar...</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                </select>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-danger">Registro</button>
            </div>
        </form>
    </div>
</body>
</html>