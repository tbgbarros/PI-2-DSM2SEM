<?php
session_start();
require_once 'class/func.php';

if (!Login::estaLogado()) {
    header('Location: paciente.php');
    exit;
} else {
    $sessionID = Login::estaLogado();
    $sessionNome = Login::nomeLogado();
}


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
                        <img src="./images/logos/logo_padrao.svg" width="180" alt="" />
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
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_prontuario.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-dashboard"></i>
                                </span>
                                <span class="hide-menu">Cadastro Consulta</span>
                            </a>
                        </li>
                        <!-- divisao cadastro -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Cadastro</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_paciente.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout"></i>
                                </span>
                                <span class="hide-menu">Cadastro Paciente</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_prontuario.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-dashboard"></i>
                                </span>
                                <span class="hide-menu">Cadastro Prontuarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_medico.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-table"></i>
                                </span>
                                <span class="hide-menu">Cadastro Medicos</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./cad_hospital.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-table"></i>
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
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Pacientes</span>
                            </a>
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
                <!-- nav sidebar -->
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
                            <a href="#" onclick="sairPagina()" target="_blank" class="btn btn-primary"><button
                                    type="submit" class="btn">
                                    <script>
                                        function sairPagina() {
                                            window.location.href = "logout.php";
                                        };
                                    </script>Sair
                                </button></a>
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
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
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
                            <h1>Hospitais</h1>
                        </div>
                    </div>
                    <!-- 8 x 4 x 4 as div-->


                </div>
            </div>


            <!-- consulta nova -->

            <main>
                <section class="featured-places">
                    <div class="container">
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome Hospital</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>Responsavel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        require_once 'class/func.php';
                                        // Chama a função para buscar os pacientes
                                        $pacientes = new Login();
                                        $consultaHospitais = $pacientes->listarHospitais();

                                        // Verifica se existem registros retornados
                                        if (!empty($consultaHospitais)) {
                                            // Itera sobre os registros e exibe na tabela
                                            while ($row = $consultaHospitais->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["ID_hospital"] . "</td>";
                                                echo "<td>" . $row["nome_hospital"] . "</td>";
                                                echo "<td>" . $row["endereco"] . "</td>";
                                                echo "<td>" . $row["telefone"] . "</td>";
                                                echo "<td>" . $row["responsavel"] . "</td>";
                                                // Adicione aqui mais colunas conforme necessário                                        
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
                                        }
                                        ?>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editar" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="atualizarPacientes.php" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <label>Nome</label>
                                                                <input type="text" name="nome" value="nome"
                                                                    class="form-control" required />
                                                            </div>
                                                            <div class="col-md-7">
                                                                <label>Nascimento</label>
                                                                <input type="text" name="dt_nasc" value="dt_nasc"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Sexo</label>
                                                                <input type="text" name="sexo" value="sexo"
                                                                    class="form-control" required />"
                                                                value="dfgdfgfg" class="form-control" required />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Telefone</label>
                                                                <input type="number" name="telefone" value="telefone"
                                                                    class="form-control" required />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Mãe</label>
                                                                <input type="text" name="nome_mae" value="nome_mae"
                                                                    class="form-control" required />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Naturalidade</label>
                                                                <input type="text" name="nome_mae" value="nome_mae"
                                                                    class="form-control" required />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Endereco</label>
                                                                <input type="text" name="nome_mae" value="nome_mae"
                                                                    class="form-control" required />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>CPF</label>
                                                                <input type="number" name="nome_mae" value="nome_mae"
                                                                    class="form-control" required />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <br>
                                                                <input type="hidden" name="cpf" value="cpf" />
                                                                <button class="btn btn-primary" type="submit"
                                                                    name="editar">Editar</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </main>
            <!-- fim consulta nova -->
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