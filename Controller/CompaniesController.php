<?php
session_start();
include '../Model/Companies.php';
include '../Include/CompaniesValidate.php';
include '../Dao/CompaniesDAO.php';

if ((!empty($_POST['numberCNPJ'])) &&
    (!empty($_POST['txtRazaoSocial'])) &&
    (!empty($_POST['txtNomeFantasia']))
) {
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
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Companies/Error.php");
}
