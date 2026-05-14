<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Conectar ao banco de dados
    $conexao = mysqli_connect('localhost', 'root', '', 'sistema_login');

    // Verificar se a conexão funcionou
    if (!$conexao) {
        die('Erro de conexão: ' . mysqli_connect_error());
    }

    // Buscar o usuário no banco
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    // Verificar se encontrou algum registro
    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['logado'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        header('Location: login.php?erro=1');
        exit;
    }

    // Fechar a conexão
    mysqli_close($conexao);
}

// Se alguém acessar verificar_login.php direto sem POST, volta pro login
header('Location: login.php');
exit;