<?php

    require_once 'errorHandler.php';
    require_once 'Validador.php';
    require_once "conn.php";
    
    try {
        Validador::validarCampos($_POST);
        Validador::validarNome($_POST['nome']);
        Validador::validarEmail($_POST['email']);
        Validador::validarSenha($_POST['senha']);
        $result=cadastrar_usuario($_POST["nome"], $_POST["email"], $_POST["senha"]);
        header("Location: listarUsuarios.php?success=usuario_cadastrado");
    } catch (Exception $e) {
        errorHandler::redirecionarError($e->getMessage(), 'cadastrar.php');
    }

?>