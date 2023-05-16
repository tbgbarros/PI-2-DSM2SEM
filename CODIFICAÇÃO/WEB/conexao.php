<?php
require_once('infocon.php');

class Conexao
{
    private $conn;

    function __construct($servername, $username, $password, $dbname)
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        $this->checarConexao();
    }

    public function checarConexao()
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }

    public function getConnection()
    {
        return $this->conn;
    }
    public function closeConnection()
    {
        $this->conn->close();
    }
}
