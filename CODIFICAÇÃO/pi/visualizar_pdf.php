<?php
require_once('./class/func.php');
//header("Content-type: application/pdf");
$recebeID = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
//$recebeID = $_GET['id'];
$paciente = new Login();
$paciente->mostrarPDF($recebeID);
?>