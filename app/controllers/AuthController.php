<?php
// session_start(); // REMOVIDO! Esta era a causa do problema.

require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->findByEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];

                // CORREÇÃO 2: Redirecionar para a URL amigável do dashboard
                header('Location: dashboard'); 
                exit();
            } else {
                // Falha no login
                $erro = "Email ou senha inválidos!";
                
                // CORREÇÃO 3: Redirecionar para a URL amigável de login
                header('Location: login?erro=' . urlencode($erro));
                exit();
            }
        }
    }

    // Futuramente, podemos adicionar a função de logout aqui também
    public function logout() {
        session_destroy();
        header('Location: login');
        exit();
    }
}

// O roteamento simples dentro do controller ainda pode ser útil
// dependendo de como o index.php o chama.
if (isset($_POST['acao']) && $_POST['acao'] === 'login') {
    $authController = new AuthController();
    $authController->login();
}