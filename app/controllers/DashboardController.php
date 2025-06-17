<?php

class DashboardController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // Carregar dados do dashboard aqui (exemplo estático)
        $pendingDonations = 1;
        $acceptedDonations = 1;
        $environmentalImpact = '1kg';

        require __DIR__ . '/../views/dashboard/index.php';
    }
}
