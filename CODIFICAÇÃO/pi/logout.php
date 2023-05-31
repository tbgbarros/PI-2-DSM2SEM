<?php
require_once 'class/func.php';

Login::encerrarSessao();

header('Location: index.php');
exit;
