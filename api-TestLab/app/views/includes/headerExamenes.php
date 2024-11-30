<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Solo inicia la sesión si no está activa
}
?>

<header>
        <nav>
        <link rel="stylesheet" href="/califia/api-TestLab/public/css/styles.css">
            <div class="menu">
            <div class="logo">
    <a href="inicio.php" >
    <img src="http://localhost/califia/api-TestLab/public/images/Califia.png" alt="Califia">
    </a>
</div>

                
                <li>
                    <a href="index.php">Cursos</a>
            <ul class="submenu">
                <li><a href="matematicas.php">Matemáticas</a></li>
                <li><a href="literatura.php">Literatura</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="biologia.php">Ciencias Naturales</a></li>
                <li><a href="quimica.php">Química</a></li>
            </ul>
                </li>
                <li>
                    <a href="#">Examenes</a>
                    <ul class="submenu">
                        <li><a href="Matematicas_quiz.php">Matematicas</a></li>
                        <li><a href="Lengua_quiz.php">Literatura</a></li>
                        <li><a href="Geografia_quiz.php">Geografia</a></li>
                        <li><a href="Historia_quiz.php">Historia</a></li>
                        <li><a href="Biologia_quiz.php">Ciencias Naturales</a></li>
                        <li><a href="Quimica_quiz.php">Quimica</a></li>
                        <li><a href="Turismo_quiz.php">Turismo</a></li>
                    </ul>
                </li>
                <li>
                    <a href="videos.php">Videos</a>
                   
                </li>
                <li>
                    <a href="glosario.php">Glosario</a>
                   
                </li>
                <li><a href="Preguntas.php">Preguntas</a></li>
              <div class="perfil"><li><a href="perfilUsuario.php">Mi Perfil</a></li></div>
            </ul>
        </nav>
    </header>