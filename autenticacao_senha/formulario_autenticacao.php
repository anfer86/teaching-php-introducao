<html>
<head>
    <title>Formulário Autenticação</title>
</head>
<body>
<p>Você está querendo entrar em uma área restrita, por favor digite a palavra-chave</p>

<?php
session_start();
if (isset($_SESSION['erro'])) { ?>

    <p id="msg" style="color: red;"><?= $_SESSION['erro'] ?></p>
    <script>
        setTimeout(function(){
            document.getElementById('msg').innerHTML = "";
        }, 3000)
    </script>
    
<?php 
    unset($_SESSION['erro']);
    } 
?>


<form action="autenticacao.php" method="post">
   Usuário: <input type="text" name="usuario" />
   <br>    
   Senha: <input type="text" name="senha" />
   <br>    
   <input type="submit" value="Enviar" />
</form>
</body>
</html>