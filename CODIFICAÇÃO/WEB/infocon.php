<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artemis";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
