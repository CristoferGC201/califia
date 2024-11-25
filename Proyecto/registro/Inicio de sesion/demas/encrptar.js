// Almacenar contraseña encriptada
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verificar la contraseña ingresada con la encriptada
if (password_verify($password, $hashed_password)) {
    // Contraseña válida
}
