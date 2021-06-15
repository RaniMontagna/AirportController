<?php
session_start();
include '../Model/TravelCrew.php';
// include '../Include/TravelCrewValidate.php';
include '../Dao/TravelCrewDAO.php';

function criar()
{
    $travelCrew = new TravelCrew();
    $viagemId = $_POST['hiddenViagem'];

    $travelCrew->viagem = $viagemId;
    $travelCrew->tripulante = $_POST['selectTripulante'];

    $travelDao = new TravelCrewDAO();
    $travelDao->create($travelCrew);

    header("Location:./TravelCrewController.php?operation=consultar&id=$viagemId");
}

function listar()
{
    $idViagem = $_GET["id"];

    $travelCrewDao = new TravelCrewDao();
    $travelCrew = $travelCrewDao->search($idViagem);

    $travelCrewDao = new TravelCrewDao();
    $_SESSION['crewList'] = $travelCrewDao->searchCrew();

    $_SESSION['travelCrew'] = serialize($travelCrew);
    header("Location:../View/TravelCrew/List.php?id=$idViagem");
}

function atualizar()
{
}

function deletar()
{
    $viagem = $_GET['viagem'];
    $tripulante = $_GET['tripulante'];
    if (isset($tripulante)) {
        $travelCrewDao = new TravelCrewDao();
        $travelCrewDao->delete($viagem, $tripulante);
        header("Location:./TravelCrewController.php?operation=consultar&id=$viagem");
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
