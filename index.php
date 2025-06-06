<?php

    session_start(); // Perfeito, já está no lugar certo!
    
    require_once "rotas.php";

    spl_autoload_register(function($class){
        if(file_exists('Controller/' . $class . '.class.php'))
        {
            require_once 'Controller/' . $class . '.class.php';
        }
        else if(file_exists('Models/' . $class . '.class.php'))
        {
            require_once 'Models/' . $class . '.class.php';
        }
        else if(file_exists('Core/' . $class . '.class.php')) 
        {
            require_once 'Core/' . $class . '.class.php';
        }
        else
        {
            die("Arquivo não existe " . $class);
        }

    });
    
    //Rotas
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $uri = substr($uri, strpos($uri,'/',1));
    $route->verificar_rota($_SERVER["REQUEST_METHOD"],$uri);

?>