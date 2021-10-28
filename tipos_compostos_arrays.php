<?php

// Arrays simples
$arr_simples = array('gato','cachorro','pássaro');
print_r($arr_simples);
echo '<br>';

$arr_simples2 = ['gato', 'cachorro', 'pássaro'];
print_r($arr_simples2);
echo '<br>';

// Array associativo (assoc)
$arr_assoc = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];
print_r($arr_assoc);
echo '<br>';

echo 'As chaves ou keys são:   '. implode(', ', array_keys($arr_assoc)).'<br>';
echo 'Os valores ou values são: '. implode(', ', array_values($arr_assoc)).'<br>';

$nome = 'Tomero';
echo "O $nome é um " . $arr_assoc[$nome] . '<br>';

$keys = array_keys($arr_assoc);
echo  $keys[3] . ' é ' . $arr_assoc[$keys[3]] . '<br>';

if (in_array($nome, array_keys($arr_assoc))){
    echo "$nome está no array de animais <br>";
} else {
    echo "$nome não está no array de animais <br>";
}

unset($arr_assoc);
echo 'Apagamos a variável $arr_assoc <br>';
print_r($arr_assoc);

?>