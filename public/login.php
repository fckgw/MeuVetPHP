    <?php
// ---- INÍCIO DO CÓDIGO DE DEBUG ----
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ---- FIM DO CÓDIGO DE DEBUG ----

// Inicia a sessão para verificar se o usuário já está logado
session_start();

// Se já existir uma sessão, redireciona para o painel
if (isset($_SESSION['usuario_id'])) {
    header('Location: painel.php');
    exit();
}

// Se não, carrega a view de login
require_once __DIR__ . '/../app/views/login.php';
?>