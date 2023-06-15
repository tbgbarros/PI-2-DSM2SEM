<?php

if (!Login::estaLogado()) {
    header('Location: index.php');
    exit;
} else {
    $sessionID = Login::estaLogado();
    $sessionNome = Login::nomeLogado();
}
