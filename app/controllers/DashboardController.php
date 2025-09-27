<?php
// Futuramente, vamos precisar dos Models
// require_once __DIR__ . '/../models/ConsultaModel.php';
// require_once __DIR__ . '/../models/AnimalModel.php';

class DashboardController {

    public function index() {
        // 1. Verificar se o usuário está logado (redundante, pois já fizemos no router, mas é uma boa prática)
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: login');
            exit;
        }

        // 2. Futuramente: Buscar dados do banco de dados
        // $consultas = $consultaModel->getConsultasDaSemana();
        // $novosAnimais = $animalModel->getNovosAnimaisPorMes();

        // 3. Carregar a view do dashboard
        require_once __DIR__ . '/../views/dashboard.php';
    }
}

?>