<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Preencha todos os campos.';
            header('Location: /login');
            exit;
        }

        $user = new User();
        $userData = $user->getByUsername($username);

        if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['user'] = [
                'id' => $userData['id'],
                'username' => $userData['username']
            ];
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Usuário ou senha inválidos.';
            header('Location: /login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
