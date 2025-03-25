<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = ['usuarios_id', 'session_id', 'produtos_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

