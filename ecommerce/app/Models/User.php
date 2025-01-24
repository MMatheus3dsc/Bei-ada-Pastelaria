<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = 'usuarios'; // Nome da tabela existente no banco de dados
    protected $primaryKey = 'id'; // Nome da chave primária (se for diferente do padrão 'id')
    public $timestamps = false; // Define se a tabela tem as colunas 'created_at' e 'updated_at'

    protected $fillable = ['name', 'email', 'password','cpf','data_nascimento','address','phone','genero']; // Campos permitidos para preenchimento

    protected $hidden = ['password'];
}
