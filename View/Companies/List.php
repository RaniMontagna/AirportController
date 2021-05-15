<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Companias</title>
</head>
<body>
    <?php
    if (isset($_SESSION['companies'])) {
        include_once '../../Model/Companies.php';

        $companies = array();
        $companies = unserialize($_SESSION['companies']);

        foreach ($companies as $u) {
            $cnpj = $u['cnpj'];
            $texto = $u['nomeFantasia'].' - '.$u['cnpj'];
            echo "<tr><td><a href='../../Controller/CompaniesController.php?operation=deletar&id=$cnpj'>Deletar</a></td> - $texto<br></tr>";
        }

        unset($_SESSION['companies']);
    }


    ?>
</body>
</html>