<?php 
 

class Produto
{
    private ?int $id;
    
    private string $tipo;
    
    private string $nome;                  // os parametros da classe
    
    private string $descricao;

    private float $preco;

    private string $imagem;

    public function __construct(?int $id , string $tipo, string $nome, string $descricao, float $preco,string $imagem = "logo-serenatto.png",)  // construtor da classe
    {
        $this->id = $id;
            $this->tipo = $tipo;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->preco = $preco;
            $this->imagem = $imagem;
        }
    
        public function getId(): int
    {
        return $this->id;
    }
    
    public function getTipo(): string
    {
        return $this->tipo;
    }
    
    public function getNome(): string
    {
        return $this->nome;
    }
                                                                                   // metodos getters para poder recuperar esses dados fora da
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    
    public function getImagem(): string
    {
        return $this->imagem;
    }
    
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getPrecoFormatado(){
         return "R$" . number_format($this->getPreco(), 2);
    }
    public function getImagemRaiz(){
        return 'img/'.$this->imagem ;
    }
    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }
    
    }
 
    
    
    