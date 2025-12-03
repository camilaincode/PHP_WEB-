<?php 
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listarUsuarios.php");
    exit;
    }
    require_once 'errorHandler.php';
    require_once 'Validador.php';
try {
        Validador::validarCampos($_POST);
        Validador::validarNome($_POST['nome']);
        Validador::validarEmail($_POST['email']);
        Validador::validarSenha($_POST['senha']);
    } catch (Exception $e) {
        errorHandler::redirecionarError($e->getMessage(), 'editarUsuario.php');
    }

    require_once 'conn.php';

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