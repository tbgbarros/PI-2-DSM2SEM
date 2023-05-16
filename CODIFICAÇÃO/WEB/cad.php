<?php

//conexao db
require_once('../class/conexao.php');


class Olimpos
{
    private $usuario, $senha;
    private $connect;

    function __construct($servername, $username, $password, $dbname)
    {
        $this->connect = new Conexao($servername, $username, $password, $dbname);
    }

    public function insert($usuario, $senha)
    {
        //puxa campo usuario no banco
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
        //getConnection
        $result = mysqli_query($this->connect->getConnection(), $sql);
        // verifica se ja existe
        if ($result !== FALSE && $result->num_rows > 0) {
            echo "Usuário já cadastrado";
        } else {
            // inseri se nao existir cad
            $insert = "INSERT INTO usuarios(usuario, senha) VALUES('$usuario', '$senha')";
            if ($this->connect->getConnection()->query($insert) === TRUE) {
                echo "Usuário inserido com sucesso";
            } else {
                echo "Error: " . $insert . "<br>" . $this->connect->getConnection()->error;
            }
        }
    }

    //função exibir
    public function read()
    {
        $sql = "SELECT nome, cpf, telefone, origem_publica FROM participante";
        $result = $this->connect->getConnection()->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Name</th><th>CPF</th><th>Telefone</th><th>Escolaridade</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $origem_publica = $row['origem_publica'] == 1 ? 'Escola Pública' : 'Escola Particular';
                    echo "<tr><td>" . $row['nome'] . "</td><td>" . $row['cpf'] . "</td><td>" . $row['telefone'] . "</td><td>" . $origem_publica . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            die($this->connect->getConnection()->error);
        }
    }
    public function update($nome, $cpf, $telefone, $origem)
    {
        $sql = "SELECT cpf FROM participante WHERE cpf = '$cpf' ";
        $result = $this->connect->getConnection()->query($sql);

        if ($result->num_rows > 0) {
            $update_nome = "UPDATE participante SET nome = '$nome' WHERE cpf = '$cpf'";
            $update_telefone = "UPDATE participante SET telefone = '$telefone' WHERE cpf = '$cpf'";
            $update_origem = "UPDATE participante SET origem_publica = $origem WHERE cpf = '$cpf'";
            if ($this->connect->getConnection()->query($update_nome) === TRUE) {
                echo "Dados inseridos";
            }
            if ($this->connect->getConnection()->query($update_telefone) === TRUE) {
                echo "Dados inseridos";
            }
            if ($this->connect->getConnection()->query($update_origem) === TRUE) {
                echo "Dados inseridos";
            }
        } else {
            echo "CPF não cadastrado!!";
        }
    }
    public function delete($cpf)
    {
        $sql = "SELECT cpf FROM participante WHERE cpf = '$cpf' ";

        $result = $this->connect->getConnection()->query($sql);

        if ($result->num_rows > 0) {
            $delete = "DELETE FROM participante WHERE cpf = '$cpf'";
            if ($this->connect->getConnection()->query($delete) === TRUE) {
                echo "Dados Deletados com Sucesso";
            } else
                echo "CPF nao Encontrado!";
        }
    }

    function __destruct()
    {
        $this->connect->closeConnection();
    }
}
