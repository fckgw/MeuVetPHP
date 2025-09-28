<?php
require_once __DIR__ . '/../models/AnimalModel.php';
require_once __DIR__ . '/../models/ClienteModel.php';

class AnimalController {
    private $animalModel;
    private $clienteModel;
    private $activePage = 'animais'; // Define a página ativa

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /public/login');
            exit();
        }
        $this->animalModel = new AnimalModel();
        $this->clienteModel = new ClienteModel();
    }

    public function index() {
        $animais = $this->animalModel->getAll();
        $pageTitle = 'Animais';
        $activePage = $this->activePage;
        require_once __DIR__ . '/../views/layout/header.php';
        require_once __DIR__ . '/../views/animais/index.php';
        require_once __DIR__ . '/../views/layout/footer.php';
    }
    
    // ... adicione `$activePage = $this->activePage;` nos métodos create() e edit()
    // ... e garanta que os redirecionamentos em store(), update(), delete() usem /public/
}
?>