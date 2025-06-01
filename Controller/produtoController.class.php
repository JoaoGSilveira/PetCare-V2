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
}

?>