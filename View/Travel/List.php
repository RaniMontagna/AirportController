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
    <title>Consulta de Viagens</title>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/list.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="header">
            <h1>Airport Controller</h1>
            <h2>Listagem de Viagens</h2>
            <a href="./Index.php"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
        <ul>
            <?php
            if (isset($_SESSION['travel'])) {
                include_once '../../Model/Travel.php';

                $travel = array();
                $travel = unserialize($_SESSION['travel']);

                foreach ($travel as $u) {
                    foreach ($airport as $a) {
                        if ($a['id'] == $u['aeroportoDestino']) {
                            $nomeAeroporto = $a['nome'];
                        }
                    }
                    foreach ($aircraft as $a) {
                        if ($a['id'] == $u['aviao']) {
                            $nomeAircraft = $a['nome'];
                        }
                    }
                    $dataFormatada = date("d/m/Y", strtotime($u['dataSaida']));
                    $id = $u['id'];
                    $texto = 'Dia <b>' . $dataFormatada . '</b>: Viagem com o Avião <b>' . $nomeAircraft . '</b> para o <b>' . $nomeAeroporto . '</b>';
                    $botaoPassageiro = "<a href='.php?id=$id'>Passageiros</a>";
                    echo "<li>
                    <p class='text'>$texto</p>
                    <p class='delete'><a href='../../Controller/TravelController.php?operation=deletar&id=$id'><i class='fas fa-trash-alt'></i></a></p>
                    </li>";
                }

                unset($_SESSION['travel']);
            } else {
                header("location:../../Controller/TravelController.php?operation=consultar");
            }
            ?>
        </ul>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>