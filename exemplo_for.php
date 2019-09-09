<?php
for ($i=1; $i < 10; $i+=5){
    echo $i . ' ';    
}

$nomes = ['Andres','Anahi','Tomero', 'Rutini'];

for ($i=0; $i < sizeof($nomes); $i++) { 
    echo $nomes[$i] . ' ';
}
?>
<br>
<?php
foreach ($nomes as $nome){
    echo $nome . ' ';
}

foreach ($_SERVER as $key => $value){
    echo "<li><b>$key:</b> $value </li>";
}

?>