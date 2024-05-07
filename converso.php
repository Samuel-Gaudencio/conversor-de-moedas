<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Atividade 3</title>
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
        <?php
            $inicio = date("m-d-Y", strtotime("-5 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);
            $cotacao = $dados["value"][0]["cotacaoCompra"];
            $real = $_REQUEST["valor"] ?? 0;
            $dolar = round($real/$cotacao, 2);

            echo "Seus R\$" . number_format($real, 2, ",", ".") . " equilavem a <strong>US\$". number_format($dolar, 2, ",", ".") . "</strong> *"; 
            ?>
        <p>* Cotação obtida diretamente do site do <a href="https://www.bcb.gov.br" target="_blank">Banco Central Do Brasil</a></p>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
   
</body>
</html>


