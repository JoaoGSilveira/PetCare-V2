<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Início</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="navbar-logo-img" src="icon/CachorroCasinha.png" alt="Logo PetCare">
                <h1>PetCare</h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarContent">
                <form class="d-flex mx-auto col-lg-4" role="search">
                    <input class="form-control me-2" type="search" placeholder="O que você deseja hoje?"
                        aria-label="Search" />
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <ul class="navbar-nav navbar-actions ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-heart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" href="#">
                            <i class="bi bi-person"></i> Entrar ou <br>Cadastrar-se
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-categories">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none" href="#">Categorias</a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#categoriesNavbarContent" aria-controls="categoriesNavbarContent" aria-expanded="false"
                aria-label="Toggle categories navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="categoriesNavbarContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos para Gatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos para Cães</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Serviços</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-4"> 
        <div class="mapasite">
            <p>Onde estou?</p>
            <br>
            <p class="wherelocal">inicio</p>
        </div>

        <h2 class="titlecategoria mt-5 mb-4">Produtos:</h2>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            <?php
            
            foreach ($retorno_produtos as $produto) {
                ?>
                <div class="col">
                    <div class="card h-100 product-card"> <img src='Foto_Produtos/<?php echo htmlspecialchars($produto->imagem); ?>' class="card-img-top product-img" alt='Imagem do Produto'>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title product-title"><?php echo htmlspecialchars($produto->nome); ?></h5>
                            <p class="card-text product-price">R$ <?php echo htmlspecialchars(number_format($produto->preco, 2, ',', '.')); ?></p>
                            <div class="mt-auto"> <button class="btn btn-primary w-100 add-to-cart-btn">
                                    Adicionar ao Carrinho <i class="bi bi-cart-plus"></i> 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>

    <footer class="footer mt-5 py-3 bg-dark text-white text-center">
        <p>&copy; <?php echo date("Y"); ?> PetCare. Todos os direitos reservados.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <script>
        // JavaScript para a funcionalidade de busca de produtos
        document.addEventListener("DOMContentLoaded", function() {
            // Seleciona o input da barra de pesquisa no navbar principal
            const searchBar = document.querySelector('form.navbar-search-form input[type="search"]');
            // Seleciona todos os cards de produto
            const productCards = document.querySelectorAll('.product-card'); 

            if (searchBar && productCards.length > 0) { // Garante que os elementos existem antes de adicionar o listener
                searchBar.addEventListener('input', function() {
                    const searchTerm = searchBar.value.trim().toLowerCase();

                    productCards.forEach(function(card) {
                        // Seleciona o nome do produto dentro do card
                        const productNameElement = card.querySelector('.product-title');
                        const productName = productNameElement ? productNameElement.textContent.toLowerCase() : '';
                        
                        // Encontra o elemento '.col' pai do card
                        const parentCol = card.closest('.col');

                        if (parentCol) { // Garante que a coluna pai existe
                            if (productName.includes(searchTerm)) {
                                parentCol.style.display = 'block'; // Mostra a coluna do card
                            } else {
                                parentCol.style.display = 'none'; // Esconde a coluna do card
                            }
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>