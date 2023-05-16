<?php
// Verifica se o usuário está autenticado
session_start();
if (!isset($_SESSION['usuario'])) {
    // Redireciona para a página de login se o usuário não estiver autenticado
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Página principal</title>
</head>

<body>
    <p></p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>

    <header>
        <h3 class="logo">Bem-vindo, <?php echo $_SESSION['usuario']; ?></h3>
        <nav class="navigation">
            <a class="aheader" href="#">Homer</a>
            <a class="aheader" href="#">Serviços</a>
            <a class="aheader" href="#">Prontuarios</a>
            <a class="aheader" href="#">Sair</a>

            <a class="a1" href="logout.php"><button class="btnlogin-popup">Sair</button></a>
        </nav>
    </header>
    <section class="flexhome"></section>
    <div class="centrallogin">
        <div class="wrapper">
            <div class="form-box">
                <h2>Login</h2>
                <form action="validacao.php">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                        <input type="email" name="usuario" id="txtUsuario" class="email" required>
                        <label for="email">Usuário</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="senha" id="txtSenha" class="password" required>
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
    </div>


    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>