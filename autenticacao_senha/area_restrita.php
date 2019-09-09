<?php
session_start();
if ( isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
?>

<!-- Este conteúdo só será mostrado ao usuário
se o usuário tiver se autenticado -->
<html>
    <head>
        <title>Área Restrita</title>
    </head>
    <body>
        <h2 style="color: red">Área de acesso restrito</h2>
        <p>Conteúdo da área restrita</p>
    </body>
</html>

<?php } else { ?>
    <p>Você não tem permissão para acessar esta área</p>
<?php } ?>