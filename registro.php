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

// Assuming your database connection is stored in $conn
// Include your database connection file if it's in a separate file
// Example: include('db_config.php');

// Check if the form is submitted
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

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            $message = "Usuário registrado com sucesso!";
        } else {
            $message = "Erro ao registrar o usuário: " . $conn->error;
        }

        $conn->close();
    } else {
        $message = "Campos 'username' e 'password' não encontrados no formulário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="registro.scss">
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Registro</h2>

        <label for="newUsername">Novo Usuário:</label>
        <input type="text" id="newUsername" name="username" required><br>

        <label for="newPassword">Nova Senha:</label>
        <input type="password" id="newPassword" name="password" required><br>

        <!-- Add other necessary fields for registration -->

        <input type="submit" value="Registrar">

        <div class="texto-registro">
        <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
    </div>
    </form>
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