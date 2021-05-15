<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de companhias</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />
    
    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="companies">
    <div class="box">
        <form action="../../Controller/CompaniesController.php?operation=cadastrar" method="post" name="form_user">
            <h1>Cadastro | Companias</h1>

            <label class="principal">CNPJ:</label>
            <input required class="txtArea" type="number" name="numberCNPJ" id="numberCNPJ" placeholder="03342487000189">
            
            <label class="principal">Razão Social:</label>
            <input required class="txtArea" type="text" name="txtRazaoSocial" id="txtRazaoSocial" placeholder="Bola Transportation Ltda">

            <label class="principal">Nome Fantasia:</label>
            <input required class="txtArea" type="text" name="txtNomeFantasia" id="txtNomeFantasia" placeholder="Bola Airlines">

            <div class="btns">
                <input class="btn-black" type="submit" value="Cadastrar">
                <input class="btn-black" type="reset" value="Limpar">
            </div>
        </form>
        <button class="btn-back" onclick="window.location.href = '../../Index.php'">Voltar para o início</button>
    </div>
</body>

</html>