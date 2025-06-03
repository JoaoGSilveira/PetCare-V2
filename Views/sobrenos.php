<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare | Sobre Nós</title>
    <?php require_once "Models/Dependencias.php"; ?>
    <link rel='stylesheet' href='css/produtos.css'>
</head>

<body>
    <?php
    require_once "navbar.php";
    ?>
    <main class="container mt-4">
        <div class="mapasite">
            <p>Onde estou?</p>
            <br>
            <p><a class="mapnav" href="/petcare/">Início -></a></p>
            <p class="wherelocal">Sobre Nós</p>
        </div>

        <div class="text-center">
            <img src="Images/sobrenos.png" class="my-content-card" alt="..." height="200pt">
        </div>

        <div class="text-break">
            <p class="fs-5 section-title-padding">
                <h5 class="text-center">PetCare: Inovação e Amor a Serviço do Seu Melhor Amigo</h5>
                <br>
                Há mais de 5 anos, o PetCare nasceu da união de três amigos que compartilhavam um sonho: revolucionar o
                cuidado com os animais domésticos. Percebíamos que, apesar do amor que os tutores dedicavam aos seus
                pets, faltava um lugar que oferecesse não apenas serviços, mas uma verdadeira experiência de carinho e
                bem-estar. Foi com essa visão que apostamos na inovação e, acima de tudo, no amor incondicional pelos
                animais, pilares que muitas vezes sentíamos estarem em falta no mercado.
                Desde o nosso início, temos nos dedicado a aprimorar constantemente nossas habilidades e conhecimentos
                especializados. Buscamos as últimas tendências em cuidados veterinários, estética e comportamento animal
                para garantir que seu pet receba o que há de melhor. Nossa missão sempre foi ir além do básico,
                proporcionando algo a mais para nossos clientes — um ambiente onde a saúde, a felicidade e o conforto do
                seu animal de estimação são a nossa prioridade máxima.
                Hoje, estamos orgulhosamente localizados no coração da cidade, em um ponto excepcional que facilita o
                acesso a todos que buscam o melhor para seus companheiros de quatro patas. Venha nos visitar e descubra
                a diferença que o carinho e a excelência fazem no cuidado do seu pet!
            </p>
        </div>
    </main>

    <?php
    
        require_once "footer.php";

    ?>

</body>

</html>