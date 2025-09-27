<?php
require_once __DIR__ . '/../../config/database.php';

class Usuario {
    private $conexao;

    public function __construct() {
        $this->conexao = conectar();
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}
?>