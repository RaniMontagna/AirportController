<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Tripulantes</title>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/list.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="header">
            <h1>Airport Controller</h1>
            <h2>Listagem de Tripulantes</h2>
            <a href="./Index.php"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
        <ul>
            <?php
            if (isset($_SESSION['crew'])) {
                include_once '../../Model/Crew.php';

                $crew = array();
                $crew = unserialize($_SESSION['crew']);

                foreach ($crew as $u) {
                    $id = $u['id'];
                    $texto = $u['tipo'] . ': ' . $u['nome'] . ', ' . $u['idade'] . ' anos - ' . $u['email'];
                    echo "<li>
                    <p class='text'>$texto</p>
                    <p class='delete'><a href='../../Controller/CrewController.php?operation=deletar&id=$id'><i class='fas fa-trash-alt'></i></a></p>
                    </li>";
                }

                unset($_SESSION['crew']);
            }
            ?>
        </ul>
    <?php } else {
        header("Location:../app.php");
    } ?>
</body>

</html>