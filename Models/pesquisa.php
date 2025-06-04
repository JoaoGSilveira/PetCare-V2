<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- Lógica de Busca de Produtos ---
        const searchForm = document.getElementById('searchForm'); // Seleciona o FORM pelo ID
        const searchBar = searchForm ? searchForm.querySelector('input[type="search"]') : null;
        const productCards = document.querySelectorAll('.product-card'); 

        if (searchForm && searchBar && productCards.length > 0) {
            // Impede o recarregamento da página ao enviar o formulário de busca
            searchForm.addEventListener('submit', function(event) {
                event.preventDefault(); 
            });

            // Filtra os produtos enquanto o usuário digita
            searchBar.addEventListener('input', function() {
                const searchTerm = searchBar.value.trim().toLowerCase();

                productCards.forEach(function(card) {
                    const productNameElement = card.querySelector('.product-title');
                    const productName = productNameElement ? productNameElement.textContent.toLowerCase() : '';
                    
                    const parentCol = card.closest('.col');

                    if (parentCol) {
                        if (productName.includes(searchTerm)) {
                            parentCol.style.display = 'block';
                        } else {
                            parentCol.style.display = 'none';
                        }
                    }
                });
            });
        }

        // --- Lógica de Dropdown ao Passar o Mouse (opcional) ---
        var dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(function(dropdown) {
            dropdown.addEventListener('mouseover', function() {
                this.querySelector('.dropdown-toggle').click();
            });
            dropdown.addEventListener('mouseout', function() {
                setTimeout(() => {
                    if (!this.querySelector('.dropdown-menu').matches(':hover')) {
                        this.querySelector('.dropdown-toggle').click();
                    }
                }, 200); 
            });
        });

        // --- Lógica do Modal de Sucesso (se aplicável a esta página) ---
        // Você precisará definir $mensagemSucesso no PHP do index.php se for exibir o modal aqui
        // Ex: <?php $mensagemSucesso = Session::flash('success_message'); ?>
        const successMessage = "<?php echo htmlspecialchars($mensagemSucesso ?? ''); ?>";
        const successModal = document.getElementById('successModal'); // Certifique-se que o HTML do modal está no index.php
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');

        if (successMessage && successModal && modalTitle && modalMessage) { // Verifica se os elementos existem
            modalTitle.textContent = "Sucesso!";
            modalMessage.textContent = successMessage;
            
            // Adiciona a classe que torna o modal visível
            successModal.classList.add('is-visible'); 

            setTimeout(function() {
                // Ajuste esta URL para a sua página principal
                window.location.href = '/petcare/'; 
            }, 3000); 
        }
    });
</script>