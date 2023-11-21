<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais (por simplicidade, a senha é "senha123")
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "seu_usuario" && $password == "senha123") {
        // Redireciona para a página de dashboard se as credenciais estiverem corretas
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Credenciais inválidas. Tente novamente.</p>";
    }
}
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

<main class="container mt-4 d-flex flex-column align-items-center">
    <?php
    // Display login message if available
    if (isset($message)) {
        echo '<div class="alert alert-info mb-4" role="alert">' . $message . '</div>';
    }
    ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
<h2>Login</h2>

<label for="username">Usuário:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Login">
</form>
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