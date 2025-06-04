<?php

class CarrinhoController {

    private $param;

    public function __construct() {
        $this->param = Conexao::getInstancia();
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProduto = filter_input(INPUT_POST, 'id_produto', FILTER_VALIDATE_INT);
            $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

            if (!$quantidade || $quantidade < 1) {
                $quantidade = 1;
            }

            if ($idProduto) {
                $produtoDAO = new ProdutoDAO($this->param);
                $produto = $produtoDAO->buscarPorId($idProduto);

                if ($produto && $produto->getStatus() === 'Ativo' && $produto->getEstoque() >= $quantidade) {
                    
                    $itemCarrinho = [
                        'id_produto' => $produto->getIdProduto(),
                        'nome' => $produto->getNome(),
                        'preco' => $produto->getPreco(),
                        'imagem' => $produto->getImagem(),
                        'quantidade' => $quantidade,
                        'subtotal' => $produto->getPreco() * $quantidade
                    ];

                    if (Session::has('carrinho') && array_key_exists($idProduto, Session::get('carrinho'))) {

                        $carrinhoAtual = Session::get('carrinho');
                        $carrinhoAtual[$idProduto]['quantidade'] += $quantidade;
                        $carrinhoAtual[$idProduto]['subtotal'] = $carrinhoAtual[$idProduto]['preco'] * $carrinhoAtual[$idProduto]['quantidade'];
                        Session::set('carrinho', $carrinhoAtual);
                        Session::set('success_message', 'Quantidade do produto atualizada no carrinho!');

                    } else {
                        $carrinho = Session::get('carrinho', []); // Inicializa se não existir
                        $carrinho[$idProduto] = $itemCarrinho;
                        Session::set('carrinho', $carrinho);
                        Session::set('success_message', 'Produto adicionado ao carrinho!');
                    }
                } else {
                    Session::set('error_message', 'Produto não encontrado, indisponível ou fora de estoque.');
                }
            } else {
                Session::set('error_message', 'ID do produto inválido.');
            }
        }

        header("Location: /petcare/carrinho");
        exit;
    }

    public function remover() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProduto = filter_input(INPUT_POST, 'id_produto', FILTER_VALIDATE_INT);

            if ($idProduto && Session::has('carrinho')) {
                $carrinho = Session::get('carrinho');
                if (array_key_exists($idProduto, $carrinho)) {
                    unset($carrinho[$idProduto]);
                    Session::set('carrinho', $carrinho);
                    Session::set('success_message', 'Produto removido do carrinho!');
                } else {
                    Session::set('error_message', 'Produto não encontrado no carrinho.');
                }
            } else {
                Session::set('error_message', 'ID do produto inválido ou carrinho vazio.');
            }
        }
        header("Location: /petcare/carrinho");
        exit;
    }

    public function atualizarQuantidade() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProduto = filter_input(INPUT_POST, 'id_produto', FILTER_VALIDATE_INT);
            $novaQuantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

            if ($idProduto && $novaQuantidade !== false && $novaQuantidade >= 0 && Session::has('carrinho')) {
                $carrinho = Session::get('carrinho');
                if (array_key_exists($idProduto, $carrinho)) {
                    if ($novaQuantidade === 0) {
                        unset($carrinho[$idProduto]);
                        Session::set('success_message', 'Produto removido do carrinho.');
                    } else {
                        $produtoDAO = new ProdutoDAO($this->param);
                        $produto = $produtoDAO->buscarPorId($idProduto);
                        if ($produto && $produto->getEstoque() >= $novaQuantidade) {
                            $carrinho[$idProduto]['quantidade'] = $novaQuantidade;
                            $carrinho[$idProduto]['subtotal'] = $carrinho[$idProduto]['preco'] * $novaQuantidade;
                            Session::set('success_message', 'Quantidade atualizada no carrinho!');
                        } else {
                            Session::set('error_message', 'Quantidade solicitada excede o estoque.');
                        }
                    }
                    Session::set('carrinho', $carrinho);
                } else {
                    Session::set('error_message', 'Produto não encontrado no carrinho.');
                }
            } else {
                Session::set('error_message', 'Dados de atualização inválidos.');
            }
        }
        header("Location: /petcare/carrinho");
        exit;
    }

    public function limpar() {
        Session::remove('carrinho');
        Session::set('success_message', 'Carrinho esvaziado!');
        header("Location: /petcare/carrinho");
        exit;
    }

    public function index() {
        $carrinhoItems = Session::get('carrinho', []);
        $totalCarrinho = 0;
        foreach ($carrinhoItems as $item) {
            $totalCarrinho += $item['subtotal'];
        }

        $mensagemSucesso = Session::flash('success_message');
        $mensagemErro = Session::flash('error_message');

        require_once "Views/carrinho.php";
    }
}
?>