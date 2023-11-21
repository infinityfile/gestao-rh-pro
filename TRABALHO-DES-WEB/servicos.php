<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Link to your custom stylesheet -->
    <link rel="stylesheet" href="styles.scss">
</head>
<body>

<header class="text-white text-center py-4">
    <h1 class="m-0">Página Inicial</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quemsomos.php">Quem Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicos.php">Serviços</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <section>
        <h2>Serviço 1: Ver Folha de Pagamento</h2>
        <p>
            Oferecemos uma plataforma intuitiva e segura para os colaboradores acessarem suas folhas de pagamento online.
            Nosso sistema é atualizado automaticamente, garantindo transparência e precisão nos dados salariais.
        </p>
    </section>

    <section>
        <h2>Serviço 2: Consultar Período de Férias</h2>
        <p>
            Facilitamos a gestão de férias, permitindo que os colaboradores visualizem seus períodos disponíveis,
            solicitem férias e acompanhem o status das solicitações. Os gestores também têm acesso a ferramentas que
            simplificam a aprovação e o planejamento de períodos de folga.
        </p>
    </section>

    <section>
        <h2>Serviço 3: Gestão de Benefícios</h2>
        <p>
            Integramos um sistema abrangente para gerenciar benefícios, proporcionando uma visão clara e fácil de entender
            dos pacotes oferecidos. Colaboradores podem explorar opções, fazer seleções e receber informações sobre seus
            benefícios de maneira transparente.
        </p>
    </section>
</main>

<footer class="text-white text-center py-2">
    <p class="m-0">Rodapé do site</p>
</footer>

<!-- Link to Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
