<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        }

        public function alteraraDadosAluno(usuarioModel $aluno) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario set nome = :nome, email = :email WHERE id_usuario = :idUsuario ";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $aluno->nome);
            $stmt->bindValue(':email', $aluno->email);
            $stmt->bindValue(':idUsuario', $aluno->idUsuario);

            return $stmt->execute();
        }

        public function inserirUsuario(string $nome, string $email, string $senha) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO usuario VALUES(null, :id_tipo_usuario, :nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_tipo_usuario', 2);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $retorno = $stmt->execute();

           return $retorno;
        }

        public function buscarUsuarios() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirUsuario(int $idUsuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $idUsuario);
            return  $stmt->execute();
        }

        public function editarUsuario(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario SET id_tipo_usuario = :id_tipo_usuario, nome = :nome, email = :email, senha = :senha WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_tipo_usuario', $usuario->idTipoUsuario);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);
            $stmt->bindValue(':id_usuario', $usuario->idUsuario);

            return $stmt->execute();
        }

        
        public function buscarUsuarioPorId(int $idUsuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_usuario', $idUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
            
    }
?>