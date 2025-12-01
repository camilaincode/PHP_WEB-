<?php
   if (!isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"])){
       header("Location: cadastrar.php?error=faltando_dados");
       exit();
   }
    require_once "conn.php";

    $result=cadastrar_usuario($_POST["nome"], $_POST["email"], $_POST["senha"]);

    
    header("Location: listarUsuarios.php?success=usuario_cadastrado");

?>