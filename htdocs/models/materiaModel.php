<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $idMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->descricao = $descricao;
        }

        public function buscarMaterias() {
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMaterias();

            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['id_materia'], $materia['descricao']);
            }

            return $materias;
        }
        public function cadastrarMateria(materiaModel $materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->cadastrarMateria($materia);
        }

        public function buscarMateriaPorId(int $idMateria) {
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMateriaPorId($idMateria);

            $materia = new self ($materias['id_materia'], $materias['descricao']);
            return $materia;
        }

        public function editarMateria(materiaModel $materia) {
            $materiaDAO = new materiaDAO();
            
            return $materiaDAO->editarMateria($materia);
        }

        public function excluirMateria(int $idMateria) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->excluirMateria($idMateria);
        }
    }
    
?>