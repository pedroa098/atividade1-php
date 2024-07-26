<?php
    require_once '../controllers/materiaController.php';

    $materiaController = new materiaController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $nome = $_POST['nome'];

            $materiaController->cadastrarMateria($nome);

            break;
        case "excluir":
            $idMateria = $_POST['idMateria'];
    
            $materiaController->excluirMateria($idMateria);
    
            break;
        case "salvar":
            $idMateria = intval($_POST['idMateria']);
            $descricao = $_POST['descricao'];
    
           var_dump($materiaController->editarMateria($idMateria, $descricao));
            break;  
    }
?>