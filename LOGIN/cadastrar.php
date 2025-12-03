<?php
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
        <h2>Cadastro de Usuário</h2>
    <form action="processoCadastro.php" method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="label" id="email" name="email" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <input type="submit" value="Cadastrar" class="button">
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