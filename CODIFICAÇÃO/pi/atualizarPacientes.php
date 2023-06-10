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

require_once("Classes/evento.php");
// Verifica se o ID do evento foi fornecido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_evento = $_POST['id'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $local = $_POST['local'];
    $tipo_esporte = $_POST['tipo_esporte'];
    $faixa_etaria = $_POST['faixa_etaria'];

    // Instancia o objeto evento
    $evento = new Evento();
    // Chamada do metodo update
    $evento->update($data, $hora, $local, $tipo_esporte, $faixa_etaria, $sessao_id);
    // Fechando conexao com o banco de dados
    unset($evento);

    header('location: lista_evento.php');
} else {
    echo "ID do evento não fornecido.";
}

?>