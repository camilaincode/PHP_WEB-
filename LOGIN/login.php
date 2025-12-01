<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <?php
        if (isset($_GET['error'])){
            if ($_GET['error'] == 'faltando_dados'){
                echo "<p style='color:red;'>Erro: Por favor, preencha todos os campos.</p>";
            } elseif ($_GET['error'] == 'credenciais_invalidas'){
                echo "<p style='color:red;'>Erro: Credenciais inválidas. Tente novamente.</p>";
            } elseif ($_GET['error'] == 'nao_autenticado'){
                echo "<p style='color:red;'>Erro: Você precisa estar logado para acessar lista de usuarios.</p>";
            }
        }
    ?>
    <form action="auth.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form>
    
</body>
</html>