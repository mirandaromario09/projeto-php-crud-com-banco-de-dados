<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION["email"] ?? '';

    if (empty($email)) {
        header("Location: dashboard.php?erro=sessao");
        exit;
    }

    $conexao = mysqli_connect("localhost", "root", "", "sistema_login");

    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM usuarios WHERE email = '$email'";

    if (mysqli_query($conexao, $sql) === true) {
        session_destroy();
        header("Location: login.php?excluido=ok");
        exit;
    } else {
        echo "Erro ao excluir: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
} else {
    header("Location: dashboard.php");
    exit;
}
?>
