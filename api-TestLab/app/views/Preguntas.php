<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'TestLab');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);

    // Validar que no haya campos vacíos
    if (!empty($username) && !empty($email) && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO developer_questions (username, email, comment, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $username, $email, $comment);

        if ($stmt->execute()) {
            $success_message = "¡Gracias por tu comentario!";
        } else {
            $error_message = "Error al guardar tu comentario. Intenta de nuevo.";
        }

        $stmt->close();
    } else {
        $error_message = "Todos los campos son obligatorios.";
    }
}

// Obtener todos los comentarios ordenados por fecha
$comments = [];
$result = $conn->query("SELECT username, email, comment, created_at FROM developer_questions ORDER BY created_at DESC");
if ($result->num_rows > 0) {
    $comments = $result->fetch_all(MYSQLI_ASSOC);
}

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
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="comment">Comentario:</label>
        <textarea id="comment" name="comment" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <h2>Comentarios:</h2>
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <strong><?= htmlspecialchars($comment['username']) ?></strong> 
            <time><?= date("d-m-Y H:i:s", strtotime($comment['created_at'])) ?></time><br>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>

