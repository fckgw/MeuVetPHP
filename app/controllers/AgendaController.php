<?php
require_once __DIR__ . '/../models/AgendaModel.php';
require_once __DIR__ . '/../models/AnimalModel.php';
require_once __DIR__ . '/../models/Usuario.php';

if (!class_exists('AgendaController')) {
    class AgendaController {
        private $agendaModel;
        private $animalModel;
        private $usuarioModel;
        private $activePage = 'agenda';

        public function __construct() {
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: /public/login');
                exit();
            }
            $this->agendaModel = new AgendaModel();
            $this->animalModel = new AnimalModel();
            $this->usuarioModel = new Usuario();
        }

        public function index() {
            $consultas = $this->agendaModel->getAll();
            $pageTitle = 'Agenda de Consultas';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/agenda/index.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }
        
        // RENOMEADO de create para adicionar
        public function adicionar() {
            $animais = $this->animalModel->getAll();
            $veterinarios = $this->usuarioModel->getAll();
            $pageTitle = 'Agendar Nova Consulta';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/agenda/create.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }
        
        // RENOMEADO de store para salvar
        public function salvar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->agendaModel->create($_POST);
                header('Location: /public/agenda');
                exit();
            }
        }
        
        // RENOMEADO de edit para editar
        public function editar($id) {
            $consulta = $this->agendaModel->getById($id);
            $animais = $this->animalModel->getAll();
            $veterinarios = $this->usuarioModel->getAll();
            if (!$consulta) {
                header('Location: /public/agenda');
                exit();
            }
            $pageTitle = 'Editar Agendamento';
            $activePage = $this->activePage;
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/agenda/edit.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }
        
        // RENOMEADO de update para atualizar
        public function atualizar($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->agendaModel->update($id, $_POST);
                header('Location: /public/agenda');
                exit();
            }
        }
        
        // RENOMEADO de delete para excluir
        public function excluir($id) {
            $this->agendaModel->delete($id);
            header('Location: /public/agenda');
            exit();
        }
    }
}
?>