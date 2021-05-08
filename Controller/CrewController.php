<?php
session_start();
include '../Model/Crew.php';
include '../Include/CrewValidate.php';
include '../Dao/CrewDAO.php';

if ((!empty($_POST['txtNome'])) &&
    (!empty($_POST['txtIdade'])) &&
    (!empty($_POST['txtEmail'])) &&
    (!empty($_POST['txtSenha'])) &&
    (!empty($_POST['crewType']))
) {
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
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);
    $_SESSION['erros'] = $err;
    header("Location:../View/Crew/Error.php");
}
