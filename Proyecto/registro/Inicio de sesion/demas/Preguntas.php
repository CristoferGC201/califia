<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'califia');

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
        $stmt = $conn->prepare("INSERT INTO developer_questions (username, email, comment) VALUES (?, ?, ?)");
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
?>
<?php include __DIR__ . '/Includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas a Desarrolladores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
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
    </style>
</head>
<body>
    <h1>Preguntas a Desarrolladores</h1>

    <?php if (isset($success_message)): ?>
        <div class="message success"><?= $success_message ?></div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <div class="message error"><?= $error_message ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="comment">Comentario o Pregunta:</label>
        <textarea id="comment" name="comment" rows="5" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>