<?php

function msg_tipo_variavel($var_name){
    echo 'O tipo da variável é ' . gettype($var_name) . '<br>';
}

$i = 1;
msg_tipo_variavel($i);

$i = 1.6;
msg_tipo_variavel($i);

$i = 'Olá Mundo';
msg_tipo_variavel($i);

$i = ['gato','cachorro','pássaro'];
msg_tipo_variavel($i);

$nome = 'Andrés';
echo 'Meu nome é ' . $nome . '<br>';
echo "Meu nome é $nome \n";
?>

