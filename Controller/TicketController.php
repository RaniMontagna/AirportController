<?php
session_start();
include '../Model/Ticket.php';
include '../Include/TicketValidate.php';
include '../Dao/TicketDAO.php';

function criar() {
    $erros = array();

    // if (!TicketValidate::testarData($_POST['dataSaida'])) {
    //     $erros[] = 'A data informada está inválida!';
    // }

    if (count($erros) == 0) {
        $ticket = new Ticket();

        $ticket->aeroportoDestino = $_POST['txtAeroportoDestino'];
        $ticket->dataSaida = $_POST['dataSaida'];
        $ticket->preco = $_POST['numberPreco'];

        $ticketDao = new TicketDAO();
        $ticketDao->create($ticket);
 
        $_SESSION['aeroportoDestino'] = $ticket->aeroportoDestino;
        $_SESSION['dataSaida'] = $ticket->dataSaida;
        header("Location:../View/Ticket/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Ticket/Error.php");
    }
}

function listar() {
    $ticketDao = new TicketDao();
    $ticket = $ticketDao->search();

    $_SESSION['ticket'] = serialize($ticket);
    header("Location:../View/Ticket/List.php");
}

function atualizar() {

}

function deletar() {
    $id = $_GET["id"];
    if (isset($id)) {
        $ticketDao = new TicketDao();
        $ticketDao->delete($id);
        header("Location:../../Controller/TicketController.php?operation=consultar");
    } else {
        echo "Usuário informado não existinte";
    }
}

$operacao = $_GET["operation"];
if(isset($operacao)) {
    switch($operacao) {
        case 'cadastrar':
            criar();
            break;
        case 'consultar':
            listar();
            break;
        case 'atualizar':
            atualizar();
            break;
        case 'deletar':
            deletar();
            break;
    }
}