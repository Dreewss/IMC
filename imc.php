<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de IMC</h2>
        <form method="post" action="">
            <input type="number" step="0.01" name="peso" placeholder="Digite seu peso (KG)" required>
            <input type="number" step="0.01" name="altura" placeholder="Digite sua Altura (M)" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];

            if ($peso <= 0 || $altura <= 0) {
                echo "<p style='color:red;'>Peso e altura devem ser valores positivos!</p>";
            } else {
                $imc = $peso / ($altura * $altura);
                echo "<p>Seu IMC: " . number_format($imc, 2) . "</p>";

                if ($imc < 18.5) {
                    echo "<p>Classificação: Abaixo do peso</p>";
                } elseif ($imc < 24.9) {
                    echo "<p>Classificação: Peso Normal</p>";
                } elseif ($imc < 29.9) {
                    echo "<p>Classificação: Sobrepeso</p>";
                } else {
                    echo "<p>Classificação: Obesidade</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
