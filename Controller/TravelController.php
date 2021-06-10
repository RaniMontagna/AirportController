<?php
session_start();
include '../Model/Travel.php';
include '../Include/TravelValidate.php';
include '../Dao/TravelDAO.php';

function criar()
{
    $erros = array();

    if (isset($_POST['selectAviao'])) {
        if (count($erros) == 0) {
            $travel = new Travel();

            $travel->aviao = $_POST['selectAviao'];
            $travel->aeroportoDestino = $_POST['selectAeroporto'];
            $travel->dataSaida = $_POST['dataSaida'];

            $travelDao = new TravelDAO();
            $travelDao->create($travel);

            header("Location:./TravelController.php?operation=consultar");
        } else {
            $_SESSION['erros'] = $erros;
            header("Location:../View/Travel/Create.php");
        }
    } else {
        $travelDao = new TravelDao();
        $_SESSION['airportList'] = $travelDao->searchAirports();
        $travelDao = new TravelDao();
        $_SESSION['aircraftList'] = $travelDao->searchAircrafts();

        header("Location:../View/Travel/Create.php");
    }
}

function listar()
{
    $travelDao = new TravelDao();
    $travel = $travelDao->search();

    $_SESSION['travel'] = serialize($travel);
    header("Location:../View/Travel/List.php");
}

function atualizar()
{
}

function deletar()
{
    $id = $_GET["id"];
    if (isset($id)) {
        $travelDao = new TravelDao();
        $travelDao->delete($id);
        header("Location:../../Controller/TravelController.php?operation=consultar");
    } else {
        echo "Usuário informado não existinte";
    }
}

$operacao = $_GET["operation"];
if (isset($operacao)) {
    switch ($operacao) {
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
