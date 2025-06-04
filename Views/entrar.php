<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Login</title>
    <?php require_once "Models/Dependencias.php";?>
    <link rel='stylesheet' href='css/entraroucadastrar.css'>
</head>
<body class="corpo-entrar">
    <?php require_once "navbar.php";?>

    <?php 
        $mensagemSucesso = Session::flash('success_message');
        $mensagemErroLogin = Session::flash('error_message');
    ?>

    <div class = "Espacamento"></div>
    
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">

        <div class="login-card me-md-5 mb-4 mb-md-0">
            <h3 class="mb-4 text-center">Acessar sua conta</h3>
            <form method="POST" action="/petcare/Entrar"> 
                <div class="mb-3">
                    <label for="loginEmail" class="form-label fw-bold">Login</label>
                    <input type="email" class="form-control" id="loginEmail" name="login" 
                           value="<?php echo htmlspecialchars($_POST['login'] ?? '');?>" 
                           placeholder="Digite seu E-mail">
                    <div style="color:red; text-align: left;"><?php echo htmlspecialchars($msgerro[0] ?? '');?></div>
                </div>
                <div class="mb-4">
                    <label for="loginSenha" class="form-label fw-bold">Senha</label>
                    <input type="password" class="form-control" id="loginSenha" name="senhalogin" 
                           placeholder="Digite sua senha aqui">
                    <div style="color:red; text-align: left;"><?php echo htmlspecialchars($msgerro[1] ?? '');?></div>
                    <div style="color:red; text-align: left;"><?php echo htmlspecialchars($mensagemErroLogin ?? ''); ?></div>
                </div>
                <button type="submit" class="btn btn-primary-custom">Entrar</button>
            </form>
        </div>

        <div class="create-account-section ms-md-5">
            <h2 class="mb-4">Ainda não possui uma conta? Criar uma conta é rápido, fácil e gratuito!</h2>
            <p class="mb-4">Com a sua conta da PetCare você tem acesso a ofertas, descontos, acompanhar os seus pedidos e muito mais!</p>
            <button class="btn btn-outline-secondary-custom">Criar minha conta!</button>
        </div>

    </div>

    <br><br>

    <div id="success-message-container" style="display:none;">
        <div class="success-message-box"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(function(dropdown) {
                dropdown.addEventListener('mouseover', function() {
                    this.querySelector('.dropdown-toggle').click();
                });
                dropdown.addEventListener('mouseout', function() {
                    setTimeout(() => {
                        if (!this.querySelector('.dropdown-menu').matches(':hover')) {
                            this.querySelector('.dropdown-toggle').click();
                        }
                    }, 200);
                });
            });
        });
    </script>

    <script>

        // Script para mensagem de login e redirecionamento para proxima página.

        document.addEventListener('DOMContentLoaded', function() {

            const successMessage = "<?php echo $mensagemSucesso; ?>"; 
            const successMessageContainer = document.getElementById('success-message-container');
            const successMessageBox = successMessageContainer.querySelector('.success-message-box');

            if (successMessage) {
                successMessageBox.innerHTML = successMessage;
                successMessageContainer.style.display = 'block';

                // Tempo de espera e redirecionamento para página inicial.
                setTimeout(function() {
                    window.location.href = '/petcare/';
                }, 2000); //2 segundos
            }
        });
    </script>

    <?php require_once "footer.php";?>
</body>
</html>