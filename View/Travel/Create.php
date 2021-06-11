<?php
session_start();
$airport = $_SESSION['airportList'];
$aircraft = $_SESSION['aircraftList'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de viagens</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
    <link rel="stylesheet" type="text/css" href="../../Public/Css/error.css">
</head>

<body class="travels">
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <?php
        if (isset($_SESSION['erros'])) {
            $errors = $_SESSION['erros'];
        }
        ?>
        <div class="box">
            <form action="../../Controller/TravelController.php?operation=cadastrar" method="post" name="form_user">
                <h1>Cadastro | Viagem</h1>

                <label class="principal">Avião:</label>
                <select class="txtArea" name="selectAviao" id="selectAviao">
                    <?php
                    foreach ($aircraft as $a) {
                        $value = $a['id'];
                        $label = $a['marca'] . ' ' . $a['nome'];
                        echo "<option value='$value'>$label</option>";
                    }
                    ?>
                </select>

                <label class="principal">Aeroporto Destino</label>
                <select class="txtArea" name="selectAeroporto" id="selectAeroporto">
                    <?php
                    foreach ($airport as $a) {
                        $value = $a['id'];
                        $label = $a['nome'];
                        echo "<option value='$value'>$label</option>";
                    }
                    ?>
                </select>

                <label class="principal">Data Saída:</label>
                <input required class="txtArea" type="date" name="dataSaida" id="dataSaida" placeholder="17/05/2021">

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