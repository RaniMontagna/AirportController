<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aeroportos</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
    <link rel="stylesheet" type="text/css" href="../../Public/Css/error.css">

    <!-- JQuery para mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
</head>

<body class="airport">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <?php
        if (isset($_SESSION['erros'])) {
            $errors = $_SESSION['erros'];
        }
        ?>
        <div class="box">
            <form action="../../Controller/AirportsController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Aeroportos</h1>
                <label class="principal">Nome:</label>
                <input required class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="Aeroporto Internacional de Garulhos">

                <?php
                if (isset($errors[0])) {
                    echo "<div class='messageError'>$errors[0]</div>";
                    unset($_SESSION['erros'][0]);
                }
                ?>

                <label class="principal">Porte:</label>
                <input required class="txtArea" type="text" name="txtPorte" id="txtPorte" placeholder="Medio">

                <?php
                if (isset($errors[1])) {
                    echo "<div class='messageError'>$errors[1]</div>";
                    unset($_SESSION['erros'][1]);
                }
                ?>

                <label class="principal">Distância(Km):</label>
                <input required class="txtArea" type="number" name="numberDistancia" id="numberDistancia" placeholder="1257">

                <label class="principal">CEP:</label>
                <input required class="txtArea" type="text" name="numberCep" id="numberCep" placeholder="_____-___">

                <script>
                    $(document).ready(function() {
                        $("#numberCep").inputmask('99999-999');
                    });
                </script>

                <?php
                if (isset($errors[2])) {
                    echo "<div class='messageError'>$errors[2]</div>";
                    unset($_SESSION['erros'][2]);
                }
                ?>

                <div class="btns">
                    <button type="reset" class="btn-submit back" onclick="window.location.href = '../app.php'">Voltar para o início</button>
                    <input class="btn-submit success" type="submit" value="Cadastrar">
                </div>
        </div>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>