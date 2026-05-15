<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro</h2>

    <form method="POST" action="verificar_cadastro.php">
        <label>Digite seu nome completo: <br>
            <input type="text" name="nome" required>
        </label>
        <label>Digite seu email: <br>
            <input type="email" name="email" required>
        </label>
        <label>Digite sua senha: <br>
            <input type="password" name="senha" required>
        </label>
        <button type="submit">Criar conta</button>
        <a href="login.php">Já tem conta? Faça login</a>
    </form>
</body>
</html>