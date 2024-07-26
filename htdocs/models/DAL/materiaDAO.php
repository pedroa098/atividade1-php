<?php
    require_once 'conexao.php';

    class materiaDAO {
        public function buscarMaterias() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function cadastrarMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO materia VALUES(null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':descricao', $materia->descricao);
            return $stmt->execute();
        }

        public function buscarMateriaPorId(int $idMateria) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia WHERE id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_materia', $idMateria);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function editarMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE materia SET descricao = :descricao WHERE id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricao', $materia->descricao);
            $stmt->bindValue(':id_materia', $materia->idMateria);

            return $stmt->execute();
        }

        public function excluirMateria(int $idMateria) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM materia WHERE id_materia = :id_materia";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_materia', $idMateria);
            return  $stmt->execute();
        }
    }
?>