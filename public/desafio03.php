<?php

$taxa_multa = 0.025;

$dia_atual = new DateTime();

echo "Insira o valor da fatura: ";
$valor_fatura = (float) readline();

echo "\nInsira a data de vencimento (formato dd/mm/aaaa): ";
$data_vencimento = readline();

$data_vencimento = DateTime::createFromFormat('d/m/Y', $data_vencimento);

if ($data_vencimento === false) {
    echo "Data de vencimento inválida.\n";
    exit;
}

if ($data_vencimento > $dia_atual) {
    echo "Data de vencimento ainda não venceu!\n";
    exit;
}

$atraso = $dia_atual->diff($data_vencimento)->days;

echo "A fatura está atrasada em: $atraso dias\n";

$valor_multa = $valor_fatura * $taxa_multa * $atraso;

echo "Valor da multa: R$ " . number_format($valor_multa, 2, ',', '.') . "\n";

$valor_total = $valor_fatura + $valor_multa;

echo "Valor total: R$ " . number_format($valor_total, 2, ',', '.') . "\n";