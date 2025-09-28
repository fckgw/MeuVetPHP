<!-- Cards de KPIs (Indicadores) com dados dinâmicos -->
<div class="kpi-cards">
    <div class="card">
        <h3><i class="fa-solid fa-stethoscope"></i> Consultas Hoje</h3>
        <p><?php echo $kpiConsultasHoje; ?></p>
    </div>
    <div class="card">
        <h3><i class="fa-solid fa-user-plus"></i> Novos Clientes (Mês)</h3>
        <p><?php echo $kpiNovosClientes; ?></p>
    </div>
    <div class="card">
        <h3><i class="fa-solid fa-paw"></i> Total de Animais</h3>
        <p><?php echo $kpiTotalAnimais; ?></p>
    </div>
</div>

<!-- Gráficos -->
<div class="charts">
    <div class="chart-container">
        <h3>Consultas nos Próximos 7 Dias</h3>
        <canvas id="consultasChart"></canvas>
    </div>
    <div class="chart-container">
        <h3>Novos Animais (Últimos 6 Meses)</h3>
        <canvas id="animaisChart"></canvas>
    </div>
</div>

<script>
    // --- Gráfico 1: Consultas na Semana ---
    const ctxConsultas = document.getElementById('consultasChart');
    if (ctxConsultas) { // Verifica se o elemento existe antes de criar o gráfico
        new Chart(ctxConsultas, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($consultasChartData['labels']); ?>,
                datasets: [{
                    label: 'Nº de Consultas',
                    data: <?php echo json_encode($consultasChartData['data']); ?>,
                    backgroundColor: 'rgba(40, 167, 69, 0.7)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } },
                plugins: { legend: { display: false } }
            }
        });
    }

    // --- Gráfico 2: Novos Animais por Mês ---
    const ctxAnimais = document.getElementById('animaisChart');
    if (ctxAnimais) { // Verifica se o elemento existe antes de criar o gráfico
        new Chart(ctxAnimais, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($animaisChartData['labels']); ?>,
                datasets: [{
                    label: 'Novos Animais',
                    data: <?php echo json_encode($animaisChartData['data']); ?>,
                    fill: true,
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderColor: 'rgb(0, 123, 255)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } },
                plugins: { legend: { display: false } }
            }
        });
    }
</script>