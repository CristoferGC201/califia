
    <?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = ""; // Cambiar según configuración
$dbname = "TestLab";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener información del usuario
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT nombre, correo, nivel_academico FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();


    

// Consulta para obtener los resultados
$sql = "SELECT examen_nombre, respuestas_correctas, tiempo_total, intentos, fecha FROM resultados ORDER BY fecha DESC";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();
?>

<div class="main-container">
    <?php include __DIR__ . '/includes/headerlogin.php'; ?>
    <link rel="stylesheet" href="/api-TestLab/public/css/perfil.css">
    <title>Perfil de Usuario</title>
    <body>
<d>
    <h2>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?>!</h2>
    <p>Correo electrónico: <?php echo htmlspecialchars($usuario['correo']); ?></p>
    <p>Nivel académico: <?php echo htmlspecialchars($usuario['nivel_academico']); ?></p>

    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    
    <h1>Resultados de Exámenes</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre del Examen</th>
                <th>Respuestas Correctas</th>
                <th>Tiempo Total</th>
                <th>Intentos</th>
                <th>Fecha de Realización</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['examen_nombre']) ?></td>
                        <td><?= htmlspecialchars($row['respuestas_correctas']) ?></td>
                        <td><?= htmlspecialchars($row['tiempo_total']) ?></td>
                        <td><?= htmlspecialchars($row['intentos']) ?></td>
                        <td><?= htmlspecialchars($row['fecha']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay resultados disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
<?php $conn->close(); ?>