<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Aeronaves</title>
</head>
<body>
    <?php
    if (isset($_SESSION['aircraft'])) {
        include_once '../../Model/Aircraft.php';

        $aircraft = array();
        $aircraft = unserialize($_SESSION['aircraft']);

        foreach ($aircraft as $u) {
            $id = $u['id'];
            $texto = $u['marca'].' '.$u['nome'].' - '.$u['compania'];
            echo "<tr><td><a href='../../Controller/AircraftController.php?operation=deletar&id=$id'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['aircraft']);
    }


    ?>
</body>
</html>