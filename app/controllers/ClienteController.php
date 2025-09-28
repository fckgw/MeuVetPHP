<?php
// Usamos 'require_once' para garantir que o model só seja carregado uma vez.
require_once __DIR__ . '/../models/ClienteModel.php';

// Verificamos se a classe JÁ EXISTE antes de tentar declará-la.
// Esta é a camada final de segurança contra o erro.
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

        public function create() {
            $pageTitle = 'Adicionar Cliente';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/clientes/create.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }

        public function edit($id) {
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

        public function store() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->clienteModel->create($_POST);
                header('Location: /public/clientes');
                exit();
            }
        }

        public function update($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->clienteModel->update($id, $_POST);
                header('Location: /public/clientes');
                exit();
            }
        }

        public function delete($id) {
            $this->clienteModel->delete($id);
            header('Location: /public/clientes');
            exit();
        }
    }
}
?>