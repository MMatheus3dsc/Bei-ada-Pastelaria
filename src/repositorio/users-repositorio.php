<?php
class UsuarioRepositorio {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados): Usuario {
        return new Usuario(
            $dados['id'] ?? null,
            $dados['nome'],
            $dados['email'],
            $dados['endereco'],
            $dados['telefone'],
            $dados['senha']
        );
    }

    public function cadastrarUsuario(Usuario $usuario): void {
        $sql = "INSERT INTO users (name, email, address, phone, password) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $usuario->getNome());
        $statement->bindValue(2, $usuario->getEmail());
        $statement->bindValue(3, $usuario->getEndereco());
        $statement->bindValue(4, $usuario->getTelefone());
        $statement->bindValue(5, password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $statement->execute();
    }
    // Outros métodos do repositório, como buscar usuário por email, etc.
    // ...
}
?>
