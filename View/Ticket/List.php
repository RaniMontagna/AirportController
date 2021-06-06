<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Passagens</title>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/list.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="header">
            <h1>Airport Controller</h1>
            <h2>Listagem de Passagens</h2>
            <a href="./Index.php"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
        <ul>
            <?php
            if (isset($_SESSION['ticket'])) {
                include_once '../../Model/Ticket.php';

                $ticket = array();
                $ticket = unserialize($_SESSION['ticket']);

                foreach ($ticket as $u) {
                    $id = $u['id'];
                    $texto = 'Destino ao ' . $u['aeroportoDestino'] . ', em ' . $u['dataSaida'];
                    echo "<li>
                    <p class='text'>$texto</p>
                    <p class='delete'><a href='../../Controller/TicketController.php?operation=deletar&id=$id'><i class='fas fa-trash-alt'></i></a></p>
                    </li>";
                }

                unset($_SESSION['ticket']);
            }
            ?>
        </ul>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>