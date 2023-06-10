<?php
require_once('./class/func.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Chama a função para inserir o cadastro de pacientes
    $nomemedico = $_POST['nomemedico'];
    $dtNasc = $_POST['dt_nasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $crm = $_POST['crm'];
    $especializacao = $_POST['especializacao'];
    $naturalidade = $_POST['naturalidade'];
    $unidade_op = $_POST['hospital'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];


    $login = new Login();
    $login->cadastroMedico($nomemedico, $dtNasc, $sexo, $telefone, $crm, $especializacao, $naturalidade, $unidade_op, $endereco, $cpf, $senha);

    unset($login);
}
?>