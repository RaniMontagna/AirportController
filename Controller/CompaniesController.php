<?php
session_start();
include '../Model/Companies.php';
include '../Include/CompaniesValidate.php';
include '../Dao/CompaniesDAO.php';

function criar() {
    $erros = array();

    if (!CompaniesValidate::testarCNPJ($_POST['numberCNPJ'])) {
        $erros[] = 'CNPJ digitado é inválido';
    }
    if (!CompaniesValidate::testarRazaoSocial($_POST['txtRazaoSocial'])) {
        $erros[] = 'Razão Social informada não contém sigla empresarial obrigatória!';
    }

    if (count($erros) == 0) {
        $companies = new Companies();

        $companies->cnpj = $_POST['numberCNPJ'];
        $companies->razaoSocial = $_POST['txtRazaoSocial'];
        $companies->nomeFantasia = $_POST['txtNomeFantasia'];
        
        $companiesDao = new CompaniesDAO();
        $companiesDao->create($companies);

        $_SESSION['nomeFantasia'] = $companies->nomeFantasia;
        header("Location:../View/Companies/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Companies/Error.php");
    }
}

function listar() {
    $companiesDao = new CompaniesDao();
    $companies = $companiesDao->search();

    $_SESSION['companies'] = serialize($companies);
    header("Location:../View/Companies/List.php");
}

function atualizar() {

}

function deletar() {
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