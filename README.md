# desafio-vendas

Repositório para resolução de um desafio técnico anônimo em PHP.

## Sobre

Este projeto contém três desafios de programação em PHP:

- **desafio01.php**: Calcula a comissão dos vendedores baseada no valor das vendas (1% para vendas entre R$ 100 e R$ 500, 5% para vendas acima de R$ 500).

- **desafio02.php**: Sistema interativo de controle de estoque com operações de adicionar, remover, listar movimentações e listar estoque atual.

- **desafio03.php**: Calcula a multa de uma fatura atrasada (2,5% ao dia sobre o valor da fatura).

## Requisitos

- PHP 7.4 ou superior

## Instalação do PHP no Linux

### Ubuntu/Debian
```bash
sudo apt update
sudo apt install php
```

### Fedora/RHEL
```bash
sudo dnf install php
```

### Arch Linux
```bash
sudo pacman -S php
```

Verifique a instalação:
```bash
php --version
```

## Estrutura do Projeto

```
desafio-vendas/
├── data/              # Arquivos de dados (JSON)
│   ├── estoque.json
│   └── vendas.json
├── public/            # Scripts executáveis
│   ├── desafio01.php
│   ├── desafio02.php
│   └── desafio03.php
├── src/               # Código fonte (classes, funções - futuro)
├── LICENSE
└── README.md
```

## Como Rodar

Execute cada desafio via linha de comando:

```bash
# Desafio 1 - Cálculo de comissão
php public/desafio01.php

# Desafio 2 - Controle de estoque
php public/desafio02.php

# Desafio 3 - Cálculo de multa
php public/desafio03.php
```

## Licença

Este projeto está licenciado sob a licença MIT.
