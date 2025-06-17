<?php include __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h1>Dashboard</h1>
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</p>
    
    <h2>Resumo</h2>
    <ul>
        <li>Doações Pendentes: <?php echo $pendingDonations; ?></li>
        <li>Doações Aceitas: <?php echo $acceptedDonations; ?></li>
        <li>Impacto Ambiental: <?php echo $environmentalImpact; ?></li>
    </ul>

    <p><a href="/logout">Sair</a></p>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
