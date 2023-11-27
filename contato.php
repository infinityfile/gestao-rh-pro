<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, show logout link
    $menuLink = '<a class="nav-link" href="logout.php">Logout</a>';
} else {
    // User is not logged in, show login link
    $menuLink = '<a class="nav-link" href="login.php">Login</a>';
}

// Handle the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'name', 'email', and 'message' keys exist in $_POST
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
        // Get user input
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Perform any additional processing or validation here

        // Example: Send an email (You may need to configure your server to send emails)
        $to = "your@example.com";
        $subject = "Contact Form Submission";
        $headers = "From: $email";
        $mailBody = "Name: $name\nEmail: $email\nMessage:\n$message";
        
        // Uncomment the line below to send the email
        // mail($to, $subject, $mailBody, $headers);

        $successMessage = "Your message has been sent successfully!";
    } else {
        $errorMessage = "Please fill out all the required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contato</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Link to your custom stylesheet -->
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="contato.scss">
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

<main class="container mt-4 d-flex flex-column align-items-center">
    <?php
    // Display success or error message if available
    if (isset($successMessage)) {
        echo '<div class="alert alert-success mb-4" role="alert">' . $successMessage . '</div>';
    } elseif (isset($errorMessage)) {
        echo '<div class="alert alert-danger mb-4" role="alert">' . $errorMessage . '</div>';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Mande uma mensagem!</h2>

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Mensagem:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>

        <input type="submit" value="Enviar">
    </form>
</main>

<footer class="text-white text-center py-2">
    <!-- ... (same as login.php) -->
</footer>

<!-- Link to Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
