<?php
require_once('./class/func.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Chama a função para inserir o cadastro de pacientes
    $nomehospital = $_POST['nome_hospital'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $responsavel = $_POST['responsavel'];
    $login = new Login();
    $login->cadastroHospital($nomehospital, $endereco, $telefone, $responsavel);
    unset($login);
}
?>