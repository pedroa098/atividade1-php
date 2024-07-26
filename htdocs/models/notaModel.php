<?php
    require_once 'DAL/notaDAO.php';
    require_once 'materiaModel.php';

    class notaModel {
        public ?int $idNota;
        public ?int $idUsuario;
        public ?int $idMateria;
        public ?float $valor;
        public ?materiaModel $materia;

        public function __construct(?int $idNota = null, ?int $idUsuario = null, ?int $idMateria = null,  ?float $valor = null, ?materiaModel $materia = null) {
            $this->idNota = $idNota;
            $this->idUsuario = $idUsuario;
            $this->idMateria = $idMateria;
            $this->valor = $valor;
            $this->materia = $materia;
        }
        public function cadastrarNota(self $nota) {
            $notaDAO = new notaDAO;

            return $notaDAO->cadastrarNota($nota);
        }

        public function buscarNotasPorId(int $idUsuario) {
            $notaDAO = new notaDAO;
            $materiaModel = new materiaModel();
            $notas = $notaDAO->buscarNotasPorId($idUsuario);

            foreach ($notas as $chave => $nota) {
                $notas[$chave] = new notaModel (
                $nota['id_usuario'],
                $nota['id_nota'],
                $nota['id_materia'],
                $nota['valor'],
                $materiaModel->buscarMateriaPorId($nota['id_materia']));
            }
            return $notas;
        }

        public function buscarNotaPorId(self $nota) {
            $notaDAO = new notaDAO();
            $materiaModel = new materiaModel();
            $nota = $notaDAO->buscarNotaPorId($nota);
            $nota = new notaModel(
                $nota['id_usuario'],
                $nota['id_nota'],
                $nota['id_materia'],
                $nota['valor'],
                $materiaModel->buscarMateriaPorId($nota['id_materia'])
            );

            return $nota;
        }

        public function alterarNota(self $nota) {
            $notaDAO = new notaDAO();

            return $notaDAO->alterarNota($nota);
        }
    }
?>