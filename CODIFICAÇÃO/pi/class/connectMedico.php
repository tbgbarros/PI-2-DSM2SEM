<?php
session_start();
require_once 'class/func.php';
require_once 'class/infocon.php';

// nova conexao
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['crm'];
    $senha = $_POST['senha'];

    $login = new Login();

    if ($login->autenticarMedico($usuario, $senha)) {
        header('Location: home.php');
        exit;
    } else {
        $mensagemErro = "Usuário ou senha inválidos";
    }
}