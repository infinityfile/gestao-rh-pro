<?php
session_start();

// Initialize $menuLink
$menuLink = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'username' and 'password' keys exist in $_POST
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Get user input
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Assuming your database connection is stored in $conn
        // Replace 'your_database_name', 'your_username', and 'your_password' with your actual database details
        $conn = new mysqli('localhost', 'root', '', 'test');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Select user data from the database
        $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                // Password is correct, redirect to the main page
                $_SESSION['user_id'] = $row['id'];
                header("Location: servicos.php");
                exit();
            } else {
                $message = "Credenciais inválidas. Tente novamente.";
            }
        } else {
            $message = "Credenciais inválidas. Tente novamente.";
        }

        $conn->close();
    } else {
        $message = "Campos 'username' e 'password' não encontrados no formulário.";
    }
}

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
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="login.scss">

    <!-- Add the following script for displaying a pop-up message --> 
</head>
<body>

<header class="text-white text-center py-4">
    <a href="index.php">
        <div class="logo">
            <img src="./img/logo.png">
        </div>
    </a>
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
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registre-se</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto"> <!-- Added ml-auto class to align items to the right -->
                <?php echo $menuLink; ?>
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

        <div class="texto-registre-se">
        <p>Não tem uma conta? <a href="registro.php">Registre-se aqui</a></p>
        </div>

    </form>

    <!-- Adicione o hyperlink para a página de registro -->
    
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

</body>
</html>
