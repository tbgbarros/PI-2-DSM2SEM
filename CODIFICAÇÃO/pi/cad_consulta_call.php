<?php
session_start();
require_once 'class/func.php';

if (!Login::estaLogado()) {
    header('Location: index.php');
    exit;
} else {
    $sessionID = Login::estaLogado();
    $sessionNome = Login::nomeLogado();
}

$prontuario = new Login();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dt_consulta = $_POST['dt_consulta'];
    $cpf = $_POST['cpf'];
    $idMedico = $sessionID;
    // Chama a função para inserir o cadastro de pacientes
    $prontuario->cadastroProntuario($dt_consulta, $idMedico, $cpf);
    unset($prontuario);
}
