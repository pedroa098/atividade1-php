<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();

    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar Usuário</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposCadastrarTipoUsuario(event);">
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" required>
            <br>
            <label for="nome">Email</label>
            <br>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="password" name="senha" id="senha" required>
            <br>
            <label for="id_usuario">Tipo Usuário</label>
            <br>
            <select name="id_tipo_usuario" id="id_tipo_usuario">
                <option value="0">Selecione: </option>
                <?php foreach ($tiposUsuario as $tipoUsuario) :?>
                    <option value="<?= $tipoUsuario->idTipoUsuario; ?>" ><?= $tipoUsuario->descricao; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>