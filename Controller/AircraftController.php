<?php
session_start();
include '../Model/Aircraft.php';
include '../Include/AircraftValidate.php';
include '../Dao/AircraftDAO.php';

function criar() {
    $erros = array();

    if (!AircraftValidate::testarPassageiros($_POST['numberMaxPassageiros'])) {
        $erros[] = 'Número de passageiros inválido';
    }
    if (!AircraftValidate::testarTipoMotor($_POST['txtTipoMotor'])) {
        $erros[] = 'Tipo de motor inválido';
    }


    if (count($erros) == 0) {
        $aircraft = new Aircraft();

        $aircraft->nome = $_POST['txtNome'];
        $aircraft->marca = $_POST['txtMarca'];
        $aircraft->tipoMotor = $_POST['txtTipoMotor'];
        $aircraft->qtdPassageiros = $_POST['numberMaxPassageiros'];
        $aircraft->compania = $_POST['numberCompania'];

        $aircraftDao = new AircraftDAO();
        $aircraftDao->create($aircraft);

        $_SESSION['nome'] = $aircraft->nome;
        $_SESSION['marca'] = $aircraft->marca;
        header("Location:../View/Aircraft/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Aircraft/Error.php");
    }
}

function listar() {
    $aircraftDao = new AircraftDao();
    $aircraft = $aircraftDao->search();

    $_SESSION['aircraft'] = serialize($aircraft);
    header("Location:../View/Aircraft/List.php");
}

function atualizar() {

}

function deletar() {
    $id = $_GET["id"];
    if (isset($id)) {
        $aircraftDao = new AircraftDao();
        $aircraftDao->delete($id);
        header("Location:../../Controller/AircraftController.php?operation=consultar");
    } else {
        echo "Aeronave informada não existinte";
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