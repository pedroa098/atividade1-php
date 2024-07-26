<?php
    require_once '../models/materiaModel.php';

    class materiaController {
        public function cadastrarMateria(string $descricao) {
            $materiaModel = new materiaModel();
            $materia = new materiaModel(null, $descricao);

            $retorno = $materiaModel->cadastrarMateria($materia);

            if ($retorno) {
                header('Location: ../views/listarMaterias.php');
            }
            else {
                header('Location: ../views/principal.php');
            }

            exit();
        }

        public function editarMateria(int $idMateria, string $descricao) {
            $materiaModel = new materiaModel();

            $materia = new materiaModel($idMateria, $descricao);

            $retorno = $materiaModel->editarMateria($materia);

            if ($retorno) {
                header('Location: ../views/listarMaterias.php');
            }
            else {
                header("Location: ../views/editarMateria.php?IdMateria=$idMateria");
            }

            exit();
        }

        public function excluirMateria(int $idMateria) {
            $materiaModel = new materiaModel();

            $materiaModel->excluirMateria($idMateria);

            header('Location: ../views/listarMaterias.php');
            exit();
        }
    }
?>