<?php

$file = fopen("estoque.json", "r") or die("Arquivo json de estoque não encontrado!");

$estoque = json_decode(fread($file, filesize("estoque.json")), true)['estoque'];

fclose($file);

echo "Estoque Inicial:\n";

foreach ($estoque as $produto) {
    echo "Código: {$produto['codigoProduto']}, Descrição: {$produto['descricaoProduto']}, Estoque: {$produto['estoque']}\n";
}


$movimentacoes = [];
$contadorMovimentacoes = 0;

while (true) {
    echo "\nSelecione que operação deseja realizar:\n";
    echo "1 - Adicionar ao estoque\n";
    echo "2 - Remover do estoque\n";
    echo "3 - Listar movimentações\n";
    echo "4 - Listar estoque\n";
    echo "5 - Sair\n";
    $opcao = readline("Opção: ");

    if ($opcao == 3) {
        echo "Movimentações realizadas:\n";
        foreach ($movimentacoes as $movimentacao) {
            echo "Código: {$movimentacao['codigoMovimentacao']}, Descrição: {$movimentacao['descricaoMovimentacao']}\n";
        }
        continue;
    }

    if ($opcao == 4) {
        echo "Estoque atual:\n";
        foreach ($estoque as $produto) {
            echo "Código: {$produto['codigoProduto']}, Descrição: {$produto['descricaoProduto']}, Estoque: {$produto['estoque']}\n";
        }
        continue;
    }

    if ($opcao == 5) {
        echo "Saindo...\n";
        break;
    }
    echo "Digite o código do produto: ";
    $codigoProduto = readline("Digite o código do produto: ");

    if (!array_filter($estoque, fn($produto) => $produto['codigoProduto'] == $codigoProduto)) {
        echo "Erro: Produto com código $codigoProduto não encontrado.\n";
        continue;
    }

    $quantidade = (int)readline("Digite a quantidade: ");
    $movimentacoes[] = [
        'codigoMovimentacao' => $contadorMovimentacoes++, 
        'descricaoMovimentacao' => "Movimentação de estoque - " 
        . ($opcao == 1 ? " Adição" : " Remoção") 
        . " do produto com código $codigoProduto"
        . " - Descrição: " . array_values(array_filter($estoque, fn($produto) => $produto['codigoProduto'] == $codigoProduto))[0]['descricaoProduto']
        . " - Quantidade: $quantidade",
    ];
    

    foreach ($estoque as &$produto) {
        if ($produto['codigoProduto'] == $codigoProduto) {
            if ($opcao == 1) {
                $produto['estoque'] += $quantidade;
                echo "Estoque atualizado. Novo estoque de {$produto['descricaoProduto']}: {$produto['estoque']}\n";
            } elseif ($opcao == 2) {
                if ($produto['estoque'] >= $quantidade) {
                    $produto['estoque'] -= $quantidade;
                    echo "Estoque atualizado. Novo estoque de {$produto['descricaoProduto']}: {$produto['estoque']}\n";
                } else {
                    echo "Erro: Estoque insuficiente para remover a quantidade solicitada.\n";
                }
            }
            break;
        }
    }
}

?>