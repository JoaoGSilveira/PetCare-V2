<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Carrinho de Compras</title>
    <?php require_once "Models/Dependencias.php";?>
    <link rel='stylesheet' href='css/carrinho.css'> </head>
<body>
    <?php require_once "navbar.php";?>

    <main class="container mt-5">
        <h1 class="mb-4">Seu Carrinho de Compras</h1>

        <?php 
        // Exibe mensagens flash do controller
        if (isset($mensagemSucesso) && $mensagemSucesso): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($mensagemSucesso); ?>
            </div>
        <?php endif; 
        if (isset($mensagemErro) && $mensagemErro): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($mensagemErro); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($carrinhoItems)): ?>
            <div class="alert alert-info text-center" role="alert">
                Seu carrinho está vazio. <a href="/petcare/">Comece a comprar!</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th></th>
                            <th>Preço Unitário</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrinhoItems as $item): ?>
                            <tr>
                                <td class="align-middle" style="width: 80px;">
                                    <img src="Foto_Produtos/<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" class="img-fluid rounded">
                                </td>
                                <td class="align-middle">
                                    <?php echo htmlspecialchars($item['nome']); ?>
                                </td>
                                <td class="align-middle">R$ <?php echo htmlspecialchars(number_format($item['preco'], 2, ',', '.')); ?></td>
                                <td class="align-middle">
                                    <form action="/petcare/carrinho/atualizar" method="POST" class="d-flex align-items-center">
                                        <input type="hidden" name="id_produto" value="<?php echo htmlspecialchars($item['id_produto']); ?>">
                                        <input type="number" name="quantidade" value="<?php echo htmlspecialchars($item['quantidade']); ?>" min="0" class="form-control form-control-sm text-center" style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary ms-2" title="Atualizar quantidade">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="align-middle">R$ <?php echo htmlspecialchars(number_format($item['subtotal'], 2, ',', '.')); ?></td>
                                <td class="align-middle">
                                    <form action="/petcare/carrinho/remover" method="POST">
                                        <input type="hidden" name="id_produto" value="<?php echo htmlspecialchars($item['id_produto']); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Remover item">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end align-items-center mt-4">
                <h3 class="me-3">Total do Carrinho: R$ <?php echo htmlspecialchars(number_format($totalCarrinho, 2, ',', '.')); ?></h3>
                <a href="/petcare/checkout" class="btn btn-success btn-lg">Finalizar Compra <i class="bi bi-bag-check"></i></a>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="/petcare/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Continuar Comprando</a>
                <form action="/petcare/carrinho/limpar" method="POST">
                    <button type="submit" class="btn btn-warning"><i class="bi bi-trash"></i> Limpar Carrinho</button>
                </form>
            </div>
        <?php endif; ?>
    </main>

    <?php require_once "footer.php";?>
</body>
</html>