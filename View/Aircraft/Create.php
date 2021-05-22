<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aeronaves</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="aircraft">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="box">
            <form action="../../Controller/AircraftController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Aeronaves</h1>

                <label class="principal">Nome:</label>
                <input required class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="747-400">

                <label class="principal">Marca:</label>
                <input required class="txtArea" type="text" name="txtMarca" id="txtMarca" placeholder="Boeing">

                <label class="principal">Tipo do Motor:</label>
                <input required class="txtArea" type="text" name="txtTipoMotor" id="txtTipoMotor" placeholder="Turbofan">

                <label class="principal">Máximo de passageiros:</label>
                <input required class="txtArea" type="number" name="numberMaxPassageiros" id="numberMaxPassageiros" placeholder="660">

                <label class="principal">Compania(CNPJ):</label>
                <input required class="txtArea" type="number" name="numberCompania" id="numberCompania" placeholder="32546896541254">

                <div class="btns">
                    <input class="btn-black" type="submit" value="Cadastrar">
                    <input class="btn-black" type="reset" value="Limpar">
                </div>
            </form>
            <button class="btn-back" onclick="window.location.href = '../app.php'">Voltar para o início</button>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>