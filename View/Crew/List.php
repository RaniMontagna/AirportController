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
</head>
<body>
    <?php
    if (isset($_SESSION['crew'])) {
        include_once '../../Model/Crew.php';

        $crew = array();
        $crew = unserialize($_SESSION['crew']);

        foreach ($crew as $u) {
            $id = $u['id'];
            $texto = $u['tipo'].' '.$u['nome'].', '.$u['idade'].' anos - '.$u['email'];
            echo "<tr><td><a href='../../Controller/CrewController.php?operation=deletar&id=$id'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['crew']);
    }


    ?>
</body>
</html>