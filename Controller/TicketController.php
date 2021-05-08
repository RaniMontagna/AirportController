<?php
session_start();
include '../Model/Ticket.php';
include '../Include/TicketValidate.php';


if ((!empty($_POST['txtAeroportoDestino'])) &&
    (!empty($_POST['dataSaida']))
 ) {
    $erros = array();

    // if (!TicketValidate::testarData($_POST['dataSaida'])) {
    //     $erros[] = 'A data informada está inválida!';
    // }

    if (count($erros) == 0) {
        $ticket = new Ticket();

        $ticket->aeroportoDestino = $_POST['txtAeroportoDestino'];
        $ticket->dataSaida = $_POST['dataSaida'];
        $ticket->preco = $_POST['numberPreco'];
 
        $_SESSION['aeroportoDestino'] = $ticket->aeroportoDestino;
        $_SESSION['dataSaida'] = $ticket->dataSaida;
        header("Location:../View/Ticket/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Ticket/Error.php");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Ticket/Error.php");
}
