<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

   
    protected $fillable = [
       
        'name', 
        'type', 
        'description', 
        'price', 
        'image',
        'stock'
    ];

    
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer'
    ];

   
    public const TYPES = [
        'doce' => 'Doce',
        'salgado' => 'Salgado'
    ];

 
    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

 
    public function getTypeNameAttribute()
    {
        return self::TYPES[$this->type] ?? 'Tipo desconhecido';
    }

    public function getImageUrlAttribute()
{
    return $this->image ? Storage::url($this->image) : null;
}

    public static function validTypes()
    {
        return implode(',', ['salgado', 'doce']);
    }
}