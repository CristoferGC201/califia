<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'TestLab');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Nombre del examen
$examen_nombre = "Biologia I";

// Respuestas correctas
// Respuestas correctas
$respuestas_correctas = [
    'q1' => 'Controlar las actividades celulares',
    'q2' => 'Mitocondrias',
    'q3' => 'Ribosomas',
    'q4' => 'Núcleo',
    'q5' => 'Realizar la fotosíntesis',
];

// Calcular respuestas correctas
$correctas = 0;
foreach ($respuestas_correctas as $pregunta => $respuesta) {
    if (isset($_POST[$pregunta]) && $_POST[$pregunta] === $respuesta) {
        $correctas++;
    }
}

// Calcular el tiempo empleado
$tiempo_inicio = strtotime($_POST['tiempo_inicio']);
$tiempo_fin = strtotime($_POST['tiempo_fin']);
$tiempo_total = gmdate("H:i:s", $tiempo_fin - $tiempo_inicio);

// Obtener intentos previos
$sql_intentos = "SELECT COUNT(*) AS intentos FROM resultados WHERE examen_nombre = ?";
$stmt_intentos = $conn->prepare($sql_intentos);
$stmt_intentos->bind_param("s", $examen_nombre);
$stmt_intentos->execute();
$result_intentos = $stmt_intentos->get_result();
$intentos = ($result_intentos->fetch_assoc()['intentos'] ?? 0) + 1;
$stmt_intentos->close();

// Insertar datos en la tabla
$stmt = $conn->prepare("INSERT INTO resultados (examen_nombre, respuestas_correctas, tiempo_total, intentos) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sisi", $examen_nombre, $correctas, $tiempo_total, $intentos);

if ($stmt->execute()) {
    // Mensaje opcional de éxito antes de redirigir
    echo "¡Resultados guardados exitosamente!";
    // Redirigir a la página usuarioPerfil.php
    header("Location: perfilUsuario.php");
    exit(); // Asegúrate de terminar el script después de redirigir
} else {
    echo "Error al guardar los resultados: " . $conn->error;
}


$stmt->close();
$conn->close();
?>
