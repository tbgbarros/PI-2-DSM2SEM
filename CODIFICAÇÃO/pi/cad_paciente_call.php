<?php
require_once('./class/func.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Chama a função para inserir o cadastro de pacientes
    $nome = $_POST['nome'];
    $dt_nasc = $_POST['dt_nasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $nome_mae = $_POST['nome_mae'];
    $naturalidade = $_POST['naturalidade'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];

    $login = new Login();
    $login->cadastroPacientes($nome, $dt_nasc, $sexo, $telefone, $nome_mae, $naturalidade, $endereco, $cpf);

    unset($login);
}
?>