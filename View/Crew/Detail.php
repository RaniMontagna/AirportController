<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Tripulante Efetuado</title>
</head>
<body>
    <h1>Resultado</h1><p>
    <?php
        if (isset($_SESSION['nomeCrew']) && isset($_SESSION['mail'])) {
            echo '<br>Usuário: '.$_SESSION['nomeCrew'] .
                 '<br>Email: '.$_SESSION['mail'] .
                 '<br>Tipo de Tripulante: '.$_SESSION['typeCrew'];
        }
        unset($_SESSION['nomeCrew']);
        unset($_SESSION['mail']);
        unset($_SESSION['typeCrew']);
    ?>
</body>
</html>