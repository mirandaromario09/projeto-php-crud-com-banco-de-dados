<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
   
     <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">Usuário ou senha inválidos.</p>
    <?php endif; ?>

    <form method="POST" action="verificar_login.php">
        <label>Usuario: <br>
            <input type="text" name="usuario" required>
        </label>
        <br><br>
        <label>Senha: <br>
            <input type="password" name="senha" required>
        </label>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>