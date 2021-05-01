<?php
session_start();
include '../Model/Airports.php';
include '../Include/AirportsValidate.php';

if ((!empty($_POST['txtNome'])) &&
    (!empty($_POST['txtPorte'])) &&
    (!empty($_POST['numberDistancia'])) &&
    (!empty($_POST['numberCep']))
) {
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

        $_SESSION['nome'] = $airports->nome;
        $_SESSION['distancia'] = $airports->distancia;

        header("Location:../View/Airports/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Airports/Error.php");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Airports/Error.php");
}
