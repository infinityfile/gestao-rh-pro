<?php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="servico1.scss">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <p class="m-0-footer"><a href="#">Instagram</a></p>
        <p class="m-0-footer"><a href="#">Linkedin</a></p>
        <p class="m-0-footer"><a href="#">Discord</a></p>
        <p class="m-0-footer"><a href="#">WhatsApp</a></p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
