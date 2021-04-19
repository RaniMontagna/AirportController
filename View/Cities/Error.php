<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cidade com erros</title>
</head>

<body>
    <h1>Erros!</h1>
    <?php
    if (isset($_SESSION['erros'])) {
        $erros = array();
        $erros = unserialize($_SESSION['erros']);

        foreach ($erros as $e) {
            echo '<br />' . $e;
        }
        unset($_SESSION['erros']);
    }
    ?>
</body>

</html>