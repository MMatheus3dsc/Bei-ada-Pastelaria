<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'tipo', 'descricao', 'preco', 'stock']; // Campos que podem ser preenchidos em massa
}
