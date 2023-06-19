<?php
session_start();
require_once 'class/func.php';
require_once 'class/log_consult.php';

$paciente = new Login();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $result = $paciente->selectLinha($cpf);

    if (!$result) {
        echo "<script>alert('Não foram encontrados dados para esse CPF');</script>";
        header("location: cad_paciente.php");
    } else {
        // Chama a função para inserir o cadastro de pacientes
        $nome = $_POST['nome'];
        $dt_nasc = $_POST['dt_nasc'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $nome_mae = $_POST['nome_mae'];
        $naturalidade = $_POST['naturalidade'];
        $endereco = $_POST['endereco'];

        $paciente = new Login();
        $paciente->updatePaciente($nome, $dt_nasc, $sexo, $telefone, $nome_mae, $naturalidade, $endereco, $cpf);

        unset($paciente);
    }
}
$login = new Login();
?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prontuário Online</title>
    <link rel="shortcut icon" type="image/png" href="./images/logos/favicon.png" />
    <link rel="stylesheet" href="./css/styles.min.css" />
</head>

<body>
    <!--  class body css modificado -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- barra lateral  nao consegui corrigir o bug do mobile ainda -->

        <!-- vou ocultar o logo versão mobile-->
        <aside class="left-sidebar">
            <div>
                <!-- logo esta bugado vou deixar sem por enquanto / se corrigir da pra tentar puxar imagem do cadastro no banco de dados | bootstrap aqui-->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./home.php" class="text-nowrap logo-img">
                        <img src="./images/logos/home.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Inicio</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./guia.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Guia de consultas</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Pacientes</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./prontuario.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Prontuarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./relatorios.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Relatorios</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Medico</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./guiamedico.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mood-happy"></i>
                                </span>
                                <span class="hide-menu">Guia medico</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./hospitais.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Hospitais</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="#" onclick="sairPagina()" target="_blank" class="btn btn-primary"><button type="submit" class="btn">
                                    <script>
                                        function sairPagina() {
                                            window.location.href = "logout.php";
                                        };
                                    </script>Sair
                                </button></a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->




            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <h1>Alterar cadastro de Paciente</h1>
                        </div>
                    </div>

                    <div class="container">
                        <h3>Digite o CPF do paciente que deseja alterar</h3>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>
                            <div class="form-group">
                                <h3>Digite os dados que deseja alterar</h3>

                            </div>




                            <div class="container">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="dt_nasc">Data de Nascimento:</label>
                                    <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" required>
                                </div>
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control" id="sexo" name="sexo" required>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                                </div>
                                <div class="form-group">
                                    <label for="nome_mae">Nome da Mãe:</label>
                                    <input type="text" class="form-control" id="nome_mae" name="nome_mae" required>
                                </div>
                                <div class="form-group">
                                    <label for="naturalidade">Naturalidade:</label>
                                    <input type="text" class="form-control" id="naturalidade" name="naturalidade" required>
                                </div>
                                <div class="form-group">
                                    <label for="endereco">Endereço:</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                                </div>
                                <div class="form-group">
                                    <label for="endereco"></label>

                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <a href="#" onclick="sairPagina()" target="_blank" class=""><button type="submit" class="btn btn-primary">
                                <script>
                                    function sairPagina() {
                                        window.location.href = "cad_paciente.php";
                                    };
                                </script>Voltar
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>


        <!-- consulta nova -->


    </div>
    <script src="./libs/jquery/dist/jquery.min.js"></script>
    <script src="./libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/sidebarmenu.js"></script>
    <script src="./js/config.js"></script>
    <script src="./js/app.min.js"></script>
    <script src="./libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./libs/simplebar/dist/simplebar.js"></script>
    <script src="./js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>