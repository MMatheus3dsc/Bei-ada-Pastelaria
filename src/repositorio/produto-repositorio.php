<?php


class ProdutoRepositorio     
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)           // construtor de PDO pois é necessario a cada instacia criada
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem'],);
    }

    public function opcoesSalgado():array {
        $dataSql1 = "SELECT * FROM produtos WHERE TIPO = 'Salgado' ORDER BY preco ";
        $statement = $this->pdo->query($dataSql1);
        $produtosBeicada = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $dadosBeicada = array_map(function($salgado){                         /*função acessa o banco de dados busca produtos do tipo cafe (cardapio de cafe) && monta o objeto desse tipo*/
            return $this->formarObjeto($salgado);
        },$produtosBeicada);
        return $dadosBeicada;
    }
    public function opcoesDoce():array {
        $dataSql1 = "SELECT * FROM produtos WHERE TIPO = 'doce' ORDER BY preco ";
        $statement = $this->pdo->query($dataSql1);
        $produtosBeicada = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $dadosBeicada = array_map(function($doce){                         /*função acessa o banco de dados busca produtos do tipo cafe (cardapio de cafe) && monta o objeto desse tipo*/
            return $this->formarObjeto($doce);
        },$produtosBeicada);
        return $dadosBeicada;
    }


   public function busacarTodos()
   {
    $sql = "SELECT * FROM produtos ORDER BY preco";
    $statement = $this->pdo->query($sql);
    $dados =$statement-> fetchAll(PDO::FETCH_ASSOC);
    
    $todosDados = array_map(function($produtos){
        return $this->formarObjeto($produtos);
    },$dados);
    return $todosDados;
   }
   
   public function deletar(int $id){
    $sql = "DELETE FROM produtos WHERE id = ?";    // instruçao mysql 
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1,$id);
    $statement->execute();
   }

   public function salvar(Produto $produto){
    $sql = "INSERT INTO produtos (tipo,nome,descricao,preco,imagem) VALUES(?,?,?,?,?) "; 
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $produto->getTipo());
    $statement->bindValue(2, $produto->getNome());
    $statement->bindValue(3, $produto->getDescricao());               //função que cadastra um novo objeto instanciado no banco de dados 
    $statement->bindValue(4, $produto->getPreco());
    $statement->bindValue(5, $produto->getImagem());
    $statement->execute();
   }
   public function buscarEditar(int $id){
    $sql = "SELECT * FROM produtos WHERE id =?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1,$id);                                   //seleciona o produto do banco de dados pelo id e retorna uma nova instancia de
    $statement->execute();

    $dados = $statement->fetch(PDO::FETCH_ASSOC);

    return $this->formarObjeto($dados);
 }
 public function atualizar(Produto $produto)
{
    $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $produto->getTipo());
    $statement->bindValue(2, $produto->getNome());
    $statement->bindValue(3, $produto->getDescricao());                 //função que atualiza os parametros de um  objeto já instanciado no banco de dados 
    $statement->bindValue(4, $produto->getPreco()); 
    $statement->bindValue(5, $produto->getImagem());
    $statement->bindValue(6, $produto->getId());
    $statement->execute();

    if($produto->getImagem() !== 'logo-serenatto.png'){
            
        $this->atualizarFoto($produto);     //condição que atualiza a imagem apenas se for diferente da que já esta no banco de dados
    } 
}

private function atualizarFoto(Produto $produto)
{
    $sql = "UPDATE produtos SET imagem = ? WHERE id = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $produto->getImagem());
    $statement->bindValue(2, $produto->getId());
    $statement->execute();
}
    

public function escolherArquivos (Produto $produto){
    $produto->setImagem(uniqid().$_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["tmp_name"],$produto->getImagemRaiz());
  
}

 }