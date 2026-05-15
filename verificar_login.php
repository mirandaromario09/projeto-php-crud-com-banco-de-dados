<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    $conexao = mysqli_connect("localhost", "root", "", "sistema_login");

    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_assoc($resultado);
        $_SESSION["logado"] = true;
        $_SESSION["email"] = $dados["email"];
        header("Location: dashboard.php");
        exit;
    } else {
        header("Location: login.php?erro=1");
        exit;
    }

    mysqli_close($conexao);
}

header("Location: login.php");
exit;

?>
