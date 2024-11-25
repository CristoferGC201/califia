<?php
// Esta función sanitiza la entrada del usuario, eliminando espacios en blanco adicionales y escapando caracteres especiales.
// De esta manera, se evita la inyección de código o la introducción de caracteres HTML no deseados.
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Esta función verifica si el usuario ha iniciado sesión. Si la variable de sesión 'user_id' no está establecida,
// redirige al usuario a la página de inicio de sesión. Se usa para proteger páginas que requieren autenticación.
function checkLogin() {
    session_start(); // Inicia la sesión o la reanuda
    if (!isset($_SESSION['user_id'])) { // Si no existe el user_id en la sesión, el usuario no está autenticado
        header("Location: login.php"); // Redirige a la página de inicio de sesión
        exit(); // Finaliza el script para evitar que se ejecute más código
    }
}

// Esta función redirige a una página específica y muestra un mensaje de flash (temporal) en la siguiente página.
// Es útil para enviar mensajes después de redirigir a otra página (ej. "Registro completado").
function redirectWithMessage($location, $message) {
    session_start(); // Inicia la sesión
    $_SESSION['flash_message'] = $message; // Guarda el mensaje en la sesión
    header("Location: $location"); // Redirige a la ubicación especificada
    exit(); // Finaliza el script
}

// Esta función muestra el mensaje de flash si está presente y luego lo elimina de la sesión.
// Se utiliza para mensajes temporales, como confirmaciones o errores.
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) { // Si hay un mensaje de flash en la sesión
        echo "<div class='message'>" . $_SESSION['flash_message'] . "</div>"; // Lo muestra en un div con clase 'message'
        unset($_SESSION['flash_message']); // Elimina el mensaje de la sesión para que no se muestre de nuevo
    }
}

// Esta función comprueba si un campo está vacío después de eliminar los espacios en blanco.
// Es útil para validar campos de formularios.
function isFieldEmpty($field) {
    return empty(trim($field)); // Retorna true si el campo está vacío o sólo tiene espacios
}

// Esta función valida si un email tiene un formato correcto.
// Usa la función `filter_var` con la constante `FILTER_VALIDATE_EMAIL` para comprobar si el email es válido.
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL); // Retorna true si el email es válido
}

// Esta función ejecuta una consulta SQL que debe devolver una única fila y la retorna como un array asociativo.
// Si no hay resultados, retorna null.
function fetchSingleRow($conn, $query) {
    $result = $conn->query($query); // Ejecuta la consulta
    if ($result->num_rows > 0) { // Si hay al menos una fila de resultado
        return $result->fetch_assoc(); // Retorna la fila como un array asociativo
    } else {
        return null; // Retorna null si no hay resultados
    }
}
?>
