<?php
    require_once "conn.php";
    $usuarios = get_usuarios();
?>
<div class="container">
    <h1>Lista de Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Editar</th>
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
    <a href="cadastrar.php">Cadastrar</a>
        </div>