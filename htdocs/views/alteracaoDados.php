<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Dados do Aluno</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 2) {
        header('Location: login.php');

        exit();
    }

    $usuarioModel = new usuarioModel();
    $idUsuario = intval(($_SESSION['id_usuario']));
    
    $aluno = $usuarioModel->buscarUsuarioPorId($idUsuario);

?>
<body>
    <header>
        <?php
            require_once '../public/html/menuAluno.html';   
        ?>
        <h1>Editar Dados do Aluno</h1>
    </header>
    <main>
    <form action="../routers/usuarioRouter.php" method="post">
        <label for="nome">Nome</label>
        <br>
        <input type="text" name="nome" id="nome" value="<?= $aluno->nome; ?>">
        <br>
        <label for="email">E-mail</label>
        <br>
        <input type="text" name="email" id="email" value="<?= $aluno->email; ?>">
        <br>
        <br>
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_SESSION ['id_usuario']; ?>">
        <input type="hidden" name="rota" id="rota" value="alterar">
        <input type="submit" value="Alterar">
        </form>
    </main>
</body>
</html>