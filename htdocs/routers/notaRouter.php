<?php
    require_once '../controllers/notaController.php';

    $notaController = new notaController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "cadastrar":
            $idUsuario = $_POST['idUsuario'];
            $idMateria = $_POST['idMateria'];
            $valor = $_POST['valor'];

            $notaController->cadastrarNota($idUsuario, $idMateria, $valor);

            break;
        
        case "salvar":
            $idMateria = intval($_POST['idMateria']);
            $idUsuario = intval($_POST['idUsuario']);
            $valor = $_POST['valor'];

            $notaController->alterarNota($idUsuario, $idMateria, $valor);
            break;
    }
?>