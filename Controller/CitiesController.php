<?php
session_start();
include '../Model/Cities.php';
include '../Include/CitiesValidate.php';
include '../Dao/CitiesDAO.php';

function criar() {
    $erros = array();

    if (!CitiesValidate::testarEstado($_POST['txtEstado'])) {
        $erros[] = 'Tamanho da sigla do estado é inválida.';
    }

    if (!CitiesValidate::testarCEP($_POST['numberCEP'])) {
        $erros[] = 'Número do cep informado é inválido.';
    }


    if (count($erros) == 0) {
        $cities = new Cities();

        $cities->cep = $_POST['numberCEP'];
        $cities->nome = $_POST['txtNome'];
        $cities->pais = $_POST['txtPais'];
        $cities->estado = $_POST['txtEstado'];

        $citiesDao = new CitiesDAO();
        $citiesDao->create($cities);

        $_SESSION['nomeCity'] = $cities->nome;
        $_SESSION['pais'] = $cities->pais;
        $_SESSION['estado'] = $cities->estado;
        header("Location:../View/Cities/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Cities/Error.php");
    }
}

function listar() {
    $citiesDao = new CitiesDao();
    $cities = $citiesDao->search();

    $_SESSION['cities'] = serialize($cities);
    header("Location:../View/Cities/List.php");
}

function atualizar() {

}

function deletar() {
    $id = $_GET["id"];
    if (isset($id)) {
        $citiesDao = new CitiesDao();
        $citiesDao->delete($id);
        header("Location:../../Controller/CitiesController.php?operation=consultar");
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