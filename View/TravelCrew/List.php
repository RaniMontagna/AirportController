<?php
session_start();

$crew = $_SESSION['crewList'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Tripulação</title>

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
            <h2>Listagem de Tripulantes da Viagem Nº <?php echo $_GET['id'] ?></h2>
            <a href="../Travel/List.php"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>

        <h1 class='addCrew'>Adicionar Passageiros:</h1>
        <form method="post" action="../../Controller/TravelCrewController.php?operation=cadastrar" method="post" name="form_travelCrew">
            <input type="hidden" name="hiddenViagem" value="<?php echo $_GET['id'] ?>" />
            <select class="txtArea" name="selectTripulante" id="selectTripulante" required>
                <?php
                foreach ($crew as $a) {
                    $value = $a['id'];
                    $label = $a['tipo'] . ' - ' . $a['nome'];
                    echo "<option value='$value'>$label</option>";
                }
                ?>
            </select>
            <button type="submit" name="submit">Adicionar</button>
        </form>

        <ul>
            <?php
            if (isset($_SESSION['travelCrew'])) {
                include_once '../../Model/TravelCrew.php';

                $travel = array();
                $travel = unserialize($_SESSION['travelCrew']);

                foreach ($travel as $u) {
                    foreach ($crew as $a) {
                        if ($a['id'] == $u['tripulante']) {
                            $idTripulante = $u['tripulante'];
                            $idTravel = $u['voo'];

                            $texto = $a['id'] . ' - ' . $a['tipo'] . ' - ' . $a['nome'];
                            $delete = "<p class='delete'>
                            <a href='../../Controller/TravelCrewController.php?operation=deletar&viagem=$idTravel&tripulante=$idTripulante'>
                            <i class='fas fa-trash-alt'></i></a> </p>";
                            echo "<li><p class='text'>$texto</p>$delete</li>";
                        }
                    }
                }

                unset($_SESSION['travelCrew']);
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