<?php
class Usuario {
    private ?int $id;
    private string $nome;
    
    private string $cpf;
    
    private string $data_nascimento;
    private string $email;
    private string $endereco;
    private string $telefone;

    private string $genero;
    private string $senha;

    public function __construct(?int $id, string $nome, string $cpf,string $data_nascimento , string $email, string $endereco, string $telefone, string $genero ,string $senha) {
        $this->id = $id;
        $this->nome = $this->validarNome($nome);
        $this->cpf = $this->validarCpf($cpf);
        $this->data_nascimento = $this->validarDataNascimento($data_nascimento);
        $this->email = $this->validarEmail($email);
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->genero = $genero;
        $this->senha = $this->validarSenha($senha);
    }

    // Getters e Setters
    public function getId(): ?int
    {
        return $this->id;}
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getCpf() :string{
        return $this->cpf;
    }
    public function getDataNascimento(): string {
        return $this->data_nascimento;
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
    public function getGenero(): string {
        return $this->genero;
    }
    public function getSenha(): string
    {
        return $this->senha;}
     
        private function validarNome(string $nome): string {
            if (strlen($nome) < 2) {
                throw new InvalidArgumentException("O nome deve ter pelo menos 2 caracteres.");
            }
            return $nome;
        }
    
        private function validarCpf(string $cpf): string {
            if (!preg_match('/^\d{11}$/', $cpf)) {
                throw new InvalidArgumentException("CPF inválido. Deve conter 11 dígitos.");
            }
            return $cpf;
        }
    
        private function validarDataNascimento(string $data_nascimento): string {
            $date = date_create_from_format('Y-m-d', $data_nascimento);
            if (!$date || date_format($date, 'Y-m-d') !== $data_nascimento) {
                throw new InvalidArgumentException("Data de nascimento inválida. Use o formato YYYY-MM-DD.");
            }
            return $data_nascimento;
        }
    
        private function validarEmail(string $email): string {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("Email inválido.");
            }
            return $email;
        }
    
        private function validarSenha(string $senha): string {
            if (strlen($senha) < 6) {
                throw new InvalidArgumentException("A senha deve ter pelo menos 6 caracteres.");
            }
            return $senha;
        }
}

?>
