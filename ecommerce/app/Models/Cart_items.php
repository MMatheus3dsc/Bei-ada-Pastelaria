<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity']; // Campos permitidos para preenchimento em massa

    // Relacionamento com o modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
//Esse arquivo representa os itens no carrinho e permite interagir com o banco.