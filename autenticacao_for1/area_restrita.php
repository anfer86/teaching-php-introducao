<?php

$dados_usuario = [
      'pedro' => [
          'Nome Completo' => 'Pedro de Alcântara',
          'Data de Nascimento' => '25/04/2000',
          'CEP de Residência' => '88509002'
          ],
      'maria' => [
          'Nome Completo' => 'Maria de Souza',
          'Data de Nascimento' => '20/05/2002',
          'CEP de Residência' => '88506400'
          ],
      'joao'  => [
          'Nome Completo' => 'João Barbosa',
          'Data de Nascimento' => '15/01/2003',
          'CEP de Residência' => '88502161'
          ],
      'julia' => [
         'Nome Completo' => 'Julia da Serra',
          'Data de Nascimento' => '26/10/1998',
          'CEP de Residência' => '88502162'
          ] 
    ];

session_start();

if ( isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {

$usuario = $_SESSION['usuario'];

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