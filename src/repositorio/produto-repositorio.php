<?php
class ProdutoRepositorio {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    private function formarObjeto(array $dados): Produto {
        return new Produto(
            $dados['id'] ?? null,
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem']
        );
    }

    public function opcoesSalgado(): array {
        $dataSql1 = "SELECT * FROM produtos WHERE tipo = 'Salgado' ORDER BY preco";
        $statement = $this->pdo->query($dataSql1);
        $produtosBeicada = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'formarObjeto'], $produtosBeicada);
    }

    public function opcoesDoce(): array {
        $dataSql1 = "SELECT * FROM produtos WHERE tipo = 'doce' ORDER BY preco";
        $statement = $this->pdo->query($dataSql1);
        $produtosBeicada = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'formarObjeto'], $produtosBeicada);
    }

    public function buscarTodos(): array {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'formarObjeto'], $dados);
    }

    public function deletar(int $id): void {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function salvar(Produto $produto): void {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo(), PDO::PARAM_STR);
        $statement->bindValue(2, $produto->getNome(), PDO::PARAM_STR);
        $statement->bindValue(3, $produto->getDescricao(), PDO::PARAM_STR);
        $statement->bindValue(4, $produto->getPreco(), PDO::PARAM_STR);
        $statement->bindValue(5, $produto->getImagem(), PDO::PARAM_STR);
        $statement->execute();
    }

    public function buscarPorId(int $id): ?Produto {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $dados ? $this->formarObjeto($dados) : null;
    }

    public function atualizar(Produto $produto): void {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo(), PDO::PARAM_STR);
        $statement->bindValue(2, $produto->getNome(), PDO::PARAM_STR);
        $statement->bindValue(3, $produto->getDescricao(), PDO::PARAM_STR);
        $statement->bindValue(4, $produto->getPreco(), PDO::PARAM_STR);
        $statement->bindValue(5, $produto->getImagem(), PDO::PARAM_STR);
        $statement->bindValue(6, $produto->getId(), PDO::PARAM_INT);
        $statement->execute();

        if ($produto->getImagem() !== 'banner-beiçada.jpg') {
            $this->atualizarFoto($produto);
        }
    }

    private function atualizarFoto(Produto $produto): void {
        $sql = "UPDATE produtos SET imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getImagem(), PDO::PARAM_STR);
        $statement->bindValue(2, $produto->getId(), PDO::PARAM_INT);
        $statement->execute();
    }

    public function escolherArquivos(Produto $produto): void {
        $produto->setImagem(uniqid() . $_FILES["imagem"]["name"]);
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $produto->getImagemRaiz());
    }
}
?>
