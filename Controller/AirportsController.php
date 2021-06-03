<?php
session_start();
include '../Model/Airports.php';
include '../Include/AirportsValidate.php';
include '../Dao/AirportsDAO.php';

function criar() {
    $erros = array();

    if (!AirportsValidate::testarNome($_POST['txtNome'])) {
        $erros[] = 'Informe um nome que seja válido!';
    }

    if (!AirportsValidate::testarPorte($_POST['txtPorte'])) {
        $erros[] = 'Porte Inválido.';
    }

    if (count($erros) == 0) {
        $airports = new Airports();

        $airports->nome = $_POST['txtNome'];
        $airports->porte = $_POST['txtPorte'];
        $airports->distancia = $_POST['numberDistancia'];
        $airports->cep = $_POST['numberCep'];
        
        $airportsDao = new AirportsDAO();
        $airportsDao->create($airports);

        header("Location:./AirportsController.php?operation=consultar");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Airports/Error.php");
    }
}

function listar() {
    $airportsDao = new AirportsDao();
    $airports = $airportsDao->search();

    $_SESSION['airports'] = serialize($airports);
    header("Location:../View/Airports/List.php");
}

function atualizar() {

}

function deletar() {
    $id = $_GET["id"];
    if (isset($id)) {
        $airportsDao = new AirportsDao();
        $airportsDao->delete($id);
        header("Location:../../Controller/AirportsController.php?operation=consultar");
    } else {
        echo "Aeroporto informado não existinte";
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