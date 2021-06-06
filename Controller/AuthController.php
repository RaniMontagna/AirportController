<?php
session_start();
include '../Model/User.php';
include '../Dao/UserDAO.php';

function login()
{
    $email = $_POST['txtEmail'];
    $senha = $_POST['txtSenha'];

    $userDao = new UserDAO();
    $user = $userDao->find($email, $senha);

    if ($user) {
        $_SESSION['usuario'] = serialize($user);
        header("location:../../View/app.php");
        $_SESSION["userError"] = null;
    } else {
        unset($_SESSION['usuario']);
        $_SESSION["userError"] = 1;
        header("location:../../index.php");
    }
}

function logout()
{
    unset($_SESSION['usuario']);
    header("location:../../index.php");
}

$operacao = $_GET['operation'];
if (isset($operacao)) {
    switch ($operacao) {
        case 'login':
            login();
            break;
        case 'logout':
            logout();
            break;
    }
}
