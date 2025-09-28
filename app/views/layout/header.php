<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'MeuVET'; ?> - Sistema de Gestão</title>
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <!-- ============================================= -->
                <!-- A CORREÇÃO ESTÁ AQUI, NA LINHA ABAIXO -->
                <!-- ============================================= -->
                <img src="/public/images/MeuVET-Logo.png" alt="Logo MeuVET" class="logo">
            </div>
            
            <nav class="sidebar-nav">
                <a href="/public/dashboard" class="<?php echo ($activePage === 'dashboard') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="/public/clientes" class="<?php echo ($activePage === 'clientes') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-users"></i> Clientes
                </a>
                <a href="/public/animais" class="<?php echo ($activePage === 'animais') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-paw"></i> Animais
                </a>
                <a href="/public/agenda" class="<?php echo ($activePage === 'agenda') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-calendar-days"></i> Agenda
                </a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <h1><?php echo $pageTitle ?? 'Dashboard'; ?></h1>
                <div class="user-info">
                    <span>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>
                    <a href="/public/logout" class="logout-btn">Sair</a>
                </div>
            </header>
            
            <div class="content">