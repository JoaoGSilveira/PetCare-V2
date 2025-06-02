<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Login</title>
    <?php require_once "Models/Dependencias.php";?>
</head>
<body class="corpo-entrar">
    <?php require_once "navbar.php";?>

    <div class = "Espacamento"></div>
    
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">

        <div class="login-card me-md-5 mb-4 mb-md-0">
            <h3 class="mb-4 text-center">Acessar sua conta</h3>
            <form>
                <div class="mb-3">
                    <label for="loginEmail" class="form-label fw-bold">Login</label>
                    <input type="email" class="form-control" id="loginEmail" placeholder="Digite seu E-mail">
                </div>
                <div class="mb-4">
                    <label for="loginSenha" class="form-label fw-bold">Senha</label>
                    <input type="password" class="form-control" id="loginSenha" placeholder="Digite sua senha aqui">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php require_once "footer.php";?>
</body>
</html>