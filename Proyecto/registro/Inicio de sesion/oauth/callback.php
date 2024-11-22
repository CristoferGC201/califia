<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enciclopedia Califia</title>
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></h1>
        <img src="<?php echo htmlspecialchars($_SESSION['user']['picture']); ?>" alt="Foto de perfil" width="100">
        <p>Correo: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <h1>Enciclopedia Califia</h1>
        <p><a href="login.php">Iniciar sesión con Google</a></p>
    <?php endif; ?>
</body>
</html>
