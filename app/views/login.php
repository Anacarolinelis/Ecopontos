<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: /dashboard');
    exit;
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<?php include __DIR__ . '/templates/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="/login">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Entrar</button>
    </form>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>
