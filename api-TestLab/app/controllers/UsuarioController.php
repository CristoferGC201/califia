<?php
class UsuarioController {
    public function obtenerUltimosIntentos() {
        include '../../config/database.php';
        $sql = "/* Consulta SQL */";
        return $conn->query($sql);
    }
}
?>
