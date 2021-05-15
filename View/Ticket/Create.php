<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro das passagens</title>

    <!-- FaviIcon -->
    <link rel="icon" type="imagem/png" href="../../Public/Images/icon.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../../Public/Css/form.css">
</head>

<body class="crew">
    <div class="box">
        <form action="../../Controller/TicketController.php?operation=cadastrar" method="post" name="form_user">
            <h1>Cadastro | Passagem</h1>
            <label class="principal">Aeroporto Destino:</label>
            <input required class="txtArea" type="text" name="txtAeroportoDestino" id="txtAeroportoDestino" placeholder="Aeroporto Internacional de Garulhos">
            <label class="principal">Data Saída:</label>
            <input required class="txtArea" type="date" name="dataSaida" id="dataSaida" placeholder="17/05/2021">
            <label class="principal">Preço:</label>
            <input required class="txtArea" type="number" name="numberPreco" id="numberPreco">

            <div class="btns">
                <input class="btn-black" type="submit" value="Cadastrar">
                <input class="btn-black" type="reset" value="Limpar">
            </div>
        </form>
        <button class="btn-back" onclick="window.location.href = '../../Index.php'">Voltar para o início</button>
    </div>
</body>

</html>