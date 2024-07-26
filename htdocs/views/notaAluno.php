<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Notas</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();   
    if ($_SESSION['esta_logado'] !== true) {
        header('Location: login.php');
    
        exit();
    }
    
    $notaModel = new notaModel();
    $idUsuario = $_SESSION['id_usuario'];
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
        <?php
            require_once '../public/html/menuAluno.html';
        ?>
        <h1>Notas Aluno</h1>
    </header>
    <main>
      <table>
        <thead>
                <tr>
                    <br>
                    <br>
                    <th>Materia</th>
                    <th>Notas</th>
                </tr>
                </thead>
            <tbody>
                <?php foreach ($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->materia->descricao ?></td>
                        <td><?= $nota->valor ?></td>                    <tr>
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