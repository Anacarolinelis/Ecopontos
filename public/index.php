<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carregando controladores
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';

// Captura a URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Roteamento
switch ($uri) {
    case '/login':
        $authController = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            // Exibe o formulário de login (você precisa criar esse método)
            if (method_exists($authController, 'showLoginForm')) {
                $authController->showLoginForm();
            } else {
                require_once __DIR__ . '/../app/views/login.php';
            }
        }
        break;

    case '/logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    case '/':
    case '/dashboard':
        $dashboardController = new DashboardController();
        $dashboardController->index();
        break;

    default:
        http_response_code(404);
        echo 'Página não encontrada: ' . htmlspecialchars($uri);
        break;
}
