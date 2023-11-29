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

use Dompdf\Dompdf;

require_once "dompdf/autoload.inc.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
  
    $nome = $_POST["nome"];
    $salario_por_hora = $_POST["salario"];
    $horas_trabalhadas = $_POST["horas_trabalhadas"];

    $dompdf = new Dompdf();
    $pdfContent = "<p><strong>Nome do Funcionário</strong>: $nome</p>";
    $pdfContent .= "<p><strong>Salário por Hora:</strong> R$ $salario_por_hora</p>";
    $pdfContent .= "<p><strong>Horas Trabalhadas Semanalmente:</strong> $horas_trabalhadas horas</p>";
    $salario_bruto = (($horas_trabalhadas * 4) * $salario_por_hora);
    $inss = 0.14 * $salario_bruto;
    $salario_liquido = $salario_bruto - $inss;
    $pdfContent .= "<p><strong>Salário Bruto:</strong> R$ $salario_bruto</p>";
    $pdfContent .= "<p><strong>INSS:</strong>R$ $inss</p>";
    $pdfContent .= "<p><strong>Salário Líquido:</strong> R$ $salario_liquido</p>";

    $dompdf->loadHtml($pdfContent);
    $dompdf->set_option("defaultFont", "sans");
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();


    $dompdf->stream();
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Folha de Pagamento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="servico1.scss">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
        <h2>Informações do Funcionário</h2>

        <form class="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome do Funcionário:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="salario">Salário por Hora:</label>
                <input type="number" class="form-control" id="salario" name="salario" required>
            </div>

            <div class="form-group">
                <label for="horas_trabalhadas">Horas Trabalhadas Semanalmente:</label>
                <input type="number" class="form-control" id="horas_trabalhadas" name="horas_trabalhadas" required>
            </div>

            <input type="hidden" name="form_submitted" value="1">

            <button type="submit" class="btn btn-primary">Calcular Folha de Pagamento</button>
        </form>
    </main>

    <footer class="text-white text-center py-2">
        <p class="m-0-footer"><a href="https://www.instagram.com/">Instagram</a></p>
        <p class="m-0-footer"><a href="https://www.linkedin.com/">Linkedin</a></p>
        <p class="m-0-footer"><a href="https://discord.com/">Discord</a></p>
        <p class="m-0-footer"><a href="https://web.whatsapp.com/">WhatsApp</a></p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
