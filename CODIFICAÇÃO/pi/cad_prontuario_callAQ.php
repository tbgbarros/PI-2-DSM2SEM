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
    $cpf = $_POST['cpf'];
    $arquivo = $_POST['arquivo'];
    print_r($cpf);
    print_r($arquivo);
    // Ler o conteúdo do arquivo
    //$conteudo_arquivo = file_get_contents($arquivo);


    // Codificar o conteúdo em base64 para armazenamento no banco de dados
    //$conteudo_arquivo_codificado = base64_encode($conteudo_arquivo);

    //print_r($conteudo_arquivo_codificado);
    // Chamar a função para atualizar as observações no banco de dados
    $paciente = new Login();
    $paciente->uploadArquivo($cpf, $arquivo);
    unset($paciente);

    // Redirecionar ou exibir uma mensagem de sucesso
    echo '<script>alert("Arquivo gravado com sucesso!"); 
            window.location.href = "cad_prontuario.php";
           </script>';
}
