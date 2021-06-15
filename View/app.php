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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
        <div id="intro" class="intro">
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
                <h2 id="h2"></h2>
                <h1 id="h1"></h1>
                <h3 id="h3"></h3>
                <a class="logout" href="../Controller/AuthController.php?operation=logout">LOGOUT</a>

                <!-- JS TypeWriter -->
                <script type="text/javascript" src="../Public/Js/typewriter.js"></script>
            </div>
        </div>

        <div class="about">
            <h1>Sobre</h1>
            <h4>Esse site foi criado com o intuito de demonstrar o aprendizado obtido na linguagem php.</h4>
            <p>Como base para a atividade, esse site simula um software que seria utilizado por algum aeroporto para o controle
                geral, desde cada avião, cada empresa, cada pessoa que passou por lá. Para isso é utilizado sistemas de CRUD
                (criação, consulta, atualização e destruição de dados) para o controle de todos os dados do aeroporto. Além disso é
                usado um banco de dados MySQL que guarda todas as informações de forma eficiente.</p>
            <h4 style="margin-top: 2em">Abaixo está a descrição de cada Crud que compõe o sistema:</h4>
            <a href="#aircraft" class="arrow bounce" style="padding: 0em 0em 0em 0em; font-size: 2em"><i class="fas fa-angle-double-down"></i></a>
        </div>

        <div id="aircraft" class="contents">
            <div>
                <h1>Aeronaves</h1>
                <h2>Cadastro de aeronaves no sistema</h2>
                <p>O primeiro dos cadastros é o de aeronaves no sistema, ou seja, todo avião que está em circulação no aeroporto. Para fazer
                    um cadastro da aeronave é necessário informar alguns dados:
                <ul>
                    <li>Nome</li>
                    <li>Marca</li>
                    <li>Tipo do Motor</li>
                    <li>Capacidade de Passageiros</li>
                    <li>Compania associada (CNPJ)</li>
                </ul>
                <p>Existem algumas restrições como:</p>
                <ul>
                    <li>Só podem ser informados os motores nos quais existem no sistemas</li>
                    <li>A capacidade dos passageiros precisa ser no intervalo de 1 e 2000 tripulantes</li>
                    <li>O CNPJ da compania informada precisa estar cadastrado já no sistema</li>
                </ul>
                </p>
                <p style="margin: 1em 0em 0em 0em"><a href="./Aircraft/Index.php" class="btn">Acessar</a></p>
            </div>
            <div class="image">
                <image src="../Public/Images/bg_aircraft.jfif" alt="imgAircraft" />
            </div>
        </div>
        <img style="width: 100%" class="svg" src="../Public/Images/layout/Rectangle.svg" />

        <div class="contents modify">
            <div class="image">
                <image src="../Public/Images/bg_airports.jfif" alt="imgAirports" />
            </div>
            <div>
                <h1>Aeroportos</h1>
                <h2>Cadastro dos aeroportos no sistema</h2>
                <p>O Crud de aeroportos nada mais é que o sistema no qual controla todos os aeroportos que podem ocorrer viagens de destino,
                    ou seja, aeroportos que podem receber viagens do aeroporto do sistema. Para isso funcionar de forma eficiente se faz
                    necessário algumas informações
                <ul>
                    <li>Nome</li>
                    <li>Porte</li>
                    <li>Distância</li>
                    <li>CEP</li>
                </ul>
                <p>Essa crud também possui restrições que são muito importantes para o sistema, são elas:</p>
                <ul>
                    <li>O porte deve estar nas options do sistema, é de extrema importância para saber que tipos de aviões podem viajar para o
                        aeroporto específico
                    </li>
                    <li>O CEP informado deve ser de uma cidade na qual já esta cadastrada no sistema</li>
                </ul>
                <p style="margin: 1em 0em 0em 0em"><a href="./Airports/Index.php" class="btn">Acessar</a></p>
            </div>
        </div>

        <div class="contents">
            <div>
                <h1>Cidades</h1>
                <h2>Cadastro das cidades no sistema</h2>
                <p>O Crud de cidade é muito importante para o registro dos lugares para onde o aeroporto terá conexão, seja essa cidade
                    nacional ou internacional. Para isso se faz necessário coletar as seguintes informações básicas:
                </p>
                <ul>
                    <li>CEP</li>
                    <li>Nome</li>
                    <li>Sigla do Estado</li>
                    <li>Pais</li>
                </ul>
                <p>Possui menos restrições, mas sem deixar de serem importantes:</p>
                <ul>
                    <li>O CEP deve conter exatamente 8 números, sem nenhum caracter especial</li>
                    <li>O CEP não poderá já estar cadastrado no sistema</li>
                    <li>A Sigla do estado deverá conter apenas 2 letras</li>
                </ul>
                <p style="margin: 1em 0em 0em 0em"><a href="./Cities/Index.php" class="btn">Acessar</a></p>
            </div>
            <div class="image">
                <image src="../Public/Images/bg_cities.jfif" alt="imgCities" />
            </div>
        </div>
        <img style="width: 100%" class="svg" src="../Public/Images/layout/Rectangle.svg" />

        <div class="contents modify">
            <div class="image">
                <image src="../Public/Images/bg_companies.jfif" alt="imgCompanies" />
            </div>
            <div>
                <h1>Companias</h1>
                <h2>Cadastro das companias no sistema</h2>
                <p>Para um controle sobre as companias áereas nas quais contem aviões trafegando sobre as linhas aéreas destinadas
                    ao aeroporto, é de extrema importância o cadastro e controle das empresas. Informações que são necessárias de ser coletadas:
                <ul>
                    <li>CNPJ</li>
                    <li>Razão Social</li>
                    <li>Nome Fantasia</li>
                </ul>
                <p>As restrições abaixo são necessárias:</p>
                <ul>
                    <li>O CNJP deve conter exatamente 14 números, sem nenhum caracter especial</li>
                    <li>O CNPJ informado não poderá já estar cadastrado no sistema</li>
                    <li>A razão social informada precisa conter uma das siglas sociais que referem à empresa</li>
                </ul>
                </p>
                <p style="margin: 1em 0em 0em 0em"><a href="./Companies/Index.php" class="btn">Acessar</a></p>
            </div>
        </div>

        <div class="contents">
            <div>
                <h1>Tripulação</h1>
                <h2>Cadastro das tripulações no sistema</h2>
                <p>Esse crud é um dos que mais contem campos para preenchimento, e também um dos mais importantes. Ele é necessário para
                    o cadastro de todas as pessoas que passam pelas viagens do aeroporto. Ele cadastra não somente passageiros, mas também
                    pilotos, copilotos e aeromoças. Os campos que devem ser pedidos são:
                <ul>
                    <li>Nome</li>
                    <li>Idade</li>
                    <li>Email</li>
                    <li>Senha</li>
                    <li>Tipo de Tripulante</li>
                </ul>
                <p>Existem restrições nas quais ajudam a deixar o sistema mais completo e refinado, são elas:</p>
                <ul>
                    <li>O usuário no qual está fazendo o cadastro precisa ser maior de idade</li>
                    <li>O email informado deve ser válido</li>
                    <li>A senha deve conter 8 caracteres ou mais</li>
                </ul>
                </p>
                <p style="margin: 1em 0em 0em 0em"><a href="./Crew/Index.php" class="btn">Acessar</a></p>
            </div>
            <div class="image">
                <image src="../Public/Images/bg_crew.jfif" alt="imgCrew" />
            </div>
        </div>
        <img style="width: 100%" class="svg" src="../Public/Images/layout/Rectangle.svg" />

        <div class="contents modify">
            <div class="image">
                <image src="../Public/Images/bg_travels.jpg" alt="imgTravel" />
            </div>
            <div>
                <h1>Viagens</h1>
                <h2>Cadastro das viagens no sistema</h2>
                <p>Esse Crud é diferente dos demais, sendo utilizados mais recursos por ser mais complexo que os demais. É de extrema importância
                    por ser o Crud no qual faz o controle de cada voo que ocorre no aeroporto, por isso ele envolve varias informações de outras
                    tabelas. É necessário as seguintes informações:
                </p>
                <ul>
                    <li>Avião Utilizado</li>
                    <li>Aeroporto de Destino</li>
                    <li>Data de Saída</li>
                </ul>
                <p>As restrições serão bem específicas ja que apareceram no próprio componente do html, são elas:</p>
                <ul>
                    <li>Só poderá ser usado aviões nos quais já estão cadastrados no sistema</li>
                    <li>Só deve ocorrer viagens para aeroportos que já estão cadastrados no sistema</li>
                </ul>
                <p style="margin: 1em 0em 0em 0em"><a href="./Travel/Index.php" class="btn">Acessar</a></p>
            </div>
        </div>
        <?php if ($user[0][1] == 'admin@admin') { ?>
            <div class="contents">
                <div>
                    <h1>Usuário</h1>
                    <h2>Cadastro dos usuarios no sistema</h2>
                    <p>Esse crud só aparece para o administrador do sistema, como padrão está no email 'admin@admin'. Ele é responsável
                        por cadastrar os usuários no qual pode logar no sistema. Somente dois campos são necessários:
                    </p>
                    <ul>
                        <li>Email</li>
                        <li>Senha</li>
                    </ul>
                    <p>As únicas restrições presentes nesse crud são:</p>
                    <ul>
                        <li>O email informado deverá ser válido</li>
                        <li>O email informado não poderá já estar cadastrado no sistema</li>
                    </ul>
                    <p style="margin: 1em 0em 0em 0em"><a href="./User/Index.php" class="btn">Acessar</a></p>
                </div>
                <div class="image">
                    <image src="../Public/Images/bg_users.jpg" alt="imgUsers" />
                </div>
            </div>
        <?php } ?>
        <div <?php
                if ($user[0][1] == 'admin@admin') { ?> class="footer footerBackground1" <?php } else { ?> class="footer footerBackground2" <?php } ?>>
            <p>© Copyright 2021 Ranielli e Bernardo.</p>
            <a href="#intro" class="arrow bounce" style="padding: 0em 0em 0em 0em; font-size: 2em;">
                <i class="fas fa-angle-double-up" <?php if ($user[0][1] == 'admin@admin') { ?> style="color: white" <?php } ?>> </i>
            </a>
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