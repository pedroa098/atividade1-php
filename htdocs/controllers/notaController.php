<?php
    require_once '../models/notaModel.php';

    class notaController {
        public function cadastrarNota(int $idUsuario, int $idMateria,float $valor) {
            $nota = str_replace (' ','', $valor);

            $notaModel = new notaModel;
            $nota = new notaModel(null, $idUsuario, $idMateria ,$valor);
            $retorno = $notaModel->cadastrarNota($nota);

            if($retorno) {
                header('Location: ../views/listarNotas.php');
            }
            else {
                header('Location: ../views/cadastrarNota.php');
            }
        
            exit();
        }

        public function alterarNota(int $idUsuario, int $idMateria, float $valor) {
            $notaModel = new notaModel();
            $nota = new notaModel(null, $idUsuario, $idMateria, $valor);

            $retorno = $notaModel->alterarNota($nota);

            if ($retorno == false) {
                header("Location: ../views/notaAdmin.php?idUsuario=$idUsuario");
            }
        }
    }
?>