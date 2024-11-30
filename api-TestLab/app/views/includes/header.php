<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Solo inicia la sesión si no está activa
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Califia</title>
    <link rel="stylesheet" href="/califia/api-TestLab/public/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu">
                <nav class="navbar">
                    <div class="logo">
                        <a href="inicio.php">
                            <img src="http://localhost/califia/api-TestLab/public/images/Califia.png" alt="Califia">
                        </a>
                    </div>

                    <ul>
                        <li><a href="index.php">Cursos</a>
                            <ul class="submenu">
                                <li><a href="matematicas.php">Matemáticas</a></li>
                                <li><a href="literatura.php">Literatura</a></li>
                                <li><a href="historia.php">Historia</a></li>
                                <li><a href="biologia.php">Ciencias Naturales</a></li>
                                <li><a href="quimica.php">Química</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Exámenes</a>
                            <ul class="submenu">
                                <li><a href="Matematicas_quiz.php">Matemáticas</a></li>
                                <li><a href="Lengua_quiz.php">Literatura</a></li>
                                <li><a href="Geografia_quiz.php">Geografía</a></li>
                                <li><a href="Historia_quiz.php">Historia</a></li>
                                <li><a href="Biologia_quiz.php">Ciencias Naturales</a></li>
                                <li><a href="Quimica_quiz.php">Química</a></li>
                                <li><a href="Turismo_quiz.php">Turismo</a></li>
                            </ul>
                        </li>

                        <li><a href="videos.php">Videos</a></li>
                        <li><a href="glosario.php">Glosario</a></li>
                        <li><a href="Preguntas.php">Preguntas</a></li>

                        <!-- Mostrar opciones según si el usuario está logueado -->
                        <?php if (isset($_SESSION['nombre'])): ?>
                            <!-- Si el usuario está logueado -->
                            <li><a href="perfilUsuario.php">Mi perfil</a></li>
                            <li><a href="logout.php">Cerrar sesión</a></li>
                        <?php else: ?>
                            <!-- Si el usuario no está logueado -->
                            <li><a href="login.php">Iniciar sesión</a></li>
                            <li><a href="registro.php">Registrarse</a></li>
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>
        </nav>
    </header>
</body>
</html>
