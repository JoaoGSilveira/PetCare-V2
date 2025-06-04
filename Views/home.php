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

        <div class="container-fluid">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img class="carousel-images" src="Images/banner01.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img class="carousel-images" src="Images/banner02.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img class="carousel-images" src="Images/banner03.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>

        <h2 class="titlecategoria mt-5 mb-4">Todos os Produtos:</h2>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            <?php
                foreach ($retorno_produtos as $produto) {
                    ?>
                    <div class="col">
                        <div class="card h-100 product-card"> 
                            <img src='Foto_Produtos/<?php echo htmlspecialchars($produto->imagem); ?>' class="card-img-top product-img" alt='Imagem do Produto'>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title product-title"><?php echo htmlspecialchars($produto->nome); ?></h5>
                                <p class="card-text product-price">R$ <?php echo htmlspecialchars(number_format($produto->preco, 2, ',', '.')); ?></p>
                                <div class="mt-auto"> 
                                    <form action="/petcare/carrinho/adicionar" method="POST">
                                        <input type="hidden" name="id_produto" value="<?php echo htmlspecialchars($produto->id_produto); ?>">
                                        <input type="hidden" name="quantidade" value="1"> <button type="submit" class="btn btn-primary w-100 add-to-cart-btn">
                                            Adicionar ao Carrinho <i class="bi bi-cart-plus"></i> 
                                        </button>
                                    </form>
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
        require_once "Models/pesquisa.php";
        require_once "Views/footer.php";
    ?>
</body>
</html>