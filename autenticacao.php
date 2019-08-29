<?php
// Verificar se foi enviada a palavra_chave via POST.
if ( isset($_POST['palavra_chave']) ){    
    $palavra_chave = $_POST['palavra_chave'];    
    // Verificar se a palavra chave é a correta
    if ( $palavra_chave == "123mudar"){
        session_start();
        $_SESSION['autenticado'] = true;
        header("Location: area_restrita.php");        
    } else {
        session_start();
        $_SESSION['autenticado'] = false; 
        echo "Palavra chave incorreta. Você não tem permissão para entrar na área de acesso restrito.";
    }    
}
?>