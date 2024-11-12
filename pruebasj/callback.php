<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

session_start();

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Obtener la información del perfil del usuario
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Guardar la información en la sesión
    $_SESSION['user'] = [
        'id' => $userInfo->id,
        'email' => $userInfo->email,
        'name' => $userInfo->name,
        'picture' => $userInfo->picture
    ];

    // Redirigir a la página de inicio
    header('Location: index.php');
    exit;
} else {
    echo "Error de autenticación.";
}
?>
