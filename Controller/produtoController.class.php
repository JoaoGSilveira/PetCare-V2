<?php

class produtoController{

    private $param;

	public function __construct()
	{
		$this->param = Conexao::getInstancia();
	}

    public function listar_produtos()
    {
        $produtoDAO = new ProdutoDAO($this->param);
        $retorno_produtos = $produtoDAO->buscar_todos();

        require_once "Views/home.php";
    }

    public function listar_produtos_caes(){
        
        $produtoDAO = new ProdutoDAO($this->param);
        $categoriaDAO = new CategoriaDAO($this->param);

        $produtos = $produtoDAO->buscar_todos();

        $produtos_cachorros = array_filter($produtos, function($produto) {
            return $produto->animal === 'Cachorro' || $produto->animal === 'Ambos';
        });
        
        require_once "Views/produtocaes.php";
    }

    public function listar_produtos_gatos(){
        $produtoDAO = new ProdutoDAO($this->param);
        $categoriaDAO = new CategoriaDAO($this->param);

        $produtos = $produtoDAO->buscar_todos();

        $produtos_gatos = array_filter($produtos, function($produto) {
            return $produto->animal === 'Gato' || $produto->animal === 'Ambos';
        });

        require_once "Views/produtogatos.php";
    }

    
}

?>