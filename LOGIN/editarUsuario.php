<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
</head>
<body>
    <header>
        <h1>Edição de Usuário</h1>
        <?php
        if (isset($_GET['error'])){
            if ($_GET['error'] == 'faltando_dados'){
                echo "<p style='color:red;'>Erro: Por favor, preencha todos os campos.</p>";}
        }
    ?>
     </header>
    <div class="container">
    <form action="processoEditar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    </div>
</body>
</html>