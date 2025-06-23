<?php

class DashboardController
{
    public function index()
    {
        session_start(); // Garante que a sessão está ativa

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // Simulação de dados do dashboard — substitua depois por dados reais do banco
        $pendingDonations = 1;
        $acceptedDonations = 1;
        $environmentalImpact = '1kg';

        // Carrega a view do dashboard
        require __DIR__ . '/../views/dashboard/index.php';
    }
}
