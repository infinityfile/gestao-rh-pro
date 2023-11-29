<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, show logout link
    $menuLink = '<a class="nav-link" href="logout.php">Logout</a>';
} else {
    // User is not logged in, show login link
    $menuLink = '<a class="nav-link" href="login.php">Login</a>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quem Somos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="quemsomos.scss">
</head>
<body>

<header class="text-white text-center py-4">
<a href="index.php"><div class="logo">
    <img src="./img/logo.png">
    </div></a>
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
                <?php
                if (!isset($_SESSION['user_id'])) {
                    // Display "Registre-se" link only if the user is not logged in
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="registro.php">Registre-se</a>';
                    echo '</li>';
                }
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php echo $menuLink; ?>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="quem-somos-container">
        <div class="quem-somos-text" id="clickableDiv">
            <h1>Quem Somos?</h1>
            <p id="hiddenParagraph" class="quem-somos-paragraph">
                A gestão RH PRO é uma empresa inovadora especializada em fornecer soluções abrangentes para a gestão de recursos humanos, facilitando processos críticos para organizações modernas. Oferecemos uma plataforma intuitiva e segura para os colaboradores acessarem suas folhas de pagamento online.
                <br><br>Nossa abordagem visa simplificar e aprimorar as operações de RH, permitindo que as empresas foquem no que fazem de melhor.
            </p>
        </div>
        <p class="endereco">Rua Morais e Silve, N 1000 - Maracanã Rio de Janeiro - RJ</p>
    </div>
</main>

<footer class="text-white text-center py-2">
    <p class="m-0-footer"><a href="https://www.instagram.com/">Instagram</a></p>
    <p class="m-0-footer"><a href="https://www.linkedin.com/">Linkedin</a></p>
    <p class="m-0-footer"><a href="https://discord.com/">Discord</a></p>
    <p class="m-0-footer"><a href="https://web.whatsapp.com/">WhatsApp</a></p>
</footer>

<!-- Link to Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    document.getElementById('clickableDiv').addEventListener('click', function() {
        var paragraph = document.getElementById('hiddenParagraph');
        paragraph.style.maxHeight = paragraph.style.maxHeight ? null : paragraph.scrollHeight + 'px';
    });
</script>

</body>
</html>
