<?php
session_start();

// ... (your existing code)

$menuLink = '';

if (isset($_SESSION['user_id'])) {
    // User is logged in, provide link for logging out
    $menuLink = '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
} else {
    // User is not logged in, provide link for logging in or registering
    $menuLink = '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serviços - TalentSphere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
     <link rel="stylesheet" href="servico2.scss">
</head>
<body>

<header class="text-white text-center py-4">
    <div class="logo">
        <img src="./img/logo.png">
    </div>
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


<main class="container-servicos">

<h2 class="mb-4">Consulta de Período de Férias</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Simulando a consulta de período de férias
        $nomeFuncionario = $_POST["nome"];
        $periodoFerias = $_POST["periodo"];

        // Aqui você poderia realizar a consulta no seu sistema ou banco de dados
        // e obter os dados reais sobre o período de férias do funcionário.

        // Simulando uma resposta
        $mensagem = "O período de férias de $nomeFuncionario no período de $periodoFerias está agendado.";
        echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nome">Nome do Funcionário:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="periodo">Período de Férias:</label>
            <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Por exemplo, 01/07/2023 - 15/07/2023" required>
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>
</div>
    
</main>

<footer class="text-white text-center py-2">
    <p class="m-0-footer"><a href="#">Instagram</a></p>
    <p class="m-0-footer"><a href="#">Linkedin</a></p>
    <p class="m-0-footer"><a href="#">Discord</a></p>
    <p class="m-0-footer"><a href="#">WhatsApp</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
