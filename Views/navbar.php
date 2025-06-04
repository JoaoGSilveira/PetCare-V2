<?php

require_once "Models/Dependencias.php";
// Se você usa namespaces para a classe Session, descomente e ajuste:
// use App\Core\Session; 

echo "
<link rel='stylesheet' href='css/navbar.css'>
<nav class='navbar navbar-expand-lg bg-body-tertiary navbar-light py-3'>
    <div class='container-fluid'>
        <a class='navbar-brand d-flex align-items-center' href='/petcare/'>
            <img class='navbar-logo-img' src='Images/Logo.png' alt='Logo PetCare'>
            <h1>PetCare</h1>
        </a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
            data-bs-target='#mainNavbarContent' aria-controls='mainNavbarContent' aria-expanded='false'
            aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='mainNavbarContent'>
            <form id='searchForm' class='d-flex mx-auto col-lg-4 navbar-search-form' role='search'> 
                <input class='form-control me-2' type='search' placeholder='O que você deseja hoje?'
                    aria-label='Search' />
                <button class='btn btn-success' type='submit'>
                    <i class='bi bi-search'></i>
                </button>
            </form>

            <ul class='navbar-nav navbar-actions ms-auto'>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>
                        <i class='bi bi-heart'></i>
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/petcare/carrinho'>
                        <i class='bi bi-cart'></i>
                    </a>
                </li>";
                
                // Verifica se o usuário está logado usando $_SESSION ou a classe Session
                if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
                echo "
                <li class='nav-item dropdown'> 
                    <a class='nav-link dropdown-toggle text-nowrap' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        <i class='bi bi-person'></i> Olá, " . htmlspecialchars($_SESSION['nome']) . "!
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdownMenuLink'> 
                        <li><a class='dropdown-item' href='#'>Minha Conta</a></li> 
                        <li><hr class='dropdown-divider'></li> 
                        <li><a class='dropdown-item' href='/petcare/Sair'>Sair</a></li> 
                    </ul>
                </li>";
                } else {
                echo "
                <li class='nav-item'>
                    <a class='nav-link text-nowrap' href='/petcare/Entrar'>
                        <i class='bi bi-person'></i> Entrar ou <br>Cadastrar-se
                    </a>
                </li>";
                }
            echo "
            </ul>
        </div>
    </div>
</nav>";

echo "
<nav class='navbar navbar-expand-lg navbar-dark navbar-categories'>
    <div class='container-fluid'>
        <a class='navbar-brand d-lg-none' href='#'>Categorias</a> 
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
            data-bs-target='#categoriesNavbarContent' aria-controls='categoriesNavbarContent' aria-expanded='false'
            aria-label='Toggle categories navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-center' id='categoriesNavbarContent'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='/petcare/'>Inicio</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/petcare/SobreNos'>Sobre Nós</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/petcare/ProdutosParaGatos'>Produtos para Gatos</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/petcare/ProdutosParaCaes'>Produtos para Cães</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/petcare/Servicos'>Serviços</a>
                </li>
            </ul>
        </div>
    </div>
</nav>";

?>