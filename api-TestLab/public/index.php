<?php
session_start();

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'login':
        include '../app/views/login.php';
        break;
    case 'perfil':
        include '../app/views/perfilUsuario.php';
        break;
    default:
        echo "Página no encontrada.";
        break;
}
?>
