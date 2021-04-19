<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cidades</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="cities">
    <div class="box">
        <form action="../../Controller/CitiesController.php" method="post" name="form_user">
            <h1>Cadastro | Cidades</h1>
            <label class="principal">Nome:</label>
            <input class="txtArea" type="text" name="txtNome" id="txtNome" placeholder="Paraí">

            <label class="principal">Sigla Estado:</label>
            <input class="txtArea" type="text" name="txtEstado" id="txtEstado" placeholder="RS">

            <label class="principal">País:</label>
            <input class="txtArea" type="text" name="txtPais" id="txtPais" placeholder="Brasil">

            <div class="btns">
                <input class="btn-black" type="submit" value="Cadastrar">
                <input class="btn-black" type="reset" value="Limpar">
            </div>
        </form>
        <button class="btn-back" onclick="window.location.href = '../../Index.php'">Voltar para o início</button>
    </div>
</body>

</html>