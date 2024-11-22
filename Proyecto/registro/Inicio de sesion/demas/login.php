<?php
// Iniciamos o reanudamos una sesión existente.
session_start();

// Conexión a la base de datos
$servername = "localhost"; 
$usernameDB = "root"; 
$passwordDB = ""; 
$dbname = "califia"; 

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Capturamos los valores enviados desde el formulario y eliminamos espacios adicionales
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Preparamos la consulta SQL para buscar al usuario en la base de datos
    $stmt = $conn->prepare("SELECT id, nombre_usuario, contrasena FROM usuarios WHERE nombre_usuario = ?");
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verificamos si se encontró el usuario
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $nombre_usuario, $hashed_password);
        $stmt->fetch();

        // Verificamos si la contraseña ingresada es correcta usando password_verify()
        if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $id;

            // Redirigimos al usuario a la página Task_Manager.php
            header('Location: demas\inicio.html');
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        // Para depurar, vamos a imprimir lo que está ingresando el usuario
        $error = "Usuario no encontrado. Verifica el nombre de usuario o la contraseña.";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Mi Enciclopedia</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazamos un archivo CSS externo para dar estilo a la página -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Califia</h1>
        </header>
        
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            
            <!-- Si existe la variable $error, mostramos el mensaje de error al usuario. -->
            <?php if (isset($error)): ?>
            <div class="alert alert-warning"><?php echo $error; ?></div>
            <?php endif; ?>            
            
            <!-- El formulario envía los datos a este mismo archivo usando el método POST. -->
            <form action="login.php" method="POST">
                
                <!-- Campo para ingresar el nombre de usuario. El valor enviado será accesible a través de $_POST['username']. -->
                <div class="input-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <!-- Campo para ingresar la contraseña. El valor será accesible a través de $_POST['password']. -->
                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <!-- Botón para enviar el formulario. -->
                <button type="submit">Entrar</button>
            </form>
        </div>

        <footer>
            <p>&copy; 2024 Califia. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
