<?php

$usuarios = [
    'pedro' => '123mudar',
    'maria' => '05/07/90',
    'joao'  => 'toby',
    'julia' => 'ju11@' 
];

if ( isset($_POST['usuario']) && isset($_POST['senha']) ){    
    
    $usuario = $_POST['usuario'];    
    $usuario = strtolower($usuario);
    $senha   = $_POST['senha'];    
    
    if ( in_array($usuario, array_keys($usuarios)) &&          
        $usuarios[$usuario] == $senha ){
        session_start();        
        $_SESSION['autenticado'] = true;
        unset($_SESSION['erro']);
        header("Location: area_restrita.php");        
    } else {
        session_start();
        $_SESSION['autenticado'] = false; 
        if ( ! in_array($usuario, array_keys($usuarios) ) ){
            $_SESSION['erro'] = "Usuário não existe";
        } else {
            $_SESSION['erro'] = "Senha incorreta";
        }        
        header("Location: formulario_autenticacao.php");        
    }    
} else {
    header('Location: formulario_autenticacao.php');    
}
?>