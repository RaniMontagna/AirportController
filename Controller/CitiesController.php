<?php
session_start();
include '../Model/Cities.php';
include '../Include/CitiesValidate.php';
include '../Dao/CitiesDAO.php';

function criar()
{
    $erros = array();

    if (!CitiesValidate::testarEstado($_POST['txtEstado'])) {
        $erros[0] = 'Tamanho da sigla do estado é inválida.';
    }

    if (!CitiesValidate::testarTamanhoCEP($_POST['numberCEP'])) {
        $erros[1] = 'Número do cep informado é inválido.';
    } else if (!CitiesValidate::testarExisteCEP($_POST['numberCEP'])) {
        $erros[2] = 'Cep informado já existe no sistema!';
    }

    if (count($erros) == 0) {

        $cities = new Cities();

        $cities->cep = $_POST['numberCEP'];
        $cities->nome = $_POST['txtNome'];
        $cities->pais = $_POST['txtPais'];
        $cities->estado = $_POST['txtEstado'];

        $citiesDao = new CitiesDAO();
        $citiesDao->create($cities);

        header("Location:./CitiesController.php?operation=consultar");
    } else {
        $_SESSION['erros'] = $erros;
        header("Location:../View/Cities/Create.php");
    }
}

function listar()
{
    $citiesDao = new CitiesDao();
    $cities = $citiesDao->search();

    $_SESSION['cities'] = serialize($cities);
    header("Location:../View/Cities/List.php");
}

function atualizar()
{
}

function deletar()
{
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
