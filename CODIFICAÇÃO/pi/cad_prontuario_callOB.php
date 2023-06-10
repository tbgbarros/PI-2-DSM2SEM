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



// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber as observações do formulário
    $observacoes = $_POST['observacoes'];
    $cpf = $_POST['cpf'];

    // Chamar a função para atualizar as observações no banco de dados
    $paciente = new Login();
    $paciente->atualizarObservacoesPaciente($cpf, $observacoes);
    $paciente->uploadArquivo($cpf, $arquivo);
    unset($paciente);

    // Redirecionar ou exibir uma mensagem de sucesso
    echo '<script>
            alert("Observações atualizadas com sucesso!");
            window.location.href = "cad_prontuario.php";
            </script>';
}