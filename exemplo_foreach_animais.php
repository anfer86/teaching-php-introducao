<?php

$arr_animais = [ 
    'Tomero' => 'gato', 
    'Rutini' => 'gato',
    'Toby' => 'cachorro',
    'Chico' => 'pássaro'
];

foreach ($arr_animais as $nome => $especie){ ?>

    <li><b><?= $nome ?>:</b> <?= $especie ?></li>

<?php } ?>
