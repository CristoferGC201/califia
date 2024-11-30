<?php
session_start();
session_destroy();
header("Location: login.php");  // Redirigir al login después de cerrar sesión
exit();
?>
