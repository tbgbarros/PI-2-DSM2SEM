<?php
session_start();
require_once 'validacao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>


    <header>
        <h2 class="logo">Gestão de prontuarios</h2>
        <nav class="navigation">

            <a class="aheader" href="#">Homer</a>
            <a class="aheader" href="#">Serviços</a>
            <a class="aheader" href="#">Prontuarios</a>
            <a class="aheader" href="#">Sair</a>
            <button class="btnlogin-popup">Sair</button>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box">
            <h2>Login</h2>
            <form method="post" action="">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                    <input type="text" name="usuario" id="usuario" class="text" required>
                    <label for="email">Usuário</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="senha" id="senha" class="password" required>
                    <label for="email">Password</label>
                </div>
                <div class="lembrar-login">
                    <label><input type="checkbox" class="checkbox">
                        Lembrar-me</label>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-registro">
                    <p>Deseja criar conta?<a href="#" class="register-link">Registrar</a></p>
                </div>
            </form>
        </div>
    </div>


    <!-- exibicao do erro -->
    <?php if (isset($erro)) { ?>
        <p>
        <div class="flexhome">
            <div class="">
                <h2><?php echo $erro; ?></h2>
                </form>
            </div>
        </div>
        </p>
    <?php } ?>

    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>