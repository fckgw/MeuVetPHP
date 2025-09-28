<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Carregamento centralizado dos controllers
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';
require_once __DIR__ . '/../app/controllers/AnimalController.php';
require_once __DIR__ . '/../app/controllers/AgendaController.php';

// Roteamento
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$parts = explode('/', $url);
$rota = $parts[0] ?: 'login';

switch ($rota) {
    case 'login':
        if (isset($_SESSION['usuario_id'])) {
            header('Location: /public/dashboard');
            exit();
        }
        require_once __DIR__ . '/../app/views/login.php';
        break;

    case 'auth':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'clientes':
    case 'animais':
    case 'agenda':
        // =======================================================
        // LÓGICA DE ROTEAMENTO CORRIGIDA E ROBUSTA
        // =======================================================

        // 1. Mapeia a rota da URL para o nome exato da classe do Controller
        $controllerMap = [
            'clientes' => 'ClienteController',
            'animais'  => 'AnimalController', // Nome correto aqui
            'agenda'   => 'AgendaController'
        ];
        
        // 2. Verifica se a rota existe no mapa para evitar erros
        if (isset($controllerMap[$rota])) {
            $controllerName = $controllerMap[$rota];
            $controller = new $controllerName();
            
            $acao = $parts[1] ?? 'index';
            $id = $parts[2] ?? null;

            if (method_exists($controller, $acao)) {
                $controller->$acao($id);
            } else {
                http_response_code(404);
                echo "<h1>Ação não encontrada</h1>";
            }
        } else {
            http_response_code(404);
            echo "<h1>Página não encontrada</h1>";
        }
        break;

    default:
        http_response_code(404);
        echo "<h1>Página não encontrada</h1>";
        break;
}
?>