<?php
    require_once "conn.php";
    $usuarios = get_usuarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/lista.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="container">
    <div class="content">
        <h2>Lista de Usuários</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                <td><a href="editarUsuario.php?id=<?php echo urlencode($usuario['id']); ?>">Editar</a></td>
                <td><a href="deletarUsuario.php?id=<?php echo urlencode($usuario['id']); ?>">Deletar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="cadastrar.php" class="button">Cadastrar</a>
        </div>
    </div>
</body>
</html>