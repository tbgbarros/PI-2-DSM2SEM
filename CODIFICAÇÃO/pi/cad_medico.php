<?php
session_start();
require_once 'class/func.php';
require_once 'class/log_consult.php';
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- barra lateral  nao consegui corrigir o bug do mobile ainda -->

        <!-- vou ocultar o logo versão mobile-->
        <aside class="left-sidebar">
            <div>
                <!-- logo esta bugado vou deixar sem por enquanto / se corrigir da pra tentar puxar imagem do cadastro no banco de dados | bootstrap aqui-->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./home.php" class="text-nowrap logo-img">
                        <img src="./images/logos/home.svg" width="120" alt="" />
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
                        <!-- divisao cadastro -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Cadastro</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_prontuario.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-bookmarks"></i>
                                </span>
                                <span class="hide-menu">Cadastro Consulta</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_paciente.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-address-book"></i>
                                </span>
                                <span class="hide-menu">Cadastro Paciente</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_medico.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-medical-cross"></i>
                                </span>
                                <span class="hide-menu">Cadastro Medicos</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_hospital.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-building-hospital"></i>
                                </span>
                                <span class="hide-menu">Cadastro Hospitais</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Pacientes</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./paciente.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-meteor"></i>
                                </span>
                                <span class="hide-menu">Pacientes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./prontuario.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-report-medical"></i>
                                </span>
                                <span class="hide-menu">Prontuarios</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Medico</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./guiamedico.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-book-2"></i>
                                </span>
                                <span class="hide-menu">Guia medico</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./hospitais.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-building-hospital"></i>
                                </span>
                                <span class="hide-menu">Hospitais</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class=""></i>
                            <span class="hide-menu"></span>
                        </li>
                    </ul>

                </nav>
                <!-- fim nav sidebar navigation -->
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
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover"
                                href="javascript:console.log('javascript');alert('<?php echo $sessionNome; ?>')">
                                <i class=" ti-bell-ringing">
                                    <?php echo 'Dr(a) ' . $sessionNome; ?>
                                </i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="#" onclick="sairPagina()" target="_blank" class=""><button type="submit"
                                    class="btn btn-primary">
                                    <script>
                                        function sairPagina() {
                                            window.location.href = "logout.php";
                                        };
                                    </script>Sair
                                </button>
                            </a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Meu perfil</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">Minhas Consultas</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Sair</a>
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
                            <h1>Cadastro de Medicos</h1>
                        </div>
                    </div>
                    <div class="container">
                    </div>
                    <div class="container">
                        <form method="post" action="cad_medico_call.php">
                            <div class="form-group">
                                <label for="nomemedico">Nome medico:</label>
                                <input type="text" class="form-control" id="nomemedico" name="nomemedico" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="dt_nasc">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="sexo">Sexo:</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro</option>
                                    <option value="Prefiro não informar">Prefiro não informar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="crm">CRM:</label>
                                <input type="text" class="form-control" id="crm" name="crm" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="especializacao">Especializacao:</label>
                                <input type="text" class="form-control" id="especializacao" name="especializacao"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="naturalidade">Naturalidade:</label>
                                <input type="text" class="form-control" id="naturalidade" name="naturalidade" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="hospital">Hospital:</label>
                                <select class="form-control" id="hospital" name="hospital">
                                    <?php
                                    $consult = new Login();
                                    $consultaConsultas = $consult->buscarHospitais();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <div class="form-group">
                            <label for=""></label>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                        </div>

                        <a href="alterarMedico.php">
                            <button type="submit" class="btn btn-primary">
                                Alterar cadastro
                            </button>
                        </a>
                        <div class="form-group">
                            <label for=""></label>
                        </div>
                        <a href="deletarMedico.php">
                            <button type="submit" class="btn btn-primary">
                                Deletar cadastro
                            </button>
                        </a>
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
</body>

</html>