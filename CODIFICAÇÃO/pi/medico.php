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
    <title>Prontuários Online</title>
    <link rel="shortcut icon" type="image/png" href="./images/logos/favicon.png" />
    <link rel="stylesheet" href="./css/styles.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <?php if (isset($mensagemErro)) { ?>
        <p>
            <?php echo $mensagemErro; ?>
        </p>
    <?php } ?>
    <!--  div centralizada usei o padrao css min -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./home.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="./images/logos/logo_padrao.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Prontuários Online</p>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="crm" class="form-label">Usuário</label>
                                        <input type="text" class="form-control" id="crm" name="crm"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Lembrar-me!
                                            </label>
                                        </div>
                                    </div>

                                    <a class="">
                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                            Login
                                        </button>
                                    </a>
                                    <a href="./index.php" class="">
                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                            Voltar
                                        </button>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-center">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./libs/jquery/dist/jquery.min.js"></script>
    <script src="./libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>