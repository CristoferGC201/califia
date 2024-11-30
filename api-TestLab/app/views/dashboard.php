
<?php include __DIR__ . '/Includes/header.php'; ?>
<link rel="stylesheet" href="http://localhost/califia/api-TestLab/public/css/index.css">

</head>
<body>

<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Muestra el contenido del dashboard
echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['usuario_nombre']) . "!</h1>";
echo "<a href='../controllers/LogoutController.php'>Cerrar sesión</a>";
?>
    <div class="button-container">
        <div class="column">
            <a href="matematicas.php" class="button">
                <img src="images/matematicas.png" alt="Matemáticas">
                <span>Matemáticas</span>
            </a>
            <a href="literatura.php" class="button">
                <img src="images/literatura.png" alt="Literatura">
                <span>Literatura</span>
            </a>
            <a href="Historia.php" class="button">
                <img src="images/arte.png" alt="Arte">
                <span>Historia</span>
            </a>
        </div>

        <div class="column">
            <a href="ciencia.php" class="button">
                <img src="images/ciencia.png" alt="Ciencia">
                <span>Ciencia</span>
            </a>
            <a href="biologia.php" class="button">
                <img src="images/biologia.png" alt="Biología">
                <span>Biología</span>
            </a>
            <a href="otros.php" class="button">
                <img src="images/otros.png" alt="Otros">
                <span>Otros</span>
            </a>
        </div>
    </div>
    <?php include __DIR__ . '/Includes/footer.php'; ?>
</body>
</html>