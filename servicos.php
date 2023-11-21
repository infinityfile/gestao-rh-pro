<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serviços - TalentSphere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

<main class="container-servicos">
    <?php
    // Serviços e URLs
    $servicos = [
        'Folha de Pagamento' => 'servico1.php',
        'Consultar Período de Férias' => 'servico2.php',
        'Gestão de Benefícios' => 'servico3.php'
    ];

    // Exibindo os serviços dinamicamente
    foreach ($servicos as $titulo => $url) {
        echo "<section>";
        echo "<a href='$url'>";
        echo "<p>$titulo</p>";
        echo "</a>";
        echo "</section>";
    }
    ?>
</main>

<footer class="text-white text-center py-2">
    <p class="m-0">Rodapé do site</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
