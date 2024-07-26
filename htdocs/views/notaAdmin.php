<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar nota e edita-lá</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
    
        exit();
    }

    $notaModel = new notaModel();
    $idUsuario = $_GET['idUsuario'];

    $notas = $notaModel->buscarNotasPorId($idUsuario);

    $qDeMaterias = 0;
    $notaTotal = 0;
    foreach($notas as $nota) {
        $nota1 = $nota->valor;
        $notaTotal = $notaTotal + $nota1;
        $qDeMaterias += 1;
    }

    if ($notaTotal !== 0) {
        $media = $notaTotal/$qDeMaterias;
    }
?>
<body>
    <header>
        <h1>Ver notas e edita-lá</h1>
    </header>
    <main>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Máteria</th>
                    <th>Notas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->materia->descricao ?></td>
                        <td><?= $nota->valor ?></td>
                        <td><a href="editarNota.php?idMateria=<?= $nota->idMateria?>&idUsuario=<?= $idUsuario ?>"> Editar Nota</a><td>
                    <tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php if ($notaTotal !== 0) :?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Média: </b></td>
                    <td><b><?php echo number_format($media, 1, '.', '', ) . "\n"?></b></td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>
    </main>
</body>
</html>