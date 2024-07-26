<?php
    require_once 'conexao.php';

    class notaDAO {
        public function cadastrarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO nota VALUES (null, :idUsuario, :idMateria, :valor)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idUsuario', $nota->idUsuario);
            $stmt->bindValue(':idMateria', $nota->idMateria);
            $stmt->bindValue(':valor', $nota->valor);
            return $stmt->execute();
        }

        public function buscarNotasPorId(int $idUsuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM nota WHERE id_usuario = :idUsuario";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarNotaPorId(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM nota WHERE id_usuario = :idUsuario and id_materia = :idMateria";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idUsuario", $nota->idUsuario);
            $stmt->bindValue(":idMateria", $nota->idMateria);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function alterarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = 'UPDATE nota SET valor = :valor WHERE id_usuario = :idUsuario and id_materia = :idMateria';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idUsuario', $nota->idUsuario);
            $stmt->bindValue(':idMateria', $nota->idMateria);
            $stmt->bindValue(':valor', $nota->valor);
            $stmt->execute();
            }
    }
?>