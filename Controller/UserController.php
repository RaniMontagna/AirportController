<?php
session_start();
include '../Model/User.php';
include '../Include/UserValidate.php';
include '../Dao/UserDAO.php';

function criar()
{
    $erros = array();

    if (!UserValidate::testarEmail($_POST['txtEmail'])) {
        $erros[0] = 'Email inválido';
    } else if (!UserValidate::testarExisteUser($_POST['txtEmail'])) {
        $erros[1] = 'Email já cadastrado no sistema!';
    }


    if (count($erros) == 0) {
        $user = new User();

        $user->email = $_POST['txtEmail'];
        $user->password = $_POST['txtPassword'];

        $userDao = new UserDAO();
        $userDao->create($user);

        header("Location:./UserController.php?operation=consultar");
    } else {
        $_SESSION['erros'] = $erros;
        header("Location:../View/User/Create.php");
    }
}

function listar()
{
    $userDao = new UserDao();
    $user = $userDao->search();

    $_SESSION['user'] = serialize($user);
    header("Location:../View/User/List.php");
}

function atualizar()
{
}

function deletar()
{
    $id = $_GET["id"];
    if (isset($id)) {
        $userDao = new UserDao();
        $userDao->delete($id);
        header("Location:../../Controller/UserController.php?operation=consultar");
    } else {
        echo "Usuário informado não existe";
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
