<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email_logado = $_SESSION["email"] ?? '';

    if (empty($email_logado)) {
        header("Location: editar_cadastro.php?erro=Sessão expirou");
        exit;
    }

    $novo_nome = $_POST["nome"] ?? '';
    $novo_email = $_POST["email"] ?? '';
    $nova_senha = $_POST["senha"] ?? '';

    $conexao = mysqli_connect("localhost", "root", "", "sistema_login");

    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    if (!empty($nova_senha)) {
        $sql = "UPDATE usuarios SET nome = '$novo_nome', email = '$novo_email', senha = '$nova_senha' WHERE email = '$email_logado'";
    } else {
        $sql = "UPDATE usuarios SET nome = '$novo_nome', email = '$novo_email' WHERE email = '$email_logado'";
    }

    if (mysqli_query($conexao, $sql) === true) {
        $_SESSION["email"] = $novo_email;
        header("Location: dashboard.php?editado=ok");
        exit;
    } else {
        header("Location: editar_cadastro.php?erro=" . urlencode("Erro ao atualizar: " . mysqli_error($conexao)));
        exit;
    }

    mysqli_close($conexao);
}

header("Location: editar_cadastro.php");
exit;
?>
