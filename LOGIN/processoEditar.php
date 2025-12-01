<?php 
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listarUsuarios.php");
    exit;
}
if (
    !isset($_POST["id"]) ||
    !isset($_POST["nome"]) ||
    !isset($_POST["email"]) ||
    !isset($_POST["senha"])
) {
    header("Location: editarUsuario.php?error=faltando_dados");
    exit;
}
require_once "conn.php"; 
$id = $_POST["id"];
$nome = $_POST["nome"];
$login = $_POST["email"];
$senha = $_POST["senha"];
if (update_usuario($id, $nome, $login, $senha)) {
    header("Location: listarUsuarios.php?success=atualizado");
    exit;
} else {
    header("Location: editarUsuario.php?id=$id&error=erro_atualizar");
    exit;
}
?>