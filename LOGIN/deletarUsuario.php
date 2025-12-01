<?php
   if (!isset($_GET["id"])){
       header("Location: cadastrar.php?error=faltando_dados");
       exit();
   }
    require_once "conn.php";

    $result=delete_usuario($_GET["id"]);

    
    header("Location: listarUsuarios.php?success=usuario_cadastrado");
?>