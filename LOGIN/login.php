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
    <title>Login</title>
</head>
<body>
    <div id="errorAlerta" class="alerta" style="display: none;">
        <span id="alertaMensagem"></span>
        <button onclick="fecharAlerta()">&times;</button>
    </div>
    <div class="container">
        <h2>Login</h2>
        <form action="auth.php" method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="sing in!" class="button">
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