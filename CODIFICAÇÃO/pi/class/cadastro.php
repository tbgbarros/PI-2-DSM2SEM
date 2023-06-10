<?php
require_once('func.php');

class Cadastro
{
    private $connect;
    function __construct()
    {
        $this->connect = new Conexao2();
    }
}