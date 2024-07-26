<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
</head>
<body>
    <?php
        require_once '../models/usuarioModel.php';
        require_once '../models/tipoUsuarioModel.php';
        session_start();

        if (!isset($_SESSION['esta_logado']) || $_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
            header('Location: login.php');
            exit();
        }

        $usuarioModel = new usuarioModel();
        $usuario = $usuarioModel->buscarUsuarioPorId($_GET['idUsuario']);
        
        
        $tipoUsuarioModel = new tipoUsuarioModel();
        $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
        
    ?>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar usuário</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposCadastrarUsuario(event);">
            <label for="idTipoUsuario">Tipo Usuário</label>
            <br>
            <select name="idTipoUsuario" id="idTipoUsuario">
                <?php foreach ($tiposUsuario as $tipoUsuario) : ?>
                    <?php if ($tipoUsuario->idTipoUsuario == $usuario->idTipoUsuario) : ?>
                        <option value="<?= $tipoUsuario->idTipoUsuario; ?>" selected><?= $tipoUsuario->descricao; ?></option>
                    <?php else : ?>
                        <option value="<?= $tipoUsuario->idTipoUsuario; ?>"><?= $tipoUsuario->descricao; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" value="<?= $usuario->nome; ?>" required>
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" value="<?= $usuario->email; ?>" required>
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="semha">
            <br>
            <input type="hidden" name="idUsuario" id="idUsuario "value="<?= $usuario->idUsuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>