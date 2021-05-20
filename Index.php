<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | Airport Controller</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="./Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="./Public/Css/index.css">
</head>

<body>
    <div class="box">
        <img src="/Public/Images/icon.png" /> 
        <h1>AIRPORT CONTROLLER</h1>
        <h2>FAÇA SEU LOGIN</h2>
        <form action="./Controller/AuthController.php?operation=login" method="post" name="form_user">
            <input required class="inputs" type="text" name="txtEmail" id="txtEmail" placeholder="E-mail" />
            <input required class="inputs" type="password" name="txtSenha" id="txtSenha" placeholder="Senha" />
            <input class="btn-grad" type="submit" value="Login" />
        </form>
    </div>
</body>

</html>