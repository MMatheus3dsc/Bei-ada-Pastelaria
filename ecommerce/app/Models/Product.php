<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products'; // Nome correto da tabela no banco

    protected $fillable = ['name', 'type', 'description', 'price', 'image','stock']; // Campos que podem ser preenchidos em massa


    protected $casts = [
        'price' => 'decimal:2',
    ];
    public function getPriceformattedAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
}
