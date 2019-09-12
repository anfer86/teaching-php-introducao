<?php
$min = 0;
$max = 10;
while ( ($numero = rand($min,$max)) != 7 ){ ?>

    <p>Número sorteado: <?= $numero ?></p>
    
    <?php } ?>
    
<p><b>O número sorteado foi igual a 7.<b></p>
