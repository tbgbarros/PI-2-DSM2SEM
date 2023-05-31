<?php
require_once('class/infocon.php');

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 1) {
        $_SESSION['usuario'] = $usuario;
        header('Location: home.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos";
    }
}
