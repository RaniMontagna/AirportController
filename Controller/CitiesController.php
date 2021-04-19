<?php
session_start();
include '../Model/Cities.php';
include '../Include/CitiesValidate.php';

if ((!empty($_POST['txtNome'])) &&
    (!empty($_POST['txtPais'])) &&
    (!empty($_POST['txtEstado']))
) {
    $erros = array();

    if (!CitiesValidate::testarEstado($_POST['txtEstado'])) {
        $erros[] = 'Tamanho da sigla do estado é inválida.';
    }

    if (count($erros) == 0) {
        $cities = new Cities();

        $cities->nome = $_POST['txtNome'];
        $cities->pais = $_POST['txtPais'];
        $cities->estado = $_POST['txtEstado'];

        $_SESSION['nomeCity'] = $cities->nome;
        $_SESSION['pais'] = $cities->pais;
        $_SESSION['estado'] = $cities->estado;
        header("Location:../View/Cities/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Cities/Error.php");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Cities/Error.php");
}
