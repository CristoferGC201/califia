<?php
require_once './index.php';
require_once './index.php';

$client = new Google_Client();
$client->setClientId("516412769602-0gblhbepnbpudbaotq21kshbml9fa3i5.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/califia/Proyecto/registro/Inicio%20de%20sesion/oauth/index.php");
$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <a href="<?php echo htmlspecialchars($login_url); ?>">Iniciar sesión con Google</a>
</body>
</html>
