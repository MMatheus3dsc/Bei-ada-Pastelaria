<?php
class Usuario {
    private ?int $id;
    private string $nome;
    private string $email;
    private string $endereco;
    private string $telefone;
    private string $senha;

    public function __construct(?int $id, string $nome, string $email, string $endereco, string $telefone, string $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->senha = $senha;
    }

    // Getters e Setters
    public function getId(): ?int
    {
        return $this->id;}
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getEndereco():string 
    {
        return $this->endereco;
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function getSenha(): string
    {
        return $this->senha;}
    // Métodos adicionais, se necessário
}
?>
