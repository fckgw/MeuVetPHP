<?php
require_once __DIR__ . '/../../config/database.php';

if (!class_exists('AnimalModel')) {
    class AnimalModel {
        private $conexao;

        public function __construct() {
            $this->conexao = conectar();
        }

        public function getAll() {
            $sql = "SELECT a.*, c.nome as nome_cliente 
                    FROM animais a
                    JOIN clientes c ON a.cliente_id = c.id
                    ORDER BY a.nome";
            $resultado = $this->conexao->query($sql);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function getById($id) {
            $stmt = $this->conexao->prepare("SELECT * FROM animais WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }

        // --- MÉTODO CORRETO ---
        public function create($dados) {
            $stmt = $this->conexao->prepare(
                "INSERT INTO animais (cliente_id, nome, especie, raca, sexo, data_nascimento) VALUES (?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("isssss", 
                $dados['cliente_id'], $dados['nome'], $dados['especie'], $dados['raca'], $dados['sexo'], $dados['data_nascimento']
            );
            return $stmt->execute();
        }

        // --- MÉTODO CORRETO ---
        public function update($id, $dados) {
            $stmt = $this->conexao->prepare(
                "UPDATE animais SET cliente_id = ?, nome = ?, especie = ?, raca = ?, sexo = ?, data_nascimento = ? WHERE id = ?"
            );
            $stmt->bind_param("isssssi",
                $dados['cliente_id'], $dados['nome'], $dados['especie'], $dados['raca'], $dados['sexo'], $dados['data_nascimento'], $id
            );
            return $stmt->execute();
        }

        public function delete($id) {
            $stmt = $this->conexao->prepare("DELETE FROM animais WHERE id = ?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }
}