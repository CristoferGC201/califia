<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

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

// Obtener información del usuario
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT nombre, correo FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Obtener el nombre de usuario y el correo
$username = $usuario['nombre'];
$email = $usuario['correo'];

// Comprobar si se ha enviado un comentario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    
    // Validar que el comentario no esté vacío
    if (!empty($comment)) {
        // Preparar y ejecutar la consulta para insertar el comentario
        $sql = "INSERT INTO developer_questions (username, email, comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $comment);
        
        if ($stmt->execute()) {
            $success_message = "Comentario enviado correctamente.";
        } else {
            $error_message = "Hubo un error al enviar el comentario.";
        }
    } else {
        $error_message = "El comentario no puede estar vacío.";
    }
}

// Consulta para obtener las preguntas del usuario logueado
$preguntas = [];
$sql = "SELECT username, email, comment, created_at FROM developer_questions WHERE username = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si la consulta ha devuelto resultados
if ($result->num_rows > 0) {
    $preguntas = $result->fetch_all(MYSQLI_ASSOC);
}

$stmt->close();
$conn->close();
?>

<?php include __DIR__ . '/includes/header.php'; ?>
<link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/stylesCursos.css">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas a Desarrolladores</title>
    <style>
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
        .comment {
            border: 1px solid #ccc;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .comment strong {
            color: #333;
        }
        .comment time {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <br><br><h1>Preguntas a Desarrolladores</h1><br><br>

    <?php if (isset($success_message)): ?>
        <div class="message success"><?= $success_message ?></div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="message error"><?= $error_message ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <p><strong>Bienvenido, <?= htmlspecialchars($username) ?></strong></p>  <!-- Muestra el nombre de usuario -->
        
        <label for="comment">Comentario:</label>
        <textarea id="comment" name="comment" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <h2>Mis Comentarios:</h2>
    <?php foreach ($preguntas as $pregunta): ?>
        <div class="comment">
            <strong><?= htmlspecialchars($pregunta['username']) ?></strong> 
            <time><?= date("d-m-Y H:i:s", strtotime($pregunta['created_at'])) ?></time><br>
            <p><?= nl2br(htmlspecialchars($pregunta['comment'])) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>