<?php
// Verifica si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $host = 'localhost'; // O la dirección de tu servidor de base de datos
    $dbname = 'TestLab';
    $username = 'root';  // Tu usuario de la base de datos
    $password = '';      // Tu contraseña de la base de datos

    try {
        // Establece la conexión
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Sanitiza los datos recibidos
        $user = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $comment = htmlspecialchars($_POST['comment']);
        
        // Prepara la consulta SQL para insertar los datos
        $sql = "INSERT INTO comentarios (username, email, comment) VALUES (:username, :email, :comment)";
        $stmt = $pdo->prepare($sql);
        
        // Vincula los parámetros y ejecuta la consulta
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':comment', $comment);
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Muestra un mensaje de éxito
        echo "Comentario enviado correctamente!";
    } catch (PDOException $e) {
        // Muestra un mensaje en caso de error en la conexión
        echo "Error: " . $e->getMessage();
    }
}
?>
