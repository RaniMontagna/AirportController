<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Passagem Efetuado</title>
</head>
<body>
    <h1>Resultado</h1><p>
    <?php
        if (isset($_SESSION['aeroportoDestino']) && isset($_SESSION['dataSaida'])) {
            echo '<br>Passagem com destino para '.$_SESSION['aeroportoDestino'] .
                 ', com data de saída de '.$_SESSION['dataSaida'] . ' criado com sucesso!!';

        }
        unset($_SESSION['aeroportoDestino']);
        unset($_SESSION['dataSaida']);
    ?>
</body>
</html>