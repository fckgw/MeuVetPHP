<?php
require_once __DIR__ . '/../models/ClienteModel.php';

if (!class_exists('ClienteController')) {
    class ClienteController {
        private $clienteModel;
        private $activePage = 'clientes';

        public function __construct() {
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: /public/login');
                exit();
            }
            $this->clienteModel = new ClienteModel();
        }

        public function index() {
            $clientes = $this->clienteModel->getAll();
            $pageTitle = 'Clientes';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/clientes/index.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }

        // RENOMEADO de create para adicionar
        public function adicionar() {
            $pageTitle = 'Adicionar Cliente';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/clientes/create.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }

        // RENOMEADO de edit para editar
        public function editar($id) {
            $cliente = $this->clienteModel->getById($id);
            if (!$cliente) {
                header('Location: /public/clientes');
                exit();
            }
            $pageTitle = 'Editar Cliente';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/clientes/edit.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }

        // RENOMEADO de store para salvar
        public function salvar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->clienteModel->create($_POST);
                header('Location: /public/clientes');
                exit();
            }
        }

        // RENOMEADO de update para atualizar
        public function atualizar($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->clienteModel->update($id, $_POST);
                header('Location: /public/clientes');
                exit();
            }
        }

        // RENOMEADO de delete para excluir
        public function excluir($id) {
            $this->clienteModel->delete($id);
            header('Location: /public/clientes');
            exit();
        }
    }
}
?>