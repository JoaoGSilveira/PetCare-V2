<?php
	
	class inicioController
	{

		public function __construct(private $db = null){}

		public function inicio()
		{
			echo "inicio controller";
			require_once "../index.php";
		}

	}
?>