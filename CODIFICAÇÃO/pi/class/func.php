<?php
class Login
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function autenticar($usuario, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $dadosUsuario = $resultado->fetch_assoc();
            $this->criarSessao($dadosUsuario['id']);
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
}
