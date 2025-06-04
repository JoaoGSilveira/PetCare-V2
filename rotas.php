<?php
	class rotas
	{
		private array $rotas = array();
		
		public function get(string $nome, array $dados)
		{
			$this->rotas['GET'][$nome] = $dados;
		}
		public function post(string $nome, array $dados)
		{
			$this->rotas['POST'][$nome] = $dados;
		}
		public function verificar_rota(string $metodo, string $uri)
		{
			if(isset($this->rotas[$metodo][$uri]))
			{
				$dados_rota = $this->rotas[$metodo][$uri];
				$classe = $dados_rota[0];
				$metodo = $dados_rota[1];
				$obj = new $classe();
				return $obj->$metodo();
			}
			else
			{
				echo "Rota Inválida";
			}
		}
	}
	
	//Rotas
	$route = new Rotas();

	
	
	$route->get("/", [produtoController::class,"listar_produtos"]);
	$route->get("/SobreNos", [inicioController::class,"sobre_nos"]);
	$route->get("/ProdutosParaCaes", [produtoController::class,"listar_produtos_caes"]);
	$route->get("/ProdutosParaGatos", [produtoController::class,"listar_produtos_gatos"]);
	$route->get("/Entrar", [clienteController::class,"login"]);
	$route->post("/Entrar", [clienteController::class,"login"]);
	$route->get("/Sair", [clienteController::class,"logout"]); 
	$route->get("/carrinho", [CarrinhoController::class, "index"]); // Página do carrinho
    $route->post("/carrinho/adicionar", [CarrinhoController::class, "adicionar"]); // Adicionar item
    $route->post("/carrinho/remover", [CarrinhoController::class, "remover"]); // Remover item
    $route->post("/carrinho/atualizar", [CarrinhoController::class, "atualizarQuantidade"]); // Atualizar quantidade
    $route->post("/carrinho/limpar", [CarrinhoController::class, "limpar"]); // Limpar carrinho
?>