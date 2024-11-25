<?php
// como se hace de forma local se pone localhost, el segundo parametro es root que representa el noimbre del usuario con el que vamos a acceder a la base de datos, el tersero es la contrase;a del usuario
// y por ultimo va el nombre de la base de datos
$conn = new mysqli("localhost","root", "", "califia");
if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
}
?>