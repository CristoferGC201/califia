<?php
class Usuario {
    public static function find($id) {
        $conn = include('../config/database.php');
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
