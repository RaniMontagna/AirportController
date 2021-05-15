<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da tripulação</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="crew">
    <div class="box">
        <form action="../../Controller/CrewController.php?operation=cadastrar" method="post" name="form_user">
            <h1>Cadastro | Tripulação</h1>
            <label class="principal">Nome:</label>
            <input required class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="Lucas">
            <label class="principal">Idade:</label>
            <input required class="txtArea" type="text" name="txtIdade" id="txtIdade" placeholder="18">
            <label class="principal">Email:</label>
            <input required class="txtArea" type="text" name="txtEmail" id="txtEmail" placeholder="lucas@upf.br">
            <label class="principal">Senha:</label>
            <input required class="txtArea" type="password" name="txtSenha" id="txtSenha" placeholder="Lucas12048!">

            <label class="principal">Tipo de Tripulante:</label>
            <div class="options">
                <input type="radio" id="passageiro" name="crewType" value="Passageiro" checked>
                <label for="passageiro">Passageiro</label>
                <input type="radio" id="aeremoca" name="crewType" value="Aeremoça">
                <label for="aeremoca">Aeromoça</label>
                <input type="radio" id="piloto" name="crewType" value="Piloto">
                <label for="piloto">Piloto</label>
                <input type="radio" id="copiloto" name="crewType" value="Copiloto">
                <label for="copiloto">Copiloto</label>
            </div>

            <div class="btns">
                <input class="btn-black" type="submit" value="Cadastrar">
                <input class="btn-black" type="reset" value="Limpar">
            </div>
        </form>
        <button class="btn-back" onclick="window.location.href = '../../Index.php'">Voltar para o início</button>
    </div>
</body>

</html>