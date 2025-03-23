<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['produtos_id', 'quantity']; // Campos permitidos para preenchimento em massa

    // Relacionamento com o modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
