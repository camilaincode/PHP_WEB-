<?php
require_once "conn.php";
$usuario = get_usuario($_GET['id']);

require_once 'errorHandler.php';
$mensagemErro = '';
if (isset($_GET['error'])) {
    $mensagemErro = errorHandler::getMensagemError($_GET['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/forms.css">
    <title>Cadastro Usuario</title>
</head>
<body>
    <div id="errorAlerta" class="alerta" style="display: none;">
        <span id="alertaMensagem"></span>
        <button onclick="fecharAlerta()">&times;</button>
    </div>

    <div class="container">
        <h2>Edição de Usuário</h2>
    <form action="processoEditar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome'] ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $usuario['email'] ?>">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="<?php echo $usuario['senha'] ?>"><br>
        </div>
        <input type="submit" value="editar" class="button">
    </form>
    </div>

<script>
    function showAlerta(mensagem){
            const alerta = document.getElementById('errorAlerta');
            const alertaMensagem = document.getElementById('alertaMensagem');
            alertaMensagem.textContent = mensagem;
            alerta.style.display = 'flex';
            setTimeout(fecharAlerta, 5000);
    }

    function fecharAlerta() {
            document.getElementById('errorAlerta').style.display = 'none';
    }


    function mostrarErro(mensagem) {
            showAlerta(mensagem);
    }

<?php if (!empty($mensagemErro)): ?>
    document.addEventListener('DOMContentLoaded', function() {
            mostrarErro('<?php echo $mensagemErro; ?>');
        });
<?php endif; ?>
</script>

</body>
</html>