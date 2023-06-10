<?php
session_start();
require_once 'class/func.php';

if (!Login::estaLogado()) {
    header('Location: paciente.php');
    exit;
}

$login = new Login();

if (isset($_POST['Editar'])) {
    // Criando variáveis para receber as informações do formulário
    $nome = $_POST['nome'];
    $dt_nasc = $_POST['dt_nasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $nome_mae = $_POST['nome_mae'];
    $naturalidade = $_POST['naturalidade'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
}

?>