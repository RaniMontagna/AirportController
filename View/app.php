<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | Airport Controller</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../Public/Css/app.css">
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div class="intro">
            <div class="nav">
                <nav class="nav">
                    <li>
                        <a href="./Aircraft/Index.php">AERONAVES</a>
                    </li>
                    <li>
                        <a href="./Crew/Index.php">TRIPULAÇÃO</a>
                    </li>
                    <li>
                        <a href="./Cities/Index.php">CIDADES</a>
                    </li>
                    <li>
                        <a href="./Companies/Index.php">COMPANIAS</a>
                    </li>
                    <li>
                        <a href="./Airports/Index.php">AEROPORTOS</a>
                    </li>
                    <li>
                        <a href="./Travel/Index.php">VIAGENS</a>
                    </li>
                    <?php
                    $user = unserialize($_SESSION['usuario']);
                    if ($user[0][1] == 'admin@admin') {
                    ?>
                        <li>
                            <a href="./User/Index.php">USUÁRIOS</a>
                        </li>
                    <?php } ?>
                </nav>


                <div class="dropdown">
                    <button class="dropbtn">CADASTROS E CONSULTAS</button>
                    <div class="dropdown-content">
                        <a href="./Aircraft/Index.php">AERONAVES</a>
                        <a href="./Crew/Index.php">TRIPULAÇÃO</a>
                        <a href="./Cities/Index.php">CIDADES</a>
                        <a href="./Companies/Index.php">COMPANIAS</a>
                        <a href="./Airports/Index.php">AEROPORTOS</a>
                        <a href="./Travel/Index.php">VIAGENS</a>
                        <?php
                        if ($user[0][1] == 'admin@admin') {
                        ?>
                            <a href="./User/Index.php">USUÁRIOS</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="main margin">
                <h2>Bem-vindos ao</h2>
                <h1>Airport Controller</h1>
                <h3>Não deixe mais os voos atrasarem!</h3>
                <a class="logout" href="../Controller/AuthController.php?operation=logout">LOGOUT</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="intro">
            <div class="main">
                <h2>Bem-vindos ao</h2>
                <h1>Airport Controller</h1>
                <h3>Não deixe mais os voos atrasarem!</h3>
                <a class="logout" href="../Controller/AuthController.php?operation=logout">LOGAR NO SISTEMA</a>
            </div>
        </div>
    <?php } ?>
</body>

</html>