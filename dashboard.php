<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <h1>DASHBOARD</h1>
        <p>Bem-vindo! Você está logado.</p>

        <?php if (isset($_GET['editado'])): ?>
            <p class="sucesso">Cadastro atualizado com sucesso!</p>
        <?php endif; ?>

        <a class="btn-editar" href="editar_cadastro.php">Editar Cadastro</a>
        <form method="POST" action="excluir_cadastro.php" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?')" style="display: inline;">
            <button class="btn-excluir" type="submit">Excluir Conta</button>
        </form>
    </div>
</body>
</html>
