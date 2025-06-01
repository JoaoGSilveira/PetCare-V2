<?php
	
	class inicioController
	{

		public function __construct(private $db = null){}

		public function inicio()
		{
			require_once "../index.php";
		}

		public function sobre_nos(){
			require_once "Views/sobrenos.php";
		}

	}
?>