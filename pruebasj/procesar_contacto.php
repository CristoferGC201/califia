<?php
// Comprobamos si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validación básica
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Crear el mensaje de correo
        $to = "jahel.andrademurillo@cesunbc.edu.mx";  // Cambia este correo en el futuro
        $subject = "Nuevo mensaje de contacto - Enciclopedia Califia";
        $body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";
        $headers = "From: $email\r\nReply-To: $email\r\n";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Gracias por tu mensaje, $nombre. Nos pondremos en contacto contigo pronto.";
        } else {
            echo "Lo sentimos, ocurrió un error al enviar tu mensaje. Intenta de nuevo más tarde.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
