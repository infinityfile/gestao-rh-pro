<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Serviços - TalentSphere</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.scss">
    <link rel="stylesheet" href="servico3.scss">
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