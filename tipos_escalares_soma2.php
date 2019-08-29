<?php
function soma($a, $b) {    
    if ( !is_numeric($a) || !is_numeric($b) ){
        return "Erro: um ou mais argumentos não são numéricos";
    }
    return $a + $b; 
}

echo 'soma (1,5): ' . soma(1,5) . '<br>';
echo "soma('Andres','Ferrero'): " .  soma("Andres",'Ferrero') . '<br>';
echo "soma('Andres',10): " .  soma("Andres",10) . '<br>';
?>

