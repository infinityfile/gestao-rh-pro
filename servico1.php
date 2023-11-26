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
    <title>Folha de Pagamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="servico1.scss">
</head>
<body>

<header class="text-white text-center py-4">
    <div class="logo">
        <img src="GestaoRHPRO2.png">
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
    <h2>Informações do Funcionário</h2>

    <form class="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome do Funcionário:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="salario">Salário Base:</label>
            <input type="number" class="form-control" id="salario" name="salario" required>
        </div>

        <div class="form-group">
            <label for="horas_trabalhadas">Horas Trabalhadas:</label>
            <input type="number" class="form-control" id="horas_trabalhadas" name="horas_trabalhadas" required>
        </div>

        <button type="submit" class="btn btn-primary">Calcular Folha de Pagamento</button>
    </form>
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
