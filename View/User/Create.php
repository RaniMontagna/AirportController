<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da usuários</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
    <link rel="stylesheet" type="text/css" href="../../Public/Css/error.css">
</head>

<body class="user">
    <?php
    $user = unserialize($_SESSION['usuario']);
    if ($user[0][1] == 'admin@admin') { ?>
        <?php
        if (isset($_SESSION['erros'])) {
            $errors = $_SESSION['erros'];
        }
        ?>
        <div class="box">
            <form action="../../Controller/UserController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Usuários</h1>

                <label class="principal">Email:</label>
                <input required class="txtArea" type="text" name="txtEmail" id="txtEmail" placeholder="email@dominio.com">

                <?php
                if (isset($errors[0])) {
                    echo "<div class='messageError'>$errors[0]</div>";
                    unset($_SESSION['erros'][0]);
                }
                if (isset($errors[1])) {
                    echo "<div class='messageError'>$errors[1]</div>";
                    unset($_SESSION['erros'][1]);
                }
                ?>

                <label class="principal">Senha:</label>
                <input required class="txtArea" type="password" name="txtPassword" id="txtPassword" placeholder="*********">

                <div class="btns">
                    <button type="reset" class="btn-submit back" onclick="window.location.href = '../app.php'">Voltar para o início</button>
                    <input class="btn-submit success" type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>