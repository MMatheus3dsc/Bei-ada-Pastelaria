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
            $dados['cpf'],
            $dados['data_nascimento'],
            $dados['email'],
            $dados['endereco'],
            $dados['telefone'],
            $dados['genero'],
            $dados['senha']
        );
    }

    public function cadastrarUsuario(Usuario $usuario): void {
        $sql = "INSERT INTO usuarios (name, email, address, phone, password ,cpf, data_nascimento, genero) VALUES (?, ?, ?, ?, ?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $usuario->getNome());
        $statement->bindValue(2, $usuario->getEmail());
        $statement->bindValue(3, $usuario->getEndereco());
        $statement->bindValue(4, $usuario->getTelefone());
        $statement->bindValue(5, password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $statement->bindValue(6, $usuario->getCpf());
        $statement->bindValue(7, $usuario->getDataNascimento());
        $statement->bindValue(8, $usuario->getGenero());
        $statement->execute();
    }
    // 
}
?>
