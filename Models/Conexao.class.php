<?php

	//Singleton

	class Conexao
	{
		private static $conexao;
		private function __construct(){}
		public static function getInstancia()
		{
		if(empty(self::$conexao))
		{
			$parametros = "mysql:host=localhost;dbname=petcare;charset=utf8mb4";
			try
			{
				self::$conexao = new PDO($parametros, "root", "");
			}
			catch(PDOException $e)
			{
				echo "Problema na conexão";
				die();
			}
		}
		return self::$conexao;
	}
}
?>