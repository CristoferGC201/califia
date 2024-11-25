<?php
require_once 'C:/xampp/htdocs/califia/vendor/autoload.php'; // Incluye el autoloader

session_start();

// Configuración del cliente de Google
$client = new Google_Client();
$client->setClientId("516412769602-0gblhbepnbpudbaotq21kshbml9fa3i5.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/califia/Proyecto/registro/Inicio%20de%20sesion/oauth/index.php");
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    // Generar URL para autenticación
    $authUrl = $client->createAuthUrl();
    echo "<a href='$authUrl'>Inicia sesión con Google</a>";
} else {
    // Intercambiar el código por un token de acceso
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Obtener información del usuario
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    echo "Bienvenido, " . htmlspecialchars($userInfo->name) . " (" . htmlspecialchars($userInfo->email) . ")";
}
