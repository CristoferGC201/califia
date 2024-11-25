<?php
// Datos de la conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario de tu base de datos
$password = ""; // Contraseña de tu base de datos
$dbname = "califia"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
