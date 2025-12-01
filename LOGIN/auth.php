<?php
    session_start();
    if (!isset($_POST['username']) || !isset($_POST['password'])){
        header("Location: login.php?error=faltando_dados");
        exit();
    }

    require_once "conn.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = finduUserByName($username);

    if($user != null){
        if($password == $user['senha']){
            $_SESSION['username'] = $username;
            header("Location: listarUsuarios.php?success=usuario_cadastrado");
        }  
        else {
        $_SESSION['username'] = NULL;
        header("Location: login.php?error=credenciais_invalidas");
        exit();
        }
    } else {
        header("Location: login.php?error=credenciais_invalidas");
        exit();
    }
    

    

?>