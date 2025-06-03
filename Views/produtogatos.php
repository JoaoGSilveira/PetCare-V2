<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Início</title>
    <?php require_once "Models/Dependencias.php";?>
    <link rel='stylesheet' href='css/produtos.css'>
</head>
<body>

    <?php
        require_once "Views/navbar.php";
    ?>

    <main class="container mt-4"> 
        <div class="mapasite">
            <p>Onde estou?</p>
            <br>
            <p><a class="mapnav" href="/petcare/">Início -></a></p><p class="wherelocal">Produtos para Gatos</p>
        </div>

        <h2 class="titlecategoria mt-5 mb-4">Produtos para Gatos:</h2>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            <?php
            
                foreach ($produtos_gatos as $produto) {
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

    <?php
    
        require_once "Views/footer.php";

    ?>
    
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