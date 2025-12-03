<?php
    session_start();
    require_once 'errorHandler.php';
    require_once 'Validador.php';
    require_once 'conn.php';
    
    try {
        Validador::validarCampos($_POST);
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = findUserByName($username);

        if($user != null){
            if($password == $user['senha']){
                $_SESSION['username'] = $username;
                header("Location: listarUsuarios.php?success=usuario_cadastrado");
            }  
            else {
            $_SESSION['username'] = NULL;
            throw new Exception('credenciais_invalidas');
            exit();
            }
        } else {
            throw new Exception('credenciais_invalidas');
            exit();
        }
    } catch (Exception $e) {
       errorHandler::redirecionarError($e->getMessage(), 'login.php');
    }
?>