<?php
	class RevisaoController
	{
		private $param;

		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}

		public function listar_carros_proprietarios()
		{
			$carroDAO = new CarroDAO($this->param);
			$retorno_carros_proprietarios = $carroDAO->buscar_carros_proprietarios();
			
			require_once "Views/listar_carros_proprietarios.php";
		}
		
		public function cadastrar_carro()
		{

			$revisoesDAO = new RevisoesDAO($this->param);
			$retorno_proprietarios = $revisoesDAO->buscar_todos_proprietarios();

			$carroDAO = new CarroDAO($this->param);
			$retorno_carros = $carroDAO->buscar_todos_carros();

			if($_POST)
			{
				$msg[] = "0";
				$erro = 0;

				if(empty($_POST["proprietario"])){
					$msg[0] = "Preencha o proprietário";
					$erro = 1;
				}

				if(empty($_POST["marca"])){
					$msg[1] = "Preencha a marca do carro";
					$erro = 1;
				}

				if(empty($_POST["modelo"])){
					$msg[2] = "Preencha o modelo do carro";
					$erro = 1;
				}


				if($erro == 0)
				{
					$carro = new Carro(0, $_POST["proprietario"], $_POST["marca"], $_POST["modelo"]);
					$carroDAO = new CarroDAO($this->param);
					$carroDAO->cadastrar_carro($carro);
					
					header("location:/Joao Guilherme Silveira/listar");
					die();
				}
			}
			require_once "Views/form_carro.php";
			
		}

		public function grafico()
		{
			require_once "Views/grafico_barras.php";
		}
		
		public function dadosgrafico()
		{
			$carroDAO = new CarroDAO($this->param);
			$retorno = $carroDAO->buscar_dados_grafico();
			$retorno = json_encode($retorno);
			echo $retorno;
		}

	}
?>