<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricao;

        public function __construct(?int $idTipoUsuario = null, ?string $descricao = null) {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricao = $descricao;
        }
        public function buscarTiposUsuario() {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $usuarios = $tipoUsuarioDAO->buscarTiposUsuario();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new tipoUsuarioModel($usuario['id_tipo_usuario'], $usuario['descricao']);
            }

            return $usuarios;
        }

        public function buscarTipoUsuarioPorId(int $idTipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tipoUsuario = $tipoUsuarioDAO->buscarTipoUsuarioPorId($idTipoUsuario);

            $tipoUsuario = new tipoUsuarioModel(
                $tipoUsuario['id_tipo_usuario'],
                $tipoUsuario['descricao'],
            );

            return $tipoUsuario;
        }
    }


?>