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
</head>
<body>
    <?php
    if (isset($_SESSION['ticket'])) {
        include_once '../../Model/Ticket.php';

        $ticket = array();
        $ticket = unserialize($_SESSION['ticket']);

        foreach ($ticket as $u) {
            $id = $u['id'];
            $texto = 'Destino ao '.$u['aeroportoDestino'].', em '.$u['dataSaida'];
            echo "<tr><td><a href='../../Controller/TicketController.php?operation=deletar&id=$id'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['ticket']);
    }


    ?>
</body>
</html>