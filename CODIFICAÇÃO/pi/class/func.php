<?php
require_once('infocon.php');

class Login
{   
    private $connect;

    public function __construct()
    {
        $this->connect=new conexao2();
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
            $this->criarSessao($dadosUsuario['ID_usuario']);
            return true;
        } else {
            return false;
        }
    }

    private function criarSessao($idUsuario)
    {
        session_start();
        $_SESSION['usuario'] = $idUsuario;
    }

    public static function estaLogado()
    {
        return isset($_SESSION['usuario']);
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


}
