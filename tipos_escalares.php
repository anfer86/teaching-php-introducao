<?php
$carrinhoVazio = FALSE;             // boolean
$quantidadeUnidades = 5;            // inteiro
$valorUnidade = 12.50;              // float
$nomeProduto = 'Capa de Celular';   // string

echo gettype($carrinhoVazio) . '<br>';
echo gettype($quantidadeUnidades) . '<br>';
echo gettype($valorUnidade) . '<br>';
echo gettype($nomeProduto) . '<br>';
echo '<br>';

if (is_bool($carrinhoVazio)){
    echo '$carrinhoVazio é uma variável booleana <br>';
} 

if (!is_bool($nomeProduto)) {
    echo '$nomeProduto não é uma variável booleana <br>';
}

if (is_int($quantidadeUnidades)){
    echo '$quantidadeUnidades é uma variável int <br>';
}

if (is_float($valorUnidade)){
    echo '$valorUnidade é uma variável float <br>';
}

if (is_numeric($valorUnidade) && is_numeric($quantidadeUnidades)){
    echo '$valorUnidade e $quantidadeUnidades são variáveis numéricas<br>';
}

if (is_string($nomeProduto)){
    echo '$nomeProduto é uma variável string <br>';
}

?>




