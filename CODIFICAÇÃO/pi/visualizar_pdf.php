<?php
require_once('./class/func.php');

$recebeID = $_GET['id'];
$paciente = new Login();
$paciente->mostrarPDF($recebeID);

?>