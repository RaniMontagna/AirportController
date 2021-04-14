<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Usuário Efetuado</title>
</head>
<body>
    <h1>Resultado</h1><p>
    <?php
        if (isset($_GET['user']) && isset($_GET['mail'])) {
            echo '<br>Usuário: '.$_GET['user'] .
                 '<br>Email: '.$_GET['mail'] .
                 '<br>Tipo de Tripulante: '.$_GET['type'];
        }          
    ?>
</body>
</html>