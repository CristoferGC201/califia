<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirige al inicio de sesión si no hay sesión activa
    exit();
}
?>
