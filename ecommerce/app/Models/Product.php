<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'produtos'; // Nome correto da tabela no banco

    protected $fillable = ['nome', 'tipo', 'descricao', 'preco', 'imagem','stock']; // Campos que podem ser preenchidos em massa

    public function getPrecoFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
}
