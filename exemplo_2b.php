<?php
$titulo = "Exemplo 2";
$nome = "Carlos Andres Ferrero";
?>
<html>
<head>    
        <title><?php echo $titulo ?></title>
</head>

<body>
    <h2>Bom dia <?php echo $nome ?></h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p><?php echo 'Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>

