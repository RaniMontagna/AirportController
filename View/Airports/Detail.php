<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aeroporto Efetuado</title>
</head>
<body>
    <h1>Resultado</h1><p>
    <?php
        if (isset($_SESSION['nome']) && isset($_SESSION['distancia'])) {
            echo $_SESSION['nome'] .', localizado à ' . $_SESSION['distancia'] .'km, foi adicionado com sucesso!';
        }
        unset($_SESSION['nome']);
        unset($_SESSION['distancia']);
    ?>
</body>
</html>