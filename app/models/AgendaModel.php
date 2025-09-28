<?php
require_once __DIR__ . '/../../config/database.php';

class AgendaModel {
    private $conexao;

    public function __construct() {
        $this->conexao = conectar();
    }

    // Busca todas as consultas com informações de outras tabelas
    public function getAll() {
        $sql = "SELECT 
                    con.id, 
                    con.data_consulta, 
                    con.status,
                    a.nome as nome_animal,
                    cli.nome as nome_cliente,
                    u.nome as nome_veterinario
                FROM consultas con
                JOIN animais a ON con.animal_id = a.id
                JOIN clientes cli ON a.cliente_id = cli.id
                JOIN usuarios u ON con.veterinario_id = u.id
                ORDER BY con.data_consulta DESC";
        $resultado = $this->conexao->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM consultas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($dados) {
        $stmt = $this->conexao->prepare(
            "INSERT INTO consultas (animal_id, veterinario_id, data_consulta, descricao, status) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("iisss", 
            $dados['animal_id'], $dados['veterinario_id'], $dados['data_consulta'], $dados['descricao'], $dados['status']
        );
        return $stmt->execute();
    }

    public function update($id, $dados) {
        $stmt = $this->conexao->prepare(
            "UPDATE consultas SET animal_id = ?, veterinario_id = ?, data_consulta = ?, descricao = ?, status = ? WHERE id = ?"
        );
        $stmt->bind_param("iisssi",
            $dados['animal_id'], $dados['veterinario_id'], $dados['data_consulta'], $dados['descricao'], $dados['status'], $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conexao->prepare("DELETE FROM consultas WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>