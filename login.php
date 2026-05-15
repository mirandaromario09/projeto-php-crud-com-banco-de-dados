<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($_GET['erro'])): ?>
        <p class="erro">Usuário ou senha inválidos.</p>
    <?php endif; ?>

    <?php if (isset($_GET['cadastro'])): ?>
        <p class="sucesso">Conta criada com sucesso! Faça login.</p>
    <?php endif; ?>

    <?php if (isset($_GET['excluido'])): ?>
        <p class="sucesso">Conta excluída com sucesso!</p>
    <?php endif; ?>

    <form method="POST" action="verificar_login.php">
        <label>Email: <br>
            <input type="email" name="email" required>
        </label>
        <label>Senha: <br>
            <input type="password" name="senha" required>
        </label>
        <button type="submit">Entrar</button>
        <a href="cadastro.php">Criar conta</a>
    </form>
</body>
</html>
