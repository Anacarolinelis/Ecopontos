<?php
session_start();

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $authController->login();
} elseif ($uri === '/logout') {
    $authController = new AuthController();
    $authController->logout();
} elseif ($uri === '/' || $uri === '/dashboard') {
    $dashboardController = new DashboardController();
    $dashboardController->index();
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}
