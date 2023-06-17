<?php
session_start();
require_once 'class/func.php';
require_once 'class/log_consult.php';



// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    print_r($cpf);
    // Ler o conteúdo do arquivo
    $paciente = new Login();
    $uploadedFile = $_FILES['arquivo'];


    if (isset($_FILES['arquivo'])) {
        echo 'TESTE';
        $uploadedFile = $_FILES['arquivo'];
        $paciente->arquivoGravar($uploadedFile, $cpf);

    } else {
        echo '<script>alert("Arquivo não encontrado!");
        window.location.href = "cad_prontuario.php";';
    }
    unset($paciente);

    // Redirecionar ou exibir uma mensagem de sucesso
    // echo '<script>alert("Arquivo gravado com sucesso!"); 
    //        window.location.href = "cad_prontuario.php";
    //       </script>';
} else {
    echo '<script>alert("Erro ao gravar arquivo!");';
}