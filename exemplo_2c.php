<?php
// Este é um comentário de uma linha

/*
* Este é um comentário 
* de várias linhas
*/
$titulo = "Exemplo 2";
$nome = "Carlos Andres Ferrero";
?>
<html>
<head>    
        <title><?= $titulo ?></title>
</head>
<!-- 
    E este é um comentário em HTML
-->
<body>
    <h2>Bom dia <?= $nome ?></h2>

    <p>Isto será ignorado pelo interpretador de PHP.</p>
    <p><?='Isto será interpretado e o resultado traduzido para HTML.'; ?></p>
    <p>Isto também será ignorado pelo interpretador de PHP.</p>
</body>
</html>

<script>
    alert("Bom dia <?= $nome ?>");
</script>
