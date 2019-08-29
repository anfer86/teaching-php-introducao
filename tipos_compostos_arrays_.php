<?php

$arr_animais = array('gato','cachorro','pássaro');
print_r($arr_animais);
echo '<br>';

$arr_animais2 = ['gato', 'cachorro', 'pássaro'];
print_r($arr_animais2);
echo '<br>';

$arr_animais3 = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];
print_r($arr_animais3);
echo '<br>';

echo 'O Tomero é um ' . $arr_animais3['Tomero'] . '<br>';
echo 'O Chico é um ' . $arr_animais3['Chico'] . '<br>';

echo 'As keys são:   '. implode(', ', array_keys($arr_animais3)).'<br>';
echo 'Os values são: '. implode(', ', array_values($arr_animais3)).'<br>';

$keys = array_keys($arr_animais3);
echo  $keys[3] . ' é ' . $arr_animais3[$keys[3]] . '<br>';
echo  $keys[2] . ' é ' . $arr_animais3[$keys[2]] . '<br>';

if (in_array('Tomero', array_keys($arr_animais3))){
    echo 'Tomero está no array de animais <br>';
}

if (in_array('Duda', array_keys($arr_animais3))){
    echo 'Duda está no array de animais <br>';
} else {
    echo 'Duda não está no array de animais <br>';
}

?>
?>