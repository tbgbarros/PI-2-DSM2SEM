<?php

class conexao2 {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "prontuarioBD";

    private $conexao;

    function __construct() {
        $this->conexao = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function fecharConexao() {
        $this->conexao->close();
    }
}  

