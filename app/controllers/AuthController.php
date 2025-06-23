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
            // Salva o usuário na sessão
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

    public function showLoginForm()
    {
        // Exibe um formulário básico para testes
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);

        echo '
            <h2>Login</h2>
            ' . ($error ? "<p style='color:red;'>$error</p>" : '') . '
            <form method="POST" action="/login">
                <label>Usuário:</label><br>
                <input type="text" name="username"><br><br>
                <label>Senha:</label><br>
                <input type="password" name="password"><br><br>
                <button type="submit">Entrar</button>
            </form>
        ';
    }
}
