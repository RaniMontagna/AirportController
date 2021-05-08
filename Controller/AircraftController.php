<?php
session_start();
include '../Model/Aircraft.php';
include '../Include/AircraftValidate.php';

if ((!empty($_POST['txtNome'])) &&
    (!empty($_POST['txtMarca'])) &&
    (!empty($_POST['txtTipoMotor'])) &&
    (!empty($_POST['numberCompania'])) &&
    (!empty($_POST['numberMaxPassageiros']))
) {
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

        $_SESSION['nome'] = $aircraft->nome;
        $_SESSION['marca'] = $aircraft->marca;
        header("Location:../View/Aircraft/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Aircraft/Error.php");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Aircraft/Error.php");
}
