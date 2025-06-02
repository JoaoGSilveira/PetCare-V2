<?php

class clienteController{

    private $param;

	public function __construct()
	{
		$this->param = Conexao::getInstancia();
	}

    public function login(){
        require_once "Views/entrar.php";
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