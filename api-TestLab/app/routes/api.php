<?php
require_once '../app/controllers/UsuarioController.php';
$usuarioController = new UsuarioController();

// Ruta para obtener un usuario
if ($_SERVER['REQUEST_URI'] == '/api/usuarios' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $usuarioController->obtenerUsuario($id);
}
?>
