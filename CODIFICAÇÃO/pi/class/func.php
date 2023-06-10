<?php
use LDAP\Result;

require_once('infocon.php');

class Login
{
    private $connect;

    public function __construct()
    {
        $this->connect = new conexao2();
    }



    public function autenticar($usuario, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $dadosUsuario = $resultado->fetch_assoc();
            $this->criarSessao($dadosUsuario['ID_usuario'], $dadosUsuario['nome']);
            return true;
        } else {
            return false;
        }
    }

    public function autenticarMedico($usuario, $senha)
    {
        $query = "SELECT * FROM medico WHERE crm = ? AND senha = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $dadosUsuario = $resultado->fetch_assoc();
            $this->criarSessaoMedico($dadosUsuario['ID_medico'], $dadosUsuario['nome']);
            return true;
        } else {
            return false;
        }
    }

    private function criarSessao($idUsuario, $nomeUsuario)
    {
        session_start();
        $_SESSION['ID_usuario'] = $idUsuario;
        $_SESSION['nome'] = $nomeUsuario;
    }

    private function criarSessaoMedico($idUsuario, $nomeMedico)
    {
        session_start();
        $_SESSION['ID_usuario'] = $idUsuario;
        $_SESSION['nome'] = $nomeMedico;
    }

    public static function estaLogado()
    {
        return ($_SESSION['ID_usuario']);
    }

    public static function nomeLogado()
    {
        return ($_SESSION['nome']);
    }

    public static function encerrarSessao()
    {
        session_start();
        session_destroy();
    }


    public function listarPaciente()
    {
        $query = "SELECT * FROM pacientes";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $resultadoPacientes = $stmt->get_result();
        return $resultadoPacientes;
    }

    public function listarMedicos()
    {
        $query = "SELECT * FROM medico";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $resultadoMedicos = $stmt->get_result();
        return $resultadoMedicos;
    }

    public function listarHospitais()
    {
        $query = "SELECT * FROM hospital";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $resultadoHospitais = $stmt->get_result();
        return $resultadoHospitais;
    }


    public function cadastroPacientes($nome, $dtNasc, $sexo, $telefone, $nomeMae, $naturalidade, $endereco, $cpf)
    {
        //inseri os dados
        $query = "INSERT INTO pacientes (nome, dt_nasc, sexo, telefone, nome_mae, naturalidade, endereco, cpf)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("ssssssss", $nome, $dtNasc, $sexo, $telefone, $nomeMae, $naturalidade, $endereco, $cpf);
        $stmt->execute();
        // verifica
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_paciente.php";
            </script>';
        } else {
            echo '<script>
            alert("Falha na inserão dos dados!");
            window.location.href = "cad_paciente.php";
            </script>';
        }
        $stmt->close();
    }
    //update
    public function selectLinha($cpf)
    {
        $query = "SELECT * FROM pacientes WHERE cpf = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $row = $resultado->fetch_assoc();
            $result = $row['cpf'];
            return $result;
        } else {
            return false;
        }

    }

    public function updatePaciente($nome, $dtNasc, $sexo, $telefone, $nomeMae, $naturalidade, $endereco, $cpf)
    {
        $upPaciente = "UPDATE pacientes SET nome = ?, dt_nasc = ?, sexo = ?, telefone = ?, nome_mae = ?, naturalidade = ?, endereco = ? WHERE cpf = ?";
        $stmt = $this->connect->getConexao()->prepare($upPaciente);
        $stmt->bind_param("ssssssss", $nome, $dtNasc, $sexo, $telefone, $nomeMae, $naturalidade, $endereco, $cpf);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_paciente.php";
            </script>';

        }
    }

    public function deletarPaciente($cpf)
    {
        $delPaciente = "DELETE FROM pacientes WHERE cpf = ?";
        $stmt = $this->connect->getConexao()->prepare($delPaciente);
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados excluidoscom sucesso!");
            window.location.href = "cad_paciente.php";
            </script>';


        } else {
            echo '<script>
        alert("Não foi possível excluir os dados!");
        window.location.href = "cad_paciente.php";
        </script>';
        }
        $stmt->close();
    }

    public function cadastroProntuario($dt_consulta, $idMedico, $cpf)
    {
        $insertProntuario = "INSERT INTO consulta (dt_consulta, ID_medico, cpf) VALUES (?, ?, ?)";
        $stmt = $this->connect->getConexao()->prepare($insertProntuario);
        $stmt->bind_param("sis", $dt_consulta, $idMedico, $cpf);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            echo '<script>
        alert("Prontuario inserido com sucesso!");
        window.location.href = "cad_prontuario.php";
        </script>';
        }

    }
}