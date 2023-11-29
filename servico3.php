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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="servico3.scss">
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


    <main class="container-servicos">
        <h2 class="mb-4">Gestão de Benefícios</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtenha os dados do formulário
            $nomeFuncionario = $_POST["nome"];
            $cargoFuncionario = $_POST["cargo"];
            $beneficios = isset($_POST["beneficios"]) ? $_POST["beneficios"] : [];

            // Simule a gestão de benefícios
            $mensagem = "Os benefícios do funcionário $nomeFuncionario ($cargoFuncionario) foram atualizados. Benefícios selecionados: " . implode(", ", $beneficios);
            echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Nome do Funcionário:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="cargo">Cargo do Funcionário:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>

            <div class="form-group">
                <label>Selecione os Benefícios:</label><br>
                <div class="form-check form-check-inline align-middle">
                    <input class="form-check-input" type="checkbox" id="vale_refeicao" name="beneficios[]"
                        value="Vale Refeição">
                    <label class="form-check-label" for="vale_refeicao" style="white-space: nowrap;">Vale
                        Refeição</label>
                </div>
                <div class="form-check form-check-inline align-middle">
                    <input class="form-check-input" type="checkbox" id="plano_saude" name="beneficios[]"
                        value="Plano de Saúde">
                    <label class="form-check-label" for="plano_saude" style="white-space: nowrap;">Plano de
                        Saúde</label>
                </div>
                <div class="form-check form-check-inline align-middle">
                    <input class="form-check-input" type="checkbox" id="vale_transporte" name="beneficios[]"
                        value="Vale Transporte">
                    <label class="form-check-label" for="vale_transporte" style="white-space: nowrap;">Vale
                        Transporte</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Benefícios</button>
        </form>
    </main>

    <footer class="text-white text-center py-2">
        <p class="m-0-footer"><a href="https://www.instagram.com/">Instagram</a></p>
        <p class="m-0-footer"><a href="https://www.linkedin.com/">Linkedin</a></p>
        <p class="m-0-footer"><a href="https://discord.com/">Discord</a></p>
        <p class="m-0-footer"><a href="https://web.whatsapp.com/">WhatsApp</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>