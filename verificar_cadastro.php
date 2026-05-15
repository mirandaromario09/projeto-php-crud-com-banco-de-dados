<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? '';
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    $conexao = mysqli_connect("localhost", "root", "", "sistema_login");

    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if (mysqli_query($conexao, $sql) === true) {
        header("Location: login.php?cadastro=ok");
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}

header("Location: cadastro.php");
exit;

?>
