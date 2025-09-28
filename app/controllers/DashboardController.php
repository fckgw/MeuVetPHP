<?php
require_once __DIR__ . '/../models/DashboardDataModel.php';

// Verificamos se a classe já existe para evitar erros de re-declaração.
if (!class_exists('DashboardController')) {
    class DashboardController {

        public function index() {
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: /public/login');
                exit;
            }

            $dataModel = new DashboardDataModel();
            
            // Dados para os Cards
            $kpiConsultasHoje = $dataModel->getKpiConsultasHoje();
            $kpiNovosClientes = $dataModel->getKpiNovosClientesMes();
            $kpiTotalAnimais = $dataModel->getKpiTotalAnimais();

            // Dados para os Gráficos
            $consultasChartData = $dataModel->getChartConsultasProximosDias();
            $animaisChartData = $dataModel->getChartNovosAnimaisUltimosMeses();
            
            $pageTitle = 'Dashboard';
            $activePage = 'dashboard';

            // ATENÇÃO: A lógica que monta a página está aqui.
            // O erro original apontava para esta linha como o início da saída de texto.
            require_once __DIR__ . '/../views/layout/header.php';
            require_once __DIR__ . '/../views/dashboard.php';
            require_once __DIR__ . '/../views/layout/footer.php';
        }
    }
}
// NADA MAIS DEVE EXISTIR ABAIXO DESTA LINHA