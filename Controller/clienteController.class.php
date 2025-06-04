<?php

class clienteController{

    private $param;

    public function __construct()
    {
        $this->param = Conexao::getInstancia(); 
    }

    public function login(){

        $msgerro = ["", ""]; 
        $erro = false;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $login = $_POST['login'] ?? ''; 
            $senha = $_POST['senhalogin'] ?? '';

            // Validação básica dos campos do login de usuário
            if(empty($login)){
                $msgerro[0] = "* Campo Obrigatório!";
                $erro = true;
            }
            if(empty($senha)){
                $msgerro[1] = "* Campo Obrigatório!";
                $erro = true;
            }

            if(!$erro){


                $cliente = new Cliente(email:$login, senha:md5($senha)); 
                
                // Instancia o ClienteDAO, passando a conexão com o banco de dados
                $clienteDAO = new ClienteDAO($this->param); 
                
                // Chama o método de verificação de login no DAO
                $verificarLogin = $clienteDAO->verificar_login($cliente);
            
                // Verifica se o login foi bem-sucedido (se algum resultado foi retornado)
                if(count($verificarLogin) > 0) {
                    
                    // Define os dados do usuário na sessão usando a classe Session
                    Session::set('nome', $verificarLogin[0]->nome);
                    Session::set('id_cliente', $verificarLogin[0]->id_cliente);
                    Session::set('tipo', $verificarLogin[0]->tipo);
                    
                    //Regenera o ID da sessão após o login.
                    session_regenerate_id(true); 
                    
                    //Mensagem de login.
                    Session::set('success_message', 'Login realizado com sucesso!'); 
                    header("Location: /petcare/Entrar");
                    exit;
                } else {
                    Session::set('error_message', 'Verifique o e-mail/senha.'); 
                    header("Location: /petcare/Entrar");
                    exit;
                }
            }
        }

        require_once "Views/entrar.php";
    }

    //Metodo para listar produtos de gatos.
    public function listar_produtos_gatos(){

        $produtoDAO = new ProdutoDAO($this->param);
        $categoriaDAO = new CategoriaDAO($this->param);

        $produtos = $produtoDAO->buscar_todos();

        $produtos_gatos = array_filter($produtos, function($produto) {
            return $produto->animal === 'Gato' || $produto->animal === 'Ambos';
        });

        require_once "Views/produtogatos.php";
    }

    // Método para realizar o logout do usuário
    public function logout()
    {
        Session::destroy();
        Session::set('success_message', 'Você foi desconectado com sucesso.'); 
        header("Location: /petcare/Entrar"); 
        exit;
    }
}

?>