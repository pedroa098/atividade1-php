<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
    
        exit();
    }

    $notaModel = new notaModel();
    $idMateria = $_GET['idMateria'];
    $idUsuario = $_GET['idUsuario'];
    $nota = new notaModel(null, $idUsuario, $idMateria, null, null);
    $nota = $notaModel->buscarNotaPorId($nota);  
?>
<body>
<header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Nota</h1>
    </header>
    <main>
        <form action="../routers/notaRouter.php" method="post">
        <label for="valor">Valor</label>
        <br>
        <input type="number" name="valor" id="valor" value="<?= $nota->valor; ?>">
        <br>
        <br>
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $_GET['idUsuario'] ?>">
        <input type="hidden" name="idMateria" id="idMateria" value="<?= $nota->idMateria; ?>">
        <input type="hidden" name="rota" id="rota" value="salvar">
        <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>