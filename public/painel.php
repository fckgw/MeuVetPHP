<?php
session_start();

// Se não houver uma sessão ativa, redireciona de volta para o login
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Sistema</title>
</head>
<body>
    <h1>Bem-vindo ao Painel, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
    <p>Você está logado no sistema.</p>
    <a href="logout.php">Sair</a>
</body>
</html>