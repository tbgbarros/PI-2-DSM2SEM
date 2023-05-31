<?php
session_start();
// Se o usuário não está logado, manda para página de login.
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
exit; // Encerra a execução do script