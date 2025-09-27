<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MeuVET</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Chart.js para os gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Menu Lateral -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="images/MeuVET-Logo.png" alt="Logo MeuVET" class="logo">
            </div>
            <nav class="sidebar-nav">
                <a href="dashboard" class="active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="#"><i class="fa-solid fa-users"></i> Clientes</a>
                <a href="#"><i class="fa-solid fa-paw"></i> Animais</a>
                <a href="#"><i class="fa-solid fa-calendar-days"></i> Agenda</a>
            </nav>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <!-- Barra do Topo -->
            <header class="top-bar">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <span>Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>
                    <a href="logout" class="logout-btn">Sair</a>
                </div>
            </header>
            
            <!-- Conteúdo da Página -->
            <div class="content">
                <!-- Cards de KPIs (Indicadores) -->
                <div class="kpi-cards">
                    <div class="card">
                        <h3>Consultas Hoje</h3>
                        <p>5</p>
                    </div>
                    <div class="card">
                        <h3>Novos Clientes (Mês)</h3>
                        <p>12</p>
                    </div>
                    <div class="card">
                        <h3>Animais Cadastrados</h3>
                        <p>157</p>
                    </div>
                </div>

                <!-- Gráficos -->
                <div class="charts">
                    <div class="chart-container">
                        <h3>Consultas nos Próximos 7 Dias</h3>
                        <canvas id="consultasChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h3>Novos Animais por Mês</h3>
                        <canvas id="animaisChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gráfico 1: Consultas na Semana
        const ctxConsultas = document.getElementById('consultasChart');
        new Chart(ctxConsultas, {
            type: 'bar', // Tipo de gráfico: barras
            data: {
                labels: ['Hoje', 'Amanhã', 'Dia 3', 'Dia 4', 'Dia 5', 'Dia 6', 'Dia 7'],
                datasets: [{
                    label: 'Nº de Consultas',
                    data: [5, 8, 3, 5, 2, 3, 9], // DADOS DE EXEMPLO
                    backgroundColor: 'rgba(40, 167, 69, 0.7)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });

        // Gráfico 2: Novos Animais
        const ctxAnimais = document.getElementById('animaisChart');
        new Chart(ctxAnimais, {
            type: 'line', // Tipo de gráfico: linha
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Novos Animais',
                    data: [10, 15, 8, 12, 20, 17], // DADOS DE EXEMPLO
                    fill: false,
                    borderColor: 'rgb(0, 123, 255)',
                    tension: 0.1
                }]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });
    </script>
</body>
</html>