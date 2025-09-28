<?php
// ATENÇÃO: Não deve haver NENHUM espaço ou linha em branco antes desta tag.

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// ===================================================================
// ROTEAMENTO PRINCIPAL
// A lógica aqui é: decidir a rota PRIMEIRO, e SÓ DEPOIS carregar
// e executar o controller necessário.
// ===================================================================

$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$parts = explode('/', $url);
$rota = $parts[0] ?: 'login';

// --- Lógica de Redirecionamento ANTES de qualquer output ---
// Se a rota for 'login' e o usuário já estiver logado, redireciona AGORA.
if ($rota === 'login' && isset($_SESSION['usuario_id'])) {
    header('Location: /public/dashboard');
    exit();
}

// Carrega os controllers necessários apenas quando forem usados
switch ($rota) {
    case 'login':
        // Se chegou aqui, o usuário não está logado. Apenas mostra a view.
        require_once __DIR__ . '/../app/views/login.php';
        break;

    case 'auth':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'dashboard':
        require_once __DIR__ . '/../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'clientes':
        require_once __DIR__ . '/../app/controllers/ClienteController.php';
        $controller = new ClienteController();
        $acao = $parts[1] ?? 'index';
        $id = $parts[2] ?? null;
        if (method_exists($controller, $acao)) {
            $controller->$acao($id);
        } else {
            http_response_code(404); echo "<h1>Ação não encontrada</h1>";
        }
        break;

    case 'animais':
        require_once __DIR__ . '/../app/controllers/AnimalController.php';
        $controller = new AnimalController();
        $acao = $parts[1] ?? 'index';
        $id = $parts[2] ?? null;
        if (method_exists($controller, $acao)) {
            $controller->$acao($id);
        } else {
            http_response_code(404); echo "<h1>Ação não encontrada</h1>";
        }
        break;

    default:
        http_response_code(404);
        echo "<h1>Página não encontrada</h1>";
        break;
}