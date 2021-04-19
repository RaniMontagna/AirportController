<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cidade Efetuado</title>
</head>
<body>
    <h1>Resultado</h1><p>
    <?php
        if (isset($_SESSION['nomeCity']) && isset($_SESSION['pais']) && isset($_SESSION['estado'])) {
            echo $_SESSION['nomeCity'] .', '.$_SESSION['estado'].', '.$_SESSION['pais'] . ' adicionado com sucesso!';
        }
        unset($_SESSION['nomeCity']);
        unset($_SESSION['pais']);
        unset($_SESSION['estado']);
    ?>
</body>
</html>