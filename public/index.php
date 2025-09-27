<?php
// Habilite a exibição de erros durante o desenvolvimento
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Pega a URL da requisição a partir do parâmetro criado no .htaccess
$url = isset($_GET['url']) ? $_GET['url'] : 'login';
$url = rtrim($url, '/');
$url_parts = explode('/', $url);

// Roteamento Básico
// A primeira parte da URL define a rota
$rota = $url_parts[0];

switch ($rota) {

    case 'dashboard': // NOVA ROTA
    case 'painel': // ROTA ANTIGA APONTA PARA A NOVA
        // 1. Proteção: Verifica se o usuário está logado
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: login');
            exit();
        }
        
        // 2. Chama o Controller que vai cuidar do Dashboard
        require_once __DIR__ . '/../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index(); // Método que vai carregar a página
        break;

    case 'login':
        // Se já estiver logado, vai para o painel
        if (isset($_SESSION['usuario_id'])) {
            header('Location: painel');
            exit();
        }
        // Carrega a view de login
        require_once __DIR__ . '/../app/views/login.php';
        break;

    case 'auth':
        // Ação de autenticar (o formulário de login aponta para cá)
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $authController = new AuthController();
        $authController->login();
        break;

    case 'painel':
        // Protege a página do painel
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: login');
            exit();
        }
        require_once __DIR__ . '/../app/views/painel.php'; // Crie esta view
        break;

    case 'logout':
        require_once __DIR__ . '/../app/controllers/AuthController.php'; // Você pode criar um método logout
        // Lógica de logout aqui (session_destroy, etc)
        session_destroy();
        header('Location: login');
        exit();
        break;

    default:
        // Página não encontrada
        http_response_code(404);
        echo "<h1>Página não encontrada</h1>";
        break;
}

?>