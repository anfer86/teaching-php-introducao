<?php
function bemvindo() {
    echo 'Olá Mundo!' . '<br>';
}

call_user_func('bemvindo');

$bemvindo = function($nome){
    echo 'Olá '. $nome . '!' . '<br>';
};

$bemvindo('Andres');

echo '<br>';
array_map($bemvindo, ['Andres','Tomero','Rutini']);
?>







