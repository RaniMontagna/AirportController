<?php
session_start();
include '../Model/Companies.php';
include '../Include/CompaniesValidate.php';
include '../Dao/CompaniesDAO.php';

function criar()
{
    $erros = array();

    if (!CompaniesValidate::testarCNPJ($_POST['numberCNPJ'])) {
        $erros[0] = 'CNPJ digitado é inválido';
    } else if (!CompaniesValidate::testarExisteCNPJ($_POST['numberCNPJ'])) {
        $erros[2] = 'CNPJ informado já existe no sistema!';
    }
    if (!CompaniesValidate::testarRazaoSocial($_POST['txtRazaoSocial'])) {
        $erros[1] = 'Razão Social informada não contém sigla empresarial obrigatória!';
    }

    if (count($erros) == 0) {
        $companies = new Companies();

        $companies->cnpj = $_POST['numberCNPJ'];
        $companies->razaoSocial = $_POST['txtRazaoSocial'];
        $companies->nomeFantasia = $_POST['txtNomeFantasia'];

        $companiesDao = new CompaniesDAO();
        $companiesDao->create($companies);

        header("Location:./CompaniesController.php?operation=consultar");
    } else {
        $_SESSION['erros'] = $erros;
        header("Location:../View/Companies/Create.php");
    }
}

function listar()
{
    $companiesDao = new CompaniesDao();
    $companies = $companiesDao->search();

    $_SESSION['companies'] = serialize($companies);
    header("Location:../View/Companies/List.php");
}

function atualizar()
{
}

function deletar()
{
    $id = $_GET["id"];
    if (isset($id)) {
        $companiesDao = new CompaniesDao();
        $companiesDao->delete($id);
        header("Location:../../Controller/CompaniesController.php?operation=consultar");
    } else {
        echo "Compania informada não existinte";
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
