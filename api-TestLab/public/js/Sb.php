<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'califia';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Datos del usuario y el quiz
$usuario = 'usuario_demo'; // Aquí podrías usar un sistema de autenticación real
$quiz = 'Matemáticas';
$total_preguntas = 5;
$aciertos = 0;

// Respuestas correctas para el quiz de matemáticas
$respuestas_correctas = [
    'q1' => '5',
    'q2' => '6',
    'q3' => '8',
    'q4' => '3',
    'q5' => '16'
];

// Validar las respuestas del formulario
foreach ($respuestas_correctas as $pregunta => $respuesta_correcta) {
    if (isset($_POST[$pregunta]) && $_POST[$pregunta] == $respuesta_correcta) {
        $aciertos++;
    }
}

// Guardar los resultados en la base de datos
$stmt = $pdo->prepare("INSERT INTO resultados (usuario, quiz, aciertos, total_preguntas) VALUES (?, ?, ?, ?)");
$stmt->execute([$usuario, $quiz, $aciertos, $total_preguntas]);

// Evaluar si el usuario aprobó o reprobó (se aprueba con 60% o más de aciertos)
$porcentaje_aciertos = ($aciertos / $total_preguntas) * 100;

if ($porcentaje_aciertos >= 60) {
    // Si aprobó, redirigir a la siguiente lección
    header("Location: siguiente_leccion.php");
} else {
    // Si reprobó, redirigir a la página de repaso
    header("Location: repaso.php");
}
exit;
?>
