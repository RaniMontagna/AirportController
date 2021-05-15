<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Aeroportos</title>
</head>
<body>
    <?php
    if (isset($_SESSION['airports'])) {
        include_once '../../Model/Airports.php';

        $airports = array();
        $airports = unserialize($_SESSION['airports']);

        foreach ($airports as $u) {
            $id = $u['id'];
            $texto = $u['nome'].' à '.$u['distancia'].'km';
            echo "<tr><td><a href='../../Controller/AirportsController.php?operation=deletar&id=$id'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['airports']);
    }


    ?>
</body>
</html>