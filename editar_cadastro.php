<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

$email_logado = $_SESSION["email"] ?? '';

if (empty($email_logado)) {
    header("Location: dashboard.php?erro=sessao");
    exit;
}

$conexao = mysqli_connect("localhost", "root", "", "sistema_login");

if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuarios WHERE email = '$email_logado'";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Editar Cadastro</h2>

    <?php if (isset($_GET['erro'])): ?>
        <p class="erro"><?php echo $_GET['erro']; ?></p>
    <?php endif; ?>

    <form method="POST" action="verificar_edicao.php">
        <label>Nome: <br>
            <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        </label>
        <label>Email: <br>
            <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        </label>
        <label>Nova senha: <br>
            <input type="password" name="senha" placeholder="Deixe em branco para manter a mesma">
        </label>
        <button type="submit">Salvar</button>
        <a class="cancelar" href="dashboard.php">Cancelar</a>
    </form>
</body>
</html>
