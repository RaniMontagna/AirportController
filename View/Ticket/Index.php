<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index | Passagens</title>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/indexViews.css">
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <!-- Hover #1 -->
        <div class="box-1">
            <a href="./Create.php">
                <div class="btn btn-style">
                    <span>CADASTRAR</span>
                </div>
            </a>
        </div>

        <!-- Hover #2 -->
        <div class="box-2">
            <a href="../../Controller/TicketController.php?operation=consultar">
                <div class="btn btn-style">
                    <span>CONSULTAR</span>
                </div>
            </a>
        </div>

        <!-- Hover #3 -->
        <div class="box-3">
            <a href="../app.php">
                <div class="btn btn-style">
                    <span>VOLTAR PARA O INICIO</span>
                </div>
            </a>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>