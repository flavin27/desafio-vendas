<?php

$file = fopen(__DIR__ . "/../data/vendas.json", "r") or die("Arquivo json de vendas não encontrado!");

$vendas = json_decode(fread($file, filesize(__DIR__ . "/../data/vendas.json")), true)['vendas'];

$vendedores = [];


foreach ($vendas as $venda) {

    $vendedor = $venda['vendedor'];
    if (!isset($vendedores[$vendedor])) {
        $vendedores[$vendedor] = 0;
    }
    if ($venda['valor'] >= 100 && $venda['valor'] < 500) {
        $vendedores[$vendedor] += $venda['valor'] * 0.01;
    }
    elseif ($venda['valor'] >= 500) {
        $vendedores[$vendedor] += $venda['valor'] * 0.05;
    }
}

fclose($file);

arsort($vendedores);

echo "Comissão dos vendedores:\n";

foreach ($vendedores as $vendedor => $comissao) {
    echo "$vendedor: R$ " . number_format($comissao, 2, ',', '.') . "\n";
}


?>