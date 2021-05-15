<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cidades</title>
</head>
<body>
    <?php
    if (isset($_SESSION['cities'])) {
        include_once '../../Model/cities.php';

        $cities = array();
        $cities = unserialize($_SESSION['cities']);

        foreach ($cities as $u) {
            $cep = $u['cep'];
            $texto = $u['nome'].', '.$u['estado'].', '.$u['pais'];
            echo "<tr><td><a href='../../Controller/CitiesController.php?operation=deletar&id=$cep'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['cities']);
    }


    ?>
</body>
</html>