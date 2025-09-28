<?php
// ATENÇÃO: Não deve haver NENHUM espaço ou caractere antes desta linha.

require_once __DIR__ . '/../../config/database.php';

if (!class_exists('ClienteModel')) {
    class ClienteModel {
        private $conexao;

        public function __construct() {
            $this->conexao = conectar();
        }

        public function getAll() {
            $sql = "SELECT * FROM clientes ORDER BY nome";
            $resultado = $this->conexao->query($sql);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        public function getById($id) {
            $stmt = $this->conexao->prepare("SELECT * FROM clientes WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc();
        }

        // --- ATUALIZADO COM OS NOVOS CAMPOS ---
        public function create($dados) {
            $stmt = $this->conexao->prepare(
                "INSERT INTO clientes (nome, cpf, telefone, email, cep, logradouro, numero, complemento, bairro, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("ssssssssss", 
                $dados['nome'], $dados['cpf'], $dados['telefone'], $dados['email'], 
                $dados['cep'], $dados['logradouro'], $dados['numero'], $dados['complemento'], 
                $dados['bairro'], $dados['cidade']
            );
            return $stmt->execute();
        }

        // --- ATUALIZADO COM OS NOVOS CAMPOS ---
        public function update($id, $dados) {
            $stmt = $this->conexao->prepare(
                "UPDATE clientes SET nome = ?, cpf = ?, telefone = ?, email = ?, cep = ?, logradouro = ?, numero = ?, complemento = ?, bairro = ?, cidade = ? WHERE id = ?"
            );
            $stmt->bind_param("ssssssssssi",
                $dados['nome'], $dados['cpf'], $dados['telefone'], $dados['email'], 
                $dados['cep'], $dados['logradouro'], $dados['numero'], $dados['complemento'], 
                $dados['bairro'], $dados['cidade'], 
                $id
            );
            return $stmt->execute();
        }

        public function delete($id) {
            $stmt = $this->conexao->prepare("DELETE FROM clientes WHERE id = ?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }
}