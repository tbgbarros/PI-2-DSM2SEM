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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.css">
  <link rel="stylesheet" href="./css/style.css" />
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
            <img src="./images/logos/home.png" width="120" alt="" />
          </a>
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="./cad_medico.php" aria-expanded="false">
                <span>
                  <i class=""></i>
                </span>
                <span class="hide-menu"></span>
              </a>
            </li>
          </ul>

        </nav>
        <!-- fim nav sidebar navigation -->
      </div>
      <!-- sidebar scroll-->
    </aside>
    <!--  sidebar -->

    <!--  main -->
    <div class="body-wrapper">
      <!--  menu cima se for migrar do lateral pro superior -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:console.log('javascript');alert('<?php echo $sessionNome; ?>')">
                <i class=" ti-bell-ringing">
                  <?php echo 'Dr(a) ' . $sessionNome; ?>
                </i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="#" onclick="sairPagina()" target="_blank" class=""><button type="submit" class="btn btn-primary">
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
                    <a href="infomedico.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Meu Perfil</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">Meus compromissos</p>
                    </a>
                    <a href="./logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Sair</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  header -->
      <div class="container-fluid">
        <!--  tabela sql consulta  -->
        <div class="row ">
          <div class="col-lg-8 d-flex p-1">
            <!--bug div chart2 -->
            <div class="card w-100">
              <div class="card-body p-2">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0  ">
                    <h5 class="card-title fw-semibold  ">Consultas por periodo</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">Junho 2023</option>
                      <option value="2">Maio 2023</option>
                      <option value="3">Abril 2023</option>
                      <option value="4">Março 2023</option>
                    </select>
                  </div>
                </div>
                <div class="" id="chart2"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- ano -->
                <div class="card overflow-hidden">
                  <div class="card-body p-5">
                    <h5 class="card-title mb-9 fw-semibold">Consultas anuais</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">560</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">Ultimo ano</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2022</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!-- mensal -->
                <div class="card">
                  <div class="card-body p-5">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Consultas mensais </h5>
                        <h4 class="fw-semibold mb-3">38</h4>
                        <div class="d-flex align-items-center pb-1">
                          <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+2%</p>
                          <p class="fs-3 mb-0">ultimo mês</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-calendar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="earning"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- divisao primeira parte-->
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Ultimas horarios</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">Mariana ferreira</div>
                  </li>
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Carlos Alberto
                    </div>
                  </li>
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">10:30 am</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">Thiago Barros</div>
                  </li>
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">13:30 pm</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Henrique Oliveira
                    </div>
                  </li>
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">14:00 am</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Juliano Moreira
                    </div>
                  </li>
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">15:30 pm</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">Romeu Josefino</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Consultas Recentes</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Data</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Paciente</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Telefone</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Retorno</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Exames</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">15/06/2023</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">Joaquim Santos</h6>
                          <span class="fw-normal">Retorno</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">(19)9852-31245</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-danger rounded-3 fw-semibold">SIM</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <span class="badge bg-danger rounded-3 fw-semibold">SIM</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">15/06/2023</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">Henrique muniz</h6>
                          <span class="fw-normal">Primeira consulta</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">(19)95236-8541</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-danger rounded-3 fw-semibold">SIM</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <span class="badge bg-danger rounded-3 fw-semibold">SIM</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">15/06/2023</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">Jamal Cruz</h6>
                          <span class="fw-normal">Padrão</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">(19)98521-4352</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success rounded-3 fw-semibold">NÃO</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <span class="badge bg-success rounded-3 fw-semibold">NÃO</span>
                        </td>
                      </tr>

                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">15/06/2023</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">Guilherme Afonso</h6>
                          <span class="fw-normal">Padrão</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">(19)99854-2345</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success rounded-3 fw-semibold">NÃO</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <span class="badge bg-success rounded-3 fw-semibold">NÃO</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.js"></script>

    <script src="./libs/jquery/dist/jquery.min.js"></script>
    <script src="./libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/meu.js"></script>
    <script src="./js/sidebarmenu.js"></script>
    <script src="./js/app.min.js"></script>
    <script src="./libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./libs/simplebar/dist/simplebar.js"></script>
    <script src="./js/dashboard.js"></script>
</body>

</html>