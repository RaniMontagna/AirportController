<?php
include '../Model/Crew.php';
include '../Include/CrewValidate.php';

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

        // echo "Usuário $user->nome $user->sobrenome criado com sucesso!";
        header("Location:../View/Crew/Detail.php?"."user=$crew->nome&"."mail=$crew->email&"."type=$crew->tipo");
    } else {
        $err = serialize($erros);
        header("Location:../View/Crew/Error.php?erros=$err");
    }
} else {
    $erros = array();
    $erros[] = 'Informe todos os campos';
    $err = serialize($erros);

    header("Location:../View/Crew/Error.php?erros=$err");
}
