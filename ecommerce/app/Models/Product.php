<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    /**
     * Campos que podem ser atribuídos em massa
     */
    protected $fillable = [
        'name', 
        'type', 
        'description', 
        'price', 
        'image',
        'stock'
    ];

    /**
     * Tipos de conversão
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer'
    ];

    /**
     * Tipos de produtos disponíveis
     */
    public const TYPES = [
        'doce' => 'Doce',
        'salgado' => 'Salgado'
    ];

    /**
     * Acessor para preço formatado
     */
    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    /**
     * Acessor para nome do tipo
     */
    public function getTypeNameAttribute()
    {
        return self::TYPES[$this->type] ?? 'Tipo desconhecido';
    }

    /**
     * Valida os tipos permitidos
     */
    public static function validTypes()
    {
        return array_keys(self::TYPES);
    }
}