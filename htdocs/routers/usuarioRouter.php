<?php
    require_once '../controllers/usuarioController.php';

    $usuarioController = new usuarioController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "entrar":
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->validarUsuario($email, $senha);

            break;

        case "alterar":
            $idUsuario = intval($_POST['idUsuario']);
            $nome = $_POST['nome'];
            $email = $_POST['email'];
    
            $usuarioController->alteraraDadosAluno($idUsuario, $nome, $email);
            break;
                
        case "cadastrar":
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->inserirUsuario($nome, $email, $senha);
            break;

        case "excluir":
            $idUsuario = $_POST['idUsuario'];
    
            $usuarioController->excluirUsuario($idUsuario);
    
            break;
        case "salvar":
            $idUsuario = $_POST['idUsuario'];
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
    
           var_dump($usuarioController->editarUsuario($idUsuario, $idTipoUsuario, $nome, $email, $senha));
            break;
    }
?>