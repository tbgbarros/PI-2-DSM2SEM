<?php

// Validacao de campo vazio
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
    header("Location: index.php");
    exit;
}

// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('artemis') or trigger_error(mysql_error());

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);
