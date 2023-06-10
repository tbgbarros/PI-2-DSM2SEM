<?php
session_start();
require_once 'class/func.php';
require_once 'class/infocon.php';

// nova conexao
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $login = new Login();

    if ($login->autenticar($usuario, $senha)) {
        header('Location: homeadm.php');
        exit;
    } else {
        $mensagemErro = "Usuário ou senha inválidos";
    }
}