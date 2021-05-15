<?php
session_start();
include '../Model/Crew.php';
include '../Include/CrewValidate.php';
include '../Dao/CrewDAO.php';

function criar() {
    $erros = array();

    if (!CrewValidate::testarIdade($_POST['txtIdade'])) {
        $erros[] = 'Necessário ser maior de idade';
    }
    if (!CrewValidate::testarEmail($_POST['txtEmail'])) {
        $erros[] = 'Email inválido';
    }
    if (!CrewValidate::testarSenha($_POST['txtSenha'])) {
        $erros[] = 'Senha precisa conter no mínimo 8 digitos';
    }


    if (count($erros) == 0) {
        $crew = new Crew();

        $crew->nome = $_POST['txtNome'];
        $crew->idade = $_POST['txtIdade'];
        $crew->email = $_POST['txtEmail'];
        $crew->senha = $_POST['txtSenha'];
        $crew->tipo = $_POST['crewType'];

        $crewDao = new CrewDAO();
        $crewDao->create($crew);

        $_SESSION['nomeCrew'] = $crew->nome;
        $_SESSION['mail'] = $crew->email;
        $_SESSION['typeCrew'] = $crew->tipo;
        header("Location:../View/Crew/Detail.php");
    } else {
        $err = serialize($erros);
        $_SESSION['erros'] = $err;
        header("Location:../View/Crew/Error.php");
    }
}

function listar() {
    $crewDao = new CrewDao();
    $crew = $crewDao->search();

    $_SESSION['crew'] = serialize($crew);
    header("Location:../View/Crew/List.php");
}

function atualizar() {

}

function deletar() {
    $id = $_GET["id"];
    if (isset($id)) {
        $crewDao = new CrewDao();
        $crewDao->delete($id);
        header("Location:../../Controller/CrewController.php?operation=consultar");
    } else {
        echo "Tripulante informado não existinte";
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