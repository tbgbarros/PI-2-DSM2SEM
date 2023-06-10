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
            $this->criarSessaoMedico($dadosUsuario['ID_medico'], $dadosUsuario['nomemedico']);
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
        $_SESSION['nomemedico'] = $nomeMedico;
    }

    public static function estaLogado()
    {
        return ($_SESSION['ID_usuario']);
    }

    public static function estaLogadoADM()
    {
        return ($_SESSION['usuario']);
    }

    public static function nomeLogado()
    {
        return ($_SESSION['nomemedico']);
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

    public function selectLinhacrm($crm)
    {
        $query = "SELECT * FROM medicos WHERE crm = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("s", $crm);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $row = $resultado->fetch_assoc();
            $result = $row['crm'];
            return $result;
        } else {
            return false;
        }
    }

    public function selectHospital($idhosp)
    {
        $query = "SELECT * FROM hospital WHERE ID_hospital = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("i", $idhosp);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $row = $resultado->fetch_assoc();
            $result = $row['ID_hospital'];
            return $result;
        } else {
            return false;
        }

    }

    public function updatePaciente($nome, $dtNasc, $sexo, $telefone, $nomeMae, $naturalidade, $endereco, $cpf)
    {
        $upPaciente = "UPDATE pacientes SET nome = ?, dt_nasc = ?, sexo = ?, telefone = ?,
         nome_mae = ?, naturalidade = ?, endereco = ? WHERE cpf = ?";
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

    public function updateMedico($nomemedico, $dtNasc, $sexo, $telefone, $crm, $especializacao, $naturalidade, $unidade_op, $endereco, $cpf, $senha)
    {
        $upPaciente = "UPDATE medico SET nomemedico = ?, dt_nasc = ?, sexo = ?, telefone = ?,
         crm = ?, especializacao = ?, naturalidade = ?, unidade_op = ?, endereco = ?, cpf = ?, senha = ? WHERE crm = ?";
        $stmt = $this->connect->getConexao()->prepare($upPaciente);
        $stmt->bind_param("sibssssssssss", $nomemedico, $dtNasc, $sexo, $telefone, $crm, $especializacao, $naturalidade, $unidade_op, $endereco, $cpf, $senha);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_paciente.php";
            </script>';

        }
    }

    //update hospital
    public function updateHospital($ID_hospital, $nome_hospital, $endereco, $telefone, $responsavel)
    {
        $upHospital = "UPDATE hospital SET nome_hospital = ?, endereco = ?, telefone = ?, responsavel = ? WHERE ID_hospital = ?";
        $stmt = $this->connect->getConexao()->prepare($upHospital);
        $stmt->bind_param("sssss", $ID_hospital, $nome_hospital, $endereco, $telefone, $responsavel);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_hospital.php";
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

    //listar consultas JOIN
    public function listarConsultas()
    {
        $query = "SELECT p.nome,p.cpf,p.sexo, p.telefone,c.dt_consulta,  
        m.crm, m.nomemedico, m.especializacao, m.unidade_op
        FROM consulta c
        JOIN medico m ON c.ID_medico = m.ID_medico
        JOIN pacientes p ON c.cpf = p.cpf
        ORDER BY c.dt_consulta DESC;";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $resultadoConsultas = $stmt->get_result();
        return $resultadoConsultas;
    }

    //cadastro medico
    public function cadastroMedico(
        $nomemedico,
        $dtNasc,
        $sexo,
        $telefone,
        $crm,
        $especializacao,
        $naturalidade,
        $unidade_op,
        $endereco,
        $cpf,
        $senha
    ) {
        //inseri os dados
        $query = "INSERT INTO medico (nomemedico, dt_nasc, sexo, telefone, crm, especializacao, naturalidade, unidade_op, endereco, cpf, senha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param(
            "sibsssssssi",
            $nomemedico,
            $dtNasc,
            $sexo,
            $telefone,
            $crm,
            $especializacao,
            $naturalidade,
            $unidade_op,
            $endereco,
            $cpf,
            $senha
        );
        $stmt->execute();
        // verifica
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_medico.php";
            </script>';
        } else {
            echo '<script>
            alert("Falha na inserão dos dados!");
            window.location.href = "cad_medico.php";
            </script>';
        }
        $stmt->close();
    }

    function buscarHospitais()
    {
        $query = "SELECT ID_hospital, nome_hospital FROM hospital";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($hospital = $result->fetch_assoc()) {
            echo '<option value="' . $hospital['ID_hospital'] . '">' . $hospital['nome_hospital'] . '</option>';
        }
    }

    function buscarNomesHospitais()
    {
        $query = "SELECT ID_hospital, nome_hospital FROM hospital";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $options = '';
        while ($hospital = $result->fetch_assoc()) {
            $options .= '<option value="' . $hospital['ID_hospital'] . '">' . $hospital['nome_hospital'] . '</option>';
        }

        return $options;
    }

    function buscarSexoPaciente()
    {
        $query = "SELECT ID_hospital, nome_hospital FROM pacientes";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($hospital = $result->fetch_assoc()) {
            echo '<option value="' . $hospital['sexo'] . '">' . '</option>';
        }
    }

    //cadastro medico
    public function cadastroHospital(
        $nome_hospital,
        $endereco,
        $telefone,
        $responsavel
    ) {
        //inseri os dados do hospital
        $query = "INSERT INTO hospital (nome_hospital, endereco, telefone, responsavel)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param(
            "ssss",
            $nome_hospital,
            $endereco,
            $telefone,
            $responsavel
        );
        $stmt->execute();
        // verifica
        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Dados inseridos com sucesso!");
            window.location.href = "cad_hospital.php";
            </script>';
        } else {
            echo '<script>
            alert("Falha na inserão dos dados!");
            window.location.href = "cad_hospital.php";
            </script>';
        }
        $stmt->close();
    }

    function atualizarObservacoesPaciente($cpf, $observacoes)
    {
        $query = "UPDATE pacientes SET observacoes = ? WHERE cpf = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("ss", $observacoes, $cpf);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Observações atualizadas com sucesso!");
            window.location.href = "cad_prontuario.php";
            </script>';
        } else {
            echo '<script>
            alert("Falha ao atualizar observações.");
            window.location.href = "cad_prontuario.php";
            </script>';
        }
    }

    public function inserirArquivoPaciente($cpf, $conteudo_arquivo)
    {
        $query = "UPDATE pacientes SET arquivo = ? WHERE cpf = ?";
        $stmt = $this->connect->getConexao()->prepare($query);
        $stmt->bind_param("ss", $conteudo_arquivo, $cpf);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script>
            alert("Arquivo inserido com sucesso!");
            window.location.href = "cad_paciente.php";
            </script>';
        } else {
            echo '<script>
            alert("Erro ao inserir arquivo no banco de dados.");
            window.location.href = "cad_prontuario.php";
            </script>';
        }
    }

    function uploadArquivo($cpf, $arquivo)
    {
        // Verifica se o arquivo foi enviado corretamente
        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            //echo '<script>
            //alert("Erro ao inserir arquivo no banco de dados.");
            //window.location.href = "cad_prontuario.php";
            //</script>';
            return false;
        }

        // Define o diretório de destino para salvar os arquivos
        $diretorioDestino = "./arquivos/bd";

        // Gera um nome único para o arquivo
        $nomeArquivo = uniqid() . "_" . $arquivo['name'];

        // Move o arquivo temporário para o diretório de destino
        if (move_uploaded_file($arquivo['tmp_name'], $diretorioDestino . $nomeArquivo)) {
            // Insere os dados na tabela "armazena"
            $query = "INSERT INTO armazena (ID_arquivos, cpf) VALUES (?, ?)";
            $stmt = $this->connect->getConexao()->prepare($query);
            $stmt->bind_param("is", $nomeArquivo, $cpf);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo '<script>
                    alert("Arquivo enviado e dados armazenados com sucesso.");
                    window.location.href = "cad_prontuario.php";
                    </script>';

                return true;
            } else {
                echo '<script>
                    alert("Erro ao armazenar os dados do arquivo.");
                    window.location.href = "cad_prontuario.php";
                    </script>';
                return false;
            }
        } else {
            echo '<script>
                    alert("Erro ao mover o arquivo para o destino.");
                    window.location.href = "cad_prontuario.php";
                    </script>';
            return false;
        }
    }


}