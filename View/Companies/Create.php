<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de companhias</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
    <link rel="stylesheet" type="text/css" href="../../Public/Css/error.css">
</head>

<body class="companies">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <?php
        if (isset($_SESSION['erros'])) {
            $errors = $_SESSION['erros'];
        }
        ?>
        <div class="box">
            <form action="../../Controller/CompaniesController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Companias</h1>

                <label class="principal">CNPJ:</label>
                <input required class="txtArea" type="number" name="numberCNPJ" id="numberCNPJ" placeholder="03342487000189">

                <?php
                if (isset($errors[0])) {
                    echo "<div class='messageError'>$errors[0]</div>";
                    unset($_SESSION['erros'][0]);
                }
                if (isset($errors[2])) {
                    echo "<div class='messageError'>$errors[2]</div>";
                    unset($_SESSION['erros'][2]);
                }
                ?>

                <label class="principal">Razão Social:</label>
                <input required class="txtArea" type="text" name="txtRazaoSocial" id="txtRazaoSocial" placeholder="Bola Transportation Ltda">

                <?php
                if (isset($errors[1])) {
                    echo "<div class='messageError'>$errors[1]</div>";
                    unset($_SESSION['erros'][1]);
                }
                ?>

                <label class="principal">Nome Fantasia:</label>
                <input required class="txtArea" type="text" name="txtNomeFantasia" id="txtNomeFantasia" placeholder="Bola Airlines">

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